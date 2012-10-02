<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org/
 * @version $Id: page.php 411 2010-04-23 16:02:49Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package Zikula_Value_Addons
 * @subpackage Pages
 */

/**
 * initialise block
 */
function Pages_pageblock_init()
{
    // Security
    SecurityUtil::registerPermissionSchema('Pages:pageblock:', 'Block title::');
}

/**
 * get information on block
 */
function Pages_pageblock_info()
{
    $dom = ZLanguage::getModuleDomain('Pages');

    return array('module'          => 'Pages',
                 'text_type'       => __('Show page', $dom),
                 'text_type_long'  => __('Show a page in a block', $dom),
                 'allow_multiple'  => true,
                 'form_content'    => false,
                 'form_refresh'    => false,
                 'show_preview'    => true,
                 'admin_tableless' => true);
}

/**
 * display block
 */
function Pages_pageblock_display($blockinfo)
{
    // Security check
    if (!SecurityUtil::checkPermission('Pages:pageblock:', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }

    // Get variables from content block
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // return if no pid
    if (empty($vars['pid'])) {
        return;
    }

    // get the page
    $item = pnModAPIFunc('Pages', 'user', 'get', array('pageid' => $vars['pid']));

    // check for a valid item
    if (!$item) {
        return;
    }

    if (!SecurityUtil::checkPermission('Pages::', "{$item['title']}::{$item['pageid']}", ACCESS_READ)) {
        return;       
    }

     // Create output object
    if (!isset($item['content'])) {
        return;
    }

    // create the output object
    $render = & pnRender::getInstance('Pages');
    $render->cache_id = $item['pageid'];

    // assign the item
    $render->assign($item);

    // Populate block info and pass to theme
    $blockinfo['content'] = $render->fetch('pages_block_pageblock_display.htm');
    return pnBlockThemeBlock($blockinfo);
}

/**
 * modify block settings
 */
function Pages_pageblock_modify($blockinfo)
{
    // create the output object
    $render = & pnRender::getInstance('Pages', false);

    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // assign the block vars
    $render->assign($vars);

    // Return output
    return $render->fetch('pages_block_pageblock_modify.htm');
}

/**
 * update block settings
 */
function Pages_pageblock_update($blockinfo)
{
    // get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // alter the corresponding variable
    $vars['pid'] = (int)FormUtil::getPassedValue('pid', null, 'POST');

    // write back the new contents
    $blockinfo['content'] = pnBlockVarsToContent($vars);

    // clear the block cache
    $render = & pnRender::getInstance('Pages');
    $render->clear_cache('pages_block_pageslist.htm');

    return $blockinfo;
}
