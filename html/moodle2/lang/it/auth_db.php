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
 * Strings for component 'auth_db', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbcantconnect'] = 'Connessione non possibile al database specificato per l\'autenticazione ...';
$string['auth_dbchangepasswordurl_key'] = 'URL per cambiare password';
$string['auth_dbdebugauthdb'] = 'Debug ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Attiva il debug della connessione ADOdb al database esterno - da attivare quando si devono risolvere problemi di connessione durante i login. Da non attivare nei siti in produzione.';
$string['auth_dbdeleteuser'] = 'Eliminato l\' utente {$a->name} id {$a->id}';
$string['auth_dbdeleteusererror'] = 'Errore nella cancellazione dell\'utente {$a}';
$string['auth_dbdescription'] = 'Questo metodo usa una tabella di un database esterno per controllare se lo username e la password inseriti siano validi.  Se l\'utente è nuovo, allora anche le informazioni degli altri campi saranno copiate in Moodle.';
$string['auth_dbextencoding'] = 'Codifica database esterno';
$string['auth_dbextencodinghelp'] = 'Codifica utilizzata nel database esterno';
$string['auth_dbextrafields'] = 'La compilazione di questi campi è facoltativa. E\' possibile decidere di mappare i campi del profilo utente di Moodle con <b>i corrispondenti campi provenienti dal database esterno</b>.<p>Se non si mappano i campi, saranno usati i valori di default.</p><p>Se i campi mappati sono liberi, gli utenti potranno modificarli accedendo al proprio profilo.</p>';
$string['auth_dbfieldpass'] = 'Nome del campo che contiene le password';
$string['auth_dbfieldpass_key'] = 'Campo password';
$string['auth_dbfielduser'] = 'Nome del campo che contiene gli username';
$string['auth_dbfielduser_key'] = 'Campo username';
$string['auth_dbhost'] = 'Il computer che ospita il database server. Utilizzare un system DSN se si usa ODBC.';
$string['auth_dbhost_key'] = 'Host';
$string['auth_dbinsertuser'] = 'Inserito l\'utente {$a->name} id {$a->id}';
$string['auth_dbinsertuserduplicate'] = 'Si è verificato un errore durante l\'inserimento dell\'utente {$a->username} - un utente con lo stesso username è già stato creato con il plugin \'{$a->auth}\'';
$string['auth_dbinsertusererror'] = 'Errore nell\'inserimento dell\'utente {$a}';
$string['auth_dbname'] = 'Nome del database. Lasciare vuoto se è un DSN ODBC.';
$string['auth_dbname_key'] = 'Nome DB';
$string['auth_dbpass'] = 'Password corrispondente al suddetto username';
$string['auth_dbpass_key'] = 'Password';
$string['auth_dbpasstype'] = '<p>Specifica il formato con cui sono memorizzate le password degli utenti nel Database esterno. Le password criptate  MD5 sono frequenti nell\'anagrafica utenti di molte applicazioni web, come ad esempio PostNuke.</p><p>Se desideri che sia Moodle a gestire le password degli utenti, imposta il formato della password a \'interna\'. In questo caso <i>diventa necessario</i> che l\'indirizzo di email degli utenti sia presente nel Database esterno. Inoltre è necessario eseguire con regolarità admin/cron.php e  auth/db/auth_db_sync_users.php per consentire a Moodle di inviare una password provvisoria a ciascun nuovo utente.</p>';
$string['auth_dbpasstype_key'] = 'Formato password';
$string['auth_dbreviveduser'] = 'Ripristinato l\' utente {$a->name} id {$a->id}';
$string['auth_dbrevivedusererror'] = 'Errore nel ripristino dell\'utente {$a}';
$string['auth_dbsetupsql'] = 'Comando SQL per setup';
$string['auth_dbsetupsqlhelp'] = 'Comando SQL per setup speciali del database, utile ad esempio per definire la\'encoding della trasmissione dati - Esempio per MySQL e PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'Sospeso l\'utente {$a->name} id {$a->id}';
$string['auth_dbsuspendusererror'] = 'Errore nella sospensione dell\'utente {$a}';
$string['auth_dbsybasequoting'] = 'Usare apostrofi sybase';
$string['auth_dbsybasequotinghelp'] = 'Utilizza l\'apostrofo singolo in stile Sybase come carattere di escape. E\' un requisito per Oracle, MS SQL e alcuni altri database. Da non usare per MySQL!';
$string['auth_dbtable'] = 'Nome della tabella nel database';
$string['auth_dbtable_key'] = 'Tabella';
$string['auth_dbtype'] = 'Il tipo di database (leggi la <a href="http://phplens.com/adodb/supported.databases.html" target="_blank">documentazione ADOdb</a> per i dettagli)';
$string['auth_dbtype_key'] = 'Database';
$string['auth_dbupdatinguser'] = 'Modifica utente {$a->name} id {$a->id}';
$string['auth_dbuser'] = 'Username con diritti di lettura nel database';
$string['auth_dbuser_key'] = 'Utente DB';
$string['auth_dbusernotexist'] = 'Non può essere modificato l\'utente non esistente: {$a}';
$string['auth_dbuserstoadd'] = 'Records di utente da aggiungere: {$a}';
$string['auth_dbuserstoremove'] = 'Records di utente da cancellare: {$a}';
$string['pluginname'] = 'Database esterno';
