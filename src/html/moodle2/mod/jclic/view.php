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
 * Prints a particular instance of jclic
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage jclic
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/locallib.php');
require_once($CFG->libdir.'/completionlib.php');


$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // jclic instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('jclic', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $jclic  = $DB->get_record('jclic', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $jclic  = $DB->get_record('jclic', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $jclic->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('jclic', $jclic->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = get_context_instance(CONTEXT_MODULE, $cm->id);
require_capability('mod/jclic:view', $context);

add_to_log($course->id, 'jclic', 'view', "view.php?id={$cm->id}", $jclic->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/jclic/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($jclic->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);


// Mark viewed if required
$completion = new completion_info($course);
$completion->set_module_viewed($cm);

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');
//$PAGE->add_body_class('jclic-'.$somevar);

jclic_view_header($jclic, $cm, $course);
jclic_view_intro($jclic, $cm);

$action = optional_param('action', '', PARAM_TEXT);
if (has_capability('mod/jclic:grade', $context, $USER->id, false)){    
    if ($action == 'preview'){
        jclic_view_applet($jclic, $context, true);
    } else{
        jclic_view_dates($jclic, $cm);
        jclic_print_results_table($jclic, $context, $cm, $course, $action);
    }
    
} else{
    jclic_view_applet($jclic, $context);    
}

jclic_view_footer();
