<?php

class Content_Form_Handler_Admin_ClonePage extends Zikula_Form_AbstractHandler
{
    var $pageId; // Parent or previous page ID or null for new top page
    var $backref;

    public function __construct($args)
    {
        $this->args = $args;
    }

    public function initialize(Zikula_Form_View $view)
    {
        $this->pageId = FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : null);

        if (!SecurityUtil::checkPermission('Content:page:', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }
        if (!SecurityUtil::checkPermission('Content:page:', $this->pageId . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array('id' => $this->pageId, 'filter' => array('checkActive' => false), 'includeContent' => false));
        if ($page === false) {
            throw new Zikula_Exception_Fatal($this->__('Page not found'));
        }

        // Only allow subpages if edit access on parent page
        if (!SecurityUtil::checkPermission('Content:page:', $page['id'] . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        PageUtil::setVar('title', $this->__('Clone page') . ' : ' . $page['title']);

        $this->view->assign('page', $page);
        Content_Util::contentAddAccess($this->view, $this->pageId);

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        if (!SecurityUtil::checkPermission('Content:page:', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden($this->__('Error! You have not been granted access to create pages.'));
        }

        $url = ModUtil::url('Content', 'admin', 'main');

        if ($args['commandName'] == 'clonePage') {
            $pageData = $this->view->getValues();

            $validators = $this->notifyHooks(new Zikula_ValidationHook('content.ui_hooks.pages.validate_edit', new Zikula_Hook_ValidationProviders()))->getValidators();

            if (!$validators->hasErrors() && $this->view->isValid()) {
                $id = ModUtil::apiFunc('Content', 'Page', 'clonePage', array('page' => $pageData, 'pageId' => $this->pageId));
                if ($id === false) {
                    return $this->view->registerError(null);
                }
                // notify any hooks they may now commit the as the original form has been committed.
                $objectUrl = new Zikula_ModUrl('Content', 'user', 'view', ZLanguage::getLanguageCode(), array('pid' => $this->pageId));
                $this->notifyHooks(new Zikula_ProcessHook('content.ui_hooks.pages.process_edit', $this->pageId, $objectUrl));
            } else {
                return false;
            }
            $url = ModUtil::url('Content', 'admin', 'editPage', array('pid' => $id));
        } else if ($args['commandName'] == 'cancel') {
        }
        return $this->view->redirect($url);
    }
}
