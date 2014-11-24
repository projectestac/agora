<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");
require_once('forms.php');
require_once("locallib.php");
require_once($CFG->libdir.'/adminlib.php');

require_login();

$context = context_system::instance();
if (!has_capability('local/rcommon:managecredentials', $context)) {
    $username = $USER->username;
    $PAGE->set_url(new moodle_url('/local/local_rcommon/add_user_credential.php'));
    $PAGE->set_context($context);
    $PAGE->set_pagelayout('frontpage');
} else {
    admin_externalpage_setup('marsupial_credentials_users');
    $username = required_param('username', PARAM_TEXT);
}


$params = array();
$params['username'] = $username;


$form = new local_rcommon_add_credentials_form();
if ($form->is_cancelled()) {
    $referer = $CFG->wwwroot.'/local/rcommon/users.php?action=manage&username='.$username;
    redirect($referer);
    break;
} else if ($fromform = $form->get_data() and confirm_sesskey()) {

    $id = credentials::add($fromform->isbn, $fromform->credentials, $username);
    $referer = $CFG->wwwroot.'/local/rcommon/users.php?action=manage&username='.$username;

    if (!$id) {
        redirect($referer, get_string('saveko', 'local_rcommon'), 5);
    }

    redirect($referer, get_string('saveok', 'local_rcommon'), 2);
} else {
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('keyaddingforuser', 'local_rcommon', $username));
    $credential = new StdClass();
    $credential->username = $username;

    $form->set_data($credential);
    $form->display();
    echo $OUTPUT->footer();
}


