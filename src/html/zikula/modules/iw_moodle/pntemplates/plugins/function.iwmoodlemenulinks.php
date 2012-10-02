<?php
function smarty_function_iwmoodlemenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	$id = pnVarCleanFromInput('id');
	$func = pnVarCleanFromInput('func');

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

	$moodlemenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_moodle::', "::", ACCESS_ADMIN)) {
		$moodlemenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_moodle', 'admin', 'main')) . "\">" . __('Show available courses',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_moodle::', "::", ACCESS_ADMIN) && isset($func) && $func=='list') {
		$moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_moodle', 'admin', 'enrole', array('id' => $id))) . "\">" . __('Enrol users into the course',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_moodle::', "::", ACCESS_ADMIN)) {
		$moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_moodle', 'admin', 'conf')) . "\">" . __('Module configuration',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_moodle::', "::", ACCESS_ADMIN)) {
		$moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_moodle', 'admin', 'sincron')) . "\">" . __('Synchronize users',$dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('iw_moodle::', "::", ACCESS_ADMIN) && isset($func) && $func=='enrole') {
		$moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_moodle', 'admin', 'list', array('id' => $id))) . "\">" . __('Return to the course users list',$dom) . "</a> ";
	}


	$moodlemenulinks .= $params['end'] . "</span>\n";

	return $moodlemenulinks;
}
