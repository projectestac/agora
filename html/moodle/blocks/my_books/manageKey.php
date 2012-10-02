<?php

// MARSUPIAL *************** AFEGIT -> EVO: credentials
// 2012.07.06 @mmartinez

require_once('../../config.php');

require_login();

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

$pagetitle = get_string('keymanager', 'block_my_books');
$action    = optional_param('action', '', PARAM_RAW);
$ids       = optional_param('ids', '', PARAM_RAW);


if (!empty($ids)){
	foreach ($ids as $c){
		//echo serialize($c);
		$up          = new stdClass();
		$up->id      = $c;
		$up->euserid = 0;
		update_record('rcommon_user_credentials', $up);
	}
	
}

$str = get_string('my_books', 'block_my_books');
$navlinks = array();
$navlinks[] = array('name' => $str,
		'link' =>'#',
		'type' => 'misc');

$prefsbutton = "";
// Print title and header
$navigation = build_navigation($navlinks);
print_header("$site->shortname: $str: $pagetitle", $str, $navigation,
		'', '', true, $prefsbutton, user_login_string($site));

switch($action){		
	case 'edit':
		//get data
		$id         = required_param('id_cd', PARAM_INT);
		$credential = get_record('rcommon_user_credentials', 'id', $id);
		$book       = get_record('rcommon_books', 'isbn', $credential->isbn);
		
		//print_content
		echo '<script>
			function validate(frm){
				var val = document.getElementById("new_credential").value;				
				if (val != ""){					
					frm.submit();
				} else {
					document.getElementById("pErrorMessage").style.display = "block";
				}
			}
		</script>';
		echo '<p class="center">' . $book->name . ' (' . $book->isbn . ')</p>
		<form action="' . $CFG->wwwroot . '/blocks/my_books/manageKey.php?action=doEdit&id_cd=' . $id . '" method="POST" onsubmit="validate(this); return false;"><input type="hidden" name="id_cr" value="' . $id . '">
		<p id="pErrorMessage" class="center" style="color:red; display:none;">' . get_string('checkcredentialko_messageempty', 'block_my_books') . '</p>
		<p class="center">' . get_string('credential', 'block_my_books'). ': <input type="text" id="new_credential" name="new_credential" value="' . $credential->credentials . '"> <input type="submit" value="' . get_string('keymanager_save', 'block_my_books') . '"></p>
		</form>
		<p class="center"><a href="' . $CFG->wwwroot . '/blocks/my_books/manageKey.php" title=""><button>' . get_string('back') . '</button></a></p>';
		
		break;
	case 'doEdit':
		//get data
		$id             = required_param('id_cd', PARAM_INT);
		$new_credential = required_param('new_credential', PARAM_RAW);
		
		//test credential
		require_once($CFG->dirroot.'/blocks/rcommon/WebServices/Authentication/AuthenticateContent.php');
		
		$credential = get_record_sql ("SELECT b.id AS bookid, cred.euserid as userid, cred.credentials, b.name, b.isbn FROM {$CFG->prefix}rcommon_user_credentials cred LEFT JOIN {$CFG->prefix}rcommon_books b ON cred.isbn = b.isbn WHERE cred.id = '{$id}'");
		
		$data = new stdClass();
		$data->bookid     = $credential->bookid;
		$data->id         = 0;
		$data->unitid     = 0;
		$data->activityid = 0;
		$data->course     = 1;
		$data->module     = 'check_credentials';
		$data->cmid       = 0;
		
		$usr_creden              = new stdClass();
		$usr_creden->credentials = $new_credential;
		$usr_creden->euserid     = $credential->userid;
		
		$result = AuthenticateUserContent($data, $usr_creden, false);

		if ($result->AutenticarUsuarioContenidoResult->Codigo == 1){
			$update               = new stdClass();
			$update->id           = $id;
			$update->credentials  = $new_credential;
			$update->timemodified = time();
			
			if (update_record('rcommon_user_credentials', $update)){
				echo '<p class="center">' . get_string('keymanager_doEdit_ok', 'block_my_books') . '</p>';
			} else {
				echo '<p class="center">' . get_string('keymanager_doEdit_ko', 'block_my_books') . '</p>';
			}
			
			echo '<p class="center">(' . get_string('keymanager_doEdit_message', 'block_my_books') . ' <a href="manageKey.php" title="' . get_string('goback_title', 'block_my_books') . '">' . get_string('click_hear', 'block_my_books') . '<a>)</p>
				<script type="text/javascript">setTimeout(function(){ location.href = \'manageKey.php\'}, 2000);</script>';
		} else {
			//print_content
			echo '<script>
			function validate(frm){
				var val = document.getElementById("new_credential").value;
				if (val != ""){
					frm.submit();
				} else {
					document.getElementById("pErrorMessage").innerHTML = "' . get_string('checkcredentialko_messageempty', 'block_my_books') . '";
				}
			}
			</script>';
			echo '<p class="center">' . $credential->name . ' (' . $credential->isbn . ')</p>
			<form action="manageKey.php?action=doEdit&id_cd=' . $id . '" method="POST" onsubmit="validate(this); return false;">
			<p id="pErrorMessage" class="center" style="color: red;">' . get_string('checkcredentialko_message', 'block_my_books', get_string('error_code_' . $result->AutenticarUsuarioContenidoResult->Codigo, 'block_my_books')) . '</p>
			<p class="center">' . get_string('credential', 'block_my_books'). ': <input type="text" id="new_credential" name="new_credential" value="' . $new_credential . '"> <input type="submit" value="' . get_string('keymanager_save', 'block_my_books') . '"></p>
			</form>
			<p class="center"><a href="manageKey.php" title="' . get_string('goback_title', 'block_my_books') . '"><button>' . get_string('back') . '</button></a></p>';
		}
		
		break;
	case 'unassing':
			$id        = required_param('id_cd', PARAM_RAW);
			if (execute_sql("UPDATE {$CFG->prefix}rcommon_user_credentials SET euserid = '0', timemodified = '" . time() . "' WHERE id IN ({$id})", false)){
				echo '<p class="center">' . get_string('keymanager_unassing_ok', 'block_my_books') . '</p>';
			} else {
				echo '<p class="center">' . get_string('keymanager_unassing_ko', 'block_my_books') . '</p>';
			}
			 
			echo '<p class="center">(' . get_string('keymanager_doEdit_message', 'block_my_books') . ' <a href="manageKey.php" title="' . get_string('goback_title', 'block_my_books') . '">' . get_string('click_hear', 'block_my_books') . '<a>)</p>
			<script type="text/javascript">setTimeout(function(){ location.href = \'manageKey.php\'}, 2000);</script>';
			 
			break;
	default:
		//load data form db
		$sql = "SELECT ruc.id, rp.name as ed_name, rb.name as bk_name, ruc.isbn, ruc.credentials FROM {$CFG->prefix}rcommon_user_credentials ruc LEFT JOIN {$CFG->prefix}rcommon_books rb ON ruc.isbn = rb.isbn LEFT JOIN {$CFG->prefix}rcommon_publisher rp ON rb.publisherid = rp.id WHERE ruc.euserid = '{$USER->id}' ORDER BY ed_name, bk_name";
		//echo '<p style="clear: both;">' . $sql . '</p>'; //debug
		$list_credentials = get_records_sql($sql);
		
		//print data
		//print_js
		echo '<script type="text/javascript">
		
		function confirm_actions(el){
			if(el.value == ""){
				return false;
			}
		
			//count checked checks
			chk_cnt = 0;
			for (var element in document.frm.elements){
				if (document.frm.elements[element].name == "ids[]"){
					if (document.frm.elements[element].checked){
						chk_cnt++;
					}
				}
			}
		
			//stop execution if there is any check checked
			if (chk_cnt == 0){
				return false;
			}
			
			//confirm message
			if (el.value != "assing"){
				var message = Array();
				message["unassing"] = "' . get_string('keymanager_messageunassing', 'block_my_books') . '";
				message["delete"]   = "' . get_string('keymanager_messagedelete', 'block_my_books') . '";
		
				if (!confirm(message[el.value].toString().replace("XX", chk_cnt))){
					document.getElementById(\'action\').selectedIndex = 0;
					return false;
				}
			}
			
			document.frm.submit();
		}
		
		function select_all(){
			for (var element in document.frm.elements){
				if (document.frm.elements[element].name == "ids[]"){
					if (!document.frm.elements[element].checked){
						document.frm.elements[element].checked = true;
					}
				}
			}
			document.getElementById(\'action\').disabled = false;
		}
		
		function unselect_all(){
			for (var element in document.frm.elements){
				if (document.frm.elements[element].name == "ids[]"){
					if (document.frm.elements[element].checked){
						document.frm.elements[element].checked = false;
					}
				}
			}
			document.getElementById(\'action\').disabled = true;
		}
		
		function allow_actions(){
			var active = false;
			for (var element in document.frm.elements){
				if (document.frm.elements[element].name == "ids[]"){
					if (document.frm.elements[element].checked){
						active = true;
					}
				}
			}
			
			if (active){
				document.getElementById(\'action\').disabled = false;
			} else {
				document.getElementById(\'action\').disabled = true;
			}
		}
		</script>';
		
		echo '<form id="frm" name="frm" action="manageKey.php" method="post">
                <div id="block-block_rcommon">
		<table cellpadding="5" class="generaltable">
		<tr>
		<th></th>
		<th>' . get_string('publisher', 'block_my_books') . '</th>
		<th>' . get_string('book', 'block_my_books') . ' (ISBN)</th>
		<th width="95">' . get_string('credential', 'block_my_books') . '</th>';
		$context = get_context_instance(CONTEXT_SYSTEM); // pinned blocks do not have own context
		if (has_capability('blocks/my_books:modifycredentials', $context)){
			echo'<th width="145">' . get_string('actions', 'block_my_books') . '</th>';
		}
		echo '</tr>';
		if ($list_credentials){
			foreach ($list_credentials as $credential){
				echo '<tr>
				<td><input type="checkbox" name="ids[]" value="' . $credential->id . '" onChange="allow_actions();"></td>
				<td>' . $credential->ed_name . '</td>
				<td><span title="' . $credential->bk_name . ' (' . $credential->isbn . ')">' . (strlen($credential->bk_name) > 50? substr($credential->bk_name, 0, 50) . '...': $credential->bk_name) . ' (' . $credential->isbn . ')</span></td>
				<td align="center">' . $credential->credentials . '</td>';
				if (has_capability('blocks/my_books:modifycredentials', $context)){
					echo '<td align="center"><a href="manageKey.php?action=edit&id_cd=' . $credential->id .'" title="' . get_string('see_details_atitle', 'block_my_books') . '">' . get_string('edit_details', 'block_my_books') . '</a> &middot; <a href="javascript: if (confirm(\'' . get_string('keymanager_messageunassing2', 'block_my_books') . '\')){ location.href=\'manageKey.php?action=unassing&id_cd=' . $credential->id .'\';} else {void(0);}" title="' . get_string('see_details_atitle', 'block_my_books') . '">' . get_string('keymanager_unassignaction', 'block_my_books') . '</a></td>';
				}
				echo '</tr>';
			}
		}
		echo '</table></div></form>';
		echo '<select id="action" name="action" onchange="confirm_actions(this);" disabled>
		<option value="">' . get_string('keymanager_selectaction', 'block_my_books') . '</option>
		<option value="unassing">' . get_string('keymanager_unassignaction', 'block_my_books') . '</option>
		</select> <input type="button" onclick="select_all();" value = "' . get_string('keymanager_selectall', 'block_my_books') . '"> <input type="button" onclick="unselect_all();" value="' . get_string('keymanager_unselectall', 'block_my_books') . '">';
		break;
}
		
print_footer();
// ************ FI
?>