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
 * This file keeps track of upgrades to the geogebra module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    mod
 * @subpackage geogebra
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/mod/geogebra/lib.php');

/**
 * Execute geogebra upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_geogebra_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager(); // loads ddl manager and xmldb classes

    if ($oldversion < 2012030100) {
        //Add grade field
        $table = new XMLDBTable('geogebra');
        $field = new XMLDBField('grade');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null, null, '100', 'showsubmit');
        $result = $result && add_field($table, $field);

        //Add autograde field
        $field = new XMLDBField('autograde');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null, null, '0', 'grade');
        $result = $result && add_field($table, $field);

        //Delete maxgrade field
        $field = new XMLDBField('maxgrade');
        $result = $result && drop_field($table, $field);

        //Make maxattempts signed
        $field = new XMLDBField('maxattempts');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', false, XMLDB_NOTNULL, null, null, null, '-1', 'autograde');
        $result = $result && change_field_unsigned($table, $field);

        //Add gradecomment field
        $table = new XMLDBTable('geogebra_attempts');
        $field = new XMLDBField('gradecomment');
        $field->setAttributes(XMLDB_TYPE_TEXT, 'small', null, null, null, null, null, null, 'vars');
        $result = $result && add_field($table, $field);
    }

    if ($oldversion < 2012030101) {
        $table = new XMLDBTable('geogebra_attempts');
        $field = new XMLDBField('dateteacher');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0', 'finished');
        $result = $result && add_field($table, $field);
    }

    if ($oldversion < 2012082100) {
        $table = new XMLDBTable('geogebra');
        $field = new XMLDBField('url');
        $field->setAttributes(XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, null, null, 'intro');
        $result = $result && change_field_precision($table, $field);

        $table = new XMLDBTable('geogebra_attempts');
        $field = new XMLDBField('gradecomment');
        $field->setAttributes(XMLDB_TYPE_TEXT, 'small', null, false, null, null, null, null, 'vars');
        $result = $result && change_field_notnull($table, $field);

        $field = new XMLDBField('date');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0');
        $result = $result && rename_field($table, $field, 'datestudent');

    }

    if ($oldversion < 2011122902) {

        /// Define field introformat to be added to geogebra
        $table = new xmldb_table('geogebra');
        $field = new xmldb_field('introformat');
        $field->set_attributes(XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'intro');

        /// Launch add field introformat
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // conditionally migrate to html format in intro
        if ($CFG->texteditors !== 'textarea') {
            $rs = $DB->get_recordset('geogebra', array('introformat'=>FORMAT_MOODLE), '', 'id,intro,introformat');
            foreach ($rs as $f) {
                $f->intro       = text_to_html($f->intro, false, false, true);
                $f->introformat = FORMAT_HTML;
                $DB->update_record('geogebra', $f);
                upgrade_set_timeout();
            }
            $rs->close();
        }

        /// geogebra savepoint reached
        upgrade_mod_savepoint(true, 2011122902, 'geogebra');
    }

//===== 1.9.0 upgrade line ======//

    if ($oldversion < 2012042700) {

        require_once("$CFG->dirroot/mod/geogebra/db/upgradelib.php");
        // Add upgrading code from 1.9 (+ new file storage system)
        // @TODO: test it!!!!
        geogebra_migrate_files();

        // geogebra savepoint reached
        upgrade_mod_savepoint(true, 2012042700, 'geogebra');
    }


    if ($oldversion < 2013050600) {

        // @TODO: test it!!!!
        //Add atrributes field
        $table = new xmldb_table('geogebra');
        $field = new xmldb_field('attributes');
        $field->set_attributes(XMLDB_TYPE_TEXT, 'small', null, null, null, null, null, null, 'url');
        $dbman->add_field($table, $field);

        $rs = $DB->get_recordset('geogebra');
        foreach ($rs as $f) {
            parse_str($f->url, $parsedVarsURL);
            if (array_key_exists('filename', $parsedVarsURL)) {
                // From Moodle 2, URL field only contains information about the GGB file location
                $f->url = $parsedVarsURL['filename'];
                // Remove filename from parsedVarsURL array (to avoid save twice)
                unset($parsedVarsURL['filename']);
                // Store other attributes in the new param
                $f->attributes = http_build_query($parsedVarsURL);
                $DB->update_record('geogebra', $f);
                upgrade_set_timeout();
            }
        }
        $rs->close();

        // geogebra savepoint reached
        upgrade_mod_savepoint(true, 2013050600, 'geogebra');
    }

    if ($oldversion < 2014011305) {
        // Change default codebase to avoid problems sending data
        $sql = "UPDATE {config} SET value='".GEOGEBRA_DEFAULT_CODEBASE."' WHERE name='geogebra_javacodebase'";
        $DB->execute($sql);

        // geogebra savepoint reached
        upgrade_mod_savepoint(true, 2014011305, 'geogebra');
    }


    // Final return of upgrade result (true, all went good) to Moodle.
    return true;
}
