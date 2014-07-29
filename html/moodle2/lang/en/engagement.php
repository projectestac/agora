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
 * Strings for component 'engagement', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   engagement
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cachettl'] = 'Cache TTL';
$string['cachingdisabled'] = 'Caching Disabled';
$string['configcachettl'] = 'This setting specifies the Time To Live for cached
engagement data.  If this is set, risk calculations displayed in the
block will not necessarily reflect live data, but will instead will be
calculated over the cached information.  Eg. new assignment submissions, logins
etc will not be detected until the cached data expires.  This setting is
important for performance reasons, so as to not overload the database with
queries on high-traffic sites.';
$string['engagement:addinstance'] = 'Add an engagement instance';
$string['incorrectlyconfigured'] = 'This plugin has been incorrectly configured. It is not intended to be added to a course in
this fashion. Please contact your system administrator to set the mod_engagement plugin as hidden.';
$string['modulename'] = 'Engagement analytics';
$string['modulenameplural'] = 'Engagement analytics';
$string['pluginname'] = 'Engagement analytics';
$string['riskscore'] = 'Risk score';
$string['roles_desc'] = 'The roles to report on in the engagement block and reports';
