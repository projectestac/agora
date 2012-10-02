<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * Populate pntables array for Stats module
 *
 * This function is called internally by the core whenever the module is
 * loaded. It delivers the table information to the core.
 * It can be loaded explicitly using the pnModDBInfoLoad() API function.
 *
 * @author       Mark West
 * @return       array       The table information.
 */
function Stats_pntables()
{
    // Initialise table array
    $pntable = array();

    // Counter table
    $pntable['counter'] = DBUtil::getLimitedTablename('counter');
    $pntable['counter_column'] = array('type'  => 'pn_type',
                                       'var'   => 'pn_var',
                                       'count' => 'pn_count');
    $pntable['counter_column_def'] = array('type'  => "C(80) NOTNULL DEFAULT ''",
                                           'var'   => "C(80) NOTNULL DEFAULT ''",
                                           'count' => "I UNSIGNED NOTNULL DEFAULT '0'");

    // date table
    $pntable['stats_date'] = DBUtil::getLimitedTablename('stats_date');
    $pntable['stats_date_column'] = array('date'     => 'pn_date',
                                          'hits'     => 'pn_hits');
    $pntable['stats_date_column_def'] = array('date' => "C(80) NOTNULL DEFAULT ''",
                                              'hits' => "I UNSIGNED NOTNULL DEFAULT '0'");

    // Hour column
    $pntable['stats_hour'] = DBUtil::getLimitedTablename('stats_hour');
    $pntable['stats_hour_column'] = array('hour'     => 'pn_hour',
                                          'hits'     => 'pn_hits');
    $pntable['stats_hour_column_def'] = array('hour' => "I2 NOTNULL",
                                              'hits' => "I UNSIGNED NOTNULL DEFAULT '0'");

    // Week table
    $pntable['stats_week'] = DBUtil::getLimitedTablename('stats_week');
    $pntable['stats_week_column'] = array('weekday'     => 'pn_weekday',
                                          'hits'        => 'pn_hits');
    $pntable['stats_week_column_def'] = array('weekday' => "I2 NOTNULL",
                                              'hits'    => "I UNSIGNED NOTNULL DEFAULT '0'");

    // Month table
    $pntable['stats_month'] = DBUtil::getLimitedTablename('stats_month');
    $pntable['stats_month_column'] = array('month'     => 'pn_month',
                                           'hits'      => 'pn_hits');
    $pntable['stats_month_column_def'] = array('month' => "I1 NOTNULL",
                                               'hits'  => "I UNSIGNED NOTNULL DEFAULT '0'");

    // Return the table information
    return $pntable;
}
