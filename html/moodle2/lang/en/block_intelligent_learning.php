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
 * Strings for component 'block_intelligent_learning', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_intelligent_learning
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcutoff'] = 'Add cutoff';
$string['addedactivity'] = 'Added {$a->modname} by {$a->fullname}';
$string['attendancedaily'] = 'Daily Attendance';
$string['attendancepid'] = 'Attendance process ID';
$string['attendancepiddesc'] = 'Attendance process ID';
$string['attendancetab'] = 'Attendance';
$string['backtodatatel'] = 'Back to Portal';
$string['categorycutoff'] = 'Category grade cutoff';
$string['categorycutoffdesc'] = 'You can define one or more cutoff dates, after which midterm grades and final grades will no longer be visible in either the ILP integration block or the grading form. A cutoff date is associated with a course category, and applies to all courses in that category and its subcategories, unless you define a separate cutoff date for a subcategory.';
$string['categorycutoff_help'] = '<p>You can define one or more cutoff dates, after which midterm grades and final grades will no
    longer be visible in either the ILP integration block or the grading form. A cutoff date is associated with a course category,
    and applies to all courses in that category and its subcategories, unless you define a separate cutoff date for a subcategory.</p>

<p>Example: A category has been defined for each term, with subcategories for each department. Course sites exist under the categories
    SP2010/English, SP2010/Math, and SP2010/History. A cutoff date defined for the SP2010 category would apply to all courses in those
    categories. However, a separate cutoff date could be defined for the SP2010/Math category, and would apply to all courses in that category.</p>

<p>To add a new cutoff: Choose the course category, enter a date, and click Add cutoff.</p>
<p>To delete an existing cutoff: Select the Delete check box next to that cutoff and click Save Changes at the bottom of the form.</p>';
$string['checkatleastone'] = 'Please check the checkbox next to a user\'s name to update their grades';
$string['configure'] = 'Configure';
$string['confirmunsaveddata'] = 'You are about to change the group and will lose unsaved data.  Are you sure you want to continue without saving?';
$string['couldnotsave'] = 'A record could not be saved';
$string['currentgrade'] = 'Current Grade';
$string['dailyattendancelink'] = 'Daily attendance link';
$string['dailyattendancelinkdesc'] = 'Display the daily attendance link?';
$string['datatelwebserviceendpoints'] = 'Ellucian Web Service Endpoints';
$string['dateformat'] = 'Date format';
$string['dateformatdesc'] = 'This determines the format of the date for date entry boxes.  The YYYY represents the four digit year, MM represents the two digit month and DD represents the two digit day.';
$string['deletedactivity'] = 'Deleted {$a->modname} by {$a->fullname}';
$string['expiredate'] = 'Expire Date';
$string['extraletters'] = 'Additional Grade Letters';
$string['extralettersdesc'] = 'Enter additional letter grades, separated by commas, that can be submitted for mid-term or final grades.';
$string['failedtoconvert'] = 'Failed to convert date entered to UNIX timestamp for {$a->date}.  Valid format: {$a->format}';
$string['finalgrade'] = 'Final Grade';
$string['finalgrades'] = 'Final Grades';
$string['finalgrades_help'] = '<p>The Final Grades form allows a user to edit the students\' final grades and last date of attendance or the never attended flag.  Each student\'s current grade (decimal and letter) is displayed after their name.</p>';
$string['finalgradestab'] = 'Final Grades';
$string['gotogrades'] = 'Grader Report';
$string['gradebookapp'] = 'Gradebook Application';
$string['gradebookappdesc'] = 'Application handling the grade reporting';
$string['gradebookapperror'] = 'The Gradebook Application is not set to Moodle.';
$string['gradelock'] = 'Lock Grades';
$string['gradelockdesc'] = 'Allow faculty to modify Final grades after submission?';
$string['gradematrixtab'] = 'Midterm/Final Grades';
$string['gradessubmitted'] = 'Grades submitted';
$string['helptextfinalgrades'] = '';
$string['helptextlastattendance'] = '';
$string['helptextmidtermgrades'] = '';
$string['helptextretentionalert'] = '';
$string['ilpgradebook'] = 'ST Gradebook';
$string['ilpst'] = 'ILP ST';
$string['ilpurl'] = 'ILP URL';
$string['ilpurldesc'] = 'URL to the ILP Portal site';
$string['intelligent_learning:addinstance'] = 'Add a new ILP Integration block';
$string['intelligent_learning:edit'] = 'Edit';
$string['invalidday'] = 'The entered date has an invalid day: {$a->date}.  Valid format: {$a->format}';
$string['invalidmonth'] = 'The entered date has an invalid month: {$a->date}.  Valid format: {$a->format}';
$string['invalidyear'] = 'The entered date has an invalid year: {$a->date}.  Valid format: {$a->format}';
$string['lastattendance'] = 'Last Date of Attendance';
$string['lastattendance_help'] = '<p>The Last Date of Attendance form allows a user to edit the students\' last date of attendance.</p>';
$string['lastattendancetab'] = 'Last Date of Attendance';
$string['lastattendancetableheader'] = 'Last Date of Attendance';
$string['ldasubmitted'] = 'LDA Submitted';
$string['lettergradetoolong'] = 'The grade letter "{$a}" must be less than three characters long.';
$string['midterm'] = 'Midterm {$a}';
$string['midtermgradecolumns'] = 'Midterm Grades';
$string['midtermgradecolumnsdesc'] = 'Number of midterm grades to display';
$string['midtermgrades'] = 'Midterm Grades';
$string['midtermgrades_help'] = '<p>The Midterm Grades form allows a user to edit the students\' midterm grades and last date of attendance.  Each student\'s current grade (decimal and letter) is displayed after their name.</p>';
$string['midtermgradestab'] = 'Midterm Grades';
$string['missingmonthdayoryear'] = 'The entered date is missing either day, month or year: {$a->date}. Valid format: {$a->format}';
$string['moodle'] = 'Moodle';
$string['needsadminsetup'] = 'The ILP Integration block needs to be configured by an administrator';
$string['neverattended'] = 'Never Attended';
$string['neverattenderror'] = 'Both the last date of attendance and the never attend flag cannot be set at the same time';
$string['nocheckboxwarning'] = 'No checkboxes were checked.  Please check the checkbox in the rows that should be saved.';
$string['nogradebookusers'] = 'There are no users in this course with gradebook roles';
$string['nogradebookusersandgroups'] = 'There are no users in this course with gradebook roles and this group assignment';
$string['notavailable'] = 'The grading period has expired.';
$string['notvalidgrade'] = '{$a} is not a valid grade';
$string['outsideoflimits'] = 'Failed to convert date entered for {$a->date}.  Valid format: {$a->format}';
$string['pluginname'] = 'ILP Integration';
$string['populatefinalgrade'] = 'Populate with course grade...';
$string['populatemidterm'] = 'Populate midterm with course grade...';
$string['retentionalert'] = 'Retention Alert';
$string['retentionalert_help'] = '<p>Click the Retention Alert link next to a student\'s name to enter retention information for that student in WebAdvisor. Clicking the link will open a new browser window with the appropriate Retention Alert page displayed in WebAdvisor in the Colleague Portal.</p>';
$string['retentionalertlink'] = 'Retention alert link';
$string['retentionalertlinkdesc'] = 'Display the retention alert links?';
$string['retentionalertlinkerror'] = 'Retention alert has not been enabled';
$string['retentionalertpid'] = 'Retention alert process ID';
$string['retentionalertpiddesc'] = 'Retention alert process ID';
$string['retentionalerttab'] = 'Retention Alert';
$string['showlastattendance'] = 'Show last attendance';
$string['showlastattendancedesc'] = 'Display Last Date of Attendance links';
$string['stgradebookpid'] = 'ST Gradebook process ID';
$string['stgradebookpiddesc'] = 'ST Gradebook process ID';
$string['submitgrades'] = 'Submit Grades';
$string['submitlda'] = 'Submit LDA';
$string['updatedactivity'] = 'Updated {$a->modname} by {$a->fullname}';
$string['webserviceendpoints'] = 'Web Service Endpoints';
$string['webservices_ipaddresses'] = 'IP Addresses';
$string['webservices_ipaddressesdesc'] = 'IP addresses can be a comma separated list of subnet definitions. Subnet definitions can be in one of the following three formats:<ol><li>xxx.xxx.xxx.xxx/xx</li><li>xxx.xxx</li><li>xxx.xxx.xxx.xxx-xxx (A range)</li></ol>';
$string['webservices_token'] = 'Token';
$string['webservices_tokendesc'] = 'Token that should be passed along with web service requests';
