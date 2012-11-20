<?php // $Id: backup_eoicampus_activity_stepslib.php,v 1.2 2012/11/15 09:20:29 abertranb Exp $

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
 * @package moodlecore
 * @subpackage backup-moodle2
 * @copyright   2012 xtec.cat
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Define all the backup steps that will be used by the backup_eoicampus_activity_task
 */

/**
 * Define the complete eoicampus structure for backup, with file and id annotations
 */
class backup_eoicampus_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        //the URL module stores no user info

        // Define each element separated
        $eoicampus = new backup_nested_element('eoicampus', array('id'), array(
            'course', 'name', 'description', 'pwlevel',
            'pwid', 'pwtype'));

        // Build the tree

        // Apply for 'eoicampus' subplugins optional stuff at eoicampus level (not multiple)
        // Remember that order is important, try moving this line to the end and compare XML
        // not neeeded in eoicampus module
        //$this->add_subplugin_structure('eoicampus', $eoicampus, false);
        //$eoicampus->add_child($submissions);

        // Define sources
        $eoicampus->set_source_table('eoicampus', array('id' => backup::VAR_ACTIVITYID));

        // Define id annotations
        //module has no id annotations

        // Define file annotations
        $eoicampus->annotate_files('mod_eoicampus', 'description', null); // This file area hasn't itemid

        // Return the root element (eoicampus), wrapped into standard activity structure
        return $this->prepare_activity_structure($eoicampus);
    }
}
