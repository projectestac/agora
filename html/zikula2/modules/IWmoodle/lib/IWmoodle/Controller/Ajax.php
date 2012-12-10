<?php

/**
 * Change the users in select list
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
 */
function IWmoodle_ajax_chgUsers($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
        AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
    }

    $gid = FormUtil::getPassedValue('gid', -1, 'GET');
    if ($gid == -1) {
        LogUtil::registerError('no group id');
        AjaxUtil::output();
    }

    $view = Zikula_View::getInstance('IWmoodle', false);

    // get group members
    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
    $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
        'gid' => $gid));

    asort($groupMembers);

    if (empty($groupMembers)) {
        $view->assign('action', 'noUsers');
        $content = $view->fetch('iwmoodle_admin_ajax.htm');
        AjaxUtil::output(array('content' => $content));
    }


    $view->assign('groupMembers', $groupMembers);
    $view->assign('action', 'chgUsers');
    $content = $view->fetch('iwmoodle_admin_ajax.htm');
    AjaxUtil::output(array('content' => $content));
}

/**
 * Change the state for a Moodle course
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the course where change the state
 * @return:	Redirect to the user main page
 */
function IWmoodle_ajax_chgCourseState($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
        AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
    }

    $id = FormUtil::getPassedValue('id', -1, 'GET');
    if ($id == -1) {
        LogUtil::registerError('no course id');
        AjaxUtil::output();
    }

    $view = Zikula_View::getInstance('IWmoodle', false);

    // change the course state
    $changed = ModUtil::func('IWmoodle', 'admin', 'activate', array('id' => $id));

    if ($changed) {
        $course = ModUtil::apiFunc('IWmoodle', 'user', 'getcourse', array('courseid' => $id));
        $state = $course['visible'];
    }

    $view->assign('state', $state);
    $view->assign('id', $id);
    $view->assign('action', 'chgCourseState');
    $content = $view->fetch('iwmoodle_admin_ajax.htm');

    $view->assign('action', 'chgCourseOptions');
    $content1 = $view->fetch('iwmoodle_admin_ajax.htm');

    AjaxUtil::output(array('content' => $content,
        'content1' => $content1,
        'id' => $id));
}
