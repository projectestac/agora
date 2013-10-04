<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
require_once($CFG->dirroot . '/question/type/truefalse/edit_truefalse_form.php');

class qtype_truefalsewiris_edit_form extends qtype_wq_edit_form {

    protected $base;
    
    protected function definition_inner($mform) {
        global $DB, $CFG, $PAGE;
        $PAGE->requires->js('/question/type/truefalsewiris/js/tf.js');
        
        parent::definition_inner($mform);

        //$wirishdr = $mform->createElement('header', 'wirishdr', 'WIRIS variables ');
        $wirishdr = $mform->createElement('header', 'wirishdr', get_string('truefalsewiris_wiris_variables', 'qtype_truefalsewiris'));
        
        $hdr = $mform->createElement('header', 'hdr', '');
        
        $wiristruefalse = $mform->createElement('text', 'wiristruefalse', get_string('truefalsewiris_algorithm', 'qtype_truefalsewiris'), 
                array('class' => 'wirisauthoringfield wirisstudio wirismultichoice wirisvariables wirisauxiliarcas'));
        
        $wiriscorrect = $mform->createElement('text', 'wirisoverrideanswer', get_string('truefalsewiris_correct_answer_variable', 'qtype_truefalsewiris'), array());
        
        if ($CFG->version>=2013051400) { // 2.5+
            $mform->_collapsibleElements['wirishdr']=FALSE;
            $mform->_collapsibleElements['hdr']=FALSE;
        }
        
        $mform->insertElementBefore($wirishdr, 'correctanswer');
        $mform->insertElementBefore($wiristruefalse, 'correctanswer');
        $mform->insertElementBefore($wiriscorrect, 'correctanswer');
        $mform->insertElementBefore($hdr, 'correctanswer');

        $mform->addHelpButton('wirisoverrideanswer', 'truefalsewirisoverrideanswer_identifier', 'qtype_truefalsewiris');        
        
        if (!empty($this->question->id)){
            $wiris = $DB->get_record('qtype_wq', array('question' => $this->question->id));
        }
        if (!empty($wiris)){
            $wiriscorrectvariable = $wiris->options;
        }else{
            $wiriscorrectvariable = '';
        }
        
        $index_elem = $mform->_elementIndex['feedbackfalse'];
        //$mform->_elements[$index_elem]->_label = 'Feedback for the wrong response';
        $mform->_elements[$index_elem]->_label = get_string('truefalsewiris_feedback_wrong_response', 'qtype_truefalsewiris');
                
        $index_elem = $mform->_elementIndex['feedbacktrue'];
        //$mform->_elements[$index_elem]->_label = 'Feedback for the right response';
        $mform->_elements[$index_elem]->_label = get_string('truefalsewiris_feedback_right_response', 'qtype_truefalsewiris');
                
        $default_values = array();
        $default_values['wirisoverrideanswer'] = $wiriscorrectvariable;
        $mform->setDefaults($default_values);
    }

    public function qtype() {
        return 'truefalsewiris';
    }	
	
}
