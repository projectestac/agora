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
 * Initialise the iw_noteboard module creating module tables and module vars
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_noteboard_init()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.3';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create module tables
	if (!DBUtil::createTable('iw_noteboard')) return false;
	if (!DBUtil::createTable('iw_noteboard_topics')) return false;
	if (!DBUtil::createTable('iw_noteboard_public')) return false;
	
	//Create module vars
	pnModSetVar('iw_noteboard', 'grups', '');
	pnModSetVar('iw_noteboard', 'permisos', '');
	pnModSetVar('iw_noteboard', 'marcat', '');
	pnModSetVar('iw_noteboard', 'verifica', '');
	pnModSetVar('iw_noteboard', 'caducitat', '30');
	pnModSetVar('iw_noteboard', 'repperdefecte', '1');
	pnModSetVar('iw_noteboard', 'colorrow1', '#FFFFFF');
	pnModSetVar('iw_noteboard', 'colorrow2', '#FFFFCC');
	pnModSetVar('iw_noteboard', 'colornewrow1', '#FFCC99');
	pnModSetVar('iw_noteboard', 'colornewrow2', '#99FFFF');
	pnModSetVar('iw_noteboard', 'attached','noteboard');
	pnModSetVar('iw_noteboard', 'notRegisteredSeeRedactors','1');
	pnModSetVar('iw_noteboard', 'multiLanguage','0');
	pnModSetVar('iw_noteboard', 'public','0');
	pnModSetVar('iw_noteboard', 'topicsSystem','0');
	pnModSetVar('iw_noteboard', 'publicSharedURL','');
	pnModSetVar('iw_noteboard', 'showSharedURL','1');
	pnModSetVar('iw_noteboard', 'sharedName', pnModGetVar('/PNConfig','sitename'));
	pnModSetVar('iw_noteboard', 'editPrintAfter','-1');

	//Initialation successfull
  	return true;
}

/**
 * Delete the iw_noteboard module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_noteboard_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_noteboard');
	DBUtil::dropTable('iw_noteboard_topics');
	DBUtil::dropTable('iw_noteboard_public');

	//Delete module vars
	pnModDelVar('iw_noteboard', 'grups');
	pnModDelVar('iw_noteboard', 'permisos');
	pnModDelVar('iw_noteboard', 'marcat');
	pnModDelVar('iw_noteboard', 'verifica');
	pnModDelVar('iw_noteboard', 'caducitat');
	pnModDelVar('iw_noteboard', 'repperdefecte');
	pnModDelVar('iw_noteboard', 'colorrow1');
	pnModDelVar('iw_noteboard', 'colorrow2');
	pnModDelVar('iw_noteboard', 'colornewrow1');
	pnModDelVar('iw_noteboard', 'colornewrow2');
	pnModDelVar('iw_noteboard', 'attached');
	pnModDelVar('iw_noteboard', 'notRegisteredSeeRedactors');
	pnModDelVar('iw_noteboard', 'multiLanguage');
	pnModDelVar('iw_noteboard', 'public');
	pnModDelVar('iw_noteboard', 'topicsSystem');
	pnModDelVar('iw_noteboard', 'publicSharedURL');
	pnModDelVar('iw_noteboard', 'showSharedURL');
	pnModDelVar('iw_noteboard', 'sharedName');
	pnModDelVar('iw_noteboard', 'editPrintAfter');
	
	//Deletion successfull
	return true;
}

/**
 * Update the iw_noteboard module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_noteboard_upgrade($oldversion)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.3';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	if (!DBUtil::changeTable('iw_noteboard')) return false;

	if($oldversion < '1.2'){
		if (!DBUtil::createTable('iw_noteboard_public')) return false;

		pnModSetVar('iw_noteboard', 'multiLanguage','0');
		pnModSetVar('iw_noteboard', 'public','0');
		pnModSetVar('iw_noteboard', 'topicsSystem','0');
		pnModSetVar('iw_noteboard', 'publicSharedURL','');
		pnModSetVar('iw_noteboard', 'showSharedURL','1');
		pnModSetVar('iw_noteboard', 'sharedName', pnModGetVar('/PNConfig','sitename'));
	}

	if($oldversion < '1.3'){
		if (!DBUtil::renameTable('iw_noteboard_themes','iw_noteboard_topics')) return false;
	}

	return true;
}
