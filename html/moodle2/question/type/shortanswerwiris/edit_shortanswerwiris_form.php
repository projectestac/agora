<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
require_once($CFG->dirroot . '/question/type/shortanswer/edit_shortanswer_form.php');

class qtype_shortanswerwiris_edit_form extends qtype_wq_edit_form {
    
    protected function definition_inner($mform) {
        global $CFG;

        parent::definition_inner($mform);
       
        //Hide usecase field
        $usecaseValue = $mform->_elementIndex['usecase'];
        $mform->_elements[$usecaseValue]->_label = '';
        $mform->_elements[$usecaseValue]->_attributes['style'] = 'display:none';
        // Change Correct Answers instructions.
        $mform->getElement('answersinstruct')->setValue(get_string('filloutoneanswer', 'qtype_shortanswerwiris'));
        
        if ($CFG->version>=2013051400) { // 2.5+
            global $PAGE;

            // Change page type because is needed by the css
            $PAGE->set_pagetype('question-type-shortanswer');
            
            foreach ($mform->_elementIndex as $key => $value) {
                if (substr($key,0,14) == 'answeroptions[') {
                    $elem = $mform->_elements[$value];
                    foreach ($elem->_elements as $k => $subel) {
                        if ($subel->_type=='text') {
                            // Add class info in order to be recognized by WIRIS quizzes
                            $subel->_attributes['class'] = 'wirisauthoringfield wirisstudio wirisopenanswer wirisvariables wirisauxiliarcas wirisgradingfunction';
                        }
                    }
                }
            }
        } else {
            foreach ($mform->_elementIndex as $key => $value){
                if (substr($key, 0, 7) == 'answer[') {
                    $mform->_elements[$value]->_attributes['class'] = 'wirisauthoringfield wirisstudio wirisopenanswer wirisvariables wirisauxiliarcas wirisgradingfunction';
                }
            }
        }
    }

    public function qtype() {
        return 'shortanswerwiris';
    }	
	
}

class qtype_shortanswerwiris_helper_edit_form extends qtype_shortanswer_edit_form {
    protected function get_more_choices_string() {
        return get_string('shortanswerwiris_addanswers', 'qtype_shortanswerwiris');
    }
    protected function add_per_answer_fields(&$mform, $label, $gradeoptions,
            $minoptions = QUESTION_NUMANS_START, $addoptions = QUESTION_NUMANS_ADD) {
        return parent::add_per_answer_fields($mform, $label, $gradeoptions, 1, 1);
    }
}
