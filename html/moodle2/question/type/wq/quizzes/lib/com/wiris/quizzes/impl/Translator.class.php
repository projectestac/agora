<?php

class com_wiris_quizzes_impl_Translator {
	public function __construct($lang, $source) {
		if(!php_Boot::$skip_constructor) {
		$this->lang = $lang;
		$this->strings = new Hash();
		$i = 0;
		while($i < $source->length && !($source[$i][0] === "lang" && $source[$i][1] === $lang)) {
			$i++;
		}
		while($i < $source->length && !($source[$i][0] === "lang" && !($source[$i][1] === $lang))) {
			$this->strings->set($source[$i][0], $source[$i][1]);
			$i++;
		}
	}}
	public function t($code) {
		if($this->strings->exists($code)) {
			$code = $this->strings->get($code);
		} else {
			if(!($this->lang === "en")) {
				$code = com_wiris_quizzes_impl_Translator::getInstance("en")->t($code);
			}
		}
		return $code;
	}
	public $lang;
	public $strings;
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
	static $languages;
	static function getInstance($lang) {
		if(com_wiris_quizzes_impl_Translator::$languages === null) {
			com_wiris_quizzes_impl_Translator::$languages = new Hash();
		}
		if(!com_wiris_quizzes_impl_Translator::$languages->exists($lang)) {
			$translator = new com_wiris_quizzes_impl_Translator($lang, com_wiris_quizzes_impl_Strings::$lang);
			if(!$translator->strings->keys()->hasNext() && !($lang === "en")) {
				return com_wiris_quizzes_impl_Translator::getInstance("en");
			}
			com_wiris_quizzes_impl_Translator::$languages->set($lang, $translator);
		}
		return com_wiris_quizzes_impl_Translator::$languages->get($lang);
	}
	function __toString() { return 'com.wiris.quizzes.impl.Translator'; }
}
