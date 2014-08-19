<?php

function is_agora(){
	global $CFG;
	return isset($CFG->isagora) && $CFG->isagora;
}

function is_marsupial(){
    global $CFG;
    return isset($CFG->ismarsupial) && $CFG->ismarsupial;
}

function is_eoi(){
    global $CFG;
    return isset($CFG->iseoi) && $CFG->iseoi;
}

function is_portal(){
    global $CFG;
    return isset($CFG->isportal) && $CFG->isportal;
}

function is_xtecadmin($user=null){
	global $USER;
    if (empty($user)) $user = $USER;
	return isset($user)
		   && array_key_exists('username', $user)
		   && $user->username=='xtecadmin';
}

function require_xtecadmin($canbesiteadmin = false){
	require_login(0, false);
    if(!$canbesiteadmin){
        if(!is_xtecadmin()){
            print_error('noxtecadmin');
        }
    } else {
        if(is_agora() && !is_xtecadmin()){
            print_error('noxtecadmin');
        }
        if(!is_siteadmin()){
            print_error('no_siteadmin');
        }
    }

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

//Execute a command via CLI
function run_cli($command, $output_file = false, $append = true, $background = true, $params = array()){
    global $CFG;

    $command = $CFG->dirroot . '/'.$command;

    if(isset($CFG->dnscentre)){
        $params['ccentre'] = $CFG->dnscentre;
    }
    if($params && is_array($params)){
        foreach($params as $key => $value){
            $command .= ' --'.$key.'='.$value;
        }
    }

    if(isset($CFG->clicommand)){
        $cmd = $CFG->clicommand;
    } else {
        $cmd = "php";
    }

    $command = 'nohup '.$cmd.' '.$command;

    if($append){
        $command .= ' >> ';
    } else {
        $command .= ' > ';
    }

    if(empty($output_file)){
        if($background){
            $output_file = '/dev/null';
        } else {
            $output_file = '/dev/stdout';
        }
    }

    $command .= $output_file.' 2>&1 ';

    if($background){
         $command .= ' & echo $!';
    }

    // Això és una marranada a evitar...
    if(isset($CFG->cli_ldlibrarypath)){
        putenv('LD_LIBRARY_PATH='.$CFG->cli_ldlibrarypath);
    }
    if(isset($CFG->cli_path)){
        putenv('PATH='.$CFG->cli_path);
    }

    $output = "";
    $return_var = "";
    exec($command ,$output, $return_var);

    if (is_xtecadmin()){
        mtrace($command,'<br/>');
        print_object($output);
        mtrace("Return var: $return_var",'<br/>');
    }

    return $return_var;
}

//Executes a cron via CLI
function run_cli_cron($background = true){
    global $CFG;

    $command = $CFG->admin.'/cli/cron.php';

    $output_file = false;
    // $CFG->savecronlog must be saved on DB
    if(isset($CFG->savecronlog) && !empty($CFG->savecronlog)) {
        if(isset($CFG->usu1repofiles) && !empty($CFG->usu1repofiles)) {
            $output_dir = $CFG->usu1repofiles.'/crons';
        } else {
            $output_dir = $CFG->dataroot.'/crons';
        }
        $result = make_writable_directory($output_dir, false);
        if($result){
            $output_file = $output_dir.'/cron_'.$CFG->dbuser.'_'.date("Ymd").'.log';
        }
    }
    $append = true;
    return run_cli($command, $output_file, $append, $background);
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
    if (is_agora()){
		
        // Only enabled in marsupial Moodles
        if (!is_marsupial() && ($mod=='rcontent' || $mod=='rscorm' || $mod=='atria' || $mod=='rcommon' || $mod=='my_books' || $mod=='rgrade')){
            return false;
        }
        // Only enabled in EOI Moodles
        if (!is_eoi() && ($mod=='eoicampus')){
            return false;
        }

        // Disabled in all Agora Moodles
        if($mod=='clean' || $mod=='afterburner' || $mod=='anomaly' || $mod=='arialist' || $mod == 'base' || $mod == 'binarius' || $mod == 'boxxie' || $mod == 'brick' || $mod == 'canvas' || $mod == 'formal_white' || $mod == 'formfactor' || $mod == 'fusion' || $mod == 'leatherbound' || $mod == 'magazine' || $mod == 'nimble' || $mod == 'nonzero' || $mod=='overlay' || $mod=='serenity' || $mod=='sky_high' || $mod=='splash' || $mod=='standard' || $mod=='standardold' || $mod=='chat' || $mod == 'alfresco' || $mod == 'rscorm' || $mod == 'rscormreport_basic' || $mod == 'rscormreport_graphs' || $mod == 'rscormreport_interactions'){
            return false;
        }
    }
    return true;
}


function agora_course_print_navlinks($course, $section = 0){
    global $CFG, $OUTPUT;
    $context = context_course::instance($course->id, MUST_EXIST);
    echo '<div class="agora_navbar">';
    //Show reports
    $reportavailable = false;
    if (has_capability('moodle/grade:viewall', $context)) {
        $reportavailable = true;
    } else if (!empty($course->showgrades)) {
        if ($reports = core_component::get_plugin_list('gradereport')) {     // Get all installed reports
            arsort($reports); // user is last, we want to test it first
            foreach ($reports as $plugin => $pluginname) {
                if (has_capability('gradereport/' . $plugin . ':view', $context)) {
                    //stop when the first visible plugin is found
                    $reportavailable = true;
                    break;
                }
            }
        }
    }
    if ($reportavailable) {
        $icon=  $OUTPUT->pix_icon('i/grades', "");
        echo html_writer::link($CFG->wwwroot.'/grade/report/index.php?id=' . $course->id ,$icon.get_string('grades'));
    }
    echo '</div>';
}
