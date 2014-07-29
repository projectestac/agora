<?php

require_once('../../config.php');
require_once($CFG->libdir.'/tablelib.php');

$context = context_system::instance();
require_login();
require_capability('moodle/site:config', $context);

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('report');

$page = optional_param('page', 0, PARAM_INT);
$module = optional_param('module', false, PARAM_TEXT);
$course = optional_param('course', false, PARAM_TEXT);

$perpage = 10;

$params = array('page'=>$page);
if($module)	$params['module'] = $module;
if($course)	$params['course'] = $course;
$baseurl = new moodle_url('/local/rcommon/log.php', $params);
$PAGE->set_url($baseurl);

$PAGE->set_title('Rcommon Log');
$PAGE->set_heading('Rcommon Log');
echo $OUTPUT->header();
echo $OUTPUT->heading('Rcommon Log');

$record_filter = array();
if($module)	$record_filter['module'] = $module;
if($course)	$record_filter['course'] = $course;

$module_options = $DB->get_records_menu('rcommon_errors_log', null, 'module','DISTINCT module, module as value');
if(!isset($module_options[$module])) unset($record_filter['module']);
echo 'Module: '.$OUTPUT->single_select($baseurl, 'module', $module_options, $module).'<br/>';

$course_options = $DB->get_records_menu('rcommon_errors_log', null, 'course','DISTINCT course, course as value');
if(!isset($course_options[$course])) unset($record_filter['course']);
if(isset($course_options[0])) $course_options[0] = '-';
echo 'Course: '.$OUTPUT->single_select($baseurl, 'course', $course_options, $course).'<br/>';

//Pages
$num_records = $DB->count_records('rcommon_errors_log', $record_filter);
echo $OUTPUT->paging_bar($num_records, $page, $perpage, $baseurl);

if($num_records > 0) {
	//Table with report contents
	$table = new html_table();
	$table->class = 'generaltable generalbox';

	$table->head = array('Module', 'Course', 'Userid', 'IP', 'Action', 'Info', 'Time');
	$table->align = array('center', 'center', 'center', 'center', 'left', 'left', 'left');

	//Get reports
	$limitfrom = $page * $perpage;
	$limitnum = $perpage;
	$reports = $DB->get_records("rcommon_errors_log", $record_filter, "time desc", "*", $limitfrom, $limitnum);
	foreach ($reports as $report){
		$reportmodule = $report->cmid ? '<a href="'.$CFG->wwwroot.'/mod/'.$report->module.'/view.php?id='.$report->cmid.'">'.$report->module.' ('.$report->cmid.')</a>' : $report->module;
	    $row = array(
	    			$reportmodule,
				 	$report->course ? '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$report->course.'">'.$report->course.'</a>' : '-',
				 	$report->userid ? '<a href="'.$CFG->wwwroot.'/user/profile.php?id='.$report->userid.'">'.$report->userid.'</a>' : '-',
				 	$report->ip,
				 	empty($report->url) ? $report->action : '<a href="'.$report->url.'">'.$report->action.'</a>',
				 	$report->info,
				 	date( "Y-m-d\TH:i:s", $report->time)
				 );
	    $table->data[] = $row;
	}

	echo html_writer::table($table);

	echo $OUTPUT->paging_bar($num_records, $page, $perpage, $baseurl);
}
echo $OUTPUT->footer();
