<?php

function bigdata_export() {
	global $DB, $CFG;

	$courses = get_config('local_bigdata', 'courses');
	if (empty($courses)) {
		$courses = $DB->get_fieldset_select('course', 'id', '1=1 ORDER BY id');
	} else {
		$courses = explode(',', $courses);
	}

	$roles = get_config('local_bigdata', 'roles');
	if (empty($roles)) {
		$roles = array_keys(get_all_roles());
	} else {
		$roles = explode(',', $roles);
	}

	require_once($CFG->dirroot.'/local/bigdata/locallib.php');

	$bigdata = new bigdata($CFG->dataroot.'/bigdata.txt', 'escola', $roles);
	$success = true;
	foreach ($courses as $course) {
		try {
			$success = $success && $bigdata->export_course($course);
		} catch (Exception $e) {
			echo $e->getMessage();
			throw $e;
			$success = false;
		}
	}
	return $success;
}

function bigdata_is_enabled() {
	return (boolean) get_config('local_bigdata', 'enabled');
}
