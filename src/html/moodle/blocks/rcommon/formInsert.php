<?php
// MARSUPIAL *********** AFEGIT -> Insert form key
// 2011.10.24 @mmartinez

if(!function_exists('isadmin')) {
    require_once('../../config.php');
    require_once($CFG->dirroot.'/course/lib.php');
}

$insertKey = optional_param('insertKey', '', PARAM_RAW);

if(!empty($insertKey)) {
    $pass = optional_param('key', '', PARAM_RAW);
    $url = base64_decode(optional_param('url', '', PARAM_RAW));
    $userid = intval(optional_param('id', '', PARAM_INT));
    $doi = optional_param('isbn', '', PARAM_RAW);

    execute_sql("INSERT INTO ".$CFG->prefix."rcommon_user_credentials (euserid,isbn,credentials, timecreated, timemodified) VALUES ('".  addslashes($userid)."','".addslashes($doi)."','".addslashes($pass)."','".time()."', '".time()."')", false);
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

require_login();

$pagetitle = get_string('keymanager', 'block_rcommon');

$str = get_string('rcommon', 'block_rcommon');
$navlinks = array();
$navlinks[] = array('name' => $str,
					'link' =>'#',
					'type' => 'misc');

$prefsbutton = "";
// Print title and header
$navigation = build_navigation($navlinks);
print_header("$site->shortname: $str: $pagetitle", $str, $navigation,
			 '', '', true, $prefsbutton, user_login_string($site));
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
print_footer();
// *********** FI
?>
