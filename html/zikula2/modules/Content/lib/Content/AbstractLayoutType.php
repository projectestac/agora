<?php

abstract class Content_AbstractLayoutType extends Content_AbstractType
{
    /**
     * Is the title displayed in the template?
     * @var boolean
     */
    public $titleInTemplate = false;

    public function getNumberOfContentAreas()
    {
        return 0;
    }

    public function getContentAreaTitle($areaIndex)
    {
        return $areaIndex;
    }

    public function getImage()
    {
        return System::getBaseUrl() . '/modules/Content/images/layout_nopreview.png';
    }

    /**
     * return the default template name as a string
     * @return string
     */
    public function getTemplate()
    {
        return 'layouttype/' . strtolower($this->getName()) . ".tpl";
    }

    /**
     * return the default edit template name as a string
     * @return string
     */
    public function getEditTemplate()
    {
        return 'layouttype/' . strtolower($this->getName()) . "_edit.tpl";
    }

}