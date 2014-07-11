<?php

class IWstats_Installer extends Zikula_AbstractInstaller {

    public function Install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module before installing it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '2.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
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
        $table = DBUtil::getTables();
        $c = $table['IWstats_column'];
        if (!DBUtil::createIndex($c['moduleid'], 'IWstats', 'moduleid')) {
            return false;
        }
        if (!DBUtil::createIndex($c['uid'], 'IWstats', 'uid')) {
            return false;
        }
        if (!DBUtil::createIndex($c['ip'], 'IWstats', 'ip')) {
            return false;
        }
        if (!DBUtil::createIndex($c['ipForward'], 'IWstats', 'ipForward')) {
            return false;
        }
        if (!DBUtil::createIndex($c['ipClient'], 'IWstats', 'ipClient')) {
            return false;
        }
        if (!DBUtil::createIndex($c['userAgent'], 'IWstats', 'userAgent')) {
            return false;
        }
        if (!DBUtil::createIndex($c['isadmin'], 'IWstats', 'isadmin')) {
            return false;
        }

        // Set up config variables
        $this->setVar('skippedIps', '')
                ->setVar('modulesSkipped', '')
                ->setVar('deleteFromDays', 90)
                ->setVar('keepDays', 90);

        // create the system init hook
        EventUtil::registerPersistentModuleHandler('IWstats', 'core.postinit', array('IWstats_Listeners', 'coreinit'));

        // Initialisation successful
        return true;
    }

    /**
     * upgrade
     *
     * @todo recode using DBUtil
     */
    public function Upgrade($oldversion) {

        switch ($oldversion) {
            case '0.2':
                // Create the system init hook (previous versions are for Zikula 1.2)
                EventUtil::registerPersistentModuleHandler('IWstats', 'core.postinit', array('IWstats_Listeners', 'coreinit'));

            case '3.0.0':
                // Add new fields. Stop in case of error
                if (!DBUtil::changeTable('IWstats')) {
                    return false;
                }

                // Create indexes. Don't stop in case of error
                $table = pnDBGetTables();
                $c = $table['IWstats_column'];
                DBUtil::createIndex($c['ipForward'], 'IWstats', 'ipForward');
                DBUtil::createIndex($c['ipClient'], 'IWstats', 'ipClient');
                DBUtil::createIndex($c['userAgent'], 'IWstats', 'userAgent');

                break;
        }

        // Update successful
        return true;
    }

    /**
     * delete the comments module
     *
     */
    public function uninstall() {
        // drop tables
        $tables = array('IWstats', 'IWstats_summary');
        
        foreach ($tables as $table) {
            if (!DBUtil::dropTable($table)) {
                return false;
            }
        }

        // delete config variables
        $this->delVars();

        // delete the system init hook
        EventUtil::unregisterPersistentModuleHandler('IWstats', 'core.postinit', array('IWstats_Listeners', 'coreinit'));

        // Deletion successful
        return true;
    }

}