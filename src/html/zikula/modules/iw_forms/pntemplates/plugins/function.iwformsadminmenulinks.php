<?php
function smarty_function_iwformsadminmenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
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

	$formsadminmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		$formsadminmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'admin', 'create')) . "\">" . __('Create a new form',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		$formsadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'admin', 'main')) . "\">" . __('Show the forms',$dom) . "</a> " . $params['seperator'];
	}
	
	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		$formsadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'admin', 'import')) . "\">" . __('Import a form',$dom) . "</a> ";
	}
	
	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		$formsadminmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'admin', 'conf')) . "\">" . __('Configure the module',$dom) . "</a> ";
	}

	$formsadminmenulinks .= $params['end'] . "</span>\n";

	return $formsadminmenulinks;
}
