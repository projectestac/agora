<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

/**
 * Do the migration
 * 
 * With this function, the actual migration is done.
 * 
 * @return   boolean   true on sucessful migration, false else
 * @since    0.2
 */
function EZComments_migrateapi_pnFlashGames()
{
    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError('pnFlashGames comments migration: Not Admin');
    } 

    // Get datbase setup
    $tables = DBUtil::getTables();

    $Commentstable  = $tables['pnFlashGames_comments'];
    $Commentscolumn = $tables['pnFlashGames_comments_column'];

    $Usertable  = $tables['users'];
    $Usercolumn = $tables['users_column'];

    $sql = "SELECT $Commentscolumn[gid],
                   $Commentscolumn[uname],
                   $Commentscolumn[date],
                   $Commentscolumn[comment],
                   $Usercolumn[uid]
             FROM  $Commentstable
         LEFT JOIN $Usertable
                ON $Commentscolumn[uname] = $Usercolumn[uname]";

    $result = DBUtil::executeSQL($sql);

    if ($result == false) {
        return LogUtil::registerError('pnFlashGames migration: DB Error: ' . $sql . ' -- ' . mysql_error());
    }

    // loop through the old comments and insert them one by one into the DB
    $items = DBUtil::marshalObjects($result, array('gid', 'uname', 'date', 'comment', 'uid'));

    foreach ($items as $item) {
        // set the correct user id for anonymous users
        if (empty($item['uid'])) {
            $item['uid'] = 1;
        }

        $id = ModUtil::apiFunc('EZComments', 'user', 'create',
                           array('mod'      => 'pnFlashGames',
                                 'objectid' => DataUtil::formatForStore($item['gid']),
                                 'url'      => ModUtil::url('pnFlashGames', 'user', 'display', array('id' => $item['gid'])),
                                 'comment'  => $item['comment'],
                                 'subject'  => '',
                                 'uid'      => $item['uid'],
                                 'date'     => $item['date']));

        if (!$id) {
            return LogUtil::registerError('pnFlashGames migration: Error creating comment');
        }
    }

    return LogUtil::registerStatus('pnFlashGames migration successful');
}
