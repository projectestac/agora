<?php
require_once($CFG->dirroot . '/question/type/wq/question.php');
require_once($CFG->dirroot . '/question/type/essay/question.php');
require_once($CFG->dirroot . '/question/type/essaywiris/renderer.php');


class qtype_essaywiris_question extends qtype_wq_question implements question_manually_gradable{
    
    //References to moodle's question public properties
    public $responseformat;
    public $responsefieldlines;
    public $attachments;
    public $graderinfo;
    public $graderinfoformat;
    public $responsetemplate;
    public $responsetemplateformat;
    
    public function join_all_text() {
        $text = parent::join_all_text();
        $text .= ' ' . $this->base->responsetemplate . ' ' . $this->base->graderinfo;
        return $text;
    }
    
    public function get_format_renderer(moodle_page $page) {
        if ($this->is_cas_replace_input()) {
            $base_renderer = $page->get_renderer('qtype_essaywiris', 'format_replace_cas');
        }
        else {
            $base_renderer = $this->base->get_format_renderer($page);
        }
        $renderer = new qtype_essaywiris_format_add_cas_renderer($base_renderer);
        return $renderer;
    }
    
    private function is_cas_replace_input() {
        $wrap = com_wiris_system_CallWrapper::getInstance();
        $wrap->start();
        $replace = ($this->wirisquestion->question->getImpl()->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS) == com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_REPLACE_INPUT);
        $wrap->stop();
        return $replace;
    }
    
    public function is_complete_response(array $response) {
        $complete = parent::is_complete_response($response);
        if (!$complete && $this->is_cas_replace_input() && isset($response['_sqi'])) {
           $builder = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
           $sqi = $builder->readQuestionInstance($response['_sqi']);
           $wrap = com_wiris_system_CallWrapper::getInstance();
           $wrap->start();
           $student_cas = $sqi->instance->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_CAS_SESSION);
           $wrap->stop();
           // Note that the $student_cas is null if the student does not update
           // the CAS value even if the CAS has an initial session.
           $complete = !empty($student_cas);
        }
        return $complete;
    }
}
