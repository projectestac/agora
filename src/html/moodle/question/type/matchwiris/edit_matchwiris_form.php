<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/match/edit_match_form.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libeditform.php');

class question_edit_matchwiris_form extends question_edit_match_form {
	function definition() {
		parent::definition();

		$mform = &$this->_form;            
		wrsqz_definition('match', 'wmatprom', $mform);
	}

	function definition_inner(&$mform) {
		parent::definition_inner($mform);
		wrsqz_definition_inner('match', 'wmatprom', $mform);
	}

	function set_data(&$question) {
		$mform = &$this->_form;
		wrsqz_set_data('match', 'wmatprom', $mform, $question);
		
		return parent::set_data($question);
	}
	
	function qtype() {
		return 'matchwiris';
	}
}
?>