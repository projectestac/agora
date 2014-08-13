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
 * Strings for component 'block_dedication', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_dedication
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['access_button'] = 'Dedication tool';
$string['access_info'] = 'Only for teachers:';
$string['connectionratiorow'] = 'Connections per day';
$string['dedication:addinstance'] = 'Allow to add Course dedication block';
$string['dedicationall'] = 'All course members dedication. Click on any name to see a detailed course dedication for it.';
$string['dedication_estimation'] = 'Your estimated dedication time is';
$string['dedicationgroup'] = 'All group <em>{$a}</em> members dedication. Choose any member to see a detailed course dedication for it.';
$string['dedicationrow'] = 'Course dedication';
$string['dedication:use'] = 'Allow to use Course dedication';
$string['form'] = 'Course dedication configuration';
$string['form_help'] = 'Time is estimated based in the concepts of Session and Session duration applied to log entries.

<strong>Click:</strong> Every time that a user access to a page in Moodle a log entry is stored.

<strong>Session:</strong> set of two or more consecutive clicks in which the elapsed time
between every pair of consecutive clicks does not overcome an established maximum time.

<strong>Session duration:</strong> elapsed time between the first and the last click of the session.

<strong>Dedication time:</strong> the sum of all session duration for a user.';
$string['form_text'] = 'Select the range of dates and the maximum time between clicks of the same session.';
$string['limit'] = 'Limit between clicks (in minutes)';
$string['limit_help'] = 'The limit between clicks defines if two clicks are part of the same session or not';
$string['maxtime'] = 'End of the period';
$string['maxtime_help'] = 'Consider only log entries ending before this date';
$string['meandedication'] = '<strong>Mean dedication:</strong> {$a}';
$string['mintime'] = 'Start of the period';
$string['mintime_help'] = 'Consider only log entries after this date';
$string['pagetitle'] = '{$a}: course dedication';
$string['period'] = 'Period since <em>{$a->mintime}</em> to <em>{$a->maxtime}</em>';
$string['perioddiff'] = '<strong>Elapsed time:</strong>  {$a}';
$string['perioddiffrow'] = 'Elapsed time';
$string['pluginname'] = 'Course dedication';
$string['sessionduration'] = 'Duration';
$string['sessionstart'] = 'Session start';
$string['show_dedication'] = 'Show dedication time to students';
$string['show_dedication_help'] = 'By default, dedication time can only be viewed by teachers. This setting allow students to see their dedication time in the block.';
$string['sincerow'] = 'Since';
$string['submit'] = 'Calculate';
$string['torow'] = 'To';
$string['totaldedication'] = '<strong>Total dedication:</strong> {$a}';
$string['userdedication'] = 'Detailed course dedication of <em>{$a}</em>.';
