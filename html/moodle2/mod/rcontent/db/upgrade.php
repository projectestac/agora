<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/* This file keeps track of upgrades to
 * the scorm module
 *
 * Sometimes, changes between versions involve
 * alterations to database structures and other
 * major things that may break installations.
 *
 * The upgrade function in this file will attempt
 * to perform all the necessary actions to upgrade
 * your older installtion to the current version.
 *
 * If there's something it cannot do itself, it
 * will tell you what you need to do.
 *
 * The commands in here will all be database-neutral,
 * using the functions defined in lib/ddllib.php
 */

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

    if ($oldversion < 2014111100) {
        if (is_file("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl")) {
            @unlink("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl");
        }
        upgrade_mod_savepoint(true, 2014111100, 'rcontent');
    }

    if ($oldversion < 2014111101) {
        set_config('whatgrade', $CFG->rcontent_whatgrade, 'rcontent');
        unset_config('rcontent_whatgrade');
        set_config('framesize', $CFG->rcontent_framesize, 'rcontent');
        unset_config('rcontent_framesize');
        set_config('popup', $CFG->rcontent_popup, 'rcontent');
        unset_config('rcontent_popup');
        set_config('frametype', $CFG->rcontent_frametype, 'rcontent');
        unset_config('rcontent_frametype');
        set_config('tracer', $CFG->rcontent_tracer, 'rcontent');
        unset_config('rcontent_tracer');
        set_config('registersperreportpage', $CFG->rcontent_registersperreportpage, 'rcontent');
        unset_config('rcontent_registersperreportpage');

        $options = array('resizable', 'scrollbars', 'directories', 'location',
                                 'menubar', 'toolbar', 'status', 'width', 'height');
        foreach ($options as $optionname) {
            $oldoption = "rcontent_popup$optionname";
            $newoption = "popup$optionname";
            set_config($newoption, $CFG->$oldoption, 'rcontent');
            unset_config($oldoption);
        }

        upgrade_mod_savepoint(true, 2014111101, 'rcontent');
    }


    return true;
}

