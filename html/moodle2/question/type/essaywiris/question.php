<?php
require_once($CFG->dirroot . '/question/type/wq/lib.php');
require_once($CFG->dirroot . '/question/type/essay/question.php');


class qtype_essaywiris_question extends qtype_essay_question {
    
    public function start_attempt(question_attempt_step $step, $variant) {
        
        parent::start_attempt($step, $variant);
        
        $qi = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $this->generalfeedback . ' ' . $this->graderinfo, null, $variant);
        $step->set_qt_var('_qi', $qi->serialize());
        
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
        $expecteddata = parent::get_expected_data();
        $expecteddata['_sqi'] = PARAM_RAW_TRIMMED;
        return $expecteddata;
    }
}

?>
