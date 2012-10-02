<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/essay/edit_essay_form.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libeditform.php');

class question_edit_essaywiris_form extends question_edit_essay_form {
	function definition() {
		parent::definition();

		$mform = &$this->_form;            
		wrsqz_definition('essay', 'wessaprom', $mform);
	}

	function definition_inner(&$mform) {
		parent::definition_inner($mform);
		wrsqz_definition_inner('essay', 'wessaprom', $mform);
	}

	function set_data(&$question) {
		$mform = &$this->_form;
		wrsqz_set_data('essay', 'wessaprom', $mform, $question);
        return parent::set_data($question);
	}
	
	function qtype() {
		return 'essaywiris';
	}
}
?>