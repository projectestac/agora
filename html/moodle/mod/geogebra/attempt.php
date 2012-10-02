<?php

require_once('../../config.php');
require_once('lib.php');

$id = optional_param('id', 0, PARAM_INT);  // course_module ID, or
$a = optional_param('a', 0, PARAM_INT);    // geogebra instance ID
$f = optional_param('f', 1, PARAM_INT);    // finished
$vars = optional_param('appletInformation', '', PARAM_RAW); // applet variables
parse_str($vars, $parsedVars);

if ($id !== false) {
    if (($cm = get_coursemodule_from_id('geogebra', $id)) === false) {
        error('Course Module ID was incorrect');
    }

    if (($course = get_record('course', 'id', $cm->course)) === false) {
        error('Course is misconfigured');
    }

    if (($geogebra = get_record('geogebra', 'id', $cm->instance)) === false) {
        error('Course module is incorrect');
    } else {
        $geogebra->cmidnumber = $cm->id;
    }
} else if ($a !== false) {
    if (($geogebra = get_record('geogebra', 'id', $a)) === false) {
        error('Course module is incorrect');
    }

    if (($course = get_record('course', 'id', $geogebra->course)) === false) {
        error('Course is misconfigured');
    }

    if (($cm = get_coursemodule_from_instance('geogebra', $geogebra->id, $course->id)) === false) {
        error('Course Module ID was incorrect');
    } else {
        $geogebra->cmidnumber = $cm->id;
    }
} else {
    error('You must specify a course_module ID or an instance ID');
}

//Activity was sended before the applet was fully loaded
if (empty($vars)) {
    error('The applet has not sent correct data');
}

require_login($course, true, $cm);

// Print the page header
$strgeogebras = get_string('modulenameplural', 'geogebra');
$strgeogebra = get_string('modulename', 'geogebra');

$navlinks = array(
    array(
        'name' => $strgeogebras,
        'link' => $CFG->wwwroot . '/mod/geogebra/index.php?id=' . $course->id,
        'type' => 'activity'
    ),
    array(
        'name' => format_string($geogebra->name),
        'link' => '',
        'type' => 'activityinstance'
    )
);

$navigation = build_navigation($navlinks);

print_header_simple(
        format_string($geogebra->name), '', $navigation, '', '', true, update_module_button($cm->id, $course->id, $strgeogebra), navmenu($course, $cm)
);

print_tabs(array(
    array(
        new tabobject('view', $CFG->wwwroot . '/mod/geogebra/view.php?id=' . $cm->id, get_string('viewtab', 'geogebra')),
        new tabobject('grade', $CFG->wwwroot . '/mod/geogebra/grade.php?id=' . $cm->id, get_string('resultstab', 'geogebra')),
        new tabobject('review', '', get_string('reviewtab', 'geogebra'))
    )
        ), 'review');

$attempt = geogebra_get_unfinished_attempt($geogebra->id, $USER->id);

if ($geogebra->autograde == 0) {
//If geogebra is not autograding, change grade from 0 to undefined or get the one specified by the teacher
    $grade = '-1';
    if ($attempt){
        parse_str($attempt->vars, $attemptVars);
        $grade = $attemptVars['grade'];
    }
    $vars = http_build_query(array(
            'grade' => $grade,
            'duration' => $parsedVars['duration'],
            'attempts' => $parsedVars['attempts'],
            'state' => $parsedVars['state']
                ), '', '&');
    parse_str($vars, $parsedVars);
} else {
    $vars = http_build_query(array(
            'grade' => round($parsedVars['grade'], 2),
            'duration' => $parsedVars['duration'],
            'attempts' => $parsedVars['attempts'],
            'state' => $parsedVars['state']
                ), '', '&');
    parse_str($vars, $parsedVars);
}

if ($attempt) { //Exists an unfishined attempt
    if (!(geogebra_update_attempt($attempt->id, $vars, GEOGEBRA_UPDATE_STUDENT, $attempt->gradecomment, $f)))
        error(get_string('errorattempt', 'geogebra'));
} else {
    if (!(geogebra_add_attempt($geogebra->id, $USER->id, $vars, $f)))
        error(get_string('errorattempt', 'geogebra'));
}


if ($f) { //Show review information
    print_heading(get_string('review', 'geogebra') . ' ' . $geogebra->name);

    if ($geogebra->grade != GEOGEBRA_NO_GRADING) {
        // Print the main part of the page
        // Update Moodle Gradebook
        geogebra_update_grades($geogebra, $USER->id);

        //Print table
        if ($geogebra->grade > 0) {
            $max = '/' . $geogebra->grade;
        } else {
            $max = '';
        }
        $table->head = array(get_string('attempts', 'geogebra') . ($geogebra->maxattempts > 0 ? ' / ' . $geogebra->maxattempts : ''), get_string('duration', 'geogebra'), get_string('grade', 'geogebra') . $max);
        $table->align = array('center', 'center', 'center');
        $grade = $parsedVars['grade'];

        $table->data = array(array(
                htmlentities($parsedVars['attempts'], ENT_QUOTES, 'UTF-8'),
                htmlentities(geogebra_time2str($parsedVars['duration']), ENT_QUOTES, 'UTF-8'),
                ($grade == -1) ? get_string('ungraded', 'geogebra') : $grade
                ));

        print_table($table);
        $questionsNumber = isset($parsedVars['grades']) ? count($parsedVars['grades']) : 0;

        if ($questionsNumber > 0) {
            echo '<br/>';
            $table_detailed->head = array(get_string('description', 'geogebra'), get_string('grade', 'geogebra'), get_string('weight', 'geogebra'));
            $table_detailed->align = array('center', 'center', 'center');
            $table_detailed->data = array();

            for ($i = 0; $i < $questionsNumber; ++$i) {
                array_push($table_detailed->data, array(
                    htmlentities($parsedVars['descs'][$i], ENT_QUOTES, 'UTF-8'),
                    ($parsedVars['grade'][$i] * 10) . '%',
                    ($parsedVars['weights'][$i] * 100) . '%'
                ));
            }

            array_push($table_detailed->data, array(
                '<b>' . get_string('total', 'geogebra') . '</b>',
                '<b>' . $grade . '%</b>',
                ''
            ));

            print_table($table_detailed);
        }
    } else {
        // No grading; only attempts
        $table->head = array(get_string('attempts', 'geogebra'), get_string('duration', 'geogebra'));
        $table->align = array('center', 'center');
        $table->data = array(array(
                htmlentities($parsedVars['attempts'], ENT_QUOTES, 'UTF-8'),
                htmlentities(geogebra_time2str($parsedVars['duration']), ENT_QUOTES, 'UTF-8')
                ));
        print_table($table);
    }

    echo '<br>';
    print_continue($CFG->wwwroot . '/course/view.php?id=' . $course->id);
// Finish the page
    print_footer($course);
} else {
    echo '<div class="mod-geogebra-redirect">' . get_string("redirecttocourse", "geogebra") . '</div>';
    redirect($CFG->wwwroot . '/course/view.php?id=' . $course->id);
}
?>
