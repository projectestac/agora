<?php  //$Id: upgrade.php,v 1.3 2011-05-25 12:13:03 sarjona Exp $

// This file keeps track of upgrades to 
// the jclic module
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

function xmldb_jclic_upgrade($oldversion=0) {
    global $CFG;

    $result = true;

    if ($oldversion < 2011011900) {
        $table = new XMLDBTable('jclic');
        /// Define lang field format to be added to jclic
        $field = new XMLDBField('lang');
        $field->setAttributes(XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, null, null, 'ca', 'url');
        $result = $result && add_field($table, $field);

        /// Define exiturl field format to be added to jclic
        $field = new XMLDBField('exiturl');
        $field->setAttributes(XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, null, null, 'url');
        $result = $result && add_field($table, $field);
    }

    return $result;
}

?>
