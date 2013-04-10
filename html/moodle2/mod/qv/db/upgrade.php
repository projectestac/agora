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

/**
 * This file keeps track of upgrades to the qv module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    mod
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute qv upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_qv_upgrade($oldversion=0) {
    global $CFG, $DB;

    $dbman = $DB->get_manager(); // loads ddl manager and xmldb classes

    if ($oldversion < 2007092500) {
        /// Define and launch lang field format to be added to qv
        $table = new xmldb_table('qv');
        $field = new xmldb_field('assessmentlang');
        $field->setAttributes(XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, null, null, 'ca', 'skin');

        $dbman->add_field($table, $field);
    }

    if ($oldversion < 2008051500) {
        /// Define fields ordersections, orderitems, sectionorder, itemorder
        $table1 = new xmldb_table('qv');

        $field1 = new xmldb_field('ordersections');
        $field1->setAttributes(XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, null, null, null, null, '0', 'showinteraction');
        $dbman->add_field($table1, $field1);

        $field2 = new xmldb_field('orderitems');
        $field2->setAttributes(XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, null, null, null, null, '0', 'ordersections');
        $dbman->add_field($table1, $field2);


        $table2 = new xmldb_table('qv_assignments');

        $field3 = new xmldb_field('sectionorder');
        $field3->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, null, null, '0', 'userid');
        $dbman->add_field($table2, $field3);

        $field4 = new xmldb_field('itemorder');
        $field4->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, null, null, '0', 'sectionorder');
        $dbman->add_field($table2, $field4);
    }
    
    if ($oldversion < 2008052600) {
        /// Define field time in qv_sections
        $table3 = new xmldb_table('qv_sections');

        $field5 = new xmldb_field('time');
        $field5->setAttributes(XMLDB_TYPE_CHAR, '8', null, XMLDB_NOTNULL, null, null, null, '00:00:00', 'state');
        $dbman->add_field($table3, $field5);
    }
	
    if ($oldversion < 2008060300) {
        /// Define field time in qv_sections
        $field6 = new xmldb_field('pending_scores');
        $field6->setAttributes(XMLDB_TYPE_TEXT, null, null, null, null, null, null, '', 'scores');
        $dbman->add_field($table3, $field6);
    }

    if ($oldversion < 2008061100) {
        // @Albert Llastarri
        if ($qv_sections = $DB->get_records('qv_sections')){
            foreach($qv_sections as $qv_section){
                $qv_section->pending_scores=$qv_section->scores;
                $DB->update_record('qv_sections', $qv_section);
            }
        }
    }
//===== 2.2 upgrade line ======//

    if ($oldversion < 2013022800) {

		require_once("$CFG->dirroot/mod/qv/db/upgradelib.php");
		
        /// Define field introformat to be added to qv
        $table = new xmldb_table('qv');

        //description -> intro
        $field = new xmldb_field('description', XMLDB_TYPE_TEXT, null, null, null, null, null, 'name');
        if ($dbman->field_exists($table, $field)) {
            $dbman->rename_field($table, $field, 'intro');
        }

		//create introformat
        $field = new xmldb_field('introformat', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0', 'intro');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        //maxgrade -> grade
        $field = new xmldb_field('maxgrade', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'target');
        if ($dbman->field_exists($table, $field)) {
			$fieldgrade = new xmldb_field('grade');
			//If grade exitst, delete maxgrade, if not, rename maxtgrade to grade
			if ($dbman->field_exists($table, $fieldgrade)) {
				$dbman->drop_field($table, $field);
			} else {
				$dbman->rename_field($table, $field, 'grade');
			}
        }

        // timeavailable
        $field = new xmldb_field('timeavailable', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, '0', 'exiturl');
        if (!$dbman->field_exists($table, $field)) {
			$dbman->add_field($table, $field);
		}

		// timedue
        $field = new xmldb_field('timedue', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, '0', 'timeavailable');
        if (!$dbman->field_exists($table, $field)) {
			$dbman->add_field($table, $field);
		}

		//reference
        $field = new xmldb_field('reference', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'introformat');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }


        // Migrate to new file storage system)
        $field = new xmldb_field('assessmenturl');
		if ($dbman->field_exists($table, $field)) {
			$migrated = qv_migrate_files();
			if($migrated){
				//Delete assessmenturl if all files are migrated
				$dbman->drop_field($table, $field);
			}
		}

		// conditionally migrate to html format in intro
        if ($CFG->texteditors !== 'textarea') {
            $rs = $DB->get_recordset('qv', array('introformat'=>FORMAT_MOODLE), '', 'id,intro,introformat');
            foreach ($rs as $f) {
                $f->intro       = text_to_html($f->intro, false, false, true);
                $f->introformat = FORMAT_HTML;
                $DB->update_record('qv', $f);
                upgrade_set_timeout();
            }
            $rs->close();
        }
        
        // qv savepoint reached
        upgrade_mod_savepoint(true, 2013022800, 'qv');
    }
    
    return true;
}
