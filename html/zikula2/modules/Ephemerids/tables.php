<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */

/**
 * Populate pntables array for ephemerids module
 * @author Xiaoyu Huang
 * @return array pntable array
 */
function Ephemerids_tables()
{
    // Initialise table array
    $table = array();

    // Table name
    $ephem = DBUtil::getLimitedTablename('ephem');

    $table['ephem'] = $ephem;
    $table['ephem_column'] = array ('eid'       => 'pn_eid',
                                      'did'       => 'pn_did',
                                      'mid'       => 'pn_mid',
                                      'yid'       => 'pn_yid',
                                      'content'   => 'pn_content',
                                      'language'  => 'pn_language');

    $table['ephem_column_def'] = array('eid'      => 'I NOTNULL AUTO PRIMARY',
                                         'did'      => "I1 NOTNULL DEFAULT '0'",
                                         'mid'      => "I1 NOTNULL DEFAULT '0'",
                                         'yid'      => "I2 NOTNULL DEFAULT '0'",
                                         'content'  => 'X NOTNULL',
                                         'language' => "C(30) NOTNULL DEFAULT ''");

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition ($table['ephem_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['ephem_column_def']);

    return $table;
}
