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
 * Internal library of functions for module jclic
 *
 * All the jclic specific functions, needed to implement the module
 * logic, should go here. Never include this file from your lib.php!
 *
 * @package    mod
 * @subpackage jclic
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/filelib.php");

    /**
    * Get an array with the languages
    *
    * @return array   The array with each language.
    */
    function jclic_get_languages(){
        $tmplanglist = get_string_manager()->get_list_of_translations();
        $langlist = array();
        foreach ($tmplanglist as $lang=>$langname) {
            if (substr($lang, -5) == '_utf8') {   //Remove the _utf8 suffix from the lang to show
                $lang = substr($lang, 0, -5);
            }
            $langlist[$lang]=$langname;
        }
        return $langlist;
    }

    /**
    * Get an array with the skins
    *
    * @return array   The array with each skin.
    */
    function jclic_get_skins(){
      return array('@default.xml' => 'default','@blue.xml' => 'blue','@orange.xml' => 'orange','@green.xml' => 'green','@simple.xml' => 'simple', '@mini.xml' => 'mini');
    }

    /**
    * Get an array with the file types
    *
    * @return array   The array with each file type
    */
    function jclic_get_file_types(){
        $filetypes =  array(JCLIC_FILE_TYPE_LOCAL => get_string('filetypelocal', 'jclic'));
        $filetypes[JCLIC_FILE_TYPE_EXTERNAL] = get_string('filetypeexternal', 'jclic');
        return $filetypes;
    }

    /**
     * Display the header and top of a page
     *
     * This is used by the view() method to print the header of view.php but
     * it can be used on other pages in which case the string to denote the
     * page in the navigation trail should be passed as an argument
     *
     * @global object
     * @param string $subpage Description of subpage to be used in navigation trail
     */
    function jclic_view_header($jclic, $cm, $course, $subpage='') {
        global $CFG, $PAGE, $OUTPUT;

        if ($subpage) {
            $PAGE->navbar->add($subpage);
        }

        //$PAGE->set_title($jclic->name);
        //$PAGE->set_heading($course->fullname);

        echo $OUTPUT->header();

        groups_print_activity_menu($cm, $CFG->wwwroot . '/mod/jclic/view.php?id=' . $cm->id);

        echo '<div class="reportlink">'.jclic_submittedlink().'</div>';
        echo '<div class="clearer"></div>';
    }


    /**
     * Display the jclic intro
     *
     */
    function jclic_view_intro($jclic, $cm) {
        global $OUTPUT;
        echo $OUTPUT->box_start('generalbox boxaligncenter', 'intro');
        echo format_module_intro('jclic', $jclic, $cm->id);
        echo $OUTPUT->box_end();
    }

    /**
     * Display the jclic dates
     *
     * Prints the jclic start and end dates in a box.
     */
    function jclic_view_dates($jclic, $cm, $timenow=null) {
        global $OUTPUT;

        if (!$jclic->timeavailable && !$jclic->timedue) {
            return;
        }

        if (is_null($timenow)) $timenow = time();

        echo $OUTPUT->box_start('generalbox boxaligncenter jclicdates', 'dates');
        if ($jclic->timeavailable) {
            echo '<div class="title-time">'.get_string('availabledate','assignment').': </div>';
            echo '<div class="data-time">'.userdate($jclic->timeavailable).'</div>';
        }
        if ($jclic->timedue) {
            echo '<div class="title-time">'.get_string('duedate','assignment').': </div>';
            echo '<div class="data-time">'.userdate($jclic->timedue).'</div>';
        }
        echo $OUTPUT->box_end();
    }

    /**
     * Display the jclic applet
     *
     */
    function jclic_view_applet($jclic, $context, $ispreview=false, $timenow=null) {
        global $OUTPUT, $PAGE, $CFG, $USER;

        if (is_null($timenow)) $timenow = time();
        $isopen = (empty($jclic->timeavailable) || $jclic->timeavailable < $timenow);
        $isclosed = (!empty($jclic->timedue) && $jclic->timedue < $timenow);
        $sessions = jclic_get_sessions($jclic->id,$USER->id);
        $attempts=sizeof($sessions);
        if ($ispreview) {
            $url = new moodle_url('/mod/jclic/view.php', array('id' => $context->instanceid));
            echo '<br><A href="'.$url.'"  >'.get_string('return_results', 'jclic').'</A>';
        } else if ( $attempts > 0 || $isopen ) {
            echo '<br><A href="#" onclick="window.open(\'action/student_results.php?id='.$context->instanceid.'\',\'JClic\',\'navigation=0,toolbar=0,resizable=1,scrollbars=1,width=700,height=400\');" >'.get_string('show_my_results', 'jclic').'</A>';
        }

        if (!$ispreview && !$isopen){
            echo $OUTPUT->box(get_string('notopenyet', 'jclic', userdate($jclic->timeavailable)), 'generalbox boxaligncenter jclicdates');
        } else if (!$ispreview && $isclosed ) {
            echo $OUTPUT->box(get_string('expired', 'jclic', userdate($jclic->timedue)), 'generalbox boxaligncenter jclicdates');
        } else {
            if ($jclic->maxattempts<0 || $attempts < $jclic->maxattempts){
              echo '<div id="jclic_applet" style="text-align:center;padding-top:10px;">';
              echo '</div>';
              $PAGE->requires->js('/mod/jclic/jclicplugin.js');
              $PAGE->requires->js('/mod/jclic/jclic.js');
              $params = get_object_vars($jclic);
              $params['jclic_url'] = jclic_get_url($jclic, $context);
              $params['jclic_path'] = jclic_get_server();
              $params['jclic_service'] = jclic_get_path().'/mod/jclic/action/beans.php';
              $params['jclic_user'] = $USER->id;
              $params['jclic_jarbase'] = $CFG->jclic_jarbase;
              $params['jclic_lap'] = $CFG->jclic_lap;
              $params['jclic_protocol'] = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https' : 'http';
              $PAGE->requires->js_init_call('M.mod_jclic.init', array($params));
            }else{
                echo $OUTPUT->box(get_string('msg_noattempts', 'jclic'), 'generalbox boxaligncenter');
            }
            jclic_view_dates($jclic, $context, $timenow);
        }
    }

    function jclic_get_url($jclic, $context){
        global $CFG;

        $url = '';
        if (jclic_is_valid_external_url($jclic->url)) {
            $url = $jclic->url;
        } else {
            $fs = get_file_storage();
            $files = $fs->get_area_files($context->id, 'mod_jclic', 'content', 0, 'sortorder DESC, id ASC', false);
            if (count($files) < 1) {
                //resource_print_filenotfound($resource, $cm, $course);
                die;
            } else {
                $file = reset($files);
                unset($files);
            }

            $path = '/'.$context->id.'/mod_jclic/content/0'.$file->get_filepath().$file->get_filename();
            $url = file_encode_url($CFG->wwwroot.'/pluginfile.php', $path, false);
        }

        return $url;
    }


    /**
     * Display the bottom and footer of a page
     *
     * This default method just prints the footer.
     * This will be suitable for most assignment types
     */
    function jclic_view_footer() {
        global $OUTPUT;
        echo $OUTPUT->footer();
    }

    /**
     * Returns a link with info about the state of the jclic attempts
     *
     * This is used by view_header to put this link at the top right of the page.
     * For teachers it gives the number of attempted jclics with a link
     * For students it gives the time of their last attempt.
     *
     * @global object
     * @global object
     * @param bool $allgroup print all groups info if user can access all groups, suitable for index.php
     * @return string
     */
    function jclic_submittedlink($allgroups=false) {
        global $USER;
        global $CFG;

        $submitted = '';
        $urlbase = "{$CFG->wwwroot}/mod/jclic/";

/*        $context = get_context_instance(CONTEXT_MODULE,$this->cm->id);
        if (has_capability('mod/jclic:grade', $context)) {
            if ($allgroups and has_capability('moodle/site:accessallgroups', $context)) {
                $group = 0;
            } else {
                $group = groups_get_activity_group($this->cm);
            }
            $submitted = 'teacher';
        } else {
            if (isloggedin()) {
                $submitted = 'student';
            }
        }
*/
        return $submitted;
    }


    /**
    * Get moodle server
    *
    * @return string                myserver.com:port
    */
    function jclic_get_server() {
        global $CFG;

        if (!empty($CFG->wwwroot)) {
            $url = parse_url($CFG->wwwroot);
        }

        if (!empty($url['host'])) {
            $hostname = $url['host'];
        } else if (!empty($_SERVER['SERVER_NAME'])) {
            $hostname = $_SERVER['SERVER_NAME'];
        } else if (!empty($_ENV['SERVER_NAME'])) {
            $hostname = $_ENV['SERVER_NAME'];
        } else if (!empty($_SERVER['HTTP_HOST'])) {
            $hostname = $_SERVER['HTTP_HOST'];
        } else if (!empty($_ENV['HTTP_HOST'])) {
            $hostname = $_ENV['HTTP_HOST'];
        } else {
            notify('Warning: could not find the name of this server!');
            return false;
        }

        if (!empty($url['port'])) {
            $hostname .= ':'.$url['port'];
        } else if (!empty($_SERVER['SERVER_PORT'])) {
            if ($_SERVER['SERVER_PORT'] != 80 && $_SERVER['SERVER_PORT'] != 443) {
                $hostname .= ':'.$_SERVER['SERVER_PORT'];
            }
        }

        return $hostname;
    }


    /**
    * Get moodle path
    *
    * @return string                /path_to_moodle
    */
    function jclic_get_path() {
        global $CFG;

            $path = '/';
        if (!empty($CFG->wwwroot)) {
            $url = parse_url($CFG->wwwroot);
                    if (array_key_exists('path', $url)){
                            $path = $url['path'];
                    }
        }
        return $path;
    }

    function jclic_get_filemanager_options(){
        $filemanager_options = array();
        $filemanager_options['return_types'] = 3;  // 3 == FILE_EXTERNAL & FILE_INTERNAL. These two constant names are defined in repository/lib.php
        $filemanager_options['accepted_types'] = 'archive';
        $filemanager_options['maxbytes'] = 0;
        $filemanager_options['subdirs'] = 0;
        $filemanager_options['maxfiles'] = 1;
        return $filemanager_options;
    }

    function jclic_set_mainfile($data) {
        $filename = null;
        $fs = get_file_storage();
        $cmid = $data->coursemodule;
        $draftitemid = $data->url;

        $context = get_context_instance(CONTEXT_MODULE, $cmid);
        if ($draftitemid) {
            file_save_draft_area_files($draftitemid, $context->id, 'mod_jclic', 'content', 0, jclic_get_filemanager_options());
        }

        $files = $fs->get_area_files($context->id, 'mod_jclic', 'content', 0, 'sortorder', false);
        if (count($files) == 1) {
            // only one file attached, set it as main file automatically
            $file = reset($files);
            file_set_sortorder($context->id, 'mod_jclic', 'content', 0, $file->get_filepath(), $file->get_filename(), 1);
            $filename = $file->get_filename();
        }
        return $filename;
    }

    function jclic_is_valid_external_url($url){
        return preg_match('/(http:\/\/|https:\/\/|www).*\/*.jclic.zip(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?$/i', $url);
    }

    function jclic_is_valid_file($filename){
        return preg_match('/.jclic.zip$/i', $filename);
    }


////////////////////////////////////////////////////////////////////////////////
// Activity sessions                                                          //
////////////////////////////////////////////////////////////////////////////////


    /**
    * Get user sessions
    *
    * @return array			[0=>session1,1=>session2...] where session1 is an array with keys: id,score,totaltime,starttime,done,solved,attempts. First sessions are newest.
    * @param object $jclicid	The jclic to get sessions
    * @param object $userid		The user id to get sessions
    */
    function jclic_get_sessions($jclicid, $userid) {
        global $CFG, $DB;

        $sessions=array();
        jclic_normalize_date();
        $sql = "SELECT js.*
                FROM {jclic} j, {jclic_sessions} js
                WHERE j.id=js.jclicid AND js.jclicid=? AND js.user_id=?
                ORDER BY js.session_datetime";
        $params = array($jclicid, $userid);

        if($rs = $DB->get_records_sql($sql, $params)){
            $i = 0;
            foreach($rs as $session){
                    $activity = jclic_get_activity($session);
                    $activity->attempts=$i+1;
                    $sessions[$i++]=$activity;
            }
        }
        return $sessions;
    }

    /**
    * Get session activities
    *
    * @return array			[0=>act0,1=>act1...] where act0 is an array with keys: activity_id,activity_name,num_actions,score,activity_solved,qualification, total_time. First activity are oldest.
    * @param string $session_id		The session id to get actitivies
    */
    function jclic_get_activities($session_id) {
        global $CFG, $DB;

        $activities = array();
        if($rs = $DB->get_records('jclic_activities', array('session_id'=>$session_id), 'activity_id')){
            $i=0;
            foreach($rs as $activity){
                $activities[$i++]=$activity;
            }
        }
        return $activities;
    }


    /**
    * Get information about activities of specified session
    *
    * @return array		Array has these keys id,score,totaltime,starttime,done,solved,attempts
    * @param object $session	The session object
    */
    function jclic_get_activity($session) {
        global $CFG, $DB;

        $activity = new stdClass();
        $activity->starttime=$session->session_datetime;
        $activity->session_id=$session->session_id;
        if($rs = $DB->get_record_sql("SELECT AVG(ja.qualification) as qualification, SUM(ja.total_time) as totaltime
                                 FROM {jclic_activities} ja
                                 WHERE ja.session_id='$session->session_id'")){
                $activity->score = round($rs->qualification,0);
                $activity->totaltime = jclic_format_time($rs->totaltime);
        }
        if ($rs = $DB->get_record_sql("SELECT COUNT(*) as done
                            FROM (SELECT DISTINCT ja.activity_name
                                  FROM  {jclic_activities} ja
                                  WHERE ja.session_id='$session->session_id') t")){
            $activity->done=$rs->done;
        }

        if ($rs = $DB->get_record_sql("SELECT COUNT(*) as solved
                                FROM (SELECT DISTINCT ja.activity_name
                                      FROM {jclic_activities} ja
                                      WHERE ja.session_id='$session->session_id' AND ja.activity_solved=1) t")){
            $activity->solved=$rs->solved;
        }

        return $activity;
    }

    /**
    * Print a table data with all session activities
    *
    * @param string $session_id The session identifier
    */
    function jclic_get_session_activities_html($session_id){
        $table_html='';

        // Import language strings
        $stractivity = get_string("activity", "jclic");
        $strsolved = get_string("solved", "jclic");
        $stractions = get_string("actions", "jclic");
        $strtime = get_string("time", "jclic");
        $strscore  = get_string("score", "jclic");
        $stryes = get_string("yes");
        $strno = get_string("no");


        // Print activities for each session
        $activities = jclic_get_activities($session_id);
        if (sizeof($activities)>0){
            $table = new html_table();
            $table->attributes = array('class'=>'jclic-activities-table');
            $table->head = array($stractivity, $strsolved, $stractions, $strtime, $strscore);
            foreach($activities as $activity){
                $act_percent=$activity->num_actions>0?round(($activity->score/$activity->num_actions)*100,0):0;
                $row = new html_table_row();
                $row->attributes = array('class' => ($activity->activity_solved?'jclic-activity-solved':'jclic-activity-unsolved') ) ;
                $row->cells = array($activity->activity_name, ($activity->activity_solved?$stryes:$strno), $activity->score.'/'.$activity->num_actions.' ('.$act_percent.'%)', jclic_time2str($activity->total_time), $activity->qualification.'%');
                $table->data[] = $row;
            }
            $table_html = html_writer::table($table);
        }
        return $table_html;
    }

    /**
     * Convert specified time (in milliseconds) to XX' YY'' format
     *
     * @param type $time time (in milliseconds) to format
     */
    function jclic_format_time($time){
        return floor($time/60)."' ".round(fmod($time,60))."''";
    }

    /**
    * Get user activity summary
    *
    * @return object	session object with score, totaltime, activities done and solved and attempts information
    */
    function jclic_get_sessions_summary($jclicid, $userid) {
        global $CFG, $DB;

        jclic_normalize_date();
        $sessions_summary = new stdClass();
        $sessions_summary->attempts = '';
        $sessions_summary->score = '';
        $sessions_summary->totaltime = '';
        $sessions_summary->starttime = '';
        $sessions_summary->done = '';
        $sessions_summary->solved = '';

        if ($rs = $DB->get_record_sql("SELECT COUNT(*) AS attempts, AVG(t.qualification) AS qualification, SUM(t.totaltime) AS totaltime, MAX(t.starttime) AS starttime
                            FROM (SELECT AVG(ja.qualification) AS qualification, SUM(ja.total_time) AS totaltime, MAX(js.session_datetime) AS starttime
                                  FROM {jclic} j, {jclic_sessions} js, {jclic_activities} ja
                                  WHERE j.id=js.jclicid AND js.user_id='$userid' AND js.jclicid=$jclicid AND ja.session_id=js.session_id
                                  GROUP BY js.session_id) t")){
                $sessions_summary->attempts=$rs->attempts;
                $sessions_summary->score=round($rs->qualification,0);
                $sessions_summary->totaltime = jclic_format_time($rs->totaltime);
                $sessions_summary->starttime=$rs->starttime;
        }

        if ($rs = $DB->get_record_sql("SELECT COUNT(*) as done
                            FROM (SELECT DISTINCT ja.activity_name
                                  FROM {jclic} j, {jclic_sessions} js, {jclic_activities} ja
                                  WHERE j.id=js.jclicid AND js.user_id='$userid' AND js.jclicid=$jclicid AND js.session_id=ja.session_id)  t")){
                $sessions_summary->done=$rs->done;
        }
        if ($rs = $DB->get_record_sql("SELECT COUNT(*) as solved
                            FROM (SELECT DISTINCT ja.activity_name
                                  FROM {jclic} j, {jclic_sessions} js, {jclic_activities} ja
                                  WHERE j.id=js.jclicid AND js.user_id='$userid' AND js.jclicid=$jclicid AND js.session_id=ja.session_id AND ja.activity_solved=1) t")){
        $sessions_summary->solved=$rs->solved;
        }
        return $sessions_summary;
    }

    /**
    * Format time from milliseconds to string
    *
    * @return string Formated string [x' y''], where x are the minutes and y are the seconds.
    * @param int $time	The time (in ms)
    */
    function jclic_time2str($time){
        return round($time/60000,0)."' ".round(fmod($time,60000)/1000,0)."''";
    }


    function jclic_print_results_table($jclic, $context, $cm, $course, $action){
        global $CFG, $DB, $OUTPUT, $PAGE;

        $PAGE->requires->js('/mod/jclic/jclic.js');

        // View all/summary sessions link
        if (isset($action) && $action != 'showall'){
            $url = new moodle_url('/mod/jclic/view.php', array('id' => $context->instanceid, 'action' => 'showall'));
            $text = get_string('showall', 'jclic');
        } else{
            $url = new moodle_url('/mod/jclic/view.php', array('id' => $context->instanceid));
            $text = get_string('hideall', 'jclic');
        }
        echo '<div id="jclic-summary-all-link" ><A href="'.$url.'" >'.$text.'</A></div>';

        // Preview link to JClic activity
        $url = new moodle_url('/mod/jclic/view.php', array('id' => $context->instanceid, 'action' => 'preview'));
        echo '<div id="jclic-preview-link" ><A href="'.$url.'"  >'.get_string('preview_jclic', 'jclic').'</A></div>';


        // Show students list with their results
        require_once($CFG->libdir.'/gradelib.php');
        $perpage = optional_param('perpage', 10, PARAM_INT);
        $perpage = ($perpage <= 0) ? 10 : $perpage ;
        $page    = optional_param('page', 0, PARAM_INT);


        /// find out current groups mode
        $groupmode = groups_get_activity_groupmode($cm);
        $currentgroup = groups_get_activity_group($cm, true);

        /// Get all ppl that are allowed to submit jclic
        list($esql, $params) = get_enrolled_sql($context, 'mod/jclic:submit', $currentgroup);
        $sql = "SELECT u.id FROM {user} u ".
               "LEFT JOIN ($esql) eu ON eu.id=u.id ".
               "WHERE u.deleted = 0 AND eu.id=u.id ";

        $users = $DB->get_records_sql($sql, $params);
        if (!empty($users)) {
            $users = array_keys($users);
        }

        // if groupmembersonly used, remove users who are not in any group
        if ($users and !empty($CFG->enablegroupmembersonly) and $cm->groupmembersonly) {
            if ($groupingusers = groups_get_grouping_members($cm->groupingid, 'u.id', 'u.id')) {
                $users = array_intersect($users, array_keys($groupingusers));
            }
        }

        // Create results table
        if (function_exists('get_extra_user_fields') ) {
            $extrafields = get_extra_user_fields($context);
        } else{
            $extrafields = array();
        }
        $tablecolumns = array_merge(array('picture', 'fullname'), $extrafields,
                array('starttime', 'attempts', 'solveddone', 'totaltime', 'grade'));

        $extrafieldnames = array();
        foreach ($extrafields as $field) {
            $extrafieldnames[] = get_user_field_name($field);
        }

        $strstarttime = ($action=='showall')?get_string('starttime', 'jclic'):get_string('lastaccess', 'jclic');

        $tableheaders = array_merge(
                array('', get_string('fullnameuser')),
                $extrafieldnames,
                array(
                    $strstarttime,
                    get_string('attempts', 'jclic'),
                    get_string('solveddone', 'jclic'),
                    get_string('totaltime', 'jclic'),
                    get_string('grade'),
                ));

        require_once($CFG->libdir.'/tablelib.php');
        $table = new flexible_table('mod-jclic-results');

        $table->define_columns($tablecolumns);
        $table->define_headers($tableheaders);
        $table->define_baseurl($CFG->wwwroot.'/mod/jclic/view.php?id='.$cm->id.'&amp;currentgroup='.$currentgroup.'&amp;action='.$action);

        $table->sortable(true, 'lastname'); //sorted by lastname by default
        $table->collapsible(true);
        $table->initialbars(true);

        $table->column_suppress('picture');
        $table->column_suppress('fullname');

        $table->column_class('picture', 'picture');
        $table->column_class('fullname', 'fullname');
        foreach ($extrafields as $field) {
            $table->column_class($field, $field);
        }

        $table->set_attribute('cellspacing', '0');
        $table->set_attribute('id', 'attempts');
        $table->set_attribute('class', 'results generaltable generalbox');
        $table->set_attribute('width', '100%');

        $table->no_sorting('starttime');
        $table->no_sorting('solveddone');
        $table->no_sorting('totaltime');
        $table->no_sorting('attempts');
        $table->no_sorting('grade');

        // Start working -- this is necessary as soon as the niceties are over
        $table->setup();

        /// Construct the SQL
        list($where, $params) = $table->get_sql_where();
        if ($where) {
            $where .= ' AND ';
        }

        if ($sort = $table->get_sql_sort()) {
            $sort = ' ORDER BY '.$sort;
        }

        $ufields = user_picture::fields('u', $extrafields);
        if (!empty($users)) {
            $select = "SELECT $ufields ";

            $sql = 'FROM {user} u '.
                   'WHERE '.$where.'u.id IN ('.implode(',',$users).') ';

            $ausers = $DB->get_records_sql($select.$sql.$sort, $params, $table->get_page_start(), $table->get_page_size());

            $table->pagesize($perpage, count($users));
            $offset = $page * $perpage; //offset used to calculate index of student in that particular query, needed for the pop up to know who's next
            if ($ausers !== false) {
                //$grading_info = grade_get_grades($course->id, 'mod', 'jclic', $jclic->id, array_keys($ausers));
                $endposition = $offset + $perpage;
                $currentposition = $offset;
                $ausersObj = new ArrayObject($ausers);
                $iterator = $ausersObj->getIterator();
                $iterator->seek($currentposition);

                  while ($iterator->valid() && $currentposition < $endposition ) {
                    $auser = $iterator->current();
                    $picture = $OUTPUT->user_picture($auser);
                    $userlink = '<a href="' . $CFG->wwwroot . '/user/view.php?id=' . $auser->id . '&amp;course=' . $course->id . '">' . fullname($auser, has_capability('moodle/site:viewfullnames', $context)) . '</a>';
                    $extradata = array();
                    foreach ($extrafields as $field) {
                        $extradata[] = $auser->{$field};
                    }

                    $sessions = array();
                    if ($action == 'showall'){
                        // Print sessions for each student
                        $sessions=jclic_get_sessions($jclic->id, $auser->id);
                        if (sizeof($sessions)>0){
                            $first_session=true;
                            foreach($sessions as $session){
                                // Print session information
                                $rowclass = null;
                                $starttime='<a href="#" onclick="showSessionActivities(\''.$session->session_id.'\');">'.date('d/m/Y H:i',strtotime($session->starttime)).'</a>';
                                $solveddone = $session->solved. ' / '. $session->done;
                                $grade = $session->score;
                                $totaltime = $session->totaltime;
                                $attempts = $session->attempts;
                                $row = array_merge(array($picture, $userlink), $extradata,
                                        array($starttime, $attempts, $solveddone, $totaltime, $grade));
                                $table->add_data($row, $rowclass);

                                // Print activities for each session
                                $html='<tr class="jclic-session-activities-hidden" id="session_'.$session->session_id.'" >';
                                $html.='<td colspan="'.(2+sizeof($extradata)).'"></td>';
                                $html.= '<td colspan="6" >';
                                $html.= jclic_get_session_activities_html($session->session_id);
                                $html.= '</td></tr>';
                                echo $html;

                                // Remove user information (only showed in the first row)
                                if ($first_session){
                                    $first_session = false;
                                    $picture = null;
                                    $userlink = null;
                                    // Remove extradata fields to show them only once
                                    foreach ($extradata as $key=>$value){
                                        $extradata[$key] = '';
                                    }
                                }
                            }
                        }
                    }

                    // Sessions summary
                    $sessions_summary = jclic_get_sessions_summary($jclic->id, $auser->id);
                    $starttime = (sizeof($sessions)>0)?get_string('totals', 'jclic'):(isset($sessions_summary->starttime)?date('d/m/Y H:i',strtotime($sessions_summary->starttime)):'-');
                    $solveddone = $sessions_summary->solved. ' / '. $sessions_summary->done;
                    $grade = $sessions_summary->score;
                    $totaltime = $sessions_summary->totaltime;
                    $attempts = $sessions_summary->attempts;
                    $row = array_merge(array($picture, $userlink), $extradata,
                            array($starttime, $attempts, $solveddone, $totaltime, $grade));
                    $rowclass = (sizeof($sessions)>0)?'summary-row':'';
                    $table->add_data($row, $rowclass);

                    // Forward iterator
                    $currentposition++;
                    $iterator->next();
                }
                $table->print_html();  /// Print the whole table
            }
        }
    }

    /**
     * Workaround to fix an Oracle's bug when inserting a row with date
     */
    function jclic_normalize_date () {
        global $CFG, $DB;
        if ($CFG->dbtype == 'oci'){
            $sql = "ALTER SESSION SET NLS_DATE_FORMAT='YYYY-MM-DD HH24:MI:SS'";
            $DB->execute($sql);
        }
    }
