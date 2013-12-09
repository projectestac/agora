<?php
$checkedyesno = array(''=>get_string('no'), 'checked'=>get_string('yes')); // not nice at all
$settings->add(new admin_setting_configselect('rcommon_tracer', get_string('tracer', 'block_rcommon'),
            get_string('tracerdesc', 'block_rcommon'), '', $checkedyesno));

//MARSUPIAL ********** AFEGIT -> Store logs dir
//2013.03.16 @abertranb
$settings->add(new admin_setting_configtext('rcommon_data_store_log', get_string('rcommon_data_store_log', 'block_rcommon'),
get_string('rcommon_data_store_log_desc', 'block_rcommon'), $CFG->dataroot, PARAM_RAW));
//*********** FI

//MARSUPIAL ********** AFEGIT -> Select roles to take like teacher for the authentication method
//2011.05.16 @mmartinez
//set roles for authenticate students
$allroles = array();
if ($roles = get_all_roles()) {
    foreach ($roles as $role) {
        $rolename = strip_tags(format_string($role->name, true));
        if (!isset($rolename) || strlen($rolename)==0)
        	$rolename = strip_tags(format_string($role->shortname, true));
        $allroles[$role->id] = $rolename;
        if (!isset($guestroles[$role->id])) {
            $nonguestroles[$role->id] = $rolename;
        }
    }
}
$settings->add(new admin_setting_configmultiselect('rcommon_teacherroles', get_string('teacherroles', 'block_rcommon'),
                      get_string('teacherrolesinfo', 'block_rcommon'), array(3,4), $allroles));
//*********** FI
