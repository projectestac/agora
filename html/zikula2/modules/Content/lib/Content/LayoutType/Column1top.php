<?php
/**
 * Content 1 column layout with top header plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

class Content_LayoutType_Column1top extends Content_AbstractLayoutType
{
    protected $contentAreaTitles = array();
    
    public $titleInTemplate = true;

    function __construct(Zikula_View $view)
    {
        parent::__construct($view);
        $this->contentAreaTitles = array(
            $this->__('Header'),
            $this->__('Header above page title'),
            $this->__('Centre column'));
    }
    function getTitle()
    {
        return $this->__('1 column, header above page title');
    }
    function getDescription()
    {
        return $this->__('Single 100% wide column and a top-header above the page title headline (for e.g. breadcrumbs or author-information above the title)');
    }
    function getNumberOfContentAreas()
    {
        return 3;
    }
    function getContentAreaTitle($areaIndex)
    {
        return $this->contentAreaTitles[$areaIndex];
    }
	function getImage()
    {
    	return System::getBaseUrl().'/modules/Content/images/layouttype/column1topheader.png';
    }
}
