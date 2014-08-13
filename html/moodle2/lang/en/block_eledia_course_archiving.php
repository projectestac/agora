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
 * Strings for component 'block_eledia_course_archiving', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_eledia_course_archiving
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['archive'] = 'Start Archiving';
$string['configure_description'] = 'Here you can configure the archiving process. All courses which are located directly in the source categories
    will be checked against their course start date. If the date is within the timespan of now and the choosen days in the past, the course will be archived.
    This means the course will be set invisible, moved to the confiruged archive category and all student users will be unenroled.
    In a second step all courses in archive categorie are checked against their course start date.
    If it is more than the chosen number of days in the past the course will be deleted.<br /><br />
    The process can be initiated through a form which is linked in the block. The block can be added to the main page only.';
$string['confirm_archiving'] = 'The follwoing courses will be archived:<br />
<br />
{$a->archived}<br />
<br />
The follwoing courses will be deleted:<br />
<br />
{$a->deleted}';
$string['confirm_header'] = 'Confirm Archiving';
$string['days'] = 'Number of days to archive';
$string['eledia_course_archiving:addinstance'] = 'add course archiving block';
$string['eledia_course_archiving:use'] = 'use course archiving block';
$string['notice'] = 'The follwoing courses were archived:<br />
<br />
{$a->archived}<br />
<br />
The follwoing courses where deleted:<br />
<br />
{$a->deleted}';
$string['pluginname'] = 'Course Archiving';
$string['remove_error'] = '- Errors while removing';
$string['remove_success'] = '- Successful removed';
$string['sourcecat'] = 'Categories to archivate';
$string['targetcat'] = 'Archive categorie';
$string['title'] = 'Course Archiving';
