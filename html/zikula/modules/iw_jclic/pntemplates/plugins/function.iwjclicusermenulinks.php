<?php
function smarty_function_iwjclicusermenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
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

	$jclicusermenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		$jclicusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_jclic', 'user', 'main')) . "\">" . __('Activities I have assigned ',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_READ)) {
		$jclicusermenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_jclic', 'user', 'assigned')) . "\">" . __('Activities assigned',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_jclic::', "::", ACCESS_ADD)) {
		$jclicusermenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_jclic', 'user', 'assig')) . "\">" . __('Assign activities',$dom) . "</a> ";
	}




/*[ Home page | View assignments | Correct assignments | Assign assessment ]*/


	$jclicusermenulinks .= $params['end'] . "</span>\n";

	return $jclicusermenulinks;
}
