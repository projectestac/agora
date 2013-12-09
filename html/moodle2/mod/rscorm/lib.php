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
 * @package   mod-rscorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/** RSCORM_TYPE_LOCAL = local */
define('RSCORM_TYPE_LOCAL', 'local');
/** RSCORM_TYPE_LOCALSYNC = localsync */
define('RSCORM_TYPE_LOCALSYNC', 'localsync');
/** RSCORM_TYPE_EXTERNAL = external */
define('RSCORM_TYPE_EXTERNAL', 'external');
/** RSCORM_TYPE_IMSREPOSITORY = imsrepository */
define('RSCORM_TYPE_IMSREPOSITORY', 'imsrepository');
/** RSCORM_TYPE_AICCURL = external AICC url */
define('RSCORM_TYPE_AICCURL', 'aiccurl');

define('RSCORM_TOC_SIDE', 0);
define('RSCORM_TOC_HIDDEN', 1);
define('RSCORM_TOC_POPUP', 2);
define('RSCORM_TOC_DISABLED', 3);

//used to check what RSCORM version is being used.
define('RSCORM_12', 1);
define('RSCORM_13', 2);
define('RSCORM_AICC', 3);

/**
 * Return an array of status options
 *
 * Optionally with translated strings
 *
 * @param   bool    $with_strings   (optional)
 * @return  array
 */
function rscorm_status_options($with_strings = false) {
    // Id's are important as they are bits
    $options = array(
        2 => 'passed',
        4 => 'completed'
    );

    if ($with_strings) {
        foreach ($options as $key => $value) {
            $options[$key] = get_string('completionstatus_'.$value, 'rscorm');
        }
    }

    return $options;
}


/**
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will create a new instance and return the id number
 * of the new instance.
 *
 * @global stdClass
 * @global object
 * @uses CONTEXT_MODULE
 * @uses RSCORM_TYPE_LOCAL
 * @uses RSCORM_TYPE_LOCALSYNC
 * @uses RSCORM_TYPE_EXTERNAL
 * @uses RSCORM_TYPE_IMSREPOSITORY
 * @param object $scorm Form data
 * @param object $mform
 * @return int new instance id
 */
function rscorm_add_instance($scorm, $mform=null) {
    global $CFG, $DB;

    require_once($CFG->dirroot.'/mod/rscorm/locallib.php');

// MARSUPIAL ********** AFEGIT - save bookid, unitid and activityid
    $scorm->levelid       = (isset($scorm->levelid))?$scorm->levelid:required_param('level',PARAM_INT);
    $scorm->bookid        = (isset($scorm->isbn))?$scorm->isbn:required_param('isbn',PARAM_INT);
    $scorm->unitid        = (isset($scorm->unit))?$scorm->unit:required_param('unit',PARAM_INT);
    $scorm->activityid    = (isset($scorm->activity))?$scorm->activity:required_param('activity', PARAM_INT);
//********* FI
    if (empty($scorm->timeopen)) {
        $scorm->timeopen = 0;
    }
    if (empty($scorm->timeclose)) {
        $scorm->timeclose = 0;
    }
    $cmid       = $scorm->coursemodule;
    $cmidnumber = $scorm->cmidnumber;
    $courseid   = $scorm->course;

    $context = get_context_instance(CONTEXT_MODULE, $cmid);

    $scorm = rscorm_option2text($scorm);
    $scorm->width  = (int)str_replace('%', '', $scorm->width);
    $scorm->height = (int)str_replace('%', '', $scorm->height);

    if (!isset($scorm->whatgrade)) {
        $scorm->whatgrade = 0;
    }

    $id = $DB->insert_record('rscorm', $scorm);

    /// update course module record - from now on this instance properly exists and all function may be used
    $DB->set_field('course_modules', 'instance', $id, array('id'=>$cmid));

    /// reload scorm instance
    $record = $DB->get_record('rscorm', array('id'=>$id));

    /// store the package and verify
// MARSUPIAL ********** ELIMINAT - not needed becouse save by selects
    /*if ($record->scormtype === RSCORM_TYPE_LOCAL) {
        if ($mform) {
            $filename = $mform->get_new_filename('packagefile');
            if ($filename !== false) {
                $fs = get_file_storage();
                $fs->delete_area_files($context->id, 'mod_rscorm', 'package');
                $mform->save_stored_file('packagefile', $context->id, 'mod_rscorm', 'package', 0, '/', $filename);
                $record->reference = $filename;
            }
        }

    } else if ($record->scormtype === RSCORM_TYPE_LOCALSYNC) {
        $record->reference = $scorm->packageurl;
    } else if ($record->scormtype === RSCORM_TYPE_EXTERNAL) {
        $record->reference = $scorm->packageurl;
    } else if ($record->scormtype === RSCORM_TYPE_IMSREPOSITORY) {
        $record->reference = $scorm->packageurl;
    } else if ($record->scormtype === RSCORM_TYPE_AICCURL) {
        $record->reference = $scorm->packageurl;
    } else {
        return false;
    }

    // save reference
    $DB->update_record('rscorm', $record);*/
//********* FI

    /// extra fields required in grade related functions
    $record->course     = $courseid;
    $record->cmidnumber = $cmidnumber;
    $record->cmid       = $cmid;

// MARSUPIAL ********** ELIMINAT - not needed because save by selects
	//rscorm_parse($record, true);
//********* FI

    rscorm_grade_item_update($record);

    return $record->id;
}

/**
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will update an existing instance with new data.
 *
 * @global stdClass
 * @global object
 * @uses CONTEXT_MODULE
 * @uses RSCORM_TYPE_LOCAL
 * @uses RSCORM_TYPE_LOCALSYNC
 * @uses RSCORM_TYPE_EXTERNAL
 * @uses RSCORM_TYPE_IMSREPOSITORY
 * @param object $rscorm Form data
 * @param object $mform
 * @return bool
 */
function rscorm_update_instance($scorm, $mform=null) {
    global $CFG, $DB;

    require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
// MARSUPIAL ********** AFEGIT - save bookid, unitid and activityid
    $scorm->levelid       = (isset($scorm->levelid))?$scorm->levelid:required_param('level',PARAM_INT);
    $scorm->bookid        = (isset($scorm->isbn))?$scorm->isbn:required_param('isbn',PARAM_INT);
    $scorm->unitid        = (isset($scorm->unit))?$scorm->unit:required_param('unit',PARAM_INT);
    $scorm->activityid    = (isset($scorm->activity))?$scorm->activity:required_param('activity', PARAM_INT);
//********* FI
    if (empty($scorm->timeopen)) {
        $scorm->timeopen = 0;
    }
    if (empty($scorm->timeclose)) {
        $scorm->timeclose = 0;
    }

    $cmid       = $scorm->coursemodule;
    $cmidnumber = $scorm->cmidnumber;
    $courseid   = $scorm->course;

    $scorm->id = $scorm->instance;

    $context = get_context_instance(CONTEXT_MODULE, $cmid);

    // MARSUPIAL ********** ELIMINAT - not needed becouse save by selects
    /*if ($scorm->scormtype === RSCORM_TYPE_LOCAL) {
        if ($mform) {
            $filename = $mform->get_new_filename('packagefile');
            if ($filename !== false) {
                $scorm->reference = $filename;
                $fs = get_file_storage();
                $fs->delete_area_files($context->id, 'mod_rscorm', 'package');
                $mform->save_stored_file('packagefile', $context->id, 'mod_rscorm', 'package', 0, '/', $filename);
            }
        }

    } else if ($scorm->scormtype === RSCORM_TYPE_LOCALSYNC) {
        $scorm->reference = $scorm->packageurl;

    } else if ($scorm->scormtype === RSCORM_TYPE_EXTERNAL) {
        $scorm->reference = $scorm->packageurl;

    } else if ($scorm->scormtype === RSCORM_TYPE_IMSREPOSITORY) {
        $scorm->reference = $scorm->packageurl;
    } else if ($scorm->scormtype === RSCORM_TYPE_AICCURL) {
        $scorm->reference = $scorm->packageurl;
    } else {
        return false;
    }
    */
//********** FI

    $scorm = rscorm_option2text($scorm);
    $scorm->width        = (int)str_replace('%', '', $scorm->width);
    $scorm->height       = (int)str_replace('%', '', $scorm->height);
    $scorm->timemodified = time();

    if (!isset($scorm->whatgrade)) {
        $scorm->whatgrade = 0;
    }

    $DB->update_record('rscorm', $scorm);

    $scorm = $DB->get_record('rscorm', array('id'=>$scorm->id));

    /// extra fields required in grade related functions
    $scorm->course   = $courseid;
    $scorm->idnumber = $cmidnumber;
    $scorm->cmid     = $cmid;

// MARSUPIAL ********** ELIMINAT - not needed because save by selects
    //rscorm_parse($scorm, (bool)$scorm->updatefreq);
//********* FI

    rscorm_grade_item_update($scorm);
    rscorm_update_grades($scorm);

    return true;
}

/**
 * Given an ID of an instance of this module,
 * this function will permanently delete the instance
 * and any data that depends on it.
 *
 * @global stdClass
 * @global object
 * @param int $id Scorm instance id
 * @return boolean
 */
function rscorm_delete_instance($id) {
    global $CFG, $DB;

    if (! $scorm = $DB->get_record('rscorm', array('id'=>$id))) {
        return false;
    }

    $result = true;

    // Delete any dependent records
    if (! $DB->delete_records('rscorm_scoes_track', array('scormid'=>$scorm->id))) {
        $result = false;
    }
    if ($scoes = $DB->get_records('rscorm_scoes', array('scorm'=>$scorm->id))) {
        foreach ($scoes as $sco) {
            if (! $DB->delete_records('rscorm_scoes_data', array('scoid'=>$sco->id))) {
                $result = false;
            }
        }
        // MARSUPIAL ********** AFEGIT - delete data from rscorm_scoes_user to
        if (!$DB->delete_records('rscorm_scoes_users',array('scormid'=>$id))) {
        	$result = false;
        }
        //*********** FI
        $DB->delete_records('rscorm_scoes', array('scorm'=>$scorm->id));
    } else {
        $result = false;
    }
    if (! $DB->delete_records('rscorm', array('id'=>$scorm->id))) {
        $result = false;
    }

    /*if (! $DB->delete_records('scorm_sequencing_controlmode', array('scormid'=>$scorm->id))) {
        $result = false;
    }
    if (! $DB->delete_records('scorm_sequencing_rolluprules', array('scormid'=>$scorm->id))) {
        $result = false;
    }
    if (! $DB->delete_records('scorm_sequencing_rolluprule', array('scormid'=>$scorm->id))) {
        $result = false;
    }
    if (! $DB->delete_records('scorm_sequencing_rollupruleconditions', array('scormid'=>$scorm->id))) {
        $result = false;
    }
    if (! $DB->delete_records('scorm_sequencing_rolluprulecondition', array('scormid'=>$scorm->id))) {
        $result = false;
    }
    if (! $DB->delete_records('scorm_sequencing_rulecondition', array('scormid'=>$scorm->id))) {
        $result = false;
    }
    if (! $DB->delete_records('scorm_sequencing_ruleconditions', array('scormid'=>$scorm->id))) {
        $result = false;
    }*/

    rscorm_grade_item_delete($scorm);

    return $result;
}

/**
 * Return a small object with summary information about what a
 * user has done with a given particular instance of this module
 * Used for user activity reports.
 *
 * @global stdClass
 * @param int $course Course id
 * @param int $user User id
 * @param int $mod
 * @param int $rscorm The scorm id
 * @return mixed
 */
function rscorm_user_outline($course, $user, $mod, $scorm) {
    global $CFG;
    require_once($CFG->dirroot.'/mod/rscorm/locallib.php');

    require_once("$CFG->libdir/gradelib.php");
    $grades = grade_get_grades($course->id, 'mod', 'rscorm', $scorm->id, $user->id);
    if (!empty($grades->items[0]->grades)) {
        $grade = reset($grades->items[0]->grades);
        $result = new stdClass();
        $result->info = get_string('grade') . ': '. $grade->str_long_grade;

        //datesubmitted == time created. dategraded == time modified or time overridden
        //if grade was last modified by the user themselves use date graded. Otherwise use date submitted
        //TODO: move this copied & pasted code somewhere in the grades API. See MDL-26704
        if ($grade->usermodified == $user->id || empty($grade->datesubmitted)) {
            $result->time = $grade->dategraded;
        } else {
            $result->time = $grade->datesubmitted;
        }

        return $result;
    }
    return null;
}

/**
 * Print a detailed representation of what a user has done with
 * a given particular instance of this module, for user activity reports.
 *
 * @global stdClass
 * @global object
 * @param object $course
 * @param object $user
 * @param object $mod
 * @param object $rscorm
 * @return boolean
 */
function rscorm_user_complete($course, $user, $mod, $scorm) {
    global $CFG, $DB, $OUTPUT;
    require_once("$CFG->libdir/gradelib.php");

    $liststyle = 'structlist';
    $now = time();
    $firstmodify = $now;
    $lastmodify = 0;
    $sometoreport = false;
    $report = '';

    // First Access and Last Access dates for SCOs
    require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
    $timetracks = rscorm_get_sco_runtime($scorm->id, false, $user->id);
    $firstmodify = $timetracks->start;
    $lastmodify = $timetracks->finish;

    $grades = grade_get_grades($course->id, 'mod', 'rscorm', $scorm->id, $user->id);
    if (!empty($grades->items[0]->grades)) {
        $grade = reset($grades->items[0]->grades);
        echo $OUTPUT->container(get_string('grade').': '.$grade->str_long_grade);
        if ($grade->str_feedback) {
            echo $OUTPUT->container(get_string('feedback').': '.$grade->str_feedback);
        }
    }

    if ($orgs = $DB->get_records_select('rscorm_scoes', 'scorm = ? AND '.
                                         $DB->sql_isempty('rscorm_scoes', 'launch', false, true).' AND '.
                                         $DB->sql_isempty('rscorm_scoes', 'organization', false, false),
                                         array($scorm->id), 'id', 'id,identifier,title')) {
        if (count($orgs) <= 1) {
            unset($orgs);
            $orgs[]->identifier = '';
        }
        $report .= '<div class="mod-rscorm">'."\n";
        foreach ($orgs as $org) {
            $conditions = array();
            $currentorg = '';
            if (!empty($org->identifier)) {
                $report .= '<div class="orgtitle">'.$org->title.'</div>';
                $currentorg = $org->identifier;
                $conditions['organization'] = $currentorg;
            }
            $report .= "<ul id='0' class='$liststyle'>";
                $conditions['rscorm'] = $scorm->id;
            if ($scoes = $DB->get_records('rscorm_scoes', $conditions, "id ASC")) {
                // drop keys so that we can access array sequentially
                $scoes = array_values($scoes);
                $level=0;
                $sublist=1;
                $parents[$level]='/';
                foreach ($scoes as $pos => $sco) {
                    if ($parents[$level]!=$sco->parent) {
                        if ($level>0 && $parents[$level-1]==$sco->parent) {
                            $report .= "\t\t</ul></li>\n";
                            $level--;
                        } else {
                            $i = $level;
                            $closelist = '';
                            while (($i > 0) && ($parents[$level] != $sco->parent)) {
                                $closelist .= "\t\t</ul></li>\n";
                                $i--;
                            }
                            if (($i == 0) && ($sco->parent != $currentorg)) {
                                $report .= "\t\t<li><ul id='$sublist' class='$liststyle'>\n";
                                $level++;
                            } else {
                                $report .= $closelist;
                                $level = $i;
                            }
                            $parents[$level]=$sco->parent;
                        }
                    }
                    $report .= "\t\t<li>";
                    if (isset($scoes[$pos+1])) {
                        $nextsco = $scoes[$pos+1];
                    } else {
                        $nextsco = false;
                    }
                    if (($nextsco !== false) && ($sco->parent != $nextsco->parent) && (($level==0) || (($level>0) && ($nextsco->parent == $sco->identifier)))) {
                        $sublist++;
                    } else {
                        $report .= '<img src="'.$OUTPUT->pix_url('spacer', 'rscorm').'" alt="" />';
                    }

                    if ($sco->launch) {
                        $score = '';
                        $totaltime = '';
                        if ($usertrack = rscorm_get_tracks($sco->id, $user->id)) {
                            if ($usertrack->status == '') {
                                $usertrack->status = 'notattempted';
                            }
                            $strstatus = get_string($usertrack->status, 'rscorm');
                            $report .= "<img src='".$OUTPUT->pix_url($usertrack->status, 'rscorm')."' alt='$strstatus' title='$strstatus' />";
                        } else {
                            if ($sco->scormtype == 'sco') {
                                $report .= '<img src="'.$OUTPUT->pix_url('notattempted', 'rscorm').'" alt="'.get_string('notattempted', 'rscorm').'" title="'.get_string('notattempted', 'rscorm').'" />';
                            } else {
                                $report .= '<img src="'.$OUTPUT->pix_url('asset', 'rscorm').'" alt="'.get_string('asset', 'rscorm').'" title="'.get_string('asset', 'rscorm').'" />';
                            }
                        }
                        $report .= "&nbsp;$sco->title $score$totaltime</li>\n";
                        if ($usertrack !== false) {
                            $sometoreport = true;
                            $report .= "\t\t\t<li><ul class='$liststyle'>\n";
                            foreach ($usertrack as $element => $value) {
                                if (substr($element, 0, 3) == 'cmi') {
                                    $report .= '<li>'.$element.' => '.s($value).'</li>';
                                }
                            }
                            $report .= "\t\t\t</ul></li>\n";
                        }
                    } else {
                        $report .= "&nbsp;$sco->title</li>\n";
                    }
                }
                for ($i=0; $i<$level; $i++) {
                    $report .= "\t\t</ul></li>\n";
                }
            }
            $report .= "\t</ul><br />\n";
        }
        $report .= "</div>\n";
    }
    if ($sometoreport) {
        if ($firstmodify < $now) {
            $timeago = format_time($now - $firstmodify);
            echo get_string('firstaccess', 'rscorm').': '.userdate($firstmodify).' ('.$timeago.")<br />\n";
        }
        if ($lastmodify > 0) {
            $timeago = format_time($now - $lastmodify);
            echo get_string('lastaccess', 'rscorm').': '.userdate($lastmodify).' ('.$timeago.")<br />\n";
        }
        echo get_string('report', 'rscorm').":<br />\n";
        echo $report;
    } else {
        print_string('noactivity', 'rscorm');
    }

    return true;
}

/**
 * Function to be run periodically according to the moodle cron
 * This function searches for things that need to be done, such
 * as sending out mail, toggling flags etc ...
 *
 * @global stdClass
 * @global object
 * @return boolean
 */
function rscorm_cron () {
    global $CFG, $DB;

    require_once($CFG->dirroot.'/mod/rscorm/locallib.php');

    $sitetimezone = $CFG->timezone;
    /// Now see if there are any scorm updates to be done

    if (!isset($CFG->rscorm_updatetimelast)) {    // To catch the first time
        set_config('rscorm_updatetimelast', 0);
    }

    $timenow = time();
    $updatetime = usergetmidnight($timenow, $sitetimezone);

    if ($CFG->rscorm_updatetimelast < $updatetime and $timenow > $updatetime) {

        set_config('rscorm_updatetimelast', $timenow);

        mtrace('Updating rscorm packages which require daily update');//We are updating

        $scormsupdate = $DB->get_records_select('rscorm', 'updatefreq = ? AND scormtype <> ?', array(RSCORM_UPDATE_EVERYDAY, RSCORM_TYPE_LOCAL));
        foreach ($scormsupdate as $scormupdate) {
            rscorm_parse($scormupdate, true);
        }

        //now clear out AICC session table with old session data
        $cfg_scorm = get_config('rscorm');
        if (!empty($cfg_scorm->allowaicchacp)) {
            $expiretime = time() - ($cfg_scorm->aicchacpkeepsessiondata*24*60*60);
            $DB->delete_records_select('rscorm_aicc_session', 'timemodified < ?', array($expiretime));
        }
    }

    return true;
}

/**
 * Return grade for given user or all users.
 *
 * @global stdClass
 * @global object
 * @param int $scormid id of rscorm
 * @param int $userid optional user id, 0 means all users
 * @return array array of grades, false if none
 */
function rscorm_get_user_grades($scorm, $userid=0) {
    global $CFG, $DB;
    require_once($CFG->dirroot.'/mod/rscorm/locallib.php');

    $grades = array();
    if (empty($userid)) {
        if ($scousers = $DB->get_records_select('rscorm_scoes_track', "scormid=? GROUP BY userid", array($scorm->id), "", "userid,null")) {
            foreach ($scousers as $scouser) {
                $grades[$scouser->userid] = new stdClass();
                $grades[$scouser->userid]->id         = $scouser->userid;
                $grades[$scouser->userid]->userid     = $scouser->userid;
                $grades[$scouser->userid]->rawgrade = rscorm_grade_user($scorm, $scouser->userid);
            }
        } else {
            return false;
        }

    } else {
        if (!$DB->get_records_select('rscorm_scoes_track', "scormid=? AND userid=? GROUP BY userid", array($scorm->id, $userid), "", "userid,null")) {
            return false; //no attempt yet
        }
        $grades[$userid] = new stdClass();
        $grades[$userid]->id         = $userid;
        $grades[$userid]->userid     = $userid;
        $grades[$userid]->rawgrade = rscorm_grade_user($scorm, $userid);
    }

    return $grades;
}

/**
 * Update grades in central gradebook
 *
 * @category grade
 * @param object $rscorm
 * @param int $userid specific user only, 0 mean all
 * @param bool $nullifnone
 */
function rscorm_update_grades($scorm, $userid=0, $nullifnone=true) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');
    require_once($CFG->libdir.'/completionlib.php');

    if ($grades = rscorm_get_user_grades($scorm, $userid)) {
        rscorm_grade_item_update($scorm, $grades);
        //set complete
        rscorm_set_completion($scorm, $userid, COMPLETION_COMPLETE, $grades);
    } else if ($userid and $nullifnone) {
        $grade = new stdClass();
        $grade->userid   = $userid;
        $grade->rawgrade = null;
        rscorm_grade_item_update($scorm, $grade);
        //set incomplete.
        rscorm_set_completion($scorm, $userid, COMPLETION_INCOMPLETE);
    } else {
        rscorm_grade_item_update($scorm);
    }
}

/**
 * Update all grades in gradebook.
 *
 * @global object
 */
function rscorm_upgrade_grades() {
    global $DB;

    $sql = "SELECT COUNT('x')
              FROM {rscorm} s, {course_modules} cm, {modules} m
             WHERE m.name='rscorm' AND m.id=cm.module AND cm.instance=s.id";
    $count = $DB->count_records_sql($sql);

    $sql = "SELECT s.*, cm.idnumber AS cmidnumber, s.course AS courseid
              FROM {rscorm} s, {course_modules} cm, {modules} m
             WHERE m.name='rscorm' AND m.id=cm.module AND cm.instance=s.id";
    $rs = $DB->get_recordset_sql($sql);
    if ($rs->valid()) {
        $pbar = new progress_bar('rscormupgradegrades', 500, true);
        $i=0;
        foreach ($rs as $scorm) {
            $i++;
            upgrade_set_timeout(60*5); // set up timeout, may also abort execution
            rscorm_update_grades($scorm, 0, false);
            $pbar->update($i, $count, "Updating rscorm grades ($i/$count).");
        }
    }
    $rs->close();
}

/**
 * Update/create grade item for given rscorm
 *
 * @category grade
 * @uses GRADE_TYPE_VALUE
 * @uses GRADE_TYPE_NONE
 * @param object $rscorm object with extra cmidnumber
 * @param mixed $grades optional array/object of grade(s); 'reset' means reset grades in gradebook
 * @return object grade_item
 */
function rscorm_grade_item_update($scorm, $grades=null) {
    global $CFG, $DB;
    require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
        require_once($CFG->libdir.'/gradelib.php');
    }

    $params = array('itemname'=>$scorm->name);
    if (isset($scorm->cmidnumber)) {
        $params['idnumber'] = $scorm->cmidnumber;
    }

    if ($scorm->grademethod == RGRADESCOES) {
        if ($maxgrade = $DB->count_records_select('rscorm_scoes', 'scorm = ? AND '.$DB->sql_isnotempty('rscorm_scoes', 'launch', false, true), array($scorm->id))) {
            $params['gradetype'] = GRADE_TYPE_VALUE;
            $params['grademax']  = $maxgrade;
            $params['grademin']  = 0;
        } else {
            $params['gradetype'] = GRADE_TYPE_NONE;
        }
    } else {
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax']  = $scorm->maxgrade;
        $params['grademin']  = 0;
    }

    if ($grades  === 'reset') {
        $params['reset'] = true;
        $grades = null;
    }

    return grade_update('mod/rscorm', $scorm->course, 'mod', 'rscorm', $scorm->id, 0, $grades, $params);
}

/**
 * Delete grade item for given rscorm
 *
 * @category grade
 * @param object $rscorm object
 * @return object grade_item
 */
function rscorm_grade_item_delete($scorm) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    return grade_update('mod/rscorm', $scorm->course, 'mod', 'rscorm', $scorm->id, 0, null, array('deleted'=>1));
}

/**
 * @return array
 */
function rscorm_get_view_actions() {
    return array('pre-view', 'view', 'view all', 'report');
}

/**
 * @return array
 */
function rscorm_get_post_actions() {
    return array();
}

/**
 * @param object $scorm
 * @return object $scorm
 */
function rscorm_option2text($scorm) {
    $scorm_popoup_options = rscorm_get_popup_options_array();

    if (isset($scorm->popup)) {
        if ($scorm->popup == 1) {
            $optionlist = array();
            foreach ($scorm_popoup_options as $name => $option) {
                if (isset($scorm->$name)) {
                    $optionlist[] = $name.'='.$scorm->$name;
                } else {
                    $optionlist[] = $name.'=0';
                }
            }
            $scorm->options = implode(',', $optionlist);
        } else {
            $scorm->options = '';
        }
    } else {
        $scorm->popup = 0;
        $scorm->options = '';
    }
    return $scorm;
}

/**
 * Implementation of the function for printing the form elements that control
 * whether the course reset functionality affects the scorm.
 *
 * @param object $mform form passed by reference
 */
function rscorm_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'rscormheader', get_string('modulenameplural', 'rscorm'));
    $mform->addElement('advcheckbox', 'reset_rscorm', get_string('deleteallattempts', 'rscorm'));
}

/**
 * Course reset form defaults.
 *
 * @return array
 */
function rscorm_reset_course_form_defaults($course) {
    return array('reset_rscorm'=>1);
}

/**
 * Removes all grades from gradebook
 *
 * @global stdClass
 * @global object
 * @param int $courseid
 * @param string optional type
 */
function rscorm_reset_gradebook($courseid, $type='') {
    global $CFG, $DB;

    $sql = "SELECT s.*, cm.idnumber as cmidnumber, s.course as courseid
              FROM {rscorm} s, {course_modules} cm, {modules} m
             WHERE m.name='rscorm' AND m.id=cm.module AND cm.instance=s.id AND s.course=?";

    if ($scorms = $DB->get_records_sql($sql, array($courseid))) {
        foreach ($scorms as $scorm) {
            rscorm_grade_item_update($scorm, 'reset');
        }
    }
}

/**
 * Actual implementation of the reset course functionality, delete all the
 * rscorm attempts for course $data->courseid.
 *
 * @global stdClass
 * @global object
 * @param object $data the data submitted from the reset course.
 * @return array status array
 */
function rscorm_reset_userdata($data) {
    global $CFG, $DB;

    $componentstr = get_string('modulenameplural', 'rscorm');
    $status = array();

    if (!empty($data->reset_scorm)) {
        $scormssql = "SELECT s.id
                         FROM {rscorm} s
                        WHERE s.course=?";

        $DB->delete_records_select('rscorm_scoes_track', "scormid IN ($scormssql)", array($data->courseid));

        // remove all grades from gradebook
        if (empty($data->reset_gradebook_grades)) {
            rscorm_reset_gradebook($data->courseid);
        }

        $status[] = array('component'=>$componentstr, 'item'=>get_string('deleteallattempts', 'rscorm'), 'error'=>false);
    }

    // no dates to shift here

    return $status;
}

/**
 * Returns all other caps used in module
 *
 * @return array
 */
function rscorm_get_extra_capabilities() {
    return array('moodle/site:accessallgroups');
}

/**
 * Lists all file areas current user may browse
 *
 * @param object $course
 * @param object $cm
 * @param object $context
 * @return array
 */
function rscorm_get_file_areas($course, $cm, $context) {
    $areas = array();
    $areas['content'] = get_string('areacontent', 'rscorm');
    $areas['package'] = get_string('areapackage', 'rscorm');
    return $areas;
}

/**
 * File browsing support for RSCORM file areas
 *
 * @package  mod_rscorm
 * @category files
 * @param file_browser $browser file browser instance
 * @param array $areas file areas
 * @param stdClass $course course object
 * @param stdClass $cm course module object
 * @param stdClass $context context object
 * @param string $filearea file area
 * @param int $itemid item ID
 * @param string $filepath file path
 * @param string $filename file name
 * @return file_info instance or null if not found
 */
function rscorm_get_file_info($browser, $areas, $course, $cm, $context, $filearea, $itemid, $filepath, $filename) {
    global $CFG;

    if (!has_capability('moodle/course:managefiles', $context)) {
        return null;
    }

    // no writing for now!

    $fs = get_file_storage();

    if ($filearea === 'content') {

        $filepath = is_null($filepath) ? '/' : $filepath;
        $filename = is_null($filename) ? '.' : $filename;

        $urlbase = $CFG->wwwroot.'/pluginfile.php';
        if (!$storedfile = $fs->get_file($context->id, 'mod_rscorm', 'content', 0, $filepath, $filename)) {
            if ($filepath === '/' and $filename === '.') {
                $storedfile = new virtual_root_file($context->id, 'mod_rscorm', 'content', 0);
            } else {
                // not found
                return null;
            }
        }
        require_once("$CFG->dirroot/mod/rscorm/locallib.php");
        return new rscorm_package_file_info($browser, $context, $storedfile, $urlbase, $areas[$filearea], true, true, false, false);

    } else if ($filearea === 'package') {
        $filepath = is_null($filepath) ? '/' : $filepath;
        $filename = is_null($filename) ? '.' : $filename;

        $urlbase = $CFG->wwwroot.'/pluginfile.php';
        if (!$storedfile = $fs->get_file($context->id, 'mod_rscorm', 'package', 0, $filepath, $filename)) {
            if ($filepath === '/' and $filename === '.') {
                $storedfile = new virtual_root_file($context->id, 'mod_rscorm', 'package', 0);
            } else {
                // not found
                return null;
            }
        }
        return new file_info_stored($browser, $context, $storedfile, $urlbase, $areas[$filearea], false, true, false, false);
    }

    // rscorm_intro handled in file_browser

    return false;
}

/**
 * Serves rscorm content, introduction images and packages. Implements needed access control ;-)
 *
 * @package  mod_rscorm
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
function rscorm_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options=array()) {
    global $CFG;

    if ($context->contextlevel != CONTEXT_MODULE) {
        return false;
    }

    //MARSUPIAL ********** MODIFICA - allow context course
    // 2012.12.17 @abertranb
    require_login($course);
    // ********* ORIGINAL
    //require_login($course, false, $cm);
    // ********* FI

    $lifetime = isset($CFG->filelifetime) ? $CFG->filelifetime : 86400;

    if ($filearea === 'content') {
        $revision = (int)array_shift($args); // prevents caching problems - ignored here
        $relativepath = implode('/', $args);
        $fullpath = "/$context->id/mod_rscorm/content/0/$relativepath";
        // TODO: add any other access restrictions here if needed!

    } else if ($filearea === 'package') {
        if (!has_capability('moodle/course:manageactivities', $context)) {
            return false;
        }
        $relativepath = implode('/', $args);
        $fullpath = "/$context->id/mod_rscorm/package/0/$relativepath";
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
    send_stored_file($file, $lifetime, 0, false, $options);
}

/**
 * @uses FEATURE_GROUPS
 * @uses FEATURE_GROUPINGS
 * @uses FEATURE_GROUPMEMBERSONLY
 * @uses FEATURE_MOD_INTRO
 * @uses FEATURE_COMPLETION_TRACKS_VIEWS
 * @uses FEATURE_COMPLETION_HAS_RULES
 * @uses FEATURE_GRADE_HAS_GRADE
 * @uses FEATURE_GRADE_OUTCOMES
 * @param string $feature FEATURE_xx constant for requested feature
 * @return mixed True if module supports feature, false if not, null if doesn't know
 */
function rscorm_supports($feature) {
    switch($feature) {
        case FEATURE_GROUPS:                  return false;
        case FEATURE_GROUPINGS:               return false;
        case FEATURE_GROUPMEMBERSONLY:        return true;
        case FEATURE_MOD_INTRO:               return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS: return true;
        case FEATURE_COMPLETION_HAS_RULES:    return true;
        case FEATURE_GRADE_HAS_GRADE:         return true;
        case FEATURE_GRADE_OUTCOMES:          return true;
        case FEATURE_BACKUP_MOODLE2:          return true;
        case FEATURE_SHOW_DESCRIPTION:        return true;

        default: return null;
    }
}

/**
 * Get the filename for a temp log file
 *
 * @param string $type - type of log(aicc,rscorm12,rscorm13) used as prefix for filename
 * @param integer $scoid - scoid of object this log entry is for
 * @return string The filename as an absolute path
 */
function rscorm_debug_log_filename($type, $scoid) {
    global $CFG, $USER;

    $logpath = $CFG->tempdir.'/rscormlogs';
    $logfile = $logpath.'/'.$type.'debug_'.$USER->id.'_'.$scoid.'.log';
    return $logfile;
}

/**
 * writes log output to a temp log file
 *
 * @param string $type - type of log(aicc,rscorm12,rscorm13) used as prefix for filename
 * @param string $text - text to be written to file.
 * @param integer $scoid - scoid of object this log entry is for.
 */
function rscorm_debug_log_write($type, $text, $scoid) {

    $debugenablelog = get_config('rscorm', 'allowapidebug');
    if (!$debugenablelog || empty($text)) {
        return;
    }
    if (make_temp_directory('rscormlogs/')) {
        $logfile = rscorm_debug_log_filename($type, $scoid);
        @file_put_contents($logfile, date('Y/m/d H:i:s O')." DEBUG $text\r\n", FILE_APPEND);
    }
}

/**
 * Remove debug log file
 *
 * @param string $type - type of log(aicc,rscorm12,rscorm13) used as prefix for filename
 * @param integer $scoid - scoid of object this log entry is for
 * @return boolean True if the file is successfully deleted, false otherwise
 */
function rscorm_debug_log_remove($type, $scoid) {

    $debugenablelog = get_config('rscorm', 'allowapidebug');
    $logfile = rscorm_debug_log_filename($type, $scoid);
    if (!$debugenablelog || !file_exists($logfile)) {
        return false;
    }

    return @unlink($logfile);
}

/**
 * writes overview info for course_overview block - displays upcoming scorm objects that have a due date
 *
 * @param object $type - type of log(aicc,rscorm12,rscorm13) used as prefix for filename
 * @param array $htmlarray
 * @return mixed
 */
function rscorm_print_overview($courses, &$htmlarray) {
    global $USER, $CFG, $DB;

    if (empty($courses) || !is_array($courses) || count($courses) == 0) {
        return array();
    }

    if (!$scorms = get_all_instances_in_courses('rscorm', $courses)) {
        return;
    }

    $scormids = array();

    // Do rscorm::isopen() here without loading the whole thing for speed
    foreach ($scorms as $key => $scorm) {
        $time = time();
        if ($scorm->timeopen) {
            $isopen = ($scorm->timeopen <= $time && $time <= $scorm->timeclose);
        }
        if (empty($scorm->displayattemptstatus) && (empty($isopen) || empty($scorm->timeclose))) {
            unset($scorms[$key]);
        } else {
            $scormids[] = $scorm->id;
        }
    }

    if (empty($scormids)) {
        // no scorms to look at - we're done
        return true;
    }
    $strscorm   = get_string('modulename', 'rscorm');
    $strduedate = get_string('duedate', 'rscorm');

    foreach ($scorms as $scorm) {
        $str = '<div class="rscorm overview"><div class="name">'.$strscorm. ': '.
               '<a '.($scorm->visible ? '':' class="dimmed"').
               'title="'.$strscorm.'" href="'.$CFG->wwwroot.
               '/mod/rscorm/view.php?id='.$scorm->coursemodule.'">'.
               $scorm->name.'</a></div>';
        if ($scorm->timeclose) {
            $str .= '<div class="info">'.$strduedate.': '.userdate($scorm->timeclose).'</div>';
        }
        if ($scorm->displayattemptstatus == 1) {
            require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
            $str .= '<div class="details">'.rscorm_get_attempt_status($USER, $scorm).'</div>';
        }
        $str .= '</div>';
        if (empty($htmlarray[$scorm->course]['rscorm'])) {
            $htmlarray[$scorm->course]['rscorm'] = $str;
        } else {
            $htmlarray[$scorm->course]['rscorm'] .= $str;
        }
    }
}

/**
 * Return a list of page types
 * @param string $pagetype current page type
 * @param stdClass $parentcontext Block's parent context
 * @param stdClass $currentcontext Current context of block
 */
function rscorm_page_type_list($pagetype, $parentcontext, $currentcontext) {
    $module_pagetype = array('mod-rscorm-*'=>get_string('page-mod-rscorm-x', 'rscorm'));
    return $module_pagetype;
}

/**
 * Returns the RSCORM version used.
 * @param string $rscormversion comes from $scorm->version
 * @param string $version one of the defined vars RSCORM_12, RSCORM_13, RSCORM_AICC (or empty)
 * @return Scorm version.
 */
function rscorm_version_check($scormversion, $version='') {
    $scormversion = trim(strtolower($scormversion));
    if (empty($version) || $version==RSCORM_12) {
        if ($scormversion == 'rscorm_12' || $scormversion == 'rscorm_1.2') {
            return RSCORM_12;
        }
        if (!empty($version)) {
            return false;
        }
    }
    if (empty($version) || $version == RSCORM_13) {
        if ($scormversion == 'rscorm_13' || $scormversion == 'rscorm_1.3') {
            return RSCORM_13;
        }
        if (!empty($version)) {
            return false;
        }
    }
    if (empty($version) || $version == RSCORM_AICC) {
        if (textlib::strpos($scormversion, 'aicc')) {
            return RSCORM_AICC;
        }
        if (!empty($version)) {
            return false;
        }
    }
    return false;
}

/**
 * Obtains the automatic completion state for this rscorm based on any conditions
 * in rscorm settings.
 *
 * @param object $course Course
 * @param object $cm Course-module
 * @param int $userid User ID
 * @param bool $type Type of comparison (or/and; can be used as return value if no conditions)
 * @return bool True if completed, false if not. (If no conditions, then return
 *   value depends on comparison type)
 */
function rscorm_get_completion_state($course, $cm, $userid, $type) {
    global $DB;

    $result = $type;

    // Get rscorm
    if (!$scorm = $DB->get_record('rscorm', array('id' => $cm->instance))) {
        print_error('cannotfindscorm');
    }
    // Only check for existence of tracks and return false if completionstatusrequired or completionscorerequired
    // this means that if only view is required we don't end up with a false state.
    if ($scorm->completionstatusrequired !== null ||
        $scorm->completionscorerequired !== null) {
        // Get user's tracks data.
        $tracks = $DB->get_records_sql(
            "
            SELECT
                id,
                element,
                value
            FROM
                {rscorm_scoes_track}
            WHERE
                scormid = ?
            AND userid = ?
            AND element IN
            (
                'cmi.core.lesson_status',
                'cmi.completion_status',
                'cmi.success_status',
                'cmi.core.score.raw',
                'cmi.score.raw'
            )
            ",
            array($scorm->id, $userid)
        );

        if (!$tracks) {
            return completion_info::aggregate_completion_states($type, $result, false);
        }
    }

    // Check for status
    if ($scorm->completionstatusrequired !== null) {

        // Get status
        $statuses = array_flip(rscorm_status_options());
        $nstatus = 0;

        foreach ($tracks as $track) {
            if (!in_array($track->element, array('cmi.core.lesson_status', 'cmi.completion_status', 'cmi.success_status'))) {
                continue;
            }

            if (array_key_exists($track->value, $statuses)) {
                $nstatus |= $statuses[$track->value];
            }
        }

        if ($scorm->completionstatusrequired & $nstatus) {
            return completion_info::aggregate_completion_states($type, $result, true);
        } else {
            return completion_info::aggregate_completion_states($type, $result, false);
        }

    }

    // Check for score
    if ($scorm->completionscorerequired !== null) {
        $maxscore = -1;

        foreach ($tracks as $track) {
            if (!in_array($track->element, array('cmi.core.score.raw', 'cmi.score.raw'))) {
                continue;
            }

            if (textlib::strlen($track->value) && floatval($track->value) >= $maxscore) {
                $maxscore = floatval($track->value);
            }
        }

        if ($scorm->completionscorerequired <= $maxscore) {
            return completion_info::aggregate_completion_states($type, $result, true);
        } else {
            return completion_info::aggregate_completion_states($type, $result, false);
        }
    }

    return $result;
}

/**
 * Register the ability to handle drag and drop file uploads
 * @return array containing details of the files / types the mod can handle
 */
function rscorm_dndupload_register() {
    return array('files' => array(
        array('extension' => 'zip', 'message' => get_string('dnduploadscorm', 'rscorm'))
    ));
}

/**
 * Handle a file that has been uploaded
 * @param object $uploadinfo details of the file / content that has been uploaded
 * @return int instance id of the newly created mod
 */
function rscorm_dndupload_handle($uploadinfo) {

    $context = context_module::instance($uploadinfo->coursemodule);
    file_save_draft_area_files($uploadinfo->draftitemid, $context->id, 'mod_rscorm', 'package', 0);
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'mod_rscorm', 'package', 0, 'sortorder, itemid, filepath, filename', false);
    $file = reset($files);

    // Validate the file, make sure it's a valid RSCORM package!
    $packer = get_file_packer('application/zip');
    $filelist = $file->list_files($packer);

    if (!is_array($filelist)) {
        return false;
    } else {
        $manifestpresent = false;
        $aiccfound = false;

        foreach ($filelist as $info) {
            if ($info->pathname == 'imsmanifest.xml') {
                $manifestpresent = true;
                break;
            }

            if (preg_match('/\.cst$/', $info->pathname)) {
                $aiccfound = true;
                break;
            }
        }

        if (!$manifestpresent && !$aiccfound) {
            return false;
        }
    }

    // Create a default scorm object to pass to scorm_add_instance()!
    $scorm = get_config('rscorm');
    $scorm->course = $uploadinfo->course->id;
    $scorm->coursemodule = $uploadinfo->coursemodule;
    $scorm->cmidnumber = '';
    $scorm->name = $uploadinfo->displayname;
    $scorm->scormtype = RSCORM_TYPE_LOCAL;
    $scorm->reference = $file->get_filename();
    $scorm->intro = '';
    $scorm->width = $scorm->framewidth;
    $scorm->height = $scorm->frameheight;

    return rscorm_add_instance($scorm, null);
}

/**
 * Sets activity completion state
 *
 * @param object $rscorm object
 * @param int $userid User ID
 * @param int $completionstate Completion state
 * @param array $grades grades array of users with grades - used when $userid = 0
 */
function rscorm_set_completion($rscorm, $userid, $completionstate = COMPLETION_COMPLETE, $grades = array()) {
	$course = new stdClass();
	$course->id = $rscorm->course;
	$completion = new completion_info($course);

	// Check if completion is enabled site-wide, or for the course
	if (!$completion->is_enabled()) {
		return;
	}

	$cm = get_coursemodule_from_instance('rscorm', $rscorm->id, $rscorm->course);
	if (empty($cm) || !$completion->is_enabled($cm)) {
		return;
	}

	if (empty($userid)) {
		//we need to get all the relevant users from $grades param.
		foreach ($grades as $grade) {
			$completion->update_state($cm, $completionstate, $grade->userid);
		}
	} else {
		$completion->update_state($cm, $completionstate, $userid);
	}
}

/*function rscorm_set_completion($scorm, $userid, $completionstate = COMPLETION_COMPLETE, $grades = array()) {
    if (!completion_info::is_enabled()) {
        return;
    }

    $course = new stdClass();
    $course->id = $scorm->course;

    $cm = get_coursemodule_from_instance('rscorm', $scorm->id, $scorm->course);
    if (!empty($cm)) {
        $completion = new completion_info($course);
        if (empty($userid)) { //we need to get all the relevant users from $grades param.
            foreach ($grades as $grade) {
                $completion->update_state($cm, $completionstate, $grade->userid);
            }
        } else {
            $completion->update_state($cm, $completionstate, $userid);
        }
    }
}
*/