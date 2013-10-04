<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
require_once($CFG->dirroot . '/question/type/essay/edit_essay_form.php');


class qtype_essaywiris_edit_form extends qtype_wq_edit_form {
    
    protected $base;
    
    protected function definition_inner($mform) {
        global $CFG;
        parent::definition_inner($mform);

        $wirisessay = $mform->createElement('text', 'wirisessay', get_string('essaywiris_algorithm', 'qtype_essaywiris'), 
                array('class' => 'wirisauthoringfield wirisstudio wirisessay wirisvariables wirisauxiliarcas'));
        
        $wirishdr = $mform->createElement('header', 'wirishdr', get_string('essaywiris_wiris_variables', 'qtype_essaywiris'));
        
        if ($CFG->version>=2013051400) { // 2.5+
            $mform->_collapsibleElements['wirishdr']=FALSE;
        }

        if ($mform->elementExists('tagsheader')){
            $mform->insertElementBefore($wirishdr, 'tagsheader');
            $mform->insertElementBefore($wirisessay, 'tagsheader');        
        }else{
            $mform->insertElementBefore($wirishdr, 'buttonar');
            $mform->insertElementBefore($wirisessay, 'buttonar');        
        }

    }    
    
    public function qtype() {
        return 'essaywiris';
    }	    

}


?>
