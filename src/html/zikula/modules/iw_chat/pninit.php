<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Forums
 */

/**
 * Initialise the iw_forums module creating module tables and module vars
 * @author Fèlix Casanellas (fcasanel@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_chat_init()
{
	$dom = ZLanguage::getModuleDomain('iw_chat');
	
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '2.0';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}
	
	// Create module tables
	if (!DBUtil::createTable('iw_chat_rooms')) return false;
	//if (!DBUtil::createTable('iw_chat_msg')) return false;
	
	// Module variables
	pnModSetVar ('iw_chat', 'delay', 2000);
    pnModSetVar ('iw_chat', 'max_len', 512);
    pnModSetVar ('iw_chat', 'theme', 'default');
    pnModSetVar ('iw_chat', 'private_dir', '');
    pnModSetVar ('iw_chat', 'sound', '0');
	
	
	//Initialation successfull
  	return true;
}

/**
 * Delete the iw_forums module
 * @author Fèlix Casanellas (fcasanel@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_chat_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_chat_rooms');
	DBUtil::dropTable('iw_chat_msg');
	
	// Module variables
	pnModDelVar ('iw_chat', 'delay');
    pnModDelVar ('iw_chat', 'max_len');
    pnModDelVar ('iw_chat', 'theme');
    pnModDelVar ('iw_chat', 'private_dir');
    pnModDelVar ('iw_chat', 'sound');
    
    pnModFunc('iw_chat', 'admin', 'clear', array('key' => 'cache'));
    pnModFunc('iw_chat', 'admin', 'clear', array('key' => 'log'));

	//success
	return true;
}

/**
 * Update the iw_forums module
 * @author Fèlix Casanellas (fcasanel@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_chat_upgrade($oldversion)
{
	//success
	return true;
}
