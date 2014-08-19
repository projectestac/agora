<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
	// Adresses to the other parts of the project
	// Flash url
	$settings->add(new admin_setting_configtext('eoicampus_server', get_string('eoicampus_server', 'eoicampus'),
		get_string('eoicampus_server_text', 'eoicampus'), '', PARAM_URL));

}
