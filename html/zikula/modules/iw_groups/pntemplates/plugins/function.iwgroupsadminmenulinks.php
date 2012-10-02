<?php
function smarty_function_iwgroupsadminmenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
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

	$iwgroupsadminmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)) {
		$iwgroupsadminmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_groups', 'admin', 'new')) . "\">" . __('Add a new group',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)) {
		$iwgroupsadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_groups', 'admin', 'main')) . "\">" . __('View the groups',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)) {
		$iwgroupsadminmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_groups', 'admin', 'membres')) . "\">" . __('Administer the members of the groups ',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)) {
		$iwgroupsadminmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_groups', 'admin', 'configura')) . "\">" . __('Configure the module',$dom) . "</a> ";
	}

	$iwgroupsadminmenulinks .= $params['end'] . "</span>\n";

	return $iwgroupsadminmenulinks;
}
