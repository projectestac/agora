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
 * Strings for component 'block_dedication', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   block_dedication
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['access_button'] = 'Εργαλείο αφοσίωσης';
$string['access_info'] = 'Μόνο για καθηγητές:';
$string['connectionratiorow'] = 'Συνδέσεις / ημέρα';
$string['dedication:addinstance'] = 'Δυνατότητα προσθήκης μπλοκ αφοσίωσης';
$string['dedicationall'] = 'Προβολή της αφοσίωσης όλων των μελών του μαθήματος. Κάντε κλικ σε οποιοδήποτε όνομα για λεπτομέρειες αφοσίωσης.';
$string['dedication_estimation'] = 'Ο εκτιμώμενος χρόνος αφοσίωσης είναι';
$string['dedicationgroup'] = 'Προβολή αφοσίωσης όλων των μελών του group <em>{$a}</em>. Επιλέξτε κάποιο μέλος για λεπτομέρειες αφοσίωσης.';
$string['dedicationrow'] = 'Αφοσίωση μαθήματος';
$string['dedication:use'] = 'Να επιτραπεί η χρήση αφοσίωσης μαθήματος';
$string['form'] = 'Ρυθμίσεις αφοσίωσης μαθήματος';
$string['form_help'] = 'Ο χρόνος προσδιορίζεται με βάση το Session που περιέχεται στο ημερολόγιο καταγραφής. <strong>Click:</strong> Κάθε φορά που ένας χρήστης επισκέπτεται μια σελίδα στο Moodle, γίνεται εγγραφή στο ημερολόγιο καταγραφής. <strong>Session:</strong> Σύνολο 2 ή περισσότερων κλικ κατά το οποίο ο χρόνος μεταξύ των κλικ δεν ξεπερνά το καθορισμένο μέγιστο διάστημα. <strong>Session duration:</strong> ο χρόνος μεταξύ του πρώτου και του τελευταίου κλικ του session. <strong>Dedication time:</strong> το σύνολο όλων των sessions για ένα χρήστη.';
$string['form_text'] = 'Επιλέξτε το εύρος των ημερομηνιών και το μέγιστο χρόνο μεταξύ των κλικ του ίδιου session.';
$string['limit'] = 'Όριο μεταξύ κλικ (σε λεπτά)';
$string['limit_help'] = 'Το όριο μεταξύ κλικ ορίζει το αν 2 κλικ είναι μέρος του ίδιου session ή όχι';
$string['maxtime'] = 'Τέλος περιόδου';
$string['maxtime_help'] = 'Λαμβάνει υπόψη εγγραφές του ημερολογίου καταγραφής που τελειώνουν πριν από αυτήν την ημερομηνία';
$string['meandedication'] = '<strong>Μέση αφοσίωση:</strong> {$a}';
$string['mintime'] = 'Αρχή περιόδου';
$string['mintime_help'] = 'Λαμβάνει υπόψη εγγραφές του ημερολογίου καταγραφής που τελειώνουν μετά από αυτήν την ημερομηνία';
$string['pagetitle'] = '{$a}: αφοσίωση μαθήματος';
$string['period'] = 'Περίοδος από <em>{$a->mintime}</em> έως <em>{$a->maxtime}</em>';
$string['perioddiff'] = '<strong>Elapsed time:</strong> {$a}';
$string['perioddiffrow'] = 'Χρόνος που πέρασε';
$string['pluginname'] = 'Αφοσίωση μαθήματος';
$string['sessionduration'] = 'Διάρκεια';
$string['sessionstart'] = 'Αρχή session';
$string['show_dedication'] = 'Εμφάνιση χρόνου αφοσίωσης στους μαθητές';
$string['show_dedication_help'] = 'Εξ\'ορισμού, ο χρόνος αφοσίωσης μπορεί να εμφανιστεί μόνο στους καθηγητές. Η ρύθμιση αυτή επιτρέπει στους μαθητές να δουν το χρόνο αφοσίωσής τους στο block.';
$string['sincerow'] = 'Από';
$string['submit'] = 'Υπολογισμός';
$string['torow'] = 'Έως';
$string['totaldedication'] = '<strong>Συνολική αφοσίωση:</strong> {$a}';
$string['userdedication'] = 'Λεπτομέρειες αφοσίωσης μαθήματος για το χρήστη <em>{$a}</em>.';
