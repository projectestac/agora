<?php
function smarty_function_iwusersadminmenulinks($params, &$smarty)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
	$filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['attached'] : 0, 'POST');
	$campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : 1, 'POST');
	$numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : 20, 'POST');

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

	$usersadminmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		$usersadminmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'admin', 'new')) . "\">" . __('Create user',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		$usersadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'admin', 'main')) . "\">" . __('Show the list of users',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		$usersadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'admin', 'import')) . "\">" . __('Import from a file',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		$usersadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'admin', 'export')) . "\">" . __('Export to CSV',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_ADMIN)) {
		$usersadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'admin', 'config')) . "\">" . __('Configure the module',$dom) . "</a> ";
	}
	
	$usersadminmenulinks .= $params['end'] . "</span>\n";

	return $usersadminmenulinks;
}
