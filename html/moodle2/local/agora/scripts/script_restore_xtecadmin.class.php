<?php

require_once('agora_script_base.class.php');

class script_restore_xtecadmin extends agora_script_base{

	public $title = 'Restaura XTECadmin';
	public $info = "Restaura l'usuari XTECadmin de la plataforma";
	public $cron = false;
	protected $test = true;
	public $cli = true;
	public $api = true;

	protected function _execute($params = array(), $execute = true){
		global $CFG, $DB, $OUTPUT, $agora;
		$return = false;

		$xtecadmin = $DB->get_record('user', array('username'=> 'xtecadmin', 'deleted'=> 0));
		if(!$execute){
			if (!$xtecadmin) {
				echo $OUTPUT->notification('XTECadmin does not exists');
			} else {
				echo $OUTPUT->notification('XTECadmin exists', 'notifysuccess');
				if (!is_siteadmin($xtecadmin)) {
					echo $OUTPUT->notification('Is not siteadmin!');
				} else {
					echo $OUTPUT->notification('Is siteadmin!', 'notifysuccess');
					$mainadmin = get_admin();
	   				if ($xtecadmin->id != $mainadmin->id) {
	   					echo $OUTPUT->notification('Is not main admin!');
	   				} else {
	   					echo $OUTPUT->notification('Is the main admin!', 'notifysuccess');
	   				}
				}
			}
			return (boolean)$xtecadmin;
		}

	    if (!$xtecadmin) {
	    	// Create xtecadmin
	        $xtecadmin = create_user_record('xtecadmin', $agora['config']['xtecadmin'], 'manual');
			mtrace('Xtecadmin created', '<br>');
		} else {
			mtrace('Xtecadmin exists', '<br>');
		}

		// Restore to its original settings
		$xtecadmin->password = $agora['config']['xtecadmin'];
		$xtecadmin->firstname = 'Administrador/a';
		$xtecadmin->lastname = 'XTEC';
		$xtecadmin->email = 'agora@xtec.cat';
		$xtecadmin->emailstop = 1;
		$xtecadmin->country = 'es';
		$xtecadmin->lang = 'ca';
		$xtecadmin->timezone = 99;
		$xtecadmin->description = 'Administrador/a de la XTEC';
		$xtecadmin->mailformat = 0;
		$xtecadmin->maildigest = 0;
		$xtecadmin->maildisplay = 1;
		$xtecadmin->trackforums = 0;
		$DB->update_record('user',$xtecadmin);

	    // Set as siteadmin
	    if (!is_siteadmin($xtecadmin)) {
			// The main admin is the last
			$admins = explode(',', $CFG->siteadmins);
			$admins[] = $xtecadmin->id;
	        set_config('siteadmins', implode(',', $admins));
	        mtrace('Set as siteadmin', '<br>');
	        mtrace('Set as main admin', '<br>');
		} else {
			mtrace('It is siteadmin', '<br>');
	   		$mainadmin = get_admin();
	   		if ($xtecadmin->id != $mainadmin->id) {
				$admins_aux = explode(',', $CFG->siteadmins);
				$admins = array();
				// Reorder it to add it at the end
				foreach ($admins_aux as $admin) {
					if ($admin == $xtecadmin->id) {
						$admins[] = $admin;
					}
				}
				$admins[] = $xtecadmin->id;
		        set_config('siteadmins', implode(',', $admins));
		        mtrace('Set as main admin', '<br>');
		   	} else {
		   		mtrace('It is main admin', '<br>');
		   	}
		}

		return true;
	}

	function is_visible() {
		if (is_agora()) {
			return true;
        }
        return false;
	}
}
