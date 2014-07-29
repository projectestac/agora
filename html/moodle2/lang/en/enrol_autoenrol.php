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
 * Strings for component 'enrol_autoenrol', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   enrol_autoenrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alwaysenrol'] = 'Always Enrol';
$string['alwaysenrol_help'] = 'When set to Yes the plugins will always enrol users, even if they already have access to the course through another method.';
$string['auto'] = 'Auto';
$string['auto_desc'] = 'This group has been automatically created by the Auto Enrol plugin. It will be deleted if you remove the Auto Enrol plugin from the course.';
$string['autoenrol:config'] = 'Configure automatic enrolments';
$string['autoenrol:method'] = 'User can enrol users onto a course at login';
$string['autoenrol:unenrol'] = 'User can unenrol autoenrolled users';
$string['autoenrol:unenrolself'] = 'User can unenrol themselves if they are being enrolled on access';
$string['config'] = 'Configuration';
$string['countlimit'] = 'Limit';
$string['countlimit_help'] = 'This instance will count the number of enrolments it makes on a course and can stop enrolling users once it reaches a certain level. The default setting of 0 means unlimited.';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during automatic enrolments';
$string['filter'] = 'Allow Only';
$string['filter_help'] = 'When a group focus is selected you can use this field to filter which type of user you wish to enrol onto the course. For example, if you grouped by authentication and filtered with "manual" only users who have registered directly with your site would be enrolled.';
$string['filtering'] = 'User Filtering';
$string['g_auth'] = 'Auth Method';
$string['g_dept'] = 'Department';
$string['g_email'] = 'Email Address';
$string['general'] = 'General';
$string['g_inst'] = 'Institution';
$string['g_lang'] = 'Language';
$string['g_none'] = 'Select...';
$string['groupon'] = 'Group By';
$string['groupon_help'] = 'AutoEnrol can automatically add users to a group when they are enrolled based upon one of these user fields.';
$string['instancename'] = 'Custom Label';
$string['instancename_help'] = 'You can add a custom label to make it clear what this enrolment method does. This option is most useful when there are multiple instances of AutoEnrol on one course.';
$string['m_course'] = 'Loading the Course';
$string['method'] = 'Enrol When';
$string['method_help'] = 'Power users can use this setting to change the plugin\'s behaviour so that users are enrolled to the course upon logging in rather than waiting for them to access the course. This is helpful for courses which should be visible on a users "my courses" list by default.';
$string['m_site'] = 'Logging into Site';
$string['pluginname'] = 'Auto Enrol';
$string['pluginname_desc'] = 'The automatic enrolment module allows an option for logged in users to be automatically granted entry to a course and enrolled. This is similar to allowing guest access but the students will be permanently enrolled and therefore able to participate in forum and activities within the area.';
$string['role'] = 'Role';
$string['role_help'] = 'Power users can use this setting to change the permission level at which users are enrolled.';
$string['softmatch'] = 'Soft Match';
$string['softmatch_help'] = 'When enabled AutoEnrol will enrol a user when they partially match the "Allow Only" value instead of requiring an exact match. Soft matches are also case-insensitive. The value of "Filter By" will be used for the group name.';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"? You can revisit the course to be reenrolled but information such as grades and assignment submissions may be lost.';
$string['warning'] = 'Caution!';
$string['warning_message'] = 'Adding this plugin to your course will allow any registered Moodle users access to your course. Only install this plugin if you want to allow open access to your course for users who have logged in.';
