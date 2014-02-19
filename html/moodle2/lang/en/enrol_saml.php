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
 * Strings for component 'enrol_saml', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_saml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Assignrole';
$string['defaultperiod'] = 'Default enrolment period';
$string['defaultperiod_desc'] = 'Default length of the default enrolment period setting (in seconds).';
$string['enrolledincourserole'] = 'Enrolled in "{$a->course}" as "{$a->role}"';
$string['enrolusers'] = 'Enrol users';
$string['error_instance_creation'] = 'Exists an inactive instance of this SAML plugin for this course "{$a}", activate it instead create new one';
$string['pluginname'] = 'SAML enrolments';
$string['pluginname_desc'] = 'The saml enrolments plugin allows users to be auto-enrolled when login';
$string['saml:config'] = 'Configure saml enrol instances';
$string['saml:enrol'] = 'Enrol users';
$string['saml:manage'] = 'Manage user enrolments';
$string['saml:unenrol'] = 'Unenrol users from the course';
$string['saml:unenrolself'] = 'Unenrol self from the course';
$string['status'] = 'Enable saml enrolments';
$string['status_desc'] = 'Allow course access of internally enrolled users. This should be kept enabled in most cases.';
$string['statusdisabled'] = 'Disabled';
$string['statusenabled'] = 'Enabled';
$string['status_help'] = 'This setting determines whether users can be auto-enrolled via saml login.';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';
$string['unenroluser'] = 'Do you really want to unenrol "{$a->user}" from course "{$a->course}"?';
$string['unenrolusers'] = 'Unenrol users';
$string['wscannotenrol'] = 'SAML plugin instance cannot enrol a user in the course id = {$a->courseid}';
$string['wsnoinstance'] = 'SAML enrolment plugin instance doesn\'t exist or is disabled for the course (id = {$a->courseid})';
$string['wsusercannotassign'] = 'You don\'t have the permission to assign this role ({$a->roleid}) to this user ({$a->userid}) in this course({$a->courseid}).';
