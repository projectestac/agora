<?php
global $CFG;
wrsqz_includeWirisPlugin();
require_once($CFG->dirroot . '/wiris-quizzes/wrsqz_config.php');
require_once($CFG->dirroot . '/lib/dmllib.php');
require_once($CFG->dirroot . '/lib/moodlelib.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/deprecated.php');

mb_internal_encoding('UTF-8');

define('WRSQZ_LETTERS', 'a-zA-ZáéíóúàèìòùäëïöüÿÉÿÓÚÀÈÌÒÙñÑçÇ_');
define('WRSQZ_NUMBERS', '0-9');
define('WRSQZ_ONLYLETTERS', '[' . WRSQZ_LETTERS . ']');
define('WRSQZ_ONLYLETTERSANDNUMBERS', '[' . WRSQZ_NUMBERS . WRSQZ_LETTERS . ']');
define('WIRISQUIZZESEXTENSION','W');

$wrsqz_programTable = array(
        'essay'=>'question_wessaprom',
        'match'=>'question_wmatprom',
        'multianswer'=>'question_wmansprom',
        'multichoice'=>'question_wmultiprom',
        'shortanswer'=>'question_wshanprom',
        'truefalse'=>'question_wtrflsprom'
 );

function wrsqz_includeWirisPlugin(){
  global $CFG;
  $plugincfg = $CFG->dirroot . '/filter/wiris/wrs_config.php'; //version >= 2.3
  $plugincfgold = $CFG->dirroot . '/pluginwiris/wrs_config.php'; //version < 2.3
  if(@is_readable($plugincfg)){
    require_once($plugincfg);
    return true;
  }else if(@is_readable($plugincfgold)){
    require_once($plugincfgold);
    return true;
  }else{
    return false;
  }
}
function wrsqz_isEnabled(){
  global $CFG;
  if(isset($CFG->wiris_quizzes_enabled)){
    return (($CFG->wiris_quizzes_enabled) && (strpos($CFG->textfilters, 'filter/wiris')!==false));
  }else{
    //XTEC ************ MODIFICAT - WIRIS Quizzes
    //2011.09.13 - sarjona
    return false;
    //************ ORIGINAL
    /*
    return true;
    */
    //************ FI          
  }
}
function wrsqz_checkBool($value) {
    $truesarray = array('true','cierto','vrai','vero','waar','tõene','cert','ziur', 'wahr');
	return (in_array($value,$truesarray));
}

/**
 * Test a response interpreting "*" characters as "any character any times".
 * @return bool True if the answer is correct.
 */
function wrsqz_testResponse(&$question, &$state, $answer) {
	
	$state->responses[''] = trim($state->responses['']);
	$bits = preg_split('/(?<!\\\\)\*/', $answer->answer);
	$excapedbits = array();
	
	foreach ($bits as $bit) {
		$excapedbits[] = preg_quote(str_replace('\*', '*', $bit));
	}
	
	$regexp = '|^' . implode('.*', $excapedbits) . '$|u';

	if (!$question->options->usecase) {
		$regexp .= 'i';
	}

	$responses = stripslashes_safe($state->responses['']);
	return preg_match($regexp, trim($responses));
}

function wrsqz_testResponses(&$question, &$state, $answerArray, $gradesArray) {

	$state->responses[''] = stripslashes_safe($state->responses['']);
	//$editorOptions = explode(';', $question->options->wiris->eqoption);
	//$mathmlMode = ($editorOptions[0] == '1') ? 'On' : 'Off';
	$mathmlMode = 'Off';

	$answer = wrsqz_computeAnswerToSend($answerArray,$question,$state);
	
	mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
	$wirisEditorEnabled = (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true');
	
	if ($wirisEditorEnabled){
		$response = $state->responses['wirisEditorHidden'];
	}else{
		$response = $state->responses[''];
	}

	$postdata = array(
			'mode' => 'id',
			'function' => 'eval',
			'id' => $question->options->wiris->idcache,
			'md5' => $question->options->wiris->md5,
			'seed' => $state->seed,
			'response' => $response,
			'answer' => $answer,
			'mathmlmode' => $mathmlMode,
	);

	mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
	
	$multipleAnswers = isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true';

    if ($multipleAnswers) {
		$postdata['function']='evalMultipleAssign';
	}
	$testFunction = wrsqz_computeTestFunctionsToSend($eqoptionArray);
	
	if($testFunction != ''){
		$postdata['testFunction']=$testFunction;
	}
	
	$message = wrsqz_openServlet($postdata);
	
	$params = explode(';', $message);
	if (trim($params[0]) == 'false') {
		
        $program = wrsqz_getProgram('shortanswer', $question->id);
        if( $program === false ){
            $program='';
        }
        
		$postdata['mode'] = 'problem';
		$postdata['problem'] = $program;
		$message = wrsqz_openServlet($postdata);
		$params = explode(';', $message);
	}

	if (sizeof($params) <= 2) {
		$serverResponse = array('' => '');
	}
	else {
		$id = $params[1];
		$grades = explode(',', $params[2]);

		$serverResponse = array(
			'grades' => $grades,
			'id' => $id
		);
	}

	//<What's that? >
	if (array_key_exists('id', $serverResponse) && $serverResponse['id'] != $question->options->wiris->idcache) {
		$question->options->wiris->idcache = $serverResponse['id'];
		update_record('question_shortanswerwiris', $question->options->wiris);
	}
	//</What's that? >

	if (array_key_exists('grades', $serverResponse)) {
		$state->grades = $serverResponse['grades'];

        //compute de maximum grade
        $max_grade=0.0;
		foreach ($serverResponse['grades'] as $key => $value) {
			if(!isset($gradesArray[$key])) $gradesArray[$key] = 0.0;
            if (((float)$value) * $gradesArray[$key] > $max_grade) {
				$max_grade = ((float)$value) * $gradesArray[$key];
			}
		}
        return $max_grade;
	}
	
	return 0.0;
}
function wrsqz_computeTestFunctionsToSend($eqoptionArray) {
	
	//get the maximum index of test function answers
	$maxTestFunctions=0;
	if(isset($eqoptionArray['testFunctionName'])){
		foreach ($eqoptionArray['testFunctionName'] as $index => $value){
			$maxTestFunctions = max($maxTestFunctions,$index);
		}
	}
	
	$multipleAnswers=isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true';
	$testFunction ='';
	
	if (!$multipleAnswers) {
		for($i=0;$i<=$maxTestFunctions;$i++){
			if ($i!=0) $testFunction.= ';';
			if (!empty($eqoptionArray['testFunctionName'][$i])){
                if(substr($eqoptionArray['testFunctionName'][$i],0,1)=='#'){
                    $eqoptionArray['testFunctionName'][$i]=substr($eqoptionArray['testFunctionName'][$i],1); //remove '#'
                }
				$testFunction .= $eqoptionArray['testFunctionName'][$i];
			}
		}
	}else{
		for($i=0;$i<=$maxTestFunctions;$i++){
			if ($i!=0) $testFunction.= ';;';
			if (!empty($eqoptionArray['testFunctionName'][$i])){
				$testFunctionNames = explode(' ',$eqoptionArray['testFunctionName'][$i]);
				foreach ($testFunctionNames as $testFunctionName){
					if ($testFunctionName[0]!='(') {
						if (mb_strlen($testFunction)!=0 && $testFunction[mb_strlen($testFunction)-1]!=';') $testFunction .= ';';
						if(substr($testFunctionName,0,1)=='#'){
                            $testFunctionName = substr($testFunctionName,1); //remove #
                        }
                        $testFunction .= $testFunctionName;
					}else{
						$testFunction  .= ' ' . mb_substr($testFunctionName,1,mb_strlen($testFunctionName)-2);
					}
				}
			}
		}
	}
	return $testFunction;
}
function wrsqz_computeAnswerToSend($answerArray,$question,$state) {
	mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
	$multipleAnswers = isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true';

	if (!$multipleAnswers) {
		// Expand variables
		$exapndAnswerArray = array();
		foreach ($answerArray as $answer) {
			$exapndAnswerArray[]=wrsqz_assemble(wrsqz_variablesToText($answer), $state->vars);
		}
		// A ";" separated list of expanded answers
		$r=implode(';', $exapndAnswerArray);

		return $r;
	}

	$r='';
	// x=v1;y=v2;;x=v3;y=v4
	foreach ($answerArray as $answer) {
		if (mb_strlen($r)!=0) $r=$r . ';;';
		$vars = explode(' ',$answer);
		foreach ($vars as $var) {
			if ($var[0]!='(') {
				if (mb_strlen($r)!=0 && $r[mb_strlen($r)-1]!=';') $r=$r . ';';
				// if $var= xx% then --> xx%
				$expandVar = wrsqz_assemble(wrsqz_variablesToText($var), $state->vars);
				// var=#<var>  (so we remove the heading # )
				$r = $r . mb_substr($var,1) . '=( ' . $expandVar . ' )';
			} else { // append parameters
				$r = $r . ' ' . mb_substr($var,1,mb_strlen($var)-2);
			}
		}
	}

	return $r;
}

//$answer = variable names for find values. '#a #b #c' or 'a b c'
//$variables = array defining variable values. '##Ma' => '<math...'
//$names = variable names to be printed. (optional) '#a #b #c' or 'a b c'
function wrsqz_multipleAnswersTable($answer, $variables, $names) {
	$openmath = '<math xmlns="http://www.w3.org/1998/Math/MathML">';
	$closemath = '</math>';
	
	// x=v1;y=v2
    if(!isset($names)) $names = $answer;
    //clean $names array
    $names = explode(' ',$names);
    $cleanNames=array();
    foreach ($names as $name){
        if ($name[0]!='(') { //skip parameters
            if($name[0]=='#'){
                $name = mb_substr($name,1);
            }
            $cleanNames[]=$name;
        }
    }
    //make values array
	$vars = explode(' ',$answer);
    $values=array();
    foreach ($vars as $var){
        if ($var[0]!='(') { // skip parameters
            if($var[0]!='#') $var = '#'.$var;
            $value = wrsqz_assemble(wrsqz_textToVariables($var), $variables);
		//remove <math...> and </math>
		    $value = mb_substr($value,mb_strlen($openmath),-mb_strlen($closemath));
            $values[] = $value;
        }
    }

    //Write mathml
    $r = $openmath .'<mtable columnalign="left" rowspacing="0">';
	foreach ($cleanNames as $index => $name) {
		if ($var[0]!='(') { // skip parameters
			$r .= '<mtr><mtd>';
			$r .= '<mi>' . $name . '</mi>';
			$r .= '<mo>=</mo>';
			$r .= $values[$index];
			$r .= '</mtd></mtr>';
		}
	}
	$r .= '</mtable>'. $closemath;
	return $r;
}

function wrsqz_testMultiShortResponses(&$question, &$state, $shortanswers, $shortresponses, $eqoptionArrays){

  $answersString = '';
  $responsesString = '';
  $testFunctionsString = '';

  foreach ($shortanswers as $key => $answers){      
      $answersString .= wrsqz_computeAnswerToSend($answers, $question->options->questions[$key], $state);
      if( isset($eqoptionArrays[$key]) ){
        $testFunctionsString.=wrsqz_computeTestFunctionsToSend($eqoptionArrays[$key]);
      }
      $testFunctionsString .= ';;;';
      $answersString .= ';;;';
      $responsesString .= $shortresponses[$key] . ';;;';
  }
  $answersString = substr($answersString,0, -3);
  $responsesString = substr($responsesString,0, -3);

  $program = wrsqz_getProgram('multianswer',$question->id);

  $postdata = array(
	'mode' => 'problem',
	'function' => 'eval',
	'id' => $question->options->wiris->idcache,
	'md5' => $question->options->wiris->md5,
	'seed' => $state->seed,
	'response' => $responsesString,
	'answer' => $answersString,
    'problem' => $program
  );
  $testFunctionPresent = trim($testFunctionsString,';');
  if(! empty($testFunctionPresent) ){
      $postdata['testFunction']=$testFunctionsString;
  }
  
  $servletResult = wrsqz_openServlet($postdata);
  $values = explode(';',trim($servletResult,';'));

  //remove the first two elements
  $ok = array_shift($values);
  
  if($ok !== 'true' || count($values) <= 1){
      return false;
  }

  $idcache = array_shift($values);

  //build the grades array;
  foreach($values as $index=>$gradesquestion){
      $values[$index]=explode(',',trim($gradesquestion,','));
  }
  //$state->grades = $grades;
  return $values;

}

function wrsqz_getLanguagePath() {
  global $CFG;
	
  $currentLanguage = mb_substr(current_language(), 0, 2) . '_utf8';
  $currentPath = $CFG->dirroot . '/lang/' . $currentLanguage;

  if (file_exists($currentPath)) {
	return $currentPath;
  }

  $currentPath = $CFG->dataroot . '/lang/' . $currentLanguage;
  if (file_exists($currentPath)) {
	return $currentPath;
  }

  return $CFG->dirroot . '/lang/en_utf8';
}

function wrsqz_mathmlEncode($input) {
  $from = array('<', '>', '"', '&', '\'');
  $to = array('«', '»', '¨', '§', '`');
	
  return str_replace($from, $to, $input);
}

function wrsqz_mathmlDecode($input) {
	$from = array('«', '»', '¨', '§', '`');
	$to = array('<', '>', '"', '&', '\'');
	
	return str_replace($from, $to, $input);
}

function wrsqz_trimQuotes($value){

	if((mb_substr($value,0,1)=='"') && (mb_substr($value,-1,1)=='"')){
		$value=mb_substr($value,1,-1);
	}
	return $value;
}


/* $text is a string containing some references to variables present in the
 * $variables array. The references may be:
 * ##Tx => Variable "x" will be assembled in text mode. 
 * ##Mx => Variable "x" will be assembled in MathML mode (for FormulaEditor).
 * ##Wx => Variable "x" will be assembled in encoded MathML mode (for PluginWiris filter).
 * #x   => Variable "x" will be assembled in encoded MathML mode (for PluginWiris filter).
 */
function wrsqz_assemble($text, $vars=array()){
    global $CFG;

    if(!isset($text[0])) return $text;
    

    $W = WIRISQUIZZESEXTENSION;//This char should be always 'W'
    $T = 'T';
    $M = 'M';

    mb_internal_encoding("UTF-8");
    mb_regex_encoding("UTF-8");
    
    //Transform #x into ##Wx
    $start=0;
    while(($char = strpos($text,'#',$start))!==false){
        if(($char == 0 || substr($text,$char-1,1)!='#') && $char+1<strlen($text)){
            $char1 = substr($text, $char+1,1);
            if(('a'<=$char1 && $char1<='z') || ('A'<=$char1 && $char1<='Z')){
                $text = substr($text,0,$char) . '##W' . substr($text,$char+1);
                $start = $char + 3;
            }else{
                $start = $char+1;
            }
        }else{
            $start = $char + 1;
        }
    }
    
    //Transform ##Wx into ##Wx## in order to avoid conflicts between 2 variables
    //such that the name of the first is a prefix of the name of the second
    $text  = mb_ereg_replace('##(['.$W.$M.$T.']'.WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##\1##', $text);

    //classify vars depending on their nature (##M, ##W and ##T)
    $mathmlvars = array();
    $encodedvars = array();
    $textvars = array();
    $imagevars = array();

    foreach ($vars as $name=>$value){
        if(!empty($name)){
            $prefix = substr($name,0,3);
            $name = $name . '##';
            if($prefix=='##'.$M){
                $mathmlvars[$name]=$value;
            }else if($prefix == '##'.$W){
                if (mb_substr($value,0,7)==='<image>') {
                    $imagevars[$name] = wrsqz_imgHTMLTag($value);
                }else{
                    $encodedvars[$name]=wrsqz_mathmlEncode($value);
                }
            }else if($prefix == '##'.$T){
                $textvars[$name]=$value;
            }
        }
    }

    //find MathML formulas & replace ##Mx variables inside.
    //We are using not-multibyte functions very carefully due to performance reasons.
    $start=0;
    while (($start = strpos($text,'<math',$start))!==false){
        $length = strpos($text, '</math>',$start)  - $start + strlen('</math>');
        $formula = substr($text, $start, $length);
        $formula = wrsqz_assembleInsideFormula($formula, $mathmlvars, false);
        
        $text = substr($text,0,$start) . $formula . substr($text, $start+$length);
        $start = $start+strlen($formula);
    }

    //find encoded MathML formulas & replace ##Wx variables inside them.
    //We are not using multibyte functions.
    $start=0;
    while (($start = strpos($text,'«math',$start))!==false){
        $length = strpos($text, '«/math»',$start)  - $start + strlen('«/math»');
        $formula = substr($text, $start, $length);

        $formula = wrsqz_assembleInsideFormula($formula, $encodedvars, true);
        $formula = wrsqz_extractTextFromMathML($formula);
        
        $text = substr($text,0,$start) . $formula . substr($text, $start+$length);
        $start = $start+strlen($formula);
    }

    //Replace variables outside formulas

    //MathML ones
    foreach($mathmlvars as $name=>$value){
        $text = str_replace($name, '<math xmlns="http://www.w3.org/1998/Math/MathML">' . $value . '</math>', $text);
    }
    //Encoded MathML Ones
    foreach ($encodedvars as $name=>$value){
        $value = wrsqz_extractTextFromMathML('«math xmlns=¨http://www.w3.org/1998/Math/MathML¨»'.$value.'«/math»');
        $value = wrsqz_extractNumbersfromMathML($value);
        $text = str_replace($name, $value, $text);
    }
    //Text Ones
    foreach ($textvars as $name=>$value){
        $text=str_replace($name, $value, $text);
    }
    //Image Ones
    foreach ($imagevars as $name=>$value){
        $text = str_replace($name, $value, $text);
    }

    return $text;
   }
/*
 * This function assembles variables inside a MathML formula.
 * It does:
 *   ...<tag>blabla##var##blabla</tag>... => ...<mrow><tag>blabla</tag>value<tag>blabla</tag></mrow>
 */
function wrsqz_assembleInsideFormula($formula, $vars, $encoded = true){
    $opentag  = $encoded ? '«' : '<';
    $closetag = $encoded ? '»' : '>';

    foreach ($vars as $name=>$value){
        while(($pos=strpos($formula,$name))!==false){
            $formula1 = substr($formula, 0, $pos);
            $formula2 = substr($formula, $pos+strlen($name));
            $splittag = false;

            $opentagPos1 = mb_strrpos($formula1,$opentag);
            $closetagPos1 = mb_strrpos($formula1, $closetag);
            $opentagPos2 = mb_strpos($formula2, $opentag);
            $closetagPos2 = mb_strpos($formula2, $closetag);

            $after = '';
            $before = '';
            
            if($closetagPos1 + 1 < mb_strlen($formula1)){
                $splittag = true;
                $tag2 = mb_substr($formula2, $opentagPos2, $closetagPos2 - $opentagPos2 +1);
                $before = mb_substr($formula1, $opentagPos1) . $tag2;
            }
            if($opentagPos2>0){
                $splittag = true;
                $tag1 = mb_substr($formula1, $opentagPos1, $closetagPos1 - $opentagPos1 +1);
                $after = $tag1 . mb_substr($formula2, 0, $closetagPos2+1);
            }
            
            $formula2 = mb_substr($formula2, $closetagPos2+1);
            $formula1 = mb_substr($formula1, 0, $opentagPos1);
            
            if($splittag){
                $formula = $formula1.$opentag.'mrow'.$closetag.$before.$value.$after.$opentag.'/mrow'.$closetag.$formula2;
            }else{
                $formula = $formula1 . $value . $formula2;
            }
        }
    }
    return $formula;
}

/**
 * Since FormulaEditor 2.0, variable expressions are not always in the same tag.
 * This function replaces MathML in this way:
 * <mrow><mi>#</mi><mi>x</mi></mrow>   ===>  <mrow><mi>#x</mi></mrow>
 * <msub><mi>#</mi><mi>x</mi></msub>   ===>  <msub><mi>#</mi><mi>x</mi></msub>
 * <mrow><mi>#</mi><msub><mi>x</mi><mn>1</mn></msub></mrow> ==>  <mrow><msub><mi>#x</mi><mn>1</mn></msub></mrow>
 *
 * The implementation of this function is a bit confusing, so there are unit 
 * tests for this function in /lib/unittests.php.
 *
 * **/
function wrsqz_prepareVariablesInsideFormulas($text, $encoded = TRUE){
  $opentag = $encoded ? '«' : '<';
  $closetag = $encoded ? '»' : '>';
  $start=0;
  while (($start = strpos($text,$opentag.'math',$start))!==FALSE){
    $length = strpos($text, $opentag.'/math'.$closetag,$start)  - $start + strlen($opentag.'/math'.$closetag);
    $formula = substr($text, $start, $length);
    $pos = 0;
    while(($pos = strpos($formula,'#',$pos))!==FALSE){
      //go to opening tag and get its full definition
      $initag = $pos;
      while($initag >=0 && substr($formula, $initag, strlen($opentag))!==$opentag){
        $initag--;
      }
      $taglength = strpos($formula, $closetag, $initag) - $initag + strlen($closetag);
      $tag = substr($formula,$initag, $taglength); //<mi mathvariant="normal">
      //go to parent tag
      $parentpos = $initag;
      $parenttag = FALSE;
      while(!$parenttag){
        //skip autoclosed tags
        while(substr($formula, $parentpos-strlen('/'.$closetag), strlen('/'.$closetag))=='/'.$closetag){
          while($parentpos >=0 && substr($formula, $parentpos, strlen($opentag))!==$opentag){
            $parentpos--;
          }
        }
        $parentpos--;
        while($parentpos >=0 && substr($formula, $parentpos, strlen($opentag))!==$opentag){
          $parentpos--;
        }
        if(substr($formula, $parentpos, strlen($opentag.'/')) == $opentag.'/'){//closing tag :(. Go to corresponding opening tag.
          //get tag name
          $namepos = $parentpos + strlen($opentag.'/');
          $char = substr($formula, $namepos, 1);
          $name='';
          while(($char>='a' && $char<='z') || ($char>='A' && $char<='Z')
          || ($char>='0' && $char<='9') || $char == '_'){
            $name .= $char;
            $namepos++;
            $char = substr($formula, $namepos, 1);
          }
          $depth = 1;
          $namelength = strlen($name);
          while($depth>0 && $parentpos >=0 ){
            if(substr($formula, $parentpos, $namelength) == $name){
              if(substr($formula, $parentpos-strlen($opentag), $namelength+strlen($opentag))==$opentag.$name &&
                strpos($formula, $closetag, $parentpos) < strpos($formula, '/', $parentpos)){
                $depth--;
              }else if(substr($formula, $parentpos-strlen($opentag.'/'), $namelength+strlen($opentag.'/'))==$opentag.'/'.$name){
                $depth++;
              }
            }
            if($depth>0){
              $parentpos--;
            }else{
              //last iteration
              $parentpos -= strlen($opentag);
            }
          }
          if($depth > 0) return $text; //exception

        }else{//opening tag. it is the parent!
          $parenttag = substr($formula, $parentpos, strpos($formula, $closetag, $parentpos) - $parentpos + strlen($closetag));
          $parenttagname = substr($parenttag, strlen($opentag), -strlen($closetag));
          if(strpos($parenttagname, ' ')!==false){
            $parenttagname = substr($parenttagname, 0, strpos($parenttagname, ' '));
          }
        }
      }

      $allowedparenttags = array('mrow', 'mtd', 'math', 'msqrt', 'mstyle', 'merror', 'mpadded', 'mphantom', 'menclose'); //see http://www.w3.org/TR/MathML2/chapter3.html#id.3.1.3.1 Inferred mrows
      if(in_array($parenttagname, $allowedparenttags)){
        
        $firstchar = true;//WQ0093
        //find append position
        $appendpos = $pos+1;
        $char = substr($formula, $appendpos, 1);
        while(($char>='a' && $char<='z') || ($char>='A' && $char<='Z')
        || $char == '_' || (($char>='0' && $char<='9') && !$firstchar)){
          $appendpos++;
          $char = substr($formula, $appendpos, 1);
          $firstchar = false;
        }
        if(substr($formula, $appendpos, strlen($opentag))!=$opentag){
          //WQ0093: there is a non-name character in the tag, so we are done
          $pos++;
          continue;
        }
        //skip closing tag
        $nextpos = strpos($formula, $closetag, $pos);
        //explore next tag
        $end = FALSE;
        while(!$end && $nextpos !==FALSE && ($pos + strlen($closetag)) < strlen($formula)){ //not the end of formula
          $nextpos+=strlen($closetag);
          $nexttaglength = strpos($formula, $closetag, $nextpos) - $nextpos + strlen($closetag);
          $nexttag = substr($formula, $nextpos, $nexttaglength);
          $specialtag = FALSE;
          if($nexttag == $opentag . 'msup' . $closetag
          || $nexttag == $opentag . 'msub' . $closetag
          || $nexttag == $opentag . 'msubsup' . $closetag){
            //in this case, we change the tree structure in this way:
            //<mi>#</mi><msup><mi>f</mi><mn>2</mn></msup>   =>>>
            //<msup><mi>#f</mi><mn>2</mn></msup>
            $specialpos = $nextpos;
            $specialtag = $nexttag;
            $speciallength = $nexttaglength;

            $nextpos = $nextpos + $nexttaglength;
            $nexttaglength = strpos($formula, $closetag, $nextpos) - $nextpos + strlen($closetag);
            $nexttag = substr($formula, $nextpos, $nexttaglength);
          }
          if($nexttag == $tag || $nexttag == $opentag.'mn'.$closetag){
            $contentpos = $nextpos + $nexttaglength;
            $toappend = '';
            $char = substr($formula, $contentpos, 1);
            while(($char>='a' && $char<='z') || ($char>='A' && $char<='Z')
            || $char == '_' || (($char>='0' && $char<='9') && !$firstchar )){
              $contentpos++;
              $toappend .= $char;
              $char = substr($formula, $contentpos, 1);
              $firstchar = false;
            }
            $nextclosepos = strpos($formula, $opentag, $contentpos);
            $nextcloseend = strpos($formula, $closetag, $nextclosepos) + strlen($closetag);
            if($toappend == ''){
              $end = TRUE;
            }else if($nextclosepos!=$contentpos){ //remains some content that is not part of variable name
              $content = substr($formula, $contentpos, $nextclosepos-$contentpos);
              $nextclosetag = substr($formula, $nextclosepos, $nextcloseend-$nextclosepos);
              $newnexttag = $nexttag . $content . $nextclosetag;
              $formula = substr($formula, 0, $nextpos) . $newnexttag . substr($formula, $nextcloseend);
              $formula = substr($formula, 0, $appendpos). $toappend . substr($formula, $appendpos);
              $end = TRUE;
            }else{//all tag content is to be appended, so remove tag
              $formula = substr($formula, 0, $nextpos) . substr($formula, $nextcloseend);
              $formula = substr($formula, 0, $appendpos). $toappend . substr($formula, $appendpos);
              if($specialtag){
                $fulltaglength = strpos($formula, $closetag, $appendpos)+strlen($closetag)-$initag;
                $formula = substr($formula, 0, $initag).$specialtag.substr($formula, $initag, $fulltaglength).substr($formula, $initag+$fulltaglength+$speciallength);
                $end = TRUE;
              }
            }
            $appendpos += strlen($toappend); //WQ0087
          }else{
            $end = TRUE;
          }
          if(!$end){
            $nextpos = strpos($formula, $closetag, $pos);
          }
        }
      }
      $pos++;  //we should add something more here
    }
    $text = substr($text,0,$start) . $formula . substr($text, $start+$length);
    $start = $start+strlen($formula);
  }
  return $text;
}
/*
 * This function recieves a MathML formula and returns an HTML construction
 * such that the text inside the formula becomes plain text. It handles only
 * <mtext> inside tags <math>,<mrow>, but not inside other tags.
 */
function wrsqz_extractTextFromMathML($formula, $encoded=true){
    //Algorythm: We scan the mathML tag by tag.
    //If a tag is one of the allowed (math, mrow) we save it at the stack
    //and continue with the next.
    //If the tag is not allowed (mfenced, mfrac,...) we skip all mathML until its
    //closure (</mfenced>, </mfrac>)
    //If the tag is <mtext> we rearange the formula
    //If a tag is a closure of allowed tag, we pop it from the stack.

    //rapid return if nothing to do.
    if(strpos($formula,'mtext')===false) return $formula;
    //initializations
    $opentag = $encoded ? '«' : '<';
    $closetag = $encoded ? '»' : '>';
    //tags where an <mtext> can live inside.
    $allowedtags = array('math', 'mrow');

    $pattern = $opentag.'([^'.$opentag.$closetag.']*)'.$closetag; //regexp that matches a single tag label
    mb_ereg_search_init($formula, $pattern);
    $stack = array();       //stack of opened tags
    $omittedcontent=false;  //there is math content before the current point?
    $lasttag=null;          //last tag of the stack
    $length = strlen($formula);
    $beginformula = strpos($formula, $opentag);   //position of the first character of the last formula (in bytes).
    $pos=array(0,0);
    //CAUTION: If you change this function, be very carefull with multibyte
    //         and non-multibyte functions.
    while(($pos[0]+$pos[1])<$length){
        $pos = mb_ereg_search_pos($pattern);

        if($pos[0]+$pos[1] < $length){
            //this will be always true but the last iteration
            mb_ereg_search_setpos($pos[0]+$pos[1]);
        }
        $tag = substr($formula, $pos[0],$pos[1]);
        $trimmedTag = mb_substr($tag,1,-1);
        //skip autoclosed tags
        if(mb_substr($trimmedTag,-1) == '/'){
            continue;
        }
        //discard attributes
        if(($spacepos = mb_strpos($trimmedTag,' '))!==false){
            $trimmedTag=mb_substr($trimmedTag,0,$spacepos);
        }      
        if(in_array($trimmedTag,$allowedtags)){
        //allowed tag
            $stack[]=array($trimmedTag,$tag);
            $lasttag = $trimmedTag;
        }else if($trimmedTag == '/'.$lasttag){
        //close allowed tag
            array_pop($stack);
            $lasttag = end($stack);
            $lasttag = $lasttag[0];
            //discard empty formulas
            if(empty($stack) && !$omittedcontent){
                $formula1 = substr($formula, 0, $beginformula);
                if($pos[0]+$pos[1]<$length){
                    //this isn't the end.
                    $formula2 = substr($formula, $pos[0]+$pos[1]);
                    $formula = $formula1 . $formula2;
                    $length = strlen($formula);
                    mb_ereg_search_init($formula, $pattern);
                    mb_ereg_search_setpos($beginformula);
                }else{
                    //this is the last iteration. $length and mb_ereg_search
                    //string and position will be wrong, but it doesn't matter.
                    $formula = $formula1;
                }
                
            }
        }else if($trimmedTag == 'mtext'){
            $pos2 = mb_ereg_search_pos($opentag.'/mtext'.$closetag);
            $text = substr($formula, $pos[0]+$pos[1], $pos2[0]-($pos[0]+$pos[1]));
            //Decode some chars in text
            if($encoded) $text=wrsqz_mathmlDecode($text);
            $text = str_replace('&centerdot;','&middot;',$text);
            $text = str_replace('&apos;','&#39;',$text);
            $formula1 = substr($formula, 0, $pos[0]);  //until <mtext>
            $formula2 = substr($formula, $pos2[0]+$pos2[1]); //from </mtext>
            if($omittedcontent){ 
                //we have a non-empty formula before the text so we must close it
                //compute the tail (close tags) of the formula before the text
                //and the head (open tags) of the formula after the text.
                $copystack = $stack; //copy stack
                $tail1 = '';
                $head2 = '';
                while($stacktag = array_pop($copystack)){
                    $tail1.= $opentag.'/'.$stacktag[0].$closetag;
                    $head2 = $stacktag[1] . $head2;
                }
                $formula1 = $formula1 . $tail1;
                $formula2 = $head2 . $formula2;
                //update $formula
                $formula = $formula1 . $text . $formula2;
                $beginformula = $pos[0]+strlen($tail1)+strlen($text);
                $position = $beginformula+strlen($head2);
            }else{
            //we have an empty formula before the text so we must skip it.
                $head = substr($formula1, 0, $beginformula); //all before the empty formula
                $formula1 = substr($formula1, $beginformula);

                $formula = $head . $text . $formula1 . $formula2;
                $beginformula += strlen($text);
                $position = $beginformula +strlen($formula1);
            }
            //update parameters with the new formula.
            $length = strlen($formula);
            $omittedcontent = false;
            mb_ereg_search_init($formula, $pattern);
            mb_ereg_search_setpos($position);
            
        }else{
        //not allowed tag: go to its closure and remember that we omitted content
            $pos = mb_ereg_search_pos($opentag.'/'.$trimmedTag.$closetag);
            if($pos === false){
                return $formula; //this is an error in XML (unclosed tag);
            }
            $omittedcontent=true;
            mb_ereg_search_setpos($pos[0]+$pos[1]);
        }
    }

    return $formula;

}

/* text text <math><mn>23</mn></math> => 23
 *
 */
function wrsqz_extractNumbersfromMathML($input, $encoded=true){
    $opentag = $encoded ? '«' : '<';
    $closetag = $encoded ? '»' : '>';

    $openmrow = $opentag . 'mrow' . $closetag;
    $closemrow = $opentag . '/mrow' . $closetag;
    $openmn = $opentag . 'mn' . $closetag;
    $closemn = $opentag . '/mn' . $closetag;
    $signtag = $opentag . 'mo' . $closetag . '-' . $opentag . '/mo' . $closetag;

    $start = 0;
    //foreach formula in text
    while($start < mb_strlen($input) && ($pos= mb_strpos($input, $opentag . 'math', $start))!==false){

         $iniformula = mb_strpos($input, $opentag, $pos+1);
         $finformula = mb_strpos($input, $opentag.'/math'.$closetag, $iniformula);
         //formula without math tag
         $formula = mb_substr($input, $iniformula, $finformula - $iniformula);
         //trim exterior mrow tags
         while((mb_substr($formula, 0 , mb_strlen($openmrow)) == $openmrow)
             && (mb_substr($formula, -mb_strlen($closemrow)) == $closemrow)){
             $formula = mb_substr($formula, mb_strlen($openmrow), -mb_strlen($closemrow));
         }
         //trim eventual sign tag
         $minussign = false;
         if(mb_substr($formula, 0, mb_strlen($signtag)) == $signtag){
             $minussign = true;
             $formula = mb_substr($formula, mb_strlen($signtag));
         }
         //trim mn tag
         if((mb_substr($formula, 0 , mb_strlen($openmn)) == $openmn)
             && (mb_substr($formula, -mb_strlen($closemn)) == $closemn)){
             $formula = mb_substr($formula, mb_strlen($openmn), -mb_strlen($closemn));
         }

         //if formula is reduced to a number
         if(is_numeric($formula)){
             $begin = mb_substr($input, 0, $pos);
             $end = mb_substr($input, $finformula + mb_strlen($opentag.'/math'.$closetag));
             if($minussign) $formula = '&#8722;&nbsp;' . $formula; //&#8722 = &minus;
             $input = $begin . $formula . $end;
             $start = $pos + mb_strlen($formula);
         }else{
             $start = $finformula + strlen($opentag.'/math'.$closetag);
         }
    }
    return $input;
}

function wrsqz_imgHTMLTag($imageXMLTag, $alt='plot'){
	global $CFG;
	$filename = mb_substr($imageXMLTag,7,-8);
	$source=$CFG->wwwroot . '/wiris-quizzes/lib/wrsqz_showimage.php';
	
	if ($CFG->slasharguments) {
		$source .= '/' . $filename;
	} else {
		$source .= '?file=' . $filename;
	}
	
	$plotstyle ='border-style:' . $CFG->wirisquizzes_plotborderstyle . '; ';
	$plotstyle.='border-width:' . $CFG->wirisquizzes_plotborderwidth . '; ';
	$plotstyle.='border-color:' . $CFG->wirisquizzes_plotbordercolor . '; ';
	$plotstyle.='margin:' 		. $CFG->wirisquizzes_plotmargin		 . ';' ;
					
	return '<img src="' . $source . '" alt="' . $alt .'" style="' . $plotstyle . '" />';
}

// #xx --> ##Txx
// ###Txx --> ##xx Dani. It makes non-sesnse to me!
// ##Mxx --> ##Txx
// ##Wxx --> ##Txx
// ##Lxx --> ##Txx 
function wrsqz_variablesToText($input) {
	$input = mb_ereg_replace('#(' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##T\1', $input);
	$input = mb_ereg_replace('###T(' . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##\1', $input);
	return mb_ereg_replace('##[MWL](' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##T\1', $input);
}

function wrsqz_textToVariables($input) {
	$input = mb_ereg_replace('#(' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##M\1', $input);
	$input = mb_ereg_replace('###M(' . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##\1', $input);
	return mb_ereg_replace('##[TWL](' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##M\1', $input);
}

function wrsqz_wirisQuizzesUsed(&$question) {
	  
	if (isset($question->hiddenCASValue) && !wrsqz_isEmptySession(stripslashes($question->hiddenCASValue)))	{
		return true;
	}
  if(!empty($question->wirisCASForComputations)){
    return true;
  }
	if ($question->qtype == 'truefalsewiris') {
		if (!empty($question->wirisAnswer) && trim($question->wirisAnswer) != '') {
			return true;
		}
		
		return false;
	}
	
	if ($question->qtype == 'multichoicewiris' && isset($question->gradeOverride)) {
		foreach ($question->gradeOverride as $value) {
			if (trim($value) != '') {
				return true;
			}
		}
	}
	
	return false;
}

/**
 * Calls servlet to evaluate the program in order to obtain the variables of the question.
 */
function wrsqz_getInfo($questionType, $questionId, $data) {

	$varArray = wrsqz_getVars($data['text']);
	$vars = implode(',', $varArray);

	if (empty($vars)) {
		return array('' => '');
	}

	if (array_key_exists('function',$data)) {
		$function=$data['function'];
	} else {
		$function='var';
	}

	$postdata = array(
		'mode' => 'id',
		'function' => $function,
		'id' => $data['wiris']->idcache,
		'md5' => $data['wiris']->md5,
		'seed' => $data['seed'],
		'var' => $vars
	);

	// We do a first attempt to get the variables without sending the whole program because it might be cached.
	$msg = wrsqz_openServlet($postdata);
	$params = explode(';', $msg);

	if (trim($params[0]) == 'false') {
		
		if (array_key_exists('problem',$data)) {
			// Get the program from the parameter
			$problem=$data['problem'];
		}
		if (!isset($problem)) {
			// Get the program from the database
			$problem = wrsqz_getProgram($questionType, $questionId);
			if ($problem===false) {
				unset($problem);
			}
		}
		if (!isset($problem)) {
			// if it is not set, exit with error
			return false;
		}

		$postdata = array(
			'mode' => 'problem',
			'function' => $function,
			'md5' => $data['wiris']->md5,
			'seed' => $data['seed'],
			'var' => $vars,
			'problem' => $problem
		);
		
		$msg = wrsqz_openServlet($postdata);
		$params = explode(';', $msg);
	}
	
	$params_length = count($params);
	
	if ($params_length < 2) {
		return array();
	}
	
	if ($params_length < 3) {
		return array('id' => $params[1]);
	}
	
	$newVarArray = explode(':', $params[2]);
	$result = array();
	$i = 0;
	
	foreach ($varArray as $key => $value) {
		$varContent = explode('&', trim($newVarArray[$i]));
		
		if (count($varContent) >= 2) {
			$varContent[1] = wrsqz_trimQuotes($varContent[1], '"');
			$result[$key] = urldecode($varContent[1]);
			++$i;
		}
	}
	
	wrsqz_filterImages($result);
	
	return array(
		'vars' => $result,
		'id' => $params[1]
	);
}

/**
 * This function takes an array of variables as key=>value. It substitutes the values like
 * value="<image>BYTES</image>" for value="<image>md5.png</image>" and saves BYTES to md5.png 
 * Moreover, md5 is the md5 of BYTES.
 */
function wrsqz_filterImages(&$vars) {
	global $CFG;
	$dir = $CFG->dataroot . '/' . $CFG->wirisquizzes_imagedir;
	
	//make the cache directory if needed.
	if(!file_exists($dir) and make_upload_directory($CFG->wirisquizzes_imagedir) === false){
		//This error should be reported to the administrator of the site.
		exit;
	}
	
	foreach($vars as $key => $value) {
		if (mb_substr($value,0,7) === '<image>'){
			//remove the tag <image> to get the bytes of the image.
			$byteString = mb_substr($value,7,-8);
			
			//The image bytes where interpreted in ISO-8859-1 encoding. 
			//Then, that string was encoded in UTF-8 due to compatibility 
			//issues of the transport layers of data from the servlet to here.
			//Thus, we have to decode from UTF-8 to get the ISO-8859-1 bytes, 
			//which are the image bytes.
			
			$byteString = utf8_decode($byteString);
			//calculate the md5 hash of the bytes
			$hash=md5($byteString);
			$filename=$hash . '.png';
			$path= $dir . '/' . $filename;
			
			//Note that the file is created according to ISO-8859-1 
			//encoding of the string.
			file_put_contents($path,$byteString);
			
			//add tags;
			$vars[$key]='<image>' . $filename . '</image>';
		}
	}
}

function wrsqz_getVars($text) {
	global $CFG;
	
	$text = mb_ereg_replace('#(' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##' . WIRISQUIZZESEXTENSION . '\1', $text);
	$text = mb_ereg_replace('###' . WIRISQUIZZESEXTENSION . '(' . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##\1', $text);
	$text = mb_ereg_replace('##([TLMW]' . WRSQZ_ONLYLETTERSANDNUMBERS . '*)', '##\1##', $text);

	$varList = array();
	
	while (mb_ereg('##T' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*##', $text, $replaces)) {
		$text = str_replace($replaces, ' ', $text);
		$replaces[0] = rtrim($replaces[0], '##');
		$varList[$replaces[0]] = str_replace('##T', '', $replaces[0]);
	}
	
	while (mb_ereg('##L' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*##', $text, $replaces)) {
		$text = str_replace($replaces, ' ', $text);
		$replaces[0] = rtrim($replaces[0], '##');
		$varList[$replaces[0]] = 'latex(' . str_replace('##L', '', $replaces[0]) . ')';
	}
	
	while(mb_ereg('##M' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*##', $text, $replaces)) {
		$text = str_replace($replaces, ' ', $text);
		$replaces[0] = rtrim($replaces[0], '##');
		$varList[$replaces[0]] = 'mathml(' . str_replace('##M', '', $replaces[0]) . ')';
	}
	
	while(mb_ereg('##W' . WRSQZ_ONLYLETTERS . WRSQZ_ONLYLETTERSANDNUMBERS . '*##', $text, $replaces)) {
		$text = str_replace($replaces, ' ', $text);
		$replaces[0] = rtrim($replaces[0], '##');
		$varList[$replaces[0]] = 'mathml(' . str_replace('##W', '', $replaces[0]) . ')';
	}

	return $varList;
}

function wrsqz_openServlet($data) {
	global $CFG;

    //Number of attempts before returning an error.
    $maxAttempts = 6;
    $attempt = 0;

	if (!$CFG->wirisPHP4compatibility) {
    //PHP5
		$postdata = http_build_query($data, '', '&');

		$contextArray = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
				'content' => $postdata
			)
		);
		
		if (isset($CFG->wirisproxy) and $CFG->wirisproxy) {
			$contextArray['http']['proxy'] = 'tcp://' . $CFG->wirisproxy_host . ':' . $CFG->wirisproxy_port;
			$contextArray['http']['request_fulluri'] = true;
		}

		$context = stream_context_create($contextArray);


		while($attempt < $maxAttempts && (($response = @file_get_contents('http://' . $CFG->wirisquizzes_serverhost . ':' . $CFG->wirisquizzes_serverport . $CFG->wirisquizzes_serverpath, false, $context)) === false)) {
			$attempt++;
            sleep(2); //wait two seconds
		}

        if ($attempt >= $maxAttempts) return false;
        
		return $response;
	}
	//PHP4

  $postdata = http_build_query($data, null, '&');

	$query = 'POST ' . $CFG->wirisquizzes_serverpath . " HTTP/1.0\r\n";
	$query .= 'Host: ' . $CFG->wirisquizzes_serverhost . ':' . $CFG->wirisquizzes_serverport . "\r\n";
	$query .= "Connection: close\r\n";
	$query .= "Content-Type: application/x-www-form-urlencoded; charset=UTF-8\r\n";
	$query .= 'Content-Length: ' . mb_strlen($postdata) . "\r\n";
	$query .= "\r\n";
	$query .= $postdata;

    do{
        $status = true;

        if (($socket = fsockopen($CFG->wirisquizzes_serverhost, $CFG->wirisquizzes_serverport)) === false) {
            $status = false;
        }

        $status = $status && fwrite($socket, $query);
        $content = '';

        while (!feof($socket)) {
            if(($read = fgets($socket, 128)) === false){
                $status = false;
            }else{
                $content .= $read;
            }
        }

        $status = fclose($socket) && $status;

        //check HTTP error
        $status = $status && wrsqz_check_header($content);
        
        
        if (!$status){
            $attempt++;
            sleep(2);
        }

    }while(!$status && $attempt<$maxAttempts);

    if (!$status) return false;

	$content_splited = explode("\r\n\r\n", $content, 2);
	return $content_splited[1];
}
function wrsqz_check_header($content){
    //first line of header is:
    //HTTP-Version SP Status-Code SP Reason-Phrase CRLF
    $array = explode(' ',$content,3);
    $code = $array[1];
    if ($code[0]=="2"){
        return true;
    }else{
        return false;
    }
}

function wrsqz_isEmptySession($session) {
	if (mb_strpos($session,"<mo") !== false) return false;
	if (mb_strpos($session,"<mi") !== false) return false;
	if (mb_strpos($session,"<mn") !== false) return false;
	if (mb_strpos($session,"<csymbol") !== false) return false;
	return true;	
}
function wrsqz_getProgram($questionType, $questionId){
    global $wrsqz_programTable;
    $programTable =  $wrsqz_programTable[$questionType];
    if (($record = get_record($programTable, 'question', $questionId)) !== false) {
		if ($record->program != 'NULL') {
			return $record->program;
		}
	}
    return false;
}
function wrsqz_embeddedShortanswerInput($wrapped, $value, $inputname, $style = '', $readonly = '', $popup = ''){
    //TODO: implement this function
    /*
    global $CFG;
    //
    if(empty($value)){
        echo "<span onclick=\"javascript::openFormulaEditor($inputname, '')\">";
        echo "<input $style readonly=\"readonly\" $popup type=\"text\" size=\"15\" />";
        echo "<img src=\"".$CFF->dirroot .'/.../wiris-formula.gif'."\"/>";
        echo "<input type=\"hidden\" name=\"".$inputname."\" value=\"\" />";
        echo "</span>";
    }else{
        //print image and a container for the image
        echo "<span>";
        echo "</span>";
    }
    echo '</label>';*/
}

function wrsqz_getAvailableCASLangs(){
    global $CFG;
    
    $langs = explode(',',$CFG->wiriscaslang);
    foreach($langs as $key=>$lang){
        $langs[$key]=trim($lang);
    }
    sort($langs);
    return $langs;
}

/*
 * It returns the cas code of an empty session with the language depending on the
 * current user's language.
 */
function wrsqz_getDefaultCASCode ($lang){
    return '<session version="2.0" lang="'. $lang
    .'"><library closed="false"><mtext style="color:#ffc800" xml:lang="es">'
    .'variables</mtext><group><command><input><math xmlns="http://www.w3.or'
    .'g/1998/Math/MathML"/></input></command></group></library></session>';
}

function wrsqz_CASLanguageFromSession($session){
    if(!empty($session)){
       /* $index = mb_strpos($session, 'lang=\"');
        if($index!==false){
            $lang = mb_substr($session, $index+mb_strlen('lang=\"'), 2);
            return $lang;
        }*/
        $index = mb_strpos($session, 'lang="');
        if($index!==false){
            $lang = mb_substr($session, $index+mb_strlen('lang="'), 2);
            return $lang;
        }
        
    }
    return wrsqz_currentCASLanguage();
    
}
/*
 * If $session=null, Returns the CAS language depending on the current moodle language and
 * the $CFG->wiriscaslang config variable.
 * If $session!=null, returns the language extracted from the XML $session.
 */
function wrsqz_currentCASLanguage(){
    global $CFG;
    
    require_once($CFG->dirroot . '/lib/moodlelib.php');
    $moodlelang = current_language();
    $moodlelang = substr($moodlelang,0,2);
    $caslangs = explode(',',$CFG->wiriscaslang);
    if (in_array($moodlelang, $caslangs)){
        return $moodlelang;
    }else{
    //CAS doesn't support that moodle language. We have to make a choice.
        if(in_array('en',$caslangs)){
            return 'en';
        }else{
            return $caslangs[0];
        }
    }
}

/* It returns the CAS class name depending on $lang
 */
function wrsqz_getCASClass($lang){
    global $CFG;
    $template = $CFG->wiriscasclass;    //WirisApplet_net_en
    return substr($template,0,-2) . $lang;
}
/*
 * It returns the CAS jar filename name depending on $lang
 */
function wrsqz_getCASArchive($lang){
    global $CFG;
    $template = $CFG->wiriscasarchive; //wrs_net_en.jar
    return substr($template,0,-6) . $lang . '.jar';
}
/**
 *
 */
function wrsqz_getEditorReservedWords($lang = ''){
  if(!$lang){
    $lang = substr(current_language(),0,2);
  }
  if($lang == 'es'){
    return 'e,log,exp,ln,'.
    'sin,sen,cos,tan,tg,'.
    'asin,asen,acos,atan,'.
    'arcsen,arccos,arctan,'.
    'cosec,sec,cotan,'.
    'acosec,asec,acotan,'.
    'sinh,senh,cosh,tanh,'.
    'asinh,asenh,acosh,atanh,'.
    'arcsinh,arcsenh,arccosh,arctanh,'.
    'cosech,sech,cotanh,'.
    'acosech,asech,acotanh';
  }else{
    return 'e,log,exp,ln,'.
    'sin,cos,tan,tg,'.
    'asin,acos,atan,'.
    'arcsin,arccos,arctan,'.
    'cosec,sec,cotan,'.
    'acosec,asec,acotan,'.
    'sinh,cosh,tanh,'.
    'asinh,acosh,atanh,'.
    'arcsinh,arccosh,arctanh,'.
    'cosech,sech,cotanh,'.
    'acosech,asech,acotanh';
  }
}
/*
 * Calls moodle get_string function with wiris-quizzes file path for string files.
 */
function wrsqz_get_string($id, $questionType=null){
    global $CFG;
    $fromQtype = array(
        'addingessaywiris','editingessaywiris','essaywiris',
        'addingmatchwiris','editingmatchwiris','matchwiris',
        'addingshortanswerwiris','editingshortanswerwiris','shortanswerwiris',
        'addingmultianswerwiris','editingmultianswerwiris','multianswerwiris',
        'addingmultichoicewiris','editingmultichoicewiris','multichoicewiris',
        'addingtruefalsewiris','editingtruefalsewiris','truefalsewiris');

//From moodle lang files
    if(in_array($id,$fromQtype)){
        if(substr($id, -5)=='wiris'){
            $id = substr($id, 0, -5);
        }
        if(!empty($questionType)){
            $string = get_string($id,'qtype_'.$questionType);
            if(substr($string,0,1)!='['){
                return $string;
            }
        }
        return get_string($id,'quiz');
    }
//From wiris-quizzes lang files
    return get_string($id,'wiris-quizzes',null,$CFG->dirroot.'/wiris-quizzes/lang/');
}
/*
 * Calls moodle helpbutton function and repaces help.php file for wiris-quizzes/help.php
 */
function wrsqz_helpbutton($qtype){
    $link = helpbutton($qtype, wrsqz_get_string('wrsqz_wirisquizzes'),'wiris-quizzes',true,false,'',true);
    $link = str_replace('help.php','wiris-quizzes/help.php', $link);
    return $link;
}

/*
 * Check if the CAS session $session is in an available language. In this case,
 * we don't do anything. If not, the program is translated into one available
 * language using the service.
 * Returns array($newsession, $cangedvars), where $newsession is the translated
 * session and $changedvars is an associative array with a translation of eventually
 * changed variable names.
 */
function wrsqz_importCASSession($session){
    global $CFG;
    $sessionlang = wrsqz_CASLanguageFromSession($session);
    $availablelangs = explode(',',$CFG->wiriscaslang);
    if(in_array($sessionlang, $availablelangs)){
        return array($session, null);
    }
    //We must choose a valid language and translate the session.
//TODO use currentCASLanguage
    if(in_array('en',$availablelangs)){
        $objectivelang = 'en';
    }else{
        $objectivelang = $availablelangs[0];
    }

    return wrsqz_translateCASSession($session, $objectivelang);

}
function wrsqz_translateCASSession($session, $language){
    //Call servlet in order to translate program
    $postdata = array(
			'mode' => 'problem',
            'problem' => $session,
			'function' => 'translate',
            'lang' => $language
	);

    $message = wrsqz_openServlet($postdata);

    if($message!==false){
        $result  = explode(';',$message);
        if($result[0]!='true'){
            return false;
        }
        $newsession = urldecode($result[1]);
        $changedVars = array();
        if (!empty($result[2])){
            $changedVarsTmp = explode(',',$result[2]);
            foreach ($changedVarsTmp as $changedvar){
                $mapping = explode('=',$changedvar);
                $changedVars[urldecode($mapping[0])] = urldecode($mapping[1]);
            }
        }
        return array($newsession, $changedVars);

    }else{
    //The session couldn't be translated
        return false;
    }
}
/**
 * Replace variable names using $nameMap in the tables of $questionId.
 */
function wrsqz_replaceVarReferencesInDatabase($questionType, $questionId, $nameMap){
    $extradbfields = array(
        'essay'       => array(),
        'match'       => array(
                         'question_match_sub'=>array('questiontext','answertext')
                         ),
        'multianswer' => array(),
        'multichoice' => array(
                         'question_multichoice'=>array('correctfeedback','partiallycorrectfeedback','incorrectfeedback'),
                         'question_answers'=>array('answer','feedback')
                         ),
        'shortanswer' => array(
                         'question_answers'=>array('answer','feedback')
                         ),
        'truefalse'   => array(
                         'question_answers'=>array('answer','feedback')
                         )
        );
    //update common text fields
    $question = get_record('question','id',$questionId);
    $question->questiontext = wrsqz_replaceVars($nameMap,$question->questiontext);
    $question->generalfeedback = wrsqz_replaceVars($nameMap,$question->generalfeedback);
    update_record('question', $question);

    //update type specific text fields
    $textfields = $extradbfields[$questionType];
    foreach($textfields as $table=>$fields){
        $values = get_records($table,'question',$questionId);
        foreach($values as $value){
            foreach($fields as $field){
                $value->$field = wrsqz_replaceVars($nameMap,$value->$field);
            }
            update_record($table, $value);
        }
    }
    //update special-encoded fields
    if($questionType == 'shortanswer' || $questionType=='multianswer'){
        $table = 'question_'.$questionType.'wiris';
        $wirisrecord = get_record($table,'question',$questionId);
        mb_parse_str($wirisrecord->eqoption, $eqoptionArray);
        if(isset($eqoptionArray['testFunctionName'])){
            foreach($eqoptionArray['testFunctionName'] as $index=>$value){
                $eqoptionArray['testFunctionName'][$index] = wrsqz_replaceVars($nameMap,$value, false);
            }
        }
        if(function_exists('http_build_query')){
            $wirisrecord->eqoption = http_build_query($eqoptionArray,null,'&');
        }else{
            $wirisrecord->eqoption = wrsqz_http_build_query($eqoptionArray);
        }
        if(!isset($wirisrecord->eqoption) || $wirisrecord->eqoption == null){
            $wirisrecord->eqoption = '';
        }
        update_record($table, $wirisrecord);
    }

    //recursive calls for multianswer question
    if($questionType == 'multianswer'){
        $subquestions = get_records('question','parent',$questionId,'id,qtype');
        foreach($subquestions as $id=>$subquestion){
            $qtype = $subquestion->qtype;
            if(substr($qtype,-5)=='wiris'){
                $qtype = substr($qtype,0,-5);
            }
            wrsqz_replaceVarReferencesInDatabase($qtype, $id, $nameMap);
        }
    }
    
}

/**
 * It is used for a question object given by user through the edit form. This
 * object is the same as the one expected by save_question() or
 * save_question_options() functions.
 */
function wrsqz_replaceVarReferencesInFlatQuestion($questionType, &$question, $nameMap){

    $fields = wrsqz_getFormFieldsArray($questionType);
    $singlefields = $fields[0];
    $arrayfields  = $fields[1];

    foreach($singlefields as $field){
        if(isset($question->$field))
            $question->$field = wrsqz_replaceVars($nameMap,$question->$field);
    }
    foreach($arrayfields as $arrayfield){
        if(isset($question->$arrayfield)){
            foreach($question->$arrayfield as $index=>$value){
                $question->$arrayfield[$index]=wrsqz_replaceVars($nameMap,$value);
            }
        }
    }

    return $question;
}

/*
 * Takes the object $mform and replace the variable names using $nameMap. It
 * searches in all text fields of $mform->_elements and $mform->_submitValues
 */
function wrsqz_replaceVarReferencesInForm($questionType, &$mform, $nameMap){


    $formFields = wrsqz_getFormFieldsArray($questionType);
    $singleFields = $formFields[0];
    $arrayFields = $formFields[1];

    foreach($singleFields as $field){
        $index = $mform->_elementIndex[$field];
        if(isset($mform->_elements[$index]->_value))
            $mform->_elements[$index]->_value = wrsqz_replaceVars($nameMap, $mform->_elements[$index]->_value);
        if(isset($mform->_submitValues[$field]))
            $mform->_submitValues[$field] = wrsqz_replaceVars($nameMap,  $mform->_submitValues[$field]);
    }
    
    foreach($arrayFields as $field){
        $i=0;
        while(isset($mform->_elementIndex[$field.'['.$i.']'])){
            $index = $mform->_elementIndex[$field.'['.$i.']'];
            if(isset($mform->_elements[$index]->_value))
                $mform->_elements[$index]->_value = wrsqz_replaceVars($nameMap, $mform->_elements[$index]->_value);
            $i++;
        }
        if(isset($mform->_submitValues[$field])){
            foreach($mform->_submitValues[$field] as $index=>$value){
                $mform->_submitValues[$field][$index] = wrsqz_replaceVars($nameMap, $value);
            }
        }
    }

    return $mform;
}

function wrsqz_getFormFieldsArray($questionType){
    $formFieldsByQuestionType =array(
        'essay'=> array(array('questiontext','generalfeedback','feedback'),array()),
        'match'=> array(array('questiontext','generalfeedback'),array('subquestions','subanswers')),
        'multichoice' => array(array('questiontext','generalfeedback','correctfeedback',
                                    'partiallycorrectfeedback','incorrectfeedback'),
                               array('gradeOverride','answer','feedback')),
        'multianswer' => array(array('questiontext','generalfeedback'),array()),
        'shortanswer' => array(array('questiontext','generalfeedback'),array('answer','testFunctionName','feedback')),
        'truefalse' => array(array('questiontext','generalfeedback','feedbacktrue','feedbackfalse','wirisAnswer'),array())
    );
    return $formFieldsByQuestionType[$questionType];
}

//Replaces $oldnames[$i] by $newnames[$i], only when $oldnames[$i] is followed
//by a nonalphanumeric character except '_' or ends the $string.
//ex (#a,#b,#ab)=>#ab ; (#a,#b,#a+#b)=>#b+#b
function wrsqz_replaceVars($nameMap, $string, $addsharp=true){
   foreach ($nameMap as $oldname=>$newname){
        if($addsharp){
            $oldname = '#'.$oldname;
            $newname = '#'.$newname;
        }
        $start=0;
        while(($start = strpos($string, $oldname, $start))!==false){
            if($start + strlen($oldname) == strlen($string)){ //if we are in the end of the string
                $string = substr($string, 0, $start) . $newname;
                $start += strlen($newname);
            }else{
                $nextchar = substr($string,$start+strlen($oldname),1);
                if(!ctype_alnum($nextchar) && $nextchar!='_'){ //if the next character is not alphanumeric
                    $string = substr($string,0,$start) . $newname . substr($string,$start+strlen($oldname));
                    $start += strlen($newname);
                }else{
                    $start += strlen($oldname);
                }
            }
        }
    }
    return $string;
}

function wrsqz_html_is_blank($str){
    if (function_exists("html_is_blank")){
    //If moodle in new enough
        return html_is_blank($str);
    }else{
    //If moodle is old
        return wrsqz_deprecated_html_is_blank($str);
    }
}
/*this function is used by save_session_and_responses in order to escape the
 delimiter characters. It is done in the same way as in multianswer questiontype*/
function wrsqz_escapeDelimiterChars($str){
    $unescaped = array(',' , '-', '.' , ':');
    $escaped   = array('&#0044;', '&#0045;', '&#0046;', '&#0058;');
    $str = str_replace(';','&#0059;',$str);
    $str = str_replace($unescaped,$escaped,$str);
    return $str;
}
/*this function is used by restore_session_and_responses*/
function wrsqz_unescapeDelimiterChars($str){
    $escaped   = array('&#0044;', '&#0045;', '&#0046;', '&#0058;', '&#0059;');
    $unescaped = array(',' , '-', '.' , ':', ';');
    return str_replace($escaped,$unescaped,$str);
}

/**

@param $prefix String a name prefix. Usually $question->name_prefix. It is used
       in order to distinguish between applets.
@param $wirisCASContent String the MathML content of WIRIS CAS.
@param $printString if true, prints a string telling user that can do auxiliar
       computations.
@return an html with a tag <applet> that includes the WIRS CAS applet.

**/
function wrsqz_wirisCASAppletHTML($prefix, $wirisCASContent='', $printString = TRUE, $width = 500, $height = 265){
  global $CFG;
$casLang = empty($wirisCASContent) ? wrsqz_currentCASLanguage() : wrsqz_CASLanguageFromSession($wirisCASContent);
  $html = '<div class="wirisCASApplet">';
  if($printString){
    $html .= wrsqz_get_string('wrsqz_candocomputations')."\n";
    $html .= '<br />'."\n";
  }
  $html .= '<applet'."\n";
  $html .= 'id="'.$prefix.'wirisCAS"'."\n";
  $html .= 'width="'.$width.'" height="'.$height.'"'."\n";
  $html .= 'name="'.$prefix.'wirisCAS"'."\n";
  $html .= 'codebase="'.$CFG->wiriscascodebase.'"'."\n";
  $html .= 'archive="'.wrsqz_getCASArchive($casLang).'"'."\n";
  $html .= 'code="'.wrsqz_getCASClass($casLang).'"'."\n";
  $html .= '>'."\n";
  if($wirisCASContent){
    $html .= '<param name="command" value="false" />'."\n";
    $html .= '<param name="commands"       value="false" />'."\n";
    $html .= '<param name="interface"      value="false" />'."\n";
    $html .= '<param name="XMLinitialText" value="'.$wirisCASContent.'" />'."\n";
  }
  $html .= '</applet>';
  $html .= '<input type="hidden" id="'.$prefix.'wirisCASHidden" name="'.$prefix.'wirisCASHidden" value=""/>';
  $html .= '</div>'."\n";
  return $html;
}
/**
@param $prefix String a name prefix. Usually $question->name_prefix. It is used
       in order to distinguish between applets.
@param $grammar String URL of grammar file
@param $grammarTarget String name of the target in grammar
@param $wirisFormulaContent String the MathML content of the Editor.
@param $width int in pixels
@param $height int in pixels
**/
function wrsqz_wirisEditorAppletHTML($prefix, $grammar, $grammarTarget, $wirisFormulaContent = '' ,$width=500, $height=265){
  global $CFG;
  $formulaCodebase = 'http://' . $CFG->wirisservicehost . ':' . $CFG->wirisserviceport . $CFG->wirisservicepath . '/codebase';
  $reservedWords = wrsqz_getEditorReservedWords();
  $html = '<div class="wirisEditorApplet">';
  //applet
  $html .= '<applet name="'.$prefix.'wirisEditor"'."\n";
  $html .= 'codebase="'.$formulaCodebase.'"'."\n";
  $html .= 'archive="'.$CFG->wiriseditorarchive.'"'."\n";
  $html .= 'code="'.$CFG->wiriseditorclass.'"'."\n";
	$html .= 'width="'.$width.'" height="'.$height.'">'."\n";
  if(isset($CFG->wirisserviceversion)){
    $html .= '<param name="version" value="'.$CFG->wirisserviceversion.'"/>'."\n";
  }
  $html .= '<param name="lang" value="'.substr(current_language(),0,2).'"/>'."\n";
	$html .= '<param name="menuBar" value="true"/>'."\n";
	$html .= '<param name="content" value="'.$wirisFormulaContent.'"/>'."\n";
	$html .= '<param name="reservedWords" value ="'.$reservedWords.'"/>'."\n";
	$html .= '<param name="grammar.1.name" value="f1"/>'."\n";
	$html .= '<param name="grammar.1.src" value="'.$grammar.'"/>'."\n";
  $html .= '<param name="grammar.1.target" value="'.$grammarTarget.'"/>'."\n";
	$html .= '</applet>'."\n";
  //hidden fields
  $html .= '<input type="hidden" id="'.$prefix.'wirisEditorResponse" name="'.$prefix.'" value="'.$wirisFormulaContent.'" />';
  $html .= '<input type="hidden" id="'.$prefix.'wirisEditorHidden" name="'.$prefix.'wirisEditorHidden"	value="" />'."\n";
	$html .= '</div>';
	return $html;
}

/**
 * @return the default grammar url: http://services.wiris.com/quizzes/grammar/Expression
 * **/
function getGrammarURL(){
  global $CFG;
  $server = 'http://' . $CFG->wirisquizzes_serverhost . ':' . $CFG->wirisquizzes_serverport;
  //remove the
  $path = substr($CFG->wirisquizzes_serverpath, 0, strrpos($CFG->wirisquizzes_serverpath, '/'));
  $path .= '/grammar/Expression';
  return $server . $path ;
}

function wrsqz_log($str){
	global $CFG;

	$fd = fopen($CFG->dataroot . '/' . $CFG->wirisquizzes_imagedir . '/log.txt','a');
	fwrite($fd,print_r($str,true) . "\n");
	fclose($fd);
}


?>