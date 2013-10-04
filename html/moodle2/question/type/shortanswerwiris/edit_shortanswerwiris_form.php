<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
require_once($CFG->dirroot . '/question/type/shortanswer/edit_shortanswer_form.php');

class qtype_shortanswerwiris_edit_form extends qtype_wq_edit_form {

    protected $base;
    
    protected function definition_inner($mform) {
        global $CFG;

        //require_js(array('http://www.wiris.net/demo/editor/editor'));
        parent::definition_inner($mform);

        $answer = 0;
        $answerhdr = 0;
        $fraction = 0;
        $feedback = 0;
       
        $usecaseValue = $mform->_elementIndex['usecase'];
        $mform->_elements[$usecaseValue]->_label = '';
        $mform->_elements[$usecaseValue]->_attributes['style'] = 'display:none';
        
        if ($CFG->version>=2013051400) { // 2.5+
            global $PAGE;

            // Change page type because is needed by the css
            $PAGE->set_pagetype('question-type-shortanswer');
            
            foreach ($mform->_elementIndex as $key => $value) {
                if (substr($key,0,14) == 'answeroptions[') {
                    $elem = $mform->_elements[$value];
                    foreach ($elem->_elements as $k => $subel) {
                        if ($subel->_type=='text') {
                            // Ad class info in order to be recognized by WIRIS quizzes
                            $subel->_attributes['class'] = 'wirisauthoringfield wirisstudio wirisopenanswer wirisvariables wirisauxiliarcas';
                        }
                    }
                }
            }
        } else {
            //A normal Moodle shortanswer has 3 asnwers and add 3 new answers each time you click 
            //the add answers button.
            //We want and we add only one answer.
            if (isset($mform->_submitValues['answer'])){
                $existingAnswers = count($mform->_submitValues['answer']);    
                $correctSize = $existingAnswers+1;
            }else{
                //When opening the page to edit the question
                $correctSize = $mform->_constantValues['noanswers'] - 2;  
            }

            foreach ($mform->_elementIndex as $key => $value){
                if (substr($key, 0, 7) == 'answer[' && $answer < $correctSize){
                    // Ad class info in order to be recognized by WIRIS quizzes
                    $mform->_elements[$value]->_attributes['class'] = 'wirisauthoringfield wirisstudio wirisopenanswer wirisvariables wirisauxiliarcas';
                    $answer++;
                }else if (substr($key, 0, 7) == 'answer['){
                    $mform->removeElement($key);
                }else if (substr($key, 0, 10) == 'answerhdr[' && $answerhdr < $correctSize){
                    $answerhdr++;
                }else if (substr($key, 0, 10) == 'answerhdr['){
                    $mform->removeElement($key);
                }else if (substr($key, 0, 9) == 'fraction[' && $fraction < $correctSize){
                    $fraction++;
                }else if (substr($key, 0, 9) == 'fraction['){
                    $mform->removeElement($key);
                }else if (substr($key, 0, 9) == 'feedback[' && $feedback < $correctSize){
                    $feedback++;
                }else if (substr($key, 0, 9) == 'feedback['){
                    $mform->removeElement($key);
                }else if ($key == 'addanswers'){
                    //Change the value of addanswers button
                    $mform->_elements[$value]->_attributes['value'] = get_string('shortanswerwiris_addanswers', 'qtype_shortanswerwiris');
                }else if ($key == 'answersinstruct'){
                    $mform->_elements[$value]->_text = get_string('shortanswerwiris_answersinstruct', 'qtype_shortanswerwiris');
                }
            }        
        }
    }

    public function qtype() {
        return 'shortanswerwiris';
    }	
	
}
