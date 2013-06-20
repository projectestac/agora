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
 * Strings for component 'report_security', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p>Σας συνιστούμε να αλλάξετε τα δικαιώματα του αρχείου config.php μετά την εγκατάσταση ώστε το αρχείο να μην μπορεί να τροποποιηθεί από τον εξυπηρετητή ιστού.
Παρακαλούμε σημειώστε δεν βελτιώνει την ασφάλεια του εξυπηρετητή σημαντικά, αν και μπορεί να καθυστερήσει ή και να περιορίσει τις τυπικές κακόβουλες επιθέσεις.</p>';
$string['check_configrw_name'] = 'Εγγράψιμο config.php';
$string['check_configrw_ok'] = 'Το αρχείο config.php δεν μπορεί να τροποποιηθεί από σενάρια PHP.';
$string['check_configrw_warning'] = 'Σενάρια PHP μπορούν να τροποποιήσουν το αρχείο config.php.';
$string['check_cookiesecure_details'] = '<p>Εάν ενεργοποιήσετε την επικοινωνία https τότε σας συνιστούμε να ενεργοποιήσετε επίσης και τα ασφαλή cookies. Θα ήταν καλό επίσης να προσθέσετε μόνιμη ανακατεύθυνση από το http σε https.</p>';
$string['check_cookiesecure_error'] = 'Παρακαλούμε ενεργοποίηστε τα ασφαλή cookies';
$string['check_cookiesecure_name'] = 'Ασφαλή cookies';
$string['check_cookiesecure_ok'] = 'Τα ασφαλή cookies είναι ενεργοποιημένα.';
$string['check_defaultuserrole_details'] = '<p>Σε όλους τους συνδεδεμένους χρήστες δίνονται ικανότητες του προεπιλεγμένου ρόλου χρήστη. Παρακαλούμε εξασφαλίστε οτι δεν επιτρέπονται ριψοκίνδυνες ικανότητες για αυτό το ρόλο.</p>
<p>Ο μόνος απαρχαιωμένος τύπος που επιτρέπεται για τον προεπιλεγμένο ρόλο χρήστη είναι ο <em>Πιστοποιημένος χρήστης</em>. Η ικανότητα όψης μαθήματος δεν θα πρέπει να είναι ενεργοποιημένη.</p>';
$string['check_defaultuserrole_error'] = 'Ο προεπιλεγμένος ρόλος χρήστη "{$a}" δεν είναι σωστά ορισμένος!';
$string['check_defaultuserrole_name'] = 'Προεπιλεγμένος ρόλος για όλους τους χρήστες';
$string['check_defaultuserrole_notset'] = 'Ο προεπιλεγμένος ρόλος δεν έχει οριστεί.';
$string['check_defaultuserrole_ok'] = 'Ο ορισμός του προεπιλεγμένου ρόλου για όλους τους χρήστες είναι εντάξει.';
$string['check_displayerrors_details'] = '<p>Ενεργοποιώντας την ρύθμιση της PHP <code>display_errors</code> δεν συνίσταται σε ιστοχώρους παραγωγής γιατί τα μηνύματα λάθους μπορούν να αποκαλύψουν ευαίσθητες πληροφορίες σχετικά με τον εξυπηρετητή σας.</p>';
$string['check_displayerrors_error'] = 'Η ρύθμιση της PHP για την εμφάνιση μηνυμάτων σφάλματος είναι ενεργοποιημένη. Συνίσταται να την απενεργοποιήσετε.';
$string['check_displayerrors_name'] = 'Εμφάνιση των σφαλμάτων PHP';
$string['check_displayerrors_ok'] = 'Η εμφάνιση των σφαλμάτων PHP είναι απενεργοποιημένη.';
$string['check_emailchangeconfirmation_details'] = '<p>Συνίσταται η ύπαρξη ενός βήματος επιβεβαίωσης μέσω ηλεκτρονικού ταχυδρομείου όταν οι χρήστες αλλάζουν την δι/νση ηλεκτρονικού ταχυδρομείου στο προφίλ τους. Εάν αυτό το βήμα είναι απενεργοποιημένο τότε κακόβουλοι χρήστες μπορεί να εκμεταλευτούν τον εξυπηρετητή για να στείλουν μαζικά ενοχλητικά μηνύματα.</p>
<p>Το πεδίο δι/νσης ηλεκτρονικού ταχυδρομείου μπορεί επίσης να κλειδωθεί από υπομονάδες λογισμικού για πιστοποίηση, αυτή η δυνατότητα δεν εξετάζεται εδώ.</p>';
$string['check_emailchangeconfirmation_error'] = 'Οι χρήστες μπορούν να εισάγουν οποιαδήποτε δι/νση ηλεκτρονικού ταχυδρομείου.';
$string['check_emailchangeconfirmation_info'] = 'Οι χρήστες μπορούν να εισάγουν μόνο δι/νσεις ηλεκτρονικού ταχυδρομείου που ανήκουν σε τομείς για τους οποίους έχει επιτραπεί η πρόσβαση.';
$string['check_emailchangeconfirmation_name'] = 'Επιβεβαίωση αλλαγής δι/νσης ηλεκτρονικού ταχυδρομείου';
$string['check_emailchangeconfirmation_ok'] = 'Επιβεβαίωση αλλαγής δι/νσης ηλεκτρονικού ταχυδρομείου στο προφίλ του χρήστη.';
$string['check_embed_details'] = '<p>Η άνευ ορίου ενσωμάτωση αντικειμένων σε σελίδες είναι πολύ επικίνδυνη - κάθε εγγεγραμένος χρήστης μπορεί να ξεκινήσει μια επίθεση XSS εναντίον χρηστών άλλου εξυπηρετητή. Αυτή η ρύθμιση θα πρέπει να απενεργοποιείται σε εξυπηρετητές παραγωγής.</p>';
$string['check_embed_error'] = 'Η άνευ ορίου ενσωμάτωση αντικειμένων σε σελίδες είναι ενεργοποιημένη - αυτό είναι πολύ επικίνδυνο για την πλειονότητα των εξυπηρετητών.';
$string['check_embed_name'] = 'Επιτρέπονται οι οδηγίες EMBED και OBJECT';
$string['check_embed_ok'] = 'Η άνευ ορίου ενσωμάτωση αντικειμένων σε σελίδες δεν επιτρέπεται.';
$string['check_frontpagerole_details'] = '<p>Ο προεπιλεγμένος ρόλος αρχικής σελίδας δίνεται σε όλους τους εγγεγραμμένους χρήστες για δραστηριότητες αρχικής σελίδας. Παρακαλούμε εξασφαλίστε οτι δεν επιτρέπονται ριψοκίνδυνες ικανότητες για αυτό το ρόλο.</p>
<p>Συνίσταται η δημιουργία ενός ειδικού ρόλου για αυτό το σκοπό και να μην χρησιμοποιηθεί κάποιος απαρχαιωμένος ρόλος.</p>';
$string['check_frontpagerole_error'] = 'Εντόπιστήκε λαθος ορισμένος προεπιλεγμένος ρόλος αρχικής σελίδας "{$a}"!';
$string['check_frontpagerole_name'] = 'Ρόλος αρχικής σελίδας';
$string['check_frontpagerole_notset'] = 'Ο ρόλος αρχικής σελίδας δεν έχει οριστεί.';
$string['check_frontpagerole_ok'] = 'Ο ορισμός του ρόλου αρχικής σελίδας είναι εντάξει.';
$string['check_globals_details'] = '<p>Η ρύθμιση PHP Register globals θεωρείται οτι είναι άκρως μη ασφαλής.</p>
<p>Η ρύθμιση <code>register_globals=off</code> πρέπει να οριστεί στις ρυθμίσεις της PHP. Αυτή η ρύθμιση μπορεί να καθοριστεί με επεξεργασία του αρχείου <code>php.ini</code>, ή των ρυθμίσεων των Apache/IIS ή ενός αρχείου <code>.htaccess</code>.</p>';
$string['check_globals_error'] = 'Η ρύθμιση Register globals ΠΡΕΠΕΙ να είναι απενεργοποιημένη. Παρακαλούμε διορθώστε αυτή τη ρύθμιση της PHP άμεσα!';
$string['check_globals_name'] = 'Register globals';
$string['check_globals_ok'] = 'Η ρύθμιση Register globals είναι απενεργοποιημένη.';
$string['check_google_details'] = '<p>Η ρύθμιση Open to Google επιτρέπει στις μηχανές αναζήτησης να συνδέονται σε μαθήματα με δικαιώματα επισκέπτη. Δεν υπάρχει λόγος ενεργοποίησης αυτής της ρύθμισης εάν δεν επιτρέπονται συνδέσεις επισκεπτών.</p>';
$string['check_google_error'] = 'Η πρόσβαση στις μηχανές αναζήτησης επιτρέπεται παρόλο που δεν επιτρέπεται η σύνδεση επισκεπτών.';
$string['check_google_info'] = 'Οι μηχανές αναζήτησης μπορούν να συνδέονται σαν επισκέπτες.';
$string['check_google_name'] = 'Open to Google';
$string['check_google_ok'] = 'Η πρόσβαση στις μηχανές αναζήτησης δεν επιτρέπεται.';
$string['check_guestrole_details'] = '<p>Ο ρόλος επισκέπτη χρησιμοποιείται για επισκέπτες, μη συνδεδεμένους χρήστες και προσωρινή πρόσβαση επισκέπτη σε μαθήματα. Παρακαλούμε εξασφαλίστε οτι δεν επιτρέπονται ριψοκίνδυνες ικανότητες για αυτό το ρόλο.</p>
<p>Ο μόνος απαρχαιωμένος τύπος για ρόλο επισκέπτη είναι ο <em>Επισκέπτης</em>.</p>';
$string['check_guestrole_error'] = 'Ο ρόλος επισκέπτη "{$a}" δεν είναι σωστά ορισμένος!';
$string['check_guestrole_name'] = 'Ρόλος Επισκέπτη';
$string['check_guestrole_notset'] = 'Ο ρόλος Επισκέπτης δεν έχει ρυθμιστεί.';
$string['check_guestrole_ok'] = 'Ο ορισμός του ρόλου Επισκέπτη είναι εντάξει.';
$string['check_mediafilterswf_details'] = '<p>Η αυτόματη ενσωματωση αρχείων swf σε σελίδες είναι πολύ επικίνδυνη - οποιοσδήποτε εγγεγραμμένος χρήστης μπορεί να ξεκινήσει μια επίθεση XSS εναντίον χρηστών άλλου εξυπηρετητή. Παρακαλούμε απενεργοποιήστε το σε εξυπηρετητές παραγωγής.</p>';
$string['check_mediafilterswf_error'] = 'Το φίλτρο πολυμέσων Flash είναι ενεργοποιημένο - αυτό είναι πολύ επικίνδυνο για τη πλειονότητα των εξυπηρετητών.';
$string['check_mediafilterswf_name'] = 'Το φίλτρο πολυμέσων .swf είναι ενεργοποιημένο';
$string['check_mediafilterswf_ok'] = 'Το φίλτρο πολυμέσων Flash δεν είναι ενεργοποιημένο.';
$string['check_noauth_details'] = '<p>Η υπομονάδα λογισμικού <em>Χωρίς Πιστοποίηση</em> δεν προορίζεται για ιστοχώρους παραγωγής. Παρακαλούμε απενεργοποιήστε το εκτός και εάν αυτός είναι ένας δοκιμαστικός ιστοχώρος.</p>';
$string['check_noauth_error'] = 'Η υπομονάδα λογισμικού Χωρίς Πιστοποίηση δεν μπορεί να χρησιμοποιείται σε ιστοχώρους παραγωγής.';
$string['check_noauth_name'] = 'Χωρίς Πιστοποίηση';
$string['check_noauth_ok'] = 'Η υπομονάδα λογισμικού Χωρίς Πιστοποίηση είναι απεργοποιημένη.';
$string['check_openprofiles_details'] = '<p>Τα ανοιχτά προφίλ χρηστών μπορούν να γίνουν αντικείμενο εκμετάλευσης από κακόβουλους χρήστες. Συνίσταται να ενεργοποιείτε τη ρύθμιση <code>Υποχρεώτική σύνδεση χρηστών για προφίλ</code> ή τη ρύθμιση <code>Υποχρεωτική σύνδεση χρηστών</code>.</p>';
$string['check_openprofiles_error'] = 'Οποιοσδήποτε μπορεί να δει τα προφίλ των χρηστών χωρίς να χρειάζεται να συνδεθεί.';
$string['check_openprofiles_name'] = 'Ανοιχτά προφίλ χρηστών';
$string['check_openprofiles_ok'] = 'Απαιτείται είσοδος για την εμφάνιση των προφίλ των χρηστών.';
$string['check_passwordpolicy_details'] = '<p>Συνίσταται να οριστεί μια πολιτική για τα συνθηματικά, καθότι το μάντεμα των συνθηματικών είναι πολύ συχνά ο πιο εύκολος τρόπος για να αποκτήσει κάποιος μη εξουσιοδοτημένη πρόσβαση.
Παρόλα αυτά μη κάνετε τις απαιτήσεις πολυ αυστηρές, καθώς αυτό μπορεί να οδηγήσει σε καταστάσεις όπου οι χρήστες δεν μπορούν να θυμηθούν το συνθηματικό τους και ή τα ξεχνάνε ή τα σημειώνουν κάπου.</p>';
$string['check_passwordpolicy_error'] = 'Δεν έχει οριστεί πολιτική ασφαλείας για τα συνθηματικά.';
$string['check_passwordpolicy_name'] = 'Πολιτική ασφαλείας συνθηματικών';
$string['check_passwordpolicy_ok'] = 'Η πολιτική ασφαλείας συνθηματικών έχει ενεργοποιηθεί.';
$string['check_riskadmin_detailsok'] = '<p>Παρακαλούμε επιβεβαιώστε την ακόλουθη λίστα από διαχειριστές συστήματος:</p>{$a}';
$string['check_riskadmin_detailswarning'] = '<p>Παρακαλούμε επιβεβαιώστε την ακόλουθη λίστα από διαχειριστές συστήματος:</p>{$a->admins}
<p>Συνίσταται να αναθέτετε το ρόλο του διαχειριστή στο πλαίσιο του συστήματος μόνο. Οι ακόλουθοι χρήστες έχουν μη υποστηριζόμενες αναθέσεις ρόλου διαχειριστή:</p>{$a->unsupported}';
$string['check_riskadmin_name'] = 'Διαχειριστές';
$string['check_riskadmin_ok'] = 'Βρέθηκαν {$a} διαχειριστές συστήματος.';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) επισκόπηση ανάθεσης ρόλου</a>';
$string['check_riskadmin_warning'] = 'Βρέθηκαν {$a->admincount} διαχειριστές συστήματος και {$a->unsupcount} μη υποστηριζόμενες αναθέσεις ρόλου διαχειριστή.';
$string['check_riskxss_details'] = '<p>Το RISK_XSS υποδηλώνει όλες τις επικίνδυνες ικανότητες που μόνο οι έμπιστοι χρήστες μπορούν να χρησιμοποιήσουν.</p>
<p>Παρακαλούμε επιβεβαιώστε την ακόλουθη λίστα από χρήστες και εξασφαλίστε οτι τους εμπιστέυεστε εντελώς σε αυτόν τον εξυπηρετητή:</p><p>{$a}</p>';
$string['check_riskxss_name'] = 'Χρήστες εμπιστοσύνης XSS';
$string['check_riskxss_warning'] = 'RISK_XSS - βρέθηκαν {$a} χρήστες που πρέπει να είναι εμπιστοσύνης.';
$string['check_unsecuredataroot_details'] = '<p>Ο αρχικός κατάλογος των δεδομένων (dataroot) δεν πρέπει να είναι προσβάσιμος μέσω του ιστού. Ο καλύτερος τρόπος για να εξασφαλίσετε οτι ο κατάλογος δεν είναι προσβάσιμος είναι να χρησιμοποιήσετε έναν κατάλογο εκτός του προσβάσιμου μέσω ιστού δημόσιου καταλόγου .</p>
<p>Εάν μετακινήσετε τον κατάλογο, θα πρέπει να ενημερώσετε κατάλληλα την ρύθμιση <code>$CFG->dataroot</code> στο αρχείο <code>config.php</code>.</p>';
$string['check_unsecuredataroot_error'] = 'Ο αρχικός κατάλογος των δεδομένων (dataroot) <code>{$a}</code> είναι σε λάθος τοποθεσία και είναι εκτεθιμένος μέσω πρόσβασης ιστού!';
$string['check_unsecuredataroot_name'] = 'Μη ασφαλής αρχικός κατάλογος δεδομένων (dataroot)';
$string['check_unsecuredataroot_ok'] = 'Ο αρχικός κατάλογος των δεδομένων (dataroot) δεν πρέπει να είναι προσβάσιμος μέσω του ιστού.';
$string['check_unsecuredataroot_warning'] = 'Ο αρχικός κατάλογος των δεδομένων (dataroot) <code>{$a}</code> είναι σε λάθος τοποθεσία και είναι πιθανώς εκτεθιμένος μέσω πρόσβασης ιστού.';
$string['configuration'] = 'Ρύθμιση';
$string['description'] = 'Περιγραφή';
$string['details'] = 'Λεπτομέρειες';
$string['issue'] = 'Θέμα';
$string['pluginname'] = 'Επισκόπηση ασφάλειας';
$string['security:view'] = 'Εμφάνιση αναφοράς ασφάλειας';
$string['status'] = 'Κατάσταση';
$string['statuscritical'] = 'Κρίσιμη';
$string['statusinfo'] = 'Πληροφορία';
$string['statusok'] = 'Εντάξει';
$string['statusserious'] = 'Σοβαρή';
$string['statuswarning'] = 'Προειδοποίηση';
$string['timewarning'] = 'Η επεξεργασία των δεδομένων μπορεί να πάρει αρκετή ώρα, παρακαλούμε να είστε υπομονετικοί...';
