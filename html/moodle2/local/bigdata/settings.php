<?php

$settings = new admin_settingpage('local_bigdata', get_string('pluginname','local_bigdata'));
	$ADMIN->add('localplugins', $settings);

if (is_xtecadmin()) {
	$checkedyesno = array('0'=>get_string('no'), '1'=>get_string('yes')); // not nice at all
	$settings->add(new admin_setting_configselect('local_bigdata/enabled', get_string('enabled', 'local_bigdata'),
			get_string('enabled_desc', 'local_bigdata'), '', $checkedyesno));
}


$is_enabled = get_config('local_bigdata', 'enabled');
if ($is_enabled && has_capability('moodle/site:config', context_system::instance())) {

	$courses = $DB->get_records_menu('course', null, 'id', 'id, fullname');
	$settings->add(new admin_setting_configmultiselect('local_bigdata/courses', get_string('courses', 'local_bigdata'),
							  get_string('courses_desc', 'local_bigdata'), array(), $courses));

	// Select roles to take like teacher for the authentication method
	//set roles for authenticate students
	$allroles = array();
	if ($roles = get_all_roles()) {
		foreach ($roles as $role) {
			$rolename = strip_tags(format_string($role->name, true));
			if (empty($rolename))
				$rolename = strip_tags(format_string($role->shortname, true));
			$allroles[$role->id] = $rolename;
		}
	}
	$settings->add(new admin_setting_configmultiselect('local_bigdata/roles', get_string('roles', 'local_bigdata'),
							  get_string('roles_desc', 'local_bigdata'), array(3,4,5), $allroles));
}