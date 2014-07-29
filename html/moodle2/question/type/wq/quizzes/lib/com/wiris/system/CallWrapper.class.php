<?php

class com_wiris_system_CallWrapper {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->isRunning = false;
	}}
	public function autoload($className) {
		if(function_exists('__autoload')) {
			__autoload($className);
		}
	}
	public function phpStop() {
		spl_autoload_unregister('_hx_autoload');
		spl_autoload_register(array($this, 'autoload'));
		restore_exception_handler();
		restore_error_handler();
		error_reporting($this->errorReportingLevel);
	}
	public function setErrorReporting($level) {
		$this->errorReportingLevel = $level;
	}
	public function phpStart() {
		$this->errorReportingLevel = error_reporting(E_ALL & ~E_STRICT);
		set_error_handler('_hx_error_handler', E_ALL);
		set_exception_handler('_hx_exception_handler');
		spl_autoload_register('_hx_autoload');
	}
	public function stop() {
		if($this->isRunning) {
			$this->isRunning = false;
			$this->phpStop();
		}
	}
	public function start() {
		if(!$this->isRunning) {
			$this->isRunning = true;
			$this->phpStart();
		}
	}
	public $errorReportingLevel;
	public $isRunning;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $wrapper;
	static function getInstance() {
		if(com_wiris_system_CallWrapper::$wrapper === null) {
			com_wiris_system_CallWrapper::$wrapper = new com_wiris_system_CallWrapper();
		}
		return com_wiris_system_CallWrapper::$wrapper;
	}
	function __toString() { return 'com.wiris.system.CallWrapper'; }
}
