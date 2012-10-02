<?php

/*  This format is based on "topics" format from Moodle 1.9.7
 *  
 *  This software have been modified by "UPCNET, SERVEIS D'ACCÉS A
 *  INTERNET DE LA UNIVERSITAT POLITÈCNICA DE CATALUNYA, S.L." from now
 *  on UPCnet for "Govern d'Andorra" on 2010
 *  
 * 	This file is an extension of Moodle 1.9.7.
 *
 *  Moodle 1.9.7 is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  Moodle 1.9.7 is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with Moodle 1.9.7.  If not, see <http://www.gnu.org/licenses/>.
 */
/*
 * @author: Pau Ferrer Ocaña pau.ferrer-ocana@upcnet.es
 * @author: Jaume Fernàndez Valiente jfern343@xtec.cat
 */
require_once('format/senzill/lib.php');

require_once($CFG->libdir . '/ajax/ajaxlib.php');

$topic = optional_param('topic', -1, PARAM_INT);

// Bounds for block widths
// more flexible for theme designers taken from theme config.php
$lmin = (empty($THEME->block_l_min_width)) ? 100 : $THEME->block_l_min_width;
$lmax = (empty($THEME->block_l_max_width)) ? 210 : $THEME->block_l_max_width;
$rmin = (empty($THEME->block_r_min_width)) ? 100 : $THEME->block_r_min_width;
$rmax = (empty($THEME->block_r_max_width)) ? 210 : $THEME->block_r_max_width;

define('BLOCK_L_MIN_WIDTH', $lmin);
define('BLOCK_L_MAX_WIDTH', $lmax);
define('BLOCK_R_MIN_WIDTH', $rmin);
define('BLOCK_R_MAX_WIDTH', $rmax);

$preferred_width_left = bounded_number(BLOCK_L_MIN_WIDTH, blocks_preferred_width($pageblocks[BLOCK_POS_LEFT]), BLOCK_L_MAX_WIDTH);
$preferred_width_right = bounded_number(BLOCK_R_MIN_WIDTH, blocks_preferred_width($pageblocks[BLOCK_POS_RIGHT]), BLOCK_R_MAX_WIDTH);

if ($topic != -1) {
    $displaysection = course_set_display($course->id, $topic);
} else {
    if (isset($USER->display[$course->id])) {       // for admins, mostly
        $displaysection = $USER->display[$course->id];
    } else {
        $displaysection = course_set_display($course->id, 0);
    }
}

$context = get_context_instance(CONTEXT_COURSE, $course->id);
//XTEC ************ AFEGIT - Patch for Senzill course format
//2011.02.01 @jaumefv (by @pferre22) - https://projectes.lafarga.cat/projects/agora/tracker/841/1737/detail

$is_teacher = has_capability('moodle/grade:edit', $context);
if (!$is_teacher && $topic == -1) {
    //Students or guests, only show current topic or all.
    if ($course->marker != 0)
        $displaysection = $course->marker;
    else
        $displaysection = -2; //-2 does not show any topic, only summary
}
//************ FI

if (($marker >= 0) && has_capability('moodle/course:setcurrentsection', $context) && confirm_sesskey()) {
    $course->marker = $marker;
    if (!set_field("course", "marker", $marker, "id", $course->id)) {
        error("Could not mark that topic for this course");
    }
}

$streditsummary = get_string('editsummary');
$stradd = get_string('add');
$stractivities = get_string('activities');
$strshowalltopics = get_string('showalltopics');
$strtopic = get_string('topic');
$strgroups = get_string('groups');
$strgroupmy = get_string('groupmy');
$editing = $PAGE->user_is_editing();
//XTEC ************ AFEGIT - To remove warning "Undefined variable: strshowonlytopic" (line 134)
//2010.06.30 @pferre22
$strshowonlytopic = get_string('showonlytopic', '', $section);
$strshowalltopics = get_string('showall');
$strgrades = get_string('grades');
//************ FI


if ($editing) {
    $strstudents = moodle_strtolower($course->students);
    $strtopichide = get_string('topichide', '', $strstudents);
    $strtopicshow = get_string('topicshow', '', $strstudents);
    $strmarkthistopic = get_string('markthistopic');
    $strmarkedthistopic = get_string('markedthistopic');
    $strmoveup = get_string('moveup');
    $strmovedown = get_string('movedown');
}

//XTEC ************ AFEGIT - Patch for Senzill course format
//2011.04.14 @jaumefv (by @pferre22)- https://projectes.lafarga.cat/projects/agora/tracker/841/1737/detail

if ($is_teacher) {
    //************ FI
/// Layout the whole page as three big columns.
    echo '<table id="layout-table" cellspacing="0" summary="' . get_string('layouttable') . '"><tr>';

/// The left column ...
    $lt = (empty($THEME->layouttable)) ? array('left', 'middle', 'right') : $THEME->layouttable;
    foreach ($lt as $column) {
        switch ($column) {
            case 'left':
                if (blocks_have_content($pageblocks, BLOCK_POS_LEFT) || $editing) {
                    echo '<td style="width:' . $preferred_width_left . 'px" id="left-column">';
                    print_container_start();
                    blocks_print_group($PAGE, $pageblocks, BLOCK_POS_LEFT);
                    print_container_end();
                    echo '</td>';
                }

                break;
            case 'middle':
/// Start main column
                echo '<td id="middle-column">';
                print_container_start();
                echo skip_main_destination();

                print_heading_block(get_string('topicoutline'), 'outline');

                echo '<table class="topics" width="100%" summary="' . get_string('layouttable') . '">';

/// If currently moving a file then show the current clipboard
                if (ismoving($course->id)) {
                    $stractivityclipboard = strip_tags(get_string('activityclipboard', '', addslashes($USER->activitycopyname)));
                    $strcancel = get_string('cancel');
                    echo '<tr class="clipboard">';
                    echo '<td colspan="3">';
                    echo $stractivityclipboard . '&nbsp;&nbsp;(<a href="mod.php?cancelcopy=true&amp;sesskey=' . $USER->sesskey . '">' . $strcancel . '</a>)';
                    echo '</td>';
                    echo '</tr>';
                }

//XTEC ************ AFEGIT - (Navigation bar) To show an index of themes/weeks
//2010.06.30 @pferre22
                if (!isset($course->navigationbar) || $course->navigationbar <= 1) {
                    echo '<tr id="section-index" class="section main index">';
                    echo '<td class="left side">&nbsp;</td>';

                    echo '<td class="content">';

                    if (!isset($course->gradesonnav) || $course->gradesonnav) {
                        //Show reports
                        $reportavailable = false;
                        if (has_capability('moodle/grade:viewall', $context)) {
                            $reportavailable = true;
                        } else if (!empty($course->showgrades)) {
                            if ($reports = get_list_of_plugins('grade/report')) {     // Get all installed reports
                                arsort($reports); // user is last, we want to test it first
                                foreach ($reports as $plugin) {
                                    if (has_capability('gradereport/' . $plugin . ':view', $context)) {
                                        //stop when the first visible plugin is found
                                        $reportavailable = true;
                                        break;
                                    }
                                }
                            }
                        }
                        if ($reportavailable) {
                            echo '<img src="' . $CFG->pixpath . '/i/grades.gif" class="icon" alt="" /><a href="' . $CFG->wwwroot . '/grade/report/index.php?id=' . $course->id . '">' . get_string('grades') . '</a><br/>';
                        }
                    }

                    if (!empty($displaysection) && $displaysection > 0)
                        echo '<a href="view.php?id=' . $course->id . '&amp;topic=0#section-' . $section . '" title="' . $strshowalltopics . '">' .
                        get_string('showall') . '</a> - ';
                    else
                        echo '<b style="margin-right:4px;">' . get_string('showall') . '</b> - ';
                    for ($i = 1; $i <= $course->numsections; $i++) {
                        if ($displaysection == $i)
                            echo '<b style="margin-left: 4px; margin-right:4px;">' . $i . '</b> ';
                        else
                            echo '<a style="margin-left: 4px; margin-right:4px;" href="view.php?id=' . $course->id . '&amp;topic=' . $i . '" title="' . $strshowonlytopic . '">' . $i . '</a> ';
                    }

                    echo '</td>';
                    echo '<td class="right side">&nbsp;</td>';
                    echo '</tr>';
                    echo '<tr class="section separator"><td colspan="3" class="spacer"></td></tr>';
                }
//************ FI
/// Print Section 0

                $section = 0;
                $thissection = $sections[$section];

                if ($thissection->summary or $thissection->sequence or isediting($course->id)) {
                    echo '<tr id="section-0" class="section main">';
                    echo '<td id="sectionblock-0" class="left side">&nbsp;</td>';
                    echo '<td class="content">';

                    echo '<div class="summary">';
                    $summaryformatoptions->noclean = true;
                    echo format_text($thissection->summary, FORMAT_HTML, $summaryformatoptions);

                    if (isediting($course->id) && has_capability('moodle/course:update', get_context_instance(CONTEXT_COURSE, $course->id))) {
                        echo '<a title="' . $streditsummary . '" ' .
                        ' href="editsection.php?id=' . $thissection->id . '"><img src="' . $CFG->pixpath . '/t/edit.gif" ' .
                        ' alt="' . $streditsummary . '" /></a><br /><br />';
                    }
                    echo '</div>';

                    print_section($course, $thissection, $mods, $modnamesused);

                    if (isediting($course->id)) {
                        print_section_add_menus($course, $section, $modnames);
                    }

                    echo '</td>';
                    //XTEC ************ MODIFICAT - (Navigation bar) To show only current topic to show
                    //2010.06.30 @pferre22
                    if (!isset($course->navigationbar) || $course->navigationbar == 0) {
                        echo '<td class="right side">';
                        if ($displaysection == -2)
                            echo '<a href="view.php?id=' . $course->id . '&amp;topic=0#section-0" title="' . $strshowalltopics . '">' .
                            '<img src="' . $CFG->pixpath . '/i/all.gif" alt="' . $strshowalltopics . '" /></a><br />';
                        echo '</td>';
                    }
                    else
                        echo '<td class="right side">&nbsp;</td>';
                    //************ ORIGINAL
                    //echo '<td class="right side">&nbsp;</td>';
                    //************ FI
                    echo '</tr>';
                    echo '<tr class="section separator"><td colspan="3" class="spacer"></td></tr>';
                }


/// Now all the normal modules by topic
/// Everything below uses "section" terminology - each "section" is a topic.

                $timenow = time();
                $section = 1;
                $sectionmenu = array();

                while ($section <= $course->numsections) {

                    if (!empty($sections[$section])) {
                        $thissection = $sections[$section];
                    } else {
                        unset($thissection);
                        $thissection->course = $course->id;   // Create a new section structure
                        $thissection->section = $section;
                        $thissection->summary = '';
                        $thissection->visible = 1;
                        if (!$thissection->id = insert_record('course_sections', $thissection)) {
                            notify('Error inserting new topic!');
                        }
                    }

                    $showsection = (has_capability('moodle/course:viewhiddensections', $context) or $thissection->visible or !$course->hiddensections);

                    if (!empty($displaysection) and $displaysection != $section) {
                        if ($showsection) {
                            $strsummary = strip_tags(format_string($thissection->summary, true));
                            if (strlen($strsummary) < 57) {
                                $strsummary = ' - ' . $strsummary;
                            } else {
                                $strsummary = ' - ' . substr($strsummary, 0, 60) . '...';
                            }
                            $sectionmenu['topic=' . $section] = s($section . $strsummary);
                        }
                        $section++;
                        continue;
                    }

                    if ($showsection) {

                        $currenttopic = ($course->marker == $section);

                        $currenttext = '';
                        if (!$thissection->visible) {
                            $sectionstyle = ' hidden';
                        } else if ($currenttopic) {
                            $sectionstyle = ' current';
                            $currenttext = get_accesshide(get_string('currenttopic', 'access'));
                        } else {
                            $sectionstyle = '';
                        }

                        echo '<tr id="section-' . $section . '" class="section main' . $sectionstyle . '">';
                        echo '<td id="sectionblock-' . $section . '" class="left side">' . $currenttext . $section . '</td>';

                        echo '<td class="content">';
                        if (!has_capability('moodle/course:viewhiddensections', $context) and !$thissection->visible) {   // Hidden for students
                            echo get_string('notavailable');
                        } else {
                            echo '<div class="summary">';

                            $summaryformatoptions->noclean = true;
                            echo format_text($thissection->summary, FORMAT_HTML, $summaryformatoptions);

                            if (isediting($course->id) && has_capability('moodle/course:update', get_context_instance(CONTEXT_COURSE, $course->id))) {
                                echo ' <a title="' . $streditsummary . '" href="editsection.php?id=' . $thissection->id . '">' .
                                '<img src="' . $CFG->pixpath . '/t/edit.gif" alt="' . $streditsummary . '" /></a><br /><br />';
                            }
                            echo '</div>';

                            print_section($course, $thissection, $mods, $modnamesused);

                            if (isediting($course->id)) {
                                print_section_add_menus($course, $section, $modnames);
                            }
                        }
                        echo '</td>';

                        echo '<td class="right side">';
                        if ($displaysection == $section) {      // Show the zoom boxes
                            echo '<a href="view.php?id=' . $course->id . '&amp;topic=0#section-' . $section . '" title="' . $strshowalltopics . '">' .
                            '<img src="' . $CFG->pixpath . '/i/all.gif" alt="' . $strshowalltopics . '" /></a><br />';
                        } else {
                            $strshowonlytopic = get_string('showonlytopic', '', $section);
                            echo '<a href="view.php?id=' . $course->id . '&amp;topic=' . $section . '" title="' . $strshowonlytopic . '">' .
                            '<img src="' . $CFG->pixpath . '/i/one.gif" alt="' . $strshowonlytopic . '" /></a><br />';
                        }

                        if (isediting($course->id) && has_capability('moodle/course:update', get_context_instance(CONTEXT_COURSE, $course->id))) {
                            if ($course->marker == $section) {  // Show the "light globe" on/off
                                echo '<a href="view.php?id=' . $course->id . '&amp;marker=0&amp;sesskey=' . $USER->sesskey . '#section-' . $section . '" title="' . $strmarkedthistopic . '">' .
                                '<img src="' . $CFG->pixpath . '/i/marked.gif" alt="' . $strmarkedthistopic . '" /></a><br />';
                            } else {
                                echo '<a href="view.php?id=' . $course->id . '&amp;marker=' . $section . '&amp;sesskey=' . $USER->sesskey . '#section-' . $section . '" title="' . $strmarkthistopic . '">' .
                                '<img src="' . $CFG->pixpath . '/i/marker.gif" alt="' . $strmarkthistopic . '" /></a><br />';
                            }

                            if ($thissection->visible) {        // Show the hide/show eye
                                echo '<a href="view.php?id=' . $course->id . '&amp;hide=' . $section . '&amp;sesskey=' . $USER->sesskey . '#section-' . $section . '" title="' . $strtopichide . '">' .
                                '<img src="' . $CFG->pixpath . '/i/hide.gif" alt="' . $strtopichide . '" /></a><br />';
                            } else {
                                echo '<a href="view.php?id=' . $course->id . '&amp;show=' . $section . '&amp;sesskey=' . $USER->sesskey . '#section-' . $section . '" title="' . $strtopicshow . '">' .
                                '<img src="' . $CFG->pixpath . '/i/show.gif" alt="' . $strtopicshow . '" /></a><br />';
                            }

                            if ($section > 1) {                       // Add a arrow to move section up
                                echo '<a href="view.php?id=' . $course->id . '&amp;random=' . rand(1, 10000) . '&amp;section=' . $section . '&amp;move=-1&amp;sesskey=' . $USER->sesskey . '#section-' . ($section - 1) . '" title="' . $strmoveup . '">' .
                                '<img src="' . $CFG->pixpath . '/t/up.gif" alt="' . $strmoveup . '" /></a><br />';
                            }

                            if ($section < $course->numsections) {    // Add a arrow to move section down
                                echo '<a href="view.php?id=' . $course->id . '&amp;random=' . rand(1, 10000) . '&amp;section=' . $section . '&amp;move=1&amp;sesskey=' . $USER->sesskey . '#section-' . ($section + 1) . '" title="' . $strmovedown . '">' .
                                '<img src="' . $CFG->pixpath . '/t/down.gif" alt="' . $strmovedown . '" /></a><br />';
                            }
                        }

                        echo '</td></tr>';
                        echo '<tr class="section separator"><td colspan="3" class="spacer"></td></tr>';
                    }

                    $section++;
                }
                echo '</table>';

                if (!empty($sectionmenu)) {
                    echo '<div class="jumpmenu">';
                    echo popup_form($CFG->wwwroot . '/course/view.php?id=' . $course->id . '&amp;', $sectionmenu, 'sectionmenu', '', get_string('jumpto'), '', '', true);
                    echo '</div>';
                }

                print_container_end();
                echo '</td>';

                break;
            case 'right':
                // The right column
                if (blocks_have_content($pageblocks, BLOCK_POS_RIGHT) || $editing) {
                    echo '<td style="width:' . $preferred_width_right . 'px" id="right-column">';
                    print_container_start();
                    blocks_print_group($PAGE, $pageblocks, BLOCK_POS_RIGHT);
                    print_container_end();
                    echo '</td>';
                }

                break;
        }
    }
    echo '</tr></table>';

    //XTEC ************ AFEGIT - Patch for Senzill course format
    //2011.04.14 @jaumefv (by @pferre22) - https://projectes.lafarga.cat/projects/agora/tracker/841/1737/detail
    //INICI 1
} else {

/// Layout the whole page as three big columns.
    echo '<table id="layout-table" cellspacing="0" summary="' . get_string('layouttable') . '"><tr>';

/// The left column ...
    $lt = (empty($THEME->layouttable)) ? array('left', 'middle', 'right') : $THEME->layouttable;
    foreach ($lt as $column) {
        switch ($column) {
            case 'left':
                if (blocks_have_content($pageblocks, BLOCK_POS_LEFT) || $editing) {
                    echo '<td style="width:' . $preferred_width_left . 'px" id="left-column">';
                    print_container_start();
                    blocks_print_group($PAGE, $pageblocks, BLOCK_POS_LEFT);
                    print_container_end();
                    echo '</td>';
                }

                break;
            case 'middle':
/// Start main column
                echo '<td id="middle-column">';
                print_container_start();

                echo '<table class="topics" width="100%" summary="' . get_string('layouttable') . '">';



//XTEC ************ AFEGIT - (Navigation bar) To show an index of themes/weeks
//2010.06.30 @pferre22
//INICI 2
                if (!isset($course->navigationbar) || $course->navigationbar <= 1) {
                    echo '<tr id="section-index" class="section main index">'; //Estaria bé més petit, però caldria tocar CSS, no?
                    echo '<td class="left side">&nbsp;</td>';

                    echo '<td class="content">';

                    if (!isset($course->gradesonnav) || $course->gradesonnav) {
                        //Show reports
                        $reportavailable = false;
                        if (has_capability('moodle/grade:viewall', $context)) {
                            $reportavailable = true;
                        } else if (!empty($course->showgrades)) {
                            if ($reports = get_list_of_plugins('grade/report')) {     // Get all installed reports
                                arsort($reports); // user is last, we want to test it first
                                foreach ($reports as $plugin) {
                                    if (has_capability('gradereport/' . $plugin . ':view', $context)) {
                                        //stop when the first visible plugin is found
                                        $reportavailable = true;
                                        break;
                                    }
                                }
                            }
                        }
                        if ($reportavailable) {
                            echo '<img src="' . $CFG->pixpath . '/i/grades.gif" class="icon" alt="" /><a href="' . $CFG->wwwroot . '/grade/report/index.php?id=' . $course->id . '">' . get_string('grades') . '</a><br/>';
                        }
                    }

                    //XTEC ************ MODIFICAT - (Navigation bar) Better control of the index of themes 
                    //2011.02.03 @jfern343
                    //INICI 3
                    if (!isset($course->topicsonnav) || $course->topicsonnav) { //Show all themes?
                        echo '<a href="view.php?id=' . $course->id . '&amp;topic=0#section-' . $section . '" title="' . $strshowalltopics . '">' . get_string('showall') . '</a>';

                        if (!isset($course->topicslistonnav) || $course->topicslistonnav)
                            echo '-';
                    }

                    if (!isset($course->topicslistonnav) || $course->topicslistonnav) { //Show the index of themes?
                        for ($i = 1; $i <= $course->numsections; $i++) {
                            if ($displaysection == $i)
                                echo '<b style="margin-left: 4px; margin-right:4px;">' . $i . '</b> ';
                            else
                                echo '<a style="margin-left: 4px; margin-right:4px;" href="view.php?id=' . $course->id . '&amp;topic=' . $i . '" title="' . $strshowonlytopic . '">' . $i . '</a> ';
                        }
                    }
                    //************ ORIGINAL
                    /*
                      if(!empty($displaysection) && $displaysection > 0)
                      echo '<a href="view.php?id='.$course->id.'&amp;topic=0#section-'.$section.'" title="'.$strshowalltopics.'">'.
                      get_string('showall').'</a> -';
                      else
                      echo '<b style="margin-right:4px;">'.get_string('showall').'</b> - ';
                      for($i=1; $i <= $course->numsections; $i++) {
                      if($displaysection == $i)
                      echo '<b style="margin-left: 4px; margin-right:4px;">'.$i.'</b> ';
                      else
                      echo '<a style="margin-left: 4px; margin-right:4px;" href="view.php?id='.$course->id.'&amp;topic='.$i.'" title="'.$strshowonlytopic.'">'.$i.'</a> ';
                      }
                     */
                    //************ FI 3

                    echo '</td>';
                    echo '<td class="right side">&nbsp;</td>';
                    echo '</tr>';
                    echo '<tr class="section separator"><td colspan="3" class="spacer"></td></tr>';
                }
//************ FI 2
/// Print Section 0

                $section = 0;
                $thissection = $sections[$section];

                if ($displaysection <= 0 and ($thissection->summary or $thissection->sequence)) {
                    echo '<tr id="section-0" class="section main">';
                    echo '<td id="sectionblock-0" class="left side">&nbsp;</td>';
                    echo '<td class="content">';
                    senzill_print_section($course, $thissection, $mods, $modnamesused);
                    echo '</td>';
                    echo '<td class="right side">&nbsp;</td>';
                    echo '</tr>';
                    echo '<tr class="section separator"><td colspan="3" class="spacer"></td></tr>';
                }


/// Now all the normal modules by topic
/// Everything below uses "section" terminology - each "section" is a topic.

                $timenow = time();
                $section = 1;
                $sectionmenu = array();

                while ($section <= $course->numsections) {

                    if (!empty($sections[$section])) {
                        $thissection = $sections[$section];
                    } else {
                        unset($thissection);
                        $thissection->course = $course->id;   // Create a new section structure
                        $thissection->section = $section;
                        $thissection->summary = '';
                        $thissection->visible = 1;
                        if (!$thissection->id = insert_record('course_sections', $thissection)) {
                            notify('Error inserting new topic!');
                        }
                    }

                    $showsection = (has_capability('moodle/course:viewhiddensections', $context) or $thissection->visible or !$course->hiddensections);

                    if (!empty($displaysection) and $displaysection != $section) {
                        if ($showsection) {
                            $strsummary = strip_tags(format_string($thissection->summary, true));
                            if (strlen($strsummary) < 57) {
                                $strsummary = ' - ' . $strsummary;
                            } else {
                                $strsummary = ' - ' . substr($strsummary, 0, 60) . '...';
                            }
                            $sectionmenu['topic=' . $section] = s($section . $strsummary);
                        }
                        $section++;
                        continue;
                    }

                    if ($showsection) {

                        $currenttopic = ($course->marker == $section);

                        $currenttext = '';
                        if (!$thissection->visible) {
                            $sectionstyle = ' hidden';
                        } else if ($currenttopic) {
                            $sectionstyle = ' current';
                            $currenttext = get_accesshide(get_string('currenttopic', 'access'));
                        } else {
                            $sectionstyle = '';
                        }

                        echo '<tr id="section-' . $section . '" class="section main' . $sectionstyle . '">';
                        echo '<td id="sectionblock-' . $section . '" class="left side">' . $currenttext . $section . '</td>';

                        echo '<td class="content">';
                        if (!has_capability('moodle/course:viewhiddensections', $context) and !$thissection->visible) {   // Hidden for students
                            echo get_string('notavailable');
                        } else {
                            senzill_print_section($course, $thissection, $mods, $modnamesused);
                        }
                        echo '</td>';

                        echo '<td class="right side"></td></tr>';
                        echo '<tr class="section separator"><td colspan="3" class="spacer"></td></tr>';
                    }

                    $section++;
                }
                echo '</table>';

                print_container_end();
                echo '</td>';

                break;

            case 'right':
                // The right column
                if (blocks_have_content($pageblocks, BLOCK_POS_RIGHT) || $editing) {
                    echo '<td style="width:' . $preferred_width_right . 'px" id="right-column">';
                    print_container_start();
                    blocks_print_group($PAGE, $pageblocks, BLOCK_POS_RIGHT);
                    print_container_end();
                    echo '</td>';
                }

                break;
        }
    }
    echo '</tr></table>';
}
//************ FI 1
?>
