<?php

require_once('agora_script_base.class.php');

class script_bigdata extends agora_script_base{

	public $title = 'Export bigdata';
	public $info = "";
	public $cron = false;
	protected $test = false;
	public $cli = true;
	public $api = true;

	protected function _execute($params = array(), $execute = true){
		global $CFG;
		if (!file_exists($CFG->dirroot.'/local/bigdata/lib.php')) {
			return false;
		}
		require_once($CFG->dirroot.'/local/bigdata/lib.php');

		return bigdata_export();
	}

	function is_visible() {
		global $CFG;
		if (!file_exists($CFG->dirroot.'/local/bigdata/lib.php')) {
			return false;
		}
		require_once($CFG->dirroot.'/local/bigdata/lib.php');

		return bigdata_is_enabled() && parent::is_visible();
	}

}
