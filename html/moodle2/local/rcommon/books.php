<?php
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once("{$CFG->libdir}/formslib.php");

require_login();

require_capability('local/rcommon:managecredentials', context_system::instance());

require_once($CFG->libdir.'/adminlib.php');

$id = required_param('id', PARAM_INT);

$book = $DB->get_record('rcommon_books', array('id' => $id));
admin_externalpage_setup('marsupialcontent'.$book->publisherid);
echo $OUTPUT->header();

//key synchronization
echo $OUTPUT->heading($book->name . ' (' . $book->isbn . ')',2);

// print content
echo $OUTPUT->heading(get_string('manage_credentials', 'local_rcommon'),3);
$credentials = $DB->get_records_sql("SELECT ruc.id, ruc.credentials, ruc.euserid, u.lastname, u.firstname FROM {rcommon_user_credentials} ruc LEFT JOIN {user} u ON ruc.euserid = u.id WHERE isbn = '{$book->isbn}' ORDER BY u.lastname, u.firstname");
echo '<input onclick="document.location.href=\'edit_book_credential.php?backto=books&isbn=' . $book->isbn . '\';" type="submit" value="'.get_string('keymanager_add', 'local_rcommon').'" />';
if (empty($credentials)){
	echo $OUTPUT->notification(get_string('keymanager_nocredentialsfound', 'local_rcommon') );
} else {
	echo '<form action="credentials_bulk.php?id=' . $id . '" id="frm" name="frm" method="post">';
	$table = new html_table();
	$table->class = 'generaltable';
	$table->head = array('', get_string('credential', 'local_rcommon'), get_string('user', 'local_rcommon'), get_string('actions', 'local_rcommon'),"");
	$table->align = array('left', 'left', 'left', 'center', 'center');
	foreach ($credentials as $credential){
		$name = (!empty($credential->lastname) && $credential->lastname != ' ')? $credential->firstname . ' ' . $credential->lastname: ($credential->euserid != 0? get_string('keymanager_usernotfound', 'local_rcommon'): ' - ');

		$row = array();
		$row[] = '<input type="checkbox" name="ids[]" value="' . $credential->id . '" onChange="allow_actions();">';
		$row[] = '<span title="' . $credential->credentials . '">' . (textlib::strlen($credential->credentials) > 30? textlib::substr($credential->credentials, 0, 30) . '...': $credential->credentials);
		$row[] = $name;
		$actions = array();
		$actions[] = '<a href="edit_book_credential.php?backto=books&id=' . $credential->id . '" title="' . get_string('edit') .'" style="margin-left: 15px;">' . get_string('edit') . '</a>';
		if (!empty($credential->credentials) && !empty($credential->euserid)){
			$actions[] = '<a onclick="M.local_rcommon.exec_test(' . $credential->id . ');" title="' . get_string('keymanager_test', 'local_rcommon') . '">' . get_string('keymanager_test', 'local_rcommon') . '</a>';
		}
		$row[] = implode(' | ', $actions);
		$row[] = '<img id="loading_small_' . $credential->id.'" style="visibility:hidden" src="'.$OUTPUT->pix_url('i/loading_small').'" alt="" /><span id="desc_' . $credential->id . '"></span>';
		$table->data[] = $row;
	}
	echo html_writer::table($table);
	echo '<select id="action" name="action" onchange="confirm_actions(this);" disabled>
		<option value="">' . get_string('keymanager_selectaction', 'local_rcommon') . '</option>
		<option value="assign">' . get_string('keymanager_assignaction', 'local_rcommon') . '</option>
		<option value="unassign">' . get_string('keymanager_unassignaction', 'local_rcommon') . '</option>
		<option value="delete">' . get_string('keymanager_deleteaction', 'local_rcommon') . '</option>
	</select> <input type="button" onclick="select_all();" value = "' . get_string('keymanager_selectall', 'local_rcommon') . '"> <input type="button" onclick="unselect_all();" value="' . get_string('keymanager_unselectall', 'local_rcommon') . '">
	</form>';
	$jsmodule = array(
		'name'     => 'local_rcommon',
		'fullpath' => '/local/rcommon/javascript.js',
		'requires' => array('base','io','panel'),
	);
	$PAGE->requires->js_init_call('M.local_rcommon.init', array(), true, $jsmodule);
}

echo $OUTPUT->heading(get_string('units_and_activities', 'local_rcommon'),3);
$units = $DB->get_records('rcommon_books_units',array('bookid'=>$book->id), 'sortorder ASC');
if(!$units){
    echo $OUTPUT->notification(get_string('no_units', 'local_rcommon'));
} else {
    echo '<ul>';
    foreach($units as $unit){
        echo '<li><strong>'.$unit->name.'</strong> ('.$unit->code.') - ';
        echo get_string('lastmodified').': '.userdate($unit->timemodified);
        if(!empty($unit->summary)) echo '<br/>'.$unit->summary;
        $activities = $DB->get_records('rcommon_books_activities',array('unitid'=>$unit->id), 'sortorder ASC');
        if(!$activities){
            echo '<br/>'.get_string('no_activities', 'local_rcommon');
        } else {
            echo '<ul>';
            foreach($activities as $activity){
                echo '<li><strong>'.$activity->name.'</strong> ('.$activity->code.') - ';
                echo get_string('lastmodified').': '.userdate($activity->timemodified);
                if(!empty($activity->summary)) echo '<br/>'.$activity->summary;
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    echo '</ul>';
}


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
		if (el.value != "assign"){
			var message = Array();
			message["unassign"] = "' . get_string('keymanager_messageunassing', 'local_rcommon') . '";
			message["delete"]   = "' . get_string('keymanager_messagedelete', 'local_rcommon') . '";

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

echo $OUTPUT->footer();
