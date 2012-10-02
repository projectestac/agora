<?php
function smarty_function_iwtimeframesadminmenulinks($params, &$smarty)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
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

	$timeframesadminmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_ADMIN)) {
		$timeframesadminmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_TimeFrames', 'admin', 'new', array('m'=>'n'))) . "\">" . __('Add new timeFrame',$dom) . "</a> " . $params['seperator'];	

		$timeframesadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_TimeFrames', 'admin', 'main')) . "\">" . __('Show the timeFrames',$dom) . "</a> ";

	}

	$timeframesadminmenulinks .= $params['end'] . "</span>\n";

	return $timeframesadminmenulinks;
}
 
?>
