<?php

class backup_qtype_truefalsewiris_plugin extends backup_qtype_truefalse_plugin {
    
    protected function define_question_plugin_structure() {
        // call parent
        $plugin = parent::define_question_plugin_structure();

        // change type
        $plugin->set_condition('../../qtype', 'truefalsewiris');

        // add question_xml
        $pluginwrapper = $plugin->get_child($this->get_recommended_name());
        $question_xml = new backup_nested_element('question_xml', array('id'), array('xml'));
        $pluginwrapper->add_child($question_xml);
        $question_xml->set_source_table('qtype_wq', array('question' => backup::VAR_PARENTID));
        
        return $plugin;
    }
}

?>
