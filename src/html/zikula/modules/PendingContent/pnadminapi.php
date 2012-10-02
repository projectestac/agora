<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 26499 2009-09-02 12:34:37Z teb $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage PendingContent
 */

/**
 * create a new pending item
 * @param $args['name'] name of the item
 * @param $args['url'] url of the item
 * @param $args['sql'] sql of the item
 * @return int pending item ID on success, false on failure
 */
function pendingcontent_adminapi_create($args)
{
    // get translation domain for this module
    $dom = ZLanguage::getModuleDomain('PendingContent');

    // Argument check
    if ((!isset($args['name'])) ||
        (!isset($args['url'])) ||
        (!isset($args['sql']))) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('PendingContent::Item', "$args[name]::", ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    $item = array('name' => $args['name'], 'url' => $args['url'], 'sql' => $args['sql']);

    if (!DBUtil::insertObject($item, 'pendingcontent', 'pid')) {
        return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
    }

    // Let any hooks know that we have created a new item
    pnModCallHooks('item', 'create', $item['pid'], 'pid');

    // Return the id of the newly created item to the calling process
    return $item['pid'];
}

/**
 * delete a pending item
 * @param $args['pid'] ID of the item
 * @return bool true on success, false on failure
 */
function pendingcontent_adminapi_delete($args)
{
    // get translation domain for this module
    $dom = ZLanguage::getModuleDomain('PendingContent');

    // Argument check
    if (!isset($args['pid'])) {
        return LogUtil::registerArgsError();
    }

    // Get the item
    $item = pnModAPIFunc('PendingContent', 'user', 'get', array('pid' => $args['pid']));
    if ($item == false) {
        return LogUtil::registerError (__('Element not found', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('PendingContent::Item', "$item[name]::$args[pid]", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::deleteObjectByID('pendingcontent', $args['pid'], 'pid')) {
        return LogUtil::registerError (__('Error! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $args['pid'], '');

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * update a pending item
 * @param $args['pid'] the ID of the item
 * @param $args['name'] the new name of the item
 * @param $args['number'] the new number of the item
 */
function pendingcontent_adminapi_update($args)
{
    // get translation domain for this module
    $dom = ZLanguage::getModuleDomain('PendingContent');

    // Argument check
    if ((!isset($args['pid'])) ||
        (!isset($args['name'])) ||
        (!isset($args['sql'])) ||
        (!isset($args['url']))) {
        return LogUtil::registerArgsError();
    }

    // Get the item
    $item = pnModAPIFunc('PendingContent', 'user', 'get', array('pid' => $args['pid']));
    if ($item == false) {
        return LogUtil::registerError (__('Element not found', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('PendingContent::Item', "$item[name]::$args[pid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }
    if (!SecurityUtil::checkPermission('PendingContent::Item', "$args[name]::$args[pid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    $item = array('pid' => $args['pid'], 'name' => $args['name'], 'url' => $args['url'], 'sql' => $args['sql']);

    if (!DBUtil::updateObject($item, 'pendingcontent', '', 'pid')) {
        return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
    }

    return true;
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function pendingcontent_adminapi_getlinks()
{
    // get transation domain
    $dom = ZLanguage::getModuleDomain('PendingContent');

    $links = array();

    if (SecurityUtil::checkPermission('PendingContent::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('PendingContent', 'admin', 'view'), 'text' => __('Show all elements', $dom));
    }
    if (SecurityUtil::checkPermission('PendingContent::', '::', ACCESS_ADD)) {
        $links[] = array('url' => pnModURL('PendingContent', 'admin', 'new'), 'text' => __('Create element', $dom));
    }
    if (SecurityUtil::checkPermission('PendingContent::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('PendingContent', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));
    }

    return $links;
}
