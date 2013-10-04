<?php

class com_wiris_quizzes_impl_FilePersistentVariables implements com_wiris_quizzes_impl_PersistentVariables{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$dir = $this->getDir();
		if(!$dir->exists()) {
			$dir->mkdirs();
		}
		if(!$dir->exists()) {
			throw new HException("Variable folder \"" . Std::string($dir) . "\" does not exist and can't be automatically created. Please create it with write permissions.");
		}
	}}
	public function getDir() {
		return com_wiris_system_Storage::newStorage(com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR));
	}
	public function unlockVariable($name) {
		if(com_wiris_quizzes_impl_FilePersistentVariables::$h !== null) {
			$l = com_wiris_quizzes_impl_FilePersistentVariables::$h->get($name);
			if($l !== null) {
				com_wiris_quizzes_impl_FilePersistentVariables::$h->remove($name);
				$l->release();
			}
		}
	}
	public function lockVariable($name) {
		$s = $this->getPath($name);
		$l = com_wiris_system_FileLock::getLock($s->toString());
		if(com_wiris_quizzes_impl_FilePersistentVariables::$h === null) {
			com_wiris_quizzes_impl_FilePersistentVariables::$h = new Hash();
		}
		com_wiris_quizzes_impl_FilePersistentVariables::$h->set($name, $l);
	}
	public function getPath($name) {
		return com_wiris_system_Storage::newStorageWithParent($this->getDir(), $name . ".var");
	}
	public function setVariable($name, $value) {
		$s = $this->getPath($name);
		$s->write($value);
	}
	public function getVariable($name) {
		$s = $this->getPath($name);
		if($s->exists()) {
			return $s->read();
		} else {
			return null;
		}
	}
	static $h;
	function __toString() { return 'com.wiris.quizzes.impl.FilePersistentVariables'; }
}
