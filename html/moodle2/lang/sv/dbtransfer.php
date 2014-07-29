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
 * Strings for component 'dbtransfer', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Kontrollerar strukturen på källtabellen';
$string['copyingtable'] = 'Kopierar tabell {$a}';
$string['copyingtables'] = 'Kopierar innehåll i tabell';
$string['creatingtargettables'] = 'Skapar tabellerna i måldatabasen';
$string['dbexport'] = 'Export av databas';
$string['dbtransfer'] = 'Överföring av databas';
$string['differenttableexception'] = 'Tabell {$a} strukturen matchar inte.';
$string['done'] = 'Klart';
$string['exportschemaexception'] = 'Den aktuella strukturen på databasen matchar inte alla install.xml filer. <br /> {$a}';
$string['importschemaexception'] = 'Den aktuella strukturen på databasen matchar inte alla install.xml filer. <br /> {$a}';
$string['importversionmismatchexception'] = 'Den aktuella versionen {$a->currentver}  matchar inte den exporterade versionen {$a->schemaver}.';
$string['malformedxmlexception'] = 'Felaktigt utformad XML hittades, det går inte att fortsätta.';
$string['unknowntableexception'] = 'En okänd tabell {$a} hittades i exportfilen.';
