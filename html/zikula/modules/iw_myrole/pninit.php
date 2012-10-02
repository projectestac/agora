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
 * Initialise the iw_myrole module creating module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_myrole_init()
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state'] != 3){
		return LogUtil::registerError (__('Module iw_main is required. You have to install the iw_main module previously to install it.',$dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.0';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}
	
	// Name of the initial group
	$name = "changingRole";

	// The API function is called.
	$check = pnModAPIFunc('Groups', 'admin', 'getgidbyname', array('name' => $name));

	if ($check != false) {
		// Group already exists
		// LogUtil::registerError (_GROUPS_ALREADYEXISTS);
		$gid = $check;
	} else {
		// Falta mirar si existeix
		$gid = pnModAPIFunc('Groups', 'admin', 'create', array('name' => $name,
								                                  'gtype' => 0,
								                                  'state' => 0,
								                                  'nbumax'  => 0,
								                                  'description' => __('Initial group of users that can change the role',$dom)));
		// Success
		($gid)?LogUtil::registerStatus (pnML('_CREATEITEMSUCCEDED', array('i' => $name))):"";

	}

	// The return value of the function is checked here
	if ($gid != false) {
		pnModSetVar( 'iw_myrole', 'rolegroup', $gid);
		// Gets the first sequence number of permissions list
		$pos = DBUtil::selectFieldMax( 'group_perms', 'sequence', 'MIN');
		// SET MODULE AND BLOCK PERMISSIONS
		// insert permission myrole:: :: administration in second place
		pnModAPIFunc('permissions','admin', 'create', array('realm' => 0,
															'id' => $gid,
															'component' => 'iw_myrole::',
															'instance' => '::' ,
															'level' => '800',
															'insseq' => $pos + 1 ));	
	}

	pnModSetVar( 'iw_myrole', 'groupsNotChangeable', '');

	//Initialation successfull
  	return true;
}

/**
 * Delete the iw_noteboard module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_myrole_delete()
{
	//Deletion successfull
	// Esborrar el permís iw_myrole
    $pntables = pnDBGetTables();	
    $column   = $pntables['group_perms_column'];

	$where = "WHERE $column[component] LIKE 'iw_myrole%' AND $column[gid] = ".pnModGetVar('iw_myrole', 'rolegroup');
	$result = DBUtil::DeleteWhere('group_perms', $where);

	pnModDelVar('my_role', 'rolegroup');
	pnModDelVar( 'iw_myrole', 'groupsNotChangeable');

	return true;
}

/**
 * Update the iw_noteboard module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_myrole_upgrade($oldversion)
{
	return true;
}
