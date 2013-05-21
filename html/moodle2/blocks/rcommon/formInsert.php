<?php
// MARSUPIAL *********** AFEGIT -> Insert form key
// 2011.10.24 @mmartinez

if(!function_exists('isadmin')) {
    require_once('../../config.php');
    require_once($CFG->dirroot.'/course/lib.php');
}
// MARSUPIAL ************ AFEGIT -> Adding header 
// 2012.11.17 @abertranb
require_login();
$pagetitle = get_string('keymanager', 'block_rcommon');
$url = new moodle_url('/blocks/rcommon/formInsert.php', $_REQUEST); // Base URL

// Auth
$context = get_context_instance(CONTEXT_SYSTEM);
$PAGE->set_context($context);
$PAGE->set_heading($pagetitle);

$PAGE->set_url($url);
$PAGE->set_title($pagetitle);
$PAGE->navbar->add($pagetitle, null, null, navigation_node::TYPE_CUSTOM, null);

echo $OUTPUT->header();
// ************ FI

$insertKey = optional_param('insertKey', '', PARAM_RAW);

if(!empty($insertKey)) {
    $pass = optional_param('key', '', PARAM_RAW);
    $url = base64_decode(optional_param('url', '', PARAM_RAW));
    $userid = intval(optional_param('id', '', PARAM_INT));
    $doi = optional_param('isbn', '', PARAM_RAW);
// MARSUPIAL *********** AFEGIT -> Migrated to Moodle 2.X
// 2012.11.15 @abertranb
    $record = new stdClass();
    $record->euserid		= $userid;
    $record->isbn 			= $doi;
    $record->credentials 	= $pass;
    $record->timecreated 	= time();
    $record->timemodified 	= time();
    $DB->insert_record('rcommon_user_credentials', $record);
//************* ORIGINAL    
    //execute_sql("INSERT INTO ".$CFG->prefix."rcommon_user_credentials (euserid,isbn,credentials, timecreated, timemodified) VALUES ('".  addslashes($userid)."','".addslashes($doi)."','".addslashes($pass)."','".time()."', '".time()."')", false);
//************* FI
    echo '<script>document.location.href="'.$url.'";</script>';
    exit;
}

$url = base64_decode(optional_param('url', '', PARAM_RAW));
$id = intval(optional_param('id', '', PARAM_INT));
$isbn = optional_param('isbn', '', PARAM_RAW);

require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
//empresa + codigo centro + tipo eva

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}



// Print title and header
// MARSUPIAL *********** ELIMINAT -> Change deprecated code in Moodle 2.2
// 2012.11.23 @abertranb
/*
$prefsbutton = "";
$str = get_string('rcommon', 'block_rcommon');
$navlinks = array();
$navlinks[] = array('name' => $str,
					'link' =>'#',
					'type' => 'misc');

$navigation = build_navigation($navlinks);
print_header("$site->shortname: $str: $pagetitle", $str, $navigation,
			 '', '', true, $prefsbutton, user_login_string($site));*/
// ********** FI 
?>

<html>
	<head></head>
	<body>
		<center>
            <p><?php echo get_string('insertkeymsg','block_rcommon'); ?></p>
            <form id="keyform" method="POST">
			<input type="text" name="key">
			<input type="hidden" name="insertKey" value="1" />
			<input type="hidden" name="isbn" value="<?php echo $isbn; ?>" />
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="hidden" name="url" value="<?php echo base64_encode($url); ?>" />
			<input type="submit" value="<?php echo get_string('insertkeybtn', 'block_rcommon'); ?>" />
			<input type="button" value="<?php echo get_string('nokeybtn', 'block_rcommon'); ?>" onclick="document.location.href='<?php echo $url; ?>';" />
		</form>
                </center>
	</body>
</html>
<?php
// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
// 2012.11.17 @abertranb
echo $OUTPUT->footer();
// ************ MODIFICAT
//print_footer();
// ************ FI
// *********** FI
?>
