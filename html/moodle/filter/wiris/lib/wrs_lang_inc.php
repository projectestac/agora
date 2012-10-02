<?php
function wrs_getLanguagePath() {
    $currentLanguage = substr(current_language(), 0, 2) . '_utf8';
    
    global $CFG;
    $currentPath = $CFG->dirroot . '/lang/' . $currentLanguage;
    
    if (file_exists($currentPath)) {
        return $currentPath;
    }
    
    $currentPath = $CFG->dataroot . '/lang/' . $currentLanguage;
    if (file_exists($currentPath)) {
        return $currentPath;
    }
    
    return $CFG->dirroot . '/lang/en_utf8';
}

function wrs_get_string($lang, $key) {
    global $CFG;
    static $cache_text = array();
    if(!isset($wrs_text[$lang])) {
        if(isset($CFG) && (isset($CFG->dirroot))) {
            $path = $CFG->dirroot . '/filter/wiris/lang/';
        } else {
            $path = '../lang/';
        }
        $path .= $lang . '/pluginwiris.php';
        if(file_exists($path)) {
            $string = array();
            include($path);
            $cache_text[$lang] = &$string;
        }
    }
    
    if(isset($cache_text[$lang]) && isset($cache_text[$lang][$key])) {
        return $cache_text[$lang][$key];
    } else if($lang != 'en') {
            return wrs_get_string('en', $key);
        } else {
            return '[[' . $key . ']]';
        }
  }