<?PHP  // $Id: lib.php,v 1.4 2007/03/07 08:51:55 sarjona Exp $

/// Library of functions and constants for module jclic

require_once($CFG->libdir.'/pagelib.php');

if (!isset($CFG->eoicampus_server)) {
    set_config("eoicampus_server", "http://eoicampus.xtec.cat");
}
if (!isset($CFG->eoicampus_servlets_server)) {
    set_config("eoicampus_servlets_server", "http://aplitic.xtec.cat");
}
if (!isset($CFG->eoicampus_servlets_port)) {
    set_config("eoicampus_servlets_port", "80");
}
if (!isset($CFG->eoicampus_servlets_getPathways)) {
    set_config("eoicampus_servlets_getPathways", "/eoicampus/getPathways");
}

// XTEC *********** MODIFIED -> Added suport settings to moodle 2.3.x
// 2012.10.23 @abertranb
/**
* @uses FEATURE_GROUPS
* @uses FEATURE_GROUPINGS
* @uses FEATURE_GROUPMEMBERSONLY
* @uses FEATURE_MOD_INTRO
* @uses FEATURE_COMPLETION_TRACKS_VIEWS
* @uses FEATURE_GRADE_HAS_GRADE
* @uses FEATURE_GRADE_OUTCOMES
* @param string $feature FEATURE_xx constant for requested feature
* @return mixed True if module supports feature, null if doesn't know
*/
function eoicampus_supports($feature) {
	switch($feature) {
		case FEATURE_GROUPS:                  return true;
		case FEATURE_GROUPINGS:               return true;
		case FEATURE_GROUPMEMBERSONLY:        return true;
		case FEATURE_MOD_INTRO:               return false;
		case FEATURE_COMPLETION_TRACKS_VIEWS: return true;
		case FEATURE_COMPLETION_HAS_RULES:    return true;
		case FEATURE_GRADE_HAS_GRADE:         return false;
		case FEATURE_GRADE_OUTCOMES:          return false;
		case FEATURE_BACKUP_MOODLE2:          return true;
		case FEATURE_SHOW_DESCRIPTION:        return true;

		default: return null;
	}
}
//*********** END

function eoicampus_add_instance($eoicampus) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will create a new instance and return the id number 
/// of the new instance.
	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
	// 2012.10.23 @abertranb
	global $DB;
    return $DB->insert_record("eoicampus", $eoicampus);
    // ********** ORIGINAL
    //return insert_record("eoicampus", $eoicampus);
    // ********** FI
}


function eoicampus_update_instance($eoicampus) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will update an existing instance with new data.
	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
	// 2012.10.23 @abertranb
	global $DB;
    $eoicampus->id = $eoicampus->instance;
    return $DB->update_record("eoicampus", $eoicampus);
    // ********** ORIGINAL
    //return update_record("eoicampus", $eoicampus);
    // ********** FI
}


function eoicampus_delete_instance($id) {
/// Given an ID of an instance of this module, 
/// this function will permanently delete the instance 
/// and any data that depends on it.
	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
	// 2012.10.23 @abertranb
	global $DB;

    if (! $eoicampus = $DB->get_record("eoicampus", array("id" => "$id"))) {
    // ********** ORIGINAL
    //if (! $eoicampus = get_record("eoicampus", "id", "$id")) {
    // ********** FI
        return false;
    }
    $result = true;
    
    # Delete any dependent records here #    
    // XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
	// 2012.10.23 @abertranb
	if (! $DB->delete_records("eoicampus", array("id"=> $id))) {
    // ********** ORIGINAL
    //if (! delete_records("eoicampus", "id", "$id")) {
    // ********** FI
        $result = false;
    }
    
    return $result;
}

function eoicampus_user_outline($course, $user, $mod, $eoicampus) {
/// Return a small object with summary information about what a 
/// user has done with a given particular instance of this module
/// Used for user activity reports.
/// $return->time = the time they did it
/// $return->info = a short text description

    return $return;
}

function eoicampus_user_complete($course, $user, $mod, $eoicampus) {
/// Print a detailed representation of what a  user has done with 
/// a given particular instance of this module, for user activity reports.

    return true;
}

function eoicampus_print_recent_activity($course, $isteacher, $timestart) {
/// Given a course and a time, this module should find recent activity 
/// that has occurred in qv activities and print it out.
/// Return true if there was output, or false is there was none.

    global $CFG;

    return false;  //  True if anything was printed, otherwise false 
}

function eoicampus_cron () {
/// Function to be run periodically according to the moodle cron
/// This function searches for things that need to be done, such 
/// as sending out mail, toggling flags etc ... 

    global $CFG;

    return true;
}

function eoicampus_grades($eoicampusid) {
	global $CFG;
	global $DB;
/// Must return an array of grades for a given instance of this module, 
/// indexed by user.  It also returns a maximum allowed grade.
///
///    $return->grades = array of grades;
///    $return->maxgrade = maximum allowed grade;
///
	$grades = array();
	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
	// 2012.10.23 @abertranb
	$eoicampus = $DB->get_record("eoicampus", array("id" => "$eoicampusid"));
	// ********** ORIGINAL
	//$eoicampus = $DB->get_record("eoicampus", "id", "$eoicampusid");
	// ********** FI
	
	if ($students = eoicampus_get_students($eoicampusid)){
		foreach ($students as $student) {
			$summary_sessions=eoicampus_get_sessions_summary($eoicampusid, $student->userid);
			if ($eoicampus->avaluation=='score'){
				$grades[$student->userid]=$summary_sessions->score;				
			}else{
				$grades[$student->userid]=$summary_sessions->solved;
			}
		}
	}
	$return->grades=$grades;
	$return->maxgrade=$eoicampus->maxgrade;
	
	return $return;
}

function eoicampus_get_students($eoicampusid) {
	global $CFG;
	global $DB;
	$version_moodle = (float)substr($CFG->release,0,3);
	if ($version_moodle>=1.7){
	  // XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
	 // 2012.10.23 @abertranb
	 $dbstudents = $DB->get_records_sql("SELECT DISTINCT u.id AS userid, u.firstname, u.lastname
                                  FROM {$CFG->prefix}user u LEFT JOIN (({$CFG->prefix}role_assignments r
                                  LEFT JOIN {$CFG->prefix}user_lastaccess ul ON r.userid = ul.userid)
                                  LEFT JOIN {$CFG->prefix}eoicampus j ON ul.courseid = j.course) ON u.id = r.userid
                                  WHERE (((u.deleted)=0) AND ((u.username)<>'guest') AND j.id=$eoicampusid AND ((r.roleid) NOT IN (1) AND (r.roleid)=5))");
	 // ********** ORIGINAL
	 //$dbstudents = get_records_sql("SELECT DISTINCT u.id AS userid, u.firstname, u.lastname
     //                             FROM {$CFG->prefix}user u LEFT JOIN (({$CFG->prefix}role_assignments r
     //                             LEFT JOIN {$CFG->prefix}user_lastaccess ul ON r.userid = ul.userid)
     //                             LEFT JOIN {$CFG->prefix}eoicampus j ON ul.courseid = j.course) ON u.id = r.userid
     //                             WHERE (((u.deleted)=0) AND ((u.username)<>'guest') AND j.id=$eoicampusid AND ((r.roleid) NOT IN (1) AND (r.roleid)=5))");
	 // ********** FI
	 
  }else{
  	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
  	// 2012.10.23 @abertranb
  	$dbstudents = $DB->get_records_sql("SELECT DISTINCT us.userid, u.firstname, u.lastname
  				       FROM {$CFG->prefix}user u,{$CFG->prefix}user_students us, {$CFG->prefix}eoicampus j
  				       WHERE us.course=j.course AND j.id=$eoicampusid AND u.id=us.userid");
  	// ********** ORIGINAL
  	//$dbstudents = get_records_sql("SELECT DISTINCT us.userid, u.firstname, u.lastname
  	//			       FROM {$CFG->prefix}user u,{$CFG->prefix}user_students us, {$CFG->prefix}eoicampus j
  	//			       WHERE us.course=j.course AND j.id=$eoicampusid AND u.id=us.userid");
  	// ********** FI
  	
  }
	
	return $dbstudents;
}

function eoicampus_get_participants($eoicampusid) {
//Must return an array of user records (all data) who are participants
//for a given instance of eoicampus. Must include every user involved
//in the instance, independient of his role (student, teacher, admin...)
//See other modules as example.

    global $CFG;
    global $DB;

    //Get students
    // XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
    // 2012.10.23 @abertranb
    $students = $DB->get_records_sql("SELECT DISTINCT u.id, u.id
                                 FROM {$CFG->prefix}user u,
                                      {$CFG->prefix}eoicampus_activities ja
                                 WHERE u.id = ja.userid");
    // ********** ORIGINAL
    //$students = get_records_sql("SELECT DISTINCT u.id, u.id
    //                             FROM {$CFG->prefix}user u,
    //                                  {$CFG->prefix}eoicampus_activities ja
    //                             WHERE u.id = ja.userid");
	// ********** FI
                                      
    //Return students array (it contains an array of unique users)
    return ($students);
}

function eoicampus_scale_used ($eoicampusid,$scaleid) {
//This function returns if a scale is being used by one eoicampus
//it it has support for grading and scales. Commented code should be
//modified if necessary. See forum, glossary or journal modules
//as reference.
   
    $return = false;
    return $return;
}

//////////////////////////////////////////////////////////////////////////////////////


function eoicampus_get_pathways($level){
	global $CFG;
	return eoicampus_call_servlet($CFG->eoicampus_servlets_server, $CFG->eoicampus_servlets_port, $CFG->eoicampus_servlets_getPathways, "level=".$level);
}


/**
* Call a servlet
*
* @return result                The servlet response.
* @param string $host           The qv servlets host.
* @param string $servlet        The servlet url.
* @param string $params         The servlet params.
* @param string $port           The servlet port.
*/
function eoicampus_call_servlet($host, $port, $servlet, $params ="" ){
   $result="";
   
   $ch = curl_init();
   $url = $host.":".$port.$servlet;
   //$url = "http://phobos.xtec.cat/eoicampus/moodledsv/mod/eoicampus/result.xml";
   //$url = "http://sara.bichis.org/eoicampus.xml";
   $params = "";
   curl_setopt ($ch, CURLOPT_URL, $url);
   curl_setopt ($ch, CURLOPT_HEADER, 0);
   curl_setopt ($ch, CURLOPT_TIMEOUT, 20); 
   curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,1); 
   curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
   if (!empty($params)) curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
   $result = curl_exec ($ch);
   curl_close ($ch);
   return $result;   
}


function eoicampus_normaliza ($string){
    $a = 'Ã€Ã�Ã‚ÃƒÃ„Ã…Ã†Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃ�ÃŽÃ�Ã�Ã‘Ã’Ã“Ã”Ã•Ã–Ã˜Ã™ÃšÃ›ÃœÃ�ÃžÃŸÃ Ã¡Ã¢Ã£Ã¤Ã¥Ã¦Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã±Ã²Ã³Ã´ÃµÃ¶Ã¸Ã¹ÃºÃ»Ã½Ã½Ã¾Ã¿Å”Å•ÂºÂª';
    $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRroÂº';
    $string = utf8_decode($string);    
    $string = strtr($string, utf8_decode($a), $b);
    return utf8_encode($string); 
}

//IECISA *********** ADDED -> Get the list of groups
//2012.10.25 @abertranb
function eoicampus_get_groups ($id, $course, $cm, $user) {
	$obj_group = new stdClass();
	$obj_group->group_mode = groups_get_activity_groupmode($cm);
	if ($obj_group->group_mode == SEPARATEGROUPS || $obj_group->group_mode == VISIBLEGROUPS) {
		// Separate groups are being used
		$groups = groups_get_all_groups($course->id, $user->id);
		$obj_group->groups = array();
		foreach ($groups as $group) {
			$obj_group->groups['/mod/eoicampus/view.php?id='.$id.'&group='.$group->id] = $group->name;
		}
	}
	return $obj_group;
	
	$currentgroup = get_and_set_current_group($course, $groupmode, $changegroup);
	if ($currentgroup === false) {
		return false;
	}
	/*
	$context = get_context_instance(CONTEXT_COURSE, $course->id);
	
	if ($groupmode == SEPARATEGROUPS and !$currentgroup and !has_capability('moodle/site:accessallgroups', $context)) {
		//we are in separate groups and the current group is group 0, as last set.
		//this can mean that either, this guy has no group
		//or, this guy just came from a visible all forum, and he left when he set his current group to 0 (show all)
	
		if ($usergroups = groups_get_all_groups($course->id, $USER->id)){
			//for the second situation, we need to perform the trick and get him a group.
			$first = reset($usergroups);
			$currentgroup = get_and_set_current_group($course, $groupmode, $first->id);
	
		} else {
			//else he has no group in this course
			print_heading(get_string('notingroup'));
			print_footer($course);
			exit;
		}
	}
	
	if ($groupmode == VISIBLEGROUPS or ($groupmode and has_capability('moodle/site:accessallgroups', $context))) {
	
		if ($groups = groups_get_all_groups($course->id)) {
	
			echo '<div class="groupselector">';
			print_group_menu($groups, $groupmode, $currentgroup, $urlroot, 1);
			echo '</div>';
		}
	
	} else if ($groupmode == SEPARATEGROUPS and has_capability('moodle/course:view', $context)) {
		//get all the groups this guy is in in this course
		if ($usergroups = groups_get_all_groups($course->id, $USER->id)){
			echo '<div class="groupselector">';
			//print them in the menu
			print_group_menu($usergroups, $groupmode, $currentgroup, $urlroot, 0);
			echo '</div>';
		}
	}
	*/
	
	
}
//*********** FI

?>
