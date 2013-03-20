<?php
//XTEC ************ FITXER AFEGIT - Create a backup of the specified course without user information
//2012.07.13 @sarjona

require_once ('../config.php');

require_once ($CFG->dirroot.'/backup/lib.php');
require_once ($CFG->dirroot.'/backup/backuplib.php');
require_once ($CFG->dirroot.'/backup/backup_scheduled.php');

$id = required_param('id',PARAM_INT);


// Forbidden to backup course 1
if($id == 1){
	import19_error('No es pot fer backup del curs principal');
} 

// Check if the course exists
if(!$course = get_record('course','id',$id)){
	import19_error('El curs '.$id.' no existeix');
}

print_header('Restaurant curs '.$id. ' amb nom '.$course->fullname);

if(!function_exists('schedule_backup_launch_backup')){
	import19_error('La funció schedule_backup_launch_backup no existex');
}

$ara = time();

$backup_config = backup_get_config();

if (is_agora()) {
    $backuppath = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle']['username'] . $school_info['id_moodle2'] . $agora['moodle2']['repository_files'];
} else {
    $backuppath = $agora['moodle2']['backuppath'];
}

backup_set_config('backup_sche_destination', $backuppath);

ob_start();
backup_set_config('backup_sche_modules', 1);
backup_set_config('backup_sche_coursefiles', 1);
backup_set_config('backup_sche_withuserdata', 0);
backup_set_config('backup_sche_users', 1);
backup_set_config('backup_sche_userfiles', 0);
$preferences = schedule_backup_course_configure($course, $ara);
$nom_backup = schedule_backup_launch_backup($course, $ara);
$out = ob_get_clean();

if(isset($backup_config->backup_sche_destination))
	backup_set_config('backup_sche_destination',$backup_config->backup_sche_destination);
else
	backup_set_config('backup_sche_destination',$CFG->dataroot.'/temp/backup');
	
echo '<p>Inici el '.userdate($ara).'<br/>';
echo nl2br($out);


$logs = get_records_select('backup_log',"laststarttime = $ara AND courseid= $id",'time, info');
foreach($logs as $log){
	echo '<br/>'.date("H:i:s",$log->time).': '.$log->info;
}

if(!$nom_backup){
	import19_error('El backup no s\'ha executat correctament');
}

echo '</p><p>Backup <b><span id="backupname">'.$preferences->backup_name.'</span></b> finalitzat</p>';

//regcurs_set($id,'import19',$nom_backup);

echo "<script type\"text/javascript\">
	document.getElementById('loading_icon').style.display = 'none';
	window.scrollTo(0, document.body.scrollHeight);
</script>";


function import19_error($message){
	@print_header(get_string('error'));
	print_simple_box($message, '', '', '', '', 'errorbox');
	echo "<script type\"text/javascript\">document.getElementById('loading_icon').style.display = 'none';</script>";
	die();
}
