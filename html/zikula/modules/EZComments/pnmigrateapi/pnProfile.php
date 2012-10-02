<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnProfile.php 675 2010-04-11 04:10:54Z mateo $
 * @license See license.txt
 */

/**
 * Do the migration
 * 
 * With this function, the actual migration is done.
 * 
 * @return   boolean   true on sucessful migration, false else
 */
function EZComments_migrateapi_pnProfile()
{
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError('pnProfile comments migration: Not Admin');
    }

    $columnArray = array('id', 'modname', 'objectid');
    $comments = DBUtil::selectObjectArray('EZComments', '', '', -1, -1, '', null, null, $columnArray);

    $counter  = 0;
    foreach ($comments as $comment) {
        if ($comment['modname'] == 'pnProfile') {
            $comment['modname']  = 'MyProfile';
            $comment['url']      = pnModURL('MyProfile', 'user', 'display', array('uid' => $comment['objectid']));
            $comment['owneruid'] = $comment['objectid'];
            if (DBUtil::updateObject($comment, 'EZComments')) {
                $counter++;
            }
        }
    }

    return LogUtil::registerStatus("Updated / migrated: $counter comments from pnProfile to MyProfile, the successor of pnProfile");
}
