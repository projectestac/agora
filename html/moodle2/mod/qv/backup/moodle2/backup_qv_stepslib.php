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
 * Define all the backup steps that will be used by the backup_qv_activity_task
 *
 * @package    mod
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Define all the backup steps that will be used by the backup_scorm_activity_task
 */

/**
 * Define the complete qv structure for backup, with file and id annotations
 */
class backup_qv_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated
        $qv = new backup_nested_element('qv', array('id'), array(
            'name', 'intro', 'introformat', 'reference', 'skin', 'assessmentlang', 'maxdeliver',
            'showcorrection', 'showinteraction', 'ordersections', 'orderitems', 'target',
            'grade', 'width', 'height', 'timeavailable', 'timedue'));

        $assignments = new backup_nested_element('assignments');

        $assignment = new backup_nested_element('assignment', array('id'), array(
            'userid', 'sectionorder', 'itemorder', 'idnumber'));

        $sections = new backup_nested_element('sections');

        $section = new backup_nested_element('section', array('id'), array(
            'sectionid', 'responses', 'scores', 'pending_scores', 'attempts',
            'state', 'time'));

		$messages = new backup_nested_element('messages');

        $message = new backup_nested_element('message', array('id'), array(
            'itemid', 'userid', 'created', 'message'));

		$messages_read = new backup_nested_element('messages_read');

        $message_read = new backup_nested_element('message_read', array('id'), array(
            'userid', 'timereaded'));

        // Build the tree
        $qv->add_child($assignments);

        $assignments->add_child($assignment);
        $assignment->add_child($sections);

        $sections->add_child($section);
		$section->add_child($messages);
        $messages->add_child($message);
		$section->add_child($messages_read);
        $messages_read->add_child($message_read);

        // Define sources
        $qv->set_source_table('qv', array('id' => backup::VAR_ACTIVITYID));

        // All the rest of elements only happen if we are including user info
        if ($userinfo) {
            $assignment->set_source_table('qv_assignments', array('qvid' => backup::VAR_PARENTID));
            $section->set_source_table('qv_sections', array('assignmentid' => '../../id'));
            $message->set_source_table('qv_messages', array('sid' => '../../id'));
            $message_read->set_source_table('qv_messages_read', array('sid' => '../../id'));

            $assignment->annotate_ids('user', 'userid');
			$message->annotate_ids('user', 'userid');
			$message_read->annotate_ids('user', 'userid');
        }

        // Define id annotations
        $qv->annotate_ids('scale', 'grade');


        // Define file annotations
        $qv->annotate_files('mod_qv', 'intro', null);     // This file area hasn't itemid
        $qv->annotate_files('mod_qv', 'package', null);   // This file area hasn't itemid

        // Return the root element (qv), wrapped into standard activity structure
        return $this->prepare_activity_structure($qv);
    }
}
