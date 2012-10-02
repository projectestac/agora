<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnuser.php 371 2010-01-05 16:15:52Z herr.vorragend $
 * @license See license.txt
 */

Loader::requireOnce('modules/content/common.php');

/**
 * Show sitemap
 *
 * @return pnrender
 */
function content_user_main($args)
{
    return content_user_sitemap($args);
}

/**
 * View list of categories
 *
 * @return pnrender
 */
function content_user_categories($args)
{
    if (!contentHasPageViewAccess())
        return LogUtil::registerPermissionError();

    $render = & pnRender::getInstance('content');

    Loader::loadClass('CategoryUtil');
    Loader::loadClass('CategoryRegistryUtil');
    $mainCategoryId = CategoryRegistryUtil::getRegisteredModuleCategory('Content', 'page', 'primary', 30); // 30 == /__SYSTEM__/Modules/Global
    $categories = CategoryUtil::getCategoriesByParentID($mainCategoryId);
    $rootCategory = CategoryUtil::getCategoryByID($mainCategoryId);

    $render->assign('rootCategory', $rootCategory);
    $render->assign('categories', $categories);
    $render->assign('lang', ZLanguage::getLanguageCode());
    //$render->assign(pnModGetVar('Pages'));
    $render->assign('shorturls', pnConfigGetVar('shorturls'));
    $render->assign('shorturlstype', pnConfigGetVar('shorturlstype'));

    return $render->fetch('content_user_main.htm');
}

/**
 * view a page
 *
 * @param int 		pid		  Page ID
 * @param string 	name	  URL name, alternative for pid
 * @param bool 		preview   Display preview
 * @param bool 		editmode  Activate editmode
 * @return pnRender output
 */
function content_user_view($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $editmode = SessionUtil::getVar('ContentEditMode', null);

    $pageId = isset($args['pid']) ? $args['pid'] : FormUtil::getPassedValue('pid');
    $versionId = isset($args['vid']) ? $args['vid'] : FormUtil::getPassedValue('vid');
    $urlname = isset($args['name']) ? $args['name'] : FormUtil::getPassedValue('name');
    $preview = isset($args['preview']) ? $args['preview'] : FormUtil::getPassedValue('preview');
    $editmode = isset($args['editmode']) ? $args['editmode'] : FormUtil::getPassedValue('editmode');

    if ($editmode !== null)
        SessionUtil::setVar('ContentEditMode', $editmode);

    $versionHtml = '';
    $hasEditAccess = contentHasPageEditAccess($pageId);

    if ($versionId !== null && $hasEditAccess) {
        $preview = true;
        $version = pnModAPIFunc('content', 'history', 'getPageVersion', array('id' => $versionId, 'preview' => $preview, 'includeContent' => true));
        $versionData = & $version['data'];
        $page = & $versionData['page'];
        $pageId = $page['id'];

        //var_dump($version);
        $translatable = array('revisionNo' => $version['revisionNo'], 'date' => $version['date'], 'action' => constant($version['action']), 'userName' => $version['userName'], 'ipno' => $version['ipno']);
        $iconSrc = 'images/icons/extrasmall/clock.gif';
        $versionHtml = "<p class=\"content-versionpreview\"><img alt=\"\" src=\"$iconSrc\"/> " . __f('Version #%1$s - %2$s - %3$s by %4$s from %5$s', $translatable, $dom) . "</p>";
    } else if ($pageId === null && !empty($urlname)) {
        $pageId = pnModAPIFunc('content', 'page', 'solveURLPath', compact('urlname'));
        pnQueryStringSetVar('pid', $pageId);
    }

    if (!contentHasPageViewAccess($pageId))
        return LogUtil::registerPermissionError();

    if ($pageId !== null && $versionId === null) {
        $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $pageId, 'preview' => $preview, 'includeContent' => true));
    } else if ($versionId === null)
        return LogUtil::registerArgsError();

    if ($page === false)
        return false;

    $multilingual = pnModGetVar(PN_CONFIG_MODULE, 'multilingual');
    if ($page['language'] == ZLanguage::getLanguageCode())
        $multilingual = false;

    $pageTitle = html_entity_decode($page['title']);
    PageUtil::setVar('title', ($preview ? __("Preview", $dom) . ' - ' . $pageTitle : $pageTitle));

    //$layoutTemplate = 'layout/' . $page['layoutData']['name'] . '.html';
    $render = & pnRender::getInstance('content');
    $render->assign('page', $page);
    $render->assign('preview', $preview);
    $render->assign('editmode', $editmode);
    $render->assign('multilingual', $multilingual);

    contentAddAccess($render, $pageId);

    return $versionHtml . $render->fetch('content_user_page.html');
}

/**
 * View simple list of pages
 *
 * @return pnrender
 */
function content_user_list($args)
{
    return contentCommonList($args, 'content_user_list.html', false);
}

/**
 * View extended list of pages (showing page headers only)
 *
 * @return pnrender
 */
function content_user_extlist($args)
{
    return contentCommonList($args, 'content_user_extlist.html', true);
}

/**
 * View complete list of pages (showing complete pages)
 *
 * @return pnrender
 */
function content_user_pagelist($args)
{
    return contentCommonList($args, 'content_user_pagelist.html', true);
}

/**
 * List pages (optionally in a category) with different templates
 *
 * @param int cat 			Category
 * @param int page			Page index
 * @param string orderby	Field to order by
 * @return pnRender output
 */
function contentCommonList($args, $template, $includeContent)
{
    if (!contentHasPageViewAccess())
        return LogUtil::registerPermissionError();

    $category = isset($args['cat']) ? $args['cat'] : (string) FormUtil::getPassedValue('cat');
    $pageIndex = isset($args['page']) ? $args['page'] : (int) FormUtil::getPassedValue('page');
    $orderBy = isset($args['orderby']) ? $args['orderby'] : (string) FormUtil::getPassedValue('orderby');
    $orderDir = isset($args['orderdir']) ? $args['orderdir'] : (string) FormUtil::getPassedValue('orderdir');
    $pageSize = isset($args['pagesize']) ? $args['pagesize'] : (string) FormUtil::getPassedValue('pagesize');

    if ($pageIndex < 1)
        $pageIndex = 1;
    --$pageIndex; // API is zero-based


    $pages = pnModAPIFunc('content', 'page', 'getPages', array('filter' => array('category' => $category), 'pageIndex' => $pageIndex, 'pageSize' => $pageSize, 'orderBy' => $orderBy, 'orderDir' => $orderDir, 'includeContent' => $includeContent));
    if ($pages === false)
        return false;

    $pageCount = pnModAPIFunc('content', 'page', 'getPageCount', array('category' => $category));
    if ($pageCount === false)
        return false;

    $render = & pnRender::getInstance('content');
    $render->assign('pages', $pages);
    $render->assign('pageIndex', $pageIndex);
    $render->assign('pageSize', $pageSize);
    $render->assign('pageCount', $pageCount);
    $render->assign('preview', false);
    contentAddAccess($render, null);
    return $render->fetch($template);
}

/**
 * List subpages
 *
 * @author Philipp Niethammer <webmaster@nochwer.de>
 *
 * @param int 		pid		Page ID
 * @param string 	name	URL name, alternative for pid
 * @return pnRender
 */
function content_user_subpages($args)
{
    $pageId = isset($args['pid']) ? $args['pid'] : FormUtil::getPassedValue('pid');
    $urlname = isset($args['name']) ? $args['name'] : FormUtil::getPassedValue('name');

    if ($pageId === null && !empty($urlname)) {
        $pageId = pnModAPIFunc('content', 'page', 'solveURLPath', compact('urlname'));
    }

    if ($pageId === null)
        return LogUtil::registerError(__('Error! Unknown page.', $dom), 404);

    if (!contentHasPageViewAccess($pageId))
        return LogUtil::registerPermissionError();

    $topPage = pnModAPIFunc('content', 'page', 'getPages', array('filter' => array('superParentId' => $pageId), 'orderBy' => 'setLeft', 'makeTree' => true));
    if ($topPage === false)
        return false;

    $render = & pnRender::getInstance('content');
    $render->assign(reset($topPage));
    return $render->fetch('content_user_subpages.html');
}

/**
 * View sitemap
 *
 * @return pnrender
 */
function content_user_sitemap($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    if (!contentHasPageViewAccess())
        return LogUtil::registerPermissionError();

    $pages = pnModAPIFunc('content', 'page', 'getPages', array('orderBy' => 'setLeft', 'makeTree' => true));
    if ($pages === false)
        return false;

    PageUtil::setVar('title', __('Sitemap', $dom));

    $render = & pnRender::getInstance('content');
    $render->assign('pages', $pages);

    $tpl = FormUtil::getPassedValue('tpl', '', 'GET');
        if ($tpl == 'xml') {
          $render->display('content_user_sitemap.xml');
          return true;
        }

    return $render->fetch('content_user_sitemap.html');
}
