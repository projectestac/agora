<?php
require_once($CFG->dirroot . '/question/type/wq/renderer.php');
require_once($CFG->dirroot . '/question/type/essay/renderer.php');


class qtype_essaywiris_renderer extends qtype_wq_renderer {
    public function __construct(moodle_page $page, $target){
        parent::__construct(new qtype_essay_renderer($page, $target), $page, $target);
    }
    
    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {
        $result = $this->base->formulation_and_controls($qa, $options);
        //Add hidden WIRIS quizzes fields.
        $result .= $this->lang();
        $result .= $this->question($qa);
        $result .= $this->questionInstance($qa);
        $this->addJavaScript();
        
        return $result;
    }
    
}

class qtype_essaywiris_format_add_cas_renderer {
    private $base;
    
    public function __construct(plugin_renderer_base $base) {
        $this->base = $base;
    }
    public function response_area_read_only($name, question_attempt $qa,
        question_attempt_step $step, $lines, $context){
        $result = $this->auxiliarCas();
        $result .= $this->base->response_area_read_only($name, $qa, $step, $lines, $context);
        return $result;
    }
    public function response_area_input($name, question_attempt $qa,
            question_attempt_step $step, $lines, $context){
        $result = $this->auxiliarCas();
        $result .= $this->base->response_area_input($name, $qa, $step, $lines, $context);
        return $result;
    }
    protected function auxiliarCas(){
        //Warning: this function is repeated in qtype_wq_renderer. It could be static and reused.
        return html_writer::empty_tag('input', array('class' => 'wirisauxiliarcasapplet', 'type' => 'hidden'));
    }
}

/**
 * Output a hidden and empty input for answer field so the auxiliar CAS is the
 * only input field.
 * **/
class qtype_essaywiris_format_replace_cas_renderer extends plugin_renderer_base {

    public function response_area_read_only($name, question_attempt $qa,
        question_attempt_step $step, $lines, $context){
        return $this->response_area_input($name, $qa, $step, $lines, $context);
    }

    public function response_area_input($name, question_attempt $qa,
            question_attempt_step $step, $lines, $context){
        $name = $qa->get_qt_field_name('answer');
        $atts = array(
            'type' => 'hidden',
            'value' => '',
            'name' => $name,
            'id' => $name,
        );        
        $empty = html_writer::empty_tag('input', $atts);
        return $empty;
    }

    protected function class_name(){
        return 'qtype_essaywiris_format_replace_cas_renderer';
    }
}

