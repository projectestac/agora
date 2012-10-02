<?PHP // $Id: index.php,v 1.4 2011-05-25 12:13:03 sarjona Exp $

/// This page lists all the instances of jclic in a particular course

    require_once("../../config.php");
    require_once("lib.php");

    $id = required_param('id', PARAM_INT);      // course

    if (! $course = get_record("course", "id", $id)) {
        error("Course ID is incorrect");
    }

    require_login($course->id);

    add_to_log($course->id, "jclic", "view all", "index.php?id=$course->id", "");


/// Get all required strings

    $strjclics = get_string("modulenameplural", "jclic");
    $strjclic  = get_string("modulename", "jclic");
    $strnotavailable = get_string("notavailable");


/// Print the header

    if ($course->category) {
        $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
    }

    print_header_simple("$strjclics", "", "$strjclics", "", "", true, "", navmenu($course));
    print_heading(get_string("modulename", "jclic"));

/// Get all the appropriate data

    if (! $jclics = get_all_instances_in_course("jclic", $course)) {
        notice("There are no jclics", "../../course/view.php?id=$course->id");
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
		$table->head  = array ($first, '&nbsp;&nbsp;&nbsp;'.$strname, $strdescription);
		$table->align = array ("CENTER", "LEFT", "LEFT", "CENTER");
        }else{
    		$strlastaccess  = get_string("lastaccess","jclic");
	    	$strscore  = get_string("score","jclic");
    		$strattempts  = get_string("attempts","jclic");
        	$table->head  = array ($first, '&nbsp;&nbsp;&nbsp;'.$strname, $strdescription,$strlastaccess,$strscore,$strattempts);
	        $table->align = array ("CENTER", "LEFT", "LEFT", "CENTER","CENTER","CENTER");
        }
        $table->wrap = array ("NOWRAP","NOWRAP");
    } else {
        $table->head  = array ($strname);
        $table->align = array ("LEFT", "LEFT", "LEFT");
    }

	if (isteacher($course->id)){
	    foreach ($jclics as $jclic) {
	        if (!$jclic->visible) {
	            //Show dimmed if the mod is hidden
	            $link = "<A class=\"dimmed\" HREF=\"view.php?id=$jclic->coursemodule\">$jclic->name</A>";
	        } else {
	            //Show normal if the mod is visible
	            $link = "<A HREF=\"view.php?id=$jclic->coursemodule\">$jclic->name</A>";
	        }

	        if ($course->format == "weeks" or $course->format == "topics") {
	            $table->data[] = array ($jclic->section, $link, $jclic->description);
	        } else {
	            $table->data[] = array ($link);
	        }
	    }

	    echo "<BR>";

	    print_table($table);
	}else{
	    foreach ($jclics as $jclic) {
	        if (!$jclic->visible) {
	            //Show dimmed if the mod is hidden
	            $link = "<A class=\"dimmed\" HREF=\"view.php?id=$jclic->coursemodule\">$jclic->name</A>";
	        } else {
	            //Show normal if the mod is visible
	            $link = "<A HREF=\"view.php?id=$jclic->coursemodule\">$jclic->name</A>";
	        }
		$sessions_summary=jclic_get_sessions_summary($jclic->id,$USER->id);
		$lastaccess='-';
		if ($sessions_summary->starttime>0) $lastaccess=date('d/m/Y H:i',strtotime($sessions_summary->starttime));
		$score=$sessions_summary->score.'%';
		$attempts=$sessions_summary->attempts;
		if ($jclic->maxattempts>0)$attempts.='/'.$jclic->maxattempts;

	        if ($course->format == "weeks" or $course->format == "topics") {
	            $table->data[] = array ($jclic->section, $link, $jclic->description,$lastaccess,$score,$attempts);
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
