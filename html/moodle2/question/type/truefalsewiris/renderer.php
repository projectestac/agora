<?php
require_once($CFG->dirroot . '/question/type/wq/renderer.php');
require_once($CFG->dirroot . '/question/type/truefalse/renderer.php');

class qtype_truefalsewiris_renderer extends qtype_wq_renderer {
    public function __construct(moodle_page $page, $target){
        parent::__construct(new qtype_truefalse_renderer($page, $target), $page, $target);
    }
    
    private function swap_feedbacks($question){
        $aux = $question->truefeedback;
        $question->truefeedback = $question->falsefeedback;
        $question->falsefeedback = $aux;
            
        $aux = $question->truefeedbackformat;
        $question->truefeedbackformat = $question->falsefeedbackformat;
        $question->falsefeedbackformat = $aux;
    }
    
    public function specific_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        // Replace truefeedback by right feedback and false feedback by wrong feedback.
        if($question->rightanswer === false) {
            $this->swap_feedbacks($question);
        }
        $result = parent::specific_feedback($qa);
        //Restore state.
        if($question->rightanswer === false) {
            $this->swap_feedbacks($question);
        }
        return $result;
    }

}