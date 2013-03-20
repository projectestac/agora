<?php

class backup_journal_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        $journal = new backup_nested_element('journal', array('id'), array(
            'name', 'intro', 'introformat', 'days', 'grade', 'timemodified'));

        $entries = new backup_nested_element('entries');

        $entry = new backup_nested_element('entry', array('id'), array(
            'userid', 'modified', 'text', 'format', 'rating',
            'entrycomment', 'teacher', 'timemarked', 'mailed'));

        // journal -> entries -> entry
        $journal->add_child($entries);
        $entries->add_child($entry);

        // Sources
        $journal->set_source_table('journal', array('id' => backup::VAR_ACTIVITYID));

        if ($this->get_setting_value('userinfo')) {
            $entry->set_source_table('journal_entries', array('journal' => backup::VAR_PARENTID));
        }

        // Define id annotations
        $entry->annotate_ids('user', 'userid');
        $entry->annotate_ids('user', 'teacher');

        // Define file annotations
        $journal->annotate_files('mod_journal', 'intro', null); // This file areas haven't itemid
        $entry->annotate_files('mod_journal_entries', 'text', null); // This file areas haven't itemid
        $entry->annotate_files('mod_journal_entries', 'entrycomment', null); // This file areas haven't itemid

        return $this->prepare_activity_structure($journal);
    }
}
