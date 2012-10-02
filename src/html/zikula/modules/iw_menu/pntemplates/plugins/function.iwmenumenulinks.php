<?php
function smarty_function_iwmenumenulinks($params, &$smarty)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
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

	$menumenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_menu::', "::", ACCESS_ADMIN)) {
		$menumenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_menu', 'admin', 'new', array('m' => 'n'))) . "\">" . __('Add a new option to the menu',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_menu::', "::", ACCESS_ADMIN)) {
		$menumenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_menu', 'admin', 'main')) . "\">" . __('Show the options',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_menu::', "::", ACCESS_ADMIN)) {
		$menumenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_menu', 'admin', 'conf')) . "\">" . __('Configure the module',$dom) . "</a> ";
	}

	$menumenulinks .= $params['end'] . "</span>\n";

	return $menumenulinks;
}
