<?php
require_once('../../config.php');
require_once('lib.php');
require_once('locallib.php');

require_once($CFG->libdir.'/adminlib.php');

admin_externalpage_setup('bigdata');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'local_bigdata'));

if (!bigdata_is_enabled()) {
    print_error('Big data not enabled');
}

echo $OUTPUT->single_button('profile.php?action=add', get_string('add_profile', 'local_bigdata'));
show_profiles();

echo $OUTPUT->footer();
