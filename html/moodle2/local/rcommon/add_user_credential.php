<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");
require_once('forms.php');
require_once("locallib.php");

require_login();

require_capability('local/rcommon:manageowncredentials', context_system::instance());

require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('marsupial_credentials_users');

$params = array();
$username = required_param('username', PARAM_TEXT);
$params['username'] = $username;

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('keyaddingforuser', 'local_rcommon', $username));

$form = new local_rcommon_add_credentials_form();
if ($form->is_cancelled()){
	break;
} else if ($fromform = $form->get_data() and confirm_sesskey()){

    $id = credentials::add($fromform->isbn, $fromform->credentials, $fromform->username);
    $referer = $CFG->wwwroot.'/local/rcommon/users.php?action=manage&username='.$fromform->username;

	if (!$id){
		redirect($referer, get_string('saveko', 'local_rcommon'), 5);
	}

	redirect($referer, get_string('saveok', 'local_rcommon'), 2);
} else {
	$credential = new StdClass();
	$credential->username = $username;

	$form->set_data($credential);
	$form->display();
}

echo $OUTPUT->footer();
