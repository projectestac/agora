<?php

class com_wiris_quizzes_impl_HTMLGuiConfig {
	public function __construct($classes) {
		if(!php_Boot::$skip_constructor) {
		$this->openAnswerConfig();
		if($classes === null) {
			$classes = "";
		}
		$classArray = _hx_explode(" ", $classes);
		$i = null;
		{
			$_g1 = 0; $_g = $classArray->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$className = $classArray[$i1];
				if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISMULTICHOICE) {
					$this->multichoiceConfig();
				} else {
					if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISOPENANSWER) {
						$this->openAnswerConfig();
					} else {
						if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISESSAY) {
							$this->essayConfig();
						}
					}
				}
				unset($i1,$className);
			}
		}
		{
			$_g1 = 0; $_g = $classArray->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$className = $classArray[$i1];
				if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISVARIABLES) {
					$this->tabVariables = true;
				} else {
					if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISVALIDATION) {
						$this->tabValidation = true;
					} else {
						if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISPREVIEW) {
							$this->tabPreview = true;
						} else {
							if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISCORRECTANSWER) {
								$this->tabCorrectAnswer = true;
							} else {
								if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISAUXILIARCAS) {
									$this->optAuxiliarCas = true;
									$this->tabCorrectAnswer = true;
								} else {
									if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISAUXILIARCASREPLACEEDITOR) {
										$this->optAuxiliarCasReplaceEditor = true;
									} else {
										if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISTEACHERANSWER) {
											$this->optOpenAnswer = true;
										} else {
											if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISGRADINGFUNCTION) {
												$this->optGradingFunction = true;
											}
										}
									}
								}
							}
						}
					}
				}
				unset($i1,$className);
			}
		}
	}}
	public function add($sb, $className) {
		$sb->add($className);
		$sb->add(" ");
	}
	public function getClasses() {
		$sb = new StringBuf();
		if($this->tabCorrectAnswer) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISCORRECTANSWER);
		}
		if($this->tabValidation) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISVALIDATION);
		}
		if($this->tabVariables) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISVARIABLES);
		}
		if($this->tabPreview) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISPREVIEW);
		}
		if($this->optOpenAnswer) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISTEACHERANSWER);
		}
		if($this->optAuxiliarCas) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISAUXILIARCAS);
		}
		if($this->optAuxiliarCasReplaceEditor) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISAUXILIARCASREPLACEEDITOR);
		}
		if($this->optGradingFunction) {
			$this->add($sb, com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISGRADINGFUNCTION);
		}
		return trim($sb->b);
	}
	public function essayConfig() {
		$this->multichoiceConfig();
		$this->optAuxiliarCasReplaceEditor = true;
	}
	public function multichoiceConfig() {
		$this->tabCorrectAnswer = false;
		$this->tabValidation = false;
		$this->tabVariables = true;
		$this->tabPreview = false;
		$this->optOpenAnswer = false;
		$this->optAuxiliarCas = false;
		$this->optAuxiliarCasReplaceEditor = false;
		$this->optGradingFunction = false;
	}
	public function openAnswerConfig() {
		$this->tabCorrectAnswer = true;
		$this->tabValidation = true;
		$this->tabVariables = false;
		$this->tabPreview = true;
		$this->optOpenAnswer = true;
		$this->optAuxiliarCas = false;
		$this->optAuxiliarCasReplaceEditor = false;
		$this->optGradingFunction = false;
	}
	public $optGradingFunction;
	public $optAuxiliarCasReplaceEditor;
	public $optAuxiliarCas;
	public $optOpenAnswer;
	public $tabPreview;
	public $tabVariables;
	public $tabValidation;
	public $tabCorrectAnswer;
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
	static $WIRISMULTICHOICE = "wirismultichoice";
	static $WIRISOPENANSWER = "wirisopenanswer";
	static $WIRISESSAY = "wirisessay";
	static $WIRISCORRECTANSWER = "wiriscorrectanswer";
	static $WIRISVARIABLES = "wirisvariables";
	static $WIRISVALIDATION = "wirisvalidation";
	static $WIRISPREVIEW = "wirispreview";
	static $WIRISTEACHERANSWER = "wiristeacheranswer";
	static $WIRISAUXILIARCAS = "wirisauxiliarcas";
	static $WIRISAUXILIARCASREPLACEEDITOR = "wirisauxiliarcasreplaceeditor";
	static $WIRISGRADINGFUNCTION = "wirisgradingfunction";
	function __toString() { return 'com.wiris.quizzes.impl.HTMLGuiConfig'; }
}
