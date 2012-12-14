<?php

class IWmoodle_Api_Admin extends Zikula_AbstractApi {

    public function getlinks($args) {
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : 0, 'GET');
        $links = array();
        if (SecurityUtil::checkPermission('IWmoodle::', "::", ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWmoodle', 'admin', 'main'), 'text' => $this->__('Show available courses'), 'class' => 'z-icon-es-view');
            if ($id > 0) {
                $links[] = array('url' => ModUtil::url('IWmoodle', 'admin', 'enrole'), 'text' => $this->__('Enrol users into the course'), 'class' => 'z-icon-es-group');
            }
            $links[] = array('url' => ModUtil::url('IWmoodle', 'admin', 'conf'), 'text' => $this->__('Module configuration'), 'class' => 'z-icon-es-config');
            $links[] = array('url' => ModUtil::url('IWmoodle', 'admin', 'sincron'), 'text' => $this->__('Synchronize users'), 'class' => 'z-icon-es-group');
        }
        return $links;
    }

    /**
     * Gets all the uses pre-enroled into a course
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the course
     * @return:	And array with the users
     */
    public function getallpreins($args) {

        $registres = array();
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        extract($args);
        // Needed arguments.
        if (!isset($args['id']) || !is_numeric($args['id']) || !isset($args['role']) || !is_numeric($args['role'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWmoodle_column'];
        $where = "$c[mcid]=$id AND $c[role]=$role";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWmoodle', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get all the courses avaliable in Moodle
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The main information about the courses avaliable in Moodle
     */
    public function getall() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        $sql = "SELECT
			id, fullname, to_char(summary), shortname, format, visible
			FROM
				$prefix" . "course
			WHERE
				category > 0
			ORDER BY
				id DESC";
        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        while ($array = oci_fetch_array($results)) {
            $registres[] = array('id' => $array[0],
                'fullname' => $array[1],
                'summary' => $array[2],
                'shortname' => $array[3],
                'format' => $array[4],
                'visible' => $array[5]);
        }
        oci_close($connect);
        return $registres;
    }

    /**
     * Delete the enrolament of a user into a course
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the role into the role_assignments table
     * @return:	true if success
     */
    public function delete($args) {

        extract($args);
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        $sql = "DELETE FROM
			$prefix" . "role_assignments
			WHERE
				$prefix" . "role_assignments.id=$roleid";
        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        oci_close($connect);
        // Return and array with values
        return true;
    }

    /**
     * Change the activation of the Moodle courses
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the course to activate or to unactivate
     * @return:	true if success
     */
    public function activate($args) {

        extract($args);
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        //get course
        $course = ModUtil::apiFunc('IWmoodle', 'user', 'getcourse', array('courseid' => $id));
        $visible = ($course['visible'] == 0) ? 1 : 0;
        $sql = "UPDATE
			$prefix" . "course
			SET
				visible = $visible
			WHERE
				id=$id";
        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        oci_close($connect);
        return true;
    }

    /**
     * Gets all users enroled into a course and the roles of these users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the course
     * @return:	An array with the users and roles
     */
    public function getallusersbyrole($args) {

        extract($args);
        $registres = array();
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        $sql = "SELECT
			$prefix" . "course.id, userid, username, auth, lastaccess, contextid, $prefix" . "role_assignments.id
			FROM
				$prefix" . "course, $prefix" . "role_assignments, $prefix" . "user, $prefix" . "context
			WHERE
				$prefix" . "context.instanceid=$id 
				AND $prefix" . "context.contextlevel=50 
				AND $prefix" . "context.id = $prefix" . "role_assignments.contextid
				AND $prefix" . "role_assignments.roleid = $role
				AND $prefix" . "role_assignments.userid = $prefix" . "user.id 
				AND $prefix" . "course.id=$id";
        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        while ($array = oci_fetch_array($results)) {
            $registres[] = array('id' => $array[0],
                'userid' => $array[1],
                'username' => $array[2],
                'auth' => $array[3],
                'lastaccess' => $array[4],
                'contextid' => $array[5],
                'roleid' => $array[6]);
        }
        oci_close($connect);
        // Return and array with values
        return $registres;
    }

    /**
     * Gets all the roles in a Moodle course
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the course
     * @return:	An array with the name and identities of the roles
     */
    public function getallroles() {

        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        $sql = "SELECT
			$prefix" . "role.id, $prefix" . "role.name
			FROM
				$prefix" . "role";
        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        while ($array = oci_fetch_array($results)) {
            $registres[] = array('id' => $array[0],
                'name' => $array[1]);
        }
        oci_close($connect);
        // Return and array with values
        return $registres;
    }

    /**
     * Get the id of a user into the website
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   the user name
     * @return:	the id of the user
     */
    public function getuserPNuid($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        extract($args);
        $pntable = DBUtil::getTables();
        $c = $pntable['users_column'];
        $where = "$c[uname]='$pn_uname'";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('users', $where);
        // Return the user id
        return $items[0]['uid'];
    }

    /**
     * Create the enrolements and the preinscriptions of the users into the courses
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the course, the roles and a array with the users
     * @return:	true if success
     */
    public function enrol_user($args) {

        extract($args);
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN) && !SecurityUtil::checkPermission('coursesblock::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');

        $enrolid = ModUtil::apiFunc('IWmoodle', 'admin', 'getEnrolId', array('courseid' => $course));

        if (!$enrolid > 0) {
            oci_close($connect);
            return LogUtil::registerError($this->__('The manual inscription method is not defined in course. You showd define if from Moodle administration tools.'));
        }

        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        $time = time();

        // get context id
        $sql = "SELECT $prefix" . "context.id FROM $prefix" . "context WHERE $prefix" . "context.instanceid=$course AND $prefix" . "context.contextlevel=50";
        $rs = $connect->Execute($sql);
        if (!$rs) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $array = $rs->FetchRow();
        $contextid = $array[0];

        $sql = "INSERT INTO $prefix" . "role_assignments (userid,roleid,contextid,timemodified,modifierid) VALUES ($user,$role,$contextid,'$time'," . UserUtil::getVar("uid") . ")";

        $result = $connect->Execute($sql);
        if (!$result) {
            oci_close($connect);
            return LogUtil::registerError($this->__('An error occurred doing the action.'));
        }

        $sql = "INSERT INTO $prefix" . "user_enrolments (status,enrolid,userid,timestart,timeend,modifierid,timecreated,timemodified)
                                                                          VALUES (0,$enrolid,$user,'$time','2147483647',$user,'$time','$time')";

        $result = $connect->Execute($sql);
        if (!$result) {
            oci_close($connect);
            return LogUtil::registerError($this->__('An error occurred doing the action.'));
        }

        oci_close($connect);
        return true;
    }

    /**
     * Count the number of users who satisfy a rule
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   the rule that have to be satisfied
     * @return:	The number of users who satisfy the rule
     */
    public function nombre($args) {
        extract($args);
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        /*
          $myJoin[] = array('join_table' => 'group_membership',
          'join_field' => array(),
          'object_field_name' => array(),
          'compare_field_table' => 'uid',
          'compare_field_join' => 'uid');

          $myJoin[] = array('join_table' => 'users',
          'join_field' => array('uid', 'pass'),
          'object_field_name' => array('uid', 'pass'),
          'compare_field_table' => 'uid',
          'compare_field_join' => 'uid');

          $tables = DBUtil::getTables();
          $ocolumn = $tables['group_membership_column'];
          $lcolumn = $tables['users_column'];
          if ($filtre == '0') {
          $filtre = '';
          }
          $filtregrup = ($campfiltre != '0') ? " $ocolumn[gid] = " . (int) DataUtil::formatForStore($campfiltre) . " and " : '';
          $where = $filtregrup . " $lcolumn[uname] LIKE '" . $filtre . "%'";
          $orderby = "$lcolumn[uname]";
          $items = DBUtil::selectObjectCount('group_membership', $myJoin, $where);
          return $items;
         * 
         */
        $pntable = DBUtil::getTables();
        $t = $pntable['group_membership'];
        $c = $pntable['group_membership_column'];
        $t1 = $pntable['users'];
        $c1 = $pntable['users_column'];
        if ($filtre == '0') {
            $filtre = '';
        }
        $filtregrup = ($campfiltre != '0') ? " $c[gid] = " . (int) DataUtil::formatForStore($campfiltre) . " and " : '';
        $sql = "SELECT COUNT(DISTINCT $t.$c[uid])
          FROM
          $t, $t1
          WHERE
          " . $filtregrup . " $t.$c[uid] = $t1.$c1[uid]
          AND $c1[uname] LIKE '" . $filtre . "%'
          ORDER BY
          $c1[uname]";

        $registre = DBUtil::executeSQL($sql);

        list($nombre) = $registre->fields;

        // Return and array with values
        return $nombre;

        /*
          $t = $pntable['group_membership'];
          $c = $pntable['group_membership_column'];
          $t1 = $pntable['users'];
          $c1 = $pntable['users_column'];
          if ($filtre == '0') {
          $filtre = '';
          }
          $filtregrup = ($campfiltre != '0') ? " $c[gid] = " . (int) DataUtil::formatForStore($campfiltre) . " and " : '';
          $sql = "SELECT COUNT(DISTINCT $t.$c[uid])
          FROM
          $t, $t1
          WHERE
          " . $filtregrup . " $t.$c[uid] = $t1.$c1[uid]
          AND $c1[uname] LIKE '" . $filtre . "%'
          ORDER BY
          $c1[uname]";
          $registre = $dbconn->Execute($sql);
          if ($dbconn->ErrorNo() != 0) {
          oci_close($connect);
          return LogUtil::registerError($this->__('Error! Could not load items.'));
          }
          list($nombre) = $registre->fields;
          // Return and array with values
          return $nombre;
         * 
         */
    }

    /**
     * Change the method used by the user to validate into Moodle. Two possibilities: from the website via db or from the Moodle using the manual method
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the users that have to change their validation method
     * @return:	true if success
     */
    public function change($args) {

        extract($args);
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        $user_pass = substr($user_pass, 3, strlen($user_pass));
        if ($user_connect == 1) {
            $sql = "UPDATE
				$prefix" . "user
				SET
					auth='manual',password='$user_pass'
				WHERE
					username='$user_name'";
            $results = oci_parse($connect, $sql);
            $r = oci_execute($results);
        } elseif ($user_connect == 0) {
            $sql = "UPDATE
				$prefix" . "user
			SET
				auth='db',password='$user_pass'
			WHERE
				username='$user_name'";
            $results = oci_parse($connect, $sql);
            $r = oci_execute($results);
        } else {
            $r = ModUtil::apiFunc('IWmoodle', 'admin', 'inscriu', array('uid' => $user_id));
        }

        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        oci_close($connect);
        return true;
    }

    /**
     * Create user into Moodle
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the users that have to change their validation method
     * @return:	true if success
     */
    public function inscriu($args) {

        extract($args);
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN) && UserUtil::getVar('uid') != $uid) {
            //return LogUtil::registerPermissionError();
        }
        if (!isset($uid)) {
            $uid = UserUtil::getVar('uid');
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        // Prepare vars because we're going to change the database
        $uname = strtolower(UserUtil::getVar('uname', $uid));
        $pass = UserUtil::getVar('pass', $uid);
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $firstname = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => UserUtil::getVar('uid', $uid),
                    'info' => 'n',
                    'sv' => $sv));
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $lastname = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => UserUtil::getVar('uid', $uid),
                    'info' => 'c1',
                    'sv' => $sv));
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $lastname2 = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => UserUtil::getVar('uid', $uid),
                    'info' => 'c2',
                    'sv' => $sv));

        if ($lastname2 != '') {
            $lastname .= ' ' . $lastname2;
        }
        $dfl_description = (ModUtil::getVar('IWmoodle', 'dfl_description') != '') ? ModUtil::getVar('IWmoodle', 'dfl_description') : ' ';
        $dfl_language = (ModUtil::getVar('IWmoodle', 'dfl_language') != '') ? ModUtil::getVar('IWmoodle', 'dfl_language') : ' ';
        $dfl_country = (ModUtil::getVar('IWmoodle', 'dfl_country') != '') ? ModUtil::getVar('IWmoodle', 'dfl_country') : ' ';
        $dfl_city = (ModUtil::getVar('IWmoodle', 'dfl_city') != '') ? ModUtil::getVar('IWmoodle', 'dfl_city') : ' ';
        $dfl_gtm = (ModUtil::getVar('IWmoodle', 'dfl_gtm') != '') ? ModUtil::getVar('IWmoodle', 'dfl_gtm') : ' ';
        $email = UserUtil::getVar('pn_email', $uid);
        if ($lastname == '') {
            $lastname = ' ';
        }
        if ($email == '') {
            $email = $uname . '@mail.domain';
        }
        // get admin mnethostid to user the value for the other users
        $userAdmin = ModUtil::apiFunc('IWmoodle', 'user', 'getuserMDuid', array('username' => 'admin'));
        // let's proceed
        $time = time();
        $sql = "INSERT INTO
			$prefix" . "user (auth, confirmed, username, password, description, lang, timemodified, country, city, firstname, lastname, email, timezone, mnethostid)
			VALUES
				('db', 1, '" .
                $uname . "', '" .
                substr($pass, 3, strlen($pass)) . "', '" .
                $dfl_description . "', '" .
                $dfl_language . "', '" .
                $time . "', '" .
                $dfl_country . "', '" .
                $dfl_city . "', '" .
                $firstname . "', '" .
                $lastname . "', '" .
                $email . "', '" .
                $dfl_gtm . "', " . $userAdmin['mnethostid'] . ")";

        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        oci_close($connect);
        return true;
    }

    /**
     * Gets all users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the group of users to return
     * @return:	an array with the main information of the users
     */
    public function getusers($args) {
        /*
          extract($args);
          // Security check
          $registres = array();
          // Security check
          if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
          return LogUtil::registerPermissionError();
          }
          $pntable = DBUtil::getTables();
          $t = $pntable['group_membership'];
          $c = $pntable['group_membership_column'];
          $t1 = $pntable['users'];
          $c1 = $pntable['users_column'];
          if ($filtre == '0') {
          $filtre = '';
          }
          $inici = $inici - 1;
          if ($inici < 0)
          $inici = 0;
          $filtregrup = ($campfiltre != '0') ? " $c[gid] = " . (int) DataUtil::formatForStore($campfiltre) . " and " : '';
          $sql = "SELECT DISTINCT
          $t1.$c1[uid], $c1[pass]
          FROM
          $t, $t1
          WHERE
          " . $filtregrup . " $t.$c[uid] = $t1.$c1[uid]
          AND
          $c1[uname] LIKE '" . $filtre . "%'
          ORDER BY
          $c1[uname]
          LIMIT $inici,$numitems";

          $registres = DBUtil::executeSQL($sql);

          // Return and array with values
          return $registres;
         */


        extract($args);
        // Security check
        $registres = array();
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $myJoin[] = array('join_table' => 'group_membership',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');

        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uid', 'pass'),
            'object_field_name' => array('uid', 'pass'),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');

        $tables = DBUtil::getTables();
        $ocolumn = $tables['group_membership_column'];
        $lcolumn = $tables['users_column'];
        if ($filtre == '0') {
            $filtre = '';
        }
        $filtregrup = ($campfiltre != '0') ? " $ocolumn[gid] = " . (int) DataUtil::formatForStore($campfiltre) . " and " : '';
        $where = $filtregrup . " $lcolumn[uname] LIKE '" . $filtre . "%'";
        $orderby = "$lcolumn[uname]";
        $items = DBUtil::selectExpandedObjectArray('group_membership', $myJoin, $where, $orderby, $numitems, $inici - 1, 'uid');
        return $items;

        //die('reconstruir la funció amb dbutil');
        /*
          $pntable = & DBUtil::getTables();
          $t = $pntable['group_membership'];
          $c = $pntable['group_membership_column'];
          $t1 = $pntable['users'];
          $c1 = $pntable['users_column'];
          if ($filtre == '0') {
          $filtre = '';
          }
          $filtregrup = ($campfiltre != '0') ? " $c[gid] = " . (int) DataUtil::formatForStore($campfiltre) . " and " : '';
          $sql = "SELECT DISTINCT
          $t1.$c1[uid], $c1[pass]
          FROM
          $t, $t1
          WHERE
          " . $filtregrup . " $t.$c[uid] = $t1.$c1[uid]
          AND
          $c1[uname] LIKE '" . $filtre . "%'
          ORDER BY
          $c1[uname]";
          $registre = $dbconn->SelectLimit($sql, (int) $numitems, (int) $inici - 1);
          if ($dbconn->ErrorNo() != 0) {
          return LogUtil::registerError($this->__('Error! Could not load items.'));
          }
          for (; !$registre->EOF; $registre->MoveNext()) {
          list($uid, $password) = $registre->fields;
          $registres[] = array('uid' => $uid, 'password' => $password);
          }
          oci_close($connect);
          // Return and array with values
          return $registres;
         * 
         */
    }

    /**
     * Pre-enrol user in a course
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the course, the role and the id of the user
     * @return:	True if success
     */
    public function preenrol_user($args) {

        // Check that the needed args have arrived properly
        if (!isset($args['mcid']) || !isset($args['uid']) || !isset($args['role'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', "::", ACCESS_ADMIN)) {
            return false;
        }
        if (!DBUtil::insertObject($args, 'IWmoodle', 'mid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        return $args['mid'];
    }

    /**
     * Pre-enrol user in a course
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the course, the role and the id of the user
     * @return:	True if success
     */
    public function getMoodleUsers($args) {

        extract($args);
        // Security check
        $registres = array();
        // Security check
        if (!SecurityUtil::checkPermission('IWmoodle::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        $time = time();
        $sql = "SELECT
				id,username, password, firstname, lastname, email
			FROM
				$prefix" . "user
			WHERE
				confirmed = 1
			AND
				deleted = 0";

        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        while ($array = oci_fetch_array($results)) {
            $usersArray[] = array('id' => $array[0],
                'username' => $array[1],
                'password' => $array[2],
                'firstname' => $array[3],
                'lastname' => $array[4],
                'email' => $array[5]);
        }

        oci_close($connect);
        return $usersArray;
    }

    /**
     * Create a new user in table users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   user values
     * @return:	True if success and false otherwise
     */
    public function createUser($args) {

        $nom = FormUtil::getPassedValue('nom', isset($args['nom']) ? $args['nom'] : null, 'POST');
        $cognoms = FormUtil::getPassedValue('cognoms', isset($args['cognoms']) ? $args['cognoms'] : null, 'POST');
        $pass = FormUtil::getPassedValue('pass', isset($args['pass']) ? $args['pass'] : null, 'POST');
        $uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'POST');
        $email = FormUtil::getPassedValue('email', isset($args['email']) ? $args['email'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        //Needed arguments
        if ($uname == null || $pass == null || $email == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = array('uname' => $uname,
            'pass' => '1$$' . $pass,
            'email' => $email,
            'activated' => 1,
            'approved_by' => 2,
            'user_regdate' => date("Y-m-d H:i:s", time()));
        $result = DBUtil::insertObject($items, 'users', 'uid');
        if (!$result) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        //add user to default group
        $defaultgroup = ModUtil::getVar('Groups', 'defaultgroup');
        $items = array('uid' => $result['uid'],
            'gid' => $defaultgroup);
        if (!DBUtil::insertObject($items, 'group_membership')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        die('Api:Admin.php:775:falla la insersió a la taula IWusers. Mirar perquè');
        /*
        $items = array('uid' => $result['uid'],
            'nom' => $nom,
            'cognom1' => $cognoms);
        if (!DBUtil::insertObject($items, 'IWusers', 'suid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
         * 
         */
        // Return the id of the newly created user to the calling process
        return $result['uid'];
    }

    /**
     * Create a new user in table users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   user values
     * @return:	True if success and false otherwise
     */
    public function getEnrolId($args) {
        $courseid = FormUtil::getPassedValue('courseid', isset($args['courseid']) ? $args['courseid'] : null, 'POST');


        $prefix = ModUtil::getVar('IWmoodle', 'dbprefix');
        $connect = ModUtil::apiFunc('IWmoodle', 'user', 'connectExtDB');
        if (!$connect) {
            return LogUtil::registerError($this->__('The connection to Moodle database has failed.'));
        }
        // get enrolid id
        $sql = "SELECT $prefix" . "enrol.id FROM $prefix" . "enrol WHERE $prefix" . "enrol.enrol='manual' AND $prefix" . "enrol.courseid=$courseid";

        $results = oci_parse($connect, $sql);
        $r = oci_execute($results);
        if (!$r) {
            oci_close($connect);
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $array = oci_fetch_array($results);
        oci_close($connect);
        return $array[0];
    }

}