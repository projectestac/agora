<?PHP  // $Id: student_results.php,v 1.3 2011-05-25 12:13:03 sarjona Exp $

/// This page prints results from a specific session

    require_once("../../../config.php");
    require_once("../lib.php");
    $id = required_param('id', PARAM_INT);             // Course Module ID
    
    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
    
        if (! $jclic = get_record("jclic", "id", $cm->instance)) {
            error("Course module is incorrect");
        }
    } 

    require_login($course->id);
    $strjclics = get_string("modulenameplural", "jclic");
    $strstarttime  = get_string("starttime", "jclic");
    $strscore  = get_string("score", "jclic");
    $strtotaltime  = get_string("totaltime", "jclic");
    $strtotals  = get_string("totals", "jclic");
    $strdone  = get_string("activitydone", "jclic");
    $stractivitysolved  = get_string("activitysolved", "jclic");
    $strattempts  = get_string("attempts", "jclic");
    $strlastaccess  = get_string("lastaccess", "jclic");
    $strmsgnosessions  = get_string("msg_nosessions", "jclic");
    
    $stractivity = get_string("activity", "jclic");
    $strsolved = get_string("solved", "jclic");
    $stractions = get_string("actions", "jclic");
    $strtime = get_string("time", "jclic");
    $stryes = get_string("yes");
    $strno = get_string("no");
    
    print_header("$course->shortname: $jclic->name", "$jclic->name", "");    


		$sessions=jclic_get_sessions($jclic->id,$USER->id);
		if (sizeof($sessions)>0){
      echo "<script language=\"JavaScript\" src=\"../prototype.js\" type=\"text/javascript\"></script>";
      echo '<table class="generaltable" align="center" border="0" cellpadding="5" cellspacing="1" width="95%"><tbody>';
      $general_align=array('center','center','center','center','center','center');
      // Print header
    	jclic_print_row(array($strstarttime, $strscore, $strtotaltime, $strdone, $stractivitysolved, $strattempts),$general_align,'',true);
    	// Print session data
			foreach($sessions as $session){
			  $sessiontime='<a href="#" onclick="Element.toggle(\''.$session->session_id.'\')">'.date('d/m/Y H:i',strtotime($session->starttime)).'</a>';
        $table_data = array($sessiontime, $session->score.'%', $session->totaltime,$session->done,$session->solved,$session->attempts.($jclic->maxattempts>0?'/'.$jclic->maxattempts:''));
 	  	  jclic_print_row($table_data, $general_align);
        // Print activities for each session
        print_session_activities($session->session_id);
 	  	}
      if (sizeof($sessions)>1){
		    $sessions_summary=jclic_get_sessions_summary($jclic->id,$USER->id);
		    jclic_print_row(array ('<b>'.$strtotals.'</b>', '<b>'.$sessions_summary->score.'%</b>', '<b>'.$sessions_summary->totaltime.'</b>','<b>'.$sessions_summary->done.'</b>','<b>'.$sessions_summary->solved.'</b>','<b>'.$sessions_summary->attempts.'</b>'),$general_align);
      }
		  echo '</tbody></table><br>';
		}else{
		  echo '<br><center>'.$strmsgnosessions.'</center>';
    }
	
?>		
