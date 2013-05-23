<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_Api_User extends Zikula_AbstractApi
{
    /**
     * get available module links
     *
     * @return array array of admin links
     */
    public function getlinks()
    {
        $links = array();

        if (SecurityUtil::checkPermission('Content:page:', '::', ACCESS_ADD)) {
            $links[] = array(
                'url'   => ModUtil::url('Content', 'admin', 'newPage'),
                'text'  => $this->__('Add new page'),
                'class' => 'z-icon-es-new'
            );
        }

        if (SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT)) {
            $links[] = array(
                'url'   => ModUtil::url('Content', 'admin', 'main'),
                'text'  => $this->__('Admin'),
                'class' => 'z-icon-es-config'
            );
        }

        if (SecurityUtil::checkPermission('Content::', '::', ACCESS_READ)) {
            $links[] = array(
                'url'   => ModUtil::url('Content', 'user', 'sitemap'),
                'text'  => $this->__('Page lists'),
                'class' => 'z-icon-es-view',
                'links' => array(
                    array(
                        'url'  => ModUtil::url('Content', 'user', 'sitemap'),
                        'text' => $this->__('Sitemap')
                    ),
                    array(
                        'url'  => ModUtil::url('Content', 'user', 'extlist'),
                        'text' => $this->__('Extended')
                    ),
                    array(
                        'url'  => ModUtil::url('Content', 'user', 'pagelist'),
                        'text' => $this->__('Complete')
                    ),
                    array(
                        'url'  => ModUtil::url('Content', 'user', 'categories'),
                        'text' => $this->__('Category list')
                    )
                )
            );
        }

        return $links;
    }

    /**
     * form custom url string
     *
     * @author Philipp Niethammer <webmaster@nochwer.de>
     * @return custom url string
     */
    public function encodeurl($args)
    {
        //check we have the required input
        if (!isset($args['modname']) || !isset($args['func']) || !isset($args['args'])) {
            return LogUtil::registerArgsError();
        }

        $supportedfunctions = array('list', 'view', 'subpages', 'sitemap', 'extlist', 'categories', 'pagelist');
        if (!in_array($args['func'], $supportedfunctions)) {
            return '';
        }

        if (isset($args['args']['preview']) || isset($args['args']['editmode'])) {
            return false;
        }

        if (isset($args['args']['cat']) && !empty($args['args']['cat'])) {
            $cat = CategoryUtil::getCategoryByID($args['args']['cat']);
            unset($args['args']['cat']);
            if (count($args['args'] > 0)) {
                return '';
            }
            return $args['modname'] . '/' . DataUtil::formatForURL($cat['name']);
        }

        if (isset($args['args']['pid']) && !empty($args['args']['pid']))
        {
            $url = ModUtil::apiFunc('Content', 'Page', 'getURLPath', array('pageId' => $args['args']['pid']));
            if (strtolower($args['func']) == 'view') {
                $suffix = $this->getVar('shorturlsuffix');
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
    public function decodeurl($args)
    {
        $suffix = $this->getVar('shorturlsuffix');

        $supportedfunctions = array('main', 'list', 'view', 'subpages', 'sitemap', 'extlist', 'categories', 'pagelist');
        $argsnum = count($args['vars']);
        if (!isset($args['vars'][2]) || empty($args['vars'][2])) {
            System::queryStringSetVar('func', 'sitemap');
            return true;
        }

        if (in_array($args['vars'][2], $supportedfunctions)) {
            return false;
        }
        $lastarg = end($args['vars']);

        $urlname = '';

        if (substr($lastarg, strlen($lastarg) - strlen($suffix)) == $suffix) {
            for ($i = 2; $i < $argsnum; $i++) {
                if (!empty($urlname)) {
                    $urlname .= '/';
                }
                $urlname .= $args['vars'][$i];
            }
            if (($suffixLen = strlen($suffix)) > 0) {
                $urlname = substr($urlname, 0, -$suffixLen);
            }
            System::queryStringSetVar('func', 'view');
            System::queryStringSetVar('name', $urlname);
            return true;
        }

        if (!isset($args['vars'][3]) || empty($args['vars'][3])) {
            $mainCategory = CategoryRegistryUtil::getRegisteredModuleCategory('Content', 'page', 'primary', 30); // 30 == /__SYSTEM__/Modules/Global
            $cats = CategoryUtil::getCategoriesByParentID($mainCategory);
            foreach ($cats as $cat) {
                if ($args['vars'][2] == $cat['name'] || $args['vars'][2] == DataUtil::formatForURL($cat['name'])) {
                    System::queryStringSetVar('func', 'list');
                    System::queryStringSetVar('cat', $cat['id']);
                    return true;
                }
            }
        }

        for ($i = 2; $i < $argsnum; $i++) {
            if (!empty($urlname)) {
                $urlname .= '/';
            }
            $urlname .= $args['vars'][$i];
        }

        System::queryStringSetVar('func', 'subpages');
        System::queryStringSetVar('name', $urlname);

        return true;
    }

    /**
     * get a specific item
     * @param $args['pid'] id of example item to get
     * @return mixed item array, or false on failure
     */
    public function get($args)
    {
        if ((!isset($args['pid']) || !is_numeric($args['pid']))) {
            return LogUtil::registerArgsError();
        }
        $pageId = $args['pid'];

        if (!isset($args['includeContent'])) {
            $args['includeContent'] = false;
        }
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:page:', $pageId . '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        return ModUtil::apiFunc('Content', 'Page', 'getPage', array('id' => $pageId, 'preview' => false, 'includeContent' => false));
    }

    /**
     * get meta data for the module
     */
    public function getmodulemeta()
    {
        return array(
            'displayfunc' => 'view',
            'titlefield'  => 'title',
            'itemid'      => 'pid'
        );
    }
}
