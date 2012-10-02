<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnadminapi.php 694 2010-05-25 07:59:46Z mateo $
 * @license See license.txt
 */

/**
 * EZComments_adminapi_getUsedModules()
 *
 * This function returns an array of the modules
 * for which a comment is available. This is used
 * for the "clean-up" feature that eliminates
 * orphaned comments after a module is deletd.
 *
 * @return list of all modules used
 */
function EZComments_adminapi_getUsedModules()
{
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
    }

    $pntable = &pnDBGetTables();

    $table  = $pntable['EZComments'];
    $column = $pntable['EZComments_column'];

    // TODO Port to DBUtil
    $sql = "SELECT    $column[modname]
            FROM      $table
            GROUP BY  $column[modname]";

    $result = DBUtil::executeSQL($sql);

    if ($result == false) {
        return false;
    }

    $mods = array();
    for (; !$result->EOF; $result->MoveNext()) {
        list($mods[]) = $result->fields;
    }
    $result->Close();

    return $mods;
}

/**
 * EZComments_adminapi_deleteall()
 *
 * Delete all comments for a given module. Used to clean
 * up orphaned comments.
 *
 * @param $args[module] the module for which to delete for
 * @return boolean sucess status
 **/
function EZComments_adminapi_deleteall($args)
{
      // Security and argument check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
    }

    if (!isset($args['module'])) {
        return false;
    }

    // get tables
    $pntable = pnDBGetTables();
    $column  = &$pntable['EZComments_column'];
    // construct where clause and delete...
    $where   = "WHERE $column[modname] = '$args[module]'";

    return DBUtil::deleteWhere('EZComments',$where);
}

/**
 * EZComments_adminapi_deletebyitem()
 *
 * Delete all comments for a given item. Used to clean
 * up orphaned comments.
 *
 * @author Timo (Numerobis)
 * @since 0.3
 * @param $args['mod']             string    the module for which to delete for
 * @param $args['objectid']     int        the module for which to delete for
 * @return boolean sucess status
 **/
function EZComments_adminapi_deletebyitem($args)
{
    if (!isset($args['objectid'])) {
        return false;
    }

    if ($args['objectid'] <= 0) {
        return false;
    }

    $args['mod'] = isset($args['mod']) ? $args['mod'] : pnModGetName();

    // Security check
    $res = pnModAPIFunc('EZComments', 'user', 'checkPermission',
                        array('module'   => $args['mod'],
                              'objectid' => $args['objectid'],
                              'level'    => ACCESS_DELETE));

    if (!$res) {
        return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
    }

    // get db table and column for where statement
    $pntable = &pnDBGetTables();
    $column  = $pntable['EZComments_column'];

    $mod      = DataUtil::formatForStore($args['mod']);
    $objectid = DataUtil::formatForStore($args['objectid']);
    $where    = "$column[modname] = '$mod' AND $column[objectid] = '$objectid'";

    return DBUtil::deleteWhere('EZComments', $where);
}

/**
 * delete an item
 *
 * @param $args['id']  ID of the item
 * @return bool true on success, false on failure
 */
function EZComments_adminapi_delete($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Argument check
    if (!isset($args['id']) || !is_numeric($args['id'])) {
        return LogUtil::registerArgsError();
    }

    // The user API function is called.
    $item = pnModAPIFunc('EZComments', 'user', 'get', array('id' => $args['id']));

    if (!$item) {
        return LogUtil::registerError(__('No such item found.', $dom));
    }

    // Security check
    $securityCheck = pnModAPIFunc('EZComments', 'user', 'checkPermission',
                                  array('module'    => '',
                                        'objectid'  => '',
                                        'commentid' => $args['id'],
                                        'level'     => ACCESS_DELETE));
    if (!$securityCheck) {
        return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
    }

    // Check for an error with the database code
    if (!DBUtil::deleteObjectByID('EZComments', (int)$args['id'])) {
        return LogUtil::registerError(__('Error! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $args['id'], array('module' => 'EZComments'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * update an item
 *
 * @param    $args['id'] the ID of the item
 * @param    $args['subject']  the new subject of the item
 * @param    $args['comment'] the new text of the item
 * @return   bool true on success, false on failure
 */
function EZComments_adminapi_update($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Argument check
    if ((!isset($args['subject'])) ||
        (!isset($args['comment'])) ||
        (isset($args['id']) && !is_numeric($args['id'])) ||
        (isset($args['status']) && !is_numeric($args['status']))) {
        return LogUtil::registerArgsError();
    }

    // optional arguments
    if (!isset($args['anonname']))    $args['anonname'] = '';
    if (!isset($args['anonmail']))    $args['anonmail'] = '';
    if (!isset($args['anonwebsite'])) $args['anonwebsite'] = '';

    // Get the item
    $item = pnModAPIFunc('EZComments', 'user', 'get', array('id' => $args['id']));

    if (!$item) {
        return LogUtil::registerError(__('No such comment found.', $dom));
    }

    // Security check.
    $securityCheck = pnModAPIFunc('EZComments', 'user', 'checkPermission',
                                  array('module'    => '',
                                        'objectid'  => '',
                                        'commentid' => (int)$args['id'],
                                        'level'     => ACCESS_EDIT));

    if (!$securityCheck) {
        return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
    }

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if (!DBUtil::updateObject($args, 'EZComments')) {
        return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
    }

    // Let any hooks know that we have updated an item.
    pnModCallHooks('item', 'update', $args['id'], array('module' => 'EZComments'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * clean up comments for a removed module
 *
 * @param $args['extrainfo']   array extrainfo array
 * @return array extrainfo array
 */
function EZComments_adminapi_deletemodule($args)
{
    // optional arguments
    if (!isset($args['extrainfo'])) {
        $args['extrainfo'] = array();
    }

    // When called via hooks, the module name may be empty, so we get it from
    // the current module
    $mod = (isset($args['extrainfo']['module']) && !empty($args['extrainfo']['module'])) ? $args['extrainfo']['module'] : pnModGetName();

    // Database information
    $pntable = pnDBGetTables();
    $columns = &$pntable['EZComments_column'];

    // Get items
    $where = "WHERE $columns[modname] = '" . DataUtil::formatForStore($mod) . "'";

    return DBUtil::deleteWhere('EZComments', $where);
}

/**
 * delete an item
 *
 * @param $args['purgerejected'] Purge all rejected comments
 * @param $args['purgepending']  Purge all pending comments
 * @return bool true on success, false on failure
 */
function EZComments_adminapi_purge($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Get arguments from argument array
    extract($args);

    // Argument check
    if (!isset($purgerejected) && !isset($purgepending)) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', "::", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
    }

    // Get datbase setup
    $pntable = pnDBGetTables();
    $column  = &$pntable['EZComments_column'];

    if ((bool)$purgerejected) {
        $where = "WHERE $column[status] = '2'";
        if (!DBUtil::deleteWhere('EZComments', $where)) {
            return LogUtil::registerError(__('Error! Deletion attempt failed.', $dom));
        }
    }

    if ((bool)$purgepending) {
        $where = "WHERE $column[status] = '1'";
        if (!DBUtil::deleteWhere('EZComments', $where)) {
            return LogUtil::registerError(__('Error! Deletion attempt failed.', $dom));
        }
    }

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * update an item status
 *
 * @param $args['id'] the ID of the item
 * @param $args['status']  the new status of the item
 * @return bool true on success, false on failure
 */
function EZComments_adminapi_updatestatus($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // get arguments
    $id      = $args['id'];
    $status  = $args['status'];

    // Argument check
    if (isset($id) && !is_numeric($id) && isset($status) && !is_numeric($status)) {
        return LogUtil::registerArgsError();
    }

    // Get the comment
    $item = pnModAPIFunc('EZComments', 'user', 'get', array('id' => $id));

    if (!$item) {
        return LogUtil::registerError(__('No such item found.', $dom));
    }

    // Security check.
    $securityCheck = pnModAPIFunc('EZComments', 'user', 'checkPermission',
                                  array('module'    => '',
                                        'objectid'  => '',
                                        'commentid' => $id,
                                        'level'     => ACCESS_EDIT));

    if (!$securityCheck) {
        return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
    }

    // Update item and store item
    $item['status'] = $args['status'];
    if (DBUtil::updateObject($item, 'EZComments')) {
        // Let any hooks know that we have updated an item.
        pnModCallHooks('item', 'update', $id, array('module' => 'EZComments'));
        return true;
    }

    return false;
}

/**
 * count items
 *
 * maintained for backwards compatability
 * simply passes parameters onto the user api
 */
function ezcomments_adminapi_countitems($args)
{
    return pnModAPIFunc('EZComments', 'user', 'countitems', $args);
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function EZComments_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    $links = array();

    if (SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('EZComments', 'admin'),                 'text' => __('View comments', $dom));
        $links[] = array('url' => pnModURL('EZComments', 'admin', 'cleanup'),      'text' => __('Delete orphaned comments', $dom));
        $links[] = array('url' => pnModURL('EZComments', 'admin', 'migrate'),      'text' => __('Migrate comments', $dom));
        $links[] = array('url' => pnModURL('EZComments', 'admin', 'purge'),        'text' => __('Purge comments', $dom), 'linebreak' => true);
        $links[] = array('url' => pnModURL('EZComments', 'admin', 'stats'),        'text' => __('Comment statistics', $dom));
        $links[] = array('url' => pnModURL('EZComments', 'admin', 'applyrules'),   'text' => __('Re-apply moderation rules', $dom));
        $links[] = array('url' => pnModURL('EZComments', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));
    }

    return $links;
}
