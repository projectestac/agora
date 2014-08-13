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
 * Strings for component 'cachestore_memcached', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = 'Buffer schreiben';
$string['bufferwrites_help'] = '(De-)Aktiviert gepufferte I/O. Das Aktivieren verursacht Speicherkommandos zum \'puffern\', statt zum senden. Jede Aktio, die Daten abfragt, löst Puffer statt Sendeprozesse zur externen Verbindung aus. Das Schließen oder Beenden der Verbindung verursacht ebenfalls ein Puffern der Daten zur Übertragung zur externen Verbindung.';
$string['hash'] = 'Hash-Verfahren';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'Standard (einzeln)';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A_64';
$string['hash_help'] = 'Legt den Hash-Algorithmus für die Schlüssel fest. Jeder Hash-Algorithmus hat seine Vor- und Nachteile. Nehmen Sie den Standardwert wenn sie sich nicht weiteren Details auskennen.';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur';
$string['pluginname'] = 'Memcached';
$string['prefix'] = 'Prefix-Schlüssel';
$string['prefix_help'] = 'Dies kann verwandt werden, um eine \'domain\' für Ihre Schlüsselwerte für mehrere memcached Speicher auf einer einzelnen memcached Installation zu erzeugen. Sie darf nicht länger als 16 Zeichen sein.';
$string['prefixinvalid'] = 'Ungültiger Schlüssel. Verwenden Sie nur a-z A-Z o-9 -_.';
$string['serialiser_igbinary'] = 'Serialiser igbinary';
$string['serialiser_json'] = 'Serialiser JSON';
$string['serialiser_php'] = 'Standardmäßiger PHP-Serialiser';
$string['servers'] = 'Server';
$string['servers_help'] = 'Hiermit definieren Sie den/die Server für den Memcache Adapter. Schreiben Sie einen Server pro Zeile. Tragen Sie die Serveradresse, den Port (optonal) und die Gewichtung ein  Wird kein Port eingetragen wird als Standard der Port 11211 verwendet.

Zum Beispiel:
<pre>
server.url.com
ipaddress:port
servername:port:weight
</pre>';
$string['sessionhandlerconflict'] = 'Warnung: Eine Memcached Instanz ({$a}) ist so konfiguriert, dass sie den gleichen Memcached Server wie Sessons verwendet. Das Löschen aller Caches wird gleichzeitig auch alle Sessions löschen.';
$string['testservers'] = 'Testserver';
$string['testservers_desc'] = 'Testserver werden für Unit-Tests und Performace-Tests verwandt. Es ist gänzlich optional Testserver zu verwenden. Schreiben Sie einen Server pro Zeile. Tragen Sie die Serveradresse, den Port (optonal) und die Gewichtung ein  Wird kein Port eingetragen wird als Standard der Port 11211 verwendet.';
$string['usecompression'] = 'Komprimierung benutzen';
$string['usecompression_help'] = '(De-)Aktiviert die Kompression für die Ladelast. Nach der Aktivierung werden Werte, die eine definierte Grenzgröße (derzeit 100 Bytes) übersteigen, beim Speichern komprimiert und beim Aufruf transparent dekomprimiert.';
$string['useserialiser'] = 'Serialiser verwenden';
$string['useserialiser_help'] = 'Legt das Serialisierungsprogramm für die Serialisierung nicht-skalare Werte fest. Die gültigen Serialisierungsprogramme sind Memcached :: SERIALIZER_PHP oder Memcached :: SERIALIZER_IGBINARY. Letztere wird nur unterstützt, wenn memcached mit konfiguriert ist - enable-memcached-igbinary Option und die igbinary Erweiterung geladen wird.';
