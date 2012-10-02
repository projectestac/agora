<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnSecurity.php 27233 2009-10-27 20:07:15Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage pnAPI
 */

/**
 * Notes on security system
 *
 * Special UID and GIDS:
 *  UID -1 corresponds to 'all users', includes unregistered users
 *  GID -1 corresponds to 'all groups', includes unregistered users
 *  UID 0 corresponds to unregistered users
 *  GID 0 corresponds to unregistered users
 */

/**
 * Defines for access levels
 */
define('ACCESS_INVALID', -1);
define('ACCESS_NONE', 0);
define('ACCESS_OVERVIEW', 100);
define('ACCESS_READ', 200);
define('ACCESS_COMMENT', 300);
define('ACCESS_MODERATE', 400);
define('ACCESS_EDIT', 500);
define('ACCESS_ADD', 600);
define('ACCESS_DELETE', 700);
define('ACCESS_ADMIN', 800);

/**
 * Translation functions - avoids globals in external code
 */
// Translate level -> name
function accesslevelname($level)
{
    $accessnames = accesslevelnames();
    return $accessnames[$level];
}

/**
 * get access level names
 *
 * @return array of access names
 */
function accesslevelnames()
{
	static $accessnames=null;
	if (!is_array($accessnames)) {
        $accessnames = array(  0 => __('No access'),
                               100 => __('Overview access'),
                               200 => __('Read access'),
                               300 => __('Comment access'),
                               400 => __('Moderate access'),
                               500 => __('Edit access'),
                               600 => __('Add access'),
                               700 => __('Delete access'),
                               800 => __('Admin access'));
	}

    return $accessnames;
}

/**
 * addinstanceschemainfo - register an instance schema with the security
 * Will fail if an attempt is made to overwrite an existing schema
 *
 * @param unknown_type $component
 * @param unknown_type $schema
 */
function addinstanceschemainfo($component, $schema)
{
    pnSecAddSchema($component, $schema);
}

/**
 * add security schema
 *
 * @param unknown_type $component
 * @param unknown_type $schema
 * @return bool
 */
function pnSecAddSchema($component, $schema)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnSecAddSchema()', 'SecurityUtil::registerPermissionSchema()')), 'STRICT');

    return SecurityUtil::registerPermissionSchema($component, $schema);
}

/**
 * Wrapper for new pnSecAuthAction() function
 *
 * @deprecated
 * @see SecurityUtil::checkPermission()
 */
function authorised($testrealm, $testcomponent, $testinstance, $testlevel)
{
    return pnSecAuthAction($testrealm, $testcomponent, $testinstance, $testlevel);
}

/**
 * see if a user is authorised to carry out a particular task
 *
 * @deprecated
 * @see SecurityUtil::checkPermission()
 * @param realm the realm under test
 * @param component the component under test
 * @param instance the instance under test
 * @param level the level of access required
 * @return bool true if authorised, false if not
 */
function pnSecAuthAction($testrealm, $testcomponent, $testinstance, $testlevel, $testuser=null)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnSecAuthAction()', 'SecurityUtil::checkPermission()')), 'STRICT');

    return SecurityUtil::checkPermission($testcomponent, $testinstance, $testlevel, $testuser);
}

/**
 * get authorisation information for this user
 *
 * @deprecated
 * @see SecurityUtil::getAuthInfo()
 * @return array two element array of user and group permissions
 */
function pnSecGetAuthInfo($testuser=null)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnSecGetAuthInfo()', 'SecurityUtil::getAuthInfo()')), 'STRICT');

    return SecurityUtil::getAuthInfo($testuser);
}

/**
 * calculate security level for a test item
 *
 * @deprecated
 * @see SecurityUtil::getSecurityLevel
 * @param perms $ array of permissions to test against
 * @param testrealm $ realm of item under test
 * @param testcomponent $ component of item under test
 * @param testinstance $ instance of item under test
 * @return int matching security level
 */
function pnSecGetLevel($perms, $testrealm, $testcomponent, $testinstance)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnSecGetLevel()', 'SecurityUtil::getSecurityLevel()')), 'STRICT');

    return SecurityUtil::getSecurityLevel($perms, $testcomponent, $testinstance);
}

/**
 * generate an authorisation key
 *
 * The authorisation key is used to confirm that actions requested by a
 * particular user have followed the correct path.  Any stage that an
 * action could be made (e.g. a form or a 'delete' button) this function
 * must be called and the resultant string passed to the client as either
 * a GET or POST variable.  When the action then takes place it first calls
 * <code>pnSecConfirmAuthKey()</code> to ensure that the operation has
 * indeed been manually requested by the user and that the key is valid
 *
 * @see SecurityUtil::generateAuthKey
 * @param modname $ the module this authorisation key is for (optional)
 * @return string an encrypted key for use in authorisation of operations
 */
function pnSecGenAuthKey($modname = '')
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnSecGenAuthKey()', 'SecurityUtil::generateAuthKey()')), 'STRICT');

    return SecurityUtil::generateAuthKey($modname);
}

/**
 * confirm an authorisation key is valid
 *
 * See description of <code>pnSecGenAuthKey</code> for information on
 * this function
 *
 * @see SecurityUtil::confirmAuthKey()
 * @return bool true if the key is valid, false if it is not
 */
function pnSecConfirmAuthKey()
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnSecConfirmAuthKey()', 'SecurityUtil::confirmAuthKey()')), 'STRICT');

    return SecurityUtil::confirmAuthKey();
}
