<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 27151 2009-10-25 03:17:26Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin_Messages
 */

/**
 * get all admin messages items
 * @author Mark West
 * @param int args['startnum'] starting number
 * @param int args['numitems'] number of items to get
 * @return mixed array of items, or false on failure
 */
function Admin_Messages_userapi_getall($args)
{
    // Optional arguments.
    if (!isset($args['startnum']) || empty($args['startnum'])) {
        $args['startnum'] = 0;
    }
    if (!isset($args['numitems']) || empty($args['numitems'])) {
        $args['numitems'] = -1;
    }

    if (!is_numeric($args['startnum']) ||
        !is_numeric($args['numitems'])) {
        return LogUtil::registerArgsError();
    }

    $items = array();

    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_READ)) {
        return $items;
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'Admin_Messages',
                              'instance_left'  => 'title',
                              'instance_right' => 'mid',
                              'level'          => ACCESS_READ));

    // get the objects from the db
    $items = DBUtil::selectObjectArray('message', '', 'mid', $args['startnum']-1, $args['numitems'], '', $permFilter);

    if ($items === false) {
        return LogUtil::registerError(__('Error! Could not load data.'));
    }

    // Return the items
    return $items;
}

/**
 * get a specific admin messages item
 * @author Mark West
 * @param int $args['mid'] id of message to get
 * @return mixed item array, or false on failure
 */
function Admin_Messages_userapi_get($args)
{
    // Argument check
    if ( (!isset($args['mid'])) || (!is_numeric($args['mid'])) ) {
        return LogUtil::registerArgsError();
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'Admin_Messages',
                              'instance_left'  => 'title',
                              'instance_right' => 'mid',
                              'level'          => ACCESS_READ));

    return DBUtil::selectObjectByID('message', $args['mid'], 'mid', '', $permFilter);
}

/**
 * utility function to count the number of items held by this module
 * @author Mark West
 * @return int number of items held by this module
 */
function Admin_Messages_userapi_countitems()
{
    return DBUtil::selectObjectCount('message', '');
}

/**
 * get all admin messages items
 * @author Mark West
 * @param int args['startnum'] starting number
 * @param int args['numitems'] number of items to get
 * @return mixed array of items, or false on failure
 */
function Admin_Messages_userapi_getactive($args)
{
    // Optional arguments.
    if (!isset($args['numitems'])) {
        $args['numitems'] = 25;
    }
    if (!isset($args['startnum'])) {
        $args['startnum'] = 0;
    }

    if (!is_numeric($args['numitems']) ||
        !is_numeric($args['startnum'])) {
        return LogUtil::registerArgsError();
    }

    $items = array();

    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_READ)) {
        return $items;
    }

    $pntable = pnDBGetTables();
    $messagescolumn = $pntable['message_column'];

    // Check if we're in a multilingual setup
    if (pnConfigGetVar('multilingual') == 1) {
        $currentlang = ZLanguage::getLanguageCode();
        $querylang = "AND ($messagescolumn[language]='$currentlang' OR $messagescolumn[language]='')";
    } else {
        $querylang = '';
    }

    $where = "$messagescolumn[active] = 1
              AND ($messagescolumn[date]+$messagescolumn[expire] > '".time()."'
              OR $messagescolumn[expire] = 0)
              $querylang";

    $orderby = "ORDER by $messagescolumn[mid] DESC";

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'Admin_Messages',
                              'instance_left'  => 'title',
                              'instance_right' => 'mid',
                              'level'          => ACCESS_READ));

    $items = DBUtil::selectObjectArray('message', $where, $orderby, $args['startnum'], $args['numitems'], '', $permFilter);

    if ($items === false) {
        return LogUtil::registerError(__('Error! Could not load data.'));
    }

    // Return the items
    return $items;
}
