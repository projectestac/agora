<?php
/**
 * Show the manage module site
 * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return	The configuration information
 */
function iw_qv_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Get module vars	
	$skins = pnModGetVar('iw_qv','skins');
	$langs = pnModGetVar('iw_qv','langs');
	$maxdelivers = pnModGetVar('iw_qv','maxdelivers');
	$basedisturl = pnModGetVar('iw_qv','basedisturl');
		
	
/*	if(!file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_qv','attached')) || pnModGetVar('iw_qv','attached') == ''){
		$pnRender -> assign('noFolder', true);
	}
*/	

	// Create output object
	$pnRender = pnRender::getInstance('iw_qv',false);
	$pnRender -> assign('security', pnSecGenAuthKey());
	$pnRender -> assign('skins', $skins);
	$pnRender -> assign('langs', $langs);
	$pnRender -> assign('maxdelivers', $maxdelivers);
	$pnRender -> assign('basedisturl', $basedisturl);
	return $pnRender -> fetch('iw_qv_admin_conf.htm');
}

/**
 * Show the module information
 * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return	The module information
 */
function iw_qv_admin_module(){
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_qv', 'type' => 'admin'));

	// Create output object
	$pnRender = pnRender::getInstance('iw_qv',false);
	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_qv_admin_module.htm');
}

/**
 * Update the configuration values
 * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @params	The config values from the form
 * @return	Thue if success
 */
function iw_qv_admin_confupdate($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	$skins = FormUtil::getPassedValue('skins', isset($args['skins']) ? $args['skins'] : null, 'POST');
	$langs = FormUtil::getPassedValue('langs', isset($args['langs']) ? $args['langs'] : null, 'POST');
	$maxdelivers = FormUtil::getPassedValue('maxdelivers', isset($args['maxdelivers']) ? $args['maxdelivers'] : null, 'POST');
	$basedisturl = FormUtil::getPassedValue('basedisturl', isset($args['basedisturl']) ? $args['basedisturl'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_qv', 'admin', 'main'));
	}
	if (isset($skins)) pnModSetVar('iw_qv', 'skins', $skins);
	if (isset($langs)) pnModSetVar('iw_qv', 'langs', $langs);
	if (isset($maxdelivers)) pnModSetVar('iw_qv', 'maxdelivers', $maxdelivers);
	if (isset($basedisturl)) pnModSetVar('iw_qv', 'basedisturl', $basedisturl);
	
	LogUtil::registerStatus (pnML(__f('Done! %1$s updated.', __('settings', $dom), $dom)));
	return pnRedirect(pnModURL('iw_qv', 'admin', 'main'));
}

