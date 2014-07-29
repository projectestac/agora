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
 * Strings for component 'auth_db', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbcantconnect'] = 'Det gick inte att ansluta till den angivna databasen för autenticering.';
$string['auth_dbchangepasswordurl_key'] = 'URL till sida för att ändra lösenord';
$string['auth_dbdebugauthdb'] = 'Felsök ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Felsök anslutningen för ADOdb till den externa databasen - använd den när Du får en tom sida under inloggning. Detta rekommenderas inte för verksamhetskritiska  webbplatser.';
$string['auth_dbdeleteuser'] = 'Tog bort användare {$a->name} id {$a->id}';
$string['auth_dbdeleteusererror'] = 'Fel vid borttagande av användare {$a}';
$string['auth_dbdescription'] = 'Denna metod använder en extern databastabell för att kontrollera huruvida ett givet användarnamn och lösenord är giltigt.  Om kontot är nytt, så kan information från andra fält också kopieras till Moodle.';
$string['auth_dbextencoding'] = 'Teckenuppsättning för extern  db';
$string['auth_dbextencodinghelp'] = 'Den teckenuppsättning som används i den externa databasen';
$string['auth_dbextrafields'] = 'Detta fält är valfritt. Du kan välja att på förhand fylla i några användarfält för Moodle med information från <b>externa databasfält</b> som Du kan specificera här. <p>Om Du lämnar dessa fält tomma, så kommer standardvärden att användas.</p><p>I vilket fall som helst, kommer användaren kunna redigera alla dessa fält efter det att de loggat in.</p>';
$string['auth_dbfieldpass'] = 'Namn på det fält som innehåller lösenord';
$string['auth_dbfieldpass_key'] = 'Fält för lösenord';
$string['auth_dbfielduser'] = 'Namn på det fält som innehåller användarnamn';
$string['auth_dbfielduser_key'] = 'Fält för användarnamn';
$string['auth_dbhost'] = 'Den dator (värd) som används för databasservern.';
$string['auth_dbhost_key'] = 'Värd';
$string['auth_dbinsertuser'] = 'Infogade användare {$a->name} id {$a->id}';
$string['auth_dbinsertusererror'] = 'Fel vid infogande av användare {$a}';
$string['auth_dbname'] = 'Namnet på själva databasen';
$string['auth_dbname_key'] = 'DB-namn';
$string['auth_dbpass'] = 'Lösenord som matchar ovanstående användarnamn';
$string['auth_dbpass_key'] = 'Lösenord';
$string['auth_dbpasstype'] = '<p>Ange formatet på det fält som lösenordet ska ligga i. MD-kryptering går att använda om Du vill koppla upp Dig mot andra vanliga webbapplikationer som PostNuke.</p><p>Använd \'intern\' om Du vill att den externa databasen ska hantera användarnamn & e-postadresser och att Moodle ska hantera lösenorden. Om Du använder \'intern\' så <i>måste</i> Du tillhandahålla ett fält (med innehåll) för e-postadresser i den externa databasen och Du måste också köra både admin/cron.php och auth/db/auth_db_sync_users.php regelbundet. Moodle kommer att skicka e-post till med ett tillfälligt lösenord till nya användare.</p>';
$string['auth_dbpasstype_key'] = 'Format på lösenord';
$string['auth_dbreviveduser'] = 'Återställde användare {$a->name} id {$a->id}';
$string['auth_dbrevivedusererror'] = 'Fel vid återställning av användare {$a}';
$string['auth_dbsetupsql'] = 'Kommando för att installera SQL';
$string['auth_dbsetupsqlhelp'] = 'SQL kommando för specialinstallation av databas, ofta använd för att installera teckenuppsättning för kommunikation - t.ex. för MySQL och PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'Stängde av användare {$a->name} id {$a->id}';
$string['auth_dbsuspendusererror'] = 'Fel vid avstängning av användare {$a}';
$string['auth_dbsybasequoting'] = 'Använd apostrofer av typ sybase';
$string['auth_dbsybasequotinghelp'] = 'Den stil med enkla apostrofer för \'escaping\' som Sybase använder - den behövs för Oracle, MS SQL och en del andra databaser. Använd inte detta i MySQL!';
$string['auth_dbtable'] = 'Namn på tabellen i databasen';
$string['auth_dbtable_key'] = 'Tabell';
$string['auth_dbtype'] = 'Databastyp (se <a href=../lib/adodb/readme.htm#drivers>ADOdb dokumentation</a> för detaljer)';
$string['auth_dbtype_key'] = 'Databas';
$string['auth_dbupdatinguser'] = 'Uppdaterar användare {$a->name} id {$a->id}';
$string['auth_dbuser'] = 'Användarnamn med läsbehörighet till databasen';
$string['auth_dbuser_key'] = 'DB-användare';
$string['auth_dbusernotexist'] = 'Det går inte att uppdatera en icke-existerande användare: {$a}';
$string['auth_dbuserstoadd'] = 'Inmatningar från användare som ska läggas till: {$a}';
$string['auth_dbuserstoremove'] = 'Inmatningar från användare som ska tas bort:: {$a}';
$string['pluginname'] = 'Extern databas';
