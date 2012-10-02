<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage QV (Quaderns Virtuals)
 */

/**
 * Define module tables
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return module tables information
 */
 
function iw_qv_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_qv table definition
	$pntable['iw_qv'] = DBUtil::getLimitedTablename('iw_qv');
	$pntable['iw_qv_column'] = array('qvid' => 'iw_qvid',
									 'teacher' => 'iw_teacher',
									 'groups' => 'iw_groups',
									 'title' => 'iw_title',
									 'description' => 'iw_description',
									 'url' => 'iw_url',
									 'skin' => 'iw_skin',
									 'lang' => 'iw_lang',
									 'maxdeliver' => 'iw_maxdeliver',
									 'showcorrection' => 'iw_showcorrection',
									 'showinteraction' => 'iw_showinteraction',
									 'ordersections' => 'iw_ordersections',
									 'orderitems' => 'iw_orderitems',
									 'target' => 'iw_target',
									 'width' => 'iw_width',
									 'height' => 'iw_height',
									 'active' => 'iw_active',
									 'observations' => 'iw_observations');
	$pntable['iw_qv_column_def'] = array('qvid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
										 'teacher' => "INT(11) NOTNULL",
										 'groups' => "VARCHAR(255) NOTNULL",
										 'title' => "VARCHAR(255) NOTNULL DEFAULT ''",
										 'description' => "TEXT NOTNULL DEFAULT ''",
										 'url' => "VARCHAR(255) NOTNULL DEFAULT ''",
										 'skin' => "VARCHAR(20) NOTNULL DEFAULT ''",
										 'lang' => "VARCHAR(10) NOTNULL DEFAULT ''",
										 'maxdeliver' => "INT(3) NOTNULL DEFAULT '-1'",
										 'showcorrection' => "INT(1) NOTNULL DEFAULT '1'",
										 'showinteraction' => "INT(1) NOTNULL DEFAULT '1'",
										 'ordersections' => "INT(1) NOTNULL DEFAULT '0'",
										 'orderitems' => "INT(1) NOTNULL DEFAULT '0'",
										 'target' => "VARCHAR(10) NOTNULL DEFAULT 'blank'",
										 'width' => "VARCHAR(10) NULL",
										 'height' => "VARCHAR(10) NULL",
										 'active' => "INT(1) NOTNULL DEFAULT '1'",
										 'observations' => "TEXT NOTNULL");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_qv_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_qv_column_def'], 'iw_');
	
	// iw_qv_assignments table definition
	$pntable['iw_qv_assignments'] = DBUtil::getLimitedTablename('iw_qv_assignments');
	$pntable['iw_qv_assignments_column'] = array('qvaid' => 'iw_qvaid',
												 'qvid' => 'iw_qvid',
												 'userid' => 'iw_userid',
												 'sectionorder' => 'iw_sectionorder',
												 'itemorder' => 'iw_itemorder',
												 'teachercomments' => 'iw_teachercomments',
												 'teacherobservations' => 'iw_teacherobservations');

	$pntable['iw_qv_assignments_column_def'] = array('qvaid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
													 'qvid' => "INT(11) NOTNULL",
													 'userid' => "INT(11) NOTNULL",
													 'sectionorder' => "INT(10) NOTNULL DEFAULT '0'",
													 'itemorder' => "INT(10) NOTNULL DEFAULT '0'",
													 'teachercomments' => "TEXT NULL",
													 'teacherobservations' => "TEXT NULL");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_qv_assignments_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_qv_assignments_column_def'], 'iw_');

	// iw_qv_sections table definition
	$pntable['iw_qv_sections'] = DBUtil::getLimitedTablename('iw_qv_sections');
	$pntable['iw_qv_sections_column'] = array('qvsid' => 'iw_qvsid',
											  'qvaid' => 'iw_qvaid',
											  'sectionid' => 'iw_sectionid',
											  'responses' => 'iw_responses',
											  'scores' => 'iw_scores',
											  'pendingscores' => 'iw_pendingscores',
											  'attempts' => 'iw_attempts',
											  'state' => 'iw_state',
											  'time' => 'iw_time');

	$pntable['iw_qv_sections_column_def'] = array('qvsid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
												  'qvaid' => "INT(11) NOTNULL",
												  'sectionid' => "VARCHAR(255) NOTNULL",
												  'responses' => "TEXT NULL",
												  'scores' => "TEXT NULL",
												  'pendingscores' => "TEXT NULL",
												  'attempts' => "INT(60) NULL DEFAULT '0'",
												  'state' => "INT(1) NULL DEFAULT '0'",
												  'time' => "VARCHAR(8) NULL DEFAULT '00:00:00'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_qv_sections_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_qv_sections_column_def'], 'iw_');

	// iw_qv_messages table definition
	$pntable['iw_qv_messages'] = DBUtil::getLimitedTablename('iw_qv_messages');
	$pntable['iw_qv_messages_column'] = array('qvmid' => 'iw_qvmid',
											  'qvsid' => 'iw_qvsid',
											  'itemid' => 'iw_itemid',
											  'userid' => 'iw_userid',
											  'message' => 'iw_message');

	$pntable['iw_qv_messages_column_def'] = array('qvmid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
												  'qvsid' => "INT(11) NOTNULL",
												  'itemid' => "VARCHAR(255) NOTNULL",
												  'userid' => "INT(11) NOTNULL",
												  'message' => "TEXT NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_qv_messages_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_qv_messages_column_def'], 'iw_');

	// iw_qv_messages table definition
	$pntable['iw_qv_messages_read'] = DBUtil::getLimitedTablename('iw_qv_messages_read');
	$pntable['iw_qv_messages_read_column'] = array('qvmrid' => 'iw_qvmrid',
												   'qvmid' => 'iw_qvmid',
												   'userid' => 'iw_userid');

	$pntable['iw_qv_messages_read_column_def'] = array('qvmrid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
												  	   'qvmid' => "INT(11) NOTNULL",
													   'userid' => "INT(11) NOTNULL");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_qv_messages_read_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_qv_messages_read_column_def'], 'iw_');



	// iw_main table definition needed in this module
	$pntable['iw_main'] = DBUtil::getLimitedTablename('iw_main');
	$pntable['iw_main_column'] = array('id' => 'iw_id',
						'uid' => 'iw_uid',
						'module' => 'iw_module',
						'name' => 'iw_name',
						'value' => 'iw_value',
						'lifetime' => 'iw_lifetime');

	// Return the table information
	return $pntable;
}
