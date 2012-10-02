<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: user.php 24950 2008-12-05 20:14:23Z Landseer $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @deprecated
 * @note This file can be removed if not using any non pnAPI compliant modules
 * @note This file will be removed for the next major release
 */

// include base api
include 'includes/pnAPI.php';

// start PN
pnInit();

$op         = FormUtil::getPassedValue('op', null, 'GET');
$uname      = FormUtil::getPassedValue('uname', null, 'GET');
$pass       = FormUtil::getPassedValue('pass', null, 'GET');
$url        = FormUtil::getPassedValue('url', null, 'GET');
$rememberme = FormUtil::getPassedValue('rememberme', null, 'GET');

include 'header.php';
// set correct toplevelmodule
$GLOBALS['theme_engine']->toplevelmodule = 'Users';
if (!empty($op)) {
    if ($op == 'logout') {
        echo pnModFunc('Users', 'user', 'logout');
    }
    if ($op == 'login') {
        pnModFunc('Users', 'user', 'login', array('uname' => $uname, 'pass' => $pass, 'url' => $url, 'rememberme' => $rememberme));
    }
    if ($op == 'userinfo') {
        $profileModule = pnConfigGetVar('profilemodule', '');
        if (!empty($profileModule) && pnModAvailable($profileModule)) {
            $GLOBALS['theme_engine']->toplevelmodule = $profileModule;
            echo pnModFunc($profileModule, 'user', 'view', array('uname' => $uname));
        }
        else {
            echo pnModFunc('Users', 'user', 'main');
        }
    }
} else {
    echo pnModFunc('Users', 'user', 'main');
}
include 'footer.php';
