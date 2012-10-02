<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */

/**
 * Create a new Ephemerids item
 * @author Mark West
 * @param 'did' the day of the emphererid
 * @param 'mid' the month of the emphererid
 * @param 'yid' the year of the emphererid
 * @param 'content' the ephmerid description
 * @param 'language' the language of the ephemerid
 * @return mixed Ephemerids item ID on success, false on failure
 */
function Ephemerids_adminapi_create($args)
{
    // get transation domain
    $dom = ZLanguage::getModuleDomain('Ephemerids');

    // Argument check
    if ((!isset($args['did'])) ||
        (!isset($args['mid'])) ||
        (!isset($args['yid'])) ||
        (!isset($args['content'])) ||
        (!isset($args['language']))) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    $item = array('did' => $args['did'],
                  'mid' => $args['mid'],
                  'yid' => $args['yid'],
                  'content' => $args['content'],
                  'language' => $args['language']);

    if (!DBUtil::insertObject($item, 'ephem', 'eid')) {
        return LogUtil::registerError(__('Error! Could not create the new ephemerid.', $dom));
    }

    // Let any hooks know that we have created a new item.
    pnModCallHooks('item', 'create', $item['eid'], array('module' => 'Ephemerids'));

    // Return the id of the newly created item to the calling process
    return $item['eid'];
}

/**
 * Delete a Ephemerids item
 * @author Mark West
 * @param 'eid' the id of the ephemerid
 * @return bool true on success, false on failure
 */
function Ephemerids_adminapi_delete($args)
{
    // get transation domain
    $dom = ZLanguage::getModuleDomain('Ephemerids');

    // Argument check
    if (!isset($args['eid']) || !is_numeric($args['eid'])) {
        return LogUtil::registerArgsError();
    }

    // The user API function is called.
    $item = pnModAPIFunc('Ephemerids', 'user', 'get', array('eid' => $args['eid']));

    if ($item == false) {
        return LogUtil::registerError(__('No such ephemerid found', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Ephemerids::', "$item[content]::$args[eid]", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::deleteObjectByID('ephem', $args['eid'], 'eid')) {
        return LogUtil::registerError(__('Error! Could not delete the ephemerid.', $dom));
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $args['eid'], array('module' => 'Ephemerids'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * Update a Ephemerids item
 * @author Mark West
 * @param $args['eid'] the ID of the item
 * @param $args['did'] the day of the ephemerid
 * @param $args['mid'] the month of the ephemerid
 * @param $args['yid'] the year of the ephemerid
 * @param $args['content'] the event description
 * @param $args['language'] the language of the item
 * @return bool true on update success, false on failiure
 */
function Ephemerids_adminapi_update($args)
{
    // get transation domain
    $dom = ZLanguage::getModuleDomain('Ephemerids');

    // Argument check
    if ((!isset($args['eid'])) ||
        (!isset($args['did'])) ||
        (!isset($args['mid'])) ||
        (!isset($args['yid'])) ||
        (!isset($args['content'])) ||
        (!isset($args['language']))) {
        return LogUtil::registerArgsError();
    }

    // The user API function is called.
    $item = pnModAPIFunc('Ephemerids', 'user', 'get', array('eid' => $args['eid']));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such ephemerid found', $dom));
    }

    if (!SecurityUtil::checkPermission('Ephemerids::', "::$args[eid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }
    if (!SecurityUtil::checkPermission('Ephemerids::', "::$args[eid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    $item = array('eid' => $args['eid'],
                  'did' => $args['did'],
                  'mid' => $args['mid'],
                  'yid' => $args['yid'],
                  'content' => $args['content'],
                  'language' => $args['language']);

    if (!DBUtil::updateObject($item, 'ephem', '', 'eid')) {
        return LogUtil::registerError(__('Error! Could not save your changes.', $dom));
    }

    // Let any hooks know that we have updated an item.
    pnModCallHooks('item', 'update', $args['eid'], array('module' => 'Ephemerids'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function ephemerids_adminapi_getlinks()
{
    // get transation domain
    $dom = ZLanguage::getModuleDomain('Ephemerids');

    $links = array();

    if (SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('Ephemerids', 'admin', 'view'), 'text' => __('Ephemerids list', $dom));
    }
    if (SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADD)) {
        $links[] = array('url' => pnModURL('Ephemerids', 'admin', 'new'), 'text' => __('Create new ephemerid', $dom));
    }
    if (SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Ephemerids', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));
    }

    return $links;
}
