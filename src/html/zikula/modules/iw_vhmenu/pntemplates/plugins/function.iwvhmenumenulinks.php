<?php
function smarty_function_iwvhmenumenulinks($params, &$smarty)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
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

	$vhmenumenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_vhmenu::', "::", ACCESS_ADMIN)) {
		$vhmenumenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_vhmenu', 'admin', 'new', array('m' => 'n'))) . "\">" . __('Add a new option to the menu',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_vhmenu::', "::", ACCESS_ADMIN)) {
		$vhmenumenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_vhmenu', 'admin', 'main')) . "\">" . __('Show the options',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_vhmenu::', "::", ACCESS_ADMIN)) {
		$vhmenumenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_vhmenu', 'admin', 'conf')) . "\">" . __('Configure the module',$dom) . "</a> ";
	}

	$vhmenumenulinks .= $params['end'] . "</span>\n";

	return $vhmenumenulinks;
}
