<?php
global $CFG;
require_once($CFG->dirroot . '/wiris-quizzes/wrsqz_config.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/functions.php');
mb_internal_encoding('UTF-8');
define('SAVE_CAS_VALUE_JS','document.getElementsByName("hiddenCASValue")[0].value = document.getElementsByName("WirisCASApplet")[0].getXML();');

function wrsqz_definition($questionType, $dbType, &$mform) {
  if(!wrsqz_isEnabled()) return;
  //Set the main help link to the moodle question type help page
    
	$position = ($mform->_elementIndex['buttonar']);
	foreach ($mform->_elements[$position]->_elements as $key => $value) {
		if ($value->_attributes['name'] != 'cancel') {
			$value->_attributes['onclick'] = SAVE_CAS_VALUE_JS;
			$mform->_elements[$position]->_elements[$key] = $value;
		}
	}
	
	if (isset($mform->_elementIndex['addanswers'])){
		$position = $mform->_elementIndex['addanswers'];
		$mform->_elements[$position]->_attributes['onclick']='skipClientValidation = true; ' . SAVE_CAS_VALUE_JS;
	}

    if (isset($mform->_elementIndex['analyzequestion'])){
        $position = $mform->_elementIndex['analyzequestion'];
        $mform->_elements[$position]->_attributes['onclick']=SAVE_CAS_VALUE_JS;
    }
}

function wrsqz_definition_inner($questionType, $dbType, &$mform) {
	global $CFG;
  if(!wrsqz_isEnabled()) return;
  //add javascript:
  require_js(array('yui_yahoo', 'yui_dom-event'));
  require_js(array($CFG->wwwroot.'/wiris-quizzes/js/wiris-quizzes-edit.js',$CFG->wwwroot.'/wiris-quizzes/js/constants.js.php'));

  $mform->addElement('header', 'moodle_qwiris', wrsqz_get_string('wrsqz_wirisquizzes'));
  $mform->setHelpButton('moodle_qwiris',array($questionType.'_main'),false,'wrsqz_helpbutton');
	if ($questionType == 'shortanswer') {
		
		//set the WIRIS quizzes form elements for each answer.
		foreach($mform->_elementIndex as $elementName => $elementValue){
			if (substr($elementName,0,7)==='answer[' and substr($elementName,-1)===']'){
			
				$i=(int)substr($elementName,7,-1);
				$testFunctionName[$i]  = $mform->createElement('text',"testFunctionName[$i]",wrsqz_get_string('wrsqz_testfunctionname'),'maxlength="254" size="15"');
				$mform->insertElementBefore($testFunctionName[$i], "feedback[$i]");
				$mform->setHelpButton("testFunctionName[$i]", array('shortanswer_testfunction'),false, 'wrsqz_helpbutton');
				$mform->setAdvanced("testFunctionName[$i]");
			
			}
		}
		
		//set the end of page WIRIS quizzes form elements.
		$mform->addElement('checkbox', 'wirisEditor', wrsqz_get_string('wrsqz_formulaeditor'));
    $mform->setHelpButton('wirisEditor',array('shortanswer_wiriseditor'),false,'wrsqz_helpbutton');
		$mform->setAdvanced('wirisEditor');
		
	}
	else if ($questionType == 'truefalse') {
		$mform->addElement('text', 'wirisAnswer', wrsqz_get_string('wrsqz_answer'), array('size' => 54));
    $mform->setHelpButton('wirisAnswer',array('truefalse_wirisanswer'),false,'wrsqz_helpbutton');
		$mform->setAdvanced('wirisAnswer');
	}
	else if ($questionType == 'multichoice') {
		foreach($mform->_elementIndex as $elementName => $elementValue){
			if (substr($elementName,0,9)==='fraction[' and substr($elementName,-1)===']'){
				$i=(int)substr($elementName,9,-1);
				$element[$i]  = $mform->createElement('text',"gradeOverride[$i]", wrsqz_get_string('wrsqz_overridegrade'), 'maxlength="254" size="15"');
				$mform->insertElementBefore($element[$i], "feedback[$i]");
                $mform->setHelpButton("gradeOverride[$i]",array('multichoice_gradeoverride'),false,'wrsqz_helpbutton');
				$mform->setAdvanced("gradeOverride[$i]");
			}
		}
	}else if ($questionType == 'multianswer') {
        //TODO (formulaEditor for cloze): uncoment this two lines
        //$mform->addElement('checkbox', 'wirisEditor', 'Formula editor','Is WIRIS Formula Editor needed for answer introduction?');
		//$mform->setAdvanced('wirisEditor');
		
    }
	
	global $CFG;

	$mform->addElement('static', 'htmlWirisEditor', wrsqz_get_string('wrsqz_wirisprogram'), '');
	$mform->setAdvanced('htmlWirisEditor');
	$mform->addElement('hidden', 'hiddenCASValue');

  $langs = wrsqz_getAvailableCASLangs();
    
  if(count($langs)>1){
    $langsAssociative = array();
    foreach ($langs as $lang){
      $langsAssociative[$lang]=$lang;
    }

        //we use javascript to emulate the submit of form when changing the select
        //option using a hidden submit element.
    $casLangAtts = array(
      'onchange' => 'skipClientValidation = true; ' . SAVE_CAS_VALUE_JS
                  . ' this.form.translateCAS.click();'
      );

    $mform->addElement('select','WIRISCASLang',wrsqz_get_string('wrsqz_wiriscaslang'),$langsAssociative,$casLangAtts);
    $mform->setAdvanced('WIRISCASLang');
    $mform->addElement('submit','translateCAS','translateCAS',array('style'=>'display: none;'));
    $mform->registerNoSubmitButton('translateCAS');
  }

//ADD WIRIS CAS FOR AUXILIAR COMPUTATIONS OPTION
  $casGroup = array();
  if($questionType == 'essay'){
    $options = array(
      '0'=>wrsqz_get_string('wrsqz_casnone'),
      '1'=>wrsqz_get_string('wrsqz_casadd'),
      '2'=>wrsqz_get_string('wrsqz_casreplace'),
    );
    $casGroup[0] = &MoodleQuickForm::createElement('select', 'wirisCASForComputations', wrsqz_get_string('wrsqz_wiriscas'), $options);
    $mform->disabledIf('initialCAS', 'wirisCASForComputations', 'eq', '0');
  }
  if($questionType == 'match' || $questionType == 'multianswer' || $questionType == 'multichoice' || $questionType == 'shortanswer' || $questionType == 'truefalse'){
    $casGroup[0] = & $mform->createElement('checkbox', 'wirisCASForComputations', wrsqz_get_string('wrsqz_wiriscas'));
    $mform->disabledIf('initialCAS', 'wirisCASForComputations');
  }
  $casGroup[1] = & $mform->createElement('button','initialCAS', wrsqz_get_string('wrsqz_initialcontent'));
  $casGroup[2] = & $mform->createElement('hidden', 'hiddenInitialCASValue');
  $mform->addGroup($casGroup,'wirisCASGroup', wrsqz_get_string('wrsqz_wiriscas'), array(' '), false);
  
  

  $mform->setAdvanced('wirisCASGroup');
  $mform->setHelpButton('wirisCASGroup',array('all_wiriscasforcomputations'),false,'wrsqz_helpbutton');
  
  if($questionType =='shortanswer'){
		
    $mform->addElement('checkbox', 'multipleAnswers', wrsqz_get_string('wrsqz_multipleanswers'));
		$mform->setAdvanced('multipleAnswers');
    $mform->disabledIf('multipleAnswers','wirisEditor');
    $mform->setHelpButton('multipleAnswers',array('shortanswer_multipleanswers'),false,'wrsqz_helpbutton');
  }
}

function wrsqz_set_data($questionType, $dbType, &$mform, &$question) {
  if(!wrsqz_isEnabled()) return;
  
	$default_values = array();

  if(!isset($question->id)){ //NEW QUESTION: DEFAULT VALUES.
    if($questionType == 'shortanswer'){
      $default_values['wirisEditor'] = '1'; //set WIRIS editor activated.
    }
  }

  //common options
  if(isset($question->options->wiris->options)){
    $options = $question->options->wiris->options;
    if(isset($options['wirisCASForComputations'])){
      $default_values['wirisCASForComputations'] = $options['wirisCASForComputations'];
    }
    if(isset($options['hiddenInitialCASValue'])){
      $default_values['hiddenInitialCASValue'] = $options['hiddenInitialCASValue'];
    }
  }

  //question-type specific options
	if ($questionType == 'shortanswer' && isset($question) && isset($question->options) && isset($question->options->wiris) && isset($question->options->wiris->eqoption)) {
		mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
		if (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true') {
			$default_values['wirisEditor'] = '1';
		}else{
      $default_values['wirisEditor'] = '';
    }
		if (isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true') {
			$default_values['multipleAnswers'] = '1';
		}
		/*if (isset($eqoptionArray['wirisCASForComputations']) && $eqoptionArray['wirisCASForComputations'] == 'true') {
			$default_values['wirisCASForComputations'] = '1';
		}*/

		if (isset($eqoptionArray['testFunction'])){
      //set testFunctionNames where their associated answers are
      $index = 0;
      
      foreach ($question->options->answers as $answer){
        if (isset($eqoptionArray['testFunction'][$answer->id])){
          $testFunctionNameIndex = $eqoptionArray['testFunction'][$answer->id];
          $default_values['testFunctionName['.$index.']'] = $eqoptionArray['testFunctionName'][$testFunctionNameIndex];
          unset($eqoptionArray['testFunctionName'][$testFunctionNameIndex]);
        }
        $index++;
      }
      //set test functions with no associated answer.
      foreach($eqoptionArray['testFunctionName'] as $key => $value){
        $default_values['testFunctionName['.$index.']'] = $value;
        $index++;
      }
    }else if (isset($eqoptionArray['testFunctionName'])){
      //Backwards compatibility for old WIRIS quizzes (didn't have testFunction attribute).
      foreach ($eqoptionArray['testFunctionName'] as $index => $value){
        $default_values['testFunctionName['.$index.']'] = $eqoptionArray['testFunctionName'][$index];
      }
    }

	}else if($questionType == 'multianswer' && isset($question) 
    && isset($question->options) && isset($question->options->wiris)
    && isset($question->options->wiris->eqoption)){

    mb_parse_str($question->options->wiris->eqoption, $eqoptionArray);
    if (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true') {
			$default_values['wirisEditor'] = '1';
		} else {
      $default_values['wirisEditor'] = '';
    }
  }

	if (isset($question) && isset($question->options) && isset($question->options->wiris) && !empty($question->options->wiris->override)) {
		if ($questionType == 'multichoice') {
			$overrideList = explode(';', $question->options->wiris->override);
			
			foreach ($overrideList as $key => $value) {
				$default_values['gradeOverride[' . $key . ']'] = $value;
			}
		}else if ($questionType == 'truefalse') {
			$overrideList = explode(';', $question->options->wiris->override);
			$default_values['wirisAnswer'] = $overrideList[0];
		}
	}

	global $CFG;
	
	$pos = ($mform->_elementIndex['hiddenCASValue']);
	$value = trim($mform->_elements[$pos]->_attributes['value']);

  $selectedLang = optional_param('WIRISCASLang','',PARAM_ALPHA);
  $availableLangs = wrsqz_getAvailableCASLangs();

	if (!empty($value)) {
		$program = $value;
    $sessionLang = wrsqz_CASLanguageFromSession($program);
    if(in_array($selectedLang, $availableLangs) && $selectedLang != $sessionLang){
      //We have to translate the WIRIS session
      $translation = wrsqz_translateCASSession($program,$selectedLang);
      if($translation !==false){
        $program = $translation[0];
        $CASLang = $selectedLang;
        //Rearrange all form fields with the new named variables (at the end of the function).
      }else{
        //We couldn't translate the program. Do nothing
        $CASLang = $sessionLang;
      }
    }else{
      $CASLang = $sessionLang;
    }
	}else{
        if (isset($question) && isset($question->id)
        && ($program = wrsqz_getProgram($questionType, $question->id)) !== false
        && !empty($program)) {
            $CASLang = wrsqz_CASLanguageFromSession($program);
        }else {
            $CASLang = wrsqz_currentCASLanguage();
            $program = wrsqz_getDefaultCASCode($CASLang);
        }
    }

  $default_values['htmlWirisEditor']  = '<applet  name="WirisCASApplet" code="' . wrsqz_getCASClass($CASLang) . '" codebase="' . $CFG->wiriscascodebase . '" archive="' . wrsqz_getCASArchive($CASLang) . '" height="450" WIDTH="100%">';
	$default_values['htmlWirisEditor'] .= '<param name="version" value="2.0"/>';
	$default_values['htmlWirisEditor'] .= '<param name="command" value="false"/>';
	$default_values['htmlWirisEditor'] .= '<param name="commands" value="false"/>';
	$default_values['htmlWirisEditor'] .= '<param name="interface" value="false"/>';
	$default_values['htmlWirisEditor'] .= '<param name="XMLinitialText" value="' . htmlentities($program, ENT_QUOTES, 'UTF-8') . '"/>';
	$default_values['htmlWirisEditor'] .= '</applet>';
  $default_values['WIRISCASLang'] = $CASLang;
    
	// defined only because we call wrsqz_wirisQuizzesUsed
  $default_values['hiddenCASValue'] = $program;

  $question = (object)(array_merge((array)$question, $default_values));

  if(isset($translation) && ! empty($translation[1])){
        //If WIRIS CAS program had to be translated, there may be references (#a) to
        //old variable names, so replace them.
    wrsqz_replaceVarReferencesInFlatQuestion($questionType, $question, $translation[1]);
    wrsqz_replaceVarReferencesInForm($questionType, $mform, $translation[1]);
  }

  // If uses wiris quizzes, display advanced otherwise the program
  // is lost if the advanced button is never clicked
  if (wrsqz_wirisQuizzesUsed($question)) {
     $mform->setShowAdvanced(1);
  }

}
?>