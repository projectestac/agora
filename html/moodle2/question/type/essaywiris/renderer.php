<?php
require_once($CFG->dirroot . '/question/type/essay/renderer.php');


class qtype_essaywiris_renderer extends qtype_essay_renderer {

    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {
        
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
        
        $wrap->start();
        $replaceCAS = ($q->question->getImpl()->getLocalData(com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS) == com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_REPLACE_INPUT);
        $wrap->stop();
        
        $responseoutput = $question->get_format_renderer($this->page);

        $files = '';
        if ($question->attachments) {
            if (empty($options->readonly)) {
                $files = $this->files_input($qa, $question->attachments, $options);

            } else {
                $files = $this->files_read_only($qa, $options);
            }
        }

        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);        
        
        $wrap->start();
        if (!$qi->instance->isCacheReady()){
            //We make a new request to the service if plotter images are not cached.
            $qi = wrsqz_get_question_instance($qi_xml, 'mathml', $question, $question->questiontext . ' ' . $question->generalfeedback . ' ' . $question->graderinfo);
        }        
        $wrap->stop();
        
        $questiontext = $qi->expandVariables($question->questiontext);
        $questiontext = $question->format_text($questiontext, FORMAT_HTML, $qa, 'question', 'questiontext', $question->id);        
        
        $result = '';
        $result .= html_writer::empty_tag('input', array('class' => 'wirislang', 'type' => 'hidden', 'value' => current_language()));
        $result .= html_writer::tag('div', $questiontext, array('class' => 'qtext'));
        $result .= html_writer::start_tag('div', array('class' => 'ablock'));
        
        if (!$replaceCAS){
            // Answer field.
            $step = $qa->get_last_step_with_qt_var('answer');
            if (empty($options->readonly)) {
                $answer = $responseoutput->response_area_input('answer', $qa,
                        $step, $question->responsefieldlines, $options->context);

            } else {
                $answer = $responseoutput->response_area_read_only('answer', $qa,
                        $step, $question->responsefieldlines, $options->context);
            }            

            $result .= html_writer::tag('div', $answer, array('class' => 'answer'));
        }else{
            $emptyAnswer = $qa->get_qt_field_name('answer');
            $emptyAnswerattributes = array(
                'type' => 'hidden',
                'value' => '0',
                'name' => $emptyAnswer,
                'id' => $emptyAnswer,
            );        

            $emptyAnswerInput = html_writer::empty_tag('input', $emptyAnswerattributes);
            $result .= html_writer::tag('div', $emptyAnswerInput, array('class' => 'answer'));
        }
        
        $result .= html_writer::empty_tag('input', array('class' => 'wirisauxiliarcasapplet', 'type' => 'hidden'));
        $result .= html_writer::tag('div', $files, array('class' => 'attachments'));
        $result .= html_writer::end_tag('div');
        
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
        
        return $result;
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

?>
