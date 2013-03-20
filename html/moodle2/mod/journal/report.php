<?php // $Id: report.php,v 1.3 2011/04/06 15:20:30 davmon Exp $

require_once("../../config.php");
require_once("lib.php");


$id = required_param('id', PARAM_INT);   // course module

if (! $cm = get_coursemodule_from_id('journal', $id)) {
    print_error("Course Module ID was incorrect");
}

if (! $course = $DB->get_record("course", array("id" => $cm->course))) {
    print_error("Course module is misconfigured");
}

require_login($course->id, false, $cm);

$context = get_context_instance(CONTEXT_MODULE, $cm->id);

require_capability('mod/journal:manageentries', $context);


if (! $journal = $DB->get_record("journal", array("id" => $cm->instance))) {
    print_error("Course module is incorrect");
}


// Header
$PAGE->set_url('/mod/journal/report.php', array('id'=>$id));

$PAGE->navbar->add(get_string("entries", "journal"));
$PAGE->set_title(get_string("modulenameplural", "journal"));
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string("entries", "journal"));


// make some easy ways to access the entries.
if ( $eee = $DB->get_records("journal_entries", array("journal" => $journal->id))) {
    foreach ($eee as $ee) {
        $entrybyuser[$ee->userid] = $ee;
        $entrybyentry[$ee->id]  = $ee;
    }

} else {
    $entrybyuser  = array () ;
    $entrybyentry = array () ;
}

// Group mode
$groupmode = groups_get_activity_groupmode($cm);
$currentgroup = groups_get_activity_group($cm, true);


/// Process incoming data if there is any
if ($data = data_submitted()) {

    $feedback = array();
    $data = (array)$data;

    // Peel out all the data from variable names.
    foreach ($data as $key => $val) {
        if ($key <> "id") {
            $type = substr($key,0,1);
            $num  = substr($key,1);
            $feedback[$num][$type] = $val;
        }
    }

    $timenow = time();
    $count = 0;
    foreach ($feedback as $num => $vals) {
        $entry = $entrybyentry[$num];
        // Only update entries where feedback has actually changed.
        if (($vals['r'] <> $entry->rating) || ($vals['c'] <> addslashes($entry->entrycomment))) {
            $newentry = new StdClass();
            $newentry->rating     = $vals['r'];
            $newentry->entrycomment    = $vals['c'];
            $newentry->teacher    = $USER->id;
            $newentry->timemarked = $timenow;
            $newentry->mailed     = 0;           // Make sure mail goes out (again, even)
            $newentry->id         = $num;
            if (!$DB->update_record("journal_entries", $newentry)) {
                notify("Failed to update the journal feedback for user $entry->userid");
            } else {
                $count++;
            }
            $entrybyuser[$entry->userid]->rating     = $vals['r'];
            $entrybyuser[$entry->userid]->entrycomment    = $vals['c'];
            $entrybyuser[$entry->userid]->teacher    = $USER->id;
            $entrybyuser[$entry->userid]->timemarked = $timenow;

            $journal = $DB->get_record("journal", array("id" => $entrybyuser[$entry->userid]->journal));
            $journal->cmidnumber = $cm->idnumber;

            journal_update_grades($journal, $entry->userid);
        }
    }
    add_to_log($course->id, "journal", "update feedback", "report.php?id=$cm->id", "$count users", $cm->id);
    notify(get_string("feedbackupdated", "journal", "$count"), "notifysuccess");

} else {
    add_to_log($course->id, "journal", "view responses", "report.php?id=$cm->id", "$journal->id", $cm->id);
}

/// Print out the journal entries

if ($currentgroup) {
    $groups = $currentgroup;
} else {
    $groups = '';
}
$users = get_users_by_capability($context, 'mod/journal:addentries', '', '', '', '', $groups);

if (!$users) {
	echo $OUTPUT->heading(get_string("nousersyet"));

} else {

    groups_print_activity_menu($cm, $CFG->wwwroot . "/mod/journal/report.php?id=$cm->id");

    $grades = make_grades_menu($journal->grade);
    if (!$teachers = get_users_by_capability($context, 'mod/journal:manageentries')) {
        print_error('noentriesmanagers', 'journal');
    }

    $allowedtograde = (groups_get_activity_groupmode($cm) != VISIBLEGROUPS OR groups_is_member($currentgroup));

    if ($allowedtograde) {
        echo '<form action="report.php" method="post">';
    }

    if ($usersdone = journal_get_users_done($journal, $currentgroup)) {
        foreach ($usersdone as $user) {
            journal_print_user_entry($course, $user, $entrybyuser[$user->id], $teachers, $grades);
            unset($users[$user->id]);
        }
    }

    foreach ($users as $user) {       // Remaining users
        journal_print_user_entry($course, $user, NULL, $teachers, $grades);
    }

    if ($allowedtograde) {
        echo "<p class=\"feedbacksave\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"$cm->id\" />";
        echo "<input type=\"submit\" value=\"".get_string("saveallfeedback", "journal")."\" />";
        echo "</p>";
        echo "</form>";
    }
}

echo $OUTPUT->footer();
