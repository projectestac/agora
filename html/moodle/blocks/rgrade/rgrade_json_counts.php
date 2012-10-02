<?php
header("Content-Type: application/json; charset=UTF-8");

require_once("../../config.php");
require_once('rgrade_lib.php');

$courseid = optional_param('courseid', '', PARAM_INT);
$bookid = optional_param('bookid', '', PARAM_INT);

if(!$courseid || !$course = get_record('course', 'id', $courseid)) {
	rgrade_json_error('Course not valid');
}

$book = rgrade_get_book_from_course($courseid, $bookid);

if(!$book) {
	rgrade_json_error('Book not valid');
}

$studentid = optional_param('studentid', '', PARAM_INT);
$groupid = optional_param('groupid', '', PARAM_INT);
$stateid = optional_param('stateid', '', PARAM_TEXT);
$begin = optional_param('begin', '', PARAM_TEXT);
$end = optional_param('end', '', PARAM_TEXT);

$rs = rgrade_get_counts($courseid, $bookid, $groupid, $studentid, $stateid, $begin, $end);

if (!$rs) {
	rgrade_json_error("Error SQL");
}

$data = array();

while($grade = rs_fetch_next_record($rs)) {

	$unitid = $grade->unitid;
	$activityid = $grade->activityid;

	if(!isset($data[$unitid])){
		$data[$unitid]= array();
	}

	$data[$unitid][$activityid] = (int)$grade->total;
}

rs_close($rs);

echo json_encode($data);
