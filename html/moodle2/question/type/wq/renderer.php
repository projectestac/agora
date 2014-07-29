<?php

class qtype_wq_renderer extends qtype_renderer {
    
    protected $base;
    
    public function __construct(qtype_renderer $base = NULL, moodle_page $page, $target){
        parent::__construct($page, $target);
        $this->base = $base;
    }
    
    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {
        $result = $this->base->formulation_and_controls($qa, $options);
        $this->addJavaScript();
        $result .= html_writer::start_tag('div', array('class' => 'ablock'));
        $result .= $this->lang();
        $result .= $this->auxiliarCas();
        $result .= $this->question($qa);
        $result .= $this->questionInstance($qa);
        $result .= html_writer::end_tag('div');
        return $result;
    }
    
    public function specific_feedback(question_attempt $qa) {
        return $this->base->specific_feedback($qa);
    }
    
    public function correct_response(question_attempt $qa) {
        return $this->base->correct_response($qa);
    }
    
    protected function addJavaScript(){
        //Add javascript to launch editor and quizzes
        $this->page->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource', false);
    }
    protected function question(question_attempt $qa){
        //Add question definition.
        $question = $qa->get_question();
        $wirisquestion = $question->wirisquestion;
        $studentquestion = $wirisquestion->getStudentQuestion();
        $wirisquestionattributes = array(
            'type' => 'hidden',
            'value' => $studentquestion->serialize(),
            'class' => 'wirisquestion',
        );
        return html_writer::empty_tag('input', $wirisquestionattributes);
    }
    protected function questionInstance(question_attempt $qa){
        //Add question instance.
        $xml = $qa->get_last_qt_var('_sqi');
        if (empty($xml)){
            $question = $qa->get_question();
            $sqi = $question->wirisquestioninstance->getStudentQuestionInstance();
            $xml = $sqi->serialize();
        }
        
        $sqi_name = $qa->get_qt_field_name('_sqi');
        $wirisquestioninstanceattributes = array(
            'type' => 'hidden',
            'value' => $xml,
            'class' => 'wirisquestioninstance',
            'name' => $sqi_name,
            'id' => $sqi_name,
        );
        return html_writer::empty_tag('input', $wirisquestioninstanceattributes);
    }
    protected function auxiliarCas(){
        return html_writer::empty_tag('input', array('class' => 'wirisauxiliarcasapplet', 'type' => 'hidden'));
    }
    protected function lang(){
        return html_writer::empty_tag('input', array('class' => 'wirislang', 'type' => 'hidden', 'value' => current_language()));
    }
}