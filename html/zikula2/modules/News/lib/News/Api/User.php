<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

class News_Api_User extends Zikula_AbstractApi
{
    const STATUS_PUBLISHED = 0;
    const STATUS_REJECTED = 1;
    const STATUS_PENDING = 2;
    const STATUS_ARCHIVED = 3;
    const STATUS_DRAFT = 4;
    const STATUS_SCHEDULED = 5;
    /**
     * get all news items
     * @author Mark West
     * @return mixed array of items, or false on failure
     */
    public function getall($args)
    {
        // Optional arguments.
        if (!isset($args['status']) || (empty($args['status']) && $args['status'] !== 0)) {
            $args['status'] = null;
        }
        if (!isset($args['startnum']) || empty($args['startnum'])) {
            $args['startnum'] = 1;
        }
        if (!isset($args['numitems']) || empty($args['numitems'])) {
            $args['numitems'] = -1;
        }
        if (!isset($args['ignoreml']) || !is_bool($args['ignoreml'])) {
            $args['ignoreml'] = false;
        }
        if (!isset($args['language'])) {
            $args['language'] = '';
        }
        if (!isset($args['filterbydate'])) {
            $args['filterbydate'] = true;
        }

        if ((!empty($args['status']) && !is_numeric($args['status'])) ||
                !is_numeric($args['startnum']) ||
                !is_numeric($args['numitems'])) {
            return LogUtil::registerArgsError();
        }

        // create a empty result set
        $items = array();

        // Security check
        if (!SecurityUtil::checkPermission('News::', '::', ACCESS_OVERVIEW)) {
            return $items;
        }

        $where = $this->generateWhere($args);

        $tables = DBUtil::getTables();
        $news_column = $tables['news_column'];
        $orderby = '';
        // Handle the sort order, if nothing requested use admin setting
        if (!isset($args['order'])) {
            $args['order'] = $this->getVar('storyorder');
            switch ($args['order'])
            {
                case 0:
                    $order = 'sid';
                    break;
                case 2:
                    $order = 'weight';
                    break;
                case 1:
                default:
                    $order = 'from';
            }
        } elseif (isset($news_column[$args['order']])) {
            $order = $args['order'];
        }

        // if ordering is used also set the order direction, ascending/descending
        if (!empty($order)) {
            if (isset($args['orderdir']) && in_array(strtoupper($args['orderdir']), array('ASC', 'DESC'))) {
                $orderby = $news_column[$order].' '.strtoupper($args['orderdir']);
            } else {
                $orderby = $news_column[$order].' DESC';
            }
        } elseif ($args['order'] == 'random') {
            $orderby = 'RAND()';
        }

        // if sorted by weight add second ordering "from", since weight is not unique
        if ($order == 'weight') {
            $orderby .= ', ' . $news_column['from'] . ' DESC';
        }

        $permChecker = new News_ResultChecker($this->getVar('enablecategorization'), $this->getVar('enablecategorybasedpermissions'));
        $objArray = DBUtil::selectObjectArrayFilter('news', $where, $orderby, $args['startnum'] - 1, $args['numitems'], '', $permChecker, $this->getCatFilter($args));

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($objArray === false) {
            return LogUtil::registerError($this->__('Error! Could not load any articles.'));
        }

        // need to do this here as the category expansion code can't know the
        // root category which we need to build the relative path component
        if ($this->getVar('enablecategorization') && $objArray && isset($args['catregistry']) && $args['catregistry']) {
            ObjectUtil::postProcessExpandedObjectArrayCategories($objArray, $args['catregistry']);
        }

        // Return the items
        return $objArray;
    }

    /**
     * get a specific item
     * @author Mark West
     * @param $args['sid'] id of news item to get
     * @return mixed item array, or false on failure
     */
    public function get($args)
    {
        // optional arguments
        if (isset($args['objectid'])) {
            $args['sid'] = $args['objectid'];
        }

        // Argument check
        if ((!isset($args['sid']) || !is_numeric($args['sid'])) &&
                !isset($args['title'])) {
            return LogUtil::registerArgsError();
        }

        // Check for caching of the DBUtil calls (needed for AJAX editing)
        if (!isset($args['SQLcache'])) {
            $args['SQLcache'] = true;
        }

        // form a date using some ofif present...
        // step 1 - convert month name into
        if (isset($args['monthname']) && !empty($args['monthname'])) {
            $months = explode(' ', $this->__('Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec'));
            $keys = array_flip($months);
            $args['monthnum'] = $keys[ucfirst($args['monthname'])] + 1;
        }

        // step 2 - convert to a timestamp and back to a db format
        if (isset($args['year']) && !empty($args['year']) && isset($args['monthnum']) &&
                !empty($args['monthnum']) && isset($args['day']) && !empty($args['day'])) {
            // use PHP strftime directly, since DateUtil translates dateformat strings, which is not ok in this case
            $timestring = strftime('%Y-%m-%d', mktime(0, 0, 0, $args['monthnum'], $args['day'], $args['year']));
        }

        $permFilter = array();
        $permFilter[] = array('realm' => 0,
                'component_left'   => 'News',
                'component_middle' => '',
                'component_right'  => '',
                'instance_left'    => 'cr_uid',
                'instance_middle'  => '',
                'instance_right'   => 'sid',
                'level'            => ACCESS_READ);

        if (isset($args['sid']) && is_numeric($args['sid'])) {
            $item = DBUtil::selectObjectByID('news', $args['sid'], 'sid', null, $permFilter, null, $args['SQLcache']);
        } elseif (isset($timestring)) {
            $tables = DBUtil::getTables();
            $col = $tables['news_column'];
            $where = "{$col['urltitle']} = '".DataUtil::formatForStore($args['title'])."' AND {$col['from']} LIKE '{$timestring}%'";
            $item = DBUtil::selectObject('news', $where, null, $permFilter, null, $args['SQLcache']);
        } else {
            $item = DBUtil::selectObjectByID('news', $args['title'], 'urltitle', null, $permFilter, null, $args['SQLcache']);
        }

        if (empty($item))
            return false;

        // Sanity check for the published status if required
        if (isset($args['status'])) {
            if ($item['published_status'] != $args['status']) {
                return false;
            }
        }

        // process the relative paths of the categories
        if ($this->getVar('enablecategorization') && !empty($item['__CATEGORIES__'])) {
            static $registeredCats;
            if (!isset($registeredCats)) {
                $registeredCats  = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            }
            ObjectUtil::postProcessExpandedObjectCategories($item['__CATEGORIES__'], $registeredCats);
            if (!CategoryUtil::hasCategoryAccess($item['__CATEGORIES__'], 'News')) {
                return false;
            }
        }

        return $item;
    }

    /**
     * Get all months and years with news. Used by archive overview
     * @author Philipp Niethammer
     * @return array Array of dates (one per month)
     */
    public function getMonthsWithNews($args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('News::', '::', ACCESS_OVERVIEW)) {
            return false;
        }

        $tables = DBUtil::getTables();
        $news_column = $tables['news_column'];

        // TODO: Check syntax for other Databases (i.e. Postgres doesn't know YEAR_MONTH)
        $order = "GROUP BY EXTRACT(YEAR_MONTH FROM $news_column[from]) ORDER BY $news_column[from] DESC";

        $date = DateUtil::getDatetime();
        $where = "($news_column[from] < '$date' AND $news_column[published_status] = '0')";
        $dates = DBUtil::selectFieldArray('news', 'from', $where, $order);

        return $dates;
    }

    /**
     * utility function to count the number of items held by this module
     *
     * @author Mark West
     * @return int number of items held by this module
     */
    public function countitems($args)
    {
        // Optional arguments.
        if (!isset($args['status']) || (empty($args['status']) && $args['status'] !== 0)) {
            $args['status'] = null;
        }
        if (!isset($args['ignoreml']) || !is_bool($args['ignoreml'])) {
            $args['ignoreml'] = false;
        }
        if (!isset($args['language'])) {
            $args['language'] = '';
        }

        $where = $this->generateWhere($args);
        $where = !empty($where) ? ' WHERE ' . $where : '';

        return DBUtil::selectObjectCount('news', $where, 'sid', false, $this->getCatFilter($args));
    }

    /**
     * increment the item read count
     *
     * @author Mark West
     * @return bool true on success, false on failiure
     */
    public function incrementreadcount($args)
    {
        if ((!isset($args['sid']) || !is_numeric($args['sid'])) &&
                !isset($args['title'])) {
            return LogUtil::registerArgsError();
        }

        if (isset($args['sid'])) {
            return DBUtil::incrementObjectFieldByID('news', 'counter', $args['sid'], 'sid');
        } else {
            return DBUtil::incrementObjectFieldByID('news', 'counter', $args['title'], 'urltitle');
        }
    }

    /**
     * Generate raw information for a given article
     * Requires row to have previously gone through
     * getArticles() and meet the prerequisites
     * for it
     * @author unknown
     */
    public function getArticleInfo($info)
    {
        // Work out name of story submitter if needed
        if (empty($info['contributor'])) {
            if ($info['cr_uid'] == 0) {
                $info['contributor'] = System::getVar('anonymous');
            } else {
                $info['contributor'] = UserUtil::getVar('uname', $info['cr_uid']);
            }
        }

        // Change the __CATEGORIES__ field to a more usable name
        if (isset($info['__CATEGORIES__'])) {
            $info['categories'] = $info['__CATEGORIES__'];
            unset($info['__CATEGORIES__']);
        } else {
            $info['categories'] = null;
        }

        // also the __ATTRIBUTES__ field
        if (isset($info['__ATTRIBUTES__'])) {
            $info['attributes'] = $info['__ATTRIBUTES__'];
            unset($info['__ATTRIBUTES__']);
        } else {
            $info['attributes'] = null;
        }

        // For legacy reasons we add some hardwired category and topic variables
        if (!empty($info['categories']) && $this->getVar('enablecategorization')) {
            $lang = ZLanguage::getLanguageCode();
            $categoryField = $this->_getCategoryField();
            $topicField = $this->_getTopicField();

            if (isset($info['categories'][$categoryField])) {
                $info['catid']      = $info['categories'][$categoryField]['id'];
                $info['cat']        = $info['categories'][$categoryField]['id'];
                $info['cattitle']   = isset($info['categories'][$categoryField]['display_name'][$lang]) ? $info['categories'][$categoryField]['display_name'][$lang] : $info['categories'][$categoryField]['name'];
                $info['catpath']    = isset($info['categories'][$categoryField]['path_relative']) ? $info['categories'][$categoryField]['path_relative'] : '';
            } else {
                $info['catid']      = null;
                $info['cat']        = null;
                $info['cattitle']   = '';
                $info['catpath']    = '';
            }

            if (isset($info['categories'][$topicField])) {
                $info['topicid']   = $info['categories'][$topicField]['id'];
                $info['topicname'] = isset($info['categories'][$topicField]['display_name'][$lang]) ? $info['categories'][$topicField]['display_name'][$lang] : $info['categories'][$topicField]['name'];
                // set the topic image if exists
                if (isset($info['categories'][$topicField]['__ATTRIBUTES__']) && isset($info['categories'][$topicField]['__ATTRIBUTES__']['topic_image'])) {
                    $info['topicimage'] = $info['categories'][$topicField]['__ATTRIBUTES__']['topic_image'];
                } else {
                    $info['topicimage'] = '';
                }
                // set the topic description if exists
                if (isset($info['categories'][$topicField]['display_desc'][$lang])) {
                    $info['topictext'] = $info['categories'][$topicField]['display_desc'][$lang];
                } else {
                    $info['topictext'] = '';
                }
                // set the path of the Topic
                $info['topicpath']  = isset($info['categories'][$topicField]['path_relative']) ? $info['categories'][$topicField]['path_relative'] : '';
            } else {
                $info['topicid']    = null;
                $info['topicname']  = '';
                $info['topicimage'] = '';
                $info['topictext']  = '';
                $info['topicpath']  = '';
            }
        } else {
            $info['catid']      = null;
            $info['cattitle']   = '';
            $info['catpath']    = '';
            $info['topicid']    = null;
            $info['topicname']  = '';
            $info['topicimage'] = '';
            $info['topictext']  = '';
            $info['topicpath']  = '';
        }

        // check which variable to use for the category
        if (System::getVar('shorturls', false)) {
            $info['catvar'] = $info['catpath'];
        } else {
            $info['catvar'] = $info['catid'];
        }

        // Title should not have any URLs in it
        $info['title']    = strip_tags($info['title']);

        // Create 'Category: title'-style header -- Credit to Rabbit for the older theme compatibility.
        if ($info['catid']) {
            $info['catandtitle'] = $info['cattitle'].': '.$info['title'];
        } else {
            $info['catandtitle'] = $info['title'];
        }

        // Get the format types. 'home' string is bits 0-1, 'body' is bits 2-3.
        $info['hometype'] = ($info['format_type']%4);
        $info['bodytype'] = ($info['format_type']/4)%4;
        unset($info['format_type']);

        // Check for comments
        if (ModUtil::available('EZComments') && $info['allowcomments'] == 1) {
            $info['commentcount'] = ModUtil::apiFunc('EZComments', 'user', 'countitems',
                    array('mod' => 'News',
                        'objectid' => $info['sid'],
                        'status' => 0));
        }

        return($info);
    }

    /**
     * Generate an array of links for a given article
     * Requires info to have previously gone through
     * genArticleInfo() and meet the prerequisites
     * for it
     * @author unknown
     */
    public function getArticleLinks($info)
    {
        $shorturls = System::getVar('shorturls', false);

        // Allowed to comment?
        if (ModUtil::available('EZComments') && $info['allowcomments'] == 1) {
            if ($shorturls) {
                $comment = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid'], 'from' => $info['from'], 'urltitle' => $info['urltitle'], '__CATEGORIES__' => $info['categories']), null, 'comments'));
            } else {
                $comment = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid']), null, 'comments'));
            }
        } else {
            $comment = '';
        }

        // Allowed to read full article?
        if (SecurityUtil::checkPermission('News::', "{$info['cr_uid']}::{$info['sid']}", ACCESS_READ)) {
            if ($shorturls) {
                $fullarticle = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid'], 'from' => $info['from'], 'urltitle' => $info['urltitle'], '__CATEGORIES__' => $info['categories'])));
            } else {
                $fullarticle = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid'])));
            }
        } else {
            $fullarticle = '';
        }

        // Link to topic if there is a topic
        if (!empty($info['topicpath'])) {
            $topicField = $this->getTopicField();
            // check which variable to use for the topic
            if ($shorturls) {
                $searchtopic = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => $topicField, 'cat' => $info['topicpath'])));
            } else {
                $searchtopic = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => $topicField, 'cat' => $info['topicid'])));
            }
        } else {
            $searchtopic = '';
        }

        // Link to all the categories
        $categories = array();
        if (!empty($info['categories']) && is_array($info['categories']) && $this->getVar('enablecategorization')) {
            // check which variable to use for the category
            if ($shorturls) {
                $field = 'path_relative';
            } else {
                $field = 'id';
            }
            $properties = array_keys($info['categories']);
            foreach ($properties as $prop) {
                $categories[$prop] = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => $prop, 'cat' => $info['categories'][$prop][$field])));
            }
        }

        // Set up the array itself
        if ($shorturls) {
            $links = array ('category' => DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => 'Main', 'cat' => $info['catvar']))),
                    'categories'       => $categories,
                    'permalink'        => DataUtil::formatForDisplayHTML(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid'], 'from' => $info['from'], 'urltitle' => $info['urltitle'], '__CATEGORIES__' => $info['categories']), null, null, true)),
                    'comment'          => $comment,
                    'fullarticle'      => $fullarticle,
                    'searchtopic'      => $searchtopic,
                    'print'            => DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid'], 'from' => $info['from'], 'urltitle' => $info['urltitle'], '__CATEGORIES__' => $info['categories'], 'theme' => 'Printer'))),
                    'commentrssfeed'   => DataUtil::formatForDisplay(ModUtil::url('EZComments', 'user', 'feed', array('mod' => 'News', 'objectid' => $info['sid']))),
                    'commentatomfeed'  => DataUtil::formatForDisplay(ModUtil::url('EZComments', 'user', 'feed', array('mod' => 'News', 'objectid' => $info['sid']))));
        } else {
            $links = array ('category' => DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => 'Main', 'cat' => $info['catvar']))),
                    'categories'       => $categories,
                    'permalink'        => DataUtil::formatForDisplayHTML(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid']), null, null, true)),
                    'comment'          => $comment,
                    'fullarticle'      => $fullarticle,
                    'searchtopic'      => $searchtopic,
                    'print'            => DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $info['sid'], 'theme' => 'Printer'))),
                    'commentrssfeed'   => DataUtil::formatForDisplay(ModUtil::url('EZComments', 'user', 'feed', array('mod' => 'News', 'objectid' => $info['sid']))),
                    'commentatomfeed'  => DataUtil::formatForDisplay(ModUtil::url('EZComments', 'user', 'feed', array('mod' => 'News', 'objectid' => $info['sid']))));
        }

        return $links;
    }

    /**
     * Generate an array of preformatted HTML bites for a given article
     * Requires info to have previously gone through
     * genArticleInfo() and meet the prerequisites for it
     * Requires links to have been generated from
     * genArticleLinks()
     * @author unknown
     */
    public function getArticlePreformat($args)
    {
        $info  = $args['info'];
        $links = $args['links'];

        // Preformat the text according the article format type
        $hometext = $info['hometype'] ? $info['hometext'] : nl2br($info['hometext']);
        $bodytext = $info['bodytype'] ? $info['bodytext'] : nl2br($info['bodytext']);

        // Only bother with readmore if there is more to read
        $bytesmore = strlen($info['bodytext']);
        $readmore = '';
        $bytesmorelink = '';
        if ($bytesmore > 0) {
            if (SecurityUtil::checkPermission('News::', "{$info['cr_uid']}::{$info['sid']}", ACCESS_READ)) {
                $title =  $this->__('Read more...');
                $readmore = '<a title="'.$title.'" href="'.$links['fullarticle'].'">'.$title.'</a>';
            }
            $bytesmorelink = $this->__f('%s bytes more', $bytesmore);
        }

        // Allowed to read full article?
        if (SecurityUtil::checkPermission('News::', "{$info['cr_uid']}::{$info['sid']}", ACCESS_READ)) {
            $title = '<a href="'.$links['fullarticle'].'" title="'.$info['title'].'">'.$info['title'].'</a>';
            $print = '<a class="news_printlink" href="'.$links['print'].'">'.$this->__('Print').' <img src="images/icons/extrasmall/printer.png" height="16" width="16" alt="[P]" title="'.$this->__('Printer-friendly page').'" /></a>';
            $printicon = '<a class="news_printlink" href="'.$links['print'].'"><img src="images/icons/extrasmall/printer.png" height="16" width="16" alt="[P]" title="'.$this->__('Printer-friendly page').'" /></a>';
        } else {
            $title = $info['title'];
            $print = '';
            $printicon = '';
        }

        $comment = '';
        $commentlink = '';
        if (ModUtil::available('EZComments') && $info['allowcomments'] == 1) {
            // Work out how to say 'comment(s)(?)' correctly
            $comment = ($info['commentcount'] == 0) ? $this->__('Comments?') : $this->_fn('%s comment', '%s comments', $info['commentcount'], $info['commentcount']);

            // Allowed to comment?
            if (SecurityUtil::checkPermission('News::', "{$info['cr_uid']}::{$info['sid']}", ACCESS_COMMENT)) {
                $commentlink = '<a title="'.$this->__f('%1$s about %2$s', array($info['commentcount'], $info['title'])).'" href="'.$links['comment'].'">'.$comment.'</a>';
            } else if (SecurityUtil::checkPermission('News::', "{$info['cr_uid']}::{$info['sid']}", ACCESS_READ)) {
                $commentlink = $comment;
            }
        }

        // Notes, if there are any
        $notes = (isset($info['notes']) && !empty($info['notes'])) ? $this->__f('Footnote: %s', $info['notes']) : '';

        // Build the categories preformated content
        $categories = array();
        $categorynames = array();
        if (!empty($links['categories']) && is_array($links['categories']) && $this->getVar('enablecategorization')) {
            $lang = ZLanguage::getLanguageCode();
            $properties = array_keys($links['categories']);
            foreach ($properties as $prop) {
                $catname = isset($info['categories'][$prop]['display_name'][$lang]) ? $info['categories'][$prop]['display_name'][$lang] : $info['categories'][$prop]['name'];
                $categories[$prop] = '<a href="'.$links['categories'][$prop].'">'.$catname.'</a>';
                $categorynames[$prop] = $catname;
            }
        }

        // Set up the array itself
        $preformat = array(
                'bodytext'      => $bodytext,
                'bytesmore'     => $bytesmorelink,
                'category'      => '<a href="'.$links['category'].'" title="'.$info['cattitle'].'">'.$info['cattitle'].'</a>',
                'categories'    => $categories,
                'categorynames' => $categorynames,
                'comment'       => $comment,
                'commentlink'   => $commentlink,
                'hometext'      => $hometext,
                'notes'         => $notes,
                'print'         => $print,
                'printicon'     => $printicon,
                'readmore'      => $readmore,
                'title'         => $title);

        if (!empty($info['topicimage'])) {
            $catimagepath = $this->getVar('catimagepath');
            $preformat['searchtopic'] = '<a href="'.DataUtil::formatForDisplay($links['searchtopic']).'"><img src="'.$catimagepath.$info['topicimage'] .'" title="'.$info['topictext'].'" alt="'.$info['topictext'].'" /></a>';
        } else {
            $preformat['searchtopic'] = '';
        }

        if (isset($info['cat'])) {
            $preformat['catandtitle'] = $preformat['category'].': '.$preformat['title'];
        } else {
            $preformat['catandtitle'] = $preformat['title'];
        }

        return $preformat;
    }

    /**
     * create a new News item
     *
     * @param $args['name'] name of the item
     * @param $args['number'] number of the item
     * @return mixed News item ID on success, false on failure
     */
    public function create($args)
    {
        // Argument check
        if (!isset($args['title']) || empty($args['title']) ||
                !isset($args['hometext']) ||
                !isset($args['hometextcontenttype']) ||
                !isset($args['bodytext']) ||
                !isset($args['bodytextcontenttype']) ||
                !isset($args['notes'])) {
            return LogUtil::registerArgsError();
        }

        // evaluates the input action
        $args['action'] = isset($args['action']) ? $args['action'] : null;
        switch ($args['action'])
        {
            case News_Controller_User::ACTION_SUBMIT: // submitted => pending
                $args['published_status'] = self::STATUS_PENDING;
                break;
            case News_Controller_User::ACTION_PUBLISH:
            case News_Controller_User::ACTION_REJECT:
            case News_Controller_User::ACTION_SAVEPENDING:
            case News_Controller_User::ACTION_ARCHIVE:
                $args['published_status'] = $args['action']-2;
                break;
            case News_Controller_User::ACTION_SAVEDRAFT:
            case News_Controller_User::ACTION_SAVEDRAFT_RETURN:
                $args['published_status'] = self::STATUS_DRAFT;
                break;
        }

        // Security check
        if (!SecurityUtil::checkPermission('News::', '::', ACCESS_COMMENT)) {
            return LogUtil::registerPermissionError();

        } elseif (SecurityUtil::checkPermission('News::', '::', ACCESS_ADD)) {
            if (!isset($args['published_status'])) {
                $args['published_status'] = self::STATUS_PUBLISHED;
            }
        } else {
            $args['published_status'] = self::STATUS_PENDING;
        }

        // calculate the format type
        $args['format_type'] = ($args['bodytextcontenttype']%4)*4 + $args['hometextcontenttype']%4;

        // define the lowercase permalink, using the title as slug, if not present
        if (!isset($args['urltitle']) || empty($args['urltitle'])) {
            $args['urltitle'] = strtolower(DataUtil::formatPermalink($args['title']));
        }

        // check the publishing date options
        if ((!isset($args['from']) && !isset($args['to'])) || (isset($args['unlimited']) && !empty($args['unlimited']))) {
            $args['from'] = null;
            $args['to'] = null;
        } elseif (isset($args['from']) && (isset($args['tonolimit']) && !empty($args['tonolimit']))) {
            $args['from'] = DateUtil::formatDatetime($args['from']);
            $args['to'] = null;
        } else {
            $args['from'] = DateUtil::formatDatetime($args['from']);
            $args['to'] = DateUtil::formatDatetime($args['to']);
        }

        // Work out name of story submitter and approver
        $args['approver'] = 0;
        if (!UserUtil::isLoggedIn() && empty($args['contributor'])) {
            $args['contributor'] = System::getVar('anonymous');
        } else {
            $args['contributor'] = UserUtil::getVar('uname');
            if ($args['published_status'] == self::STATUS_PUBLISHED) {
                $args['approver'] = UserUtil::getVar('uid');
            }
        }

        $args['counter']  = 0;
        $args['comments'] = 0;

        if (!($obj = DBUtil::insertObject($args, 'news', 'sid'))) {
            return LogUtil::registerError($this->__('Error! Could not create new article.'));
        }

        // update the from field to the same cr_date if it's null
        if (is_null($args['from'])) {
            $obj = array('sid'  => $obj['sid'], 'from' => $obj['cr_date']);
            if (!DBUtil::updateObject($obj, 'news', '', 'sid')) {
                LogUtil::registerError($this->__('Error! Could not save your changes.'));
            }
        }

        // Return the id of the newly created item to the calling process
        return $args['sid'];
    }

    /**
     * analize if the News module has an Scribite! editor assigned
     */
    public function isformatted($args)
    {
        if (!isset($args['func'])) {
            $args['func'] = 'all';
        }

        if (ModUtil::available('scribite')) {
            $modinfo = ModUtil::getInfo(ModUtil::getIdFromName('scribite'));
            if (version_compare($modinfo['version'], '2.2', '>=')) {
                $apiargs = array('modulename' => 'News'); // parameter handling corrected in 2.2
            } else {
                $apiargs = 'News'; // old direct parameter
            }

            $modconfig = ModUtil::apiFunc('scribite', 'user', 'getModuleConfig', $apiargs);
            if (in_array($args['func'], (array)$modconfig['modfuncs']) && $modconfig['modeditor'] != '-') {
                return true;
            }
        }

        return false;
    }

    private function _getCategoryField()
    {
        return 'Main';
    }

    private function _getTopicField()
    {
        $prop = $this->getVar('topicproperty');
        return empty($prop) ? 'Main' : $prop;
    }

    /**
     * get meta data for the module
     */
    public function getmodulemeta()
    {
        return array('viewfunc'    => 'view',
                'displayfunc' => 'display',
                'newfunc'     => 'newitem',
                'createfunc'  => 'create',
                'modifyfunc'  => 'modify',
                'updatefunc'  => 'update',
                'deletefunc'  => 'delete',
                'titlefield'  => 'title',
                'itemid'      => 'sid');
    }

    /**
     * decode a short url
     */
    public function decodeurl($args)
    {
        // check we actually have some vars to work with...
        if (!isset($args['vars'])) {
            return LogUtil::registerArgsError();
        }

        // define the available user functions
        $funcs = array('main', 'newitem', 'create', 'view', 'archives', 'display', 'categorylist', 'displaypdf');
        // set the correct function name based on our input
        if (empty($args['vars'][2])) {
            System::queryStringSetVar('func', 'view');
            $nextvar = 3;
        } elseif ($args['vars'][2] == 'page') {
            System::queryStringSetVar('func', 'view');
            $nextvar = 3;
        } elseif (!in_array($args['vars'][2], $funcs)) {
            System::queryStringSetVar('func', 'display');
            $nextvar = 2;
        } else {
            System::queryStringSetVar('func', $args['vars'][2]);
            $nextvar = 3;
        }
        System::queryStringSetVar('type', 'user');
        
        $func = FormUtil::getPassedValue('func', 'view', 'GET');

        // for now let the core handle the view function
        if (($func == 'view' || $func == 'main') && isset($args['vars'][$nextvar])) {
            System::queryStringSetVar('page', (int)$args['vars'][$nextvar]);
        }

        // add the category info
        if ($func == 'view' && isset($args['vars'][$nextvar])) {
            if ($args['vars'][$nextvar] == 'page') {
                System::queryStringSetVar('page', (int)$args['vars'][$nextvar+1]);
            } else {
                System::queryStringSetVar('prop', $args['vars'][$nextvar]);
                if (isset($args['vars'][$nextvar+1])) {
                    $numargs = count($args['vars']);
                    if ($args['vars'][$numargs-2] == 'page' && is_numeric($args['vars'][$numargs-1])) {
                        System::queryStringSetVar('cat', (string)implode('/', array_slice($args['vars'], $nextvar+1, -2)));
                        System::queryStringSetVar('page', (int)$args['vars'][$numargs-1]);
                    } else {
                        System::queryStringSetVar('cat', (string)implode('/', array_slice($args['vars'], $nextvar+1)));
                        System::queryStringSetVar('page', 1);
                    }
                }
            }
        }

        // identify the correct parameter to identify the news article
        if ($func == 'display' || $func == 'displaypdf') {
            // check the permalink structure and obtain any missing vars
            $permalinkkeys = array_flip(explode('/', $this->getVar('permalinkformat')));
            // get rid of unused vars
            $args['vars'] = array_slice($args['vars'], $nextvar);

            // remove any category path down to the leaf category
            $permalinkkeycount = count($permalinkkeys);
            $varscount = count($args['vars']);
            ($args['vars'][$varscount-2] == 'page') ? $pagersize = 2 : $pagersize = 0 ;
            if (($permalinkkeycount + $pagersize) != $varscount) {
                array_splice($args['vars'], $permalinkkeys['%category%'],  $varscount - $permalinkkeycount);
            }

            // get the story id or title
            foreach ($permalinkkeys as $permalinkvar => $permalinkkey) {
                System::queryStringSetVar(str_replace('%', '', $permalinkvar), $args['vars'][$permalinkkey]);
            }

            if (isset($permalinkkeys['%articleid%']) && isset($args['vars'][$permalinkkeys['%articleid%']]) && is_numeric($args['vars'][$permalinkkeys['%articleid%']])) {
                System::queryStringSetVar('sid', $args['vars'][$permalinkkeys['%articleid%']]);
                $nextvar = $permalinkkeys['%articleid%']+1;
            } else {
                System::queryStringSetVar('title', $args['vars'][$permalinkkeys['%articletitle%']]);
                $nextvar = $permalinkkeys['%articletitle%']+1;
            }
            if (isset($args['vars'][$nextvar]) && $args['vars'][$nextvar] == 'page') {
                System::queryStringSetVar('page', (int)$args['vars'][$nextvar+1]);
            }
        }

        // handle news archives
        if ($func == 'archives') {
            if (isset($args['vars'][$nextvar])) {
                System::queryStringSetVar('year', $args['vars'][$nextvar]);
                if (isset($args['vars'][$nextvar+1])) {
                    System::queryStringSetVar('month', $args['vars'][$nextvar+1]);
                }
            }
        }

        return true;
    }

    /**
     * encode an url to News into a shorturl
     */
    public function encodeurl($args)
    {
        // check we have the required input
        if (!isset($args['modname']) || !isset($args['func']) || !isset($args['args'])) {
            return LogUtil::registerArgsError();
        }
        if (!isset($args['type'])) {
            $args['type'] = 'user';
        }
        if (empty($args['func'])) {
            $args['func'] = 'view';
        }

        // create an empty string ready for population
        $vars = '';

        // for the display function use the defined permalink structure
        if ($args['func'] == 'display' || $args['func'] == 'displaypdf') {
            // check for the generic object id parameter
            if (isset($args['args']['objectid'])) {
                $args['args']['sid'] = $args['args']['objectid'];
            }
            // check the permalink structure and obtain any missing vars
            $permalinkformat = $this->getVar('permalinkformat');
            // insanity check for permalink format incase of corruption
            if (!isset($permalinkformat) || is_array($permalinkformat) || empty($permalinkformat)) {
                $this->setVar('permalinkformat', '%year%/%monthnum%/%day%/%articletitle%');
                $permalinkformat = $this->getVar('permalinkformat');
            }

            if (isset($args['args']['from']) && isset($args['args']['urltitle'])) {
                $date = getdate(strtotime($args['args']['from']));
                $in = array('%category%', '%articleid%', '%articletitle%', '%year%', '%monthnum%', '%monthname%', '%day%');
                $out = array((isset($args['args']['__CATEGORIES__']['Main']['path_relative']) ? $args['args']['__CATEGORIES__']['Main']['path_relative'] : null), $args['args']['sid'], $args['args']['urltitle'], $date['year'], $date['mon'], strtolower(substr($date['month'], 0 , 3)), $date['mday']);
            } else {
                // get the item (will be cached by DBUtil)
                $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $args['args']['sid']));
                $date = getdate(strtotime($item['from']));
                $in = array('%category%', '%articleid%', '%articletitle%', '%year%', '%monthnum%', '%monthname%', '%day%');
                $out = array((isset($item['__CATEGORIES__']['Main']['path_relative']) ? $item['__CATEGORIES__']['Main']['path_relative'] : null), $item['sid'], $item['urltitle'], $date['year'], $date['mon'], strtolower(substr($date['month'], 0 , 3)), $date['mday']);
            }
            // replace the vars to form the permalink
            $vars = str_replace($in, $out, $permalinkformat);
            if (isset($args['args']['page']) && $args['args']['page'] != 1) {
                $vars .= '/page/'.$args['args']['page'];
            }
        }

        // for the archives use year/month
        if ($args['func'] == 'archives' && isset($args['args']['year']) && isset($args['args']['month'])) {
            $vars = "{$args['args']['year']}/{$args['args']['month']}";
        }

        // add the category name to the view link
        if ($args['func'] == 'view' && isset($args['args']['prop'])) {
            $vars = $args['args']['prop'];
            $vars .= isset($args['args']['cat']) ? '/'.$args['args']['cat'] : '';
        }

        // view, main or now function pager
        if (isset($args['args']['page']) && is_numeric($args['args']['page']) &&
                ($args['func'] == '' || $args['func'] == 'main' || $args['func'] == 'view')) {
            if (!empty($vars)) {
                $vars .= "/page/{$args['args']['page']}";
            } else {
                $vars = "page/{$args['args']['page']}";
            }
        }

        // construct the custom url part
        if (empty($vars)) {
            return $args['modname'] . '/' . $args['func'] . '/';
        } else {
            return $args['modname'] . '/' . $args['func'] . '/' . $vars . '/';
        }
    }

    /**
     * get module links
     *
     * @return array array of admin links
     */
    public function getlinks()
    {
        if (!SecurityUtil::checkPermission('News::', '::', ACCESS_OVERVIEW)) {
            return;
        }

        $func = FormUtil::getPassedValue('func', 'view');
        $links = array();

        if (SecurityUtil::checkPermission('News::', '::', ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('News', 'user', 'view', array('theme' => 'RSS', 'displayonindex' => 1)),
                    'text' => '',
                    'class' => 'z-icon-es-rss');
            $links[] = array('url' => ModUtil::url('News', 'user', 'view', array('displayonindex' => 1)),
                    'text' => $this->__('News articles list'),
                    'class' => 'z-icon-es-view');
            if ($this->getVar('enablecategorization')) {
                if ($func <> "categorylist") {
                    $links[] = array('url' => ModUtil::url('News', 'user', 'categorylist'),
                            'text' =>  $this->__('News categories'),
                            'class' => 'z-icon-es-view');
                }
                if ($func <> "archives") {
                    $links[] = array('url' => ModUtil::url('News', 'user', 'archives'),
                            'text' => $this->__('News archive'),
                            'class' => 'z-icon-es-archive');
                }
            }
        }
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_COMMENT)) {
            if (FormUtil::getPassedValue('func', null, 'GET') <> 'newitem') {
                $links[] = array('url' => ModUtil::url('News', 'user', 'newitem'),
                        'text' => $this->__('Submit an article'),
                        'class' => 'z-icon-es-new');
            }
        }
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_EDIT)) {
            $count = $this->countitems(array('status' => 2));
            if ($count > 0) {
                $links[] = array('url' => ModUtil::url('News', 'admin', 'view', array('news_status' => 2)),
                        'text' => $this->_fn('%s pending article', '%s pending articles', $count, $count),
                        'class' => 'z-icon-es-config');
            } else {
                $links[] = array('url' => ModUtil::url('News', 'admin', 'view'),
                        'text' => $this->__('Admin'),
                        'class' => 'z-icon-es-config');
            }
        }

        return $links;
    }

    /**
     * populate an array with each part of the where clause and then implode the array if there is a need.
     *
     * @param array $args
     * @param boolean $prependWhere
     * @return string
     */
    protected function generateWhere($args) {
        $tables = DBUtil::getTables();
        $news_column = $tables['news_column'];
        $queryargs = array();

        if (System::getVar('multilingual') == 1 && !$args['ignoreml'] && empty($args['language'])) {
            $queryargs[] = "({$news_column['language']} = '" . DataUtil::formatForStore(ZLanguage::getLanguageCode()) . "' OR {$news_column['language']} = '')";
        } elseif (!empty($args['language'])) {
            $queryargs[] = "{$news_column['language']} = '" . DataUtil::formatForStore($args['language']) . "'";
        }

        if (isset($args['status'])) {
            $queryargs[] = "{$news_column['published_status']} = '" . DataUtil::formatForStore($args['status']) . "'";
        }

        if (isset($args['displayonindex'])) {
            $queryargs[] = "{$news_column['displayonindex']} = '" . DataUtil::formatForStore($args['displayonindex']) . "'";
        }

        // Check for specific date interval
        if (isset($args['from']) || isset($args['to'])) {
            // Both defined
            if (isset($args['from']) && isset($args['to'])) {
                $from = DataUtil::formatForStore($args['from']);
                $to   = DataUtil::formatForStore($args['to']);
                $queryargs[] = "({$news_column['from']} >= '$from' AND {$news_column['from']} < '$to')";
                // Only 'from' is defined
            } elseif (isset($args['from'])) {
                $date = DataUtil::formatForStore($args['from']);
                $queryargs[] = "({$news_column['from']} >= '$date' AND ({$news_column['to']} IS NULL OR {$news_column['to']} >= '$date'))";
                // Only 'to' is defined
            } elseif (isset($args['to'])) {
                $date = DataUtil::formatForStore($args['to']);
                $queryargs[] = "({$news_column['from']} < '$date')";
            }
            // or can filter with the current date
        } elseif ((isset($args['filterbydate'])) && ($args['filterbydate'])) {
            $date = DateUtil::getDatetime();
            $queryargs[] = "('$date' >= {$news_column['from']} AND ({$news_column['to']} IS NULL OR '$date' <= {$news_column['to']}))";
        }

        if (isset($args['tdate'])) {
            $queryargs[] = "{$news_column['from']} LIKE '%{$args['tdate']}%'";
        }

        if (isset($args['query']) && is_array($args['query'])) {
            // query array with rows like {'field', 'op', 'value'}
            $allowedoperators = array('>', '>=', '=', '<', '<=', 'LIKE', '!=', '<>');
            foreach ($args['query'] as $row) {
                if (is_array($row) && count($row) == 3) {
                    // validate fields and operators
                    list($field, $op, $value) = $row;
                    if (isset($news_column[$field]) && in_array($op, $allowedoperators)) {
                        $queryargs[] = "$news_column[$field] $op '".DataUtil::formatForStore($value)."'";
                    }
                }
            }
        }

        // check for a specific author
        if (isset($args['uid']) && is_numeric($args['uid'])) {
            $queryargs[] = "{$news_column['cr_uid']} = '" . DataUtil::formatForStore($args['uid']) . "'";
        }

        $where = '';
        if (count($queryargs) > 0) {
            $where = implode(' AND ', $queryargs);
        }

        return $where;
    }

    /**
     * create Category Filter
     *
     * @param array $args
     * @return array
     */
    protected function getCatFilter($args) {
        $catFilter = array();
        if (isset($args['category']) && !empty($args['category'])){
            if (is_array($args['category'])) {
                $catFilter = $args['category'];
            } elseif (isset($args['property'])) {
                $property = $args['property'];
                $catFilter[$property] = $args['category'];
            }
            $catFilter['__META__'] = array('module' => 'News');
        } elseif (isset($args['catfilter'])) {
            $catFilter = $args['catfilter'];
        }
        return $catFilter;
    }
}

