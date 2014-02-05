<?php

function is_agora(){
	global $CFG;
	return isset($CFG->isagora) && $CFG->isagora;
}

function is_xtecadmin($user=null){
	global $USER;
        if (empty($user)) $user = $USER;
	return isset($user) 
		   && array_key_exists('username', $user)
		   && $user->username=='xtecadmin';
}

function require_xtecadmin(){
	require_login(0, false);
        if (!is_xtecadmin())
                print_error('noxtecadmin');

}

function get_protected_agora(){
	global $CFG, $USER;
	return !is_agora() || is_xtecadmin();
}

function get_debug(){
	global $CFG;

	//Consult the cookie (only changes if the cookie is enabled), if not, takes default settings
	if(isset($_COOKIE['agora_debug']) && $_COOKIE['agora_debug'] == 1){
	        $CFG->debug = E_ALL | E_STRICT;
	        $CFG->debugdisplay = 1;
        	error_reporting($CFG->debug);
	        @ini_set('display_errors', '1');
        	@ini_set('log_errors', '0');
	}
}

function local_agora_extends_settings_navigation($settingsnav, $context) {
    if(is_xtecadmin()){
        if ($settingnode = $settingsnav->find('root', navigation_node::TYPE_SETTING)) {
	    $agora_node = $settingnode->add('Àgora');
		if(isset($_COOKIE['agora_debug']) && $_COOKIE['agora_debug'] == 1){
	                $agora_node->add(get_string('disable').' '.get_string('debug','admin'), $CFG->wwwroot.'/local/agora/debug.php?agora_debug=0');
        	}
	        else{
        	        $agora_node->add(get_string('enable').' '.get_string('debug','admin'), $CFG->wwwroot.'/local/agora/debug.php?agora_debug=1');
	        }
	}
    }
}


/**
 * Check if the current time is considered rush hour in order to apply restrictions
 *
 * @global Object $CFG
 * @return Boolean true if restrictions apply, false otherwise.
 */
function is_rush_hour() {
    global $CFG;

    // If param is not defined or is false, there's no rush hour.
    if (!isset($CFG->enable_hour_restrictions) || ($CFG->enable_hour_restrictions == false)) {
        return false;
    }

    // Get the hour frames
    if (!isset($CFG->hour_restrictions) || empty($CFG->hour_restrictions)) {
        // Default values
        $timeframes = array(array('start' => '9:00', 'end' => '13:59', 'days' => '1|2|3|4|5'),
                            array('start' => '15:00', 'end' => '16:59', 'days' => '1|2|3|4|5'));
    } else {
        // Check for serialized data in $CFG->hour_restrictions
        $data = @unserialize($CFG->hour_restrictions);
        if ($CFG->hour_restrictions === 'b:0;' || $data !== false) {
            $timeframes = $data;
        } else {
            $timeframes = $CFG->hour_restrictions;
        }
    }

    // Check the hour frames
    $weekday = idate('w'); // 0 = sunday
    $hour = idate('H');
    $minutes = idate('i');
    $now_minutes = ($hour * 60) + $minutes;

    foreach ($timeframes as $frame) {
        $start = explode(':', $frame['start']);
        $end = explode(':', $frame['end']);
        $days = explode('|', $frame['days']);

        // Check if "today" is in the list of allowed days
        if (!in_array($weekday, $days)) {
            continue;
        }

        $start_minutes = ((int) $start[0] * 60) + (int) $start[1];
        $end_minutes = ((int) $end[0] * 60) + (int) $end[1];

        // Check if current time is in the frame
        if (($now_minutes >= $start_minutes) && ($now_minutes < $end_minutes)) {
            return true;
        }
    }

    return false;
}

/**
 * Check if specified module/block name is enabled
 * @global Object $CFG
 * @param String $mod module name 
 * @return Boolean True if specified module name is enabled and false otherwise.
 *
 * @author sarjona
 **/
function is_enabled_in_agora ($mod){
    global $CFG;
    if ( (isset($CFG->isagora) && $CFG->isagora) &&
         (((!isset($CFG->ismarsupial) || !$CFG->ismarsupial) && ($mod=='rcontent' || $mod=='rscorm' || $mod=='atria' || $mod=='rcommon' || $mod=='my_books' || $mod=='rgrade') ) 
         || ((!isset($CFG->iseoi) || !$CFG->iseoi) && ($mod=='eoicampus') ) 
         || ((!isset($CFG->isportal) || !$CFG->isportal) && $mod == 'admin_service' ) 
         || ( $mod=='afterburner' || $mod=='anomaly' || $mod=='arialist' || $mod == 'base' || $mod == 'binarius' || $mod == 'boxxie' || $mod == 'brick' || $mod == 'canvas' || $mod == 'formal_white' || $mod == 'formfactor' || $mod == 'fusion' || $mod == 'leatherbound' || $mod == 'magazine' || $mod == 'nimble' || $mod == 'nonzero' || $mod=='overlay' || $mod=='serenity' || $mod=='sky_high' || $mod=='splash' || $mod=='standard' || $mod=='standardold' || (!$CFG->enabledevicedetection && $mod=='mymobile' )) ) 
         || (!is_xtecadmin() && $mod == 'alfresco') ) {        
        return false;
    }
    return true;
}
