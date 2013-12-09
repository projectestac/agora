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

/// This page prints a particular instance of aicc/scorm package

require_once('../../config.php');
require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
require_once($CFG->libdir . '/completionlib.php');

$id = optional_param('cm', '', PARAM_INT);       // Course Module ID, or
$a = optional_param('a', '', PARAM_INT);         // scorm ID
$scoid = required_param('scoid', PARAM_INT);  // sco ID
$mode = optional_param('mode', 'normal', PARAM_ALPHA); // navigation mode
$currentorg = optional_param('currentorg', '', PARAM_RAW); // selected organization
$newattempt = optional_param('newattempt', 'off', PARAM_ALPHA); // the user request to start a new attempt
$displaymode = optional_param('display','',PARAM_ALPHA);

// IE 9 workaround for Flash bug: MDL-29213
// Note that it's not clear if appending the meta tag via $CFG->additionalhtmlhead
// is correct at all, both because of the mechanism itself and because MS says
// the tag must be used *before* including other stuff. See the issue for more info.
// TODO: Once we implement some way to inject meta tags, change this to use it. MDL-30039
if (textlib::strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9') !== false) {
    if (!isset($CFG->additionalhtmlhead)) { //check to make sure set first - that way we can use .=
        $CFG->additionalhtmlhead = '';
    }
    $CFG->additionalhtmlhead .= '<meta http-equiv="X-UA-Compatible" content="IE=8" />';
}

if (!empty($id)) {
    if (! $cm = get_coursemodule_from_id('rscorm', $id)) {
        print_error('invalidcoursemodule');
    }
    if (! $course = $DB->get_record("course", array("id"=>$cm->course))) {
        print_error('coursemisconf');
    }
    if (! $scorm = $DB->get_record("rscorm", array("id"=>$cm->instance))) {
        print_error('invalidcoursemodule');
    }
} else if (!empty($a)) {
    if (! $scorm = $DB->get_record("rscorm", array("id"=>$a))) {
        print_error('invalidcoursemodule');
    }
    if (! $course = $DB->get_record("course", array("id"=>$scorm->course))) {
        print_error('coursemisconf');
    }
    if (! $cm = get_coursemodule_from_instance("rscorm", $scorm->id, $course->id)) {
        print_error('invalidcoursemodule');
    }
} else {
    print_error('missingparameter');
}

$url = new moodle_url('/mod/rscorm/player.php', array('scoid'=>$scoid, 'cm'=>$cm->id));
if ($mode !== 'normal') {
    $url->param('mode', $mode);
}
if ($currentorg !== '') {
    $url->param('currentorg', $currentorg);
}
if ($newattempt !== 'off') {
    $url->param('newattempt', $newattempt);
}
$PAGE->set_url($url);
$forcejs = get_config('rscorm', 'forcejavascript');
if (!empty($forcejs)) {
    $PAGE->add_body_class('forcejavascript');
}
//MARSUPIAL ********** MODIFICA - allow context course
// 2012.12.17 @abertranb
require_login($course);
// ********* ORIGINAL
//require_login($course, false, $cm);
// ********* FI
$strscorms = get_string('modulenameplural', 'rscorm');
$strscorm  = get_string('modulename', 'rscorm');
$strpopup = get_string('popup', 'rscorm');
$strexit = get_string('exitactivity', 'rscorm');

$coursecontext = context_course::instance($course->id);

if ($displaymode == 'popup') {
    $PAGE->set_pagelayout('popup');
} else {
    $shortname = format_string($course->shortname, true, array('context' => $coursecontext));
    $pagetitle = strip_tags("$shortname: ".format_string($scorm->name));
    $PAGE->set_title($pagetitle);
    $PAGE->set_heading($course->fullname);
}
if (!$cm->visible and !has_capability('moodle/course:viewhiddenactivities', $coursecontext)) {
    echo $OUTPUT->header();
    notice(get_string("activityiscurrentlyhidden"));
    echo $OUTPUT->footer();
    die;
}

//check if scorm closed
$timenow = time();
if ($scorm->timeclose !=0) {
    if ($scorm->timeopen > $timenow) {
        echo $OUTPUT->header();
        echo $OUTPUT->box(get_string("notopenyet", "rscorm", userdate($scorm->timeopen)), "generalbox boxaligncenter");
        echo $OUTPUT->footer();
        die;
    } else if ($timenow > $scorm->timeclose) {
        echo $OUTPUT->header();
        echo $OUTPUT->box(get_string("expired", "rscorm", userdate($scorm->timeclose)), "generalbox boxaligncenter");
        echo $OUTPUT->footer();

        die;
    }
}
// TOC processing
$scorm->version = strtolower(clean_param($scorm->version, PARAM_SAFEDIR));   // Just to be safe
if (!file_exists($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php')) {
    $scorm->version = 'rscorm_12';
}
require_once($CFG->dirroot.'/mod/rscorm/datamodels/'.$scorm->version.'lib.php');
$attempt = rscorm_get_last_attempt($scorm->id, $USER->id);
if (($newattempt=='on') && (($attempt < $scorm->maxattempt) || ($scorm->maxattempt == 0))) {
    $attempt++;
    $mode = 'normal';
}
$attemptstr = '&amp;attempt=' . $attempt;

$result = rscorm_get_toc($USER, $scorm, $cm->id, RTOCJSLINK, $currentorg, $scoid, $mode, $attempt, true, true);
$sco = $result->sco;

if (($mode == 'browse') && ($scorm->hidebrowse == 1)) {
    $mode = 'normal';
}
if ($mode != 'browse') {
    if ($trackdata = rscorm_get_tracks($sco->id, $USER->id, $attempt)) {
        if (($trackdata->status == 'completed') || ($trackdata->status == 'passed') || ($trackdata->status == 'failed')) {
            $mode = 'review';
        } else {
            $mode = 'normal';
        }
    } else {
        $mode = 'normal';
    }
}

add_to_log($course->id, 'rscorm', 'view', "player.php?cm=$cm->id&scoid=$sco->id", "$scorm->id", $cm->id);


$scoidstr = '&amp;scoid='.$sco->id;
$scoidpop = '&scoid='.$sco->id;
$modestr = '&amp;mode='.$mode;
if ($mode == 'browse') {
    $modepop = '&mode='.$mode;
} else {
    $modepop = '';
}
$orgstr = '&currentorg='.$currentorg;

$SESSION->scorm = new stdClass();
$SESSION->scorm->scoid = $sco->id;
$SESSION->scorm->scormstatus = 'Not Initialized';
$SESSION->scorm->scormmode = $mode;
$SESSION->scorm->attempt = $attempt;

// Mark module viewed
$completion = new completion_info($course);
$completion->set_module_viewed($cm);

// Print the page header
if (empty($scorm->popup) || $displaymode=='popup') {
    $exitlink = '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$scorm->course.'" title="'.$strexit.'">'.$strexit.'</a> ';
    $PAGE->set_button($exitlink);
}
if ($course->id==1) {
	$PAGE->navbar->add($scorm->name);
}

//$PAGE->requires->yui3_lib('connection');
$PAGE->requires->data_for_js('rscormplayerdata', Array('cwidth'=>$scorm->width,
                                                      'cheight'=>$scorm->height,
                                                      'popupoptions' => $scorm->options), true);
$PAGE->requires->js('/mod/rscorm/request.js', true);
$PAGE->requires->js('/lib/cookies.js', true);
$PAGE->requires->css('/mod/rscorm/styles.css');
echo $OUTPUT->header();

// NEW IMS TOC
$PAGE->requires->string_for_js('navigation', 'rscorm');
$PAGE->requires->string_for_js('toc', 'rscorm');
$PAGE->requires->string_for_js('hide', 'moodle');
$PAGE->requires->string_for_js('show', 'moodle');
$PAGE->requires->string_for_js('popupsblocked', 'rscorm');

$name = false;

// MARSUPIAL *********** MODIFICAT -> Not send output and use the JS yui
// 2013.02.2 @abertranb
//$PAGE->requires->data_for_js('document.domain', isset($CFG->rscorm_documentdomain)? $CFG->rscorm_documentdomain : 'educat1x1.cat', true);
// ********* ORIGINAL
?>
    <script type="text/javascript">
    //<![CDATA[
	     document.domain= "<?php echo isset($CFG->rscorm_documentdomain)? $CFG->rscorm_documentdomain : 'educat1x1.cat'; ?>";
	//]]>
    </script>
<?php
// ********* FI
?>
    <div id="rscormpage">

      <div id="tocbox">
        <div id='rscormapi-parent'>
            <script id="external-rscormapi" type="text/JavaScript"></script>
        </div>
<?php
if ($scorm->hidetoc == RSCORM_TOC_POPUP or $mode=='browse' or $mode=='review') {
    echo '<div id="rscormtop">';
    echo $mode == 'browse' ? '<div id="rscormmode" class="rscorm-left">'.get_string('browsemode', 'rscorm')."</div>\n" : '';
    echo $mode == 'review' ? '<div id="rscormmode" class="rscorm-left">'.get_string('reviewmode', 'rscorm')."</div>\n" : '';
    if ($scorm->hidetoc == RSCORM_TOC_POPUP) {
        echo '<div id="rscormnav" class="rscorm-right">'.$result->tocmenu.'</div>';
    }
    echo '</div>';
}
?>
            <div id="toctree">
                <?php
                if (empty($scorm->popup) || $displaymode == 'popup') {
                    echo $result->toc;
                } else {
                    //Added incase javascript popups are blocked we don't provide a direct link to the pop-up as JS communication can fail - the user must disable their pop-up blocker.
                    $linkcourse = '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$scorm->course.'">' . get_string('finishscormlinkname', 'rscorm') . '</a>';
                    echo $OUTPUT->box(get_string('finishscorm', 'rscorm', $linkcourse), 'generalbox', 'altfinishlink');
                }?>
            </div> <!-- toctree -->
        </div> <!--  tocbox -->
                <noscript>
                    <div id="noscript">
                        <?php print_string('noscriptnoscorm', 'rscorm'); // No Martin(i), No Party ;-) ?>

                    </div>
                </noscript>
<?php
if ($result->prerequisites) {
    if ($scorm->popup != 0 && $displaymode !=='popup') {
        // Clean the name for the window as IE is fussy
        $name = preg_replace("/[^A-Za-z0-9]/", "", $scorm->name);
        if (!$name) {
            $name = 'DefaultPlayerWindow';
        }
        $name = 'rscorm_'.$name;
        echo html_writer::script('', $CFG->wwwroot.'/mod/rscorm/player.js');
        $url = new moodle_url($PAGE->url, array('scoid' => $sco->id, 'display' => 'popup'));
        echo html_writer::script(
            js_writer::function_call('rscorm_openpopup', Array($url->out(false),
                                                       $name, $scorm->options,
                                                       $scorm->width, $scorm->height)));
        ?>
            <noscript>
            <!--[if IE]>
                <iframe id="main" class="scoframe" name="main" src="loadSCO.php?id=<?php echo $cm->id.$scoidstr.$modestr; ?>"></iframe>
            <![endif]-->
            <!--[if !IE]>
                <object id="main" class="scoframe" type="text/html" data="loadSCO.php?id=<?php echo $cm->id.$scoidstr.$modestr; ?>"></object>
            <![endif]-->
            </noscript>
        <?php
    }
} else {
    echo $OUTPUT->box(get_string('noprerequisites', 'rscorm'));
}
?>
    </div> <!-- RSCORM page -->
<?php
// NEW IMS TOC
if (empty($scorm->popup) || $displaymode == 'popup') {
    if (!isset($result->toctitle)) {
        $result->toctitle = get_string('toc', 'rscorm');
    }
    $PAGE->requires->js_init_call('M.mod_rscorm.init', array($scorm->hidenav, $scorm->hidetoc, $result->toctitle, $name, $sco->id));
}
if (!empty($forcejs)) {
    echo $OUTPUT->box(get_string("forcejavascriptmessage", "rscorm"), "generalbox boxaligncenter forcejavascriptmessage");
}
echo $OUTPUT->footer();
