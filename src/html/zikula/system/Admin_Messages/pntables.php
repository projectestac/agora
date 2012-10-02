<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin_Messages
 */

/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in the information
 */
function Admin_Messages_pntables()
{
    // Initialise table array
    $pntable = array();

    // Get the name for the table.
    $message = DBUtil::getLimitedTablename('message');
    $pntable['message'] = $message;
    $pntable['message_column'] = array('mid'         => 'pn_mid',
                                       'title'       => 'pn_title',
                                       'content'     => 'pn_content',
                                       'date'        => 'pn_date',
                                       'expire'      => 'pn_expire',
                                       'active'      => 'pn_active',
                                       'view'        => 'pn_view',
                                       'language'    => 'pn_language');

    $pntable['message_column_def'] = array('mid'      => 'I PRIMARY AUTO',
                                           'title'    => "C(100) NOTNULL DEFAULT ''",
                                           'content'  => "XL NOTNULL",
                                           'date'     => "I NOTNULL DEFAULT 0",
                                           'expire'   => "I NOTNULL DEFAULT 0",
                                           'active'   => "I NOTNULL DEFAULT 1",
                                           'view'     => "I NOTNULL DEFAULT 1",
                                           'language' => "C(30) NOTNULL DEFAULT ''");


    // Return the table information
    return $pntable;
}
