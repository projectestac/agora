<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Webbox
 */

/**
 * Initialise the iw_users module creating module tables and module vars
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_users_init()
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	if($modinfo['state']!=3){
		return LogUtil::registerError (__('Module iw_main is needed. You have to install the iw_main module before installing it.', $dom));
	}
	// Check if the version needed is correct
	$versionNeeded = '1.1';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}
	// Create module table
	if (!DBUtil::createTable('iw_users')) return false;
	if (!DBUtil::createTable('iw_users_import')) return false;
	if (!DBUtil::createTable('iw_users_aux')) return false;
	if (!DBUtil::createTable('iw_users_friends')) return false;
	// Create the index
	if (!DBUtil::createIndex('iw_uid', 'iw_users', 'uid')) return false;
	if (!DBUtil::createIndex('iw_uid', 'iw_users_import', 'uid')) return false;
	if (!DBUtil::createIndex('iw_uid', 'iw_users_aux', 'uid')) return false;
	if (!DBUtil::createIndex('iw_uid', 'iw_users_friends', 'uid')) return false;
	if (!DBUtil::createIndex('iw_fid', 'iw_users_friends', 'fid')) return false;
	//Create module vars
	pnModSetVar('iw_main', 'friendsSystemAvailable', 1);
	pnModSetVar('iw_main', 'invisibleGroupsInList', '$');
  	return true;
}

/**
 * Delete the iw_users module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_users_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_users');
	DBUtil::dropTable('iw_users_import');
	DBUtil::dropTable('iw_users_aux');
	DBUtil::dropTable('iw_users_friends');
	//Create module vars
	pnModDelVar('iw_main', 'friendsLabel');
	pnModDelVar('iw_main', 'friendsSystemAvailable');
	pnModDelVar('iw_main', 'invisibleGroupsInList', '$');
	//Deletion successfull
	return true;
}

/**
 * Update the iw_users module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_users_upgrade($oldversion)
{
	if ($oldversion < 1.2) {
		if (!DBUtil::changeTable('iw_users')) return false;
		if (!DBUtil::changeTable('iw_users_import')) return false;
		if (!DBUtil::createTable('iw_users_friends')) return false;
		if (!DBUtil::createIndex('iw_uid', 'iw_users_friends', 'uid')) return false;
		if (!DBUtil::createIndex('iw_fid', 'iw_users_friends', 'fid')) return false;
		//Create module vars
		pnModDelVar('iw_main', 'friendsLabel');
		pnModSetVar('iw_main', 'friendsSystemAvailable', 1);
		pnModSetVar('iw_main', 'invisibleGroupsInList', '$');
	}
	return true;
}