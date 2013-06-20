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
 * Strings for component 'debug', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = 'Δε βρέθηκα η υπομονάδα αυθεντικοποίησης {$a}.';
$string['blocknotexist'] = 'Το μπλοκ {$a} δεν υπάρχει';
$string['cannotbenull'] = 'Το {$a} δε γίνεται να είναι null!';
$string['cannotdowngrade'] = 'Δεν είναι δυνατή η υποβάθμιση του {$a->plugin} από {$a->oldversion} σε {$a->newversion}.';
$string['cannotfindadmin'] = 'Δε βρέθηκε διαχειριστής!';
$string['cannotinitpage'] = 'Δεν είναι δυνατή η πλήρης αρχικοποίησης της σελίδας: μη έγκυρο {$a->name} id {$a->id}';
$string['cannotsetuptable'] = 'Οι πίνακες {$a} δεν έχουν στηθεί με επιτυχία!';
$string['codingerror'] = 'Εντοπίστηκε λάθος κώδικα, πρέπει να φτιαχτεί από προγραμματιστή: {$a}';
$string['configmoodle'] = 'Το Moodle δεν έχει παραμετροποιηθεί ακόμη. Πρέπει να επεξεργαστείτε το config.php πρώτα.';
$string['erroroccur'] = 'Συνέβη κάποιο σφάλμα κατά τη διάρκεια της διαδικασίας';
$string['invalidarraysize'] = 'Μη έγκρυο μέγεθος πινάκων στις παραμέτρους του {$a}';
$string['invalideventdata'] = 'Έχουν υποβληθεί λανθασμένα eventadata: {$a}';
$string['missingconfigversion'] = 'Ο πίνακας ρυθμίσεων δεν περιέχει την έκδοση. Λυπούμαστε αλλά είναι αδύνατη η συνέχεια.';
$string['modulenotexist'] = 'Το άρθρωμα {$a} δεν υπάρχει';
$string['morethanonerecordinfetch'] = 'Βρέθηκαν περισσότερες από μία εγγραφές στη fetch() !';
$string['mustbeoveride'] = 'Η abstract μέθοδος {$a} πρέπει να γίνει override.';
$string['noadminrole'] = 'Δεν ήταν δυνατή η εύρεση ρόλου διαχειριστή';
$string['noblocks'] = 'Δεν έχουν εγκατασταθεί μπλοκ!';
$string['nocate'] = 'Δεν υπάρχουν κατηγορίες!';
$string['nomodules'] = 'Δεν έχουν βρεθεί αρθρώματα!!';
$string['nopageclass'] = 'Έγινε εισαγωγή του {$a} αλλά δε βρέθηκαν κλάσεις σελίδας';
$string['noreports'] = 'Δεν υπάρχουν προσβάσιμες αναφορές';
$string['notables'] = 'Δεν υπάρχουν πίνακες!';
$string['phpvaroff'] = 'Η μεταβλητή του διακομιστή PHP \'{$a->name}\' θα έπρεπε να είναι Off - {$a->link}';
$string['phpvaron'] = 'Η μεταβλητή του διακομιστή PHP \'{$a->name}\' δεν είναι On - {$a->link}';
$string['sessionmissing'] = 'Το αντικείμενο {$a} λείπει από τη συνεδρία';
$string['sqlrelyonobsoletetable'] = 'Η SQL αυτή στηρίζεται σε απαρχαιωμένους πίνακες table: {$a}!  Ο κώδικάς σας πρέπει να φτιαχτεί από κάποιον προγραμματιστή.';
$string['withoutversion'] = 'Το κύριο αρχείο version.php λείπει, δεν είναι αναγνώσιμο ή είναι κατεστραμμένο.';
$string['xmlizeunavailable'] = 'Οι λειτουργίες xmlize δεν είναι διαθέσιμες';
