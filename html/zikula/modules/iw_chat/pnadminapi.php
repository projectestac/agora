<?php
/**
 * Update the xat information in the database
 * @author:   Fèlix Casanellas (fcasanel@xtec.cat)
 * @param:	forum identity and values
 * @return:	true if success and false otherwise
*/
function iw_chat_adminapi_update($args)
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'REQUEST');
	$room_name = FormUtil::getPassedValue('room_name', isset($args['room_name']) ? $args['room_name'] : null, 'REQUEST');
	$room_desc = FormUtil::getPassedValue('room_desc', isset($args['room_desc']) ? $args['room_desc'] : null, 'REQUEST');
	$active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'REQUEST');
	$groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'REQUEST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

    $item = array('room_name' => $room_name,
                  'room_desc' => $room_desc,
                  'active' => $active,
                  'groups' => $groups);

	if($rid == ''){
		// New room
		if (!DBUtil::insertObject($item, 'iw_chat_rooms')) {
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}
	}
	else{
		// Update of actual room
		$pntable = pnDBGetTables();
		$c = $pntable['iw_chat_rooms_column'];
		$where = "$c[rid] = $rid";
		if (!DBUTil::updateObject ($item, 'iw_chat_rooms', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}

	return true;
}

/**
 * Delete the forum and post in database
 * @author:   Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	forum identity
 * @return:	true if success and false otherwise
*/
function iw_chat_adminapi_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'REQUEST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$pntables = pnDBGetTables();
	$c = $pntables['iw_chat_rooms_column'];
	$where = "$c[rid]=$rid";
	if (!DBUtil::deleteWhere ('iw_chat_rooms', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	return true;
}