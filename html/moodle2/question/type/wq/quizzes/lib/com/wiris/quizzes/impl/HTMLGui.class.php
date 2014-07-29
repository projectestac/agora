<?php

class com_wiris_quizzes_impl_HTMLGui {
	public function __construct($lang) {
		if(!php_Boot::$skip_constructor) {
		$this->lang = (($lang !== null) ? $lang : "en");
		$this->t = com_wiris_quizzes_impl_Translator::getInstance($this->lang);
	}}
	public function printMathML($h, $mathml) {
		$h->open("span", new _hx_array(array(new _hx_array(array("class", "mathml")))));
		$safeMathML = com_wiris_quizzes_impl_HTMLTools::encodeUnicodeChars($mathml);
		$src = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL) . "?service=render&mml=" . rawurlencode($safeMathML);
		$h->openclose("img", new _hx_array(array(new _hx_array(array("src", $src)), new _hx_array(array("align", "middle")))));
		$h->close();
	}
	public function printLocalData($h, $q, $unique, $conf) {
		$h->openFieldset("wirislocaldatafieldset" . _hx_string_rec($unique, ""), $this->t->t("inputmethod"), "wirismainfieldset");
		$anchor = (($conf->optAuxiliarCas && !$conf->optOpenAnswer) ? "#auxiliar-cas" : "");
		$h->help("wirisinputmethodhelp" . _hx_string_rec($unique, ""), "http://www.wiris.com/quizzes/docs/moodle/manual/correct-answer" . $anchor, $this->t->t("manual"));
		$id = null;
		if($conf->optOpenAnswer) {
			$h->openDivClass("wirisinputfielddiv" . _hx_string_rec($unique, ""), "wirissecondaryfieldset");
			$h->openUl("wirisinputfieldul", "wirisul");
			$id = "wirislocaldata" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . "]";
			$h->openLi();
			$h->input("radio", $id . "[0]", $id, com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR, null, null);
			$h->label($this->t->t("answerinputinlineeditor"), $id . "[0]", null);
			$h->close();
			$h->openLi();
			$h->input("radio", $id . "[1]", $id, com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR, null, null);
			$h->label($this->t->t("answerinputpopupeditor"), $id . "[1]", null);
			$h->close();
			$h->openLi();
			$h->input("radio", $id . "[2]", $id, com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT, null, null);
			$h->label($this->t->t("answerinputplaintext"), $id . "[2]", null);
			$h->close();
			$h->close();
			$h->close();
			$h->openDivClass("wiriscompoundanswerdiv" . _hx_string_rec($unique, ""), "wirissecondaryfieldset");
			$id = "wirislocaldata" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER . "]";
			$h->input("checkbox", $id, "", com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE, null, null);
			$h->label($this->t->t("compoundanswer"), $id, null);
			$h->openDivClass("wiriscompoundanswergradediv" . _hx_string_rec($unique, ""), "wiristerciaryfieldset");
			$h->openDiv("wiriscompoundanswergradeand" . _hx_string_rec($unique, ""));
			$id = "wirislocaldata" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE . "][and]";
			$h->input("radio", $id, "wiriscompoundanswergrade", com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_AND, null, null);
			$h->label($this->t->t("allanswerscorrect"), $id, null);
			$h->close();
			$h->openDiv("wiriscompoundanswergradedistribute" . _hx_string_rec($unique, ""));
			$id = "wirislocaldata" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE . "][distribute]";
			$h->input("radio", $id, "wiriscompoundanswergrade", com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE, null, null);
			$h->label($this->t->t("distributegrade"), $id, null);
			$id = "wirislocaldata" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION . "]";
			$h->input("text", $id, "", "", $this->t->t("gradedistribution"), "wirisadditionalinput");
			$h->close();
			$h->close();
			$h->close();
		}
		if($conf->optAuxiliarCas) {
			$h->openDivClass("wirisauxiliarcasdiv" . _hx_string_rec($unique, ""), "wirissecondaryfieldset");
			$id = "wirislocaldata" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . "]";
			if(!$conf->optAuxiliarCasReplaceEditor) {
				$h->input("checkbox", $id, "", com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_ADD, null, null);
			}
			$h->label($this->t->t("showauxiliarcas"), $id, null);
			if($conf->optAuxiliarCasReplaceEditor) {
				$h->text(" ");
				$h->select($id, null, new _hx_array(array(new _hx_array(array(com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_FALSE, $this->t->t("no"))), new _hx_array(array(com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_ADD, $this->t->t("add"))), new _hx_array(array(com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_REPLACE_INPUT, $this->t->t("replaceeditor"))))));
			}
			$h->text(" ");
			$h->jsComponent("wirisinitialcontentbutton" . _hx_string_rec($unique, ""), "JsInitialCasInput", $q->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_CAS_INITIAL_SESSION));
			$h->close();
		}
		$h->close();
	}
	public function getLangFromCasSession($session) {
		$start = _hx_index_of($session, "<session", null);
		if($start === -1) {
			return null;
		}
		$end = _hx_index_of($session, ">", $start + 1);
		$start = _hx_index_of($session, "lang", $start);
		if($start === -1 || $start > $end) {
			return null;
		}
		$start = _hx_index_of($session, "\"", $start) + 1;
		return _hx_substr($session, $start, 2);
	}
	public function printAssertionFeedback($h, $c, $q) {
		$gradeClass = $this->getGradeClass($c->value);
		$typeClass = _hx_substr($c->assertion, 0, _hx_index_of($c->assertion, "_", null));
		$h->openSpan(null, $gradeClass . " " . $typeClass);
		$feedback = $this->t->t($c->assertion . "_correct_feedback");
		$index = $q->getAssertionIndex($c->assertion, $c->getCorrectAnswer(), $c->getAnswer());
		if($index !== -1) {
			$a = $q->assertions[$index];
			if($a->parameters !== null) {
				$i = null;
				{
					$_g1 = 0; $_g = $a->parameters->length;
					while($_g1 < $_g) {
						$i1 = $_g1++;
						$name = _hx_array_get($a->parameters, $i1)->name;
						$value = _hx_array_get($a->parameters, $i1)->content;
						$feedback = str_replace("\${" . $name . "}", $value, $feedback);
						unset($value,$name,$i1);
					}
				}
			}
		}
		$h->text($feedback);
		$h->close();
	}
	public function getAnswerFeedbackHtml($correctAnswer, $userAnswer, $q, $qi) {
		$h = new com_wiris_quizzes_impl_HTML();
		$this->printAnswerFeedback($h, $correctAnswer, $userAnswer, $q, $qi);
		return $h->getString();
	}
	public function printAnswerFeedback($h, $correctAnswer, $userAnswer, $q, $qi) {
		$h->openUl(null, "wiristestassertionslist");
		$checks = $qi->getMatchingChecks($correctAnswer, $userAnswer);
		$j = null;
		{
			$_g1 = 0; $_g = $checks->length;
			while($_g1 < $_g) {
				$j1 = $_g1++;
				$h->openLi();
				$this->printAssertionFeedback($h, $checks[$j1], $q);
				$h->close();
				unset($j1);
			}
		}
		$h->close();
	}
	public function getWirisTestDynamic($q, $qi, $correctAnswer, $unique) {
		$h = new com_wiris_quizzes_impl_HTML();
		$hasCorrectAnswer = $q->correctAnswers !== null && $correctAnswer < $q->correctAnswers->length;
		$h->openDivClass("wiristestresult" . _hx_string_rec($unique, ""), "wiristestresult");
		$h->openFieldset("wiristestvalidationfieldset" . _hx_string_rec($unique, ""), $this->t->t("validation"), "wirismainfieldset");
		if($q->assertions !== null && $q->assertions->length > 0 && $qi->hasEvaluation()) {
			$h->openDivClass("wiristestgrade" . _hx_string_rec($unique, ""), "wiristestgrade");
			$grade = $qi->getAnswerGrade($correctAnswer, 0, $q);
			if($grade === 1.0) {
				$h->openSpan("wiristestgradetext" . _hx_string_rec($unique, ""), "wiristestgradetext wiriscorrect");
				$h->text($this->t->t("correct"));
				$h->close();
			} else {
				if($grade === 0.0) {
					$h->openSpan("wiristestgradetext" . _hx_string_rec($unique, ""), "wiristestgradetext wirisincorrect");
					$h->text($this->t->t("incorrect"));
					$h->close();
				} else {
					$h->openSpan("wiristestgradetext" . _hx_string_rec($unique, ""), "wiristestgradetext wirispartiallycorrect");
					$h->text(_hx_string_rec(Math::round($grade * 100), "") . "% ");
					$h->text($this->t->t("partiallycorrect"));
					$h->close();
				}
			}
			$h->close();
			$h->openDivClass("wiristestassertions" . _hx_string_rec($unique, ""), "wiristestassertions");
			$h->openDivClass("wiristestassertionslistwrapper" . _hx_string_rec($unique, ""), "wiristestassertionslistwrapper");
			$this->printAnswerFeedback($h, $correctAnswer, 0, $q, $qi);
			$h->close();
			$h->close();
		} else {
			$h->text($this->t->t("clicktesttoevaluate"));
		}
		$h->close();
		$h->close();
		$h->openDivClass("wiristestcorrectanswer" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "]", "wiristestcorrectanswer");
		$h->openFieldset("wiristestcorrectanswerfieldset" . _hx_string_rec($unique, ""), $this->t->t("correctanswer"), "wirismainfieldset");
		if($hasCorrectAnswer) {
			$content = _hx_array_get($q->correctAnswers, $correctAnswer)->content;
			if($qi->hasVariables()) {
				$content = $qi->expandVariables($content);
			}
			if(com_wiris_quizzes_impl_MathContent::getMathType($content) === com_wiris_quizzes_impl_MathContent::$TYPE_MATHML) {
				$this->printMathML($h, $content);
			} else {
				$h->text($content);
			}
		}
		$h->close();
		$h->close();
		return $h->getString();
	}
	public function printTester($h, $q, $qi, $correctAnswer, $unique) {
		if($q === null) {
			$q = new com_wiris_quizzes_impl_QuestionImpl();
		}
		if($qi === null) {
			$qi = new com_wiris_quizzes_impl_QuestionInstanceImpl();
		}
		$hasUserAnswer = $qi->userData !== null && $qi->userData->answers !== null && $qi->userData->answers->length > 0;
		$h->openDivClass("wiristestwrapper" . _hx_string_rec($unique, ""), "wiristestwrapper");
		$h->openDivClass("wiristestanswerwrapper" . _hx_string_rec($unique, ""), "wiristestanswerwrapper");
		$h->jsComponent("wirisanswer" . _hx_string_rec($unique, "") . "[0]", "JsInput", com_wiris_quizzes_impl_HTMLGui_0($this, $correctAnswer, $h, $hasUserAnswer, $q, $qi, $unique));
		$h->close();
		$h->openDivClass("wiristestbuttons" . _hx_string_rec($unique, ""), "wiristestbuttons");
		$h->input("button", "wiristestbutton" . _hx_string_rec($unique, ""), null, $this->t->t("test"), null, "wirisbutton");
		$h->input("button", "wirisrestartbutton" . _hx_string_rec($unique, ""), null, $this->t->t("start"), null, "wirisbutton");
		$h->close();
		$h->openDivClass("wiristestdynamic" . _hx_string_rec($unique, ""), "wiristestdynamic");
		$h->raw($this->getWirisTestDynamic($q, $qi, $correctAnswer, $unique));
		$h->close();
		$h->close();
	}
	public function printAssertionsControls($h, $q, $correctAnswer, $unique, $conf) {
		$h->openDiv("wirisassertioncontrols" . _hx_string_rec($unique, ""));
		$h->openFieldset("wiriscomparisonfieldset" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", $this->t->t("comparisonwithstudentanswer"), "wirismainfieldset");
		$h->help("wiriscomparisonhelp" . _hx_string_rec($unique, ""), "http://www.wiris.com/quizzes/docs/moodle/manual/validation#comparison", $this->t->t("manual"));
		$h->openUl("wiriscomparison" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", "wirisul");
		$i = null;
		$idassertion = null;
		{
			$_g1 = 0; $_g = com_wiris_quizzes_impl_Assertion::$equivalent->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if(!$conf->optGradingFunction && com_wiris_quizzes_impl_Assertion::$equivalent[$i1] === com_wiris_quizzes_impl_Assertion::$EQUIVALENT_FUNCTION) {
					continue;
				}
				$h->openLi();
				$idassertion = "wirisassertion" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Assertion::$equivalent[$i1] . "][" . _hx_string_rec($correctAnswer, "") . "][0]";
				$h->input("radio", $idassertion, "wirisradiocomparison" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", null, null, null);
				$h->label($this->t->t(com_wiris_quizzes_impl_Assertion::$equivalent[$i1]), $idassertion, null);
				if(com_wiris_quizzes_impl_Assertion::$equivalent[$i1] === com_wiris_quizzes_impl_Assertion::$EQUIVALENT_FUNCTION) {
					$h->text(" ");
					$h->input("text", "wirisassertionparam" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Assertion::$EQUIVALENT_FUNCTION . "][name][" . _hx_string_rec($correctAnswer, "") . "][0]", "", "", null, null);
				}
				$h->close();
				unset($i1);
			}
		}
		$h->openLi();
		$comparesetsid = "wirisassertionparam" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Assertion::$EQUIVALENT_SYMBOLIC . "," . com_wiris_quizzes_impl_Assertion::$EQUIVALENT_LITERAL . "][comparesets][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$h->input("checkbox", $comparesetsid, null, null, null, null);
		$h->text(" ");
		$h->label($this->t->t("comparesets"), $comparesetsid, null);
		$h->close();
		$h->close();
		$h->close();
		$h->openFieldset("wirisadditionalchecksfieldset" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", $this->t->t("additionalproperties"), "wirismainfieldset");
		$h->help("wirisadditionalcheckshelp" . _hx_string_rec($unique, ""), "http://www.wiris.com/quizzes/docs/moodle/manual/validation#properties", $this->t->t("manual"));
		$h->openDivClass("wirisstructurediv" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", "wirissecondaryfieldset");
		$h->openDivClass("wirisstructuredivlegend" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", "wirissecondaryfieldsetlegend");
		$h->text($this->t->t("structure") . ":");
		$h->close();
		$options = new _hx_array(array());
		$options[0] = new _hx_array(array());
		$options[0][0] = "";
		$options[0][1] = $this->t->t("none");
		{
			$_g1 = 0; $_g = com_wiris_quizzes_impl_Assertion::$structure->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$options[$i1 + 1] = new _hx_array(array());
				$options[$i1 + 1][0] = com_wiris_quizzes_impl_Assertion::$structure[$i1];
				$options[$i1 + 1][1] = $this->t->t(com_wiris_quizzes_impl_Assertion::$structure[$i1]);
				unset($i1);
			}
		}
		$h->select("wirisstructureselect" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", "", $options);
		$h->close();
		$h->openDivClass("wirismorediv" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", "wirissecondaryfieldset");
		$h->text($this->t->t("more") . ":");
		$h->openUl("wirismore" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "][0]", "wirisul");
		{
			$_g1 = 0; $_g = com_wiris_quizzes_impl_Assertion::$checks->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$h->openLi();
				$idassertion = "wirisassertion" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Assertion::$checks[$i1] . "][" . _hx_string_rec($correctAnswer, "") . "][0]";
				$h->input("checkbox", $idassertion, null, null, null, null);
				$h->label($this->t->t(com_wiris_quizzes_impl_Assertion::$checks[$i1]), $idassertion, null);
				$parameters = com_wiris_quizzes_impl_Assertion::getParameterNames(com_wiris_quizzes_impl_Assertion::$checks[$i1]);
				if($parameters !== null) {
					$j = null;
					{
						$_g3 = 0; $_g2 = $parameters->length;
						while($_g3 < $_g2) {
							$j1 = $_g3++;
							$h->text(" ");
							$h->input("text", "wirisassertionparam" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Assertion::$checks[$i1] . "][" . $parameters[$j1] . "][" . _hx_string_rec($correctAnswer, "") . "][0]", null, null, null, null);
							unset($j1);
						}
						unset($_g3,$_g2);
					}
					unset($j);
				}
				$h->close();
				unset($parameters,$i1);
			}
		}
		$h->close();
		$h->close();
		$h->close();
		$h->close();
	}
	public function printAssertionsSummary($h, $q, $index, $unique, $conf) {
		$syntax = null;
		$equivalent = null;
		$properties = new _hx_array(array());
		$showSyntax = false;
		$showComparison = false;
		$showProperties = false;
		$showAlgorithm = false;
		$showOptions = false;
		if($q->assertions !== null) {
			$i = null;
			{
				$_g1 = 0; $_g = $q->assertions->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$a = $q->assertions[$i1];
					if($a->isSyntactic()) {
						$text = $this->getAssertionString($a, 80);
						if(!($text === $this->t->t(com_wiris_quizzes_impl_Assertion::$SYNTAX_EXPRESSION) . ".")) {
							$syntax = $text;
							$showSyntax = true;
						}
						unset($text);
					} else {
						if($index === $a->getCorrectAnswer()) {
							$text = $this->getAssertionString($a, 80);
							if(StringTools::startsWith($a->name, "equivalent_")) {
								if(!($text === $this->t->t(com_wiris_quizzes_impl_Assertion::$EQUIVALENT_SYMBOLIC))) {
									$equivalent = $text;
									if(!StringTools::endsWith($equivalent, ".")) {
										$equivalent = $equivalent . ".";
									}
									$showComparison = true;
								}
							} else {
								$properties->push($text);
								$showProperties = true;
							}
							unset($text);
						}
					}
					unset($i1,$a);
				}
			}
		}
		$options = "";
		$tolerance = $q->getOption(com_wiris_quizzes_impl_Option::$OPTION_TOLERANCE);
		if(!($tolerance === $q->defaultOption(com_wiris_quizzes_impl_Option::$OPTION_TOLERANCE))) {
			$options = $this->t->t("tolerancedigits") . ": " . _hx_substr($tolerance, 5, strlen($tolerance) - 6);
			$showOptions = true;
		}
		$relative = $q->getOption(com_wiris_quizzes_impl_Option::$OPTION_RELATIVE_TOLERANCE);
		if(!($relative === $q->defaultOption(com_wiris_quizzes_impl_Option::$OPTION_RELATIVE_TOLERANCE))) {
			if(strlen($options) > 0) {
				$options .= ". ";
			}
			$options .= $this->t->t("relativetolerance");
			$showOptions = true;
		}
		$showAlgorithm = $q->wirisCasSession !== null && strlen($q->wirisCasSession) > 0;
		if($showSyntax || $showComparison || $showProperties || $showAlgorithm || $showOptions) {
			$h->openFieldset("validationandvariables" . _hx_string_rec($unique, ""), $this->t->t("validationandvariables"), "wirisfieldsetvalidationandvariables");
			$h->help("wirisvalidationandvariableshelp" . _hx_string_rec($unique, ""), "http://www.wiris.com/quizzes/docs/moodle/manual/short-answer#vav", $this->t->t("manual"));
			$h->openDl("wirisassertionsummarydl" . _hx_string_rec($unique, ""), "wirisassertionsummarydl");
			if($showSyntax) {
				$h->dt($this->t->t("allowedinput"));
				$h->dd($syntax);
			}
			if($showComparison || $showOptions) {
				$h->dt($this->t->t("comparison"));
				$cmp = "";
				if($showComparison) {
					$cmp .= $equivalent . " ";
				}
				if($showOptions) {
					$cmp .= $options . ".";
				}
				$h->dd($cmp);
			}
			if($showProperties) {
				$h->dt($this->t->t("properties"));
				$prop = new StringBuf();
				$i = null;
				{
					$_g1 = 0; $_g = $properties->length;
					while($_g1 < $_g) {
						$i1 = $_g1++;
						if($i1 > 0) {
							$prop->add(", ");
						}
						$prop->add($properties[$i1]);
						unset($i1);
					}
				}
				$prop->add(".");
				$h->dd($prop->b);
			}
			if($showAlgorithm) {
				$h->dt($this->t->t("variables"));
				$variables = $this->t->t("hasalgorithm") . ". ";
				if(!($q->getOption(com_wiris_quizzes_impl_Option::$OPTION_PRECISION) === $q->defaultOption(com_wiris_quizzes_impl_Option::$OPTION_PRECISION))) {
					$variables .= $this->t->t("precision") . ": " . $q->getOption(com_wiris_quizzes_impl_Option::$OPTION_PRECISION) . ". ";
				}
				$h->dd($variables);
			}
			$h->close();
			$h->close();
		}
	}
	public function getAssertionString($a, $chars) {
		$sb = new StringBuf();
		$sb->add($this->t->t($a->name));
		$sb->add(".");
		if($a->parameters !== null && $a->parameters->length > 0) {
			$i = null;
			{
				$_g1 = 0; $_g = $a->parameters->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$ap = $a->parameters[$i1];
					if($ap->name === com_wiris_quizzes_impl_Assertion::$PARAM_ORDER_MATTERS && !($ap->content === "true")) {
						$sb->add(" ");
						$sb->add($this->t->t("comparesets"));
						$sb->add(".");
					} else {
						if($ap->name === com_wiris_quizzes_impl_Assertion::$PARAM_REPETITION_MATTERS) {
						} else {
							if($ap->content === "true") {
								$sb->add(" ");
								$sb->add($this->t->t($ap->name));
								$sb->add(".");
							} else {
								$sb->add(" ");
								$sb->add($ap->content);
								$sb->add(".");
							}
						}
					}
					unset($i1,$ap);
				}
			}
		}
		$res = $sb->b;
		if(strlen($res) > $chars) {
			$res = _hx_substr($res, 0, $chars - 3) . "...";
		}
		return $res;
	}
	public function getWirisCasApplet($id, $lang) {
		$caslangs = $this->getWirisCasLanguages();
		$caslang = "en";
		$i = null;
		{
			$_g1 = 0; $_g = $caslangs->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if($caslangs[$i1][0] === $lang) {
					$caslang = $lang;
				}
				unset($i1);
			}
		}
		$h = new com_wiris_quizzes_impl_HTML();
		$h->open("applet", new _hx_array(array(new _hx_array(array("id", $id)), new _hx_array(array("name", "wiriscas")), new _hx_array(array("codebase", com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL) . "/wiris-codebase")), new _hx_array(array("code", "WirisApplet_net_" . $caslang)), new _hx_array(array("archive", "wrs_net_" . $caslang . ".jar")), new _hx_array(array("height", "100%")), new _hx_array(array("width", "100%")))));
		$h->openclose("param", new _hx_array(array(new _hx_array(array("name", "command")), new _hx_array(array("value", "false")))));
		$h->openclose("param", new _hx_array(array(new _hx_array(array("name", "commands")), new _hx_array(array("value", "false")))));
		$h->openclose("param", new _hx_array(array(new _hx_array(array("name", "interface")), new _hx_array(array("value", "false")))));
		$h->close();
		return $h->getString();
	}
	public function printOutputControls($h, $unique) {
		$h->openDiv("wirisoutputcontrols" . _hx_string_rec($unique, ""));
		$h->openFieldset("wirisoutputcontrolsfieldset" . _hx_string_rec($unique, ""), $this->t->t("outputoptions"), "wirismainfieldset");
		$h->help("wirisoutputcontrolshelp" . _hx_string_rec($unique, ""), "http://www.wiris.com/quizzes/docs/moodle/manual/variables", $this->t->t("manual"));
		$h->openUl("wirisoutputcontrolslist" . _hx_string_rec($unique, ""), "wirisoutputcontrolslist");
		$id = null;
		$h->openLi();
		$id = "wirisoption" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Option::$OPTION_PRECISION . "]";
		$h->label($this->t->t(com_wiris_quizzes_impl_Option::$OPTION_PRECISION), $id, "wirisleftlabel wirisleftlabellist");
		$h->input("text", $id, null, null, null, null);
		$h->openSpan("wiriswarning" . _hx_string_rec($unique, "") . "[warningprecision]", "wirisinlinewarning");
		$h->text($this->t->t("warningtoleranceprecision"));
		$h->close();
		$h->close();
		$h->openLi();
		$id = "wirisoption" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Option::$OPTION_IMPLICIT_TIMES_OPERATOR . "]";
		$h->label($this->t->t(com_wiris_quizzes_impl_Option::$OPTION_IMPLICIT_TIMES_OPERATOR), $id, "wirisleftlabel wirisleftlabellist");
		$h->input("checkbox", $id, null, "true", $this->t->t($id), null);
		$h->close();
		$h->openLi();
		$id = "wirisoptionpart" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Option::$OPTION_TIMES_OPERATOR . "]";
		$h->label($this->t->t(com_wiris_quizzes_impl_Option::$OPTION_TIMES_OPERATOR), null, "wirisleftlabel wirisleftlabellist");
		$h->openSpan(null, "wirishorizontalparam");
		$h->input("radio", $id . "[0]", $id, com_wiris_quizzes_impl_HTMLGui_1($this, $h, $id, $unique), com_wiris_quizzes_impl_HTMLGui_2($this, $h, $id, $unique), null);
		$h->label("a" . com_wiris_quizzes_impl_HTMLGui_3($this, $h, $id, $unique) . "b", $id . "[0]", null);
		$h->close();
		$h->openSpan(null, "wirishorizontalparam");
		$h->input("radio", $id . "[1]", $id, com_wiris_quizzes_impl_HTMLGui_4($this, $h, $id, $unique), com_wiris_quizzes_impl_HTMLGui_5($this, $h, $id, $unique), null);
		$h->label("a" . com_wiris_quizzes_impl_HTMLGui_6($this, $h, $id, $unique) . "b", $id . "[1]", null);
		$h->close();
		$h->close();
		$h->openLi();
		$id = "wirisoptionpart" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Option::$OPTION_IMAGINARY_UNIT . "]";
		$h->label($this->t->t(com_wiris_quizzes_impl_Option::$OPTION_IMAGINARY_UNIT), null, "wirisleftlabel wirisleftlabellist");
		$h->openSpan(null, "wirishorizontalparam");
		$h->input("radio", $id . "[0]", $id, "i", "i", null);
		$h->label("i", $id . "[0]", null);
		$h->close();
		$h->openSpan(null, "wirishorizontalparam");
		$h->input("radio", $id . "[1]", $id, "j", "j", null);
		$h->label("j", $id . "[1]", null);
		$h->close();
		$h->close();
		$h->close();
		$h->close();
		$h->close();
	}
	public function getWirisCasLanguages() {
		$langs = new _hx_array(array(new _hx_array(array("ca", $this->t->t("Catalan"))), new _hx_array(array("en", $this->t->t("English"))), new _hx_array(array("es", $this->t->t("Spanish"))), new _hx_array(array("et", $this->t->t("Estonian"))), new _hx_array(array("eu", $this->t->t("Basque"))), new _hx_array(array("fr", $this->t->t("French"))), new _hx_array(array("de", $this->t->t("German"))), new _hx_array(array("it", $this->t->t("Italian"))), new _hx_array(array("nl", $this->t->t("Dutch"))), new _hx_array(array("pt", $this->t->t("Portuguese")))));
		return $langs;
	}
	public function printInputControls($h, $q, $correctAnswer, $unique) {
		$id = null;
		$h->openDiv("wirisinputcontrols" . _hx_string_rec($unique, ""));
		$h->openFieldset("wirisinputcontrolsfieldset" . _hx_string_rec($unique, ""), $this->t->t("allowedinput"), "wirismainfieldset");
		$h->help("wirisinputcontrolshelp" . _hx_string_rec($unique, ""), "http://www.wiris.com/quizzes/docs/moodle/manual/validation#allowed-input", $this->t->t("manual"));
		$h->openDivClass("wirissyntaxassertions" . _hx_string_rec($unique, ""), "wirissyntaxassertions");
		$h->openUl("wirisinputcontrolslist" . _hx_string_rec($unique, ""), "wirisinputcontrolslist");
		$i = null;
		{
			$_g1 = 0; $_g = com_wiris_quizzes_impl_Assertion::$syntactic->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$h->openLi();
				$id = "wirisassertion" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Assertion::$syntactic[$i1] . "][" . _hx_string_rec($correctAnswer, "") . "][0]";
				$h->input("radio", $id, "wirisradiosyntax" . _hx_string_rec($unique, ""), null, null, null);
				$h->openStrong();
				$h->label($this->t->t(com_wiris_quizzes_impl_Assertion::$syntactic[$i1]), $id, null);
				$h->close();
				$h->text(" ");
				$h->label($this->t->t(com_wiris_quizzes_impl_Assertion::$syntactic[$i1] . "_description"), $id, null);
				$h->close();
				unset($i1);
			}
		}
		$h->close();
		$h->openFieldset("wirissyntaxparams" . _hx_string_rec($unique, ""), $this->t->t("syntaxparams"), "wirissyntaxparams");
		$h->openDivClass("wirissyntaxconstants" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$h->openSpan("wirissyntaxconstantslabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->text($this->t->t("constants") . ":");
		$h->close();
		$h->openSpan("wirissyntaxconstantsvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$id = "wirisassertionparampart" . _hx_string_rec($unique, "") . "[syntax_expression, syntax_quantity][constants][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$letterpi = com_wiris_quizzes_impl_HTMLGui_7($this, $correctAnswer, $h, $i, $id, $q, $unique);
		$this->syntaxCheckbox($h, $id . "[0]", $letterpi, $letterpi, false);
		$this->syntaxCheckbox($h, $id . "[1]", "e", "e", false);
		$this->syntaxCheckbox($h, $id . "[2]", "i", "i", false);
		$this->syntaxCheckbox($h, $id . "[3]", "j", "j", false);
		$h->close();
		$h->close();
		$h->openDivClass("wirissyntaxfunctions" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$h->openDiv("wirissyntaxfunctionscheckboxes" . _hx_string_rec($unique, ""));
		$h->openSpan("wirissyntaxfunctionlabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->text($this->t->t("functions") . ":");
		$h->close();
		$h->openSpan("wirissyntaxfunctionvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$id = "wirisassertionparampart" . _hx_string_rec($unique, "") . "[syntax_expression][functions][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$this->syntaxCheckbox($h, $id . "[0]", "exp, log, ln", $this->t->t("explog"), false);
		$this->syntaxCheckbox($h, $id . "[1]", "sin, cos, tan, asin, acos, atan, cosec, sec, cotan, acosec, asec, acotan", $this->t->t("trigonometric"), false);
		$this->syntaxCheckbox($h, $id . "[2]", "sinh, cosh, tanh, asinh, acosh, atanh", $this->t->t("hyperbolic"), false);
		$this->syntaxCheckbox($h, $id . "[3]", "min, max, sign", $this->t->t("arithmetic"), false);
		$h->close();
		$h->close();
		$h->openDiv("wirissyntaxfunctionscustom" . _hx_string_rec($unique, ""));
		$h->openSpan("wirissyntaxuserfunctionlabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->label($this->t->t("userfunctions") . ":", $id . "[4]", null);
		$h->close();
		$h->openSpan("wirissyntaxfunctionscustomvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$h->input("text", $id . "[4]", "", null, null, "wirisuserfunctions");
		$h->close();
		$h->close();
		$h->close();
		$h->openDivClass("wirissyntaxunits" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$h->openSpan("wirissyntaxunitslabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->text($this->t->t("units") . ":");
		$h->close();
		$h->openSpan("wirissyntaxunitsvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$id = "wirisassertionparampart" . _hx_string_rec($unique, "") . "[syntax_quantity][units][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$this->syntaxCheckbox($h, $id . "[0]", "m", "m", false);
		$this->syntaxCheckbox($h, $id . "[1]", "s", "s", false);
		$this->syntaxCheckbox($h, $id . "[2]", "g", "g", false);
		$this->syntaxCheckbox($h, $id . "[3]", com_wiris_quizzes_impl_HTMLGui_8($this, $correctAnswer, $h, $i, $id, $letterpi, $q, $unique) . ", ', \"", com_wiris_quizzes_impl_HTMLGui_9($this, $correctAnswer, $h, $i, $id, $letterpi, $q, $unique) . " ' \"", false);
		$this->syntaxCheckbox($h, $id . "[4]", com_wiris_quizzes_impl_HTMLGui_10($this, $correctAnswer, $h, $i, $id, $letterpi, $q, $unique) . ", ', \", sr, m, g, s, E, K, mol, cd, rad, h, min, l, N, Pa, Hz, W,J, C, V, " . com_wiris_quizzes_impl_HTMLGui_11($this, $correctAnswer, $h, $i, $id, $letterpi, $q, $unique) . ", F, S, Wb, b, H, T, lx, lm, Gy, Bq, Sv, kat", $this->t->t("all"), true);
		$h->close();
		$h->close();
		$h->openDivClass("wirissyntaxunitprefixes" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$h->openSpan("wirissyntaxunitslabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->text($this->t->t("unitprefixes") . ":");
		$h->close();
		$h->openSpan("wirissyntaxunitsvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$id = "wirisassertionparampart" . _hx_string_rec($unique, "") . "[syntax_quantity][unitprefixes][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$this->syntaxCheckbox($h, $id . "[0]", "M", "M", false);
		$this->syntaxCheckbox($h, $id . "[1]", "k", "k", false);
		$this->syntaxCheckbox($h, $id . "[2]", "c", "c", false);
		$this->syntaxCheckbox($h, $id . "[3]", "m", "m", false);
		$this->syntaxCheckbox($h, $id . "[4]", "y, z, a, f, p, n, " . com_wiris_quizzes_impl_HTMLGui_12($this, $correctAnswer, $h, $i, $id, $letterpi, $q, $unique) . ", m, c, d, da, h, k, M, G, T, P, E, Z, Y", $this->t->t("all"), true);
		$h->close();
		$h->close();
		$h->openDivClass("wirissyntaxmixedfractions" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$id = "wirisassertionparam" . _hx_string_rec($unique, "") . "[syntax_quantity][mixedfractions][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$h->openSpan("wirissyntaxmixedfractionslabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->label($this->t->t("mixedfractions") . ":", $id, null);
		$h->close();
		$h->openSpan("wirissyntaxmixedfractionsvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$h->input("checkbox", $id, "", "true", null, null);
		$h->close();
		$h->close();
		$h->openDivClass("wirissyntaxlist" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$id = "wirisassertionparam" . _hx_string_rec($unique, "") . "[syntax_expression,syntax_quantity][list][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$h->openSpan("wirissyntaxlistlabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->label($this->t->t("list") . ":", $id, null);
		$h->close();
		$h->openSpan("wirissyntaxlistvalue" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$h->input("checkbox", $id, "", "true", null, null);
		$h->close();
		$h->close();
		$h->openDivClass("wirissyntaxforcebrackets" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$h->openSpan("wirissyntaxforcebracketslabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->close();
		$h->openSpan("wirissyntaxforcebracketsvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$id = "wirisassertionparam" . _hx_string_rec($unique, "") . "[syntax_expression][forcebrackets][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$this->syntaxCheckbox($h, $id, "true", $this->t->t("forcebrackets"), false);
		$h->close();
		$h->close();
		$h->openDivClass("wirissyntaxitemseparators" . _hx_string_rec($unique, ""), "wirissyntaxparam");
		$h->openSpan("wirissyntaxitemseparatorslabel" . _hx_string_rec($unique, ""), "wirissyntaxlabel");
		$h->close();
		$h->openSpan("wirissyntaxitemseparatorsvalues" . _hx_string_rec($unique, ""), "wirissyntaxvalues");
		$id = "wirisassertionparam" . _hx_string_rec($unique, "") . "[syntax_quantity][itemseparators][" . _hx_string_rec($correctAnswer, "") . "][0]";
		$this->syntaxCheckbox($h, $id, "\\,,\\n", $this->t->t("commaasitemseparator"), false);
		$h->close();
		$h->close();
		$h->close();
		$h->close();
		$h->openDiv("wiristolerance" . _hx_string_rec($unique, ""));
		$idtol = "wirisoption" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Option::$OPTION_TOLERANCE . "]";
		$h->label($this->t->t("tolerancedigits") . ":", $idtol, "wirisleftlabel2");
		$h->text(" ");
		$h->input("text", $idtol, "", null, null, null);
		$idRelTol = "wirisoption" . _hx_string_rec($unique, "") . "[" . com_wiris_quizzes_impl_Option::$OPTION_RELATIVE_TOLERANCE . "]";
		$h->input("checkbox", $idRelTol, "", null, null, null);
		$h->label($this->t->t("relative"), $idRelTol, null);
		$h->openSpan("wiriswarning" . _hx_string_rec($unique, "") . "[warningtolerance]", "wirisinlinewarning");
		$h->text($this->t->t("warningtoleranceprecision"));
		$h->close();
		$h->close();
		$h->close();
		$h->close();
	}
	public function syntaxInput($h, $id, $name, $value, $label, $all, $radio) {
		$className = (($all) ? "wirisassertionparamall" : null);
		$h->openSpan(null, "wirishorizontalparam");
		$h->input((($radio) ? "radio" : "checkbox"), $id, $name, $value, $value, $className);
		$h->label($label, $id, null);
		$h->close();
	}
	public function syntaxRadio($h, $id, $name, $value, $label) {
		$this->syntaxInput($h, $id, $name, $value, $label, false, true);
	}
	public function syntaxCheckbox($h, $id, $value, $label, $all) {
		$this->syntaxInput($h, $id, null, $value, $label, $all, false);
	}
	public function getAssertionFeedback($q, $a) {
		$h = new com_wiris_quizzes_impl_HTML();
		$h->openUl(null, "wirisfeedbacklist");
		$i = null;
		{
			$_g1 = 0; $_g = $a->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c = $a[$i1];
				$h->openLi();
				$className = $this->getGradeClass($c->value);
				$suffix = (($c->value === 1.0) ? "_correct_feedback" : "_incorrect_feedback");
				$h->openSpan(null, $className);
				$text = $this->t->t($c->assertion . $suffix);
				if($q !== null && $q->assertions !== null) {
					$index = $q->getAssertionIndex($c->assertion, $c->getCorrectAnswer(), $c->getAnswer());
					if($index !== -1) {
						$ass = $q->assertions[$index];
						if($ass->parameters !== null) {
							$j = null;
							{
								$_g3 = 0; $_g2 = $ass->parameters->length;
								while($_g3 < $_g2) {
									$j1 = $_g3++;
									$p = $ass->parameters[$j1];
									$text = str_replace("\${" . $p->name . "}", $p->content, $text);
									unset($p,$j1);
								}
								unset($_g3,$_g2);
							}
							unset($j);
						}
						unset($ass);
					}
					unset($index);
				}
				$h->text($text);
				$h->close();
				$h->close();
				unset($text,$suffix,$i1,$className,$c);
			}
		}
		$h->close();
		return $h->getString();
	}
	public function getGradeClass($grade) {
		$className = null;
		if($grade === 1.0) {
			$className = "wiriscorrect";
		} else {
			if($grade === 0.0) {
				$className = "wirisincorrect";
			} else {
				$className = "wirispartiallycorrect";
			}
		}
		return $className;
	}
	public function getTabPreview($q, $qi, $correctAnswer, $unique, $conf) {
		$h = new com_wiris_quizzes_impl_HTML();
		$this->printTester($h, $q, $qi, $correctAnswer, $unique);
		return $h->getString();
	}
	public function getTabVariables($q, $correctAnswer, $unique, $conf) {
		$h = new com_wiris_quizzes_impl_HTML();
		$h->jsComponent("wiriscas" . _hx_string_rec($unique, ""), "jsCasInput", $q->wirisCasSession);
		$h->openDivClass("wiriscasbottomwrapper" . _hx_string_rec($unique, ""), "wiriscasbottomwrapper");
		$this->printOutputControls($h, $unique);
		$h->close();
		return $h->getString();
	}
	public function getTabValidation($q, $correctAnswer, $unique, $conf) {
		$h = new com_wiris_quizzes_impl_HTML();
		$this->printInputControls($h, $q, $correctAnswer, $unique);
		$this->printAssertionsControls($h, $q, $correctAnswer, $unique, $conf);
		return $h->getString();
	}
	public function getTabCorrectAnswer($q, $correctAnswer, $unique, $conf) {
		$h = new com_wiris_quizzes_impl_HTML();
		if($conf->optOpenAnswer) {
			$h->openDivClass("wiriseditorwrapper" . _hx_string_rec($unique, ""), "wiriseditorwrapper");
			$content = "";
			if($q->correctAnswers !== null && $q->correctAnswers->length > $correctAnswer) {
				$content = _hx_array_get($q->correctAnswers, $correctAnswer)->content;
			}
			$h->jsComponent("wiriscorrectanswer" . _hx_string_rec($unique, "") . "[" . _hx_string_rec($correctAnswer, "") . "]", "jsEditorInput", $content);
			$h->close();
		}
		$this->printLocalData($h, $q, $unique, $conf);
		return $h->getString();
	}
	public $lang;
	public $t;
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
	function __toString() { return 'com.wiris.quizzes.impl.HTMLGui'; }
}
function com_wiris_quizzes_impl_HTMLGui_0(&$»this, &$correctAnswer, &$h, &$hasUserAnswer, &$q, &$qi, &$unique) {
	if($hasUserAnswer) {
		return _hx_array_get($qi->userData->answers, 0)->content;
	} else {
		return "";
	}
}
function com_wiris_quizzes_impl_HTMLGui_1(&$»this, &$h, &$id, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(183);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_2(&$»this, &$h, &$id, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(183);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_3(&$»this, &$h, &$id, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(183);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_4(&$»this, &$h, &$id, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(215);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_5(&$»this, &$h, &$id, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(215);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_6(&$»this, &$h, &$id, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(215);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_7(&$»this, &$correctAnswer, &$h, &$i, &$id, &$q, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(960);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_8(&$»this, &$correctAnswer, &$h, &$i, &$id, &$letterpi, &$q, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(176);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_9(&$»this, &$correctAnswer, &$h, &$i, &$id, &$letterpi, &$q, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(176);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_10(&$»this, &$correctAnswer, &$h, &$i, &$id, &$letterpi, &$q, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(176);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_11(&$»this, &$correctAnswer, &$h, &$i, &$id, &$letterpi, &$q, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(937);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLGui_12(&$»this, &$correctAnswer, &$h, &$i, &$id, &$letterpi, &$q, &$unique) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(181);
		return $s->toString();
	}
}
