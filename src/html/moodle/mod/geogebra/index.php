<?php
require_once('../../config.php'); 
require_once('lib.php');

$id = required_param('id', PARAM_INT);		// course

if (($course = get_record('course', 'id', $id)) === false) {
	error('Course ID is incorrect');
}

require_course_login($course);
add_to_log($course->id, 'geogebra', 'view all', 'index.php?id=' . $course->id, '');

// Get all required strings geogebra
$strgeogebras = get_string('modulenameplural', 'geogebra');

// Print the header
$navlinks = array(
	array(
		'name' => $strgeogebras,
		'link' => '',
		'type' => 'activity'
	)
);

$navigation = build_navigation($navlinks);

print_header_simple(
	$strgeogebras,
	'',
	$navigation,
	'',
	'',
	true,
	'',
	navmenu($course)
);

// Get all the appropriate data

if (($geogebras = get_all_instances_in_course('geogebra', $course)) === false) {
	notice('There are no geogebras', '../../course/view.php?id=' . $course->id);
	die;
}

// Print the list of instances (your module will probably extend this)

$strname = get_string('name');
$table->data = array();

if ($course->format == 'weeks') {
	$table->head = array(get_string('week'), $strname);
	$table->align = array('center', 'left');
}
else if ($course->format == 'topics') {
	$table->head = array(get_string('topic'), $strname);
	$table->align = array('center', 'left', 'left', 'left');
}
else {
	$table->head = array($strname);
	$table->align = array('left', 'left', 'left');
}

foreach ($geogebras as $geogebra) {
	if (!$geogebra->visible) {
		//Show dimmed if the mod is hidden
		$link = '<a class="dimmed" href="' . $CFG->wwwroot . '/mod/geogebra/view.php?id=' . $geogebra->coursemodule . '">' . $geogebra->name . '</a>';
	}
	else {
		//Show normal if the mod is visible
		$link = '<a href="view.php?id=' . $geogebra->coursemodule . '">' . $geogebra->name . '</a>';
	}

	if ($course->format == 'weeks' || $course->format == 'topics') {
		array_push($table->data, array($geogebra->section, $link));
	}
	else {
		array_push($table->data, array($link));
	}
}

print_heading($strgeogebras);
print_table($table);

// Finish the page

print_footer($course);
?>