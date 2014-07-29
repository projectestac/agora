<?php

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
	global $DB;
  return $DB->insert_record("eoicampus", $eoicampus);
}


function eoicampus_update_instance($eoicampus) {
  /// Given an object containing all the necessary data,
  /// (defined by the form in mod.html) this function
  /// will update an existing instance with new data.
	global $DB;
  $eoicampus->id = $eoicampus->instance;
  return $DB->update_record("eoicampus", $eoicampus);
}


function eoicampus_delete_instance($id) {
  /// Given an ID of an instance of this module,
  /// this function will permanently delete the instance
  /// and any data that depends on it.
	global $DB;

  if (! $eoicampus = $DB->get_record("eoicampus", array("id" => "$id"))) {
    $result = false;
  }
  $result = true;

    # Delete any dependent records here #
	if (! $DB->delete_records("eoicampus", array("id"=> $id))) {
    $result = false;
  }

  return $result;
}

function eoicampus_grades($eoicampusid) {
	global $CFG, $DB;
  /// Must return an array of grades for a given instance of this module,
  /// indexed by user.  It also returns a maximum allowed grade.
  ///
  ///    $return->grades = array of grades;
  ///    $return->maxgrade = maximum allowed grade;
  ///
	$grades = array();
	$eoicampus = $DB->get_record("eoicampus", array("id" => "$eoicampusid"));

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
	global $DB;
	$dbstudents = $DB->get_records_sql("SELECT DISTINCT us.userid, u.firstname, u.lastname
				       FROM {user} u,{user_students} us, {eoicampus} j
				       WHERE us.course=j.course AND j.id=$eoicampusid AND u.id=us.userid");
	return $dbstudents;
}

function eoicampus_get_participants($eoicampusid) {
  //Must return an array of user records (all data) who are participants
  //for a given instance of eoicampus. Must include every user involved
  //in the instance, independient of his role (student, teacher, admin...)
  //See other modules as example.
  global $DB;

  $students = $DB->get_records_sql("SELECT DISTINCT u.id, u.id
                               FROM {user} u,
                                    {eoicampus_activities} ja
                               WHERE u.id = ja.userid");

  //Return students array (it contains an array of unique users)
  return ($students);
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


}
