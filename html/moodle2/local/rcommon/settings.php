<?php
//MARSUPIAL ************ FITXER AFEGIT - Marsupial menu options

// If site is allowed to use Marsupial
if ((!isset($CFG->ismarsupial) || $CFG->ismarsupial)) {
	//****************** MENU ******************/
	$ADMIN->add('root', new admin_category('rcommon', get_string('rcommon','local_rcommon')));

	// Added state page
	$ADMIN->add('rcommon', new admin_externalpage('marsupialmanage_publisher', get_string('marsupialmanage_publisher','local_rcommon'), $CFG->wwwroot . '/local/rcommon/publishers.php', array('local/rcommon:managepublishers')));
	$ADMIN->add('rcommon', new admin_externalpage('marsupial_credentials_users', get_string('marsupialmanage_credentials','local_rcommon'), $CFG->wwwroot . '/local/rcommon/users.php', array('local/rcommon:managecredentials')));

	// Get publishers
	$publishers = $DB->get_records('rcommon_publisher', array(), 'name');
	if($publishers){
		$ADMIN->add('rcommon', new admin_category('marsupialcontent', get_string('marsupialcontent','local_rcommon')));

		foreach ($publishers as $publisher){
			$ADMIN->add('marsupialcontent', new admin_externalpage('marsupialcontent'.$publisher->id, $publisher->name, $CFG->wwwroot . '/local/rcommon/contents.php?id='.$publisher->id, array('local/rcommon:managecredentials')));
		}
	}

	$ADMIN->add('rcommon', new admin_category('marsupialimport', get_string('keymanager_import_export','local_rcommon')));

	$ADMIN->add('marsupialimport', new admin_externalpage('keymanager_import', get_string('keymanager_import','local_rcommon'), $CFG->wwwroot . '/local/rcommon/import.php', array('local/rcommon:importcredentials')));
	$ADMIN->add('marsupialimport', new admin_externalpage('keymanager_export', get_string('keymanager_export','local_rcommon'), $CFG->wwwroot . '/local/rcommon/export.php', array('local/rcommon:exportcredentials')));

	if (has_capability('moodle/site:config', context_system::instance())) {
		//****************** SETTINGS ******************//
		$settings = new admin_settingpage('local_rcommon', get_string('rcommon','local_rcommon'));
		$ADMIN->add('localplugins', $settings);

		$checkedyesno = array(''=>get_string('no'), 'checked'=>get_string('yes')); // not nice at all
		$settings->add(new admin_setting_configselect('rcommon/tracer', get_string('tracer', 'local_rcommon'),
				get_string('tracerdesc', 'local_rcommon'), '', $checkedyesno));

		// Store logs dir
		$settings->add(new admin_setting_configtext('rcommon/data_store_log', get_string('rcommon_data_store_log', 'local_rcommon'),
			get_string('rcommon_data_store_log_desc', 'local_rcommon'), $CFG->dataroot, PARAM_RAW));

		// Select roles to take like teacher for the authentication method
		//set roles for authenticate students
		$allroles = array();
		if ($roles = get_all_roles()) {
			foreach ($roles as $role) {
				$rolename = strip_tags(format_string($role->name, true));
				if (!isset($rolename) || strlen($rolename)==0)
					$rolename = strip_tags(format_string($role->shortname, true));
				$allroles[$role->id] = $rolename;
				if (!isset($guestroles[$role->id])) {
					$nonguestroles[$role->id] = $rolename;
				}
			}
		}
		$settings->add(new admin_setting_configmultiselect('rcommon/teacherroles', get_string('teacherroles', 'local_rcommon'),
								  get_string('teacherrolesinfo', 'local_rcommon'), array(3,4), $allroles));
	}
}
