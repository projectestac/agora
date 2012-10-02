<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_shib_auth_method'] = 'Authentication Method Name';
$string['auth_shib_auth_method_description'] = 'Provide a name for the Shibboleth authentication method that is familiar to your users. This could be the name of your Shibboleth federation, e.g. <tt>SWITCHaai Login</tt> or <tt>InCommon Login</tt> or similar.';
$string['auth_shib_changepasswordurl'] = 'Password-change URL';
$string['auth_shib_convert_data'] = 'API τροποποίησης δεδομένων';
$string['auth_shib_convert_data_description'] = 'Μπορείτε να χρησιμοποιήσετε αυτό το API για να τροποποιήσετε επιπλέον τα δεδομένα του Shibboleth. Διαβάστε το <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a> για περισσότερες πληροφορίες.';
$string['auth_shib_convert_data_warning'] = 'Αυτό το αρχείο δεν υπάρχει ή δεν είναι αναγνώσιμο από την διαδικασία του webserver.';
$string['auth_shib_idp_list'] = 'Identity Providers';
$string['auth_shib_idp_list_description'] = 'Provide a list of Identity Provider entityIDs to let the user choose from on the login page.<br />On each line there must be a comma-separated tuple for entityID of the IdP (see the Shibboleth metadata file) and Name of IdP as it shall be displayed in the drop-down list.<br />As an optional third parameter you can add the location of a Shibboleth session initiator that shall be used in case your Moodle installation is part of a multi federation setup.';
$string['auth_shib_instructions'] = 'Χρησιμοποιήστε το <a href=\"$a\">Shibboleth login</a> για πρόσβαση μέσω Shibboleth, εάν το ίδρυμά σας το υποστηρίζει.<br /> Ειδάλλως, χρησιμοποιήστε την κανονική φόρμα εισόδου που εμφανίζεται εδώ.';
$string['auth_shib_instructions_help'] = 'Εδώ πρέπει να παρέχετε οδηγίες στους χρήστες για επεξήγηση του Shibboleth. Θα εμφανίζονται στην σελίδα εισόδου στην ενότητα πληροφοριών. Αυτές οι πληροφορίες πρέπει να περιλαμβάνουν ένα σύνδεσμο προς \"<b>$a</b>\" τον οποίο θα πατάνε οι χρήστες όταν θέλουν να εισέλθουν.';
$string['auth_shib_integrated_wayf'] = 'Moodle WAYF Service';
$string['auth_shib_integrated_wayf_description'] = 'If you check this, Moodle will use its own WAYF service instead of the one configured for Shibboleth. Moodle will display a drop-down list on this alternative login page where the user has to select his Identity Provider.';
$string['auth_shib_logout_return_url'] = 'Alternative logout return URL';
$string['auth_shib_logout_return_url_description'] = 'Provide the URL that Shibboleth users shall be redirected to after logging out.<br />If left empty, users will be redirected to the location that moodle will redirect users to';
$string['auth_shib_logout_url'] = 'Shibboleth Service Provider logout handler URL';
$string['auth_shib_logout_url_description'] = 'Provide the URL to the Shibboleth Service Provider logout handler. This typically is <tt>/Shibboleth.sso/Logout</tt>';
$string['auth_shib_no_organizations_warning'] = 'If you want to use the integrated WAYF service, you must provide a coma-separated list of Identity Provider entityIDs, their names and optionally a session initiator.';
$string['auth_shib_only'] = 'Μόνο Shibboleth';
$string['auth_shib_only_description'] = 'Ενεργοποιήστε αυτήν την ρύθμιση εάν πρέπει να επιβληθεί πιστοποίηση Shibboleth';
$string['auth_shib_username_description'] = 'Όνομα της Shibboleth webserver μεταβλητής περιβάλλοντος που θα χρησιμοποιηθεί ως όνομα χρήστη στο ΠΗΛΕΑΣ.';
$string['auth_shibboleth_contact_administrator'] = 'In case you are not associated with the given organizations and you need access to a course on this server, please contact the';
$string['auth_shibboleth_errormsg'] = 'Please select the organization you are member of!';
$string['auth_shibboleth_login'] = 'Είσοδος Shibboleth';
$string['auth_shibboleth_login_long'] = 'Login to Moodle via Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Χειροκίνητη είσοδος';
$string['auth_shibboleth_select_member'] = 'I\'m a member of ...';
$string['auth_shibboleth_select_organization'] = 'For authentication via Shibboleth, please select your organization from the drop down list:';
$string['auth_shibbolethdescription'] = 'Με αυτήν την μέθοδο οι χρήστες δημιουργούνται και πιστοποιούνται χρησιμοποιώντας <a href=\"http://shibboleth.internet2.edu/\" target=\"_blank\">Shibboleth</a>.<br> Διαβάστε το a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a>  σχετικά με το πως να ρυθμίσετε το ΠΗΛΕΑΣ με το Shibboleth.';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Φαίνεται πως έχετε πιστοποιηθεί με το Shibboleth  αλλά το ΠΗΛΕΑΣ δεν έλαβε κάποια χαρακτηριστικά χρήστη. Παρακαλώ ελέγξτε ότι ο Identity Provider απελευθερώνει τα αναγκαία χαρακτηριστικά ($a) στο Service Provider στον οποίο εκτελείται το ΠΗΛΕΑΣ ή ενημερώστε το διαχειριστή του server αυτού.';
$string['shib_not_all_attributes_error'] = 'Το ΠΗΛΕΑΣ χρειάζεται συγκεκριμένα χαρακτηριστικά του Shibboleth τα οποία δεν είναι παρόντα στην περίπτωσή σας. Τα χαρακτηριστικά είναι: $a<br /> Παρακαλώ ενημερώστε το διαχειριστή του server ή τον Identity Provider σας.';
$string['shib_not_set_up_error'] = 'Η πιστοποίηση Shibboleth δεν έχει εγκατασταθεί σωστά επειδή δεν είναι παρούσες οι μεταβλήτές περιβάλλοντος του Shibboleth για αυτή τη σελίδα. Παρακαλώ κοιτάξτε το <a href=\"README.txt\">README</a> για περισσότερες οδηγίες σχετικά με το πως να εγκαταστήσετε τη Shibboleth πιστοποίηση ή επικοινωνήστε με το διαχειριστή του ΠΗΛΕΑΣ.';