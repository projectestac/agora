<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
require_once($CFG->dirroot . '/question/type/match/edit_match_form.php');

class qtype_matchwiris_edit_form extends qtype_wq_edit_form {
    
    protected $base;
    
    protected function definition_inner($mform) {
        global $CFG;
        parent::definition_inner($mform);

        $wirismatch = $mform->createElement('text', 'wirismatch', get_string('matchwiris_algorithm', 'qtype_matchwiris'), 
                array('class' => 'wirisauthoringfield wirisstudio wirismultichoice wirisvariables wirisauxiliarcas'));
        
        $wirishdr = $mform->createElement('header', 'wirishdr', get_string('matchwiris_wiris_variables', 'qtype_matchwiris'));
        
        if ($CFG->version>=2013051400) { // 2.5+
            $placeToInsert = 'answerhdr';
            $mform->_collapsibleElements['wirishdr']=FALSE;
        } else {
            $placeToInsert = 'answerhdr[0]';
        }
        $mform->insertElementBefore($wirishdr, $placeToInsert);
        $mform->insertElementBefore($wirismatch, $placeToInsert);        
                
    }    
    
    public function qtype() {
        return 'matchwiris';
    }	    
}

?>
