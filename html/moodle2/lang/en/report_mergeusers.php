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
 * Strings for component 'report_mergeusers', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   report_mergeusers
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['dbko'] = '<h1 style="color:#f00;">Merge FAILED!</h1><p>If your database engine supports transactions, the whole current transaction has been rolled back and no modification has been made to your database records.</p>';
$string['dbok'] = '<h1 style="color:#0c0;">Merge succesful</h1>';
$string['dbqueries'] = '<h2>Here are the queries that have been sent to the DB</h2><p style="color: #f00;">Please save this page for further reference.</p>';
$string['description'] = '<h1>Merge two users into a single account.</h1>
    <p>Given a user ID to be deleted and a user ID to keep, this will merge the user data associated with the former user ID into the latter user ID. Note that both user IDs must already exist and no accounts will actually be deleted. That process is left to the administrator to do manually.</p>
    <p>This process involves some database dependant functions and may not have been fully tested on your particular choice of database. <strong>Only do this if you know what you are doing as it is not reversable!</strong></p>';
$string['errordatabase'] = 'Unsupported database type: {$a}';
$string['errornouserid'] = 'Cannot retrieve user ID';
$string['into'] = 'into';
$string['mergeusers'] = 'Merge user accounts';
$string['mergeusers:view'] = 'Merge User Accounts';
$string['merging'] = 'Merging';
$string['newuserid'] = 'User ID to be kept';
$string['olduserid'] = 'User ID to be removed';
$string['pluginname'] = 'Merge user accounts';
$string['tableko'] = 'Table {$a} : update NOT OK!';
$string['tableok'] = 'Table {$a} : update OK';
$string['tableskipped'] = 'For logging or security reasons we are skipping <strong>{$a}</strong>.<br />To remove these entries, delete the old user once this script has run successfully.';
$string['useridnotexist'] = 'User ID does not exist';
