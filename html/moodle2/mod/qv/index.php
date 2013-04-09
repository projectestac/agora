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
 * This is a one-line short description of the file
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->dirroot.'/mod/qv/locallib.php');

$id = required_param('id', PARAM_INT); // Course ID
$course = $DB->get_record('course', array('id' => $id), '*', MUST_EXIST);
require_login($course);
$PAGE->set_url('/mod/qv/index.php', array('id' => $id));
$PAGE->set_pagelayout('incourse');

add_to_log($course->id, 'qv', 'view all', "index.php?id={$course->id}", "");

// Print the header
$strplural = get_string('modulenameplural', 'qv');
$PAGE->navbar->add($strplural);
$PAGE->set_title($strplural);
$PAGE->set_heading($course->fullname);
$context = context_course::instance($course->id);
$PAGE->set_context($context);

echo $OUTPUT->header();

// Get all the appropriate data
if (!$qvs = get_all_instances_in_course('qv', $course)) {
    notice(get_string('thereareno', 'moodle', $strplural), new moodle_url('/course/view.php', array('id' => $course->id)));
    die;
}


echo $OUTPUT->heading(get_string('modulenameplural', 'qv'), 2);

// Check if we need the closing date header
$table = new html_table();

if ($course->format == 'weeks') {
    $table->head  = array (get_string('week'), $strplural, get_string('duedate', 'qv'));
    $table->align = array ('center', 'left', 'left');
} else if ($course->format == 'topics') {
    $table->head  = array (get_string('topic'), $strplural, get_string('duedate', 'qv'));
    $table->align = array ('center', 'left', 'left');
} else {
    $table->head  = array ($strplural, get_string('duedate', 'qv'));
    $table->align = array ('left', 'left');
}
$table->data = array();
foreach ($qvs as $qv) {
    $date = '-';
    if (!empty($qv->timedue)) {
        $date = userdate($qv->timedue);
    }

    if (!$qv->visible) {
		//Show dimmed if the mod is hidden
		$attributes = array('class'=>'dimmed');
    } else {
        //Show normal if the mod is visible
		$attributes = array();
    }

	$link = html_writer::link(new moodle_url('/mod/qv/view.php', array('id' => $qv->coursemodule)), $qv->name, $attributes);

    if ($course->format == 'weeks' or $course->format == 'topics') {
        $row = array ($qv->section, $link, $date);
    } else {
        $row = array ($link, $date);
    }

    $table->data[] = $row;

}
echo html_writer::table($table);
echo $OUTPUT->footer();



