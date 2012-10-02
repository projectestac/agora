<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons: Intraweb
 * @subpackage iw_bookings
 */

/**
 * Define module tables
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return module tables information
 */

function iw_bookings_pntables(){

    // Initialize table array
	$pntable = array();
		
	// iw_bookings table definition
	$pntable['iw_bookings'] = DBUtil::getLimitedTablename('iw_bookings');
	$pntable['iw_bookings_column'] = array(
					'bid' => 'bid',
					'user' => 'user',
					'sid' => 'sid',
					'start' => 'start',
					'end' => 'end',
					'usrgroup' => 'usrgroup',
					'dayofweek'=> 'dayofweek',
					'temp' => 'temp',
					'cancel' => 'cancel',
					'reason' => 'reason',
					'bkey'=> 'bkey');

	$pntable['iw_bookings_column_def'] = array(
					'bid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
					'sid' => "INT(10) NOTNULL DEFAULT '0'",
					'user' => "INT(10) NOTNULL DEFAULT '0'",
					'start' => "DATETIME NOTNULL DEFAULT '0000-00-00 00:00:00'", //VARCHAR(20) NOTNULL DEFAULT '' KEY",
					'end' => "DATETIME NOTNULL DEFAULT '0000-00-00 00:00:00'", 	  //VARCHAR(20) NOTNULL DEFAULT ''",
					'usrgroup' => "VARCHAR(30) NOTNULL DEFAULT ''",	
					'reason' => "VARCHAR(255) NOTNULL DEFAULT ''",
					'dayofweek' => "INT(1) NOTNULL DEFAULT '0'",
					'temp' => "TINYINT(1) NOTNULL DEFAULT '0'",
					'cancel' => "TINYINT(1) NOTNULL DEFAULT '0'",
					'bkey' => "INT(10) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition($pntable['iw_bookings_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_bookings_column_def'], 'iw_');
	
	// iw_bookings_spaces table definition
	$pntable['iw_bookings_spaces'] = DBUtil::getLimitedTablename('iw_bookings_spaces');
	$pntable['iw_bookings_spaces_column'] = array(
					'sid' => 'sid',
					'space_name' => 'space_name',
					'description' => 'description',
					'mdid' => 'mdid',
					'vertical' => 'vertical',
					'color' => 'color',
					'active' => 'active');

	$pntable['iw_bookings_spaces_column_def'] = array(
					'sid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
					'space_name' => "VARCHAR(100) NOTNULL DEFAULT ''",
					'description' => "VARCHAR(255) NOTNULL DEFAULT ''",
					'mdid' => "INT(10) NOTNULL DEFAULT '0'",
					'vertical' => "TINYINT(1) NOTNULL DEFAULT '0'",
					'color' => "VARCHAR(7) NOT NULL DEFAULT '#FFFFFF'",
					'active' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_bookings_spaces_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_bookings_spaces_column_def'], 'iw_');

	// iw_main table definition needed in this module
	$pntable['iw_main'] = DBUtil::getLimitedTablename('iw_main');
	$pntable['iw_main_column'] = array('id' => 'iw_id',
						'uid' => 'iw_uid',
						'module' => 'iw_module',
						'name' => 'iw_name',
						'value' => 'iw_value',
						'lifetime' => 'iw_lifetime');

	// iw_timeframes table definition needed in this module

	$pntable['iw_timeframes'] = DBUtil::getLimitedTablename('iw_timeframes');
    $pntable['iw_timeframes_column'] = array(
					'hid' => 'hid',
					'mdid' => 'mdid',
			   		'start' => 'start',
               		'end' => 'end',
					'descriu' => 'descriu');


	$pntable['iw_timeframes_def'] = DBUtil::getLimitedTablename('iw_timeframes_def');
    $pntable['iw_timeframes_def_column'] = array('mdid' => 'mdid',
                                         'nom_marc' => 'nom_marc',
                                         'descriu' => 'descriu');

	// Return the table information
	return $pntable;
}
?>
