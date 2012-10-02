<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 28209 2010-02-05 02:11:20Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Users
*/

/**
 * get all example items
 *
 * @param    int     $args['starnum']    (optional) first item to return
 * @param    int     $args['numitems']   (optional) number if items to return
 * @return   array   array of items, or false on failure
 */
function users_userapi_getall($args)
{
    // Optional arguments.
    $startnum = (isset($args['startnum']) && is_numeric($args['startnum'])) ? $args['startnum'] : 1;
    $numitems = (isset($args['numitems']) && is_numeric($args['numitems'])) ? $args['numitems'] : -1;

    // Security check
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_OVERVIEW)) {
        return false;
    }

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
                      'level'            => ACCESS_READ);

    // form where clause
    $where = '';
    if (isset($args['letter'])) {
        $where = "WHERE pn_uname LIKE '".DataUtil::formatForStore($args['letter'])."%'";
    }

    $objArray = DBUtil::selectObjectArray('users', $where, 'uname', $startnum-1, $numitems, '', $permFilter);

    // Check for a DB error
    if ($objArray === false) {
        return LogUtil::registerError(__('Error! Could not load data.'));
    }

    return $objArray;
}

/**
 * get a specific item
 *
 * @param    $args['uid']  id of user item to get
 * @return   array         item array, or false on failure
 */
function users_userapi_get($args)
{
    // Argument check
    if (!isset($args['uid']) || !is_numeric($args['uid'])) {
        if (!isset($args['uname'])) {
            return LogUtil::registerArgsError();
        }
    }

    $pntable = pnDBGetTables();
    $userscolumn = $pntable['users_column'];

    // calculate the where statement
    if (isset($args['uid'])) {
        $where = "$userscolumn[uid]='" . DataUtil::formatForStore($args['uid']) . "'";
    } else {
        $where = "$userscolumn[uname]='" . DataUtil::formatForStore($args['uname']) . "'";
    }

    $obj = DBUtil::selectObject('users', $where);

    // Security check
    if ($obj && !SecurityUtil::checkPermission('Users::', "$obj[uname]::$obj[uid]", ACCESS_READ)) {
       return false;
    }

    // Return the item array
    return $obj;
}

/**
 * utility function to count the number of items held by this module
 *
 * TODO: shouldn't there be some sort of limit on the select/loop ??
 *
 * @return   integer   number of items held by this module
 */
function users_userapi_countitems($args)
{
    // form where clause
    $where = '';
    if (isset($args['letter'])) {
        $where = "WHERE pn_uname LIKE '".DataUtil::formatForStore($args['letter'])."%'";
    }

    return DBUtil::selectObjectCount('users', $where);
}

/**
 * users_userapi_optionalitems()
 * get opition items
 *
 * @return array of items, or false on failure
 **/
function users_userapi_optionalitems($args)
{
    $items = array();

    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        return $items;
    }

    if (!pnModAvailable('Profile') || !pnModDBInfoLoad('Profile')) {
        return false;
    }

    $pntable = pnDBGetTables();
    $propertycolumn = $pntable['user_property_column'];

    $extrawhere = '';
    if (isset($args['proplabel']) && !empty($args['proplabel'])) {
        $extrawhere = "AND $propertycolumn[prop_label] = '".DataUtil::formatForStore($args['proplabel'])."'";
    }

    $where = "WHERE  $propertycolumn[prop_weight] != 0
              AND    $propertycolumn[prop_dtype] != '-1' $extrawhere";

    $orderby = "ORDER BY $propertycolumn[prop_weight]";

    $objArray = DBUtil::selectObjectArray('user_property', $where, $orderby);

    if ($objArray === false) {
        LogUtil::registerError(__('Error! Could not load data.'));
        return $objArray;
    }

    $ak = array_keys($objArray);
    foreach ($ak as $v)
    {
        $prop_validation = @unserialize($objArray[$v]['prop_validation']);
        $prop_array = array('prop_viewby'      => $prop_validation['viewby'],
                            'prop_displaytype' => $prop_validation['displaytype'],
                            'prop_listoptions' => $prop_validation['listoptions'],
                            'prop_note'        => $prop_validation['note'],
                            'prop_validation'  => $prop_validation['validation']);

        array_push($objArray[$v], $prop_array);
    }

    return $objArray;
}

/**
 * users_userapi_checkuser()
 * Check whether the user is validated
 *
 * @return errorcodes -1=NoPermission 1=EverythingOK 2=NotaValidatedEmailAddr
 *         3=NotAgreeToTerms 4=InValidatedUserName 5=UserNameTooLong
 *         6=UserNameReserved 7=UserNameIncludeSpace 8=UserNameTaken
 *         9=EmailTaken 11=UserAgentBanned 12=DomainBanned
 **/
function users_userapi_checkuser($args)
{
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        return -1;
    }

    if (!pnVarValidate($args['email'], 'email')) {
        return 2;
    }

    if (pnModAvailable('legal')) {
        if ($args['agreetoterms'] == 0) {
            return 3;
        }
    }

    if ((!$args['uname']) || !(!preg_match("/[[:space:]]/", $args['uname'])) || !pnVarValidate($args['uname'], 'uname')) {
        return 4;
    }

    if (strlen($args['uname']) > 25) {
        return 5;
    }

    // admins are allowed to add any usernames, even those defined as being illegal
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_ADMIN)) {
        // check for illegal usernames
        $reg_illegalusername = pnModGetVar('Users', 'reg_Illegalusername');
        if (!empty($reg_illegalusername)) {
            $usernames = explode(" ", $reg_illegalusername);
            $count = count($usernames);
            $pregcondition = "/((";
            for ($i = 0;$i < $count;$i++) {
                if ($i != $count-1) {
                    $pregcondition .= $usernames[$i] . ")|(";
                } else {
                    $pregcondition .= $usernames[$i] . "))/iAD";
                }
            }
            if (preg_match($pregcondition, $args['uname'])) {
                return 6;
            }
        }
    }

    if (strrpos($args['uname'], ' ') > 0) {
        return 7;
    }

    // check existing and active user
    $ucount = DBUtil::selectObjectCountByID('users', $args['uname'], 'uname', 'lower');
    if ($ucount) {
        return 8;
    }

    // check pending user
    $ucount = DBUtil::selectObjectCountByID('users_temp', $args['uname'], 'uname', 'lower');
    if ($ucount) {
        return 8;
    }

    if (pnModGetVar('Users', 'reg_uniemail')) {
        $ucount = DBUtil::selectObjectCountByID('users', $args['email'], 'email');
        if ($ucount) {
            return 9;
        }
    }

    if (pnModGetVar('Users', 'moderation')) {
        $ucount = DBUtil::selectObjectCountByID('users_temp', $args['uname'], 'uname');
        if ($ucount) {
            return 8;
        }

        $ucount = DBUtil::selectObjectCountByID('users_temp', $args['email'], 'email');
        if (pnModGetVar('Users', 'reg_uniemail')) {
            if ($ucount) {
                return 9;
            }
        }
    }

    $useragent = strtolower(pnServerGetVar('HTTP_USER_AGENT'));
    $illegaluseragents = pnModGetVar('Users', 'reg_Illegaluseragents');
    if (!empty($illegaluseragents)) {
        $disallowed_useragents = str_replace(', ', ',', $illegaluseragents);
        $checkdisallowed_useragents = explode(',', $disallowed_useragents);
        $count = count($checkdisallowed_useragents);
        $pregcondition = "/((";
        for ($i = 0;$i < $count;$i++) {
            if ($i != $count-1) {
                $pregcondition .= $checkdisallowed_useragents[$i] . ")|(";
            } else {
                $pregcondition .= $checkdisallowed_useragents[$i] . "))/iAD";
            }
        }
        if (preg_match($pregcondition, $useragent)) {
            return 11;
        }
    }

    $illegaldomains = pnModGetVar('Users', 'reg_Illegaldomains');
    if (!empty($illegaldomains)) {
        list($foo, $maildomain) = explode('@', $args['email']);
        $maildomain = strtolower($maildomain);
        $disallowed_domains = str_replace(', ', ',', $illegaldomains);
        $checkdisallowed_domains = explode(',', $disallowed_domains);
        if (in_array($maildomain, $checkdisallowed_domains)) {
            return 12;
        }
    }

    return 1;
}

/**
 * users_userapi_finishnewuser
 */
function users_userapi_finishnewuser($args)
{
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        return false;
    }

    // arguments defaults
    if (!isset($args['isadmin'])) {
        $args['isadmin'] = false;
    }
    if (!isset($args['user_regdate'])) {
        $args['user_regdate'] = DateUtil::getDatetime();
    }
    if (!isset($args['user_viewemail'])) {
        $args['user_viewemail'] = '0';
    }
    if (!isset($args['storynum'])) {
        $args['storynum'] = '5';
    }
    if (!isset($args['commentlimit'])) {
        $args['commentlimit'] = '4096';
    }
    if (!isset($args['timezoneoffset'])) {
        $args['timezoneoffset'] = pnConfigGetVar('timezone_offset');
    }

    // hash methods array
    $hashmethodsarray = pnModAPIFunc('Users', 'user', 'gethashmethods');

    // make password
    $hash_method = pnModGetVar('Users', 'hash_method');
    $hashmethod = $hashmethodsarray[$hash_method];

    if (isset($args['moderated']) && $args['moderated'] == true) {
        $makepass  = $args['pass'];
        $cryptpass = $args['pass'];
        $activated = 1;
    } else {
        if (pnModGetVar('Users', 'reg_verifyemail') == 1 && !$args['isadmin']) {
            $makepass = _users_userapi_makePass();
            $cryptpass = DataUtil::hash($makepass, $hash_method);
            $activated = 1;
        } elseif (pnModGetVar('Users', 'reg_verifyemail') == 2) {
            $makepass = $args['pass'];
            $cryptpass = DataUtil::hash($args['pass'], $hash_method);
            $activated = ($args['isadmin'] ? 1 : 0);
        } else {
            $makepass = $args['pass']; // for welcome email. [class007]
            $cryptpass = DataUtil::hash($args['pass'], $hash_method);
            $activated = 1;
        }
    }

    if (isset($args['moderated']) && $args['moderated']) {
        $moderation = false;
    } elseif (!$args['isadmin']) {
        $moderation = pnModGetVar('Users', 'moderation');
        $args['moderated'] = false;
    } else {
        $moderation = false;
    }

    $pntable = pnDBGetTables();

    // We keep dynata as is if moderation is on as all dynadata will go in one field
    if ($moderation) {
        $column     = $pntable['users_temp_column'];
        $columnid   = $column['tid'];
    } else {
        $column     = $pntable['users_column'];
        $columnid   = $column['uid'];
    }

    $sitename  = pnConfigGetVar('sitename');
    $siteurl   = pnGetBaseURL();
    $adminmail = pnConfigGetVar('adminmail');

    // create output object
    $pnRender = & pnRender::getInstance('Users', false);
    $pnRender->assign('sitename', $sitename);
    $pnRender->assign('siteurl', substr($siteurl, 0, strlen($siteurl)-1));

    $obj = array();
    // do moderation stuff and exit
    if ($moderation) {
        $dynadata = isset($args['dynadata']) ? $args['dynadata'] : FormUtil::getPassedValue('dynadata', array());

        $obj['uname']    = $args['uname'];
        $obj['email']    = $args['email'];
        $obj['pass']     = $cryptpass;
        $obj['dynamics'] = @serialize($dynadata);
        $obj['comment']  = ''; //$args['comment'];
        $obj['type']     = 1;
        $obj['tag']      = 0;

        $obj = DBUtil::insertObject($obj, 'users_temp', 'tid');

        if (!$obj) {
            return false;
        }

        $pnRender->assign('email', $args['email']);
        $pnRender->assign('uname', $args['uname']);
        //$pnRender->assign('uid', $args['uid']);
        $pnRender->assign('makepass', $makepass);
        $pnRender->assign('moderation', $moderation);
        $pnRender->assign('moderated', $args['moderated']);

        // Password Email - Must be send now as the password will be encrypted and unretrievable later on.
        $message = $pnRender->fetch('users_userapi_welcomeemail.htm');

        $subject = __f('Password for %1$s from %2$s', array($args['uname'], $sitename));
        pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $args['email'], 'subject' => $subject, 'body' => $message, 'html' => true));

        // mail notify email to inform admin about registration
        if (pnModGetVar('Users', 'reg_notifyemail') != '' && $moderation == 1) {
            $email2 = pnModGetVar('Users', 'reg_notifyemail');
            $subject2 = __('New user account registered');
            $message2 = $pnRender->fetch('users_userapi_adminnotificationmail.htm');
            pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $email2, 'subject' => $subject2, 'body' => $message2, 'html' => true));
        }

        return $obj['tid'];
    }

    $obj['uname']           = $args['uname'];
    $obj['email']           = $args['email'];
    $obj['user_regdate']    = $args['user_regdate'];
    $obj['user_viewemail']  = $args['user_viewemail'];
    $obj['user_theme']      = '';
    $obj['pass']            = $cryptpass;
    $obj['storynum']        = $args['storynum'];
    $obj['ublockon']        = 0;
    $obj['ublock']          = '';
    $obj['theme']           = '';
    $obj['counter']         = 0;
    $obj['activated']       = $activated;
    $obj['hash_method']     = $hashmethod;

    $profileModule = pnConfigGetVar('profilemodule', '');
    $useProfileModule = (!empty($profileModule) && pnModAvailable($profileModule));

    // call the profile manager to handle dyndata if needed
    if ($useProfileModule) {
        $adddata = pnModAPIFunc($profileModule, 'user', 'insertdyndata', $args);
        if (is_array($adddata)) {
            $obj = array_merge($adddata, $obj);
        }
    }

    $res = DBUtil::insertObject($obj, 'users', 'uid');

    if (!$res) {
        return false;
    }

    $uid = $obj['uid'];

    // Add user to group
    // TODO - move this to a groups API calls
    $gid = pnModGetVar('Groups', 'defaultgroup');
    $group = DBUtil::selectObjectByID('groups', $gid, 'gid');
    if (!$group) {
        return false;
    }

    $obj = array();
    $obj['gid'] = $group['gid'];
    $obj['uid'] = $uid;
    $res = DBUtil::insertObject($obj, 'group_membership', 'dummy');
    if (!$res) {
        return false;
    }

    $from = pnConfigGetVar('adminmail');

    // begin mail user
    $pnRender->assign('email', $args['email']);
    $pnRender->assign('uname', $args['uname']);
    $pnRender->assign('uid', $uid);
    $pnRender->assign('makepass', $makepass);
    $pnRender->assign('moderated', $args['moderated']);
    $pnRender->assign('moderation', $moderation);
    $pnRender->assign('user_regdate', $args['user_regdate']);

    if ($activated == 1) {
        // Password Email & Welcome Email
        $message = $pnRender->fetch('users_userapi_welcomeemail.htm');
        $subject = __f('Password for %1$s from %2$s', array($args['uname'], $sitename));
        pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $args['email'], 'subject' => $subject, 'body' => $message, 'html' => true));

    } else {
        // Activation Email
        $subject = __f('Activation of %s', $args['uname']);
        // add en encoded activation code. The string is split with a hash (this character isn't used by base 64 encoding)
        $pnRender->assign('code', base64_encode($uid . '#' . $args['user_regdate']));
        $message = $pnRender->fetch('users_userapi_activationemail.htm');
        pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $args['email'], 'subject' => $subject, 'body' => $message, 'html' => true));
    }

    // mail notify email to inform admin about activation
    if (pnModGetVar('Users', 'reg_notifyemail') != '') {
        $email2 = pnModGetVar('Users', 'reg_notifyemail');
        $subject2 = __('New user account activated');
        $message2 = $pnRender->fetch('users_userapi_adminnotificationemail.htm');
        pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $email2, 'subject' => $subject2, 'body' => $message2, 'html' => true));
    }

    // Let other modules know we have created an item
    pnModCallHooks('item', 'create', $uid, array('module' => 'Users'));

    return $uid;
}

/**
 * users_userapi_mailpasswd()
 *
 * @param $args
 * @return code 0=DatabaseError 2=NoSuchUsername 3=PasswordMailed 4=ConfirmationCodeMailed
 **/
function users_userapi_mailpasswd($args)
{
    $pntable = pnDBGetTables();

    $sitename = pnConfigGetVar('sitename');
    $system = pnConfigGetVar('system');
    $adminmail = pnConfigGetVar('adminmail');

    $column = $pntable['users_column'];
    $wheres = array();
    if (!empty($args['email'])) {
        $wheres[] = "$column[email] = '" . DataUtil::formatForStore($args['email']) . "'";
        $who = $args['email'];
    }
    if (!empty($args['uname'])) {
        $wheres[] = "$column[uname] = '" . DataUtil::formatForStore($args['uname']) . "'";
        $who = $args['uname'];
    }
    $where = join('AND ', $wheres);
    $user  = DBUtil::selectObject('users', $where);
    if (!$user) {
        return 2;
    }

    $pnRender = & pnRender::getInstance('Users', false);
    $pnRender->assign('uname', $user['uname']);
    $pnRender->assign('sitename', $sitename);
    $pnRender->assign('hostname', pnServerGetVar('REMOTE_ADDR'));

    $areyou = substr($user['pass'], 0, 5);

    if ($areyou == $args['code']) {
        $pnRender->assign('password', $newpass=_users_userapi_makePass());
        $pnRender->assign('url', pnModURL('Users', 'user', 'loginscreen', array(), null, null, true));
        $message = $pnRender->fetch('users_userapi_passwordmail.htm');
        $subject = __f('Password for %s', $user['uname']);
        pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $user['email'],
                                                            'subject'   => $subject,
                                                            'body'      => $message,
                                                            'html'      => true));
        // Next step: add the new password to the database
        $hash_method = pnModGetVar('Users', 'hash_method');
        $hashmethodsarray = pnModAPIFunc('Users', 'user', 'gethashmethods');
        $cryptpass = DataUtil::hash($newpass, $hash_method);
        $obj = array();
        $obj['uname'] = $user['uname'];
        $obj['pass']  = $cryptpass;
        $obj['hash_method'] = $hashmethodsarray[$hash_method];
        $res = DBUtil::updateObject ($obj, 'users', '', 'uname');
        return ($res ? 3 : 0);
    } else {
        $pnRender->assign('code', substr($user['pass'], 0, 5));
        $pnRender->assign('url', pnModURL('Users', 'user', 'lostpassword', array(), null, null, true));
        $message = $pnRender->fetch('users_userapi_lostpasscodemail.htm');
        $subject = __f('Confirmation code for %s', $user['uname']);
        pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $user['email'],
                                                            'subject'   => $subject,
                                                            'body'      => $message,
                                                            'html'      => true));
        return 4;
    }
}

/**
 * users_userapi_activateuser()
 *
 * @param $args
 * @return bool
 **/
function users_userapi_activateuser($args)
{
    if (!SecurityUtil::checkPermission('Users::', '::', ACCESS_READ)) {
        return false;
    }

    // Preventing reactivation from same link !
    $newregdate = date("Y-m-d H:i:s", strtotime($args['regdate'])+1);
    $obj = array('uid'          => $args['uid'],
                 'activated'    => '1',
                 'user_regdate' => DataUtil::formatForStore($newregdate));

    return (boolean)DBUtil::updateObject($obj, 'users', '', 'uid');
}

/**
 * users_userapi_expiredsession
 */
function users_userapi_expiredsession($args)
{
    $pnRender = & pnRender::getInstance('Users', false);
    return $pnRender->fetch('users_userapi_expiredsession.htm');
}

/**
 * _users_userapi_makePass
 */
function _users_userapi_makePass()
{
    // todo - add password length configurability to user admin
    return RandomUtil::getString(8, 8, false, false, true, false, true, false, true, array('0', 'o', 'l', '1'));
}

/**
 * users_userapi_gethashmethods
 */
function users_userapi_gethashmethods($args)
{
    $reverse = isset($args['reverse']) ? $args['reverse'] : false;

    if ($reverse) {

        return array(1 => 'md5',
                     5 => 'sha1',
                     8 => 'sha256');
    } else {

        return array('md5'    => 1,
                     'sha1'   => 5,
                     'sha256' => 8);
    }
}

/**
 * Utility function to get the account links for each user module
 * @author FC
 * @return array
 */
function Users_userapi_accountlinks($args)
{
    // Get all user modules
    $mods = pnModGetAllMods();

    if ($mods == false) {
        return false;
    }

    $accountlinks = array();

    foreach ($mods as $mod)
    {
        // saves 17 system checks
        if ($mod['type'] == 3 && !in_array($mod['name'], array('Admin', 'Categories', 'Groups', 'Theme', 'Users'))) {
            continue;
        }

        $modpath = ($mod['type'] == 3) ? 'system' : 'modules';

        if (file_exists("$modpath/".DataUtil::formatForOS($mod['directory']).'/pnaccountapi.php')) {
            $items = pnModAPIFunc($mod['name'], 'account', 'getall');
            if ($items) {
                foreach ($items as $k => $item) {
                    // check every retured link for permissions
                    if (SecurityUtil::checkPermission('Users::', "$mod[name]::$item[title]", ACCESS_READ)) {
                        if (!isset($item['module'])) {
                            $item['module']  = $mod['name'];
                        }
                        // insert the indexed item
                        $accountlinks["$mod[name]{$k}"] = $item;
                    }
                }
            }
        } else {
            $items = false;
        }

        if (pnConfigGetVar('loadlegacy', false) && $mod['type'] != 3 && $items) {
            // add legacy user icons to the page.
            // The link images must be moved from /images/menu to the module directory.
            if (@is_dir($dir = "$modpath/" . DataUtil::formatForOS($mod['directory']) . '/user/links/')) {
                $linksdir = opendir($dir);
                while (false !== ($func = readdir($linksdir))) {
                    if (preg_match('/^links./i', $func)) {
                        // needed for modules_get_language
                        $GLOBALS['ModName'] = $mod['directory'];
                        include "$dir$func";
                        if (isset($GLOBALS['old_style_links'])) {
                            $accountlinks[] = array('url'    => $GLOBALS['old_style_links']['url'],
                                                    'title'  => $GLOBALS['old_style_links']['title'],
                                                    'icon'   => $GLOBALS['old_style_links']['image'],
                                                    'module' => $mod['name']);
                            unset($GLOBALS['old_style_links']);
                        }
                    }
                }
                closedir($linksdir);
            }
        }
    }

    return $accountlinks;
}
