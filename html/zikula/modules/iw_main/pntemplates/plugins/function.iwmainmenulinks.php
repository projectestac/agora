<?php
function smarty_function_iwmainmenulinks()
{
	$dom = ZLanguage::getModuleDomain('iw_main');
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

	$mainmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_main::', "::", ACCESS_ADMIN)) {
		$mainmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_main', 'admin', 'main')) . "\">" . __('Programmed sequences information',$dom) . "</a> " . $params['seperator'];
		$mainmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_main', 'admin', 'conf')) . "\">" . __('Configure parameters',$dom) . "</a> " . $params['seperator'];
		$mainmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_main', 'admin', 'changeAvatarView')) . "\">" . __('Avatar change request',$dom) . "</a> " . $params['seperator'];
		$mainmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_main', 'admin', 'filesList')) . "\">" . __('Manage files',$dom) . "</a> ";
	}

	$mainmenulinks .= $params['end'] . "</span>\n";

	return $mainmenulinks;
}
