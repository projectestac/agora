<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
	require_once($CFG->dirroot . '/mod/rcontent/locallib.php');

	global $RCONTENT_WINDOW_OPTIONS; // make sure we have the pesky global

	$settings->add(new admin_setting_configselect('rcontent/whatgrade', get_string('whatgrade', 'rcontent'),
	    get_string('whatgradedesc', 'rcontent'), RCONTENT_HIGHESTATTEMPT, rcontent_get_what_grade_array()));

	$settings->add(new admin_setting_configtext('rcontent/framesize', get_string('framesize', 'rcontent'),
	    get_string('configframesize', 'rcontent'), 400, PARAM_INT));


	$woptions = array(0 => get_string('pagewindow', 'rcontent'), 1 => get_string('newwindow', 'rcontent'));
	$settings->add(new admin_setting_configselect('rcontent/popup', get_string('display', 'rcontent'),
	    get_string('configpopup', 'rcontent'), 0, $woptions));

	$settings->add(new admin_setting_configselect('rcontent/frametype', get_string('frametype', 'rcontent'),
	    get_string('frametypedesc', 'rcontent'), 2, rcontent_get_frame_type_array()));

	$checkedyesno = array('' => get_string('no'), 'checked' => get_string('yes')); // not nice at all

	foreach ($RCONTENT_WINDOW_OPTIONS as $optionname) {
	    $popupoption = "rcontent/popup$optionname";
	    if ($popupoption == 'rcontent/popupheight') {
	        $settings->add(new admin_setting_configtext($popupoption, get_string('newheight', 'rcontent'),
	            get_string('configpopupheight', 'rcontent'), 800, PARAM_INT));
	    } else if ($popupoption == 'rcontent/popupwidth') {
	        $settings->add(new admin_setting_configtext($popupoption, get_string('newwidth', 'rcontent'),
	            get_string('configpopupwidth', 'rcontent'), '600'));
	    } else {
	        $settings->add(new admin_setting_configselect($popupoption, get_string('new'.$optionname, 'rcontent'),
	            get_string('configpopup'.$optionname, 'rcontent'), 'checked', $checkedyesno));
	    }
	}

	$settings->add(new admin_setting_configselect('rcontent/tracer', get_string('tracer', 'rcontent'),
	            get_string('tracerdesc', 'rcontent'), '', $checkedyesno));

	//MARSUPIAL ********** AFEGIT -> New settings field to set the number of registers per page
	//2011.05.19 @mmartinez
	$settings->add(new admin_setting_configtext('rcontent/registersperreportpage', get_string('registersperreportpage', 'rcontent'),
	    get_string('registersperreportpageinfo', 'rcontent'), 20, PARAM_INT));
	//*********** FI

}