<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
require_once($CFG->dirroot . '/question/type/multichoice/edit_multichoice_form.php');


class qtype_multichoicewiris_edit_form extends qtype_wq_edit_form {
    
    protected $base;
    
    protected function definition_inner($mform) {
        global $CFG;
        parent::definition_inner($mform);
        
        $wirismulti = $mform->createElement('text', 'wirismulti', get_string('multichoicewiris_algorithm', 'qtype_multichoicewiris'), 
                array('class' => 'wirisauthoringfield wirisstudio wirismultichoice wirisvariables wirisauxiliarcas'));
        
        //$wirishdr = $mform->createElement('header', 'wirishdr', 'WIRIS variables ');
        $wirishdr = $mform->createElement('header', 'wirishdr', get_string('multichoicewiris_wiris_variables', 'qtype_multichoicewiris'));

        if ($CFG->version>=2013051400) { // 2.5+
            $placeToInsert = 'answerhdr';
            $mform->_collapsibleElements['wirishdr']=FALSE;
        } else {
            $placeToInsert = 'answerhdr[0]';
        }
        $mform->insertElementBefore($wirishdr, $placeToInsert);
        $mform->insertElementBefore($wirismulti, $placeToInsert);        

        //$mform->insertElementBefore($wirishdr, 'answerhdr[0]');
        //$mform->insertElementBefore($wirismulti, 'answerhdr[0]');
    }    
    
    public function qtype() {
        return 'multichoicewiris';
    }	    
    
}

?>
