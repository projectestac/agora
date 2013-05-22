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
function IWmessages_tables() {
    // Initialise table array
    $table = array();

    // iw_noteboard table definition
    $table['IWmessages'] = DBUtil::getLimitedTablename('IWmessages');
    $table['IWmessages_column'] = array('msg_id' => 'iw_msg_id',
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

    $table['IWmessages_column_def'] = array('msg_id' => "I NOTNULL AUTO PRIMARY",
        'msg_image' => "C(100) NOTNULL DEFAULT ''",
        'subject' => "C(100) NOTNULL DEFAULT ''",
        'from_userid' => "I(10) NOTNULL DEFAULT '0'",
        'to_userid' => "I(10) NOTNULL DEFAULT '0'",
        'msg_time' => "C(20) NOTNULL DEFAULT ''",
        'msg_readtime' => "C(20) NOTNULL DEFAULT ''",
        'msg_text' => "X NOTNULL",
        'read_msg' => "I(4) NOTNULL DEFAULT '0'",
        'del_msg_to' => "I(4) NOTNULL DEFAULT '0'",
        'del_msg_from' => "I(4) NOTNULL DEFAULT '0'",
        'marcat' => "I(1) NOTNULL DEFAULT '0'",
        'reply' => "X NOTNULL",
        'file1' => "C(100) NOTNULL DEFAULT ''",
        'file2' => "C(100) NOTNULL DEFAULT ''",
        'file3' => "C(100) NOTNULL DEFAULT ''",
        'replied' => "I(1) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWmessages_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWmessages_column_def'], 'iw_');

    // Return the table information
    return $table;
}
