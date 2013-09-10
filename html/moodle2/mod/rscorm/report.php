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

// This script uses installed report plugins to print scorm reports

require_once("../../config.php");
require_once($CFG->libdir.'/tablelib.php');
require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
require_once($CFG->dirroot.'/mod/rscorm/reportsettings_form.php');
require_once($CFG->dirroot.'/mod/rscorm/report/reportlib.php');
require_once($CFG->libdir.'/formslib.php');
require_once($CFG->dirroot.'/mod/rscorm/report/default.php'); // Parent class
define('RSCORM_REPORT_DEFAULT_PAGE_SIZE', 20);
define('RSCORM_REPORT_ATTEMPTS_ALL_STUDENTS', 0);
define('RSCORM_REPORT_ATTEMPTS_STUDENTS_WITH', 1);
define('RSCORM_REPORT_ATTEMPTS_STUDENTS_WITH_NO', 2);

$id = required_param('id', PARAM_INT);// Course Module ID, or
$download = optional_param('download', '', PARAM_RAW);
$mode = optional_param('mode', '', PARAM_ALPHA); // Report mode

$cm = get_coursemodule_from_id('rscorm', $id, 0, false, MUST_EXIST);
$course = $DB->get_record('course', array('id'=>$cm->course), '*', MUST_EXIST);
$scorm = $DB->get_record('rscorm', array('id'=>$cm->instance), '*', MUST_EXIST);

$contextmodule = get_context_instance(CONTEXT_MODULE, $cm->id);
$reportlist = rscorm_report_list($contextmodule);

$url = new moodle_url('/mod/rscorm/report.php');

$url->param('id', $id);
if (empty($mode)) {
    $mode = reset($reportlist);
} else if (!in_array($mode, $reportlist)) {
    print_error('erroraccessingreport', 'rscorm');
}
$url->param('mode', $mode);

$PAGE->set_url($url);

//MARSUPIAL ********** MODIFICA - allow context course
// 2012.12.17 @abertranb
require_login($course);
// ********* ORIGINAL
//require_login($course, false, $cm);
// ********* FI

require_capability('mod/rscorm:viewreport', $contextmodule);

if (count($reportlist) < 1) {
    print_error('erroraccessingreport', 'rscorm');
}

add_to_log($course->id, 'rscorm', 'report', 'report.php?id='.$cm->id, $scorm->id, $cm->id);
$userdata = null;
if (!empty($download)) {
    $noheader = true;
}
/// Print the page header
if (empty($noheader)) {
    $strreport = get_string('report', 'rscorm');
    $strattempt = get_string('attempt', 'rscorm');

    $PAGE->set_title("$course->shortname: ".format_string($scorm->name));
    $PAGE->set_heading($course->fullname);
    $PAGE->navbar->add($strreport, new moodle_url('/mod/rscorm/report.php', array('id'=>$cm->id)));

    echo $OUTPUT->header();
    $currenttab = 'reports';
    require($CFG->dirroot . '/mod/rscorm/tabs.php');
    echo $OUTPUT->heading(format_string($scorm->name));
}

// Open the selected Scorm report and display it
$reportclassname = "rscorm_{$mode}_report";
$report = new $reportclassname();
$report->display($scorm, $cm, $course, $download); // Run the report!

// Print footer

if (empty($noheader)) {
    echo $OUTPUT->footer();
}
