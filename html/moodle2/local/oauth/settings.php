<?php
if ($hassiteconfig) {
	//$ADMIN->add('root', new admin_category('local_oauth', get_string('pluginname','local_oauth')));
	$ADMIN->add('server', new admin_externalpage('local_oauth_settings', get_string('settings','local_oauth'), $CFG->wwwroot . '/local/oauth/index.php', array('local/oauth:manageclients')));
}
