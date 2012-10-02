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
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_forums_init()
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.1';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create module tables
	if (!DBUtil::createTable('iw_forums_def')) return false;
	if (!DBUtil::createTable('iw_forums_temes')) return false;
	if (!DBUtil::createTable('iw_forums_msg')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forums_msg_column'];
	if (!DBUtil::createIndex($c['idparent'],'iw_forums_msg', 'idparent')) return false;
	if (!DBUtil::createIndex($c['ftid'],'iw_forums_msg', 'ftid')) return false;
	if (!DBUtil::createIndex($c['fid'],'iw_forums_msg', 'fid')) return false;
	
	$c = $pntable['iw_forums_temes_column'];
	if (!DBUtil::createIndex($c['fid'],'iw_forums_temes', 'fid')) return false;
	
	//Create module vars
	pnModSetVar('iw_forums','urladjunts','forums');
	pnModSetVar('iw_forums','avatarsVisible','1');

	//Initialation successfull
  	return true;
}

/**
 * Delete the iw_forums module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_forums_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_forums_def');
	DBUtil::dropTable('iw_forums_temes');
	DBUtil::dropTable('iw_forums_msg');

	//Delete module vars
	pnModDelVar('iw_forums','urladjunts');
	pnModDelVar('iw_forums','avatarsVisible');

	//success
	return true;
}

/**
 * Update the iw_forums module
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_forums_upgrade($oldversion)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!DBUtil::changeTable('iw_forums_temes')) return false;
	if (!DBUtil::changeTable('iw_forums_msg')) return false;
	
	if($oldversion < 1.1){
		$pntable = pnDBGetTables();
		$c = $pntable['iw_forums_temes_column'];
					
		//get all the forums defined
		$items = DBUtil::selectObjectArray('iw_forums_def', '', '', '-1', '-1', 'fid');
	
		//for each forum get the topics
		foreach($items as $item){
			$where = "$c[fid]=$item[fid]";
			$items1 = DBUtil::selectObjectArray('iw_forums_temes', $where, '', '-1', '-1', 'ftid');
			foreach($items1 as $item1){
				//get last message in topic
				$c = $pntable['iw_forums_msg_column'];
			
				$where = "$c[ftid] = $item1[ftid]";
			
				$orderby = "$c[data] desc";
			
				// get the objects from the db
				$items2 = DBUtil::selectObjectArray('iw_forums_msg', $where, $orderby, '0', '1', 'ftid');
			
				//update topic last time and user information
				$c = $pntable['iw_forums_temes_column'];
				
				$where = "$c[ftid]=$item1[ftid]";
			
				$itemsUpdate = array('last_time' => $items2[$item1[ftid]]['data'],
										'last_user' => $items2[$item1[ftid]]['usuari']);
			
				if (!DBUTil::updateObject ($itemsUpdate, 'iw_forums_temes', $where)) {
					return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
				}
			}
		}
	}
	
	if($oldversion < 1.2){
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_forums_msg_column'];
		if (!DBUtil::createIndex($c['idparent'],'iw_forums_msg', 'idparent')) return false;
		if (!DBUtil::createIndex($c['ftid'],'iw_forums_msg', 'ftid')) return false;
		if (!DBUtil::createIndex($c['fid'],'iw_forums_msg', 'fid')) return false;
		
		$c = $pntable['iw_forums_temes_column'];
		if (!DBUtil::createIndex($c['fid'],'iw_forums_temes', 'fid')) return false;
	}
	
	//success
	return true;
}
