<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/essay/questiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libquestiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/deprecated.php');

class question_essaywiris_qtype extends question_essay_qtype {
	function name() {
		return 'essaywiris';
	}
	function create_session_and_responses(&$question, &$state, $cmoptions, $attempt) {
		parent::create_session_and_responses($question, $state, $cmoptions, $attempt);
		return wrsqz_create_session_and_responses('essay', 'wessaprom', $question, $state, $cmoptions, $attempt);
	}
	
	function restore_session_and_responses(&$question, &$state) {
		$values = wrsqz_restore_session_and_responses_1('essay', 'wessaprom', $question, $state);
		$toReturn = parent::restore_session_and_responses($question, $state);
		wrsqz_restore_session_and_responses_2('essay', 'wessaprom', $values, $question, $state);
		
		return  $toReturn;
	}
	
	function save_session_and_responses(&$question, &$state) {
		return wrsqz_save_session_and_responses('essay', 'wessaprom', $question, $state);
	}
	
	function get_question_options(&$question) {
		if (parent::get_question_options($question)) {
			return wrsqz_get_question_options('essay', 'wessaprom', $question);
		}
		
		return false;
	}
	function save_question($question, $form, $course){
    wrsqz_presave_question('essay', 'wessaprom', $question, $form, $course);
    return parent::save_question($question, $form, $course);
  }
	function save_question_options($question) {
		if(parent::save_question_options($question) !== false) {
			return wrsqz_save_question_options('essay', 'wessaprom', $question);
		}
		return false;
	}
	
	function print_question(&$question, &$state, $number, $cmoptions, $options) {
		wrsqz_print_question('essay', 'wessaprom', $question, $state, $number, $cmoptions, $options);
		return parent::print_question($question, $state, $number, $cmoptions, $options);
	}
	
	function delete_question($questionid) {
		if (!wrsqz_delete_question('essay', 'wessaprom', $questionid)) {
			return false;
		}
		
		return parent::delete_question($questionid);
	}
	
	function print_question_formulation_and_controls(&$question, &$state, $cmoptions, $options) {
		wrsqz_swap('essay', 'wessaprom', $question, $state);
		wrsqz_print_question_formulation_and_controls('essay', 'wessaprom', $question, $state, $cmoptions, $options);
    return true;
	}
	
	function grade_responses(&$question, &$state, $cmoptions) {		
		wrsqz_swap('essay', 'wessaprom', $question, $state);
		
		if (wrsqz_grade_responses('essay', 'wessaprom', $question, $state, $cmoptions)) {
			return parent::grade_responses($question, $state, $cmoptions);
		}
		
		return true;
	}
	
	function get_correct_responses(&$question, &$state) {
		wrsqz_swap('essay', 'wessaprom', $question, $state);
		
		$response = parent::get_correct_responses($question, $state);
		return wrsqz_get_correct_responses('essay', 'wessaprom', $response, $question, $state);
	}
	
	function backup($bf, $preferences, $question, $level = 6) {
        if(!(method_exists($this,"extra_question_fields"))){
            $extra_question_fields = wrsqz_deprecated_extra_question_fields('essay');
        }else{
            $extra_question_fields = $this->extra_question_fields();
        }
        if(!(method_exists($this,"questionid_column_name"))){
            $question_id_column_name = wrsqz_deprecated_question_id_column_name('essay');
        }else{
            $question_id_column_name = $this->questionid_column_name();
        }
        if(parent::backup($bf, $preferences, $question,$level) !== false){
            return wrsqz_backup('essay', 'wessaprom', $bf, $preferences, $question, $level, $extra_question_fields, $question_id_column_name);
        }
        return false;

        }
	
	function restore($old_question_id, $new_question_id, $info, $restore) {
		if (parent::restore($old_question_id, $new_question_id, $info, $restore) !== false) {
			return wrsqz_restore('essay', 'wessaprom', $old_question_id, $new_question_id, $info,$restore);
		}
		
		return false;
	}

	function restore_recode_answer($state, $restore) {
            $info = wrsqz_restore_recode_answer_1('essay', 'wessaprom',$state,$restore);
            $answers = parent::restore_recode_answer($state, $restore);
            return wrsqz_restore_recode_answer_2('essay', 'wessaprom', $info, $answers, $state, $restore);
	}
	
	function export_to_xml($question, $format, $extra = null) {
		return wrsqz_export_to_xml('essay', 'wessaprom', $question, $format, $extra);
	}
	
	function import_from_xml($data, $question, $format, $extra = null) {
		return wrsqz_import_from_xml('essay', 'wessaprom', $data, $question, $format, $extra);
	}
	    
    function display_question_editing_page(&$mform, $question, $wizardnow){
        return wrsqz_display_question_editing_page('essay','wessaprom',$mform, $question, $wizardnow);
    }
    
    /* Deprecated */
	function print_question_form_end($question, $submitscript = '', $hiddenfields = '') {
		wrsqz_print_question_form_end('essay', 'wessaprom', $question, $submitscript, $hiddenfields);
		parent::print_question_form_end($question, $submitscript, $hiddenfields);
	}
}

if (function_exists('question_register_questiontype')) {
	question_register_questiontype(new question_essaywiris_qtype());
}
else {
	$QTYPES['essaywiris'] = new question_essaywiris_qtype();
	$QTYPE_MENU['essaywiris'] = 'essaywiris';
}
?>