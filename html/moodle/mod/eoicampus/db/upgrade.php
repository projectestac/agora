<?php  //$Id: upgrade.php,v 1.1 2008/02/13 10:22:46 sarjona Exp $

// This file keeps track of upgrades to 
// the eoicampus module
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

function xmldb_eoicampus_upgrade($oldversion=0) {
    global $CFG;

    $result = true;
    if ($oldversion < 2008071500) {
        /// Define and launch pwtype field format to be added to eoicampus
        $table = new XMLDBTable('eoicampus');
        $field = new XMLDBField('pwtype');
        $field->setAttributes(XMLDB_TYPE_CHAR, '20', null, null, null, null, null, null, 'pwid');
        $result = $result && add_field($table, $field);
    }
    
    return $result;
}

?>
