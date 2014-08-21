<?php
/**
 * Content 2 column layout plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

class Content_LayoutType_Column2d7030 extends Content_AbstractLayoutType
{
    protected $contentAreaTitles = array();

    function __construct(Zikula_View $view)
    {
        parent::__construct($view);
        $this->contentAreaTitles = array(
            $this->__('Header'),
            $this->__('Left column'),
            $this->__('Right column'),
            $this->__('Footer'));
    }
    function getTitle()
    {
        return $this->__('2 columns (70|30)');
    }
    function getDescription()
    {
        return $this->__('Header + two columns (70|30) + footer');
    }
    function getNumberOfContentAreas()
    {
        return 4;
    }
    function getContentAreaTitle($areaIndex)
    {
        return $this->contentAreaTitles[$areaIndex];
    }
	function getImage()
    {
    	return System::getBaseUrl().'/modules/Content/images/layouttype/column2_7030_header.png';
    }
}