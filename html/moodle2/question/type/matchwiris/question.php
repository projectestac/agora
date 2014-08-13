<?php
require_once($CFG->dirroot . '/question/type/wq/question.php');
require_once($CFG->dirroot . '/question/type/match/question.php');

class qtype_matchwiris_question extends qtype_wq_question implements question_automatically_gradable_with_countback {
    
    // References to moodle's question object
    public $shufflestems;
    public $correctfeedback;
    public $correctfeedbackformat;
    public $partiallycorrectfeedback;
    public $partiallycorrectfeedbackformat;
    public $incorrectfeedback;
    public $incorrectfeedbackformat;
    public $stems;
    public $stemformat;
    public $choices;
    public $right;
    
    public function join_all_text() {
        $text = parent::join_all_text();
        // Stems (matching left hand side)
        foreach ($this->stems as $key => $value){
            $text .= ' ' . $value;
        }
        // Choices (matching right hand side)
        foreach ($this->choices as $key => $value){
            $text .= ' ' . $value;
        }
        // Combined feedback
        $text .= ' ' . $this->correctfeedback . ' ' . $this->partiallycorrectfeedback . ' ' . $this->incorrectfeedback;
        
        return $text;
    }
    
    public function get_stem_order(){
        return $this->base->get_stem_order();
    }
    public function get_choice_order(){
        return $this->base->get_choice_order();
    }
    public function get_right_choice_for($stemid){
        return $this->base->get_right_choice_for($stemid);
    }
      
}
?>
