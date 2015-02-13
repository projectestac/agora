<?php

class IWnoteboard_Installer extends Zikula_AbstractInstaller {

    /**
     * Initialise the IWnoteboard module creating module tables and module vars
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function Install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is required. You have to install the IWmain module previously to install it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '3.0.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Create module tables
        if (!DBUtil::createTable('IWnoteboard'))
            return false;
        if (!DBUtil::createTable('IWnoteboard_topics'))
            return false;

        //Create module vars
        $this->setVar('grups', '')
                ->setVar('permisos', '')
                ->setVar('marcat', '')
                ->setVar('verifica', '')
                ->setVar('caducitat', '30')
                ->setVar('repperdefecte', '1')
                ->setVar('colorrow1', '#FFFFFF')
                ->setVar('colorrow2', '#FFFFCC')
                ->setVar('colornewrow1', '#FFCC99')
                ->setVar('colornewrow2', '#99FFFF')
                ->setVar('attached', 'noteboard')
                ->setVar('notRegisteredSeeRedactors', '1')
                ->setVar('multiLanguage', '0')
                ->setVar('topicsSystem', '0')
                ->setVar('shipHeadersLines', '0')
                ->setVar('notifyNewEntriesByMail', '0')
                ->setVar('editPrintAfter', '-1')
                ->setVar('notifyNewCommentsByMail', '1')
                ->setVar('commentCheckedByDefault', '1')
                ->setVar('smallAvatar', '0');

		HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());

        //Initialation successfull
        return true;
    }

    /**
     * Delete the IWnoteboard module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function Uninstall() {
        // Delete module table
        DBUtil::dropTable('IWnoteboard');
        DBUtil::dropTable('IWnoteboard_topics');

        //Delete module vars
        $this->delVar('grups')
                ->delVar('permisos')
                ->delVar('marcat')
                ->delVar('verifica')
                ->delVar('caducitat')
                ->delVar('repperdefecte')
                ->delVar('colorrow1')
                ->delVar('colorrow2')
                ->delVar('colornewrow1')
                ->delVar('colornewrow2')
                ->delVar('attached')
                ->delVar('notRegisteredSeeRedactors')
                ->delVar('multiLanguage')
                ->delVar('topicsSystem')
                ->delVar('shipHeadersLines')
                ->delVar('notifyNewEntriesByMail')
                ->delVar('editPrintAfter')
                ->delVar('notifyNewCommentsByMail')
                ->delVar('commentCheckedByDefault')
                ->delVar('smallAvatar');

		HookUtil::unregisterSubscriberBundles($this->version->getHookSubscriberBundles());

        //Deletion successfull
        return true;
    }

    /**
     * Update the IWnoteboard module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Jaume Fernàndez Valiente (jfern343@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {

	switch ($oldversion) {
		case($oldversion < '3.0.0'):
        // Delete unneded columns
        $c = array();
        $c[] = "ALTER TABLE `IWnoteboard` DROP `iw_public` ";
        $c[] = "ALTER TABLE `IWnoteboard` DROP `iw_sharedFrom` ";
        $c[] = "ALTER TABLE `IWnoteboard` DROP `iw_sharedId` ";
        foreach ($c as $sql) {
            DBUtil::executeSQL($sql);
        }

        // Update z_blocs table
        $c = "UPDATE blocks SET bkey = 'Nbheadlines' WHERE bkey = 'nbheadlines'";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        $c = "UPDATE blocks SET bkey = 'Nbtopics' WHERE bkey = 'nbtopics'";
        if (!DBUtil::executeSQL($c)) {
            return false;
        }

        //Array de noms
        $oldVarsNames = DBUtil::selectFieldArray("module_vars", 'name', "`modname` = 'IWnoteboard'", '', false, '');


        $newVarsNames = Array('grups', 'permisos', 'marcat', 'verifica', 'caducitat', 'repperdefecte', 'colorrow1',
            'colorrow2', 'colornewrow1', 'colornewrow2', 'attached', 'notRegisteredSeeRedactors', 'multiLanguage',
            'topicsSystem', 'shipHeadersLines', 'notifyNewEntriesByMail', 'editPrintAfter',
            'notifyNewCommentsByMail', 'commentCheckedByDefault', 'smallAvatars');

        $newVars = Array('grups' => '',
            'permisos' => '',
            'marcat' => '',
            'verifica' => '',
            'caducitat' => '30',
            'repperdefecte' => '1',
            'colorrow1' => '#FFFFFF',
            'colorrow2' => '#FFFFCC',
            'colornewrow1' => '#FFCC99',
            'colornewrow2' => '#99FFFF',
            'attached' => 'noteboard',
            'notRegisteredSeeRedactors' => '1',
            'multiLanguage' => '0',
            'topicsSystem' => '0',
            'shipHeadersLines' => '0',
            'notifyNewEntriesByMail' => '0',
            'editPrintAfter' => '-1',
            'notifyNewCommentsByMail' => '1',
            'commentCheckedByDefault' => '1',
            'smallAvatars' => '0');

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
		case '3.0.0':
			HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
		case '3.0.1':
        return true;
	}
    }

}
