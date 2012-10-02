<?php

/**
 * Get the courses where a user is pre-enroled
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	id of the user
 * @return:	An array with the courses where the user is pre-enroled
 */
function IWmoodle_userapi_getallpre_ins($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    extract($args);
    $pntable = & pnDBGetTables();
    $c = $pntable['IWmoodle_column'];
    $where = "$c[uid] = $user";
    // get the objects from the db
    $items = DBUtil::selectObjectArray('IWmoodle', $where);
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($items === false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }
    // Return the items
    return $items;
}

/**
 * Delete the pre-inscription of an user
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	args   Array with the id of the course, the role and the id of the user
 * @return:	True if successfull or false in other cases
 */
function IWmoodle_userapi_delete_pre($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    // Argument check 
    if (!isset($args['mid']) || !is_numeric($args['mid'])) {
        return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
    }
    // Delete item
    if (!DBUtil::deleteObjectByID('IWmoodle', $args['mid'], 'mid')) {
        return LogUtil::registerError(__('Error! Sorry! Deletion attempt failed.', $dom));
    }
    // Success
    return true;
}

/**
 * Check if a user is enroled in a Moodle course with the same role
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	args   Array with the id of the course
 * @return:	Returns true if the user is enroled into the course with the same role or false in other cases
 */
function IWmoodle_userapi_is_enroled($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    extract($args);
    $prefix = pnModGetVar('IWmoodle', 'dbprefix');
    $connect = DBConnectionStack::init('moodle2');
    if (!$connect) {
        return LogUtil::registerError(__('The connection to Moodle database has failed.', $dom));
    }
    DBConnectionStack::popConnection();
    $sql = "SELECT count(*) 
			FROM $prefix" . "role_assignments,$prefix" . "context 
			WHERE $prefix" . "role_assignments.userid=$user
			AND $prefix" . "role_assignments.roleid=$role
			AND $prefix" . "role_assignments.contextid=$prefix" . "context.id
			AND $prefix" . "context.instanceid=$course";
    $rs = $connect->Execute($sql);
    if (!$rs) {
        $connect->close();
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }
    $array = $rs->FetchRow();
    $num = $array[0];
    $connect->close();
    if ($num > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks if a user is a Moodle user
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	args   Array with the id of the course, the role and the id of the user
 * @return:	True if is a Moodle user or false in other cases
 */
function IWmoodle_userapi_is_user($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    extract($args);
    $prefix = pnModGetVar('IWmoodle', 'dbprefix');
    $connect = DBConnectionStack::init('moodle2');
    if (!$connect) {
        return LogUtil::registerError(__('The connection to Moodle database has failed.', $dom));
    }
    DBConnectionStack::popConnection();
    $sql = "SELECT COUNT(*)
			FROM $prefix" . "user
			WHERE username='$user'";
    $rs = $connect->Execute($sql);
    if (!$rs) {
        return false;
    }
    $array = $rs->FetchRow();
    $num = $array[0];
    $connect->close();
    if ($num > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Get the information of a course
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	id of the course and role informations of the course
 * @return:	An array with the information of the course and the role
 */
function IWmoodle_userapi_getcourse($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    extract($args);
    $connect = DBConnectionStack::init('moodle2');
    if (!$connect) {
        return LogUtil::registerError(__('The connection to Moodle database has failed.', $dom));
    }
    DBConnectionStack::popConnection();
    $prefix = pnModGetVar('IWmoodle', 'dbprefix');
    if (!isset($role)) {
        $sql = "SELECT fullname, visible, summary
				FROM $prefix" . "course
				WHERE $prefix" . "course.id = $args[courseid]";
    } else {
        $sql = "SELECT fullname, visible, summary, name, $prefix" . "course.id
				FROM $prefix" . "course, $prefix" . "role
				WHERE $prefix" . "course.id = $courseid
				AND $prefix" . "role.id = $role";
    }
    $rs = $connect->Execute($sql);
    if (!$rs) {
        $connect->close();
        return LogUtil::registerError(_SELECTFAILED);
    }
    $array = $rs->FetchRow();
    $registre = array('fullname' => $array[0],
        'visible' => $array[1],
        'summary' => $array[2],
        'rolename' => $array[3],
        'id' => $array[4]);
    $connect->close();
    // Return and array with values
    return $registre;
}

/**
 * Get the identity and other information of a user in Moodle tables
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	id of the user in the intranet
 * @return:	The id of the user in Moodle
 */
function IWmoodle_userapi_getuserMDuid($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    extract($args);
    $prefix = pnModGetVar('IWmoodle', 'dbprefix');
    $connect = DBConnectionStack::init('moodle2');
    if (!$connect) {
        return LogUtil::registerError(__('The connection to Moodle database has failed.', $dom));
    }
    DBConnectionStack::popConnection();
    $sql = "SELECT id, password, auth, mnethostid
			FROM $prefix" . "user
			WHERE username='$username'";
    $rs = $connect->Execute($sql);
    if (!$rs) {
        $connect->close();
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }
    $array = $rs->FetchRow();
    $registre = array('id' => $array[0],
        'password' => $array[1],
        'auth' => $array[2],
        'mnethostid' => $array[3]);
    $connect->close();
    // Return and array with values
    return $registre;
}

/**
 * Get the courses of Moodle where the user is enroled
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	id of the user in the intranet
 * @return:	And array with the courses where the user is registered
 */
function IWmoodle_userapi_getusercourses($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    extract($args);
    // gets user id from Moodle
    $user_array = pnModAPIFunc('IWmoodle', 'user', 'getuserMDuid', array('username' => $args['user']));
    $userid = $user_array['id'];
    $prefix = pnModGetVar('IWmoodle', 'dbprefix');
    $username = pnUserGetVar(uname);
    $connect = DBConnectionStack::init('moodle2');
    if (!$connect) {
        return LogUtil::registerError(__('The connection to Moodle database has failed.', $dom));
    }
    DBConnectionStack::popConnection();
    $sql = "SELECT $prefix" . "course.id, $prefix" . "role.name, $prefix" . "course.summary, $prefix" . "course.fullname
			FROM $prefix" . "course, $prefix" . "context, $prefix" . "role_assignments, $prefix" . "role
			WHERE $prefix" . "context.id = $prefix" . "role_assignments.contextid 
			AND $prefix" . "role_assignments.userid = $userid
			AND $prefix" . "course.id = $prefix" . "context.instanceid
			AND  $prefix" . "role.id = $prefix" . "role_assignments.roleid
			AND $prefix" . "course.visible=1
			ORDER BY $prefix" . "course.id,$prefix" . "course.fullname";
    $rs = $connect->Execute($sql);
    if (!$rs) {
        $connect->close();
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }
    while ($array = $rs->FetchRow()) {
        $registres[] = array('id' => $array[0],
            'rolename' => $array[1],
            'summary' => $array[2],
            'fullname' => $array[3]);
    }
    $connect->close();
    // Return and array with values
    return $registres;
}

/**
 * Checks if an user is pre-enroled in a course
 * @author:     Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @param:	args   Array with the id of the course, the role and the id of the user
 * @return:	True if the user is pre-enroled and false in any other case
 */
function IWmoodle_userapi_is_preenroled($args) {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Security check
    if (!pnSecAuthAction(0, 'IWmoodle:coursesblock:', "::", ACCESS_READ)) {
        return false;
    }
    extract($args);
    $pntable = & pnDBGetTables();
    $c = $pntable['IWmoodle_column'];
    $where = "$c[uid] = $user AND $c[mcid] = $course	AND $c[role] = $role";
    // get the objects from the db
    $items = DBUtil::selectObjectArray('IWmoodle', $where);
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($items === false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }
    if (count($items) > 0) {
        return true;
    } else {
        return false;
    }
}