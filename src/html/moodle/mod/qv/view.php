<?PHP  // $Id: view.php,v 1.11 2009/03/16 13:05:44 sarjona Exp $

/// This page prints a particular instance of qv

    require_once("../../config.php");
    require_once("lib.php");
    require_once('../../lib/filelib.php');
    
    
    $id = required_param('id', PARAM_INT);    // Course Module ID

    if (! $cm = get_coursemodule_from_id('qv', $id)) {
        error("Course Module ID was incorrect");
    }

    if (! $course = get_record("course", "id", $cm->course)) {
        error("Course is misconfigured");
    }

    require_login($course->id, false, $cm);
    if (function_exists('get_context_instance')) $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    
    if (! $qv = get_record("qv", "id", $cm->instance)) {
        error("QV id was incorrect");
    }
    
    add_to_log($course->id, "qv", "view", "view.php?id=$cm->id", "$qv->id");
    
/// Print the page header

    if ($course->category) {
        $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
    }

    $strqvs = get_string("modulenameplural", "qv");
    $strqv  = get_string("modulename", "qv");
    $strqvstudents = get_string("qvstudents","qv");
    $strstate = get_string("state","qv");
    $strname = get_string("name");
    $strscore = get_string("score","qv");
    $strdelivers = get_string("delivers","qv");
    $strtime = get_string("time","qv");//Albert
    $strdownloadcsv = get_string("downloadcsv", "qv");
    $stropennewwindow = get_string("opennewwindow", "qv");
    $strreport = get_string("report", "qv");//Albert
    $strunread = get_string("unread","qv");

    print_header_simple(format_string($qv->name), "",
                 "<a href=\"index.php?id=$course->id\">$strqvs</a> -> ".format_string($qv->name), "", "", true,
                  update_module_button($cm->id, $course->id, $strqv), navmenu($course, $cm));
    $groupmode = groupmode($course, $cm);
    $currentgroup = setup_and_print_groups($course, $groupmode, 'view.php?id=' . $cm->id);


/// Print the main part of the page
    echo "<script type=\"text/javascript\" src=\"$CFG->wwwroot/mod/qv/qv.js\"></script>";

    echo "<br/><p>".$qv->description."</p>";

    if (isteacher($course->id) && (!function_exists('has_capability') || has_capability('mod/qv:viewqv', $context)) ){
        print_heading($strqvstudents);
        $table->head  = array ('', $strname,$strstate,$strunread,$strscore,$strdelivers,$strtime);//Albert
        $table->align = array ("CENTER", "LEFT","CENTER","CENTER","CENTER","CENTER","CENTER");//Albert
        $table->width='50%';

        // Print assignments information for all students
        if ($students=qv_get_students($cm, $course, $qv->id)){
            foreach($students as $student){
                $student_name=$student->firstname.' '.$student->lastname;
                $assignment_summary=qv_get_assignment_summary($qv->id,$student->userid);
                $qv_full_url=qv_get_full_url($course, $qv, $assignment_summary, $USER->id, $student_name, true);
                $student_info=$qv_full_url!=''?"<A href='#' onclick='openpopupName(\"$qv_full_url\",\"toolbar=no,status=no,scrollbars=yes,resizable=yes\",\"true\");'>$student_name</A>":$student_name; //Albert
                $alert=qv_print_alerts($assignment_summary->states);
                $states=qv_print_states($assignment_summary->states, $qv->maxdeliver);
                if (isset($assignment_summary->id)) $unread_messages = qv_assignment_messages($assignment_summary->id);
                else $unread_messages = 0;
                $table->data[] = array ($alert,$student_info,$states,$unread_messages,$assignment_summary->pending_score,$assignment_summary->attempts,$assignment_summary->time);
            }
        }

        print_table($table);
        
        //echo '<br/><center><a href="report.php?id='.$id.'">'.$strreport.'</a></center>';
        //echo '<br/><center><a href="#" onclick="openpopupName(\'report.php?id='.$id.'\',\'toolbar=no,status=no,scrollbars=yes,resizable=yes\',\'true\');">'.$strreport.'</a></center>';
        //echo '<br/><center><a href="action/csv.php?qvid='.$qv->id.'">'.$strreport.'</a></center>';


        echo"<br/><hr width='50%'/>";
        // states legend
        $legendtable->width='40%';
        $legendtable->fontsize='0.6em';
        $legendtable->cellspacing='0';
        $legendtable->data[] = array (qv_print_state_not_started(), qv_print_state_delivered(),qv_print_state_corrected());
        $legendtable->data[] = array (qv_print_state_started(), qv_print_state_partially_delivered(),qv_print_state_partially_corrected());
        echo make_table($legendtable);
    }else{
        $assignment = qv_get_assignment($qv);
        $qv_full_url=qv_get_full_url($course, $qv, $assignment, $USER->id, "$USER->firstname%20$USER->lastname");

        if ($qv->target=='self'){
            $qvwidth=$qv->width!=''?$qv->width:'99%';
            $qvheight=$qv->height!=''?$qv->height:'400';
            echo "<IFRAME src='$qv_full_url' title='Quaderns Virtuals' width='$qvwidth' height='$qvheight'></IFRAME>";
        } else {
            $fullscreen=$qv->width==''||$qv->width=='100%'||$qv->height==''?'true':'false';
            echo "<A href='#' onclick='openpopupName(\"$qv_full_url\",\"toolbar=no,status=no,scrollbars=yes,resizable=yes,width=$qv->width,height=$qv->height\",$fullscreen);'>";//Albert
            print_string("start", "qv");
            echo "</A><br/>";
        }
    }
    echo "</p>";


/// Finish the page
    print_footer($course);

?>
