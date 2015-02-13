<?php

/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Noteboard
 */

/**
 * Initialise the IWmessages module creating module tables and module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
class IWmessages_Installer extends Zikula_AbstractInstaller {

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
        if (!DBUtil::createTable('IWmessages'))
            return false;

        //Create indexes
        $pntable = DBUtil::getTables();
        $c = $pntable['IWmessages_column'];
        if (!DBUtil::createIndex($c['from_userid'], 'IWmessages', 'from_userid'))
            return false;
        if (!DBUtil::createIndex($c['to_userid'], 'IWmessages', 'to_userid'))
            return false;

        //Set module vars
        $this->setVar('groupsCanUpdate', '$')
                ->setVar('uploadFolder', 'messages')
                ->setVar('multiMail', '$')
                ->setVar('limitInBox', '50')
                ->setVar('limitOutBox', '50')
                ->setVar('dissableSuggest', '0')
                ->setVar('smiliesActive', '1');
		HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
        return true;
    }

    /**
     * Delete the IWmessages module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Jaume Fernàndez Valiente (jfern343@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete module table
        DBUtil::dropTable('IWmessages');

        //Delete module vars
        $this->delVar('IWmessages', 'groupsCanUpdate')
                ->delVar('uploadFolder')
                ->delVar('multiMail')
                ->delVar('limitInBox')
                ->delVar('limitOutBox')
                ->delVar('dissableSuggest')
                ->delVar('smiliesActive');

        //Deletion successfull
HookUtil::unregisterSubscriberBundles($this->version->getHookSubscriberBundles());
        return true;
    }

    /**
     * Update the IWmessages module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Jaume Fernàndez Valiente (jfern343@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {

		switch ($oldversion) {
			case($oldversion < '3.0.0'):
        		//Array of names
        		$oldVarsNames = DBUtil::selectFieldArray("module_vars", 'name', "`modname` = 'IWmessages'", '', false, '');
        		$newVarsNames = Array('groupsCanUpdate', 'uploadFolder', 'multiMail', 'limitInBox',
            		'limitOutBox', 'dissableSuggest', 'smiliesActive');
        		$newVars = Array('groupsCanUpdate' => '$',
            		'uploadFolder' => 'messages',
            		'multiMail' => '$',
            		'limitInBox' => '50',
            		'limitOutBox' => '50',
            		'dissableSuggest' => '0',
            		'smiliesActive' => '1');
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
		}
        return true;
    }

}
