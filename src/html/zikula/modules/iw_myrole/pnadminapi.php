<?php
/**
 * Delete all the group membership of the user
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @param:	none
 * @return:	True if success and false in other case
*/
function iw_myrole_adminapi_delUserGroups()
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$pntables = pnDBGetTables();
	$c = $pntables['group_membership_column'];
	$where = "WHERE $c[uid]=".pnUserGetVar('uid')." AND $c[gid] <>". pnModGetVar('iw_myrole', 'rolegroup');

	if (!DBUtil::deleteWhere ('group_membership', $where)) {
		LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		return false;
	}

	return true;
}


/**
 * Sets the user groups membership
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @param:	Array with the id's of the groups where the user will be enroled
 * @return:	True if success and false in other case
*/
function iw_myrole_adminapi_addUserToGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	$roles = FormUtil::getPassedValue('roles', isset($args['roles']) ? $args['roles'] : null, 'POST');
	$defaultRoles = FormUtil::getPassedValue('defaultRoles', isset($args['defaultRoles']) ? $args['defaultRoles'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN) && $defaultRoles != 1) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	if($defaultRoles == 1){
		$roles = array();

		//get user default roles
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$defaultRoles = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
												'name' => 'defaultRoles',
												'module' => 'iw_myrole',
												'sv' => $sv));
	
		//set default roles
		$userGroups = explode('$$',$defaultRoles);
		$i = 0;
		foreach($userGroups as $group){
			if($group != ''){
				$roles[$i] = $group;
				$i++;
			}
		}
	}
	$uid = pnUserGetVar('uid');
	$count = count($roles);
	for($i = 0; $i < $count; $i++){
		//Check if user belongs to change group. If not the block is not showed
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$isMember = pnModFunc('iw_main', 'user', 'isMember', array('sv' => $sv,
											'gid' => $roles[$i],
											'uid' => $uid));
		if(!$isMember){
			$obj[] =  array('uid' => $uid,
						'gid' => $roles[$i]);
		}
	}
	
	if ($count > 0) {
		if (!DBUtil::insertObjectArray($obj, 'group_membership')) {
			LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
			return false;
		}
	}
	return true;
}

/**
 * Check if the group that can change roles have the correct permissions
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	Array with the id of the group where the user will be enroled
 * @return:	True if success and false in other case
*/
function iw_myrole_adminapi_correctGroupPermissions($args)
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Get the min sequence value
	$pos = DBUtil::selectFieldMax( 'group_perms', 'sequence', 'MIN') + 1;

	$pntable =& pnDBGetTables();
	$c = $pntable['group_perms_column'];

	$where = "$c[gid] = ".pnModGetVar('iw_myrole', 'rolegroup')." AND $c[component] = 'iw_myrole::' AND $c[level] = 800 AND $c[sequence] = $pos";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('group_perms', $where);



	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Change, in group permission table, the group id that can change roles
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @param:	Array with the id of the group that can change roles
 * @return:	True if success and false in other case
*/
// Canvia el grup dels permisos del mÃ²dul iw_myrole
function iw_myrole_adminapi_changePermissions($args){

	$dom = ZLanguage::getModuleDomain('iw_myrole');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'GET');

	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

    $pntables = pnDBGetTables();	
    $column   = $pntables['group_perms_column'];

	$object = array('gid'=> $gid); 
	$where = "WHERE $column[component] LIKE 'iw_myrole%' AND $column[gid] = ".pnModGetVar('iw_myrole', 'rolegroup');

	$result = DBUtil::updateObject( $object, 'group_perms', $where);

	return !(empty($result));} 

?>
