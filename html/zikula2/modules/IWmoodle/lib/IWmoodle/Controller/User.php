<?php

class IWmoodle_Controller_User extends Zikula_AbstractController {

    /**
     * Prepare user to redirect to Moodle
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @return:	Redirect to Moodle
     */
    public function main() {
        $viewcourse = FormUtil::getPassedValue('id');
        $location = trim(ModUtil::getVar('IWmoodle', 'moodleurl'));
        $window = ModUtil::getVar('IWmoodle', 'newwindow');
        $guest = ModUtil::getVar('IWmoodle', 'guestuser');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle:coursesblock:', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        //if user is not moodle use, create it
        if (UserUtil::getVar('uname') != '') {
            //check if user is Moodle user
            $is_user = ModUtil::apiFunc('IWmoodle', 'user', 'is_user', array('user' => UserUtil::getVar('uname')));



            if (!$is_user) {
                //if not create it
                $inscribed = ModUtil::apiFunc('IWmoodle', 'admin', 'inscriu');
                $sv = ModUtil::func('iw_main', 'user', 'genSecurityValue');
                ModUtil::func('iw_main', 'user', 'userDelVar', array('name' => 'courses',
                    'module' => 'IWmoodle',
                    'uid' => $uid,
                    'sv' => $sv));
                if ($inscribed) {
                    ModUtil::func('IWmoodle', 'user', 'enrole');
                }
            }
        }

        $username = UserUtil::getVar('uname');
        $prefix = System::getVar('prefix');

        if ($username == '') {
            $username = $guest;
        }

        $secureValue = rand();

        setcookie('gotoMoodle', $secureValue, '0', '/');

        $userpw = UserUtil::getVar('pass');

        $parm = $username;
        $parm .= "|";
        $parm .= $userpw;
        $parm .= "|";
        $parm .= $home;
        $parm .= "|";
        $parm .= $viewcourse;
        $parm .= "|";
        $parm .= $guest;
        $parm .= "|";
        $parm .= md5($secureValue);

        $check = md5($parm);

        $url = "$location/index_iw.php?parm=$parm";

        if ($window == 1) {
            // Open Moodle in a new window
            Header('Location: ' . $url . '&check=' . $check);
            exit;
        }

        // Open Moodle into the the website
        $view = & new view();
        $view->caching = false;

        $url = $url . '&check=' . $check;

        $view->assign('url', $url);
        return $view->fetch('iwmoodle_user_go.htm');
    }

    /**
     * Enrol user in the courses where is pre-enroled
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return:	True if success
     */
    public function enrole() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle:coursesblock:', "::", ACCESS_READ)) {
            return false;
        }

        // Get the user pre-enroled courses
        $pre_ins = ModUtil::apiFunc('IWmoodle', 'user', 'getallpre_ins', array('user' => UserUtil::getVar('uid')));
        foreach ($pre_ins as $pre) {
            $ins = ModUtil::func('IWmoodle', 'user', 'create_inscription', array('uid' => UserUtil::getVar('uid'), 'course' => $pre['mcid'], 'mid' => $pre['mid'], 'role' => $pre['role']));
        }
        return $ins;
    }

    /**
     * Create the inscriptions and pre-inscriptions of a Moodle course
     * @author:     Albert Pï¿œrez Monfort (intraweb@xtec.cat)
     * @param:	args   Array with the id of the course, the user to enrole and the role that have to be assigned to the user
     * @return:	A string with the actions that have been made
     */
    public function create_inscription($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle:coursesblock:', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $uid = FormUtil::getPassedValue('uid');
        $course = FormUtil::getPassedValue('course');
        $role = FormUtil::getPassedValue('role');
        $mid = FormUtil::getPassedValue('mid');

        extract($args);

        // Gets username
        $username = UserUtil::getVar('uname');

        // Init vars
        $is_user = 0;
        $is_enroled = 0;

        // Checks if the user is Moodle user
        $is_user = ModUtil::apiFunc('IWmoodle', 'user', 'is_user', array('user' => $username));

        if ($is_user == 1) {
            // Gets the id of the user in Moodle tables
            $userMDuid = ModUtil::apiFunc('IWmoodle', 'user', 'getuserMDuid', array('username' => $username));
            // Checks if user is enroled into the course with these role
            $is_enroled = ModUtil::apiFunc('IWmoodle', 'user', 'is_enroled', array('user' => $userMDuid['id'], 'course' => $course, 'role' => $role));
        }

        // If the user is user Moodle and not is enroled into the course made the enrolement
        if ($is_user && !$is_enroled) {
            $enrol_user = ModUtil::apiFunc('IWmoodle', 'admin', 'enrol_user', array('user' => $userMDuid['id'], 'course' => $course, 'role' => $role));
            if ($enrol_user) {
                // Esborra la pre-inscripciï¿œ de la base de dades
//            ModUtil::apiFunc('IWmoodle', 'user', 'delete_pre', array('mid' => $mid));
            }
        }
        return true;
    }

}