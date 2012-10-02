<?php
/**
 * Copyright (c) 2001-2012 Zikula Foundation
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license http://www.gnu.org/licenses/lgpl-3.0.html GNU/LGPLv3 (or at your option any later version).
 * @package Legal
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Administrative API functions.
 */
class Legal_Api_Admin extends Zikula_AbstractApi
{

    /**
     * Reset the agreement to the terms of use for a specific group of users, or all users.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * int $args['gid'] The group id; -1 = none, 0 = all groups.
     *
     * @param array $args All arguments passed to the function.
     *
     * @return bool True if successfully reset, otherwise false.
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     *
     * @throws Zikula_Exception_Fatal Thrown in cases where expected data is not present or not in an expected form.
     */
    public function resetagreement($args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('legal::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!isset($args['gid']) || $args['gid'] == -1) {
            throw new Zikula_Exception_Fatal();
        }

        // Get database setup
        $pntable = DBUtil::getTables();
        $userscolumn = $pntable['users_column'];

        if ($args['gid']==0) {
            //all users
            // creative usage of DBUtil
            $object = array('activated' => 2);
            $where = "WHERE $userscolumn[uid] NOT IN (1,2)";
            DBUtil::updateObject($object, 'users', $where, 'uid');
        } else {
            // single group

            // get the group incl members
            $grp = ModUtil::apiFunc('Groups', 'user', 'get', array('gid' => $args['gid']));
            if ($grp==false) {
                return false;
            }

            // remove anonymous from members array
            if (array_key_exists(1, $grp['members'])) {
                unset($grp['members'][1]);
            }

            // remove admin from members array
            if (array_key_exists(2, $grp['members'])) {
                unset($grp['members'][2]);
            }

            // return if group is empty
            if (count($grp['members'])==0) {
                return false;
            }
            $members = '(' . implode(array_keys($grp['members']), ',') . ')';

            // creative usage of DBUtil
            $object = array('activated' => 2);
            $where = "WHERE $userscolumn[uid] IN $members";
            DBUtil::updateObject($object, 'users', $where, 'uid');
        }
        return true;
    }

    /**
     * Get available admin panel links.
     *
     * @return array Array of adminpanel links.
     */
    public function getLinks()
    {
        $links = array();

        if (SecurityUtil::checkPermission('Users::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url($this->name, 'admin', 'modifyConfig'), 'text' => $this->__('Settings'), 'class' => 'z-icon-es-config');
        }

        return $links;
    }
}