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
 * Strings for component 'message_email', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'Να μπορούν οι χρήστες να αλλάζουν σετ χαρακτήρων';
$string['configallowusermailcharset'] = 'Να έχει τη δυνατότητα ο κάθε χρήστης να καθορίζει το δικό του σετ χαρακτήρων στα μηνύματα ηλεκτρονικού ταχυδρομείου του.';
$string['configmailnewline'] = 'Χαρακτήρες εισαγωγής γραμμής που χρησιμοποιούνται σε μηνύματα ηλεκτρονικού ταχυδρομείου. Το CRLF απαιτείται σύμφωνα με το RFC 822bis, ορισμένοι διακομιστές ηλεκτρονικού ταχυδρομείου εκτελούν αυτόματη μετατροπή από LF σε CRLF, άλλοι κάνουν λάθος μετατροπή από CRLF σε CRCRLF ενώ άλλοι απορρίπτουν τα μηνύματα με απλό LF (qmail, για παράδειγμα). Δοκιμάστε να αλλάξετε αυτήν τη ρύθμιση εάν έχετε προβλήματα με μη παραδομένα μηνύματα ή διπλές νέες γραμμές.';
$string['confignoreplyaddress'] = 'Μερικές φορές αποστέλλονται μηνύματα ηλεκτρονικού ταχυδρομείου για λογαριαμό των χρηστών (πχ ανακοινώσεις σε fora). Η διεύθυνση ηλεκτρονικού ταχυδρομείου που ορίζεται εδώ θα χρησιμοποιηθεί ως αποστολέας για τις περιπτώσεις που δε θα πρέπει οι παραλήπτες να μπορούν να απαντήσουν';
$string['configsitemailcharset'] = 'Όλα τα μηνύματα ηλεκτρονικού ταχυδρομείου που παράγονται από την ιστοσελίδα θα αποστέλλονται με το charset που ορίζεται εδώ. Όπως και να έχει, κάθε χρήστης μπορεί να το τροποποιεί εάν ενεργοποιηθεί η επόμενη ρύθμιση.';
$string['configsmtphosts'] = 'Δώστε το ολοκληρωμένο όνομα ενός ή περισσότερων τοπικών διακομιστών SMTP που θα χρησιμοποιεί το Moodle για να στέλνει μηνύματα ηλεκτρονικού ταχυδρομείου (π.χ. mail.auth.gr). Εάν το αφήσετε κενό, το Moodle θα χρησιμοποιήσει την προκαθορισμένη μέθοδο αποστολής μηνυμάτων ηλεκτρονικού ταχυδρομείου της PHP.';
$string['configsmtpmaxbulk'] = 'Μέγιστος αριθμόως μηνυμάτων που θα στέλνονται σε κάθε σύνοδο SMTP. Η ομαδοποίηση των μηνυμάτων μπορεί να επιταχύνει την αποστολή. Τιμές μικρότερες από 2 επιβάλλουν τη δημιουργία μιας νέας συνεδρίας SMTP για κάθε μήνυμα.';
$string['configsmtpuser'] = 'Εάν έχετε ορίσει ένα διακομιστή SMTP πιο πάνω και ο ίδιος απαιτεί ταυτοποίηση, τότε εισάγετε όνομα χρήστη και κωδικό πρόσβασης εδώ.';
$string['email'] = 'Αποστολη ειδοποιήσεων μέσω mail σε';
$string['mailnewline'] = 'Χαρακτήρες εισαγωγής γραμμής στο μήνυμα ηλεκτρονικού ταχυδρομείου';
$string['noreplyaddress'] = 'Διεύθυνση μη-απάντησης';
$string['sitemailcharset'] = 'Κωδικοποίηση χαρακτήρων';
$string['smtphosts'] = 'Κεντρικοί υπολογιστές SMTP';
$string['smtpmaxbulk'] = 'Όριο συνεδρίας SMTP';
$string['smtppass'] = 'Κωδικός πρόσβασης SMTP';
$string['smtpuser'] = 'Όνομα χρήστη SMTP';
