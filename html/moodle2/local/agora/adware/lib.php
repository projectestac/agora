<?php

function get_adware() {
	global $CFG, $DB;

	$adware = detect_adware('%script%cdncache%akamaihd%');

	if (!$adware) {
		return false;
	}

	$data = array();
	foreach ($adware->courses as $course) {
		$data[] = array('Curs', '<a href="'.$CFG->wwwroot.'/course/edit.php?id='.$course->id.'" target="_blank">'.$course->fullname.'</a>', '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$course->id.'" target="_blank">Curs '.$course->id.'</a>');
	}

	foreach ($adware->course_sections as $section) {
		$data[] = array('Secció', '<a href="'.$CFG->wwwroot.'/course/editsection.php?id='.$section->id.'" target="_blank">Secció '.$section->section.'</a>', '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$section->course.'" target="_blank">Curs '.$section->course.'</a>');
	}

	$modules = $DB->get_records_menu('modules', array(), '', 'id,name');
	foreach ($modules as $modulename) {
		if (isset($adware->$modulename)) {
			foreach ($adware->$modulename as $mod) {
				$data[] = array(get_string('modulename', $modulename), '<a href="'.$CFG->wwwroot.'/course/modedit.php?update='.$mod->cmid.'" target="_blank">'.$mod->name.'</a>', '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$mod->course.'" target="_blank">Curs '.$mod->course.'</a>');
			}
		}
	}
	return $data;
}

function detect_adware($search) {
	global $DB;

	$adware = new StdClass();

	$count = 0;

	$args = array('search' => $search);
	$courselike = $DB->sql_like('summary', ':search');
	$adware->courses = $DB->get_records_sql("SELECT id, fullname FROM {course} WHERE $courselike", $args);
	$count += count($adware->courses);

	$adware->course_sections = $DB->get_records_sql("SELECT id, section, course FROM {course_sections} WHERE $courselike", $args);
	$count += count($adware->course_sections);

	$modules = $DB->get_records_menu('modules', array(), '', 'id,name');
	$moduleintrolike = $DB->sql_like('m.intro', ':search');
	foreach ($modules as $moduleid => $modulename) {
		try {
			$adware->$modulename = $DB->get_records_sql("SELECT m.id, m.name, m.intro, m.course, cm.id as cmid FROM {".$modulename."} m, {course_modules} cm WHERE m.id = cm.instance AND cm.module = ".$moduleid." AND $moduleintrolike", $args);
			$count += count($adware->$modulename);
		} catch(Exception $e){
			//echo $OUTPUT->notification($modulename.' no té summary');
		}
	}

	if ($count <= 0) {
		set_config('adware_detected', 0, 'local_agora');
		return false;
	}
	set_config('adware_detected', $count, 'local_agora');

	return $adware;
}

function detect_adware_cron() {

	// Only detects once a week
	$last = get_config('local_agora', 'lastadware');
    $cronperiod = 7*24*60*60;
    if ($last + $cronperiod > time()) {
        return;
    }
    set_config('lastadware', time(), 'local_agora');

	$adware = detect_adware('%script%cdncache%akamaihd%');
	if ($adware) {
		mtrace('WARNING: Adware detected');
	}

	return;
}