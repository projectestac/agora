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
 * Strings for component 'auth_mnet', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'E\' possibile creare un record nella tabella utenti di questo sito quando un utente si autentica per la prima volta tramite Moodle Netowrk.';
$string['auth_mnetdescription'] = 'L\'autenticazione Moodle Network consente di autenticare utenti sulla base delle impostazioni di trust con altri siti.';
$string['auth_mnet_roamin'] = 'Gli utenti degli host elencati di seguito possono essere instradati su questo sito';
$string['auth_mnet_roamout'] = 'I propri utenti possono essere instradati sugli host elencati di seguito';
$string['auth_mnet_rpc_negotiation_timeout'] = 'Timeout in secondi per l\'autenticazione basata su XMLRPC';
$string['auto_add_remote_users'] = 'Aggiungi automaticamente utenti remoti';
$string['pluginname'] = 'Autenticazione MNet';
$string['rpc_negotiation_timeout'] = 'Timeout negoziazione RPC';
$string['sso_idp_description'] = 'Per consentire ai tuoi utenti di navigare verso il sito {$a} senza effettuare nuovamente il login, devi offrire questo servizio<ul><li><em>Requisito</em>: è necessario <strong>sottoscrivere</strong> il servizio SSO (Service Provider) offerto dal sito {$a}.</li></ul><br />Per consentire agli utenti autenticati sul sito {$a} di accedere a questo sito senza effettuare nuovamente il login, devi sottoscrivere questo servizio. <ul><li><em>Requisito</em>: è necessario <strong>offrire</strong> il servizio SSO (Service Provider) al sito {$a}. </li></ul><br />';
$string['sso_idp_name'] = 'Servizio SSO (Identity Provider)';
$string['sso_mnet_login_refused'] = 'Lo username {$a->user} non è autorizzato a collegarsi da {$a->host}.';
$string['sso_sp_description'] = 'Per consentire agli utenti autenticati sul sito {$a} di accedere a questo sito senza effettuare nuovamente il login, devi offrire questo servizio. <ul><li><em>Requisito</em>: è necessario <strong>sottoscrivere</strong> il servizio SSO (Identity Provider) offerto dal sito {$a}.</li></ul><br />Per consentire ai tuoi utenti di navigare verso il sito {$a} senza effettuare nuovamente il login, devi sottoscrivere questo servizio. <ul><li><em>Requisito</em>: è necessario <strong>offrire</strong> il servizio SSO (Identity Provider) al sito {$a}. </li></ul><br />';
$string['sso_sp_name'] = 'Servizio SSO (Service Provider)';
