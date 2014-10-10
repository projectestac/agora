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
 * Strings for component 'block_quickmail', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   block_quickmail
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ενέργειες';
$string['add_all'] = 'Προσθήκη όλων';
$string['add_button'] = 'Προσθήκη';
$string['additional_emails'] = 'Πρόσθετα Email';
$string['additional_emails_help'] = 'Άλλες διευθύνσεις email στις οποίες θέλετε να αποσταλεί το μήνυμα, χωρισμένες με κόμμα ή ελληνικό ερωτηματικό. Παράδειγμα:

email1@example.com, email2@example.com';
$string['allowstudents'] = 'Να επιτρέπεται στους μαθητές να χρησιμοποιούν το Quickmail';
$string['all_sections'] = 'Όλες οι ενότητες';
$string['alternate'] = 'Εναλλακτικά Emails';
$string['alternate_body'] = '<p>Ο {$a->fullname} πρόσθεσε την {$a->address} ως εναλλακτική διεύθυνση αποστολής για το {$a->course}. </p> <p> Ο σκοπός του παρόντος email ήταν η επιβεβαίωση πως η διεύθυνση αυτή υπάρχει, και ο ιδιοκτήτης της έχει τις κατάλληλες άδειες στο Moodle. </p> <p> Εάν επιθυμείτε να ολοκληρώσετε την διαδικασία επιβεβαίωσης, συνεχίστε στην ακόλουθη διεύθυνση: {$a->url}. </p> <p> Εάν το email αυτό σας φαίνεται άσχετο, τότε το έχετε λάβει από λάθος και μπορείτε να το διαγράψετε. </p> Ευχαριστούμε.';
$string['alternate_new'] = 'Προσθήκη εναλλακτικής διεύθυνσης';
$string['alternate_subject'] = 'Επιβεβαίωση εναλλακτικής διεύθυνσης';
$string['approved'] = 'Εγκρίθηκε';
$string['are_you_sure'] = 'Είστε βέβαιοι πως θέλετε να διαγράψετε το  {$a->title}; Η ενέργεια αυτή δεν μπορεί να αναιρεθεί.';
$string['attachment'] = 'Επισυνάψεις';
$string['backup_history'] = 'Να συμπεριληφθεί το ιστορικό του Quickmail';
$string['composenew'] = 'Δημιουργία νέου Email';
$string['config'] = 'Διαμόρφωση';
$string['courselayout'] = 'Μορφή μαθήματος';
$string['courselayout_desc'] = 'Χρησιμοποιήστε τη _Μορφή μαθήματος_ όταν εμφανίζετε σελίδες με Quickmail blocks. Ενεργοποιήστε τη λειτουργία εάν αντιμετωπίζετε προβλήματα με σταθερά μεγέθη φορμών στο Moodle';
$string['default_flag'] = 'Τυπικό';
$string['delete_confirm'] = 'Είστε σίγουροι για τη διαγραφή του μηνύματος με τις ακόλουθες λεπτομέρειες; {$a)';
$string['delete_failed'] = 'Αποτυχία διαγραφής email';
$string['drafts'] = 'Εμφάνιση Πρόχειρων';
$string['entry_activated'] = 'Η εναλλακτική διεύθυνση email {$a->address} μπορεί τώρα να χρησιμοποιηθεί στο {$a->course}.';
$string['entry_failure'] = 'Το email δε μπορούσε να σταλεί σε {$a->address}. Παρακαλούμε επιβεβαιώστε πως η διεύθυνση {$a->address} υπάρχει, και προσπαθήστε ξανά.';
$string['entry_key_not_valid'] = 'Ο σύνδεσμος ενεργοποίησης δεν είναι πια έγκυρος για {$a->address}. Συνεχίστε για να στείλετε πάλι τον σύνδεσμο αυτόν.';
$string['entry_saved'] = 'Η εναλλακτική διεύθυνση {$a->address} αποθηκεύτηκε.';
$string['entry_success'] = 'Ένα email επιβεβαίωσης έχει σταλεί στη διεύθυνση {$a->address} και περιέχει οδηγίες για την ενεργοποίηση της.';
$string['from'] = 'Από';
$string['history'] = 'Ιστορικό';
$string['log'] = 'Ιστορικό';
$string['message'] = 'Μήνυμα';
$string['no_drafts'] = 'Δεν έχετε πρόχειρα email.';
$string['no_email'] = 'Δεν μπορούσε να σταλεί email σε {$a->firstname} {$a->lastname}.';
$string['no_filter'] = 'Χωρίς φίλτρο';
$string['no_log'] = 'Δεν έχετε ακόμη ιστορικό με email.';
$string['no_permission'] = 'Δεν έχετε άδεια για να στείλετε emails με το Quickmail';
$string['no_section'] = 'Όχι σε ενότητα';
$string['no_selected'] = 'Πρέπει να επιλέξετε χρήστες για να στείλετε email.';
$string['no_subject'] = 'Πρέπει να παρέχετε κάποιο θέμα μηνύματος';
$string['not_valid_user'] = 'Δεν μπορείτε να δείτε άλλο ιστορικό';
$string['no_users'] = 'Δεν υπάρχουν χρήστες για να στείλετε email.';
$string['overwrite_history'] = 'Διαγραφή ιστορικού Quickmail';
$string['potential_sections'] = 'Πιθανές ενότητες';
$string['potential_users'] = 'Πιθανοί αποδέκτες';
$string['prepend_class'] = 'Όνομα μαθήματος ως πρόθεμα';
$string['prepend_class_desc'] = 'Εισαγωγή του μικρού ονόματος του μαθήματος ως θέμα του email.';
$string['quickmail:allowalternate'] = 'Επιτρέπει τη χρήση εναλλακτικής διεύθυνσης email για τα μαθήματα.';
$string['quickmail:canconfig'] = 'Επιτρέπει τη διαμόρφωση του Quickmail';
$string['quickmail:canimpersonate'] = 'Επιτρέπει στους χρήστες να εισέλθουν ως άλλοι χρήστες και να δουν το ιστορικό.';
$string['quickmail:cansend'] = 'Επιτρέπει την αποστολή mail μέσω του Quickmail';
$string['receipt'] = 'Λήψη αντιγράφου';
$string['receipt_help'] = 'Λήψη αντιγράφου του μηνύματος που αποστέλλεται';
$string['remove_all'] = 'Αφαίρεση όλων';
$string['remove_button'] = 'Αφαίρεση';
$string['required'] = 'Συμπληρώστε τα απαιτούμενα πεδία.';
$string['reset'] = 'Επαναφορά των αρχικών ρυθμίσεων';
$string['restore_history'] = 'Επαναφορά ιστορικού του Quickmail';
$string['role_filter'] = 'φίλτρο ρόλων';
$string['save_draft'] = 'Αποθήκευση πρόχειρου';
$string['selected'] = 'Επιλεγμένοι παραλήπτες';
$string['select_groups'] = 'Επιλέξτε ενότητες ...';
$string['select_roles'] = 'Ρόλοι που θα φιλτραριστούν';
$string['select_users'] = 'Επιλέξτε χρήστες ...';
$string['send_email'] = 'Αποστολή Email';
$string['sig'] = 'Υπογραφή';
$string['signature'] = 'Υπογραφές';
$string['subject'] = 'Θέμα';
$string['sure'] = 'Θέλετε σίγουρα να διαγράψετε τη διεύθυνση {$a->address}; Αυτή η ενέργεια δε μπορεί να αναιρεθεί.';
$string['title'] = 'Τίτλος';
$string['valid'] = 'Κατάσταση ενεργοποίησης';
$string['waiting'] = 'Αναμονή';
