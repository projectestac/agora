<?php

require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once("{$CFG->libdir}/formslib.php");

require_login();

require_capability('moodle/site:config', context_system::instance());

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('marsupialmanage_credentials');
echo $OUTPUT->header();

// get parameters
$action  = optional_param('action', '', PARAM_TEXT);


//key synchronization
echo '<div>
		<h2 class="headingblock header ">'.get_string('keymanager', 'block_rcommon').'</h2>
		<ul class="unlist">
			<li>
				<div class="coursebox clearfix">
					<div class="info-manager">
						<div class="name">';

switch ($action){
	case 'manage':
		$username = required_param('username', PARAM_TEXT);
		echo '<p>'.get_string('keysshowingfor','block_rcommon').' <b>'.htmlentities($username).'</b><br/>';
		$record = $DB->get_record('user', array('username' => $username));
		if(!$record) {
			echo '<p style="color:red">'.get_string('usernotfound', 'block_rcommon').'</p>';
		} else {
			$id = $record->id;
			$credentials = $DB->get_records_sql('SELECT '.$CFG->prefix.'rcommon_user_credentials.*, '.$CFG->prefix.'rcommon_books.name, '.$CFG->prefix.'rcommon_publisher.name AS pname FROM '.$CFG->prefix.'rcommon_user_credentials JOIN '.$CFG->prefix.'rcommon_books ON '.$CFG->prefix.'rcommon_books.isbn =  '.$CFG->prefix.'rcommon_user_credentials.isbn  JOIN '.$CFG->prefix.'rcommon_publisher ON '.$CFG->prefix.'rcommon_publisher.id = '.$CFG->prefix.'rcommon_books.publisherid WHERE euserid = '.$id .' ORDER BY '.$CFG->prefix.'rcommon_books.name ASC ');
			if(!$credentials) {
				echo '<p style="color:red">'.get_string('userhasnokeys','block_rcommon').'</p>';
			} else {
                echo '<div id="block-block_rcommon">';
				echo '<table cellpadding="5" width="100%" class="generaltable">
			<thead>
			<tr>
				<th  class="header c0">ISBN</th><th class="header c1">'.get_string('key','block_rcommon').'</th><th class="header c2"></th></tr></thead>';
				foreach($credentials as $credential) {
					echo '<tr>';
					echo '<td>'.$credential->name.' ('.$credential->pname.')&nbsp;&nbsp;</td>';
					echo '<td>'.$credential->credentials. '</td>';
                                        echo '<td><a href="keyManager.php?action=delete&id='.$credential->id.'&username='.urlencode($_GET['username']).'">'.get_string('keydelbtn','block_rcommon').'</a></td>';
					echo '</tr>';
				}
				echo '</table>';
				echo '</div>';
			}
			echo '<br/><input type="submit" onclick="document.location.href=\'keyManager.php?action=add&username='.urlencode($username).'&id='.urlencode($id).'\'" value="'.get_string('keyadd', 'block_rcommon').'" />&nbsp;&nbsp;<input onclick="document.location.href=\'keyManager.php\';" type="submit" value="'.get_string('back').'" />';
		}
	break;
	case 'delete':
		$id       = required_param('id', PARAM_INT);
		$username = required_param('username', PARAM_TEXT);
		$confirm  = optional_param('confirm', false, PARAM_BOOL);
		if(!$confirm) {
			echo '<p>'.get_string('keyconfirmdelete', 'block_rcommon').'</p>';
			echo '<br/>';
			echo '<a href="keyManager.php?action=delete&username='.urlencode($username).'&confirm=true&id='.urlencode($id).'">'.get_string('keydelbtn', 'block_rcommon').'</a> &nbsp;&nbsp;<a href="keyManager.php?action=manage&username='.urlencode($username).'">'.get_string('back').'</a>';
		} else {
			//delete
			$DB->delete_records('rcommon_user_credentials', array('id' => $id));
			echo '<script>document.location.href="keyManager.php?action=manage&username='.urlencode($username).'";</script>';
		}
	break;
	case 'add':
		class block_rcommon_publishers_form extends moodleform {
			function definition() {
				global $CFG, $DB;
			    $bform    =& $this->_form;
			    $bform->addElement('hidden', 'action', 'doAdd');
			    $bform->addElement('hidden', 'username');
			    $bform->addElement('hidden', 'id');
			    //doi/isbn
			    $select_list = array();
				// MARSUPIAL ********** MODIFICAT -> To order books by title
				// 2011.11.04 @sarjona             
			    $books = $DB->get_records_sql('SELECT b.*, p.name as pname FROM {rcommon_books} b JOIN {rcommon_publisher} p ON b.publisherid = p.id ORDER BY b.name ');
				// ********** ORIGINAL
				//$books = $DB->get_records_sql('SELECT '.$CFG->prefix.'rcommon_books.*, '.$CFG->prefix.'rcommon_publisher.name as pname FROM '.$CFG->prefix.'rcommon_books JOIN '.$CFG->prefix.'rcommon_publisher ON '.$CFG->prefix.'rcommon_books.publisherid = '.$CFG->prefix.'rcommon_publisher.id');
				// ********* FI                                                                
				foreach($books as $book) {
					$select_list[$book->isbn] = $book->name.'&nbsp;('.$book->pname.')';
				}
			    $bform->addElement('select', 'doi', 'DOI / ISBN', $select_list);
			    $bform->addRule('doi', null, 'required', null, 'client');
			    //key
			    $bform->addElement('text', 'key', get_string('key','block_rcommon'), array('maxlength' => 255, 'size' => 45));
				$bform->addRule('key', null, 'required', null, 'client');
			    //buttons
				$buttonarray = array();
				$buttonarray[] = &$bform->createElement('submit', 'submitbutton', get_string('save', 'block_rcommon'));
				$buttonarray[] = &$bform->createElement('button', 'cancel', get_string('cancel'), array('onclick' => 'javascript:history.back();'));
				$bform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
                $bform->setType('buttonar', PARAM_RAW);
                $bform->closeHeaderBefore('buttonar');
			}
		}
		
		//set valued
		$form = new stdClass();
		$form->username = required_param('username', PARAM_RAW);
		$form->id       = required_param('id', PARAM_INT);
		
		//print title
		echo '<p>'.get_string('keyaddingforuser', 'block_rcommon').' <b>'.  htmlentities($form->username).'</b></p>';
		
		//print form
		$bform = new block_rcommon_publishers_form();
		$bform->set_data($form);
	    $bform->display();
	    
	break;
	case 'doAdd':
		$doi = optional_param('doi', '', PARAM_TEXT);
		$key = optional_param('key', '', PARAM_TEXT);
		$id  = optional_param('id', '', PARAM_INT);
		$username = optional_param('username', '', PARAM_TEXT);
		if(empty($doi) || empty($key) || empty($id)) {
			echo '<p style="color:red">'.get_string('keyaddformexception', 'block_rcommon').'</p>';
		} else {
			$record               = new stdClass();
			$record->euserid      = addslashes($id);
			$record->isbn         = addslashes($doi);
			$record->credentials  = addslashes($key);
			$record->timecreated  = time();
			$record->timemodified = time();
			$DB->insert_record('rcommon_user_credentials', $record);
			echo '<script>document.location.href="keyManager.php?action=manage&username='.urlencode($username).'";</script>';
		}
	break;
	default:
		echo '				<p>'.get_string('keyslookupusertext','block_rcommon').'<br/>
							<form actio	n="keyManager.php?action=manage" method="GET">
								<select name="username">
								';
                                                                // MARSUPIAL ********** MODIFICAT -> To avoid deleted or not confirmed users
                                                                // 2011.10.21 @sarjona             
                                                                $users = get_users(true, '', true);
                                                                // ********** ORIGINAL
                                                                //$users = $DB->get_records_sql("select * from ".$CFG->prefix."user WHERE username != 'guest' ORDER BY firstname");
                                                                // ********* FI                                                                
								foreach($users as $user) {
								    echo '<option value="'.$user->username.'">'.$user->firstname.' '.$user->lastname.' ('.$user->username.')</option>';
								}
								echo '</select>
								<input type="hidden" name="action" value="manage" />
								<input type="submit" value="'.get_string('keysadminsearchuserbtn', 'block_rcommon').'" />
							</form>
							</p>
							<!--p><input onclick="document.location.href=\'export.php\';" type="submit" value="'.get_string('keymanagerexportbtn', 'block_rcommon').'" /></p-->';
}
						echo '</div>
					</div>
					<div class="summary"></div>
				</div>
			</li>
		</ul>
	</div>';

echo $OUTPUT->footer();

