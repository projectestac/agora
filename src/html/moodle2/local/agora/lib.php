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

function is_rush_hour(){
	global $CFG;
	if(!isset($CFG->enable_hour_restrictions) || ((bool)$CFG->enable_hour_restrictions===FALSE) )
		return false;
	
	$weekday = idate('w');
	if($weekday == 0 || $weekday == 6)
		return false;
	$hour = idate('H');
	if($hour < 9)
		return false;
	if($hour == 14)
		return false;
	if($hour >= 17)
		return false;
	return true;
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
         || ((!isset($CFG->isportal) || !$CFG->isportal) && $mod == 'admin_service' )  ) {
        return false;
    }
    return true;
}
