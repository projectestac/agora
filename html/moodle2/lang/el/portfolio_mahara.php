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
 * Strings for component 'portfolio_mahara', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['err_invalidhost'] = 'Αυτή η υπομονάδα λογισμικού είναι ρυθμισμένη λάθος και δείχνει σε έναν μη έγκυρο (ή διεγραμμένο) υπολογιστή mnet.  Αυτή η υπομονάδα λογισμικού εξαρτάται από ομότιμους Moodle Networking με δημοσιευμένο SSO IDP , με εγγραφή χαρτοφυλακίου και SSO_SP.';
$string['err_networkingoff'] = 'Το Moodle Networking είναι εξολοκλήρου απενεργοποιημένο. Παρακαλούμε ενεργοποιήστε το προτού προσπαθήσετε να ρυθμίσετε αυτή την υπομονάδα λογισμικού.  Κάθε στιγμιότυπο αυτής της υπομονάδας λογισμικού έχει ρυθμιστεί ως μη μέχρι να κάνετε τις διορθώσεις - θα πρέπει να τα ρυθμίσετε χειροκίνητα ως ορατά αργότερα.  Δεν μπορούν να χρησιμοποιηθούν μέχρι να γίνει αυτό.';
$string['err_nomnetauth'] = 'Η υπομονάδα λογισμικού πιστοποίησης mnet είναι απενεργοποιημένη, αλλά είναι απαραίτητη για αυτή την υπηρεσία';
$string['err_nomnethosts'] = 'Αυτή η υπομονάδα λογισμικού εξαρτάται από ομότιμους Moodle Networking με δημοσιευμένο SSO IDP , με εγγραφή χαρτοφυλακίου και SSO_SP καθώς και στην υπομονάδα λογισμικού πιστοποίησης mnet.  Κάθε στιγμιότυπο αυτής της υπομονάδας λογισμικού έχει ρυθμιστεί ως μη μέχρι να κάνετε τις διορθώσεις - θα πρέπει να τα ρυθμίσετε χειροκίνητα ως ορατά αργότερα.  Δεν μπορούν να χρησιμοποιηθούν μέχρι να γίνει αυτό.';
$string['failedtojump'] = 'Αποτυχία εκκίνησης επικοινωνίας με τον απομακρυσμένο εξυπηρετητή';
$string['failedtoping'] = 'Αποτυχία εκκίνησης επικοινωνίας με τον απομακρυσμένο εξυπηρετητή: {$a}';
$string['mnethost'] = 'Υπολογιστής Moodle Networking';
$string['mnet_nofile'] = 'Αποτυχία εύρεσης του αρχείου στο αντικείμενο μεταφοράς - περίεργο σφάλμα';
$string['mnet_nofilecontents'] = 'Το αρχείο βρέθηκε στο αντικείμενο μεταφοράς, αλλά δεν ήταν δυνατόν να ληφθεί το περιεχόμενο - περίεργο σφάλμα: {$a}';
$string['mnet_noid'] = 'Αποτυχία εύρεσης της αντίστοιχης εγγραφής μεταφοράς για αυτό το τεκμήριο';
$string['mnet_notoken'] = 'Αποτυχία εύρεσης τεκμηρίων που αντιστοιχούν σε αυτή τη μεταφορά';
$string['mnet_wronghost'] = 'Ο απομακρυσμένος υπολογιστής δεν αντιστοιχεί στην εγγραφή μεταφοράς για αυτό το τεκμήριο';
$string['pf_description'] = 'Οι χρήστες επιτρέπεται να προωθούν περιεχόμενο του Moodle σε αυτό τον υπολογιστή<br />Γραφτείτε σε αυτή την υπηρεσία για να επιτρέπετε στους πιστοποιημένους χρήστες του ιστοχώρου σας να προωθούν περιεχόμενο στο {$a}<br /><ul><li><em>Προαπαιτούμενο</em>: Επίσης πρέπει να <strong>δημοσιεύσετε</strong> την υπηρεσία SSO (Πάροχος Αναγνώρισης) στο {$a}.</li><li><em>Προαπαιτούμενο</em>: Επίσης πρέπει να <strong>εγγραφείτε</strong> στην υπηρεσία SSO (Πάροχος Υπηρεσίας) στο {$a}</li><li><em>Προαπαιτούμενο</em>: Πρέπει επίσης να ενεργοποιήσετε την υπομονάδα λογισμικού πιστοποίησης mnet.</li></ul><br />';
$string['pf_name'] = 'Υπηρεσίες Χαρτοφυλακίου';
$string['pluginname'] = 'Ηλεκτρονικό Χαρτοφυλάκιο Mahara';
$string['senddisallowed'] = 'Δεν μπορείτε να μεταφέρετε αρχεία στο Mahara αυτή τη στιγμή';
$string['url'] = 'URL';
