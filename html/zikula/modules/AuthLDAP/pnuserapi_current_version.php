<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 53 2009-11-08 14:38:41Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AuthLDAP
*/

/**
 * This is a standard function called when a user logs into PN
 * @author Mike Goldfinger <MikeGoldfinger@linuxmail.org>
 * @link http://authldap.ch.vu
 * @param 'uname' the username to authenticate
 * @param 'pass' the password to autheticate the user with
 * @return bool true authetication succesful
 * @todo use user creation and group membership API calls.
*/
function AuthLDAP_userapi_login($args)
{
    $dom = ZLanguage::getModuleDomain('AuthLDAP');
    // Argument check
    if (!isset($args['uname']) ||
        !isset($args['pass'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // define the attributes we want to get in our search
    $justthese = array('dn', 'modifyTimestamp', 'uid', 'cn', 'mail', 'l', 'userpassword');

    // connect to ldap server
    if (!$ldap_ds = ldap_connect(pnModGetVar('AuthLDAP', 'authldap_serveradr'))) {
        return false;
    }

    // set protocol version
    $ldap_protocol = (int) pnModGetVar('AuthLDAP', 'authldap_protocol', 3);
    if (!ldap_set_option($ds, LDAP_OPT_PROTOCOL__('Version', $dom), $ldap_protocol)) {
        return false;
    }

    // bind to ldap server using our bind user if required
    if (pnModGetVar('AuthLDAP', 'authldap_bindas')) {
        $test = ldap_bind($ldap_ds, pnModGetVar('AuthLDAP', 'authldap_bindas'), pnModGetVar('AuthLDAP', 'authldap_bindpass'));
    }

    // search the directory for our user
    if (!$ldap_sr = ldap_search($ldap_ds, pnModGetVar('AuthLDAP', 'authldap_basedn'), pnModGetVar('AuthLDAP', 'authldap_searchattr') . '=' . DataUtil::formatForStore($args['uname']), $justthese)) {
        return false;
    }

    // get the users from our search
    if ((!$info = ldap_get_entries($ldap_ds, $ldap_sr)) || ($info['count'] == 0)) {
        return false;
    } else {
        if (!isset($info[0]['dn'])) {
            return false;
        }
    }

    // encrypt password using same function as to generate the pass for LDAP
    $hpass = AuthLDAP_userapi_encryptpassword(array('password' => $args['pass']));
    $upass = ($info[0]['userpassword'][0]);

    //compare passwords - stored like '{method}<encrypted string>'
    $pos = strpos($upass, '}');
    ($pos > 0) ? $upass = substr($upass, $pos + 1) : '';

    $pos = strpos($hpass, '}');
    ($pos > 0) ? $hpass = substr($hpass, $pos + 1) : '';

    if ($hpass != $upass) {
        return false;
    }

    // we're now finished with ldap itself so we don't need the connection anymore
    @ldap_unbind($ldap_ds);

    // check if the user already exists in the Zikula database
    $pnuser = pnModAPIFunc('Users', 'user', 'get', array('uname' => $info[0]['uid'][0]));
    if (!empty($pnuser) && isset($pnuser['uid'])) {
        $uid = $pnuser['uid'];
    } else {
        // set defaults - location may not be set in directory
        if (isset($info[0]['l'][0])) {
            $location = $info[0]['l'][0];
        } else {
            $location = '';
        }
        $realpass = $args['pass'];
        $dynadata = array('_UREALNAME' => $info[0]['dn'],
                          '_YLOCATION' => $location);
        // now lets create the user in Zikula
        $uid = pnModAPIFunc('Users', 'user', 'finishnewuser', array('uname'     => $info[0]['uid'][0],
                                                                    'email'     => $info[0]['mail'][0],
                                                                    'pass'      => '',
                                                                    'moderated' => false,
                                                                    'dynadata'  => $dynadata));
    }

	// Storing Last Login date
	if (pnModGetVar('Users', 'savelastlogindate')) {
		if (!pnUserSetVar('lastlogin', date("Y-m-d H:i:s", time()), $uid)) {
			return false;
		}
	}

    // return the user id
    return $uid;
}

/**
 * This function encrypts the password using the method defined for AuthLDAP
 * @author Bernd Plagge
 * @link http://www.choicenet.ne.jp
 * @return bool encrypted password - if we use encryption
 */
function AuthLDAP_userapi_encryptpassword($args) {
    $var = pnModGetVar('AuthLDAP', 'authldap_hash_method');
    switch ($var) {
        case 'none':
            $password = $args['password'];
            break;
        case 'sha1':
            $password = '{SHA}' . hash('sha1', $args['password']);
            break;
        case 'md5':
            $password = '{MD5}' . hash('md5', $args['password']);
            break;
        case 'sha64bit':
            $password = '{SHA}' . base64_encode(pack("H*", sha1($args['password'])));
            break;
    }
    return $password;
}

/**
 * This is a standard function called when a user logs into PN
 * @author Mark West
 * @link http://www.markwest.me.uk
 * @return bool true authetication succesful
 * @todo use user creation and group membership API calls.
 */
function AuthLDAP_userapi_logout($args)
{
    return true;
}
