<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

/**
 * return the table information
 *
 * This function is called internally by the core whenever the module is
 * loaded.
 *
 * @return    array    an array with the table infomation
 */
function EZComments_tables()
{
    // Initialise table array
    $tables = array();

    // Full table definition
    $tables['EZComments'] = 'ezcomments';
    $tables['EZComments_column'] = array(
        'id'          => 'id',
        'modname'     => 'modname',
        'objectid'    => 'objectid',
        'areaid'      => 'areaid',
        'url'         => 'url',
        'date'        => 'date',
        'uid'         => 'uid',
        'owneruid'    => 'owneruid',
        'comment'     => 'comment',
        'subject'     => 'subject',
        'replyto'     => 'replyto',
        'anonname'    => 'anonname',
        'anonmail'    => 'anonmail',
        'status'      => 'status',
        'ipaddr'      => 'ipaddr',
        'type'        => 'type',
        'anonwebsite' => 'anonwebsite'
    );
    $tables['EZComments_column_def'] = array(
        'id'          => 'I AUTO PRIMARY',
        'modname'     => "C(64) NOTNULL DEFAULT ''",
        'objectid'    => "C(255) NOTNULL DEFAULT ''",
        'areaid'    => "I NOTNULL DEFAULT 0",
        'url'         => "X NOTNULL DEFAULT ''",
        'date'        => "T NOTNULL DEFAULT '1970-01-01 00:00:00'",
        'uid'         => "I NOTNULL DEFAULT '0'",
        'owneruid'    => "I NOTNULL DEFAULT '0'",
        'comment'     => "X NOTNULL DEFAULT ''",
        'subject'     => "X NOTNULL DEFAULT ''",
        'replyto'     => "I NOTNULL DEFAULT '0'",
        'anonname'    => "C(255) NOTNULL DEFAULT ''",
        'anonmail'    => "C(255) NOTNULL DEFAULT ''",
        'status'      => "I1 NOTNULL DEFAULT '0'",
        'ipaddr'      => "C(85) NOTNULL DEFAULT ''",
        'type'        => "C(64) NOTNULL DEFAULT ''",
        'anonwebsite' => "C(255) NOTNULL DEFAULT ''"
    );
    $tables['EZComments_column_idx'] = array(
        'modobj'      => array('modname', 'objectid'),
        'modname'     => 'modname',
        'objectid'    => 'objectid',
        'uid'         => 'uid',
        'ownerid'     => 'owneruid'
    );

    return $tables;
}
