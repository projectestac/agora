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
function iw_agendas_pntables()
{
	// Initialise table array
	$pntable = array();
	// iw_agendas table definition
	$pntable['iw_agendas'] = DBUtil::getLimitedTablename('iw_agendas');
	$pntable['iw_agendas_column'] = array('aid' => 'aid',
											'usuari' => 'usuari',
											'data' => 'data',
											'completa' => 'completa',
											'c1' => 'c1',
											'c2' => 'c2',
											'c3' => 'c3',
											'c4' => 'c4',
											'c5' => 'c5',
											'c6' => 'c6',
											'totdia' => 'totdia',
											'tasca' => 'tasca',
											'nivell' => 'nivell',
											'rid' => 'rid',
											'daid' => 'daid',
											'nova' => 'nova',
											'vcalendar' => 'vcalendar',
											'dataanota' => 'dataanota',
											'fitxer' => 'fitxer',
											'origen' => 'origen',
											'protegida' => 'protegida',
											'origenid' => 'origenid',
											'modified' => 'modified',
											'deleted' => 'deleted',
											'deletedByUser' => 'deletedByUser',
											'completedByUser' => 'completedByUser',
											'gCalendarEventId' => 'gCalendarEventId',
											'data1' => 'data1');
	$pntable['iw_agendas_column_def'] = array('aid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
												'usuari' => "INT(10) NOTNULL DEFAULT '0'",
												'data' => "VARCHAR(20) NOTNULL DEFAULT ''",
												'completa' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'c1' => "TEXT NOTNULL",
												'c2' => "TEXT NOTNULL",
												'c3' => "TEXT NOTNULL",
												'c4' => "TEXT NOTNULL",
												'c5' => "TEXT NOTNULL",
												'c6' => "TEXT NOTNULL",
												'totdia' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'tasca' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'nivell' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'rid' => "INT(10) NOTNULL DEFAULT '0'",
												'daid' => "INT(10) NOTNULL DEFAULT '0'",
												'nova' => "TEXT NOTNULL",
												'vcalendar' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'dataanota' => "VARCHAR(20) NOTNULL DEFAULT ''",
												'fitxer' => "VARCHAR(50) NOTNULL DEFAULT ''",
												'origen' => "VARCHAR(50) NOTNULL DEFAULT ''",
												'protegida' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'origenid' => "INT(10) NOTNULL DEFAULT '0'",
												'modified' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'deleted' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'deletedByUser' => "TEXT NOTNULL",
												'completedByUser' => "TEXT NOTNULL",
												'gCalendarEventId' => "VARCHAR(150) NOTNULL DEFAULT ''",
												'data1' => "VARCHAR(20) NOTNULL DEFAULT ''");
	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_agendas_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_agendas_column_def'], 'iw_');
	// iw_agendas_def table definition
	$pntable['iw_agendas_def'] = DBUtil::getLimitedTablename('iw_agendas_def');
	$pntable['iw_agendas_def_column'] = array('daid' => 'daid',
												'nom_agenda' => 'nom_agenda',
												'descriu' => 'descriu',
												'c1' => 'c1',
												'c2' => 'c2',
												'c3' => 'c3',
												'c4' => 'c4',
												'c5' => 'c5',
												'c6' => 'c6',
												'tc1' => 'tc1',
												'tc2' => 'tc2',
												'tc3' => 'tc3',
												'tc4' => 'tc4',
												'tc5' => 'tc5',
												'tc6' => 'tc6',
												'op2' => 'op2',
												'op3' => 'op3',
												'op4' => 'op4',
												'op5' => 'op5',
												'op6' => 'op6',
												'grup' => 'grup',
												'resp' => 'resp',
												'activa' => 'activa',
												'adjunts' => 'adjunts',
												'protegida' => 'protegida',
												'color' => 'color',
												'gCalendarId' => 'gCalendarId',
												'gAccessLevel' => 'gAccessLevel',
												'gColor' => 'gColor');
	$pntable['iw_agendas_def_column_def'] = array('daid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
													'nom_agenda' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'descriu' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'c1' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'c2' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'c3' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'c4' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'c5' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'c6' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'tc1' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'tc2' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'tc3' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'tc4' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'tc5' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'tc6' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'op2' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'op3' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'op4' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'op5' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'op6' => "VARCHAR(255) NOTNULL DEFAULT ''",
													'grup' => "TEXT NOTNULL",
													'resp' => "TEXT NOTNULL",
													'activa' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'adjunts' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'protegida' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'color' => "VARCHAR(7) NOTNULL DEFAULT '#FFFFFF'",
													'gCalendarId' => "VARCHAR(150) NOTNULL DEFAULT ''",
													'gAccessLevel' => "TEXT NOTNULL",
													'gColor' => "TEXT NOTNULL");
	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_agendas_def_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_agendas_def_column_def'], 'iw_');
	// iw_agendas_def table definition
	$pntable['iw_agendas_subs'] = DBUtil::getLimitedTablename('iw_agendas_subs');
	$pntable['iw_agendas_subs_column'] = array('said' => 'said',
												'daid' => 'daid',
												'uid' => 'uid',
												'donadabaixa' => 'donadabaixa',
												'llistat' => 'llistat',
												'avisos' => 'avisos');
	$pntable['iw_agendas_subs_column_def'] = array('said' => "INT(10) NOTNULL AUTOINCREMENT KEY",
													'daid' => "INT(10) NOTNULL DEFAULT '0'",
													'uid' => "INT(10) NOTNULL DEFAULT '0'",
													'donadabaixa' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'llistat' => "TINYINT(1) NOTNULL DEFAULT '-1'",
													'avisos' => "TINYINT(1) NOTNULL DEFAULT '0'");
	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_agendas_subs_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_agendas_subs_column_def'], 'iw_');
	//Returns tables information
	return $pntable;
}