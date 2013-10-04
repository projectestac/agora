<?php

class qtype_wq_question extends question_definition{

    public function start_attempt(question_attempt_step $step, $variant){
    }

    public function compare_response_with_answer(array $response, question_answer $answer) {
        return self::compare_string_with_wildcard(
                $response['answer'], $answer->answer, !$this->usecase);
    }    
    
    public function get_expected_data() {
        return array('answer' => PARAM_RAW_TRIMMED);
    }

    public function get_renderer(moodle_page $page) {
        return $page->get_renderer($this->qtype->plugin_name());
    }    

    public function get_correct_response(){
        return array();
    }

}