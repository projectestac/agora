<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Noteboard
 */

/**
 * Define module tables
 * @author Albert PÃ©rez Monfort
 * @author Josep FerrÃ ndiz FarrÃ©
 * @return module tables information
 */
function iw_TimeFrames_pntables()
{
    $pntable = array();

	// iw_TimeFrames_def table definition
	$pntable['iw_timeframes_def'] = DBUtil::getLimitedTablename('iw_timeframes_def');
    $pntable['iw_timeframes_def_column'] = array('mdid' => 'mdid',
													'nom_marc' => 'nom_marc',
													'descriu' => 'descriu');


	$pntable['iw_timeframes_def_column_def'] = array('mdid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'nom_marc' => "VARCHAR(50) NOTNULL DEFAULT ''",	
														'descriu' => "VARCHAR(255) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition($pntable['iw_timeframes_def_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_timeframes_def_column_def'], 'iw_');

	// iw_TimeFrames table definition
	$pntable['iw_timeframes'] = DBUtil::getLimitedTablename('iw_timeframes');
    $pntable['iw_timeframes_column'] = array('hid' => 'hid', 
												'mdid' => 'mdid', //identifica el marc horari
										   		'start' => 'start',
												'end' => 'end',
												'descriu' => 'descriu');

	$pntable['iw_timeframes_column_def'] = array('hid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
													'mdid' => "INT(10) NOTNULL DEFAULT '0'",
													'start' => "TIME NOTNULL DEFAULT '00:00:00'",	
													'end' => "TIME NOTNULL DEFAULT '00:00:00'",
													'descriu' => "VARCHAR(255) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition($pntable['iw_timeframes_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_timeframes_column_def'], 'iw_');

	// iw_main table definition needed in this module
	$pntable['iw_main'] = DBUtil::getLimitedTablename('iw_main');
	$pntable['iw_main_column'] = array('id' => 'iw_id',
										'uid' => 'iw_uid',
										'module' => 'iw_module',
										'name' => 'iw_name',
										'value' => 'iw_value',
										'lifetime' => 'iw_lifetime');

	$pntable['iw_bookings'] = DBUtil::getLimitedTablename('iw_bookings');
	$pntable['iw_bookings_column'] = array('bid' => 'bid',
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

	// iw_bookings_spaces table definition
	$pntable['iw_bookings_spaces'] = DBUtil::getLimitedTablename('iw_bookings_spaces');
	$pntable['iw_bookings_spaces_column'] = array('sid' => 'sid',
													'space_name' => 'space_name',
													'description' => 'description',
													'mdid' => 'mdid',
													'vertical' => 'vertical',
													'color' => 'color',
													'active' => 'active');

    return $pntable;
}

?>
