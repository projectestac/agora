<?php
require_once($CFG->dirroot . '/question/type/multianswer/renderer.php');
require_once($CFG->dirroot . '/question/type/wq/renderer.php');

class qtype_multianswerwiris_renderer extends qtype_wq_renderer {

    public function __construct(moodle_page $page, $target){
        parent::__construct(new qtype_multianswerwiris_helper_renderer($page, $target), $page, $target);
    }
}
class qtype_multianswerwiris_helper_renderer extends qtype_multianswer_renderer {
    public function subquestion(question_attempt $qa, question_display_options $options, $index, $subq){
        if($subq->get_type_name() == 'shortanswerwiris') {
            $subquestion = new qtype_multianswerwiris_shortanswer_helper_question($subq);
        } else if(substr($subq->get_type_name(), -5) == 'wiris') {
            $subquestion = $subq->base;
        } else {
            $subquestion = $subq;
        }
        $text = parent::subquestion($qa, $options, $index, $subquestion);
        $text = $qa->get_question()->format_text($text, FORMAT_HTML, $qa, 'question', 'subquestion', $subq->id);
        return $text;
    }
}
/**
 * Helper/Hack class which is a mix between the base shortanswer question class
 * and the shortanswerwiris question class so it is usable by the multianswer
 * renderer functions.
 * **/
class qtype_multianswerwiris_shortanswer_helper_question extends qtype_shortanswer_question {
    private $subq;
    
    public function __construct($subq) {
        $this->subq = $subq;
        
        $this->qtype = &$this->subq->base->qtype; //base shortanswer qtype.
        
        $this->maxmark = &$this->subq->maxmark;
        $this->answers = &$this->subq->answers;
    }
    //shortanswerwiris grading
    public function get_matching_answer(array $response) {
        if (isset($response['answer'])) {
            if (!empty($response['correct_response'])) {
                //This is called to produce de feedback popup "The correct response is ..."
                return $this->subq->base->get_matching_answer($this->subq->base->get_correct_response()); 
            }
            else {
                //This is called to know how to render the input field (correct,
                //partially correct, incorrect, etc).
                if (!$this->subq->step->is_error()){ 
                    if(!is_null($this->subq->step->get_var('_matching_answer'))) {
                        return $this->subq->get_matching_answer($response);
                    }
                    // This code is for retro-compatibility. The attempts graded 
                    // with previous versions of WIRIS quizzes don't have the 
                    // '_matching_answer' var but a '_fraction' var. We re-grade
                    // such answers in order to have the new data and therefore
                    // have the good rendering of correct/incorrect responses.
                    if(!is_null($this->subq->step->get_var('_fraction'))) {
                        return $this->subq->get_matching_answer($response);
                    }
                }
            }
        }
        return null;
    }
    public function get_correct_response() {
        //Mark the correct response so we can know inside get_matching_answer
        //that the value is comming from this function and not from the user.
        $correct = $this->subq->get_correct_response();
        $correct['correct_response'] = true;
        return $correct;
    }
}
