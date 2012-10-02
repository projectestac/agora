<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 26422 2009-08-28 15:29:44Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage PendingContent
 */

/**
 * get all pending items
 * @return mixed array of items, or false on failure
 */
function pendingcontent_userapi_getall($args)
{
    // get translation domain for this module
    $dom = ZLanguage::getModuleDomain('PendingContent');

    // Optional arguments.
    if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
        $args['numitems'] = -1;
    }

    $items = array();

    // Security check
    if (!SecurityUtil::checkPermission('PendingContent::', '::', ACCESS_READ)) {
        return $items;
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'PendingContent',
                              'instance_left'  => 'name',
                              'instance_right' => 'pid',
                              'level'          => ACCESS_READ));

    // get the objects from the db
    $items = DBUtil::selectObjectArray('pendingcontent', '', 'pid', $args['startnum']-1, $args['numitems'], '', $permFilter);
    if ($items === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    // Return the items
    return $items;
}

/**
 * get a specific item
 * @param $args['pid'] id of pending item to get
 * @return mixed item array, or false on failure
 */
function pendingcontent_userapi_get($args)
{
    // get translation domain for this module
    $dom = ZLanguage::getModuleDomain('PendingContent');

    // Argument check
    if (!isset($args['pid'])) {
        return LogUtil::registerArgsError();
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'PendingContent',
                              'instance_left'  => 'name',
                              'instance_right' => 'pid',
                              'level'          => ACCESS_READ));

    return DBUtil::selectObjectByID('pendingcontent', $args['pid'], 'pid', '', $permFilter);
}

/**
 * utility function to count the number of items held by this module
 * @return integer number of items held by this module
 */
function pendingcontent_userapi_countitems()
{
    return DBUtil::selectObjectCount('pendingcontent', '');
}
