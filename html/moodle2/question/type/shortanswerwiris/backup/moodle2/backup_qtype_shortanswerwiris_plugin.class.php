<?php

defined('MOODLE_INTERNAL') || die();


class backup_qtype_shortanswerwiris_plugin extends backup_qtype_shortanswer_plugin {

    protected function define_question_plugin_structure() {
        // call parent
        $plugin = parent::define_question_plugin_structure();

        // change type
        $plugin->set_condition('../../qtype', 'shortanswerwiris');

        // add question_xml
        $pluginwrapper = $plugin->get_child($this->get_recommended_name());
        $question_xml = new backup_nested_element('question_xml', array('id'), array('xml'));
        $pluginwrapper->add_child($question_xml);
        $question_xml->set_source_table('qtype_wq', array('question' => backup::VAR_PARENTID));
        
        return $plugin;
    }
    
}
?>
