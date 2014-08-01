<?php
class block_advices_edit_form extends block_edit_form {
    protected function specific_definition($mform) {
        global $CFG, $DB;
        require_once('block_advices.php');
        // Function defined in agora additional library
        if (get_protected_agora()) {

            if($admin_field = block_advices::get_message_record(true)) {
                $admin_msg = $admin_field->msg;
                $admin_start = strtotime($admin_field->date_start);
                $admin_stop = strtotime($admin_field->date_stop);
            }
            else{
                $admin_msg = "";
                $admin_start = 0;
                $admin_stop = 0;
            }

            if($not_admin_field = block_advices::get_message_record(false)){
                $not_admin_msg = $not_admin_field->msg;
                $not_admin_start = strtotime($not_admin_field->date_start);
                $not_admin_stop = strtotime($not_admin_field->date_stop);
            }
            else{
                $not_admin_msg = "";
                $not_admin_start = 0;
                $not_admin_stop = 0;
            }

            $mform->addElement('header', 'admin_header', get_string('admin_advice', 'block_advices'));
            $mform->setExpanded('admin_header');

            $mform->addElement('editor', 'config_admin_advice', get_string('message', 'block_advices'));
            $mform->setType('config_admin_advice', PARAM_TEXT);
            $mform->setDefault('config_admin_advice', array('text'=>$admin_msg));

            $date_options = array(
                'optional'  => true
            );
            $mform->addElement('date_selector', 'config_admin_start', get_string('advice_start_date', 'block_advices'), $date_options);
            $mform->setDefault('config_admin_start', $admin_start);

            $mform->addElement('date_selector', 'config_admin_stop', get_string('advice_stop_date', 'block_advices'), $date_options);
            $mform->setDefault('config_admin_stop', $admin_stop);


            $mform->addElement('header', 'not_admin_header', get_string('not_admin_advice', 'block_advices'));
            $mform->setExpanded('not_admin_header');

            $mform->addElement('editor', 'config_not_admin_advice', get_string('message', 'block_advices'));
            $mform->setType('config_not_admin_advice', PARAM_TEXT);
            $mform->setDefault('config_not_admin_advice',  array('text'=>$not_admin_msg));

            $date_options = array(
                'optional'  => true
            );
            $mform->addElement('date_selector', 'config_not_admin_start', get_string('advice_start_date', 'block_advices'), $date_options);
            $mform->setDefault('config_not_admin_start', $not_admin_start);

            $mform->addElement('date_selector', 'config_not_admin_stop', get_string('advice_stop_date', 'block_advices'), $date_options);
            $mform->setDefault('config_not_admin_stop', $not_admin_stop);
        }
    }
}
