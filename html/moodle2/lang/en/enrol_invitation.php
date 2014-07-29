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
 * Strings for component 'enrol_invitation', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   enrol_invitation
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Assign role';
$string['cannotsendmoreinvitationfortoday'] = 'No invitations left for today. Try later.';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during invitation enrolments';
$string['editenrolment'] = 'Edit enrolment';
$string['emailaddressnumber'] = 'Email address {$a}';
$string['emailmessageinvitation'] = '{$a->managername} invited you to join {$a->fullname}.

To join, click the following link: {$a->enrolurl}

You will need to create an account if you don\'t have one yet.

{$a->sitename}
-----------------------------
{$a->siteurl}';
$string['emailmessageuserenrolled'] = '{$a->userfullname} has enrolled in {$a->coursefullname}.

Click the following link to check the new enrolments: {$a->courseenrolledusersurl}

{$a->sitename}
-------------
{$a->siteurl}';
$string['emailssent'] = 'Email(s) have been sent.';
$string['emailtitleinvitation'] = 'You have been invited to join {$a->fullname}.';
$string['emailtitleuserenrolled'] = '{$a->userfullname} has enrolled in {$a->coursefullname}.';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can be enrolled until this date only.';
$string['enrolenddaterror'] = 'Enrolment end date cannot be earlier than start date';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_desc'] = 'Default enrolment validity duration (in seconds). If set to zero, the enrolment validity duration will be unlimited by default.';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user is enrolled. If disabled, the enrolment duration will be unlimited.';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can be enrolled from this date onward only.';
$string['expiredtoken'] = 'Invalid token - enrolment process has stopped.';
$string['invitationpagehelp'] = '<ul><li>You have {$a} invitation(s) left for today.</li><li>Each invitation is unique and expires once used.</li></ul>';
$string['inviteusers'] = 'Invite users';
$string['maxinviteerror'] = 'It must be a number.';
$string['maxinviteperday'] = 'Maximum number of invitations per day';
$string['maxinviteperday_help'] = 'Maximum number of invitations that can be sent per day for this course.';
$string['noinvitationinstanceset'] = 'No invitation enrolment instance has been found. Please add an invitation enrol instance to your course first.';
$string['nopermissiontosendinvitation'] = 'No permission to send invitations';
$string['pluginname'] = 'Invitation';
$string['pluginname_desc'] = 'The Invitation module allows to send invitations by email. These invitations can be used only once. Users clicking on the email link are automatically enrolled.';
$string['status'] = 'Allow invitation enrolments';
$string['status_desc'] = 'Allow users to invite people to enrol into a course by default.';
$string['unenrol'] = 'Unenrol user';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';
$string['unenroluser'] = 'Do you really want to unenrol "{$a->user}" from course "{$a->course}"?';
