<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/shortanswer/questiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libquestiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/deprecated.php');

class question_shortanswerwiris_qtype extends question_shortanswer_qtype {
	function name() {
		return 'shortanswerwiris';
	}
	
	function create_session_and_responses(&$question, &$state, $cmoptions, $attempt) {
		parent::create_session_and_responses($question, $state, $cmoptions, $attempt);
		return wrsqz_create_session_and_responses('shortanswer', 'wshanprom', $question, $state, $cmoptions, $attempt);
	}
	
	function restore_session_and_responses(&$question, &$state) {
		$values = wrsqz_restore_session_and_responses_1('shortanswer', 'wshanprom', $question, $state);
		$toReturn = parent::restore_session_and_responses($question, $state);
		wrsqz_restore_session_and_responses_2('shortanswer', 'wshanprom', $values, $question, $state);
		
		return  $toReturn;
	}
	
	function save_session_and_responses(&$question, &$state) {
		return wrsqz_save_session_and_responses('shortanswer', 'wshanprom', $question, $state);
	}
	
	function get_question_options(&$question) {
		if (parent::get_question_options($question)) {
			return wrsqz_get_question_options('shortanswer', 'wshanprom', $question);
		}
		
		return false;
	}

	function save_question($question, $form, $course){
    wrsqz_presave_question('shortanswer', 'wshanprom', $question, $form, $course);
    return parent::save_question($question, $form, $course);
  }

	function save_question_options($question) {
		if(parent::save_question_options($question) !== false) {
			return wrsqz_save_question_options('shortanswer', 'wshanprom', $question);
		}
		
		return false;
	}
	
	function print_question(&$question, &$state, $number, $cmoptions, $options) {
		wrsqz_print_question('shortanswer', 'wshanprom', $question, $state, $number, $cmoptions, $options);
		return parent::print_question($question, $state, $number, $cmoptions, $options);
	}
	
	function delete_question($questionid) {
		if (!wrsqz_delete_question('shortanswer', 'wshanprom', $questionid)) {
			return false;
		}
		
		return parent::delete_question($questionid);
	}
	
	function print_question_formulation_and_controls(&$question, &$state, $cmoptions, $options) {
    wrsqz_swap('shortanswer', 'wshanprom', $question, $state);
    wrsqz_print_question_formulation_and_controls('shortanswer', 'wshanprom', $question, $state, $cmoptions, $options);
		return true;
	}
	
	function grade_responses(&$question, &$state, $cmoptions) {		
		wrsqz_swap('shortanswer', 'wshanprom', $question, $state);
		
		if (wrsqz_grade_responses('shortanswer', 'wshanprom', $question, $state, $cmoptions)) {
			return parent::grade_responses($question, $state, $cmoptions);
		}
		
		return true;
	}
    function response_summary($question, $state, $length=80){
        return wrsqz_response_summary('shortanswer', 'wshanprom', $question, $state, $length);
    }
	function get_correct_responses(&$question, &$state) {
		wrsqz_swap('shortanswer', 'wshanprom', $question, $state);
		return wrsqz_get_correct_responses('shortanswer', 'wshanprom', null, $question, $state);
	}
	
	function backup($bf, $preferences, $question, $level = 6) {
        //check availability of functions
        if(!(method_exists($this,"extra_question_fields"))){
            $extra_question_fields = wrsqz_deprecated_extra_question_fields('shortanswer');
        }else{
            $extra_question_fields = $this->extra_question_fields();
        }
        if(!(method_exists($this,"questionid_column_name"))){
            $question_id_column_name = wrsqz_deprecated_question_id_column_name('shortanswer');
        }else{
            $question_id_column_name = $this->questionid_column_name();
        }
        //in shortanswerwiris we do not call parent.
        return wrsqz_backup('shortanswer', 'wshanprom', $bf, $preferences, $question, $level, $extra_question_fields, $question_id_column_name);
    }
	
	function restore($old_question_id, $new_question_id, $info, $restore) {
        //We have to modify info structure before the parent class can restore from it.
        wrsqz_restore_1('shortanswer', 'wshanprom', $old_question_id, $new_question_id, $info, $restore);
		if (parent::restore($old_question_id, $new_question_id, $info, $restore) !== false) {
			return wrsqz_restore('shortanswer', 'wshanprom', $old_question_id, $new_question_id, $info,$restore);
		}
		
		return false;
	}

	function restore_recode_answer($state, $restore) {
                $info = wrsqz_restore_recode_answer_1('shortanswer', 'wshanprom',$state,$restore);
                $answers = parent::restore_recode_answer($state, $restore);
                return wrsqz_restore_recode_answer_2('shortanswer', 'wshanprom', $info, $answers, $state, $restore);
	}
	
	function export_to_xml($question, $format, $extra = null) {
		return wrsqz_export_to_xml('shortanswer', 'wshanprom', $question, $format, $extra);
	}
	
	function import_from_xml($data, $question, $format, $extra = null) {
		return wrsqz_import_from_xml('shortanswer', 'wshanprom', $data, $question, $format, $extra);
	}
	/*Deprecated*/
	function print_question_form_end($question, $submitscript = '', $hiddenfields = '') {
		wrsqz_print_question_form_end('shortanswer', 'wshanprom', $question, $submitscript, $hiddenfields);
		parent::print_question_form_end($question, $submitscript, $hiddenfields);
	}
	
    function compare_responses($question, $state, $teststate) {
    	if (!parent::compare_responses($question, $state, $teststate)) return false;
    	
        if (isset($state->responses['wirisCASHidden']) XOR isset($teststate->responses['wirisCASHidden'])){
            return false;
        } else if(isset($state->responses['wirisCASHidden']) && isset($teststate->responses['wirisCASHidden'])){
            return ($state->responses['wirisCASHidden'] == $teststate->responses['wirisCASHidden']);
        } else{
            return true;
        }
    }	
	
	function print_question_grading_details(&$question, &$state, $cmoptions, $options) {
		return wrsqz_print_question_grading_details('shortanswer', 'wshanprom', $question, $state, $cmoptions, $options);
	}

    function display_question_editing_page(&$mform, $question, $wizardnow){
        return wrsqz_display_question_editing_page('shortanswer', 'wshanprom',$mform, $question, $wizardnow);
    }
}


global $QTYPES;
if (function_exists('question_register_questiontype')) {
	question_register_questiontype(new question_shortanswerwiris_qtype());
}
else {
	$QTYPES['shortanswerwiris'] = new question_shortanswerwiris_qtype();
    $QTYPE_MENU['shortanswerwiris'] = 'shortanswerwiris';
}

?>