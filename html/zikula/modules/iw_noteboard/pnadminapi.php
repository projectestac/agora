<?php
/**
 * Create a new topic
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	array with the topic information
 * @return:	identity of the new record created or false if error
*/
function iw_noteboard_adminapi_crear($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
    	$nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');
    	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
    	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($nomtema)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	// Optional argument
	if (!isset($descriu)) {
		$descriu = '';
	}

	$item = array('nomtema' => $nomtema,
			'descriu' => $descriu,
			'grup' => $grup);

	if (!DBUtil::insertObject($item, 'iw_noteboard_topics', 'tid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Return the id of the newly created item to the calling process
	return $item['tid'];
}

/**
 * Delete a topic from the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the topic
 * @return:	true if success and false if fails
*/
function iw_noteboard_adminapi_esborra($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
    	$tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Argument check 
	if (!isset($tid) || !is_numeric($tid)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	// Get the item
	$item =  pnModAPIFunc('iw_noteboard','user','gettema',array('tid' => $tid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	if (!DBUtil::deleteObjectByID('iw_noteboard_topics', $tid, 'tid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_noteboard');
	$pnRender->clear_cache(null, $tid);

	return true;
}

/**
 * Update a topic from the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the topic and the information of the topic
 * @return:	true if success and false if fails
*/
function iw_noteboard_adminapi_modificar($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
    	$tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');
    	$nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');
    	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
    	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($tid) ||  !isset($nomtema)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	// Get the item
	$item =  pnModAPIFunc('iw_noteboard','user','gettema',array('tid' => $tid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	$items = array('nomtema' => $nomtema,
			'descriu' => $descriu,
			'grup' => $grup);

	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_topics_column'];
	$where = "$c[tid]=$tid";

	if (!DBUTil::updateObject ($items, 'iw_noteboard_topics', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * Create a new public shared link
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	array with the link information
 * @return:	identity of the new record created or false if error
*/
function iw_noteboard_adminapi_createShared($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
    	$url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
    	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($url)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	// Optional argument
	if (!isset($descriu)) {
		$descriu = '';
	}

	$item = array('url' => $url,
			'descriu' => $descriu);

	if (!DBUtil::insertObject($item, 'iw_noteboard_public', 'pid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Return the id of the newly created item to the calling process
	return $item['pid'];
}

/**
 * Delete a shared from the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the topic
 * @return:	true if success and false if fails
*/
function iw_noteboard_adminapi_delShared($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
    	$pid = FormUtil::getPassedValue('pid', isset($args['pid']) ? $args['pid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Argument check 
	if (!isset($pid) || !is_numeric($pid)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	// Get the item
	$item =  pnModAPIFunc('iw_noteboard','user','getShared',array('pid' => $pid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	if (!DBUtil::deleteObjectByID('iw_noteboard_public', $pid, 'pid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_noteboard');
	$pnRender -> clear_cache(null, $pid);

	return true;
}

/**
 * Update a topic from the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the topic and the information of the topic
 * @return:	true if success and false if fails
*/
function iw_noteboard_adminapi_editShared($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
    	$pid = FormUtil::getPassedValue('pid', isset($args['pid']) ? $args['pid'] : null, 'POST');
    	$url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
    	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($pid) ||  !isset($url)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	// Get the item
	$item =  pnModAPIFunc('iw_noteboard','user','getShared',array('pid' => $pid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	$items = array('url' => $url,
			'descriu' => $descriu);

	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_public_column'];
	$where = "$c[pid]=$pid";

	if (!DBUTil::updateObject ($items, 'iw_noteboard_public', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}
