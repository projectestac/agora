<?php
/**
 * Show the manage module site
 * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return		The configuration information
 */
function iw_forums_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct. If not return error
	$versionNeeded = '0.3';
	if(!pnModFunc('iw_main','admin','checkVersion',array('version' => $versionNeeded))){
		return false;
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_forums',false);

	//Cridem la funciï¿œ API anomenada getall i que retornarï¿œ la informaciï¿œ de tots els fï¿œrums creats
	$forums = pnModAPIFunc('iw_forums','user','getall');


	foreach($forums as $forum){
		//prepare moderators
		$moderators .= $forum['mod'];
	}

	//get all groups information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));

	//get all users information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv,
											'info' => 'ncc',
											'list' => $moderators));
	foreach($forums as $forum){
		//prepare groups
		$groups = explode('$$',substr($forum['grup'],0,-1));
		array_shift($groups);
		$groupsArray = array();
		foreach($groups as $group){
			$group1 = explode('|',$group);
			$groupName = ($group1[0] == '-1') ? __("Unregistered",$dom): $groupsInfo[$group1[0]];
			$groupsArray[] = array('id' => $group,
							'groupName' => $groupName,
							'accessType' => $group1[1]);
		}
		
		//prepare moderators
		$moderators = explode('$$',substr($forum['mod'],0,-1));
		array_shift($moderators);
		$moderatorsArray = array();
		foreach($moderators as $moderator){
			$moderatorsArray[] = array('id' => $moderator,
							'name' => $usersInfo[$moderator]);
		}

		$forumsArray[] = array('nom_forum' => $forum['nom_forum'],
						'descriu' => $forum['descriu'],
						'adjunts' => $forum['adjunts'],
						'actiu' => $forum['actiu'],
						'observacions' => $forum['observacions'],
						'msgDelTime' => $forum['msgDelTime'],
						'msgEditTime' => $forum['msgEditTime'],
						'groups' => $groupsArray,
						'mods' => $moderatorsArray,
						'fid' => $forum['fid']);
	}

	$pnRender->assign('forums', $forumsArray);
	return $pnRender->fetch('iw_forums_admin_main.htm');
}

/**
 * Show the module information
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_forums_admin_module(){
	$dom = ZLanguage::getModuleDomain('iw_forums');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_forums',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_forums', 'type' => 'admin'));

	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_forums_admin_module.htm');
}

/**
 * Show a form to create a new forum
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return	The forum creation form
 */
function iw_forums_admin_new($args){
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_forums',false);

	if($m != null && ($m == "e" || $m == "c") && is_numeric($fid)){
		//get forum information
		$forum = pnModAPIFunc('iw_forums','user','get', array('fid' => $fid));
		if ($forum == false) {
			LogUtil::registerError (__('Forum not found', $dom));
			return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));			}
		$pnRender -> assign('forum', $forum);
	}

	$pnRender -> assign('m',$m);
	return $pnRender -> fetch('iw_forums_admin_new.htm');
}

/**
 * Create a new forum
 * @autor	Albert Pï¿œrez Monfort
 * @param	main values for the forum
 * @return	Redirect the user to the administration main page
 */
function iw_forums_admin_create($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$nom_forum = FormUtil::getPassedValue('nom_forum', isset($args['nom_forum']) ? $args['nom_forum'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
	$adjunts = FormUtil::getPassedValue('adjunts', isset($args['adjunts']) ? $args['adjunts'] : null, 'POST');
	$msgEditTime = FormUtil::getPassedValue('msgEditTime', isset($args['msgEditTime']) ? $args['msgEditTime'] : null, 'POST');
	$msgDelTime = FormUtil::getPassedValue('msgDelTime', isset($args['msgDelTime']) ? $args['msgDelTime'] : null, 'POST');
	$observacions = FormUtil::getPassedValue('observacions', isset($args['observacions']) ? $args['observacions'] : null, 'POST');
	$actiu = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'POST');
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forums', 'admin', 'main'));
	}

	if(!is_numeric($msgEditTime)){
		$msgEditTime = 0;
	}

	if(!is_numeric($msgDelTime)){
		$msgDelTime = 0;
	}

	switch($m){
		case 'e':
			$items = array('nom_forum' => $nom_forum,
						'descriu' => $descriu,
						'actiu' => $actiu,
						'observacions' => $observacions,
						'adjunts' => $adjunts,
						'msgDelTime' => $msgDelTime,
						'msgEditTime' => $msgEditTime);
			if(pnModAPIFunc('iw_forums', 'admin', 'update', array('items' => $items,
										'fid' => $fid))) {
		     		//modified successfully
				LogUtil::registerStatus (__('The forum has been modified', $dom));
			}
			break;
		default:
			if(pnModAPIFunc('iw_forums','admin','create',array('nom_forum' => $nom_forum,
											'descriu' => $descriu,
											'actiu' => $actiu,
											'observacions' => $observacions,
											'adjunts' => $adjunts,
											'msgDelTime' => $msgDelTime,
											'msgEditTime' => $msgEditTime))) {
		     		//created successfully
				LogUtil::registerStatus (__('A new forum has been created', $dom));
			}
	}

	return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
}

/**
 * Add a group with access to the forum
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	array with the group identity
 * @return	Redirect user to main admin page
 */
function iw_forums_admin_addGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
	$accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Get item
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Forum not found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	if(!$confirm){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																		'less' => pnModGetVar('iw_myrole', 'rolegroup')));

		// Create output object
		$pnRender = pnRender::getInstance('iw_forums',false);
		$pnRender -> assign ('groups',$groups);
		$pnRender -> assign ('item',$item);
		return $pnRender -> fetch('iw_forums_admin_addGroup.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forums', 'admin', 'main'));
	}

	// Needed argument
	if (!isset($group) || !is_numeric($group) || $group == 0) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	if($group == '-1'){
		$accessType = 1;
	}

	$groupString = ($item['grup'] == '') ? '$' : $item['grup'];
	$groupString .= '$'.$group.'|'.$accessType.'$';

	$items = array('grup' => $groupString);

	//add the group in database and send automatic message if it is necessary
	if (pnModAPIFunc('iw_forums', 'admin', 'update', array('fid' => $fid,
									'items' => $items))) {
		//Success
		LogUtil::registerStatus (__('Group added', $dom));
	}
	return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
}

/**
 * Delete a group with access to the forum
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	the information of the group that have to be deleted
 * @return	Redirect user to main admin page
 */
function iw_forums_admin_deleteGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Get item
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Forum not found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	if(!$confirm){
		//gets the group name
		$vals = explode('|',$id);

		//get all groups information
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));

		$groupName = ($vals[0] != '-1') ? $groupsInfo[$vals[0]] : __('Unregistered', $dom);

		// Create output object
		$pnRender = pnRender::getInstance('iw_forums',false);

		$pnRender -> assign ('groupName',$groupName);
		$pnRender -> assign ('item',$item);
		$pnRender -> assign ('id',$id);

		return $pnRender -> fetch('iw_forums_admin_deleteGroup.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forums', 'admin', 'main'));
	}

	// Needed argument
	if (!isset($id) || $id == '') {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	$groupString = str_replace('$'.$id.'$','',$item['grup']);

	$items = array('grup' => $groupString);
	if (pnModAPIFunc('iw_forums', 'admin', 'update', array('fid' => $fid,
									'items' => $items))) {
		//Success
		LogUtil::registerStatus (__('The access has been deleted', $dom));
   	}

	return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
}

/**
 * Add a moderator in the forum
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	array with the manager identity
 * @return	Redirect user to main admin page
 */
function iw_forums_admin_addModerator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Get item
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Forum not found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	$confirm = (!isset($uid) || !is_numeric($uid) || $uid == 0) ? 0 : 1;

	if(!$confirm){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																		'plus' => __('Choose a gruop...', $dom),
																		'less' => pnModGetVar('iw_myrole', 'rolegroup')));


		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groupMembers = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
												'gid' => $group));

		// Create output object
		$pnRender = pnRender::getInstance('iw_forums',false);
		$pnRender -> assign ('groupselect',$group);
		$pnRender -> assign ('groups',$groups);
		$pnRender -> assign ('groupMembers',$groupMembers);
		$pnRender -> assign ('item',$item);
		return $pnRender -> fetch('iw_forums_admin_addModerator.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forums', 'admin', 'main'));
	}

	// Needed argument
	if (!isset($uid) || !is_numeric($uid) || $uid == 0) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	$respString = ($item['mod'] == '') ? '$' : $item['mod'];
	$respString .= '$'.$uid.'$';

	$items = array('mod' => $respString);

	//add the group in database and send automatic message if it is necessary
	if (pnModAPIFunc('iw_forums', 'admin', 'update', array('fid' => $fid,
									'items' => $items))) {
		//Success
		LogUtil::registerStatus (__('Moderador added', $dom));
	}

	return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
}

/**
 * Delete the moderator of a forum
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	the information of the manager who is going to be deleted
 * @return	Redirect user to main admin page
 */
function iw_forums_admin_deleteModerator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Get item
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Forum not found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	if(!$confirm){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$userName = pnModFunc('iw_main', 'user', 'getUserInfo', array('sv' => $sv,
											'uid' => $id,
											'info' => 'ncc'));
		// Create output object
		$pnRender = pnRender::getInstance('iw_forums',false);

		$pnRender -> assign ('userName',$userName);
		$pnRender -> assign ('item',$item);
		$pnRender -> assign ('id',$id);

		return $pnRender -> fetch('iw_forums_admin_deleteModerator.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forums', 'admin', 'main'));
	}

	// Needed argument
	if (!isset($id) || $id == '') {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	$respString = str_replace('$'.$id.'$','',$item['resp']);

	$items = array('mod' => $respString);
	if (pnModAPIFunc('iw_forums', 'admin', 'update', array('fid' => $fid,
									'items' => $items))) {
		//Success
		LogUtil::registerStatus (__("Moderator deleted,$dom"));
   	}

	return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
}

/**
 * Delete a forum
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	the information of the forum that is going to be deleted
 * @return	Redirect user to main admin page
 */
function iw_forums_admin_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Get item
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Forum not found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	if(!$confirm){

		// Create output object
		$pnRender = pnRender::getInstance('iw_forums',false);
		$pnRender -> assign ('item',$item);
		return $pnRender -> fetch('iw_forums_admin_delete.htm');
	}
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forums', 'admin', 'main'));
	}

	if (pnModAPIFunc('iw_forums','admin','delete',array('fid' => $fid))) {
		//Success
		LogUtil::registerStatus (__('The forum has been deleted', $dom));
	}

	return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
}

/**
 * Show a form with the module confirable parameters
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return	The new configurable parameters
 */
function iw_forums_admin_conf()
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$pnRender = pnRender::getInstance('iw_forums',false);

	if(!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_forums','urladjunts')) || pnModGetVar('iw_forums','urladjunts') == ''){
		$pnRender -> assign('noFolder', true);
	}else{
		if(!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_forums','urladjunts'))){
			$pnRender -> assign('noWriteable', true);
		}
	}
    $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
	$pnRender -> assign('multizk', $multizk);
	$pnRender -> assign('urladjunts', pnModGetVar('iw_forums','urladjunts'));
	$pnRender -> assign('directoriroot', pnModGetVar('iw_main','documentRoot'));
	$pnRender -> assign('avatarsVisible', pnModGetVar('iw_forums','avatarsVisible'));
	return $pnRender -> fetch('iw_forums_admin_configura.htm');
}

/**
 * Update the configurable options of a form
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	The form parameter values
 * @return	Redirect user to admin main page
 */
function iw_forums_admin_update_conf($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$urladjunts = FormUtil::getPassedValue('urladjunts', isset($args['urladjunts']) ? $args['urladjunts'] : null, 'POST');
	$avatarsVisible = FormUtil::getPassedValue('avatarsVisible', isset($args['avatarsVisible']) ? $args['avatarsVisible'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forums', 'admin', 'main'));
	}

	pnModSetVar('iw_forums','urladjunts', $urladjunts);
	pnModSetVar('iw_forums','avatarsVisible', $avatarsVisible);

	LogUtil::registerStatus (__('The configuration of the module has been modified', $dom));

	return pnRedirect(pnModURL('iw_forums', 'admin', 'conf'));
}

/**
 * get the characteristics content of a forum
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	The forum identity
 * @return	The forum information
 */
function iw_forums_admin_getCharsContent($args){
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Get field information
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Forum not found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'admin', 'main'));
	}

	return $item;
}
