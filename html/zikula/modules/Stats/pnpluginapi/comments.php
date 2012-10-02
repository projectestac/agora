<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: comments.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * obtain the number of registered users
 *
 */
function stats_pluginapi_comments()
{
    // Security check
    if (!SecurityUtil::checkPermission('Stats::', '::', ACCESS_READ)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }

    // check the module availability
    if (!pnModAvailable('Comments')) {
        return false;
    }

    // get the database setup
    $dbconn  = pnDBGetConn(true);
    $pntable = pnDBGetTables();

    // execute the query
    $result = $dbconn->Execute("SELECT count(*) AS count FROM $pntable[comments]");
    list($count) = $result->fields;

    // create the output object
    $pnRender = pnRender::getInstance('Stats');

    // assign the result set
    $pnRender->assign(array('image' => 'comments.gif', 'string' => __('Comments posted:', $dom), 'value' => $count));

    // return the result set
    return $pnRender->fetch('stats_plugin.htm');
}
