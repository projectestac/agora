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
 * Initialise the iw_groups module creating module tables and module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_groups_init()
{
	//Create module vars
	pnModSetVar('iw_groups', 'grupinici', '');
	pnModSetVar('iw_groups', 'confesb', '');
	pnModSetVar('iw_groups', 'confmou', '');
  	return true;
}

/**
 * Delete the iw_groups module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_groups_delete()
{
	//Delete module vars
	pnModDelVar('iw_groups', 'grupinici');
	pnModDelVar('iw_groups', 'confesb');
	pnModDelVar('iw_groups', 'confmou');

	//Deletion successfull
	return true;
}

/**
 * Update the iw_groups module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_groups_upgrade($oldversion)
{
	return true;
}
