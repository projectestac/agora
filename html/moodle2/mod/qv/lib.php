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
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Library of interface functions and constants for module qv
 *
 * All the core Moodle functions, neeeded to allow the module to work
 * integrated in Moodle should be placed here.
 * All the qv specific functions, needed to implement all the module
 * logic, should go to locallib.php. This will help to save some memory when
 * Moodle is performing actions across all modules.
 *
 * @package    mod
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

define('QV_DEFAULT_DISTAPPL', 'http://clic.xtec.cat/qv_viewer/dist/html/appl/');
define('QV_DEFAULT_DISTSCRIPTS', 'http://clic.xtec.cat/qv_viewer/dist/html/scripts/');
define('QV_DEFAULT_DISTCSS', 'http://clic.xtec.cat/qv_viewer/dist/html/css/');
define('QV_DEFAULT_SKINS', 'default,infantil,formal');

define('QV_HASH_UPDATE', 'update');
define('QV_HASH_ONLINE', 'online');

/*
if (!isset($CFG->qv_distpluginappl)) {
    set_config('qv_distpluginappl', QV_DEFAULT_DISTSCRIPTS);
}
if (!isset($CFG->qv_distpluginscripts)) {
    set_config('qv_distpluginscripts', QV_DEFAULT_DISTAPPL);
}
if (!isset($CFG->qv_distplugincss)) {
    set_config('qv_distplugincss', QV_DEFAULT_DISTCSS);
}
if (!isset($CFG->qv_skins)) {
    set_config('qv_skins', QV_DEFAULT_SKINS);
}*/

// QV file types
define('QV_FILE_TYPE_LOCAL', 'local');
define('QV_FILE_TYPE_EXTERNAL', 'external');

/** Include eventslib.php */
require_once($CFG->libdir.'/eventslib.php');
/** Include formslib.php */
require_once($CFG->libdir.'/formslib.php');
/** Include calendar/lib.php */
require_once($CFG->dirroot.'/calendar/lib.php');


////////////////////////////////////////////////////////////////////////////////
// Moodle core API                                                            //
////////////////////////////////////////////////////////////////////////////////

/**
 * Returns the information on whether the module supports a feature
 *
 * @todo: review features before publishing the module
 *
 * @see plugin_supports() in lib/moodlelib.php
 * @param string $feature FEATURE_xx constant for requested feature
 * @return mixed true if the feature is supported, null if unknown
 */
function qv_supports($feature) {
    switch($feature) {
        case FEATURE_GROUPS:                  return true;
//        case FEATURE_GROUPINGS:               return true;
//        case FEATURE_GROUPMEMBERSONLY:        return true;
        case FEATURE_MOD_INTRO:               return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS: return true;
//        case FEATURE_COMPLETION_HAS_RULES:    return true;
        case FEATURE_GRADE_HAS_GRADE:         return true;
//        case FEATURE_GRADE_OUTCOMES:          return true;
//        case FEATURE_RATE:                    return true;
        case FEATURE_BACKUP_MOODLE2:          return true;
//        case FEATURE_SHOW_DESCRIPTION:        return true;
//        case FEATURE_ADVANCED_GRADING:        return true;
        default:
          if (defined('FEATURE_SHOW_DESCRIPTION') && $feature == FEATURE_SHOW_DESCRIPTION) return true;
          else return null;
    }
}


/**
 * Saves a new instance of the qv into the database
 *
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will create a new instance and return the id number
 * of the new instance.
 *
 *
 * @param object $qv An object from the form in mod_form.php
 * @param mod_qv_mod_form $mform
 * @return int The id of the newly inserted qv record
 */
function qv_add_instance(stdClass $qv, mod_qv_mod_form $mform = null) {
    global $DB;

    $qv->timecreated = time();
	$filetype = $mform->get_data()->filetype;
    qv_before_add_or_update($qv, $filetype, $mform);

    $qv->id = $DB->insert_record('qv', $qv);

	qv_after_add_or_update($qv, $filetype);
    return $qv->id;
}


/**
 * Updates an instance of the qv in the database
 *
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will update an existing instance with new data.
 *
 * @param object $qv An object from the form in mod_form.php
 * @param mod_qv_mod_form $mform
 * @return boolean Success/Fail
 */
function qv_update_instance(stdClass $qv, mod_qv_mod_form $mform = null) {
    global $DB;

    $qv->timemodified = time();
    $qv->id = $qv->instance;
    $filetype = $mform->get_data()->filetype;
    qv_before_add_or_update($qv, $filetype, $mform);

    $result = $DB->update_record('qv', $qv);

	qv_after_add_or_update($qv, $filetype);
    return true;
}

function qv_before_add_or_update(&$qv, $filetype, $mform){
	if ($filetype === QV_FILE_TYPE_LOCAL) {
        $qv->reference = $mform->get_data()->qvfile;
    } else{
        $qv->reference = $qv->qvurl;
    }
}

function qv_after_add_or_update($qv, $filetype){
	global $DB;

    // We need to use context now, so we need to make sure all needed info is already in db.
    $cmid = $qv->coursemodule;
	$DB->set_field('course_modules', 'instance', $qv->id, array('id'=>$cmid));
	$context = context_module::instance($cmid);

	$fs = get_file_storage();

	if ($filetype === QV_FILE_TYPE_LOCAL) {
		$filename = qv_save_package($qv);
        $qv->reference = $filename;
        $DB->update_record('qv', $qv);
    } else {
		$fs->delete_area_files($context->id, 'mod_qv', 'package');
	}

	//Erase content files to force regeneration
	$fs->delete_area_files($context->id, 'mod_qv', 'content');

    if ($qv->timedue) {
        $event = new stdClass();
        if ($event->id = $DB->get_field('event', 'id', array('modulename'=>'qv', 'instance'=>$qv->id))) {
            $event->name        = $qv->name;
            $event->description = format_module_intro('qv', $qv, $qv->coursemodule);
            $event->timestart   = $qv->timedue;

            $calendarevent = calendar_event::load($event->id);
            $calendarevent->update($event);
        } else {
            $event = new stdClass();
            $event->name        = $qv->name;
            $event->description = format_module_intro('qv', $qv, $qv->coursemodule);
            $event->courseid    = $qv->course;
            $event->groupid     = 0;
            $event->userid      = 0;
            $event->modulename  = 'qv';
            $event->instance    = $qv->id;
            $event->eventtype   = 'due';
            $event->timestart   = $qv->timedue;
            $event->timeduration = 0;

            calendar_event::create($event);
        }
    } else {
        $DB->delete_records('event', array('modulename'=>'qv', 'instance'=>$qv->id));
    }

    // get existing grade item
	qv_grade_item_update($qv);

}


/**
 * Removes an instance of the qv from the database
 *
 * Given an ID of an instance of this module,
 * this function will permanently delete the instance
 * and any data that depends on it.
 *
 * @todo: delete event records (after adding this feature to the module)
 *
 * @param int $id Id of the module instance
 * @return boolean Success/Failure
 */
function qv_delete_instance($id) {
    global $DB;

    if (!$qv = $DB->get_record('qv', array('id'=>$id))) {
        return false;
    }

    // Delete any dependent records
    $result = true;
    qv_delete_instance_userdata($id);

    if ($result && !$DB->delete_records('qv', array('id' => $id))) {
        $result = false;
    }

    if ($result && !$DB->delete_records('event', array('modulename'=>'qv', 'instance'=>$qv->id))) {
        $result = false;
    }

    if ($result && !qv_grade_item_delete($qv)){
        $result = false;
    }

    //Delete files
	if ($result){
		$fs = get_file_storage();
		$result = $fs->delete_area_files($context->id, 'mod_qv', 'content');
	}

	if ($result){
		$result = $fs->delete_area_files($context->id, 'mod_qv', 'package');
	}

    return $result;
}

/**
 * Returns a small object with summary information about what a
 * user has done with a given particular instance of this module
 * Used for user activity reports.
 * $return->time = the time they did it
 * $return->info = a short text description
 *
 * @param object $course
 * @param object $user
 * @param object $mod
 * @param object $qv
 * @return stdClass|null
 */
function qv_user_outline($course, $user, $mod, $qv) {
    global $CFG;

    require_once($CFG->libdir.'/gradelib.php');
    $result = null;

    $grades = grade_get_grades($course->id, 'mod', 'qv', $qv->id, $user->id);
    if (!empty($grades->items[0]->grades)) {
        $grade = reset($grades->items[0]->grades);
        $result = new stdClass();
        $result->info = get_string('grade') . ': ' . $grade->str_long_grade;

        //if grade was last modified by the user themselves use date graded. Otherwise use date submitted
        if ($grade->usermodified == $user->id || empty($grade->datesubmitted)) {
            $result->time = $grade->dategraded;
        } else {
            $result->time = $grade->datesubmitted;
        }
    }
    return $result;
}

/**
 * Prints a detailed representation of what a user has done with
 * a given particular instance of this module, for user activity reports.
 *
 * @todo: implement
 *
 * @return string HTML
 */
function qv_user_complete($course, $user, $mod, $qv) {
    return '';
}

/**
 * Given a course and a time, this module should find recent activity
 * that has occurred in qv activities and print it out.
 * Return true if there was output, or false is there was none.
 *
 * @todo: implement
 *
 * @return boolean
 */
function qv_print_recent_activity($course, $viewfullnames, $timestart) {
    return false;  //  True if anything was printed, otherwise false
}

/**
 * Returns all activity in qvs since a given time
 *
 * @todo: implement
 *
 * @param array $activities sequentially indexed array of objects
 * @param int $index
 * @param int $timestart
 * @param int $courseid
 * @param int $cmid
 * @param int $userid defaults to 0
 * @param int $groupid defaults to 0
 * @return void adds items into $activities and increases $index
 */
function qv_get_recent_mod_activity(&$activities, &$index, $timestart, $courseid, $cmid, $userid=0, $groupid=0) {
}

/**
 * Prints single activity item prepared by {@see qv_get_recent_mod_activity()}
 *
 * @todo: implement
 *
 * @return void
 */
function qv_print_recent_mod_activity($activity, $courseid, $detail, $modnames, $viewfullnames) {
}

/**
 * Function to be run periodically according to the moodle cron
 * This function searches for things that need to be done, such
 * as sending out mail, toggling flags etc ...
 *
 * @return boolean
 * @todo Finish documenting this function
 **/
function qv_cron () {
    return true;
}

/**
 * Returns an array of users who are participanting in this qv
 *
 * Must return an array of users who are participants for a given instance
 * of qv. Must include every user involved in the instance,
 * independient of his role (student, teacher, admin...). The returned
 * objects must contain at least id property.
 * See other modules as example.
 *
 * @param int $qvid ID of an instance of this module
 * @return boolean|array false if no participants, array of objects otherwise
 */
function qv_get_participants($qvid) {
    global $CFG, $DB;

    //Get students
    $students = $DB->get_records_sql("SELECT DISTINCT u.id, u.id as userid
                                 FROM {user} u,
                                      {qv_assignments} qa
                                 WHERE qa.qvid = ? and
                                       u.id = qa.userid", array($qvid));
    //Get teachers
    $teachers = $DB->get_records_sql("SELECT DISTINCT u.id, u.id as userid
                                 FROM {user} u,
                                      {qv_assignments} qa
                                 WHERE qa.qvid = ? and
                                       u.id = qa.user_id", array($qvid));

    //Add teachers to students
    if ($teachers) {
        foreach ($teachers as $teacher) {
            $students[$teacher->id] = $teacher;
        }
    }
    //Return students array (it contains an array of unique users)
    return ($students);
}

/**
 * Returns all other caps used in the module
 *
 * @example return array('moodle/site:accessallgroups');
 * @return array
 */
function qv_get_extra_capabilities() {
    return array('moodle/site:accessallgroups', 'moodle/site:viewfullnames', 'moodle/grade:managegradingforms');
}

////////////////////////////////////////////////////////////////////////////////
// Gradebook API                                                              //
////////////////////////////////////////////////////////////////////////////////

/**
 * Is a given scale used by the instance of qv?
 *
 * This function returns if a scale is being used by one qv
 * if it has support for grading and scales. Commented code should be
 * modified if necessary. See forum, glossary or journal modules
 * as reference.
 *
 * @param int $qvid ID of an instance of this module
 * @return bool true if the scale is used by the given qv instance
 */
function qv_scale_used($qvid, $scaleid) {
    global $DB;

    $return = false;
    $rec = $DB->get_record('qv', array('id'=>$qvid,'grade'=>-$scaleid));
    if (!empty($rec) && !empty($scaleid)) {
        $return = true;
    }
    return $return;
}

/**
 * Checks if scale is being used by any instance of qv.
 *
 * This is used to find out if scale used anywhere.
 *
 * @param $scaleid int
 * @return boolean true if the scale is used by any qv instance
 */
function qv_scale_used_anywhere($scaleid) {
    global $DB;

    if ($scaleid and $DB->record_exists('qv', array('grade'=>-$scaleid))) {
        return true;
    } else {
        return false;
    }
}

/**
 * Creates or updates grade item for the give qv instance
 *
 * Needed by grade_update_mod_grades() in lib/gradelib.php
 *
 * @uses GRADE_TYPE_NONE
 * @uses GRADE_TYPE_VALUE
 * @uses GRADE_TYPE_SCALE
 * @param stdClass $qv instance object with extra cmidnumber and modname property
 * @param mixed $grades optional array/object of grade(s); 'reset' means reset grades in gradebook
 * @return int 0 if ok
 */
function qv_grade_item_update(stdClass $qv, $grades=NULL) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    if (!isset($qv->courseid)) {
        $qv->courseid = $qv->course;
    }

    $params = array();
    $params['itemname'] = clean_param($qv->name, PARAM_NOTAGS);
    $params['idnumber'] = $qv->cmidnumber;
    if ($qv->grade > 0) {
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax']  = $qv->grade;
        $params['grademin']  = 0;

    } else if ($qv->grade < 0) {
        $params['gradetype'] = GRADE_TYPE_SCALE;
        $params['scaleid']   = -$qv->grade;

    } else {
        $params['gradetype'] = GRADE_TYPE_NONE; // allow text comments only
    }

    if ($grades  === 'reset') {
        $params['reset'] = true;
        $grades = NULL;
    }

    grade_update('mod/qv', $qv->courseid, 'mod', 'qv', $qv->id, 0, $grades, $params);

    return true;
}

/**
 * Delete grade item for given qv
 *
 * @global object
 * @param object $qv object
 * @return object grade_item
 */
function qv_grade_item_delete($qv) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    return grade_update('mod/qv', $qv->course, 'mod', 'qv', $qv->id, 0, NULL, array('deleted'=>1));
}

/**
 * Return grade for given user or all users.
 *
 * @todo: implement userid=0 (all users)
 * @todo: optimize this function (to avoid call qv_get_sessions_summary or update only mandatory info)
 *
 * @param object $qv object
 * @param int $userid optional user id, 0 means all users
 * @return array array of grades, false if none
 */
function qv_get_user_grades($qv, $userid=0) {
    global $CFG, $DB;
    require_once($CFG->dirroot.'/mod/qv/locallib.php');

    // sanity check on $qv->id
    if (! isset($qv->id)) {
        return;
    }
    $sessions_summary = qv_get_assignment_summary($qv->id, $userid);
    $grades[$userid]->userid = $userid;
    $grades[$userid]->attempts = $sessions_summary->attempts;
    $grades[$userid]->totaltime = $sessions_summary->totaltime;
    $grades[$userid]->rawgrade = $sessions_summary->score;
    return $grades;
}

/**
 * Update qv grades in the gradebook
 *
 * Needed by grade_update_mod_grades() in lib/gradelib.php
 *
 * @todo: Fix some problems (this function is not working when is called from beans.php)
 *
 * @param stdClass $qv instance object with extra cmidnumber and modname property
 * @param int $userid update grade of specific user only, 0 means all participants
 * @param boolean $nullifnone return null if grade does not exist
 * @return void
 */
function qv_update_grades(stdClass $qv, $userid = 0, $nullifnone=true) {
    global $CFG, $DB;
    require_once($CFG->libdir.'/gradelib.php');

    if ($qv->grade == 0) {
        qv_grade_item_update($qv);

    } else if ($grades = qv_get_user_grades($qv, $userid)) {
        foreach($grades as $k=>$v) {
            if ($v->rawgrade == -1) {
                $grades[$k]->rawgrade = null;
            }
        }
        qv_grade_item_update($qv, $grades);

    } else if ($userid and $nullifnone) {
        $grade = new stdClass();
        $grade->userid   = $userid;
        $grade->rawgrade = NULL;
        qv_grade_item_update($qv, $grade);

    } else {
        qv_grade_item_update($qv);
    }
}

////////////////////////////////////////////////////////////////////////////////
// File API                                                                   //
////////////////////////////////////////////////////////////////////////////////

/**
 * Returns the lists of all browsable file areas within the given module context
 *
 * The file area 'intro' for the activity introduction field is added automatically
 * by {@link file_browser::get_file_info_context_module()}
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param stdClass $context
 * @return array of [(string)filearea] => (string)description
 */
function qv_get_file_areas($course, $cm, $context) {
    return array(
        'content'      => get_string('areacontent',  'qv'),
        'package'      => get_string('areapackage',  'qv')

    );
}

/**
 * File browsing support for qv module content area.
 * @param object $browser
 * @param object $areas
 * @param object $course
 * @param object $cm
 * @param object $context
 * @param string $filearea
 * @param int $itemid
 * @param string $filepath
 * @param string $filename
 * @return object file_info instance or null if not found
 */
function qv_get_file_info($browser, $areas, $course, $cm, $context, $filearea, $itemid, $filepath, $filename) {
    global $CFG;

    if (!has_capability('moodle/course:managefiles', $context)) {
        // students can not peak here!
        return null;
    }

    // no writing for now!

    $fs = get_file_storage();

	if ($filearea === 'content') {

        $filepath = is_null($filepath) ? '/' : $filepath;
        $filename = is_null($filename) ? '.' : $filename;

        $urlbase = $CFG->wwwroot.'/pluginfile.php';
        if (!$storedfile = $fs->get_file($context->id, 'mod_qv', 'content', 0, $filepath, $filename)) {
            if ($filepath === '/' and $filename === '.') {
                $storedfile = new virtual_root_file($context->id, 'mod_qv', 'content', 0);
            } else {
                // not found
                return null;
            }
        }
        require_once("$CFG->dirroot/mod/qv/locallib.php");
        return new qv_package_file_info($browser, $context, $storedfile, $urlbase, $areas[$filearea], true, true, false, false);

    } else if ($filearea === 'package') {
        $filepath = is_null($filepath) ? '/' : $filepath;
        $filename = is_null($filename) ? '.' : $filename;

        $urlbase = $CFG->wwwroot.'/pluginfile.php';
        if (!$storedfile = $fs->get_file($context->id, 'mod_qv', 'package', 0, $filepath, $filename)) {
            if ($filepath === '/' and $filename === '.') {
                $storedfile = new virtual_root_file($context->id, 'mod_qv', 'package', 0);
            } else {
                // not found
                return null;
            }
        }
        return new file_info_stored($browser, $context, $storedfile, $urlbase, $areas[$filearea], false, true, false, false);
    }

    // note: qv_intro handled in file_browser automatically

    return false;
}


/**
 * Serves the files from the qv file areas
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param stdClass $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @return void this should never return to the caller
 */
function mod_qv_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload=false, array $options=array()) {
    global $DB, $CFG;

    if ($context->contextlevel != CONTEXT_MODULE) {
        return false;
    }

    require_login($course, true, $cm);

	$lifetime = isset($CFG->filelifetime) ? $CFG->filelifetime : 86400;

    if ($filearea === 'content') {
		if (!has_capability('mod/qv:view', $context)) {
			return false;
		}
        $revision = (int)array_shift($args); // prevents caching problems - ignored here
        $reference = (int)array_shift($args); //Hack to make foldername match with XML

        $relativepath = implode('/', $args);
        $fullpath = "/$context->id/mod_qv/content/0/$relativepath";

    } else if ($filearea === 'package') {
        if (!has_capability('moodle/course:manageactivities', $context)) {
            return false;
        }
        $revision = (int)array_shift($args); // prevents caching problems - ignored here
        $relativepath = implode('/', $args);
        $fullpath = "/$context->id/mod_qv/package/0/$relativepath";
        $lifetime = 0; // no caching here
    } else {
        return false;
    }

    $fs = get_file_storage();

	if (!$file = $fs->get_file_by_hash(sha1($fullpath)) or $file->is_directory()) {
		if ($filearea === 'content') { //return file not found straight away to improve performance.
            send_header_404();
            die;
        }
        return false;
	}

    // finally send the file
    send_stored_file($file, $lifetime, 0,  false, $options); //DO NOT FORCE DOWNLOAD
}


////////////////////////////////////////////////////////////////////////////////
// Navigation API                                                             //
////////////////////////////////////////////////////////////////////////////////

/**
 * Extends the global navigation tree by adding qv nodes if there is a relevant content
 *
 * This can be called by an AJAX request so do not rely on $PAGE as it might not be set up properly.
 *
 * @param navigation_node $navref An object representing the navigation tree node of the qv module instance
 * @param stdClass $course
 * @param stdClass $module
 * @param cm_info $cm
 */
function qv_extend_navigation(navigation_node $navref, stdclass $course, stdclass $module, cm_info $cm) {
}

/**
 * Extends the settings navigation with the qv settings
 *
 * This function is called when the context for the page is a qv module. This is not called by AJAX
 * so it is safe to rely on the $PAGE.
 *
 * @param settings_navigation $settingsnav {@link settings_navigation}
 * @param navigation_node $qvnode {@link navigation_node}
 */
function qv_extend_settings_navigation(settings_navigation $settingsnav, navigation_node $qvnode=null) {
}

////////////////////////////////////////////////////////////////////////////////
// Reset                                                                      //
////////////////////////////////////////////////////////////////////////////////


/**
 * Removes all grades from gradebook
 * @param int $courseid
 * @param string optional type
 */
function qv_reset_gradebook($courseid) {
    global $CFG, $DB;

    $params = array('courseid'=>$courseid);

    $sql = "SELECT q.*, cm.idnumber as cmidnumber, q.course as courseid
              FROM {qv} q, {course_modules} cm, {modules} m
             WHERE m.name='qv' AND m.id=cm.module AND cm.instance=q.id AND j.course=:courseid ";

    if ($qvs = $DB->get_records_sql($sql, $params)) {
        foreach ($qvs as $qv) {
            qv_grade_item_update($qv, 'reset');
        }
    }
}

/**
 * This function is used by the reset_course_userdata function in moodlelib.
 * This function will remove all posts from the specified qv
 * and clean up any related data.
 * @param $data the data submitted from the reset course.
 * @return array status array
 */
function qv_reset_userdata($data) {
    global $CFG, $DB;

    $componentstr = get_string('modulenameplural', 'choice');
    $status = array();

    if (!empty($data->reset_qv_deleteallsessions)) {
		$activities = $DB->get_fieldset_select('qv','id','course = :courseid',array('courseid'=>$data->courseid));
		foreach($activities as $qvid){
			qv_delete_instance_userdata($qvid);
		}

        // remove all grades from gradebook
        if (empty($data->reset_gradebook_grades)) {
            qv_reset_gradebook($data->courseid);
        }

        $status[] = array('component'=>$componentstr, 'item'=>get_string('deleteallsessions', 'qv'), 'error'=>false);
    }

   return $status;
}

function qv_delete_instance_userdata($qvid){
	global $DB;
	$assignments =  $DB->get_fieldset_select('qv_assignments','id','qvid = :qvid', array('qvid' => $qvid));
	foreach($assignments as $assid){
		$sections =  $DB->get_fieldset_select('qv_sections','id','assignmentid = :assignmentid',  array('assignmentid' => $assid));
		foreach($sections as $sid){
			$DB->delete_records('qv_messages_read', array('sid' => $sid));
			$DB->delete_records('qv_messages', array('sid' => $sid));
		}
		$DB->delete_records('qv_sections', array('assignmentid' => $assid));
	}
	$DB->delete_records('qv_assignments', array('qvid' => $qvid));
}

/**
 * Implementation of the function for printing the form elements that control
 * whether the course reset functionality affects the qv.
 * @param $mform form passed by reference
 */
function qv_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'qvheader', get_string('modulenameplural', 'qv'));
    $mform->addElement('checkbox', 'reset_qv_deleteallsessions', get_string('deleteallsessions', 'qv'));

}

/**
 * Course reset form defaults.
 */
function qv_reset_course_form_defaults($course) {
    return array('reset_qv_deleteallsessions' => 1);
}
