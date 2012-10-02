<?PHP  // $Id: view.php,v 1.6 2007/03/06 12:04:59 sarjona Exp $

/// This page prints a particular instance of eoicampus

    require_once("../../config.php");
    require_once("lib.php");
    require_once('../../lib/filelib.php');
	
    $id = required_param('id', PARAM_INT);             // Course Module ID
    
    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
    
        if (! $eoicampus = get_record("eoicampus", "id", $cm->instance)) {
            error("Course module is incorrect");
        }
    } 

    require_login($course->id);
    add_to_log($course->id, "eoicampus", "view", "view.php?id=$cm->id", "$eoicampus->id");
    
/// Print the page header

    if ($course->category) {
        $navigation = "<A HREF=\"../../course/view.php?id=$course->id\">$course->shortname</A> ->";
    }
    
    $streoicampuss = get_string("modulenameplural", "eoicampus");
    $streoicampus  = get_string("modulename", "eoicampus");       
    $strload = get_string("load", "eoicampus"); 
    
//IECISA ********** ADDED -> Updated deprecated code
//2011.07.18 @mmartinez
    $navlinks = array(
    array(
        'name' => $streoicampus,
        'link' => $CFG->wwwroot . '/mod/rcontent/index.php?id=' . $course->id,
        'type' => 'activity'
    ),
    array(
        'name' => format_string($eoicampus->name),
        'link' => '',
        'type' => 'activityinstance'
    )
);

$navigation = build_navigation($navlinks);
//************ FI
//IECISA *********** MODIFIED -> Added update code to the navigation call
//2011.07.18 @mmartinez
    print_header_simple(format_string($eoicampus->name), "", $navigation, "", "", true,
                  update_module_button($cm->id, $course->id, $streoicampus), navmenu($course, $cm));
//********* ORIGINAL
    /*print_header_simple(format_string($eoicampus->name), "",
                 "<a href=\"index.php?id=$course->id\">$streoicampuss</a> -> ".format_string($eoicampus->name), "", "", true,
                  update_module_button($cm->id, $course->id, $streoicampus), navmenu($course, $cm));*/
//********* FI

    $groupmode = groupmode($course, $cm);
    $currentgroup = setup_and_print_groups($course, $groupmode, 'view.php?id=' . $cm->id);

/// Print the main part of the page
	echo "<br><p>".$eoicampus->description."<br>";
	$courseid=$course->shortname;
	if ($groupmode && $currentgroup==0){
			echo "<script>alert('".get_string("choose_group", "eoicampus")."');</script>";	
	}else{
		if ($currentgroup!=0){
	   	$group = get_record('groups', 'id', $currentgroup);
	   	$courseid = $group->name;
		}
		$eoicampus->level=substr($courseid,2,1);
		//if (isteacher($course->id))	$courseid=substr($courseid,0,2).'P'.substr($courseid,3,7).'&currentLevel='.$eoicampus->level;		
		if (isteacher($course->id))	$courseid=$courseid.'&isTeacher=true';
		else $courseid=$courseid.'&isTeacher=false';
		$pathway = ($eoicampus->pwlevel != '0' && isset($eoicampus->pwid) && $eoicampus->pwid != '' && $eoicampus->pwid != '-1' && $eoicampus->pwid != '0')? '&pway='.$eoicampus->pwid.'&pwtype='.$eoicampus->pwtype : '';		
	  echo '<br><A href="#" onclick="window.open(\''.$CFG->eoicampus_server.'?username='.$USER->username.'&password='.$USER->password.$pathway.'&courseid='.$courseid.'&url='.$CFG->wwwroot.'\',\'eoicampus\',\'navigation=0,toolbar=0,resizable=1,scrollbars=1,width=1000,height=625\');" >'.$strload.'</A>';	
	}

	
/// Finish the page
    print_footer($course);

?>
