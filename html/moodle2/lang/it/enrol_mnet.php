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
 * Strings for component 'enrol_mnet', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Per questo host esistono già istanze del plugin di iscrizione MNet. E\' consentito usare solo una istanza per host e/o una istanza per \'Tutti gli host\'.';
$string['instancename'] = 'Nome del metodo di iscrizione';
$string['instancename_help'] = 'E\' possibile impostare il nome dell\'istanza del plugin di iscrizione MNet. Lasciando il campo vuoto verrà usato il nome di default, che prevede l\'uso del nome dell\'hots remoto e del ruolo assegnato agli utenti.';
$string['mnet_enrol_description'] = 'Per consentire gli amministratori del sito {$a} di iscrivere i loro utenti nei corsi presenti su questo sito.<br/>
<ul><li><em>Requisito</em>: è necessario
<strong>sottoscrivere</strong> il Servizio SSO (Identity Provider) offerto dal sito {$a}.</li>
<li><em>Requisito</em>: è necessario
<strong>offrire</strong> il Serivzio SSO (Service Provider) al sito {$a}.</li>
</ul>
<br/>Per consentirti di iscrivere i tuoi utenti ai corsi presenti sul sito {$a}.<br/>
<ul>
<li><em>Requisito</em>: è necessario <strong>offrire</strong> il servizio SSO (Identity Provider) al sito {$a}.</li>
<li><em>Requisito</em>: è necessario <strong>sottoscrivere</strong> il serizio SSO (Service Provider) offerto dal sito {$a}.</li>
</ul><br/>';
$string['mnet_enrol_name'] = 'Servizio remoto di iscrizione';
$string['pluginname'] = 'Iscrizioni remote MNet';
$string['pluginname_desc'] = 'Consente l\'iscrizione ai corsi di utenti provenienti da host MNet.';
$string['remotesubscriber'] = 'Host remoto';
$string['remotesubscriber_help'] = 'Scegli \'Tutti gli host\' se si desideri consentire l\'accesso al corso da tutti i nodi MNet verso i quali pubblichi il servizi di iscrizione remota. In alternativa, imposta l\'host dal quale consentire l\'accesso al corso.';
$string['remotesubscribersall'] = 'Tutti gli host';
$string['roleforremoteusers'] = 'Ruolo per questo utente';
$string['roleforremoteusers_help'] = 'Il ruolo che riceverà l\'utente remoto nell\'host scelto';
