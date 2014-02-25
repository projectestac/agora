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
 * Strings for component 'local_welcome', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   local_welcome
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['default_moderator_email'] = 'Hi moderator,

  A new user: [[fullname]], has signed up for {$a}';
$string['default_moderator_email_subject'] = 'A new user signed up on {$a} : [[fullname]]';
$string['default_user_email'] = 'Hello [[fullname]],

    Thanks for creating an account on {$a}';
$string['default_user_email_subject'] = 'Hello [[fullname]] Welcome to {$a}';
$string['message_moderator'] = 'Moderator message';
$string['message_moderator_desc'] = 'Message send to moderators';
$string['message_moderator_enabled'] = 'Enable moderator messages';
$string['message_moderator_enabled_desc'] = 'This tickbox enables the sending of notification messages to moderators';
$string['message_moderator_subject'] = 'Moderator subject';
$string['message_moderator_subject_desc'] = 'This will be the subject of the email send to the moderator. Use [[fullname]] as a tag, this wil be replace with the users Firstname Lastname.';
$string['message_user'] = 'User message';
$string['message_user_desc'] = 'Message send to new users';
$string['message_user_enabled'] = 'Enable user messages';
$string['message_user_enabled_desc'] = 'This tickbox enables the sending of welcome messages to new users';
$string['message_user_subject'] = 'User subject';
$string['message_user_subject_desc'] = 'This will be the subject of the email send to the user. Use [[fullname]] as a tag, this will be replace with the users Firstname Lastname.';
$string['moderator_email'] = 'Moderator email';
$string['moderator_email_desc'] = 'New user notifications are send to this email address';
$string['pluginname'] = 'Moodle welcome';
$string['sender_email'] = 'Sender email address';
$string['sender_email_desc'] = 'When new users log in this email address is used to send a notification message, users will be able to see this email address';
$string['sender_firstname'] = 'Welcome message sender firstname';
$string['sender_firstname_desc'] = 'First name used when sending mail to users.';
$string['sender_lastname'] = 'Moderator lastname';
$string['sender_lastname_desc'] = 'Last name used when sending mail to users.';
