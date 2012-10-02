<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage JClic
 */

/**
 * Initialise the iw_jclic module creating module tables and module vars
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_jclic_init()
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state']!=3){
		return LogUtil::registerError (__('Iw_main module must be installed. Install it to install this module.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.1';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create module tables
	if (!DBUtil::createTable('iw_jclic')) return false;
	if (!DBUtil::createTable('iw_jclic_activities')) return false;
	if (!DBUtil::createTable('iw_jclic_groups')) return false;
	if (!DBUtil::createTable('iw_jclic_sessions')) return false;
	if (!DBUtil::createTable('iw_jclic_users')) return false;
	if (!DBUtil::createTable('iw_jclic_settings')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_jclic_column'];
	if (!DBUtil::createIndex($c['user'],'iw_jclic', 'user')) return false;

	$c = $pntable['iw_jclic_activities_column'];
	if (!DBUtil::createIndex($c['session_id'],'iw_jclic_activities', 'session_id')) return false;

	$c = $pntable['iw_jclic_groups_column'];
	if (!DBUtil::createIndex($c['jid'],'iw_jclic_groups', 'jid')) return false;

	$c = $pntable['iw_jclic_sessions_column'];
	if (!DBUtil::createIndex($c['jclicid'],'iw_jclic_sessions', 'jclicid')) return false;
	if (!DBUtil::createIndex($c['session_id'],'iw_jclic_sessions', 'session_id')) return false;
	if (!DBUtil::createIndex($c['user_id'],'iw_jclic_sessions', 'user_id')) return false;

	$c = $pntable['iw_jclic_settings_column'];
	if (!DBUtil::createIndex($c['setting_key'],'iw_jclic_settings', 'setting_key')) return false;

	$c = $pntable['iw_jclic_users_column'];
	if (!DBUtil::createIndex($c['jid'],'iw_jclic_users', 'jid')) return false;
	
	
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));

	$groupsProAssign  = '$';
	
	foreach($groups as $group){
		$groupsProAssign .= '$'.$group['id'].'$';
	}
	
	//Set module vars
	pnModSetVar('iw_jclic', 'timeLap', '5');
	pnModSetVar('iw_jclic', 'jclicJarBase', 'http://clic.xtec.cat/dist/jclic');
	pnModSetVar('iw_jclic', 'jclicUpdatedFiles', 'jclic');
	pnModSetVar('iw_jclic', 'groupsProAssign', $groupsProAssign);

	//Insert default values in settings table
	$items = array(array('key' => 'ALLOW_CREATE_GROUPS',
							'value' => 'false'),
					array('key' => 'ALLOW_CREATE_USERS',
							'value' => 'false'),
					array('key' => 'SHOW_GROUP_LIST',
							'value' => 'false'),
					array('key' => 'SHOW_USER_LIST',
							'value' => 'false'),
					array('key' => 'USER_TABLES',
							'value' => 'true'),
					array('key' => 'TIME_LAP',
							'value' => '10'));

	foreach($items as $item){
		$itemsToInsert = array('setting_key' => $item['key'],
								'setting_value' => $item['value']);
		if (!DBUtil::insertObject($itemsToInsert, 'iw_jclic_settings', 'jsid')) {
			return false;
		}
	}

	//Successfull
	return true;
}

/**
 * Delete the iw_jclic module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_jclic_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_jclic');
	DBUtil::dropTable('iw_jclic_activities');
	DBUtil::dropTable('iw_jclic_groups');
	DBUtil::dropTable('iw_jclic_sessions');
	DBUtil::dropTable('iw_jclic_users');
	DBUtil::dropTable('iw_jclic_settings');
	
	//Delete module vars
	pnModDelVar('iw_jclic', 'timeLap');
	pnModDelVar('iw_jclic', 'jclicJarBase');
	pnModDelVar('iw_jclic', 'jclicUpdatedFiles');
	pnModDelVar('iw_jclic', 'groupsProAssign');
	
	//Deletion successfull
	return true;
}

function iw_jclic_upgrade($oldversion)
{
	if ($oldversion < 1.1) {
		if (!DBUtil::changeTable('iw_jclic')) return false;
		if (!DBUtil::changeTable('iw_jclic_activities')) return false;
		if (!DBUtil::changeTable('iw_jclic_groups')) return false;
		if (!DBUtil::changeTable('iw_jclic_sessions')) return false;
		if (!DBUtil::changeTable('iw_jclic_users')) return false;
		if (!DBUtil::changeTable('iw_jclic_settings')) return false;
	
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_jclic_column'];
		if (!DBUtil::createIndex($c['user'],'iw_jclic', 'user')) return false;
	
		$c = $pntable['iw_jclic_activities_column'];
		if (!DBUtil::createIndex($c['session_id'],'iw_jclic_activities', 'session_id')) return false;
	
		$c = $pntable['iw_jclic_groups_column'];
		if (!DBUtil::createIndex($c['jid'],'iw_jclic_groups', 'jid')) return false;
	
		$c = $pntable['iw_jclic_sessions_column'];
		if (!DBUtil::createIndex($c['jclicid'],'iw_jclic_sessions', 'jclicid')) return false;
		if (!DBUtil::createIndex($c['session_id'],'iw_jclic_sessions', 'session_id')) return false;
		if (!DBUtil::createIndex($c['user_id'],'iw_jclic_sessions', 'user_id')) return false;
	
		$c = $pntable['iw_jclic_settings_column'];
		if (!DBUtil::createIndex($c['setting_key'],'iw_jclic_settings', 'setting_key')) return false;
	
		$c = $pntable['iw_jclic_users_column'];
		if (!DBUtil::createIndex($c['jid'],'iw_jclic_users', 'jid')) return false;
	}
	
	// Update successful
	return true;
}
