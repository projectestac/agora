<?php
/**
 * Show the manage module site
 * @author		Fèlix Casanellas (fcasanel@xtec.cat)
 * @return		The configuration information
 */
function iw_chat_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.1';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_chat',false);
	
	//get all groups information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
	

	// get all rooms created
	$rooms = pnModAPIFunc('iw_chat','user','getAllRooms');
	$rooms_prop = array();

	foreach($rooms as $room){
		// Complete room properties array to show in the template
		$rooms_prop[$room['rid']]['room_name'] = $room['room_name'];
		$rooms_prop[$room['rid']]['room_desc'] = $room['room_desc'];
		$rooms_prop[$room['rid']]['active'] = $room['active'];
		$groups = $room['groups'];
		if ($groups != ''){
			$rooms_prop[$room['rid']]['groups'] = array();;
			$groups = explode('$', $groups);			
			foreach($groups as $group){
				if ($group != '')$rooms_prop[$room['rid']]['groups'][$group] = $groupsInfo[$group];
			}
		}		
	}

	$pnRender->assign('rooms', $rooms_prop);
	return $pnRender->fetch('iw_chat_admin_main.htm');
}

/**
 * Show the module information
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @return	The module information
 */
function iw_chat_admin_module(){
	$dom = ZLanguage::getModuleDomain('iw_chat');
	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_chat',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_chat', 'type' => 'admin'));

	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_chat_admin_module.htm');
}

/**
 * Show a form to create/edit a new chat room
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @return	The chat room creation form
 */
function iw_chat_admin_newEdit($args){
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : false, 'GET');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : false, 'POST');
	$room_name = FormUtil::getPassedValue('room_name', isset($args['room_name']) ? $args['room_name'] : null, 'GETPOST');
	$room_desc = FormUtil::getPassedValue('room_desc', isset($args['room_desc']) ? $args['room_desc'] : null, 'GETPOST');
	$active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'GETPOST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

    if($confirm){
		// Create the room entry
	    $result = pnModAPIFunc('iw_chat', 'admin', 'update',
                                array( 'room_name' => $room_name,
                                       'room_desc' => $room_desc,
                                       'active' => $active));
		if(!$result) LogUtil::registerError (__('Cannot create/modify the room', $dom));
		
		return pnRedirect(pnModURL('iw_chat', 'admin', 'main'));		
	}else{		
		// Show the form
		if($rid){
			$room_params = pnModAPIFunc('iw_chat', 'user', 'getAllRooms',
                                         array('rid' => $rid));
			$room_name = $room_params[0]['room_name'];
			$room_desc = $room_params[0]['room_desc'];
			$active = $room_params[0]['active'];
			$groups = $room_params[0]['groups'];
		}
				
		// Create output object
		$pnRender = pnRender::getInstance('iw_chat',false);
		$pnRender -> assign('rid', $rid);
		$pnRender -> assign('room_name', $room_name);
		$pnRender -> assign('room_desc', $room_desc);
		$pnRender -> assign('active', $active);
		$pnRender -> assign('groups', $groups);
		return $pnRender -> fetch('iw_chat_admin_newEdit.htm');
	}
}


/**
 * Add a group to the chat room
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @param	array with the group identity
 * @return	Redirect user to main admin page
 */
function iw_chat_admin_addGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'GETPOST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$gid = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	if(!$confirm){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv));

		// Create output object
		$pnRender = pnRender::getInstance('iw_chat',false);
		$pnRender -> assign ('groups',$groups);
		$pnRender -> assign ('rid',$rid);
		return $pnRender -> fetch('iw_chat_admin_addGroup.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_chat', 'admin', 'main'));
	}

	// Needed argument
	if (!isset($gid) || $gid == 0) {
		LogUtil::registerError (__('Please, select a group', $dom));
		return pnRedirect(pnModURL('iw_chat', 'admin', 'main'));
	}

	$room_params = pnModAPIFunc('iw_chat', 'user', 'getAllRooms',
                                 array('rid' => $rid));
	//$groups = ($room_params[0]['groups'] == '') ? $gid : $room_params[0]['groups'].'$$'.$gid;		
	$groups = $room_params[0]['groups'].'$'.$gid.'$';		
	
    $result = pnModAPIFunc('iw_chat', 'admin', 'update',
                            array('rid' => $rid,
                                  'room_name' => $room_params[0]['room_name'],
                                  'room_desc' => $room_params[0]['room_desc'],
                                  'active' => $room_params[0]['active'],
                                  'groups' => $groups));

	//add the group in database and send automatic message if it is necessary
	if ($result) {
		//Success
		LogUtil::registerStatus (__('Group added', $dom));
	}

	return pnRedirect(pnModURL('iw_chat', 'admin', 'main'));
}

/**
 * Delete a group to the chat room
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @param	the information of the group that have to be deleted
 * @return	Redirect user to main admin page
 */
function iw_chat_admin_deleteGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'REQUEST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$room_params = pnModAPIFunc('iw_chat', 'user', 'getAllRooms',
                                 array('rid' => $rid));

	if(!$confirm){
		//get all groups information
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo',
                                 array('sv' => $sv));

		// Create output object
		$pnRender = pnRender::getInstance('iw_chat',false);

		$pnRender -> assign ('groupName',$groupsInfo[$gid]);
		$pnRender -> assign ('room_name',$room_params[0]['room_name']);
		$pnRender -> assign ('gid',$gid);
		$pnRender -> assign ('rid',$rid);

		return $pnRender -> fetch('iw_chat_admin_deleteGroup.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_chat', 'admin', 'main'));
	}
	
	/*$numgroups = count(explode('$$', $room_params[0]['groups']));
	$groups = ($numgroups != '1') ? str_replace('$$'.$gid, '', $room_params[0]['groups']) : '';*/
	$groups = str_replace('$'.$gid.'$', '', $room_params[0]['groups']);	
	
	$result = pnModAPIFunc('iw_chat', 'admin', 'update', array( 	'rid' => $rid,
																	'room_name' => $room_params[0]['room_name'],
																	'room_desc' => $room_params[0]['room_desc'],
																	'active' => $room_params[0]['active'],
																	'groups' => $groups));
	
	if ($result) {
		//Success
		LogUtil::registerStatus (__('The access has been deleted', $dom));
   	}

	return pnRedirect(pnModURL('iw_chat', 'admin', 'main'));
}


/**
 * Delete a forum
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @param	the information of the chat that is going to be deleted
 * @return	Redirect user to main admin page
 */
function iw_chat_admin_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'GETPOST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');

	// Security check
    if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

	//Get item
    $item = pnModAPIFunc('iw_chat', 'user', 'getAllRooms',
                          array('rid' => $rid));
	if ($item == false) {
		LogUtil::registerError (__('Chat room not found', $dom));
		return pnRedirect(pnModURL('iw_chat', 'admin', 'main'));
	}

	if(!$confirm){
		// Create output object
		$pnRender = pnRender::getInstance('iw_chat',false);
		$pnRender -> assign ('item',$item[0]);
		return $pnRender -> fetch('iw_chat_admin_delete.htm');
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_chat', 'admin', 'main'));
	}

	if (pnModAPIFunc('iw_chat','admin','delete',array('rid' => $rid))) {
		//Success
		LogUtil::registerStatus (__('The chat room has been deleted', $dom));
	}

	return pnRedirect(pnModURL('iw_chat', 'admin', 'main'));
}



/**
 * Show a form to create/edit a new chat room
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @return	The chat room creation form
 */
function iw_chat_admin_configure($args){
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$delay = FormUtil::getPassedValue('delay', isset($args['delay']) ? $args['delay'] : false, 'POST');
	$max_len = FormUtil::getPassedValue('max_len', isset($args['max_len']) ? $args['max_len'] : false, 'POST');
	$theme = FormUtil::getPassedValue('theme', isset($args['theme']) ? $args['theme'] : null, 'POST');
	$private_dir = FormUtil::getPassedValue('private_dir', isset($args['private_dir']) ? $args['private_dir'] : null, 'POST');
	$sound = FormUtil::getPassedValue('sound', isset($args['sound']) ? $args['sound'] : 0, 'POST');
	$change = false;
	$allow = true;
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	if(($private_dir) && ($private_dir != pnModGetVar('iw_chat', 'private_dir'))){
	pnModSetVar('iw_chat', 'private_dir', $private_dir);
	$change = true;
	}
		
	if ((!file_exists(pnModGetVar("iw_main","documentRoot")."/".pnModGetVar("iw_chat","private_dir")))
		|| (!is_writable(pnModGetVar("iw_main","documentRoot")."/".pnModGetVar("iw_chat","private_dir")))
		|| (pnModGetVar('iw_chat', 'private_dir')=='')){
			LogUtil::registerError (__('Private directory don\'t extists or is not writable.<br />It\'s not possible to modify the configuration', $dom));
			$allow = false;
			$change = false;
	}
	
	if ($allow){
		if(($delay) && ($delay != pnModGetVar('iw_chat', 'delay'))){
			pnModSetVar('iw_chat', 'delay', (int)$delay);
			$change = true;
		}
		if(($max_len) && ($max_len != pnModGetVar('iw_chat', 'max_len'))){
			pnModSetVar('iw_chat', 'max_len', (int)$max_len);
			$change = true;
		}
		if(($theme) && ($theme != pnModGetVar('iw_chat', 'theme'))){
			pnModSetVar('iw_chat', 'theme', $theme);
			$change = true;
		}
		if ($sound != pnModGetVar('iw_chat', 'sound')){
			pnModSetVar('iw_chat', 'sound', $sound);
			$change = true;
		}
	}

	if ($change && pnModFunc('iw_chat', 'admin', 'clear', array('key' => 'cache'))) LogUtil::registerStatus (__('Changes success', $dom));
	
	// Check available themes
	$invalid_files = array('.', '..', 'CSV', '.svn', 'index.htm', 'index.html');
	$themes = array();
	$path = 'modules/iw_chat/includes/phpFreeChat/themes';
    $dh = opendir($path);
    while($file = readdir($dh)) 
    {
		if(!in_array($file, $invalid_files)) $themes[] = $file;
    }
    
	$pnRender = pnRender::getInstance('iw_chat',false);
	$pnRender -> assign ('delay', pnModGetVar('iw_chat', 'delay'));
	$pnRender -> assign ('max_len', pnModGetVar('iw_chat', 'max_len'));
	$pnRender -> assign ('theme', pnModGetVar('iw_chat', 'theme'));
	$pnRender -> assign ('private_dir', pnModGetVar('iw_chat', 'private_dir'));
	$pnRender -> assign ('themes', $themes);
	$pnRender -> assign ('sound', pnModGetVar('iw_chat', 'sound'));
	
	return $pnRender -> fetch('iw_chat_admin_configure.htm');	
}


function iw_chat_admin_clear ($args)
{
    if (!(SecurityUtil::checkPermission('freechat::', '::', ACCESS_ADMIN)))
      return LogUtil::registerPermissionError();

	$key = FormUtil::getPassedValue('key', isset($args['key']) ? $args['key'] : null, 'REQUEST');
	$dir = pnModGetVar("iw_main","documentRoot")."/".pnModGetVar("iw_chat","private_dir");

	switch($key){
		case 'log': $dir .= "/logs";
		case 'chat': $dir .= "/chat";
		case 'cache': $dir .= "/cache";
			
	}
	_iw_chat_deleteDir($dir);
	return true;
}



/**
 * Show a page with documentation for the admin
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @return	The chat room creation form
 */
function iw_chat_admin_documentation($args){
	$dom = ZLanguage::getModuleDomain('iw_chat');
	if (!(SecurityUtil::checkPermission('freechat::', '::', ACCESS_ADMIN)))
      return LogUtil::registerPermissionError();
      
    $pnRender = pnRender::getInstance('iw_chat',false);
	return $pnRender -> fetch('iw_chat_admin_documentation.htm');
}


function _iw_chat_deleteDir($dir) {
   $dhandle = opendir($dir);

   if ($dhandle) {
      while (false !== ($fname = readdir($dhandle))) {
         if (is_dir( "{$dir}/{$fname}" )) {
            if (($fname != '.') && ($fname != '..')) {
               _freechat_deleteDir("$dir/$fname");
            }
         } else {
            unlink("{$dir}/{$fname}");
         }
      }
      closedir($dhandle);
    }
   rmdir($dir);
   return true;
}


