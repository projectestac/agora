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
 *
 * Define all the backup steps that will be used by the backup_geogebra_activity_task
 *
 * @package    mod
 * @subpackage geogebra
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Define the complete geogebra structure for backup, with file and id annotations
 */
class backup_geogebra_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated
        $geogebra = new backup_nested_element('geogebra', array('id'), array(
            'name', 'intro', 'introformat', 'url', 'attributes', 'width', 'height',
            'showsubmit', 'grade', 'autograde', 'maxattempts', 'grademethod',
            'timeavailable', 'timedue', 'timecreated', 'timemodified'));

        $attempts = new backup_nested_element('attempts');

        $attempt = new backup_nested_element('attempt', array('id'), array(
            'geogebra', 'userid', 'vars', 'gradecomment', 'finished',
            'dateteacher', 'datestudent'));

        // Build the tree
        $geogebra->add_child($attempts);
        $attempts->add_child($attempt);

        // Define sources
        $geogebra->set_source_table('geogebra', array('id' => backup::VAR_ACTIVITYID));

        // All the rest of elements only happen if we are including user info
        if ($userinfo) {
            $attempt->set_source_table('geogebra_attempts', array('geogebra' => backup::VAR_PARENTID));
        }

        // Define id annotations
        $geogebra->annotate_ids('scale', 'grade');
        $attempt->annotate_ids('user', 'userid');

        // Define file annotations
        $geogebra->annotate_files('mod_geogebra', 'intro', null);     // This file area hasn't itemid
        $geogebra->annotate_files('mod_geogebra', 'content', null);   // This file area hasn't itemid

        // Return the root element (geogebra), wrapped into standard activity structure
        return $this->prepare_activity_structure($geogebra);
    }
}