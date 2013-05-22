<?php

class Content_Form_Plugin_WidthSelector extends Zikula_Form_Plugin_DropdownList
{
    public function getFilename()
    {
        return __FILE__;
    }

    function load(Zikula_Form_View $view, &$params)
    {
        $this->addItem('auto', 'wauto');
        $this->addItem('1/1', 'w100');
        $this->addItem('3/4', 'w75');
        $this->addItem('2/3', 'w66');
        $this->addItem('1/2', 'w50');
        $this->addItem('1/3', 'w33');
        $this->addItem('1/4', 'w25');
        parent::load($view, $params);
    }
}
