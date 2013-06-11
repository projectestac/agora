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
 * Strings for component 'portfolio_mahara', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Abilita supporto portfolio Leap2a (prerequisito Mahara 1.3 o superiore)';
$string['err_invalidhost'] = 'Host MNet non valido';
$string['err_invalidhost_help'] = 'Il plugin è mal configurato, punta a un host MNet non valido (o eliminato). Per funzionare il plugin ha bisogno di peer Moodle Networking che pubblichino il servizio SSO IDP, sottoscrivano il servizio SSO SP ed del servizio Portfolio pubblicato <b>e</b> sottoscritto.';
$string['err_networkingoff'] = 'MNet è disabilitato.';
$string['err_networkingoff_help'] = 'MNet è disabilitato. Per configurare questo plugin devi prima abilitarlo. Qualsiasi istanza di questo plugin sarà invisibile finché non saranno soddisfatte tutte le condizioni precedenti, quando potrai impostare manualmente la visibilità. Le istanze al momento non possono essere utilizzate';
$string['err_nomnetauth'] = 'Il plugin di autenticazione MNet è disabilitato';
$string['err_nomnetauth_help'] = 'Il plugin di autenticazione MNet, obbligatorio per questo servizio, è disabilitato';
$string['err_nomnethosts'] = 'Questo plugin necessita dei MNet';
$string['err_nomnethosts_help'] = 'Questo plugin ha bisogno di un nodo MNet che pubblichi il servizio SSO IDP, sottoscriva il servizio SSO SP, pubblichi <b>e</b> sottoscriva il servizio Portfolio, inoltre ha bisogno dell plugin di autenticazione MNet abilitato. Qualsiasi istanza di questo plugin sarà invisibile finché non saranno soddisfatte tutte le condizioni precedenti, quando potrai impostare manualmente la visibilità. ';
$string['failedtojump'] = 'Non è stato possibile avviare la comunicazione con il server remoto';
$string['failedtoping'] = 'Non è stato possibile avviare la comunicazione con il server remoto: {$a}';
$string['mnethost'] = 'Host MNet';
$string['mnet_nofile'] = 'Non è stato possibile trovare il file nell\'oggetto trasferito - errore insolito.';
$string['mnet_nofilecontents'] = 'Nell\'oggetto trasferito è stato trovato un file ma non è stato possibile ottenere il contenuto - errore insolito: {$a}';
$string['mnet_noid'] = 'Non è stato possibile trovare il record di trasferimento che corrisponda a questo token';
$string['mnet_notoken'] = 'Non è stato possibile trovare un token che corrisponda a questo trasferimento';
$string['mnet_wronghost'] = 'L\'host remoto non corrisponde al record di trasferimento di questo token';
$string['pf_description'] = 'Tramite questo servizio puoi autorizzare gli utenti a trasferire materiali su questo host.<br />Per consentire agli utenti autenticati nel tuo sito di trasferire materiali nel sito {$a}, devi sottoscrivere questo servizio.<br /><ul><li><em>Requisito</em>: è necessario <strong>offrire</strong> il Servizio SSO (Identify Provider) al sito {$a}.</li><li><em>Requisito</em>: è necessario <strong>sottoscrivere</strong> il Servizio SSO (Service Provider) offerto dal sito {$a}</li><li><em>Requisito</em>: è è anche necessario abilitare il plugin di autenticazione Moodle Network.</li></ul><br />';
$string['pf_name'] = 'Servizio di Portfolio';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = 'Al momento non è possibile trasferire file su Mahara';
$string['url'] = 'URL';
