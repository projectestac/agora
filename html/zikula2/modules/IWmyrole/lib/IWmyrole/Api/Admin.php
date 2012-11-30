<?php
class IWmyrole_Api_Admin extends Zikula_AbstractApi {
    /**
     * Delete all the group membership of the user
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @author: 	Josep Ferràndiz (jferran6@xtec.cat)
     * @param:	none
     * @return:	True if success and false in other case
     */
    public function delUserGroups() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmyrole::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $pntables = DBUtil::getTables();
        $c = $pntables['group_membership_column'];
        $where = "WHERE $c[uid]=" . UserUtil::getVar('uid') . " AND $c[gid] <>" . ModUtil::getVar('IWmyrole', 'rolegroup');

        if (!DBUtil::deleteWhere('group_membership', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    /**
     * Sets the user groups membership
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @author: 	Josep Ferràndiz (jferran6@xtec.cat)
     * @param:	Array with the id's of the groups where the user will be enroled
     * @return:	True if success and false in other case
     */
    public function addUserToGroup($args) {
        $roles = FormUtil::getPassedValue('roles', isset($args['roles']) ? $args['roles'] : null, 'POST');
        $defaultRoles = FormUtil::getPassedValue('defaultRoles', isset($args['defaultRoles']) ? $args['defaultRoles'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWmyrole::', "::", ACCESS_ADMIN) && $defaultRoles != 1) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($defaultRoles == 1) {
            $roles = array();
            //get user default roles
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $defaultRoles = ModUtil::func('IWmain', 'user', 'userGetVar',
                                           array('uid' => $uid,
                                                 'name' => 'defaultRoles',
                                                 'module' => 'IWmyrole',
                                                 'sv' => $sv));

            //set default roles
            $userGroups = explode('$$', $defaultRoles);
            $i = 0;
            foreach ($userGroups as $group) {
                if ($group != '') {
                    $roles[$i] = $group;
                    $i++;
                }
            }
        }
        $uid = UserUtil::getVar('uid');
        $count = count($roles);
        for ($i = 0; $i < $count; $i++) {
            //Check if user belongs to change group. If not the block is not showed
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $isMember = ModUtil::func('IWmain', 'user', 'isMember',
                                       array('sv' => $sv,
                                             'gid' => $roles[$i],
                                             'uid' => $uid));
            if (!$isMember) {
                $obj[] = array('uid' => $uid,
                               'gid' => $roles[$i]);
            }
        }

        if ($count > 0) {
            if (!DBUtil::insertObjectArray($obj, 'group_membership')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
        }
        return true;
    }

    /**
     * Check if the group that can change roles have the correct permissions
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the id of the group where the user will be enroled
     * @return:	True if success and false in other case
     */
    public function correctGroupPermissions($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWmyrole::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Get the min sequence value
        $pos = DBUtil::selectFieldMax('group_perms', 'sequence', 'MIN') + 1;

        $pntable = & DBUtil::getTables();
        $c = $pntable['group_perms_column'];

        $where = "$c[gid] = " . ModUtil::getVar('IWmyrole', 'rolegroup') . " AND $c[component] = 'IWmyrole::' AND $c[level] = 800 AND $c[sequence] = $pos";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('group_perms', $where);

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Change, in group permission table, the group id that can change roles
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @author: 	Josep Ferràndiz (jferran6@xtec.cat)
     * @param:	Array with the id of the group that can change roles
     * @return:	True if success and false in other case
     */
    // Canvia el grup dels permisos del mÃ²dul IWmyrole
    public function changePermissions($args) {
        $gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('IWmyrole::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $pntables = DBUtil::getTables();
        $column = $pntables['group_perms_column'];

        $object = array('gid' => $gid);
        $where = "WHERE $column[component] LIKE 'IWmyrole%' AND $column[gid] = " . ModUtil::getVar('IWmyrole', 'rolegroup');

        $result = DBUtil::updateObject($object, 'group_perms', $where);

        return!(empty($result));
    }

}