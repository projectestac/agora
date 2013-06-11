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
 * Strings for component 'dbtransfer', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Controllo della struttura delle tabelle sorgente';
$string['copyingtable'] = 'Copia della tabella {$a}';
$string['copyingtables'] = 'Copia del contenuto della tabella';
$string['creatingtargettables'] = 'Creazione delle tabelle nel database destinazione';
$string['dbexport'] = 'Esportazione database';
$string['dbtransfer'] = 'Importazione database';
$string['differenttableexception'] = 'la struttura della tabella {$a} non corrisponde';
$string['done'] = 'Completato';
$string['exportschemaexception'] = 'L\'attuale struttura del database non corrisponde ai file install.xml.<br /> {$a}';
$string['importschemaexception'] = 'L\'attuale struttura del database non corrisponde ai file install.xml.<br /> {$a}';
$string['importversionmismatchexception'] = 'La versione attuale {$a->currentver} non corrisponde alla versione esportata {$a->schemaver}.';
$string['malformedxmlexception'] = 'E\' stato rilevato un XML malformed, non posso proseguire.';
$string['unknowntableexception'] = 'Nel file di esportazione è stata trovata la tabella sconosciuta {$a}.';
