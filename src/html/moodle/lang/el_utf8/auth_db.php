<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_dbcantconnect'] = 'Could not connect to the specified authentication database...';
$string['auth_dbchangepasswordurl_key'] = 'Password-change URL';
$string['auth_dbdebugauthdb'] = 'Debug ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Debug ADOdb connection to external database - use when getting empty page during login. Not suitable for production sites.';
$string['auth_dbdeleteuser'] = 'Deleted user $a[0] id $a[1]';
$string['auth_dbdeleteusererror'] = 'Error deleting user $a';
$string['auth_dbdescription'] = 'Αυτή η μέθοδος χρησιμοποιεί έναν εξωτερικό πίνακα βάσης δεδομένων για να ελέγξει εάν τα δοσμένα όνομα χρήστη και κωδικός πρόσβασης ισχύουν.  Εάν ο λογαριασμός είναι καινούργιος, τότε οι πληροφορίες από άλλα πεδία μπορούν επίσης να αντιγραφούν στο ΠΗΛΕΑΣ.';
$string['auth_dbextencoding'] = 'External db encoding';
$string['auth_dbextencodinghelp'] = 'Encoding used in external database';
$string['auth_dbextrafields'] = 'Αυτά τα πεδία είναι προαιρετικά. Υπάρχει η επιλογή να προ-συμπληρώσετε μερικά πεδία χρηστών του ΠΗΛΕΑΣ χρησιμοποιώντας πληροφορίες από την <Β> εξωτερική βάση δεδομένων</b> που διευκρινίζετε εδώ. <p> Εάν τα αφήσετε κενά, τότε θα χρησιμοποιηθούν τα προκαθορισμένα στοιχεία.<p> Σε κάθε περίπτωση, ο χρήστης θα μπορεί να παρέμβει σε όλα αυτά τα πεδία μετά την σύνδεση.';
$string['auth_dbfieldpass'] = 'Όνομα πεδίου που περιέχει τους κωδικούς πρόσβασης';
$string['auth_dbfieldpass_key'] = 'Password field';
$string['auth_dbfielduser'] = 'Όνομα πεδίου που περιέχει τα ονόματα χρηστών';
$string['auth_dbfielduser_key'] = 'Username field';
$string['auth_dbhost'] = 'Ο υπολογιστής που φιλοξενεί τον εξυπηρετητή βάσης δεδομένων';
$string['auth_dbhost_key'] = 'Host';
$string['auth_dbinsertuser'] = 'Inserted user $a[0] id $a[1]';
$string['auth_dbinsertusererror'] = 'Error inserting user $a';
$string['auth_dbname'] = 'Όνομα της βάσης δεδομένων';
$string['auth_dbname_key'] = 'DB Name';
$string['auth_dbpass'] = 'Κωδικός πρόσβασης που αντιστοιχεί στο παραπάνω όνομα χρήστη';
$string['auth_dbpass_key'] = 'Password';
$string['auth_dbpasstype'] = '<p>Διευκρινήστε τη μορφή που χρησιμοποιείται από το πεδίο του κωδικού πρόσβασης. Η κρυπτογράφηση MD5 είναι χρήσιμη για σύνδεση με άλλες κοινές διαδικτυακές εφαρμογές όπως η PostNuke.</p> <p>Χρησιμοποιήστε \'εσωτερικά\' εάν θέλετε η εξωτερική βάση δεδομένων να χειρίζεται ονόματα χρηστών και διευθύνσεις email, αλλά το ΠΗΛΕΑΣ να χειρίζεται τα συνθηματικά. Εάν χρησιμοποιήσετε το \'εσωτερικά\',<i>πρέπει</i> να παρέχετε ένα κατηλλειμένο πεδίο διεύθυνσης email στην εξωτερική βάση δεδομένων και πρέπει να εκτελείτε το  admin/cron.php συχνά. Το ΠΗΛΕΑΣ στέλνει ένα email με προσωρινό κωδικό στους νέους χρήστες.</p>';
$string['auth_dbpasstype_key'] = 'Password format';
$string['auth_dbreviveduser'] = 'Revived user $a[0] id $a[1]';
$string['auth_dbrevivedusererror'] = 'Error reviving user $a';
$string['auth_dbsetupsql'] = 'SQL setup command';
$string['auth_dbsetupsqlhelp'] = 'SQL command for special database setup, often used to setup communication encoding - example for MySQL and PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'Suspended user $a[0] id $a[1]';
$string['auth_dbsuspendusererror'] = 'Error suspending user $a';
$string['auth_dbsybasequoting'] = 'Use sybase quotes';
$string['auth_dbsybasequotinghelp'] = 'Sybase style single quote escaping - needed for Oracle, MS SQL and some other databases. Do not use for MySQL!';
$string['auth_dbtable'] = 'Όνομα του πίνακα στη βάση δεδομένων.';
$string['auth_dbtable_key'] = 'Table';
$string['auth_dbtitle'] = 'Χρήση μιας εξωτερικής βάσης δεδομένων.';
$string['auth_dbtype'] = 'Ο τύπος της βάσης δεδομένων (Δείτε την <A HREF=../lib/adodb/readme.htm#drivers>τεκμηρίωση ADOdb</A> για λεπτομέρειες)';
$string['auth_dbtype_key'] = 'Database';
$string['auth_dbupdatinguser'] = 'Updating user $a[0] id $a[1]';
$string['auth_dbuser'] = 'Όνομα χρήστη με δικαίωμα ανάγνωσης της βάσης δεδομένων.';
$string['auth_dbuser_key'] = 'DB User';
$string['auth_dbusernotexist'] = 'Cannot update non-existent user: $a';
$string['auth_dbuserstoadd'] = 'User entries to add: $a';
$string['auth_dbuserstoremove'] = 'User entries to remove: $a';