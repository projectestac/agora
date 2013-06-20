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
 * Strings for component 'auth_fc', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_fc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_fcchangepasswordurl'] = 'URL om wachtwoord te wijzigen';
$string['auth_fcconnfail'] = 'Connectie mislukt met foutnummer: {$a->no} en foutboodschap {$a->str}';
$string['auth_fccreators'] = 'Lijst met groepen van wie de leden nieuwe cursussen mogen maken. Gebruik een ; als scheidingsteken voor verschillende groepen. Namen moeten hetzelfde gespeld worden als op de FirstClass-server. Het systeem is hoofdlettergevoelig.';
$string['auth_fccreators_key'] = 'Aanmakers';
$string['auth_fcdescription'] = 'Deze methode gebruikt een FirstClass-server om te controleren of een gegeven gebruikersnaam en wachtwoord geldig zijn.';
$string['auth_fcfppport'] = 'Serverpoort (3333 is de meest gebruikelijke)';
$string['auth_fcfppport_key'] = 'Poort';
$string['auth_fchost'] = 'Het adres van de server. Gebruik het IP-nummer of DNS-naam.';
$string['auth_fchost_key'] = 'Host';
$string['auth_fcpasswd'] = 'Wachtwoord voor bovenstaande account';
$string['auth_fcpasswd_key'] = 'Wachtwoord';
$string['auth_fcuserid'] = 'Gebruikers-ID voor FirstClass account met het privilege \'Subadministrator\'.';
$string['auth_fcuserid_key'] = 'Gebruikers ID';
$string['pluginname'] = 'FirstClass-server';
