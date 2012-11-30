<?php

/**
 * Define module tables
 * @author Albert P�rez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWmain_tables() {
    // Initialise table array
    $table = array();

    // IWmain table definition
    $table['IWmain'] = DBUtil::getLimitedTablename('IWmain');
    $table['IWmain_column'] = array('id' => 'iw_id',
        'module' => 'iw_module',
        'name' => 'iw_name',
        'value' => 'iw_value',
        'uid' => 'iw_uid',
        'lifetime' => 'iw_lifetime',
        'nult' => 'iw_nult');

    $table['IWmain_column_def'] = array('id' => "I NOTNULL AUTO PRIMARY",
        'module' => "C(50) NOTNULL DEFAULT ''",
        'name' => "C(50) NOTNULL DEFAULT ''",
        'value' => "X NOTNULL",
        'uid' => "I NOTNULL DEFAULT '0'",
        'lifetime' => "C(20) NOTNULL DEFAULT '0'",
        'nult' => "I(1) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWmain_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWmain_column_def'], 'iw_');

    // logs table definition
    $table['IWmain_logs'] = DBUtil::getLimitedTablename('IWmain_logs');
    $table['IWmain_logs_column'] = array('logId' => 'iw_logId',
        'moduleName' => 'iw_moduleName',
        'actionType' => 'iw_actionType', // 1 - add / 2 - Edit / 3 - Delete
        'visible' => 'iw_visible', // 1 - all users / 0 - only administrators
        'actionText' => 'iw_actionText',
        'logIp' => 'iw_logIp',
        'indexName' => 'iw_indexName',
        'indexValue' => 'iw_indexValue',
        'indexName1' => 'iw_indexName1',
        'indexValue1' => 'iw_indexValue1',
        'error' => 'iw_error',
    );

    $table['IWmain_logs_column_def'] = array('logId' => "I NOTNULL AUTO PRIMARY",
        'moduleName' => "C(25) NOTNULL DEFAULT ''",
        'actionType' => "I(1) NOTNULL DEFAULT '0'",
        'visible' => "I(1) NOTNULL DEFAULT '0'",
        'actionText' => "C(255) NOTNULL DEFAULT ''",
        'logIp' => "C(15) NOTNULL DEFAULT ''",
        'indexName' => "C(15) NOTNULL DEFAULT ''",
        'indexValue' => "I NOTNULL DEFAULT '0'",
        'indexName1' => "C(15) NOTNULL DEFAULT ''",
        'indexValue1' => "I NOTNULL DEFAULT '0'",
        'error' => "I(1) NOTNULL DEFAULT '0'",
    );

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWmain_logs_column'], '');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWmain_logs_column_def']);

    // IWusers table definition
    $table['IWusers'] = DBUtil::getLimitedTablename('IWusers');
    $table['IWusers_column'] = array('suid' => 'iw_suid',
        'uid' => 'iw_uid',
        'id' => 'iw_id',
        'nom' => 'iw_nom',
        'cognom1' => 'iw_cognom1',
        'cognom2' => 'iw_cognom2',
        'naixement' => 'iw_naixement',
        'accio' => 'iw_accio',
        'sex' => 'iw_sex',
        'description' => 'iw_description',
        'avatar' => 'iw_avatar',
        'newavatar' => 'iw_newavatar',
    );
    // Return the table information
    return $table;
}