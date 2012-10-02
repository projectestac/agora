<?php
function smarty_function_iwnoteboardusermenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$tema = pnVarCleanFromInput('tema');

	//Get the user permissions in noteboard
	$permisos = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));

	// set some defaults
	if (!isset($params['start'])) {
		$params['start'] = '[';
	}
	if (!isset($params['end'])) {
		$params['end'] = ']';
	}
	if (!isset($params['seperator'])) {
		$params['seperator'] = '|';
	}
	if (!isset($params['class'])) {
		$params['class'] = 'pn-menuitem-title';
	}

	$noteboardusermenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ) && $permisos['nivell'] >= 3) {
		$noteboardusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_noteboard', 'user', 'nova',array('m' => 'n', 'tema' => $tema))) . "\">" . __('Add a new note',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		$noteboardusermenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_noteboard', 'user', 'main', array('tema' => $tema))) . "\">" . __('View notes list',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ) && $permisos['potverificar']) {
		$noteboardusermenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_noteboard', 'user', 'main', array('tema' => $tema, 'saved' => '1'))) . "\">" . __('Show the notes stored (expired)',$dom) . "</a> ";
	}

	$noteboardusermenulinks .= $params['end'] . "</span>\n";

	return $noteboardusermenulinks;
}
