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
 * Strings for component 'tool_dbtransfer', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Driver database disponibili per la migrazione';
$string['cliheading'] = 'Migrazione database - accertati che non vi siano accessi al server durante la migrazione!';
$string['climigrationnotice'] = 'E\' in corso la migrazione del database. Per favore attendi il completamento delle operazioni, l\'aggiornamento delle configurazioni e l\'eliminazione del file $CFG->dataroot/climaintenance.html da parte dell\'amministratore del server.';
$string['convertinglogdisplay'] = 'Conversione della visualizzazione delle azioni del log';
$string['dbexport'] = 'Esportazione database';
$string['dbtransfer'] = 'Migrazione database';
$string['enablemaintenance'] = 'Abilita modalità manutenzione';
$string['enablemaintenance_help'] = 'Abilita la modalità manutenzione durante la migrazione del database, lasciandola attiva anche in seguito per evitare accessi indesiderati fino al completamento della migrazione. Da notare che l\'amministratore per rendere il sito nuovamente disponibile dovrà eliminare manualmente il file $CFG->dataroot/climaintenance.html dopo aver modificato il file config.php.';
$string['exportdata'] = 'Esporta dati';
$string['notargetconectexception'] = 'Non è possibile connettersi al database di destinazione';
$string['options'] = 'Opzioni';
$string['pluginname'] = 'Trasferimento database';
$string['targetdatabase'] = 'Database di destinazione';
$string['targetdatabasenotempty'] = 'Il database di destinazione non deve contenere tabelle con prefissi!';
$string['transferdata'] = 'Trasferisci dati';
$string['transferdbintro'] = 'Lo script trasferisce tutti i contenuti di questo database in un altro database server. Può essere utilizzato per migrare dati tra database di tipo diverso.';
$string['transferdbtoserver'] = 'Trasferimento del database di Moodle su un altro server';
$string['transferringdbto'] = 'E\' in corso il trasferimento di questo database {$a->dbtypefrom} verso il database {$a->dbtype} {$a->dbname} su {$a->dbhost}.';
