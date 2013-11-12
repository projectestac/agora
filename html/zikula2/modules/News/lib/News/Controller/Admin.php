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
class News_Controller_Admin extends Zikula_AbstractController
{

    public function postInitialize()
    {
        $this->view->setCaching(false);
    }

    /**
     * the main administration function
     * @deprecated
     * @return redirect
     */
    public function main()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());
        $this->redirect(ModUtil::url('News', 'admin', 'view'));
    }

    /**
     * create a new news article
     * this function is purely a wrapper for the output from news_user_new
     * @deprecated
     *
     * @return string HTML string
     */
    public function newitem()
    {
        LogUtil::registerError($this->__f('The %s method has been deprecated. Please change your link to the user controller.', 'News_Admin_Controller::newitem'));
        $this->redirect(ModUtil::url('News', 'user', 'newitem'));
    }

    /**
     * modify a news article
     *
     * @param int 'sid' the id of the item to be modified
     * @param int 'objectid' generic object id maps to sid if present
     * @author Mark West
     * @return string HTML string
     */
    public function modify($args)
    {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GETPOST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        // At this stage we check to see if we have been passed $objectid
        if (!empty($objectid)) {
            $sid = $objectid;
        }

        // Check if we're redirected to preview
        $inpreview = false;
        $item = SessionUtil::getVar('newsitem');
        if (!empty($item) && isset($item['sid'])) {
            $inpreview = true;
            $sid = $item['sid'];
        }

        // Validate the essential parameters
        if (empty($sid)) {
            return LogUtil::registerArgsError();
        }

        // Get the news article in the db
        $dbitem = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $sid));

        if ($dbitem === false) {
            return LogUtil::registerError($this->__('Error! No such article found.'), 404);
        }

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', $dbitem['cr_uid'] . '::' . $sid, ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        // merge the data of the db and the preview if exist
        $item = $inpreview ? array_merge($dbitem, $item) : $dbitem;
        unset($dbitem);

        // Get the format types. 'home' string is bits 0-1, 'body' is bits 2-3.
        $item['hometextcontenttype'] = isset($item['hometextcontenttype']) ? $item['hometextcontenttype'] : ($item['format_type'] % 4);
        $item['bodytextcontenttype'] = isset($item['bodytextcontenttype']) ? $item['bodytextcontenttype'] : (($item['format_type'] / 4) % 4);

        // Set the publishing date options.
        if (!$inpreview) {
            if (DateUtil::getDatetimeDiff_AsField($item['from'], $item['cr_date'], 6) == 0 && is_null($item['to'])) {
                $item['unlimited'] = 1;
                $item['tonolimit'] = 1;
            } elseif (DateUtil::getDatetimeDiff_AsField($item['from'], $item['cr_date'], 6) <> 0 && is_null($item['to'])) {
                $item['unlimited'] = 0;
                $item['tonolimit'] = 1;
            } else {
                $item['unlimited'] = 0;
                $item['tonolimit'] = 0;
            }
        } else {
            $item['unlimited'] = isset($item['unlimited']) ? 1 : 0;
            $item['tonolimit'] = isset($item['tonolimit']) ? 1 : 0;
        }

        // if article is pending than set the publishing 'from' date to now
        if ($item['published_status'] == News_Api_User::STATUS_PENDING) {
            $nowts = time();
            $now = DateUtil::getDatetime($nowts);
            // adjust 'to', since it is before the new 'from' set above
            if (!is_null($item['to']) && DateUtil::getDatetimeDiff_AsField($now, $item['to'], 6) < 0) {
                $item['to'] = DateUtil::getDatetime($nowts + DateUtil::getDatetimeDiff_AsField($item['from'], $item['to']));
            }
            $item['from'] = $now;
            $item['unlimited'] = 0;
        }

        // Check if we need a preview
        $preview = '';
        if (isset($item['action']) && $item['action'] == 0) {
            $preview = ModUtil::func('News', 'user', 'preview', array('title' => $item['title'],
                        'hometext' => $item['hometext'],
                        'hometextcontenttype' => $item['hometextcontenttype'],
                        'bodytext' => $item['bodytext'],
                        'bodytextcontenttype' => $item['bodytextcontenttype'],
                        'notes' => $item['notes'],
                        'sid' => $item['sid']));
        }

        // Get the module configuration vars
        $modvars = $this->getVars();

        if ($modvars['enablecategorization']) {
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');

            // check if the __CATEGORIES__ info needs a fix (when preview)
            if (isset($item['__CATEGORIES__'])) {
                foreach ($item['__CATEGORIES__'] as $prop => $catid) {
                    if (is_numeric($catid)) {
                        $item['__CATEGORIES__'][$prop] = array('id' => $catid);
                    }
                }
            }

            // Add article attribute morearticlesincat when not existing yet and functionality is enabled.
            if ($modvars['enablemorearticlesincat'] && $modvars['morearticlesincat'] == 0 && !array_key_exists('morearticlesincat', $info['__ATTRIBUTES__'])) {
                $item['__ATTRIBUTES__']['morearticlesincat'] = 0;
            }
        }

        $this->view->assign('accessadd', 0);
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_ADD)) {
            $this->view->assign('accessadd', 1);
            $this->view->assign('accesspicupload', 1);
            $this->view->assign('accesspubdetails', 1);
        } else {
            $this->view->assign('accesspicupload', SecurityUtil::checkPermission('News:pictureupload:', '::', ACCESS_ADD));
            $this->view->assign('accesspubdetails', SecurityUtil::checkPermission('News:publicationdetails:', '::', ACCESS_ADD));
        }


        if ($modvars['enablecategorization']) {
            $this->view->assign('catregistry', $catregistry);
        }

        // Assign the default languagecode
        $this->view->assign('lang', ZLanguage::getLanguageCode());

        // Assign the item to the template
        $this->view->assign('item', $item);

        // Get the preview of the item
        $this->view->assign('preview', $preview);

        // Assign the content format
        $formattedcontent = ModUtil::apiFunc('News', 'user', 'isformatted', array('func' => 'modify'));
        $this->view->assign('formattedcontent', $formattedcontent);

        //lock the page so others cannot edit it
        if (ModUtil::available('PageLock')) {
            $returnUrl = ModUtil::url('News', 'admin', 'view');
            ModUtil::apiFunc('PageLock', 'user', 'pageLock', array('lockName' => "Newsnews{$item['sid']}",
                'returnUrl' => $returnUrl));
        }
        $this->view->assign('page', 0); // this var is used in the ajax version, but this is here to prevent E_NOTICE errors

        // Return the output that has been generated by this function
        return $this->view->fetch('admin/modify.tpl');
    }

    /**
     * This is a standard function that is called with the results of the
     * form supplied by News_admin_modify() to update a current item
     *
     * @param int 'sid' the id of the item to be updated
     * @param int 'objectid' generic object id maps to sid if present
     * @param string 'title' the title of the news item
     * @param string 'urltitle' the title of the news item formatted for the url
     * @param string 'language' the language of the news item
     * @param string 'bodytext' the summary text of the news item
     * @param int 'bodytextcontenttype' the content type of the summary text
     * @param string 'extendedtext' the body text of the news item
     * @param int 'extendedtextcontenttype' the content type of the body text
     * @param string 'notes' any administrator notes
     * @param int 'published_status' the published status of the item
     * @param int 'displayonindex' display the article on the index page
     * @author Mark West
     * @return bool true
     */
    public function update($args)
    {
        $this->checkCsrfToken();
        $story = FormUtil::getPassedValue('story', isset($args['story']) ? $args['story'] : null, 'POST');
        $files = News_ImageUtil::reArrayFiles(FormUtil::getPassedValue('news_files', null, 'FILES'));

        if (!empty($story['objectid'])) {
            $story['sid'] = $story['objectid'];
        }

        // Validate the essential parameters
        if (empty($story['sid'])) {
            return LogUtil::registerArgsError();
        }

        // Get the unedited news article for the permissions check
        $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $story['sid']));
        if ($item === false) {
            return LogUtil::registerError($this->__('Error! No such article found.'), 404);
        }

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', $item['cr_uid'] . '::' . $item['sid'], ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        // Reformat the attributes array
        if (isset($story['attributes'])) {
            $story['__ATTRIBUTES__'] = News_Util::reformatAttributes($story['attributes']);
            unset($story['attributes']);
        }

        // Validate the input
        $validationerror = News_Util::validateArticle($story);
        $hookvalidators = $this->notifyHooks(new Zikula_ValidationHook('news.ui_hooks.articles.validate_edit', new Zikula_Hook_ValidationProviders()))->getValidators();
        if ($hookvalidators->hasErrors()) {
            $validationerror .= $this->__('Error! Hooked content does not validate.') . "\n";
        }

        // if the user has selected to preview the article we then route them back
        // to the new function with the arguments passed here
        if ($story['action'] == 0 || $validationerror !== false) {
            // log the error found if any
            if ($validationerror !== false) {
                LogUtil::registerError(nl2br($validationerror));
            }
            // back to the referer form
            SessionUtil::setVar('newsitem', $story);
            return $this->redirect(ModUtil::url('News', 'admin', 'modify'));
        } else {
            // As we're not previewing the item let's remove it from the session
            SessionUtil::delVar('newsitem');
        }

        // Check if the article goes from pending to published
        if ($item['published_status'] == News_Api_User::STATUS_PENDING && $story['published_status'] == News_Api_User::STATUS_PUBLISHED) {
            $story['approver'] = UserUtil::getVar('uid');
        }

        $modvars = $this->getVars();

        // Handle Images
        if ($modvars['picupload_enabled']) {
            if (isset($story['del_pictures']) && !empty($story['del_pictures'])) {
                $deletedPics = News_ImageUtil::deleteImagesByName($modvars['picupload_uploaddir'], $story['del_pictures']);
                $story['pictures'] = $story['pictures'] - $deletedPics;
            }
            if (isset($deletedPics) && ($deletedPics > 0)) {
                $nextImageId = News_ImageUtil::renumberImages($item['pictures'], $story['sid']);
            } else {
                $nextImageId = isset($story['pictures']) ? $story['pictures'] : 0;
            }
            if (isset($files) && !empty($files)) {
                list($files, $story) = News_ImageUtil::validateImages($files, $story);
                $story['pictures'] = News_ImageUtil::resizeImages($story['sid'], $files, $nextImageId); // resize and move the uploaded pics
            }
        }


        // Update the story
        if (ModUtil::apiFunc('News', 'admin', 'update', array(
                    'sid' => $story['sid'],
                    'cr_uid' => $story['cr_uid'],
                    'contributor' => UserUtil::getVar('uname', $story['cr_uid'], $item['contributor']),
                    'title' => $story['title'],
                    'urltitle' => $story['urltitle'],
                    '__CATEGORIES__' => isset($story['__CATEGORIES__']) ? $story['__CATEGORIES__'] : null,
                    '__ATTRIBUTES__' => isset($story['__ATTRIBUTES__']) ? $story['__ATTRIBUTES__'] : null,
                    'language' => isset($story['language']) ? $story['language'] : '',
                    'hometext' => isset($story['hometext']) ? $story['hometext'] : '',
                    'hometextcontenttype' => $story['hometextcontenttype'],
                    'bodytext' => isset($story['bodytext']) ? $story['bodytext'] : '',
                    'bodytextcontenttype' => $story['bodytextcontenttype'],
                    'notes' => isset($story['notes']) ? $story['notes'] : '',
                    'displayonindex' => isset($story['displayonindex']) ? $story['displayonindex'] : 0,
                    'allowcomments' => isset($story['allowcomments']) ? $story['allowcomments'] : 0,
                    'unlimited' => isset($story['unlimited']) ? $story['unlimited'] : null,
                    'from' => $story['from'],
                    'tonolimit' => isset($story['tonolimit']) ? $story['tonolimit'] : null,
                    'to' => $story['to'],
                    'approver' => $story['approver'],
                    'weight' => isset($story['weight']) ? $story['weight'] : 0,
                    'pictures' => $story['pictures'],
                    'action' => $story['action']))) {
            // Success
            LogUtil::registerStatus($this->__('Done! Saved your changes.'));
        }

        // Let any hooks know that we have edited an item.
        $url = new Zikula_ModUrl('News', 'user', 'display', ZLanguage::getLanguageCode(), array('sid' => $story['sid']));
        $this->notifyHooks(new Zikula_ProcessHook('news.ui_hooks.articles.process_edit', $story['sid'], $url));
        // release pagelock
        if (ModUtil::available('PageLock')) {
            ModUtil::apiFunc('PageLock', 'user', 'releaseLock', array('lockName' => "Newsnews{$story['sid']}"));
        }

        // clear article and view caches
        News_Controller_User::clearArticleCaches($story, $this);

        return $this->redirect(ModUtil::url('News', 'admin', 'view'));
    }

    /**
     * delete item
     *
     * @param int 'sid' the id of the news item to be deleted
     * @param int 'objectid' generic object id maps to sid if present
     * @param int 'confirmation' confirmation that this news item can be deleted
     * @author Mark West
     * @return mixed HTML string if no confirmation, true if delete successful, false otherwise
     */
    public function delete($args)
    {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'REQUEST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        if (!empty($objectid)) {
            $sid = $objectid;
        }

        // Validate the essential parameters
        if (empty($sid)) {
            return LogUtil::registerArgsError();
        }

        // Get the news story
        $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $sid));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! No such article found.'), 404);
        }

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', $item['cr_uid'] . '::' . $item['sid'], ACCESS_DELETE), LogUtil::getErrorMsgPermission());

        // Check for confirmation.
        if (empty($confirmation)) {
            // Add News story ID
            $this->view->assign('sid', $sid);
            $this->view->assign('item', $item);

            // Return the output that has been generated by this function
            return $this->view->fetch('admin/delete.tpl');
        }

        // If we get here it means that the user has confirmed the action
        // Confirm authorisation code
        $this->checkCsrfToken();

        // Delete
        if (ModUtil::apiFunc('News', 'admin', 'delete', array('sid' => $sid))) {
            // Success
            LogUtil::registerStatus($this->__('Done! Deleted article.'));

            // Let any hooks know that we have deleted an item
            $this->notifyHooks(new Zikula_ProcessHook('news.ui_hooks.articles.process_delete', $sid));
        }

        return $this->redirect(ModUtil::url('News', 'admin', 'view'));
    }

    /**
     * view items
     * @param int 'startnum' starting number for paged output
     * @author Mark West
     * @return string HTML string
     */
    public function view($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        // initialize sort array - used to display sort classes and urls
        $sort = array();
        $fields = array('sid', 'weight', 'from'); // possible sort fields
        foreach ($fields as $field) {
            $sort['class'][$field] = 'z-order-unsorted'; // default values
        }

        $startnum = FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : null, 'GETPOST');
        $news_status = FormUtil::getPassedValue('news_status', isset($args['news_status']) ? $args['news_status'] : null, 'GETPOST');
        $language = FormUtil::getPassedValue('news_language', isset($args['news_language']) ? $args['news_language'] : null, 'GETPOST');
        $purge = FormUtil::getPassedValue('purge', false, 'GET');
        $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 'from', 'GETPOST');
        $original_sdir = FormUtil::getPassedValue('sdir', isset($args['sdir']) ? $args['sdir'] : 1, 'GETPOST');

        $this->view->assign('startnum', $startnum);
        $this->view->assign('order', $order);
        $this->view->assign('sdir', $original_sdir);
        $this->view->assign('selected_language', (isset($language)) ? $language : '');
        
        $sdir = $original_sdir ? 0 : 1; //if true change to false, if false change to true
        // change class for selected 'orderby' field to asc/desc
        if ($sdir == 0) {
            $sort['class'][$order] = 'z-order-desc';
            $orderdir = 'DESC';
        }
        if ($sdir == 1) {
            $sort['class'][$order] = 'z-order-asc';
            $orderdir = 'ASC';
        }
        $filtercats = FormUtil::getPassedValue('news', null, 'GETPOST');
        $filtercats_serialized = FormUtil::getPassedValue('filtercats_serialized', false, 'GET');
        $filtercats = $filtercats_serialized ? unserialize($filtercats_serialized) : $filtercats;
        $catsarray = News_Util::formatCategoryFilter($filtercats);

        // complete initialization of sort array, adding urls
        foreach ($fields as $field) {
            $sort['url'][$field] = ModUtil::url('News', 'admin', 'view', array(
                        'news_status' => $news_status,
                        'news_language' => $language,
                        'filtercats_serialized' => serialize($filtercats),
                        'order' => $field,
                        'sdir' => $sdir));
        }
        $this->view->assign('sort', $sort);

        $this->view->assign('filter_active', (!isset($language) && !isset($news_status) && empty($filtercats)) ? false : true);

        if ($purge) {
            if (ModUtil::apiFunc('News', 'admin', 'purgepermalinks')) {
                LogUtil::registerStatus($this->__('Done! Purged permalinks.'));
            } else {
                LogUtil::registerError($this->__('Error! Could not purge permalinks.'));
            }
            return $this->redirect(strpos(System::serverGetVar('HTTP_REFERER'), 'purge') ? ModUtil::url('News', 'admin', 'view') : System::serverGetVar('HTTP_REFERER'));
        }

        // clean the session preview data
        SessionUtil::delVar('newsitem');

        // get module vars for later use
        $modvars = $this->getVars();

        if ($modvars['enablecategorization']) {
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $this->view->assign('catregistry', $catregistry);
        }

        $multilingual = System::getVar('multilingual', false);

        $now = DateUtil::getDatetime();
        $status = null;
        if (isset($news_status) && $news_status != '') {
            if ($news_status == 0) {
                $status = 0;
                $to = $now;
            } elseif ($news_status == 5) {
                // scheduled is actually the published status, but in the future
                $status = 0;
                $from = $now;
            } else {
                $status = $news_status;
            }
        }

        // Get all news stories
        $getallargs = array('startnum' => $startnum,
            'status' => $status,
            'numitems' => $modvars['itemsperadminpage'],
            'ignoreml' => true,
            'language' => $language,
            'order' => isset($order) ? $order : 'from',
            'orderdir' => isset($orderdir) ? $orderdir : 'DESC',
            'from' => isset($from) ? $from : null,
            'to' => isset($to) ? $to : null,
            'filterbydate' => false,
            'category' => null,
            'catfilter' => isset($catsarray) ? $catsarray : null,
            'catregistry' => isset($catregistry) ? $catregistry : null);
        $items = ModUtil::apiFunc('News', 'user', 'getall', $getallargs);
        $total_articles = ModUtil::apiFunc('News', 'user', 'countitems', $getallargs);

        // Set the possible status for later use
        $itemstatus = array(
            '' => $this->__('All'),
            News_Api_User::STATUS_PUBLISHED => $this->__('Published'),
            News_Api_User::STATUS_REJECTED => $this->__('Rejected'),
            News_Api_User::STATUS_PENDING => $this->__('Pending Review'),
            News_Api_User::STATUS_ARCHIVED => $this->__('Archived'),
            News_Api_User::STATUS_DRAFT => $this->__('Draft'),
            News_Api_User::STATUS_SCHEDULED => $this->__('Scheduled')
        );

        $newsitems = array();
        foreach ($items as $item)
        {
            $options = array();
            if (System::getVar('shorturls', false)) {
                $options[] = array('url' => ModUtil::url('News', 'user', 'display', array('sid' => $item['sid'], 'from' => $item['from'], 'urltitle' => $item['urltitle'])),
                    'image' => '14_layer_visible.png',
                    'title' => $this->__('View'));
            } else {
                $options[] = array('url' => ModUtil::url('News', 'user', 'display', array('sid' => $item['sid'])),
                    'image' => '14_layer_visible.png',
                    'title' => $this->__('View'));
            }

            if (SecurityUtil::checkPermission('News::', "{$item['cr_uid']}::{$item['sid']}", ACCESS_EDIT)) {
                if ($item['published_status'] == News_Api_User::STATUS_PENDING) {
                    $options[] = array('url' => ModUtil::url('News', 'admin', 'modify', array('sid' => $item['sid'])),
                        'image' => 'editcut.png',
                        'title' => $this->__('Review'));
                } else {
                    $options[] = array('url' => ModUtil::url('News', 'admin', 'modify', array('sid' => $item['sid'])),
                        'image' => 'xedit.png',
                        'title' => $this->__('Edit'));
                }

                if (($item['published_status'] != News_Api_User::STATUS_PENDING &&
                        (SecurityUtil::checkPermission('News::', "{$item['cr_uid']}::{$item['sid']}", ACCESS_DELETE))) ||
                        SecurityUtil::checkPermission('News::', "{$item['cr_uid']}::{$item['sid']}", ACCESS_ADMIN)) {
                    $options[] = array('url' => ModUtil::url('News', 'admin', 'delete', array('sid' => $item['sid'])),
                        'image' => '14_layer_deletelayer.png',
                        'title' => $this->__('Delete'));
                }
            }
            $item['options'] = $options;

            if (in_array($item['published_status'], array_keys($itemstatus))) {
                $item['status'] = $itemstatus[$item['published_status']];
            } else {
                $item['status'] = $this->__('Unknown');
            }

            $item['infuture'] = DateUtil::getDatetimeDiff_AsField($item['from'], DateUtil::getDatetime(), 6) < 0;
            $newsitems[] = $item;
        }

        // Assign the items to the template
        $this->view->assign('newsitems', $newsitems);
        $this->view->assign('total_articles', $total_articles);

        // Assign the current status filter and the possible ones
        $this->view->assign('news_status', $news_status);
        $this->view->assign('itemstatus', $itemstatus);
        $this->view->assign('order', $order);

        $selectedcategories = array();
        if (is_array($filtercats)) {
            $catsarray = $filtercats['__CATEGORIES__'];
            foreach ($catsarray as $propname => $propid) {
                if ($propid > 0) {
                    $selectedcategories[$propname] = $propid; // removes categories set to 'all'
                }
            }
        }
        $this->view->assign('selectedcategories', $selectedcategories);

        // Return the output that has been generated by this function
        return $this->view->fetch('admin/view.tpl');
    }

    /**
     * This is a standard function to modify the configuration parameters of the
     * module
     * @author Mark West
     * @return string HTML string
     */
    public function modifyconfig()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
        $properties = array_keys($catregistry);
        $propertyName = $this->getVar('topicproperty');
        $propertyIndex = empty($propertyName) ? 0 : array_search($propertyName, $properties);

        // assign the module variables
        $this->view->assign('properties', $properties);
        $this->view->assign('property', $propertyIndex);

        // Return the output that has been generated by this function
        return $this->view->fetch('admin/modifyconfig.tpl');
    }

    /**
     * This is a standard function to update the configuration parameters of the
     * module given the information passed back by the modification form
     * @author Mark West
     * @param int 'itemsperpage' number of articles per page
     * @return bool true
     */
    public function updateconfig()
    {
        $this->checkCsrfToken();
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // Update module variables
        $modvars = array();

        $refereronprint = (int)FormUtil::getPassedValue('refereronprint', 0, 'POST');
        if ($refereronprint != 0 && $refereronprint != 1) {
            $refereronprint = 0;
        }
        $modvars['refereronprint'] = $refereronprint;
        $modvars['itemsperpage'] = (int)FormUtil::getPassedValue('itemsperpage', 25, 'POST');
        $modvars['itemsperadminpage'] = (int)FormUtil::getPassedValue('itemsperadminpage', 15, 'POST');
        $modvars['storyhome'] = (int)FormUtil::getPassedValue('storyhome', 10, 'POST');
        $modvars['storyorder'] = (int)FormUtil::getPassedValue('storyorder', 1, 'POST');
        $modvars['enablecategorization'] = (bool)FormUtil::getPassedValue('enablecategorization', false, 'POST');
        $modvars['enableattribution'] = (bool)FormUtil::getPassedValue('enableattribution', false, 'POST');
        $catimagepath = FormUtil::getPassedValue('catimagepath', '/images/categories/', 'POST');
        if (substr($catimagepath, -1) != '/') {
            $catimagepath .= '/'; // add slash if needed
        }
        $modvars['catimagepath'] = $catimagepath;
        $modvars['enableajaxedit'] = (bool)FormUtil::getPassedValue('enableajaxedit', false, 'POST');
        $modvars['enablemorearticlesincat'] = (bool)FormUtil::getPassedValue('enablemorearticlesincat', false, 'POST');
        $modvars['morearticlesincat'] = (int)FormUtil::getPassedValue('morearticlesincat', 0, 'POST');
        $modvars['enabledescriptionvar'] = (bool)FormUtil::getPassedValue('enabledescriptionvar', false, 'POST');
        $modvars['descriptionvarchars'] = (int)FormUtil::getPassedValue('descriptionvarchars', 250, 'POST');
        $modvars['enablecategorybasedpermissions'] = (bool)FormUtil::getPassedValue('enablecategorybasedpermissions', false, 'POST');

        $modvars['notifyonpending'] = (bool)FormUtil::getPassedValue('notifyonpending', false, 'POST');
        $modvars['notifyonpending_fromname'] = FormUtil::getPassedValue('notifyonpending_fromname', '', 'POST');
        $modvars['notifyonpending_fromaddress'] = FormUtil::getPassedValue('notifyonpending_fromaddress', '', 'POST');
        $modvars['notifyonpending_toname'] = FormUtil::getPassedValue('notifyonpending_toname', '', 'POST');
        $modvars['notifyonpending_toaddress'] = FormUtil::getPassedValue('notifyonpending_toaddress', '', 'POST');
        $modvars['notifyonpending_subject'] = FormUtil::getPassedValue('notifyonpending_subject', '', 'POST');
        $modvars['notifyonpending_html'] = (bool)FormUtil::getPassedValue('notifyonpending_html', true, 'POST');

        $modvars['pdflink'] = (bool)FormUtil::getPassedValue('pdflink', false, 'POST');
        $modvars['pdflink_tcpdfpath'] = FormUtil::getPassedValue('pdflink_tcpdfpath', '', 'POST');
        $modvars['pdflink_tcpdflang'] = FormUtil::getPassedValue('pdflink_tcpdflang', '', 'POST');
        $modvars['pdflink_headerlogo'] = FormUtil::getPassedValue('pdflink_headerlogo', '', 'POST');
        $modvars['pdflink_headerlogo_width'] = FormUtil::getPassedValue('pdflink_headerlogo_width', '', 'POST');
        $modvars['pdflink_enablecache'] = (bool)FormUtil::getPassedValue('pdflink_enablecache', false, 'POST');

        $modvars['picupload_enabled'] = (bool)FormUtil::getPassedValue('picupload_enabled', false, 'POST');
        $modvars['picupload_allowext'] = str_replace(array(' ', '.'), '', FormUtil::getPassedValue('picupload_allowext', 'jpg,gif,png', 'POST'));
        $modvars['picupload_index_float'] = FormUtil::getPassedValue('picupload_index_float', 'left', 'POST');
        $modvars['picupload_article_float'] = FormUtil::getPassedValue('picupload_article_float', 'left', 'POST');
        $modvars['picupload_maxfilesize'] = (int)FormUtil::getPassedValue('picupload_maxfilesize', '500000', 'POST');
        $modvars['picupload_maxpictures'] = (int)FormUtil::getPassedValue('picupload_maxpictures', 3, 'POST');
        $modvars['picupload_sizing'] = FormUtil::getPassedValue('picupload_sizing', '0', 'POST');
        $modvars['picupload_picmaxwidth'] = (int)FormUtil::getPassedValue('picupload_picmaxwidth', 600, 'POST');
        $modvars['picupload_picmaxheight'] = (int)FormUtil::getPassedValue('picupload_picmaxheight', 600, 'POST');
        $modvars['picupload_thumbmaxwidth'] = (int)FormUtil::getPassedValue('picupload_thumbmaxwidth', 150, 'POST');
        $modvars['picupload_thumbmaxheight'] = (int)FormUtil::getPassedValue('picupload_thumbmaxheight', 150, 'POST');
        $modvars['picupload_thumb2maxwidth'] = (int)FormUtil::getPassedValue('picupload_thumb2maxwidth', 200, 'POST');
        $modvars['picupload_thumb2maxheight'] = (int)FormUtil::getPassedValue('picupload_thumb2maxheight', 200, 'POST');
        $modvars['picupload_uploaddir'] = FormUtil::getPassedValue('picupload_uploaddir', '', 'POST');
        $createfolder = (bool)FormUtil::getPassedValue('picupload_createfolder', false, 'POST');

        // create picture upload folder if needed
        if ($modvars['picupload_enabled']) {
            if ($createfolder && !empty($modvars['picupload_uploaddir'])) {
                News_ImageUtil::mkdir($modvars['picupload_uploaddir']);
            }
        }

        $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
        $properties = array_keys($catregistry);
        $topicproperty = FormUtil::getPassedValue('topicproperty', null, 'POST');
        $modvars['topicproperty'] = $properties[$topicproperty];

        $permalinkformat = FormUtil::getPassedValue('permalinkformat', null, 'POST');
        if ($permalinkformat == 'custom') {
            $permalinkformat = FormUtil::getPassedValue('permalinkstructure', null, 'POST');
        }
        $modvars['permalinkformat'] = $permalinkformat;

        $this->setVars($modvars);

        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Saved module settings.'));

        return $this->redirect(ModUtil::url('News', 'admin', 'view'));
    }

    /**
     * A function to handle bulk actions in the admin interface
     *
     * @param array 'articles' array of article ids to process
     * @param int 'bulkaction' the action to take
     * @return bool true
     */
    public function processbulkaction()
    {
        $this->checkCsrfToken();
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_DELETE), LogUtil::getErrorMsgPermission());

        $articles = FormUtil::getPassedValue('news_selected_articles', array(), 'POST');
        $bulkaction = (int)FormUtil::getPassedValue('news_bulkaction_select', 0, 'POST');
        $cat_data = FormUtil::getPassedValue('news_bulkaction_categorydata', '', 'POST');
        
	//XTEC ************ MODIFICAT - Add new action: 6-Pending
	//2013.09.25 @jmeler
       
        if ($bulkaction >= 1 && $bulkaction <= 6) {
            $actionmap = array(
                // these indices are not constants, just unrelated integers
                1 => __('Delete'),
                2 => __('Archive'),
                3 => __('Publish'),
                4 => __('Reject'),
                5 => __('Change categories'),
                6 => __('Pending'));

	//************ FI
                
            $updateresult = array(
                'successful' => array(),
                'failed' => array());

            switch ($bulkaction) {
                case 1: // delete

                    foreach ($articles as $article) {
                        if (DBUtil::deleteObjectByID('news', $article, 'sid')) {
                            // assume max pictures. if less, errors are supressed by @
                            News_ImageUtil::deleteImagesBySID($this->getVar('picupload_uploaddir'), $article, $this->getVar('picupload_maxpictures'));
                            $updateresult['successful'][] = $article;
                        } else {
                            $updateresult['failed'][] = $article;
                        }
                    }
                    break;
                case 5: // change categories
                    $obj = array();
                    $obj['__CATEGORIES__'] = json_decode($cat_data, true);
                    unset($obj['__CATEGORIES__']['submit']);
                    foreach ($articles as $article) {
                        $obj['sid'] = $article;
                        if (DBUtil::updateObject($obj, 'news', '', 'sid')) {
                            $updateresult['successful'][] = $article;
                        } else {
                            $updateresult['failed'][] = $article;
                        }
                    }
                    break;
                default: // archive, publish or reject
                    $statusmap = array(
                        2 => News_Api_User::STATUS_ARCHIVED,
                        3 => News_Api_User::STATUS_PUBLISHED,
                        4 => News_Api_User::STATUS_REJECTED
                    );
                    foreach ($articles as $article) {
                        $obj = array(
                            'sid' => $article,
                            'published_status' => $statusmap[$bulkaction]
                        );
                        if (DBUtil::updateObject($obj, 'news', '', 'sid')) {
                            $updateresult['successful'][] = $article;
                        } else {
                            $updateresult['failed'][] = $article;
                        }
                    }
            }
            $updateresult['successful']['list'] = implode(', ', $updateresult['successful']);
            $updateresult['failed']['list'] = implode(', ', $updateresult['failed']);
            LogUtil::registerStatus($this->__f('Processed Bulk Action. Action: %s.', $actionmap[$bulkaction]));
            if (!empty($updateresult['successful']['list'])) {
                LogUtil::registerStatus($this->__f('Success with articles: %s', $updateresult['successful']['list']));
            }
            if (!empty($updateresult['failed']['list'])) {
                LogUtil::registerError($this->__f('Failed with articles: %s', $updateresult['failed']['list']));
            }
        } else {
            LogUtil::registerError($this->__('Error! Wrong bulk action.'));
        }
        return $this->redirect(ModUtil::url('News', 'admin', 'view'));
    }

    /**
     * Function to display a user selector form. This is used as a 'popup' window
     * from the Article Modify template. Using JS, the content of the form is
     * dumped back into the modify template.
     *
     * @return boolean
     */
    public function selectuser()
    {
        $this->view->assign('id', FormUtil::getPassedValue('id', 2, 'GET'));
        $this->view->display('admin/userselector.tpl');
        return true;
    }

}
