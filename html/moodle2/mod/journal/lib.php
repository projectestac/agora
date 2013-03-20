<?php // $Id: lib.php,v 1.5.2.1 2011/07/19 10:53:40 davmon Exp $


// STANDARD MODULE FUNCTIONS /////////////////////////////////////////////////////////

function journal_add_instance($journal) {
// Given an object containing all the necessary data,
// (defined by the form in mod.html) this function
// will create a new instance and return the id number
// of the new instance.

    global $DB;

    $journal->timemodified = time();
    $journal->id = $DB->insert_record("journal", $journal);

    journal_grade_item_update($journal);

    return $journal->id;
}


function journal_update_instance($journal) {
// Given an object containing all the necessary data,
// (defined by the form in mod.html) this function
// will update an existing instance with new data.

    global $DB;

    $journal->timemodified = time();
    $journal->id = $journal->instance;

    $result = $DB->update_record("journal", $journal);

    journal_grade_item_update($journal);

    journal_update_grades($journal, 0, false);

    return $result;
}


function journal_delete_instance($id) {
// Given an ID of an instance of this module,
// this function will permanently delete the instance
// and any data that depends on it.

    global $DB;

    $result = true;

    if (! $journal = $DB->get_record("journal", array("id" => $id))) {
        return false;
    }

    if (! $DB->delete_records("journal_entries", array("journal" => $journal->id))) {
        $result = false;
    }

    if (! $DB->delete_records("journal", array("id" => $journal->id))) {
        $result = false;
    }

    return $result;
}


function journal_supports($feature) {
    switch($feature) {
        case FEATURE_MOD_INTRO:               return true;
        case FEATURE_GRADE_HAS_GRADE:         return true;
        case FEATURE_GRADE_OUTCOMES:          return false;
        case FEATURE_RATE:                    return false;
        case FEATURE_GROUPS:                  return true;
        case FEATURE_GROUPINGS:               return true;
        case FEATURE_GROUPMEMBERSONLY:        return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS: return false;
        case FEATURE_BACKUP_MOODLE2:          return true;

        default: return null;
    }
}


function journal_get_view_actions() {
    return array('view','view all','view responses');
}


function journal_get_post_actions() {
    return array('add entry','update entry','update feedback');
}


function journal_user_outline($course, $user, $mod, $journal) {

    global $DB;

    if ($entry = $DB->get_record("journal_entries", array("userid" => $user->id, "journal" => $journal->id))) {

        $numwords = count(preg_split("/\w\b/", $entry->text)) - 1;

        $result->info = get_string("numwords", "", $numwords);
        $result->time = $entry->modified;
        return $result;
    }
    return NULL;
}


function journal_user_complete($course, $user, $mod, $journal) {

    global $DB, $OUTPUT;

    if ($entry = $DB->get_record("journal_entries", array("userid" => $user->id, "journal" => $journal->id))) {

        echo $OUTPUT->box_start();

        if ($entry->modified) {
            echo "<p><font size=\"1\">".get_string("lastedited").": ".userdate($entry->modified)."</font></p>";
        }
        if ($entry->text) {
            echo format_text($entry->text, $entry->format);
        }
        if ($entry->teacher) {
            $grades = make_grades_menu($journal->grade);
            journal_print_feedback($course, $entry, $grades);
        }

        echo $OUTPUT->box_end();

    } else {
        print_string("noentry", "journal");
    }
}


function journal_cron () {
// Function to be run periodically according to the moodle cron
// Finds all journal notifications that have yet to be mailed out, and mails them

    global $CFG, $USER, $DB;

    $cutofftime = time() - $CFG->maxeditingtime;

    if ($entries = journal_get_unmailed_graded($cutofftime)) {
        $timenow = time();

        foreach ($entries as $entry) {

            echo "Processing journal entry $entry->id\n";

            if (! $user = $DB->get_record("user", array("id" => $entry->userid))) {
                echo "Could not find user $entry->userid\n";
                continue;
            }

            $USER->lang = $user->lang;

            if (! $course = $DB->get_record("course", array("id" => $entry->course))) {
                echo "Could not find course $entry->course\n";
                continue;
            }

            if (! $teacher = $DB->get_record("user", array("id" => $entry->teacher))) {
                echo "Could not find teacher $entry->teacher\n";
                continue;
            }


            if (! $mod = get_coursemodule_from_instance("journal", $entry->journal, $course->id)) {
                echo "Could not find course module for journal id $entry->journal\n";
                continue;
            }

            $context = get_context_instance(CONTEXT_MODULE, $mod->id);
            $canadd = has_capability('mod/journal:addentries', $context, $user);
            $entriesmanager = has_capability('mod/journal:manageentries', $context, $user);

            if (!$canadd and $entriesmanager) {
                continue;  // Not an active participant
            }

            unset($journalinfo);
            $journalinfo->teacher = fullname($teacher);
            $journalinfo->journal = format_string($entry->name,true);
            $journalinfo->url = "$CFG->wwwroot/mod/journal/view.php?id=$mod->id";
            $modnamepl = get_string( 'modulenameplural','journal' );
            $msubject = get_string( 'mailsubject','journal' );

            $postsubject = "$course->shortname: $msubject: ".format_string($entry->name,true);
            $posttext  = "$course->shortname -> $modnamepl -> ".format_string($entry->name,true)."\n";
            $posttext .= "---------------------------------------------------------------------\n";
            $posttext .= get_string("journalmail", "journal", $journalinfo)."\n";
            $posttext .= "---------------------------------------------------------------------\n";
            if ($user->mailformat == 1) {  // HTML
                $posthtml = "<p><font face=\"sans-serif\">".
                "<a href=\"$CFG->wwwroot/course/view.php?id=$course->id\">$course->shortname</a> ->".
                "<a href=\"$CFG->wwwroot/mod/journal/index.php?id=$course->id\">journals</a> ->".
                "<a href=\"$CFG->wwwroot/mod/journal/view.php?id=$mod->id\">".format_string($entry->name,true)."</a></font></p>";
                $posthtml .= "<hr /><font face=\"sans-serif\">";
                $posthtml .= "<p>".get_string("journalmailhtml", "journal", $journalinfo)."</p>";
                $posthtml .= "</font><hr />";
            } else {
              $posthtml = "";
            }

            if (! email_to_user($user, $teacher, $postsubject, $posttext, $posthtml)) {
                echo "Error: Journal cron: Could not send out mail for id $entry->id to user $user->id ($user->email)\n";
            }
            if (!$DB->set_field("journal_entries", "mailed", "1", array("id" => $entry->id))) {
                echo "Could not update the mailed field for id $entry->id\n";
            }
        }
    }

    return true;
}

function journal_print_recent_activity($course, $isteacher, $timestart) {
    global $CFG, $DB, $OUTPUT;

    if (!get_config('journal', 'showrecentactivity')) {
        return false;
    }

    $content = false;
    $journals = NULL;

    // log table should not be used here

    $select = "time > ? AND
               course = ? AND
               module = 'journal' AND
               (action = 'add entry' OR action = 'update entry')";
    if (!$logs = $DB->get_records_select('log', $select, array($timestart, $course->id), 'time ASC')){
        return false;
    }

    $modinfo = & get_fast_modinfo($course);
    foreach ($logs as $log) {
        ///Get journal info.  I'll need it later
        $j_log_info = journal_log_info($log);

        $cm = $modinfo->instances['journal'][$j_log_info->id];
        if (!$cm->uservisible) {
            continue;
        }

        if (!isset($journals[$log->info])) {
            $journals[$log->info] = $j_log_info;
            $journals[$log->info]->time = $log->time;
            $journals[$log->info]->url = str_replace('&', '&amp;', $log->url);
        }
    }

    if ($journals) {
        $content = true;
        echo $OUTPUT->heading(get_string('newjournalentries', 'journal').':', 3);
        foreach ($journals as $journal) {
            print_recent_activity_note($journal->time, $journal, $journal->name,
                                       $CFG->wwwroot.'/mod/journal/'.$journal->url);
        }
    }

    return $content;
}

function journal_get_participants($journalid) {
//Returns the users with data in one journal
//(users with records in journal_entries, students and teachers)

    global $DB;

    //Get students
    $students = $DB->get_records_sql("SELECT DISTINCT u.id
                                      FROM {user} u,
                                      {journal_entries} j
                                      WHERE j.journal = '$journalid' and
                                      u.id = j.userid");
    //Get teachers
    $teachers = $DB->get_records_sql("SELECT DISTINCT u.id
                                      FROM {user} u,
                                      {journal_entries} j
                                      WHERE j.journal = '$journalid' and
                                      u.id = j.teacher");

    //Add teachers to students
    if ($teachers) {
        foreach ($teachers as $teacher) {
            $students[$teacher->id] = $teacher;
        }
    }
    //Return students array (it contains an array of unique users)
    return ($students);
}

function journal_scale_used ($journalid,$scaleid) {
//This function returns if a scale is being used by one journal
    global $DB;
    $return = false;

    $rec = $DB->get_record("journal", array("id" => $journalid, "grade" => -$scaleid));

    if (!empty($rec) && !empty($scaleid)) {
        $return = true;
    }

    return $return;
}

/**
 * Checks if scale is being used by any instance of journal
 *
 * This is used to find out if scale used anywhere
 * @param $scaleid int
 * @return boolean True if the scale is used by any journal
 */
function journal_scale_used_anywhere($scaleid) {
    global $DB;

    if ($scaleid and $DB->get_records('journal', array('grade' => -$scaleid))) {
        return true;
    } else {
        return false;
    }
}

/**
 * Implementation of the function for printing the form elements that control
 * whether the course reset functionality affects the journal.
 *
 * @param object $mform form passed by reference
 */
function journal_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'journalheader', get_string('modulenameplural', 'journal'));
    $mform->addElement('advcheckbox', 'reset_journal', get_string('removemessages','journal'));
}

/**
 * Course reset form defaults.
 *
 * @param object $course
 * @return array
 */
function journal_reset_course_form_defaults($course) {
    return array('reset_journal'=>1);
}

/**
 * Removes all entries
 *
 * @param object $data
 */
function journal_reset_userdata($data) {

    global $CFG, $DB;

    $status = array();
    if (!empty($data->reset_journal)) {

        $sql = "SELECT j.id
                FROM {journal} j
                WHERE j.course = ?";
        $params = array($data->courseid);

        $DB->delete_records_select('journal_entries', "journal IN ($sql)", $params);

        $status[] = array('component' => get_string('modulenameplural', 'journal'),
                          'item' => get_string('removeentries', 'journal'),
                          'error' => false);
    }

    return $status;
}

function journal_print_overview($courses, &$htmlarray) {

    global $USER, $CFG, $DB;

    if (!get_config('journal', 'overview')) {
        return array();
    }

    if (empty($courses) || !is_array($courses) || count($courses) == 0) {
        return array();
    }

    if (!$journals = get_all_instances_in_courses('journal', $courses)) {
        return array();
    }

    $strjournal = get_string('modulename', 'journal');

    $timenow = time();
    foreach ($journals as $journal) {

        $courses[$journal->course]->format = $DB->get_field('course', 'format', array('id' => $journal->course));

        if ($courses[$journal->course]->format == 'weeks' AND $journal->days) {

            $coursestartdate = $courses[$journal->course]->startdate;

            $journal->timestart  = $coursestartdate + (($journal->section - 1) * 608400);
            if (!empty($journal->days)) {
                $journal->timefinish = $journal->timestart + (3600 * 24 * $journal->days);
            } else {
                $journal->timefinish = 9999999999;
            }
            $journalopen = ($journal->timestart < $timenow && $timenow < $journal->timefinish);

        } else {
            $journalopen = true;
        }

        if ($journalopen) {
            $str = '<div class="journal overview"><div class="name">'.
                   $strjournal.': <a '.($journal->visible?'':' class="dimmed"').
                   ' href="'.$CFG->wwwroot.'/mod/journal/view.php?id='.$journal->coursemodule.'">'.
                   $journal->name.'</a></div></div>';

            if (empty($htmlarray[$journal->course]['journal'])) {
                $htmlarray[$journal->course]['journal'] = $str;
            } else {
                $htmlarray[$journal->course]['journal'] .= $str;
            }
        }
    }
}

function journal_get_user_grades($journal, $userid=0) {

    global $DB;

    if ($userid) {
        $userstr = 'AND userid = '.$userid;
    } else {
        $userstr = '';
    }

    if (!$journal) {
        return false;

    } else {

        $sql = "SELECT userid, modified as datesubmitted, format as feedbackformat,
                rating as rawgrade, entrycomment as feedback, teacher as usermodifier, timemarked as dategraded
                FROM {journal_entries}
                WHERE journal = '$journal->id' ".$userstr;

        $grades = $DB->get_records_sql($sql);

        if ($grades) {
            foreach ($grades as $key=>$grade) {
                $grades[$key]->id = $grade->userid;
            }
        } else {
            return false;
        }

        return $grades;
    }

}


/**
 * Update journal grades in 1.9 gradebook
 *
 * @param object   $journal      if is null, all journals
 * @param int      $userid       if is false al users
 * @param boolean  $nullifnone   return null if grade does not exist
 */
function journal_update_grades($journal=null, $userid=0, $nullifnone=true) {

    global $CFG, $DB;

    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
        require_once($CFG->libdir.'/gradelib.php');
    }

    if ($journal != null) {
        if ($grades = journal_get_user_grades($journal, $userid)) {
            journal_grade_item_update($journal, $grades);
        } else if ($userid && $nullifnone) {
            $grade = new object();
            $grade->userid   = $userid;
            $grade->rawgrade = NULL;
            journal_grade_item_update($journal, $grade);
        } else {
            journal_grade_item_update($journal);
        }
    } else {
        $sql = "SELECT j.*, cm.idnumber as cmidnumber
                FROM {course_modules} cm
                JOIN {modules} m ON m.id = cm.module
                JOIN {journal} j ON cm.instance = j.id
                WHERE m.name = 'journal'";
        if ($recordset = $DB->get_records_sql($sql)) {
           foreach ($recordset as $journal) {
                if ($journal->grade != false) {
                    journal_update_grades($journal);
                } else {
                    journal_grade_item_update($journal);
                }
            }
        }
    }
}


/**
 * Create grade item for given journal
 *
 * @param object $journal object with extra cmidnumber
 * @param mixed optional array/object of grade(s); 'reset' means reset grades in gradebook
 * @return int 0 if ok, error code otherwise
 */
function journal_grade_item_update($journal, $grades=NULL) {
    global $CFG;
    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
        require_once($CFG->libdir.'/gradelib.php');
    }

    if (array_key_exists('cmidnumber', $journal)) {
        $params = array('itemname'=>$journal->name, 'idnumber'=>$journal->cmidnumber);
    } else {
        $params = array('itemname'=>$journal->name);
    }

    if ($journal->grade > 0) {
        $params['gradetype']  = GRADE_TYPE_VALUE;
        $params['grademax']   = $journal->grade;
        $params['grademin']   = 0;
        $params['multfactor'] = 1.0;

    } else if($journal->grade < 0) {
        $params['gradetype'] = GRADE_TYPE_SCALE;
        $params['scaleid']   = -$journal->grade;

    } else {
        $params['gradetype']  = GRADE_TYPE_NONE;
        $params['multfactor'] = 1.0;
    }

    if ($grades  === 'reset') {
        $params['reset'] = true;
        $grades = NULL;
    }

    return grade_update('mod/journal', $journal->course, 'mod', 'journal', $journal->id, 0, $grades, $params);
}


/**
 * Delete grade item for given journal
 *
 * @param   object   $journal
 * @return  object   grade_item
 */
function journal_grade_item_delete($journal) {
    global $CFG;

    require_once($CFG->libdir.'/gradelib.php');

    return grade_update('mod/journal', $journal->course, 'mod', 'journal', $journal->id, 0, NULL, array('deleted'=>1));
}


// SQL FUNCTIONS ///////////////////////////////////////////////////////////////////

function journal_get_users_done($journal, $currentgroup) {
    global $DB;


    $sql = "SELECT u.* FROM {journal_entries} j
            JOIN {user} u ON j.userid = u.id ";

    // Group users
    if ($currentgroup != 0) {
        $sql.= "JOIN {groups_members} gm ON gm.userid = u.id AND gm.groupid = '$currentgroup'";
    }

    $sql.= " WHERE j.journal = '$journal->id' ORDER BY j.modified DESC";
    $journals = $DB->get_records_sql($sql);

    $cm = journal_get_coursemodule($journal->id);
    if (!$journals || !$cm) {
        return NULL;
    }

    // remove unenrolled participants
    foreach ($journals as $key => $user) {

        $context = get_context_instance(CONTEXT_MODULE, $cm->id);

        $canadd = has_capability('mod/journal:addentries', $context, $user);
        $entriesmanager = has_capability('mod/journal:manageentries', $context, $user);

        if (!$entriesmanager and !$canadd) {
            unset($journals[$key]);
        }
    }

    return $journals;
}

function journal_count_entries($journal, $groupid = 0) {
/// Counts all the journal entries (optionally in a given group)

    global $DB;

    $cm = journal_get_coursemodule($journal->id);
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);

    if ($groupid) {     /// How many in a particular group?

        $sql = "SELECT DISTINCT u.id FROM {journal_entries} j
                JOIN {groups_members} g ON g.userid = j.userid
                JOIN {user} u ON u.id = g.userid
                WHERE j.journal = $journal->id AND g.groupid = '$groupid'";
        $journals = $DB->get_records_sql($sql);

    } else { /// Count all the entries from the whole course

        $sql = "SELECT DISTINCT u.id FROM {journal_entries} j
                JOIN {user} u ON u.id = j.userid
                WHERE j.journal = '$journal->id'";
        $journals = $DB->get_records_sql($sql);
    }


    if (!$journals) {
        return 0;
    }

    // remove unenrolled participants
    foreach ($journals as $key => $user) {

        $canadd = has_capability('mod/journal:addentries', $context, $user);
        $entriesmanager = has_capability('mod/journal:manageentries', $context, $user);

        if (!$entriesmanager && !$canadd) {
            unset($journals[$key]);
        }
    }

    return count($journals);
}

function journal_get_unmailed_graded($cutofftime) {
    global $DB;

    $sql = "SELECT je.*, j.course, j.name FROM {journal_entries} je
            JOIN {journal} j ON je.journal = j.id
            WHERE je.mailed = '0' AND je.timemarked < '$cutofftime' AND je.timemarked > 0";
    return $DB->get_records_sql($sql);
}

function journal_log_info($log) {
    global $DB;

    $sql = "SELECT j.*, u.firstname, u.lastname
            FROM {journal} j
            JOIN {journal_entries} je ON je.journal = j.id
            JOIN {user} u ON u.id = je.userid
            WHERE je.id = '$log->info'";
    return $DB->get_record_sql($sql);
}

/**
 * Returns the journal instance course_module id
 *
 * @param integer $journal
 * @return object
 */
function journal_get_coursemodule($journalid) {

    global $DB;

    return $DB->get_record_sql("SELECT cm.id FROM {course_modules} cm
                                JOIN {modules} m ON m.id = cm.module
                                WHERE cm.instance = '$journalid' AND m.name = 'journal'");
}


// OTHER JOURNAL FUNCTIONS ///////////////////////////////////////////////////////////////////

function journal_print_user_entry($course, $user, $entry, $teachers, $grades) {

    global $USER, $OUTPUT, $DB, $CFG;

    require_once($CFG->dirroot.'/lib/gradelib.php');

    echo "\n<table class=\"journaluserentry\">";

    echo "\n<tr>";
    echo "\n<td class=\"userpix\" rowspan=\"2\">";
    echo $OUTPUT->user_picture($user, array('courseid' => $course->id));
    echo "</td>";
    echo "<td class=\"userfullname\">".fullname($user);
    if ($entry) {
        echo " <span class=\"lastedit\">".get_string("lastedited").": ".userdate($entry->modified)."</span>";
    }
    echo "</td>";
    echo "</tr>";

    echo "\n<tr><td>";
    if ($entry) {
        echo format_text($entry->text, $entry->format);
    } else {
        print_string("noentry", "journal");
    }
    echo "</td></tr>";

    if ($entry) {
        echo "\n<tr>";
        echo "<td class=\"userpix\">";
        if (!$entry->teacher) {
            $entry->teacher = $USER->id;
        }
        if (empty($teachers[$entry->teacher])) {
            $teachers[$entry->teacher] = $DB->get_record('user', array('id' => $entry->teacher));
        }
        echo $OUTPUT->user_picture($teachers[$entry->teacher], array('courseid' => $course->id));
        echo "</td>";
        echo "<td>".get_string("feedback").":";


        $attrs = array();
        $hiddengradestr = '';
        $gradebookgradestr = '';
        $feedbackdisabledstr = '';
        $feedbacktext = $entry->entrycomment;

        // If the grade was modified from the gradebook disable edition
        $grading_info = grade_get_grades($course->id, 'mod', 'journal', $entry->journal, array($user->id));
        if ($gradingdisabled = $grading_info->items[0]->grades[$user->id]->locked || $grading_info->items[0]->grades[$user->id]->overridden) {
            $attrs['disabled'] = 'disabled';
            $hiddengradestr = '<input type="hidden" name="r'.$entry->id.'" value="'.$entry->rating.'"/>';
            $gradebooklink = '<a href="'.$CFG->wwwroot.'/grade/report/grader/index.php?id='.$course->id.'">';
            $gradebooklink.= $grading_info->items[0]->grades[$user->id]->str_long_grade.'</a>';
            $gradebookgradestr = '<br/>'.get_string("gradeingradebook", "journal").':&nbsp;'.$gradebooklink;

            $feedbackdisabledstr = 'disabled="disabled"';
            $feedbacktext = $grading_info->items[0]->grades[$user->id]->str_feedback;
        }

        // Grade selector
        echo html_writer::select($grades, 'r'.$entry->id, $entry->rating, get_string("nograde").'...', $attrs);
        echo $hiddengradestr;
        if ($entry->timemarked) {
            echo " <span class=\"lastedit\">".userdate($entry->timemarked)."</span>";
        }
        echo $gradebookgradestr;

        // Feedback text
        echo "<p><textarea name=\"c$entry->id\" rows=\"12\" cols=\"60\" $feedbackdisabledstr>";
        p($feedbacktext);
        echo "</textarea></p>";

        if ($feedbackdisabledstr != '') {
            echo '<input type="hidden" name="c'.$entry->id.'" value="'.$feedbacktext.'"/>';
        }
        echo "</td></tr>";
    }
    echo "</table>\n";

}

function journal_print_feedback($course, $entry, $grades) {

    global $CFG, $DB, $OUTPUT;

    require_once($CFG->dirroot.'/lib/gradelib.php');

    if (! $teacher = $DB->get_record('user', array('id' => $entry->teacher))) {
        print_error('Weird journal error');
    }

    echo '<table class="feedbackbox">';

    echo '<tr>';
    echo '<td class="left picture">';
    echo $OUTPUT->user_picture($teacher, array('courseid' => $course->id));
    echo '</td>';
    echo '<td class="entryheader">';
    echo '<span class="author">'.fullname($teacher).'</span>';
    echo '&nbsp;&nbsp;<span class="time">'.userdate($entry->timemarked).'</span>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="left side">&nbsp;</td>';
    echo '<td class="entrycontent">';

    echo '<div class="grade">';

    // Gradebook preference
    if ($grading_info = grade_get_grades($course->id, 'mod', 'journal', $entry->journal, array($entry->userid))) {
        echo get_string('grade').': ';
        echo $grading_info->items[0]->grades[$entry->userid]->str_long_grade;
    } else {
        print_string('nograde');
    }
    echo '</div>';

    // Feedback text
    echo format_text($entry->entrycomment);
    echo '</td></tr></table>';
}

