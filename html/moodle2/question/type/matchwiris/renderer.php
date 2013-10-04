<?php
require_once($CFG->dirroot . '/question/type/match/renderer.php');

class qtype_matchwiris_renderer extends qtype_match_renderer {
    
    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {
    
        global $DB;
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();
        $question = $qa->get_question();
        
        if (isset($question->parent) && $question->parent > 0){
            $id = $question->parent;
        }else{
            $id = $question->id;
        }        
        $question_xml= $DB->get_record('qtype_wq', array('question' => $id), 'xml')->xml;
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $q = $rb->readQuestion($question_xml);        
        
        $question = $qa->get_question();
        $stemorder = $question->get_stem_order();
        $response = $qa->get_last_qt_data();

        $choices = $this->format_choices($question);

        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        
        $wrap->start();
        if (!$qi->instance->isCacheReady()){
            //We make a new request to the service if plotter images are not cached.
            $intStems = "";
            foreach ($question->stems as $key => $value){
                $intStems .= " " . $value;
            }
            $intChoices = "";
            foreach ($question->choices as $key => $value){
                $intChoices .= " " . $value;
            }            
            
            $qi = wrsqz_get_question_instance($qi_xml, 'mathml', $question, $question->questiontext  . ' ' . $intStems .  ' ' . $intChoices 
                 . ' ' . $question->generalfeedback . ' ' .  $question->correctfeedback . ' ' . $question->incorrectfeedback);            
        }
        $wrap->stop();

        $result = '';
        $result .= html_writer::empty_tag('input', array('class' => 'wirislang', 'type' => 'hidden', 'value' => current_language()));
        
        $questiontext = $qi->expandVariables($question->questiontext);
        $questiontext = $question->format_text($questiontext, FORMAT_HTML, $qa, 'question', 'questiontext', $question->id);
        
        $result .= html_writer::tag('div', $questiontext, array('class' => 'qtext'));

        $result .= html_writer::start_tag('div', array('class' => 'ablock'));
        $result .= html_writer::start_tag('table', array('class' => 'answer'));
        $result .= html_writer::start_tag('tbody');

        $parity = 0;
        foreach ($stemorder as $key => $stemid) {

            $result .= html_writer::start_tag('tr', array('class' => 'r' . $parity));
            $fieldname = 'sub' . $key;

            $filteredStem = $qi->expandVariables($question->stems[$stemid]);
            
            $result .= html_writer::tag('td', $question->format_text($filteredStem, $question->stemformat[$stemid],
                    $qa, 'qtype_match', 'subquestion', $stemid),
                    array('class' => 'text'));
            
            
            $classes = 'control';
            $feedbackimage = '';

            if (array_key_exists($fieldname, $response)) {
                $selected = $response[$fieldname];
            } else {
                $selected = 0;
            }

            $fraction = (int) ($selected && $selected == $question->get_right_choice_for($stemid));

            if ($options->correctness && $selected) {
                $classes .= ' ' . $this->feedback_class($fraction);
                $feedbackimage = $this->feedback_image($fraction);
            }

            $filteredChoices = array('');
            foreach ($choices as $choiceKey => $choiceValue){
                array_push($filteredChoices, $qi->expandVariablesText($choiceValue));
            }
            
            $result .= html_writer::tag('td',
                    html_writer::select($filteredChoices, $qa->get_qt_field_name('sub' . $key), $selected,
                            array('0' => 'choose'), array('disabled' => $options->readonly)) .
                    ' ' . $feedbackimage, array('class' => $classes));

            $result .= html_writer::end_tag('tr');
            $parity = 1 - $parity;
        }
        $result .= html_writer::end_tag('tbody');
        $result .= html_writer::end_tag('table');
        $result .= html_writer::empty_tag('input', array('class' => 'wirisauxiliarcasapplet', 'type' => 'hidden'));
        $result .= html_writer::end_tag('div'); // ablock

        $wirisquestionvalue = $q->getStudentQuestion();
        $wirisquestioninputattributes = array(
            'type' => 'hidden',
            'value' => $wirisquestionvalue->serialize(),
            'class' => 'wirisquestion',
        );        
        
        $wirisquestioninput = html_writer::empty_tag('input', $wirisquestioninputattributes);
        $result .= html_writer::tag('div', $wirisquestioninput, array());

        //questioninstance added
        $sqi_xml = $qa->get_last_qt_var('_sqi');
        if ($sqi_xml == '' || $sqi_xml == null){
            $wirisquestioninstancevalue = $qi->getStudentQuestionInstance();
            $sqi_xml = $wirisquestioninstancevalue->serialize();
        }
        
        $sqi_inputname = $qa->get_qt_field_name('_sqi');
        $wirisquestioninstanceattributes = array(
            'type' => 'hidden',
            'value' => $sqi_xml,
            'class' => 'wirisquestioninstance',
            'name' => $sqi_inputname,
            'id' => $sqi_inputname,
        );        
        
        $wirisquestioninstance = html_writer::empty_tag('input', $wirisquestioninstanceattributes);
        $result .= html_writer::tag('div', $wirisquestioninstance, array());
        
        //Add javascript to launch editor and quizzes
        $this->page->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource', false);        
        
        if ($qa->get_state() == question_state::$invalid) {
            $result .= html_writer::nonempty_tag('div',
                    $question->get_validation_error($response),
                    array('class' => 'validationerror'));
        }

        return $result;
        
    }    

    public function correct_response(question_attempt $qa) {
        $question = $qa->get_question();
        
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        
        $stemorder = $question->get_stem_order();

        $choices = $this->format_choices($question);
        $filteredChoices = array('');
        foreach ($choices as $choiceKey => $choiceValue){
            array_push($filteredChoices, $qi->expandVariables($choiceValue));
        }        
        $right = array();
        foreach ($stemorder as $key => $stemid) {
            $filteredStem = $qi->expandVariables($question->stems[$stemid]);
            $filteredStem = $this->stripPTag($filteredStem);
            $right[] = $question->format_text($filteredStem,
                    $question->stemformat[$stemid], $qa,
                    'qtype_match', 'subquestion', $stemid) . ' – ' .
                    $question->format_text($filteredChoices[$question->get_right_choice_for($stemid)], FORMAT_HTML, $qa,
                           'qtype_match', 'subquestion', $stemid);         
        }

        if (!empty($right)) {
            return get_string('correctansweris', 'qtype_match', implode(', ', $right));
        }
    }     
    
    public function general_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $general_feedback = $qa->get_question()->generalfeedback;
        $general_feedback = $qi->expandVariables($general_feedback);

        return $question->format_text($general_feedback, FORMAT_HTML, $qa, 'question', 'generalfeedback', $question->id);
    }    

    public function specific_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        
        $state = $qa->get_state();

        if (!$state->is_finished()) {
            $response = $qa->get_last_qt_data();
            if (!$qa->get_question()->is_gradable_response($response)) {
                return '';
            }
            list($notused, $state) = $qa->get_question()->grade_response($response);
        }

        $feedback = '';
        $field = $state->get_feedback_class() . 'feedback';
        $format = $state->get_feedback_class() . 'feedbackformat';
        if ($question->$field) {
            $filteredFB = $qi->expandVariables($question->$field);
            $feedback .= $question->format_text($filteredFB, $question->$format,
                    $qa, 'question', $field, $question->id);
        }

        return $feedback;
    }

    protected function hint(question_attempt $qa, question_hint $hint) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $hintString = $qi->expandVariables($hint->hint);        
        return html_writer::nonempty_tag('div', $question->format_text($hintString, FORMAT_HTML, $qa, 'question', 'hint', $hint->id), array('class' => 'hint'));
    }
    
    
    //Used to avoid a problem when showing the correct answer.
    //TODO: Find a better solution.
    private function stripPTag($text){
        $len = strlen($text);
        if (substr($text, 0, 3) == '<p>' && substr($text, $len-4) == '</p>'){
            return substr($text, 3, $len - 7);
        }
        return $text;
    }
    
}

?>
