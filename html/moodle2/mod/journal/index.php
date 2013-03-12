<?php // $Id: index.php,v 1.2 2011/01/24 11:36:57 davmon Exp $

require_once("../../config.php");
require_once("lib.php");


$id = required_param('id', PARAM_INT);   // course

if (! $course = $DB->get_record("course", array("id" => $id))) {
    print_error("Course ID is incorrect");
}

require_course_login($course);


// Header
$strjournals = get_string("modulenameplural", "journal");
$PAGE->set_pagelayout('incourse');
$PAGE->set_url('/mod/journal/index.php', array('id' => $id));
$PAGE->navbar->add($strjournals);
$PAGE->set_title($strjournals);
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();
echo $OUTPUT->heading($strjournals);

if (! $journals = get_all_instances_in_course("journal", $course)) {
    notice(get_string('thereareno', 'moodle', get_string("modulenameplural", "journal")), "../../course/view.php?id=$course->id");
    die;
}

// Sections
$usesections = course_format_uses_sections($course->format);
if ($usesections) {
    $sections = get_all_sections($course->id);
}

$timenow = time();


// Table data
$table = new html_table();

$table->head = array();
$table->align = array();
if ($usesections) {
    $table->head[] = get_string('sectionname', 'format_'.$course->format);
    $table->align[] = 'center';
}

$table->head[] = get_string('name');
$table->align[] = 'left';
$table->head[] = get_string('description');
$table->align[] = 'left';

$currentsection = '';
$i = 0;
foreach ($journals as $journal) {

    $context = get_context_instance(CONTEXT_MODULE, $journal->coursemodule);
    $entriesmanager = has_capability('mod/journal:manageentries', $context);

    // Section
    $printsection = '';
    if ($journal->section !== $currentsection) {
        if ($journal->section) {
            $printsection = get_section_name($course, $sections[$journal->section]);
        }
        if ($currentsection !== '') {
            $table->data[$i] = 'hr';
            $i++;
        }
        $currentsection = $journal->section;
    }
    if ($usesections) {
        $table->data[$i][] = $printsection;
    }

    // Link
    if (!$journal->visible) {
        //Show dimmed if the mod is hidden
        $table->data[$i][] = "<a class=\"dimmed\" href=\"view.php?id=$journal->coursemodule\">".format_string($journal->name,true)."</a>";
    } else {
        //Show normal if the mod is visible
        $table->data[$i][] = "<a href=\"view.php?id=$journal->coursemodule\">".format_string($journal->name,true)."</a>";
    }

    // Description
    $table->data[$i][] = format_text($journal->intro,  $journal->introformat);

    // Entries info
    if ($entriesmanager) {

        // Display the report.php col only if is a entries manager in some CONTEXT_MODULE
        if (empty($managersomewhere)) {
            $table->head[] = get_string('viewentries', 'journal');
            $table->align[] = 'left';
            $managersomewhere = true;

            // Fill the previous col cells
            $manageentriescell = count($table->head) - 1;
            for ($j = 0; $j < $i; $j++) {
                if (is_array($table->data[$j])) {
                    $table->data[$j][$manageentriescell] = '';
                }
            }
        }

        $entrycount = journal_count_entries($journal, get_current_group($course->id));
        $table->data[$i][] = "<a href=\"report.php?id=$journal->coursemodule\">".get_string("viewallentries","journal", $entrycount)."</a>";
    } else if (!empty($managersomewhere)) {
        $table->data[$i][] = "";
    }

    $i++;
}

echo "<br />";

echo html_writer::table($table);

add_to_log($course->id, "journal", "view all", "index.php?id=$course->id", "");

echo $OUTPUT->footer();
