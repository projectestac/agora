<?php
/**
 * Content 2-1-2 column layout plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

class Content_LayoutType_Column212 extends Content_AbstractLayoutType
{
    protected $contentAreaTitles = array();

    function __construct(Zikula_View $view)
    {
        parent::__construct($view);
        $this->contentAreaTitles = array(
            $this->__('Header'),
            $this->__('Left column1'),
            $this->__('Right column1'),
            $this->__('Center'),
            $this->__('Left column2'),
            $this->__('Right column2'),
            $this->__('Footer')
		);
    }
    function getTitle()
    {
        return $this->__('2-1-2 columns (50|50)');
    }
    function getDescription()
    {
        return $this->__('Header + two-one-two columns (50|50) + footer');
    }
    function getNumberOfContentAreas()
    {
        return 7;
    }
    function getContentAreaTitle($areaIndex)
    {
        return $this->contentAreaTitles[$areaIndex];
    }
	function getImage()
    {
    	return System::getBaseUrl().'/modules/Content/images/layouttype/column2_1_2header.png';
    }
}