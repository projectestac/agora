<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: admin.php 25234 2008-12-29 19:20:34Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @deprecated
 * @note This file can be removed if not using any non API compliant modules
 */

// include base api
include 'includes/pnAPI.php';

// start PN
pnInit();

if (SessionUtil::hasExpired()) {
    // Session has expired, display warning
    header('HTTP/1.0 403 Access Denied');
    include 'header.php';
    echo pnModAPIFunc('Users', 'user', 'expiredsession');
    include 'footer.php';
    pnShutDown();
}

// Get module
$module = FormUtil::getPassedValue('module', '', 'GETPOST');

if (empty($module)) {
    // call for admin.php without module parameter
    pnRedirect(pnModURL('Admin', 'admin', 'adminpanel'));
    pnShutDown();
} else if (!pnModAvailable($module) || !SecurityUtil::checkPermission("$module::", '::', ACCESS_EDIT)) {
    // call for an unavailable module - either not available or not authorized
    header('HTTP/1.0 403 Access Denied');
    include ('header.php');
    echo 'Module <strong>' . DataUtil::formatForDisplay($module) . '</strong> not available';
    include ('footer.php');
    pnShutDown();
}

// get the module information
$modinfo = pnModGetInfo(pnModGetIDFromName($module));

if ($modinfo['type'] == 2 || $modinfo['type'] == 3) {
    // Redirect to new style admin panel
    pnRedirect(pnModURL($module, 'admin'));
    pnShutDown();
}


if (!file_exists($adminfile='modules/' . DataUtil::formatForOS($modinfo['directory']) . '/admin.php')) {
    // Module claims to be old-style, but no admin.php present - quit here
    header('HTTP/1.0 404 Not Found');
    include ('header.php');
    echo 'Wrong call for Adminfunction in Module <strong>' . DataUtil::formatForDisplay($module) . '</strong>';
    include ('footer.php');
    pnShutDown();
}


/**
 * old style module administration
 */

$func = FormUtil::getPassedValue('func', '', 'GETPOST');
$op   = FormUtil::getPassedValue('op', '', 'GETPOST');
$name = FormUtil::getPassedValue('name', '', 'GETPOST');
$file = FormUtil::getPassedValue('file', '', 'GETPOST');
$type = FormUtil::getPassedValue('type', '', 'GETPOST');

// load the legacy includes
Loader::includeOnce('system/Admin/pnlegacy/tools.php');

// set a constant so we can check the correct entry point later
define('LOADED_AS_MODULE', '1');

$ModName = $module;
include $adminfile;
modules_get_manual();

// ensure that the module table information is available
pnModDBInfoLoad($modinfo['name'], $modinfo['directory']);

$function = $module . '_admin_';
if (empty($op)) {
    $op = 'main';
}
$function_op = $function . $op;
$function_main = $function . 'main';

if (function_exists($function_op)) {
    $function_op($_REQUEST);
} elseif (function_exists($function_main)) {
    $function_main($_REQUEST);
} else {
    // neither function_admin_op nor function_admin_main are available
    header('HTTP/1.0 404 Not Found');
    include ('header.php');
    echo 'Admin function <strong>'.DataUtil::formatForDisplay($function_op).'</strong> in Module <strong>'.DataUtil::formatForDisplay($module).'</strong> not available';
    include ('footer.php');
    pnShutDown();
}
pnShutDown();
