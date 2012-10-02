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
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */

function iw_forms_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_forms_def table definition
	$pntable['iw_forms_def'] = DBUtil::getLimitedTablename('iw_forms_def');
	$pntable['iw_forms_def_column'] = array('fid' => 'iw_fid',
											'formName' => 'iw_formName',
											'description' => 'iw_description',
											'active' => 'iw_active',
											'title' => 'iw_title',
											'new' => 'iw_new',
											'cid' => 'iw_cid',
											'caducity' => 'iw_caducity',
											'annonimous' => 'iw_annonimous',
											'unique' => 'iw_unique',
											'answare' => 'iw_answare',
											'characters' => 'iw_characters',
											'closeableNotes' => 'iw_closeableNotes',
											'closeInsert' => 'iw_closeInsert',
											'closeableInsert' => 'iw_closeableInsert',
											'unregisterednotusersview' => 'iw_unregisterednotusersview',
											'unregisterednotexport' => 'iw_unregisterednotexport',
											'publicResponse' => 'iw_publicResponse',
											'skin' => 'iw_skin',
											'skincss' => 'iw_skincss',
											'showFormName' => 'iw_showFormName',
											'showNotesTitle' => 'iw_showNotesTitle',
											'skinForm' => 'iw_skinForm',
											'skinNote' => 'iw_skinNote',
                                            'expertMode' => 'iw_expertMode',
                                            'skinByTemplate' => 'iw_skinByTemplate',
                                            'skinFormTemplate' => 'iw_skinFormTemplate',
                                            'skinTemplate' => 'iw_skinTemplate',
                                            'skinNoteTemplate' => 'iw_skinNoteTemplate',
											'allowComments' => 'iw_allowComments',
											'allowCommentsModerated' => 'iw_allowCommentsModerated');

	$pntable['iw_forms_def_column_def'] = array('fid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
												'formName' => "VARCHAR(70) NOTNULL DEFAULT ''",
												'description' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'active' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'title' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'new' => "DATETIME NOTNULL",
												'cid' => "INT(10) NOTNULL DEFAULT '0'",
												'caducity' => "DATETIME NOTNULL",
												'annonimous' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'unique' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'answare' => "TEXT NOTNULL",
												'characters' => "INT(3) NOTNULL DEFAULT '0'",
												'closeableNotes' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'closeInsert' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'closeableInsert' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'unregisterednotusersview' => "TINYINT(1) NOTNULL DEFAULT '1'",
												'unregisterednotexport' => "TINYINT(1) NOTNULL DEFAULT '1'",
												'publicResponse' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'skin' => "TEXT NOTNULL",
												'skincss' => "VARCHAR(150) NOTNULL DEFAULT ''",
												'showFormName' => "TINYINT(1) NOTNULL DEFAULT '1'",
												'showNotesTitle' => "TINYINT(1) NOTNULL DEFAULT '1'",
												'skinForm' => "TEXT NOTNULL",
												'skinNote' => "TEXT NOTNULL",
                                                'expertMode' => "TINYINT(1) NOTNULL DEFAULT '0'",
                                                'skinByTemplate' => "TINYINT(1) NOTNULL DEFAULT '0'",
                                                'skinFormTemplate' => "VARCHAR(70) NOTNULL DEFAULT 'iw_forms_user_new.htm'",
                                                'skinTemplate' => "VARCHAR(70) NOTNULL DEFAULT 'iw_forms_user_read.htm'",
                                                'skinNoteTemplate' => "VARCHAR(70) NOTNULL DEFAULT 'iw_forms_user_read.htm'",
												'allowComments' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'allowCommentsModerated' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forms_def_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forms_def_column_def'], 'iw_');

	// iw_forms_def table definition
	$pntable['iw_forms_cat'] = DBUtil::getLimitedTablename('iw_forms_cat');
	$pntable['iw_forms_cat_column'] = array('cid' => 'iw_cid',
											'catName' => 'catName',
											'description' => 'iw_description');

	$pntable['iw_forms_cat_column_def'] = array('cid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
												'catName' => "VARCHAR(70) NOTNULL DEFAULT ''",
												'description' => "VARCHAR(255) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forms_cat_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forms_cat_column_def'], 'iw_');


	// iw_forms table definition
	$pntable['iw_forms'] = DBUtil::getLimitedTablename('iw_forms');
	$pntable['iw_forms_column'] = array('fmid' => 'iw_fmid',
										'user' => 'iw_user',
										'observations' => 'iw_observations',
										'renote' => 'iw_renote',
										'state' => 'iw_state',
										'time' => 'iw_time',
										'validate' => 'iw_validate',
										'fid' => 'iw_fid',
										'annonimous' => 'iw_annonimous',
										'mark' => 'iw_mark',
										'deluser' => 'iw_deluser',
										'viewed' => 'iw_viewed',
										'closed' => 'iw_closed',
										'publicResponse' => 'iw_publicResponse');

	$pntable['iw_forms_column_def'] = array('fmid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
											'user' => "VARCHAR(20) NOTNULL DEFAULT ''",
											'observations' => "TEXT NOTNULL",
											'renote' => "TEXT NOTNULL",
											'state' => "TINYINT(1) NOTNULL DEFAULT '0'",
											'time' => "VARCHAR(20) NOTNULL DEFAULT ''",
											'validate' => "TINYINT(1) NOTNULL DEFAULT '0'",
											'fid' => "INT(10) NOTNULL DEFAULT '0'",
											'annonimous' => "TINYINT(1) NOTNULL DEFAULT '0'",
											'mark' => "TEXT NOTNULL",
											'deluser' => "TINYINT(1) NOTNULL DEFAULT '0'",
											'viewed' => "TEXT NOTNULL",
											'closed' => "TINYINT(1) NOTNULL DEFAULT '0'",
											'publicResponse' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forms_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forms_column_def'], 'iw_');

	// iw_forms_note table definition
	$pntable['iw_forms_note'] = DBUtil::getLimitedTablename('iw_forms_note');
	$pntable['iw_forms_note_column'] = array('fnid' => 'iw_fnid',
												'fmid' => 'iw_fmid',
												'fndid' => 'iw_fndid',
												'content' => 'iw_content',
												'validate' => 'iw_validate');

	$pntable['iw_forms_note_column_def'] = array('fnid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
													'fmid' => "INT(10) NOTNULL DEFAULT '0'",
													'fndid' => "INT(10) NOTNULL DEFAULT '0'",
													'content' => "TEXT NOTNULL",
													'validate' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forms_note_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forms_note_column_def'], 'iw_');

	// iw_forms_note_def table definition
	$pntable['iw_forms_note_def'] = DBUtil::getLimitedTablename('iw_forms_note_def');
	$pntable['iw_forms_note_def_column'] = array('fndid' => 'iw_fndid',
													'fid' => 'iw_fid',
													'fieldType' => 'iw_fieldType',
													'required' => 'iw_required',
													'description' => 'iw_description',
													'fieldName' => 'iw_fieldName',
													'feedback' => 'iw_feedback',
													'order' => 'iw_order',
													'active' => 'iw_active',
													'dependance' => 'iw_dependance', //id of the dependance
													'rfid' => 'iw_rfid', //ids of the managers validators
													'validationNeeded' => 'iw_validationNeeded', //id of the manager validator
													'notify' => 'iw_notify',
													'size' => 'iw_size', //Only for text fields
													'cols' => 'iw_cols', //only fot textarea fields
													'rows' => 'iw_rows', //only for textarea fields
													'editor' => 'iw_editor', //only for textarea fields
													'checked' => 'iw_checked', //only for checkbox fields
													'options' => 'iw_options', //only for list fields
													'calendar' => 'iw_calendar', //only for date fields
													'height' => 'iw_height', // only for line fields
													'color' => 'iw_color', // only for line fields
													'colorf' => 'iw_colorf', // only for line fields
													'accessType' => 'iw_accessType',
													'editable' => 'iw_editable',
													'collapse' => 'iw_collapse',
													'publicFile' => 'iw_publicFile',
													'help' => 'iw_help',
													'gid' => 'iw_gid',
													'searchable' => 'iw_searchable',
													'extensions' => 'iw_extensions',
													'imgWidth' => 'iw_imgWidth',
													'imgHeight' => 'iw_imgHeight');

	$pntable['iw_forms_note_def_column_def'] = array('fndid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'fid' => "INT(10) NOTNULL DEFAULT '0'",
														'fieldType' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'required' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'description' => "VARCHAR(255) NOTNULL DEFAULT ''",
														'fieldName' => "TEXT NOTNULL",
														'feedback' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'order' => "INT(10) NOTNULL DEFAULT '1000'",
														'active' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'dependance' => "VARCHAR(50) NOTNULL DEFAULT '$'",
														'rfid' => "VARCHAR(50) NOTNULL DEFAULT '$'",
														'validationNeeded' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'notify' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'size' => "VARCHAR(3) NOTNULL DEFAULT '25'",
														'cols' => "VARCHAR(3) NOTNULL DEFAULT '30'",
														'rows' => "VARCHAR(3) NOTNULL DEFAULT '5'",
														'editor' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'checked' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'options' => "TEXT NOTNULL",
														'calendar' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'height' => "VARCHAR(2) NOTNULL DEFAULT '1'",
														'color' => "VARCHAR(7) NOTNULL DEFAULT '#DDDDDD'",
														'colorf' => "VARCHAR(7) NOTNULL DEFAULT '#FFFFFF'",
														'accessType' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'editable' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'collapse' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'publicFile' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'help' => "TEXT NOTNULL",
														'gid' => "INT(10) NOTNULL DEFAULT '0'",
														'searchable' => "TINYINT(1) NOTNULL DEFAULT '0'",
														'extensions' => "VARCHAR(30) NOTNULL DEFAULT ''",
														'imgWidth' => "SMALLINT(4) NOTNULL DEFAULT '0'",
														'imgHeight' => "SMALLINT(4) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forms_note_def_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forms_note_def_column_def'], 'iw_');

	// iw_forms_resp table definition
	$pntable['iw_forms_validator'] = DBUtil::getLimitedTablename('iw_forms_validator');
	$pntable['iw_forms_validator_column'] = array('rfid' => 'iw_rfid',
													'fid' => 'iw_fid',
													'validator' => 'iw_validator',
													'validatorType' => 'iw_validatorType'); //0 global - 1 note only

	$pntable['iw_forms_validator_column_def'] = array('rfid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'fid' => "INT(10) NOTNULL DEFAULT '0'",
														'validator' => "INT(10) NOTNULL DEFAULT '0'",
														'validatorType' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forms_resp_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forms_resp_column_def'], 'iw_');

	// iw_forms_resp table definition
	$pntable['iw_forms_group'] = DBUtil::getLimitedTablename('iw_forms_group');
	$pntable['iw_forms_group_column'] = array('gfid' => 'iw_gfid',
												'fid' => 'iw_fid',
												'group' => 'iw_group',
												'accessType' => 'iw_accessType',
												'validationNeeded' => 'iw_validationNeeded');

	$pntable['iw_forms_group_column_def'] = array('gfid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
													'fid' => "INT(10) NOTNULL DEFAULT '0' KEY",
													'group' => "INT(10) NOTNULL DEFAULT '0'",
													'accessType' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'validationNeeded' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forms_group_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forms_group_column_def'], 'iw_');

	//Returns tables information
	return $pntable;
}
