<?php
/**
 * @link http://www.zikula.com
 * @version $Id: pninit.php 22139 2008-08-01 17:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage iw_bookings
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 */

/**
 * Initialise the iw_TimeFrames module creating module tables and module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return bool true if successful, false otherwise
 */

function iw_TimeFrames_init()
{
	// Create module tables
	if (!DBUtil::createTable('iw_timeframes')) return false;
	if (!DBUtil::createTable('iw_timeframes_def')) return false;

	//Create module vars
    pnModSetVar('iw_TimeFrames', 'frames', '10'); //franges horàries

	//Initialation successfull
  	return true;
}


/**
 * Delete the iw_TimeFrames module & update existing bookings references
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return bool true if successful, false otherwise
 */

function iw_TimeFrames_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_timeframes');
	DBUtil::dropTable('iw_timeframes_def');

	// Totes les referències als marcs s'han d'esborrar a iw_bookings_spaces
	// 1r. mirar si existeix el mòdul i després actualitzar els registres 

	$modid = pnModGetIDFromName('iw_bookings');
	$modinfo = pnModGetInfo($modid);

	if($modinfo['state'] > 1) {
		$obj = array('mdid'=> 0);
		DBUtil::updateObject ($obj, 'iw_bookings_spaces', 'mdid != 0');
	}

	//Delete module vars
	pnModDelVar('iw_TimeFrames', 'frames');

	//Deletion successfull
	return true;
}

function iw_TimeFrames_upgrade($oldversion){

	//Upgrade successfull
	return true;
}
?>
