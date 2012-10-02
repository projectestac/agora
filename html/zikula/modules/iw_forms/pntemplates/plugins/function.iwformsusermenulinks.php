<?php
function smarty_function_iwformsusermenulinks($params, &$smarty)
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
	
	$fid = $params['fid'];
	$func = $params['func'];

	if(!pnUserLoggedIn() && is_numeric($fid)){
		$form = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
		$notexport = $form['unregisterednotexport'];
	}else{
		$notexport = 0;
	}

	//get user permissions for this form
	if(isset($fid) && is_numeric($fid)){
		$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	}
	
	$formsusermenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
		$formsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'user', 'main')) . "\">" . __('Show the forms',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ) && $access['level'] > 2) {
		$formsusermenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'user', 'new', array('fid' => $fid))) . "\">" . __('Send an annotation',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ) && pnUserLoggedIn() && isset($fid)) {
		$formsusermenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'user', 'sended', array('fid' => $fid))) . "\">" . __('Show the notes I sent',$dom) . "</a> ";
	}

	if (SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ) && isset($fid) && $notexport == 0 && $func != 'sended') {
		$formsusermenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forms', 'user', 'export', array('fid' => $fid))) . "\">" . __('Export to CSV',$dom) . "</a> ";
	}
	
	$formsusermenulinks .= $params['end'] . "</span>\n";

	return $formsusermenulinks;
}
