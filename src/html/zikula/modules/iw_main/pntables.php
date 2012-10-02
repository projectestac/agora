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
 * @author Albert P�rez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
	
function iw_main_pntables()
{
    // Initialise table array
	$pntable = array();
		
	// iw_main table definition
	$pntable['iw_main'] = DBUtil::getLimitedTablename('iw_main');
	$pntable['iw_main_column'] = array('id' => 'iw_id',
					'module' => 'iw_module',
					'name' => 'iw_name',
					'value' => 'iw_value',
					'uid' => 'iw_uid',
					'lifetime' => 'iw_lifetime',
					'nult' => 'iw_nult');

	$pntable['iw_main_column_def'] = array('id' => "INT(11) NOTNULL AUTOINCREMENT KEY",
						'module' => "VARCHAR(50) NOTNULL DEFAULT ''" ,
						'name' => "VARCHAR(50) NOTNULL DEFAULT ''",
						'value' => "TEXT NOTNULL",
						'uid' => "INT(11) NOTNULL DEFAULT '0'",
						'lifetime' => "VARCHAR(20) NOTNULL DEFAULT '0'",
						'nult' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_main_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_main_column_def'], 'iw_');

	// iw_users table definition
	$pntable['iw_users'] = DBUtil::getLimitedTablename('iw_users');
	$pntable['iw_users_column'] = array('suid' => 'iw_suid',
						'uid' => 'iw_uid',
						'id' => 'iw_id',
						'nom' => 'iw_nom',
						'cognom1' => 'iw_cognom1',
						'cognom2' => 'iw_cognom2',
						'naixement' => 'iw_naixement',
						'accio' => 'iw_accio');


	// Return the table information
	return $pntable;
}
?>
