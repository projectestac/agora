<?php
define('AJAX_SCRIPT', true);
define('NO_DEBUG_DISPLAY', true);

header("Content-Type: application/json; charset=UTF-8");

require_once("../../config.php");
require_once('rgrade_lib.php');

if(!isloggedin()) {
	rgrade_json_error('User not logged in');
}

$courseid = optional_param('courseid', '', PARAM_NUMBER);
if(!$courseid || ! $course = rgrade_get_course($courseid)) {
	rgrade_json_error('Course not valid');
}

$id = optional_param('id', 0, PARAM_NUMBER);
if(!$id) {
	rgrade_json_error('Grade id required');
}

$grade = rgrade_get_rcontent_grade($id);
if(!$grade) {
	rgrade_json_error('Grade not valid');
}

//Somehow required for has_capability to work correctly.
require_login($courseid, false);

if (!rgrade_check_capability("moodle/grade:edit")) {
	rgrade_json_error('No capabilities (moodle/grade:edit)');
}

$txtgrade = optional_param('grade', '', PARAM_TEXT);
$comments  = optional_param('comments', '', PARAM_CLEANHTML);

$updated = rgrade_update_grade($grade, $txtgrade, $comments);
if(!$updated) {
	rgrade_json_error(rgrade_get_string('error_saving_grade', $grade));
}

echo json_encode($updated);
