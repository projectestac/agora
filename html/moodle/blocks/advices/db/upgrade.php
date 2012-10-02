<?php

// This file keeps track of upgrades to 
// the advices block
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

function xmldb_block_advices_upgrade($oldversion=0) {

    global $CFG, $THEME, $db;

    $result = true;

/// And upgrade begins here. For each one, you'll need one 
/// block of code similar to the next one. Please, delete 
/// this comment lines once this file start handling proper
/// upgrade code.

/// if ($result && $oldversion < YYYYMMDD00) { //New version in version.php
///     $result = result of "/lib/ddllib.php" function calls
/// }

    
    if ($result && $oldversion < 2010062801) {

    /// Define field show_only_admins to be added to block_advices
        $table = new XMLDBTable('block_advices');
        $field = new XMLDBField('show_only_admins');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0', 'date_stop');

    /// Launch add field show_only_admins
        $result = $result && add_field($table, $field);
    }
    
    if ($result && $oldversion < 2010071501) {
		
		delete_records('block_advices');
		 
		$table = new XMLDBTable('block_advices');

        /// Define index type (unique) to be dropped form block_advices
        $index = new XMLDBIndex('type');
        $index->setAttributes(XMLDB_INDEX_UNIQUE, array('type'));
        $result = $result && drop_index($table, $index);
        
        /// Define field type to be dropped from block_advices
        $field = new XMLDBField('type');
        $result = $result && drop_field($table, $field);
       
    	/// Define index show_only_admins (unique) to be added to block_advices
        $index = new XMLDBIndex('show_only_admins');
        $index->setAttributes(XMLDB_INDEX_UNIQUE, array('show_only_admins'));
        $result = $result && add_index($table, $index);
    }





    return $result;
}
