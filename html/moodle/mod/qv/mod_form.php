<?php //$Id: mod_form.php,v 1.4 2009/04/01 10:15:16 sarjona Exp $
require_once ($CFG->dirroot.'/course/moodleform_mod.php');

class mod_qv_mod_form extends moodleform_mod {

    function definition() {

        global $CFG, $COURSE;
        $mform =& $this->_form;

        $strrequired = get_string('required');

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        $mform->addElement('htmleditor', 'description', get_string('description'));
        $mform->setType('description', PARAM_RAW);
        $mform->setHelpButton('description', array('writing', 'questions', 'text'), false, 'editorhelpbutton');

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'header_qv', get_string('header_qv', 'qv'));
        
        $mform->addElement('choosecoursefile', 'assessmenturl', get_string('assessmenturl', 'qv'), array('size'=>'10','courseid'=>$COURSE->id));
        $mform->setHelpButton('assessmenturl', array('qvurl',get_string('assessmenturl', 'qv'), 'qv'), false, 'helpbutton');
        $mform->setDefault('assessmenturl', '');
        $mform->setType('assessmenturl', PARAM_RAW);
        $mform->addRule('assessmenturl', null, 'required', null, 'client');
        
        $options = qv_get_skins();
        $mform->addElement('select', 'skin', get_string('assessmentskin', 'qv'), $options);
        
        $options = qv_get_languages();
        $mform->addElement('select', 'assessmentlang', get_string('assessmentlang', 'qv'), $options);

        $options = array(-1 => get_string('unlimited','qv'), 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 10 => 10);
        $mform->addElement('select', 'maxdeliver', get_string('assessmentmaxdeliver', 'qv'), $options);
        $mform->setDefault('maxdeliver', '-1');
        
        $mform->addElement('text', 'maxgrade', get_string('assessmentmaxgrade', 'qv'), array('size'=>'5'));
        $mform->addRule('maxgrade', null, 'numeric', null, 'client');
        
        $mform->addElement('selectyesno', 'showcorrection', get_string('showcorrection', 'qv'));
        $mform->setDefault('showcorrection', '1');
        
        $mform->addElement('selectyesno', 'showinteraction', get_string('showinteraction', 'qv'));
        $mform->setDefault('showinteraction', '1');
        
        $mform->addElement('selectyesno', 'ordersections', get_string('ordersections', 'qv')); //Albert
        $mform->setHelpButton('ordersections', array('qvorderitems',get_string('ordersections', 'qv'), 'qv'), false, 'helpbutton');
        $mform->setDefault('ordersections', '1');
        
        $mform->addElement('selectyesno', 'orderitems', get_string('orderitems', 'qv')); //Albert
        $mform->setHelpButton('orderitems', array('qvorderitems',get_string('orderitems', 'qv'), 'qv'), false, 'helpbutton');
        $mform->setDefault('orderitems', '1');
   
//-------------------------------------------------------------------------------
        $mform->addElement('header', 'header_target', get_string('header_target', 'qv'));
        
        $options = array('self' => get_string("targetself","qv"), 'blank' => get_string("targetblank","qv"));
        $mform->addElement('select', 'target', get_string('target', 'qv'), $options);
        $mform->setDefault('target', 'blank');
        
        $mform->addElement('text', 'width', get_string('width', 'qv'), array('size'=>'5'));
        $mform->setDefault('width', '100%');
        
        $mform->addElement('text', 'height', get_string('height', 'qv'), array('size'=>'5'));
        $mform->setDefault('height', '400');
        
//print_r($mform->getRegisteredRules());

//-------------------------------------------------------------------------------
        $this->standard_coursemodule_elements();
        // buttons
        $this->add_action_buttons();
    }


}
?>
