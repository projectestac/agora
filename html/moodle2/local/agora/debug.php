<?php
    require_once('../../config.php');

    require_once($CFG->libdir.'/adminlib.php');
    $context_system = context_system::instance();
    $PAGE->set_context($context_system);
    $PAGE->set_url('/local/agora/debug.php');

    require_xtecadmin(true);

	//activa i desactiva el debug de la pàgina per cookie
	$debug = required_param('agora_debug',PARAM_INTEGER);

	//activa i desactiva el debug de la pàgina per cookie
	//Set the cookie
	if(!isset($_COOKIE['agora_debug']) || $_COOKIE['agora_debug'] != $debug){ //Not to call it more than once
		$_COOKIE['agora_debug'] = $debug;
		if($debug)	error_reporting(E_ALL | E_STRICT); //To report setcookie errors
		setcookie('agora_debug', $debug, time()+1800, $CFG->sessioncookiepath, $CFG->sessioncookiedomain, $CFG->cookiesecure, $CFG->cookiehttponly);
	}



    echo $OUTPUT->header();

    echo '<h2>'.get_string('debug','admin').'</h2>';

	if($debug) echo $OUTPUT->notification('Debug activat','notifysuccess');
	else       echo $OUTPUT->notification('Debug desactivat');

	echo $OUTPUT->footer();

