<?php
/**
 * Show the modules configurated values and options
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The options forms and values
*/
function iw_messages_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_messages::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is needed. You have to install the iw_main module before installing it.', $dom));
	}
	
	// Check if the version needed is correct. If not return error
	$versionNeeded = '0.3';
	if(!pnModFunc('iw_main','admin','checkVersion',array('version' => $versionNeeded))){
		return false;
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_messages',false);

	$groupsCanUpdate = pnModGetVar('iw_messages','groupsCanUpdate');
	$uploadFolder = pnModGetVar('iw_messages','uploadFolder');
	$multiMail = pnModGetVar('iw_messages','multiMail');
	$limitInBox = pnModGetVar('iw_messages','limitInBox');
	$limitOutBox = pnModGetVar('iw_messages','limitOutBox');

	$groupsUpdate = explode('$$',substr($groupsCanUpdate,0,-1));
	array_shift($groupsUpdate);
	sort($groupsUpdate);

	// get the intranet groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));

	foreach($groupsUpdate as $update){
		$names = explode('|',$update);
		$groupsUpdate_array[] = array('id' => $update,
							'name' => $groups[$names[0]]);
	}

	$pnRender -> assign('groupsUpdate',$groupsUpdate_array);

	$multiMail = explode('$$',substr($multiMail,0,-1));
	array_shift($multiMail);
	sort($multiMail);

	foreach($multiMail as $multi){
		$names = explode('-',$multi);
		$names1 = explode('|',$names[0]);
		$names2 = explode('|',$names[1]);
		$gn1 = $groups[$names1[0]];
		$gn2 = $groups[$names2[0]];
		if($gn2 == ''){$gn2 = __('All', $dom);}
		$criteria = $gn1.' => '.$gn2;
		$groupsMulti_array[] = array('id' => $multi,
							'name' => $criteria);
	}

	$pnRender -> assign('groupsMulti',$groupsMulti_array);

	// get the intranet groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));

	foreach($groups as $group){
		// Activate when iw_groups will be avaliable
		if(strpos($groupsCanUpdate,'$'.$group['id'].'|0$') == 0){
			$groups_array[] = array('id' => $group['id'].'|0',
							'name' => $group['name']);
		}
	}

	foreach($groups as $group){
		// Activate when iw_groups will be avaliable
		$groupsAll_array[] = array('id' => $group['id'].'|0',
						'name' => $group['name']);
	}

	if(!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_messages','uploadFolder')) ||
		pnModGetVar('iw_messages','uploadFolder') == ''){
		$pnRender -> assign('noFolder', true);
	}else{
		if(!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_messages','uploadFolder'))){
			$pnRender -> assign('noWriteable', true);
		}
	}
    $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
	$pnRender -> assign('multizk', $multizk);
	$pnRender -> assign('groupsAll', $groupsAll_array);
	$pnRender -> assign('groups', $groups_array);
	$pnRender -> assign('uploadFolder', $uploadFolder);
	$pnRender -> assign('directoriroot', pnModGetVar('iw_main','documentRoot'));
	$pnRender -> assign('limitInBox', $limitInBox);
	$pnRender -> assign('limitOutBox', $limitOutBox);
	$pnRender -> assign('dissableSuggest', pnModGetVar('iw_messages','dissableSuggest'));

	return $pnRender -> fetch('iw_messages_admin_main.htm');
}

/**
 * Show the information about the module
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The information about this module
*/
function iw_messages_admin_module(){
	// Create output object
	$pnRender = pnRender::getInstance('iw_messages',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_messages',
										'type' => 'admin'));

	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_messages_module.htm');
}


/**
 * Delete a group from the list of groups that can update files
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   The group id
 * @return:	Return user to main page
*/
function iw_messages_admin_deleteUpdateGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'GET');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
	if (!empty($objectid)) {
		$group = $objectid;
	}

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_messages::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Needed arguments
	if($group == null){
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	    	return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));
	}

	$groupsCanUpdate = pnModGetVar('iw_messages','groupsCanUpdate');
	$new = str_replace('$'.$group.'$','',$groupsCanUpdate);

	$lid = pnModSetVar('iw_messages','groupsCanUpdate',$new);
	if($lid){
		LogUtil::registerStatus (__('The module configuration has changed', $dom));
	}

    	//Enviem a l'usuari a l'administraciï¿œ del mï¿œdul
    	return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));
}

/**
 * Define groups policy
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   The groups id
 * @return:	Return user to main page
*/
function iw_messages_admin_newMultiGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	$group1 = FormUtil::getPassedValue('group1', isset($args['group1']) ? $args['group1'] : null, 'POST');
	$group2 = FormUtil::getPassedValue('group2', isset($args['group2']) ? $args['group2'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_messages::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Needed arguments
	if($group1 == null || $group2 == null){
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	    	return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));
	}

	$multiMail = pnModGetVar('iw_messages','multiMail');
	$new = $multiMail.'$'.$group1.'-'.$group2.'$';

	$lid = pnModSetVar('iw_messages','multiMail',$new);
	if($lid){
		LogUtil::registerStatus (__('The module configuration has changed', $dom));
	}

    return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));
}

/**
 * Delete groups policy
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   The groups id
 * @return:	Return user to main page
*/
function iw_messages_admin_deleteMultiGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'GET');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
	if (!empty($objectid)) {
		$group = $objectid;
	}

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_messages::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Needed arguments
	if($group == null){
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	    	return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));
	}

	$multiMail = pnModGetVar('iw_messages','multiMail');
	$new = str_replace('$'.$group.'$','',$multiMail);

	$lid = pnModSetVar('iw_messages','multiMail',$new);
	if($lid){
		LogUtil::registerStatus (__('The module configuration has changed', $dom));
	}

    	//Enviem a l'usuari a l'administraciï¿œ del mï¿œdul
    	return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));
}

/**
 * Add a groups into the list of groups that can update files
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   The group id
 * @return:	Return user to main page
*/
function iw_messages_admin_newUpdateGroup($args){
	$dom = ZLanguage::getModuleDomain('iw_messages');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
	if (!empty($objectid)) {
		$group = $objectid;
	}

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_messages::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	$groupsCanUpdate = pnModGetVar('iw_messages','groupsCanUpdate');

	$new = $groupsCanUpdate.'$'.$group.'$';

	$lid = pnModSetVar('iw_messages','groupsCanUpdate',$new);
	if($lid){
		LogUtil::registerStatus (__('The module configuration has changed', $dom));
	}

    	//Enviem a l'usuari a l'administraciï¿œ del mï¿œdul
    	return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));

}

/**
 * Update module configuration
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   The module options
 * @return:	Return user to main page
*/
function iw_messages_admin_confupdate($args){
	$dom = ZLanguage::getModuleDomain('iw_messages');
	$uploadFolder = FormUtil::getPassedValue('uploadFolder', isset($args['uploadFolder']) ? $args['uploadFolder'] : null, 'POST');
	$limitInBox = FormUtil::getPassedValue('limitInBox', isset($args['limitInBox']) ? $args['limitInBox'] : null, 'POST');
	$limitOutBox = FormUtil::getPassedValue('limitOutBox', isset($args['limitOutBox']) ? $args['limitOutBox'] : null, 'POST');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
	$dissableSuggest = FormUtil::getPassedValue('dissableSuggest', isset($args['dissableSuggest']) ? $args['dissableSuggest'] : null, 'POST');

	if (!empty($objectid)) {
		$uploadFolder = $objectid;
	}

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_messages::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	$lid = pnModSetVar('iw_messages','uploadFolder',$uploadFolder);
	$lid = pnModSetVar('iw_messages','limitInBox',$limitInBox);
	$lid = pnModSetVar('iw_messages','limitOutBox',$limitOutBox);
	$lid = pnModSetVar('iw_messages','dissableSuggest',$dissableSuggest);

	if($lid){
		LogUtil::registerStatus (__('The module configuration has changed', $dom));
	}

   	return pnRedirect(pnModURL('iw_messages', 'admin', 'main'));
}
