<?php  // $Id: view.php,v 1.56.2.5 2009/03/27 01:48:14 danmarsden Exp $
    
    require_once("../../config.php");
    require_once('locallib.php');
   
    $id = optional_param('id', '', PARAM_INT);       // Course Module ID, or
    $a = optional_param('a', '', PARAM_INT);         // scorm ID
    $organization = optional_param('organization', '', PARAM_INT); // organization ID

    if (!empty($id)) {
        if (! $cm = get_coursemodule_from_id('rscorm', $id)) {
            error("Course Module ID was incorrect");
        }
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
        if (! $scorm = get_record("rscorm", "id", $cm->instance)) {
            error("Course module is incorrect");
        }
    } else if (!empty($a)) {
        if (! $scorm = get_record("rscorm", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $scorm->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("rscorm", $scorm->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    } else {
        error('A required parameter is missing');
    }
    
    require_login($course->id, false, $cm);
    
    $context = get_context_instance(CONTEXT_COURSE, $course->id);
    
    if (isset($SESSION->scorm_scoid)) {
        unset($SESSION->scorm_scoid);
    }
    
//MARSUPIAL ********** Afegit -> call to the web services
    //call to autentification web services
    $scorm->module='rscorm';
    $scorm->cmid=$cm->id;
    require_once($CFG->dirroot.'/blocks/rcommon/WebServices/Authentication/AuthenticateContent.php');
    $return = AuthenticateUserContent($scorm);

    if (isset($return->AutenticarUsuarioContenidoResult->URL)){
        $url = $return->AutenticarUsuarioContenidoResult->URL;
    } else {
    	$url = "";
    } 
    
    if(!$localurl=rscorm_set_manifest_by_user($scorm,$url)){
    	error("error getting acces to activity");
    }
    require_once('datamodels/scormlib.php');
    rscorm_parse_scorm(substr($localurl,0,strlen($localurl)-16),$scorm->id);
//********** FI
    rscorm_simple_play($scorm,$USER);
    $strscorms = get_string("modulenameplural", "rscorm");
    $strscorm  = get_string("modulename", "rscorm");

    $pagetitle = strip_tags($course->shortname.': '.format_string($scorm->name));

    add_to_log($course->id, 'rscorm', 'pre-view', 'view.php?id='.$cm->id, "$scorm->id", $cm->id);

    if ((has_capability('mod/rscorm:skipview', get_context_instance(CONTEXT_MODULE,$cm->id))) && rscorm_simple_play($scorm,$USER)) {
        exit;
    }
    
    //
    // Print the page header
    //
    $navlinks = array();
    $navigation = build_navigation($navlinks,$cm);

    print_header($pagetitle, $course->fullname, $navigation,
                 '', '', true, update_module_button($cm->id, $course->id, $strscorm), navmenu($course, $cm));

    if (has_capability('mod/rscorm:viewreport', $context)) {
        
        $trackedusers = rscorm_get_count_users($scorm->id, $cm->groupingid);
        if ($trackedusers > 0) {
            echo "<div class=\"reportlink\"><a $CFG->frametarget href=\"report.php?id=$cm->id\"> ".get_string('viewalluserreports','rscorm',$trackedusers).'</a></div>';
        } else {
            echo '<div class="reportlink">'.get_string('noreports','rscorm').'</div>';
        }
    }

    // Print the main part of the page
    print_heading(format_string($scorm->name));
    print_box(format_text($scorm->summary), 'generalbox', 'intro');
    rscorm_view_display($USER, $scorm, 'view.php?id='.$cm->id, $cm);
    print_footer($course);
?>
