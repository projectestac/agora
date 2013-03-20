<?php

require_once ($CFG->dirroot.'/lib/formslib.php');

class mod_journal_entry_form extends moodleform {

    function definition() {

        $this->_form->addElement('editor', 'text');
        $this->_form->setType('text', PARAM_CLEANHTML);
        $this->_form->addRule('text', null, 'required', null, 'client');

        $this->_form->addElement('hidden', 'id');
        $this->_form->setType('id', PARAM_INT);

        $this->add_action_buttons();

        $this->set_data($this->_customdata['current']);

    }
}
