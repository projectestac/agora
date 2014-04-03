<?php

require_once('../../config.php');
require_once('repair.lib.php');

$action = required_param('action',PARAM_TEXT);

$courseid = optional_param('courseid',false,PARAM_INT);
$execute = optional_param('execute',false,PARAM_BOOL);
$nologin = optional_param('nologin',false,PARAM_BOOL);

if(!$nologin){
	if($courseid){
		require_login($courseid);
	} else {
		require_login();
	}
}

switch($action){
	case 'assign':
		repair_duplicate_assign($courseid, $execute);
		break;
	case 'gradebook':
		agora_repair_gradebook($courseid);
		break;
	case 'course_sections': //Ja està fet per tothom
		repair_duplicated_course_sections($courseid);
		break;
	case 'course_completion':  //Ja està fet per tothom
		repair_duplicated_course_completions($courseid);
		break;
	case 'quiz_attempts':  //Ja està fet per tothom
		repair_duplicated_quiz_attempts($courseid);
		break;
	case 'not_erased_activities':
		repair_not_erased_activities($courseid,$execute);
		break;
	default:
		print_error('Invalid action');
		break;
}
