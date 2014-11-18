<?php

// Accept, process and reply to ajax calls to rcontent mod
require_once('../../config.php');
require_once("$CFG->dirroot/mod/rcontent/locallib.php");

// set headers to json type
header('Content-type: application/json');

// Check access.
if (!isloggedin()) {
    print_error('mustbeloggedin');
}
if (isguestuser()) {
    print_error('noguestrate', 'forum');
}
if (!confirm_sesskey()) {
    print_error('invalidsesskey');
}

// Check required params
$action = required_param('action', PARAM_TEXT);
$bookid = required_param('bookid', PARAM_INT);

// Everything ready, process request
switch ($action) {
	case "loadisbn":
		$response = rcontent_isbn_list($bookid);
		break;
	case "loadunit":
		$response = rcontent_unit_list($bookid);
		break;
	case "loadactivity":
		$unitid = required_param('unitid', PARAM_INT);
		$response = rcontent_activity_list($bookid, $unitid);
		break;
	case "parametererror":
	case "ajaxresponseerror":
	case "jsonerror":
		$cmid = optional_param('cmid', 0, PARAM_INT);
		$response = rcontent_insert_error_log($action, $bookid, $cmid);
		break;
	default: // Error
		$response = array('status' => 'Error', 'message' => 'Error');
}

// Print response
echo json_encode($response);
