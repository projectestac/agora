    <?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");
require_once("locallib.php");
require_once($CFG->libdir.'/adminlib.php');

require_login();

$action  = optional_param('action', '', PARAM_TEXT);

if(!has_capability('local/rcommon:managecredentials', context_system::instance())){
    require_capability('local/rcommon:manageowncredentials', context_system::instance());
    $username = $USER->username;
    if($action != 'manage' && $action != 'delete'){
        $action = 'manage';
    }
} else {
}

admin_externalpage_setup('marsupial_credentials_users');
echo $OUTPUT->header();

// get parameters


echo $OUTPUT->heading(get_string('keymanager', 'local_rcommon'));

//key synchronization
switch ($action){
	case 'manage':
		$username = required_param('username', PARAM_TEXT);
		$record = $DB->get_record('user', array('username' => $username));
		if(!$record) {
			echo $OUTPUT->notification(get_string('usernotfound', 'local_rcommon'));
		} else {
			$id = $record->id;

			$sql = 'SELECT rcuc.*, rcb.name, rcp.name AS pname
					FROM {rcommon_user_credentials} rcuc
					JOIN {rcommon_books} rcb
						ON rcb.isbn =  rcuc.isbn
					JOIN {rcommon_publisher} rcp
						ON rcp.id = rcb.publisherid
					WHERE euserid = :userid ORDER BY rcb.name ASC ';
			$credentials = $DB->get_records_sql($sql, array('userid'=>$id));
			echo '<input type="submit" onclick="document.location.href=\'add_user_credential.php?username='.$username.'\'" value="'.get_string('keyadd', 'local_rcommon').'" />';
			echo '<p>'.get_string('keysshowingfor','local_rcommon').' <b>'.htmlentities($username).'</b><br/>';
			if(!$credentials) {
				echo $OUTPUT->notification(get_string('userhasnokeys','local_rcommon'));
			} else {
                $table = new html_table();
				$table->class = 'generaltable generalbox';
				$table->head = array(get_string('publisher', 'local_rcommon'),get_string('book', 'local_rcommon'), get_string('key','local_rcommon'), get_string('actions','local_rcommon'),"");
				$table->align = array('left','left', 'center', 'center', 'center');
				foreach($credentials as $credential) {
					$row = array();
					$row[] = $credential->pname;
					$row[] = $credential->name.' ('.$credential->isbn.')';
					$row[] = $credential->credentials;
					$actions = array();
					$actions[] = '<a href="edit_book_credential.php?id='.$credential->id.'">'.get_string('edit').'</a>';
					$actions[] = '<a href="users.php?action=delete&id='.$credential->id.'&username='.$username.'">'.get_string('keymanager_unassignaction','local_rcommon').'</a>';
					$actions[] = '<a onclick="M.local_rcommon.exec_test(' . $credential->id . ');" title="' . get_string('keymanager_test', 'local_rcommon') . '">' . get_string('keymanager_test', 'local_rcommon') . '</a>';
					$row[] = implode(' | ', $actions);
					$row[] = '<img id="loading_small_' . $credential->id.'" style="visibility:hidden" src="'.$OUTPUT->pix_url('i/loading_small').'" alt="" /><span id="desc_' . $credential->id . '"></span>';
					$table->data[] = $row;
				}
				echo html_writer::table($table);
				$jsmodule = array(
					'name'     => 'local_rcommon',
					'fullpath' => '/local/rcommon/javascript.js',
					'requires' => array('base','io','panel'),
				);
				$PAGE->requires->js_init_call('M.local_rcommon.init', array(), true, $jsmodule);
			}
		}
	break;
	case 'delete':
		$id       = required_param('id', PARAM_INT);
		$username = required_param('username', PARAM_TEXT);
		$confirm  = optional_param('confirm', false, PARAM_BOOL);
		if(!$confirm) {
			echo '<p>'.get_string('keyconfirmdelete', 'local_rcommon').'</p>';
			echo '<br/>';
			echo '<a href="users.php?action=delete&username='.$username.'&confirm=true&id='.$id.'">'.get_string('keydelbtn', 'local_rcommon').'</a> &nbsp;&nbsp;<a href="users.php?action=manage&username='.urlencode($username).'">'.get_string('back').'</a>';
		} else {
			//delete
			credentials::delete($id);
			echo '<script>document.location.href="users.php?action=manage&username='.$username.'";</script>';
		}
	break;
	default:
        require_capability('local/rcommon:managecredentials', context_system::instance());
	 	$usercount = get_users(false, '', true);
	    $with_credentials = $DB->get_field_sql ('SELECT DISTINCT count(u.id) AS with_credentials FROM {user} u WHERE u.id IN (SELECT uc.euserid FROM {rcommon_user_credentials} uc GROUP BY uc.euserid)');

	    $a = new StdClass();
	    $a->total_users = $usercount;
	    $a->with_credentials = $with_credentials;

	    echo '<p>'.get_string('users_proportion', 'local_rcommon', $a).'</p>';

		$context = context_system::instance();
		$site = get_site();
		$sort         = 'firstname';
	    $page         = optional_param('page', 0, PARAM_INT);
	    $perpage      = optional_param('perpage', 30, PARAM_INT);        // how many per page
	    $show 		  = optional_param('show', 'all', PARAM_TEXT);        // how many per page
		$username = optional_param('username', false, PARAM_TEXT);

		/*echo '<p>'.get_string('keyslookupusertext','local_rcommon').'</p>';
		$users = get_users(true, '', true);
		$options = array();
		foreach($users as $user){
			$options[$user->username] = $user->firstname.' '.$user->lastname.' ('.$user->username.')';
		}

		echo $OUTPUT->single_select('users.php?action=manage', 'username', $options, $username);*/

		$options = array('all' => get_string('showallusers'), 'with' => get_string('with_credentials', 'local_rcommon'), 'without' => get_string('without_credentials', 'local_rcommon'));
		echo get_string('filter','local_rcommon').': ';
		echo $OUTPUT->single_select('users.php', 'show', $options, $show, null);

    	if($show == 'with') {
    		$join = 'INNER JOIN';
    		$extrasql = "";
    	} else if($show == 'without') {
    		$join = 'LEFT JOIN';
    		$extrasql = ' AND cr.euserid is NULL';
    	} else {
    		$join = 'LEFT JOIN';
    		$extrasql = "";
	    }
		$sql = "SELECT u.id, u.firstname, u.lastname, u.username, COUNT(DISTINCT cr.id) AS books FROM {user} u
				$join {rcommon_user_credentials} cr
				ON u.id = cr.euserid
				WHERE u.confirmed = 1 AND u.deleted = 0 AND u.username != 'guest' $extrasql
				GROUP BY u.id, u.firstname, u.lastname, u.username ORDER BY :sort";

        $users = $DB->get_records_sql ($sql, array('sort'=> $sort), $page*$perpage, $perpage);

	    flush();

	    if ($users) {
			$baseurl = new moodle_url('/local/rcommon/users.php', array('perpage' => $perpage));
	    	echo $OUTPUT->paging_bar($usercount, $page, $perpage, $baseurl);

	        $table = new html_table();
	        $table->head = array ();
	        $table->head[] = get_string('firstname').' / '.get_string('lastname');
	        $table->head[] = get_string('username');
	        $table->head[] = get_string('marsupialcredentials', 'local_rcommon');
	        $table->head[] = get_string('actions');
	        $table->align = array('left','left','center','center');

	        $table->id = "users";
	        foreach ($users as $user) {
	            $buttons = array();
	            $fullname = $user->firstname.' '.$user->lastname;

	            $buttons[] = "<a href=\"users.php?action=manage&username=$user->username\">".get_string('keysadminsearchuserbtn','local_rcommon')."</a>";

	            $row = array ();
	            $row[] = "<a href=\"../../user/view.php?id=$user->id&amp;course=$site->id\">$fullname</a>";
	            $row[] = $user->username;
	            $row[] = $user->books;
	            $row[] = implode(' ', $buttons);
	            $table->data[] = $row;
	        }

	        echo html_writer::start_tag('div', array('class'=>'no-overflow'));
	        echo html_writer::table($table);
	        echo html_writer::end_tag('div');
	        echo $OUTPUT->paging_bar($usercount, $page, $perpage, $baseurl);
	    }

}

echo $OUTPUT->footer();

