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
 * Strings for component 'enrol_database', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Gesperrte Nutzer/innen abmelden';
$string['dbencoding'] = 'Datenbankkodierung';
$string['dbhost'] = 'Datenbankserver';
$string['dbhost_desc'] = 'IP-Adresse oder URL des Datenbankservers eintragen';
$string['dbname'] = 'Datenbankname';
$string['dbpass'] = 'Datenbankkennwort';
$string['dbsetupsql'] = 'Datenbanksetup';
$string['dbsetupsql_desc'] = 'SQL Kommando für speziellen Datenbank Setup. Dies wird häufig verwendet um Encoding festzulegen:Beispiel für - example for MySQL und PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Sybase Quotes verwenden';
$string['dbsybasequoting_desc'] = 'Sybase verwendet einfache Anführungsstriche - erforderlich für Oracle, MS SQL und einige andere Datenbanken. Nicht für MySQL verwenden !';
$string['dbtype'] = 'Datenbanktreiber';
$string['dbtype_desc'] = 'ADOdb Datenbanktreibername, Typ der externen Datenbankengine';
$string['dbuser'] = 'Datenbanknutzer';
$string['debugdb'] = 'Debug ADOdb';
$string['debugdb_desc'] = 'Debug ADOdb Verbindung zu externer Datenbank - kann ausgeführt werden wenn bei Login leere Seite erscheint. Nicht für produktive Seiten!';
$string['defaultcategory'] = 'Standardmäßiger Kursbereich';
$string['defaultcategory_desc'] = 'Der standardmäßige Kursbereich für automatisch angelegte Kurse wird benutzt, falls keine Kursbereichs-ID festgelegt wurde.';
$string['defaultrole'] = 'Rolle im Kurs';
$string['defaultrole_desc'] = 'Die Standardrolle wird zugewiesen, falls keine andere Rolle in der externen Tabelle festgelegt wurde.';
$string['ignorehiddencourses'] = 'Verborgene Kurse ignorieren';
$string['ignorehiddencourses_desc'] = 'Wenn diese Option aktiviert ist, werden Nutzer/innen nicht in Kurse eingeschrieben, die für sie nicht freigegeben sind.';
$string['localcategoryfield'] = 'Lokales Kategoriefeld';
$string['localcoursefield'] = 'Lokaler Kurs';
$string['localrolefield'] = 'Lokale Rolle';
$string['localuserfield'] = 'Lokaler Nutzer';
$string['newcoursecategory'] = 'Kursbereich des neuen Kurses';
$string['newcoursefullname'] = 'Vollstandiger Name des neuen Kurses';
$string['newcourseidnumber'] = 'ID-Nummer des neuen Kurses';
$string['newcourseshortname'] = 'Kurzname des neuen Kurses';
$string['newcoursetable'] = 'Externe neue Kurstabelle';
$string['newcoursetable_desc'] = 'Name der Tabelle mit der Liste der Kurse, die automatisch erstellt werden sollen. Leer bedeutet: es werden keine neuen Kurse angelegt.';
$string['pluginname'] = 'Externe Datenbank';
$string['pluginname_desc'] = 'Sie können eine externe Datenbank (nahe jeden Typs) zur Kontrolle der Einschreibungen verwenden. Diese muss zumindest ein Feld für eien Kurs-ID und die User-ID enthalten. Diese werden mit den Inhalten in der Moodle-Datenbank abgeglichen.';
$string['remotecoursefield'] = 'Kursfeld (Remote)';
$string['remotecoursefield_desc'] = 'Der Feldname in der Remotetabelle, das für Einträge in der Kurstabelle zugeordnet wird.';
$string['remoteenroltable'] = 'Externe Nutzertabelle';
$string['remoteenroltable_desc'] = 'Geben Sieden Namen derTabelel an, die die Nutzereinschreibungen enthält. Leer bedeutet, dass keine Nutzer zugeordnet werden.';
$string['remoterolefield'] = 'Rollenfeld (Remote)';
$string['remoterolefield_desc'] = 'Der Feldname in der Remotetabelle, das für Einträge in der Rollentabelle zugeordnet wird.';
$string['remoteuserfield'] = 'Nutzerfeld (Remote)';
$string['remoteuserfield_desc'] = 'Der Feldname in der Remotetabelle, das für Einträge in der Nutzertabelle zugeordnet wird.';
$string['settingsheaderdb'] = 'Externe Datenbankverbindung';
$string['settingsheaderlocal'] = 'Lokale Feldzuordnung';
$string['settingsheadernewcourses'] = 'Erstellen eines neuen Kurses';
$string['settingsheaderremote'] = 'Einschreibesynchronisation (Remote)';
$string['templatecourse'] = 'Vorlage für neue Kurse';
$string['templatecourse_desc'] = 'Optional: Automatisch angelegte Kurse können ihre Einstellungen aus einem Vorlagenkurs beziehen. Tragen Sie hier den Kursnamen des Vorlagenkurses ein. ';
