<?php

require_once('../../config.php');
require_once('lib.php');

$service = required_param('service', PARAM_TEXT);
if (is_service_enabled($service)) {
	$url = get_service_url($service);
	if (isloggedin()) {
		redirect($url.'login_moodle.php');
	} else {
		redirect($url);
	}
} else {
	print_error('Service '.$service.' does not exist or is not enabled');
}
