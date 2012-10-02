<?php // [normalized strings file]

$string['description'] = 'Αυτή η μέθοδος ελέγχει και επεξεργάζεται επανειλημμένως ένα ειδικά-μορφοποιημένο αρχείο κειμένου στην τοποθεσία που ορίζετε. Αυτό το αρχείο είναι ένα αρχείο διαχωρισμένο με κόμματα που θεωρείται ότι έχει τέσσερα ή έξι πεδία ανά γραμμή:
<pre>
* operation, role, idnumber(user), idnumber(course) [, starttime, endtime]
όπου:
* operation = add | del
* role = student | teacher | teacheredit
* idnumber(user) = idnumber στον πίνακα χρηστών NB όχι id
* idnumber(course) = idnumber στον πίνακα μαθημάτων NB όχι id
* starttime = χρόνος αρχής (σε δευτερόλεπτα από το epoch) - προαιρετικό
* endtime = χρόνος λήξης (σε δευτερόλεπτα από το epoch) - προαιρετικό
</pre>
Μπορεί να μοιάζει κάπως έτσι:
<pre>
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
$string['enrolname'] = 'Απλό αρχείο';
$string['filelockedmail'] = 'Το αρχείο κειμένου που χρησιμοποιείτε για εγγραφές βασισμένες σε αρχεία ($a) δεν μπορεί να διαγραφεί από την διαδικασία cron. Αυτό συνήθως σημαίνει ότι τα δικαιώματα σε αυτήν είναι λάθος. Παρακαλώ διορθώστε τα δικαιώματα ώστε το ΠΗΛΕΑΣ να διαγράψει το αρχείο αυτό, ειδάλλως ίσως να εκτελείται επανειλημμένα.';
$string['filelockedmailsubject'] = 'Σημαντικό σφάλμα: Αρχείο εγγραφής';
$string['location'] = 'Τοποθεσία αρχείου';
$string['mailadmin'] = 'Ειδοποίηση διαχειριστή μέσω ηλεκτρονικού ταχυδρομείου';
$string['mailusers'] = 'Ειδοποίηση χρηστών μέσω ηλεκτρονικού ταχυδρομείου';

?>