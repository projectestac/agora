<?php
require_once($CFG->dirroot . '/question/type/wq/lib.php');
require_once($CFG->dirroot . '/question/type/truefalse/question.php');

class qtype_truefalsewiris_question extends qtype_truefalse_question {

    public function start_attempt(question_attempt_step $step, $variant) {
        global $DB;
        $correctanswer = $DB->get_record('qtype_wq', array('question' => $this->id), 'options')->options;        

        $qi = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $correctanswer . ' ' . $this->falsefeedback . ' ' . $this->truefeedback . 
        ' ' . $this->generalfeedback, null, $variant);
        $step->set_qt_var('_qi', $qi->serialize());
    }        

    public function grade_response(array $response) {
        $answer = $this->get_correct_response();
        $fraction = ($response['answer'] == $answer['answer']);
        
        return array($fraction, question_state::graded_state_for_fraction((float)$fraction));
    }    
    
    public function get_correct_response() {
        global $DB;
        
        $correctanswer = $DB->get_field('qtype_wq', 'options', array('question' => $this->id));
        
        if ($correctanswer == ''){
            return array('answer' => $this->rightanswer);
        }
        
        if (isset($this->randomSeed)){
            $randomseed = $this->randomSeed;
        }else{
            return array('answer' => $correctanswer);
        }        

        $qi = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $correctanswer . ' ' 
                . $this->falsefeedback . ' ' . $this->truefeedback . ' ' . $this->generalfeedback, null, $randomseed+100000);
        //why this second call?
        //$qi = wrsqz_get_question_instance($qi_xml, null, $this);        
        
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();
        $wrap->start();
        $correctanswer = (integer)$qi->instance->getBooleanVariableValue($correctanswer);
        $wrap->stop();        

        return array('answer' => $correctanswer);
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
        $expected = parent::get_expected_data();
        $expected['_sqi'] = PARAM_RAW_TRIMMED;
        return $expected;        
    }    

    public function apply_attempt_state(question_attempt_step $step) {
        $qi_xml = $step->get_qt_var('_qi');
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $qi = $rb->readQuestionInstance($qi_xml);

        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();
        $wrap->start();
        $randomseed = $qi->instance->userData->randomSeed;
        $wrap->stop();

        $this->randomSeed = $randomseed;
    }    
    
}