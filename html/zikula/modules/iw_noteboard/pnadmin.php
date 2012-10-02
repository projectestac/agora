<?php
/**
 * Show the manage module site
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		The configuration information
 */
function iw_noteboard_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
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
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	// Get the themes from the database
	$themes = pnModAPIFunc('iw_noteboard','user','getalltemes');

	// Get all the groups information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupsInfo = pnModFunc('iw_main','user','getAllGroupsInfo', array('sv' => $sv));

	//Agefim la llista de temes on classificar les notÃ­cies
	foreach($themes as $theme){
		if($theme['descriu'] == ''){$theme['descriu'] = '---';}
		$grup = ($theme['grup'] == 0) ? __('All',$dom) : $groupsInfo[$theme['grup']];
		if($grup == ''){$grup = '???';}		
		$temes_array[] = array('tid' => $theme['tid'],
								'nomtema' => $theme['nomtema'],
								'descriu' => $theme['descriu'],
								'grup' => $grup);
	}

	$shareds = pnModAPIFunc('iw_noteboard','user','getallSharedURL');

	$grupsModVar = pnModGetVar('iw_noteboard','grups');
	$permisosModVar = pnModGetVar('iw_noteboard','permisos');
	$marcatModVar = pnModGetVar('iw_noteboard','marcat');
	$verificaModVar = pnModGetVar('iw_noteboard','verifica');
	$quiverifica = pnModGetVar('iw_noteboard','quiverifica');
	$caducitat = pnModGetVar('iw_noteboard','caducitat');
	$colorrow1 = pnModGetVar('iw_noteboard','colorrow1');
	$colorrow2 = pnModGetVar('iw_noteboard','colorrow2');
	$colornewrow1 = pnModGetVar('iw_noteboard','colornewrow1');
	$colornewrow2 = pnModGetVar('iw_noteboard','colornewrow2');
	$attached = pnModGetVar('iw_noteboard','attached');
	$directoriroot = pnModGetVar('iw_main','documentRoot');
	$notRegisteredSeeRedactors = pnModGetVar('iw_noteboard','notRegisteredSeeRedactors');
	$multiLanguage = pnModGetVar('iw_noteboard','multiLanguage');
	$public = pnModGetVar('iw_noteboard','public');
	$showSharedURL = pnModGetVar('iw_noteboard','showSharedURL');
	$topicsSystem = pnModGetVar('iw_noteboard','topicsSystem');
	$publicSharedURL = pnModGetVar('iw_noteboard','publicSharedURL');
	$sharedName = pnModGetVar('iw_noteboard','sharedName');
	$editPrintAfter = pnModGetVar('iw_noteboard','editPrintAfter');
	$repperdefecte = pnModGetVar('iw_noteboard','repperdefecte');
	

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'plus' => __('Unregistered', $dom),
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));

	if(!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_noteboard','attached')) || pnModGetVar('iw_noteboard','attached') == ''){
		$pnRender -> assign('noFolder', true);
	}else{
		if(!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_noteboard','attached'))){
			$pnRender -> assign('noWriteable', true);
		}
	}

	foreach($groups as $group){
		if(strpos($grupsModVar,'$'.$group['id'].'$') != 0){$select = true;}else{$select = false;}
		if(strpos($marcatModVar,'$'.$group['id'].'$') != 0){$select1 = true;}else{$select1 = false;}
		if(strpos($verificaModVar,'$'.$group['id'].'$') != 0){$select2 = true;}else{$select2 = false;}		
		$permis = substr($permisosModVar,strpos($permisosModVar,'$'.$group['id'].'-') + strlen($group['id']) + 2,1);		
		$grups_array[] = array('id' => $group['id'],
								'select' => $select,
								'name' => $group['name'],
								'select1' => $select1,
								'select2' => $select2,
								'permis' => $permis);
	}

	foreach($shareds as $shared){
		$url = str_replace('http://','*******',$shared['url']);
		$url = str_replace('/','/<br>',$url);
		$url = str_replace('*******','http://',$url);
		$sharedsArray[] = array('pid' => $shared['pid'],
								'name' => $shared['name'],
								'url' => $url,
								'descriu' => $shared['descriu'],
								'testDate' => $shared['testDate']);
	}
    $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
	$pnRender -> assign('multizk', $multizk);
	$pnRender -> assign('temes', $temes_array);
	$pnRender -> assign('grups', $grups_array);
	$pnRender -> assign('quiverifica', $quiverifica);
	$pnRender -> assign('caducitat', $caducitat);
	$pnRender -> assign('repperdefecte', $repperdefecte);
	$pnRender -> assign('colorrow1', $colorrow1);
	$pnRender -> assign('colorrow2', $colorrow2);
	$pnRender -> assign('colornewrow1', $colornewrow1);
	$pnRender -> assign('colornewrow2', $colornewrow2);
	$pnRender -> assign('attached', $attached);
	$pnRender -> assign('directoriroot', $directoriroot);
	$pnRender -> assign('notRegisteredSeeRedactors', $notRegisteredSeeRedactors);
	$pnRender -> assign('multiLanguage', $multiLanguage);
	$pnRender -> assign('public', $public);
	$pnRender -> assign('showSharedURL', $showSharedURL);
	$pnRender -> assign('topicsSystem', $topicsSystem);
	$pnRender -> assign('shareds', $sharedsArray);
	$pnRender -> assign('publicSharedURL', $publicSharedURL);
	$pnRender -> assign('sharedName', $sharedName);
	$pnRender -> assign('editPrintAfter', $editPrintAfter);

	if($topicsSystem == 1){
		// load necessary classes
		Loader::loadClass('CategoryUtil');
		// get categories
		$cats = CategoryUtil::getCategoriesByParentID(30);
		$pnRender -> assign('cats', $cats);
	}

	return $pnRender -> fetch('iw_noteboard_admin_conf.htm');
}

/**
 * Show the module information
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_noteboard_admin_module(){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_noteboard', 'type' => 'admin'));

	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_noteboard_admin_module.htm');
}

/**
 * Update the configuration values
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @params	The config values from the form
 * @return	Thue if success
 */
function iw_noteboard_admin_confupdate($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$g = FormUtil::getPassedValue('g', isset($args['g']) ? $args['g'] : null, 'POST');
	$p = FormUtil::getPassedValue('p', isset($args['p']) ? $args['p'] : null, 'POST');	
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['mm'] : null, 'POST');	
	$v = FormUtil::getPassedValue('v', isset($args['v']) ? $args['v'] : null, 'POST');	
	$q = FormUtil::getPassedValue('q', isset($args['q']) ? $args['q'] : null, 'POST');	
	$c = FormUtil::getPassedValue('c', isset($args['c']) ? $args['c'] : null, 'POST');	
	$r = FormUtil::getPassedValue('r', isset($args['r']) ? $args['r'] : null, 'POST');	
	$ext = FormUtil::getPassedValue('ext', isset($args['ext']) ? $args['ext'] : null, 'POST');	
	$mida = FormUtil::getPassedValue('mida', isset($args['mida']) ? $args['mida'] : null, 'POST');	
	$color1 = FormUtil::getPassedValue('color1', isset($args['color1']) ? $args['color1'] : null, 'POST');	
	$color2 = FormUtil::getPassedValue('color2', isset($args['color2']) ? $args['color2'] : null, 'POST');	
	$colornew1 = FormUtil::getPassedValue('colornew1', isset($args['colornew1']) ? $args['colornew1'] : null, 'POST');	
	$colornew2 = FormUtil::getPassedValue('colornew2', isset($args['colornew2']) ? $args['colornew2'] : null, 'POST');
	$attached = FormUtil::getPassedValue('attached', isset($args['attached']) ? $args['attached'] : null, 'POST');
	$notRegisteredSeeRedactors = FormUtil::getPassedValue('notRegisteredSeeRedactors', isset($args['notRegisteredSeeRedactors']) ? $args['notRegisteredSeeRedactors'] : null, 'POST');
	$multiLanguage = FormUtil::getPassedValue('multiLanguage', isset($args['multiLanguage']) ? $args['multiLanguage'] : null, 'POST');
	$public = FormUtil::getPassedValue('public', isset($args['public']) ? $args['public'] : null, 'POST');
	$showSharedURL = FormUtil::getPassedValue('showSharedURL', isset($args['showSharedURL']) ? $args['showSharedURL'] : null, 'POST');
	$topicsSystem = FormUtil::getPassedValue('topicsSystem', isset($args['topicsSystem']) ? $args['topicsSystem'] : null, 'POST');
	$regenerateShared = FormUtil::getPassedValue('regenerateShared', isset($args['regenerateShared']) ? $args['regenerateShared'] : null, 'POST');
	$sharedName = FormUtil::getPassedValue('sharedName', isset($args['sharedName']) ? $args['sharedName'] : null, 'POST');
	$editPrintAfter = FormUtil::getPassedValue('editPrintAfter', isset($args['editPrintAfter']) ? $args['editPrintAfter'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'admin', 'main'));
	}

	if (empty($mida)){$mida = 0;}

	$select = '$$';
	foreach($g as $g1){$select .= $g1.'$';}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'plus' => __('Unregistered', $dom),
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));
	
	$i = 0;
	$permisos = '$$';
	foreach($groups as $group){
		$permisos .= $group['id'].'-'.$p[$i].'$';
		$i++;
	}

	$marcat = '$$';
	foreach($m as $m1){$marcat .= $m1.'$';}

	$verifica='$$';
	foreach($v as $v1){$verifica .= $v1.'$';}

	if($regenerateShared == 1 || pnModGetVar('iw_noteboard','publicSharedURL') == ''){
		$publicSharedValue = pnModFunc('iw_noteboard', 'admin', 'regenerateShared');
		LogUtil::registerStatus (__('The shared URL has been modified. Remember to notify it to everybody you need', $dom));
	}

	pnModSetVar('iw_noteboard', 'grups', $select);
	pnModSetVar('iw_noteboard', 'permisos', $permisos);
	pnModSetVar('iw_noteboard', 'marcat', $marcat);
	pnModSetVar('iw_noteboard', 'verifica', $verifica);
	pnModSetVar('iw_noteboard', 'quiverifica', $q);
	pnModSetVar('iw_noteboard', 'caducitat', $c);
	pnModSetVar('iw_noteboard', 'repperdefecte', $r);
	pnModSetVar('iw_noteboard', 'colorrow1', $color1);
	pnModSetVar('iw_noteboard', 'colorrow2', $color2);
	pnModSetVar('iw_noteboard', 'colornewrow1', $colornew1);
	pnModSetVar('iw_noteboard', 'colornewrow2', $colornew2);
	pnModSetVar('iw_noteboard', 'attached', $attached);
	pnModSetVar('iw_noteboard', 'notRegisteredSeeRedactors', $notRegisteredSeeRedactors);
	pnModSetVar('iw_noteboard', 'multiLanguage', $multiLanguage);
	pnModSetVar('iw_noteboard', 'public', $public);
	pnModSetVar('iw_noteboard', 'showSharedURL', $showSharedURL);
	pnModSetVar('iw_noteboard', 'topicsSystem', $topicsSystem);
	pnModSetVar('iw_noteboard', 'sharedName', $sharedName);
	pnModSetVar('iw_noteboard', 'editPrintAfter', $editPrintAfter);

	LogUtil::registerStatus (__('The configuration has been modified', $dom));
	return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
}

/**
 * Show a form needed to create a new topic
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	The form fields
 */
function iw_noteboard_admin_noutema(){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Gets the groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('plus' => __('All', $dom),
																	'less' => pnModGetVar('iw_myrole', 'rolegroup'),
																	'sv' => $sv));
		
	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);
	
	$pnRender -> assign('grups', $groups);
	$pnRender -> assign('title', __('Create a new topic', $dom));
	$pnRender -> assign('submit', __('Create the topic', $dom));
	
	return $pnRender -> fetch('iw_noteboard_admin_noutema.htm');
}

/**
 * Create a new topic
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the topic information
 * @return	redirect the user to the main admin page
 */
function iw_noteboard_admin_crear($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// get the parameters sended from the form
	$nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');	
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');	
	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'admin', 'main'));
	}
	
	// create the new topic
	$lid = pnModAPIFunc('iw_noteboard','admin','crear', array('nomtema' => $nomtema,
									'descriu' => $descriu,
									'grup'=>$grup));

	if ($lid != false) {
		// Success
		LogUtil::registerStatus (__('A new topic has been created', $dom));
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule', array('name' => 'nbtopics',
																	'module' => 'iw_noteboard',
																	'sv' => $sv));		
	}
	
	// Redirect to the main site for the admin
	return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
}

/**
 * Give access to a form from where the topics information can be edited
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the topic id
 * @return	The topics edit form
 */
function iw_noteboard_admin_editar($args){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'GET');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
	if (!empty($objectid)) {
		$tid = $objectid;
	}
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard', false);
	
	$registre = pnModAPIFunc('iw_noteboard', 'user', 'gettema', array('tid' => $tid));

	if ($registre == false) {
		LogUtil::registerError (__('The topic has not been found', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
	}

	// Get all the groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('plus' =>__('All', $dom),
																	'sv' => $sv,
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));

	$pnRender -> assign('tid', $tid);
	$pnRender -> assign('title', __('Edit a topic', $dom));
	$pnRender -> assign('nomtema', $registre['nomtema']);
	$pnRender -> assign('descriu', $registre['descriu']);
	$pnRender -> assign('grup', $registre['grup']);
	$pnRender -> assign('grups', $groups);
	$pnRender -> assign('submit', __('Modify the topic', $dom));
	$pnRender -> assign('m', 1);

	return $pnRender -> fetch('iw_noteboard_admin_noutema.htm');
}

/**
 * Update a topic information
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the arguments needed
 * @return	Redirect the user to the admin main page
 */
function iw_noteboard_admin_modificar($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');
    	$nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');
    	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
    	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'admin', 'main'));
	}
	
	$lid = pnModAPIFunc('iw_noteboard', 'admin', 'modificar', array('tid' => $tid,
									'nomtema' => $nomtema,
									'descriu' => $descriu,
									'grup' => $grup));
	if($lid != false) {
		// Success
		LogUtil::registerStatus (__('The topic has been modified', $dom));
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule', array('name' => 'nbtopics',
									'module' => 'iw_noteboard',
									'sv' => $sv));	
	}

	// Return to admin pannel
	return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
}

/**
 * Show a form needed to create a new shared link
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	The form fields
 */
function iw_noteboard_admin_newShared(){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

		
	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	$pnRender -> assign('title', __('Create a new linked noteboard', $dom));
	$pnRender -> assign('submit', __('Create', $dom));
	
	return $pnRender -> fetch('iw_noteboard_admin_newShared.htm');
}

/**
 * Create a new shared url
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the topic information
 * @return	redirect the user to the main admin page
 */
function iw_noteboard_admin_createShared($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// get the parameters sended from the form
	$url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');	
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');	
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'admin', 'main'));
	}

	// create the new shared url
	$lid = pnModAPIFunc('iw_noteboard','admin','createShared', array('url' => $url,
											'descriu' => $descriu));

	//Check if the shared nateboard is available and shared. If not returns false
	$available = true;

	if(!$available){
		LogUtil::registerError (__('The noteboard is not available or is not shared', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
	}

	if ($lid != false) {
		// Success
		LogUtil::registerStatus (__('A new topic has been created', $dom));
/*		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule', array('name' => 'nbtopics',
											'module' => 'iw_noteboard',
											'sv' => $sv));*/
	}
	
	// Redirect to the main site for the admin
	return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
}


/**
 * Give access to a form from where the shared information can be edited
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the topic id
 * @return	The topics edit form
 */
function iw_noteboard_admin_editShared($args){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$pid = FormUtil::getPassedValue('pid', isset($args['pid']) ? $args['pid'] : null, 'GET');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
	if (!empty($objectid)) {
		$pid = $objectid;
	}
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard', false);
	
	$registre = pnModAPIFunc('iw_noteboard', 'user', 'getShared', array('pid' => $pid));

	if ($registre == false) {
		LogUtil::registerError (__('The topic has not been found', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
	}

	$pnRender -> assign('pid', $pid);
	$pnRender -> assign('title', __('Edit a topic', $dom));
	$pnRender -> assign('url', $registre['url']);
	$pnRender -> assign('descriu', $registre['descriu']);
	$pnRender -> assign('submit', __('Modify the topic', $dom));
	$pnRender -> assign('m', 1);

	return $pnRender -> fetch('iw_noteboard_admin_newShared.htm');
}

/**
 * Update a shared URL information
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the arguments needed
 * @return	Redirect the user to the admin main page
 */
function iw_noteboard_admin_updateShared($args)
{
	
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$pid = FormUtil::getPassedValue('pid', isset($args['pid']) ? $args['pid'] : null, 'POST');
    	$url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
    	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'admin', 'main'));
	}
	
	$lid = pnModAPIFunc('iw_noteboard', 'admin', 'editShared', array('pid' => $pid,
											'url' => $url,
											'descriu' => $descriu));
	if($lid != false) {
		// Success
		LogUtil::registerStatus (__('The shared noteboard URL has been modified', $dom));
/*		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule', array('name' => 'nbtopics',
									'module' => 'iw_noteboard',
									'sv' => $sv));*/
	}

	// Return to admin pannel
	return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
}

/**
 * Check if a noteboard is ahared and available
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the shared noteboard
 * @return:	The shared parameters of false if the noteboard requested is not shared
*/
function iw_noteboard_admin_checkShared($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');	
	$pid = FormUtil::getPassedValue('pid', isset($args['pid']) ? $args['pid'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($pid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
	}

	// Get the item
	$item =  pnModAPIFunc('iw_noteboard','user','getShared',array('pid' => $pid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	$shared = pnModFunc('iw_noteboard', 'admin', 'requestShared', array('url' => $item['url']));

	if($shared){
		LogUtil::registerStatus (__('The noteboard is shared and it is available', $dom));
	}else{
		LogUtil::registerError (__('The noteboard is not shared or it is not available in this moment', $dom));
	}

	return pnRedirect(pnModURL('iw_noteboard', 'admin', 'main'));
}

/**
 * Get the values of the request shared
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the shared noteboard
 * @return:	The shared parameters of false if the noteboard requested is not shared
*/
function iw_noteboard_admin_requestShared($args)
{
    $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');

	//AquÃ­ hi hauria d'anar la part que consulta al tauler d'un altre espai. Caldrï¿œ construir un servlet o alguna cosa de l'estil

	return true;
}


/**
 * Regenerate shared url with another shared value
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	Thue if success and false otherwise
*/
function iw_noteboard_admin_regenerateShared()
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	$randomValue = rand(0,350000).time();

	pnModSetVar('iw_noteboard', 'publicSharedURL', md5($randomValue));

	return md5($randomValue);
}


function iw_noteboard_admin_sharedOptions($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$public = FormUtil::getPassedValue('public', isset($args['public']) ? $args['public'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//get shared sid
	$publicSharedURL = pnModGetVar('iw_noteboard','publicSharedURL');

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard', false);
	$pnRender -> assign('public', $public);
	$pnRender -> assign('publicSharedURL', $publicSharedURL);
	
	return $pnRender -> fetch('iw_noteboard_admin_confSharedOptions.htm');
}