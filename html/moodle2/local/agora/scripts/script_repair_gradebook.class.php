<?php

require_once('agora_script_base.class.php');

class script_repair_gradebook extends agora_script_base{

	public $title = 'Repair gradebook';
	public $info = "Repair gradebook with activities without gradeitems";
	public $cron = false;
	protected $test = false;

	public function params(){
		$params = array();
		$params['courseid'] = optional_param('courseid', false, PARAM_INT);
		return $params;
	}

	protected function _execute($params = array(), $execute = true){
		global $CFG, $DB;
		require_once($CFG->libdir.'/gradelib.php');
		require_once($CFG->dirroot.'/mod/assign/lib.php');
		require_once($CFG->dirroot.'/mod/assign/locallib.php');

		$courseid = $params['courseid'];

		if($courseid){
			mtrace ('Seleccionat el curs '.$courseid, '<br/>');
		    $sqlparams = array('moduletype'=>'assign','courseid'=>$courseid);
		    $sql = 'SELECT a.*, cm.idnumber as cmidnumber, a.course as courseid
		            FROM {assign} a, {course_modules} cm, {modules} m
		            WHERE m.name=:moduletype AND m.id=cm.module AND cm.instance=a.id AND a.course=:courseid';
		} else {
			$sqlparams = array('moduletype'=>'assign');
	    	$sql = 'SELECT a.*, cm.idnumber as cmidnumber, a.course as courseid
	            FROM {assign} a, {course_modules} cm, {modules} m
	            WHERE m.name=:moduletype AND m.id=cm.module AND cm.instance=a.id';
		}

	    if ($assignments = $DB->get_records_sql($sql,$sqlparams)) {
	    	$num_assign = count($assignments);
	    	mtrace("Trobats $num_assign",'<br/>');
	    	$i = 0;
			foreach ($assignments as $assign) {
	    		$sqlparams = array(
	    					'courseid'=> (int)$assign->courseid,
	    					'itemtype' => 'mod',
	    					'itemmodule' => 'assign',
	    					'iteminstance' => $assign->id,
	    					'itemnumber' => 0);
		    	if (!$grade_items = grade_item::fetch_all($sqlparams)) {
		    		$i++;
		            assign_grade_item_update($assign);
		        }
		    }
		    mtrace("Fets $i",'<br/>');
		}
		return true;
	}
}