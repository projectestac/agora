<?php
/**
 * Content 2-1-2-1-2 + header + extra right column layout plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

class Content_LayoutType_Column21212rightcol extends Content_AbstractLayoutType
{
    protected $contentAreaTitles = array();

    function __construct(Zikula_View $view)
    {
        parent::__construct($view);
        $this->contentAreaTitles = array(
            $this->__('Header'), 
			$this->__('Left column1'), 
            $this->__('Right column1'), 
            $this->__('Center1'),
            $this->__('Left column2'),
            $this->__('Right column2'),
            $this->__('Center2'),
            $this->__('Left column3'),
            $this->__('Right column3'),
            $this->__('Footer'),
            $this->__('Right Extra Column Top'),
            $this->__('Right Extra Column Bottom')
        );
    }
    function getTitle()
    {
        return $this->__('2-1-2-1-2 columns (50|50) + extra right column');
    }
    function getDescription()
    {
        return $this->__('Header + two-one-two-one-two columns (50|50) + footer + extra right column');
    }
    function getNumberOfContentAreas()
    {
        return 12;
    }
    function getContentAreaTitle($areaIndex)
    {
        return $this->contentAreaTitles[$areaIndex];
    }
}
