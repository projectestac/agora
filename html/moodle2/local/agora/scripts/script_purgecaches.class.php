<?php

require_once('agora_script_base.class.php');

class script_purgecaches extends agora_script_base{

	public $title = 'Purga cachés';
	public $info = "Elimina tota la informació de la caché de Moodle";
	public $cron = false;
	protected $test = false;
	public $cli = true;
	public $api = true;

	protected function _execute($params = array(), $execute = true){
		purge_all_caches();
		return true;
	}

}
