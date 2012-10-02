<?php
/**
 * Insert a new URL reference into the database
 *
 * @param    $args['ref']			Reference of the item
 * @param    $args['url']			URL website
 * @param    $args['description']	Reference description
 * @param    $args['scrolls']		The iframe show the scrolls
 										1	- Yes (auto)
										0	- No
 * @param    $args['width']			Width of the iframe
 * @param    $args['height']		Height of the iframe
 * @param    $args['widthunit']		Unit used in the width specified
 										%	- percentual
										px	- pixels
 * @return   mixed                  Reference ID on success, false on failure
 */

function iw_webbox_adminapi_create($args)
{
	$dom=ZLanguage::getModuleDomain('iw_webbox');
	// Optiona argument
	if (!isset($args['description'])) {$args['description'] = '';}

	// Check if args have arrived properly
	if (!isset($args['url'])||!isset($args['ref'])) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$args['scrolls'] = ($args['scrolls'] == 'on') ? '1':'0';
	
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_webbox::', '::', ACCESS_ADD)) {
		return LogUtil::registerPermissionError();
	}

	if (!DBUtil::insertObject($args, 'iw_webbox', 'pid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Let any hooks know that we have created a new item
	pnModCallHooks('item', 'create', $args['pid'], array('module' => 'iw_webbox'));

	return $args['pid'];
}

/**
 * delete a reference
 *
 * @param    $args['pid']   ID of the item
 * @return   bool           true on success, false on failure
 */
function iw_webbox_adminapi_delete($args)
{
    $dom=ZLanguage::getModuleDomain('iw_webbox');
	// Argument check 
    if (!isset($args['pid']) || !is_numeric($args['pid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // Get the current faq
    $item = pnModAPIFunc('iw_webbox', 'user', 'get', array('pid' => $args['pid']));

    if (!$item) {
        return LogUtil::registerError (__('No such item found.', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission( 'iw_webbox::', "$args[pid]::", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::deleteObjectByID('iw_webbox', $args['pid'], 'pid')) {
        return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item
    pnModCallHooks('item', 'delete', $args['pid'], array('module' => 'iw_webbox'));

    // The item has been deleted, so we clear all cached pages of this item.
    $pnRender = pnRender::getInstance('iw_webbox');
    $pnRender->clear_cache(null, $args['pid']);

    return true;
}

/**
 * Modify a reference from database
 *
 * @param    $args['pid']			Id of the reference that has to be modified
 * @param    $args['ref']			Reference of the item
 * @param    $args['url']			URL website
 * @param    $args['description']	Reference description
 * @param    $args['scrolls']		The iframe show the scrolls
 										1	- Yes (auto)
										0	- No
 * @param    $args['width']			Width of the iframe
 * @param    $args['height']		Height of the iframe
 * @param    $args['widthunit']		Unit used in the width specified
 										%	- percentual
										px	- pixels
 * @return   mixed                  FAQ ID on success, false on failure
 */
function iw_webbox_adminapi_update($args)
{
    $dom=ZLanguage::getModuleDomain('iw_webbox');
	// Argument check
    if (!isset($args['ref']) || !isset($args['url'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

	$args['scrolls'] = ($args['scrolls'] == 'on') ? '1':'0';

    // Get the current faq
    $item = pnModAPIFunc('iw_webbox', 'user', 'get', array('pid' => $args['pid']));

    if (!$item) {
        return LogUtil::registerError (__('No such item found.', $dom));
    }

    // Security check.
    if (!SecurityUtil::checkPermission( 'iw_webbox::', "$args[pid]::", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::updateObject($args, 'iw_webbox', '', 'pid')) {
        return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
    }

    // The item has been modified, so we clear all cached pages of this item.
    $pnRender = pnRender::getInstance('iw_webbox');
    $pnRender->clear_cache(null, $args['pid']);

    // Let any hooks know that we have updated an item
    pnModCallHooks('item', 'update', $args['pid'], array('module' => 'iw_webbox'));

    return true;
}
