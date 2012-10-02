<?php  //$Id: upgrade.php,v 1.4 2011/04/26 06:20:25 davmon Exp $

require_once($CFG->dirroot.'/mod/journal/lib.php');

function xmldb_journal_upgrade($oldversion=0) {

    global $CFG, $DB;
    $dbman = $DB->get_manager();

    $result = true;

    // No DB changes since 1.9.0

    // Add journal instances to the gradebook
    if ($oldversion < 2010120300) {

        journal_update_grades();
        upgrade_mod_savepoint(true, 2010120300, 'journal');
    }

    // Change assessed field for grade
    if ($result && $oldversion < 2011040600) {

        // Rename field assessed on table journal to grade
        $table = new xmldb_table('journal');
        $field = new xmldb_field('assessed', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'days');

        // Launch rename field grade
        $dbman->rename_field($table, $field, 'grade');

        // journal savepoint reached
        upgrade_mod_savepoint(true, 2011040600, 'journal');
    }

    if ($result && $oldversion < 2012032001) {

        // Changing the default of field rating on table journal_entries to drop it
        $table = new xmldb_table('journal_entries');
        $field = new xmldb_field('rating', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'format');

        // Launch change of default for field rating
        $dbman->change_field_default($table, $field);

        // Updating the non-marked entries with rating = NULL
        $entries = $DB->get_records('journal_entries', array('timemarked' => 0));
        if ($entries) {
            foreach ($entries as $entry) {
                $entry->rating = NULL;
                $DB->update_record('journal_entries', $entry);
            }
        }

        // journal savepoint reached
        upgrade_mod_savepoint(true, 2012032001, 'journal');
    }


    return $result;
}
