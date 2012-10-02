<?php

/**
 * Main admin function. Create admin interface
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	Array with the id of the group that can change roles
 * @return:	Admin main page
*/
function iw_myrole_admin_main($args)
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');	

	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$groupsNotChangeable = pnModGetVar('iw_myrole','groupsNotChangeable');

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));
																	
	foreach($groups as $group){
		$checked = false;
		
		if(strpos($groupsNotChangeable,'$'.$group['id'].'$') != false){
			$checked = true;	
		}
		
		$groupsArray[] = array('id' => $group['id'],
								'name' => $group['name'],
								'checked' => $checked);
	}

	$pnRender = pnRender::getInstance('iw_myrole',false);
	
	// Gets the groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv));

	$pnRender -> assign('roleGroup', pnModGetVar('iw_myrole', 'rolegroup'));
	$pnRender -> assign('groups', $groups);
	$pnRender -> assign('groupsArray', $groupsArray);
	
	return $pnRender -> fetch('iw_myrole_admin_main.htm');
}

/**
 * Show module information
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	none
 * @return:	Module information
*/
// InformaciÃ³ del mÃ²dul
function iw_myrole_admin_module()
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_myrole',
										'type' => 'admin'));

	$pnRender = pnRender::getInstance('iw_myrole',false);
	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_myrole_admin_module.htm');
} 

/**
 * Change the group that can change roles
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	Array with the id of the group that can change roles
 * @return:	
*/
// Canvia a la taula de permisos els relatius al iw_myrole
function iw_myrole_admin_changeGroup($args){
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
	$groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_myrole', 'admin', 'main'));
	}
	
	$groupsString = '$';
	foreach($groups as $group){
		$groupsString .= '$'.$group.'$';
	}

	if ($gid) {
	// Modify the permissions in group_perms
		$changePerms = pnModApiFunc ('iw_myrole', 'admin', 'changePermissions', array('gid'=> $gid));
		if ($changePerms) {
			//Update module var with new value
			pnModSetVar('iw_myrole', 'rolegroup', $gid);
			Logutil::registerStatus(__('The group change has been made.', $dom));
		} else {
			Logutil::registerError(__('The group change has not been made.', $dom));
		}
	}
	
	pnModSetVar('iw_myrole','groupsNotChangeable', $groupsString);
	
	return pnRedirect(pnModURL('iw_myrole', 'admin', 'main'));

}

/**
 * Change user groups
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the groups id's
 * @return:	True if success or false otherwise
*/
function iw_myrole_admin_changeRole($args)
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	// Get the parameters
	$roles = FormUtil::getPassedValue('roles', isset($args['roles']) ? $args['roles'] : null, 'POST');
	$setDefault = FormUtil::getPassedValue('setDefault', isset($args['setDefault']) ? $args['setDefault'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Check if the group that can change roles have admin permisions. If not the block is not showed
	$correctGroupPermissions = pnModAPIFunc('iw_myrole', 'admin', 'correctGroupPermissions');

	if(!$correctGroupPermissions){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => pnUserGetVar('uid'),
									'name' => 'invalidChange',
									'module' => 'iw_myrole',
									'lifetime' => 10,
									'nult' => true,
									'value' => 1,
									'sv' => $sv));
		return pnRedirect($_SERVER['HTTP_REFERER']);
	}

	$uid = pnUserGetVar('uid');

	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'defaultRoles',
											'module' => 'iw_myrole',
											'uid' => $uid,
											'sv' => $sv));

	if(!$exists){
		//get user groups
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$userGroups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv'=> $sv,
												'uid'=> $uid));
		$i = 0;
		foreach($userGroups as $group){
			$groups .= $group['id'].'$$';
			$i++;
		}

		//set default roles
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
									'name' => 'defaultRoles',
									'module' => 'iw_myrole',
									'sv' => $sv,
									'value' => $groups));
	}

	if($setDefault == 1){
		$i = 0;
		foreach($roles as $group){
			$groups .= $group['id'].'$$';
			$i++;
		}
		//set default roles
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
									'name' => 'defaultRoles',
									'module' => 'iw_myrole',
									'sv' => $sv,
									'value' => $groups));
	}

	//Check if the group that can change roles have admin permisions. If not the block is not showed
	$correctGroupPermissions = pnModAPIFunc('iw_myrole', 'admin', 'correctGroupPermissions');

	if(!$correctGroupPermissions){
		return pnRedirect(pnModURL());
	}

	// Esborrem la pertinenÃ§a a tots els grups excepte el de canvia de rol
	$delGroups = pnModApiFunc('iw_myrole', 'admin', 'delUserGroups');

	if ($delGroups) {
		$addToGroup = pnModApiFunc('iw_myrole', 'admin', 'addUserToGroup', array('roles' => $roles));
	}

	if(!$delGroups || !$addToGroup){
		LogUtil::registerError (__('Error in the role change', $dom));
	}

	pnModFunc('iw_main', 'user', 'regenBlockNews', array('sv' => $sv));
	return true;
}

/**
 * Reset user groups membership
 * @author: 	Josep FerrÃ ndiz (jferran6@xtec.cat)
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	none
 * @return:	True if success or false otherwise
*/
function iw_myrole_admin_resetRoles($args)
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'defaultRoles',
											'module' => 'iw_myrole',
											'uid' => pnUserGetVar('uid'),
											'sv' => $sv));
	if(!$exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => pnUserGetVar('uid'),
									'name' => 'invalidChange',
									'module' => 'iw_myrole',
									'lifetime' => 10,
									'nult' => true,
									'value' => 1,
									'sv' => $sv));
		return pnRedirect($_SERVER['HTTP_REFERER']);

	}

	// Esborrem la pertinenÃ§a a tots els grups excepte el de canvia de rol
	$delGroups = pnModApiFunc('iw_myrole', 'admin', 'delUserGroups');

	// Esborrem la pertinenÃ§a a tots els grups excepte el de canvia de rol
	pnModAPIFunc('iw_myrole', 'admin', 'addUserToGroup', array('defaultRoles' => 1));

	pnModFunc('iw_main', 'user', 'regenBlockNews', array('sv' => $sv));
	return true;
}
