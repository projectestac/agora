<?php

require_once($CFG->dirroot.'/mod/journal/backup/moodle2/backup_journal_stepslib.php');

class backup_journal_activity_task extends backup_activity_task {

    protected function define_my_settings() {}

    protected function define_my_steps() {
        $this->add_step(new backup_journal_activity_structure_step('journal_structure', 'journal.xml'));
    }

    static public function encode_content_links($content) {
        global $CFG;

        $base = preg_quote($CFG->wwwroot.'/mod/journal','#');

        $pattern = "#(".$base."\/index.php\?id\=)([0-9]+)#";
        $content = preg_replace($pattern, '$@JOURNALINDEX*$2@$', $content);

        $pattern = "#(".$base."\/view.php\?id\=)([0-9]+)#";
        $content = preg_replace($pattern, '$@JOURNALVIEWBYID*$2@$', $content);

        $pattern = "#(".$base."\/report.php\?id\=)([0-9]+)#";
        $content = preg_replace($pattern, '$@JOURNALREPORT*$2@$', $content);

        $pattern = "#(".$base."\/edit.php\?id\=)([0-9]+)#";
        $content = preg_replace($pattern, '$@JOURNALEDIT*$2@$', $content);

        return $content;
    }
}
