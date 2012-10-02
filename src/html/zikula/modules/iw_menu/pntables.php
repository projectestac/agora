<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Weebbox
 */

/**
 * Define module tables
 * @author Albert Perez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function iw_menu_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_main table definition
	$pntable['iw_menu'] = DBUtil::getLimitedTablename('iw_menu');

	//Noms dels camps
	$pntable['iw_menu_column'] = array('mid' => 'iw_mid',
						'text' => 'iw_text',
						'url' => 'iw_url',
						'id_parent' => 'iw_id_parent',
						'groups' => 'iw_groups',
						'active' => 'iw_active',
						'target' => 'iw_target',
						'descriu' => 'iw_descriu',
						'iorder' => 'iw_iorder',
						'icon' => 'iw_icon',);

	$pntable['iw_menu_column_def'] = array('mid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
						'text' => "VARCHAR(50) NOTNULL DEFAULT ''",
						'url' => "VARCHAR(255) NOTNULL DEFAULT ''",
						'id_parent' => "INT(11) NOTNULL DEFAULT '0'",
						'groups' => "TEXT NOTNULL",
						'active' => "TINYINT(1) NOTNULL DEFAULT '0'",
						'target' => "TINYINT(1) NOTNULL DEFAULT '0'",
						'descriu' => "TEXT NOTNULL",
						'iorder' => "INT(11) NOTNULL DEFAULT '0'",
						'icon' => "VARCHAR(40) NOTNULL DEFAULT ''");

	// Return the table information
	return $pntable;
}
