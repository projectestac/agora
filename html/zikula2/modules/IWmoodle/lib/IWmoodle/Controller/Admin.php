<?php

class IWmoodle_Controller_Admin extends Zikula_AbstractController {

    /**
     * Show the list of avaliables courses
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return:	The list of courses avaliable in Moodle
     */
    public function main() {

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $courses_array = array();

        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module before to install it.'));
        }

        // Check if the version needed is correct. If not return error
        $versionNeeded = '0.5';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);

        $courses = ModUtil::apiFunc('IWmoodle', 'admin', 'getall');
        if ($courses) {
            foreach ($courses as $course) {
                switch ($course['format']) {
                    case "weeks":
                        $format = $this->__('Weekly');
                        break;
                    case "topics":
                        $format = $this->__('Topics');
                        break;
                    case "social":
                        $format = $this->__('Social');
                        break;
                }
                $courses_array[] = array('id' => $course['id'],
                    'fullname' => $course['fullname'],
                    'shortname' => $course['shortname'],
                    'visible' => $course['visible'],
                    'format' => $format,
                    'summary' => nl2br($course['summary']),
                    'activation' => $activation);
            }
        }
        $view->assign('courses', $courses_array);
        return $view->fetch('iwmoodle_admin_main.htm');
    }

    /**
     * Show the information about the module
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return:	The information about this module
     */
    public function module($args) {
        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);

        $module = ModUtil::func('IWmain', 'user', 'module_info', array('module_name' => 'IWmoodle',
                    'type' => 'admin'));

        $view->assign('module', $module);
        return $view->fetch('iwmoodle_user_module.htm');
    }

    /**
     * Allows the module configuration
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return:	Show the module configuration form
     */
    public function conf() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Include languages file
        $countries_path = "modules/IWmoodle/lang/" . ZLanguage::getLanguageCode() . "/countries.php";
        if (file_exists($countries_path)) {
            include_once ($countries_path);
        } else {
            $countries_eng_path = "modules/IWmoodle/lang/en/countries.php";
            if (file_exists($countries_eng_path)) {
                include_once ($countries_eng_path);
            }
        }

        //Get language packages installed on Moodle
        $dir = ModUtil::getVar('IWmoodle', 'moodleurl') . '/lang/';

        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (is_dir($dir . $file) && $file != '.' && $file != '..') {
                        $langs[] = array('language' => $file);
                    }
                }
                closedir($dh);
            }
        }

        // Adapt the array
        foreach ($string as $key => $value) {
            $countries[] = array('key' => $key, 'value' => $value);
        }
        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);
        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;
        $view->assign('multizk', $multizk);
        $view->assign('countries', $countries);
        $view->assign('langs', $langs);
        $view->assign('moodleurl', ModUtil::getVar('IWmoodle', 'moodleurl'));
        $view->assign('dbprefix', ModUtil::getVar('IWmoodle', 'dbprefix'));
        $view->assign('newwindow', ModUtil::getVar('IWmoodle', 'newwindow'));
        $view->assign('guestuser', ModUtil::getVar('IWmoodle', 'guestuser'));
        $view->assign('dfl_description', ModUtil::getVar('IWmoodle', 'dfl_description'));
        $view->assign('dfl_language', ModUtil::getVar('IWmoodle', 'dfl_language'));
        $view->assign('dfl_country', ModUtil::getVar('IWmoodle', 'dfl_country'));
        $view->assign('dfl_city', ModUtil::getVar('IWmoodle', 'dfl_city'));
        $view->assign('dfl_gtm', ModUtil::getVar('IWmoodle', 'dfl_gtm'));

        return $view->fetch('iwmoodle_admin_conf.htm');
    }

    /**
     * Update the module configuration
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return:	True if success or false in other case
     */
    public function updateconfig() {

        $moodleurl = FormUtil::getPassedValue('moodleurl', isset($args['moodleurl']) ? $args['moodleurl'] : null, 'POST');
        $newwindow = FormUtil::getPassedValue('newwindow', isset($args['newwindow']) ? $args['newwindow'] : null, 'POST');
        $guestuser = FormUtil::getPassedValue('guestuser', isset($args['guestuser']) ? $args['guestuser'] : null, 'POST');
        $dbprefix = FormUtil::getPassedValue('dbprefix', isset($args['dbprefix']) ? $args['dbprefix'] : null, 'POST');
        $dfl_description = FormUtil::getPassedValue('dfl_description', isset($args['dfl_description']) ? $args['dfl_description'] : null, 'POST');
        $dfl_language = FormUtil::getPassedValue('dfl_language', isset($args['dfl_language']) ? $args['dfl_language'] : null, 'POST');
        $dfl_country = FormUtil::getPassedValue('dfl_country', isset($args['dfl_country']) ? $args['dfl_country'] : null, 'POST');
        $dfl_city = FormUtil::getPassedValue('dfl_city', isset($args['dfl_city']) ? $args['dfl_city'] : null, 'POST');
        $dfl_gtm = FormUtil::getPassedValue('dfl_gtm', isset($args['dfl_gtm']) ? $args['dfl_gtm'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        if ($newwindow == 'on') {
            $newwindow = 1;
        } else {
            $newwindow = 0;
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Update module variables.
        if (!isset($GLOBALS['ZConfig']['Multisites']['multi']) || $GLOBALS['ZConfig']['Multisites']['multi'] != 1) {
            ModUtil::setVar('IWmoodle', 'moodleurl', $moodleurl);
            ModUtil::setVar('IWmoodle', 'dfl_language', $dfl_language);
            ModUtil::setVar('IWmoodle', 'dbprefix', $dbprefix);
        }

        ModUtil::setVar('IWmoodle', 'newwindow', $newwindow);
        ModUtil::setVar('IWmoodle', 'guestuser', $guestuser);
        ModUtil::setVar('IWmoodle', 'dfl_description', $dfl_description);
        ModUtil::setVar('IWmoodle', 'dfl_country', $dfl_country);
        ModUtil::setVar('IWmoodle', 'dfl_city', $dfl_city);
        ModUtil::setVar('IWmoodle', 'dfl_gtm', $dfl_gtm);

        LogUtil::registerStatus($this->__('The module configuration has been changed'));

        // This function generated no output, and so now it is complete we redirect
        // the user to an appropriate page for them to carry on their work
        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'main'));
    }

    /**
     * Change the state of a Moodle course
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the course
     * @return:	Thue if success
     */
    public function activate($args) {
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        ModUtil::apiFunc('IWmoodle', 'admin', 'activate', array('id' => $id));

        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'main'));
    }

    /**
     * Show the list of users in a course
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the course
     * @return:	The list of users in a Moodle course
     */
    public function usersList($args) {
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersName = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv));

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersFullname = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                    'sv' => $sv));

        $course = ModUtil::apiFunc('IWmoodle', 'user', 'getcourse', array('courseid' => $id));

        // gets the course roles
        $roles = ModUtil::apiFunc('IWmoodle', 'admin', 'getallroles', array('id' => $id));
        foreach ($roles as $role) {
            // gets the course users by role
            $users = ModUtil::apiFunc('IWmoodle', 'admin', 'getallusersbyrole', array('id' => $id,
                        'role' => $role['id']));

            foreach ($users as $user) {
                // gets the user's name in the intranet
                // if this parameter is void the user is created into the intranet but not into Moodle
                $userPNuid = ModUtil::apiFunc('IWmoodle', 'admin', 'getuserPNuid', array('pn_uname' => $user['username']));
                $userfullname = $usersFullname[$userPNuid];
                if ($userfullname == '') {
                    $userfullname = $this->__('He/She is a Moodle user but not an intranet user');
                    $state = 1;
                } else {
                    $state = 2;
                }

                //get the user small photo
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $user['username'] . '_s',
                            'sv' => $sv));

                $lastaccess = ($user['lastaccess'] > 0) ? date('d/m/Y - H.i', $user['lastaccess']) : 0;

                $users_array[] = array('userfullname' => $userfullname,
                    'id' => $user['userid'],
                    'username' => $user['username'],
                    'photo' => $photo_s,
                    'auth' => $user['auth'],
                    'lastaccess' => $lastaccess,
                    'state' => $state,
                    'rolename' => $role['name'],
                    'roleid' => $user['roleid']);
            }

            // gets the list of users pre-enroled in the course
            $pre_users = ModUtil::apiFunc('IWmoodle', 'admin', 'getallpreins', array('id' => $id,
                        'role' => $role['id']));

            foreach ($pre_users as $pre_user) {
                // for each user gets the full name in the intranet
                // if this parameter is void the user is created into the intranet but not into Moodle
                $userfullname = $usersFullname[$pre_user['uid']];
                $state = 0;
                //get the user small photo
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersName[$pre_user['uid']] . '_s',
                            'sv' => $sv));
                $users_array[] = array('userfullname' => $userfullname,
                    'id' => $pre_user['uid'],
                    'username' => $usersName[$pre_user['uid']],
                    'photo' => $photo_s,
                    'auth' => '---',
                    'lastaccess' => '---',
                    'state' => $state,
                    'rolename' => $role['name'],
                    'mid' => $pre_user['mid']);
            }
            sort($users_array);
        }

        $view->assign('course', $id);
        $view->assign('users', $users_array);
        $view->assign('fullname', $course['fullname']);
        return $view->fetch('iwmoodle_admin_list.htm');
    }

    /**
     * Create the inscriptions and pre-inscriptions of a Moodle course
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the course, the user to enrole and the role that have to be assigned to the user
     * @return:	A string with the actions that have been made
     */
    public function create_inscription($args) {

        $userid = FormUtil::getPassedValue('userid', isset($args['userid']) ? $args['userid'] : null, 'POST');
        $course = FormUtil::getPassedValue('course', isset($args['course']) ? $args['course'] : null, 'POST');
        $role = FormUtil::getPassedValue('role', isset($args['role']) ? $args['role'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Gets username
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $username = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => $userid,
                    'sv' => $sv));

        if ($username == '') {
            LogUtil::registerError($this->__('The user hasn\'t been found'));
        }

        // Init vars
        $is_user = 0;
        $is_enroled = 0;

        // Checks if the user is Moodle user
        $is_user = ModUtil::apiFunc('IWmoodle', 'user', 'is_user', array('user' => $username));

        if ($is_user == 1) {
            // Gets the id of the user in Moodle tables
            $userMDuid = ModUtil::apiFunc('IWmoodle', 'user', 'getuserMDuid', array('username' => $username));
            // Checks if user is enroled into the course with these role
            $is_enroled = ModUtil::apiFunc('IWmoodle', 'user', 'is_enroled', array('user' => $userMDuid['id'],
                        'course' => $course,
                        'role' => $role));
        }

        // If user is Moodle user and he/she is enroled in the course with the same role returns without do any action
        if ($is_user && $is_enroled) {
            return '<strong>' . $username . '</strong>->' . $this->__('The user was already enrolled for the course. There has been any action.');
        }

        // If the user is user Moodle and not is enroled into the course made the enrolement
        if ($is_user && !$is_enroled) {
            $enrol_user = ModUtil::apiFunc('IWmoodle', 'admin', 'enrol_user', array('user' => $userMDuid['id'],
                        'course' => $course,
                        'role' => $role));
            if ($enrol_user) {
                return '<strong>' . $username . '</strong>->' . $this->__('The user has been enrolled in the course');
            } else {
                return '<strong>' . $username . '</strong>->' . $this->__('The user\'s enrollment in the course has failed.');
            }
        }

        //Si no ï¿œs usuari de Moodle i no estï¿œ matriculat fa la preinscripciï¿œ
        if (!$is_user && !$is_enroled) {
            //Comprovem si l'usuari ja estï¿œ preinscrit
            $is_preenroled = ModUtil::apiFunc('IWmoodle', 'user', 'is_preenroled', array('user' => $userid,
                        'course' => $course,
                        'role' => $role));
            if (!$is_preenroled) {
                $preenrol_user = ModUtil::apiFunc('IWmoodle', 'admin', 'preenrol_user', array('uid' => $userid,
                            'mcid' => $course,
                            'role' => $role));
            } else {
                return '<strong>' . $username . '</strong>->' . $this->__('The user was already pre-enrolled for the course. There has been any action.');
            }
            if ($preenrol_user) {
                return '<strong>' . $username . '</strong>->' . $this->__('The user has been pre-enrolled in the course');
            } else {
                return '<strong>' . $username . '</strong>->' . $this->__('The user\'s pre-enrollment in the course has failed.');
            }
        }
    }

    /**
     * Delete inscriptions and pre-inscriptions of a Moodle course
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Arrays the rows that have to be delete from the role_assignment Moodle table and intranet table
     * @return:	True if success
     */
    public function delete($args) {

        $course = FormUtil::getPassedValue('course', isset($args['course']) ? $args['course'] : null, 'POST');
        $delete_pre = FormUtil::getPassedValue('delete_pre', isset($args['delete_pre']) ? $args['delete_pre'] : null, 'POST');
        $delete = FormUtil::getPassedValue('delete', isset($args['delete']) ? $args['delete'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);

        // delete the pre-enrolements
        foreach ($delete_pre as $del_pre) {
            $deleted_pre = ModUtil::apiFunc('IWmoodle', 'user', 'delete_pre', array('mid' => $del_pre));
        }

        if ($deleted_pre) {
            LogUtil::registerStatus($this->__('The pre-enrolment of selected users has been removed'));
        }

        // delete the enrolements in Moodle tables
        foreach ($delete as $del) {
            $deleted = ModUtil::apiFunc('IWmoodle', 'admin', 'delete', array('roleid' => $del));
        }

        if ($deleted) {
            LogUtil::registerStatus($this->__('The enrolment of selected users has been removed'));
        }
        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'usersList', array('id' => $course)));
    }

    /**
     * Show the form for made inscriptions into the Moodle Courses
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the main form's fields
     * @return:	a HTML form for the users enrolment
     */
    public function enrole($args) {

        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $person = FormUtil::getPassedValue('person', isset($args['person']) ? $args['person'] : null, 'POST');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');
        $role = FormUtil::getPassedValue('role', isset($args['role']) ? $args['role'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $enrolid = ModUtil::apiFunc('IWmoodle', 'admin', 'getEnrolId', array('courseid' => $id));

        if (!$enrolid > 0) {
            LogUtil::registerError($this->__('The manual inscription method is not defined in course. You showd define if from Moodle administration tools.'));
            return System::redirect(ModUtil::url('IWmoodle', 'admin', 'usersList', array('id' => $id)));
        }

        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);


        $course = ModUtil::apiFunc('IWmoodle', 'user', 'getcourse', array('courseid' => $id));

        if (!$course) {
            return LogUtil::registerError($this->__('Course requested not found'));
        }

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('Choose a group...'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));

        // get the roles defined in Moodle
        $roles = ModUtil::apiFunc('IWmoodle', 'admin', 'getallroles');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $people = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('gid' => $group,
                    'plus' => $this->__('All'),
                    'sv' => $sv));

        $view->assign('groups', $groups);
        $view->assign('people', $people);
        $view->assign('role', $role);

        $view->assign('group', $group);
        $view->assign('person', $person);
        $view->assign('roles', $roles);

        $view->assign('id', $id);
        $view->assign('fullname', $course['fullname']);

        return $view->fetch('iwmoodle_admin_enrole.htm');
    }

    /**
     * Check the data received from the enrolment from and set them to the API function
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the main form's fields
     * @return:	True if success
     */
    public function update_enrole($args) {

        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $person = FormUtil::getPassedValue('person', isset($args['person']) ? $args['person'] : null, 'POST');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'POST');
        $role = FormUtil::getPassedValue('role', isset($args['role']) ? $args['role'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        if ($role == '0') {
            LogUtil::registerError($this->__('Some fields are needed'));
            return System::redirect(ModUtil::url('IWmoodle', 'admin', 'enrole', array('id' => $id,
                                'group' => $group,
                                'subgroup' => $subgroup,
                                'person' => $person)));
        }

        if ($person[0] != 0) {
            foreach ($person as $p) {
                // enrol users list
                $ins = ModUtil::func('IWmoodle', 'admin', 'create_inscription', array('userid' => $p,
                            'course' => $id,
                            'role' => $role));
                $ins .= '<br />';
            }
            LogUtil::registerStatus($ins);
            return System::redirect(ModUtil::url('IWmoodle', 'admin', 'usersList', array('id' => $id)));
        }

        $ins .= $this->__('The result of the enrolment / pre-enrolment:') . '<br />';

        // enrol a group of people
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $people = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('gid' => $group,
                    'sv' => $sv));


        foreach ($people as $one) {
            $ins .= ModUtil::func('IWmoodle', 'admin', 'create_inscription', array('userid' => $one['id'],
                        'course' => $id,
                        'role' => $role));
            $ins .= '<br />';
        }
        LogUtil::registerStatus($ins);
        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'usersList', array('id' => $id)));
    }

    /**
     * Sincronize the Moodle users wiht intranet users
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the main form's fields
     * @return:	True if success
     */
    public function sincron($args) {
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'REQUEST');
        $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);

        if ($numitems == '') {
            $numitems = 20;
        }
        if ($campfiltre == '') {
            $campfiltre = '0';
        }
        if ($filtre == '') {
            $filtre = '';
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersName = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv));

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersFullname = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ncc',
                    'sv' => $sv));

        $leters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $campsfiltre_MS = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => " ",
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));

        $numitems_MS = array(array('id' => '10',
                'name' => '10'),
            array('id' => '20',
                'name' => '20'),
            array('id' => '30',
                'name' => '30'),
            array('id' => '40',
                'name' => '40'),
            array('id' => '50',
                'name' => '50'),
            array('id' => '60',
                'name' => '60'),
            array('id' => '80',
                'name' => '80'),
            array('id' => '100',
                'name' => '100'));

        // gets all the users in the intranet who satisfy the conditions
        $usuaris = ModUtil::apiFunc('IWmoodle', 'admin', 'getusers', array('campfiltre' => $campfiltre,
                    'filtre' => $filtre,
                    'inici' => $inici,
                    'numitems' => $numitems));

        if ($usuaris) {
            foreach ($usuaris as $usuari) {
                $userMDuid = ModUtil::apiFunc('IWmoodle', 'user', 'getuserMDuid', array('username' => $usersName[$usuari['uid']]));

                if ($userMDuid['auth'] == 'db') {
                    $userConnect = 1;
                } else {
                    $userConnect = (ModUtil::apiFunc('IWmoodle', 'user', 'is_user', array('user' => $usersName[$usuari['uid']]))) ? 0 : -1;
                }

                $users_MS[] = array('uid' => $usuari['uid'],
                    'username' => $usersName[$usuari['uid']],
                    'user' => $usersFullname[$usuari['uid']],
                    'userConnect' => $userConnect,
                    'pass' => $usuari['password']);

                if ($usuari['uid'] > $maxitem) {
                    $maxitem = $usuari['uid'];
                }
            }
        }

        $nombre = ModUtil::apiFunc('IWmoodle', 'admin', 'nombre', array('filtre' => $filtre,
                    'campfiltre' => $campfiltre));

        $pager = ModUtil::func('IWmoodle', 'admin', 'pager', array('inici' => $inici,
                    'rpp' => $numitems,
                    'total' => $nombre,
                    'urltemplate' => 'index.php?module=IWmoodle&type=admin&func=sincron&filtre=' . $filtre . '&inici=%%&numitems=' . $numitems . '&campfiltre=' . $campfiltre));





        $moodleUsers = ModUtil::apiFunc('IWmoodle', 'admin', 'getMoodleUsers');

        $moodleUsersArray = array();

        //foreach moodle user check if it is intranet user
        foreach ($moodleUsers as $user) {
            $userid = UserUtil::getIdFromName($user['username']);
            if (!$userid > 0) {
                $moodleUsersArray[] = array('id' => $user['id'],
                    'username' => $user['username'],
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'password' => $user['password'],
                    'email' => $user['email']);
            }
        }

        $view->assign('pager', $pager);
        $view->assign('leters', $leters);
        $view->assign('campfiltre', $campfiltre);
        $view->assign('filtre', $filtre);
        $view->assign('numitems', $numitems);
        $view->assign('maxitem', $maxitem);
        $view->assign('numitems_MS', $numitems_MS);
        $view->assign('campsfiltre_MS', $campsfiltre_MS);
        $view->assign('users_MS', $users_MS);
        $view->assign('inici', $inici);
        $view->assign('moodleUsers', $moodleUsersArray);

        return $view->fetch('iwmoodle_admin_sincron.htm');
    }

    /**
     * Sincronize the Moodle users wiht intranet users
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the main form's fields
     * @return:	True if success
     */
    public function changeAuth($args) {

        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'REQUEST');
        $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'REQUEST');
        $user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'REQUEST');
        $user_pass = FormUtil::getPassedValue('user_pass', isset($args['user_pass']) ? $args['user_pass'] : null, 'REQUEST');
        $user_connect = FormUtil::getPassedValue('user_connect', isset($args['user_connect']) ? $args['user_connect'] : null, 'REQUEST');
        $maxitem = FormUtil::getPassedValue('maxitem', isset($args['maxitem']) ? $args['maxitem'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersName = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv));

        $status = false;

        if (is_array($user_id)) {
            for ($i = 0; $i <= $maxitem; $i++) {
                if (isset($user_id[$i])) {
                    $status = ModUtil::apiFunc('IWmoodle', 'admin', 'change', array('user_name' => $usersName[$user_id[$i]],
                                'user_id' => $user_id[$i],
                                'user_pass' => $user_pass[$i],
                                'user_connect' => $user_connect[$i]));
                    if (!$status) {
                        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'sincron', array('filtre' => $filtre,
                                            'campfiltre' => $campfiltre,
                                            'numitems' => $numitems,
                                            'inici' => $inici)));
                    }
                }
            }
        }

        if ($status) {
            LogUtil::registerStatus($this->__('Options saved'));
            return System::redirect(ModUtil::url('IWmoodle', 'admin', 'sincron', array('filtre' => $filtre,
                                'campfiltre' => $campfiltre,
                                'numitems' => $numitems,
                                'inici' => $inici)));
        }
        LogUtil::registerError($this->__('There has been no action because no user has been selected '));
        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'sincron', array('filtre' => $filtre,
                            'campfiltre' => $campfiltre,
                            'numitems' => $numitems,
                            'inici' => $inici)));
    }

    /**
     * Create users from Moodle to Zikula
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the main form's fields
     * @return:	True if success
     */
    public function createUser($args) {

        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'REQUEST');
        $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'REQUEST');
        $maxitem = FormUtil::getPassedValue('maxitem', isset($args['maxitem']) ? $args['maxitem'] : null, 'REQUEST');
        $user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'REQUEST');
        $user_password = FormUtil::getPassedValue('user_password', isset($args['user_password']) ? $args['user_password'] : null, 'REQUEST');
        $user_username = FormUtil::getPassedValue('user_username', isset($args['user_username']) ? $args['user_username'] : null, 'REQUEST');
        $user_firstname = FormUtil::getPassedValue('user_firstname', isset($args['user_firstname']) ? $args['user_firstname'] : null, 'REQUEST');
        $user_lastname = FormUtil::getPassedValue('user_lastname', isset($args['user_lastname']) ? $args['user_lastname'] : null, 'REQUEST');
        $user_email = FormUtil::getPassedValue('user_email', isset($args['user_email']) ? $args['user_email'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersName = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv));

        if (is_array($user_id)) {
            foreach ($user_id as $id) {
                //El nom d'usuari no existeix i el creem
                $lid = ModUtil::apiFunc('IWmoodle', 'admin', 'createUser', array('uname' => $user_username[$id],
                            'email' => $user_email[$id],
                            'pass' => $user_password[$id],
                            'nom' => $user_firstname[$id],
                            'cognoms' => $user_lastname[$id]));
                if (!$lid) {
                    LogUtil::registerError($this->__('The user creation has failed'));
                    return System::redirect(ModUtil::url('IWmoodle', 'admin', 'sincron', array('filtre' => $filtre,
                                        'campfiltre' => $campfiltre,
                                        'numitems' => $numitems,
                                        'inici' => $inici)));
                }
            }
        } else {
            LogUtil::registerError($this->__('There has been no action because no user has been selected '));
            return System::redirect(ModUtil::url('IWmoodle', 'admin', 'sincron', array('filtre' => $filtre,
                                'campfiltre' => $campfiltre,
                                'numitems' => $numitems,
                                'inici' => $inici)));
        }

        LogUtil::registerStatus($this->__('The users have been created correctly'));
        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'sincron', array('filtre' => $filtre,
                            'campfiltre' => $campfiltre,
                            'numitems' => $numitems,
                            'inici' => $inici)));
    }

    /**
     * Generate a filter in the search of users
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with parameters of the filter
     * @return:	Redirect to the same page with the filter parameters
     */
    public function filtratge($args) {
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'REQUEST');
        $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        return System::redirect(ModUtil::url('IWmoodle', 'admin', 'sincron', array('filtre' => $filtre,
                            'campfiltre' => $campfiltre,
                            'numitems' => $numitems)));
    }

    /**
     * Create a pager for the users sincronize page
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the apameters of the current page
     * @return:	Return the pager
     */
    public function pager($args) {
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $total = FormUtil::getPassedValue('total', isset($args['total']) ? $args['total'] : null, 'REQUEST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'REQUEST');
        $urltemplate = FormUtil::getPassedValue('urltemplate', isset($args['urltemplate']) ? $args['urltemplate'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Create output object
        $view = Zikula_View::getInstance('IWmoodle', false);

        // Quick check to ensure that we have work to do
        if ($total <= $rpp) {
            return;
        }

        if (!isset($inici) || empty($inici)) {
            $inici = 1;
        }

        if (!isset($rpp) || empty($rpp)) {
            $rpp = 10;
        }

        // Show startnum link
        if ($inici != 1) {
            $url = preg_replace('/%%/', 1, $urltemplate);
            $text = '<a href="' . $url . '"><<</a> | ';
        } else {
            $text = '<< | ';
        }
        $items[] = array('text' => $text);

        // Show following items
        $pagenum = 1;

        for ($curnum = 1; $curnum <= $total; $curnum += $rpp) {
            if (($inici < $curnum) || ($inici > ($curnum + $rpp - 1))) {
                //mod by marsu - use sliding window for pagelinks
                if ((($pagenum % 10) == 0) // link if page is multiple of 10
                        || ($pagenum == 1) // link first page
                        || (($curnum > ($inici - 4 * $rpp)) //link -3 and +3 pages
                        && ($curnum < ($inici + 4 * $rpp)))
                ) {
                    // Not on this page - show link
                    $url = preg_replace('/%%/', $curnum, $urltemplate);
                    $text = '<a href="' . $url . '">' . $pagenum . '</a> | ';
                    $items[] = array('text' => $text);
                }
                //end mod by marsu
            } else {
                // On this page - show text
                $text = $pagenum . ' | ';
                $items[] = array('text' => $text);
            }
            $pagenum++;
        }

        if (($curnum >= $rpp + 1) && ($inici < $curnum - $rpp)) {
            $url = preg_replace('/%%/', $curnum - $rpp, $urltemplate);
            $text = '<a href="' . $url . '">>></a>';
        } else {
            $text = '>>';
        }
        $items[] = array('text' => $text);

        $view->assign('items', $items);
        return $view->fetch('iwmoodle_admin_pager.htm');
    }

}