<?php

require_once('../../config.php');
require_once('lib.php');
require_once('locallib.php');
require_once('forms.php');

require_once($CFG->libdir.'/adminlib.php');

admin_externalpage_setup('bigdata');

if (!bigdata_is_enabled()) {
	print_error('Big data not enabled');
}

$action = required_param('action', PARAM_ACTION);
switch($action) {
	case 'add':
		$mform = new bigdata_profile_form('profile.php?action=add');
        if ($mform->is_cancelled()) {
            redirect($CFG->wwwroot . '/local/bigdata/index.php');
        } else if ($data = $mform->get_data()) {
        	$profilecreated = bigdata_profile_insert($data);
            if ($profilecreated) {
                redirect($CFG->wwwroot . '/local/bigdata/index.php', get_string('profile_created', 'local_bigdata'));
            }
        }
        echo $OUTPUT->header();
		echo $OUTPUT->heading(get_string('pluginname', 'local_bigdata').': '.get_string('add_profile', 'local_bigdata'));
		$toform = array('roles' => array(3, 4, 5));
        // TODO: Add default tablefields
		$mform->set_data($toform);
        $mform->display();
		break;
	case 'edit':
		$id = required_param('id', PARAM_INT);
		$profile = $DB->get_record('bigdata_profiles', array('id' => $id));

		$mform = new bigdata_profile_form('profile.php?action=edit&id='.$profile->id);
        if ($mform->is_cancelled()) {
            redirect($CFG->wwwroot . '/local/bigdata/index.php');
        } else if ($data = $mform->get_data()) {
        	$profileupdated = bigdata_profile_update($profile->id, $data);
            if ($profileupdated) {
                redirect($CFG->wwwroot . '/local/bigdata/index.php', get_string('profile_updated', 'local_bigdata'));
            }
        }
        echo $OUTPUT->header();
		echo $OUTPUT->heading(get_string('pluginname', 'local_bigdata').': '.get_string('edit_profile', 'local_bigdata', $profile->name));

		$toform = bigdata_get_formdata_from_profile($profile);
        $mform->set_data($toform);
        $mform->display();
		break;
	case 'delete':
		$id = required_param('id', PARAM_INT);
		$profiledeleted = bigdata_profile_delete($id);
        if ($profiledeleted) {
            redirect($CFG->wwwroot . '/local/bigdata/index.php', get_string('profile_deleted', 'local_bigdata'));
        } else {
        	print_error('Cannot delete profile');
        }
		break;

}

echo $OUTPUT->footer();
