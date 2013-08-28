<?php
require_once('rgrade_lib.php');

class block_rgrade extends block_base {

	function init() {
		$this->title = rgrade_get_string('rgrade');
	}
	
	function instance_allow_multiple() {
        return false;
    }
    
    function has_config() {
        return false;
    }

	public function get_content() {

		global $CFG, $COURSE, $USER;

		if ($this->content !== null) {
			return $this->content;
		}

		$this->content = new stdClass;
		$this->content->text = '';
		$this->content->footer = '';

		$text = "<form id='marsupialReport' method='get' action='".$CFG->wwwroot."/blocks/rgrade/rgrade_table.php'>";
		$text .= "<fieldset>";
		$text .= "<input type='hidden' name='courseid' value='{$COURSE->id}'/>";

		$books = rgrade_get_all_books($COURSE->id);
		if(!empty($books)){

			$text .="<label for='fbook'><span>".rgrade_get_string('book')."</span><br/>";
			$text .="<select name='bookid' id='fbook' class='fbook' style='width:140px'>";
			foreach($books as $book){
				$text .= "<option value='".$book->id."'>".$book->name."</option>";
			}
			$text .="</select></label>";
		}

		if (rgrade_check_capability("moodle/grade:viewall")) {

			$groups = groups_get_all_groups($COURSE->id);

			if(!empty($groups)) {

				$text .="<br/><label for='fgroup'><span>".rgrade_get_string('group')."</span><br/>";
				$text .="<select name='groupid' id='fgroup' class='fgroup' style='width:140px'>";
				$text .= "<option value=''> -- ".rgrade_get_string('all_groups')." -- </option>";

				foreach($groups as $group){
					$text .= "<option value='".$group->id."'>".$group->name."</option>";
				}

				$text .="</select></label>";
			}
		}

		$text .= "<input type='submit' class='button' name='mdl_action' value='".rgrade_get_string('go')."'/>";

		$text .= "</fieldset></form>";

		$this->content->text = $text;

		return $this->content;
	}
}
