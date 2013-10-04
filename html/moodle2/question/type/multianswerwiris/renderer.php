<?php
require_once($CFG->dirroot . '/question/type/multianswer/renderer.php');

class qtype_multianswerwiris_renderer extends qtype_multianswer_renderer {

    public function formulation_and_controls(question_attempt $qa,
            question_display_options $options) {

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
        
        $output = '';
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);        
        
        $wrap->start();
        if (!$qi->instance->isCacheReady()){
            //We make a new request to the service if plotter images are not cached.
            $sub = '';
            $subgenfeed = '';
            $subcorrectfeed = '';
            $subincorrectfeed = '';
            $subpartcorrectfeed = '';
            foreach($question->subquestions as $key => $value){
                $sub .= $question->subquestions[$key]->questiontext . ' ';
                $subgenfeed .= $question->subquestions[$key]->generalfeedback . ' ';
                $class = get_class($question->subquestions[$key]->qtype);
                if ($class == 'qtype_multichoicewiris'){
                    $subcorrectfeed .= $question->subquestions[$key]->correctfeedback . ' ';
                    $subincorrectfeed .= $question->subquestions[$key]->incorrectfeedback . ' ';
                    $subpartcorrectfeed .= $question->subquestions[$key]->partiallycorrectfeedback . ' ';
                }
            }

            $qi = wrsqz_get_question_instance($qi_xml, 'mathml', $question, $question->questiontext . ' ' . $sub . ' ' . $question->generalfeedback . ' ' .
                    $subgenfeed . ' ' . $subcorrectfeed . ' ' . $subincorrectfeed . ' ' . $subpartcorrectfeed);
        }      
        $wrap->stop();
        
        foreach ($question->textfragments as $i => $fragment) {
            if ($i > 0) {
                $index = $question->places[$i];
                $output .= $this->subquestion($qa, $options, $index,
                        $question->subquestions[$index]);
            }
            $fragment = $qi->expandVariables($fragment);
            $output .= $question->format_text($fragment, $question->questiontextformat,
                    $qa, 'question', 'questiontext', $question->id);
        }

        $output .= html_writer::empty_tag('input', array('class' => 'wirisauxiliarcasapplet', 'type' => 'hidden'));

        $wirisquestionvalue = $q->getStudentQuestion();
        $wirisquestioninputattributes = array(
            'type' => 'hidden',
            'value' => $wirisquestionvalue->serialize(),
            'class' => 'wirisquestion',
        );        
        
        $wirisquestioninput = html_writer::empty_tag('input', $wirisquestioninputattributes);
        $output .= html_writer::tag('div', $wirisquestioninput, array());

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
        $output .= html_writer::tag('div', $wirisquestioninstance, array());
        
        //Add javascript to launch editor and quizzes
        $this->page->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource', false);        
        
        $this->page->requires->js_init_call('M.qtype_multianswerwiris.init',
                array('#q' . $qa->get_slot()), false, array(
                    'name'     => 'qtype_multianswerwiris',
                    'fullpath' => '/question/type/multianswerwiris/module.js',
                    'requires' => array('base', 'node', 'event', 'overlay'),
                ));

        return $output;
    }    

    
    public function subquestion(question_attempt $qa,
            question_display_options $options, $index, question_graded_automatically $subq) {

        $subtype = $subq->qtype->name();
        if ($subtype == 'shortanswerwiris') {
            $subrenderer = 'textfield';
        } else if ($subtype == 'multichoicewiris') {
            if ($subq->layout == qtype_multichoice_base::LAYOUT_DROPDOWN) {
                $subrenderer = 'multichoice_inline';
            } else if ($subq->layout == qtype_multichoice_base::LAYOUT_HORIZONTAL) {
                $subrenderer = 'multichoice_horizontal';
            } else {
                $subrenderer = 'multichoice_vertical';
            }
        } else if ($subtype == 'numerical'|| $subtype == 'shortanswer') {
            $renderer = $this->page->get_renderer('qtype_multianswer', 'textfield');
            return $renderer->subquestion($qa, $options, $index, $subq);
        } else if ($subtype == 'multichoice'){
            if ($subq->layout == qtype_multichoice_base::LAYOUT_DROPDOWN) {
                $subrenderer = 'multichoice_inline';
            } else if ($subq->layout == qtype_multichoice_base::LAYOUT_HORIZONTAL) {
                $subrenderer = 'multichoice_horizontal';
            } else {
                $subrenderer = 'multichoice_vertical';
            }
            $renderer = $this->page->get_renderer('qtype_multianswer', $subrenderer);
            return $renderer->subquestion($qa, $options, $index, $subq);
        }else {
            throw new coding_exception('Unexpected subquestion type.', $subq);
        }
        $renderer = $this->page->get_renderer('qtype_multianswerwiris', $subrenderer);
        return $renderer->subquestion($qa, $options, $index, $subq);
    }    

    protected function general_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $general_feedback = $qa->get_question()->generalfeedback;
        $general_feedback = $qi->expandVariables($general_feedback);
        $general_feedback = $question->format_text($general_feedback, FORMAT_HTML, $qa, 'question', 'generalfeedback', $question->id);
        return $general_feedback;        
    }    
    
    protected function hint(question_attempt $qa, question_hint $hint) {
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        $hintString = $qi->expandVariables($hint->hint);        
        return html_writer::nonempty_tag('div', $question->format_text($hintString, FORMAT_HTML, $qa, 'question', 'hint', $hint->id), array('class' => 'hint'));
    }

}
    

class qtype_multianswerwiris_textfield_renderer extends qtype_multianswer_textfield_renderer {

    public function subquestion(question_attempt $qa, question_display_options $options,
            $index, question_graded_automatically $subq) {

        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);
        
        $fieldprefix = 'sub' . $index . '_';
        $fieldname = $fieldprefix . 'answer';

        $response = $qa->get_last_qt_var($fieldname);
        
        if ($subq->qtype->name() == 'shortanswerwiris') {
            $matchinganswer = $subq->get_matching_answer(array('answer' => $response));
        } else if ($subq->qtype->name() == 'numerical') {
            $matchinganswer = $subq->get_matching_answer($response, 1);
        } else {
            $matchinganswer = $subq->get_matching_answer($response);
        }

        if (!$matchinganswer) {
            $matchinganswer = new question_answer(0, '', null, '', FORMAT_HTML);
        }        
        
        // Work out a good input field size.
        $size = max(1, strlen(trim($response)) + 1);
        foreach ($subq->answers as $ans) {
            $size = max($size, strlen(trim($ans->answer)));
        }
        $size = min(60, round($size + rand(0, $size*0.15)));
        // The rand bit is to make guessing harder

        $inputattributes = array(
            'type' => 'text',
            'name' => $qa->get_qt_field_name($fieldname),
            'value' => $response,
            'id' => $qa->get_qt_field_name($fieldname),
            'size' => $size,
        );
        if ($options->readonly) {
            $inputattributes['readonly'] = 'readonly';
        }

        $feedbackimg = '';
        if ($options->correctness) {
            $inputattributes['class'] = $this->feedback_class($matchinganswer->fraction);
            $feedbackimg = $this->feedback_image($matchinganswer->fraction);
        }

        if ($subq->qtype->name() == 'shortanswerwiris') {
            //$correctanswer = $subq->get_matching_answer($subq->get_correct_response());
            $correctanswer = $subq->get_correct_response();
        } else {
            $correctanswer = $subq->get_correct_answer();
        }

        $subfeedback = $qi->expandVariables($matchinganswer->feedback);
          
        $feedbackpopup = $this->feedback_popup($subq, $matchinganswer->fraction, $subq->format_text($subfeedback, $matchinganswer->feedbackformat,
                        $qa, 'question', 'answerfeedback', $subq->id), s($correctanswer['answer']), $options);

        $output = html_writer::start_tag('span', array('class' => 'subquestion'));
        $output .= html_writer::tag('label', get_string('answer'),
                array('class' => 'subq accesshide', 'for' => $inputattributes['id']));
        $output .= html_writer::empty_tag('input', $inputattributes);
        $output .= $feedbackimg;
        $output .= $feedbackpopup;
        $output .= html_writer::end_tag('span');        
        
        return $output;
    }
}

class qtype_multianswerwiris_multichoice_inline_renderer extends qtype_multianswer_multichoice_inline_renderer {
    
    public function subquestion(question_attempt $qa, question_display_options $options,
            $index, question_graded_automatically $subq) {

        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);        
        
        $fieldprefix = 'sub' . $index . '_';
        $fieldname = $fieldprefix . 'answer';

        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');        
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);        
        
        $response = $qa->get_last_qt_var($fieldname);
        $choices = array();
        $matchinganswer = new question_answer(0, '', null, '', FORMAT_HTML);
        $rightanswer = null;
        
        foreach ($subq->get_order($qa) as $value => $ansid) {
            $ans = $subq->answers[$ansid];
            $answer = $qi->expandVariablesText($ans->answer);
            $choices[$value] = $subq->format_text($answer, $ans->answerformat,
                    $qa, 'question', 'answer', $ansid);
            if ($subq->is_choice_selected($response, $value)) {
                $matchinganswer = $ans;
            }
        }

        $inputattributes = array(
            'id' => $qa->get_qt_field_name($fieldname),
        );
        if ($options->readonly) {
            $inputattributes['disabled'] = 'disabled';
        }

        $feedbackimg = '';
        if ($options->correctness) {
            $inputattributes['class'] = $this->feedback_class($matchinganswer->fraction);
            $feedbackimg = $this->feedback_image($matchinganswer->fraction);
        }

        $select = html_writer::select($choices, $qa->get_qt_field_name($fieldname),
                $response, array('' => ''), $inputattributes);

        $order = $subq->get_order($qa);
        $correct = $subq->get_correct_response();
        $rightanswer = $subq->answers[$order[reset($correct)]];

        $rightanswerExpand = $qi->expandVariables($rightanswer->answer);   
        $subfeedback = $qi->expandVariables($matchinganswer->feedback);
        
        $feedbackpopup = $this->feedback_popup($subq, $matchinganswer->fraction,
                $subq->format_text($subfeedback, $matchinganswer->feedbackformat,
                        $qa, 'question', 'answerfeedback', $matchinganswer->id),
                $subq->format_text($rightanswerExpand, $rightanswer->answerformat,
                        $qa, 'question', 'answer', $rightanswer->id), $options);

        $output = html_writer::start_tag('span', array('class' => 'subquestion'));
        $output .= html_writer::tag('label', get_string('answer'),
                array('class' => 'subq accesshide', 'for' => $inputattributes['id']));
        $output .= $select;
        $output .= $feedbackimg;
        $output .= $feedbackpopup;
        $output .= html_writer::end_tag('span');        
        
        return $output;
    }
    
}

class qtype_multianswerwiris_multichoice_vertical_renderer extends qtype_multianswer_multichoice_vertical_renderer {
    
    public function subquestion(question_attempt $qa, question_display_options $options,
            $index, question_graded_automatically $subq) {

        $fieldprefix = 'sub' . $index . '_';
        $fieldname = $fieldprefix . 'answer';
        $response = $qa->get_last_qt_var($fieldname);

        $inputattributes = array(
            'type' => 'radio',
            'name' => $qa->get_qt_field_name($fieldname),
        );
        
        $question = $qa->get_question();
        $qi_xml = $qa->get_last_qt_var('_qi');        
        $qi = wrsqz_get_question_instance($qi_xml, null, $question);        

        if ($options->readonly) {
            $inputattributes['disabled'] = 'disabled';
        }

        $result = $this->all_choices_wrapper_start();
        $fraction = null;
        foreach ($subq->get_order($qa) as $value => $ansid) {
            $ans = $subq->answers[$ansid];

            $inputattributes['value'] = $value;
            $inputattributes['id'] = $inputattributes['name'] . $value;

            $isselected = $subq->is_choice_selected($response, $value);
            if ($isselected) {
                $inputattributes['checked'] = 'checked';
                $fraction = $ans->fraction;
            } else {
                unset($inputattributes['checked']);
            }

            $class = 'r' . ($value % 2);
            if ($options->correctness && $isselected) {
                $feedbackimg = $this->feedback_image($ans->fraction);
                $class .= ' ' . $this->feedback_class($ans->fraction);
            } else {
                $feedbackimg = '';
            }

            $result .= $this->choice_wrapper_start($class);
            $result .= html_writer::empty_tag('input', $inputattributes);
            
            $answer = $qi->expandVariables($ans->answer);
            
            $result .= html_writer::tag('label', $subq->format_text($answer,
                    FORMAT_HTML, $qa, 'question', 'answer', $ansid),
                    array('for' => $inputattributes['id']));            
            
            $result .= $feedbackimg;

            if ($options->feedback && $isselected && trim($ans->feedback)) {
                $feedback = $qi->expandVariables($ans->feedback);
                $result .= html_writer::tag('div',
                        $subq->format_text($feedback, $ans->feedbackformat,
                                $qa, 'question', 'answerfeedback', $ansid),
                        array('class' => 'specificfeedback'));
            }

            $result .= $this->choice_wrapper_end();
        }

        $result .= $this->all_choices_wrapper_end();

        if ($options->feedback && $options->marks >= question_display_options::MARK_AND_MAX &&
                $subq->maxmark > 0) {
            $a = new stdClass();
            $a->mark = format_float($fraction * $subq->maxmark, $options->markdp);
            $a->max =  format_float($subq->maxmark, $options->markdp);

            $result .= html_writer::tag('div', get_string('markoutofmax', 'question', $a),
                    array('class' => 'outcome'));
        }

        return $result;
    }
    
}


class qtype_multianswerwiris_multichoice_horizontal_renderer extends qtype_multianswerwiris_multichoice_vertical_renderer {
    
    protected function choice_wrapper_start($class) {
        return html_writer::start_tag('td', array('class' => $class));
    }

    protected function choice_wrapper_end() {
        return html_writer::end_tag('td');
    }

    protected function all_choices_wrapper_start() {
        return html_writer::start_tag('table', array('class' => 'answer')) .
                html_writer::start_tag('tbody') . html_writer::start_tag('tr');
    }

    protected function all_choices_wrapper_end() {
        return html_writer::end_tag('tr') . html_writer::end_tag('tbody') .
                html_writer::end_tag('table');
    }
}

    
?>
