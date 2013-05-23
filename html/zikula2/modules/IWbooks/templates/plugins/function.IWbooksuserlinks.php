<?php

function smarty_function_IWbooksuserlinks($params, &$smarty) {
    $dom = ZLanguage::getModuleDomain('IWbooks');
    extract($params);
    unset($params);

    // set some defaults
    if (!isset($start)) {
        $start = '[';
    }
    if (!isset($end)) {
        $end = ']';
    }
    if (!isset($seperator)) {
        $seperator = '|';
    }
    if (!isset($class)) {
        $class = 'pn-menuitem-title';
    }

    $userlinks = "<span class=\"$class\">$start ";

    if (SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_READ)) {
        $userlinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWbooks', 'admin', 'view', array('itemsperpage' => '10'))) . "\">" . __('See all the books entered', $dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_READ)) {
        $userlinks .= "$seperator<a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWbooks', 'admin', 'new', array('itemsperpage' => '10'))) . "\">" . __('Add a new book', $dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_READ)) {
        $userlinks .= "$seperator<a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWbooks', 'admin', 'view_mat', array('itemsperpage' => '10'))) . "\">" . __('Show subjects', $dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADD)) {
        $userlinks .= "$seperator <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWbooks', 'admin', 'new_mat')) . "\">" . __('Enter new subject', $dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADMIN)) {
        $userlinks .= "$seperator <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWbooks', 'admin', 'modifyconfig')) . "\">" . __('Modification of the configuration module', $dom) . "</a> ";
    }

    if (SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADMIN)) {
        $userlinks .= "$seperator <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWbooks', 'admin', 'copia_prev', array('tid' => $id))) . "\">" . __('Copy the following year', $dom) . "</a> ";
    }

    if (SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADMIN)) {
        $userlinks .= "$seperator <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWbooks', 'admin', 'exporta_csv', array('tid' => $id))) . "\">" . __('Export books (CSV)', $dom) . "</a> ";
    }

    $userlinks .= "$end</span>\n";

    return $userlinks;
}