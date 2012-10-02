<?php

/// This page lists all the instances of slideshow in a particular course

    require_once("../../config.php");
    require_once("lib.php");
    
    $id = required_param('id', PARAM_INT);   // course

   // require_variable($id);   // course

    if (! $course = get_record("course", "id", $id)) {
        error("Course ID is incorrect");
    }

    require_login($course->id);

    add_to_log($course->id, "slideshow", "view all", "index.php?id=$course->id", "");


/// Get all required strings

    $strslideshows = get_string("modulenameplural", "slideshow");
    $strslideshow  = get_string("modulename", "slideshow");


/// Print the header

/// 1.8 compatible?
 /// Print header.
    $strslideshows = get_string("modulenameplural", "slideshow");
    $navigation = "$strslideshows ";
    print_header_simple($strslideshows, "",
                 "$navigation ", "", "", true, ' ', navmenu($course));

/*

    if ($course->category) {
        $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
    }

    print_header("$course->shortname: $strslideshows", "$course->fullname", "$navigation $strslideshows", "", "", true, "", navmenu($course));
*/
/// Get all the appropriate data

    if (! $slideshows = get_all_instances_in_course("slideshow", $course)) {
        notice("There are no slideshows", "../../course/view.php?id=$course->id");
        die;
    }

/// Print the list of instances (your module will probably extend this)

    $timenow = time();
    $strname  = get_string("name");
    $strweek  = get_string("week");
    $strtopic  = get_string("topic");

    if ($course->format == "weeks") {
        $table->head  = array ($strweek, $strname);
        $table->align = array ("CENTER", "LEFT");
    } else if ($course->format == "topics") {
        $table->head  = array ($strtopic, $strname);
        $table->align = array ("CENTER", "LEFT", "LEFT", "LEFT");
    } else {
        $table->head  = array ($strname);
        $table->align = array ("LEFT", "LEFT", "LEFT");
    }

    foreach ($slideshows as $slideshow) {
        if (!$slideshow->visible) {
            //Show dimmed if the mod is hidden
            $link = "<A class=\"dimmed\" HREF=\"view.php?id=$slideshow->coursemodule\">$slideshow->name</A>";
        } else {
            //Show normal if the mod is visible
            $link = "<A HREF=\"view.php?id=$slideshow->coursemodule\">$slideshow->name</A>";
        }

        if ($course->format == "weeks" or $course->format == "topics") {
            $table->data[] = array ($slideshow->section, $link);
        } else {
            $table->data[] = array ($link);
        }
    }

    echo "<BR>";

    print_table($table);

/// Finish the page

    print_footer($course);

?>