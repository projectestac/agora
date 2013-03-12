<?php

class restore_journal_activity_structure_step extends restore_activity_structure_step {

    protected function define_structure() {

        $paths = array();
        $paths[] = new restore_path_element('journal', '/activity/journal');

        if ($this->get_setting_value('userinfo')) {
            $paths[] = new restore_path_element('journal_entry', '/activity/journal/entries/entry');
        }

        return $this->prepare_activity_structure($paths);
    }

    protected function process_journal($data) {

        global $DB;

        $data = (Object)$data;

        $oldid = $data->id;
        unset($data->id);

        $data->course = $this->get_courseid();
        $data->timemodified = $this->apply_date_offset($data->timemodified);

        $newid = $DB->insert_record('journal', $data);
        $this->apply_activity_instance($newid);
    }

    protected function process_journal_entry($data) {

        global $DB;

        $data = (Object)$data;

        $oldid = $data->id;
        unset($data->id);

        $data->journal = $this->get_new_parentid('journal');
        $data->modified = $this->apply_date_offset($data->modified);
        $data->timemarked = $this->apply_date_offset($data->timemarked);
        $data->userid = $this->get_mappingid('user', $data->userid);
        $data->teacher = $this->get_mappingid('user', $data->teacher);

        $newid = $DB->insert_record('journal_entries', $data);
        $this->set_mapping('journal_entry', $oldid, $newid);
    }

    protected function after_execute() {
        $this->add_related_files('mod_journal', 'intro', null);
        $this->add_related_files('mod_journal_entries', 'text', null);
        $this->add_related_files('mod_journal_entries', 'entrycomment', null);
    }
}
