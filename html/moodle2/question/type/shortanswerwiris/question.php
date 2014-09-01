<?php   
require_once($CFG->dirroot . '/question/type/wq/question.php');
require_once($CFG->dirroot . '/question/type/wq/step.php');

class qtype_shortanswerwiris_question extends qtype_wq_question implements question_automatically_gradable, question_response_answer_comparer {
    /**
     * A link to last question attempt step and also a helper class for some 
     * grading issues.
     */
    public $step;
    
    /**
     * reference to Moodle's shortanswer question fields.
     */
    public $answers;
    
    public function __construct(question_definition $base = NULL) {
        parent::__construct($base);
        $this->step = new qtype_wirisstep();
    }
    public function start_attempt(question_attempt_step $step, $variant) {
        parent::start_attempt($step, $variant);
        $this->step->load($step);
    }
    public function apply_attempt_state(question_attempt_step $step) {
        parent::apply_attempt_state($step);
        $this->step->load($step);
        if ($this->step->is_first_step()) {
            //This is a regrade because is the only case where this function is
            //called with the first step instead of start_attempt. So invalidate
            //cached matching answers.
            $this->step->set_var('_response_hash', '0');
        }
    }
    /**
     * @return All the text of the question in a single string so WIRIS quizzes
     * can extract the variable placeholders.
     */
    public function join_all_text() {
        $text = parent::join_all_text();
        // Answers and feedback.
        foreach ($this->base->answers as $key => $value){
            $text .= ' ' . $value->answer . ' ' . $value->feedback;
        }
        return $text;
    }

    public function grade_response(array $response) {
        $answer = $this->get_matching_answer($response);
        if ($answer) {
            $fraction = $answer->fraction;
            // Multiply Moodle fraction by quizzes grade (due to custom function 
            // grading or compound grade distribution).
            $grade = $this->step->get_var('_matching_answer_grade');
            if(!empty($grade)) {
                $fraction = $fraction * $grade;
            }
            $state = question_state::graded_state_for_fraction($fraction);
            return array($fraction, $state);
        } else if($this->step->is_error()) {
            // Do not grade and tell teacher to do so...
            return array(null, question_state::$needsgrading);
        } else {
            return array(0, question_state::$gradedwrong);
        }
    }
    /**
     * Function used in unit testing environment. Throws an exception if it has
     * been configured to do so.
     * **/
    public function get_matching_answer_fail_test(array $response) {
        // BEGIN TEST
        // The following "if" is used only under unit-testing conditions
        global $CFG;
        global $DB;
        $error = false;
        if (isset($CFG->wq_fail_shortanswer_grade) && $CFG->wq_fail_shortanswer_grade && $CFG->wq_fail_shortanswer_grade != 'false') {
            $fail = explode("@",$CFG->wq_fail_shortanswer_grade);
            $attemptid = $DB->get_record('question_attempt_steps', array('id' => $this->step->step_id), 'questionattemptid')->questionattemptid;
            $attemptid = $DB->get_record('question_attempts', array('id' => $attemptid), 'questionusageid')->questionusageid;
            $activity = $DB->get_field('question_usages', 'component', array('id' => $attemptid));
            if($activity == 'mod_quiz') {
                $attemptid = $DB->get_record('quiz_attempts', array('uniqueid' => $attemptid), 'id')->id;
                if ($attemptid == $fail[0]) { // fail only the designated attempt
                    if (count($fail)==1) {
                        $error = true;
                    } else {
                        // Check also the name
                        if ($this->name == $fail[1]) {
                            $error = true;
                        }
                    }
                }
            }
        }
        if (isset($CFG->wq_fail_shortanswer_grade) && $CFG->wq_fail_shortanswer_grade=='true' && $response['answer']=='error') {
            // Only allow an explicit error if defined wq_fail_shortanswer_grade
            $error = true;
        }
        // Used to simulate a grade failure when doing tests!
        if ($error) {
            throw new moodle_exception('Failed to grade (testing-' . ($this->step->get_attempts()+1) . ')!', 'qtype_wq');
        }
        // END TEST    
    }
    
    public function get_matching_answer(array $response) {
        try {
            // quick return if no answer given.
            if(!isset($response['answer'])) {
                return null;
            }
            // Optimization in order to avoid a service call.
            $responsehash = md5($response['answer']);
            if ($this->step->get_var('_response_hash') == $responsehash) {
                $matching_answer = $this->step->get_var('_matching_answer');
                if(!empty($matching_answer)) {
                    return $this->base->answers[$matching_answer];
                }
                else if(!is_null($matching_answer)) {
                    return null;
                }
            }
            
            // Security protection:
            // The same question should not be graded more than N times with failure
            if ($this->step->is_attempt_limit_reached()) {
                return null;
            }
            
            // Test code:
            // Does nothing on production, may throw exception on test environment.
            $this->get_matching_answer_fail_test($response);

            //Use the WIRIS quizzes API to grade this response.
            $builder = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
            //Build array of correct answers.
            $correctvalues = array();
            $correctanswers = array();
            foreach($this->base->answers as $answer){
                $correctvalues[] = $answer->answer;
                $correctanswers[] = $answer;
            }
            //Load instance
            $qi = $this->wirisquestioninstance;
            //Make call
            $request = $builder->newEvalMultipleAnswersRequest($correctvalues, array($response['answer']), $this->wirisquestion, $qi);
            $response = $this->call_wiris_service($request);
            $qi->update($response);

            // Choose best answer.
            $max = 0.0;
            $answer = null;
            for ($i = 0; $i < count($correctanswers); $i++) {
                $grade = $qi->getAnswerGrade($i, 0, $this->wirisquestion);
                if($grade > $max) {
                    $max = $grade;
                    $answer = $correctanswers[$i];
                }
            }
            // Backup matching answer.
            $matchinganswerid = 0;
            if (!empty($answer)) {
                $matchinganswerid = $answer->id;
                if ($max < 1.0) {
                    $this->step->set_var('_matching_answer_grade', $max, true);
                }
            }
            
            $this->step->set_var('_matching_answer', $matchinganswerid, true);
            $this->step->set_var('_response_hash', $responsehash, true);
            $this->step->reset_attempts();

            return $answer;
        } catch(moodle_exception $e) {
            // Notify of the error
            $this->step->inc_attempts();
            throw $e;
        }
    }
    
    public function summarise_response(array $response) {
        // This function must return plain text output. Since student response
        // may be mathml and the conversion MathML => text made in 
        // expand_variables_text() is not good, we prevent to show incorrect 
        // data.
        if (!$this->is_text_answer()) {
            return get_string('contentnotviewable', 'qtype_shortanswerwiris');
        } else {
            return parent::summarise_response($response);
        }
    }
    
    public function get_right_answer_summary(){
        return get_string('contentnotviewable', 'qtype_shortanswerwiris');
    }
    
    public function format_answer($text) {
        if($this->is_text_answer() && !$this->is_compound_answer()){
            $text = $this->expand_variables_text($text);
        }
        else {
            $text = $this->expand_variables_mathml($text);
        }
        
        return $text;
    }
    
    private function is_text_answer() {
        if (!empty($this->parent)) {
            return true;
        }
        $wrap = com_wiris_system_CallWrapper::getInstance();
        $wrap->start();
        $inputField = $this->wirisquestion->question->getImpl()->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD);
        $inputText = ($inputField == com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT);
        $wrap->stop();
        
        return $inputText;
    }
    
    private function is_compound_answer() {
        $wrap = com_wiris_system_CallWrapper::getInstance();
        $wrap->start();
        $isCompound = $this->wirisquestion->question->getImpl()->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER);
        $wrap->stop();
        return ($isCompound == 'true');
    }
    
    public function get_correct_response() {
        $correct = parent::get_correct_response();
        $correct['answer'] = $this->format_answer($correct['answer']);
        return $correct;
    }
}