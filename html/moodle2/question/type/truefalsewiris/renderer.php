<?php
require_once($CFG->dirroot . '/question/type/truefalse/renderer.php');

class qtype_truefalsewiris_renderer extends qtype_truefalse_renderer {

    public function formulation_and_controls(question_attempt $qa,
            question_display_options $options) {

        global $DB;
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();
        
        $question = $qa->get_question();
        $response = $qa->get_last_qt_var('answer', '');

        $inputname = $qa->get_qt_field_name('answer');
        
        if (isset($question->parent) && $question->parent > 0){
            $id = $question->parent;
        }else{
            $id = $question->id;
        }        
        $question_xml= $DB->get_record('qtype_wq', array('question' => $id), 'xml')->xml;
        $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $q = $rb->readQuestion($question_xml);        
        
        $trueattributes = array(
            'type' => 'radio',
            'name' => $inputname,
            'value' => 1,
            'id' => $inputname . 'true',
        );
        $falseattributes = array(
            'type' => 'radio',
            'name' => $inputname,
            'value' => 0,
            'id' => $inputname . 'false',
        );

        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        
        $wrap->start();
        if (!$qi->instance->isCacheReady()){
            //We make a new request to the service if plotter images are not cached.
            $correctanswer = $DB->get_record('qtype_wq', array('question' => $question->id), 'options')->options;        
            $qi = wrsqz_get_question_instance($qi_xml, 'mathml', $question, $question->questiontext . ' ' . $correctanswer . ' ' . $question->falsefeedback 
                    . ' ' . $question->truefeedback . ' ' . $question->generalfeedback);            
        }        
        $wrap->stop();
        
        if ($options->readonly) {
            $trueattributes['disabled'] = 'disabled';
            $falseattributes['disabled'] = 'disabled';
        }

        // Work out which radio button to select (if any)
        $truechecked = false;
        $falsechecked = false;
        $responsearray = array();
        if ($response == '1') {
            $trueattributes['checked'] = 'checked';
            $truechecked = true;
            $responsearray = array('answer' => 1);
        } else if ($response == '0') {
            $falseattributes['checked'] = 'checked';
            $falsechecked = true;
            $responsearray = array('answer' => 1);
        }

        // Work out visual feedback for answer correctness.
        $trueclass = '';
        $falseclass = '';
        $truefeedbackimg = '';
        $falsefeedbackimg = '';
        if ($options->correctness) {
            
            $rightanswer = $qa->get_correct_response();
            $rightanswer = $rightanswer['answer'];
            
            if ($truechecked) {
                $trueclass = ' ' . $this->feedback_class((int) $rightanswer);
                $truefeedbackimg = $this->feedback_image((int) $rightanswer);
            } else if ($falsechecked) {
                $falseclass = ' ' . $this->feedback_class((int) (!$rightanswer));
                $falsefeedbackimg = $this->feedback_image((int) (!$rightanswer));
            }
        }

        $radiotrue = html_writer::empty_tag('input', $trueattributes) .
                html_writer::tag('label', get_string('true', 'qtype_truefalse'),
                array('for' => $trueattributes['id']));
        $radiofalse = html_writer::empty_tag('input', $falseattributes) .
                html_writer::tag('label', get_string('false', 'qtype_truefalse'),
                array('for' => $falseattributes['id']));

        $questiontext = $qi->expandVariables($question->questiontext);
        $questiontext = $question->format_text($questiontext, FORMAT_HTML, $qa, 'question', 'questiontext', $question->id);
               
        $result = '';
        $result .= html_writer::empty_tag('input', array('class' => 'wirislang', 'type' => 'hidden', 'value' => current_language()));
        $result .= html_writer::tag('div', $questiontext, array('class' => 'qtext'));

        $result .= html_writer::start_tag('div', array('class' => 'ablock'));
        $result .= html_writer::tag('div', get_string('selectone', 'qtype_truefalse'),
                array('class' => 'prompt'));

        $result .= html_writer::start_tag('div', array('class' => 'answer'));
        $result .= html_writer::tag('div', $radiotrue . ' ' . $truefeedbackimg,
                array('class' => 'r0' . $trueclass));
        $result .= html_writer::tag('div', $radiofalse . ' ' . $falsefeedbackimg,
                array('class' => 'r1' . $falseclass));
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
        $this->page->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource', false);        
        
        if ($qa->get_state() == question_state::$invalid) {
            $result .= html_writer::nonempty_tag('div',
                    $question->get_validation_error($responsearray),
                    array('class' => 'validationerror'));
        }

        return $result;
    }
 
    public function specific_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        $answer = $question->get_correct_response();
        $response = $qa->get_last_qt_var('answer', '');

        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        
        if ($answer['answer'] == $response) {
            $truefeedback = $qi->expandVariables($question->truefeedback);
            return $question->format_text($truefeedback, $question->truefeedbackformat, $qa, 'question', 'answerfeedback', $question->trueanswerid);
        } else{
            $falsefeedback = $qi->expandVariables($question->falsefeedback);
            return $question->format_text($falsefeedback, $question->falsefeedbackformat, $qa, 'question', 'answerfeedback', $question->falseanswerid);
        }
    }    

    public function correct_response(question_attempt $qa) {
        $question = $qa->get_question();
        $answer = $question->get_correct_response();
        
        if ($answer['answer']) {
            return get_string('correctanswertrue', 'qtype_truefalse');
        } else {
            return get_string('correctanswerfalse', 'qtype_truefalse');
        }
    }    
    
    public function general_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $general_feedback = $qa->get_question()->generalfeedback;
        $general_feedback = $qi->expandVariables($general_feedback);

        return $question->format_text($general_feedback, FORMAT_HTML, $qa, 'question', 'generalfeedback', $question->id);
    }
}