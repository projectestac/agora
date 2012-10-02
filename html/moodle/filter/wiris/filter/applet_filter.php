<?php

/*
 * Filter Function 
 * called by Moodle when this filter is installed.
 */
function wirisapplet_filter ($courseid, $text) {
    global $TAGS;
    global $CFG;
    WF_initappletfilter();
    return WF_filter_applet($text);
}

/*
 * Replaces all substring '«applet ... «/applet»' by the 
 * corresponding WIRIS applet code
 */
function WF_filter_applet($text) {
    global $TAGS;
    
    $output = ''; 
    $n0 = 0;
    // Search for '«applet'. If it is not found, the
    // content is returned without any modification
    $n1 = strpos($text, $TAGS->in_appletopen);
    if($n1 === false) {
        return $text; // directly return the content
    }
    
    // filtering
    while($n1 !== false) {
        $output .= substr($text, $n0, $n1 - $n0);
        $n0 = $n1;
        $n1 = strpos($text, $TAGS->in_appletclose, $n0);
        if(!$n1) {
            break;
        }
        $n1 = $n1 + strlen($TAGS->in_appletclose);
        // Getting the substring «applet ... «/applet»
        $sub = substr($text, $n0, $n1 - $n0);
		
		/*
		 * This filter does the following replacement inside the <math> tags.
		 *   <a href="<url>">blabla</a>  -->  <url>
		 * 
		 * The reason is that Moodle replaces URL's with HTML links ('A' tags) and ignores the <span class="nolink"> tag.
		 */
		$pattern = '/<a href="[^"]*" target="_blank">([^<]*)<\/a>/';
		$replacement = '\1';
		$sub = preg_replace($pattern, $replacement, $sub);
		
        // replacing '«' by '<'
        $sub = str_replace($TAGS->in_open, $TAGS->out_open, $sub);
        // replacing '»' by '>'
        $sub = str_replace($TAGS->in_close, $TAGS->out_close, $sub);
        // replacing '§' by '&amp;'
        $sub = str_replace($TAGS->in_entity, $TAGS->out_amp, $sub);
        // appending the modified substring
        //output .= '<nolink>' . $sub . '</nolink>';
        $output .= $sub;
        
        $n0 = $n1;
        // searching next '«applet'
        $n1 = strpos($text, $TAGS->in_appletopen, $n0);
    }
    $output .= substr($text, $n0);
    return $output;
}



function WF_initappletfilter() {
    global $TAGS;
    global $CFG;
    
    // Builds searched strings table
    $charset = strtolower(get_string('thischarset'));
    $TAGS->lcharset = $charset;
    $TAGS->ucharset = strtoupper(get_string('thischarset'));
    
	/*
	 * Converting all 'tags' (markups) to the current charset.
	 * This php file is encoded in ISO-8859-1, so all the string defined 
	 * in this file are also encoded in ISO-8859-1. For example, the 
	 * string '«' has a length of 1 byte. 
	 * Problems occured when the filtered content is encoded with another charset.
	 * For example in UTF-8 the string '«' is encoded with two bytes. 
	 * The searched strings (such as '«applet') must be encoded with the 
	 * same charset as the filtered content.
	 * 
	 * To convert the string, a moolde function is used, this does not works
	 * (I don't know why) with versions prior to 1.5.4
	 */
    if($CFG->version > 2005060240) {
        require_once($CFG->libdir . '/textlib.class.php');
        $convertor = textlib_get_instance();
        $TAGS->in_open = $convertor->convert('«', 'iso-8859-1', $charset);
        $TAGS->in_close = $convertor->convert('»', 'iso-8859-1', $charset);
        $TAGS->in_entity = $convertor->convert('§', 'iso-8859-1', $charset);
        $TAGS->in_appletopen = $convertor->convert('«applet', 'iso-8859-1', $charset);
        $TAGS->in_appletclose = $convertor->convert('«/applet»', 'iso-8859-1', $charset);
    } else {
        $TAGS->in_open = '«';
        $TAGS->in_close = '»';
        $TAGS->in_entity = '§';
        $TAGS->in_appletopen = '«applet';
        $TAGS->in_appletclose = '«/applet»';
    }
    $TAGS->out_open = '<';
    $TAGS->out_close = '>';
    $TAGS->out_entity = '&';
    $TAGS->out_amp = '&amp;';
}