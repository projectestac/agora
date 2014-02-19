<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more detail.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Library of hotpot module functions needed by Moodle core and other subsystems
 *
 * All the functions neeeded by Moodle core, gradebook, file subsystem etc
 * are placed here.
 *
 * @package    mod
 * @subpackage hotpot
 * @copyright  2009 Gordon Bateson <gordon.bateson@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

////////////////////////////////////////////////////////////////////////////////
// Moodle core API                                                            //
////////////////////////////////////////////////////////////////////////////////

/**
 * Returns the information if the module supports a feature
 *
 * the very latest Moodle 2.x expects "mod_hotpot_supports"
 * but since this module may also be run in early Moodle 2.x
 * we leave this function with its legacy name "hotpot_supports"
 *
 * @see plugin_supports() in lib/moodlelib.php
 * @see init_features() in course/moodleform_mod.php
 * @param string $feature FEATURE_xx constant for requested feature
 * @return mixed true if the feature is supported, null if unknown
 */
function hotpot_supports($feature) {
    switch($feature) {
        // enable features whose default is "false"
        case FEATURE_GRADE_HAS_GRADE:   return true;
        case FEATURE_GROUPINGS:         return true;
        case FEATURE_GROUPMEMBERSONLY:  return true;
        case FEATURE_BACKUP_MOODLE2:    return true;

        // use default for these features whose default is "false"
        //case FEATURE_RATE:              return false;
        //case FEATURE_GRADE_HAS_GRADE:   return false;
        //case FEATURE_COMPLETION_TRACKS_VIEWS: return false;

        // disable features whose default is "true"
        case FEATURE_MOD_INTRO:         return false;

        // use default for these features whose default is "true"
        //case FEATURE_GROUPS:            return true;
        //case FEATURE_IDNUMBER:          return true;
        //case FEATURE_GRADE_OUTCOMES:    return true;
        //case FEATURE_MODEDIT_DEFAULT_COMPLETION: return true;

        // otherwise, this is some feature we do not know about
        default:                        return null;
    }
}

/**
 * Saves a new instance of the hotpot into the database
 *
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will save a new instance and return the id number
 * of the new instance.
 *
 * @param stdclass $data An object from the form in mod_form.php
 * @return int The id of the newly inserted hotpot record
 */
function hotpot_add_instance(stdclass $data, $mform) {
    global $DB;

    hotpot_process_formdata($data, $mform);

    // insert the new record so we get the id
    $data->id = $DB->insert_record('hotpot', $data);

    // update calendar events
    hotpot_update_events_wrapper($data);

    // update gradebook item
    hotpot_grade_item_update($data);

    return $data->id;
}

/**
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will update an existing instance with new data.
 *
 * @param stdclass $data An object from the form in mod_form.php
 * @return bool success
 */
function hotpot_update_instance(stdclass $data, $mform) {
    global $DB;

    hotpot_process_formdata($data, $mform);

    $data->id = $data->instance;
    $DB->update_record('hotpot', $data);

    // update calendar events
    hotpot_update_events_wrapper($data);

    // update gradebook item
    if ($data->grademethod==$mform->get_original_value('grademethod', 0)) {
        hotpot_grade_item_update($data);
    } else {
        // recalculate grades for all users
        hotpot_update_grades($data);
    }

    return true;
}

/**
 * Set secondary fields (i.e. fields derived from the form fields)
 * for this HotPot acitivity
 *
 * @param stdclass $data (passed by reference)
 * @param moodle_form $mform
 */
function hotpot_process_formdata(stdclass &$data, $mform) {
    global $CFG;
    require_once($CFG->dirroot.'/mod/hotpot/locallib.php');

    if ($mform->is_add()) {
        $data->timecreated = time();
    } else {
        $data->timemodified = time();
    }

    // get context for this HotPot instance
    $context = hotpot_get_context(CONTEXT_MODULE, $data->coursemodule);

    $sourcefile = null;
    $data->sourcefile = '';
    $data->sourcetype = '';
    if ($data->sourceitemid) {
        $options = hotpot::sourcefile_options();
        file_save_draft_area_files($data->sourceitemid, $context->id, 'mod_hotpot', 'sourcefile', 0, $options);

        $fs = get_file_storage();
        $files = $fs->get_area_files($context->id, 'mod_hotpot', 'sourcefile');

        // do we need to remove the draft files ?
        // otherwise the "files" table seems to get full of "draft" records
        // $fs->delete_area_files($context->id, 'user', 'draft', $data->sourceitemid);

        foreach ($files as $hash => $file) {
            if ($file->get_sortorder()==1) {
                $data->sourcefile = $file->get_filepath().$file->get_filename();
                $data->sourcetype = hotpot::get_sourcetype($file);
                $sourcefile = $file;
                break;
            }
        }
        unset($fs, $files, $file, $hash, $options);
    }

    if (is_null($sourcefile) || $data->sourcefile=='' || $data->sourcetype=='') {
        // sourcefile was missing or not a recognized type - shouldn't happen !!
    }

    // process text fields that may come from source file
    $source = false;
    $textfields = array('name', 'entrytext', 'exittext');
    foreach($textfields as $textfield) {

        $textsource = $textfield.'source';
        if (! isset($data->$textsource)) {
            $data->$textsource = hotpot::TEXTSOURCE_SPECIFIC;
        }

        switch ($data->$textsource) {
            case hotpot::TEXTSOURCE_FILE:
                if ($data->sourcetype && $sourcefile && empty($source)) {
                    $class = 'hotpot_source_'.$data->sourcetype;
                    $source = new $class($sourcefile, $data);
                }
                $method = 'get_'.$textfield;
                if ($source && method_exists($source, $method)) {
                    $data->$textfield = $source->$method();
                } else {
                    $data->$textfield = '';
                }
                break;
            case hotpot::TEXTSOURCE_FILENAME:
                $data->$textfield = basename($data->sourcefile);
                break;
            case hotpot::TEXTSOURCE_FILEPATH:
                $data->$textfield = str_replace(array('/', '\\'), ' ', $data->sourcefile);
                break;
            case hotpot::TEXTSOURCE_SPECIFIC:
            default:
                if (isset($data->$textfield)) {
                    $data->$textfield = trim($data->$textfield);
                } else {
                    $data->$textfield = $mform->get_original_value($textfield, '');
                }
        }

        // default activity name is simply "HotPot"
        if ($textfield=='name' && $data->$textfield=='') {
            $data->$textfield = get_string('modulename', 'hotpot');
        }
    }

    // process entry/exit page settings
    foreach (hotpot::text_page_types() as $type) {

        // show page (boolean switch)
        $pagefield = $type.'page';
        if (! isset($data->$pagefield)) {
            $data->$pagefield = 0;
        }

        // set field names
        $textfield = $type.'text';
        $formatfield = $type.'format';
        $editorfield = $type.'editor';
        $sourcefield = $type.'textsource';
        $optionsfield = $type.'options';

        // ensure text, format and option fields are set
        // (these fields can't be null in the database)
        if (! isset($data->$textfield)) {
            $data->$textfield = $mform->get_original_value($textfield, '');
        }
        if (! isset($data->$formatfield)) {
            $data->$formatfield = $mform->get_original_value($formatfield, FORMAT_HTML);
        }
        if (! isset($data->$optionsfield)) {
            $data->$optionsfield = $mform->get_original_value($optionsfield, 0);
        }

        // set text and format fields
        if ($data->$sourcefield==hotpot::TEXTSOURCE_SPECIFIC) {

            // transfer wysiwyg editor text
            if ($itemid = $data->{$editorfield}['itemid']) {
                if (isset($data->{$editorfield}['text'])) {
                    // get the text that was sent from the browser
                    $editoroptions = hotpot::text_editors_options($context);
                    $text = file_save_draft_area_files($itemid, $context->id, 'mod_hotpot', $type, 0, $editoroptions, $data->{$editorfield}['text']);

                    // remove leading and trailing white space,
                    //  - empty html paragraphs (from IE)
                    //  - and blank lines (from Firefox)
                    $text = preg_replace('/^((<p>\s*<\/p>)|(<br[^>]*>)|\s)+/is', '', $text);
                    $text = preg_replace('/((<p>\s*<\/p>)|(<br[^>]*>)|\s)+$/is', '', $text);

                    $data->$textfield = $text;
                    $data->$formatfield = $data->{$editorfield}['format'];
                }
            }
        }

        // set entry/exit page options
        foreach (hotpot::text_page_options($type) as $name => $mask) {
            $optionfield = $type.'_'.$name;
            if ($data->$pagefield) {
                if (empty($data->$optionfield)) {
                    // disable this option
                    $data->$optionsfield = $data->$optionsfield & ~$mask;
                } else {
                    // enable this option
                    $data->$optionsfield = $data->$optionsfield | $mask;
                }
            }
        }

        // don't show exit page if no content is specified
        if ($type=='exit' && empty($data->$optionsfield) && empty($data->$textfield)) {
            $data->$pagefield = 0;
        }
    }

    // timelimit
    if ($data->timelimit==hotpot::TIME_SPECIFIC) {
        $data->timelimit = $data->timelimitspecific;
    }

    // delay3
    if ($data->delay3==hotpot::TIME_SPECIFIC) {
        $data->delay3 = $data->delay3specific;
    }

    // set stopbutton and stoptext
    if (empty($data->stopbutton_yesno)) {
        $data->stopbutton = hotpot::STOPBUTTON_NONE;
        $data->stoptext = $mform->get_original_value('stoptext', '');
    } else {
        if (! isset($data->stopbutton_type)) {
            $data->stopbutton_type = '';
        }
        if (! isset($data->stopbutton_text)) {
            $data->stopbutton_text = '';
        }
        if ($data->stopbutton_type=='specific') {
            $data->stopbutton = hotpot::STOPBUTTON_SPECIFIC;
            $data->stoptext = $data->stopbutton_text;
        } else {
            $data->stopbutton = hotpot::STOPBUTTON_LANGPACK;
            $data->stoptext = $data->stopbutton_type;
        }
    }

    // set review options
    $data->reviewoptions = 0;
    list($times, $items) = hotpot::reviewoptions_times_items();
    foreach ($times as $timename => $timevalue) {
        foreach ($items as $itemname => $itemvalue) {
            $name = $timename.$itemname; // e.g. duringattemptresponses
            if (isset($data->$name)) {
                if ($data->$name) {
                    $data->reviewoptions += ($timevalue & $itemvalue);
                }
                unset($data->$name);
            }
        }
    }

    // save these form settings as user preferences
    $preferences = array();
    foreach (hotpot::user_preferences_fieldnames() as $fieldname) {
        if (isset($data->$fieldname)) {
            $preferences['hotpot_'.$fieldname] = $data->$fieldname;
        }
    }
    set_user_preferences($preferences);
}

/**
 * Given an ID of an instance of this module,
 * this function will permanently delete the instance
 * and any data that depends on it.
 *
 * @param int $id Id of the module instance
 * @return boolean Success/Failure
 */
function hotpot_delete_instance($id) {
    global $CFG, $DB;
    require_once($CFG->dirroot.'/lib/gradelib.php');

    // check the hotpot $id is valid
    if (! $hotpot = $DB->get_record('hotpot', array('id' => $id))) {
        return false;
    }

    // delete all associated hotpot questions
    $DB->delete_records('hotpot_questions', array('hotpotid' => $hotpot->id));

    // delete all associated hotpot attempts, details and responses
    if ($attempts = $DB->get_records('hotpot_attempts', array('hotpotid' => $hotpot->id), '', 'id')) {
        $ids = array_keys($attempts);
        $DB->delete_records_list('hotpot_details',   'attemptid', $ids);
        $DB->delete_records_list('hotpot_responses', 'attemptid', $ids);
        $DB->delete_records_list('hotpot_attempts',  'id',        $ids);
    }

    // remove records from the hotpot cache
    $DB->delete_records('hotpot_cache', array('hotpotid' => $hotpot->id));

    // finally remove the hotpot record itself
    $DB->delete_records('hotpot', array('id' => $hotpot->id));

    // gradebook cleanup
    grade_update('mod/hotpot', $hotpot->course, 'mod', 'hotpot', $hotpot->id, 0, null, array('deleted' => true));

    return true;
}

/**
 * Return a small object with summary information about what a
 * user has done with a given particular instance of this module
 * Used for user activity reports.
 * $return->time = the time they did it
 * $return->info = a short text description
 *
 * @global object $DB
 * @param object $course
 * @param object $user
 * @param object $mod
 * @param object $hotpot
 * @return stdclass|null
 */
function hotpot_user_outline($course, $user, $mod, $hotpot) {
    global $CFG, $DB;
    require_once($CFG->dirroot.'/mod/hotpot/locallib.php');

    $conditions = array('hotpotid'=>$hotpot->id, 'userid'=>$user->id);
    if (! $attempts = $DB->get_records('hotpot_attempts', $conditions, "timestart ASC", 'id,score,timestart')) {
        return null;
    }

    $time = 0;
    $info = null;

    $scores = array();
    foreach ($attempts as $attempt){
        if ($time==0) {
            $time = $attempt->timestart;
        }
        $scores[] = hotpot::format_score($attempt);
    }
    if (count($scores)) {
        $info = get_string('score', 'hotpot').': '.implode(', ', $scores);
    } else {
        $info = get_string('noactivity', 'hotpot');
    }

    return (object)array('time'=>$time, 'info'=>$info);
}

/**
 * Print a detailed representation of what a user has done with
 * a given particular instance of this module, for user activity reports.
 *
 * @return string HTML
 */
function hotpot_user_complete($course, $user, $mod, $hotpot) {
    $report = hotpot_user_outline($course, $user, $mod, $hotpot);
    if (empty($report)) {
        echo get_string("noactivity", 'hotpot');
    } else {
        $date = userdate($report->time, get_string('strftimerecentfull'));
        echo $report->info.' '.get_string('mostrecently').': '.$date;
    }
    return true;
}

/**
 * Given a course and a time, this module should find recent activity
 * that has occurred in hotpot activities and print it out.
 * Return true if there was output, or false is there was none.
 *
 * @param stdclass $course
 * @param bool $viewfullnames
 * @param int $timestart
 * @return boolean
 */
function hotpot_print_recent_activity($course, $viewfullnames, $timestart) {
    global $CFG, $DB, $OUTPUT;
    $result = false;

    // the Moodle "logs" table contains the following fields:
    //     time, userid, course, ip, module, cmid, action, url, info

    // this function utilitizes the following index on the log table
    //     log_timcoumodact_ix : time, course, module, action

    // log records are added by the following function in "lib/datalib.php":
    //     add_to_log($courseid, $module, $action, $url='', $info='', $cm=0, $user=0)

    // log records are added by the following HotPot scripts:
    //     (scriptname : log action)
    //     attempt.php : attempt
    //     index.php   : index
    //     report.php  : report
    //     review.php  : review
    //     submit.php  : submit
    //     view.php    : view
    // all these actions have a record in the "log_display" table

    $select = "time > ? AND course = ? AND module = ? AND action IN (?, ?, ?, ?, ?)";
    $params = array($timestart, $course->id, 'hotpot', 'add', 'update', 'view', 'attempt', 'submit');

    if ($logs = $DB->get_records_select('log', $select, $params, 'time ASC')) {

        $modinfo = get_fast_modinfo($course);
        $cmids   = array_keys($modinfo->get_cms());

        $stats = array();
        foreach ($logs as $log) {
            $cmid = $log->cmid;
            if (! in_array($cmid, $cmids)) {
                continue; // invalid $cmid - shouldn't happen !!
            }
            $cm = $modinfo->get_cm($cmid);
            if (! $cm->uservisible) {
                continue; // coursemodule is hidden from user
            }
            $sortorder = array_search($cmid, $cmids);
            if (! array_key_exists($sortorder, $stats)) {
                if (has_capability('mod/hotpot:reviewmyattempts', $cm->context) || has_capability('mod/hotpot:reviewallattempts', $cm->context)) {
                    $viewreport = true;
                } else {
                    $viewreport = false;
                }
                $options = array('context' => $cm->context);
                if (method_exists($cm, 'get_formatted_name')) {
                    $name = $cm->get_formatted_name($options);
                } else {
                    $name = format_string($cm->name, true,  $options);
                }
                $stats[$sortorder] = (object)array(
                    'name'    => $name,
                    'cmid'    => $cmid,
                    'add'     => 0,
                    'update'  => 0,
                    'view'    => 0,
                    'attempt' => 0,
                    'submit'  => 0,
                    'users'   => array(),
                    'viewreport' => $viewreport
                );
            }
            $action = $log->action;
            switch ($action) {
                case 'add':
                case 'update':
                    // store most recent time
                    $stats[$sortorder]->$action = $log->time;
                    break;
                case 'view':
                case 'attempt':
                case 'submit':
                    // increment counter
                    $stats[$sortorder]->$action ++;
                    break;
            }
            $stats[$sortorder]->users[$log->userid] = true;
        }

        $strusers     = get_string('users');
        $stradded     = get_string('added',    'hotpot');
        $strupdated   = get_string('updated',  'hotpot');
        $strviews     = get_string('views',    'hotpot');
        $strattempts  = get_string('attempts', 'hotpot');
        $strsubmits   = get_string('submits',  'hotpot');

        $print_headline = true;
        ksort($stats);
        foreach ($stats as $stat) {
            $li = array();
            if ($stat->add) {
                $li[] = $stradded.': '.userdate($stat->add);
            }
            if ($stat->update) {
                $li[] = $strupdated.': '.userdate($stat->update);
            }
            if ($stat->viewreport) {
                // link to a detailed report of recent activity for this hotpot
                $url = new moodle_url(
                    '/course/recent.php',
                    array('id'=>$course->id, 'modid'=>$stat->cmid, 'date'=>$timestart)
                );
                if ($count = count($stat->users)) {
                    $li[] = $strusers.': '.html_writer::link($url, $count);
                }
                if ($stat->view) {
                    $li[] = $strviews.': '.html_writer::link($url, $stat->view);
                }
                if ($stat->attempt) {
                    $li[] = $strattempts.': '.html_writer::link($url, $stat->attempt);
                }
                if ($stat->submit) {
                    $li[] = $strsubmits.': '.html_writer::link($url, $stat->submit);
                }
            }
            if (count($li)) {
                if ($print_headline) {
                    $print_headline = false;
                    echo $OUTPUT->heading(get_string('modulenameplural', 'hotpot').':', 3);
                }

                $url = new moodle_url('/mod/hotpot/view.php', array('id'=>$stat->cmid));
                $link = html_writer::link($url, format_string($stat->name));

                $text = html_writer::tag('p', $link).html_writer::alist($li);
                echo html_writer::tag('div', $text, array('class'=>'hotpotrecentactivity'));

                $result = true;
            }
        }
    }
    return $result;
}

/**
 * Returns all activity in course hotpots since a given time
 * This function  returns activity for all hotpots since a given time.
 * It is initiated from the "Full report of recent activity" link in the "Recent Activity" block.
 * Using the "Advanced Search" page (cousre/recent.php?id=99&advancedfilter=1),
 * results may be restricted to a particular course module, user or group
 *
 * This function is called from: {@link course/recent.php}
 *
 * @param array(object) $activities sequentially indexed array of course module objects
 * @param integer $index length of the $activities array
 * @param integer $timestart start date, as a UNIX date
 * @param integer $courseid id in the "course" table
 * @param integer $coursemoduleid id in the "course_modules" table
 * @param integer $userid id in the "users" table (default = 0)
 * @param integer $groupid id in the "groups" table (default = 0)
 * @return void adds items into $activities and increments $index
 *     for each hotpot attempt, an $activity object is appended
 *     to the $activities array and the $index is incremented
 *     $activity->type : module type (always "hotpot")
 *     $activity->defaultindex : index of this object in the $activities array
 *     $activity->instance : id in the "hotpot" table;
 *     $activity->name : name of this hotpot
 *     $activity->section : section number in which this hotpot appears in the course
 *     $activity->content : array(object) containing information about hotpot attempts to be printed by {@link print_recent_mod_activity()}
 *         $activity->content->attemptid : id in the "hotpot_quiz_attempts" table
 *         $activity->content->attempt : the number of this attempt at this quiz by this user
 *         $activity->content->score : the score for this attempt
 *         $activity->content->timestart : the server time at which this attempt started
 *         $activity->content->timefinish : the server time at which this attempt finished
 *     $activity->user : object containing user information
 *         $activity->user->userid : id in the "user" table
 *         $activity->user->fullname : the full name of the user (see {@link lib/moodlelib.php}::{@link fullname()})
 *         $activity->user->picture : $record->picture;
 *     $activity->timestamp : the time that the content was recorded in the database
 */
function hotpot_get_recent_mod_activity(&$activities, &$index, $timestart, $courseid, $coursemoduleid=0, $userid=0, $groupid=0) {
    global $CFG, $DB, $USER;

    // CONTRIB-4025 don't allow students to see each other's scores
    $coursecontext = hotpot_get_context(CONTEXT_COURSE, $courseid);
    if (! has_capability('mod/hotpot:reviewmyattempts', $coursecontext)) {
        return; // can't view recent activity
    }
    if (! has_capability('mod/hotpot:reviewallattempts', $coursecontext)) {
        $userid = $USER->id; // force this user only
    }

    // we want to detect Moodle >= 2.4
    // method_exists('course_modinfo', 'get_used_module_names')
    // method_exists('cm_info', 'get_modue_type_name')
    // method_exists('cm_info', 'is_user_access_restricted_by_capability')

    $reflector = new ReflectionFunction('get_fast_modinfo');
    if ($reflector->getNumberOfParameters() >= 3) {
        // Moodle >= 2.4 has 3rd parameter ($resetonly)
        $modinfo = get_fast_modinfo($courseid);
        $course  = $modinfo->get_course();
    } else {
        // Moodle <= 2.3
        $course = $DB->get_record('course', array('id' => $courseid));
        $modinfo = get_fast_modinfo($course);
    }
    $cms = $modinfo->get_cms();

    $hotpots = array(); // hotpotid => cmid
    $users   = array(); // cmid => array(userids)

    foreach ($cms as $cmid => $cm) {
        if ($cm->modname=='hotpot' && ($coursemoduleid==0 || $coursemoduleid==$cmid)) {
            // save mapping from hotpotid => coursemoduleid
            $hotpots[$cm->instance] = $cmid;
            // initialize array of users who have recently attempted this HotPot
            $users[$cmid] = array();
        } else {
            // we are not interested in this mod
            unset($cms[$cmid]);
        }
    }

    if (empty($hotpots)) {
        return; // no hotpots
    }

    list($filter, $params) = $DB->get_in_or_equal(array_keys($hotpots));
    $duration = '(ha.timemodified - ha.timestart) AS duration';
    $select = 'ha.*, '.$duration.', u.firstname, u.lastname, u.picture, u.imagealt, u.email';
    $from   = "{hotpot_attempts} ha, {user} u";
    $where  = "ha.hotpotid $filter AND ha.userid=u.id";
    $orderby = 'ha.userid, ha.attempt';

    if ($groupid) {
        // restrict search to a users from a particular group
        $from   .= ', {groups_members} gm';
        $where  .= ' AND ha.userid=gm.userid AND gm.id=?';
        $params[] = $groupid;
    }
    if ($userid) {
        // restrict search to a single user
        $where .= ' AND ha.userid=?';
        $params[] = $userid;
    }
    $where .= ' AND ha.timemodified>?';
    $params[] = $timestart;

    if (! $attempts = $DB->get_records_sql("SELECT $select FROM $from WHERE $where ORDER BY $orderby", $params)) {
        return; // no recent attempts at these hotpots
    }

    foreach (array_keys($attempts) as $attemptid) {
        $attempt = &$attempts[$attemptid];

        if (! array_key_exists($attempt->hotpotid, $hotpots)) {
            continue; // invalid hotpotid - shouldn't happen !!
        }

        $cmid = $hotpots[$attempt->hotpotid];
        $userid = $attempt->userid;
        if (! array_key_exists($userid, $users[$cmid])) {
            $users[$cmid][$userid] = (object)array(
                'id'        => $userid,
                'userid'    => $userid,
                'firstname' => $attempt->firstname,
                'lastname'  => $attempt->lastname,
                'fullname'  => fullname($attempt),
                'picture'   => $attempt->picture,
                'imagealt'  => $attempt->imagealt,
                'email'     => $attempt->email,
                'attempts'  => array()
            );
        }
        // add this attempt by this user at this course module
        $users[$cmid][$userid]->attempts[$attempt->attempt] = &$attempt;
    }

    foreach ($cms as $cmid => $cm) {
        if (empty($users[$cmid])) {
            continue;
        }
        // add an activity object for each user's attempts at this hotpot
        foreach ($users[$cmid] as $userid => $user) {

            // get index of last (=most recent) attempt
            $max_unumber = max(array_keys($user->attempts));

            $options = array('context' => $cm->context);
            if (method_exists($cm, 'get_formatted_name')) {
                $name = $cm->get_formatted_name($options);
            } else {
                $name = format_string($cm->name, true,  $options);
            }

            $activities[$index++] = (object)array(
                'type' => 'hotpot',
                'cmid' => $cmid,
                'name' => $name,
                'user' => (object)array(
                    'id'        => $user->id,
                    'userid'    => $user->userid,
                    'firstname' => $user->firstname,
                    'lastname'  => $user->lastname,
                    'fullname'  => $user->fullname,
                    'picture'   => $user->picture,
                    'imagealt'  => $user->imagealt,
                    'email'     => $user->email
                ),
                'attempts'  => $user->attempts,
                'timestamp' => $user->attempts[$max_unumber]->timemodified
            );
        }
    }
}

/**
 * Print single activity item prepared by {@see hotpot_get_recent_mod_activity()}
 *
 * This function is called from: {@link course/recent.php}
 *
 * @param object $activity an object created by {@link get_recent_mod_activity()}
 * @param integer $courseid id in the "course" table
 * @param boolean $detail
 *         true : print a link to the hotpot activity
 *         false : do no print a link to the hotpot activity
 * @param xxx $modnames
 * @param xxx $viewfullnames
 * @return no return value is required
 */
function hotpot_print_recent_mod_activity($activity, $courseid, $detail, $modnames, $viewfullnames) {
    global $CFG, $OUTPUT;
    require_once($CFG->dirroot.'/mod/hotpot/locallib.php');

    static $dateformat = null;
    if (is_null($dateformat)) {
        $dateformat = get_string('strftimerecentfull');
    }

    $table = new html_table();
    $table->cellpadding = 3;
    $table->cellspacing = 0;

    if ($detail) {
        $row = new html_table_row();

        $cell = new html_table_cell('&nbsp;', array('width'=>15));
        $row->cells[] = $cell;

        // activity icon and link to activity
        $src = $OUTPUT->pix_url('icon', $activity->type);
        $img = html_writer::tag('img', array('src'=>$src, 'class'=>'icon', $alt=>$activity->name));

        // link to activity
        $href = new moodle_url('/mod/hotpot/view.php', array('id' => $activity->cmid));
        $link = html_writer::link($href, $activity->name);

        $cell = new html_table_cell("$img $link");
        $cell->colspan = 6;
        $row->cells[] = $cell;

        $table->data[] = new html_table_row(array(
            new html_table_cell('&nbsp;', array('width'=>15)),
            new html_table_cell("$img $link")
        ));

        $table->data[] = $row;
    }


    $row = new html_table_row();

    // set rowspan to (number of attempts) + 1
    $rowspan = count($activity->attempts) + 1;

    $cell = new html_table_cell('&nbsp;', array('width'=>15));
    $cell->rowspan = $rowspan;
    $row->cells[] = $cell;

    $picture = $OUTPUT->user_picture($activity->user, array('courseid'=>$courseid));
    $cell = new html_table_cell($picture, array('width'=>35, 'valign'=>'top', 'class'=>'forumpostpicture'));
    $cell->rowspan = $rowspan;
    $row->cells[] = $cell;

    $href = new moodle_url('/user/view.php', array('id'=>$activity->user->userid, 'course'=>$courseid));
    $cell = new html_table_cell(html_writer::link($href, $activity->user->fullname));
    $cell->colspan = 5;
    $row->cells[] = $cell;

    $table->data[] = $row;

    foreach ($activity->attempts as $attempt) {
        if ($attempt->duration) {
            $duration = '('.hotpot::format_time($attempt->duration).')';
        } else {
            $duration = '&nbsp;';
        }

        $href = new moodle_url('/mod/hotpot/review.php', array('id'=>$attempt->id));
        $link = html_writer::link($href, userdate($attempt->timemodified, $dateformat));

        $table->data[] = new html_table_row(array(
            new html_table_cell($attempt->attempt),
            new html_table_cell($attempt->score.'%'),
            new html_table_cell(hotpot::format_status($attempt->status, true)),
            new html_table_cell($link),
            new html_table_cell($duration)
        ));
    }

    echo html_writer::table($table);
}

/*
* This function defines what log actions will be selected from the Moodle logs
* and displayed for course -> report -> activity module -> HotPOt -> View OR All actions
*
* This function is called from: {@link course/report/participation/index.php}
* @return array(string) of text strings used to log HotPot view actions
*/
function hotpot_get_view_actions() {
    return array('view', 'viewindex', 'report', 'review');
}

/*
* This function defines what log actions will be selected from the Moodle logs
* and displayed for course -> report -> activity module -> Hot Potatoes Quiz -> Post OR All actions
*
* This function is called from: {@link course/report/participation/index.php}
* @return array(string) of text strings used to log HotPot post actions
*/
function hotpot_get_post_actions() {
    return array('submit');
}

/**
 * Function to be run periodically according to the moodle cron
 * This function searches for things that need to be done, such
 * as sending out mail, toggling flags etc ...
 *
 * @return boolean
 * @todo Finish documenting this function
 **/
function hotpot_cron () {
    return true;
}

/**
 * Returns an array of user ids who are participanting in this hotpot
 *
 * @param int $hotpotid ID of an instance of this module
 * @return array of user ids, empty if there are no participants
 */
function hotpot_get_participants($hotpotid) {
    global $DB;

    $select = 'DISTINCT u.id, u.id';
    $from   = '{user} u, {hotpot_attempts} a';
    $where  = 'u.id=a.userid AND a.hotpot=?';
    $params = array($hotpotid);

    return $DB->get_records_sql("SELECT $select FROM $from WHERE $where", $params);
}

/**
 * Is a given scale used by the instance of hotpot?
 *
 * The function asks all installed grading strategy subplugins. The hotpot
 * core itself does not use scales. Both grade for submission and grade for
 * assessments do not use scales.
 *
 * @param int $hotpotid id of hotpot instance
 * @param int $scaleid id of the scale to check
 * @return bool
 */
function hotpot_scale_used($hotpotid, $scaleid) {
    return false;
}

/**
 * Is a given scale used by any instance of hotpot?
 *
 * The function asks all installed grading strategy subplugins. The hotpot
 * core itself does not use scales. Both grade for submission and grade for
 * assessments do not use scales.
 *
 * @param int $scaleid id of the scale to check
 * @return bool
 */
function hotpot_scale_used_anywhere($scaleid) {
    return false;
}

/**
 * Returns all other caps used in the module
 *
 * @return array
 */
function hotpot_get_extra_capabilities() {
    return array('moodle/site:accessallgroups');
}

////////////////////////////////////////////////////////////////////////////////
// Gradebook API                                                              //
////////////////////////////////////////////////////////////////////////////////

/**
 * Creates or updates grade items for the given hotpot instance
 *
 * Needed by grade_update_mod_grades() in lib/gradelib.php.
 * Also used by {@link hotpot_update_grades()}.
 *
 * @param stdclass $hotpot instance object with extra cmidnumber and modname property
 * @return void
 */
function hotpot_grade_item_update($hotpot, $grades=null) {
    global $CFG;
    require_once($CFG->dirroot.'/lib/gradelib.php');

    // sanity check on $hotpot->id
    if (! isset($hotpot->id)) {
        return;
    }

    // set up params for grade_update()
    $params = array(
        'itemname' => $hotpot->name
    );
    if ($grades==='reset') {
        $params['reset'] = true;
        $grades = null;
    }
    if (isset($hotpot->cmidnumber)) {
        //cmidnumber may not be always present
        $params['idnumber'] = $hotpot->cmidnumber;
    }
    if ($hotpot->gradeweighting) {
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax']  = $hotpot->gradeweighting;
        $params['grademin']  = 0;
    } else {
        $params['gradetype'] = GRADE_TYPE_NONE;
        // Note: when adding a new activity, a gradeitem will *not*
        // be created in the grade book if gradetype==GRADE_TYPE_NONE
        // A gradeitem will be created later if gradetype changes to GRADE_TYPE_VALUE
        // However, the gradeitem will *not* be deleted if the activity's
        // gradetype changes back from GRADE_TYPE_VALUE to GRADE_TYPE_NONE
        // Therefore, we force the removal of empty gradeitems
        $params['deleted'] = true;
    }
    return grade_update('mod/hotpot', $hotpot->course, 'mod', 'hotpot', $hotpot->id, 0, $grades, $params);
}

/**
 * Update hotpot grades in the gradebook
 *
 * Needed by grade_update_mod_grades() in lib/gradelib.php
 *
 * @param stdclass  $hotpot      instance object with extra cmidnumber and modname property
 * @param integer   $userid      >0 update grade of specific user only, 0 means all participants
 * @param boolean   $nullifnone  TRUE = force creation of NULL grade if this user has no grade
 * @return boolean  TRUE if successful, FALSE otherwise
 * @return void
 */
function hotpot_update_grades($hotpot=null, $userid=0, $nullifnone=true) {
    global $CFG, $DB;

    // get hotpot object
    require_once($CFG->dirroot.'/mod/hotpot/locallib.php');

    if ($hotpot===null) {
        // update/create grades for all hotpots

        // set up sql strings
        $strupdating = get_string('updatinggrades', 'hotpot');
        $select = 'h.*, cm.idnumber AS cmidnumber';
        $from   = '{hotpot} h, {course_modules} cm, {modules} m';
        $where  = 'h.id = cm.instance AND cm.module = m.id AND m.name = ?';
        $params = array('hotpot');

        // get previous record index (if any)
        if (! $config = $DB->get_record('config', array('name'=>'hotpot_update_grades'))) {
            $config = (object)array('id'=>0, 'name'=>'hotpot_update_grades', 'value'=>'0');
        }
        $i_min = intval($config->value);

        if ($i_max = $DB->count_records_sql("SELECT COUNT('x') FROM $from WHERE $where", $params)) {
            if ($rs = $DB->get_recordset_sql("SELECT $select FROM $from WHERE $where", $params)) {
                $bar = new progress_bar('hotpotupgradegrades', 500, true);
                $i = 0;
                foreach ($rs as $hotpot) {

                    // update grade
                    if ($i >= $i_min) {
                        upgrade_set_timeout(); // apply for more time (3 mins)
                        hotpot_update_grades($hotpot, $userid, $nullifnone);
                    }

                    // update progress bar
                    $i++;
                    $bar->update($i, $i_max, $strupdating.": ($i/$i_max)");

                    // update record index
                    if ($i > $i_min) {
                        $config->value = "$i";
                        if ($config->id) {
                            $DB->update_record('config', $config);
                        } else {
                            $config->id = $DB->insert_record('config', $config);
                        }
                    }
                }
                $rs->close();
            }
        }

        // delete the record index
        if ($config->id) {
            $DB->delete_records('config', array('id'=>$config->id));
        }

        return; // finish here
    }

    // sanity check on $hotpot->id
    if (! isset($hotpot->id)) {
        return false;
    }

    if ($hotpot->grademethod==hotpot::GRADEMETHOD_AVERAGE || $hotpot->gradeweighting<100) {
        $precision = 1;
    } else {
        $precision = 0;
    }
    $weighting = $hotpot->gradeweighting / 100;

    // set the SQL string to determine the $grade
    switch ($hotpot->grademethod) {
        case hotpot::GRADEMETHOD_HIGHEST:
            $gradefield = "ROUND(MAX(score) * $weighting, $precision) AS grade";
            break;
        case hotpot::GRADEMETHOD_AVERAGE:
            // the 'AVG' function skips abandoned quizzes, so use SUM(score)/COUNT(id)
            $gradefield = "ROUND(SUM(score)/COUNT(id) * $weighting, $precision) AS grade";
            break;
        case hotpot::GRADEMETHOD_FIRST:
            $gradefield = "ROUND(score * $weighting, $precision)";
            $gradefield = $DB->sql_concat('timestart', "'_'", $gradefield);
            $gradefield = "MIN($gradefield) AS grade";
            break;
        case hotpot::GRADEMETHOD_LAST:
            $gradefield = "ROUND(score * $weighting, $precision)";
            $gradefield = $DB->sql_concat('timestart', "'_'", $gradefield);
            $gradefield = "MAX($gradefield) AS grade";
            break;
        default:
            return false; // shouldn't happen !!
    }

    $select = 'timefinish>0 AND hotpotid= ?';
    $params = array($hotpot->id);
    if ($userid) {
        $select .= ' AND userid = ?';
        $params[] = $userid;
    }
    $sql = "SELECT userid, $gradefield FROM {hotpot_attempts} WHERE $select GROUP BY userid";

    $grades = array();
    if ($hotpotgrades = $DB->get_records_sql_menu($sql, $params)) {
        foreach ($hotpotgrades as $hotpotuserid => $hotpotgrade) {
            if ($hotpot->grademethod==hotpot::GRADEMETHOD_FIRST || $hotpot->grademethod==hotpot::GRADEMETHOD_LAST) {
                // remove left hand characters in $gradefield (up to and including the underscore)
                $pos = strpos($hotpotgrade, '_') + 1;
                $hotpotgrade = substr($hotpotgrade, $pos);
            }
            $grades[$hotpotuserid] = (object)array('userid'=>$hotpotuserid, 'rawgrade'=>$hotpotgrade);
        }
    }

    if (count($grades)) {
        hotpot_grade_item_update($hotpot, $grades);

    } else if ($userid && $nullifnone) {
        // no grades for this user, but we must force the creation of a "null" grade record
        hotpot_grade_item_update($hotpot, (object)array('userid'=>$userid, 'rawgrade'=>null));

    } else {
        // no grades and no userid
        hotpot_grade_item_update($hotpot);
    }
}

////////////////////////////////////////////////////////////////////////////////
// File API                                                                   //
////////////////////////////////////////////////////////////////////////////////

/**
 * Returns the lists of all browsable file areas within the given module context
 *
 * The file area hotpot_intro for the activity introduction field is added automatically
 * by {@link file_browser::get_file_info_context_module()}
 *
 * @param stdclass $course
 * @param stdclass $cm
 * @param stdclass $context
 * @return array of [(string)filearea] => (string)description
 */
function hotpot_get_file_areas($course, $cm, $context) {
    return array(
        'entry'      => get_string('entrytext',  'hotpot'),
        'exit'       => get_string('exittext',   'hotpot'),
        'sourcefile' => get_string('sourcefile', 'hotpot')
    );
}

/**
 * Serves the plugin files from the specified $filearea
 *
 * @package  mod_hotpot
 * @category files
 * @param stdClass $course course object
 * @param stdClass $cm course module object
 * @param stdClass $context context object
 * @param string $filearea file area
 * @param array $args extra arguments
 * @param bool $forcedownload whether or not force download
 * @param array $options additional options affecting the file serving
 * @return bool false if file not found, does not return if found - just send the file
 */
function hotpot_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, $options=array()) {
    global $CFG;

    require_course_login($course, true, $cm);

    switch ($filearea) {
        case 'entry':      $capability = 'mod/hotpot:view'; break;
        case 'exit':       $capability = 'mod/hotpot:attempt'; break;
        case 'sourcefile': $capability = 'mod/hotpot:attempt'; break;
        default: send_file_not_found(); // invalid $filearea !!
    }

    require_capability($capability, $context);

    $fs = get_file_storage();
    $component = 'mod_hotpot';
    $filename = array_pop($args);
    $filepath = $args ? '/'.implode('/', $args).'/' : '/';

    // Note: $lifetime is the frequency at which files are synched
    if (isset($CFG->filelifetime)) {
        $lifetime =  $CFG->filelifetime;
    } else {
        $lifetime =  DAYSECS; // DAYSECS = 86400 secs = 24 hours
    }
    $filter   = 0; // don't apply filters

    if ($file = $fs->get_file($context->id, $component, $filearea, 0, $filepath, $filename)) {
        // file found - this is what we expect to happen
        send_stored_file($file, $lifetime, $filter, $forcedownload, $options);
    }

    /////////////////////////////////////////////////////////////
    // If we get to this point, it is because the requested file
    // is not where is was supposed to be, so we will search for
    // it in some other likely locations.
    // If we find it, we will copy it across to where it is
    // supposed to be, so it can be found more quickly next time
    /////////////////////////////////////////////////////////////

    $file_record = array(
        'contextid'=>$context->id, 'component'=>$component, 'filearea'=>$filearea,
        'sortorder'=>0, 'itemid'=>0, 'filepath'=>$filepath, 'filename'=>$filename
    );

    // search in external directory
    if ($file = hotpot_pluginfile_externalfile($context, $component, $filearea, $filepath, $filename, $file_record)) {
        send_stored_file($file, $lifetime, $filter, $forcedownload, $options);
    }

    // search course legacy files
    $coursecontext = hotpot_get_context(CONTEXT_COURSE, $course->id);
    if ($file = $fs->get_file($coursecontext->id, 'course', 'legacy', 0, $filepath, $filename)) {
        if ($file = $fs->create_file_from_storedfile($file_record, $file)) {
            //send_stored_file($file, $lifetime, 0);
            send_stored_file($file, $lifetime, $filter, $forcedownload, $options);
        }
    }

    // search local file system
    $oldfilepath = $CFG->dataroot.'/'.$course->id.$filepath.$filename;
    if (file_exists($oldfilepath)) {
        if ($file = $fs->create_file_from_pathname($file_record, $oldfilepath)) {
            send_stored_file($file, $lifetime, 0);
        }
    }

    // search other fileareas for this HotPot
    $hotpot_fileareas = hotpot_get_file_areas($course, $cm, $context);
    $hotpot_fileareas = array_keys($hotpot_fileareas);
    foreach($hotpot_fileareas as $hotpot_filearea) {
        if ($hotpot_filearea==$filearea) {
            continue; // we have already checked this filearea
        }
        if ($file = $fs->get_file($context->id, $component, $hotpot_filearea, 0, $filepath, $filename)) {
            if ($file = $fs->create_file_from_storedfile($file_record, $file)) {
                send_stored_file($file, $lifetime, 0);
            }
        }
    }

    // file not found :-(
    send_file_not_found();
}

/**
 * Gets main file in a file area
 *
 * if the main file is a link from an external repository
 * look for the target file in the main file's repository
 * Note: this functionality only exists in Moodle 2.3+
 *
 * @param stdclass $context
 * @param string $component 'mod_hotpot'
 * @param string $filearea  'sourcefile', 'entrytext' or 'exittext'
 * @param string $filepath  despite the name, this is a dir path with leading and trailing "/"
 * @param string $filename
 * @param array $file_record
 * @return stdclass if external file found, false otherwise
 */
function hotpot_pluginfile_externalfile($context, $component, $filearea, $filepath, $filename, $file_record) {

    // get file storage
    $fs = get_file_storage();

    // get main file for this $component/$filearea
    // typically this will be the HotPot quiz file
    $mainfile = hotpot_pluginfile_mainfile($context, $component, $filearea);

    // get repository - cautiously :-)
    if (! $mainfile) {
        return false; // no main file - shouldn't happen !!
    }
    if (! method_exists($mainfile, 'get_repository_id')) {
        return false; // no file linking in Moodle 2.0 - 2.2
    }
    if (! $repositoryid = $mainfile->get_repository_id()) {
        return false; // $mainfile is not from an external repository
    }
    if (! $repository = repository::get_repository_by_id($repositoryid, $context)) {
        return false; // $repository is not accessible in this context - shouldn't happen !!
    }

    // get repository type
    switch (true) {
        case isset($repository->options['type']):
            $type = $repository->options['type'];
            break;
        case isset($repository->instance->typeid):
            $type = repository::get_type_by_id($repository->instance->typeid);
            $type = $type->get_typename();
            break;
        default:
            $type = ''; // shouldn't happen !!
    }

    // set paths (within repository) to required file
    // how we do this depends on the repository $typename
    // "filesystem" path is in plain text, others are encoded

    $mainreference = $mainfile->get_reference();
    switch ($type) {
        case 'filesystem':
            $maindirname   = dirname($mainreference);
            $encodepath    = false;
            break;
        case 'user':
        case 'coursefiles':
            $params        = file_storage::unpack_reference($mainreference, true);
            $maindirname   = $params['filepath'];
            $encodepath    = true;
            break;
        default:
            echo 'unknown repository type in hotpot_pluginfile_externalfile(): '.$type;
            die;
    }

    // remove leading and trailing "/" from dir names
    $maindirname = trim($maindirname, '/');
    $dirname = trim($filepath, '/');

    // assume path to target dir is same as path to main dir
    $path = explode('/', $maindirname);

    // traverse back up folder hierarchy if necessary
    $count = count(explode('/', $dirname));
    array_splice($path, -$count);

    // reconstruct expected dir path for source file
    if ($dirname) {
        $path[] = $dirname;
    }
    $source = $path;
    $source[] = $filename;
    $source = implode('/', $source);
    $path = implode('/', $path);

    // filepaths in the repository to search for the file
    $paths = array();

    // add to the list of possible paths
    $paths[$path] = $source;

    if ($dirname) {
        $paths[$dirname] = $dirname.'/'.$filename;
    }
    if ($maindirname) {
        $paths[$maindirname] = $maindirname.'/'.$filename;
    }
    if ($maindirname && $dirname) {
        $paths[$maindirname.'/'.$dirname] = $maindirname.'/'.$dirname.'/'.$filename;
        $paths[$dirname.'/'.$maindirname] = $dirname.'/'.$maindirname.'/'.$filename;
    }

    // add leading and trailing "/" to dir names
    $dirname = ($dirname=='' ? '/' : '/'.$dirname.'/');
    $maindirname = ($maindirname=='' ? '/' : '/'.$maindirname.'/');

    // locate $dirname within $maindirname
    // typically it will be absent or occur just once,
    // but it could possibly occur several times
    $search = '/'.preg_quote($dirname, '/').'/i';
    if (preg_match_all($search, $maindirname, $matches, PREG_OFFSET_CAPTURE)) {

        $i_max = count($matches[0]);
        for ($i=0; $i<$i_max; $i++) {
            list($match, $start) = $matches[0][$i];
            $path = substr($maindirname, 0, $start).$match;
            $path = trim($path, '/'); // e.g. hp6.2/html_files
            $paths[$path] = $path.'/'.$filename;
        }
    }

    // setup $params for path encoding, if necessary
    $params = array();
    if ($encodepath) {
        $listing = $repository->get_listing();
        if (isset($listing['list'][0]['path'])) {
            $params = file_storage::unpack_reference($listing['list'][0]['path'], true);
        }
    }

    foreach ($paths as $path => $source) {

        if (! hotpot_pluginfile_dirpath_exists($path, $repository, $encodepath, $params)) {
            continue;
        }

        if ($encodepath) {
            $params['filepath'] = '/'.$path.($path=='' ? '' : '/');
            $params['filename'] = '.'; // "." signifies a directory
            $path = file_storage::pack_reference($params);
        }

        $listing = $repository->get_listing($path);
        foreach ($listing['list'] as $file) {

            if (empty($file['source'])) {
                continue; // a directory - shouldn't happen !!
            }

            if ($encodepath) {
                $file['source'] = file_storage::unpack_reference($file['source']);
                $file['source'] = trim($file['source']['filepath'], '/').'/'.$file['source']['filename'];
            }

            if ($file['source']==$source) {

                if ($encodepath) {
                    $params['filename'] = $filename;
                    $source = file_storage::pack_reference($params);
                }

                if ($file = $fs->create_file_from_reference($file_record, $repositoryid, $source)) {
                    return $file;
                }
                break; // couldn't create file, so give up and try a different $path
            }
        }
    }

    // external file not found (or found but not created)
    return false;
}

/**
 * Determine if dir path exists or not in repository
 *
 * @param string   $dirpath
 * @param stdclass $repository
 * @param boolean  $encodepath
 * @param array    $params
 * @return boolean true if dir path exists in repository, false otherwise
 */
function hotpot_pluginfile_dirpath_exists($dirpath, $repository, $encodepath, $params) {
    $dirs = explode('/', $dirpath);
    foreach ($dirs as $i => $dir) {
        $dirpath = implode('/', array_slice($dirs, 0, $i));

        if ($encodepath) {
            $params['filepath'] = '/'.$dirpath.($dirpath=='' ? '' : '/');
            $params['filename'] = '.'; // "." signifies a directory
            $dirpath = file_storage::pack_reference($params);
        }

        $exists = false;
        $listing = $repository->get_listing($dirpath);
        foreach ($listing['list'] as $file) {
            if (empty($file['source'])) {
                if ($file['title']==$dir) {
                    $exists = true;
                    break;
                }
            }
        }
        if (! $exists) {
            return false;
        }
    }
    // all dirs in path exist - success !!
    return true;
}

/**
 * Gets main file in a file area
 *
 * @param stdclass $context
 * @param string $component e.g. 'mod_hotpot'
 * @param string $filearea
 * @return stdclass if main file found, false otherwise
 */
function hotpot_pluginfile_mainfile($context, $component, $filearea) {
    $fs = get_file_storage();

    // the main file for this HotPot activity
    // (file with lowest sortorder in $filearea)
    $mainfile = false;

    // these file types can't be the mainfile
    $media_filetypes = array('fla', 'flv', 'gif', 'jpeg', 'jpg', 'mp3', 'png', 'swf', 'wav');

    $area_files = $fs->get_area_files($context->id, $component, $filearea);
    foreach ($area_files as $file) {
        if ($file->is_directory()) {
            continue;
        }
        $filename = $file->get_filename();
        if (substr($filename, 0, 1)=='.') {
            continue; // hidden file
        }
        $filetype = strtolower(substr($filename, -3));
        if (in_array($filetype, $media_filetypes)) {
            continue; // media file
        }
        if (empty($mainfile)) { // || $mainfile->get_content()==''
            $mainfile = $file;
        } else if ($file->get_sortorder()==0) {
            // unsorted file - do nothing
        } else if ($mainfile->get_sortorder()==0) {
            $mainfile = $file;
        } else if ($file->get_sortorder() < $mainfile->get_sortorder()) {
            $mainfile = $file;
        }
    }

    return $mainfile;
}

/**
 * Serves the files from the hotpot file areas
 *
 * hotpot files may be media inserted into entrypage, exitpage and sourcefile content
 *
 * @param stdclass $course
 * @param stdclass $cm
 * @param stdclass $context
 * @param string $filearea
 * @param array $args filepath split into folder and file names
 * @param bool $forcedownload
 * @param array $options
 * @return void this should never return to the caller
 */
function mod_hotpot_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, $options=array()) {
    hotpot_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, $options);
}

/**
 * File browsing support for hotpot file areas
 *
 * @param stdclass $browser
 * @param stdclass $areas
 * @param stdclass $course
 * @param stdclass $cm
 * @param stdclass $context
 * @param string $filearea
 * @param int $itemid
 * @param string $filepath
 * @param string $filename
 * @return stdclass file_info instance or null if not found
 */
function hotpot_get_file_info($browser, $areas, $course, $cm, $context, $filearea, $itemid, $filepath, $filename) {
}

////////////////////////////////////////////////////////////////////////////////
// Navigation API                                                             //
////////////////////////////////////////////////////////////////////////////////

/**
 * Extends the global navigation tree by adding hotpot nodes if there is a relevant content
 *
 * This can be called by an AJAX request so do not rely on $PAGE as it might not be set up properly.
 *
 * @param navigation_node $navref An object representing the navigation tree node of the hotpot module instance
 * @param stdclass $course
 * @param stdclass $module
 * @param cm_info  $cm
 */
function hotpot_extend_navigation(navigation_node $hotpotnode, stdclass $course, stdclass $module, cm_info $cm) {
    global $CFG, $DB;
    require_once($CFG->dirroot.'/mod/hotpot/locallib.php');

    $hotpot = $DB->get_record('hotpot', array('id' => $cm->instance), '*', MUST_EXIST);
    $hotpot = hotpot::create($hotpot, $cm, $course);

    if ($hotpot->can_reviewattempts()) {
        $icon = new pix_icon('i/report', '');
        $type = navigation_node::TYPE_SETTING;
        foreach ($hotpot->get_report_modes() as $mode) {
            $url = $hotpot->report_url($mode);
            $label = get_string($mode.'report', 'hotpot');
            $hotpotnode->add($label, $url, $type, null, null, $icon);
        }
    }
}

/**
 * Extends the settings navigation with the Hotpot settings

 * This function is called when the context for the page is a hotpot module. This is not called by AJAX
 * so it is safe to rely on the $PAGE.
 *
 * @param settings_navigation $settingsnav {@link settings_navigation}
 * @param navigation_node $hotpotnode {@link navigation_node}
 */
function hotpot_extend_settings_navigation(settings_navigation $settingsnav, navigation_node $hotpotnode=null) {
}

////////////////////////////////////////////////////////////////////////////////
// Reset API                                                                  //
////////////////////////////////////////////////////////////////////////////////

/**
 * hotpot_reset_course_form_definition
 *
 * @param xxx $mform (passed by reference)
 */
function hotpot_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'hotpotheader', get_string('modulenameplural', 'hotpot'));
    $mform->addElement('checkbox', 'reset_hotpot_deleteallattempts', get_string('deleteallattempts', 'hotpot'));
}

/**
 * hotpot_reset_course_form_defaults
 *
 * @param xxx $course
 * @return xxx
 */
function hotpot_reset_course_form_defaults($course) {
    return array('reset_hotpot_deleteallattempts' => 1);
}

/**
 * hotpot_reset_gradebook
 *
 * @param xxx $courseid
 * @param xxx $type (optional, default='')
 */
function hotpot_reset_gradebook($courseid, $type='') {
    global $DB;
    $sql = ''
        .'SELECT h.*, cm.idnumber AS cmidnumber, cm.course AS courseid '
        .'FROM {hotpot} h, {course_modules} cm, {modules} m '
        ."WHERE m.name='hotpot' AND m.id=cm.module AND cm.instance=h.id AND h.course=?"
    ;
    if ($hotpots = $DB->get_records_sql($sql, array($courseid))) {
        foreach ($hotpots as $hotpot) {
            hotpot_grade_item_update($hotpot, 'reset');
        }
    }
}

/**
 * hotpot_reset_userdata
 *
 * @param xxx $data
 * @return xxx
 */
function hotpot_reset_userdata($data) {
    global $DB;

    if (empty($data->reset_hotpot_deleteallattempts)) {
        return array();
    }

    if ($hotpots = $DB->get_records('hotpot', array('course' => $data->courseid), 'id', 'id')) {
        foreach ($hotpots as $hotpot) {
            if ($attempts = $DB->get_records('hotpot_attempts', array('hotpotid' => $hotpot->id), 'id', 'id')) {
                $ids = array_keys($attempts);
                $DB->delete_records_list('hotpot_details',   'attemptid', $ids);
                $DB->delete_records_list('hotpot_responses', 'attemptid', $ids);
                $DB->delete_records_list('hotpot_attempts',  'id',        $ids);
            }
        }
    }

    return array(array(
        'component' => get_string('modulenameplural', 'hotpot'),
        'item' => get_string('deleteallattempts', 'hotpot'),
        'error' => false
    ));
}

/*
* This standard function will check all instances of this module
* and make sure there are up-to-date events created for each of them.
* If courseid = 0, then every hotpot event in the site is checked, else
* only hotpot events belonging to the course specified are checked.
* This function is used, in its new format, by restore_refresh_events()
* in backup/backuplib.php
*
* @param int $courseid : relative path (below $CFG->dirroot) of folder holding class definitions
*/
function hotpot_refresh_events($courseid=0) {
    global $CFG, $DB;

    if ($courseid && is_numeric($courseid)) {
        $params = array('course'=>$courseid);
    } else {
        $params = array();
    }
    if (! $hotpots = $DB->get_records('hotpot', $params)) {
        return true; // no hotpots
    }

    // get previous ids for events for these hotpots
    list($filter, $params) = $DB->get_in_or_equal(array_keys($hotpots));
    if ($eventids = $DB->get_records_select('event', "modulename='hotpot' AND instance $filter", $params, 'id', 'id')) {
        $eventids = array_keys($eventids);
    } else {
        $eventids = array();
    }

    // we're going to count the hotpots so we can detect the last one
    $i = 0;
    $count = count($hotpots);

    // add events for these hotpot units
    // eventids will be reused where possible
    foreach ($hotpots as $hotpot) {
        $i++;
        $delete = ($i==$count);
        hotpot_update_events($hotpot, $eventids, $delete);
    }

    // all done
    return true;
}

/**
 * Update calendar events for a single HotPot activity
 * This function is intended to be called just after
 * a HotPot activity has been created or edited.
 *
 * @param xxx $hotpot
 */
function hotpot_update_events_wrapper($hotpot) {
    global $DB;
    if ($eventids = $DB->get_records('event', array('modulename'=>'hotpot', 'instance'=>$hotpot->id), 'id', 'id')) {
        $eventids = array_keys($eventids);
    } else {
        $eventids = array();
    }
    hotpot_update_events($hotpot, $eventids, true);
}

/**
 * hotpot_update_events
 *
 * @param xxx $hotpot (passed by reference)
 * @param xxx $eventids (passed by reference)
 * @param xxx $delete
 */
function hotpot_update_events(&$hotpot, &$eventids, $delete) {
    global $CFG, $DB;
    require_once($CFG->dirroot.'/calendar/lib.php');

    static $stropens = '';
    static $strcloses = '';
    static $maxduration = null;

    // check to see if this user is allowed
    // to manage calendar events in this course
    $capability = 'moodle/calendar:manageentries';
    if (has_capability($capability, hotpot_get_context(CONTEXT_SYSTEM))) {
        $can_manage_events = true; // site admin
    } else if (has_capability($capability, hotpot_get_context(CONTEXT_COURSE, $hotpot->course))) {
        $can_manage_events = true; // course admin/teacher
    } else {
        $can_manage_events = false; // not allowed to add/edit calendar events !!
    }

    // don't check calendar capabiltiies
    // whwne adding or updating events
    $checkcapabilties = false;

    // cache text strings and max duration (first time only)
    if (is_null($maxduration)) {
        if (isset($CFG->hotpot_maxeventlength)) {
            $maxeventlength = $CFG->hotpot_maxeventlength;
        } else {
            $maxeventlength = 5; // 5 days is default
        }
        // set $maxduration (secs) from $maxeventlength (days)
        $maxduration = $maxeventlength * 24 * 60 * 60;

        $stropens = get_string('activityopens', 'hotpot');
        $strcloses = get_string('activitycloses', 'hotpot');
    }

    // array to hold events for this hotpot
    $events = array();

    // only setup calendar events,
    // if this user is allowed to
    if ($can_manage_events) {

        // set duration
        if ($hotpot->timeclose && $hotpot->timeopen) {
            $duration = max(0, $hotpot->timeclose - $hotpot->timeopen);
        } else {
            $duration = 0;
        }

        if ($duration > $maxduration) {
            // long duration, two events
            $events[] = (object)array(
                'name' => $hotpot->name.' ('.$stropens.')',
                'eventtype' => 'open',
                'timestart' => $hotpot->timeopen,
                'timeduration' => 0
            );
            $events[] = (object)array(
                'name' => $hotpot->name.' ('.$strcloses.')',
                'eventtype' => 'close',
                'timestart' => $hotpot->timeclose,
                'timeduration' => 0
            );
        } else if ($duration) {
            // short duration, just a single event
            if ($duration < DAYSECS) {
                // less than a day (1:07 p.m.)
                $fmt = get_string('strftimetime');
            } else if ($duration < WEEKSECS) {
                // less than a week (Thu, 13:07)
                $fmt = get_string('strftimedaytime');
            } else if ($duration < YEARSECS) {
                // more than a week (2 Feb, 13:07)
                $fmt = get_string('strftimerecent');
            } else {
                // more than a year (Thu, 2 Feb 2012, 01:07 pm)
                $fmt = get_string('strftimerecentfull');
            }
            $events[] = (object)array(
                'name' => $hotpot->name.' ('.userdate($hotpot->timeopen, $fmt).' - '.userdate($hotpot->timeclose, $fmt).')',
                'eventtype' => 'open',
                'timestart' => $hotpot->timeopen,
                'timeduration' => $duration,
            );
        } else if ($hotpot->timeopen) {
            // only an open date
            $events[] = (object)array(
                'name' => $hotpot->name.' ('.$stropens.')',
                'eventtype' => 'open',
                'timestart' => $hotpot->timeopen,
                'timeduration' => 0,
            );
        } else if ($hotpot->timeclose) {
            // only a closing date
            $events[] = (object)array(
                'name' => $hotpot->name.' ('.$strcloses.')',
                'eventtype' => 'close',
                'timestart' => $hotpot->timeclose,
                'timeduration' => 0,
            );
        }
    }

    // cache description and visiblity (saves doing it twice for long events)
    if (empty($hotpot->entrytext)) {
        $description = '';
    } else {
        $description = $hotpot->entrytext;
    }
    $visible = instance_is_visible('hotpot', $hotpot);

    foreach ($events as $event) {
        $event->groupid = 0;
        $event->userid = 0;
        $event->courseid = $hotpot->course;
        $event->modulename = 'hotpot';
        $event->instance = $hotpot->id;
        $event->description = $description;
        $event->visible = $visible;
        if (count($eventids)) {
            $event->id = array_shift($eventids);
            $calendarevent = calendar_event::load($event->id);
            $calendarevent->update($event, $checkcapabilties);
        } else {
            calendar_event::create($event, $checkcapabilties);
        }
    }

    // delete surplus events, if required
    // (no need to check capabilities here)
    if ($delete) {
        while (count($eventids)) {
            $id = array_shift($eventids);
            $event = calendar_event::load($id);
            $event->delete();
        }
    }
}

/**
 * context
 *
 * a wrapper method to offer consistent API to get contexts
 * in Moodle 2.0 and 2.1, we use get_context_instance() function
 * in Moodle >= 2.2, we use static context_xxx::instance() method
 *
 * @param integer $contextlevel
 * @param integer $instanceid (optional, default=0)
 * @param int $strictness (optional, default=0 i.e. IGNORE_MISSING)
 * @return required context
 * @todo Finish documenting this function
 */
function hotpot_get_context($contextlevel, $instanceid=0, $strictness=0) {
    if (class_exists('context_helper')) {
        // use call_user_func() to prevent syntax error in PHP 5.2.x
        // return $classname::instance($instanceid, $strictness);
        $class = context_helper::get_class_for_level($contextlevel);
        return call_user_func(array($class, 'instance'), $instanceid, $strictness);
    } else {
        return get_context_instance($contextlevel, $instanceid);
    }
}

/**
 * textlib
 *
 * a wrapper method to offer consistent API for textlib class
 * in Moodle 2.0 and 2.1, $textlib is first initiated, then called.
 * in Moodle >= 2.2, we use only static methods of the "textlib" class.
 *
 * @param string $method
 * @param mixed any extra params that are required by the textlib $method
 * @return result from the textlib $method
 * @todo Finish documenting this function
 */
function hotpot_textlib() {
    if (method_exists('textlib', 'textlib')) {
        $textlib = textlib_get_instance();
    } else {
        $textlib = 'textlib'; // Moodle >= 2.2
    }
    $args = func_get_args();
    $method = array_shift($args);
    $callback = array($textlib, $method);
    return call_user_func_array($callback, $args);
}
