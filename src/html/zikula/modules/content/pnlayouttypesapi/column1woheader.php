<?php
/**
 * Content 1 column layout plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: column1woheader.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

class content_layouttypesapi_column1woheaderPlugin extends contentLayoutBase
{
    var $contentAreaTitles = array();

    function __construct()
    {
        $dom = ZLanguage::getModuleDomain('content');
        $contentAreaTitles = array(__('Centre column', $dom), __('Footer', $dom));
    }

    function content_layouttypesapi_column1woheaderPlugin()
    {
        $this->__construct();
    }

    function getName()
    {
        return 'column1woheader';
    }

    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('1 column w/o header', $dom);
    }

    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Single 100% wide column without header', $dom);
    }

    function getNumberOfContentAreas()
    {
        return 1;
    }

    function getContentAreaTitle($areaIndex)
    {
        return $this->contentAreaTitles[$areaIndex];
    }
}

function content_layouttypesapi_column1woheader($args)
{
    return new content_layouttypesapi_column1woheaderPlugin();
}
