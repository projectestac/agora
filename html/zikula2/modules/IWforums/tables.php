<?php

/**
 * Define module tables
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWforums_tables() {
    // Initialise table array
    $tables = array();

    // IWforums_definition table definition
    $tables['IWforums_definition'] = DBUtil::getLimitedTablename('IWforums_definition');

    //fields
    $tables['IWforums_definition_column'] = array('fid' => 'iw_fid',
        'nom_forum' => 'iw_nom_forum',
        'descriu' => 'iw_descriu',
        'actiu' => 'iw_actiu',
        'adjunts' => 'iw_adjunts',
        'grup' => 'iw_grup',
        'mod' => 'iw_mod',
        'observacions' => 'iw_observacions',
        'msgDelTime' => 'iw_msgDelTime',
        'msgEditTime' => 'iw_msgEditTime');

    $tables['IWforums_definition_column_def'] = array('fid' => "I NOTNULL AUTO PRIMARY",
        'nom_forum' => "C(50) NOTNULL DEFAULT ''",
        'descriu' => "C(255) NOTNULL DEFAULT ''",
        'actiu' => "I(1) NOTNULL DEFAULT '0'",
        'adjunts' => "I(1) NOTNULL DEFAULT '0'",
        'grup' => "C(255) NOTNULL DEFAULT ''",
        'mod' => "C(255) NOTNULL DEFAULT ''",
        'observacions' => "C(255) NOTNULL DEFAULT ''",
        'msgDelTime' => "C(3) NOTNULL DEFAULT '0'",
        'msgEditTime' => "C(3) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforums_definition_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforums_definition_column_def'], 'iw_');


    // IWforums_temes table definition
    $tables['IWforums_temes'] = DBUtil::getLimitedTablename('IWforums_temes');

    //fields
    $tables['IWforums_temes_column'] = array('ftid' => 'iw_ftid',
        'fid' => 'iw_fid',
        'titol' => 'iw_titol',
        'descriu' => 'iw_descriu',
        'usuari' => 'iw_usuari',
        'data' => 'iw_data',
        'order' => 'iw_order',
        'last_user' => 'iw_last_user',
        'last_time' => 'iw_last_time');

    $tables['IWforums_temes_column_def'] = array('ftid' => "I NOTNULL AUTO PRIMARY",
        'fid' => "I NOTNULL DEFAULT '0'",
        'titol' => "C(100) NOTNULL DEFAULT ''",
        'descriu' => "X NOTNULL",
        'usuari' => "I NOTNULL DEFAULT '0'",
        'data' => "C(20) NOTNULL DEFAULT ''",
        'order' => "I NOTNULL DEFAULT '0'",
        'last_user' => "I NOTNULL DEFAULT '0'",
        'last_time' => "C(20) NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforums_temes_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforums_temes_column_def'], 'iw_');

    // IWforums_msg table definition
    $tables['IWforums_msg'] = DBUtil::getLimitedTablename('IWforums_msg');

    //fields
    $tables['IWforums_msg_column'] = array('fmid' => 'iw_fmid',
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
        'lastdate' => 'iw_lastdate',
        'onTop' => 'iw_onTop',
        );

    $tables['IWforums_msg_column_def'] = array('fmid' => "I NOTNULL AUTO PRIMARY",
        'fid' => "I NOTNULL DEFAULT '0'",
        'ftid' => "I NOTNULL DEFAULT '0'",
        'titol' => "C(100) NOTNULL DEFAULT ''",
        'usuari' => "I NOTNULL DEFAULT '0'",
        'data' => "C(20) NOTNULL DEFAULT ''",
        'missatge' => "X NOTNULL",
        'adjunt' => "C(255) NOTNULL DEFAULT ''",
        'icon' => "C(100) NOTNULL DEFAULT ''",
        'llegit' => "X NOTNULL",
        'marcat' => "X NOTNULL",
        'idparent' => "I NOTNULL DEFAULT '0'",
        'lastdate' => "C(20) NOTNULL DEFAULT ''",
        'onTop' => "I(1) NOTNULL DEFAULT '0'",
        );

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforums_msg_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforums_msg_column_def'], 'iw_');

    //Retorna la informaciï¿œ de la taula
    return $tables;
}