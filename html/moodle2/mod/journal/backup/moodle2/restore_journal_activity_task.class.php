<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/mod/journal/backup/moodle2/restore_journal_stepslib.php');

class restore_journal_activity_task extends restore_activity_task {

    protected function define_my_settings() {}

    protected function define_my_steps() {
        $this->add_step(new restore_journal_activity_structure_step('journal_structure', 'journal.xml'));
    }

    static public function define_decode_contents() {

        $contents = array();
        $contents[] = new restore_decode_content('journal', array('intro'), 'journal');
        $contents[] = new restore_decode_content('journal_entries', array('text', 'entrycomment'), 'journal_entry');

        return $contents;
    }

    static public function define_decode_rules() {

        $rules = array();
        $rules[] = new restore_decode_rule('JOURNALINDEX', '/mod/journal/index.php?id=$1', 'course');
        $rules[] = new restore_decode_rule('JOURNALVIEWBYID', '/mod/journal/view.php?id=$1', 'course_module');
        $rules[] = new restore_decode_rule('JOURNALREPORT', '/mod/journal/report.php?id=$1', 'course_module');
        $rules[] = new restore_decode_rule('JOURNALEDIT', '/mod/journal/edit.php?id=$1', 'course_module');

        return $rules;

    }

    public static function define_restore_log_rules() {

        $rules = array();
        $rules[] = new restore_log_rule('journal', 'view', 'view.php?id={course_module}', '{journal}');
        $rules[] = new restore_log_rule('journal', 'view responses', 'report.php?id={course_module}', '{journal}');
        $rules[] = new restore_log_rule('journal', 'add entry', 'edit.php?id={course_module}', '{journal}');
        $rules[] = new restore_log_rule('journal', 'update entry', 'edit.php?id={course_module}', '{journal}');
        $rules[] = new restore_log_rule('journal', 'update feedback', 'report.php?id={course_module}', '{journal}');

        return $rules;
    }

    public static function define_restore_log_rules_for_course() {

        $rules = array();
        $rules[] = new restore_log_rule('journal', 'view all', 'index.php?id={course}', null);

        return $rules;
    }
}
