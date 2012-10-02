<?php
/**
 * Show the list of user groups
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The list of users
*/
function iw_users_user_main($args)
{
	$all = FormUtil::getPassedValue('all', isset($args['all']) ? $args['all'] : null, 'GET');
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);
	if($all == null){
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	}else{
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_COMMENT)) {
			return LogUtil::registerPermissionError();
		}
		$pnRender->assign('all', true);
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userGroups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv'=> $sv));
	// Gets the groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$allGroups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv));
	foreach($allGroups as $group){
		$groupsNames[$group['id']] = $group['name'];
	}
	if($all != null){
		$userGroups = $allGroups;
	}
	$invisibleGroupsInList = pnModGetVar('iw_users', 'invisibleGroupsInList');	
	foreach($userGroups as $group){
		if(strpos($invisibleGroupsInList,'$'.$group['id'].'$') === false){
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');	
			$members = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
																				'gid' => $group['id']));
			$groups[] = array('gid' => $group['id'],
								'members' => count($members),
								'name' => $groupsNames[$group['id']]);
		}
	}
	$pnRender->assign('groups', $groups);
	return $pnRender->fetch('iw_users_user_main.htm');
}

/**
 * Show the module information
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_users_user_module(){
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);
	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_users',
																'type' => 'user'));
	$pnRender->assign('module', $module);
	return $pnRender->fetch('iw_users_user_module.htm');
}

/**
 * Show the list of members in a group
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	The group identity
 * @return:	The list of users
*/
function iw_users_user_members($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Check if user belongs to the group
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$isMember = pnModFunc('iw_main', 'user', 'isMember', array('sv' => $sv,
																'gid' => $gid,
																'uid' => pnUserGetVar('uid')));
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_COMMENT) && $isMember != 1 && $gid > 0) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if($gid > 0){
		//get group members
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$members = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
																			'gid' => $gid));
	}else{
		if(pnModGetVar('iw_users', 'friendsSystemAvailable') != 1){
			LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
			return pnRedirect(pnModURL('iw_users', 'user', 'main'));
		}
		$members = array();
		$membersFriends = pnModAPIFunc('iw_users', 'user', 'getAllFriends');
		if(count($membersFriends) > 0){
			$usersList = '$$';
			foreach($membersFriends as $friend){
				$usersList .= $friend['fuid'] . '$$';
			}
			// Get all users names
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$usersNames = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ncc',
																				'sv' => $sv,
																				'list' => $usersList));
			foreach($membersFriends as $friend){
				$members[] = array('name' =>$usersNames[$friend['fuid']],
									'id' => $friend['fuid']);
			}
		}
	}
	asort($members);
	$usersList = '$$';
	foreach($members as $member){
		$usersList .= $member['id'].'$$';
	}
	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersNames = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'l',
																		'sv' => $sv,
																		'list' => $usersList));
	// Get groups information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
	$folder = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder');
	foreach($members as $member){
		//get the user small photo
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$photo_s = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => $usersNames[$member['id']].'_s',
																		'sv' => $sv));
		//if the small photo not exists, check if the normal size foto exists. In this case create the small one
		if($photo_s == ''){
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$photo = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => $usersNames[$member['id']],
																			'sv' => $sv));
			if($photo != '' && is_writable($folder)){
				//create the small photo and take it
				$file_extension = strtolower(substr(strrchr($photo,"."),1));
				$e = pnModFunc('iw_main', 'user', 'thumb', array('imgSource' => $folder.'/'.$usersNames[$member['id']].'.'.$file_extension,
																	'imgDest' => $folder.'/'.$usersNames[$member['id']].'_s.'.$file_extension,
																	'new_width' => 30));
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$photo_s = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => $usersNames[$member['id']].'_s',
																				'sv' => $sv));
			}
		}
		// get user friends
		$friends = pnModAPIFunc('iw_users', 'user', 'getAllFriends');
		$isFriend = (array_key_exists($member['id'], $friends)) ? 1 : 0;
		$usersArray[] = array('name' => $member['name'],
								'photo' => $photo_s,
								'uname' => $usersNames[$member['id']],
								'isFriend' => $isFriend,
								'uid' => $member['id']);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);
	$pnRender->assign('members', $usersArray);
	$pnRender->assign('gid', $gid);
	$pnRender->assign('groupName', $groupsInfo[$gid]);
	$pnRender->assign('friendsSystemAvailable', pnModGetVar('iw_users', 'friendsSystemAvailable'));
	return $pnRender->fetch('iw_users_user_members.htm');
}