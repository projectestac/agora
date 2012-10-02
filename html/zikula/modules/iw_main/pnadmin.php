<?php
/**
 * Give access to the main Intraweb configuration
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	The form for general configuration values of the Intraweb modules
*/
function iw_main_admin_main()
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_main::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_main',false);
	//Check if the cron file exists
	if(!file_exists('iwcron.php')){
		$pnRender -> assign('noCron', true);
		return $pnRender -> fetch('iw_main_admin_main.htm');
	}
	//Check if module Mailer is active
	$modid = pnModGetIDFromName('Mailer');
	$modinfo = pnModGetInfo($modid);
	//if it is not active
	if($modinfo['state'] != 3){
		$pnRender -> assign('noMailer', true);
		return $pnRender -> fetch('iw_main_admin_main.htm');
	}
	//-100 really is not a user but represents the system user
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$cronResponse = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => -100,
																		'name' => 'cronResponse',
																		'module' => 'iw_main_cron',
																		'sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$lastCron = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => -100,
																		'name' => 'lastCron',
																		'module' => 'iw_main_cron',
																		'sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$lastCronSuccessfull = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => -100,
																			'name' => 'lastCronSuccessfull',
																			'module' => 'iw_main_cron',
																			'sv' => $sv));
	$elapsedTime = 24*60*60;
	if($lastCron < time() - $elapsedTime){
		$pnRender -> assign('executeCron', '1');
	}
	if($lastCronSuccessfull > time() - $elapsedTime){
		$pnRender -> assign('noCronTime', true);
	}
	$pnRender -> assign('cronResponse', $cronResponse);
	return $pnRender -> fetch('iw_main_admin_main.htm');
}

/**
 * Give access to the Intraweb configuration
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	The form for general configuration values of the Intraweb modules
*/
function iw_main_admin_conf()
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_main::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_main',false);
	//Check if the directory of document root files exists
	if(!file_exists(pnModGetVar('iw_main', 'documentRoot')) || pnModGetVar('iw_main', 'documentRoot') == ''){
		$pnRender -> assign('noFolder', true);
	}else{
		if(!is_writeable(pnModGetVar('iw_main', 'documentRoot'))){
			$pnRender -> assign('noWriteabledocumentRoot', true);
		}
	}
	//Check if the users picture folder exists
	if(!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder')) || pnModGetVar('iw_main', 'usersPictureFolder') == ''){
		$pnRender -> assign('noPictureFolder', true);
	}else{
		if(!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder'))){
			$pnRender -> assign('noWriteablePictureFolder', true);
		}
	}
	//Check if the temp folder exists
	if(!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder')) || pnModGetVar('iw_main', 'tempFolder') == ''){
		$pnRender -> assign('noTempFolder', true);
	}else{
		if(!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'tempFolder'))){
			$pnRender -> assign('noWriteableTempFolder', true);
		}
	}
    $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
    if (extension_loaded('gd'))	$gdAvailable = true;
	$pnRender -> assign('gdAvailable', $gdAvailable);
	$pnRender -> assign('multizk', $multizk);
	$pnRender -> assign('extensions', pnModGetVar('iw_main', 'extensions'));
	$pnRender -> assign('extensions', pnModGetVar('iw_main', 'extensions'));
	$pnRender -> assign('maxsize', pnModGetVar('iw_main', 'maxsize'));
	$pnRender -> assign('usersvarslife', pnModGetVar('iw_main', 'usersvarslife'));
	$pnRender -> assign('documentRoot', pnModGetVar('iw_main', 'documentRoot'));
	$pnRender -> assign('usersPictureFolder', pnModGetVar('iw_main', 'usersPictureFolder'));
	$pnRender -> assign('tempFolder', pnModGetVar('iw_main', 'tempFolder'));
	$pnRender -> assign('cronHeaderText', pnModGetVar('iw_main', 'cronHeaderText'));
	$pnRender -> assign('cronFooterText', pnModGetVar('iw_main', 'cronFooterText'));
	$pnRender -> assign('allowUserChangeAvatar', pnModGetVar('iw_main', 'allowUserChangeAvatar'));
	$pnRender -> assign('avatarChangeValidationNeeded', pnModGetVar('iw_main', 'avatarChangeValidationNeeded'));
	return $pnRender -> fetch('iw_main_admin_conf.htm');
}

/**
 * Show the module information
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_main_admin_executeCron(){
	$dom = ZLanguage::getModuleDomain('iw_main');
	// Security check
	if (!SecurityUtil::checkPermission('iw_main::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	LogUtil::registerStatus (__('The cron has been executed', $dom));
	return pnRedirect('iwcron.php?full=1&return=1');
}

/**
 * Show the module information
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_main_admin_module(){
	$dom = ZLanguage::getModuleDomain('iw_main');
	// Security check
	if (!SecurityUtil::checkPermission('iw_main::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_main',false);
	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_main',
																'type' => 'admin'));
	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_main_admin_module.htm');
}

/**
 * Update the module configuration
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	True if success or false in other case
*/
function iw_main_admin_updateconfig()
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	// Get parameters from whatever input we need.
	$documentRoot = FormUtil::getPassedValue('documentRoot', isset($args['documentRoot']) ? $args['documentRoot'] : null, 'POST');
	$extensions = FormUtil::getPassedValue('extensions', isset($args['extensions']) ? $args['extensions'] : null, 'POST');
	$maxsize = FormUtil::getPassedValue('maxsize', isset($args['maxsize']) ? $args['maxsize'] : null, 'POST');
	$usersvarslife = FormUtil::getPassedValue('usersvarslife', isset($args['usersvarslife']) ? $args['usersvarslife'] : null, 'POST');
	$usersPictureFolder = FormUtil::getPassedValue('usersPictureFolder', isset($args['usersPictureFolder']) ? $args['usersPictureFolder'] : null, 'POST');
	$tempFolder = FormUtil::getPassedValue('tempFolder', isset($args['tempFolder']) ? $args['tempFolder'] : null, 'POST');
	$cronHeaderText = FormUtil::getPassedValue('cronHeaderText', isset($args['cronHeaderText']) ? $args['cronHeaderText'] : null, 'POST');
	$cronFooterText = FormUtil::getPassedValue('cronFooterText', isset($args['cronFooterText']) ? $args['cronFooterText'] : null, 'POST');
	$allowUserChangeAvatar = FormUtil::getPassedValue('allowUserChangeAvatar', isset($args['allowUserChangeAvatar']) ? $args['allowUserChangeAvatar'] : 0, 'POST');	
	$avatarChangeValidationNeeded = FormUtil::getPassedValue('avatarChangeValidationNeeded', isset($args['avatarChangeValidationNeeded']) ? $args['avatarChangeValidationNeeded'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_main::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_main', 'admin', 'conf'));
	}
	//Check if the uservarlife value is correct
	if(!isset($usersvarslife) || !is_numeric($usersvarslife) || $usersvarslife <= 0){
		LogUtil::registerError (__('The value of the life time for users variables is incorrect', $dom).': '.$usersvarslife);
		$usersvarslife = 0;
	}
	// Update module variables
    if(!isset($GLOBALS['PNConfig']['Multisites']['multi']) || $GLOBALS['PNConfig']['Multisites']['multi'] == 0) {
		$multizk = $Intraweb['multizk'];
		pnModSetVar('iw_main', 'documentRoot', $documentRoot);
	}
	pnModSetVar('iw_main', 'extensions', $extensions);
	pnModSetVar('iw_main', 'maxsize', $maxsize);
	pnModSetVar('iw_main', 'usersvarslife', $usersvarslife);
	pnModSetVar('iw_main', 'usersPictureFolder', $usersPictureFolder);
	pnModSetVar('iw_main', 'tempFolder', $tempFolder);
	pnModSetVar('iw_main', 'cronHeaderText', $cronHeaderText);
	pnModSetVar('iw_main', 'cronFooterText', $cronFooterText);
	pnModSetVar('iw_main', 'allowUserChangeAvatar', $allowUserChangeAvatar);
	pnModSetVar('iw_main', 'avatarChangeValidationNeeded', $avatarChangeValidationNeeded);
	pnModSetVar('iw_main', 'URLBase', pngetbaseurl());
	LogUtil::registerStatus (__('The configuration have been updated', $dom));
	// This function generated no output, and so now it is complete we redirect
	// the user to an appropriate page for them to carry on their work
	return pnRedirect(pnModURL('iw_main', 'admin', 'conf'));
}

/**
 * Get the files in users pictures folder for avatar replacement
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:		An array with the files from a change avatar request
*/
function iw_main_admin_getChangeAvatarRequest(){
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_main::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$folder = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder');
	//Get information files
	$fileList = pnModFunc('iw_main', 'admin', 'dir_list', array('folder' => $folder));

	foreach($fileList['file'] as $file){
		if(substr($file['name'],0,1) == '_' && substr($file['name'],-6,-4) != '_s'){
			$filesArray[] = array($file['name']);
		}
	}
	return $filesArray;
}

/**
 * List the users who have asked for a avatar replacement
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:		The list of users
*/
function iw_main_admin_changeAvatarView(){
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_main::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$files = pnModFunc('iw_main', 'admin', 'getChangeAvatarRequest');
	// Create output object
	$pnRender = pnRender::getInstance('iw_main',false);
	$usersList = '$$';
	foreach($files as $file){
		$userName = substr($file[0],1,-4);
		$userId = pnUserGetIDFromName($userName);
		$usersList .= $userId.'$$';
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$photo = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => $userName,
																		'sv' => $sv));
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$photo_new = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => '_'.$userName,
																			'sv' => $sv));
		if($userId != ''){
			$filesArray[] = array('uid' => $userId,
									'photo' => $photo,
									'photo_new' => $photo_new,
									'fileName' => $file[0]);
		}
	}
	if(count($files) > 0){
		//get all users information
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$users = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv,
																		'info' => 'ncc',
																		'list' => $usersList));
	}
	$pnRender -> assign('users', $users);												
	$pnRender -> assign('filesArray', $filesArray);
	return $pnRender -> fetch('iw_main_admin_changeAvatarView.htm');
}


/**
 * Check if it is installed the correct version of iw_main when somebody try to install a new module that needs iw_main
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the version of the module iw_main needed
 * @return:	True if the version is correct and false in other case
*/
function iw_main_admin_checkVersion($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	// Checks if module iw_msin is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	if($modinfo['version'] < $args['version']){
		return LogUtil::registerError (__('The current version of iw_main module is incorrect. You must upgrade it before install, upgrade or use this module.', $dom));
	}
	// The current version is correct
	return true;
}


/**
 * redirect administrator to iw_files modules. The management files has been removed from the iw_main module
 * @author:	Robert Barrera (rbarrer5@xtec.cat)
 * @param:	args   Array with the folder name where list the files and subfolders
 * @return:	The list of files and folders
*/
function iw_main_admin_filesList($args)
{
	return pnRedirect(pnModURL('Files', 'user', 'main'));
}



/**
 * List the information files in folder
 * @author:	Robert Barrera (rbarrer5@xtec.cat)
 * @param:	dir Folder Path
 * @return:	Objects array of the files
*/
function iw_main_admin_dir_list($args)
{
	$folder = FormUtil::getPassedValue('folder', isset($args['folder']) ? $args['folder'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_files::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$initFolderPath = pnModGetVar('iw_main', 'documentRoot');
	//needed arguments
	//Check if the directory of document root files exists
	if(!file_exists($folder)){
		//main logical functionality
		$folderName = str_replace($initFolderPath . '/', '', $folder);
		return LogUtil::registerError (_FILESNOFOLDER.': ' . $folderName);
	}
	//Check is the last character is a /
	if ($dir[strlen($folder)-1] != '/') $folder .= '/';
	//Check is a directory
	if (!is_dir($folder)) return array();
	$dir_handle  = opendir($folder);
	$dir_objects = array();
	while ($object = readdir($dir_handle)){
		if (!in_array($object, array('.','..'))){
			$filename    = $folder . $object;
			// Get file extension
			$fileExtension = strtolower(substr(strrchr($filename,"."),1));
			// get file icon
			$ctypeArray = pnModFunc('iw_files', 'user', 'getMimetype', array('extension' => $fileExtension));
			$fileIcon = $ctypeArray['icon'];
			if(substr($filename,strrpos($filename,'/')+1,1) != '.' || pnModGetVar('iw_files','showHideFiles') == 1){
				$file_object = array(
					'name' => $object,
					'size' => filesize($filename),
					'type' => filetype($filename),
					'time' => date("j F Y, H:i", filemtime($filename)),
					'fileIcon' => $fileIcon
				);
				if(is_dir($filename)){
					$dir_objects[dir][] = $file_object;
				}else{
					$dir_objects[file][] = $file_object;
				}
			}
		}
	}
	closedir($dir_handle);
	return $dir_objects;
}


/**
 * deactivate iwNotice block
 * @author Fèlix Casanellas
 * @param int $bid block id
 * @return string HTML output string
 */
function iw_main_admin_iwNoticeDeactivate()
{
    // Get parameters
    $bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'GET');

    // Confirm authorisation code
    /*if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_main','admin','view'));
    }*/

    // Pass to API
    if (pnModAPIFunc('Blocks', 'admin', 'deactivate', array('bid' => $bid))) {
        // Success
        LogUtil::registerStatus(__('Done! Block now inactive.'));
    }

    // Redirect
    return pnRedirect();
}


