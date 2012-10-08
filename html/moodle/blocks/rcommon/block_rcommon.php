<?php 

require_js(array('yui_yahoo', 'yui_dom', 'yui_event', 'yui_container', 'yui_connection', 'yui_dragdrop', 'yui_element'));

class block_rcommon extends block_base {

    function init() {
        $this->title   = get_string('rcommon', 'blocks/rcommon');
        $this->version = 2012100591;
    }

    function applicable_formats() {
       return array('none' => true);
        
    }
    function instance_allow_multiple() {
        return false;
    }

    function get_content() {
        return '';
    }
    
    function has_config() {
        return true;
    }
}
?>