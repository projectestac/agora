<?php
defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/question/type/edit_question_form.php');

class qtype_wq_edit_form extends question_edit_form {
    protected $base;
    
    
    function __construct($base, $submiturl, $question, $category, $contexts, $formeditable){
        //ToDo: remove all but $base function parameters.
        
        // We don't call the parent constructor because we will use the form in 
        // $base. So we don't have to build another one. Just reference some 
        // public properties that may be used and call the definition_inner from
        // this class to add WIRIS quizzes elements.
        
        $this->base = $base;
        $this->question = &$this->base->question;
        $this->contexts = &$this->base->contexts;
        $this->category = &$this->base->category;
        $this->categorycontext = &$this->base->categorycontext;
        $this->context = &$this->base->context;
        $this->editoroptions = &$this->base->editoroptions;
        $this->fileoptions = &$this->base->fileoptions;
        $this->instance = &$this->base->instance;
        $this->_formname = &$this->base->_formname;
        $this->_form = &$this->base->_form;
        $this->_customdata = &$this->base->_customdata;
        $this->_definition_finalized = &$this->base->_definition_finalized;
        
        $this->definition_inner($this->_form);
    }

    protected function definition_inner($mform) {
        global $DB, $PAGE;
        //We don't call base's definition_inner because it has been arleady 
        //called during its construction.
        
        //$PAGE->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource');
        
        $mform->addElement('hidden', 'wirisquestion', '', array('class' => 'wirisquestion'));
        $mform->setType('wirisquestion', PARAM_RAW);
        $mform->addElement('hidden', 'wirislang', current_language(), array('class' => 'wirislang'));
        $mform->setType('wirislang', PARAM_TEXT);
        
        //ToDo: DELETE THIS IF WHEN ALL QUESTIONS ARE WQ!
        if(isset($this->question->wirisquestion)){
            $program = $this->question->wirisquestion->serialize();
        }
        else {
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
        }
        
        $default_values = array();
        $default_values['wirisquestion'] = $program;
        $mform->setDefaults($default_values);
    }
    public function set_data($question) {
        $this->base->set_data($question);
    }
    public function validation($data, $files) {
        return $this->base->validation($data, $files);
    }
    public function data_preprocessing($question){
        return $this->base->data_preprocessing($question);
    }
    public function qtype() {
        return 'wq';
    }
}
