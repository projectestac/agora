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
 * Strings for component 'enrol_database', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Verwijder geschorste gebruikers uit cursus';
$string['dbencoding'] = 'Databank encodering';
$string['dbhost'] = 'Databank host';
$string['dbhost_desc'] = 'Type databankserver, IP-adres of hostnaam. Gebruik een systeem DSN naam als je ODBC gebruikt.';
$string['dbname'] = 'Databanknaam';
$string['dbname_desc'] = 'Laat leeg als je een DSN naam in database host gebruikt.';
$string['dbpass'] = 'Databank wachtwoord';
$string['dbsetupsql'] = 'Databank setup commando';
$string['dbsetupsql_desc'] = 'SQL-commando voor speciale databank setup, dikwijls gebruikt voor het opzetten van communicatie-encodering - bijvoorbeeld voor MySQL en PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Gebruik sybase quotes';
$string['dbsybasequoting_desc'] = 'Sybase manier voor het escapen van enkele aanhalingstekens - nodig voor Oracle, MS SQL en enkele andere databanken. Niet gebruiken voor MySQL!';
$string['dbtype'] = 'Databankdriver';
$string['dbtype_desc'] = 'ADOdb databank drivernaam, type van de externe databank';
$string['dbuser'] = 'Databank gebruikersnaam';
$string['debugdb'] = 'Foutenopsporing ADOdb';
$string['debugdb_desc'] = 'Foutopsporing ADOdb-connectie naar externe databank - gebruik dit wanneer je een lege pagina krijgt bij aanmelding. Niet geschikt voor productie-sites!';
$string['defaultcategory'] = 'Standaardcategorie voor nieuwe cursussen';
$string['defaultcategory_desc'] = 'De standaarcategorie voor automatisch aangemaakte cursussen. Gebruikt wanneer er geen categorieID is opgegeven of wanneer die niet gevonden is.';
$string['defaultrole'] = 'Standaard rol';
$string['defaultrole_desc'] = 'De rol die standaard toegewezen zal worden als er geen andere rol is opgegeven in de externe tabel.';
$string['ignorehiddencourses'] = 'Negeer verborgen cursussen';
$string['ignorehiddencourses_desc'] = 'Indien ingeschakeld zullen gebruikers niet aangemeld worden in cursussen die onbeschikbaar gemaakt zijn voor leerlingen.';
$string['localcategoryfield'] = 'Lokaal categorieveld';
$string['localcoursefield'] = 'Lokaal cursusveld';
$string['localrolefield'] = 'Lokaal rolveld';
$string['localuserfield'] = 'Lokaal gebruikersveld';
$string['newcoursecategory'] = 'Veld voor nieuwe cursuscategorie';
$string['newcoursefullname'] = 'Veld voor cursus volledige naam';
$string['newcourseidnumber'] = 'Veld voor cursus ID-nummer';
$string['newcourseshortname'] = 'Veld voor cursus verkorte naam';
$string['newcoursetable'] = 'Tabel voor nieuwe cursussen';
$string['newcoursetable_desc'] = 'Geef de naam van de tabel op die de lijst met cursussen bevat die automatisch gecreëerd zou moeten worden. Leeg betekent dat er geen cursussen gemaakt zijn.';
$string['pluginname'] = 'Externe databank';
$string['pluginname_desc'] = 'Je kunt nagenoeg gelijk welke externe databank gebruiken om je aanmeldingen te controleren. Je externe databank moet minstens een veld bevatten met course ID en een veld met user ID. Deze worden vergeleken met velden die je kiest in de lokale cursus en gebruikerstabellen.';
$string['remotecoursefield'] = 'Extern cursusveld';
$string['remotecoursefield_desc'] = 'De veldnaam uit de externe tabel die we gebruiken om records in de cursustabel te koppelen.';
$string['remoteenroltable'] = 'Externe aanmeldingstabel';
$string['remoteenroltable_desc'] = 'Geef de naam van de tabel die een lijst bevat met gebruikersaanmeldingen. Leeg betekent geen aanmeldingssynchronisatie';
$string['remoterolefield'] = 'Extern rolveld';
$string['remoterolefield_desc'] = 'De velnaam uit de externe tabel die we gebruiken om records in de rollentabel te koppelen.';
$string['remoteuserfield'] = 'De veldnaam uit de externe tabel die we gebruiken om records in de gebruikerstabel te koppelen.';
$string['remoteuserfield_desc'] = 'De veldnaam uit de externe tabel die we gebruiken om records in de gebruikerstabel te koppelen.';
$string['settingsheaderdb'] = 'Externedatabank verbinding';
$string['settingsheaderlocal'] = 'Koppelen lokale velden';
$string['settingsheadernewcourses'] = 'Aanmaken van nieuwe cursussen';
$string['settingsheaderremote'] = 'Synchronisatie aanmeldingen';
$string['templatecourse'] = 'Sjabloon nieuwe cursus';
$string['templatecourse_desc'] = 'Optioneel: automatisch gemaakte cursussen kunnen hun instellingen kopiëren van een cursussjabloon. Typ hier de korte naam van de sjablooncursus.';
