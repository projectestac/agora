<?php  //$Id: settings.php,v 1.1.2.6 2008/12/04 03:26:24 piers Exp $

require_once($CFG->dirroot . '/mod/rscorm/locallib.php');

$settings->add(new admin_setting_configselect('rscorm_grademethod', get_string('grademethod', 'rscorm'),get_string('grademethoddesc', 'rscorm'), RSCORM_GRADEHIGHEST, rscorm_get_grade_method_array()));

for ($i=0; $i<=100; $i++) {
  $grades[$i] = "$i";
}
$settings->add(new admin_setting_configselect('rscorm_maxgrade', get_string('maximumgrade'),get_string('maximumgradedesc','rscorm'), 100, $grades));

$settings->add(new admin_setting_configselect('rscorm_maxattempts', get_string('maximumattempts', 'rscorm'), get_string('maximumattemptsdesc', 'rscorm'), 0, rscorm_get_attempts_array()));

$settings->add(new admin_setting_configselect('rscorm_whatgrade', get_string('whatgrade', 'rscorm'), get_string('whatgradedesc', 'rscorm'), RSCORM_HIGHESTATTEMPT, rscorm_get_what_grade_array()));

$settings->add(new admin_setting_configtext('rscorm_framewidth', get_string('width', 'rscorm'),
                   get_string('framewidth', 'rscorm'), '100%'));

$settings->add(new admin_setting_configtext('rscorm_frameheight', get_string('height', 'rscorm'),
                   get_string('frameheight', 'rscorm'), 500));

$settings->add(new admin_setting_configselect('rscorm_popup', get_string('display','rscorm'), get_string('displaydesc','rscorm'), 0, rscorm_get_popup_display_array()));

foreach(rscorm_get_popup_options_array() as $key => $value){
    $settings->add(new admin_setting_configcheckbox('rscorm_'.$key, get_string($key, 'rscorm'),'',$value));
}

$settings->add(new admin_setting_configselect('rscorm_skipview', get_string('skipview', 'rscorm'), get_string('skipviewdesc', 'rscorm'), 0, rscorm_get_skip_view_array()));

$yesno = array(0 => get_string('no'),
               1 => get_string('yes'));

$settings->add(new admin_setting_configselect('rscorm_hidebrowse', get_string('hidebrowse', 'rscorm'), get_string('hidebrowsedesc', 'rscorm'), 0, $yesno));

$settings->add(new admin_setting_configselect('rscorm_hidetoc', get_string('hidetoc', 'rscorm'), get_string('hidetocdesc', 'rscorm'), 0, rscorm_get_hidetoc_array()));

$settings->add(new admin_setting_configselect('rscorm_hidenav', get_string('hidenav', 'rscorm'), get_string('hidenavdesc', 'rscorm'), 0, $yesno));

$settings->add(new admin_setting_configselect('rscorm_auto', get_string('autocontinue', 'rscorm'), get_string('autocontinuedesc', 'rscorm'), 0, $yesno));

$settings->add(new admin_setting_configselect('rscorm_updatefreq', get_string('updatefreq', 'rscorm'), get_string('updatefreqdesc', 'rscorm'), 0, rscorm_get_updatefreq_array()));

//MARSUPIAL ********** AFEGIT - Avoid cross domain scripting scorm problem
$settings->add(new admin_setting_configtext('rscorm_documentdomain', get_string('documentdomain', 'rscorm'), get_string('documentdomain', 'rscorm'), 'educat1x1.cat'));
//********** FI

?>
