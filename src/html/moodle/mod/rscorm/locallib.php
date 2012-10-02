<?php  // $Id: locallib.php,v 1.46.2.31 2009/03/11 20:25:04 danmarsden Exp $

/// Constants and settings for module scorm
define('RSCORM_UPDATE_NEVER', '0');
define('RSCORM_UPDATE_ONCHANGE', '1');
define('RSCORM_UPDATE_EVERYDAY', '2');
define('RSCORM_UPDATE_EVERYTIME', '3');

define('RSCORM_SCO_ALL', 0);
define('RSCORM_SCO_DATA', 1);
define('RSCORM_SCO_ONLY', 2);

define('RSCORM_GRADESCOES', '0');
define('RSCORM_GRADEHIGHEST', '1');
define('RSCORM_GRADEAVERAGE', '2');
define('RSCORM_GRADESUM', '3');

define('RSCORM_HIGHESTATTEMPT', '0');
define('RSCORM_AVERAGEATTEMPT', '1');
define('RSCORM_FIRSTATTEMPT', '2');
define('RSCORM_LASTATTEMPT', '3');

/**
 * Returns an array of the popup options for SCORM and each options default value
 *
 * @return array an array of popup options as the key and their defaults as the value
 */
function rscorm_get_popup_options_array(){
    global $CFG;
    return array('resizable'=> isset($CFG->rscorm_resizable) ? $CFG->rscorm_resizable : 0,
                 'scrollbars'=> isset($CFG->rscorm_scrollbars) ? $CFG->rscorm_scrollbars : 0,
                 'directories'=> isset($CFG->rscorm_directories) ? $CFG->rscorm_directories : 0,
                 'location'=> isset($CFG->rscorm_location) ? $CFG->rscorm_location : 0,
                 'menubar'=> isset($CFG->rscorm_menubar) ? $CFG->rscorm_menubar : 0,
                 'toolbar'=> isset($CFG->rscorm_toolbar) ? $CFG->rscorm_toolbar : 0,
                 'status'=> isset($CFG->rscorm_status) ? $CFG->rscorm_status : 0);
}

/// Local Library of functions for module scorm
/**
 * Returns an array of the array of what grade options
 *
 * @return array an array of what grade options
 */
function rscorm_get_grade_method_array(){
    return array (RSCORM_GRADESCOES => get_string('gradescoes', 'rscorm'),
                  RSCORM_GRADEHIGHEST => get_string('gradehighest', 'rscorm'),
                  RSCORM_GRADEAVERAGE => get_string('gradeaverage', 'rscorm'),
                  RSCORM_GRADESUM => get_string('gradesum', 'rscorm'));
}

/**
 * Returns an array of the array of what grade options
 *
 * @return array an array of what grade options
 */
function rscorm_get_what_grade_array(){
    return array (RSCORM_HIGHESTATTEMPT => get_string('highestattempt', 'rscorm'),
                  RSCORM_AVERAGEATTEMPT => get_string('averageattempt', 'rscorm'),
                  RSCORM_FIRSTATTEMPT => get_string('firstattempt', 'rscorm'),
                  RSCORM_LASTATTEMPT => get_string('lastattempt', 'rscorm'));
}

/**
 * Returns an array of the array of skip view options
 *
 * @return array an array of skip view options
 */
function rscorm_get_skip_view_array(){
   return array(0 => get_string('never'),
                 1 => get_string('firstaccess','rscorm'),
                 2 => get_string('always'));
}

/**
 * Returns an array of the array of hide table of contents options
 *
 * @return array an array of hide table of contents options
 */
function rscorm_get_hidetoc_array(){
     return array(0 =>get_string('sided','rscorm'),
                  1 => get_string('hidden','rscorm'),
                  2 => get_string('popupmenu','rscorm'));
}

/**
 * Returns an array of the array of update frequency options
 *
 * @return array an array of update frequency options
 */
function rscorm_get_updatefreq_array(){
    return array(0 => get_string('never'),
                 1 => get_string('everyday','rscorm'),
                 2 => get_string('everytime','rscorm'));
}

/**
 * Returns an array of the array of popup display options
 *
 * @return array an array of popup display options
 */
function rscorm_get_popup_display_array(){
    return array(0 => get_string('iframe', 'rscorm'),
                 1 => get_string('popup', 'rscorm'));
}

/**
 * Returns an array of the array of attempt options
 *
 * @return array an array of attempt options
 */
function rscorm_get_attempts_array(){
    $attempts = array(0 => get_string('nolimit','rscorm'),
                      1 => get_string('attempt1','rscorm'));

    for ($i=2; $i<=6; $i++) {
        $attempts[$i] = get_string('attemptsx','rscorm', $i);
    }

    return $attempts;
}

/**
* This function will permanently delete the given
* directory and all files and subdirectories.
*
* @param string $directory The directory to remove
* @return boolean
*/
function rscorm_delete_files($directory) {
    if (is_dir($directory)) {
        $files=rscorm_scandir($directory);
        set_time_limit(0);
        foreach($files as $file) {
            if (($file != '.') && ($file != '..')) {
                if (!is_dir($directory.'/'.$file)) {
                    unlink($directory.'/'.$file);
                } else {
                    rscorm_delete_files($directory.'/'.$file);
                }
            }
        }
        rmdir($directory);
        return true;
    }
    return false;
}

/**
* Given a diretory path returns the file list
*
* @param string $directory
* @return array
*/
function rscorm_scandir($directory) {
    if (version_compare(phpversion(),'5.0.0','>=')) {
        return scandir($directory);
    } else {
        $files = array();
        if ($dh = opendir($directory)) {
            while (($file = readdir($dh)) !== false) {
               $files[] = $file;
            }
            closedir($dh);
        }
        return $files;
    }
}

/**
* Create a new temporary subdirectory with a random name in the given path
*
* @param string $strpath The scorm data directory
* @return string/boolean
*/
function rscorm_tempdir($strPath)
{
    global $CFG;

    if (is_dir($strPath)) {
        do {
            // Create a random string of 8 chars
            $randstring = NULL;
            $lchar = '';
            $len = 8;
            for ($i=0; $i<$len; $i++) {
                $char = chr(rand(48,122));
                while (!ereg('[a-zA-Z0-9]', $char)){
                    if ($char == $lchar) continue;
                        $char = chr(rand(48,90));
                    }
                    $randstring .= $char;
                    $lchar = $char;
            }
            $datadir='/'.$randstring;
        } while (file_exists($strPath.$datadir));
        mkdir($strPath.$datadir, $CFG->directorypermissions);
        @chmod($strPath.$datadir, $CFG->directorypermissions);  // Just in case mkdir didn't do it
        return $strPath.$datadir;
    } else {
        return false;
    }
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
    for ($i=0; $i<$times;$i++) {
        $return .= $what;
    }
    return $return;
}

function rscorm_external_link($link) {
// check if a link is external
    $result = false;
    $link = strtolower($link);
    if (substr($link,0,7) == 'http://') {
        $result = true;
    } else if (substr($link,0,8) == 'https://') {
        $result = true;
    } else if (substr($link,0,4) == 'www.') {
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

function rscorm_get_sco($id,$what=RSCORM_SCO_ALL) {
    if ($sco = get_record('rscorm_scoes','id',$id)) {
// MARSUPIAL *********** AFEGIT - look for the launch item at set it to the sco 
        global $USER;
        if($launch=get_field('rscorm_scoes_users','launch','scormid',$sco->scorm,'scoid',$sco->id,'userid',$USER->id)){
            $sco->launch=$launch;
        }                     	
//********** FI
        $sco = ($what == RSCORM_SCO_DATA) ? new stdClass() : $sco;
        if (($what != RSCORM_SCO_ONLY) && ($scodatas = get_records('rscorm_scoes_data','scoid',$id))) {
            foreach ($scodatas as $scodata) {
                $sco->{$scodata->name} = $scodata->value;
            }
        } else if (($what != RSCORM_SCO_ONLY) && (!($scodatas = get_records('rscorm_scoes_data','scoid',$id)))) {
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

function rscorm_get_scoes($id,$organisation=false) {
// MARSUPIAL *********** AFEGIT - needed to search for the user launch of each sco
        global $USER;        	  
//********** FI
    $organizationsql = '';
    if (!empty($organisation)) {
        $organizationsql = "AND organization='$organisation'";
    }
    if ($scoes = get_records_select('rscorm_scoes',"scorm='$id' $organizationsql order by id ASC")) {
        // drop keys so that it is a simple array as expected
        $scoes = array_values($scoes);
        foreach ($scoes as $sco) {
            if ($scodatas = get_records('rscorm_scoes_data','scoid',$sco->id)) {
                foreach ($scodatas as $scodata) {
                    $sco->{$scodata->name} = stripslashes_safe($scodata->value);
                }
            }
// MARSUPIAL *********** AFEGIT - look for the launch item at set it to the sco    
        	if($launch=get_field('rscorm_scoes_users','launch','scormid',$id,'scoid',$sco->id,'userid',$USER->id)){
        		$sco->launch=$launch;
        	}        	
//********** FI
        }
        return $scoes;
    } else {
        return false;
    }
}

function rscorm_insert_track($userid,$scormid,$scoid,$attempt,$element,$value) {
    $id = null;
    if ($track = get_record_select('rscorm_scoes_track',"userid='$userid' AND scormid='$scormid' AND scoid='$scoid' AND attempt='$attempt' AND element='$element'")) {
        $track->value = addslashes_js($value);
        $track->timemodified = time();
        $id = update_record('rscorm_scoes_track',$track);
    } else {
        $track->userid = $userid;
        $track->scormid = $scormid;
        $track->scoid = $scoid;
        $track->attempt = $attempt;
        $track->element = $element;
        $track->value = addslashes_js($value);
        $track->timemodified = time();
        $id = insert_record('rscorm_scoes_track',$track);
    }

    if (strstr($element, '.score.raw') ||
        (($element == 'cmi.core.lesson_status' || $element == 'cmi.completion_status') && ($track->value == 'completed' || $track->value == 'passed'))) {
        $scorm = get_record('rscorm', 'id', $scormid);
        $grademethod = $scorm->grademethod % 10;
        include_once('lib.php');
        rscorm_update_grades($scorm, $userid);
    }

    return $id;
}

function rscorm_get_tracks($scoid,$userid,$attempt='') {
/// Gets all tracks of specified sco and user
    global $CFG;

    if (empty($attempt)) {
        if ($scormid = get_field('rscorm_scoes','scorm','id',$scoid)) {
            $attempt = rscorm_get_last_attempt($scormid,$userid);
        } else {
            $attempt = 1;
        }
    }
    $attemptsql = ' AND attempt=' . $attempt;
    if ($tracks = get_records_select('rscorm_scoes_track',"userid=$userid AND scoid=$scoid".$attemptsql,'element ASC')) {
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
            $track->value = stripslashes_safe($track->value);
            $usertrack->{$element} = $track->value;
            switch ($element) {
                case 'x.start.time':
                    $usertrack->x_start_time = $track->value;
                    break;
                case 'cmi.core.lesson_status':
                case 'cmi.completion_status':
                    if ($track->value == 'not attempted') {
                        $track->value = 'notattempted';
                    }
                    $usertrack->status = $track->value;
                break;
                case 'cmi.core.score.raw':
                case 'cmi.score.raw':
                    $usertrack->score_raw = sprintf('%0d', $track->value);
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
 * @param int $scormid SCORM Id
 * @param int $scoid SCO Id
 * @param int $userid User Id
 * @param int $attemt Attempt Id
 *
 * @return object start and finsh time EPOC secods
 *
 */
function rscorm_get_sco_runtime($scormid, $scoid, $userid, $attempt=1) {

    $timedata = new object();
    $sql = !empty($scoid) ? "userid=$userid AND scormid=$scormid AND scoid=$scoid AND attempt=$attempt" : "userid=$userid AND scormid=$scormid AND attempt=$attempt";
    $tracks = get_records_select('rscorm_scoes_track',"$sql ORDER BY timemodified ASC");
    if ($tracks) {
        $tracks = array_values($tracks);
    }

    if ($start_track = get_records_select('rscorm_scoes_track',"$sql AND element='x.start.time' ORDER BY scoid ASC")) {
        $start_track = array_values($start_track);
        $timedata->start = $start_track[0]->value;
    }
    else if ($tracks) {
        $timedata->start = $tracks[0]->timemodified;
    }
    else {
        $timedata->start = false;
    }
    if ($tracks && $track = array_pop($tracks)) {
        $timedata->finish = $track->timemodified;
    }
    else {
        $timedata->finish = $timedata->start;
    }
    return $timedata;
}


function rscorm_get_user_data($userid) {
/// Gets user info required to display the table of scorm results
/// for report.php

    return get_record('user','id',$userid,'','','','','firstname, lastname, picture');
}

function rscorm_grade_user_attempt($scorm, $userid, $attempt=1, $time=false) {
    $attemptscore = NULL;
    $attemptscore->scoes = 0;
    $attemptscore->values = 0;
    $attemptscore->max = 0;
    $attemptscore->sum = 0;
    $attemptscore->lastmodify = 0;

    if (!$scoes = get_records('rscorm_scoes','scorm',$scorm->id)) {
        return NULL;
    }

    // this treatment is necessary as the whatgrade field was not in the DB
    // and so whatgrade and grademethod are combined in grademethod 10s are whatgrade
    // and 1s are grademethod
    $grademethod = $scorm->grademethod % 10;

    foreach ($scoes as $sco) {
        if ($userdata = rscorm_get_tracks($sco->id, $userid, $attempt)) {
            if (($userdata->status == 'completed') || ($userdata->status == 'passed')) {
                $attemptscore->scoes++;
            }
            if (!empty($userdata->score_raw)) {
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
    switch ($grademethod) {
        case RSCORM_GRADEHIGHEST:
            $score = $attemptscore->max;
        break;
        case RSCORM_GRADEAVERAGE:
            if ($attemptscore->values > 0) {
                $score = $attemptscore->sum/$attemptscore->values;
            } else {
                $score = 0;
            }
        break;
        case RSCORM_GRADESUM:
            $score = $attemptscore->sum;
        break;
        case RSCORM_GRADESCOES:
            $score = $attemptscore->scoes;
        break;
        default:
            $score = $attemptscore->max;   // Remote Learner RSCORM_GRADEHIGHEST is default
    }

    if ($time) {
        $result = new stdClass();
        $result->score = $score;
        $result->time = $attemptscore->lastmodify;
    } else {
        $result = $score;
    }

    return $result;
}

function rscorm_grade_user($scorm, $userid, $time=false) {
    // this treatment is necessary as the whatgrade field was not in the DB
    // and so whatgrade and grademethod are combined in grademethod 10s are whatgrade
    // and 1s are grademethod
    $whatgrade = intval($scorm->grademethod / 10);

    // insure we dont grade user beyond $scorm->maxattempt settings
    $lastattempt = rscorm_get_last_attempt($scorm->id, $userid);
    if($scorm->maxattempt != 0 && $lastattempt >= $scorm->maxattempt){
        $lastattempt = $scorm->maxattempt;
    }

    switch ($whatgrade) {
        case RSCORM_FIRSTATTEMPT:
            return rscorm_grade_user_attempt($scorm, $userid, 1, $time);
        break;
        case RSCORM_LASTATTEMPT:
            return rscorm_grade_user_attempt($scorm, $userid, rscorm_get_last_attempt($scorm->id, $userid), $time);
        break;
        case RSCORM_HIGHESTATTEMPT:
            $maxscore = 0;
            $attempttime = 0;
            for ($attempt = 1; $attempt <= $lastattempt; $attempt++) {
                $attemptscore = rscorm_grade_user_attempt($scorm, $userid, $attempt, $time);
                if ($time) {
                    if ($attemptscore->score > $maxscore) {
                        $maxscore = $attemptscore->score;
                        $attempttime = $attemptscore->time;
                    }
                } else {
                    $maxscore = $attemptscore > $maxscore ? $attemptscore: $maxscore;
                }
            }
            if ($time) {
                $result = new stdClass();
                $result->score = $maxscore;
                $result->time = $attempttime;
                return $result;
            } else {
               return $maxscore;
            }
        break;
        case RSCORM_AVERAGEATTEMPT:
            $lastattempt = rscorm_get_last_attempt($scorm->id, $userid);
            $sumscore = 0;
            for ($attempt = 1; $attempt <= $lastattempt; $attempt++) {
                $attemptscore = rscorm_grade_user_attempt($scorm, $userid, $attempt, $time);
                if ($time) {
                    $sumscore += $attemptscore->score;
                } else {
                    $sumscore += $attemptscore;
                }
            }

            if ($lastattempt > 0) {
                $score = $sumscore / $lastattempt;
            } else {
                $score = 0;
            }

            if ($time) {
                $result = new stdClass();
                $result->score = $score;
                $result->time = $attemptscore->time;
                return $result;
            } else {
               return $score;
            }
        break;
    }
}

function rscorm_count_launchable($scormid,$organization='') {
    $strorganization = '';
    if (!empty($organization)) {
        $strorganization = " AND organization='$organization'";
    }
    return count_records_select('rscorm_scoes',"scorm=$scormid$strorganization AND launch<>'".sql_empty()."'");
}

function rscorm_get_last_attempt($scormid, $userid) {
/// Find the last attempt number for the given user id and scorm id
    if ($lastattempt = get_record('rscorm_scoes_track', 'userid', $userid, 'scormid', $scormid, '', '', 'max(attempt) as a')) {
        if (empty($lastattempt->a)) {
            return '1';
        } else {
            return $lastattempt->a;
        }
    }
}

function rscorm_course_format_display($user,$course) {
    global $CFG;

    $strupdate = get_string('update');
    $strmodule = get_string('modulename','rscorm');
    $context = get_context_instance(CONTEXT_COURSE,$course->id);

    echo '<div class="mod-scorm">';
    if ($scorms = get_all_instances_in_course('rscorm', $course)) {
        // The module SCORM activity with the least id is the course
        $scorm = current($scorms);
        if (! $cm = get_coursemodule_from_instance('rscorm', $scorm->id, $course->id)) {
            error('Course Module ID was incorrect');
        }
        $colspan = '';
        $headertext = '<table width="100%"><tr><td class="title">'.get_string('name').': <b>'.format_string($scorm->name).'</b>';
        if (has_capability('moodle/course:manageactivities', $context)) {
            if (isediting($course->id)) {
                // Display update icon
                $path = $CFG->wwwroot.'/course';
                $headertext .= '<span class="commands">'.
                        '<a title="'.$strupdate.'" href="'.$path.'/mod.php?update='.$cm->id.'&amp;sesskey='.sesskey().'">'.
                        '<img src="'.$CFG->pixpath.'/t/edit.gif" class="iconsmall" alt="'.$strupdate.'" /></a></span>';
            }
            $headertext .= '</td>';
            // Display report link
            $trackedusers = get_record('rscorm_scoes_track', 'scormid', $scorm->id, '', '', '', '', 'count(distinct(userid)) as c');
            if ($trackedusers->c > 0) {
                $headertext .= '<td class="reportlink">'.
                              '<a '.$CFG->frametarget.'" href="'.$CFG->wwwroot.'/mod/rscorm/report.php?id='.$cm->id.'">'.
                               get_string('viewallreports','rscorm',$trackedusers->c).'</a>';
            } else {
                $headertext .= '<td class="reportlink">'.get_string('noreports','rscorm');
            }
            $colspan = ' colspan="2"';
        }
        $headertext .= '</td></tr><tr><td'.$colspan.'>'.format_text(get_string('summary').':<br />'.$scorm->summary).'</td></tr></table>';
        print_simple_box($headertext,'','100%');
        rscorm_view_display($user, $scorm, 'view.php?id='.$course->id, $cm, '100%');
    } else {
        if (has_capability('moodle/course:update', $context)) {
            // Create a new activity
            redirect($CFG->wwwroot.'/course/mod.php?id='.$course->id.'&amp;section=0&sesskey='.sesskey().'&amp;add=scorm');
        } else {
            notify('Could not find a scorm course here');
        }
    }
    echo '</div>';
}

function rscorm_view_display ($user, $scorm, $action, $cm, $boxwidth='') {
    global $CFG;

    if ($scorm->updatefreq == RSCORM_UPDATE_EVERYTIME){
        require_once($CFG->dirroot.'/mod/rscorm/lib.php');

        $scorm->instance = $scorm->id;
        rscorm_update_instance($scorm);
    }

    $organization = optional_param('organization', '', PARAM_INT);

    print_simple_box_start('center',$boxwidth);
?>
        <div class="structurehead"><?php print_string('contents','rscorm'); ?></div>
<?php
    if (empty($organization)) {
        $organization = $scorm->launch;
    }
     
     if ($orgs = get_records_select_menu('rscorm_scoes',"scorm='$scorm->id' AND organization='' AND launch=''",'id','id,title')) {
        if (count($orgs) > 1) {
 ?>
            <div class='scorm-center'>
                <?php print_string('organizations','rscorm') ?>
                <form id='changeorg' method='post' action='<?php echo $action ?>'>
                    <?php choose_from_menu($orgs, 'organization', "$organization", '','submit()') ?>
                </form>
            </div>
<?php
        }
    }
    $orgidentifier = '';
    if ($sco = rscorm_get_sco($organization, RSCORM_SCO_ONLY)) {
        if (($sco->organization == '') && ($sco->launch == '')) {
            $orgidentifier = $sco->identifier;
        } else {
            $orgidentifier = $sco->organization;
        }
    }

/*
 $orgidentifier = '';
    if ($org = get_record('rscorm_scoes','id',$organization)) {
        if (($org->organization == '') && ($org->launch == '')) {
            $orgidentifier = $org->identifier;
        } else {
            $orgidentifier = $org->organization;
        }
    }*/

    $scorm->version = strtolower(clean_param($scorm->version, PARAM_SAFEDIR));   // Just to be safe
    if (!file_exists($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php')) {
        $scorm->version = 'scorm_12';
    }
    require_once($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php');    
    
    $result = rscorm_get_toc($user,$scorm,'structlist',$orgidentifier);
    $incomplete = $result->incomplete;
    echo $result->toc;
    
    print_simple_box_end();

?>
            <div class="scorm-center">
               <form id="theform" method="post" action="<?php echo $CFG->wwwroot ?>/mod/rscorm/player.php">
              <?php
                  if ($scorm->hidebrowse == 0) {
                      print_string('mode','rscorm');
                      echo ': <input type="radio" id="b" name="mode" value="browse" /><label for="b">'.get_string('browse','rscorm').'</label>'."\n";
                      echo '<input type="radio" id="n" name="mode" value="normal" checked="checked" /><label for="n">'.get_string('normal','rscorm')."</label>\n";
                  } else {
                      echo '<input type="hidden" name="mode" value="normal" />'."\n";
                  }
                  if (($incomplete === false) && (($result->attemptleft > 0)||($scorm->maxattempt == 0))) {
?>
                  <br />
                  <input type="checkbox" id="a" name="newattempt" />
                  <label for="a"><?php print_string('newattempt','rscorm') ?></label>
<?php
                  }
              ?>
              <br />
              <input type="hidden" name="scoid"/>
              <input type="hidden" name="id" value="<?php echo $cm->id ?>"/>
              <input type="hidden" name="currentorg" value="<?php echo $orgidentifier ?>" />
              <input type="submit" value="<?php print_string('enter','rscorm') ?>" />
              </form>
          </div>
<?php
}
function rscorm_simple_play($scorm,$user) {
    $result = false;

    if ($scorm->updatefreq == RSCORM_UPDATE_EVERYTIME) {
        rscorm_parse($scorm);
    }
// MARSUPIAL ********** AFEGIT - for the search
    global $CFG;
//**********FI
// MARSUPIAL ********** MODIFICAT - search for all sco and after look for the particular launch
    //$scoes = get_records_select('rscorm_scoes','scorm='.$scorm->id.' AND launch<>\''.sql_empty().'\'');
    $scoes = recordset_to_array(get_recordset_sql("SELECT RS.* FROM {$CFG->prefix}rscorm_scoes RS 
        JOIN {$CFG->prefix}rscorm_scoes_users RSU ON RSU.scoid = RS.id WHERE RS.scorm='".$scorm->id."' AND RSU.launch<>'".sql_empty()."' AND RSU.userid='".$user->id."'"));
//*********FI
    if ($scoes) {
        if ($scorm->skipview >= 1) {
            $sco = current($scoes);
            if (rscorm_get_tracks($sco->id,$user->id) === false) {
                header('Location: player.php?a='.$scorm->id.'&scoid='.$sco->id);
                $result = true;
            } else if ($scorm->skipview == 2) {
                header('Location: player.php?a='.$scorm->id.'&scoid='.$sco->id);
                $result = true;
            }
        }
    }
    return $result;
}
/*
function scorm_simple_play($scorm,$user) {
    $result = false;
    if ($scoes = get_records_select('rscorm_scoes','scorm='.$scorm->id.' AND launch<>""')) {
        if (count($scoes) == 1) {
            if ($scorm->skipview >= 1) {
                $sco = current($scoes);
                if (scorm_get_tracks($sco->id,$user->id) === false) {
                    header('Location: player.php?a='.$scorm->id.'&scoid='.$sco->id);
                    $result = true;
                } else if ($scorm->skipview == 2) {
                    header('Location: player.php?a='.$scorm->id.'&scoid='.$sco->id);
                    $result = true;
                }
            }
        }
    }
    return $result;
}
*/
function rscorm_parse($scorm) {
    global $CFG;

    if ($scorm->reference[0] == '#') {
        if (isset($CFG->repositoryactivate) && $CFG->repositoryactivate) {
            $referencedir = $CFG->repository.substr($scorm->reference,1);
        }
    } else {
        if ((!rscorm_external_link($scorm->reference)) && (basename($scorm->reference) == 'imsmanifest.xml')) {
            $referencedir = $CFG->dataroot.'/'.$scorm->course.'/'.$scorm->datadir;
        } else {
            $referencedir = $CFG->dataroot.'/'.$scorm->course.'/moddata/rscorm/'.$scorm->id;
        }
    }

    // Parse scorm manifest
    if ($scorm->pkgtype == 'AICC') {
        require_once('datamodels/aicclib.php');
        $scorm->launch = rscorm_parse_aicc($referencedir, $scorm->id);
    } else {
        require_once('datamodels/scormlib.php');
        $scorm->launch = rscorm_parse_scorm($referencedir,$scorm->id);
    }
    return $scorm->launch;
}

/**
* Given a manifest path, this function will check if the manifest is valid
*
* @param string $manifest The manifest file
* @return object
*/
function rscorm_validate_manifest($manifest) {
    $validation = new stdClass();
    if (is_file($manifest)) {
        $validation->result = true;
    } else {
        $validation->result = false;
        $validation->errors['reference'] = get_string('nomanifest','rscorm');
    }
    return $validation;
}

/**
* Given a aicc package directory, this function will check if the course structure is valid
* @param string $packagedir The aicc package directory path
* @return object
*/
function rscorm_validate_aicc($packagedir) {
    $validation = new stdClass();
    $validation->result = false;
    if (is_dir($packagedir)) {
        if ($handle = opendir($packagedir)) {
            while (($file = readdir($handle)) !== false) {
                $ext = substr($file,strrpos($file,'.'));
                if (strtolower($ext) == '.cst') {
                    $validation->result = true;
                    break;
                }
            }
            closedir($handle);
        }
    }
    if ($validation->result == false) {
        $validation->errors['reference'] = get_string('nomanifest','rscorm');
    }
    return $validation;
}

/**
 * 
 * @param $data
 * @return bool
 */
function rscorm_validate($data) {
    global $CFG;

    $validation = new stdClass();
    $validation->errors = array();
    $validation->result=true;

    if (!isset($data['course']) || empty($data['course'])) {
        $validation->errors['reference'] = get_string('missingparam','rscorm');
        $validation->result = false;
        return $validation;
    }
    $courseid = $data['course'];                  // Course Module ID
// MARSUPIAL ********** ELIMINAT - Take out becouse we just select a option in the select box
    /*
    if (!isset($data['reference']) || empty($data['reference'])) {
        $validation->errors['reference'] = get_string('packagefile','rscorm');
        $validation->result = false;
        return $validation;
    }
    $reference = $data['reference'];              // Package/manifest path/location*/
//********** FI

    $scormid = $data['instance'];                 // scorm ID
    $scorm = new stdClass();
    if (!empty($scormid)) {
        if (!$scorm = get_record('rscorm','id',$scormid)) {
            $validation->errors['reference'] = get_string('missingparam','rscorm');
            $validation->result = false;
            return $validation;
        }
    }
// MARSUPIAL ********** ELIMINAT - Take out becouse we just select a option in the select box
    /*
    if ($reference[0] == '#') {
        if (isset($CFG->repositoryactivate) && $CFG->repositoryactivate) {
            $reference = $CFG->repository.substr($reference,1).'/imsmanifest.xml';
        } else {
            $validation->errors['reference'] = get_string('badpackage','rscorm');
            $validation->result = false;
            return $validation;
        }
    } else if (!rscorm_external_link($reference)) {
        $reference = $CFG->dataroot.'/'.$courseid.'/'.$reference;
    }

// Create a temporary directory to unzip package or copy manifest and validate package
    $tempdir = '';
    $scormdir = '';
    if ($scormdir = make_upload_directory("$courseid/$CFG->moddata/rscorm")) {
        if ($tempdir = rscorm_tempdir($scormdir)) {
            $localreference = $tempdir.'/'.basename($reference);
            copy ("$reference", $localreference);
            if (!is_file($localreference)) {
                $validation->errors['reference'] = get_string('badpackage','rscorm');
                $validation->result = false;
            } else {
                $ext = strtolower(substr(basename($localreference),strrpos(basename($localreference),'.')));
                switch ($ext) {
                    case '.pif':
                    case '.zip':
                        if (!unzip_file($localreference, $tempdir, false)) {
                            $validation->errors['reference'] = get_string('unziperror','rscorm');
                            $validation->result = false;
                        } else {
                            unlink ($localreference);
                            if (is_file($tempdir.'/imsmanifest.xml')) {
                                $validation = rscorm_validate_manifest($tempdir.'/imsmanifest.xml');
                                $validation->pkgtype = 'rscorm';
                            } else {
                                $validation = rscorm_validate_aicc($tempdir);
                                if (($validation->result == 'regular') || ($validation->result == 'found')) {
                                    $validation->pkgtype = 'AICC';
                                } else {
                                    $validation->errors['reference'] = get_string('nomanifest','rscorm');
                                    $validation->result = false;
                                }
                            }
                        }
                    break;
                    case '.xml':
                        if (basename($localreference) == 'imsmanifest.xml') {
                            $validation = rscorm_validate_manifest($localreference);
                        } else {
                            $validation->errors['reference'] = get_string('nomanifest','rscorm');
                            $validation->result = false;
                        }
                    break;
                    default:
                        $validation->errors['reference'] = get_string('badpackage','rscorm');
                        $validation->result = false;
                    break;
                }
            }
            if (is_dir($tempdir)) {
            // Delete files and temporary directory
                rscorm_delete_files($tempdir);
            }
        } else {
            $validation->errors['reference'] = get_string('packagedir','rscorm');
            $validation->result = false;
        }
    } else {
        $validation->errors['reference'] = get_string('datadir','rscorm');
        $validation->result = false;
    }*/
//********** FI
    return $validation;
}

function rscorm_check_package($data) {
    global $CFG, $COURSE;

    require_once($CFG->libdir.'/filelib.php');

    $courseid = $data->course;                  // Course Module ID
    $reference = $data->reference;              // Package path
    $scormid = $data->instance;                 // scorm ID

    $validation = new stdClass();

    if (!empty($courseid) && !empty($reference)) {
        $externalpackage = rscorm_external_link($reference);

        $validation->launch = 0;
        $referencefield = $reference;
        if (empty($reference)) {
            $validation = null;
        } else if ($reference[0] == '#') {
            if (isset($CFG->repositoryactivate) && $CFG->repositoryactivate) {
                $referencefield = $reference.'/imsmanifest.xml';
                $reference = $CFG->repository.substr($reference,1).'/imsmanifest.xml';
            } else {
                $validation = null;
            }
        } else if (!$externalpackage) {
            $reference = $CFG->dataroot.'/'.$courseid.'/'.$reference;
        }

        if (!empty($scormid)) {
        //
        // SCORM Update
        //
            if ((!empty($validation)) && (is_file($reference) || $externalpackage)){

                if (!$externalpackage) {
                    $mdcheck = md5_file($reference);
                } else if ($externalpackage){
                    if ($scormdir = make_upload_directory("$courseid/$CFG->moddata/rscorm")) {
                        if ($tempdir = rscorm_tempdir($scormdir)) {
                            $content = download_file_content($reference);
                            $file = fopen($tempdir.'/'.basename($reference), 'x');
                            fwrite($file, $content);
                            fclose($file);
                            $mdcheck = md5_file($tempdir.'/'.basename($reference));
                            rscorm_delete_files($tempdir);
                        }
                    }
                }

                if ($scorm = get_record('rscorm','id',$scormid)) {
                    if ($scorm->reference[0] == '#') {
                        if (isset($CFG->repositoryactivate) && $CFG->repositoryactivate) {
                            $oldreference = $CFG->repository.substr($scorm->reference,1).'/imsmanifest.xml';
                        } else {
                            $oldreference = $scorm->reference;
                        }
                    } else if (!rscorm_external_link($scorm->reference)) {
                        $oldreference = $CFG->dataroot.'/'.$courseid.'/'.$scorm->reference;
                    } else {
                        $oldreference = $scorm->reference;
                    }
                    $validation->launch = $scorm->launch;
                    if ((($oldreference == $reference) && ($mdcheck != $scorm->md5hash)) || ($oldreference != $reference)) {
                        // This is a new or a modified package
                        $validation->launch = 0;
                    } else {
                    // Old package already validated
                        if (strpos($scorm->version,'AICC') !== false) {
                            $validation->pkgtype = 'AICC';
                        } else {
                            $validation->pkgtype = 'rscorm';
                        }
                    }
                } else {
                    $validation = null;
                }
            } else {
                $validation = null;
            }
        }
        //$validation->launch = 0;
        if (($validation != null) && ($validation->launch == 0)) {
        //
        // Package must be validated
        //
            $ext = strtolower(substr(basename($reference),strrpos(basename($reference),'.')));
            $tempdir = '';
            switch ($ext) {
                case '.pif':
                case '.zip':
                // Create a temporary directory to unzip package and validate package
                    $scormdir = '';
                    if ($scormdir = make_upload_directory("$courseid/$CFG->moddata/rscorm")) {
                        if ($tempdir = rscorm_tempdir($scormdir)) {
                            if ($externalpackage){
                                $content = download_file_content($reference);
                                $file = fopen($tempdir.'/'.basename($reference), 'x');
                                fwrite($file, $content);
                                fclose($file);
                            } else {
                                copy ("$reference", $tempdir.'/'.basename($reference));
                            }
                            unzip_file($tempdir.'/'.basename($reference), $tempdir, false);
                            if (!$externalpackage) {
                                unlink ($tempdir.'/'.basename($reference));
                            }
                            if (is_file($tempdir.'/imsmanifest.xml')) {
                                $validation = rscorm_validate_manifest($tempdir.'/imsmanifest.xml');
                                $validation->pkgtype = 'rscorm';
                            } else {
                                $validation = rscorm_validate_aicc($tempdir);
                                $validation->pkgtype = 'AICC';
                            }
                        } else {
                            $validation = null;
                        }
                    } else {
                        $validation = null;
                    }
                break;
                case '.xml':
                    if (basename($reference) == 'imsmanifest.xml') {
                        if ($externalpackage) {
                            if ($scormdir = make_upload_directory("$courseid/$CFG->moddata/rscorm")) {
                                if ($tempdir = rscorm_tempdir($scormdir)) {
                                    $content = download_file_content($reference);
                                    $file = fopen($tempdir.'/'.basename($reference), 'x');
                                    fwrite($file, $content);
                                    fclose($file);
                                    if (is_file($tempdir.'/'.basename($reference))) {
                                        $validation = rscorm_validate_manifest($tempdir.'/'.basename($reference));
                                    } else {
                                        $validation = null;
                                    }
                                }
                            }
                        } else {
                            $validation = rscorm_validate_manifest($reference);
                        }
                        $validation->pkgtype = 'rscorm';
                    } else {
                        $validation = null;
                    }
                break;
                default:
                    $validation = null;
                break;
            }
            if ($validation == null) {
                if (is_dir($tempdir)) {
                // Delete files and temporary directory
                    rscorm_delete_files($tempdir);
                }
            } else {
                if (($ext == '.xml') && (!$externalpackage)) {
                    $validation->datadir = dirname($referencefield);
                } else {
                    $validation->datadir = substr($tempdir,strlen($scormdir));
                }
                $validation->launch = 0;
            }
        }
    } else {
        $validation = null;
    }
    return $validation;
}


function rscorm_get_count_users($scormid, $groupingid=null) {

    global $CFG;

    if (!empty($CFG->enablegroupings) && !empty($groupingid)) {
        $sql = "SELECT COUNT(DISTINCT st.userid)
                FROM {$CFG->prefix}rscorm_scoes_track st
                    INNER JOIN {$CFG->prefix}groups_members gm ON st.userid = gm.userid
                    INNER JOIN {$CFG->prefix}groupings_groups gg ON gm.groupid = gg.groupid
                WHERE st.scormid = $scormid AND gg.groupingid = $groupingid
                ";
    } else {
        $sql = "SELECT COUNT(DISTINCT st.userid)
                FROM {$CFG->prefix}rscorm_scoes_track st
                WHERE st.scormid = $scormid
                ";
    }

    return(count_records_sql($sql));
}

 /**
* Build up the JavaScript representation of an array element
*
* @param string $sversion SCORM API version
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

    // filter out the ones we want
    $element_list = array();
    foreach($userdata as $element => $value){
        if (substr($element,0,strlen($element_name)) == $element_name) {
            $element_list[$element] = $value;
        }
    }

    // sort elements in .n array order
    uksort($element_list, "rscorm_element_cmp");

    // generate JavaScript
    foreach($element_list as $element => $value){
        if ($sversion == 'scorm_13') {
            $element = preg_replace('/\.(\d+)\./', ".N\$1.", $element);
            preg_match('/\.(N\d+)\./', $element, $matches);
        } else {
            $element = preg_replace('/\.(\d+)\./', "_\$1.", $element);
            preg_match('/\_(\d+)\./', $element, $matches);
        }
        if (count($matches) > 0 && $current != $matches[1]) {
            if ($count_sub > 0) {
                echo '    '.$element_name.'_'.$current.'.'.$current_subelement.'._count = '.$count_sub.";\n";
            }
            $current = $matches[1];
            $count++;
            $current_subelement = '';
            $current_sub = '';
            $count_sub = 0;
            $end = strpos($element,$matches[1])+strlen($matches[1]);
            $subelement = substr($element,0,$end);
            echo '    '.$subelement." = new Object();\n";
            // now add the children
            foreach ($children as $child) {
                echo '    '.$subelement.".".$child." = new Object();\n";
                echo '    '.$subelement.".".$child."._children = ".$child."_children;\n";
            }
        }

        // now - flesh out the second level elements if there are any
        if ($sversion == 'scorm_13') {
            $element = preg_replace('/(.*?\.N\d+\..*?)\.(\d+)\./', "\$1.N\$2.", $element);
            preg_match('/.*?\.N\d+\.(.*?)\.(N\d+)\./', $element, $matches);
        } else {
            $element = preg_replace('/(.*?\_\d+\..*?)\.(\d+)\./', "\$1_\$2.", $element);
            preg_match('/.*?\_\d+\.(.*?)\_(\d+)\./', $element, $matches);
        }

        // check the sub element type
        if (count($matches) > 0 && $current_subelement != $matches[1]) {
            if ($count_sub > 0) {
                echo '    '.$element_name.'_'.$current.'.'.$current_subelement.'._count = '.$count_sub.";\n";
            }
            $current_subelement = $matches[1];
            $current_sub = '';
            $count_sub = 0;
            $end = strpos($element,$matches[1])+strlen($matches[1]);
            $subelement = substr($element,0,$end);
            echo '    '.$subelement." = new Object();\n";
        }

        // now check the subelement subscript
        if (count($matches) > 0 && $current_sub != $matches[2]) {
            $current_sub = $matches[2];
            $count_sub++;
            $end = strrpos($element,$matches[2])+strlen($matches[2]);
            $subelement = substr($element,0,$end);
            echo '    '.$subelement." = new Object();\n";
        }

        echo '    '.$element.' = \''.$value."';\n";
    }
    if ($count_sub > 0) {
        echo '    '.$element_name.'_'.$current.'.'.$current_subelement.'._count = '.$count_sub.";\n";
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
    } elseif ($left > $right) {
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
                } elseif ($leftterm > $rightterm) {
                    return 1;  // bigger
                } else {
                    if ($left < $right) {
                        return -1; // smaller
                    } elseif ($left > $right) {
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
* Delete Scorm tracks for selected users
* @param array $attemptids list of attempts that need to be deleted
* @param int $scormid ID of Scorm
* @return bool true deleted all responses, false failed deleting an attempt - stopped here
*/
function rscorm_delete_responses($attemptids, $scormid) {
    if(!is_array($attemptids) || empty($attemptids)) {
        return false;
    }

    foreach($attemptids as $num => $attemptid) {
        if(empty($attemptid)) {
            unset($attemptids[$num]);
        }
    }

    foreach($attemptids as $attempt) {
        $keys = explode(':', $attempt);
        if (count($keys) == 2) {
            $userid = clean_param($keys[0], PARAM_INT);
            $attemptid = clean_param($keys[1], PARAM_INT);
            if (!$userid || !$attemptid || !rscorm_delete_attempt($userid, $scormid, $attemptid)) {
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
* @param int $userid ID of User
* @param int $scormid ID of Scorm
* @param int $attemptid user attempt that need to be deleted
* @return bool true suceeded
*/
function rscorm_delete_attempt($userid, $scormid, $attemptid) {
    delete_records('rscorm_scoes_track', 'userid', $userid, 'scormid', $scormid, 'attempt', $attemptid);
    return true;
}

//MARSUPIAL ********** AFEGIT - Functions to load data from data table
/**
 * Load level list from bd table mdl_rcommon_level
 * @return array with the loaded data
 */
function rscorm_level_list(){
    global $CFG;
    $return[0]='- '.get_string('level','rscorm').' -';

//********** MODIFICAT MARSUPIAL - levels with books and level code added to the list
    
    $sql = "SELECT * FROM {$CFG->prefix}rcommon_level
            WHERE id in (Select distinct levelid from {$CFG->prefix}rcommon_books where upper(format) = 'SCORM')";
    
    if($records = get_records_sql($sql))
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
    global $CFG;
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
        if($records=get_records_sql($sql)){
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
	global $CFG;
	if($from=='updateform'){
		$return[0]='- '.get_string('unit','rscorm').' -';
	}else{
		$return[]=array('id'=>0,'name'=>'- '.get_string('unit','rscorm').' -');
	}
	if($bookid!=""){
        if($records=get_records('rcommon_books_units','bookid',$bookid,'sortorder ASC')){
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
	global $CFG;
	if($from=='updateform'){
		$return[0]='- '.get_string('activity','rscorm').' -';
	}else{
		$return[]=array('id'=>0,'name'=>'- '.get_string('activity','rscorm').' -');
	}
	if($bookid!=""&&$unitid!=""){
	    if($records=get_records_sql("SELECT * FROM {$CFG->prefix}rcommon_books_activities WHERE bookid='".$bookid."' AND unitid='".$unitid."' ORDER BY sortorder ASC")){
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
 * @param int $rscormid -> ID of the scorm
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
    if ($pos = strpos($manifesturl, '?')){
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
?>
