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
 * Strings for component 'block_odsoaipmh', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_odsoaipmh
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['blockstring'] = 'Block string';
$string['checkaccess'] = 'Query and check your Data-Provider';
$string['desc_allowed_ip'] = '<p>The list of all allowed networks for harversters. You can use any network format to specify allowed network.</p>
<p>Eg.</p>
    10.168.1.0-10.168.1.100
    10.168.*.*
    10.168.0.0/16
<p>Each network should be specified in a separate line.</p>
<p>If the field is empty then harvesters from the entire Internet are allowed to harvest the Moodle’s OAI-PMH target. </p>';
$string['desc_allowed_ip_refresh'] = 'List of clients and servers that are allowed to refresh data. Data will be automatically refreshed after one of the listed clients/servers tries to access data after expiration time. If there are no clients/servers on list, then any client/server that accesses the expired data through Moodle’s OAI-PMH target will cause cache regeneration.';
$string['desc_default_is_shared'] = 'What is the default value for harvesting if the course hasn\'t specified harvesting';
$string['desc_default_language'] = 'Default language if the course does not have "language" specified';
$string['descfoo'] = 'Config description';
$string['desc_force_license'] = 'If enabled course administrators will not be able to select their own license for their materials. Server ones will be used instead.';
$string['desc_license_en'] = 'Custom license information (in English)';
$string['desc_license_local'] = 'Custom license information (in course language)';
$string['desc_license_type'] = 'Default license type for the course. If “custom” is selected then values in License (English) and License (course language) will be used.';
$string['desc_limited_share'] = 'If the default is set to \'No\',  metadata of all modules will be harvested. If the default is set to \'Yes\', only metadata from the modules selected below will be harvested using OAI-PMH protocol. Teachers can override this option for their courses.';
$string['desc_limit_records'] = 'Number of metadata records to limit per request. The records will be sent to the harvester in chunks of the chosen number until all records are successfully returned.';
$string['desc_max_seconds_refresh'] = 'Default expiration time for cached OAI-PMH data. "0" means - no caching, each request will trigger creation of request to the database. In most cases users will not notice the slowdown, since it is not that resource demanding. It is recommended for Moodle servers with average and above-average server/harware performance.';
$string['desc_server_admin'] = 'Moodle\'s administrator';
$string['desc_server_id'] = 'OAI-PMH server id (hostname)';
$string['desc_server_name'] = 'Moodle’s name as an ODS repository (OAI-PMH target)';
$string['desc_server_url'] = 'OAI-PMH target URL';
$string['desc_shared_modules'] = 'This option is used only if harvesting metadata from some modules (as oppose to all) is enabled. Only metadata from selected modules will be harvested.';
$string['details'] = 'Show details';
$string['english'] = 'English:';
$string['info_access'] = 'Access settings';
$string['info_license'] = 'License settings';
$string['info_server'] = 'System settings';
$string['info_share'] = 'Share settings';
$string['label_allowed_ip'] = 'Allowed networks (harversters)';
$string['label_allowed_ip_refresh'] = 'Allowed IP for refresh';
$string['label_default_is_shared'] = 'Harvesting information';
$string['label_default_language'] = 'Default language';
$string['labelfoo'] = 'Config label';
$string['label_force_license'] = 'Force server license';
$string['label_license_en'] = 'Custom license (English)';
$string['label_license_local'] = 'Custom license (course language)';
$string['label_license_type'] = 'Default license type';
$string['label_limited_share'] = 'Harvest only some modules';
$string['label_limit_records'] = 'Limit records per request';
$string['label_max_seconds_refresh'] = 'Caching duration';
$string['label_server_admin'] = 'Moodle\'s administrator';
$string['label_server_id'] = 'OAI-PMH server id';
$string['label_server_name'] = 'Moodle\'s hostname';
$string['label_server_url'] = 'OAI-PMH target URL';
$string['label_shared_modules'] = 'Harvested modules';
$string['lic_1'] = 'Public domain';
$string['lic_2_1_1'] = 'Attribution alone	BY';
$string['lic_2_1_2'] = 'Attribution + NoDerivatives	BY-ND';
$string['lic_2_2_1'] = 'Attribution + ShareAlike	BY-SA';
$string['lic_2_2_2'] = 'Attribution + Noncommercial	BY-NC';
$string['lic_2_3_1'] = 'Attribution + Noncommercial + NoDerivatives	BY-NC-ND';
$string['lic_2_3_2'] = 'Attribution + Noncommercial + ShareAlike	BY-NC-SA';
$string['lic_3'] = 'Copyrighted work';
$string['lic_4'] = 'Custom license';
$string['lic_5'] = 'Same as system';
$string['license_type'] = 'License type';
$string['local'] = 'Course:';
$string['odsoaipmh:addinstance'] = 'Add ODS OAI-PMH block';
$string['odsoaipmh:myaddinstance'] = 'Add ODS OAI-PMH block to my course';
$string['pluginname'] = 'ODS OAI-PMH';
$string['server_license'] = 'System default license type';
$string['server_sharing'] = 'System default indexed modules';
$string['server_sharing_allow'] = 'System default course harvesting';
$string['share_course_allow'] = 'Course content harvesting';
$string['share_course_allow_1'] = 'Use system default settings';
$string['share_course_allow_2'] = 'Allow course content harvesting';
$string['share_course_allow_3'] = 'Deny course content harvesting';
$string['share_type'] = 'Harvested modules:';
$string['share_type_1'] = 'Same as in system configuration';
$string['share_type_2'] = 'All modules';
$string['share_type_3'] = 'Some modules';
$string['url_lic_2_1_1'] = 'by';
$string['url_lic_2_1_2'] = 'by-nd';
$string['url_lic_2_2_1'] = 'by-sa';
$string['url_lic_2_2_2'] = 'by-nc';
$string['url_lic_2_3_1'] = 'by-nc-nd';
$string['url_lic_2_3_2'] = 'by-nc-sa';
$string['url_lic_2_base'] = 'http://creativecommons.org/licenses/__LICENSE__/4.0/';
