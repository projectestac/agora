<?php

class Content_Form_Plugin_ModuleSelector extends Zikula_Form_Plugin_DropdownList
{
    public function getFilename()
    {
        return __FILE__;
    }

    function load(Zikula_Form_View $view, &$params)
    {
        if (!$view->isPostBack()) {
            // Find the active modules
            $moduleList = ModUtil::apiFunc('Modules', 'Admin', 'listmodules', array('state' => ModUtil::STATE_ACTIVE));
            $modules = array();
            // Only list modules that have a User view
            foreach ($moduleList as $module) {
                if (isset($module['capabilities']['user'])) {
                    $modules[] = array('text' => $module['displayname'], 'value' => $module['name']);
                }
            }
            $empty = array(array('text' => '', 'value' => ''));
            $modules = array_merge($empty, $modules);
            $this->setItems($modules);
        }
        parent::load($view, $params);
    }
}
