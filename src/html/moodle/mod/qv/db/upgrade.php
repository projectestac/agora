<?php  //$Id: upgrade.php,v 1.6 2008/06/11 20:50:56 llastarri Exp $

// This file keeps track of upgrades to 
// the qv module
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

function xmldb_qv_upgrade($oldversion=0) {
    global $CFG;

    $result = true;
    
    if ($oldversion < 2007092500) {
        /// Define and launch lang field format to be added to qv
        $table = new XMLDBTable('qv');
        $field = new XMLDBField('assessmentlang');
        $field->setAttributes(XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, null, null, 'ca', 'skin');

        $result = $result && add_field($table, $field);
    }

    if ($oldversion < 2008051500) {
        /// Define fields ordersections, orderitems, sectionorder, itemorder
        $table1 = new XMLDBTable('qv');

        $field1 = new XMLDBField('ordersections');
        $field1->setAttributes(XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, null, null, null, null, '0', 'showinteraction');
        $result = $result && add_field($table1, $field1);

        $field2 = new XMLDBField('orderitems');
        $field2->setAttributes(XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, null, null, null, null, '0', 'ordersections');
        $result = $result && add_field($table1, $field2);


        $table2 = new XMLDBTable('qv_assignments');

        $field3 = new XMLDBField('sectionorder');
        $field3->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, null, null, '0', 'userid');
        $result = $result && add_field($table2, $field3);

        $field4 = new XMLDBField('itemorder');
        $field4->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, null, null, '0', 'sectionorder');
        $result = $result && add_field($table2, $field4);

	
    }
    
    if ($oldversion < 2008052600) {
        /// Define field time in qv_sections
        $table3 = new XMLDBTable('qv_sections');

        $field5 = new XMLDBField('time');
        $field5->setAttributes(XMLDB_TYPE_CHAR, '8', null, XMLDB_NOTNULL, null, null, null, '00:00:00', 'state');
        $result = $result && add_field($table3, $field5);
    }
	
    if ($oldversion < 2008060300) {
        /// Define field time in qv_sections

        $field6 = new XMLDBField('pending_scores');
        $field6->setAttributes(XMLDB_TYPE_TEXT, null, null, null, null, null, null, '', 'scores');
        $result = $result && add_field($table3, $field6);
    }

    if ($oldversion < 2008061100) {
		if ($qv_sections=get_records('qv_sections')){
			foreach($qv_sections as $qv_section){
				if ($result){
					$qv_section->pending_scores=$qv_section->scores;//A
					if (!update_record("qv_sections", $qv_section)){
						$result = false;
					}
				}
			}
		}
    }
	
    return $result;
}

?>
