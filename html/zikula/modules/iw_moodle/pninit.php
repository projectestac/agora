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
 * initialise the iw_moodle module creating module tables and module vars
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_moodle_init()
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state']!=3){
		return LogUtil::registerError (__('Module iw_main is needed. You have to install the iw_main module before to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '0.5';
	if(!pnModFunc('iw_main','admin','checkVersion',array('version'=>$versionNeeded))){
		return false;
	}
	
	
	// Create module table
	if (!DBUtil::createTable('iw_moodle')) return false;

	//Create module vars
	pnModSetVar('iw_moodle', 'moodleurl', '../moodle');
	pnModSetVar('iw_moodle', 'newwindow', 0);
	pnModSetVar('iw_moodle', 'guestuser', 'guest' );
	pnModSetVar('iw_moodle', 'dbprefix', 'mdl_' );

	pnModSetVar('iw_moodle', 'dfl_description', 'User description');
	pnModSetVar('iw_moodle', 'dfl_language', 'en_utf8');
	pnModSetVar('iw_moodle', 'dfl_country', 'ES');
	pnModSetVar('iw_moodle', 'dfl_city', 'City name');
	pnModSetVar('iw_moodle', 'dfl_gtm', '99');
	return true;
}

/**
 * Delete the iw_moodle module
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_moodle_delete()
{

	// Delete module table
	DBUtil::dropTable('iw_moodle');

	//Delete module vars
	pnModDelVar('iw_moodle', 'moodleurl');
	pnModDelVar('iw_moodle', 'newwindow');
	pnModDelVar('iw_moodle', 'guestuser');
	pnModDelVar('iw_moodle', 'dbprefix');
	pnModDelVar('iw_moodle', 'dfl_description');
	pnModDelVar('iw_moodle', 'dfl_language');
	pnModDelVar('iw_moodle', 'dfl_country');
	pnModDelVar('iw_moodle', 'dfl_city');
	pnModDelVar('iw_moodle', 'dfl_gtm');
	return true;
}

/**
 * Update the iw_moodle module
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_moodle_upgrade($oldversion)
{
	return true;
}
?>
