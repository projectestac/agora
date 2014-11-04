<?php

require_once('agora_script_base.class.php');

class script_upgrade_moodle extends agora_script_base{

	public $title = 'Actualitza Moodle';
	public $info = "Executa el procès d'actualització de Moodle";
	public $cron = false;
	protected $test = false;
	public $cli = true;
	public $api = true;

	protected function _execute($params = array(), $execute = true){
		global $CFG, $DB, $OUTPUT, $agora;

		$interactive = false;
		$allow_unstable = false;

		require_once($CFG->libdir.'/upgradelib.php');     // general upgrade/install related functions
		require_once($CFG->libdir.'/environmentlib.php');
		if (empty($CFG->version)) {
		    mtrace(get_string('missingconfigversion', 'debug'));
		    return false;
		}

		require("$CFG->dirroot/version.php");       // defines $version, $release, $branch and $maturity
		$CFG->target_release = $release;            // used during installation and upgrades

		if ($version < $CFG->version) {
		    mtrace(get_string('downgradedcore', 'error'));
		    return false;
		}

		$oldversion = "$CFG->release ($CFG->version)";
		$newversion = "$release ($version)";

		if (!moodle_needs_upgrading()) {
		    mtrace(get_string('cliupgradenoneed', 'core_admin', $newversion));
		    return true;
		}

		// Test environment first.
		list($envstatus, $environment_results) = check_moodle_environment(normalize_version($release), ENV_SELECT_RELEASE);
		if (!$envstatus) {
		    $errors = environment_get_errors($environment_results);
		    mtrace(get_string('environment', 'admin'));
		    foreach ($errors as $error) {
		        list($info, $report) = $error;
		        echo "!! $info !!\n$report\n\n";
		    }
		    return true;
		}

		// Test plugin dependencies.
		$failed = array();
		if (!core_plugin_manager::instance()->all_plugins_ok($version, $failed)) {
		    mtrace(get_string('pluginscheckfailed', 'admin', array('pluginslist' => implode(', ', array_unique($failed)))));
		    mtrace(get_string('pluginschecktodo', 'admin'));
		    return false;
		}

		// make sure we are upgrading to a stable release or display a warning
		if (isset($maturity)) {
		    if (($maturity < MATURITY_STABLE) and !$allow_unstable) {
		        $maturitylevel = get_string('maturity'.$maturity, 'admin');
	            mtrace(get_string('maturitycorewarning', 'admin', $maturitylevel));
	            mtrace(get_string('maturityallowunstable', 'admin'));
	            return false;
		    }
		}

		if ($version > $CFG->version) {
		    // We purge all of MUC's caches here.
		    // Caches are disabled for upgrade by CACHE_DISABLE_ALL so we must set the first arg to true.
		    // This ensures a real config object is loaded and the stores will be purged.
		    // This is the only way we can purge custom caches such as memcache or APC.
		    // Note: all other calls to caches will still used the disabled API.
		    cache_helper::purge_all(true);
		    upgrade_core($version, true);
		}
		set_config('release', $release);
		set_config('branch', $branch);

		// unconditionally upgrade
		upgrade_noncore(true);

		// log in as admin - we need doanything permission when applying defaults
		\core\session\manager::set_user(get_admin());

		// apply all default settings, just in case do it twice to fill all defaults
		admin_apply_default_settings(NULL, false);
		admin_apply_default_settings(NULL, false);

		echo get_string('cliupgradefinished', 'admin')."\n";

		return true;
	}

}
