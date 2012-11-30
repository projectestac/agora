<?php

class IWmoodle_Installer extends Zikula_AbstractInstaller {

    /**
     * initialise the IWmoodle module creating module tables and module vars
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function install() {

        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module before to install it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '2.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }


        // Create module table
        if (!DBUtil::createTable('IWmoodle'))
            return false;

        //Create module vars
        $this->setVar('IWmoodle', 'moodleurl', '../moodle2')
                ->setVar('IWmoodle', 'newwindow', 1)
                ->setVar('IWmoodle', 'guestuser', 'guest')
                ->setVar('IWmoodle', 'dbprefix', 'm2')
                ->setVar('IWmoodle', 'dfl_description', 'User description')
                ->setVar('IWmoodle', 'dfl_language', 'en_utf8')
                ->setVar('IWmoodle', 'dfl_country', 'ES')
                ->setVar('IWmoodle', 'dfl_city', 'City name')
                ->setVar('IWmoodle', 'dfl_gtm', '99');
        return true;
    }

    /**
     * Delete the IWmoodle module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {

        // Delete module table
        DBUtil::dropTable('IWmoodle');

        //Delete module vars
        $this->delVar('IWmoodle', 'moodleurl')
                ->delVar('IWmoodle', 'newwindow')
                ->delVar('IWmoodle', 'guestuser')
                ->delVar('IWmoodle', 'dbprefix')
                ->delVar('IWmoodle', 'dfl_description')
                ->delVar('IWmoodle', 'dfl_language')
                ->delVar('IWmoodle', 'dfl_country')
                ->delVar('IWmoodle', 'dfl_city')
                ->delVar('IWmoodle', 'dfl_gtm');
        return true;
    }

    /**
     * Update the IWmoodle module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {
        return true;
    }

}