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
 * Strings for component 'block_use_stats', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_use_stats
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['blockname'] = 'Use Stats';
$string['configcapturemodules'] = 'Capture modules list';
$string['configcapturemodules_desc'] = 'Modules that are considered in the detail analysis';
$string['configcustomtagselect'] = 'Select for custom tag';
$string['configcustomtagselect_desc'] = 'This query needs returning one unique result per log row. this result will feed the customtag {$a} column.';
$string['configenablecompilecube'] = 'Enable cube compilation';
$string['configenablecompilecube_desc'] = 'When enabled, additional dimensions are calculated using defined selects';
$string['configenablecompilelogs'] = 'Enable gaps compilation';
$string['configenablecompilelogs_desc'] = 'When enabled, use stat compile logs and gaps on cron';
$string['configfromwhen'] = 'Since';
$string['configfromwhen_desc'] = 'Compilation period (in days till today)';
$string['configignoremodules'] = 'Ignore modules list';
$string['configignoremodules_desc'] = 'Ignore times from this modules';
$string['configlastcompiled'] = 'Last compiled log record date';
$string['configlastcompiled_desc'] = 'On change of this track date, the cron will recalculate all logs following the given date';
$string['configlastpingcredit'] = 'Extra time credit on last ping';
$string['configlastpingcredit_desc'] = 'This amount of time (in minutes) will be systematically added to log track time count for each time a session closure or discontinuity is guessed';
$string['configstudentscanuse_desc'] = 'Students can see the block (for their own)';
$string['configstudentscanuseglobal_desc'] = 'Allow students see the use stat block in global spaces (MyMoodle, out of course, for their own)';
$string['configthreshold'] = 'Threshold';
$string['configthreshold_desc'] = 'Activity continuity threshold (minutes). Above this gap time between two successive tracks in the log, the user is considered as deconnected. Arbitrary "Last Ping Credit" time will be added to his time count.';
$string['credittime'] = 'Credit time';
$string['dimensionitem'] = 'Observable classes';
$string['errornorecords'] = 'No tracking information';
$string['errornotinitialized'] = 'The module is not initialized. Contact administrator.';
$string['eventscount'] = 'Hits';
$string['from'] = 'Since';
$string['ignored'] = 'Module/Activity ignored in tracking';
$string['lastcompiled'] = 'Last compiled log record';
$string['modulename'] = 'Activity tracking';
$string['noavailablelogs'] = 'No logs available';
$string['onthisMoodlefrom'] = 'on this Moodle Site since';
$string['pluginname'] = 'Use Stats';
$string['showdetails'] = 'Show details';
$string['timeelapsed'] = 'Time elapsed';
$string['use_stats:addinstance'] = 'Can add an instance';
$string['use_stats_description'] = 'By publishing this service, you allow remote servers to ask for reading statistics of local users.<br/>When subscribing to this service, you allow your local server to query a remote server about stats on his members.<br/>';
$string['use_stats:myaddinstance'] = 'Can add an instance to My Page';
$string['use_stats_name'] = 'Remote access to statistics';
$string['use_stats_rpc_service'] = 'Remote access to statistics';
$string['use_stats_rpc_service_name'] = 'Remote access to statistics';
$string['use_stats:seecoursedetails'] = 'Can see detail of all users from his course';
$string['use_stats:seegroupdetails'] = 'Can see detail of all users from his groups';
$string['use_stats:seeowndetails'] = 'Can see his own detail';
$string['use_stats:seesitedetails'] = 'Can see detail of all users';
$string['use_stats:view'] = 'Can see stats';
$string['youspent'] = 'You already spent';
