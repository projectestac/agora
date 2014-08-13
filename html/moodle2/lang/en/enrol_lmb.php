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
 * Strings for component 'enrol_lmb', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_lmb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving'] = 'Once you have saved your settings, you may wish to';
$string['always'] = 'Always';
$string['assignroles'] = 'Assign Roles';
$string['authmethod'] = 'Set authorization method to';
$string['authmethodhelp'] = 'Select what authorization method the LMB module should set accounts to.';
$string['bannerextractimport'] = 'Banner XML Import';
$string['bannerxmlfolder'] = 'Banner XML folder location';
$string['bannerxmlfoldercomp'] = 'Treat the Banner XML folder as comprehensive';
$string['bannerxmlfoldercomphelp'] = 'If this option is selected, then enrolments missing from the extract files will be dropped.';
$string['bannerxmlfolderhelp'] = 'The path (on the Moodle server) to the directory where a set of XML files will be located.';
$string['bannerxmllocation'] = 'Banner XML file location';
$string['bannerxmllocationcomp'] = 'Treat the Banner XML file as comprehensive';
$string['bannerxmllocationcomphelp'] = 'If this option is selected, then enrolments missing from the extract file will be dropped.';
$string['bannerxmllocationhelp'] = 'The path (on the Moodle server) where the XML file that you would like to import resides.';
$string['bizdowngrace'] = 'Message grace time during business hours';
$string['bizdowngracehelp'] = 'How many minutes can elapse since the last LMB message before warning emails are sent out during business hours. Set to 0 to disable checks during this period.';
$string['categorytype'] = 'Course Categories';
$string['categorytypehelp'] = 'This allows you select what categories you would like courses to be created in. Options:
<ul>
<li>Terms: This setting will cause courses to be placed in categories with the name of their term/semester.
<li>Departments: This setting will cause courses to be placed in categories with the name of their host department.
<li>Department Codes: Uses the department short code, instead of full name.
<li>Terms then Departments: This setting will cause courses to be placed in categories with the name of their host department, which is contained in a parent term named for the term/semester.
<li>Terms then Department Codes: Same as Terms then Departments, but uses the department short code instead of its full name.
<li>Selected: With this setting, select the existing category you would like courses to be placed in from the second drop down menu.
</ul>';
$string['cathidden'] = 'Create new categories as hidden';
$string['cathiddenhelp'] = 'Create new categories as hidden.';
$string['catselect'] = 'Selected Category';
$string['catselecthelp'] = '';
$string['commadelimit'] = '(Comma delimited)';
$string['computesections'] = 'Compute number of sections';
$string['computesectionshelp'] = 'Compute the number of sections/topics to display, based on the number of weeks in a course.';
$string['consolidateusers'] = 'Consolidate existing usernames';
$string['consolidateusershelp'] = 'If user cannot be found with the expected sourcedid(idnumber), but a username match is found, the accounts will be consolidated. Only use this option if you know that usernames are unique and will not collide.';
$string['coursehidden'] = 'Create new courses as hidden';
$string['coursehiddenalways'] = 'Always';
$string['coursehiddencron'] = 'Based on cron setting';
$string['coursehiddenhelp'] = 'Specify if new courses should be created hidden or not. Options:
<ul>
<li>Never: Courses will never be created hidden (ie always created visible)
<li>Based on cron setting: Course will be created with it\'s visibility set based on the \'Unhide this many days before course start\' setting. If the course start date has already past, or starts within the number of days specified, it will be visible. If it occurs further in the future, it will be created hidden.
<li>Always: Courses will always be created hidden
</ul>';
$string['coursehiddennever'] = 'Never';
$string['courseshorttitle'] = 'Course short name';
$string['courseshorttitlehelp'] = 'This contains the template for creating the short course name. See above for available tags.';
$string['coursetitle'] = 'Course full name';
$string['coursetitlehelp'] = 'This contains the template for creating the full course name.
<p>You can dictate how you would like the course full and short names formatted using the following flags. Any occurrence of these flags in the setting will
be replaced with the appropriate information about the course. Any text that is not apart of a flag will be left as is.</p>
<p><ul>
<li>[SOURCEDID] - Same as [CRN].[TERM]<br />
<li>[CRN] - The course/section number<br />
<li>[TERM] - The term code<br />
<li>[TERMNAME] - The full name of the term<br />
<li>[LONG] - The same as [DEPT]-[NUM]-[SECTION]<br />
<li>[FULL] - The full title of the course<br />
<li>[RUBRIC] - The same as [DEPT]-[NUM]<br />
<li>[DEPT] - The short department code<br />
<li>[NUM] - The department code for the course<br />
<li>[SECTION] - The section number of the course<br />
</ul></p>
<p>Example: The setting \'[RUBRIC]-[CRN]-[FULL]\' would look like \'ENG-341-12345-English History\' for a course with that information.</p>';
$string['createnewusers'] = 'Create user accounts for users not yet registered in Moodle';
$string['createnewusershelp'] = 'This setting will allow the LMB module to create new Moodle users as directed by Banner/LMB.';
$string['createusersemaildomain'] = 'Only create users with email in this domain';
$string['createusersemaildomainhelp'] = 'If this setting has a value, only users who have an email address in the given domain will have an account generated for them by the LMB module.';
$string['cron'] = 'Cron Options';
$string['cronunhidecourses'] = 'Unhide Courses';
$string['cronunhidecourseshelp'] = 'With this option selected, each night around midnight, the module will automatically unhide and Banner/LMB courses that start within the number of days specified in \'Unhide this many days before course start\'. For example, if this option is selected, \'Unhide this many days before course start\' is set to 7, and there is a course that starts on 2009-06-14, then it will automatically be made visible on the morning of 2009-06-07. The start date of the course is determined by the timeframe->begin date supplied with the course by Banner/LMB.';
$string['cronunhidedays'] = 'Unhide this many days before course start';
$string['cronunhidedayshelp'] = 'This is the number of days before the start of a course to unhide it. Set to 0 for the course to unhide on the day it starts.';
$string['cronxmlfile'] = 'Check XML File during cron';
$string['cronxmlfilehelp'] = 'With this option enabled, each time cron is called, the module will check the XML File to see if its modification date has changed since the last time it was processed. If it has, then it will processed.';
$string['cronxmlfolder'] = 'Check XML Folder during cron';
$string['cronxmlfolderhelp'] = 'With this option enabled, each time cron is called, the module will attempt to process the extract folder.';
$string['customfield1help'] = 'Shortname of the custom field to map to.';
$string['customfield1mapping'] = 'Custom profile field';
$string['customfield1source'] = 'Custom profile field source';
$string['customfield1sourcehelp'] = 'Source for the custom user profile field';
$string['defaultcity'] = 'City';
$string['defaultcityhelp'] = 'What to use as the city.
<ul>
<li>User XML \'locality\': Use the value supplied by the XML.
<li>Use given if \'locality\' missing: Use the value supplied by the XML, or the given city if not specified.
<li>Always use given city:  Always use the specified city.
</ul>';
$string['deleteusers'] = 'Delete user accounts when specified in XML';
$string['deleteusershelp'] = 'If this setting it checked, LMB module will delete user records from Moodle when directed.';
$string['deptcat'] = 'Departments';
$string['deptcodecat'] = 'Department Codes';
$string['description'] = 'This module provides a way to integrate Moodle with Banner. You can either use the Luminis Message Broker to provide realtime updates, in the same way as WebCT, or using Banner export files. <br /><br />This module is not affiliated with, or endorsed by Ellucian in any way.';
$string['disableenrol'] = 'Disable Enrolments on Drop';
$string['disableenrolhelp'] = 'Disable enrolments instead of unenroling them. Prevents possible data loss in some versions and configurations of Moodle when users are dropped and re-added to a course.';
$string['disablesecurity'] = 'Disable Security';
$string['disablesecurityhelp'] = 'When checked, authentication on the LMB will be disabled. This creates a security hole, but may be needed for some connection setups, or testing.';
$string['donterroremail'] = 'Don\'t error on skipped user due to email';
$string['donterroremailhelp'] = 'If selected, a user missing an email address will not produce a log error.';
$string['dropprecentlimit'] = 'Do not drop if more than this percent of enrolments';
$string['dropprecentlimithelp'] = 'When doing comprehensive XML processing, missing enrolments are treated as drops. This setting will cause the module to skip the drop process if more than this percent of total enrolments in a term are set to be dropped';
$string['emailname'] = 'Email name (before @)';
$string['endbiztime'] = 'End of business hours';
$string['endbiztimehelp'] = 'This is the ending time for business hours.';
$string['forceadr'] = 'Force address/city on update';
$string['forceadrhelp'] = 'Always force the users address/city to match the XML, even if it has been manually changed.';
$string['forcecat'] = 'Force category on update';
$string['forcecathelp'] = 'This option will cause the category to changed to the above setting whenever a LMB/Banner update occurs, even if it has been manually changed.';
$string['forcecomputesections'] = 'Force compute sections';
$string['forcecomputesectionshelp'] = 'Force section count on update.';
$string['forceemail'] = 'Force email address on update';
$string['forceemailhelp'] = 'Always force the users email address to match the XML, even if it has been manually changed.';
$string['forcename'] = 'Force name on update';
$string['forcenamehelp'] = 'Always force the users name to match the XML, even if it has been manually changed.';
$string['forcepassword'] = 'Force password on update';
$string['forcepasswordhelp'] = 'When set and when a proper auth type and source are set, the users password is set to the LMB password whenever a message is received. If unchecked, the password will only be set on user creation.';
$string['forceshorttitle'] = 'Force course short name on update';
$string['forceshorttitlehelp'] = 'If this option is selected then whenever an update occurs to a course through LMB/Banner the short name will be set as described in the \'Course short name\' settings, even if the short name has been manually changed. If is option is not set, then the short name will only be set during initial course creation.';
$string['forcetele'] = 'Force telephone number on update';
$string['forcetelehelp'] = 'Always force the users telephone number to match the XML, even if it has been manually changed.';
$string['forcetitle'] = 'Force course name on update';
$string['forcetitlehelp'] = 'If this option is selected then whenever an update occurs to a course through LMB/Banner the name will be set as described in the \'Course full name\' settings, even if the name has been manually changed. If is option is not set, then the name will only be set during initial course creation.';
$string['fullemail'] = 'Full email address';
$string['header'] = 'You are using Banner/Luminis Message Broker Module version {$a->version}.<br>
LMB Tools have moved to the setting block, under Site Administration>Plugins>Enrolments>Banner/Luminis Message Broker>Tools</a>.';
$string['ignoredomaincase'] = 'Ignore domain capitalization';
$string['ignoredomaincasehelp'] = 'Set the domain comparison to case insensitive.';
$string['ignoreemailcase'] = 'Ignore email address capitalization';
$string['ignoreemailcasehelp'] = 'All email addresses will be converted to lowercase when this option is selected.';
$string['ignoreusernamecase'] = 'Ignore username capitalization';
$string['ignoreusernamecasehelp'] = 'All usernames will be converted to lowercase when this option is selected.';
$string['importnow'] = 'import right now';
$string['includeadr'] = 'Include address/city';
$string['includeadrhelp'] = 'Include the users address/city in the Moodle profile.';
$string['includetele'] = 'Include telephone';
$string['includetelehelp'] = 'Include the users telephone number in the Moodle profile, if supplied by the XML.';
$string['lmbcheck'] = 'LMB Downtime Notification';
$string['lmbcheckhelp'] = 'When this box is checked, a check will be run during each cron period, to verify that Luminis Message Broker is sending messages to Moodle.';
$string['lmb:enrol'] = 'Enrol users';
$string['lmb:manage'] = 'Manage user enrolments';
$string['lmbnotificationemails'] = 'Notification email addresses';
$string['lmbnotificationemailshelp'] = 'A comma separated list of all email address that should receive warning messages from the LMB time check.';
$string['lmbpasswd'] = 'Password';
$string['lmbpasswdhelp'] = 'This is the password setting used to limit access to the LMB interface. Should match settings in Luminis Message Broker config.';
$string['lmbsecurity'] = 'LMB Live Import Security';
$string['lmb:unenrol'] = 'Unenrol users from the course';
$string['lmb:unenrolself'] = 'Unenrol self from the course';
$string['lmbusername'] = 'Username';
$string['lmbusernamehelp'] = 'This is the password setting used to limit access to the LMB interface. Should match settings in Luminis Message Broker config.';
$string['locality'] = 'User XML \'locality';
$string['logerrors'] = 'Only log errors';
$string['logerrorshelp'] = 'If this box is checked, only errors will be recorded to the logfile. If it is not checked, all events will be recorded.';
$string['logpercent'] = 'Log % complete when running batch processes.';
$string['logsettings'] = 'Log settings';
$string['logtolocation'] = 'Log file output location (blank for no logging)';
$string['logtolocationhelp'] = 'This is the location you would like the log file to be saved to. This should be an absolute path on the server. The file specified should already exist, and needs to be writable by the webserver process.';
$string['never'] = 'Never';
$string['nickname'] = 'Use nickname';
$string['nicknamehelp'] = 'If the nickname is included XML, use it instead of the proper name first name.';
$string['nomessage'] = 'No messages received from Luminis Message Broker';
$string['nomessagefull'] = 'Moodle has not received a message from Luminis Message Broker in {$a}.';
$string['nonbizdowngrace'] = 'Message grace time during non business hours';
$string['nonbizdowngracehelp'] = 'How many minutes can elapse since the last LMB message before warning emails are sent out during non-business hours. Set to 0 to disable checks during this period.';
$string['none'] = 'None';
$string['onerror'] = 'Only on error';
$string['otherpassword'] = 'Other Password Source';
$string['otherpasswordhelp'] = '';
$string['otheruserid'] = 'Other User ID Source';
$string['otheruseridhelp'] = '';
$string['page_cleanxlsdrops'] = 'Clean XLS Drops';
$string['page_extractprocess'] = 'Process Extract';
$string['page_importnow'] = 'Process File';
$string['page_lmbstatus'] = 'LMB Status';
$string['page_prunelmbtables'] = 'Prune Tables';
$string['page_reprocessenrolments'] = 'Reprocess Enrolments';
$string['parsecourse'] = 'XML Parse - Course';
$string['parsecoursexml'] = 'Parse Course XML';
$string['parsecoursexmlhelp'] = 'Process course XML records. When unchecked, records will be completely skipped.';
$string['parseenrol'] = 'XML Parse - Enrolment';
$string['parseenrolxml'] = 'Parse Enrolment XML';
$string['parseenrolxmlhelp'] = 'Process enrolment records. Parse Course and Parse Person must be on. When unchecked, records will be completely skipped.';
$string['parseperson'] = 'XML Parse - Person';
$string['parsepersonxml'] = 'Parse Person XML';
$string['parsepersonxmlhelp'] = 'Process person XML records. When unchecked, records will be completely skipped.';
$string['parsexls'] = 'XML Parse - Crosslisting';
$string['parsexlsxml'] = 'Parse Crosslist XML';
$string['parsexlsxmlhelp'] = 'When checked, Crosslist XML will be processed. Course XML parsing must be on. When unchecked, records will be completely skipped.';
$string['passwordsource'] = 'Password source';
$string['passwordsourcehelp'] = 'This determines what will be the password of created users
<ul>
<li>None: Do not set an internal Moodle password. Use this option if you are using an external authorization method, such as LDAP.
<li>useridtype - Login ID: Use the value supplied in the password field of the userid tag marked \'Login ID\'.
<li>useridtype - SCTID: Use the value supplied in the password field of the userid tag marked \'SCTID\'.
<li>useridtype - Email ID: Use the value supplied in the password field of the userid tag marked \'Email ID\'.
<li>useridtype - Other: Use the value supplied in the password field of the userid tag marked as indicated in the text box.
</ul>';
$string['performlmbcheck'] = 'Perform LMB downtime check';
$string['pluginname'] = 'Banner/Luminis Message Broker';
$string['recovergrades'] = 'Recover olds grades for re-enrolled users';
$string['recovergradeshelp'] = 'If users are being re-enrolled in a course, try and recover old grades. This was the standard behavior in Moodle 1.9.x and below.';
$string['removelangs'] = '<b><font color=red>Notice:</font> It appears that old Banner/Luminis Message Broker language files are still installed. Please remove the file \'$a/enrol_lmb.php\' and the folder \'$a/help/enrol/lmb\'.</b>';
$string['selectedcat'] = 'Selected:';
$string['sourdidfallback'] = 'Fallback to sourcedid if username not found';
$string['sourdidfallbackhelp'] = 'Set the userid to the persons sourcedid if a username is not found. In general users will not know this number, so will not be able to login, but it will create the account as a placeholder until more complete data is received.';
$string['standardcity'] = 'Standard City';
$string['standardcityhelp'] = '';
$string['startbiztime'] = 'Start of business hours';
$string['startbiztimehelp'] = 'This is the starting time for what you consider business (peak) hours (Monday-Friday). This allows you to set different time allowences before LMB is considered down, depending on time of day.';
$string['storexml'] = 'Store raw XML from LMB in table';
$string['storexmlhelp'] = 'This dictates when XML messages from Luminis Message Broker are stored in the enrol_lmb_raw_xml table. This allows for greater troubleshooting, but the XML main contain sensitive data that should not be stored. Options:
<ul>
<li>Never: XML will never be stored.
<li>On Error: XML will only be stored if there is an error processing it.
<li>Always: XML will always be stored.
</ul>';
$string['termcat'] = 'Terms';
$string['termdeptcat'] = 'Terms then Departments';
$string['termdeptcodecat'] = 'Terms then Department Codes';
$string['tools'] = 'Tools';
$string['unenrolmember'] = 'Unenrol members from course when directed';
$string['unenrolmemberhelp'] = 'Unenrol (or \'drop\') members from a course when an appropriate XML message is received.';
$string['usemoodlecoursesettings'] = 'Use Moodle default course settings';
$string['usemoodlecoursesettingshelp'] = 'When creating a new course, use the default course setting options found in the Moodle admin settings, instead of the settings hard-coded in this module.';
$string['userestrictdates'] = 'Use Restrict Dates';
$string['userestrictdateshelp'] = 'If specified in the enrolment, set enrolment begin and end dates in Moodle.';
$string['useridtypeemail'] = 'useridtype - Email ID';
$string['useridtypelogin'] = 'useridtype - Login ID';
$string['useridtypeother'] = 'useridtype - Other:';
$string['useridtypesctid'] = 'useridtype - SCTID';
$string['usernamesource'] = 'Username source';
$string['usernamesourcehelp'] = 'This determines what will be the username of created users
<ul>
<li>Full email address: The entire email address is used as the username.
<li>Email name (before @): Use the portion of the email address before the @.
<li>useridtype - Login ID: Use the value supplied in the userid tag marked \'Login ID\'.
<li>useridtype - SCTID: Use the value supplied in the userid tag marked \'SCTID\'.
<li>useridtype - Email ID: Use the value supplied in the userid tag marked \'Email ID\'.
<li>useridtype - Other: Use the value supplied in the userid tag marked as indicated in the text box.
</ul>';
$string['usestandardcity'] = 'Always use given city:';
$string['usestandardcityxml'] = 'Use given if \'locality\' missing:';
$string['usestatusfiles'] = 'Use status files for XML folder';
$string['usestatusfileshelp'] = 'This option creates files in the XML folder to indicate the current status of processing. This allows external scripts to be aware of the current status, so they do not modify the directory contents on a currently processing extract.</p>
<p>If this option is checked, then the Banner XML Folder must be writable by the webserver. To allow an extract to start, you must place an empty, writable file in the XML folder called \'start\'. When the extract process has begun, the script will remove that file, and create a file called \'processing\'. When the processing has completed, the \'processing\' file will be removed, and a file \'done\' will be created.</p>';
$string['xlsmergecourse'] = 'Merged course';
$string['xlsmergegroups'] = 'Place users in merged courses into groups';
$string['xlsmergegroupshelp'] = 'If this option is selected, then users will be placed into groups with a merged course based on their original course number.';
$string['xlsmetacourse'] = 'Meta course';
$string['xlsshorttitle'] = 'Crosslisted course short name';
$string['xlsshorttitledivider'] = 'Short name divider';
$string['xlsshorttitledividerhelp'] = 'This is the string that will be placed between each member string defined in \'Short name repeater\'. See Crosslist full divider description for details.';
$string['xlsshorttitlehelp'] = 'This contains the template for creating the short course name for crosslisted courses. See Crosslist full title description for details.';
$string['xlsshorttitlerepeat'] = 'Short name repeater';
$string['xlsshorttitlerepeathelp'] = 'This contains the template for [REPEAT] section of the course short name, and will be repeated for each member course in the crosslist. See Crosslist full repeater description for details.';
$string['xlstitle'] = 'Crosslisted course full name';
$string['xlstitledivider'] = 'Full name divider';
$string['xlstitledividerhelp'] = 'This is the string that will be placed between each member string defined in \'Full name repeater\'.
<p>The \'name divider\' is placed between each \'name repeater\'/</p>
<p>The \'name divider\' should not contain any replacement flags.</p>
<p>Example: Say you have two courses, 12345.200710 and 54321.200710, and they are crosslisted with the crosslist code XLSAA200710. If you set \'Crosslisted course full name\' to \'[XLSID] - [REPEAT]\', \'Full name repeater\' to \'[CRN]\', and \'Full name divider\' to \' / \', the resulting full title of the crosslisted course would be \'XLSAA200710 - 12345 / 54321\'.</p>';
$string['xlstitlehelp'] = 'This contains the template for creating the full course name for crosslisted courses.
<p>The crosslisted name template works in the same way, as the \'Course full name\' setting, with a few differences, as outlined here.</p>
<p>The crosslisted name template can contain the same flags as \'Course full name<?php helpbutton(\'coursetitle\', \'More detail about this option\', \'enrol-lmb\'); ?>\'. If any of these flags are found, they will be replaced with the corresponding data from the first course to join the crosslist</p>
<p>In addition to the standard flags, 2 new flags are added:
<ul>
<li>[XLSID] - The Banner identifier for the crosslist<br />
<li>[REPEAT] - The flag will be replaced by the string generated with the \'name repeater\' and \'name divider\' settings.<br />
</ul></p>
<p>Example: Say you have two courses, 12345.200710 and 54321.200710, and they are crosslisted with the crosslist code XLSAA200710. If you set \'Crosslisted course full name\' to \'[XLSID] - [REPEAT]\', \'Full name repeater\' to \'[CRN]\', and \'Full name divider\' to \' / \', the resulting full title of the crosslisted course would be \'XLSAA200710 - 12345 / 54321.</p>';
$string['xlstitlerepeat'] = 'Full name repeater';
$string['xlstitlerepeathelp'] = 'This contains the template for [REPEAT] section of the course full name, and will be repeated for each member course in the crosslist.
<p>The \'name repeater\' value works the same way as the \'Course full name\' setting, except that it will be repeated for each member course in the crosslist, and the \'name divider\' will be placed in between subsequent repetitions.</p>
<p>The name repeaters can contain the same flags as \'Course full name<?php helpbutton(\'coursetitle\', \'More detail about this option\', \'enrol/lmb\'); ?>\'.</p>
<p>In addition to the standard flags, 1 new flags is added:
<ul>
<li>[XLSID] - The Banner identifier for the crosslist<br />
</ul></p>
<p>Example: Say you have two courses, 12345.200710 and 54321.200710, and they are crosslisted with the crosslist code XLSAA200710. If you set \'Crosslisted course full name\' to \'[XLSID] - [REPEAT]\', \'Full name repeater\' to \'[CRN]\', and \'Full name divider\' to \' / \', the resulting full title of the crosslisted course would be \'XLSAA200710 - 12345 / 54321\'.</p>';
$string['xlstype'] = 'Crosslisted course type';
$string['xlstypehelp'] = 'This determines how crosslisted courses will be handled in Moodle. Options:
<ul>
<li>Merged course: This setting will cause the separate courses of the crosslist to be left empty, with no enrollments. All members will be enrolled directly into the crosslisted course.
<li>Meta course: This setting will cause members to be enrolled in the individual courses, while the crosslsted course is formed by making a meta-course containing all the individual courses.
</ul>';
