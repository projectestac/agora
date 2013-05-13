<?php

require_once('../../../config.php');

// The id of the course where importing FROM
$importcourseid = required_param('importid', PARAM_INT);

$contextid = required_param('contextid', PARAM_INT);
list($context, $course, $cm) = get_context_info_array($contextid);

// Whether to select category or to restore course
$step = optional_param('step', '1', PARAM_INT);

if ($step == '1') {

    global $DB;

    require_once('lib.php');

    $dbRecords = $DB->get_records_select('course_categories', '', null, 'DEPTH, ID', 'ID, NAME, PARENT, DEPTH');
    $categoryTree = agora_import19_buildCatTree($dbRecords, 0, 1);
    $courseCategoryTree = agora_import19_getCourseCategoryTree($importcourseid);
    
    require_login($course);

    require_capability('moodle/restore:restoretargetimport', $context);

    $heading = get_string('import', 'local_agora');

    // Set up the page
    $PAGE->set_title($heading);
    $PAGE->set_heading($heading);
    $PAGE->set_url(new moodle_url('/local/agora/import19/bridge.php', array('contextid'=>$contextid)));
    $PAGE->set_context($context);
    $PAGE->set_pagelayout('incourse');

    // Prepare the backup renderer
    $renderer = $PAGE->get_renderer('core','backup');
    
    echo $OUTPUT->header();
    echo $OUTPUT->heading('Selecció de categoria');

    $content = html_writer::start_tag('div', array('class' => 'import-category-selector', 'style' => 'margin:20px;'));

    $categoryData = agora_import19_printCategoryData($categoryTree, $courseCategoryTree);
    
    if (empty($categoryData)) {
        $content .= html_writer::tag('label', get_string('nocapabilitiesoncategories', 'local_agora'), array('style' => 'font-weight:bold;'));
        $content .= html_writer::start_tag('form', array('method' => 'post', 'action' => $_SERVER['HTTP_REFERER']));
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('input', array('type' => 'submit', 'value' => get_string('goback', 'local_agora')));
        $content .= html_writer::end_tag('form');
    } else {
        $content .= html_writer::tag('label', get_string('choosecategory', 'local_agora'), array('style' => 'font-weight:bold;'));
        $content .= html_writer::start_tag('form', array('method' => 'post', 'action' => $CFG->wwwroot . '/local/agora/import19/bridge.php'));
        $content .= html_writer::start_tag('ul', array('class' => 'import19categorylist', 'style' => 'list-style-type: none'));
        $content .= $categoryData;
        $content .= html_writer::end_tag('ul');
        $content .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => 'step', 'value' => '2'));
        $content .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => 'importid', 'value' => $importcourseid));
        $content .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => 'contextid', 'value' => $contextid));
        $content .= html_writer::empty_tag('input', array('type' => 'submit', 'value' => get_string('continue')));
        $content .= html_writer::end_tag('form');
    }
    $content .= html_writer::end_tag('div');

    echo $content;
    
    echo $OUTPUT->footer();
    
} elseif ($step == 2) {

    $categoryid = required_param('categoryid', PARAM_INT);

    // Require both the backup and restore libs
    require_once($CFG->dirroot . '/backup/util/includes/backup_includes.php');
    require_once($CFG->dirroot . '/backup/moodle2/backup_plan_builder.class.php');
    require_once($CFG->dirroot . '/backup/util/includes/restore_includes.php');
    require_once($CFG->dirroot . '/backup/util/ui/import_extensions.php');

    require_login($course);

    require_capability('moodle/restore:restoretargetimport', $context);

    $heading = get_string('import', 'local_agora');

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
    echo "<script type\"text/javascript\">
            function iframedone() {
                document.getElementById('backup_done').style.display = 'block';
                iframecontent = document.getElementById('import19frame').contentWindow.document.body.innerHTML;
                backupfilename = document.getElementById('import19frame').contentWindow.document.getElementById('backupname').innerHTML;
                document.getElementById('backupname').value = backupfilename;
            }
          </script>";

    $CFG->import19_backup_path = $CFG->wwwroot19.'/backup/backup_agora.php';
    if(isset($CFG->import19_backup_path) && !empty($CFG->import19_backup_path)){
        echo '<iframe id="import19frame" 
                      onload="iframedone();"; 
                      src="'.$CFG->import19_backup_path.'?courseid='.$importcourseid.'&categoryid='.$categoryid.'" 
                      style="min-height:300px; width:100%; height:30%; border: 1px solid #CCC; seamless">
              </iframe>';
    }

    echo html_writer::start_tag('form', array('id'=>'backup_done','method'=>'post', 'action'=>$CFG->wwwroot.'/local/agora/import19/restore.php','style'=>'display:none;'));
    echo html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'sesskey', 'value'=>sesskey()));
    echo html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'contextid', 'value'=>$contextid));
    echo html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'categoryid', 'value'=>$categoryid));
    echo html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'importid', 'value'=>$importcourseid));
    echo html_writer::empty_tag('input', array('type'=>'hidden', 'id'=>'backupname', 'name'=>'backupname', 'value'=>''));
    echo html_writer::empty_tag('input', array('type'=>'submit', 'value'=>get_string('continue')));
    echo html_writer::end_tag('form'); 

    echo $OUTPUT->footer();
}
