<?php
function smarty_function_iwwebboxmenulinks($params, &$smarty)
{
	$dom=ZLanguage::getModuleDomain('iw_webbox');
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
	
    $webboxmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

    if (SecurityUtil::checkPermission('iw_webbox::', "::", ACCESS_ADMIN)) {
        $webboxmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_webbox', 'admin', 'main')) . "\">" . __('Show existing URL',$dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('iw_webbox::', "::", ACCESS_ADMIN)) {
        $webboxmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_webbox', 'admin', 'new')) . "\">" . __('Add new URL',$dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('iw_webbox::', "::", ACCESS_ADMIN)) {
        $webboxmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_webbox', 'admin', 'conf')) . "\">" . __('Module configuration',$dom) . "</a> ";
    }

    $webboxmenulinks .= $params['end'] . "</span>\n";

    return $webboxmenulinks;
}
