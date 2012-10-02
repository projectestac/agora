<?php
function smarty_function_iwchatadminmenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	$tema = pnVarCleanFromInput('tema');

	//Get the user permissions in chat
	$permisos = pnModAPIFunc('iw_chat', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));

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

	$chatadminmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		$chatadminmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_chat', 'admin', 'newEdit')) . "\">" . __('Create a new chat room',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		$chatadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_chat', 'admin', 'main')) . "\">" . __('View the created chat rooms',$dom) . "</a>" . $params['seperator'];
	}
	if (SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		$chatadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_chat', 'admin', 'configure')) . "\">" . __('Configure the module',$dom) . "</a>" . $params['seperator'];
	}
	if (SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) {
		$chatadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_chat', 'admin', 'documentation')) . "\">" . __('Documentation',$dom) . "</a> ";
	}

	$chatadminmenulinks .= $params['end'] . "</span>\n";

	return $chatadminmenulinks;
}
