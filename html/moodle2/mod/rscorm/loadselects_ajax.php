<?php
//MARSUPIAL ********** AFEGIT - Accept, process and reply ajax calls to rscorm mod

/**
 *  
 * Accept, process and reply ajax calls to rscorm mod
 * 
 */

require_once('../../config.php');
require_once("$CFG->dirroot/mod/rscorm/locallib.php");

// set headers to json type
header('Content-type: application/json');

// Here we maintain response contents
$response = array('status'=> 'Error', 'message'=>'ko');

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
$action=required_param('action', PARAM_TEXT);
$bookid=required_param('bookid', PARAM_INT);

// Everything ready, process request
if($action=="loadisbn"){
	$response=rscorm_isbn_list($bookid);
}elseif ($action=="loadunit"){
	$response=rscorm_unit_list($bookid);
}elseif($action=="loadactivity"){
	$unitid=required_param('unitid', PARAM_INT);
	$response=rscorm_activity_list($bookid,$unitid);
}elseif ($action=="parametererror"||$action=="ajaxresponseerror"||$action=="jsonerror"){
	$cmid=optional_param('cmid', 0, PARAM_INT);
	$response=rscorm_insert_error_log($action,$bookid,$cmid);
}

// Print response
echo json_encode($response);

//********** FI
?>