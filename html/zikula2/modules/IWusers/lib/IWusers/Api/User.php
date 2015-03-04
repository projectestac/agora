<?php

class IWusers_Api_User extends Zikula_AbstractApi {

    public function getAll($args) {
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'POST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'POST');
        $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($filtre == '0') {
            $filtre = '';
        }
        $myJoin = array();
        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uid'),
            'object_field_name' => array('uid'),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $myJoin[] = array('join_table' => 'IWusers',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $pntables = DBUtil::getTables();
        $ccolumn = $pntables['users_column'];
        $ocolumn = $pntables['IWusers_column'];
        switch ($campfiltre) {
            case 'n':
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[nom]<>'' AND b.$ocolumn[nom] like '" . $filtre . "%'";
                $orderby = "order by b.$ocolumn[nom]";
                break;
            case 'c1':
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom1]<>'' AND b.$ocolumn[cognom1] like '" . $filtre . "%'";
                $orderby = "order by b.$ocolumn[cognom1]";
                break;
            case 'c2':
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom2]<>'' AND b.$ocolumn[cognom2] like '" . $filtre . "%'";
                $orderby = "order by b.$ocolumn[cognom2]";
                break;
            default:
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND a.$ccolumn[uname] like '" . $filtre . "%'";
                $orderby = "order by a.$ccolumn[uname]";
        }
        $items = DBUtil::selectExpandedObjectArray('IWusers', $myJoin, $where, $orderby, $inici - 1, $numitems, 'uid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError(_SELECTFAILED);
        }
        return $items;
    }

    /**
     * Gets all the users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the users
     */
    public function getAllUsers() {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $myJoin = array();
        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uid'),
            'object_field_name' => array('uid'),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $myJoin[] = array('join_table' => 'IWusers',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $pntables = DBUtil::getTables();
        $ccolumn = $pntables['users_column'];
        $ocolumn = $pntables['IWusers_column'];
        $where = "b.$ocolumn[uid] = a.$ccolumn[uid]";
        $items = DBUtil::selectExpandedObjectArray('IWusers', $myJoin, $where, '', '-1', '-1', 'uid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError(_SELECTFAILED);
        }
        return $items;
    }

    /**
     * Get an user by id or by uname
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   the id of the user or the username
     * @return:	The user information
     */
    public function get($args) {

        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'POST');
        $multi = FormUtil::getPassedValue('multi', isset($args['multi']) ? $args['multi'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Needed arguments
        if (!isset($uid) && !isset($id) && !isset($multi)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWusers_column'];
        $where = "";
        if ($multi != null) {
            foreach ($multi as $simple) {
                $where .= "$c[uid]=$simple OR ";
            }
            $where = substr($where, 0, -3);
            $orderby = "$c[uid]";
        } else {
            $where = (isset($id)) ? "$c[id]='$id'" : "$c[uid]=$uid";
            $orderby = '';
        }
        $items = DBUtil::selectObjectArray('IWusers', $where, $orderby, '-1', '-1', 'suid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Count the number of users for a specific filter
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   filter values
     * @return:	The number of users
     */
    public function countUsers($args) {
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'POST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($filtre == '0') {
            $filtre = '';
        }
        $myJoin = array();
        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uid'),
            'object_field_name' => array('uid'),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $myJoin[] = array('join_table' => 'IWusers',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'uid',
            'compare_field_join' => 'uid');
        $pntables = DBUtil::getTables();
        $ccolumn = $pntables['users_column'];
        $ocolumn = $pntables['IWusers_column'];
        switch ($campfiltre) {
            case 'n':
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[nom]<>'' AND b.$ocolumn[nom] like '" . $filtre . "%'";
                $orderby = "order by b.$ocolumn[nom]";
                break;
            case 'c1':
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom1]<>'' AND b.$ocolumn[cognom1] like '" . $filtre . "%'";
                $orderby = "order by b.$ocolumn[cognom1]";
                break;
            case 'c2':
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom2]<>'' AND b.$ocolumn[cognom2] like '" . $filtre . "%'";
                $orderby = "order by b.$ocolumn[cognom2]";
                break;
            default:
                $where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND a.$ccolumn[uname] like '" . $filtre . "%'";
                $orderby = "order by a.$ccolumn[uname]";
        }
        $items = DBUtil::selectExpandedObjectArray('IWusers', $myJoin, $where, $orderby, '-1', '-1', 'uid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError(_SELECTFAILED);
        }
        return count($items);
    }

    /**
     * get all user's contacts
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	An array with the users
     */
    public function getAllFriends() {

        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWusers_friends_column'];
        $where = "$c[uid]=" . UserUtil::getVar('uid');

        $items = DBUtil::selectObjectArray('IWusers_friends', $where, '', '-1', '-1', 'fuid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * add a contact into user's list
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: fuid identity of the user to add
     * @return:	An array with the users
     */
    public function addContant($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $items = array('uid' => UserUtil::getVar('uid'),
            'fuid' => $args['fuid']);
        if (!DBUtil::insertObject($items, 'IWusers_friends', 'fud')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created user to the calling process
        return $items['fuid'];
    }

    /**
     * delete a contact from user's list
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: fuid identity of the user to delete
     * @return:	true if success and false otherwise
     */
    public function deleteContant($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWusers_friends_column'];
        $where = "WHERE $c[uid]=" . UserUtil::getVar('uid') . " AND $c[fuid]=" . $args['fuid'];
        if (!DBUtil::deleteObject(array(), 'IWusers_friends', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    public function changeRealName($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ) || !ModUtil::getVar('IWusers', 'usersCanManageName') == 1) {
            throw new Zikula_Exception_Forbidden();
        }
        $user = ModUtil::apiFunc('IWusers', 'user', 'get', array('uid' => UserUtil::getvar('uid')));
        if (!$user) {
            $items = array('uid' => UserUtil::getVar('uid'));
            // create user
            if (!DBUtil::insertObject($items, 'IWusers', 'suid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWusers_column'];
        $where = "WHERE $c[uid]=" . UserUtil::getVar('uid');
        $item = array('nom' => $args['userName'],
            'cognom1' => $args['userSurname1'],
            'cognom2' => $args['userSurname2']);
        if (!DBUtil::updateObject($item, 'IWusers', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function setSex($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ) || !ModUtil::getVar('IWusers', 'allowUserSetTheirSex') == 1) {
            throw new Zikula_Exception_Forbidden();
        }
        $user = ModUtil::apiFunc('IWusers', 'user', 'get', array('uid' => UserUtil::getvar('uid')));
        if (!$user) {
            $items = array('uid' => UserUtil::getVar('uid'));
            // create user
            if (!DBUtil::insertObject($items, 'IWusers', 'suid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWusers_column'];
        $where = "WHERE $c[uid]=" . UserUtil::getVar('uid');
        $item = array('sex' => $args['sex']);
        if (!DBUtil::updateObject($item, 'IWusers', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function changeDescription($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ) || !ModUtil::getVar('IWusers', 'allowUserDescribeTheirSelves') == 1) {
            throw new Zikula_Exception_Forbidden();
        }
        $user = ModUtil::apiFunc('IWusers', 'user', 'get', array('uid' => UserUtil::getvar('uid')));
        if (!$user) {
            $items = array('uid' => UserUtil::getVar('uid'));
            // create user
            if (!DBUtil::insertObject($items, 'IWusers', 'suid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWusers_column'];
        $where = "WHERE $c[uid]=" . UserUtil::getVar('uid');
        $item = array('description' => $args['description']);
        if (!DBUtil::updateObject($item, 'IWusers', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /*
      if (ModUtil::getVar('IWusers', 'allowUserSetTheirSex') == 1) {
      if (!ModUtil::apiFunc('IWusers', 'user', 'setSex', array('sex' => $sex,
      )))
      $errorMsg = 'Changing the real name has failed.';
      }


      if (ModUtil::getVar('IWusers', 'allowUserDescribeTheirSelves') == 1) {
      if (!ModUtil::apiFunc('IWusers', 'user', 'changeDescription', array('description' => $description,
      )))
      $errorMsg = 'Changing the real name has failed.';
      }
     */

    public function changeAvatar($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ) || !ModUtil::getVar('IWusers', 'allowUserChangeAvatar') == 1) {
            throw new Zikula_Exception_Forbidden();
        }
        $field = (isset($args['target'])) ? $args['target'] : 'avatar';
        $uid = (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN) || !isset($args['uid'])) ? UserUtil::getVar('uid') : $args['uid'];
        $pntables = DBUtil::getTables();
        $c = $pntables['IWusers_column'];
        $where = "WHERE $c[uid]=" . $uid;
        $field = (ModUtil::getVar('IWusers', 'avatarChangeValidationNeeded') == 1 && !SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN) && !isset($args['delete'])) ? 'newavatar' : $field;
        $item = array($field => $args['avatar']);
        if (!DBUtil::updateObject($item, 'IWusers', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function getlinks($args) {
        $links = array();
        if (SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('IWusers', 'user', 'main'), 'text' => $this->__('Shows the groups I belong'), 'id' => 'iwusers_main', 'class' => 'z-icon-es-group');
        }
        if (SecurityUtil::checkPermission('IWusers::', '::', ACCESS_COMMENT)) {
            $links[] = array('url' => ModUtil::url('IWusers', 'user', 'main', array('all' => 1)), 'text' => $this->__('Show all the groups'), 'id' => 'iwusers_main', 'class' => 'z-icon-es-group');
        }
        if (SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ) && ModUtil::getVar('IWusers', 'friendsSystemAvailable') == 1) {
            $links[] = array('url' => ModUtil::url('IWusers', 'user', 'members', array('gid' => -1)), 'text' => $this->__('Show contacts\' list'), 'id' => 'iwusers_main', 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ))  {
            $links[] = array('url' => ModUtil::url('IWusers', 'user', 'profile'), 'text' => $this->__('Edit profile'), 'id' => 'iwusers_main', 'class' => 'z-icon-es-config');
        }
        return $links;
    }

}
