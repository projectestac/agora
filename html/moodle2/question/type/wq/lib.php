<?php
//require_once($CFG->dirroot . '/lib/datalib.php');
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');

//Returns a question instance object
function wrsqz_get_question_instance($qi, $type, $elem, $correct = null, $current = null, $randomSeed = -1){
    global $DB;
    global $CFG;

    $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
    
    if ($type == 'eval'){
        if (is_string($qi)){
            $qi = $rb->readQuestionInstance($qi);
        }
        
        if (isset($elem->parent) && $elem->parent > 0){
            $id = $elem->parent;
        }else{
            $id = $elem->id;
        }        
        
        $question_xml= $DB->get_record('qtype_wq', array('question' => $id), 'xml')->xml;
        $q = $rb->readQuestion($question_xml);
        
        $eqs = $rb->newEvalMultipleAnswersRequest($correct, $current, $q, $qi);

        try {
            _wrsqz_execute_quizzes_request($rb, $eqs, $elem, $qi);
        }
        catch (Exception $e) {
            throw new moodle_exception('wirisquizzeserror', 'qtype_wq');
        }
        //add_to_log($COURSE->id, 'wiris-quizzes', 'eval', me(), 'Seed: ' . $qi->userData->randomSeed . ', Question: ' . $elem->id);
    }else if ($type == 'mathml'){
        
        if (isset($elem->parent) && $elem->parent > 0){
            $id = $elem->parent;
        }else{
            $id = $elem->id;
        }
        $question_xml = $DB->get_record('qtype_wq', array('question' => $id), 'xml')->xml;

        $q = $rb->readQuestion($question_xml);

        if ($qi == null){
            $qi = $rb->newQuestionInstance();
            if (isset($CFG->wq_random_seed) && $CFG->wq_random_seed!='false') {
                $qi->setRandomSeed($CFG->wq_random_seed);
                set_config('wq_random_seed', 'false');
            } else {
                if ($randomSeed > 100000){
                    $randomSeed -= 100000;
                    $qi->setRandomSeed($randomSeed);
                }
            }
        }else{
            if (is_string($qi)){
                $qi = $rb->readQuestionInstance($qi);
            }
        }
        
        $vqr = $rb->newVariablesRequest($correct, $q, $qi);
        
        try {
            _wrsqz_execute_quizzes_request($rb, $vqr, $elem, $qi);
        }
        catch (Exception $e) {
            $a = new stdClass();
            $a->questionname = $elem->name;
            
            $link = null;
            if (isset($_POST['cmid'])){
                $link = $CFG->wwwroot . '/mod/quiz/view.php?id='.$_POST['cmid'];
            }
            
            throw new moodle_exception('wirisquestionincorrect', 'qtype_wq', $link, $a, '');
        }
        
    }else{
        if (is_string($qi)){
            $qi = $rb->readQuestionInstance($qi);
        }
    }
    return $qi;
}
/**
 * Call WIRIS quizzes service.
 *
 * @param $builder QuizzesBuilder instance.
 * @param $request QuestionRequest instance.
 * @param $question Moodle question object (only used $question->id for metadata)
 * @param $qi QuestionInstance object that gets updated with the service results.
 *
 * @throws Exception if network or other errors occur during the call.
 * **/
function _wrsqz_execute_quizzes_request($builder, $request, $question, $qi) {
  global $COURSE;
  global $USER;

  $request->addMetaProperty('questionref', (!empty($COURSE) ? $COURSE->id : '') . '/' . (!empty($question) ? $question->id : ''));
  $request->addMetaProperty('userref', (!empty($USER) ? $USER->id : ''));

  $quizzes = $builder->getQuizzesService();

  $response = $quizzes->execute($request);
  $qi->update($response);
}

function decode_html_entities($xml) {
    $htmlentitiestable = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES, 'UTF-8');
    $xmlentitiestable = get_html_translation_table(HTML_SPECIALCHARS , ENT_COMPAT, 'UTF-8');
    $entitiestable = array_diff($htmlentitiestable, $xmlentitiestable);
    $decodetable = array_flip($entitiestable);
    $xml = str_replace(array_keys($decodetable), array_values($decodetable), $xml);
    return $xml;
}

function wrsqz_mathmlDecode($input) {
    $from = array('«', '»', '¨', '§', '`');
    $to = array('<', '>', '"', '&', '\'');
    $r = str_replace($from, $to, $input);
    return decode_html_entities($r);
}
?>
