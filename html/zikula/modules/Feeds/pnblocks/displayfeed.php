<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: displayfeed.php 334 2009-11-09 05:51:54Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Feeds
 */

/**
 * initialise block
 */
function Feeds_displayfeedblock_init()
{
    // Security
    SecurityUtil::registerPermissionSchema('Feeds:NewsFeed:', 'Block title::');
}

/**
 * get information on block
 */
function Feeds_displayfeedblock_info()
{
    $dom = ZLanguage::getModuleDomain('Feeds');

    return array('module' => 'Feeds',
                 'text_type' => __('Display feed', $dom),
                 'text_type_long' => __('Show a feed item', $dom),
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true,
                 'admin_tableless' => true);
}

/**
 * display block
 */
function Feeds_displayfeedblock_display($blockinfo)
{
    // Security check
    if (!SecurityUtil::checkPermission('Feeds:NewsFeed:', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }

    // Get variables from content block
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['feedid'])) {
        $vars['feedid'] = 1;
    }
    if (empty($vars['displayimage'])) {
        $vars['displayimage'] = 0;
    }
    if (empty($vars['displaydescription'])) {
        $vars['displaydescription'] = 0;
    }
    if (empty($vars['alternatelayout'])) {
        $vars['alternatelayout'] = 0;
    }

    // Get the feed item
    $item = pnModAPIFunc('Feeds', 'user', 'get', array('fid' => $vars['feedid']));

    if (!$item) {
        return;
    }

    // Create output object
    $render = & pnRender::getInstance('Feeds');

    //  Check if the block is cached
    if ($render->is_cached('feeds_block_displayfeed.htm', $item['fid'])) {
        $blockinfo['content'] = $render->fetch('feeds_block_displayfeed.htm', $item['fid']);
        return pnBlockThemeBlock($blockinfo);
    }

    // Get the feed source
    $fullfeed = pnModAPIFunc('Feeds', 'user', 'getfeed', array('furl' => $item['url']));

    // Assign the module vars
    $render->assign(pnModGetVar('Feeds'));

    // Assign the item and feed
    $render->assign($item);
    $render->assign('feed', $fullfeed);

    // assign the block vars
    $render->assign($vars);

   // Populate block info and pass to theme
    $blockinfo['content'] = $render->fetch('feeds_block_displayfeed.htm', $item['fid']);

    return pnBlockThemeBlock($blockinfo);
}

/**
 * modify block settings
 */
function Feeds_displayfeedblock_modify($blockinfo)
{
    // Create output object
    $render = & pnRender::getInstance('Feeds', false);

    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['feedid'])) {
        $vars['feedid'] = 1;
    }
    if (empty($vars['displayimage'])) {
        $vars['displayimage'] = 0;
    }
    if (empty($vars['displaydescription'])) {
        $vars['displaydescription'] = 0;
    }
    if (empty($vars['alternatelayout'])) {
        $vars['alternatelayout'] = 0;
    }
    if (empty($vars['numitems'])) {
        $vars['numitems'] = -1;
    }

    // The API function is called.  The arguments to the function are passed in
    // as their own arguments array
    $items = pnModAPIFunc('Feeds', 'user', 'getall');

    // create an array for feednames and id's for the template
    $allfeeds = array();
    foreach ($items as $item) {
        $allfeeds[$item['fid']] = $item['name'];
    }
    $render->assign('allfeeds', $allfeeds);

    // assign the block vars
    $render->assign($vars);

    // Return output
    return $render->fetch('feeds_block_displayfeed_modify.htm');
}

/**
 * update block settings
 */
function Feeds_displayfeedblock_update($blockinfo)
{
    $vars['feedid'] = FormUtil::getPassedValue('feedid', 1, 'POST');
    $vars['numitems'] = FormUtil::getPassedValue('numitems', 0, 'POST');
    $vars['displayimage'] = FormUtil::getPassedValue('displayimage', -1, 'POST');
    $vars['displaydescription'] = FormUtil::getPassedValue('displaydescription', -1, 'POST');
    $vars['alternatelayout'] = FormUtil::getPassedValue('alternatelayout', -1, 'POST');

    $blockinfo['content'] = pnBlockVarsToContent($vars);

    return $blockinfo;
}
