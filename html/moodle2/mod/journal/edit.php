<?php // $Id: edit.php,v 1.2 2011/01/24 11:36:57 davmon Exp $

require_once("../../config.php");
require_once('./edit_form.php');

$id = required_param('id', PARAM_INT);    // Course Module ID

if (!$cm = get_coursemodule_from_id('journal', $id)) {
    print_error("Course Module ID was incorrect");
}

if (!$course = $DB->get_record("course", array("id" => $cm->course))) {
    print_error("Course is misconfigured");
}

$context = get_context_instance(CONTEXT_MODULE, $cm->id);

require_login($course->id, false, $cm);

require_capability('mod/journal:addentries', $context);

if (! $journal = $DB->get_record("journal", array("id" => $cm->instance))) {
    print_error("Course module is incorrect");
}


// Header
$PAGE->set_url('/mod/journal/edit.php', array('id' => $id));
$PAGE->navbar->add(get_string('edit'));
$PAGE->set_title(format_string($journal->name));
$PAGE->set_heading($course->fullname);

$data = new StdClass();

$entry = $DB->get_record("journal_entries", array("userid" => $USER->id, "journal" => $journal->id));
if ($entry) {

    $data->text["text"] = $entry->text;
    if (can_use_html_editor()) {
        $data->text["format"] = FORMAT_HTML;
    } else {
        $data->text["format"] = FORMAT_MOODLE;
    }
}

$data->id = $cm->id;
$form = new mod_journal_entry_form(null, array('current' => $data));

/// If data submitted, then process and store.
if ($fromform = $form->get_data()) {

    $timenow = time();

    // Common
    $newentry = new StdClass();
    $newentry->text = $fromform->text["text"];
    $newentry->format = $fromform->text["format"];
    $newentry->modified = $timenow;

    if ($entry) {
        $newentry->id = $entry->id;
        if (!$DB->update_record("journal_entries", $newentry)) {
            print_error("Could not update your journal");
        }
        $logaction = "update entry";

    } else {
        $newentry->userid = $USER->id;
        $newentry->journal = $journal->id;
        if (!$newentry->id = $DB->insert_record("journal_entries", $newentry)) {
            print_error("Could not insert a new journal entry");
        }
        $logaction = "add entry";
    }

    add_to_log($course->id, "journal", $logaction, 'view.php?id='.$cm->id, $newentry->id, $cm->id);

    redirect('view.php?id='.$cm->id);
    die;
}


echo $OUTPUT->header();
echo $OUTPUT->heading(format_string($journal->name));

$intro = format_module_intro('journal', $journal, $cm->id);
echo $OUTPUT->box($intro);

/// Otherwise fill and print the form.
$form->display();

echo $OUTPUT->footer();
