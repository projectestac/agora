<?php

class Content_Form_Handler_Admin_Page extends Zikula_Form_AbstractHandler
{
    var $pageId;
    var $backref;

    public function __construct($args)
    {
        $this->args = $args;
    }

    public function initialize(Zikula_Form_View $view)
    {
        $this->pageId = (int) FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : -1);

        if (!SecurityUtil::checkPermission('Content:page:', $this->pageId . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
            'id' => $this->pageId,
            'editing' => true,
            'filter' => array('checkActive' => false),
            'enableEscape' => false,
            'translate' => false,
            'includeContent' => true,
            'includeCategories' => true));
        if ($page === false) {
            return $this->view->registerError(null);
        }

        // load the category registry util
        $mainCategory = CategoryRegistryUtil::getRegisteredModuleCategory('Content', 'content_page',  $this->getVar('categoryPropPrimary'), 30);
        $secondCategory = CategoryRegistryUtil::getRegisteredModuleCategory('Content', 'content_page',  $this->getVar('categoryPropSecondary'));
        $multilingual = ModUtil::getVar(ModUtil::CONFIG_MODULE, 'multilingual');
        if ($page['language'] == ZLanguage::getLanguageCode()) {
            $multilingual = false;
        }

        PageUtil::setVar('title', $this->__("Edit page") . ' : ' . $page['title']);

        $pagelayout = ModUtil::apiFunc('Content', 'Layout', 'getLayout', array('layout' => $page['layout']));
        if ($pagelayout === false) {
            return $this->view->registerError(null);
        }
        $layouts = ModUtil::apiFunc('Content', 'Layout', 'getLayouts');
        if ($layouts === false) {
            return $this->view->registerError(null);
        }

        $layoutTemplate = $page['layoutEditTemplate'];
        $this->view->assign('layoutTemplate', $layoutTemplate);
        $this->view->assign('mainCategory', $mainCategory);
        $this->view->assign('secondCategory', $secondCategory);
        $this->view->assign('page', $page);
        $this->view->assign('multilingual', $multilingual);
        $this->view->assign('layouts', $layouts);
        $this->view->assign('pagelayout', $pagelayout);
        $this->view->assign('enableVersioning',  $this->getVar('enableVersioning'));
        $this->view->assign('categoryUsage',  $this->getVar('categoryUsage'));
        Content_Util::contentAddAccess($this->view, $this->pageId);

        if (!$this->view->isPostBack() && FormUtil::getPassedValue('back', 0)) {
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        }
        if ($this->backref != null) {
            $returnUrl = $this->backref;
        } else {
            $returnUrl = ModUtil::url('Content', 'admin', 'main');
        }
        ModUtil::apiFunc('PageLock', 'user', 'pageLock', array('lockName' => "contentPage{$this->pageId}", 'returnUrl' => $returnUrl));

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = null;

        if ($args['commandName'] == 'save' || $args['commandName'] == 'saveAndView' || $args['commandName'] == 'translate') {

            $pageData = $this->view->getValues();

            // fetch old data *before* updating
            $oldPageData = ModUtil::apiFunc('Content', 'Page', 'getPage', array('id' => $this->pageId, 'editing' => true, 'filter' => array('checkActive' => false), 'enableEscape' => false));
            if ($oldPageData === false) {
                return $this->view->registerError(null);
            }
            $hook = new Zikula_ValidationHook('content.ui_hooks.pages.validate_edit', new Zikula_Hook_ValidationProviders());
            $this->notifyHooks($hook);
            $validators = $hook->getValidators();
            if (!$validators->hasErrors() && $this->view->isValid()) {
                $ok = ModUtil::apiFunc('Content', 'Page', 'updatePage', array('page' => $pageData['page'], 'pageId' => $this->pageId));
                if ($ok === false) {
                    return $this->view->registerError(null);
                }
                // notify any hooks they may now commit the as the original form has been committed.
                $objectUrl = new Zikula_ModUrl($this->name, 'user', 'view', ZLanguage::getLanguageCode(), array('pid' => $this->pageId));
                $this->notifyHooks(new Zikula_ProcessHook('content.ui_hooks.pages.process_edit', $this->pageId, $objectUrl));
            } else {
                return false;
            }

            if ($args['commandName'] == 'translate') {
                $url = ModUtil::url('Content', 'admin', 'translatepage', array('pid' => $this->pageId));
            } else if ($args['commandName'] == 'saveAndView') {
                $url = ModUtil::url('Content', 'user', 'view', array('pid' => $this->pageId));
            } else if ($oldPageData['layout'] != $pageData['page']['layout']) {
                $url = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
                LogUtil::registerStatus($this->__('Layout changed'));
            }
        } else if ($args['commandName'] == 'deleteContent') {
            $ok = ModUtil::apiFunc('Content', 'Content', 'deleteContent', array('contentId' => $args['commandArgument']));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
            $url = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
        } else if ($args['commandName'] == 'cloneContent') {
            $clonedId = ModUtil::apiFunc('Content', 'Content', 'cloneContent', array('id' => (int) $args['commandArgument'], 'translation' => true));
            if ($clonedId === false) {
                return $this->view->registerError(null);
            }
            $url = ModUtil::url('Content', 'admin', 'editcontent', array('cid' => $clonedId));
        } else if ($args['commandName'] == 'deletePage') {
            $hook = new Zikula_ValidationHook('content.ui_hooks.pages.validate_delete', new Zikula_Hook_ValidationProviders());
            $validators = $this->notifyHooks($hook)->getValidators();
            if (!$validators->hasErrors()) {
                $ok = ModUtil::apiFunc('Content', 'Page', 'deletePage', array('pageId' => $this->pageId));
                if ($ok === false) {
                    return $this->view->registerError(null);
                }
                // notify any hooks they may now commit the as the original form has been committed.
                $this->notifyHooks(new Zikula_ProcessHook('content.ui_hooks.pages.process_delete', $this->pageId));
            }
            $url = ModUtil::url('Content', 'admin', 'main');
        } else if ($args['commandName'] == 'cancel') {
        }

        ModUtil::apiFunc('PageLock', 'user', 'releaseLock', array('lockName' => "contentPage{$this->pageId}"));

        if ($url == null) {
            $url = $this->backref;
        }
        if ($url == null) {
            $url = ModUtil::url('Content', 'admin', 'main');
        }
        return $this->view->redirect($url);
    }
}
