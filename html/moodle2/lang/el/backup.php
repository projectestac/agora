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
 * Strings for component 'backup', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'Επιλέξτε αν θέλετε ή όχι να δημιουργούνται αυτόματα αντίγραφα ασφαλείας. Αν είναι επιλεγμένο το μη αυτόματο, αυτοματοποιημένη δημιουργία αντιγράφων ασφαλείας θα είναι δυνατή μόνο μέσα από το πρόγραμμα αυτομάτων αντιγράφων ασφαλείας CLI. Αυτό μπορεί να γίνει είτε χειροκίνητα από τη γραμμή εντολών ή μέσω του cron.';
$string['autoactivedisabled'] = 'Απενεργοποιημένο';
$string['autoactiveenabled'] = 'Ενεργοποιημένο';
$string['autoactivemanual'] = 'Μη αυτόματο';
$string['automatedbackupschedule'] = 'Πρόγραμμα';
$string['automatedbackupschedulehelp'] = 'Ημέρες λήψης αυτόματου αντιγράφου ασφαλείας';
$string['automatedbackupsinactive'] = 'Η προγραμματισμένη λήψη αντιγράφων ασφαλείας δεν έχει ενεργοποιηθεί από το διαχειριστή του ιστοχώρου';
$string['automatedbackupstatus'] = 'Κατάσταση λήψης αυτόματων αντιγράφων ασφαλείας';
$string['automatedsettings'] = 'Ρυθμίσεις αυτόματων αντιγράφων ασφαλείας';
$string['automatedsetup'] = 'Ρύθμιση αυτόματων αντιγράφων ασφαλείας';
$string['automatedstorage'] = 'Αυτόματη αποθήκευση αντιγράφων ασφαλείας';
$string['automatedstoragehelp'] = 'Επιλέξτε την τοποθεσία που θέλετε να αποθηκεύονται τα αντίγραφα ασφαλείας όταν δημιουργούνται αυτόματα.';
$string['backupmode10'] = 'Γενικά';
$string['backupsettings'] = 'Ρυθμίσεις αντιγράφων ασφαλείας';
$string['backupstage1action'] = 'Επόμενο';
$string['backupstage2action'] = 'Επόμενο';
$string['backupstage4action'] = 'Εκτέλεση αντιγράφου ασφαλείας';
$string['choosefilefromcoursebackup'] = 'Περιοχή αντιγράφων ασφαλείας μαθήματος';
$string['choosefilefromcoursebackup_help'] = 'Όταν χρησιμοποιούνται οι προεπιλεγμένες ρυθμίσεις για τα αντίγραφα ασφαλείας των μαθημάτων, τα αντίγραφα ασφαλείας θα αποθηκεύονται εδώ';
$string['choosefilefromuserbackup'] = 'Προσωπική περιοχή αντιγράφων ασφαλείας χρήστη';
$string['choosefilefromuserbackup_help'] = 'Όταν έχει σημειωθεί η επιλογή "Ανωνυμία πληροφοριών χρήστη" στα αντίγραφα ασφαλείας μαθημάτων, τα αντίγραφα ασφαλείας θα αποθηκεύονται εδώ';
$string['configgeneralactivities'] = 'Ορίζει την προεπιλογή για την συμπερίληψη των δραστηριοτήτων στα αντίγραφα ασφαλείας.';
$string['configgeneralanonymize'] = 'Αν ενεργοποιηθεί όλες οι πληροφορίες σχετικά με τους χρήστες θα είναι ανώνυμες από προεπιλογή.';
$string['configgeneralblocks'] = 'Ορίζει την προεπιλογή για την συμπερίληψη των μπλοκ στα αντίγραφα ασφαλείας.';
$string['configgeneralcomments'] = 'Ορίζει την προεπιλογή για την συμπερίληψη των σχολίων στα αντίγραφα ασφαλείας.';
$string['configgeneralhistories'] = 'Ορίζει την προεπιλογή για την συμπερίληψη του ιστορικού χρήστη εντός των αντιγράφων ασφαλείας.';
$string['configgenerallogs'] = 'Αν ενεργοποιηθεί οι αναφορές θα περιλαμβάνονται στα αντίγραφα ασφαλέιας από προεπιλογή.';
$string['configgeneralroleassignments'] = 'Αν ενεργοποιηθεί από προεπιλογή θα δημιουργηθούν επίσης αντίγραφα ασφαλείας για τις αναθέσεις ρόλων.';
$string['configgeneralusers'] = 'Ορίζει την προεπιλογή για το αν περιλαμβάνονται οι χρήστες στα αντίγραφα ασφαλείας.';
$string['configgeneraluserscompletion'] = 'Αν ενεργοποιηθεί οι πληροφορίες ολοκλήρωσης ενός χρήστη θα περιλαμβάνονται στα αντίγραφα ασφαλείας από προεπιλογή.';
$string['currentstage1'] = 'Αρχικές ρυθμίσεις';
$string['currentstage16'] = 'Ολοκλήρωση';
$string['currentstage2'] = 'Ρυθμίσεις διάταξης';
$string['currentstage4'] = 'Επιβεβαίωση και επανεξέταση';
$string['currentstage8'] = 'Εκτέλεση αντιγράφου ασφαλείας';
$string['filename'] = 'Όνομα αρχείου';
$string['generalactivities'] = 'Συμπεριέλαβε δραστηριότητες';
$string['generalanonymize'] = 'Ανωνυμία πληροφοριών';
$string['generalbackdefaults'] = 'Γενικές προεπιλογές αντιγράφων ασφαλείας';
$string['generalblocks'] = 'Συμπεριέλαβε μπλοκ';
$string['generalcomments'] = 'Συμπεριλάβετε σχόλια';
$string['generalfilters'] = 'Συμπεριέλαβε φίλτρα';
$string['generalgradehistories'] = 'Συμπεριέλαβε ιστορικό';
$string['generalhistories'] = 'Συμπεριέλαβε ιστορικό';
$string['generallogs'] = 'Συπμεριέλαβε αναφορές';
$string['generalroleassignments'] = 'Συμπεριέλαβε αναθέσεις ρόλων';
$string['generalusers'] = 'Συμπεριέλαβε χρήστες';
$string['generaluserscompletion'] = 'Συμπεριέλαβε πληροφορίες ολοκλήρωσης ενός χρήστη';
$string['importbackupstage1action'] = 'Επόμενο';
$string['importbackupstage2action'] = 'Επόμενο';
$string['importcurrentstage1'] = 'Αρχικές ρυθμίσεις';
$string['importcurrentstage16'] = 'Ολοκλήρωση';
$string['importcurrentstage2'] = 'Ρυθμίσεις διάταξης';
$string['importcurrentstage4'] = 'Επιβεβαίωση και επανεξέταση';
$string['importfile'] = 'Εισαγωγή ενός αντιγράφου ασφαλείας';
$string['includeactivities'] = 'Περιλαμβάνουν:';
$string['includeditems'] = 'Αντικείμενα που συμπεριλαμβάνονται:';
$string['includeuserinfo'] = 'Δεδομένα χρήστη';
$string['locked'] = 'Κλειδωμένο';
$string['managefiles'] = 'Διαχείριση αντιγράφων ασφαλείας';
$string['previousstage'] = 'Προηγούμενο';
$string['restorecourse'] = 'Επαναφορά μαθήματος';
$string['restorestage1action'] = 'Επόμενο';
$string['restorestage2action'] = 'Επόμενο';
$string['restorestage4'] = 'Ρυθμίσεις';
$string['restorestage4action'] = 'Επόμενο';
$string['restorestage64'] = 'Ολοκλήρωση';
$string['restorestage8action'] = 'Επόμενο';
$string['rootsettingactivities'] = 'Συμπεριέλαβε δραστηριότητες';
$string['rootsettinganonymize'] = 'Ανωνυμία πληροφοριών χρήστη';
$string['rootsettingblocks'] = 'Συμπεριέλαβε μπλοκ';
$string['rootsettingcomments'] = 'Συμπεριλάβετε σχόλια';
$string['rootsettingfilters'] = 'Συμπεριέλαβε φίλτρα';
$string['rootsettinggradehistories'] = 'Συμπεριέλαβε βαθμολογικό ιστορικό';
$string['rootsettinglogs'] = 'Συμπεριέλαβε αρχεία καταγραφής (logs) μαθήματος';
$string['rootsettings'] = 'Ρυθμίσεις αντιγράφων ασφαλείας';
$string['rootsettinguserscompletion'] = 'Συμπεριέλαβε λεπτομερειες ολοκλήρωσης χρήστη';
$string['storagecourseandexternal'] = 'Περιοχή αρχείων αντιγράφων ασφαλείας μαθήματος και ο ορισμένος κατάλογος';
$string['storagecourseonly'] = 'Περιοχή αρχείων αντιγράφων ασφαλείας μαθήματος';
$string['storageexternalonly'] = 'Ορισμένος κατάλογος για αυτόματα αντίγραφα ασφαλείας';
