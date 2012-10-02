<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/multichoice/edit_multichoice_form.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libeditform.php');

class question_edit_multichoicewiris_form extends question_edit_multichoice_form {
	function definition() {
		parent::definition();

		$mform = &$this->_form;            
		wrsqz_definition('multichoice', 'wmultiprom', $mform);
	}

	function definition_inner(&$mform) {
		parent::definition_inner($mform);
		wrsqz_definition_inner('multichoice', 'wmultiprom', $mform);
	}

	function set_data(&$question) {
		$mform = &$this->_form;
		wrsqz_set_data('multichoice', 'wmultiprom', $mform, $question);
		
		return parent::set_data($question);
	}
	
	function qtype() {
		return 'multichoicewiris';
	}
}
?>