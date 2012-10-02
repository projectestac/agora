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
function IWmoodle_pntables() {
    // Initialise table array
    $pntable = array();

    // iw_webbox table definition
    $pntable['IWmoodle'] = DBUtil::getLimitedTablename('IWmoodle');
    $pntable['IWmoodle_column'] = array('mid' => 'iw_mid',
        'mcid' => 'iw_mcid',
        'uid' => 'iw_uid',
        'role' => 'iw_role');

    $pntable['IWmoodle_column_def'] = array('mid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
        'mcid' => "INT(11) NOTNULL DEFAULT '0'",
        'uid' => "INT(11) NOTNULL DEFAULT '0'",
        'role' => "INT(11) NOTNULL DEFAULT '0'");

    /*
      // Define tables from groups and users that are used in this module
      $pntable['group_membership'] = DBUtil::getLimitedTablename('group_membership');
      $pntable['group_membership_column'] = array('pn_uid' => 'pn_uid');

      $pntable['users'] = DBUtil::getLimitedTablename('users');
      $pntable['users_column'] = array('pn_uid' => 'pn_uid',
      'pn_pass' => 'pn_pass',
      'pn_uname' => 'pn_uname');
     */




    ObjectUtil::addStandardFieldsToTableDefinition($pntable['IWmoodle_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['IWmoodle_column_def'], 'iw_');

    // Return the table information
    return $pntable;
}
