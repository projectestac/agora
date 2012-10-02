<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 26261 2009-08-20 04:50:50Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package     Zikula_System_Modules
 * @subpackage  pnRender
 */

/**
 * Clear compiled templates
 *
 * Using this function, the user can clear all compiled templates for
 * the system.
 *
 * @author       Joerg Napp
 * @author       Frank Schummertz
 */
function pnRender_userapi_clear_compiled($args)
{
    // security check
    if (!SecurityUtil::checkPermission('pnRender::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // CacheUtil::clearLocalDir() is broken in some situations so we use the good old
    // Smarty-object again.
    $smarty  = new Smarty;
    $smarty->compile_dir = CacheUtil::getLocalDir() . '/pnRender_compiled';
    $smarty->cache_dir = CacheUtil::getLocalDir() . '/pnRender_cache';
    $smarty->use_sub_dirs = false;
    $smarty->clear_compiled_tpl();
    // recreate index.html file
    fclose(fopen($smarty->compile_dir . '/index.html', 'w'));

    return true;
}


/**
 * Clear cached pages
 *
 * Using this function, the admin can clear all cached templates for
 * the system.
 *
 * @author       Joerg Napp
 * @author       Frank Schummertz
 *
 * @param module the module where to clear the cache, emptys = clear all caches
 * @return true or false

 */
function pnRender_userapi_clear_cache($args)
{
    if (!SecurityUtil::checkPermission('pnRender::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    if(isset($args['module']) && !empty($args['module']) && pnModAvailable($args['module'])) {
        $pnRender = & pnRender::getInstance($args['module']);
        $res = $pnRender->clear_cache();
    } else {
        $pnRender = & pnRender::getInstance('pnRender');
        $res = $pnRender->clear_all_cache();
    }
    return $res;
}
