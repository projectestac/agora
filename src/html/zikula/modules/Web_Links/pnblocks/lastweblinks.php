<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: lastweblinks.php 46 2009-01-24 22:51:07Z Petzi-Juist $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * initialise block
 */
function Web_Links_lastweblinksblock_init()
{
    // Security
    pnSecAddSchema('Web_linksblock::', 'Block title::');
}

/**
 * get information on block
 */
function Web_Links_lastweblinksblock_info()
{
    // Values
    return array('text_type' => 'lastweblinks',
                 'module' => 'Web_Links',
                 'text_type_long' => 'Latest Web Links',
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true,
                 'admin_tableless' => true);
}

/**
 * display block
 */
function Web_Links_lastweblinksblock_display($blockinfo)
{
    // Security check
    if (!SecurityUtil::checkPermission('Web_Linksblock::', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }

    // check if the quotes module is available
    if (!pnModAvailable('Web_Links')) {
        return;
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    //  Check if the block is cached
    if ($pnRender->is_cached('weblinks_block_lastweblinks.html')) {
        $blockinfo['content'] = $pnRender->fetch('weblinks_block_lastweblinks.html');
        return pnBlockThemeBlock($blockinfo);
    }

    $pnRender->assign('weblinks', pnModAPIFunc('Web_Links', 'user', 'lastweblinks'));
    $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));

    // Populate block info and pass to theme
    $blockinfo['content'] = $pnRender->fetch('weblinks_block_lastweblinks.html');

    return pnBlockThemeBlock($blockinfo);
}

/**
 * modify block settings
 */
function Web_Links_lastweblinksblock_modify($blockinfo)
{
    // Create output object
    $pnRender = pnRender::getInstance('Web_Links', false);

    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['items'])) {
        $vars['items'] = 10;
    }

    // assign the block vars
    $pnRender->assign($vars);

    // Return output
//    return $pnRender->fetch('weblinks_block_displayfeed_modify.htm');
}

/**
 * update block settings
 */
function Web_Links_lastweblinksblock_update($blockinfo)
{
    $vars['items'] = FormUtil::getPassedValue('numitems', 10, 'POST');

    $blockinfo['content'] = pnBlockVarsToContent($vars);

    return $blockinfo;
}