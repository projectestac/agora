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
 * Strings for component 'block_facility_to_moodle', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_facility_to_moodle
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['access'] = 'Microsoft Access';
$string['ad'] = 'Address';
$string['add'] = 'Add BDN';
$string['addstu'] = 'Add Groups';
$string['ag'] = 'Policy Agreed';
$string['back'] = 'Return to Block Settings';
$string['bdn'] = 'BDN<br /><span class="babytxt">(eg: <i>ou=2011, ou=Pupils, ou=Ossett School Users, dc=ossettschool, dc=co, dc=uk</i>)</span>';
$string['bdnname'] = 'BDN Name<br /><span class="babytxt">(reference only)</span>';
$string['blockmenutitle'] = 'Facility To Moodle';
$string['blockname'] = 'Facility To Moodle';
$string['ch'] = 'Children';
$string['clgr'] = 'Class Group';
$string['del'] = 'Delete';
$string['descconfig'] = '<p>You will need to define all your BDNs for your users at the link below, then return here to enter the rest of your settings.</p>';
$string['descdbpass'] = 'Password required by your server type to access your Facility Database';
$string['descdbq'] = 'Only needed/used if DBType is set to Access. This is the path to your MS Access mdb file';
$string['descdbtype'] = 'Choose your Facility database server type... either MS Access, or MS SQL';
$string['descdbuser'] = 'Username required by your server type to access your Facility Database';
$string['descdefaults'] = 'The following settings define default values for the remaining profile fields.';
$string['descdset'] = 'This should be your current dataset, eg: 2011/2012, and will need to be changed each summer';
$string['descdsn'] = 'This is the DSN configured within /etc/odbc.ini as part of your webserver\'s unixODBC installation';
$string['descfacdet'] = 'The following settings define your Facility database.';
$string['descfauth'] = 'Forces the default authentication type to that specified. Note, this block is designed for use with the LDAPCapture plugin, therefore this field should generally be set to \'ldapcapture\'. This setting is applied to staff and student accounts. Parent accounts remain on \'manual\' authentication regardless.';
$string['descfirstyr'] = 'The first yeargroup enrolled at your school (usually 7)';
$string['desciaml'] = 'Enables the ability to export CSV files suitable for upload to <a href="https://www.iamlearning.co.uk/" target="_blank">I Am Learning</a>';
$string['desclastyr'] = 'The final yeargroup enrolled at your school (usually 13)';
$string['descmanage'] = '<p>The Facility to Moodle Block needs to know the location of your users within ActiveDirectory. For example...</p><ul><li>BDN Name: Year 7</li><li>BDN: ou=2007, ou=Pupils, ou=School Users, dc=school, dc=co, dc=uk</li><li>Type: Student</li></ul>';
$string['descmisc'] = 'The following settings fall into the \'Misc\' category.';
$string['descparaccs'] = 'The following settings allow you to specify prefixes onto Parent name fields within Moodle. This can make identification simpler when performing user management tasks.';
$string['descparforce'] = 'Forces parents to change their password from the generated default on first login [RECOMMENDED]';
$string['descparfpref'] = 'Gets added to the beginning of the parent\'s forename in their Moodle Account';
$string['descparlpref'] = 'Prefix for the login. This defaults to "p-", therefore, all Parent account usernames will begin with "p-"';
$string['descparspref'] = 'Gets added to the beginning of the parent\'s surname in their Moodle Account';
$string['descscou'] = 'This value becomes the default for the Country field within Moodle';
$string['descsdomain'] = 'The DOMAIN in which your students reside (eg: curriculum)';
$string['descsdomainsrv'] = 'The machine name of your student domain server (eg: server1). This needs to be resolvable at command line by your webserver, otherwise, use IP Address';
$string['descslang'] = 'This value becomes the default for the Language field within Moodle';
$string['descstaaccs'] = 'The following settings allow you to specify prefix and suffixes onto your staff members\' name fields within Moodle. This can make identification simpler when performing user management tasks.';
$string['descstafai'] = 'Replaces the member of staff\'s forename within Moodle with their initial.';
$string['descstaffad'] = 'The following settings define the domain and server (domain controller) on which your staff accounts reside, along with credentials to read those details.';
$string['descstaffdom'] = 'The DOMAIN in which your staff members reside (eg: curriculum)';
$string['descstaffdserv'] = 'The machine name of your staff domain server (eg: server1). This needs to be resolvable at command line by your webserver, otherwise, use IP Address';
$string['descstaffeml'] = 'Presuming that your staff email accounts are in the format [ADUsername]@somewhere.co.uk, this setting defines what appears AFTER the ADUsername (eg: @myschool.co.uk)';
$string['descstaffldpass'] = 'Password for the above username';
$string['descstafflduser'] = 'An LDAP / AD based account with READ access to your student OUs';
$string['descstaffmatch'] = '<b>Whichever field you specify above, it must contain the user\'s staffcode from Facility.</b>';
$string['descstafpref'] = 'Gets added to the beginning of the staff member\'s forename in their Moodle Account';
$string['descstafsuff'] = 'Gets added to the end of the staff member\'s forename in their Moodle Account';
$string['descstaspref'] = 'Gets added to the beginning of the staff member\'s surname in their Moodle Account';
$string['descstassuff'] = 'Gets added to the end of the staff member\'s surname in their Moodle Account';
$string['descstown'] = 'This value becomes the default for the Town/City field within Moodle';
$string['descstuaccs'] = 'The following settings allow you to specify prefix and suffixes onto your students\' name fields within Moodle. This can make identification simpler when performing user management tasks.';
$string['descstuads'] = 'The following settings define the domain and server (domain controller) on which your student accounts reside, along with credentials to read those details. <b>Please note, the Description field within AD needs to be pre-populated with the student\'s Admin number from Facility.</b>';
$string['descstufpref'] = 'Gets added to the beginning of the student\'s forename in their Moodle Account';
$string['descstufsuff'] = 'Gets added to the end of the student\'s forename in their Moodle Account';
$string['descstulpwd'] = 'Password for the above username';
$string['descstuluser'] = 'An LDAP / AD based account with READ access to your student OUs';
$string['descstuspref'] = 'Gets added to the beginning of the student\'s surname in their Moodle Account';
$string['descstussuff'] = 'Gets added to the end of the student\'s surname in their Moodle Account';
$string['dob'] = 'Date of Birth';
$string['edit'] = 'Edit';
$string['erroradminsonly'] = 'You must be an administrator to do this.';
$string['fa'] = 'First Access';
$string['Facility'] = 'Facility To Moodle';
$string['facility_to_moodle:listparentaccounts'] = 'Show Parents';
$string['facility_to_moodle:validateparentdata'] = 'Validate Parents';
$string['fn'] = 'Forename';
$string['headerconfig'] = 'ActiveDirectory User BDNs / OUs';
$string['headermanage'] = '<h2>Facility to Moodle > Setup BDNs</h2>';
$string['iOS'] = '<p style="text-align:center"><b>NB: If you\'re an iOS user, you\'re seeing this due to a conflict between jQuery Mobile and Moodle\'s YUI library. Don\'t worry! Everything should still have worked!</p>';
$string['la'] = 'Last Access';
$string['labeldbpass'] = 'Database Password';
$string['labeldbq'] = 'MS Access DataSource Name';
$string['labeldbtype'] = 'Database Server/Type';
$string['labeldbuser'] = 'Database Username';
$string['labeldefaults'] = 'Account Defaults';
$string['labeldset'] = 'Facility Dataset';
$string['labeldsn'] = 'MSSQL DataSource Name';
$string['labelfacdet'] = 'Facility Database Details';
$string['labelfauth'] = 'Force AuthType';
$string['labelfirstyr'] = 'First Yeargroup';
$string['labeliaml'] = 'Enable \'I am Learning\' exports?';
$string['labellastyr'] = 'Last Yeargroup';
$string['labelmisc'] = 'Miscellaneous Options';
$string['labelparaccs'] = 'Parent Moodle Account Creation';
$string['labelparforce'] = 'Force Password Change';
$string['labelparfpref'] = 'Parent Forename Prefix';
$string['labelparlpref'] = 'Parent Login Prefix';
$string['labelparspref'] = 'Parent Surname Prefix';
$string['labelscou'] = 'Default Country';
$string['labelsdomain'] = 'Student LDAP DOMAIN';
$string['labelsdomainsrv'] = 'Student DOMAIN Server';
$string['labelslang'] = 'Default Language';
$string['labelstaaccs'] = 'Staff Moodle Account Creation';
$string['labelstafai'] = 'Replace Staff Forename with Initial';
$string['labelstaffad'] = 'Staff ActiveDirectory Details';
$string['labelstaffdom'] = 'Staff LDAP DOMAIN';
$string['labelstaffdserv'] = 'Staff DOMAIN Server';
$string['labelstaffeml'] = 'Staff E-Mail Domain';
$string['labelstaffldpass'] = 'READ AD Password';
$string['labelstafflduser'] = 'READ AD Username';
$string['labelstaffmatch'] = 'AD Field to match';
$string['labelstafpref'] = 'Staff Forename Prefix';
$string['labelstafsuff'] = 'Staff Forename Suffix';
$string['labelstaspref'] = 'Staff Surname Prefix';
$string['labelstassuff'] = 'Staff Surname Suffix';
$string['labelstown'] = 'Default Town/City';
$string['labelstuaccs'] = 'Student Moodle Account Creation';
$string['labelstuads'] = 'Student ActiveDirectory Details';
$string['labelstufpref'] = 'Student Forename Prefix';
$string['labelstufsuff'] = 'Student Forename Suffix';
$string['labelstulpwd'] = 'READ AD Password';
$string['labelstuluser'] = 'READ AD Username';
$string['labelstuspref'] = 'Student Surname Prefix';
$string['labelstussuff'] = 'Student Surname Suffix';
$string['listparent'] = 'Show Parents';
$string['ll'] = 'Last Login';
$string['managebdns'] = 'Setup BDNs';
$string['mf'] = 'Moodle Firstname';
$string['ml'] = 'Moodle Lastname';
$string['mssql'] = 'Microsoft SQL Server';
$string['ngts'] = 'No groups to sync...';
$string['noaccess'] = 'You do not have access to this area';
$string['nogtlib'] = 'You need to install GT Lib';
$string['NoJavaScript'] = '<p style="text-align:center">Sadly this feature depends on Javascript, and yours is currently disabled.</p>';
$string['nosession'] = 'Your session key is invalid. Please return to frontpage and try again. (You may need to log out and back in again to re-establish your session.)';
$string['noslc'] = 'Could not find site-level course';
$string['nypc'] = 'New Year Process Cancelled';
$string['nypcpw'] = '<h1 class="main">Please wait, this will take some time...</h1>';
$string['nyproc'] = 'NewYear Process';
$string['pa'] = 'Password';
$string['parent'] = 'Parent';
$string['parent_transfer'] = 'Sync Parents';
$string['pc'] = 'Post Code';
$string['pluginname'] = 'Facility To Moodle';
$string['pu'] = 'Password Unknown';
$string['readdocs'] = 'Please refer to the block documentation';
$string['remestu'] = 'Remove Ex-Students';
$string['remstu'] = 'Remove Groups';
$string['si'] = 'StudentID';
$string['sn'] = 'Surname';
$string['sorry'] = 'We\'re Sorry!';
$string['staff'] = 'Staff';
$string['staff_transfer'] = 'Sync Staff';
$string['staiala'] = 'Staff IAL';
$string['stid'] = 'StaffID';
$string['student'] = 'Student';
$string['student_transfer'] = 'Sync Students';
$string['stuiala'] = 'Student IAL';
$string['sx'] = 'Gender';
$string['syncgro'] = 'Group Synchronisation';
$string['tegr'] = 'Teaching Group';
$string['transgro'] = 'Transferring group';
$string['tt'] = 'Title';
$string['type'] = 'Usertype';
$string['un'] = 'User Name';
$string['upn'] = 'UPN';
$string['validateparent'] = 'Validate Parents';
$string['yg'] = 'Year Groups';
$string['yrgr'] = 'Year Group';
