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
        $this->setVar('moodleurl', '../moodle2')
                ->setVar('newwindow', 1)
                ->setVar('guestuser', 'guest')
                ->setVar('dbprefix', 'm2')
                ->setVar('dfl_description', 'User description')
                ->setVar('dfl_language', 'en_utf8')
                ->setVar('dfl_country', 'ES')
                ->setVar('dfl_city', 'City name')
                ->setVar('dfl_gtm', '99');
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
        $this->delVar('moodleurl')
                ->delVar('newwindow')
                ->delVar('guestuser')
                ->delVar('dbprefix')
                ->delVar('dfl_description')
                ->delVar('dfl_language')
                ->delVar('dfl_country')
                ->delVar('dfl_city')
                ->delVar('dfl_gtm');
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