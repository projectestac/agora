<?php

require_once('../../config.php');
require_once('lib.php');

$id = optional_param('id', 0, PARAM_INT);  // course_module ID, or
$a = optional_param('a', 0, PARAM_INT);   // geogebra instance ID

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

require_login($course, true, $cm);
add_to_log($course->id, 'geogebra', 'view', 'view.php?id=' . $cm->id, $geogebra->id);
$context = get_context_instance(CONTEXT_MODULE, $cm->id);

// Print the page header
$navlinks = array(
    array(
        'name' => get_string('modulenameplural', 'geogebra'),
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
        format_string($geogebra->name), '', $navigation, '', '', true, update_module_button($cm->id, $course->id, get_string('modulename', 'geogebra')), navmenu($course, $cm)
);

print_tabs(array(
    array(
        new tabobject('view', $CFG->wwwroot . '/mod/geogebra/view.php?id=' . $cm->id, get_string('viewtab', 'geogebra')),
        new tabobject('grade', $CFG->wwwroot . '/mod/geogebra/grade.php?id=' . $cm->id, get_string('resultstab', 'geogebra'))
    )
        ), 'view');

print_heading($geogebra->name);

//Any unfinished attempt?
$unfinishedattempt = geogebra_get_unfinished_attempt($geogebra->id, $USER->id);
if ($unfinishedattempt) {
    parse_str($unfinishedattempt->vars, $parsedVars);
    $parsedVars['finished'] = 0;
} else {
    $parsedVars = null;
}

// Max number of attemps reached?
$numattempts = geogebra_count_finished_attempts($geogebra->id, $USER->id);

$error = '';
if ($geogebra->maxattempts <= 0) {
    echo '<div class="mod-geogebra-attempts">' . get_string("unlimitedattempts", "geogebra");
} else {
    if ($geogebra->maxattempts <= $numattempts) {
        $error = get_string("nomoreattempts", "geogebra");
    } else if ($geogebra->maxattempts - $numattempts == 1) {
        echo '<div class="mod-geogebra-attempts">' . get_string("lastattemptremaining", "geogebra");
    } else {
        echo '<div class="mod-geogebra-attempts">' . get_string("attemptsremaining", "geogebra") . ($geogebra->maxattempts - $numattempts);
    }
}
if ($unfinishedattempt) {
    echo '<br>(' . get_string("resumeattempt", "geogebra") . ')';
}
echo '</div>';
if ($error) {
    notice($error, $CFG->wwwroot . '/course/view.php?id=' . $COURSE->id);
}

echo '<div class="mod-geogebra-intro">' . format_text($geogebra->intro, FORMAT_HTML) . '</div>';

// Is activity opened?
if ($geogebra->timeavailable && $geogebra->timeavailable > time()) {
    $error = get_string("activitynotopened", "geogebra");
} else if ($geogebra->timedue && $geogebra->timedue < time()) {
    $error = get_string("activityclosed", "geogebra");
}

if ($error) {
    geogebra_view_dates($geogebra);
    notice($error);
}

// Print the main part of the page
parse_str($geogebra->url, $attributes);
echo '<form id="geogebra_form" method="POST" >';
echo '<div style="text-align: center">';
geogebra_show_applet($geogebra, $attributes, $parsedVars);
echo '<input type="hidden" name="appletInformation" />';

if ($geogebra->showsubmit) {
    $pag1 = "'attempt.php?id=" . $id . "&a=" . $a . "&f=0" . "'";
    $pag2 = "'attempt.php?id=" . $id . "&a=" . $a . "&f=1" . "'";

    echo '<input type="submit" onclick = "this.form.action = ' . $pag1 . '" value="' . get_string('savewithoutsubmitting', 'geogebra') . '" />';
    echo '<input type="submit" onclick = "this.form.action = ' . "'attempt.php?id=" . $id . "&a=" . $a . "&f=1" . "'" . '" value="' . get_string('submitandfinish', 'geogebra') . '" />';
}
echo ' </form>';
echo '</div>';

geogebra_view_dates($geogebra);

// Finish the page
print_footer($course);
?>
