<?php
function smarty_function_iwforumsadminmenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$tema = pnVarCleanFromInput('tema');

	//Get the user permissions in forums
	$permisos = pnModAPIFunc('iw_forums', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));

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

	$forumsadminmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		$forumsadminmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'admin', 'new',array('m' => 'n'))) . "\">" . __('Create a new forum',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		$forumsadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'admin', 'main')) . "\">" . __('View the created forums',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		$forumsadminmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'admin', 'conf')) . "\">" . __('Configure the module',$dom) . "</a> ";
	}

	$forumsadminmenulinks .= $params['end'] . "</span>\n";

	return $forumsadminmenulinks;
}
