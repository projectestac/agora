<?php
function iw_users_ajax_addContact($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	if (!SecurityUtil::checkPermission('iw_users::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$gid = FormUtil::getPassedValue('gid', -2, 'GET');
	if ($gid == -2) {
		AjaxUtil::error('no group id');
	}
	$fuid = FormUtil::getPassedValue('fuid', -1, 'GET');
	if ($fuid == -1) {
		AjaxUtil::error('no user id');
	}
	$action = FormUtil::getPassedValue('action', -1, 'GET');
	if ($action == -1) {
		AjaxUtil::error('no action defined');
	}
	$pnRender = pnRender::getInstance('iw_users',false);
	if($action == 'add'){
		if(!pnModAPIFunc('iw_users', 'user', 'addContant', array('fuid' => $fuid))){
			AjaxUtil::error('error');
		}
		$pnRender->assign ('add',true);
	}
	if($action == 'delete'){
		if(!pnModAPIFunc('iw_users', 'user', 'deleteContant', array('fuid' => $fuid))){
			AjaxUtil::error('error');
		}
		$pnRender->assign ('add',false);
	}
	$pnRender->assign ('fuid',$fuid);
	$pnRender->assign ('gid',$gid);
	$vars = pnUserGetVars($fuid);
	$pnRender->assign ('uname',$vars['uname']);
	$content = $content = $pnRender->fetch('iw_users_user_members_optionsContent.htm');
	AjaxUtil::output(array('fuid' => $fuid,
							'content' => $content,
							'gid' => $gid));
}

function iw_users_ajax_delUserGroup($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	if (!SecurityUtil::checkPermission('iw_users::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$uid = FormUtil::getPassedValue('uid', -1, 'GET');
	if ($uid == -1) {
		AjaxUtil::error('no user id');
	}
	$gid = FormUtil::getPassedValue('gid', -1, 'GET');
	if ($gid == -1) {
		AjaxUtil::error('no group id');
	}
	if(!pnModAPIFunc('groups', 'admin', 'removeuser', array('uid' => $uid,
															'gid' => $gid))){
		AjaxUtil::error('error deleting group');										
	}
	AjaxUtil::output(array('uid' => $uid,
							'gid' => $gid));
}

function iw_users_ajax_addUserGroup($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	if (!SecurityUtil::checkPermission('iw_users::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$uid = FormUtil::getPassedValue('uid', -1, 'GET');
	if ($uid == -1) {
		AjaxUtil::error('no user id');
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$allGroups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userGroups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv' => $sv,
																			'uid' => $uid));
	$usersGroupsArray = array();
	foreach($allGroups as $group){
		if(!array_key_exists($group['id']  , $userGroups)){
		$userGroupsArray[] = array('id' => $group['id'],
									'name' => $group['name']);
		}
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);
	$pnRender->assign('groups', $userGroupsArray);
	$pnRender->assign('uid', $uid);
	$pnRender->assign('list', true);
	$content = $pnRender->fetch('iw_users_admin_addGroupForm.htm');
	AjaxUtil::output(array('uid' => $uid,
							'content' => $content));
}

function iw_users_ajax_addGroupProceed($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	if (!SecurityUtil::checkPermission('iw_users::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$uid = FormUtil::getPassedValue('uid', -1, 'GET');
	if ($uid == -1) {
		AjaxUtil::error('no user id');
	}
	$gid = FormUtil::getPassedValue('gid', -1, 'GET');
	if ($gid == -1) {
		AjaxUtil::error('no group id');
	}
	if(!pnModAPIFunc('groups', 'admin', 'adduser', array('uid' => $uid,
															'gid' => $gid))){
		AjaxUtil::error('error adding group');										
	}
	// Get all the groups information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupsInfo = pnModFunc('iw_main','user','getAllGroupsInfo', array('sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv' => $sv,
																		'uid' => $uid));															
	$userGroups = array();
	foreach($groups as $group){
		if($group['id']){
			array_push($userGroups, array('id' => $group['id'],
											'name' => $groupsInfo[$group['id']]));
		}
	}
	$pnRender = pnRender::getInstance('iw_users',false);
	$pnRender->assign('user', array('groups' => $userGroups,
										'uid' => $uid));
	$content = $pnRender->fetch('iw_users_admin_userGroupsList.htm');
	$content1 = $pnRender->fetch('iw_users_admin_addGroupForm.htm');
	AjaxUtil::output(array('uid' => $uid,
							'content' => $content,
							'content1' => $content1));
}