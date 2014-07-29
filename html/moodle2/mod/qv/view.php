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
 * Prints a particular instance of qv
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
require_once('locallib.php');
require_once($CFG->libdir . '/completionlib.php');

$id = optional_param('id', 0, PARAM_INT);  // Course Module ID
$q  = optional_param('q', 0, PARAM_INT);   // qv instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('qv', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $record         = $DB->get_record('qv', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($q) {
    $record         = $DB->get_record('qv', array('id' => $q), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $qv->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('qv', $qv->id, $course->id, false, MUST_EXIST);
} else {
    print_error('You must specify a course_module ID or an instance ID');
}

$qv = new qv();
$qv->load_record($record);

$PAGE->set_url('/mod/qv/view.php', array('id' => $cm->id));
require_login($course, true, $cm);

require_capability('mod/qv:view', $qv->context);

add_to_log($course->id, 'qv', 'view', "view.php?id={$cm->id}", $qv->name, $cm->id);

/// Print the page header
$PAGE->set_title(format_string($qv->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($qv->context);


// Mark viewed if required
$completion = new completion_info($course);
$completion->set_module_viewed($cm);

echo $OUTPUT->header();

groups_print_activity_menu($cm, $CFG->wwwroot . '/mod/qv/view.php?id=' . $cm->id);

$intro = format_module_intro('qv', $qv, $cm->id);
echo $OUTPUT->box($intro, 'generalbox boxaligncenter','intro');

$action = optional_param('action', '', PARAM_TEXT);
if (has_capability('moodle/grade:viewall', $qv->context, $USER->id, true)){
    if ($action == 'preview'){
        echo $qv->view_assessment($USER, true);
    } else{
        echo $qv->view_dates();
        echo $qv->print_results_table($course, $action);
    }
} else{
    echo $qv->view_assessment($USER);
}

echo $OUTPUT->footer();
