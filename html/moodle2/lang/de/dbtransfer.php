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
 * Strings for component 'dbtransfer', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Tabellenstruktur der Quelldatenbank wird geprüft';
$string['copyingtable'] = 'Tabelle {$a} wird kopiert';
$string['copyingtables'] = 'Tabelleninhalte werden kopiert';
$string['creatingtargettables'] = 'Tabellen werden in der Zieldatenbank angelegt';
$string['dbexport'] = 'Datenbank-Export';
$string['dbtransfer'] = 'Datenbank-Transfer';
$string['differenttableexception'] = 'Die Tabellenstruktur passt nicht: {$a}';
$string['done'] = 'Fertig';
$string['exportschemaexception'] = 'Die aktuelle Datenbankstruktur passt nicht zu allen Dateien install.xml. <br />{$a}';
$string['importschemaexception'] = 'Die aktuelle Datenbankstruktur passt nicht zu allen Dateien install.xml. <br />{$a}';
$string['importversionmismatchexception'] = 'Die aktuelle Version {$a->currentver} passt nicht zur exportierten Version {$a->schemaver}.';
$string['malformedxmlexception'] = 'Fehler in XML gefunden. Fortsetzung nicht möglich.';
$string['tablex'] = 'Tabelle {$a}:';
$string['unknowntableexception'] = 'Unbekannte Tabelle in der Exportdatei: {$a}';
