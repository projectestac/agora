<?php

class com_wiris_quizzes_impl_HTMLTools {
	public function __construct() { 
	}
	public function unitTestDev() {
		haxe_Log::trace("compare(a,a1)=" . _hx_string_rec(com_wiris_quizzes_impl_HTMLTools::compareStrings("a", "a1"), ""), _hx_anonymous(array("fileName" => "HTMLTools.hx", "lineNumber" => 1535, "className" => "com.wiris.quizzes.impl.HTMLTools", "methodName" => "unitTestDev")));
		$a = new _hx_array(array());
		$a->push("a");
		$a->push("a1");
		$s = $this->sortIterator($a->iterator());
		$i = null;
		$r = "";
		{
			$_g1 = 0; $_g = $s->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$r = $r . " " . $s[$i1];
				unset($i1);
			}
		}
		haxe_Log::trace("sort({a1,a})" . $r, _hx_anonymous(array("fileName" => "HTMLTools.hx", "lineNumber" => 1546, "className" => "com.wiris.quizzes.impl.HTMLTools", "methodName" => "unitTestDev")));
	}
	public function unitTest() {
		$this->unitTestReplaceVariablesInHTML();
		$this->unitTestUpdateReservedWords();
		$this->unitTestVariableNames();
		$this->unitTestConvertEditor2Newlines();
		$this->unitTestExtractText();
		$this->unitTestTextToMathML();
		$this->unitTestPrepareFormulasAlgorithm();
		$this->unitTestMathMLToText();
	}
	public function implode($a, $tok) {
		$sb = new StringBuf();
		$i = null;
		{
			$_g1 = 0; $_g = $a->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if($i1 > 0) {
					$sb->add($tok);
				}
				$sb->add($a[$i1]);
				unset($i1);
			}
		}
		return $sb->b;
	}
	public function unitTestVariableNames() {
		$html = new _hx_array(array("<math><mi>#a1</mi></math>", "<p>Calcular la corriente que circula por el condensador D del circuito adjunto. Los valores de los compenentes son: A = #A Ω;  B = #B Ω;  C = #C Ω;  D = #D Ω.</p>\x0A" . "<p><img src=\"@@PLUGINFILE@@/Circuito1.gif\" alt=\"\" width=\"424\" height=\"170\" /></p> <p>#x</p> <p>#x1</p> <p>#x2</p> <p>#x3</p> ", "<span style=\"color: #aaffaa;\">&#x32;#x_11</span>", "123 #a<ol>\x0A" . "<li><span style=\"background-color: #ffff00; font-family: 'times new roman', times, serif;\">Use inverse operations to undo Addition and Subtraction (add and/or subtract all terms from left to right)</span></li>\x0A" . "<li><span style=\"background-color: #ffff00; font-family: 'times new roman', times, serif;\">Use inverse operations to undo Multiplication and Division (multiply and/or divide all factors from left to right)</span></li>\x0A" . "</ol>", "ΩΩΩΩΩΩΩ<div>ΩΩΩ<p>ΩΩ#aΩΩ</p>ΩΩΩ</div>ΩΩΩΩΩΩΩ"));
		$vars = new _hx_array(array(new _hx_array(array("a1")), new _hx_array(array("A", "B", "C", "D", "x", "x1", "x2", "x3")), new _hx_array(array("x_11")), new _hx_array(array("a")), new _hx_array(array("a"))));
		$i = null;
		{
			$_g1 = 0; $_g = $html->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$v = $this->extractVariableNames($html[$i1]);
				$a1 = $this->implode($vars[$i1], ", ");
				$a2 = $this->implode($v, ", ");
				if(!($a1 === $a2)) {
					throw new HException("Expected: " . $a1 . ". Found: " . $a2 . ".");
				}
				unset($v,$i1,$a2,$a1);
			}
		}
	}
	public function unitTestMathMLToText() {
		$mathml = new _hx_array(array("<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>sin</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>+</mo><mn>1</mn></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#</mo><mi>F</mi><mo>+</mo><mi>C</mi></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mn>2</mn><mo>.</mo><mn>0</mn><mo>·</mo><mi>x</mi><mi>y</mi></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi mathvariant=\"normal\">sin</mi><mi>x</mi></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mfenced><mrow><mn>1</mn><mo>,</mo><mn>0</mn></mrow></mfenced></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mfrac><mn>1</mn><mn>3</mn></mfrac></math>", "<math><mfenced open=\"|\" close = \"|\"><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>0</mn></mtd></mtr><mtr><mtd><mn>0</mn></mtd><mtd><mn>1</mn></mtd></mtr></mtable></mfenced></math>", "<math><mfenced><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>0</mn></mtd></mtr><mtr><mtd><mn>0</mn></mtd><mtd><mn>1</mn></mtd></mtr></mtable></mfenced></math>"));
		$responses = new _hx_array(array("sin(x)+1", "#F+C", "2.0·xy", "sinx", "(1,0)", "1/3", "|((1,0),(0,1))|", "((1,0),(0,1))"));
		$i = null;
		{
			$_g1 = 0; $_g = $mathml->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$res = $this->mathMLToText($mathml[$i1]);
				if(!($res === $responses[$i1])) {
					throw new HException("Expected: '" . $responses[$i1] . "' but got: '" . $res . "'.");
				}
				unset($res,$i1);
			}
		}
	}
	public function unitTestTextToMathML() {
		$texts = new _hx_array(array("sin(x)+1", "#F +C", "2.0·xy"));
		$responses = new _hx_array(array("<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>sin</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>+</mo><mn>1</mn></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#</mo><mi>F</mi><mo> </mo><mo>+</mo><mi>C</mi></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mn>2</mn><mo>.</mo><mn>0</mn><mo>·</mo><mi>x</mi><mi>y</mi></math>"));
		$i = null;
		{
			$_g1 = 0; $_g = $texts->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$res = $this->textToMathML($texts[$i1]);
				if(!($res === $responses[$i1])) {
					throw new HException("Expected: '" . $responses[$i1] . "' but got: '" . $res . "'.");
				}
				unset($res,$i1);
			}
		}
	}
	public function unitTestReplaceVariablesInHTML() {
		$texts = new _hx_array(array("<math><mi>#a1</mi></math>", "<math><mo>#</mo><mi>a</mi><mn>1</mn></math>", "<p><img align=\"middle\" src=\"http://localhost/moodle21/lib/editor/tinymce/tiny_mce/3.4.2/plugins/tiny_mce_wiris/integration/showimage.php?formula=cb550f21cbc30fac59e4f2bba550693d.png\" /> + #dif</p>", "a  «math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;»«mfrac»«mrow»«mi»#«/mi»«mi»a«/mi»«mo»+«/mo»«mn»1«/mn»«/mrow»«mrow»«mi»#«/mi»«mi»b«/mi»«mo»-«/mo»«mn»1«/mn»«/mrow»«/mfrac»«/math» a", "<p>#a&#xa1;<script type=\"text/javascript\"> <!-- #a1 will be replaced by wiris quizzes --> <![CDATA[ a = #a1; ]]> </script> <select><option>#a</option><option>#a1</option></select></p>", "<math><mo>#</mo><mi>a</mi><mn>0</mn></math>"));
		$mml = new Hash();
		$mml->set("dif", "<math><mn>0</mn></math>");
		$mml->set("a", "<math><mi>x</mi></math>");
		$mml->set("b", "<math><mi>y</mi></math>");
		$mml->set("a1", "<math><mi>z</mi></math>");
		$txt = new Hash();
		$txt->set("dif", "0");
		$txt->set("a", "x");
		$txt->set("b", "y");
		$txt->set("a1", "z");
		$v = new Hash();
		$v->set(com_wiris_quizzes_impl_MathContent::$TYPE_MATHML, $mml);
		$v->set(com_wiris_quizzes_impl_MathContent::$TYPE_TEXT, $txt);
		$responses = new _hx_array(array("<math><mrow><mi>z</mi></mrow></math>", "<math><mrow><mi>z</mi></mrow></math>", "<p><img align=\"middle\" src=\"http://localhost/moodle21/lib/editor/tinymce/tiny_mce/3.4.2/plugins/tiny_mce_wiris/integration/showimage.php?formula=cb550f21cbc30fac59e4f2bba550693d.png\" /> + <math><mn>0</mn></math></p>", "a  «math xmlns=¨http://www.w3.org/1998/Math/MathML¨»«mfrac»«mrow»«mrow»«mi»x«/mi»«/mrow»«mo»+«/mo»«mn»1«/mn»«/mrow»«mrow»«mrow»«mi»y«/mi»«/mrow»«mo»-«/mo»«mn»1«/mn»«/mrow»«/mfrac»«/math» a", "<p><math><mi>x</mi></math>&#xa1;<script type=\"text/javascript\"> <!-- #a1 will be replaced by wiris quizzes --> <![CDATA[ a = z; ]]> </script> <select><option>x</option><option>z</option></select></p>", "<math><mrow><mrow><mi>x</mi></mrow><mo>0</mo></mrow></math>"));
		$i = null;
		{
			$_g1 = 0; $_g = $texts->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$res = $this->expandVariables($texts[$i1], $v);
				if(!($res === $responses[$i1])) {
					throw new HException("Expected: '" . $responses[$i1] . "' but got: '" . $res . "'.");
				}
				unset($res,$i1);
			}
		}
	}
	public function unitTestExtractText() {
		$inputs = new _hx_array(array("<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mrow><mtext>Cap de les altres</mtext></mrow></math>", "<math><mrow><mtext>La resposta és </mtext><mfrac><mfrac><mn>1</mn><mn>2</mn></mfrac><mi>x</mi></mfrac><mtext>.</mtext></mrow></math>", "<math><mrow><mo>(</mo><mtext>tiruliru</mtext><mo>)</mo></mrow></math>", "<math><mrow><msqrt><mtext>radicand</mtext></msqrt></mrow></math>"));
		$outputs = new _hx_array(array("Cap de les altres", "La resposta és <math><mrow><mfrac><mfrac><mn>1</mn><mn>2</mn></mfrac><mi>x</mi></mfrac></mrow></math>.", "<math><mrow><mo>(</mo></mrow></math>tiruliru<math><mrow><mo>)</mo></mrow></math>", "<math><mrow><msqrt><mtext>radicand</mtext></msqrt></mrow></math>"));
		$i = null;
		{
			$_g1 = 0; $_g = $inputs->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$coutput = $this->extractTextFromMathML($inputs[$i1]);
				if(!($coutput === $outputs[$i1])) {
					throw new HException("Expected: '" . $outputs[$i1] . "' but got: '" . $coutput . "'.");
				}
				unset($i1,$coutput);
			}
		}
	}
	public function unitTestPrepareFormulasAlgorithm() {
		$tests = new _hx_array(array("<math><mo>#</mo><mi>v</mi><mi>a</mi><mi>r</mi><mo>_</mo><mi>k</mi></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#</mo><mi>a</mi><mo>&#160;</mo><mo>+</mo><mo>#</mo><mi>b</mi></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>p</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>=</mo><mi>#</mi><mi>p</mi></math>", "<math><mrow><mi>#</mi><mi>f</mi></mrow></math>", "<math><mrow><mi>#</mi><msup><mi>f</mi><mn>2</mn></msup></mrow></math>", "<math><mrow><msqrt><mrow><mn>2</mn><msqrt><mn>3</mn></msqrt></mrow></msqrt><mi>#</mi><mi>a</mi></mrow></math>", "<math><mrow><msub><mi>#</mi><mi>a</mi></msub></mrow></math>", "<math><mrow><mi>#</mi><msub><mi>a</mi><mi>c</mi></msub></mrow></math>", "<math><mrow><msqrt><mrow><mi>#</mi><mi>f</mi><mi>u</mi><mi>n</mi><mi>c</mi></mrow></msqrt></mrow></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>&#8594;</mo><mn>0</mn></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>x</mi><mo>=</mo><mo>#</mo><mi>a</mi><mspace linebreak=\"newline\"/><mi>y</mi><mo>=</mo><mo>#</mo><mi>b</mi></math>"));
		$responses = new _hx_array(array("<math><mo>#var_k</mo></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#a</mo><mo>&#160;</mo><mo>+</mo><mo>#b</mo></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>p</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>=</mo><mi>#p</mi></math>", "<math><mrow><mi>#f</mi></mrow></math>", "<math><mrow><msup><mi>#f</mi><mn>2</mn></msup></mrow></math>", "<math><mrow><msqrt><mrow><mn>2</mn><msqrt><mn>3</mn></msqrt></mrow></msqrt><mi>#a</mi></mrow></math>", "<math><mrow><msub><mi>#</mi><mi>a</mi></msub></mrow></math>", "<math><mrow><msub><mi>#a</mi><mi>c</mi></msub></mrow></math>", "<math><mrow><msqrt><mrow><mi>#func</mi></mrow></msqrt></mrow></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>&#8594;</mo><mn>0</mn></math>", "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>x</mi><mo>=</mo><mo>#a</mo><mspace linebreak=\"newline\"/><mi>y</mi><mo>=</mo><mo>#b</mo></math>"));
		$i = null;
		{
			$_g1 = 0; $_g = $tests->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$res = $this->prepareFormulas($tests[$i1]);
				if(!($res === $responses[$i1])) {
					throw new HException("Expected: '" . $responses[$i1] . "' but got: '" . $res . "'.");
				}
				unset($res,$i1);
			}
		}
	}
	public function unitTestConvertEditor2Newlines() {
		$tests = new _hx_array(array("<mtable columnalign=\"left\" rowspacing=\"0\"><mtr><mtd><mfenced><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr><mtr><mtd><mtable><mtr><mtd><mi>a</mi></mtd><mtd><mi>b</mi></mtd></mtr></mtable></mtd><mtd><mn>2</mn></mtd></mtr></mtable></mfenced></mtd></mtr><mtr><mtd><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr></mtable></mtd></mtr></mtable>"));
		$res = new _hx_array(array("<math><mfenced><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr><mtr><mtd><mtable><mtr><mtd><mi>a</mi></mtd><mtd><mi>b</mi></mtd></mtr></mtable></mtd><mtd><mn>2</mn></mtd></mtr></mtable></mfenced><mspace linebreak=\"newline\"/><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr></mtable></math>"));
		$i = null;
		{
			$_g1 = 0; $_g = $tests->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$u = com_wiris_quizzes_impl_HTMLTools::convertEditor2Newlines($tests[$i1]);
				if(!($u === $res[$i1])) {
					throw new HException("Expected: " . $res[$i1] . ". Got: " . $u . ".");
				}
				unset($u,$i1);
			}
		}
	}
	public function unitTestUpdateReservedWords() {
		$tests = new _hx_array(array("<math><mi>si</mi><mi>n</mi><mi>x</mi></math>", "<math><mn>2</mn><mi>k</mi><mi>m</mi></math>", "<math><mn>2</mn><mi>k</mi><mo>&nbsp;</mo><mi>m</mi></math>"));
		$words = new _hx_array(array());
		$words->push("s");
		$words->push("si");
		$words->push("sin");
		$words->push("m");
		$words->push("km");
		$res = new _hx_array(array("<math><mi>sin</mi><mi>x</mi></math>", "<math><mn>2</mn><mi>km</mi></math>", "<math><mn>2</mn><mi>k</mi><mo>&nbsp;</mo><mi mathvariant=\"normal\">m</mi></math>"));
		$i = null;
		{
			$_g1 = 0; $_g = $tests->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$u = $this->updateReservedWords($tests[$i1], $words);
				if(!($u === $res[$i1])) {
					throw new HException("Expected: " . $res[$i1] . ". Got: " . $u . ".");
				}
				unset($u,$i1);
			}
		}
	}
	public function fullMathML2TextImpl($e) {
		$sb = new StringBuf();
		if($e->getNodeName() === "mo" || $e->getNodeName() === "mn" || $e->getNodeName() === "mi") {
			$sb->add(com_wiris_util_xml_WXmlUtils::getNodeValue($e->firstChild()));
		} else {
			if($e->getNodeName() === "mfenced" || $e->getNodeName() === "mtr" || $e->getNodeName() === "mtable") {
				$open = $e->get("open");
				if($open === null) {
					$open = "(";
				}
				$close = $e->get("close");
				if($close === null) {
					$close = ")";
				}
				$separators = $e->get("separators");
				if($separators === null) {
					$separators = ",";
				}
				if($open === "(" && $close === ")" && $e->firstElement()->getNodeName() === "mtable") {
					$open = "";
					$close = "";
				}
				$sb->add($open);
				$it = $e->elements();
				$i = 0;
				$n = haxe_Utf8::length($separators);
				while($it->hasNext()) {
					if($i > 0 && $n > 0) {
						$sb->add(com_wiris_quizzes_impl_HTMLTools_0($this, $close, $e, $i, $it, $n, $open, $sb, $separators));
					}
					$sb->add($this->fullMathML2TextImpl($it->next()));
					$i++;
				}
				$sb->add($close);
			} else {
				if($e->getNodeName() === "mfrac") {
					$it = $e->elements();
					$num = $this->fullMathML2TextImpl($it->next());
					if(strlen($num) > 1) {
						$num = "(" . $num . ")";
					}
					$den = $this->fullMathML2TextImpl($it->next());
					if(strlen($den) > 1) {
						$den = "(" . $den . ")";
					}
					$sb->add($num);
					$sb->add("/");
					$sb->add($den);
				} else {
					if($e->getNodeName() === "msup") {
						$it = $e->elements();
						$bas = $this->fullMathML2TextImpl($it->next());
						if(strlen($bas) > 1) {
							$bas = "(" . $bas . ")";
						}
						$exp = $this->fullMathML2TextImpl($it->next());
						if(strlen($exp) > 1) {
							$exp = "(" . $exp . ")";
						}
						$sb->add($bas);
						$sb->add("^");
						$sb->add($exp);
					} else {
						$it = $e->elements();
						while($it->hasNext()) {
							$sb->add($this->fullMathML2TextImpl($it->next()));
						}
					}
				}
			}
		}
		return $sb->b;
	}
	public function mathMLToText($mathml) {
		$root = com_wiris_util_xml_WXmlUtils::parseXML($mathml);
		if($root->nodeType == Xml::$Document) {
			$root = $root->firstElement();
		}
		return $this->fullMathML2TextImpl($root);
	}
	public function updateReservedWords($mathml, $words) {
		$mathml = $this->breakWords($mathml);
		$mathml = $this->joinWords($mathml, $words);
		return $mathml;
	}
	public function getBrokenWordMathML($word) {
		$sb = new StringBuf();
		$n = haxe_Utf8::length($word);
		$i = null;
		{
			$_g = 0;
			while($_g < $n) {
				$i1 = $_g++;
				$sb->add("<mi>");
				$sb->add(com_wiris_quizzes_impl_HTMLTools_1($this, $_g, $i, $i1, $n, $sb, $word));
				$sb->add("</mi>");
				unset($i1);
			}
		}
		return $sb->b;
	}
	public function standardWordMathML($word) {
		if(haxe_Utf8::length($word) > 1) {
			return "<mi>" . $word . "</mi>";
		} else {
			return "<mi mathvariant=\"normal\">" . $word . "</mi>";
		}
	}
	public function joinWords($mathml, $words) {
		$sb = new StringBuf();
		$start = 0;
		$end = 0;
		while(($start = _hx_index_of($mathml, "<mi>", $end)) !== -1) {
			$sb->add(_hx_substr($mathml, $end, $start - $end));
			$i = null;
			$max = 0;
			$n = -1;
			{
				$_g1 = 0; $_g = $words->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$word = $words[$i1];
					if(strlen($word) > $max) {
						$wml = $this->getBrokenWordMathML($words[$i1]);
						if($start + strlen($wml) < strlen($mathml) && _hx_substr($mathml, $start, strlen($wml)) === $wml) {
							$max = strlen($word);
							$n = $i1;
						}
						unset($wml);
					}
					unset($word,$i1);
				}
				unset($_g1,$_g);
			}
			if($n !== -1) {
				$sb->add($this->standardWordMathML($words[$n]));
				$end = $start + strlen($this->getBrokenWordMathML($words[$n]));
			} else {
				$sb->add("<mi>");
				$end = $start + 4;
			}
			unset($n,$max,$i);
		}
		$sb->add(_hx_substr($mathml, $end, null));
		return $sb->b;
	}
	public function breakWords($mathml) {
		$sb = new StringBuf();
		$start = 0;
		$end = 0;
		while(($start = _hx_index_of($mathml, "<mi", $end)) !== -1) {
			$sb->add(_hx_substr($mathml, $end, $start - $end));
			$wstart = $start + 3;
			$next = _hx_substr($mathml, $wstart, 1);
			if($next === " ") {
				$wstart = _hx_index_of($mathml, ">", $wstart);
			} else {
				if(!($next === ">")) {
					$sb->add(_hx_substr($mathml, $start, 1));
					$end = $start + 1;
					continue;
				}
			}
			$wstart++;
			$wend = _hx_index_of($mathml, "</mi>", $start);
			$word = _hx_substr($mathml, $wstart, $wend - $wstart);
			$end = $wend + 5;
			$n = haxe_Utf8::length($word);
			$i = 0;
			while($i < $n) {
				$sb->add("<mi>");
				$ch = com_wiris_quizzes_impl_HTMLTools_2($this, $end, $i, $mathml, $n, $next, $sb, $start, $wend, $word, $wstart);
				if($ch === "&") {
					$ent = new StringBuf();
					$ent->add($ch);
					do {
						$i++;
						$ch = com_wiris_quizzes_impl_HTMLTools_3($this, $ch, $end, $ent, $i, $mathml, $n, $next, $sb, $start, $wend, $word, $wstart);
						$ent->add($ch);
					} while(!($ch === ";"));
					$ch = com_wiris_util_xml_WXmlUtils::htmlUnescape($ent->b);
					unset($ent);
				}
				$sb->add($ch);
				$sb->add("</mi>");
				$i++;
				unset($ch);
			}
			unset($wstart,$word,$wend,$next,$n,$i);
		}
		$sb->add(_hx_substr($mathml, $end, null));
		return $sb->b;
	}
	public function getParentTag($s, $n) {
		$stack = new _hx_array(array());
		$error = false;
		while(($n = _hx_index_of($s, "<", $n)) !== -1 && !$error) {
			if($this->isQuizzesIdentifierStart(_hx_char_code_at($s, $n + 1))) {
				$close = _hx_index_of($s, ">", $n);
				$space = _hx_index_of($s, " ", $n);
				if($space !== -1 && $space < $close) {
					$close = $space;
				}
				if($close !== -1) {
					$stack->push(_hx_substr($s, $n + 1, $close - $n - 1));
				} else {
					$error = true;
				}
				unset($space,$close);
			} else {
				if(_hx_char_code_at($s, $n + 1) === 47) {
					$close = _hx_index_of($s, ">", $n);
					$tag = _hx_substr($s, $n + 2, $close - $n - 2);
					if($stack->length === 0) {
						return $tag;
					} else {
						if(!($stack->pop() === $tag)) {
							$error = true;
						}
					}
					unset($tag,$close);
				} else {
					if(_hx_substr($s, $n, 4) === "<!--") {
						$n = _hx_index_of($s, "-->", $n);
						if($n === -1) {
							$error = true;
						}
					}
				}
			}
			$n++;
		}
		return null;
	}
	public function isEntity($s, $n) {
		if($n > 0 && _hx_char_code_at($s, $n - 1) === 38) {
			$n++;
			$end = _hx_index_of($s, ";", $n);
			if($end !== -1) {
				while($this->isQuizzesIdentifierPart(_hx_char_code_at($s, $n))) {
					$n++;
				}
				return $n === $end;
			}
		}
		return false;
	}
	public function variablePosition($s, $n) {
		if($this->insideTag($s, $n) || $this->isEntity($s, $n) || $this->insideComment($s, $n)) {
			return com_wiris_quizzes_impl_HTMLTools::$POSITION_NONE;
		} else {
			$parent = $this->getParentTag($s, $n);
			if($parent === null) {
				return com_wiris_quizzes_impl_HTMLTools::$POSITION_ALL;
			}
			if($parent === "script" || $parent === "option") {
				return com_wiris_quizzes_impl_HTMLTools::$POSITION_ONLY_TEXT;
			} else {
				if($parent === "style") {
					return com_wiris_quizzes_impl_HTMLTools::$POSITION_NONE;
				} else {
					if($parent === "mi" || $parent === "mo" || $parent === "mtext" || $parent === "ms") {
						return com_wiris_quizzes_impl_HTMLTools::$POSITION_ONLY_MATHML;
					} else {
						return com_wiris_quizzes_impl_HTMLTools::$POSITION_ALL;
					}
				}
			}
		}
	}
	public function extractTextFromMathML($formula) {
		if(_hx_index_of($formula, "<mtext", null) === -1) {
			return $formula;
		}
		$allowedTags = new _hx_array(array("math", "mrow"));
		$stack = new _hx_array(array());
		$omittedcontent = false;
		$lasttag = null;
		$beginformula = _hx_index_of($formula, "<", null);
		$start = null;
		$end = 0;
		while($end < strlen($formula) && ($start = _hx_index_of($formula, "<", $end)) !== -1) {
			$end = _hx_index_of($formula, ">", $start);
			$tag = _hx_substr($formula, $start, $end - $start + 1);
			$trimmedTag = _hx_substr($formula, $start + 1, $end - $start - 1);
			if(_hx_substr($trimmedTag, strlen($trimmedTag) - 1, null) === "/") {
				continue;
			}
			$spacepos = _hx_index_of($tag, " ", null);
			if($spacepos !== -1) {
				$trimmedTag = _hx_substr($tag, 1, $spacepos - 1);
			}
			if($this->inArray($trimmedTag, $allowedTags)) {
				$stack->push(new _hx_array(array($trimmedTag, $tag)));
				$lasttag = $trimmedTag;
			} else {
				if($trimmedTag === "/" . $lasttag) {
					$stack->pop();
					if($stack->length > 0) {
						$lastpair = $stack[$stack->length - 1];
						$lasttag = $lastpair[0];
						unset($lastpair);
					} else {
						$lasttag = null;
					}
					if($stack->length === 0 && !$omittedcontent) {
						$formula1 = _hx_substr($formula, 0, $beginformula);
						if($end < strlen($formula) - 1) {
							$formula2 = _hx_substr($formula, $end + 1, null);
							$formula = $formula1 . $formula2;
							unset($formula2);
						} else {
							$formula = $formula1;
						}
						unset($formula1);
					}
				} else {
					if($trimmedTag === "mtext") {
						$pos2 = _hx_index_of($formula, "</mtext>", $start);
						$text = _hx_substr($formula, $start + 7, $pos2 - $start - 7);
						$text = str_replace("&centerdot;", "&middot;", $text);
						$text = str_replace("&apos;", "&#39;", $text);
						$formula1 = _hx_substr($formula, 0, $start);
						$formula2 = _hx_substr($formula, $pos2 + 8, null);
						if($omittedcontent) {
							$tail1 = "";
							$head2 = "";
							$i = $stack->length - 1;
							while($i >= 0) {
								$pair = $stack[$i];
								$tail1 = $tail1 . "</" . $pair[0] . ">";
								$head2 = $pair[1] . $head2;
								$i--;
								unset($pair);
							}
							$formula1 = $formula1 . $tail1;
							$formula2 = $head2 . $formula2;
							if(com_wiris_quizzes_impl_MathContent::isEmpty($formula2)) {
								$formula2 = "";
							}
							$formula = $formula1 . $text . $formula2;
							$beginformula = $start + strlen($tail1) + strlen($text);
							$end = $beginformula + strlen($head2);
							unset($tail1,$i,$head2);
						} else {
							$head = _hx_substr($formula1, 0, $beginformula);
							$head2 = _hx_substr($formula1, $beginformula, null);
							$formula2 = $head2 . $formula2;
							if(com_wiris_quizzes_impl_MathContent::isEmpty($formula2)) {
								$formula2 = "";
							}
							$formula = $head . $text . $formula2;
							$beginformula += strlen($text);
							$end = $beginformula + strlen($formula1);
							unset($head2,$head);
						}
						$omittedcontent = false;
						unset($text,$pos2,$formula2,$formula1);
					} else {
						$num = 1;
						$pos = $start + strlen($tag);
						while($num > 0) {
							$end = _hx_index_of($formula, "</" . $trimmedTag . ">", $pos);
							$mid = _hx_index_of($formula, "<" . $trimmedTag, $pos);
							if($end === -1) {
								return $formula;
							} else {
								if($mid === -1 || $end < $mid) {
									$num--;
									$pos = $end + strlen(("</" . $trimmedTag . ">"));
								} else {
									$pos = $mid + strlen(("<" . $trimmedTag));
									$num++;
								}
							}
							unset($mid);
						}
						$end += strlen(("</" . $trimmedTag . ">"));
						$omittedcontent = true;
						unset($pos,$num);
					}
				}
			}
			unset($trimmedTag,$tag,$spacepos);
		}
		return $formula;
	}
	public function addImageTag($filename) {
		$url = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL) . "?service=cache&name=" . $filename;
		$h = new com_wiris_quizzes_impl_HTML();
		$id = _hx_substr($filename, 0, _hx_index_of($filename, ".", null));
		$h->image($id, $url, null, null);
		return $h->getString();
	}
	public function isTokensMathML($mathml) {
		$mathml = com_wiris_quizzes_impl_HTMLTools::stripRootTag($mathml, "math");
		$allowedTags = new _hx_array(array("mrow", "mn", "mi", "mo"));
		$start = 0;
		while(($start = _hx_index_of($mathml, "<", $start)) !== -1) {
			$sb = new StringBuf();
			$start++;
			$c = _hx_char_code_at($mathml, $start);
			if($c === 47) {
				continue;
			}
			while($c !== 32 && $c !== 47 && $c !== 62) {
				$sb->b .= chr($c);
				$start++;
				$c = _hx_char_code_at($mathml, $start);
			}
			if($c === 32 || $c === 47) {
				return false;
			}
			$tagname = $sb->b;
			if(!$this->inArray($tagname, $allowedTags)) {
				return false;
			}
			$start++;
			$end = _hx_index_of($mathml, "<", $start);
			$content = _hx_substr($mathml, $start, $end - $start);
			$i = null;
			{
				$_g1 = 0; $_g = strlen($content);
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$c = _hx_char_code_at($content, $i1);
					if(!($c === 35 || $c >= 48 && $c <= 57 || $c >= 65 && $c <= 90 || $c >= 97 && $c <= 122)) {
						return false;
					}
					unset($i1);
				}
				unset($_g1,$_g);
			}
			unset($tagname,$sb,$i,$end,$content,$c);
		}
		return true;
	}
	public function textToMathML($text) {
		$mathml = new StringBuf();
		$token = null;
		$n = haxe_Utf8::length($text);
		$i = 0;
		while($i < $n) {
			$c = haxe_Utf8::charCodeAt($text, $i);
			if(com_wiris_quizzes_impl_HTMLTools::isDigit($c)) {
				$token = new StringBuf();
				while($i < $n && com_wiris_quizzes_impl_HTMLTools::isDigit($c)) {
					$token->b .= chr($c);
					$i++;
					if($i < $n) {
						$c = haxe_Utf8::charCodeAt($text, $i);
					}
				}
				$mathml->add("<mn>");
				$mathml->add($token->b);
				$mathml->add("</mn>");
			} else {
				if(com_wiris_quizzes_impl_HTMLTools::isLetter($c)) {
					$token = new StringBuf();
					while($i < $n && com_wiris_quizzes_impl_HTMLTools::isLetter($c)) {
						$token->add(com_wiris_quizzes_impl_HTMLTools_4($this, $c, $i, $mathml, $n, $text, $token));
						$i++;
						if($i < $n) {
							$c = haxe_Utf8::charCodeAt($text, $i);
						}
					}
					$tok = $token->b;
					$tokens = null;
					if($this->isReservedWord($tok)) {
						$tokens = new _hx_array(array($tok));
					} else {
						$m = haxe_Utf8::length($tok);
						$tokens = new _hx_array(array());
						$j = null;
						{
							$_g = 0;
							while($_g < $m) {
								$j1 = $_g++;
								$tokens[$j1] = com_wiris_quizzes_impl_HTMLTools_5($this, $_g, $c, $i, $j, $j1, $m, $mathml, $n, $text, $tok, $token, $tokens);
								unset($j1);
							}
							unset($_g);
						}
						unset($m,$j);
					}
					$k = null;
					{
						$_g1 = 0; $_g = $tokens->length;
						while($_g1 < $_g) {
							$k1 = $_g1++;
							$mathml->add("<mi>");
							$mathml->add($tokens[$k1]);
							$mathml->add("</mi>");
							unset($k1);
						}
						unset($_g1,$_g);
					}
					unset($tokens,$tok,$k);
				} else {
					$mathml->add("<mo>");
					if($c === 32) {
						$c = 160;
					}
					$mathml->add(com_wiris_quizzes_impl_HTMLTools_6($this, $c, $i, $mathml, $n, $text, $token));
					$mathml->add("</mo>");
					$i++;
					if($i < $n) {
						$c = haxe_Utf8::charCodeAt($text, $i);
					}
				}
			}
			unset($c);
		}
		$result = $this->addMathTag($mathml->b);
		return $result;
	}
	public function isReservedWord($word) {
		$reservedWords = new _hx_array(array("sin", "cos", "tan", "log", "ln"));
		return $this->inArray($word, $reservedWords);
	}
	public function toSubFormula($mathml) {
		$mathml = com_wiris_quizzes_impl_HTMLTools::stripRootTag($mathml, "math");
		return "<mrow>" . $mathml . "</mrow>";
	}
	public function addMathTag($mathml) {
		if(!StringTools::startsWith($mathml, "<math")) {
			$mathml = "<math xmlns=\"http://www.w3.org/1998/Math/MathML\">" . $mathml . "</math>";
		}
		return $mathml;
	}
	public function inArray($value, $array) {
		$i = null;
		{
			$_g1 = 0; $_g = $array->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if($array[$i1] === $value) {
					return true;
				}
				unset($i1);
			}
		}
		return false;
	}
	public function prepareFormulas($text) {
		$start = 0;
		while(($start = _hx_index_of($text, "<math", $start)) !== -1) {
			$length = _hx_index_of($text, "</math>", $start) - $start + strlen("</math>");
			$formula = _hx_substr($text, $start, $length);
			$pos = 0;
			while(($pos = _hx_index_of($formula, "#", $pos)) !== -1) {
				$initag = $pos;
				while($initag >= 0 && _hx_char_code_at($formula, $initag) !== 60) {
					$initag--;
				}
				$parentpos = $initag;
				$parenttag = null;
				$parenttagname = null;
				while($parenttag === null) {
					while($parentpos >= 2 && _hx_char_code_at($formula, $parentpos - 2) === 47 && _hx_char_code_at($formula, $parentpos - 1) === 62) {
						$parentpos -= 2;
						while($parentpos >= 0 && _hx_char_code_at($formula, $parentpos) !== 60) {
							$parentpos--;
						}
					}
					$parentpos--;
					while($parentpos >= 0 && _hx_char_code_at($formula, $parentpos) !== 60) {
						$parentpos--;
					}
					if(_hx_char_code_at($formula, $parentpos) === 60 && _hx_char_code_at($formula, $parentpos + 1) === 47) {
						$namepos = $parentpos + strlen("</");
						$character = _hx_char_code_at($formula, $namepos);
						$nameBuf = new StringBuf();
						while($this->isQuizzesIdentifierPart($character)) {
							$nameBuf->b .= chr($character);
							$namepos++;
							$character = _hx_char_code_at($formula, $namepos);
						}
						$name = $nameBuf->b;
						$depth = 1;
						$namelength = strlen($name);
						while($depth > 0 && $parentpos >= 0) {
							$currentTagName = _hx_substr($formula, $parentpos, $namelength);
							if($name === $currentTagName) {
								$currentStartTag = _hx_substr($formula, $parentpos - strlen("<"), $namelength + strlen("<"));
								if("<" . $name === $currentStartTag && _hx_index_of($formula, ">", $parentpos) < _hx_index_of($formula, "/", $parentpos)) {
									$depth--;
								} else {
									$currentOpenCloseTag = _hx_substr($formula, $parentpos - strlen("</"), $namelength + strlen("</"));
									if("</" . $name === $currentOpenCloseTag) {
										$depth++;
									}
									unset($currentOpenCloseTag);
								}
								unset($currentStartTag);
							}
							if($depth > 0) {
								$parentpos--;
							} else {
								$parentpos -= strlen("<");
							}
							unset($currentTagName);
						}
						if($depth > 0) {
							return $text;
						}
						unset($namepos,$namelength,$nameBuf,$name,$depth,$character);
					} else {
						$parenttag = _hx_substr($formula, $parentpos, _hx_index_of($formula, ">", $parentpos) - $parentpos + 1);
						$parenttagname = _hx_substr($parenttag, 1, strlen($parenttag) - 2);
						if(_hx_index_of($parenttagname, " ", null) !== -1) {
							$parenttagname = _hx_substr($parenttagname, 0, _hx_index_of($parenttagname, " ", null));
						}
					}
				}
				$allowedparenttags = new _hx_array(array("mrow", "mtd", "math", "msqrt", "mstyle", "merror", "mpadded", "mphantom", "menclose"));
				if($this->inArray($parenttagname, $allowedparenttags)) {
					$firstchar = true;
					$appendpos = $pos + 1;
					$character = _hx_char_code_at($formula, $appendpos);
					while($this->isQuizzesIdentifierStart($character) || $this->isQuizzesIdentifierPart($character) && !$firstchar) {
						$appendpos++;
						$character = _hx_char_code_at($formula, $appendpos);
						$firstchar = false;
					}
					if(_hx_char_code_at($formula, $appendpos) !== 60) {
						$pos++;
						continue;
					}
					$nextpos = _hx_index_of($formula, ">", $pos);
					$end = false;
					while(!$end && $nextpos !== -1 && $pos + strlen(">") < strlen($formula)) {
						$nextpos += strlen(">");
						$nexttaglength = _hx_index_of($formula, ">", $nextpos) - $nextpos + strlen(">");
						$nexttag = _hx_substr($formula, $nextpos, $nexttaglength);
						$nexttagname = _hx_substr($nexttag, 1, strlen($nexttag) - 2);
						if(_hx_index_of($nexttagname, " ", null) !== -1) {
							$nexttagname = _hx_substr($nexttagname, 0, _hx_index_of($nexttagname, " ", null));
						}
						$specialtag = null;
						$speciallength = 0;
						if($nexttagname === "msup" || $nexttagname === "msub" || $nexttagname === "msubsup") {
							$specialtag = $nexttag;
							$speciallength = $nexttaglength;
							$nextpos = $nextpos + $nexttaglength;
							$nexttaglength = _hx_index_of($formula, ">", $nextpos) - $nextpos + strlen(">");
							$nexttag = _hx_substr($formula, $nextpos, $nexttaglength);
							$nexttagname = _hx_substr($nexttag, 1, strlen($nexttag) - 2);
							if(_hx_index_of($nexttagname, " ", null) !== -1) {
								$nexttagname = _hx_substr($nexttagname, 0, _hx_index_of($nexttagname, " ", null));
							}
						}
						if($nexttagname === "mi" || $nexttagname === "mn" || $nexttagname === "mo") {
							$contentpos = $nextpos + $nexttaglength;
							$toappend = new StringBuf();
							$character = _hx_char_code_at($formula, $contentpos);
							while($this->isQuizzesIdentifierStart($character) || $this->isQuizzesIdentifierPart($character) && !$firstchar) {
								$contentpos++;
								$toappend->b .= chr($character);
								$character = _hx_char_code_at($formula, $contentpos);
								$firstchar = false;
							}
							$toAppendStr = $toappend->b;
							$nextclosepos = _hx_index_of($formula, "<", $contentpos);
							$nextcloseend = _hx_index_of($formula, ">", $nextclosepos) + strlen(">");
							if(strlen($toAppendStr) === 0) {
								$end = true;
							} else {
								if($nextclosepos !== $contentpos) {
									$content = _hx_substr($formula, $contentpos, $nextclosepos - $contentpos);
									$nextclosetag = _hx_substr($formula, $nextclosepos, $nextcloseend - $nextclosepos);
									$newnexttag = $nexttag . $content . $nextclosetag;
									$formula = _hx_substr($formula, 0, $nextpos) . $newnexttag . _hx_substr($formula, $nextcloseend, null);
									$formula = _hx_substr($formula, 0, $appendpos) . $toAppendStr . _hx_substr($formula, $appendpos, null);
									$end = true;
									unset($nextclosetag,$newnexttag,$content);
								} else {
									$formula = _hx_substr($formula, 0, $nextpos) . _hx_substr($formula, $nextcloseend, null);
									$formula = _hx_substr($formula, 0, $appendpos) . $toAppendStr . _hx_substr($formula, $appendpos, null);
									if($specialtag !== null) {
										$fulltaglength = _hx_index_of($formula, ">", $appendpos) + strlen(">") - $initag;
										$formula = _hx_substr($formula, 0, $initag) . $specialtag . _hx_substr($formula, $initag, $fulltaglength) . _hx_substr($formula, $initag + $fulltaglength + $speciallength, null);
										$end = true;
										unset($fulltaglength);
									}
								}
							}
							$appendpos += strlen($toAppendStr);
							unset($toappend,$toAppendStr,$nextclosepos,$nextcloseend,$contentpos);
						} else {
							$end = true;
						}
						if(!$end) {
							$nextpos = _hx_index_of($formula, ">", $pos);
						}
						unset($specialtag,$speciallength,$nexttagname,$nexttaglength,$nexttag);
					}
					unset($nextpos,$firstchar,$end,$character,$appendpos);
				}
				$pos++;
				unset($parenttagname,$parenttag,$parentpos,$initag,$allowedparenttags);
			}
			$text = _hx_substr($text, 0, $start) . $formula . _hx_substr($text, $start + $length, null);
			$start = $start + strlen($formula);
			unset($pos,$length,$formula);
		}
		return $text;
	}
	public function sortIterator($it) {
		$sorted = new _hx_array(array());
		while($it->hasNext()) {
			$a = $it->next();
			$j = 0;
			while($j < $sorted->length) {
				if(com_wiris_quizzes_impl_HTMLTools::compareStrings($sorted[$j], $a) > 0) {
					break;
				}
				$j++;
			}
			$sorted->insert($j, $a);
			unset($j,$a);
		}
		return $sorted;
	}
	public function getPlaceHolder($name) {
		return "#" . $name;
	}
	public function insideComment($html, $pos) {
		$beginComment = $this->lastIndexOf($html, "<!--", $pos);
		if($beginComment !== -1) {
			$endComment = $this->lastIndexOf($html, "-->", $pos);
			return $endComment < $beginComment;
		}
		return false;
	}
	public function lastIndexOf($src, $str, $pos) {
		return _hx_last_index_of(_hx_substr($src, 0, $pos), $str, null);
	}
	public function insideTag($html, $pos) {
		$beginTag = $this->lastIndexOf($html, "<", $pos);
		while($beginTag !== -1 && !$this->isQuizzesIdentifierStart(_hx_char_code_at($html, $beginTag + 1))) {
			if($beginTag === 0) {
				return false;
			}
			$beginTag = $this->lastIndexOf($html, "<", $beginTag - 1);
		}
		if($beginTag === -1) {
			return false;
		}
		$endTag = _hx_index_of($html, ">", $beginTag);
		return $endTag > $pos;
	}
	public function isQuizzesIdentifierPart($c) {
		return $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 95 || $c >= 48 && $c <= 57;
	}
	public function isQuizzesIdentifierStart($c) {
		return $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 95;
	}
	public function getVariableName($html, $pos) {
		$name = null;
		if(_hx_char_code_at($html, $pos) === 35) {
			$end = $pos + 1;
			if($end < strlen($html)) {
				$c = _hx_char_code_at($html, $end);
				if($this->isQuizzesIdentifierStart($c)) {
					$end++;
					while($end < strlen($html) && $this->isQuizzesIdentifierPart(_hx_char_code_at($html, $end))) {
						$end++;
					}
					$name = _hx_substr($html, $pos + 1, $end - ($pos + 1));
				}
			}
		}
		return $name;
	}
	public function replaceVariablesInsideHTML($token, $variables, $type) {
		$mathml = $type === com_wiris_quizzes_impl_MathContent::$TYPE_MATHML;
		$text = $type === com_wiris_quizzes_impl_MathContent::$TYPE_TEXT;
		$image = $type === com_wiris_quizzes_impl_MathContent::$TYPE_IMAGE_REF;
		$keys = $this->sortIterator($variables->keys());
		$j = $keys->length - 1;
		while($j >= 0) {
			$name = $keys[$j];
			$placeholder = $this->getPlaceHolder($name);
			$pos = 0;
			while(($pos = _hx_index_of($token, $placeholder, $pos)) !== -1) {
				$v = $this->variablePosition($token, $pos);
				if(($v === com_wiris_quizzes_impl_HTMLTools::$POSITION_ALL || $text && $v === com_wiris_quizzes_impl_HTMLTools::$POSITION_ONLY_TEXT || $mathml && $v === com_wiris_quizzes_impl_HTMLTools::$POSITION_ONLY_MATHML) && $name === $this->getVariableName($token, $pos)) {
					$value = $variables->get($name);
					if($text) {
						$value = com_wiris_util_xml_WXmlUtils::htmlEscape($value);
					} else {
						if($mathml) {
							$value = $this->addMathTag($value);
							$value = $this->extractTextFromMathML($value);
						} else {
							if($image) {
								$value = $this->addImageTag($value);
							}
						}
					}
					$token = _hx_substr($token, 0, $pos) . $value . _hx_substr($token, $pos + strlen($placeholder), null);
					$pos += strlen($value);
					unset($value);
				} else {
					$pos++;
				}
				unset($v);
			}
			$j--;
			unset($pos,$placeholder,$name);
		}
		return $token;
	}
	public function replaceMathMLVariablesInsideMathML($formula, $variables) {
		$keys = $this->sortIterator($variables->keys());
		$j = $keys->length - 1;
		while($j >= 0) {
			$name = $keys[$j];
			$placeholder = $this->getPlaceHolder($name);
			$pos = 0;
			while(($pos = _hx_index_of($formula, $placeholder, $pos)) !== -1) {
				if($this->variablePosition($formula, $pos) >= 2) {
					$value = $this->toSubFormula($variables->get($name));
					$splittag = false;
					$formula1 = _hx_substr($formula, 0, $pos);
					$formula2 = _hx_substr($formula, $pos + strlen($placeholder), null);
					$openTag1 = _hx_last_index_of($formula1, "<", null);
					$closeTag1 = _hx_last_index_of($formula1, ">", null);
					$openTag2 = _hx_index_of($formula2, "<", null);
					$closeTag2 = _hx_index_of($formula2, ">", null);
					$after = "";
					$before = "";
					if($closeTag1 + 1 < strlen($formula1)) {
						$splittag = true;
						$closeTag = _hx_substr($formula2, $openTag2, $closeTag2 - $openTag2 + 1);
						$before = _hx_substr($formula1, $openTag1, null) . $closeTag;
						unset($closeTag);
					}
					if($openTag2 > 0) {
						$splittag = true;
						$openTag = _hx_substr($formula1, $openTag1, $closeTag1 - $openTag1 + 1);
						$after = $openTag . _hx_substr($formula2, 0, $closeTag2 + 1);
						unset($openTag);
					}
					$formula1 = _hx_substr($formula1, 0, $openTag1);
					$formula2 = _hx_substr($formula2, $closeTag2 + 1, null);
					if($splittag) {
						$formula = $formula1 . "<mrow>" . $before . $value . $after . "</mrow>" . $formula2;
					} else {
						$formula = $formula1 . $value . $formula2;
					}
					unset($value,$splittag,$openTag2,$openTag1,$formula2,$formula1,$closeTag2,$closeTag1,$before,$after);
				}
				$pos++;
			}
			$j--;
			unset($pos,$placeholder,$name);
		}
		return $formula;
	}
	public function splitHTMLbyMathML($html) {
		$tokens = new _hx_array(array());
		$start = 0;
		$end = 0;
		while(($start = _hx_index_of($html, "<math", $end)) !== -1) {
			if($start - $end > 0) {
				$tokens->push(_hx_substr($html, $end, $start - $end));
			}
			$firstClose = _hx_index_of($html, ">", $start);
			if($firstClose !== -1 && _hx_substr($html, $firstClose - 1, 1) === "/") {
				$end = $firstClose + 1;
			} else {
				$end = _hx_index_of($html, "</math>", $start) + strlen("</math>");
			}
			$tokens->push(_hx_substr($html, $start, $end - $start));
			unset($firstClose);
		}
		if($end < strlen($html)) {
			$tokens->push(_hx_substr($html, $end, null));
		}
		return $tokens;
	}
	public function expandVariables($html, $variables) {
		if($variables === null || _hx_index_of($html, "#", null) === -1) {
			return $html;
		}
		$encoded = $this->isMathMLEncoded($html);
		if($encoded) {
			$html = $this->decodeMathML($html);
		}
		$html = $this->prepareFormulas($html);
		$tokens = $this->splitHTMLbyMathML($html);
		$sb = new StringBuf();
		$i = null;
		{
			$_g1 = 0; $_g = $tokens->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$token = $tokens[$i1];
				$v = null;
				if(StringTools::startsWith($token, "<math")) {
					$v = $variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_MATHML);
					if($v !== null) {
						$token = $this->replaceMathMLVariablesInsideMathML($token, $v);
					}
					$v = $variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_TEXT);
					if($v !== null) {
						$token = $this->replaceMathMLVariablesInsideMathML($token, $v);
					}
				} else {
					$v = $variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_IMAGE_REF);
					if($v !== null) {
						$token = $this->replaceVariablesInsideHTML($token, $v, com_wiris_quizzes_impl_MathContent::$TYPE_IMAGE_REF);
					}
					$v = $variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_MATHML);
					if($v !== null) {
						$token = $this->replaceVariablesInsideHTML($token, $v, com_wiris_quizzes_impl_MathContent::$TYPE_MATHML);
					}
					$v = $variables->get(com_wiris_quizzes_impl_MathContent::$TYPE_TEXT);
					if($v !== null) {
						$token = $this->replaceVariablesInsideHTML($token, $v, com_wiris_quizzes_impl_MathContent::$TYPE_TEXT);
					}
				}
				$sb->add($token);
				unset($v,$token,$i1);
			}
		}
		$result = $sb->b;
		if($encoded) {
			$result = $this->encodeMathML($result);
		}
		return $result;
	}
	public function encodeMathML($html) {
		$opentag = "«";
		$closetag = "»";
		$quote = "¨";
		$amp = "§";
		$start = null;
		$end = 0;
		while(($start = _hx_index_of($html, "<math", $end)) !== -1) {
			$closemath = "</math>";
			$end = _hx_index_of($html, $closemath, $start) + strlen($closemath);
			$formula = _hx_substr($html, $start, $end - $start);
			$formula = str_replace("<", $opentag, $formula);
			$formula = str_replace(">", $closetag, $formula);
			$formula = str_replace("\"", $quote, $formula);
			$formula = str_replace("&", $amp, $formula);
			$html = _hx_substr($html, 0, $start) . $formula . _hx_substr($html, $end, null);
			$end = $start + strlen($formula);
			unset($formula,$closemath);
		}
		return $html;
	}
	public function decodeMathML($html) {
		$opentag = "«";
		$closetag = "»";
		$quote = "¨";
		$amp = "§";
		$closemath = $opentag . "/math" . $closetag;
		$start = null;
		$end = 0;
		while(($start = _hx_index_of($html, $opentag . "math", $end)) !== -1) {
			$end = _hx_index_of($html, $closemath, $start) + strlen($closemath);
			$formula = _hx_substr($html, $start, $end - $start);
			$formula = com_wiris_util_xml_WXmlUtils::htmlUnescape($formula);
			$formula = str_replace($opentag, "<", $formula);
			$formula = str_replace($closetag, ">", $formula);
			$formula = str_replace($quote, "\"", $formula);
			$formula = str_replace($amp, "&", $formula);
			$html = _hx_substr($html, 0, $start) . $formula . _hx_substr($html, $end, null);
			$end = $start + strlen($formula);
			unset($formula);
		}
		return $html;
	}
	public function isMathMLEncoded($html) {
		$opentag = "«";
		return _hx_index_of($html, $opentag . "math", null) !== -1;
	}
	public function extractVariableNames($html) {
		if($this->isMathMLEncoded($html)) {
			$html = $this->decodeMathML($html);
		}
		$html = $this->prepareFormulas($html);
		$names = new _hx_array(array());
		$start = 0;
		while(($start = _hx_index_of($html, "#", $start)) !== -1) {
			if($this->variablePosition($html, $start) > 0) {
				$name = $this->getVariableName($html, $start);
				com_wiris_quizzes_impl_HTMLTools::insertStringInSortedArray($name, $names);
				unset($name);
			}
			$start++;
		}
		return com_wiris_quizzes_impl_HTMLTools::toNativeArray($names);
	}
	static $POSITION_NONE = -1;
	static $POSITION_ONLY_TEXT = 1;
	static $POSITION_ONLY_MATHML = 2;
	static $POSITION_ALL = 3;
	static function toNativeArray($a) {
		$n = new _hx_array(array());
		$k = null;
		{
			$_g1 = 0; $_g = $a->length;
			while($_g1 < $_g) {
				$k1 = $_g1++;
				$n[$k1] = $a[$k1];
				unset($k1);
			}
		}
		return $n;
	}
	static function insertStringInSortedArray($s, $a) {
		if($s !== null) {
			$i = 0;
			while($i < $a->length) {
				if(com_wiris_quizzes_impl_HTMLTools::compareStrings($a[$i], $s) >= 0) {
					break;
				}
				$i++;
			}
			if($i < $a->length) {
				if(!($a[$i] === $s)) {
					$a->insert($i, $s);
				}
			} else {
				$a->push($s);
			}
		}
	}
	static function encodeUnicodeChars($mathml) {
		$sb = new StringBuf();
		$i = null;
		{
			$_g1 = 0; $_g = strlen($mathml);
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c = _hx_char_code_at($mathml, $i1);
				if($c > 127) {
					$sb->add("&#");
					$sb->add($c);
					$sb->add(";");
				} else {
					$sb->b .= chr($c);
				}
				unset($i1,$c);
			}
		}
		return $sb->b;
	}
	static function compareStrings($a, $b) {
		$i = null;
		$an = strlen($a);
		$bn = strlen($b);
		$n = (($an > $bn) ? $bn : $an);
		{
			$_g = 0;
			while($_g < $n) {
				$i1 = $_g++;
				$c = _hx_char_code_at($a, $i1) - _hx_char_code_at($b, $i1);
				if($c !== 0) {
					return $c;
				}
				unset($i1,$c);
			}
		}
		return strlen($a) - strlen($b);
	}
	static function stripRootTag($xml, $tag) {
		$xml = trim($xml);
		if(StringTools::startsWith($xml, "<" . $tag)) {
			$xml = _hx_substr($xml, _hx_index_of($xml, ">", null) + 1, null);
			$xml = _hx_substr($xml, 0, _hx_last_index_of($xml, "<", null));
		}
		return $xml;
	}
	static function ensureRootTag($xml, $tag) {
		$xml = trim($xml);
		if(!StringTools::startsWith($xml, "<" . $tag)) {
			$xml = "<" . $tag . ">" . $xml . "</" . $tag . ">";
		}
		return $xml;
	}
	static function isDigit($c) {
		if(48 <= $c && $c <= 57) {
			return true;
		}
		if(1632 <= $c && $c <= 1641) {
			return true;
		}
		if(1776 <= $c && $c <= 1785) {
			return true;
		}
		return false;
	}
	static function isLetter($c) {
		if(com_wiris_quizzes_impl_HTMLTools::isDigit($c)) {
			return false;
		}
		if(65 <= $c && $c <= 90) {
			return true;
		}
		if(97 <= $c && $c <= 122) {
			return true;
		}
		if(192 <= $c && $c <= 696 && $c !== 215 && $c !== 247) {
			return true;
		}
		if(867 <= $c && $c <= 1521) {
			return true;
		}
		if(1552 <= $c && $c <= 8188) {
			return true;
		}
		if($c === 8450 || $c === 8461 || $c === 8469 || $c === 8473 || $c === 8474 || $c === 8477 || $c === 8484) {
			return true;
		}
		if($c >= 13312 && $c <= 40959) {
			return true;
		}
		return false;
	}
	static function parseCompoundAnswer($correctAnswer) {
		$answers = new _hx_array(array());
		if($correctAnswer->content === null) {
			return $answers;
		}
		$NEWLINE = "<mspace linebreak=\"newline\"/>";
		$EQUAL = "<mo>=</mo>";
		$mml = com_wiris_quizzes_impl_HTMLTools::convertEditor2Newlines($correctAnswer->content);
		$mml = com_wiris_quizzes_impl_HTMLTools::stripRootTag($mml, "math");
		$mml = com_wiris_quizzes_impl_HTMLTools::stripRootTag($mml, "mrow");
		$lines = new _hx_array(array());
		$end = 0;
		$start = 0;
		while(($end = _hx_index_of($mml, $NEWLINE, $start)) !== -1) {
			$lines->push(_hx_substr($mml, $start, $end - $start));
			$start = $end + strlen($NEWLINE);
		}
		$lines->push(_hx_substr($mml, $start, null));
		$i = null;
		{
			$_g1 = 0; $_g = $lines->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$line = com_wiris_quizzes_impl_HTMLTools::stripRootTag($lines[$i1], "mrow");
				$equalIndex = _hx_index_of($line, $EQUAL, null);
				if($equalIndex !== -1) {
					$equalIndex += strlen($EQUAL);
					$label = com_wiris_quizzes_impl_HTMLTools::ensureRootTag(_hx_substr($line, 0, $equalIndex), "math");
					$value = com_wiris_quizzes_impl_HTMLTools::ensureRootTag(_hx_substr($line, $equalIndex, null), "math");
					$answer = new _hx_array(array($label, $value));
					$answers->push($answer);
					unset($value,$label,$answer);
				}
				unset($line,$i1,$equalIndex);
			}
		}
		return $answers;
	}
	static function joinCompoundAnswer($answers) {
		$sb = new StringBuf();
		$m = new com_wiris_quizzes_impl_MathContent();
		if($answers->length > 0) {
			$m->type = com_wiris_quizzes_impl_MathContent::getMathType($answers[0][0]);
			$i = null;
			{
				$_g1 = 0; $_g = $answers->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					if($i1 !== 0) {
						$sb->add("<mspace linebreak=\"newline\"/>");
					}
					$ans = $answers[$i1];
					$sb->add(com_wiris_quizzes_impl_HTMLTools::stripRootTag($ans[0], "math"));
					$sb->add(com_wiris_quizzes_impl_HTMLTools::stripRootTag($ans[1], "math"));
					unset($i1,$ans);
				}
			}
			$m->content = $sb->b;
			$m->content = com_wiris_quizzes_impl_HTMLTools::ensureRootTag($m->content, "math");
		} else {
			$m->set("");
		}
		return $m;
	}
	static function tagName($xml, $n) {
		$endtag = _hx_index_of($xml, ">", $n);
		$tag = _hx_substr($xml, $n + 1, $endtag - ($n + 1));
		$aux = null;
		if(($aux = _hx_index_of($tag, " ", null)) !== -1) {
			$tag = _hx_substr($tag, 0, $aux);
		}
		return $tag;
	}
	static function endTag($xml, $n) {
		$name = com_wiris_quizzes_impl_HTMLTools::tagName($xml, $n);
		$depth = 1;
		$pos = $n + 1;
		while($depth > 0) {
			$pos = _hx_index_of($xml, "<", $pos);
			if($pos === -1) {
				return strlen($xml);
			} else {
				if(_hx_substr($xml, _hx_index_of($xml, ">", $pos) - 1, 1) === "/") {
				} else {
					if(_hx_substr($xml, $pos + 1, 1) === "/") {
						if(com_wiris_quizzes_impl_HTMLTools::tagName($xml, $pos + 1) === $name) {
							$depth--;
						}
					} else {
						if(com_wiris_quizzes_impl_HTMLTools::tagName($xml, $pos) === $name) {
							$depth++;
						}
					}
				}
			}
			$pos = $pos + 1;
		}
		$pos = _hx_index_of($xml, ">", $pos) + 1;
		return $pos;
	}
	static function convertEditor2Newlines($mml) {
		$HEAD = "<mtable columnalign=\"left\" rowspacing=\"0\">";
		$start = null;
		if(($start = _hx_index_of($mml, $HEAD, null)) !== -1) {
			$start += strlen($HEAD);
			$end = _hx_last_index_of($mml, "</mtable>", null);
			$mml = _hx_substr($mml, $start, $end - $start);
			$start = 0;
			$sb = new StringBuf();
			$lines = 0;
			while(($start = _hx_index_of($mml, "<mtd>", $start)) !== -1) {
				if($lines !== 0) {
					$sb->add("<mspace linebreak=\"newline\"/>");
				}
				$end = com_wiris_quizzes_impl_HTMLTools::endTag($mml, $start);
				$start += 5;
				$end -= 6;
				$sb->add(_hx_substr($mml, $start, $end - $start));
				$start = $end + 6;
				$lines++;
			}
			$mml = $sb->b;
			$mml = com_wiris_quizzes_impl_HTMLTools::ensureRootTag($mml, "math");
		}
		return $mml;
	}
	static function emptyCasSession($value) {
		return $value === null || _hx_index_of($value, "<mo", null) === -1 && _hx_index_of($value, "<mi", null) === -1 && _hx_index_of($value, "<mn", null) === -1 && _hx_index_of($value, "<csymbol", null) === -1;
	}
	static function main() {
		$h = new com_wiris_quizzes_impl_HTMLTools();
		$h->unitTest();
	}
	function __toString() { return 'com.wiris.quizzes.impl.HTMLTools'; }
}
function com_wiris_quizzes_impl_HTMLTools_0(&$�this, &$close, &$e, &$i, &$it, &$n, &$open, &$sb, &$separators) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(haxe_Utf8::charCodeAt($separators, com_wiris_quizzes_impl_HTMLTools_7($close, $e, $i, $it, $n, $open, $s, $sb, $separators)));
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLTools_1(&$�this, &$_g, &$i, &$i1, &$n, &$sb, &$word) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(haxe_Utf8::charCodeAt($word, $i1));
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLTools_2(&$�this, &$end, &$i, &$mathml, &$n, &$next, &$sb, &$start, &$wend, &$word, &$wstart) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(haxe_Utf8::charCodeAt($word, $i));
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLTools_3(&$�this, &$ch, &$end, &$ent, &$i, &$mathml, &$n, &$next, &$sb, &$start, &$wend, &$word, &$wstart) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(haxe_Utf8::charCodeAt($word, $i));
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLTools_4(&$�this, &$c, &$i, &$mathml, &$n, &$text, &$token) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($c);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLTools_5(&$�this, &$_g, &$c, &$i, &$j, &$j1, &$m, &$mathml, &$n, &$text, &$tok, &$token, &$tokens) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(haxe_Utf8::charCodeAt($tok, $j1));
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLTools_6(&$�this, &$c, &$i, &$mathml, &$n, &$text, &$token) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($c);
		return $s->toString();
	}
}
function com_wiris_quizzes_impl_HTMLTools_7(&$close, &$e, &$i, &$it, &$n, &$open, &$s, &$sb, &$separators) {
	if($i < $n) {
		return $i;
	} else {
		return $n - 1;
	}
}
