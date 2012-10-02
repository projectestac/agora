<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * reset site statistics
 *
 * @param    $args['site']       reset the main site stats
 * @param    $args['browseros']  reset the browser and os stats
 * @todo     recode using DBUtil
 * @return   bool                true on success, false on failiure
 */
function stats_adminapi_reset($args)
{
    $dom = ZLanguage::getModuleDomain('Stats');
    // optional arguments
    if (!isset($args['site'])) {
        $site = false;
    } else {
        $site = true;
    }
    if (!isset($args['browseros'])) {
        $browseros = false;
    } else {
        $browseros = true;
    }

    // Security check
    if (!SecurityUtil::checkPermission('Stats::', '::', ACCESS_DELETE)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }

    // return if not required to do any work
    if (!$site && !$browseros) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // Get datbase setup
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $datetable = $pntable['stats_date'];
    $datecolumn = $pntable['stats_date_column'];
    $hourtable = $pntable['stats_hour'];
    $hourcolumn = $pntable['stats_hour_column'];
    $weektable = $pntable['stats_week'];
    $weekcolumn = $pntable['stats_week_column'];
    $monthtable = $pntable['stats_month'];
    $monthcolumn = $pntable['stats_month_column'];
    $countertable = $pntable['counter'];
    $countercolumn = $pntable['counter_column'];

    // delete the main site stats
    if ($site) {
        $sql = "TRUNCATE TABLE $datetable";
        $dbconn->Execute($sql);
        // Check for an error with the database code
        if ($dbconn->ErrorNo() != 0) {
            return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
        }
        $sql = "UPDATE $hourtable SET $hourcolumn[hits] = '0'";
        $dbconn->Execute($sql);
        // Check for an error with the database code
        if ($dbconn->ErrorNo() != 0) {
            return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
        }
        $sql = "UPDATE $weektable SET $weekcolumn[hits] = '0'";
        $dbconn->Execute($sql);
        // Check for an error with the database code
        if ($dbconn->ErrorNo() != 0) {
            return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
        }
        $sql = "UPDATE $monthtable SET $monthcolumn[hits] = '0'";
        $dbconn->Execute($sql);
        // Check for an error with the database code
        if ($dbconn->ErrorNo() != 0) {
            return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
        }
    }

    // reset the browser and os stats
    if ($browseros) {
        $sql = "UPDATE $countertable SET $countercolumn[count] = '0'";
        $dbconn->Execute($sql);
        // Check for an error with the database code
        if ($dbconn->ErrorNo() != 0) {
            return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
        }
    }

    // Return the id of the newly created item to the calling process
    return true;
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function stats_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('Stats');
    $links = array();

    pnModLangLoad('Stats', 'admin');

    if (SecurityUtil::checkPermission('Stats::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('Stats', 'user'), 'text' => __('View', $dom));
    }
    if (SecurityUtil::checkPermission('Stats::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Stats', 'admin', 'reset'), 'text' => __('Reset', $dom));
    }
    if (SecurityUtil::checkPermission('Stats::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Stats', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));
    }

    return $links;
}
