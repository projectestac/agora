<?PHP  // $Id: lib.php,v 1.3 2004/06/09 22:35:27 gustav_delius Exp $

/// Library of functions and constants for module NEWMODULE
/// (replace NEWMODULE with the name of your module and delete this line)

/*
$INDICADORS_CONSTANT = 7;     /// for example


function indicadors_add_instance($indicadors) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will create a new instance and return the id number 
/// of the new instance.

    $indicadors->timemodified = time();

    # May have to add extra stuff in here #
    //error("IS A SINGLETON MODULE FOR ADMINS");
    return insert_record("indicadors", $indicadors);
}


function indicadors_update_instance($indicadors) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will update an existing instance with new data.

    $indicadors->timemodified = time();
    $indicadors->id = $indicadors->instance;

    # May have to add extra stuff in here #
	//error("IS A SINGLETON MODULE FOR ADMINS");
    return update_record("indicadors", $indicadors);
}


function indicadors_delete_instance($id) {
/// Given an ID of an instance of this module, 
/// this function will permanently delete the instance 
/// and any data that depends on it.  

    if (! $indicadors = get_record("indicadors", "id", "$id")) {
        return false;
    }

    $result = true;

    # Delete any dependent records here #

    if (! delete_records("indicadors", "id", "$indicadors->id")) {
        $result = false;
    }

    return $result;
}

function indicadors_user_outline($course, $user, $mod, $indicadors) {
/// Return a small object with summary information about what a 
/// user has done with a given particular instance of this module
/// Used for user activity reports.
/// $return->time = the time they did it
/// $return->info = a short text description

    return $return;
}

function indicadors_user_complete($course, $user, $mod, $indicadors) {
/// Print a detailed representation of what a  user has done with 
/// a given particular instance of this module, for user activity reports.

    return true;
}

function indicadors_print_recent_activity($course, $isteacher, $timestart) {
/// Given a course and a time, this module should find recent activity 
/// that has occurred in NEWMODULE activities and print it out. 
/// Return true if there was output, or false is there was none.

    global $CFG;

    return false;  //  True if anything was printed, otherwise false 
}
*/
function indicadors_cron () {
/// Function to be run periodically according to the moodle cron
/// This function searches for things that need to be done, such 
/// as sending out mail, toggling flags etc ... 

 	global $CFG;
	$temps = time();
 	//$delay = 60;
 	$delay = 5;
 	$temps = $temps - (60*$delay);
 	//$query = "SELECT userid, COUNT(*) as times FROM {$CFG->prefix}log WHERE time > $temps AND action <> 'login' AND action <> 'logout' AND action <> 'error' GROUP BY userid";
 	$query = "SELECT COUNT(*) as times FROM {$CFG->prefix}log WHERE time > $temps";
	$query2= "SELECT pg_stat_get_backend_pid(S.backendid) AS procpid,pg_stat_get_backend_activity(S.backendid) AS current_query FROM (SELECT pg_stat_get_backend_idset() AS backendid) AS S";
 	$consultes = get_record_sql($query);
// 	if (!$consultes){
//		$consultes = array();
//	}
// 	unset($users_concurrents);
//	print_object($consultes);
// 	$users_concurrents = count($consultes);
// 	$indicador->number_rows=$users_concurrents;
	$indicador->number_rows=$consultes->times;
 	$temps = time();
 	$indicador->time= $temps;
	$consultes = get_records_sql($query2);
	unset($num_backends);
	$num_backends = count($consultes);
 	$indicador->number_backends=$num_backends;
 	if (!insert_record('indicadors_cron', $indicador)){
		return false;
 	}
 	 	
    return true;
}



function selector_entorns(){
	global $ADM;
	$connexions = array();
	$connexions = entorns_disponibles();
	$text = '<table><tr><td>';
	$text .= '<b>'.get_string('select_clients','block_admin_service').'</b><td>';
	$text.= '<td><from action="index.php" method="post">' .
			'<select name="entorn" onChange="this.submit();">';
	$text.='<option value="-1">'.get_string('select_clients','block_admin_service').'</option>';
	foreach($connexions as $connexio){
		$sel = ($connexio->id == $ADM->entorn_actual->id)?' selected="selected"':'';
		$text.= '<option value="'.$connexio->id.'"'.$sel.'>'. $connexio->nom_client.'</option>';
	}
	$text.='</select></form>';
	$text.= '</td></tr></table>';
	return $text;
}
?>