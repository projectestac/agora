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
 * Strings for component 'netucate', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   netucate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Actions';
$string['activity_info'] = 'Activity Information';
$string['activityiscurrentlyclosed'] = '(This Activity is currently closed.)';
$string['activityiscurrentlyclosedforparticipants'] = '(Note: This Activity is currently closed for Participants.)';
$string['ActivityName'] = 'Activity Name';
$string['activity_task_activity_lacks_moodle2_backup_support'] = 'Sorry, currently there is no backup support for netucate activities.';
$string['activitytype'] = 'Activity Type';
$string['activitytype_help'] = 'The Activity Type can only be specified while creating the activity, it is not changeable later.';
$string['admin_login'] = 'Admin Login';
$string['admin_login_desc'] = 'Login for netucate API User';
$string['admin_password'] = 'Admin Password';
$string['admin_password_desc'] = 'Password for netucate API User';
$string['allroles'] = 'Meeting Leader/Primary Instructor/Conference Leader/Room Technician';
$string['apierror-240'] = 'You are currently the instructor of this activity and you cannot be registered as assistant at the same time.
    Please either remove your enrollment as netucate Activity Assistant or change the Instructor.';
$string['api_timeout'] = 'API Timeout';
$string['api_timeout_desc'] = 'Connection-Timeout to API in Seconds';
$string['api_url'] = 'netucate API URL';
$string['api_url_desc'] = 'URL used to connect to netucate API';
$string['assistant'] = 'Assistant';
$string['assistantisinstructor'] = 'Warning: This Assistant is currently the Instructor of the Activity.
                                    <br>Please either remove this enrollment as netucate Activity Assistant or change the Instructor.
                                    <br>Otherwise this user will not be able to join the activity.';
$string['assistantscanedit'] = 'Assistants can edit this Activity';
$string['assistantscanjoin'] = 'Assistants can join this Activity everytime';
$string['assistants_in_activity'] = 'Assistants in Activity Context';
$string['assistants_in_course'] = 'Assistants in Course Context';
$string['class'] = 'Class';
$string['conference'] = 'Conference';
$string['conferenceleader'] = 'Conference Leader';
$string['currentactivityinstructorisnotauthorized'] = 'Warning: The specified instructor does not have the permission to lead this netucate activity. Please assign an appropriate role or change the instructor.';
$string['currentactivityinstructorisnotauthorized1'] = 'You are currently the moderator of this activity, but you do not have the required Moodle permission. Please contact your administrator.';
$string['customer_id'] = 'CustomerID';
$string['customer_id_desc'] = 'CustomerID in the netucate System';
$string['datetime'] = 'Startdate/Starttime';
$string['duration'] = 'Duration';
$string['durationhours'] = 'Other Duration (hour(s)/minutes)';
$string['email'] = 'eMail';
$string['firstname'] = 'First Name';
$string['helpbuttoncc'] = 'Communication Center';
$string['helpbuttoncontent'] = 'Activity Content';
$string['helpbuttonupload'] = 'Upload User Picture';
$string['hour'] = 'hour';
$string['hours'] = 'hours';
$string['instructor'] = 'Instructor';
$string['instructor_help'] = '<p>The label Instructor is used as synonym for:</p>
<ul>
<li>Meeting Leader in Meetings</li>
<li>Primary Instructor in Classes</li>
<li>Conference Leader in Conferences</li>
<li>Room Technician in Support Rooms</li>
</ul>';
$string['join'] = 'Join';
$string['joinallowed'] = 'Join Allowed';
$string['joinbuffer'] = 'Allow Join ...';
$string['joinbuffer1'] = 'minutes before the Start Time';
$string['language'] = 'en';
$string['lastname'] = 'Last Name';
$string['login'] = 'Communication Center';
$string['meeting'] = 'Meeting';
$string['meetingleader'] = 'Meeting Leader';
$string['minutes'] = 'minutes';
$string['minutesbeforestarttime'] = 'Minutes before Start Time';
$string['modulename'] = 'netucate Activity';
$string['modulenameplural'] = 'netucate Activities';
$string['netucate'] = 'netucate';
$string['netucateassistant'] = 'netucate Activity Assistant';
$string['netucate:assistant'] = 'Activity Assistant';
$string['netucateassistantdescription'] = 'An assistant is an attendee who receives the Instructor Tool Panel so he or she can help the instructor manage session activities. For example, an assistant can see hand raises, system status icons, and private chat messages, can assess the data and alert the leader to those issues that need attention.';
$string['netucatefieldset'] = 'Custom example fieldset';
$string['netucateinstructor'] = 'netucate Activity Instructor';
$string['netucate:instructor'] = 'Activity Instructor';
$string['netucateinstructordescription'] = 'The instructor can lead the activity and has all permissions';
$string['netucatename'] = 'netucate Activity Name';
$string['noguests'] = 'The netucate Activity is not open to guests.';
$string['noinstuctorspecified'] = 'Warning: There is currently no instructor specified for this activity. Please update this netucate activity and choose one.';
$string['noinstuctorspecified1'] = 'Warning: There is currently no instructor specified for this activity. Please select one.';
$string['noinstuctorspecified2'] = 'Please select an instructor.';
$string['none'] = 'none';
$string['open'] = 'Always Available';
$string['other'] = 'Other...';
$string['otherdurationmustbenumeric'] = 'Other Duration value must be greater than 0.';
$string['participant'] = 'Participant';
$string['pluginadministration'] = 'netucate administration';
$string['pluginname'] = 'netucate';
$string['primaryreferent'] = 'Primary Instructor';
$string['roomtechnician'] = 'Room Technician';
$string['schedule_fieldset'] = 'Schedule';
$string['schedule_type'] = 'Availability';
$string['single'] = 'Single Occurrence';
$string['students_in_activity'] = 'Participants in Activity Context';
$string['students_in_course'] = 'Participants in Course Context';
$string['support'] = 'Support Room';
$string['type'] = 'Type';
$string['unknownhost'] = 'Please check the netucate API URL in the Configuration of the Module netucate Activity.';
$string['uploaduserpicture'] = 'Upload User Picture';
$string['upload_userpicture'] = 'Upload User Picture';
$string['upload_userpicture_help'] = 'When you add a photo to your iLinc profile, yourpicture will display to all attendees when you have the floor during a session.';
$string['user_info'] = 'User Information';
$string['yourrole'] = 'Your Role';
