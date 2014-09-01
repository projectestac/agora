<?php
defined('MOODLE_INTERNAL') || die();

//Checking that WIRIS plugin is installed
$filterexists = file_exists($CFG->dirroot . '/filter/wiris/filter.php');

$output = '';
if (!$filterexists) {
    $title = '<br /><br /><br /><span style="color:#aa0000; font-size:18px;">Attention! WIRIS filter is not installed</span>';
    $info = '<a target="_blank" href="http://www.wiris.com/plugins/docs/moodle"><img style="vertical-align:-3px;" alt="" src="https://www.wiris.com/system/files/attachments/1689/WIRIS_manual_icon_17_17.png" /></a>';
    $output = $title . '<br />WIRIS quizzes for Moodle 2.x needs that WIRIS plugin for Moodle 2.x is installed on your Moodle. ' . $info;
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
}else{
    foreach($qtypes as $key => $value){
        if (get_config('question', $value . 'wiris_disabled') == 1){
            set_config($value . 'wiris_disabled', 0, 'question');
            set_config('wq_disabled', 0, 'question');
        }
    }    
}

$settings->add(new admin_setting_configcheckbox('question/wq_disabled', 'WIRIS quizzes', $output, '0', '0', '1'));

if ($filterexists){
    $url = $CFG->wwwroot . '/admin/settings.php?section=filtersettingwiris';
    $url = '<a href="' . $url . '">WIRIS filter settings</a>';
    $settings->add(new admin_setting_heading('filter_wirisfilterheading', $url, ''));
}

?>
