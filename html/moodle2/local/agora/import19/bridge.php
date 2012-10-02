<?php

// Require both the backup and restore libs
require_once('../../../config.php');
require_once($CFG->dirroot . '/backup/util/includes/backup_includes.php');
require_once($CFG->dirroot . '/backup/moodle2/backup_plan_builder.class.php');
require_once($CFG->dirroot . '/backup/util/includes/restore_includes.php');
require_once($CFG->dirroot . '/backup/util/ui/import_extensions.php');

$contextid = required_param('contextid', PARAM_INT);
list($context, $course, $cm) = get_context_info_array($contextid);

// The id of the course we are importing FROM (will only be set if past first stage
$importcourseid = required_param('importid', PARAM_INT);

// Must pass login
require_login($course);
// Must hold restoretargetimport in the current course
require_capability('moodle/restore:restoretargetimport', $context);

$heading = get_string('import');

// Set up the page
$PAGE->set_title($heading);
$PAGE->set_heading($heading);
$PAGE->set_url(new moodle_url('/local/agora/import19/bridge.php', array('contextid'=>$contextid)));
$PAGE->set_context($context);
$PAGE->set_pagelayout('incourse');

// Prepare the backup renderer
$renderer = $PAGE->get_renderer('core','backup');

// Display the current stage
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('import19','local_agora'),2);
echo "<script type\"text/javascript\">function iframedone(){
		document.getElementById('backup_done').style.display = 'block';
                iframecontent = document.getElementById('import19frame').contentWindow.document.body.innerHTML;
                backupfilename = document.getElementById('import19frame').contentWindow.document.getElementById('backupname').innerHTML;
                document.getElementById('backupname').value = backupfilename;
	}</script>";

$CFG->import19_backup_path = $CFG->wwwroot19.'/backup/backup_agora.php';
if(isset($CFG->import19_backup_path) && !empty($CFG->import19_backup_path)){
	echo '<iframe id="import19frame" onload="iframedone();"; src="'.$CFG->import19_backup_path.'?id='.$importcourseid.'" style=" min-height:500px; width:100%; height:100%; border: 1px solid #CCC;"></iframe>';
}

echo html_writer::start_tag('form', array('id'=>'backup_done','method'=>'post', 'action'=>$CFG->wwwroot.'/local/agora/import19/restore.php','style'=>'display:none;'));
echo html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'sesskey', 'value'=>sesskey()));
echo html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'contextid', 'value'=>$contextid));
echo html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'importid', 'value'=>$importcourseid));
echo html_writer::empty_tag('input', array('type'=>'hidden', 'id'=>'backupname', 'name'=>'backupname', 'value'=>''));
echo html_writer::empty_tag('input', array('type'=>'submit', 'value'=>get_string('continue')));
echo html_writer::end_tag('form'); 

echo $OUTPUT->footer();
