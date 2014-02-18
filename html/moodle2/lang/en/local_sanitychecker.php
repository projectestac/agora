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
 * Strings for component 'local_sanitychecker', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   local_sanitychecker
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['local_sanitychecker_action_check'] = 'Run test';
$string['local_sanitychecker_action_confirm'] = 'Do you really want to continue ?';
$string['local_sanitychecker_action_resolve'] = 'Resolve issue';
$string['local_sanitychecker_action_resolve_invit'] = 'Click on the action "<i>Resolve issue</i>" to solve the problem';
$string['local_sanitychecker_check_succeed'] = 'All is correct';
$string['local_sanitychecker_disclaimer'] = 'IMPORTANT NOTE<br />Be aware that
    these fixes modify directly database records.<br /><b>It is highly recommended
    to perform a backup of your database before using them.</b><br />No revert
    is possible at this time !';
$string['local_sanitychecker_impl_legacyfilelink'] = 'Legacy File Link Sanity Checker';
$string['local_sanitychecker_impl_legacyfilelink_description'] = 'Look for legacy file link inconsistencies';
$string['local_sanitychecker_impl_legacyfilelink_notification_findin'] = 'Find in table.column :';
$string['local_sanitychecker_impl_legacyfilelink_notification_links'] = 'ID : Links found / Course ID :';
$string['local_sanitychecker_impl_legacyfilelink_notification_nonvalidlinks'] = 'The following legacy file links are non valid :';
$string['local_sanitychecker_impl_quiz'] = 'Quiz Sanity Checker';
$string['local_sanitychecker_impl_quiz_description'] = 'Look for database inconsistencies related to the quiz module<br />
     Read more about this issue on the on Moodle Issue Tracker at
     <a href="https://tracker.moodle.org/browse/MDL-32791" target="_blank">MDL-32791</a>';
$string['local_sanitychecker_impl_quiz_notification_instances'] = 'Question Instance IDs :';
$string['local_sanitychecker_impl_quiz_notification_nonvalidqqi'] = 'The following quiz question instances are non valid :';
$string['local_sanitychecker_impl_quiz_notification_quiz'] = 'Quiz ID :';
$string['local_sanitychecker_menu'] = 'Sanity checker';
$string['local_sanitychecker_table_head_information'] = 'Information';
$string['local_sanitychecker_table_head_name'] = 'Sanity checker name';
$string['pluginname'] = 'Sanity checker utility';
