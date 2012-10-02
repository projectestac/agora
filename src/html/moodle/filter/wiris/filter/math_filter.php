<?php

require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');
require_once($CFG->dirroot . '/filter/wiris/lib/wrs_lang_inc.php');

$lang = current_language();
$lang = substr($lang,0, 2); 


/*
 * Filter Function 
 * called by Moodle when this filter is installed.
 */
function math_filter ($courseid, $text) {
    global $TAGS;
    global $CFG;
    WF_initmathfilter();
    return WF_filter_math($text, false);
}

/*
 * Replaces all substring '«math ... «/math»' by the 
 * corresponding formula image code
 */
function WF_filter_math($text,$editor) {
    global $TAGS;
    
    $output = ''; 
    $n0 = 0;
    // Search for '«math'. If it is not found, the
    // content is returned without any modification
    $n1 = strpos($text, $TAGS->in_mathopen);
    if($n1 === false) {
        return $text; // directly return the content
    }
    
    // filtering
    while($n1 !== false) {
        $output .= substr($text, $n0, $n1 - $n0);
        $n0 = $n1;
        $n1 = strpos($text, $TAGS->in_mathclose, $n0);
        if(!$n1) {
            break;
        }
        $n1 = $n1 + strlen($TAGS->in_mathclose);
        // Getting the substring «math ... «/math»
        $sub = substr($text, $n0, $n1 - $n0);
        // remove html entities (such as &quot;)
        
        //Solves BUG 25670 of php 4.3, solved at version 5
        if (version_compare(phpversion(), "5.0.0", ">=")) { 
            $sub = html_entity_decode($sub, ENT_COMPAT, $TAGS->ucharset); // needs php 4.3 to work, php 5.0 if charset is utf (bug 25670)
        } else {
            if(strtolower($TAGS->ucharset)=="utf-8") {
                $sub=html_entity_decode_utf8($sub);
            } else {
                $sub=html_entity_decode($sub, ENT_COMPAT, $TAGS->ucharset);
            }
        }
		
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
        $sub = str_replace($TAGS->in_entity, $TAGS->out_entity, $sub);
        // generate the image code
        $sub = WF_math_image($sub,$editor);
        // appending the modified substring
        $output .= $sub;
        $n0 = $n1;
        // searching next '«math'
        $n1 = strpos($text, $TAGS->in_mathopen, $n0);
    }
    $output .= substr($text, $n0);
    return $output;
}


function WF_initmathfilter() {
    global $TAGS;
    global $CFG;
    
    // Builds searched strings table
    $charset = strtolower(get_string('thischarset')); // moodle encodnig (UTF-8 unless old systems)
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
        $TAGS->in_mathopen = $convertor->convert('«math', 'iso-8859-1', $charset);
        $TAGS->in_mathclose = $convertor->convert('«/math»', 'iso-8859-1', $charset);
    } else {
        $TAGS->in_open = '«';
        $TAGS->in_close = '»';
        $TAGS->in_entity = '§';
        $TAGS->in_mathopen = '«math';
        $TAGS->in_mathclose = '«/math»';
    }
    $TAGS->out_open = '<';
    $TAGS->out_close = '>';
    $TAGS->out_entity = '&';
}

/*
 * Generate the html IMG code corresponding to the specified MathML expression
 */
function WF_math_image($mathml, $editor) {
    global $CFG;
    global $TAGS;
    global $lang;
    
    $output = '';
    
    if ($mathml) {
    // creating cache entry in database
    // The MD5 hashcode identify a formula, so it is generated with all
    // the parameters of a formula (mathml, size, color)
        
        $idformula = (isset($CFG->wirisimagebgcolor)) ? $CFG->wirisimagebgcolor : '';
        
        if (isset($CFG->wirisimagesymbolcolor)) {
            $idformula .= $CFG->wirisimagesymbolcolor;
        }
        
        if (isset($CFG->wiristransparency)) {
            $idformula .= $CFG->wiristransparency;
        }
        
        if (isset($CFG->wirisimagefontsize)) {
            $idformula .= $CFG->wirisimagefontsize;
        }
        
        $idformula .= $mathml;
        $md5 = md5($idformula);
        
        if (!$wrscache = get_record("cache_filters","filter","wiris", "md5key", $md5)) {
            $wrscache->filter = 'wiris';
            $wrscache->version = 1;
            $wrscache->md5key = $md5;
            
            // convert the xml to UTF-8
            //We only need to convert it if it comes from the database, otherwise, it will come from the editor and will already be in utf-8
            if($editor!==true) {
                if($CFG->version > 2005060240) {
                    require_once($CFG->libdir . '/textlib.class.php');
                    $convertor = textlib_get_instance();
                    $mathml = $convertor->convert($mathml, $TAGS->lcharset, 'utf-8');
                } else {
                    $mathml = utf8_encode($mathml); // ISO_8859_1 to UTF_8
                }
            }
            // update the database record entry
            $wrscache->rawtext = $mathml;
            $wrscache->timemodified = time();
            insert_record("cache_filters",$wrscache, false);
        }
        $filename = $md5 . ".png";
        
        $source=$CFG->wwwroot . '/filter/wiris/filter/wrs_showimage.php';
        if ($CFG->slasharguments) {        // Use this method if possible for better caching
            $source .= '/' . $filename;
        } else {
            $source .= '?file=' . $filename;
        }
        
        $output .= '<img align="middle" src="';
        $output.=$source;
        
        //We add the title tooltip only when the function is called to insert images to the editor
        if($editor===true) {
            if($CFG->wirisformulaeditorenabled) {
                $title=wrs_get_string($lang, 'wiristitletext');
                $title=utf8_encode($title); // ISO_8859_1 to UTF_8
                $output .= '" title ="'.$title;
            }
        } 
        
        $output .='" class="'.$CFG->wirisformulaimageclass;
        $output .= '" />'; 
    }
    return $output;
}

function html_entity_decode_utf8($string) {
    static $trans_tbl;
    
    // replace numeric entities
    $string = preg_replace('~&#x([0-9a-f]+);~ei', 'code2utf(hexdec("\\1"))', $string);
    $string = preg_replace('~&#([0-9]+);~e', 'code2utf(\\1)', $string);
    
    // replace literal entities
    if (!isset($trans_tbl)) {
        $trans_tbl = array();
        foreach (get_html_translation_table(HTML_ENTITIES) as $val=>$key) $trans_tbl[$key] = utf8_encode($val);
    }
    
    return strtr($string, $trans_tbl);
}

// Returns the utf string corresponding to the unicode value (from php.net, courtesy - romans@void.lv)
function code2utf($num) {
    if ($num < 128) return chr($num);
    if ($num < 2048) return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
    if ($num < 65536) return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
    if ($num < 2097152) return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
    return '';
}