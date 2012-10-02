<?php
/**
 * Get all the users
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the users
*/
function iw_main_userapi_getAllUsers($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$fromArray = FormUtil::getPassedValue('fromArray', isset($args['fromArray']) ? $args['fromArray'] : null, 'POST');
	$list = FormUtil::getPassedValue('list', isset($args['list']) ? $args['list'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	$pntable =& pnDBGetTables();
	$where = "";
	$c = $pntable['users_column'];
	if($fromArray != null && count($fromArray) > 0){
		foreach($fromArray as $f){
			$where .= " $c[uid] = $f[uid] OR";
		}
		$where = substr($where,0,-3);
	}
	if($list != null && strlen($list) > 0){
		$modArray = explode('$$',$list);
		$modArray = array_unique($modArray);
		foreach($modArray as $mod){
			$mod = str_replace('$','',$mod);
			if($mod != '' && is_numeric($mod)){
				$where .= " $c[uid] = " . $mod . " OR";
			}
		}
		$where = substr($where,0,-3);
	}
	// get the objects from the db
	$items = DBUtil::selectObjectArray('users', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get information from iw_users of all users
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the users
*/
function iw_main_userapi_getUsersExtraInfo($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$fromArray = FormUtil::getPassedValue('fromArray', isset($args['fromArray']) ? $args['fromArray'] : null, 'POST');
	$list = FormUtil::getPassedValue('list', isset($args['list']) ? $args['list'] : null, 'POST');
	$items = array();
	$pntable =& pnDBGetTables();
	$where = "";
	$c = $pntable['iw_users_column'];
	if($fromArray != null && count($fromArray) > 0){
		foreach($fromArray as $f){
			$where .= " $c[uid] = $f[uid] OR";
		}
		$where = substr($where,0,-3);
	}
	if($list != null && strlen($list) > 0){
		$modArray = explode('$$',$list);
		$modArray = array_unique($modArray);
		foreach($modArray as $mod){
			$mod = str_replace('$','',$mod);
			if($mod != '' && is_numeric($mod)){
				$where .= " $c[uid] = " . $mod . " OR";
			}
		}
		$where = substr($where,0,-3);
	}
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_users', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get an user
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the user
 * @return:	And array with the user information
*/
function iw_main_userapi_getUser($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	$items = array();
	$pntable =& pnDBGetTables();
	$c = $pntable['users_column'];
	$where = "$c[uid]=$uid";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('users', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get information from iw_users of an users
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the user
 * @return:	And array with the user information
*/
function iw_main_userapi_getUserExtraInfo($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$items = array();
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	$pntable =& pnDBGetTables();
	$c = $pntable['iw_users_column'];
	$where = "$c[uid]=$uid";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_users', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get all the groups
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the users
*/
function iw_main_userapi_getAllGroups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	$pntable =& pnDBGetTables();
	$c = $pntable['groups_column'];
	$orderby = "$c[name]";
	$items = array();
	// get the objects from the db
	$items = DBUtil::selectObjectArray('groups', '', $orderby);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	//print_r($items);
	// Return the items
	return $items;
}

/**
 * Get the members of a group
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the users
*/
function iw_main_userapi_getMembersGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	$myJoin = array();
	$myJoin[] = array('join_table' => 'users',
						'join_field' => array('uid'),
						'object_field_name' => array('uid'),
						'compare_field_table' => 'uid',
						'compare_field_join' => 'uid');
	$myJoin[] = array('join_table' => 'group_membership',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'uid',
						'compare_field_join' => 'uid');
	$pntables = pnDBGetTables();
	$ccolumn = $pntables['users_column'];
	$ocolumn = $pntables['group_membership_column'];
	$where = "b.$ocolumn[gid] = " . $gid;
   	$orderBy = "ORDER BY tbl.$ccolumn[uname]";
	$items = DBUtil::selectExpandedObjectArray('users', $myJoin, $where, $orderBy);
	return $items;
}

/**
 * Get all the groups
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the users
*/
function iw_main_userapi_getAllGroupsInfo($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	$items = array();
	// get the objects from the db
	$items = DBUtil::selectObjectArray('groups');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Check if a user is member of a group
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	True if the user is member and false otherwise
*/
function iw_main_userapi_isMember($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	if ($uid == null || !is_numeric($uid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Check if the user is member of the group
	if($gid != 0){
		$items = array();	
		$pntable =& pnDBGetTables();
		$c = $pntable['group_membership_column'];
		$where = "$c[uid]=" . $uid . " AND $c[gid]=" . $gid;
		// get the objects from the db
		$items = DBUtil::selectObjectArray('group_membership', $where);
		// Check for an error with the database code, and if so set an appropriate
		// error message and return
		if ($items === false) {
			return LogUtil::registerError (__('Error! Could not load items.', $dom));
		}
		$isMember = (count($items) > 0) ? true : false;
	}else{
		$isMember = true;
	}
	return $isMember;
}

/**
 * Get all the groups of a user
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the users
*/
function iw_main_userapi_getAllUserGroups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// argument needed
	if ($uid == null || !is_numeric($uid)) {
		return false;
	}
	$items = array();
	$pntable =& pnDBGetTables();
	$c = $pntable['group_membership_column'];
	$where = "$c[uid]=" . $uid;
	// get the objects from the db
	$items = DBUtil::selectObjectArray('group_membership', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false){
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

//***************************************************************************************
//
// API function used to work with the database
//
// All this functions are call from the users managment funcions
//
//***************************************************************************************

/**
 * Get an user variable associate with a module
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- module: module where the varible is used
		- name: name of the variable
		- uid: user id
		- sv: security value
 * @return:	The value of the variable if it is find
*/
function iw_main_userapi_userGetVar($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($uid == null ||	$module == null || $name == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable =& pnDBGetTables();
	$c = $pntable['iw_main_column'];
	$where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_main', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Check if an user variable exists
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- module: module where the varible is used
		- name: name of the variable
		- uid: user id
		- sv: security value
 * @return:	Thue if exists and false if not
*/
function iw_main_userapi_userVarExists($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($uid == null || $module == null || $name == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable =& pnDBGetTables();
	$c = $pntable['iw_main_column'];
	$where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name."'";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_main', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return true if the item exists or false if not
	$exists = (count($items) > 0) ? true : false;
	return $exists;
}

/**
 * Create an user variable associated with a module
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- module: module where the varible is used
		- name: name of the variable
		- lifetime: date of caducity of the variable
		- uid: user id
		- value: value for the variable
		- sv: security value
 * @return:	The id of the value created
*/
function iw_main_userapi_createUserVar($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : '', 'POST');
	$lifetime = FormUtil::getPassedValue('lifetime', isset($args['lifetime']) ? $args['lifetime'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($uid == null || $module == null || $name == null || $lifetime == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('uid' => $uid,
					'module' => $module,
					'name' => $name,
					'value' => $value,
					'lifetime' => $lifetime);
	if (!DBUtil::insertObject($item, 'iw_main')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return true;
}

/**
 * Update the field lifetime in users variables
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- module: module where the varible have to be deleted
		- name: name of the variable that have to be deleted (if name is .* all varibles of the user in the module are deleted)
		- uid: user id
		- sv: security value
 * @return:	True if success
*/
function iw_main_userapi_userUpdateGetVarTime($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($uid == null ||	$module == null || $name == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('lifetime' => time() + 24*60*60*pnModGetVar('iw_main', 'usersvarslife'),
					'nult' => 0);
	$pntable =& pnDBGetTables();
	$c = $pntable['iw_main_column'];
	$where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
	if (!DBUtil::updateObject($item, 'iw_main', $where, 'mid')) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
    // Let the calling process know that we have finished successfully
	return true;
}

/**
 * Update the field lifetime in users variables
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- module: module where the varible have to be deleted
		- name: name of the variable that have to be deleted (if name is .* all varibles of the user in the module are deleted)
		- uid: user id
		- sv: security value
 * @return:	True if success
*/
function iw_main_userapi_userUpdateNultVar($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($uid == null ||	$module == null || $name == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('nult' => 1);
	$pntable =& pnDBGetTables();
	$c = $pntable['iw_main_column'];
	$where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
/*
	if (!DBUtil::updateObject($item, 'iw_main', $where, 'mid')) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
*/
	//connect to database
	$connect = DBConnectionStack::init();
	if (!$connect){
		return false;
	}
	DBConnectionStack::popConnection();
	//$sql="UPDATE " . $GLOBALS['PNConfig']['System']['prefix'] . "_iw_main SET $c[nult]=1 WHERE ".$where;
	$sql="UPDATE " . $GLOBALS['PNConfig']['System']['prefix'] . "_iw_main SET iw_nult=1 WHERE " . $where;
	$rs = $connect->Execute($sql);
	if(!$rs){
		$connect->close();
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	$connect->close();
    // Let the calling process know that we have finished successfully
	return true;
}

/**
 * Update an user variable associate with a module
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- module: module where the varible is used
		- name: name of the variable
		- lifetime: date of caducity of the variable
		- uid: user id
		- value: value for the variable		
		- sv: security value
 * @return:	Thue if success
*/
function iw_main_userapi_updateUserVar($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');
	$lifetime = FormUtil::getPassedValue('lifetime', isset($args['lifetime']) ? $args['lifetime'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($uid == null || $module == null || $name == null || $lifetime == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('value' => $value,
					'lifetime' => $lifetime);
	$pntable =& pnDBGetTables();
	$c = $pntable['iw_main_column'];
	$where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
	if (!DBUtil::updateObject($item, 'iw_main', $where, 'mid')) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
   	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Delete the user variables that have been raised the lifetime value
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- sv: security value
 * @return:	Thue if success
*/
function iw_main_userapi_userDeleteOldVars($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	$now = time();
	$pntables = pnDBGetTables();
	$c = $pntables['iw_main_column'];
	$where    = "WHERE $c[lifetime] < '$now'";
	if (!DBUtil::deleteWhere('iw_main', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Delete all users variables of a module
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- module: module where the varible is used
		- name: name of the variable to delete (the value .* means all the variables)
		- sv: security value
 * @return:	Thue if success
*/
function iw_main_userapi_usersVarsDelModule($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($module == null || $name == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntables = pnDBGetTables();
	$c = $pntables['iw_main_column'];
	$where = ($name == '.*') ? "WHERE $c[module] = '" . $module . "'" : "WHERE $c[module] = '" . $module . "' AND $c[name]='" . $name . "'";
	if (!DBUtil::deleteWhere('iw_main', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Delete the users variables of a module for an user
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- uid: user id
		- module: module where the varible is used
		- name: name of the variable to delete (the value .* means all the variables)
		- sv: security value
 * @return:	Thue if success
*/
function iw_main_userapi_userDelVar($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
	$name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($module == null || $uid == null || $name == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntables = pnDBGetTables();
	$c = $pntables['iw_main_column'];
	$where = ($name == '.*') ? "WHERE $c[module] = '" . $module . "' AND $c[uid] = " . $uid : "WHERE $c[module] = '" . $module . "' AND $c[name] = '" . $name . "' AND $c[uid] = " . $uid;
	if (!DBUtil::deleteWhere('iw_main', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Delete all the variables for a user that are temporally. The variables that have got the parameter nult in the value 1
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the elements:
		- uid: user id
		- sv: security value
 * @return:	True if success and false if not
*/
function iw_main_userapi_regenDinamicVars ($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (__('You are not allowed to access to some information.', $dom));
	}
	// Argument check
	if ($uid == null){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntables = pnDBGetTables();
	$c = $pntables['iw_main_column'];
	$where = "WHERE $c[nult] = 1 AND $c[uid] = " . $uid;
	if (!DBUtil::deleteWhere('iw_main', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// Let the calling process know that we have finished successfully
	return true;
}
//***************************************************************************************
//
// END - API function used to work with the database
//
//***************************************************************************************