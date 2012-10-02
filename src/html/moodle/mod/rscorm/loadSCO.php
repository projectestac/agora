<?php  // $Id: loadSCO.php,v 1.33.4.10 2008/12/09 20:38:28 danmarsden Exp $
    require_once('../../config.php');
    require_once('locallib.php');

    $id = optional_param('id', '', PARAM_INT);       // Course Module ID, or
    $a = optional_param('a', '', PARAM_INT);         // scorm ID
    $scoid = required_param('scoid', PARAM_INT);     // sco ID

    $delayseconds = 2;  // Delay time before sco launch, used to give time to browser to define API

    if (!empty($id)) {
        if (! $cm = get_coursemodule_from_id('rscorm', $id)) {
            error('Course Module ID was incorrect');
        }
        if (! $course = get_record('course', 'id', $cm->course)) {
            error('Course is misconfigured');
        }
        if (! $scorm = get_record('rscorm', 'id', $cm->instance)) {
            error('Course module is incorrect');
        }
    } else if (!empty($a)) {
        if (! $scorm = get_record('rscorm', 'id', $a)) {
            error('Course module is incorrect');
        }
        if (! $course = get_record('course', 'id', $scorm->course)) {
            error('Course is misconfigured');
        }
        if (! $cm = get_coursemodule_from_instance('rscorm', $scorm->id, $course->id)) {
            error('Course Module ID was incorrect');
        }
    } else {
        error('A required parameter is missing');
    }

    require_login($course->id, false, $cm);
    if (!empty($scoid)) {
    //
    // Direct SCO request
    //
// MARSUPIAL ********** MODIFICAT - Modified to throw error if not launchable
        //if ($sco = rscorm_get_sco($scoid)) {
        if (!$sco = rscorm_get_sco($scoid)) {
//********** FI

// MARSUPIAL ********** AFEGIT - the error
            error("No sco found!"); 
//********** FI

// MARSUPIAL ****** ELIMINAT - Take out becouse if is not launch throw error
            /*if ($sco->launch == '') {
                // Search for the next launchable sco
                if ($scoes = get_records_select('rscorm_scoes','scorm='.$scorm->id." AND launch<>'".sql_empty()."' AND id>".$sco->id,'id ASC')) {
                    $sco = current($scoes);
                }
            }*/
//********** FI

        }
    }
    //
    // If no sco was found get the first of SCORM package
    //
    if (!isset($sco)) { print_r('no isset sco');
// MARSUPIAL ********** MODIFICAT - to search for all sco and after search for the particular launch
        //$scoes = get_records_select('rscorm_scoes','scorm='.$scorm->id.' AND launch<>\''.sql_empty().'\'','id ASC');
        $scoes = get_records_select('rscorm_scoes','scorm='.$scorm->id,'id ASC');
//**********FI
// MARSUPIAL *********** AFEGIT - look for the launch item at set it to the sco f
            foreach($scoes as $sco){
                if($launch=get_field('rscorm_scoes_users','launch','scormid',$scorm->id,'scoid',$sco->id,'userid',$USER->id)){
        		    $sco->launch=$launch;
        	    }
            }           	
//********** FI
        $sco = current($scoes);
    }

    if ($sco->scormtype == 'asset') {
       $attempt = rscorm_get_last_attempt($scorm->id,$USER->id);
       $element = ($scorm->version == 'scorm_13' || $scorm->version == 'SCORM_1.3') ?'cmi.completion_status':'cmi.core.lesson_status';
       $value = 'completed';
       $result = rscorm_insert_track($USER->id, $scorm->id, $sco->id, $attempt, $element, $value);
    }

    //
    // Forge SCO URL
    //
    $connector = '';
    $version = substr($scorm->version,0,4);
    if ((isset($sco->parameters) && (!empty($sco->parameters))) || ($version == 'AICC')) {
        if (stripos($sco->launch,'?') !== false) {
            $connector = '&';
        } else {
            $connector = '?';
        }
        if ((isset($sco->parameters) && (!empty($sco->parameters))) && ($sco->parameters[0] == '?')) {
            $sco->parameters = substr($sco->parameters,1);
        }
    }

    if ($version == 'AICC') {
        if (isset($sco->parameters) && (!empty($sco->parameters))) {
            $sco->parameters = '&'. $sco->parameters;
        }
        $launcher = $sco->launch.$connector.'aicc_sid='.sesskey().'&aicc_url='.$CFG->wwwroot.'/mod/rscorm/aicc.php'.$sco->parameters;
    } else {
        if (isset($sco->parameters) && (!empty($sco->parameters))) {
            $launcher = $sco->launch.$connector.$sco->parameters;
        } else {
            $launcher = $sco->launch;
        }
    }

    if (rscorm_external_link($sco->launch)) {
        // Remote learning activity
        $result = $launcher;
    } else if ($scorm->reference[0] == '#') {
        // Repository
        $result = $CFG->repositorywebroot.substr($scorm->reference,1).'/'.$sco->launch;
    } else {
        if ((basename($scorm->reference) == 'imsmanifest.xml') && rscorm_external_link($scorm->reference)) {
            // Remote manifest
            $result = dirname($scorm->reference).'/'.$launcher;
        } else {
            // Moodle internal package/manifest or remote (auto-imported) package
            if (basename($scorm->reference) == 'imsmanifest.xml') {
                $basedir = dirname($scorm->reference);
            } else {
                $basedir = $CFG->moddata.'/rscorm/'.$scorm->id;
            }
            //note: do not convert this to use get_file_url()!
            //      SCORM does not work without slasharguments anyway and there might be some extra ?xx=yy params
            //      see MDL-16060
            $result = $CFG->wwwroot.'/file.php/'.$scorm->course.'/'.$basedir.'/'.$launcher;
        }
    }

    $scormpixdir = $CFG->modpixpath.'/rscorm/pix';

    // which API are we looking for
    $LMS_api = ($scorm->version == 'scorm_12' || $scorm->version == 'SCORM_1.2' || empty($scorm->version)) ? 'API' : 'API_1484_11';
?>
<html>
    <head>
        <title>LoadSCO</title>
		<!-- //MARSUPIAL ********** AFEGIT - Remote SCORM -->
	    <script type="text/javascript">
            document.domain = "<?php echo isset($CFG->rscorm_documentdomain)? $CFG->rscorm_documentdomain : 'xtec.cat'; ?>";
		</script>
		<!-- //********** FI -->
		
        <script type="text/javascript">
        //<![CDATA[
        var apiHandle = null;
        var findAPITries = 0;

        function getAPIHandle() {
           if (apiHandle == null) {
              apiHandle = getAPI();
           }
           return apiHandle;
        }

        function findAPI(win) {
           while ((win.<?php echo $LMS_api; ?> == null) && (win.parent != null) && (win.parent != win)) {
              findAPITries++;
              // Note: 7 is an arbitrary number, but should be more than sufficient
              if (findAPITries > 7) {
                 return null;
              }
              win = win.parent;
           }
           return win.<?php echo $LMS_api; ?>;
        }

        // hun for the API - needs to be loaded before we can launch the package
        function getAPI() {
           var theAPI = findAPI(window);
           if ((theAPI == null) && (window.opener != null) && (typeof(window.opener) != "undefined")) {
              theAPI = findAPI(window.opener);
           }
           if (theAPI == null) {
              return null;
           }
           return theAPI;
        }

        function doredirect() {
            if (getAPI() != null) {
                location = "<?php echo $result ?>";
            }
            else {
                document.body.innerHTML = "<p><?php echo get_string('activityloading', 'rscorm');?> <span id='countdown'><?php echo $delayseconds ?></span> <?php echo get_string('numseconds');?>. &nbsp; <img src='<?php echo $scormpixdir;?>/wait.gif'><p>";
                var e = document.getElementById("countdown");
                var cSeconds = parseInt(e.innerHTML);
                var timer = setInterval(function() {
                                                if( cSeconds && getAPI() == null ) {
                                                    e.innerHTML = --cSeconds;
                                                } else {
                                                    clearInterval(timer);
                                                    document.body.innerHTML = "<p><?php echo get_string('activitypleasewait', 'rscorm');?></p>";
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
        <p><?php echo get_string('activitypleasewait', 'rscorm');?></p>
        <?php if (debugging('',DEBUG_DEVELOPER)) {
                  add_to_log($course->id, 'rscorm', 'launch', 'view.php?id='.$cm->id, $result, $cm->id);
              }
        ?>
    </body>
</html>
