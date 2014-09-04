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
 * This file keeps track of upgrades to the jclic module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    mod
 * @subpackage jclic
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute jclic upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_jclic_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager(); // loads ddl manager and xmldb classes

    if ($oldversion < 2011011900) {
        $table = new xmldb_table('jclic');
        /// Define lang field format to be added to jclic
        $field = new xmldb_field('lang');
        $field->set_attributes(XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, 'ca', 'url');
        $result = $result && $dbman->add_field($table, $field);

        /// Define exiturl field format to be added to jclic
        $field = new xmldb_field('exiturl');
        $field->set_attributes(XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'url');
        $result = $result && $dbman->add_field($table, $field);
    }

    if ($oldversion < 2011122902) {

        /// Define field introformat to be added to jclic
        $table = new xmldb_table('jclic');
        $field = new xmldb_field('description', XMLDB_TYPE_TEXT, 'small', null, null, null, null, 'name');
        if ($dbman->field_exists($table, $field)) {
            $dbman->rename_field($table, $field, 'intro');
        }

        $field = new xmldb_field('introformat');
        $field->set_attributes(XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'intro');

        /// Launch add field introformat
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // conditionally migrate to html format in intro
        if ($CFG->texteditors !== 'textarea') {
            $rs = $DB->get_recordset('jclic', array('introformat'=>FORMAT_MOODLE), '', 'id,intro,introformat');
            foreach ($rs as $f) {
                $f->intro       = text_to_html($f->intro, false, false, true);
                $f->introformat = FORMAT_HTML;
                $DB->update_record('jclic', $f);
                upgrade_set_timeout();
            }
            $rs->close();
        }

        /// jclic savepoint reached
        upgrade_mod_savepoint(true, 2011122902, 'jclic');
    }

//===== 1.9.0 upgrade line ======//

    if ($oldversion < 2012042700) {

        require_once("$CFG->dirroot/mod/jclic/db/upgradelib.php");
        // Add upgrading code from 1.9 (+ new file storage system)
        // @TODO: test it!!!!
        jclic_migrate_files();

        // Add fields grade, timeavailable and timedue on table jclic
        $table = new xmldb_table('jclic');
        $field = new xmldb_field('grade', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'maxgrade');
        $dbman->add_field($table, $field);

        // Update jclic.grade with the jclic.max_grade value
        if ($jclics = $DB->get_records('jclic')){
            foreach($jclics as $jclic){
                if (empty($jclic->maxgrade)) $jclic->maxgrade = 10;
                $jclic->grade= $jclic->maxgrade;
                $DB->update_record("jclic", $jclic);
            }
        }

        $field = new xmldb_field('timeavailable', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, '0', 'exiturl');
        $dbman->add_field($table, $field);

        $field = new xmldb_field('timedue', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, null, null, '0', 'timeavailable');
        $dbman->add_field($table, $field);

        // jclic savepoint reached
        upgrade_mod_savepoint(true, 2012042700, 'jclic');
    }

    if ($oldversion < 2012050703) {
        // Remove unique restriction for jclic_sessions.session_id field
        $table = new xmldb_table('jclic_sessions');
        $key = new xmldb_index('session_id', XMLDB_INDEX_UNIQUE, array('session_id'));
        $dbman->drop_index($table, $key);

        // Copy jclic_sessions.id to jclic_sessions.session_id and update jclic_activities.session_id
        if ($sessions = $DB->get_records('jclic_sessions')){
            foreach($sessions as $session){
                $sql = 'UPDATE {jclic_activities} SET session_id=? WHERE session_id=? ';
                $params = array($session->id, $session->session_id);
                $DB->execute($sql, $params);
                $session->session_id = $session->id;
                $DB->update_record("jclic_sessions", $session);
            }
        }

        // jclic savepoint reached
        upgrade_mod_savepoint(true, 2012050703, 'jclic');
    }

    if ($oldversion < 2014040400) {
        if ($activities = $DB->get_records('jclic_activities',array(),'', 'id, total_time')){
            foreach($activities as $activity){
                $activity->total_time =  ceil($activity->total_time/1000);
                $DB->update_record("jclic_activities", $activity);
            }
        }

        // jclic savepoint reached
        upgrade_mod_savepoint(true, 2014040400, 'jclic');
    }


    // Final return of upgrade result (true, all went good) to Moodle.
    return true;
}
