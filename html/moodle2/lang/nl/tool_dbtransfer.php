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
 * Strings for component 'tool_dbtransfer', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Beschikbare databasedrivers voor migratie';
$string['cliheading'] = 'Databasemigratie - zorg er voor dat niemand toegang heeft tot de server tijdens de migraitie!';
$string['climigrationnotice'] = 'Databasemigratie bezig, wacht tot de migratie klaar is en de serverbeheerder de configuratie update en het bestand $CFG->dataroot/climaintenance.html verwijdert.';
$string['convertinglogdisplay'] = 'Log toon acties converteren';
$string['dbexport'] = 'Databank export';
$string['dbtransfer'] = 'Databank migratie';
$string['enablemaintenance'] = 'Onderhoudsmodus inschakelen';
$string['enablemaintenance_help'] = 'Deze optie schakelt de ondhoudsmodus in tijdens en na de databankmigratie. Dit voorkomt toegang voor alle gebruikers tot de migratie afgerond is. Merk op dat de beheerder manueel het bestand $CFG->dataroot/climaintenance.html file verwijderen na het updaten van config.php om de normale werking van de site te hernemen.';
$string['exportdata'] = 'Export data';
$string['notargetconectexception'] = 'Kan geen verbinding maken met de doeldatabank';
$string['options'] = 'Opties';
$string['pluginname'] = 'Databank transfer';
$string['targetdatabase'] = 'Doeldatabank';
$string['targetdatabasenotempty'] = 'Doeldatabank mag geen tabellen bevatten met het gegeven prefix!';
$string['transferdata'] = 'Transfer gegevens';
$string['transferdbintro'] = 'Dit script zal de inhoud van de databank naar een andere databank-server transfereren. Dit wordt gebruikt voor het migreren van data naar een ander type databank.';
$string['transferdbtoserver'] = 'Verhuis deze Moodle-databank naar een andere server';
$string['transferringdbto'] = 'Deze databank aan het verhuizen naar een  {$a->dbtype} -databank met als naam {$a->dbname} op server {$a->dbhost}';
