<?php
/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Zikula
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

include 'lib/bootstrap.php';


// XTEC ************ AFEGIT - Block access while upgrade is pending
// 2013.05.28 @aginard

$host = $ZConfig['DBInfo']['databases']['default']['hostmigrate'];
$port = $ZConfig['DBInfo']['databases']['default']['portmigrate'];
$user = $ZConfig['DBInfo']['databases']['default']['user'];
$pass = $ZConfig['DBInfo']['databases']['default']['password'];
$db   = $ZConfig['DBInfo']['databases']['default']['dbname'];

if (!empty($port)) {
    $dbc = mysqli_connect($host, $user, $pass, $db, $port);
} else {
    $dbc = mysqli_connect($host, $user, $pass, $db);
}

if (mysqli_connect_errno($dbc)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT count(*) as num_tables
        FROM information_schema.tables
        WHERE table_schema = '$db'
        AND table_name = 'module_vars'";

$res = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($row['num_tables'] == 0) {
    die ('<div style="font-size:2em; text-align:center; margin:80px; margin-bottom:40px;">
            La intranet resta temporalment fora de servei per tasques 
            d\'actualitzaci&oacute;. El servei es restablir&agrave; en breu.
         </div>
         <div style="font-size:1.2em; text-align:center;">
            Preguem disculpeu les mol&egrave;sties
         </div>');
}

// ************ FI


$core->init();

$core->getEventManager()->notify(new Zikula_Event('frontcontroller.predispatch'));

// Get variables
$module = FormUtil::getPassedValue('module', '', 'GETPOST', FILTER_SANITIZE_STRING);
$type   = FormUtil::getPassedValue('type', '', 'GETPOST', FILTER_SANITIZE_STRING);
$func   = FormUtil::getPassedValue('func', '', 'GETPOST', FILTER_SANITIZE_STRING);

// check requested module
$arguments = array();

// process the homepage
if (!$module) {
    // set the start parameters
    $module = System::getVar('startpage');
    $type = System::getVar('starttype');
    $func = System::getVar('startfunc');
    $args = explode(',', System::getVar('startargs'));

    foreach ($args as $arg) {
        if (!empty($arg)) {
            $argument = explode('=', $arg);
            $arguments[$argument[0]] = $argument[1];
        }
    }
}


// XTEC ************ AFEGIT - provide https login using BigIP
// 2013.06.19 @aginard
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    $rurl = $_SERVER['HTTP_X_FORWARDED_PROTO'];
} elseif (isset($_SERVER['HTTPS'])) {
    $rurl = strtolower($_SERVER['HTTPS']) == 'off' ? 'http' : 'https';
} else {
    $rurl = 'http';
}

if (($module == 'users' || $module == 'usuaris') && $type == 'user' && ($func == 'login' || $func == 'loginscreen')) {
    if ($rurl == 'http') {
        header('location:https://' . System::serverGetVar('HTTP_HOST') . System::getBaseUri() . '/' . ModUtil::url('users', 'user', 'login') . '&returnpage=' . System::getCurrentUrl());
    }
} else {
    if ($rurl == 'https') {
        header('location:http://' . System::serverGetVar('HTTP_HOST') . System::getCurrentUri());
    }
}
//************ FI


// get module information
$modinfo = ModUtil::getInfoFromName($module);

// we need to force the mod load if we want to call a modules interactive init
// function because the modules is not active right now
if ($modinfo) {
    $module = $modinfo['url'];

    if (System::isLegacyMode()) {
        $type = (empty($type)) ? $type = 'user' : $type;
        $func = (empty($func)) ? $func = 'main' : $func;
    }
    if ($type == 'init' || $type == 'interactiveinstaller') {
        ModUtil::load($modinfo['name'], $type, true);
    }
}

$httpCode = 404;
$message = '';
$debug = null;
$return = false;
$e = null;

if (System::getVar('Z_CONFIG_USE_TRANSACTIONS')) {
    $dbConn = Doctrine_Manager::getInstance()->getCurrentConnection();
    $dbConn->beginTransaction();
}

try {
    if (empty($module)) {
        // we have a static homepage
        $return = ' ';
    } elseif ($modinfo) {
        // call the requested/homepage module
        $return = ModUtil::func($modinfo['name'], $type, $func, $arguments);
    }

    if (!$return) {
        // hack for BC since modules currently use ModUtil::func without expecting exceptions - drak.
        throw new Zikula_Exception_NotFound(__('Page not found.'));
    }
    $httpCode = 200;

    if (System::getVar('Z_CONFIG_USE_TRANSACTIONS')) {
        $dbConn->commit();
    }

} catch (Exception $e) {
    $event = new Zikula_Event('frontcontroller.exception', $e, array('modinfo' => $modinfo, 'type' => $type, 'func' => $func, 'arguments' => $arguments));
    $core->getEventManager()->notify($event);

    if ($event->isStopped()) {
        $httpCode = $event['httpcode'];
        $message = $event['message'];
    } else {
        if ($e instanceof Zikula_Exception_NotFound) {
            $httpCode = 404;
            $message = $e->getMessage();
            $debug = array_merge($e->getDebug(), $e->getTrace());
        } elseif ($e instanceof Zikula_Exception_Forbidden) {
            $httpCode = 403;
            $message = $e->getMessage();
            $debug = array_merge($e->getDebug(), $e->getTrace());
        } elseif ($e instanceof Zikula_Exception_Redirect) {
            System::redirect($e->getUrl(), array(), $e->getType());
            System::shutDown();
        } elseif ($e instanceof PDOException) {
            $httpCode = 500;
            $message = $e->getMessage();
            if (System::getVar('Z_CONFIG_USE_TRANSACTIONS')) {
                $return = __('Error! The transaction failed. Performing rollback.') . $return;
                $dbConn->rollback();
            } else {
                $return = __('Error! The transaction failed.') . $return;
            }
        } elseif ($e instanceof Exception) {
            // general catch all
            $httpCode = 500;
            $message = $e->getMessage();
            $debug = $e->getTrace();
        }
    }
}

switch (true)
{
    case ($return === true):
        // prevent rendering of the theme.
        System::shutDown();
        break;

    case ($httpCode == 403):
        if (!UserUtil::isLoggedIn()) {
            $url = ModUtil::url('Users', 'user', 'login', array('returnpage' => urlencode(System::getCurrentUri())));
            LogUtil::registerError(LogUtil::getErrorMsgPermission(), $httpCode, $url);
            System::shutDown();
        }
        // there is no break here deliberately.
    case ($return === false):
        if (!LogUtil::hasErrors()) {
            LogUtil::registerError(__f('Could not load the \'%1$s\' module at \'%2$s\'.', array($module, $func)), $httpCode, null);
        }
        echo ModUtil::func('Errors', 'user', 'main', array('message' => $message, 'exception' => $e));
        break;

    case ($httpCode == 200):
        echo $return;
        break;

    default:
        LogUtil::registerError(__f('The \'%1$s\' module returned an error in \'%2$s\'.', array($module, $func)), $httpCode, null);
        echo ModUtil::func('Errors', 'user', 'main', array('message' => $message, 'exception' => $e));
        break;
}

Zikula_View_Theme::getInstance()->themefooter();
System::shutdown();
