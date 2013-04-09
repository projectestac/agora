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
 * Internal library of functions for module qv
 *
 * All the qv specific functions, needed to implement the module
 * logic, should go here. Never include this file from your lib.php!
 *
 * @package    mod
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/filelib.php");
require_once('lib.php');

class qv{

	public $cm;
	public $context;
	public $packagefile;
	public $filetype;

	//Record
	public $id;
	public $course;
	public $name;
	public $intro;
	public $introformat;
	public $reference;
	public $skin;
	public $assessmentlang;
	public $maxdeliver;
	public $showcorrection;
	public $showinteraction;
	public $ordersections;
	public $orderitems;
	public $target;
	public $grade;
	public $width;
	public $height;
	public $timeavailable;
	public $timedue;

	const STATE_NOT_STARTED = '-1';
	const STATE_STARTED = '0';
	const STATE_DELIVERED = '1';
	const STATE_CORRECTED = '2';
	const STATE_PARTIALLY_DELIVERED = '1-';
	const STATE_PARTIALLY_CORRECTED = '2-';
	
	function load($id){
		global $DB;
		if (!$record = $DB->get_record('qv', array('id'=>$id))) {
			return false;
		}
		
		if(empty($record->reference)){
			global $CFG;
			require_once("$CFG->dirroot/mod/qv/db/upgradelib.php");
			qv_migrate_activity($record);
		}
		
		$this->load_record($record);
	}

	function load_record($record){

		$this->course = $record->course;
		$this->name = $record->name;
		$this->intro = $record->intro;
		$this->introformat = $record->introformat;
		$this->reference = $record->reference;
		$this->skin = $record->skin;
		$this->assessmentlang = $record->assessmentlang;
		$this->maxdeliver = $record->maxdeliver;
		$this->showcorrection = $record->showcorrection;
		$this->showinteraction = $record->showinteraction;
		$this->ordersections = $record->ordersections;
		$this->orderitems = $record->orderitems;
		$this->target = $record->target;
		$this->grade = $record->grade;
		$this->width = $record->width;
		$this->timeavailable = $record->timeavailable;
		$this->timedue = $record->timedue;
		
		if($record->id){
			$this->id = $record->id;
			$this->cm = get_coursemodule_from_instance('qv', $record->id);
			$this->context = context_module::instance($this->cm->id);
			
			$fs = get_file_storage();
			$files = $fs->get_area_files($this->context->id, 'mod_qv', 'package', 0, 'sortorder', false);
			if (count($files) == 1) {
				$this->packagefile = reset($files);
			} else {
				$this->filetype = QV_FILE_TYPE_EXTERNAL;
			}
		}
	}

	private function get_index_file($fs = false){
		global $DB;
		
		if(!$fs) $fs = get_file_storage();
		
		if(!$fs->get_file($this->context->id, 'mod_qv', 'content', 0, '/', $this->reference.'.xml')){
			//Repair reference
			debugging('Repair reference');
			$this->reference = extract_package($this->cm->id);
			if($this->reference){
				$DB->set_field('qv','reference',$this->reference,array('id'=>$this->id));
			}
		}
		
		return $fs->get_file($this->context->id, 'mod_qv', 'content', 0, '/html/', 'index.htm');
	}

	function get_url(){
        global $CFG;
        
        if($this->filetype == QV_FILE_TYPE_EXTERNAL) {
            return $this->reference;
        } else if($indexfile = $this->get_index_file()){
			$path = '/'.$this->context->id.'/mod_qv/content/0/'.$this->reference.$indexfile->get_filepath().$indexfile->get_filename();
			return file_encode_url($CFG->wwwroot.'/pluginfile.php', $path, false);
		} else {
			print_error('invalidqvfile','qv');
		}
		return false;
    }


	/**
    * Compose the full assessment url
    *
    * @return string	full url composed with specified params
     * 
    * @param object $assignment object with the assignment information
    * @param object $userid user identifier
    * @param object $fullname full name of the user
    * @param object $isteacher true if is teacher
    */
	function get_full_url($assignment, $userid, $fullname, $isteacher=false){
		global $CFG;
		
		if (!isset($assignment->id)) return false;

		$qv_url = $this->get_url();
		
		if(!$qv_url) return false;

		$params = array();
		$paramsnotescaped = array();
		$paramsnotescaped['server'] = $CFG->wwwroot.'/mod/qv/action/beans.php';
		$params['assignmentid'] = $assignment->id;
		$params['userid'] = $userid;
		$params['fullname'] = $fullname;
		$params['skin'] = $this->skin;
		$params['lang'] = $this->assessmentlang;
		$params['showinteraction'] = $this->showinteraction;
		$params['showcorrection'] = $this->showcorrection;
		$params['order_sections'] = $this->ordersections;
		$params['order_items'] = $this->orderitems;
		if($isteacher){
			$params['userview'] = 'teacher';
		}
		if($assignment->sectionorder>0 && $this->ordersections==1){
			$params['section_order'] = $assignment->sectionorder;
		}
		if($assignment->itemorder>0 && $this->orderitems==1){
			$params['item_order'] = $assignment->itemorder;
		}
		
		if ($this->filetype != QV_HASH_ONLINE) {
			$fs = get_file_storage();
			if(!$fs->get_file($this->context->id, 'mod_qv', 'content', 0, '/html/appl/', 'qv_local.jar'))
				$paramsnotescaped['appl'] = $CFG->qv_qvdistplugin_appl;
			if(!$fs->get_file($this->context->id, 'mod_qv', 'content', 0, '/html/css/', 'generic.css'))
				$paramsnotescaped['css'] = $CFG->qv_qvdistplugin_css;
			if(!$fs->get_file($this->context->id, 'mod_qv', 'content', 0, '/html/scripts/', 'qv_local.js'))
				$paramsnotescaped['js'] = $CFG->qv_qvdistplugin_scripts;
		} else {
			$last = strrpos($qv_url, '/html/');
			if ($last < strlen($qv_url)){
				$base_file = substr($qv_url, 0, $last+1);
				if (!qv_exists_url($base_file.'html/appl/qv_local.jar'))
					$paramsnotescaped['appl'] = $CFG->qv_qvdistplugin_appl;
				if (!qv_exists_url($base_file.'html/css/generic.css'))
					$paramsnotescaped['css'] = $CFG->qv_qvdistplugin_css;
				if (!qv_exists_url($base_file.'html/scripts/qv_local.js'))
					$paramsnotescaped['js'] = $CFG->qv_qvdistplugin_scripts;
			}
		}

		
		//Hack
		$url = new moodle_url($qv_url, $params);
		$url = $url->out(false);
		foreach ($paramsnotescaped as $key => $val) {
           $url .= '&'.$key.'='.$val;
        }
		
		return $url;
	}

	/**
     * Display the qv assessment
     *
     */
    function view_assessment($user, $isteacher=false) {
        global $OUTPUT, $PAGE;

        $timenow = time();

        $content = "";
        
        $isopen = (empty($this->timeavailable) || $this->timeavailable < $timenow);
        if (!$isopen){
			$content .= $OUTPUT->notify(get_string('notopenyet', 'qv', userdate($this->timeavailable)));
			if(!$isteacher){
				return $content;
			}
        }
        
        $isclosed = (!empty($this->timedue) && $this->timedue < $timenow);
		if ($isclosed ) {
            $content .= $OUTPUT->notify(get_string('expired', 'qv', userdate($this->timedue)));
            if(!$isteacher){
				return $content;
			}
        }
        
		$assignment = qv_get_assignment($this->id);
		$url = $this->get_full_url($assignment, $user->id, "$user->firstname%20$user->lastname", $isteacher);
		
		if ($this->target == 'self'){
			$params = array();
			$params['width'] = empty($this->width)?'99%':$this->width;
			$params['height'] = empty($this->height)?'400px':$this->height;
			$params['title'] = get_string('modulenameplural', 'qv');
			$params['src'] = $url;
			$params['id'] = 'qv_applet';
			$content .= html_writer::tag('iframe',"",$params);
		} else {
			$params = array();
			$params['toolbar'] = 'no';
			$params['status'] =  'no';
			$params['location'] =  'no';
			$params['menubar'] =  'no';
			$params['copyhistory'] =  'no';
			$params['directories'] =  'no';
			
			$params['scrollbars'] = 'yes';
			$params['resizable'] = 'yes';
			$params['width'] = $this->width;
			$params['height'] = $this->height;
			$fullscreen = empty($this->width)||$this->width=='100%'||empty($this->height) ? 'true':'false';
			
			//One more hack
			$attributes = array();
			$attributes['href'] = $url;
			$win_param = array();
			foreach($params as $key=>$value){
				$win_param[] = "$key=$value";
			}
			$onclick = 'return openQV("'.$url.'","'.implode(',',$win_param).'",'.$fullscreen.');';
			$attributes['onclick'] = $onclick;
			$PAGE->requires->js('/mod/qv/qv.js');
			$content .= html_writer::tag('a',get_string('start', 'qv'),$attributes);

			//In moodle it should be like that but this make QV not work
			//$action = new popup_action('click', $url, 'popup', $params);
			//$content .= $OUTPUT->action_link($url, get_string('start', 'qv'), $action);
						
		}
		$content .= $this->view_dates();
		
		if($isteacher){
			$url = new moodle_url('/mod/qv/view.php', array('id' => $this->context->instanceid));
            $content .= $OUTPUT->box(html_writer::link($url->out(false), get_string('return_results', 'qv')));
		}
		
		return $content;
    }

	function print_results_table($course, $action){
        global $CFG, $DB, $OUTPUT, $PAGE;
        
        // Preview link to QV activity
        $url = new moodle_url('/mod/qv/view.php', array('id' => $this->context->instanceid, 'action' => 'preview'));
        echo $OUTPUT->box('<a href="'.$url.'"  >'.get_string('preview', 'qv').'</a>','','qv-preview-link');

        // Show students list with their results
        require_once($CFG->libdir.'/gradelib.php');
        $perpage = optional_param('perpage', 10, PARAM_INT);
        $perpage = ($perpage <= 0) ? 10 : $perpage ;
        $page    = optional_param('page', 0, PARAM_INT);

        /// find out current groups mode
        $groupmode = groups_get_activity_groupmode($this->cm);
        $currentgroup = groups_get_activity_group($this->cm, true);

        /// Get all ppl that are allowed to submit qv
        list($esql, $params) = get_enrolled_sql($this->context, 'mod/qv:submit', $currentgroup); 
        $sql = "SELECT u.id FROM {user} u ".
               "LEFT JOIN ($esql) eu ON eu.id=u.id ".
               "WHERE u.deleted = 0 AND eu.id=u.id ";

        $users = $DB->get_records_sql($sql, $params);
        if (!empty($users)) {
            $users = array_keys($users);
        }

        // if groupmembersonly used, remove users who are not in any group
        if ($users and !empty($CFG->enablegroupmembersonly) and $this->cm->groupmembersonly) {
            if ($groupingusers = groups_get_grouping_members($this->cm->groupingid, 'u.id', 'u.id')) {
                $users = array_intersect($users, array_keys($groupingusers));
            }
        }

        // Create results table
        if (function_exists('get_extra_user_fields') ) {
            $extrafields = get_extra_user_fields($this->context);
        } else{
            $extrafields = array();
        }
        $tablecolumns = array_merge(array('picture', 'fullname'), $extrafields,
                array('state', 'unread', 'grade', 'delivers', 'time', 'actions'));

        $extrafieldnames = array();
        foreach ($extrafields as $field) {
            $extrafieldnames[] = get_user_field_name($field);
        }
        
        $tableheaders = array_merge(
                array('', get_string('fullnameuser')),
                $extrafieldnames,
                array(
                    get_string('state', 'qv'),
                    get_string('unread', 'qv'),
                    get_string('score', 'qv'),
                    get_string('delivers', 'qv'),
                    get_string('time'),
                    '&nbsp;',
                ));

        require_once($CFG->libdir.'/tablelib.php');
        $table = new flexible_table('mod-qv-results');

        $table->define_columns($tablecolumns);
        $table->define_headers($tableheaders);
        $table->define_baseurl($CFG->wwwroot.'/mod/qv/view.php?id='.$this->cm->id.'&amp;currentgroup='.$currentgroup.'&amp;action='.$action);

        $table->sortable(true, 'lastname'); //sorted by lastname by default
        $table->collapsible(true);
        $table->initialbars(true);

        $table->column_suppress('picture');
        $table->column_suppress('fullname');

        foreach ($tablecolumns as $field) {
            $table->column_class($field, $field);
        }

        $table->set_attribute('cellspacing', '0');
        $table->set_attribute('id', 'qv_attempts');
        $table->set_attribute('class', 'results generaltable generalbox');
        $table->set_attribute('width', '100%');

        $table->no_sorting('state'); 
        $table->no_sorting('unread'); 
        $table->no_sorting('grade'); 
        $table->no_sorting('delivers'); 
        $table->no_sorting('time'); 
        $table->no_sorting('actions'); 

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
                //$grading_info = grade_get_grades($course->id, 'mod', 'qv', $qv->id, array_keys($ausers));
                $endposition = $offset + $perpage;
                $currentposition = $offset;
                $ausersObj = new ArrayObject($ausers);
                $iterator = $ausersObj->getIterator();
                $iterator->seek($currentposition);

                  while ($iterator->valid() && $currentposition < $endposition ) {
                    $auser = $iterator->current();
                    $picture = $OUTPUT->user_picture($auser);
                    $student_name = fullname($auser, has_capability('moodle/site:viewfullnames', $this->context));
                    $userlink = '<a href="' . $CFG->wwwroot . '/user/view.php?id=' . $auser->id . '&amp;course=' . $course->id . '">' . $student_name . '</a>';
                    $extradata = array();
                    foreach ($extrafields as $field) {
                        $extradata[] = $auser->{$field};
                    } 
                    
                    $assignment_summary = qv_get_assignment_summary($this->id, $auser->id);
                    $qv_full_url = $this->get_full_url($assignment_summary, $auser->id, $student_name, true);
					
                    if(!empty($qv_full_url)){
						$params = array();
						$params['status'] = 0;
						$params['toolbar'] = 0;
						$params['scrollbars'] = 1;
						$params['resizable'] = 1;
						$params['fullscreen'] = 1;

						$action = new popup_action('click', $qv_full_url, 'popup', $params);
						$student_info = $OUTPUT->action_link($qv_full_url, $student_name, $action);
					} else {
						$student_info = $student_name; //Albert
					}
					
                    $states = qv_print_states($assignment_summary->states);
                    if (isset($assignment_summary->id)){
						$unread_messages = qv_assignment_messages($assignment_summary->id);
						if($unread_messages > 0){
							$unread_messages .= $OUTPUT->pix_icon('qv_msg_notread', get_string('msg_not_read', 'qv'), 'mod_qv');
						}
					}
                    else $unread_messages = 0;
                    
                    $viewlink = '';
                    if (!empty($assignment_summary->id)){
						$viewlink = html_writer::link($qv_full_url, get_string('view'), array('target'=>'_blank'));
                    }
                    $row = array_merge(array($picture, $userlink), $extradata,
                            array($states, $unread_messages, $assignment_summary->pending_score, $assignment_summary->attempts, $assignment_summary->time, $viewlink));
                    $table->add_data($row);
                    
                    // Forward iterator
                    $currentposition++;
                    $iterator->next();
                }
                $table->print_html();  /// Print the whole table

				echo '<hr/>';
				// states legend
				$legendtable = new html_table();
				$legendtable->width='40%';
				$legendtable->fontsize='0.6em';
				$legendtable->cellspacing='0';
				$legendtable->data[] = array (
					qv_print_state_icon(qv::STATE_NOT_STARTED),
					qv_print_state_icon(qv::STATE_DELIVERED),
					qv_print_state_icon(qv::STATE_CORRECTED));
				$legendtable->data[] = array (
					qv_print_state_icon(qv::STATE_STARTED),
					qv_print_state_icon(qv::STATE_PARTIALLY_DELIVERED),
					qv_print_state_icon(qv::STATE_PARTIALLY_CORRECTED));
				echo html_writer::table($legendtable);
            }
        }        
    }

	/**
     * Display the qv dates
     *
     * Prints the qv start and end dates in a box.
     */
    function view_dates() {
        global $OUTPUT;
        
        if (!$this->timeavailable && !$this->timedue) {
            return "";
        }

        $content = $OUTPUT->box_start('generalbox boxaligncenter qvdates', 'dates');
        if ($this->timeavailable) {
			$content .= $OUTPUT->box(get_string('availabledate','assignment'),'title-time');
            $content .=  $OUTPUT->box(userdate($this->timeavailable),'data-time');
        }
        if ($this->timedue) {
            $content .=  $OUTPUT->box(get_string('duedate','assignment'),'title-time');
            $content .=  $OUTPUT->box(userdate($this->timedue),'data-time');
        }
        $content .=  $OUTPUT->box_end();
        return $content;
    }
    
}


class qv_package_file_info extends file_info_stored {
    public function get_parent() {
        if ($this->lf->get_filepath() === '/' and $this->lf->get_filename() === '.') {
            return $this->browser->get_file_info($this->context);
        }
        return parent::get_parent();
    }
    public function get_visible_name() {
        if ($this->lf->get_filepath() === '/' and $this->lf->get_filename() === '.') {
            return $this->topvisiblename;
        }
        return parent::get_visible_name();
    }
}


/*** MOD FORM FUNCTIONS
/**
* Get an array with the skins
*
* @return array   The array with each skin.
*/
function qv_get_skins(){
  global $CFG;
  return explode(',', $CFG->qv_skins);
} 

/**
* Get an array with the file types
*
* @return array   The array with each file type
*/
function qv_get_file_types(){
	$filetypes =  array(
			QV_FILE_TYPE_LOCAL => get_string('filetypelocal', 'qv'),
			QV_FILE_TYPE_EXTERNAL => get_string('filetypeexternal', 'qv')
		);
	return $filetypes;
}    


function qv_get_filemanager_options(){
	$filemanager_options = array();
	$filemanager_options['return_types'] = 3;  // 3 == FILE_EXTERNAL & FILE_INTERNAL. These two constant names are defined in repository/lib.php
	$filemanager_options['accepted_types'] = 'archive';
	$filemanager_options['maxbytes'] = 0;
	$filemanager_options['subdirs'] = 0;
	$filemanager_options['maxfiles'] = 1;
	return $filemanager_options;
}

function qv_save_package($data) {

	$fs = get_file_storage();
	$cmid = $data->coursemodule;
	$draftitemid = $data->reference;

	$context = context_module::instance($cmid);
	if ($draftitemid) {
		file_save_draft_area_files($draftitemid, $context->id, 'mod_qv', 'package', 0, qv_get_filemanager_options());
	}
	
	$reference = extract_package($cmid);
	
	return $reference;
}

/**
 * Extracts QV package, sets up all variables.
 * Called whenever qv changes
 * @param int $cmid 
 * @param bool $force_extract force full update if true
 * @return void
 */
function extract_package($cmid){
	global $DB;
	
	$fs = get_file_storage();
	$context = context_module::instance($cmid);
	$files = $fs->get_area_files($context->id, 'mod_qv', 'package', 0, 'sortorder', false);
	if (count($files) == 1) {
		// only one file attached, set it as main file automatically
		$package = reset($files);
		file_set_sortorder($context->id, 'mod_qv', 'package', 0, $package->get_filepath(), $package->get_filename(), 1);
		
		$packagename = qv_get_package_name($cmid, $fs);
		//Content out of date or updating on demand
		if($packagename){
			return $packagename;
		} else {
			// now extract files
			$fs->delete_area_files($context->id, 'mod_qv', 'content');

			$packer = get_file_packer('application/zip');
			$package->extract_to_storage($packer, $context->id, 'mod_qv', 'content', 0, '/');

			$packagename = qv_get_package_name($cmid, $fs);
			if($packagename){
				return $packagename;
			}
		}
	}
	return false;
}

function qv_get_package_name($cmid, $fs = false){
	if(!$fs) $fs = get_file_storage();
	$context = context_module::instance($cmid);
	$files = $fs->get_area_files($context->id, 'mod_qv', 'content', 0, 'filepath, filename', false);
	foreach($files as $file){
		if($file->get_filepath() == '/' && $file->get_mimetype() == 'application/xml'){
			$filename = $file->get_filename();
			if($filename != 'imsmanifest.xml'){
				return basename($filename, '.xml');
			}
		}
	}
	return false;
}



        
function qv_is_valid_external_url($url){
	return preg_match('/(http:\/\/|https:\/\/|www).*\/*(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?$/i', $url);
}
    
    
////////////////////////////////////////////////////////////////////////////////
// Activity sessions                                                          //
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * Returns an object to represent a user assignment to an assessment.
    * If the ->id field is not set, then the object is written to the database.
    *
    * @return object           The assignment object.
    * @param object $qv        The assessment to get an assignment for.
    */
    function qv_get_assignment($qvid) {
        global $USER, $DB;
        
        if (!$assignment = $DB->get_record('qv_assignments', array('qvid'=>$qvid, 'userid'=>$USER->id))){
            srand(time());
            $assignment = new stdClass();
            $assignment->qvid = $qvid;
            $assignment->userid = $USER->id;
            $assignment->idnumber = '';
            $assignment->sectionorder = rand(1, 80);
            $assignment->itemorder = rand(1, 80);

            $assignment->id = $DB->insert_record('qv_assignments', $assignment);
            // TODO: update gradebook functions 
            //if (isset($assignment)) qv_update_gradebook(null, $qv);	
        }
        return $assignment;
    }
    
    /**
    * Get user assignment summary
    *
    * @return object	assignment object with state, score and deliver information
    * @param object $qvid    The assessment identifier.
    * @param object $userid  The userid identifier.
    */
    function qv_get_assignment_summary($qvid, $userid) {
        global $CFG, $DB;

        $states = array(
			qv::STATE_NOT_STARTED=>0,
			qv::STATE_STARTED=>0,
			qv::STATE_DELIVERED=>0,
			qv::STATE_CORRECTED=>0,
			'state' => qv::STATE_NOT_STARTED);
        $score = 0;
        $pending_score = 0;//A
        $attempts = 0;
        $time = '00:00:00';//Albert

        $assignment_summary = new stdClass();
        if ($qv_assignment = $DB->get_record('qv_assignments', array('qvid'=> $qvid, 'userid'=>$userid))){
            if ($qv_sections = $DB->get_records('qv_sections', array('assignmentid'=>$qv_assignment->id))){
				
                foreach($qv_sections as $qv_section){
                    $section_summary = qv_get_section_summary($qv_section);
                    
                    $score += $section_summary->score;
                    $pending_score += $section_summary->pending_score;//A

                    $time = qv_add_time($time, $qv_section->time); //Albert

                    if ($section_summary->attempts > $attempts){
                        $attempts = $section_summary->attempts;
                    }
                    // States
                    $states[$qv_section->state]++;
                }

                $num_sections = count($qv_sections);
                // State
                
                if ($states[qv::STATE_CORRECTED] == $num_sections) $state = qv::STATE_CORRECTED;
                else if ($states[qv::STATE_DELIVERED] == $num_sections) $state = qv::STATE_DELIVERED;
                else if ($states[qv::STATE_STARTED] == $num_sections) $state = qv::STATE_STARTED;
                else if ($states[qv::STATE_DELIVERED] > 0) $state = qv::STATE_PARTIALLY_DELIVERED;
                else if ($states[qv::STATE_STARTED] > 0) $state = qv::STATE_PARTIALLY_CORRECTED;
                else $state = qv::STATE_NOT_STARTED;
                
                $states['state'] = $state;
            }
            
            $assignment_summary->id = $qv_assignment->id;
            $assignment_summary->sectionorder = $qv_assignment->sectionorder;//Albert
            $assignment_summary->itemorder = $qv_assignment->itemorder;//Albert
        }
        
        $assignment_summary->score = $score;
        $assignment_summary->pending_score = $pending_score;//A
        $assignment_summary->attempts = $attempts;
        $assignment_summary->states = $states;
        $assignment_summary->time = $time;//Albert

        return $assignment_summary;
    }
    
    /**
    * Get user section assignment summary
    *
    * @return object	section object with state, score and attempts information.
    * @param object $qv_section    The section object to get summary information.
    */
    function qv_get_section_summary($qv_section){
		// Score
		$start = strpos($qv_section->scores, $qv_section->sectionid.'_score=');
		$section_summary = new stdClass();
		if ($start>=0){
			$start += strlen($qv_section->sectionid.'_score=');
			$length = strpos(substr($qv_section->scores, $start+1), '#')+1;
			$section_summary->score = substr($qv_section->scores, $start, $length);
		}
		// Pending Score
		$start2 = strpos($qv_section->pending_scores, $qv_section->sectionid.'_score=');
		if ($start2>=0){
			$start2 += strlen($qv_section->sectionid.'_score=');
			$length2 = strpos(substr($qv_section->pending_scores, $start2+1), '#')+1;
			$section_summary->pending_score = substr($qv_section->pending_scores, $start2, $length2);
		}

		// Attempts
		$section_summary->attempts = $qv_section->attempts;
		return $section_summary;
    }

    /**
    * Check if exists specified url
    *
    * @return boolean           True if the specified URL exists; otherwise false.
    * @param string $url        The url
    */
    function qv_exists_url($url){
        $exists=false;
        if (substr($url, 0, 4)!='http') {
          $exists = (@fopen($url,"r"))?true:false;
        }
        return $exists;
    }    
    
    /**
    * Print QV states.
    *
    * @return string                HTML code to print the state of a qv activity.
    * @param array $states          The array with all qv states (and true or false for each one).
    */
    function qv_print_states($states){
        $statesimg = "";
        if(is_array($states)){
			if($states['state'] == qv::STATE_NOT_STARTED){
				$statesimg .= qv_print_state_icon(qv::STATE_NOT_STARTED,false);
			} else{
				if($states[qv::STATE_STARTED] > 0){
					$statesimg .= qv_print_state_icon(qv::STATE_STARTED,false);
				}

				if($states[qv::STATE_DELIVERED] > 0){
					if($states['state'] == qv::STATE_DELIVERED && $states[qv::STATE_STARTED] == 0 && $states[qv::STATE_NOT_STARTED] == 0){
						$statesimg .= qv_print_state_icon(qv::STATE_DELIVERED,false);
					} else {
						$statesimg .= qv_print_state_icon(qv::STATE_PARTIALLY_DELIVERED,false);
					}
				}

				if($states[qv::STATE_CORRECTED] > 0){
					if($states['state'] == qv::STATE_CORRECTED && $states[qv::STATE_STARTED] == 0 && $states[qv::STATE_NOT_STARTED] == 0){
						$statesimg .= qv_print_state_icon(qv::STATE_CORRECTED,false);
					} else {
						$statesimg .= qv_print_state_icon(qv::STATE_PARTIALLY_CORRECTED,false);
					}
				}
			}
		}
        
        if (empty($statesimg)) return qv_print_state_icon(qv::STATE_NOT_STARTED,false);
        return $statesimg;
    }


	function qv_print_state_icon($state, $text=true){
		global $OUTPUT;
		
		switch($state){
			case qv::STATE_NOT_STARTED:
				$title  = get_string('statenotstarted', 'qv');
				$pix = 'qv_state_not_started';
				break;
			case qv::STATE_STARTED:
				$title  = get_string('statestarted', 'qv');
				$pix = 'qv_state_started';
				break;
			case qv::STATE_DELIVERED:
				$title  = get_string('statedelivered', 'qv');
				$pix = 'qv_state_delivered';
				break;
			case qv::STATE_CORRECTED:
				$title  = get_string('statecorrected', 'qv');
				$pix = 'qv_state_corrected';
				break;
			case qv::STATE_PARTIALLY_DELIVERED:
				$title  = get_string('statepartiallydelivered', 'qv');
				$pix = 'qv_state_part_delivered';
				break;
			case qv::STATE_PARTIALLY_CORRECTED:
				$title  = get_string('statepartiallycorrected', 'qv');
				$pix = 'qv_state_part_corrected';
				break;
			default:
				return "";
		}
		
		if($text){
			return  $OUTPUT->pix_icon($pix, '','mod_qv').$title;
		} else {
			return $OUTPUT->pix_icon($pix, $title,'mod_qv');
		}
	}   
 
    /**
     * Workaround to fix an Oracle's bug when inserting a row with date
     */
    function qv_normalize_date () {
        global $CFG, $DB;
        if ($CFG->dbtype == 'oci'){
            $sql = "ALTER SESSION SET NLS_DATE_FORMAT='YYYY-MM-DD HH24:MI:SS'";
            $DB->execute($sql);                        
        } 
    } 

    
    function qv_add_time($time1, $time2){//Albert
		$h1 = (int)substr($time1,0,2);
		$m1 = (int)substr($time1,3,5);
		$s1 = (int)substr($time1,6,8);
		$h2 = (int)substr($time2,0,2);
		$m2 = (int)substr($time2,3,5);
		$s2 = (int)substr($time2,6,8);

		$s3 = $s1+$s2;
		$m3 = $m1+$m2;
		$h3 = $h1+$h2;

		if ($s3>59){
				$s3-= 60;
				$m3++;
		}
		if ($m3>59){
				$m3 -= 60;
				$h3++;
		}

		$s4 = "";
		if ($s3<10){
			$s4 = "0".$s3;
		} else {
			$s4 = $s3."";
		}
		$m4 = "";
		if ($m3<10){
				$m4 = "0".$m3;
		} else {
				$m4 = $m3."";
		}
		$h4 = "";
		if ($h3<10){
				$h4 = "0".$h3;
		} else {
				$h4 = $h3."";
		}

		return $h4.":".$m4.":".$s4;
    }

    function qv_assignment_messages($assignmentid){
        global $USER, $DB;
        $params = array('assignmentid'=>$assignmentid, 'userid'=> $USER->id, 'userid2'=> $USER->id);
        return $DB->count_records_sql('SELECT COUNT(*)
                FROM {qv_sections} s, {qv_messages} m
					WHERE s.id = m.sid AND s.assignmentid = :assignmentid
						AND (m.sid NOT IN (SELECT mr.sid FROM {qv_messages_read} mr WHERE mr.userid = :userid)
						OR m.created>(SELECT MAX(timereaded) FROM {qv_messages_read} mr WHERE mr.userid = :userid2 ))',$params);
    }
    


