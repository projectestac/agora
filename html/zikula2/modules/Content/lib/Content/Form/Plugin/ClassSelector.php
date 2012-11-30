<?php

class Content_Form_Plugin_ClassSelector extends Zikula_Form_Plugin_DropdownList
{
    public function getFilename()
    {
        return __FILE__;
    }

    function load(Zikula_Form_View $view, &$params)
    {
        if (!$view->isPostBack()) {
            $classes = ModUtil::apiFunc('Content', 'Admin', 'getStyleClasses');
            $empty = array(array('text' => '', 'value' => ''));
            $classes = array_merge($empty, $classes);
            $this->setItems($classes);
        }
        parent::load($view, $params);
    }
}
