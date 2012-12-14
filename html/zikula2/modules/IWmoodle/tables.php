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

    // IWmoodle table definition
    $table['IWmoodle'] = DBUtil::getLimitedTablename('IWmoodle');
    $table['IWmoodle_column'] = array('mid' => 'iw_mid',
        'mcid' => 'iw_mcid',
        'uid' => 'iw_uid',
        'role' => 'iw_role');

    $table['IWmoodle_column_def'] = array('mid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
        'mcid' => "INT(11) NOTNULL DEFAULT '0'",
        'uid' => "INT(11) NOTNULL DEFAULT '0'",
        'role' => "INT(11) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWmoodle_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWmoodle_column_def'], 'iw_');

    /*
      // Define tables from groups and users that are used in this module
      $table['group_membership'] = DBUtil::getLimitedTablename('group_membership');
      $table['group_membership_column'] = array('uid' => 'uid');

      $table['users'] = DBUtil::getLimitedTablename('users');
      $table['users_column'] = array('uid' => 'uid',
      'pass' => 'pass',
      'uname' => 'uname');
     * 
     */
/*
    $table['users'] = 'users';
    $table['users_column'] = array('uid' => 'uid',
        'uname' => 'uname',
        'pass' => 'pass',
    );

    $table['group_membership'] = 'group_membership';
    $table['group_membership_column'] = array('gid' => 'gid',
        'uid' => 'uid');

    $table['IWusers'] = 'IWusers';
    $table['IWusers_column'] = array('uid' => 'iw_uid',
        'nom' => 'iw_nom',
        'cognom1' => 'iw_cognom1',
    );
*/
    /*
      $items = array('uid' => $items['uid'],
      'nom' => $nom,
      'cognom1' => $cognoms);
      if (!DBUtil::insertObject($items, 'IWusers', 'suid')) {
      return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
      }
     * 
     */

    // Return the table information
    return $table;
}
