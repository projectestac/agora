<?PHP  // $Id: view.php,v 1.15 2011-05-25 12:13:03 sarjona Exp $

/// This page prints a particular instance of jclic

  require_once("../../config.php");
  require_once("lib.php");
  require_once('../../lib/filelib.php');
	
  $id = required_param('id', PARAM_INT);    // Course Module ID

  if (! $cm = get_coursemodule_from_id('jclic', $id)) {
      error("Course Module ID was incorrect");
  }

  if (! $course = get_record("course", "id", $cm->course)) {
      error("Course is misconfigured");
  }

  require_login($course->id, false, $cm);
  if (function_exists('get_context_instance')) $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    
  if (! $jclic = get_record("jclic", "id", $cm->instance)) {
      error("JClic id was incorrect");
  }

  add_to_log($course->id, "jclic", "view", "view.php?id=$cm->id", "$jclic->id");
    
/// Print the page header

  if ($course->category) {
      $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
  }
  $strjclics = get_string("modulenameplural", "jclic");
  $strjclic  = get_string("modulename", "jclic");
  $strstarttime  = get_string("starttime", "jclic");
  $strscore  = get_string("score", "jclic");
  $strtotaltime  = get_string("totaltime", "jclic");
  $strdone  = get_string("activitydone", "jclic");
  $strsolved  = get_string("activitysolved", "jclic");
  $strattempts  = get_string("attempts", "jclic");
  $strnoattempts  = get_string("msg_noattempts", "jclic");
  $strlastaccess  = get_string("lastaccess", "jclic");
  $strtotals  = get_string("totals", "jclic");
  $strshowall  = get_string("showall", "jclic");
  $strhideall  = get_string("hideall", "jclic");
  $strshow_results = get_string("show_results", "jclic");
  $strpreview_jclic = get_string("preview_jclic", "jclic");
    

  print_header_simple(format_string($jclic->name), "",
               "<a href=\"index.php?id=$course->id\">$strjclics</a> -> ".format_string($jclic->name), "", "", true,
                update_module_button($cm->id, $course->id, $strjclic), navmenu($course, $cm));
  $groupmode = groupmode($course, $cm);
  $currentgroup = setup_and_print_groups($course, $groupmode, 'view.php?id=' . $cm->id);


/// Print the main part of the page
  echo "<script language=\"JavaScript\" src=\"prototype.js\" type=\"text/javascript\"></script>";
  
  echo "<p>".$jclic->description."<br>";
  $jclic_url = (substr($jclic->url, 0, 4)=='http')?$jclic->url:'http://'.jclic_get_server().jclic_get_path().'/file.php/'.$course->id.'/'.$jclic->url;
  
  if (isteacher($course->id) && (!function_exists('has_capability') || has_capability('mod/jclic:viewjclic', $context)) ){
  	// Preview the JClic activity
    echo '<div style="padding-right:10%; float:right"><a href="#" onclick="window.open(\'action/preview_jclic.php?id='.$id.'&amp;project='.urlencode($jclic_url).'&amp;name='.urlencode($jclic->name).'&amp;width='.$jclic->width.'&amp;height='.$jclic->height.'\',\'JClic\',\'navigation=0,toolbar=0,resizable=1,scrollbars=1,width='.($jclic->width+80).',height='.($jclic->height+80).'\');" >'.$strpreview_jclic.'</a></div>';

//    echo "<div style=\"padding-right:10%; float:right\"><a href=\"#\" onclick=\"launchApplet('http://clic.xtec.cat/db/jclicApplet.jsp?project=".urlencode($jclic_url)."&amp;title=".urlencode(utf8_decode($jclic->name))."')\" >$strpreview_jclic</a></div>";
   
    $showall=optional_param('showall', false, PARAM_BOOL);
    $strshow=$showall?$strhideall:$strshowall;
    echo "<div style=\"padding-left:10%; padding-bottom:10px;\"><A href=\"view.php?id=$id&showall=".!$showall."\">$strshow</A></div>";

    // Print manual table
    echo '<table class="generaltable" align="center" border="0" cellpadding="5" cellspacing="1" width="80%"><tbody>';
    $general_align=array('left','center','center','center','center','center','center');
    jclic_print_row(array('',$showall?$strstarttime:$strlastaccess, $strdone,$strsolved,$strtotaltime,$strscore,$strattempts),$general_align,'',true);
  
    // Print sessions and activities of all students
    if ($students=jclic_get_students($cm, $course, $jclic->id)){
      foreach($students as $student){
        $student->id=$student->userid;
        if ($showall){
        // Print sessions for each student    				
          $sessions=jclic_get_sessions($jclic->id,$student->userid);
          if (sizeof($sessions)>0){
            $first_session=true;
            foreach($sessions as $session){
              $sessiontime='<a href="#" onclick="Element.toggle(\''.$session->session_id.'\')">'.date('d/m/Y H:i',strtotime($session->starttime)).'</a>';
              if ($first_session){
                $first_session=false;
                $student_info = print_user_picture($student, $course->id, NULL, 0, true).$student->firstname.' '.$student->lastname;
                $table_data = array($student_info, $sessiontime, $session->done,$session->solved, $session->totaltime, $session->score.'%', $session->attempts.($jclic->maxattempts>0?'/'.$jclic->maxattempts:''));
                $table_props = array('rowspan="'.(sizeof($sessions)*2+1).'"','','','','','','');
                $table_align=$general_align;
              }else{
                $table_data = array($sessiontime, $session->done,$session->solved,$session->totaltime,$session->score.'%', $session->attempts.($jclic->maxattempts>0?'/'.$jclic->maxattempts:''));
                $table_props = '';
                $table_align=array('center','center','center','center','center','center');
              }
              jclic_print_row($table_data, $table_align, $table_props);
               
              // Print activities for each session
              print_session_activities($session->session_id);
            }
          }
        }
      
        $sessions_summary=jclic_get_sessions_summary($jclic->id,$student->userid);
        $starttime=array_key_exists('starttime', $sessions_summary)?$sessions_summary->starttime:'0';
        if ($starttime>0) $starttime=date('d/m/Y H:i',strtotime($sessions_summary->starttime));
        else $starttime='-';
        if (!$showall || sizeof($sessions)<=0){
          $table_align=$general_align;
          $student_info = print_user_picture($student, $course->id, NULL, 0, true).$student->firstname.' '.$student->lastname;
          jclic_print_row(array ($student_info, !$showall?$starttime:(sizeof($sessions)<=0?'-':'<b>'.$strtotals.'</b>'), '<b>'.$sessions_summary->done.'</b>','<b>'.$sessions_summary->solved.'</b>','<b>'.$sessions_summary->totaltime.'</b>','<b>'.$sessions_summary->score.' %</b>', '<b>'.$sessions_summary->attempts.($jclic->maxattempts>0?'/'.$jclic->maxattempts:'').'</b>'), $table_align);
        }else {
          $table_align=array('center','center','center','center','center','center');
          jclic_print_row(array (!$showall?$starttime:(sizeof($sessions)<=0?'-':'<b>'.$strtotals.'</b>'), '<b>'.$sessions_summary->done.'</b>','<b>'.$sessions_summary->solved.'</b>', '<b>'.$sessions_summary->totaltime.'</b>','<b>'.$sessions_summary->score.' %</b>','<b>'.$sessions_summary->attempts.($jclic->maxattempts>0?'/'.$jclic->maxattempts:'').'</b>'), $table_align);
        }
      }
    }
  
    echo '</tbody></table><br>';
  		
    $delid=optional_param('delete', PARAM_INT);
    if (isset($delid)){
      jclic_delete_instance($delid);
    }
  }else{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
    echo "<script language=\"JavaScript\" src=\"$CFG->jclic_jclicpluginjs\" type=\"text/javascript\"></script>";
    echo '<br><A href="#" onclick="window.open(\'action/student_results.php?id='.$id.'\',\'JClic\',\'navigation=0,toolbar=0,resizable=1,scrollbars=1,width=700,height=400\');" >'.$strshow_results.'</A>';
    
    $sessions=jclic_get_sessions($jclic->id,$USER->id);
    $attempts=sizeof($sessions);
    if ($jclic->maxattempts<0 || $attempts < $jclic->maxattempts){
      //$jclic_url = (substr($jclic->url, 0, 4)=='http')?$jclic->url:'http://'.jclic_get_server().jclic_get_path().'/file.php/'.$course->id.'/'.$jclic->url;
      echo '<div style="text-align:center;padding-top:10px;">';
      echo '<script language="JavaScript">';
      //echo "setJarBase('./dist');";
      echo "setReporter('TCPReporter','path=".jclic_get_server().";service=".jclic_get_path()."/mod/jclic/action/beans.php;user=$USER->id;key=$jclic->id;lap=$CFG->jclic_lap;protocol=$protocol');";
      echo "setSkin('$jclic->skin');";
      echo "setLanguage('$jclic->lang');";
      echo "setExitUrl('$jclic->exiturl');";
      echo "writePlugin('$jclic_url', '$jclic->width', '$jclic->height');";
      echo "</script>";
      echo '</div>';
    }else{
      echo "<br/><br/>".$strnoattempts;
    }
  }
  echo "</p>";


/// Finish the page
  print_footer($course);

?>
