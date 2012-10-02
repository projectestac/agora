<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: oldfuncs.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage Zikula_legacy
 */

/**
 * Is user site admin
 */
function is_admin()
{
    return SecurityUtil::checkPermission('::', '::', ACCESS_ADMIN);
}

/**
 * Is user logged in
 */
function is_user()
{
    return pnUserLoggedIn();
}

/**
 * Get user variables
 */
function cookiedecode()
{
    if (!pnUserLoggedIn()) {
        return;
    }

    global $cookie;
    $cookie = array(pnUserGetVar('uid'),
        pnUserGetVar('uname'),
        pnUserGetVar('pass'),
        pnUserGetVar('storynum'),
        pnUserGetVar('umode'),
        pnUserGetVar('uorder'),
        pnUserGetVar('thold'),
        pnUserGetVar('noscore'),
        pnUserGetVar('ublockon'),
        pnUserGetVar('theme'),
        pnUserGetVar('commentmax'));

    return $cookie;
}

// Needed for some old modules
global $user;
if (pnUserLoggedIn()) {
    $user = pnUserGetVar('uid');
} else {
    $user = '';
}
// More needed for some old modules
global $prefix;
$prefix = pnConfigGetVar('prefix');

// Yet another one needed for older modules
include('includes/legacy/textsanitizer.php');

/**
 * Get full user info
 * The depreciated parameter was never used in the previous version of this function
 */
function getusrinfo($_depreciated)
{
    global $userinfo;

    $vars = pnUserGetVars(pnUserGetVar('uid'));

    // A map of keys we want in the result to keys we get from the API.
    $keys = array('uid' => 'uid', 'name' => '_UREALNAME', 'uname' => 'uname', 'email' => 'email', 'femail' => '_UFAKEMAIL',
                  'url' => '_YOURHOMEPAGE', 'user_avatar' => '_YOURAVATAR', 'user_icq' => '_YICQ', 'user_occ' => '_YOCCUPATION', 'user_from' => '_YLOCATION',
                  'user_intrest' => '_YINTERESTS', 'user_sig' => '_SIGNATURE', 'user_viewemail' => 'user_viewemail', 'user_theme' => 'theme',
                  'user_aim' => '_YAIM', 'user_yim' => '_YYIM', 'user_msnm' => '_YMSNM', 'pass' => 'pass', 'storynum' => 'storynum',
                  'umode' => 'umode', 'uorder' => 'uorder', 'thold' => 'thold', 'noscore' => 'noscore', 'bio' => 'bio',
                  'ublockon' => 'ublockon', 'ublock' => 'ublock', 'theme' => 'user_theme', 'commentmax' => 'commentmax', 'timezone_offset' => 'timezone_offset');

    $userinfo = array();
    foreach ($keys as $key => $val) {
        if (isset($vars[$val])) {
            $userinfo[$key] = $vars[$val];
        } else {
            // Set some sensible defaults for values that don't exist anymore...
            switch ($val) {
                case 'uorder':
                case 'thold':
                case 'noscore':
                  $userinfo[$key] = 0;
                  break;
                case 'commentmax':
                  $userinfo[$key] = 4096;
                  break;
                default:
                  $userinfo[$key] = '';
            }
        }
    }

    return $userinfo;
}
