<?php
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once("{$CFG->libdir}/formslib.php");
require_once("locallib.php");

require_login();

require_capability('local/rcommon:managecredentials', context_system::instance());

require_once($CFG->libdir.'/adminlib.php');

$id = required_param('id', PARAM_INT);
$action = required_param('action', PARAM_ACTION);

$book = $DB->get_record('rcommon_books', array('id' => $id));
admin_externalpage_setup('marsupialcontent'.$book->publisherid);
echo $OUTPUT->header();

//key synchronization
echo $OUTPUT->heading(get_string('keymanager', 'local_rcommon'));
echo '<div class="generalbox box contentbox">';

$credentials = $DB->get_records_sql("SELECT ruc.id, ruc.credentials, ruc.euserid, u.lastname, u.firstname FROM {rcommon_user_credentials} ruc LEFT JOIN {user} u ON ruc.euserid = u.id WHERE isbn = '{$book->isbn}' ORDER BY u.lastname, u.firstname");

// print content
echo $OUTPUT->heading($book->name . ' (' . $book->isbn . ')',3);

$referer = $CFG->wwwroot.'/local/rcommon/books.php?id='.$book->id;

switch($action){
	case 'unassign':
		$ids       = required_param_array('ids', PARAM_INT);

	   	if (credentials::bulk_unassign($ids)){
            redirect($referer, get_string('keymanager_unassing_ok', 'local_rcommon'), 2);
	   	} else {
            redirect($referer, get_string('keymanager_unassing_ko', 'local_rcommon'), 5);
        }
		break;
	case 'delete':
		$ids       = required_param_array('ids', PARAM_INT);

	   	if (credentials::bulk_delete($ids)){
	   		redirect($referer, get_string('keymanager_delete_ok', 'local_rcommon'), 2);
	   	} else {
            redirect($referer, get_string('keymanager_delete_ko', 'local_rcommon'), 5);
        }
		break;
	break;
	case 'assign':
		define("MAX_USERS_PER_PAGE", 5000);

		//get received info
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
			$ids = implode(',', $ids);
		}
		else {
			$ids = '';
		}
		$course  = $DB->get_record('course', array('id' => $courseid));

		//set some text vars
		$strsearch = get_string('search');
		$strsearchresults = get_string('searchresults');
		$strshowall = trim(get_string('showall', 'moodle', ""));
		//if isset form doactions
		if ($frm = data_submitted()){
			if (!empty($frm->addselect) && confirm_sesskey()) {
                credentials::bulk_assign_users($book->isbn, $array_ids, $frm->addselect);
			} else if (!empty($frm->removeselect) && confirm_sesskey()) {
                credentials::bulk_unassign_users($book->isbn, $frm->removeselect);
			} else if ($showall) {
            	$searchtext = '';
            	$courseid   = 0;
        	}
		}

		$already_asigned_users     = $DB->get_records_sql("SELECT c.euserid as id, u.firstname, u.lastname, u.email FROM {user} u RIGHT JOIN {rcommon_user_credentials} c ON u.id = c.euserid WHERE c.id IN ({$ids}) AND euserid <> 0");
		$already_asigned_users_cnt = $already_asigned_users? count($already_asigned_users): 0;
		//echo '<hr>alredy_asigned_users: ' . serialize($already_asigned_users) . '<hr>';

		$already_unassigned = $ids_cnt - $already_asigned_users_cnt;

		$search_where = !empty($searchtext)?" AND (firstname LIKE '%{$searchtext}%' OR lastname LIKE '%{$searchtext}%' OR username LIKE '%{$searchtext}%')": '';

		if (empty($courseid)){
// MARSUPIAL ************* MODIFICAT -> Add extra control for just show the users confirmed and non deleted in the assigment books credentials process
// 2012.09.05 @mmartinez
			$users_to_show    = $DB->get_records_sql("SELECT u.id, u.firstname, u.lastname, u.email FROM {user} u WHERE u.id NOT IN (SELECT DISTINCT euserid FROM {rcommon_user_credentials} WHERE isbn = '{$book->isbn}') AND deleted = 0 AND confirmed = 1{$search_where} ORDER BY lastname");
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

		echo '<p>' . get_string('keymanager_selected_for_assign', 'local_rcommon', $ids_cnt) . '<br>' . get_string('keymanager_no_assigned_user', 'local_rcommon', $already_unassigned) . '</p>';
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
			 		alert("' . get_string('maxselected_js_error_part1', 'local_rcommon') . ' " + max_users + " ' . get_string('maxselected_js_error_part2', 'local_rcommon') . ' " + cnt_selecteds + " ' . get_string('maxselected_js_error_part3', 'local_rcommon') . '");
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
		echo '<form id="assignform" name="assignform" method="post" action="credentials_bulk.php?action=assign&id=' . $id . '" onsubmit="check_max_users(); return false;">';
		foreach($array_ids as $aid) {
			echo '<input type="hidden" name="ids[]" value="' . $aid . '" />';
		}
		echo '<input type="hidden" name="sesskey" value="'. sesskey() . '" />

			<table width="100%" summary="" style="margin-left:auto;margin-right:auto" border="0" cellpadding="5" cellspacing="0">
			<tr>
				<td valign="top">
					<label for="removeselect">' . get_string('keymanager_assined_user', 'local_rcommon', $already_asigned_users_cnt) . '</label><br />
		          	<select name="removeselect[]" size="20" id="removeselect" multiple="multiple" onfocus="getElementById(\'assignform\').add.disabled=true; getElementById(\'assignform\').remove.disabled=false;getElementById(\'assignform\').addselect.selectedIndex=-1;">';
			            if ($already_asigned_users_cnt > 0){
				            foreach ($already_asigned_users as $contextuser) {
				                $fullname = fullname($contextuser, true);
				                $op_text = !empty($fullname)? $fullname.", ".$contextuser->email: get_string('keymanager_usernotfound', 'local_rcommon');
				                echo "<option value=\"$contextuser->id\">" . $op_text . "</option>\n";
				            }
			            } else {
			                echo '<option>' . get_string('keymanager_assing_nouser', 'local_rcommon') . '</option>'; // empty select breaks xhtml strict
			            }

		          	echo '</select>
		        </td>
		      	<td valign="top">';
		        	echo '<p class="arrow_button">
		            	<input name="add" id="add" type="submit" value="' . $OUTPUT->larrow().'&nbsp;'.get_string('keymanager_assignaction', 'local_rcommon') . '" title="'. get_string('add') . '"';
		            	if ($already_unassigned == 0){
		            		echo ' disabled="true"';
		            	}
		            	echo '/><br />
		            	<input name="remove" id="remove" type="submit" value="' . get_string('keymanager_unassignaction', 'local_rcommon').'&nbsp;'.$OUTPUT->rarrow() . '" title="' . get_string('remove') . '" /><br><br>
		            	<input name="add" id="addall" type="submit" onclick="select_all();" value="' . $OUTPUT->larrow().'&nbsp;'.get_string('keymanager_assignaction_all', 'local_rcommon') . '" title="'. get_string('add') . '"';
		            	if ($already_unassigned == 0){
		            		echo ' disabled="true"';
		            	}
		            	echo '/><br /><input name="remove" id="removeall" type="submit" onclick="unselect_all();" value="' . get_string('keymanager_unassignaction_all', 'local_rcommon').'&nbsp;'.$OUTPUT->rarrow() . '" title="' . get_string('remove') . '" /><br />
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
		                	echo '<option>' . get_string('keymanager_assing_nouser', 'local_rcommon') . '</option>'; // empty select breaks xhtml strict
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

                    $courses = array();
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
		            	<option value=""'; if (!empty($searchtext)) { echo ' selected'; }echo '>' . get_string('keymanager_select_course', 'local_rcommon') . '</option>';
		            	foreach($courses as $k => $v){
		            		echo '<option value="' . $k . '"';
		            		if ($k == $courseid){
		            			echo ' selected';
		            		}
		            		echo '>' . $v . '</option>';
		            	}
		            	echo '</select> <input name="search" id="search" type="submit" value="' . get_string('filter', 'local_rcommon') . '" />';
		            	if (!empty($courseid)) {
		            		echo '<input name="showall" id="showall" type="submit" onclick="getElementById(\'courseid\').selectedIndex=0;getElementById(\'searchtext\').value=\'\';"  value="'.$strshowall.'" />'."\n";
		            	}
		           echo '</td></tr></table></form>';
		   echo '<p style="text-align: center;"><a href="books.php?id=' . $id . '"><button>'. get_string('back') . '</button></a></p>';
		break;
}
echo $OUTPUT->footer();

