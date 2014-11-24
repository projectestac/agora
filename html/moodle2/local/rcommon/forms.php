<?php

class local_rcommon_publishers_form extends moodleform {

	function definition() {
		global $CFG;
		$bform    =& $this->_form;
		$bform->addElement('hidden', 'action', 'add');
		$bform->setType('action',PARAM_ACTION);
		$bform->addElement('hidden', 'publisher');
		$bform->setType('publisher',PARAM_TEXT);

		//name
		$bform->addElement('text', 'name', get_string('name'), array('maxlength' => 255, 'size' => 45));
		$bform->setType('name',PARAM_TEXT);
		$bform->addRule('name', null, 'required', null, 'client');
		//code
		$bform->addElement('text', 'code', get_string('code', 'local_rcommon'), array('maxlength' => 255, 'size' => 45));
		$bform->setType('code',PARAM_TEXT);
		//urlwsauthentication
		$bform->addElement('text', 'urlwsauthentication', get_string('urlwsauthentication', 'local_rcommon'), array('maxlength' => 255, 'size' => 45));
		$bform->addRule('urlwsauthentication', null, 'required', null, 'client');
		$bform->setType('urlwsauthentication', PARAM_URL);
		//urlwsbookstructure
		$bform->addElement('text', 'urlwsbookstructure', get_string('urlwsbookstructure', 'local_rcommon'), array('maxlength' => 255, 'size' => 45));
		$bform->addRule('urlwsbookstructure', null, 'required', null, 'client');
		$bform->setType('urlwsbookstructure', PARAM_URL);
		//username
		$bform->addElement('text', 'username', get_string('username'), array('maxlength' => 255, 'size' => 45));
		$bform->setType('username',PARAM_TEXT);
		//password
		$bform->addElement('passwordunmask', 'password', get_string('password'), array('maxlength' => 255, 'size' => 45));

		$this->add_action_buttons();

	}
}

class local_rcommon_add_credentials_form extends moodleform {
	function definition() {
		global $DB;

		$mform    =& $this->_form;

		$mform->addElement('hidden', 'username');
		$mform->setType('username',PARAM_TEXT);

		//doi/isbn
		$select_list = array();


		$books = $DB->get_records_sql('SELECT b.*, p.name as publisher FROM {rcommon_books} b JOIN {rcommon_publisher} p ON b.publisherid = p.id ORDER BY p.name, b.name ');
		foreach($books as $book) {
			if (in_array(textlib::strtolower($book->format), rcommon_book::$allowedformats)) {
            	if (!isset($select_list[$book->publisher])) {
                	$select_list[$book->publisher] = array();
            	}
            	$select_list[$book->publisher][$book->isbn] = $book->name;
            }
		}
		$mform->addElement('selectgroups', 'isbn', 'DOI / ISBN', $select_list);
		$mform->addRule('isbn', null, 'required', null, 'client');

		//key
		$mform->addElement('text', 'credentials', get_string('key','local_rcommon'), array('maxlength' => 255, 'size' => 45));
		$mform->setType('credentials',PARAM_TEXT);
		$mform->addRule('credentials', null, 'required', null, 'client');

		//buttons
		$this->add_action_buttons();
	}
}


class local_rcommon_edit_credentials_form extends moodleform {
	function definition() {
		$mform    =& $this->_form;
		$mform->addElement('hidden', 'id');
		$mform->setType('id',PARAM_INT);

        $mform->addElement('hidden', 'backto');
		$mform->setType('backto',PARAM_TEXT);

		$mform->addElement('hidden', 'isbn');
		$mform->setType('isbn',PARAM_TEXT);

		$mform->addElement('hidden', 'euserid');
		$mform->setType('euserid',PARAM_TEXT);

		$mform->addElement('text', 'credentials', get_string('key','local_rcommon'), array('maxlength' => 255, 'size' => 45));
		$mform->setType('credentials',PARAM_TEXT);
		$mform->addRule('credentials', null, 'required', null, 'client');

		//buttons
		$this->add_action_buttons();
	}
}


class local_rcommon_import_credentials_form extends moodleform {
	function definition() {
		global $CFG;
		$mform    =& $this->_form;
		$mform->addElement('hidden', 'step');
		$mform->setDefault('step', 2);
		$mform->setType('step',PARAM_INT);

		$post_max_size = ini_get('post_max_size');
		$post_max_size_bytes = (textlib::substr($post_max_size, 0, textlib::strlen($post_max_size) - 1) * (1024 * 1024));

		$post_max_size_bytes = ($CFG->maxbytes != 0 && $CFG->maxbytes < $post_max_size_bytes)? $CFG->maxbytes: $post_max_size_bytes;
		$post_max_size = $post_max_size_bytes / (1024 * 1024);

		$mform->addElement('filepicker', 'file', get_string('keymanager_import_explanation','local_rcommon',$post_max_size), null, array('accepted_types' => 'text/csv', 'maxbytes'=>$post_max_size_bytes));
		$mform->addHelpButton('file', 'importcsv', 'local_rcommon');
		$mform->addRule('file', null, 'required', null, 'client');

		//buttons
		$this->add_action_buttons(true, get_string('keymanager_import_button', 'local_rcommon'));
	}
}
