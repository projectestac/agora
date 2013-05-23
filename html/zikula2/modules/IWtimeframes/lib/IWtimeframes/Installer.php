<?php
class IWtimeframes_Installer extends Zikula_AbstractInstaller {
    /**
     * Initialise the IWTimeFrames module creating module tables and module vars
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function install() {
        // Create module tables
        if (!DBUtil::createTable('IWtimeframes')) return false;
        if (!DBUtil::createTable('IWtimeframes_definition')) return false;

        //Create module vars
        $this->setVar('frames', '10'); //franges horàries
        //Initialation successfull
        return true;
    }

    /**
     * Delete the IWTimeFrames module & update existing bookings references
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete module table
        DBUtil::dropTable('IWtimeframes');
        DBUtil::dropTable('IWtimeframes_definition');

        // Totes les referències als marcs s'han d'esborrar a IWbookings_spaces
        // 1r. mirar si existeix el mòdul i després actualitzar els registres

        $modid = ModUtil::getIdFromName('IWbookings');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] > 1) {
            $obj = array('mdid' => 0);
            DBUtil::updateObject($obj, 'IWbookings_spaces', 'mdid != 0');
        }

        //Delete module vars
        $this->delVar('frames');

        //Deletion successfull
        return true;
    }

    public function upgrade($oldversion) {
        //Upgrade successfull
        return true;
    }
}