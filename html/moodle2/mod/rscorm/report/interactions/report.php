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
/**
 * Core Report class of basic reporting plugin
 * @package   rscormreport
 * @subpackage interactions
 * @author    Dan Marsden and Ankit Kumar Agarwal
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/mod/rscorm/report/interactions/responsessettings_form.php');

class rscorm_interactions_report extends rscorm_default_report {
    /**
     * displays the full report
     * @param stdClass $scorm full RSCORM object
     * @param stdClass $cm - full course_module object
     * @param stdClass $course - full course object
     * @param string $download - type of download being requested
     */
    function display($scorm, $cm, $course, $download) {
        global $CFG, $DB, $OUTPUT, $PAGE;
        $contextmodule = get_context_instance(CONTEXT_MODULE, $cm->id);
        $action = optional_param('action', '', PARAM_ALPHA);
        $attemptids = optional_param_array('attemptid', array(), PARAM_RAW);
        $attemptsmode = optional_param('attemptsmode', RSCORM_REPORT_ATTEMPTS_ALL_STUDENTS, PARAM_INT);
        $PAGE->set_url(new moodle_url($PAGE->url, array('attemptsmode' => $attemptsmode)));

        if ($action == 'delete' && has_capability('mod/rscorm:deleteresponses', $contextmodule) && confirm_sesskey()) {
            if (rscorm_delete_responses($attemptids, $scorm)) { //delete responses.
                add_to_log($course->id, 'rscorm', 'delete attempts', 'report.php?id=' . $cm->id, implode(",", $attemptids), $cm->id);
                echo $OUTPUT->notification(get_string('rscormresponsedeleted', 'rscorm'), 'notifysuccess');
            }
        }
        // find out current groups mode
        $currentgroup = groups_get_activity_group($cm, true);

        // detailed report
        $mform = new mod_rscorm_report_interactions_settings($PAGE->url, compact('currentgroup'));
        if ($fromform = $mform->get_data()) {
            $pagesize = $fromform->pagesize;
            $includeqtext = $fromform->qtext;
            $includeresp = $fromform->resp;
            $includeright = $fromform->right;
            set_user_preference('rscorm_report_pagesize', $pagesize);
            set_user_preference('rscorm_report_interactions_qtext', $includeqtext);
            set_user_preference('rscorm_report_interactions_resp', $includeresp);
            set_user_preference('rscorm_report_interactions_right', $includeright);
        } else {
            $pagesize = get_user_preferences('rscorm_report_pagesize', 0);
            $includeqtext = get_user_preferences('rscorm_report_interactions_qtext', 0);
            $includeresp = get_user_preferences('rscorm_report_interactions_resp', 1);
            $includeright = get_user_preferences('rscorm_report_interactions_right', 0);
        }
        if ($pagesize < 1) {
            $pagesize = RSCORM_REPORT_DEFAULT_PAGE_SIZE;
        }

        // select group menu
        $displayoptions = array();
        $displayoptions['attemptsmode'] = $attemptsmode;
        $displayoptions['qtext'] = $includeqtext;
        $displayoptions['resp'] = $includeresp;
        $displayoptions['right'] = $includeright;

        $mform->set_data($displayoptions + array('pagesize' => $pagesize));
        if ($groupmode = groups_get_activity_groupmode($cm)) {   // Groups are being used
            if (!$download) {
                groups_print_activity_menu($cm, new moodle_url($PAGE->url, $displayoptions));
            }
        }
        $formattextoptions = array('context' => get_context_instance(CONTEXT_COURSE, $course->id));

        // We only want to show the checkbox to delete attempts
        // if the user has permissions and if the report mode is showing attempts.
        $candelete = has_capability('mod/rscorm:deleteresponses', $contextmodule)
                && ($attemptsmode != RSCORM_REPORT_ATTEMPTS_STUDENTS_WITH_NO);
        // select the students
        $nostudents = false;

        if (empty($currentgroup)) {
            // all users who can attempt scoes
            if (!$students = get_users_by_capability($contextmodule, 'mod/rscorm:savetrack', '', '', '', '', '', '', false)) {
                echo $OUTPUT->notification(get_string('nostudentsyet'));
                $nostudents = true;
                $allowedlist = '';
            } else {
                $allowedlist = array_keys($students);
            }
        } else {
            // all users who can attempt scoes and who are in the currently selected group
            if (!$groupstudents = get_users_by_capability($contextmodule, 'mod/rscorm:savetrack', '', '', '', '', $currentgroup, '', false)) {
                echo $OUTPUT->notification(get_string('nostudentsingroup'));
                $nostudents = true;
                $groupstudents = array();
            }
            $allowedlist = array_keys($groupstudents);
        }
        if ( !$nostudents ) {
            // Now check if asked download of data
            $coursecontext = context_course::instance($course->id);
            if ($download) {
                $filename = clean_filename("$course->shortname ".format_string($scorm->name, true,$formattextoptions));
            }

            // Define table columns
            $columns = array();
            $headers = array();
            if (!$download && $candelete) {
                $columns[] = 'checkbox';
                $headers[] = null;
            }
            if (!$download && $CFG->grade_report_showuserimage) {
                $columns[] = 'picture';
                $headers[] = '';
            }
            $columns[] = 'fullname';
            $headers[] = get_string('name');

            $extrafields = get_extra_user_fields($coursecontext);
            foreach ($extrafields as $field) {
                $columns[] = $field;
                $headers[] = get_user_field_name($field);
            }
            $columns[] = 'attempt';
            $headers[] = get_string('attempt', 'rscorm');
            $columns[] = 'start';
            $headers[] = get_string('started', 'rscorm');
            $columns[] = 'finish';
            $headers[] = get_string('last', 'rscorm');
            $columns[] = 'score';
            $headers[] = get_string('score', 'rscorm');
            $scoes = $DB->get_records('rscorm_scoes', array("scorm"=>$scorm->id), 'id');
            foreach ($scoes as $sco) {
                if ($sco->launch != '') {
                    $columns[] = 'scograde'.$sco->id;
                    $headers[] = format_string($sco->title,'',$formattextoptions);
                }
            }

            $params = array();
            list($usql, $params) = $DB->get_in_or_equal($allowedlist, SQL_PARAMS_NAMED);
                                    // Construct the SQL
            $select = 'SELECT DISTINCT '.$DB->sql_concat('u.id', '\'#\'', 'COALESCE(st.attempt, 0)').' AS uniqueid, ';
            $select .= 'st.scormid AS scormid, st.attempt AS attempt, ' .
                    'u.id AS userid, u.idnumber, u.firstname, u.lastname, u.picture, u.imagealt, u.email'.
                    //XTEC ************ MODIFICAT - To fix bug with SCORM report
                    //2013.04.22  @sarjona - https://tracker.moodle.org/browse/MDL-37449
                    get_extra_user_fields_sql($coursecontext, 'u', '', array('email', 'idnumber')) . ' ';
                    //************ ORIGINAL
                    /*
                    get_extra_user_fields_sql($coursecontext, 'u', '', array('idnumber')) . ' ';
                    */
                    //************ FI

            // This part is the same for all cases - join users and rscorm_scoes_track tables
            $from = 'FROM {user} u ';
            $from .= 'LEFT JOIN {rscorm_scoes_track} st ON st.userid = u.id AND st.scormid = '.$scorm->id;
            switch ($attemptsmode) {
                case RSCORM_REPORT_ATTEMPTS_STUDENTS_WITH:
                    // Show only students with attempts
                    $where = ' WHERE u.id ' .$usql. ' AND st.userid IS NOT NULL';
                    break;
                case RSCORM_REPORT_ATTEMPTS_STUDENTS_WITH_NO:
                    // Show only students without attempts
                    $where = ' WHERE u.id ' .$usql. ' AND st.userid IS NULL';
                    break;
                case RSCORM_REPORT_ATTEMPTS_ALL_STUDENTS:
                    // Show all students with or without attempts
                    $where = ' WHERE u.id ' .$usql. ' AND (st.userid IS NOT NULL OR st.userid IS NULL)';
                    break;
            }

            $countsql = 'SELECT COUNT(DISTINCT('.$DB->sql_concat('u.id', '\'#\'', 'COALESCE(st.attempt, 0)').')) AS nbresults, ';
            $countsql .= 'COUNT(DISTINCT('.$DB->sql_concat('u.id', '\'#\'', 'st.attempt').')) AS nbattempts, ';
            $countsql .= 'COUNT(DISTINCT(u.id)) AS nbusers ';
            $countsql .= $from.$where;
            $questioncount = get_rscorm_question_count($scorm->id);
            $nbmaincolumns = count($columns);
            for($id = 0; $id < $questioncount; $id++) {
                if ($displayoptions['qtext']) {
                    $columns[] = 'question' . $id;
                    $headers[] = get_string('questionx', 'rscormreport_interactions', $id);
                }
                if ($displayoptions['resp']) {
                    $columns[] = 'response' . $id;
                    $headers[] = get_string('responsex', 'rscormreport_interactions', $id);
                }
                if ($displayoptions['right']) {
                    $columns[] = 'right' . $id;
                    $headers[] = get_string('rightanswerx', 'rscormreport_interactions', $id);
                }
            }

            if (!$download) {
                $table = new flexible_table('mod-rscorm-report');

                $table->define_columns($columns);
                $table->define_headers($headers);
                $table->define_baseurl($PAGE->url);

                $table->sortable(true);
                $table->collapsible(true);

                // This is done to prevent redundant data, when a user has multiple attempts
                $table->column_suppress('picture');
                $table->column_suppress('fullname');
                foreach ($extrafields as $field) {
                    $table->column_suppress($field);
                }

                $table->no_sorting('start');
                $table->no_sorting('finish');
                $table->no_sorting('score');

                for($id = 0; $id < $questioncount; $id++) {
                    if ($displayoptions['qtext']) {
                        $table->no_sorting('question'.$id);
                    }
                    if ($displayoptions['resp']) {
                        $table->no_sorting('response'.$id);
                    }
                    if ($displayoptions['right']) {
                        $table->no_sorting('right'.$id);
                    }
                }

                foreach ($scoes as $sco) {
                    if ($sco->launch != '') {
                        $table->no_sorting('scograde'.$sco->id);
                    }
                }

                $table->column_class('picture', 'picture');
                $table->column_class('fullname', 'bold');
                $table->column_class('score', 'bold');

                $table->set_attribute('cellspacing', '0');
                $table->set_attribute('id', 'attempts');
                $table->set_attribute('class', 'generaltable generalbox');

                // Start working -- this is necessary as soon as the niceties are over
                $table->setup();
            } else if ($download == 'ODS') {
                require_once("$CFG->libdir/odslib.class.php");

                $filename .= ".ods";
                // Creating a workbook
                $workbook = new MoodleODSWorkbook("-");
                // Sending HTTP headers
                $workbook->send($filename);
                // Creating the first worksheet
                $sheettitle = get_string('report', 'rscorm');
                $myxls =& $workbook->add_worksheet($sheettitle);
                // format types
                $format =& $workbook->add_format();
                $format->set_bold(0);
                $formatbc =& $workbook->add_format();
                $formatbc->set_bold(1);
                $formatbc->set_align('center');
                $formatb =& $workbook->add_format();
                $formatb->set_bold(1);
                $formaty =& $workbook->add_format();
                $formaty->set_bg_color('yellow');
                $formatc =& $workbook->add_format();
                $formatc->set_align('center');
                $formatr =& $workbook->add_format();
                $formatr->set_bold(1);
                $formatr->set_color('red');
                $formatr->set_align('center');
                $formatg =& $workbook->add_format();
                $formatg->set_bold(1);
                $formatg->set_color('green');
                $formatg->set_align('center');
                // Here starts workshhet headers

                $colnum = 0;
                foreach ($headers as $item) {
                    $myxls->write(0, $colnum, $item, $formatbc);
                    $colnum++;
                }
                $rownum = 1;
            } else if ($download =='Excel') {
                require_once("$CFG->libdir/excellib.class.php");

                $filename .= ".xls";
                // Creating a workbook
                $workbook = new MoodleExcelWorkbook("-");
                // Sending HTTP headers
                $workbook->send($filename);
                // Creating the first worksheet
                $sheettitle = get_string('report', 'rscorm');
                $myxls =& $workbook->add_worksheet($sheettitle);
                // format types
                $format =& $workbook->add_format();
                $format->set_bold(0);
                $formatbc =& $workbook->add_format();
                $formatbc->set_bold(1);
                $formatbc->set_align('center');
                $formatb =& $workbook->add_format();
                $formatb->set_bold(1);
                $formaty =& $workbook->add_format();
                $formaty->set_bg_color('yellow');
                $formatc =& $workbook->add_format();
                $formatc->set_align('center');
                $formatr =& $workbook->add_format();
                $formatr->set_bold(1);
                $formatr->set_color('red');
                $formatr->set_align('center');
                $formatg =& $workbook->add_format();
                $formatg->set_bold(1);
                $formatg->set_color('green');
                $formatg->set_align('center');

                $colnum = 0;
                foreach ($headers as $item) {
                    $myxls->write(0, $colnum, $item, $formatbc);
                    $colnum++;
                }
                $rownum = 1;
            } else if ($download == 'CSV') {
                $filename .= ".txt";
                header("Content-Type: application/download\n");
                header("Content-Disposition: attachment; filename=\"$filename\"");
                header("Expires: 0");
                header("Cache-Control: must-revalidate,post-check=0,pre-check=0");
                header("Pragma: public");
                echo implode("\t", $headers)." \n";
            }

            if (!$download) {
                $sort = $table->get_sql_sort();
            } else {
                $sort = '';
            }
            // Fix some wired sorting
            if (empty($sort)) {
                $sort = ' ORDER BY uniqueid';
            } else {
                $sort = ' ORDER BY '.$sort;
            }

            if (!$download) {
                // Add extra limits due to initials bar
                list($twhere, $tparams) = $table->get_sql_where();
                if ($twhere) {
                    $where .= ' AND '.$twhere; //initial bar
                    $params = array_merge($params, $tparams);
                }

                if (!empty($countsql)) {
                    $count = $DB->get_record_sql($countsql,$params);
                    $totalinitials = $count->nbresults;
                    if ($twhere) {
                        $countsql .= ' AND '.$twhere;
                    }
                    $count = $DB->get_record_sql($countsql, $params);
                    $total  = $count->nbresults;
                }

                $table->pagesize($pagesize, $total);

                echo '<div class="quizattemptcounts">';
                if ( $count->nbresults == $count->nbattempts ) {
                    echo get_string('reportcountattempts', 'rscorm', $count);
                } else if ( $count->nbattempts>0 ) {
                    echo get_string('reportcountallattempts', 'rscorm', $count);
                } else {
                    echo $count->nbusers.' '.get_string('users');
                }
                echo '</div>';
            }

            // Fetch the attempts
            if (!$download) {
                $attempts = $DB->get_records_sql($select.$from.$where.$sort, $params,
                $table->get_page_start(), $table->get_page_size());
                echo '<div id="rscormtablecontainer">';
                if ($candelete) {
                    // Start form
                    $strreallydel  = addslashes_js(get_string('deleteattemptcheck', 'rscorm'));
                    echo '<form id="attemptsform" method="post" action="' . $PAGE->url->out(false) .
                         '" onsubmit="return confirm(\''.$strreallydel.'\');">';
                    echo '<input type="hidden" name="action" value="delete"/>';
                    echo '<input type="hidden" name="sesskey" value="'.sesskey().'" />';
                    echo '<div style="display: none;">';
                    echo html_writer::input_hidden_params($PAGE->url);
                    echo '</div>';
                    echo '<div>';
                }
                $table->initialbars($totalinitials>20); // Build table rows
            } else {
                $attempts = $DB->get_records_sql($select.$from.$where.$sort, $params);
            }
            if ($attempts) {
                foreach ($attempts as $scouser) {
                    $row = array();
                    if (!empty($scouser->attempt)) {
                        $timetracks = rscorm_get_sco_runtime($scorm->id, false, $scouser->userid, $scouser->attempt);
                    } else {
                        $timetracks = '';
                    }
                    if (in_array('checkbox', $columns)) {
                        if ($candelete && !empty($timetracks->start)) {
                            $row[] = '<input type="checkbox" name="attemptid[]" value="'. $scouser->userid . ':' . $scouser->attempt . '" />';
                        } else if ($candelete) {
                            $row[] = '';
                        }
                    }
                    if (in_array('picture', $columns)) {
                        $user = (object)array(
                                    'id'=>$scouser->userid,
                                    'picture'=>$scouser->picture,
                                    'imagealt'=>$scouser->imagealt,
                                    'email'=>$scouser->email,
                                    'firstname'=>$scouser->firstname,
                                    'lastname'=>$scouser->lastname);
                        $row[] = $OUTPUT->user_picture($user, array('courseid'=>$course->id));
                    }
                    if (!$download) {
                        $row[] = '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$scouser->userid.'&amp;course='.$course->id.'">'.fullname($scouser).'</a>';
                    } else {
                        $row[] = fullname($scouser);
                    }
                    foreach ($extrafields as $field) {
                        $row[] = s($scouser->{$field});
                    }
                    if (empty($timetracks->start)) {
                        $row[] = '-';
                        $row[] = '-';
                        $row[] = '-';
                        $row[] = '-';
                    } else {
                        if (!$download) {
                            $row[] = '<a href="userreport.php?a='.$scorm->id.'&amp;user='.$scouser->userid.'&amp;attempt='.$scouser->attempt.'">'.$scouser->attempt.'</a>';
                        } else {
                            $row[] = $scouser->attempt;
                        }
                        if ($download =='ODS' || $download =='Excel' ) {
                            $row[] = userdate($timetracks->start, get_string("strftimedatetime", "langconfig"));
                        } else {
                            $row[] = userdate($timetracks->start);
                        }
                        if ($download =='ODS' || $download =='Excel' ) {
                            $row[] = userdate($timetracks->finish, get_string('strftimedatetime', 'langconfig'));
                        } else {
                            $row[] = userdate($timetracks->finish);
                        }
                        $row[] = rscorm_grade_user_attempt($scorm, $scouser->userid, $scouser->attempt);
                    }
                    // print out all scores of attempt
                    foreach ($scoes as $sco) {
                        if ($sco->launch != '') {
                            if ($trackdata = rscorm_get_tracks($sco->id, $scouser->userid, $scouser->attempt)) {
                                if ($trackdata->status == '') {
                                    $trackdata->status = 'notattempted';
                                }
                                $strstatus = get_string($trackdata->status, 'rscorm');
                                // if raw score exists, print it
                                if ($trackdata->score_raw != '') {
                                    $score = $trackdata->score_raw;
                                    // add max score if it exists
                                    if ($scorm->version == 'RSCORM_1.3') {
                                        $maxkey = 'cmi.score.max';
                                    } else {
                                        $maxkey = 'cmi.core.score.max';
                                    }
                                    if (isset($trackdata->$maxkey)) {
                                        $score .= '/'.$trackdata->$maxkey;
                                    }
                                // else print out status
                                } else {
                                    $score = $strstatus;
                                }
                                if (!$download) {
                                    $row[] = '<img src="'.$OUTPUT->pix_url($trackdata->status, 'rscorm').'" alt="'.$strstatus.'" title="'.$strstatus.'" /><br/>
                                            <a href="userreport.php?b='.$sco->id.'&amp;user='.$scouser->userid.'&amp;attempt='.$scouser->attempt.
                                            '" title="'.get_string('details', 'rscorm').'">'.$score.'</a>';
                                } else {
                                    $row[] = $score;
                                }
                                // interaction data
                                for ($i=0; $i < $questioncount; $i++) {
                                    if ($displayoptions['qtext']) {
                                        $element='cmi.interactions_'.$i.'.id';
                                        if (isset($trackdata->$element)) {
                                            $row[] = s($trackdata->$element);
                                        } else {
                                            $row[] = '&nbsp;';
                                        }
                                    }
                                    if ($displayoptions['resp']) {
                                        $element='cmi.interactions_'.$i.'.student_response';
                                        if (isset($trackdata->$element)) {
                                            $row[] = s($trackdata->$element);
                                        } else {
                                            $row[] = '&nbsp;';
                                        }
                                    }
                                    if ($displayoptions['right']) {
                                        $j=0;
                                        $element = 'cmi.interactions_'.$i.'.correct_responses_'.$j.'.pattern';
                                        $rightans = '';
                                        if (isset($trackdata->$element)) {
                                            while(isset($trackdata->$element)) {
                                                if($j>0) {
                                                    $rightans .= ',';
                                                }
                                                $rightans .= s($trackdata->$element);
                                                $j++;
                                                $element = 'cmi.interactions_'.$i.'.correct_responses_'.$j.'.pattern';
                                            }
                                            $row[] = $rightans;
                                        } else {
                                            $row[] = '&nbsp;';
                                        }
                                    }
                                }
                            //---end of interaction data*/
                            } else {
                                // if we don't have track data, we haven't attempted yet
                                $strstatus = get_string('notattempted', 'rscorm');
                                if (!$download) {
                                    $row[] = '<img src="'.$OUTPUT->pix_url('notattempted', 'rscorm').'" alt="'.$strstatus.'" title="'.$strstatus.'" /><br/>'.$strstatus;
                                } else {
                                    $row[] = $strstatus;
                                }
                                // complete the empty cells
                                for ($i=0; $i < count($columns) - $nbmaincolumns; $i++) {
                                    $row[] = '&nbsp;';
                                }
                            }
                        }
                    }

                    if (!$download) {
                        $table->add_data($row);
                    } else if ($download == 'Excel' or $download == 'ODS') {
                        $colnum = 0;
                        foreach ($row as $item) {
                            $myxls->write($rownum, $colnum, $item, $format);
                            $colnum++;
                        }
                        $rownum++;
                    } else if ($download == 'CSV') {
                        $text = implode("\t", $row);
                        echo $text." \n";
                    }
                }
                if (!$download) {
                    $table->finish_output();
                    if ($candelete) {
                        echo '<table id="commands">';
                        echo '<tr><td>';
                        echo '<a href="javascript:select_all_in(\'DIV\', null, \'rscormtablecontainer\');">'.
                             get_string('selectall', 'scorm').'</a> / ';
                        echo '<a href="javascript:deselect_all_in(\'DIV\', null, \'rscormtablecontainer\');">'.
                             get_string('selectnone', 'rscorm').'</a> ';
                        echo '&nbsp;&nbsp;';
                        echo '<input type="submit" value="'.get_string('deleteselected', 'quiz_overview').'"/>';
                        echo '</td></tr></table>';
                        // Close form
                        echo '</div>';
                        echo '</form>';
                    }
                    echo '</div>';
                    if (!empty($attempts)) {
                        echo '<table class="boxaligncenter"><tr>';
                        echo '<td>';
                        echo $OUTPUT->single_button(new moodle_url($PAGE->url,
                                                                   array('download'=>'ODS') + $displayoptions),
                                                                   get_string('downloadods'));
                        echo "</td>\n";
                        echo '<td>';
                        echo $OUTPUT->single_button(new moodle_url($PAGE->url,
                                                                   array('download'=>'Excel') + $displayoptions),
                                                                   get_string('downloadexcel'));
                        echo "</td>\n";
                        echo '<td>';
                        echo $OUTPUT->single_button(new moodle_url($PAGE->url,
                                                                   array('download'=>'CSV') + $displayoptions),
                                                                   get_string('downloadtext'));
                        echo "</td>\n";
                        echo "<td>";
                        echo "</td>\n";
                        echo '</tr></table>';
                    }
                }
            } else {
                if ($candelete && !$download) {
                    echo '</div>';
                    echo '</form>';
                    $table->finish_output();
                }
                echo '</div>';
            }
            // Show preferences form irrespective of attempts are there to report or not
            if (!$download) {
                $mform->set_data(compact('detailedrep', 'pagesize', 'attemptsmode'));
                $mform->display();
            }
            if ($download == 'Excel' or $download == 'ODS') {
                $workbook->close();
                exit;
            } else if ($download == 'CSV') {
                exit;
            }
        } else {
            echo $OUTPUT->notification(get_string('noactivity', 'rscorm'));
        }
    }// function ends
}
