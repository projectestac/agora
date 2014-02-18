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
 * Strings for component 'attendanceregister', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   attendanceregister
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['are_you_sure_to_delete_offline_session'] = 'Are you sure to delete this offline Session?';
$string['attendanceregister:addinstance'] = 'Add new attendance register';
$string['attendanceregister:addotherofflinesess'] = 'Can add Offline Sessions on other people\'s Register';
$string['attendanceregister:addownofflinesess'] = 'Can add Offline Sessions on his/her own Register';
$string['attendanceregister:deleteotherofflinesess'] = 'Can delete Offline Sessions on other people\'s Register';
$string['attendanceregister:deleteownofflinesess'] = 'Can delete Offline Sessions from his/her own Register';
$string['attendanceregister:recalcsessions'] = 'Can force Attendance Register\'s Sessions recalculations';
$string['attendanceregister:tracked'] = 'Is tracked by Attendance Register';
$string['attendanceregister:viewotherregisters'] = 'Can view other people\'s Attendance Registers';
$string['attendanceregister:viewownregister'] = 'Can view his/her own Attendance Registers';
$string['back_to_normal'] = 'Back to normal version';
$string['back_to_tracked_user_list'] = 'Back to tracked Users list';
$string['click_for_detail'] = 'click for details';
$string['comments'] = 'Comments';
$string['completiondurationgroup'] = 'Total tracked time';
$string['completiontotalduration'] = 'Require time [minutes]';
$string['count'] = '#';
$string['dayscertificable'] = 'Days back';
$string['dayscertificable_exceeded'] = 'Must be no more than {$a} days ago';
$string['dayscertificable_help'] = 'Limits how old the offline sessions may be.<br />
    A student may not record an Offline Session older than this number of days.';
$string['duration'] = 'Duration';
$string['duration_hh_mm'] = '{$a->hours} h, {$a->minutes} min';
$string['duration_mm'] = '{$a->minutes} min';
$string['enable_offline_sessions_certification'] = 'Enable Offline Sessions';
$string['end'] = 'End';
$string['first_calc_at_next_cron_run'] = 'Any past Session will show at next Cron';
$string['force_recalc_all_session'] = 'Recalculate all online Sessions';
$string['force_recalc_all_session_help'] = 'Delete and recalculate all online Sessions of all tracked Users.<br />
    Normally you <b>do not need to do it</b>!<br />
    New Sessions are automatically calculated in background (after some delay).<br />
    This operation may be useful <b>only</b>:
    <ul>
      <li>After changing the Role of a User that previously acted in any of the tracked Courses  with a different Role
      (i.e. changing from Teacher to Student, when Studet are tracked and Teacher are not).</li>
      <li>After modifying Register settings that affects Sessions calculation
      (i.e. <i>Attendance Tracking Mode</i>, <i>Online Session timeout</i>)</li>
    </ul>
    You <b>do not need to recalculate when enrolling new Users</b>!<br /><br />
    Recalculation can be executed immediately or scheduled for execution by the next cron.
    Scheduled execution could be more efficient for very crowded courses.';
$string['force_recalc_all_session_now'] = 'Recalculate Sessions, now';
$string['force_recalc_user_session'] = 'Recalculate this User\'s online Sessions';
$string['force_recalc_user_session_help'] = 'Delete and recalculate all online Sessions of this User.<br />
    Normally you <b>do not need to do it</b>!<br />
    New Sessions are automatically calculated in background (after some delay).<br />
    This operation may be useful <b>only</b>:
    <ul>
      <li>After changing the Role of the User, ant he/she previously acted in any of the tracked Courses with a different Role
      (i.e. changing from Teacher to Student, when Studet are tracked and Teacher are not).</li>
      <li>After modifying Register settings that affects Sessions calculation
      (i.e. <i>Attendance Tracking Mode</i>, <i>Online Session timeout</i>)</li>
    </ul>';
$string['fullname'] = 'Name';
$string['grandtotal_time'] = 'Total Time';
$string['insert_new_offline_session'] = 'Insert a new offline work session';
$string['insert_new_offline_session_for_another_user'] = 'Insert a new offline work session for {$a->fullname}';
$string['last_calc_online_session_logout'] = 'Last Register online Session End (excl. current Session)';
$string['last_session_logout'] = 'Last Session End';
$string['last_site_access'] = 'Last actitity on Site';
$string['last_site_login'] = 'Last login on Site';
$string['login_must_be_before_logout'] = 'Start after end!';
$string['logout_is_future'] = 'May not be in the future';
$string['mandatory_offline_sessions_comments'] = 'Mandatory Comments';
$string['mandatoryofflinespecifycourse'] = 'Mandatory Course selection';
$string['mandatoryofflinespecifycourse_help'] = 'Specifying a Course in Offline Sessions will be mandatory';
$string['maynotaddselfcertforother'] = 'You cannot add an offline sessions for other users.';
$string['modulename'] = 'Attendance Register';
$string['modulename_help'] = 'Attendance Register calculates time users spend working in online Courses.<br />
    Optionally allow the User record Offline activities.<br />
    Depending on Attendance Mode, the Register may tracks activities in a single Course, in all Courses in the same Category
    or in all Courses "Meta linked" to the Course the Register is in.<br />
    Online work sessions are calculated on Log entries recorded by Moodle.<br />
    <b>New online sessions are added with some delay by the cron, after User logout.</b>';
$string['modulenameplural'] = 'Attendance Registers';
$string['never'] = '(never)';
$string['no_refcourse'] = '(no Course specified)';
$string['no_session'] = 'No Session';
$string['no_session_for_this_user'] = '- No Session for this User, yet -';
$string['no_tracked_user'] = '- No User tracked by this Attendance Register -';
$string['not_specified'] = '(not specified)';
$string['offline'] = 'Offline';
$string['offlinecomments'] = 'User\'s Comments';
$string['offlinecomments_help'] = 'Enable adding textual comments to Offline Sessions';
$string['offline_refcourse_duration'] = 'Offline Time, Course:';
$string['offline_session_comments'] = 'Comments';
$string['offline_session_comments_help'] = 'Describe the topic of offline work session.';
$string['offline_session_deleted'] = 'Offline Session deleted';
$string['offline_session_end'] = 'End';
$string['offline_session_ref_course'] = 'Ref.Course';
$string['offline_session_ref_course_help'] = 'Select the Course the offline work has been done for or the Course covering the work topic.';
$string['offline_session_saved'] = 'New Offline Session saved';
$string['offline_sessions_certification'] = 'Offline work Sessions';
$string['offline_sessions_certification_help'] = 'Enables the Users to insert offline Sessions of work.<br />
    This is a kind of <i>Self-Certification</i> of the work done.<br />
    This may be useful if "bureaucracy" requires maintaining a register of every student\'s activities.<br />
    Only real users may add Offline Sessions: <i>Logged in as...</i> admins cannot!';
$string['offline_session_start'] = 'Start';
$string['offline_session_start_help'] = 'Select Start and End Date &amp; Time of the offline work Session you want to submit.<br />
    The Offline Session may not overlap any previously recorded session, either online or offline, nor the current online session.';
$string['offline_sessions_total_duration'] = 'Offline Total Time';
$string['offlinespecifycourse'] = 'Specify Course in Offline Sessions';
$string['offlinespecifycourse_help'] = 'Allow the user to select the Course the Offline Session is related to.<br />
    This is meaningful only if the Register tracks more than one Course (i.e. Attendance Mode is "Category" or "Meta-linked")';
$string['online'] = 'Online';
$string['online_offline'] = 'Online/Offline';
$string['online_sessions_total_duration'] = 'Online Sessions Total Time';
$string['online_session_updated'] = 'Online Sessions updated';
$string['online_session_updated_report'] = '{$a->fullname} Online Sessions updated: {$a->numnewsessions} new found';
$string['onlyrealusercanaddofflinesessions'] = 'Only real user may add an offline session';
$string['onlyrealusercandeleteofflinesessions'] = 'Only real user may delete offline sessions';
$string['overlaps_current_session'] = 'Overlaps the current online Session (since current Login)';
$string['overlaps_old_sessions'] = 'Overlaps another Session, either online or offline';
$string['pluginadministration'] = 'Attendance Register Administration';
$string['pluginname'] = 'Attendance Register';
$string['prev_site_login'] = 'Previous login on Site';
$string['recalc_already_pending'] = '(Already pending for execution on next Cron)';
$string['recalc_complete'] = 'Sessions Recalculation complete';
$string['recalc_scheduled'] = 'Session recalculation has been scheduled. It will execute on next Cron';
$string['recalc_scheduled_on_next_cron'] = 'Sessions recalculating is scheduled for execution on next Cron';
$string['ref_course'] = 'Ref.Course';
$string['registername'] = 'Attendance Register name';
$string['registertype'] = 'Attendance Tracking Mode';
$string['registertype_help'] = 'Attendance Tracking Modes determines Courses tracked by the Register (i.e. where user\'s activity will be monitored):
* _This Course only_: Only in the Course where the Attendance Register module is.
* _All Courses in the same Category_: activity will be monitored on all Courses in the same Category of the Course the module is.
* _All Courses linked by Course meta link_: Activity will be monitored in this Course and all Courses linked by Course meta link.';
$string['schedule_reclalc_all_session'] = 'Schedule Recalculate Sessions';
$string['select_a_course'] = '- Select a Course -';
$string['select_a_course_if_any'] = '- Select a Course, if any -';
$string['session_added_by_another_user'] = 'Added by: {$a}';
$string['sessions_grandtotal_duration'] = 'Grand Total Time';
$string['sessiontimeout'] = 'Online session timeout';
$string['sessiontimeout_help'] = 'Session Timeout is used for estimating Online Session duration.<br />
    Online Sessions will be at least <b>one half</b> the Session Timeout long.<br />
    Note that if Session Timeout is too long, the Register tends to overestimate Online Sessions duration.<br />
    If too short, real Sessions will break in many shorter Sessions.<br />
    <h3>Long explaination</h3>
    Online work sessions are <b>guessed</b> looking at Log entries of the User in the tracked Courses
    (see <i>Attendance Tracking Mode</i>).<br/>
    If a timespan shorter than Session Timeout elapsed between two consecutive Log Entries,
    the Register consider the User continuosly working online (i.e. the Session continue).<br />
    If a timespan longer then Session Timeout elapsed, the Register guesses the User stoped working online
    <b>one half</b> the Session Timeout after the previous Log Entry (i.e. the Session ends) and came back
    again at the following Log Entry (i.e. a new Session starts)';
$string['show_my_sessions'] = 'Show my sessions';
$string['show_printable'] = 'Show printable version';
$string['start'] = 'Start';
$string['total_time_offline'] = 'Total Time Offline';
$string['total_time_online'] = 'Total Time Online';
$string['tracked_courses'] = 'Tracked Courses';
$string['tracked_users'] = 'Tracked Users';
$string['type_category'] = 'All Courses in the same Category';
$string['type_course'] = 'This Course only';
$string['type_meta'] = 'All Courses linked by Course meta link';
$string['unknown'] = '(unknown)';
$string['unreasoneable_session'] = 'Are you sure? This is more than {$a} hours long!';
$string['updating_online_sessions_of'] = 'Updating online Sessions of {$a}';
$string['user_sessions_summary'] = 'User\'s Sessions summary';
