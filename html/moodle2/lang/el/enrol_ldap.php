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
 * Strings for component 'enrol_ldap', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Μαθήματα μπορούν να δημιουργούνται αυτόματα εάν υπάρχουν εγγραφές σε ένα μάθημα το οποίο δεν υπάρχει ακόμα στο Moodle.';
$string['autocreation_settings'] = 'Ρυθμίσεις αυτόματης δημιουργίας μαθημάτων';
$string['bind_dn'] = 'Εάν θέλετε να χρησιμοποιήσετε το bind-user για αναζήτηση χρηστών, ορίστε το εδώ. Κάτι σαν \'cn=ldapuser,ou=public,o=org\'';
$string['bind_pw'] = 'Κωδικός για το bind-user.';
$string['bind_pw_key'] = 'Κωδικός πρόσβασης';
$string['category'] = 'Η κατηγορία για αυτόματα δημιουργημένα μαθήματα.';
$string['category_key'] = 'Κατηγορία';
$string['contexts'] = 'πλαίσια LDAP';
$string['course_fullname'] = 'Προαιρετικό: Πεδίο LDAP για ανάκτηση του πλήρες ονόματος.';
$string['course_idnumber'] = 'Αντιστοίχιση στο μοναδικό αναγνωριστικό στον LDAP, συνήθως <em>cn</em> ή <em>uid</em>. Προτείνεται να κλειδώσετε την τιμή εάν χρησιμοποιείτε αυτόματη δημιουργία μαθημάτων.';
$string['course_settings'] = 'Ρυθμίσεις εγγραφής σε μάθημα';
$string['course_shortname'] = 'Προαιρετικό: Το πεδίο LDAP για τη λήψη του σύντομου ονόματος.';
$string['course_summary'] = 'Προαιρετικό: Το πεδίο LDAP για τη λήψη της περίληψης.';
$string['editlock'] = 'Κλείδωμα τιμής';
$string['enrolname'] = 'LDAP';
$string['general_options'] = 'Γενικές επιλογές';
$string['host_url'] = 'Ορίστε τον κεντρικό υπολογιστή LDAP host σε μορφή URL όπως \'ldap://ldap.myorg.com/\'
ή \'ldaps://ldap.myorg.com/\'';
$string['ldap:manage'] = 'Διαχείριση περιπτώσεων LDAP εγγραφής';
$string['memberattribute'] = 'Χαρακτηριστικό μέλους LDAP';
$string['objectclass'] = 'objectClass που χρησιμοποιείται για την αναζήτηση μαθημάτων. Συνήθως \'posixGroup\'.';
$string['ok'] = 'OK!';
$string['phpldap_noextension'] = '<em>Η PHP LDAP ενότητα φαίνεται να μην υπάρχει. Παρακαλώ βεβαιωθείτε ότι έχει εγκατασταθεί και ενεργοποιηθεί αν θέλετε να χρησιμοποιήσετε αυτό το πρόσθετο εγγραφής.</em>';
$string['pluginname'] = 'LDAP εγγραφές';
$string['pluginname_desc'] = '<p>Μπορείτε να χρησιμοποιήσετε τον εξυπηρετητή server για να ελέγξετε τις εγγραφές σας. Θεωρείται πως το LDAP δέντρο σας περιέχει ομάδες που αντιστοιχούν σε μαθήματα και πως κάθε ομάδα/μάθημα θα έχει εγγραφές συνδρομής για να αντιστοιχίσει στους φοιτητές.</p>
<p>Θεωρείται ότι τα μαθήματα ορίζονται ως ομάδες στον LDAP, με κάθε ομάδα να έχει πολλαπλά πεδία συνδρομής (<em>member</em> ή <em>memberUid</em>) τα οποία περιέχουν ένα μοναδικό αναγνωριστικό για κάθε χρήστη.</p>
<p>Για την χρήση εγγραφής LDAP, οι χρήστες σας <strong>πρέπει</strong> να έχουν ένα έγκυρο πεδίο idnumber. Οι ομάδες LDAP πρέπει να έχουν αυτό το idnumber στα πεδία των μελών για να εγγραφεί ένας χρήστης στο μάθημα. Αυτό δουλεύει καλά εάν χρησιμοποιείτε LDAP πιστοποίηση ήδη.</p>
<p>Οι εγγραφές ενημερώνονται όταν ο χρήστης εισέλθει. Μπορείτε να εκτελέσετε και ένα σενάριο για να συγχρονίζονται οι εγγραφές. Δείτε στο <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p> Αυτό το plugin μπορεί να οριστεί ώστε να δημιουργεί νέα μαθήματα αυτόματα όταν εμφανίζονται νέες ομάδες στον LDAP.</p>';
$string['roles'] = 'Αντιστοίχηση ρόλων';
$string['server_settings'] = 'Ρυθμίσεις εξυπηρετητή LDAP';
$string['template'] = 'Προαιρετικό: μαθήματα που δημιουργούνται αυτόματα μπορούν να αντιγράψουν τις ρυθμίσεις τους από πρότυπο μάθημα.';
$string['updatelocal'] = 'Ενημέρωσε τα τοπικά δεδομένα';
$string['version'] = 'Η έκδοση του LDAP πρωτοκόλλου που χρησιμοποιεί ο εξυπηρετητής.';
