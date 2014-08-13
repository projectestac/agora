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
 * Strings for component 'cachestore_memcachedcluster', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcachedcluster
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcached Cluster';
$string['servers'] = 'Fetch Servers';
$string['servers_help'] = 'This is the server (or set of servers) that will be called when data is retrieved out of the cache.
Servers should be defined one per line and consist of a server address and optionally a port and weight.
If no port is provided then the default port (11211) is used.

For example:
<pre>
server.url.com
ipaddress:port
servername:port:weight
</pre>';
$string['setservers'] = 'Set Servers';
$string['setservers_help'] = 'This is the list of servers that will updated when data is modified in the cache.
It *must* include the memcached services in Fetch Servers, even if by a different hostname.
Servers should be defined one per line and consist of a server address and optionally a port.
If no port is provided then the default port (11211) is used.

For example:
<pre>
server.url.com
ipaddress:port
</pre>';
$string['testfetchservers'] = 'Test fetch servers';
$string['testfetchservers_desc'] = 'The test servers get used for performance tests. It is entirely optional to set up test servers. Servers should be defined one per line and consist of a server address and optionally a port and weight.
If no port is provided then the default port (11211) is used.';
$string['testsetservers'] = 'Test set servers';
$string['testsetservers_desc'] = 'Servers should be defined one per line and consist of a server address and optionally a port. If no port is provided then the default port (11211) is used.';
