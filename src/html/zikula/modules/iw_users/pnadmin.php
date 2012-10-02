<?php
/**
 * Show the list of users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	The values for the current view
 * @return:	The list of users
*/
function iw_users_admin_main($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
	$filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
	$campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'POST');
	$numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	if ($inici == null) {
		$inici = pnModFunc('iw_main', 'user', 'userInitVar',
		                    array('sv' => $sv,
								  'module' => 'iw_users',
								  'name' => 'inici',
								  'default' => '0',
								  'lifetime' => '1000'));
	} else {
		pnModFunc('iw_main', 'user', 'userSetVar',
		           array('sv' => $sv,
						 'module' => 'iw_users',
						 'name' => 'inici',
						 'value' => $inici,
						 'lifetime' => '1000'));
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	if ($filtre == null) {
		$filtre = pnModFunc('iw_main', 'user', 'userInitVar',
		                     array('sv' => $sv,
								   'module' => 'iw_users',
								   'name' => 'filtre',
								   'default' => '0',
								   'lifetime' => '1000'));
	} else {
		pnModFunc('iw_main', 'user', 'userSetVar',
		           array('sv' => $sv,
						 'module' => 'iw_users',
						 'name' => 'filtre',
						 'value' => $filtre,
						 'lifetime' => '1000'));
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	if ($campfiltre == null  || $campfiltre == '') {
		$campfiltre = pnModFunc('iw_main', 'user', 'userInitVar',
		                         array('sv' => $sv,
									   'module' => 'iw_users',
									   'name' => 'campfiltre',
									   'default' => 'l',
									   'lifetime' => '1000'));
	} else {
		pnModFunc('iw_main', 'user', 'userSetVar',
		           array('sv' => $sv,
						 'module' => 'iw_users',
						 'name' => 'campfiltre',
						 'value' => $campfiltre,
						 'lifetime' => '1000'));
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	if ($numitems == null || $numitems == '') {
		$numitems = pnModFunc('iw_main', 'user', 'userInitVar',
		                       array('sv' => $sv,
									 'module' => 'iw_users',
									 'name' => 'numitems',
									 'default' => '20',
									 'lifetime' => '1000'));
	} else {
		pnModFunc('iw_main', 'user', 'userSetVar',
		           array('sv' => $sv,
						 'module' => 'iw_users',
						 'name' => 'numitems',
						 'value' => $numitems,
						 'lifetime' => '1000'));
	}
	// Get all users in database
	$allUsers = pnModAPIFunc('iw_users', 'user', 'getAllUsers');
	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                         array('info' => 'l',
								   'sv' => $sv));															
	// Get all the groups information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupsInfo = pnModFunc('iw_main','user','getAllGroupsInfo',
	                         array('sv' => $sv));														
	// Create the users that are in users table but are not in iw_users table
	$notExist = array_diff_key($usersUname, $allUsers);
	foreach ($notExist as $key => $value) {
		pnModAPIFunc('iw_users', 'admin', 'create',
		              array('uid' => $key));
	}
	// Count the users for the criteria
	$usersNumber = pnModAPIFunc('iw_users', 'user', 'countUsers',
	                             array('campfiltre' => $campfiltre,
																		'filtre' => $filtre));
	// Get all users needed
	$users = pnModAPIFunc('iw_users', 'user', 'getAll',
	                       array('campfiltre' => $campfiltre,
								 'filtre' => $filtre,
								 'inici' => $inici,
								 'numitems' => $numitems));
	$usersList = '$$';
	foreach ($users as $user) {
		$usersList .= $user['uid'].'$$';
	}
	// Get all users mails
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersMail = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                        array('info' => 'e',
								  'sv' => $sv,
								  'list' => $usersList));
	$folder = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder');										
	// Check all users disponibility in extra database. If user doesn't exists create it
	foreach ($users as $user) {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllUserGroups',
		                     array('sv' => $sv,
								   'uid' => $user['uid']));															
		$userGroups = array();
		foreach ($groups as $group) {
			if ($group['id']) {
				array_push($userGroups, array('id' => $group['id'],
											  'name' => $groupsInfo[$group['id']]));
			}
		}
		//get the user small photo
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$photo_s = pnModFunc('iw_main', 'user', 'getUserPicture',
		                      array('uname' => $usersUname[$user['uid']].'_s',
									'sv' => $sv));
		//if the small photo not exists, check if the normal size foto exists. In this case create the small one
		if ($photo_s == '') {
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$photo = pnModFunc('iw_main', 'user', 'getUserPicture',
			                    array('uname' => $usersUname[$user['uid']],
									  'sv' => $sv));
			if ($photo != '' && is_writable($folder)) {
				//create the small photo and take it
				$file_extension = strtolower(substr(strrchr($photo,"."),1));
				$e = pnModFunc('iw_main', 'user', 'thumb',
				                array('imgSource' => $folder.'/'.$usersUname[$user['uid']] . '.' . $file_extension,
									  'imgDest' => $folder.'/'.$usersUname[$user['uid']] . '_s.' . $file_extension,
									  'new_width' => 30));
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$photo_s = pnModFunc('iw_main', 'user', 'getUserPicture',
				                      array('uname' => $usersUname[$user['uid']] . '_s',
											'sv' => $sv));
			}
		}
		$usersArray[] = array('uid' => $user['uid'],
							  'uname' => $usersUname[$user['uid']],
                              'email' => $usersMail[$user['uid']],
							  'nom' => $user['nom'],
							  'cognom1' => $user['cognom1'],
					          'cognom2' => $user['cognom2'],
							  'photo' => $photo_s,
							  'groups' => $userGroups);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);
	$leters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	$pager = pnModFunc('iw_users', 'admin', 'pager',
	                    array('inici' => $inici,
							  'rpp' => $numitems,
							  'usersNumber' => $usersNumber,
							  'urltemplate' => 'index.php?module=iw_users&type=admin&func=main&inici=%%'));
	$numitems_MS = array(array('id' => '10',
						       'name' => '10'),
						 array('id' => '20',
							   'name' => '20'),
						 array('id' => '30',
							   'name' => '30'),
						 array('id' => '40',
							   'name' => '40'),
						 array('id' => '50',
							   'name' => '50'),
						 array('id' => '60',
							   'name' => '60'),
						 array('id' => '80',
							   'name' => '80'),
						 array('id' => '100',
							   'name' => '100'));
	$camps = array('l' => __('User name', $dom),
				   'n' => __('Name', $dom),
				   'c1' => __('1st surname', $dom),
				   'c2' => __('2nd surname', $dom));
	$campsfiltre_MS = array(array('id' => 'l',
								  'name' => $camps['l']),
							array('id' => 'n',
								  'name' => $camps['n']),
							array('id' => 'c1',
								  'name' => $camps['c1']),
							array('id' => 'c2',
								  'name' => $camps['c2']));
	$pnRender->assign('pager', $pager);
	$pnRender->assign('leters', $leters);
	$pnRender->assign('numitems_MS', $numitems_MS);
	$pnRender->assign('campsfiltre_MS', $campsfiltre_MS);
	$pnRender->assign('inici', $inici);
	$pnRender->assign('filtre', $filtre);
	$pnRender->assign('campfiltre', $campfiltre);
	$pnRender->assign('numitems', $numitems);
	$pnRender->assign('users', $usersArray);
	$pnRender->assign('usersNumber', $usersNumber);
	return $pnRender->fetch('iw_users_admin_main.htm');
}

/**
 * Show the module information
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_users_admin_module()
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_users', 'type' => 'admin'));

	$pnRender->assign('module', $module);
	return $pnRender->fetch('iw_users_admin_module.htm');
}

/**
 * Edit the list of users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	The identities of the users to edit
 * @return:	The list of the edited users
*/
function iw_users_admin_edit($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$userId = FormUtil::getPassedValue('userId', isset($args) ? $args : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	if ($userId == null) {
		LogUtil::registerError (__('No users have chosen', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	// get users registers
	$users = pnModAPIFunc('iw_users', 'user', 'get', array('multi' => $userId));
	if ($users == false) {
		LogUtil::registerError (__('No users found', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	$usersList = '$$';
	foreach ($users as $user) {
		$usersList .= $user['uid'].'$$';
	}

	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersNames = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'l',
																		'sv' => $sv,
																		'list' => $usersList));

	foreach ($users as $user) {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$photo = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => $usersNames[$user['uid']],
																		'sv' => $sv));
		$usersArray [] = array('uname' => $user['uid'],
								'uid' => $user['uid'],
								'nom' => $user['nom'],
								'photo' => $photo,
								'cognom1' => $user['cognom1'],
								'cognom2' => $user['cognom2']);
	}

	$canChangeAvatar = true;
	//Check if the users picture folder exists
	if (!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder')) || pnModGetVar('iw_main', 'usersPictureFolder') == '') {
		$canChangeAvatar = false;
	} else {
		if (!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder'))) {
			$canChangeAvatar = false;
		}
	}

	//Check if the temp folder exists
	if (!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder')) || pnModGetVar('iw_main', 'tempFolder') == '') {
		$canChangeAvatar = false;
	} else {
		if (!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder'))) {
			$canChangeAvatar = false;
		}
	}
		
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);

	$pnRender->assign('users', $usersArray);
	$pnRender->assign('canChangeAvatar', $canChangeAvatar);
	$pnRender->assign('usersNames', $usersNames);

	return $pnRender->fetch('iw_users_admin_edit.htm');
}

/**
 * Update the users values
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	The users values
 * @return:	Return user to main page
*/
function iw_users_admin_update($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args) ? $args : null, 'POST');
	$nom = FormUtil::getPassedValue('nom', isset($args) ? $args : null, 'POST');
	$cognom1 = FormUtil::getPassedValue('cognom1', isset($args) ? $args : null, 'POST');
	$cognom2 = FormUtil::getPassedValue('cognom2', isset($args) ? $args : null, 'POST');
	$deleteAvatar = FormUtil::getPassedValue('deleteAvatar', isset($args) ? $args : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_users', 'admin', 'main'));
	}

	$error = false;
	if (!pnModAPIFunc('iw_users', 'admin', 'updateUser', array('uid' => $uid,
																'nom' => $nom,
																'cognom1' => $cognom1,
																'cognom2' => $cognom2))) {
		LogUtil::registerError(__('There was some mistake while editing', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	$usersList = '$$';
	foreach ($uid as $u) {
		$usersList .= $u.'$$';
	}

	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersNames = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'l',
																		'sv' => $sv,
																		'list' => $usersList));

	$folder = pnModGetVar('iw_main', 'tempFolder');
	
	//update avatars
	foreach ($uid as $u) {
		if ($deleteAvatar[$u] != 1) {
			$user = 'avatar_'.$u;
			$nom_fitxer = '';
			$fileName = $_FILES['avatar_'.$u]['name'];
			$file_extension = strtolower(substr(strrchr($fileName,"."),1));
			if ($fileName != '' && ($file_extension == 'png' || $file_extension == 'gif' || $file_extension == 'jpg')) {
				// update the attached file to the server
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$update = pnModFunc('iw_main', 'user', 'updateFile', array('sv' => $sv,
																			'folder' => $folder,
																			'fileRealName' => $_FILES['avatar_'.$u]['name'],
																			'fileNameTemp' => $_FILES['avatar_'.$u]['tmp_name'],
																			'size' => $_FILES['avatar_'.$u]['size'],
																			'allow' => '|'.$file_extension,
																			'fileName' => $usersNames[$u].'.'.$file_extension));
	
				//the function returns the error string if the update fails and and empty string if success
				if ($update['msg'] != '') {
					LogUtil::registerError ($update['msg'].' '.__('Probably the note have been sent without the attached file',$dom));
					$nom_fitxer = '';
				} else {
					$nom_fitxer = $update['fileName'];
				}
			}
	
			//if the file has uploaded
			if ($nom_fitxer != '') {
				for($i=0; $i<2; $i++) {
					$fileAvatarName = $usersNames[$u];
					$userFileName = ($i == 0) ? $fileAvatarName.'.'.$file_extension : $fileAvatarName.'_s.'.$file_extension;
					$new_width = ($i == 0) ? 90 : 30;
					//source and destination
					$imgSource = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder').'/'.$nom_fitxer;
					$imgDest = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder').'/'.$userFileName;
					
					//if success $errorMsg = ''
					$errorMsg = pnModFunc('iw_main', 'user', 'thumb', array('imgSource' => $imgSource,
																			'imgDest' => $imgDest,
																			'new_width' => $new_width,
																			'deleteOthers' => 1));
				}
				
				//delete the avatar file in temporal folder
				unlink(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder').'/'.$nom_fitxer);
			}
		} else {
			pnModFunc('iw_main', 'user', 'deleteAvatar', array('avatarName' => $usersNames[$u],
																'extensions' => array('jpg','png','gif')));
			pnModFunc('iw_main', 'user', 'deleteAvatar', array('avatarName' => $usersNames[$u].'_s',
																'extensions' => array('jpg','png','gif')));
		}
	}

	LogUtil::registerStatus(__('The records have been published successfully', $dom));

	return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
}

/**
 * Create a new user form
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	Show the form to create a new user
*/
function iw_users_admin_new()
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv));

	$defaultgroup = pnModGetVar('Groups','defaultgroup');

	$canChangeAvatar = true;
	//Check if the users picture folder exists
	if (!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder')) || pnModGetVar('iw_main', 'usersPictureFolder') == '') {
		$canChangeAvatar = false;
	} else {
		if (!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder'))) {
			$canChangeAvatar = false;
		}
	}

	//Check if the temp folder exists
	if (!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder')) || pnModGetVar('iw_main', 'tempFolder') == '') {
		$canChangeAvatar = false;
	} else {
		if (!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder'))) {
			$canChangeAvatar = false;
		}
	}
		
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);

	$pnRender->assign('groups', $groups);
	$pnRender->assign('defaultgroup', $defaultgroup);
	$pnRender->assign('canChangeAvatar', $canChangeAvatar);
	
	return $pnRender->fetch('iw_users_admin_new.htm');
}

/**
 * Create a new user in database
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	User information received from the form
 * @return:	Show the form to create a new user
*/
function iw_users_admin_create($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$nom = FormUtil::getPassedValue('nom', isset($args['nom']) ? $args['nom'] : null, 'POST');
	$cognom1 = FormUtil::getPassedValue('cognom1', isset($args['cognom1']) ? $args['cognom1'] : null, 'POST');
	$cognom2 = FormUtil::getPassedValue('cognom2', isset($args['cognom2']) ? $args['cognom2'] : null, 'POST');
	$uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'POST');
	$pass = FormUtil::getPassedValue('pass', isset($args['pass']) ? $args['pass'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
	$email = FormUtil::getPassedValue('email', isset($args['email']) ? $args['email'] : null, 'POST');

	$fileName = $_FILES['avatar']['name'];

	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_users', 'admin', 'main'));
	}

	//Needed arguments
	if ($uname == null) {
		LogUtil::registerError(__('You do not have written the name of user', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	//Needed arguments
	if ($pass == null) {
		LogUtil::registerError(__('You do not have written the password of the user', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	//Needed arguments
	if ($email == null) {
		LogUtil::registerError(__('You do not have written the e-mail to the user', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	//Needed arguments
	if ($group == null || $group == 0) {
		LogUtil::registerError(__('You have not selected the initial group of the user', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	// Check if uname exists
	// Get all users uname
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'l',
																		'sv' => $sv,
																		'list' => $uname.'$$'));

	if (in_array($uname ,$usersUname)) {
		LogUtil::registerError(__('Username', $dom).' <strong>'.$uname.'</strong> '.__('already exists. You have to choose another.', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	//Check for password
    $minpass = pnModGetVar('Users', 'minpass');
    if (empty($pass) || strlen($pass) < $minpass) {
        return LogUtil::registerError (__('The password chosen by the user is too short. The minimum character must have the password is', $dom).' '.$minpass);
    }

	// Create user in users table
	$user = pnModAPIFunc('iw_users', 'admin', 'createUser', array('uname' => $uname,
																	'pass' => $pass,
																	'nom' => $nom,
																	'cognom1' => $cognom1,
																	'cognom2' => $cognom2));
	if ($user == false) {
		LogUtil::registerError(__('There was an error in the creation of the user.', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	$folder = pnModGetVar('iw_main', 'tempFolder');
	
	//update avatars
	$file_extension = strtolower(substr(strrchr($fileName,"."),1));
	if ($fileName != '' && ($file_extension == 'png' || $file_extension == 'gif' || $file_extension == 'jpg')) {
		// update the attached file to the server
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$update = pnModFunc('iw_main', 'user', 'updateFile', array('sv' => $sv,
																	'folder' => $folder,
																	'file' => $_FILES['avatar'],																		
																	'fileName' => $uname.'.'.$file_extension));

		//the function returns the error string if the update fails and and empty string if success
		if ($update['msg'] != '') {
			LogUtil::registerError ($update['msg'].' '.__('User without avatar' , $dom));
			$nom_fitxer = '';
		} else {
			$nom_fitxer = $update['fileName'];
		}
	}

	//if the file has uploaded
	if ($nom_fitxer != '') {
		for($i=0; $i<2; $i++) {
			$fileAvatarName = $uname;
			$userFileName = ($i == 0) ? $fileAvatarName.'.'.$file_extension : $fileAvatarName.'_s.'.$file_extension;
			$new_width = ($i == 0) ? 90 : 30;
			//source and destination
			$imgSource = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder').'/'.$nom_fitxer;
			$imgDest = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder').'/'.$userFileName;
			
			//if success $errorMsg = ''
			$errorMsg = pnModFunc('iw_main', 'user', 'thumb',
			                       array('imgSource' => $imgSource,
										 'imgDest' => $imgDest,
										 'new_width' => $new_width));
		}
		//delete the avatar file in temporal folder
		unlink(pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_main', 'tempFolder') . '/' . $nom_fitxer);
	}

	// Create user in iw_users table
	$userData = pnModAPIFunc('iw_users', 'admin', 'create',
	                          array('uid' => $user,
									'nom' => $nom,
									'cognom1' => $cognom1,
									'cognom2' => $cognom2));

	if ($userData == false) {
		LogUtil::registerError(__('The user has been created but there was an error in the entry of personal information. Create this user and makes it the right information.', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	// Insert user into initial group
	$userInitGroup = pnModAPIFunc('iw_users', 'admin', 'addUserToGroup',
	                               array('uid' => $user,
										 'gid' => $group));

	if ($userInitGroup == false) {
		LogUtil::registerError(__('The user has been created but there was an error in the allocation of the initial group of the user. Put this user in a group/s that you think appropriate  from the management module group.', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	LogUtil::registerStatus(__('We have created a user new', $dom));

	return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
}

/**
 * Delete the users selected
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	The identities of the users to delete
 * @return:	The list of the users that are going to be deleted
*/
function iw_users_admin_delete($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$userId = FormUtil::getPassedValue('userId', isset($args) ? $args : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args) ? $args : null, 'POST');
	$uname = FormUtil::getPassedValue('uname', isset($args) ? $args : null, 'POST');
	$confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	if ($userId == null && $uid == null) {
		LogUtil::registerError (__('No users have chosen', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	if (!$confirmation) {
		// get users registers
		$users = pnModAPIFunc('iw_users', 'user', 'get',
		                       array('multi' => $userId));
		if ($users == false) {
			LogUtil::registerError (__('No users found', $dom));
			return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
		}

		// Get all users info
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
		                         array('info' => 'l',
									   'sv' => $sv,
									 'fromArray' => $users));

		foreach ($users as $user) {
			$usersArray [] = array('uname' => $usersUname[$user['uid']],
								   'uid' => $user['uid'],
								   'nom' => $user['nom'],
								   'cognom1' => $user['cognom1'],
								   'cognom2' => $user['cognom2']);
		}

		// Create output object
		$pnRender = pnRender::getInstance('iw_users', false);

		$pnRender->assign('users', $usersArray);
		$pnRender->assign('userId', $userId);

		return $pnRender->fetch('iw_users_admin_delete.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_users', 'admin', 'main'));
	}

	//Delete users avatars
	foreach ($uid as $u) {
		$userVars = pnUserGetVars($u);
		pnModFunc('iw_main', 'user', 'deleteAvatar',
		           array('avatarName' => 	$userVars['uname'],
						 'extensions' => array('jpg','png','gif')));
		pnModFunc('iw_main', 'user', 'deleteAvatar',
		           array('avatarName' => $userVars['uname'].'_s',
						 'extensions' => array('jpg','png','gif')));
	}
	//Delete multiple users from iw_users table
	$deleteIWUser = pnModAPIFunc('iw_users','admin','deleteIWUser',
	                              array('uid' => $uid));
	if (!$deleteIWUser) {
		LogUtil::registerError (__('There was an error and failed to remove the information from the user', $dom));
	}

	//Delete multiple users from group_membership table
	if ($deleteIWUser) {
		$deleteUserGroups = pnModAPIFunc('iw_users','admin','deleteUserGroups',
		                                  array('uid' => $uid));
		if (!$deleteUserGroups) {
			LogUtil::registerError (__('There was an error deleting user groups. The user could not be removed', $dom));
		}
	}

	//Delete multiple users from users table
	if ($deleteUserGroups) {
		$deleteUsers = pnModAPIFunc('iw_users','admin','deleteUsers',
		                             array('uid' => $uid));
		if (!$deleteUsers) {
			LogUtil::registerError (__('There was an error deleting users from the database', $dom));
		}
	}

	LogUtil::registerStatus(__('The user or users have been deleted', $dom));

	return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
}

/**
 * Create a pager for the users admin main page
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the apameters of the current page
 * @return:	Return the pager
*/
function iw_users_admin_pager($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
	$rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'POST');
	$usersNumber = FormUtil::getPassedValue('usersNumber', isset($args['usersNumber']) ? $args['usersNumber'] : null, 'POST');
	$urltemplate = FormUtil::getPassedValue('urltemplate', isset($args['urltemplate']) ? $args['urltemplate'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);


	// Quick check to ensure that we have work to do
	if ($usersNumber <= $rpp) {
		return;
	}

	if (!isset($inici) || empty($inici)) {
		$inici = 0;
	}

	if (!isset($rpp) || empty($rpp)) {
		$rpp = 10;
	}

	// Show startnum link
	if ($inici != 0) {
		$url = preg_replace('/%%/', 0, $urltemplate);
		$text = '<a href="'.$url.'"><<</a> | ';
	} else {
		$text = '<< | ';
	}
	$items[] = array('text' => $text);

	// Show following items
	$pagenum = 1;

	for ($curnum = 0; $curnum <= $usersNumber - 1; $curnum += $rpp) {
		if (($inici < $curnum) || ($inici > ($curnum + $rpp - 1))) {
			//mod by marsu - use sliding window for pagelinks
			if ((($pagenum%10) == 0) // link if page is multiple of 10
					|| ($pagenum == 1) // link first page
					|| (($curnum > ($inici-4*$rpp)) //link -3 and +3 pages
					&&($curnum < ($inici+4*$rpp)))
			) {
				// Not on this page - show link
				$url = preg_replace('/%%/', $curnum, $urltemplate);
				$text = '<a href="'.$url.'">'.$pagenum.'</a> | ';
				$items[] = array('text' => $text);
			}
			//end mod by marsu
		} else {
			// On this page - show text
			$text = $pagenum.' | ';
			$items[] = array('text' => $text);
		}
		$pagenum++;
	}

	if (($curnum >= $rpp + 1) && ($inici < $curnum - $rpp)) {
		$url = preg_replace('/%%/', $curnum - $rpp, $urltemplate);
		$text = '<a href="'.$url.'">>></a>';
	} else {
		$text = '>>';
	}
	$items[] = array('text' => $text);

	$pnRender->assign('items',$items);
	return $pnRender->fetch('iw_users_admin_pager.htm');
}

/**
 * Create a CSV file with all the uses data
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the apameters of the current page
 * @return:	Return the pager
*/
function iw_users_admin_export($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Get all users in database
	$allUsers = pnModAPIFunc('iw_users', 'user', 'getAllUsers');
	if ($allUsers == false) {
		LogUtil::registerError (__('No users found', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                         array('info' => 'l',
								   'sv' => $sv));

	// Get all users mails
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersMail = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                        array('info' => 'e',
								  'sv' => $sv));
																		
	$file = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_main', 'tempFolder') . '/export' . date('dmY') . '.csv';
	$f = fopen($file, 'w');

	//Posem la fila inicial del fitxer
	fwrite($f, '#,id,nom,cognom1,cognom2,nom_u,email,contrasenya,grup'."\r\n");	
	$i = 0;
	foreach ($allUsers as $user) {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllUserGroups',
		                     array('sv' => $sv,
								   'uid' => $user['uid']));
		$group1 = '';
		foreach ($groups as $group) {
			$group1 .= $group['id'].'|';
		}
		$group1 = substr($group1, 0, strlen($group1) - 1);
		$i++;
		$userId = ($user['id'] == '') ? $usersUname[$user['uid']] : $user['id'];
		fwrite($f, $i . ',"' . $userId . '","' . $user['nom'] . '","' . $user['cognom1'] . '","' . $user['cognom2'] . '","' . $usersUname[$user['uid']] . '","' . $usersMail[$user['uid']] . '","",' . $group1 . "\r\n");
	}
	fclose($f);
	//Check that file has been created correctly
	if (!is_file($file)) {
		LogUtil::registerError (__('An error occurred while creating the data file. Checks from the global configuration of the module (iw_main), the temporary directory exists.', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}

	//Gather relevent info about file
	$len = filesize($file);
	$filename = basename($file);
	$file_extension = strtolower(substr(strrchr($filename,"."),1));
	$ctype = "CSV/CSV";

	//Begin writing headers
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public"); 
	header("Content-Description: File Transfer");

	//Use the switch-generated Content-Type
	header("Content-Type: $ctype");
	
	//Force the download
	$header = "Content-Disposition: attachment; filename=".$filename.";";
	header($header );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$len);
	@readfile($file);

	//Delete file from servar folder
	unlink($file);
	exit;
}

/**
 * Import users from a CSV file
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the apameters of the users and process
 * @return:	Return to admin main pager
*/
function iw_users_admin_import($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$pas = FormUtil::getPassedValue('pas', isset($args['pas']) ? $args['pas'] : null, 'REQUEST');
	$subpas = FormUtil::getPassedValue('subpas', isset($args['subpas']) ? $args['subpas'] : null, 'REQUEST');
	$fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
	$saga = FormUtil::getPassedValue('saga', isset($args['saga']) ? $args['saga'] : null, 'POST');
	$tria = FormUtil::getPassedValue('tria', isset($args['tria']) ? $args['tria'] : null, 'POST');
	$suids = FormUtil::getPassedValue('suids', isset($args['suids']) ? $args['suids'] : null, 'POST');
	$suidi = FormUtil::getPassedValue('suidi', isset($args['suidi']) ? $args['suidi'] : null, 'POST');
	$login = FormUtil::getPassedValue('login', isset($args['login']) ? $args['login'] : null, 'POST');
	$email = FormUtil::getPassedValue('email', isset($args['email']) ? $args['email'] : null, 'POST');
	$contrasenya = FormUtil::getPassedValue('contrasenya', isset($args['contrasenya']) ? $args['contrasenya'] : null, 'POST');
	$associa = FormUtil::getPassedValue('associa', isset($args['associa']) ? $args['associa'] : null, 'POST');
	$submit = FormUtil::getPassedValue('submit', isset($args['submit']) ? $args['submit'] : null, 'POST');
	$idintra = FormUtil::getPassedValue('idintra', isset($args['idintra']) ? $args['idintra'] : null, 'POST');
	$quins = FormUtil::getPassedValue('quins', isset($args['quins']) ? $args['quins'] : null, 'REQUEST');
	$taula = FormUtil::getPassedValue('taula', isset($args['taula']) ? $args['taula'] : null, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	$sortida =& new pnHTML();

	if ($pas > 0 && $pas != 3) {
		// Confirm authorisation code
		if (!SecurityUtil::confirmAuthKey()) {
			return LogUtil::registerAuthidError (pnModURL('iw_users', 'admin', 'main'));
		}
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);

	//Camps fets servir en la sincronitzaciÃ³ de les taules
	$camps_esperats_xml = array('#',
								'id',
								'nom',
								'cognom1',
								'cognom2',
								'email');
	$camps_esperats_csv = array('#',
								'id',
								'nom',
								'cognom1',
								'cognom2',
								'nom_u',
								'email',								
								'contrasenya',
								'grup');
	$camps_esperats = array('#',
							'id',
							'nom',
							'cognom1',
							'cognom2',
							'nom_u',
							'email',
							'contrasenya',
							'grup');

	if ($pas == '') {$pas = 1;}

	$pnRender->assign('step', $pas);

	switch ($pas) {
		case 1:
			$potpassar = true;
			break;
		case 2:
			//Check values from step 1
			//Check if file exists
			$potpassar = true;
			if (empty($_FILES['fitxer']['name'])) {
				$pnRender->assign('noFile', true);
				$pas = 0;
				break;
			}

			//Update the file to temp folder
			$len_fitxer = $_FILES['fitxer']['size']; 
			$nom_fitxer = $_FILES['fitxer']['name'];
			$extensio_fitxer = strtolower(substr(strrchr($nom_fitxer,"."),1));
			$pnRender->assign('fileName', $nom_fitxer);

			//check if file characteristics are correct
			if ($extensio_fitxer != 'csv' || $len_fitxer == 0) { 
				$pnRender->assign('incorrectFile', true);
				$pas = 0;
				break;
			} else {
				if (!move_uploaded_file($_FILES['fitxer']['tmp_name'], pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder').$nom_fitxer)) { 
					//Error during the file update process
					$pnRender->assign('updateFileError', true);
					$pas = 0;
					break;
				} 
			} 

			$pnRender->assign('goOn2', true);

			//Reading the file from the server
			//Parser the file and inclode records in saga array
			$fp = fopen(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder').$nom_fitxer,'r');

			$fila1 = fgets($fp);
			$fila1 = trim(str_replace('"', '', $fila1));
			$columnes[1] = explode(',', $fila1);
			$camps_esperats = $camps_esperats_csv;

			$i = 0;
			foreach ($columnes[1] as $columna) {
				if ($camps_esperats[$i] == $columna) {
					$ok = true;
				} else {
					$ok = false;
					$error = true;
				}
				$rows[] = array('column' => $columna,
								'ok' => $ok);
				$i++;
			}

			$pnRender->assign('rows', $rows);
			$pnRender->assign('fields', $camps_esperats);
			$pnRender->assign('error', $error);

			if ($error) {
				$pas = 0;
				break;
			}

			if (count($camps_esperats) != $i && $i > 6) {
				while(count($camps_esperats) != $i) {
					$notPresentFields[] = array('value' => $camps_esperats[$i]);
					$i++;
				}
				$pnRender->assign('error1', true);
				$pnRender->assign('notPresentFields', $notPresentFields);
				$pas = 0;
				break;
			}

			//Prepare tables to make possible the sincronitation
			//Truncate the auxiliar tables saga and users_aux
			$lid = pnModAPIFunc('iw_users', 'admin', 'truncateTables');
			if ($lid == false) {
				$pnRender->assign('error2', true);
				$pas = 0;
				break;
			}

			//copiem la taula d'usuaris amb totes les dades de la taula usuaris i posem les dades a zero
			$lid = pnModAPIFunc('iw_users', 'admin', 'copyTables');
			if ($lid == false) {
				$pnRender->assign('error2', true);
				$pas = 0;
				break;
			}
			
			if ($extensio_fitxer == 'xml') {
				//Procedim a la cÃ rrega de les dades a la matriu saga
				$i = 0;
				preg_match_all("/<columna>(.*?)<\/columna>/", $data, $registres);

				foreach ($registres[1] as $registre) {
					//Memoritzem les dades trobades
					switch ($i % 5) {
						case 0; //ref
							$ref = $registre;
							if (!is_numeric($registre)) {
								$error = true;
								$error_text = 0;
							}
							break;
						case 1; //id
							$id = $registre;
							break;
						case 2; //nom
							$nom = $registre;
							break;
						case 3; //cognom1
							$cognom1 = $registre;
							break;
						case 4; //cognom2
							$cognom2 = $registre;
							//Entrem el registre a la base de dades de saga
							$lid = pnModAPIFunc('iw_users', 'admin', 'createImport', array('accio' => 0,
																							'id' => $id,
																							'nom' => $nom,
																							'cognom1' => $cognom1,
																							'cognom2' => $cognom2));
							if ($lid == false) {
								$error = true;
								$error_text = 1;
							}
							break;
					}
					$i++;
					if ($error) {break;}
				}
				$num_registres = $i / count($columnes[1]);
			} else {
				while(!feof($fp)) {
					$valors = trim(fgets($fp));
					if (strlen($valors > 0)) {
						$valors = trim(str_replace('"','',$valors));
						$valors = explode(",",$valors);
						if (!is_numeric($valors[0])) {
							$error = true;
							$error_text = 0;
						}
						$lid = pnModAPIFunc('iw_users', 'admin', 'createImport', array('accio' => 0,
																						'id' => $valors[1],
																						'nom' => $valors[2],
																						'cognom1' => $valors[3],
																						'cognom2' => $valors[4],
																						'nom_u' => $valors[5],
																						'email' => $valors[6],															
																						'contrasenya' => $valors[7],
																						'grup' => $valors[8]));
						if ($lid == false) {
							$error = true;
							$error_text = 1;
						}
						$num_registres++;
					}
				}
			}

			//comprova que tots els registres estiguin complets
			if ($num_registres != round($num_registres) && !$error) {
				$error_text = 0;
				$error = true;
			}

			//Tanquem el fitxer d'exportaciÃ³
			fclose($fp);
			//Esborra el fitxer del servidor
			unlink(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder').$nom_fitxer);

			//Fem una classificaciÃ³ dels registres
			//Valors de la 1a. classificaciÃ³: 	 Els registres que estan a les dues taules i sÃ³n idÃšntics els esborra directament de les dues taules
			//									 0->els registres estan en una taula i no a l'altre
			//									 1->estan a les dues taules perÃ² no sÃ³n idÃšntics

			$primer_filtre = pnModAPIFunc('iw_users', 'admin', 'primer_filtre');
			if ($primer_filtre == false) {
					$error = true;
					$error_text = 2;
			}

			if ($error) {
				$pnRender->assign('error3', true);
				$pnRender->assign('error_text', $error_text);
				$pas = 0;
				break;
			}

			//LES DADES S'HAN CARREGAT CORRECTAMENT A LA BASE DE DADES DE SAGA
			//Mostrem el nombre de registres trobats
			$pnRender->assign('goOn21', true);
			$pnRender->assign('numRecords', $num_registres);
			break;
		case 3:
			//Comprovem si s'han resolt tots els conflictes per poder passar al pas segÃŒent
			//per fer-ho mirem els registres de la taula de SAGA que tenen el valor d'acciÃ³=0
			//NomÃ©s serÃ  possible passar al pas segÃŒent quan tots els registres tinguin el valor acciÃ³ diferent de 0
			$conflictes = pnModAPIFunc('iw_users','admin','conflictes');
			if ($conflictes == false) {
					$error = true;
					$error_text = 1;
			} else {
				if (($conflictes['intranet'] + $conflictes['saga'] + $conflictes['ordres'] + $conflictes['diferents']) == 0) {$potpassar = true;}
			}

			// Get all users info
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'l',
																				'sv' => $sv));
			switch($subpas) {
				case 1:
					//Mirem si cal fer alguna acciÃ³ degut a iteracions anteriors
					if (!empty($tria)) {
				    	//ConfirmaciÃ³ del codi d'autoritzaciÃ³.
						if (!pnSecConfirmAuthKey()) {
							pnSessionSetVar('errormsg', __('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
							return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
						}
						//Procedim a gestionar l'acciÃ³ i a fer els canvis oportunta a les bases de dades
						$i=0;
						foreach ($tria as $tria1) {
							$valor1 = -2;
							$valor2 = -2;
							if ($tria[$i] == 1) {$valor1 = 2;}
							$accio = pnModAPIFunc('iw_users', 'admin', 'modificaaccio',
							                       array('taula' => 1,
														 'valor' => $valor1,
														 'suid' => $suids[$i]));
							$accio = pnModAPIFunc('iw_users', 'admin', 'modificaaccio',
							                       array('taula' => 2,
														 'valor' => $valor2,
														 'suid' => $suidi[$i]));
							$i++;
						}
						//Tornem a fer un recompte dels registres que queden per gestionar
						$conflictes = pnModAPIFunc('iw_users', 'admin', 'conflictes');
					}
					$sortida->FormHidden('pas', 3);
					$sortida->FormHidden('subpas', 1);
					$sortida->FormHidden('authid', pnSecGenAuthKey());
					$sortida->text(__('Managing users who are on both tables, but have differences in data', $dom));
					$sortida->linebreak(1);

					//Buquem els usuaris que tenen un 1 a les dues taules
					$usuaris = pnModAPIFunc('iw_users', 'admin', 'get_gestio',
					                         array('subpas' => 1,
												   'inici' => 0,
												   'numitems' => 20));

					if ($usuaris==false) {
						$sortida->linebreak(1);
						$sortida->boldtext(__('We found no users to manage in this group.', $dom));
						$sortida->linebreak(1);
						$no_hi_ha=true;
					}
					if (!$no_hi_ha) {
						//Possibles opcions en la tria de les dades
						$tria_MS = array(array('id' => '1',
										       'name' => __('Import file', $dom)),
									     array('id' => '2',
										       'name' => __('the intranet', $dom)));
						$sortida->text(__('The users are in the following two tables. In each case, select the most appropriate', $dom));
						$sortida->linebreak(2);
						foreach ($usuaris as $usuari) {
							$sortida->FormHidden('suids[]',$usuari['suids']);
							$sortida->FormHidden('suidi[]',$usuari['suidi']);
							$sortida->Tablestart($usersUname[$usuari['uid']],'','1','200');
							$sortida->Tablerowstart();
							$sortida->Tablecolstart();
							$sortida->Boldtext(' ');
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('Information import file', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('Information intranet', $dom));
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$sortida->Tablerowstart();
							$sortida->Tablecolstart('','left');
							$sortida->Boldtext($camps_esperats[5]);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['noms'] == '') {$usuari['noms'] = '---';}
							$sortida->text($usuari['login']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['nomi'] == '') {$usuari['nomi'] = '---';}
							$sortida->text($usersUname[$usuari['uid']]);
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$sortida->Tablerowstart();
							$sortida->Tablecolstart('','left');
							$sortida->Boldtext($camps_esperats[2]);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['noms'] == '') {$usuari['noms'] = '---';}
							$sortida->text($usuari['noms']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['nomi'] == '') {$usuari['nomi'] = '---';}
							$sortida->text($usuari['nomi']);
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$sortida->Tablerowstart();
							$sortida->Tablecolstart('','left');
							$sortida->Boldtext($camps_esperats[3]);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom1s'] == '') {$usuari['cognom1s'] = '---';}
							$sortida->text($usuari['cognom1s']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom1i'] == '') {$usuari['cognom1i'] = '---';}
							$sortida->text($usuari['cognom1i']);
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$sortida->Tablerowstart();
							$sortida->Tablecolstart('','left');
							$sortida->Boldtext($camps_esperats[4]);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom2s'] == '') {$usuari['cognom2s'] = '---';}
							$sortida->text($usuari['cognom2s']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom2i'] == '') {$usuari['cognom2i'] = '---';}
							$sortida->text($usuari['cognom2i']);
							$sortida->Tablecolend();
							$sortida->Tablerowend();

							//Busca els grups als quals pertany l'usuari
							$quins_grups = '';
							$grups = pnModAPIFunc('iw_users', 'user', 'quins_grups', array('uid' => $usuari['uid']));
							foreach ($grups as $grup) {
								$quins_grups .= $grup['pn_name'].'<br>';
							}

							if ($quins_grups == '') {$quins_grups = '---';}

							$sortida->Tablerowstart();
							$sortida->Tablecolstart('2','left','top');
							$sortida->Boldtext(__('Group/s', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->SetInputMode(_PNH_VERBATIMINPUT);
							$sortida->text($quins_grups);
							$sortida->SetInputMode(_PNH_PARSEINPUT);
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$sortida->Tablerowstart();
							$sortida->Tablecolstart('3','left');
							$sortida->Boldtext(__('I would have data', $dom));
							$sortida->formselectmultiple('tria[]',$tria_MS);
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$sortida->Tableend();
							$sortida->linebreak(2);
						}
					}
					if ($conflictes['diferents'] > 0) {
						$sortida->text(__('Are', $dom).$conflictes['diferents'].__('manage records in this section ', $dom));
						$sortida->linebreak(2);
						$sortida->formsubmit(__('Next >>', $dom));
						$sortida->linebreak(2);
						$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import',array('pas' => 3,
																		'subpas' => 0))),__('Back to the menu of options', $dom));
					} else {
						//Enviem a l'usuari al menÃº de gestiÃ³ de les dades
						pnRedirect(pnModURL('iw_users', 'admin', 'import',array('pas' => 3,
														'subpas' => 0)));
						$sortida->linebreak(2);
						$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																											'subpas' => 0))),__('Back to the menu of options', $dom));
					}
					break;
				case 2:
					//Mirem si cal fer alguna acciÃ³ degut a iteracions anteriors
					if (!empty($suids)) {
						//ConfirmaciÃ³ del codi d'autoritzaciÃ³.
						if (!pnSecConfirmAuthKey()) {
							pnSessionSetVar('errormsg', __('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
							return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
						}

						//Procedim a gestionar l'acciÃ³ i a fer els canvis oportunta a les bases de dades
						$i = 0;
						foreach ($tria as $tria1) {
							switch($tria[$i]) {
								case 1:
									$group = '';
									$grup = FormUtil::getPassedValue('grup_'.$suids[$i], isset($args['grup_'.$suids[$i]]) ? $args['grup_'.$suids[$i]] : null, 'POST');
									foreach ($grup as $g) {
										$group .= $g.'|';
									}
								
								
									$valor = 3;
									$modificasaga = pnModAPIFunc('iw_users', 'admin', 'modificasaga', array('valor' => 3,
																											'suid' => $suids[$i],
																											'login' => $login[$i],
																											'email' => $email[$i],
																											'grup' => $group,
																											'contrasenya' => $contrasenya[$i]));
									break;
								case 2:
									$modificasaga = pnModAPIFunc('iw_users', 'admin', 'modificasaga', array('valor' => 4,
																											'suid' => $suids[$i],
																											'uid' => $associa[$i]));

									$accio = pnModAPIFunc('iw_users', 'admin', 'modificaaccio', array('taula' => 2,
																										'valor' => (-4),
																										'uid' => $associa[$i],
																										'suid' => $suids[$i]));
									break;
								case 3:
									$accio = pnModAPIFunc('iw_users', 'admin', 'modificaaccio', array('taula' => 1,
																										'valor' => (-3),
																										'suid' => $suids[$i]));
									break;
							}
							$i++;
						}
						//Tornem a fer un recompte dels registres que queden per gestionar
						$conflictes = pnModAPIFunc('iw_users','admin','conflictes');
					}

					$sortida->FormHidden('pas', 3);
					$sortida->FormHidden('subpas', 2);
					$sortida->FormHidden('authid', pnSecGenAuthKey());
					$sortida->text(__('Managing users who are on the table and not import to the intranet', $dom));
					$sortida->linebreak(1);

					//Buquem els usuaris que tenen un 3 a la taula de saga
					$usuaris = pnModAPIFunc('iw_users', 'admin', 'get_gestio', array('subpas' => 2,
																						'inici' => 0,
																						'numitems' => 20));
					if ($usuaris == false) {
						$sortida->linebreak(1);
						$sortida->boldtext(__('We found no users to manage in this group.', $dom));
						$sortida->linebreak(1);
						$no_hi_ha = true;
					}

					if (!$no_hi_ha) {
						//Possibles opcions en la tria de les dades
						//Agafem els usuaris que estan a la Intranet perÃ³ no a SAGA i els preparem per un camp MS
						$registres = pnModAPIFunc('iw_users', 'admin', 'get_gestio', array('subpas' => 3,
																							'inici' => 0,
																							'numitems' => 9999999999));

						// Get all users info
						$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
						$usersFullName = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ncc',
																								'sv' => $sv));

						foreach ($registres as $registre) {
							$associa_MS[] = array('id' => $registre['uid'],
											'name' => $usersFullName[$registre['uid']]);
						}

						$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
						$grups_MS = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv));		
	
						//Get the identity for the default group configurated in the intranet
						foreach ($grups_MS as $group) {
							$defaultgroup = pnModGetVar('Groups','defaultgroup');
							if ($defaultgroup == $group['name']) {$defaultGroup_id = $group['id'];}
						}

						$sortida->text(__('The users are only following the import table of users. In each case, select the most appropriate', $dom));
						$sortida->linebreak(2);
						$sortida->Tablestart('','','1');
						if (count($associa_MS) > 0) {
							$sortida->Tablerowstart();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('Name', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('1st surname', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('2nd surname', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('Option', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('For the "Add new user" select a user name, a password and a group', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('For the "Link to the user", choose which user you want to associate', $dom));
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$tria_MS = array(array('id' => '1',
											'name' => __('Creates the user', $dom)),
										array('id' => '2',
											'name' => __('Attached to the user', $dom)),
										array('id' => '3',
											'name'=>__('Do not make any action', $dom)));
						} else {
							$sortida->Tablerowstart();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('Name', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('1st surname', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('2nd surname', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('Option', $dom));
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->Boldtext(__('For the "Add new user" select a user name, a password and a group', $dom));
							$sortida->Tablecolend();
							$sortida->Tablerowend();
							$tria_MS = array(array('id' => '1',
											'name' => __('Creates the user', $dom)),
										array('id' => '3',
											'name'=>__('Do not make any action', $dom)));
						}
						foreach ($usuaris as $usuari) {
							$sortida->FormHidden('suids[]', $usuari['suids']);
							$sortida->Tablerowstart();
							$sortida->Tablecolstart();
							if ($usuari['noms'] == '') {$usuari['noms'] = '---';}
							$sortida->text($usuari['noms']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom1s'] == '') {$usuari['cognom1s'] = '---';}
							$sortida->text($usuari['cognom1s']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom2s'] == '') {$usuari['cognom2s'] = '---';}
							$sortida->text($usuari['cognom2s']);
							$sortida->Tablecolstart();
							$sortida->Formselectmultiple('tria[]',$tria_MS,0);
							$sortida->Tablecolend();
							$sortida->Tablecolstart('','center');
							if ($usuari['login'] == "") {
								$login = pnModFunc('iw_users', 'admin', 'posanom', array('nom' => $usuari['noms'],
																							'cognom1' => $usuari['cognom1s']));
							} else {
								$login = $usuari['login'];
							}
							$sortida->Formtext('login[]',$login,12,25);
							$sortida->linebreak(1);
							$sortida->Formtext('email[]',$usuari['email'],12,25);
							$sortida->linebreak(1);

							//$sortida->Formselectmultiple('grup[]',$grups_MS,0,0,$usuari['grup']);
							$userGroupsArray = explode('|',$usuari['grup']);
							$sortida->SetInputMode(_PNH_VERBATIMINPUT);
							$sortida->text('<select name="grup_'.$usuari['suids'].'[]" size="2" multiple="multiple">');

							foreach ($grups_MS as $oneGroup) {
								$selected = (in_array($oneGroup['id'],$userGroupsArray) || $usuari['grup'] == '' && $oneGroup['id'] == $defaultGroup_id) ? "selected" : "";
								$sortida->text('<option '.$selected.' value="'.$oneGroup['id'].'">'.$oneGroup['name']."</option>");
							}

							$sortida->text("</select>");
							$sortida->SetInputMode(_PNH_PARSEINPUT);

							$sortida->linebreak(1);
							if ($usuari['contrasenya'] == "") {
								$pass = strtolower(substr($usuari['noms'],0,1).substr($usuari['cognom1s'],0,1)).mt_rand(1000,9999);
								$pass = pnModFunc('iw_users', 'admin', 'posanom', array('nom' => '',
																						'cognom1' => $pass));
							} else {
								$pass = $usuari['contrasenya'];
							}
							$sortida->Formtext('contrasenya[]',$pass,12,12);
							$sortida->Tablecolend();
							if (count($associa_MS) > 0) {
								$sortida->Tablecolstart();
								$sortida->Formselectmultiple('associa[]',$associa_MS,0);
								$sortida->Tablecolend();
							}
							$sortida->Tablerowend();
						}
						$sortida->Tableend();
					}
					if ($conflictes['saganointranet'] > 0) {
							$sortida->text(__('Are', $dom).$conflictes['saganointranet'].__('manage records in this section ', $dom));
							$sortida->linebreak(2);
							$sortida->formsubmit(__('Next >>', $dom));
							$sortida->linebreak(2);
							$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
															'subpas' => 0))), __('Back to the menu of options', $dom));
					} else {
						//Enviem a l'usuari al menï¿œ de gestiï¿œ de les dades
						pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
															'subpas' => 0)));
						$sortida->linebreak(2);
						$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																		'subpas' => 0))), __('Back to the menu of options', $dom));
					}
					break;
				case 3:
					//Mirem si cal fer alguna acciï¿œ degut a iteracions anteriors
					if (!empty($submit)) {
						//Confirmaciï¿œ del codi d'autoritzaciï¿œ.
						if (!pnSecConfirmAuthKey()) {
							pnSessionSetVar('errormsg', __('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
							return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
						}
						//Procedim a gestionar l'acciï¿œ i a fer els canvis oportunta a les bases de dades

						$i = 0;
						$valor = ($submit == __('Delete user of the intranet', $dom))? '5' : '-5';
						foreach ($idintra as $suid0) {
							$accio = pnModAPIFunc('iw_users', 'admin', 'modificaaccio', array('taula' => 2,
																								'valor' => $valor,
																								'suid' => $idintra[$i]));
							$i++;
						}
						//Tornem a fer un recompte dels registres que queden per gestionar
						$conflictes = pnModAPIFunc('iw_users', 'admin', 'conflictes');
					}


					$sortida->FormHidden('pas', 3);
					$sortida->FormHidden('subpas', 3);
					$sortida->FormHidden('authid', pnSecGenAuthKey());
					$sortida->text(__('Managing users who are on the table on the intranet and not in the table to import', $dom));
					$sortida->linebreak(1);
					//Buquem els usuaris que tenen un 1 a les dues taules
					$usuaris = pnModAPIFunc('iw_users', 'admin', 'get_gestio', array('subpas' => 3,
																						'inici' => 0,
																						'numitems' => 20));
					if ($usuaris == false) {
						$sortida->linebreak(1);
						$sortida->boldtext(__('We found no users to manage in this group.', $dom));
						$sortida->linebreak(1);
						$no_hi_ha = true;
					}

					if (!$no_hi_ha) {
						//Possibles opcions en la tria de les dades
						$sortida->text(__('The users are only following in the table on the intranet. In each case, select the most appropriate', $dom));
						$sortida->linebreak(2);

						$sortida->Tablestart('', array(__('Username', $dom),
															__('Name', $dom),
															__('1st surname', $dom),
															__('2nd surname', $dom),
															__('Option', $dom)),'1');
						foreach ($usuaris as $usuari) {
							$sortida->FormHidden('suidi[]',$usuari['suidi']);
							$sortida->Tablerowstart();
							$sortida->Tablecolstart();
							$sortida->text($usersUname[$usuari['uid']]);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['noms'] == '') {$usuari['noms'] = '---';}
							$sortida->text($usuari['noms']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom1s'] == '') {$usuari['cognom1s'] = '---';}
							$sortida->text($usuari['cognom1s']);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							if ($usuari['cognom2s'] == '') {$usuari['cognom2s'] = '---';}
							$sortida->text($usuari['cognom2s']);
							$sortida->Tablecolstart();
							$sortida->FormCheckbox('idintra[]',0,$usuari['suidi']);
							$sortida->Tablecolend();
							$sortida->Tablerowend();
						}

						$sortida->Tablerowstart();
						$sortida->TableColStart('10','right','top');
						$sortida->SetInputMode(_PNH_VERBATIMINPUT);
						$sortida->text("<a onclick=\"setCheckboxes(true,'idintra[]')\" style='cursor:pointer; cursor:hand'>".__('Flag', $dom)."</a>/<a onclick=\"setCheckboxes(false,'idintra[]')\" style='cursor:pointer; cursor:hand'>".__('Unflag', $dom)."</a> tots ");
						$sortida->SetInputMode(_PNH_PARSEINPUT);
						$sortida->formsubmit(__('Delete user of the intranet', $dom),'','submit');
						$sortida->text(' ');
						$sortida->formsubmit(__('Do not make any action', $dom),'','submit');
						$sortida->TableRowEnd();
						$sortida->Tablerowend();
						$sortida->Tableend();
					}
					if ($conflictes['intranetnosaga'] > 0) {
							$sortida->text(__('Are', $dom).$conflictes['intranetnosaga'].__('manage records in this section ', $dom));
							$sortida->linebreak(2);
							$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																												'subpas' => 0))), __('Back to the menu of options', $dom));
					} else {
						//Enviem a l'usuari al menï¿œ de gestiï¿œ de les dades
						pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																					'subpas' => 0)));
						$sortida->linebreak(2);
						$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																		'subpas' => 0))), __('Back to the menu of options', $dom));
					}
					break;
				case 4:
					//Mirem si cal fer alguna acciÃ³ degut a iteracions anteriors
					if (!empty($submit)) {
						if (!SecurityUtil::confirmAuthKey()) {
							return LogUtil::registerAuthidError (pnModURL('iw_users', 'admin', 'main'));
						}
						$i = 0;

						// Get all users info
						$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
						$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'l',
																							'sv' => $sv));

						foreach ($suids as $a) {
							//Agafem els registres per cadascuna de les accions que cal portar a terme
							if ($suids[$i] != '') {
								$registre = pnModAPIFunc('iw_users', 'admin', 'get_dades', array('taula' => 1,
																									'suid' => $suids[$i]));
																									
								if ($registre == false) {
									pnSessionSetVar('errormsg', __('An error occurred at the time of carrying out the orders', $dom));
									pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																								'subpas' => 4)));
									return false;
								}
								switch($registre['accio']) {
									case 2:
										//Modifiquem les dades de la Intranet per les de SAGA on hi hagi les mateixes id
										$lid = pnModAPIFunc('iw_users', 'admin', 'modifica', array('id' => $registre['id'],
																									'nom' => $registre['nom'],
																									'cognom1' => $registre['cognom1'],
																									'cognom2' => $registre['cognom2'],
																									'origen' => 'saga'));
										if ($lid) {
											pnModAPIFunc('iw_users','admin','esborra_registre',array('taula' => 1,
																										'suid'=>$suids[$i]));
										} else {
											pnSessionSetVar('errormsg', __('An error occurred at the time of carrying out the orders', $dom));
										}
										break;
									case 3:
										//Donem d'alta a l'usuari a la Intranet amb la Id de SAGA
										//Comprovem que s'han complimentat les dades requerides
										if (empty($registre['login'])) {
											$sortida->Title(_USUARIS);
											$sortida->text($registre['nom'].' '.$registre['cognom1'].' '.$registre['cognom2']);
											$sortida->Linebreak(2);
											$sortida->Text(__('You have not provided the user name. You\'ll need to discard the order.', $dom));
											$sortida->Linebreak(2);
									       	$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																																'subpas' => 4))),__('Back to the table of execution.', $dom));
											$output = $sortida->GetOutput();

											$pnRender->assign('output', $output);
											return $pnRender->fetch('iw_users_admin_import.htm');
										}

										if (empty($registre['contrasenya'])) {
											$sortida->Title(_USUARIS);
											$sortida->text($registre['nom'].' '.$registre['cognom1'].' '.$registre['cognom2']);
											$sortida->Linebreak(2);
											$sortida->Text(__('You have not provided the password for this user. You\'ll need to discard the first order of the list.', $dom));
											$sortida->Linebreak(2);
									       	$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																																'subpas' => 4))), __('Back to the table of execution.', $dom));

											$output = $sortida->GetOutput();

											$pnRender->assign('output', $output);
											return $pnRender->fetch('iw_users_admin_import.htm');
										}

										if (in_array($registre['login'] ,$usersUname)) {
											$sortida->Linebreak(1);
											$sortida->text($registre['login'].'->'.$registre['nom'].' '.$registre['cognom1'].' '.$registre['cognom2']);
											$sortida->Linebreak(2);
											$sortida->Text(__('The username is invalid because it already exists. You\'ll need to discard the first order of the list', $dom));
											$sortida->Linebreak(2);
											$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																																'subpas' => 4))), __('Back to the table of execution.', $dom));

											$output = $sortida->GetOutput();

											$pnRender->assign('output', $output);
											return $pnRender->fetch('iw_users_admin_import.htm');
										}

										//El nom d'usuari no existeix i el creem
										$lid = pnModAPIFunc('iw_users', 'admin', 'createUser', array('uname' => $registre['login'],
																										'email' => $registre['email'],
																										'pass' => $registre['contrasenya'],
																										'nom' => $registre['nom'],
																										'cognom1' => $registre['cognom1'],
																										'cognom2' => $registre['cognom2']));

										if ($lid == false) {
											pnSessionSetVar('statusmsg', __('There was an error to register a new user.', $dom));
											pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																										'subpas' => 4)));
											return false;
										}
  
										//Entrem les dades de l'usuari
									   	$lid1 = pnModAPIFunc('iw_users', 'admin', 'create', array('id' => $registre['id'],
																									'uid' => $lid,
																									'nom' => $registre['nom'],
																									'cognom1' => $registre['cognom1'],
																									'cognom2' => $registre['cognom2']));

										if ($lid1 == false) {
											pnSessionSetVar('statusmsg', __('We have created the user, but there was an error in entering the personal information.', $dom));
											pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																										'subpas' => 4)));
											return false;
										}
				
										//Posem l'usuari dins del grup escollit
									   	$lid2 = pnModAPIFunc('iw_users', 'admin', 'addUserToGroup', array('uid' => $lid,
																											'gid' => $registre['grup']));

										if ($lid2 == false) {
											pnSessionSetVar('statusmsg', __('We have created the user, but there was a failure to assign it to the group', $dom));
											pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas'=>3,
																										'subpas'=>4)));
											return false;
										}

										if ($lid1) {
											//Li poso el valor -7 per no tenir-lo mï¿œs en compte en la sincronitzaciï¿œ i reconeixer-lo posteriorment
											pnModAPIFunc('iw_users', 'admin', 'modificaaccio', array('taula' => 1,
																										'valor' => -7,
																										'suid' => $suids[$i]));
										} else {
											pnSessionSetVar('errormsg', __('An error occurred at the time of carrying out the orders', $dom));
										}
										break;
									case 4:
										//Modifiquem les dades de la Intranet per les de SAGA incloent-hi la Id on tinguem la uid d'usuari rebuda
										//Modifiquem les dades de la Intranet per les de SAGA on hi hagi les mateixes id
										$lid = pnModAPIFunc('iw_users', 'admin', 'modifica', array('id' => $registre['id'],
																									'uid' => $registre['uid'],
																									'nom' => $registre['nom'],
																									'cognom1' => $registre['cognom1'],
																									'cognom2' => $registre['cognom2']));
										if ($lid) {
											pnModAPIFunc('iw_users', 'admin', 'esborra_registre', array('taula' => 1,
																										'suid' => $suids[$i]));
										} else {
											pnSessionSetVar('errormsg', __('An error occurred at the time of carrying out the orders', $dom));
										}
										break;
									default:
										//Ens assegurem de que s'esborren tots els registres amb valors negatius ja que la resta de casos ja estan contemplats
										pnModAPIFunc('iw_users', 'admin', 'esborra_registre', array('taula' => 1,
																									'suid' => $suids[$i]));
										break;
								}
							}
							if ($suidi[$i]!='') {
								$registre=pnModAPIFunc('iw_users', 'admin', 'get_dades', array('taula' => 2,
																								'suid' => $suidi[$i]));
								if ($registre==false) {
									pnSessionSetVar('errormsg', __('An error occurred at the time of carrying out the orders', $dom));
									pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																								'subpas' => 4)));
									return false;
								}

								switch($registre['accio']) {
									case 5:
										//Donem de baixa a l'usuari que tingui la uid de la taula auxiliar d'usuaris
										//Esborrem l'usuari de la taula users de PN
										pnModAPIFunc('iw_users', 'admin', 'deleteUser', array('uid' => $registre['uid']));
										//Esborrem l'usuari de la taula de grups de PN
										pnModAPIFunc('iw_users', 'admin', 'deleteUserFromGroups', array('uid' => $registre['uid']));
										break;
									default:
										break;
								}
								pnModAPIFunc('iw_users', 'admin', 'esborra_registre', array('taula' => 2,
																							'suid' => $suidi[$i]));
							}
							$i++;
						}
						//Tornem a fer un recompte dels registres que queden per gestionar
						$conflictes = pnModAPIFunc('iw_users', 'admin', 'conflictes');
					}

					$sortida->FormHidden('pas', 3);
				    $sortida->FormHidden('subpas', 4);
					$sortida->FormHidden('authid', pnSecGenAuthKey());
					$sortida->text(__('Review and execute the orders', $dom));
					$sortida->linebreak(1);

					//Buquem els usuaris que tenen un 1 a les dues taules
					$usuaris = pnModAPIFunc('iw_users', 'admin', 'get_ordres', array('inici' => 0,
																						'numitems' => 20));
					if ($usuaris == false) {
						$sortida->linebreak(1);
						$sortida->boldtext(__('No orders have been found to manage.', $dom));
						$sortida->linebreak(1);
						$no_hi_ha = true;
					}

					if (!$no_hi_ha) {
						//Possibles opcions en la tria de les dades
						$sortida->linebreak(1);
						$sortida->Tablestart('','','1');
						$sortida->Tablerowstart();
						$sortida->Tablecolstart('2','');
						$sortida->Boldtext(__('Action to be held', $dom));
						$sortida->Tablecolend();
						$sortida->Tablecolstart();
						$sortida->Boldtext(__('Option', $dom));
						$sortida->Tablecolend();
						$sortida->Tablerowend();

						// Get all the groups information
						$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
						$groupsInfo = pnModFunc('iw_main','user','getAllGroupsInfo', array('sv' => $sv));

						foreach ($usuaris as $usuari) {
							$sortida->FormHidden('suidi[]', $usuari['suidi']);
							$sortida->FormHidden('suids[]', $usuari['suids']);
							switch($usuari['accios']) {
								case 2:
									$explicaordre = __('The user', $dom).'<strong>'.$usuari['noms'].' '.$usuari['cognom1s'].' '.$usuari['cognom2s'].'</strong>'.__('Is on the two tables and I want only  that are in the import file', $dom);
									$ordre = __('Elect to the data of import file', $dom);
									break;
								case -2:
									$explicaordre = __('The user', $dom).'<strong>'.$usuari['noms'].' '.$usuari['cognom1s'].' '.$usuari['cognom2s'].'</strong>'.__('On the two tables and so on with one on the intranet', $dom);
									$ordre=__('Elect to the intranet data', $dom);									
									break;
								case 3:
									
									if ($usuari['grup'] != '') {
										$groups = explode('|',substr($usuari['grup'],0,-1));
										$groupsString = '';
										foreach ($groups as $g) {
											$groupsString .= $groupsInfo[$g].', ';
										}
										$dinsgrup = __(' in the group/s: ', $dom).'<strong>'.substr($groupsString,0,-2).'</strong>';

										if (substr_count($dinsgrup,", ") > 0) {
										    $lastspace = strrpos($dinsgrup,", ");
										    $dinsgrup = substr_replace($dinsgrup," ".__('and', $dom)." ",$lastspace,1);
									    } 
									} else {
										$dinsgrup = '';
									}
									$explicaordre = __('The user', $dom).'<strong>'.$usuari['noms'].' '.$usuari['cognom1s'].' '.$usuari['cognom2s'].'</strong>'.__('will be discharged to the intranet with the username ', $dom).' <strong>'.$usuari['login'].'</strong>'.$dinsgrup;
									$ordre = __('Discharged in the intranet', $dom);
									break;
								case -3:
									$explicaordre = __('There is no action on the user', $dom).'<strong>'.$usuari['noms'].' '.$usuari['cognom1s'].' '.$usuari['cognom2s'].'</strong>'.__('Import file ', $dom);
									$ordre = __('Any action on the user', $dom).__('Import file ', $dom);
									break;
								case 4:
									$explicaordre = __('The user', $dom).'<strong>'.$usuari['noms'].' '.$usuari['cognom1s'].' '.$usuari['cognom2s'].'</strong>'.__('	associated with the user  ', $dom).'<strong>'.$usersFullName[$usuari['uids']].'</strong>'.__('for the intranet ', $dom);


									$ordre = __('Association of users', $dom);
									break;
							}
							$taula = 1;
							$quins = $usuari['suids'];

							if ($usuari['accioi'] != '') {
								switch($usuari['accioi']) {
									case 5:
										$explicaordre = __('The user', $dom).'<strong>'.$usuari['nomi'].' '.$usuari['cognom1i'].' '.$usuari['cognom2i'].'</strong>'.__('', $dom);
										$ordre = __('Low users', $dom);
										break;
									case -5:
										$explicaordre = __('There is no action on the user', $dom).'<strong>'.$usuari['nomi'].' '.$usuari['cognom1i'].' '.$usuari['cognom2i'].'</strong>'.__('fot he intranet', $dom);
										$ordre = __('Any action on the user', $dom).__('fot he intranet', $dom);
										break;
									default:
										break;
								}
								$taula = 2;
								$quins = $usuari['suidi'];
							}

							$sortida->Tablerowstart();
							$sortida->Tablecolstart('','left');
							$sortida->text($ordre);
							$sortida->Tablecolend();

							$sortida->Tablecolstart('','left');
							$sortida->SetInputMode(_PNH_VERBATIMINPUT);
							$sortida->text($explicaordre);
							$sortida->SetInputMode(_PNH_PARSEINPUT);
							$sortida->Tablecolend();
							$sortida->Tablecolstart();
							$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('quins' => $quins,
																												'taula' => $taula,
																												'pas' => 3,
																												'subpas' => 6))),__('Discard', $dom));
							$sortida->Tablecolend();
							$sortida->Tablerowend();
						}
						$sortida->Tableend();
					}
					if ($conflictes['ordres'] > 0) {
							$sortida->text(__('Are', $dom).$conflictes['ordres'].__('manage records in this section ', $dom));
							$sortida->linebreak(2);
							$sortida->formsubmit(__('Next >>', $dom),'','submit');
							$sortida->linebreak(2);
							$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users','admin','import',array('pas'=>3,'subpas'=>0))),__('Back to the menu of options', $dom));
					} else {
						//Enviem a l'usuari al menï¿œ de gestiï¿œ de les dades
						pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																					'subpas' => 0)));
						$sortida->linebreak(2);
						$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																											'subpas' => 0))), __('Back to the menu of options', $dom));
					}
					break;

				case 5: //Reseteja totes les modificacions portades a terme
						pnModAPIFunc('iw_users', 'admin', 'fesreset', array('quins' => $quins));
						pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
																					'subpas' => 0)));
						break;
				case 6: //Reseteja una modificaciï¿œ
						pnModAPIFunc('iw_users', 'admin', 'fesresetuna', array('quins' => $quins,
													'taula' => $taula));
						pnRedirect(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 4)));
						$sortida->linebreak(2);
						$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
													'subpas' => 0))), __('Back to the menu of options', $dom));
						$sortida->linebreak(2);
						$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
													'subpas' => 4))), __('Back to the table of execution.', $dom));
					break;
				case 7: //Marca els registres per no fer acciï¿œ sobre d'ells
					pnModAPIFunc('iw_users','admin','capaccio',array('quins'=>$quins));
					pnRedirect(pnModURL('iw_users','admin','import',array('pas'=>3)));
					break;					
				default;
					$sortida->text(__('Choose the action you want to do', $dom));
					$sortida->linebreak(2);
					$sortida->TableStart('','','0','100%');
					$sortida->Tablerowstart();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
												'subpas' => 1))), __('Managing users who are on both tables, but have differences in data', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','','top');
					$sortida->text($conflictes['diferents'].__('Registration ', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 5,
														'quins' => 1))), __('Cancel the changes', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 7,
														'quins' => 1))), __('Do not make any action', $dom));
					$sortida->Tablecolend();
					$sortida->Tablerowend();
					$sortida->Tablerowstart();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 2))), __('Managing users who are on the table and not import to the intranet', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','','top');
					$sortida->text($conflictes['saganointranet'].__('Registration ', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 5,
														'quins' => 2))), __('Cancel the changes', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 7,
														'quins' => 2))), __('Do not make any action', $dom));
					$sortida->Tablecolend();					
					$sortida->Tablerowend();
					$sortida->Tablerowstart();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
											'subpas' => 3))), __('Managing users who are on the table on the intranet and not in the table to import', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','','top');
					$sortida->text($conflictes['intranetnosaga'].__('Registration ', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 5,
														'quins' => 3))), __('Cancel the changes', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 7,
														'quins' => 3))), __('Do not make any action', $dom));
					$sortida->Tablecolend();					
					$sortida->Tablerowend();
					$sortida->Tablerowstart();
					$sortida->Tablecolstart('10');
					$sortida->text('---');
					$sortida->Tablecolend();
					$sortida->Tablerowend();
					$sortida->Tablerowstart();
					$sortida->Tablecolstart('','left','top');
					$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'import', array('pas' => 3,
														'subpas' => 4))), __('Review and execute the orders', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart('','','top');
					$sortida->text($conflictes['ordres'].__('Registration ', $dom));
					$sortida->Tablecolend();
					$sortida->Tablecolstart();
					$sortida->Tablecolend();
					$sortida->Tablerowend();
					$sortida->TableEnd();
					$sortida->linebreak(1);
					$sortida->text(__('In the field import of users have', $dom));
					$sortida->text($conflictes['saga']);
					$sortida->text(__('Registration  to manage', $dom));
					$sortida->linebreak(1);
					$sortida->text(__('In the table of users of the intranet have', $dom));
					$sortida->text($conflictes['intranet']);
					$sortida->text(__('Registration  to manage', $dom));
					$sortida->linebreak(2);
					break;
			}
			if ($error) {
				$text_error = array(_USUARISREGISTRESINCORRECTES,_USUARISENTRADADADESERROR);
				$sortida->text($text_error[$error_text]);
				$pas = 0;
				break;
			}
			break;
		case 4:
			//Notifiquem l'ï¿œxit de la l'operaciï¿œ d'importaciï¿œ
			$sortida->Text(__('The data import was successful.', $dom));
			//Mostrem, en cas d'haver-n'hi, les dades de connexiï¿œ dels usuaris que s'han creat en el procï¿œs
			$usuaris = pnModAPIFunc('iw_users', 'admin', 'get_gestio', array('subpas' => 4,
												'inici' => 0,
												'numitems' => 999999999999));
			$sortida->linebreak(2);
			if ($usuaris == false) {
				$sortida->Text(__('Has not discharged any user.', $dom));
			} else {
				$sortida->linebreak(1);
				$sortida->Text(__('Data connection of new users created', $dom));
				//mostra la llista d'usuaris amb les dades de connexiï¿œ en una taula
				$sortida->Tablestart('','',3);
				foreach ($usuaris as $usuari) {
					$sortida->Tablerowstart();
					$sortida->Tablecolstart();
					$sortida->text($usuari['noms']);
					$sortida->Tablecolend();
					$sortida->Tablecolstart();
					$sortida->text($usuari['cognom1s']);
					$sortida->Tablecolend();
					$sortida->Tablecolstart();
					$sortida->text($usuari['cognom2s']);
					$sortida->Tablecolend();
					$sortida->Tablecolstart();
					$sortida->boldtext(__('Username', $dom));
					$sortida->linebreak(1);
					$sortida->text($usuari['login']);
					$sortida->Tablecolend();
					$sortida->Tablecolstart();
					$sortida->boldtext(__('Password', $dom));
					$sortida->linebreak(1);
					$sortida->text($usuari['contrasenya']);
					$sortida->Tablecolend();
					$sortida->Tablerowend();
				}
				$sortida->Tableend();
				$sortida->linebreak(1);
				$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'fitxer', array('pas' => 4))), __('To create a txt file with the data, click on the link', $dom));
			}
			$sortida->LineBreak(2);
			//Esborrem el contingut de les taules auxiliars de la importaciï¿œ i retornem a la taula d'usuaris
			$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_users', 'admin', 'final_import')), __('The process ends', $dom));
			break;
	}

	if ($potpassar) {
		$sortida->FormHidden('pas', $pas+1);
		$sortida->LineBreak(2);
		$sortida->FormSubmit(__('Go to step', $dom).($pas+1));
	}


	$output = $sortida->GetOutput();

	$pnRender->assign('output', $output);
	return $pnRender->fetch('iw_users_admin_import.htm');
}

/*
Funció que filtra els noms d'usuari assignats per defecte per tal que no continguin caràcters rars
*/

function iw_users_admin_posanom($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$nom = FormUtil::getPassedValue('nom', isset($args['nom']) ? $args['nom'] : null, 'POST');
	$cognom1 = FormUtil::getPassedValue('cognom1', isset($args['cognom1']) ? $args['cognom1'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$login = strtolower(substr($nom,0,1).substr($cognom1,0,7));
	for($i = 0; $i <= strlen($login); $i++) {
		switch (substr($login,$i,1)) {
			case 'á':
				$caracter = 'a';
				break;
			case 'à':
				$caracter = 'a';
				break;
			case 'é':
				$caracter = 'e';
				break;
			case 'è':
				$caracter = 'e';
				break;
			case 'í':
				$caracter = 'i';
				break;
            case 'ï':
                $caracter = 'i';
                break;
			case 'ó':
				$caracter = 'o';
				break;
			case 'ò':
				$caracter = 'o';
				break;
			case 'ú':
				$caracter = 'u';
				break;
			case 'ü':
				$caracter = 'u';
				break;
			case 'ñ':
				$caracter = 'n';
				break;
			case 'ç':
				$caracter = 'c';
				break;
			case ' ':
				$caracter = '';
				break;
			case '-':
				$caracter = '';
				break;
			default:
				$caracter = substr($login, $i, 1);
				break;
		}
		$login1 .= $caracter;
	}
	$i = 1;

	// Check if uname exists
	// Get all users uname
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                         array('info' => 'l',
							       'sv' => $sv));

	while (in_array($login1 ,$usersUname)) {
		$login1 .= $i;
	}

	//Retornem la proposta de login
	return $login1;
}

/*
Funciï¿œ que genera un fitxer imprimible amb els nous usuaris creats durant la importaciï¿œ
*/
function iw_users_admin_fitxer($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	//Agafem els parï¿œmetres per si se'ns retorna a la funciï¿œ desprï¿œs d'enviar les dades del formulari
	list($pas)=pnVarCleanFromInput('pas');
	extract($args);

	$sortida =& new pnHTML();

	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//generem el fitxer on escriurem les dades a exportar
	$fitxer = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_main', 'tempFolder') . '/usuaris'.date('dmY').'.txt';
	
	$f = fopen($fitxer,'w');
	$usuaris = pnModAPIFunc('iw_users', 'admin', 'get_gestio',
	                         array('subpas' => 4,
								   'inici' => 0,
								   'numitems' => 10000));
	$sortida->linebreak(2);
	if ($usuaris == false) {
		$sortida->Text(__('Has not discharged any user.', $dom));
	} else {
		fwrite($f,__('Data connection of new users created', $dom)."\r\n\r\n");
		foreach ($usuaris as $usuari) {
			fwrite($f,$usuari['noms'] . ' ' . $usuari['cognom1s'] . ' ' . $usuari['cognom2s'] . "\r\n" . __('Username', $dom) . ': ' . $usuari['login'] . "\r\n" . __('Password', $dom) . ' ' . $usuari['contrasenya'] . "\r\n---\r\n");
		}
	}
	fclose($f);

	//Comprovem que el fitxer s'hagi creat amb Ãšxit
	if (!is_file($fitxer)) {
		pnSessionSetVar('errormsg', _USUARISFITXERERRORS);		pnRedirect(pnModURL('iw_users', 'user', 'main'));
		return false;
	}

	//Gather relevent info about file
	$len = filesize($fitxer);
	$filename = basename($fitxer);
	$file_extension = strtolower(substr(strrchr($filename, "."), 1));
	$ctype = "TXT/txt";
	//Begin writing headers
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public"); 
	header("Content-Description: File Transfer");

	//Use the switch-generated Content-Type
	header("Content-Type: $ctype");
	
	//Force the download
	$header = "Content-Disposition: attachment; filename=" . $filename . ";";
	header($header );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: " . $len);
	@readfile($fitxer);

	//Esborra el fitxer del servidor
	unlink($fitxer);
	exit;
}

/*
Funciï¿œ que finalitza l'operaciï¿œ d'importaciï¿œ de dades de SAGA i esborra les taules no necessaries
*/
function iw_users_admin_final_import($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Agafem els parï¿œmetres per si se'ns retorna a la funciï¿œ desprï¿œs d'enviar les dades del formulari
	list($pas)=pnVarCleanFromInput('pas');
	extract($args);

	pnModAPIFunc('iw_users','admin','buida_taules');
	return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
}

/*
FunciÃ³ que presenta el formulari des d'on es poden editar les dades de connexiÃ³ (nom d'usuari i contrasenya) dels usuaris
*/
function iw_users_admin_editLogin($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$userId = FormUtil::getPassedValue('userId', isset($args) ? $args : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if ($userId == null) {
		LogUtil::registerError (__('No users have chosen', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}
	// get users registers
	$users = pnModAPIFunc('iw_users', 'user', 'get',
	                       array('multi' => $userId));
	if ($users == false) {
		LogUtil::registerError (__('No users found', $dom));
		return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
	}
	$usersList = '$$';
	foreach ($users as $user) {
		$usersList .= $user['uid'].'$$';

		$usersArray [] = array('uname' => $user['uid'],
							   'uid' => $user['uid'],
							   'nom' => $user['nom'],
							   'cognom1' => $user['cognom1'],
							   'cognom2' => $user['cognom2']);
	}

	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersFullNames = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                             array('info' => 'ncc',
									   'sv' => $sv,
									   'list' => $usersList));
	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersNames = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                         array('info' => 'l',
								   'sv' => $sv,
								   'list' => $usersList));
	// Get all users email
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersMails = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'e',
																		'sv' => $sv,
																		'list' => $usersList));
	
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);

	$pnRender->assign('users', $usersArray);
	$pnRender->assign('usersFullNames', $usersFullNames);
	$pnRender->assign('usersNames', $usersNames);
	$pnRender->assign('usersMails', $usersMails);

	return $pnRender->fetch('iw_users_admin_editLogin.htm');
}

/*
FunciÃ³ que modifica les dades de connexiÃ³ dels usuaris
*/
function iw_users_admin_updateLogin($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args) ? $args : null, 'POST');
	$userName = FormUtil::getPassedValue('userName', isset($args) ? $args : null, 'POST');
	$pass = FormUtil::getPassedValue('pass', isset($args) ? $args : null, 'POST');
	$userMail = FormUtil::getPassedValue('userMail', isset($args) ? $args : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_users', 'admin', 'main'));
	}

	$error=false;
	foreach ($uid as $u) {
		// Check if uname exists
		$usersList .= $u . '$$';
	}

	// Get all users uname
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                         array('info' => 'l',
								   'sv' => $sv,
								   'usersList' => $usersList));
	foreach ($uid as $u) {
		$uname = $usersUname[$u];
		if (in_array($userName[$u] ,$usersUname) && $userName[$u] != $uname) {
			LogUtil::registerError(__('Username', $dom) . ' <strong>' . $userName[$u] . '</strong> ' . __('already exists. You have to choose another.', $dom));
			return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
		}
	}
	$method = pnModGetVar('Users', 'hash_method', 'sha1');
	
	foreach ($uid as $u) {
		if ($pass[$u]!='') {$contra = DataUtil::hash($pass[$u], $method);} else {$contra = '';}
	    //Es crida la funciÃ³ API amb les dades extretes del formulari
   		$lid = pnModAPIFunc('iw_users', 'admin', 'modificacontrasenya',
   		                     array('userId' => $u,
								   'nomusuari' => $userName[$u],
								   'contrasenya' => $contra,
								   'email' => $userMail[$u]));
		if ($lid == false) {$error = true;}
    }
	if (!$error) {
		LogUtil::registerStatus(__('The records have been published successfully', $dom));
	}
	return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
}


/**
 * Show the main configurable parameters needed to configurate the module iw_users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The form with needed to change the parameters
*/
function iw_users_admin_config()
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$friendsSystemAvailable = pnModGetVar('iw_users', 'friendsSystemAvailable');
	$invisibleGroupsInList = pnModGetVar('iw_users', 'invisibleGroupsInList');
	// Create output object
	$pnRender = pnRender::getInstance('iw_users',false);
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups',
	                     array('sv' => $sv));										
	foreach ($groups as $group) {
		$checked = false;	
		if (strpos($invisibleGroupsInList,'$'.$group['id'].'$') != false) {
			$checked = true;	
		}
		$groupsArray[] = array('id' => $group['id'],
							   'name' => $group['name'],
							   'checked' => $checked);
	}
	$pnRender->assign('friendsSystemAvailable', $friendsSystemAvailable);
	$pnRender->assign('invisibleGroupsInList', $invisibleGroupsInList);
	$pnRender->assign('groupsArray', $groupsArray);
	return $pnRender->fetch('iw_users_admin_config.htm');
}

/**
 * Update the module configuration
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	Configuration values
 * @return:	The form with needed to change the parameters
*/
function iw_users_admin_updateConf($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$friendsSystemAvailable = FormUtil::getPassedValue('friendsSystemAvailable', isset($args['friendsSystemAvailable']) ? $args['friendsSystemAvailable'] : 0, 'POST');
	$groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_users', 'admin', 'main'));
	}
	$groupsString = '$';
	foreach ($groups as $group) {
		$groupsString .= '$' . $group . '$';
	}
	pnModSetVar('iw_users','friendsSystemAvailable', $friendsSystemAvailable);
	pnModSetVar('iw_users','invisibleGroupsInList', $groupsString);
	LogUtil::registerStatus (__('The configuration has changed', $dom));
	return pnRedirect(pnModURL('iw_users', 'admin', 'main'));
}
