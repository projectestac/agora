<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: user.php 27063 2009-10-21 16:48:48Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Users
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * initialise block
 *
 * @author       The Zikula Development Team
 */
function Users_userblock_init()
{
    // Security
    pnSecAddSchema('Userblock::', 'Block title::');
}

/**
 * get information on block
 *
 * @author       The Zikula Development Team
 * @return       array       The block information
 */
function Users_userblock_info()
{
    return array('module'         => 'Users',
                 'text_type'      => __('User'),
                 'text_type_long' => __("User's custom box"),
                 'allow_multiple' => false,
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
function Users_userblock_display($blockinfo)
{
    if (!SecurityUtil::checkPermission('Userblock::', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }

    if (pnUserLoggedIn() && pnUserGetVar('ublockon') == 1) {
        if (!isset($blockinfo['title']) || empty($blockinfo['title'])) {
            $blockinfo['title'] = __f('Custom block content for %s', pnUserGetVar('name'));
        }
        $blockinfo['content'] = nl2br(pnUserGetVar('ublock'));
        return pnBlockThemeBlock($blockinfo);
    }
    return;
}
