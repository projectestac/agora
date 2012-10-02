<?PHP  // $Id: lib.php,v 1.19 2011-05-25 12:13:03 sarjona Exp $

/// Library of functions and constants for module jclic

require_once($CFG->libdir.'/pagelib.php');


if (!isset($CFG->jclic_jclicpluginjs)) {
    set_config("jclic_jclicpluginjs", "http://clic.xtec.cat/dist/jclic/jclicplugin.js");
}
if (!isset($CFG->jclic_lap)) {
    set_config("jclic_lap", "5");
}

function jclic_add_instance($jclic) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will create a new instance and return the id number 
/// of the new instance.
    $jclic->url=trim($jclic->url);
    if ($jclic->skin=='') $jclic->skin="default";

    return insert_record("jclic", $jclic);
}


function jclic_update_instance($jclic) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will update an existing instance with new data.
    $jclic->id = $jclic->instance;
    $jclic->url=trim($jclic->url);
    if(update_record("jclic", $jclic)){
   		return jclic_update_gradebook(null, $jclic);
    }
	return false;
}


function jclic_delete_instance($id) {
/// Given an ID of an instance of this module, 
/// this function will permanently delete the instance 
/// and any data that depends on it.


    if (! $jclic = get_record("jclic", "id", "$id")) {
        return false;
    }
    $result = true;
    
    # Delete any dependent records here #
    $rs =  get_record("jclic_sessions", "jclicid", "$id");
    foreach($rs as $session){
      delete_records("jclic_activities", "session_id", "$rs->session_id");
	  }

    delete_records("jclic_sessions", "jclicid", "$id");
    
    if (! delete_records("jclic", "id", "$id")) {
        $result = false;
    }
    
    
    return $result;
}

function jclic_user_outline($course, $user, $mod, $jclic) {
/// Return a small object with summary information about what a 
/// user has done with a given particular instance of this module
/// Used for user activity reports.

	$jclic_summary = jclic_get_sessions_summary($jclic->id, $user->id);
	$return->time = $jclic_summary->totaltime;
	$maxgrade = 0;
	if (property_exists($jclic, 'maxgrade')) $maxgrade = $jclic->maxgrade;
	$return->info = get_string("score", "jclic").": ".$jclic_summary->score."/".$maxgrade;
    return $return;
}

function jclic_user_complete($course, $user, $mod, $jclic) {
/// Print a detailed representation of what a  user has done with 
/// a given particular instance of this module, for user activity reports.

    return true;
}

function jclic_print_recent_activity($course, $isteacher, $timestart) {
/// Given a course and a time, this module should find recent activity 
/// that has occurred in jclic activities and print it out.
/// Return true if there was output, or false is there was none.

    global $CFG;

    return false;  //  True if anything was printed, otherwise false 
}

function jclic_cron () {
/// Function to be run periodically according to the moodle cron
/// This function searches for things that need to be done, such 
/// as sending out mail, toggling flags etc ... 

    global $CFG;

    return true;
}

function jclic_grades($jclicid, $userid=NULL) {
	global $CFG;
/// Must return an array of grades for a given instance of this module, 
/// indexed by user.  It also returns a maximum allowed grade.
///
///    $return->grades = array of grades;
///    $return->maxgrade = maximum allowed grade;
///

    if (!$jclic = get_record('jclic', 'id', $jclicid)) {
        return NULL;
    }

    $return = new object();
	$grades = array();
	if ($userid==NULL){
  	 if ($participants = jclic_get_participants($jclicid)){
  		foreach ($participants as $participant) {
				$grades = jclic_user_grades($grades, $jclic, $participant->userid);
  		}
   	 }
	} else{
		$grades = jclic_user_grades($grades, $jclic, $userid);
	}
  	$return->grades=$grades;
  	$return->maxgrade=$jclic->maxgrade;
   return $return;


}

function jclic_user_grades($grades, $jclic, $userid) {
	$sessions_summary=jclic_get_sessions_summary($jclic->id, $userid);
	if ($jclic->avaluation=='score'){
		$grades[$userid]=$sessions_summary->score;				
	}else{
		$grades[$userid]=$sessions_summary->solved;
	}
	return $grades;
}

function jclic_update_gradebook($jclic_activity=NULL, $jclic=NULL){
	global $CFG;

    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
	    if (file_exists($CFG->libdir.'/gradelib.php')) include_once($CFG->libdir.'/gradelib.php');
    }
	
    if (!function_exists('grade_update')) {
	    return true;
    }

	if ($jclic_activity != NULL){
	    if (!$jclic_session = get_record('jclic_sessions', 'session_id', $jclic_activity->session_id)) {
	        return NULL;
	    }
	    if (!$jclic = get_record('jclic', 'id', $jclic_session->jclicid)) {
	        return NULL;
	    }
	}
	if ($jclic != NULL){
		// Get the grades
		$userid = (isset($jclic_session)?$jclic_session->user_id:null);
		$jclic_grades = jclic_grades($jclic->id, $userid);
		$grades = array();
		foreach ($jclic_grades->grades as $k=>$v){
			$grades[$k]->userid=$k;
			$grades[$k]->rawgrade=$v;			
		}
		
		// Get the params
	    $params = array('itemname'=>$jclic->name);
	    $params['gradetype'] = GRADE_TYPE_VALUE;
	    if ($jclic->maxgrade==NULL) $jclic_grades->maxgrade = 0;
	    $params['gradepass']  = $jclic_grades->maxgrade;
	    $params['grademin']  = 0;

		if ($jclic->avaluation=='score') $params['grademax']  = 100;
		else $params['grademax']  = $jclic_grades->maxgrade;

		grade_update('mod/jclic', $jclic->course, 'mod', 'jclic', $jclic->id, 0, $grades, $params);	
		return true;
	}
	return false;
}

function jclic_get_students($cm, $course, $jclicid) {
	global $CFG;
	$version_moodle = (float)substr($CFG->release,0,3);
	if ($version_moodle>=1.7){
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    $currentgroup = get_and_set_current_group($course, groupmode($course, $cm));
    $users = get_users_by_capability($context, 'mod/jclic:submit', 'u.id, u.id', '', '', '', $currentgroup, '', false);
    $dbstudents = array();
    if (!empty($users)){
        $select = 'SELECT u.id AS userid, u.firstname, u.lastname, u.picture ';
        $sql = 'FROM '.$CFG->prefix.'user u '.
               'LEFT JOIN '.$CFG->prefix.'jclic_sessions a ON u.id = a.user_id AND a.jclicid = '.$jclicid.' '.
               'WHERE u.id IN ('.implode(',', array_keys($users)).') ';
        $dbstudents=get_records_sql($select.$sql);
    }
  }else{
  	$dbstudents = get_records_sql("SELECT DISTINCT us.userid, u.firstname, u.lastname
  				       FROM {$CFG->prefix}user u,{$CFG->prefix}user_students us, {$CFG->prefix}jclic j
  				       WHERE us.course=j.course AND j.id=$jclicid AND u.id=us.userid");
  }
  return $dbstudents;
}

function jclic_get_participants($jclicid) {
//Must return an array of user records (all data) who are participants
//for a given instance of jclic. Must include every user involved
//in the instance, independient of his role (student, teacher, admin...)
//See other modules as example.

    global $CFG;

    //Get students
    $students = get_records_sql("SELECT DISTINCT u.id, u.id as userid
                                 FROM {$CFG->prefix}user u,
                                      {$CFG->prefix}jclic_sessions js
                                 WHERE js.jclicid = '$jclicid' and
                                       u.id = js.user_id");
    //Get teachers
    $teachers = get_records_sql("SELECT DISTINCT u.id, u.id as userid
                                 FROM {$CFG->prefix}user u,
                                      {$CFG->prefix}jclic_sessions js
                                 WHERE js.jclicid = '$jclicid' and
                                       u.id = js.user_id");

    //Add teachers to students
    if ($teachers) {
        foreach ($teachers as $teacher) {
            $students[$teacher->id] = $teacher;
        }
    }
    //Return students array (it contains an array of unique users)
    return ($students);
}

function jclic_scale_used ($jclicid,$scaleid) {
//This function returns if a scale is being used by one jclic
//it it has support for grading and scales. Commented code should be
//modified if necessary. See forum, glossary or journal modules
//as reference.
   
    $return = false;

    return $return;
}

/**
 * Checks if scale is being used by any instance of jclic
 *
 * This is used to find out if scale used anywhere
 * @param $scaleid int
 * @return boolean
 */
function jclic_scale_used_anywhere($scaleid) {
   return false;
}



//////////////////////////////////////////////////////////////////////////////////////

/**
* Get user sessions
*
* @return array			[0=>session1,1=>session2...] where session1 is an array with keys: id,score,totaltime,starttime,done,solved,attempts. First sessions are newest.
* @param object $jclicid	The jclic to get sessions
* @param object $userid		The user id to get sessions
*/
function jclic_get_sessions($jclicid, $userid) {
	global $CFG;

  $sessions=array();
	if($rs = get_records_sql("SELECT js.*
                            FROM {$CFG->prefix}jclic j, {$CFG->prefix}jclic_sessions js 
                            WHERE j.id=js.jclicid AND js.jclicid=$jclicid AND js.user_id=$userid
                            ORDER BY js.session_datetime")){
		$i=0;
		foreach($rs as $session){
			$activity=jclic_get_activity($session);
			$activity->attempts=$i+1;
			$sessions[$i++]=$activity;
		}
	}
	return $sessions;
}

/**
* Get session activities
*
* @return array			[0=>act0,1=>act1...] where act0 is an array with keys: activity_id,activity_name,num_actions,score,activity_solved,qualification, total_time. First activity are oldest.
* @param string $session_id		The session id to get actitivies
*/
function jclic_get_activities($session_id) {
	global $CFG;
	
	if($rs = get_records("jclic_activities", "session_id", "$session_id",'activity_id')){
		$i=0;
		foreach($rs as $activity){
			$activities[$i++]=$activity;
		}
	}
	return $activities;
}

/**
* Get information about activities of specified session
*
* @return array			Array has these keys id,score,totaltime,starttime,done,solved,attempts
* @param object $session	The session object
*/
function jclic_get_activity($session) {
	global $CFG;
	$activity->starttime=$session->session_datetime;
	$activity->session_id=$session->session_id;
	if($rs = get_record_sql("SELECT AVG(ja.qualification) as qualification, SUM(ja.total_time) as totaltime
    				 FROM {$CFG->prefix}jclic_activities ja 
				 WHERE ja.session_id='$session->session_id'")){
		$activity->score=round($rs->qualification,0);
		$activity->totaltime=round($rs->totaltime/60000,0)."' ".round(fmod($rs->totaltime,60000)/1000,0)."''";
	}
	if ($rs = get_record_sql("SELECT COUNT(*) as done
                            FROM (SELECT DISTINCT ja.activity_name 
                                  FROM  {$CFG->prefix}jclic_activities ja 
                                  WHERE ja.session_id='$session->session_id') t")){
    $activity->done=$rs->done;
  }
	if ($rs = get_record_sql("SELECT COUNT(*) as solved
                            FROM (SELECT DISTINCT ja.activity_name 
                                  FROM {$CFG->prefix}jclic_activities ja 
                                  WHERE ja.session_id='$session->session_id' AND ja.activity_solved=1) t")){
    $activity->solved=$rs->solved;
	}

	return $activity;
}

/**
* Get user activity summary
*
* @return object	session object with score, totaltime, activities done and solved and attempts information
*/
function jclic_get_sessions_summary($jclicid, $userid) {
	global $CFG;

  $sessions_sumari = array('attempts'=>'','score'=>'','totaltime'=>'','starttime'=>'','done'=>'','solved'=>'');
	if ($rs = get_record_sql("SELECT COUNT(*) AS attempts, AVG(t.qualification) AS qualification, SUM(t.totaltime) AS totaltime, MAX(t.starttime) AS starttime
                            FROM (SELECT AVG(ja.qualification) AS qualification, SUM(ja.total_time) AS totaltime, MAX(js.session_datetime) AS starttime
                                  FROM {$CFG->prefix}jclic j, {$CFG->prefix}jclic_sessions js, {$CFG->prefix}jclic_activities ja  
                                  WHERE j.id=js.jclicid AND js.user_id=$userid AND js.jclicid=$jclicid AND ja.session_id=js.session_id
                                  GROUP BY js.session_id) t")){
		$sessions_summary->attempts=$rs->attempts;
		$sessions_summary->score=round($rs->qualification,0);
		$sessions_summary->totaltime=round($rs->totaltime/60000,0)."' ".round(fmod($rs->totaltime,60000)/1000,0)."''";
		$sessions_summary->starttime=$rs->starttime;
	}
	
	if ($rs = get_record_sql("SELECT COUNT(*) as done
                            FROM (SELECT DISTINCT ja.activity_name 
                                  FROM {$CFG->prefix}jclic j, {$CFG->prefix}jclic_sessions js, {$CFG->prefix}jclic_activities ja 
                                  WHERE j.id=js.jclicid AND js.user_id=$userid AND js.jclicid=$jclicid AND js.session_id=ja.session_id)  t")){
		$sessions_summary->done=$rs->done;
	}
	if ($rs = get_record_sql("SELECT COUNT(*) as solved
                            FROM (SELECT DISTINCT ja.activity_name 
                                  FROM {$CFG->prefix}jclic j, {$CFG->prefix}jclic_sessions js, {$CFG->prefix}jclic_activities ja 
                                  WHERE j.id=js.jclicid AND js.user_id=$userid AND js.jclicid=$jclicid AND js.session_id=ja.session_id AND ja.activity_solved=1) t")){
    $sessions_summary->solved=$rs->solved;
	}
	return $sessions_summary;
}

/**
* Format time from milliseconds to string 
*
* @return string Formated string [x' y''], where x are the minutes and y are the seconds.	
* @param int $time	The time (in ms)
*/
function jclic_time2str($time){
  return round($time/60000,0)."' ".round(fmod($time,60000)/1000,0)."''";
}

/**
* Print data in array as a row. Uses jclic_make_row function to get the string representation to print
*
* @param array $row Data
* @param array $align Cell alignment
* @param array $props Style, rowspan, colspan...
* @param boolean $header If true the row will be printed as th; otherwise as td.
*/
function jclic_print_row($row, $align, $props=array(), $header=false){
  echo jclic_make_row($row, $align, $props, $header);
}

function jclic_make_row($row, $row_align, $row_props=array(), $header=false){
  $strrow = '';
  $strtd = $header?'th':'td';
  if (sizeof($row)>0){
    $strrow.='<tr>';
    $i=0;
		foreach($row as $cell){
		  $prop = ''; $align='';
		  if ($row_props!='' && array_key_exists($i, $row_props) && $row_props[$i]!='') $prop = ' '.$row_props[$i].' ';
		  if ($row_align!=''&& array_key_exists($i, $row_align) && $row_align[$i]!='') $align = ' align='.$row_align[$i].' ';
      $strrow.='<'.$strtd.' '.($header?'':'class="cell"').$prop.$align.'>'.$cell.'</'.$strtd.'>';
      $i++;	  
    }
    $strrow.='</tr>';
  }  
  return $strrow;
}

/**
* Print a table data with all session activities 
* 
* @param string $session_id The session identifier
*/
function print_session_activities($session_id){
  // Import language strings
  $stractivity = get_string("activity", "jclic");
  $strsolved = get_string("solved", "jclic");
  $stractions = get_string("actions", "jclic");
  $strtime = get_string("time", "jclic");
  $strscore  = get_string("score", "jclic");
  $stryes = get_string("yes");
  $strno = get_string("no");
  
  // Print activities for each session
  $activities=jclic_get_activities($session_id);    
	if (sizeof($activities)>0){
	  echo '<tr><td colspan="7"><div id="'.$session_id.'" style="display:none;visible:hidden">';
	  echo '<table class="generaltable" align="center" border="0" cellpadding="5" cellspacing="1" width="80%"><tbody>';
	  $subtable_align=array('left','center','center','center','center');
	  jclic_print_row(array($stractivity, $strsolved, $stractions, $strtime, $strscore),$subtable_align,'',true);
		foreach($activities as $activity){
		  $subtable_props=array('', 'style="background-color:'.($activity->activity_solved?'#DFFFDF':'#FFDFDF').'"','','','');
		  $act_percent=$activity->num_actions>0?round(($activity->score/$activity->num_actions)*100,0):0;
		  jclic_print_row(array($activity->activity_name, ($activity->activity_solved?$stryes:$strno), $activity->score.'/'.$activity->num_actions.' ('.$act_percent.'%)', jclic_time2str($activity->total_time), $activity->qualification.'%'), $subtable_align, $subtable_props);
		}
		echo '</table></div></td></tr>';
  }
}

function jclic_get_skins(){
  return array('@default.xml' => 'default','@blue.xml' => 'blue','@orange.xml' => 'orange','@green.xml' => 'green','@simple.xml' => 'simple', '@mini.xml' => 'mini');
} 


/**
* Get an array with the languages
*
* @return array   The array with each language.
*/
function jclic_get_languages(){
    global $CFG;
    $tmplanglist = get_list_of_languages();
    $langlist = array();
    foreach ($tmplanglist as $lang=>$langname) {
        if (substr($lang, -5) == '_utf8') {   //Remove the _utf8 suffix from the lang to show
            $lang = substr($lang, 0, -5);
        }
        $langlist[$lang]=$langname;
    }
    return $langlist;
}


/**
* Get moodle server
*
* @return string                myserver.com:port
*/
function jclic_get_server() {
    global $CFG;

    if (!empty($CFG->wwwroot)) {
        $url = parse_url($CFG->wwwroot);
    }

    if (!empty($url['host'])) {
        $hostname = $url['host'];
    } else if (!empty($_SERVER['SERVER_NAME'])) {
        $hostname = $_SERVER['SERVER_NAME'];
    } else if (!empty($_ENV['SERVER_NAME'])) {
        $hostname = $_ENV['SERVER_NAME'];
    } else if (!empty($_SERVER['HTTP_HOST'])) {
        $hostname = $_SERVER['HTTP_HOST'];
    } else if (!empty($_ENV['HTTP_HOST'])) {
        $hostname = $_ENV['HTTP_HOST'];
    } else {
        notify('Warning: could not find the name of this server!');
        return false;
    }

    if (!empty($url['port'])) {
        $hostname .= ':'.$url['port'];
    } else if (!empty($_SERVER['SERVER_PORT'])) {
        if ($_SERVER['SERVER_PORT'] != 80 && $_SERVER['SERVER_PORT'] != 443) {
            $hostname .= ':'.$_SERVER['SERVER_PORT'];
        }
    }

    return $hostname;
}

/**
* Get moodle path
*
* @return string                /path_to_moodle
*/
function jclic_get_path() {
    global $CFG;

	$path = '/';
    if (!empty($CFG->wwwroot)) {
        $url = parse_url($CFG->wwwroot);
		if (array_key_exists('path', $url)){
			$path = $url['path'];			
		}
    }
    return $path;
}

if (!function_exists('get_coursemodule_from_id')) {
	// Add this function for Moodle < 1.6
	function get_coursemodule_from_id($modulename, $cmid, $courseid=0) {
		global $CFG;
		return get_record_sql("
			SELECT 
				cm.*, m.name, md.name as modname
			FROM 
				{$CFG->prefix}course_modules cm,
				{$CFG->prefix}modules md,
				{$CFG->prefix}$modulename m
			WHERE 
				".($courseid ? "cm.course = '$courseid' AND " : '')."
				cm.id = '$cmid' AND
				cm.instance = m.id AND
				md.name = '$modulename' AND
				md.id = cm.module
		");
	}
}

/**
 * This function is used by the reset_course_userdata function in moodlelib.
 * This function will remove all jclic sessions in the specified course.
 * @param $data the data submitted from the reset course.
 * @return array status array
 */
function jclic_reset_userdata($data) {
    global $CFG;
    require_once($CFG->libdir.'/filelib.php');

    $status = array();
    if (!empty($data->reset_jclic_deleteallsessions)) {
        $select = 'session_id IN'
            . " (SELECT s.session_id FROM {$CFG->prefix}jclic_sessions s"
            . " INNER JOIN {$CFG->prefix}jclic j ON s.jclicid = j.id"
            . " WHERE j.course = {$data->courseid})";
        delete_records_select('jclic_activities', $select);

        $select = 'jclicid IN'
            . " (SELECT j.id FROM {$CFG->prefix}jclic j"
            . " WHERE j.course = {$data->courseid})";
        delete_records_select('jclic_sessions', $select);

        $status[] = array('component' => get_string('modulenameplural', 'jclic'),
                          'item' => get_string('deleteallsessions', 'jclic'),
                          'error' => false);
    }
    return $status;
}

/**
 * Called by course/reset.php
 * @param $mform form passed by reference
 */
function jclic_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'jclicheader', get_string('modulenameplural', 'jclic'));

    $mform->addElement('checkbox', 'reset_jclic_deleteallsessions', get_string('deleteallsessions', 'jclic'));
}

/**
 * Course reset form defaults.
 */
function jclic_reset_course_form_defaults($course) {
    return array('reset_jclic_deleteallsessions' => 1);
}

?>
