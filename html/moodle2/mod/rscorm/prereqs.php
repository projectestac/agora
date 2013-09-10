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

    // this page is called via AJAX to repopulte the TOC when LMSFinish() is called

require_once('../../config.php');
require_once($CFG->dirroot.'/mod/rscorm/locallib.php');

$id = optional_param('id', '', PARAM_INT);       // Course Module ID, or
$a = optional_param('a', '', PARAM_INT);         // scorm ID
$scoid = required_param('scoid', PARAM_INT);  // sco ID
$attempt = required_param('attempt', PARAM_INT);  // attempt number
$mode = optional_param('mode', 'normal', PARAM_ALPHA); // navigation mode
$currentorg = optional_param('currentorg', '', PARAM_RAW); // selected organization

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

$PAGE->set_url('/mod/rscorm/prereqs.php', array('scoid'=>$scoid, 'attempt'=>$attempt, 'id'=>$cm->id));

//MARSUPIAL ********** MODIFICA - allow context course
// 2012.12.17 @abertranb
require_login($course);
// ********* ORIGINAL
//require_login($course, false, $cm);
// ********* FI

$scorm->version = strtolower(clean_param($scorm->version, PARAM_SAFEDIR));   // Just to be safe
if (!file_exists($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php')) {
    $scorm->version = 'rscorm_12';
}
require_once($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php');


if (confirm_sesskey() && (!empty($scoid))) {
    $result = true;
    $request = null;
    if (has_capability('mod/rscorm:savetrack', get_context_instance(CONTEXT_MODULE, $cm->id))) {
        $result = rscorm_get_toc($USER, $scorm, $cm->id, RTOCJSLINK, $currentorg, $scoid, $mode, $attempt, true, false);
        echo $result->toc;
    }
}
