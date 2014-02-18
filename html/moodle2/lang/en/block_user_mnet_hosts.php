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
 * Strings for component 'block_user_mnet_hosts', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_user_mnet_hosts
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscategory'] = 'Category name:';
$string['accesscategory_desc'] = 'Category name for access user fields';
$string['accessfieldname'] = 'acces{$a}';
$string['admincat'] = 'Network protocols';
$string['admin_page'] = 'Access Fields Refresh';
$string['backsettings'] = 'Back to the settings page';
$string['configmaharapassthru'] = 'If enabled, all mnet activated users can pass to any registered Mahara site. If disabled, profile field base validation is active even for Mahara sites.';
$string['createdfields'] = 'Number of fields successfully created:';
$string['dosync'] = 'Synchronize access fields';
$string['errormnetauthdisabled'] = 'Mnet authentication plugin is not enabled';
$string['errornocapacitytologremote'] = 'You have no capability to login to remote hosts';
$string['failedfields'] = 'Number of failures:';
$string['fieldname'] = 'Access to platform';
$string['ignoredfields'] = 'Number of hosts ignored:';
$string['maharapassthru'] = 'Mahara pass through';
$string['mnetaccess_service_name'] = 'Mnet Access Service';
$string['nohostsforyou'] = 'No host you can reach';
$string['pluginname'] = 'InterMnet accesses';
$string['resync'] = 'Resync all fields';
$string['resync_help'] = '<h2>Controlled roaming in MNET</h2>
<h3>Resynchroniation of access control fields</h3>

<p>To ensure users can roam properly between nodes and be able to control
the accesses, each user needs to be marked in his profile for each accessible
node in the network.</p>
<p>Those marks are custom profile fields that will be added to the general user profile.
The format of those fields has to follow specified rules. This script will facilitate the
setup of required fields by exploring the accessible network.</p>';
$string['single_full'] = 'Synchronise platforms fields';
$string['single_short'] = 'Synchronise fields';
$string['synchonizingaccesses'] = 'Synchronising access control fields to the network configuration';
$string['syncplatforms'] = 'If you have added or defined some new MNET peers, you may resynchronize the defintion of access fields so your users can see the new destinations in the "User Mnet Host" block';
$string['user_mnet_hosts'] = 'My Moodle hosts';
$string['user_mnet_hosts:accessall'] = 'Can access all nodes';
$string['user_mnet_hosts:addinstance'] = 'Can add instance';
$string['user_mnet_hosts:myaddinstance'] = 'Can add instance to my pages';
