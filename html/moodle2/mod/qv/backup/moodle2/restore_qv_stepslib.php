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
 * @package    mod
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Define all the restore steps that will be used by the restore_qv_activity_task
 */

/**
 * Structure step to restore one qv activity
 */
class restore_qv_activity_structure_step extends restore_activity_structure_step {

    protected function define_structure() {

        $paths = array();
        $userinfo = $this->get_setting_value('userinfo');

        $paths[] = new restore_path_element('qv', '/activity/qv');
        if ($userinfo) {
            $paths[] = new restore_path_element('qv_assignments', '/activity/qv/assignments/assignment');
            $paths[] = new restore_path_element('qv_sections', '/activity/qv/assignments/assignment/sections/section');
            $paths[] = new restore_path_element('qv_messages', '/activity/qv/assignments/assignment/sections/section/messages/message');
            $paths[] = new restore_path_element('qv_messages_read', '/activity/qv/assignments/assignment/sections/section/messages_read/message_read');
        }

        // Return the paths wrapped into standard activity structure
        return $this->prepare_activity_structure($paths);
    }

    protected function process_qv($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;

        $data->course = $this->get_courseid();

        $data->timeavailable = $this->apply_date_offset($data->timeavailable);
        $data->timedue = $this->apply_date_offset($data->timedue);

        // insert the qv record
        $newitemid = $DB->insert_record('qv', $data);
        // immediately after inserting "activity" record, call this
        $this->apply_activity_instance($newitemid);
    }

    protected function process_qv_assignments($data) {
        global $DB;

        $data = (object)$data;

        $oldid = $data->id;
        $data->qvid = $this->get_new_parentid('qv');

        $data->userid = $this->get_mappingid('user', $data->userid);
        
        $newitemid = $DB->insert_record('qv_assignments', $data);
        $this->set_mapping('qv_assignments', $oldid, $newitemid);
    }

    protected function process_qv_sections($data) {
        global $DB;

        $data = (object)$data;
        
        $oldid = $data->id;
        $data->assignmentid = $this->get_new_parentid('qv_assignments');
        
        $newitemid = $DB->insert_record('qv_sections', $data);
        $this->set_mapping('qv_sections', $oldid, $newitemid);
    }

    protected function process_qv_messages($data) {
        global $DB;

        $data = (object)$data;

        $oldid = $data->id;
        $data->sid = $this->get_new_parentid('qv_sections');
        $data->userid = $this->get_mappingid('user', $data->userid);
        
        $newitemid = $DB->insert_record('qv_messages', $data);
        $this->set_mapping('qv_messages', $oldid, $newitemid);
    }
    
	protected function process_qv_messages_read($data) {
        global $DB;

        $data = (object)$data;
        
        $oldid = $data->id;
        $data->sid = $this->get_new_parentid('qv_sections');
        $data->userid = $this->get_mappingid('user', $data->userid);
        $data->timereaded = $this->apply_date_offset($data->timereaded);
        
        $newitemid = $DB->insert_record('qv_messages_read', $data);
        $this->set_mapping('qv_messages_read', $oldid, $newitemid);
    }

    protected function after_execute() {
        // Add qv related files, no need to match by itemname (just internally handled context)
        $this->add_related_files('mod_qv', 'intro', null);
        $this->add_related_files('mod_qv', 'package', null);
    }
}
