<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_Util
{
    public static function contentAddAccess(&$view, $pageId = null)
    {
        $access = array(
            'pageCreateAllowed' => SecurityUtil::checkPermission('Content:page:', '::', ACCESS_ADD),
            'pageEditAllowed' => SecurityUtil::checkPermission('Content:page:', $pageId . '::', ACCESS_EDIT),
            'pageDeleteAllowed' => SecurityUtil::checkPermission('Content:page:', $pageId . '::', ACCESS_DELETE)
            );
        $view->assign('access', $access);
    }

    // Clear Content cache
    public static function clearCache($template = '')
    {
        $view = Zikula_View::getInstance('Content');

        if (!empty($template)) {
            $view->clear_cache($template);
        } else {
            $view->clear_cache();
        }
    }

    public static function contentMainEditExpandToggle($pageId)
    {
        $expandedPageIds = SessionUtil::getVar('contentExpandedPageIds', array());
        if (isset($expandedPageIds[$pageId])) {
            unset($expandedPageIds[$pageId]);
        } else {
            $expandedPageIds[$pageId] = 1;
        }
        SessionUtil::setVar('contentExpandedPageIds', $expandedPageIds);
    }

    public static function contentMainEditExpandSet($pageId, $value)
    {
        $expandedPageIds = SessionUtil::getVar('contentExpandedPageIds', array());
        if ($value) {
            $expandedPageIds[$pageId] = 1;
        } else {
            unset($expandedPageIds[$pageId]);
        }
        SessionUtil::setVar('contentExpandedPageIds', $expandedPageIds);
    }

    public static function contentMainEditCollapseAll($belowPageId = null)
    {
        if ($belowPageId == null) {
            SessionUtil::setVar('contentExpandedPageIds', array());
        } else {
            $expandedPageIds = SessionUtil::getVar('contentExpandedPageIds', array());
            foreach(Content_Util::contentMainEditGetPagesList($belowPageId) as $page) {
                unset($expandedPageIds[$page['id']]);
            }
            SessionUtil::setVar('contentExpandedPageIds', $expandedPageIds);
        }
    }

    public static function contentMainEditExpandAll($belowPageId = null)
    {
        $expandedPageIds = SessionUtil::getVar('contentExpandedPageIds', array());
        foreach(Content_Util::contentMainEditGetPagesList($belowPageId) as $page) {
            $expandedPageIds[$page['id']] = 1;
        }
        SessionUtil::setVar('contentExpandedPageIds', $expandedPageIds);
    }


    public static function contentMainEditGetPagesList($belowPageId = null)
    {
        $filter = array('checkActive' => false);
        if ($belowPageId != null) {
            $filter['superParentId'] = $belowPageId;
        }
        return ModUtil::apiFunc('Content', 'Page', 'getPages', array(
                    'editing' => true,
                    'filter' => $filter,
                    'translate' => false));
    }

    public static function getPlugins($type='Content')
    {
        $type = in_array($type, array('Content', 'Layout')) ? trim(ucwords(strtolower($type))) . "Type" : 'ContentType';

        // trigger event
        $event = new Zikula_Event('module.content.gettypes', new Content_Types());
        $plugins = EventUtil::getManager()->notify($event)->getSubject()->getValidatedPlugins($type);

        return $plugins;
    }

    public static function getTypes(Zikula_Event $event) {
        $types = $event->getSubject();
        // add content types
        $types->add('Content_ContentType_Author');
        $types->add('Content_ContentType_Block');
        $types->add('Content_ContentType_Breadcrumb');
        $types->add('Content_ContentType_Camtasia');
        $types->add('Content_ContentType_ComputerCode');
        $types->add('Content_ContentType_TableOfContents');
        $types->add('Content_ContentType_Flickr');
        $types->add('Content_ContentType_GoogleMap');
        $types->add('Content_ContentType_Heading');
        $types->add('Content_ContentType_Html');
        $types->add('Content_ContentType_JoinPosition');
        $types->add('Content_ContentType_ModuleFunc');
        $types->add('Content_ContentType_OpenStreetMap');
        $types->add('Content_ContentType_PageNavigation');
        $types->add('Content_ContentType_Quote');
        $types->add('Content_ContentType_Rss');
        $types->add('Content_ContentType_Slideshare');
        $types->add('Content_ContentType_Unfiltered');
        $types->add('Content_ContentType_Vimeo');
        $types->add('Content_ContentType_YouTube');

        // add layout types
        $types->add('Content_LayoutType_Column1');
        $types->add('Content_LayoutType_Column1top');
        $types->add('Content_LayoutType_Column1woheader');
        $types->add('Content_LayoutType_Column212');
        $types->add('Content_LayoutType_Column2d2575');
        $types->add('Content_LayoutType_Column2d3070');
        $types->add('Content_LayoutType_Column2d3366');
        $types->add('Content_LayoutType_Column2d3862');
        $types->add('Content_LayoutType_Column2d6238');
        $types->add('Content_LayoutType_Column2d6633');
        $types->add('Content_LayoutType_Column2d7030');
        $types->add('Content_LayoutType_Column2d7525');
        $types->add('Content_LayoutType_Column2header');
        $types->add('Content_LayoutType_Column3d252550');
        $types->add('Content_LayoutType_Column3d255025');
        $types->add('Content_LayoutType_Column3d502525');
        $types->add('Content_LayoutType_Column3header');
        $types->add('Content_LayoutType_Column21212');
        $types->add('Content_LayoutType_Column21212rightcol');
    }

}