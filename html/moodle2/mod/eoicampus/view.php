<?PHP  // $Id: view.php,v 1.6 2007/03/06 12:04:59 sarjona Exp $
/// This page prints a particular instance of eoicampus

    require_once("../../config.php");
    require_once("lib.php");
    require_once('../../lib/filelib.php');
	
    $id = required_param('id', PARAM_INT);             // Course Module ID
    
    if ($id) {
    	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
    	// 2012.10.23 @abertranb
        if (! $cm = $DB->get_record("course_modules", array("id" => $id))) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = $DB->get_record("course", array("id" => $cm->course))) {
            error("Course is misconfigured");
        }
    
        if (! $eoicampus = $DB->get_record("eoicampus", array("id" => $cm->instance))) {
            error("Course module is incorrect");
        }
        // ********** ORIGINAL
        //if (! $cm = get_record("course_modules", "id", $id)) {
        //	error("Course Module ID was incorrect");
        //}
        //
        //if (! $course = get_record("course", "id", $cm->course)) {
        //	error("Course is misconfigured");
        //}
        //
        //if (! $eoicampus = get_record("eoicampus", "id", $cm->instance) {
        //	error("Course module is incorrect");
        //}
        // ********** FI
    } 
    require_login($course);
    add_to_log($course->id, "eoicampus", "view", "view.php?id=$cm->id", "$eoicampus->id");
    
    //IECISA *********** MODIFIED -> Generating PAGE object (required Moodle 2.3)
    //2012.11.10 @abertanb
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    $PAGE->set_context($context);
    $PAGE->set_url('/mod/eoicampus/view.php', array('id' => $cm->id));
    $PAGE->set_focuscontrol('');
    $PAGE->set_cacheable(true);
    $PAGE->set_button('');
    $courseshortname = format_string($course->shortname, true, array('context' => get_context_instance(CONTEXT_COURSE, $course->id)));
    $title = $courseshortname . ': ' . format_string($eoicampus->name);
    $PAGE->set_title($title);
    $PAGE->set_heading($course->fullname);
    
    // show some info for guests
    if (isguestuser()) {
    	$PAGE->set_title(format_string($eoicampus->name));
    	echo $OUTPUT->header();
    	echo $OUTPUT->confirm(get_string('liketologin'),
    	get_login_url(), $CFG->wwwroot.'/course/view.php?id='.$course->id);
    	echo $OUTPUT->footer();
    	exit;
    }
    $streoicampuss = get_string("modulenameplural", "eoicampus");
    $streoicampus  = get_string("modulename", "eoicampus");
    $strload = get_string("load", "eoicampus");
    if ($cm) {
    	$PAGE->set_cm($cm, $course); // sets up global $COURSE
    } else {
    	$PAGE->set_course($course);// sets up global $COURSE
    }
   // $PAGE->navbar->add($streoicampuss, null, null, navigation_node::TYPE_CUSTOM, new moodle_url($CFG->wwwroot.'/eoicampus/index.php?id='.$course->id));
   // $PAGE->navbar->add($eoicampus->name);
    echo $OUTPUT->header();
    
//********* ORIGINAL
/// Print the page header
//
//    if ($course->category) {
//        $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
//    }
//
//    $streoicampuss = get_string("modulenameplural", "eoicampus");
//    $streoicampus  = get_string("modulename", "eoicampus");       
//    $strload = get_string("load", "eoicampus"); 
//    
//IECISA ********** ADDED -> Updated deprecated code
//2011.07.18 @mmartinez
//    $navlinks = array(
//    array(
//        'name' => $streoicampus,
//        'link' => $CFG->wwwroot . '/mod/eoicampus/index.php?id=' . $course->id,
//        'type' => 'activity'
//    ),
//    array(
//        'name' => format_string($eoicampus->name),
//        'link' => '',
//        'type' => 'activityinstance'
//    )
//);
    
//$navigation = build_navigation($navlinks);
//************ FI
//IECISA *********** MODIFIED -> Added update code to the navigation call
//2011.07.18 @mmartinez
  //	print_header_simple(format_string($eoicampus->name), "", $navigation, "", "", true,
   //               update_module_button($cm->id, $course->id, $streoicampus), navmenu($course, $cm));
//********* ORIGINAL
    /*print_header_simple(format_string($eoicampus->name), "",
                 "<a href=\"index.php?id=$course->id\">$streoicampuss</a> -> ".format_string($eoicampus->name), "", "", true,
                  update_module_button($cm->id, $course->id, $streoicampus), navmenu($course, $cm));*/
//********* FI
//********* FI
        
//IECISA *********** MODIFIED -> Deprecated code Moodle 2.2
//2012.10.24 @abertranb
    $groups = array();
    $groupmode = groups_get_activity_groupmode($cm);
    $currentgroup = groups_get_activity_group($cm, true);
    $group_id = optional_param("group", false, PARAM_INT);
    $obj_group = null;
    if ($groupmode) {
    	$groups = groups_get_all_groups($course->id, $USER->id);
    	if (count($groups)==1) {
    		$group_element = array_pop($groups);
    		$group_id = $group_element->id;
    	} 
    }           
//********* ORIGINAL
    /*$groupmode = groupmode($course, $cm);
    $currentgroup = setup_and_print_groups($course, $groupmode, 'view.php?id=' . $cm->id);*/
//********* FI

/// Print the main part of the page
    echo html_writer::tag('p', $eoicampus->description, array()); // author
	$courseid=$course->shortname;
	$pathway = '';
	if ($groupmode && !$group_id && count($groups)>1){
		//IECISA *********** ADDED -> Get the list of groups
		//2012.10.25 @abertranb
			$obj_group = eoicampus_get_groups($id, $course, $cm, $USER);
			/*
			echo '<div class="groupselector">';
			if ($obj_group->group_mode == VISIBLEGROUPS) {
				$grouplabel = get_string('groupsvisible');
			} else {
				$grouplabel = get_string('groupsseparate');
			}
			$opts = array('mod/eoicampus/view.php?id='.$id.'&group=' => 'Course 1');
			$select = new url_select($obj_group->groups);
			echo $grouplabel.': '.$OUTPUT->render($select);
			//print them in the menu
			echo '</div>';*/
			if ($obj_group->group_mode == VISIBLEGROUPS) {
				$grouplabel = get_string('groupsvisible');
			} else {
				$grouplabel = get_string('groupsseparate');
			}
			$opts = array('mod/eoicampus/view.php?id='.$id.'&group=' => '');
			$select = new url_select($obj_group->groups);
			echo html_writer::tag('div', $grouplabel.': '.$OUTPUT->render($select), array('class'=>'groupselector')); // author
			//echo html_writer::end_tag('div');
				
			
		//********* FI
			//echo $OUTPUT->notification(get_string("choose_group", "eoicampus"));
			echo "<script>alert('".get_string("choose_group", "eoicampus")."');</script>";	
	}else{
		if ($group_id!=0){
			//IECISA *********** MODIFIED -> Change deprecated code in Moodle 2.2
			//2012.10.25 @abertranb
		   	$group = $DB->get_record('groups', array('id' => $group_id));
		   	//********* ORIGINAL
		   	//$group = get_record('groups', 'id', $currentgroup);
		   	//********* FI
		   	$courseid = $group->name;
		}
		$eoicampus->level=substr($courseid,2,1);
//IECISA *********** MODIFIED -> Deprecated code Moodle 2.2, shall work with capabilities
//2012.10.24 @abertranb
		$canassess = has_capability('moodle/course:manageactivities', $context);
		
		if ($canassess) {
			$courseid=$courseid.'&amp;isTeacher=true';
		}
//********* ORIGINAL
		//if (isteacher($course->id))	 $courseid=$courseid.'&isTeacher=true';
//********* FI		
		else $courseid=$courseid.'&amp;isTeacher=false';
		
		$pathway = ($eoicampus->pwlevel != '0' && isset($eoicampus->pwid) && $eoicampus->pwid != '' && $eoicampus->pwid != '-1' && $eoicampus->pwid != '0')? '&amp;pway='.$eoicampus->pwid.'&amp;pwtype='.$eoicampus->pwtype : '';		
		echo html_writer::tag('p', '<a href="#" onclick="Javascript:window.open(\''.$CFG->eoicampus_server.'?username='.$USER->username.'&amp;password='.$USER->password.$pathway.'&amp;courseid='.$courseid.'&amp;url='.$CFG->wwwroot.'\',\'eoicampus\',\'navigation=0,toolbar=0,resizable=1,scrollbars=1,width=1000,height=625\');;" >'.$strload.'</a>', array());	
	}
	
	
/// Finish the page
// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.3
// 2012.11.10 @abertranb
	echo $OUTPUT->footer($course);
//********* ORIGINAL
    //print_footer($course);
//********* END
?>
