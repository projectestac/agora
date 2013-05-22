<?php

/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Moodle
 */

/**
 * Define module tables
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWmoodle_tables() {
    // Initialise table array
    $table = array();

    // iw_webbox table definition
    $table['IWmoodle'] = DBUtil::getLimitedTablename('IWmoodle');
    $table['IWmoodle_column'] = array('mid' => 'iw_mid',
        'mcid' => 'iw_mcid',
        'uid' => 'iw_uid',
        'role' => 'iw_role');

    $table['IWmoodle_column_def'] = array('mid' => "I NOTNULL AUTO PRIMARY",
        'mcid' => "I NOTNULL DEFAULT '0'",
        'uid' => "I NOTNULL DEFAULT '0'",
        'role' => "I NOTNULL DEFAULT '0'");

    /*
      // Define tables from groups and users that are used in this module
      $table['group_membership'] = DBUtil::getLimitedTablename('group_membership');
      $table['group_membership_column'] = array('pn_uid' => 'pn_uid');

      $table['users'] = DBUtil::getLimitedTablename('users');
      $table['users_column'] = array('pn_uid' => 'pn_uid',
      'pn_pass' => 'pn_pass',
      'pn_uname' => 'pn_uname');
     */




    ObjectUtil::addStandardFieldsToTableDefinition($table['IWmoodle_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWmoodle_column_def'], 'iw_');

    // Return the table information
    return $table;
}
