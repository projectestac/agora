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
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
 
function iw_noteboard_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_noteboard table definition
	$pntable['iw_noteboard'] = DBUtil::getLimitedTablename('iw_noteboard');
	$pntable['iw_noteboard_column'] = array('nid' => 'iw_nid',
											'data' => 'iw_data',
											'informa' => 'iw_informa',
											'noticia' => 'iw_noticia',
											'destinataris' => 'iw_destinataris',
											'mes_info' => 'iw_mes_info',
											'text' => 'iw_text',
											'caduca' => 'iw_caduca',
											'no_mostrar' => 'iw_no_mostrar',
											'titular' => 'iw_titular',
											'titulin' => 'iw_titulin',
											'titulout' => 'iw_titulout',
											'fitxer' => 'iw_fitxer',
											'textfitxer' => 'iw_textfitxer',
											'verifica' => 'iw_verifica',
											'admet_comentaris' => 'iw_admet_comentaris',
											'ncid' => 'iw_ncid',
											'tid' => 'iw_tid',
											'marca' => 'iw_marca',
											'edited' => 'iw_edited',
											'edited_by' => 'iw_edited_by',
											'lang' => 'iw_lang',
											'public' => 'iw_public',
											'sharedFrom' => 'iw_sharedFrom',
											'literalGroups' => 'iw_literalGroups',
											'sharedId' => 'iw_sharedId');
	$pntable['iw_noteboard_column_def'] = array('nid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
												'data' => "VARCHAR(15) NOTNULL DEFAULT ''",
												'informa' => "INT(10) NOTNULL DEFAULT '0'",
												'noticia' => "TEXT NOTNULL",
												'destinataris' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'mes_info' => "VARCHAR(255) NOTNULL DEFAULT ''",	
												'text' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'caduca' => "VARCHAR(15) NOTNULL DEFAULT ''",
												'no_mostrar' => "TEXT NOTNULL",
												'titular' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'titulin' => "VARCHAR(15) NOTNULL DEFAULT ''",
												'titulout' => "VARCHAR(15) NOTNULL DEFAULT ''",
												'fitxer' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'textfitxer' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'verifica' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'admet_comentaris' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'ncid' => "INT(10) NOTNULL DEFAULT '0'",
												'tid' => "INT(10) NOTNULL DEFAULT '0'",
												'marca' => "TEXT NOTNULL",
												'edited' => "VARCHAR(15) NOTNULL DEFAULT ''",
												'edited_by' => "INT(10) NOTNULL DEFAULT '0'",
												'lang' => "VARCHAR(3) NOTNULL DEFAULT ''",
												'public' => "TINYINT(1) NOTNULL DEFAULT '0'",
												'sharedFrom' => "VARCHAR(50) NOTNULL DEFAULT ''",
												'literalGroups' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'sharedId' => "INT(10) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_noteboard_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_noteboard_column_def'], 'iw_');
	
	// iw_noteboard_themes table definition
	$pntable['iw_noteboard_themes'] = DBUtil::getLimitedTablename('iw_noteboard_themes');
	$pntable['iw_noteboard_topics'] = DBUtil::getLimitedTablename('iw_noteboard_topics');
	$pntable['iw_noteboard_topics_column'] = array('tid' => 'iw_tid',
													'nomtema' => 'iw_nomtema',
													'descriu' => 'iw_descriu',													'grup' => 'iw_grup');

	$pntable['iw_noteboard_topics_column_def'] = array('tid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'nomtema' => "VARCHAR(100) NOTNULL DEFAULT ''",
														'descriu' => "VARCHAR(255) NOTNULL DEFAULT ''",
														'grup' => "INT(10) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_noteboard_topics_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_noteboard_topics_column_def'], 'iw_');

	// iw_noteboard_public table definition
	$pntable['iw_noteboard_public'] = DBUtil::getLimitedTablename('iw_noteboard_public');
	$pntable['iw_noteboard_public_column'] = array('pid' => 'iw_pid',
													'url' => 'iw_url',
													'descriu' => 'iw_descriu',
													'name' => 'iw_name',
													'testDate' => 'iw_testDate');

	$pntable['iw_noteboard_public_column_def'] = array('pid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
														'url' => "VARCHAR(255) NOTNULL DEFAULT ''",
														'descriu' => "VARCHAR(255) NOTNULL DEFAULT ''",
														'name' => "VARCHAR(255) NOTNULL DEFAULT ''",
														'testDate' => "VARCHAR(20) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_noteboard_public_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_noteboard_public_column_def'], 'iw_');


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
