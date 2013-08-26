<?php

require_once('../../../config.php');
require_once('locallib.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->libdir.'/outputcomponents.php');

admin_externalpage_setup('toolreplacextec');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('title', 'tool_replacextec'), 2);

// Get form vars and set default values for when form is empty
$version = (isset($_POST['version'])) ? $_POST['version'] : '1';
$textOrig = (isset($_POST['textorig'])) ? $_POST['textorig'] : $CFG->wwwroot . '/';
$textTarg = (isset($_POST['texttarg'])) ? $_POST['texttarg'] : $CFG->wwwroot . '/historic/';
$action = (isset($_POST['action'])) ? $_POST['action'] : '';

echo $OUTPUT->box_start('generalbox');

if (is_siteadmin()) {
    if (empty($action)) { // Show form
        $content = html_writer::start_tag('div', array('style' => 'margin:20px;'));
        $content .= html_writer::start_tag('form', array('method' => 'post', 'action' => 'index.php'));
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::tag('label', get_string('origintext', 'tool_replacextec'), array('style' => ''));
        $content .= html_writer::empty_tag('input', array('type' => 'text', 'name' => 'textorig', 'size' => '50', 'value' => $textOrig));
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::tag('label', get_string('targettext', 'tool_replacextec'), array('style' => ''));
        $content .= html_writer::empty_tag('input', array('type' => 'text', 'name' => 'texttarg', 'size' => '50', 'value' => $textTarg));
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('input', array('type' => 'radio', 'name' => 'version', 'value' => 1, 'checked' => 'checked'));
        $content .= html_writer::tag('label', get_string('executemoodle19', 'tool_replacextec'), array('style' => ''));
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('input', array('type' => 'radio', 'name' => 'version', 'value' => 2));
        $content .= html_writer::tag('label', get_string('executemoodle2', 'tool_replacextec'), array('style' => ''));
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('input', array('type' => 'submit', 'value' => get_string('submit', 'moodle')));
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => 'action', 'value' => 'replace'));
        $content .= html_writer::end_tag('form');
        $content .= html_writer::end_tag('div');
        
        echo $content;
    } 
    elseif ($action == 'replace') { // Do the work
        echo html_writer::start_tag('div', array('style' => 'margin:20px;'));

        $prefix = ($version == '1') ? $agora['moodle']['prefix'] : $CFG->prefix;

        $result = replaceMoodle($version, $prefix, $textOrig, $textTarg);

        $content = html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('br');

        if ($result) {
            $content .= html_writer::tag('span', get_string('replacesuccess', 'tool_replacextec'), array('style' => 'font-weight:bold; color:green;'));
        } else {
            $content .= html_writer::tag('span', get_string('replacefail', 'tool_replacextec'), array('style' => 'font-weight:bold; color:red;'));
        }
        
        $content .= html_writer::empty_tag('br');
        $content .= html_writer::empty_tag('br');

        $content .= html_writer::start_tag('a', array('href' => 'index.php'));
        $content .= html_writer::tag('span', get_string('back', 'tool_replacextec'));
        $content .= html_writer::end_tag('a');

        $content .= html_writer::end_tag('div');
        echo $content;
    }
}

echo $OUTPUT->box_end();

echo $OUTPUT->footer();
