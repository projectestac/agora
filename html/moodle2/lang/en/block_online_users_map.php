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
 * Strings for component 'block_online_users_map', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_online_users_map
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['centrelat'] = 'Initial latitude';
$string['centrelng'] = 'Initial longitude';
$string['centreuser'] = 'Centre on users location';
$string['configcentrelat'] = 'Initial central latitude of the map - in plain decimal format (not degrees/minutes)';
$string['configcentrelng'] = 'Initial central longitude of the map - in plain decimal format (not degrees/minutes)';
$string['configcentreuser'] = 'Centre the map on the current users location, with the zoom level from above. This setting takes priority over the lat/lng coordinates above, unless the current user doesn\'t have a valid location';
$string['configdebug'] = 'Show debug messages when running cron';
$string['configgeonamesurl'] = 'URL to the Geonames API';
$string['configgeonamesusername'] = 'Your geonames username. You can obtain your own username from {$a}. If you leave the block using the default demo username, you may find that your calls to update user locations fail.';
$string['configgoogleapikey'] = 'Google Maps API key, obtain a key from {$a}';
$string['confignamesonmap'] = 'Should user names be shown on the map?  If box not checked, user city will be displayed as name.';
$string['configoffline'] = 'Display the offline users too?';
$string['configtimetosee'] = 'Number of minutes determining the period of inactivity after which a user is no longer considered to be online.';
$string['configtype'] = 'Select the map provider to use';
$string['configupdatelimit'] = 'Max number of locations to update in each cron - so doesn\'t impact performance. This must be an integer greater than or equal to 0. When set to 0 this will update all the records.';
$string['configzoomlevel'] = 'Initial zoom level of the map';
$string['debug'] = 'Show debug messages';
$string['geonamesurl'] = 'Geonames API url';
$string['geonamesusername'] = 'Geonames username';
$string['googleapikey'] = 'Google Maps API key';
$string['namesonmap'] = 'Show user names';
$string['offline'] = 'Show offline users';
$string['online_users_map:addinstance'] = 'Add a new online users map block';
$string['online_users_map:myaddinstance'] = 'Add a new online users map block to the My Moodle page';
$string['periodnminutes'] = 'last {$a} minutes';
$string['pluginname'] = 'Online Users Map';
$string['timetosee'] = 'Remove after inactivity';
$string['type'] = 'Type of map to use';
$string['updatelimit'] = 'Max locations to update';
$string['zoomlevel'] = 'Initial zoom level';
