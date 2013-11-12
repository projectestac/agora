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
class News_Controller_User extends Zikula_AbstractController
{
    const ACTION_PREVIEW = 0;
    const ACTION_SUBMIT = 1;
    const ACTION_PUBLISH = 2;
    const ACTION_REJECT = 3;
    const ACTION_SAVEPENDING = 4;
    const ACTION_ARCHIVE = 5;
    const ACTION_SAVEDRAFT = 6;
    const ACTION_SAVEDRAFT_RETURN = 8;

    /**
     * the main user function
     * @deprecated
     * @return redirect
     */
    public function main()
    {
        $args = array(
            'displayonindex' => 1,
            'itemsperpage' => $this->getVar('storyhome', 10)
        );
        $this->redirect(ModUtil::url('News', 'user', 'view', $args));
    }
    
    /**
     * add new item
     *
     * @author Mark West
     * @return string HTML string
     */
    public function newitem($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_COMMENT), LogUtil::getErrorMsgPermission());

        // Any item set for preview will be stored in a session var
        // Once the new article is posted we'll clear the session var.
        $item = array();
        $sess_item = SessionUtil::getVar('newsitem');

        // get the type parameter so we can decide what template to use
        $type = FormUtil::getPassedValue('type', 'user', 'REQUEST');

        // Set the default values for the form. If not previewing an item prior
        // to submission these values will be null but do need to be set
        $item['sid'] = isset($sess_item['sid']) ? $sess_item['sid'] : '';
        $item['__CATEGORIES__'] = isset($sess_item['__CATEGORIES__']) ? $sess_item['__CATEGORIES__'] : array();
        $item['__ATTRIBUTES__'] = isset($sess_item['__ATTRIBUTES__']) ? $sess_item['__ATTRIBUTES__'] : array();
        $item['title'] = isset($sess_item['title']) ? $sess_item['title'] : '';
        $item['urltitle'] = isset($sess_item['urltitle']) ? $sess_item['urltitle'] : '';
        $item['hometext'] = isset($sess_item['hometext']) ? $sess_item['hometext'] : '';
        $item['hometextcontenttype'] = isset($sess_item['hometextcontenttype']) ? $sess_item['hometextcontenttype'] : '';
        $item['bodytext'] = isset($sess_item['bodytext']) ? $sess_item['bodytext'] : '';
        $item['bodytextcontenttype'] = isset($sess_item['bodytextcontenttype']) ? $sess_item['bodytextcontenttype'] : '';
        $item['notes'] = isset($sess_item['notes']) ? $sess_item['notes'] : '';
        $item['displayonindex'] = isset($sess_item['displayonindex']) ? $sess_item['displayonindex'] : 1;
        $item['language'] = isset($sess_item['language']) ? $sess_item['language'] : '';
        $item['allowcomments'] = isset($sess_item['allowcomments']) ? $sess_item['allowcomments'] : 1;
        $item['from'] = isset($sess_item['from']) ? $sess_item['from'] : DateUtil::getDatetime(null, '%Y-%m-%d %H:%M');
        $item['to'] = isset($sess_item['to']) ? $sess_item['to'] : DateUtil::getDatetime(null, '%Y-%m-%d %H:%M');
        $item['tonolimit'] = isset($sess_item['tonolimit']) ? $sess_item['tonolimit'] : 1;
        $item['unlimited'] = isset($sess_item['unlimited']) ? $sess_item['unlimited'] : 1;
        $item['weight'] = isset($sess_item['weight']) ? $sess_item['weight'] : 0;
        $item['pictures'] = isset($sess_item['pictures']) ? $sess_item['pictures'] : 0;
        $item['tempfiles'] = isset($sess_item['tempfiles']) ? $sess_item['tempfiles'] : null;
        $item['temp_pictures'] = isset($sess_item['tempfiles']) ? unserialize($sess_item['tempfiles']) : null;

        $preview = '';
        if (isset($sess_item['action']) && $sess_item['action'] == self::ACTION_PREVIEW) {
            $preview = $this->preview(array('title' => $item['title'],
                        'hometext' => $item['hometext'],
                        'hometextcontenttype' => $item['hometextcontenttype'],
                        'bodytext' => $item['bodytext'],
                        'bodytextcontenttype' => $item['bodytextcontenttype'],
                        'notes' => $item['notes'],
                        'sid' => $item['sid'],
                        'pictures' => $item['pictures'],
                        'temp_pictures' => $item['temp_pictures']));
        }

        // Get the module vars
        $modvars = $this->getVars();

        if ($modvars['enablecategorization']) {
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $this->view->assign('catregistry', $catregistry);

            // add article attribute if morearticles is enabled and general setting is zero
            if ($modvars['enablemorearticlesincat'] && $modvars['morearticlesincat'] == 0) {
                $item['__ATTRIBUTES__']['morearticlesincat'] = 0;
            }
        }

        // Assign the default languagecode
        $this->view->assign('lang', ZLanguage::getLanguageCode());

        // Assign the item to the template
        $this->view->assign('item', $item);

        // Assign the content format
        $formattedcontent = ModUtil::apiFunc('News', 'user', 'isformatted', array('func' => 'new'));
        $this->view->assign('formattedcontent', $formattedcontent);

        $this->view->assign('accessadd', 0);
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_ADD)) {
            $this->view->assign('accessadd', 1);
            $this->view->assign('accesspicupload', 1);
            $this->view->assign('accesspubdetails', 1);
        } else {
            $this->view->assign('accesspicupload', SecurityUtil::checkPermission('News:pictureupload:', '::', ACCESS_ADD));
            $this->view->assign('accesspubdetails', SecurityUtil::checkPermission('News:publicationdetails:', '::', ACCESS_ADD));
        }

        $this->view->assign('preview', $preview);

        // Return the output that has been generated by this function
        return $this->view->fetch('user/create.tpl');
    }

    /**
     * This is a standard function that is called with the results of the
     * form supplied by News_admin_newitem() or News_user_newitem to create
     * a new item.
     *
     * @author Mark West
     * @param string 'title' the title of the news item
     * @param string 'language' the language of the news item
     * @param string 'hometext' the summary text of the news item
     * @param int 'hometextcontenttype' the content type of the summary text
     * @param string 'bodytext' the body text of the news item
     * @param int 'bodytextcontenttype' the content type of the body text
     * @param string 'notes' any administrator notes
     * @param int 'published_status' the published status of the item
     * @param int 'displayonindex' display the article on the index page
     * @return bool true
     */
    public function create($args)
    {
        // Get parameters from whatever input we need
        $story = FormUtil::getPassedValue('story', isset($args['story']) ? $args['story'] : null, 'POST');
        $files = News_ImageUtil::reArrayFiles(FormUtil::getPassedValue('news_files', null, 'FILES'));

        // Create the item array for processing
        $item = array(
            'title' => $story['title'],
            'urltitle' => isset($story['urltitle']) ? $story['urltitle'] : '',
            '__CATEGORIES__' => isset($story['__CATEGORIES__']) ? $story['__CATEGORIES__'] : null,
            '__ATTRIBUTES__' => isset($story['attributes']) ? News_Util::reformatAttributes($story['attributes']) : null,
            'language' => isset($story['language']) ? $story['language'] : '',
            'hometext' => isset($story['hometext']) ? $story['hometext'] : '',
            'hometextcontenttype' => $story['hometextcontenttype'],
            'bodytext' => isset($story['bodytext']) ? $story['bodytext'] : '',
            'bodytextcontenttype' => $story['bodytextcontenttype'],
            'notes' => $story['notes'],
            'displayonindex' => isset($story['displayonindex']) ? $story['displayonindex'] : 0,
            'allowcomments' => isset($story['allowcomments']) ? $story['allowcomments'] : 0,
            'from' => isset($story['from']) ? $story['from'] : null,
            'tonolimit' => isset($story['tonolimit']) ? $story['tonolimit'] : null,
            'to' => isset($story['to']) ? $story['to'] : null,
            'unlimited' => isset($story['unlimited']) && $story['unlimited'] ? true : false,
            'weight' => isset($story['weight']) ? $story['weight'] : 0,
            'action' => isset($story['action']) ? $story['action'] : self::ACTION_PREVIEW,
            'sid' => isset($story['sid']) ? $story['sid'] : null,
            'tempfiles' => isset($story['tempfiles']) ? $story['tempfiles'] : null,
            'del_pictures' => isset($story['del_pictures']) ? $story['del_pictures'] : null,
        );

        // convert user times to server times (TZ compensation) refs #181
        //  can't do the below because values are YYYY-MM-DD HH:MM:SS and DateUtil value is in seconds.
        // $item['from'] = $item['from'] + DateUtil::getTimezoneUserDiff();
        // $item['to'] = $item['to'] + DateUtil::getTimezoneUserDiff();
        // Disable the non accessible fields for non editors
        if (!SecurityUtil::checkPermission('News::', '::', ACCESS_ADD)) {
            $item['notes'] = '';
            $item['displayonindex'] = 1;
            $item['allowcomments'] = 1;
            $item['from'] = null;
            $item['tonolimit'] = true;
            $item['to'] = null;
            $item['unlimited'] = true;
            $item['weight'] = 0;
            if ($item['action'] > self::ACTION_SUBMIT) {
                $item['action'] = self::ACTION_PREVIEW;
            }
        }

        // Validate the input
        $validationerror = News_Util::validateArticle($item);
        // check hooked modules for validation
        $sid = isset($item['sid']) ? $item['sid'] : null;
        $hookvalidators = $this->notifyHooks(new Zikula_ValidationHook('news.ui_hooks.articles.validate_edit', new Zikula_Hook_ValidationProviders()))->getValidators();
        if ($hookvalidators->hasErrors()) {
            $validationerror .= $this->__('Error! Hooked content does not validate.') . "\n";
        }

        // get all module vars
        $modvars = $this->getVars();

        if (isset($files) && $modvars['picupload_enabled']) {
            list($files, $item) = News_ImageUtil::validateImages($files, $item);
        } else {
            $item['pictures'] = 0;
        }

        // story was previewed with uploaded pics
        if (isset($item['tempfiles'])) {
            $tempfiles = unserialize($item['tempfiles']);
            // delete files if requested
            if (isset($item['del_pictures'])) {
                foreach ($tempfiles as $key => $file) {
                    if (in_array($file['name'], $item['del_pictures'])) {
                        unset($tempfiles[$key]);
                        News_ImageUtil::removePreviewImages(array($file));
                    }
                }
            }
            $files = array_merge($files, $tempfiles);
            $item['pictures'] += count($tempfiles);
        }

        // if the user has selected to preview the article we then route them back
        // to the new function with the arguments passed here
        if ($item['action'] == self::ACTION_PREVIEW || $validationerror !== false) {
            // log the error found if any
            if ($validationerror !== false) {
                LogUtil::registerError(nl2br($validationerror));
            }
            if ($item['pictures'] > 0) {
                $tempfiles = News_ImageUtil::tempStore($files);
                $item['tempfiles'] = serialize($tempfiles);
            }
            // back to the referer form
            SessionUtil::setVar('newsitem', $item);
            $this->redirect(ModUtil::url('News', 'user', 'newitem'));
        } else {
            // As we're not previewing the item let's remove it from the session
            SessionUtil::delVar('newsitem');
        }

        // Confirm authorization code.
        $this->checkCsrfToken();

        if (!isset($item['sid']) || empty($item['sid'])) {
            // Create the news story
            $sid = ModUtil::apiFunc('News', 'user', 'create', $item);
            if ($sid != false) {
                // Success
                LogUtil::registerStatus($this->__('Done! Created new article.'));
                // Let any hooks know that we have created a new item
                $this->notifyHooks(new Zikula_ProcessHook('news.ui_hooks.articles.process_edit', $sid, new Zikula_ModUrl('News', 'User', 'display', ZLanguage::getLanguageCode(), array('sid' => $sid))));
                $this->notify($item); // send notification email
            } else {
                // fail! story not created
                throw new Zikula_Exception_Fatal($this->__('Story not created for unknown reason (Api failure).'));
                return false;
            }
        } else {
            // update the draft
            $result = ModUtil::apiFunc('News', 'admin', 'update', $item);
            if ($result) {
                LogUtil::registerStatus($this->__('Story Updated.'));
            } else {
                // fail! story not updated
                throw new Zikula_Exception_Fatal($this->__('Story not updated for unknown reason (Api failure).'));
                return false;
            }
        }

        // clear article and view caches
        self::clearArticleCaches($item, $this);

        if (isset($files) && $modvars['picupload_enabled']) {
            $resized = News_ImageUtil::resizeImages($sid, $files); // resize and move the uploaded pics
            if (isset($item['tempfiles'])) {
                News_ImageUtil::removePreviewImages($tempfiles); // remove any preview images
            }
            LogUtil::registerStatus($this->_fn('%1$s out of %2$s picture was uploaded and resized.', '%1$s out of %2$s pictures were uploaded and resized.', $item['pictures'], array($resized, $item['pictures'])));
            if (($item['action'] >= self::ACTION_SAVEDRAFT) && ($resized <> $item['pictures'])) {
                LogUtil::registerStatus($this->_fn('Article now has draft status, since the picture was not uploaded.', 'Article now has draft status, since not all pictures were uploaded.', $item['pictures'], array($resized, $item['pictures'])));
            }
        }

        // release pagelock
        if (ModUtil::available('PageLock')) {
            ModUtil::apiFunc('PageLock', 'user', 'releaseLock', array('lockName' => "Newsnews{$item['sid']}"));
        }

        if ($item['action'] == self::ACTION_SAVEDRAFT_RETURN) {
            SessionUtil::setVar('newsitem', $item);
            $this->redirect(ModUtil::url('News', 'user', 'newitem'));
        }
        $this->redirect(ModUtil::url('News', 'user', 'view'));
    }

    /**
     * view items
     *
     * @author Mark West
     * @param 'page' starting number for paged view
     * @return string HTML string
     */
    public function view($args = array())
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_OVERVIEW), LogUtil::getErrorMsgPermission());

        // clean the session preview data
        SessionUtil::delVar('newsitem');

        // get all module vars for later use
        $modvars = $this->getVars();

        // Get parameters from whatever input we need
        $theme = isset($args['theme']) ? strtolower($args['theme']) : (string)strtolower(FormUtil::getPassedValue('theme', 'user', 'GET'));
        $page = isset($args['page']) ? $args['page'] : (int)FormUtil::getPassedValue('page', 1, 'GET');
        $prop = isset($args['prop']) ? $args['prop'] : (string)FormUtil::getPassedValue('prop', null, 'GET');
        $cat = isset($args['cat']) ? $args['cat'] : (string)FormUtil::getPassedValue('cat', null, 'GET');
        $displayModule = FormUtil::getPassedValue('module', 'X', 'GET');
        $defaultItemsPerPage = ($displayModule == 'X') ? $modvars['storyhome'] : $modvars['itemsperpage'];
        $itemsperpage = isset($args['itemsperpage']) ? $args['itemsperpage'] : (int)FormUtil::getPassedValue('itemsperpage', $defaultItemsPerPage, 'GET');
        $displayonindex = isset($args['displayonindex']) ? (int)$args['displayonindex'] : FormUtil::getPassedValue('displayonindex', null, 'GET');

        $allowedThemes = array('user', 'rss', 'atom', 'printer');
        $theme = in_array($theme, $allowedThemes) ? $theme : 'user';

        // work out page size from page number
        $startnum = (($page - 1) * $itemsperpage) + 1;

        $lang = ZLanguage::getLanguageCode();

        // check if categorization is enabled
        if ($modvars['enablecategorization']) {
            // get the categories registered for News
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $properties = array_keys($catregistry);

            // validate the property
            // and build the category filter - mateo
            if (!empty($prop) && in_array($prop, $properties) && !empty($cat)) {
                if (!is_numeric($cat)) {
                    $rootCat = CategoryUtil::getCategoryByID($catregistry[$prop]);
                    $cat = CategoryUtil::getCategoryByPath($rootCat['path'] . '/' . $cat);
                } else {
                    $cat = CategoryUtil::getCategoryByID($cat);
                }
                $catname = isset($cat['display_name'][$lang]) ? $cat['display_name'][$lang] : $cat['name'];

                if (!empty($cat) && isset($cat['path'])) {
                    // include all it's subcategories and build the filter
                    $categories = CategoryUtil::getCategoriesByPath($cat['path'], '', 'path');
                    $catstofilter = array();
                    foreach ($categories as $category) {
                        $catstofilter[] = $category['id'];
                    }
                    $catFilter = array($prop => $catstofilter);
                } else {
                    LogUtil::registerError($this->__('Error! Invalid category passed.'));
                }
            }
        }

        // get matching news articles
        $items = ModUtil::apiFunc('News', 'user', 'getall', array('startnum' => $startnum,
                    'numitems' => $itemsperpage,
                    'status' => News_Api_User::STATUS_PUBLISHED,
                    'displayonindex' => $displayonindex,
                    'filterbydate' => true,
                    'category' => isset($catFilter) ? $catFilter : null, // get all method doesn't appear to want a category arg
                    'catregistry' => isset($catregistry) ? $catregistry : null));

        if ($items == false) {
            if ($modvars['enablecategorization'] && isset($catFilter)) {
                LogUtil::registerStatus($this->__f('No articles currently published under the \'%s\' category.', $catname));
            } else {
                LogUtil::registerStatus($this->__('No articles currently published.'));
            }
        }

        // assign various useful template variables
        $this->view->assign('startnum', $startnum);
        $this->view->assign('lang', $lang);

        // assign the root category
        $this->view->assign('category', $cat);
        $this->view->assign('catname', isset($catname) ? $catname : '');

        $newsitems = array();
        // Loop through each item and display it
        foreach ($items as $item) {
            // display if it's published and the displayonindex match (if set)
            if (($item['published_status'] == 0) &&
                    (!isset($displayonindex) || $item['displayonindex'] == $displayonindex)) {

                $template = $theme . '/index.tpl';
                if (!$this->view->is_cached($template, $item['sid'])) {
                    // $info is array holding raw information.
                    // Used below and also passed to the theme - jgm
                    $info = ModUtil::apiFunc('News', 'user', 'getArticleInfo', $item);

                    // $links is an array holding pure URLs to
                    // specific functions for this article.
                    // Used below and also passed to the theme - jgm
                    $links = ModUtil::apiFunc('News', 'user', 'getArticleLinks', $info);

                    // $preformat is an array holding chunks of
                    // preformatted text for this article.
                    // Used below and also passed to the theme - jgm
                    $preformat = ModUtil::apiFunc('News', 'user', 'getArticlePreformat', array('info' => $info,
                                'links' => $links));

                    $this->view->assign(array(
                        'info' => $info,
                        'links' => $links,
                        'preformat' => $preformat));
                }

                $newsitems[] = $this->view->fetch($template, $item['sid']);
            }
        }

        // The items that are displayed on this overview page depend on the individual
        // user permissions. Therefor, we can not cache the whole page.
        // The single entries are cached, though.
        $this->view->setCaching(false);

        // Display the entries
        $this->view->assign('newsitems', $newsitems);

        // Assign the values for the smarty plugin to produce a pager
        $this->view->assign('pager', array('numitems' => ModUtil::apiFunc('News', 'user', 'countitems', array('status' => 0,
                'filterbydate' => true,
                'displayonindex' => $displayonindex,
                'category' => isset($catFilter) ? $catFilter : null)),
            'itemsperpage' => $itemsperpage));

        // Return the output that has been generated by this function
        return $this->view->fetch($theme . '/view.tpl');
    }

    /**
     * display item
     *
     * @author Mark West
     * @param 'sid' The article ID
     * @param 'objectid' generic object id maps to sid if present
     * @return string HTML string
     */
    public function display($args)
    {
        // Get parameters from whatever input we need
        $sid = (int)FormUtil::getPassedValue('sid', null, 'REQUEST');
        $objectid = (int)FormUtil::getPassedValue('objectid', null, 'REQUEST');
        $page = (int)FormUtil::getPassedValue('page', 1, 'REQUEST');
        $title = FormUtil::getPassedValue('title', null, 'REQUEST');
        $year = FormUtil::getPassedValue('year', null, 'REQUEST');
        $monthnum = FormUtil::getPassedValue('monthnum', null, 'REQUEST');
        $monthname = FormUtil::getPassedValue('monthname', null, 'REQUEST');
        $day = FormUtil::getPassedValue('day', null, 'REQUEST');

        // User functions of this type can be called by other modules
        extract($args);

        $theme = isset($args['theme']) ? strtolower($args['theme']) : (string)strtolower(FormUtil::getPassedValue('theme', 'user', 'GET'));
        $allowedThemes = array('user', 'printer');
        $theme = in_array($theme, $allowedThemes) ? $theme : 'user';

        // At this stage we check to see if we have been passed $objectid, the
        // generic item identifier
        if ($objectid) {
            $sid = $objectid;
        }

        // Validate the essential parameters
        if ((empty($sid) || !is_numeric($sid)) && (empty($title))) {
            return LogUtil::registerArgsError();
        }
        if (!empty($title)) {
            unset($sid);
        }

        // Set the default page number
        if ($page < 1 || !is_numeric($page)) {
            $page = 1;
        }

        // increment the read count
        if ($page == 1) {
            if (isset($sid)) {
                ModUtil::apiFunc('News', 'user', 'incrementreadcount', array('sid' => $sid));
            } else {
                ModUtil::apiFunc('News', 'user', 'incrementreadcount', array('title' => $title));
            }
        }

        // For caching reasons you must pass a cache ID
        if (isset($sid)) {
            $this->view->setCacheId($sid . $page);
        } else {
            $this->view->setCacheId($title . $page);
        }

        // Get the news story
        if (!SecurityUtil::checkPermission('News::', "::", ACCESS_ADD)) {
            if (isset($sid)) {
                $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $sid,
                            'status' => 0));
            } else {
                $item = ModUtil::apiFunc('News', 'user', 'get', array('title' => $title,
                            'year' => $year,
                            'monthname' => $monthname,
                            'monthnum' => $monthnum,
                            'day' => $day,
                            'status' => 0));
                $sid = $item['sid'];
                System::queryStringSetVar('sid', $sid);
            }
        } else {
            if (isset($sid)) {
                $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $sid));
            } else {
                $item = ModUtil::apiFunc('News', 'user', 'get', array('title' => $title,
                            'year' => $year,
                            'monthname' => $monthname,
                            'monthnum' => $monthnum,
                            'day' => $day));
                $sid = $item['sid'];
                System::queryStringSetVar('sid', $sid);
            }
        }

        if ($item === false) {
            return LogUtil::registerError($this->__('Error! No such article found.'), 404);
        }

        // Explode the story into an array of seperate pages
        $allpages = explode('<!--pagebreak-->', $item['bodytext']);

        // Set the item bodytext to be the required page
        // nb arrays start from zero, pages from one
        $item['bodytext'] = $allpages[$page - 1];
        $numpages = count($allpages);
        unset($allpages);

        // If the pagecount is greater than 1 and we're not on the frontpage
        // don't show the hometext
        if ($numpages > 1 && $page > 1) {
            $item['hometext'] = '';
        }

        // $info is array holding raw information.
        // Used below and also passed to the theme - jgm
        $info = ModUtil::apiFunc('News', 'user', 'getArticleInfo', $item);

        // $links is an array holding pure URLs to specific functions for this article.
        // Used below and also passed to the theme - jgm
        $links = ModUtil::apiFunc('News', 'user', 'getArticleLinks', $info);

        // $preformat is an array holding chunks of preformatted text for this article.
        // Used below and also passed to the theme - jgm
        $preformat = ModUtil::apiFunc('News', 'user', 'getArticlePreformat', array('info' => $info,
                    'links' => $links));

        // set the page title
        if ($numpages <= 1) {
            PageUtil::setVar('title', $info['title']);
        } else {
            PageUtil::setVar('title', $info['title'] . ' :: ' . $this->__f('page %s', $page));
        }

        // Assign the story info arrays
        $this->view->assign(array('info' => $info,
            'links' => $links,
            'preformat' => $preformat,
            'page' => $page));

        $modvars = $this->getVars();
        $this->view->assign('lang', ZLanguage::getLanguageCode());

        // get more articletitles in the categories of this article
        if ($modvars['enablecategorization'] && $modvars['enablemorearticlesincat']) {
            // check how many articles to display
            if ($modvars['morearticlesincat'] > 0 && !empty($info['categories'])) {
                $morearticlesincat = $modvars['morearticlesincat'];
            } elseif ($modvars['morearticlesincat'] == 0 && array_key_exists('morearticlesincat', $info['attributes'])) {
                $morearticlesincat = $info['attributes']['morearticlesincat'];
            } else {
                $morearticlesincat = 0;
            }
            if ($morearticlesincat > 0) {
                // get the categories registered for News
                $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
                foreach (array_keys($catregistry) as $property) {
                    $catFilter[$property] = $info['categories'][$property]['id'];
                }
                // get matching news articles
                $morearticlesincat = ModUtil::apiFunc('News', 'user', 'getall', array('numitems' => $morearticlesincat,
                            'status' => 0,
                            'filterbydate' => true,
                            'category' => $catFilter,
                            'catregistry' => $catregistry,
                            'query' => array(array('sid', '!=', $sid))));
            }
        } else {
            $morearticlesincat = 0;
        }
        $this->view->assign('morearticlesincat', $morearticlesincat);

        // Now lets assign the informatation to create a pager for the review
        $this->view->assign('pager', array('numitems' => $numpages,
            'itemsperpage' => 1));

        // Return the output that has been generated by this function
        return $this->view->fetch($theme . '/article.tpl');
    }

    /**
     * display article archives
     *
     * @author Andreas Krapohl
     * @author Mark West
     * @return string HTML string
     */
    public function archives($args)
    {
        // Get parameters from whatever input we need
        $year = (int)FormUtil::getPassedValue('year', null, 'REQUEST');
        $month = (int)FormUtil::getPassedValue('month', null, 'REQUEST');
        $day = '31';

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_OVERVIEW), LogUtil::getErrorMsgPermission());

        // Dates validation
        $currentdate = explode(',', DateUtil::getDatetime('', '%Y,%m,%d'));
        if (!empty($year) || !empty($month)) {
            if ((empty($year) || empty($month)) ||
                    ($year > (int)$currentdate[0] || ($year == (int)$currentdate[0] && $month > (int)$currentdate[1]))) {
                $this->redirect(ModUtil::url('News', 'user', 'archives'));
            } elseif ($year == (int)$currentdate[0] && $month == (int)$currentdate[1]) {
                $day = (int)$currentdate[2];
            }
        }

        // Load localized month names
        $monthnames = explode(' ', $this->__('January February March April May June July August September October November December'));

        // Create output object
        $cacheid = "$month|$year";
        $this->view->setCacheId($cacheid);

        $template = 'user/archives.tpl';
        if ($this->view->is_cached($template)) {
            return $this->view->fetch($template);
        }

        // output vars
        $archivemonths = array();
        $archiveyears = array();

        if (!empty($year) && !empty($month)) {
            $items = ModUtil::apiFunc('News', 'user', 'getall', array('order' => 'from',
                        'from' => "$year-$month-01 00:00:00",
                        'to' => "$year-$month-$day 23:59:59",
                        'status' => 0));
            $this->view->assign('year', $year);
            $this->view->assign('month', $monthnames[$month - 1]);
        } else {
            // get all matching news articles
            $monthsyears = ModUtil::apiFunc('News', 'user', 'getMonthsWithNews');

            foreach ($monthsyears as $monthyear) {
                $month = DateUtil::getDatetime_Field($monthyear, 2);
                $year = DateUtil::getDatetime_Field($monthyear, 1);
                $dates[$year][] = $month;
            }
            foreach ($dates as $year => $years) {
                foreach ($years as $month) {
                    //$linktext = $monthnames[$month-1]." $year";
                    $linktext = $monthnames[$month - 1];
                    $nrofarticles = ModUtil::apiFunc('News', 'user', 'countitems', array('from' => "$year-$month-01 00:00:00",
                                'to' => "$year-$month-$day 23:59:59",
                                'status' => 0));

                    $archivemonths[$year][$month] = array('url' => ModUtil::url('News', 'user', 'archives', array('month' => $month, 'year' => $year)),
                        'title' => $linktext,
                        'nrofarticles' => $nrofarticles);
                }
            }
            $items = false;
        }

        $this->view->assign('archivemonths', $archivemonths);
        $this->view->assign('archiveitems', $items);
        $this->view->assign('enablecategorization', $this->getVar('enablecategorization'));

        // Return the output that has been generated by this function
        return $this->view->fetch($template);
    }

    /**
     * preview article
     *
     * @author Mark West
     * @return string HTML string
     */
    public function preview($args)
    {
        $title = $args['title'];
        $hometext = $args['hometext'];
        $hometextcontenttype = $args['hometextcontenttype'];
        $bodytext = $args['bodytext'];
        $bodytextcontenttype = $args['bodytextcontenttype'];
        $notes = $args['notes'];
        $sid = $args['sid'];
        $pictures = $args['pictures'];
        $temp_pictures = $args['temp_pictures'];

        // format the contents if needed
        if ($hometextcontenttype == 0) {
            $hometext = nl2br($hometext);
        }
        if ($bodytextcontenttype == 0) {
            $bodytext = nl2br($bodytext);
        }
        $this->view->setCaching(false);

        $this->view->assign('preview', array(
            'title' => $title,
            'hometext' => $hometext,
            'bodytext' => $bodytext,
            'notes' => $notes,
            'sid' => $sid,
            'pictures' => $pictures,
            'temp_pictures' => $temp_pictures,
        ));

        return $this->view->fetch('user/preview.tpl');
    }

    /**
     * display available categories in News
     *
     * @author Erik Spaan [espaan]
     * @return string HTML string
     */
    public function categorylist($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_OVERVIEW), LogUtil::getErrorMsgPermission());

        $enablecategorization = $this->getVar('enablecategorization');
        if (UserUtil::isLoggedIn()) {
            $uid = UserUtil::getVar('uid');
        } else {
            $uid = 0;
        }

        if ($enablecategorization) {
            // Get the categories registered for News
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $properties = array_keys($catregistry);
            $propertiesdata = array();
            foreach ($properties as $property) {
                $rootcat = CategoryUtil::getCategoryByID($catregistry[$property]);
                if (!empty($rootcat)) {
                    $rootcat['path'] .= '/';
                    // Get all categories in this category property
                    $catcount = $this->_countcategories($rootcat, $property, $catregistry, $uid);
                    $rootcat['news_articlecount'] = $catcount['category']['news_articlecount'];
                    $rootcat['news_totalarticlecount'] = $catcount['category']['news_totalarticlecount'];
                    $rootcat['news_yourarticlecount'] = $catcount['category']['news_yourarticlecount'];
                    $rootcat['subcategories'] = $catcount['subcategories'];
                    // Store data per property for listing in the overview
                    $propertiesdata[] = array('name' => $property,
                        'category' => $rootcat);
                }
            }
            // Assign property & category related vars
            $this->view->assign('propertiesdata', $propertiesdata);
        }

        // Assign the config vars
        $this->view->assign('enablecategorization', $enablecategorization);
        $this->view->assign('shorturls', System::getVar('shorturls', false));
        $this->view->assign('lang', ZLanguage::getLanguageCode());
        $this->view->assign('catimagepath', $this->getVar('catimagepath'));

        // Return the output that has been generated by this function
        return $this->view->fetch('user/categorylist.tpl');
    }

    /**
     * display article as pdf
     *
     * @author Erik Spaan
     * @param 'sid' The article ID
     * @param 'objectid' generic object id maps to sid if present
     * @return string HTML string
     */
    public function displaypdf($args)
    {
        // Get parameters from whatever input we need
        $sid = (int)FormUtil::getPassedValue('sid', null, 'REQUEST');
        $objectid = (int)FormUtil::getPassedValue('objectid', null, 'REQUEST');
        $title = FormUtil::getPassedValue('title', null, 'REQUEST');
        $year = FormUtil::getPassedValue('year', null, 'REQUEST');
        $monthnum = FormUtil::getPassedValue('monthnum', null, 'REQUEST');
        $monthname = FormUtil::getPassedValue('monthname', null, 'REQUEST');
        $day = FormUtil::getPassedValue('day', null, 'REQUEST');

        // User functions of this type can be called by other modules
        extract($args);

        // At this stage we check to see if we have been passed $objectid, the
        // generic item identifier
        if ($objectid) {
            $sid = $objectid;
        }

        // Validate the essential parameters
        if ((empty($sid) || !is_numeric($sid)) && (empty($title))) {
            return LogUtil::registerArgsError();
        }
        if (!empty($title)) {
            unset($sid);
        }

        // we set TEMPLATE caching to false because we will utilize
        // FILE caching of pdf files instead
        $this->view->setCaching(false);

        // Get the news story
        if (isset($sid)) {
            $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $sid,
                        'status' => 0));
        } else {
            $item = ModUtil::apiFunc('News', 'user', 'get', array('title' => $title,
                        'year' => $year,
                        'monthname' => $monthname,
                        'monthnum' => $monthnum,
                        'day' => $day,
                        'status' => 0));
            $sid = $item['sid'];
            System::queryStringSetVar('sid', $sid);
        }
        if ($item === false) {
            return LogUtil::registerError($this->__('Error! No such article found.'), 404);
        }

        // check for cached pdf file
        if ($this->getVar('pdflink_enablecache', true)) {
            $cachedPdf = $this->pdfIsCached($item['urltitle']);
            if ($cachedPdf) {
                $this->outputCachedPdf($cachedPdf);
                return true;
            }
        }

        // $info is array holding raw information.
        $info = ModUtil::apiFunc('News', 'user', 'getArticleInfo', $item);

        // $links is an array holding pure URLs to specific functions for this article.
        $links = ModUtil::apiFunc('News', 'user', 'getArticleLinks', $info);

        // $preformat is an array holding chunks of preformatted text for this article.
        $preformat = ModUtil::apiFunc('News', 'user', 'getArticlePreformat', array('info' => $info,
                    'links' => $links));

        // Assign the story info arrays
        $this->view->assign(array('info' => $info,
            'links' => $links,
            'preformat' => $preformat));

        // Store output in variable
        $articlehtml = $this->view->fetch('user/articlepdf.tpl');

        // Include and configure the TCPDF class
        define('K_TCPDF_EXTERNAL_CONFIG', true);
        $classfile = DataUtil::formatForOS('modules/News/lib/vendor/tcpdf/tcpdf.php');
        include_once $classfile;
        $lang = ZLanguage::getInstance();
        $langcode = $lang->getLanguageCodeLegacy();
        $langfile = DataUtil::formatForOS("modules/News/lib/vendor/tcpdf/config/lang/{$langcode}.php");
        if (file_exists($langfile)) {
            include_once $langfile;
        } else {
            // default to english
            include_once DataUtil::formatForOS('modules/News/lib/vendor/tcpdf/config/lang/eng.php');
        }
        $configfile = DataUtil::formatForOS('modules/News/lib/vendor/tcpdf_news_config.php');
        require_once $configfile;

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set pdf document information
        $pdf->SetCreator(System::getVar('sitename'));
        $pdf->SetAuthor($info['contributor']);
        $pdf->SetTitle($info['title']);
        $pdf->SetSubject($info['cattitle']);
        //$pdf->SetKeywords($info['cattitle']);
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $sitename = System::getVar('sitename');
        /*    $pdf->SetHeaderData(
          $modvars['pdflink_headerlogo'],
          $modvars['pdflink_headerlogo_width'],
          $this->__f('Article %1$s by %2$s', array($info['title'], $info['contributor'])),
          $sitename . ' :: ' . $this->__('News publisher')); */
        $pdf->SetHeaderData($this->getVar('pdflink_headerlogo'), $this->getVar('pdflink_headerlogo_width'), '', $sitename . ' :: ' . $info['cattitle'] . ' :: ' . $info['topicname']);
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //set some language-dependent strings
        $pdf->setLanguageArray($l); // $l is undefined??? TODO
        // set font, freeserif is big !
        //$pdf->SetFont('freeserif', '', 10);
        // For Unicode data put dejavusans in tcpdf_config.php
        $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);

        // add a page
        $pdf->AddPage();

        // output the HTML content
        $pdf->writeHTML($articlehtml, true, 0, true, 0);

        // reset pointer to the last page
        $pdf->lastPage();

        if ($this->getVar('pdflink_enablecache', true)) {
            $pdfMode = "FI";
            $dir = CacheUtil::getLocalDir('NewsPDF');
            $pdfFileName = $dir . '/' . $info['urltitle'] . '.pdf';
        } else {
            $pdfMode = "I";
            $pdfFileName = $info['urltitle'] . '.pdf';
        }
        //Close and output PDF document
        $pdf->Output($pdfFileName, $pdfMode);

        // Since the output doesn't need the theme wrapped around it,
        // let the theme know that the function is already finished
        return true;
    }

    /**
     * Internal function to count categories including subcategories
     *
     * @author Erik Spaan [espaan]
     * @return array
     */
    private function _countcategories($category, $property, $catregistry, $uid)
    {
        // Get the number of articles in this category within this category property
        $news_articlecount = ModUtil::apiFunc('News', 'user', 'countitems', array('status' => 0,
                    'filterbydate' => true,
                    'category' => array($property => $category['id']),
                    'catregistry' => $catregistry));

        $news_totalarticlecount = $news_articlecount;

        // Get the number of articles by the current uid in this category within this category property
        if ($uid > 0) {
            $news_yourarticlecount = ModUtil::apiFunc('News', 'user', 'countitems', array('status' => 0,
                        'filterbydate' => true,
                        'uid' => $uid,
                        'category' => array($property => $category['id']),
                        'catregistry' => $catregistry));
        } else {
            $news_yourarticlecount = 0;
        }

        // Check if this category is a leaf/endnode
        $subcats = CategoryUtil::getCategoriesByParentID($category['id']);
        if (!$category['is_leaf'] && !empty($subcats)) {
            $subcategories = array();
            foreach ($subcats as $cat) {
                $count = $this->_countcategories($cat, $property, $catregistry, $uid);
                // Add the subcategories count to this category
                $news_totalarticlecount += $count['category']['news_totalarticlecount'];
                $news_yourarticlecount += $count['category']['news_yourarticlecount'];
                $subcategories[] = $count;
            }
        } else {
            $subcategories = null;
        }

        $category['news_articlecount'] = $news_articlecount;
        $category['news_totalarticlecount'] = $news_totalarticlecount;
        $category['news_yourarticlecount'] = $news_yourarticlecount;
        // if a category image is available, store it for easy reuse
        if (isset($category['__ATTRIBUTES__']) && isset($category['__ATTRIBUTES__']['topic_image'])) {
            $category['catimage'] = $category['__ATTRIBUTES__']['topic_image'];
        }

        $return = array('category' => $category,
            'subcategories' => $subcategories);

        return $return;
    }

    /**
     * Send email to configured notification settings
     *
     * @param array $item the news item
     * return boolean success/failure of notification
     */
    public function notify($item)
    {
        $modvars = $this->getVars();
        // notify the configured addresses of a new Pending Review article
        if ($modvars['notifyonpending'] && ($item['action'] == self::ACTION_SUBMIT || $item['action'] == self::ACTION_SAVEPENDING)) {
            $sitename = System::getVar('sitename');
            $adminmail = System::getVar('adminmail');
            $fromname = !empty($modvars['notifyonpending_fromname']) ? $modvars['notifyonpending_fromname'] : $sitename;
            $fromaddress = !empty($modvars['notifyonpending_fromaddress']) ? $modvars['notifyonpending_fromaddress'] : $adminmail;
            $toname = !empty($modvars['notifyonpending_toname']) ? $modvars['notifyonpending_toname'] : $sitename;
            $toaddress = !empty($modvars['notifyonpending_toaddress']) ? $modvars['notifyonpending_toaddress'] : $adminmail;
            $subject = $modvars['notifyonpending_subject'];
            $html = $modvars['notifyonpending_html'];
            if (!UserUtil::isLoggedIn()) {
                $contributor = System::getVar('anonymous');
            } else {
                $contributor = UserUtil::getVar('uname');
            }
            if ($html) {
                $body = $this->__f('<br />A News Publisher article <strong>%1$s</strong> has been submitted by %2$s for review on website %3$s.<br />Index page teaser text of the article:<br /><hr />%4$s<hr /><br /><br />Go to the <a href="%5$s">news publisher admin</a> pages to review and publish the <em>Pending Review</em> article(s).<br /><br />Regards,<br />%6$s', array($item['title'], $contributor, $sitename, $item['hometext'], ModUtil::url('News', 'admin', 'view', array('news_status' => 2), null, null, true), $sitename));
            } else {
                $body = $this->__f("A News Publisher article '%1\$s' has been submitted by %2\$s for review on website %3\$s.\nIndex page teaser text of the article:\n--------\n%4\$s\n--------\n\nGo to the <a href='%5\$s'>news publisher admin</a> pages to review and publish the \'Pending Review\' article(s).\n\nRegards,\n%6\$s\n", array($item['title'], $contributor, $sitename, $item['hometext'], ModUtil::url('News', 'admin', 'view', array('news_status' => 2), null, null, true), $sitename));
            }
            $sent = ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array('toname' => $toname,
                        'toaddress' => $toaddress,
                        'fromname' => $fromname,
                        'fromaddress' => $fromaddress,
                        'subject' => $subject,
                        'body' => $body,
                        'html' => $html));
            if ($sent) {
                LogUtil::registerStatus($this->__('Done! E-mail about new pending article is sent.'));
                return true;
            } else {
                LogUtil::registerError($this->__('Warning! E-mail about new pending article could not be sent.'));
                return false;
            }
        }
        // method silently fails if not configured to send email
    }

    /**
     * clear caches for a particular story
     * @param array $item the story item
     * @param object $controller Zikula_AbstractController instance
     */
    public static function clearArticleCaches($item, $controller)
    {
        // clear appropriate caches
        // view.tpl templates are not cached
        $pagecount = count(explode('<!--pagebreak-->', $item['bodytext']));
        if ($pagecount < 1) {
            $pagecount = 1;
        }
        for ($i = 1; $i <= $pagecount; $i++) {
            $cacheid = $item['sid'] . $i;
            $cacheid_title = $item['title'] . $i;
            $controller->view->clear_cache('user/article.tpl', $cacheid);
            $controller->view->clear_cache('user/article.tpl', $cacheid_title);
            $controller->view->clear_cache('printer/article.tpl', $cacheid);
            $controller->view->clear_cache('printer/article.tpl', $cacheid_title);
            $controller->view->clear_cache('user/articlepdf.tpl', $item['sid']); // pdf only uses sid
            $controller->view->clear_cache('user/articlepdf.tpl', $item['title']); // pdf only uses title
        }
    }

    /**
     * Check to see if file is cached and current
     * return false if !exists or !current
     * return full filepath if exists and current
     *
     * @param string $title
     * @return mixed boolean/string
     */
    private function pdfIsCached($title)
    {
        $dir = CacheUtil::getLocalDir('NewsPDF');
        if (!is_dir($dir)) {
            CacheUtil::createLocalDir('NewsPDF', 0755, true);
        }
        $title = $title . '.pdf';
        // modify title like the tcpdf::Output() method does
        $title = preg_replace('/[\s]+/', '_', $title);
        $title = preg_replace('/[^a-zA-Z0-9_\.-]/', '', $title);
        $fullpath = $dir . '/' . $title;
        if (file_exists($fullpath)) {
            // check if expired
            if ((time() - filemtime($fullpath)) > ModUtil::getVar('Theme', 'render_lifetime')) {
                return false;
            }
        } else {
            return false;
        }
        return $fullpath;
    }

    /**
     * output the cached file to the browser
     * @param string $fullpath
     * @return void
     */
    private function outputCachedPdf($fullpath)
    {
        // this code copied directly from tcpdf lib
        // send headers to browser
        header('Content-Type: application/pdf');
        header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
        header('Pragma: public');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Content-Length: ' . filesize($fullpath));
        header('Content-Disposition: inline; filename="' . basename($fullpath) . '";');
        // send document to the browser
        echo file_get_contents($fullpath);
        return;
    }

}