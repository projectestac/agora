<?php
require_once($CFG->dirroot . '/question/type/wq/lib.php');
require_once($CFG->dirroot . '/question/type/wq/question.php');
require_once($CFG->dirroot . '/question/type/truefalse/question.php');

class qtype_truefalsewiris_question extends qtype_wq_question implements question_automatically_gradable {
    
    public $wirisoverrideanswer;
    
    //References to base question options
    public $rightanswer;
    public $truefeedback;
    public $falsefeedback;
    public $truefeedbackformat;
    public $falsefeedbackformat;
    public $trueanswerid;
    public $falseanswerid;
    
    public function join_all_text() { 
        $text = parent::join_all_text();
        // Wrong and right feedback
        $text .= ' ' . $this->base->falsefeedback . ' ' . $this->base->truefeedback;
        // Correct answer
        $text .= ' ' . $this->wirisoverrideanswer;
        return $text;
    }
    
    public function start_attempt(question_attempt_step $step, $variant) {
        parent::start_attempt($step, $variant);
        $this->set_right_answer();
    }
    
    public function apply_attempt_state(question_attempt_step $step) {
        parent::apply_attempt_state($step);
        $this->set_right_answer();
    }
    
    private function set_right_answer() {
        if (!empty($this->wirisoverrideanswer)) {
            $wrap = com_wiris_system_CallWrapper::getInstance();
            $wrap->start();
            $this->rightanswer = $this->wirisquestioninstance->instance->getBooleanVariableValue($this->wirisoverrideanswer);
            $wrap->stop();
        }
    }

    
}