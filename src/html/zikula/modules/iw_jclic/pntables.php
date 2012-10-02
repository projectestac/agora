<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage JClic
 */

/**
 * Define module tables
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */

function iw_jclic_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_jclic table definition
	$pntable['iw_jclic'] = DBUtil::getLimitedTablename('iw_jclic');
	$pntable['iw_jclic_column'] = array('jid' => 'iw_jid', //era el camp id a Moodle
										'user' => 'iw_user', //era el course a la taula del Moodle
										'name' => 'iw_name',
										'description' => 'iw_description',
										'url' => 'iw_url',
										'file' => 'iw_file',
										'skin' => 'iw_skin',
										'maxattempts' => 'iw_maxattempts',
										'width' => 'iw_width',
										'height' => 'iw_height',
										'scoreToOptain' => 'iw_scoreToOptain',
										'solvedToOptain' => 'iw_solvedToOptain',
										'active' => 'iw_active',
										'date' => 'iw_date',
										'observations' => 'iw_observations',
										'limitDate' => 'iw_limitDate',
										'initDate' => 'iw_initDate',
										'extended' => 'iw_extended');

	$pntable['iw_jclic_column_def'] = array('jid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
												'user' => "INT(10) NOTNULL DEFAULT '0'",
												'name' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'description' => "TEXT NOTNULL",
												'url' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'file' => "VARCHAR(30) NOTNULL DEFAULT ''",
												'skin' => "VARCHAR(20) NOTNULL DEFAULT ''",
												'maxattempts' => "INT(3) NOTNULL DEFAULT '0'",
												'width' => "INT(5) NOTNULL DEFAULT '600'",
												'height' => "INT(5) NOTNULL DEFAULT '400'",
												'scoreToOptain' => "VARCHAR(5) DEFAULT NULL",
												'solvedToOptain' => "VARCHAR(5) DEFAULT NULL",
												'active' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'date' => "VARCHAR(20) NOTNULL DEFAULT ''",
												'observations' => "TEXT NOTNULL",
												'limitDate' => "VARCHAR(20) NOTNULL DEFAULT ''",
												'initDate' => "VARCHAR(20) NOTNULL DEFAULT ''",
												'extended' => "TEXT NOTNULL");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_jclic_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_jclic_column_def'], 'iw_');

	// iw_jclic_activities table definition
	$pntable['iw_jclic_activities'] = DBUtil::getLimitedTablename('iw_jclic_activities');
	$pntable['iw_jclic_activities_column'] = array('jaid' => 'iw_jaid', //era el camp id a Moodle
													'session_id' => 'iw_session_id',
													'activity_id' => 'iw_activity_id',
													'activity_name' => 'iw_activity_name',
													'num_actions' => 'iw_num_actions',
													'score' => 'iw_score',
													'activity_solved' => 'iw_activity_solved',
													'qualification' => 'iw_qualification',
													'total_time' => 'iw_total_time',
													'activity_code' => 'iw_activity_code');

	$pntable['iw_jclic_activities_column_def'] = array('jaid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'session_id' => "VARCHAR(50) NOTNULL DEFAULT ''",
														'activity_id' => "INT(5) NOTNULL DEFAULT '0'",
														'activity_name' => "VARCHAR(50) NOTNULL DEFAULT ''",
														'num_actions' => "INT(4) DEFAULT NULL",
														'score' => "INT(4) DEFAULT NULL",
														'activity_solved' => "TINYINT(1) DEFAULT NULL",
														'qualification' => "INT(3) DEFAULT NULL",
														'total_time' => "INT(5) DEFAULT NULL",
														'activity_code' => "VARCHAR(50) DEFAULT NULL");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_jclic_activities_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_jclic_activities_column_def'], 'iw_');

	// iw_jclic_sessions table definition
	$pntable['iw_jclic_sessions'] = DBUtil::getLimitedTablename('iw_jclic_sessions');
	$pntable['iw_jclic_sessions_column'] = array('jsid' => 'iw_jsid',
													'jclicid' => 'iw_jclicid',
													'session_id' => 'iw_session_id',
													'user_id' => 'iw_user_id',
													'session_datetime' => 'iw_session_datetime',
													'project_name' => 'iw_project_name',
													'session_key' => 'iw_session_key',
													'session_code' => 'iw_session_code',
													'session_context' => 'iw_session_context');

	$pntable['iw_jclic_sessions_column_def'] = array('jsid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'jclicid' => "INT(10) NOTNULL DEFAULT '0'",
														'session_id' => "VARCHAR(50) NOTNULL DEFAULT ''",
														'user_id' => "INT(10) NOTNULL",
														'session_datetime' => "datetime NOTNULL",
														'project_name' => "VARCHAR(100) NOTNULL DEFAULT ''",
														'session_key' => "VARCHAR(50) DEFAULT NULL",
														'session_code' => "VARCHAR(50) DEFAULT NULL",
														'session_context' => "VARCHAR(50) DEFAULT NULL");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_jclic_sessions_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_jclic_sessions_column_def'], 'iw_');

	// iw_jclic_groups table definition
	$pntable['iw_jclic_groups'] = DBUtil::getLimitedTablename('iw_jclic_groups');
	$pntable['iw_jclic_groups_column'] = array('jgid' => 'iw_jgid', //era id a Moodle
												'jid' => 'iw_jid',
												'group_id' => 'iw_group_id',
												'group_name' => 'iw_group_name',
												'group_description' => 'iw_group_description',
												'group_icon' => 'iw_group_icon',
												'group_code' => 'iw_group_code',
												'group_keywords' => 'iw_group_keywords');

	$pntable['iw_jclic_groups_column_def'] = array('jgid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
													'jid' => "INT(10) NOTNULL DEFAULT '0'",
													'group_id' => "INT(10) NOTNULL DEFAULT '0'",
													'group_name' => "VARCHAR(80) NOTNULL DEFAULT ''",
													'group_description' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'group_icon' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'group_code' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'group_keywords' => "VARCHAR(255) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_jclic_groups_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_jclic_groups_column_def'], 'iw_');
	
	// iw_jclic_users table definition
	$pntable['iw_jclic_users'] = DBUtil::getLimitedTablename('iw_jclic_users');
	$pntable['iw_jclic_users_column'] = array('juid' => 'iw_juid',
												'jid' => 'iw_jid',
												'user_id' => 'iw_user_id',
												'group_id' => 'iw_group_id',
												'user_name' => 'iw_user_name',
												'user_pwd' => 'iw_user_pwd',
												'user_icon' => 'iw_user_icon',
												'user_code' => 'iw_user_code',
												'user_keywords' => 'iw_user_keywords',
												'observations' => 'iw_observations',
												'renotes' => 'iw_renotes');

	$pntable['iw_jclic_users_column_def'] = array('juid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
													'jid' => "INT(10) NOTNULL DEFAULT '0'",
													'user_id' => "INT(10) NOTNULL DEFAULT '0'",
													'group_id' => "INT(10) NOTNULL DEFAULT '0'",
													'user_name' => "VARCHAR(80) NOTNULL DEFAULT ''",
													'user_pwd' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'user_icon' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'user_code' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'user_keywords' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'observations' => "TEXT NOTNULL",
													'renotes' => "TEXT NOTNULL");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_jclic_users_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_jclic_users_column_def'], 'iw_');

	// iw_jclic_settings table definition
	$pntable['iw_jclic_settings'] = DBUtil::getLimitedTablename('iw_jclic_settings');
	$pntable['iw_jclic_settings_column'] = array('jsid' => 'iw_jsid',
													'setting_key' => 'iw_setting_key',
													'setting_value' => 'iw_setting_value');

	$pntable['iw_jclic_settings_column_def'] = array('jsid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'setting_key' => "VARCHAR(255) NOTNULL DEFAULT ''",
														'setting_value' => "VARCHAR(255) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_jclic_settings_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_jclic_settings_column_def'], 'iw_');

	//Returns tables information
	return $pntable;
}
