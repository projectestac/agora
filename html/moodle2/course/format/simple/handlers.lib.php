<?php

function course_module_deleted_handler($params){
	global $CFG, $DB;

	require_once($CFG->dirroot.'/course/format/simple/lib.php');
	simple_delete_module_image($params->objectid, $params->get_context() );
}