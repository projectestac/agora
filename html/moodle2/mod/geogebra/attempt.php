<?php

require_once('../../config.php');
require_once('lib.php');
require_once(dirname(__FILE__).'/locallib.php');

$id = optional_param('id', 0, PARAM_INT);  // course_module ID, or
$a = optional_param('n', 0, PARAM_INT);    // geogebra instance ID
$f = optional_param('f', 1, PARAM_INT);    // finished
$vars = optional_param('appletInformation', '', PARAM_RAW); // applet variables

if ($id) {
    $cm        = get_coursemodule_from_id('geogebra', $id, 0, false, MUST_EXIST);
    $course    = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $geogebra  = $DB->get_record('geogebra', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $geogebra  = $DB->get_record('geogebra', array('id' => $n), '*', MUST_EXIST);
    $course    = $DB->get_record('course', array('id' => $geogebra->course), '*', MUST_EXIST);
    $cm        = get_coursemodule_from_instance('geogebra', $geogebra->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}
$context = context_module::::instance($cm->id);

//Activity was sended before the applet was fully loaded
parse_str($vars, $parsedVars);
if (empty($vars)) {
    error('The applet has not sent correct data');
}

require_login($course, true, $cm);

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
        print_error(get_string('errorattempt', 'geogebra'));
} else {
    if (!(geogebra_add_attempt($geogebra->id, $USER->id, $vars, $f)))
        print_error(get_string('errorattempt', 'geogebra'));
}

// TODO: Show saved information message
//echo '<div class="mod-geogebra-redirect">' . get_string("redirecttocourse", "geogebra") . '</div>';
redirect(new moodle_url('view.php', array('id'=>$id)));
return;
