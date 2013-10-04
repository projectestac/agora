<?php

class com_wiris_quizzes_impl_HTMLGuiConfig {
	public function __construct($classes) {
		if(!php_Boot::$skip_constructor) {
		$this->configClasses = new _hx_array(array());
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
					$this->configClasses->push(com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISMULTICHOICE);
				} else {
					if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISOPENANSWER) {
						$this->openAnswerConfig();
						$this->configClasses->push(com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISOPENANSWER);
					} else {
						if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISESSAY) {
							$this->essayConfig();
							$this->configClasses->push(com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISESSAY);
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
					$this->configClasses->push(com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISVARIABLES);
				} else {
					if($className === com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISAUXILIARCAS) {
						$this->optAuxiliarCas = true;
						$this->tabCorrectAnswer = true;
						$this->configClasses->push(com_wiris_quizzes_impl_HTMLGuiConfig::$WIRISAUXILIARCAS);
					}
				}
				unset($i1,$className);
			}
		}
	}}
	public function getClasses() {
		$sb = new StringBuf();
		$i = null;
		{
			$_g1 = 0; $_g = $this->configClasses->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if($i1 > 0) {
					$sb->add(" ");
				}
				$sb->add($this->configClasses[$i1]);
				unset($i1);
			}
		}
		return $sb->b;
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
	}
	public function openAnswerConfig() {
		$this->tabCorrectAnswer = true;
		$this->tabValidation = true;
		$this->tabVariables = false;
		$this->tabPreview = true;
		$this->optOpenAnswer = true;
		$this->optAuxiliarCas = false;
		$this->optAuxiliarCasReplaceEditor = false;
	}
	public $configClasses;
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
	static $WIRISVARIABLES = "wirisvariables";
	static $WIRISAUXILIARCAS = "wirisauxiliarcas";
	function __toString() { return 'com.wiris.quizzes.impl.HTMLGuiConfig'; }
}
