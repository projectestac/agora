<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Agendas
 */
/**
 * Initialise the iw_agendas module creating module tables and module vars
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_agendas_init()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	if($modinfo['state']!=3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	// Check if the version needed is correct
	$versionNeeded = '1.4';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}
	// Create module tables
	if (!DBUtil::createTable('iw_agendas')) return false;
	if (!DBUtil::createTable('iw_agendas_def')) return false;
	if (!DBUtil::createTable('iw_agendas_subs')) return false;
	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	if (!DBUtil::createIndex($c['usuari'],'iw_agendas', 'usuari')) return false;
	if (!DBUtil::createIndex($c['data'],'iw_agendas', 'data')) return false;
	if (!DBUtil::createIndex($c['rid'],'iw_agendas', 'rid')) return false;
	if (!DBUtil::createIndex($c['daid'],'iw_agendas', 'daid')) return false;
	if (!DBUtil::createIndex($c['origenid'],'iw_agendas', 'origenid')) return false;
	if (!DBUtil::createIndex($c['gCalendarEventId'],'iw_agendas', 'gCalendarEventId')) return false;
	$c = $pntable['iw_agendas_def_column'];
	if (!DBUtil::createIndex($c['gCalendarId'],'iw_agendas_def', 'gCalendarId')) return false;
	//Set module vars
	pnModSetVar('iw_agendas', 'inicicurs', date('Y'));
	pnModSetVar('iw_agendas', 'calendariescolar', 0);
	pnModSetVar('iw_agendas', 'comentaris', '');
	pnModSetVar('iw_agendas', 'festiussempre', '');
	pnModSetVar('iw_agendas', 'altresfestius', '');
	pnModSetVar('iw_agendas', 'informacions', '');
	pnModSetVar('iw_agendas', 'periodes', '');
	pnModSetVar('iw_agendas', 'llegenda', 0);
	pnModSetVar('iw_agendas', 'infos', 0);
	pnModSetVar('iw_agendas', 'vista', -1);
	pnModSetVar('iw_agendas', 'colors', 'DBD4A6|555555|FFCC66|FFFFFF|E1EBFF|669ACC|FFFFFF|FFFFFF|FF8484|FFFFFF|DBD4A6|66FF66|3F6F3E|FFFFCC|BBBBBB|000000');
	pnModSetVar('iw_agendas', 'maxnotes', '300');
	pnModSetVar('iw_agendas', 'adjuntspersonals', '0');
	pnModSetVar('iw_agendas', 'caducadies', '30');
	pnModSetVar('iw_agendas', 'urladjunts', 'agendas');
	pnModSetVar('iw_agendas', 'msgUsersRespDefault', __('You has been added to a new agenda as moderator. You can access the agenda throught the main menu. <br><br>The administrator', $dom));
	pnModSetVar('iw_agendas', 'msgUsersDefault', __('You has been added to a new agenda. You can access the agenda throught the main menu. <br><br>The administrator', $dom));
	pnModSetVar('iw_agendas','allowGCalendar','0');
	//Successfull
	return true;
}

/**
 * Delete the iw_agendas module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_agendas_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_agendas');
	DBUtil::dropTable('iw_agendas_def');
	DBUtil::dropTable('iw_agendas_subs');
	//Delete module vars
	pnModDelVar('iw_agendas', 'inicicurs');
	pnModDelVar('iw_agendas', 'calendariescolar');
	pnModDelVar('iw_agendas', 'comentaris');
	pnModDelVar('iw_agendas', 'festiussempre');
	pnModDelVar('iw_agendas', 'altresfestius');
	pnModDelVar('iw_agendas', 'informacions');
	pnModDelVar('iw_agendas', 'periodes');
	pnModDelVar('iw_agendas', 'llegenda');
	pnModDelVar('iw_agendas', 'infos');
	pnModDelVar('iw_agendas', 'vista');
	pnModDelVar('iw_agendas', 'colors');
	pnModDelVar('iw_agendas', 'maxnotes');
	pnModDelVar('iw_agendas','adjuntspersonals');
	pnModDelVar('iw_agendas','caducadies');
	pnModDelVar('iw_agendas','urladjunts');
	pnModDelVar('iw_agendas','msgUsersRespDefault');
	pnModDelVar('iw_agendas','msgUsersDefault');
	pnModDelVar('iw_agendas','allowGCalendar');
	//Deletion successfull
	return true;
}

function iw_agendas_upgrade($oldversion)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	/*
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	if($modinfo['state']!=3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	// Check if the version needed is correct
	$versionNeeded = '1.4';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}
	*/
	if (!DBUtil::changeTable('iw_agendas_def')) return false;
	if (!DBUtil::changeTable('iw_agendas')) return false;
	if($oldversion < 1.3){
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_agendas_column'];
		if (!DBUtil::createIndex($c['usuari'],'iw_agendas', 'usuari')) return false;
		if (!DBUtil::createIndex($c['data'],'iw_agendas', 'data')) return false;
		if (!DBUtil::createIndex($c['rid'],'iw_agendas', 'rid')) return false;
		if (!DBUtil::createIndex($c['daid'],'iw_agendas', 'daid')) return false;
		if (!DBUtil::createIndex($c['origenid'],'iw_agendas', 'origenid')) return false;
	}
	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	DBUtil::createIndex($c['gCalendarEventId'],'iw_agendas', 'gCalendarEventId');
	$c = $pntable['iw_agendas_def_column'];
	DBUtil::createIndex($c['gCalendarId'],'iw_agendas_def', 'gCalendarId');
	pnModSetVar('iw_agendas','allowGCalendar','0');
	// Update successful
	return true;
}