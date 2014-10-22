<?php

require_once('agora_script_base.class.php');

class script_health extends agora_script_base{

	public $title = 'Estat de salut';
	public $info = "Revisa diversos paràmetres per veure l'estat de Salut del Moodle";
	public $cron = false;
	protected $test = false;
	public $api = false;

	protected function _execute($params = array(), $execute = true){
		global $CFG, $DB, $OUTPUT;

		echo $OUTPUT->heading('Health');
		$health = true;
		if(moodle_needs_upgrading()){
			$health = false;
			echo $OUTPUT->notification('<a href="'.$CFG->wwwroot.'/admin/index.php">Moodle upgrade pending!</a>');
		}

		if(CLI_MAINTENANCE){
			$health = false;
			echo $OUTPUT->notification("CLI maintenance mode active");
		}

		if (version_compare(phpversion(), '5.3.3') < 0) {
			$health = false;
		    $phpversion = phpversion();
		    echo $OUTPUT->notification("Moodle 2.5 or later requires at least PHP 5.3.3 (currently using version $phpversion)");
		}

		// make sure iconv is available and actually works
		if (!function_exists('iconv')) {
			$health = false;
		    // this should not happen, this must be very borked install
		    echo $OUTPUT->notification('Moodle requires the iconv PHP extension. Please install or enable the iconv extension.');
		}

		if (ini_get_bool('session.auto_start')) {
			$health = false;
		    echo $OUTPUT->notification(get_string('phpvaroff', 'debug', (object)array('name'=>'session.auto_start', 'link'=>$documentationlink)));
		}

		if (ini_get_bool('magic_quotes_runtime')) {
			$health = false;
		    echo $OUTPUT->notification(get_string('phpvaroff', 'debug', (object)array('name'=>'magic_quotes_runtime', 'link'=>$documentationlink)));
		}

		if (!ini_get_bool('file_uploads')) {
			$health = false;
		    echo $OUTPUT->notification(get_string('phpvaron', 'debug', (object)array('name'=>'file_uploads', 'link'=>$documentationlink)));
		}

		if (function_exists('is_float_problem')) {
			if (is_float_problem()) {
				$health = false;
			    echo $OUTPUT->notification(get_string('phpfloatproblem', 'admin', $documentationlink));
			}
		}

		$lastcron = $DB->get_field_sql('SELECT MAX(lastcron) FROM {modules}');
		$cronoverdue = ($lastcron < time() - 3600 * 24);
		if($cronoverdue){
			$health = false;
			echo $OUTPUT->notification('<a href="'.$CFG->wwwroot.'/admin/cron.php">Ojo! Últim cron fet el '.date('d/m/Y h:i', $lastcron).'</a>');
		} else {
			echo $OUTPUT->notification('Últim cron fet el '.date('d/m/Y h:i', $lastcron), 'notifysuccess');
		}

		$dbproblems = $DB->diagnose();
		if(!empty($dbproblems)){
			$health = false;
			echo $OUTPUT->notification($dbproblems);
		}

		if($health){
			echo $OUTPUT->notification('General Moodle Health success!!!','notifysuccess');
			echo 'Use the Moodle health check on <a href="'.$CFG->wwwroot.'/admin/tool/health/">'.get_string('pluginname', 'tool_health').'</a>';
		}

		$config = cache_config::instance();
        $stores = $config->get_all_stores();
        if(isset($stores['localmemcache'])){
			$store = $stores['localmemcache'];
        	$class = $store['class'];
			$instance = new $class($store['name'], $store['configuration']);

			$memcaches = $instance->get_connections();
			print_collapsible_region_start('', 'memcache',$OUTPUT->heading('Memcache'), '', true);
			foreach($memcaches as $memcache){
				$stats = $memcache->getExtendedStats();
				print_object($stats);
			}
			print_collapsible_region_end();
		}

		print_collapsible_region_start('', 'info',$OUTPUT->heading('Info útil'), '', true);
		$serverip = (isset($_SERVER['SERVER_ADDR']))?$_SERVER['SERVER_ADDR']:'¿?';
		echo '<ul>';
		echo  "<li><strong>WWWRoot</strong>: $CFG->wwwroot</li>";
		echo  "<li><strong>Server IP</strong>: $serverip</li>";
		echo  "<li><strong>DirRoot</strong>: $CFG->dirroot</li>";
		echo  "<li><strong>DataRoot</strong>: $CFG->dataroot</li>";
		echo  "<li><strong>Hostname</strong>: ".@gethostbyaddr($serverip)."</li>";
		//nom del servidor
		//$this->nslookup($serverip);
		echo  '</ul><ul>';
		echo  "<li><strong>DBHost</strong>: $CFG->dbhost</li>";
		echo  "<li><strong>DBName</strong>: $CFG->dbname</li>";
		echo  "<li><strong>DBtype</strong>: $CFG->dbtype</li>";
		echo  '</ul>';

		echo  "<p>El valor de ignore_user_abort és ".ignore_user_abort().".</p>";
		print_collapsible_region_end();

		print_collapsible_region_start('', 'server',$OUTPUT->heading('Variable $_SERVER'), '', true);
		print_object($_SERVER);
		print_collapsible_region_end();

		//variable cfg
		print_collapsible_region_start('', 'cfg',$OUTPUT->heading('Variable $CFG'), '', true);
		$cf = $CFG;
		unset($cf->dbpass);
		if(isset($cf->config_php_settings) && isset($cf->config_php_settings['dbpass'])){
			unset($cf->config_php_settings['dbpass']);
		}
		print_object($cf);
		print_collapsible_region_end();

		echo '<br/>';
		return $health;
	}
}