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
 * Strings for component 'enrol_self', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['defaultrole'] = 'Προεπιλεγμένη ανάθεση ρόλου';
$string['defaultrole_desc'] = 'Επιλέξτε τον ρόλο, ο οποίος θα πρέπει να ανατεθεί στους χρήστες κατά τη διάρκεια της αυτό-εγγραφής';
$string['enrolenddate'] = 'Ημερομηνία Λήξης';
$string['enrolenddaterror'] = 'Η ημερομηνία λήξης εγγραφών δεν μπορεί να είναι νωρίτερα από την ημερομηνία έναρξης';
$string['enrolperiod'] = 'Διάρκεια εγγραφής';
$string['enrolstartdate'] = 'Ημερομηνία έναρξης';
$string['groupkey'] = 'Χρήση ομαδικών κλειδιών εγγραφής';
$string['groupkey_desc'] = 'Χρησιμοποιήστε ομαδικά κλειδιά εγγραφής από προεπιλογή.';
$string['longtimenosee'] = 'Εγγραφή ανενεργή μετά από';
$string['longtimenosee_help'] = 'Αν οι χρήστες δεν έχουν πρόσβαση σε ένα μάθημα για μεγάλο χρονικό διάστημα, τότε απεγγράφονται αυτόματα. Αυτή η παράμετρος καθορίζει την προθεσμία αυτή.';
$string['maxenrolled'] = 'Μέγιστος αριθμός εγγεγραμμένων χρηστών';
$string['maxenrolled_help'] = 'Καθορίζει τον μέγιστο αριθμό χρηστών που μπορούν να αυτό-εγγραφούν. Το 0 σημαίνει ότι δεν υπάρχει όριο.';
$string['passwordinvalidhint'] = 'Αυτό το κλειδί εγγραφής ήταν λάθος, παρακαλώ δοκιμάστε ξανά';
$string['pluginname'] = 'Αυτό-εγγραφή';
$string['pluginname_desc'] = 'Η πρόσθετη λειτουργία της αυτό-εγγραφής επιτρέπει στους χρήστες να επιλέξουν σε ποιά μαθήματα επιθυμούν να συμμετέχουν. Τα μαθήματα μπορεί να προστατεύονατι από ένα κλειδί εγγραφής. Εσωτερικά η εγγραφή γίνεται μέσω της πρόσθετης λειτουργίας χειροκίνητης εγγραφής, η οποία πρέπει να ενεργοποιηθεί στο ίδιο μάθημα.';
$string['requirepassword'] = 'Απαιτείται κλειδί εγγραφής';
$string['requirepassword_desc'] = 'Απαιτείται κλειδί εγγραφής στα νέα μαθήματα και αποτρέπεται η αφαίρεση του κλειδιού εγγραφής από τα υπάρχοντα μαθήματα.';
$string['self:config'] = 'Παραμετροποίηση περιπτώσεων αυτό-εγγραφής';
$string['self:manage'] = 'Διαχείρηση εγγεγραμένων χρηστών';
$string['self:unenrol'] = 'Απεγγραφή χρηστών από το μάθημα';
$string['self:unenrolself'] = 'Απεγγραφή του ιδίου από το μάθημα';
$string['sendcoursewelcomemessage'] = 'Αποστολή μηνύματος καλωσορίσματος σε επίπεδο μαθήματος';
$string['sendcoursewelcomemessage_help'] = 'Εάν ενεργοποιηθεί, οι χρήστες λαμβάνουν ένα μήνυμα καλωσορίσματος όταν εγγράφονται μόνοι τους σε ένα μάθημα.';
$string['showhint'] = 'Εμφάνιση υπόδειξης';
$string['showhint_desc'] = 'Εμφάνιση πρώτου γράμματος από το κλειδί πρόσβασης επισκέπτη.';
$string['status'] = 'Επιτρέπονται αυτό-εγγραφές';
$string['status_desc'] = 'Επιτρέψτε στους χρήστες να αυτό-εγγράφονται στο μάθημα από προεπιλογή.';
$string['usepasswordpolicy'] = 'Χρήση πολιτικής κωδικού πρόσβασης';
$string['usepasswordpolicy_desc'] = 'Χρησιμοποιήστε το πρότυπο της πολιτικής κωδικού πρόσβασης για τα κλειδιά εγγραφής.';
$string['welcometocourse'] = 'Καλωσήλθατε στο {$a}';
$string['welcometocoursetext'] = 'Καλώς ήρθατε στο {$a->coursename}!

Ένα από τα πρώτα πράγματα που θα πρέπει να κάνετε είναι να επεξεργαστείτε τη σελίδα
με το προφίλ σας μέσα σε αυτό το μάθημα ώστε να μάθουμε περισσότερα για εσάς:

  {$a->profileurl}';
