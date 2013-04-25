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

require_once('../../config.php');
require_once($CFG->dirroot.'/mod/rscorm/locallib.php');

$id    = optional_param('id', '', PARAM_INT);    // Course Module ID, or
$a     = optional_param('a', '', PARAM_INT);     // rscorm ID
$scoid = required_param('scoid', PARAM_INT);     // sco ID

$delayseconds = 2;  // Delay time before sco launch, used to give time to browser to define API

if (!empty($id)) {
    if (! $cm = get_coursemodule_from_id('rscorm', $id)) {
        print_error('invalidcoursemodule');
    }
    if (! $course = $DB->get_record('course', array('id'=>$cm->course))) {
        print_error('coursemisconf');
    }
    if (! $scorm = $DB->get_record('rscorm', array('id'=>$cm->instance))) {
        print_error('invalidcoursemodule');
    }
} else if (!empty($a)) {
    if (! $scorm = $DB->get_record('rscorm', array('id'=>$a))) {
        print_error('coursemisconf');
    }
    if (! $course = $DB->get_record('course', array('id'=>$scorm->course))) {
        print_error('coursemisconf');
    }
    if (! $cm = get_coursemodule_from_instance('rscorm', $scorm->id, $course->id)) {
        print_error('invalidcoursemodule');
    }
} else {
    print_error('missingparameter');
}

$PAGE->set_url('/mod/rscorm/loadSCO.php', array('scoid'=>$scoid, 'id'=>$cm->id));

if (!isloggedin()) { // Prevent login page from being shown in iframe.
    // Using simple html instead of exceptions here as shown inside iframe/object.
    echo html_writer::start_tag('html');
    echo html_writer::tag('head', '');
    echo html_writer::tag('body', get_string('loggedinnot'));
    echo html_writer::end_tag('html');
    exit;
}
//MARSUPIAL ********** MODIFICA - allow context course
// 2012.12.17 @abertranb
require_login($course);
// ********* ORIGINAL
//require_login($course, false, $cm, false); // Call require_login anyway to set up globals correctly.
// ********* FI
//check if scorm closed
$timenow = time();
if ($scorm->timeclose !=0) {
    if ($scorm->timeopen > $timenow) {
        print_error('notopenyet', 'rscorm', null, userdate($scorm->timeopen));
    } else if ($timenow > $scorm->timeclose) {
        print_error('expired', 'rscorm', null, userdate($scorm->timeclose));
    }
}

$context = get_context_instance(CONTEXT_MODULE, $cm->id);

if (!empty($scoid)) {
    //
    // Direct SCO request
    //
// MARSUPIAL ********** MODIFICAT - Modified to throw error if not launchable
	if (!$sco = rscorm_get_sco($scoid)) {
//********** ORIGINAL
	//if ($sco = rscorm_get_sco($scoid)) {
//********** FI		
		// MARSUPIAL ********** AFEGIT - the error
		print_error("No sco found!");
//********** FI
	
// MARSUPIAL ****** ELIMINAT - Take out becouse if is not launch throw error
	    
    /*if ($sco = rscorm_get_sco($scoid)) {
        if ($sco->launch == '') {
            // Search for the next launchable sco
            if ($scoes = $DB->get_records_select('rscorm_scoes', "scorm = ? AND '.$DB->sql_isnotempty('rscorm_scoes', 'launch', false, true).' AND id > ?", array($scorm->id, $sco->id), 'id ASC')) {
                $sco = current($scoes);
            }
        }
    }*/
//********** FI		
	}
}
//
// If no sco was found get the first of RSCORM package
//
if (!isset($sco)) {
	print_r('no isset sco');
// MARSUPIAL ********** MODIFICAT - to search for all sco and after search for the particular launch
	//$scoes = $DB->get_records_select('rscorm_scoes', "scorm = ? AND ".$DB->sql_isnotempty('rscorm_scoes', 'launch', false, true), array($scorm->id), 'id ASC');
	
    $scoes = $DB->get_records_select('rscorm_scoes','scorm='.$scorm->id,'id ASC');
    //**********FI
    // MARSUPIAL *********** AFEGIT - look for the launch item at set it to the sco f
    foreach($scoes as $sco){
    	if($launch= $DB->get_field('rscorm_scoes_users',array('launch' => 'launch','scormid' => $scorm->id,'scoid' => $sco->id,'userid'  => $USER->id))){
    		$sco->launch=$launch;
    	}
    }
    //********** FI
    
    $sco = current($scoes);
}

if ($sco->scormtype == 'asset') {
    $attempt = rscorm_get_last_attempt($scorm->id, $USER->id);
    $element = (rscorm_version_check($scorm->version, RSCORM_13)) ? 'cmi.completion_status':'cmi.core.lesson_status';
    $value = 'completed';
    $result = rscorm_insert_track($USER->id, $scorm->id, $sco->id, $attempt, $element, $value);
}

//
// Forge SCO URL
//
$connector = '';
$version = substr($scorm->version, 0, 4);
if ((isset($sco->parameters) && (!empty($sco->parameters))) || ($version == 'AICC')) {
    if (stripos($sco->launch, '?') !== false) {
        $connector = '&';
    } else {
        $connector = '?';
    }
    if ((isset($sco->parameters) && (!empty($sco->parameters))) && ($sco->parameters[0] == '?')) {
        $sco->parameters = substr($sco->parameters, 1);
    }
}

if ($version == 'AICC') {
    require_once("$CFG->dirroot/mod/rscorm/datamodels/aicclib.php");
    $aicc_sid = rscorm_aicc_get_hacp_session($scorm->id);
    if (empty($aicc_sid)) {
        $aicc_sid = sesskey();
    }
    $sco_params = '';
    if (isset($sco->parameters) && (!empty($sco->parameters))) {
        $sco_params = '&'. $sco->parameters;
    }
    $launcher = $sco->launch.$connector.'aicc_sid='.$aicc_sid.'&aicc_url='.$CFG->wwwroot.'/mod/rscorm/aicc.php'.$sco_params;
} else {
    if (isset($sco->parameters) && (!empty($sco->parameters))) {
        $launcher = $sco->launch.$connector.$sco->parameters;
    } else {
        $launcher = $sco->launch;
    }
}

if (rscorm_external_link($sco->launch)) {
    //TODO: does this happen?
    $result = $launcher;
} else if ($scorm->scormtype === RSCORM_TYPE_EXTERNAL) {
    // Remote learning activity
    $result = dirname($scorm->reference).'/'.$launcher;
} else if ($scorm->scormtype === RSCORM_TYPE_IMSREPOSITORY) {
    // Repository
    $result = $CFG->repositorywebroot.substr($scorm->reference, 1).'/'.$sco->launch;
} else if ($scorm->scormtype === RSCORM_TYPE_LOCAL or $scorm->scormtype === RSCORM_TYPE_LOCALSYNC) {
    //note: do not convert this to use get_file_url() or moodle_url()
    //RSCORM does not work without slasharguments and moodle_url() encodes querystring vars
    $result = "$CFG->wwwroot/pluginfile.php/$context->id/mod_rscorm/content/$scorm->revision/$launcher";
}

add_to_log($course->id, 'rscorm', 'launch', 'view.php?id='.$cm->id, $result, $cm->id);

// which API are we looking for
$LMS_api = (rscorm_version_check($scorm->version, RSCORM_12) || empty($scorm->version)) ? 'API' : 'API_1484_11';

header('Content-Type: text/html; charset=UTF-8');
// MARSUPIAL *********** MODIFICAT -> Not send output and use the JS yui
// 2013.02.2 @abertranb
$PAGE->requires->data_for_js('document.domain', isset($CFG->rscorm_documentdomain)? $CFG->rscorm_documentdomain : 'educat1x1.cat', true);
// ********* ORIGINAL
/*	    <script type="text/javascript">
            document.domain = "<?php echo isset($CFG->rscorm_documentdomain)? $CFG->rscorm_documentdomain : 'educat1x1.cat'; ?>";
		</script>
*/
// ********* FI

?>
<html>
    <head>
        <title>LoadSCO</title>
        <script type="text/javascript">
        //<![CDATA[
		document.domain = "<?php echo isset($CFG->rscorm_documentdomain)? $CFG->rscorm_documentdomain : 'educat1x1.cat'; ?>";
		
        var myApiHandle = null;
        var myFindAPITries = 0;

        function myGetAPIHandle() {
           myFindAPITries = 0;
           if (myApiHandle == null) {
              myApiHandle = myGetAPI();
           }
           return myApiHandle;
        }

        function myFindAPI(win) {
           while ((win.<?php echo $LMS_api; ?> == null) && (win.parent != null) && (win.parent != win)) {
              myFindAPITries++;
              // Note: 7 is an arbitrary number, but should be more than sufficient
              if (myFindAPITries > 7) {
                 return null;
              }
              win = win.parent;
           }
           return win.<?php echo $LMS_api; ?>;
        }

        // hun for the API - needs to be loaded before we can launch the package
        function myGetAPI() {
           var theAPI = myFindAPI(window);
           if ((theAPI == null) && (window.opener != null) && (typeof(window.opener) != "undefined")) {
              theAPI = myFindAPI(window.opener);
           }
           if (theAPI == null) {
              return null;
           }
           return theAPI;
        }

       function doredirect() {
            if (myGetAPIHandle() != null) {
                location = "<?php echo $result ?>";
            }
            else {
                document.body.innerHTML = "<p><?php echo get_string('activityloading', 'scorm');?> <span id='countdown'><?php echo $delayseconds ?></span> <?php echo get_string('numseconds', 'moodle', '');?>. &nbsp; <img src='<?php echo $OUTPUT->pix_url('wait', 'scorm') ?>'><p>";
                var e = document.getElementById("countdown");
                var cSeconds = parseInt(e.innerHTML);
                var timer = setInterval(function() {
                                                if( cSeconds && myGetAPIHandle() == null ) {
                                                    e.innerHTML = --cSeconds;
                                                } else {
                                                    clearInterval(timer);
                                                    document.body.innerHTML = "<p><?php echo get_string('activitypleasewait', 'scorm');?></p>";
                                                    location = "<?php echo $result ?>";
                                                }
                                            }, 1000);
            }
        }
        //]]>
        </script>
        <noscript>
            <meta http-equiv="refresh" content="0;url=<?php echo $result ?>" />
        </noscript>
    </head>
    <body onload="doredirect();">
        <p><?php echo get_string('activitypleasewait', 'scorm');?></p>
    </body>
</html>