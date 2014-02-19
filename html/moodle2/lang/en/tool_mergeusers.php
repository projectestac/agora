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
 * Strings for component 'tool_mergeusers', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_mergeusers
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cligathering:description'] = 'Introduce pairs of user\'s id to merge the first one into then
second one. The first user id (fromid) will \'lose\' all its data to be \'migrated\'n
into the second one (toid). The user \'toid\' will include data from both users.';
$string['cligathering:fromid'] = 'Source user id (fromid):';
$string['cligathering:stopping'] = 'To stop merging, Ctrl+C or type -1 either on fromid or toid fields.';
$string['cligathering:toid'] = 'Target user id   (toid):';
$string['dbko'] = 'Merge FAILED! <br/>If your database engine supports
 transactions, the whole current transaction has been rolled back and no modification has been
 made to your database records.';
$string['dbok'] = 'Merge successful';
$string['deleted'] = 'User with ID {$a} was deleted';
$string['description'] = '<p>Given a user ID to be deleted and a user ID to keep, this will merge the user data
 associated with the former user ID into the latter user ID. Note that both user IDs must
 already exist and no accounts will actually be deleted. That process is left to the
 administrator to do manually.</p>
 <p>This process involves some database dependant functions and may not have been fully tested
 on your particular choice of database. <strong>Only do this if you know what you are doing
 as it is not reversable!</strong></p>';
$string['errordatabase'] = 'Database type not supported: {$a}';
$string['errorsameuser'] = 'Trying to merge the same user';
$string['header'] = 'Merge two users into a single account';
$string['into'] = 'into';
$string['invaliduser'] = 'Invalid user';
$string['logid'] = 'For further reference, these results are recorded in the log id {$a}.';
$string['logko'] = 'Some error occurred:';
$string['loglist'] = 'All these records are merging actions done, showing if they went ok:';
$string['logok'] = 'Here are the queries that have been sent to the DB:';
$string['mergeusers'] = 'Merge user accounts';
$string['mergeusers:view'] = 'Merge User Accounts';
$string['merging'] = 'Merged';
$string['newuserid'] = 'User ID to be kept';
$string['newuseridonlog'] = 'User ID kept';
$string['nologs'] = 'There is no merging logs yet. Good for you!';
$string['olduserid'] = 'User ID to be removed';
$string['olduseridonlog'] = 'User ID removed';
$string['pluginname'] = 'Merge user accounts';
$string['tableko'] = 'Table {$a} : update NOT OK!';
$string['tableok'] = 'Table {$a} : update OK';
$string['tableskipped'] = 'For logging or security reasons we are skipping <strong>{$a}</strong>.
 <br />To remove these entries, delete the old user once this script has run successfully.';
$string['usermergingheader'] = '&laquo;{$a->username}&raquo; (user ID = {$a->id})';
$string['viewlog'] = 'See merging logs';
$string['wronglogid'] = 'The log you are asking for does not exist.';
