<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 334 2009-11-09 05:51:54Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Feeds
 */

/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in the information
 */
function Feeds_pntables()
{
    // Initialise table array
    $pntable = array();

    // Full table definition
    $pntable['feeds'] = DBUtil::getLimitedTablename('feeds');
    $pntable['feeds_column'] = array('fid'       => 'pn_fid',
                                     'name'      => 'pn_name',
                                     'urltitle'  => 'pn_urltitle',
                                     'url'       => 'pn_url');
    $pntable['feeds_column_def'] = array('fid'      => 'I(10) NOTNULL AUTOINCREMENT PRIMARY',
                                         'name'     => "C(255) NOTNULL DEFAULT ''",
                                         'urltitle' => "C(255) NOTNULL DEFAULT ''",
                                         'url'      => "C(255) NOTNULL DEFAULT ''");

    // Enable categorization services
    $pntable['feeds_db_extra_enable_categorization'] = pnModGetVar('Feeds', 'enablecategorization');
    $pntable['feeds_primary_key_column'] = 'fid';

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition($pntable['feeds_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['feeds_column_def']);

    // old table names for upgrade
    $pntable['RSS'] = DBUtil::getLimitedTablename('RSS');
    $pntable['rss'] = DBUtil::getLimitedTablename('rss');

    // Return the table information
    return $pntable;
}
