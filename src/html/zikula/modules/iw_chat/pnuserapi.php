<?php
/**
 * Get the active rooms where the user is allowed to access
 * @author:	Fèlix Casanellas (fcasanel@xtec.cat)
 * @param:	Identity of the forum
 * @return:	An array with the rooms information
*/
function iw_chat_userapi_getRooms($args)
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_chat::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	$all_rooms = pnModAPIFunc('iw_chat','user','getAllRooms');
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$user_groups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv' => $sv, 'uid' => $uid));
	$rooms = array();
	
	foreach ($user_groups as $group){
		foreach ($all_rooms as $room){
			if (!in_array($room['rid'], $rooms)){
				if ((in_array($group['id'],explode('$',$room['groups']))) && ($room['active'] == '1')) $rooms[] = $room['rid'];
			}
		}
	}
		
	// Return the rooms
	return $rooms;
}

/**
 * Gets all the forums created
 * @author:	Fèlix Casanellas (fcasanel@xtec.cat)
 * @return:	And array with the items information
*/
function iw_chat_userapi_getAllRooms($args)
{
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'REQUEST');
	$dom = ZLanguage::getModuleDomain('iw_chat');
	
	// Security check
    if (!SecurityUtil::checkPermission( 'iw_chat::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

	if ($rid) {
		// Only one room
		$pntable = pnDBGetTables();
		$c = $pntable['iw_chat_rooms_column'];
		$where = "$c[rid] = $rid";
		$items = DBUtil::selectObjectArray('iw_chat_rooms', $where);
	} else {
		// All rooms
		$items = DBUtil::selectObjectArray('iw_chat_rooms');
	}
	
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}
