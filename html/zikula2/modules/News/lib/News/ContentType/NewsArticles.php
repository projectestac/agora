<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Mateo Tibaquira [mateo]
 * @author Erik Spaan [espaan]
 * @package Zikula_Value_Addons
 * @subpackage News
 */

/**
 * Content plugin class for news articles
 */
class News_ContentType_NewsArticles extends Content_AbstractContentType
{

    // indispensable vars
    public $title;
    public $categories;
    public $status;
    public $show;
    public $limit;
    public $orderoptions;
    // config flags
    public $dayslimit;
    public $maxtitlelength;
    public $titlewraptext;
    public $disphometext;
    public $maxhometextlength;
    public $hometextwraptext;
    public $dispuname;
    public $dispdate;
    public $dateformat;
    public $dispreads;
    public $dispcomments;
    public $dispsplitchar;
    public $dispnewimage;
    public $newimagelimit;
    public $newimageset;
    public $newimagesrc;
    public $linktosubmit;
    public $customtemplate;

    public function getTitle()
    {
        return $this->__('Recent news articles');
    }

    public function getDescription()
    {
        return $this->__('Displays a specific number of news articles from one or all categories available');
    }

    public function isTranslatable()
    {
        return false;
    }

    /**
     * Load the data into the object
     */
    public function loadData(&$data)
    {
        // Get the registrered categories for the News module
        $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
        $properties = array_keys($catregistry);

        // indispensable vars
        $this->title = $data['title'];
        // Store the the seperate category related form returns in the categories array for News catfiltering
        $this->categories = array();
        foreach ($properties as $prop) {
            if (!empty($data['category__' . $prop])) {
                $this->categories[$prop] = $data['category__' . $prop];
            }
        }
        $this->status = $data['status'];
        $this->show = $data['show'];
        $this->limit = $data['limit'];
        $this->orderoptions = $data['orderoptions'];
        // config flags
        $this->dayslimit = $data['dayslimit'];
        $this->maxtitlelength = $data['maxtitlelength'];
        $this->titlewraptext = $data['titlewraptext'];
        $this->disphometext = $data['disphometext'];
        $this->maxhometextlength = $data['maxhometextlength'];
        $this->hometextwraptext = $data['hometextwraptext'];
        $this->dispuname = $data['dispuname'];
        $this->dispdate = $data['dispdate'];
        $this->dateformat = $data['dateformat'];
        $this->dispreads = $data['dispreads'];
        $this->dispcomments = isset($data['dispcomments']) ? $data['dispcomments'] : false;
        $this->dispsplitchar = $data['dispsplitchar'];
        $this->dispnewimage = $data['dispnewimage'];
        $this->newimagelimit = $data['newimagelimit'];
        $this->newimageset = $data['newimageset'];
        $this->newimagesrc = $data['newimagesrc'];
        $this->linktosubmit = $data['linktosubmit'];
        $this->customtemplate = !empty($data['customtemplate']) ? $data['customtemplate']: '';
    }

    /**
     * Display the data to the containing Content page
     */
    public function display()
    {
        // Parameters for category related items properties like topicimage
        $lang = ZLanguage::getLanguageCode();
        $topicProperty = ModUtil::getVar('News', 'topicproperty');
        $topicField = empty($topicProperty) ? 'Main' : $topicProperty;

        // work out the parameters for the News api call
        $apiargs = array();
        switch ($this->show)
        {
            case 3: // non index page articles
                $apiargs['displayonindex'] = 0;
                break;
            case 2: // index page articles
                $apiargs['displayonindex'] = 1;
                break;
            // all - doesn't need displayonindex
        }
        $apiargs['numitems'] = $this->limit; // Nr of articles to obtain
        $apiargs['status'] = (int) $this->status; // Published status
        // Handle the sorting order
        switch ($this->orderoptions)
        {
            case 2:
                $apiargs['order'] = 'weight';
                break;
            case 3:
                $apiargs['order'] = 'random';
                break;
            case 1:
                $apiargs['order'] = 'counter';
                break;
            case 0:
            default:
            // Use News module setting, so don't set apiargs[order]
        }

        $enablecategorization = ModUtil::getVar('News', 'enablecategorization');

        // Make a category filter only if categorization is enabled in News module
        if ($enablecategorization && $this->categories != null) {
            // Get the registrered categories for the News module
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $apiargs['catregistry'] = $catregistry;
            $apiargs['category'] = $this->categories;
        }

        // Limit the shown articles in days using DateUtil
        if ((int) $this->dayslimit > 0 && $vars['order'] == 0) {
            $apiargs['from'] = DateUtil::getDatetime_NextDay(-$this->dayslimit);
            $apiargs['to'] = DateUtil::getDatetime();
        }

        // Apply datefiltering
        $apiargs['filterbydate'] = true;

        // call the News api and get the requested articles with the above arguments
        $items = ModUtil::apiFunc('News', 'user', 'getall', $apiargs);

        // UserUtil is not automatically loaded, so load it now if needed and set anonymous
        if ($this->dispuname) {
            $anonymous = System::getVar('anonymous');
        }

        // check for an empty return
        if (!empty($items)) {
            // loop through the items and prepare for display
            foreach (array_keys($items) as $k)
            {
                // Get specific information from the article. It was a choice not to use the pnuserapi functions
                // GetArticleInfo, GetArticleLinks and getArticlesPreformat because of speed etc.
                // --- Check for Topic related properties like topicimage, topicsearchurl etc.
                if ($enablecategorization && !empty($items[$k]['__CATEGORIES__']) && isset($items[$k]['__CATEGORIES__'][$topicField])) {
                    $items[$k]['topicid'] = $items[$k]['__CATEGORIES__'][$topicField]['id'];
                    $items[$k]['topicname'] = isset($items[$k]['__CATEGORIES__'][$topicField]['display_name'][$lang]) ? $items[$k]['__CATEGORIES__'][$topicField]['display_name'][$lang] : $items[$k]['__CATEGORIES__'][$topicField]['name'];
                    // set the topic image if topic_image category property exists
                    $items[$k]['topicimage'] = (isset($items[$k]['__CATEGORIES__'][$topicField]['__ATTRIBUTES__']) && isset($items[$k]['__CATEGORIES__'][$topicField]['__ATTRIBUTES__']['topic_image'])) ? $items[$k]['__CATEGORIES__'][$topicField]['__ATTRIBUTES__']['topic_image'] : '';
                    // set the topic description if exists
                    $items[$k]['topictext'] = isset($items[$k]['__CATEGORIES__'][$topicField]['display_desc'][$lang]) ? $items[$k]['__CATEGORIES__'][$topicField]['display_desc'][$lang] : '';
                    // set the path of the topic
                    $items[$k]['topicpath'] = isset($items[$k]['__CATEGORIES__'][$topicField]['path_relative']) ? $items[$k]['__CATEGORIES__'][$topicField]['path_relative'] : '';
                    // set the url to search for this topic
                    if (System::getVar('shorturls', false)) {
                        $items[$k]['topicsearchurl'] = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => $topicField, 'cat' => $items[$k]['topicpath'])));
                    } else {
                        $items[$k]['topicsearchurl'] = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => $topicField, 'cat' => $items[$k]['topicid'])));
                    }
                } else {
                    $items[$k]['topicid'] = null;
                    $items[$k]['topicname'] = '';
                    $items[$k]['topicimage'] = '';
                    $items[$k]['topictext'] = '';
                    $items[$k]['topicpath'] = '';
                    $items[$k]['topicsearchurl'] = '';
                }

                // Optional new image if the difference in days from the publishing date and now < the specified limit
                $items[$k]['dispnewimage'] = ($this->dispnewimage && DateUtil::getDatetimeDiff_AsField($items[$k]['from'], DateUtil::getDatetime(), 3) < (int) $this->newimagelimit);
                // Wrap the title if needed
                $items[$k]['titlewrapped'] = false;
                if ((int) $this->maxtitlelength > 0 && strlen($items[$k]['title']) > (int) $this->maxtitlelength) {
                    // wrap the title
                    $items[$k]['title'] = substr($items[$k]['title'], 0, (int) $this->maxtitlelength);
                    $items[$k]['titlewrapped'] = true;
                    //$items[$k]['title'] .= $this->titlewraptext;
                }
                // Get the user information from the author id
                if ($this->dispuname) {
                    if ($items[$k]['cr_uid'] == 0) {
                        $items[$k]['uname'] = $anonymous;
                        $items[$k]['aid_name'] = $anonymous;
                    } else {
                        $user = UserUtil::getVars($items[$k]['cr_uid']);
                        $items[$k]['uname'] = $user['uname'];
                        $items[$k]['aid_name'] = $user['uname'];
                    }
                }
                // Get the optional commentcount if EZComments is available
                if ($this->dispcomments && ModUtil::available('EZComments')) {
                    $items[$k]['comments'] = ModUtil::apiFunc('EZComments', 'user', 'countitems', array('mod' => 'News', 'objectid' => $items[$k]['sid'], 'status' => 0));
                }
                // Optional display of the hometext (frontpage teaser)
                if ($this->disphometext) {
                    if ($this->maxhometextlength > 0 && strlen(strip_tags($items[$k]['hometext'])) > (int) $this->maxhometextlength) {
                        $items[$k]['hometextwrapped'] = true;
                    }
                }
                $items[$k]['readperm'] = (SecurityUtil::checkPermission('News::', "$items[$k][cr_uid]::$items[$k][sid]", ACCESS_READ));
            }
            if ($this->dispuname || $this->dispdate || $this->dispreads || $this->dispcomments) {
                $this->view->assign('dispinfo', true);
                $this->view->assign('dispuname', $this->dispuname);
                $this->view->assign('dispdate', $this->dispdate);
                $this->view->assign('dispreads', $this->dispreads);
                $this->view->assign('dispcomments', $this->dispcomments);
                $this->view->assign('dispsplitchar', $this->dispsplitchar);
            } else {
                $this->view->assign('dispinfo', false);
            }
            if ($this->dispnewimage) {
                $this->view->assign('newimageset', $this->newimageset);
                $this->view->assign('newimagesrc', $this->newimagesrc);
            }
            $this->view->assign('disphometext', $this->disphometext);
            if ($this->disphometext) {
                $this->view->assign('hometextwraptext', $this->hometextwraptext);
                $this->view->assign('maxhometextlength', $this->maxhometextlength);
            }
            $this->view->assign('titlewraptext', $this->titlewraptext);
        }
        $this->view->assign('catimagepath', ModUtil::getVar('News', 'catimagepath'));
        $this->view->assign('dateformat', $this->dateformat);
        $this->view->assign('linktosubmit', $this->linktosubmit);
        $this->view->assign('stories', $items);
        $this->view->assign('title', $this->title);
        $this->view->assign('useshorturls', System::getVar('shorturls', false));

        return $this->view->fetch($this->getTemplate());
    }

    /**
     * In Content editing mode this shows the Content plugin contents
     */
    public function displayEditing()
    {
        $properties = array_keys($this->categories);
        $lang = ZLanguage::getLanguageCode();
        // Construct the selected categories array
        $catnames = array();
        foreach ($properties as $prop) {
            foreach ($this->categories[$prop] as $catid) {
                $cat = CategoryUtil::getCategoryByID($catid);
                $catnames[] = isset($cat['display_name'][$lang]) ? $cat['display_name'][$lang] : $cat['name'];
            }
        }
        $catname = implode(' | ', $catnames);
        $output = '<h4>' . DataUtil::formatForDisplayHTML($this->title) . '</h4>';
        $output .= '<p>' . $this->__f('News articles listed under the \'%s\' category', $catname) . '</p>';
        return $output;
    }

    /**
     * Load the intial data into the object
     */
    public function getDefaultData()
    {
        $defaultdata = array(
            'title' => '',
            'categories' => null,
            'status' => 0,
            'show' => 1,
            'limit' => 5,
            'orderoptions' => 0,
            'dayslimit' => 0,
            'maxtitlelength' => 0,
            'titlewraptext' => '...',
            'disphometext' => false,
            'maxhometextlength' => 300,
            'hometextwraptext' => '[' . $this->__('Read more...') . ']',
            'dispuname' => true,
            'dispdate' => true,
            'dateformat' => '%x',
            'dispreads' => false,
            'dispcomments' => false,
            'dispsplitchar' => ',',
            'dispnewimage' => false,
            'newimagelimit' => 3,
            'newimageset' => 'icons/extrasmall',
            'newimagesrc' => 'favorites.png',
            'linktosubmit' => true,
            'customtemplate' => '');
        
        // Get the registered categories for the News module
        $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
        $properties = array_keys($catregistry);

        // set a default category based on page category
        foreach ($properties as $prop) {
            $subcats_fulldata = CategoryUtil::getCategoriesByParentID($catregistry[$prop]);
            $subcats = array();
            foreach ($subcats_fulldata as $subcat_fulldata) {
                $subcats[] = $subcat_fulldata['id'];
            }
            if (in_array($this->getPageCategoryId(), $subcats)) {
                // this awkward array format iswhat $this->loadData() interprets to set category
                $defaultdata['category__' . $prop] = $this->getPageCategoryId();
            }
        }

        return $defaultdata;
    }

    /**
     * Fill some variables before the editing of the plugin parameters
     */
    public function startEditing()
    {
        // Get the News categorization setting
        $enablecategorization = ModUtil::getVar('News', 'enablecategorization');
        // Select categories only if enabled for the News module, otherwise selector will not be shown in modify template
        if ($enablecategorization) {
            // Get the registrered categories for the News module
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $this->view->assign('catregistry', $catregistry);
        }
        $this->view->assign('enablecategorization', $enablecategorization);

        $showoptions = array(
            array('value' => 1, 'text' => $this->__('Show all news articles')),
            array('value' => 2, 'text' => $this->__('Show only articles set for index page listing')),
            array('value' => 3, 'text' => $this->__('Show only articles not set for index page listing'))
        );

        $statusoptions = array(
            array('value' => 0, 'text' => $this->__('Published')),
            array('value' => 1, 'text' => $this->__('Rejected')),
            array('value' => 2, 'text' => $this->__('Pending Review')),
            array('value' => 3, 'text' => $this->__('Archived')) /* ,
                  array('value' => 4, 'text' => $this->__('Draft')) */
        );

        $orderoptions = array(
            array('value' => 0, 'text' => $this->__('News publisher setting')),
            array('value' => 1, 'text' => $this->__('Number of pageviews')),
            array('value' => 2, 'text' => $this->__('Article weight')),
            array('value' => 3, 'text' => $this->__('Random'))
        );

        $this->view->assign('showoptions', $showoptions);
        $this->view->assign('statusoptions', $statusoptions);
        $this->view->assign('orderoptions', $orderoptions);
    }

    /**
     * Optional checking of the entered data
     */
    public function isValid(&$data)
    {
        /* $r = '/\?v=([-a-zA-Z0-9_]+)(&|$)/';
          if (preg_match($r, $data['url'], $matches))
          {
          $this->videoId = $data['videoId'] = $matches[1];
          return true;
          }
          $message = $this->__('Invalid input');
          return false; */
        return true;
    }

    public function getTemplate()
    {
        $this->view->setCacheId($this->contentId);
        if (!empty($this->customtemplate)) {
            $template = 'contenttype/' . $this->customtemplate;
        } else {
            $template = 'contenttype/newsarticles_view.tpl';
        }
        return $template;
    }
}