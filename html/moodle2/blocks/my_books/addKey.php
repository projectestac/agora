<?php
// MARSUPIAL *************** AFEGIT -> EVO: credentials
// 2012.07.06 @mmartinez

require_once('../../config.php');

require_login();
if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}
$add = optional_param('add', false, PARAM_BOOL);
$credential = '';
if ($add){
	$id         = required_param('isbn', PARAM_TEXT);
	$credential = required_param('credential', PARAM_TEXT);
	$isbn       = $DB->get_record('rcommon_books', array('id' => $id));
	
	if (!empty($id) && !empty($credential)){
		//test credential
		require_once($CFG->dirroot.'/blocks/rcommon/WebServices/Authentication/AuthenticateContent.php');
		
		$data = new stdClass();
		$data->bookid     = $id;
		$data->id         = 0;
		$data->unitid     = 0;
		$data->activityid = 0;
		$data->course     = 1;
		$data->module     = 'check_credentials';
		$data->cmid       = 0;
		
		$usr_creden              = new stdClass();
		$usr_creden->credentials = $credential;
		$usr_creden->euserid     = $USER->id;
		
		$result = AuthenticateUserContent($data, $usr_creden, false);
		
		if ($result->AutenticarUsuarioContenidoResult->Codigo == 1){			
			$in               = new stdClass();
			$in->euserid      = $USER->id;
			$in->isbn         = $isbn->isbn;
			$in->credentials   = $credential;
			$in->timecreated  = time();
			$in->timemodified = time();
			
			if ($DB->insert_record('rcommon_user_credentials', $in)){
				redirect($CFG->wwwroot, '<b>' . get_string('addkey_ok', 'block_my_books') . '</b>', 3);
				die;
			} else {
				redirect($CFG->wwwroot, '<b>' . get_string('addkey_ko', 'block_my_books') . '</b>', 3);
				die;
			}
			
		} else {
			$message = get_string('checkcredentialko_message', 'block_my_books', get_string('error_code_' . $result->AutenticarUsuarioContenidoResult->Codigo, 'block_my_books'));
		}
	} else {
		redirect($CFG->wwwroot, '<b>' . get_string('addkey_ko', 'block_my_books') . '</b>', 3);
		die;
	}
}
	
$pagetitle = get_string('keymanager', 'block_rcommon');

$str = get_string('rcommon', 'block_rcommon');
// MARSUPIAL *************** MODIFICATED -> Moodle 2.2
// 2012.12.17 @abertranb
$context = context_system::instance();
$PAGE->set_context($context);
$url = new moodle_url('/blocks/my_books/addKey.php', $_REQUEST); // Base URL
$PAGE->set_url($url);
$PAGE->set_heading($str);
$PAGE->set_title($str);
$PAGE->navbar->add($str, null, null, navigation_node::TYPE_CUSTOM, null);

echo $OUTPUT->header();
// ************* ORIGINAL
/*$navlinks = array();
$navlinks[] = array('name' => $str,
		'link' =>'#',
		'type' => 'misc');
	
$prefsbutton = "";
// Print title and header
$navigation = build_navigation($navlinks);
print_header("$site->shortname: $str: $pagetitle", $str, $navigation,
		'', '', true, $prefsbutton, user_login_string($site));
*/
// ************ FI
$books = $DB->get_records_sql("SELECT rb.id, rb.name as bk_name, rp.name FROM {rcommon_books} rb LEFT JOIN {rcommon_publisher} rp ON rb.publisherid = rp.id WHERE rb.isbn NOT IN (SELECT isbn FROM {$CFG->prefix}rcommon_user_credentials WHERE euserid = '{$USER->id}')");
	
//Changed the field of submit 4 hidden because Firefox doesn't get the parameter add
echo '<script type="text/javascript">
	function validate(frm){
		var isbn = document.getElementById("isbn").selectedIndex;
		var cred = document.getElementById("credential").value;
		if (isbn != "" && cred != ""){					
			frm.submit();
		} else {
			document.getElementById("pErrorMessage").innerHTML = "' . get_string('checkcredentialko_messageempty2', 'block_my_books') . '";
			document.getElementById("pErrorMessage").style.display = "block";
		}
	}
</script>
<div style="margin-left: 400px;">
<form action="addKey.php" method="post" id="frm" name="frm" onsubmit="validate(this); return false;">
	<p id="pErrorMessage" style="color:red; ' . (isset($message) && !empty($message)? "": " display:none;") . 'margin-left:60px;">' . (isset($message) && !empty($message)? $message: "") . '</p>
	<input type="hidden" name="userid" value="'. $USER->id . '" />
	<input type="hidden" name="add" value="1" />
	<label for="isbn" style="display:inline-block; width:100px;">' . get_string('book', 'block_my_books') . '</label> <select id="isbn" name="isbn">
		<option value="">' . get_string('books_select', 'block_my_books') . '</option>';
foreach($books as $b){
	echo '<option value="' . $b->id . '"'; 
	if (isset($id) && $id == $b->id){
		echo ' selected';
	}
	echo '>' . $b->bk_name . ' (' . $b->name . ')</option>';	
}
echo '</select><br>
<label for="credential" style="display:inline-block; width:100px;">' . get_string('credential', 'block_my_books') . '</label> <input type="text" id="credential" name="credential" value="' . ($credential != ""? $credential: "") . '">
	<input type="submit" name="addSubmit" value="' . get_string('add') . '" />
</form></div>';

// MARSUPIAL *************** MODIFICATED -> Moodle 2.2 deprecated
// 2012.12.17 @abertranb
echo $OUTPUT->footer();
// ************** ORIGINAL
// print_footer();
// ************** FI
// ************** FI
