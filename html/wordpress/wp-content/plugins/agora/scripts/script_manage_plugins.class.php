<?php

require_once('agora_script_base.class.php');

class script_manage_plugins extends agora_script_base{

	public $title = 'Manage plugin';
	public $info = "Activa / Desactiva un plugin";


	public function params(){
		$params = array();
		$params['activationfile'] = "";
		$params['onoff'] = "";
		return $params;
	}

	protected function _execute($params = array()){
		switch ($params['onoff']) {
			case 'on':
				$result = activate_plugin($params['activationfile']);
				if ( is_wp_error( $result ) ) {
					echo $result->get_error_message();
				}
				break;
			case 'off':
				$result = deactivate_plugins($params['activationfile']);
				if ( is_wp_error( $result ) ) {
					echo $result->get_error_message();
				}
				break;
			default:
				echo 'onoff només admet valors on o off';
				return false;
		}
		return true;
	}
}