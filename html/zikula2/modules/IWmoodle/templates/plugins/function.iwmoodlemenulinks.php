<?php

function smarty_function_iwmoodlemenulinks($params, &$smarty) {
    $id = FormUtil::getPassedValue('id');
    $func = FormUtil::getPassedValue('func');

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

    if (SecurityUtil::checkPermission('IWmoodle::', "::", ACCESS_ADMIN)) {
        $moodlemenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmoodle', 'admin', 'main')) . "\">" . __('Show available courses') . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWmoodle::', "::", ACCESS_ADMIN) && isset($func) && $func == 'usersList') {
        $moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmoodle', 'admin', 'enrole', array('id' => $id))) . "\">" . __('Enrol users into the course') . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWmoodle::', "::", ACCESS_ADMIN)) {
        $moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmoodle', 'admin', 'conf')) . "\">" . __('Module configuration') . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWmoodle::', "::", ACCESS_ADMIN)) {
        $moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmoodle', 'admin', 'sincron')) . "\">" . __('Synchronize users') . "</a> ";
    }
    if (SecurityUtil::checkPermission('IWmoodle::', "::", ACCESS_ADMIN) && isset($func) && $func == 'enrole') {
        $moodlemenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmoodle', 'admin', 'usersList', array('id' => $id))) . "\">" . __('Return to the course users list') . "</a> ";
    }


    $moodlemenulinks .= $params['end'] . "</span>\n";

    return $moodlemenulinks;
}
