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
 * Strings for component 'local_davroot', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   local_davroot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowconns'] = 'Allow connections';
$string['allowconnsdescr'] = 'Allows permitted users to access Moodle Files through WebDAV';
$string['davroot:canconnect'] = 'Allow the user to connect to the WebDAV server exposing Moodle Files';
$string['lockmanager'] = 'Lock Manager';
$string['lockmanagerdescr'] = 'Allows to handle all file-locks centrally in {$a->lockmngrfolder}';
$string['pluginbrowser'] = 'Browser Plugin';
$string['pluginbrowserdescr'] = 'Produces Apache-like indexes for the Moodle virtual File System';
$string['pluginmount'] = 'DavMount Plugin';
$string['pluginmountdescr'] = 'Adds support for RFC 4709. This spec defines a small document that can tell a client how to mount a WebDAV server';
$string['pluginname'] = 'DAVRoot';
$string['pluginnamedescr'] = 'Exposes Moodle Files through WebDAV';
$string['plugintempfilefilter'] = 'Temporary File Filter Plugin';
$string['plugintempfilefilterdescr'] = 'Intercepts known common temporary files created by Operating System and Applications and place them in a temporary directory, {$a->tmpfilefilterfolder}';
$string['readonly'] = 'Read-only access';
$string['readonlydescr'] = 'Deny everything but a read-only DAV access (the safest option)';
$string['slashrep'] = '[slash]';
$string['urlrewrite'] = 'Enable URL rewrite';
$string['urlrewritedescr'] = 'Allows DAV URLs to be written without the PHP page at the end: {$a->wwwpath}';
$string['vhostenabled'] = 'Enable Virtual Host';
$string['vhostenableddescr'] = 'Allows WebDAV to be exposed under the root of a Virtual Host configured to map {$a->dirpath}';
$string['warnmdl35990'] = '<span style="color: red;"><a href="http://tracker.moodle.org/browse/MDL-35990" target="_blank">MDL-35990</a> prevents DAVRoot to work under the Virtual Host configuration!</span>';
$string['warnmdl35990descr'] = '<span style="color: red;">Expect HTTP Status 500 errors until you\'ll remove the line "<span style="font-family: courier new, courier, monospace; color: black;">require_once(dirname(dirname(__FILE__)) . \'/config.php\');</span>" from the file <span style="font-family: courier new, courier, monospace; color: black;">{$a->filepath}</span></span>';
