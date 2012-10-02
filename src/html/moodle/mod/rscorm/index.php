<?php // $Id: index.php,v 1.25.2.4 2008/02/20 06:18:52 moodler Exp $

    require_once("../../config.php");
    require_once("locallib.php");

    $id = required_param('id', PARAM_INT);   // course id

    if (!empty($id)) {
        if (! $course = get_record("course", "id", $id)) {
            error("Course ID is incorrect");
        }
    } else {
        error('A required parameter is missing');
    }

    require_course_login($course);

    add_to_log($course->id, "rscorm", "view all", "index.php?id=$course->id", "");

    $strscorm = get_string("modulename", "rscorm");
    $strscorms = get_string("modulenameplural", "rscorm");
    $strweek = get_string("week");
    $strtopic = get_string("topic");
    $strname = get_string("name");
    $strsummary = get_string("summary");
    $strreport = get_string("report",'rscorm');
    $strlastmodified = get_string("lastmodified");

    $navlinks = array();
    $navlinks[] = array('name' => $strscorms, 'link' => '', 'type' => 'activity');
    $navigation = build_navigation($navlinks);

    print_header_simple("$strscorms", "", $navigation,
                 "", "", true, "", navmenu($course));

    if ($course->format == "weeks" or $course->format == "topics") {
        $sortorder = "cw.section ASC";
    } else {
        $sortorder = "m.timemodified DESC";
    }

    if (! $scorms = get_all_instances_in_course("rscorm", $course)) {
        notice(get_string('thereareno', 'moodle', $strscorms), "../../course/view.php?id=$course->id");
        exit;
    }

    if ($course->format == "weeks") {
        $table->head  = array ($strweek, $strname, $strsummary, $strreport);
        $table->align = array ("center", "left", "left", "left");
    } else if ($course->format == "topics") {
        $table->head  = array ($strtopic, $strname, $strsummary, $strreport);
        $table->align = array ("center", "left", "left", "left");
    } else {
        $table->head  = array ($strlastmodified, $strname, $strsummary, $strreport);
        $table->align = array ("left", "left", "left", "left");
    }

    foreach ($scorms as $scorm) {

        $context = get_context_instance(CONTEXT_MODULE,$scorm->coursemodule);
        $tt = "";
        if ($course->format == "weeks" or $course->format == "topics") {
            if ($scorm->section) {
                $tt = "$scorm->section";
            }
        } else {
            $tt = userdate($scorm->timemodified);
        }
        $report = '&nbsp;';
        $reportshow = '&nbsp;';
        if (has_capability('mod/rscorm:viewreport', $context)) {
            $trackedusers = rscorm_get_count_users($scorm->id, $scorm->groupingid);
            if ($trackedusers > 0) {
                $reportshow = '<a href="report.php?id='.$scorm->coursemodule.'">'.get_string('viewallreports','rscorm',$trackedusers).'</a></div>';
            } else {
                $reportshow = get_string('noreports','rscorm');
            }
        } else if (has_capability('mod/rscorm:viewscores', $context)) {
            require_once('locallib.php');
            $report = rscorm_grade_user($scorm, $USER->id);
            $reportshow = get_string('score','rscorm').": ".$report;
        }
        if (!$scorm->visible) {
           //Show dimmed if the mod is hidden
           $table->data[] = array ($tt, "<a class=\"dimmed\" href=\"view.php?id=$scorm->coursemodule\">".format_string($scorm->name)."</a>",
                                   format_text($scorm->summary), $reportshow);
        } else {
           //Show normal if the mod is visible
           $table->data[] = array ($tt, "<a href=\"view.php?id=$scorm->coursemodule\">".format_string($scorm->name)."</a>",
                                   format_text($scorm->summary), $reportshow);
        }
    }

    echo "<br />";

    print_table($table);

    print_footer($course);

?>
