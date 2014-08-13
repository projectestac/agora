<?php
define('AJAX_SCRIPT', true);
define('NO_DEBUG_DISPLAY', true);

header("Content-Type: application/json; charset=UTF-8");

require_once("../../config.php");
require_once('rgrade_lib.php');

$courseid = optional_param('courseid', '', PARAM_NUMBER);

if(!$courseid || ! $course = rgrade_get_course($courseid)) {
	rgrade_json_error('Course not valid');
}

$groups = groups_get_all_groups($courseid);

$data = array('groups' => $groups);
echo json_encode($data);
