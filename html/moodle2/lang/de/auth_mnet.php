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
 * Strings for component 'auth_mnet', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'Die Einstellung "Ja" bewirkt, dass ein lokaler Datensatz automatisch angelegt wird, sobald sich ein Remote-Nutzer erstmalig einloggt.';
$string['auth_mnetdescription'] = 'Nutzer/innen werden als vertrauensvoll authentifiziert, wenn sie in den MNET-Einstellungen (Moodle Network) definiert wurden.';
$string['auth_mnet_roamin'] = 'Nutzer/innen dieses Hosts können Ihre Website durchsuchen';
$string['auth_mnet_roamout'] = 'Ihre Nutzer/innen können diese Websites durchsuchen';
$string['auth_mnet_rpc_negotiation_timeout'] = 'Timeout in Sekunden für die Authentifizierung über den XMLRPC Transfer.';
$string['auto_add_remote_users'] = 'Remote-Nutzer/innen automatisch hinzufügen';
$string['pluginname'] = 'MNET Authentifizierung';
$string['rpc_negotiation_timeout'] = 'RPC negotiation timeout';
$string['sso_idp_description'] = 'Veröffentlichen Sie diesen Dienst, um Ihren Nutzer/innen einen Zugriff auf {$a} zu ermöglichen, ohne sich dort erneut anmelden zu müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen außerdem den SSO-Dienst (Service Provider) auf {$a} <strong>abonnieren </strong>.</li></ul>

<br />Abonnieren Sie diesen Dienst, um allen angemeldeten Nutzer/innen von {$a} zu erlauben, auf Ihre Website zuzugreifen, ohne sich hier erneut anmelden zu müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen außerdem den SSO-Dienst (Service Provider) für {$a} <strong>veröffentlichen </strong>.</li></ul>';
$string['sso_idp_name'] = 'SSO (Identity Provider)';
$string['sso_mnet_login_refused'] = 'Der Anmeldename {$a->user} ist zum Login auf {$a->host} nicht zugelassen.';
$string['sso_sp_description'] = 'Veröffentlichen Sie diesen Dienst, um angemeldeten Nutzer/innen von {$a} einen Zugriff auf Ihre Website zu erlauben, ohne sich hier erneut anmelden zu müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen ebenfalls den SSO-Dienst (Identity Provider) auf {$a} <strong>abonnieren </strong>.</li></ul>

<br />Abonnieren Sie diesen Dienst, um Ihren Nutzer/innen einen Zugriff auf {$a} zu ermöglichen, ohne sich dort erneut anmelden zu müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen zusätzlich den SSO-Dienst (Identity Provider) für {$a} <strong> veröffentlichen </strong>.</li></ul>';
$string['sso_sp_name'] = 'SSO (Service Provider)';
