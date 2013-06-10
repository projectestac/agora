<?php

/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in the information
 */
function AdminMessages_tables() {
    // Initialise table array
    $tables = array();

    // Get the name for the table.
    $message = DBUtil::getLimitedTablename('message');
    $tables['message'] = $message;
    $tables['message_column'] = array('mid' => 'mid',
        'title' => 'title',
        'content' => 'content',
        'date' => 'date',
        'expire' => 'expire',
        'active' => 'active',
        'view' => 'view',
        'language' => 'language');

    $tables['message_column_def'] = array('mid' => 'I PRIMARY AUTO',
        'title' => "C(100) NOTNULL DEFAULT ''",
        'content' => "XL NOTNULL",
        'date' => "I NOTNULL DEFAULT 0",
        'expire' => "I NOTNULL DEFAULT 0",
        'active' => "I NOTNULL DEFAULT 1",
        'view' => "I NOTNULL DEFAULT 1",
        'language' => "C(30) NOTNULL DEFAULT ''");


    // Return the table information
    return $tables;
}