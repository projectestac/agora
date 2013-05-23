<?php

/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons: Intraweb
 * @subpackage IWbookings
 */

/**
 * Define module tables
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return module tables information
 */
function IWbookings_tables() {
    // Initialize table array
    $table = array();

    // IWbookings table definition
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

    $table['IWbookings_column_def'] = array('bid' => "I NOTNULL AUTO PRIMARY",
        'sid' => "I NOTNULL DEFAULT '0'",
        'user' => "I NOTNULL DEFAULT '0'",
        'start' => "T NOTNULL DEFAULT '0000-00-00 00:00:00'",
        'end' => "T NOTNULL DEFAULT '0000-00-00 00:00:00'",
        'usrgroup' => "C(30) NOTNULL DEFAULT ''",
        'reason' => "C(255) NOTNULL DEFAULT ''",
        'dayofweek' => "I(1) NOTNULL DEFAULT '0'",
        'temp' => "I(1) NOTNULL DEFAULT '0'",
        'cancel' => "I(1) NOTNULL DEFAULT '0'",
        'bkey' => "I(10) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWbookings_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWbookings_column_def'], 'iw_');

    // IWbookings_spaces table definition
    $table['IWbookings_spaces'] = DBUtil::getLimitedTablename('IWbookings_spaces');
    $table['IWbookings_spaces_column'] = array('sid' => 'sid',
        'space_name' => 'space_name',
        'description' => 'description',
        'mdid' => 'mdid',
        'vertical' => 'vertical',
        'color' => 'color',
        'active' => 'active');

    $table['IWbookings_spaces_column_def'] = array('sid' => "I NOTNULL AUTO PRIMARY",
        'space_name' => "C(100) NOTNULL DEFAULT ''",
        'description' => "C(255) NOTNULL DEFAULT ''",
        'mdid' => "I NOTNULL DEFAULT '0'",
        'vertical' => "I(1) NOTNULL DEFAULT '0'",
        'color' => "C(7) NOT NULL DEFAULT '#FFFFFF'",
        'active' => "I(1) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWbookings_spaces_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWbookings_spaces_column_def'], 'iw_');

      // IWmain table definition needed in this module
        $table['IWmain'] = DBUtil::getLimitedTablename('IWmain');
        $table['IWmain_column'] = array('id' => 'iw_id',
        'uid' => 'iw_uid',
        'module' => 'iw_module',
        'name' => 'iw_name',
        'value' => 'iw_value',
        'lifetime' => 'iw_lifetime');

      // iw_timeframes table definition needed in this module
        // IWtimeframes table definition
            $table['IWtimeframes'] = DBUtil::getLimitedTablename('IWtimeframes');
            $table['IWtimeframes_column'] = array('hid' => 'hid',
                                                  'mdid' => 'mdid', //identifica el marc horari
                                                  'start' => 'start',
                                                  'end' => 'end',
                                                  'descriu' => 'descriu');

            $table['IWtimeframes_definition'] = DBUtil::getLimitedTablename('IWtimeframes_definition');
            $table['IWtimeframes_definition_column'] = array('mdid' => 'mdid',
                                                     'nom_marc' => 'nom_marc',
                                                     'descriu' => 'descriu');
            $table['IWtimeframes_definition_column_def'] = array('mdid' => "I NOTNULL AUTO PRIMARY",
                                                         'nom_marc' => "C(50) NOTNULL DEFAULT ''",
                                                         'descriu' => "C(255) NOTNULL DEFAULT ''");

    // Return the table information
    return $table;
}