<?php
require_once($CFG->dirroot . '/question/type/wq/lib.php');
require_once($CFG->dirroot . '/question/type/multichoice/question.php');

class qtype_multichoicewiris_multi_question extends qtype_multichoice_multi_question {

    public function start_attempt(question_attempt_step $step, $variant) {
        
        parent::start_attempt($step, $variant);
        
        $correctAnswers = "";
        foreach ($this->answers as $key => $value){
            $correctAnswers .= " " . $value->answer . ' ' . $value->feedback;
        }

        $hints = "";
        foreach ($this->hints as $value) {
            $hints .= " " . $value->hint;
        }

        $qi = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $correctAnswers . ' ' . $this->generalfeedback . 
        ' ' . $this->correctfeedback . ' ' . $this->incorrectfeedback . ' ' . $this->partiallycorrectfeedback . ' ' . $hints, null, $variant);
        
        $step->set_qt_var('_qi', $qi->serialize());
    }          
    
    public function get_renderer(moodle_page $page) {
        return $page->get_renderer('qtype_multichoicewiris', 'multi');
    }   
    
    public function get_expected_data() {
        $expected = parent::get_expected_data();
        $expected['_sqi'] = PARAM_RAW_TRIMMED;
        return $expected;        
    }    
}

class qtype_multichoicewiris_single_question extends qtype_multichoice_single_question {

    public function start_attempt(question_attempt_step $step, $variant) {
        
        parent::start_attempt($step, $variant);
        
        $correctAnswers = "";
        foreach ($this->answers as $key => $value){
            $correctAnswers .= " " . $value->answer . ' ' . $value->feedback;
        }
        
        $hints = "";
        foreach ($this->hints as $value) {
            $hints .= " " . $value->hint;
        }
        
        $qi = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $correctAnswers . ' ' . $this->generalfeedback . 
        ' ' . $this->correctfeedback . ' ' . $this->incorrectfeedback . ' ' . $this->partiallycorrectfeedback . ' ' . $hints, null, $variant);
        
        $step->set_qt_var('_qi', $qi->serialize());
    }      

    public function get_renderer(moodle_page $page) {
        return $page->get_renderer('qtype_multichoicewiris', 'single');
    }    
    
    public function summarise_response(array $response) {
        if (isset($response['answer'])) {
            return 'Student answer not previewable.';
            //return $response['answer'];
        } else {
            return null;
        }
    }    
    
    public function get_expected_data() {
        $expected = parent::get_expected_data();
        $expected['_sqi'] = PARAM_RAW_TRIMMED;
        return $expected;
    }    
}
?>
