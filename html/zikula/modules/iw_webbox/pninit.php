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
 * Initialise the iw_webbox module creating module tables and module vars
 * @author Albert Pérez Monfort (intraweb@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_webbox_init()
{
	// Create module table
	if (!DBUtil::createTable('iw_webbox')) return false;

	//Create module vars
	pnModSetVar('iw_webbox', 'url', 'http://phobos.xtec.cat/intraweb');
	pnModSetVar('iw_webbox', 'width', '100');
	pnModSetVar('iw_webbox', 'height', '600');
	pnModSetVar('iw_webbox', 'scrolls', '1');
	pnModSetVar('iw_webbox', 'widthunit', '%');		
  	return true;
}

/**
 * Delete the iw_webbox module
 * @author Albert Pérez Monfort
 * @return bool true if successful, false otherwise
 */
function iw_webbox_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_webbox');

	//Delete module vars
	pnModDelVar('iw_webbox', 'url');
	pnModDelVar('iw_webbox', 'width');
	pnModDelVar('iw_webbox', 'height');
	pnModDelVar('iw_webbox', 'scrolls');
	pnModDelVar('iw_webbox', 'widthunit');
	
	//Deletion successfull
	return true;
}
