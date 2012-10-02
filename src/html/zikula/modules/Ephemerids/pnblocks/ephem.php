<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: ephem.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */

/**
 * initialise block
 */
function Ephemerids_ephemblock_init()
{
    // Security
    pnSecAddSchema('Ephemeridsblock::', 'Block title::');
}

/**
 * get information on block
 */
function Ephemerids_ephemblock_info()
{
    $dom = ZLanguage::getModuleDomain('Ephemerids');

    // Values
    return array('module' => 'Ephemerids',
                 'text_type' => __('Ephemerids', $dom),
                 'text_type_long' => __('Ephemerid', $dom),
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true);
}

function Ephemerids_ephemblock_display($blockinfo)
{
    // Security check
    if (!SecurityUtil::checkPermission('Ephemeridsblock::', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }

    if (!pnModAvailable('Ephemerids')) {
        return;
    }

    // Create output object
    $pnRender = & pnRender::getInstance('Ephemerids');

    $pnRender->assign('items', pnModAPIFunc('Ephemerids', 'user', 'gettoday'));

    // Populate block info and pass to theme
    $blockinfo['content'] = $pnRender->fetch('ephemerids_block_ephem.htm');

    return pnBlockThemeBlock($blockinfo);
}
