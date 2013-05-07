<?php

// Require both the backup and restore libs
require_once('../../../config.php');

require_once('lib.php');

$contextid = required_param('contextid', PARAM_INT);
list($context, $course, $cm) = get_context_info_array($contextid);

$filename = required_param('backupname', PARAM_TEXT);
$categoryid = required_param('categoryid', PARAM_INT);

require_login($course);

require_capability('moodle/restore:restoretargetimport', $context);

$heading = get_string('import');

// Set up the page
$PAGE->set_title($heading);
$PAGE->set_heading($heading);
$PAGE->set_url(new moodle_url('/local/agora/import19/restore.php', array('contextid'=>$contextid)));
$PAGE->set_context($context);
$PAGE->set_pagelayout('incourse');

// Prepare the backup renderer
$renderer = $PAGE->get_renderer('core','backup');

// Display the current stage
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('import19','local_agora'),2);

import19_restore($filename, false, $categoryid);

echo $OUTPUT->footer();
