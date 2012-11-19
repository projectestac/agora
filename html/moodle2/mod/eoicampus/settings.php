<?php  

// XTEC ********** AFEGIT -> Control direct access
// 2012.11.08 @abertranb
defined('MOODLE_INTERNAL') || die;
// ********** FI

// XTEC ********** AFEGIT -> Adresses to the other parts of the proyect
// 2011.07.22 @mmartinez

//flash url
$settings->add(new admin_setting_configtext('eoicampus_server', get_string('eoicampus_server', 'eoicampus'),
    get_string('eoicampus_server_text', 'eoicampus'), '', PARAM_URL));

// ********** FI

?>
