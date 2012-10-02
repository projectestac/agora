<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/truefalse/edit_truefalse_form.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libeditform.php');

class question_edit_truefalsewiris_form extends question_edit_truefalse_form {
	function definition() {
		parent::definition();

		$mform = &$this->_form;            
		wrsqz_definition('truefalse', 'wtrflsprom', $mform);
	}

	function definition_inner(&$mform) {
		parent::definition_inner($mform);
		wrsqz_definition_inner('truefalse', 'wtrflsprom', $mform);
	}

	function set_data(&$question) {
		$mform = &$this->_form;
		wrsqz_set_data('truefalse', 'wtrflsprom', $mform, $question);
		
		return parent::set_data($question);
	}
	
	function qtype() {
		return 'truefalsewiris';
	}
}
?>