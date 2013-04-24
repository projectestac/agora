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

function get_protected_agora(){
	global $CFG, $USER;
	return !is_agora() || is_xtecadmin();
}

/**
 * Check if the current time is considered rush hour in order to apply restrictions
 *
 * @global Object $CFG
 * @return Boolean true if restrictions apply, false otherwise.
 */
function is_rush_hour(){
	global $CFG;
    
    // If param is not defined or is false, there's no rush hour.
	if (!isset($CFG->enable_hour_restrictions) || ($CFG->enable_hour_restrictions == false)) {
		return false;
    }
	
    // Rush hour is only defined from monday to friday
	$weekday = idate('w');
	if ($weekday == 0 || $weekday == 6) {
        return false;
    }

    // Get the hour frames
    if (!isset($CFG->hour_restrictions) || empty($CFG->hour_restrictions)) {
        // Default values
        $timeframes = array(array('start' => '9:00', 'end' => '13:59'),
                            array('start' => '15:00', 'end' => '16:59'));
    } else {
        $timeframes = $CFG->hour_restrictions;
    }

    // Check the hour frames
    $hour = idate('H');
	$minutes = idate('i');
    $now_minutes = ($hour * 60) + $minutes;
    
    foreach ($timeframes as $frame) {
        $start = explode(':', $frame['start']);
        $end = explode(':', $frame['end']);
        
        $start_minutes = ((int)$start[0] * 60) + (int)$start[1];
        $end_minutes = ((int)$end[0] * 60) + (int)$end[1];
        
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
         ((!isset($CFG->ismarsupial) || !$CFG->ismarsupial) && ($mod=='rcontent' || $mod=='rscorm' || $mod=='atria' || $mod=='rcommon' || $mod=='my_books') ) 
         || ((!isset($CFG->iseoi) || !$CFG->iseoi) && ($mod=='eoicampus') ) 
         || ((!isset($CFG->isportal) || !$CFG->isportal) && $mod == 'admin_service' ) 
         || ( $mod=='afterburner' || $mod=='anomaly' || $mod=='arialist' || $mod == 'base' || $mod == 'binarius' || $mod == 'boxxie' || $mod == 'brick' || $mod == 'canvas' || $mod == 'formal_white' || $mod == 'formfactor' || $mod == 'fusion' || $mod == 'leatherbound' || $mod == 'magazine' || $mod == 'nimble' || $mod == 'nonzero' || $mod=='overlay' || $mod=='serenity' || $mod=='sky_high' || $mod=='splash' || $mod=='standard' || $mod=='standardold' || (!$CFG->enabledevicedetection && $mod=='mymobile' ) ) ) {        
        return false;
    }
    return true;
}
