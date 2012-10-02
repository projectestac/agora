<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Forums
 */

/**
 * Define module tables
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */

function iw_forums_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_forums_def table definition
	$pntable['iw_forums_def'] = DBUtil::getLimitedTablename('iw_forums_def');

	//fields
	$pntable['iw_forums_def_column'] = array('fid' => 'iw_fid',
							'nom_forum' => 'iw_nom_forum',
							'descriu' => 'iw_descriu',
							'actiu' => 'iw_actiu',
							'adjunts' => 'iw_adjunts',
							'grup' => 'iw_grup',
							'mod' => 'iw_mod',
							'observacions' => 'iw_observacions',
							'msgDelTime' => 'iw_msgDelTime',
							'msgEditTime' => 'iw_msgEditTime');

	$pntable['iw_forums_def_column_def'] = array('fid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
								'nom_forum' => "VARCHAR(50) NOTNULL DEFAULT ''",
								'descriu' => "VARCHAR(255) NOTNULL DEFAULT ''",
								'actiu' => "TINYINT(1) NOTNULL DEFAULT '0'",
								'adjunts' => "TINYINT(1) NOTNULL DEFAULT '0'",
								'grup' => "VARCHAR(255) NOTNULL DEFAULT ''",
								'mod' => "VARCHAR(255) NOTNULL DEFAULT ''",
								'observacions' => "VARCHAR(255) NOTNULL DEFAULT ''",
								'msgDelTime' => "VARCHAR(3) NOTNULL DEFAULT '0'",
								'msgEditTime' => "VARCHAR(3) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forums_def_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forums_def_column_def'], 'iw_');


	// iw_forums_temes table definition
	$pntable['iw_forums_temes'] = DBUtil::getLimitedTablename('iw_forums_temes');

	//fields
	$pntable['iw_forums_temes_column'] = array('ftid' => 'iw_ftid',
								'fid' => 'iw_fid',
								'titol' => 'iw_titol',
								'descriu' => 'iw_descriu',
								'usuari' => 'iw_usuari',
								'data' => 'iw_data',
								'order' => 'iw_order',
								'last_user' => 'iw_last_user',
								'last_time' => 'iw_last_time');

	$pntable['iw_forums_temes_column_def'] = array('ftid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
								'fid' => "INT(10) NOTNULL DEFAULT '0'",
								'titol' => "VARCHAR(100) NOTNULL DEFAULT ''",
								'descriu' => "TEXT NOTNULL",
								'usuari' => "INT(10) NOTNULL DEFAULT '0'",
								'data' => "VARCHAR(20) NOTNULL DEFAULT ''",
								'order' => "INT(10) NOTNULL DEFAULT '0'",
								'last_user' => "INT(10) NOTNULL DEFAULT '0'",
								'last_time' => "VARCHAR(20) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forums_temes_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forums_temes_column_def'], 'iw_');

	// iw_forums_msg table definition
	$pntable['iw_forums_msg'] = DBUtil::getLimitedTablename('iw_forums_msg');

	//fields
	$pntable['iw_forums_msg_column'] = array('fmid' => 'iw_fmid',
							'fid' => 'iw_fid',
							'ftid' => 'iw_ftid',
							'titol' => 'iw_titol',
							'usuari' => 'iw_usuari',
							'data' => 'iw_data',
							'missatge' => 'iw_missatge',
							'adjunt' => 'iw_adjunt',
							'icon' => 'iw_icon',
							'llegit' => 'iw_llegit',
							'marcat' => 'iw_marcat',
							'idparent' => 'iw_idparent',
							'lastdate' => 'iw_lastdate');

	$pntable['iw_forums_msg_column_def'] = array('fmid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
								'fid' => "INT(10) NOTNULL DEFAULT '0'",
								'ftid' => "INT(10) NOTNULL DEFAULT '0'",
								'titol' => "VARCHAR(100) NOTNULL DEFAULT ''",
								'usuari' => "INT(10) NOTNULL DEFAULT '0'",
								'data' => "VARCHAR(20) NOTNULL DEFAULT ''",
								'missatge' => "TEXT NOTNULL",
								'adjunt' => "VARCHAR(255) NOTNULL DEFAULT ''",
								'icon' => "VARCHAR(100) NOTNULL DEFAULT ''",
								'llegit' => "TEXT NOTNULL",
								'marcat' => "TEXT NOTNULL",
								'idparent' => "INT(10) NOTNULL DEFAULT '0' KEY",
								'lastdate' => "VARCHAR(20) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_forums_msg_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_forums_msg_column_def'], 'iw_');

	//Retorna la informaciï¿œ de la taula
	return $pntable;
}
