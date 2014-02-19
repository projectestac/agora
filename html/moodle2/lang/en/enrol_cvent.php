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
 * Strings for component 'enrol_cvent', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_cvent
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['account_number'] = 'Cvent account ID';
$string['account_number_desc'] = 'Your Cvent account ID. (You must receive this value from Cvent.)';
$string['apicallsremaining'] = 'API calls remaining today until Midnight, Eastern time: {$a}n';
$string['attemptinginit'] = 'Attempting to authenticate to Cvent...n';
$string['autocreate_category'] = 'Auto-create course category';
$string['autocreate_category_desc'] = 'The category for auto-created courses.';
$string['autocreate_courses'] = 'Auto-create courses';
$string['autocreate_courses_desc'] = 'Courses can be created automatically (with the correct ID numbers) if there are enrolments to a course that doesn\'t yet exist in Moodle.';
$string['clicktoseelogafter'] = 'Click here to see the API calls log after this page is finished loading.';
$string['couldnotinit'] = 'Cvent could not be initialized; the number of API calls remaining today is unknown.';
$string['count'] = 'Count: {$a}<br />n';
$string['cron_frequency'] = 'Cron delay';
$string['cron_frequency_desc'] = 'The minimum number of minutes to wait before synchronizations with Cvent. Moodle cron must be configured for this to work. Enter \'0\' or leave blank to disable synchronization via Moodle cron.';
$string['defaultrole_desc'] = 'This plugin currently only handles Cvent registrants and guests; teachers still need to be enroled separately in Moodle.';
$string['enrol_cvent_autocreate_header'] = 'Auto-creation of new courses';
$string['enrol_cvent_cron_header'] = 'Synchronization Via Moodle Cron';
$string['enrol_cvent_cron_now'] = 'Cvent enrolments: Synchronizing now.n';
$string['enrol_cvent_mustbeadmin'] = 'Must be admin or must run from CLI!<br />n';
$string['enrol_cvent_nocron'] = 'Cvent enrolments: Not configured to synchronize during Moodle cron.n';
$string['enrol_cvent_nocron_now'] = 'Cvent enrolments: Too early for next synchronization during Moodle cron. Will synchronize again in {$a} minute(s).n';
$string['enrol_daysafter'] = 'Extended course access';
$string['enrol_daysafter_desc'] = 'Keep students in their courses this many days after the Cvent event is scheduled to end. (Enter -1 to disable -- students will have course access indefinitely.)';
$string['enrol_daysbefore'] = 'Early course access';
$string['enrol_daysbefore_desc'] = 'Enrol students in their courses this many days before the Cvent event is scheduled to begin.';
$string['headingcallsmade'] = 'API calls made (by this plugin)';
$string['headingcallsremaining'] = 'API calls remaining (at last check)';
$string['initerrorunknown'] = 'Unknown error authenticating to Cvent. Perhaps you want to turn on Moodle debugging and try again.n';
$string['initsuccess'] = 'Successfully authenticated to Cvent!n';
$string['INVALID_LOGIN'] = 'Cvent returned \'INVALID_LOGIN\'. Please check your configured Cvent account number, username, and password.n';
$string['manualsync'] = 'Synchronize now';
$string['password'] = 'Cvent password';
$string['password_desc'] = 'Your Cvent account password.';
$string['pluginname'] = 'Cvent';
$string['pluginname_desc'] = 'You can use Cvent (cvent.com) to manage your enrolments. You must be a customer of Cvent and have API access in order to use this plugin.';
$string['search_location'] = 'Search location prefix';
$string['search_location_desc'] = 'The beginning of the name of the location(s) you wish to include.<br />nFor example: If you have three locations in Cvent (Town, Town Hall, Courthouse) and you want this moodle to get enrolments for events in Town and Town Hall, enter \'Town\' here.';
$string['server_settings'] = 'Cvent Settings';
$string['set_up_enrolments'] = 'Setting up enrolments for {$a}...<br />n';
$string['username'] = 'Cvent username';
$string['username_desc'] = 'Your Cvent account username. (You must receive this value from Cvent.)';
$string['verbose'] = 'Verbose';
$string['verbose_desc'] = 'Enabling verbosity increases the amount of output seen from CLI/cron scripts.';
$string['viewlog'] = 'view log';
$string['view_stats'] = '<a href="{$a}">View API statistics</a>';
$string['youmustsetdatetimezone'] = 'Error: date.timezone is not set in your php.ini. You must set this parameter before the Cvent enrolment plugin can work.';
