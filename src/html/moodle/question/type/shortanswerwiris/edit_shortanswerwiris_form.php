<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/shortanswer/edit_shortanswer_form.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libeditform.php');

class question_edit_shortanswerwiris_form extends question_edit_shortanswer_form {
	function definition() {
		parent::definition();

		$mform = &$this->_form;            
		wrsqz_definition('shortanswer', 'wshanprom', $mform);
	}

	function definition_inner(&$mform) {
		parent::definition_inner($mform);
		wrsqz_definition_inner('shortanswer', 'wshanprom', $mform);
	}

	function set_data(&$question) {
		$mform = &$this->_form;
		wrsqz_set_data('shortanswer', 'wshanprom', $mform, $question);
		
		return parent::set_data($question);
	}

	function qtype() {
		return 'shortanswerwiris';
	}
}
?>