<?PHP  // $Id: lib.php,v 1.10 2009/03/16 14:15:34 sarjona Exp $

/// Library of functions and constants for module qv
require_once($CFG->libdir.'/pagelib.php');
//require_once($CFG->libdir.'/../group/lib/legacylib.php');
require_once("util/qvtime.php");//Albert


if (!isset($CFG->qv_qvdistplugin_appl)) {
    set_config("qv_qvdistplugin_appl", "http://clic.xtec.cat/qv_viewer/dist/html/appl/");
} 
if (!isset($CFG->qv_qvdistplugin_scripts)) {
    set_config("qv_qvdistplugin_scripts", "http://clic.xtec.cat/qv_viewer/dist/html/scripts/");
}
if (!isset($CFG->qv_qvdistplugin_css)) {
    set_config("qv_qvdistplugin_css", "http://clic.xtec.cat/qv_viewer/dist/html/css/");
}
if (!isset($CFG->qv_skins)) {
    set_config("qv_skins", "default,infantil,formal");
}
if (!isset($CFG->qv_langs)) {
    set_config("qv_langs", "ca,es,en");
}


function qv_add_instance($qv) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will create a new instance and return the id number 
/// of the new instance.
    $qv->assessmenturl=trim($qv->assessmenturl);
    $qv->timemodified = time();
    if ($qv->skin=='') $qv->skin="default";
    if ($qv->assessmentlang=='') $qv->assessmentlang="ca";

    return insert_record("qv", $qv);
}


function qv_update_instance($qv) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will update an existing instance with new data.

    $qv->id = $qv->instance;

    $qv->timemodified = time();
    $qv->assessmenturl=trim($qv->assessmenturl);
    if(update_record("qv", $qv)){
        return qv_update_gradebook(null, $qv);
    }
    return false;
}


function qv_delete_instance($id) {
/// Given an ID of an instance of this module, 
/// this function will permanently delete the instance 
/// and any data that depends on it.  


    if (! $qv = get_record("qv", "id", "$id")) {
        return false;
    }
    $result = true;
    
    # Delete any dependent records here #
    $assignments =  get_records("qv_assignments", "qvid", "$id");
    foreach($assignments as $assignment){
      $sections =  get_records("qv_sections", "assignmentid", "$assignment->id");
      foreach($sections as $section){
        delete_records("qv_messages_read", "sid", "$section->id");
        delete_records("qv_messages", "sid", "$section->id");
      }
      delete_records("qv_sections", "assignmentid", "$assignment->id");
    }

    delete_records("qv_assignments", "qvid", "$id");
    if (!delete_records("qv", "id", "$id")) {
        $result = false;
    }
    return $result;
}

function qv_user_outline($course, $user, $mod, $qv) {
/// Return a small object with summary information about what a 
/// user has done with a given particular instance of this module
/// Used for user activity reports.
/// $return->time = the time they did it
/// $return->info = a short text description

    return $return;
}

function qv_user_complete($course, $user, $mod, $qv) {
/// Print a detailed representation of what a  user has done with 
/// a given particular instance of this module, for user activity reports.

    return true;
}

function qv_print_recent_activity($course, $isteacher, $timestart) {
/// Given a course and a time, this module should find recent activity 
/// that has occurred in qv activities and print it out.
/// Return true if there was output, or false is there was none.

    global $CFG;

    return false;  //  True if anything was printed, otherwise false 
}

function qv_cron () {
/// Function to be run periodically according to the moodle cron
/// This function searches for things that need to be done, such 
/// as sending out mail, toggling flags etc ... 

    global $CFG;

    return true;
}

function qv_grades($qvid, $userid=NULL) {
/// Must return an array of grades for a given instance of this module, 
/// indexed by user.  It also returns a maximum allowed grade.
///
///    $return->grades = array of grades;
///    $return->maxgrade = maximum allowed grade;
///
///    return $return;

    if (!$qv = get_record('qv', 'id', $qvid)) {
        return NULL;
    }
    if ($qv->maxgrade == null) { // No grading
        return NULL;
    }

    $return = new object();
    $grades = array();
    if ($userid==NULL){
        if ($participants = qv_get_participants($qvid)){
            foreach ($participants as $participant) {
               $grades = qv_user_grades($grades, $qv, $participant->userid);
            }
        }
    } else{
        $grades = qv_user_grades($grades, $qv, $userid);
    }
    $return->grades=$grades;
    $return->maxgrade=$qv->maxgrade;
    return $return;
}

function qv_user_grades($grades, $qv, $userid) {
    $sessions_summary=qv_get_assignment_summary($qv->id, $userid);
    $grades[$userid]=$sessions_summary->score;				
    return $grades;
}

function qv_update_gradebook($qv_section=NULL, $qv=NULL){
    global $CFG;

    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
        include_once($CFG->libdir.'/gradelib.php');
    }

    if (!function_exists('grade_update')) {
        return true;
    }

    if ($qv_section != NULL){
        if (!$qv_assignment = get_record('qv_assignments', 'id', $qv_section->assignmentid)) {
            return NULL;
        }
        if (!$qv = get_record('qv', 'id', $qv_assignment->qvid)) {
            return NULL;
        }
    }
    if ($qv != NULL){
        // Get the grades
        $userid = (isset($qv_assignment)?$qv_assignment->userid:null);
        $qv_grades = qv_grades($qv->id, $userid);
        $grades = array();
        foreach ($qv_grades->grades as $k=>$v){
            $grades[$k]->userid=$k;
            $grades[$k]->rawgrade=$v;			
        }

        // Get the params
        $params = array('itemname'=>$qv->name);
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['gradepass'] = $qv_grades->maxgrade;
        $params['grademin']  = 0;
        $params['grademax']  = $qv_grades->maxgrade;

        grade_update('mod/qv', $qv->course, 'mod', 'qv', $qv->id, 0, $grades, $params);	
        return true;
    }
    return false;
}

function qv_get_students($cm, $course, $qvid) {
    global $CFG;
    $version_moodle = (float)substr($CFG->release,0,3);
    if ($version_moodle>=1.7){
        $context = get_context_instance(CONTEXT_MODULE, $cm->id);
        $currentgroup = get_and_set_current_group($course, groupmode($course, $cm));
        $users = get_users_by_capability($context, 'mod/qv:submit', 'u.id, u.id', '', '', '', $currentgroup, '', false);
        $select = 'SELECT u.id AS userid, u.firstname, u.lastname, u.picture ';
        $sql = 'FROM '.$CFG->prefix.'user u '.
               'LEFT JOIN '.$CFG->prefix.'qv_assignments a ON u.id = a.userid AND a.qvid = '.$qvid.' '.
               'WHERE u.id IN ('.implode(',', array_keys($users)).') ';               
        $dbstudents=get_records_sql($select.$sql);

/*     $dbstudents = get_records_sql("SELECT DISTINCT u.id AS userid, u.firstname, u.lastname
                                  FROM {$CFG->prefix}user u LEFT JOIN (({$CFG->prefix}role_assignments r
                                  LEFT JOIN {$CFG->prefix}user_lastaccess ul ON r.userid = ul.userid)
                                  LEFT JOIN {$CFG->prefix}qv q ON ul.courseid = q.course) ON u.id = r.userid
                                  WHERE (((u.deleted)=0) AND ((u.username)<>'guest') AND q.id=$qvid AND ((r.roleid) NOT IN (1) AND (r.roleid)=5))");*/	
    }else{
        $dbstudents = get_records_sql("SELECT DISTINCT us.userid, u.firstname, u.lastname
                   FROM {$CFG->prefix}user u,{$CFG->prefix}user_students us, {$CFG->prefix}qv q
                   WHERE us.course=q.course AND q.id=$qvid AND u.id=us.userid");
    }

    return $dbstudents;

}

function qv_get_participants($qvid) {
    global $CFG;

    //Get students
    $students = get_records_sql("SELECT DISTINCT u.id, u.id as userid
                                 FROM {$CFG->prefix}user u,
                                      {$CFG->prefix}qv_assignments qa
                                 WHERE qa.qvid = '$qvid' and
                                       u.id = qa.userid");
    //Get teachers
    $teachers = get_records_sql("SELECT DISTINCT u.id, u.id as userid
                                 FROM {$CFG->prefix}user u,
                                      {$CFG->prefix}qv_assignments qa
                                 WHERE qa.qvid = '$qvid' and
                                       u.id = qa.userid");

    //Add teachers to students
    if ($teachers) {
        foreach ($teachers as $teacher) {
            $students[$teacher->id] = $teacher;
        }
    }
    //Return students array (it contains an array of unique users)
    return ($students);
    
/*    
    global $CFG;

    //Get students
    $students = get_records_sql("SELECT DISTINCT u.id, u.id
                                 FROM {$CFG->prefix}user u,
                                      {$CFG->prefix}qv_assignments qa
                                 WHERE u.id = qa.userid");
                                 
    //Return students array (it contains an array of unique users)
    return ($students);
*/    
}

function qv_scale_used ($qvid,$scaleid) {
//This function returns if a scale is being used by one qv
//it it has support for grading and scales. Commented code should be
//modified if necessary. See forum, glossary or journal modules
//as reference.
   
    $return = false;

    //$rec = get_record("qv","id","$qvid","scale","-$scaleid");
    //
    //if (!empty($rec)  && !empty($scaleid)) {
    //    $return = true;
    //}
   
    return $return;
}

//////////////////////////////////////////////////////////////////////////////////////


/**
* Get user assignment summary
*
* @return object	assignment object with state, score and deliver information
* @param object $qvid    The assessment identifier.
* @param object $userid  The userid identifier.
*/
function qv_get_assignment_summary($qvid, $userid) {
    global $CFG;

    $states=array();
    $score=0;
    $pending_score=0;//A
    $attempts=0;
    $time="00:00:00";//Albert

    if ($qv_assignment=get_record('qv_assignments', 'qvid', $qvid, 'userid', $userid)){
        if ($qv_sections=get_records('qv_sections', 'assignmentid', $qv_assignment->id)){
            foreach($qv_sections as $qv_section){
                $section_summary=qv_get_section_summary($qv_section);
                $score+=$section_summary->score;
                $pending_score+=$section_summary->pending_score;//A

                $time = addTime($time, $qv_section->time); //Albert

                if ($section_summary->attempts > $attempts){
                    $attempts=$section_summary->attempts;
                }
                // States
                if (!array_key_exists('state_'.$qv_section->state, $states)) $states['state_'.$qv_section->state]=0;
                $states['state_'.$qv_section->state]=$states['state_'.$qv_section->state]+1;
            }
            // State
            $state=-1;
            if (array_key_exists('state_2', $states) && sizeOf($qv_sections)==$states['state_2']) $state=2;
            else if (array_key_exists('state_1', $states) && sizeOf($qv_sections)==$states['state_1']) $state=1;
            else if (array_key_exists('state_1', $states) && $states['state_1']>0) $state='1-';
            else if (array_key_exists('state_2', $states) && $states['state_2']>0) $state='2-';
            else if (array_key_exists('state_0', $states) && $states['state_0']>0) $state=0;
            $states['state']=$state;
        }
        $assignment_summary->id=$qv_assignment->id;
        $assignment_summary->sectionorder=$qv_assignment->sectionorder;//Albert
        $assignment_summary->itemorder=$qv_assignment->itemorder;//Albert

    }
    $assignment_summary->score=$score;
    $assignment_summary->pending_score=$pending_score;//A
    $assignment_summary->attempts=$attempts;
    $assignment_summary->states=$states;
    $assignment_summary->time=$time;//Albert

    return $assignment_summary;
}

/**
* Get user section assignment summary
*
* @return object	section object with state, score and attempts information.
* @param object $qv_section    The section object to get summary information.
*/
function qv_get_section_summary($qv_section){
  // Score
  $start=strpos($qv_section->scores, $qv_section->sectionid.'_score=');
  if ($start>=0){
    $start+=strlen($qv_section->sectionid.'_score=');
    $length=strpos(substr($qv_section->scores, $start+1), '#')+1;
    $section_summary->score=substr($qv_section->scores, $start, $length);
  }
  // Pending Score //A
  $start2=strpos($qv_section->pending_scores, $qv_section->sectionid.'_score=');
  if ($start2>=0){
    $start2+=strlen($qv_section->sectionid.'_score=');
    $length2=strpos(substr($qv_section->pending_scores, $start2+1), '#')+1;
    $section_summary->pending_score=substr($qv_section->pending_scores, $start2, $length2);
  }

  // Attempts
  $section_summary->attempts=$qv_section->attempts;
  return $section_summary;
}

/**
* Compose the full assessment url
*
* @return string	full url composed with specified params
* @param object $course object with the couser information
* @param object $qv object with the assessment information
* @param object $assignment object with the assignment information
* @param object $userid user identifier
* @param object $fullname full name of the user
* @param object $isteacher true if is teacher
*/
function qv_get_full_url($course, $qv, $assignment, $userid, $fullname,$isteacher=false){
  global $CFG;
  if (substr($qv->assessmenturl, 0, 4)!='http') {
    $qv_url=$CFG->wwwroot.'/file.php/'.$course->id.'/'.$qv->assessmenturl;
    if (substr($CFG->dataroot, strlen($CFG->dataroot)-1) != "/") $CFG->dataroot.="/";
    $qv_file=$CFG->dataroot.$course->id.'/'.$qv->assessmenturl;
  }else{
    $qv_url = $qv->assessmenturl;
    $qv_file = $qv_url;
  }
  $last=strrpos($qv_file, "/html/");
  $size=strlen($qv_file);
  $params="";
  if ($last<strlen($qv_file)){
  	$base_file=substr($qv_file, 0, $last+1);
    if (!(qv_exists_url($base_file."html/appl/qv_local.jar"))) $params.="&appl=$CFG->qv_qvdistplugin_appl";
    if (!(qv_exists_url($base_file."html/css/generic.css"))) $params.="&css=$CFG->qv_qvdistplugin_css";
    if (!(qv_exists_url($base_file."html/scripts/qv_local.js"))) $params.="&js=$CFG->qv_qvdistplugin_scripts";
  }
  if (isset($assignment->id)){
    if (strpos($qv_url, "?")===FALSE) $qv_url.="?";
    $fullurl = "$qv_url&server=".$CFG->wwwroot."/mod/qv/action/beans.php&assignmentid=$assignment->id&userid=$userid&fullname=$fullname&skin=$qv->skin&lang=$qv->assessmentlang&showinteraction=$qv->showinteraction&showcorrection=$qv->showcorrection&order_sections=$qv->ordersections&order_items=$qv->orderitems".($isteacher?"&userview=teacher":"").(($assignment->sectionorder>0 && $qv->ordersections==1)?"&section_order=$assignment->sectionorder":"").(($assignment->itemorder>0 && $qv->orderitems==1)?"&item_order=$assignment->itemorder":"").$params;
    return $fullurl;
  }
  return "";
}

/**
* Returns an object to represent a user assignment to an assessment.
* If the ->id field is not set, then the object is written to the database.
*
* @return object           The assignment object.
* @param object $qv        The assessment to get an assignment for.
*/
function qv_get_assignment($qv) {
    global $USER, $CFG;

    if (!$assignment=get_record('qv_assignments', 'qvid', $qv->id, 'userid', $USER->id)){
        srand(time());
        $assignment->qvid = $qv->id;
        $assignment->userid = $USER->id;
        $assignment->idnumber = '';
        $assignment->sectionorder = rand(1, 80);
        $assignment->itemorder = rand(1, 80);

        $assignment->id = insert_record('qv_assignments', $assignment);
        if (isset($assignment)) qv_update_gradebook(null, $qv);	
    }
    return $assignment;
}


/**
* Get an array with the names of the skins
*
* @return array   The array with each skin.
*/
function qv_get_skins(){
    global $CFG;
    $tmp = split(",", $CFG->qv_skins);
    for ($i=0;$i<count($tmp);$i++){
        $skins[$tmp[$i]] = '@'.$tmp[$i];
    }
    return $skins;
}

/**
* Get an array with the languages
*
* @return array   The array with each language.
*/
function qv_get_languages(){
    global $CFG;
    $tmp = split(",", $CFG->qv_langs);
    for ($i=0;$i<count($tmp);$i++){
        $langs[$tmp[$i]] = get_string($tmp[$i], "qv");
    }
    return $langs;
}


function qv_assignment_messages($assignmentid){
    global $CFG;
    global $USER;
    /*if ($messages = get_records('qv_messages', 'userid', $USER->id)){
        foreach ($messages as $message) {
        }
    }*/
    $unread = 0;
    if ($messages = get_record_sql("SELECT COUNT(*) AS unread
                                FROM {$CFG->prefix}qv_sections s, {$CFG->prefix}qv_messages m
                                WHERE s.id = m.sid AND s.assignmentid ='$assignmentid'
                                    AND (m.sid NOT IN (SELECT mr.sid FROM {$CFG->prefix}qv_messages_read mr WHERE mr.userid=$USER->id)
                                    OR m.created>(SELECT MAX(timereaded) FROM {$CFG->prefix}qv_messages_read mr WHERE mr.userid=$USER->id )) ")){
    $unread = $messages->unread;
/*    if ($messages->unread>0) {
        return qv_print_message_not_read(false);
        }*/
    }
    return $unread;
}

/**
* Print QV alerts (for interactions).
*
* @return string                HTML code to print alert interaction of a qv activity (if it has).
* @param array $states          The array with all qv states (and true or false for each one).
* @param boolean $isteacher     False if must be printed alerts for students.
*/
function qv_print_alerts($states, $isteacher=true){
    $html="";
    $state="intervencio_alumne";
    if (!$isteacher) $state="intervencio_docent";

    $strinteraction  = get_string("interaction", "qv");
    if(array_key_exists($state, $states) && $states[$state]=="true") {
        $html.="<IMG src='pix/qv_interaction.gif' alt='".$strinteraction."' title='".$strinteraction."'/>";
    }
    return $html;
}

/**
* Print QV states.
*
* @return string                HTML code to print the state of a qv activity.
* @param array $states          The array with all qv states (and true or false for each one).
* @param int $maxdeliver        The maximum number of delivers allowed
*/
function qv_print_states($states, $maxdeliver){
    $statesimg="";
    if (isset($states)) {
        if (array_key_exists('state_-1', $states) && $states['state_-1']>0 && $states['state_0']==0 && $states['state_1']==0 && $states['state_2']==0){
            $statesimg.=qv_print_state_not_started(false);					
        }else if(array_key_exists('state_0', $states) && $states['state_0']>0){
            $statesimg.=qv_print_state_started(false);
        }
        if (array_key_exists('state_1', $states) && $states['state_1']>0){
            if (array_key_exists('state_0', $states) &&  $states['state_0']==0 && array_key_exists('state_-1', $states) && $states['state_-1']==0 && $states['state']=='1'){
                $statesimg.=qv_print_state_delivered(false);
            }else {
                $statesimg.=qv_print_state_partially_delivered(false);
            }
        }
        if (array_key_exists('state_2', $states) && $states['state_2']>0){
            if ( $states['state']=='2' && ( !array_key_exists('state_0', $states) || $states['state_0']==0) && (!array_key_exists('state_-1', $states) || $states['state_-1']==0 ) ){
                $statesimg.=qv_print_state_corrected(false);
            }else {
                $statesimg.=qv_print_state_partially_corrected(false);;
            }
        }
    }
    if ($statesimg=="") $statesimg=qv_print_state_not_started(false);;
    return $statesimg;
}

function qv_print_state_not_started($text=true){
    $strstatenotstarted  = get_string("statenotstarted", "qv");
    $html="<IMG src='pix/qv_state_not_started.gif' alt='".$strstatenotstarted."' title='".$strstatenotstarted."'/>";
    if ($text) $html.=' '.$strstatenotstarted;
    return $html;
}
function qv_print_state_started($text=true){
    $strstatestarted  = get_string("statestarted", "qv");
    $html="<IMG src='pix/qv_state_started.gif' alt='".$strstatestarted."' title='".$strstatestarted."'/>";
    if ($text) $html.=' '.$strstatestarted;
    return $html;
}
function qv_print_state_delivered($text=true){
    $strstatedelivered  = get_string("statedelivered", "qv");
    $html="<IMG src='pix/qv_state_delivered.gif' alt='".$strstatedelivered."' title='".$strstatedelivered."'/>";
    if ($text) $html.=' '.$strstatedelivered;
    return $html;
}
function qv_print_state_partially_delivered($text=true){
    $strstatepartiallydelivered  = get_string("statepartiallydelivered", "qv");
    $html="<IMG src='pix/qv_state_part_delivered.gif' alt='".$strstatepartiallydelivered."' title='".$strstatepartiallydelivered."'/>";
    if ($text) $html.=' '.$strstatepartiallydelivered;
    return $html;
}
function qv_print_state_corrected($text=true){
    $strstatecorrected  = get_string("statecorrected", "qv");
    $html="<IMG src='pix/qv_state_corrected.gif' alt='".$strstatecorrected."' title='".$strstatecorrected."'/>";
    if ($text) $html.=' '.$strstatecorrected;
    return $html;
}
function qv_print_state_partially_corrected($text=true){
    $strstatepartiallycorrected  = get_string("statepartiallycorrected", "qv");
    $html="<IMG src='pix/qv_state_part_corrected.gif' alt='".$strstatepartiallycorrected."' title='".$strstatepartiallycorrected."'/>";
    if ($text) $html.=' '.$strstatepartiallycorrected;
    return $html;
}
function qv_print_message_not_read($text=true){
    $strmessagenotread  = get_string("messagenotread", "qv");
    $html="<IMG src='pix/qv_msg_notread.gif' alt='".$strmessagenotread."' title='".$strmessagenotread."'/>";
    if ($text) $html.=' '.$strmessagenotread;
    return $html;
}

/**
* Check if exists specified url
*
* @return boolean           True if the specified URL exists; otherwise false.
* @param string $url        The url
*/
function qv_exists_url($url){
    $exists=false;
    if (substr($url, 0, 4)!='http') {
      $exists = (@fopen($url,"r"))?true:false;
    }
    return $exists;
}


?>
