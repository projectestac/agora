<?php

//XTEC ************ FITXER AFEGIT - Create a backup of the specified course without user information
//2013.07.18 @jmiro

require_once ('../config.php');

require_once ($CFG->dirroot . '/backup/lib.php');
require_once ($CFG->dirroot . '/backup/backuplib.php');
require_once ($CFG->dirroot . '/backup/backup_scheduled.php');

$courseid = required_param('courseid', PARAM_INT);
$categoryid = required_param('categoryid', PARAM_INT);

// Forbidden to backup course 1
if ($courseid == 1) {
    import19_error('No es poden fer còpies de seguretat de la pàgina principal');
}

// Check if the course exists
if (!$course = get_record('course', 'id', $courseid)) {
    import19_error('El curs ' . $courseid . ' no existeix');
}

print_header('Restaurant el curs ' . $courseid . ' amb nom ' . $course->fullname);

$ara = time();

if (is_agora()) {
    $backuppath = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle']['username'] . $school_info['id_moodle2'] . $agora['moodle2']['repository_files'];
} else {
    $backuppath = $agora['moodle2']['backuppath'];
}

ob_start();

$prefs['backup_course_files'] = 1;
$prefs['backup_site_files'] = 1;
$prefs['backup_userdata'] = 0;
$prefs['backup_users'] = 1;
$prefs['backup_user_files'] = 0;
$prefs['backup_metacourse'] = 1;
$prefs['backup_logs'] = 0;
$prefs['backup_messages'] = 0;
$prefs['backup_gradebook_history'] = 0;

$preferences = backup_generate_preferences_artificially($course, $prefs);
$preferences -> backup_destination = $backuppath;

$errorstring = '';
$status = backup_execute($preferences, $errorstring);
$nom_backup = $preferences->backup_name;

$out = ob_get_clean();

echo '<p>Inici el ' . userdate($ara) . '<br/>';
echo nl2br($out);

if (!$status) {
    import19_error('El backup no s\'ha executat correctament');
}

echo '</p><p>La còpia de seguretat <strong><span id="backupname">' . $preferences->backup_name . '</span></strong> ha finalitzat</p>';

echo "<script type\"text/javascript\">
        document.getElementById('loading_icon').style.display = 'none';
        window.scrollTo(0, document.body.scrollHeight);
      </script>";

function import19_error($message) {
    @print_header(get_string('error'));
    print_simple_box($message, '', '', '', '', 'errorbox');
    echo "<script type\"text/javascript\">document.getElementById('loading_icon').style.display = 'none';</script>";
    die();
}
