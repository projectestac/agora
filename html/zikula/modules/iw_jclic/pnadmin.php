<?php
/**
 * Show the main configurable parameters needed to configurate the module jclic
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)

 * @return:	The form with needed to change the parameters
*/
function iw_jclic_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$jclicUpdatedFiles = pnModGetVar('iw_jclic','jclicUpdatedFiles');
	$jclicJarBase = pnModGetVar('iw_jclic','jclicJarBase');
	$timeLap = pnModGetVar('iw_jclic','timeLap');
	$groupsProAssign = pnModGetVar('iw_jclic','groupsProAssign');

	// Create output object
	$pnRender = pnRender::getInstance('iw_jclic',false);

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));
																	
	foreach($groups as $group){
		$checked = false;
		
		if(strpos($groupsProAssign,'$'.$group['id'].'$') != false){
			$checked = true;	
		}
		
		$groupsArray[] = array('id' => $group['id'],
								'name' => $group['name'],
								'checked' => $checked);
	}

	if(!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.$jclicUpdatedFiles) || $jclicUpdatedFiles == ''){
		$pnRender -> assign('noFolder', true);
	}else{
		if(!is_writeable(pnModGetVar('iw_main', 'documentRoot').'/'.$jclicUpdatedFiles)){
			$pnRender -> assign('noWriteable', true);
		}
	}

	$pnRender -> assign('jclicJarBase', $jclicJarBase);
	$pnRender -> assign('timeLap', $timeLap);
	$pnRender -> assign('jclicUpdatedFiles', $jclicUpdatedFiles);
	$pnRender -> assign('groupsArray', $groupsArray);
	
	return $pnRender -> fetch('iw_jclic_admin_main.htm');
}

/**
 * Show the information about the module
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The information about this module
*/
function iw_jclic_admin_module()
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	// Create output object
	$pnRender = pnRender::getInstance('iw_jclic',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_jclic',
																'type' => 'admin'));
																
	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_jclic_admin_module.htm');
}

/**
 * Update the module configuration
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	Configuration values
 * @return:	The form with needed to change the parameters
*/
function iw_jclic_admin_updateConf($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	$jclicJarBase = FormUtil::getPassedValue('jclicJarBase', isset($args['jclicJarBase']) ? $args['jclicJarBase'] : null, 'POST');
	$timeLap = FormUtil::getPassedValue('timeLap', isset($args['timeLap']) ? $args['timeLap'] : null, 'POST');
	$groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');
	$jclicUpdatedFiles = FormUtil::getPassedValue('jclicUpdatedFiles', isset($args['jclicUpdatedFiles']) ? $args['jclicUpdatedFiles'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_jclic', 'admin', 'main'));
	}
	
	$groupsString = '$';
	foreach($groups as $group){
		$groupsString .= '$'.$group.'$';
	}

	pnModSetVar('iw_jclic','jclicUpdatedFiles', $jclicUpdatedFiles);
	pnModSetVar('iw_jclic','jclicJarBase', $jclicJarBase);
	pnModSetVar('iw_jclic','timeLap', $timeLap);
	pnModSetVar('iw_jclic','groupsProAssign', $groupsString);

	LogUtil::registerStatus (__('The module configuration has changed', $dom));

	return pnRedirect(pnModURL('iw_jclic', 'admin', 'main'));
}
