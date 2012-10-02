<?php
/**
 * Content 3 column layout plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: column3header.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

class content_layouttypesapi_column3headerPlugin extends contentLayoutBase
{
    var $contentAreaTitles = array();

    function __construct()
    {
        $dom = ZLanguage::getModuleDomain('content');
        $this->contentAreaTitles = array(__('Header', $dom), __('Left column', $dom), __('Centre column', $dom), __('Right column', $dom), __('Footer', $dom));
    }

    function content_layouttypesapi_column3headerPlugin()
    {
        $this->__construct();
    }

    function getName()
    {
        return 'column3header';
    }

    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('3 columns', $dom);
    }

    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Three columns + header + footer', $dom);
    }

    function getNumberOfContentAreas()
    {
        return 5;
    }

    function getContentAreaTitle($areaIndex)
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Centre column', $dom);
    }
}

function content_layouttypesapi_column3header($args)
{
    return new content_layouttypesapi_column3headerPlugin();
}
