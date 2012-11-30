<?php

class IWmoodle_Block_Courses extends Zikula_Controller_AbstractBlock {

    public function init() {
        SecurityUtil::registerPermissionSchema('IWmoodle:coursesblock:', '::');
    }

    public function info() {
        return array('text_type' => 'Courses',
            'module' => 'IWmoodle',
            'text_type_long' => $this->__('Courses available in Moodle'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    public function display($row) {
        //Security check
        if (!SecurityUtil::checkPermission('IWmoodle:coursesblock:', "::", ACCESS_READ)) {
            return;
        }
        $uid = UserUtil::getVar('uid');

        if (!isset($uid))
            $uid = '-1';

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'courses',
                    'module' => 'IWmoodle',
                    'uid' => $uid,
                    'sv' => $sv));
        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'courses',
                        'module' => 'IWmoodle',
                        'sv' => $sv,
                        'nult' => true));
            $row['content'] = $s;
            return BlockUtil::themesideblock($row);
        }
        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);
        $uname = (UserUtil::getVar('uname') != '') ? UserUtil::getVar('uname') : ModUtil::getVar('IWmoodle', 'guestuser');
        //check if the user is Moodle user
        $is_user = ModUtil::apiFunc('IWmoodle', 'user', 'is_user', array('user' => $uname));
        if (UserUtil::isLoggedIn()) {
            //get the courses where the user is pre enroled
            $pre_ins = ModUtil::apiFunc('IWmoodle', 'user', 'getallpre_ins', array('user' => UserUtil::getVar('uid')));
        }
        if ($is_user) {
            //Inform to system that the intranet user is Moodle user
            $view->assign('isuser', true);
            // get user courses
            $courses = ModUtil::apiFunc('IWmoodle', 'user', 'getusercourses', array('user' => $uname));
            if (!empty($courses)) {
                foreach ($courses as $course) {
                    if ($course['fullname'] != $course_previous) {
                        if ($course_previous != '') {
                            $courses_array[] = array('fullname' => $course_previous,
                                'summary' => nl2br($course_previous_summary),
                                'id' => $course_previous_id,
                                'roles' => $course_previous_roles);
                        }
                        $course_previous = $course['fullname'];
                        $course_previous_id = $course['id'];
                        $course_previous_roles = $course['rolename'] . '<br/>';
                        $course_previous_summary = $course['summary'];
                    } else {
                        $course_previous_roles .= $course['rolename'] . '<br/>';
                    }
                }
                $courses_array[] = array('fullname' => $course_previous,
                    'summary' => nl2br($course_previous_summary),
                    'id' => $course_previous_id,
                    'roles' => $course_previous_roles);
            }
            // get the user courses
            if (count($pre_ins) > 0) {
                //Set enrolment in case it was necessary
                $enrol = ModUtil::func('IWmoodle', 'user', 'enrole');
            }
        } else {
            //Inform to system that the intranet user isn't Moodle user
            $view->assign('isuser', false);
            if (!empty($pre_ins)) {
                foreach ($pre_ins as $pre) {
                    // gets the information of a course
                    $PreInscriptions = ModUtil::apiFunc('IWmoodle', 'user', 'getcourse', array('role' => $pre['role'],
                                'courseid' => $pre['mcid']));
                    if ($PreInscriptions['fullname'] != $pre_previous) {
                        if ($pre_previous != '') {
                            $courses_array[] = array('fullname' => $pre_previous,
                                'summary' => nl2br($pre_previous_summary),
                                'id' => $pre_previous_id,
                                'roles' => $pre_previous_roles);
                        }
                        $pre_previous = $PreInscriptions['fullname'];
                        $pre_previous_id = $PreInscriptions['id'];
                        $pre_previous_roles = $PreInscriptions['rolename'] . '<br/>';
                        $pre_previous_summary = $PreInscriptions['summary'];
                    } else {
                        $pre_previous_roles .= $PreInscriptions['rolename'] . '<br/>';
                    }
                }
                $courses_array[] = array('fullname' => $pre_previous,
                    'summary' => nl2br($pre_previous_summary),
                    'id' => $pre_previous_id,
                    'roles' => $pre_previous_roles);
            }
        }
        // Security check
        if (SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            $view->assign('administrator', true);
        }
        // assing the courses array to the output
        $view->assign('courses', $courses_array);
        $view->assign('moodleurl', ModUtil::getVar('IWmoodle', 'moodleurl'));
        $row['content'] = $view->fetch('iwmoodle_block_display.htm');
        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
            'name' => 'courses',
            'module' => 'IWmoodle',
            'sv' => $sv,
            'value' => $row['content'],
            'lifetime' => '1000'));
        return BlockUtil::themesideblock($row);
    }

}