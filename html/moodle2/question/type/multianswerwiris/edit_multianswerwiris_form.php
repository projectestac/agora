<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
require_once($CFG->dirroot . '/question/type/multianswer/edit_multianswer_form.php');


class qtype_multianswerwiris_edit_form extends qtype_wq_edit_form {
    
    protected $base;
    
    protected function definition_inner($mform) {
        global $CFG;
        parent::definition_inner($mform);

        $wirismultianswer = $mform->createElement('text', 'wirismultianswer', get_string('multianswerwiris_algorithm', 'qtype_multianswerwiris'), 
                array('class' => 'wirisauthoringfield wirisstudio wirismultichoice wirisvariables wirisvalidation wirisauxiliarcas'));
        
        $wirishdr = $mform->createElement('header', 'wirishdr', get_string('multianswerwiris_wiris_variables', 'qtype_multianswerwiris'));
 
        if ($CFG->version>=2013051400) { // 2.5+
            $mform->_collapsibleElements['wirishdr']=FALSE;
        }

        $mform->insertElementBefore($wirishdr, 'multitriesheader');
        $mform->insertElementBefore($wirismultianswer, 'multitriesheader');        

    }
    
    public function set_data($question) {
        $this->base->set_data($question);
    }
    
    public function validation($data, $files) {
        return $this->base->validation($data, $files);
    }
    
    public function qtype() {
        return 'multianswerwiris';
    }	    
}
?>
