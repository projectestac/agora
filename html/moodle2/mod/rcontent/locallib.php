<?php

define('RCONTENT_HIGHESTATTEMPT', '0');
define('RCONTENT_AVERAGEATTEMPT', '1');
define('RCONTENT_FIRSTATTEMPT', '2');
define('RCONTENT_LASTATTEMPT', '3');

define('RCONTENT_NOFRAME', '0');
define('RCONTENT_YESWITHFRAME', '1');
define('RCONTENT_YESWITHOUTFRAME', '2');

require_once("$CFG->dirroot/mod/rcontent/lib.php");

/**
 * Returns an array of the array of what grade options
 *
 * @return array an array of what grade options
 */
function rcontent_get_what_grade_array(){
    return array (RCONTENT_HIGHESTATTEMPT => get_string('highestattempt', 'rcontent'),
                  RCONTENT_AVERAGEATTEMPT => get_string('averageattempt', 'rcontent'),
                  RCONTENT_FIRSTATTEMPT => get_string('firstattempt', 'rcontent'),
                  RCONTENT_LASTATTEMPT => get_string('lastattempt', 'rcontent'));
}

function rcontent_get_frame_type_array(){
	return array(RCONTENT_NOFRAME => get_string('keepnavigationvisibleno','rcontent'),
	// MARSUPIAL ********** DELTED -> Not show iframe option, Moodle 2.3 doesn't allow wwork with frames
	// 2011.12.17 @abertranb
				RCONTENT_YESWITHOUTFRAME => get_string('keepnavigationvisibleyes','rcontent'));
	// ************ MODIFICAT
	             //RCONTENT_YESWITHFRAME => get_string('keepnavigationvisibleyesframe','rcontent'),
				// RCONTENT_YESWITHOUTFRAME => get_string('keepnavigationvisibleyesobject','rcontent'));
	// ************ FI

}

/**
 * Check the grades available for the request activity
 * @param int $rcontentid -> ID of the rcontent
 * @param int $groupingid -> ID of the group
 * @return int -> count of grades
 */
// MARSUPIAL ********** MODIFICAT -> Filter by status
// 2011.08.31 @mmartinez
function rcontent_get_count_users($rcontentid, $groupingid=null, $context, $filter = '') {
// ********** ORIGINAL
//function rcontent_get_count_users($rcontentid, $groupingid=null, $context) {
// ********** FI

    global $CFG, $USER, $DB;

    //test when the user role is studen and just count his grades
    if(has_capability('mod/rcontent:viewreport', $context)){
    	if (!has_capability('mod/rcontent:viewresult', $context)){
        		$sql="SELECT count(st.id) FROM {$CFG->prefix}rcontent_grades st
	                WHERE st.rcontentid = $rcontentid AND st.userid=$USER->id";
// MARSUPIAL ********** AFEGIT -> Filter by status
// 2011.08.31 @mmartinez
            if ($filter != ''){
                $sql .= " AND st.status = '{$filter}'";
            }
// ********** FI
    		if($DB->count_records_sql($sql)>0){
    			return 1;
    		}
    	}else{
    		if (!empty($CFG->enablegroupings) && !empty($groupingid)) {
	        	$sql = "SELECT COUNT(DISTINCT st.userid)
	                FROM {$CFG->prefix}rcontent_grades st
	                    INNER JOIN {$CFG->prefix}groups_members gm ON st.userid = gm.userid
	                    INNER JOIN {$CFG->prefix}groupings_groups gg ON gm.groupid = gg.groupid
	                WHERE st.rcontentid = $rcontentid AND gg.groupingid = $groupingid";
// MARSUPIAL ********** AFEGIT -> Filter by status
// 2011.08.31 @mmartinez
		            if ($filter != ''){
		                $sql .= " AND st.status = '{$filter}'";
		            }
// ********** FI
	    	} else {
	       		$sql = "SELECT COUNT(DISTINCT st.userid)
	                FROM {$CFG->prefix}rcontent_grades st
	                WHERE st.rcontentid = $rcontentid";
// MARSUPIAL ********** AFEGIT -> Filter by status
// 2011.08.31 @mmartinez
	       		if ($filter != ''){
	                $sql .= " AND st.status = '{$filter}'";
	       		}
// ********** FI
	    	}
	    	return($DB->count_records_sql($sql));
    	}
    }
    return 0;
}

/**
 * Check the score of the request user for the request activity
 * @param $rcontent int -> ID of the activity
 * @param $userid int -> ID of the user
 * @param $time int -> datetime
 * @return int -> the score for that user
 */
function rcontent_grade_user($rcontent, $userid, $from='') {

	global $DB;
	//take the global grade for the given activity
    $sql="userid=$userid AND rcontentid=$rcontent->id AND unitid=$rcontent->unitid AND activityid=$rcontent->activityid";
    if(!$grade=$DB->get_records_select('rcontent_grades',$sql)){
        return 0;
    }

	$grade = current($grade);

	$lastattempt = rcontent_get_last_attempt($rcontent->id, $userid);
    if($grade->maxattempts != 0 && $lastattempt >= $grade->maxattempts){
        $lastattempt = $grade->maxattempts;
    }

    switch ($rcontent->whatgrade) {
        case RCONTENT_FIRSTATTEMPT:
            $grade=rcontent_grade_user_attempt($rcontent->id, $userid, 1, $grade->unitid, $grade->activityid);
            if($from!='gradebook')
                return $grade->justgrade.' '.$grade->range;
            else
                return $grade->justgrade;
        break;
        case RCONTENT_LASTATTEMPT:
            $grade=rcontent_grade_user_attempt($rcontent->id, $userid, $lastattempt, $grade->unitid, $grade->activityid);
            if($from!='gradebook')
                return $grade->justgrade.' '.$grade->range;
            else
                return $grade->justgrade;
        break;
        case RCONTENT_HIGHESTATTEMPT:
            $maxscore = 0;
            $attempttime = 0;
            for ($attempt = 1; $attempt <= $lastattempt; $attempt++) {
                $attemptgrade = rcontent_grade_user_attempt($rcontent->id, $userid, $attempt, $grade->unitid, $grade->activityid);
                $maxscore = ($attemptgrade->justgrade > $maxscore) ? $attemptgrade->justgrade: $maxscore;
            }
            if($from!='gradebook')
                return $maxscore.' '.$attemptgrade->range;
            else
                return $attemptgrade->justgrade;
        break;
        case RCONTENT_AVERAGEATTEMPT:
            $sumscore = 0;
            for ($attempt = 1; $attempt <= $lastattempt; $attempt++) {
                $attemptgrade = rcontent_grade_user_attempt($rcontent->id, $userid, $attempt, $grade->unitid, $grade->activityid);
                $sumscore += $attemptgrade->justgrade;
            }
            if ($lastattempt > 0) {
                $score = $sumscore / $lastattempt;
            } else {
                $score = 0;
            }
            if($from!='gradebook')
                return $score.' '.$attemptgrade->range;
            else
                return $attemptgrade->justgrade;
        break;
    }
}

/**
 * Check the grade comment for the request user and activity
 * @param int $rcontent
 * @param int $userid
 * @return string
 */
function rcontent_grade_user_comments($rcontent, $userid){
	global $DB;
	switch ($rcontent->whatgrade) {
		case RCONTENT_FIRSTATTEMPT:
			if (!$comment=$DB->get_record_select('rcontent_grades',"rcontentid=$rcontent->id AND userid=$userid AND unitid=$rcontent->unitid AND activityid=$rcontent->activityid AND attempt=1", null, 'comments')){
			    return '';
			}
		    break;
		default:
			$lastattempt = rcontent_get_last_attempt($rcontent->id, $userid);
			if(!$comment=$DB->get_record_select('rcontent_grades',"rcontentid=$rcontent->id AND userid=$userid AND unitid=$rcontent->unitid AND activityid=$rcontent->activityid AND attempt=$lastattempt", null, 'comments')){
				return '';
			}

	}
	return $comment->comments;
}


/**
* Delete grades and grades_details for selected users
* @param int $rcontentid list of attempts that need to be deleted
* @param int $userid ID of Scorm
* @return bool -> true deleted all responses, false failed deleting an attempt - stopped here
*/
function rcontent_delete_responses($attemptids,$rcontentid) {

    if(!is_array($attemptids) || empty($attemptids)) {
        return false;
    }

    foreach($attemptids as $num => $attemptid) {
        if(empty($attemptid)) {
            unset($attemptids[$num]);
        }
    }

    foreach($attemptids as $attempt) {
        $keys = explode(':', $attempt);
        if (count($keys) == 2) {
            $userid = clean_param($keys[0], PARAM_INT);
            $attemptid = clean_param($keys[1], PARAM_INT);
            if (!$userid || !$attemptid || !rcontent_delete_attempt($userid, $rcontentid, $attemptid)) {
                    return false;
            }
        } else {
            return false;
        }
    }
    return true;
}

/**
* Delete grades and details for selected users
* @param int $userid ID of User
* @param int $rcontentid ID of Scorm
* @param int $attemptid user attempt that need to be deleted
* @return bool true suceeded
*/
function rcontent_delete_attempt($userid, $rcontentid, $attemptid) {
	global $DB;
    if (!$DB->delete_records('rcontent_grades', array('userid' => $userid, 'rcontentid' => $rcontentid, 'attempt' => $attemptid))){
    	return false;
    }
    if (!$DB->delete_records('rcontent_grades_details', array('userid' => $userid, 'rcontentid' => $rcontentid, 'attempt' => $attemptid))){
    	return false;
    }
    return true;
}

/**
 * Gets user info required to display the table of rcontent results for report.php
 * @param int $userid
 * @return array -> firstname, lastname and user picture
 */
function rcontent_get_user_data($userid) {
	global $DB;
    $namefields = get_all_user_name_fields(true);
    return $DB->get_record('user',array('id'=>$userid), $namefields.', picture');
}

/**
 * Find the last attempt number for the given user id and scorm id
 * @param int $rcontentid
 * @param int $userid
 */
function rcontent_get_last_attempt($rcontentid, $userid) {
	global $DB;
    if ($lastattempt = $DB->get_record('rcontent_grades', array('userid' => $userid, 'rcontentid' => $rcontentid), 'max(attempt) as a')) {
        if (empty($lastattempt->a)) {
            return '1';
        } else {
            return $lastattempt->a;
        }
    }
}

/** Find the start and finish time for a a given attempt
 * @param int $rcontentid SCORM Id
 * @param int $userid User Id
 * @param int $attemt Attempt Id
 * @return object start and finsh time EPOC secods
 */
function rcontent_get_attempt_runtime($rcontentid, $userid, $attempt=1, $unitid='', $activityid='', $starttime = '') {

    $timedata = new object();
    $timedata->start='';
    $timedata->finish='';
    global $DB;

    $sql = "userid=$userid AND rcontentid=$rcontentid AND attempt=$attempt";
    $sql.=($unitid!='')?" AND unitid=$unitid":" AND unitid=0";
    $sql.=($activityid!='')?" AND activityid=$activityid":" AND activityid=0";
    $sql.=($starttime!='')?" AND starttime = $starttime": "";
    if($tracks = $DB->get_records_select('rcontent_grades',"$sql ORDER BY timemodified ASC")){

	    if ($tracks) {
	        $tracks = array_values($tracks);
	    }
// MARSUPIAL ************ MODIFICAT -> Fixed bug when startime is empty
// 2011.10.31 @mmartinez
	   if ($tracks && !empty($tracks[0]->starttime) && $tracks[0]->starttime > 0) {
// *********** ORIGINAL
           //if ($tracks) {
// *********** FI
           $timedata->start = userdate($tracks[0]->starttime, get_string('strftimedaydatetime'));
	    }
	    else {
	        $timedata->start = '';
	    }

	    if ($tracks[0]->totaltime!='') {
	        $segundos= $tracks[0]->totaltime;
	        $horas=intval($segundos/3600);
	        $segundos=$segundos-($horas*3600);
	        $horas=($horas<10)?'0'.$horas:$horas;
	        $minutos=intval($segundos/60);
	        $minutos=($minutos<10)?'0'.$minutos:$minutos;
	        $segundos=$segundos-($minutos*60);
	        $segundos=($segundos<10)?'0'.$segundos:$segundos;
	        $timedata->finish=$horas.":".$minutos.":".$segundos;
	    }
	    else {
	        $timedata->finish = '00:00:00';
	    }
    }

    return $timedata;
}

/** Find the start and finsh time for a a given detail attempt
 * @param int $rcontentid SCORM Id
 * @param int $userid User Id
 * @param int $attemt Attempt Id
 * @return object start and finsh time EPOC secods
 */
function rcontent_details_get_attempt_runtime($id) {

    $timedata = new object();
    $timedata->start='';
    $timedata->finish='';
    global $DB;
    $tracks = $DB->get_record('rcontent_grades_details', array('id' => $id));

   if ($tracks && $tracks->starttime > 0) {
        $timedata->start = userdate($tracks->starttime, get_string('strftimedaydatetime'));
    }
    else {
        $timedata->start = '';
    }

    if ($tracks->totaltime != '' && $tracks->totaltime > 0) {
        $segundos= $tracks->totaltime;
        $horas=intval($segundos/3600);
        $segundos=$segundos-($horas*3600);
        $horas=($horas<10)?'0'.$horas:$horas;
        $minutos=intval($segundos/60);
        $minutos=($minutos<10)?'0'.$minutos:$minutos;
        $segundos=$segundos-($minutos*60);
        $segundos=($segundos<10)?'0'.$segundos:$segundos;
        $timedata->finish=$horas.":".$minutos.":".$segundos;
    }
    else {
        $timedata->finish = '';
    }

    return $timedata;
}

/**
 * Find the activity grade for a given user and attempt
 * @param int $rcontentid
 * @param int $userid
 * @param int $attempt
 * @param int $unitid
 * @param int $activityid
 * @return string grade(mingrade/maxgrade)
 */
//MARSUPIAL ********* MODIFICAR -> Added new parameter idgrade to search just for it
//2011.05.20 @mmartinez
function rcontent_grade_user_attempt($rcontentid, $userid, $attempt=1, $unitid='', $activityid='', $idgrade = '', $starttime = '') {
	global $CFG, $DB;

    //take the grade of the activity
    if (!empty($idgrade)){
    	$sql = "id = $idgrade";
    } else {
//********* ORIGINAL
//function rcontent_grade_user_attempt($rcontentid, $userid, $attempt=1, $unitid='', $activityid='') {
//********** FI

        $sql ="userid=$userid AND rcontentid=$rcontentid AND attempt=$attempt";
        $sql .=($unitid!='')?" AND unitid=$unitid":" AND unitid=0";
        $sql .=($activityid!='')?" AND activityid=$activityid":" AND activityid=0";
        $sql .=($starttime!='')?" AND starttime=$starttime": "";
    }

    $grade=$DB->get_records_select('rcontent_grades', $sql);
    //echo "<br>---- "; print_r($grade); echo " ----<br>";
    $return = new stdClass();
    $return->id='';
    $return->grade='';
    $return->justgrade='';
    $return->range='';
    $return->maxattempts='';
//MARSUPIAL ************ MODIFICAT -> Call the new function to calculate parent status
//2011.05.17 @mmartinez
    $return->status = rcontent_grade_calculate_status($rcontentid, $userid, $attempt, $unitid, $activityid, $starttime);
//************ ORIGINAL
    //$return->status='';
//*********** FI
    $return->url='';
    $return->justurl='';
    $return->comments='';
    $return->justcomments='&nbsp;';
    $return->fullcomments='&nbsp;';

    if ($grade) {
//MARSUPIAL ********** ADDED -> Calculate grade in fact of the option selected in activity configuration
//2011.06.07 @mmartinez
    	if (count($grade) > 1){
	    	if ($rcon = $DB->get_record("rcontent", array("id" => $rcontentid))){
	    		switch ($rcon->whatgrade){
	        		case RCONTENT_FIRSTATTEMPT:
	        			$grade_sql = $DB->get_record_sql("SELECT * FROM {rcontent_grades} WHERE {$sql} AND timecreated = (SELECT MIN(timecreated) FROM {rcontent_grades} WHERE ".$sql.")", array(), IGNORE_MULTIPLE);
	        			$grade = $grade_sql;
	        		break;
	        		case RCONTENT_LASTATTEMPT:
	        			$grade_sql = $DB->get_record_sql("SELECT * FROM {rcontent_grades} WHERE {$sql} AND timecreated = (SELECT MAX(timecreated) FROM {rcontent_grades} WHERE ".$sql.")", array(), IGNORE_MULTIPLE);
	        			$grade = $grade_sql;
	        		break;
	        		case RCONTENT_HIGHESTATTEMPT:
	        			$grade_sql = $DB->get_record_sql("SELECT * FROM {rcontent_grades} WHERE {$sql} AND grade=(SELECT max(grade) as grade FROM {rcontent_grades} WHERE ".$sql.")", array(), IGNORE_MULTIPLE);
	        			$grade = $grade_sql;
	        		break;
	        		case RCONTENT_AVERAGEATTEMPT:
	        		 	$grade_sql = $DB->get_record_sql("SELECT round(avg(grade)) as grade FROM {$CFG->prefix}rcontent_grades WHERE ".$sql, array(), IGNORE_MULTIPLE);
	        		 	$grade = array_pop($grade);
	        		 	$grade->grade = $grade_sql->grade;
	        		break;
	        	}
	        }
    	} else {
    		$grade = array_pop($grade);
    	}
//********** FI

        //$grade = array_pop($grade);
        $return->id=$grade->id;
        $return->grade='<div id="rcontent_grade_'.$userid.'_'.$grade->id.'">'.$grade->grade.'</div>';
        $return->justgrade=$grade->grade;
        $return->range="($grade->mingrade-$grade->maxgrade)";
        $return->maxattempts='('.$grade->maxattempts.')';
//MARSUPIAL ************ ELIMINAT -> Take out becouse we calculate it before
//2011.05.17 @mmartinez
        //$return->status=$grade->status;
//*********** FI
        if($grade->urlviewresults!=""){
        	$httptest='';
        	if (textlib::strpos($grade->urlviewresults,'http://')===false){
        		$httptest='http://';
        	}
            $return->url='<a href="'.$httptest.$grade->urlviewresults.'" target="_blank">'.get_string('view','rcontent').'</a> &middot;';
            $return->justurl='<a href="'.$httptest.$grade->urlviewresults.'" target="_blank">'.get_string('view','rcontent').'</a>';
        }
        if($grade->comments!=""){
        	$return->comments='<div id="rcontent_comments_'.$userid.'_'.$grade->id.'">';
        	if(strlen($grade->comments)>30){
        	     $return->comments.='<span title="'.$grade->comments.'">'.substr($grade->comments,0,27).'...</span>';
        	     $return->justcomments='<span title="'.$grade->comments.'">'.substr($grade->comments,0,27).'...</span>';
        	}else{
        		$return->comments.=$grade->comments;
        		$return->justcomments=$grade->comments;
        	}
        	$return->comments.='</div>';
        	$return->fullcomments=$grade->comments;
        } else {
        	$return->comments='<div id="rcontent_comments_'.$userid.'_'.$grade->id.'"></div>';
        }
    }

	return $return;
}

/**
 * Find the activity detail grade for a given user and attempt
 * @param int $rcontent
 * @param int $userid
 * @param int $attempt
 * @param int $time
 * @return string grade(mingrade/maxgrade)
 */
function rcontent_grade_details_user_attempt($id, $rcontentid, $userid, $attempt=1, $time=false, $unitid='', $activityid='') {
	global $DB;
    $grade=$DB->get_record('rcontent_grades_details', array('id' => $id));

    $return = new stdClass();
    $return->grade='';
    $return->range='';
    $return->maxattemps='';
    $return->weight='';
    $return->url='';
    $return->description='';
    $return->totalweight='';

    if ($grade) {
        $return->grade=$grade->grade;
        $return->range="($grade->mingrade-$grade->maxgrade)";
        $return->maxattempts='('.$grade->maxattempts.')';
        $return->weight=$grade->weight;
        if($grade->urlviewresults!=""){
        	$httptest='';
            if (textlib::strpos($grade->urlviewresults,'http://')===false){
        		$httptest='http://';
        	}
            $return->url='<a href="'.$httptest.$grade->urlviewresults.'" target="_blank">'.get_string('view','rcontent').'</a>';
        }
        if($grade->description!=""){
        	if(strlen($grade->description)>30){
        	     $return->description='<span title="'.$grade->description.'">'.substr($grade->description,0,27).'...</span>';
        	}else{
        		$return->description=$grade->description;
        	}
        }

        //take the sumweight for the parent
        $paramssql = array('userid'=>$userid, 'rcontentid'=> $rcontentid, 'attempt' => $attempt);
        $paramssql['unitid'] = ($unitid!='') ? $unitid : 0;
        $paramssql['activityid'] = ($activityid!='') ? $activityid : 0;
    	if($totalweight = $DB->get_records('rcontent_grades',$paramssql)) {
    		foreach ($totalweight as $tw) {
    		    $return->totalweight = '('.$tw->sumweights.')';
    		}
    	}
    }

	return $return;
}

//MARSUPIAL ************ AFEGIT -> New function to calculate the parent status depending off the child status
//2011.05.17 @mmartinez
function rcontent_grade_calculate_status ($rcontentid, $userid, $attempt=1, $unitid = 0, $activityid = 0, $starttime = ''){

	global $CFG,$DB;
	//echo "unit: $unitid, activity: $activityid<br>";  //just  for debug
	//get status of the given grade
	$sql_general  = "userid=$userid AND rcontentid=$rcontentid AND attempt=$attempt";
	$sql_general .= ($starttime != "")? " AND starttime = {$starttime}": "";
    $sql_unit     = ($unitid != '')? " AND unitid=$unitid" : " AND unitid=0";
    $sql_activity = ($activityid != '')? " AND activityid=$activityid" : " AND activityid=0";

    if ($status = $DB->get_records_select('rcontent_grades',$sql_general.$sql_unit.$sql_activity)){
	    $status = array_pop($status);
	    $orig_status = $status->status;
    } else {
//MARSUPIAL ************* MODIFICAT -> Create an object
//2011.12.18 @abertranb
    	$status = new stdClass();
    	$status->status = "";
    	$orig_status = $status;
// ************* ORIGINAL
    	$orig_status = $status->status = "";
// ************* FI
    }
    $return = array('', $orig_status);
	//check if we are calculating for a activity
	if ($activityid != 0){
	   $return[0] = $status->status;
	   //print_r($return); echo "<br>"; //just for debug mode
	   return $return;
	}

	//check if we are calculating for a unit
	if ($unitid != 0 && $activityid == 0) {
		//search for activities status if unit status is diferrent to POR_CORREGIR
		if ($status->status != "POR_CORREGIR"){
//MARSUPIAL ************* MODIFICAT -> All to str lower
//2011.10.26 @mmartinez
            $sql = "userid=$userid AND rcontentid=$rcontentid AND attempt=$attempt AND unitid=$unitid AND activityid <> 0 AND status='POR_CORREGIR'";
//*********** ORIGINAL
		    //$sql = "SELECT * FROM {$CFG->prefix}RCONTENT_GRADES U WHERE U.USERID=$userid AND U.RCONTENTID=$rcontentid AND U.ATTEMPT=$attempt AND U.UNITID=$unitid AND U.ACTIVITYID<>0 AND U.STATUS='POR_CORREGIR'";
//*********** FI
			if ($DB->count_records_select('rcontent_grades', $sql) > 0){
				$return[0] = "POR_CORREGIR";
				return $return;
			}
			$return[0] = $status->status;

		} else {
			$return[0] = $status->status;
		}

	}
	//check if we are calculating for a book
	if ($unitid == 0 && $activityid == 0){
		//search for units status
		if ($status->status != "POR_CORREGIR"){
// MARSUPIAL ********** MODIFICAT -> Fix bug when showing row status
// 2012.01.05 @mmartinez
		    $sql = "SELECT COUNT(b.status) FROM {rcontent_grades} b WHERE b.userid=$userid AND b.rcontentid=$rcontentid AND b.attempt=$attempt AND b.unitid<>0 AND (b.status = 'POR_CORREGIR' OR EXISTS (SELECT * FROM {$CFG->prefix}rcontent_grades u WHERE u.userid=$userid AND u.rcontentid=$rcontentid AND u.unitid <> 0 AND u.status='POR_CORREGIR' AND u.attempt=b.attempt))";
// ********** ORIGINAL
            //$sql = "SELECT COUNT(b.status) FROM {$CFG->prefix}rcontent_grades b WHERE b.userid=$userid AND b.rcontentid=$rcontentid AND b.attempt=$attempt AND b.unitid=0 AND b.activityid=0 AND (b.status = 'POR_CORREGIR' OR EXISTS (SELECT * FROM {$CFG->prefix}rcontent_grades u WHERE u.userid=$userid AND u.rcontentid=$rcontentid AND u.unitid <> 0 AND u.status='POR_CORREGIR' AND u.attempt=b.attempt))";
// ********** FI
			if ($DB->count_records_sql($sql) > 0){
				$return[0] = "POR_CORREGIR";
				return $return;
			}
			$return[0] = $status->status;

		} else {
			$return[0] = $status->status;
		}

	}
    //print_r($return); echo "<br>";  //just for debug
	return $return;

}
//************ FI

/**
 * Direct update of a grade instance from the view report
 * @return bool -> if ok true else false
 */
function rcontent_update_grade_instance(){
	global $DB;

    if (!$feedback = data_submitted()) {      // No incoming data?
	    return false;
    }

	if (!empty($feedback->cancel)) {          // User hit cancel button
        return false;
    }

    if(!is_numeric($feedback->txtgrade)){
    	echo '<script type="text/javascript">'."\n<!--\n";
        echo 'history.back();';
        echo "\n-->\n</script>";
    	return false;
    }

    $update=new stdClass();
    $update->id=$feedback->idgrade;
    $update->grade=round($feedback->txtgrade,2);
    $update->comments=$feedback->submissioncomment;

//MARSUPIAL ********* AFEGIT -> Update the modified date
//2011.05.19 @mmartinez
    $update->timemodified = time();
//********* FI

//MARSUPIAL ********** AFEGIT -> Update status but just if the actuall status is POR_CORREGIR
//2011.05.18 @mmartinez
    //retrieve data of that registry from db to know if status must be update or not
    if ($rdata_status = $DB->get_field('rcontent_grades', 'status', array('id' =>$feedback->idgrade))){
    	//print_r($rdata); die; //just for debug
    	if ($rdata_status == "POR_CORREGIR") {
    		$update->status = "CORREGIDO";
    	}
    }
//************ FI
    if (!$return=$DB->update_record('rcontent_grades', $update)) {
        return false;
    }

    if(strlen($feedback->submissioncomment) > 30 ){
        $comment='<span title="'.$feedback->submissioncomment.'">'.substr($feedback->submissioncomment,0,27).'...</span>';
    } else {
    	$comment=$feedback->submissioncomment;
    }

    /// Run some Javascript to try and update the parent page
    echo '<script type="text/javascript">'."\n<!--\n";
        echo 'opener.document.getElementById("rcontent_grade_'.$feedback->user.'_'.$feedback->idgrade.'").innerHTML="'.round($feedback->txtgrade,2).'";';
        echo 'opener.document.getElementById("rcontent_comments_'.$feedback->user.'_'.$feedback->idgrade.'").innerHTML=\''.$comment.'\';';
    echo "\n-->\n</script>";


    //Update gradebook
    $rcontent=$DB->get_record('rcontent', array('id'=>$feedback->rcontentid));
    rcontent_update_grades($rcontent,$feedback->user);

    add_to_log($feedback->course, 'rcontent', 'update grades', 'report.php?id='.$feedback->id.'&user='.$feedback->user,
        $feedback->user, $feedback->id);

    return true;
}

/**
 * Load level list from bd table mdl_rcommon_level
 * @return array with the loaded data
 */
function rcontent_level_list() {
    global $CFG,$DB;
    $return[0]='- '.get_string('level','rcontent').' -';

//********** MODIFICAT MARSUPIAL - levels with books and level code added to the list
	//TODO: upper is not a valid SQL function for all DB's user SQL_like instead
    $sql = "SELECT * FROM {rcommon_level}
            WHERE id IN (SELECT DISTINCT levelid FROM {rcommon_books} WHERE upper(format) = 'WEBCONTENT')";

    if($records = $DB->get_records_sql($sql)) {
        foreach($records as $r) {
            $return[$r->id] = $r->code." - ".$r->name ;
        }
    }
//**********
    return $return;
}

/**
 * Load all books from bd rcommon_books
 * @param int $levelid -> ID of the level
 * @param string $from -> to response in a format or other
 * @return array -> (id=>name)
 */
function rcontent_isbn_list($levelid='',$from='ajax'){
    global $CFG, $DB;
    if($from == 'updateform') {
    	$return[0]='- '.get_string('isbn','rcontent').' -';
    } else {
    	$return[]=array('id'=>0,'name'=>'- '.get_string('isbn','rcontent').' -');
    }

	if($levelid!=""){
		$sql="SELECT rb.*, rp.name as publiname FROM {rcommon_books} rb
		    INNER JOIN {rcommon_publisher} rp ON rb.publisherid=rp.id
		    WHERE rb.levelid='".$levelid."' AND rb.format='webcontent'
		    ORDER BY rb.name ASC";
        if($records=$DB->get_records_sql($sql)) {
    	    foreach($records as $r) {
    	    	if($from=='updateform') {
    	    		$return[$r->id]=$r->name." ($r->publiname)";
    	    	} else {
    	    	    $return[]=array('id'=>$r->id,'name'=>$r->name." ($r->publiname)");
    	    	}
    	    }

        }
	}
    return $return;
}

/**
 * Load the units of a determinate book from bd rcommon_books_units
 * @param $bookid int -> ID of the book
 * @param $from string -> for select the array structure of the response
 * @return array -> (id=>name)
 */
function rcontent_unit_list($bookid='',$from='ajax'){
	global $CFG,$DB;
	if($from=='updateform' ){
		$return[0]='- '.get_string('unit','rcontent').' -';
	} else {
		$return[]=array('id'=>0,'name'=>'- '.get_string('unit','rcontent').' -');
	}

	if($bookid!="") {
        if($records=$DB->get_records('rcommon_books_units',array('bookid'=>$bookid),'sortorder')) {
    	    foreach($records as $r) {
    	    	if($from=='updateform') {
    	    		$return[$r->id]=$r->name;
    	    	} else {
    	    	    $return[]=array('id'=>$r->id,'name'=>$r->name);
    	    	}
    	    }

        }
	}
	return $return;
}

/**
 * Load the activities of a determinated unit from bd rcommon_books_activities
 * @param $bookid int -> ID of the book
 * @param $unitid int -> ID of the unit
 * @param $from string -> for select the array structure of the response
 * @return array -> (id=>name)
 */
function rcontent_activity_list($bookid='',$unitid='',$from='ajax'){
	global $CFG,$DB;
	if($from == 'updateform') {
		$return[0]='- '.get_string('activity','rcontent').' -';
	} else {
		$return[]=array('id'=>0,'name'=>'- '.get_string('activity','rcontent').' -');
	}

	if($bookid!=""&&$unitid!="") {
	    if($records = $DB->get_records('rcommon_books_activities',array('bookid'=>$bookid,'unitid'=>$unitid),'sortorder ASC')){
	    	foreach($records as $r) {
	    		if($from=='updateform') {
    	    		$return[$r->id]=$r->name;
    	    	} else {
    	    	    $return[]=array('id'=>$r->id,'name'=>$r->name);
    	    	}
	    	}
	    }
	}
	return $return;
}

/**
 * Insert a note into the error log of the bd rcommon_errors_log
 * @param $action string ->
 * @param $bookis int ->
 * @param $cmid int ->
 * @return int -> ID of the new entry in the log or false if failds
 */
function rcontent_insert_error_log($action, $bookid, $cmid=0) {

	global $USER, $COURSE, $DB;

	$tmp = new stdClass();
	$tmp->time      =  time();
	$tmp->userid    =  $USER->id;
	$tmp->ip        =  $_SERVER['REMOTE_ADDR'];
	$tmp->course    =  $COURSE->id;
	$tmp->module    =  "rcontent";
	$tmp->cmid      =  $cmid;
	$tmp->action    =  $action;
	$tmp->url       =  $_SERVER['REQUEST_URI'];
	$tmp->info      =  "Bookid: ".$bookid.", Text: ".get_string($action,'rcontent');

	return $DB->insert_record("rcommon_errors_log",$tmp);
}
