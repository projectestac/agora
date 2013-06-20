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
 * Strings for component 'cachestore_memcached', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = 'Schrijfbuffer';
$string['bufferwrites_help'] = 'Schakelt de buffer voor I/O in of uit. De buffer inschakelen zorgt ervoor dat opslagcommando\'s gebufferd worden in plaats van onmiddellijk verzonden. Gelijk welke activiteit die gegevens opvraagt zorgt ervoor dat deze buffer naar de externe connectie gestuurd wordt. Het beëindigen van de connectie of het sluiten van de connectie veroorzaakt ook het verzenden van de gebufferde gegevens naar de externe connectie.';
$string['hash'] = 'Versleutelmethode';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'Standaard (één tegelijk)';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A64';
$string['hash_help'] = 'Bepaalt het versleutelalgoritme dat gebruikt wordt voor de itemsleutels. Elk versleutelalgoritme heeft zijn voordelen en nadelen. Gebruik de standaardinstelling als je het niet weet of als het voor jou niet belangrijk is.';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur';
$string['pluginname'] = 'Memcached';
$string['prefix'] = 'Prefix sleutel';
$string['prefix_help'] = 'Dit kan gebruikt worden om een "domein" voor je itemsleutels te zetten, waardoor je meerdere memcached opslagruimten op één enkele memcached installatie kan maken. Dit kan niet langer dan 16 tekens zijn om te verzekeren dat sleutellengtes geen problemen gaan veroorzaken.';
$string['serialiser_igbinary'] = 'De igbinary serializer.';
$string['serialiser_json'] = 'De JSON serializer.';
$string['serialiser_php'] = 'De standaard PHP serialiser.';
$string['servers'] = 'Servers';
$string['servers_help'] = 'Dit stelt de servers in die door de memcached adaptor gebruikt zouden moeten worden. Servers moeten één per lijn gedefinieerd worden en moeten bestaan uit een serveradres en optioneel een poort en een weging.
Indien er geen poort wordt opgegeven, dan wordt de standaardpoort (11211) gebruikt.';
$string['testservers'] = 'Testservers';
$string['testservers_desc'] = 'De testservers worden gebruikt voor unit tests en voor performantietests. Het is volledig optioneel om testservers op te zetten. Servers moeten éé per regel gedefinieerd worden en bestaan uit een serveradres en optioneel een poort en een weging.
Als er geen poort wordt opgegeven, dan wordt de standaardpoort (11211) gebruikt.';
$string['usecompression'] = 'Gebruik compressie';
$string['usecompression_help'] = 'Schakelt compressie in of uit. Indien ingeschakeld worden waarden groter dan een bepaalde drempelwaarde (op dit moment 100 bytes) gecomprimeerd tijdens de opslag en transparant gedecomprimeerd wanneer ze opgevraagd worden.';
$string['useserialiser'] = 'Gebruik serialiser';
