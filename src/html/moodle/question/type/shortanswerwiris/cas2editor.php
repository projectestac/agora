<?php
	// http://localhost/moodle-test/question/type/shortanswerwiris/test.php

require_once('../../../config.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/functions.php');
mb_internal_encoding('UTF-8');

	$problem = $_POST['program'];
	//if (!get_magic_quotes_gpc()) {
		$problem=stripslashes($problem);
	//}
	$qid = $_POST['question'];

	
    if (($questionOptions = get_record('question_shortanswerwiris','question',$qid)) === false) {
		print("Error\r\n");
		return;
	}
	
	mb_parse_str($questionOptions->eqoption, $eqoptionArray);
	
	if (isset($eqoptionArray['multipleAnswers']) && $eqoptionArray['multipleAnswers'] == 'true'){
	//If multipleAnswers is set, we copy from the WIRIS CAS computations program, the variables with the names expected.
	//NOTE This code only copies the variables defined in the first answer.
		if (($answer = get_record('question_answers', 'question', $qid)) === false) {
			print("Error\r\n");
			return;
		}

                //Get the variable names to be evaluated and copied depending on
                //the use of test function.
                if (isset($eqoptionArray['testFunction']) && isset($eqoptionArray['testFunction'][$answer->id])){
                    $index = $eqoptionArray['testFunction'][$answer->id];
                    $functions = $eqoptionArray['testFunctionName'][$index]; //a b
                    $functions = explode(' ',$functions);
                    $names=array();
                    foreach($functions as $name){//delete #
                        if ($name[0]=='#')
                            $name = mb_substr($name,1);
                        $names[]=$name;
                    }
                }else {
                    $answertext=$answer->answer; // #a (40%) #b (60%)
                    $answers = explode(' ',$answertext);
                    $names = array();
                    foreach($answers as $name){//Skip parameters and delete # => a b
                        if ($name[0]!='('){ 
                            if ($name[0]=='#')
                                $name = mb_substr($name,1);
                            $names[]=$name;
                        }
                    }
                }
               
                //Prepare string for send to servlet
                $variables = array();
                foreach($names as $name){
                    $variables[]='##M'.$name;
                }
		$variableString = implode(',',$variables); // ##Ma,##Mb

                //call servlet in order to evaluate the program & get variables
		$message = callServlet($variableString, $problem);

                //clean undefined variables from servlet response
                $definedNames = array();
                foreach($message['vars'] as $variable => $value){
                    if ($value != 'undefined' && $value != 'no_definido' && $value != 'indefinit'
                        && $value != 'indéfini' && $value !='indefinito'){
                        $definedNames[]=mb_substr($variable,3);
                    }
                }
                if(!empty($definedNames)){
                    $definedNamesString = implode(' ',$definedNames);
                    // Generate the MathML output
                    $editorMathML = wrsqz_multipleAnswersTable($definedNamesString, $message['vars'], $definedNamesString);
                    echo $editorMathML;
                }else{
                    echo '<math></math>';
                }
		
	} else {
	//If multipleAnswers is not et, we copy the last WIRIS CAS output
	
		//Get the last output inside WIRIS CAS mathML.
		$start = strlastpos($problem,'<output>') + strlen('<output>');
		$end = strlastpos($problem,'</output>');
		$math = mb_substr($problem, $start, $end - $start);

		//remove the <math> tag
		$start = mb_strpos($math, '>')+1;
		$end = mb_strrpos($math,'<');
		$math = mb_substr($math,$start,$end-$start);
		
		//We have the WIRIS CAS MathML, but we want the Editor MathML. We use the service with a convenient program
		$prog = '<session lang="en" version="2.0"><group><command><input><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>r</mi><mo>=</mo>';
		$prog .= $math;
		$prog .= '</math></input></command></group></session>';
		
		$message = callServlet('##Mr',$prog);
		$editorMathML='<math>' . $message['vars']['##Mr'] . '</math>';
		
		echo $editorMathML;
	}
		
function callServlet($vars, $program){

	$md5 = md5($program);
	$postdata = array(
		'function' => 'varNonLibrary',
		'seed' => '123',
		'text' => $vars,
		'problem' => $program
	);
	$postdata['wiris']->md5=$md5;
	$postdata['wiris']->idcache=0; // not used but avoids a PHP notice
	
	$message = wrsqz_getInfo('shortanswer',0,$postdata);

	return $message;
}

function strlastpos($haystack, $needle) {
# flip both strings around and search, then adjust position based on string lengths
return mb_strlen($haystack) - mb_strlen($needle) - mb_strpos(strrev($haystack), strrev($needle));
} 
?>