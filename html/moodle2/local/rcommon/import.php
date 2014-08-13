<?php
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once("{$CFG->libdir}/formslib.php");
require_once('forms.php');

require_login();

require_capability('local/rcommon:importcredentials', context_system::instance());

require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('keymanager_import');
echo $OUTPUT->header();

$courses = array();

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

$step  = optional_param('step', 1, PARAM_INT);

// get parameters

//key synchronization
echo $OUTPUT->heading(get_string('keymanager_import_title', 'local_rcommon'));
echo '<div class="generalbox box contentbox">';
$mform = new local_rcommon_import_credentials_form();
if($step == 2 && (!$fromform = $mform->get_data() or !confirm_sesskey())){
	$step = 1;
}

switch ($step){
	case 2:
		@set_time_limit(3600); // 1 hour should be enough
		@raise_memory_limit('256M');

		$content = $mform->get_file_content('file');
		if ($content) {
			$i                 = 0;
			$rows              = array();
			$rows_error        = array();
			$rows_alert        = array();
			$duplication_check = array();
			$columns_count     = 0;

			$lines = explode("\n",$content);
			foreach ($lines as $line){
				$line  = trim($line);
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
						echo $OUTPUT->notification(get_string('keymanager_import_error_9', 'local_rcommon'));
						break;
					}

					$columns_count = count($columns);
					//echo serialize($columns) . '<hr>'; //debug
				} else {
					//process rows
					$row = array();

					//test isbn
					if (empty($data[$columns['isbn']])){
						$row[$columns['isbn']] = array('value' => get_string('keymanager_import_error_10', 'local_rcommon'), 'type' => 'error');
						$error = true;
					} else {
						if ($bk = $DB->get_record('rcommon_books', array('isbn' => $data[$columns['isbn']]))){
							$row[$columns['isbn']] = array('value' => $data[$columns['isbn']], 'type' => '');
						} else {
							$row[$columns['isbn']] = array('value' => get_string('keymanager_import_error_18', 'local_rcommon', $data[$columns['isbn']]), 'type' => 'error');
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
									$row[$columns['username']] = array('value' => get_string('keymanager_import_error_13', 'local_rcommon', $user_v), 'type' => 'error');
									$row[$columns['userid']] = array('value' => '-', 'type' => '');
								} else {
									$row[$columns['username']] = array('value' => '-', 'type' => '');
									$row[$columns['userid']] = array('value' => get_string('keymanager_import_error_14', 'local_rcommon', $user_v), 'type' => 'error');
								}
								$error = true;
							}
						}
					}

					//test if isset any credential for that book and user
					$duplicated = false;
					if (isset($user) && $user){
						if ($cred = $DB->get_record_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$data[$columns['isbn']]}' AND euserid = {$user->id}")){
							$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_19', 'local_rcommon'), 'type' => 'error');
							$error = true;
							$duplicated = true;
						} else {
							$tmp = array('isbn' => $data[$columns['isbn']], 'user' => $user->id);
							if (in_array($tmp, $duplication_check)){
								$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_20', 'local_rcommon'), 'type' => 'error');
								$error = true;
								$duplicated = true;
							}
							$duplication_check[] = $tmp;
						}
					}

					//test credential
					if (!$duplicated){
						if (empty($data[$columns['credential']])){
							$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_11', 'local_rcommon'), 'type' => 'error');
							$error = true;
						} else {
							if (isset($user) && $user){
								//test if cred it's already assigned
								if ($cred = $DB->get_record_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$data[$columns['isbn']]}' AND credentials = '{$data[$columns['credential']]}' AND euserid = {$user->id}")){
									$a = new stdClass();
									$a->user = $user->username;
									$a->cred = $data[$columns['credential']];
									$a->bk   = $data[$columns['isbn']];
									$row[$columns['credential']] = array('value' => get_string('keymanager_import_error_15', 'local_rcommon', $a), 'type' => 'error');
									$error = true;
								} else {
									//test if there are more cred like this
									if ($creds = $DB->get_records_sql("SELECT id FROM {rcommon_user_credentials} WHERE isbn = '{$data[$columns['isbn']]}' AND credentials = '{$data[$columns['credential']]}'")){
										$a = new stdClass();
										$a->cnt = count($creds);
										$a->bk  = $data[$columns['isbn']];
										$row[$columns['credential']] = array('value' => $data[$columns['credential']].' - '.get_string('keymanager_import_error_16', 'local_rcommon', $a), 'real_value' => $data[$columns['credential']], 'type' => 'alert');
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
									$row[$columns['credential']] = array('value' => $data[$columns['credential']].' - '.get_string('keymanager_import_error_16', 'local_rcommon', $a), 'real_value' => $data[$columns['credential']], 'type' => 'alert');
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
			//echo '<hr>rows_error: ' . serialize($rows_error) . '<hr>'; //debug
			//echo '<hr>rows_alert: ' . serialize($rows_alert) . '<hr>'; //debug
			//echo '<hr>rows: ' . serialize($rows) . '<hr>'; //debug

			//test file not empty
			if ($i == 0){
				echo '<br><br><p class="center_rcommon"><a href="import.php"><button>' . get_string('back') . '</button></a></p>';
				break;
			} else if ($i == 1){
				echo $OUTPUT->notification(get_string('keymanager_import_error_17', 'local_rcommon'));
				echo '<br><br><p class="center_rcommon"><a href="import.php"><button>' . get_string('back') . '</button></a></p>';
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
				echo $OUTPUT->notification(get_string('keymanager_import_resum_error', 'local_rcommon'));
				echo '<p class="center_rcommon"><a href="import.php"><button>' . get_string('cancel') . '</button></a></p>';
			} else {

				if (count($rows_error) != 0){
					if (count($rows_alert) > 0){
						echo $OUTPUT->notification(get_string('keymanager_import_resum_alert', 'local_rcommon'));
					} else {
						echo $OUTPUT->notification(get_string('keymanager_import_resum_msg', 'local_rcommon'));
					}

					echo '<form id="frm" name="frm" action="import.php?step=3" method="post" class="center_rcommon">
						<input type="hidden" name="columns" value=\'' . serialize($columns) . '\'>
						<input type="hidden" name="rows" value=\'' . serialize($rows) . '\'>
						<input type="hidden" name="rows_alert" value=\'' . serialize($rows_alert) . '\'>';
					echo '<br><p class="center_rcommon"><input type="submit" value="' . get_string('continue') . '"/> <a href="books.php"><input type="button" value="' . get_string('back') . '"/></a></p></form>';
				} else {
					echo '<form id="frm" name="frm" action="import.php?step=3" method="post" class="center_rcommon">
					<input type="hidden" name="columns" value=\'' . serialize($columns) . '\'>
					<input type="hidden" name="rows" value=\'' . serialize($rows) . '\'>
					<input type="hidden" name="rows_alert" value=\'' . serialize($rows_alert) . '\'>';
					echo '<script type="text/javascript">setTimeout("document.frm.submit()", 0);</script>';
				}
			}
		} else {
			echo $OUTPUT->notification(get_string('keymanager_import_error_8', 'local_rcommon'));
			echo '<br><br><p class="center_rcommon"><a href="import.php"><button>' . get_string('back') . '</button></a></p>';
			break;
		}

		break;
	case 3:
		$columns = required_param('columns', PARAM_RAW);
		$columns = unserialize(str_replace('\\', '', $columns));
		$rows_ser = required_param('rows', PARAM_RAW);
		$rows = unserialize(str_replace('\\', '', $rows_ser)); //echo "rows: {$rows_ser}"; //debug
		$rows_cnt = count($rows) > 10? 10: count($rows);
		$rows_alert = required_param('rows_alert', PARAM_RAW);
		$rows_alert = unserialize(str_replace('\\', '', $rows_alert));

		echo '<p>' . get_string('keymanager_import_resum_intro', 'local_rcommon', $rows_cnt) . '</p>
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
			<p><b>' . get_string('keymanager_import_resum', 'local_rcommon') . '</b></p>
			<p style="text-align:left;">' . get_string('marsupialcredentials', 'local_rcommon') . '<span style="float:right; margin-right: 5px;">' . count($rows) . '</span></p>
			<p style="text-align:left;">' . get_string('keymanager_import_resum_alerts', 'local_rcommon') . '<span style="float:right; margin-right: 5px;">' . count($rows_alert) . '</span></p>
			<p style="text-align:left;">' . get_string('keymanager_import_resum_errors', 'local_rcommon') . '<span style="float:right; margin-right: 5px;">0</span></p>
			<p></p>
		</div>
		<form action="import.php?step=4" method="post">
			<input type="hidden" name="columns" value=\'' . serialize($columns) . '\'>
			<input type="hidden" name="rows" value=\'' . $rows_ser . '\'>
			<!--p class="center_rcommon">' . get_string('keymanager_import_resum_msg', 'local_rcommon', count($rows)) . '</p-->
			<p class="center_rcommon"><input type="submit" value="' . get_string('keymanager_import_button', 'local_rcommon') . '"/> <a href="' . $CFG->wwwroot . '/local/rcommon/books.php"><input type="button" value="' . get_string('cancel') . '"/></a></p>
		</form>';

		break;
	case 4:
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
			$a = new stdClass();
			$a->errors = $errors_cnt;
			$a->ok = count($rows) - $errors_cnt;
			echo $OUTPUT->notification(get_string('keymanager_import_message_error', 'local_rcommon', $a));
		} else  {
			$a = new stdClass();
			$a->ok = count($rows);
			echo $OUTPUT->notification(get_string('keymanager_import_message', 'local_rcommon', $a), 'notifysuccess');
		}
		echo '<p class="center_rcommon"><a href="import.php" title="' . get_string('goback_title', 'local_rcommon') . '">' . get_string('click_here', 'local_rcommon') . '<a>)</p>
			<script type="text/javascript">setTimeout(function(){ location.href = \'import.php\'}, 2000);</script>';
		break;
	default:
	case 1:
		$mform->display();
		break;
}
echo '</div>';

echo $OUTPUT->footer();
