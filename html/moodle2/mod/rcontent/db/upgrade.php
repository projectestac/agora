<?php  //$Id: upgrade.php,v 1.13.2.3 2008/08/01 04:30:45 piers Exp $

// This file keeps track of upgrades to 
// the scorm module
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installtion to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the functions defined in lib/ddllib.php

function xmldb_rcontent_upgrade($oldversion=0) {

    global $CFG, $DB;

    $dbman = $DB->get_manager();
    
    // MARSUPIAL ************ AFEGIT -> Update rcontent->width change from int to char
    // 2013.03.05 @abertranb
    if ($oldversion < 2012061701) {
    	// update totaltime field of rcontent_grades_details table
    	$table = new xmldb_table('rcontent');
    	$field = new xmldb_field('width');
    	$field->set_attributes(XMLDB_TYPE_CHAR, 10, null, XMLDB_NOTNULL, null, '100%');
    	$dbman->change_field_type($table, $field);
    	upgrade_mod_savepoint(true, 2012061701, 'rcontent');
    }
    // ************ FI
    
    return true;
}

?>
