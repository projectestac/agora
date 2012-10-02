<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadmin.php 20346 2006-10-19 15:00:24Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * @package      Zikula_System_Modules
 * @subpackage   legal
 * @author       Mark West
 * @author       The Zikula Development Team
 */

/**
 * reset the agreement to the terms of use for a speial group of users
 *
 * @param        gid   (int) the group id, -1=none, 0=all groups 
 * @author       The Zikula Development Team
 * @return       output       The main module admin page.
 */
function legal_adminapi_resetagreement($args)
{
    // Security check
    if (!SecurityUtil::checkPermission('legal::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    if (!isset($args['gid']) || $args['gid'] == -1) {
        return false;
    }
    
    // Get database setup
    $pntable = pnDBGetTables();
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
        $grp = pnModAPIFunc('Groups', 'user', 'get', array('gid' => $args['gid']));
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
