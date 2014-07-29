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
 * Strings for component 'auth_pop3', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_pop3
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pop3changepasswordurl_key'] = 'URL per cambiare password';
$string['auth_pop3description'] = 'Questo metodo utilizza un server POP3 per controllare se il nome utente e la password dati sono validi.';
$string['auth_pop3host'] = 'L\'indirizzo del server POP3. Devi specificare l\'indirizzo IP, non il nome a dominio.';
$string['auth_pop3host_key'] = 'Host';
$string['auth_pop3mailbox'] = 'Nome della casella di posta con cui tentale la connessione. (normalmente INBOX)';
$string['auth_pop3mailbox_key'] = 'Casella di posta';
$string['auth_pop3notinstalled'] = 'L\'autenticazione POP3 non può essere usata. Il modulo PHP IMAP non è installato.';
$string['auth_pop3port'] = 'Porta del server (110 è la più tipica, 995 è la porta standard per SSL)';
$string['auth_pop3port_key'] = 'Porta';
$string['auth_pop3type'] = 'Tipo di server. Se il tuo server usa i certificati di sicurezza, scegli pop3cert.';
$string['auth_pop3type_key'] = 'Tipo';
$string['pluginname'] = 'Server POP3';
