<?php
require_once($CFG->dirroot . '/question/type/wq/question.php');
require_once($CFG->dirroot . '/question/type/multichoice/question.php');

class qtype_multichoicewiris_question extends qtype_wq_question implements question_automatically_gradable_with_countback {
    
    //References to original multichoice question class.
    public $answers;
    public $shuffleanswers;
    public $answernumbering;
    public $layout;
    public $correctfeedback;
    public $correctfeedbackformat;
    public $partiallycorrectfeedback;
    public $partiallycorrectfeedbackformat;
    public $incorrectfeedback;
    public $incorrectfeedbackformat;
    
    public function join_all_text() { 
        $text = parent::join_all_text();
        // Choices and feedbacks
        foreach ($this->base->answers as $key => $value) {
            $text .= ' ' . $value->answer . ' ' . $value->feedback;
        }
        // Combined feedback
        $text .= ' ' . $this->base->correctfeedback . ' ' . $this->base->partiallycorrectfeedback . ' ' . $this->base->incorrectfeedback;
        
        return $text;
    }
    /*public function get_expected_data() {
        $expected = parent::get_expected_data();
        //Hack or MC inline in Cloze don't work.
        if($this->parent != null && $this->layout == qtype_multichoice_base::LAYOUT_DROPDOWN){
            foreach($expected as $name => $type){
                $expected[$name] = PARAM_RAW;
            }
        }
        return $expected;        
    }*/
    public function get_renderer(moodle_page $page) {
        if ($this->base instanceof qtype_multichoice_single_question) {
            return $page->get_renderer('qtype_multichoicewiris', 'single');
        } else {
            return $page->get_renderer('qtype_multichoicewiris', 'multi');
        }
        
    }
    public function get_response(question_attempt $qa){
        return $this->base->get_response($qa);
    }
    public function get_order(question_attempt $qa) {
        return $this->base->get_order($qa);
    }
    public function is_choice_selected($response, $value){
        return $this->base->is_choice_selected($response, $value);
    }
    public function make_html_inline($html){
        return $this->base->make_html_inline($html);
    }
}
?>
