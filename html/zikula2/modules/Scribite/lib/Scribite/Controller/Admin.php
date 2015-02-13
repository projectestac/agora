<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */
class Scribite_Controller_Admin extends Zikula_AbstractController
{

    public function postInitialize()
    {
        PageUtil::AddVar('javascript', 'prototype');
        $this->view->setCaching(false);
    }

    // main function
    public function main()
    {
        $this->redirect(ModUtil::url('Scribite', 'admin', 'modifyconfig'));
    }

    // modify Scribite configuration
    public function modifyconfig()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());
        // Create form
        $form = FormUtil::newForm('Scribite', $this);
        return $form->execute('admin/modifyconfig.tpl', new Scribite_FormHandler_ModifyConfig());
    }

    /**
     * Create/modify/delete module or textarea overrides
     * template uses ajax to create/modify/delete rows
     * 
     * @return string (html) 
     */
    public function modifyoverrides()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());
        // get hookable modules (subscribers)
        $hookSubscribers = HookUtil::getHookSubscribers();
        $modulelist = array();
        foreach ($hookSubscribers as $module) {
            $modulelist[$module['name']] = $module['displayname'];
        }
        $this->view->assign('moduleList', $modulelist);
        
        // provide default values if none exists
        $overrides = ModUtil::getVar('Scribite', 'overrides');
        if (empty($overrides)) {
            ModUtil::setVar('Scribite', 'overrides', array());
        }

        // get all editors
        $editorList = ModUtil::apiFunc('Scribite', 'admin', 'getEditors');
        $this->view->assign('editorList', $editorList);
        
        return $this->view->fetch('admin/modifyoverrides.tpl');
    }

    // display editors
    public function editors()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // check for all supported editors and generate links
        $editors = ModUtil::apiFunc('Scribite', 'admin', 'getEditors', array('editorname' => "list"));
        $this->view->assign('editors', $editors);
        $this->view->assign('defaulteditor', ModUtil::getVar('Scribite', 'DefaultEditor'));

        return $this->view->fetch('admin/editors.tpl');
    }

}
