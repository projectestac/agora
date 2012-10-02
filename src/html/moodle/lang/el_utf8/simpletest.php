<?php // [normalized strings file]

$string['addconfigprefix'] = 'Προσθήκη προθέματος στο αρχείο ρυθμίσεων';
$string['all'] = 'ΟΛΑ';
$string['confignonwritable'] = 'Το αρχείο config.php δεν είναι εγγράψιμο από το διακομιστή. Παρακαλώ τροποποιήστε τις άδειες πρόσβασης σ\' αυτό ή τροποποιήστε το ο ίδιος προσθέτοντας την παρακάτω γραμμή πριν το τελικό PHP tag: <br />
\\$CFG->unittestprefix = \'tst_\' // Αλλάξτε το tst_ σε ένα πρόθεμα της αρεσκείας σας, διαφορετικό από το \\$CFG->prefix';
$string['deletingnoninsertedrecord'] = 'Προσπάθεια διαγραφής εγγραφής που δεν προστέθηκε από αυτά τα τεστ (id $a->id στον πίνακα $a->table).';
$string['deletingnoninsertedrecords'] = 'Προσπάθεια διαγραφής εγγραφής που δεν προστέθηκε από αυτά τα τεστ (στον πίνακα $a->table).';
$string['droptesttables'] = 'Διαγραφή πινάκων ελέγχων';
$string['exception'] = 'Εξαίρεση';
$string['fail'] = 'Αποτυχία';
$string['ignorefile'] = 'Αγνόησε τους έλεγχους στο αρχείο';
$string['ignorethisfile'] = 'Επανεκτέλεσε τους έλεγχους αγνοώντας αυτό το αρχείο ελέγχων';
$string['installtesttables'] = 'Εγκατάσταση πινάκων ελέγχων';
$string['moodleunittests'] = 'Ελέγχοι μονάδων Moodle: $a';
$string['notice'] = 'Σημείωση';
$string['onlytest'] = 'Εκτέλεση τεστ μόνο στο';
$string['pass'] = 'Επιτυχία';
$string['pathdoesnotexist'] = 'Το μονοπάτι \'$a\' δεν υπάρχει.';
$string['prefix'] = 'Πρόθεμα πινάκων ελέγχων μονάδων';
$string['prefixnotset'] = 'Το πρόθεμα των πινάκων ελέγχων μονάδας στη βάση δεδομένων δεν έχει καθοριστεί. Συμπληρώστε την παρακάτω φόρμα για να προστεθεί η ρύθμιση στο αρχείο config.php.';
$string['reinstalltesttables'] = 'Επανεγκατάσταση πινάκων ελέγχων';
$string['retest'] = 'Επανεκτέλεση των ελέγχων';
$string['retestonlythisfile'] = 'Επανεκτέλεση μόνο αυτού του αρχείου ελέγχων';
$string['runall'] = 'Εκτέλεση των ελέγχων από όλα τα αρχεία ελέγχων';
$string['runat'] = 'Εκτέλεσηε στις $a';
$string['runonlyfile'] = 'Εκτέλεση μόνο των ελέγχων σε αυτό το αρχείο';
$string['runonlyfolder'] = 'Εκτέλεση μόνο των ελέγχων σε αυτό το φάκελο';
$string['runtests'] = 'Εκτέλεση ελέγχων';
$string['rununittests'] = 'Εκτέλεση των ελέγχων μονάδων';
$string['showpasses'] = 'Εμφάνιση επιτυχιών και αποτυχιών.';
$string['showsearch'] = 'Εμφάνιση της αναζήτησης για τεστ αρχεία.';
$string['stacktrace'] = 'Ίχνος στοίβας:';
$string['summary'] = '{$a->run}/{$a->total} έλεγχοι ολοκληρώθηκαν: <strong>{$a->passes}</strong> επιτυχίες, <strong>{$a->fails}</strong> αποτυχίες και <strong>{$a->exceptions}</strong> εξαιρέσεις.';
$string['tablesnotsetup'] = 'Οι πίνακες των ελέγχων μονάδων δεν έχουν δημιουργηθεί ακόμα. Θέλετε να τους δημιουργήσετε τώρα;';
$string['testdboperations'] = 'Έλεγχος διαδικασιών βάσης δεδομένων';
$string['testtablescsvfileunwritable'] = 'Το CSV αρχείο των ελέγχων ($a->filename) δεν είναι εγγράψιμο';
$string['testtablesneedupgrade'] = 'Οι πίνακες των ελέγχων μονάδων πρέπει να ενημερωθούν. Θέλετε να τους ενημερώσετε τώρα;';
$string['testtablesok'] = 'Οι πίνακες των ελέγχων μονάδων δημιουργήθηκαν επιτυχώς.';
$string['thorough'] = 'Εκτέλεση λεπτομερούς ελέγχου (ίσως καθυστερήσει)';
$string['uncaughtexception'] = 'Εξαίρεση που δεν αντιμετωπίστηκε [{$a->getMessage()}] στο [{$a->getFile()}:{$a->getLine()}] ΑΚΥΡΩΣΗ ΤΕΣΤ.';
$string['unittestprefixsetting'] = 'Πρόθεμα ελέγχων μονάδων: <strong>$a->unittestprefix</strong> (Τροποποιήστε το config.php για να το αλλάξετε).';
$string['unittests'] = 'Έλεγχοι μονάδων';
$string['updatingnoninsertedrecord'] = 'Προσπάθεια ενημέρωσης εγγραφής που δεν εισήχθηκε από αυτούς τους ελέγχους μονάδων(id $a->id στον πίνακα $a->table).';
$string['version'] = 'Γίνεται χρήση του <a href="http://sourceforge.net/projects/simpletest/">SimpleTest</a> έκδοση $a.';

?>