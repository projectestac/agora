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
 * Strings for component 'block_badgeawarder', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_badgeawarder
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accountscreated'] = 'The number of accounts created: {$a}';
$string['awardall'] = 'Award to all users, create non-existing users';
$string['awardbadges'] = 'Award badges';
$string['awarderrors'] = 'Award errors: {$a}';
$string['awardexisting'] = 'Award to existing users only';
$string['awardnew'] = 'Award to new users only';
$string['awardresult'] = 'Result';
$string['awardtotal'] = 'Total awarded: {$a}';
$string['badge'] = 'Badge';
$string['badgeawarder:addinstance'] = 'Add a Badge Awarder block';
$string['badgecsv'] = 'Badge csv upload';
$string['badgecsvpreview'] = 'Preview the badge awarding about to be done';
$string['blockname'] = 'Badge Awarder';
$string['cityrequired'] = 'City Required for new users';
$string['completion'] = 'Completion';
$string['countryrequired'] = 'Country Selection Required for new users';
$string['csv'] = 'The badge CSV file';
$string['csvdelimiter'] = 'CSV delimiter';
$string['csvfileerror'] = 'There was an error in your CSV upload file';
$string['csvline'] = 'CSV line';
$string['emailawardsubject'] = 'You have received a badge';
$string['emailawardtextexisting'] = 'Congratulations you have received a {$a->badgename} badge.<br>
<br>
To access your badge visit {$a->siteurl}';
$string['emailawardtextnew'] = 'Congratulations you have received a {$a->badgename} badge.<br>
<br>
To access Moodle, got to: {$a->siteurl}
<br>
Your current login information is now:<br>
   username: {$a->username}<br>
   password: {$a->newpassword}<br>
<br>
you will have to change your password when you login for the first time.<br>';
$string['emailsend'] = 'Email send';
$string['encoding'] = 'Encoding';
$string['enrolment'] = 'Enrolment';
$string['importoptions'] = 'Import options';
$string['line'] = 'Line';
$string['missingbadge'] = 'Badge not found';
$string['mode'] = 'Upload mode';
$string['mode_help'] = 'This allows you to specify if badges can be created and/or updated.';
$string['pluginname'] = 'Badge Awarder';
$string['preview'] = 'Preview:';
$string['previewcreatenew'] = 'Creating new user';
$string['previewskipexisting'] = 'Skipping Existing user';
$string['previewskipnonexisting'] = 'Skipping Non Existing user';
$string['previewupdateexisting'] = 'Updating Existing user';
$string['result'] = 'Result';
$string['returntocourse'] = 'Return to course';
$string['rowpreviewnum'] = 'Preview rows';
$string['rowpreviewnum_help'] = 'Number of rows from the CSV file that will be previewed in the next page. This option exists in
order to limit the next page size.';
$string['selectcountry'] = 'Select Default Country';
$string['statusbadgealreadyawarded'] = 'Badge already awarded';
$string['statusbadgecriteriaerror'] = 'Badge not manually awarded or has additional criteria';
$string['statusbadgenotactive'] = 'Badge not active';
$string['statusbadgenotexist'] = 'Badge does not exist';
$string['statuscoursebadgeonly'] = 'Not a course badge';
$string['statusemailfailed'] = 'Could not send email';
$string['statusemailinvited'] = 'Emailed new user';
$string['statusemailnotified'] = 'Existing user notified';
$string['statusgetuserfailed'] = 'Creating or getting user failed';
$string['statusmissingfields'] = 'Missing required fields';
$string['statusok'] = 'Ok';
$string['statusskipexistinguser'] = 'Skipping existing user';
$string['statusskipnewuser'] = 'Skipping new user';
$string['uploadbadgecsv'] = 'Upload Badges CSV';
$string['uploadbadgespreview'] = 'Upload Badges Preview';
$string['uploadcsv'] = 'Upload CSV';
$string['usersawarded'] = 'Users Awarded';
$string['usersenrolled'] = 'Users Enrolled: {$a}';
$string['usersettings'] = 'Default New User Settings';
