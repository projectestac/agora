<?php

function is_agora() {
    global $CFG;
    return isset($CFG->isagora) && $CFG->isagora;
}

function is_marsupial() {
    global $CFG;
    return isset($CFG->ismarsupial) && $CFG->ismarsupial;
}

function is_eoi() {
    global $CFG;
    return isset($CFG->iseoi) && $CFG->iseoi;
}

function is_portal() {
    global $CFG;
    return isset($CFG->isportal) && $CFG->isportal;
}

function is_xtecadmin($user=null) {
    global $USER;
    if (empty($user)) {
        $user = $USER;
    }
    return isset($user)
           && array_key_exists('username', $user)
           && $user->username == 'xtecadmin';
}

function require_xtecadmin($canbesiteadmin = false) {
    require_login(0, false);
    if (!$canbesiteadmin) {
        if (!is_xtecadmin()) {
            print_error('noxtecadmin');
        }
    } else {
        if (is_agora() && !is_xtecadmin()) {
            print_error('noxtecadmin');
        }
        if (!is_siteadmin()) {
            print_error('no_siteadmin');
        }
    }

}

function get_protected_agora() {
    global $CFG, $USER;
    return !is_agora() || is_xtecadmin();
}

function get_debug() {
    global $CFG;

    // Get the cookie (only changes if the cookie is enabled), if not, takes default settings
    if (isset($_COOKIE['agora_debug']) && $_COOKIE['agora_debug'] == 1) {
            $CFG->debug = E_ALL | E_STRICT;
            $CFG->debugdisplay = 1;
            error_reporting($CFG->debug);
            @ini_set('display_errors', '1');
            @ini_set('log_errors', '0');
    }
}

// Execute a command via CLI
function run_cli($command, $outputfile = false, $append = true, $background = true, $params = array()) {
    global $CFG;

    $command = $CFG->dirroot . '/'.$command;

    if (isset($CFG->dnscentre)) {
        $params['ccentre'] = $CFG->dnscentre;
    }
    if ($params && is_array($params)) {
        foreach ($params as $key => $value) {
            $command .= ' --'.$key.'='.$value;
        }
    }

    if (isset($CFG->clicommand)) {
        $cmd = $CFG->clicommand;
    } else {
        $cmd = "php";
    }

    $command = 'nohup '.$cmd.' '.$command;

    if ($append) {
        $command .= ' >> ';
    } else {
        $command .= ' > ';
    }

    if (empty($outputfile)) {
        if ($background) {
            $outputfile = '/dev/null';
        } else {
            $outputfile = '/dev/stdout';
        }
    }

    $command .= $outputfile.' 2>&1 ';

    if ($background) {
         $command .= ' & echo $!';
    }

    // Això és una marranada a evitar...
    if (isset($CFG->cli_ldlibrarypath)) {
        putenv('LD_LIBRARY_PATH='.$CFG->cli_ldlibrarypath);
    }
    if (isset($CFG->cli_path)) {
        putenv('PATH='.$CFG->cli_path);
    }

    $output = "";
    $returnvar = "";
    exec($command, $output, $returnvar);

    if (is_xtecadmin()) {
        mtrace($command, '<br/>');
        print_object($output);
        mtrace("Return var: $returnvar", '<br/>');
    }

    return $returnvar;
}

// Executes a cron via CLI
function run_cli_cron($background = true) {
    global $CFG, $DB;

    $command = $CFG->admin.'/cli/cron.php';

    $outputfile = false;
    $savecronlog = $DB->get_field('config', 'value', array('name' => 'savecronlog'));
    // $CFG->savecronlog must be saved on DB
    if (isset($savecronlog) && !empty($savecronlog)) {
        $outputdir = get_admin_datadir_folder('crons', false);
        if ($outputdir) {
            $outputfile = $outputdir.'/cron_'.$CFG->siteidentifier.'_'.date("Ymd").'.log';
        }
    }
    $append = true;
    return run_cli($command, $outputfile, $append, $background);
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
    $nowminutes = ($hour * 60) + $minutes;

    foreach ($timeframes as $frame) {
        $start = explode(':', $frame['start']);
        $end = explode(':', $frame['end']);
        $days = explode('|', $frame['days']);

        // Check if "today" is in the list of allowed days
        if (!in_array($weekday, $days)) {
            continue;
        }

        $startminutes = ((int) $start[0] * 60) + (int) $start[1];
        $endminutes = ((int) $end[0] * 60) + (int) $end[1];

        // Check if current time is in the frame
        if (($nowminutes >= $startminutes) && ($nowminutes < $endminutes)) {
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
function is_enabled_in_agora ($mod) {
    if (is_agora()) {

        // Only enabled in marsupial Moodles
        if (!is_marsupial() && ($mod == 'rcontent' || $mod == 'rscorm' || $mod == 'atria' || $mod == 'rcommon' || $mod == 'my_books' || $mod == 'rgrade')) {
            return false;
        }
        // Only enabled in EOI Moodles
        if (!is_eoi() && ($mod == 'eoicampus')) {
            return false;
        }

        // Disabled in all Agora Moodles
        if ($mod == 'clean' || $mod == 'afterburner' || $mod == 'anomaly' || $mod == 'arialist' || $mod == 'base' || $mod == 'binarius' || $mod == 'boxxie' || $mod == 'brick' ||
            $mod == 'canvas' || $mod == 'formal_white' || $mod == 'formfactor' || $mod == 'fusion' || $mod == 'leatherbound' || $mod == 'magazine' || $mod == 'nimble' ||
            $mod == 'nonzero' || $mod == 'overlay' || $mod == 'serenity' || $mod == 'sky_high' || $mod == 'splash' || $mod == 'standard' || $mod == 'standardold' ||
            $mod == 'chat' || $mod == 'alfresco' || $mod == 'rscorm' || $mod == 'rscormreport_basic' || $mod == 'rscormreport_graphs' || $mod == 'rscormreport_interactions') {
            return false;
        }
    }
    return true;
}


function agora_course_print_navlinks($course, $section = 0) {
    global $CFG, $OUTPUT;
    $context = context_course::instance($course->id, MUST_EXIST);
    echo '<div class="agora_navbar">';
    // Show reports
    $reportavailable = false;
    if (!empty($course->showgrades)) {
        if (has_capability('moodle/grade:viewall', $context)) {
            $reportavailable = true;
        } else {
            if ($reports = core_component::get_plugin_list('gradereport')) {     // Get all installed reports
                arsort($reports); // user is last, we want to test it first
                foreach ($reports as $plugin => $pluginname) {
                    if (has_capability('gradereport/' . $plugin . ':view', $context)) {
                        // Stop when the first visible plugin is found
                        $reportavailable = true;
                        break;
                    }
                }
            }
        }
    }
    if ($reportavailable) {
        $icon = $OUTPUT->pix_icon('i/grades', "");
        echo html_writer::link($CFG->wwwroot.'/grade/report/index.php?id=' . $course->id, $icon.get_string('grades'));
    }
    echo '</div>';
}

function local_agora_extends_navigation(global_navigation $navigation) {
    global $DB, $CFG;
    if (isloggedin() && is_service_enabled('nodes') && $DB->record_exists('oauth_clients', array('client_id' => 'nodes'))) {
        $nodesurl = $CFG->wwwroot.'/local/agora/login_service.php?service=nodes';
        $navigation->add(get_string('login_nodes', 'local_agora'), $nodesurl, navigation_node::TYPE_SETTING, null, get_string('login_nodes', 'local_agora'));
        //$message->icon = 'i/email';

    }
}

function is_service_enabled($service) {
    if(!is_agora()) return false;

    global $school_info;
    return isset($school_info['id_'.$service]) && !empty($school_info['id_'.$service]);
}

function get_service_url($service) {
    global $CFG;
    if (is_service_enabled($service)) {
        if ($service == 'nodes') {
            return $CFG->wwwroot.'/../';
        }
        return $CFG->wwwroot.'/../'.$service.'/';
    }
    return false;
}

/**
 * Return the directory to store admin things
 *
 * @param bool $exceptiononerror throw exception if error encountered creating file
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function get_admin_datadir($exceptiononerror = true) {
    global $agora, $CFG;
    if (isset($CFG->admindatadir)) {
        return $CFG->admindatadir;
    }

    if (isset($agora['admin']['datadir'])) {
        $dir = $agora['server']['root'].'/'.$agora['admin']['datadir'].'/data/moodle2/'.$CFG->siteidentifier;
    } else {
        $dir = $CFG->dataroot.'/repository/files';
    }
    $CFG->admindatadir = make_writable_directory($dir, $exceptiononerror);

    return $CFG->admindatadir;
}

/**
 * Return the folder inside admindatadir directory to store admin things
 *
 * @param string $folder to add to the admindatadir
 * @param bool $exceptiononerror throw exception if error encountered creating file
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function get_admin_datadir_folder($folder = '', $exceptiononerror = true) {
    $directory = get_admin_datadir($exceptiononerror);
    if ($directory && !empty($folder)) {
        $directory .= '/'.$folder;
        $directory = make_writable_directory($directory, $exceptiononerror);
    }

    return $directory;
}


function get_mailsender() {
    global $mailsender, $CFG;
    require_once($CFG->dirroot.'/local/agora/mailer/mailsender.class.php');

    if (!is_null($mailsender)) {
        return $mailsender;
    }

    // Load the mailsender
    $wsdl = get_config('local_agora', 'environment_url');
    $wsdl = empty($wsdl) ? $CFG->apligestenv : $wsdl;

    try {
        $mailsender = new mailsender($CFG->apligestaplic, $CFG->noreplyaddress, 'educacio', $wsdl, $CFG->apligestlog, $CFG->apligestlogdebug, $CFG->apligestlogpath);
    } catch (Exception $e){
        mtrace('ERROR: Cannot initialize mailsender, no mail will be sent.');
        mtrace($e->getMessage());
        mtrace('The execution must go on!');
        $mailsender = false;
    }
    return $mailsender;
}

function send_apligest_mail($mail, $user) {
    global $CFG;
    try {
        $sender = get_mailsender();
        if (!$sender) {
            return false;
        }

        require_once($CFG->dirroot.'/local/agora/mailer/message.class.php');

        // Load the message
        $message = new message(TEXTHTML, $CFG->apligestlog, $CFG->apligestlogdebug, $CFG->apligestlogpath);

        // Set $to
        $toarray = array();
        foreach ($mail->to as $to) {
            $toarray[] = $to[0];
        }
        $message->set_to($toarray);

        // Set $cc
        $ccarray = array();
        foreach ($mail->cc as $cc) {
            $ccarray[] = $cc[0];
        }
        if (!empty($ccarray)) {
            $message->set_cc($ccarray);
        }

        // Set $bcc
        $bccarray = array();
        foreach ($mail->bcc as $bcc) {
            $bccarray[] = $bcc[0];
        }
        if (!empty($bccarray)) {
            $message->set_bcc($bccarray);
        }

        // Set $subject
        $message->set_subject($mail->Subject);

        // Set $bodyContent
        $message->set_bodyContent($mail->Body);

        // Add message to mailsender
        if (!$sender->add($message)) {
            mtrace('ERROR: '.' Impossible to add message to mailsender');
            add_to_log(SITEID, 'library', 'mailer', qualified_me(), 'ERROR: '. ' Impossible to add message to mailsender');
            return false;
        }

        // Send messages
        if (!$sender->send_mail()) {
            mtrace('ERROR: '.' Impossible to send messages');
            add_to_log(SITEID, 'library', 'mailer', qualified_me(), 'ERROR: '. ' Impossible to send messages');
            return false;
        } else {
            set_send_count($user);
            return true;
        }
    } catch (Exception $e){
        mtrace('ERROR: Something terrible happened during the mailing and might be repaired');
        mtrace($e->getMessage());
        mtrace('The execution must go on!');
        return false;
    }
}