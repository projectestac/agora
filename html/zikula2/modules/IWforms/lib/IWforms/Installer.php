<?php

class IWforms_Installer extends Zikula_AbstractInstaller {

    /**
     * Initialise the IWforms module creating module tables and module vars
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function Install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module before installing it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '3.0.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Create module tables
        if (!DBUtil::createTable('IWforms_definition'))
            return false;
        if (!DBUtil::createTable('IWforms_cat'))
            return false;
        if (!DBUtil::createTable('IWforms'))
            return false;
        if (!DBUtil::createTable('IWforms_note'))
            return false;
        if (!DBUtil::createTable('IWforms_note_definition'))
            return false;
        if (!DBUtil::createTable('IWforms_validator'))
            return false;
        if (!DBUtil::createTable('IWforms_group'))
            return false;

        //Create indexes
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_definition_column'];
        if (!DBUtil::createIndex($c['active'], 'IWforms_definition', 'active'))
            return false;

        $c = $pntable['IWforms_column'];
        if (!DBUtil::createIndex($c['fid'], 'IWforms', 'fid'))
            return false;

        $c = $pntable['IWforms_group_column'];
        if (!DBUtil::createIndex($c['fid'], 'IWforms_group', 'fid'))
            return false;

        $c = $pntable['IWforms_note_column'];
        if (!DBUtil::createIndex($c['fmid'], 'IWforms_note', 'fmid'))
            return false;
        if (!DBUtil::createIndex($c['fndid'], 'IWforms_note', 'fndid'))
            return false;

        $c = $pntable['IWforms_note_definition_column'];
        if (!DBUtil::createIndex($c['fid'], 'IWforms_note_definition', 'fid'))
            return false;

        $c = $pntable['IWforms_validator_column'];
        if (!DBUtil::createIndex($c['fid'], 'IWforms_validator', 'fid'))
            return false;

        //Set module vars
        $this->setVar('characters', '15')
                ->setVar('resumeview', '0')
                ->setVar('newsColor', '#90EE90')
                ->setVar('viewedColor', '#FFFFFF')
                ->setVar('completedColor', '#D3D3D3')
                ->setVar('validatedColor', '#CC9999')
                ->setVar('fieldsColor', '#ADD8E6')
                ->setVar('contentColor', '#FFFFE0')
                ->setVar('attached', 'forms')
                ->setVar('publicFolder', 'forms/public');

        //Successfull
        return true;
    }

    /**
     * Delete the IWforms module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function Uninstall() {
        // Delete module table
        DBUtil::dropTable('IWforms_definition');
        DBUtil::dropTable('IWforms_cat');
        DBUtil::dropTable('IWforms');
        DBUtil::dropTable('IWforms_note');
        DBUtil::dropTable('IWforms_note_definition');
        DBUtil::dropTable('IWforms_validator');
        DBUtil::dropTable('IWforms_group');

        //Delete module vars
        $this->delVar('characters')
                ->delVar('resumeview')
                ->delVar('newsColor')
                ->delVar('viewedColor')
                ->delVar('completedColor')
                ->delVar('validatedColor')
                ->delVar('fieldsColor')
                ->delVar('contentColor')
                ->delVar('attached')
                ->delVar('publicFolder');

        //Deletion successfull
        return true;
    }

    /**
     * Update the IWforms module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Jaume Fernàndez Valiente (jfern343@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {

        //ADD new fields to tables

        $c = "ALTER TABLE `IWforms_definition` ADD `iw_returnURL` VARCHAR (150) NOT NULL";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        $c = "ALTER TABLE `IWforms_definition` ADD `iw_filesFolder` VARCHAR (25) NOT NULL";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        $c = "ALTER TABLE `IWforms_definition` ADD `iw_lang` VARCHAR (2) NOT NULL DEFAULT 'ca'";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        // Update z_blocs table

        $c = "UPDATE blocks SET bkey = 'Formnote' WHERE bkey = 'formnote'";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        $c = "UPDATE blocks SET bkey = 'Formslist' WHERE bkey = 'formslist'";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        //Array de noms
        $oldVarsNames = DBUtil::selectFieldArray("module_vars", 'name', "`modname` = 'IWforms'", '', false, '');

        $newVarsNames = Array('characters', 'resumeview', 'newsColor', 'viewedColor', 'completedColor',
            'validatedColor', 'fieldsColor', 'contentColor', 'attached', 'publicFolder');

        $newVars = Array('characters' => '15',
            'resumeview' => '0',
            'newsColor' => '#90EE90',
            'viewedColor' => '#FFFFFF',
            'completedColor' => '#D3D3D3',
            'validatedColor' => '#CC9999',
            'fieldsColor' => '#ADD8E6',
            'contentColor' => '#FFFFE0',
            'attached' => 'forms',
            'publicFolder' => 'forms/public');

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