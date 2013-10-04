<?php

class com_wiris_quizzes_impl_QuestionInstanceImpl extends com_wiris_util_xml_SerializableImpl implements com_wiris_quizzes_api_QuestionInstance{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
		$this->userData = new com_wiris_quizzes_impl_UserData();
		$this->userData->randomSeed = Std::random(65536);
		$this->variables = null;
		$this->checks = null;
	}}
	public function setRandomSeed($seed) {
		$this->userData->randomSeed = $seed;
	}
	public function parseTextBoolean($text) {
		$trues = new _hx_array(array("true", "cierto", "cert", "tÃµene", "ziur", "vrai", "wahr", "vero", "waar", "verdadeiro", "certo"));
		$i = null;
		{
			$_g1 = 0; $_g = $trues->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if($trues[$i1] === $text) {
					return true;
				}
				unset($i1);
			}
		}
		return false;
	}
	public function updateAnswer($qi) {
		$i = null;
		if($this->userData->answers === null) {
			$this->userData->answers = new _hx_array(array());
		}
		{
			$_g1 = 0; $_g = $qi->userData->answers->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$a = $qi->userData->answers[$i1];
				if($this->userData->answers->length > $i1) {
					$this->userData->answers[$i1] = $a;
				} else {
					$this->userData->answers->push($a);
				}
				unset($i1,$a);
			}
		}
		$this->setLocalData(com_wiris_quizzes_impl_LocalData::$KEY_CAS_SESSION, $qi->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_CAS_SESSION));
	}
	public function getStudentQuestionInstance() {
		$qi = new com_wiris_quizzes_impl_QuestionInstanceImpl();
		$qi->userData->randomSeed = 0;
		$qi->userData->answers = $this->userData->answers;
		$qi->localData = $this->localData;
		$qi->checks = $this->checks;
		return $qi;
	}
	public function getBooleanVariableValue($name) {
		if(!$this->hasVariables()) {
			return false;
		}
		$name = trim($name);
		if(StringTools::startsWith($name, "#")) {
			$name = _hx_substr($name, 1, null);
		}
		$textvars = $this->variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_TEXT);
		if($textvars->exists($name)) {
			$textValue = $textvars->get($name);
			return $this->parseTextBoolean($textValue);
		}
		$mmlvars = $this->variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_MATHML);
		if($mmlvars->exists($name)) {
			$mmlValue = $textvars->get($name);
			$striptags = new EReg("<[^>]*>", "");
			$textValue = $striptags->replace($mmlValue, "");
			$textValue = trim($textValue);
			return $this->parseTextBoolean($textValue);
		}
		return false;
	}
	public function hashToVariables($h, $a) {
		if($h === null) {
			return null;
		}
		if($a === null) {
			$a = new _hx_array(array());
		}
		$t = $h->keys();
		while($t->hasNext()) {
			$type = $t->next();
			$vars = $h->get($type);
			$names = $vars->keys();
			while($names->hasNext()) {
				$name = $names->next();
				$v = new com_wiris_quizzes_impl_Variable();
				$v->type = $type;
				$v->name = $name;
				$v->content = $vars->get($name);
				$a->push($v);
				unset($v,$name);
			}
			unset($vars,$type,$names);
		}
		return $a;
	}
	public function variablesToHash($a, $h) {
		if($a === null) {
			return null;
		}
		if($h === null) {
			$h = new Hash();
		}
		$i = null;
		{
			$_g1 = 0; $_g = $a->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$v = $a[$i1];
				if(!$h->exists($v->type)) {
					$h->set($v->type, new Hash());
				}
				$h->get($v->type)->set($v->name, $v->content);
				unset($v,$i1);
			}
		}
		return $h;
	}
	public function hashToChecks($h, $a) {
		if($h === null) {
			return null;
		}
		if($a === null) {
			$a = new _hx_array(array());
		}
		$answers = $h->keys();
		while($answers->hasNext()) {
			$answer = $answers->next();
			$a = $a->concat($h->get($answer));
			unset($answer);
		}
		return $a;
	}
	public function checksToHash($a, $h) {
		if($a === null) {
			return null;
		}
		if($h === null) {
			$h = new Hash();
		}
		$i = null;
		{
			$_g1 = 0; $_g = $a->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c = $a[$i1];
				if(!$h->exists("" . _hx_string_rec($c->getAnswer(), ""))) {
					$h->set("" . _hx_string_rec($c->getAnswer(), ""), new _hx_array(array()));
				}
				$answerChecks = $h->get("" . _hx_string_rec($c->getAnswer(), ""));
				$answerChecks->push($c);
				unset($i1,$c,$answerChecks);
			}
		}
		return $h;
	}
	public function getAnswerFeedback($q, $answer, $lang, $correct, $incorrect, $syntax, $equivalent, $check) {
		$checks = $this->checks->get(_hx_string_rec($answer, "") . "");
		$h = new com_wiris_quizzes_impl_HTMLGui($lang);
		$ass = new _hx_array(array());
		$i = null;
		{
			$_g1 = 0; $_g = $checks->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c = $checks[$i1];
				if($correct && $c->value === 1.0 || $incorrect && $c->value === 0.0) {
					if($syntax && StringTools::startsWith($c->assertion, "syntax_") || $equivalent && StringTools::startsWith($c->assertion, "equivalent_") || $check && StringTools::startsWith($c->assertion, "check_")) {
						$ass->push($c);
					}
				}
				unset($i1,$c);
			}
		}
		$html = $h->getAssertionFeedback($q, $ass);
		return $html;
	}
	public function getMatchingChecks($correctAnswer, $userAnswer) {
		$result = new _hx_array(array());
		$checks = $this->checks->get(_hx_string_rec($userAnswer, "") . "");
		$i = null;
		$eval = 0;
		$check = 0;
		{
			$_g1 = 0; $_g = $checks->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if(_hx_array_get($checks, $i1)->getCorrectAnswer() === $correctAnswer) {
					$c = $checks[$i1];
					if(StringTools::startsWith($c->assertion, "syntax_")) {
						$result->insert($eval, $checks[$i1]);
						$eval++;
						$check++;
					} else {
						if(StringTools::startsWith($c->assertion, "equivalent_")) {
							$result->insert($check, $checks[$i1]);
							$check++;
						} else {
							$result->push($checks[$i1]);
						}
					}
					unset($c);
				}
				unset($i1);
			}
		}
		return $result;
	}
	public function isAnswerSyntaxCorrect($answer) {
		$correct = true;
		$checks = $this->checks->get(_hx_string_rec($answer, "") . "");
		$i = null;
		{
			$_g1 = 0; $_g = $checks->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$ac = $checks[$i1];
				$j = null;
				{
					$_g3 = 0; $_g2 = com_wiris_quizzes_impl_Assertion::$syntactic->length;
					while($_g3 < $_g2) {
						$j1 = $_g3++;
						if($ac->assertion === com_wiris_quizzes_impl_Assertion::$syntactic[$j1]) {
							$correct = $correct && $ac->value === 1.0;
						}
						unset($j1);
					}
					unset($_g3,$_g2);
				}
				unset($j,$i1,$ac);
			}
		}
		return $correct;
	}
	public function getCompoundComponents() {
		$it = $this->compoundChecks->keys();
		$n = -1;
		while($it->hasNext()) {
			$key = $it->next();
			try {
				$m = _hx_mod(Std::parseInt($key), 1000);
				if($m > $n) {
					$n = $m;
				}
				unset($m);
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
				}
			}
			unset($key,$e);
		}
		return $n + 1;
	}
	public function normalizeGrade($g) {
		return Math::ceil($g * 100.0) / 100.0;
	}
	public function isNumberPart($c) {
		$parts = new _hx_array(array(".", "-", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"));
		$i = null;
		{
			$_g1 = 0; $_g = $parts->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if($parts[$i1] === $c) {
					return true;
				}
				unset($i1);
			}
		}
		return false;
	}
	public function getCompoundGradeDistribution($s) {
		$n = $this->getCompoundComponents();
		$d = new _hx_array(array());
		if($s === null || trim($s) === "") {
			$i = null;
			{
				$_g = 0;
				while($_g < $n) {
					$i1 = $_g++;
					$d[$i1] = 1.0 / $n;
					unset($i1);
				}
			}
		} else {
			$content = false;
			$j = 0;
			$l = haxe_Utf8::length($s);
			$i = 0;
			$sb = new StringBuf();
			while($i < $l && $j < $n) {
				$c = com_wiris_quizzes_impl_QuestionInstanceImpl_0($this, $content, $d, $i, $j, $l, $n, $s, $sb);
				$digit = $this->isNumberPart($c);
				if($digit) {
					$sb->add($c);
					$content = true;
				}
				if($content && (!$digit || $i + 1 === $l)) {
					$t = 0.0;
					try {
						$t = Std::parseFloat($sb->b);
					}catch(Exception $»e) {
						$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
						$e = $_ex_;
						{
						}
					}
					$d[$j] = $t;
					$j++;
					$sb = new StringBuf();
					$content = false;
					unset($t,$e);
				}
				$i++;
				unset($digit,$c);
			}
			while($j < $n) {
				$d[$j] = 0.0;
				$j++;
			}
			$sum = 0.0;
			{
				$_g = 0;
				while($_g < $n) {
					$j1 = $_g++;
					$sum += $d[$j1];
					unset($j1);
				}
			}
			{
				$_g = 0;
				while($_g < $n) {
					$j1 = $_g++;
					$d[$j1] = $d->»a[$j1] / $sum;
					unset($j1);
				}
			}
		}
		return $d;
	}
	public function getAnswerGrade($correctAnswer, $studentAnswer, $q) {
		$grade = 0.0;
		$question = (($q !== null) ? _hx_deref(($q))->getImpl() : null);
		if($question !== null && $question->getAssertionIndex(com_wiris_quizzes_impl_Assertion::$EQUIVALENT_FUNCTION, $correctAnswer, $studentAnswer) !== -1) {
			$grade = 1.0;
			$checks = $this->checks->get(_hx_string_rec($studentAnswer, "") . "");
			$i = null;
			{
				$_g1 = 0; $_g = $checks->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					if(_hx_array_get($checks, $i1)->getCorrectAnswer() === $correctAnswer) {
						$grade = $grade * _hx_array_get($checks, $i1)->value;
					}
					unset($i1);
				}
			}
		} else {
			if($question !== null && $question->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER) === com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE && $question->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE) === com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE) {
				$distribution = $this->getCompoundGradeDistribution($question->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION));
				$i = null;
				{
					$_g1 = 0; $_g = $distribution->length;
					while($_g1 < $_g) {
						$i1 = $_g1++;
						$checks = $this->compoundChecks->get(_hx_string_rec(1000 + $studentAnswer * 1000 + $i1, "") . "")->get(_hx_string_rec(1000 + $correctAnswer * 1000 + $i1, "") . "");
						$j = null;
						$correct = true;
						{
							$_g3 = 0; $_g2 = $checks->length;
							while($_g3 < $_g2) {
								$j1 = $_g3++;
								$correct = $correct && _hx_array_get($checks, $j1)->value === 1.0;
								unset($j1);
							}
							unset($_g3,$_g2);
						}
						if($correct) {
							$grade += $distribution[$i1];
						}
						unset($j,$i1,$correct,$checks);
					}
				}
			} else {
				$correct = $this->isAnswerMatching($correctAnswer, $studentAnswer);
				$grade = (($correct) ? 1.0 : 0.0);
			}
		}
		return $this->normalizeGrade($grade);
	}
	public function isAnswerCorrect($answer) {
		$correct = true;
		$checks = $this->checks->get(_hx_string_rec($answer, "") . "");
		$i = null;
		{
			$_g1 = 0; $_g = $checks->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$correct = $correct && _hx_array_get($checks, $i1)->value === 1.0;
				unset($i1);
			}
		}
		return $correct;
	}
	public function isAnswerMatching($correctAnswer, $answer) {
		$correct = true;
		$checks = $this->checks->get(_hx_string_rec($answer, "") . "");
		$i = null;
		{
			$_g1 = 0; $_g = $checks->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c = $checks[$i1];
				if($c->getCorrectAnswer() === $correctAnswer) {
					$correct = $correct && $c->value === 1.0;
				}
				unset($i1,$c);
			}
		}
		return $correct;
	}
	public function isCacheReady() {
		if($this->variables !== null) {
			if($this->variables->exists(com_wiris_quizzes_impl_MathContent::$TYPE_IMAGE_REF)) {
				$images = $this->variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_IMAGE_REF);
				$names = $images->keys();
				while($names->hasNext()) {
					$filename = $images->get($names->next());
					$path = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR) . "/" . $filename;
					$s = com_wiris_system_Storage::newStorage($path);
					if(!$s->exists()) {
						return false;
					}
					unset($s,$path,$filename);
				}
			}
		}
		return true;
	}
	public function hasEvaluation() {
		return $this->checks !== null && $this->checks->keys()->hasNext();
	}
	public function hasVariables() {
		return $this->variables !== null && $this->variables->keys()->hasNext();
	}
	public function clearChecks() {
		$this->checks = null;
	}
	public function clearVariables() {
		$this->variables = null;
	}
	public function getBase64Code() {
		if(com_wiris_quizzes_impl_QuestionInstanceImpl::$base64 === null) {
			com_wiris_quizzes_impl_QuestionInstanceImpl::$base64 = new com_wiris_quizzes_impl_Base64();
		}
		return com_wiris_quizzes_impl_QuestionInstanceImpl::$base64;
	}
	public function storeImageVariable($v) {
		$base64 = $this->getBase64Code();
		$value = str_replace("=", "", $v->content);
		$b = $base64->decodeBytes(haxe_io_Bytes::ofString($value));
		$filename = haxe_Md5::encode($value) . ".png";
		$path = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR) . "/" . $filename;
		$s = com_wiris_system_Storage::newStorage($path);
		if(!$s->exists()) {
			$s->writeBinary($b->b);
		}
		$w = new com_wiris_quizzes_impl_Variable();
		$w->type = com_wiris_quizzes_impl_MathContent::$TYPE_IMAGE_REF;
		$w->content = $filename;
		$w->name = $v->name;
		return $w;
	}
	public function isCompoundAnswer($rgca) {
		if($rgca->checks !== null && $rgca->checks->length > 0) {
			return _hx_array_get($rgca->checks, 0)->getCorrectAnswer() >= 1000;
		}
		return false;
	}
	public function collapseCompoundAnswerChecks($checks) {
		$this->compoundChecks = new Hash();
		$i = null;
		{
			$_g1 = 0; $_g = $checks->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c = $checks[$i1];
				$answers = $c->getAnswers();
				$j = null;
				{
					$_g3 = 0; $_g2 = $answers->length;
					while($_g3 < $_g2) {
						$j1 = $_g3++;
						if(!$this->compoundChecks->exists(_hx_string_rec($answers[$j1], "") . "")) {
							$this->compoundChecks->set(_hx_string_rec($answers[$j1], "") . "", new Hash());
						}
						$answerChecks = $this->compoundChecks->get(_hx_string_rec($answers[$j1], "") . "");
						$correctAnswers = $c->getCorrectAnswers();
						$k = null;
						{
							$_g5 = 0; $_g4 = $correctAnswers->length;
							while($_g5 < $_g4) {
								$k1 = $_g5++;
								if(!$answerChecks->exists(_hx_string_rec($correctAnswers[$k1], "") . "")) {
									$answerChecks->set(_hx_string_rec($correctAnswers[$k1], "") . "", new _hx_array(array()));
								}
								$pairchecks = $answerChecks->get(_hx_string_rec($correctAnswers[$k1], "") . "");
								$pairchecks->push($c);
								unset($pairchecks,$k1);
							}
							unset($_g5,$_g4);
						}
						unset($k,$j1,$correctAnswers,$answerChecks);
					}
					unset($_g3,$_g2);
				}
				$c->setAnswer(Math::floor(($c->getAnswer() - 1000) / 1000.0));
				$c->setCorrectAnswer(Math::floor(($c->getCorrectAnswer() - 1000) / 1000.0));
				unset($j,$i1,$c,$answers);
			}
		}
	}
	public function update($response) {
		$qs = $response;
		if($qs !== null && $qs->results !== null) {
			$variables = false;
			$checks = false;
			$i = null;
			{
				$_g1 = 0; $_g = $qs->results->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$r = $qs->results[$i1];
					$s = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getSerializer();
					$tag = $s->getTagName($r);
					if($tag === com_wiris_quizzes_impl_ResultGetVariables::$tagName) {
						if(!$variables) {
							$variables = true;
							$this->variables = null;
						}
						$rgv = $r;
						$resultVars = $rgv->variables;
						$j = null;
						{
							$_g3 = 0; $_g2 = $resultVars->length;
							while($_g3 < $_g2) {
								$j1 = $_g3++;
								$v = $resultVars[$j1];
								if($v->type === com_wiris_quizzes_impl_MathContent::$TYPE_IMAGE) {
									$resultVars[$j1] = $this->storeImageVariable($v);
								}
								unset($v,$j1);
							}
							unset($_g3,$_g2);
						}
						$this->variables = $this->variablesToHash($rgv->variables, $this->variables);
						unset($rgv,$resultVars,$j);
					} else {
						if($tag === com_wiris_quizzes_impl_ResultGetCheckAssertions::$tagName) {
							if(!$checks) {
								$checks = true;
								$this->checks = null;
							}
							$rgca = $r;
							if($this->isCompoundAnswer($rgca)) {
								$this->collapseCompoundAnswerChecks($rgca->checks);
							}
							$this->checks = $this->checksToHash($rgca->checks, $this->checks);
							unset($rgca);
						}
					}
					unset($tag,$s,$r,$i1);
				}
			}
		}
	}
	public function expandVariablesText($text) {
		if($text === null) {
			return null;
		}
		$h = new com_wiris_quizzes_impl_HTMLTools();
		if($this->variables === null || $this->variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_TEXT) === null) {
			return $text;
		} else {
			$textvars = new Hash();
			$textvars->set(com_wiris_quizzes_impl_MathContent::$TYPE_TEXT, $this->variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_TEXT));
			return $h->expandVariables($text, $textvars);
		}
	}
	public function expandVariablesMathML($equation) {
		$h = new com_wiris_quizzes_impl_HTMLTools();
		if(com_wiris_quizzes_impl_MathContent::getMathType($equation) === com_wiris_quizzes_impl_MathContent::$TYPE_TEXT) {
			$equation = $h->textToMathML($equation);
		}
		return $h->expandVariables($equation, $this->variables);
	}
	public function expandVariables($text) {
		if($text === null) {
			return null;
		}
		$h = new com_wiris_quizzes_impl_HTMLTools();
		return $h->expandVariables($text, $this->variables);
	}
	public function defaultLocalData($name) {
		if($name === com_wiris_quizzes_impl_LocalData::$KEY_CAS_SESSION) {
			return null;
		} else {
			return null;
		}
	}
	public function getLocalData($name) {
		if($this->localData !== null) {
			$i = null;
			{
				$_g1 = 0; $_g = $this->localData->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					if(_hx_array_get($this->localData, $i1)->name === $name) {
						return _hx_array_get($this->localData, $i1)->value;
					}
					unset($i1);
				}
			}
		}
		return $this->defaultLocalData($name);
	}
	public function setLocalData($name, $value) {
		if($this->localData === null) {
			$this->localData = new _hx_array(array());
		}
		$data = new com_wiris_quizzes_impl_LocalData();
		$data->name = $name;
		$data->value = $value;
		$i = null;
		$found = false;
		{
			$_g1 = 0; $_g = $this->localData->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if(_hx_array_get($this->localData, $i1)->name === $name) {
					$this->localData[$i1] = $data;
					$found = true;
				}
				unset($i1);
			}
		}
		if(!$found) {
			$this->localData->push($data);
		}
	}
	public function newInstance() {
		return new com_wiris_quizzes_impl_QuestionInstanceImpl();
	}
	public function onSerialize($s) {
		$s->beginTag(com_wiris_quizzes_impl_QuestionInstanceImpl::$tagName);
		$this->userData = $s->serializeChildName($this->userData, com_wiris_quizzes_impl_UserData::$tagName);
		$this->checks = $this->checksToHash($s->serializeArrayName($this->hashToChecks($this->checks, null), "checks"), null);
		$this->variables = $this->variablesToHash($s->serializeArrayName($this->hashToVariables($this->variables, null), "variables"), null);
		$this->localData = $s->serializeArrayName($this->localData, "localData");
		$s->endTag();
	}
	public $compoundChecks;
	public $localData;
	public $checks;
	public $variables;
	public $userData;
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
	static $tagName = "questionInstance";
	static $base64;
	function __toString() { return 'com.wiris.quizzes.impl.QuestionInstanceImpl'; }
}
function com_wiris_quizzes_impl_QuestionInstanceImpl_0(&$»this, &$content, &$d, &$i, &$j, &$l, &$n, &$s, &$sb) {
	{
		$s1 = new haxe_Utf8(null);
		$s1->addChar(haxe_Utf8::charCodeAt($s, $i));
		return $s1->toString();
	}
}
