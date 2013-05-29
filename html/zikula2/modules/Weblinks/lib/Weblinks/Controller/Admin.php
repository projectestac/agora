<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
use \Weblinks_Entity_Link as Link;

class Weblinks_Controller_Admin extends Zikula_AbstractController
{

    public function postInitialize()
    {
        $this->view->setCaching(false);
    }

    public function main()
    {
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'view'));
    }

    /**
     * Main admin view
     * Currently shows all new link requests, broken and modified link requests
     * Also provides form to validate links (by category if desired)
     * 
     * @return string (html)
     */
    public function view()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());
        
        $newlinks = Weblinks_Util::checkCategoryPermissions($this->entityManager->getRepository('Weblinks_Entity_Link')->getLinks(Link::INACTIVE, "<="), ACCESS_DELETE);
        foreach ($newlinks as $key => $link) {
            $newlinks[$key]['valid'] = Weblinks_Util::validateLink($link); 
        }

        $this->view->assign('numrows', $this->entityManager->getRepository('Weblinks_Entity_Link')->getCount())
                ->assign('catnum', $this->entityManager->getRepository('Weblinks_Entity_Category')->getCount())
                ->assign('totalbrokenlinks', $this->entityManager->getRepository('Weblinks_Entity_Link')->getCount(Link::ACTIVE_BROKEN, '='))
                ->assign('totalmodrequests', $this->entityManager->getRepository('Weblinks_Entity_Link')->getCount(Link::ACTIVE_MODIFIED, '='))
                ->assign('newlinks', $newlinks);

        return $this->view->fetch('admin/view.tpl');
    }

    /**
     * Category administration
     * Allow admin to add/modify/delete a category
     * 
     * @return string (html)
     */
    public function catview()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->view->assign('catnum', $this->entityManager->getRepository('Weblinks_Entity_Category')->getCount());

        return $this->view->fetch('admin/catview.tpl');
    }

    /**
     * Process an add category request
     * 
     * @param array $newcategory (via POST)
     * 
     * @return NULL (redirect)
     */
    public function addcategory()
    {
        // get parameters we need
        $newCategory = $this->getPassedValue('newcategory', array(), 'POST');
        if (empty($newCategory)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_ADD), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // check and add a new category
        if (ModUtil::apiFunc('Weblinks', 'admin', 'editcategory', $newCategory)) {
            // Success
            $this->registerStatus($this->__('Category successfully added'));
        }

        // redirect to function catview
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'catview'));
    }

    /**
     * Modify a category
     * 
     * @param integer $cid (via POST)
     * 
     * @return string (html)
     */
    public function modcategory()
    {
        // get parameters we need
        $cid = (int)$this->getPassedValue('cid', 0, 'POST');
        if (empty($cid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        $this->view->assign('category', $this->entityManager->find('Weblinks_Entity_Category', $cid)->toArray());

        return $this->view->fetch('admin/modcategory.tpl');
    }

    /**
     * Process a modify category request
     * 
     * @param array $modifiedcategory (via POST)
     * 
     * @return NULL (redirect)
     */
    public function savemodcategory()
    {
        // get parameters we need
        $modifiedCategory = $this->getPassedValue('modifiedcategory', array(), 'POST');
        if (empty($modifiedCategory)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // update the category with new vars
        if (ModUtil::apiFunc('Weblinks', 'admin', 'editcategory', $modifiedCategory)) {
            // Success
            $this->registerStatus($this->__('Category successfully modified'));
        }

        // redirect to function catview
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'catview'));
    }

    /**
     * Present confirmation to delete a category
     * 
     * @param integer $cid (via POST)
     * 
     * @return string (html)
     */
    public function suredelcategory()
    {
        // get parameters we need
        $cid = (int)$this->getPassedValue('cid', 0, 'POST');
        if (empty($cid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_DELETE), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();
        
        $category = $this->entityManager->find('Weblinks_Entity_Category', $cid);
        
        ModUtil::apiFunc('Weblinks', 'admin', 'doRecursiveCategoryCount', $category);
        $affectedCategories = Weblinks_Api_Admin::$recursiveCategoryCount;

        $this->view->assign('category', $category)
                ->assign('affectedcategories', $affectedCategories);

        return $this->view->fetch('admin/suredelcategory.tpl');
    }

    /**
     * Process delete category request
     * 
     * @param integer $cid (via POST)
     * 
     * @return NULL (redirect)
     */
    public function delcategory()
    {
        // get parameters we need
        $cid = (int)$this->getPassedValue('cid', 0, 'POST');
        if (empty($cid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_DELETE), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // delete the category
        if (ModUtil::apiFunc('Weblinks', 'admin', 'delcategory', array('cid' => $cid))) {
            // Success
            $this->registerStatus($this->__('Category successfully deleted'));
        }

        // redirect to function catview
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'catview'));
    }

    /**
     * Link administration
     * Allow admin to add/edit/delete a link
     * 
     * @return string (html)
     */
    public function linkview()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->view->assign('catnum', $this->entityManager->getRepository('Weblinks_Entity_Category')->getCount())
                ->assign('numrows', $this->entityManager->getRepository('Weblinks_Entity_Link')->getCount())
                ->assign('submitter', UserUtil::getVar('uname'))
                ->assign('submitteremail', UserUtil::getVar('email'));

        return $this->view->fetch('admin/linkview.tpl');
    }

    /**
     * Process a newlink request from an Admin
     * 
     * @param array $link (via POST)
     * 
     * @return NULL (redirect)
     */
    public function addlink()
    {
        // get parameters we need
        $link = $this->getPassedValue('link', array(), 'POST');
        if (empty($link)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_ADD), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // VALIDATION
        if ($this->getVar('doubleurl') == 0) {
            // check if URL already exists
            $checkurl = count($this->entityManager->getRepository('Weblinks_Entity_Link')->findBy(array('url' => $link['url'], 'status' => Link::ACTIVE)));
            if ($checkurl > 0) {
                $this->registerError($this->__('Sorry! Please try again: this link is already listed in the database!'));
                $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
            }
        }
        /* Check if Title exists */
        if (empty($link['title'])) {
            $this->registerError($this->__('Sorry! Please try again: you need to specify a TITLE for your link!'));
            $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
        }
        /* Check if URL exists */
        if (empty($link['url'])) {
            $this->registerError($this->__('Sorry! Please try again: you need to specify a URL for your link!'));
            $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
        }
        // check hooked modules for validation
        $hook = new Zikula_ValidationHook('weblinks.ui_hooks.link.validate_edit', new Zikula_Hook_ValidationProviders());
        $hookvalidators = $this->notifyHooks($hook)->getValidators();
        if ($hookvalidators->hasErrors()) {
            $this->registerError($this->__('Error! Hooked content does not validate.'));
            $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
        }
       
        // add link to db
        $lid = ModUtil::apiFunc('Weblinks', 'admin', 'editlink', $link);
        if ($lid <= 0) {
            $this->registerError($this->__('Error! Could not add link to db.'));
            $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
        } else {
            $this->registerStatus($this->__('New link added to the database'));
        }

        // notify hooks
        $url = new Zikula_ModUrl('Weblinks', 'user', 'viewlinkdetails', ZLanguage::getLanguageCode(), array('lid' => $lid));
        $this->notifyHooks(new Zikula_ProcessHook('weblinks.ui_hooks.link.process_edit', $lid, $url));
        
        if ($link['new'] == 1) {
            // send email
            if (!empty($link['email'])) {
                $sitename = System::getVar('sitename');
                // $adminmail = System::getVar('adminmail');
                // $from = $adminmail; ??
                $webmailLink = ModUtil::url('Weblinks', 'user', 'viewlinkdetails', array('lid' => $lid), null, null, true);
                $subject = $this->__('Your link at') . " " . DataUtil::formatForDisplay($sitename);
                $message = $this->__('Hello') . " " . DataUtil::formatForDisplay($link['name']) . ",<br /><br />" . $this->__("your link submission has been approved for the site's search engine.") . "<br /><br />" . $this->__('Link title')
                        . ": " . DataUtil::formatForDisplay($link['title']) . "<br />" . $this->__('URL') . ": " . DataUtil::formatForDisplay($link['url']) . "<br />" . $this->__('Description') . ": " . DataUtil::formatForDisplayHTML($link['description']) . "<br /><br /><br />"
                        . $this->__("The link is viewable on the site here:") . "<br /><a href='$webmailLink'>$webmailLink</a><br /><br />"
                        . $this->__('Thank you for your submission!') . "<br /><br />" . DataUtil::formatForDisplay($sitename) . " " . $this->__('team.');
                // send the e-mail
                ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $link['email'], 'subject' => $subject, 'body' => $message, 'html' => true));
            }
        }

        $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
    }

    /**
     * Allow admin to directly modify the link
     * 
     * @param integer $lid (via GETPOST)
     * 
     * @return string (html)
     */
    public function modlink()
    {
        // get parameters we need
        $lid = (int)$this->getPassedValue('lid', 0, 'GETPOST');
        if (empty($lid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        // get linkarray from db
        $link = $this->entityManager->find('Weblinks_Entity_Link', $lid)->toArray();
        
        // check if $link return
        if (!isset($link)) {
            $this->registerError($this->__('No link found'));
            $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
        }

        $this->view->assign('link', $link);

        return $this->view->fetch('admin/modlink.tpl');
    }

    /**
     * Process modlink request by admin
     * 
     * @param array $link (via POST)
     * 
     * @return NULL (redirect)
     */
    public function modlinks()
    {
        // get parameters we need
        $link = $this->getPassedValue('link', array(), 'POST');
        if (empty($link)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // update the link with new vars
        if (ModUtil::apiFunc('Weblinks', 'admin', 'editlink', $link)) {
            // Success
            $url = new Zikula_ModUrl('Weblinks', 'user', 'viewlinkdetails', ZLanguage::getLanguageCode(), array('lid' => $link['lid']));
            $this->notifyHooks(new Zikula_ProcessHook('weblinks.ui_hooks.link.process_edit', $link['lid'], $url));
            $this->registerStatus($this->__('Link successfully modified'));
        }

        // redirect to function linkview
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
    }

    /**
     * Process delete link request from admin
     * 
     * @param integer $lid (via GET)
     * 
     * @return NULL (redirect)
     */
    public function dellink()
    {
        // get parameters we need
        $lid = (int)$this->getPassedValue('lid', 0, 'GET');
        if (empty($lid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_DELETE), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken($this->getPassedValue('csrftoken', NULL, 'GETPOST'));

        // delete the link
        $link = $this->entityManager->find('Weblinks_Entity_Link', $lid);
        if (isset($link)) {
            $this->entityManager->remove($link);
            $this->entityManager->flush();
            $this->registerStatus($this->__('Link removed from the database'));
            $this->notifyHooks(new Zikula_ProcessHook('weblinks.ui_hooks.link.process_delete', $lid));
        }

        // redirect to function linkview
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'linkview'));
    }

    /**
     * Validate links by category
     * 
     * @param integer $cid (via POST) (optional) (default: 0)
     * 
     * @return string (html)
     */
    public function validate()
    {
        // get parameters we need
        $cid = (int)$this->getPassedValue('cid', 0, 'POST');

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // check links
        $links = ModUtil::apiFunc('Weblinks', 'admin', 'validateLinksByCategory', array('cid' => $cid));

        $this->view->assign('cid', $cid)
                ->assign('links', $links);

        return $this->view->fetch('admin/validate.tpl');
    }

    /**
     * List broken link moderation requests
     * 
     * @return string (html)
     */
    public function listbrokenlinks()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());
        
        $brokenlinks = Weblinks_Util::checkCategoryPermissions($this->entityManager->getRepository('Weblinks_Entity_Link')->findBy(array('status' => Link::ACTIVE_BROKEN)), ACCESS_EDIT);
        foreach($brokenlinks as $key => $brokenlink) {
            $brokenlinks[$key] = $brokenlink->toArray();
            $brokenlinks[$key]['valid'] = Weblinks_Util::validateLink($brokenlink); 
        }
        $this->view->assign('totalbrokenlinks', $this->entityManager->getRepository('Weblinks_Entity_Link')->getCount(Link::ACTIVE_BROKEN, '='))
                ->assign('brokenlinks', $brokenlinks);

        return $this->view->fetch('admin/listbrokenlinks.tpl');
    }

    /**
     * Process ignore broken link request
     * 
     * @param integer $lid (via GETPOST)
     * 
     * @return NULL (redirect)
     */
    public function ignorebrokenlinks()
    {
        // get parameters we need
        $lid = (int)$this->getPassedValue('lid', 0, 'GETPOST');
        if (empty($lid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken($this->getPassedValue('csrftoken', NULL, 'GET'));

        // change status of link
        $link = $this->entityManager->find('Weblinks_Entity_Link', $lid);
        $link->setStatus(Link::ACTIVE);
        $this->entityManager->flush();

        // redirect to function listbrokenlinks
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'listbrokenlinks'));
    }

    /**
     * List modification requests
     * 
     * @return string (html)
     */
    public function listmodrequests()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->view->assign('totalmodrequests', $this->entityManager->getRepository('Weblinks_Entity_Link')->getCount(Link::ACTIVE_MODIFIED, '='))
                ->assign('modrequests', ModUtil::apiFunc('Weblinks', 'admin', 'modrequests'));

        return $this->view->fetch('admin/listmodrequests.tpl');
    }

    /**
     * Process Link modification request from user
     * 
     * @param integer $lid (via GETPOST)
     * 
     * @return NULL (redirect)
     */
    public function changemodrequests()
    {
        // get parameters we need
        $lid = (int)$this->getPassedValue('lid', 0, 'GETPOST');
        if (empty($lid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken($this->getPassedValue('csrftoken', NULL, 'GET'));

        $link = $this->entityManager->find('Weblinks_Entity_Link', $lid);
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::Link', "::{$link->getLid()}", ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        if ($link) {
            // update to new values
            $modifiedContent = $link->getModifiedContent();
            $link->setTitle($modifiedContent['title']);
            $link->setUrl($modifiedContent['url']);
            $link->setDescription($modifiedContent['description']);
            $link->setSubmitter($modifiedContent['modifysubmitter']);
            if ($link->getCat_id() <> $modifiedContent['cat_id']) {
                $newCategory = $this->entityManager->find('Weblinks_Entity_Category', $modifiedContent['cat_id']);
                $link->setCategory($newCategory);
            }
            // clear modified values
            $link->setModifiedContent(null);
            $link->setModifysubmitter('');
            $link->setStatus(Link::ACTIVE);
            
            $this->entityManager->flush();
            
            $url = new Zikula_ModUrl('Weblinks', 'user', 'viewlinkdetails', ZLanguage::getLanguageCode(), array('lid' => $link->getLid()));
            $this->notifyHooks(new Zikula_ProcessHook('weblinks.ui_hooks.link.process_edit', $link->getLid(), $url));
            $this->registerStatus($this->__('Link was changed successfully'));
        } else {
            $this->registerError($this->__('Could not find link.'));            
        }

        $this->redirect(ModUtil::url('Weblinks', 'admin', 'listmodrequests'));
    }

    /**
     * Delete a user modification request (convert to ACTIVE)
     * 
     * @param integer $lid (via GET)
     * 
     * @return NULL (redirect)
     */
    public function delmodrequests()
    {
        // get parameters we need
        $lid = (int)$this->getPassedValue('lid', 0, 'GET');
        if (empty($lid)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken($this->getPassedValue('csrftoken', NULL, 'GET'));

        $link = $this->entityManager->find('Weblinks_Entity_Link', $lid);
        $link->setModifiedContent(null);
        $link->setModifysubmitter('');
        $link->setStatus(Link::ACTIVE);
        $this->entityManager->flush();
        $this->registerStatus($this->__('User link modification requests was ignored'));

        // redirect to function listmodrequests
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'listmodrequests'));
    }

    /**
     * Show modify config form
     * 
     * @return string (html)
     */
    public function getconfig()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        return $this->view->fetch('admin/getconfig.tpl');
    }

    /**
     * Update the module config
     * 
     * @param array $config (via POST)
     * 
     * @return NULL (redirect)
     */
    public function updateconfig()
    {
        // get our input
        $config = $this->getPassedValue('config', array(), 'POST');
        if (empty($config)) {
            return LogUtil::registerArgsError();
        }

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();
        
        $defaults = Weblinks_Util::getDefaults();

        // Update module variables
        if (!isset($config['perpage']) || !is_numeric($config['perpage'])) {
            $config['perpage'] = $defaults['perpage'];
        }
        if (!isset($config['newlinks']) || !is_numeric($config['newlinks'])) {
            $config['newlinks'] = $defaults['newlinks'];
        }
        if (!isset($config['bestlinks']) || !is_numeric($config['bestlinks'])) {
            $config['bestlinks'] = $defaults['bestlinks'];
        }
        if (!isset($config['linksresults']) || !is_numeric($config['linksresults'])) {
            $config['linksresults'] = $defaults['linksresults'];
        }
        if (!isset($config['linksinblock']) || !is_numeric($config['linksinblock'])) {
            $config['linksinblock'] = $defaults['linksinblock'];
        }
        if (!isset($config['popular']) || !is_numeric($config['popular'])) {
            $config['popular'] = $defaults['popular'];
        }
        if (!isset($config['mostpoplinkspercentrigger']) || !is_numeric($config['mostpoplinkspercentrigger'])) {
            $config['mostpoplinkspercentrigger'] = $defaults['mostpoplinkspercentrigger'];
        }
        if (!isset($config['mostpoplinks']) || !is_numeric($config['mostpoplinks'])) {
            $config['mostpoplinks'] = $defaults['mostpoplinks'];
        }
        if (!isset($config['featurebox']) || !is_numeric($config['featurebox'])) {
            $config['featurebox'] = $defaults['featurebox'];
        }
        if (!isset($config['targetblank']) || !is_numeric($config['targetblank'])) {
            $config['targetblank'] = $defaults['targetblank'];
        }
        if (!isset($config['doubleurl']) || !is_numeric($config['doubleurl'])) {
            $config['doubleurl'] = $defaults['doubleurl'];
        }
        if (!isset($config['unregbroken']) || !is_numeric($config['unregbroken'])) {
            $config['unregbroken'] = $defaults['unregbroken'];
        }
        if (!isset($config['blockunregmodify']) || !is_numeric($config['blockunregmodify'])) {
            $config['blockunregmodify'] = $defaults['blockunregmodify'];
        }
        if (!isset($config['links_anonaddlinklock']) || !is_numeric($config['links_anonaddlinklock'])) {
            $config['links_anonaddlinklock'] = $defaults['links_anonaddlinklock'];
        }
        if (!isset($config['thumber']) || !is_numeric($config['thumber'])) {
            $config['thumber'] = $defaults['thumber'];
        }
        if (!isset($config['thumbersize'])) {
            $config['thumbersize'] = $defaults['thumbersize'];
        }
        if (!isset($config['showPendingContent'])) {
            $config['showPendingContent'] = 0;
        }
        
        $this->setVars($config);

        // the module configuration has been updated successfuly
        $this->registerStatus($this->__('Configuration updated'));

        // redirect to function getconfig
        $this->redirect(ModUtil::url('Weblinks', 'admin', 'getconfig'));
    }

    /**
     * Show helpful information to admin
     * 
     * @return string (html)
     */
    public function help()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        return $this->view->fetch('admin/help.tpl');
    }

    /**
     * Helper function to convert old getPassedValue method to Core 1.3.3-standard
     * 
     * @param string $variable
     * @param mixed $defaultValue
     * @param string $type
     * @return mixed 
     */
    private function getPassedValue($variable, $defaultValue, $type = 'POST')
    {
        if ($type == 'POST') {
            return $this->request->request->get($variable, $defaultValue);
        } else if ($type == 'GET') {
            return $this->request->query->get($variable, $defaultValue);
        } else {
            // else try GET then POST
            return $this->request->query->get($variable, $this->request->request->get($variable, $defaultValue));
        }
    }

}