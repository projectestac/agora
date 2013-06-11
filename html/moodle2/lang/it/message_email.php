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
 * Strings for component 'message_email', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'Consenti agli utenti di scegliere il set di caratteri';
$string['configallowusermailcharset'] = 'Abilitando questa opzione, ogni utente sarà in grado di definire il set di caratteri preferito delle email.';
$string['configmailnewline'] = 'Caratteri Newline (salto riga) usati nei messaggi di posta. Secondo la RFC 822bis è richiesto CRLF, alcuni server di posta converrtono automaticamente LF in CRLF, altri convertono in modo non corretto da CRLF a CRCRLF, altri ancora rifiutano mail con solo LF (qmail per esempio). Provare a cambiare questa impostazione se si riscontrano problemi con messagi non spediti o doppi salti riga.';
$string['confignoreplyaddress'] = 'In genere le email vengono spedite a nome di un utente (ad esempio, gli interventi nei forum). L\'indirizzo di email No-reply verrà  utilizzato come mittente del messaggio nei casi in cui il destinatario non può rispondere direttamente al mittente (ad esempio quando un utente decide di non visualizzare il proprio indirizzo email).';
$string['configsitemailcharset'] = 'Tutte le email generate dal vostro sito saranno inviate utilizzando il set di caratteri impostato qui. Comunque ogni utente può personalizzarlo se è abilitata la prossima impostazione.';
$string['configsmtphosts'] = 'E\' possibile impostare il nome di uno o più server SMTP che Moodle potrà utilizzare per inviare mail (ad esempio \'mail.a.com\' oppure \'mail.a.com;mail.b.com\'). Per configurare una porta non di default (diversa dalla 25) è possibile utilizzare la sintassi [server]:[port] (ad esempio \'mail.a.com:587\'). Per connessioni sicure, in genere viene utilizzata la porta 465 con SSL e la porta 587 con TLS. Se necessario è possibile specificare il protocollo utilizzato.  In mancanza di informazioni sul server SMTP, Moodle utilizzerà  il metodo di spedizione mail predefinito in PHP.';
$string['configsmtpmaxbulk'] = 'Massimo numero di messaggi inviati per sessione SMTP. Raggruppare i messaggi può velocizzare l\'invio delle email. Valori inferiori a 2 forzano la creazione di una nuova sessione SMTP per ogni email.';
$string['configsmtpsecure'] = 'Se il server smtp richiede connessioni sicure, devi specificare il protocollo corretto.';
$string['configsmtpuser'] = 'Se avete specificato un server SMTP che richiede l\'autenticazione, indicate qui lo username e la password relativi.';
$string['email'] = 'Invia notifiche email a';
$string['ifemailleftempty'] = 'Lasciare vuoto per inviare le notifiche a {$a}';
$string['mailnewline'] = 'Caratteri Newline nelle email';
$string['none'] = 'Nessuno';
$string['noreplyaddress'] = 'Indirizzo No-reply';
$string['pluginname'] = 'Email';
$string['sitemailcharset'] = 'Set di caratteri';
$string['smtphosts'] = 'SMTP hosts';
$string['smtpmaxbulk'] = 'Limite per sessione SMTP';
$string['smtppass'] = 'SMTP password';
$string['smtpsecure'] = 'Sicurezza SMTP';
$string['smtpuser'] = 'SMTP username';
