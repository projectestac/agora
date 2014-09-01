<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");
require_once($CFG->libdir.'/adminlib.php');
require_once('forms.php');

require_login();

require_capability('local/oauth:manageclients', context_system::instance());

admin_externalpage_setup('local_oauth_settings');

$action  = optional_param('action', '', PARAM_ALPHA);

echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('pluginname', 'local_oauth'));

$view_table = false;
switch ($action) {
	case 'edit':
		$id = required_param('id', PARAM_TEXT);
		if (!$client_edit = $DB->get_record('oauth_clients', array('id' => $id))) {
			echo $OUTPUT->notification(get_string('client_not_exists', 'local_oauth'));
			$view_table = true;
			break;
		}
	case 'add':
		$bform = new local_oauth_clients_form();
		if ($bform->is_cancelled()) {
			$view_table = true;
			break;
		} else if ($fromform=$bform->get_data() and confirm_sesskey()) {
			//get values
			$record = new stdClass();
			$record->redirect_uri = $fromform->redirect_uri;
			$record->grant_types = $fromform->grant_types;
			$record->scope = $fromform->scope;
			$record->user_id = $fromform->user_id ? $fromform->user_id :'';

			//do save
			if (!isset($client_edit)) {
				$record->client_id = $fromform->client_id;
				$record->client_secret = generate_secret();
				if (!$DB->insert_record('oauth_clients', $record)) {
					print_error('insert_error', 'local_oauth');
				}
			} else {
				$record->id = $client_edit->id;
				if (!$DB->update_record('oauth_clients', $record)) {
					print_error('update_error', 'local_oauth');
				}
			}
			echo $OUTPUT->notification(get_string('saveok', 'local_oauth'), 'notifysuccess');
			$view_table = true;
			break;
		}

		$form = new stdClass();
        //set values
		if (isset($client_edit)) {
		    $form->client_id           = $client_edit->client_id;
			$form->redirect_uri        = $client_edit->redirect_uri;
			$form->grant_types         = $client_edit->grant_types;
			$form->scope 			   = $client_edit->scope;
			$form->user_id 			   = $client_edit->user_id;
			$form->action              = 'edit';
		} else {
			$form->client_id                = "";
			$form->redirect_uri                = "";
			$form->grant_types = "";
			$form->scope  = "";
			$form->user_id            = "";
			$form->action              = 'add';
		}
	    $bform->set_data($form);
	    $bform->display();

		break;
	case 'del':
		//get values
		$confirm   = optional_param('confirm', 0, PARAM_INT);
		$id = required_param('id', PARAM_TEXT);

		//do delete
		if (empty($confirm)) {
	        if (!$client_edit = $DB->get_record('oauth_clients', array('id' => $id))) {
	        	echo $OUTPUT->notification(get_string('client_not_exists', 'local_oauth'));
				$view_table = true;
				break;
			}
			echo '<p>'.get_string('confirmdeletestr', 'local_oauth', $client_edit->client_id).'</p>
			    <form action="index.php" method="GET">
			        <input type="hidden" name="action" value="del" />
			        <input type="hidden" name="confirm" value="1" />
			        <input type="hidden" name="id" value="'.$id.'" />
			        <input type="submit" value="'.get_string('confirm').'" /> <input type="button" value="'.get_string('cancel').'" onclick="javascript:history.back();" />
			    </form>';
		} else {
			if (!$DB->delete_records('oauth_clients', array('id' => $id))) {
				print_error('delete_error', 'local_oauth');
			}
			echo $OUTPUT->notification(get_string('delok', 'local_oauth'), 'notifysuccess');
			$view_table = true;
			break;
		}
		break;
	default:
		$view_table = true;
		break;
}

if ($view_table) {
	echo '<p><input onclick="document.location.href=\'index.php?action=add\';" type="submit" value="'.get_string('addclient', 'local_oauth').'" /></p>';

	$clients = $DB->get_records('oauth_clients');

	if (!empty($clients)) {
		$table = new html_table();
		$table->class = 'generaltable generalbox';
		$table->head = array(
							get_string('client_id', 'local_oauth'),
							get_string('client_secret', 'local_oauth'),
							get_string('redirect_uri', 'local_oauth'),
							get_string('grant_types', 'local_oauth'),
							get_string('scope', 'local_oauth'),
							get_string('user_id', 'local_oauth'),
							get_string('actions'));
		$table->align = array('left', 'left', 'center', 'center', 'center', 'center', 'center');

		foreach ($clients as $client) {
			$row = array();
			$row[] = $client->client_id;
			$row[] = $client->client_secret;
			$row[] = '<a href="'.$client->redirect_uri.'">'.get_string('redirect_uri', 'local_oauth').'</a>';
			$row[] = $client->grant_types;
			$row[] = $client->scope;
			$row[] = $client->user_id;
		    $row[] = "<a href=\"index.php?action=edit&id=".$client->id."\">".get_string('edit')."</a> | <a href=\"index.php?action=del&id=".$client->id."\">".get_string('delete')."</a>";
		    $table->data[] = $row;
		}
		echo html_writer::table($table);
    }
}

echo $OUTPUT->footer();
