<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/multianswer/edit_multianswer_form.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libeditform.php');

class question_edit_multianswerwiris_form extends question_edit_multianswer_form {
	function definition() {
		parent::definition();
		$mform = &$this->_form;            
		wrsqz_definition('multianswer', 'wmansprom', $mform);
	}


    //we have to copy & paste the whole function because we have to call
    //wrsqz_qtype_multianswer_extract_question() function instead of
    //qtype_multianswer_extract_question()
	function definition_inner(&$mform) {
		//parent::definition_inner($mform);s
    global $QTYPES;
    //unpatched version of question_type_menu()
        $question_type_names = array();
        foreach($QTYPES as $name => $qtype){
          $menuname = $qtype->menu_name();
          if ($menuname) {
            $question_type_names[$name] = $menuname;
          }
        }

        $mform->addRule('questiontext', null, 'required', null, 'client');

        // Remove meaningless defaultgrade field.
        $mform->removeElement('defaultgrade');

         // display the questions from questiontext;
        if  (  "" != optional_param('questiontext','', PARAM_RAW)) {
            $form = new stdClass;
            $form->questiontext = optional_param('questiontext','', PARAM_RAW);
            $form->hiddenCASValue = optional_param('hiddenCASValue','',PARAM_RAW);
            $this->questiondisplay = fullclone(wrsqz_qtype_multianswer_extract_question($form)) ;
        }else {
            $this->questiondisplay = "";
        }

        if ( isset($this->questiondisplay->options->questions) && is_array($this->questiondisplay->options->questions) ) {
            $countsubquestions =0;
            foreach($this->questiondisplay->options->questions as $subquestion){
                if (!empty($subquestion)){
                   $countsubquestions++;
                }
            }
        } else {
            $countsubquestions =0;
        }

        $mform->addElement('submit', 'analyzequestion', get_string('decodeverifyquestiontext','qtype_multianswer'));
        $mform->registerNoSubmitButton('analyzequestion');

        for ($sub =1;$sub <=$countsubquestions ;$sub++) {
            $this->editas[$sub] =  'unknown type';
            if (isset( $this->questiondisplay->options->questions[$sub]->qtype) ) {
                $this->editas[$sub] =  $this->questiondisplay->options->questions[$sub]->qtype ;
            } else if (optional_param('sub_'.$sub."_".'qtype', '', PARAM_RAW) != '') {
                $this->editas[$sub] = optional_param('sub_'.$sub."_".'qtype', '', PARAM_RAW);
            }
            $mform->addElement('header', 'subhdr', get_string('questionno', 'quiz',
                 '{#'.$sub.'}').'&nbsp;'.$question_type_names[$this->questiondisplay->options->questions[$sub]->qtype]);

            $mform->addElement('static', 'sub_'.$sub."_".'questiontext', get_string('questiondefinition','qtype_multianswer'),array('cols'=>60, 'rows'=>3));

            if (isset ( $this->questiondisplay->options->questions[$sub]->questiontext)) {
                $mform->setDefault('sub_'.$sub."_".'questiontext', $this->questiondisplay->options->questions[$sub]->questiontext);
            }

            $mform->addElement('static', 'sub_'.$sub."_".'defaultgrade', get_string('defaultgrade', 'quiz'));
            $mform->setDefault('sub_'.$sub."_".'defaultgrade',$this->questiondisplay->options->questions[$sub]->defaultgrade);

                if ($this->questiondisplay->options->questions[$sub]->qtype =='shortanswer'   ) {
                    $mform->addElement('static', 'sub_'.$sub."_".'usecase', get_string('casesensitive', 'quiz'));
                }
                if ($this->questiondisplay->options->questions[$sub]->qtype =='multichoice'   ) {
                    $mform->addElement('static', 'sub_'.$sub."_".'layout', get_string('layout', 'qtype_multianswer'),array('cols'=>60, 'rows'=>1)) ;//, $gradeoptions);
                }
            foreach ($this->questiondisplay->options->questions[$sub]->answer as $key =>$ans) {

               $mform->addElement('static', 'sub_'.$sub."_".'answer['.$key.']', get_string('answer', 'quiz'), array('cols'=>60, 'rows'=>1));

                if ($this->questiondisplay->options->questions[$sub]->qtype =='numerical' && $key == 0 ) {
                    $mform->addElement('static', 'sub_'.$sub."_".'tolerance['.$key.']', get_string('acceptederror', 'quiz')) ;//, $gradeoptions);
                }

                $mform->addElement('static', 'sub_'.$sub."_".'fraction['.$key.']', get_string('grade')) ;//, $gradeoptions);

                $mform->addElement('static', 'sub_'.$sub."_".'feedback['.$key.']', get_string('feedback', 'quiz'));
            }

        }
        
		wrsqz_definition_inner('multianswer', 'wmansprom', $mform);
	}

	function set_data(&$question) {
		$mform = &$this->_form;
		wrsqz_set_data('multianswer', 'wmansprom', $mform, $question);

        if (isset($question->options->questions) && is_array($question->options->questions)){
            foreach($question->options->questions as $key=>$wrapped){
                if(substr($wrapped->qtype, -5)=='wiris'){
                    $wrapped->qtype = substr($wrapped->qtype, 0, -5);
                }
            }
        }
        
		$result=parent::set_data($question);

        if (isset($question->options->questions) && is_array($question->options->questions)){
            foreach($question->options->questions as $key=>$wrapped){
              if(!empty($wrapped)){
                if(($wrapped->qtype == 'shortanswer' || $wrapped->qtype == 'multichoice')
                    && strpos($wrapped->questiontext,'#')!==false){  //Perhaps we should change '#' by '\#'
                    $wrapped->qtype .= 'wiris';
                }
                $question->options->questions[$key] = $wrapped;
              }
            }
        }
        return $result;
	}
	
	function qtype() {
		return 'multianswerwiris';
	}

}
?>