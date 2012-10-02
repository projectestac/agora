<?php
header("Content-Type: application/json; charset=UTF-8");

require_once("../../config.php");
require_once('rgrade_lib.php');

if(!isloggedin()) {
	rgrade_json_error('User not logged in');
}

$courseid = optional_param('courseid', '', PARAM_INT);
$bookid = optional_param('bookid', '', PARAM_INT);

if(!$courseid || ! $course = get_record('course', 'id', $courseid)) {
	rgrade_json_error('Course not valid');
}

$book = rgrade_get_book_from_course($courseid, $bookid);

if(!$book) {
	rgrade_json_error('Book not valid');
}

// 2. Get request params
$groupid = optional_param('groupid', '', PARAM_INT);

$unitid = optional_param('unitid', '', PARAM_INT);
if(!$unitid){
	rgrade_json_error('Unit required');
}

//Somehow required for has_capability to work correctly.
require_login($courseid, false);

$studentid = null;

if (!rgrade_check_capability("moodle/grade:viewall")) {
	$studentid = $USER->id;
}

$stateid = optional_param('stateid', '', PARAM_TEXT);
$begin = optional_param('begin', '', PARAM_TEXT);
$end = optional_param('end', '', PARAM_TEXT);

// 2. Load Grades
$rs = rgrade_get_grades(
		$courseid, $bookid, $unitid, $groupid, $studentid, $stateid, $begin, $end);

if (!$rs){
	rgrade_json_error("Error SQL");
}

$data = array();

while($grade = rs_fetch_next_record($rs)) {
	$unitid = $grade->unitid;

	if(!isset($data[$unitid])){
		$data[$unitid]= array();
	}

	unset($grade->unitid);
	$grade->grade = (float)$grade->grade;
	//$grade->maxgrade = (float)$grade->maxgrade;
	//dejamos el resto como string porque son Bigint
	$data[$unitid][] = $grade;
}

rs_close($rs);

echo json_encode($data);
