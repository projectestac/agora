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
 * Upgrade script for the rscorm module.
 *
 * @package    mod
 * @subpackage rscorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * @global moodle_database $DB
 * @param int $oldversion
 * @return bool
 */
function xmldb_rscorm_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();


    // Moodle v2.2.0 release upgrade line
    // Put any upgrade step following this

    if ($oldversion < 2012032100) {
        unset_config('updatetime', 'rscorm');
        upgrade_mod_savepoint(true, 2012032100, 'rscorm');
    }

    // Adding completion fields to rscorm table
    if ($oldversion < 2012032101) {
        $table = new xmldb_table('rscorm');

        $field = new xmldb_field('completionstatusrequired', XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, null, null, null, 'timemodified');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $field = new xmldb_field('completionscorerequired', XMLDB_TYPE_INTEGER, '2', XMLDB_UNSIGNED, null, null, null, 'completionstatusrequired');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        upgrade_mod_savepoint(true, 2012032101, 'rscorm');
    }

    // Moodle v2.3.0 release upgrade line
    // Put any upgrade step following this

    //rename config var from maxattempts to maxattempt
    if ($oldversion < 2013030500) {
        $maxattempts = get_config('rscorm', 'maxattempts');
        $maxattempts_adv = get_config('rscorm', 'maxattempts_adv');
        set_config('maxattempt', $maxattempts, 'rscorm');
        set_config('maxattempt_adv', $maxattempts_adv, 'rscorm');

        unset_config('maxattempts', 'rscorm'); //remove old setting.
        unset_config('maxattempts_adv', 'rscorm'); //remove old setting.
        upgrade_mod_savepoint(true, 2013030500, 'rscorm');
    }

    return true;
}


