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
function iw_users_pntables()
{
	// Initialise table array
	$pntable = array();
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

	$pntable['iw_users_column_def'] = array('suid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
											'uid' => "INT(11) NOTNULL DEFAULT '0'",
											'id' => "VARCHAR(50) NOTNULL DEFAULT ''",
											'nom' => "VARCHAR(25) NOTNULL DEFAULT ''",
											'cognom1' => "VARCHAR(25) NOTNULL DEFAULT ''",
											'cognom2' => "VARCHAR(25) NOTNULL DEFAULT ''",
											'naixement' => "VARCHAR(8) NOTNULL DEFAULT ''",
											'accio' => "TINYINT(1) NOTNULL DEFAULT '0'");

	// iw_users table definition
	$pntable['iw_users_import'] = DBUtil::getLimitedTablename('iw_users_import');
	$pntable['iw_users_import_column'] = array('suid' => 'iw_suid',
												'uid' => 'iw_uid',
												'id' => 'iw_id',
												'nom' => 'iw_nom',
												'cognom1' => 'iw_cognom1',
												'cognom2' => 'iw_cognom2',
												'naixement' => 'iw_naixement',
												'accio' => 'iw_accio',
												'contrasenya' => 'iw_contrasenya',
												'login' => 'iw_login',
												'email' => 'iw_email',
												'grup' => 'iw_grup');

	$pntable['iw_users_import_column_def'] = array('suid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
													'uid' => "INT(11) NOTNULL DEFAULT '0'",
													'id' => "VARCHAR(50) NOTNULL DEFAULT ''",
													'nom' => "VARCHAR(25) NOTNULL DEFAULT ''",
													'cognom1' => "VARCHAR(25) NOTNULL DEFAULT ''",
													'cognom2' => "VARCHAR(25) NOTNULL DEFAULT ''",
													'naixement' => "VARCHAR(8) NOTNULL DEFAULT ''",
													'accio' => "TINYINT(1) NOTNULL DEFAULT '0'",
													'contrasenya' => "VARCHAR(25) NOTNULL DEFAULT ''",
													'login' => "VARCHAR(25) NOTNULL DEFAULT ''",
													'email' => "VARCHAR(60) NOTNULL DEFAULT ''",
													'grup' => "VARCHAR(20) NOTNULL DEFAULT ''");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_users_import_column'], 'zk_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_users_import_column_def'], 'iw_');

	// iw_users table definition
	$pntable['iw_users_aux'] = DBUtil::getLimitedTablename('iw_users_aux');
	$pntable['iw_users_aux_column'] = array('suid' => 'iw_suid',
											'uid' => 'iw_uid',
											'id' => 'iw_id',
											'nom' => 'iw_nom',
											'cognom1' => 'iw_cognom1',
											'cognom2' => 'iw_cognom2',
											'naixement' => 'iw_naixement',
											'accio' => 'iw_accio');

	$pntable['iw_users_aux_column_def'] = array('suid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
												'uid' => "INT(11) NOTNULL DEFAULT '0'",
												'id' => "VARCHAR(50) NOTNULL DEFAULT ''",
												'nom' => "VARCHAR(25) NOTNULL DEFAULT ''",
												'cognom1' => "VARCHAR(25) NOTNULL DEFAULT ''",
												'cognom2' => "VARCHAR(25) NOTNULL DEFAULT ''",
												'naixement' => "VARCHAR(8) NOTNULL DEFAULT ''",
												'accio' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_users_aux_column'], 'zk_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_users_aux_column_def'], 'iw_');

	// iw_users table definition
	$pntable['iw_users_friends'] = DBUtil::getLimitedTablename('iw_users_friends');
	$pntable['iw_users_friends_column'] = array('fid' => 'iw_fid',
												'uid' => 'iw_uid',
												'fuid' => 'iw_fuid');

	$pntable['iw_users_friends_column_def'] = array('fid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
													'uid' => "INT(11) NOTNULL DEFAULT '0'",
													'fuid' => "INT(11) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_users_friends_column'], 'zk_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_users_friends_column_def'], 'iw_');
	
	// Return the table information
	return $pntable;
}
