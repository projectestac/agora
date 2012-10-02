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
 * Strings for component 'tool_dbtransfer', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Verfügbare Datenbanktreiber für die Migration';
$string['cliheading'] = 'Datenbank-Migration - während der Migration darf kein Serverzugriff stattfinden!';
$string['climigrationnotice'] = 'Aktuell läuft eine Datenbank-Migration - bitte warten Sie, bis die Migration abgeschlossen ist und der Administrator die Konfiguration aktualisiert und die Datei $CFG->dataroot/climaintenance.html gelöscht hat.';
$string['convertinglogdisplay'] = 'Logging-Anzeigen werden konvertiert';
$string['dbexport'] = 'Datenbank-Export';
$string['dbtransfer'] = 'Datenbank-Migration';
$string['enablemaintenance'] = 'Wartungsmodus aktivieren';
$string['exportdata'] = 'Daten exportieren';
$string['notargetconectexception'] = 'Die Zieldatenbank kann nicht verbunden werden';
$string['options'] = 'Optionen';
$string['pluginname'] = 'Datenbank-Export';
$string['targetdatabase'] = 'Zieldatenbank';
$string['targetdatabasenotempty'] = 'Die Zieldatenbank darf keine Tabellen mit dem gewählten Prefix enthalten!';
$string['transferdata'] = 'Daten übertragen';
$string['transferdbintro'] = 'Dieses Skript überträgt die Inhalte dieser Datenbank vollständig in eine andere Datenbank. Es wird oft benutzt, um Daten in einen anderen Datenbanktyp zu umzuwandeln.';
$string['transferdbtoserver'] = 'Diese Moodle-Datenbank auf einen anderen Server übertragen';
$string['transferringdbto'] = 'Diese Datenbank in die {$a->dbtype} Datenbank \'{$a->dbname}\' auf \'{$a->dbhost}\' übertragen';
