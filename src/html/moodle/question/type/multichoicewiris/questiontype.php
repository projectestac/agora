<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/multichoice/questiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libquestiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/deprecated.php');

class question_multichoicewiris_qtype extends question_multichoice_qtype {
	function name() {
		return 'multichoicewiris';
	}
	
	function create_session_and_responses(&$question, &$state, $cmoptions, $attempt) {
		parent::create_session_and_responses($question, $state, $cmoptions, $attempt);
		return wrsqz_create_session_and_responses('multichoice', 'wmultiprom', $question, $state, $cmoptions, $attempt);
	}
	
	function restore_session_and_responses(&$question, &$state) {
		$values = wrsqz_restore_session_and_responses_1('multichoice', 'wmultiprom', $question, $state);
		$toReturn = parent::restore_session_and_responses($question, $state);
		wrsqz_restore_session_and_responses_2('multichoice', 'wmultiprom', $values, $question, $state);
		
		return  $toReturn;
	}
	
	function save_session_and_responses(&$question, &$state) {
		return wrsqz_save_session_and_responses('multichoice', 'wmultiprom', $question, $state);
	}
	
	function get_question_options(&$question) {
		if (parent::get_question_options($question)) {
			return wrsqz_get_question_options('multichoice', 'wmultiprom', $question);
		}
		
		return false;
	}

	function save_question($question, $form, $course){
    wrsqz_presave_question('multichoice', 'wmultiprom', $question, $form, $course);
    return parent::save_question($question, $form, $course);
  }
	function save_question_options($question) {
		if(parent::save_question_options($question) !== false) {
			return wrsqz_save_question_options('multichoice', 'wmultiprom', $question);
		}
		return false;
	}
	
	function print_question(&$question, &$state, $number, $cmoptions, $options) {
		wrsqz_print_question('multichoice', 'wmultiprom', $question, $state, $number, $cmoptions, $options);
		return parent::print_question($question, $state, $number, $cmoptions, $options);
	}
	
	function delete_question($questionid) {
		if (!wrsqz_delete_question('multichoice', 'wmultiprom', $questionid)) {
			return false;
		}
		
		return parent::delete_question($questionid);
	}
	
	function print_question_formulation_and_controls(&$question, &$state, $cmoptions, $options) {
		wrsqz_swap('multichoice', 'wmultiprom', $question, $state);
    wrsqz_print_question_formulation_and_controls('multichoice', 'wmultiprom', $question, $state, $cmoptions, $options);
    return true;
	}
	
	function grade_responses(&$question, &$state, $cmoptions) {		
		wrsqz_swap('multichoice', 'wmultiprom', $question, $state);
		wrsqz_hideCASSession('multichoice', 'wmultiprom', $question, $state);
		if (wrsqz_grade_responses('multichoice', 'wmultiprom', $question, $state, $cmoptions)) {
			$toreturn = parent::grade_responses($question, $state, $cmoptions);
		}
		wrsqz_restoreCASSession('multichoice', 'wmultiprom', $question, $state);
		return $toreturn;
	}
	
	function get_correct_responses(&$question, &$state) {
		wrsqz_swap('multichoice', 'wmultiprom', $question, $state);
		$response = parent::get_correct_responses($question, $state);
		return wrsqz_get_correct_responses('multichoice', 'wmultiprom', $response, $question, $state);
	}
	
	function backup($bf, $preferences, $question, $level = 6) {
            if(!(method_exists($this,"extra_question_fields"))){
                $extra_question_fields = wrsqz_deprecated_extra_question_fields('multichoice');
            }else{
                $extra_question_fields = $this->extra_question_fields();
            }
            if(!(method_exists($this,"questionid_column_name"))){
                $question_id_column_name = wrsqz_deprecated_question_id_column_name('multichoice');
            }else{
                $question_id_column_name = $this->questionid_column_name();
            }
            if(parent::backup($bf, $preferences, $question,$level) !== false){
                return wrsqz_backup('multichoice', 'wmultiprom', $bf, $preferences, $question, $level, $extra_question_fields, $question_id_column_name);
            }
            return false;
        }
	
	function restore($old_question_id, $new_question_id, $info, $restore) {
		if (parent::restore($old_question_id, $new_question_id, $info, $restore) !== false) {
			return wrsqz_restore('multichoice', 'wmultiprom', $old_question_id, $new_question_id, $info,$restore);
		}
		
		return false;
	}

	function restore_recode_answer($state, $restore) {
            $info = wrsqz_restore_recode_answer_1('multichoice', 'wmultiprom',$state,$restore);
            $answers = parent::restore_recode_answer($state, $restore);
            return wrsqz_restore_recode_answer_2('multichoice', 'wmultiprom', $info, $answers, $state, $restore);
	}
	
	function export_to_xml($question, $format, $extra = null) {
		return wrsqz_export_to_xml('multichoice', 'wmultiprom', $question, $format, $extra);
	}
	
	function import_from_xml($data, $question, $format, $extra = null) {
		return wrsqz_import_from_xml('multichoice', 'wmultiprom', $data, $question, $format, $extra);
	}
	/*Deprecated*/
	function print_question_form_end($question, $submitscript = '', $hiddenfields = '') {
		wrsqz_print_question_form_end('multichoice', 'wmultiprom', $question, $submitscript, $hiddenfields);
		parent::print_question_form_end($question, $submitscript, $hiddenfields);
	}

    function display_question_editing_page(&$mform, $question, $wizardnow){
        return wrsqz_display_question_editing_page('multichoice', 'wmultiprom',$mform, $question, $wizardnow);
    }
}


global $QTYPES;
if (function_exists('question_register_questiontype')) {
	question_register_questiontype(new question_multichoicewiris_qtype());
}
else {
	$QTYPES['multichoicewiris'] = new question_multichoicewiris_qtype();
    $QTYPE_MENU['multichoicewiris'] = 'multichoicewiris';
}

?>