<?php
/**
 * Prepare user to redirect to Moodle
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	Redirect to Moodle
*/
function iw_moodle_user_main() {
	$viewcourse = pnVarCleanFromInput('id');
	$location = trim(pnModGetVar('iw_moodle', 'moodleurl'));
	$window = pnModGetVar('iw_moodle', 'newwindow');
	$guest = pnModGetVar('iw_moodle', 'guestuser');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle:coursesblock:', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	//if user is not moodle use, create it
	if(pnUserGetVar('uname') != ''){
		//check if user is Moodle user
		$is_user = pnModAPIFunc('iw_moodle', 'user', 'is_user',array('user' => strtolower(pnUserGetVar('uname'))));
		if(!$is_user){
			//if not create it
			$inscribed = pnModApiFunc('iw_moodle', 'admin', 'inscriu');
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			pnModFunc('iw_main','user','userDelVar', array('name' => 'courses',
															'module' => 'iw_moodle',
															'uid' => $uid,
															'sv' => $sv));
			if($inscribed){
				pnModFunc('iw_moodle', 'user', 'enrole');
			}
		}
	}

	$username = pnUserGetVar('uname');
	$prefix = pnConfigGetVar('prefix');
	
	if ($username == '' ){
		$username = $guest;
	}

	$secureValue = rand();

	setcookie('gotoMoodle',$secureValue,'0','/');

	$userpw = pnUserGetVar('pass');

	$parm = strtolower($username) ;
	$parm .= "|";
	$parm .= $userpw;
	$parm .= "|";
	$parm .= $home ;
	$parm .= "|";
	$parm .= $viewcourse ;
	$parm .= "|";
	$parm .= $guest;
	$parm .= "|";
	$parm .= md5($secureValue);

	$check = md5($parm) ;
	
	$url = "$location/index_iw.php?parm=$parm";

	if ($window == 1 ) {
		// Open Moodle in a new window
		Header('Location: '.$url.'&check='.$check);
		exit;
	}
	
	// Open Moodle into the the website
	$pnRender =& new pnRender();
	$pnRender->caching = false;

	$url = $url.'&check='.$check;

	$pnRender->assign('url', $url);
	return $pnRender->fetch('iw_moodle_user_go.htm');
}

/**
 * Enrol user in the courses where is pre-enroled
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	True if success
*/
function iw_moodle_user_enrole()
{
	// Security check
	if (!pnSecAuthAction( 0 , 'iw_moodle:coursesblock:' , "::" ,ACCESS_READ)){ 
		return false; 
	}

	// Get the user pre-enroled courses
	$pre_ins = pnModAPIFunc('iw_moodle', 'user', 'getallpre_ins', array('user' => pnUserGetVar('uid')));
	foreach($pre_ins as $pre){
		$ins = pnModFunc('iw_moodle', 'user', 'create_inscription', array('uid' => pnUserGetVar('uid'), 'course' => $pre['mcid'], 'mid' => $pre['mid'], 'role' => $pre['role']));
	}
	return $ins;
}

/**
 * Create the inscriptions and pre-inscriptions of a Moodle course
 * @author:     Albert Pï¿œrez Monfort (intraweb@xtec.cat)
 * @param:	args   Array with the id of the course, the user to enrole and the role that have to be assigned to the user
 * @return:	A string with the actions that have been made
*/
function iw_moodle_user_create_inscription($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle:coursesblock:', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	$uid = pnVarCleanFromInput('uid');
	$course = pnVarCleanFromInput('course');
	$role = pnVarCleanFromInput('role');
	$mid = pnVarCleanFromInput('mid');

	extract($args);
	
	// Gets username
	$username = pnUserGetVar('uname');
	
	// Init vars
	$is_user = 0;
	$is_enroled = 0;
	
	// Checks if the user is Moodle user
	$is_user = pnModAPIFunc('iw_moodle', 'user', 'is_user', array('user' => $username));

	if($is_user == 1){
		// Gets the id of the user in Moodle tables
		$userMDuid = pnModAPIFunc('iw_moodle', 'user', 'getuserMDuid', array('username' => $username));
		// Checks if user is enroled into the course with these role
		$is_enroled = pnModAPIFunc('iw_moodle', 'user', 'is_enroled', array('user' => $userMDuid['id'], 'course' => $course, 'role' => $role));
	}

	// If the user is user Moodle and not is enroled into the course made the enrolement
	if($is_user && !$is_enroled){
		$enrol_user = pnModAPIFunc('iw_moodle', 'admin', 'enrol_user', array('user' => $userMDuid['id'],'course' => $course,'role' => $role));
		if($enrol_user){
			// Esborra la pre-inscripciï¿œ de la base de dades
			pnModAPIFunc('iw_moodle', 'user', 'delete_pre', array('mid' => $mid));
		}
	}
	return true;
}
