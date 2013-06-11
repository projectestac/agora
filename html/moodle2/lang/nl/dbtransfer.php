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
 * Strings for component 'dbtransfer', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Controleren van de brontabel structuur';
$string['copyingtable'] = 'Kopiëren van tabel {$a}';
$string['copyingtables'] = 'Kopiëren van de tabelinhoud';
$string['creatingtargettables'] = 'Aanmaken van tabellen in de doeldatabank';
$string['dbexport'] = 'Databank export';
$string['dbtransfer'] = 'Databank transfer';
$string['differenttableexception'] = 'Tabel {$a} structuur komt niet overeen.';
$string['done'] = 'Klaar';
$string['exportschemaexception'] = 'De huidige databankstructuur komt niet overeen met alle install.xml-bestanden.<br />{$a}';
$string['importschemaexception'] = 'De huidige databankstructuur komt niet overeen met alle install.xml-bestanden.<br />{$a}';
$string['importversionmismatchexception'] = 'Huidige versie {$a->currentver} komt niet overeen met de geëxporteerde versie {$a->schemaver}.';
$string['malformedxmlexception'] = 'Slecht gevormde XML gevonden. Kan niet verdergaan.';
$string['unknowntableexception'] = 'Onbekende tabel {$a} gevonden in exportbestand.';
