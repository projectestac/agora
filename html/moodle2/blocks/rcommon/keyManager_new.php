<?php

// MARSUPIAL ************* AFEGIT -> New functionality to manage credentials
// 2012.06.06 @mmartinez

require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once("{$CFG->libdir}/formslib.php");

require_login();

require_capability('moodle/site:config', context_system::instance());

$courses = array();

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('marsupial_manage_credentials');

echo $OUTPUT->header();

// MARSUPIAL *********** MODIFICAT -> Get the yui lib js version moodle 2.x
// 2012.12.1 @abertranb
//In 2.4 because is not needed ( http://tracker.moodle.org/browse/MDL-34741)
$add_variable_str_moodle_24 = '';
$add_end_variable_str_moodle_24 = '';
if ($CFG->branch < 24) {
    $PAGE->requires->yui2_lib(array('json','connection', 'dom-event'));
} else{
    $add_variable_str_moodle_24 = '
    YUI().use(\'yui2-json\', \'yui2-connection\', \'yui2-event\', function(Y) {
                            var YAHOO = Y.YUI2;';
    $add_end_variable_str_moodle_24 =  '});';
}

// *********** ORIGINAL
    //require_js(array('yui_dom-event', 'yui_connection', 'yui_json'));
// ********** FI


// get parameters
$action  = optional_param('action', '', PARAM_TEXT);

$pagetitle = ($action == 'import' || $action == 'importstep2' || $action == 'importstep3' || $action == 'importstep4')? get_string('keymanager_import_title', 'block_rcommon'): get_string('keymanager_new', 'block_rcommon');

//key synchronization
echo '<h2 class="headingblock header ">'.$pagetitle.'</h2>';
echo '<div class="generalbox box contentbox">';

switch ($action){
	case 'manage':
		//get data
		$id = required_param('id_bk', PARAM_INT);
		$book = $DB->get_record('rcommon_books', array('id' => $id));
		$credentials = $DB->get_records_sql("SELECT ruc.id, ruc.credentials, ruc.euserid, u.lastname, u.firstname FROM {rcommon_user_credentials} ruc LEFT JOIN {user} u ON ruc.euserid = u.id WHERE isbn = '{$book->isbn}' ORDER BY u.lastname, u.firstname");

		//print_js
		echo '<script type="text/javascript">
				function exec_test(id_cr){
					//show loading_small and hide others
					//alert("exec_test ini: id_cr=" + id_cr); //debug
					document.getElementById("loading_small_" + id_cr).style.visibility = "visible";
					document.getElementById("desc_" + id_cr).innerHTML = "";

					var callback = {
						success: function(o) {
							//alert("exec_test ajaxr response: " + o.responseText);
                    		document.getElementById("loading_small_" + id_cr).style.visibility = "hidden";
							document.getElementById("desc_" + id_cr).innerHTML = o.responseText;
                    	},
                    	failure: function(o) {
                    		alert("exec_test ajax failure: " + o.responseText);
                    		document.getElementById("loading_small_" + id_cr).style.visibility = "hidden";
                    	},
                    	argument: []
                    };
                    '.$add_variable_str_moodle_24.'
                    YAHOO.util.Connect.asyncRequest("POST", "' . $CFG->wwwroot . '/blocks/rcommon/state/check_credentials.php?id_cr=" + id_cr, callback);
                    '.$add_end_variable_str_moodle_24.'
				}

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
						message["unassing"] = "' . get_string('keymanager_messageunassing', 'block_rcommon') . '";
						message["delete"]   = "' . get_string('keymanager_messagedelete', 'block_rcommon') . '";

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

		// print content
		echo '<p class="center_rcommon"><h3>' . $book->name . ' (' . $book->isbn . ')</h3></p>';
        echo '<div class="right"><input onclick="document.location.href=\'keyManager_new.php?action=add&id_bk=' . $id . '\';" type="submit" value="'.get_string('keymanager_add', 'block_rcommon').'" /></div>';
		echo '<form action="keyManager_new.php?id_bk=' . $id . '" id="frm" name="frm" method="post">
		<table cellpading="5" width="100%" class="generaltable">
			<thead>
			<tr>
				<th class="header c0">&nbsp;</th>
				<th class="header c1">' . get_string('credential', 'block_rcommon') . '</th>
				<th class="header c2">' . get_string('user', 'block_rcommon') . '</th>
				<th class="header c3">' . get_string('actions', 'block_rcommon') . '</th>
				<th class="header c4">' . get_string('comments', 'block_rcommon') . '</th>
			</tr>
		</thead>';
		if (empty($credentials)){
			echo '<tr><td></td><td colspan="4" style="padding-left: 15px;">' . get_string('keymanager_nocredentialsfound', 'block_rcommon') . '</td></tr>';
		} else {
			foreach ($credentials as $credential){
				$name = (!empty($credential->lastname) && $credential->lastname != ' ')? $credential->firstname . ' ' . $credential->lastname: ($credential->euserid != 0? get_string('keymanager_usernotfound', 'block_rcommon'): ' - ');
				echo '<tr>
					<td><input type="checkbox" name="ids[]" value="' . $credential->id . '" onChange="allow_actions();"></td>
					<td><span title="' . $credential->credentials . '">' . (textlib::strlen($credential->credentials) > 30? textlib::substr($credential->credentials, 0, 30) . '...': $credential->credentials) . '</td>
					<td>' . $name . '</td>
					<td width="150" align="rigth"><a href="keyManager_new.php?action=edit&id_bk=' . $id . '&id_cr=' . $credential->id . '" title="' . get_string('edit') .'" style="margin-left: 15px;">' . get_string('edit') . '</a>';
					if (!empty($credential->credentials) && !empty($credential->euserid)){
						echo '&middot; <a href="javascript:exec_test(' . $credential->id . ');" title="' . get_string('keymanager_test', 'block_rcommon') . '">' . get_string('keymanager_test', 'block_rcommon') . '</a>';
					}

					echo '</td>
					<td><img id="loading_small_' . $credential->id . '" src="' . $OUTPUT->pix_url('y/loading').'" width="16" height="16" alt="Loading small image" style="visibility: hidden; float: left;"><span id="desc_' . $credential->id . '"></span</td>
				</tr>';
			}
		}
		echo '</table>';
		echo '<select id="action" name="action" onchange="confirm_actions(this);" disabled>
			<option value="">' . get_string('keymanager_selectaction', 'block_rcommon') . '</option>
			<option value="assing">' . get_string('keymanager_assignaction', 'block_rcommon') . '</option>
			<option value="unassing">' . get_string('keymanager_unassignaction', 'block_rcommon') . '</option>
			<option value="delete">' . get_string('keymanager_deleteaction', 'block_rcommon') . '</option>
		</select> <input type="button" onclick="select_all();" value = "' . get_string('keymanager_selectall', 'block_rcommon') . '"> <input type="button" onclick="unselect_all();" value="' . get_string('keymanager_unselectall', 'block_rcommon') . '">
		</form>';
	break;
	case 'edit':
		//get data
		$id_bk      = required_param('id_bk', PARAM_INT);
		$id         = required_param('id_cr', PARAM_INT);
		$book       = $DB->get_record('rcommon_books', array('id'=> $id_bk));
		$credential = $DB->get_record('rcommon_user_credentials', array('id' => $id));

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
		echo '<p class="center_rcommon"><h3>' . $book->name . ' (' . $book->isbn . ')</h3></p>
			<p id="pErrorMessage" style="color:red; display:none;">' . get_string('checkcredentialko_messageempty', 'block_rcommon') . '</p>
			<form action="' . $CFG->wwwroot . '/blocks/rcommon/keyManager_new.php?action=doEdit&id_bk=' . $id_bk . '" method="POST" onsubmit="validate(this); return false;"><input type="hidden" name="id_cr" value="' . $id . '">
               <p>' . get_string('credential', 'block_rcommon'). ': <input type="text" id="new_credential" name="new_credential" value="' . $credential->credentials . '"> <input type="submit" value="' . get_string('keymanager_save', 'block_rcommon') . '"></p>
			</form>
		<p class="center_rcommon"><a href="keyManager_new.php?action=manage&id_bk=' . $id_bk . '" title=""><button>' . get_string('back') . '</button></a></p>';

		break;
	case 'doEdit':
		//get data
		$id_book        = required_param('id_bk', PARAM_INT);
		$id             = required_param('id_cr', PARAM_INT);
		$new_credential = required_param('new_credential', PARAM_TEXT);

		$update               = new stdClass();
		$update->id           = $id;
		$update->credentials  = $new_credential;
		$update->timemodified = time();

		if ($DB->update_record('rcommon_user_credentials', $update)){
			echo '<p class="center_rcommon">' . get_string('keymanager_doEdit_ok', 'block_rcommon') . '</p>';
		} else {
			echo '<p class="center_rcommon">' . get_string('keymanager_doEdit_ko', 'block_rcommon') . '</p>';
		}

		echo '<p class="center_rcommon">(' . get_string('keymanager_doEdit_message', 'block_rcommon') . ' <a href="keyManager_new.php?action=manage&id_bk=' . $id_book . '" title="' . get_string('goback_title', 'block_rcommon') . '">' . get_string('click_here', 'block_rcommon') . '<a>)</p>
			<script type="text/javascript">setTimeout(function(){ location.href = \'keyManager_new.php?action=manage&id_bk=' . $id_book . '\'}, 2000);</script>';

		break;
	case 'unassing':
		$id_bk     = required_param('id_bk', PARAM_INT);
		$ids       = required_param_array('ids', PARAM_INT);
		$ids_where = implode(',', $ids);

	   	if ($DB->execute("UPDATE {rcommon_user_credentials} SET euserid = 0, timemodified = '" . time() . "' WHERE id IN ({$ids_where})")){
	   		echo '<p class="center_rcommon">' . get_string('keymanager_unassing_ok', 'block_rcommon') . '</p>';
	   	} else {
	   		echo '<p class="center_rcommon">' . get_string('keymanager_unassing_ko', 'block_rcommon') . '</p>';
	   	}

	   	echo '<p class="center_rcommon">(' . get_string('keymanager_doEdit_message', 'block_rcommon') . ' <a href="keyManager_new.php?action=manage&id_bk=' . $id_bk . '" title="' . get_string('goback_title', 'block_rcommon') . '">' . get_string('click_here', 'block_rcommon') . '<a>)</p>
	   	<script type="text/javascript">setTimeout(function(){ location.href = \'keyManager_new.php?action=manage&id_bk=' . $id_bk . '\'}, 2000);</script>';

		break;
	case 'delete':
		$id_bk     = required_param('id_bk', PARAM_INT);
		$ids       = required_param_array('ids', PARAM_RAW);
		$ids_where = implode(',', $ids);

	   	if ($DB->execute("DELETE FROM {rcommon_user_credentials} WHERE id IN ({$ids_where})")){
	   		echo '<p class="center_rcommon">' . get_string('keymanager_delete_ok', 'block_rcommon') . '</p>';
	   	} else {
	   		echo '<p class="center_rcommon">' . get_string('keymanager_delete_ko', 'block_rcommon') . '</p>';
	   	}

	   	echo '<p class="center_rcommon">(' . get_string('keymanager_doEdit_message', 'block_rcommon') . ' <a href="keyManager_new.php?action=manage&id_bk=' . $id_bk . '" title="' . get_string('goback_title', 'block_rcommon') . '">' . get_string('click_here', 'block_rcommon') . '<a>)</p>
	   	<script type="text/javascript">setTimeout(function(){ location.href = \'keyManager_new.php?action=manage&id_bk=' . $id_bk . '\'}, 2000);</script>';

		break;
	break;
	case 'assing':

		define("MAX_USERS_PER_PAGE", 5000);

		//get received info
		$id_bk          = required_param('id_bk', PARAM_INT);
		$ids            = optional_param_array('ids', '', PARAM_INT);
		$userid         = optional_param('userid', 0, PARAM_INT); // needed for user tabs
        $showall        = optional_param('showall', false, PARAM_BOOL);
		if ($showall) {
			$searchtext = '';
			$courseid = 0;
		} else {
            $searchtext     = optional_param('searchtext', '', PARAM_TEXT); // search string
            $courseid       = optional_param('courseid', 0, PARAM_INT); // needed for user tabs
        }
		//echo '<hr>ids: '. serialize($ids) . '<hr>'; //debug

		//process received data
		$ids_cnt = count($ids);
		$array_ids = $ids;
		if (count($ids)>0) {
			$ids     = implode(',', $ids);
		}
		else {
			$ids = '';
		}
		$book    = $DB->get_record('rcommon_books', array('id' => $id_bk));
		$course  = $DB->get_record('course', array('id' => $courseid));

		//set some text vars
		$strsearch = get_string('search');
		$strsearchresults = get_string('searchresults');
		$strshowall = trim(get_string('showall', 'moodle', ""));
		//if isset form doactions
		if ($frm = data_submitted()){
			if (!empty($frm->addselect) && confirm_sesskey()) {
				//echo '<hr>addselect: ' . serialize($frm->addselect) . '<hr>'; //debug
				//echo '<hr>ids: ' . $frm->ids . '<hr>'; //Debug
				$empty_credentials = $DB->get_records_sql("SELECT id, isbn, credentials FROM {rcommon_user_credentials} WHERE isbn = (SELECT isbn FROM {$CFG->prefix}rcommon_books WHERE id = '{$id_bk}') AND euserid = 0 AND id IN ({$ids})");
				//echo 'empty_credentials: ' . serialize($empty_credentials);
				if ($empty_credentials){
					$i = 0;
					foreach($empty_credentials as $c){
						if ($i > count($frm->addselect) - 1){
							break;
						}

						if ($user_c = $DB->get_record_sql("SELECT id, credentials FROM {rcommon_user_credentials} WHERE isbn = '{$c->isbn}' AND euserid = {$frm->addselect[$i]}")){
							if ($user_c->credentials == ' '){
								$up               = new stdClass();
								$up->id           = $user_c->id;
								$up->euserid      = 0;
								$up->timemodified = time();
								$DB->update_record('rcommon_user_credentials', $up);
							} else {
								continue;
							}
						}

						$up               = new stdClass();
						$up->id           = $c->id;
						$up->euserid      = $frm->addselect[$i];
						$up->timemodified = time();
						if ($DB->update_record('rcommon_user_credentials', $up)){
							$i++;
						}
					}
				}
			} else if (!empty($frm->removeselect) && confirm_sesskey()) {
				//echo 'remove select: ' . serialize($frm->removeselect); //Debug
				foreach ($frm->removeselect as $u){
					$cred = $DB->get_record_sql("SELECT id FROM {rcommon_user_credentials} WHERE euserid = {$u} AND isbn = (SELECT isbn FROM {rcommon_books} WHERE id = '{$id_bk}')");
					if ($cred){
						$up          = new stdClass();
						$up->id      = $cred->id;
						$up->euserid = 0;
						$DB->update_record('rcommon_user_credentials', $up);
					}
				}
			} else if ($showall) {
            	$searchtext = '';
            	$courseid   = 0;
        	}
		}

		$already_asigned_users     = $DB->get_records_sql("SELECT c.euserid as id, u.firstname, u.lastname, u.email FROM {$CFG->prefix}user u RIGHT JOIN {$CFG->prefix}rcommon_user_credentials c ON u.id = c.euserid WHERE c.id IN ({$ids}) AND euserid <> 0");
		$already_asigned_users_cnt = $already_asigned_users? count($already_asigned_users): 0;
		//echo '<hr>alredy_asigned_users: ' . serialize($already_asigned_users) . '<hr>';

		$already_unassigned = $ids_cnt - $already_asigned_users_cnt;

		$search_where = !empty($searchtext)?" AND (firstname LIKE '%{$searchtext}%' OR lastname LIKE '%{$searchtext}%' OR username LIKE '%{$searchtext}%')": '';

		if (empty($courseid)){
// MARSUPIAL ************* MODIFICAT -> Add extra control for just show the users confirmed and non deleted in the assigment books credentials process
// 2012.09.05 @mmartinez
			$users_to_show    = $DB->get_records_sql("SELECT u.id, u.firstname, u.lastname, u.email FROM {user} u WHERE u.id NOT IN (SELECT DISTINCT euserid FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn = '{$book->isbn}') AND deleted = 0 AND confirmed = 1{$search_where} ORDER BY lastname");
// ************ ORIGINAL
			//$users_to_show    = $DB->get_records_sql("SELECT u.id, u.firstname, u.lastname, u.email FROM {$CFG->prefix}user u WHERE u.id NOT IN (SELECT DISTINCT euserid FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn = '{$book->isbn}'){$search_where} ORDER BY lastname");
// ************ FI
		} else {
			/// Setup for group handling.
			$context = context_system::instance(); // pinned blocks do not have own context
			if ($course->groupmode == SEPARATEGROUPS and !has_capability('moodle/site:accessallgroups', $context)) {
				$selectedgroup = get_current_group($course->id);
				$showgroups = false;
			}
			else if ($course->groupmode) {
				$selectedgroup = get_current_group($course->id);
				$showgroups = true;
			}
			else {
				$selectedgroup = 0;
				$showgroups = false;
			}
			// Get all the possible users
			if ($course->id != SITEID) {
				if ($selectedgroup) {   // If using a group, only get users in that group.
					// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
					// 2012.12.14 @abertranb

					require_once($CFG->dirroot . '/group/lib.php');
					$users_to_show_role = groups_get_members_by_role($selectedgroup, $course->id, 'u.id,u.firstname,u.lastname,u.email', 'u.lastname ASC', 'u.id not in (SELECT DISTINCT euserid FROM '.$CFG->prefix.'rcommon_user_credentials WHERE isbn = \''.$book->isbn.'\')');
					$users_to_show = array();
					if ($users_to_show_role && count($users_to_show_role)>0) {
						foreach ($users_to_show_role as $role) {
							foreach ($role->users as $u)
								$users_to_show[] = $u;
						}
					}
					// ************ MODIFICAT
					//$users_to_show = get_group_users($selectedgroup, 'u.lastname ASC', "SELECT DISTINCT euserid FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn = '{$book->isbn}'", 'u.id, u.firstname, u.lastname, u.idnumber, u.email');
					// ************ FI
				} else {
					// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
					// 2012.12.14 @abertranb
					$context_course = context_course::instance($course->id);
					list($esqljoin, $eparams) = get_enrolled_sql($context_course);
					//$params = array_merge($params, $eparams);

					$sql = "SELECT u.id,u.firstname,u.lastname,u.email
					                      FROM {user} u
					                      JOIN ($esqljoin) euj ON euj.id = u.id
					                     WHERE u.id <> ".$CFG->siteguest."
					                     AND u.id not in
					                     	(SELECT DISTINCT euserid FROM {rcommon_user_credentials} WHERE isbn = '".$book->isbn."')
					                           AND u.deleted = 0
					                  ORDER BY u.lastname ASC";

					$users_to_show = $DB->get_records_sql($sql, $eparams);
					// ************ MODIFICAT
					//$users_to_show = get_course_users($course->id, '', "SELECT DISTINCT euserid FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn = '{$book->isbn}'", 'u.id, u.firstname, u.lastname, u.idnumber, u.email');
					// ************ FI
				}
			} else {
				// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
				// 2012.12.14 @abertranb
				$extrasql = 'id <> '.$CFG->siteguest.' AND id not in (SELECT DISTINCT euserid FROM {rcommon_user_credentials} WHERE isbn = \''.$book->isbn.'\')';
				$users_to_show = get_users_listing('', '', 0, 0, '', '', '',
				$extrasql, null, $context);
				// ************ MODIFICAT
				//$users_to_show = get_site_users("u.lastaccess DESC", "u.id, u.firstname, u.lastname, u.idnumber", false, "SELECT DISTINCT euserid FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn = '{$book->isbn}'");
				// ************ FI

			}
		}
		$user_to_show_cnt = is_array($users_to_show)?count($users_to_show): 0;
		//echo '<hr>users_to_show: ' . serialize($users_to_show) . '<hr>';

		echo '<p class="center_rcommon"><h3>' . $book->name . ' (' . $book->isbn . ')</h3></p>
		<p>' . get_string('keymanager_selected_for_assign', 'block_rcommon', $ids_cnt) . '<br>' . get_string('keymanager_no_assigned_user', 'block_rcommon', $already_unassigned) . '</p>';
		echo '<script type="text/javascript">
			function check_max_users(){
			 	var max_users = "' . $already_unassigned . '";
			 	var select_cre = document.getElementById("addselect").options;
			 	cnt_selecteds = "0";

			 	for (var i = 0; i < select_cre.length; i++){
			 		if (select_cre[i].selected){
			 			cnt_selecteds++;
			 		}
			 	}

			 	if (cnt_selecteds > max_users){
			 		alert("' . get_string('maxselected_js_error_part1', 'block_rcommon') . ' " + max_users + " ' . get_string('maxselected_js_error_part2', 'block_rcommon') . ' " + cnt_selecteds + " ' . get_string('maxselected_js_error_part3', 'block_rcommon') . '");
			 		return false;
			 	} else {
			 		document.assignform.submit();
			 	}
			}

			function select_all(){
				var select_cre = document.getElementById("addselect").options;

				for(var i = 0; i< select_cre.length; i++){
					select_cre[i].selected = true;
				}

				return true;
			}

			function unselect_all(){
				var select_cre = document.getElementById("removeselect").options;

				for(var i = 0; i< select_cre.length; i++){
					select_cre[i].selected = true;
				}

				return true;
			}
		</script>';
		echo '<form id="assignform" name="assignform" method="post" action="keyManager_new.php?action=assing&id_bk=' . $id_bk . '" onsubmit="check_max_users(); return false;">';
		foreach($array_ids as $id) {
			echo '<input type="hidden" name="ids[]" value="' . $id . '" />';
		}
		echo '<input type="hidden" name="sesskey" value="'. sesskey() . '" />

			<table width="100%" summary="" style="margin-left:auto;margin-right:auto" border="0" cellpadding="5" cellspacing="0">
			<tr>
				<td valign="top">
					<label for="removeselect">' . get_string('keymanager_assined_user', 'block_rcommon', $already_asigned_users_cnt) . '</label><br />
		          	<select name="removeselect[]" size="20" id="removeselect" multiple="multiple" onfocus="getElementById(\'assignform\').add.disabled=true; getElementById(\'assignform\').remove.disabled=false;getElementById(\'assignform\').addselect.selectedIndex=-1;">';
			            if ($already_asigned_users_cnt > 0){
				            foreach ($already_asigned_users as $contextuser) {
				                $fullname = fullname($contextuser, true);
				                $op_text = !empty($fullname)? $fullname.", ".$contextuser->email: get_string('keymanager_usernotfound', 'block_rcommon');
				                echo "<option value=\"$contextuser->id\">" . $op_text . "</option>\n";
				            }
			            } else {
			                echo '<option>' . get_string('keymanager_assing_nouser', 'block_rcommon') . '</option>'; // empty select breaks xhtml strict
			            }

		          	echo '</select>
		        </td>
		      	<td valign="top">';
		        	echo '<p class="arrow_button">
		            	<input name="add" id="add" type="submit" value="' . $OUTPUT->larrow().'&nbsp;'.get_string('keymanager_assignaction', 'block_rcommon') . '" title="'. get_string('add') . '"';
		            	if ($already_unassigned == 0){
		            		echo ' disabled="true"';
		            	}
		            	echo '/><br />
		            	<input name="remove" id="remove" type="submit" value="' . get_string('keymanager_unassignaction', 'block_rcommon').'&nbsp;'.$OUTPUT->rarrow() . '" title="' . get_string('remove') . '" /><br><br>
		            	<input name="add" id="addall" type="submit" onclick="select_all();" value="' . $OUTPUT->larrow().'&nbsp;'.get_string('keymanager_assignaction_all', 'block_rcommon') . '" title="'. get_string('add') . '"';
		            	if ($already_unassigned == 0){
		            		echo ' disabled="true"';
		            	}
		            	echo '/><br /><input name="remove" id="removeall" type="submit" onclick="unselect_all();" value="' . get_string('keymanager_unassignaction_all', 'block_rcommon').'&nbsp;'.$OUTPUT->rarrow() . '" title="' . get_string('remove') . '" /><br />
		        	</p>
		      	</td>
		      	<td valign="top">
		          	<label for="addselect">' . get_string('potentialusers', 'role', $user_to_show_cnt). '</label><br />
		          	<select name="addselect[]" size="20" id="addselect" multiple="multiple" onfocus="';
		            	if ($already_unassigned > 0){
		            		echo 'getElementById(\'assignform\').add.disabled=false;';
		            	}
		            	echo 'getElementById(\'assignform\').remove.disabled=true;getElementById(\'assignform\').removeselect.selectedIndex=-1;">';
						if ($user_to_show_cnt > 0){
		            		if (!empty($searchtext)) {
		                		echo "<optgroup label=\"$strsearchresults (" . $user_to_show_cnt . ")\">\n";
		                		foreach ($users_to_show as $user) {
		                    		$fullname = fullname($user, true);
		                    		echo "<option value=\"$user->id\">".$fullname.", ".$user->email."</option>\n";
		                		}
		                		echo "</optgroup>\n";
		            		} else {
		                		if ($user_to_show_cnt > MAX_USERS_PER_PAGE) {
		                    		echo '<optgroup label="'.get_string('toomanytoshow').'"><option></option></optgroup>'."\n"
		                          		.'<optgroup label="'.get_string('trysearching').'"><option></option></optgroup>'."\n";
		                		} else {
		                			foreach ($users_to_show as $user) {
		                        		$fullname = fullname($user, true);
		                        		echo "<option value=\"$user->id\">".$fullname.", ".$user->email."</option>\n";
		                    		}
		                		}
		            		}
						} else {
		                	echo '<option>' . get_string('keymanager_assing_nouser', 'block_rcommon') . '</option>'; // empty select breaks xhtml strict
		            	}
		         	echo '</select><br />
		         	<label for="searchtext" class="accesshide">' . $strsearch . '</label>
		         	<input type="text" name="searchtext" id="searchtext" size="30" value="'. (empty($courseid)? $searchtext: '') . '"onfocus ="getElementById(\'assignform\').add.disabled=true;
		            	getElementById(\'assignform\').remove.disabled=true; getElementById(\'assignform\').removeselect.selectedIndex=-1; getElementById(\'assignform\').addselect.selectedIndex=-1;"
		                onkeydown = "var keyCode = event.which ? event.which : event.keyCode; if (keyCode == 13) { getElementById(\'assignform\').previoussearch.value=1; getElementById(\'assignform\').submit();} " />
		         	<input name="search" id="search" type="submit" value="' . $strsearch . '" onclick="getElementById(\'courseid\').selectedIndex=0;" />';
		            if (!empty($searchtext) && empty($courseid)) {
		            	echo '<input name="showall" id="showall" onclick="getElementById(\'courseid\').selectedIndex=0;getElementById(\'searchtext\').value=\'\';" type="submit" value="'.$strshowall.'" />'."\n";
		            }
		            if ($ccc = $DB->get_records("course", array(), "fullname","id,fullname,category")) {
		            	foreach ($ccc as $cc) {
		            		if ($cc->category) {
		            			$courses["$cc->id"] = format_string($cc->fullname);
		            		} else {
		            			$courses["$cc->id"] = format_string($cc->fullname) . ' (Site)';
		            		}
		            	}
		            }
		            asort($courses);
		            if (!empty($searchtext) && empty($courseid)){
		            	$courseid = "";
		            }
		            echo '<br><select id="courseid" name="courseid">
		            	<option value=""'; if (!empty($searchtext)) { echo ' selected'; }echo '>' . get_string('keymanager_select_course', 'block_rcommon') . '</option>';
		            	foreach($courses as $k => $v){
		            		echo '<option value="' . $k . '"';
		            		if ($k == $courseid){
		            			echo ' selected';
		            		}
		            		echo '>' . $v . '</option>';
		            	}
		            	echo '</select> <input name="search" id="search" type="submit" value="' . get_string('filter', 'block_rcommon') . '" />';
		            	if (!empty($courseid)) {
		            		echo '<input name="showall" id="showall" type="submit" onclick="getElementById(\'courseid\').selectedIndex=0;getElementById(\'searchtext\').value=\'\';"  value="'.$strshowall.'" />'."\n";
		            	}
		           echo '</td></tr></table></form>';
		   echo '<p style="text-align: center;"><a href="keyManager_new.php?action=manage&id_bk=' . $id_bk . '"><button>'. get_string('back') . '</button></a></p>';
		break;
	case 'add':
		//get data
		$id_bk = required_param('id_bk', PARAM_INT);
		$book  = $DB->get_record('rcommon_books', array('id' => $id_bk));

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
		echo '<p class="center_rcommon"><h3>' . $book->name . ' (' . $book->isbn . ')</h3></p>
			<form action="keyManager_new.php?action=doAdd&id_bk=' . $id_bk . '" method="POST" onsubmit="validate(this); return false;">
			<p id="pErrorMessage" style="color:red; display:none;">' . get_string('checkcredentialko_messageempty', 'block_rcommon') . '</p>
			<p>' . get_string('credential', 'block_rcommon'). ': <input type="text" id="new_credential" name="new_credential" value=""> <input type="submit" value="' . get_string('keymanager_save', 'block_rcommon') . '"></p>
			</form>';

		break;
	case 'doAdd':
		//get data
		$id_bk          = required_param('id_bk', PARAM_INT);
		$book           = $DB->get_record('rcommon_books', array('id'=>$id_bk));
		$new_credential = required_param('new_credential', PARAM_RAW);
		$confirm        = optional_param('confirm', '', PARAM_RAW);

		//check if credential exits already
		if (empty($confirm)){
			$bk = $DB->get_record('rcommon_books', array('id' => $id_bk));
// MARSUPIAL ************ MODIFICAT -> Fix bug when returns more than one row
// 2013.03.07 @abertranb
			$cred = $DB->get_records_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$bk->isbn}' AND credentials = '{$new_credential}'");
			if ($cred && count($cred)>0){
// ************ MODIFICAT
			//$cred = $DB->get_record_sql("SELECT id FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn = '{$bk->isbn}' AND credentials = '{$new_credential}'");
			//if ($cred){
// ************ FI
				echo '<p class="center_rcommon">' . get_string('keymanager_addrepitedcredential_message', 'block_rcommon') . '</p>
				<form action="keyManager_new.php?action=doAdd&id_bk=' . $id_bk .  '" method="post">
					<input type="hidden" name="new_credential" value="' . $new_credential . '">
					<input type="hidden" name="confirm" value="1">
					<p class="center_rcommon"><input type="submit" value="' . get_string('yes') . '"> <input type="button" value="' . get_string('no') . '" onclick="location.href=\'keyManager_new.php?action=manage&id_bk=' . $id_bk . '\'"></p>
				</form>';
				break;
			}
		}

		$insert               = new stdClass();
		$insert->euserid      = 0;
		$insert->isbn         = $book->isbn;
		$insert->credentials  = $new_credential;
		$insert->timecreated  = time();
		$insert->timemodified = time();

		if ($DB->insert_record('rcommon_user_credentials', $insert)){
			echo '<p class="center_rcommon">' . get_string('keymanager_doAdd_ok', 'block_rcommon') . '</p>';
		} else {
			echo '<p class="center_rcommon">' . get_string('keymanager_doAdd_ko', 'block_rcommon') . '</p>';
		}

		echo '<p class="center_rcommon">(' . get_string('keymanager_doEdit_message', 'block_rcommon') . ' <a href="keyManager_new.php?action=manage&id_bk=' . $id_bk . '" title="' . get_string('goback_title', 'block_rcommon') . '">' . get_string('click_here', 'block_rcommon') . '<a>)</p>
			<script type="text/javascript">setTimeout(function(){ location.href = \'keyManager_new.php?action=manage&id_bk=' . $id_bk . '\'}, 2000);</script>';

		break;
	case 'import':
		$post_max_size = ini_get('post_max_size');
		$post_max_size_bytes = (textlib::substr($post_max_size, 0, textlib::strlen($post_max_size) - 1) * (1024 * 1024));

		$post_max_size_bytes = ($CFG->maxbytes != 0 && $CFG->maxbytes < $post_max_size_bytes)? $CFG->maxbytes: $post_max_size_bytes;
		$post_max_size = $post_max_size_bytes / (1024 * 1024);

		echo '<script type="text/javascript">
        //<![CDATA[
        function openpopup_help(url,name,options,fullscreen) {
            fullurl = "'.$CFG->wwwroot.'" + url;
            windowobj = window.open(fullurl,name,options);
            if (fullscreen) {
                windowobj.moveTo(0,0);
                windowobj.resizeTo(screen.availWidth,screen.availHeight);
            }
            windowobj.focus();
            return false;
        }
        //]]>
        </script>';
		$popupurl = '/blocks/rcommon/lang/'.$CFG->lang.'/help/rcommon/importcsv.html';
		echo '<p>' . get_string('keymanager_import_explanation', 'block_rcommon', $post_max_size) . '
                <span class="helplink"><a title="Ajuda" href="#" onclick="this.target=\'popup\'; return openpopup_help(\''.$popupurl.'\',  \'popup\', \'menubar=0,location=0,scrollbars,resizable,width=500,height=400\', 0);"><img class="iconhelp" alt="Ajuda" src="'.$OUTPUT->pix_url('help').'"></a></span>
                </p>
		<form action="keyManager_new.php?action=importstep2" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="' . $post_max_size_bytes . '"/>
			<input type="file" name="file">';
			echo '<br><p class="center_rcommon"><input type="submit" value="' . get_string('keymanager_import_button', 'block_rcommon') . '"/> <input type="button" value="' . get_string('back') . '" onclick="location.href=\'keyManager_new.php\'"></p>
		</form>';
		break;
	case 'importstep2':
		@set_time_limit(3600); // 1 hour should be enough
		@raise_memory_limit('256M');

		$post_max_size = ini_get('post_max_size');
		$post_max_size_bytes = (textlib::substr($post_max_size, 0, textlib::strlen($post_max_size) - 1) * (1024 * 1024));

		$post_max_size_bytes = ($CFG->maxbytes != 0 && $CFG->maxbytes < $post_max_size_bytes)? $CFG->maxbytes: $post_max_size_bytes;

		ini_set('post_max_size', $post_max_size_bytes);
		ini_set('upload_max_filesize', $post_max_size_bytes);

		if (!isset($_FILES['file']) || $_FILES['file']['error'] > 0){
			if ($_FILES['file']['error'] > 0 && $_FILES['file']['error'] < 8){
				echo '<p style="color:red;">' . get_string('keymanager_import_error_' . $_FILES['file']['error'], 'block_rcommon') . '</p>';
				echo '<br><p class="center_rcommon"><a href="keyManager_new.php?action=import"><button>' . get_string('back') . '</button></a></p>';
			} else {
				echo '<p style="color:red;">' . get_string('keymanager_import_error', 'block_rcommon') . '</p>';
				echo '<br><p class="center_rcommon"><a href="keyManager_new.php?action=import"><button>' . get_string('back') . '</button></a></p>';
			}
			break;
		}

		$file = @fopen($_FILES['file']['tmp_name'], "r");
		if ($file) {
			$i                 = 0;
			$rows              = array();
			$rows_error        = array();
			$rows_alert        = array();
			$duplication_check = array();
			$columns_count     = 0;

			while (!feof($file)) {
				$line  = trim(fgets($file));
				$line = trim($line, "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x10\x11\x12\x13\x14\x15\x16\x17\x18\x19\x20");
                if ($i == 0 && textlib::strlen($line) >=3 && (textlib::substr($line, 0, 3) === "\xEF\xBB\xBF")){
                    $line = textlib::substr($line, 3);
                }

				$data = explode(';', $line);

				//sanitize data
				foreach($data as $k => $v){
					$data[$k] = trim($v, "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x10\x11\x12\x13\x14\x15\x16\x17\x18\x19\x20\x22\x27");
				}

				if (count($data) == 0 || empty($data[0])){
					continue;
				}

				//echo 'line: ' . serialize($line);
				//echo 'data: ' . serialize($data) . '<hr>'; //debug

				$error = false;
				$alert = false;

				if ($i == 0){
					//test columns
					$columns = array('isbn' => '', 'credential' => '');

					$error = false;
					foreach($columns as $k => $v){
						$column_index = array_search(trim($k), $data);
						if ($column_index === false){
							//die($k . ' - ' . serialize($column_index) . ' - ' . serialize($data));
							$error = true;
							break;
						} else {
							$columns[$k] = $column_index;
						}
					}

					//cath username
					if ($key = array_search('username', $data)){
						$columns['username'] = $key;
					}

					// cath userid
					if ($key = array_search('userid', $data)){
						$columns['userid'] = $key;
					}

					if ($error){
						echo '<p style="color:red;">' . get_string('keymanager_import_error_9', 'block_rcommon') . '</p>';
						break;
					}

					$columns_count = count($columns);
					//echo serialize($columns) . '<hr>'; //debug
				} else {
					//process rows
					$row = array();

					//test isbn
					if (empty($data[$columns['isbn']])){
						$row[$columns['isbn']] = array('value' => get_string('keymanager_import_error_10', 'block_rcommon'), 'type' => 'error');
						$error = true;
					} else {
						if ($bk = $DB->get_record('rcommon_books', array('isbn' => $data[$columns['isbn']]))){
							$row[$columns['isbn']] = array('value' => $data[$columns['isbn']], 'type' => '');
						} else {
							$row[$columns['isbn']] = array('value' => get_string('keymanager_import_error_18', 'block_rcommon', $data[$columns['isbn']]), 'type' => 'error');
							$error = true;
						}
					}

					//test username or userid
					if (isset($columns['username']) || isset($columns['userid'])){

						if (!isset($columns['username'])){
							$columns['username'] = 99;
							$data[99] = '';
						} else if (!isset($columns['userid'])){
							$columns['userid'] = 99;
							$data[99] = '';
						}

						if (empty($data[$columns['username']]) && empty($data[$columns['userid']])){
							$row[$columns['username']] = array('value' => '-', 'real_value' => 0, 'type' => '');
							$row[$columns['userid']] = array('value' => '-', 'real_value' => 0, 'type' => '');
							$user = false;
						} else {
							$user_a = !empty($data[$columns['username']])? 'username': 'userid';
							$user_c = !empty($data[$columns['username']])? 'username': 'id';
							$user_v = !empty($data[$columns['username']])? $data[$columns['username']]: $data[$columns['userid']];

// MARSUPIAL ************ MODIFICAT -> Check if is numeric and field is id
// 2013.02.08 @abertranb
							if (!($user_c == 'id' && !is_numeric($user_v)) && $user = $DB->get_record('user', array($user_c => $user_v), '*', 'id, username')){
// ************ MODIFICAT
							//if ($user = $DB->get_record('user', array($user_c => $user_v), '*', 'id, username')){
// ************ FI
								$row[$columns[$user_a]] = array('value' => $user->username, 'real_value' => $user->id, 'type' => '');
								$user_a = $user_a == 'username'? 'userid': 'username';
								$row[$columns[$user_a]] = array('value' => '-', 'type' => '');
							} else {
								if ($user_a == 'username'){
									$row[$columns['username']] = array('value' => get_string('keymanager_import_error_13', 'block_rcommon', $user_v), 'type' => 'error');
									$row[$columns['userid']] = array('value' => '-', 'type' => '');
								} else {
									$row[$columns['username']] = array('value' => '-', 'type' => '');
									$row[$columns['userid']] = array('value' => get_string('keymanager_import_error_14', 'block_rcommon', $user_v), 'type' => 'error');
								}
								$error = true;
							}
						}
					}

					//test if isset any credential for that book and user
					$duplicated = false;
					if (isset($user) && $user){
						if ($cred = $DB->get_record_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$data[$columns['isbn']]}' AND euserid = {$user->id}")){
							$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_19', 'block_rcommon'), 'type' => 'error');
							$error = true;
							$duplicated = true;
						} else {
							$tmp = array('isbn' => $data[$columns['isbn']], 'user' => $user->id);
							if (in_array($tmp, $duplication_check)){
								$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_20', 'block_rcommon'), 'type' => 'error');
								$error = true;
								$duplicated = true;
							}
							$duplication_check[] = $tmp;
						}
					}

					//test credential
					if (!$duplicated){
						if (empty($data[$columns['credential']])){
							$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_11', 'block_rcommon'), 'type' => 'error');
							$error = true;
						} else {
							if (isset($user) && $user){
								//test if cred it's already assigned
								if ($cred = $DB->get_record_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$data[$columns['isbn']]}' AND credentials = '{$data[$columns['credential']]}' AND euserid = {$user->id}")){
									$a = new stdClass();
									$a->user = $user->username;
									$a->cred = $data[$columns['credential']];
									$a->bk   = $data[$columns['isbn']];
									$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_15', 'block_rcommon', $a), 'type' => 'error');
									$error = true;
								} else {
									//test if there are more cred like this
									if ($creds = $DB->get_records_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$data[$columns['isbn']]}' AND credentials = '{$data[$columns['credential']]}'")){
										$a = new stdClass();
										$a->cnt = count($creds);
										$a->bk  = $data[$columns['isbn']];
										$row[$columns['credential']] = array('value' => $data[$columns['credential']].' - '.get_string('keymanager_import_error_16', 'block_rcommon', $a), 'real_value' => $data[$columns['credential']], 'type' => 'alert');
										$alert = true;
									} else {
										$row[$columns['credential']] = array('value' => $data[$columns['credential']], 'type' => '');
									}
								}
							} else {
								//test if there are more cred like this
								if ($creds = $DB->get_records_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$data[$columns['isbn']]}' AND credentials = '{$data[$columns['credential']]}'")){
									$a = new stdClass();
									$a->cnt = count($creds);
									$a->bk  = $data[$columns['isbn']];
									$row[$columns['credential']] = array('value' => $data[$columns['credential']].' - '.get_string('keymanager_import_error_16', 'block_rcommon', $a), 'real_value' => $data[$columns['credential']], 'type' => 'alert');
									$alert = true;
								} else {
									$row[$columns['credential']] = array('value' => $data[$columns['credential']], 'type' => '');
								}
							}
						}
					}

					if ($error || $alert){
						$rows_error[$i - 1] = $row;
						if ($alert){
							$rows_alert[$i - 1] = $row;
							$rows[$i - 1]       = $row;
						}
					} else {
						$rows[$i - 1] = $row;
					}
				}

				$i++;
			}
			fclose($file);
			//echo '<hr>rows_error: ' . serialize($rows_error) . '<hr>'; //debug
			//echo '<hr>rows_alert: ' . serialize($rows_alert) . '<hr>'; //debug
			//echo '<hr>rows: ' . serialize($rows) . '<hr>'; //debug

			//test file not empty
			if ($i == 0){
				echo '<br><br><p class="center_rcommon"><a href="keyManager_new.php?action=import"><button>' . get_string('back') . '</button></a></p>';
				break;
			}
			if ($i == 1){
				echo '<p>' . get_string('keymanager_import_error_17', 'block_rcommon') . '</p>';
				echo '<br><br><p class="center_rcommon"><a href="keyManager_new.php?action=import"><button>' . get_string('back') . '</button></a></p>';
				break;
			}

			$critical_error = false;

			//print results
			if (count($rows_error) > 0){

				echo '<table width="100%" summary="" cellpadding="4">
				<tr>
					<th></th>';
					foreach($columns as $k => $v){
						echo '<th>' . $k . '</th>';
					}
				echo '</tr>';
				foreach($rows_error as $k => $v){
					echo '<tr>
						<td>' . ($k + 1) . '</td>';
						foreach($columns as $k2 => $v2){

							$class = ($v[$v2]['type'] != '')? ' class="' . $v[$v2]['type'] . '"': '';
							echo '<td' . $class . '>' . $v[$v2]['value'] . '</td>';
							if ($v[$v2]['type'] == "error"){
								$critical_error = true;
							}
						}
					echo '</tr>';
				}
				echo '</table>';
			}

			if ($critical_error){
				echo '<p>' . get_string('keymanager_import_resum_error', 'block_rcommon') . '</p>';
				echo '<p class="center_rcommon"><a href="keyManager_new.php?action=import"><button>' . get_string('cancel') . '</button></a></p>';
			} else {

				if (count($rows_error) != 0){
					if (count($rows_alert) > 0){
						echo '<p>' . get_string('keymanager_import_resum_alert', 'block_rcommon') . '</p>';
					} else {
						echo '<p>' . get_string('keymanager_import_resum_msg', 'block_rcommon') . '</p>';
					}

					echo '<form id="frm" name="frm" action="keyManager_new.php?action=importstep3" method="post" class="center_rcommon">
						<input type="hidden" name="columns" value=\'' . serialize($columns) . '\'>
						<input type="hidden" name="rows" value=\'' . serialize($rows) . '\'>
						<input type="hidden" name="rows_alert" value=\'' . serialize($rows_alert) . '\'>';
					echo '<br><p class="center_rcommon"><input type="submit" value="' . get_string('continue') . '"/> <a href="keyManager_new.php"><input type="button" value="' . get_string('back') . '"/></a></p></form>';
				} else {
					echo '<form id="frm" name="frm" action="keyManager_new.php?action=importstep3" method="post" class="center_rcommon">
					<input type="hidden" name="columns" value=\'' . serialize($columns) . '\'>
					<input type="hidden" name="rows" value=\'' . serialize($rows) . '\'>
					<input type="hidden" name="rows_alert" value=\'' . serialize($rows_alert) . '\'>';
					echo '<script type="text/javascript">setTimeout("document.frm.submit()", 0);</script>';
				}
			}
		} else {
			echo get_string('keymanager_import_error_8', 'block_rcommon');
			echo '<br><br><p class="center_rcommon"><a href="keyManager_new.php?action=import"><button>' . get_string('back') . '</button></a></p>';
			break;
		}

		break;
	case 'importstep3':
		$columns = required_param('columns', PARAM_RAW);
		$columns = unserialize(str_replace('\\', '', $columns));
		$rows_ser = required_param('rows', PARAM_RAW);
		$rows = unserialize(str_replace('\\', '', $rows_ser)); //echo "rows: {$rows_ser}"; //debug
		$rows_cnt = count($rows) > 10? 10: count($rows);
		$rows_alert = required_param('rows_alert', PARAM_RAW);
		$rows_alert = unserialize(str_replace('\\', '', $rows_alert));

		echo '<p>' . get_string('keymanager_import_resum_intro', 'block_rcommon', $rows_cnt) . '</p>
		<table width="100%" summary="" cellpadding="4">
			<tr>
			<th></th>';
			foreach($columns as $k => $v){
				echo '<th>' . $k . '</th>';
			}
			echo '</tr>';

			$i = 0;
			foreach($rows as $k => $v){
				echo '<tr>
				<td>' . ($k + 1) . '</td>';
				foreach($columns as $k2 => $v2){
					echo '<td>' . $v[$v2]['value'] . '</td>';
				}
				echo '</tr>';
				$i++;
				if ($i > 9){
					break;
				}
			}
		echo '</table>
		<div class="center_rcommon" style="width: 300px;background-color: #e1e1e1; margin: 10px 0 0 300px; padding: 3px;">
			<p><b>' . get_string('keymanager_import_resum', 'block_rcommon') . '</b></p>
			<p style="text-align:left;">' . get_string('marsupialcredentials', 'block_rcommon') . '<span style="float:right; margin-right: 5px;">' . count($rows) . '</span></p>
			<p style="text-align:left;">' . get_string('keymanager_import_resum_alerts', 'block_rcommon') . '<span style="float:right; margin-right: 5px;">' . count($rows_alert) . '</span></p>
			<p style="text-align:left;">' . get_string('keymanager_import_resum_errors', 'block_rcommon') . '<span style="float:right; margin-right: 5px;">0</span></p>
			<p></p>
		</div>
		<form action="keyManager_new.php?action=importstep4" method="post">
			<input type="hidden" name="columns" value=\'' . serialize($columns) . '\'>
			<input type="hidden" name="rows" value=\'' . $rows_ser . '\'>
			<!--p class="center_rcommon">' . get_string('keymanager_import_resum_msg', 'block_rcommon', count($rows)) . '</p-->
			<p class="center_rcommon"><input type="submit" value="' . get_string('keymanager_import_button', 'block_rcommon') . '"/> <a href="' . $CFG->wwwroot . '/blocks/rcommon/keyManager_new.php"><input type="button" value="' . get_string('cancel') . '"/></a></p>
		</form>';

		break;
	case 'importstep4':
		$columns = required_param('columns', PARAM_RAW);
		$columns = unserialize(str_replace('\\', '', $columns));
		$rows_ser = required_param('rows', PARAM_RAW);
		$rows = unserialize(str_replace('\\', '', $rows_ser));
		$rows_cnt = count($rows) > 10? 10: count($rows);

		$errors_cnt = 0;

		foreach($rows as $k => $v){
			$in               = new stdClass();
			if (isset($columns['username']) || isset($columns['userid'])){
				$in->euserid      = $v[$columns['username']]['value'] != "-"? 'username': 'userid';
				$in->euserid      = !isset($v[$columns[$in->euserid]]['real_value'])? $v[$columns[$in->euserid]]['value']: $v[$columns[$in->euserid]]['real_value'];
			} else {
				$in->euserid      = 0;
			}
			$in->isbn         = $v[$columns['isbn']]['value'];
			$in->credentials  = !isset($v[$columns['credential']]['real_value'])?$v[$columns['credential']]['value']:$v[$columns['credential']]['real_value'];
			$in->timecreated  = time();
			$in->timemodified = time();
			//echo "in: " . serialize($in) . "<hr>"; //debug
			if (!$DB->insert_record('rcommon_user_credentials', $in)){
				$errors_cnt++;
				continue;
			}
		}

		if ($errors_cnt > 0){
			$msg = 'keymanager_import_message_error';
			$a = new stdClass();
			$a->errors = $errors_cnt;
			$a->ok = count($rows) - $errors_cnt;
		} else  {
			$msg = 'keymanager_import_message';
			$a = new stdClass();
			$a->ok = count($rows);
		}
		echo '<p class="center_rcommon">' . get_string($msg, 'block_rcommon', $a) . ' <a href="keyManager_new.php" title="' . get_string('goback_title', 'block_rcommon') . '">' . get_string('click_here', 'block_rcommon') . '<a>)</p>
			<script type="text/javascript">setTimeout(function(){ location.href = \'keyManager_new.php\'}, 2000);</script>';
		break;
	default:
		//print submenu

                echo '<div class="right"><input onclick="document.location.href=\'export.php\';" type="submit" value="'.get_string('keymanager_export', 'block_rcommon').'" />';
		echo '<input onclick="document.location.href=\'keyManager_new.php?action=import\';" type="submit" value="'.get_string('keymanager_import', 'block_rcommon').'" /></div>';

		//load data form db
		$sql = "SELECT rb.id, rp.name as ed_name, rb.name as bk_name, data.isbn, data.cnt_tot, data.cnt_assig FROM
(SELECT rb.isbn, count(ruc.isbn) as cnt_tot, SUM(case when ruc.euserid > 0 THEN 1 ELSE 0 END) as cnt_assig FROM {rcommon_books} rb LEFT JOIN {rcommon_user_credentials} ruc ON rb.isbn = ruc.isbn GROUP BY rb.isbn) data
LEFT JOIN {rcommon_books} rb ON data.isbn = rb.isbn LEFT JOIN {rcommon_publisher} rp ON rb.publisherid = rp.id ORDER BY ed_name, bk_name";
		//echo '<p style="clear: both;">' . $sql . '</p>'; //debug
		$list_credentials = $DB->get_records_sql($sql);

		//print data
		echo '<table cellpadding="5" width="100%" class="generaltable">
			<thead>
			<tr>
				<th  class="header c0">' . get_string('publisher', 'block_rcommon') . '</th>
				<th  class="header c1">' . get_string('book', 'block_rcommon') . '</th>
				<th width="95"  class="header c2">' . get_string('assigned', 'block_rcommon') . '</th>
				<th width="95"  class="header c3">' . get_string('totals', 'block_rcommon') . '</th>
				<th width="95" class="header c4">' . get_string('actions', 'block_rcommon') . '</th>
			</tr>
			</thead>';
		if ($list_credentials){
			foreach ($list_credentials as $credential){
				echo '<tr>
						<td>' . $credential->ed_name . '</td>
						<td><span title="' . $credential->bk_name . ' (' . $credential->isbn . ')">' . (textlib::strlen($credential->bk_name) > 50? textlib::substr($credential->bk_name, 0, 50) . '...': $credential->bk_name) . ' (' . $credential->isbn . ')</span></td>
						<td align="center">' . $credential->cnt_assig . '</td>
						<td align="center">' . $credential->cnt_tot . '</td>
						<td align="center"><a href="keyManager_new.php?action=manage&id_bk=' . $credential->id .'" title="' . get_string('see_details_atitle', 'block_rcommon') . '">' . get_string('see_details', 'block_rcommon') . '</a></td>
					</tr>';
			}
		} else {
			echo '<tr><td colspan="5">' . get_string('norows_toshow', 'block_rcommon') . '</td></tr>';
		}
		echo '</table>';
}
echo '</div>';

echo $OUTPUT->footer();

// **************** FI
