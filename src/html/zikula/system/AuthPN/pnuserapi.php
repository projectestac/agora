<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 24891 2008-11-20 18:01:32Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AuthPN
*/

/**
 * Login a user using PN as the authentication source
 * @return bool true on success, false on failiure
 */
function AuthPN_userapi_login($args)
{
    $uname = (string)$args['uname'];
    $pass = (string)$args['pass'];
    $rememberme = (bool)$args['rememberme'];
    $checkPassword = (bool)$args['checkPassword'];

    if (pnUserLoggedIn()) {
        return true;
    }

    $loginviaoption = pnModGetVar('Users', 'loginviaoption', 0);
    if (!pnVarValidate($uname, ($loginviaoption==1 ? 'email' : 'uname'))) {
        return false;
    }

    // get the database connection
    pnModDBInfoLoad('Users', 'Users');

	$uservars = pnModGetVar('Users');
	if (!isset($uservars['loginviaoption']) || $uservars['loginviaoption'] == 0) {
		$user = DBUtil::selectObjectByID('users', $uname, 'uname', false);
	} else {
		$user = DBUtil::selectObjectByID('users', $uname, 'email');
	}

	if (!$user) {
		return false;
	}

	// check if the account is active
	if (isset($user['activated']) && !$user['activated']) {
		return false;
	}

        // define the user id for return later
        $uid = $user['uid'];

	// password check doesn't apply to HTTP(S) based login
	if ($checkPassword)	{
		$upass = $user['pass'];
		$pnuser_hash_number = $user['hash_method'];
		$hashmethodsarray   = pnModAPIFunc('Users', 'user', 'gethashmethods', array('reverse' => true));

		$hpass = DataUtil::hash($pass, $hashmethodsarray[$pnuser_hash_number]);
		if ($hpass != $upass) {
			return false;
		}
	}

	// Check stored hash matches the current system type, if not convert it.
	$system_hash_method = $uservars['hash_method'];
	if ($system_hash_method != $hashmethodsarray[$pnuser_hash_number]) {
		$newhash = DataUtil::hash($pass, $system_hash_method);
		$hashtonumberarray = pnModAPIFunc('Users', 'user', 'gethashmethods');

		$obj = array('uid'         => $uid,
                     'pass'        => $newhash,
                     'hash_method' => $hashtonumberarray[$system_hash_method]);
		$result = DBUtil::updateObject($obj, 'users', '', 'uid');

		if (!$result) {
			return false;
		}
	}

	// Storing Last Login date
	if ($uservars['savelastlogindate']) {
		if (!pnUserSetVar('lastlogin', date("Y-m-d H:i:s", time()), $uid)) {
			return false;
		}
	}
    return $uid;
}

/**
 * Logout a user using PN as the authentication source
 * @return bool true on success, false on failiure
 */
function AuthPN_userapi_logout($args)
{
    return true;
}
