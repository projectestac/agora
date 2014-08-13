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
 * Strings for component 'block_tutorlink', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   block_tutorlink
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['blocksettings'] = 'Block Settings';
$string['cantreadcsv'] = 'Unable to read CSV file';
$string['cantremoveold'] = 'Old cron file $a couldn\'t be removed. Please check file permissions.';
$string['cronfile'] = 'Location of file for automatic processing';
$string['cronfiledesc'] = 'If you enter a file location in here, it will be periodically checked
    for a file to process automatically.';
$string['cronmoved'] = '{$a->old} moved to {$a->new}';
$string['cronnotmoved'] = '{$a->old} couldn\'t be moved to {$a->new}. Please check folder
    permissions.';
$string['cronprocessed'] = 'Processed file location';
$string['csv'] = 'CSV File';
$string['csvfile'] = 'Select CSV file';
$string['csv_help'] = 'The file should be in CSV (comma-seperated value) format. Each assignment
    should be on 1 row, with 3 columns: operation (add or del), user idnumber, user context
    idnumber). For example, to add user with idnumber 1234 to the user context of the user with
    idnumber 4321, the line would read: add, 1234, 4321';
$string['invalidop'] = 'Line {$a->line}: Invalid operation {$a->op}';
$string['keepprocessed'] = 'Keep Processed files';
$string['keepprocessedfor'] = 'Days to keep processed files for';
$string['keepprocessedlong'] = 'If checked, processed files will be stored in the location below.';
$string['musthavefile'] = 'You must select a file';
$string['nocronfile'] = 'Cron file doesn\'t exist.';
$string['nodir'] = '{$a} does not exist or is not writable. Please check folder permissions.';
$string['nopermission'] = 'You do not have permission to upload tutor relationships.';
$string['norelforwildstudent'] = 'Tutor {$a->student} has no tutees to remove';
$string['norelforwildtutor'] = 'Student {$a->student} has no tutors to remove';
$string['noroles'] = 'There are currently no roles assignable in User contexts. You must create such a role
before this block can be fully configured, otherwise you will not be able to use it!';
$string['notutorrole'] = 'Before you use this block, you must select a tutor role in the';
$string['pluginname'] = 'Upload tutor relationships';
$string['pluginnameplural'] = 'Upload tutor relationships';
$string['reladded'] = '{$a->tutor} sucessfully assigned to {$a->student}';
$string['reladderror'] = 'Error assigning {$a->tutor} to {$a->student}';
$string['relalreadyexists'] = '{$a->tutor} already assigned to {$a->student}';
$string['reldeleted'] = '{$a->tutor} unassigned from {$a->student}';
$string['reldoesntexist'] = '{$a->tutor} not assigned to {$a->student}, so can\'t be removed';
$string['removedold'] = 'Removed {$a} old cron files';
$string['toofewcols'] = 'CSV file has too few columns on line {$a}, expecting 3.';
$string['toomanycols'] = 'CSV file has too many columns on line {$a}, expecting 3.';
$string['tuteenotfound'] = 'Line {$a->line}: Tutee not found';
$string['tutorlink:addinstance'] = 'Can add a new tutorlink block';
$string['tutorlink_log'] = 'Flatfile Tutor Link Log';
$string['tutorlink:myaddinstance'] = 'Can add a new tutorlink block to My Moodle';
$string['tutorlink:use'] = 'Can upload files to the tutorlink block';
$string['tutornotfound'] = 'Line {$a->line}: Tutor not found';
$string['tutorrole'] = 'Tutor role';
$string['tutorrole_explain'] = 'This is the role that the tutors will be assigned in the students\'
    user context';
$string['wildcarddeletion'] = 'Allow Wildcard Deletion?';
$string['wildcarddeletiondesc'] = 'If enabled, a file containing * in place of an ID number will match all users for del operations, e.g. `del, 1234, *` would remove all tutees from user 1234 while `del, *, 4321` would remove all tutors from user 4321.';
$string['wildcarddisabled'] = 'Line {$a->line}: Wildcard deletion found but wildcards are disabled.';
