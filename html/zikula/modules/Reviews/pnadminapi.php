<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 372 2009-12-05 20:29:56Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Reviews
 */

/**
 * delete a Reviews item
 *
 * @param $args['tid'] ID of the item
 * @return bool true on success, false on failure
 */
function Reviews_adminapi_delete($args)
{
    // Argument check
    if (!isset($args['id'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Reviews');

    // Get the review
    $item = pnModAPIFunc('Reviews', 'user', 'get', array('id' => $args['id']));

    if ($item == false) {
        return LogUtil::registerError(__('No such review found.', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Reviews::', "$item[title]::$item[id]", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::deleteObjectByID('reviews', $item['id'], 'id')) {
        return LogUtil::registerError(__('Error! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $item['id'], array('module' => 'Reviews'));

    return true;
}

/**
 * update a Reviews item
 *
 * @param $args['tid'] the ID of the item
 * @param $args['name'] the new name of the item
 * @param $args['number'] the new number of the item
 */
function Reviews_adminapi_update($args)
{
    // Argument check
    if ((!isset($args['id'])) ||
        (!isset($args['title'])) ||
        (!isset($args['text'])) ||
        (!isset($args['reviewer'])) ||
        (!isset($args['email']))) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Reviews');

    // Check review to update exists, and get information for
    // security check
    $item = pnModAPIFunc('Reviews', 'user', 'get', array('id' => $args['id']));

    if ($item == false) {
        return LogUtil::registerError(__('No such review found.', $dom));
    }

    // Security check 
    if (!SecurityUtil::checkPermission('Reviews::', "$item[title]::$args[id]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }
    if (!SecurityUtil::checkPermission('Reviews::', "$args[title]::$args[id]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // set some defaults
    if (!isset($args['language'])) {
        $args['language'] = '';
    }

    // define the permalink title if not present
    if (!isset($args['urltitle']) || empty($args['urltitle'])) {
        $args['urltitle'] = DataUtil::formatPermalink($args['title']);
    }

    if (!DBUtil::updateObject($args, 'reviews', '', 'id')) {
        return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
    }

    // Let any other modules know we have updated an item
    pnModCallHooks('item', 'update', $args['id'], array('module' => 'Reviews'));

    // The item has been modified, so we clear all cached pages of this item.
    $render = & pnRender::getInstance('Reviews');
    $render->clear_cache(null, $args['id']);

    return true;
}

/**
 * Purge the permalink fields in the Reviews table
 * @author Mateo Tibaquira
 * @return bool true on success, false on failure
 */
function Reviews_adminapi_purgepermalinks($args)
{
    // Security check
    if (!SecurityUtil::checkPermission('Reviews::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // disable categorization to do this (if enabled)
    $catenabled = pnModGetVar('Reviews', 'enablecategorization');
    if ($catenabled) {
        pnModSetVar('Reviews', 'enablecategorization', false);
        pnModDBInfoLoad('Reviews', 'Reviews', true);
    }

    // get all the ID and permalink of the table
    $data = DBUtil::selectObjectArray('reviews', '', '', -1, -1, 'id', null, null, array('id', 'urltitle'));

    // loop the data searching for non equal permalinks
    $perma = '';
    foreach (array_keys($data) as $id) {
        $perma = strtolower(DataUtil::formatPermalink($data[$id]['urltitle']));
        if ($data[$id]['urltitle'] != $perma) {
            $data[$id]['urltitle'] = $perma;
        } else {
            unset($data[$id]);
        }
    }

    // restore the categorization if was enabled
    if ($catenabled) {
        pnModSetVar('Reviews', 'enablecategorization', true);
    }

    if (empty($data)) {
        return true;
    // store the modified permalinks
    } elseif (DBUtil::updateObjectArray($data, 'reviews', 'id')) {
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
function Reviews_adminapi_getlinks()
{
    $links = array();

    $dom = ZLanguage::getModuleDomain('Reviews');

    if (SecurityUtil::checkPermission('Reviews::', '::', ACCESS_READ)) {
        $links[] = array('url'  => pnModURL('Reviews', 'admin', 'view'),
                         'text' => __('View reviews list', $dom));
    }
    if (SecurityUtil::checkPermission('Reviews::', '::', ACCESS_ADD)) {
        $links[] = array('url'  => pnModURL('Reviews', 'admin', 'new'),
                         'text' => __('Create a review', $dom));
    }
    if (SecurityUtil::checkPermission('Reviews::', '::', ACCESS_ADMIN)) {
        $links[] = array('url'  => pnModURL('Reviews', 'admin', 'view', array('purge' => 1)),
                         'text' => __('Purge permalinks', $dom));
        $links[] = array('url'  => pnModURL('Reviews', 'admin', 'modifyconfig'),
                         'text' => __('Settings', $dom));
    }

    return $links;
}
