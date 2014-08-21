<?php

class Content_Form_Handler_Admin_NewContent extends Zikula_Form_AbstractHandler
{
    // Set these three for new content in empty area (or always first position)
    var $pageId; // ID of page to insert content on
    var $contentAreaIndex; // Index of the content are where new content is to be inserted
    var $position; // Position of new content inside above area (insert at this position)

    // Set these two for content relatively positioned to exiting content
    var $contentId; // ID of content we are creating new item relative to
    var $above; // Position relative to $contentid (above=0 => below)

    public function __construct($args)
    {
        $this->args = $args;
    }

    public function initialize(Zikula_Form_View $view)
    {
        $this->pageId = FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : null);
        $this->contentAreaIndex = FormUtil::getPassedValue('cai', isset($this->args['cai']) ? $this->args['cai'] : null);
        $this->position = FormUtil::getPassedValue('pos', isset($this->args['pos']) ? $this->args['pos'] : 0);
        $this->contentId = FormUtil::getPassedValue('cid', isset($this->args['cid']) ? $this->args['cid'] : null);
        $this->above = FormUtil::getPassedValue('above', isset($this->args['above']) ? $this->args['above'] : 0);

        if ($this->contentId != null) {
            $content = ModUtil::apiFunc('Content', 'Content', 'getContent', array('id' => $this->contentId));
            if ($content === false) {
                return $this->view->registerError(null);
            }
            $this->pageId = $content['pageId'];
            $this->contentAreaIndex = $content['areaIndex'];
            $this->position = ($this->above ? $content['position'] : $content['position'] + 1);
        }

        if (!SecurityUtil::checkPermission('Content:page:', $this->pageId . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }
        if ($this->pageId == null) {
            return $this->view->setErrorMsg($this->__("Missing page ID (pid) in URL"));
        }

        if ($this->contentAreaIndex == null) {
            return $this->view->setErrorMsg($this->__("Missing content area index (cai) in URL"));
        }

        $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array('id' => $this->pageId, 'filter' => array('checkActive' => false)));
        if ($page === false) {
            return $this->view->registerError(null);
        }

        PageUtil::setVar('title', $this->__("Add new content to page") . ' : ' . $page['title']);

        $this->view->assign('page', $page);
        $this->view->assign('htmlBody', 'admin/newcontent.tpl');
        Content_Util::contentAddAccess($this->view, $this->pageId);

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        if ($args['commandName'] == 'create') {
            if (!$this->view->isValid()) {
                return false;
            }

            $contentData = $this->view->getValues();
            list ($module, $type) = explode(':', $contentData['contentType']);
            $contentData['module'] = $module;
            $contentData['type'] = $type;
            unset($contentData['contentType']);
            $contentData['language'] = null;
            
            /**
             * It should be noted here that the content item is created with default data
             * immediately and then sent to the editcontent function for processing.
             * If the user the clicks 'cancel' the contentitem is left in existence and
             * not deleted which seems counter-intuitive.
             */
            $id = ModUtil::apiFunc('Content', 'Content', 'newContent', array('content' => $contentData, 'pageId' => $this->pageId, 'contentAreaIndex' => $this->contentAreaIndex, 'position' => $this->position));
            if ($id === false) {
                return $this->view->registerError(null);
            }

            $url = ModUtil::url('Content', 'admin', 'editcontent', array('cid' => $id));
        } else if ($args['commandName'] == 'cancel') {
            $id = null;
            $url = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
        }

        return $this->view->redirect($url);
    }
}
