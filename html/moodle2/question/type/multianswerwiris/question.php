<?php
require_once($CFG->dirroot . '/question/type/multianswer/question.php');
require_once($CFG->dirroot . '/question/type/wq/question.php');
require_once($CFG->dirroot . '/question/type/wq/step.php');


class qtype_multianswerwiris_question extends qtype_wq_question implements question_automatically_gradable_with_countback {
    
    /**
     * A link to last question attempt step and also a helper class for some 
     * grading issues.
     */
    public $step;
    
    /**
     * Subquestions of wiris qtype.
     */
    public $wirissubquestions;
    /**
     * Reference to subquestions array (of Moodle qtype).
     */
    public $subquestions;
    public $places;
    public $textfragments;
    
    public function __construct($base) {
        parent::__construct($base);
        $this->step = new qtype_wirisstep();
    }
    
    protected function get_substep($step, $i) {
        // Cannot call $this->base because it is a protected method. So the
        // following is a copy of the multianswer get_substep() implementation.
        return new question_attempt_step_subquestion_adapter($step, 'sub' . $i . '_');
    }
    
    protected function load_step($step) {
        foreach($this->subquestions as $i => $subquestion) {
            if(isset($subquestion->step)){
                $subquestion->step->load($this->get_substep($step, $i));
            }
        }
        $this->step->load($step);
    }
    
    protected function set_wirisquestioninstance() {
        foreach($this->subquestions as $i => $subquestion) {
            if(substr($subquestion->get_type_name(),-5) == 'wiris'){
                $subquestion->wirisquestioninstance = $this->wirisquestioninstance;
            }
        }
    }
    
    public function start_attempt(question_attempt_step $step, $variant) {
        parent::start_attempt($step, $variant);
        $this->set_wirisquestioninstance();
        $this->load_step($step);
    }
    
    public function apply_attempt_state(question_attempt_step $step) {
        parent::apply_attempt_state($step);
        $this->set_wirisquestioninstance();
        $this->load_step($step);
    }
    
    private function set_shortanswer_matching_answers(array $response) {
        try {
            // Security protection:
            // The same question should not be graded more than N times with failure
            if ($this->step->is_attempt_limit_reached()) {
                return;
            }            
            //build list of shortanswerwiris subquestions.
            $indexes = array();
            foreach($this->subquestions as $i => $subquestion) {
                if($subquestion->get_type_name() == 'shortanswerwiris') {
                    $substep = $this->get_substep(null, $i);
                    $subresp = $substep->filter_array($response);
                    $subresphash = isset($subresp['answer']) ? md5($subresp['answer']) : null;
                    if(!is_null($subresphash) && ($subresphash != $subquestion->step->get_var('_response_hash'))){
                        $indexes[] = $i;
                    }
                }
            }

            // Quick return if nothing to do.
            if (empty($indexes)) {
               return; 
            }

            $builder = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
            $wrap = com_wiris_system_CallWrapper::getInstance();
            $q = $this->wirisquestion;

            //Build the list of grading assertions.
            $assertions = array();
            $wrap->start();
            $qimpl = $q->question->getImpl();
            
            // The following if is only for backwards compatibility: some old
            // multianswer assertions don't have assertions array.
            if (empty($qimpl->assertions)) {
                $qimpl->setAssertion("equivalent_symbolic", 0, 0);
            }
            
            for($i = $qimpl->assertions->length - 1; $i >= 0; $i--){
                $assertion = $qimpl->assertions[$i];
                if (!$assertion->isSyntactic()) {
                    $assertions[] = $assertion;
                    $qimpl->assertions->remove($assertion);
                }
            }
            $wrap->stop();

            // Build request objects.
            $studentanswers = array();
            $teacheranswers = array();

            foreach($indexes as $i) {
                $subquestion = $this->subquestions[$i];

                $substep = $this->get_substep(null, $i);
                $subresp = $substep->filter_array($response);
                // Call test code.
                $subquestion->get_matching_answer_fail_test($subresp);

                // Set assertions.
                foreach($subquestion->answers as $answer){
                    foreach($assertions as $assertion) {
                        $newassertion = clone $assertion;
                        $wrap->start();
                        $newassertion->setCorrectAnswer(count($teacheranswers));
                        $newassertion->setAnswer(count($studentanswers));
                        $qimpl = $q->question->getImpl();
                        $qimpl->assertions->push($newassertion);
                        $wrap->stop();
                    }
                    $teacheranswers[] = $answer->answer;
                }
                $studentanswers[] = $subresp['answer'];
            }
            // Get question instance with the variables!
            $qi = $this->wirisquestioninstance;

            // Call service.
            $request = $builder->newEvalMultipleAnswersRequest($teacheranswers, $studentanswers, $q, $qi);
            $resp = $this->call_wiris_service($request);
            $qi->update($resp);
            
            // Parse response.
            $numsubq = 0;
            $numsubans = 0;
            foreach($indexes as $i) {
                $subquestion = $this->subquestions[$i];
                
                // Compute matching answer for this subquestion.
                $matching = null;
                $maxgrade = 0.0;
                foreach($subquestion->answers as $answer) {
                    $grade = $qi->getAnswerGrade($numsubans, $numsubq, $q);
                    if ($grade > $maxgrade) {
                        $maxgrade = $grade;
                        $matching = $answer;
                    }
                    $numsubans++;
                }
                $matchinganswerid = 0;
                if (!empty($matching)) {
                    $matchinganswerid = $matching->id;
                    if ($maxgrade < 1.0) {
                        $subquestion->step->set_var('_matching_answer_grade', $maxgrade, true);
                    }
                }
                $substep = $this->get_substep(null, $i);
                $subresp = $substep->filter_array($response);
                $subresphash = md5($subresp['answer']);
                $subquestion->step->set_var('_response_hash', $subresphash, true);
                $subquestion->step->set_var('_matching_answer', $matchinganswerid, true);
                $numsubq++;
            }
            $this->step->reset_attempts();
        } catch(moodle_exception $e) {
            // Notify of the error
            $this->step->inc_attempts();
            throw $e;
        }
    }
    
    public function grade_response(array $response) {
        $this->set_shortanswer_matching_answers($response);
        // Use wiris subquestion types in base question.
        if($this->step->is_error()){            
            return array(null, question_state::$needsgrading);
        } else {
            $basesubquestions = $this->base->subquestions;
            $this->base->subquestions = $this->subquestions;
            $result = parent::grade_response($response);
            $this->base->subquestions = $basesubquestions;
            return $result;
        }
    }

    public function clear_wrong_from_response(array $response) {
        $this->set_shortanswer_matching_answers($response);
        // Use wiris subquestion types in base question.
        $basesubquestions = $this->base->subquestions;
        $this->base->subquestions = $this->subquestions;
        $result = parent::clear_wrong_from_response($response);
        $this->base->subquestions = $basesubquestions;
        return $result;
    }
    
    public function get_num_parts_right(array $response) {
        $this->set_shortanswer_matching_answers($response);
        // Use wiris subquestion types in base question.
        $basesubquestions = $this->base->subquestions;
        $this->base->subquestions = $this->subquestions;
        $result = parent::get_num_parts_right($response);
        $this->base->subquestions = $basesubquestions;
        return $result;
    }
    
    public function compute_final_grade($responses, $totaltries) {
        $this->set_shortanswer_matching_answers($responses);
        // Use wiris subquestion types in base question.
        $basesubquestions = $this->base->subquestions;
        $this->base->subquestions = $this->subquestions;
        $result = parent::compute_final_grade($responses, $totaltries);
        $this->base->subquestions = $basesubquestions;
        return $result;
    }
    
    public function get_correct_response() {
        // Use wiris subquestion types in base question.
        $basesubquestions = $this->base->subquestions;
        $this->base->subquestions = $this->subquestions;
        $result = parent::get_correct_response();
        $this->base->subquestions = $basesubquestions;
        return $result;
    }   

    public function join_all_text() {
        $text = parent::join_all_text();
        // Subquestions
        foreach ($this->subquestions as $key => $question) {
            //Numerical question type is also possible but don't have the method.
            if (method_exists($question, 'join_all_text')) {
                $text .= ' ' . $question->join_all_text();
            }
        }
        return $text;
    }
    
    public function get_renderer(moodle_page $page) {
        // Disable Strict standard errors before calling the parent because the
        // subquestions are not of class question_graded_automatically and
        // therefore the renderer overriding function subquestion doesn't have 
        // a compatible type hinting.
        $errors = error_reporting();
        error_reporting($errors & ~E_STRICT);
        $result = parent::get_renderer($page);
        error_reporting($errors);
        return $result;
    }
    
}
?>
