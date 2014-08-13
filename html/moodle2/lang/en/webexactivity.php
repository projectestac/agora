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
 * Strings for component 'webexactivity', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   webexactivity
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additionalsettings'] = 'Additional meeting settings';
$string['allchat'] = 'Participants can chat with other participants';
$string['apipassword'] = 'WebEx Admin password';
$string['apipassword_help'] = 'The password for an admin account on your site.';
$string['apisettings'] = 'API Settings';
$string['apiusername'] = 'WebEx Admin username';
$string['apiusername_help'] = 'The username for an admin account on your site. This should be an accounted dedicated for Moodle for security reasons.';
$string['availabilityendtime'] = 'Extended availability end time';
$string['badpassword'] = 'Your WebEx username and password do not match.';
$string['badpasswordexception'] = 'Your WebEx password is incorrect and could not be updated.';
$string['confirmrecordingdelete'] = 'Are you sure you want to delete the recording <b>{$a->name}</b>, with a length of {$a->time}? This cannot be undone.';
$string['connectionexception'] = 'An error occurred while trying to connect: {$a->error}';
$string['curlsetupexception'] = 'An error occurred while setting up curl.';
$string['defaultmeetingtype'] = 'Default meeting type';
$string['defaultmeetingtype_help'] = 'The meeting type that will be preselected when creating a new meeting.';
$string['deletelink'] = '<a href="{$a->url}">Delete</a>';
$string['deletetime'] = 'Deletion Time';
$string['deletionin'] = '<div>{$a->time} until deletion.</div>';
$string['deletionsoon'] = '<div>Will be deleted soon.</div>';
$string['description'] = 'Description';
$string['duration'] = 'Expected duration';
$string['duration_help'] = 'The anticipated duration of the meeting. It is just for informational purposes, and does not effect how long the meeting can run for.';
$string['error_'] = '';
$string['errordeletingrecording'] = 'Error deleting recording';
$string['error_HM_AccessDenied'] = 'Access was denied to host this meeting.';
$string['error_JM_InvalidMeetingKey'] = 'There was a meeting key error in WebEx and you cannot join this meeting.';
$string['error_JM_InvalidMeetingKeyOrPassword'] = 'There was a meeting key or password error in WebEx and you cannot join this meeting.';
$string['error_JM_MeetingLocked'] = 'This meeting is locked and you cannot join it.';
$string['error_JM_MeetingNotInProgress'] = 'The meeting is not currently in progress. It may have not started yet, or already ended.';
$string['error_LI_AccessDenied'] = 'The user could not be logged into WebEx.';
$string['error_LI_AccountLocked'] = 'The WebEx user account is locked.';
$string['error_LI_AutoLoginDisabled'] = 'Auto logins are disable for this user';
$string['error_LI_InvalidSessionTicket'] = 'The session ticket is invalid. Please try again.';
$string['error_LI_InvalidTicket'] = 'The login ticket is invalid. Please try again.';
$string['error_unknown'] = 'An unknown error occurred.';
$string['event_meeting_ended'] = 'Meeting ended';
$string['event_meeting_hosted'] = 'Meeting hosted';
$string['event_meeting_joined'] = 'meeting joined';
$string['event_meeting_started'] = 'Meeting started';
$string['event_recording_created'] = 'Recording created';
$string['event_recording_deleted'] = 'Recording deleted';
$string['event_recording_downloaded'] = 'Recording downloaded';
$string['event_recording_viewed'] = 'Recording viewed';
$string['externallinktext'] = '<p>This link is for participants who do not have a Oakland University NetID account, or who are not participants in this course. Students in the course will not need to be emailed this link, as they can just click on the Join meeting link on the previous page. This link should be distributed carefully - anybody with this link will be able to access this meeting.  To invite others to the meeting, copy the URL below and send it to them.  If this is a public meeting, this link can also be placed on a web site.</p>';
$string['externalpassword'] = 'Participants will also need to know the meeting password: <b>{$a}</b>';
$string['getexternallink'] = '<a href="{$a->url}">Get external participant link</a>';
$string['host'] = 'Host';
$string['hostmeetinglink'] = '<a href="{$a->url}">Host Meeting</a>';
$string['hostschedulingexception'] = 'User cannot scheduling a meeting for this host.';
$string['inprogress'] = 'In progress';
$string['invalidtype'] = 'Invalid type';
$string['joinmeetinglink'] = '<a href="{$a->url}">Join Meeting</a>';
$string['longavailability'] = 'Extended Availability';
$string['longavailability_help'] = 'Setting this option will leave the meeting available to host until the Extended availability end time. Allows reusable meetings for things like office hours.';
$string['manageallrecordings'] = 'Manage all WebEx recordings';
$string['manageallrecordings_help'] = 'Manage all recordings from the WebEx server, not just ones with a Moodle activity.';
$string['meetingclosegrace'] = 'Meeting grace period';
$string['meetingclosegrace_help'] = 'The number of minutes after the start time plus duration after which the meeting will be considered complete.';
$string['meetingpassword'] = 'Meeting password';
$string['meetingpast'] = 'This meeting has past.';
$string['meetingsettings'] = 'Meeting Settings';
$string['meetingtype'] = 'Meeting type';
$string['meetingtypes'] = 'Meeting Types';
$string['meetingtypes_desc'] = 'These are WebEx meeting types supported by this module. For each type, you can select if it is "Available" (you have a license for it in WebEx, and you want it to be able for use it from Moodle), and if you want it to be "Available to all users". Types that are "Available", but not "Available to all users" will only be selectable by people with the mod/webexactivity:allavailabletypes permission. "Meeting password required" is to tell the plugin if WebEx requires a password. Use the "Generate required passwords" below to allows a user to not supply a password.';
$string['meetingupcoming'] = 'This meeting is not yet available to join.';
$string['modulename'] = 'WebEx Meeting';
$string['modulename_help'] = 'The WebEx Meeting activity allows instructors to schedule meetings into the WebEx web conferencing system*.

When you add the WebEx Meeting activity, you define the date and time of the meeting, as well a number of other optional parameters (such as expected duration, a description, etc). Participants (enrolled students) are then able to enter the WebEx meeting by clicking on a "join meeting" link under the activity in Moodle (teachers will see a link that says "host meeting"). If the meeting is recorded, students will be able to view the recording after the meeting is over.

* WebEx is a web conferencing system that allows students and teachers to synchronously collaborate. It transmits real-time audio and video, and includes tools such as whiteboard, chat, and desktop sharing.';
$string['modulenameplural'] = 'WebEx Meetings';
$string['page_managerecordings'] = 'Manage Recordings';
$string['page_manageusers'] = 'Manage Users';
$string['pluginadministration'] = 'WebEx Meeting administration';
$string['pluginname'] = 'WebEx Meeting';
$string['pluginnamepural'] = 'WebEx Meetings';
$string['prefix'] = 'Username Prefix';
$string['prefix_help'] = 'This string will be prefixed to all usernames created by this module.';
$string['recordingfileurl'] = 'Download';
$string['recordinglength'] = '({$a->time}, {$a->size})';
$string['recordingname'] = 'Recording name';
$string['recordings'] = 'Recordings';
$string['recordingsettings'] = 'Recordings Settings';
$string['recordingstreamurl'] = 'Play';
$string['recordingtrashtime'] = 'Recording trash time';
$string['recordingtrashtime_help'] = 'Number of hours a recording will be held before being deleted permanently.';
$string['requiremeetingpassword'] = 'Require meeting passwords';
$string['requiremeetingpassword_help'] = 'Require a user to enter a meeting password. If unchecked, and the meeting type is marked as requiring a password above, a password will be randomly generated.';
$string['settings'] = 'WebEx Meeting settings';
$string['sitename'] = 'Site Name';
$string['sitename_help'] = 'The url part before .webex.com. If your site url was "https://example.webex.com", you would enter "example" above.';
$string['startssoon'] = 'Starts soon';
$string['starttime'] = 'Start time';
$string['stream'] = 'Stream';
$string['studentdownload'] = 'Allow students to download recordings';
$string['studentdownload_help'] = 'Allow students access to the download link for recordings.';
$string['studentvisible'] = 'Visible to students';
$string['typeforall'] = 'Available to all users';
$string['typeinstalled'] = 'Available';
$string['typemeetingcenter'] = 'Meeting Center';
$string['typemeetingcenter_desc'] = '';
$string['typepwreq'] = 'Meeting password required';
$string['typetrainingcenter'] = 'Training Center';
$string['typetrainingcenter_desc'] = '';
$string['undeletelink'] = '<a href="{$a->url}">Undelete</a>';
$string['unknownhostwebexidexception'] = 'WebEx Host ID doesn\'t exist';
$string['usereditauto'] = 'Your WebEx user is managed internally, and cannot be edited.';
$string['usereditbad'] = 'You should not have arrived at this page.';
$string['usereditunabletoload'] = 'Unable to load your user from WebEx.';
$string['userexistsexplanation'] = 'Your email address ({$a->email}) is already in user by the WebEx User <b>{$a->username}</b>. Please enter your WebEx password below.';
$string['webexactivity:addinstance'] = 'Add a new WebEx Meeting';
$string['webexactivity:allavailabletypes'] = 'Create meetings of all installed types';
$string['webexactivity:hostmeeting'] = 'Host and manage WebEx Meeting';
$string['webexactivityname'] = 'Meeting name';
$string['webexactivity:reports'] = 'Use WebEx reports';
$string['webexactivity:view'] = 'View WebEx Meeting';
$string['webexid'] = 'WebEx ID';
$string['webexrecordings'] = 'WebEx Recordings';
$string['webexusercollision'] = 'Collision with existing WebEx user.';
$string['webexxmlexception'] = 'An error occurred in WebEx while processing XML: {$a->errorcode} {$a->error}';
