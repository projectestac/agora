<?php // $Id: print.php,v 1.11.2.4 2008/06/20 13:36:43 mchurch Exp $

    require_once("../../config.php");
    require_once($CFG->dirroot.'/mod/questionnaire/lib.php');

    $qid = required_param('qid', PARAM_INT);
    $rid = required_param('rid', PARAM_INT);
    $courseid = required_param('courseid', PARAM_INT);
    $sec = required_param('sec', PARAM_INT);
    $null = null;
    $referer = $CFG->wwwroot.'/mod/questionnaire/report.php';

    if (! $questionnaire = get_record("questionnaire", "id", $qid)) {
        error("Course module is incorrect");
    }
    if (! $course = get_record("course", "id", $questionnaire->course)) {
        error("Course is misconfigured");
    }
    if (! $cm = get_coursemodule_from_instance("questionnaire", $questionnaire->id, $course->id)) {
        error("Course Module ID was incorrect");
    }

/// Check login and get context.
    require_login($courseid);

    $questionnaire = new questionnaire(0, $questionnaire, $course, $cm);

    if (!$questionnaire->user_can_take($USER->id)) {
        /// Should never happen, unless called directly by a snoop...
        print_error('nopermissions', 'questionnaire', $CFG->wwwroot.'/mod/questionnaire/view.php?id='.$cm->id);
    }

    $currentcss = '';
    if ( !empty($questionnaire->survey->theme) ) {
        $currentcss = '<link rel="stylesheet" type="text/css" href="'.
            $CFG->wwwroot.'/mod/questionnaire/css/'.$questionnaire->survey->theme.'" />';
    } else {
        $currentcss = '<link rel="stylesheet" type="text/css" href="'.
            $CFG->wwwroot.'/mod/questionnaire/css/default.css" />';
    }

    print_header('Print Survey', '', '', '', $currentcss, true, '', '');
    $questionnaire->survey_print_render('', '', $courseid);
    close_window_button();
    echo '</body></html>';
?>