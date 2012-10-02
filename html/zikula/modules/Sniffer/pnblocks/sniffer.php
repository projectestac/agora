<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: sniffer.php 4 2009-11-09 12:38:09Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Sniffer
 */

/**
 * initialise block
 *
 * @author       The Zikula Development Team
 */
function Sniffer_snifferblock_init()
{
    // Security
    pnSecAddSchema('Sniffer:Snifferblock:', 'Block title::');
}

/**
 * get information on block
 *
 * @author       The Zikula Development Team
 * @return       array       The block information
 */
function Sniffer_snifferblock_info()
{
    $dom = ZLanguage::getModuleDomain('Sniffer');

    return array('module'         => 'Sniffer',
                 'text_type'      => __('Sniffer', $dom),
                 'text_type_long' => __('Show browser info', $dom),
                 'allow_multiple' => true,
                 'form_content'   => false,
                 'form_refresh'   => false,
                 'show_preview'   => true);
}

/**
 * display block
 *
 * @author       The Zikula Development Team
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output      the rendered bock
 */
function Sniffer_snifferblock_display($blockinfo)
{
    // Security check
    if (!SecurityUtil::checkPermission( 'Sniffer:Snifferblock:', "$blockinfo[title]::", ACCESS_READ)) {
        return false;
    }

    // Check if the Sniffer module is available.
    if (!pnModAvailable('Sniffer')) {
        return false;
    }

    // get the object
    // Note: we're calling a technically private API function but since we're
    // in the module that's defined the API then this seems ok (ish...).
    $browserinfo = pnModAPIFunc('Sniffer', 'user', 'get');

    // we also need the module language file for it's definitations
    pnModLangLoad('Sniffer', 'admin');

    // Create output object
    $pnRender = & pnRender::getInstance('Sniffer');

    // assign the object
    // Note: we assign the object by reference to avoid duplication in memory
    $pnRender->assign_by_ref('browserinfo', $browserinfo);

    // Populate block info and pass to theme
    $blockinfo['content'] = $pnRender->fetch('sniffer_block_sniffer.htm');

    return pnBlockThemeBlock($blockinfo);
}


/**
 * modify block settings
 *
 * @author       The Zikula Development Team
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output      the bock form
 */
function Sniffer_snifferblock_modify($blockinfo)
{
    return;
}


/**
 * update block settings
 *
 * @author       The Zikula Development Team
 * @param        array       $blockinfo     a blockinfo structure
 * @return       $blockinfo  the modified blockinfo structure
 */
function Sniffer_snifferblock_update($blockinfo)
{
    return $blockinfo;
}
