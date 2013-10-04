<?php
require_once($CFG->dirroot . '/question/type/shortanswer/renderer.php');

class qtype_shortanswerwiris_renderer extends qtype_shortanswer_renderer {

    public function formulation_and_controls(question_attempt $qa,
            question_display_options $options) {
        
        global $DB;
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();
        
        $question = $qa->get_question();
        $currentanswer = $qa->get_last_qt_var('answer');
        $inputname = $qa->get_qt_field_name('answer');

        if (isset($question->parent) && $question->parent > 0){
            $id = $question->parent;
        }else{
            $id = $question->id;
        }        
        $question_xml= $DB->get_record('qtype_wq', array('question' => $id), 'xml')->xml;
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $q = $rb->readQuestion($question_xml);        
        
        $inputattributes = array(
            'type' => 'text',
            'name' => $inputname,
            'value' => $currentanswer,
            'id' => $inputname,
            'size' => 80,
            'class' => 'wirisanswerfield',
            'style' => 'display:none;',
        );
        
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        
        $wrap->start();
        if (!$qi->instance->isCacheReady()){
            //We make a new request to the service if plotter images are not cached.
            $correctAnswers = "";
            foreach ($question->answers as $key => $value){
                $correctAnswers .= " " . $value->answer . ' ' . $value->feedback;
            }
            $qi = wrsqz_get_question_instance($qi_xml, 'mathml',  $question, $question->questiontext . ' ' . $correctAnswers . ' ' . $question->generalfeedback);
        }        
        $wrap->stop();
        
        $feedbackimg = '';
        if ($options->correctness) {
            
            $correctanswers = array();
            $currentanswers = array();
            $fractions = array();
            foreach ($question->answers as $key => $value){
                array_push($correctanswers, $value->answer);
                array_push($fractions, $value->fraction);
            }
            
            array_push($currentanswers, $currentanswer);
            
            $qi = wrsqz_get_question_instance($qi_xml, 'eval', $question, $correctanswers, $currentanswers);
            
            $correct = -1;
            $max_grade = -1;
            foreach ($correctanswers as $key => $value) {
                $grade = $qi->getAnswerGrade($key, 0, $q);
                if ($grade > $max_grade){
                    $max_grade = $grade;
                    $correct = $key;
                }                
            }

            $fraction = $fractions[$correct];
            $feedbackimg = $this->feedback_image($fraction * $max_grade);
        }

        $questiontext = $qi->expandVariables($question->questiontext);
        //Used to filter with all active Moodle filters
        $questiontext = $question->format_text($questiontext, FORMAT_HTML, $qa, 'question', 'questiontext', $question->id);
      
        $input = html_writer::empty_tag('input', $inputattributes);
        
        $result = '';
        $result .= html_writer::empty_tag('input', array('class' => 'wirislang', 'type' => 'hidden', 'value' => current_language()));
        $result .= html_writer::tag('div', $questiontext, array('class' => 'qtext'));
        $result .= html_writer::start_tag('div', array('class' => 'ablock', 'style' => 'width:500px;'));
        $result .= html_writer::start_tag('div', array('class' => 'answer', 'style' => 'width:300px;'));
        $result .= $input;
        $result .= html_writer::tag('div', $feedbackimg, array('class' => 'feedbackimage', 'style' => 'margin-top:3px;'));
        $result .= html_writer::end_tag('div');
        $result .= html_writer::empty_tag('input', array('class' => 'wirisauxiliarcasapplet', 'type' => 'hidden'));
        $result .= html_writer::end_tag('div');
        
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
                    $question->get_validation_error(array('answer' => $currentanswer)),
                    array('class' => 'validationerror'));
        }

        return $result;
    }    

    //Used to return the feedback of the particular answer, is correct.
    public function specific_feedback(question_attempt $qa) {
        global $DB;
        
        $currentanswer = $qa->get_last_qt_var('answer');
        
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');

        if (isset($question->parent) && $question->parent > 0){
            $id = $question->parent;
        }else{
            $id = $question->id;
        }        
        $question_xml= $DB->get_record('qtype_wq', array('question' => $id), 'xml')->xml;
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $q = $rb->readQuestion($question_xml);        
        
        $correctanswers = array();
        $currentanswers = array();
        $feedback = array();
        $ids = array();
        
        foreach ($question->answers as $key => $value){
            array_push($correctanswers, $value->answer);
            array_push($feedback, $value->feedback);
            array_push($ids, $value->id);
        }        
        
        array_push($currentanswers, $currentanswer);
        
        $qi = wrsqz_get_question_instance($qi_xml, 'eval', $question, $correctanswers, $currentanswers);

        $correct = -1;
        foreach ($correctanswers as $key => $value) {
            if ($value != '*'){
                if ($qi->getAnswerGrade($key, 0, $q) == 1.0){
                    $correct = $key;
                    break;
                }
            }else{
                $correct = $key;
            }
        }

        if ($correct == -1){
            return '';
        }
        
        $specific_feedback = $qi->expandVariables($feedback[$correct]);
        $specific_feedback = $question->format_text($specific_feedback, FORMAT_HTML, $qa, 'question', 'answerfeedback', $ids[$correct]);
        
        return $specific_feedback;
    }    
    
    protected function general_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $general_feedback = $qa->get_question()->generalfeedback;
        $general_feedback = $qi->expandVariables($general_feedback);
        $general_feedback = $question->format_text($general_feedback, FORMAT_HTML, $qa, 'question', 'generalfeedback', $question->id);
        
        return $general_feedback;
    }    

    public function correct_response(question_attempt $qa) {
        $question = $qa->get_question();
        /*$qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);*/
        
        //$answer = $question->get_matching_answer($question->get_correct_response());
        $answer = $question->get_correct_response();
        //$answer = $question->get_matching_answer($answer);
        
        if (!$answer) {
            return '';
        }
        /*
        $correctanswer = $answer->answer;
        $correctanswer = $qi->expandVariables($correctanswer);
        $correctanswer = $question->format_text($correctanswer, FORMAT_HTML, $qa, 'question', 'correctanswer', $question->id);
        
        return get_string('correctansweris', 'qtype_shortanswer', $correctanswer);*/
        //return get_string('correctansweris', 'qtype_shortanswer', $answer);
        $correctanswer = $question->format_text($answer['answer'], FORMAT_HTML, $qa, 'question', 'questiontext', $question->id);
        //return $answer['answer'];
        return get_string('correctansweris', 'qtype_shortanswer', $correctanswer);
    }    
    
    protected function hint(question_attempt $qa, question_hint $hint) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $hintString = $qi->expandVariables($hint->hint);        
        return html_writer::nonempty_tag('div', $question->format_text($hintString, FORMAT_HTML, $qa, 'question', 'hint', $hint->id), array('class' => 'hint'));
    }
    
}
