<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Forms
 */

/**
 * Initialise the iw_forms module creating module tables and module vars
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_forms_init()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
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

	// Create module tables
	if (!DBUtil::createTable('iw_forms_def')) return false;
	if (!DBUtil::createTable('iw_forms_cat')) return false;
	if (!DBUtil::createTable('iw_forms')) return false;
	if (!DBUtil::createTable('iw_forms_note')) return false;
	if (!DBUtil::createTable('iw_forms_note_def')) return false;
	if (!DBUtil::createTable('iw_forms_validator')) return false;
	if (!DBUtil::createTable('iw_forms_group')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_def_column'];
	if (!DBUtil::createIndex($c['active'],'iw_forms_def', 'active')) return false;
	
	$c = $pntable['iw_forms_column'];
	if (!DBUtil::createIndex($c['fid'],'iw_forms', 'fid')) return false;

	$c = $pntable['iw_forms_group_column'];
	if (!DBUtil::createIndex($c['fid'],'iw_forms_group', 'fid')) return false;	

	$c = $pntable['iw_forms_note_column'];
	if (!DBUtil::createIndex($c['fmid'],'iw_forms_note', 'fmid')) return false;
	if (!DBUtil::createIndex($c['fndid'],'iw_forms_note', 'fndid')) return false;	

	$c = $pntable['iw_forms_note_def_column'];
	if (!DBUtil::createIndex($c['fid'],'iw_forms_note_def', 'fid')) return false;

	$c = $pntable['iw_forms_validator_column'];
	if (!DBUtil::createIndex($c['fid'],'iw_forms_validator', 'fid')) return false;
	
	//Set module vars
	pnModSetVar('iw_forms','characters','15');
	pnModSetVar('iw_forms','resumeview','0');
	pnModSetVar('iw_forms','newsColor','#90EE90');
	pnModSetVar('iw_forms','viewedColor','#FFFFFF');
	pnModSetVar('iw_forms','completedColor','#D3D3D3');
	pnModSetVar('iw_forms','validatedColor','#CC9999');
	pnModSetVar('iw_forms','fieldsColor','#ADD8E6');
	pnModSetVar('iw_forms','contentColor','#FFFFE0');
	pnModSetVar('iw_forms','attached','forms');
	pnModSetVar('iw_forms','publicFolder','documents');

	//Successfull
	return true;
}

/**
 * Delete the iw_forms module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_forms_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_forms_def');
	DBUtil::dropTable('iw_forms_cat');
	DBUtil::dropTable('iw_forms');
	DBUtil::dropTable('iw_forms_note');
	DBUtil::dropTable('iw_forms_note_def');
	DBUtil::dropTable('iw_forms_validator');
	DBUtil::dropTable('iw_forms_group');

	//Delete module vars
	pnModDelVar('iw_forms','characters');
	pnModDelVar('iw_forms','resumeview');
	pnModDelVar('iw_forms','colornoves');
	pnModDelVar('iw_forms','colorvistes');
	pnModDelVar('iw_forms','colorcompletades');
	pnModDelVar('iw_forms','colornovalidades');
	pnModDelVar('iw_forms','colorfonscamps');
	pnModDelVar('iw_forms','colorfonscontingut');
	pnModDelVar('iw_forms','attached');
	pnModDelVar('iw_forms','publicFolder','documents');
	
	//Deletion successfull
	return true;
}

/**
 * Update the iw_forms module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_forms_upgrade($oldversion)
{
	if (!DBUtil::changeTable('iw_forms_def')) return false;
	if (!DBUtil::changeTable('iw_forms_cat')) return false;
	if (!DBUtil::changeTable('iw_forms')) return false;
	if (!DBUtil::changeTable('iw_forms_note')) return false;
	if (!DBUtil::changeTable('iw_forms_note_def')) return false;
	if (!DBUtil::changeTable('iw_forms_validator')) return false;
	if (!DBUtil::changeTable('iw_forms_group')) return false;
	if($oldversion < '1.2'){
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_forms_def_column'];
		!DBUtil::createIndex($c['active'],'iw_forms_def', 'active');
		$c = $pntable['iw_forms_column'];
		!DBUtil::createIndex($c['fid'],'iw_forms', 'fid');
		$c = $pntable['iw_forms_group_column'];
		!DBUtil::createIndex($c['fid'],'iw_forms_group', 'fid');	
		$c = $pntable['iw_forms_note_column'];
		!DBUtil::createIndex($c['fmid'],'iw_forms_note', 'fmid');
		!DBUtil::createIndex($c['fndid'],'iw_forms_note', 'fndid');	
		$c = $pntable['iw_forms_note_def_column'];
		!DBUtil::createIndex($c['fid'],'iw_forms_note_def', 'fid');
		$c = $pntable['iw_forms_validator_column'];
		!DBUtil::createIndex($c['fid'],'iw_forms_validator', 'fid');
	}
	return true;
}
