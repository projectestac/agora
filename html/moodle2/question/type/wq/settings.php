<?php
defined('MOODLE_INTERNAL') || die();

//Checking that WIRIS plugin is installed
$filterwiris = $CFG->dirroot . '/filter/wiris/filter.php';
$output = '';
if (!file_exists($filterwiris)) {
    $title = '<br /><br /><br /><span style="color:#aa0000; font-size:18px;">Attention! WIRIS filter is not installed</span>';
    $info = '<a target="_blank" href="http://www.wiris.com/plugins/docs/moodle"><img style="vertical-align:-3px;" alt="" src="https://www.wiris.com/system/files/attachments/1689/WIRIS_manual_icon_17_17.png" /></a>';
    $output = $title . '<br />WIRIS quizzes for Moodle 2.x needs that WIRIS plugin for Moodle 2.x is installed on your Moodle. ' . $info;
}

include_once ($CFG->dirroot . '/lib/editor/tinymce/lib.php');
$tinyeditor = new tinymce_texteditor();
$libwiris = $CFG->dirroot . '/lib/editor/tinymce/tiny_mce/' . $tinyeditor->version . '/plugins/tiny_mce_wiris/integration/libwiris.php';
if (!file_exists($libwiris)) {
    //Check for Moodle 2.4
    $libwiris = $CFG->dirroot . '/lib/editor/tinymce/plugins/tiny_mce_wiris/integration/libwiris.php';        
    if (!file_exists($libwiris)) {
        $title = '<br /><br /><br /><span style="color:#aa0000; font-size:18px;">Attention! WIRIS plugin is not installed</span>';
        $info = '<a target="_blank" href="http://www.wiris.com/plugins/docs/moodle"><img style="vertical-align:-3px;" alt="" src="https://www.wiris.com/system/files/attachments/1689/WIRIS_manual_icon_17_17.png" /></a>';    
        $output .= $title . '<br />WIRIS quizzes for Moodle 2.x needs that WIRIS plugin for TinyMCE is installed on your Moodle. ' . $info;    
    }
}

//Checkbox to enable/disable all the WIRIS quizzes question types
$qtypes = array('essay', 'match', 'multianswer', 'multichoice', 'shortanswer', 'truefalse');
$quizzes_disabled = get_config('question', 'wq_disabled');

if ($quizzes_disabled == '1'){
    foreach($qtypes as $key => $value){
        if (get_config('question', $value . 'wiris_disabled') != 1){
            set_config($value . 'wiris_disabled', 1, 'question');
            set_config('wq_disabled', 1, 'question');
        }
    }    
//XTEC ************ MODIFICAT - Avoid enable wiris quizzes by default
//2013.10.04 @sarjona
}else if ($quizzes_disabled == '0') {
//************ ORIGINAL
/*
}else{
*/
//************ FI
    foreach($qtypes as $key => $value){
        if (get_config('question', $value . 'wiris_disabled') == 1){
            set_config($value . 'wiris_disabled', 0, 'question');
            set_config('wq_disabled', 0, 'question');
        }
    }    
}

//XTEC ************ MODIFICAT - Avoid enable wiris quizzes by default
//2013.10.04 @sarjona
$settings->add(new admin_setting_configcheckbox('question/wq_disabled', 'WIRIS quizzes', $output, '1', '0', '1'));
//************ ORIGINAL
/*
$settings->add(new admin_setting_configcheckbox('question/wq_disabled', 'WIRIS quizzes', $output, '0', '0', '1'));
*/
//************ FI

$wiris_plugin = dirname(__FILE__) . '/../../../filter/wiris/filter.php';
$filter_installed = file_exists($wiris_plugin);

if ($filter_installed){
    $url = $CFG->wwwroot . '/admin/settings.php?section=filtersettingfilterwiris';
    $url = '<a href="' . $url . '">WIRIS filter settings</a>';
    $settings->add(new admin_setting_heading('filter_wirisfilterheading', $url, ''));
}

?>
