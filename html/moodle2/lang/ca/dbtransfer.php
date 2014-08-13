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
 * Strings for component 'dbtransfer', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'S\'està comprovant l\'estructura de taules de la font';
$string['copyingtable'] = 'S\'està copiant la taula {$a}';
$string['copyingtables'] = 'S\'estan copiant els continguts de les taules';
$string['creatingtargettables'] = 'S\'estan creant les taules a la base de dades de destinació';
$string['dbexport'] = 'Exportació de la base de dades';
$string['dbtransfer'] = 'Transferència de la base de dades';
$string['differenttableexception'] = 'L\'estructura de la taula {$a} no concorda.';
$string['done'] = 'Fet';
$string['exportschemaexception'] = 'L\'estructura d\'aquesta base de dades no concorda amb tots els fitxers install.xml. <br /> {$a}';
$string['importschemaexception'] = 'L\'estructura d\'aquesta base de dades no concorda amb tots els fitxers install.xml. <br /> {$a}';
$string['importversionmismatchexception'] = 'Aquesta versió
{$a->currentver}
no concorda amb la versió exportada
{$a->schemaver}.';
$string['malformedxmlexception'] = 'S\'ha trobat un XML malmès, no es pot continuar.';
$string['tablex'] = 'Taula {$a}:';
$string['unknowntableexception'] = 'S\'ha trobat una taula desconeguda {$a} al fitxer d\'exportació';
