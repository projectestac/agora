<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'tool_xmldb', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = 'Πραγματικά';
$string['aftertable'] = 'Μετά τον πίνακα:';
$string['back'] = 'Πίσω';
$string['backtomainview'] = 'Επιστροφή στην Κεντρική';
$string['cannotuseidfield'] = 'Το πεδίο "id" δεν μπορεί να εισαχθεί. Συμπληρώνεται αυτόματα';
$string['change'] = 'Αλλαγή';
$string['charincorrectlength'] = 'Λάθος μήκος πεδίου χαρακτήρων';
$string['checkbigints'] = 'Έλεγχος μεγάλων αριθμών';
$string['check_bigints'] = 'Έλεγχος για εσφαλμένους αριθμούς';
$string['checkdefaults'] = 'Έλεγχος εξορισμού τιμών';
$string['check_defaults'] = 'Έλεγχος για εσφαλμένες εξορισμού τιμές';
$string['checkforeignkeys'] = 'Έλεγχος κλειδιών';
$string['check_foreign_keys'] = 'Έλεγχος για παραβιάσεις κλειδιών';
$string['checkindexes'] = 'Έλεγχος ευρετηρίων';
$string['check_indexes'] = 'Έλεγχος για μη υπάρχοντα ευρετήρια';
$string['completelogbelow'] = '(δείτε το πλήρες ιστορικό της έρευνας παρακάτω)';
$string['confirmcheckbigints'] = 'This functionality will search for <a href="http://tracker.moodle.org/browse/MDL-11038">potential wrong integer fields</a> in your Moodle server, generating (but not executing!) automatically the needed SQL statements to have all the integers in your DB properly defined.<br /><br />
Once generated you can copy such statements and execute them safely with your favourite SQL interface (don\'t forget to backup your data before doing that).<br /><br />
It\'s highly recommended to be running the latest (+ version) available of your Moodle release (1.8, 1.9, 2.x ...) before executing the search of wrong integers.<br /><br />
This functionality doesn\'t perform any action against the DB (just reads from it), so can be safely executed at any moment.';
$string['confirmcheckdefaults'] = 'This functionality will search for inconsistent default values in your Moodle server, generating (but not executing!) the needed SQL statements to have all the default values properly defined.<br /><br />
Once generated you can copy such statements and execute them safely with your favourite SQL interface (don\'t forget to backup your data before doing that).<br /><br />
It\'s highly recommended to be running the latest (+ version) available of your Moodle release (1.8, 1.9, 2.x ...) before executing the search of inconsistent default values.<br /><br />
This functionality doesn\'t perform any action against the DB (just reads from it), so can be safely executed at any moment.';
$string['confirmcheckforeignkeys'] = 'This functionality will search for potential violations of the foreign keys defined in the install.xml definitions. (Moodle does not currently generate acutal foreign key constraints in the database, which is why invalid data may be present.)<br /><br />
It\'s highly recommended to be running the latest (+ version) available of your Moodle release (1.8, 1.9, 2.x ...) before executing the search of missing indexes.<br /><br />
This functionality doesn\'t perform any action against the DB (just reads from it), so can be safely executed at any moment.';
$string['confirmcheckindexes'] = 'This functionality will search for potential missing indexes in your Moodle server, generating (but not executing!) automatically the needed SQL statements to keep everything updated.<br /><br />
Once generated you can copy such statements and execute them safely with your favourite SQL interface (don\'t forget to backup your data before doing that).<br /><br />
It\'s highly recommended to be running the latest (+ version) available of your Moodle release (1.8, 1.9, 2.x ...) before executing the search of missing indexes.<br /><br />
This functionality doesn\'t perform any action against the DB (just reads from it), so can be safely executed at any moment.';
$string['confirmdeletefield'] = 'Θέλετε σίγουρα να διαγράψετε το πεδίο:';
$string['confirmdeleteindex'] = 'Θέλετε σίγουρα να διαγράψετε το ευρετήριο:';
$string['confirmdeletekey'] = 'Θέλετε σίγουρα να διαγράψετε το κλειδί:';
$string['confirmdeletetable'] = 'Θέλετε σίγουρα να διαγράψετε τον πίνακα:';
$string['confirmdeletexmlfile'] = 'Θέλετε σίγουρα να διαγράψετε το αρχείο:';
$string['confirmrevertchanges'] = 'Θέλετε σίγουρα να ακυρώσετε τις αλλαγές που κάνατε:';
$string['create'] = 'Δημιουργία';
$string['createtable'] = 'Δημιουργία Πίνακα:';
$string['defaultincorrect'] = 'Λάθος προεπιλογή';
$string['delete'] = 'Διαγραφή';
$string['delete_field'] = 'Διαγραφή Πεδίου';
$string['delete_index'] = 'Διαγραφή Ευρετηρίου';
$string['delete_key'] = 'Διαγραφή Κλειδιού';
$string['delete_table'] = 'Διαγραφή Πίνακα';
$string['delete_xml_file'] = 'Διαγραφή XML Αρχείου';
$string['doc'] = 'Doc';
$string['down'] = 'Κάτω';
$string['duplicate'] = 'Δημιουργία Αντιγράφου';
$string['duplicatefieldname'] = 'Υπάρχει άλλο πεδίο με το ίδιο όνομα';
$string['duplicatekeyname'] = 'Υπάρχει άλλο κλειδί με το ίδιο όνομα';
$string['edit'] = 'Επεξεργασία';
$string['edit_field'] = 'Επεξεργασία Πεδίου';
$string['edit_index'] = 'Επεξεργασία Ευρετηρίου';
$string['edit_key'] = 'Επεξεργασία Κλειδιού';
$string['edit_table'] = 'Επεξεργασία Πίνακα';
$string['edit_xml_file'] = 'Επεξεργασία XML Αρχείου';
$string['enumvaluesincorrect'] = 'Λάθος τιμή πεδίου απαρίθμησης';
$string['expected'] = 'Αναμενόμενο';
$string['extensionrequired'] = 'Δε μπορείτε να εκτελέσετε αυτή την ενέργεια γιατί αυτό απαιτεί να είναι εγκατεστημένη η επέκταση "{$a}" της PHP. Εγκαταστήστε την αν θέλετε να προχωρήσετε.';
$string['field'] = 'Πεδίο';
$string['fieldnameempty'] = 'Άδειο πεδίο ονόματος';
$string['fields'] = 'Πεδία';
$string['fieldsusedinkey'] = 'Το πεδίο αυτό χρησιμοποιείται σαν κλειδί.';
$string['filenotwriteable'] = 'Μη εγγράψιμο αρχείο';
$string['fkviolationdetails'] = 'Το κλειδί {$a->keyname} στον πίνακα {$a->tablename} παραβιάζεται {$a->numviolations} φορές σε {$a->numrows} συνολικά εγγραφές.';
$string['floatincorrectdecimals'] = 'Λάθος αριθμός δεκαδικών ψηφίων πεδίου πραγματικού αριθμού';
$string['floatincorrectlength'] = 'Λάθος μήκος πεδίου πραγματικού αριθμού';
$string['generate_documentation'] = 'Οδηγίες χρήσης';
$string['gotolastused'] = 'Μετάβαση στο τελευταίο χρησιμοποιούμενο αρχείο';
$string['incorrectfieldname'] = 'Λάθος όνομα';
$string['index'] = 'Ευρετήριο';
$string['indexes'] = 'Ευρετήρια';
$string['integerincorrectlength'] = 'Λάθος μήκος πεδίου ακεραίου αριθμού';
$string['key'] = 'Κλειδί';
$string['keys'] = 'Κλειδιά';
$string['listreservedwords'] = 'Λίστα Κλειδωμένων Λέξεων <br/>(χρησιμοποιείται για ενημέρωση των <a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">XMLDB_reserved_words</a>)';
$string['load'] = 'Φόρτωση';
$string['main_view'] = 'Κεντρική Όψη';
$string['missing'] = 'Λείπουν';
$string['missingindexes'] = 'Βρέθηκαν ευρετήρια να λείπουν';
$string['mustselectonefield'] = 'Πρέπει να επιλέξετε ένα πεδίο για να δείτε τις σχετικές ενέργειες';
$string['mustselectoneindex'] = 'Πρέπει να επιλέξετε ένα ευρετήριο για να δείτε τις σχετικές ενέργειες';
$string['mustselectonekey'] = 'Πρέπει να επιλέξετε ένα κλειδί για να δείτε τις σχετικές ενέργειες';
$string['newfield'] = 'Νέο πεδίο';
$string['newindex'] = 'Νέο Ευρετήριο';
$string['newkey'] = 'Νέο Κλειδί';
$string['newtable'] = 'Νέος Πίνακας';
$string['newtablefrommysql'] = 'Νέος Πίνακας από MySQL';
$string['new_table_from_mysql'] = 'Νέος Πίνακας από MySQL';
$string['nomissingindexesfound'] = 'Δεν βρέθηκαν ελλειπή ευρετήρια.';
$string['noviolatedforeignkeysfound'] = 'Δεν βρέθηκαν παραβιασμένα κλειδιά';
$string['nowrongdefaultsfound'] = 'Δεν βρέθηκαν εφαλμένες εξορισμού τιμές';
$string['nowrongintsfound'] = 'Δεν βρέθηκαν εσφαλμένες αριθμητικές τιμές';
$string['numberincorrectdecimals'] = 'Λάθος αριθμός δεκαδικών ψηφίων αριθμητικού πεδίου πραγματικού αριθμού';
$string['numberincorrectlength'] = 'Λάθος μήκος αριθμητικού πεδίου';
$string['pluginname'] = 'Επεξεργαστής XMLDB';
$string['reserved'] = 'Κλειδωμένο';
$string['reservedwords'] = 'Κλειδωμένες Λέξεις';
$string['revert'] = 'Επαναφορά';
$string['revert_changes'] = 'Επαναφορά Αλλαγών';
$string['save'] = 'Αποθήκευση';
$string['searchresults'] = 'Αποτελέσματα Εύρεσης';
$string['selectaction'] = 'Επιλογή Ενέργειας:';
$string['selectdb'] = 'Επιλογή Βάσης Δεδομένων:';
$string['selectfieldkeyindex'] = 'Επιλογή Πεδίου/Κλειδιού/Ευρετηρίου';
$string['selectonecommand'] = 'Επιλέξτε μία Ενέργεια από τη λίστα για να δείτε τον κώδικα PHP';
$string['selectonefieldkeyindex'] = 'Επιλέξτε ένα Πεδίο/Κλειδί/Ευρετήριο από τη λίστα για να δείτε τον κώδικα PHP';
$string['selecttable'] = 'Επιλογή Πίνακα:';
$string['table'] = 'Πίνακας';
$string['tables'] = 'Πίνακες';
$string['unload'] = 'Αποφόρτωση';
$string['up'] = 'Πάνω';
$string['view'] = 'Δείτε';
$string['viewedited'] = 'Δείτε το Επεξεργασμένο';
$string['vieworiginal'] = 'Δείτε το Αρχικό';
$string['viewphpcode'] = 'Δείτε τον Κώδικα PHP';
$string['view_reserved_words'] = 'Δείτε Κλειδωμένες Λέξεις';
$string['viewsqlcode'] = 'Δείτε τον Κώδικα SQL';
$string['view_structure_php'] = 'Δείτε τη Δομή PHP';
$string['view_structure_sql'] = 'Δείτε τη Δομή SQL';
$string['view_table_php'] = 'Δείτε τον Πίνακα PHP';
$string['view_table_sql'] = 'Δείτε τον Πίνακα SQL';
$string['violatedforeignkeys'] = 'Παραβιασμένα κλειδιά';
$string['violatedforeignkeysfound'] = 'Βρέθηκαν παραβιασμένα κλειδιά';
$string['violations'] = 'Παραβιάσεις';
$string['wrong'] = 'Λάθος';
$string['wrongdefaults'] = 'Βρέθηκαν εσφαλμένες εξορισμού τιμές';
$string['wrongints'] = 'Βρέθηκαν εσφαλμένες αριθμητικές τιμές';
$string['wronglengthforenum'] = 'Λάθος μήκος πεδίου απαρίθμησης';
$string['wrongreservedwords'] = 'Κλειδωμένες Λέξεις που Χρησιμοποιούνται <br />(τα ονόματα των πινάκων δεν έχουν σημασία αν χρησιμοποιείτε το $CFG->prefix)';
$string['yesmissingindexesfound'] = 'Some missing indexes have been found in your DB. Here are their details and the needed SQL statements to be executed with your favourite SQL interface to create all them (don\'t forget to backup your data before doing that).<br /><br />After doing that, it\'s highly recommended to execute this utility again to check that no more missing indexes are found.';
$string['yeswrongdefaultsfound'] = 'Some inconsistent defaults have been found in your DB. Here are their details and the needed SQL statements to be executed with your favourite SQL interface to fix them all (don\'t forget to backup your data before doing that).<br /><br />After doing that, it\'s highly recommended to execute this utility again to check that no more iconsistent defaults are found.';
$string['yeswrongintsfound'] = 'Some wrong integers have been found in your DB. Here are their details and the needed SQL statements to be executed with your favourite SQL interface to create all them (don\'t forget to backup your data before doing that).<br /><br />After doing that, it\'s highly recommended to execute this utility again to check that no more wrong integers are found.';
