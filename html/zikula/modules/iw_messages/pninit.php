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
 * Initialise the iw_messages module creating module tables and module vars
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_messages_init()
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state']!=3){
		return LogUtil::registerError (__('Module iw_main is needed. You have to install the iw_main module before installing it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.3';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create module tables
	if (!DBUtil::createTable('iw_messages')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_messages_column'];
	if (!DBUtil::createIndex($c['from_userid'],'iw_messages', 'from_userid')) return false;
	if (!DBUtil::createIndex($c['to_userid'],'iw_messages', 'to_userid')) return false;
	
	// activate the bbsmile hook for this module if the module is present
	if (pnModAvailable('pn_bbsmile')) {
		pnModAPIFunc('Modules', 'admin', 'enablehooks', 
		             array('callermodname' => 'iw_messages', 
				           'hookmodname' => 'pn_bbsmile'));
	}
	if (pnModAvailable('pn_bbcode')) {
		pnModAPIFunc('Modules', 'admin', 'enablehooks', 
		             array('callermodname' => 'iw_messages', 
				           'hookmodname' => 'pn_bbcode'));
	}

    	//Set module vars
	pnModSetVar('iw_messages','groupsCanUpdate','$');
	pnModSetVar('iw_messages','uploadFolder','messages');
	pnModSetVar('iw_messages','multiMail','$');
	pnModSetVar('iw_messages','limitInBox','50');
	pnModSetVar('iw_messages','limitOutBox','50');

  	return true;
}

/**
 * Delete the iw_messages module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_messages_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_messages');

	//Delete module vars
	pnModDelVar('iw_messages','groupsCanUpdate');
	pnModDelVar('iw_messages','uploadFolder');
	pnModDelVar('iw_messages','multiMail');
	pnModDelVar('iw_messages','limitInBox');
	pnModDelVar('iw_messages','limitOutBox');

	//Deletion successfull
	return true;
}

/**
 * Update the iw_messages module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_messages_upgrade($oldversion)
{
	if (!DBUtil::changeTable('iw_messages')) return false;

	if($oldversion < 1.3){
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_messages_column'];
		if (!DBUtil::createIndex($c['from_userid'],'iw_messages', 'from_userid')) return false;
		if (!DBUtil::createIndex($c['to_userid'],'iw_messages', 'to_userid')) return false;
	}
	return true;
}
