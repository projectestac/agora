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
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function iw_vhmenu_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_main table definition
	$pntable['iw_vhmenu'] = DBUtil::getLimitedTablename('iw_vhmenu');

	//Noms dels camps
	$pntable['iw_vhmenu_column'] = array('mid' => 'iw_mid',
						'text' => 'iw_text',
						'url' => 'iw_url',
						'bg_image' => 'iw_bg_image',
						'height' => 'iw_height',
						'width' => 'iw_width',
						'id_parent' => 'iw_id_parent',
						'groups' => 'iw_groups',
						'active' => 'iw_active',
						'target' => 'iw_target',
						'descriu' => 'iw_descriu',
						'iorder' => 'iw_iorder',
						'grafic' => 'iw_grafic',
						'image1' => 'iw_image1',
						'image2' => 'iw_image2');

	$pntable['iw_vhmenu_column_def'] = array('mid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
						'text' => "VARCHAR(50) NOTNULL DEFAULT ''",
						'url' => "VARCHAR(255) NOTNULL DEFAULT ''",
						'bg_image' => "VARCHAR(20) NOTNULL DEFAULT ''",
						'height' => "INT(3) NOTNULL DEFAULT '25'",
						'width' => "INT(3) NOTNULL DEFAULT '125'",
						'id_parent' => "INT(11) NOTNULL DEFAULT '0'",
						'groups' => "TEXT NOTNULL",
						'active' => "TINYINT(1) NOTNULL DEFAULT '0'",
						'target' => "TINYINT(1) NOTNULL DEFAULT '0'",
						'descriu' => "TEXT NOTNULL",
						'iorder' => "INT(11) NOTNULL DEFAULT '0'",
						'grafic' => "TINYINT(1) NOTNULL DEFAULT '0'",
						'image1' => "VARCHAR(20) NOTNULL DEFAULT ''",
						'image2' => "VARCHAR(20) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_vhmenu_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_vhmenu_column_def'], 'iw_');


	// Return the table information
	return $pntable;
}
