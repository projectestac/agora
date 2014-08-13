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
 * Strings for component 'auth_cas', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'Utenti CAS';
$string['accesNOCAS'] = 'altri utenti';
$string['auth_cas_auth_user_create'] = 'Creare utenti esternamente';
$string['auth_cas_baseuri'] = 'URI del server (lasciare vuoto se non è definito baseURI)<br/>Per esempio, se il server CAS risponde a host.dominio.it/CAS/ <br/>allora, utilizzare: cas_baseuri=CAS/';
$string['auth_cas_baseuri_key'] = 'Base URI';
$string['auth_cas_broken_password'] = 'Non puoi proseguire senza modificare la tua password, ma non c\'è una pagina per cambiarla. Contatta il tuo amministratore Moodle.';
$string['auth_cas_cantconnect'] = 'La componente LDAP del modulo CAS non riesce a connettersi al server: {$a}';
$string['auth_cas_casversion'] = 'Versione protocollo CAS';
$string['auth_cas_certificate_check'] = 'Impostare a \'Si\' se si desidera validare il certificato del server';
$string['auth_cas_certificate_check_key'] = 'Validazione server';
$string['auth_cas_certificate_path'] = 'Percorso del file CA chain (formato PEM) per validare il certificato del server';
$string['auth_cas_certificate_path_empty'] = 'Se la validazione server è attiva, è necessario impostare il percorso del certificato';
$string['auth_cas_certificate_path_key'] = 'Percorso del certificato';
$string['auth_cas_changepasswordurl'] = 'URL per cambiare la password';
$string['auth_cas_create_user'] = 'Attivate questa opzione se desiderate inserire utenti autenticati CAS nel database di Moodle. Se non lo fate, solo gli utenti esistenti nel database di Moodle potranno effettuare il login.';
$string['auth_cas_create_user_key'] = 'Creare utente';
$string['auth_casdescription'] = 'Questo metodo utilizza un server CAS (Central Authentication Service) per autenticare utenti via SSO (Single Sign On environment).
E anche possibile utilizzare una semplice autenticazione LDAP. Se CAS ritiene validi lo username e la password inseriti, Moodle creerà un nuovo utente nel proprio database, prelevando i campi dell\'utente da LDAP qualora necessario.
Nei login successivi, verranno verificati solamente username e password.';
$string['auth_cas_enabled'] = 'Da attivare se si intende utilizzare l\'autenticazione CAS (Central Authentication Service).';
$string['auth_cas_hostname'] = 'Nome host del server CAS<br/>Per esempio: host.dominio.it';
$string['auth_cas_hostname_key'] = 'Nome host';
$string['auth_cas_invalidcaslogin'] = 'Spiacente, il login è fallito - Potreste non essere autorizzati ad accedere';
$string['auth_cas_language'] = 'Lingua delle pagine di autenticazione';
$string['auth_cas_language_key'] = 'Lingua';
$string['auth_cas_logincas'] = 'Accesso con connessione sicura';
$string['auth_cas_logoutcas'] = 'Imposta a \'si\' se si desidera eseguire il logout da CAS quando ci si disconnette da Moodle';
$string['auth_cas_logoutcas_key'] = 'Opzioni logout CAS';
$string['auth_cas_logout_return_url'] = 'L\'URL dove saranno indirizzati gli utenti CAS dopo il logout.<br />Se l\'URL non viene impostato gli utenti saranno indirizzati alla pagina usata da Moodle.';
$string['auth_cas_logout_return_url_key'] = 'URL pagina di logout sostitutiva';
$string['auth_cas_multiauth'] = 'Impostare a SI se si desidera una multi-autenticazione (CAS + un\'altra autenticazione)';
$string['auth_cas_multiauth_key'] = 'Multi-autenticazione';
$string['auth_casnotinstalled'] = 'L\'autenticazione CAS non può essere usata. Il modulo PHP LDAP non è installato.';
$string['auth_cas_port'] = 'Porta del server CAS';
$string['auth_cas_port_key'] = 'Porta';
$string['auth_cas_proxycas'] = 'Imposta a \'si\' se si utilizzi CAS in modalità proxy';
$string['auth_cas_proxycas_key'] = 'Modalità proxy';
$string['auth_cas_server_settings'] = 'Configurazione del server CAS (Central Authentication Service)';
$string['auth_cas_text'] = 'Connessione sicura';
$string['auth_cas_use_cas'] = 'Usare CAS';
$string['auth_cas_version'] = 'Versione protocollo CAS da utilizzare';
$string['CASform'] = 'Scelta autenticazione';
$string['noldapserver'] = 'Nessun server LDAP è stato configurato per l\'autenticazione CAS. La sincronizzazione è disabilitata.';
$string['pluginname'] = 'Server CAS (SSO)';
