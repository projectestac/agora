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
 * Strings for component 'enrol_database', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Disiscrivi utenti sospesi';
$string['dbencoding'] = 'Codifica databse';
$string['dbhost'] = 'Host database';
$string['dbhost_desc'] = 'Inserisci l\'IP o il nome del database server';
$string['dbname'] = 'Nome del database';
$string['dbpass'] = 'Password del database';
$string['dbsetupsql'] = 'Comando setup database';
$string['dbsetupsql_desc'] = 'Un comando SQL per il setup del database, spesso utilizzato per impostare la codifica della comunicazione. Esempio valido per MySQL e PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Usa sybase quote';
$string['dbsybasequoting_desc'] = 'Lo stile sybase di quote escaping è necessario per Oracle, MS SQL ed altri tipi di database. Non deve essere usato con MySQL!';
$string['dbtype'] = 'Driver del database';
$string['dbtype_desc'] = 'Il nome del driver ADOdb del database, tipo di motore del database esterno.';
$string['dbuser'] = 'Utente del database';
$string['debugdb'] = 'Debug ADOdb';
$string['debugdb_desc'] = 'Esegue il debug della connessione ADOdb. Utile se si ottengono pagine vuote durante il login. Da non usare su siti in produzione!';
$string['defaultcategory'] = 'Categoria di default per i nuovi corsi';
$string['defaultcategory_desc'] = 'La categoria di default per i corsi creati automaticamente. Viene utilizzato quando non è stata specificata o non è stata trovata la id della categoria.';
$string['defaultrole'] = 'Ruolo di default';
$string['defaultrole_desc'] = 'Il ruolo che sarà assegnato per default se nella tabella esterna non sono stati specificati ruoli diversi.';
$string['ignorehiddencourses'] = 'Ignora corsi nascosti';
$string['ignorehiddencourses_desc'] = 'Se abilitato, gli utenti non saranno iscritti nei corsi non disponibili agli studenti.';
$string['localcategoryfield'] = 'Campo categoria locale';
$string['localcoursefield'] = 'Campo locale per i corsi';
$string['localrolefield'] = 'Campo locale per il ruolo';
$string['localuserfield'] = 'Campo locale per l\'utente';
$string['newcoursecategory'] = 'Campo categoria per i nuovi corsi';
$string['newcoursefullname'] = 'Campo Titolo per i nuovi corsi';
$string['newcourseidnumber'] = 'Campo codice identificativo per i nuovi corsi';
$string['newcourseshortname'] = 'Campo Titolo abbreviato per i nuovi corsi';
$string['newcoursetable'] = 'Tabella remota per i nuovi corsi';
$string['newcoursetable_desc'] = 'Il nome della tabella che contiene l\'elenco dei corsi da creare automaticamente. Lasciando il nome vuoto non saranno creati corsi.';
$string['pluginname'] = 'Database esterno';
$string['pluginname_desc'] = 'Per gestire le iscrizioni ai corsi è possibile utilizzare un database esterno di (quasi) qualsiasi tipo. Si presuppone che il database esterno contenga almeno un campo con la ID del corso ed un campo che contenga la user id. Tali campi saranno confrontati con gli analoghi campi locali delle tabelle utenti e corsi.';
$string['remotecoursefield'] = 'Campo remoto per i corsi';
$string['remotecoursefield_desc'] = 'Il nome del campo della tabella remota utilizzato per individuare il corso nella tabella dei corsi.';
$string['remoteenroltable'] = 'Tabella remota con le iscrizioni degli utenti';
$string['remoteenroltable_desc'] = 'Il nome della tabella remota che contiene l\'elenco degli utenti iscritti. Lasciando vuoto il nome non sarà effettuata la sincronizzazione delle iscrizioni degli utenti.';
$string['remoterolefield'] = 'Campo remoto per il ruolo';
$string['remoterolefield_desc'] = 'Il nome del campo della tabella remota utilizzato per individuare il ruolo nella tabella dei ruoli.';
$string['remoteuserfield'] = 'Campo remoto per l\'utente';
$string['remoteuserfield_desc'] = 'Il nome del campo della tabella remota utilizzato per individuare l\'utente nella tabella degli utenti.';
$string['settingsheaderdb'] = 'Connessione al database esterno';
$string['settingsheaderlocal'] = 'Mappatura campi locali';
$string['settingsheadernewcourses'] = 'Creazione di nuovi corsi';
$string['settingsheaderremote'] = 'Sincronizzazione remota iscrizioni';
$string['templatecourse'] = 'Template per nuovo corso';
$string['templatecourse_desc'] = 'Opzionale: i corsi creati automaticamente possono copiare le impostazioni da un corso template. E\' possibile specificare il nome abbreviato del corso da usare come template.';
