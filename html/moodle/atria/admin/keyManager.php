<?php

require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/atria/atria.php');

if(!isadmin()) { exit; }

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

if(!isadmin()) { exit; }

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

//ATRIA *************** MODIFICAT - To show as admin option
//sarjona @2011.09.15
require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('marsupialmanage_credentials');
admin_externalpage_print_header();
//***************** ORIGINAL
/*print_header("$site->shortname: $stratria: $pagetitle", $stratria, $navigation,
			 '', '', true, $prefsbutton, user_login_string($site));*/
//***************** FI

//key synchronization
echo '<div>
		<h2 class="headingblock header ">'.get_string('atriaadminkeys', 'atria').'</h2>
		<ul class="unlist">
			<li>
				<div class="coursebox clearfix">
					<div class="info" style="float:none;">
						<div class="name">';
if(!isset($_GET['action'])) {
							echo '
							<p>'.get_string('atrialookupuserkeystext','atria').'<br/>
							<form action="keyManager.php?action=manage" method="GET">
								<select name="username">
								';
								$users = get_records_sql("select * from ".$CFG->prefix."user WHERE username != 'guest' ORDER BY firstname");
								foreach($users as $user) {
								    echo '<option value="'.$user->username.'">'.$user->firstname.' '.$user->lastname.' ('.$user->username.')</option>';
								}
								echo '</select>
								<input type="hidden" name="action" value="manage" />
								<input type="submit" value="'.get_string('atriaadminkeyssearchuserbtn', 'atria').'" />
							</form>
							</p>
							<p><input onclick="document.location.href=\'export.php\';" type="submit" value="'.get_string('keymanagerexportbtn', 'atria').'" /></p>';
} else if($_GET['action'] == 'manage') {
	$username = $_GET['username'];
	echo '<p>'.get_string('atriashowingkeysfor','atria').' '.htmlentities($username).'<br/>';
	$record = get_record_sql("SELECT id FROM ".$CFG->prefix."user WHERE username = '$username'");
	if(!$record) {
		echo '<p style="color:red">'.get_string('atriausernotfound', 'atria').'</p>';
	} else {
		$id = $record->id;
		$credentials = get_records_sql('SELECT '.$CFG->prefix.'rcommon_user_credentials.*, '.$CFG->prefix.'rcommon_books.name, '.$CFG->prefix.'rcommon_publisher.name AS pname FROM '.$CFG->prefix.'rcommon_user_credentials JOIN '.$CFG->prefix.'rcommon_books ON '.$CFG->prefix.'rcommon_books.isbn =  '.$CFG->prefix.'rcommon_user_credentials.isbn  JOIN '.$CFG->prefix.'rcommon_publisher ON '.$CFG->prefix.'rcommon_publisher.id = '.$CFG->prefix.'rcommon_books.publisherid WHERE euserid = '.$id);
		if(!$credentials) {
			echo '<p style="color:red">'.get_string('atriauserhasnokeys','atria').'</p>';
		} else {
			echo '<table cellpadding="5"><tr style="border-bottom:1px solid black"><td><b>ISBN</b></td><td><b>CLAU</b></td></tr>';
			foreach($credentials as $credential) {
				echo '<tr>';
				echo '<td>'.$credential->name.' ('.$credential->pname.')&nbsp;&nbsp;</td>';
				echo '<td>'.$credential->credentials.' &nbsp;&nbsp; <a href="keyManager.php?action=delete&id='.$credential->id.'&username='.urlencode($_GET['username']).'">'.get_string('atriadelkeybtn','atria').'</a></td>';
				echo '</tr>';
			}
			echo '</table>';
		}
		echo '<br/><input type="submit" onclick="document.location.href=\'keyManager.php?action=add&username='.urlencode($username).'&id='.urlencode($id).'\'" value="'.get_string('atriaaddkey', 'atria').'" />&nbsp;&nbsp;<input onclick="document.location.href=\'keyManager.php\';" type="submit" value="'.get_string('keymanagertornar', 'atria').'" />';
	}

	//$records = get_records_sql();
} else if($_GET['action'] == 'delete') {
	if(!isset($_GET['confirm'])) {
		echo '<p>'.get_string('atriaconfirmdelete', 'atria').'</p>';
		echo '<br/>';
		echo '<a href="keyManager.php?action=delete&username='.urlencode($_GET['username']).'&confirm=true&id='.urlencode($_GET['id']).'">'.get_string('atriadelkeybtn', 'atria').'</a> &nbsp;&nbsp;<a href="keyManager.php?action=manage&username='.urlencode($_GET['username']).'">'.get_string('atriadelkeycancel','atria').'</a>';
	} else {
		//delete
		execute_sql('DELETE FROM '.$CFG->prefix.'rcommon_user_credentials WHERE id = \''.addslashes($_GET['id']).'\'',false);
		echo '<script>document.location.href="keyManager.php?action=manage&username='.urlencode($_GET['username']).'";</script>';
	}
} else if($_GET['action'] == 'add') {
	echo '<p>'.get_string('atriaaddingkeyforuser', 'atria').' '.  htmlentities($_GET['username']).'</p>';
	echo'
		<form action="keyManager.php" method="GET">
			<input type="hidden" value="doAdd" name="action" />
			<input type="hidden" value="'.htmlentities($_GET['username']).'" name="username" />
			<input type="hidden" value="'.htmlentities($_GET['id']).'" name="id" />
			<p>DOI / ISBN </p>
			<select name="doi" style="width:360px">';
			$books = get_records_sql('SELECT '.$CFG->prefix.'rcommon_books.*, '.$CFG->prefix.'rcommon_publisher.name as pname FROM '.$CFG->prefix.'rcommon_books JOIN '.$CFG->prefix.'rcommon_publisher ON '.$CFG->prefix.'rcommon_books.publisherid = '.$CFG->prefix.'rcommon_publisher.id');
			foreach($books as $book) {
			    echo '<option value="'.$book->isbn.'">'.$book->name.'&nbsp;('.$book->pname.')</option>';
			}
		  echo '</select>
			<p>CLAU</p>
			<input type="text" name="key" maxlength="255" style="width:350px" />
			<br />
			<p><input type="submit" value="Afegir" /></p>
		</form>
	';
} else if($_GET['action'] == 'doAdd') {
	if(!$_GET['doi'] || !$_GET['key'] || !$_GET['id']) {
		echo '<p style="color:red">'.get_string('atriaddkeyformexception', 'atria').'</p>';
	} else {
		execute_sql("INSERT INTO ".$CFG->prefix."rcommon_user_credentials (euserid,isbn,credentials, timecreated, timemodified) VALUES ('".  addslashes($_GET['id'])."','".addslashes($_GET['doi'])."','".addslashes($_GET['key'])."',".time().", ".time().")", false);
		echo '<script>document.location.href="keyManager.php?action=manage&username='.urlencode($_GET['username']).'";</script>';
	}
}
						echo '</div>
					</div>
					<div class="summary"></div>
				</div>
			</li>
		</ul>
	</div>';

//ATRIA *************** MODIFICAT - To show as admin option
//sarjona @2011.09.15
admin_externalpage_print_footer();
//*************** ORIGINAL
//print_footer();
//*************** FI 

?>
