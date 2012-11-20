<?PHP // $Id: index.php,v 1.2 2006/12/12 09:20:29 sarjona Exp $

/// This page lists all the instances of eoicampus in a particular course

    require_once("../../config.php");
    require_once("lib.php");

    $id = required_param('id', PARAM_INT);      // course

    // XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
    // 2012.10.23 @abertranb
    if (! $course = $DB->get_record("course", array("id"=> $id))) {
    // ********** ORIGINAL
    //if (! $course = get_record("course", "id", $id)) {
    // ********** FI
    	   
        error("Course ID is incorrect");
    }

    require_login($course->id);

    add_to_log($course->id, "eoicampus", "view all", "index.php?id=$course->id", "");


/// Get all required strings

    $streoicampus = get_string("modulename", "eoicampus");
    $strnotavailable = get_string("notavailable");


/// Print the header

    if ($course->category) {
        $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
    }

    print_header("$course->shortname: $streoicampus", "$course->fullname", "$navigation $streoicampus", "", "", true, "", navmenu($course));
    print_heading($streoicampus);

/// Get all the appropriate data

    if (! $eoicampus_acts = get_all_instances_in_course("eoicampus", $course)) {
        notice("There are no $streoicampus activities", "../../course/view.php?id=$course->id");
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
      $table->head  = array ($first, '&nbsp;&nbsp;&nbsp;'.$strname, $strdescription);
      $table->align = array ("CENTER", "LEFT", "LEFT", "CENTER");
      $table->wrap = array ("NOWRAP","NOWRAP");
    } else {
      $table->head  = array ($strname);
      $table->align = array ("LEFT", "LEFT", "LEFT");
    }

    foreach ($eoicampus_acts as $eoicampus) {
        if (!$eoicampus->visible) {
            //Show dimmed if the mod is hidden
            $link = "<A class=\"dimmed\" HREF=\"view.php?id=$eoicampus->coursemodule\">$eoicampus->name</A>";
        } else {
            //Show normal if the mod is visible
            $link = "<A HREF=\"view.php?id=$eoicampus->coursemodule\">$eoicampus->name</A>";
        }

        if ($course->format == "weeks" or $course->format == "topics") {
            $table->data[] = array ($eoicampus->section, $link, $eoicampus->description);
        } else {
            $table->data[] = array ($link);
        }
    }

    echo "<BR>";
    print_table($table);
    
/// Finish the page
    print_footer($course);

?>
