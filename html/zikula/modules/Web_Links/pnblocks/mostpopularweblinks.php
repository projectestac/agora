<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: mostpopularweblinks.php 46 2009-01-24 22:51:07Z Petzi-Juist $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * initialise block
 */
function Web_Links_mostpopularweblinksblock_init()
{
    // Security
    pnSecAddSchema('Web_linksblock::', 'Block title::');
}

/**
 * get information on block
 */
function Web_Links_mostpopularweblinksblock_info()
{
    // Values
    return array('text_type' => 'mostpopularweblinks',
                 'module' => 'Web_Links',
                 'text_type_long' => 'Most Popular Web Links',
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true,
                 'admin_tableless' => true);
}

/**
 * display block
 */
function Web_Links_mostpopularweblinksblock_display($blockinfo)
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
    if ($pnRender->is_cached('weblinks_block_mostpopularweblinks.html')) {
        $blockinfo['content'] = $pnRender->fetch('weblinks_block_mostpopularweblinks.html');
        return pnBlockThemeBlock($blockinfo);
    }

    $pnRender->assign('weblinks', pnModAPIFunc('Web_Links', 'user', 'mostpopularweblinks'));
    $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));

    // Populate block info and pass to theme
    $blockinfo['content'] = $pnRender->fetch('weblinks_block_mostpopularweblinks.html');

    return pnBlockThemeBlock($blockinfo);
}

/**
 * modify block settings
 */
function Web_Links_mostpopularweblinksblock_modify($blockinfo)
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
//    return $pnRender->fetch('weblinks_block_display_modify.htm');
}

/**
 * update block settings
 */
function Web_Links_mostpopularweblinksblock_update($blockinfo)
{
    $vars['items'] = FormUtil::getPassedValue('items', 10, 'POST');

    $blockinfo['content'] = pnBlockVarsToContent($vars);

    return $blockinfo;
}