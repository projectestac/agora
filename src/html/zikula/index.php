<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: index.php 27842 2009-12-12 06:08:16Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

// include base api
include 'includes/pnAPI.php';

// start PN
pnInit(PN_CORE_ALL & ~PN_CORE_AJAX);

if (SessionUtil::hasExpired()) {
    // Session has expired, display warning
    header('HTTP/1.0 403 Access Denied');
    Loader::includeOnce('header.php');
    echo pnModAPIFunc('Users', 'user', 'expiredsession');
    Loader::includeOnce('footer.php');
    pnShutDown();
}

// Get variables
// Note the op parameter is re-added here for gallery embedding
// this should be removed once gallery has been updated for better
// detection of zikula - assuming this parameter exists is
// far from the best solution - markwest
$module = FormUtil::getPassedValue('module', null, 'GETPOST');
$type   = FormUtil::getPassedValue('type', 'user', 'GETPOST');
$func   = FormUtil::getPassedValue('func', 'main', 'GETPOST');
$name   = FormUtil::getPassedValue('name', null, 'GETPOST');
$file   = FormUtil::getPassedValue('file', 'index', 'GETPOST');

// Check for site closed
if (pnConfigGetVar('siteoff') && !SecurityUtil::checkPermission('Settings::', 'SiteOff::', ACCESS_ADMIN) && !($module == 'Users' && $func == 'siteofflogin')) {
    if (SecurityUtil::checkPermission('Users::', '::', ACCESS_OVERVIEW) && pnUserLoggedIn()){
        pnUserLogOut();
    }
    header('HTTP/1.1 503 Service Unavailable');
    if (file_exists('config/templates/siteoff.htm')) {
        Loader::requireOnce('config/templates/siteoff.htm');
    } else {
        Loader::requireOnce('system/Theme/pntemplates/siteoff.htm');
    }
    pnShutDown();
}

// check requested module and set to start module if not present
if (empty($name) && empty($module)) {
    // legacy hack - some older themes rely on $GLOBALS['index'] being 1 for center blocks
    $GLOBALS['index'] = 1;
    $module = pnConfigGetVar('startpage');
    $type   = pnConfigGetVar('starttype');
    $func   = pnConfigGetVar('startfunc');
    $args   = explode(',', pnConfigGetVar('startargs'));
    $arguments = array();
    foreach ($args as $arg) {
        if (!empty($arg)) {
            $argument = explode('=', $arg);
            $arguments[$argument[0]] = $argument[1];
            pnQueryStringSetVar($argument[0], $argument[1]);
        }
    }
} elseif (empty($module) && !empty($name)) {
    $module = $name;
}

// get module information
$modinfo = pnModGetInfo(pnModGetIDFromName($module));

if ($type <> 'init' && !empty($module) && !pnModAvailable($modinfo['name'])) {
    Loader::includeOnce('header.php');
    LogUtil::registerError(__f("The '%s' module is not currently accessible.", DataUtil::formatForDisplay(strip_tags($module))));
    echo pnModFunc('Errors', 'user', 'main', array('type' => 404));
    Loader::includeOnce('footer.php');
    pnShutDown();
}

if ($modinfo['type'] == 2 || $modinfo['type'] == 3) {
    // New-new style of loading modules
    if (!isset($arguments)) {
        $arguments = array();
    }

    // we need to force the mod load if we want to call a modules interactive init
    // function because the modules is not active right now
    $force_modload = ($type=='init') ? true : false;
    if (empty($type)) $type = 'user';
    if (empty($func)) $func = 'main';
    if (pnModLoad($modinfo['name'], $type, $force_modload)) {
        if (pnConfigGetVar('PN_CONFIG_USE_TRANSACTIONS')) {
            $dbConn = pnDBGetConn(true);
            $dbConn->StartTrans();
        }

        $return = pnModFunc($modinfo['name'], $type, $func, $arguments);

        if (pnConfigGetVar('PN_CONFIG_USE_TRANSACTIONS')) {
            if ($dbConn->HasFailedTrans()) {
                $return = __('Error! The transaction failed. Please perform a rollback.') . $return;
            }
            $dbConn->CompleteTrans();
        }
    } else {
        $return = false;
    }

    // Sort out return of function.  Can be
    // true - finished
    // false - display error msg
    // text - return information
    if ($return !== true) {
        Loader::includeOnce('header.php');
        if ($return === false) {
            // check for existing errors or set a generic error
            if (!LogUtil::hasErrors()) {
                 LogUtil::registerError(__f("Could not load the '%s' module (at '%s' function).", array($modinfo['url'], $func)), 404);
            }
            echo pnModFunc('Errors', 'user', 'main');
        } elseif (is_string($return) && strlen($return) > 1) {
            // Text
            echo $return;
        } elseif (is_array($return)) {
            $pnRender = & pnRender::getInstance($modinfo['name']);
            $pnRender->assign($return);
            if (isset($return['template'])) {
                echo $pnRender->fetch($return['template']);
            } else {
                $modname = strtolower($modinfo['name']);
                $type = strtolower($type);
                $func = strtolower($func);
                echo $pnRender->fetch("{$modname}_{$type}_{$func}.htm");
            }
        } else {
            LogUtil::registerError(__f('The \'%1$s\' module returned at the \'%2$s\' function.', array($modinfo['url'], $func)), 404);
            echo pnModFunc('Errors', 'user', 'main');
        }
        Loader::includeOnce('footer.php');
    }
} elseif ($modinfo['type'] == 1) {
    // Old-old style of loading modules
    define('LOADED_AS_MODULE', '1');
    // ensure that the module table information is available
    pnModDBInfoLoad($modinfo['name'], $modinfo['directory']);
    if (file_exists('modules/' . DataUtil::formatForOS($modinfo['directory']) . '/' . DataUtil::formatForOS($file) . '.php')) {
        include 'modules/' . DataUtil::formatForOS($modinfo['directory']) . '/' . DataUtil::formatForOS($file) . '.php';
    } else {
        // Failed to load the module
        header('HTTP/1.0 404 Not Found');
        Loader::includeOnce('header.php');
        LogUtil::registerError(__f("Could not load the '%s' module.", $modinfo['url']), 404);
        echo pnModFunc('Errors', 'user', 'main');
        Loader::includeOnce('footer.php');
        pnShutDown();
    }
} else {
    Loader::includeOnce('header.php');
    Loader::includeOnce('footer.php');
}

pnShutDown();
