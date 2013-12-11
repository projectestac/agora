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
 * mod/hotpot/db/upgrade.php
 *
 * @package   mod-hotpot
 * @copyright 2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * xmldb_hotpot_upgrade
 *
 * @param xxx $oldversion
 * @return xxx
 */
function xmldb_hotpot_upgrade($oldversion) {
    global $CFG, $DB;

    // this flag will be set to true if any upgrade needs to empty the HotPot cache
    $empty_cache = false;

    $dbman = $DB->get_manager();

    //===== 1.9.0 upgrade line ======//

    // update hotpot grades from sites earlier than Moodle 1.9, 27th March 2008
    $newversion = 2007101511;
    if ($oldversion < $newversion) {
        // ensure "hotpot_upgrade_grades" function is available
        require_once $CFG->dirroot.'/mod/hotpot/lib.php';
        hotpot_upgrade_grades();
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2008011200;
    if ($oldversion < $newversion) {
        // remove unused config setting
        unset_config('hotpot_initialdisable');
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080301;
    if ($oldversion < $newversion) {

        // remove unused config settings
        unset_config('hotpot_showtimes');
        unset_config('hotpot_excelencodings');

        // modify table: hotpot
        $table = new xmldb_table('hotpot');

        // expected structure of hotpot table when we start this upgrade:
        // (i.e. this is how things were at the end of Moodle 1.9)
        //   id, course, name, summary, timeopen, timeclose, location, reference,
        //   outputformat, navigation, studentfeedback, studentfeedbackurl,
        //   forceplugins, shownextquiz, review, grade, grademethod, attempts,
        //   password, subnet, clickreporting, timecreated, timemodified

        // convert, move and rename fields ($newname => $oldfield)
        $fields = array(
            // same name
            'outputformat'   => new xmldb_field('outputformat', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL), // (int -> varchar)
            'timeopen'       => new xmldb_field('timeopen', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'studentfeedbackurl'),
            'timeclose'      => new xmldb_field('timeclose', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'timeopen'),
            'grademethod'    => new xmldb_field('grademethod', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'grade'),
            // new name
            'sourcefile'     => new xmldb_field('reference', XMLDB_TYPE_CHAR, '255', null, null, null, null, 'name'),
            'sourcelocation' => new xmldb_field('location', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'sourcefile'),
            'entrytext'      => new xmldb_field('summary', XMLDB_TYPE_TEXT, 'small', null, null, null, null, 'sourcelocation'),
            'reviewoptions'  => new xmldb_field('review', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0'),
            'attemptlimit'   => new xmldb_field('attempts', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'reviewoptions'),
            'gradeweighting' => new xmldb_field('grade', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'attemptlimit'),
        );

        foreach ($fields as $newname => $field) {
            if ($dbman->field_exists($table, $field)) {
                xmldb_hotpot_fix_previous_field($dbman, $table, $field);
                $dbman->change_field_type($table, $field);
                if ($field->getName() != $newname) {
                    $dbman->rename_field($table, $field, $newname);
                }
            }
        }

        // add fields
        $fields = array(
            new xmldb_field('sourcefile', XMLDB_TYPE_CHAR, '255', null, null, null, null, 'name'),
            new xmldb_field('sourcetype', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'sourcefile'),
            new xmldb_field('sourceitemid', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'sourcetype'),
            new xmldb_field('sourcelocation', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'sourceitemid'),

            new xmldb_field('configfile', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'sourcelocation'),
            new xmldb_field('configitemid', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'configfile'),
            new xmldb_field('configlocation', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'configitemid'),

            new xmldb_field('entrycm', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'configlocation'),
            new xmldb_field('entrygrade', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '100', 'entrycm'),
            new xmldb_field('entrypage', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'entrygrade'),
            new xmldb_field('entrytext', XMLDB_TYPE_TEXT, 'small', null, null, null, null, 'entrypage'),
            new xmldb_field('entryformat', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'entrytext'),
            new xmldb_field('entryoptions', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'entryformat'),

            new xmldb_field('exitpage', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'entryoptions'),
            new xmldb_field('exittext', XMLDB_TYPE_TEXT, 'small', null, null, null, null, 'exitpage'),
            new xmldb_field('exitformat', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'exittext'),
            new xmldb_field('exitoptions', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'exitformat'),
            new xmldb_field('exitcm', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'exitoptions'),

            new xmldb_field('title', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '3', 'navigation'),
            new xmldb_field('stopbutton', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'title'),
            new xmldb_field('stoptext', XMLDB_TYPE_CHAR, '255', null, null, null, null, 'stopbutton'),
            new xmldb_field('usefilters', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'stoptext'),
            new xmldb_field('useglossary', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'usefilters'),
            new xmldb_field('usemediafilter', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'useglossary'),

            new xmldb_field('timelimit', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'timeclose'),
            new xmldb_field('delay1', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'timelimit'),
            new xmldb_field('delay2', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'delay1'),
            new xmldb_field('delay3', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '2', 'delay2'),
            new xmldb_field('discarddetails', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'clickreporting')
        );

        foreach ($fields as $field) {
            if (! $dbman->field_exists($table, $field)) {
                xmldb_hotpot_fix_previous_field($dbman, $table, $field);
                $dbman->add_field($table, $field);
            }
        }

        // remove field: forceplugins (replaced by "usemediafilter")
        $field = new xmldb_field('forceplugins', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
        if ($dbman->field_exists($table, $field)) {
            $DB->execute('UPDATE {hotpot} SET '."usemediafilter='moodle'".' WHERE forceplugins=1');
            $dbman->drop_field($table, $field);
        }

        // remove field: shownextquiz (replaced by "exitcm")
        $field = new xmldb_field('shownextquiz', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
        if ($dbman->field_exists($table, $field)) {
            // set exitcm to show next HotPot: -4 = hotpot::ACTIVITY_SECTION_QUIZPORT
            $DB->execute('UPDATE {hotpot} SET exitcm=-4 WHERE shownextquiz=1');
            $dbman->drop_field($table, $field);
        }

        // append "id" to fields that are foreign keys in other hotpot tables
        $fields = array(
            // $tablename => $fieldnames array
            'hotpot_attempts'  => array('hotpot'),
            'hotpot_details'   => array('attempt'),
            'hotpot_questions' => array('hotpot'),
            'hotpot_responses' => array('attempt', 'question'),
        );
        foreach ($fields as $tablename => $fieldnames) {
            $table = new xmldb_table($tablename);
            foreach ($fieldnames as  $fieldname) {
                $field = new xmldb_field($fieldname, XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
                if ($dbman->field_exists($table, $field)) {
                    // maybe we should remove all indexes and keys
                    // using this $fieldname before we rename the field
                    $dbman->rename_field($table, $field, $fieldname.'id');
                }
            }
        }

        // create new table: hotpot_cache
        $table = new xmldb_table('hotpot_cache');
        if (!$dbman->table_exists($table)) {
            $table->add_field('id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
            $table->add_field('hotpotid', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
            $table->add_field('slasharguments', XMLDB_TYPE_CHAR, '1', null, XMLDB_NOTNULL);
            $table->add_field('hotpot_enableobfuscate', XMLDB_TYPE_CHAR, '1', null, XMLDB_NOTNULL);
            $table->add_field('hotpot_enableswf', XMLDB_TYPE_CHAR, '1', null, XMLDB_NOTNULL);
            $table->add_field('name', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('sourcefile', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('sourcetype', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('sourcelocation', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL);
            $table->add_field('sourcelastmodified', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('sourceetag', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('configfile', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('configlocation', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
            $table->add_field('configlastmodified', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('configetag', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('navigation', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
            $table->add_field('title', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
            $table->add_field('stopbutton', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, null, null, '0');
            $table->add_field('stoptext', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('usefilters', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, null, null, '0');
            $table->add_field('useglossary', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, null, null, '0');
            $table->add_field('usemediafilter', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, '0');
            $table->add_field('studentfeedback', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0');
            $table->add_field('studentfeedbackurl', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL);
            $table->add_field('timelimit', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
            $table->add_field('delay3', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '-1');
            $table->add_field('clickreporting', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
            $table->add_field('content', XMLDB_TYPE_TEXT, 'medium', null, XMLDB_NOTNULL);
            $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL);
            $table->add_field('md5key', XMLDB_TYPE_CHAR, '32', null, XMLDB_NOTNULL);

            // Add keys to table hotpot_cache
            $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
            $table->add_key('hotpotid', XMLDB_KEY_FOREIGN, array('hotpotid'), 'hotpot', array('id'));

            // Add indexes to table hotpot_cache
            $table->add_index('hotpotid-md5key', XMLDB_INDEX_NOTUNIQUE, array('hotpotid', 'md5key'));

            $dbman->create_table($table);
        }

        // add new logging actions
        log_update_descriptions('mod/hotpot');

        // hotpot savepoint reached
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080302;
    if ($oldversion < $newversion) {
        // navigation setting of "none" is now "0" (was "6")
        $DB->execute('UPDATE {hotpot} SET navigation=0 WHERE navigation=6');

        // navigation's "give up" button, is replaced by the "stopbutton" field
        $DB->execute('UPDATE {hotpot} SET stopbutton=0 WHERE navigation=5');
        $DB->execute('UPDATE {hotpot} SET navigation=0 WHERE navigation=5');
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080303;
    if ($oldversion < $newversion) {
        // modify table: hotpot_attempts
        $table = new xmldb_table('hotpot_attempts');

        // add field: timemodified
        $field = new xmldb_field('timemodified', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
        if (! $dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
            $DB->execute('UPDATE {hotpot_attempts} SET timemodified = timefinish WHERE timemodified=0');
            $DB->execute('UPDATE {hotpot_attempts} SET timemodified = timestart  WHERE timemodified=0');
        }

        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080305;
    if ($oldversion < $newversion) {
        // modify table: hotpot
        $table = new xmldb_table('hotpot');

        // change fields
        //  - entrycm         (-> signed)
        //  - outputformat    (-> varchar)
        //  - timelimit       (-> signed)
        //  - delay3          (-> signed)
        //  - attemptlimit    (-> unsigned)
        //  - gradeweighting  (-> unsigned)
        //  - grademethod     (-> unsigned)
        $fields = array(
            new xmldb_field('entrycm', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0'),
            new xmldb_field('outputformat', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL),
            new xmldb_field('timelimit', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0'),
            new xmldb_field('delay3', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '2'),
            new xmldb_field('attemptlimit', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0'),
            new xmldb_field('gradeweighting', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0'),
            new xmldb_field('grademethod', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0')
        );

        foreach ($fields as $field) {
            if ($dbman->field_exists($table, $field)) {
                xmldb_hotpot_fix_previous_field($dbman, $table, $field);
                $dbman->change_field_type($table, $field);
            }
        }

        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080306;
    if ($oldversion < $newversion) {
        // modify table: hotpot
        $table = new xmldb_table('hotpot');

        // rename field: gradelimit -> gradeweighting
        $field = new xmldb_field('gradelimit', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
        if ($dbman->field_exists($table, $field)) {
            $dbman->rename_field($table, $field, 'gradeweighting');
        }

        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080308;
    if ($oldversion < $newversion) {

        // add display fields to hotpot
        // (these fields were missing from access.xml so won't be on new sites)
        $tables = array(
            'hotpot' => array(
                new xmldb_field('title', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '3', 'navigation'),
                new xmldb_field('stopbutton', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'title'),
                new xmldb_field('stoptext', XMLDB_TYPE_CHAR, '255', null, null, null, null, 'stopbutton'),
                new xmldb_field('usefilters', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'stoptext'),
                new xmldb_field('useglossary', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'usefilters'),
                new xmldb_field('usemediafilter', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'useglossary'),
            )
        );
        foreach ($tables as $tablename => $fields) {
            $table = new xmldb_table($tablename);

            foreach ($fields as $field) {
                xmldb_hotpot_fix_previous_field($dbman, $table, $field);
                if ($dbman->field_exists($table, $field)) {
                    $dbman->change_field_type($table, $field);
                } else {
                    $dbman->add_field($table, $field);
                }
            }
        }

        $table = new xmldb_table('hotpot');
        $field = new xmldb_field('forceplugins', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
        if ($dbman->field_exists($table, $field)) {
            $DB->execute('UPDATE {hotpot} SET '."usemediafilter='moodle'".' WHERE forceplugins=1');
            $dbman->drop_field($table, $field);
        }

        // force certain fields to be not null
        $tables = array(
            'hotpot' => array(
                new xmldb_field('entrygrade', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '100')
            ),
            'hotpot_cache' => array(
                new xmldb_field('stopbutton', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0'),
                new xmldb_field('usefilters', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0'),
                new xmldb_field('useglossary', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0'),
                new xmldb_field('studentfeedback', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0'),
            )
        );

        foreach ($tables as $tablename => $fields) {
            $table = new xmldb_table($tablename);
            foreach ($fields as $field) {
                if ($dbman->field_exists($table, $field)) {
                    $dbman->change_field_type($table, $field);
                }
            }
        }

        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080309;
    if ($oldversion < $newversion) {

        // force certain text fields to be not null
        $tables = array(
            'hotpot' => array(
                new xmldb_field('sourcefile', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL),
                new xmldb_field('entrytext', XMLDB_TYPE_TEXT, 'small', null, XMLDB_NOTNULL),
                new xmldb_field('exittext', XMLDB_TYPE_TEXT, 'small', null, XMLDB_NOTNULL),
                new xmldb_field('stoptext', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL)
            )
        );

        foreach ($tables as $tablename => $fields) {
            $table = new xmldb_table($tablename);
            foreach ($fields as $field) {
                if ($dbman->field_exists($table, $field)) {
                    $fieldname = $field->getName();
                    $DB->set_field_select($tablename, $fieldname, '', "$fieldname IS NULL");
                    $dbman->change_field_type($table, $field);
                }
            }
        }

        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080311;
    if ($oldversion < $newversion) {

        require_once($CFG->dirroot.'/mod/hotpot/locallib.php');

        /////////////////////////////////////
        /// new file storage migrate code ///
        /////////////////////////////////////

        // set up sql strings to select HotPots with Moodle 1.x file paths (i.e. no leading slash)
        $strupdating = get_string('migratingfiles', 'hotpot');
        $select = 'h.*, cm.id AS cmid';
        $from   = '{hotpot} h, {course_modules} cm, {modules} m';
        $where  = 'm.name=? AND m.id=cm.module AND cm.instance=h.id AND h.sourcefile<>?'.
                  ' AND '.$DB->sql_like('h.sourcefile', '?', false, false, true); // NOT LIKE
        $params = array('hotpot', '', '/%', 0);
        $orderby = 'h.course, h.id';

        // get HotPot records to update
        if ($count = $DB->count_records_sql("SELECT COUNT('x') FROM $from WHERE $where", $params)) {
            $rs = $DB->get_recordset_sql("SELECT $select FROM $from WHERE $where ORDER BY $orderby", $params);
        } else {
            $rs = false;
        }

        // loop through HotPot records that need to be updated
        if ($rs) {
            $i = 0;
            $bar = new progress_bar('hotpotmigratefiles', 500, true);

            // get file storage object
            $fs = get_file_storage();

            $coursecontext = null;
            foreach ($rs as $hotpot) {

                // apply for more script execution time (3 mins)
                upgrade_set_timeout();

                // set $courseid from $hotpot->sourcelocation
                //   0 : HOTPOT_LOCATION_COURSEFILES
                //   1 : HOTPOT_LOCATION_SITEFILES
                //   2 : HOTPOT_LOCATION_WWW (not used)
                if ($hotpot->sourcelocation) {
                    $courseid = SITEID;
                } else {
                    $courseid = $hotpot->course;
                }

                // get course context (only if we need to)
                if (is_null($coursecontext) || $coursecontext->instanceid != $courseid) {
                    $coursecontext  = get_context_instance(CONTEXT_COURSE, $courseid);
                }

                // actually there shouldn't be any urls in HotPot activities,
                // but this code will also be used to convert QuizPort to TaskChain
                if (preg_match('/^https?:\/\//i', $hotpot->sourcefile)) {
                    $url = $hotpot->sourcefile;
                    $path = parse_url($url, PHP_URL_PATH);
                } else {
                    $url = '';
                    $path = $hotpot->sourcefile;
                }
                $path = clean_param($path, PARAM_PATH);

                // this information should be enough to access the file
                // if it has been migrated into Moodle 2.0 file system
                $filename = basename($path);
                $filepath = dirname($path);
                if ($filepath=='.' || $filepath=='') {
                    $filepath = '/';
                } else {
                    $filepath = '/'.ltrim($filepath, '/'); // require leading slash
                    $filepath = rtrim($filepath, '/').'/'; // require trailing slash
                }
                $filehash = sha1('/'.$coursecontext->id.'/course/legacy/0'.$filepath.$filename);

                // we might need the old file path, if the file has not been migrated
                $oldfilepath = $CFG->dataroot.'/'.$courseid.$filepath.$filename;

                // set parameters used to add file to filearea
                // (sortorder=1 siginifies the "mainfile" in this filearea)
                $context  = get_context_instance(CONTEXT_MODULE, $hotpot->cmid);
                $file_record = array(
                    'contextid'=>$context->id, 'component'=>'mod_hotpot', 'filearea'=>'sourcefile',
                    'sortorder'=>1, 'itemid'=>0, 'filepath'=>$filepath, 'filename'=>$filename
                );

                // initialize sourcefile settings
                $hotpot->sourcefile = $filepath.$filename;
                $hotpot->sourcetype = '';
                $hotpot->sourceitemid = 0;

                if ($file = $fs->get_file($context->id, 'mod_hotpot', 'sourcefile', 0, $filepath, $filename)) {
                    // file already exists for this context - shouldn't happen !!
                    // maybe an earlier upgrade failed for some reason ?
                    // anyway we must do this check, so that create_file_from_xxx() does not abort
                } else if ($url) {
                    // file is on an external url - unusual ?!
                    $file = $fs->create_file_from_url($file_record, $url);
                } else if ($file = $fs->get_file_by_hash($filehash)) {
                    // $file has already been migrated to Moodle's file system
                    // this is the route we expect most people to come :-)
                    $file = $fs->create_file_from_storedfile($file_record, $file);
                } else if (file_exists($oldfilepath)) {
                    // $file still exists on server's filesystem - unusual ?!
                    $file = $fs->create_file_from_pathname($file_record, $oldfilepath);
                } else {
                    // file was not migrated and is not on server's filesystem
                    $file = false;
                }

                // if source file did not exist, notify user of the problem
                if (empty($file)) {
                    if ($url) {
                        $msg = "course_modules.id=$hotpot->cmid, url=$url";
                    } else {
                        $msg = "course_modules.id=$hotpot->cmid, path=$path";
                    }
                    $msg = html_writer::link(new moodle_url('/course/modedit.php', array('update'=>$hotpot->cmid)), $msg);
                    $msg = get_string('sourcefilenotfound', 'hotpot', $msg);
                    echo html_writer::tag('div', $msg, array('class'=>'notifyproblem'));
                }

                // set $hotpot->sourcetype
                if ($pos = strrpos($hotpot->sourcefile, '.')) {
                    $filetype = substr($hotpot->sourcefile, $pos+1);
                    switch ($filetype) {
                        case 'jcl': $hotpot->sourcetype = 'hp_6_jcloze_xml'; break;
                        case 'jcw': $hotpot->sourcetype = 'hp_6_jcross_xml'; break;
                        case 'jmt': $hotpot->sourcetype = 'hp_6_jmatch_xml'; break;
                        case 'jmx': $hotpot->sourcetype = 'hp_6_jmix_xml'; break;
                        case 'jqz': $hotpot->sourcetype = 'hp_6_jquiz_xml'; break;
                        case 'rhb': $hotpot->sourcetype = 'hp_6_rhubarb_xml'; break;
                        case 'sqt': $hotpot->sourcetype = 'hp_6_sequitur_xml'; break;
                        case 'htm':
                        case 'html':
                        default:
                            if ($file) {
                                $pathnamehash = $fs->get_pathname_hash($context->id, 'mod_hotpot', 'sourcefile', 0, $filepath, $filename);
                                if ($contenthash = $DB->get_field('files', 'contenthash', array('pathnamehash'=>$pathnamehash))) {
                                    $l1 = $contenthash[0].$contenthash[1];
                                    $l2 = $contenthash[2].$contenthash[3];
                                    if (file_exists("$CFG->dataroot/filedir/$l1/$l2/$contenthash")) {
                                        $hotpot->sourcetype = hotpot::get_sourcetype($file);
                                    } else {
                                        $msg = html_writer::link(
                                            new moodle_url('/course/modedit.php', array('update'=>$hotpot->cmid)),
                                            "course_modules.id=$hotpot->cmid, path=$path"
                                        );
                                        $msg .= html_writer::empty_tag('br');
                                        $msg .= "filedir path=$l1/$l2/$contenthash";
                                        $msg = get_string('sourcefilenotfound', 'hotpot', $msg);
                                        echo html_writer::tag('div', $msg, array('class'=>'notifyproblem'));
                                    }
                                }
                            }
                    }
                }

                // JMatch has 2 output formats
                //     14 : v6  : drop down menus : hp_6_jmatch_xml_v6
                //     15 : v6+ : drag-and-drop   : hp_6_jmatch_xml_v6_plus
                // JMix has 2 output formats
                //     14 : v6  : links           : hp_6_jmix_xml_v6
                //     15 : v6+ : drag-and-drop   : hp_6_jmix_xml_v6_plus
                // since drag-and-drop is the "best" outputformat for both types of quiz,
                // we only need to worry about HotPots whose outputformat was 14 (="v6")

                // set $hotpot->outputformat
                if ($hotpot->outputformat==14 && ($hotpot->sourcetype=='hp_6_jmatch_xml' || $hotpot->sourcetype=='hp_6_jmix_xml')) {
                    $hotpot->outputformat = $hotpot->sourcetype.'_v6';
                } else {
                    $hotpot->outputformat = ''; //  = "best" output format
                }

                $DB->update_record('hotpot', $hotpot);

                // update progress bar
                $i++;
                $bar->update($i, $count, $strupdating.": ($i/$count)");
            }
            $rs->close();
        }

        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080316;
    if ($oldversion < $newversion) {

        // because the HotPot activities were probably hidden until now
        // we need to reset the course caches (using "course/lib.php")
        require_once($CFG->dirroot.'/course/lib.php');

        $courseids = array();
        if ($hotpots = $DB->get_records('hotpot', null, '', 'id,course')) {
            foreach ($hotpots as $hotpot) {
                $courseids[$hotpot->course] = true;
            }
            $courseids = array_keys($courseids);
        }
        unset($hotpots, $hotpot);

        foreach ($courseids as $courseid) {
            rebuild_course_cache($courseid, true);
        }
        unset($courseids, $courseid);

        // reset theme cache to force inclusion of new hotpot css
        theme_reset_all_caches();

        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080325;
    if ($oldversion < $newversion) {
        $table = new xmldb_table('hotpot');
        $fieldnames = array('sourceitemid', 'configitemid');
        foreach ($fieldnames as $fieldname) {
            $field = new xmldb_field($fieldname);
            if ($dbman->field_exists($table, $field)) {
                $dbman->drop_field($table, $field);
            }
        }
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080330;
    if ($oldversion < $newversion) {
        require_once($CFG->dirroot.'/mod/hotpot/lib.php');
        hotpot_refresh_events();
    }

    $newversion = 2010080333;
    if ($oldversion < $newversion) {
        update_capabilities('mod/hotpot');
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080338;
    if ($oldversion < $newversion) {
        $empty_cache = true;
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080339;
    if ($oldversion < $newversion) {
        $table = new xmldb_table('hotpot');
        $field = new xmldb_field('exitgrade', XMLDB_TYPE_INTEGER, '6', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'exitcm');
        xmldb_hotpot_fix_previous_field($dbman, $table, $field);
        if (! $dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080340;
    if ($oldversion < $newversion) {

        // force all text fields to be long text, the default for Moodle 2.3 and later
        $tables = array(
            'hotpot' => array(
                new xmldb_field('entrytext', XMLDB_TYPE_TEXT, 'long', null, XMLDB_NOTNULL),
                new xmldb_field('exittext', XMLDB_TYPE_TEXT, 'long', null, XMLDB_NOTNULL)
            ),
            'hotpot_cache' => array(
                new xmldb_field('content', XMLDB_TYPE_TEXT, 'long', null, XMLDB_NOTNULL)
            ),
            'hotpot_details' => array(
                new xmldb_field('details', XMLDB_TYPE_TEXT, 'long', null, XMLDB_NOTNULL)
            ),
            'hotpot_questions' => array(
                new xmldb_field('name', XMLDB_TYPE_TEXT, 'long', null, XMLDB_NOTNULL)
            ),
            'hotpot_strings' => array(
                new xmldb_field('string', XMLDB_TYPE_TEXT, 'long', null, XMLDB_NOTNULL)
            )
        );

        foreach ($tables as $tablename => $fields) {
            $table = new xmldb_table($tablename);
            foreach ($fields as $field) {
                if ($dbman->field_exists($table, $field)) {
                    $fieldname = $field->getName();
                    $DB->set_field_select($tablename, $fieldname, '', "$fieldname IS NULL");
                    $dbman->change_field_type($table, $field);
                }
            }
        }
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    $newversion = 2010080342;
    if ($oldversion < $newversion) {
        // force all MySQL integer fields to be signed, the default for Moodle 2.3 and later
        if ($DB->get_dbfamily() == 'mysql') {
            $prefix = $DB->get_prefix();
            $tables = $DB->get_tables();
            foreach ($tables as $table) {
                if (substr($table, 0, 6)=='hotpot') {
                    $rs = $DB->get_recordset_sql("SHOW COLUMNS FROM {$CFG->prefix}$table WHERE type LIKE '%unsigned%'");
                    foreach ($rs as $column) {
                        // copied from as "lib/db/upgradelib.php"
                        $type = preg_replace('/\s*unsigned/i', 'signed', $column->type);
                        $notnull = ($column->null === 'NO') ? 'NOT NULL' : 'NULL';
                        $default = (is_null($column->default) || $column->default === '') ? '' : "DEFAULT '$column->default'";
                        $autoinc = (stripos($column->extra, 'auto_increment') === false)  ? '' : 'AUTO_INCREMENT';
                        $sql = "ALTER TABLE `{$prefix}$table` MODIFY COLUMN `$column->field` $type $notnull $default $autoinc";
                        $DB->change_database_structure($sql);
                    }
                }
            }
        }
        upgrade_mod_savepoint(true, "$newversion", 'hotpot');
    }

    if ($empty_cache) {
        $DB->delete_records('hotpot_cache');
    }

    return true;
}

/**
 * xmldb_hotpot_fix_previous_fields
 *
 * @param xxx $dbman
 * @param xmldb_table $table
 * @param array of xmldb_field $fields (passed by reference)
 * @return void, but may update some items in $fields array
 */
function xmldb_hotpot_fix_previous_fields($dbman, $table, &$fields) {
    foreach ($fields as $i => $field) {
        xmldb_hotpot_fix_previous_field($dbman, $table, $fields[$i]);
    }
}

/**
 * xmldb_hotpot_fix_previous_field
 *
 * @param xxx $dbman
 * @param xmldb_table $table
 * @param xmldb_field $field (passed by reference)
 * @return void, but may update $field->previous
 */
function xmldb_hotpot_fix_previous_field($dbman, $table, &$field) {
    $previous = $field->getPrevious();
    if (empty($previous) || $dbman->field_exists($table, $previous)) {
        // $previous field exists - do nothing
    } else {
        // $previous field does not exist, so remove it
        $field->setPrevious(null);
    }
}
