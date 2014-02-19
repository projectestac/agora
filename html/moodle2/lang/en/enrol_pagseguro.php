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
 * Strings for component 'enrol_pagseguro', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_pagseguro
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Assign role';
$string['businessemail'] = 'PagSeguro business email';
$string['businessemail_desc'] = 'The email address of your business PagSeguro account';
$string['businesstoken'] = 'PagSeguro business token';
$string['businesstoken_desc'] = 'The token of your business PagSeguro account';
$string['cost'] = 'Enrol cost';
$string['costerror'] = 'The enrolment cost is not numeric';
$string['costorkey'] = 'Please choose one of the following methods of enrolment.';
$string['currency'] = 'Currency';
$string['currency_desc'] = 'Brazil currency : Brazilian Real';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during PagSeguro enrolments';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can be enrolled until this date only.';
$string['enrolenddaterror'] = 'Enrolment end date cannot be earlier than start date';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_desc'] = 'Default length of time that the enrolment is valid (in seconds). If set to zero, the enrolment duration will be unlimited by default.';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user is enrolled. If disabled, the enrolment duration will be unlimited.';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can be enrolled from this date onward only.';
$string['mailadmins'] = 'Notify admin';
$string['mailstudents'] = 'Notify students';
$string['mailteachers'] = 'Notify teachers';
$string['messageprovider:pagseguro_enrolment'] = 'PagSeguro enrolment messages';
$string['nocost'] = 'There is no cost associated with enrolling in this course!';
$string['pagseguroaccepted'] = 'PagSeguro payments accepted';
$string['pagseguro:config'] = 'Configure PagSeguro enrol instances';
$string['pagseguro:manage'] = 'Manage enrolled users';
$string['pagseguro:unenrol'] = 'Unenrol users from course';
$string['pagseguro:unenrolself'] = 'Unenrol self from the course';
$string['paymentapiautorizationerror'] = 'Enter your code indicating that the system is having problems, I suggest sending an e-mail telling someone to do the maintenance, it might be useful to send the error codes.';
$string['pluginname'] = 'PagSeguro';
$string['pluginname_desc'] = 'The PagSeguro module allows you to set up paid courses.  If the cost for any course is zero, then students are not asked to pay for entry.  There is a site-wide cost that you set here as a default for the whole site and then a course setting that you can set for each course individually. The course cost overrides the site cost.';
$string['sendpaymentbutton'] = 'Send payment via PagSeguro';
$string['status'] = 'Allow PagSeguro enrolments';
$string['status_desc'] = 'Allow users to use PagSeguro to enrol into a course by default.';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';
