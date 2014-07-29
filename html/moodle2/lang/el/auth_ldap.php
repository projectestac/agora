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
 * Strings for component 'auth_ldap', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'Cannot create the new account in Active Directory. Make sure you meet all the requirements for this to work (LDAPS connection, bind user with adequate rights, etc.)';
$string['auth_ldap_attrcreators'] = 'List of groups or contexts whose members are allowed to create attributes. Separate multiple groups with \';\'. Usually something like \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_attrcreators_key'] = 'Attribute creators';
$string['auth_ldap_auth_user_create_key'] = 'Create users externally';
$string['auth_ldap_bind_dn'] = 'Εάν θέλετε να χρησιμοποιήσετε την υπηρεσία bind-user για να αναζητήσετε χρήστες, διευκρινήστε το εδώ. Κάτι όπως \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Distinguished Name';
$string['auth_ldap_bind_pw'] = 'Κωδικός πρόσβασης για bind-user.';
$string['auth_ldap_bind_pw_key'] = 'Password';
$string['auth_ldap_bind_settings'] = 'Ρυθμίσεις bind';
$string['auth_ldap_changepasswordurl_key'] = 'Password-change URL';
$string['auth_ldap_contexts'] = 'Λίστα πλαισίων όπου οι χρήστες είναι τοποθετημένοι. Χωρίστε διαφορετικά πλαίσια με \';\'.Για παράδειγμα:\'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'Contexts';
$string['auth_ldap_create_context'] = 'Αν ενεργοποιήσετε τη δημιουγία χρηστών με επιβεβαίωση μέσω ηλεκτρονικού ταχυδρομείου τότε καθορίστε το πλαίσιο στο οποίο θα δημιουργηθούν οι χρήστες. Αυτό θα πρέπει να είναι διαφορετικό από ότι άλλων χρηστών για να αποφευχθούν προβλήματα ασφαλείας. Δεν χρειάζεται να προσθέσετε αυτή την τιμή στη μεταβλητή ldap_context, το Moodle θα αναζητήσει χρήστες αυτού του πλαισίου αυτόματα.';
$string['auth_ldap_create_context_key'] = 'Context for new users';
$string['auth_ldap_create_error'] = 'Error creating user in LDAP.';
$string['auth_ldap_creators'] = 'Κατάλογος ομάδων των οποίων τα μέλη επιτρέπεται να δημιουργήσουν νέα μαθήματα. Οι ομάδες διαχωρίζονται με \';\'. Συνήθως κάτι σαν \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_creators_key'] = 'Creators';
$string['auth_ldapdescription'] = 'Αυτή η μέθοδος παρέχει πιστοποίηση έναντι σε έναν εξωτερικό LDAP server. Εάν το δοσμένο όνομα χρήστη και ο κωδικός πρόσβασης ισχύουν, το Moodle δημιουργεί μια νέα καταχώρηση χρήστη στη βάση δεδομένων του. Αυτή η ενότητα μπορεί να διαβάσει τις ιδιότητες χρηστών από τον LDAP και να συμπληρώσει εκ των προτέρων τα ζητούμενα πεδία στο Moodle. Για τις επόμενες συνδέσεις μόνο το όνομα χρήστη και ο κωδικός πρόσβασης ελέγχονται.';
$string['auth_ldap_expiration_desc'] = 'Επιλέξτε Όχι για να απενεργοποιήσετε τον έλεγχο ληγμένου κωδικού ή LDAP για να διαβάσετε την τιμή του passwordexpirationtime απευθείας από τον LDAP.';
$string['auth_ldap_expiration_key'] = 'Expiration';
$string['auth_ldap_expiration_warning_desc'] = 'Πλήθος ημερών πριν εμφανιστεί προειδοποίηση λήξης του κωδικού πρόσβασης.';
$string['auth_ldap_expiration_warning_key'] = 'Expiration warning';
$string['auth_ldap_expireattr_desc'] = 'Προαιρετικό: παρακάμπτει την ldap-attribute η οποία αποθηκεύει το passwordExpirationTime';
$string['auth_ldap_expireattr_key'] = 'Expiration attribute';
$string['auth_ldapextrafields'] = 'Αυτά τα πεδία είναι προαιρετικά. Μπορείτε να επιλέξετε να συμπληρώσετε εκ των προτέρων μερικά πεδία χρηστών του Moodle με τις πληροφορίες από < B>LDAP πεδία</B > που διευκρινίζετε εδώ. <p>Εάν αφήσετε τα πεδία αυτά κενά, τίποτα δεν θα μεταφερθεί από τον LDAP και τα προκαθορισμένα στοιχεία (default) Moodle θα χρησιμοποιηθούν αντ\' αυτών.<p>Σε κάθε περίπτωση, ο χρήστης θα είναι σε θέση να παρέμβει σε όλα αυτά τα πεδία μετά τη σύνδεση.';
$string['auth_ldap_graceattr_desc'] = 'Προαιρετικό: παρακάμπτει την gracelogin';
$string['auth_ldap_gracelogin_key'] = 'Grace login attribute';
$string['auth_ldap_gracelogins_desc'] = 'Ενεργοποίηση της υποστήριξης gracelogin του LDAP. Αφού λήξει ο κωδικός πρόσβασης ο χρήστης μπορεί να εισέλθει μέχρι το gracelogin να φθάσει το 0. Ενεργοποιώντας αυτήν τη ρύθμιση θα εμφανίζεται ένα μήνυμα grace login εάν ο κωδικός πρόσβασης έχει λήξει.';
$string['auth_ldap_gracelogins_key'] = 'Grace logins';
$string['auth_ldap_groupecreators'] = 'List of groups or contexts whose members are allowed to create groups. Separate multiple groups with \';\'. Usually something like \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_groupecreators_key'] = 'Group creators';
$string['auth_ldap_host_url'] = 'Διευκρινίστε τον LDAP server σε url-μορφή όπως "ldap://ldap.myorg.com/" ή \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_host_url_key'] = 'Host URL';
$string['auth_ldap_ldap_encoding'] = 'Specify encoding used by LDAP server. Most probably utf-8, MS AD v2 uses default platform encoding such as cp1252, cp1250, etc.';
$string['auth_ldap_ldap_encoding_key'] = 'LDAP encoding';
$string['auth_ldap_login_settings'] = 'Ρυθμίσεις εισόδου';
$string['auth_ldap_memberattribute'] = 'Καθορίστε τις ιδιότητες των μελών χρηστών που ορίζουν πότε ένας χρήστης ανήκει σε ένα group. Συνήθως \'member\'';
$string['auth_ldap_memberattribute_isdn'] = 'Optional: Overrides handling of member attribute values, either 0 or 1';
$string['auth_ldap_memberattribute_isdn_key'] = 'Member attribute uses dn';
$string['auth_ldap_memberattribute_key'] = 'Member attribute';
$string['auth_ldap_noconnect'] = 'LDAP-module cannot connect to server: {$a}';
$string['auth_ldap_noconnect_all'] = 'LDAP-module cannot connect to any servers: {$a}';
$string['auth_ldap_noextension'] = 'Warning: The PHP LDAP module does not seem to be present. Please ensure it is installed and enabled.';
$string['auth_ldap_no_mbstring'] = 'You need the mbstring extension to create users in Active Directory.';
$string['auth_ldapnotinstalled'] = 'Cannot use LDAP authentication. The PHP LDAP module is not installed.';
$string['auth_ldap_objectclass'] = 'Προαιρετικό: Υπερβαίνει την objectClass  η οποία χρησιμοποιείται για την ονομασία/αναζήτηση χρηστών στον ldap_user_type. Συνήθως δεν χρειάζεται να το αλλάξετε αυτό.';
$string['auth_ldap_objectclass_key'] = 'Object class';
$string['auth_ldap_opt_deref'] = 'Καθορίζει πως γίνεται χειρισμός των aliases κατά την αναζήτηση. Επιλέξτε μία από τις παρακάτω τιμές: "Όχι" (LDAP_DEREF_NEVER) ή "Ναι" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Dereference aliases';
$string['auth_ldap_passtype'] = 'Specify the format of new or changed passwords in LDAP server.';
$string['auth_ldap_passtype_key'] = 'Password format';
$string['auth_ldap_passwdexpire_settings'] = 'Ρυθμίσεις λήξης του κωδικού LDAP';
$string['auth_ldap_preventpassindb'] = 'Επιλέξτε ναι για να αποτρέψετε την αποθήκευση κωδικών πρόσβασης στην βάση δεδομένων του Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Hide passwords';
$string['auth_ldap_search_sub'] = 'Βάλτε τις τιμές <> 0 εάν θέλετε να αναζητήσετε χρήστες από τα υπο-περιεχόμενα.';
$string['auth_ldap_search_sub_key'] = 'Search subcontexts';
$string['auth_ldap_server_settings'] = 'Ρυθμίσεις διακομιστή LDAP';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() does not support selected usertype: {$a} (..yet)';
$string['auth_ldap_update_userinfo'] = 'Ενημερώστε τις πληροφορίες χρήστη (όνομα, επώνυμο, διεύθυνση...) από το LDAP στο Moodle. Δείτε την σελίδα /auth/ldap/attr_mappings.php για πληροφορίες χαρτογράφησης.';
$string['auth_ldap_user_attribute'] = 'Το χαρακτηριστικό που χρησιμοποιείται για την ονομασία/αναζήτηση χρηστών. Συνήθως \'cn\'.';
$string['auth_ldap_user_attribute_key'] = 'User attribute';
$string['auth_ldap_user_exists'] = 'LDAP username already exists.';
$string['auth_ldap_user_settings'] = 'Ρυθμίσεις αναζήτησης χρηστών';
$string['auth_ldap_user_type'] = 'Επιλέξτε πως θα αποθηκεύονται οι χρήστες στον LDAP. Αυτή η ρύθμιση διευκρινίζει την λειτουργία της λήξης της εισόδου, της δημιουργίας χρηστών και των grace logins.';
$string['auth_ldap_user_type_key'] = 'User type';
$string['auth_ldap_usertypeundefined'] = 'config.user_type not defined or function ldap_expirationtime2unix does not support selected type!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type not defined or function ldap_unixi2expirationtime does not support selected type!';
$string['auth_ldap_version'] = 'Η έκδοση του πρωτοκόλλου LDAP που χρησιμοποιεί ο server';
$string['auth_ldap_version_key'] = 'Version';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Set to yes to attempt Single Sign On with the NTLM domain. <strong>Note:</strong> this requires additional setup on the webserver to work, see <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Enable';
$string['auth_ntlmsso_ie_fastpath'] = 'Set to yes to enable the NTLM SSO fast path (bypasses certain steps and only works if the client\'s browser is MS Internet Explorer).';
$string['auth_ntlmsso_ie_fastpath_key'] = 'MS IE fast path?';
$string['auth_ntlmsso_subnet'] = 'If set, it will only attempt SSO with clients in this subnet. Format: xxx.xxx.xxx.xxx/bitmask';
$string['auth_ntlmsso_subnet_key'] = 'Subnet';
$string['noemail'] = 'Tried to send you an email but failed!';
$string['ntlmsso_attempting'] = 'Attempting Single Sign On via NTLM...';
$string['ntlmsso_failed'] = 'Auto-login failed, try the normal login page...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO is disabled.';
$string['pluginname'] = 'Χρήση LDAP server.';
