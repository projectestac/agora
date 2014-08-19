<?php
/// This page prints a particular instance of eoicampus

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');
require_once('../../lib/filelib.php');

    $id = required_param('id', PARAM_INT);             // Course Module ID

    if ($id) {
        if (! $cm = $DB->get_record("course_modules", array("id" => $id))) {
            error("Course Module ID was incorrect");
        }

        if (! $course = $DB->get_record("course", array("id" => $cm->course))) {
            error("Course is misconfigured");
        }

        if (! $eoicampus = $DB->get_record("eoicampus", array("id" => $cm->instance))) {
            error("Course module is incorrect");
        }
    }
    require_login($course);
    add_to_log($course->id, "eoicampus", "view", "view.php?id=$cm->id", "$eoicampus->id");

    //IECISA *********** MODIFIED -> Generating PAGE object (required Moodle 2.3)
    //2012.11.10 @abertanb
    $context = context_module::instance($cm->id);
    $PAGE->set_context($context);
    $PAGE->set_url('/mod/eoicampus/view.php', array('id' => $cm->id));
    $PAGE->set_focuscontrol('');
    $PAGE->set_cacheable(true);
    $PAGE->set_button('');
    $courseshortname = format_string($course->shortname, true, array('context' => context_course::instance($course->id)));
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

    echo $OUTPUT->header();

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

/// Print the main part of the page
    echo html_writer::tag('p', $eoicampus->description, array()); // author
	$courseid=$course->shortname;
	$pathway = '';
	if ($groupmode && !$group_id && count($groups)>1){
			$obj_group = eoicampus_get_groups($id, $course, $cm, $USER);
			if ($obj_group->group_mode == VISIBLEGROUPS) {
				$grouplabel = get_string('groupsvisible');
			} else {
				$grouplabel = get_string('groupsseparate');
			}
			$opts = array('mod/eoicampus/view.php?id='.$id.'&group=' => '');
			$select = new url_select($obj_group->groups);
			echo html_writer::tag('div', $grouplabel.': '.$OUTPUT->render($select), array('class'=>'groupselector')); // author

		//********* FI
			//echo $OUTPUT->notification(get_string("choose_group", "eoicampus"));
			echo "<script>alert('".get_string("choose_group", "eoicampus")."');</script>";
	}else{
		if ($group_id!=0){
		   	$group = $DB->get_record('groups', array('id' => $group_id));
		   	$courseid = $group->name;
		}
		$eoicampus->level=substr($courseid,2,1);
		$canassess = has_capability('moodle/course:manageactivities', $context);

		if ($canassess) {
			$courseid = $courseid.'&isTeacher=true';
		}
		else $courseid = $courseid.'&isTeacher=false';

        if(isset($USER->password)){
            $password = $USER->password;
        } else {
            $password = $DB->get_field('user','password',array('id'=>$USER->id));
        }

        $url = $CFG->eoicampus_server.'?username='.$USER->username.'&password='.$password.'&courseid='.$courseid.'&url='.$CFG->wwwroot;
        if ($eoicampus->pwlevel != '0' && isset($eoicampus->pwid) && $eoicampus->pwid != '' && $eoicampus->pwid != '-1' && $eoicampus->pwid != '0'){
            $url .= '&pway='.$eoicampus->pwid.'&pwtype='.$eoicampus->pwtype;
        }
		echo html_writer::tag('p', '<a href="#" onclick="window.open(\''.$url.'\',\'eoicampus\',\'navigation=0,toolbar=0,resizable=1,scrollbars=1,width=1000,height=625\');;" >'.$strload.'</a>', array());
	}

	echo $OUTPUT->footer($course);
