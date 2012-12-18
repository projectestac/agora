<?php

class IWmain_Api_User extends Zikula_AbstractApi {

    /**
     * Get all the users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the users
     */
    public function getAllUsers($args) {
        $fromArray = FormUtil::getPassedValue('fromArray', isset($args['fromArray']) ? $args['fromArray'] : null, 'POST');
        $list = FormUtil::getPassedValue('list', isset($args['list']) ? $args['list'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $table = DBUtil::getTables();
        $where = "";
        $c = $table['users_column'];
        if ($fromArray != null && count($fromArray) > 0) {
            foreach ($fromArray as $f) {
                $where .= " $c[uid] = $f[uid] OR";
            }
            $where = substr($where, 0, -3);
        }
        if ($list != null && strlen($list) > 0) {
            $modArray = explode('$$', $list);
            $modArray = array_unique($modArray);
            foreach ($modArray as $mod) {
                $mod = str_replace('$', '', $mod);
                if ($mod != '' && is_numeric($mod)) {
                    $where .= " $c[uid] = " . $mod . " OR";
                }
            }
            $where = substr($where, 0, -3);
        }
        // get the objects from the db
        $items = DBUtil::selectObjectArray('users', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false)
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        // Return the items
        return $items;
    }

    /**
     * Get information from IWusers of all users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the users
     */
    public function getUsersExtraInfo($args) {
        $fromArray = FormUtil::getPassedValue('fromArray', isset($args['fromArray']) ? $args['fromArray'] : null, 'POST');
        $list = FormUtil::getPassedValue('list', isset($args['list']) ? $args['list'] : null, 'POST');
        $items = array();
        $table = DBUtil::getTables();
        $where = "";
        $c = $table['IWusers_column'];
        //die('tt');
        if ($fromArray != null && count($fromArray) > 0) {
            foreach ($fromArray as $f) {
                $where .= " $c[uid] = $f[uid] OR";
            }
            $where = substr($where, 0, -3);
        }
        if ($list != null && strlen($list) > 0) {
            $modArray = explode('$$', $list);
            $modArray = array_unique($modArray);
            foreach ($modArray as $mod) {
                $mod = str_replace('$', '', $mod);
                if ($mod != '' && is_numeric($mod))
                    $where .= " $c[uid] = " . $mod . " OR";
            }
            $where = substr($where, 0, -3);
        }
        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWusers', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get an user
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the user
     * @return:	And array with the user information
     */
    public function getUser($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $items = array();
        $table = DBUtil::getTables();
        $c = $table['users_column'];
        $where = "$c[uid]=$uid";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('users', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false)
            return LogUtil::registerError($this->__('Error! Could not load items.'));

        // Return the items
        return $items;
    }

    /**
     * Get information from IWusers of an users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the user
     * @return:	And array with the user information
     */
    public function getUserExtraInfo($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $items = array();
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $table = DBUtil::getTables();
        $c = $table['IWusers_column'];
        $where = "$c[uid]=$uid";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWusers', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get all the groups
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the users
     */
    public function getAllGroups($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $table = DBUtil::getTables();
        $c = $table['groups_column'];
        $orderby = "$c[name]";
        $items = array();
        // get the objects from the db
        $items = DBUtil::selectObjectArray('groups', '', $orderby);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        //print_r($items);
        // Return the items
        return $items;
    }

    /**
     * Get the members of a group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the users
     */
    public function getMembersGroup($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $myJoin = array();
        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uid'),
            'object_field_name' => array('uid'),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $myJoin[] = array('join_table' => 'group_membership',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $tables = DBUtil::getTables();
        $ccolumn = $tables['users_column'];
        $ocolumn = $tables['group_membership_column'];
        $where = "b.$ocolumn[gid] = " . $gid;
        $orderBy = "ORDER BY tbl.$ccolumn[uname]";
        $items = DBUtil::selectExpandedObjectArray('users', $myJoin, $where, $orderBy);
        return $items;
    }

    /**
     * Get all the groups
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the users
     */
    public function getAllGroupsInfo($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $items = array();
        // get the objects from the db
        $items = DBUtil::selectObjectArray('groups');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false)
            return LogUtil::registerError($this->__('Error! Could not load items.'));

        // Return the items
        return $items;
    }

    /**
     * Check if a user is member of a group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	True if the user is member and false otherwise
     */
    public function isMember($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        if ($uid == null || !is_numeric($uid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Check if the user is member of the group
        if ($gid != 0) {
            $items = array();
            $table = DBUtil::getTables();
            $c = $table['group_membership_column'];
            $where = "$c[uid]=" . $uid . " AND $c[gid]=" . $gid;
            // get the objects from the db
            $items = DBUtil::selectObjectArray('group_membership', $where);
            // Check for an error with the database code, and if so set an appropriate
            // error message and return
            if ($items === false)
                return LogUtil::registerError($this->__('Error! Could not load items.'));
            $isMember = (count($items) > 0) ? true : false;
        }else {
            $isMember = true;
        }
        return $isMember;
    }

    /**
     * Get all the groups of a user
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the users
     */
    public function getAllUserGroups($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // argument needed
        if ($uid == null || !is_numeric($uid))
            return false;
        $items = array();
        $table = DBUtil::getTables();
        $c = $table['group_membership_column'];
        $where = "$c[uid]=" . $uid;
        // get the objects from the db
        $items = DBUtil::selectObjectArray('group_membership', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false)
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        // Return the items
        return $items;
    }

    public function getAllIcons() {
        $handle = opendir('modules/IWmain/images/smilies');
        while ($file = readdir($handle)) {
            $filelist[] = $file;
        }

        asort($filelist);

        $icons = array();
        while (list ($key, $file) = each($filelist)) {
            if ($file != '.' && $file != '..' && $file != 'index.html' && $file != '.svn' && $file != 'CVS') {
                $icons[] = array('imgsrc' => $file);
            }
        }
        return $icons;
    }

    //***************************************************************************************
    //
    // API function used to work with the database
    //
    // All this functions are call from the users managment funcions
    //
    //***************************************************************************************

    /**
     * Get an user variable associate with a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable
      - uid: user id
      - sv: security value
     * @return:	The value of the variable if it is find
     */
    public function userGetVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($uid == null || $module == null || $name == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $table = DBUtil::getTables();
        $c = $table['IWmain_column'];
        $where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWmain', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false)
            return LogUtil::registerError($this->__('Error! Could not load items.'));

        // Return the items
        return $items;
    }

    /**
     * Check if an user variable exists
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable
      - uid: user id
      - sv: security value
     * @return:	Thue if exists and false if not
     */
    public function userVarExists($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($uid == null || $module == null || $name == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $table = DBUtil::getTables();
        $c = $table['IWmain_column'];
        $where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWmain', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false)
            return LogUtil::registerError($this->__('Error! Could not load items.'));

        // Return true if the item exists or false if not
        $exists = (count($items) > 0) ? true : false;
        return $exists;
    }

    /**
     * Create an user variable associated with a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable
      - lifetime: date of caducity of the variable
      - uid: user id
      - value: value for the variable
      - sv: security value
     * @return:	The id of the value created
     */
    public function createUserVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : '', 'POST');
        $lifetime = FormUtil::getPassedValue('lifetime', isset($args['lifetime']) ? $args['lifetime'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($uid == null || $module == null || $name == null || $lifetime == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $item = array('uid' => $uid,
            'module' => $module,
            'name' => $name,
            'value' => $value,
            'lifetime' => $lifetime);
        if (!DBUtil::insertObject($item, 'IWmain')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return true;
    }

    /**
     * Update the field lifetime in users variables
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible have to be deleted
      - name: name of the variable that have to be deleted (if name is .* all varibles of the user in the module are deleted)
      - uid: user id
      - sv: security value
     * @return:	True if success
     */
    public function userUpdateGetVarTime($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($uid == null || $module == null || $name == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $item = array('lifetime' => time() + 24 * 60 * 60 * ModUtil::getVar('IWmain', 'usersvarslife'),
            'nult' => 0);
        $table = DBUtil::getTables();
        $c = $table['IWmain_column'];
        $where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
        if (!DBUtil::updateObject($item, 'IWmain', $where, 'mid'))
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Update the field lifetime in users variables
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible have to be deleted
      - name: name of the variable that have to be deleted (if name is .* all varibles of the user in the module are deleted)
      - uid: user id
      - sv: security value
     * @return:	True if success
     */
    public function userUpdateNultVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($uid == null || $module == null || $name == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $item = array('nult' => 1);
        $table = DBUtil::getTables();
        $c = $table['IWmain_column'];
        $where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
        if (!DBUtil::updateObject($item, 'IWmain', $where, 'mid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Update an user variable associate with a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable
      - lifetime: date of caducity of the variable
      - uid: user id
      - value: value for the variable
      - sv: security value
     * @return:	Thue if success
     */
    public function updateUserVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');
        $lifetime = FormUtil::getPassedValue('lifetime', isset($args['lifetime']) ? $args['lifetime'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($uid == null || $module == null || $name == null || $lifetime == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $item = array('value' => $value,
            'lifetime' => $lifetime);
        $table = DBUtil::getTables();
        $c = $table['IWmain_column'];
        $where = "$c[uid]=" . $uid . " AND $c[module]='" . $module . "' AND $c[name]='" . $name . "'";
        if (!DBUtil::updateObject($item, 'IWmain', $where, 'mid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete the user variables that have been raised the lifetime value
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - sv: security value
     * @return:	Thue if success
     */
    public function userDeleteOldVars($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $now = time();
        $tables = DBUtil::getTables();
        $c = $tables['IWmain_column'];
        $where = "WHERE $c[lifetime] < '$now'";
        if (!DBUtil::deleteWhere('IWmain', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete all users variables of a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable to delete (the value .* means all the variables)
      - sv: security value
     * @return:	Thue if success
     */
    public function usersVarsDelModule($args) {
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($module == null || $name == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $tables = DBUtil::getTables();
        $c = $tables['IWmain_column'];
        $where = ($name == '.*') ? "WHERE $c[module] = '" . $module . "'" : "WHERE $c[module] = '" . $module . "' AND $c[name]='" . $name . "'";
        if (!DBUtil::deleteWhere('IWmain', $where))
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete the users variables of a module for an user
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - uid: user id
      - module: module where the varible is used
      - name: name of the variable to delete (the value .* means all the variables)
      - sv: security value
     * @return:	Thue if success
     */
    public function userDelVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($module == null || $uid == null || $name == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $tables = DBUtil::getTables();
        $c = $tables['IWmain_column'];
        $where = ($name == '.*') ? "WHERE $c[module] = '" . $module . "' AND $c[uid] = " . $uid : "WHERE $c[module] = '" . $module . "' AND $c[name] = '" . $name . "' AND $c[uid] = " . $uid;
        if (!DBUtil::deleteWhere('IWmain', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete all the variables for a user that are temporally. The variables that have got the parameter nult in the value 1
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - uid: user id
      - sv: security value
     * @return:	True if success and false if not
     */
    public function regenDinamicVars($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        // Argument check
        if ($uid == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $tables = DBUtil::getTables();
        $c = $tables['IWmain_column'];
        $where = "WHERE $c[nult] = 1 AND $c[uid] = " . $uid;
        if (!DBUtil::deleteWhere('IWmain', $where))
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    //***************************************************************************************
    //
    // END - API function used to work with the database
    //
    //***************************************************************************************
    //***************************************************************************************
    //
    // Logs system functions
    //
    //
    //***************************************************************************************

    /**
     * Create a log of an action
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * 
     * string  $args['actionText'] Text for the log
     * integer $args['visible']    Visibility for users // 1 - all users / 0 - only administrators (optional - default 1)
     * string  $args['moduleName'] Name of the module that has generated the log (optional)
     * integer $args['actionType'] Type of action logged // 1 - insert / 2 - update / 3 - Delete / 4 - select (optinal)
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return integer identity of the log created, or false on failure.
     * 
     * @throws Zikula_Exception_Fatal Thrown if invalid parameters are received in $args, or if the data cannot be loaded from the database.
     * 
     * @throws Zikula_Exception_Forbidden Thrown if the current user does not have overview access.
     */
    public function saveLog($args) {
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $args['sv']))) {
            throw new Zikula_Exception_Forbidden("You are not allowed to access to some information.");
        }

        if (!isset($args['actionText']) || $args['actionText'] == '') {
            throw new Zikula_Exception_Fatal(LogUtil::getErrorMsgArgs());
        }

        $visible = (!isset($args['visible'])) ? 1 : $args['visible'];
        $error = (!isset($args['error'])) ? 0 : $args['error'];

        $ip = '';
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = ModUtil::apiFunc('IWmain', 'user', 'cleanremoteaddr', array('originaladdr' => $_SERVER['REMOTE_ADDR']));
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = ModUtil::apiFunc('IWmain', 'user', 'cleanremoteaddr', array('originaladdr' => $_SERVER['HTTP_X_FORWARDED_FOR']));
        }
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = ModUtil::apiFunc('IWmain', 'user', 'cleanremoteaddr', array('originaladdr' => $_SERVER['HTTP_CLIENT_IP']));
        }

        $item = array('moduleName' => $args['moduleName'],
            'actionType' => $args['actionType'],
            'visible' => $visible,
            'actionText' => $args['actionText'],
            'logIp' => $ip,
            'indexName' => $args['indexName'],
            'indexValue' => $args['indexValue'],
            'indexName1' => $args['indexName1'],
            'indexValue1' => $args['indexValue1'],
            'error' => $error,
        );

        if (!DBUtil::insertObject($item, 'IWmain_logs', 'logId')) {
            throw new Zikula_Exception_Fatal(LogUtil::getErrorMsgArgs());
        }

        // Return the id of the newly created item to the calling process
        return $item['logId'];
    }

    public function cleanremoteaddr($args) {
        $originaladdr = $args['originaladdr'];
        $matches = array();
        // first get all things that look like IP addresses.
        if (!preg_match_all('/(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})/', $args['originaladdr'], $matches, PREG_SET_ORDER)) {
            return '';
        }
        $goodmatches = array();
        $lanmatches = array();
        foreach ($matches as $match) {
            // check to make sure it's not an internal address.
            // the following are reserved for private lans...
            // 10.0.0.0 - 10.255.255.255
            // 172.16.0.0 - 172.31.255.255
            // 192.168.0.0 - 192.168.255.255
            // 169.254.0.0 -169.254.255.255
            $bits = explode('.', $match[0]);
            if (count($bits) != 4) {
                // weird, preg match shouldn't give us it.
                continue;
            }
            if (($bits[0] == 10)
                    || ($bits[0] == 172 && $bits[1] >= 16 && $bits[1] <= 31)
                    || ($bits[0] == 192 && $bits[1] == 168)
                    || ($bits[0] == 169 && $bits[1] == 254)) {
                $lanmatches[] = $match[0];
                continue;
            }
            // finally, it's ok
            $goodmatches[] = $match[0];
        }
        if (!count($goodmatches)) {
            // perhaps we have a lan match, it's probably better to return that.
            if (!count($lanmatches)) {
                return '';
            } else {
                return array_pop($lanmatches);
            }
        }
        if (count($goodmatches) == 1) {
            return $goodmatches[0];
        }

        // We need to return something, so return the first
        return array_pop($goodmatches);
    }

    // get saved logs depending on different options
    public function getLogs($args) {
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $args['sv']))) {
            throw new Zikula_Exception_Forbidden("You are not allowed to access to some information.");
        }

        $init = (isset($args['init'])) ? $args['init'] : '-1';
        $rpp = (isset($args['rpp'])) ? $args['rpp'] : '-1';

        $table = DBUtil::getTables();
        $where = "";
        $c = $table['IWmain_logs_column'];

        if (isset($args['moduleName'])) {
            $where = "$c[moduleName] = '$args[moduleName]'";
        }

        if (isset($args['indexName']) && $args['indexName'] != '' && isset($args['indexValue']) && $args['indexValue'] > 0) {
            $and = ($where != '') ? ' AND ' : '';
            $where .= $and . "$c[indexName] = '$args[indexName]' AND $c[indexValue] = $args[indexValue]";
        }

        if (isset($args['indexName1']) && $args['indexName1'] != '' && isset($args['indexValue1']) && $args['indexValue1'] > 0) {
            $and = ($where != '') ? ' AND ' : '';
            $where .= $and . "$c[indexName1] = '$args[indexName1]' AND $c[indexValue1] = $args[indexValue1]";
        }

        $order = (isset($args['order'])) ? $args['order'] : '';

        $orderby = "$c[logId] $order";
        if (isset($args['onlyNumber']) && $args['onlyNumber'] == 1) {
            $items = DBUtil::selectObjectCount('IWmain_logs', $where);
        } else {
            // get the objects from the db
            $items = DBUtil::selectObjectArray('IWmain_logs', $where, $orderby, $init, $rpp, 'logId');
        }
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false)
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        // Return the items
        return $items;
    }

    function deleteLog($args) {
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $args['sv']))) {
            throw new Zikula_Exception_Forbidden("You are not allowed to access to some information.");
        }
        $table = DBUtil::getTables();
        $c = $table['IWmain_logs_column'];

        $where = "$c[moduleName]='$args[moduleName]' AND $c[indexName]='$args[indexName]' AND $c[indexValue]=$args[indexValue]";

        if (!DBUtil::deleteWhere('IWmain_logs', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    //***************************************************************************************
    //
    // END - Logs system functions
    //
    //***************************************************************************************
}