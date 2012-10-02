<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * init comments module
 *
 */
function stats_init()
{
    $dom = ZLanguage::getModuleDomain('Stats');
    // drop tables
    $tables = array('counter', 'stats_date', 'stats_hour', 'stats_week', 'stats_month');
    foreach ($tables as $table) {
        if (!DBUtil::createTable($table)) {
            return false;
        }
    }

    $counterArray = array( array('type' => 'total',   'var' => 'hits'),
                           array('type' => 'browser', 'var' => 'Lynx'),
                           array('type' => 'browser', 'var' => 'MSIE'),
                           array('type' => 'browser', 'var' => 'Opera'),
                           array('type' => 'browser', 'var' => 'Konqueror'),
                           array('type' => 'browser', 'var' => 'Netscape'),
                           array('type' => 'browser', 'var' => 'Bot'),
                           array('type' => 'browser', 'var' => 'Other'),
                           array('type' => 'browser', 'var' => 'Firefox'),
                           array('type' => 'browser', 'var' => 'Mozilla'),
                           array('type' => 'browser', 'var' => 'Safari'),
                           array('type' => 'browser', 'var' => 'Camino'),
                           array('type' => 'browser', 'var' => 'Chimera'),
                           array('type' => 'browser', 'var' => 'Epiphany'),
                           array('type' => 'browser', 'var' => 'Galeon'),
                           array('type' => 'browser', 'var' => 'K-Meleon'),
                           array('type' => 'os',      'var' => 'Windows'),
                           array('type' => 'os',      'var' => 'Linux'),
                           array('type' => 'os',      'var' => 'Mac'),
                           array('type' => 'os',      'var' => 'MacOSX'),
                           array('type' => 'os',      'var' => 'FreeBSD'),
                           array('type' => 'os',      'var' => 'SunOS'),
                           array('type' => 'os',      'var' => 'IRIX'),
                           array('type' => 'os',      'var' => 'OS/2'),
                           array('type' => 'os',      'var' => 'AIX'),
                           array('type' => 'os',      'var' => 'Other'));
    DBUtil::insertObjectArray($counterArray, 'counter');

    for ($i = 0; $i <=23; $i++) {
        $hourArray[] = array('hour' => $i);
    }
    DBUtil::insertObjectArray($hourArray, 'stats_hour');

    for ($i = 0; $i <=6; $i++) {
        $weekArray[] = array('weekday' => $i);
    }
    DBUtil::insertObjectArray($weekArray, 'stats_week');

    for ($i = 1; $i <=12; $i++) {
        $monthArray[] = array('month' => $i);
    }
    DBUtil::insertObjectArray($monthArray, 'stats_month');

    // Set up config variables
    pnModSetVar('Stats', 'excludeip', '192.168.123.254');
    pnModSetVar('Stats', 'collect', 1);
    pnModSetVar('Stats', 'twentyfourhour', 0);

    // create the system init hook
    if (!pnModRegisterHook('zikula', 'systeminit', 'API', 'Stats', 'user', 'collect')) {
        return LogUtil::registerError(__('unable to create system init hook', $dom));
    }
    pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'Stats'));
    LogUtil::registerStatus(__('Stats have been enabled, you can change this in the hook settings (Administration -> Modules -> System hooks) by deactivating the Stats systeminit hook for Zikula itself', $dom));

    // Initialisation successful
    return true;
}

/**
 * upgrade
 *
 * @todo recode using DBUtil
 */
function stats_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Stats');
    // Get database information
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();

    // define table information
    $counter_table = $pntable['counter'];
    $counter_column = $pntable['counter_column'];

    // Upgrade dependent on old version number
    switch($oldversion) {
        case 1.13:
            // add fields for firefox, mozilla and safari browsers
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','Firefox',0)");
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','Mozilla',0)");
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','Safari',0)");
            // add fields for macosx
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('os','MacOSX',0)");
            // remove beos field - Sniffer doesn't detect beos
            $result = $dbconn->Execute("DELETE FROM $counter_table WHERE pn_type = 'os' AND pn_var = 'BeOS'");
            return stats_upgrade(2.0);
            break;
        case 2.0:
            // add fields for firefox, mozilla and safari browsers
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','Camino',0)");
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','Chimera',0)");
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','Epiphany',0)");
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','Galeon',0)");
            $result = $dbconn->Execute("INSERT INTO $counter_table VALUES ('browser','K-Meleon',0)");
            return stats_upgrade(2.1);
            break;
        case 2.1:
            pnModSetVar('Stats', 'excludeip', '192.168.123.254');
            pnModSetVar('Stats', 'collect', 1);
            pnModSetVar('Stats', 'twentyfourhour', 0);
            return stats_upgrade(2.2);
            break;
        case 2.2:
            // create the system init hook
            if (!pnModRegisterHook('zikula', 'systeminit', 'API', 'Stats', 'user', 'collect')) {
                return LogUtil::registerError(__('unable to create system init hook', $dom));
            }
            pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'Stats'));
            LogUtil::registerStatus(__('Stats have been enabled, you can change this in the hook settings (Administration -> Modules -> System hooks) by deactivating the Stats systeminit hook for Zikula itself', $dom));
            break;   
    }

    // Update successful
    return true;
}

/**
 * delete the comments module
 *
 */
function stats_delete()
{
    $dom = ZLanguage::getModuleDomain('Stats');
    // drop tables
    $tables = array('counter', 'stats_date', 'stats_hour', 'stats_week', 'stats_month');
    foreach ($tables as $table) {
        if (!DBUtil::dropTable($table)) {
            return false;
        }
    }

    // Delete module variables
    pnModDelVar('Stats');

    // delete the system init hook
    if (!pnModUnregisterHook('zikula', 'systeminit', 'API', 'Stats', 'user', 'collect')) {
        return LogUtil::registerError(__('unable to delete system init hook', $dom));
    }

    // Deletion successful
    return true;
}
