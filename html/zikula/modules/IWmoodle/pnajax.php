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

    $pnRender = pnRender::getInstance('IWmoodle', false);

    // get group members
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $groupMembers = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
        'gid' => $gid));

    asort($groupMembers);

    if (empty($groupMembers)) {
        $pnRender->assign('action', 'noUsers');
        $content = $pnRender->fetch('iwmoodle_admin_ajax.htm');
        AjaxUtil::output(array('content' => $content));
    }


    $pnRender->assign('groupMembers', $groupMembers);
    $pnRender->assign('action', 'chgUsers');
    $content = $pnRender->fetch('iwmoodle_admin_ajax.htm');
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

    $pnRender = pnRender::getInstance('IWmoodle', false);

    // change the course state
    $changed = pnModFunc('IWmoodle', 'admin', 'activate', array('id' => $id));

    if ($changed) {
        $course = pnModAPIFunc('IWmoodle', 'user', 'getcourse', array('courseid' => $id));
        $state = $course['visible'];
    }

    $pnRender->assign('state', $state);
    $pnRender->assign('id', $id);
    $pnRender->assign('action', 'chgCourseState');
    $content = $pnRender->fetch('iwmoodle_admin_ajax.htm');

    $pnRender->assign('action', 'chgCourseOptions');
    $content1 = $pnRender->fetch('iwmoodle_admin_ajax.htm');

    AjaxUtil::output(array('content' => $content,
        'content1' => $content1,
        'id' => $id));
}
