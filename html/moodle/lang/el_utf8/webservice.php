<?php // [normalized strings file]

$string['amfdebug'] = 'Κατάσταση αποσφαλμάτωσης διακομιστή AMF';
$string['debugdisplayon'] = 'Η ρύθμιση "Εμφάνιση μηνυμάτων αποσφαλμάτωσης" είναι ενεργοποιημένη. Ο διακομιστής XMLRPC δεν θα λειτουργεί. Ενδεχομένως και άλλοι διακομιστές να εμφανίζουν προβλήματα. <br/>Ενημερώστε το διαχειριστή της πλατφόρμας για να αλλάξει τη ρύθμιση αυτή.';
$string['fail'] = 'ΑΠΟΤΥΧΙΑ';
$string['functionlist'] = 'λίστα λειτουργιών διακομιστή';
$string['moodlepath'] = 'Κατάλογος Moodle';
$string['ok'] = 'OK';
$string['protocolenable'] = 'Ενεργοποίηση πρωτοκόλλου $a[0]';
$string['soapdocumentation'] = '<H2>Οδηγός χρήσης SOAP</H2>
        <b>1.</b> Καλέστε τη μέθοδο <b>tmp_get_token</b> στο <i>http://remotemoodle/webservice/soap/server.php?wsdl</i>.<br>
        Η παράμετρος της μεθόδου είναι πίνακας. Στην PHP θα έχει τη μορφή array("username" => "wsuser", "password" => "wspassword").<br>
        Η επιστρεφόμενη τιμή είναι ακέραιος αριθμός (integer).<br>
        <br>
        <b>2.</b> Στη συνέχεια καλέστε μια μέθοδο της υπηρεσίας διαδικτύου στο <i>http://remotemoodle/webservice/soap/server.php?token=the_received_token&classpath=the_moodle_path&wsdl</i>.<br>
        Όλες οι μέθοδοι έχουν μόνο μία παράμετρο η οποία είναι πίνακας.<br>
        <br>
        Παράδειγμα σε PHP για τη συγκεκριμένη λειτουργία:<br>
        Κατάλογος Moodle: <b>user</b><br>
        <b>tmp_delete_user</b>( string username , integer mnethostid )<br>
        Θα καλέσετε κάτι σαν το παρακάτω:<br>
        your_client->tmp_delete_user(array("username" => "username_to_delete", "mnethostid" => 1))<br><br>
';
$string['webservicesenable'] = 'Ενεργοποίηση υπηρεσιών διαδικτύου';
$string['wspagetitle'] = 'Τεκμηρίωση υπηρεσιών διαδικτύου';
$string['wsuserreminder'] = 'Υπενθύμιση: ο διαχειριστής αυτής της εγκατάστασης του Moodle πρέπει πρώτα να σας εκχωρήσει τη δυνατότητα moodle/site:usewebservices.';
$string['xmlrpcdocumentation'] = '<H2>Οδηγός χρήσης XMLRPC</H2>
        <b>1.</b> Καλέστε τη μέθοδο <b>authentication.tmp_get_token</b> στο <i>http://remotemoodle/webservice/xmlrpc/server.php</i>.<br>
        Η παράμετρος της μεθόδου είναι πίνακας. Στην PHP θα έχει τη μορφή array("username" => "wsuser", "password" => "wspassword").<br>
        Η επιστρεφόμενη τιμή είναι ακέραιος αριθμός (integer).<br>
        <br>
        <b>2.</b> Στη συνέχεια καλέστε μια μέθοδο της υπηρεσίας διαδικτύου στο <i>http://remotemoodle/webservice/xmlrpc/server.php?classpath=the_moodle_path&token=the_received_token</i>.<br>
        Όλες οι μέθοδοι έχουν μόνο μία παράμετρο η οποία είναι πίνακας.<br>
        <br>
        Παράδειγμα σε PHP για τη συγκεκριμένη λειτουργία:<br>
        Κατάλογος Moodle: <b>user</b><br>
        <b>tmp_delete_user</b>( string username , integer mnethostid )<br>
        Θα καλέσετε κάτι σαν το παρακάτω:<br>
        your_client->call("user.tmp_delete_user", array(array("username" => "username_to_delete", "mnethostid" => 1)))<br>
';

?>