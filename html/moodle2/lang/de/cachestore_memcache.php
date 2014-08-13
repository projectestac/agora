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
 * Strings for component 'cachestore_memcache', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Key Prefix';
$string['prefix_help'] = 'Der Prefix wird für alle Schlüsselbezeichnungen des MemCache-Servers genutzt.
* Wenn Sie nur eine Moodle-Instanz auf dem Server betreiben kann der Standardwert bestehen bleiben.
* Die Länge ist auf 5 Zeichen beschränkt.';
$string['prefixinvalid'] = 'Ungültiger Schlüssel. Verwenden Sie nur a-z A-Z o-9 -_.';
$string['servers'] = 'Server';
$string['servers_help'] = 'Hiermit definieren Sie den/die Server für den Memcache Adapter. Schreiben Sie einen Server pro Zeile. Tragen Sie die Serveradresse, den Port (optonal) und die Gewichtung ein  Wird kein Port eingetragen wird als Standard der Port 11211 verwendet.

Zum Beispiel:
<pre>
server.url.com
ipaddress:port
servername:port:weight
</pre>';
$string['sessionhandlerconflict'] = 'Warnung: Eine Memcache Instanz ({$a}) ist so konfiguriert, dass sie den gleichen Memcached Server wie Sessons verwendet. Das Löschen aller Caches wird gleichzeitig auch alle Sessions löschen.';
$string['testservers'] = 'Testserver';
$string['testservers_desc'] = 'Testserver werden für Unit-Tests und Performace-Tests verwandt. Es ist gänzlich optional Testserver zu verwenden. Schreiben Sie einen Server pro Zeile. Tragen Sie die Serveradresse, den Port (optonal) und die Gewichtung ein  Wird kein Port eingetragen wird als Standard der Port 11211 verwendet.';
