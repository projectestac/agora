<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_Controller_Ajax extends Zikula_Controller_AbstractAjax
{
    /**
     * dragContent
     * This function stores the moving of content items in the edit page mode
     *
     * @param id int  id of page to toggle
     * @param active  string "true"/"false"
     * @return mixed true or Ajax error
     */
    public function dragContent($args)
    {
        $this->checkAjaxToken();
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $ok = ModUtil::apiFunc('Content', 'Content', 'dragContent',
                        array('pageId' => $this->request->getPost()->get('pid', null),
                            'contentId' => $this->request->getPost()->get('cid', null),
                            'contentAreaIndex' => $this->request->getPost()->get('cai', null),
                            'position' => $this->request->getPost()->get('pos', null)));
        if (!$ok) {
            return new Zikula_Response_Ajax(array('ok' => false, 'message' => LogUtil::getErrorMessagesText()));
        }
        return new Zikula_Response_Ajax(array('ok' => true, 'message' => $this->__('Ok')));
    }

    /**
     * togglePageState
     * This function toggles active/inactive
     *
     * @author Erik Spaan & Sven Strickroth
     * @param id int  id of page to toggle
     * @param active  string "true"/"false"
     * @return mixed true or Ajax error
     */
    public function togglePageState($args)
    {
        $this->checkAjaxToken();
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $id = (int)$this->request->getPost()->get('id', -1);
        $active = $this->request->getPost()->get('active', null);
        if ($id == -1) {
            AjaxUtil::error(LogUtil::registerError($this->__('Error! No page ID passed.')));
        }

        $ok = ModUtil::apiFunc('Content', 'Page', 'updateState', array('pageId' => $id, 'active' => $active));
        if (!$ok) {
            AjaxUtil::error(LogUtil::registerError($this->__('Error! Could not update page state.')));
        }
        return new Zikula_Response_Ajax(array('id' => $id));
    }

    /**
     * togglePageInMenu
     * This function toggles inmenu/outmenu
     *
     * @author Erik Spaan & Sven Strickroth
     * @param id int  id of page to toggle
     * @param inmenu  string "true"/"false"
     * @return mixed true or Ajax error
     */
    public function togglePageInMenu($args)
    {
        $this->checkAjaxToken();
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $id = (int)$this->request->getPost()->get('id', -1);
        $inMenu = $this->request->getPost()->get('inMenu', null);
        if ($id == -1) {
            AjaxUtil::error(LogUtil::registerError($this->__('Error! No page ID passed.')));
        }

        $ok = ModUtil::apiFunc('Content', 'Page', 'updateState', array('pageId' => $id, 'inMenu' => $inMenu));
        if (!$ok) {
            AjaxUtil::error(LogUtil::registerError($this->__('Error! Could not update page in menu state.')));
        }
        return new Zikula_Response_Ajax(array('id' => $id));
    }

	/**
     * toggleContentState
     * This function toggles active/inactive for content items
     *
     * @param id int  id of content item to toggle
     * @param active  string "true"/"false"
     * @return mixed true or Ajax error
     */
    public function toggleContentState($args)
    {
        $this->checkAjaxToken();
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $id = (int)$this->request->getPost()->get('id', -1);
        $active = $this->request->getPost()->get('active', null);
        if ($id == -1) {
            AjaxUtil::error(LogUtil::registerError($this->__('Error! No content ID passed.')));
        }

        $ok = ModUtil::apiFunc('Content', 'Content', 'updateState', array('contentId' => $id, 'active' => $active));
        if (!$ok) {
            AjaxUtil::error(LogUtil::registerError($this->__('Error! Could not update content item state.')));
        }
        return new Zikula_Response_Ajax(array('id' => $id));
    }

}