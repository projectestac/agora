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

require_once("$CFG->dirroot/mod/rscorm/lib.php");
require_once("$CFG->libdir/filelib.php");

/// Constants and settings for module rscorm
define('RSCORM_UPDATE_NEVER', '0');
define('RSCORM_UPDATE_EVERYDAY', '2');
define('RSCORM_UPDATE_EVERYTIME', '3');

define('RSCORM_SKIPVIEW_NEVER', '0');
define('RSCORM_SKIPVIEW_FIRST', '1');
define('RSCORM_SKIPVIEW_ALWAYS', '2');

define('RSCO_ALL', 0);
define('RSCO_DATA', 1);
define('RSCO_ONLY', 2);

define('RGRADESCOES', '0');
define('RGRADEHIGHEST', '1');
define('RGRADEAVERAGE', '2');
define('RGRADESUM', '3');

define('RHIGHESTATTEMPT', '0');
define('RAVERAGEATTEMPT', '1');
define('RFIRSTATTEMPT', '2');
define('RLASTATTEMPT', '3');

define('RTOCJSLINK', 1);
define('RTOCFULLURL', 2);

/// Local Library of functions for module rscorm

/**
 * @package   mod-rscorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class rscorm_package_file_info extends file_info_stored {
    public function get_parent() {
        if ($this->lf->get_filepath() === '/' and $this->lf->get_filename() === '.') {
            return $this->browser->get_file_info($this->context);
        }
        return parent::get_parent();
    }
    public function get_visible_name() {
        if ($this->lf->get_filepath() === '/' and $this->lf->get_filename() === '.') {
            return $this->topvisiblename;
        }
        return parent::get_visible_name();
    }
}

/**
 * Returns an array of the popup options for RSCORM and each options default value
 *
 * @return array an array of popup options as the key and their defaults as the value
 */
function rscorm_get_popup_options_array() {
    global $CFG;
    $cfg_scorm = get_config('rscorm');

    return array('resizable'=> isset($cfg_scorm->resizable) ? $cfg_scorm->resizable : 0,
                 'scrollbars'=> isset($cfg_scorm->scrollbars) ? $cfg_scorm->scrollbars : 0,
                 'directories'=> isset($cfg_scorm->directories) ? $cfg_scorm->directories : 0,
                 'location'=> isset($cfg_scorm->location) ? $cfg_scorm->location : 0,
                 'menubar'=> isset($cfg_scorm->menubar) ? $cfg_scorm->menubar : 0,
                 'toolbar'=> isset($cfg_scorm->toolbar) ? $cfg_scorm->toolbar : 0,
                 'status'=> isset($cfg_scorm->status) ? $cfg_scorm->status : 0);
}

/**
 * Returns an array of the array of what grade options
 *
 * @return array an array of what grade options
 */
function rscorm_get_grade_method_array() {
    return array (RGRADESCOES => get_string('gradescoes', 'rscorm'),
                  RGRADEHIGHEST => get_string('gradehighest', 'rscorm'),
                  RGRADEAVERAGE => get_string('gradeaverage', 'rscorm'),
                  RGRADESUM => get_string('gradesum', 'rscorm'));
}

/**
 * Returns an array of the array of what grade options
 *
 * @return array an array of what grade options
 */
function rscorm_get_what_grade_array() {
    return array (RHIGHESTATTEMPT => get_string('highestattempt', 'rscorm'),
                  RAVERAGEATTEMPT => get_string('averageattempt', 'rscorm'),
                  RFIRSTATTEMPT => get_string('firstattempt', 'rscorm'),
                  RLASTATTEMPT => get_string('lastattempt', 'rscorm'));
}

/**
 * Returns an array of the array of skip view options
 *
 * @return array an array of skip view options
 */
function rscorm_get_skip_view_array() {
    return array(RSCORM_SKIPVIEW_NEVER => get_string('never'),
                 RSCORM_SKIPVIEW_FIRST => get_string('firstaccess', 'rscorm'),
                 RSCORM_SKIPVIEW_ALWAYS => get_string('always'));
}

/**
 * Returns an array of the array of hide table of contents options
 *
 * @return array an array of hide table of contents options
 */
function rscorm_get_hidetoc_array() {
     return array(RSCORM_TOC_SIDE => get_string('sided', 'rscorm'),
                  RSCORM_TOC_HIDDEN => get_string('hidden', 'rscorm'),
                  RSCORM_TOC_POPUP => get_string('popupmenu', 'rscorm'),
                  RSCORM_TOC_DISABLED => get_string('disabled', 'rscorm'));
}

/**
 * Returns an array of the array of update frequency options
 *
 * @return array an array of update frequency options
 */
function rscorm_get_updatefreq_array() {
    return array(RSCORM_UPDATE_NEVER => get_string('never'),
                 RSCORM_UPDATE_EVERYDAY => get_string('everyday', 'rscorm'),
                 RSCORM_UPDATE_EVERYTIME => get_string('everytime', 'rscorm'));
}

/**
 * Returns an array of the array of popup display options
 *
 * @return array an array of popup display options
 */
function rscorm_get_popup_display_array() {
    return array(0 => get_string('currentwindow', 'rscorm'),
                 1 => get_string('popup', 'rscorm'));
}

/**
 * Returns an array of the array of attempt options
 *
 * @return array an array of attempt options
 */
function rscorm_get_attempts_array() {
    $attempts = array(0 => get_string('nolimit', 'rscorm'),
                      1 => get_string('attempt1', 'rscorm'));

    for ($i=2; $i<=6; $i++) {
        $attempts[$i] = get_string('attemptsx', 'rscorm', $i);
    }

    return $attempts;
}
/**
 * Extracts scrom package, sets up all variables.
 * Called whenever rscorm changes
 * @param object $rscorm instance - fields are updated and changes saved into database
 * @param bool $full force full update if true
 * @return void
 */
function rscorm_parse($scorm, $full) {
    global $CFG, $DB;
    $cfg_scorm = get_config('rscorm');

    if (!isset($scorm->cmid)) {
        $cm = get_coursemodule_from_instance('rscorm', $scorm->id);
        $scorm->cmid = $cm->id;
    }
    $context = get_context_instance(CONTEXT_MODULE, $scorm->cmid);
    $newhash = $scorm->sha1hash;

    if ($scorm->scormtype === RSCORM_TYPE_LOCAL or $scorm->scormtype === RSCORM_TYPE_LOCALSYNC) {

        $fs = get_file_storage();
        $packagefile = false;

        if ($scorm->scormtype === RSCORM_TYPE_LOCAL) {
            if ($packagefile = $fs->get_file($context->id, 'mod_rscorm', 'package', 0, '/', $scorm->reference)) {
                $newhash = $packagefile->get_contenthash();
            } else {
                $newhash = null;
            }
        } else {
            if (!$cfg_scorm->allowtypelocalsync) {
                // sorry - localsync disabled
                return;
            }
            if ($scorm->reference !== '' and (!$full or $scorm->sha1hash !== sha1($scorm->reference))) {
                $fs->delete_area_files($context->id, 'mod_rscorm', 'package');
                $file_record = array('contextid'=>$context->id, 'component'=>'mod_rscorm', 'filearea'=>'package', 'itemid'=>0, 'filepath'=>'/');
                if ($packagefile = $fs->create_file_from_url($file_record, $scorm->reference, array('calctimeout' => true))) {
                    $newhash = sha1($scorm->reference);
                } else {
                    $newhash = null;
                }
            }
        }

        if ($packagefile) {
            if (!$full and $packagefile and $scorm->sha1hash === $newhash) {
                if (textlib::strpos($scorm->version, 'RSCORM') !== false) {
                    if ($fs->get_file($context->id, 'mod_rscorm', 'content', 0, '/', 'imsmanifest.xml')) {
                        // no need to update
                        return;
                    }
                } else if (textlib::strpos($scorm->version, 'AICC') !== false) {
                    // TODO: add more sanity checks - something really exists in scorm_content area
                    return;
                }
            }

            // now extract files
            $fs->delete_area_files($context->id, 'mod_rscorm', 'content');

            $packer = get_file_packer('application/zip');
            $packagefile->extract_to_storage($packer, $context->id, 'mod_rscorm', 'content', 0, '/');

        } else if (!$full) {
            return;
        }

        if ($manifest = $fs->get_file($context->id, 'mod_rscorm', 'content', 0, '/', 'imsmanifest.xml')) {
            require_once("$CFG->dirroot/mod/rscorm/datamodels/scormlib.php");
            // RSCORM
            if (!rscorm_parse_scorm($scorm, $manifest)) {
                $scorm->version = 'ERROR';
            }
        } else {
            require_once("$CFG->dirroot/mod/rscorm/datamodels/aicclib.php");
            // AICC
            if (!rscorm_parse_aicc($scorm)) {
                $scorm->version = 'ERROR';
            }
            $scorm->version = 'AICC';
        }

    } else if ($scorm->scormtype === RSCORM_TYPE_EXTERNAL and $cfg_scorm->allowtypeexternal) {
        if (!$full and $scorm->sha1hash === sha1($scorm->reference)) {
            return;
        }
        require_once("$CFG->dirroot/mod/rscorm/datamodels/scormlib.php");
        // RSCORM only, AICC can not be external
        if (!rscorm_parse_scorm($scorm, $scorm->reference)) {
            $scorm->version = 'ERROR';
        }
        $newhash = sha1($scorm->reference);

    } else if ($scorm->scormtype === RSCORM_TYPE_IMSREPOSITORY and !empty($CFG->repositoryactivate) and $cfg_scorm->allowtypeimsrepository) {
        if (!$full and $scorm->sha1hash === sha1($scorm->reference)) {
            return;
        }
        require_once("$CFG->dirroot/mod/rscorm/datamodels/scormlib.php");
        if (!rscorm_parse_scorm($scorm, $CFG->repository.substr($scorm->reference, 1).'/imsmanifest.xml')) {
            $scorm->version = 'ERROR';
        }
        $newhash = sha1($scorm->reference);
    } else if ($scorm->scormtype === RSCORM_TYPE_AICCURL  and $cfg_scorm->allowtypeexternalaicc) {
        require_once("$CFG->dirroot/mod/rscorm/datamodels/aicclib.php");
        // AICC
        if (!rscorm_parse_aicc($scorm)) {
            $scorm->version = 'ERROR';
        }
        $scorm->version = 'AICC';
    } else {
        // sorry, disabled type
        return;
    }

    $scorm->revision++;
    $scorm->sha1hash = $newhash;
    $DB->update_record('rscorm', $scorm);
}


function rscorm_array_search($item, $needle, $haystacks, $strict=false) {
    if (!empty($haystacks)) {
        foreach ($haystacks as $key => $element) {
            if ($strict) {
                if ($element->{$item} === $needle) {
                    return $key;
                }
            } else {
                if ($element->{$item} == $needle) {
                    return $key;
                }
            }
        }
    }
    return false;
}

function rscorm_repeater($what, $times) {
    if ($times <= 0) {
        return null;
    }
    $return = '';
    for ($i=0; $i<$times; $i++) {
        $return .= $what;
    }
    return $return;
}

function rscorm_external_link($link) {
    // check if a link is external
    $result = false;
    $link = strtolower($link);
    if (substr($link, 0, 7) == 'http://') {
        $result = true;
    } else if (substr($link, 0, 8) == 'https://') {
        $result = true;
    } else if (substr($link, 0, 4) == 'www.') {
        $result = true;
    }
    return $result;
}

/**
 * Returns an object containing all datas relative to the given sco ID
 *
 * @param integer $id The sco ID
 * @return mixed (false if sco id does not exists)
 */
function rscorm_get_sco($id, $what=RSCO_ALL) {
    global $DB;

    if ($sco = $DB->get_record('rscorm_scoes', array('id'=>$id))) {
    	// MARSUPIAL *********** AFEGIT - look for the launch item at set it to the sco
    	global $USER;
    	if($launch= $DB->get_field('rscorm_scoes_users', 'launch', array('launch' => 'launch', 'scormid' => $sco->scorm, 'scoid' => $sco->id, 'userid' => $USER->id))){
    		$sco->launch=$launch;
    	}
    	//********** FI

        $sco = ($what == RSCO_DATA) ? new stdClass() : $sco;
        if (($what != RSCO_ONLY) && ($scodatas = $DB->get_records('rscorm_scoes_data', array('scoid'=>$id)))) {
            foreach ($scodatas as $scodata) {
                $sco->{$scodata->name} = $scodata->value;
            }
        } else if (($what != RSCO_ONLY) && (!($scodatas = $DB->get_records('rscorm_scoes_data', array('scoid'=>$id))))) {
            $sco->parameters = '';
        }
        return $sco;
    } else {
        return false;
    }
}

/**
 * Returns an object (array) containing all the scoes data related to the given sco ID
 *
 * @param integer $id The sco ID
 * @param integer $organisation an organisation ID - defaults to false if not required
 * @return mixed (false if there are no scoes or an array)
 */
function rscorm_get_scoes($id, $organisation=false) {
    global $DB;
    // MARSUPIAL *********** AFEGIT - needed to search for the user launch of each sco
    global $USER;
    //********** FI

    $organizationsql = '';
    $queryarray = array('scorm'=>$id);
    if (!empty($organisation)) {
        $queryarray['organization'] = $organisation;
    }
    if ($scoes = $DB->get_records('rscorm_scoes', $queryarray, 'id ASC')) {
        // drop keys so that it is a simple array as expected
        $scoes = array_values($scoes);
        foreach ($scoes as $sco) {
            if ($scodatas = $DB->get_records('rscorm_scoes_data', array('scoid'=>$sco->id))) {
                foreach ($scodatas as $scodata) {
                    $sco->{$scodata->name} = $scodata->value;
                }
            }
        }
// MARSUPIAL *********** AFEGIT - look for the launch item at set it to the sco
        if($launch=$DB->get_field('rscorm_scoes_users', 'launch', array('launch' => 'launch', 'scormid' => $sco->scorm, 'scoid' => $sco->id, 'userid' => $USER->id))){
        	$sco->launch=$launch;
        }
//********** FI
        return $scoes;
    } else {
        return false;
    }
}

function rscorm_insert_track($userid, $scormid, $scoid, $attempt, $element, $value, $forcecompleted=false) {
    global $DB, $CFG;

    $id = null;

    if ($forcecompleted) {
        //TODO - this could be broadened to encompass RSCORM 2004 in future
        if (($element == 'cmi.core.lesson_status') && ($value == 'incomplete')) {
            if ($track = $DB->get_record_select('rscorm_scoes_track', 'userid=? AND scormid=? AND scoid=? AND attempt=? AND element=\'cmi.core.score.raw\'', array($userid, $scormid, $scoid, $attempt))) {
                $value = 'completed';
            }
        }
        if ($element == 'cmi.core.score.raw') {
            if ($tracktest = $DB->get_record_select('rscorm_scoes_track', 'userid=? AND scormid=? AND scoid=? AND attempt=? AND element=\'cmi.core.lesson_status\'', array($userid, $scormid, $scoid, $attempt))) {
                if ($tracktest->value == "incomplete") {
                    $tracktest->value = "completed";
                    $DB->update_record('rscorm_scoes_track', $tracktest);
                }
            }
        }
    }

    if ($track = $DB->get_record('rscorm_scoes_track', array('userid'=>$userid, 'scormid'=>$scormid, 'scoid'=>$scoid, 'attempt'=>$attempt, 'element'=>$element))) {
        if ($element != 'x.start.time' ) { //don't update x.start.time - keep the original value.
            $track->value = $value;
            $track->timemodified = time();
            $DB->update_record('rscorm_scoes_track', $track);
            $id = $track->id;
        }
    } else {
        $track = new stdClass();
        $track->userid = $userid;
        $track->scormid = $scormid;
        $track->scoid = $scoid;
        $track->attempt = $attempt;
        $track->element = $element;
        $track->value = $value;
        $track->timemodified = time();
        $id = $DB->insert_record('rscorm_scoes_track', $track);
    }

    if (strstr($element, '.score.raw') ||
        (in_array($element, array('cmi.completion_status', 'cmi.core.lesson_status', 'cmi.success_status'))
         && in_array($track->value, array('completed', 'passed')))) {
        $scorm = $DB->get_record('rscorm', array('id' => $scormid));
        include_once($CFG->dirroot.'/mod/rscorm/lib.php');
        rscorm_update_grades($scorm, $userid);
    }

    return $id;
}

function rscorm_get_tracks($scoid, $userid, $attempt='') {
    /// Gets all tracks of specified sco and user
    global $CFG, $DB;

    if (empty($attempt)) {
        if ($scormid = $DB->get_field('rscorm_scoes', 'scorm', array('id'=>$scoid))) {
            $attempt = rscorm_get_last_attempt($scormid, $userid);
        } else {
            $attempt = 1;
        }
    }
    if ($tracks = $DB->get_records('rscorm_scoes_track', array('userid'=>$userid, 'scoid'=>$scoid, 'attempt'=>$attempt), 'element ASC')) {
        $usertrack = new stdClass();
        $usertrack->userid = $userid;
        $usertrack->scoid = $scoid;
        // Defined in order to unify scorm1.2 and scorm2004
        $usertrack->score_raw = '';
        $usertrack->status = '';
        $usertrack->total_time = '00:00:00';
        $usertrack->session_time = '00:00:00';
        $usertrack->timemodified = 0;
        foreach ($tracks as $track) {
            $element = $track->element;
            $usertrack->{$element} = $track->value;
            switch ($element) {
                case 'cmi.core.lesson_status':
                case 'cmi.completion_status':
                    if ($track->value == 'not attempted') {
                        $track->value = 'notattempted';
                    }
                    $usertrack->status = $track->value;
                break;
                case 'cmi.core.score.raw':
                case 'cmi.score.raw':
                    $usertrack->score_raw = (float) sprintf('%2.2f', $track->value);
                break;
                case 'cmi.core.session_time':
                case 'cmi.session_time':
                    $usertrack->session_time = $track->value;
                break;
                case 'cmi.core.total_time':
                case 'cmi.total_time':
                    $usertrack->total_time = $track->value;
                break;
            }
            if (isset($track->timemodified) && ($track->timemodified > $usertrack->timemodified)) {
                $usertrack->timemodified = $track->timemodified;
            }
        }
        if (is_array($usertrack)) {
            ksort($usertrack);
        }
        return $usertrack;
    } else {
        return false;
    }
}


/* Find the start and finsh time for a a given SCO attempt
 *
 * @param int $scormid RSCORM Id
 * @param int $scoid SCO Id
 * @param int $userid User Id
 * @param int $attemt Attempt Id
 *
 * @return object start and finsh time EPOC secods
 *
 */
function rscorm_get_sco_runtime($scormid, $scoid, $userid, $attempt=1) {
    global $DB;

    $timedata = new stdClass();
    $sql = !empty($scoid) ? "userid=$userid AND scormid=$scormid AND scoid=$scoid AND attempt=$attempt" : "userid=$userid AND scormid=$scormid AND attempt=$attempt";
    $tracks = $DB->get_records_select('rscorm_scoes_track', "$sql ORDER BY timemodified ASC");
    if ($tracks) {
        $tracks = array_values($tracks);
    }

    if ($tracks) {
        $timedata->start = $tracks[0]->timemodified;
    } else {
        $timedata->start = false;
    }
    if ($tracks && $track = array_pop($tracks)) {
        $timedata->finish = $track->timemodified;
    } else {
        $timedata->finish = $timedata->start;
    }
    return $timedata;
}


function rscorm_get_user_data($userid) {
    global $DB;
    /// Gets user info required to display the table of scorm results
    /// for report.php

    return $DB->get_record('user', array('id'=>$userid), user_picture::fields());
}

function rscorm_grade_user_attempt($scorm, $userid, $attempt=1) {
    global $DB;
    $attemptscore = new stdClass();
    $attemptscore->scoes = 0;
    $attemptscore->values = 0;
    $attemptscore->max = 0;
    $attemptscore->sum = 0;
    $attemptscore->lastmodify = 0;

    if (!$scoes = $DB->get_records('rscorm_scoes', array('scorm'=>$scorm->id))) {
        return null;
    }

    foreach ($scoes as $sco) {
        if ($userdata=rscorm_get_tracks($sco->id, $userid, $attempt)) {
            if (($userdata->status == 'completed') || ($userdata->status == 'passed')) {
                $attemptscore->scoes++;
            }
            if (!empty($userdata->score_raw) || (isset($scorm->type) && $scorm->type=='sco' && isset($userdata->score_raw))) {
                $attemptscore->values++;
                $attemptscore->sum += $userdata->score_raw;
                $attemptscore->max = ($userdata->score_raw > $attemptscore->max)?$userdata->score_raw:$attemptscore->max;
                if (isset($userdata->timemodified) && ($userdata->timemodified > $attemptscore->lastmodify)) {
                    $attemptscore->lastmodify = $userdata->timemodified;
                } else {
                    $attemptscore->lastmodify = 0;
                }
            }
        }
    }
    switch ($scorm->grademethod) {
        case RGRADEHIGHEST:
            $score = (float) $attemptscore->max;
        break;
        case RGRADEAVERAGE:
            if ($attemptscore->values > 0) {
                $score = $attemptscore->sum/$attemptscore->values;
            } else {
                $score = 0;
            }
        break;
        case RGRADESUM:
            $score = $attemptscore->sum;
        break;
        case RGRADESCOES:
            $score = $attemptscore->scoes;
        break;
        default:
            $score = $attemptscore->max;   // Remote Learner RGRADEHIGHEST is default
    }

    return $score;
}

function rscorm_grade_user($scorm, $userid) {

    // ensure we dont grade user beyond $scorm->maxattempt settings
    $lastattempt = rscorm_get_last_attempt($scorm->id, $userid);
    if ($scorm->maxattempt != 0 && $lastattempt >= $scorm->maxattempt) {
        $lastattempt = $scorm->maxattempt;
    }

    switch ($scorm->whatgrade) {
        case RFIRSTATTEMPT:
            return rscorm_grade_user_attempt($scorm, $userid, 1);
        break;
        case RLASTATTEMPT:
            return rscorm_grade_user_attempt($scorm, $userid, rscorm_get_last_completed_attempt($scorm->id, $userid));
        break;
        case RHIGHESTATTEMPT:
            $maxscore = 0;
            for ($attempt = 1; $attempt <= $lastattempt; $attempt++) {
                $attemptscore = rscorm_grade_user_attempt($scorm, $userid, $attempt);
                $maxscore = $attemptscore > $maxscore ? $attemptscore: $maxscore;
            }
            return $maxscore;

        break;
        case RAVERAGEATTEMPT:
            $attemptcount = rscorm_get_attempt_count($userid, $scorm, true);
            if (empty($attemptcount)) {
                return 0;
            } else {
                $attemptcount = count($attemptcount);
            }
            $lastattempt = rscorm_get_last_attempt($scorm->id, $userid);
            $sumscore = 0;
            for ($attempt = 1; $attempt <= $lastattempt; $attempt++) {
                $attemptscore = rscorm_grade_user_attempt($scorm, $userid, $attempt);
                $sumscore += $attemptscore;
            }

            return round($sumscore / $attemptcount);
        break;
    }
}

function rscorm_count_launchable($scormid, $organization='') {
    global $DB;

    $sqlorganization = '';
    $params = array($scormid);
    if (!empty($organization)) {
        $sqlorganization = " AND organization=?";
        $params[] = $organization;
    }
    return $DB->count_records_select('rscorm_scoes', "scorm = ? $sqlorganization AND ".$DB->sql_isnotempty('rscorm_scoes', 'launch', false, true), $params);
}

/**
 * Returns the last attempt used - if no attempts yet, returns 1 for first attempt
 *
 * @param int $scormid the id of the scorm.
 * @param int $userid the id of the user.
 *
 * @return int The attempt number to use.
 */
function rscorm_get_last_attempt($scormid, $userid) {
    global $DB;

    /// Find the last attempt number for the given user id and scorm id
    $sql = "SELECT MAX(attempt)
              FROM {rscorm_scoes_track}
             WHERE userid = ? AND scormid=?";
    $lastattempt = $DB->get_field_sql($sql, array($userid, $scormid));
    if (empty($lastattempt)) {
        return '1';
    } else {
        return $lastattempt;
    }
}

/**
 * Returns the last completed attempt used - if no completed attempts yet, returns 1 for first attempt
 *
 * @param int $scormid the id of the rscorm.
 * @param int $userid the id of the user.
 *
 * @return int The attempt number to use.
 */
function rscorm_get_last_completed_attempt($scormid, $userid) {
    global $DB;

    /// Find the last completed attempt number for the given user id and scorm id
    $sql = "SELECT MAX(attempt)
              FROM {rscorm_scoes_track}
             WHERE userid = ? AND scormid=?
               AND (value='completed' OR value='passed')";
    $lastattempt = $DB->get_field_sql($sql, array($userid, $scormid));
    if (empty($lastattempt)) {
        return '1';
    } else {
        return $lastattempt;
    }
}

function rscorm_course_format_display($user, $course) {
    global $CFG, $DB, $PAGE, $OUTPUT;

    $strupdate = get_string('update');
    $context = get_context_instance(CONTEXT_COURSE, $course->id);

    echo '<div class="mod-rscorm">';
    if ($scorms = get_all_instances_in_course('rscorm', $course)) {
        // The module RSCORM activity with the least id is the course
        $scorm = current($scorms);
        if (! $cm = get_coursemodule_from_instance('rscorm', $scorm->id, $course->id)) {
            print_error('invalidcoursemodule');
        }
        $contextmodule = get_context_instance(CONTEXT_MODULE, $cm->id);
        if ((has_capability('mod/rscorm:skipview', $contextmodule))) {
            rscorm_simple_play($scorm, $user, $contextmodule, $cm->id);
        }
        $colspan = '';
        $headertext = '<table width="100%"><tr><td class="title">'.get_string('name').': <b>'.format_string($scorm->name).'</b>';
        if (has_capability('moodle/course:manageactivities', $context)) {
            if ($PAGE->user_is_editing()) {
                // Display update icon
                $path = $CFG->wwwroot.'/course';
                $headertext .= '<span class="commands">'.
                        '<a title="'.$strupdate.'" href="'.$path.'/mod.php?update='.$cm->id.'&amp;sesskey='.sesskey().'">'.
                        '<img src="'.$OUTPUT->pix_url('t/edit') . '" class="iconsmall" alt="'.$strupdate.'" /></a></span>';
            }
            $headertext .= '</td>';
            // Display report link
            $trackedusers = $DB->get_record('rscorm_scoes_track', array('scormid'=>$scorm->id), 'count(distinct(userid)) as c');
            if ($trackedusers->c > 0) {
                $headertext .= '<td class="reportlink">'.
                              '<a href="'.$CFG->wwwroot.'/mod/rscorm/report.php?id='.$cm->id.'">'.
                               get_string('viewallreports', 'rscorm', $trackedusers->c).'</a>';
            } else {
                $headertext .= '<td class="reportlink">'.get_string('noreports', 'rscorm');
            }
            $colspan = ' colspan="2"';
        }
        $headertext .= '</td></tr><tr><td'.$colspan.'>'.get_string('summary').':<br />'.format_module_intro('rscorm', $scorm, $scorm->coursemodule).'</td></tr></table>';
        echo $OUTPUT->box($headertext, 'generalbox boxwidthwide');
        rscorm_view_display($user, $scorm, 'view.php?id='.$course->id, $cm);
    } else {
        if (has_capability('moodle/course:update', $context)) {
            // Create a new activity
            $url = new moodle_url('/course/mod.php', array('id'=>$course->id, 'section'=>'0', 'sesskey'=>sesskey(),'add'=>'rscorm'));
            redirect($url);
        } else {
            echo $OUTPUT->notification('Could not find a rscorm course here');
        }
    }
    echo '</div>';
}

function rscorm_view_display ($user, $scorm, $action, $cm) {
    global $CFG, $DB, $PAGE, $OUTPUT;

    if ($scorm->scormtype != RSCORM_TYPE_LOCAL && $scorm->updatefreq == RSCORM_UPDATE_EVERYTIME) {
        rscorm_parse($scorm, false);
    }

    $organization = optional_param('organization', '', PARAM_INT);

    if ($scorm->displaycoursestructure == 1) {
        echo $OUTPUT->box_start('generalbox boxaligncenter toc');
        ?>
        <div class="structurehead"><?php print_string('contents', 'rscorm') ?></div>
        <?php
    }
    if (empty($organization)) {
        $organization = $scorm->launch;
    }
    if ($orgs = $DB->get_records_select_menu('rscorm_scoes', 'scorm = ? AND '.
                                         $DB->sql_isempty('rscorm_scoes', 'launch', false, true).' AND '.
                                         $DB->sql_isempty('rscorm_scoes', 'organization', false, false),
                                         array($scorm->id), 'id', 'id,title')) {
        if (count($orgs) > 1) {
            $select = new single_select(new moodle_url($action), 'organization', $orgs, $organization, null);
            $select->label = get_string('organizations', 'rscorm');
            $select->class = 'rscorm-center';
            echo $OUTPUT->render($select);
        }
    }
    $orgidentifier = '';
    if ($sco = rscorm_get_sco($organization, RSCO_ONLY)) {
        if (($sco->organization == '') && ($sco->launch == '')) {
            $orgidentifier = $sco->identifier;
        } else {
            $orgidentifier = $sco->organization;
        }
    }

    $scorm->version = strtolower(clean_param($scorm->version, PARAM_SAFEDIR));   // Just to be safe
    if (!file_exists($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php')) {
        $scorm->version = 'rscorm_12';
    }
    require_once($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php');

    $result = rscorm_get_toc($user, $scorm, $cm->id, RTOCFULLURL, $orgidentifier);
    $incomplete = $result->incomplete;

    // do we want the TOC to be displayed?
    if ($scorm->displaycoursestructure == 1) {
        echo $result->toc;
        echo $OUTPUT->box_end();
    }

    // is this the first attempt ?
    $attemptcount = rscorm_get_attempt_count($user->id, $scorm);

    // do not give the player launch FORM if the RSCORM object is locked after the final attempt
    if ($scorm->lastattemptlock == 0 || $result->attemptleft > 0) {
        ?>
            <div class="rscorm-center">
               <form id="rscormviewform" method="post" action="<?php echo $CFG->wwwroot ?>/mod/rscorm/player.php">
        <?php
        if ($scorm->hidebrowse == 0) {
            print_string('mode', 'rscorm');
            echo ': <input type="radio" id="b" name="mode" value="browse" /><label for="b">'.get_string('browse', 'rscorm').'</label>'."\n";
            echo '<input type="radio" id="n" name="mode" value="normal" checked="checked" /><label for="n">'.get_string('normal', 'rscorm')."</label>\n";
        } else {
            echo '<input type="hidden" name="mode" value="normal" />'."\n";
        }
        if ($scorm->forcenewattempt == 1) {
            if ($incomplete === false) {
                echo '<input type="hidden" name="newattempt" value="on" />'."\n";
            }
        } else if (!empty($attemptcount) && ($incomplete === false) && (($result->attemptleft > 0)||($scorm->maxattempt == 0))) {
            ?>
                      <br />
                      <input type="checkbox" id="a" name="newattempt" />
                      <label for="a"><?php print_string('newattempt', 'rscorm') ?></label>
            <?php
        }
        if (!empty($scorm->popup)) {
            echo '<input type="hidden" name="display" value="popup" />'."\n";
        }
        ?>
              <br />
              <input type="hidden" name="scoid"/>
              <input type="hidden" name="cm" value="<?php echo $cm->id ?>"/>
              <input type="hidden" name="currentorg" value="<?php echo $orgidentifier ?>" />
              <input type="submit" value="<?php print_string('enter', 'rscorm') ?>" />
              </form>
          </div>
        <?php
    }
}

function rscorm_simple_play($scorm, $user, $context, $cmid) {
    global $DB;

    $result = false;
// MARSUPIAL ********** AFEGIT - for the search
    global $CFG;
//**********FI
    if ($scorm->scormtype != RSCORM_TYPE_LOCAL && $scorm->updatefreq == RSCORM_UPDATE_EVERYTIME) {
        rscorm_parse($scorm, false);
    }
    if (has_capability('mod/rscorm:viewreport', $context)) { //if this user can view reports, don't skipview so they can see links to reports.
        return $result;
    }

// MARSUPIAL ********** MODIFICAT - search for all sco and after look for the particular launch
	// $scoes = $DB->get_records_select('rscorm_scoes', 'scorm = ? AND '.$DB->sql_isnotempty('rscorm_scoes', 'launch', false, true), array($scorm->id), 'id', 'id');
	$scoes = $DB->get_recordset_sql("SELECT RS.* FROM {$CFG->prefix}rscorm_scoes RS
    JOIN {$CFG->prefix}rscorm_scoes_users RSU ON RSU.scoid = RS.id WHERE RS.scorm='".$scorm->id."' AND RSU.launch<>'".$DB->sql_empty()."' AND RSU.userid='".$user->id."'");
//*********FI

    if ($scoes) {
        $orgidentifier = '';
        if ($sco = rscorm_get_sco($scorm->launch, RSCO_ONLY)) {
            if (($sco->organization == '') && ($sco->launch == '')) {
                $orgidentifier = $sco->identifier;
            } else {
                $orgidentifier = $sco->organization;
            }
        }
        if ($scorm->skipview >= 1) {
            $sco = current($scoes);
            $url = new moodle_url('/mod/rscorm/player.php', array('a' => $scorm->id,
                                                                'currentorg'=>$orgidentifier,
                                                                'scoid'=>$sco->id));
            if ($scorm->skipview == 2 || rscorm_get_tracks($sco->id, $user->id) === false) {
                if (!empty($scorm->forcenewattempt)) {
                    $result = rscorm_get_toc($user, $scorm, $cmid, RTOCFULLURL, $orgidentifier);
                    if ($result->incomplete === false) {
                        $url->param('newattempt','on');
                    }
                }
                redirect($url);
            }
        }
    }
    return $result;
}

function rscorm_get_count_users($scormid, $groupingid=null) {
    global $CFG, $DB;

    if (!empty($groupingid)) {
        $sql = "SELECT COUNT(DISTINCT st.userid)
                FROM {rscorm_scoes_track} st
                    INNER JOIN {groups_members} gm ON st.userid = gm.userid
                    INNER JOIN {groupings_groups} gg ON gm.groupid = gg.groupid
                WHERE st.scormid=? AND gg.groupingid = ?
                ";
        $params = array($scormid, $groupingid);
    } else {
        $sql = "SELECT COUNT(DISTINCT st.userid)
                FROM {rscorm_scoes_track} st
                WHERE st.scormid=?
                ";
        $params = array($scormid);
    }

    return ($DB->count_records_sql($sql, $params));
}

/**
 * Build up the JavaScript representation of an array element
 *
 * @param string $sversion RSCORM API version
 * @param array $userdata User track data
 * @param string $element_name Name of array element to get values for
 * @param array $children list of sub elements of this array element that also need instantiating
 * @return None
 */
function rscorm_reconstitute_array_element($sversion, $userdata, $element_name, $children) {
    // reconstitute comments_from_learner and comments_from_lms
    $current = '';
    $current_subelement = '';
    $current_sub = '';
    $count = 0;
    $count_sub = 0;
    $scormseperator = '_';
    if (rscorm_version_check($sversion, RSCORM_13)) { //scorm 1.3 elements use a . instead of an _
        $scormseperator = '.';
    }
    // filter out the ones we want
    $element_list = array();
    foreach ($userdata as $element => $value) {
        if (textlib::substr($element, 0, textlib::strlen($element_name)) == $element_name) {
            $element_list[$element] = $value;
        }
    }

    // sort elements in .n array order
    uksort($element_list, "rscorm_element_cmp");

    // generate JavaScript
    foreach ($element_list as $element => $value) {
        if (rscorm_version_check($sversion, RSCORM_13)) {
            $element = preg_replace('/\.(\d+)\./', ".N\$1.", $element);
            preg_match('/\.(N\d+)\./', $element, $matches);
        } else {
            $element = preg_replace('/\.(\d+)\./', "_\$1.", $element);
            preg_match('/\_(\d+)\./', $element, $matches);
        }
        if (count($matches) > 0 && $current != $matches[1]) {
            if ($count_sub > 0) {
                echo '    '.$element_name.$scormseperator.$current.'.'.$current_subelement.'._count = '.$count_sub.";\n";
            }
            $current = $matches[1];
            $count++;
            $current_subelement = '';
            $current_sub = '';
            $count_sub = 0;
            $end = textlib::strpos($element, $matches[1])+textlib::strlen($matches[1]);
            $subelement = substr($element, 0, $end);
            echo '    '.$subelement." = new Object();\n";
            // now add the children
            foreach ($children as $child) {
                echo '    '.$subelement.".".$child." = new Object();\n";
                echo '    '.$subelement.".".$child."._children = ".$child."_children;\n";
            }
        }

        // now - flesh out the second level elements if there are any
        if (rscorm_version_check($sversion, RSCORM_13)) {
            $element = preg_replace('/(.*?\.N\d+\..*?)\.(\d+)\./', "\$1.N\$2.", $element);
            preg_match('/.*?\.N\d+\.(.*?)\.(N\d+)\./', $element, $matches);
        } else {
            $element = preg_replace('/(.*?\_\d+\..*?)\.(\d+)\./', "\$1_\$2.", $element);
            preg_match('/.*?\_\d+\.(.*?)\_(\d+)\./', $element, $matches);
        }

        // check the sub element type
        if (count($matches) > 0 && $current_subelement != $matches[1]) {
            if ($count_sub > 0) {
                echo '    '.$element_name.$scormseperator.$current.'.'.$current_subelement.'._count = '.$count_sub.";\n";
            }
            $current_subelement = $matches[1];
            $current_sub = '';
            $count_sub = 0;
            $end = textlib::strpos($element, $matches[1])+textlib::strlen($matches[1]);
            $subelement = substr($element, 0, $end);
            echo '    '.$subelement." = new Object();\n";
        }

        // now check the subelement subscript
        if (count($matches) > 0 && $current_sub != $matches[2]) {
            $current_sub = $matches[2];
            $count_sub++;
            $end = textlib::strrpos($element, $matches[2])+textlib::strlen($matches[2]);
            $subelement = substr($element, 0, $end);
            echo '    '.$subelement." = new Object();\n";
        }

        echo '    '.$element.' = \''.$value."';\n";
    }
    if ($count_sub > 0) {
        echo '    '.$element_name.$scormseperator.$current.'.'.$current_subelement.'._count = '.$count_sub.";\n";
    }
    if ($count > 0) {
        echo '    '.$element_name.'._count = '.$count.";\n";
    }
}

/**
 * Build up the JavaScript representation of an array element
 *
 * @param string $a left array element
 * @param string $b right array element
 * @return comparator - 0,1,-1
 */
function rscorm_element_cmp($a, $b) {
    preg_match('/.*?(\d+)\./', $a, $matches);
    $left = intval($matches[1]);
    preg_match('/.?(\d+)\./', $b, $matches);
    $right = intval($matches[1]);
    if ($left < $right) {
        return -1; // smaller
    } else if ($left > $right) {
        return 1;  // bigger
    } else {
        // look for a second level qualifier eg cmi.interactions_0.correct_responses_0.pattern
        if (preg_match('/.*?(\d+)\.(.*?)\.(\d+)\./', $a, $matches)) {
            $leftterm = intval($matches[2]);
            $left = intval($matches[3]);
            if (preg_match('/.*?(\d+)\.(.*?)\.(\d+)\./', $b, $matches)) {
                $rightterm = intval($matches[2]);
                $right = intval($matches[3]);
                if ($leftterm < $rightterm) {
                    return -1; // smaller
                } else if ($leftterm > $rightterm) {
                    return 1;  // bigger
                } else {
                    if ($left < $right) {
                        return -1; // smaller
                    } else if ($left > $right) {
                        return 1;  // bigger
                    }
                }
            }
        }
        // fall back for no second level matches or second level matches are equal
        return 0;  // equal to
    }
}

/**
 * Generate the user attempt status string
 *
 * @param object $user Current context user
 * @param object $rscorm a moodle scrom object - mdl_rscorm
 * @return string - Attempt status string
 */
function rscorm_get_attempt_status($user, $scorm, $cm='') {
    global $DB, $PAGE, $OUTPUT;

    $attempts = rscorm_get_attempt_count($user->id, $scorm, true);
    if (empty($attempts)) {
        $attemptcount = 0;
    } else {
        $attemptcount = count($attempts);
    }

    $result = '<p>'.get_string('noattemptsallowed', 'rscorm').': ';
    if ($scorm->maxattempt > 0) {
        $result .= $scorm->maxattempt . '<br />';
    } else {
        $result .= get_string('unlimited').'<br />';
    }
    $result .= get_string('noattemptsmade', 'rscorm').': ' . $attemptcount . '<br />';

    if ($scorm->maxattempt == 1) {
        switch ($scorm->grademethod) {
            case RGRADEHIGHEST:
                $grademethod = get_string('gradehighest', 'rscorm');
            break;
            case RGRADEAVERAGE:
                $grademethod = get_string('gradeaverage', 'rscorm');
            break;
            case RGRADESUM:
                $grademethod = get_string('gradesum', 'rscorm');
            break;
            case RGRADESCOES:
                $grademethod = get_string('gradescoes', 'rscorm');
            break;
        }
    } else {
        switch ($scorm->whatgrade) {
            case RHIGHESTATTEMPT:
                $grademethod = get_string('highestattempt', 'rscorm');
            break;
            case RAVERAGEATTEMPT:
                $grademethod = get_string('averageattempt', 'rscorm');
            break;
            case RFIRSTATTEMPT:
                $grademethod = get_string('firstattempt', 'rscorm');
            break;
            case RLASTATTEMPT:
                $grademethod = get_string('lastattempt', 'rscorm');
            break;
        }
    }

    if (!empty($attempts)) {
        $i = 1;
        foreach ($attempts as $attempt) {
            $gradereported = rscorm_grade_user_attempt($scorm, $user->id, $attempt->attemptnumber);
            if ($scorm->grademethod !== RGRADESCOES && !empty($scorm->maxgrade)) {
                $gradereported = $gradereported/$scorm->maxgrade;
                $gradereported = number_format($gradereported*100, 0) .'%';
            }
            $result .= get_string('gradeforattempt', 'rscorm').' ' . $i . ': ' . $gradereported .'<br />';
            $i++;
        }
    }
    $calculatedgrade = rscorm_grade_user($scorm, $user->id);
    if ($scorm->grademethod !== RGRADESCOES && !empty($scorm->maxgrade)) {
        $calculatedgrade = $calculatedgrade/$scorm->maxgrade;
        $calculatedgrade = number_format($calculatedgrade*100, 0) .'%';
    }
    $result .= get_string('grademethod', 'rscorm'). ': ' . $grademethod;
    if (empty($attempts)) {
        $result .= '<br />' . get_string('gradereported', 'rscorm') . ': ' . get_string('none') . '<br />';
    } else {
        $result .= '<br />' . get_string('gradereported', 'rscorm') . ': ' . $calculatedgrade . '<br />';
    }
    $result .= '</p>';
    if ($attemptcount >= $scorm->maxattempt and $scorm->maxattempt > 0) {
        $result .= '<p><font color="#cc0000">'.get_string('exceededmaxattempts', 'rscorm').'</font></p>';
    }
    if (!empty($cm)) {
        $context = context_module::instance($cm->id);
        if (has_capability('mod/rscorm:deleteownresponses', $context) &&
            $DB->record_exists('rscorm_scoes_track', array('userid' => $user->id, 'scormid' => $scorm->id))) {
            //check to see if any data is stored for this user:
            $deleteurl = new moodle_url($PAGE->url, array('action'=>'delete', 'sesskey' => sesskey()));
            $result .= $OUTPUT->single_button($deleteurl, get_string('deleteallattempts', 'rscorm'));
        }
    }


    return $result;
}

/**
 * Get RSCORM attempt count
 *
 * @param object $user Current context user
 * @param object $rscorm a moodle scrom object - mdl_rscorm
 * @param bool $attempts return the list of attempts
 * @return int - no. of attempts so far
 */
function rscorm_get_attempt_count($userid, $scorm, $attempts_only=false) {
    global $DB;
    $attemptcount = 0;
    $element = 'cmi.core.score.raw';
    if ($scorm->grademethod == RGRADESCOES) {
        $element = 'cmi.core.lesson_status';
    }
    if (rscorm_version_check($scorm->version, RSCORM_13)) {
        $element = 'cmi.score.raw';
    }
    $attempts = $DB->get_records_select('rscorm_scoes_track', "element=? AND userid=? AND scormid=?", array($element, $userid, $scorm->id), 'attempt', 'DISTINCT attempt AS attemptnumber');
    if ($attempts_only) {
        return $attempts;
    }
    if (!empty($attempts)) {
        $attemptcount = count($attempts);
    }
    return $attemptcount;
}

/**
 * Figure out with this is a debug situation
 *
 * @param object $rscorm a moodle scrom object - mdl_rscorm
 * @return boolean - debugging true/false
 */
function rscorm_debugging($scorm) {
    global $CFG, $USER;
    $cfg_scorm = get_config('rscorm');

    if (!$cfg_scorm->allowapidebug) {
        return false;
    }
    $identifier = $USER->username.':'.$scorm->name;
    $test = $cfg_scorm->apidebugmask;
    // check the regex is only a short list of safe characters
    if (!preg_match('/^[\w\s\*\.\?\+\:\_\\\]+$/', $test)) {
        return false;
    }
    $res = false;
    eval('$res = preg_match(\'/^'.$test.'/\', $identifier) ? true : false;');
    return $res;
}

/**
 * Delete Scorm tracks for selected users
 *
 * @param array $attemptids list of attempts that need to be deleted
 * @param int $rscorm instance
 *
 * return bool true deleted all responses, false failed deleting an attempt - stopped here
 */
function rscorm_delete_responses($attemptids, $scorm) {
    if (!is_array($attemptids) || empty($attemptids)) {
        return false;
    }

    foreach ($attemptids as $num => $attemptid) {
        if (empty($attemptid)) {
            unset($attemptids[$num]);
        }
    }

    foreach ($attemptids as $attempt) {
        $keys = explode(':', $attempt);
        if (count($keys) == 2) {
            $userid = clean_param($keys[0], PARAM_INT);
            $attemptid = clean_param($keys[1], PARAM_INT);
            if (!$userid || !$attemptid || !rscorm_delete_attempt($userid, $scorm, $attemptid)) {
                    return false;
            }
        } else {
            return false;
        }
    }
    return true;
}

/**
 * Delete Scorm tracks for selected users
 *
 * @param int $userid ID of User
 * @param int $scormid ID of Scorm
 * @param int $attemptid user attempt that need to be deleted
 *
 * return bool true suceeded
 */
function rscorm_delete_attempt($userid, $scorm, $attemptid) {
    global $DB;

    $DB->delete_records('rscorm_scoes_track', array('userid' => $userid, 'scormid' => $scorm->id, 'attempt' => $attemptid));
    include_once('lib.php');
    rscorm_update_grades($scorm, $userid, true);
    return true;
}

//MARSUPIAL ********** AFEGIT - Functions to load data from data table
/**
 * Load level list from bd table mdl_rcommon_level
 * @return array with the loaded data
 */
function rscorm_level_list(){
	global $CFG;
	global $DB;
	$return[0]='- '.get_string('level','rscorm').' -';

	//********** MODIFICAT MARSUPIAL - levels with books and level code added to the list

	$sql = "SELECT * FROM {$CFG->prefix}rcommon_level
	WHERE id in (Select distinct levelid from {$CFG->prefix}rcommon_books where upper(format) = 'SCORM')";

	if($records = $DB->get_records_sql($sql))
	{
	foreach($records as $r){
		$return[$r->id] = $r->code." - ".$r->name ;
		}
		}
		//**********
				return $return;
}

/**
* Load isbn list from bd table mdl_rcommon_books
* @return array with the loaded data
*/
function rscorm_isbn_list($levelid='',$from='ajax'){
global $CFG, $DB;

if($from=='updateform'){
$return[0]='- '.get_string('isbn','rscorm').' -';
}else{
	$return[]=array('id'=>0,'name'=>'- '.get_string('isbn','rscorm').' -');
	}
	if($levelid!=""){
			$sql="SELECT rb.*, rp.name as publiname FROM {$CFG->prefix}rcommon_books rb
			INNER JOIN {$CFG->prefix}rcommon_publisher rp ON rb.publisherid=rp.id
			WHERE rb.levelid='".$levelid."' AND rb.format='scorm'
			ORDER BY rb.name ASC";
			if($records=$DB->get_records_sql($sql)){
    	    foreach($records as $r){
					if($from=='updateform'){
					$return[$r->id]=$r->name." ($r->publiname)";
					}else{
					$return[]=array('id'=>$r->id,'name'=>$r->name." ($r->publiname)");
					}
					}

					}
					}
					return $return;
    	    }

    	    /**
    	    * Load unit list from bd table mdl_rcommon_books_units for a book
					* @param int $bookid ID of book
					* @param string $from request function to know response format
					* @return array with the loaded data
					*/
function rscorm_unit_list($bookid='',$from='ajax'){
global $CFG, $DB;

	if($from=='updateform'){
	 	$return[0]='- '.get_string('unit','rscorm').' -';
	}else{
		$return[]=array('id'=>0,'name'=>'- '.get_string('unit','rscorm').' -');
	}
	if($bookid!=""){
			if($records = $DB->get_records('rcommon_books_units',array('bookid' => $bookid), 'sortorder ASC')){
			foreach($records as $r){
			if($from=='updateform'){
					$return[$r->id]=$r->name;
	}else{
	$return[]=array('id'=>$r->id,'name'=>$r->name);
	}
	}

	}
	}
	return $return;
	}

	/**
	* Load activity list from bd table mdl_rcommon_books_activities
	* @param int $bookid ID of book
	* @param int $unitid ID of unit
	* @param string $from request function to know response format
	 * @return array width the loaded data
	 */
function rscorm_activity_list($bookid='',$unitid='',$from='ajax'){
	 global $CFG, $DB;

	 if($from=='updateform'){
		$return[0]='- '.get_string('activity','rscorm').' -';
	}else{
	$return[]=array('id'=>0,'name'=>'- '.get_string('activity','rscorm').' -');
	}
	if($bookid!=""&&$unitid!=""){
	    if($records = $DB->get_records_sql("SELECT * FROM {$CFG->prefix}rcommon_books_activities WHERE bookid='".$bookid."' AND unitid='".$unitid."' ORDER BY sortorder ASC")){
	    foreach($records as $r){
	    if($from=='updateform'){
	    $return[$r->id]=$r->name;
	}else{
	$return[]=array('id'=>$r->id,'name'=>$r->name);
	}
}

}
}
return $return;
}

/**
* Insert a register in to rcommond_errors_log
* @param string $action action to execute
* @param int $bookid ID of book
* @return int id_last_insert if success or false if failure
*/
function rscorm_insert_error_log($action, $id, $cmid=0){

global $USER, $COURSE;

$tmp = new stdClass();
$tmp->time      =  time();
$tmp->userid    =  $USER->id;
$tmp->ip        =  $_SERVER['REMOTE_ADDR'];
$tmp->course    =  $COURSE->id;
$tmp->module    =  "rscorm";
$tmp->cmid      =  $cmid;
$tmp->action    =  $action;
$tmp->url       =  $_SERVER['REQUEST_URI'];
$tmp->info      =  "ID: ".$id.", Text: ".get_string($action,'rscorm');

return insert_record("rcommon_errors_log",$tmp);
}
//********** FI

//MARSUPIAL ********** AFEGIT - Function to create manifest by user
/**
 * Create temporaly manifest to user before validate
 * @param int $scormid -> ID of the scorm
 * @return bool
 */
function rscorm_set_manifest_by_user($scorm, $manifesturl){

	global $CFG, $USER;

	$dir =$scorm->course.'/moddata/rscorm/'.$scorm->id.'/'.$USER->id;

	/*test if isset folder if not create it*/
	$dir=explode('/',$dir);
	$tempdir=$CFG->dataroot.'/';
	for ($i=0;$i<count($dir);$i++){
		$tempdir.=$dir[$i].'/';
		if (!file_exists($tempdir)) {
			if (!mkdir($tempdir)){
				/*error*/
				return false;
			}
		}
	}
	$userdir=$tempdir;

	/*copiamos manifiesto a la carpeta de cada usuario*/
	// MARSUPIAL ********** AFEGIT -> Cleaning extra info in imsmanifest file name to fix windows systems bug
	// 2011.08.29 @mmartinez
	if ($pos = textlib::strpos($manifesturl, '?')){
		$manifesturl = substr($manifesturl, 0, $pos);
		//echo "pos: {$pos} - manifesturl: {$manifesturl}"; //just for debug purpose
	}
	//********* END
	$localuserreference=$userdir.basename($manifesturl);

	//copy manifest using curl library

	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, $manifesturl);
	curl_setopt($curl, CURLOPT_HEADER, 0);

	if($outfile = @fopen($localuserreference, 'wb')){

		curl_setopt($curl, CURLOPT_FILE, $outfile);
		// MARSUPIAL ************ AFEGIT -> Added proxy option
		// 2012.08.30 @mmartinez
		if ($CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)){
			curl_setopt($curl, CURLOPT_PROXY, $CFG->proxyhost);
			if (!empty($CFG->proxyport)){
				curl_setopt($curl, CURLOPT_PROXYPORT, $CFG->proxyport);
			}
			if (!empty($CFG->proxyuser)){
				curl_setopt($curl, CURLOPT_PROXYUSERPWD, $CFG->proxyuser . ':' . $CFG->proxypassword);
			}
		}
		// ************** FI
		curl_exec($curl);
		fclose($outfile);

		curl_close($curl);

		return $localuserreference;
	}else{
		//set the description to show
		error(get_string('error_authentication', 'blocks/rcommon')." -1, ".get_string('error_code_-1', 'blocks/rcommon'));
		//save error on bd

	}
}
//********** FI




/**
 * Converts RSCORM duration notation to human-readable format
 * The function works with both RSCORM 1.2 and RSCORM 2004 time formats
 * @param $duration string RSCORM duration
 * @return string human-readable date/time
 */
function rscorm_format_duration($duration) {
    // fetch date/time strings
    $stryears = get_string('years');
    $strmonths = get_string('nummonths');
    $strdays = get_string('days');
    $strhours = get_string('hours');
    $strminutes = get_string('minutes');
    $strseconds = get_string('seconds');

    if ($duration[0] == 'P') {
        // if timestamp starts with 'P' - it's a RSCORM 2004 format
        // this regexp discards empty sections, takes Month/Minute ambiguity into consideration,
        // and outputs filled sections, discarding leading zeroes and any format literals
        // also saves the only zero before seconds decimals (if there are any) and discards decimals if they are zero
        $pattern = array( '#([A-Z])0+Y#', '#([A-Z])0+M#', '#([A-Z])0+D#', '#P(|\d+Y)0*(\d+)M#', '#0*(\d+)Y#', '#0*(\d+)D#', '#P#',
                          '#([A-Z])0+H#', '#([A-Z])[0.]+S#', '#\.0+S#', '#T(|\d+H)0*(\d+)M#', '#0*(\d+)H#', '#0+\.(\d+)S#', '#0*([\d.]+)S#', '#T#' );
        $replace = array( '$1', '$1', '$1', '$1$2 '.$strmonths.' ', '$1 '.$stryears.' ', '$1 '.$strdays.' ', '',
                          '$1', '$1', 'S', '$1$2 '.$strminutes.' ', '$1 '.$strhours.' ', '0.$1 '.$strseconds, '$1 '.$strseconds, '');
    } else {
        // else we have RSCORM 1.2 format there
        // first convert the timestamp to some RSCORM 2004-like format for conveniency
        $duration = preg_replace('#^(\d+):(\d+):([\d.]+)$#', 'T$1H$2M$3S', $duration);
        // then convert in the same way as RSCORM 2004
        $pattern = array( '#T0+H#', '#([A-Z])0+M#', '#([A-Z])[0.]+S#', '#\.0+S#', '#0*(\d+)H#', '#0*(\d+)M#', '#0+\.(\d+)S#', '#0*([\d.]+)S#', '#T#' );
        $replace = array( 'T', '$1', '$1', 'S', '$1 '.$strhours.' ', '$1 '.$strminutes.' ', '0.$1 '.$strseconds, '$1 '.$strseconds, '' );
    }

    $result = preg_replace($pattern, $replace, $duration);

    return $result;
}

function rscorm_get_toc($user,$scorm,$cmid,$toclink=RTOCJSLINK,$currentorg='',$scoid='',$mode='normal',$attempt='',$play=false, $tocheader=false) {
    global $CFG, $DB, $PAGE, $OUTPUT;

    $modestr = '';
    if ($mode == 'browse') {
        $modestr = '&amp;mode='.$mode;
    }

    $result = new stdClass();
    if ($tocheader) {
        $result->toc = '<div id="rscorm_layout">';
        $result->toc .= '<div id="rscorm_toc">';
        $result->toc .= '<div id="rscorm_tree">';
    }
    $result->toc .= '<ul>';
    $tocmenus = array();
    $result->prerequisites = true;
    $incomplete = false;

    //
    // Get the current organization infos
    //
    if (!empty($currentorg)) {
        if (($organizationtitle = $DB->get_field('rscorm_scoes','title', array('scorm'=>$scorm->id,'identifier'=>$currentorg))) != '') {
            if ($play) {
                $result->toctitle = "$organizationtitle";
            }
            else {
                $result->toc .= "\t<li>$organizationtitle</li>\n";
            }
            $tocmenus[] = $organizationtitle;
        }
    }

    //
    // If not specified retrieve the last attempt number
    //
    if (empty($attempt)) {
        $attempt = rscorm_get_attempt_count($user->id, $scorm);
    }
    $result->attemptleft = $scorm->maxattempt == 0 ? 1 : $scorm->maxattempt - $attempt;
    if ($scoes = rscorm_get_scoes($scorm->id, $currentorg)){
        //
        // Retrieve user tracking data for each learning object
        //
        $usertracks = array();
        foreach ($scoes as $sco) {
            if (!empty($sco->launch)) {
                if ($usertrack = rscorm_get_tracks($sco->id,$user->id,$attempt)) {
                    if ($usertrack->status == '') {
                        $usertrack->status = 'notattempted';
                    }
                    $usertracks[$sco->identifier] = $usertrack;
                }
            }
        }

        $level=0;
        $sublist=1;
        $previd = 0;
        $nextid = 0;
        $findnext = false;
        $parents[$level]='/';
        $prevsco = '';
        foreach ($scoes as $pos => $sco) {
            $isvisible = false;
            $sco->title = $sco->title;
            if (!isset($sco->isvisible) || (isset($sco->isvisible) && ($sco->isvisible == 'true'))) {
                $isvisible = true;
            }
            if ($parents[$level] != $sco->parent) {
                $newlevel = array_search($sco->parent,$parents);
                if ($newlevel !== false) {
                    for ($i=0; $i<($level-$newlevel); $i++) {
                        $result->toc .= "\t\t</li></ul></li>\n";
                    }
                    $level = $newlevel;
                } else {
                    $i = $level;
                    $closelist = '';
                    while (($i > 0) && ($parents[$level] != $sco->parent)) {
                        if ($i === 1 && $level > 1) {
                            $closelist .= "\t\t</ul></li>\n";
                        } else {
                            $closelist .= "\t</li></ul></li>\n";
                        }
                        $i--;
                    }
                    if (($i == 0) && ($sco->parent != $currentorg)) {
                        $result->toc .= "\n\t<ul>\n";
                        $level++;
                    } else {
                        $result->toc .= $closelist;
                        $level = $i;
                    }
                    $parents[$level] = $sco->parent;
                }
            }
            if ($isvisible) {
                $result->toc .= "<li>";
            }
            if (isset($scoes[$pos+1])) {
                $nextsco = $scoes[$pos+1];
            } else {
                $nextsco = false;
            }
            $nextisvisible = false;
            if (($nextsco !== false) && (!isset($nextsco->isvisible) || (isset($nextsco->isvisible) && ($nextsco->isvisible == 'true')))) {
                $nextisvisible = true;
            }
            if ($nextisvisible && ($nextsco !== false) && ($sco->parent != $nextsco->parent) &&
               (($level==0) || (($level>0) && ($nextsco->parent == $sco->identifier)))) {
                $sublist++;
            }
            if (empty($sco->title)) {
                $sco->title = $sco->identifier;
            }
            if ($isvisible) {
                if (!empty($sco->launch)) {
                    $score = '';
                    if (empty($scoid) && ($mode != 'normal')) {
                        $scoid = $sco->id;
                    }
                    if (isset($usertracks[$sco->identifier])) {
                        $usertrack = $usertracks[$sco->identifier];
                        $strstatus = get_string($usertrack->status,'rscorm');
                        if ($sco->scormtype == 'sco') {
                            $statusicon = '<img src="'.$OUTPUT->pix_url($usertrack->status, 'rscorm').'" alt="'.$strstatus.'" title="'.$strstatus.'" />';
                        } else {
                            $statusicon = '<img src="'.$OUTPUT->pix_url('assetc', 'rscorm').'" alt="'.get_string('assetlaunched','rscorm').'" title="'.get_string('assetlaunched','rscorm').'" />';
                        }

                        if (($usertrack->status == 'notattempted') || ($usertrack->status == 'incomplete') || ($usertrack->status == 'browsed')) {
                            $incomplete = true;
                            if ($play && empty($scoid)) {
                                $scoid = $sco->id;
                            }
                        }
                        if ($usertrack->score_raw != '' && has_capability('mod/rscorm:viewscores', get_context_instance(CONTEXT_MODULE,$cmid))) {
                            $score = '('.get_string('score','rscorm').':&nbsp;'.$usertrack->score_raw.')';
                        }
                        $strsuspended = get_string('suspended','rscorm');
                        $exitvar = 'cmi.core.exit';
                        if (rscorm_version_check($scorm->version, RSCORM_13)) {
                            $exitvar = 'cmi.exit';
                        }
                        if ($incomplete && isset($usertrack->{$exitvar}) && ($usertrack->{$exitvar} == 'suspend')) {
                            $statusicon = '<img src="'.$OUTPUT->pix_url('suspend', 'rscorm').'" alt="'.$strstatus.' - '.$strsuspended.'" title="'.$strstatus.' - '.$strsuspended.'" />';
                        }
                    } else {
                        if ($play && empty($scoid)) {
                            $scoid = $sco->id;
                        }
                        $incomplete = true;
                        if ($sco->scormtype == 'sco') {
                            $statusicon = '<img src="'.$OUTPUT->pix_url('notattempted', 'rscorm').'" alt="'.get_string('notattempted','rscorm').'" title="'.get_string('notattempted','rscorm').'" />';
                        } else {
                            $statusicon = '<img src="'.$OUTPUT->pix_url('asset', 'rscorm').'" alt="'.get_string('asset','rscorm').'" title="'.get_string('asset','rscorm').'" />';
                        }
                    }
                    if ($sco->id == $scoid) {
                        $findnext = true;
                    }

                    if (($nextid == 0) && (rscorm_count_launchable($scorm->id,$currentorg) > 1) && ($nextsco!==false) && (!$findnext)) {
                        if (!empty($sco->launch)) {
                            $previd = $sco->id;
                        }
                    }
                    if (rscorm_version_check($scorm->version, RSCORM_13)) {
                        require_once($CFG->dirroot.'/mod/rscorm/datamodels/sequencinglib.php');
                        $prereq = rscorm_seq_evaluate($sco->id,$usertracks);
                    } else {
                        //TODO: split check for sco->prerequisites only for AICC as I think that's the only case it's set.
                        $prereq = empty($sco->prerequisites) || rscorm_eval_prerequisites($sco->prerequisites,$usertracks);
                    }
                    if ($prereq) {
                        if ($sco->id == $scoid) {
                            $result->prerequisites = true;
                        }
                        if (!empty($prevsco) && rscorm_version_check($scorm->version, RSCORM_13) && !empty($prevsco->hidecontinue)) {
                            $result->toc .= '<span>'.$statusicon.'&nbsp;'.format_string($sco->title).'</span>';
                        } else if ($toclink == RTOCFULLURL) { //display toc with urls for structure page
                            $url = $CFG->wwwroot.'/mod/rscorm/player.php?a='.$scorm->id.'&amp;currentorg='.$currentorg.$modestr.'&amp;scoid='.$sco->id;
                            $result->toc .= $statusicon.'&nbsp;<a href="'.$url.'">'.format_string($sco->title).'</a>'.$score."\n";
                        } else { //display toc for inside scorm player
                            if ($sco->launch) {
                                $link = 'a='.$scorm->id.'&scoid='.$sco->id.'&currentorg='.$currentorg.$modestr.'&attempt='.$attempt;
                                $result->toc .= '<a title="'.$link.'">'.$statusicon.'&nbsp;'.format_string($sco->title).'&nbsp;'.$score.'</a>';
                            } else {
                                $result->toc .= '<span>'.$statusicon.'&nbsp;'.format_string($sco->title).'</span>';
                            }
                        }
                        $tocmenus[$sco->id] = rscorm_repeater('&minus;',$level) . '&gt;' . format_string($sco->title);
                    } else {
                        if ($sco->id == $scoid) {
                            $result->prerequisites = false;
                        }
                        if ($play) {
                            // should be disabled
                            $result->toc .= '<span>'.$statusicon.'&nbsp;'.format_string($sco->title).'</span>';
                        } else {
                            $result->toc .= $statusicon.'&nbsp;'.format_string($sco->title)."\n";
                        }
                    }
                } else {
                    $result->toc .= '&nbsp;'.format_string($sco->title);
                }
                if (($nextsco === false) || $nextsco->parent == $sco->parent) {
                    $result->toc .= "</li>\n";
                }
            }
            if (($nextsco !== false) && ($nextid == 0) && ($findnext)) {
                if (!empty($nextsco->launch)) {
                    $nextid = $nextsco->id;
                }
            }
            $prevsco = $sco;
        }
        for ($i=0;$i<$level;$i++) {
            $result->toc .= "\t\t</ul></li>\n";
        }

        if ($play) {
            // it is possible that $scoid is still not set, in this case we don't want an empty object
            if ($scoid) {
                $sco = rscorm_get_sco($scoid);
            }
            $sco->previd = $previd;
            $sco->nextid = $nextid;
            $result->sco = $sco;
            $result->incomplete = $incomplete;
        } else {
            $result->incomplete = $incomplete;
        }
    }
    $result->toc .= '</ul>';

    // NEW IMS TOC
    if ($tocheader) {
        $result->toc .= '</div></div></div>';
        $result->toc .= '<div id="rscorm_navpanel"></div>';
    }

    $url = new moodle_url('/mod/rscorm/player.php?a='.$scorm->id.'&currentorg='.$currentorg.$modestr);
    $result->tocmenu = $OUTPUT->single_select($url, 'scoid', $tocmenus, $sco->id, null, "tocmenu");

    return $result;
}
