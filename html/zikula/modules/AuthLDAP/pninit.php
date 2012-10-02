<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 53 2009-11-08 14:38:41Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AuthLDAP
*/

/**
 * Initialise the ldap auth module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * @author Mike Goldfinger <MikeGoldfinger@linuxmail.org>
 * @link http://authldap.ch.vu
 * @return bool true on success or false on failure
 */
function authldap_init()
{
    pnModSetVar('AuthLDAP', 'authldap_serveradr', '127.0.0.1');
    pnModSetVar('AuthLDAP', 'authldap_basedn', 'dc=foo,dc=bar');
    pnModSetVar('AuthLDAP', 'authldap_bindas', '');
    pnModSetVar('AuthLDAP', 'authldap_bindpass', '');
    pnModSetVar('AuthLDAP', 'authldap_searchdn', 'ou=users,dc=foo,dc=bar');
    pnModSetVar('AuthLDAP', 'authldap_searchattr', 'uid');
    pnModSetVar('AuthLDAP', 'authldap_protocol', '3');

    // Initialisation successful
    return true;
}

/**
 * Upgrade the AuthLDAP module from an old version
 * This function can be called multiple times
 * @author Mike Goldfinger <MikeGoldfinger@linuxmail.org>
 * @link http://authldap.ch.vu
 * @return bool true on success or false on failure
 */
function authldap_upgrade($oldversion)
{
    switch ($oldversion) {
        case '0.4.0.0':
            pnModSetVar('AuthLDAP', 'authldap_protocol', '3');

        case '1.0':
    }

    // Update successful
    return true;
}

/**
 * delete the ldap auth module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * @author Mike Goldfinger <MikeGoldfinger@linuxmail.org>
 * @link http://authldap.ch.vu
 * @return bool true on success or false on failure
 */
function authldap_delete()
{
    // Delete module variables
    pnModDelVar('AuthLDAP');

    // Deletion successful
    return true;
}
