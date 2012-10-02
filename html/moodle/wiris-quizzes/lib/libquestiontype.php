<?php
global $CFG;
require_once($CFG->dirroot . '/wiris-quizzes/lib/functions.php');
require_once($CFG->dirroot . '/lib/moodlelib.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/deprecated.php');
mb_internal_encoding('UTF-8');
/**
 * WIRIS Quizzes allows to change which is the correct answer. This function
 * applies such changes.
 */
function wrsqz_swap($questionType, $dbType, &$question, &$state) {
	if (isset($question) && isset($question->options) && isset($question->options->wiris) && !empty($question->options->wiris->override)) {
		if ($questionType == 'truefalse') {
			$result = wrsqz_variablesToText($question->options->wiris->override);

			if (wrsqz_checkBool($state->vars[$result])) {
				$question->options->answers[$question->options->trueanswer]->fraction = 1;
				$question->options->answers[$question->options->falseanswer]->fraction = 0;
			}else {
				$question->options->answers[$question->options->falseanswer]->fraction = 1;
				$question->options->answers[$question->options->trueanswer]->fraction = 0;
			}
		}
		else if ($questionType == 'multichoice') {
			$overrideList = explode(';', $question->options->wiris->override);
			
			if (isset($state) && !empty($state->vars)) {
				$i = 0;
				
				foreach ($question->options->answers as $answer) {
					if (!empty($overrideList[$i])){
						$overrideList[$i] = wrsqz_variablesToText($overrideList[$i]);
						$grade = $state->vars[$overrideList[$i]];
                        if(is_numeric($grade)){
                            if($grade<0) $grade=0;
                            else if ($grade >1) $grade=1;

                            $answer->fraction = $grade;
                        }else if(wrsqz_checkBool($grade)){
                            $answer->fraction = 1;
                        }else{
                            $answer->fraction = 0;
                        }
					}
                    $i++;
				}
			}
		}
	}
}

/**
 * Creates empty session and response information for the question
 * @param object $cmoptions . if $cmoptions->commonseed==true then this question
 * random seed will be set to $cmoptions->seed;
 */
function wrsqz_create_session_and_responses($questionType, $dbType, &$question, &$state, &$cmoptions, $attempt) {
	
	$state->responses = array('' => '');
  if(isset($cmoptions->commonseed) && $cmoptions->commonseed && isset($cmoptions->seed)){
    $state->seed = $cmoptions->seed;
  }else{
    $state->seed = mt_rand(1, 31415);
  }
  
	$state->vars = array('' => '');
	
	$text = ' ' . $question->questiontext;
	$text .= ' ' . $question->generalfeedback;
	
    $text .= wrsqz_extra_variables($questionType, $question, $state);
	
	/*if ($questionType == 'multianswer') {
        //WARNING: what happens with match questions? is $state valid?
        foreach($question->options->questions as $key => $wrapped) {
            $text .= wrsqz_extra_variables($wrapped->qtype, $wrapped, $state);
        }
    }*/

  // Compute program to get variables.
	$data = array(
		'seed' => $state->seed,
		'text' => $text,
		'wiris' => $question->options->wiris
	);

	$info = wrsqz_getInfo($questionType, $question->id, $data);
	

	if (array_key_exists('id', $info) && $info['id'] != $question->options->wiris->idcache) {		
		$question->options->wiris->idcache = $info['id'];
		update_record('question_' . $questionType . 'wiris', $question->options->wiris);
	}
	
  // The variables are stored in the state session.
	if (isset($info['vars'])) {
		$state->vars = $info['vars'];
	}

	return true;
}

// This function is used only by wrsqz_create_session_and_responses and return
// a text containing references to the variables that are needed for each qtype
function wrsqz_extra_variables($questionType, $question, $state){
    $text = '';

    if($questionType=='match'){
      foreach ($question->options->subquestions as $subquestion) {
			  $text .= ' ' . $subquestion->questiontext;
			  $text .= ' ' . wrsqz_variablesToText($subquestion->answertext);
		  }

		  foreach ($state->options->subquestions as $subquestion) {
			  $text .= ' ' . $subquestion->questiontext;
			  $text .= ' ' . wrsqz_variablesToText($subquestion->answertext);

			  foreach($subquestion->options->answers as $answer) {
				  $text .= ' ' . wrsqz_variablesToText($answer->answer);
			  }
		  }

    }else if($questionType=='multichoice'){
      $text .= ' ' . $question->options->correctfeedback;
		  $text .= ' ' . $question->options->partiallycorrectfeedback;
		  $text .= ' ' . $question->options->incorrectfeedback;

		foreach($question->options->answers as $answer) {
			$text .= ' ' . $answer->answer;
			$text .= ' ' . $answer->feedback;
		}

		$text .= ' ' . wrsqz_variablesToText(str_replace(';', ' ', $question->options->wiris->override));

    }else if($questionType=='shortanswer'){
      foreach ($question->options->answers as $answer) {
        $text .= ' ' . wrsqz_variablesToText($answer->answer);
        mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);

        if (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true') {
          $text .= ' ' . wrsqz_textToVariables($answer->answer);  //to fill the formula editor with the correct answer
          $text .= ' ' . $answer->answer;  //to generate a image with the correct answer
        }

        $text .= ' ' . $answer->feedback;
		  }
    }else if($questionType=='truefalse'){

        foreach ($question->options->answers as $answer) {
			$text .= ' ' . $answer->answer;
			$text .= ' ' . $answer->feedback;
		}

		$text .= ' ' . wrsqz_variablesToText(str_replace(';', ' ', $question->options->wiris->override));
    }else if($questionType=='multianswer'){
        foreach($question->options->questions as $wrapped){
            if(substr($wrapped->qtype,-5) == 'wiris'){
                $text .= wrsqz_extra_variables(substr($wrapped->qtype,0,-5), $wrapped, $state);
            }
            //in cloze mode, multichoice may appear as a combolist, so we need
            //answer variables in text mode.
            if($wrapped->qtype=='multichoicewiris' && ($wrapped->options->layout == '0')){
                foreach($wrapped->options->answers as $answer){
                    $text .= ' ' . wrsqz_variablesToText($answer->answer);
                }
            }
        }

    }

    return $text;
}

function wrsqz_restore_session_and_responses_1($questionType, $dbType, &$question, &$state) {
	
	$info = explode('<.>', $state->responses[''], 5);
	$seed = $vars = $grades = $response = $casvalue = '';

	if (isset($info[0])) {
		$seed = $info[0];
		
		if (isset($info[1])) {
			$vars = $info[1];
			
			if (isset($info[2])) {
				$grades = $info[2];
				
				if (isset($info[3])) {
					$response = $info[3];
          
          if(isset($info[4])){
            $casvalue = $info[4];
          }
				}
			}
		}
	}
	
	
	if($questionType=='match'){
	//this is because the parent class (match_qtype) uses a 
	//serialized form "x-y,z-x,..." in variable responses[''] in
	//order to restore the responses of a match type question.
		$state->responses['']=str_replace('<;>',',',$response);
	}else if($questionType=='multichoice'){
	//In this case, parent class expects comma separated list.
     $user_responses = explode('<;>',$response);
     if(count($user_responses)>= 2){ //if there are responses
       $state->responses['']=str_replace('<,>',',',$user_responses[1]);
     }
	}else if($questionType == 'multianswer'){
     $response=str_replace('<;>',',',$response);
     $state->responses['']=str_replace('<,>','-',$response);
  }
	
	return array(
		'seed' => $seed,
		'vars' => $vars,
		'grades' => $grades,
		'response' => $response,
    'casvalue' => $casvalue
	);
}

function wrsqz_restore_session_and_responses_2($questionType, $dbType, $values, &$question, &$state) {
    
	$state->seed = $values['seed'];

	$varList = explode('<;>', $values['vars']);
	$state->vars = array();
	foreach($varList as $var) {
		$varAttributes = explode('<,>', trim($var));
		
		if (count($varAttributes) >= 2) {
			$state->vars[$varAttributes[0]] = wrsqz_unescapeDelimiterChars(stripslashes($varAttributes[1]));
		}
	}

    if($questionType=='multianswer'){
        $gradeList = explode('<;;;>', $values['grades']);
        $state->grades = array();
        if(!empty($gradeList)){
            foreach ($gradeList as $questiongrades){
                $questiongrades = explode('<->', $questiongrades);
                $state->grades[$questiongrades[0]]=array();
                if (count($questiongrades) >= 2) {
                    $singlegrades = explode('<;>',$questiongrades[1]);
                    foreach($singlegrades as $singlegrade){
                        $gradeAttributes = explode('<,>', $singlegrade);
                        if (count($gradeAttributes) >= 2) {
                            $state->grades[$questiongrades[0]][$gradeAttributes[0]] = wrsqz_unescapeDelimiterChars($gradeAttributes[1]);
                        }
                    }
                }
            }
        }
    }else{
        $gradeList = explode('<;>', $values['grades']);
        $state->grades = array();
        foreach($gradeList as $grade) {
            $gradeAttributes = explode('<,>', trim($grade));

            if (count($gradeAttributes) >= 2) {
                $state->grades[$gradeAttributes[0]] = wrsqz_unescapeDelimiterChars($gradeAttributes[1]);
            }
        }
    }
	
	$respList = explode('<;>', $values['response']);
	
	
  if($questionType == 'multichoice'){
    if(count($respList) >= 2){
        //if there are responses, there will be 2 items
        $state->options->order = explode('<,>',$respList[0]);
        //responses are properly restored by parent class.
    }
	}else if($questionType == 'shortanswer' || $questionType == 'truefalse'
            || $questionType == 'essay'){
		$state->responses = array();
    foreach($respList as $res){
      $pair = explode('<,>',$res);
      if(isset($pair[1])){
        $state->responses[$pair[0]]=wrsqz_unescapeDelimiterChars($pair[1]);
      }else{//blank response
        $state->responses[$pair[0]]='';
      }
		}
	}else if($questionType == 'multianswer'){
    foreach($state->responses as $key=>$value){
      $state->responses[$key] = wrsqz_unescapeDelimiterChars($value);
    }
  }
  
  if(!empty($values['casvalue'])){
    $state->responses['wirisCASHidden'] = wrsqz_unescapeDelimiterChars($values['casvalue']);
  }
}

/**
 * TODO: change this function. Use PHP serialize function and things will become
 * much easier. In order to do this, you will have to change restore_session.. and
 * make a upgrade database function.
 * **/
function wrsqz_save_session_and_responses($questionType, $dbType, &$question, &$state) {
	// seed<.>vars<.>grades<.>response<.>hiddenCASValue
    //escaped fields: var values, grade values, response values in shortanswer truefalse essay & multianswer qtypes.


	$session = '';
	
	if (isset($state->seed)) {
		$session = $state->seed;
	}
	
	$session .= '<.>';
	
	if (!empty($state->vars)) {
		foreach ($state->vars as $key => $value) {
			$session .= $key . '<,>' . wrsqz_escapeDelimiterChars(addslashes($value)) . '<;>';
		}
	}

	$session .= '<.>';

  $gradesstring = '';
	if (!empty($state->grades)) {
        if( $questionType == 'multianswer' ){
            foreach ($state->grades as $answerkey => $grades) {
                if($gradesstring != ''){
                    $gradesstring .= '<;;;>';
                }
                $gradesstring .= $answerkey . '<->';
                foreach($grades as $gradekey => $grade){
                    $gradesstring .= $gradekey . '<,>' . wrsqz_escapeDelimiterChars($grade) .'<;>';
                }
            }
        }else{
            foreach ($state->grades as $key => $value) {
                $gradesstring .= $key . '<,>' . wrsqz_escapeDelimiterChars($value) . '<;>';
            }
        }
    }
	  $session .= $gradesstring . '<.>';
    
    $casvalue = '';
    if(!empty($state->responses['wirisCASHidden'])){
      $casvalue = $state->responses['wirisCASHidden'];
      unset($state->responses['wirisCASHidden']);
    }
    
    if ($questionType == 'match') {
	
            //*******Start copy & paste from match/questiontype.php

            $subquestions = &$state->options->subquestions;

            // Prepare an array to help when disambiguating equal answers.
            $answertexts = array();
            foreach ($subquestions as $subquestion) {
                $ans = reset($subquestion->options->answers);
                $answertexts[$ans->id] = $ans->answer;
            }

            // Serialize responses: queId1-ansId1<;>queId2-ansId2<;>...<;>hiddenCASValue-value
            $responses = array();
            foreach ($subquestions as $key => $subquestion) {
                $response = 0;
                if ($subquestion->questiontext !== '' && !is_null($subquestion->questiontext)) {
                    if (isset($state->responses[$key])) {
                        if($response = $state->responses[$key]){
                          if (!array_key_exists($response, $subquestion->options->answers)) {
                              // If student's answer did not match by id, but there may be
                              // two answers with the same text, but different ids,
                              // so we need to try matching the answer text.
                              $expected_answer = reset($subquestion->options->answers);
                              if ($answertexts[$response] == $expected_answer->answer) {
                                  $response = $expected_answer->id;
                                  $state->responses[$key] = $response;
                              }
                          }
                        }
                    }
                }
                $responses[] = $key.'-'.$response;
            }
            //*******End copy & paste from match/questiontype.php

            //this (<;>) is the unique difference between original questiontype and this
            $responses = implode('<;>', $responses);
	}else if ($questionType == 'multichoice') {
		$responses = implode('<,>', $state->options->order) . '<;>';
		$responses .= implode('<,>', $state->responses);
	}else if ($questionType == 'shortanswer' || $questionType == 'truefalse'
            || $questionType == 'essay' || $questionType == 'multianswer') {
		$responses = '';
		foreach ($state->responses as $key => $value) {
      if($responses != '') $responses .= '<;>';
			$responses .= $key . '<,>' . wrsqz_escapeDelimiterChars($value);
		}
	}

	$session .= $responses;

  $session .= '<.>'.wrsqz_escapeDelimiterChars($casvalue);
  $state->responses['wirisCASHidden'] = $casvalue;

	if (set_field('question_states', 'answer', $session, 'id', $state->id) !== false) {
		return true;
	}
	
	return false;
}

function wrsqz_get_question_options($questionType, $dbType, &$question) {
	if (($question->options->wiris = get_record('question_' . $questionType . 'wiris', 'question', $question->id)) !== false) {
		$question->options->wiris->options = unserialize($question->options->wiris->options);
    return true;
	}

	notify('Error: Missing question options!');
	return false;
}
/**
 * To be called before save_question_options.
 * It changes formulas in questiontext fixing MathML issues related to variable assembling.
 * **/
function wrsqz_presave_question($questionType, $dbType, &$question, &$form, $course){
  $form->questiontext = wrsqz_prepareVariablesInsideFormulas($form->questiontext);
}
function wrsqz_save_question_options($questionType, $dbType, &$question) {

    /*Delete old tables*/
  if (($oldproblem = get_records('question_' . $questionType . 'wiris', 'question', $question->id, 'id ASC')) === false) {
		$oldproblem = array();
	}
	
	foreach ($oldproblem as $op) {
		delete_records('question_' . $questionType . 'wiris', 'id', $op->id);
	}
	
	if(($oldproblem = get_records('question_' . $dbType, 'question', $question->id, 'id ASC')) === false) {
		$oldproblem = array();
	}
	
	foreach ($oldproblem as $op) {
		delete_records('question_' . $dbType, 'id', $op->id);
	}

  /*Store new values*/
	if (wrsqz_wirisQuizzesUsed($question)) {
		//common fields
    $problem->id = $problem->idcache = 0;
		$problem->question = $question->id;
    $program = $question->hiddenCASValue;
		$problem->md5 = md5($program);
    //options field

    //1. General options
    $options = array();
    if(!empty($question->wirisCASForComputations)){
      $options['wirisCASForComputations'] = $question->wirisCASForComputations;
    }
    if(!empty($question->hiddenInitialCASValue)){
      $options['hiddenInitialCASValue'] = stripslashes_safe($question->hiddenInitialCASValue);
    }
		
    //2. Question-type specific options
		if ($questionType == 'shortanswer') {
      $eqoptionArray=array();
      if(!empty($question->wirisEditor))
        $eqoptionArray['editor'] = 'true';
      if(!empty($question->multipleAnswers))
        $eqoptionArray['multipleAnswers'] = 'true';
      /*if(!empty($question->wirisCASForComputations))
        $eqoptionArray['wirisCASForComputations']='true';*/
      if(isset($question->testFunctionName)){
        $eqoptionArray['testFunctionName']=array();
        $eqoptionArray['testFunction'] = array();
        //get an indexed answer id array. this is done because answers are reordered
        //when are saved, skipping blank ones.
        if(isset($question->answers)){
          $answersList = explode(',',$question->answers);
        }else{
          $answersList = explode(',',wrsqz_deprecated_answersList($question));
        }
        $k=0;
        $answersId=array();
        foreach ($question->answer as $key => $dataanswer) {
          if (!(trim($dataanswer) == '' && $question->fraction[$key] == 0 && wrsqz_html_is_blank($question->feedback[$key]))) {
            $answersId[$key]=$answersList[$k];
            $k++;
          }
        }

        foreach($question->testFunctionName as $index => $value){
          if(!empty($value) && trim($value)!=''){
            $eqoptionArray['testFunctionName'][$index] = $value;
            if(isset($answersId[$index])){
              $eqoptionArray['testFunction'][$answersId[$index]]=$index;
            }
          }
        }
      }
      if(function_exists('http_build_query')){
        $problem->eqoption = http_build_query($eqoptionArray,null,'&');
      }else{
        $problem->eqoption = wrsqz_http_build_query($eqoptionArray);
      }
            
      if(!isset($problem->eqoption) || $problem->eqoption == null){
        $problem->eqoption='';
      }
            
		}else if ($questionType == 'truefalse') {
			$wirisAnswer = trim($question->wirisAnswer);
			$problem->override = (!empty($wirisAnswer)) ? $wirisAnswer : '';
		}else if ($questionType == 'multichoice') {
			$problem->override = implode(';', $question->gradeOverride);
		}else if ($questionType == 'multianswer'){
      $problem->eqoption = (empty($question->wirisEditor)) ? '' : 'editor=true&';
    }

    //serialize & save options field
    $problem->options = serialize($options);

		if (insert_record('question_' . $questionType . 'wiris', $problem) !== false) {
			unset($problem);
			
			$problem->id = 0;
			$problem->question = $question->id;
			$problem->program = $question->hiddenCASValue;

			if (insert_record('question_' . $dbType, $problem) !== false) {
				return true;
			}

			$result->error = 'Could not insert quiz WIRIS exercice!'; 
			return $result;
		}

		$result->error = 'Could not insert quiz ' . $questionType . 'wiris options!';
		return $result;
	}
	
	$question->qtype = $questionType;
	return update_record('question', $question);
}
function wrsqz_removeVariablePrefix($varName){
	return trim($varName,' #');
}
function wrsqz_print_question($questionType, $dbType, &$question, &$state, &$number, &$cmoptions, &$options) {
	/*if(empty($state->vars)){
		//this is needed because when a teacher previews a quiz, moodle doesn't call create_session_and_responses.
		wrsqz_create_session_and_responses($questionType, $dbType, $question, $state, $cmoptions, null);
	}*/
	$question->questiontext = wrsqz_assemble($question->questiontext, $state->vars); 
	$question->generalfeedback = wrsqz_assemble($question->generalfeedback, $state->vars); 

	if ($questionType == 'match') {
		foreach ($question->options->subquestions as $key => $subquestion) {
			$question->options->subquestions[$key]->questiontext = wrsqz_assemble($subquestion->questiontext, $state->vars);
			$question->options->subquestions[$key]->answertext = wrsqz_assemble(wrsqz_variablesToText($subquestion->answertext), $state->vars);
		}

		foreach ($state->options->subquestions as $key => $subquestion) {
			$state->options->subquestions[$key]->questiontext = wrsqz_assemble($subquestion->questiontext,$state->vars);
			$state->options->subquestions[$key]->answertext = wrsqz_assemble(wrsqz_variablesToText($subquestion->answertext), $state->vars);
			
			foreach ($state->options->subquestions[$key]->options->answers as $secondKey => $answer) {
				$state->options->subquestions[$key]->options->answers[$secondKey]->answer = wrsqz_assemble(wrsqz_variablesToText($answer->answer), $state->vars);
			}
		}
	}
	else if ($questionType == 'multichoice') {
		$question->options->correctfeedback = wrsqz_assemble($question->options->correctfeedback, $state->vars); 
		$question->options->partiallycorrectfeedback = wrsqz_assemble($question->options->partiallycorrectfeedback, $state->vars); 
		$question->options->incorrectfeedback = wrsqz_assemble($question->options->incorrectfeedback, $state->vars); 

    //this is for multichoice questions embedded in a multianswer question
    if(!empty($question->parent) && isset($question->options->layout) && ($question->options->layout==0)){
      foreach ($question->options->answers as $key => $answer) {
        $question->options->answers[$key]->answer = wrsqz_variablesToText($answer->answer);
      }
    }

		foreach ($question->options->answers as $key => $answer) {
			$question->options->answers[$key]->answer = wrsqz_assemble($answer->answer, $state->vars);
			$question->options->answers[$key]->feedback = wrsqz_assemble($answer->feedback, $state->vars);
		}
	}
	else if ($questionType == 'shortanswer') {
		foreach ($question->options->answers as $key => $answer) {
			// TODO. Remove wrsqz_variablesToText
			//$question->options->answers[$key]->answer = wrsqz_assemble($answer->answer, $state->vars);
			$question->options->answers[$key]->feedback = wrsqz_assemble($answer->feedback, $state->vars);
		}
	}
	else if ($questionType == 'truefalse') {
		foreach ($question->options->answers as $key => $answer) {
			$question->options->answers[$key]->answer = wrsqz_assemble($answer->answer, $state->vars);
			$question->options->answers[$key]->feedback = wrsqz_assemble($answer->feedback, $state->vars);
		}
	}else if ($questionType == 'multianswer'){
        foreach ($question->options->questions as $key=>$wrapped) {
            if(substr($wrapped->qtype,-5)=='wiris'){
                wrsqz_print_question(substr($wrapped->qtype,0,-5), $dbType , $wrapped, $state, $number, $cmoptions, $options);
                $question->options->questions[$key]=$wrapped;
            }
        }
    }
}

function wrsqz_delete_question($questionType, $dbType, &$questionid) {
	if (delete_records('question_' . $questionType . 'wiris', 'question', $questionid) === false || delete_records('question_' . $dbType, 'question', $questionid) === false) {
		return false;
	}
	
	return true;
}

/**
 * Prints the question body. Since standard moodle question functions set up
 * variables and prints html in the same function, we cannot call these functions.
 * So, the most code of this function (specially the type-specific part) is copied
 * from the standard moodle question types.
 * **/
function wrsqz_print_question_formulation_and_controls($questionType, $dbType, &$question, &$state, &$cmoptions, &$options) {
	//COMMON VARIABLES:
  global $CFG, $QTYPES;
  //1. Question text
  $formatoptions = new stdClass;
  $formatoptions->noclean = true;
  $formatoptions->para = false;

  $questiontext = format_text($question->questiontext, $question->questiontextformat,
                              $formatoptions, $cmoptions->course);

  //2. Question image
  $image = get_question_image($question);

  //3. name & strings
  $inputname = $question->name_prefix;
  $stranswer = get_string("answer", "quiz").': ';

  //4. WIRIS CAS applet
  $wirisCASApplet = '';
  $wirisCASForComputationsEnabled = !empty($question->options->wiris->options['wirisCASForComputations']);
  if($wirisCASForComputationsEnabled){
    $wirisCASContent = '';
    if (!empty($state->responses['wirisCASHidden'])) {
      $wirisCASContent = htmlentities(stripslashes_safe($state->responses['wirisCASHidden']), ENT_QUOTES, 'UTF-8');
      unset($state->responses['wirisCASHidden']);
    }else if(!empty($question->options->wiris->options['hiddenInitialCASValue'])){
      $wirisCASContent = htmlentities(stripslashes_safe($question->options->wiris->options['hiddenInitialCASValue']), ENT_QUOTES, 'UTF-8');
    }
    $wirisCASApplet = wrsqz_wirisCASAppletHTML($inputname, $wirisCASContent, false, 630, 300);
    require_js(array('yui_yahoo', 'yui_dom-event'));
    require_js(array($CFG->wwwroot.'/wiris-quizzes/js/wiris-quizzes.js',$CFG->wwwroot.'/wiris-quizzes/js/constants.js.php'));
  }
  
  //ANSWER FIELDS & FEEDBACK: QUESTION-TYPE specific
  if($questionType == 'essay'){
    // Response
    if (isset($state->responses[''])) {
      $value = stripslashes_safe($state->responses['']);
    }else{
      $value = "";
    }
    //answer
    if($wirisCASForComputationsEnabled){
      $wirisCASForComputations = $question->options->wiris->options['wirisCASForComputations'];
    }else{
      $wirisCASForComputations = '0';
    }
    //replace answer by an applet
    if($wirisCASForComputations == '2'){
      $answer = $wirisCASApplet;
      $answer .= '<input type="hidden" name="'.$inputname.'" id="edit-'.$inputname.'"/>';
      $wirisCASApplet = '';
    }else{
      if (empty($options->readonly)) {
        static $htmleditorused = false;
        $usehtmleditor = can_use_html_editor() && !$htmleditorused;
        // the student needs to type in their answer so print out a text editor
        echo '<!-- yes we can: '.$usehtmleditor.'-->';
        $answer = print_textarea($usehtmleditor, 18, 80, 630, 400, $inputname, $value, $cmoptions->course, true);
      }else{
        //it is read only, so just format the students answer and output it
        $safeformatoptions = new stdClass;
        $safeformatoptions->para = false;
        $answer = format_text($value, FORMAT_MOODLE, $safeformatoptions, $cmoptions->course);
        $answer = '<div class="answerreview">' . $answer . '</div>';
      }
      if($wirisCASForComputationsEnabled){
        $wirisCASApplet = '<tr><td>'.$wirisCASApplet.'</td></tr>';
      }
    }
    
    // feedback handling
    $feedback = '';
    if ($options->feedback && !empty($answers)) {
      foreach ($answers as $answer) {
        $feedback = format_text($answer->feedback, '', $formatoptions, $cmoptions->course);
      }
    }
    
  }else if($questionType == 'match'){
    $subquestions   = $state->options->subquestions;
    $correctanswers = $QTYPES[$question->qtype]->get_correct_responses($question, $state);
    $answers        = array(); // Answer choices formatted ready for output.
    $allanswers     = array(); // This and the next used to detect identical answers
    $answerids      = array(); // and adjust ids.
    $responses      = &$state->responses;

    // Prepare a list of answers, removing duplicates.
    foreach ($subquestions as $subquestion) {
      foreach ($subquestion->options->answers as $ans) {
        $allanswers[$ans->id] = $ans->answer;
        if (!in_array($ans->answer, $answers)) {
          $answers[$ans->id] = strip_tags(format_string($ans->answer, false));
          $answerids[$ans->answer] = $ans->id;
        }
      }
    }
    // Fix up the ids of any responses that point the the eliminated duplicates.
    foreach ($responses as $subquestionid => $ignored) {
      if ($responses[$subquestionid]) {
        $responses[$subquestionid] = $answerids[$allanswers[$responses[$subquestionid]]];
      }
    }
    foreach ($correctanswers as $subquestionid => $ignored) {
      $correctanswers[$subquestionid] = $answerids[$allanswers[$correctanswers[$subquestionid]]];
    }
    // Shuffle the answers
    $answers = draw_rand_array($answers, count($answers));
    // Print the input controls
    foreach ($subquestions as $key => $subquestion) {
      if ($subquestion->questiontext !== '' && !is_null($subquestion->questiontext)) {
        // Subquestion text:
        $a = new stdClass;
        $a->text = format_text($subquestion->questiontext,
        $question->questiontextformat, $cmoptions);
        // Drop-down list:
        $menuname = $inputname.$subquestion->id;
        $response = isset($state->responses[$subquestion->id])
                    ? $state->responses[$subquestion->id] : '0';
        $a->class = ' ';
        $a->feedbackimg = ' ';

        if ($options->readonly and $options->correct_responses) {
          if (isset($correctanswers[$subquestion->id])
          and ($correctanswers[$subquestion->id] == $response)) {
            $correctresponse = 1;
          } else {
            $correctresponse = 0;
          }
          if ($options->feedback && $response) {
            $a->class = question_get_feedback_class($correctresponse);
            $a->feedbackimg = question_get_feedback_image($correctresponse);
          }
        }

        $a->control = choose_from_menu($answers, $menuname, $response, 'choose',
                                       '', 0, true, $options->readonly);
        $anss[] = $a;
      }
    }

  }else if($questionType == 'multianswer'){

  }else if($questionType == 'multichoice'){
  
    $answers = &$question->options->answers;
    $correctanswers = $QTYPES['multichoicewiris']->get_correct_responses($question, $state);
    $readonly = empty($options->readonly) ? '' : 'disabled="disabled"';
    $answerprompt = ($question->options->single) ? get_string('singleanswer', 'quiz') :
                    get_string('multipleanswers', 'quiz');
    // Print each answer in a separate row
    foreach ($state->options->order as $key => $aid) {
      $answer = $answers[$aid];
      $checked = '';
      $chosen = false;

      if ($question->options->single) {
        $type = 'type="radio"';
        $name   = "name=\"{$question->name_prefix}\"";
        if (isset($state->responses['']) and $aid == $state->responses['']) {
          $checked = 'checked="checked"';
          $chosen = true;
        }
      } else {
        $type = ' type="checkbox" ';
        $name   = "name=\"{$question->name_prefix}{$aid}\"";
        if (isset($state->responses[$aid])) {
          $checked = 'checked="checked"';
          $chosen = true;
        }
      }

      $a = new stdClass;
      $a->id   = $question->name_prefix . $aid;
      $a->class = '';
      $a->feedbackimg = '';

      // Print the control
      $a->control = "<input $readonly id=\"$a->id\" $name $checked $type value=\"$aid\" />";

      if ($options->correct_responses && $answer->fraction > 0) {
        $a->class = question_get_feedback_class(1);
      }
      if (($options->feedback && $chosen) || $options->correct_responses) {
        if ($type == ' type="checkbox" ') {
          $a->feedbackimg = question_get_feedback_image($answer->fraction > 0 ? 1 : 0, $chosen && $options->feedback);
        } else {
          $a->feedbackimg = question_get_feedback_image($answer->fraction, $chosen && $options->feedback);
        }
      }

      // Print the answer text
      $a->text = $QTYPES['multichoicewiris']->number_in_style($key, $question->options->answernumbering) .
                 format_text($answer->answer, FORMAT_MOODLE, $formatoptions, $cmoptions->course);

      // Print feedback if feedback is on
      if (($options->feedback || $options->correct_responses) && $checked) {
        $a->feedback = format_text($answer->feedback, true, $formatoptions, $cmoptions->course);
      } else {
        $a->feedback = '';
      }

      $anss[] = clone($a);
    }

    $feedback = '';
      if ($options->feedback) {
        if ($state->raw_grade >= $question->maxgrade/1.01) {
          $feedback = $question->options->correctfeedback;
        } else if ($state->raw_grade > 0) {
          $feedback = $question->options->partiallycorrectfeedback;
        } else {
          $feedback = $question->options->incorrectfeedback;
        }
        $feedback = format_text($feedback, $question->questiontextformat,
                    $formatoptions, $cmoptions->course);
        }

  

  }else if($questionType == 'shortanswer'){
    $value = '';
    $readonly = (empty($options->readonly)) ? '' : 'readonly="readonly"';
    $feedback = '';
		$class = '';
		$feedbackimg = '';

    if (isset($state->responses['']) && $state->responses[''] != '') {
      $value = s($state->responses[''], true);
    }
    mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
		$wirisEditorEnabled = (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true');
		if($wirisCASForComputationsEnabled && $wirisEditorEnabled){
      //copy button
      $wirisCASApplet .= '<input id="'.$inputname.'copy_button" name="'.$inputname.'copy_button" type="button" '.
                         'value="'.wrsqz_get_string('wrsqz_copyresponse')
                         .'" onclick="copyCASSessionToEditor('.$question->id.',\''.$inputname.'\')"/>';
      require_js('yui_connection');
    }
    //$wirisCASForComputationsEnabled = (isset($eqoptionArray['wirisCASForComputations']) && $eqoptionArray['wirisCASForComputations'] == 'true');
		$multipleAnswers = (isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true');

    $formulaGrammar = getGrammarURL();
		$formulaGrammarTarget = 'math';

    if ($multipleAnswers) {
			$formulaGrammar .= '?assigns=true';
			$formulaGrammarTarget = 'math2';
		}
    
    $wirisEditorApplet = wrsqz_wirisEditorAppletHTML($inputname, $formulaGrammar, $formulaGrammarTarget, $value);
    require_js(array('yui_yahoo', 'yui_dom-event'));
    require_js(array($CFG->wwwroot.'/wiris-quizzes/js/wiris-quizzes.js', $CFG->wwwroot.'/wiris-quizzes/js/constants.js.php'));
    
    // Chose feedback according to current response
		if ($options->feedback) {
			$class = question_get_feedback_class(0);
			$feedbackimg = question_get_feedback_image(0);
			$i = 0;

			foreach ($question->options->answers as $answer) {
				if (wrsqz_testResponse($question, $state, $answer) || (!empty($state->grades) && $state->grades[$i] > 0.0)) {
					$class = question_get_feedback_class($answer->fraction);
					$feedbackimg = question_get_feedback_image($answer->fraction);

					if ($answer->feedback) {
						$feedback = format_text($answer->feedback, true, $formatoptions, $cmoptions->course);
					}
					break;
				}
				++$i;
			}
		}
  }else if($questionType == 'truefalse'){
    $readonly = $options->readonly ? ' disabled="disabled"' : '';
    $answers = &$question->options->answers;
    $trueanswer = &$answers[$question->options->trueanswer];
    $falseanswer = &$answers[$question->options->falseanswer];
    $correctanswer = ($trueanswer->fraction == 1) ? $trueanswer : $falseanswer;

    $trueclass = '';
    $falseclass = '';
    $truefeedbackimg = '';
    $falsefeedbackimg = '';

    // Work out which radio button to select (if any)
    if (isset($state->responses[''])) {
      $response = $state->responses[''];
    } else {
      $response = '';
    }
    $truechecked = ($response == $trueanswer->id) ? ' checked="checked"' : '';
    $falsechecked = ($response == $falseanswer->id) ? ' checked="checked"' : '';

    // Work out visual feedback for answer correctness.
    if ($options->feedback) {
      if ($truechecked) {
         $trueclass = question_get_feedback_class($trueanswer->fraction);
      } else if ($falsechecked) {
         $falseclass = question_get_feedback_class($falseanswer->fraction);
      }
    }
    if ($options->feedback || $options->correct_responses) {
      if (isset($answers[$response])) {
        $truefeedbackimg = question_get_feedback_image($trueanswer->fraction, !empty($truechecked) && $options->feedback);
        $falsefeedbackimg = question_get_feedback_image($falseanswer->fraction, !empty($falsechecked) && $options->feedback);
      }
    }

    $inputname = ' name="'.$question->name_prefix.'" ';
    $trueid    = $question->name_prefix.'true';
    $falseid   = $question->name_prefix.'false';

    $radiotrue = '<input type="radio"' . $truechecked . $readonly . $inputname
      . 'id="'.$trueid . '" value="' . $trueanswer->id . '" /><label for="'.$trueid . '">'
      . s($trueanswer->answer) . '</label>';
    $radiofalse = '<input type="radio"' . $falsechecked . $readonly . $inputname
      . 'id="'.$falseid . '" value="' . $falseanswer->id . '" /><label for="'.$falseid . '">'
      . s($falseanswer->answer) . '</label>';

    $feedback = '';
    if ($options->feedback and isset($answers[$response])) {
      //choose feedback depending on correctness of response
      if($answers[$response]->fraction == 1){
        $feedback = format_text($trueanswer->feedback, true, $formatoptions, $cmoptions->course);
      }else{
        $feedback = format_text($falseanswer->feedback, true, $formatoptions, $cmoptions->course);
      }
    }
  }
  //print body
  include("$CFG->dirroot/question/type/$question->qtype/display.html");

  //print buttons
  $QTYPES[$question->qtype]->print_question_submit_buttons($question, $state, $cmoptions, $options);
  echo '</div>'; //close <div class="block clearfix">
  if($questionType == 'essay' && empty($options->readonly) && !empty($usehtmleditor)){
    use_html_editor($inputname);
    $htmleditorused = true;
  }else if($questionType == 'truefalse'){
    echo '</div>'; //close <div class = "truefalse"/>
  }
}

function wrsqz_grade_responses($questionType, $dbType, &$question, &$state, &$cmoptions) {
  if ($questionType == 'shortanswer') {
		
		$state->raw_grade = 0;

		$answerArray = array();
		$gradesArray = array();
		$questionOptionsAnswers_length = count($question->options->answers);

		foreach ($question->options->answers as $answer) {
			$answerArray[] = $answer->answer;
			$gradesArray[] = $answer->fraction;

			// Is answer==state->response ?
			if (wrsqz_testResponse($question, $state, $answer)) {
				$state->raw_grade = $answer->fraction;
			}
		}
    if(!($state->raw_grade)) $state->raw_grade = 0.0;
		if ($state->raw_grade < 1.0) {
			// Call WIRIS CAS to grade
			$wirisGrade = wrsqz_testResponses($question, $state, $answerArray, $gradesArray);
      $state->raw_grade = max($state->raw_grade, $wirisGrade);
		}

		$state->raw_grade = min(max((float)$state->raw_grade, 0.0), 1.0) * $question->maxgrade;
		$state->penalty = $question->penalty * $question->maxgrade;
		$state->event = ($state->event ==  QUESTION_EVENTCLOSE) ? QUESTION_EVENTCLOSEANDGRADE : QUESTION_EVENTGRADE;
		return false;
	}else if ($questionType == 'match'){
    //we have to substitute the answer text #a by the real text #a=>'23' in order
    //to grade the different id answers with the same text (for example #a=23, #b=23)
        $subquestions = $state->options->subquestions;
        foreach ($subquestions as $subquestion) {
            $ans = reset($subquestion->options->answers);
            $ans->answer = wrsqz_assemble(wrsqz_variablesToText($ans->answer),$state->vars);
        }
        
    }else if ($questionType == 'multianswer'){
        global $QTYPES;
        $teststate = clone($state);
        $state->raw_grade = 0;
        $shortanswers = array();
        $shortresponses = array();
        $eqoptionArrays = array();
        $simpleGrades = array();
        $simplyCorrect = array();
        $fractions = array();
        $maxgrades = array();  //max grade for each subquestion

        foreach($question->options->questions as $key => $wrapped){
            if (!empty($wrapped)){
                $maxgrades[$key] = $wrapped->maxgrade;
                if(isset($state->responses[$key])){
                        $teststate->responses = array('' => $state->responses[$key]);
                }else{
                        $teststate->responses = array(''=>'');
                }
                $teststate->raw_grade = 0;

                if($wrapped->qtype != 'shortanswerwiris'){
                    if (false === $QTYPES[$wrapped->qtype]->grade_responses($wrapped, $teststate, $cmoptions)) {
                        return false;
                    }
                    $state->raw_grade += $teststate->raw_grade;
                }else{
                    //try simple(string) grading first
                    $simplyCorrect[$key] = false;
                    foreach($wrapped->options->answers as $id=>$answer){
                        $fractions[$key][] = $answer->fraction;
                        if(wrsqz_testResponse($wrapped, $teststate, $answer)){
                            $simpleGrades[$key][] = 1.0;
                            if($answer->fraction >= 1.0){
                                $simplyCorrect[$key]=true;
                            }
                        }else{
                            $simpleGrades[$key][] = 0.0;
                        }
                    }
                    //make arrays for further grading if response is not 100% correct by simple grading
                    if (!$simplyCorrect[$key]){
                        $shortanswers[$key]=array();
                        $shortresponses[$key]=$state->responses[$key];
                        mb_parse_str($wrapped->options->wiris->eqoption, $eqoptionArrays[$key]);
                        foreach($wrapped->options->answers as $id=>$answer){
                            $shortanswers[$key][]=$answer->answer;
                        }
                    }
                }
            }
        }
        //grade using service
        if(!empty($shortanswers)){
          $shortanswergrades = wrsqz_testMultiShortResponses($question, $state, $shortanswers, $shortresponses, $eqoptionArrays);
          reset($shortanswergrades);
        }
        //save shortanswer grades in $state->grades[]
        
        $state->grades = array();

        foreach($simplyCorrect as $key=>$simple){
            if($simple){
                $mergedGrades = $simpleGrades[$key];
            }else{
                //merge simple and service grade arrays
                $serviceGrades = array_shift($shortanswergrades);
                $mergedGrades = array();
                foreach($simpleGrades[$key] as $index=>$simplegrade){
                    $serviceGrade = array_shift($serviceGrades);
                    $mergedGrades[$index]=max($simplegrade,$serviceGrade);
                }
            }

            foreach($mergedGrades as $id=>$grade){
               $mergedGrades[$id]=$mergedGrades[$id] * $fractions[$key][$id];
            }

            $state->grades[$key] = $mergedGrades;
            $state->raw_grade += max(0.0,max($state->grades[$key]))*$maxgrades[$key];
        }

        $state->raw_grade /= $question->defaultgrade;
        $state->raw_grade = min(max((float) $state->raw_grade, 0.0), 1.0)*$question->maxgrade;

        if (empty($state->raw_grade)) {
            $state->raw_grade = 0.0;
        }
        $state->penalty = $question->penalty * $question->maxgrade;

        // mark the state as graded
        $state->event = ($state->event ==  QUESTION_EVENTCLOSE) ? QUESTION_EVENTCLOSEANDGRADE : QUESTION_EVENTGRADE;
    }
	
	return true;
}

function wrsqz_get_correct_responses($questionType, $dbType, $response, &$question, &$state, $mode = 'M') {
//mode='M' => MathML <math xmlns=".......
//mode='W' => encoded MathML for filtering  �math xmlns=�...
//mode='T' => Plain Text 2^(1/2)...

	if ($questionType == 'shortanswer') {
            if (!is_array($response)){
                $response = array();
            }
            
            mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
            $editor = isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true';
            $multipleAnswers = $editor && isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true';
            
            //get the first maximum graded answer and, in the multipleanswer case,
            //the names of the variables to be used (depending on if we use test
            //functions or not).
            if($question->options->answers){
            	foreach ($question->options->answers as $answer) {
                    if (((int) $answer->fraction) === 1) {
                        $correctanswer = $answer->answer;
                        if($multipleAnswers){
                            if (isset($eqoptionArray['testFunction']) && isset($eqoptionArray['testFunction'][$answer->id])){
                                $index = $eqoptionArray['testFunction'][$answer->id];
                                $names = $eqoptionArray['testFunctionName'][$index];
                            }else{
                                $names = $answer->answer;
                            }
                        }
                    }
                }
	    }else{
                $correctanswer=null;
            }
		//$correctanswer=#p
		//encode it depending on the use of wiris editor and the desired mode

		if ($editor) {
			if ($multipleAnswers) {
				if ($mode == 'T'){
					//plain text for directly display (space separated)
					$response['']=wrsqz_assemble(wrsqz_variablesToText($correctanswer), $state->vars);
				}else if($mode == 'M'){
					//mathml for an applet
					$response['']=wrsqz_multipleAnswersTable($correctanswer,$state->vars,$names);
				}else if($mode == 'W'){
					//encoded mathml for filtering
					$response['']=wrsqz_multipleAnswersTable($correctanswer,$state->vars, $names);
					$response['']=wrsqz_mathmlEncode($response['']);
				}
			} else {
				if ($mode == 'T'){
					$response[''] = wrsqz_assemble(wrsqz_variablesToText($correctanswer), $state->vars);
				}else if ($mode == 'M'){
					$response[''] = wrsqz_assemble(wrsqz_textToVariables($correctanswer), $state->vars);
				}else if ($mode == 'W'){
					$response[''] = wrsqz_assemble($correctanswer, $state->vars);
				}
			}
		} else {
			//if editor is not used, we use text mode (T) always.
			$response[''] = wrsqz_assemble(wrsqz_variablesToText($correctanswer), $state->vars);
		}
	}
	return $response;
}

function wrsqz_backup($questionType, $dbType, &$bf, &$preferences, &$question, &$level, $extraquestionfields, $questionid_column_name) {
	
	$problemRecord = get_records('question_' . $dbType, 'question', $question, 'id');
	$questionRecord = get_records('question_' . $questionType . 'wiris', 'question', $question, 'id');

  $questions = array();
  $status = true;

	if ($questionRecord !== false) {
    foreach($questionRecord as $quest){
      $questions[$quest->question]->options = unserialize($quest->options);
    }
  }

	if ($questionType == 'shortanswer') {
		if ($questionRecord !== false) {
			foreach ($questionRecord as $quest) {
				$questions[$quest->question]->eqoption = $quest->eqoption;
			}
		}

    //This is what does the parent (/question/questiontype.php) class,
    //but in the shortanswer case we cannot call the parent because
    //the tag name is the same ("<SHORTANSWERWIRIS>").
    $record = get_record('question_shortanswer', 'question', $question);
    $answers = $record->answers;
    $usecase = $record->usecase;
	}else if ($questionType == 'truefalse' || $questionType == 'multichoice') {
		if ($questionRecord !== false) {
			foreach ($questionRecord as $quest) {
				$questions[$quest->question]->override = $quest->override;
			}
		}
	}

	if ($problemRecord !== false) {
		foreach ($problemRecord as $quest) {
			$questions[$quest->question]->program = $quest->program;
		}
	}
    
	$tagname = strtoupper($questionType) . 'WIRIS';

  foreach ($questions as $q) {
    $status = fwrite($bf, start_tag($tagname, $level, true));
    if (!empty($q->program)) {
      $programParsed = wrsqz_mathmlEncode($q->program);
      $levelUp = $level + 1;
      $status = fwrite($bf, full_tag('WIRISPROGRAM', $levelUp, false, $programParsed)) && $status;

      if ($questionType == 'truefalse' || $questionType == 'multichoice') {
        $status = fwrite($bf, full_tag('WIRISOVERRIDEANSWER', $levelUp, false, $q->override));
      }else if ($questionType == 'shortanswer') {
        $status = fwrite($bf, full_tag('WIRISEDITOR', $levelUp, false, $q->eqoption)) && $status;
      }else if ($questionType == 'multianswer') {
        //TODO
        //$status = fwrite($bf, full_tag('WIRISEDITOR', $levelUp, false, $q->eqoption)) && $status;
      }
      $status = fwrite($bf, start_tag('WIRISOPTIONS', $levelUp, true))&& $status;
      foreach($q->options as $key=>$value){
        if($key == 'hiddenInitialCASValue') $value = wrsqz_mathmlEncode($value);
        $status = fwrite($bf, full_tag($key, $levelUp+1, false, print_r($value, true))) && $status;
      }
      $status = fwrite($bf, end_tag('WIRISOPTIONS', $levelUp, true)) && $status;
      
    }

    $status = fwrite($bf, end_tag($tagname, $level, true)) && $status;

    if ($questionType == 'shortanswer'){
      //this is done by the parent class in the other questiontypes
      $status = fwrite($bf, start_tag('SHORTANSWER', $level, true)) && $status;
      $status = fwrite($bf, full_tag('ANSWERS', $levelUp, false, $answers)) && $status;
      $status = fwrite($bf, full_tag('USECASE', $levelUp, false, $usecase)) && $status;
      $status = fwrite($bf, end_tag('SHORTANSWER', $level, true)) && $status;
      $status = question_backup_answers($bf, $preferences, $question) && $status;
    }
	}
	
  return $status;
}
function wrsqz_restore_1($questionType, $dbType, &$old_question_id, &$new_question_id, &$info, &$restore){
    if($questionType=='shortanswer'){
    /*In new versions of moodle, shortanswer restore is done mostly by the generic
     *questiontype class. It expects the class name tag (SHORTANWERWIRIS) instead
      of the actual tag SHORTANSWER for USECASE and ANSWERS subtags*/
        if (array_key_exists('SHORTANSWER', $info['#'])) {
            foreach($info['#']['SHORTANSWER'] as $index=>$value){
                if(!isset($info['#']['SHORTANSWERWIRIS'][$index])){
                    $info['#']['SHORTANWERWIRIS'][$index]=array();
                }
                if(!isset($info['#']['SHORTANSWERWIRIS'][$index]['#'])){
                    $info['#']['SHORTANWERWIRIS'][$index]['#']=array();
                }
                $info['#']['SHORTANSWERWIRIS'][$index]['#'] = array_merge($info['#']['SHORTANSWERWIRIS'][$index]['#'],$info['#']['SHORTANSWER'][$index]['#']);
            }
        }
    }
    return true;
}
function wrsqz_restore($questionType, $dbType, &$old_question_id, &$new_question_id, &$info, &$restore) {
	if (array_key_exists(strtoupper($questionType) . 'WIRIS', $info['#'])) {
		$questionList = $info['#'][strtoupper($questionType) . 'WIRIS'];
	}else{
		$questionList = array();
	}
	
	$questionList_length = count($questionList);
	$status = true;
	
	for($i = 0; $i < $questionList_length; ++$i) {
		$question = $questionList[$i];
		$problem = new stdClass;

		if ($questionType == 'truefalse' || $questionType == 'multichoice') {
			$problem->override = backup_todb($question['#']['WIRISOVERRIDEANSWER']['0']['#']);
		}else if ($questionType == 'shortanswer') {
			$eqoption = backup_todb($question['#']['WIRISEDITOR']['0']['#']);
      mb_parse_str($eqoption,$eqoptionArray);
      if(isset($eqoptionArray['testFunction'])){ //recompute testFunction indexes with new answer id's
        $testFunctions = array();
        foreach($eqoptionArray['testFunction'] as $oldid=>$testFunction ){
          $newid = backup_getid($restore->backup_unique_code,'question_answers',$oldid);
          if($newid!==false){
            $testFunctions[$newid->new_id]=$testFunction;
          }
        }
        $eqoptionArray['testFunction'] = $testFunctions;
        $eqoption = http_build_query($eqoptionArray,null,'&');
      }
      if(!isset($eqoption) || $eqoption == null){
          $eqoption='';
      }
      $problem->eqoption = $eqoption;
		}else if ($questionType == 'multianswer') {
            //TODO
            //$problem->eqoption = backup_todb($question['#']['WIRISEDITOR']['0']['#']);
    }
    
    //restore options
    if(isset($question['#']['WIRISOPTIONS'])){ //backward compatibility: old quizzes haven't WIRISOPTIONS tag.
      $optionsxml = $question['#']['WIRISOPTIONS'];
      $options = array();
      $keys = array(
        'WIRISCASFORCOMPUTATIONS'=>'wirisCASForComputations',
        'HIDDENINITIALCASVALUE'=>'hiddenInitialCASValue',
      );
      foreach($optionsxml as $option){
        foreach($keys as $keyxml=>$keyarray){
          if(isset($option['#'][$keyxml])){
            $options[$keyarray] = backup_todb($option['#'][$keyxml]['0']['#']);
          }
        }
      }
      if(isset($options['hiddenInitialCASValue'])){
        //TODO translate if needed.
        $options['hiddenInitialCASValue'] = wrsqz_mathmlDecode($options['hiddenInitialCASValue']);
      }
      $problem->options = serialize($options);
    }
    $program = wrsqz_mathmlDecode(backup_todb($question['#']['WIRISPROGRAM']['0']['#']));
    $imported = wrsqz_importCASSession($program);
    if($imported === false){
      return false;
    }
    $program = $imported[0];
    $translation = $imported[1];
		$program = str_replace('"','\"',$program);

		$problem->id = 0;
		$problem->question = $new_question_id;
		$problem->idcache = 0;
    $problem->md5 = md5($program);
		
		$newid = insert_record('question_' . $questionType . 'wiris', $problem);
		
		$problem = new stdClass;
		$problem->id = 0;
		$problem->question = $new_question_id;
		$problem->program = $program;
		
		if ((insert_record('question_' . $dbType, $problem) === false) || !$newid) {
			$status = false;
		}

    if(!empty($translation)){
      wrsqz_replaceVarReferencesInDatabase($questionType, $new_question_id, $translation);
    }
	}
	return $status;
}

function wrsqz_export_to_xml($questionType, $dbType, &$question, &$format, &$extra) {
	$objProblem = get_record('question_' . $dbType, 'question', $question->id);

	$expout = '';
	$qfxml = new qformat_xml();
	
	if ($questionType == 'essay') {
		foreach ($question->options->answers as $answer) {
			$expout .= '<answer fraction="' . (100 * $answer->fraction) . '"><feedback>' . $qfxml->writetext($answer->feedback) . '</feedback></answer>';
		}
	}
	else if ($questionType == 'match') {
		foreach ($question->options->subquestions as $subquestion) {
			$expout .= '<subquestion>' . $qfxml->writetext($subquestion->questiontext) . '<answer>' . $qfxml->writetext($subquestion->answertext) . '</answer></subquestion>';
		}
	}
	else if ($questionType == 'multichoice') {
		$expout .= '<single>' . $qfxml->get_single($question->options->single) . '</single>';
		$expout .= '<shuffleanswers>' . $qfxml->get_single($question->options->shuffleanswers) . '</shuffleanswers>';
		$expout .= '<correctfeedback>' . $qfxml->writetext($question->options->correctfeedback, 3) . '</correctfeedback>';
		$expout .= '<partiallycorrectfeedback>' . $qfxml->writetext($question->options->partiallycorrectfeedback, 3) . '</partiallycorrectfeedback>';
		$expout .= '<incorrectfeedback>' . $qfxml->writetext($question->options->incorrectfeedback, 3) . '</incorrectfeedback>';
		$expout .= '<answernumbering>' . $question->options->answernumbering . '</answernumbering>';
		
		foreach ($question->options->answers as $answer) {
			$expout .= '<answer fraction="' . ($answer->fraction * 100) . '">' . $qfxml->writetext( $answer->answer,4,false ) . '<feedback>' . $qfxml->writetext($answer->feedback, 5, false) . '</feedback></answer>';
		}
	}
	else if ($questionType == 'shortanswer') {
		$expout .= '<usecase>' . $question->options->usecase . '</usecase>';
		
		foreach ($question->options->answers as $answer) {
			$expout .= '<answer fraction="' . (100 * $answer->fraction) . '">' . $qfxml->writetext($answer->answer, 3, false) . '<feedback>' . $qfxml->writetext($answer->feedback, 4, false) . '</feedback></answer>';
		}
	}
	else if ($questionType == 'truefalse') {
		foreach ($question->options->answers as $answer) {
			if ($answer->id == $question->options->trueanswer) {
				$answertext = 'true';
			}
			else {
				$answertext = 'false';
			}
			
			$expout .= '<answer fraction="' . round($answer->fraction * 100) . '"><text>' . $answertext . '</text><feedback>' . $qfxml->writetext($answer->feedback) . '</feedback></answer>';
		}
	}else if ($questionType == 'multianswer'){

        $questiontext = $question->questiontext;
        $a_count=1;
        foreach($question->options->questions as $child) {
           $pattern = addslashes("{#".$a_count."}");
           $replace = $child->questiontext;
           $questiontext= str_replace($pattern, $replace, $questiontext);
           $a_count++;
        }
        $expout .= '<wirisquestiontext>'.$qfxml->writetext($questiontext).'</wirisquestiontext>';

    }
	
	$programParsed = wrsqz_mathmlEncode($objProblem->program);
	$expout .= '<wirisquestion>' . $programParsed . '</wirisquestion>';

	if ($questionType == 'multichoice') {
		$expout .= '<wirisoverrideanswer>' . $question->options->wiris->override . '</wirisoverrideanswer>';
	}else if ($questionType == 'truefalse') {
		if (empty($question->options->wiris->override)) {
			$expout .= '<wirisoverrideanswer></wirisoverrideanswer>';
		}
		else {
			$values = explode(';', $question->options->wiris->override);
			$expout .= '<wirisoverrideanswer>' . $values[0] . '</wirisoverrideanswer>';
		}
	}else if ($questionType == 'shortanswer') {
		$expout .= '<wiriseditor>' . htmlentities($question->options->wiris->eqoption, ENT_QUOTES, 'UTF-8') . '</wiriseditor>';
	}else if ($questionType == 'multianswer') {
        //$expout .= '<wiriseditor>' . htmlentities($question->options->wiris->eqoption, ENT_QUOTES, 'UTF-8') . '</wiriseditor>';
  }
  $options = $question->options->wiris->options;
  $expout .= '<wirisoptions>';
  foreach($options as $key=>$value){
    if($key == 'hiddenInitialCASValue') $value = wrsqz_mathmlEncode($value);
    $expout .= '<'.$key.'>'.print_r($value, true).'</'.$key.'>';
  }
  $expout .=   '</wirisoptions>';
	return $expout;
}

function wrsqz_import_from_xml($questionType, $dbType, &$data, &$question, &$format, &$extra) {
	if (isset($data['@']['type']) && $data['@']['type'] == $questionType . 'wiris') {
		if ($questionType == 'essay') {
			$question = $format->import_essay($data);
		}else if ($questionType == 'match') {
			$question = $format->import_matching($data);
		}else if ($questionType == 'multichoice') {
			$question = $format->import_multichoice($data);
		}else if ($questionType == 'truefalse') {
			$question = $format->import_truefalse($data);
		}else if ($questionType == 'shortanswer') {
			$question = $format->import_shortanswer($data);
		}else if ($questionType == 'multianswer') {
      //do import multianswer
      $questiontext = $data['#']['wirisquestiontext'][0]['#']['text'];
      $container = new stdClass;
      $container->questiontext = $format->import_text($questiontext);
      $question = wrsqz_qtype_multianswer_extract_question($container);
      $question->questiontextformat = $format->trans_format($format->getpath(
                $data, array('#','questiontext',0,'@','format'), ''));
      //Import Image. See also MDL-26521
      $question->image = $format->getpath( $data, array('#','image',0,'#'), '' );
      $image_base64 = $format->getpath( $data, array('#','image_base64','0','#'),'' );
      if (!empty($image_base64)) {
        $question->image = $format->importimagefile( $question->image, stripslashes($image_base64) );
      }
      $question->defaultgrade = $format->getpath( $data, array('#','defaultgrade',0,'#'), 1 );
      $question->penalty = $format->getpath( $data, array('#','penalty',0,'#'), 0.1 );

      $question->course = $format->course;
      $question->generalfeedback = $format->getpath($data, array('#','generalfeedback',0,'#','text',0,'#'), '', true );
      $question->name = $format->import_text( $data['#']['name'][0]['#']['text']);
    }

		$question->qtype = $questionType . 'wiris';
		$program = wrsqz_mathmlDecode($format->getpath($data, array('#', 'wirisquestion', 0, '#'), 0));
        $imported = wrsqz_importCASSession($program);

        if($imported===false) return false;

        $question->hiddenCASValue = $imported[0];
        $translation = $imported[1];

		if ($questionType == 'shortanswer') {
			mb_parse_str($format->getpath($data, array('#', 'wiriseditor', 0, '#'), 0), $eqoptionArray);
			$question->wirisEditor = (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true') ? 'editor=true' : '';
			$question->multipleAnswers = (isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true') ? 'multipleAnswers=true' : '';
			$question->wirisCASForComputations = (isset($eqoptionArray['wirisCASForComputations']) && $eqoptionArray['wirisCASForComputations'] == 'true') ? 'wirisCASForComputations=true' : '';
			
			if(isset($eqoptionArray['testFunctionName'])){
				foreach ($eqoptionArray['testFunctionName'] as $index => $functionName){
					if(!empty($functionName)){
						$question->testFunctionName[$index]=$functionName;
					}
				}
			}
		}else if ($questionType == 'multichoice') {
			$question->gradeOverride = explode(';', $format->getpath($data, array('#', 'wirisoverrideanswer', 0, '#'), 0));
		}else if ($questionType == 'truefalse') {
			$question->wirisAnswer = $format->getpath($data, array('#', 'wirisoverrideanswer', 0, '#'), 0);
		}else if ($questionType == 'multianswer'){
            //mb_parse_str($format->getpath($data, array('#', 'wiriseditor', 0, '#'), 0), $eqoptionArray);
            //$question->wirisEditor = (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true') ? 'editor=true' : '';
    }
    
    $options = $format->getpath($data, array('#', 'wirisoptions',0,'#'), array());
    $question->wirisCASForComputations = $format->getpath($options, array('wirisCASForComputations',0,'#'),0);
    //TODO: translate cas if needed.
    $question->hiddenInitialCASValue = wrsqz_mathmlDecode($format->getpath($options, array('hiddenInitialCASValue',0,'#'),0));

    if(!empty($translation)){
      wrsqz_replaceVarReferencesInFlatQuestion($questionType, $question, $translation);
    }

		return $question;
	}

	return false;
}

/**
* This is a copy & paste of original shortanswer/questiontype.php print_question_grading_details() but 
* filters correct answers before printing.
*/
function wrsqz_print_question_grading_details($questionType, $dbType, &$question, &$state, $cmoptions, $options){
	if($questionType=='shortanswer'){
	    global $QTYPES ;
        // MDL-7496 show correct answer after "Incorrect"
        $correctanswer = '';
		
        if ($correctanswers =  wrsqz_get_correct_responses('shortanswer', 'wshanprom', null, $question, $state, 'W')) {
            if ($options->readonly && $options->correct_responses) {
                $delimiter = '';
                if ($correctanswers) {
                    foreach ($correctanswers as $ca) {
                        $correctanswer .= $delimiter.$ca;
                        $delimiter = ', ';
                    }
                }
            }
        }
        if (QUESTION_EVENTDUPLICATE == $state->event) {
            echo ' ';
            print_string('duplicateresponse', 'quiz');
        }
        if (!empty($question->maxgrade) && $options->scores) {
            if (question_state_is_graded($state->last_graded)) {
                // Display the grading details from the last graded state
                $grade = new stdClass;
                $grade->cur = round($state->last_graded->grade, $cmoptions->decimalpoints);
                $grade->max = $question->maxgrade;
                $grade->raw = round($state->last_graded->raw_grade, $cmoptions->decimalpoints);

                // let student know wether the answer was correct
                echo '<div class="correctness ';
                if ($state->last_graded->raw_grade >= $question->maxgrade/1.01) { // We divide by 1.01 so that rounding errors dont matter.
                    echo ' correct">';
                    print_string('correct', 'quiz');
                } else if ($state->last_graded->raw_grade > 0) {
                    echo ' partiallycorrect">';
                    print_string('partiallycorrect', 'quiz');
                    // MDL-7496
                    if ($correctanswer) {
                        echo ('<div class="correctness">');
                        $format_options = new StdClass();
                        $format_options->filter=true;
                        $format_options->smiley=false;
                        $format_options->para=false;
                        $format_options->newlines=false;
                        $filtered_correct_answer = format_text($correctanswer, $question->questiontextformat, $format_options, $cmoptions->course);
                        print_string('correctansweris', 'quiz', $filtered_correct_answer);
                        echo ('</div>');
                    }
                } else {
                    echo ' incorrect">';
                    // MDL-7496
                    print_string('incorrect', 'quiz');
                    if ($correctanswer) {
                        echo ('<div class="correctness">');
                        $format_options = new StdClass();
                        $format_options->filter=true;
                        $format_options->smiley=false;
                        $format_options->para=false;
                        $format_options->newlines=false;
                        $filtered_correct_answer = format_text($correctanswer, FORMAT_MOODLE, $format_options, $cmoptions->course);
                        print_string('correctansweris', 'quiz', $filtered_correct_answer);
                        echo ('</div>');
                    }
                }
                echo '</div>';

                echo '<div class="gradingdetails">';
                // print grade for this submission
                print_string('gradingdetails', 'quiz', $grade);
                if ($cmoptions->penaltyscheme) {
                    // print details of grade adjustment due to penalties
                    if ($state->last_graded->raw_grade > $state->last_graded->grade){
                        echo ' ';
                        print_string('gradingdetailsadjustment', 'quiz', $grade);
                    }
                    // print info about new penalty
                    // penalty is relevant only if the answer is not correct and further attempts are possible
                    if (($state->last_graded->raw_grade < $question->maxgrade) and (QUESTION_EVENTCLOSEANDGRADE != $state->event)) {
                        if ('' !== $state->last_graded->penalty && ((float)$state->last_graded->penalty) > 0.0) {
                            // A penalty was applied so display it
                            echo ' ';
                            print_string('gradingdetailspenalty', 'quiz', $state->last_graded->penalty);
                        } else {
                            /* No penalty was applied even though the answer was
                            not correct (eg. a syntax error) so tell the student
                            that they were not penalised for the attempt */
                            echo ' ';
                            print_string('gradingdetailszeropenalty', 'quiz');
                        }
                    }
                }
                echo '</div>';
            }
        }
	}
}
function wrsqz_restore_recode_answer_1($questionType, $dbType, &$state, $restore){
    //session=seed<.>vars<.>grades<.>responses<.>wirisCASHidden
   $session = $state->answer;
   $info = explode('<.>',$session,5);
   $answers = wrsqz_decode_answers_string($questionType, $dbType,$info[3]);
   $state->answer = $answers;
   return $info;
}
function wrsqz_restore_recode_answer_2($questionType, $dbType, &$info, $answers, &$state, $restore){
   $info[3]=wrsqz_encode_answers_string($questionType, $dbType, $answers);
   return implode('<.>',$info);
}
//For some strange reason, wirisquizzes serializes answers in multiple choices,
//matches, etc in a different way than moodle quiz module.
//This two functions translate between serialized encodings.
function wrsqz_encode_answers_string($questionType, $dbType, $moodleAnswersString){
    if($questionType == 'match'){
    //x-y<;>z-w<;>... => x-y,z-w,...
        $wirisAnswersString = str_replace(',','<;>',$moodleAnswersString);
    }elseif ($questionType == 'multichoice'){
    //order1<,>order2<;>answer1<,>answer2 => order1,order2:answer1,answer2
        $wirisAnswersString = str_replace(':','<;>',$moodleAnswersString);
        $wirisAnswersString = str_replace(',','<,>',$wirisAnswersString);
    }elseif ($questionType == 'truefalse'){
        $wirisAnswersString = '<,>'. str_replace(',','<;><,>',$moodleAnswersString);
    }elseif ($questionType == 'essay'){
        $wirisAnswersString = str_replace(',','<,>',$moodleAnswersString);
    }elseif($questionType == 'multianswer'){
        $wirisAnswersString = str_replace(',','<;>',$moodleAnswersString);
        $wirisAnswersString = str_replace('-','<,>',$wirisAnswersString);
    }else if($questionType == 'shortanswer'){//nothing to recode
        $wirisAnswersString = $moodleAnswersString;
    }
    return $wirisAnswersString;
    
}
function wrsqz_decode_answers_string($questionType, $dbType, $wirisAnswersString){
    if($questionType == 'match'){
    //x-y<;>z-w<;>... => x-y,z-w,...
        $moodleAnswersString = str_replace('<;>',',',$wirisAnswersString);
    }elseif ($questionType == 'multichoice'){
    //order1<,>order2<;>answer1<,>answer2 => order1,order2:answer1,answer2
        $moodleAnswersString = str_replace('<;>',':',$wirisAnswersString);
        $moodleAnswersString = str_replace('<,>',',',$moodleAnswersString);
    
    }elseif ($questionType == 'truefalse'){
    //key<,>value<;>key<,>value => value,value
    //(always?) we recieve only "<,>value"
        $moodleAnswersString = '';
        $answersList = explode('<;>',$wirisAnswersString);
        foreach ($answersList as $answer){
            if ($moodleAnswersString != '') $moodleAnswersString.=',';
            $ans = explode('<,>',$answer);
            $moodleAnswersString .= $ans[count($ans)-1];
        }
    }elseif ($questionType == 'essay'){
        $moodleAnswersString = str_replace('<,>',',',$wirisAnswersString);
    }else if($questionType == 'multianswer'){
        $moodleAnswersString = str_replace('<,>','-',$wirisAnswersString);
        $moodleAnswersString = str_replace('<;>',',',$moodleAnswersString);
    }else if($questionType == 'shortanswer'){//nothing to recode.
      $moodleAnswersString = $wirisAnswersString;
    }
    return $moodleAnswersString;
}

function wrsqz_qtype_multianswer_extract_question($form){
    global $CFG;
    //include($CFG->dirroot . '/question/type/multianswer/questiontype.php');
    $text = $form->questiontext;

    $question = qtype_multianswer_extract_question($text);
    
    //if ( isset($form->hiddenCASValue) && !wrsqz_isEmptySession($form->hiddenCASValue)){
        $question->qtype = 'multianswerwiris';
        foreach($question->options->questions as $key=>$wrapped){
            if(($wrapped->qtype == 'shortanswer' || $wrapped->qtype == 'multichoice')
                && strpos($wrapped->questiontext,'#')!==false){
                $wrapped->qtype .= 'wiris';
            }
            $question->options->questions[$key] = $wrapped;
        }
   // }
    return $question;
}
function wrsqz_addWirisFieldsToWrapped(&$question, &$wrapped){
        $wrapped->hiddenCASValue = $question->hiddenCASValue;
        if($wrapped->qtype=='multichoicewiris'){
            $wrapped->gradeOverride = array();
            foreach($wrapped->answer as $answer){
                $wrapped->gradeOverride[]='';
            }
        }else if($wrapped->qtype=='shortanswerwiris'){
            //TODO: set wirisEditor properly depending on question and wrapped options
            $wrapped->wirisEditor = '';
            $wrapped->testFunctionName = array();
        }
}

function wrsqz_display_question_editing_page($questionType, $dbType, &$mform, $question, $wizardnow){
    global $QTYPES;
    //Print header. We call to standard (not wiris) functions and use original
    //class name ($questionType) in order to show standard header (with standard help).
    list($heading, $langmodule) = $QTYPES[$questionType]->get_heading(empty($question->id));
    print_heading_with_help($heading, $questionType, $langmodule);

    //this is the same as /question/questiontype.php function
    $permissionstrs = array();
    if (!empty($question->id)){
        if ($question->formoptions->canedit){
            $permissionstrs[] = get_string('permissionedit', 'question');
        }
        if ($question->formoptions->canmove){
            $permissionstrs[] = get_string('permissionmove', 'question');
        }
        if ($question->formoptions->cansaveasnew){
            $permissionstrs[] = get_string('permissionsaveasnew', 'question');
        }
    }
    if (!$question->formoptions->movecontext  && count($permissionstrs)){
        print_heading(get_string('permissionto', 'question'), 'center', 3);
        $html = '<ul>';
        foreach ($permissionstrs as $permissionstr){
            $html .= '<li>'.$permissionstr.'</li>';
        }
        $html .= '</ul>';
        print_box($html, 'boxwidthnarrow boxaligncenter generalbox');
    }
    $mform->display();
}
function wrsqz_response_summary($questionType, $dbType, $question, $state, $length=80){
    if($questionType == 'match'){
        //assemble Questiontexts and answers.
        $subquestions = &$state->options->subquestions;
        $responses    = &$state->responses;
        $table = new stdClass();
        $table->data = array();
        $table->width = '100%';
        foreach ($subquestions as $key => $sub) {
            foreach ($responses as $ind => $code) {
               if (isset($sub->options->answers[$code])) {
                   //assemble $text in encoded MathML.
                   $text = format_text(wrsqz_assemble($subquestions[$ind]->questiontext,$state->vars),$question->questiontextformat);
                   //assemble $answer in text mode.
                   $answer = wrsqz_assemble(wrsqz_variablesToText($sub->options->answers[$code]->answer),$state->vars);
                   $table->data[] =  array($text ,$answer);
               }
           }
       }
       $summary = print_table($table, true);

    }else if($questionType == 'shortanswer'){
        if(isset($state->responses[''])){
            mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
            if(isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true'){
                $summary = format_text(wrsqz_mathmlEncode(stripslashes($state->responses[''])),FORMAT_HTML);
            }else{
                $summary = stripslashes($state->responses['']);
            }
        }else{
            $summary='';
        }
    }else if($questionType == 'truefalse'){
        if(isset($state->responses['']) && isset($question->options->answers[$state->responses['']])){
            $summary = $question->options->answers[$state->responses['']]->answer;
        }else{
            $summary = '';
        }
    }else if($questionType == 'multianswer'){
        global $QTYPES;
        
        $table = new stdClass();
        $table->data = array();
        $table->data[0] = array();
        $table->width = '100%';
        $numquestions = count($question->options->questions);
        $table->size=array_fill(0,$numquestions,100/$numquestions . '%');
        foreach ($question->options->questions as $key=>$wrapped) {
            $wrappedstate = clone($state);
            $wrappedstate->responses = array(''=>$state->responses[$key]);
            $table->data[0][] = $QTYPES[$wrapped->qtype]->response_summary($wrapped,$wrappedstate);
        }
        $summary = print_table($table, true);
    }
    return $summary;
}
function wrsqz_hideCASSession($questionType, $dbType, $question, &$state){
  if(isset($state->responses['wirisCASHidden'])){
    $state->wirisCASHidden = $state->responses['wirisCASHidden'];
    unset($state->responses['wirisCASHidden']);
  }
}
function wrsqz_restoreCASSession($questionType, $dbType, $question, &$state){
  if(isset($state->wirisCASHidden)){
    $state->responses['wirisCASHidden'] = $state->wirisCASHidden;
    unset($state->wirisCASHidden);
  }
}
?>