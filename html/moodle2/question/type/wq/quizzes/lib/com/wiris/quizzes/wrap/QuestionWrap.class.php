<?php

class com_wiris_quizzes_wrap_QuestionWrap implements com_wiris_quizzes_api_Question{
	public function __construct($question) {
		if(!php_Boot::$skip_constructor) {
		$this->question = $question;
		$this->wrapper = com_wiris_quizzes_wrap_Wrapper::getInstance();
	}}
	public function serialize() {
		try {
			$this->wrapper->start();
			$r = $this->question->serialize();
			$this->wrapper->stop();
			return $r;
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$this->wrapper->stop();
				throw new HException($e);
			}
		}
	}
	public function addAssertion($name, $correctAnswer, $studentAnswer, $parameters) {
		try {
			$this->wrapper->start();
			$this->question->addAssertion($name, $correctAnswer, $studentAnswer, $parameters);
			$this->wrapper->stop();
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$this->wrapper->stop();
				throw new HException($e);
			}
		}
	}
	public function getStudentQuestion() {
		try {
			$this->wrapper->start();
			$response = new com_wiris_quizzes_wrap_QuestionWrap($this->question->getStudentQuestion());
			$this->wrapper->stop();
			return $response;
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$this->wrapper->stop();
				throw new HException($e);
			}
		}
	}
	public $wrapper;
	public $question;
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
	function __toString() { return 'com.wiris.quizzes.wrap.QuestionWrap'; }
}
