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
 * Strings for component 'report_trainingsessions', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   report_trainingsessions
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activitytime'] = 'Time in activities:';
$string['activitytime_help'] = '<p>This time calculation considers all use time spent in course activities, letting course
	layout times out of calculation. In certain cases (when using the Learning Time Check (non standard) with
	standard time allocation (http://github.com/vfremaux/moodle-mod_learningtimecheck.git), additional
	standard time are used rather than real extracted times from log.</p>';
$string['advancement'] = 'Advancement';
$string['allcourses'] = 'All courses';
$string['allgroups'] = 'All groups';
$string['ashtml'] = 'HTML Format';
$string['asxls'] = 'Download as Excel';
$string['checklistadvice'] = 'Special side completion effects';
$string['chooseagroup'] = 'Choose a group';
$string['chooseaninstitution'] = 'Choose an institution';
$string['connections'] = 'Connections';
$string['course'] = 'Course';
$string['courseglobals'] = 'Course global areas';
$string['coursename'] = 'Group name';
$string['courseraw'] = 'Course Raw';
$string['coursesessions'] = 'Working sessions in course (real guessed times)';
$string['csvoutputtoiso'] = 'Iso CSV Output';
$string['csvoutputtoiso_desc'] = 'If enabled, the course raw report will be generated in ISO-8859-1 encoding for old CSV compliant applications.';
$string['done'] = 'Visited:';
$string['duration'] = 'Duration';
$string['elapsed'] = 'Total time';
$string['elapsedadvice'] = 'Elapsed time can be different from sesion time range due to extra credit times on sessions breaks. Refer to the Use Stats block configuration.';
$string['enddate'] = 'End date';
$string['equlearningtime'] = 'Equivalent training time:';
$string['equlearningtime_help'] = '<p>Equivalent learning time summarizes all time spent in course, including standard allocation times if
	the Learning Time Check checklist module is used (http://github.com/vfremaux/moodle-mod_learningtimecheck.git).</p>';
$string['errorbadcoursestructure'] = 'Course structure error : bad id {$a}';
$string['errorbadviewid'] = 'non existing report view';
$string['errorcoursestructurefirstpage'] = 'Course structure error : failed getting first page';
$string['errorcoursetoolarge'] = 'Course is too large. Choosing a group';
$string['errornotingroup'] = 'You have not access to all users and do not have any group membership.';
$string['firstaccess'] = 'First access';
$string['firstconnection'] = 'First connection';
$string['firstenrolldate'] = 'First enroll';
$string['firstname'] = 'Firstname:';
$string['generatereports'] = 'Generate reports';
$string['generateXLS'] = 'Generate as XLS';
$string['headsection'] = 'Heading section';
$string['hits'] = 'Hits';
$string['incourses'] = 'In courses';
$string['institution'] = 'Institution';
$string['institutions'] = 'Institutions';
$string['instructure'] = 'Time spent inside structure';
$string['item'] = 'Item';
$string['lastname'] = 'Lastname';
$string['learningtimecheckadvice_help'] = '<p>When using a Learning Time Check module that enables teachers to validate activities without
any student interaction in the course, some apparent information discrepancy may appear.</p>
<p>This is a normal situation that reports consistant information regarding the effective
	use of the platform</p>';
$string['nodata'] = 'No course data';
$string['nopermissiontoview'] = 'You have not enough permissions in this course to view this information.';
$string['nosessions'] = 'No measurable session data';
$string['nostructure'] = 'No measurable course structure detected';
$string['nothing'] = 'Nothing';
$string['outofgroup'] = 'Out of group';
$string['outofstructure'] = 'Time spent out of structure';
$string['over'] = 'over';
$string['parts'] = 'parts';
$string['pluginname'] = 'Training Sessions';
$string['reports'] = 'Reports';
$string['role'] = 'Role';
$string['sectionname'] = 'Section name';
$string['seedetails'] = 'See details';
$string['selectforreport'] = 'Include in reports';
$string['sessionend'] = 'Session end';
$string['sessionreports'] = 'User session report';
$string['sessions'] = 'Working sessions (real guessed times)';
$string['sessionstart'] = 'Session start';
$string['startdate'] = 'Start date';
$string['timeelapsed'] = 'Time spent';
$string['timeelapsedcurweek'] = 'Time spent cur. week';
$string['timeperpart'] = 'Time elapsed per part';
$string['todate'] = 'Date end';
$string['totalduration'] = 'Total duration';
$string['totalsessions'] = 'Total session time';
$string['totalsessiontime'] = 'Total working sessions time';
$string['totalsessiontime_help'] = 'Note that session list counts some durations that can be outside this course. Total session time should usually be higher than in course time calculation';
$string['trainingreports'] = 'Training Reports';
$string['trainingsessions'] = 'Training Sessions';
$string['trainingsessions:iscompiled'] = 'Is compiled in reports';
$string['trainingsessionsreport'] = 'Training Session Reports';
$string['trainingsessions_report_advancement'] = 'Progress Report';
$string['trainingsessions_report_connections'] = 'Connection Report';
$string['trainingsessions_report_institutions'] = 'Institution Report';
$string['trainingsessions:view'] = 'View training session report';
$string['trainingsessions:viewother'] = 'View training session reports from other users';
$string['unvisited'] = 'Unvisited';
$string['updatefromaccountstart'] = 'Get from user first access';
$string['updatefromcoursestart'] = 'Get from course start';
$string['uploadglobals'] = 'File uploads';
$string['uploadresult'] = 'Download raw results';
$string['user'] = 'Per participant';
$string['weekstartdate'] = 'Week start';
$string['workingsessions'] = 'Work sessions:';
