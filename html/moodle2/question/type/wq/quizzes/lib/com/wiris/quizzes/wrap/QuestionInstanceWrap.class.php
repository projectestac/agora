<?php

class com_wiris_quizzes_wrap_QuestionInstanceWrap implements com_wiris_quizzes_api_QuestionInstance{
	public function __construct($instance) {
		if(!php_Boot::$skip_constructor) {
		$this->instance = $instance;
		$this->wrapper = com_wiris_system_CallWrapper::getInstance();
	}}
	public function getAssertionChecks($correctAnswer, $studentAnswer) {
		try {
			$this->wrapper->start();
			$r = $this->instance->getAssertionChecks($correctAnswer, $studentAnswer);
			$r = php_Lib::toPhpArray($r);
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
	public function getStudentAnswer($index) {
		try {
			$this->wrapper->start();
			$r = $this->instance->getStudentAnswer($index);
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
	public function setStudentAnswer($index, $answer) {
		try {
			$this->wrapper->start();
			$this->instance->setStudentAnswer($index, $answer);
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
	public function setCasSession($session) {
		try {
			$this->wrapper->start();
			$this->instance->setCasSession($session);
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
	public function setRandomSeed($seed) {
		try {
			$this->wrapper->start();
			$this->instance->setRandomSeed($seed);
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
	public function serialize() {
		try {
			$this->wrapper->start();
			$r = $this->instance->serialize();
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
	public function getStudentQuestionInstance() {
		try {
			$this->wrapper->start();
			$response = new com_wiris_quizzes_wrap_QuestionInstanceWrap($this->instance->getStudentQuestionInstance());
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
	public function getAnswerGrade($correctAnswer, $studentAnswer, $question) {
		try {
			$qw = $question;
			if($qw !== null) {
				$question = $qw->question;
			}
			$this->wrapper->start();
			$r = $this->instance->getAnswerGrade($correctAnswer, $studentAnswer, $question);
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
	public function expandVariablesText($html) {
		try {
			$this->wrapper->start();
			$r = $this->instance->expandVariablesText($html);
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
	public function expandVariablesMathML($html) {
		try {
			$this->wrapper->start();
			$r = $this->instance->expandVariablesMathML($html);
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
	public function expandVariables($html) {
		try {
			$this->wrapper->start();
			$r = $this->instance->expandVariables($html);
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
	public function isAnswerCorrect($answerIndex) {
		try {
			$this->wrapper->start();
			$r = $this->instance->isAnswerCorrect($answerIndex);
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
	public function update($response) {
		try {
			$this->wrapper->start();
			$this->instance->update($response);
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
	public $wrapper;
	public $instance;
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
	function __toString() { return 'com.wiris.quizzes.wrap.QuestionInstanceWrap'; }
}
