<?php
if(!function_exists('isadmin')) {
    require_once('../config.php');
    require_once($CFG->dirroot.'/course/lib.php');
}

if(isset($_POST['insertKey'])) {
    $pass = $_POST['key'];
    $url = base64_decode($_POST['url']);
    $userid = intval($_POST['id']);
    $doi = $_POST['isbn'];

    execute_sql("INSERT INTO ".$CFG->prefix."rcommon_user_credentials (euserid,isbn,credentials, timecreated, timemodified) VALUES ('".  addslashes($userid)."','".addslashes($doi)."','".addslashes($pass)."','".time()."', '".time()."')", false);
    echo '<script>document.location.href="'.$url.'";</script>';
    exit;
}

$url = base64_decode($_GET['url']);
$id = intval($_GET['id']);
$isbn = $_GET['isbn'];
require_once('../config.php');
require_once($CFG->dirroot.'/course/lib.php');
//empresa + codigo centro + tipo eva

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

require_login();

$pagetitle = get_string('atriasync', 'atria');

$stratria = get_string('atria', 'atria');
$navlinks = array();
$navlinks[] = array('name' => $stratria,
					'link' =>'#',
					'type' => 'misc');

$prefsbutton = "";
// Print title and header
$navigation = build_navigation($navlinks);
print_header("$site->shortname: $stratria: $pagetitle", $stratria, $navigation,
			 '', '', true, $prefsbutton, user_login_string($site));
?>

<html>
	<head></head>
	<body>
		<center>
                    <p><?php echo get_string('atriainsertkeymsg','atria', $isbn); ?></p>
                    <form id="keyform" method="POST" action="atriaFormInsert.php">
			<input type="text" name="key">
			<input type="hidden" name="insertKey" value="1" />
			<input type="hidden" name="isbn" value="<?php echo $isbn; ?>" />
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="hidden" name="url" value="<?php echo base64_encode($url); ?>" />
			<input type="submit" value="<?php echo get_string('atriainsertkeybtn', 'atria'); ?>" />
			<input type="button" value="<?php echo get_string('atrianokeybtn', 'atria'); ?>" onclick="document.location.href='<?php echo $url; ?>';" />
		</form>
                </center>
	</body>
</html>
<?php
print_footer();
?>