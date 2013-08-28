<?php
define('AJAX_SCRIPT', true);
define('NO_DEBUG_DISPLAY', true);

header("Content-Type: application/json; charset=UTF-8");

require_once("../../config.php");
require_once('rgrade_lib.php');

$courseid = optional_param('courseid', '', PARAM_NUMBER);
$bookid = optional_param('bookid', '', PARAM_NUMBER);

if(!$courseid || !$course = rgrade_get_course($courseid)) {
	rgrade_json_error('Course not valid');
}

$book = rgrade_get_book_from_course($courseid, $bookid);

if(!$book) {
	rgrade_json_error('Book not valid');
}

$studentid = optional_param('studentid', '', PARAM_NUMBER);
$groupid = optional_param('groupid', '', PARAM_NUMBER);
$stateid = optional_param('stateid', '', PARAM_TEXT);
$begin = optional_param('begin', '', PARAM_TEXT);
$end = optional_param('end', '', PARAM_TEXT);

$grades = rgrade_get_counts($courseid, $bookid, $groupid, $studentid, $stateid, $begin, $end);

if (!$grades) {
	rgrade_json_error("Error SQL");
}

$data = array();

foreach($grades as $grade) {

	$unitid = $grade->unitid;
	$activityid = $grade->activityid;

	if(!isset($data[$unitid])){
		$data[$unitid]= array();
	}

	$data[$unitid][$activityid] = (int)$grade->total;
}


echo json_encode($data);
