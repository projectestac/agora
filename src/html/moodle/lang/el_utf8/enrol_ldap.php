<?php // [normalized strings file]

$string['description'] = '<p>Μπορείτε να χρησιμοποιήσετε τον εξυπηρετητή server για να ελέγξετε τις εγγραφές σας. Θεωρείται πως το LDAP δέντρο σας περιέχει ομάδες που αντιστοιχούν σε μαθήματα και πως κάθε ομάδα/μάθημα θα έχει εγγραφές συνδρομής για να αντιστοιχίσει στους φοιτητές.</p>
<p>Θεωρείται ότι τα μαθήματα ορίζονται ως ομάδες στον LDAP, με κάθε ομάδα να έχει πολλαπλά πεδία συνδρομής (<em>member</em> ή <em>memberUid</em>) τα οποία περιέχουν ένα μοναδικό αναγνωριστικό για κάθε χρήστη.</p>
<p>Για την χρήση εγγραφής LDAP, οι χρήστες σας <strong>πρέπει</strong> να έχουν ένα έγκυρο πεδίο idnumber. Οι ομάδες LDAP πρέπει να έχουν αυτό το idnumber στα πεδία των μελών για να εγγραφεί ένας χρήστης στο μάθημα. Αυτό δουλεύει καλά εάν χρησιμοποιείτε LDAP πιστοποίηση ήδη.</p> 
<p>Οι εγγραφές ενημερώνονται όταν ο χρήστης εισέλθει. Μπορείτε να εκτελέσετε και ένα σενάριο για να συγχρονίζονται οι εγγραφές. Δείτε στο <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p> Αυτό το plugin μπορεί να οριστεί ώστε να δημιουργεί νέα μαθήματα αυτόματα όταν εμφανίζονται νέες ομάδες στον LDAP.</p>';
$string['enrol_ldap_autocreate'] = 'Μαθήματα μπορούν να δημιουργούνται αυτόματα εάν υπάρχουν εγγραφές σε ένα μάθημα το οποίο δεν υπάρχει ακόμα στο ΠΗΛΕΑΣ.';
$string['enrol_ldap_autocreation_settings'] = 'Ρυθμίσεις αυτόματης δημιουργίας μαθημάτων';
$string['enrol_ldap_bind_dn'] = 'Εάν θέλετε να χρησιμοποιήσετε το bind-user για αναζήτηση χρηστών, ορίστε το εδώ. Κάτι σαν \'cn=ldapuser,ou=public,o=org\'';
$string['enrol_ldap_bind_pw'] = 'Κωδικός για το bind-user.';
$string['enrol_ldap_category'] = 'Η κατηγορία για αυτόματα δημιουργημένα μαθήματα.';
$string['enrol_ldap_contexts'] = 'πλαίσια LDAP';
$string['enrol_ldap_course_fullname'] = 'Προαιρετικό: Πεδίο LDAP για ανάκτηση του πλήρες ονόματος.';
$string['enrol_ldap_course_idnumber'] = 'Αντιστοίχιση στο μοναδικό αναγνωριστικό στον LDAP, συνήθως <em>cn</em> ή <em>uid</em>. Προτείνεται να κλειδώσετε την τιμή εάν χρησιμοποιείτε αυτόματη δημιουργία μαθημάτων.';
$string['enrol_ldap_course_settings'] = 'Ρυθμίσεις εγγραφής σε μάθημα';
$string['enrol_ldap_course_shortname'] = 'Προαιρετικό: Το πεδίο LDAP για τη λήψη του σύντομου ονόματος.';
$string['enrol_ldap_course_summary'] = 'Προαιρετικό: Το πεδίο LDAP για τη λήψη της περίληψης.';
$string['enrol_ldap_editlock'] = 'Κλείδωμα τιμής';
$string['enrol_ldap_general_options'] = 'Γενικές επιλογές';
$string['enrol_ldap_host_url'] = 'Ορίστε τον κεντρικό υπολογιστή LDAP host σε μορφή URL όπως \'ldap://ldap.myorg.com/\' 
ή \'ldaps://ldap.myorg.com/\'';
$string['enrol_ldap_memberattribute'] = 'Χαρακτηριστικό μέλους LDAP';
$string['enrol_ldap_objectclass'] = 'objectClass που χρησιμοποιείται για την αναζήτηση μαθημάτων. Συνήθως \'posixGroup\'.';
$string['enrol_ldap_roles'] = 'Αντιστοίχηση ρόλων';
$string['enrol_ldap_search_sub'] = 'Αναζήτηση συνδρομών ομάδας από το υποπλαίσιο.';
$string['enrol_ldap_server_settings'] = 'Ρυθμίσεις εξυπηρετητή LDAP';
$string['enrol_ldap_student_contexts'] = 'Λίστα πλαισίων όπου βρίσκονται οι ομάδες με διαφορετικές εγγραφές φοιτητών. Διαχωρίστε τα ξεχωριστά πλαίσιο με \';\'. Για παράδειγμα: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_student_memberattribute'] = 'Χαρακτηριστικά μέλους, όταν ο χρήστης ανήκει (είναι εγγεγραμμένος) σε μια ομάδα. Συνήθως \'member\' ή \'memberUid\'.';
$string['enrol_ldap_student_settings'] = 'Ρυθμίσεις εγγραφής φοιτητών';
$string['enrol_ldap_teacher_contexts'] = 'Λίστα από πλαίσια όπου βρίσκονται οι ομάδες των εγγραφών των καθηγητών. Διαχωρίστε τα ξεχωριστά πλαίσιο με \';\'. Για παράδειγμα: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_teacher_memberattribute'] = 'Χαρακτηριστικά μέλους, όταν ο χρήστης ανήκει (είναι εγγεγραμμένος) σε μια ομάδα. Συνήθως \'member\' ή \'memberUid\'.';
$string['enrol_ldap_teacher_settings'] = 'Ρυθμίσεις εγγραφής καθηγητών';
$string['enrol_ldap_template'] = 'Προαιρετικό: μαθήματα που δημιουργούνται αυτόματα μπορούν να αντιγράψουν τις ρυθμίσεις τους από πρότυπο μάθημα.';
$string['enrol_ldap_updatelocal'] = 'Ενημέρωσε τα τοπικά δεδομένα';
$string['enrol_ldap_version'] = 'Η έκδοση του LDAP πρωτοκόλλου που χρησιμοποιεί ο εξυπηρετητής.';
$string['enrolname'] = 'LDAP';

?>