<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 334 2009-11-09 05:51:54Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Feeds
 */

/**
 * create a new RSS item
 * @param $args['feedname'] name of the item
 * @param $args['number'] number of the item
 * @return mixed RSS item ID on success, false on failure
 */
function Feeds_adminapi_create($args)
{
    $dom = ZLanguage::getModuleDomain('Feeds');

    // Argument check
    if (!isset($args['name']) || !isset($args['url'])) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('Feeds::Item', "$args[name]::", ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    // check for maximum length to avoid cutting off URLs
    if (strlen($args['url'] > 255)) {
        return LogUtil::registerError(__('The provided URL is too long (200 chars max.).', $dom));
    }

    // Check for a protocol Magpie RSS (more exactly Snoopy) can handle.
    $url_parts = parse_url($args['url']);
    if (!isset($url_parts['scheme']) || ($url_parts['scheme'] != 'http' && $url_parts['scheme'] != 'https')) {
        return LogUtil::registerError(__('Invalid protocol selected. Only http and https are allowed.', $dom));
    }

    // define the permalink title if not present
    if (!isset($args['urltitle']) || empty($args['urltitle'])) {
        $args['urltitle'] = DataUtil::formatPermalink($args['name']);
    }

    if (!DBUtil::insertObject($args, 'feeds', 'fid')) {
        return LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
    }

    // Let any hooks know that we have created a new item.
    pnModCallHooks('item', 'create', $args['fid'], array('module' => 'Feeds'));

    // Return the id of the newly created item to the calling process
    return $args['fid'];
}

/**
 * delete a RSS item
 * @param $args['fid'] ID of the item
 * @return bool true on success, false on failure
 */
function Feeds_adminapi_delete($args)
{
    $dom = ZLanguage::getModuleDomain('Feeds');

    // Argument check
    if (!isset($args['fid']) || !is_numeric($args['fid'])) {
        return LogUtil::registerArgsError();
    }

    // Get the feed
    $item = pnModAPIFunc('Feeds', 'user', 'get', array('fid' => $args['fid']));

    if (!$item) {
        return LogUtil::registerError(__('No such Feed found.', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Feeds::Item', "$item[name]::$args[fid]", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::deleteObjectByID('feeds', $args['fid'], 'fid')) {
        return LogUtil::registerError(__('Error! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item
    pnModCallHooks('item', 'delete', $args['fid'], array('module' => 'Feeds'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * update a RSS item
 * @param $args['fid'] the ID of the item
 * @param $args['feedname'] the new name of the item
 * @param $args['number'] the new number of the item
 */
function Feeds_adminapi_update($args)
{
    $dom = ZLanguage::getModuleDomain('Feeds');

    // Argument check
    if (!isset($args['fid']) ||
        !isset($args['name']) ||
        !isset($args['url'])) {
        return LogUtil::registerArgsError();
    }

    // Get the existing feed
    $item = pnModAPIFunc('Feeds', 'user', 'get', array('fid' => $args['fid']));

    if (!$item) {
        return LogUtil::registerError(__('No such Feed found.', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Feeds::Item', "$item[name]::$args[fid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }
    if (!SecurityUtil::checkPermission('Feeds::Item', "$args[name]::$args[fid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // check for maximum length to avoid cutting off URLs
    if (strlen($args['url'] > 200)) {
        return LogUtil::registerError(__('The provided URL is too long (200 chars max.).', $dom));
    }

    // Check for a protocol Magpie RSS (more exactly Snoopy) can handle.
    $url_parts = parse_url($args['url']);
    if ($url_parts['scheme'] != 'http' && $url_parts['scheme'] != 'https') {
        return LogUtil::registerError(__('Invalid protocol selected. Only http and https are allowed.', $dom));
    }

    // define the permalink title if not present
    if (!isset($args['urltitle']) || empty($args['urltitle'])) {
        $args['urltitle'] = DataUtil::formatPermalink($args['name']);
    }

    if (!DBUtil::updateObject($args, 'feeds', '', 'fid')) {
        return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
    }

    // Let any hooks know that we have updated an item.
    pnModCallHooks('item', 'update', $args['fid'], array('module' => 'Feeds'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * Purge the permalink fields in the Feeds table
 * @author Mateo Tibaquira
 * @return bool true on success, false on failure
 */
function Feeds_adminapi_purgepermalinks($args)
{
    $dom = ZLanguage::getModuleDomain('Feeds');

    // Security check
    if (!SecurityUtil::checkPermission('Feeds::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // disable categorization to do this (if enabled)
    $catenabled = pnModGetVar('Feeds', 'enablecategorization');
    if ($catenabled) {
        pnModSetVar('Feeds', 'enablecategorization', false);
        pnModDBInfoLoad('Feeds', 'Feeds', true);
    }

    // get all the ID and permalink of the table
    $data = DBUtil::selectObjectArray('feeds', '', '', -1, -1, 'fid', null, null, array('fid', 'urltitle'));

    // loop the data searching for non equal permalinks
    $perma = '';
    foreach (array_keys($data) as $fid) {
        $perma = strtolower(DataUtil::formatPermalink($data[$fid]['urltitle']));
        if ($data[$fid]['urltitle'] != $perma) {
            $data[$fid]['urltitle'] = $perma;
        } else {
            unset($data[$fid]);
        }
    }

    // restore the categorization if was enabled
    if ($catenabled) {
        pnModSetVar('Feeds', 'enablecategorization', true);
    }

    if (empty($data)) {
        return true;
    // store the modified permalinks
    } elseif (DBUtil::updateObjectArray($data, 'feeds', 'fid')) {
        // Let the calling process know that we have finished successfully
        return true;
    } else {
        return false;
    }
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function Feeds_adminapi_getlinks()
{
    $links = array();

    $dom = ZLanguage::getModuleDomain('Feeds');

    if (SecurityUtil::checkPermission('Feeds::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('Feeds', 'admin', 'view'), 'text' => __('View Feeds', $dom));
    }
    if (SecurityUtil::checkPermission('Feeds::', '::', ACCESS_ADD)) {
        $links[] = array('url' => pnModURL('Feeds', 'admin', 'new'), 'text' => __('Create a Feed', $dom));
    }
    if (SecurityUtil::checkPermission('Feeds::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Feeds', 'admin', 'view', array('purge' => 1)), 'text' => __('Purge PermaLinks', $dom));
        $links[] = array('url' => pnModURL('Feeds', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));
    }

    return $links;
}
