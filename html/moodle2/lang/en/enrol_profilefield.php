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
 * Strings for component 'enrol_profilefield', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_profilefield
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Assign role';
$string['badprofile'] = 'You may be disapointed, but your profile information forbids you enrolling in this course. However, if you have a good reason to be here, please contact an administrator who will alter your profile consequently.';
$string['course'] = 'Course : $a';
$string['defaultnotification'] = 'Dear <%%TEACHER%%>,

the new user <%%USERNAME%%> has enrolled himself (profile agreed) in your course <%%COURSE%%>.

You can check his profile <a href="<%%URL%%>">here</a> after loggin in.';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can be enrolled until this date only.';
$string['enrolenddaterror'] = 'Enrolment end date cannot be earlier than start date';
$string['enrolme'] = 'Enrol me in the course';
$string['enrolmentconfirmation'] = 'Be welcome. Your profile information allows you to enroll in this course. Proceed ?';
$string['enrolname'] = 'Profile Field Enrolment';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_desc'] = 'Default length of time that the enrolment is valid (in seconds). If set to zero, the enrolment duration will be unlimited by default.';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user is enrolled. If disabled, the enrolment duration will be unlimited.';
$string['enrol/profilefield:unenrolself'] = 'Can unenrol self from course';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can be enrolled from this date onward only.';
$string['grouppassword'] = 'Password to enter a group, if it is known.';
$string['newcourseenrol'] = 'A new participant has enrolled in course {$a}';
$string['nonexistantprofilefielderror'] = 'This field is not defined in user profile extensions';
$string['notificationtext'] = 'Notification template';
$string['notificationtext_help'] = 'The content of the mail can be written here, using &lt;%%USERNAME%%&gt;, &lt;%%COURSE%%&gt;, &lt;%%URL%%&gt; and &lt;%%TEACHER%%&gt; placeholders. Note that any multilanguage span tag will be processed based on the actual language of the recipient.';
$string['notifymanagers'] = 'Notify managers?';
$string['pluginname'] = 'Profile Field Enrolment';
$string['pluginname_desc'] = 'This method allows direct enrolment in course if user has a profile field set to the expected value';
$string['profilefield'] = 'User profile field';
$string['profilefield:config'] = 'Can configure the enrolment instance';
$string['profilefield_desc'] = 'A pointer to a custom user field';
$string['profilefield:enrol'] = 'Can enrol using profile field method';
$string['profilefield:manage'] = 'Can manage enrolments on profile fields';
$string['profilefield:unenrol'] = 'Can unenrol people enrolled on profile fields';
$string['profilefield:unenrolself'] = 'Can unenrol self when enrolled on profile fields';
$string['profilevalue'] = 'Expected value';
$string['profilevalue_desc'] = '';
$string['status'] = 'Allow using profile to enrol';
$string['unenrolself'] = 'Unenroll from course "{$a}"?';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';
