<?php

/**
 * Show the list of avaliables courses
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The list of courses avaliable in Moodle
 */
function iw_moodle_admin_main() {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Checks if module iw_main is installed. If not returns error
    $modid = pnModGetIDFromName('iw_main');
    $modinfo = pnModGetInfo($modid);

    if ($modinfo['state'] != 3) {
        return LogUtil::registerError(__('Module iw_main is needed. You have to install the iw_main module before to install it.', $dom));
    }

// Check if the version needed is correct. If not return error
    $versionNeeded = '0.5';
    if (!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
        return false;
    }

// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);

    $courses = pnModAPIFunc('iw_moodle', 'admin', 'getall');

    foreach ($courses as $course) {
        switch ($course['format']) {
            case "weeks":
                $format = __('Weekly', $dom);
                break;
            case "topics":
                $format = __('Topics', $dom);
                break;
            case "social":
                $format = __('Social', $dom);
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

    $pnRender->assign('courses', $courses_array);
    return $pnRender->fetch('iw_moodle_admin_main.htm');
}

/**
 * Show the information about the module
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The information about this module
 */
function iw_moodle_admin_module($args) {
// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);

    $module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_moodle',
        'type' => 'admin'));

    $pnRender->assign('module', $module);
    return $pnRender->fetch('iw_moodle_user_module.htm');
}

/**
 * Allows the module configuration
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	Show the module configuration form
 */
function iw_moodle_admin_conf() {
// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Include languages file
    $countries_path = 'modules/iw_moodle/pnlang/' . ZLanguage::getLanguageCode() . '/countries.php';
    if (file_exists($countries_path)) {
        include_once ($countries_path);
    } else {
        $countries_eng_path = 'modules/iw_moodle/pnlang/en/countries.php';
        if (file_exists($countries_eng_path)) {
            include_once ($countries_eng_path);
        }
    }

//Get language packages installed on Moodle
    $dir = pnModGetVar('iw_moodle', 'moodleurl') . '/lang';
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if (filetype($dir . $file) == '' && strtolower(substr($file, -5)) == '_utf8') {
                    $langs[] = array('language' => $file);
                }
            }
            closedir($dh);
        }
    }

// Change format of $string, gotten from countries.php
    foreach ($string as $key => $value) {
        $countries[] = array('key' => $key, 'value' => $value);
    }

// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);
    $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
    $pnRender->assign('multizk', $multizk);
    $security = pnSecGenAuthKey();
    $pnRender->assign('security', $security);
    $pnRender->assign('countries', $countries);
    $pnRender->assign('langs', $langs);
    $pnRender->assign('moodleurl', pnModGetVar('iw_moodle', 'moodleurl'));
    $pnRender->assign('dbprefix', pnModGetVar('iw_moodle', 'dbprefix'));
    $pnRender->assign('newwindow', pnModGetVar('iw_moodle', 'newwindow'));
    $pnRender->assign('guestuser', pnModGetVar('iw_moodle', 'guestuser'));
    $pnRender->assign('dfl_description', pnModGetVar('iw_moodle', 'dfl_description'));
    $pnRender->assign('dfl_language', pnModGetVar('iw_moodle', 'dfl_language'));
    $pnRender->assign('dfl_country', pnModGetVar('iw_moodle', 'dfl_country'));
    $pnRender->assign('dfl_city', pnModGetVar('iw_moodle', 'dfl_city'));
    $pnRender->assign('dfl_gtm', pnModGetVar('iw_moodle', 'dfl_gtm'));

    return $pnRender->fetch('iw_moodle_admin_conf.htm');
}

/**
 * Update the module configuration
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	True if success or false in other case
 */
function iw_moodle_admin_updateconfig() {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
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
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    if ($newwindow == 'on') {
        $newwindow = 1;
    } else {
        $newwindow = 0;
    }

// Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_moodle', 'admin', 'main'));
    }

// Update module variables.
    if (!isset($GLOBALS['PNConfig']['Multisites']['multi']) || $GLOBALS['PNConfig']['Multisites']['multi'] != 1) {
        pnModSetVar('iw_moodle', 'dfl_language', $dfl_language);
        pnModSetVar('iw_moodle', 'dbprefix', $dbprefix);
    }

    pnModSetVar('iw_moodle', 'moodleurl', $moodleurl);
    pnModSetVar('iw_moodle', 'newwindow', $newwindow);
    pnModSetVar('iw_moodle', 'guestuser', $guestuser);
    pnModSetVar('iw_moodle', 'dfl_description', $dfl_description);
    pnModSetVar('iw_moodle', 'dfl_country', $dfl_country);
    pnModSetVar('iw_moodle', 'dfl_city', $dfl_city);
    pnModSetVar('iw_moodle', 'dfl_gtm', $dfl_gtm);

    LogUtil::registerStatus(__('The module configuration has been changed', $dom));

// This function generated no output, and so now it is complete we redirect
// the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('iw_moodle', 'admin', 'main'));
}

/**
 * Change the state of a Moodle course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the course
 * @return:	Thue if success
 */
function iw_moodle_admin_activate($args) {
    $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    pnModAPIFunc('iw_moodle', 'admin', 'activate', array('id' => $id));

    return pnRedirect(pnModURL('iw_moodle', 'admin', 'main'));
}

/**
 * Show the list of users in a course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the course
 * @return:	The list of users in a Moodle course
 */
function iw_moodle_admin_list($args) {
    $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $usersName = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv));

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $usersFullname = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ccn',
        'sv' => $sv));

    $course = pnModAPIFunc('iw_moodle', 'user', 'getcourse', array('courseid' => $id));

// gets the course roles
    $roles = pnModAPIFunc('iw_moodle', 'admin', 'getallroles', array('id' => $id));
    foreach ($roles as $role) {
// gets the course users by role
        $users = pnModAPIFunc('iw_moodle', 'admin', 'getallusersbyrole', array('id' => $id,
            'role' => $role['id']));

        foreach ($users as $user) {
// gets the user's name in the intranet
// if this parameter is void the user is created into the intranet but not into Moodle
            $userPNuid = pnModAPIFunc('iw_moodle', 'admin', 'getuserPNuid', array('pn_uname' => $user['username']));
            $userfullname = $usersFullname[$userPNuid];
            if ($userfullname == '') {
                $userfullname = __('He/She is a Moodle user but not an intranet user', $dom);
                $state = 1;
            } else {
                $state = 2;
            }

//get the user small photo
            $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
            $photo_s = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => $user['username'] . '_s',
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
        $pre_users = pnModAPIFunc('iw_moodle', 'admin', 'getallpreins', array('id' => $id,
            'role' => $role['id']));

        foreach ($pre_users as $pre_user) {
// for each user gets the full name in the intranet
// if this parameter is void the user is created into the intranet but not into Moodle
            $userfullname = $usersFullname[$pre_user['uid']];
            $state = 0;
//get the user small photo
            $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
            $photo_s = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => $usersName[$pre_user['uid']] . '_s',
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

    $security = pnSecGenAuthKey();
    $pnRender->assign('security', $security);
    $pnRender->assign('course', $id);
    $pnRender->assign('users', $users_array);
    $pnRender->assign('fullname', $course['fullname']);
    return $pnRender->fetch('iw_moodle_admin_list.htm');
}

/**
 * Create the inscriptions and pre-inscriptions of a Moodle course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the course, the user to enrole and the role that have to be assigned to the user
 * @return:	A string with the actions that have been made
 */
function iw_moodle_admin_create_inscription($args) {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
    $userid = FormUtil::getPassedValue('userid', isset($args['userid']) ? $args['userid'] : null, 'POST');
    $course = FormUtil::getPassedValue('course', isset($args['course']) ? $args['course'] : null, 'POST');
    $role = FormUtil::getPassedValue('role', isset($args['role']) ? $args['role'] : null, 'POST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Gets username
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $username = pnModFunc('iw_main', 'user', 'getUserInfo', array('uid' => $userid,
        'sv' => $sv));

    if ($username == '') {
        LogUtil::registerError(__('The user hasn\'t been found', $dom));
    }

// Init vars
    $is_user = 0;
    $is_enroled = 0;

// Checks if the user is Moodle user
    $is_user = pnModAPIFunc('iw_moodle', 'user', 'is_user', array('user' => $username));

    if ($is_user == 1) {
// Gets the id of the user in Moodle tables
        $userMDuid = pnModAPIFunc('iw_moodle', 'user', 'getuserMDuid', array('username' => $username));
// Checks if user is enroled into the course with these role
        $is_enroled = pnModAPIFunc('iw_moodle', 'user', 'is_enroled', array('user' => $userMDuid['id'],
            'course' => $course,
            'role' => $role));
    }

// If user is Moodle user and he/she is enroled in the course with the same role returns without do any action
    if ($is_user && $is_enroled) {
        return '<strong>' . $username . '</strong>->' . __('The user was already enrolled for the course. There has been any action.', $dom);
    }

// If the user is user Moodle and not is enroled into the course made the enrolement
    if ($is_user && !$is_enroled) {
        $enrol_user = pnModAPIFunc('iw_moodle', 'admin', 'enrol_user', array('user' => $userMDuid['id'],
            'course' => $course,
            'role' => $role));
        if ($enrol_user) {
            return '<strong>' . $username . '</strong>->' . __('The user has been enrolled in the course', $dom);
        } else {
            return '<strong>' . $username . '</strong>->' . __('The user\'s enrollment in the course has failed.', $dom);
        }
    }

//Si no ï¿œs usuari de Moodle i no estï¿œ matriculat fa la preinscripciï¿œ
    if (!$is_user && !$is_enroled) {
//Comprovem si l'usuari ja estï¿œ preinscrit
        $is_preenroled = pnModAPIFunc('iw_moodle', 'user', 'is_preenroled', array('user' => $userid,
            'course' => $course,
            'role' => $role));
        if (!$is_preenroled) {
            $preenrol_user = pnModAPIFunc('iw_moodle', 'admin', 'preenrol_user', array('uid' => $userid,
                'mcid' => $course,
                'role' => $role));
        } else {
            return '<strong>' . $username . '</strong>->' . __('The user was already pre-enrolled for the course. There has been any action.', $dom);
        }
        if ($preenrol_user) {
            return '<strong>' . $username . '</strong>->' . __('The user has been pre-enrolled in the course', $dom);
        } else {
            return '<strong>' . $username . '</strong>->' . __('The user\'s pre-enrollment in the course has failed.', $dom);
        }
    }
}

/**
 * Delete inscriptions and pre-inscriptions of a Moodle course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Arrays the rows that have to be delete from the role_assignment Moodle table and intranet table
 * @return:	True if success
 */
function iw_moodle_admin_delete($args) {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
    $course = FormUtil::getPassedValue('course', isset($args['course']) ? $args['course'] : null, 'POST');
    $delete_pre = FormUtil::getPassedValue('delete_pre', isset($args['delete_pre']) ? $args['delete_pre'] : null, 'POST');
    $delete = FormUtil::getPassedValue('delete', isset($args['delete']) ? $args['delete'] : null, 'POST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);

// delete the pre-enrolements
    foreach ($delete_pre as $del_pre) {
        $deleted_pre = pnModAPIFunc('iw_moodle', 'user', 'delete_pre', array('mid' => $del_pre));
    }

    if ($deleted_pre) {
        LogUtil::registerStatus(__('The pre-enrolment of selected users has been removed', $dom));
    }

// delete the enrolements in Moodle tables
    foreach ($delete as $del) {
        $deleted = pnModAPIFunc('iw_moodle', 'admin', 'delete', array('roleid' => $del));
    }

    if ($deleted) {
        LogUtil::registerStatus(__('The enrolment of selected users has been removed', $dom));
    }
    return pnRedirect(pnModURL('iw_moodle', 'admin', 'list', array('id' => $course)));
}

/**
 * Show the form for made inscriptions into the Moodle Courses
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the main form's fields
 * @return:	a HTML form for the users enrolment
 */
function iw_moodle_admin_enrole($args) {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
    $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
    $person = FormUtil::getPassedValue('person', isset($args['person']) ? $args['person'] : null, 'POST');
    $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');
    $role = FormUtil::getPassedValue('role', isset($args['role']) ? $args['role'] : null, 'POST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);


    $course = pnModAPIFunc('iw_moodle', 'user', 'getcourse', array('courseid' => $id));

    if (!$course) {
        return LogUtil::registerError(__('Course requested not found', $dom));
    }

// get the intranet groups
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('plus' => __('Choose a group...', $dom),
        'less' => pnModGetVar('iw_myrole', 'rolegroup'),
        'sv' => $sv));

// get the roles defined in Moodle
    $roles = pnModAPIFunc('iw_moodle', 'admin', 'getallroles');

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $people = pnModFunc('iw_main', 'user', 'getMembersGroup', array('gid' => $group,
        'plus' => __('All', $dom),
        'sv' => $sv));

    $security = pnSecGenAuthKey();
    $pnRender->assign('security', $security);

    $pnRender->assign('groups', $groups);
    $pnRender->assign('people', $people);
    $pnRender->assign('role', $role);

    $pnRender->assign('group', $group);
    $pnRender->assign('person', $person);
    $pnRender->assign('roles', $roles);

    $pnRender->assign('id', $id);
    $pnRender->assign('fullname', $course['fullname']);

    return $pnRender->fetch('iw_moodle_admin_enrole.htm');
}

/**
 * Check the data received from the enrolment from and set them to the API function
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the main form's fields
 * @return:	True if success
 */
function iw_moodle_admin_update_enrole($args) {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
    $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
    $person = FormUtil::getPassedValue('person', isset($args['person']) ? $args['person'] : null, 'POST');
    $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'POST');
    $role = FormUtil::getPassedValue('role', isset($args['role']) ? $args['role'] : null, 'POST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }


// Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_moodle', 'admin', 'main'));
    }

    if ($role == '0') {
        LogUtil::registerError(__('Some fields are needed', $dom));
        return pnRedirect(pnModURL('iw_moodle', 'admin', 'enrole', array('id' => $id,
                            'group' => $group,
                            'subgroup' => $subgroup,
                            'person' => $person)));
    }

    if ($person[0] != 0) {
        foreach ($person as $p) {
// enrol users list
            $ins = pnModFunc('iw_moodle', 'admin', 'create_inscription', array('userid' => $p,
                'course' => $id,
                'role' => $role));
            $ins .= '<br />';
        }
        LogUtil::registerStatus($ins);
        return pnRedirect(pnModURL('iw_moodle', 'admin', 'list', array('id' => $id)));
    }

    $ins .= __('The result of the enrolment / pre-enrolment:', $dom) . '<br />';

// enrol a group of people
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $people = pnModFunc('iw_main', 'user', 'getMembersGroup', array('gid' => $group,
        'sv' => $sv));


    foreach ($people as $one) {
        $ins .= pnModFunc('iw_moodle', 'admin', 'create_inscription', array('userid' => $one['id'],
            'course' => $id,
            'role' => $role));
        $ins .= '<br />';
    }
    LogUtil::registerStatus($ins);
    return pnRedirect(pnModURL('iw_moodle', 'admin', 'list', array('id' => $id)));
}

/**
 * Sincronize the Moodle users wiht intranet users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the main form's fields
 * @return:	True if success
 */
function iw_moodle_admin_sincron($args) {
    $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
    $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
    $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'REQUEST');
    $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'REQUEST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);

    if ($numitems == '') {
        $numitems = 20;
    }
    if ($campfiltre == '') {
        $campfiltre = '0';
    }
    if ($filtre == '') {
        $filtre = '';
    }

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $usersName = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv));

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $usersFullname = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ncc',
        'sv' => $sv));

    $leters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
        'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $campsfiltre_MS = pnModFunc('iw_main', 'user', 'getAllGroups', array('plus' => " ",
        'less' => pnModGetVar('iw_myrole', 'rolegroup'),
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
    $usuaris = pnModAPIFunc('iw_moodle', 'admin', 'getusers', array('campfiltre' => $campfiltre,
        'filtre' => $filtre,
        'inici' => $inici,
        'numitems' => $numitems));

    foreach ($usuaris as $usuari) {
        $userMDuid = pnModAPIFunc('iw_moodle', 'user', 'getuserMDuid', array('username' => strtolower($usersName[$usuari['uid']])));

        if ($userMDuid['auth'] == 'db') {
            $userConnect = 1;
        } else {
            $userConnect = (pnModAPIFunc('iw_moodle', 'user', 'is_user', array('user' => strtolower($usersName[$usuari['uid']])))) ? 0 : -1;
        }

        $users_MS[] = array('uid' => $usuari['uid'],
            'username' => strtolower($usersName[$usuari['uid']]),
            'user' => $usersFullname[$usuari['uid']],
            'userConnect' => $userConnect,
            'pass' => $usuari['password']);

        if ($usuari['uid'] > $maxitem) {
            $maxitem = $usuari['uid'];
        }
    }

    $nombre = pnModAPIFunc('iw_moodle', 'admin', 'nombre', array('filtre' => $filtre,
        'campfiltre' => $campfiltre));

    $pager = pnModFunc('iw_moodle', 'admin', 'pager', array('inici' => $inici,
        'rpp' => $numitems,
        'total' => $nombre,
        'urltemplate' => 'index.php?module=iw_moodle&type=admin&func=sincron&filtre=' . $filtre . '&inici=%%&numitems=' . $numitems . '&campfiltre=' . $campfiltre));





    $moodleUsers = pnModAPIFunc('iw_moodle', 'admin', 'getMoodleUsers');

    $moodleUsersArray = array();

//foreach moodle user check if it is intranet user
// This comparison method fails: for zikula lluísmaria is the same than lluismaria
    foreach ($moodleUsers as $user) {
        $userid = pnUserGetIDFromName(strtolower($user['username']));
//      echo $user['username'].'-'.$userid.'<br>';
        if ((!$userid > 0) && ($user['username'] != 'guest')) {
            $moodleUsersArray[] = array('id' => $user['id'],
                'username' => $user['username'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'password' => $user['password'],
                'email' => $user['email']);
        }
    }

    $pnRender->assign('pager', $pager);
    $pnRender->assign('leters', $leters);
    $pnRender->assign('campfiltre', $campfiltre);
    $pnRender->assign('filtre', $filtre);
    $pnRender->assign('numitems', $numitems);
    $pnRender->assign('maxitem', $maxitem);
    $pnRender->assign('numitems_MS', $numitems_MS);
    $pnRender->assign('campsfiltre_MS', $campsfiltre_MS);
    $pnRender->assign('users_MS', $users_MS);
    $pnRender->assign('inici', $inici);
    $pnRender->assign('moodleUsers', $moodleUsersArray);

    return $pnRender->fetch('iw_moodle_admin_sincron.htm');
}

/**
 * Sincronize the Moodle users wiht intranet users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the main form's fields
 * @return:	True if success
 */
function iw_moodle_admin_changeAuth($args) {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
    $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
    $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
    $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'REQUEST');
    $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'REQUEST');
    $user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'REQUEST');
    $user_pass = FormUtil::getPassedValue('user_pass', isset($args['user_pass']) ? $args['user_pass'] : null, 'REQUEST');
    $user_connect = FormUtil::getPassedValue('user_connect', isset($args['user_connect']) ? $args['user_connect'] : null, 'REQUEST');
    $maxitem = FormUtil::getPassedValue('maxitem', isset($args['maxitem']) ? $args['maxitem'] : null, 'REQUEST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_moodle', 'admin', 'sincron'));
    }

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $usersName = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv));

    $status = false;

    if (is_array($user_id)) {
        for ($i = 0; $i <= $maxitem; $i++) {
            if (isset($user_id[$i])) {
                $status = pnModAPIFunc('iw_moodle', 'admin', 'change', array('user_name' => $usersName[$user_id[$i]],
                    'user_id' => $user_id[$i],
                    'user_pass' => $user_pass[$i],
                    'user_connect' => $user_connect[$i]));
                if (!$status) {
                    return pnRedirect(pnModURL('iw_moodle', 'admin', 'sincron', array('filtre' => $filtre,
                                        'campfiltre' => $campfiltre,
                                        'numitems' => $numitems,
                                        'inici' => $inici)));
                }
            }
        }
    }

    if ($status) {
        LogUtil::registerStatus(__('Options saved', $dom));
        return pnRedirect(pnModURL('iw_moodle', 'admin', 'sincron', array('filtre' => $filtre,
                            'campfiltre' => $campfiltre,
                            'numitems' => $numitems,
                            'inici' => $inici)));
    }
    LogUtil::registerError(__('There has been no action because no user has been selected ', $dom));
    return pnRedirect(pnModURL('iw_moodle', 'admin', 'sincron', array('filtre' => $filtre,
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
function iw_moodle_admin_createUser($args) {
    $dom = ZLanguage::getModuleDomain('iw_moodle');
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
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_moodle', 'admin', 'sincron'));
    }

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $usersName = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv));

    if (is_array($user_id)) {
        foreach ($user_id as $id) {
//El nom d'usuari no existeix i el creem
            $lid = pnModAPIFunc('iw_moodle', 'admin', 'createUser', array('uname' => $user_username[$id],
                'email' => $user_email[$id],
                'pass' => $user_password[$id],
                'nom' => $user_firstname[$id],
                'cognoms' => $user_lastname[$id]));
            if (!$lid) {
                LogUtil::registerError(__('The user creation has failed', $dom));
                return pnRedirect(pnModURL('iw_moodle', 'admin', 'sincron', array('filtre' => $filtre,
                                    'campfiltre' => $campfiltre,
                                    'numitems' => $numitems,
                                    'inici' => $inici)));
            }
        }
    } else {
        LogUtil::registerError(__('There has been no action because no user has been selected ', $dom));
        return pnRedirect(pnModURL('iw_moodle', 'admin', 'sincron', array('filtre' => $filtre,
                            'campfiltre' => $campfiltre,
                            'numitems' => $numitems,
                            'inici' => $inici)));
    }

    LogUtil::registerStatus(__('The users have been created correctly', $dom));
    return pnRedirect(pnModURL('iw_moodle', 'admin', 'sincron', array('filtre' => $filtre,
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
function iw_moodle_admin_filtratge($args) {
    $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
    $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'REQUEST');
    $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'REQUEST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_moodle', 'admin', 'sincron'));
    }

    return pnRedirect(pnModURL('iw_moodle', 'admin', 'sincron', array('filtre' => $filtre,
                        'campfiltre' => $campfiltre,
                        'numitems' => $numitems)));
}

/**
 * Create a pager for the users sincronize page
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the apameters of the current page
 * @return:	Return the pager
 */
function iw_moodle_admin_pager($args) {
    $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
    $total = FormUtil::getPassedValue('total', isset($args['total']) ? $args['total'] : null, 'REQUEST');
    $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'REQUEST');
    $urltemplate = FormUtil::getPassedValue('urltemplate', isset($args['urltemplate']) ? $args['urltemplate'] : null, 'REQUEST');

// Security check
    if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

// Create output object
    $pnRender = pnRender::getInstance('iw_moodle', false);

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

    $pnRender->assign('items', $items);
    return $pnRender->fetch('iw_moodle_admin_pager.htm');
}