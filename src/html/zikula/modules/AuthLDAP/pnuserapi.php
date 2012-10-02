<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 25144 2008-12-23 19:09:29Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AuthLDAP
*/

/**
 * This is a standard function called when a user logs into Zikula. Requires
 *  non-registered users to have read permission to module Users.
 * 
 * @author Toni Ginard (aginard@xtec.cat)
 * 
 * @param 'uname' the username to authenticate
 * @param 'pass' the password to autheticate the user with
 * 
 * @return bool true authetication successful
*/
function AuthLDAP_userapi_login($args)
{
    // Argument check
    if (!isset($args['uname']) ||
        !isset($args['pass'])) {
        return LogUtil::registerError (_MODARGSERROR);
    }

    // define the attributes we want to get in our search
    $justthese = array( 'cn','uid', 'givenname', 'sn', 'mail');

    // connect to ldap server
    if (!$ldap_ds = ldap_connect(pnModGetVar('AuthLDAP', 'authldap_serveradr'))) {
        return false;
    }

//XTEC ************ ELIMINAT - XTEC LDAP server uses non-standar bind
/*
    // bind to ldap server using our bind user if required
    if (pnModGetVar('AuthLDAP', 'authldap_bindas')) {
        ldap_bind($ldap_ds, pnModGetVar('AuthLDAP', 'authldap_bindas'), pnModGetVar('AuthLDAP', 'authldap_bindpass'));
    }
*/
//************ FI

//XTEC ************ AFEGIT - XTEC LDAP server uses non-standar bind
    $ldaprdn  = pnModGetVar('AuthLDAP', 'authldap_searchattr').'='.$args['uname'].','.pnModGetVar('AuthLDAP', 'authldap_basedn');    // ldap rdn or dn
    $ldappass = $args['pass'];  // associated password
    $bind_result = ldap_bind($ldap_ds, $ldaprdn, $ldappass);
//************ FI

    // search the directory for our user
    if (!$ldap_sr = ldap_search($ldap_ds, $ldaprdn, pnModGetVar('AuthLDAP', 'authldap_searchattr').'='.DataUtil::formatForStore($args['uname']), $justthese)) {
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

//XTEC ************ ELIMINAT - ldap_compare is no necessary because of the non-standar bind
/*
    // compare the passwords
    // I had to add a @ (at) symbol befor the ldap_compare call. This is because if a User (or Hacker) put a name in the User's Login Name field,
    // that exists in the Directory buth no "userpassword" attribute is present, he could log in to Zikula with any Password.
    // If a Directory entry have no Password attribute and the user log in using this Directory entry (username) he will get a errormessage.
    // When he reloads the Page here, Zikula open with this user logged in.
    $compare_result = @ldap_compare($ldap_ds, $info[0]['dn'], 'userpassword', $args['pass']);
    if ($compare_result !== true) {
        return false;
    }
*/
//************ FI

    // we're now finished with ldap itself so we don't need the connection anymore
    @ldap_unbind($ldap_ds);

    // check if the user already exists in the PN database
    $pnuser = pnModAPIFunc('Users', 'user', 'get', array('uname' => $info[0]['uid'][0]));
	

    if (!empty($pnuser) && isset($pnuser['uid'])) {
        $uid = $pnuser['uid'];
    } else {
        $realpass = $args['pass'];
        $dynadata = array('realname' => $info[0]['givenname'][0] . ' ' . $info[0]['sn'][0]);

        // now lets create the user in Zikula
        $uid = pnModAPIFunc('Users', 'user', 'finishnewuser', array('uname'     => $info[0]['uid'][0],
                                                                    'email'     => $info[0]['mail'][0],
                                                                    'pass'      => $realpass,
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

function AuthLDAP_userapi_logout($args)
{
    return true;
}