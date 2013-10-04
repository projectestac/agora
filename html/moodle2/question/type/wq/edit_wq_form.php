<?php
defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/question/type/edit_question_form.php');

class qtype_wq_edit_form extends question_edit_form {

    function __construct($base, $submiturl, $question, $category, $contexts, $formeditable){
        global $DB;
        
        $this->question = $question;
        $this->contexts = $contexts;
        $record = $DB->get_record('question_categories', array('id' => $question->category), 'contextid');
        $this->context = get_context_instance_by_id($record->contextid);
        
        $this->base = &$base;
        $this->_form = &$base->_form;
        $this->definition_inner($this->_form);
    }

    protected function definition_inner($mform) {
        global $DB, $PAGE;

        //$PAGE->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource');
        
        $mform->addElement('hidden', 'wirisquestion[0]', '', array('class' => 'wirisquestion'));
        $mform->addElement('hidden', 'wirislang', current_language(), array('class' => 'wirislang'));
        
        if (!empty($this->question->id)){
            $wiris = $DB->get_record('qtype_wq', array('question' => $this->question->id));
        }
        if (!empty($wiris)){
            //existing question
            $program = $wiris->xml;
        }else{
            //New question
            $program = '<question/>';
        }            
        
        $default_values = array();
        $default_values['wirisquestion[0]'] = $program;
        $mform->setDefaults($default_values);
        $mform->setShowAdvanced(1);

    }

    public function validation($data, $files) {
        return $this->base->validation($data, $files);
    }
    
    public function qtype() {
        return 'wq';
    }
    
    public function data_preprocessing($question){
        return $this->base->data_preprocessing($question);
    }
}
