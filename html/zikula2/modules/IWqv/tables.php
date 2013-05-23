<?php
/**
 * Define module tables
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return module tables information
 */
function IWqv_tables() {
    // Initialise table array
    $tables = array();

    // IWqv table definition
    $tables['IWqv'] = DBUtil::getLimitedTablename('IWqv');
    $tables['IWqv_column'] = array('qvid' => 'iw_qvid',
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
    $tables['IWqv_column_def'] = array('qvid' => "I NOTNULL AUTO PRIMARY",
        'teacher' => "INT(11) NOTNULL",
        'groups' => "C(255) NOTNULL",
        'title' => "C(255) NOTNULL DEFAULT ''",
        'description' => "X NOTNULL DEFAULT ''",
        'url' => "C(255) NOTNULL DEFAULT ''",
        'skin' => "C(20) NOTNULL DEFAULT ''",
        'lang' => "C(10) NOTNULL DEFAULT ''",
        'maxdeliver' => "INT(3) NOTNULL DEFAULT '-1'",
        'showcorrection' => "INT(1) NOTNULL DEFAULT '1'",
        'showinteraction' => "INT(1) NOTNULL DEFAULT '1'",
        'ordersections' => "INT(1) NOTNULL DEFAULT '0'",
        'orderitems' => "INT(1) NOTNULL DEFAULT '0'",
        'target' => "C(10) NOTNULL DEFAULT 'blank'",
        'width' => "C(10) NULL",
        'height' => "C(10) NULL",
        'active' => "INT(1) NOTNULL DEFAULT '1'",
        'observations' => "X NOTNULL");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWqv_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWqv_column_def'], 'iw_');

    // IWqv_assignments table definition
    $tables['IWqv_assignments'] = DBUtil::getLimitedTablename('IWqv_assignments');
    $tables['IWqv_assignments_column'] = array('qvaid' => 'iw_qvaid',
        'qvid' => 'iw_qvid',
        'userid' => 'iw_userid',
        'sectionorder' => 'iw_sectionorder',
        'itemorder' => 'iw_itemorder',
        'teachercomments' => 'iw_teachercomments',
        'teacherobservations' => 'iw_teacherobservations');

    $tables['IWqv_assignments_column_def'] = array('qvaid' => "I NOTNULL AUTO PRIMARY",
        'qvid' => "INT(11) NOTNULL",
        'userid' => "INT(11) NOTNULL",
        'sectionorder' => "INT(10) NOTNULL DEFAULT '0'",
        'itemorder' => "INT(10) NOTNULL DEFAULT '0'",
        'teachercomments' => "X NULL",
        'teacherobservations' => "X NULL");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWqv_assignments_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWqv_assignments_column_def'], 'iw_');

    // IWqv_sections table definition
    $tables['IWqv_sections'] = DBUtil::getLimitedTablename('IWqv_sections');
    $tables['IWqv_sections_column'] = array('qvsid' => 'iw_qvsid',
        'qvaid' => 'iw_qvaid',
        'sectionid' => 'iw_sectionid',
        'responses' => 'iw_responses',
        'scores' => 'iw_scores',
        'pendingscores' => 'iw_pendingscores',
        'attempts' => 'iw_attempts',
        'state' => 'iw_state',
        'time' => 'iw_time');

    $tables['IWqv_sections_column_def'] = array('qvsid' => "I NOTNULL AUTO PRIMARY",
        'qvaid' => "INT(11) NOTNULL",
        'sectionid' => "C(255) NOTNULL",
        'responses' => "X NULL",
        'scores' => "X NULL",
        'pendingscores' => "X NULL",
        'attempts' => "INT(60) NULL DEFAULT '0'",
        'state' => "INT(1) NULL DEFAULT '0'",
        'time' => "C(8) NULL DEFAULT '00:00:00'");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWqv_sections_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWqv_sections_column_def'], 'iw_');

    // IWqv_messages table definition
    $tables['IWqv_messages'] = DBUtil::getLimitedTablename('IWqv_messages');
    $tables['IWqv_messages_column'] = array('qvmid' => 'iw_qvmid',
        'qvsid' => 'iw_qvsid',
        'itemid' => 'iw_itemid',
        'userid' => 'iw_userid',
        'message' => 'iw_message');

    $tables['IWqv_messages_column_def'] = array('qvmid' => "I NOTNULL AUTO PRIMARY",
        'qvsid' => "INT(11) NOTNULL",
        'itemid' => "C(255) NOTNULL",
        'userid' => "INT(11) NOTNULL",
        'message' => "X NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWqv_messages_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWqv_messages_column_def'], 'iw_');

    // IWqv_messages table definition
    $tables['IWqv_messages_read'] = DBUtil::getLimitedTablename('IWqv_messages_read');
    $tables['IWqv_messages_read_column'] = array('qvmrid' => 'iw_qvmrid',
        'qvmid' => 'iw_qvmid',
        'userid' => 'iw_userid');

    $tables['IWqv_messages_read_column_def'] = array('qvmrid' => "I NOTNULL AUTO PRIMARY",
        'qvmid' => "INT(11) NOTNULL",
        'userid' => "INT(11) NOTNULL");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWqv_messages_read_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWqv_messages_read_column_def'], 'iw_');



    // IWmain table definition needed in this module
    $tables['IWmain'] = DBUtil::getLimitedTablename('IWmain');
    $tables['IWmain_column'] = array('id' => 'iw_id',
        'uid' => 'iw_uid',
        'module' => 'iw_module',
        'name' => 'iw_name',
        'value' => 'iw_value',
        'lifetime' => 'iw_lifetime');

    // Return the table information
    return $tables;
}
