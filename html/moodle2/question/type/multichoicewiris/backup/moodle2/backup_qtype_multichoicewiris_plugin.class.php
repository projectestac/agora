<?php

defined('MOODLE_INTERNAL') || die();

class backup_qtype_multichoicewiris_plugin extends backup_qtype_multichoice_plugin {

    /**
     * Returns the qtype information to attach to question element
     */
    protected function define_question_plugin_structure() {
        // call parent
        $plugin = parent::define_question_plugin_structure();

        // change type
        $plugin->set_condition('../../qtype', 'multichoicewiris');

        // add question_xml
        $pluginwrapper = $plugin->get_child($this->get_recommended_name());
        $question_xml = new backup_nested_element('question_xml', array('id'), array('xml'));
        $pluginwrapper->add_child($question_xml);
        $question_xml->set_source_table('qtype_wq', array('question' => backup::VAR_PARENTID));
        
        return $plugin;
    }
}
?>
