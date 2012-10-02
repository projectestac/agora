<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage QV (Quaderns Virtuals)
 */

/**
 * Initialise the iw_qv module creating module tables and module vars
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_qv_init()
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('The modul iw_main must be installed. Install it, for install this modul.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.3';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create module tables
	if (!DBUtil::createTable('iw_qv')) return false;
	if (!DBUtil::createTable('iw_qv_assignments')) return false;
	if (!DBUtil::createTable('iw_qv_sections')) return false;
	if (!DBUtil::createTable('iw_qv_messages')) return false;
	if (!DBUtil::createTable('iw_qv_messages_read')) return false;
	
	//Create module vars
	pnModSetVar('iw_qv', 'skins', 'default,infantil,formal');
	pnModSetVar('iw_qv', 'langs', 'ca,es,en');
	pnModSetVar('iw_qv', 'maxdelivers', '-1,1,2,3,4,5,10');
	pnModSetVar('iw_qv', 'basedisturl', 'http://clic.xtec.cat/qv_viewer/dist/html/');

	//Initialization successfull 
  	return true;
}

/**
 * Delete the iw_qv module
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_qv_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_qv');
	DBUtil::dropTable('iw_qv_assignments');
	DBUtil::dropTable('iw_qv_sections');
	DBUtil::dropTable('iw_qv_messages');
	DBUtil::dropTable('iw_qv_messages_read');

	//Delete module vars
	//pnModDelVar('iw_qv', 'varname');


	//Deletion successfull
	return true;
}

/**
 * Update the iw_qv module
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_qv_upgrade($oldversion)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('The modul iw_main must be installed. Install it, for install this modul.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.3';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	if (!DBUtil::changeTable('iw_qv')) return false;

	return true;
}
