<?php
    require_once('../../../config.php');

    require_once($CFG->libdir.'/adminlib.php');
    require_once('scripts.lib.php');

    set_time_limit(0);

	admin_externalpage_setup('agora_scripts');

	$script = optional_param('script',false,PARAM_TEXT);

	echo $OUTPUT->header();
	echo $OUTPUT->heading(get_string('agora_scripts','local_agora'));

	if($script){

		$success = scripts_execute_script($script);
		if($success){
			echo $OUTPUT->notification('Script '.$script.' succeed', 'notifysuccess');
		} else {
			echo $OUTPUT->notification('Script '.$script.' failed');
		}
	} else {
		echo scripts_list_scripts();
	}

	echo $OUTPUT->footer();
