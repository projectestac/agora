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

    global $CFG, $THEME, $db;

    $result = true;
    
//MARSUPIAL *********** AFEGIT -> Fixed bug in database model
//2011.10.19 @mmartinez 
    if ($result && $oldversion < 2011101991) {
    	
    	// update grade field of rcontent_grades table
    	$table = new XMLDBTable('rcontent_grades');
    	$field = new XMLDBField('grade');
    	$field->setAttributes(XMLDB_TYPE_FLOAT, null, XMLDB_UNSIGNED, false, false, false, null, null, 'activityid');
    	$result = $result && change_field_type($table, $field);
    	
    	// update grade field of rcontent_grades_details table
    	$table = new XMLDBTable('rcontent_grades_details');
    	$field = new XMLDBField('grade');
    	$field->setAttributes(XMLDB_TYPE_FLOAT, null, XMLDB_UNSIGNED, false, false, false, null, null, 'description');
    	$result = $result && change_field_type($table, $field);
    }
//********** FI

//MARSUPIAL *********** AFEGIT -> Fixed bug in database model
//2011.10.31 @mmartinez 
    if ($result && $oldversion < 2011103191) {
    	$table = new XMLDBTable('rcontent_grades');
    	// update starttime field of rcontent_grades table
    	$field = new XMLDBField('starttime');    	
    	$field->setAttributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, false, false, false, null, null, 'maxattempts');
    	$result = $result && change_field_type($table, $field);
    	// update totaltime field of rcontent_grades table
    	$field = new XMLDBField('totaltime');
    	$field->setAttributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, false, false, false, null, null, 'starttime');
    	$result = $result && change_field_type($table, $field);
    	// update maxtotaltime field of rcontent_grades table
    	$field = new XMLDBField('maxtotaltime');
    	$field->setAttributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, false, false, false, null, null, 'totaltime');
    	$result = $result && change_field_type($table, $field);
    	
    	$table = new XMLDBTable('rcontent_grades_details');
    	// update starttime field of rcontent_grades_details table
    	$field = new XMLDBField('starttime');
    	$field->setAttributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, false, false, false, null, null, 'maxgrade');
    	$result = $result && change_field_type($table, $field);
    	// update totaltime field of rcontent_grades_details table
    	$field = new XMLDBField('totaltime');
    	$field->setAttributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, false, false, false, null, null, 'starttime');
    	$result = $result && change_field_type($table, $field);
    	// update maxtotaltime field of rcontent_grades_details table
    	$field = new XMLDBField('maxtotaltime');
    	$field->setAttributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, false, false, false, null, null, 'totaltime');
    	$result = $result && change_field_type($table, $field);    	
    }
//********** FI

// MARSUPIAL ********** AFEGIT -> Change obligatory field from Calificacion to Descripcion
// 2011.11.14 mmartinez
    if ($result && $oldversion < 2011111491) {
    	//erase old wsdl definition, it have to be update to apply changed
    	$f = $CFG->dataroot.'/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl';
    	if (is_file($f)){
    	   	$result = $result && unlink($f);
    	}    	
    } 
// ********** FI

// MARSUPIAL ************ AFEGIT -> Update URLVIEWRESULTS fields sizes for large urls
// 2011.08.21 @mmartinez
    if ($result && $oldversion < 2012092191) {
    	// update totaltime field of rcontent_grades_details table
    	$table = new XMLDBTable('rcontent_grades');
    	$field = new XMLDBField('URLVIEWRESULTS');
    	$field->setAttributes(XMLDB_TYPE_CHAR, 1024, XMLDB_UNSIGNED, false, false, false, null, null, 'comments');
    	$result = $result && change_field_type($table, $field);
    	
    	// update maxtotaltime field of rcontent_grades_details table
    	$table = new XMLDBTable('rcontent_grades_details');
    	$field = new XMLDBField('URLVIEWRESULTS');
    	$field->setAttributes(XMLDB_TYPE_CHAR, 1024, XMLDB_UNSIGNED, false, false, false, null, null, 'weight');
    	$result = $result && change_field_type($table, $field);
    }
// ************ FI

    return $result;
}

?>
