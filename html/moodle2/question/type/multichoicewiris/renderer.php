<?php
require_once($CFG->dirroot . '/question/type/multichoice/renderer.php');

class qtype_multichoicewiris_single_renderer extends qtype_multichoice_single_renderer {
    
    public function formulation_and_controls(question_attempt $qa,
            question_display_options $options) {
        
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->formulation_and_controls($qa, $options, $this);
    }    

    public function get_input_type(){
        return parent::get_input_type();
    }
    
    public function get_input_name(question_attempt $qa, $value) {
        return parent::get_input_name($qa, $value);
    }
    
    public function get_input_value($value) {
        return parent::get_input_value($value);
    }
    
    public function get_input_id(question_attempt $qa, $value) {
        return parent::get_input_id($qa, $value);
    }    

    public function number_in_style($num, $style){
        return parent::number_in_style($num, $style);
    }
    
    public function prompt(){
        return parent::prompt();
    }
    
    public function feedback_image($fraction, $selected = true) {
        return parent::feedback_image($fraction, $selected);
    }
    
    public function feedback_class($fraction) {
        return parent::feedback_class($fraction);
    }
    
    public function is_right(question_answer $ans) {
        return parent::is_right($ans);
    }
    
    public function specific_feedback(question_attempt $qa) {
        $specific = parent::specific_feedback($qa);
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $specific, 'specificfeedback');
    }    

    protected function general_feedback(question_attempt $qa) {
        //$general_feedback = parent::general_feedback($qa);
        $general_feedback = $qa->get_question()->generalfeedback;
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $general_feedback, 'generalfeedback');
    }    

    protected function hint(question_attempt $qa, question_hint $hint) {
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $hint->hint, 'hint');
    }    
    
    public function correct_response(question_attempt $qa) {
        $correct = parent::correct_response($qa);
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $correct, 'correctresponse');
    }    
    
}


class qtype_multichoicewiris_multi_renderer extends qtype_multichoice_multi_renderer {
    
    public function formulation_and_controls(question_attempt $qa,
            question_display_options $options) {

        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->formulation_and_controls($qa, $options, $this);        
    }

    public function get_input_type(){
        return parent::get_input_type();
    }
    
    public function get_input_name(question_attempt $qa, $value) {
        return parent::get_input_name($qa, $value);
    }
    
    public function get_input_value($value) {
        return parent::get_input_value($value);
    }
    
    public function get_input_id(question_attempt $qa, $value) {
        return parent::get_input_id($qa, $value);
    }    

    public function number_in_style($num, $style){
        return parent::number_in_style($num, $style);
    }
    
    public function prompt(){
        return parent::prompt();
    }
    
    public function feedback_image($fraction, $selected = true) {
        return parent::feedback_image($fraction, $selected);
    }
    
    public function feedback_class($fraction) {
        return parent::feedback_class($fraction);
    }
    
    public function is_right(question_answer $ans) {
        return parent::is_right($ans);
    }    
    
    public function specific_feedback(question_attempt $qa) {
        $specific = parent::specific_feedback($qa);
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $specific, 'specificfeedback');
    }    

    protected function general_feedback(question_attempt $qa) {
        //$general_feedback = parent::general_feedback($qa);
        $general_feedback = $qa->get_question()->generalfeedback;
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $general_feedback, 'generalfeedback');
    }    

    protected function hint(question_attempt $qa, question_hint $hint) {
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $hint->hint, 'hint');
    }        
    
    public function correct_response(question_attempt $qa) {
        $correct = parent::correct_response($qa);
        $multibase = new qtype_multichoicewiris_renderer_base();
        return $multibase->wrsqz_get_filtered_text($qa, $correct, 'correctresponse');
    }    
    
}


class qtype_multichoicewiris_renderer_base {

    public function formulation_and_controls(question_attempt $qa,
            question_display_options $options, $multiwiris) {

        global $DB;
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();

        $question = $qa->get_question();
        
        if (isset($question->parent) && $question->parent > 0){
            $id = $question->parent;
        }else{
            $id = $question->id;
        }        
        $question_xml= $DB->get_record('qtype_wq', array('question' => $id), 'xml')->xml;
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $q = $rb->readQuestion($question_xml);        
        
        $question = $qa->get_question();
        $response = $question->get_response($qa);

        $inputname = $qa->get_qt_field_name('answer');
        $inputattributes = array(
            'type' => $multiwiris->get_input_type(),
            'name' => $inputname,
        );

        $qi_xml = $qa->get_last_qt_var('_qi');        
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);        
        
        $wrap->start();
        if (!$qi->instance->isCacheReady()){
            //We make a new request to the service if plotter images are not cached.
            $correctAnswers = "";
            foreach ($question->answers as $key => $value){
                $correctAnswers .= " " . $value->answer . ' ' . $value->feedback;
            }
            $qi = wrsqz_get_question_instance($qi_xml, 'mathml', $question, $question->questiontext . ' ' . $correctAnswers . ' ' . $question->generalfeedback . 
                ' ' . $question->correctfeedback . ' ' . $question->incorrectfeedback . ' ' . $question->partiallycorrectfeedback);
        }        
        $wrap->stop();
        
        if ($options->readonly) {
            $inputattributes['disabled'] = 'disabled';
        }

        $radiobuttons = array();
        $feedbackimg = array();
        $feedback = array();
        $classes = array();
        foreach ($question->get_order($qa) as $value => $ansid) {
            $ans = $question->answers[$ansid];
            $inputattributes['name'] = $multiwiris->get_input_name($qa, $value);
            $inputattributes['value'] = $multiwiris->get_input_value($value);
            $inputattributes['id'] = $multiwiris->get_input_id($qa, $value);
            $isselected = $question->is_choice_selected($response, $value);
            if ($isselected) {
                $inputattributes['checked'] = 'checked';
            } else {
                unset($inputattributes['checked']);
            }
            $hidden = '';
            if (!$options->readonly && $multiwiris->get_input_type() == 'checkbox') {
                $hidden = html_writer::empty_tag('input', array(
                    'type' => 'hidden',
                    'name' => $inputattributes['name'],
                    'value' => 0,
                ));
            }

            $actualradiobutton = $hidden . html_writer::empty_tag('input', $inputattributes) .
                    html_writer::tag('label',
                        $multiwiris->number_in_style($value, $question->answernumbering) .
                        $question->make_html_inline($ans->answer),
                    array('for' => $inputattributes['id']));
            
            $actualradiobutton = $qi->expandVariables($actualradiobutton);
            $actualradiobutton = $question->format_text($actualradiobutton, FORMAT_HTML, $qa, 'question', 'answer', $ansid);
            
            $radiobuttons[] = $actualradiobutton;
            
            // $options->suppresschoicefeedback is a hack specific to the
            // oumultiresponse question type. It would be good to refactor to
            // avoid refering to it here.
            if ($options->feedback && empty($options->suppresschoicefeedback) &&
                    $isselected && trim($ans->feedback)) {
                $ansfeedback = $ans->feedback;
                $ansfeedback = $qi->expandVariables($ansfeedback);
                $ansfeedback = $question->format_text($ansfeedback, FORMAT_HTML, $qa, 'question', 'ansfeedback', $question->id);
                $feedback[] = html_writer::tag('div', $ansfeedback, array('class' => 'specificfeedback'));                
            } else {
                $feedback[] = '';
            }
            $class = 'r' . ($value % 2);
            if ($options->correctness && $isselected) {
                $feedbackimg[] = $multiwiris->feedback_image($multiwiris->is_right($ans));
                $class .= ' ' . $multiwiris->feedback_class($multiwiris->is_right($ans));
            } else {
                $feedbackimg[] = '';
            }
            $classes[] = $class;
        }
        
        $result = '';
        $result .= html_writer::empty_tag('input', array('class' => 'wirislang', 'type' => 'hidden', 'value' => current_language()));
        $questiontext = $qi->expandVariables($question->questiontext);
        $questiontext = $question->format_text($questiontext, FORMAT_HTML, $qa, 'question', 'questiontext', $question->id);
        $result .= html_writer::tag('div', $questiontext, array('class' => 'qtext'));        
        $result .= html_writer::start_tag('div', array('class' => 'ablock'));
        $result .= html_writer::tag('div', $multiwiris->prompt(), array('class' => 'prompt'));

        $result .= html_writer::start_tag('div', array('class' => 'answer'));
        foreach ($radiobuttons as $key => $radio) {
            $result .= html_writer::tag('div', $radio . ' ' . $feedbackimg[$key] . $feedback[$key],
                    array('class' => $classes[$key])) . "\n";
        }
        $result .= html_writer::end_tag('div'); // answer
        $result .= html_writer::empty_tag('input', array('class' => 'wirisauxiliarcasapplet', 'type' => 'hidden'));
        $result .= html_writer::end_tag('div'); // ablock
        
        $wirisquestionvalue = $q->getStudentQuestion();
        $wirisquestioninputattributes = array(
            'type' => 'hidden',
            'value' => $wirisquestionvalue->serialize(),
            'class' => 'wirisquestion',
        );        
        
        $wirisquestioninput = html_writer::empty_tag('input', $wirisquestioninputattributes);
        $result .= html_writer::tag('div', $wirisquestioninput, array());

        //questioninstance added
        $sqi_xml = $qa->get_last_qt_var('_sqi');
        if ($sqi_xml == '' || $sqi_xml == null){
            $wirisquestioninstancevalue = $qi->getStudentQuestionInstance();
            $sqi_xml = $wirisquestioninstancevalue->serialize();
        }
        
        $sqi_inputname = $qa->get_qt_field_name('_sqi');
        $wirisquestioninstanceattributes = array(
            'type' => 'hidden',
            'value' => $sqi_xml,
            'class' => 'wirisquestioninstance',
            'name' => $sqi_inputname,
            'id' => $sqi_inputname,
        );        
        
        $wirisquestioninstance = html_writer::empty_tag('input', $wirisquestioninstanceattributes);
        $result .= html_writer::tag('div', $wirisquestioninstance, array());
        
        //Add javascript to launch editor and quizzes
        global $PAGE;
        $PAGE->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource', false);        
        
        if ($qa->get_state() == question_state::$invalid) {
            $result .= html_writer::nonempty_tag('div',
                    $question->get_validation_error($qa->get_last_qt_data()),
                    array('class' => 'validationerror'));
        }
        return $result;
    }    
    
    public function wrsqz_get_filtered_text(question_attempt $qa, $text, $type){
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        //$qi = $question->get_question_instance($qi_xml, null);
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $text = $qi->expandVariables($text);
        $text = $question->format_text($text, FORMAT_HTML, $qa, 'question', $type, $question->id);        
        
        return $text;
    }
}
?>
