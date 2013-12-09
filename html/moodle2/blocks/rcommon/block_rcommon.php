<?php 

// MARSUPIAL *********** MODIFICAT -> Get the yui lib js version moodle 2.x
// 2012.12.1 @abertranb
//$PAGE->requires->yui2_lib(array('yahoo', 'dom', 'event', 'container', 'connection', 'dragdrop', 'element'));
// *********** ORIGINAL
//require_js(array('yui_yahoo', 'yui_dom', 'yui_event', 'yui_container', 'yui_connection', 'yui_dragdrop', 'yui_element'));
// ********** FI

class block_rcommon extends block_base {

    function init() {
        $this->title   = get_string('rcommon', 'block_rcommon');
    }

    function applicable_formats() {
       return array('none' => true);
        
    }
    function instance_allow_multiple() {
        return false;
    }

    function get_content() {
    	
// MARSUPIAL *********** MODIFICAT -> Get the content of block
// 2012.12.1 @abertranb    	
    	if ($this->content !== null) {
    		return $this->content;
    	}
    	
    	$this->content         =  new stdClass;
    	$this->content->text   = 'Marsupial block!';
    	$this->content->footer = '';
    	
    	return $this->content;
// *********** ORIGINAL
    	//return '';
// ********** FI
    	
    }
    
    function has_config() {
        return true;
    }
}
