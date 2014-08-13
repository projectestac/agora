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
 * Strings for component 'auth_fc', language 'el', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_fc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_fcchangepasswordurl'] = 'Password-change URL';
$string['auth_fcconnfail'] = 'Connection failed with Errno: {$a}[0] and Error String: {$a}[1]';
$string['auth_fccreators'] = 'Λίστα των ομάδων των οποίων τα μέλη επιτρέπεται να δημιουργήσουν νέα μαθήματα. Διαχωρίστε πολλαπλές ομάδες με \';\'. Τα ονόματα πρέπει είναι γραμμένα όπως στο FirstClass server . Το σύστημα είναι case-sensitive.';
$string['auth_fccreators_key'] = 'Creators';
$string['auth_fcdescription'] = 'Αυτή η μέθοδος χρησιμοποιεί το FirstClass server για να ελέγξει εάν ένα δοσμένο όνομα χρήστη και συνθηματικό είναι έγκυρα.';
$string['auth_fcfppport'] = 'Θύρα server (3333 είναι η περισσότερο σύνηθες)';
$string['auth_fcfppport_key'] = 'Port';
$string['auth_fchost'] = 'Η διεύθυνση του FirstClass server. Χρησιμοποιήστε τον αριθμό IP ή το όνομα DNS.';
$string['auth_fchost_key'] = 'Host';
$string['auth_fcpasswd'] = 'Κωδικός πρόσβασης για τον πιο πάνω λογαριασμό.';
$string['auth_fcpasswd_key'] = 'Password';
$string['auth_fcuserid'] = 'Userid για τον λογαριασμό FirstClass με τα προνόμια ορισμένα ως \'Subadministrator\'';
$string['auth_fcuserid_key'] = 'User ID';
$string['pluginname'] = 'Χρήση ενός FirstClass server';
