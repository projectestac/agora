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
            $pntable = DBUtil::getTables();
            $c = $pntable['IWusers_column'];
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
        }
        return $links;
    }
    
    public function getNotValidatedAvatars () {
                // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWusers_column'];
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

}