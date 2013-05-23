<?php

class IWjclic_Api_User extends Zikula_AbstractApi {

    /**
     * Get the properties of the activities that the user has assigned to other users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	An array with the activity proporties
     */
    public function getAllActivitiesAssigned() {
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_column'];

        $orderby = "$c[name]";
        $where = "$c[user]=" . UserUtil::getVar('uid');

        $items = DBUtil::selectObjectArray('IWjclic', $where, $orderby, '-1', '-1', 'jid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Get the properties of the activities that a user have got assigned
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	An array with the activity proporties
     */
    public function getAllActivities($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $uid = UserUtil::getVar('uid');

        //get all the groups of the user
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('uid' => $uid,
                    'sv' => $sv));

        $myJoin = array();

        $myJoin[] = array('join_table' => 'IWjclic',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'jid',
            'compare_field_join' => 'jid');
        $myJoin[] = array('join_table' => 'IWjclic_groups',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'jid',
            'compare_field_join' => 'jid');

        $pntables = DBUtil::getTables();

        $ocolumn = $pntables['IWjclic_column'];
        $lcolumn = $pntables['IWjclic_groups_column'];

        $where = "(";
        $orderby = "a.$ocolumn[date]";

        foreach ($userGroups as $group) {
            $where .= "b.$lcolumn[group_id]=" . $group['id'] . ' OR ';
        }

        $where = substr($where, 0, -3);

        $where .= ") AND a.$ocolumn[active] = 1";

        $items = DBUtil::selectExpandedObjectArray('IWjclic', $myJoin, $where, $orderby, '-1', '-1', 'jid');

        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // get the user activities that the user has made independently of the groups.
        // In case the activity groups changes but the user have made an activity he/she can accÃ©s to the activity information
        // marge the items in the two requests
        // Return the items
        return $items;
    }

    /**
     * Get the properties of an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the activity
     * @return:	An array with the activity proporties
     */
    public function get($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = DBUtil::selectObjectByID('IWjclic', $jid, 'jid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Create a group assignament for a jclic activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the group
     * @return:	add the group into the assignament tables
     */
    public function create($args) {
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
        $groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        $items['user'] = UserUtil::getVar('uid');
        $items['date'] = time();
        $items['extended'] = '$';

        if (!DBUtil::insertObject($items, 'IWjclic', 'jid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        if ($groups != '') {
            $groups = explode('$', $groups);
            //add new groups
            foreach ($groups as $group) {
                //check if group is in $groupsAssigned array
                if ($group != '' && !array_key_exists($group, $groupsAssigned)) {
                    $items = array('jid' => $items['jid'],
                        'group_id' => $group);

                    if (!DBUtil::insertObject($items, 'IWjclic_groups', 'jgid')) {
                        return LogUtil::registerError($this->__('There was an error creating the assignment'));
                    }
                }
            }
        }

        // Return the id of the newly created item to the calling process
        return $items['jid'];
    }

    /**
     * Assign an activity to the specified groups if them haven't got it assigned yet
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   string with the groups and Id of the assigment
     * @return:	Create or delete the assignments to groups
     */
    public function editGroups($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        //get the groups that have this activity assigned
        $groupsAssigned = ModUtil::apiFunc('IWjclic', 'user', 'getGroups', array('jid' => $jid));

        $groups = explode('$', $groups);

        if (empty($groupsAssigned) && empty($groups)) {
            return true;
        }

        //add new groups
        foreach ($groups as $group) {
            //check if group is in $groupsAssigned array
            if ($group != '' && !array_key_exists($group, $groupsAssigned)) {
                if (!ModUtil::apiFunc('IWjclic', 'user', 'addAssingGroup', array('jid' => $jid,
                            'group' => $group))) {
                    return LogUtil::registerError($this->__('There was an error creating the assignment'));
                }
            }
        }

        //delete not assigned groups
        foreach ($groupsAssigned as $group) {
            //check if group is in $groupsAssigned array
            if (!in_array($group['group_id'], $groups)) {
                if (!ModUtil::apiFunc('IWjclic', 'user', 'deleteAssingGroup', array('jid' => $jid,
                            'group' => $group['group_id']))) {
                    return LogUtil::registerError($this->__('There was an error creating the assignment'));
                }
            }
        }

        return true;
    }

    /**
     * Get the groups that have got this activity assigned
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the assigment
     * @return:	An array with the groups identities
     */
    public function getGroups($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_groups_column'];

        $orderby = "";
        $where = "$c[jid]=$jid";

        $items = DBUtil::selectObjectArray('IWjclic_groups', $where, $orderby, '-1', '-1', 'group_id');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Add a group into the assignation
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   The activity identity and the group identity
     * @return:	True if success and false otherwise
     */
    public function addAssingGroup($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        $items = array('jid' => $jid,
            'group_id' => $group);

        if (!DBUtil::insertObject($items, 'IWjclic_groups', 'jgid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $items['group_id'];
    }

    /**
     * Delete a group assignation
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   The activity identity and the group identity
     * @return:	True if success and false otherwise
     */
    public function deleteAssingGroup($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_groups_column'];
        $where = "$c[jid]=$jid AND $c[group_id] = $group";

        if (!DBUTil::deleteObject($item, 'IWjclic_groups', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

    /**
     * Assign an activity to the specified groups if them haven't got it assigned yet
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   string with the groups and Id of the assigment
     * @return:	Create or delete the assignments to groups
     */
    public function update($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
        if ($jclic['user'] != UserUtil::getVar('uid') && count($items) > 1) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_column'];

        $where = "$c[jid] = $jid";

        if (!DBUTil::updateObject($items, 'IWjclic', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * Create a new session for an user
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the group
     * @return:	add the group into the assignament tables
     */
    public function createSession($args) {
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }


        if (!DBUtil::insertObject($items, 'IWjclic_sessions', 'jsid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $items['jsid'];
    }

    /**
     * Create a user for the session
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the group
     * @return:	add the group into the assignament tables
     */
    public function addActivity($args) {
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!DBUtil::insertObject($items, 'IWjclic_activities', 'jaid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $items['jaid'];
    }

    /**
     * Get jclic settings
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	the jclic setting needed to report activities
     */
    public function getSettings() {
        $items = DBUtil::selectObjectArray('IWjclic_settings', '', '', '-1', '-1', 'jsid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Get user sessions for an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		activity identity
     * @return:	an array with the sessions information
     */
    public function getSessions($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');

        if (!is_numeric($uid)) {
            $uid = UserUtil::getVar('uid');
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

//CONTINUAR AQUÍ PER FER-HO MÉS SEGUR
        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_sessions_column'];

        $orderby = "";
        $where = "$c[jclicid] = $jid AND $c[user_id]=$uid";

        $items = DBUtil::selectObjectArray('IWjclic_sessions', $where, $orderby, '-1', '-1', 'jsid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Get user activities for a session
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		session identity
     * @return:	an array with the activities information
     */
    public function getActivities($args) {
        $session_id = FormUtil::getPassedValue('session_id', isset($args['session_id']) ? $args['session_id'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($session_id == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_activities_column'];

        $orderby = "";
        $where = "$c[session_id] = '$session_id'";

        $items = DBUtil::selectObjectArray('IWjclic_activities', $where, $orderby, '-1', '-1', 'jaid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Create a user for the session
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the group
     * @return:	add the group into the assignament tables
     */
    public function createUser($args) {
        $key = FormUtil::getPassedValue('key', isset($args['key']) ? $args['key'] : null, 'POST');
        $user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $items = array('user_id' => $user_id,
            'jid' => $key);

        if (!DBUtil::insertObject($items, 'IWjclic_users', 'juid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $items['juid'];
    }

    /**
     * Check if a user has begin an activity because he/she is created in users table
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the user an id of the activity
     * @return:	true if user exists and false otherwise
     */
    public function getUserSession($args) {
        $key = FormUtil::getPassedValue('key', isset($args['key']) ? $args['key'] : null, 'POST');
        $user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($key == null || !is_numeric($key) || $user_id == null || !is_numeric($user_id)) {
            //return LogUtil::registerError ($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_users_column'];

        $orderby = "";
        $where = "$c[jid] = $key AND $c[user_id] = $user_id";

        $items = DBUtil::selectObjectArray('IWjclic_users', $where, $orderby, '-1', '-1', 'user_id');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        return $items;
    }

    /**
     * Check if a user has begin an activity because he/she is created in users table
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the user an id of the activity
     * @return:	true if user exists and false otherwise
     */
    public function submitValue($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'POST');
        $toDo = FormUtil::getPassedValue('toDo', isset($args['toDo']) ? $args['toDo'] : null, 'POST');
        $content = FormUtil::getPassedValue('content', isset($args['content']) ? $args['content'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid) || $user_id == null || !is_numeric($user_id)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.') . ' - ' . $jid . ' - ' . $user_id);
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_users_column'];

        $where = "$c[jid] = $jid AND $c[user_id] = $user_id";



        $items = array($toDo => $content);

        if (!DBUTil::updateObject($items, 'IWjclic_users', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * Delete all the users that have done the activities
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the assignament
     * @return:	true if user exists and false otherwise
     */
    public function delUsers($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        $pntable = DBUtil::getTables();

        $pntables = DBUtil::getTables();
        $c = $pntables['IWjclic_users_column'];

        $where = "$c[jid]=$jid";

        if (!DBUtil::deleteWhere('IWjclic_users', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

    /**
     * Delete all the sessions about the assignament
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the assignament
     * @return:	true if user exists and false otherwise
     */
    public function delSessions($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        //Delete all the activities for the session
        $sessions = ModUtil::apiFunc('IWjclic', 'user', 'getAllSessions', array('jid' => $jid));

        $pntables = DBUtil::getTables();
        $c = $pntables['IWjclic_activities_column'];

        foreach ($sessions as $session) {
            $where = "$c[session_id]='" . $session['session_id'] . "'";
            if (!DBUtil::deleteWhere('IWjclic_activities', $where)) {
                return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
            }
        }

        $c = $pntables['IWjclic_sessions_column'];

        $where = "$c[jclicid]=$jid";
        if (!DBUtil::deleteWhere('IWjclic_sessions', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

    /**
     * Delete the assignament
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the assignament
     * @return:	true if user exists and false otherwise
     */
    public function delAssignament($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        if (!DBUtil::deleteObjectByID('IWjclic', $jid, 'jid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

    /**
     * Get all sessions for an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		activity identity
     * @return:	an array with the sessions information
     */
    public function getAllSessions($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed argument
        if ($jid == null || !is_numeric($jid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            return LogUtil::registerError($this->__('Could not find the allocation requested'));
        }

        //Check if user can edit the activity because he/she is the owner or only change the expanded/collapsed status
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to edit the activity'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWjclic_sessions_column'];

        $orderby = "";
        $where = "$c[jclicid] = $jid";

        $items = DBUtil::selectObjectArray('IWjclic_sessions', $where, $orderby, '-1', '-1', 'jsid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function getlinks() {
        $links = array();

        if (SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADD)) {
            $links[] = array('url' => ModUtil::url('IWjclic', 'user', 'main'), 'text' => $this->__('Activities I have assigned'), 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('IWjclic', 'user', 'assigned'), 'text' => $this->__('Activities assigned'), 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('IWjclic', 'user', 'assig'), 'text' => $this->__('Assign activities'), 'class' => 'z-icon-es-new');
        }


        return $links;
    }

}