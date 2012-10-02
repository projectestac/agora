<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 27363 2009-11-02 16:40:08Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin_Messages
 */

/**
 * create a new Admin_Messages item
 * @author Mark West
 * @param string $args['title'] title of the admin message
 * @param string $args['content'] text of the admin message
 * @param string $args['language'] the language of the message
 * @param int $args['active'] activation status of the message
 * @param int $args['expire'] expiry date of the message
 * @param int $args['view'] who can view the message
 * @return mixed Admin_Messages item ID on success, false on failure
 */
function Admin_Messages_adminapi_create($args)
{
    // Argument check
    if (!isset($args['title'])    ||
        !isset($args['content'])  ||
        !isset($args['language']) ||
        !isset($args['active'])   ||
        !isset($args['expire'])   ||
        !isset($args['view'])) {
        return LogUtil::registerArgsError();
    }
    if (empty($args['title']) && empty($args['content'])) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError ();
    }

    // create the item array
    $item = array('title' => $args['title'], 'content' => $args['content'],
                  'language' => $args['language'], 'active' => $args['active'], 'view' => $args['view']);

    // add some additional modified values
    if ($args['expire'] < 0) {
        $args['expire'] = 0;
    }
    $item['expire'] = $args['expire'] * 86400; // turns days into seconds
    $item['date'] = time();

    if (!DBUtil::insertObject($item, 'message', 'mid')) {
        return LogUtil::registerError(__('Error! Could not create the new item.'));
    }

    // Let any hooks know that we have created a new item.
    pnModCallHooks('item', 'create', $item['mid'], array('module' => 'Admin_Messages'));

    // Return the id of the newly created item to the calling process
    return $item['mid'];
}

/**
 * delete an Admin_Messages item
 * @author Mark West
 * @param int $args['mid'] ID of the admin message to delete
 * @return bool true on success, false on failure
 */
function Admin_Messages_adminapi_delete($args)
{
    // Argument check
    if (!isset($args['mid'])) {
        return LogUtil::registerArgsError();
    }

    // Get the existing admin message
    $item = pnModAPIFunc('Admin_Messages', 'user', 'get', array('mid' => $args['mid']));

    if ($item == false) {
        return LogUtil::registerError(__('Sorry! No such item found.'));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', "$item[title]::$args[mid]", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError ();
    }

    if (!DBUtil::deleteObjectByID('message', $args['mid'], 'mid')) {
        return LogUtil::registerError(__('Error! Could not perform the deletion.'));
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $args['mid'], array('module' => 'Admin_Messages'));

    // The item has been modified, so we clear all cached pages of this item.
    $pnRender = & pnRender::getInstance('Admin_Messages');
    $pnRender->clear_cache(null, pnUserGetVar('uid'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * update a Admin_Messages item
 * @author Mark West
 * @param int $args['mid'] the ID of the item
 * @param sting $args['title'] title of the admin message
 * @param string $args['content'] text of the admin message
 * @param string $args['language'] the language of the message
 * @param int $args['active'] activation status of the message
 * @param int $args['expire'] expiry date of the message
 * @param int $args['view'] who can view the message
 * @return bool true if successful, false otherwise
 */
function Admin_Messages_adminapi_update($args)
{
    // Argument check
    if (!isset($args['mid'])            ||
        !isset($args['title'])          ||
        !isset($args['content'])        ||
        !isset($args['language'])       ||
        !isset($args['active'])         ||
        !isset($args['expire'])         ||
        !isset($args['oldtime'])        ||
        !isset($args['changestartday']) ||
        !isset($args['view'])) {
        return LogUtil::registerArgsError();
    }

    // Get the existing admin message
    $item = pnModAPIFunc('Admin_Messages', 'user', 'get', array('mid' => $args['mid']));

    if ($item == false) {
        return LogUtil::registerError(__('Sorry! No such item found.'));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', "$item[title]::$args[mid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError ();
    }

    // check value of change start day to today and set time
    if ($args['changestartday'] == 1) {
        $time = time();
    } else {
        $time = $args['oldtime'];
    }

    // check for an invalid expiry
    if ($args['expire'] < 0) {
        $expire = 0;
    }

    // create the item array
    $item = array('mid' => $args['mid'], 'title' => $args['title'], 'content' => $args['content'],
                  'language' => $args['language'], 'active' => $args['active'], 'view' => $args['view']);

    // add some additional modified values
    $args['expire'] = $args['expire'] * 86400; // turns days into seconds
    $args['date'] = $time;

    if (!DBUtil::updateObject($args, 'message', '', 'mid')) {
        return LogUtil::registerError(__('Error! Could not save your changes.'));
    }

    // New hook functions
    pnModCallHooks('item', 'update', $args['mid'], array('module' => 'Admin_Messages'));

    // The item has been modified, so we clear all cached pages of this item.
    $pnRender = & pnRender::getInstance('Admin_Messages');
    $pnRender->clear_cache(null, pnUserGetVar('uid'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function admin_messages_adminapi_getlinks()
{
    $links = array();

    if (SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('Admin_Messages', 'admin', 'view'), 'text' => __('Messages list'));
    }
    if (SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_ADD)) {
        $links[] = array('url' => pnModURL('Admin_Messages', 'admin', 'new'), 'text' => __('Create new message'));
    }
    if (SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Admin_Messages', 'admin', 'modifyconfig'), 'text' => __('Settings'));
    }

    return $links;
}
