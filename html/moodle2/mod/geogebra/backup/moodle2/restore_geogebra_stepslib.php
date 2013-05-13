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
 * Define all the restore steps that will be used by the restore_geogebra_activity_task
 * 
 * @package    mod
 * @subpackage geogebra
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Structure step to restore one geogebra activity
 */
class restore_geogebra_activity_structure_step extends restore_activity_structure_step {

    protected function define_structure() {

        $paths = array();
        $userinfo = $this->get_setting_value('userinfo');

        $paths[] = new restore_path_element('geogebra', '/activity/geogebra');
        if ($userinfo) {
            $paths[] = new restore_path_element('geogebra_attempt', '/activity/geogebra/attempts/attempt');
        }

        // Return the paths wrapped into standard activity structure
        return $this->prepare_activity_structure($paths);
    }

    protected function process_geogebra($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->course = $this->get_courseid();

        $data->timeavailable = $this->apply_date_offset($data->timeavailable);
        $data->timedue = $this->apply_date_offset($data->timedue);

        // insert the geogebra record
        $newitemid = $DB->insert_record('geogebra', $data);
        // immediately after inserting "activity" record, call this
        $this->apply_activity_instance($newitemid);
    }

    protected function process_geogebra_attempt($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;

        $data->geogebra = $this->get_new_parentid('geogebra');
        $data->userid = $this->get_mappingid('user', $data->userid);

        $newitemid = $DB->insert_record('geogebra_attempts', $data);
    }


    protected function after_execute() {
        // Add geogebra related files, no need to match by itemname (just internally handled context)
        $this->add_related_files('mod_geogebra', 'intro', null);
        $this->add_related_files('mod_geogebra', 'content', null);
    }
}