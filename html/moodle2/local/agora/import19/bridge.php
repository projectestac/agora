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

    $dbRecords = $DB->get_records_select('course_categories', '', null, 'DEPTH, ID', 'ID, NAME, PARENT, DEPTH');
    $categoryTree = agora_import19_buildCatTree($dbRecords, 0, 1);
    
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
    $content .= html_writer::tag('label', 'Trieu la categoria a on es restaurarà el curs', array('style' => 'font-weight:bold;'));
    $content .= html_writer::start_tag('form', array('method' => 'post', 'action' => $CFG->wwwroot . '/local/agora/import19/bridge.php'));
    $content .= html_writer::start_tag('ul', array('class' => 'import19categorylist', 'style' => 'list-style-type: none'));
    $content .= agora_import19_printCategoryData($categoryTree);
    $content .= html_writer::end_tag('ul');
    $content .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => 'step', 'value' => '2'));
    $content .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => 'importid', 'value' => $importcourseid));
    $content .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => 'contextid', 'value' => $contextid));
    $content .= html_writer::empty_tag('input', array('type' => 'submit', 'value' => get_string('continue')));
    $content .= html_writer::end_tag('form');
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
                      style="min-height:500px; width:100%; height:60%; border: 1px solid #CCC; seamless">
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

/**
 * Creates a tree data structure wich contains, only, category information. Iterates
 *  recursively.
 *
 * @author Toni Ginard (aginard@xtec.cat)
 * @param array $dbRecords Contains all the categories info from the data base
 * @param int $catID ID of the category where to start
 * @param int $depth Level of the category being processed. Avoids processing subcategories.
 *
 * @return array Tree with data (see description)
 */
function agora_import19_buildCatTree($dbRecords, $catID, $depth) {
    
   $catTree = array();
    
    // First pass to get categories whose parent is this category (aka subcategories)
    foreach ($dbRecords as $key => $record) {
        if ($record->parent == $catID) {
            $catTree[$record->id] = array('Id' => $record->id, 'Name' => $record->name, 'Subcategories' => array(), 'categorysize' => 0);
            // Effiency improvement: Once the category is added to the tree, it won't be added again
            unset($dbRecords[$key]);
        }
    }
    
    // Second pass for recursive call for all the categories in this category. The process
    //  can't be done in a single pass because we only have the full list of categories 
    //  of this depth once we have completed the first pass.
    foreach ($catTree as $cat) {
        foreach ($dbRecords as $record) {
            // Condition 1: next level of depth
            // Condition 2: the category must be under the current category
            if (($record->parent == $cat['Id'])) {
                $catTree[$cat['Id']]['Subcategories'] = agora_import19_buildCatTree($dbRecords, $cat['Id'], $depth + 1);
            }
        }
    }

    return $catTree;
}

/**
 * Transforms category tree in a string HTML-formatted to be sent to the browser.
 *  Builds a list with category information
 *
 * @author Toni Ginard (aginard@xtec.cat)
 * @param array $data Category tree
 *
 * @return string HTML code to be sent to the browser
 */
function agora_import19_printCategoryData($data, $padding = 0) {
    
    foreach ($data as $category) {

        // Build list content
        $content .= html_writer::start_tag('li', array('style' => 'padding: 5px;' . ' padding-left:' . $padding . 'px'));
        $content .= html_writer::empty_tag('input', array('type' => 'radio', 'name' => 'categoryid', 'value' =>$category['Id']));
        $content .= html_writer::tag('span', $category['Name']);
        $content .= html_writer::end_tag('li');

        // Recursive call for subcategories
        if (!empty($category['Subcategories'])) {
            $content .= agora_import19_printCategoryData($category['Subcategories'], $padding + 10);
        }
    }

    return $content;
}
