<?php
require_once('../../config.php');

require_once($CFG->libdir.'/adminlib.php');

set_time_limit(0);

admin_externalpage_setup('agora_adware');

echo $OUTPUT->header();
echo $OUTPUT->heading('Detecta Adware');

$data = array();

$args = array('search' => '%script%cdncache%akamaihd%');

$courselike = $DB->sql_like('summary', ':search');
$courses = $DB->get_records_sql("SELECT id, fullname FROM {course} WHERE $courselike", $args);
foreach($courses as $course){
	$data[] = array('Curs', '<a href="'.$CFG->wwwroot.'/course/edit.php?id='.$course->id.'" target="_blank">'.$course->fullname.'</a>');
}

$modules = $DB->get_records_menu('modules',array(),'','id,name');
$moduleintrolike = $DB->sql_like('m.intro', ':search');
$modulesummarylike = $DB->sql_like('m.summary', ':search');
foreach($modules as $moduleid => $modulename) {
	$mods = array();
	try {
		$mods = $DB->get_records_sql("SELECT m.id, m.name, m.intro, m.course, cm.id as cmid FROM {".$modulename."} m, {course_modules} cm WHERE m.id = cm.instance AND cm.module = ".$moduleid." AND $moduleintrolike", $args);
	} catch(Exception $e){
		try {
			$mods = $DB->get_records_sql("SELECT m.id, m.name, m.summary, m.course, cm.id as cmid FROM {".$modulename."} m, {course_modules} cm WHERE m.id = cm.instance AND cm.module = ".$moduleid." AND $modulesummarylike", $args);
		} catch(Exception $e){
			//echo $OUTPUT->notification($modulename.' no té intro ni summary');
		}
	}
	foreach($mods as $mod){
		$data[] = array(get_string('modulename',$modulename), '<a href="'.$CFG->wwwroot.'/course/modedit.php?update='.$mod->cmid.'" target="_blank">'.$mod->name.'</a>');
	}
}



if(!empty($data)){
	echo $OUTPUT->notification('S\'han trobat '.count($data). ' cadenes');
	$table = new html_table();
	$table->align = array('left','left');
	$table->head = array('Tipus', 'URL');
	$table->data = $data;
	echo html_writer::table($table);
} else {
	echo $OUTPUT->notification('No s\'ha trobat malware! :-)','notifysuccess');
}

echo $OUTPUT->footer();
