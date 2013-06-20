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
 * Strings for component 'auth_mnet', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'När detta är inställt till \'Ja\' så kommer en post för lokal användare att skapas automatiskt när en fjärranvändare loggar in för första gången.';
$string['auth_mnetdescription'] = 'Användare autenticeras i enlighet med det nät av tillförlitlighet som har definierats i Dina inställningar för nätverk för Moodle.';
$string['auth_mnet_roamin'] = 'Den här värdens användare kan navigera vidare till Din webbplats.';
$string['auth_mnet_roamout'] = 'Dina användare kan navigera vidare till de här värdarna.';
$string['auth_mnet_rpc_negotiation_timeout'] = 'Timeout räknat i sekunder för autenticering via XMLRPC-transporten.';
$string['auto_add_remote_users'] = 'Lägg till fjärranvändare automatiskt';
$string['pluginname'] = 'Autenticering i MNet';
$string['rpc_negotiation_timeout'] = 'Tiden för RPC-förhandling har gått ut';
$string['sso_idp_description'] = 'Offentliggör den här tjänsten för att tillåta att Dina användare navigerar vidare till {$a} webbplatsen för Moodle utan att behöva logga in där igen. <ul><li><em>Beroende</em>: Du måste också  <strong>prenumerera</strong> på SSO-tjänsten hos {$a}.</li></ul>Prenumerera på den tjänsten för att tillåta att autenticerade användare från {$a} får tillgång till Din webbplats utan att behöva logga in igen. <ul><li><em>Beroende</em>: Du måste också  <strong>offentliggöra</strong> SSO-tjänsten hos {$a}.</li></ul><br />';
$string['sso_idp_name'] = 'SSO (Tillhandahållare av identiteter)';
$string['sso_mnet_login_refused'] = 'Användarnamn {$a->user} har inte tillstånd att logga in från {$a->host}.';
$string['sso_sp_description'] = 'Offentliggör den här tjänsten för att tillåta att autenticerade användare från {$a} får tillgång till Din webbplats utan att behöva logga in igen. <ul><li><em>Beroende</em>: Du måste också  <strong>prenumerera</strong> på SSO-tjänsten (tillhandahållare av identiteter) hos {$a}.</li></ul>Prenumerera på den tjänsten för att tillåta att Dina användare navigerar vidare till {$a} webbplatsen för Moodle utan att behöva logga in där igen.<ul><li><em>Beroende</em>: Du måste också  <strong>offentliggöra</strong> SSO-tjänsten (tillhandahållare av identiteter) hos {$a}.</li></ul><br />';
$string['sso_sp_name'] = 'SSO (tillhandahållare av tjänster)';
