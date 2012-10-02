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
 * Initialise the iw_main module creating module tables and module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
 
function iw_main_init()
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	// Create module table
	if (!DBUtil::createTable('iw_main')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_main_column'];
	if (!DBUtil::createIndex($c['module'],'iw_main', 'module')) return false;
	if (!DBUtil::createIndex($c['name'],'iw_main', 'name')) return false;
	if (!DBUtil::createIndex($c['uid'],'iw_main', 'uid')) return false;
	
	//Create module vars
	pnModSetVar('iw_main', 'url', 'http://phobos.xtec.net/intraweb');
	pnModSetVar('iw_main', 'email', 'intraweb@xtec.cat');
	pnModSetVar('iw_main', 'documentRoot', 'documents');
	pnModSetVar('iw_main', 'extensions', 'odt|ods|odp|zip|pdf|doc|jpg|gif|txt');
	pnModSetVar('iw_main', 'maxsize', '1000000');
	pnModSetVar('iw_main', 'usersvarslife', '60');
	pnModSetVar('iw_main', 'usersPictureFolder', 'photos');
	pnModSetVar('iw_main', 'tempFolder', 'temp');
	pnModSetVar('iw_main', 'cronHeaderText', __('Header text of the cron automatic emails with the new things to see', $dom));
	pnModSetVar('iw_main', 'cronFooterText', __('Footer text of the email', $dom));
	pnModSetVar('iw_main', 'publicFolder', 'public');
	pnModSetVar('iw_main', 'showHideFiles', '0');
	pnModSetVar('iw_main', 'allowUserChangeAvatar', '1');
	pnModSetVar('iw_main', 'avatarChangeValidationNeeded', '1');
	pnModSetVar('iw_main', 'URLBase', pngetbaseurl());
	
  	return true;
}

/**
 * Delete the iw_main module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
 
function iw_main_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_main');

	//Delete module vars
	pnModDelVar('iw_main', 'url');
	pnModDelVar('iw_main', 'email');
	pnModDelVar('iw_main', 'documentRoot');
	pnModDelVar('iw_main', 'extensions');
	pnModDelVar('iw_main', 'maxsize');
	pnModDelVar('iw_main', 'usersvarslife');
	pnModDelVar('iw_main', 'usersPictureFolder');
	pnModDelVar('iw_main', 'tempFolder');
	pnModDelVar('iw_main', 'cronHeaderText');
	pnModDelVar('iw_main', 'cronFooterText');
	pnModDelVar('iw_main', 'publicFolder');
	pnModDelVar('iw_main', 'showHideFiles');
	pnModDelVar('iw_main', 'allowUserChangeAvatar');
	pnModDelVar('iw_main', 'avatarChangeValidationNeeded');
	pnModDelVar('iw_main', 'URLBase');
	
	//Deletion successfull
	return true;
}

/**
 * Update the iw_main module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_main_upgrade($oldversion)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	if (!DBUtil::changeTable('iw_main')) return false;
	
	if($oldversion < 1.0){
		pnModSetVar('iw_main', 'extensions', 'odt|ods|odp|zip|pdf|doc|jpg|gif|txt');
		pnModSetVar('iw_main', 'maxsize', '1000000');
		pnModSetVar('iw_main', 'usersvarslife', '60');
	}
	
	if($oldversion < 1.1){
		pnModSetVar('iw_main', 'cronHeaderText', __('Header text of the cron automatic emails with the new things to see', $dom));
		pnModSetVar('iw_main', 'cronFooterText', __('Footer text of the email', $dom));
		pnModSetVar('iw_main', 'publicFolder', 'public');
		pnModSetVar('iw_main', 'showHideFiles', '0');
	}

	if($oldversion < 1.2){
		pnModDelVar('iw_main', 'attached');
		pnModSetVar('iw_main', 'allowUserChangeAvatar', '1');
		pnModSetVar('iw_main', 'avatarChangeValidationNeeded', '1');
		pnModSetVar('iw_main', 'URLBase', pngetbaseurl());
	}
	
	if($oldversion < 1.3){
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_main_column'];
		if (!DBUtil::createIndex($c['module'],'iw_main', 'module')) return false;
		if (!DBUtil::createIndex($c['name'],'iw_main', 'name')) return false;
		if (!DBUtil::createIndex($c['uid'],'iw_main', 'uid')) return false;
	}
	
	return true;
}
