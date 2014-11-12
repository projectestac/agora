<?php

class agora_script_base{

	public $title = 'No title';
	public $info = "";

	public function params() {
		$params = array();
		return $params;
	}

	function execute() {
		if ($this->can_be_executed()) {
			$starttime = microtime();

			echo $this->title."\n";

			$params = $this->get_request_params();
			$return  = $this->_execute($params);

			$difftime = self::microtime_diff($starttime, microtime());

			echo "\n"."Execution took ".$difftime." seconds\n";

			return $return;
		}
		return false;
	}

	private function get_request_params(){
		$params = $this->params();
		foreach ($params as $paramname => $unused) {
			if ($value = get_cli_arg($paramname)) {
				$params[$paramname] = $value;
			}
		}
		return $params;
	}

	private static function microtime_diff($a, $b) {
	    list($adec, $asec) = explode(' ', $a);
	    list($bdec, $bsec) = explode(' ', $b);
	    return $bsec - $asec + $bdec - $adec;
	}


	protected function _execute($params = array()) {
		return false;
	}

	protected function can_be_executed($params = array()) {
		return true;
	}
}