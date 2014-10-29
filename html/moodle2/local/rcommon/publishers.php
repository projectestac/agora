<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");
require_once($CFG->libdir.'/adminlib.php');
require_once("forms.php");

require_capability('local/rcommon:managepublishers', context_system::instance());

//TODO comprovar que no es faci la redireccio, ja que si es fa i s'ha enviat el header dona un warning
require_login();

admin_externalpage_setup('marsupialmanage_publisher');

$action  = optional_param('action', '', PARAM_ALPHA);


switch($action){
	case 'edit':
		//get values
		$publisher = required_param('publisher', PARAM_INT);
		if (!$record = $DB->get_record('rcommon_publisher', array('id' => $publisher))){
			print_error(get_string('nopublisher', 'local_rcommon'), $CFG->wwwroot.'/local/rcommon/publishers.php');
		}
	case 'add';
		$bform = new local_rcommon_publishers_form();
		if ($bform->is_cancelled()){
			break;
		} else if ($fromform=$bform->get_data() and confirm_sesskey()){
			//get values
			$publisher = $fromform->publisher;
			$record = new stdClass();
			$record->code                = $fromform->code;
			$record->name                = empty($fromform->name) ? $fromform->code : $fromform->name;
			$record->urlwsauthentication = str_replace("\\", "/", $fromform->urlwsauthentication);
			$record->urlwsbookstructure  = str_replace("\\", "/", $fromform->urlwsbookstructure);
			$record->username            = $fromform->username;
			$record->password            = $fromform->password;
			$record->timemodified		 = time();
			//extra controls
			if (empty($record->name)){
				print_error(get_string('savekoemptyvalues', 'local_rcommon'), $CFG->wwwroot.'/local/rcommon/publishers.php');
			}
			if (!empty($record->urlwsauthentication) && $pos = textlib::strpos(textlib::strtolower($record->urlwsauthentication), '?wsdl')){
				$record->urlwsauthentication = textlib::substr($record->urlwsauthentication, 0, $pos);
			}
			if (!empty($record->urlwsbookstructure) && $pos = textlib::strpos(textlib::strtolower($record->urlwsbookstructure), '?wsdl')){
				$record->urlwsbookstructure  = textlib::substr($record->urlwsbookstructure, 0, $pos);
			}

			//do save
			if (empty($publisher)){
				$record->timecreated = $record->timemodified;
				if (!$DB->insert_record('rcommon_publisher', $record)){
					redirect($CFG->wwwroot.'/local/rcommon/publishers.php?action=edit&publisher='.$publisher, get_string('saveko', 'local_rcommon'), 5);
				}
			}else{
				$record->id           = $publisher;
				if (!$DB->update_record('rcommon_publisher', $record)){
					redirect($CFG->wwwroot.'/local/rcommon/publishers.php?action=edit&publisher='.$publisher, get_string('saveko', 'local_rcommon'), 5);
				}
			}
			redirect($CFG->wwwroot.'/local/rcommon/publishers.php', get_string('saveok', 'local_rcommon'), 2);
		}

		$form = new stdClass();
        //set values
		if (isset($publisher)){
		    $form->publisher           = $publisher;
			$form->name                = $record->name;
			$form->code                = $record->code;
			$form->urlwsauthentication = $record->urlwsauthentication;
			$form->urlwsbookstructure  = $record->urlwsbookstructure;
			$form->username            = $record->username;
			$form->password            = $record->password;
			$form->action              = 'edit';
		} else {
			$form->name                = "";
			$form->code                = "";
			$form->urlwsauthentication = "";
			$form->urlwsbookstructure  = "";
			$form->username            = "";
			$form->password            = "";
			$form->action              = 'add';
		}
		echo $OUTPUT->header();

		//publishers management
		echo $OUTPUT->heading(get_string('publishersmanager', 'local_rcommon'));
	    $bform->set_data($form);
	    $bform->display();

	break;
	case 'del':
		//get values
		$confirm   = optional_param('confirm', 0, PARAM_INT);
		$publisher = optional_param('publisher', '', PARAM_INT);

		//do delete
		if (empty($confirm)){
	        if (!$record = $DB->get_record('rcommon_publisher', array('id' => $publisher))){
				print_error(get_string('nopublisher', 'local_rcommon'), $CFG->wwwroot.'/local/rcommon/publishers.php');
			}
			echo $OUTPUT->header();

			//publishers management
			echo $OUTPUT->heading(get_string('publishersmanager', 'local_rcommon'));
			echo '<p>'.get_string('confirmdeletestr', 'local_rcommon', $record->name.' ('.$record->code.')').'</p>
			    <form action="publishers.php" method="GET">
			        <input type="hidden" name="action" value="del" />
			        <input type="hidden" name="confirm" value="1" />
			        <input type="hidden" name="publisher" value="'.$publisher.'" />
			        <input type="submit" value="'.get_string('confirm').'" /> <input type="button" value="'.get_string('cancel').'" onclick="javascript:history.back();" />
			    </form>';
		}else{
			if (!$DB->delete_records('rcommon_publisher', array('id' => $publisher))){
				redirect($CFG->wwwroot.'/local/rcommon/publishers.php', get_string('delko', 'local_rcommon'), 5);
			}
			redirect($CFG->wwwroot.'/local/rcommon/publishers.php', get_string('delok', 'local_rcommon'), 2);
		}
	break;
	default:
		echo $OUTPUT->header();

		//publishers management
		echo $OUTPUT->heading(get_string('publishersmanager', 'local_rcommon'));
		echo '<p><a href="publishers.php?action=add"><button>'.get_string('addnewpublisher', 'local_rcommon').'</button></a></p>';

        $sql = 'SELECT p.id, p.name, p.code, count(b.id) as books
		    FROM {rcommon_publisher} p
		    LEFT JOIN {rcommon_books} b
		        ON b.publisherid =p.id
		    GROUP BY p.id, p.name, p.code
    		ORDER BY p.name ASC';

    	$publishers = $DB->get_records_sql($sql);

		if (!empty($publishers)){
			$table = new html_table();
			$table->class = 'generaltable generalbox';
			$table->head = array(
								get_string('publisher', 'local_rcommon'),
								get_string('marsupialcontent', 'local_rcommon'),
								get_string('actions'));
			$table->align = array('left', 'center', 'center');

			foreach($publishers as $publisher) {
				$name = $publisher->name.(!empty($publisher->code)?' ('.$publisher->code.')':'');
				$name .= ' <span id="pubstate'.$publisher->id.'"></span>';

				$row = array();
				$row[] = $name;
				$row[] = "<a href=\"contents.php?id=".$publisher->id."\">".$publisher->books.' '.get_string('books', 'local_rcommon')."</a>";
			    $row[] = "<a href=\"publishers.php?action=edit&publisher=".$publisher->id."\">".get_string('edit')."</a> | <a href=\"publishers.php?action=del&publisher=".$publisher->id."\">".get_string('delete')."</a>";
			    $table->data[] = $row;
			}
			echo html_writer::table($table);

			echo '<a onclick="M.local_rcommon.check_publishers();">'.get_string('check_publishers', 'local_rcommon').'</a> <span style="font-size:small">('.get_string('wait_please', 'local_rcommon').')</span> <img id="loading_small" style="visibility:hidden" src="'.$OUTPUT->pix_url('i/loading_small').'" alt="" />';
			$jsmodule = array(
				'name'     => 'local_rcommon',
				'fullpath' => '/local/rcommon/javascript.js',
				'requires' => array('base','io','panel'),
			);
			$PAGE->requires->js_init_call('M.local_rcommon.init', array(), true, $jsmodule);
        }
}

echo $OUTPUT->footer();
