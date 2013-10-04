<?php

class com_wiris_quizzes_impl_QuestionImpl extends com_wiris_quizzes_impl_QuestionInternal implements com_wiris_quizzes_api_Question{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public function importDeprecated() {
		if($this->assertions !== null) {
			$i = null;
			{
				$_g1 = 0; $_g = $this->assertions->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$a = $this->assertions[$i1];
					if($a->name === com_wiris_quizzes_impl_Assertion::$EQUIVALENT_SET) {
						$a->name = com_wiris_quizzes_impl_Assertion::$EQUIVALENT_SYMBOLIC;
						$a->setParam(com_wiris_quizzes_impl_Assertion::$PARAM_ORDER_MATTERS, "false");
						$a->setParam(com_wiris_quizzes_impl_Assertion::$PARAM_REPETITION_MATTERS, "false");
					}
					if($a->name === com_wiris_quizzes_impl_Assertion::$SYNTAX_LIST) {
						$a->name = com_wiris_quizzes_impl_Assertion::$EQUIVALENT_SYMBOLIC;
						$a->setParam(com_wiris_quizzes_impl_Assertion::$PARAM_NO_BRACKETS_LIST, "true");
					}
					unset($i1,$a);
				}
			}
		}
	}
	public function isDeprecated() {
		if($this->assertions !== null) {
			$i = null;
			{
				$_g1 = 0; $_g = $this->assertions->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$a = $this->assertions[$i1];
					if($a->name === com_wiris_quizzes_impl_Assertion::$EQUIVALENT_SET || $a->name === com_wiris_quizzes_impl_Assertion::$SYNTAX_LIST) {
						return true;
					}
					unset($i1,$a);
				}
			}
		}
		return false;
	}
	public function getImpl() {
		return $this;
	}
	public function hasId() {
		return $this->id !== null && strlen($this->id) > 0;
	}
	public function getGrammarUrl($studentAnswer) {
		$prefix = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL);
		$prefix .= "/grammar/";
		$i = null;
		if($this->assertions !== null) {
			$_g1 = 0; $_g = $this->assertions->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$a = $this->assertions[$i1];
				if($a->getAnswer() === $studentAnswer && $a->isSyntactic()) {
					return $prefix . com_wiris_quizzes_impl_QuestionImpl::syntacticAssertionToURL($a);
				}
				unset($i1,$a);
			}
		}
		return $prefix . "Expression";
	}
	public function addAssertion($name, $correctAnswer, $studentAnswer, $parameters) {
		$this->setParametrizedAssertion($name, $correctAnswer, $studentAnswer, $parameters);
	}
	public function isEquivalent($q) {
		$te = com_wiris_quizzes_impl_HTMLTools::emptyCasSession($this->wirisCasSession);
		$qe = com_wiris_quizzes_impl_HTMLTools::emptyCasSession($q->wirisCasSession);
		if($te && !$qe || !$te && $qe) {
			return false;
		} else {
			if(!$te && !$qe && !($this->wirisCasSession === $q->wirisCasSession)) {
				return false;
			}
		}
		if($this->correctAnswers !== null && $q->correctAnswers !== null) {
			if($this->correctAnswers->length !== $q->correctAnswers->length) {
				return false;
			}
			$i = null;
			{
				$_g1 = 0; $_g = $this->correctAnswers->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$tca = $this->correctAnswers[$i1];
					$qca = $q->correctAnswers[$i1];
					if($tca->id !== $qca->id) {
						return false;
					}
					if(!($tca->content === $qca->content)) {
						return false;
					}
					unset($tca,$qca,$i1);
				}
			}
		}
		if($this->assertions !== null && $q->assertions !== null) {
			if($this->assertions->length !== $q->assertions->length) {
				return false;
			}
			$i = null;
			{
				$_g1 = 0; $_g = $this->assertions->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$ta = $this->assertions[$i1];
					$qa = $q->assertions[$i1];
					if($ta->getCorrectAnswer() !== $qa->getCorrectAnswer() || $ta->getAnswer() !== $qa->getAnswer() || !($ta->name === $qa->name)) {
						return false;
					}
					if($ta->parameters === null && $qa->parameters !== null || $ta->parameters !== null && $qa->parameters === null) {
						return false;
					}
					if($ta->parameters !== null && $qa->parameters !== null) {
						if($ta->parameters->length !== $qa->parameters->length) {
							return false;
						}
						$j = null;
						{
							$_g3 = 0; $_g2 = $ta->parameters->length;
							while($_g3 < $_g2) {
								$j1 = $_g3++;
								$tp = $ta->parameters[$j1];
								$qp = $qa->parameters[$j1];
								if($tp->name !== $qp->name || $tp->content !== $qp->content) {
									return false;
								}
								unset($tp,$qp,$j1);
							}
							unset($_g3,$_g2);
						}
						unset($j);
					}
					unset($ta,$qa,$i1);
				}
			}
		}
		$k = null;
		{
			$_g1 = 0; $_g = com_wiris_quizzes_impl_Option::$options->length;
			while($_g1 < $_g) {
				$k1 = $_g1++;
				$to = $this->getOption(com_wiris_quizzes_impl_Option::$options[$k1]);
				$qo = $q->getOption(com_wiris_quizzes_impl_Option::$options[$k1]);
				if($to === null && $qo !== null || $to !== null && $qo === null || !($to === $qo)) {
					return false;
				}
				unset($to,$qo,$k1);
			}
		}
		{
			$_g1 = 0; $_g = com_wiris_quizzes_impl_LocalData::$keys->length;
			while($_g1 < $_g) {
				$k1 = $_g1++;
				$td = $this->getLocalData(com_wiris_quizzes_impl_LocalData::$keys[$k1]);
				$qd = $q->getLocalData(com_wiris_quizzes_impl_LocalData::$keys[$k1]);
				if($td === null && $qd !== null || $td !== null && $qd === null || !($td === $qd)) {
					return false;
				}
				unset($td,$qd,$k1);
			}
		}
		return true;
	}
	public function update($response) {
		$this->id = null;
		$qs = $response;
		if($qs !== null && $qs->results !== null) {
			$i = null;
			{
				$_g1 = 0; $_g = $qs->results->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$r = $qs->results[$i1];
					$s = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getSerializer();
					$tag = $s->getTagName($r);
					if($tag === com_wiris_quizzes_impl_ResultGetTranslation::$tagName) {
						$rgt = $r;
						$this->wirisCasSession = $rgt->wirisCasSession;
						unset($rgt);
					}
					unset($tag,$s,$r,$i1);
				}
			}
		}
	}
	public function hideCompoundAnswerAnswers($m) {
		$a = new com_wiris_quizzes_impl_MathContent();
		$a->set($m);
		$c = com_wiris_quizzes_impl_HTMLTools::parseCompoundAnswer($a);
		$i = null;
		{
			$_g1 = 0; $_g = $c->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c[$i1][1] = "<math></math>";
				unset($i1);
			}
		}
		$a = com_wiris_quizzes_impl_HTMLTools::joinCompoundAnswer($c);
		return $a->content;
	}
	public function getStudentQuestion() {
		$q = new com_wiris_quizzes_impl_QuestionImpl();
		$q->id = $this->id;
		$i = null;
		$q->assertions = $this->assertions;
		$q->localData = $this->localData;
		if($q->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER) === com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE) {
			if($this->correctAnswers !== null) {
				$q->correctAnswers = new _hx_array(array());
				{
					$_g1 = 0; $_g = $this->correctAnswers->length;
					while($_g1 < $_g) {
						$i1 = $_g1++;
						$ca = $this->correctAnswers[$i1];
						$content = $ca->content;
						if($ca->content !== null && strlen($ca->content) > 0) {
							$content = $this->hideCompoundAnswerAnswers($ca->content);
						}
						$q->setCorrectAnswer($i1, $content);
						unset($i1,$content,$ca);
					}
				}
			}
		}
		return $q;
	}
	public function defaultLocalData($name) {
		if($name === com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER) {
			return com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_FALSE;
		} else {
			if($name === com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD) {
				return com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR;
			} else {
				if($name === com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS) {
					return com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_FALSE;
				} else {
					if($name === com_wiris_quizzes_impl_LocalData::$KEY_CAS_INITIAL_SESSION) {
						return null;
					} else {
						if($name === com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE) {
							return com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_AND;
						} else {
							if($name === com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION) {
								return null;
							} else {
								return null;
							}
						}
					}
				}
			}
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
		$this->id = null;
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
	public function getAssertionIndex($name, $correctAnswer, $userAnswer) {
		if($this->assertions === null) {
			return -1;
		}
		$i = null;
		{
			$_g1 = 0; $_g = $this->assertions->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$a = $this->assertions[$i1];
				if($a->getCorrectAnswer() === $correctAnswer && $a->getAnswer() === $userAnswer && $a->name === $name) {
					return $i1;
				}
				unset($i1,$a);
			}
		}
		return -1;
	}
	public function setCorrectAnswer($index, $content) {
		$this->id = null;
		if($index < 0) {
			throw new HException("Invalid index: " . _hx_string_rec($index, ""));
		}
		if($this->correctAnswers === null) {
			$this->correctAnswers = new _hx_array(array());
		}
		while($index >= $this->correctAnswers->length) {
			$this->correctAnswers->push(new com_wiris_quizzes_impl_CorrectAnswer());
		}
		$ca = $this->correctAnswers[$index];
		$ca->id = $index;
		$ca->weight = 1.0;
		$content = com_wiris_quizzes_impl_HTMLTools::convertEditor2Newlines($content);
		$ca->set($content);
	}
	public function defaultOption($name) {
		if($name === com_wiris_quizzes_impl_Option::$OPTION_EXPONENTIAL_E) {
			return "e";
		} else {
			if($name === com_wiris_quizzes_impl_Option::$OPTION_IMAGINARY_UNIT) {
				return "i";
			} else {
				if($name === com_wiris_quizzes_impl_Option::$OPTION_IMPLICIT_TIMES_OPERATOR) {
					return "false";
				} else {
					if($name === com_wiris_quizzes_impl_Option::$OPTION_NUMBER_PI) {
						return com_wiris_quizzes_impl_QuestionImpl_0($this, $name);
					} else {
						if($name === com_wiris_quizzes_impl_Option::$OPTION_PRECISION) {
							return "4";
						} else {
							if($name === com_wiris_quizzes_impl_Option::$OPTION_RELATIVE_TOLERANCE) {
								return "false";
							} else {
								if($name === com_wiris_quizzes_impl_Option::$OPTION_TIMES_OPERATOR) {
									return com_wiris_quizzes_impl_QuestionImpl_1($this, $name);
								} else {
									if($name === com_wiris_quizzes_impl_Option::$OPTION_TOLERANCE) {
										return "10^(-4)";
									} else {
										return null;
									}
								}
							}
						}
					}
				}
			}
		}
	}
	public function removeLocalData($name) {
		$this->id = null;
		if($this->localData !== null) {
			$i = $this->localData->length - 1;
			while($i >= 0) {
				if(_hx_array_get($this->localData, $i)->name === $name) {
					$this->localData->remove($this->localData[$i]);
				}
				$i--;
			}
		}
	}
	public function removeOption($name) {
		$this->id = null;
		if($this->options !== null) {
			$i = $this->options->length - 1;
			while($i >= 0) {
				if(_hx_array_get($this->options, $i)->name === $name) {
					$this->options->remove($this->options[$i]);
				}
				$i--;
			}
		}
	}
	public function getOption($name) {
		if($this->options !== null) {
			$i = null;
			{
				$_g1 = 0; $_g = $this->options->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					if(_hx_array_get($this->options, $i1)->name === $name) {
						return _hx_array_get($this->options, $i1)->content;
					}
					unset($i1);
				}
			}
		}
		return $this->defaultOption($name);
	}
	public function setOption($name, $value) {
		$this->id = null;
		if($this->options === null) {
			$this->options = new _hx_array(array());
		}
		$opt = new com_wiris_quizzes_impl_Option();
		$opt->name = $name;
		$opt->content = $value;
		$opt->type = com_wiris_quizzes_impl_MathContent::$TYPE_TEXT;
		$i = null;
		$found = false;
		{
			$_g1 = 0; $_g = $this->options->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if(_hx_array_get($this->options, $i1)->name === $name) {
					$this->options[$i1] = $opt;
					$found = true;
				}
				unset($i1);
			}
		}
		if(!$found) {
			$this->options->push($opt);
		}
	}
	public function setParametrizedAssertion($name, $correctAnswer, $userAnswer, $parameters) {
		$this->id = null;
		if($this->assertions === null) {
			$this->assertions = new _hx_array(array());
		}
		$a = new com_wiris_quizzes_impl_Assertion();
		$a->name = $name;
		$a->setCorrectAnswer($correctAnswer);
		$a->setAnswer($userAnswer);
		$names = com_wiris_quizzes_impl_Assertion::getParameterNames($name);
		if($parameters !== null && $names !== null) {
			$a->parameters = new _hx_array(array());
			$n = com_wiris_quizzes_impl_QuestionImpl_2($this, $a, $correctAnswer, $name, $names, $parameters, $userAnswer);
			$i = null;
			{
				$_g = 0;
				while($_g < $n) {
					$i1 = $_g++;
					$ap = new com_wiris_quizzes_impl_AssertionParam();
					$ap->name = $names[$i1];
					$ap->content = $parameters[$i1];
					$ap->type = com_wiris_quizzes_impl_MathContent::$TYPE_TEXT;
					$a->parameters->push($ap);
					unset($i1,$ap);
				}
			}
		}
		$index = $this->getAssertionIndex($name, $correctAnswer, $userAnswer);
		if($index === -1) {
			$this->assertions->push($a);
		} else {
			$this->assertions[$index] = $a;
		}
	}
	public function removeAssertion($name, $correctAnswer, $userAnswer) {
		$this->id = null;
		if($this->assertions !== null) {
			$i = $this->assertions->length - 1;
			while($i >= 0) {
				$a = $this->assertions[$i];
				if($a->name === $name && $a->getCorrectAnswer() === $correctAnswer && $a->getAnswer() === $userAnswer) {
					$this->assertions->remove($a);
				}
				$i--;
				unset($a);
			}
		}
	}
	public function setAssertion($name, $correctAnswer, $userAnswer) {
		$this->setParametrizedAssertion($name, $correctAnswer, $userAnswer, null);
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function newInstance() {
		return new com_wiris_quizzes_impl_QuestionImpl();
	}
	public function onSerialize($s) {
		$s->beginTag(com_wiris_quizzes_impl_QuestionImpl::$tagName);
		$this->id = $s->cacheAttribute("id", $this->id, null);
		$this->wirisCasSession = $s->childString("wirisCasSession", $this->wirisCasSession, null);
		$this->correctAnswers = $s->serializeArrayName($this->correctAnswers, "correctAnswers");
		$this->assertions = $s->serializeArrayName($this->assertions, "assertions");
		$this->options = $s->serializeArrayName($this->options, "options");
		$this->localData = $s->serializeArrayName($this->localData, "localData");
		$s->endTag();
	}
	public $localData;
	public $options;
	public $assertions;
	public $correctAnswers;
	public $wirisCasSession;
	public $id;
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
	static $tagName = "question";
	static function syntacticAssertionToURL($a) {
		$sb = new StringBuf();
		if($a->name === com_wiris_quizzes_impl_Assertion::$SYNTAX_EXPRESSION) {
			$sb->add("Expression");
		} else {
			if($a->name === com_wiris_quizzes_impl_Assertion::$SYNTAX_QUANTITY) {
				$sb->add("Quantity");
			} else {
				if($a->name === com_wiris_quizzes_impl_Assertion::$SYNTAX_LIST) {
					$sb->add("List");
				}
			}
		}
		if($a->parameters !== null && $a->parameters->length > 0) {
			$sb->add("?");
			$i = null;
			{
				$_g1 = 0; $_g = $a->parameters->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$p = $a->parameters[$i1];
					if($i1 > 0) {
						$sb->add("&");
					}
					$sb->add(rawurlencode($p->name));
					$sb->add("=");
					$sb->add(rawurlencode($p->content));
					unset($p,$i1);
				}
			}
		}
		return $sb->b;
	}
	function __toString() { return 'com.wiris.quizzes.impl.QuestionImpl'; }
}
function com_wiris_quizzes_impl_QuestionImpl_0(&$»this, &$name) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(960);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_QuestionImpl_1(&$»this, &$name) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(183);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_QuestionImpl_2(&$»this, &$a, &$correctAnswer, &$name, &$names, &$parameters, &$userAnswer) {
	if($parameters->length < $names->length) {
		return $parameters->length;
	} else {
		return $names->length;
	}
}
