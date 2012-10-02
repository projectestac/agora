<?php
function smarty_function_filesmenulinks()
{
    $dom = ZLanguage::getModuleDomain('Files');
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
        $params['class'] = 'z-menuitem-title';
    }

    $filesmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

    if (SecurityUtil::checkPermission('Files::', "::", ACCESS_ADD)) {
        $filesmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('Files', 'user', 'main')) . "\">" . __('Manage Files', $dom) . "</a> " . $params['seperator'];
    }
    if (SecurityUtil::checkPermission('Files::', "::", ACCESS_ADMIN)) {
        $filesmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('Files', 'admin', 'main')) . "\">" . __('Module configuration', $dom) . "</a> ";
    }

    $filesmenulinks .= $params['end'] . "</span>\n";

    return $filesmenulinks;
}
