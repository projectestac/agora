<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: SecurityUtil.class.php 27635 2009-11-17 12:37:23Z ph $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 */

/**
 * SecurityUtil
 *
 * @package Zikula_Core
 * @subpackage SecurityUtil
 * @author Drak
 */
class SecurityUtil
{
    /**
     * Check permissions
     *
     * @param string $component
     * @param string $instance
     * @param string $level
     * @param string $user
     * @return bool
     */
    function checkPermission($component = null, $instance = null, $level = null, $user = null)
    {
        static $groupperms = array();

        if (!is_numeric($level)) {
            return pn_exit(__f('Invalid security level [%1$s] received in %2$s', array($level, 'SecurityUtil::checkPermission')));
        }

        if (!$user) {
            $user = pnUserGetVar('uid');
        }

        if (!isset($GLOBALS['authinfogathered'][$user]) || (int) $GLOBALS['authinfogathered'][$user] == 0) {
            $groupperms[$user] = SecurityUtil::getAuthInfo($user); // First time here - get auth info
            if (count($groupperms[$user]) == 0) {
                return false; // No permissions
            }
        }

        $res = SecurityUtil::getSecurityLevel($groupperms[$user], $component, $instance) >= $level;

        // if the check failed, we save the info so that LogUtil has it readily available
        if (!$res) {
            global $PNRuntime;
            $PNRuntime['security']['last_failed_check']['component'] = $component;
            $PNRuntime['security']['last_failed_check']['instance'] = $instance;
            $PNRuntime['security']['last_failed_check']['level'] = $level;
            $PNRuntime['security']['last_failed_check']['user'] = $user;
        }

        return $res;
    }

    /**
     * register a permission schema
     *
     * @param string $component
     * @param string $schema
     * @return bool
     */
    function registerPermissionSchema($component, $schema)
    {
        if (!empty($GLOBALS['schemas'][$component])) {
            return false;
        }

        $GLOBALS['schemas'][$component] = $schema;
        return true;
    }

    /**
     * confirm auth key
     *
     * @param string $modname
     * @param string $varname
     *
     * @return bool
     */
    function confirmAuthKey($modname = '', $varname = 'authid')
    {
        if (!$varname) {
            $varname = 'authid';
        }

        $authid = FormUtil::getPassedValue($varname);

        if (empty($modname)) {
            $modname = pnModGetName();
        }

        // get the module info
        $modinfo = pnModGetInfo(pnModGetIDFromName($modname));
        $modname = strtolower($modinfo['name']);

        // get the array of randomed values per module and check if exists
        $rand_arr = SessionUtil::getVar('rand');
        if (!isset($rand_arr[$modname])) {
            return false;
        } else {
            $rand = $rand_arr[$modname];
        }

        // Regenerate static part of key
        $key = $rand . $modname;

        // validate useragent
        if (pnConfigGetVar('sessionauthkeyua')) {
            $useragent = sha1(pnServerGetVar('HTTP_USER_AGENT'));
            if (SessionUtil::getVar('useragent') != $useragent) {
                return false;
            }
        }

        // Test works because timestamp is embedded in authkey and appended
        // at the end of the authkey, so we can test validity of authid as
        // well as the number of seconds elapsed since generation.
        $keyexpiry = (int) pnConfigGetVar('keyexpiry');
        $timestamp = ($keyexpiry > 0 ? substr($authid, 40, strlen($authid)) : '');
        $key .= $timestamp;
        // check build key against authid
        if (sha1($key) == substr($authid, 0, 40)) {
            // now test if time expired
            $elapsedTime = (int) ((int) $timestamp > 0 ? time() - $timestamp : $keyexpiry - 1);
            if ($elapsedTime < $keyexpiry) {
                $rand_arr[$modname] = RandomUtil::getString(32, 40, false, true, true, false, true, true, false);
                SessionUtil::setVar('rand', $rand_arr);
                return true;
            }
        }

        return false;
    }

    /**
     * generate auth key
     *
     * @param string $modname module name
     * @return string an encrypted key for use in authorisation of operations
     */
    function generateAuthKey($modname = '')
    {
        // since we need sessions for authorisation keys we should check
        // if a session exists and if not create one
        SessionUtil::requireSession();

        if (empty($modname)) {
            $modname = pnModGetName();
        }

        // get the module info
        $modinfo = pnModGetInfo(pnModGetIDFromName($modname));
        $modname = strtolower($modinfo['name']);

        // get the array of randomed values per module
        // and generate the one of the current module if doesn't exist
        $rand_arr = SessionUtil::getVar('rand');

        if (!isset($rand_arr[$modname])) {
            $rand_arr[$modname] = RandomUtil::getString(32, 40, false, true, true, false, true, true, false);
            SessionUtil::setVar('rand', $rand_arr);
        }

        $key = $rand_arr[$modname] . $modname;
        if (pnConfigGetVar('keyexpiry') > 0) {
            $timestamp = time();
            $authid = sha1($key . $timestamp) . $timestamp;
        } else {
            $authid = sha1($key);
        }

        // Return encrypted key
        return $authid;
    }

    /**
     * get auth info
     *
     * @param unknown_type $user
     * @return array two element array of user and group permissions
     */
    function getAuthInfo($user = null)
    {
        // Table columns we use - pnModDBInfoLoad is done in pnInit
        $pntable = pnDBGetTables();
        $groupmembershipcolumn = $pntable['group_membership_column'];
        $grouppermcolumn = $pntable['group_perms_column'];

        // Empty arrays
        $groupperms = array();

        $uids[] = -1;
        // Get user ID
        if (!isset($user)) {
            if (!pnUserLoggedIn()) {
                // Unregistered UID
                $uids[] = 0;
                $vars['Active User'] = 'unregistered';
            } else {
                $uids[] = pnUserGetVar('uid');
                $vars['Active User'] = pnUserGetVar('uid');
            }
        } else {
            $uids[] = $user;
            $vars['Active User'] = $user;
        }
        $uids = implode(',', $uids);

        // Get all groups that user is in
        $where = "WHERE $groupmembershipcolumn[uid] IN (" . DataUtil::formatForStore($uids) . ')';
        $fldArray = DBUtil::selectFieldArray('group_membership', 'gid', $where);
        if ($fldArray === false) {
            return $groupperms;
        }

        static $usergroups = array();
        if (!$usergroups) {
            $usergroups[] = -1;
            if (!pnUserLoggedIn()) {
                $usergroups[] = 0; // Unregistered GID
            }
        }

        $allgroups = array_merge($usergroups, $fldArray);
        $allgroups = implode(',', $allgroups);

        // Get all group permissions
        $where = "WHERE $grouppermcolumn[gid] IN (" . DataUtil::formatForStore($allgroups) . ')';
        $orderBy = "ORDER BY $grouppermcolumn[sequence]";
        $objArray = DBUtil::selectObjectArray('group_perms', $where, $orderBy);
        if (!$objArray) {
            return $groupperms;
        }

        foreach ($objArray as $obj) {
            $component = SecurityUtil::_fixsecuritystring($obj['component']);
            $instance = SecurityUtil::_fixsecuritystring($obj['instance']);
            $level = SecurityUtil::_fixsecuritystring($obj['level']);
            // Search/replace of special names
            preg_match_all('/<([^>]+)>/', $instance, $res);
            $size = count($res[1]);
            for ($i = 0; $i < $size; $i++) {
                $instance = preg_replace('/<([^>]+)>/', $vars[$res[1][$i]], $instance, 1);
            }
            $groupperms[] = array('component' => $component, 'instance' => $instance, 'level' => $level);
        }

        // we've now got the permissions info
        $GLOBALS['authinfogathered'][$user] = 1;
        return $groupperms;
    }

    /**
     * get security level
     *
     * @param array $perms
     * @param string $component
     * @param string $instance
     * @return int matching security level
     */
    function getSecurityLevel($perms, $component, $instance)
    {
        $level = ACCESS_INVALID;

        // If we get a test component or instance purely consisting of ':' signs
        // then it counts as blank
        //itevo
        if ($component == str_repeat(':', strlen($component))) {
            $component = '';
        }
        if ($instance == str_repeat(':', strlen($instance))) {
            $instance = '';
        }

        // Test for generic permission
        if ((empty($component)) && (empty($instance))) {
            // Looking for best permission
            foreach ($perms as $perm) {
                if ($perm['level'] > $level) {
                    $level = $perm['level'];
                }
            }
            return $level;
        }

        // Test for generic instance
        // additional fixes by BMW [larsneo]
        // if the instance is empty, then we're looking for the per-module
        // permissions.
        if (empty($instance)) {
            // if $instance is empty, then there must be a component.
            // Looking for best permission
            foreach ($perms as $perm) {
                // component check
                if (!preg_match("=^$perm[component]$=", $component)) {
                    continue; // component doestn't match.
                }

                // check that the instance matches :: or '' (nothing)
                if (!(preg_match("=^$perm[instance]$=", '::') || preg_match("=^$perm[instance]$=", ''))) {
                    continue; // instance does not match
                }

                // We have a match - set the level and quit
                $level = $perm['level'];
                break;

            }
            return $level;
        }

        // Normal permissions check
        // there *is* a $instance at this point.
        foreach ($perms as $perm) {

            // if there is a component, check that it matches
            if (($component != '') && (!preg_match("=^$perm[component]$=", $component))) {
                // component exists, and doestn't match.
                continue;
            }

            // Confirm that instance matches
            if (!preg_match("=^$perm[instance]$=", $instance)) {
                // instance does not match
                continue;
            }

            // We have a match - set the level and quit looking
            $level = $perm['level'];
            break;
        }

        return $level;
    }

    /**
     * fix security string
     *
     * @access private
     * @param string $string
     * @return string
     */
    function _fixsecuritystring($string)
    {
        if (empty($string)) {
            $string = '.*';
        }
        if (strpos($string, ':') === 0) {
            $string = '.*' . $string;
        }
        $string = str_replace('::', ':.*:', $string);
        if (strrpos($string, ':') === strlen($string) - 1) {
            $string = $string . '.*';
        }
        return $string;
    }

    /**
     * sign data object leaving data clearly visible
     *
     * @param unknown_type $data
     * @return serialized string of signed data
     */
    function signData($data)
    {
        $key = pnConfigGetVar('signingkey');
        $unsignedData = serialize($data);
        $signature = sha1($unsignedData . $key);
        $signedData = serialize(array($unsignedData, $signature));

        return $signedData;
    }

    /**
     * verify signed data object
     *
     * @param string of serialized $data
     * @return mixed array or string of data if true or bool false if false
     */
    function checkSignedData($data)
    {
        $key = pnConfigGetVar('signingkey');
        $signedData = unserialize($data);
        $signature = sha1($signedData[0] . $key);
        if ($signature != $signedData[1]) {
            return false;
        }

        return unserialize($signedData[0]);
    }
}
