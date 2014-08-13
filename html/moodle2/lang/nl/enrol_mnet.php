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
 * Strings for component 'enrol_mnet', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Er bestaat al een instantie van de MNet aanmeldingsplugin  voor deze host. Er is slechts één instantie per host en/of één instantie voor \'alle hosts\' toegestaan.';
$string['instancename'] = 'Naam aanmeldingswijze';
$string['instancename_help'] = 'Optioneel kun je deze instantie van de MNet aanmeldingsmethode hernoemen. Indien je dit veld open laat, wordt de standaardnaam van de instantie gebruikt, met daarin de naam van de externe host en de toegewezen rol voor hun gebruikers.';
$string['mnet_enrol_description'] = 'Publiceer deze service om het beheerders op {$a} mogelijk te maken leerlingen aan te melden bij cursussen op jouw server.<br/>
<ul>
<li><em>Dependentie</em>: je moet je ook <strong>inschrijven</strong> op de SSO (identity provider) op {$a}</li>
<li><em>Dependentie</em>: je moet ook de SSO service (service provider) <strong>publiceren</strong> naar {$a}.</li>
</ul><br />
Schrijf je op deze service in om je leerlingen te kunnen aanmelden op {$a}.<br />
<ul>
<li><em>Dependentie</em>: Je moet je ook <strong>inschrijven</strong> op de SSO service (service provider) op {$a}.</li>
<li><em>Dependentie</em>: Je moet ook de SSO (identiteitsprovider) <strong>pubiceren</strong> naar {$a}.</li></ul><br />';
$string['mnet_enrol_name'] = 'Externe aanmeldingsservice';
$string['pluginname'] = 'MNet externe aanmeldingen';
$string['pluginname_desc'] = 'Staat externe MNet host toe om hun gebruikers aan te melden in onze cursussen.';
$string['remotesubscriber'] = 'Externe host';
$string['remotesubscriber_help'] = 'Selecteer \'alle hosts\' om deze cursus open te stellen voor alle MNet peers aan wie we de externe mogelijkheid tot aanmelding bieden. Of kies één enkele host en maak deze cursus enkel voor hun gebruikers beschikbaar.';
$string['remotesubscribersall'] = 'Alle hosts';
$string['roleforremoteusers'] = 'Rol voor hun gebruikers';
$string['roleforremoteusers_help'] = 'Welke rol krijgen de externe gebruikers van de geselecteerde host.';
