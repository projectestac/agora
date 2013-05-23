<?php

class IWwebbox_Installer extends Zikula_AbstractInstaller {

    /**
     * Initialise the IWwebbox module creating module tables and module vars
     * @author Albert Pérez Monfort (intraweb@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function install() {
        // Create module table
        if (!DBUtil::createTable('IWwebbox'))
            return false;

        //Create module vars
        $this->setVar('url', 'http://phobos.xtec.cat/intraweb')
                ->setVar('width', '100')
                ->setVar('height', '600')
                ->setVar('scrolls', '1')
                ->setVar('widthunit', '%');
        return true;
    }

    /**
     * Delete the IWwebbox module
     * @author Albert Pérez Monfort
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete module table
        DBUtil::dropTable('IWwebbox');
        //Delete module vars
        $this->delVar('url')
                ->delVar('width')
                ->delVar('height')
                ->delVar('scrolls')
                ->delVar('widthunit');

        //Deletion successfull
        return true;
    }

    /**
     * Update the IWwebbox module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Jaume Fernàndez Valiente (jfern343@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {

        // Update z_blocs table

        $c = "UPDATE blocks SET bkey = 'Webbox' WHERE bkey = 'webbox'";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        //Array de noms
        $oldVarsNames = DBUtil::selectFieldArray("module_vars", 'name', "`modname` = 'IWwebbox'", '', false, '');

        $newVarsNames = Array('url', 'width', 'height', 'scrolls', 'widthunit');

        $newVars = Array('url' => 'http://phobos.xtec.cat/intraweb',
            'width' => '100',
            'height' => '600',
            'scrolls' => '1',
            'widthunit' => '%');    

        // Delete unneeded vars
        $del = array_diff($oldVarsNames, $newVarsNames);
        foreach ($del as $i) {
            $this->delVar($i);
        }

        // Add new vars
        $add = array_diff($newVarsNames, $oldVarsNames);
        foreach ($add as $i) {
            $this->setVar($i, $newVars[$i]);
        }

        return true;
    }

}