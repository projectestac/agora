<?php

class Content_Form_Handler_Admin_EditContent extends Zikula_Form_AbstractHandler
{
    protected $contentId;
    protected $pageId;
    protected $backref;
    protected $contentType;

    public function __construct($args)
    {
        $this->args = $args;
    }

    public function getContentId()
    {
        return $this->contentId;
    }

    public function setContentId($contentId)
    {
        $this->contentId = $contentId;
    }

    public function getPageId()
    {
        return $this->pageId;
    }

    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    public function getBackref()
    {
        return $this->backref;
    }

    public function setBackref($backref)
    {
        $this->backref = $backref;
    }

    public function initialize(Zikula_Form_View $view)
    {
        $this->contentId = (int) FormUtil::getPassedValue('cid', isset($this->args['cid']) ? $this->args['cid'] : -1);

        $content = ModUtil::apiFunc('Content', 'Content', 'getContent', array(
            'id' => $this->contentId,
            'translate' => false,
            'view' => $this->view));
        if ($content === false) {
            return $this->view->registerError(null);
        }
        $this->pageId = $content['pageId'];

        if (!SecurityUtil::checkPermission('Content:page:', $this->pageId . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        if (isset($content['plugin'])) {
            $this->contentType['plugin'] = $content['plugin'];
            $this->contentType['module'] = $content['plugin']->getModule();
            $this->contentType['name'] = $content['plugin']->getName();
            $this->contentType['title'] = $content['plugin']->getTitle();
            $this->contentType['description'] = $content['plugin']->getDescription();
            $this->contentType['adminInfo'] = $content['plugin']->getAdminInfo();
            $this->contentType['isActive'] = $content['plugin']->isActive();
        } else {
            $this->contentType['name'] = $this->__('Unknown');
            $this->contentType['title'] = $this->__('Unknown plugin - requires upgrade');
            $this->contentType['description'] = $this->__('Disabled plugin - requires upgrade');
            $this->contentType['adminInfo'] = $this->__('Disabled plugin - requires upgrade');
            $this->contentType['isActive'] = false;
        }

        if ($this->contentType === false) {
            return $this->view->registerError(null);
        }

        $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
            'id' => $this->pageId,
            'includeContent' => false,
            'filter' => array('checkActive' => false)));
        if ($page === false) {
            return $this->view->registerError(null);
        }

        $editTemplate = "file:" . getcwd() . "/modules/Content/templates/contenttype/blank.tpl";
        if (isset($content['plugin'])) {
            $this->contentType['plugin']->startEditing();
            $editTemplate = $this->contentType['plugin']->getEditTemplate();
        }

        $multilingual = ModUtil::getVar(ModUtil::CONFIG_MODULE, 'multilingual');
        if ($page['language'] == ZLanguage::getLanguageCode()) {
            $multilingual = false;
        }

        PageUtil::setVar('title', $this->__("Edit content item") . ' : ' . $page['title']);

        $this->view->assign('contentTypeTemplate', $editTemplate);

        $this->view->assign('page', $page);
        $this->view->assign('visiblefors', array(
            array('text' => $this->__('public (all)'),
                'value' => '1'),
            array('text' => $this->__('only logged in members'),
                'value' => '0'),
            array('text' => $this->__('only not logged in people'),
                'value' => '2')));
        $this->view->assign('content', $content);
        $this->view->assign('data', $content['data']);
        $this->view->assign('contentType', $this->contentType);
        $this->view->assign('multilingual', $multilingual);
        $this->view->assign('enableVersioning',  $this->getVar('enableVersioning'));
        Content_Util::contentAddAccess($this->view, $this->pageId);

        if (!$this->view->isPostBack() && FormUtil::getPassedValue('back', 0)) {
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        }
        if ($this->backref != null) {
            $returnUrl = $this->backref;
        } else {
            $returnUrl = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
        }
        ModUtil::apiFunc('PageLock', 'user', 'pageLock', array(
            'lockName' => "contentContent{$this->contentId}",
            'returnUrl' => $returnUrl));

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = null;

        if ($args['commandName'] == 'save' || $args['commandName'] == 'translate') {
            if (!$this->view->isValid()) {
                return false;
            }
            $contentData = $this->view->getValues();

            $message = null;
            if (!$this->contentType['plugin']->isValid($contentData['data'], $message)) {
                $errorPlugin = &$this->view->getPluginById('error');
                $errorPlugin->message = $message;
                return false;
            }

            $this->contentType['plugin']->loadData($contentData['data']);

            $ok = ModUtil::apiFunc('Content', 'Content', 'updateContent', array(
                'content' => $contentData + $contentData['content'],
                'searchableText' => $this->contentType['plugin']->getSearchableText(),
                'id' => $this->contentId));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
            if ($args['commandName'] == 'translate') {
                $url = ModUtil::url('Content', 'admin', 'translatecontent', array(
                    'cid' => $this->contentId,
                    'back' => 1));
            }
        } else if ($args['commandName'] == 'delete') {
            $ok = ModUtil::apiFunc('Content', 'Content', 'deleteContent', array('contentId' => $this->contentId));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
        } else if ($args['commandName'] == 'cancel') {
        }

        if ($url == null) {
            $url = $this->backref;
        }
        if (empty($url)) {
            $url = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
        }
        ModUtil::apiFunc('PageLock', 'user', 'releaseLock', array('lockName' => "contentContent{$this->contentId}"));

        return $this->view->redirect($url);
    }

}
