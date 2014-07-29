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
 * Strings for component 'enrol_shebang', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_shebang
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['description'] = '<p style="text-align: center">{$a->a}</p><p style="text-align: justify">{$a->c}<br /><br />This enrollment plugin provides a way to consume SunGard HE Banner&reg; messages generated from Luminis Message Broker. This module is not a SunGard product, and is neither endorsed nor supported by SunGard. This module is provided as is, with no warranties or guarantees, either express or implied. Use it at your own risk.<br /><br />Please review the README.txt file in the plugin directory for information concerning security and performance issues. Do not enable this plugin until you have secured access to the post.php script.<br /><br />To perform administrative tasks use the <a href="{$a->b}">Admin. Utilities</a>.</p>';
$string['ERR_CONFIGS_NOTSET'] = 'Configuration settings not found';
$string['ERR_COURSECAT_ZERO'] = 'Could not determine category for new course';
$string['ERR_COURSE_IDNUMBER'] = 'Invalid course idnumber';
$string['ERR_CREATE_CHLID_COURSE'] = 'Failed to add child course to metacourse';
$string['ERR_CREATE_CROSSLIST_GROUP'] = 'Failed to create course group';
$string['ERR_CREATE_PARENT_COURSE'] = 'Failed to create cross-list parent course';
$string['ERR_CROSSLISTNOTENABLED'] = 'Cross-listing is not enabled';
$string['ERR_DATADIR_CREATE'] = 'Unable to create the enrol_shebang data directory';
$string['ERR_DATADIR_MESGLOG'] = 'Unable to create the message logging directory';
$string['ERR_DATADIR_PROCLOG'] = 'Unable to create the process logging directory';
$string['ERR_DATAFILE_NOFILE'] = 'The import file was not found or is not readable';
$string['ERR_DATAFILE_NOOPEN'] = 'Could not lock the import file';
$string['ERR_ENROL_INSERT'] = 'Could not create enrol instance in course';
$string['ERR_ENROLL_FAIL'] = 'Failed to enroll person in course section';
$string['ERR_ENROLL_ROLETYPE_BADMAP'] = 'Mapping for roletype invalid';
$string['ERR_ENROLL_ROLETYPE_NOMAP'] = 'No mapping for roletype configured';
$string['ERR_MEMBERSHIP_IDTYPE'] = 'Could not determine membership (id)type';
$string['ERR_MESGLOG_CLOSE'] = 'Failed to close the message logging file';
$string['ERR_MESGLOG_NOOPEN'] = 'Unable to open the message logging file';
$string['ERR_METANOTENABLED'] = 'Cross-listing is not enabled';
$string['ERR_MISSINGVAL_USERNAME'] = 'The username value is empty';
$string['ERR_MSG_NOHEADERS'] = 'Required HTTP message headers not found';
$string['ERR_PERSON_SOURCE_ID'] = 'Invalid person source id';
$string['ERR_PROCLOG_CLOSE'] = 'Failed to close the process logging file';
$string['ERR_PROCLOG_NOOPEN'] = 'Unable to open the process logging file';
$string['ERR_RECORDNOTFOUND'] = 'Record not found';
$string['ERR_SUSPEND_FAIL'] = 'Failed to suspend user enrollment';
$string['ERR_UNENROLL_FAIL'] = 'Failed to unenroll person from course section';
$string['ERR_UPDATE_CROSSLIST_GROUP'] = 'Failed to update cross-list with course group id';
$string['ERR_XMLLIBS_NOTFOUND'] = 'Required XML libraries not present';
$string['ERR_XMLPARSER_CREATE'] = 'Failed to create xml_parser';
$string['HELP_MONITOR_EMAILS'] = 'List of e-mail addresses, separated by commas or semi-colons, to which to send activity alerts.';
$string['HELP_MONITOR_START'] = 'Time of day when activity monitoring should begin.';
$string['HELP_MONITOR_STOP'] = 'Time of day when activity monitoring should stop.';
$string['HELP_MONITOR_THRESHOLD'] = 'Number of minutes after which there has been no activity an alert e-mail should be sent.';
$string['HELP_RESPONSES_200_ON_ERROR'] = 'Even when message processing fails respond with an HTTP 200 status code to prevent Luminis message broker from suspending transmission.';
$string['HELP_RESPONSES_EMAILS'] = 'List of e-mail addresses, separated by commas or semi-colons, to which to send error notifications.';
$string['HELP_RESPONSES_NOTIFY_ON_ERROR'] = 'Send e-mail notification when a message processing error occurs (limited to one message every 30 minutes.)';
$string['INF_COURSEDELETE_NOACTION'] = 'No action taken for course delete';
$string['INF_CRON_FINISH'] = 'SHEBanG cron: Finished cron task.';
$string['INF_CRON_MONITOR_DISABLED'] = 'SHEBanG cron: Not enabled. Exiting.';
$string['INF_CRON_MONITOR_FINISH'] = 'SHEBanG cron: Monitor task finished.';
$string['INF_CRON_MONITOR_MSGTHRESHOLD'] = 'SHEBanG cron: Last message time threshold not exceeded. Exiting.';
$string['INF_CRON_MONITOR_NOTICESENT'] = 'SHEBanG cron: Email notice sent to $a.';
$string['INF_CRON_MONITOR_NOTICETHRESHOLD'] = 'SHEBanG cron: Last notice time threshold not exceeded. Exiting.';
$string['INF_CRON_MONITOR_START'] = 'SHEBanG cron: Monitor task begins.';
$string['INF_CRON_MONITOR_WRONGDAY'] = 'SHEBanG cron: Not today. Exiting.';
$string['INF_CRON_MONITOR_WRONGTIME'] = 'SHEBanG cron: Not in window. Exiting';
$string['INF_CRON_START'] = 'SHEBanG cron: Beginning cron task.';
$string['INF_TOOLS_IMPORT_FILENOTFOUND'] = 'File specified was not found';
$string['INF_TOOLS_IMPORT_PROGRESS'] = '<smaller>{$a->blocks_read} of {$a->blocks_total} blocks read</smaller>';
$string['INF_USERCREATE_NOACTION'] = 'No action taken for create user';
$string['INF_USERDELETE_NOACTION'] = 'No action taken for delete user recstatus';
$string['LBL_COURSE'] = 'Course (Section) Messages';
$string['LBL_COURSE_CATEGORY'] = 'Category for new courses';
$string['LBL_COURSE_CATEGORY_DEPT'] = 'By Dept';
$string['LBL_COURSE_CATEGORY_ID'] = 'Category for \'Use Existing';
$string['LBL_COURSE_CATEGORY_NEST'] = 'Nest: Term/Dept';
$string['LBL_COURSE_CATEGORY_PICK'] = 'Use Existing';
$string['LBL_COURSE_CATEGORY_TERM'] = 'By Term';
$string['LBL_COURSE_FULLNAME_CHANGES'] = 'Apply changes to fullname on updates';
$string['LBL_COURSE_FULLNAME_PATTERN'] = 'Pattern for course full name';
$string['LBL_COURSE_FULLNAME_UPPERCASE'] = 'Force course full name to upper case';
$string['LBL_COURSE_help'] = '<p><ul><li>Category for new courses - Determines the course category used for newly created courses:<ul><li>By Term - Courses are categorized by academic term</li><li>By Dept - Courses are categorized by academic department</li><li>Nest: Term/Dept - Courses are categorized by academic department subordinate to categories for academic term</li><li>Use Existing: Places new courses in the specified category</li></ul></li><li>Category for \'Use Existing\' - the category to use when \'Use Existing\' is selected.</li><li>Sections based on start/stop dates - when selected, create as many sections (weeks) needed to coincide with the course start/stop dates.</li><li>Pattern for course full name - Pattern to use for course full name. The available tokens are:<ul><li>%termcode% - The code used for the academic term, e.g. 201010</li><li>%termdesc% - The description of the academic term</li><li>%fullname% - Course section\'s full name</li><li>%longname% - Course section\'s long name</li><li>%shortname% - Course section\'s short name</li><li>%sourceid% - Course section\'s Banner code (CRN)</li><li>%deptcode% - Department code, parsed from the course\'s long name using a hyphen (-) delimiter</li><li>%deptname% - Department name.</li><li>%parentcode% - Parent course\'s sourcedid/id</li><li>%coursenum% - Course\'s number</li><li>%sectionnum% - Course\'s section number</li></ul></li><li>Force course full name to upper case - Changes the full name to upper case.</li><li>Apply changes to fullname on updates - Update the course full name with LMB message contents, otherwise preserve the full name.</li><li>Pattern for course short name - Pattern for course short name. Use same tokens as with course full name.</li><li>Force course short name to upper case - Changes the short name to upper case.</li>  <li>Apply changes to shortname on updates - Update the course short name with LMB message contents, otherwise preserve the short name.</li><li>Hide courses when created - Newly created courses will not be visible to students.</li><li>Strip leading chars from parent course id - The number of leading characters, if any, to strip from the parent course\'s source id.</li></ul></p>';
$string['LBL_COURSE_HIDDEN'] = 'Hide courses when created';
$string['LBL_COURSE_PARENT_STRIPLEAD'] = 'Strip leading chars from parent course id';
$string['LBL_COURSE_SECTIONS_EQUAL_WEEKS'] = 'Sections based on start/stop dates';
$string['LBL_COURSE_SHORTNAME_CHANGES'] = 'Apply changes to shortname on updates';
$string['LBL_COURSE_SHORTNAME_PATTERN'] = 'Pattern for course short name';
$string['LBL_COURSE_SHORTNAME_UPPERCASE'] = 'Force course short name to upper case';
$string['LBL_CROSSLIST'] = 'Cross-Listing';
$string['LBL_CROSSLIST_ENABLED'] = 'Process course cross-listing';
$string['LBL_CROSSLIST_FULLNAME_PREFIX'] = 'Cross-list Fullname Prefix';
$string['LBL_CROSSLIST_GROUPS'] = 'Group enrollees based on child-courses';
$string['LBL_CROSSLIST_help'] = '<p>These settings affect how cross-listed course sections are handled.</p><p><ul><li>Process course cross-listing - Enables processing of group &lt;membership&gt; messages, i.e. cross-listed child courses.</li><li>Implement cross-listing using - Determines whether to implement a cross-listed course as either a metacourse, or a regular course where enrollments are re-directed to the parent course. With metacourses, enrollments are made in the child course, as usual, and the Moodle syncronizes enrollments.</li><li>Group enrollees based on child-courses - Create groups in the parent course that correspond to the child courses, and populate them accordingly.</li><li>Cross-list Fullname Prefix - Prefix for the cross-list parent course full name.</li><li>Cross-list Shortname Prefix - Prefix for the cross-list parent course short name.</li><li>Hide child courses when cross-listed - Makes a course hidden after it has been designated as a child course.</li></ul></p>';
$string['LBL_CROSSLIST_HIDE_ON_PARENT'] = 'Hide child courses when cross-listed';
$string['LBL_CROSSLIST_METHOD'] = 'Implement cross-listing using';
$string['LBL_CROSSLIST_METHOD_MERGE'] = 'Merge Course';
$string['LBL_CROSSLIST_METHOD_META'] = 'Meta Course';
$string['LBL_CROSSLIST_SHORTNAME_PREFIX'] = 'Cross-list Shortname Prefix';
$string['LBL_DISCLAIMER'] = 'License & Disclaimer';
$string['LBL_DISCLAIMER_help'] = '<h4 style="width: 100%; text-align: center;">SHEBanG Enrollment Plugin</h4><p style="width: 100%; text-align: center;">Copyright &copy; 2010 Appalachian State University, Boone, NC</p><p style="text-align: justify">Distributed under the terms of the GNU General Public License version 3. This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.<br /><br />This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.<br /><br />You should have received a copy of the GNU General Public License along with this program. If not, see <a href="http://www.gnu.org/licenses/">www.gnu.org/licenses/</a>.</p>';
$string['LBL_ENROLL'] = 'Enrollment Role Mappings';
$string['LBL_ENROLL_help'] = '<p>Enrollment mappings determine the Moodle role used when a role assignment is made in a course. For a given LMB/IMS role used in &lt;membership&gt; messages, select which Moodle role to use.</p>';
$string['LBL_ENROLLMENTS'] = 'Enrollments';
$string['LBL_ENROLLMENTS_DELETE_INACTIVE'] = 'Inactive same as delete';
$string['LBL_ENROLLMENTS_help'] = '<p>These settings affect how &lt;membership&gt; (for persons) messages are handled.</p><ul><li>Inactive same as delete - When enabled enrollments will be deleted when the membership message has a role status indicating inactive</li></ul>';
$string['LBL_ENROLL_ROLEMAP_01'] = 'Learner (01) to';
$string['LBL_ENROLL_ROLEMAP_02'] = 'Instructor (02) to';
$string['LBL_ENROLL_ROLEMAP_03'] = 'Content (03) to';
$string['LBL_ENROLL_ROLEMAP_04'] = 'Member (04) to';
$string['LBL_ENROLL_ROLEMAP_05'] = 'Manager (05) to';
$string['LBL_ENROLL_ROLEMAP_06'] = 'Mentor (06) to';
$string['LBL_ENROLL_ROLEMAP_07'] = 'Admin. (07) to';
$string['LBL_ENROLL_ROLEMAP_08'] = 'Teach Asst. (08) to';
$string['LBL_ENROLL_ROLE_NOMAP'] = 'Not Mapped';
$string['LBL_LOGGING'] = 'Logging';
$string['LBL_LOGGING_DIRPATH'] = 'Log Directory Path';
$string['LBL_LOGGING_help'] = '<p>These settings affect message and process logging.</p><ul><li>Write only errors - when checked, processing log entries will be made only when an error occurs.</li><li>Write message XML - when checked, each message received from the LMB will logged to a file in the enrol_shebang sub-directory of the moodledata directory.</li><li>Suspend Locking - no serialization. The message log file will not be locked exclusively as each LMB message import worker process handles its POST.</li><li>Log Directory Path - alternate directory in which to put process and message log files.</li></ul>';
$string['LBL_LOGGING_LOGXML'] = 'Write message XML';
$string['LBL_LOGGING_NOLOGLOCK'] = 'Suspend Locking';
$string['LBL_LOGGING_ONLYERRORS'] = 'Write only errors';
$string['LBL_MONITOR'] = 'Monitoring';
$string['LBL_MONITOR_EMAILS'] = 'Notify email address(es)';
$string['LBL_MONITOR_help'] = '<p>If this feature is enabled you can request e-mail notifications to be sent when there has not been activity for more than a specified number of minutes. The check is made during the Moodle cron job so the frequency of monitoring when the last message was received is dependent on the cron job configuration.</p><p><ul><li>Weekdays to monitor - Select the weekdays on which monitoring should take place. If no weekdays are selected, monitoring is effectively disabled.</li><li>Begin monitoring at - Time to begin monitoring activity, such as 8:00 a.m., or some other time when there is an expectation of activity.</li><li>Cease monitoring at - Time to cease monitoring activity, such as 5:00 p.m. (i.e. close of business), or some time when there is no expectation of activity.</li><li>Begin notifications after - The threshold, in minutes, after which a notification should be sent if there is no activity. Notifications will be sent every 30 minutes thereafter until a new LMB message arrives.</li><li>Notify email address(es) - A comma separated list of e-mail addresses to which to send notification.</li></ul></p>';
$string['LBL_MONITOR_START'] = 'Begin monitoring at';
$string['LBL_MONITOR_STOP'] = 'Cease monitoring at';
$string['LBL_MONITOR_THRESHOLD'] = 'Begin notifications after';
$string['LBL_MONITOR_USECOMMAS'] = 'Use commas (,) to separate addresses';
$string['LBL_MONITOR_WEEKDAYS'] = 'Weekdays to monitor';
$string['LBL_PERSON'] = 'Person Messages';
$string['LBL_PERSON_ADDRESS'] = 'Import address information';
$string['LBL_PERSON_ADDRESS_CHANGES'] = 'Apply changes to address on updates';
$string['LBL_PERSON_AUTH_METHOD'] = 'New users\' auth. method';
$string['LBL_PERSON_COUNTRY'] = 'Country for new users';
$string['LBL_PERSON_CREATE'] = 'Create user accounts';
$string['LBL_PERSON_DELETE'] = 'Action when recstatus = 3 (Delete)';
$string['LBL_PERSON_DELETE_DELETE'] = 'Delete';
$string['LBL_PERSON_DELETE_NOACTION'] = 'No Action';
$string['LBL_PERSON_DELETE_UNENROL'] = 'Unenrol';
$string['LBL_PERSON_EMAIL_CHANGES'] = 'Apply changes to e-mail on updates';
$string['LBL_PERSON_FIRSTNAME_CHANGES'] = 'Apply changes to first-name on updates';
$string['LBL_PERSON_help'] = '<p>These settings affect how &lt;person&gt; messages are handled.</p><ul><li>Create user accounts - When enabled Moodle user accounts will be created if not already present upon receipt of an LMB person message.</li><li>Action when recstatus = 3 (Delete) - Action to take when a &lt;person&gt; message arrives with a recstatus indicating the person has been deleted from Banner.</li><li>Source field for username - Field in the message from which to take the Moodle username.</li><li>Luminis\' sourcedid as failsafe - If the username can not be determined as configured, use the Luminis sourcedid (a unique value).</li><li>New users\' auth. method - The authentication method to be used for newly created users.</li><li>Shibboleth domain for new users - If Shibboleth authentication is used for new users, a domain to append to the username to match the Shibboleth fully qualified eppn.</li><li>Source field for user password - If Manual authentication is used, selects an initial password source.</li><li>Keep passwords updated - When checked users\' passwords will be updated from the LMB message.</li><li>Apply changes to first-name on updates - Overwrite the existing user\'s first name with the first name from the LMB message.</li><li>Apply changes to last-name on updates - Overwrite the existing user\'s last name with the last name from the LMB message.</li><li>Import telephone information - Populate the user\'s telephone information from the LMB message.</li><li>Apply changes to telephone on updates - Overwrite the existing user\'s telelphone with the telephone from the LMB message.</li><li>Import address information - Populate the user\'s address information from the LMB message.</li><li>Apply changes to address on updates - Overwrite the existing user\'s address with the address from the LMB message.</li><li>Source field for user\'s city - Field in the message from which to take the user\'s city (locality).</li><li>Default locality/city - If the city can not be determined as configured from the LMB message, the value to use for a new user\'s city.</li><li>Country for new users - Country to use for newly created users.</li><li>Use SCTID for idnumber - when checked the Moodle user idnumber field will be populated with the SCTID (Banner) userid rather than the source (Luminis) id.</li></ul>';
$string['LBL_PERSON_IDNUMBER_SCTID'] = 'Use SCTID for idnumber';
$string['LBL_PERSON_LASTNAME_CHANGES'] = 'Apply changes to last-name on updates';
$string['LBL_PERSON_LOCALITY'] = 'Source field for user\'s city';
$string['LBL_PERSON_LOCALITY_DEF'] = 'Default configured value';
$string['LBL_PERSON_LOCALITY_DEFAULT'] = 'Default locality/city';
$string['LBL_PERSON_LOCALITY_IFF'] = 'Locality if present, else Default';
$string['LBL_PERSON_LOCALITY_MSG'] = 'Locality field from LMB Message';
$string['LBL_PERSON_PASSWORD'] = 'Source field for user password';
$string['LBL_PERSON_PASSWORD_CHANGES'] = 'Keep passwords updated';
$string['LBL_PERSON_PASSWORD_INFO'] = 'Only effective for Manual auth.';
$string['LBL_PERSON_PASSWORD_RANDOM'] = 'Random String';
$string['LBL_PERSON_PASSWORD_USERID_LOGON'] = 'Banner Password';
$string['LBL_PERSON_PASSWORD_USERID_SCTID'] = 'SCTID Password';
$string['LBL_PERSON_SHIB_DOMAIN'] = 'Shibboleth domain for new users';
$string['LBL_PERSON_TELEPHONE'] = 'Import telephone information';
$string['LBL_PERSON_TELEPHONE_CHANGES'] = 'Apply changes to telephone on updates';
$string['LBL_PERSON_USERNAME'] = 'Source field for username';
$string['LBL_PERSON_USERNAME_EMAIL'] = 'E-mail address (username@domain)';
$string['LBL_PERSON_USERNAME_FAILSAFE'] = 'Luminis\' sourcedid as failsafe';
$string['LBL_PERSON_USERNAME_FAILSAFE_INFO'] = 'Used if username undetected and otherwise blank';
$string['LBL_PERSON_USERNAME_USERID_EMAIL'] = 'E-mail user name (no domain)';
$string['LBL_PERSON_USERNAME_USERID_LOGON'] = 'Banner user name';
$string['LBL_PERSON_USERNAME_USERID_SCTID'] = 'Banner Id';
$string['LBL_RESPONSES'] = 'Server Responses';
$string['LBL_RESPONSES_200_ON_ERROR'] = 'Send HTTP 200 on error';
$string['LBL_RESPONSES_EMAILS'] = 'Notify email address(es)';
$string['LBL_RESPONSES_NOTIFY_ON_ERROR'] = 'Error notification';
$string['LBL_SECURE'] = 'Security (Connections)';
$string['LBL_SECURE_help'] = '<p>If in your hosting environment you are unable to restrict access to the <b>secure/post.php</b> file using Apache configs or an .htaccess file, then you can optionally supply a username and password here.<br /><br />If you can secure the directory/file with Apache configs or an .htaccess file, there is no need to use this feature, and both the Username and Password fields should be left blank.</p><p><ul><li>Username - a username to use for access</li><li>Password - a corresponding password to use for access</li><li>HTTP Auth. Method - Digest (default) or Basic (clear-text)</li></ul></p>';
$string['LBL_SECURE_METHOD'] = 'HTTP Auth. Method';
$string['LBL_SECURE_METHOD_BASIC'] = 'Basic';
$string['LBL_SECURE_METHOD_DIGEST'] = 'Digest';
$string['LBL_SECURE_PASSWD'] = 'Password';
$string['LBL_SECURE_USERNAME'] = 'Username';
$string['LBL_TOOLS_FILES'] = 'SHEBanG Manage Files';
$string['LBL_TOOLS_IMPORT'] = 'SHEBanG Import File';
$string['LBL_TOOLS_IMPORT_CANCEL'] = 'Cancel';
$string['LBL_TOOLS_IMPORT_help'] = '<p>Import a previously uploaded file, or upload a new file.</p>';
$string['LBL_TOOLS_IMPORT_LINK_DELETE'] = 'Delete File';
$string['LBL_TOOLS_IMPORT_LINK_IMPORT'] = 'Import File';
$string['LBL_TOOLS_IMPORT_SAVE'] = 'Save to SHEBanG files';
$string['LBL_TOOLS_IMPORT_SELECT'] = 'Select file to import';
$string['LBL_TOOLS_IMPORT_UPLOAD'] = 'Upload or select a file';
$string['LBL_TOOLS_INDEX'] = 'SHEBanG Admin. Utilities';
$string['LBL_TOOLS_LINK'] = 'Admin. Utilities: <a href="{$a}">Click Here</a>';
$string['LBL_VERSION'] = 'SHEBanG Enrollment Plugin Version {$a}';
$string['pluginname'] = 'SHEBanG';
$string['shebang:unenrol'] = 'Unenrol users from course';
