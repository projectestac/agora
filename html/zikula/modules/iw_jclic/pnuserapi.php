<?php
/**
 * Get the properties of the activities that the user has assigned to other users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	An array with the activity proporties
*/
function iw_jclic_userapi_getAllActivitiesAssigned()
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_column'];

	$orderby = "$c[name]";
	$where = "$c[user]=".pnUserGetVar('uid');

	$items = DBUtil::selectObjectArray('iw_jclic', $where, $orderby, '-1', '-1', 'jid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Get the properties of the activities that a user have got assigned
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	An array with the activity proporties
*/
function iw_jclic_userapi_getAllActivities($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//get all the groups of the user
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userGroups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('uid' => $uid,
																			'sv' => $sv));

	$myJoin = array();

	$myJoin[] = array('join_table' => 'iw_jclic',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'jid',
						'compare_field_join' => 'jid');
	$myJoin[] = array('join_table' => 'iw_jclic_groups',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'jid',
						'compare_field_join' => 'jid');

	$pntables = pnDBGetTables();

	$ocolumn   = $pntables['iw_jclic_column'];
	$lcolumn   = $pntables['iw_jclic_groups_column'];

	$where = "(";
	$orderby = "a.$ocolumn[date]";

	foreach($userGroups as $group){
		$where .= "b.$lcolumn[group_id]=".$group['id'].' OR ';
	}

	$where = substr($where,0,-3);
	
	$where .= ") AND a.$ocolumn[active] = 1";
	
	$items = DBUtil::selectExpandedObjectArray('iw_jclic', $myJoin, $where, $orderby, '-1', '-1', 'jid');

	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// get the user activities that the user has made independently of the groups.
	// In case the activity groups changes but the user have made an activity he/she can accÃ©s to the activity information
	
	// marge the items in the two requests
	

	// Return the items
	return $items;
}

/**
 * Get the properties of an activity
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the activity
 * @return:	An array with the activity proporties
*/
function iw_jclic_userapi_get($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	
	$items = DBUtil::selectObjectByID('iw_jclic', $jid, 'jid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Create a group assignament for a jclic activity
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the group
 * @return:	add the group into the assignament tables
*/
function iw_jclic_userapi_create($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
	$groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	$items['user'] = pnUserGetVar('uid');
	$items['date'] = time();
	$items['extended'] = '$';

	if (!DBUtil::insertObject($items, 'iw_jclic', 'jid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	
	if($groups != ''){
		$groups = explode('$',$groups);
		//add new groups
		foreach($groups as $group){
			//check if group is in $groupsAssigned array
			if($group != '' && !array_key_exists($group,$groupsAssigned)){
				$items = array('jid' => $items['jid'],
								'group_id' => $group);
			
				if (!DBUtil::insertObject($items, 'iw_jclic_groups', 'jgid')) {
					return LogUtil::registerError (__('There was an error creating the assignment',$dom));
				}
			}
		}
	}
	
	// Return the id of the newly created item to the calling process
	return $items['jid'];
}

/**
 * Assign an activity to the specified groups if them haven't got it assigned yet
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   string with the groups and Id of the assigment
 * @return:	Create or delete the assignments to groups
*/
function iw_jclic_userapi_editGroups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	$groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}
	
	//get the groups that have this activity assigned
	$groupsAssigned = pnModAPIFunc('iw_jclic', 'user', 'getGroups', array('jid' => $jid));
	
	$groups = explode('$',$groups);

	if(empty($groupsAssigned) && empty($groups)){
		return true;
	}

	//add new groups
	foreach($groups as $group){
		//check if group is in $groupsAssigned array
		if($group != '' && !array_key_exists($group,$groupsAssigned)){
			if(!pnModAPIFunc('iw_jclic', 'user', 'addAssingGroup', array('jid' => $jid,
																		'group' => $group))){
				return LogUtil::registerError (__('There was an error creating the assignment',$dom));
			}
		}
	}
	
	//delete not assigned groups
	foreach($groupsAssigned as $group){
		//check if group is in $groupsAssigned array
		if(!in_array($group['group_id'],$groups)){
			if(!pnModAPIFunc('iw_jclic', 'user', 'deleteAssingGroup', array('jid' => $jid,
																			'group' => $group['group_id']))){
				return LogUtil::registerError (__('There was an error creating the assignment',$dom));						
			}
		}
	}
	
	return true;
}

/**
 * Get the groups that have got this activity assigned
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the assigment
 * @return:	An array with the groups identities
*/
function iw_jclic_userapi_getGroups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_groups_column'];

	$orderby = "";
	$where = "$c[jid]=$jid";

	$items = DBUtil::selectObjectArray('iw_jclic_groups', $where, $orderby, '-1', '-1', 'group_id');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Add a group into the assignation
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   The activity identity and the group identity
 * @return:	True if success and false otherwise
*/
function iw_jclic_userapi_addAssingGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}
	
	$items = array('jid' => $jid,
					'group_id' => $group);

	if (!DBUtil::insertObject($items, 'iw_jclic_groups', 'jgid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	
	// Return the id of the newly created item to the calling process
	return $items['group_id'];
}

/**
 * Delete a group assignation
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   The activity identity and the group identity
 * @return:	True if success and false otherwise
*/
function iw_jclic_userapi_deleteAssingGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_groups_column'];
	$where = "$c[jid]=$jid AND $c[group_id] = $group";

	if (!DBUTil::deleteObject ($item, 'iw_jclic_groups', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	return true;
}

/**
 * Assign an activity to the specified groups if them haven't got it assigned yet
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   string with the groups and Id of the assigment
 * @return:	Create or delete the assignments to groups
*/
function iw_jclic_userapi_update($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
	if($jclic['user'] != pnUserGetVar('uid') && count($items) > 1){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_column'];
	
	$where = "$c[jid] = $jid";

	if (!DBUTil::updateObject ($items, 'iw_jclic', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * Create a new session for an user
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the group
 * @return:	add the group into the assignament tables
*/
function iw_jclic_userapi_createSession($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}


	if (!DBUtil::insertObject($items, 'iw_jclic_sessions', 'jsid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	
	// Return the id of the newly created item to the calling process
	return $items['jsid'];
}

/**
 * Create a user for the session
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the group
 * @return:	add the group into the assignament tables
*/
function iw_jclic_userapi_addActivity($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	if (!DBUtil::insertObject($items, 'iw_jclic_activities', 'jaid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	
	// Return the id of the newly created item to the calling process
	return $items['jaid'];
}

/**
 * Get jclic settings
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	the jclic setting needed to report activities
*/
function iw_jclic_userapi_getSettings()
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$items = DBUtil::selectObjectArray('iw_jclic_settings', '', '', '-1', '-1', 'jsid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Get user sessions for an activity
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:		activity identity
 * @return:	an array with the sessions information
*/
function iw_jclic_userapi_getSessions($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	
	if(!is_numeric($uid)){
		$uid = pnUserGetVar('uid');
	}
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

//CONTINUAR AQUÃ PER FER-HO MÃS SEGUR

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_sessions_column'];

	$orderby = "";
	$where = "$c[jclicid] = $jid AND $c[user_id]=$uid";

	$items = DBUtil::selectObjectArray('iw_jclic_sessions', $where, $orderby, '-1', '-1', 'jsid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}


/**
 * Get user activities for a session
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:		session identity
 * @return:	an array with the activities information
*/
function iw_jclic_userapi_getActivities($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$session_id = FormUtil::getPassedValue('session_id', isset($args['session_id']) ? $args['session_id'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if (session_id == null) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_activities_column'];

	$orderby = "";
	$where = "$c[session_id] = '$session_id'";

	$items = DBUtil::selectObjectArray('iw_jclic_activities', $where, $orderby, '-1', '-1', 'jaid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Create a user for the session
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the group
 * @return:	add the group into the assignament tables
*/
function iw_jclic_userapi_createUser($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$key = FormUtil::getPassedValue('key', isset($args['key']) ? $args['key'] : null, 'POST');
	$user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	$items = array('user_id' => $user_id,
					'jid' => $key);

	if (!DBUtil::insertObject($items, 'iw_jclic_users', 'juid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	
	// Return the id of the newly created item to the calling process
	return $items['juid'];
}

/**
 * Check if a user has begin an activity because he/she is created in users table
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the user an id of the activity
 * @return:	true if user exists and false otherwise
*/
function iw_jclic_userapi_getUserSession($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$key = FormUtil::getPassedValue('key', isset($args['key']) ? $args['key'] : null, 'POST');
	$user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if ($key == null || !is_numeric($key) || $user_id == null || !is_numeric($user_id)) {
		//return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_users_column'];

	$orderby = "";
	$where = "$c[jid] = $key AND $c[user_id] = $user_id";

	$items = DBUtil::selectObjectArray('iw_jclic_users', $where, $orderby, '-1', '-1', 'user_id');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	return $items;
}

/**
 * Check if a user has begin an activity because he/she is created in users table
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the user an id of the activity
 * @return:	true if user exists and false otherwise
*/
function iw_jclic_userapi_submitValue($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	$user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'POST');
	$toDo = FormUtil::getPassedValue('toDo', isset($args['toDo']) ? $args['toDo'] : null, 'POST');
	$content = FormUtil::getPassedValue('content', isset($args['content']) ? $args['content'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid) || $user_id == null || !is_numeric($user_id)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom).' - '.$jid.' - '.$user_id);
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_users_column'];
	
	$where = "$c[jid] = $jid AND $c[user_id] = $user_id";



	$items = array($toDo => $content);

	if (!DBUTil::updateObject ($items, 'iw_jclic_users', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * Delete all the users that have done the activities
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the assignament
 * @return:	true if user exists and false otherwise
*/
function iw_jclic_userapi_delUsers($args){
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}

	$pntable = pnDBGetTables();

	$pntables = pnDBGetTables();
	$c = $pntables['iw_jclic_users_column'];
	
	$where = "$c[jid]=$jid";

	if (!DBUtil::deleteWhere ('iw_jclic_users', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	
	return true;
}

/**
 * Delete all the sessions about the assignament
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the assignament
 * @return:	true if user exists and false otherwise
*/
function iw_jclic_userapi_delSessions($args){
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}
	
	//Delete all the activities for the session
	$sessions = pnModAPIFunc('iw_jclic', 'user', 'getAllSessions', array('jid' => $jid));
	
	$pntables = pnDBGetTables();
	$c = $pntables['iw_jclic_activities_column'];
	
	foreach($sessions as $session){
		$where = "$c[session_id]='".$session['session_id']."'";
		if (!DBUtil::deleteWhere ('iw_jclic_activities', $where)) {
			return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		}
	}

	$c = $pntables['iw_jclic_sessions_column'];
	
	$where = "$c[jclicid]=$jid";
	if (!DBUtil::deleteWhere ('iw_jclic_sessions', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	
	return true;
}

/**
 * Delete the assignament
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the assignament
 * @return:	true if user exists and false otherwise
*/
function iw_jclic_userapi_delAssignament($args){
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}

	if (!DBUtil::deleteObjectByID('iw_jclic', $jid, 'jid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	return true;
}

/**
 * Get all sessions for an activity
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:		activity identity
 * @return:	an array with the sessions information
*/
function iw_jclic_userapi_getAllSessions($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if ($jid == null || !is_numeric($jid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		return LogUtil::registerError (__('Could not find the allocation requested', $dom));
	}
	
	//Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
	if($jclic['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to edit the activity', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_sessions_column'];

	$orderby = "";
	$where = "$c[jclicid] = $jid";

	$items = DBUtil::selectObjectArray('iw_jclic_sessions', $where, $orderby, '-1', '-1', 'jsid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}
