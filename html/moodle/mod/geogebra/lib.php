<?php

//Contants defining grading method
define('GEOGEBRA_NO_GRADING', 0);
define('GEOGEBRA_AVERAGE_GRADE', 1);
define('GEOGEBRA_HIGHEST_GRADE', 2);
define('GEOGEBRA_LOWEST_GRADE', 3);
define('GEOGEBRA_FIRST_GRADE', 4);
define('GEOGEBRA_LAST_GRADE', 5);

define('GEOGEBRA_UPDATE_STUDENT', 0);
define('GEOGEBRA_UPDATE_TEACHER', 1);

// GeoGebra applet vars
define('GEOGEBRA_DEFAULT_CODEBASE', 'http://www.geogebra.org/webstart/4.0/unsigned/');
define('GEOGEBRA_ARCHIVE', 'geogebra.jar');
define('GEOGEBRA_CODE', 'geogebra.GeoGebraApplet');

function geogebra_get_javacodebase() {
    global $CFG;
    if (isset($CFG->geogebra_javacodebase))
        return $CFG->geogebra_javacodebase;
    return GEOGEBRA_DEFAULT_CODEBASE;
}

/**
 * Returns a geogebra attempt
 *
 * @param int $attemptid ID of the attempt
 * @return object attempt
 */
function geogebra_get_attempt($attemptid) {
    return (get_record('geogebra_attempts', 'id', $attemptid));
}

function geogebra_add_attempt($geogebraid, $userid, $vars, $finished = 1) {
    $register->geogebra = $geogebraid;
    $register->userid = $userid;
    $register->vars = $vars;
    $register->finished = $finished;
    $register->datestudent = time();

    return (insert_record('geogebra_attempts', $register) !== false);
}

/**
 * Updates an existing intance of a geogebra attempt
 * with the new data.
 *
 * @param int $attemptid ID of the attempt to be updated
 * @param string $vars Attempt vars to be updated
 * @param string $gradecomment Comment to the grade
 * @param boolean $finished Attempt finished/unfinished
 * @return boolean Success/Fail
 */
function geogebra_update_attempt($attemptid, $vars, $actionby, $gradecomment = null, $finished = 1) {

    $register->id = $attemptid;
    $register->vars = $vars;
    $register->gradecomment = $gradecomment;
    $register->finished = $finished;
    //Modified by student or teacher
    if ($actionby == GEOGEBRA_UPDATE_STUDENT) {
        $register->datestudent = time();
    } else if ($actionby == GEOGEBRA_UPDATE_TEACHER) {
        $register->dateteacher = time();
    }

    return (update_record('geogebra_attempts', $register) !== false);
}

/**
 * Updates an existing intance of a geogebra attempt
 * with new grading information.
 *
 * @param int $attemptid ID of the attempt to be updated
 * @param string $vars Attempt vars to be updated
 * @param string $gradecomment Comment to the grade
 * @return boolean Success/Fail
 */
/*function geogebra_update_attempt_grade($attemptid, $vars, $gradecomment = null) {
    $register->id = $attemptid;
    $register->vars = $vars;
    $register->gradecomment = $gradecomment;

    return (update_record('geogebra_attempts', $register) !== false);
}*/

function geogebra_setValues(&$geogebra) {

    $enableRightClick = isset($geogebra->enableRightClick) && $geogebra->enableRightClick;
    $enableLabelDrags = isset($geogebra->enableLabelDrags) && $geogebra->enableLabelDrags;
    $showResetIcon = isset($geogebra->showResetIcon) && $geogebra->showResetIcon;
    $showMenuBar = isset($geogebra->showMenuBar) && $geogebra->showMenuBar;
    $showToolBar = isset($geogebra->showToolBar) && $geogebra->showToolBar;
    $showToolBarHelp = isset($geogebra->showToolBarHelp) && $geogebra->showToolBarHelp;
    $language = $geogebra->language;
    //$showAlgebraInput = isset($geogebra->showAlgebraInput) && $geogebra->showAlgebraInput;
    $geogebra->url = http_build_query(array(
        'filename' => $geogebra->filename,
        'enableRightClick' => $enableRightClick,
        'enableLabelDrags' => $enableLabelDrags,
        'showResetIcon' => $showResetIcon,
        'showMenuBar' => $showMenuBar,
        'showToolBar' => $showToolBar,
        'showToolBarHelp' => $showToolBarHelp,
        'language' => $language
            ), '', '&');

    $geogebra->showsubmit = isset($geogebra->showsubmit);
}

function geogebra_file_exists($data) {
    global $CFG;

    $filename = $CFG->dataroot . "/" . $data['course'] . "/" . $data['filename'];
    $file_exists = file_exists($filename);
    return $file_exists;
}

function geogebra_validate($data) {
    $validation = new stdClass();
    $validation->errors = array();

    // Check if specified file is valid
    if (!empty($data['filename'])) {
        if (substr($data['filename'], 0, 4) == 'http') {
            // At the moment is not possible to use external files
            $validation->errors['filename'] = get_string('httpnotallowed', 'geogebra');
            $validation->result = false;
        } else if (!geogebra_file_exists($data)) {
            $validation->errors['filename'] = get_string('filenotfound', 'geogebra');
            $validation->result = false;
        } else {
            $validation->result = true;
        }
    }

    return $validation;
}

/**
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will create a new instance and return the id number
 * of the new instance.
 *
 * @param object $geogebra An object from the form in mod_form.php
 * @return int The id of the newly inserted geogebra record
 */
function geogebra_add_instance($geogebra) {
    geogebra_setValues($geogebra);
    $geogebra->timecreated = time();

    //return insert_record('geogebra', $geogebra);

    if ($returnid = insert_record('geogebra', $geogebra)) {
        $geogebra->id = $returnid;

        if ($geogebra->timedue) {
            $event = new object();
            $event->name = $geogebra->name;
            $event->description = $geogebra->intro;
            $event->courseid = $geogebra->course;
            $event->groupid = 0;
            $event->userid = 0;
            $event->modulename = 'geogebra';
            $event->instance = $returnid;
            $event->eventtype = 'due';
            $event->timestart = $geogebra->timedue;
            $event->timeduration = 0;

            add_event($event);
        }

        geogebra_grade_item_update($geogebra);
    }

    return $returnid;
}

/**
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will update an existing instance with new data.
 *
 * @param object $geogebra An object from the form in mod_form.php
 * @return boolean Success/Fail
 */
function geogebra_update_instance($geogebra) {
    geogebra_setValues($geogebra);
    $geogebra->timemodified = time();
    $geogebra->id = $geogebra->instance;

    if (!update_record('geogebra', $geogebra)) {
        return false;
    }

    if ($geogebra->timedue) {
        $event = new object();

        if ($event->id = get_field('event', 'id', 'modulename', 'geogebra', 'instance', $geogebra->id)) {

            $event->name = $geogebra->name;
            $event->description = $geogebra->intro;
            $event->timestart = $geogebra->timedue;

            update_event($event);
        } else {
            $event = new object();
            $event->name = $geogebra->name;
            $event->description = $geogebra->intro;
            $event->courseid = $geogebra->course;
            $event->groupid = 0;
            $event->userid = 0;
            $event->modulename = 'geogebra';
            $event->instance = $geogebra->id;
            $event->eventtype = 'due';
            $event->timestart = $geogebra->timedue;
            $event->timeduration = 0;

            add_event($event);
        }
    } else {
        delete_records('event', 'modulename', 'geogebra', 'instance', $geogebra->id);
    }

    geogebra_grade_item_update($geogebra);
    geogebra_update_grades($geogebra);
    return true;
}

/**
 * Given an ID of an instance of this module,
 * this function will permanently delete the instance
 * and any data that depends on it.
 *
 * @param int $id Id of the module instance
 * @return boolean Success/Failure
 */
function geogebra_delete_instance($id) {
    $result = true;

    if (!$geogebra = get_record('geogebra', 'id', $id)) {
        return false;
    }

    if (!delete_records('geogebra_attempts', 'geogebra', $id)) {
        $result = false;
    }

    if (!delete_records('geogebra', 'id', $id)) {
        $result = false;
    }

    if (!delete_records('event', 'modulename', 'geogebra', 'instance', $id)) {
        $result = false;
    }

    geogebra_grade_item_delete($geogebra);

    return $result;
}

/**
 * Return a small object with summary information about what a
 * user has done with a given particular instance of this module
 * Used for user activity reports.
 * $return->time = the time they did it
 * $return->info = a short text description
 *
 * @return null
 * @todo Finish documenting this function
 */
function geogebra_user_outline($course, $user, $mod, $geogebra) {
    $return = new stdClass;
    $return->time = 0;
    $return->info = '';

    return $return;
}

/**
 * Print a detailed representation of what a user has done with
 * a given particular instance of this module, for user activity reports.
 *
 * @return boolean
 * @todo Finish documenting this function
 */
function geogebra_user_complete($course, $user, $mod, $geogebra) {
    return true;
}

/**
 * Given a course and a time, this module should find recent activity
 * that has occurred in geogebra activities and print it out.
 * Return true if there was output, or false is there was none.
 *
 * @return boolean
 * @todo Finish documenting this function
 */
function geogebra_print_recent_activity($course, $isteacher, $timestart) {
    return false;  //  True if anything was printed, otherwise false
}

/**
 * Function to be run periodically according to the moodle cron
 * This function searches for things that need to be done, such
 * as sending out mail, toggling flags etc ...
 *
 * @return boolean
 * @todo Finish documenting this function
 * */
function geogebra_cron() {
    return true;
}

/**
 * Must return an array of user records (all data) who are participants
 * for a given instance of geogebra. Must include every user involved
 * in the instance, independient of his role (student, teacher, admin...)
 * See other modules as example.
 *
 * @param int $geogebraid ID of an instance of this module
 * @return mixed boolean/array of students
 */
function geogebra_get_participants($geogebraid) {
    global $CFG;

    //Get students
    $students = get_records_sql("SELECT DISTINCT u.id, u.id as userid
                                 FROM {$CFG->prefix}user u,
                                      {$CFG->prefix}geogebra_attempts ga
                                 WHERE ga.geogebra = '$geogebraid' and
                                       u.id = ga.userid");
    //Return students array (it contains an array of unique users)
    return ($students);
}

/**
 * This function returns if a scale is being used by one geogebra
 * if it has support for grading and scales. Commented code should be
 * modified if necessary. See forum, glossary or journal modules
 * as reference.
 *
 * @param int $geogebraid ID of an instance of this module
 * @return mixed
 * @todo Finish documenting this function
 */
function geogebra_scale_used($geogebraid, $scaleid) {
//This function returns if a scale is being used by one geogebra

    $return = false;

    $rec = get_record("geogebra", "id", "$geogebraid", "grade", "-$scaleid");

    if (!empty($rec) && !empty($scaleid)) {
        $return = true;
    }

    return $return;
}

/**
 * Checks if scale is being used by any instance of geogebra.
 * This function was added in 1.9
 *
 * This is used to find out if scale used anywhere
 * @param $scaleid int
 * @return boolean True if the scale is used by any geogebra
 */
function geogebra_scale_used_anywhere($scaleid) {
    return ($scaleid && record_exists('geogebra', 'grade', -$scaleid));
}

/**
 * Execute post-install custom actions for the module
 * This function was added in 1.9
 *
 * @return boolean true if success, false on error
 */
function geogebra_install() {
    return true;
}

/**
 * Execute post-uninstall custom actions for the module
 * This function was added in 1.9
 *
 * @return boolean true if success, false on error
 */
function geogebra_uninstall() {
    return true;
}

/**
 * Update grades by firing grade_updated event
 *
 * @param object $geogebra null means all geogebras
 * @param int $userid specific user only, 0 mean all
 * @param boolean $nullifnone return null if grade does not exist
 * @return void
 */
function geogebra_update_grades($geogebra = null, $userid = 0, $nullifnone = true) {
    global $CFG;

    if ($geogebra != null) {
        require_once($CFG->libdir . '/gradelib.php');
        if ($userid == 0) {
            $students = geogebra_get_participants($geogebra->id);
            if (!empty($students)) {
                foreach ($students as $student) {
                    if ($grades = geogebra_get_user_grades($geogebra, $student->id)) {
                        if ($grades->grade != '') {
                            geogebra_grade_item_update($geogebra, $grades);
                        }
                    }
                }
            }
        } else {
            if ($grades = geogebra_get_user_grades($geogebra, $userid)) {
                if ($grades->grade != '') {
                    geogebra_grade_item_update($geogebra, $grades);
                }
            } else if ($userid and $nullifnone) {
                $grade = new object();
                $grade->userid = $userid;
                $grade->rawgrade = NULL;
                geogebra_grade_item_update($geogebra, $grade);
            } else {
                geogebra_grade_item_update($geogebra);
            }
        }
    } else {
        $sql = "SELECT g.*, cm.idnumber as cmidnumber
                  FROM {$CFG->prefix}geogebra g, {$CFG->prefix}course_modules cm, {$CFG->prefix}modules m
                 WHERE m.name='geogebra' AND m.id=cm.module AND cm.instance=g.id";
        if ($rs = get_recordset_sql($sql)) {
            while ($geogebra = rs_fetch_next_record($rs)) {
                geogebra_update_grades($geogebra, 0, false);
            }
            rs_close($rs);
        }
    }
    return true;
}

/**
 * Create/update grade item for given geogebra
 *
 * @param object $geogebra object with extra cmidnumber
 * @param mixed optional array/object of grade(s); 'reset' means reset grades in gradebook
 * @return int 0 if ok
 */
function geogebra_grade_item_update($geogebra, $grades = NULL) {
    global $CFG;
    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
        require_once($CFG->libdir . '/gradelib.php');
    }

    $params = array('itemname' => $geogebra->name, 'idnumber' => $geogebra->cmidnumber);

    if ($geogebra->grade == GEOGEBRA_NO_GRADING) {
        $params['gradetype'] = GRADE_TYPE_NONE;
    } else if ($geogebra->grade < 0) {
        $params['gradetype'] = GRADE_TYPE_SCALE;
        $params['scaleid'] = -$geogebra->grade;
    } else {
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax'] = $geogebra->grade;
        $params['grademin'] = 0;
    }

    if ($grades === 'reset') {
        $params['reset'] = true;
        $grades = NULL;
    }

    return grade_update('mod/geogebra', $geogebra->course, 'mod', 'geogebra', $geogebra->id, 0, $grades, $params);
}

/**
 * Delete grade item for given geogebra
 *
 * @param object $forum object
 * @return object grade_item
 */
function geogebra_grade_item_delete($geogebra) {
    global $CFG;
    require_once($CFG->libdir . '/gradelib.php');

    return grade_update('mod/geogebra', $geogebra->course, 'mod', 'geogebra', $geogebra->id, 0, NULL, array('deleted' => 1));
}

/**
 * Returns if a geogegra activity is configured to allow attempts.
 *
 * @param object $geogebra object
 * @return boolean
 */
function geogebra_attempts_allowed($geogebra) {
    
}

/**
 * Returns the grade informacion for a user and geogebra activity
 * acording to the chosen grademethod.
 *
 * @param object $geogebra
 * @param int $userid
 * @return mixed
 */
function geogebra_get_user_grades($geogebra, $userid) {
    if ($geogebra->maxattempts == 0) {
        $attempt = geogebra_get_unique_attempt_grade($geogebra->id, $userid);
    } else {
        switch ($geogebra->grademethod) {
            case GEOGEBRA_NO_GRADING:
                $attempt = geogebra_get_nograding_grade($geogebra->id, $userid);
                break;
            case GEOGEBRA_AVERAGE_GRADE:
                $attempt = (geogebra_get_average_grade($geogebra->id, $userid));
                break;
            case GEOGEBRA_HIGHEST_GRADE:
                $attempt = (geogebra_get_highest_attempt_grade($geogebra->id, $userid));
                break;
            case GEOGEBRA_LOWEST_GRADE:
                $attempt = (geogebra_get_lowest_attempt_grade($geogebra->id, $userid));
                break;
            case GEOGEBRA_FIRST_GRADE:
                $attempt = (geogebra_get_first_attempt_grade($geogebra->id, $userid));
                break;
            case GEOGEBRA_LAST_GRADE:
                $attempt = (geogebra_get_last_attempt_grade($geogebra->id, $userid));
                break;
        }
    }
    return $attempt;
}

/**
 * Finds the unique attempt for a given user and geogebra.
 *
 * @param int $geogebraid ID of an instance of this module
 * @param int $userid ID of a user
 * @return mixed boolean/object with userid, grade, rawgrade, grademax, attempts, duration and date
 */
function geogebra_get_unique_attempt_grade($geogebraid, $userid) {
    global $CFG;
    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1';

    if ($attempt = get_record_sql($select . $from . $where)) {
        if (empty($attempt)) {
            return false;
        } else {
            parse_str($attempt->vars, $parsedVars);

            $result->userid = $userid;
            $result->grade = $parsedVars['grade'];
            $result->rawgrade = $result->grade;
            //     $result->grademax = $parsedVars['maxGrade'];
            $result->attempts = geogebra_count_finished_attempts($geogebraid, $userid);
            $result->duration = $parsedVars['duration'];
            $result->dateteacher = $attempt->dateteacher;
            $result->datestudent = $attempt->datestudent;

            return $result;
        }
    } else
        return false;
}

/**
 * Calculates number of attempts, the average grade and average duration 
 * of all attemps for a given user and geogebra
 *
 * @param int $geogebraid ID of an instance of this module
 * @param int $userid ID of a user
 * @return mixed boolean/object with userid, grade, rawgrade, grademax, attempts, duration and date
 */
function geogebra_get_nograding_grade($geogebraid, $userid) {
    global $CFG;

    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1';

    if ($attempts = get_records_sql($select . $from . $where)) {
        $count = 0;
        $durationsum = 0;
        foreach ($attempts as $attempt) {
            $count++;
            parse_str($attempt->vars, $parsedVars);
            $durationsum += $parsedVars['duration'];
        }

        $result->userid = $userid;
        $result->grade = 0;
        $result->rawgrade = 0;
        $result->attempts = $count; //A revisar quan ATTEMPS estigui llest
        $result->duration = round($durationsum, 2);
        $result->dateteacher = '';
        $result->datestudent = '';

        return $result;
    } else
        return false;
}

/**
 * Calculates number of attempts, the average grade and average duration 
 * of all attemps for a given user and geogebra
 *
 * @param int $geogebraid ID of an instance of this module
 * @param int $userid ID of a user
 * @return mixed boolean/object with userid, grade, rawgrade, grademax, attempts, duration and date
 */
function geogebra_get_average_grade($geogebraid, $userid) {
    global $CFG;

    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1';

    if ($attempts = get_records_sql($select . $from . $where)) {

        $durationsum = 0;
        $gradessum = 0;
        $count = 0;
        foreach ($attempts as $attempt) {
            parse_str($attempt->vars, $parsedVars);
            if ($parsedVars['grade'] >= 0) { //only attempt with valid grade
                $count++;
                $gradessum += $parsedVars['grade'];
                $durationsum += $parsedVars['duration'];
            }
        }
        if ($count > 0) {
            $result->userid = $userid;
            $result->grade = round($gradessum / $count, 2);
            $result->rawgrade = $result->grade;
            $result->attempts = count($attempts); //A revisar quan ATTEMPS estigui llest
            $result->duration = round($durationsum / $count, 2);
            $result->dateteacher = '';
            $result->datestudent = '';

            return $result;
        } else {
            $result->userid = $userid;
            $result->grade = '';
            $result->rawgrade = '';
            $result->attempts = count($attempts);
            $result->duration = '';
            $result->dateteacher = '';
            $result->datestudent = '';

            return $result;
        }
    } else
        return false;
}

/**
 * Finds the last attempt for a given user and geogebra.
 *
 * @param int $geogebraid ID of an instance of this module
 * @param int $userid ID of a user
 * @return mixed boolean/object with userid, grade, rawgrade, grademax, attempts, duration and date
 */
function geogebra_get_last_attempt_grade($geogebraid, $userid) {
    global $CFG;

    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE `datestudent` = (SELECT MAX(datestudent) FROM ' . $CFG->prefix . 'geogebra_attempts WHERE 
        userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1)';


    if ($attempt = get_record_sql($select . $from . $where)) {
        if (empty($attempt)) {
            return false;
        }
        parse_str($attempt->vars, $parsedVars);
        if ($parsedVars['grade'] < 0) { //last attempt not graded
            $result->userid = $userid;
            $result->grade = '';
            $result->gradecomment = '';
            $result->rawgrade = '';
            $result->attempts = geogebra_count_finished_attempts($geogebraid, $userid);
            $result->duration = '';
            $result->dateteacher = '';
            $result->datestudent = '';

            return $result;
        } else {
            $result->userid = $userid;
            $result->grade = $parsedVars['grade'];
            $result->gradecomment = $attempt->gradecomment;
            $result->rawgrade = $result->grade;
            $result->attempts = geogebra_count_finished_attempts($geogebraid, $userid);
            $result->duration = $parsedVars['duration'];
            $result->dateteacher = $attempt->dateteacher;
            $result->datestudent = $attempt->datestudent;

            return $result;
        }
    } else
        return false;
}

/**
 * Finds the firt attempt for a given user and geogebra.
 *
 * @param int $geogebraid ID of an instance of this module
 * @param int $userid ID of a user
 * @return mixed boolean/object with userid, grade, rawgrade, grademax, attempts, duration and date
 */
function geogebra_get_first_attempt_grade($geogebraid, $userid) {
    global $CFG;

    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE `datestudent` = (SELECT MIN(datestudent) FROM ' . $CFG->prefix . 'geogebra_attempts WHERE 
        userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1)';

    if ($attempt = get_record_sql($select . $from . $where)) {
        if (empty($attempt)) {
            return false;
        }
        parse_str($attempt->vars, $parsedVars);
        if ($parsedVars['grade'] < 0) { //first attempt not graded
            $result->userid = $userid;
            $result->grade = '';
            $result->gradecomment = '';
            $result->rawgrade = '';
            $result->attempts = geogebra_count_finished_attempts($geogebraid, $userid);
            $result->duration = '';
            $result->dateteacher = '';
            $result->datestudent = '';

            return $result;
        } else {

            $result->userid = $userid;
            $result->grade = $parsedVars['grade'];
            $result->gradecomment = $attempt->gradecomment;
            $result->rawgrade = $result->grade;
            $result->attempts = geogebra_count_finished_attempts($geogebraid, $userid);
            $result->duration = $parsedVars['duration'];
            $result->dateteacher = $attempt->dateteacher;
            $result->datestudent = $attempt->datestudent;

            return $result;
        }
    }else
        return false;
}

/**
 * Finds the attempt with the highest grade for a given user and geogebra.
 * If more than one attempt has the same grade, gets one with less duration.
 *
 * @param int $geogebraid ID of an instance of this module
 * @param int $userid ID of a user
 * @return mixed boolean/object with userid, grade, rawgrade, grademax, attempts, duration and date
 */
function geogebra_get_highest_attempt_grade($geogebraid, $userid) {
    global $CFG;

    // 1 - All attemps
    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1';

    if ($attempts = get_records_sql($select . $from . $where)) {

        // 2 - Get highest graded attempt
        $maxgrade = 0;
        $maxattempt = null;
        $mintime = PHP_INT_MAX;

        foreach ($attempts as $attempt) {

            parse_str($attempt->vars, $parsedVars);

            if ($parsedVars['grade'] >= 0) {//only attempt with valid grade
                if ($parsedVars['grade'] > $maxgrade) { // Highter grade
                    $maxattempt = $attempt;
                    $maxgrade = $parsedVars['grade'];
                    $mintime = $parsedVars['duration'];
                } else if ($parsedVars['grade'] == $maxgrade) { // If same grade,
                    if ($parsedVars['duration'] < $mintime) { // get the faster attempt
                        $maxattempt = $attempt;
                        $maxgrade = $parsedVars['grade'];
                        $mintime = $parsedVars['duration'];
                    }
                }
            }
        }
        // 3 - Prepare return values
        if (isset($maxattempt)) {
            parse_str($maxattempt->vars, $parsedVars);
            $result->userid = $userid;
            $result->grade = $parsedVars['grade'];
            $result->rawgrade = $result->grade;
            $result->gradecomment = $maxattempt->gradecomment;
            $result->attempts = sizeof($attempts);
            $result->duration = $parsedVars['duration'];
            $result->dateteacher = $maxattempt->dateteacher;
            $result->datestudent = $maxattempt->datestudent;

            return $result;
        } else {
            $result->userid = $userid;
            $result->grade = '';
            $result->rawgrade = '';
            $result->gradecomment = '';
            $result->attempts = count($attempts);
            $result->duration = '';
            $result->dateteacher = '';
            $result->datestudent = '';

            return $result;
        }
    } else
        return false;
}

/**
 * Finds the attempt with the lowest grade for a given user and geogebra.
 * If more than one attempt has the same grade, gets the one with more duration.
 *
 * @param int $geogebraid ID of an instance of this module
 * @param int $userid ID of a user
 * @return mixed boolean/object with userid, grade, rawgrade, grademax, attempts, duration and date
 */
function geogebra_get_lowest_attempt_grade($geogebraid, $userid) {
    global $CFG;

    // 1 - All attemps
    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1';

    if ($attempts = get_records_sql($select . $from . $where)) {

        // 2 - Get highest graded attempt

        $mingrade = PHP_INT_MAX;
        $minattempt = null;
        $maxtime = 0;

        foreach ($attempts as $attempt) {

            parse_str($attempt->vars, $parsedVars);
            if ($parsedVars['grade'] >= 0) {//only attempt with valid grade
                if ($parsedVars['grade'] < $mingrade) { // Lowest grade
                    $minattempt = $attempt;
                    $mingrade = $parsedVars['grade'];
                    $maxtime = $parsedVars['duration'];
                } else if ($parsedVars['grade'] == $mingrade) { // If same grade,
                    if ($parsedVars['duration'] > $maxtime) { // get the faster attempt
                        $minattempt = $attempt;
                        $mingrade = $parsedVars['grade'];
                        $maxtime = $parsedVars['duration'];
                    }
                }
            }
        }

        // 3 - Prepare return values
        if (isset($minattempt)) {
            parse_str($minattempt->vars, $parsedVars);

            $result->userid = $userid;
            $result->grade = $parsedVars['grade'];
            $result->rawgrade = $result->grade;
            $result->gradecomment = $minattempt->gradecomment;
            $result->attempts = sizeof($attempts);
            $result->duration = $parsedVars['duration'];
            $result->dateteacher = $minattempt->dateteacher;
            $result->datestudent = $minattempt->datestudent;

            return $result;
        } else {
            $result->userid = $userid;
            $result->grade = '';
            $result->rawgrade = '';
            $result->gradecomment = '';
            $result->attempts = count($attempts);
            $result->duration = '';
            $result->dateteacher = '';
            $result->datestudent = '';

            return $result;
        }
    } else
        return false;
}

function geogebra_count_finished_attempts($geogebraid, $userid) {
    global $CFG;

    //Count the attempts done by the user
    $select = 'SELECT COUNT(*)';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 1';

    return count_records_sql($select . $from . $where);
}

/*
 * Not sure if needed
 */

function geogebra_count_attempts($geogebraid, $userid) {
    global $CFG;

    //Count the attempts done by the user
    $select = 'SELECT COUNT(*)';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid;

    return count_records_sql($select . $from . $where);
}

/**
 * Format time from milliseconds to string 
 *
 * @return string Formated string [x' y''], where x are the minutes and y are the seconds.	
 * @param int $time	The time (in ms)
 */
function geogebra_time2str($time) {
    $minutes = floor($time / 60);
    $seconds = sprintf("%02s", round(fmod($time, 60), 0));
    return ($minutes > 0 ? $minutes . "' " : " ") . $seconds . "''";
}

/**
 * Prints the geogebra start and end dates in a box.
 * 
 * @param object $geogebra
 */
function geogebra_view_dates($geogebra) {
    if (!$geogebra->timeavailable && !$geogebra->timedue) {
        return;
    }

    print_simple_box_start('center', '', '', 0, 'generalbox', 'dates');
    echo '<table>';
    if ($geogebra->timeavailable) {
        echo '<tr><td class="c0">' . get_string('availabledate', 'geogebra') . ':</td>';
        echo '    <td class="c1">' . userdate($geogebra->timeavailable) . '</td></tr>';
    }
    if ($geogebra->timedue) {
        echo '<tr><td class="c0">' . get_string('duedate', 'geogebra') . ':</td>';
        echo '    <td class="c1">' . userdate($geogebra->timedue) . '</td></tr>';
    }
    echo '</table>';
    print_simple_box_end();
}

/**
 * Return the unfinished attempt of a user. Only 1 attempt for each (user, geogebra) can be unfinished
 *
 * @param type $geogebra_id ID of an instance of this module
 * @param type $user_id ID of a user
 * @return mixed null/geogebra attempt object
 */
function geogebra_get_unfinished_attempt($geogebraid, $userid) {
    global $CFG;

    $select = 'SELECT *';
    $from = ' FROM ' . $CFG->prefix . 'geogebra_attempts';
    $where = ' WHERE userid = ' . $userid . ' AND geogebra = ' . $geogebraid . ' AND finished = 0';
    return ($attempt = get_record_sql($select . $from . $where));
}

/**
 * Return the content of specified URL. 
 * 
 * @param string $url
 * @return string content of specified URL 
 */
function geogebra_getfilecontent($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $contents = curl_exec($curl);
    curl_close($curl);

    return $contents;
}

function geogebra_get_js_from_geogebra($filename) {
    global $CFG;
    $entry_content = '';
    if (isset($filename)) {
        $temppath = $CFG->dataroot . "/temp/geogebra/" . basename($filename) . "_" . time();
        require_once("$CFG->libdir/filelib.php");
        include_once("$CFG->libdir/pclzip/pclzip.lib.php");
        $archive = new PclZip(cleardoubleslashes("$filename"));
        if ($list = $archive->extract(PCLZIP_OPT_PATH, $temppath, PCLZIP_CB_PRE_EXTRACT, 'unzip_cleanfilename', PCLZIP_OPT_BY_NAME, 'geogebra_javascript.js', PCLZIP_OPT_EXTRACT_DIR_RESTRICTION, $temppath)) {
            if (!empty($list)) {
                $entry_content = file_get_contents(cleardoubleslashes($temppath . '/geogebra_javascript.js'));
                $entry_content = '<script type="text/javascript">var ggbApplet = document.ggbApplet; ' . $entry_content . '</script>';
            }
            fulldelete($temppath);
        }
    }
    return $entry_content;
}

function geogebra_get_applet_param($paramName, $attributes) {
    $paramValue = (isset($attributes[$paramName]) && $attributes[$paramName]) ? 'true' : 'false';
    return '<param name="' . $paramName . '" value="' . $paramValue . '" />';
}

function geogebra_show_applet($geogebra, $attributes, $parsedVars = null) {
    global $CFG, $USER;

    echo '<script type="text/javascript" src="' . $CFG->wwwroot . '/mod/geogebra/geogebra_view.js"></script>';
    echo '<applet id="geogebra_object" name="ggbApplet" codebase="', geogebra_get_javacodebase(), '" archive="', GEOGEBRA_ARCHIVE, '" code="', GEOGEBRA_CODE, '" width="' . $geogebra->width . 'px" height="' . $geogebra->height . 'px" align="bottom">';
    if (isset($attributes['filename'])) {
        //$filename = (substr($attributes['filename'], 0, 4)=='http')?$attributes['filename']:$CFG->wwwroot.'/file.php/'.$geogebra->course.'/'.$attributes['filename'];
        //echo '<param name="filename" value="'.$filename.'"/>';

        $filename = $CFG->dataroot . "/" . $geogebra->course . "/" . $attributes['filename'];
        $ggbbase64 = base64_encode(file_get_contents($filename));
        echo '<param name="ggbBase64" value="' . $ggbbase64 . '" />';
        echo geogebra_get_applet_param('enableLabelDrags', $attributes);
        echo geogebra_get_applet_param('showResetIcon', $attributes);
        echo geogebra_get_applet_param('showMenuBar', $attributes);
        echo geogebra_get_applet_param('showToolBar', $attributes);
        echo geogebra_get_applet_param('showToolBarHelp', $attributes);
        echo '<param name="language" value="' . $attributes['language'] . '" />';
        //echo geogebra_get_applet_param('showAlgebraInput', $attributes);
        echo geogebra_get_applet_param('enableRightClick', $attributes);
    }

    if (isset($parsedVars['state'])) {
        // Continue previuos attempt or preview final result
        $edu_xtec_adapter_parameters = http_build_query(array(
            'state' => $parsedVars['state'],
            'grade' => $parsedVars['grade'],
            'duration' => $parsedVars['duration'],
            'attempts' => $parsedVars['attempts']
                ), '', '&');
    } else {
        // New attempt
        $attempts = geogebra_count_finished_attempts($geogebra->id, $USER->id) + 1;
        $edu_xtec_adapter_parameters = http_build_query(array(
            //      'grade' => '0',
            'attempts' => $attempts
                ), '', '&');
    }

    $context = get_context_instance(CONTEXT_MODULE, $geogebra->cmidnumber);
    $attributes['framePossible'] = has_capability('mod/geogebra:gradeactivity', $context);
    echo geogebra_get_applet_param('framePossible', $attributes);
    echo '<param name="useBrowserForJS" value="true" />';
    echo get_string('warningnojava', 'geogebra');

    echo '</applet>';
    echo '<input type="hidden" name="prevAppletInformation" value="' . $edu_xtec_adapter_parameters . '" />';
    echo '<br/>';

    print_r(geogebra_get_js_from_geogebra($filename));
}

/**
 * Get an array with the languages
 *
 * @return array   The array with each language.
 */
function geogebra_get_languages() {
    global $CFG;
    $tmplanglist = get_list_of_languages();
    $langlist = array();
    foreach ($tmplanglist as $lang => $langname) {
        if (substr($lang, -5) == '_utf8') {   //Remove the _utf8 suffix from the lang to show
            $lang = substr($lang, 0, -5);
        }
        $langlist[$lang] = $langname;
    }
    return $langlist;
}

/**
 * Removes all grades from gradebook
 * @param int $courseid
 * @param string optional type
 */
function geogebra_reset_gradebook($courseid, $type = '') {
    global $CFG;
    $sql = "SELECT g.*, cm.idnumber as cmidnumber, g.course as courseid
              FROM {$CFG->prefix}geogebra g, {$CFG->prefix}course_modules cm, {$CFG->prefix}modules m
             WHERE m.name='geogebra' AND m.id=cm.module AND cm.instance=g.id AND g.course=$courseid";
    if ($datas = get_records_sql($sql)) {
        foreach ($datas as $data) {
            geogebra_grade_item_update($data, 'reset');
        }
    }
}

/**
 * This function is used by the reset_course_userdata function in moodlelib.
 * This function will remove all geogebra sessions in the specified course.
 * @param $data the data submitted from the reset course.
 * @return array status array
 */
function geogebra_reset_userdata($data) {
    global $CFG;

    $status = array();
    if (!empty($data->reset_geogebra_deleteallattempts)) {
        $select = 'geogebra IN'
                . " (SELECT g.id FROM {$CFG->prefix}geogebra g"
                . " WHERE g.course = {$data->courseid})";
        delete_records_select('geogebra_attempts', $select);

        if (empty($data->reset_gradebook_grades)) {
            // remove all grades from gradebook
            geogebra_reset_gradebook($data->courseid);
        }

        $status[] = array('component' => get_string('modulenameplural', 'geogebra'),
            'item' => get_string('deleteallattempts', 'geogebra'),
            'error' => false);
    }
    return $status;
}

/**
 * Called by course/reset.php
 * @param $mform form passed by reference
 */
function geogebra_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'geogebraheader', get_string('modulenameplural', 'geogebra'));
    $mform->addElement('checkbox', 'reset_geogebra_deleteallattempts', get_string('deleteallattempts', 'geogebra'));
}

/**
 * Course reset form defaults.
 */
function geogebra_reset_course_form_defaults($course) {
    return array('reset_geogebra_deleteallattempts' => 1);
}

function geogebra_define_table($table, $geogebra, $course) {

    if ($geogebra->grade != GEOGEBRA_NO_GRADING) {
        $tablecolumns = array('picture', 'fullname', 'attempts', 'duration', 'grade', 'comment', 'datestudent', 'dateteacher', 'status');
        $tableheaders = array('',
            get_string('fullname'),
            get_string('attempts', 'geogebra') . ($geogebra->maxattempts > 0 ? ' / ' . $geogebra->maxattempts : ''),
            get_string('duration', 'geogebra'),
            ($geogebra->grade < 0) ? get_string('grade', 'geogebra') : get_string('grade', 'geogebra') . ' / ' . $geogebra->grade,
            get_string('comment', 'geogebra'),
            get_string('lastmodified').' ('.$course->student.')',
            get_string('lastmodified').' ('.$course->teacher.')',
            get_string('status'));
    } else {
        $tablecolumns = array('picture', 'fullname', 'attempts', 'duration', 'datestudent', 'status');
        $tableheaders = array('',
            get_string('fullname'),
            get_string('attempts', 'geogebra') . ($geogebra->maxattempts > 0 ? ' / ' . $geogebra->maxattempts : ''),
            get_string('duration', 'geogebra'),
            get_string('lastmodified').' ('.$course->student.')',
            get_string('status'));
    }
    $table->define_columns($tablecolumns);
    $table->define_headers($tableheaders);

    $table->column_class('picture', 'picture');
    
    $table->column_style['status']['text-align'] =  'center';

    $table->sortable(false);
    $table->collapsible(true);
//    $table->initialbars(true);

    $table->set_attribute('cellspacing', '0');
    $table->set_attribute('id', 'attempts');
    $table->set_attribute('class', 'grade-table');
    $table->set_attribute('width', '100%');
    $table->set_attribute('align', 'center');
    $table->column_style_all('vertical-align', 'middle');
//    $table->column_style_all('text-align', 'center');
    $table->column_style_all('border-width', '1px');
    $table->column_style_all('border-style', 'solid');
    $table->column_style_all('border-color', '#DDDDDD');

    $table->setup();

    return $table;
}

?>
