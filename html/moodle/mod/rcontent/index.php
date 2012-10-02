<?php

require_once('../../config.php');
require_once('locallib.php');

$id = required_param('id', PARAM_INT);        // course

// MARSUPIAL ********** AFEGIT -> Filter by status, get parameter with the filterby
// 2011.08.31 @mmartinez
$filterby = optional_param('filterby', '', PARAM_RAW);
// ********** FI

if (($course = get_record('course', 'id', $id)) === false) {
    error('Course ID is incorrect');
}

require_course_login($course);

// MARSUPIAL ********** MODIFICAT -> Report index make text translatable
// 2012.01.09 @mmartinez
$strrcontent = get_string('modulename', 'rcontent');//
// ********** ORIGINAL
//$strrcontent = 'Remote content';//
// ********** FI

/// Print the header

$navlinks = array(
    array(
        'name' => $strrcontent,
        'link' => '',
        'type' => 'activity'
    )
);

$navigation = build_navigation($navlinks);

print_header_simple(
    $strrcontent,
    '',
    $navigation,
    '',
    '',
    true,
    '',
    navmenu($course)
);

// MARSUPIAL ********** AFEGIT -> Filter by status, add select field
// 2011.08.31 @mmartinez
$filteroptionsurl         = 'index.php?id='.$id;
$filteroptionsparam       = '&amp;filterby=';
$filteroptionsurlandparam = $filterselected = $filteroptionsurl.$filteroptionsparam;
$filterselected          .= $filterby;
$filteroptionsparam       = ($filterby != '')? $filteroptionsparam.$filterby : '';
// ********** FI

/// Get all the appropriate data

if (($rcontents = get_all_instances_in_course('rcontent', $course)) === false) {
    notice('There are no rcontents', '../../course/view.php?id=' . $course->id);
    die;
}
//echo '<br>all_instances_in_course_response: '; print_r($rcontents); echo '<br><br>'; //just for debug purpose

/// Print the list of instances (your module will probably extend this)

$strname = get_string('name');
$strsummary = get_string('summary');
$strreport = get_string('report','rcontent');
$table->data = array();

if ($course->format == 'weeks') {
    $table->head = array(get_string('week'), $strname, $strsummary,$strreport);
    $table->align = array('center', 'left');
}
else if ($course->format == 'topics') {
    $table->head = array(get_string('topic'), $strname, $strsummary, $strreport);
    $table->align = array('center', 'left', 'left', 'left');
}
else {
    $table->head = array($strname, $strreport);
    $table->align = array('left', 'left', 'left');
}

//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.18 @mmartinez
$page       = optional_param("page",0);
$limit      = $CFG->rcontent_registersperreportpage;
$count      = count($rcontents);
$startindex = ($limit*$page);
//********** FI

//MARSUPIAL ********** MODIFICAT -> Just show the registers of one page
//2011.05.18 @mmatinez
for($i=$startindex;$i<($startindex+$limit);$i++) {
	if ($i > count($rcontents)-1){
		break;
	}
	$rcontent = $rcontents[$i];
//********* ORIGINAL
//foreach ($rcontents as $rcontent) {
//********* FI
	$context = get_context_instance(CONTEXT_MODULE, $rcontent->coursemodule);
    $report = '&nbsp;';
    $reportshow = '&nbsp;';
    
    if (has_capability('mod/rcontent:viewreport', $context)) {
// MARSUPIAL ********** MODIFIED -> Filter by status
// 2011.08.31 @mmartinez
        $trackedusers = rcontent_get_count_users($rcontent->id, $rcontent->groupingid, $context, $filterby);
// ********* ORIGINAL
        //$trackedusers = rcontent_get_count_users($rcontent->id, $rcontent->groupingid, $context);
// ********* FI
        if ($trackedusers > 0) {
            $reportshow = '<a href="report.php?id='.$rcontent->coursemodule.$filteroptionsparam.'">'.get_string('viewalluserreports','rcontent',$trackedusers).'</a></div>';
        } else {
            $reportshow = get_string('noreports','rcontent');
        }
    } else if (has_capability('mod/rcontent:viewscores', $context)) {
    	require_once('locallib.php');
        $report = rcontent_grade_user($rcontent, $USER->id);
        $reportshow = get_string('score','rcontent').": ".$report;
    }
    
    if (!$rcontent->visible) {
        //Show dimmed if the mod is hidden
        $link = '<a class="dimmed" href="' . $CFG->wwwroot . '/mod/rcontent/view.php?id=' . $rcontent->coursemodule . '">' . $rcontent->name . '</a>';
    }
    else {
        //Show normal if the mod is visible
        $link = '<a href="view.php?id=' . $rcontent->coursemodule . '">' . $rcontent->name . '</a>';
    }

    if ($course->format == 'weeks' || $course->format == 'topics') {
        array_push($table->data, array($rcontent->section, $link, $rcontent->summary,$reportshow));
    }
    else {
        array_push($table->data, array($link));
    }
}

// MARSUPIAL ********** AFEGIT -> Filter by status, add select field
// 2011.08.31 @mmartinez
if (has_capability('mod/rcontent:viewreport', $context)) {
	$menu = array();
	$menu[$filteroptionsurl]                        = get_string('all', 'rcontent');
	$menu[$filteroptionsurlandparam.'NO_INICIADO']  = get_string('NO_INICIADO', 'rcontent');
	$menu[$filteroptionsurlandparam.'INCOMPLETO']   = get_string('INCOMPLETO', 'rcontent');
	$menu[$filteroptionsurlandparam.'FINALIZADO']   = get_string('FINALIZADO', 'rcontent');
	$menu[$filteroptionsurlandparam.'POR_CORREGIR'] = get_string('POR_CORREGIR', 'rcontent');
	$menu[$filteroptionsurlandparam.'CORREGIDO']    = get_string('CORREGIDO', 'rcontent');
	            
	popup_form('', $menu, 'choosestatefilter', $filterselected, get_string('chooseaction', 'rcontent'), '', '', false, 'self');
}
// ********** FI

print_heading($strrcontent);
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.18 @mmartinez
print_paging_bar($count, $page, $limit, "index.php?id={$id}{$filteroptionsparam}&amp;", "page", false);
//********** FI

print_table($table);

//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.18 @mmartinez
print_paging_bar($count, $page, $limit, "index.php?id={$id}{$filteroptionsparam}&amp;", "page", false);
//********** FI

/// Finish the page

print_footer($course);