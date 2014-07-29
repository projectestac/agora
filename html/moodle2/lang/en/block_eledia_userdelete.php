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
 * Strings for component 'block_eledia_userdelete', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_eledia_userdelete
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['back'] = 'Back';
$string['delete_desc'] = '100 users will be displayd on each page. The following users will display after the user on the current page are deleted.
    You can delete the current displayed users with the "Delete user" button.';
$string['desc'] = 'This plugin deletes user based on their email adress.
    Enter the email adresses into the text box below and klick on "check user" to continue.<br /><br />
    Enter only one email per line.';
$string['desc2'] = 'This Site allows you to delete a list of users, which are read from the file
        "{moodledata}/temp/delete_users.csv".<br><br>The file must be put manuall into that folder.
        The users are identified by thier email adress. In each line of the csv file there must be
        one mail adress.<br><br>The users are viewed in steps of 100 users per page. You can confirm
        to delete. User which are deleted already will not be displayed.';
$string['eledia_config_header'] = 'Configuration of user delete block';
$string['eledia_delete_header'] = 'Mail list of user to delete';
$string['eledia_desc_header'] = '';
$string['eledia_header'] = 'Delete User';
$string['eledia_userdelete:addinstance'] = 'Add user delete block';
$string['failed_deleting'] = 'Some users could not be deleted';
$string['file_not_found'] = 'File not found!';
$string['file_not_readable'] = 'Could not read file!';
$string['last_seen'] = 'Last seen';
$string['only_deletted_user'] = 'The list only contains deleted users.';
$string['pluginname'] = 'Delete User by Maillist';
$string['start_confirm'] = 'Check user';
$string['start_deleting'] = 'Delete user';
$string['successful_deleting'] = 'The choosen users have been deleted.';
$string['title'] = 'Delete User by Maillist';
