<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_Controller_User extends Zikula_AbstractController
{

    /**
     * Show sitemap
     *
     * @return Renderer
     */
    public function main($args)
    {
		$this->redirect(ModUtil::url('Content', 'user', 'sitemap', $args));
    }

    /**
     * View list of categories
     *
     * @return Renderer
     */
    public function categories($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:page:', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        $mainCategoryId = CategoryRegistryUtil::getRegisteredModuleCategory('Content', 'page', 'primary', 30); // 30 == /__SYSTEM__/Modules/Global
        $categories = CategoryUtil::getCategoriesByParentID($mainCategoryId);
        $rootCategory = CategoryUtil::getCategoryByID($mainCategoryId);

        $this->view->assign('rootCategory', $rootCategory);
        $this->view->assign('categories', $categories);
        $this->view->assign('lang', ZLanguage::getLanguageCode());

        return $this->view->fetch('user/main.tpl');
    }

    /**
     * view a page
     *
     * @param int       pid       Page ID
     * @param string    name      URL name, alternative for pid
     * @param bool      preview   Display preview
     * @param bool      editmode  Activate editmode
     * @return Renderer output
     */
    public function view($args)
    {
        $pageId = isset($args['pid']) ? $args['pid'] : FormUtil::getPassedValue('pid');
        $versionId = isset($args['vid']) ? $args['vid'] : FormUtil::getPassedValue('vid');
        $urlname = isset($args['name']) ? $args['name'] : FormUtil::getPassedValue('name');
        $preview = isset($args['preview']) ? $args['preview'] : FormUtil::getPassedValue('preview');
        $editmode = isset($args['editmode']) ? $args['editmode'] : FormUtil::getPassedValue('editmode', null, 'GET');

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:page:', $pageId . '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        if ($editmode !== null) {
            SessionUtil::setVar('ContentEditMode', $editmode);
        } else {
            $editmode = SessionUtil::getVar('ContentEditMode', null);
        }

        if ($editmode) {
            $this->view->setCaching(false);
        }
        $this->view->setCacheId("$pageId|$versionId");
        if ($this->view->is_cached('user/page.tpl')) {
            return $this->view->fetch('user/page.tpl');
        }

        $versionHtml = '';
        $hasEditAccess = SecurityUtil::checkPermission('Content:page:', $pageId . '::', ACCESS_EDIT);

        if ($versionId !== null && $hasEditAccess) {
            $preview = true;
            $version = ModUtil::apiFunc('Content', 'History', 'getPageVersion', array(
                'id' => $versionId,
                'preview' => $preview,
                'includeContent' => true));
            $versionData = & $version['data'];
            $page = & $versionData['page'];
            $pageId = $page['id'];
            $action = ModUtil::apiFunc('Content', 'History', 'contentHistoryActionTranslate', $version['action']);
            
            $translatable = array(
                'revisionNo' => $version['revisionNo'],
                'date' => $version['date'],
                'action' => $action,
                'userName' => $version['userName'],
                'ipno' => $version['ipno']);
            $iconSrc = 'images/icons/extrasmall/clock.png';
            $versionHtml = "<p class=\"content-versionpreview\"><img alt=\"\" src=\"$iconSrc\"/> " . $this->__f('Version #%1$s - %2$s - %3$s by %4$s from %5$s', $translatable) . "</p>";
        } else if ($pageId === null && !empty($urlname)) {
            $pageId = ModUtil::apiFunc('Content', 'Page', 'solveURLPath', compact('urlname'));
            System::queryStringSetVar('pid', $pageId);
        }

        if ($pageId !== null && $versionId === null) {
            $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
                'id' => $pageId,
                'preview' => $preview,
                'includeContent' => true,
                'filter' => array(
                    'checkActive' => !($preview && $hasEditAccess))));
        } else if ($versionId === null)
            return LogUtil::registerArgsError();

        if ($page === false) {
            return false;
        }
        $multilingual = ModUtil::getVar(ModUtil::CONFIG_MODULE, 'multilingual');
        if ($page['language'] == ZLanguage::getLanguageCode()) {
            $multilingual = false;
        }
        $pageTitle = html_entity_decode($page['title']);
        PageUtil::setVar('title', ($preview ? $this->__("Preview") . ' - ' . $pageTitle : $pageTitle));

        $this->view->assign('page', $page);
        $this->view->assign('preview', $preview);
        $this->view->assign('editmode', $editmode);
        $this->view->assign('multilingual', $multilingual);
        $this->view->assign('enableVersioning', $this->getVar('enableVersioning'));

        Content_Util::contentAddAccess($this->view, $pageId);

        // exclude writers from statistics
        if (!$hasEditAccess && !$preview && !$editmode && $this->getVar('countViews')) {
            // Check against session to see if user was already counted
            if (!SessionUtil::getVar("ContentRead" . $pageId)) {
                SessionUtil::setVar("ContentRead" . $pageId, $pageId);
                DBUtil::incrementObjectFieldByID('content_page', 'views', $pageId);
            }
        }

        return $versionHtml . $this->view->fetch('user/page.tpl');
    }

    /**
     * View simple list of pages
     *
     * @return Renderer
     */
    public function listpages($args)
    {
        return $this->contentCommonList($args, 'user/list.tpl', false);
    }

    /**
     * View extended list of pages (showing page headers only)
     *
     * @return Renderer
     */
    public function extlist($args)
    {
        return $this->contentCommonList($args, 'user/extlist.tpl', true);
    }

    /**
     * View complete list of pages (showing complete pages)
     *
     * @return Renderer
     */
    public function pagelist($args)
    {
        return $this->contentCommonList($args, 'user/pagelist.tpl', true);
    }

    /**
     * List pages (optionally in a category) with different templates
     *
     * @param int cat           Category
     * @param int page          Page index
     * @param string orderby    Field to order by
     * @return Renderer output
     */
    protected function contentCommonList($args, $template, $includeContent)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:page:', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        $category = isset($args['cat']) ? $args['cat'] : (string) FormUtil::getPassedValue('cat');
        $pageIndex = isset($args['page']) ? $args['page'] : (int) FormUtil::getPassedValue('page');
        $orderBy = isset($args['orderby']) ? $args['orderby'] : (string) FormUtil::getPassedValue('orderby');
        $orderDir = isset($args['orderdir']) ? $args['orderdir'] : (string) FormUtil::getPassedValue('orderdir');
        $pageSize = isset($args['pagesize']) ? $args['pagesize'] : (string) FormUtil::getPassedValue('pagesize');

        if ($pageIndex < 1) {
            $pageIndex = 1;
        }
        --$pageIndex; // API is zero-based

        $pages = ModUtil::apiFunc('Content', 'Page', 'getPages', array(
            'filter' => array('category' => $category),
            'pageIndex' => $pageIndex,
            'pageSize' => $pageSize,
            'orderBy' => $orderBy,
            'orderDir' => $orderDir,
            'includeContent' => $includeContent));
        if ($pages === false) {
            return false;
        }
        $pageCount = ModUtil::apiFunc('Content', 'Page', 'getPageCount', array('category' => $category));
        if ($pageCount === false) {
            return false;
        }

        $this->view->assign('pages', $pages);
        $this->view->assign('pageIndex', $pageIndex);
        $this->view->assign('pageSize', $pageSize);
        $this->view->assign('pageCount', $pageCount);
        $this->view->assign('preview', false);
        Content_Util::contentAddAccess($this->view, null);
        return $this->view->fetch($template);
    }

    /**
     * List subpages
     *
     * @author Philipp Niethammer <webmaster@nochwer.de>
     *
     * @param int       pid     Page ID
     * @param string    name    URL name, alternative for pid
     * @return Renderer
     */
    public function subpages($args)
    {
        $pageId = isset($args['pid']) ? $args['pid'] : FormUtil::getPassedValue('pid');
        $urlname = isset($args['name']) ? $args['name'] : FormUtil::getPassedValue('name');

        if ($pageId === null && !empty($urlname)) {
            $pageId = ModUtil::apiFunc('Content', 'Page', 'solveURLPath', compact('urlname'));
        }
        if ($pageId === null) {
            return LogUtil::registerError($this->__('Error! Unknown page.'), 404);
        }

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:page:', $pageId . '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        $topPage = ModUtil::apiFunc('Content', 'Page', 'getPages', array('filter' => array(
            'superParentId' => $pageId),
            'orderBy' => 'setLeft',
            'makeTree' => true));
        if ($topPage === false) {
            return false;
        }

        $this->view->assign(reset($topPage));
        return $this->view->fetch('user/subpages.tpl');
    }

    /**
     * View sitemap
     *
     * @return Renderer
     */
    public function sitemap($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:page:', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        $pages = ModUtil::apiFunc('Content', 'Page', 'getPages', array(
            'orderBy' => 'setLeft',
            'makeTree' => true,
            'filter' => array('checkInMenu' => true)));
        if ($pages === false)
            return false;

        PageUtil::setVar('title', $this->__('Sitemap'));

        $this->view->assign('pages', $pages);
        Content_Util::contentAddAccess($this->view, null);

        $tpl = FormUtil::getPassedValue('tpl', '', 'GET');
        if ($tpl == 'xml') {
            $this->view->display('user/sitemap.xml');
            return true;
        }

        return $this->view->fetch('user/sitemap.tpl');
    }

}