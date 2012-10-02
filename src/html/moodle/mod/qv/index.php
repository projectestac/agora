<?PHP // $Id: index.php,v 1.3 2008/06/17 20:44:51 llastarri Exp $

/// This page lists all the instances of qv in a particular course

    require_once("../../config.php");
    require_once("lib.php");

    $id = required_param('id', PARAM_INT);      // course

    if (! $course = get_record("course", "id", $id)) {
        error("Course ID is incorrect");
    }

    require_login($course->id);

    add_to_log($course->id, "qv", "view all", "index.php?id=$course->id", "");


/// Get all required strings

    $strqvs = get_string("modulenameplural", "qv");
    $strqv  = get_string("modulename", "qv");
    $strdownload = get_string("download", "qv");
    $strnotavailable = get_string("notavailable");
    $strstate  = get_string("state", "qv");


/// Print the header

    if ($course->category) {
        $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
    }
    print_header_simple("$strqvs", "", "$strqvs", "", "", true, "", navmenu($course));


/*    print_header("$course->shortname: $strqvs", "$course->fullname", "$navigation $strqvs", "", "", true, "", navmenu($course));
    print_heading(get_string("modulename", "qv"));*/
                 

/// Get all the appropriate data

    if (! $qvs = get_all_instances_in_course("qv", $course)) {
        notice("There are no qvs", "../../course/view.php?id=$course->id");
        die;
    }

/// Print the list of instances (your module will probably extend this)

    $strweek  = get_string("week");
    $strtopic  = get_string("topic");
    $strname  = get_string("name");
    $strdescription  = get_string("description");
	
    if ($course->format == "weeks" || $course->format == "topics") {
    	if ($course->format == "weeks") $first=$strweek;
    	else if ($course->format == "topics") $first=$strtopic;
    	if (isteacher($course->id)){
        	$table->head  = array ($first, $strname, $strdescription);
    	    $table->align = array ("CENTER", "LEFT", "LEFT", "CENTER","CENTER");
        }else{
	    	  $strscore  = get_string("score","qv");
    		  $strdelivers  = get_string("delivers","qv");
		  $strtime = get_string("time","qv");//Albert

        	//$table->head  = array ($first, $strname, $strdescription,$strstate,$strscore,$strdelivers);
	      //  $table->align = array ("CENTER", "LEFT", "LEFT", "CENTER","CENTER","CENTER");
		$table->head  = array ($first, $strname, $strdescription,$strstate,$strscore,$strdelivers,$strtime);//Albert
	        $table->align = array ("CENTER", "LEFT", "LEFT", "CENTER","CENTER","CENTER","CENTER");//Albert
        }
        $table->wrap = array ("NOWRAP","NOWRAP");
    } else {
        $table->head  = array ($strname);
        $table->align = array ("LEFT", "LEFT", "LEFT");
    }

	if (isteacher($course->id)){
	    foreach ($qvs as $qv) {
        if (!$qv->visible) {
            //Show dimmed if the mod is hidden
            $link = "<A class=\"dimmed\" HREF=\"view.php?id=$qv->coursemodule\">$qv->name</A>";
        } else {
            //Show normal if the mod is visible
            $link = "<A HREF=\"view.php?id=$qv->coursemodule\">$qv->name</A>";
        }
        
        if ($course->format == "weeks" or $course->format == "topics") {
            $table->data[] = array ($qv->section, $link, $qv->description);
        } else {
            $table->data[] = array ($link);
        }
	    }

	    echo "<BR>";

	    print_table($table);
	}else{
    foreach ($qvs as $qv) {
      $assignment_summary=qv_get_assignment_summary($qv->id, $USER->id);
      if (!$qv->visible) {
        //Show dimmed if the mod is hidden
        $link = "<A class=\"dimmed\" HREF=\"view.php?id=$qv->coursemodule\">$qv->name</A>";
	    } else {
        //Show normal if the mod is visible
        $link = "<A HREF=\"view.php?id=$qv->coursemodule\">$qv->name</A>";
      }
      if ($course->format == "weeks" or $course->format == "topics") {
        $score=$assignment_summary->score;
		//A2
		if ($qv->showcorrection==0)
			$score="-";
		
		
        if (!isset($score)) $score='-';
        $attempts=$assignment_summary->attempts;
        if (isset($attempts)){
			    if ($qv->maxdeliver>-1) $attempts.='/'.$qv->maxdeliver;
        } else $attempts='-';      
        //$table->data[] = array ($qv->section, $link, $qv->description, qv_print_states($assignment_summary->states, $qv->maxdeliver), $score, $attempts);
        $table->data[] = array ($qv->section, $link, $qv->description, qv_print_states($assignment_summary->states, $qv->maxdeliver), $score, $attempts, $assignment_summary->time);//Albert
      } else {
        $table->data[] = array ($link);
      }
	  }

	  echo "<BR>";
	  print_table($table);
	}

/// Finish the page

    print_footer($course);

?>
