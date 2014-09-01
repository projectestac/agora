<?php

class local_oauth_clients_form extends moodleform {

	function definition() {
		global $CFG;
		$bform    =& $this->_form;
		$bform->addElement('hidden', 'action', 'add');
		$bform->setType('action', PARAM_ACTION);


		$bform->addElement('text', 'client_id', get_string('client_id', 'local_oauth'), array('maxlength' => 80, 'size' => 45));
		$bform->addRule('client_id', null, 'required', null, 'client');
		$bform->setType('client_id', PARAM_TEXT);

		$action = optional_param('action', false, PARAM_TEXT);
		if ($action == 'edit') {
			$id = required_param('id', PARAM_TEXT);
			$bform->addElement('hidden', 'id', $id);
			$bform->setType('id', PARAM_INT);
			$bform->hardFreeze('client_id');
		}

		$bform->addElement('text', 'redirect_uri', get_string('redirect_uri', 'local_oauth'), array('maxlength' => 1333, 'size' => 45));
		$bform->setType('redirect_uri', PARAM_URL);

		$bform->addElement('text', 'grant_types', get_string('grant_types', 'local_oauth'), array('maxlength' => 80, 'size' => 45));
		$bform->setType('grant_types', PARAM_TEXT);

		$bform->addElement('text', 'scope', get_string('scope', 'local_oauth'), array('maxlength' => 1333, 'size' => 45));
		$bform->setType('scope', PARAM_TEXT);

		$bform->addElement('text', 'user_id', get_string('user_id', 'local_oauth'), array('maxlength' => 80, 'size' => 45));
		$bform->setType('user_id', PARAM_INT);

		$this->add_action_buttons();

	}
}

class local_oauth_authorize_form extends moodleform {

	function definition() {
		global $CFG;
		$mform    =& $this->_form;

		$client_id = required_param('client_id', PARAM_RAW);

		$text = get_string('auth_question', 'local_oauth', $client_id).'<br />';
		$mform->addElement('html', $text);
		$scope = optional_param('scope', false, PARAM_TEXT);
		if (!empty($scope)) {
			$scopes = explode(' ', $scope);
			$text = get_string('auth_question_desc', 'local_oauth').'<ul>';
			foreach ($scopes as $scope) {
				$text .= '<li>'.get_string('scope_'.$scope, 'local_oauth').'</li>';
			}
			$text .= '</ul>';
		} else {
			$text = get_string('auth_question_login', 'local_oauth');
		}
		$mform->addElement('html', $text);

		$this->add_action_buttons(true, get_string('confirm'));
	}
}
