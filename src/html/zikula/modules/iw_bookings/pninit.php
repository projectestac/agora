<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage iw_bookings
 */

/**
 * Initialise the iw_bookings module creating module tables and module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return bool true if successful, false otherwise
 */
 
function iw_bookings_init()
{
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);

	if($modinfo['state'] != 3){
		return LogUtil::registerError (_IWBOOKINGSMAINMODULENEEDED);
	}
	
	// Check if the version needed is correct
	$versionNeeded = '2.0';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create module tables
	if (!DBUtil::createTable('iw_bookings')) return false;
	if (!DBUtil::createTable('iw_bookings_spaces')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_bookings_column'];
	if (!DBUtil::createIndex($c['sid'],'iw_bookings', 'sid')) return false;
	if (!DBUtil::createIndex($c['start'],'iw_bookings', 'start')) return false;
	
	//Create module vars
    pnModSetVar('iw_bookings', 'group', ''); //grup
   	pnModSetVar('iw_bookings', 'weeks', '1'); // setmanes
   	pnModSetVar('iw_bookings', 'month_panel', '0'); // taula_mes
    pnModSetVar('iw_bookings', 'weekends', '0');  // capssetmana
   	pnModSetVar('iw_bookings', 'eraseold', '1'); // delantigues
    pnModSetVar('iw_bookings', 'showcolors', '0'); // mostracolors
	pnModSetVar('iw_bookings', 'NTPtime', '0');
	//Initialation successfull
  	return true;
}

/**
 * Delete the iw_bookings module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_bookings_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_bookings');
	DBUtil::dropTable('iw_bookings_spaces');

	//Delete module vars
	pnModDelVar('iw_bookings', 'groups');
	pnModDelVar('iw_bookings', 'weeks');
	pnModDelVar('iw_bookings', 'month_panel');
	pnModDelVar('iw_bookings', 'weekends');
	pnModDelVar('iw_bookings', 'eraseold');
	pnModDelVar('iw_bookings', 'showcolors');
	pnModDelVar('iw_bookings', 'NTPtime');

	//Deletion successfull
	return true;
}

/**
 * Update the iw_bookings module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_bookings_upgrade($oldversion)
{
	if ($oldversion < 1.1) {
		if (!DBUtil::changeTable('iw_bookings')) return false;
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_bookings_column'];
		if (!DBUtil::createIndex($c['sid'],'iw_bookings', 'sid')) return false;
		if (!DBUtil::createIndex($c['start'],'iw_bookings', 'start')) return false;
	}
	// Update successful
	return true;
}

?>
