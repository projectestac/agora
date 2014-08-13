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
 * Strings for component 'cachestore_memcache', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Sleutel voorvoegsel';
$string['prefix_help'] = 'Dit prefix wordt gebruikt voor alle sleutelnamen op de memcacheserver.
* Als je slechts één Moodleinstantie op deze server hebt, kun je deze waarde standaard laten.
* Door de beperking op de sleutellengte mag je slechts 5 tekens gebruiken.';
$string['prefixinvalid'] = 'Ongeldige prefix. Je mag enkel a-z A-Z 0-9 _ gebruiken';
$string['servers'] = 'Servers';
$string['servers_help'] = 'Hiermee worden de servers ingesteld die door de memcache-adaptor gebruikt moeten worden. Servers moeten één per regel gedefiniëerd worden en moeten een serveradres en optioneel een poort en weging bevatten. Als er geen poort opgegeven wordt, dan wordt de standaardpoort gebruikt (11211).

Bijvoorbeeld:
<pre>
server.url.com
ipadres:poort
servernaam:poort:weging
</pre>';
$string['sessionhandlerconflict'] = 'Waarschuwing: een memcache instantie ({$a}) is geconfigureerd om dezelfde memcached server te gebruiken voor sessies. Het leegmaken van alle caches zal er voor zorgen dat ook sessies worden verwijderd.';
$string['testservers'] = 'Testservers';
$string['testservers_desc'] = 'De testservers worden gebruikt voor unit tests en voor performatietests. Het opstellen van testservers is helemaal optioneel. Servers moeten één per regel gedefiniëerd worden en moeten een serveradres en optioneel een poort en weging bevatten.
Als er geen poort opgegeven wordt, dan wordt de standaardpoort (11211) gebruikt.';
