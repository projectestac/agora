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
 * Strings for component 'enrol_dbuserrel', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_dbuserrel
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['dbencoding'] = 'Database encoding';
$string['dbhost'] = 'Server IP name or number';
$string['dbhost_desc'] = 'Type database server IP address or host name';
$string['dbname'] = 'Database name';
$string['dbpass'] = 'Server password';
$string['dbtable'] = 'Database table';
$string['dbtype'] = 'Database type';
$string['dbtype_desc'] = 'ADOdb database driver name, type of the external database engine.';
$string['dbuser'] = 'Server user';
$string['description'] = 'You can use a external database (of nearly any kind) to control your relationships between users. It is assumed your external database contains a field containing two user IDs, and a Role ID.  These are compared against fields that you choose in the local user and role tables';
$string['enrolname'] = 'External Database (User relationships)';
$string['localobjectuserfield'] = 'Local object field';
$string['localobjectuserfield_desc'] = 'The name of the field in the user table that we are using to match entries in the remote database (eg idnumber). for the <i>object</i> role assignment';
$string['localrolefield'] = 'Local role field';
$string['localrolefield_desc'] = 'The name of the field in the roles table that we are using to match entries in the remote database (eg shortname).';
$string['localsubjectuserfield'] = 'Local subject field';
$string['localsubjectuserfield_desc'] = 'The name of the field in the user table that we are using to match entries in the remote database (eg idnumber). for the <i>subject</i> role assignment';
$string['pluginname'] = 'DB User role assignment';
$string['pluginname_desc'] = 'You can use an external database (of nearly any kind) to control your mentor role. It is assumed your external database contains at least a field containing a student username, a mentor role, and a field containing a mentor username. These are compared against fields that you choose in the local role and user tables.';
$string['remoteenroltable'] = 'Remote user enrolment table';
$string['remoteenroltable_desc'] = 'Specify the name of the table that contains list of user enrolments. Empty means no user enrolment sync.';
$string['remote_fields_mapping'] = 'Database field mapping';
$string['remoteobjectuserfield'] = 'Remote object field';
$string['remoteobjectuserfield_desc'] = 'The name of the field in the remote table that we are using to match entries in the user table for the <i>object</i> role assignment';
$string['remoterolefield'] = 'Remote role field';
$string['remoterolefield_desc'] = 'The name of the field in the remote table that we are using to match entries in the roles table.';
$string['remotesubjectuserfield'] = 'Remote subject field';
$string['remotesubjectuserfield_desc'] = 'The name of the field in the remote table that we are using to match entries in the user table for the <i>subject</i> role assignment';
$string['server_settings'] = 'External Database Server Settings';
$string['settingsheaderdb'] = 'External database connection';
$string['useauthdb'] = 'useauthdb.....';
$string['useauthdb_desc'] = 'Use the same settings for database connection as the Database authentication plugin is using (You will still have to specify table name)';
$string['useenroldatabase'] = 'Same database connection?';
$string['useenroldatabase_desc'] = 'Use the same settings for database connection as the Database enrolment plugin is using (You will still have to specify table name)';
