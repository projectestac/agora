<?php

class com_wiris_system_FileLock {
	public function __construct($lh, $filename) {
		if(!php_Boot::$skip_constructor) {
		$this->lh = $lh;
		$this->filename = $filename;
	}}
	public function release() {
		flock($this->lh, LOCK_UN);
		try {
			@fclose($this->lh);
			@unlink($this->filename);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
			}
		}
	}
	public $filename;
	public $lh;
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
	static $TIMEOUT = 5000;
	static $WAIT = 100;
	static function getLock($file) {
		return com_wiris_system_FileLock::getLockImpl($file, com_wiris_system_FileLock::$TIMEOUT);
	}
	static function getLockImpl($file, $remaining) {
		$startwait = haxe_Timer::stamp();
		try {
			$lockfile = $file . ".lock";
			$lh = fopen($lockfile, "w+");
			if(!flock($lh, LOCK_EX)) {
				throw new HException("Could not acquire lock to file " . $file);
			}
			return new com_wiris_system_FileLock($lh, $lockfile);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				if($remaining < 0) {
					throw new HException($e);
				}
				usleep(100);
				$actualwait = (haxe_Timer::stamp() - $startwait) * 1000;
				return com_wiris_system_FileLock::getLockImpl($file, $remaining - $actualwait);
			}
		}
		return new com_wiris_system_FileLock(null, null);
	}
	function __toString() { return 'com.wiris.system.FileLock'; }
}
