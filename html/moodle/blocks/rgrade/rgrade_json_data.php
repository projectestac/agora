<?php

header("Content-Type: application/json; charset=UTF-8");

require_once("../../config.php");
require_once('rgrade_lib.php');

$courseid = optional_param('courseid', '', PARAM_INT);
if(!$courseid) {
	rgrade_json_error("Course required");
}

$course = get_record('course', 'id', $courseid);
if(!$course) {
	rgrade_json_error("Course does not exists: $courseid");
}

$bookid = optional_param('bookid', '', PARAM_INT);
$book = rgrade_get_book_from_course($courseid, $bookid);
if(!$book) {
	rgrade_json_error('Book not valid');
}

$data = array();

$data['students'] = array();

$rs = rgrade_get_all_students($courseid);
while($student = rs_fetch_next_record($rs)) {

	$sid = (int) $student->id;
	
	$data['students'][] = array(
		'id' => $sid,
		'lastname' => $student->lastname,
		'firstname' => $student->firstname);	
}
rs_close($rs);


$data['groups'] = array();

$rs = rgrade_get_groups_studentsid($courseid);
while($group = rs_fetch_next_record($rs)) {

	$gid = (int) $group->groupid;

	if(!isset($data['groups'][$gid])){

		$data['groups'][$gid] = array(
			'id' => $gid,
			'name' => $group->groupname,
	 		'studentids' => array());
	}

	$data['groups'][$gid]['studentids'][] = (int) $group->userid;
}
$data['groups'] = array_values($data['groups']);
rs_close($rs);

$data['scores'] = $ENUM_SCORES;
$data['status'] = $ENUM_STATUS;

$rs = rgrade_get_recordset_activities($book->id);
$data['book'] = array('id' => $book->id, 'name' => $book->name, 'units' => array());

while($activity = rs_fetch_next_record($rs)) {

	$uid = (int) $activity->unitid;

	if(!isset($data['book']['units'][$uid])){
		$data['book']['units'][$uid] = array(
			'id' => $uid,
			'code' => $activity->unitcode,
			'name' => $activity->unitname);
		$data['book']['units'][$uid]['activities'] = array();
	}

	$data['book']['units'][$uid]['activities'][] = array(
			'id' => (int) $activity->id,
			'code' => $activity->code,
			'name' => $activity->name);
}

$data['book']['units'] = array_values($data['book']['units']);

rs_close($rs);

echo json_encode($data);
