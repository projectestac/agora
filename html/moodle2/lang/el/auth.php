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
 * Strings for component 'auth', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Active authentication plugins';
$string['alternatelogin'] = 'Όποια διεύθυνση πληκτρολογήσετε θα χρησιμοποιηθεί σαν σελίδα σύνδεσης. Η σελίδα αυτή, θα πρέπει να έχει μία φόρμα με την ιδιότητα <strong>\'{$a}\'</strong> και τα πεδία <strong>username</strong>, <strong>password</strong>.';
$string['alternateloginurl'] = 'Εναλλακτική σελίδα σύνδεσης';
$string['auth_changepasswordhelp'] = 'Βοήθεια αλλαγήςκωδικού';
$string['auth_changepasswordhelp_expl'] = 'Εμφάνιση της βοήθειας απολεσθέντος κωδικού στους χρήστες που έχασαν τον {$a} κωδικό τους. Αυτό θα εμφανιστεί μαζί με ή αντί του <strong>URL αλλαγής κωδικού</strong> ή άλλαγή κωδικού εσωτερικά του ΠΗΛΕΑΣ';
$string['auth_changepasswordurl'] = 'URL αλλαγής κωδικού';
$string['auth_changepasswordurl_expl'] = 'Προσδιορίστε το URL που θα αποστέλλεται στους χρήστες που έχει χάσει τον {$a} κωδικό τους. Ορίστε την <strong>Χρήση της κανονικής σελίδας αλλαγής κωδικού</strong> σε <strong>Όχι</strong>.';
$string['auth_changingemailaddress'] = 'You have requested a change of email address, from {$a->oldemail} to {$a->newemail}. For security reasons, we are sending you an email message at the new address to confirm that it belongs to you. Your email address will be updated as soon as you open the URL sent to you in that message.';
$string['auth_common_settings'] = 'Κοινές ρυθμίσεις';
$string['auth_data_mapping'] = 'Χαρτογράφηση δεδομένων';
$string['authenticationoptions'] = 'Επιλογές πιστοποίησης';
$string['auth_fieldlock'] = 'Κλείδωμα τιμής';
$string['auth_fieldlock_expl'] = '<p><b>Κλείδωμα τιμής:</b> Εάν ενεργοποιηθεί, αποτρέπει χρήστες του ΠΗΛΕΑΣ και διαχειριστές να επεξεργαστούν το πεδίο άμεσα. Χρησιμοποιήστε την επιλογή αυτή εάν διατηρείτε τα δεδομένα σε εξωτερικό σύστημα πιστοποίησης.  </p>';
$string['auth_fieldlocks'] = 'Κλειδωμα πεδίων χρήστη';
$string['auth_fieldlocks_help'] = '<p>Έχετε τη δυνατότητα να κλειδώσετε κάποια από τα πεδία που χρησιμοποιούνται στην φόρμα εγγραφής των χρηστών. Μ\' αυτόν τον τρόπο, γίνεται πιο εύκολη η συντήρηση του site στην περίπτωση που ο διαχειριστής επεξεργάζεται χειροκίνητα τα στοιχεία των χρηστών.';
$string['authinstructions'] = 'Εδώ μπορείτε να παρέχετε τις οδηγίες για τους χρήστες σας, έτσι ώστε να ξέρουν ποιο όνομα χρήστη και κωδικό πρόσβασης πρέπει να χρησιμοποιούν.  Το κείμενο που εισάγετε εδώ θα εμφανιστεί στη σελίδα σύνδεσης.  Εάν το αφήσετε  κενό, τότε καμία οδηγία δεν θα τυπωθεί.';
$string['auth_invalidnewemailkey'] = 'Error: if you are trying to confirm a change of email address, you may have made a mistake in copying the URL we sent you by email. Please copy the address and try again.';
$string['auth_multiplehosts'] = 'Πολλαπλοί hosts ή διευθύνσεις μπορούν να προσδιοριστούν (πχ host1.com;host2.com;host3.com) ή (πχ xxx.xxx.xxx.xxx;xxx.xxx.xxx.xxx)';
$string['auth_outofnewemailupdateattempts'] = 'You have run out of allowed attempts to update your email address. Your update request has been cancelled.';
$string['auth_passwordisexpired'] = 'Το συνθηματικό σας έχει λήξει. Θέλετε να αλλάξετε το συνθηματικό σας τώρα;';
$string['auth_passwordwillexpire'] = 'Το συνθηματικό σας θα λήξει σε {$a} ημέρες. Θέλετε να αλλάξετε το συνθηματικό σας τώρα;';
$string['auth_remove_delete'] = 'Full delete internal';
$string['auth_remove_keep'] = 'Keep internal';
$string['auth_remove_suspend'] = 'Suspend internal';
$string['auth_remove_user'] = 'Specify what to do with internal user account during mass synchronization when user was removed from external source. Only suspended users are automatically revived if they reappear in ext source.';
$string['auth_remove_user_key'] = 'Removed ext user';
$string['auth_sync_script'] = 'Cron synchronization script';
$string['auth_updatelocal'] = 'Τοπική ενημέρωση';
$string['auth_updatelocal_expl'] = '<p><b>Τοπική ενημέρωση:</b> Εάν ενεργοποιηθεί, το πεδίο θα ενημερώνεται (από εξωτερική πιστοποίηση) κάθε φορά που ο χρήστης εισέρχεται ή γίνεται συγχρονισμός χρηστών. Τα πεδία που ορίστηκαν να ενημερώνονται αυτόματα πρέπει να είναι κλειδωμένα.</p>';
$string['auth_updateremote'] = 'Ενημέρωσε εξωτερικά';
$string['auth_updateremote_expl'] = '<p><b>Ενημέρωσε εξωτερικά:</b> Εάν ενεργοποιηθεί, η εξωτερική πιστοποίηση θα ενημερώνεται κάθε φορά που η εγγραφή του χρήστη ενημερώνεται. Τα πεδία να είναι ξεκλείδωτα για να επιτρέπεται η επεξεργασία. </p>';
$string['auth_updateremote_ldap'] = '<p><b>Σημείωση:</b> Η ενημέρωση εξωτερικών LDAP δεδομένων απαιτεί να ορίσετε τα binddn και bindpw σε έναν bind-user με επιπλέον προνόμια σε όλες τις εγγραφές των χρηστών.  Επί του παρόντος δεν διατηρεί χαρακτηριστικά με πολλαπλές τιμές και αφαιρεί πλεονάζουσες τιμές κατά την ενημέρωση. </p>';
$string['auth_user_create'] = 'Να επιτρέπεται η δημιουργία χρηστών';
$string['auth_user_creation'] = 'Νέοι (ανώνυμοι) χρήστες μπορούν να δημιουργήσουν λογαριασμούς χρηστών στο εξωτερικό σημείο πιστοποίησης και να τους επιβεβαιώσουν μέσω ηλεκτρονικού ταχυδρομείου. Αν το ενεργοποιήσετε αυτό, θυμηθείτε επίσης να επεξεργαστείτε τις επιλογές κάθε συγκεκριμένης ενότητας για τη δημιουργία χρηστών.';
$string['auth_usernameexists'] = 'Αυτό το όνομα χρήστη υπάρχει ήδη. Παρακαλώ επιλέξτε άλλο.';
$string['auto_add_remote_users'] = 'Auto add remote users';
$string['changepassword'] = 'Αλλαγή κωδικού πρόσβασης URL';
$string['changepasswordhelp'] = 'Εδώ μπορείτε να διευκρινίσετε μια θέση στην οποία οι χρήστες σας μπορούν να ανακτήσουν ή να αλλάξουν το όνομα χρήστη/τον κωδικό πρόσβασής τους εάν τα έχουν ξεχάσει.  Αυτό θα παρέχεται στους χρήστες ως σύνδεσμος στη σελίδα σύνδεσης και τη σελίδα χρηστών τους.  Εάν το αφήσετε κενό, ο σύνδεσμος δεν θα τυπωθεί.';
$string['chooseauthmethod'] = 'Επιλέξτε μέθοδο πιστοποίησης';
$string['chooseauthmethod_help'] = '<p align="center"><b>Αλλαγή μεθόδου πιστοποίησης </b></p>

<p>Με αυτό το μενού είναι εφικτή η αλλαγή της μεθόδου πιστοποίησης του χρήστη.</p>

<p>Οι αλλαγές να γίνονται με προσοχή.</p>';
$string['createpasswordifneeded'] = 'Δημιουργία κωδικού πρόσβασης αν χρειαστεί';
$string['emailchangecancel'] = 'Cancel email change';
$string['emailchangepending'] = 'Change pending. Open the link sent to you at {$a->preference_newemail}.';
$string['emailnowexists'] = 'The email address you tried to assign to your profile has been assigned to someone else since your original request. Your request for change of email address is hereby cancelled, but you may try again with a different address.';
$string['emailupdate'] = 'Email address update';
$string['emailupdatemessage'] = 'Dear {$a->fullname},

You have requested a change of your email address for your user account at {$a->site}. Please open the following URL in your browser in order to confirm this change.

{$a->url}';
$string['emailupdatesuccess'] = 'Email address of user <em>{$a->fullname}</em> was successfully updated to <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Confirmation of email update at {$a->site}';
$string['enterthenumbersyouhear'] = 'Enter the numbers you hear';
$string['enterthewordsabove'] = 'Enter the words above';
$string['errormaxconsecutiveidentchars'] = 'Passwords must have at most {$a} consecutive identical characters.';
$string['errorminpassworddigits'] = 'Passwords must have at least {$a} digit(s).';
$string['errorminpasswordlength'] = 'Passwords must be at least {$a} characters long.';
$string['errorminpasswordlower'] = 'Passwords must have at least {$a} lower case letter(s).';
$string['errorminpasswordnonalphanum'] = 'Passwords must have at least {$a} non-alphanumeric character(s).';
$string['errorminpasswordupper'] = 'Passwords must have at least {$a} upper case letter(s).';
$string['errorpasswordupdate'] = 'Error updating password, password not changed';
$string['forcechangepassword'] = 'Υποχρεωτική αλλαγή κωδικού πρόσβασης';
$string['forcechangepasswordfirst_help'] = 'Επιβεβλημένη αλλαγή του κωδικού πρόσβασης των χρηστών την πρώτη φορά που θα εισέλθουν στο ΠΗΚΕΑΣ';
$string['forcechangepassword_help'] = 'Επιβεβλημένη αλλαγή του κωδικού πρόσβασης των χρηστών την επόμενη φορά που θα εισέλθουν στο ΠΗΚΕΑΣ';
$string['forgottenpassword'] = 'If you enter a URL here, it will be used as the lost password recovery page for this site. This is intended for sites where passwords are handled entirely outside of Moodle. Leave this blank to use the default password recovery.';
$string['forgottenpasswordurl'] = 'Forgotten password URL';
$string['getanaudiocaptcha'] = 'Get an audio CAPTCHA';
$string['getanimagecaptcha'] = 'Get an image CAPTCHA';
$string['getanothercaptcha'] = 'Get another CAPTCHA';
$string['guestloginbutton'] = 'Σύνδεσμος για την σύνδεση ως καλεσμένος';
$string['incorrectpleasetryagain'] = 'Incorrect. Please try again.';
$string['infilefield'] = 'Απαιτούμενο πεδίο στο αρχείο';
$string['instructions'] = 'Οδηγίες';
$string['internal'] = 'Εσωτερικό';
$string['locked'] = 'Κλειδωμένο';
$string['md5'] = 'MD5 κρυπτογράφηση';
$string['nopasswordchange'] = 'Password can not be changed';
$string['nopasswordchangeforced'] = 'You cannot proceed without changing your password, however there is no available page for changing it. Please contact your Moodle Administrator.';
$string['ntlmsso_attempting'] = 'Attempting Single Sign On via NTLM...';
$string['ntlmsso_failed'] = 'Auto-login failed, try the normal login page...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO is disabled.';
$string['passwordhandling'] = 'Χειρισμός του πεδίου κωδικού';
$string['plaintext'] = 'Απλό κείμενο';
$string['pluginnotenabled'] = 'Authentication plugin \'{$a}\' is not enabled.';
$string['pluginnotinstalled'] = 'Authentication plugin \'{$a}\' is not installed.';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = '<h2>Περιγραφή</h2>
<p>Το CAPTCHA είναι ένα πρόγραμα που μπορεί να αποφασίσει εάν κάποιος χρήστης είναι ανθρωπος ή υπολογιστής. Τα CAPTCHA χρησιμοποιούνται από πολλούς ιστοχώρους για να αποτρέψουν την κατάχρηση από "bot," ή αυτοματοποιημένα προγράμματα συνήθως γραμμένα για να δημιουργούν spam. Κανένα πρόγραμμα υπολογιστή δεν μοπρεί να διαβάσει στρεβλωμένο κείμενο τόσο καλά όσο οι άνθρωποι,  οπότε οι τα bot δεν μπορούν να προσπελάσουν ιστοχώρους που προστατεύονται από CAPTCHA.</p>

<h2>Οδηγίες</h2>
<p>Παρκααλώ καταχωρήστε τις λέξεις που βλέπετε στο πλαίσιο σε σειρά και χωρισμένες από ένα κενό χαρακτήρα. Κάτι τέτοιο αποτρέπει αυτοματοποιημένα προγράμματα από το να καταχραστούν αυτήν την υπηρεσία.</p>

<p>Εάν δεν είστε σίγουροι ποιες είναι οι λέξεις τότε είτε εισαγάγετε την καλύτερή σας εικασία ή ακολουθήστε το σύνδεσμο "Φέρε άλλο CAPTCHA". </p>

<p>Άτομα με προβλήματα όρασης μπορούν να ακολουθήσουν το σύνδεσμο "Φέρε ένα ηχητικό CAPTCHA" ώστε να ακούσουν ένα σετ από ψηφία που μπορούν να εισαχθούν αντί της οπτικής πρόκλησης.</p>';
$string['selfregistration'] = 'Self registration';
$string['selfregistration_help'] = 'If an authentication plugin, such as email-based self-registration, is selected, then it enables potential users to register themselves and create accounts. This results in the possibility of spammers creating accounts in order to use forum posts, blog entries etc. for spam. To avoid this risk, self-registration should be disabled or limited by <em>Allowed email domains</em> setting.';
$string['sha1'] = 'SHA-1 hash';
$string['showguestlogin'] = 'Μπορείτε να αποκρύψετε ή να εμφανίσετε το σύνδεσμο στη σελίδα σύνδεσης';
$string['stdchangepassword'] = 'Χρήση standard σελίδας αλλαγής κωδικού';
$string['stdchangepassword_expl'] = 'Εάν το εξωτερικό σύστημα πιστοποίησης επιτρέπει αλλαγές στο κωδικό πρόσβασης μεσα στο ΠΗΛΕΑΣ, ρυθμίστε το σε Ναι. Αυτή η ρύθμιση υπερβαίνει το \'URL αλλαγής κωδικού\'.';
$string['stdchangepassword_explldap'] = 'Σημείωση: Δεν προτείνεται να χρησιμοποιήσετε LDAP πάνω από ένα SSL κρυπτογραφημένο τούνελ (ldaps://) εάν ο LDAP server είναι απομακρυσμένος.';
$string['unlocked'] = 'Ξεκλειδωμένο';
$string['unlockedifempty'] = 'Ξεκλειδωμένο άν είναι άδειο';
$string['update_never'] = 'Ποτέ';
$string['update_oncreate'] = 'Στην δημιουργία';
$string['update_onlogin'] = 'Σε κάθε είσοδο';
$string['update_onupdate'] = 'Στην ανανέωση';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() does not support selected usertype: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() does not support selected usertype (..yet)';
