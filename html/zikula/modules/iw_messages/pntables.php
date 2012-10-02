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
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
 
function iw_messages_pntables()
{
    // Initialise table array
	$pntable = array();
		
	// iw_noteboard table definition
	$pntable['iw_messages'] = DBUtil::getLimitedTablename('iw_messages');
	$pntable['iw_messages_column'] = array('msg_id' => 'iw_msg_id',
						'msg_image' => 'iw_msg_image',
						'subject' => 'iw_subject',
						'from_userid' => 'iw_from_userid',
						'to_userid' => 'iw_to_userid',
						'msg_time' => 'iw_msg_time',
						'msg_readtime' => 'iw_msg_readtime',
						'msg_text' => 'iw_msg_text',
						'read_msg' => 'iw_read_msg',
						'del_msg_to' => 'iw_del_msg_to',
						'del_msg_from' => 'iw_del_msg_from',
						'marcat' => 'iw_marcat',
						'reply' => 'iw_reply',
						'file1' => 'iw_file1',
						'file2' => 'iw_file2',
						'file3' => 'iw_file3',
						'replied' => 'iw_replied');

	$pntable['iw_messages_column_def'] = array('msg_id' => "INT(10) NOTNULL AUTOINCREMENT KEY",
							'msg_image' => "VARCHAR(100) NOTNULL DEFAULT ''",
							'subject' => "VARCHAR(100) NOTNULL DEFAULT ''",
							'from_userid' => "INT(10) NOTNULL DEFAULT '0'",
							'to_userid' => "INT(10) NOTNULL DEFAULT '0'",
							'msg_time' => "VARCHAR(20) NOTNULL DEFAULT ''",
							'msg_readtime' => "VARCHAR(20) NOTNULL DEFAULT ''",
							'msg_text' => "TEXT NOTNULL",
							'read_msg' => "INT(4) NOTNULL DEFAULT '0'",
							'del_msg_to' => "TINYINT(4) NOTNULL DEFAULT '0'",
							'del_msg_from' => "TINYINT(4) NOTNULL DEFAULT '0'",
							'marcat' => "TINYINT(1) NOTNULL DEFAULT '0'",
							'reply' => "TEXT NOTNULL",
							'file1' => "VARCHAR(100) NOTNULL DEFAULT ''",
							'file2' => "VARCHAR(100) NOTNULL DEFAULT ''",
							'file3' => "VARCHAR(100) NOTNULL DEFAULT ''",
							'replied' => "TINYINT(1) NOTNULL DEFAULT '0'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_messages_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_messages_column_def'], 'iw_');

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
