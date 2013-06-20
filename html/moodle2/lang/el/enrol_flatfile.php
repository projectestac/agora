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
 * Strings for component 'enrol_flatfile', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filelockedmail'] = 'Το αρχείο κειμένου που χρησιμοποιείτε για εγγραφές βασισμένες σε αρχεία ({$a}) δεν μπορεί να διαγραφεί από την διαδικασία cron. Αυτό συνήθως σημαίνει ότι τα δικαιώματα σε αυτήν είναι λάθος. Παρακαλώ διορθώστε τα δικαιώματα ώστε το ΠΗΛΕΑΣ να διαγράψει το αρχείο αυτό, ειδάλλως ίσως να εκτελείται επανειλημμένα.';
$string['filelockedmailsubject'] = 'Σημαντικό σφάλμα: Αρχείο εγγραφής';
$string['location'] = 'Τοποθεσία αρχείου';
$string['mailadmin'] = 'Ειδοποίηση διαχειριστή μέσω ηλεκτρονικού ταχυδρομείου';
$string['mailstudents'] = 'Ειδοποίηση μαθητών μέσω ηλεκτρονικού ταχυδρομείου';
$string['mailteachers'] = 'Ειδοποίηση καθηγητών μέσω ηλεκτρονικού ταχυδρομείου';
$string['mapping'] = 'Χαρτογράφηση επίπεδου αρχείου';
$string['pluginname'] = 'Επίπεδο αρχείο (CSV)';
$string['pluginname_desc'] = 'Αυτή η μέθοδος θα ελέγχει κατ\' επανάληψη και θα επεξεργάζεται ένα ειδικά διαμορφωμένο αρχείο κειμένου στην τοποθεσία που έχετε ορίσει. Το αρχείο είναι ένα αρχείο διαχωρισμένο με κόμμτα που θεωρητικά έχει τέσσερα ή έξι πεδία ανα γραμμή:<pre class="informationbox"> * operation, role, idnumber(user), idnumber(course) [, starttime, endtime] where: * operation = add | del * role = student | teacher | teacheredit * idnumber(user) = idnumber in the user table NB not id * idnumber(course) = idnumber in the course table NB not id * starttime = start time (in seconds since epoch) - optional * endtime = end time (in seconds since epoch) - optional </pre> It could look something like this: <pre class="informationbox"> add, student, 5, CF101 add, teacher, 6, CF101 add, teacheredit, 7, CF101 del, student, 8, CF101 del, student, 17, CF101 add, student, 21, CF101, 1091115000, 1091215000 </pre>';
