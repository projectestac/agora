<?php

require_once('agora_script_base.class.php');

class script_helloworld extends agora_script_base{

	public $title = 'Hello world';
	public $info = "Saluda a qui diguis";


	public function params(){
		$params = array();
		$params['name'] = "";
		return $params;
	}

	protected function _execute($params = array()){
		echo 'Hello '.$params['name'];
		return true;
	}
}