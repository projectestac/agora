<?php

class com_wiris_util_sys_HttpProxy {
	public function __construct($host, $port) {
		if(!php_Boot::$skip_constructor) {
		$this->port = $port;
		$this->host = $host;
		$this->auth = null;
	}}
	public $auth;
	public $host;
	public $port;
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
	function __toString() { return 'com.wiris.util.sys.HttpProxy'; }
}
