<?php

function IWstats_init() {
    $dom = ZLanguage::getModuleDomain('IWstats');

    // Checks if module iw_main is installed. If not returns error
    $modid = pnModGetIDFromName('iw_main');
    $modinfo = pnModGetInfo($modid);

    if ($modinfo['state'] != 3) {
        return LogUtil::registerError(__('Module iw_main is needed. You have to install the iw_main module before installing it.', $dom));
    }

    // Check if the version needed is correct
    $versionNeeded = '2.0';
    if (!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
        return false;
    }

    // create module tables
    $tables = array('IWstats', 'IWstats_summary');
    foreach ($tables as $table) {
        if (!DBUtil::createTable($table)) {
            return false;
        }
    }

    // create several indexes for IWstats table
    $table = pnDBGetTables();
    $c = $table['IWstats_column'];
    if (!DBUtil::createIndex($c['moduleid'], 'IWstats', 'moduleid'))
        return false;
    if (!DBUtil::createIndex($c['uid'], 'IWstats', 'uid'))
        return false;
    if (!DBUtil::createIndex($c['ip'], 'IWstats', 'ip'))
        return false;
    if (!DBUtil::createIndex($c['isadmin'], 'IWstats', 'isadmin'))
        return false;

    // Set up config variables
    //pnModSetVar('IWstats', 'excludeusers', '');
    // create the system init hook
    if (!pnModRegisterHook('zikula', 'systeminit', 'API', 'IWstats', 'user', 'collect')) {
        return LogUtil::registerError(__('unable to create system init hook', $dom));
    }
    pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'IWstats'));
    LogUtil::registerStatus(__('Stats have been enabled, you can change this in the hook settings (Administration -> Modules -> System hooks) by deactivating the Stats systeminit hook for Zikula itself', $dom));


    // Initialisation successful
    return true;
}

/**
 * upgrade
 *
 * @todo recode using DBUtil
 */
function IWstats_upgrade($oldversion) {
    switch ($oldversion) {
        case '0.1':
            if (!DBUtil::createTable('IWstats_summary'))
                return false;
    }
    // Update successful
    return true;
}

/**
 * delete the comments module
 *
 */
function IWstats_delete() {
    // drop tables
    $tables = array('IWstats');
    foreach ($tables as $table) {
        if (!DBUtil::dropTable($table)) {
            return false;
        }
    }

    // delete the system init hook
    if (!pnModUnregisterHook('zikula', 'systeminit', 'API', 'IWstats', 'user', 'collect')) {
        return LogUtil::registerError(__('unable to delete system init hook', $dom));
    }

    // Deletion successful
    return true;
}
