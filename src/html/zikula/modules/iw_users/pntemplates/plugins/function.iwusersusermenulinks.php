<?php
function smarty_function_iwusersusermenulinks($params, &$smarty)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
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
	$usersusermenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_READ)) {
		$usersusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'user', 'main')) . "\">" . __('Shows the groups I belong',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_COMMENT)) {
		$usersusermenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'user', 'main', array('all' => 1))) . "\">" . __('Show all the groups',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_users::', "::", ACCESS_READ) && pnModGetVar('iw_users', 'friendsSystemAvailable') == 1) {
		$usersusermenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_users', 'user', 'members', array('gid' => -1))) . "\">" . __('Show contacts\' list',$dom) . "</a> ";
	}
	$usersusermenulinks .= $params['end'] . "</span>\n";
	return $usersusermenulinks;
}
