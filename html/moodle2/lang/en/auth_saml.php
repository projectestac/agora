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
 * Strings for component 'auth_saml', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_saml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_saml_course_field_id'] = 'Field used to identify a course';
$string['auth_saml_course_field_id_description'] = 'We can map the SAML course with the Moodle Short name or with the Course ID number';
$string['auth_saml_course_mapping_dsn'] = 'Course dsn';
$string['auth_saml_course_mapping_sql'] = 'Course sql';
$string['auth_saml_course_not_found'] = 'Course saml {$a->course} not found for the saml user {$a->user}n';
$string['auth_saml_courses'] = 'SAML courses mapping';
$string['auth_saml_courses_description'] = 'SAML attribute that contains courses data (default to schacUserStatus)';
$string['auth_saml_courses_not_found'] = 'IdP returned a set of data that no contain the SAML courses mapping field ({$a}). This field is required to enrol the user';
$string['auth_saml_db_reset_button'] = 'Reset values to factory settings';
$string['auth_saml_db_reset_error'] = 'Error reseting the saml plugin values';
$string['auth_samldescription'] = 'SSO Authentication using SimpleSAML';
$string['auth_saml_disable_debugdisplay'] = '* Disable debugdisplay in order to hide errors in the login/enrollment process';
$string['auth_saml_dosinglelogout'] = 'Single Log out';
$string['auth_saml_dosinglelogout_description'] = 'Check it to enable the single logout. This will log out you from moodle, identity provider and all conected service providers';
$string['auth_saml_duplicated_lms_data'] = 'The following lms data is duplicated:';
$string['auth_saml_duplicated_saml_data'] = 'The following saml data is duplicated:';
$string['auth_saml_error_attribute_course_mapping'] = 'Error in attribute names (index) of course table mapping. Check externalcoursemappingsql syntax';
$string['auth_saml_error_attribute_role_mapping'] = 'Error in attribute names (index) of role table mapping. Check externalrolemappingsql syntax';
$string['auth_saml_error_authentication_process'] = 'Error in authentication process of {$a}';
$string['auth_saml_errorbadhook'] = 'Incorrect SAML plugin hook file: {$a}';
$string['auth_saml_errorbadlib'] = 'SimpleSAMLPHP lib directory {$a} is not correct.';
$string['auth_saml_error_complete_user_data'] = 'Failed to complete user data of {$a}';
$string['auth_saml_error_complete_user_login'] = 'Failed to complete user login of {$a}';
$string['auth_saml_error_creating_course_mapping'] = 'Error creating course_mapping in moodle database';
$string['auth_saml_error_creating_role_mapping'] = 'Error creating role_mapping in moodle database';
$string['auth_saml_error_executing'] = 'Error executing';
$string['auth_saml_error_executing_course_mapping_query'] = 'Error executing the course mapping query';
$string['auth_saml_error_executing_role_mapping_query'] = 'Error executing the role mapping query';
$string['auth_saml_error_role_not_found'] = 'Error when enrolling. Role {$a} not exist in Moodle';
$string['auth_saml_errorsamlexternal'] = 'It states that the source mapping for the course and the role would be external and so you must specify all the parameters of the DSN and SQL queries.';
$string['auth_saml_errorsp_source'] = 'SimpleSAMLPHP sp source {$a} is not correct';
$string['auth_saml_form_error'] = 'It seems there are some errors in the form. Please, see below for correcting them';
$string['auth_saml_ignoreinactivecourses'] = 'Ignore Inactive Courses';
$string['auth_saml_ignoreinactivecourses_description'] = 'If not checked the plugin will unenroll the \'inactive\' courses';
$string['auth_saml_initialize_roles'] = 'Initialize role';
$string['auth_saml_logfile'] = 'Log file path';
$string['auth_saml_logfile_description'] = 'Set a filename if you want log the saml plugin errors in a different file that the syslog (Use an absolute path or Moodle will save this file in the moodledata folder)';
$string['auth_saml_logo_info'] = 'SAML login description';
$string['auth_saml_logo_info_description'] = 'Description that will be shown below the SAML login button';
$string['auth_saml_logo_path'] = 'SAML Image';
$string['auth_saml_logo_path_description'] = 'Image path for the SAML login button';
$string['auth_saml_mapping_dsn_description'] = 'Data Source Name string for connecting to the course/role mapping database.
(dsn must be an absolute path in case you are using SQLite)';
$string['auth_saml_mapping_dsn_examples'] = 'mysql://moodleuser:moodlepass@localhost/saml_course_mapping
sqlite:/<path-to-db>/mapping.sqlite3
oci8://user:pwd@host/sid
postgresql7://user:pwd@host/sid';
$string['auth_saml_mapping_external_warning'] = 'Note: When database of mappinng and moodle are of the same type, connection fail. So in this case better use the internal coursemapping mode and previously dump all data inside db manually';
$string['auth_saml_mapping_sql_examples'] = 'SELECT field1 as lms_course_id, field2 as saml_course_id, field3 as saml_course_period FROM course_mapping
SELECT field1 as lms_role, field2 as saml_role from role_mapping';
$string['auth_saml_missed_data'] = 'The following data contain missed attributes:';
$string['auth_saml_not_authorize'] = '{$a} has no active CAV course.';
$string['auth_saml_role_mapping_dsn'] = 'Role dsn';
$string['auth_saml_role_mapping_sql'] = 'Role sql';
$string['auth_saml_samlhookfile'] = 'Hook file path';
$string['auth_saml_samlhookfile_description'] = 'Set a path if you want to use a hook file that contain your specific funcions';
$string['auth_saml_samllib'] = 'SimpleSAMLPHP Library path';
$string['auth_saml_samllib_description'] = 'Library path for the SimpleSAMLPHP environment you want to eg: /var/www/sp/simplesamlphp/lib';
$string['auth_saml_sp_source'] = 'SimpleSAMLPHP SP source';
$string['auth_saml_sp_source_description'] = 'Select the SP source you want to connect to moodle. (Sources are in /config/authsources.php).';
$string['auth_saml_sucess_creating_course_mapping'] = 'Table course_mapping created in moodle database';
$string['auth_saml_sucess_creating_role_mapping'] = 'Table course_role created in moodle database';
$string['auth_saml_supportcourses'] = 'SAML support courses';
$string['auth_saml_supportcourses_description'] = 'Select Internal or External to have Moodle auto enrol users in courses (Use External if your course/role mapping is in an external DB)';
$string['auth_samltitle'] = 'SAML Authentication';
$string['auth_saml_username'] = 'SAML username mapping';
$string['auth_saml_username_description'] = 'SAML attribute that is mapped to Moodle username - this defaults to eduPersonPrincipalName';
$string['auth_saml_username_not_found'] = 'IdP returned a set of data that no contain the SAML username mapping field ({$a}). This field is required to login';
$string['pluginname'] = 'SAML Authentication';
