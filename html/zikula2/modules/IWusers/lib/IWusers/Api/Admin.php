<?php

class IWusers_Api_Admin extends Zikula_AbstractApi {

    public function create($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        //Needed arguments
        if (!isset($args['uid'])) {
            return LogUtil::registerError('Error! Could not do what you wanted. Please check your input.');
        }

        $items = $args;

        if (!DBUtil::insertObject($items, 'IWusers', 'suid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $items['suid'];
    }

    /**
     * Input the user in the initial group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   user id and group id
     * @return:	True if success and false otherwise
     */
    public function addUserToGroup($args) {

        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Needed arguments
        if ($uid == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //if it is a single group and it is not an array
        if (!is_array($gid)) {
            $groups = explode('|', substr($gid, 0, -1));
        } else {
            $groups = $gid;
        }
        foreach ($groups as $g) {
            $items = array('uid' => $uid,
                'gid' => $g);
            if (!DBUtil::insertObject($items, 'group_membership')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
        }
        // Return the id of the newly created user to the calling process
        return true;
    }

    /**
     * Check csv import file header
     * @author: Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @param:	array $header contains csv header file fields
     * @return:	True if success and false otherwise
     */
    public function checkCsvHeader($header){
        $result = array();
        $result['correcte'] = false;
        // Valid csv header fields
        //$validFields = array('uname','new_uname','email','password','forcechgpass','activated','firstname','lastname1','lastname2','birthdate','gender','code','in','out');
        $validFields = array('uname','new_uname','email','password','forcechgpass','activated','nom','cognom1','cognom2','naixement','sex','code','in','out');
        // Check uname exist
        if (in_array('uname', $header)) {
            if (count($header) == count(array_unique($header))) {
                // No hi ha camps duplicats a la capçalera del csv
                // Comprovar que els camps del csv són també camps permesos
                $dif = array_diff($header, $validFields);
                if (empty($dif)) {
                    // Tots els camps del csv són vàlids
                    $result['correcte'] = true;
                    $result['msg'] = $this->__('File header is correct.');
                } else {
                    // Error: hi ha camps del csv que no ho són de la taula
                    $txtDif = implode(',', $dif);
                    $result['msg'] = $this->__f('< %s > are not valid fields.', $txtDif);
                }
            } else {
                //Error: hi ha camps del csv repetits
                $result['msg'] = $this->__('Import file contain repeated values in header fields.');
            }
        } else {
            $result['msg'] = $this->__("'uname' field is compulsory.");
        }
        return $result;        
    }
    
    /**
     * Update the users information
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args array with the users information
     * @return:	True if success and false otherwise
     */
    public function updateUser($args) {

        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $nom = FormUtil::getPassedValue('nom', isset($args['nom']) ? $args['nom'] : null, 'POST');
        $cognom1 = FormUtil::getPassedValue('cognom1', isset($args['cognom1']) ? $args['cognom1'] : null, 'POST');
        $cognom2 = FormUtil::getPassedValue('cognom2', isset($args['cognom2']) ? $args['cognom2'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Needed arguments
        if (!isset($args['uid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        foreach ($uid as $u) {
            $items = array('nom' => $nom[$u],
                'cognom1' => $cognom1[$u],
                'cognom2' => $cognom2[$u]);
            $table = DBUtil::getTables();
            $c = $table['IWusers_column'];
            $where = "$c[uid] = $u";
            if (!DBUTil::updateObject($items, 'IWusers', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }
        return true;
    }

    /**
     * Delete the users selected
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args array with the users identity
     * @return:	True if success and false otherwise
     */
    public function deleteUserGroups($args) {

        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Needed arguments
        if (!isset($args['uid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        foreach ($uid as $u) {
            if ($u == UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You can not remove yourself'));
            } else {
                if (!DBUtil::deleteObjectByID('group_membership', $u, 'uid')) {
                    return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
                }
            }
        }
        return true;
    }

    /**
     * Delete the user groups
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args the user identity
     * @return:	True if success and false otherwise
     */
    public function deleteUserFromGroups($args) {

        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        //Needed arguments
        if (!isset($args['uid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        if (!DBUtil::deleteObjectByID('group_membership', $uid, 'uid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    public function getlinks($args) {
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['attached'] : 0, 'POST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : 1, 'POST');
        $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : 20, 'POST');
        $links = array();
        if (SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('Users', 'admin', 'newUser'), 'text' => $this->__('Create user'), 'id' => 'iwusers_newuser', 'class' => 'z-icon-es-user');
            $links[] = array('url' => ModUtil::url('IWusers', 'admin', 'main'), 'text' => $this->__('Show the list of users'), 'id' => 'iwusers_main', 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('IWusers', 'admin', 'config'), 'text' => $this->__('Configure the module'), 'id' => 'iwusers_main', 'class' => 'z-icon-es-config');
            $links[] = array('url' => ModUtil::url('IWusers', 'admin', 'changeAvatarView'), 'text' => $this->__('Avatar change request'), 'id' => 'iwmain_changeAvatar', 'class' => 'z-icon-es-regenerate');
            $links[] = array('url' => ModUtil::url('IWusers', 'admin', 'import'), 'text' => $this->__('Import from CSV'), 'id' => 'iwusers_import', 'class' => 'z-icon-es-import');
            $links[] = array('url' => ModUtil::url('IWusers', 'admin', 'exporter'), 'text' => $this->__('Export to CSV'), 'id' => 'iwusers_export', 'class' => 'z-icon-es-export');
        }
        return $links;
    }
    
    public function getNotValidatedAvatars () {
                // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $table = DBUtil::getTables();
        $c = $table['IWusers_column'];
        $where = "$c[newavatar]<>''";

        $items = DBUtil::selectObjectArray('IWusers', $where, '', '-1', '-1', 'suid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }
    
    /*
     * Export user information to csv file
     * Exported fields: uname
     * Optional fields: 
     * @param array $optFields Optional fields to include in export file ( [export_email] => 1|0 [export_activated] => 1|0 [export_firstname] => 1|0 [export_lastname1] => 1|0 [export_lastname2] => 1|0 [export_birtdate] => 1|0 [export_gender] => 1|0 [export_groups] => 1|0 )
     * @return True if success and false otherwise
     */
    public function exportToCsv($args){
        $optFields = $args['optFields'];        
        $d = date('_Ymd_Hi') ;
        $filename  = $args['filename'];//="")?$args['filename']:"exportUsers" .  $d. '.csv';
        $delimiter = isset($args['delimiter'])?$args['delimiter'] : ';';
        $titlerow = array();
        $groups = false;
        $titlerow[] ="uname";
        $sql = "SELECT uid, uname";
        foreach ($optFields as $key => $value) {
            if ($value) {
                if ($key != "export_groups") $sql .= ",". $key; 
                // generate CSV header line
                switch ($key) {
                    case "activated" :
                        $titlerow[] ="activated";
                        break;
                    case "email":
                        $titlerow[] ="email";
                        break;
                    case "iw_nom":
                        $titlerow[] ="firstname";
                        break;
                    case "iw_cognom1":
                        $titlerow[] ="lastname1";
                        break;
                    case "iw_cognom2":
                        $titlerow[] ="lastname2";
                        break;
                    case "iw_naixement":
                        $titlerow[] ="birthdate";
                        break;
                    case "iw_sex":
                        $titlerow[] ="gender";
                        break;
                    case "export_groups":
                        $titlerow[] ="in";
                        $groups = true;
                        break;                    
                }
            }
        }
        $sql.= " FROM users, IWusers WHERE uid = iw_uid";
        // Get users info
        $rs = DBUtil::executeSQL($sql);
        $rsm = DBUtil::marshallObjects($rs);
        // Get groups from every user
//        if ($groups) {
        foreach ($rsm as $key => $user){
            if ($groups) {
                // Get all groups
                $rsm[$key]['in'] = UserUtil::getGroupListForUser($user['uid'], "|"); 
            }
            // Remove uid field
            array_splice($rsm[$key], 0, 1);
        }
        $result = array();
        FileUtil::exportCSV($rsm, $titlerow, $delimiter, '"', $filename);
        return true; //$result;
    }
    
    /*
     * 
     */
    public function sincronize(){
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN));
        $users   = DBUtil::selectFieldArray('users', 'uid');
        $iwUsers = DBUtil::selectFieldArray('IWusers', 'uid');
        
        $add = array_diff($users, $iwUsers);
        $del = array_diff($iwUsers, $users);
        
        // Add users         
        if (count($add)) {
            foreach ($add as $r) {
                $obj = array();
                $obj['uid'] = $r;
                if (!DBUtil::insertObject($obj, 'IWusers', 'suid')) {
                    return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
                }
            }
        }
        //Delete users
        if (count($del)) {
            foreach ($del as $r) {
                if (!DBUtil::deleteWhere('IWusers', 'iw_uid =' . $r)) {
                    return LogUtil::registerError($this->__('Error! Deletion attempt failed.'));
                }
            }
        }
        return true;
    }
    
    /* function updateUserGroups
     * 
     */
    public function updateUserGroups($args) {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN));

        $in  = strlen($args['in'])  ? explode('|',$args['in']) : null;
        $out = strlen($args['out']) ? explode('|',$args['out']) : null;
        $uid = isset($args['uid'])  ? $args['uid'] : null;
    
        if ($uid) {
            if (!is_null($out)) {
                // Delete users from groups in $out                
                foreach ($out as $gid){
                    if (!(ModUtil::apiFunc($this->name, 'admin', 'removeuser', array('uid' => $uid, 'gid' => $gid))))
                        LogUtil::registerError($this->__('Error! Deletion attempt failed.'));   
                }
            }

            if (!is_null($in)) {
                // Add user to $in groups
                foreach ($in as $gid){
                    if (!(ModUtil::apiFunc($this->name, 'admin', 'adduser', array('uid' => $uid, 'gid' => $gid))))
                        LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.')); 
                }
            }

            $resp = array();
            $resp['in'] = $in;
            $resp['out'] = $out;
            return $resp;
        } else {
            return false;
        }
    }

    /* Postprocessing csv file data: password, new uname and force change password
     * 
     * 
     */
    public function  applyCsvValues($args){
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_DELETE));
        $update = isset($args['update'])?$args['update']:null;
        $insert = isset($args['insert'])?$args['insert']:null;
        
        // Upate users table with new values
        if (!(DBUtil::updateObjectArray($update, 'users', 'uid')))
                LogUtil::registerError($this->__('Error! Update attempt failed.'));
        // Update IWusers table
        foreach ($update as &$user){
            if (DBUtil::updateObject($user, 'IWusers', "iw_uid =".$user['uid']))
                $user['action'] = 'm'; // modified //$this->__('Update');
            else 
                $user['error']= $user['uname']." - ".$this->__('Error! Update attempt failed.'). " ";
        }
        if (count($insert)){
            // Create new users in users table
            if (!(DBUtil::InsertObjectArray($insert, 'users', 'uid')))
                LogUtil::registerError($this->__('Error! New user creation attempt failed.'));
            // Create new users in IWusers table
            if (!(DBUtil::InsertObjectArray($insert, 'IWusers')))
                LogUtil::registerError($this->__('Error! New user creation attempt failed.'));
        }
        // Join update and insert arrays and process 
        $allChanges = array_merge($update, $insert);
       
        foreach ($allChanges as &$user){
            // Process "in" and "out" groups information
            ModUtil::apiFunc($this->name, 'admin', 'updateUserGroups', $user);
            // Set user pass
            if (isset($user['password']) && ($user['password']!="")) {
                // Validate pass length and pass <> uname or new_uname
                if (userUtil::validatePassword($user['password'])) {
                    UserUtil::setPassword($user['password'], $user['uid']);
                } else {
                    // Not a valid password -> error
                    $result['error'][$user['uid']] = $user;
                    $user['error'].=  $this->__('Password does not meet the minimum criteria.')." ";                    
                }
            }        
            // Force user change password?
            if ($forcechgpass) {
                switch ($user['forcechgpass']) {
                    case 1:
                        UserUtil::setVar('_Users_mustChangePassword', 1, $user['uid']);
                        break;
                    case 0;
                        UserUtil::delVar('_Users_mustChangePassword', $user['uid']);
                        break;
                }
            }
            // Change uname
            if (isset($user['new_uname']) && ($user['new_uname']!= "") && (!is_null($user['uid']))) {
                // search repeated uname/new_uname
                if (!(UserUtil::getIdFromName($user['new_uname']))) { 
                    // new_uname not exists proceed with uname change
                    $object['uname'] = $user['new_uname'];
                    //$object['uid'] = $user['uid'];
                    DBUtil::updateObject($object, 'users', "uid=".$user['uid']);
                    //UserUtil::setPassword($user['pass'], $user['uid']);
                } else {
                     $user['error'].=  $this->__f('Duplicated username: %s.', $user['new_uname']);
                }    
            }       
        }
        return $allChanges;
    }
    
    /**
     * Add a user to a group item.
     *
     * @param int $args['gid'] the ID of the item.
     * @param int $args['uid'] the ID of the user.
     *
     * @return bool true if successful, false otherwise.
     */
    public function adduser($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADD));
        // Argument check
        if ((!isset($args['gid'])) || (!isset($args['uid']))) {
            return LogUtil::registerArgsError();
        }

        $where = 'gid='.$args['gid'];
        $item = DBUtil::selectField('groups', 'gid', $where);
       
        if ($item == false) {
            return LogUtil::registerError($this->__('Sorry! No such item found.'));
        }
        
        // Add item
        $object = array('gid' => $args['gid'],
                'uid' => $args['uid']);
        $result = DBUtil::insertObject($object, 'group_membership');

        // Check for an error with the database code
        if (!$result) {
            return LogUtil::registerError($this->__('Error! Could not create the new item.'));
        }

        // Let other modules know that we have updated a group.
        $adduserEvent = new Zikula_Event('group.adduser', $object);
        $this->eventManager->notify($adduserEvent);

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Remove a user from a group item.
     *
     * @param int $args['gid'] the ID of the item.
     * @param int $args['uid'] the ID of the user.
     *
     * @return bool true if successful, false otherwise.
     */
    public function removeuser($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_DELETE));
        // Argument check
        if ((!isset($args['gid'])) ||
                (!isset($args['uid']))) {
            return LogUtil::registerArgsError();
        }

        // The user API function is called.
        $item = ModUtil::apiFunc('Groups', 'user', 'get',
                        array('gid' => $args['gid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Sorry! No such item found.'));
        }

        // Get datbase setup
        $dbtable = DBUtil::getTables();
        $groupmembershipcolumn = $dbtable['group_membership_column'];

        // Add item
        $where = "WHERE $groupmembershipcolumn[gid] = '" . (int)DataUtil::formatForStore($args['gid']) . "'
              AND $groupmembershipcolumn[uid] = '" . (int)DataUtil::formatForStore($args['uid']) . "'";
        $result = DBUtil::deleteWhere('group_membership', $where);

        // Check for an error with the database code
        if (!$result) {
            return false;
        }

        // Let other modules know we have updated a group
        $removeuserEvent = new Zikula_Event('group.removeuser', array('gid' => $args['gid'],
                        'uid' => $args['uid']));
        $this->eventManager->notify($removeuserEvent);

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Simplify "in" & "out" file information. 
     *   
     * > The purpose is optimize insertion and deletion actions.\n
     * > For example, if file indicates that a user must be deleted from a group
     * > and added in the same group id, group id will be removed from "in" and "out" list.\n
     * > Filter non existent group ids. Aviod redundant information processing
     * 
     * @parameter array $args.
     * Array description:
     * * integer **uid** User id
     * * string **in** Group ids separated by "|". Group ids where user will be added.
     * * string **out** Group ids separated by "|". Group ids where user will be removed.
     * 
     * @return array 
     */
    public function optimizeGroups($args){
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ));
        $line = $args['data'];
        //Initialize vars
        $result = array();
        $result['in'] = null;
        $result['out'] = null;
                
        // All Zikula groups
        $allGroups = array_keys(UserUtil::getGroups());
        // User groups
        $usrGroups = UserUtil::getGroupsForUser($args['uid']); 
       
        if (array_key_exists('in', $line)) {
            // File contains "in" field
            // 1. Erase non exitent groups
            $clean_in = array_intersect($allGroups, explode('|', $line['in']));
            // 2. Mantain only new groups. Remove gid from list "in" if user already belongs to this group            
            $result['in'] = implode('|', array_diff($clean_in, $usrGroups));             
        } else {
            // Needed in "out" clean process
            $clean_in = array();
        }        
        if (array_key_exists('out', $line)) {
            // File contains "out" field
            $out = explode('|', $line['out']);
            // 1. Erase non exitent groups
            $clean_out = array_intersect($allGroups, explode('|', $line['out']));
            // 2. Only in "out" list gid that are not in "in" list
            $out = array_diff($clean_out, $clean_in);
            // 3. Only in "out" list gids where user is member
            $result['out'] = implode('|', array_intersect($out, $usrGroups));            
        }                
        return $result;
    }
    
        /**
     * Delete one or more user account records, or mark one or more account records for deletion.
     *
     * If records are marked for deletion, they remain in the system and accessible by the system, but are given an
     * 'activated' status that prevents the user from logging in. Records marked for deletion will not appear on the
     * regular users list. The delete hook and delete events are not triggered if the records are only marked for
     * deletion.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * numeric|array $args['uid']  A single (numeric integer) user id, or an array of user ids to delete.
     * boolean       $args['mark'] If true, then mark for deletion, but do not actually delete.
     *                                  defaults to false.
     *
     * @param array $args All parameters passed to this function.
     *
     * @return bool True if successful, false otherwise.
     */
    public function deleteUser($args)
    {
        if (!SecurityUtil::checkPermission("{$this->name}::", 'ANY', ACCESS_DELETE)) {
            return false;
        }

        if (!isset($args['uid']) || (!is_numeric($args['uid']) && !is_array($args['uid']))) {
            $this->registerError("Error! Illegal argument were passed to 'deleteuser'");
            return false;
        }

        if (isset($args['mark']) && is_bool($args['mark'])) {
            $markOnly = $args['mark'];
        } else {
            $markOnly = false;
        }

        // ensure we always have an array
        if (!is_array($args['uid'])) {
            $args['uid'] = array($args['uid']);
        }

        $curUserUid = UserUtil::getVar('uid');
        $userList = array();

        foreach ($args['uid'] as $uid) {             
            if (!is_numeric($uid) || ((int)$uid != $uid) || ($uid == $curUserUid)) {
                return false;
            }
            $userObj = UserUtil::getVars($uid);
            if (!$userObj) {
                return false;
            } elseif (!SecurityUtil::checkPermission("{$this->name}::", "{$userObj['uname']}::{$userObj['uid']}", ACCESS_DELETE)) {
                return false;
            }

            $userList[] = $userObj;
        }


        foreach ($userList as $userObj) {
            if ($markOnly) {
                UserUtil::setVar('activated', Users_Constant::ACTIVATED_PENDING_DELETE, $userObj['uid']);
            } else {
                // TODO - This should be in the Groups module, and happen as a result of an event.
                if (!DBUtil::deleteObjectByID('group_membership', $userObj['uid'], 'uid')) {
                    return false;
                }

                ModUtil::apiFunc($this->name, 'admin', 'resetVerifyChgFor', array('uid' => $userObj['uid']));
                DBUtil::deleteObjectByID('session_info', $userObj['uid'], 'uid');

                if (!DBUtil::deleteObject($userObj, 'users', '', 'uid')) {
                    return false;
                }

                // Let other modules know we have deleted an item
                $deleteEvent = new Zikula_Event('user.account.delete', $userObj);
                $this->eventManager->notify($deleteEvent);
            }
        }

        return $args['uid'];
    }
    
    /**
     * Removes a record from the users_verifychg table for a specified uid and changetype.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * integer       $args['uid']        The uid of the verifychg record to remove. Required.
     * integer|array $args['changetype'] The changetype(s) of the verifychg record to remove. If more
     *                                          than one type is to be removed, use an array. Optional. If
     *                                          not specifed, all verifychg records for the user will be
     *                                          removed. Note: specifying an empty array will remove none.
     *
     * @param array $args All parameters passed to this function.
     *
     * @return void|bool Null on success, false on error.
     */
    public function resetVerifyChgFor($args)
    {
        if (!isset($args['uid'])) {
            $this->registerError(LogUtil::getErrorMsgArgs());

            return false;
        }
        $uid = $args['uid'];
        if (!is_numeric($uid) || ((int)$uid != $uid) || ($uid <= 1)) {
            $this->registerError(LogUtil::getErrorMsgArgs());

            return false;
        }

        if (!isset($args['changetype'])) {
            $changeType = null;
        } else {
            $changeType = $args['changetype'];
            if (!is_array($changeType)) {
                $changeType = array($changeType);
            } elseif (empty($changeType)) {
                return;
            }
            foreach ($changeType as $theType) {
                if (!is_numeric($theType) || ((int)$theType != $theType) || ($theType < 0)) {
                    $this->registerError(LogUtil::getErrorMsgArgs());

                    return false;
                }
            }
        }

        $dbinfo = DBUtil::getTables();
        $verifyChgColumn = $dbinfo['users_verifychg_column'];

        $where = "WHERE ({$verifyChgColumn['uid']} = {$uid})";
        if (isset($changeType)) {
            $where .= " AND ({$verifyChgColumn['changetype']} IN (" . implode(', ', $changeType) . "))";
        }
        DBUtil::deleteWhere('users_verifychg', $where);
    }


}