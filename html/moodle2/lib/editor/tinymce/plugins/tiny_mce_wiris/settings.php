<?php
$output = 'WIRIS plugin for TinyMCE (Maths) is correctly installed.';

//Checking that WIRIS plugin is installed
$filterwiris = $CFG->dirroot . '/filter/wiris/filter.php';
if (!file_exists($filterwiris)) {
    $title = '<span style="color:#aa0000; font-size:18px;">Attention! WIRIS filter is not installed</span>';
    $info = '<a target="_blank" href="http://www.wiris.com/plugins/docs/moodle"><img style="vertical-align:-3px;"'.
        ' alt="" src="https://www.wiris.com/system/files/attachments/1689/WIRIS_manual_icon_17_17.png" /></a>';
    $output = $title . '<br />WIRIS plugin for TinyMCE needs that WIRIS plugin for Moodle 2.x is installed on your Moodle. '.
        $info;
}

$settings->add(new admin_setting_heading('tiny_mce_wiris', '', $output));
