<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: stories.php 77 2009-02-25 17:33:19Z espaan $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

/**
 * initialise block
 *
 * @author       The Zikula Development Team
 */
function News_storiesblock_init()
{
    SecurityUtil::registerPermissionSchema('Storiesblock::', 'Block ID::');
}

/**
 * get information on block
 *
 * @author       The Zikula Development Team
 * @return       array       The block information
 */
function News_storiesblock_info()
{
    $dom = ZLanguage::getModuleDomain('News');

    return array('module'          => 'News',
                 'text_type'       => __('Article titles', $dom),
                 'text_type_long'  => __('Display article titles', $dom),
                 'allow_multiple'  => true,
                 'form_content'    => false,
                 'form_refresh'    => false,
                 'show_preview'    => true,
                 'admin_tableless' => true);
}

/**
 * display block
 *
 * @author       The Zikula Development Team
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output      the rendered bock
 */
function News_storiesblock_display($blockinfo)
{
    // security check
    if (!SecurityUtil::checkPermission('Storiesblock::', $blockinfo['bid'].'::', ACCESS_OVERVIEW)) {
        return;
    }

    $dom = ZLanguage::getModuleDomain('News');

    // Break out options from our content field
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (!isset($vars['storiestype'])) {
        $vars['storiestype'] = 2;
    }
    if (!isset($vars['limit'])) {
        $vars['limit'] = 10;
    }

    // work out the paraemters for the api all
    $apiargs = array();
    switch ($vars['storiestype'])
    {
        case 1:
            // non index page articles
            $apiargs['hideonindex'] = 1;
            break;
        case 3:
            // index page articles
            $apiargs['hideonindex'] = 0;
            break;
            // all - doesn't need hideonindex
    }

    $apiargs['numitems'] = $vars['limit'];
    $apiargs['status'] = 0;
    $apiargs['ignorecats'] = true;

    if (isset($vars['category']) && !empty($vars['category'])) {
        if (!Loader::loadClass('CategoryUtil') || !Loader::loadClass('CategoryRegistryUtil')) {
            return LogUtil::registerError(__f('Error! Could not load [%s] class.', 'CategoryUtil | CategoryRegistryUtil', $dom));
        }
        $cat = CategoryUtil::getCategoryByID($vars['category']);
        $categories = CategoryUtil::getCategoriesByPath($cat['path'], '', 'path');
        $catstofilter = array();
        foreach ($categories as $category) {
            $catstofilter[] = $category['id'];
        }
        $apiargs['category'] = array('Main' => $catstofilter);
    }
    $apiargs['filterbydate'] = true;

    // call the api
    $items = pnModAPIFunc('News', 'user', 'getall', $apiargs);

    // check for an empty return
    if (empty($items)) {
        return;
    }

    // create the output object
    $render = & pnRender::getInstance('News', false);

    // loop through the items
    $storiesoutput = array();
    foreach ($items as $item) {
        $storyreadperm = false;
        if (SecurityUtil::checkPermission('News::', "$item[cr_uid]::$item[sid]", ACCESS_READ) ||
            SecurityUtil::checkPermission('Stories::Story', "$item[cr_uid]::$item[sid]", ACCESS_READ)) {
            $storyreadperm = true;
        }

        $render->assign('readperm', $storyreadperm);
        $render->assign($item);
        $storiesoutput[] = $render->fetch('news_block_stories_row.htm', $item['sid'], null, false, false);
    }

    // assign the results
    $render->assign('stories', $storiesoutput);

    $render->assign('dom', $dom);

    $blockinfo['content'] = $render->fetch('news_block_stories.htm');

    return pnBlockThemeBlock($blockinfo);
}

/**
 * modify block settings
 *
 * @author       The Zikula Development Team
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output      the bock form
 */
function News_storiesblock_modify($blockinfo)
{
    $dom = ZLanguage::getModuleDomain('News');

    // Break out options from our content field
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['storiestype'])) {
        $vars['storiestype'] = 2;
    }
    if (empty($vars['limit'])) {
        $vars['limit'] = 10;
    }

    // Create output object
    $render = & pnRender::getInstance('News', false);

    // load the categories system
    if (!Loader::loadClass('CategoryRegistryUtil')) {
        return LogUtil::registerError(__f('Error! Could not load [%s] class.'), 'CategoryRegistryUtil', $dom);
    }
    $mainCat = CategoryRegistryUtil::getRegisteredModuleCategory('News', 'news', 'Main', 30); // 30 == /__SYSTEM__/Modules/Global
    $render->assign('mainCategory', $mainCat);
    $render->assign(pnModGetVar('News'));

    // assign the block vars
    $render->assign($vars);

    $render->assign('dom', $dom);

    // Return the output that has been generated by this function
    return $render->fetch('news_block_stories_modify.htm');
}

/**
 * update block settings
 *
 * @author       The Zikula Development Team
 * @param        array       $blockinfo     a blockinfo structure
 * @return       $blockinfo  the modified blockinfo structure
 */
function News_storiesblock_update($blockinfo)
{
    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // alter the corresponding variable
    $vars['storiestype'] = FormUtil::getPassedValue('storiestype', null, 'POST');
    $vars['topic']       = FormUtil::getPassedValue('topic', null, 'POST');
    $vars['category']    = FormUtil::getPassedValue('category', null, 'POST');
    $vars['limit']       = (int)FormUtil::getPassedValue('limit', null, 'POST');

    // write back the new contents
    $blockinfo['content'] = pnBlockVarsToContent($vars);

    // clear the block cache
    $render = & pnRender::getInstance('News');
    $render->clear_cache('news_block_stories.htm');

    return $blockinfo;
}
