<?php
/**
 * Define module tables
 * @author Albert Pérez Monfort
 * @author Josep Ferràndiz Farré
 * @return module tables information
 */
function IWtimeframes_tables() {
    $table = array();

    // IWtimeframes_def table definition
    $table['IWtimeframes_definition'] = DBUtil::getLimitedTablename('IWtimeframes_definition');
    $table['IWtimeframes_definition_column'] = array('mdid' => 'mdid',
                                                     'nom_marc' => 'nom_marc',
                                                     'descriu' => 'descriu');

    $table['IWtimeframes_definition_column_def'] = array('mdid' => "I NOTNULL AUTO PRIMARY",
                                                         'nom_marc' => "C(50) NOTNULL DEFAULT ''",
                                                         'descriu' => "C(255) NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWtimeframes_definition_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWtimeframes_definition_column_def'], 'iw_');

    // IWtimeframes table definition
    $table['IWtimeframes'] = DBUtil::getLimitedTablename('IWtimeframes');
    $table['IWtimeframes_column'] = array('hid' => 'hid',
                                          'mdid' => 'mdid', //identifica el marc horari
                                          'start' => 'start',
                                          'end' => 'end',
                                          'descriu' => 'descriu');

    $table['IWtimeframes_column_def'] = array('hid' => "I NOTNULL AUTO PRIMARY",
                                              'mdid' => "I NOTNULL DEFAULT '0'",
                                              'start' => "T DEFDATETIME NOTNULL DEFAULT '1970-01-01 00:00:00'",
                                              'end' => "T DEFDATETIME NOTNULL DEFAULT '1970-01-01 00:00:00'",
                                              'descriu' => "C(255) NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWtimeframes_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWtimeframes_column_def'], 'iw_');

    // IWmain table definition needed in this module
    $table['IWmain'] = DBUtil::getLimitedTablename('IWmain');
    $table['IWmain_column'] = array('id' => 'iw_id',
        'uid' => 'iw_uid',
        'module' => 'iw_module',
        'name' => 'iw_name',
        'value' => 'iw_value',
        'lifetime' => 'iw_lifetime');

    $table['IWbookings'] = DBUtil::getLimitedTablename('IWbookings');
    $table['IWbookings_column'] = array('bid' => 'bid',
        'user' => 'user',
        'sid' => 'sid',
        'start' => 'start',
        'end' => 'end',
        'usrgroup' => 'usrgroup',
        'dayofweek' => 'dayofweek',
        'temp' => 'temp',
        'cancel' => 'cancel',
        'reason' => 'reason',
        'bkey' => 'bkey');

    // iw_bookings_spaces table definition
    $table['IWbookings_spaces'] = DBUtil::getLimitedTablename('IWbookings_spaces');
    $table['IWbookings_spaces_column'] = array('sid' => 'sid',
        'space_name' => 'space_name',
        'description' => 'description',
        'mdid' => 'mdid',
        'vertical' => 'vertical',
        'color' => 'color',
        'active' => 'active');

    return $table;
}