<?php

class IWqv_Api_User extends Zikula_AbstractApi {

    /**
     * Get an array with the all the skins
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	-
     * @return array   The array with each skin (id, name)
     */
    public function getskins($args) {
        $tmp = explode(",", ModUtil::getVar('IWqv', 'skins'));
        for ($i = 0; $i < count($tmp); $i++) {
            switch ($tmp[$i]) {
                case "default": $items[$i] = array("id" => $tmp[$i],
                        "name" => $this->__('@default'));
                    break;
                case "formal": $items[$i] = array("id" => $tmp[$i],
                        "name" => $this->__('@formal'));
                    break;
                case "infantil": $items[$i] = array("id" => $tmp[$i],
                        "name" => $this->__('@infantil'));
                    break;
            }
        }
        return $items;
    }

    /**
     * Get an array with the all the languages
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	-
     * @return array   The array with each language (id, name)
     */
    public function getlangs($args) {
        $tmp = explode(",", ModUtil::getVar('IWqv', 'langs'));
        for ($i = 0; $i < count($tmp); $i++) {
            switch ($tmp[$i]) {
                case "ca": $items[$i] = array("id" => $tmp[$i],
                        "name" => $this->__('Catalan'));
                    break;
                case "en": $items[$i] = array("id" => $tmp[$i],
                        "name" => $this->__('English'));
                    break;
                case "es": $items[$i] = array("id" => $tmp[$i],
                        "name" => $this->__('Spanish'));
                    break;
            }
        }
        return $items;
    }

    /**
     * Get an array with the all the max deliver possibilities
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	-
     * @return array   The array with each maxdeliver possibility (id, name)
     */
    public function getmaxdelivers($args) {
        $tmp = explode(",", ModUtil::getVar('IWqv', 'maxdelivers'));
        for ($i = 0; $i < count($tmp); $i++) {
            $name = $tmp[$i];
            if ($name == -1)
                $name = $this->__('Unlimited');
            $items[$i] = array("id" => $tmp[$i],
                "name" => $name);
        }
        return $items;
    }

    /**
     * Get an array with the window target options
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	-
     * @return array   The array with window target options (id, name)
     */
    public function gettargets($args) {
        return array(array("id" => "blank",
                "name" => $this->__('In a new window')), array("id" => "self",
                "name" => $this->__('In the same window')));
    }

    /**
     * Gets all the qvs to do or to correct (depending of the parameters) for the current user
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	If none of the following parameters is specified, it will be returned all the qvs
     * 			- teacher teacher of the qvs (to filter)
     * 			- student to filter only the qvs associated to this student
     * @return	And array with the qvs information
     */
    public function getall($args) {
        // Get the parameters
        $teacher = FormUtil::getPassedValue('teacher', isset($args['teacher']) ? $args['teacher'] : null, 'POST');
        $student = FormUtil::getPassedValue('student', isset($args['student']) ? $args['student'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return array();
        }
        $where = '';
        $pntable = DBUtil::getTables();
        $c = $pntable['IWqv_column'];

        if (isset($teacher)) {
            // Security check
            if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
                return array();
            }
            $where = "$c[teacher]=$teacher ";
            $orderby = "$c[title] asc";
            // Get the objects from the db
            $items = DBUtil::selectObjectArray('IWqv', $where, $orderby, '-1', '-1');
        } else if (isset($student)) {
            $pntables = DBUtil::getTables();
            $c = $pntables['IWqv_column'];

            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $usergroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv,
                        'uid' => $student));
            foreach ($usergroups as $group) {
                if ($where != '')
                    $where.=" OR ";
                $where.= " ($c[groups] like '%$$group[id]$%' AND $c[active]=1)";
            }
            $items = DBUtil::selectObjectArray('IWqv', $where, $c['title']);
        }else {
            $where = " ";
            $orderby = "$c[title] asc";
            // Get the objects from the db
            $items = DBUtil::selectObjectArray('IWqv', $where, $orderby, '-1', '-1');
        }

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Add more information
        $newitems = array();
        foreach ($items as $item) {
            $item = ModUtil::apiFunc('IWqv', 'user', 'completeqvinfo', array("item" => $item));
            array_push($newitems, $item);
        }
        // Return the items
        return $newitems;
    }

    /**
     * Gets the information of a qv activity
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	The id of the assignment
     * @return	An array with the qv activity information
     */
    public function get($args) {
        // Get the parameters
        $qvid = FormUtil::getPassedValue('qvid', isset($args['qvid']) ? $args['qvid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($qvid) || !is_numeric($qvid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = DBUtil::selectObjectByID('IWqv', $qvid, 'qvid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($item === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $item = ModUtil::apiFunc('IWqv', 'user', 'completeqvinfo', array("item" => $item));

        // Return the item
        return $item;
    }

    /**
     * Gets complementary information of a qv activity
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	The qv ($item) to add more information
     * @return	An array with the qv activity information
     */
    public function completeqvinfo($args) {
        extract($args);
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $user = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                    'uid' => $item['teacher'],
                    'info' => 'ncc'));
        $item['teachername'] = $user;
        $item['briefcrdate'] = DateUtil::formatDatetime($item['cr_date']);
        return $item;
    }

    /**
     * Gets the information of an user qv assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param  args	
     * 			- qv (*)
     * 			- userid (*)
     *          - createifnotexist (default = true)
     *          - getallinformation (default = true)
     * @return	The assignment of the specified user for the specified qvid
     */
    public function getassignment($args) {
        $totalscore = 0;
        $states = 0;
        $totaldelivers = 0;
        $totaltime = 0;

        // Get the parameters
        extract($args);
        if (isset($qv))
            $qvid = $qv['qvid'];
        if (!isset($viewas))
            $viewas = 'student';
        if (!isset($createifnotexist))
            $createifnotexist = true;
        if (!isset($getallinformation))
            $getallinformation = true;

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ((!isset($qvaid) && (!isset($qvid) || !is_numeric($qvid) || !isset($userid) || !is_numeric($userid)))) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // Get the assignment
        if (isset($qvaid)) {
            $item = DBUtil::selectObjectByID('IWqv_assignments', $qvaid, 'qvaid');
        } else {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_assignments_column'];
            $where = " $c[qvid]=$qvid AND $c[userid]=$userid ";
            $item = DBUtil::selectObject('IWqv_assignments', $where);
        }


        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($item === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        } else {
            if (!isset($item) && $createifnotexist) {
                $item = array('qvid' => $qvid,
                    'userid' => $userid);
                // Create the assignment
                $qvaid = ModUtil::apiFunc('IWqv', 'user', 'createassignment', $item);
                $item['qvaid'] = $qvaid;
            }

            if (isset($item) && $getallinformation) {
                $args['qv'] = (isset($args['qv'])) ? $args['qv'] : 0;
                // Get or calculate some assignment values
                $item['fullurl'] = ModUtil::apiFunc('IWqv', 'user', 'getfullurl', array('qv' => $args['qv'],
                            'assignment' => $item,
                            'viewas' => $viewas));

                $pntable = DBUtil::getTables();
                $c = $pntable['IWqv_sections_column'];
                $where = " $c[qvaid]=$item[qvaid] ";
                $sections = DBUtil::selectObjectArray('IWqv_sections', $where, '');
                if ($sections) {
                    $totaltime = "00:00:00";
                    $totaldelivers = 0;
                    $totalscore = 0;
                    $states = array();
                    foreach ($sections as $section) {
                        $totaltime = ModUtil::apiFunc('IWqv', 'user', 'addtime', array('time1' => $totaltime,
                                    'time2' => $section['time']));
                        if ($section['attempts'] > $totaldelivers)
                            $totaldelivers = $section['attempts'];
                        // score
                        $start = strpos($section['scores'], $section['sectionid'] . '_score=');
                        if ($start >= 0) {
                            $start += strlen($section['sectionid'] . '_score=');
                            $length = strpos(substr($section['scores'], $start + 1), '#') + 1;
                            $totalscore += substr($section['scores'], $start, $length);
                        }
                        // status
                        if (isset($section['state'])) {
                            $states[$section['state']] = 1;
                        } else {
                            $states[$section['state']] += 1;
                        }
                    }
                }

                $item['score'] = $totalscore;
                $item['states'] = $states;
                $item['sections'] = count($sections);
                // Section with the max number of delivers
                $item['delivers'] = $totaldelivers;
                // The sum of the time of each section
                $item['totaltime'] = $totaltime;
            }
        }
        // Return the item
        return $item;
    }

    /**
     * Gets the list of users of an assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param  args	The following parameters are mandatory:
     * 			- qvgroups 
     * @return	The list of users of an assignment
     */
    public function getassignmentusers($args) {
        // Get the parameters
        $qvgroups = FormUtil::getPassedValue('qvgroups', isset($args['qvgroups']) ? $args['qvgroups'] : "", 'POST');

        $users = array();
        $groups = explode('$', $qvgroups);
        foreach ($groups as $group) {
            if ($group != '') {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $membersgroup = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                            'gid' => $group));
                foreach ($membersgroup as $member) {
                    if (!array_key_exists($member['id'], $users)) {
                        $users[$member['id']] = $member;
                        $users[$member['id']]['fullname'] = $users[$member['id']]['name'];
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $users[$member['id']]['name'] = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                                    'uid' => $member['id'],
                                    'info' => 'l'));
                    }
                }
            }
        }

        // Sort the users by fullname
        foreach ($users as $key => $row) {
            $userids[$key] = $row['id'];
            $usernames[$key] = $row['name'];
            $userfullnames[$key] = $row['fullname'];
        }
        array_multisort($userfullnames, SORT_ASC, $usernames, SORT_ASC, $userids, SORT_ASC, $users);

        return $users;
    }

    /**
     * Gets the information of an qv assignment as teacher
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param  args	The following parameters are mandatory:
     * 			- qvid 
     * 			- teacher
     * @return	The list of assignments of the specified teacher (for specified qvid)
     */
    public function getteacherassignments($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }

        // Get the parameters
        $qv = FormUtil::getPassedValue('qv', isset($args['qv']) ? $args['qv'] : array(), 'POST');
        $qvid = $qv['qvid'];
        $teacher = FormUtil::getPassedValue('teacher', isset($args['teacher']) ? $args['teacher'] : null, 'POST');

        // Needed argument
        if (!isset($qvid) || !is_numeric($qvid) || !isset($teacher) || !is_numeric($teacher)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $assignments = array();
        $users = ModUtil::apiFunc('IWqv', 'user', 'getassignmentusers', array('qvgroups' => $qv['groups']));
        foreach ($users as $user) {
            $assignment = ModUtil::apiFunc('IWqv', 'user', 'getassignment', array('qv' => $qv,
                        'userid' => $user['id'],
                        'createifnotexist' => false));
            if (!isset($assignment)) {
                $assignment['userid'] = $user['id'];
                $assignment['fullurl'] = '';
                $assignment['qvaid'] = '';
                $assignment['states'] = '';
                $assignment['sections'] = '';
                $assignment['score'] = '';
                $assignment['totaltime'] = '';
                $assignment['teachercomments'] = '';
                $assignment['teacherobservations'] = '';
            }
            $assignment['userfullname'] = $user['fullname'];
            $assignments[] = $assignment;
        }

        return $assignments;
    }

    /**
     * Create a new user assignment into database
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the assignment information (userid, qvid)
     * @return	identity of the new record created or false if error
     */
    public function createassignment($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Get the parameters
        extract($args);

        // Needed argument
        if (!isset($qvid) || !isset($userid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = array('qvid' => $qvid,
            'userid' => $userid);

        if (isset($qvaid)) {
            // Update the assignment
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_assignments_column'];
            $where = "$c[qvaid]=$qvaid ";

            if (!DBUTil::updateObject($item, 'IWqv', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
            $item['qvaid'] = $qvaid;
        } else {
            if (!DBUtil::insertObject($item, 'IWqv_assignments', 'qvaid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
            // Let any hooks know that we have created a new item
            ModUtil::callHooks('item', 'create', $item['qvaid'], array('module' => 'IWqv'));
        }

        // Return the id of the newly created item to the calling process
        return $item['qvaid'];
    }

    /**
     * Create or update a new user assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the assignment information (userid, qvid)
     * @return	identity of the new record created/updated or false if error
     */
    public function updateassignment($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }

        // Get the parameters
        extract($args);

        // Needed argument
        if (!isset($qvid) || !isset($userid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = ModUtil::apiFunc('IWqv', 'user', 'getassignment', array('qv' => $qvid,
                    'userid' => $userid,
                    'getallinformation' => false));

        if ($item) {
            // Update the assignment
            $item['teachercomments'] = $teachercomments;
            $item['teacherobservations'] = $teacherobservations;

            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_assignments_column'];
            $where = "$c[qvaid]=$item[qvaid] ";
            if (!DBUTil::updateObject($item, 'IWqv_assignments', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        } else {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['qvaid'];
    }

    /**
     * Compose the full assessment url
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	
     * 				- qv object with the assessment information
     *  			- assignment object with the assignment information
     * 				- userid user identifier
     * 				- fullname full name of the user
     * 				- viewas teacher o student
     * @return string	full url composed with specified params
     */
    public function getfullurl($args) {
        // Get the parameters
        extract($args);

        $params = (isset($params)) ? $params : '';

        // @TODO: If the qv file is in the intranet documents, check if it's necessary to add basedist for appl, css and scripts
        // Get the params of the URL
        $server = System::getBaseUrl() . ModUtil::url('IWqv', 'user', 'beans');
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userfullname = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                    'uid' => $assignment['userid'],
                    'info' => 'ncc'));

        // Construct the URL
        $qvurl = $qv['url'];
        if (strrpos($qvurl, "?") === false)
            $qvurl.="?";
        else
            $qvurl.="&";

        $qvurl .= "server=$$$server$$&assignmentid=$assignment[qvaid]&userid=$assignment[userid]&fullname=$userfullname";
        $qvurl .= "&skin=$qv[skin]&amp;la" . "ng=$qv[lang]&showinteraction=$qv[showinteraction]&showcorrection=$qv[showcorrection]";
        $qvurl .= "&userview=$viewas" . $params;
        return $qvurl;

        //@TODO (pasted from Moodle)
        $qv_file = $qv->url;
        $last = strrpos($qv_file, "/html/");
        $size = strlen($qv_file);
        $params = "";

        if ($last < strlen($qv_file)) {
            $base_file = substr($qv_file, 0, $last + 1);
        }

        //if (isset($assignment->id)){
        $fullurl = "$qv_url?server=" . $CFG->wwwroot . "/mod/qv/action/beans.php&assignmentid=$assignment->id&userid=$userid&fullname=$fullname&skin=$qv->skin&lang=$qv->assessmentlang&showinteraction=$qv->showinteraction&showcorrection=$qv->showcorrection&order_sections=$qv->ordersections&order_items=$qv->orderitems" . ($isteacher ? "&userview=teacher" : "") . (($assignment->sectionorder > 0 && $qv->ordersections == 1) ? "&section_order=$assignment->sectionorder" : "") . (($assignment->itemorder > 0 && $qv->orderitems == 1) ? "&item_order=$assignment->itemorder" : "") . $params;
        return $fullurl;
        //}
        return "";
    }

    /**
     * Create a new qv into database
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the qv information
     * @return	identity of the new record created or false if error
     */
    public function createqv($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', "::", ACCESS_ADD)) {
            return LogUtil::registerError($this->__('Sorry! No authorization to access this module.'), 403);
        }

        // Get the parameters
        extract($args);

        // Needed argument
        if (!isset($title) || !isset($url)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = array('teacher' => $teacher,
            'groups' => $groups,
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'skin' => $skin,
            'lang' => $lang,
            'maxdeliver' => $maxdeliver,
            'showcorrection' => $showcorrection,
            'showinteraction' => $showinteraction,
            'ordersections' => $ordersections,
            'orderitems' => $orderitems,
            'target' => $target,
            'width' => $width,
            'height' => $height,
            'observations' => $observations,
            'active' => $active);

        if (isset($qvid)) {
            // Update the qv
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_column'];
            $where = "$c[qvid]=$qvid ";

            if (!DBUTil::updateObject($item, 'IWqv', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
            $item['qvid'] = $qvid;
        } else {
            if (!DBUtil::insertObject($item, 'IWqv', 'qvid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
            // Let any hooks know that we have created a new item
            ModUtil::callHooks('item', 'create', $item['qvid'], array('module' => 'IWqv'));
        }

        // Return the id of the newly created item to the calling process
        return $item['qvid'];
    }

    /**
     * Delete a qv (with its user assignments, sections, messages...)
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param $args['qvid'] ID of the qv assignment
     * @return bool true on success, false on failure
     */
    public function deleteqv($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerError($this->__('Sorry! No authorization to access this module.'));
        }

        // Argument check
        if (!isset($args['qvid']) || !is_numeric($args['qvid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = ModUtil::apiFunc('IWqv', 'user', 'get', array('qvid' => $args['qvid']));
        if ($item == false) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Delete the qv and its assignments
        $assignments = ModUtil::apiFunc('IWqv', 'user', 'getqvassignments', array('qvid' => $args['qvid']));
        foreach ($assignments as $assignment) {
            if (!ModUtil::apiFunc('IWqv', 'user', 'deleteuserassignment', array('qvaid' => $assignment[qvaid]))) {
                return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
            }
        }

        if (!DBUtil::deleteObjectByID('IWqv', $args['qvid'], 'qvid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // Let any hooks know that we have deleted an item
        ModUtil::callHooks('item', 'delete', $args['qvid'], array('module' => 'IWqv'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete an user assignment (with its sections, messages...)
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param $args['qvaid'] ID of the user assignment
     * @return bool true on success, false on failure
     */
    public function deleteuserassignment($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerError($this->__('Sorry! No authorization to access this module.'));
        }

        // Argument check
        if (!isset($args['qvaid']) || !is_numeric($args['qvaid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = ModUtil::apiFunc('IWqv', 'user', 'getassignment', array('qvaid' => $args['qvaid'],
                    'createifnotexist' => false,
                    'getallinformation' => false));
        if ($item == false) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Delete the assignment with its sections and messages
        $sections = ModUtil::apiFunc('IWqv', 'user', 'getsections', array('qvaid' => $args['qvaid']));
        foreach ($sections as $section) {
            $sections = ModUtil::apiFunc('IWqv', 'user', 'deletesection', array('qvsid' => $section[qvsid]));
        }

        if (!DBUtil::deleteObjectByID('IWqv_assignments', $args['qvaid'], 'qvaid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // Let any hooks know that we have deleted an item
        ModUtil::callHooks('item', 'delete', $args['qvaid'], array('module' => 'IWqv'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete the specified section of an user assignment (with its messages...)
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param $args['qvsid'] ID of the section
     * @return bool true on success, false on failure
     */
    public function deletesection($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerError($this->__('Sorry! No authorization to access this module.'));
        }

        // Argument check
        if (!isset($args['qvsid']) || !is_numeric($args['qvsid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = ModUtil::apiFunc('IWqv', 'user', 'getsection', array('qvsid' => $args[qvsid]));
        if ($item == false) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Delete the section with its messages
        $messages = ModUtil::apiFunc('IWqv', 'user', 'getsectionmessages', array('qvsid' => $args[qvsid]));
        foreach ($messages as $message) {
            if (!ModUtil::apiFunc('IWqv', 'user', 'deletemessage', array('qvmid' => $message[qvmid]))) {
                LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
            }
        }

        if (!DBUtil::deleteObjectByID('IWqv_sections', $args['qvsid'], 'qvsid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete the specified message
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param $args['qvmid'] ID of the message
     * @return bool true on success, false on failure
     */
    public function deletemessage($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerError($this->__('Sorry! No authorization to access this module.'));
        }

        // Argument check
        if (!isset($args['qvmid']) || !is_numeric($args['qvmid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = ModUtil::apiFunc('IWqv', 'user', 'getmessage', array('qvmid' => $args[qvmid]));
        if ($item == false) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Delete the message and the read messages mark
        $pntable = DBUtil::getTables();
        $c = $pntable['IWqv_messages_read_column'];
        $where = " $c[qvmid]=$args[qvmid] ";
        if (!DBUtil::deleteObject(array(), 'IWqv_messages_read', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        if (!DBUtil::deleteObjectByID('IWqv_messages', $args['qvmid'], 'qvmid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Gets all the assignments relationated with specified qv
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param  args	The following parameters are mandatory:
     * 			- qvid 
     * @return	The list of assignments for specified qvid
     */
    public function getqvassignments($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }

        // Get the parameters
        $qvid = FormUtil::getPassedValue('qvid', isset($args['qvid']) ? $args['qvid'] : null, 'POST');

        // Needed argument
        if (!isset($qvid) || !is_numeric($qvid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWqv_assignments_column'];
        $where = " $c[qvid]=$qvid ";
        $assignments = DBUtil::selectObjectArray('IWqv_assignments', $where);
        return $assignments;
    }

    /**
     * Gets all the sections of an user assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	
     * 			- qvaid user assignment identifier
     * @return	And array with the sections information
     */
    public function getsections($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Get the parameters
        $qvaid = FormUtil::getPassedValue('qvaid', isset($args['qvaid']) ? $args['qvaid'] : null, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWqv_sections_column'];
        $where = " $c[qvaid]=$qvaid ";
        $sections = DBUtil::selectObjectArray('IWqv_sections', $where);
        return $sections;
    }

    /**
     * Gets specified section
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	
     * 			- qvsid section identifier
     * @return	And array with the section information
     */
    public function getsection($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $item = DBUtil::selectObjectByID('IWqv_sections', $args['qvsid'], 'qvsid');
        return $item;
    }

    /**
     * Gets specified message
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	
     * 			- qvmid message identifier
     * @return	And array with the message information
     */
    public function getmessage($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $item = DBUtil::selectObjectByID('IWqv_messages', $args['qvmid'], 'qvmid');
        return $item;
    }

    /**
     * Gets all the messages of specified section
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	
     * 			- qvsid section identifier
     * @return	And array with the messages information
     */
    public function getsectionmessages($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Get the parameters
        $qvsid = FormUtil::getPassedValue('qvsid', isset($args['qvsid']) ? $args['qvsid'] : null, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWqv_messages_column'];
        $where = " $c[qvsid]=$args[qvsid] ";
        $messages = DBUtil::selectObjectArray('IWqv_messages', $where, $c[cr_date]);
        return $messages;
    }

    /**
     * Process specified bean and returns the result of this procesament
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean information
     * @return	XML with the result to the callback
     */
    public function processbean($args) {
        // Get the parameters
        extract($args);

        $beanid = $bean->getAttribute("id");
        switch ($beanid) {
            // Section beans
            case "correct_section":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $responses = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean,
                            'paramname' => 'responses'));
                $scores = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean,
                            'paramname' => 'scores'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beancorrectsection', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid,
                            'responses' => $responses,
                            'scores' => $scores));
                break;
            case "deliver_section":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $sectionorder = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionorder'));
                $itemorder = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'itemorder'));
                $sectiontime = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'time'));
                $responses = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean,
                            'paramname' => 'responses'));
                $scores = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean, 'paramname' => 'scores'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beandeliversection', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid,
                            'sectionorder' => $sectionorder,
                            'itemorder' => $itemorder,
                            'sectiontime' => $sectiontime,
                            'responses' => $responses,
                            'scores' => $scores));
                break;
            case "get_section":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beangetsection', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid));
                break;
            case "get_sections":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beangetsections', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid));
                break;
            case "save_section":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $sectionorder = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionorder'));
                $itemorder = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'itemorder'));
                $sectiontime = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'time'));
                $responses = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean,
                            'paramname' => 'responses'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beansavesection', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid,
                            'sectionorder' => $sectionorder,
                            'itemorder' => $itemorder,
                            'sectiontime' => $sectiontime,
                            'responses' => $responses));
                break;
            case "save_section_teacher":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $responses = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean,
                            'paramname' => 'responses'));
                $scores = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean,
                            'paramname' => 'scores'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beansavesectionteacher', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid,
                            'responses' => $responses,
                            'scores' => $scores));
                break;
            case "save_time":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $sectiontime = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'time'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beansavetime', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid,
                            'sectionorder' => $sectionorder,
                            'itemorder' => $itemorder,
                            'sectiontime' => $sectiontime,
                            'responses' => $responses));
                break;

            // Message beans
            case "add_message":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $itemid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'itemid'));
                $userid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'userid'));
                $message = ModUtil::apiFunc('IWqv', 'user', 'beangetcontent', array('bean' => $bean,
                            'paramname' => 'message'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beanaddmessage', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid,
                            'itemid' => $itemid,
                            'userid' => $userid,
                            'message' => $message));
                break;
            case "get_messages":
                $assignmentid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'assignmentid'));
                $sectionid = ModUtil::apiFunc('IWqv', 'user', 'beangetparam', array('bean' => $bean,
                            'paramname' => 'sectionid'));
                $result = ModUtil::apiFunc('IWqv', 'user', 'beangetmessages', array('beanid' => $beanid,
                            'assignmentid' => $assignmentid,
                            'sectionid' => $sectionid));
                break;

            // Error 
            default:
                $result = '<bean id="' . $beanid . '">';
                $result.=' <param name="error" value="error_bean_not_defined"/>';
                $result.='</bean>';
                break;
        }
        return $result;
    }

    /**
     * Get the information of all the sections of the specified assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beangetsections($args) {
        // Get the parameters
        extract($args);

        $response = '';
        $time = '00:00:00';
        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            if ($qv = DBUtil::selectObjectByID('IWqv', $assignment[qvid], 'qvid')) {
                $pntable = DBUtil::getTables();
                $c = $pntable['IWqv_sections_column'];
                $where = " $c[qvaid]=$assignmentid ";
                if ($sections = DBUtil::selectObjectArray('IWqv_sections', $where, $orderby)) {
                    $maxdeliver = $qv[maxdeliver];
                    $showcorrection = $qv[showcorrection];
                    $totaltime = "00:00:00";
                    foreach ($sections as $section) {
                        $totaltime = ModUtil::apiFunc('IWqv', 'user', 'addtime', array('time1' => $totaltime,
                                    'time2' => $section[time]));
                        $response.="<section ";
                        $response.=" id=\"$section[sectionid]\" ";
                        $response.=" showcorrection=\"$showcorrection\"";
                        $response.=" maxdeliver=\"$maxdeliver\"";
                        $response.=" attempts=\"$section[attempts]\"";
                        $response.=" scores=\"$section[scores]\"";
                        $response.=" pending_scores=\"$section[pendingscores]\""; //A
                        $response.=" state=\"$section[state]\"";
                        $response.=" time=\"$section[time]\"";
                        $response.="/>";
                    }
                }
            }
        }

        $responseBean .= '<bean id="' . $beanid . '" assignmentid="' . $assignmentid . '" time="' . $totaltime . '" ' . (isset($error) ? 'error="' . $error . '"' : "") . ' >';
        $response = $responseBean . $response . '</bean>';
        return $response;
    }

    /**
     * Get the information of the specified section for the specified assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beangetsection($args) {
        // Get the parameters
        extract($args);

        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_sections_column'];
            $where = " $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
            if ($section = DBUtil::selectObject('IWqv_sections', $where)) {
                $responses = $section['responses'];
                $scores = $section['scores'];
                $pending_scores = $section['pendingscores'];
                $attempts = $section['attempts'];
                $state = $section['state'];
                $time = $section['time'];
            } else {
                $responses = '';
                $scores = '';
                $pending_scores = '';
                $attempts = 0;
                $state = -1;
                $time = "00:00:00";
            }
            if ($qv = DBUtil::selectObjectByID('IWqv', $assignment['qvid'], 'qvid')) {
                $qvid = $qv[qvid];
                $maxdeliver = $qv['maxdeliver'];
                $showcorrection = $qv['showcorrection'];
            }
        }

        $response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
        $response.=" <section ";
        $response.="  id=\"$sectionid\" ";
        if (isset($error))
            $response.=" error=\"$error\" ";
        $response.="  showcorrection=\"$showcorrection\"";
        $response.="  maxdeliver=\"$maxdeliver\"";
        $response.="  attempts=\"$attempts\"";
        $response.="  state=\"$state\"";
        $response.="  time=\"$time\"";
        $response.=" >";
        $response.="  <responses><![CDATA[$responses]]></responses>";
        $response.="  <scores><![CDATA[$scores]]></scores>";
        $response.="  <pending_scores><![CDATA[$pending_scores]]></pending_scores>"; //A
        $response.=" </section>";
        $response.='</bean>';
        return $response;
    }

    /**
     * Save the information of the specified section for the specified assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beansavesection($args) {
        // Get the parameters
        extract($args);

        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            $modifiedAssign = false;
            if ($sectionorder >= 0) { //Establishing sectionorder
                if ($sectionorder != 0 && $assignment['sectionorder'] == 0) { //it wasn't established before
                    $assignment[sectionorder] = $sectionorder;
                    $modifiedAssign = true;
                }
            }
            if ($itemorder >= 0) { //Establishing itemorder
                if ($itemorder != 0 && $assignment['itemorder'] == 0) { //it wasn't established before
                    $assignment[itemorder] = $itemorder;
                    $modifiedAssign = true;
                }
            }

            if ($modifiedAssign) { //Only update the assignment if necessary
                $pntable = DBUtil::getTables();
                $c = $pntable['IWqv_assignments_column'];
                $where = "$c[qvaid]=$assignmentid ";
                if (!DBUTil::updateObject($assignment, 'IWqv_assigments', $where)) {
                    $error = "error_db_update";
                }
            }

            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_sections_column'];
            $where = " $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
            if ($section = DBUtil::selectObject('IWqv_sections', $where)) {
                $qv = DBUtil::selectObjectByID('IWqv', $assignment['qvid'], 'qvid');
                if (ModUtil::apiFunc('IWqv', 'user', 'checkmaxdelivernotexceeded', array('qv' => $qv,
                            'section' => $section))) {
                    //Update section
                    $section['responses'] = $responses;
                    $section['state'] = 0;
                    $section['pendingscores'] = $section['scores'];
                    $section['time'] = ModUtil::apiFunc('IWqv', 'user', 'addtime', array('time1' => $section[time],
                                'time2' => $sectiontime));
                    if ($isdeliver) {
                        $section['scores'] = $scores;
                        $section['attempts'] = $section['attempts'] + 1;
                        $section['state'] = 1;
                    }
                    if (!DBUTil::updateObject($section, 'IWqv_sections', $where)) {
                        $error = "error_db_update";
                    }
                } else {
                    $error = "error_maxdeliver_exceeded";
                }
            } else {
                // Insert section
                $section = array('qvaid' => $assignmentid,
                    'sectionid' => $sectionid,
                    'responses' => $responses,
                    'state' => 0,
                    'time' => $sectiontime);
                if ($isdeliver) {
                    $section['scores'] = $scores;
                    $section['pendingscores'] = $scores;
                    $section['attempts'] = 1;
                    $section['state'] = 1;
                }
                if (!DBUtil::insertObject($section, 'IWqv_sections', 'qvsid')) {
                    $error = "error_db_insert";
                }
            }
        }

        $response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
        $response.=" <section id=\"$sectionid\" ";
        if (isset($error))
            $response .= " error=\"$error\" ";
        if ($isdeliver) {
            $response .= " attempts=\"$section[attempts]\" ";
            $response .= " maxdeliver=\"$qv[maxdeliver]\" ";
            $response .= " showcorrection=\"$qv[showcorrection]\" ";
            $response .= " time=\"$section[time]\" ";
        }
        $response.=" state=\"$section[state]\" />";
        $response.='</bean>';
        return $response;
    }

    /**
     * Save the information of the specified section for the specified assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beansavesectionteacher($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }
        extract($args);

        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_sections_column'];
            $where = " $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
            $section = DBUtil::selectObject('IWqv_sections', $where);
            if ($section) {
                //Update section
                if ($responses != '')
                    $section['responses'] = $responses;
                if ($scores != '')
                    $section['pendingscores'] = $scores;
                if ($iscorrect) {
                    $section['state'] = 2;
                    if ($scores != '')
                        $section['scores'] = $scores;
                }
                if (!DBUTil::updateObject($section, 'IWqv_sections', $where)) {
                    $error = "error_db_update";
                }
            } else {
                // Insert section
                $section = array('qvaid' => $assignmentid,
                    'sectionid' => $sectionid,
                    'responses' => $responses,
                    'pendingscores' => $scores);
                if ($iscorrect) {
                    $section[state] = 2;
                    if ($scores != '')
                        $section['scores'] = $scores;
                }
                if (!DBUtil::insertObject($section, 'IWqv_sections', 'qvsid')) {
                    $error = "error_db_insert";
                }
            }
        }

        $response .= "<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
        $response .= " <section id=\"$sectionid\" ";
        if (isset($error))
            $response .= " error=\"$error\" ";
        $response .= " state=\"$section[state]\" />";
        $response .= '</bean>';
        return $response;
    }

    /**
     * Save the information of the specified section for the specified assignment
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beandeliversection($args) {
        extract($args);
        $result = ModUtil::apiFunc('IWqv', 'user', 'beansavesection', array('beanid' => $beanid,
                    'assignmentid' => $assignmentid,
                    'sectionid' => $sectionid,
                    'sectionorder' => $sectionorder,
                    'itemorder' => $itemorder,
                    'sectiontime' => $sectiontime,
                    'responses' => $responses,
                    'scores' => $scores,
                    'isdeliver' => true));
        return $result;
    }

    /**
     * Correct specfied section
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beancorrectsection($args) {
        extract($args);
        $result = ModUtil::apiFunc('IWqv', 'user', 'beansavesectionteacher', array('beanid' => $beanid,
                    'assignmentid' => $assignmentid,
                    'sectionid' => $sectionid,
                    'sectionorder' => $sectionorder,
                    'itemorder' => $itemorder,
                    'sectiontime' => $sectiontime,
                    'responses' => $responses,
                    'scores' => $scores,
                    'iscorrect' => true));
        return $result;

        extract($args);
        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_sections_column'];
            $where = " $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
            $section = DBUtil::selectObject('IWqv_sections', $where);
            if ($section) {
                //Update section
                $section['state'] = 2;
                if ($responses != '')
                    $section['responses'] = $responses;
                if ($scores != '') {
                    $section['pendingscores'] = $scores;
                    $section['scores'] = $scores;
                }
                $pntable = DBUtil::getTables();
                $c = $pntable['IWqv_sections_column'];
                $where = "$c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
                if (!DBUTil::updateObject($section, 'IWqv_sections', $where)) {
                    $error = "error_db_update";
                }
            } else {
                // Insert section
                $section = array('qvaid' => $assignmentid,
                    'sectionid' => $sectionid,
                    'responses' => $responses,
                    'scores' => $scores,
                    'pendingscores' => $scores,
                    'state' => 2,
                    'attempts' => 0);
                if (!DBUtil::insertObject($section, 'IWqv_sections', 'qvsid')) {
                    $error = "error_db_insert";
                }
            }
        }

        $response .= "<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
        $response .= " <section id=\"$sectionid\" ";
        if (isset($error))
            $response .= " error=\"$error\" ";
        $response .= " state=\"$section[state]\" />";
        $response .= '</bean>';
        return $response;
    }

    /**
     * Update the time spended in the specified section 
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beansavetime($args) {
        // Get the parameters
        extract($args);

        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_sections_column'];
            $where = " $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
            $section = DBUtil::selectObject('IWqv_sections', $where);
            if ($section) {
                //Update section
                $section['time'] = ModUtil::apiFunc('IWqv', 'user', 'addtime', array('time1' => $section[time],
                            'time2' => $sectiontime));
                if (!DBUTil::updateObject($section, 'IWqv_sections', $where)) {
                    $error = "error_db_update";
                }
            } else {
                // Insert section
                $section = array('qvaid' => $assignmentid,
                    'sectionid' => $sectionid,
                    'time' => $sectiontime);
                if (!DBUtil::insertObject($section, 'IWqv_sections', 'qvsid')) {
                    $error = "error_db_insert";
                }
            }
        }

        $response .= "<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
        $response .= " <section id=\"$sectionid\" ";
        if (isset($error))
            $response .= " error=\"$error\" ";
        $response .= " time=\"$section[time]\" />";
        $response .= '</bean>';
        return $response;
    }

    /**
     * Get all the messages for specified section
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beangetmessages($args) {
        extract($args);
        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_sections_column'];
            $where = " $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
            $section = DBUtil::selectObject('IWqv_sections', $where);
            if ($section) {
                $uid = UserUtil::getVar('uid');

                $pntable = DBUtil::getTables();
                $c = $pntable['IWqv_messages_column'];
                $where = " $c[qvsid]=$section[qvsid] ";
                $messages = DBUtil::selectObjectArray('IWqv_messages', $where, $c['cr_date']);
                if ($messages) {
                    foreach ($messages as $message) {
                        // Mark the message as read for the current user
                        $pntable = DBUtil::getTables();
                        $c = $pntable['IWqv_messages_read_column'];
                        $where = " $c[qvmid]=$message[qvmid] AND $c[userid]=$uid ";
                        if (!$message_read = DBUtil::selectObject('IWqv_messages_read', $where)) {
                            $message_read = array('qvmid' => $message['qvmid'],
                                'userid' => $uid);
                            if (!($qvmrid = DBUtil::insertObject($message_read, 'IWqv_messages_read', 'qvmrid'))) {
                                $error = "error_db_insert";
                            }
                        }

                        // Create XML response
                        $response .= "\n<message id=\"$message[qvmid]\" ";
                        $response .= " itemid=\"$message[itemid]\" ";
                        $response .= " userid=\"$message[userid]\" ";
                        $user = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => ModUtil::func('IWmain', 'user', 'genSecurityValue'),
                                    'uid' => $message[userid],
                                    'info' => 'ncc'));
                        if ($user) {
                            $response .= " username=\"$user\" ";
                        }
                        $response .= ">\n";
                        $response .= "<![CDATA[" . $message[message] . "]]>\n";
                        $response .= "</message>\n";
                    }
                }
            }
        }
        $responseBean .= "<bean id=\"$beanid\" assignmentid=\"$assignmentid\" sectionid=\"$sectionid\" userid=\"$userid\" ";
        if (isset($error))
            $responseBean.=" error=\"$error\" ";
        $responseBean.=" >";
        $response = $responseBean . $response . '</bean>';
        return $response;
    }

    /**
     * Add a message to the specified section item
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	XML with the result of the callback
     */
    public function beanaddmessage($args) {
        extract($args);
        if (!($assignment = DBUtil::selectObjectByID('IWqv_assignments', $assignmentid, 'qvaid'))) {
            $error = "error_assignmentid_does_not_exist";
        } else {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWqv_sections_column'];
            $where = " $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
            if (!$section = DBUtil::selectObject('IWqv_sections', $where)) {
                // Insert section
                $section = array('qvaid' => $assignmentid,
                    'sectionid' => $sectionid);
                if (!($section = DBUtil::insertObject($section, 'IWqv_sections', 'qvsid'))) {
                    $error = "error_db_insert";
                }
            }

            if (!isset($error)) {
                // Insert message
                $message = array('qvsid' => $section[qvsid],
                    'itemid' => $itemid,
                    'userid' => $userid,
                    'message' => $message);
                if (!($qvmid = DBUtil::insertObject($message, 'IWqv_messages', 'qvmid'))) {
                    $error = "error_db_insert";
                }
            }
        }

        $response .= "<bean id=\"$beanid\" assignmentid=\"$assignmentid\" sectionid=\"$sectionid\" itemid=\"$itemid\" userid=\"$userid\" >";
        $response .= " <message id=\"$qvmid\" ";
        if (isset($error))
            $response .= " error=\"$error\" ";
        $response .= '/>';
        $response .= '</bean>';
        return $response;
    }

    /**
     * Check if the number of delivers is exceeded
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	True if number of delivers isn't exceeded; false otherwise
     */
    public function checkmaxdelivernotexceeded($args) {
        extract($args);
        //Check max deliver < current attempts
        return ($qv['maxdeliver'] < 0 || $section['attempts'] < $qv['maxdeliver']);
    }

    /**
     * Get the the value of the specified param
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	Value of the specified param
     */
    public function beangetparam($args) {
        extract($args);

        if (!isset($elementname))
            $elementname = "param";
        $params = $bean->getElementsByTagName($elementname);
        foreach ($params as $param) {
            if ($paramname == $param->getAttribute("name")) {
                $paramvalue = $param->getAttribute("value");
                if ($paramvalue == '') {
                    $paramvalue = $param->nodeValue;
                }
                break;
            }
        }
        return $paramvalue;
    }

    /**
     * Get the the value of the specified param
     * @author Sara Arjona Téllez (sarjona@xtec.cat)
     * @param	args	array with the bean parameters
     * @return	Value of the specified param
     */
    public function beangetcontent($args) {
        extract($args);
        return $bean->getElementsByTagName($paramname)->item(0)->nodeValue;
    }

    /**
     * Sum $time2 to $time1
     * @author Albert Llastarri (albert.llastarri@gmail.com)
     * @param	args	
     * 				- time1
     * 				- time2
     * @return	The sum of both times
     */
    public function addtime($args) {
        extract($args);

        $h1 = (int) substr($time1, 0, 2);
        $m1 = (int) substr($time1, 3, 5);
        $s1 = (int) substr($time1, 6, 8);
        $h2 = (int) substr($time2, 0, 2);
        $m2 = (int) substr($time2, 3, 5);
        $s2 = (int) substr($time2, 6, 8);

        $s3 = $s1 + $s2;
        $m3 = $m1 + $m2;
        $h3 = $h1 + $h2;

        if ($s3 > 59) {
            $s3 = $s3 - 60;
            $m3 = $m3 + 1;
        }
        if ($m3 > 59) {
            $m3 = $m3 - 60;
            $h3 = $h3 + 1;
        }

        $s4 = "";
        if ($s3 < 10) {
            $s4 = "0" . $s3;
        } else {
            $s4 = $s3 . "";
        }
        $m4 = "";
        if ($m3 < 10) {
            $m4 = "0" . $m3;
        } else {
            $m4 = $m3 . "";
        }
        $h4 = "";
        if ($h3 < 10) {
            $h4 = "0" . $h3;
        } else {
            $h4 = $h3 . "";
        }

        return $h4 . ":" . $m4 . ":" . $s4;
    }

    public function getlinks() {
        $links = array();

        if (SecurityUtil::checkPermission('IWqv::', "::", ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('IWqv', 'user', 'main'), 'text' => $this->__('Home page'), 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('IWqv', 'user', 'show_assignments_to_answer'), 'text' => $this->__('View assignments'), 'class' => 'z-icon-es-view');
        }

        if (SecurityUtil::checkPermission('IWqv::', "::", ACCESS_ADD)) {
            $links[] = array('url' => ModUtil::url('IWqv', 'user', 'show_assignments_to_correct'), 'text' => $this->__('Correct assignments'), 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWqv', 'user', 'assignment_form'), 'text' => $this->__('Assign assessment'), 'class' => 'z-icon-es-new');
        }

        return $links;
    }

}