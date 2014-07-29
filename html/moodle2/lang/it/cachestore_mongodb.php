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
 * Strings for component 'cachestore_mongodb', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_mongodb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database'] = 'Database';
$string['database_help'] = 'Il nome del database da utilizzare';
$string['extendedmode'] = 'Utilizza chiavi estese';
$string['extendedmode_help'] = 'Consente di utilizzare set di chiavi complete. L\'impostazione, sebbene non venga ancora di fatto utilizzata, facilita la ricerca e lo studio manuale del plugin MongoDB. L\'impostazione provoca un leggero sovraccarico e va attivata solo se necessaria.';
$string['password'] = 'Password';
$string['password_help'] = 'La password dell\'utente utilizzato per la connessione.';
$string['pluginname'] = 'MongoDB';
$string['replicaset'] = 'Replica set';
$string['replicaset_help'] = 'Il nome di un replica set al quale connettersi. Inserendo un nome, il master sarà identificato usando il comando database ismaster sui semi, in questo modo il driver potrebbe finire con il collegarsi a server non elencati.';
$string['server'] = 'Server';
$string['server_help'] = 'La stringa per la connessione al server da utilizzare. E\' possibile indicare più server separandoli con le virgole.';
$string['testserver'] = 'Test server';
$string['testserver_desc'] = 'La stringa di connessione da utilizzare per il server di test. La loro impostazione è opzionale, impostando un server di test sarà possibile eseguire sia test PHPunit su questo store sia test di prestazioni.';
$string['username'] = 'Username';
$string['username_help'] = 'Lo username da utilizzare per la connessione';
$string['usesafe'] = 'Uso sicuro';
$string['usesafe_help'] = 'Abilita l\'opzione usesafe per le operazioni insert, get e remove. Se è stato specificato un set di replica,  l\'opzione sarà abilitata comunque.';
$string['usesafevalue'] = 'Valore uso sicuro';
$string['usesafevalue_help'] = 'E\' possibile specificare un valore per l\'uso sicuro, impostando il numero di server sui quali le operazioni devono risultare obbligatoriamente completate.';
