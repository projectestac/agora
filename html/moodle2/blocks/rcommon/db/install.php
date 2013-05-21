<?php

// This file is part of Marsupial Moodle - http://moodle.org/
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
 * Disable the rcommon module for new installs
 *
 * @package rcommon
 * @copyright 2012 XTEC {@link http://projectes.lafarga.cat/projects/marsupial}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();


/**
 * Code run after the rcommon module database tables have been created.
 * Disables this plugin for new installs
 * @return bool
 */
function xmldb_block_rcommon_install() {
    global $DB;

    // do the install
    $record = new stdClass();
    $record->name		= '1r ESO';
    $record->code 		= '1ESO';
    $DB->insert_record('rcommon_level', $record);
    
    $record = new stdClass();
    $record->name		= '2n ESO';
    $record->code 		= '2ESO';
    $DB->insert_record('rcommon_level', $record);

    $record = new stdClass();
    $record->name		= '3r ESO';
    $record->code 		= '3ESO';
    $DB->insert_record('rcommon_level', $record);
    
    $record = new stdClass();
    $record->name		= '4r ESO';
    $record->code 		= '4ESO';
    $DB->insert_record('rcommon_level', $record);

    $record = new stdClass();
    $record->name		= '1r EP';
    $record->code 		= '1EP';
    $DB->insert_record('rcommon_level', $record);
    
    $record = new stdClass();
    $record->name		= '2n EP';
    $record->code 		= '2EP';
    $DB->insert_record('rcommon_level', $record);
    
    $record = new stdClass();
    $record->name		= '3r EP';
    $record->code 		= '3EP';
    $DB->insert_record('rcommon_level', $record);
    
    $record = new stdClass();
    $record->name		= '4r EP';
    $record->code 		= '4EP';
    $DB->insert_record('rcommon_level', $record);
    
    $record = new stdClass();
    $record->name		= '5è EP';
    $record->code 		= '5EP';
    $DB->insert_record('rcommon_level', $record);

    $record = new stdClass();
    $record->name		= '6è EP';
    $record->code 		= '6EP';
    $DB->insert_record('rcommon_level', $record);
    // Should not need to modify course modinfo because this is a new install

    return true;
}