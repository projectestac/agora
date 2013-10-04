<?php   
require_once($CFG->dirroot . '/question/type/wq/lib.php');
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');
require_once($CFG->dirroot . '/question/type/wq/step.php');

class qtype_shortanswerwiris_question extends qtype_shortanswer_question {

    public function __construct() {
        parent::__construct();
        $this->step = new qtype_wirisstep();
    }

    public function start_attempt(question_attempt_step $step, $variant) {
        $correctAnswers = "";
        foreach ($this->answers as $key => $value){
            $correctAnswers .= " " . $value->answer . ' ' . $value->feedback;
        }
        
        $hints = "";
        foreach ($this->hints as $value) {
            $hints .= " " . $value->hint;
        }
        
        $qi = wrsqz_get_question_instance(null, 'mathml',  $this, $this->questiontext . ' ' . $correctAnswers . ' ' . $this->generalfeedback . ' ' . $hints, null, $variant);
        $step->set_qt_var('_qi', $qi->serialize());

        $this->step->load($step);
    }        
 
    public function grade_response(array $response) {
        try {
            global $DB;
            $randomseed = $this->randomSeed;
            $correctAnswers = "";
 
            // The same question should not be graded more than 2 times with failure
            if ($this->step->is_attempt_limit_reached()) {
                // Do not grade and tell teacher to do so...
                return array(null,question_state::$needsgrading);
            }

            // The following "if" is used only under unit-testing conditions
            global $CFG;
            $error = false;
            if (isset($CFG->wq_fail_shortanswer_grade) && $CFG->wq_fail_shortanswer_grade) {
                $fail = explode("@",$CFG->wq_fail_shortanswer_grade);
                $attemptid = $DB->get_record('question_attempt_steps', array('id' => $this->step->step_id), 'questionattemptid')->questionattemptid;
                $attemptid = $DB->get_record('question_attempts', array('id' => $attemptid), 'questionusageid')->questionusageid;
                $attemptid = $DB->get_record('quiz_attempts', array('uniqueid' => $attemptid), 'id')->id;
                if ($attemptid==$fail[0]) { // fail only the designated attempt
                    if (count($fail)==1) {
                        $error = true;
                    } else {
                        // Check also the name
                        if ($this->name==$fail[1]) {
                            $error = true;
                        }
                    }
                }
                //throw new moodle_exception('Failed to grade 2!', 'qtype_wq');
            }
            if (isset($CFG->wq_fail_shortanswer_grade) && $CFG->wq_fail_shortanswer_grade=='true' && $response['answer']=='error') {
                // Only allow an explicit error if defined wq_fail_shortanswer_grade
                $error = true;
            }
            // Used to simulate a grade failure when doing tests!
            if ($error) {
                throw new moodle_exception('Failed to grade (testing-' . ($this->step->get_attempts()+1) . ')!', 'qtype_wq');
            }

            foreach ($this->answers as $key => $value){
                $correctAnswers .= " " . $value->answer . ' ' . $value->feedback;
            }        

            $qi_xml = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $correctAnswers . ' ' . $this->generalfeedback, null, $randomseed+100000);

            $correctanswers = array();
            $answers = array();

            $answers['def_wrong'] = new stdClass();
            $answers['def_wrong']->fraction = '0.000000';
            $answers['def_wrong']->feedback = '';
            $answers['def_wrong']->feedbackformat = '1';

            $currentanswers = array();
            $fractions = array();
            $fractions['def_wrong'] = '0.00000';

            foreach ($this->answers as $key => $value){
                array_push($correctanswers, $value->answer);
                array_push($fractions, $value->fraction);
                array_push($answers, $value);
                //Cloze case, the wildcard is to give a default feedback when 
                //the response doesn't match with the possible answers.
                if ($value->answer == '*'){
                    $answers['def_wrong']->feedback = $value->feedback;
                }
            }       

            array_push($currentanswers, $response['answer']);

            $qi = wrsqz_get_question_instance($qi_xml, 'eval', $this, $correctanswers, $currentanswers);

            if (isset($this->parent) && $this->parent > 0){
                $qid = $this->parent;
            }else{
                $qid = $this->id;
            }        

            $question_xml= $DB->get_record('qtype_wq', array('question' => $qid), 'xml')->xml;
            $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
            $q = $rb->readQuestion($question_xml);        

            $correct = 'def_wrong';
            $max_grade = 0;
            foreach ($correctanswers as $key => $value) {
                $grade = $qi->getAnswerGrade($key, 0, $q);
                if ($grade > $max_grade){
                    $max_grade = $grade;
                    $correct = $key;
                }
            }

            $fraction = $fractions[$correct];
            $answer = $answers[$correct];

            $answer_arr = array($fraction*$max_grade, question_state::graded_state_for_fraction($fraction*$max_grade));
            $answer_arr['answer'] = $answer;

            //$this->reset_grade_counter(); // reset the number of grade attempts
            // Backup fraction & feedback
            $this->step->set_var('fraction', $answer_arr['answer']->fraction, true);
            $this->step->set_var('feedback', $answer_arr['answer']->feedback, true);
            $this->step->reset_attempts();
            return $answer_arr;
        } catch (moodle_exception $ex) {
            // Save fraction and feedback because are requested in the render
            // form
            $this->step->set_var('fraction', 0, true);
            $this->step->set_var('feedback', '', true);
            // Notify of the error
            $this->step->inc_attempts();
            throw $ex;
        }
    }    
    
    public function get_correct_response() {
        $answer = $this->get_correct_answer();
        if (!$answer) {
            return array();
        }
        
        global $DB;
        if (isset($this->randomSeed)){
            $randomseed = $this->randomSeed;
        }else{
            return array('answer' => $answer->answer);
        }
        
        $correctAnswers = "";
        
        foreach ($this->answers as $value){
            $correctAnswers .= " " . $value->answer . ' ' . $value->feedback;
        }        
        
        $qi_xml = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $correctAnswers . ' ' . $this->generalfeedback, null, $randomseed+100000);
        $qi = wrsqz_get_question_instance($qi_xml, null, $this);
        
        if (isset($this->parent) && $this->parent > 0){
            $qid = $this->parent;
        }else{
            $qid = $this->id;
        }        
        
        $question_xml= $DB->get_record('qtype_wq', array('question' => $qid), 'xml')->xml;
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $q = $rb->readQuestion($question_xml);
       
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();        
        $wrap->start();
        $inputField = $q->question->getImpl()->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD);
        
        if (isset($this->parent) && $this->parent > 0){
            //This is the case we are in a Cloze question
            //localdata is changed to launch expandTextVariables in next control
            $inputField = com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT;
        }
        $isCompound = $q->question->getImpl()->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER);
        
        if ($inputField == com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT && $isCompound=='false'){
            $correctanswer = $qi->expandVariablesText($answer->answer);
        }else{
            $correctanswer = $qi->expandVariablesMathML($answer->answer);
        }
        $wrap->stop();

        return array('answer' => $correctanswer);
    }    

    public function get_matching_answer(array $response) {
        // Optimization in order to avoid a grade_response invocation
        if (isset($this->step)) {
            $fraction = $this->step->get_var('fraction', true);
            $feedback = $this->step->get_var('feedback', true);
        } else {
            $fraction = null;
        }
        if ($fraction!=null) {
            return new question_answer(0, '', $fraction, $feedback, 1);
        }

        if (isset($this->step) && $this->step->is_error()) {
            // In case of error, do not call grade_response because it will likely
            // fail again with an ugly error...
            return null;
        }

        if (isset($response['answer'])){
            $answer = $this->grade_response($response);
            return $answer['answer'];
        }else{
            return null;
        }
    }    
    
    public function get_expected_data() {
        $expected = parent::get_expected_data();
        $expected['_sqi'] = PARAM_RAW_TRIMMED;
        return $expected;        
    }
    
    public function summarise_response(array $response) {
        if (isset($response['answer'])) {
            return 'Student answer not previewable.';
            //return $response['answer'];
        } else {
            return null;
        }
    }

    public function apply_attempt_state(question_attempt_step $step) {
        $this->step->load($step);
        $this->randomSeed = $this->step->get_randomseed();
    }

    private function wrsqz_get_randomseed_from_xml($qi_xml){
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $qi = $rb->readQuestionInstance($qi_xml);

        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();
        $wrap->start();
        $randomseed = $qi->instance->userData->randomSeed;
        $wrap->stop();

        return $randomseed;
    }
    
    public function wrsqz_set_random_seed($randomseed){
        $this->randomSeed = $randomseed;
    }
 
}