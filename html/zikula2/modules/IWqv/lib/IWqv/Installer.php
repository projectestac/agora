<?php

class IWqv_Installer extends Zikula_AbstractInstaller {

    public function install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('The modul IWmain must be installed. Install it, for install this modul.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '2.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Create module tables
        if (!DBUtil::createTable('IWqv'))
            return false;
        if (!DBUtil::createTable('IWqv_assignments'))
            return false;
        if (!DBUtil::createTable('IWqv_sections'))
            return false;
        if (!DBUtil::createTable('IWqv_messages'))
            return false;
        if (!DBUtil::createTable('IWqv_messages_read'))
            return false;

        //Create module vars
        ModUtil::setVar('IWqv', 'skins', 'default,infantil,formal');
        ModUtil::setVar('IWqv', 'langs', 'ca,es,en');
        ModUtil::setVar('IWqv', 'maxdelivers', '-1,1,2,3,4,5,10');
        ModUtil::setVar('IWqv', 'basedisturl', 'http://clic.xtec.cat/qv_viewer/dist/html/');

        //Initialization successfull 
        return true;
    }

    /**
     * Delete the IWqv module
     * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete module table
        DBUtil::dropTable('IWqv');
        DBUtil::dropTable('IWqv_assignments');
        DBUtil::dropTable('IWqv_sections');
        DBUtil::dropTable('IWqv_messages');
        DBUtil::dropTable('IWqv_messages_read');

        //Delete module vars
        //ModUtil::delVar('IWqv', 'varname');
        //Deletion successfull
        return true;
    }

    /**
     * Update the IWqv module
     * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {
        if (!DBUtil::changeTable('IWqv'))
            return false;

        return true;
    }

}