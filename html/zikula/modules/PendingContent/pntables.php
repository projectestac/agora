<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage PendingContent
 */

/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in the information
 */
function pendingcontent_pntables()
{
    // Initialise table array
    $pntable = array();

    // Full table definition
    $pntable['pendingcontent'] = DBUtil::getLimitedTablename('pendingcontent');
    $pntable['pendingcontent_column'] = array('pid'   => 'pn_pid',
                                              'url'   => 'pn_url',
                                              'name'  => 'pn_name',
                                              'sql'   => 'pn_sql');
    $pntable['pendingcontent_column_def'] = array('pid'  => 'I(10) NOTNULL AUTOINCREMENT PRIMARY',
                                                  'url'  => "C(255) NOTNULL DEFAULT ''",
                                                  'name' => "C(255) NOTNULL DEFAULT ''",
                                                  'sql'  => "C(255) NOTNULL DEFAULT ''");

    // Return the table information
    return $pntable;
}
