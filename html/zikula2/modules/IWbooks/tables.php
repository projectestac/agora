<?php

function IWbooks_tables() {
    // Initialise table array
    $table = array();

    $table['IWbooks'] = DBUtil::getLimitedTablename('IWbooks');

    $table['IWbooks_column'] = array(
        'tid' => 'pn_tid',
        'autor' => 'pn_autor',
        'titol' => 'pn_titol',
        'editorial' => 'pn_editorial',
        'any_publi' => 'pn_any_publi',
        'isbn' => 'pn_isbn',
        'codi_mat' => 'pn_codi_mat',
        'lectura' => 'pn_lectura',
        'any' => 'pn_any',
        'etapa' => 'pn_etapa',
        'nivell' => 'pn_nivell',
        'avaluacio' => 'pn_avaluacio',
        'optativa' => 'pn_optativa',
        'observacions' => 'pn_observacions',
        'materials' => 'pn_materials'
    );

    $table['IWbooks_column_def'] = array(
        'tid' => "I NOTNULL AUTO PRIMARY",
        'autor' => "C(50) NOT NULL DEFAULT ''",
        'titol' => "C(50) NOT NULL DEFAULT ''",
        'editorial' => "C(50) NOT NULL DEFAULT ''",
        'any_publi' => "C(4)  NOT NULL DEFAULT ''",
        'isbn' => "C(20) NOT NULL DEFAULT ''",
        'codi_mat' => "C(3)  NOT NULL DEFAULT ''",
        'lectura' => "I(1)  NOT NULL DEFAULT 0",
        'any' => "C(4)  NOT NULL DEFAULT ''",
        'etapa' => "C(32) NOT NULL DEFAULT ''",
        'nivell' => "C(15) NOT NULL DEFAULT ''",
        'avaluacio' => "C(1) NOT NULL DEFAULT ''",
        'optativa' => "I(1)  NOT NULL DEFAULT 0",
        'observacions' => "C(100) NOT NULL DEFAULT ''",
        'materials' => "X NOT NULL"
    );

    $table['IWbooks_column_idx'] = array('tid' => 'tid');

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWbooks_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWbooks_column_def'], 'pn_');


    $table['IWbooks_materies'] = DBUtil::getLimitedTablename('IWbooks_materies');
    $table['IWbooks_materies_column'] = array(
        'tid' => 'pn_tid',
        'codi_mat' => 'pn_codi_mat',
        'materia' => 'pn_materia'
    );

    $table['IWbooks_materies_column_def'] = array(
        'tid' => "I NOTNULL AUTO PRIMARY",
        'codi_mat' => "C(3) NOT NULL default ''",
        'materia' => "C(50) NOT NULL default ''"
    );

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWbooks_materies_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWbooks_materies_column_def'], 'pn_');

    return $table;
}