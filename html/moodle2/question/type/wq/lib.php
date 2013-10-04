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

        $quizzes = $rb->getQuizzesService();
        try {
            $vqs = $quizzes->execute($eqs);
            $qi->update($vqs);
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
        $quizzes = $rb->getQuizzesService();

        try{
            $vqs = $quizzes->execute($vqr);    
            $qi->update($vqs);
            //add_to_log($COURSE->id, 'wiris-quizzes', 'request', me(), 'Seed: ' . $qi->userData->randomSeed . ', Question: ' . $elem->id);
        }
        catch (Exception $e) {
            $questionname = $elem->name;
            $a = new stdClass();
            $a->questionname = $questionname;
            
            $link = null;
            $cmid = $_POST['cmid'];
            if (isset($cmid)){
                $link = $CFG->wwwroot . '/mod/quiz/view.php?id='.$cmid;
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
