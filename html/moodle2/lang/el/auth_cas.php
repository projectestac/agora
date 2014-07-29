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
 * Strings for component 'auth_cas', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'CAS users';
$string['accesNOCAS'] = 'other users';
$string['auth_cas_auth_user_create'] = 'Create users externally';
$string['auth_cas_baseuri'] = 'URI του διακομιστή (τίποτα αν δεν υπάρχει baseURI)<br />Για παράδειγμα, εάν ο διακομιστής CAS απαντάει στο host.domaine.fr/CAS/ τότε <br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'Base URI';
$string['auth_cas_broken_password'] = 'You cannot proceed without changing your password, however there is no available page for changing it. Please contact your Moodle Administrator.';
$string['auth_cas_cantconnect'] = 'LDAP part of CAS-module cannot connect to server: {$a}';
$string['auth_cas_casversion'] = 'Version';
$string['auth_cas_changepasswordurl'] = 'Password-change URL';
$string['auth_cas_create_user'] = 'Ενεργοποιήστε το εάν επιθυμείτε να εισάγετε CAS- πιστοποιημένους χρήστες στην βάση δεδομένων του Moodle. Εάν όχι, τότε μόνο οι χρήστες που είναι ήδη στην βάση μπορούν να εισέλθουν.';
$string['auth_cas_create_user_key'] = 'Create user';
$string['auth_casdescription'] = 'Αυτή η μέθοδο χρησιμοποιεί ένα διακομιστή CAS (Central Authentication Service) για την πιστοποίηση των χρηστών σε ένα Single Sign On περιβάλλον(SSO). Μπορείτε επίσης να χρησιμοποιήσετε απλή LDAP πιστοποίηση. Εάν τα δοθέντα όνομα χρήστη και κωδικός είναι έγκυρα σύμφωνα με το CAS, το Moodle δημιουργεί καινούργια εγγραφή για τον χρήστη στην βάση δεδομένων, λαμβάνοντας χαρακτηριστικά του χρήστη από τον LDAP αν χρειαστεί. Στις επόμενες εισόδους μόνο το όνομα χρήστη και ο κωδικός ελέγχονται.';
$string['auth_cas_enabled'] = 'Ενεργοποιήστε το εάν θέλετε CAS- πιστοποίηση';
$string['auth_cas_hostname'] = 'Hostname του CAS διακομιστή <br />πχ: host.domain.fr';
$string['auth_cas_hostname_key'] = 'Hostname';
$string['auth_cas_invalidcaslogin'] = 'Συγνώμη, η είσοδος απέτυχε, δεν πιστοποιήθηκε η ταυτότητά σας';
$string['auth_cas_language'] = 'Επιλεγμένη γλώσσα';
$string['auth_cas_language_key'] = 'Language';
$string['auth_cas_logincas'] = 'Πρόσβαση ασφαλούς σύνδεσης';
$string['auth_cas_logoutcas'] = 'Turn this to \'yes\' if tou want to logout from CAS when you deconnect from Moodle';
$string['auth_cas_logoutcas_key'] = 'Logout CAS';
$string['auth_cas_multiauth'] = 'Turn this to \'yes\' if you want to have multi-authentication (CAS + other authentication)';
$string['auth_cas_multiauth_key'] = 'Multi-authentication';
$string['auth_casnotinstalled'] = 'Cannot use CAS authentication. The PHP LDAP module is not installed.';
$string['auth_cas_port'] = 'Θύρα του διακομιστή CAS';
$string['auth_cas_port_key'] = 'Port';
$string['auth_cas_proxycas'] = 'Turn this to \'yes\' if you use CASin proxy-mode';
$string['auth_cas_proxycas_key'] = 'Proxy mode';
$string['auth_cas_server_settings'] = 'Ρύθμιση του CAS Server';
$string['auth_cas_text'] = 'Ασφαλή σύνδεση';
$string['auth_cas_use_cas'] = 'Use CAS';
$string['auth_cas_version'] = 'Έκδοση του CAS server';
$string['CASform'] = 'Authentication choice';
$string['pluginname'] = 'Χρησιμοποίησε έναν διακομιστή CAS';
