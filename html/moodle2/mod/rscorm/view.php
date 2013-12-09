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

require_once("../../config.php");
require_once($CFG->dirroot.'/mod/rscorm/locallib.php');

$id = optional_param('id', '', PARAM_INT);       // Course Module ID, or
$a = optional_param('a', '', PARAM_INT);         // scorm ID
$organization = optional_param('organization', '', PARAM_INT); // organization ID
$action = optional_param('action', '', PARAM_ALPHA);

if (!empty($id)) {
    if (! $cm = get_coursemodule_from_id('rscorm', $id)) {
        print_error('invalidcoursemodule');
    }
    if (! $course = $DB->get_record("course", array("id"=>$cm->course))) {
        print_error('coursemisconf');
    }
    if (! $scorm = $DB->get_record("rscorm", array("id"=>$cm->instance))) {
        print_error('invalidcoursemodule');
    }
} else if (!empty($a)) {
    if (! $scorm = $DB->get_record("rscorm", array("id"=>$a))) {
        print_error('invalidcoursemodule');
    }
    if (! $course = $DB->get_record("course", array("id"=>$scorm->course))) {
        print_error('coursemisconf');
    }
    if (! $cm = get_coursemodule_from_instance("rscorm", $scorm->id, $course->id)) {
        print_error('invalidcoursemodule');
    }
} else {
    print_error('missingparameter');
}

$url = new moodle_url('/mod/rscorm/view.php', array('id'=>$cm->id));
if ($organization !== '') {
    $url->param('organization', $organization);
}
$PAGE->set_url($url);
$forcejs = get_config('rscorm', 'forcejavascript');
if (!empty($forcejs)) {
    $PAGE->add_body_class('forcejavascript');
}

//MARSUPIAL ********** MODIFICA - allow context course
// 2012.12.17 @abertranb
require_login($course);
// ********* ORIGINAL
//require_login($course, false, $cm);
// ********* FI

if (!empty($scorm->popup)) {
    $PAGE->requires->data_for_js('rscormplayerdata', Array('cwidth'=>$scorm->width,
        'cheight'=>$scorm->height,
        'popupoptions' => $scorm->options), true);
    $PAGE->requires->js('/mod/rscorm/view.js', true);
}

$context = get_context_instance(CONTEXT_COURSE, $course->id);
$contextmodule = get_context_instance(CONTEXT_MODULE, $cm->id);

if (isset($SESSION->scorm)) {
    unset($SESSION->scorm);
}

//MARSUPIAL ********** Afegit -> call to the web services
//call to autentification web services
$scorm->module='rscorm';
$scorm->cmid=$cm->id;
require_once($CFG->dirroot.'/blocks/rcommon/WebServices/Authentication/AuthenticateContent.php');
$return = AuthenticateUserContent($scorm);

if (isset($return->AutenticarUsuarioContenidoResult->URL)){
	$url = $return->AutenticarUsuarioContenidoResult->URL;
} else {
	$url = "";
}

if(!$localurl = rscorm_set_manifest_by_user($scorm, $url)){
	error("error getting acces to activity");
}

require_once('datamodels/scormlib.php');
rscorm_parse_scorm(textlib::substr($localurl,0,textlib::strlen($localurl)-16),$scorm);

//********** FI

$strscorms = get_string("modulenameplural", "rscorm");
$strscorm  = get_string("modulename", "rscorm");

$shortname = format_string($course->shortname, true, array('context' => $context));
$pagetitle = strip_tags($shortname.': '.format_string($scorm->name));

add_to_log($course->id, 'rscorm', 'pre-view', 'view.php?id='.$cm->id, "$scorm->id", $cm->id);

if ((has_capability('mod/rscorm:skipview', $contextmodule))) {
    rscorm_simple_play($scorm, $USER, $contextmodule, $cm->id);
}

//
// Print the page header
//
$PAGE->set_title($pagetitle);
$PAGE->set_heading($course->fullname);

$PAGE->navbar->add(get_string('modulenameplural', 'rscorm'), new moodle_url('/mod/rscorm/index.php', array('id'=>$course->id)));
$PAGE->navbar->add($scorm->name);
echo $OUTPUT->header();

if (!empty($action) && confirm_sesskey() && has_capability('mod/rscorm:deleteownresponses', $contextmodule)) {
    if ($action == 'delete') {
        $confirmurl = new moodle_url($PAGE->url, array('action'=>'deleteconfirm'));
        echo $OUTPUT->confirm(get_string('deleteuserattemptcheck', 'rscorm'), $confirmurl, $PAGE->url);
        echo $OUTPUT->footer();
        exit;
    } else if ($action == 'deleteconfirm') {
        //delete this users attempts.
        $DB->delete_records('rscorm_scoes_track', array('userid' => $USER->id, 'scormid' => $scorm->id));
        rscorm_update_grades($scorm, $USER->id, true);
        echo $OUTPUT->notification(get_string('rscormresponsedeleted', 'rscorm'), 'notifysuccess');
    }
}

$currenttab = 'info';
require($CFG->dirroot . '/mod/rscorm/tabs.php');

// Print the main part of the page
echo $OUTPUT->heading(format_string($scorm->name));
$attemptstatus = '';
if ($scorm->displayattemptstatus == 1) {
    $attemptstatus = rscorm_get_attempt_status($USER, $scorm, $cm);
}
echo $OUTPUT->box(format_module_intro('rscorm', $scorm, $cm->id).$attemptstatus, 'generalbox boxaligncenter boxwidthwide', 'intro');

$scormopen = true;
$timenow = time();
if (!empty($scorm->timeopen) && $scorm->timeopen > $timenow) {
    echo $OUTPUT->box(get_string("notopenyet", "rscorm", userdate($scorm->timeopen)), "generalbox boxaligncenter");
    $scormopen = false;
}
if (!empty($scorm->timeclose) && $timenow > $scorm->timeclose) {
    echo $OUTPUT->box(get_string("expired", "rscorm", userdate($scorm->timeclose)), "generalbox boxaligncenter");
    $scormopen = false;
}
if ($scormopen) {
    rscorm_view_display($USER, $scorm, 'view.php?id='.$cm->id, $cm);
}
if (!empty($forcejs)) {
    echo $OUTPUT->box(get_string("forcejavascriptmessage", "rscorm"), "generalbox boxaligncenter forcejavascriptmessage");
}

if (!empty($scorm->popup)) {
    $PAGE->requires->js_init_call('M.mod_rscormform.init');
}

echo $OUTPUT->footer();
