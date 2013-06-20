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
 * Strings for component 'auth_mnet', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'Wanneer dit op ja staat, wordt er automatisch een locale gebruiker aangemaakt wanneer een externe gebruiker zich voor de eerste keer aanmeldt.';
$string['auth_mnetdescription'] = 'Gebruikers zijn aangemeld volgens de vertrouwensrelaties, gedefinieerd in je Moodle Netwerk instellingen.';
$string['auth_mnet_roamin'] = 'Deze gebruiker van deze host kunnen zich op jouw site aanmelden.';
$string['auth_mnet_roamout'] = 'Jouw gebruikers kunnen zich op deze hosts aanmelden.';
$string['auth_mnet_rpc_negotiation_timeout'] = 'De timeout in seconden voor authenticatie over XMLRPC-transport.';
$string['auto_add_remote_users'] = 'Voeg externe gebruikers automatisch toe';
$string['pluginname'] = 'MNet authenticatie';
$string['rpc_negotiation_timeout'] = 'RPC-negotiatie time-out';
$string['sso_idp_description'] = 'Publiceer deze service om het voor gebruikers mogelijk te maken naar de {$a} Moodle site te gaan zonder daar opnieuw te moeten inloggen.
<ul><li><em>Dependentie:</em>Je moet op de SSO service (service provider) ook <strong>inschrijven</strong> op {$a}.</li></ul><br />Schrijf je op deze service in om geautenticeerde gebruikers van {$a} toegang te geven tot jouw site zonder dat ze opnieuw moeten inloggen.<ul><li><em>Dependentie</em>: je moet de SSO service (service provider) <strong>publiceren</strong> voor {$a}.</li></ul><br />';
$string['sso_idp_name'] = 'SSO (identiteits provider)';
$string['sso_mnet_login_refused'] = 'Gebruikersnaam {$a->user} heeft geen toelating om in te loggen vanuit {$a->host}.';
$string['sso_sp_description'] = 'Publiceer deze service om geautenticeerde gebruikers van {$a} toe te laten tot jouw site, zonder op nieuw te moeten inloggen. <ul><li><em>Dependentie</em>: je moet ook <strong>inschrijven</strong> op de SSO service (identiteits provider) op {$a}.</li></ul><br />Inschrijven op deze service zal het voor je gebruikers mogelijk maken naar de {$a} site te gaan zonder daar opnieuw te moeten inloggen<ul><li><em>Dependentie</em>: Je moet ook de SSO service (identiteitsprovider) <strong>publiceren</strong> voor {$a}.</li><ul><br />';
$string['sso_sp_name'] = 'SSO (service provider)';
