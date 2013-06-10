<?php
class Content_Form_Handler_Admin_HistoryContent extends Zikula_Form_AbstractHandler
{
    var $pageId;
    var $backref;

    public function __construct($args)
    {
        $this->args = $args;
    }

    public function initialize(Zikula_Form_View $view)
    {
        $this->pageId = FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : null);
        $offset = (int)FormUtil::getPassedValue('offset');

        if (!SecurityUtil::checkPermission('Content:page:', $this->pageId . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }
        $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
            'id' => $this->pageId, 
            'editing' => false, 
            'filter' => array('checkActive' => false), 
            'enableEscape' => true, 
            'translate' => false, 
            'includeContent' => false, 
            'includeCategories' => false));
        if ($page === false) {
            return $this->view->registerError(null);
        }

        $versionscnt = ModUtil::apiFunc('Content', 'History', 'getPageVersionsCount', array('pageId' => $this->pageId));
        $versions = ModUtil::apiFunc('Content', 'History', 'getPageVersions', array(
            'pageId' => $this->pageId, 
            'offset' => $offset));
        if ($versions === false) {
            return $this->view->registerError(null);
        }

        $this->view->assign('page', $page);
        $this->view->assign('versions', $versions);
        Content_Util::contentAddAccess($this->view, $this->pageId);
        // Assign the values for the smarty plugin to produce a pager
        $this->view->assign('numitems', $versionscnt);

        PageUtil::setVar('title', $this->__("Page history") . ' : ' . $page['title']);

        if (!$this->view->isPostBack() && FormUtil::getPassedValue('back', 0)) {
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        }

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = null;

        if ($args['commandName'] == 'restore') {
            $ok = ModUtil::apiFunc('Content', 'History', 'restoreVersion', array('id' => $args['commandArgument']));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
        }

        if ($url == null) {
            $url = $this->backref;
        }
        if (empty($url)) {
            $url = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
        }

        return $this->view->redirect($url);
    }
}
