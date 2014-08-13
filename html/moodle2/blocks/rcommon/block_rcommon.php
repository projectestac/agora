<?php

// MARSUPIAL *********** MODIFICAT -> Get the yui lib js version moodle 2.x
// 2012.12.1 @abertranb
//$PAGE->requires->yui2_lib(array('yahoo', 'dom', 'event', 'container', 'connection', 'dragdrop', 'element'));
// *********** ORIGINAL
//require_js(array('yui_yahoo', 'yui_dom', 'yui_event', 'yui_container', 'yui_connection', 'yui_dragdrop', 'yui_element'));
// ********** FI

class block_rcommon extends block_base {

    function init() {
        $this->title   = get_string('rcommon', 'local_rcommon');
    }

    function applicable_formats() {
       return array('none' => true);
    }
    function instance_allow_multiple() {
        return false;
    }

    function get_content() {
    	if ($this->content !== null) {
    		return $this->content;
    	}
    	$this->content         =  new stdClass;
    	$this->content->text   = '';
    	$this->content->footer = '';

    	return $this->content;
    }

    function has_config() {
        return false;
    }
}
