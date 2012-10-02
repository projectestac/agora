<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pending.php 26534 2009-09-03 15:11:51Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage PendingContent
 */

/**
 * initialise block
 */
function pendingcontent_pendingblock_init()
{
    // Security
    pnSecAddSchema('PendingContent:pendingblock:', 'Block title::');
}

/**
 * get information on block
 */
function pendingcontent_pendingblock_info()
{
    $dom = ZLanguage::getModuleDomain('PendingContent');

    // Values
    return array('module'           => 'PendingContent',
                 'text_type'        => __('Pending Content', $dom),
                 'text_type_long'   => __('Pending Block', $dom),
                 'allow_multiple'   => true,
                 'form_content'     => false,
                 'form_refresh'     => false,
                 'show_preview'     => true);
}

/**
 * display block
 *
 * @todo move sql execution to API
 */
function pendingcontent_pendingblock_display($blockinfo)
{
    // Security check
    if (!SecurityUtil::checkPermission('PendingContent:pendingblock:', "$blockinfo[title]::", ACCESS_ADMIN)) {
        return;
    }
    // grab the modules information
    $modinfo = pnModGetInfo(pnModGetIDFromName('PendingContent'));

    // Get variables from content block
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Database information
    pnModDBInfoLoad('PendingContent');

    // define the permissions filter to use
    $permFilter = array();
    $permFilter[] = array('realm'            => 0,
                          'component_left'   => 'PendingContent',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'name',
                          'instance_middle'  => '',
                          'instance_right'   => 'pid',
                          'level'            => ACCESS_READ);

    // get data
    $pendingData = DBUtil::selectObjectArray ('pendingcontent', '', 'name', -1, -1, '', $permFilter);
    if ($pendingData === false) {
        return;
    }

    $totalPending = 0;

    // Display each item, permissions permitting
    foreach ($pendingData as $k=>$pd) {
        $res = DBUtil::executeSql ($pd['sql']);
        list($number) = $res->fields;
        if ($number < 1){
            $number = 0;
        }
        unset($pendingData[$k]['pid']);
        unset($pendingData[$k]['sql']);
        $pendingData[$k]['number'] = $number;

        // add up the total pending items
        $totalPending += $number;
    }

    // Don't show the block if there are no pendng items.
    if ($totalPending < 1) return;

    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $pnRender = & pnRender::getInstance('PendingContent', false);

    // assign the pending content
    $pnRender->assign('pendingitems', $pendingData);
    $pnRender->assign('numPendingItems', count($pendingData));

    // Populate block info and pass to theme
    $blockinfo['content'] = $pnRender->fetch('pendingcontent_block_pending.htm');

    return pnBlockThemeBlock($blockinfo);
}

/**
 * modify block settings
 */
function pendingcontent_pendingblock_modify($blockinfo)
{
    return;
}

/**
 * update block settings
 */
function pendingcontent_pendingblock_update($blockinfo)
{
    $blockinfo['content'] = pnBlockVarsToContent($vars);
    return $blockinfo;
}
