<?php
function iw_moodle_coursesblock_init()
{
    pnSecAddSchema('iw_moodle:coursesblock:', '::');
}

function iw_moodle_coursesblock_info()
{
    $dom = ZLanguage::getModuleDomain('iw_moodle');
	//Values
    return array ('text_type' => 'courses',
    			'module' => 'iw_moodle',
 			'text_type_long' => __('Courses available in Moodle', $dom),
			'allow_multiple' => true,
			'form_content' => false,
			'form_refresh' => false,
			'show_preview' => true);
}

function iw_moodle_coursesblock_display($row)
{
	//Security check
	if (!pnSecAuthAction( 0 , 'iw_moodle:coursesblock:' , "::" ,ACCESS_READ)){
		return;
	}
	$uid = pnUserGetVar('uid');

	if(!isset($uid)){
		$uid = '-1';
	}
	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'courses',
																		'module' => 'iw_moodle',
																		'uid' => $uid,
																		'sv' => $sv));
	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																'name' => 'courses',
																'module' => 'iw_moodle',
																'sv' => $sv,
																'nult' => true));
		$row['content'] = $s;
		return themesideblock($row);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_moodle',false);
	$uname = (pnUserGetVar('uname') != '') ? pnUserGetVar('uname') : pnModGetVar('iw_moodle', 'guestuser');
	//check if the user is Moodle user
	$is_user = pnModAPIFunc('iw_moodle', 'user', 'is_user',array('user' => strtolower($uname)));
	if (pnUserLoggedIn()){
		//get the courses where the user is pre enroled
		$pre_ins = pnModAPIFunc('iw_moodle', 'user', 'getallpre_ins', array('user' => pnUserGetVar('uid')));
	}
	if($is_user){
		//Inform to system that the intranet user is Moodle user
		$pnRender -> assign('isuser',true);
		// get user courses
		$courses = pnModAPIFunc('iw_moodle', 'user', 'getusercourses', array('user' => strtolower($uname)));
		if(!empty($courses)){
			foreach($courses as $course){
				if($course['fullname'] != $course_previous){
					if($course_previous != ''){
						$courses_array[] = array('fullname' => $course_previous,
													'summary' => nl2br($course_previous_summary),
													'id' => $course_previous_id,
													'roles' => $course_previous_roles);
					}
					$course_previous = $course['fullname'];
					$course_previous_id = $course['id'];
					$course_previous_roles = $course['rolename'].'<br/>';
					$course_previous_summary = $course['summary'];
				}else{
					$course_previous_roles .= $course['rolename'].'<br/>';
				}
			}
			$courses_array[] = array('fullname' => $course_previous,
										'summary' => nl2br($course_previous_summary),
										'id' => $course_previous_id,
										'roles' => $course_previous_roles);					
		}
		// get the user courses
		if (count($pre_ins) > 0) {
			//Set enrolment in case it was necessary
			$enrol = pnModFunc('iw_moodle', 'user', 'enrole');
		}
	}else{
		//Inform to system that the intranet user isn't Moodle user
		$pnRender -> assign('isuser',false);
		if(!empty($pre_ins)){
			foreach($pre_ins as $pre){
				// gets the information of a course
				$PreInscriptions = pnModAPIFunc('iw_moodle', 'user', 'getcourse', array('role' => $pre['role'],
																						'courseid' => $pre['mcid']));
				if($PreInscriptions['fullname'] != $pre_previous){
					if($pre_previous != ''){
						$courses_array[] = array('fullname' => $pre_previous,
													'summary' => nl2br($pre_previous_summary),
													'id' => $pre_previous_id,
													'roles' => $pre_previous_roles);
					}
					$pre_previous = $PreInscriptions['fullname'];
					$pre_previous_id = $PreInscriptions['id'];
					$pre_previous_roles = $PreInscriptions['rolename'].'<br/>';
					$pre_previous_summary = $PreInscriptions['summary'];
				}else{
					$pre_previous_roles .= $PreInscriptions['rolename'].'<br/>';
				}
			}
			$courses_array[] = array('fullname' => $pre_previous,
										'summary' => nl2br($pre_previous_summary),
										'id' => $pre_previous_id,
										'roles' => $pre_previous_roles);
		}
	}
	// Security check
	if (SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		$pnRender -> assign('administrator', true);
	}
	// assing the courses array to the output
	$pnRender -> assign('courses', $courses_array);
	$pnRender -> assign('moodleurl', pnModGetVar('iw_moodle', 'moodleurl'));
	$row['content'] = $pnRender -> fetch('iw_moodle_block_display.htm');
	//Copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
														'name' => 'courses',
														'module' => 'iw_moodle',
														'sv' => $sv,
														'value' => $row['content'],
														'lifetime' => '1000'));
	return themesideblock($row);
}
