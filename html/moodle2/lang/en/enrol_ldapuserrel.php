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
 * Strings for component 'enrol_ldapuserrel', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_ldapuserrel
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bind_dn'] = 'If you want to use a bind user to search users, specify it here. Someting like \'cn=ldapuser,ou=public,o=org';
$string['bind_dn_key'] = 'Bind user distinguished name';
$string['bind_pw'] = 'Password for the bind user';
$string['bind_pw_key'] = 'Password';
$string['bind_settings'] = 'Bind settings';
$string['filter'] = 'LDAP filter used to search mentors. Usually \'(objectclass=*)\' or \'(objectclass=posixGroup)';
$string['filter_key'] = 'LDAP filter';
$string['host_url'] = 'Specify LDAP host in URL-form like \'ldap://ldap.myorg.com/\' or \'ldaps://ldap.myorg.com/';
$string['host_url_key'] = 'Host URL';
$string['idnumber_attribute'] = 'Name of the field in LDAP that represent the unique identifier of the mentor.';
$string['idnumber_attribute_key'] = 'Mentor unique identifier in LDAP';
$string['ldap_encoding'] = 'Specify encoding used by LDAP server. Most probably utf-8, MS AD v2 uses default platform encoding such as cp1252, cp1250, etc.';
$string['ldap_encoding_key'] = 'LDAP encoding';
$string['localobjectuserfield'] = 'User field in Moodle for the mentee';
$string['localobjectuserfield_desc'] = 'Name of the field in Moodle user table that is used to identify the mentee';
$string['localsubjectuserfield'] = 'User field in Moodle for the mentor';
$string['localsubjectuserfield_desc'] = 'Name of the field in Moodle user table that is used to identify the mentor';
$string['pluginname'] = 'LDAP User role assignment';
$string['pluginname_desc'] = 'You can use LDAP to control your mentor role. It is assumed your LDAP contains at least a field containing a mentee username in mentor entry. These are compared against fields that you choose in the local user tables.';
$string['remote_fields_mapping'] = 'LDAP remote field mapping';
$string['role_mapping'] = '<p>For each role that you want to assign from LDAP, you need to specify the list of contexts where the mentors are located. Separate different contexts with \';\'.</p><p>You also need to specify the attribute your LDAP server uses to hold the list of mentees.</p>';
$string['role_mapping_key'] = 'Map roles from LDAP';
$string['roles'] = 'Role mapping';
$string['search_sub'] = 'Search user role from subcontexts';
$string['search_sub_key'] = 'Search subcontexts';
$string['server_settings'] = 'LDAP server settings';
$string['user_type'] = 'If the group membership contains distinguished names, specify how users are stored in LDAP';
$string['user_type_key'] = 'User type';
$string['version'] = 'The version of the LDAP protocol your server is using';
$string['version_key'] = 'Version';
