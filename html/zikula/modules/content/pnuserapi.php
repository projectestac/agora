<?php
/**
* Content
*
* @copyright (C) 2007-2010, Content Development Team
* @link http://code.zikula.org/content
* @version $Id: pnuserapi.php 364 2010-01-05 09:50:35Z herr.vorragend $
* @license See license.txt
*/

/**
* form custom url string
*
* @author Philipp Niethammer <webmaster@nochwer.de>
* @return custom url string
*/
function content_userapi_encodeurl($args) {

    //check we have the required input
    if (!isset($args['modname']) || !isset($args['func']) || !isset($args['args'])) {
        return LogUtil::registerArgsError();
    }

    $supportedfunctions = array('list', 'view', 'subpages');
    if (!in_array($args['func'], $supportedfunctions)) {
        return '';
    }

    if (isset($args['args']['preview']) || isset($args['args']['editmode']))
    return false;

    if (isset($args['args']['cat']) && !empty($args['args']['cat'])) {
        Loader::loadClass('CategoryUtil');
        $cat = CategoryUtil::getCategoryByID($args['args']['cat']);
        unset ($args['args']['cat']);
        if (count($args['args'] > 0))
        return '';
        return $args['modname'] . '/' . DataUtil::formatForURL($cat['name']);
    }

    if (isset($args['args']['pid']) && !empty($args['args']['pid']))
    {
        $url = pnModAPIFunc('content', 'page', 'getURLPath', array('pageId' => $args['args']['pid']));
        if (strtolower($args['func']) == 'view') {
            $suffix = pnModGetVar('content', 'shorturlsuffix');
            $url .= $suffix;
        }

        return $args['modname'] . '/' . $url;
    }

    return '';
}

/**
* decode custom url string
*
* @author Philipp Niethammer
* @return bool true if succeded false otherwise
*/
function content_userapi_decodeurl($args) {
    $suffix = pnModGetVar('content', 'shorturlsuffix');

    $supportedfunctions = array('list', 'view', 'subpages', 'sitemap', 'extlist', 'categories', 'pagelist');
    $argsnum = count($args['vars']);
    if (!isset($args['vars'][2]) || empty($args['vars'][2])) {
        pnQueryStringSetVar('func', 'main');
        return true;
    }

    if (in_array($args['vars'][2], $supportedfunctions))
    return false;

    $lastarg = end($args['vars']);

    $urlname = '';

    if (substr($lastarg, strlen($lastarg)-strlen($suffix)) == $suffix) {
        for ($i=2; $i<$argsnum; $i++) {
            if (!empty($urlname))
            $urlname .= '/';
            $urlname .= $args['vars'][$i];
        }
        if (($suffixLen = strlen($suffix)) > 0)
            $urlname = substr($urlname, 0, -$suffixLen);

        pnQueryStringSetVar('func', 'view');
        pnQueryStringSetVar('name', $urlname);
        return true;
    }

    if (!isset($args['vars'][3]) || empty($args['vars'][3])) {
        Loader::loadClass('CategoryRegistryUtil');
        Loader::loadClass('CategoryUtil');
        $mainCategory = CategoryRegistryUtil::getRegisteredModuleCategory ('Content', 'page', 'primary', 30); // 30 == /__SYSTEM__/Modules/Global
        $cats = CategoryUtil::getCategoriesByParentID($mainCategory);
        foreach ($cats as $cat) {
            if ($args['vars'][2] == $cat['name'] || $args['vars'][2] == DataUtil::formatForURL($cat['name'])) {
                pnQueryStringSetVar('func', 'list');
                pnQueryStringSetVar('cat', $cat['id']);
                return true;
            }
        }
    }

    for ($i=2; $i<$argsnum; $i++) {
        if (!empty($urlname))
        $urlname .= '/';
        $urlname .= $args['vars'][$i];
    }

    pnQueryStringSetVar('func', 'subpages');
    pnQueryStringSetVar('name', $urlname);

    return true;
}