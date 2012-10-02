<?php
function smarty_function_iwqvusermenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// set some defaults
	if (!isset($params['start'])) {
		$params['start'] = '[';
	}
	if (!isset($params['end'])) {
		$params['end'] = ']';
	}
	if (!isset($params['separator'])) {
		$params['separator'] = '|';
	}
	if (!isset($params['class'])) {
		$params['class'] = 'pn-menuitem-title';
	}

	$html = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
	
	if (SecurityUtil::checkPermission('iw_qv::', "::", ACCESS_READ)) {
		$html .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_qv', 'user', 'main', array())) . "\">" . __('Home page',$dom) . "</a> " ;
		$html .= $params['separator']. " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_qv', 'user', 'show_assignments_to_answer', array())) . "\">" . __('View assignments',$dom) . "</a> " ;
	}

	if (SecurityUtil::checkPermission('iw_qv::', "::", ACCESS_ADD)) {
		$html .=  $params['separator']. " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_qv', 'user', 'show_assignments_to_correct', array())) . "\">" . __('Correct assignments',$dom) . "</a> ";
		$html .= $params['separator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_qv', 'user', 'assignment_form', array())) . "\">" . __('Assign assessment',$dom) . "</a> ";
	}

	$html .= $params['end'] . "</span>\n";

	return $html;
}
