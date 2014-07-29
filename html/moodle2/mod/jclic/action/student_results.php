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
 * Prints results from a specific session
 *
 * @package    mod
 * @subpackage jclic
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))).'/../config.php');
require_once(dirname(__FILE__).'/../locallib.php');



$id = optional_param('id', 0, PARAM_INT); // course_module ID, or

if ($id) {
    $cm         = get_coursemodule_from_id('jclic', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $jclic      = $DB->get_record('jclic', array('id' => $cm->instance), '*', MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = context_module::instance($cm->id);
require_capability('mod/jclic:view', $context);


$strjclics = get_string("modulenameplural", "jclic");
$strstarttime  = get_string("starttime", "jclic");
$strscore  = get_string("score", "jclic");
$strtotaltime  = get_string("totaltime", "jclic");
$strtotals  = get_string("totals", "jclic");
$strdone  = get_string("activitydone", "jclic");
$stractivitysolved  = get_string("activitysolved", "jclic");
$strattempts  = get_string("attempts", "jclic");
$strlastaccess  = get_string("lastaccess", "jclic");
$strmsgnosessions  = get_string("msg_nosessions", "jclic");

$stractivity = get_string("activity", "jclic");
$strsolved = get_string("solved", "jclic");
$stractions = get_string("actions", "jclic");
$strtime = get_string("time", "jclic");
$stryes = get_string("yes");
$strno = get_string("no");


$PAGE->set_url('/mod/jclic/action/student_results.php', array('id' => $cm->id));
$PAGE->set_title(format_string($course->fullname.' - '.$jclic->name));
$PAGE->set_context($context);
$PAGE->set_pagelayout('popup');

echo $OUTPUT->header();

$sessions = jclic_get_sessions($jclic->id, $USER->id);

if (sizeof($sessions)>0){
    $PAGE->requires->js('/mod/jclic/jclic.js');
    $table = new html_table();
    $table->head = array($strstarttime, $strscore, $strtotaltime, get_string('solveddone', 'jclic'), $strattempts);

    // Print session data
    foreach($sessions as $session){
        $starttime='<a href="#" onclick="showSessionActivities(\''.$session->session_id.'\');">'.date('d/m/Y H:i', strtotime($session->starttime)).'</a>';
        $table->data[] = array($starttime, $session->score.'%', $session->totaltime, $session->solved.' / '.$session->done,$session->attempts.($jclic->maxattempts>0?'/'.$jclic->maxattempts:''));
        // Print activities for each session
        $session_activities_html= jclic_get_session_activities_html($session->session_id);
        $cell = new html_table_cell();
        $cell->text = $session_activities_html;
        $cell->colspan = 5;
        $row = new html_table_row();
        $row->id = 'session_'.$session->session_id;
        $row->attributes = array('class' => 'jclic-session-activities-hidden') ;
        $row->cells[] = $cell;
        $table->data[] = $row;
    }

    if (sizeof($sessions)>1){
        $sessions_summary = jclic_get_sessions_summary($jclic->id,$USER->id);
        $table->data[] = array('<b>'.$strtotals.'</b>', '<b>'.$sessions_summary->score.'%</b>', '<b>'.$sessions_summary->totaltime.'</b>','<b>'.$sessions_summary->solved.' / '.$sessions_summary->done.'</b>','<b>'.$sessions_summary->attempts.'</b>');
    }
    echo html_writer::table($table);
} else{
  echo '<br><center>'.$strmsgnosessions.'</center>';
}

echo $OUTPUT->footer();
