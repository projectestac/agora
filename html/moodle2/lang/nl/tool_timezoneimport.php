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
 * Strings for component 'tool_timezoneimport', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_timezoneimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configintrotimezones'] = 'Deze pagina zal zoeken naar nieuwe informatie over tijdzones in de wereld (ook de regels over zomertijd) en zal je lokale databank met deze informatie updaten. Deze bestanden zullen gecontroleerd worden, in volgorde: {$a}. Deze procedure is veilig en kan geen normale installaties beschadigen. Wil je de tijdzones nu updaten?';
$string['importtimezones'] = 'Update de volledige lijst van tijdzones';
$string['importtimezonescount'] = '{$a->count} items geïmporteerd van {$a->source}';
$string['importtimezonesfailed'] = 'Geen bronnen gevonden! (= slecht nieuws)';
$string['pluginname'] = 'Tijdzone updater';
$string['updatetimezones'] = 'Update tijdzones';
