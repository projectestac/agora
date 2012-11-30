<?php

class Content_Form_Plugin_FormFrame extends Zikula_Form_AbstractPlugin
{
    var $useTabs;
    var $cssClass = 'tabs';

    public function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }

    public function create(Zikula_Form_View $view, &$params)
    {
        $this->useTabs = (array_key_exists('useTabs', $params) ? $params['useTabs'] : false);
    }

    public function renderBegin(Zikula_Form_View $view)
    {
        $tabClass = $this->useTabs ? ' '.$this->cssClass : '';
        return "<div class=\"content-form{$tabClass}\">\n";
    }

    public function renderEnd(Zikula_Form_View $view)
    {
        return "</div>\n";
    }
}
