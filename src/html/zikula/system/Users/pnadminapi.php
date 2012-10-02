<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 28147 2010-01-25 12:51:16Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Users
*/

/**
 * users_adminapi_userexists()
 * Find whether the user exists. return true or false
 *
 * @param $args args['chng_user'] can be both username and userid
 * @return bool
 **/
function users_adminapi_userexists($args)
{
    $user = DBUtil::selectObjectByID('users', $args['chng_user'], 'uname');
    if (!$user) {
        $user = DBUtil::selectObjectByID('users', $args['chng_user'], 'uid');
    }

    return (boolean)$user;
}

/**
 * users_adminapi_getusergroups()
 * Get a list of usergroups
 *
 * @param $args
 * @return array of items
 **/
function users_adminapi_getusergroups($args)
{
    // Need read access to call this function
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        return false;
    }

    // Get and display current groups
    $objArray = DBUtil::selectObjectArray('groups', '', 'name');

    if ($objArray === false) {
        LogUtil::registerError(__('Error! Could not load data.'));
    }

    return $objArray;
}

/**
 * users_adminapi_findusers()
 * Find users
 *
 * @param $args['uname']         username
 * @param $args['email']         email address
 * @param $args['ugroup']        users group
 * @param $args['regdateafter']  reg date after ...
 * @param $args['regdatebefore'] reg date before ...
 * @param $args['dynadata']      array with attribute name to look for
 * @param $args['condition']     predefined condition for finding users, makes all others arguments obsolete
 * @return mixed array of items if succcessful, false otherwise
 **/
function users_adminapi_findusers($args)
{
    // Need read access to call this function
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        return false;
    }

    $profileModule = pnConfigGetVar('profilemodule', '');
    $useProfileMod = (!empty($profileModule) && pnModAvailable($profileModule));

    $pntable     = pnDBGetTables();
    $userstable  = $pntable['users'];
    $userscolumn = $pntable['users_column'];

    // Set query conditions (unless some one else sends a hardcoded one)
    if (!isset($args['condition']) || !$args['condition']) {
        // process all of these in one loop
        $args['condition'] = $userscolumn['uname'] . " != 'Anonymous'";
        $vars = array('uname', 'email');
        foreach ($vars as $var) {
            if (isset($args[$var]) && !empty($args[$var])) {
                $args['condition'] .= ' AND '.$userscolumn[$var].' LIKE \'%'.DataUtil::formatForStore($args[$var]).'%\'';
            }
        }

        // do the rest manually
        if (isset($args['ugroup']) && $args['ugroup']) {
            Loader::loadClass('UserUtil');
            $guids = UserUtil::getUsersForGroup($args['ugroup']);
            if (!empty($guids)) {
                $args['condition'] .= " AND $userscolumn[uid] IN (";
                foreach ($guids as $uid) {
                    $args['condition'] .= DataUtil::formatForStore($uid) . ',';
                }
                $args['condition'] .= '0)';
            }
        }
        if (isset($args['regdateafter']) && $args['regdateafter']) {
            $args['condition'] .= " AND $userscolumn[user_regdate] > '".DataUtil::formatForStore($args['regdateafter'])."'";
        }
        if (isset($args['regdatebefore']) && $args['regdatebefore']) {
            $args['condition'] .= " AND $userscolumn[user_regdate] < '".DataUtil::formatForStore($args['regdatebefore'])."'";
        }

        if ($useProfileMod) {
            // Check for attributes
            if (isset($args['dynadata']) && is_array($args['dynadata'])) {
                $uids = pnModAPIFunc($profileModule, 'user', 'searchdynadata', array('dynadata' => $args['dynadata']));
                if (is_array($uids) && !empty($uids)) {
                    $args['condition'] .= " AND $userscolumn[uid] IN (";
                    foreach ($uids as $uid) {
                        $args['condition'] .= DataUtil::formatForStore($uid) . ',';
                    }
                    $args['condition'] .= '0)';
                }
            }
        }
    }

    $where = 'WHERE ' . $args['condition'];

    // Select basic user data
    $sql = "SELECT     $userscolumn[uname] as uname,
                       $userscolumn[uid] as uid,
                       $userscolumn[email] as email
            FROM       $pntable[users]
            $where
            ORDER BY $userscolumn[uname] ASC";

    $result = DBUtil::executeSQL($sql);

    $objArray = array();
    if (!$result) {
        $objArray = null;
    } else {
        for (; !$result->EOF; $result->MoveNext()) {
            $objArray[] = $result->GetRowAssoc(2);
        }
    }

    return $objArray;
}

/**
 * users_adminapi_saveuser()
 * Save User
 *
 * @param $args
 * @return bool true if successful, false otherwise
 **/
function users_adminapi_saveuser($args)
{
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_EDIT)) {
        return false;
    }

    // Checking for necessary basics
    $reqFieldsBlank = array();
    if (!isset($args['uid']) || empty($args['uid'])) { $reqFieldsBlank[] = 'uid'; }
    if (!isset($args['uname']) || empty($args['uname'])) { $reqFieldsBlank[] = 'uname'; }
    if (!isset($args['email']) || empty($args['email'])) { $reqFieldsBlank[] = 'email'; }
    if (!empty($reqFieldsBlank)) {
        return LogUtil::registerError(__('Error! The following required field(s) were left blank or incomplete: '
                . implode(', ', $reqFieldsBlank)));
    }

    $checkpass = false;
    if (isset($args['pass']) && !empty($args['pass'])) {
        $checkpass = true;
    }

    if ($checkpass) {
        if (isset($args['pass']) && isset($args['vpass']) && $args['pass'] !== $args['vpass']) {
            return LogUtil::registerError(__('Error! You did not enter the same password in each password field. Please enter the same password once in each password field (this is required for verification).'));
        }

        $pass  = $args['pass'];
        $vpass = $args['vpass'];

        $minpass = pnModGetVar('Users', 'minpass');
        if (empty($pass) || strlen($pass) < $minpass) {
            return LogUtil::registerError(_fn('Your password must be at least %s character long', 'Your password must be at least %s characters long', $minpass));
        }
        if (!empty($pass) && $pass) {
            $method = pnModGetVar('Users', 'hash_method', 'sha1');
            $hashmethodsarray = pnModAPIFunc('Users', 'user', 'gethashmethods');
            $args['pass'] = DataUtil::hash($pass, $method);
            $args['hash_method'] = $hashmethodsarray[$method];
        }
    } else {
        unset($args['pass']);
    }

    // process the dynamic data
    $dynadata = isset($args['dynadata']) ? $args['dynadata'] : array();

    $profileModule = pnConfigGetVar('profilemodule', '');
    $useProfileMod = (!empty($profileModule) && pnModAvailable($profileModule));
    if ($useProfileMod && $dynadata) {

        $checkrequired = pnModAPIFunc($profileModule, 'user', 'checkrequired',
                                      array('dynadata' => $dynadata));

        if ($checkrequired['result'] == true) {
            return LogUtil::registerError(__f('Error! A required item is missing from your profile information (%s).', $checkrequired['translatedFieldsStr']));
        }
    }

    if (isset($dynadata['publicemail']) && !empty($dynadata['publicemail'])) {
        $dynadata['publicemail'] = preg_replace('/[^a-zA-Z0-9_@.-]/', '', $dynadata['publicemail']);
    }

    if (isset($dynadata['url']) && !empty($dynadata['url'])) {
        $dynadata['url'] = preg_replace('/[^a-zA-Z0-9_@.&#?;:\/-]/', '', $dynadata['url']);
        if (!preg_match('/^http:\/\/[0-9a-z]+/i', $dynadata['url'])) {
            $dynadata['url'] = "http://" . $dynadata['url'];
        }
    }

    $args['dynadata'] = $dynadata;

    // call the profile manager to handle dynadata if needed
    if ($useProfileMod) {
        $adddata = pnModAPIFunc($profileModule, 'user', 'insertdyndata', $args);
        if (is_array($adddata)) {
            $args = array_merge($adddata, $args);
        }
    }

    DBUtil::updateObject($args, 'users', '', 'uid');

    // Fixing a high numitems to be sure to get all groups
    $groups = pnModAPIFunc('Groups', 'user', 'getall', array('numitems' => 1000));

    foreach ($groups as $group)
    {
        if (in_array($group['gid'], $args['access_permissions'])) {
            // Check if the user is already in the group
            $useringroup = false;
            $usergroups  = pnModAPIFunc('Groups', 'user', 'getusergroups', array('uid' => $args['uid']));
            if ($usergroups) {
                foreach($usergroups as $usergroup) {
                    if ($group['gid'] == $usergroup['gid']) {
                        $useringroup = true;
                        break;
                    }
                }
            }
            // User is not in this group
            if ($useringroup == false) {
                pnModAPIFunc('Groups', 'admin', 'adduser', array('gid' => $group['gid'], 'uid' => $args['uid']));
            }
        } else {
            // We don't need to do a complex check, if the user is not in the group, the SQL will not return
            // an error anyway.
            pnModAPIFunc('Groups', 'admin', 'removeuser', array('gid' => $group['gid'], 'uid' => $args['uid']));
        }
    }

    // Let other modules know we have updated an item
    pnModCallHooks('item', 'update', $args['uid'], array('module' => 'Users'));

    return true;
}

/**
 * users_adminapi_deleteuser()
 *
 * @param $args[uid] int/array(int) one or many user IDs to delete
 * @return bool true if successful, false otherwise
 **/
function users_adminapi_deleteuser($args)
{
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_DELETE)) {
        return false;
    }

    if (!isset($args['uid']) || !(is_numeric($args['uid']) || is_array($args['uid']))) {
        return LogUtil::registerError("Error! Illegal argument were passed to 'deleteuser'");
    }

    // ensure we always have an array
    if (!is_array($args['uid'])) {
        $args['uid'] = array(0 => $args['uid']);
    }

    foreach($args['uid'] as $id) {
        if (!DBUtil::deleteObjectByID('group_membership', $id, 'uid')) {
            return false;
        }

        if (!DBUtil::deleteObjectByID('users', $id, 'uid')) {
            return false;
        }

        // Let other modules know we have deleted an item
        pnModCallHooks('item', 'delete', $id, array('module' => 'Users'));
    }

    return $args['uid'];
}

/**
 * users_adminapi_denyuser()
 *
 * @param $args
 * @return true if successful, false otherwise
 **/
function users_adminapi_deny($args)
{
    if (!isset($args['userid']) || !$args['userid']) {
        return false;
    }

    $res = DBUtil::deleteObjectByID('users_temp', $args['userid'], 'tid');

    return $res;
    //return (boolean)$res->Affected_Rows(); Currently not working
}

/**
 * users_adminapi_approveuser()
 *
 * @param $args
 * @return true if successful, false otherwise
 **/
function users_adminapi_approve($args)
{
    $false = false;

    if (!isset($args['userid']) || !$args['userid']) {
        return $false;
    }

    $user = DBUtil::selectObjectByID('users_temp', $args['userid'], 'tid');

    if (!$user) {
        return $user;
    }

    $user['vpass']     = $user['pass'];
    $user['dynadata']  = unserialize($user['dynamics']);
    $user['moderated'] = true;

    $insert = pnModAPIFunc('Users', 'user', 'finishnewuser', $user);

    if ($insert) {
        // $insert has uid, we remove it from the temp
        $result = pnModAPIFunc('Users', 'admin', 'deny', array('userid' => $args['userid']));
    } else {
        $result = $false;
    }

    return $result;
}

/**
 * get all example items
 *
 * @param    int     $args['starnum']    (optional) first item to return
 * @param    int     $args['numitems']   (optional) number if items to return
 * @return   array   array of items, or false on failure
 */
function users_adminapi_getallpendings($args)
{
    // Optional arguments.
    $startnum = (isset($args['startnum']) && is_numeric($args['startnum'])) ? $args['startnum'] : 1;
    $numitems = (isset($args['numitems']) && is_numeric($args['numitems'])) ? $args['numitems'] : -1;
    unset($args);

    $items = array();

    // Security check
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_OVERVIEW)) {
        return $items;
    }

    $pntable = pnDBGetTables();
    $userscolumn = $pntable['users_temp_column'];
    $orderby = "ORDER BY $userscolumn[tid]";
    $permFilter = array();
    // corresponding filter permission to filter anonymous in admin view:
    // Administrators | Users:: | Anonymous:: | None
    $permFilter[] = array('realm' => 0,
                          'component_left'   => 'Users',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'uname',
                          'instance_middle'  => '',
                          'instance_right'   => '',
                          'level'            => ACCESS_EDIT);
    $result = DBUtil::selectObjectArray('users_temp', '', $orderby, $startnum-1, $numitems, '', $permFilter);

    if ($result === false) {
        LogUtil::registerError(__('Error! Could not load data.'));
    }

    return $result;
}

/**
 * Get an application registry
 */
function users_adminapi_getapplication($args)
{
    if (!isset($args['userid']) || !$args['userid']) {
        return false;
    }

    $permFilter[] = array('realm' => 0,
                          'component_left'   => 'Users',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'uname',
                          'instance_middle'  => '',
                          'instance_right'   => 'tid',
                          'level'            => ACCESS_READ);
    $item = DBUtil::selectObjectByID('users_temp', $args['userid'], 'tid', null, $permFilter);

    if ($item === false) {
        LogUtil::registerError(__('Error! Could not load data.'));
    }

    return $item;
}

function users_adminapi_sendmail($args)
{
    if (!SecurityUtil::checkPermission('Users::MailUsers', '::', ACCESS_COMMENT)) {
        return LogUtil::registerPermissionError();
    }

    if (isset($args['uid']) && !empty($args['uid'])) {
        if (is_array($args['uid'])) {
            $recipientUidList = $args['uid'];
        } else {
            $recipientUidList = array($args['uid']);
        }
    } else {
        return LogUtil::registerError(__('Error! No users selected for removal, or invalid uid list.'));
    }
    
    if (isset($args['sendmail']) && !empty($args['sendmail']) && is_array($args['sendmail'])) {
        $sendmail = $args['sendmail'];
    } else {
        return LogUtil::registerError(__('Error! E-mail message to be sent not specified or invalid.'));
    }
    
    $missingFields = array();
    if (empty($sendmail['from'])) {
        $missingFields[] = 'from';
    }
    if (empty($sendmail['rpemail'])) {
        $missingFields[] = 'reply-to e-mail address';
    }
    if (empty($sendmail['subject'])) {
        $missingFields[] = 'subject';
    }
    if (empty($sendmail['message'])) {
        $missingFields[] = 'message';
    }
    if (!empty($missingFields)) {
        $count = count($missingFields);
        $msg = _fn('Error! The required field \'%2$s\' was blank or missing',
                'Error! %1$s required fields were blank or missing: \'%2$s\'.',
                $count, array($count, implode("', '", $missingFields)));
        return LogUtil::registerError($msg);
    }
    unset($missingFields);

    $bcclist = array();
    $recipientscount = 0;
    foreach ($sendmail['recipientsemail'] as $uid => $recipient)
    {
        if (in_array($uid, $recipientUidList)) {
            $bcclist[] = array('name'    => $sendmail['recipientsname'][$uid],
                               'address' => $recipient);
        }
        if (count($bcclist) == $sendmail['batchsize']) {
            if (pnModAPIFunc('Mailer', 'user', 'sendmessage',
                             array('fromname'       => $sendmail['from'],
                                   'fromaddress'    => $sendmail['rpemail'],
                                   'toname'         => pnUserGetVar('uname'),
                                   'toaddress'      => pnUserGetVar('email'),
                                   'replytoname'    => pnUserGetVar('uname'),
                                   'replytoaddress' => $sendmail['rpemail'],
                                   'subject'        => $sendmail['subject'],
                                   'body'           => $sendmail['message'],
                                   'bcc'            => $bcclist)) == true) {
                $recipientscount += count($bcclist);
                $bcclist = array();
            } else {
                return LogUtil::registerError(__('Error! Could not send the e-mail message.'));
            }
        }
    }
    if (count($bcclist) <> 0) {
        if (pnModAPIFunc('Mailer', 'user', 'sendmessage',
                         array('fromname'       => $sendmail['from'],
                               'fromaddress'    => $sendmail['rpemail'],
                               'toname'         => pnUserGetVar('uname'),
                               'toaddress'      => pnUserGetVar('email'),
                               'replytoname'    => pnUserGetVar('uname'),
                               'replytoaddress' => $sendmail['rpemail'],
                               'subject'        => $sendmail['subject'],
                               'body'           => $sendmail['message'],
                               'bcc'            => $bcclist)) == true) {
            $recipientscount += count($bcclist);
        } else {
            return LogUtil::registerError(__('Error! Could not send the e-mail message.'));
        }
    }
    if ($recipientscount > 0) {
        LogUtil::registerStatus(_fn('Done! E-mail message has been sent to %1$s user.',
                'Done! E-mail message has been sent to %1$s users.',
                $recipientscount, array($recipientscount)));
    }
    return true;
}

/**
 * users_adminapi_countpending()
 *
 * @param $args
 * @return nb of pending applications, false otherwise
 **/
function users_adminapi_countpending()
{
    return DBUtil::selectObjectCount('users_temp');
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function Users_adminapi_getlinks()
{
    $links = array();

    if (SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('Users', 'admin', 'view'), 'text' => __('Users list'));
    }
    if (SecurityUtil::checkPermission('Users::', '::', ACCESS_ADD)) {
        $pending = pnModAPIFunc('Users', 'admin', 'countpending');
        if ($pending) {
            $links[] = array('url' => pnModURL('Users', 'admin', 'viewapplications'), 'text' => __('Pending registrations') . ' ( '.DataUtil::formatForDisplay($pending).' )');
        }
        $links[] = array('url' => pnModURL('Users', 'admin', 'new'), 'text' => __('Create new user'));
    }
    if (SecurityUtil::checkPermission('Users::MailUsers', '::', ACCESS_COMMENT)) {
        $links[] = array('url' => pnModURL('Users', 'admin', 'search'), 'text' => __('Find and e-mail users'));
    } else if (SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('Users', 'admin', 'search'), 'text' => __('Find users'));
    }
    if (SecurityUtil::checkPermission('Users::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Users', 'admin', 'modifyconfig'), 'text' => __('Settings'));
    }

    $profileModule = pnConfigGetVar('profilemodule', '');
    $useProfileMod = (!empty($profileModule) && pnModAvailable($profileModule));
    if ($useProfileMod && SecurityUtil::checkPermission($profileModule . '::', '::', ACCESS_READ)) {
        if (pnModGetName() == 'Users') {
            $links[] = array('url' => 'javascript:showdynamicsmenu()', 'text' => __('Account panel manager'));
        } else {
            $links[] = array('url' => pnModURL($profileModule, 'admin', 'main'), 'text' => __('Account panel manager'));
        }
    }

    return $links;
}
