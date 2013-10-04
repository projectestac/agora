<?php
require_once($CFG->dirroot . '/question/type/wq/lib.php');
require_once($CFG->dirroot . '/question/type/match/question.php');

class qtype_matchwiris_question extends qtype_match_question {
    
    public function start_attempt(question_attempt_step $step, $variant) {
        
        parent::start_attempt($step, $variant);
     
        $stems = "";
        foreach ($this->stems as $key => $value){
            $stems .= " " . $value;
        }
        
        $choices = "";
        foreach ($this->choices as $key => $value){
            $choices .= " " . $value;
        }

        $hints = "";
        foreach ($this->hints as $value) {
            $hints .= " " . $value->hint;
        }

        $qi = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $stems .  ' ' . $choices . ' ' . $this->generalfeedback
                 . ' ' .  $this->correctfeedback . ' ' . $this->incorrectfeedback . ' ' . $hints, null, $variant);
        
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
        $vars = parent::get_expected_data();
        $vars['_sqi'] = PARAM_RAW_TRIMMED;
        return $vars;        
    }    
}
?>
