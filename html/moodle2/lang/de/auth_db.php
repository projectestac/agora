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
 * Strings for component 'auth_db', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbcantconnect'] = 'Es konnte keine Verbindung zur angegebenen Authentifizierungsdatenbank hergestellt werden.';
$string['auth_dbchangepasswordurl_key'] = 'URL zur Kennwortänderung';
$string['auth_dbdebugauthdb'] = 'Debug ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Ein Debug der ADOdb Verbindung zur externen Datenbank sollte ausgeführt werden, wenn beim Login eine leere Seite erscheint. Die Funktion sollte nicht auf Produktivinstallationen eingesetzt werden.';
$string['auth_dbdeleteuser'] = 'Gelöschte Nutzer/in {$a->name} ID {$a->id}';
$string['auth_dbdeleteusererror'] = 'Fehler beim Löschen von Nutzer/in {$a}';
$string['auth_dbdescription'] = 'Diese Methode benutzt eine externe Datenbank-Tabelle, um die Gültigkeit von angegebenem Anmeldenamen und Kennwort zu überprüfen. Wenn der Zugang neu ist, werden die Informationen der übrigen Felder ebenso zu Moodle hinüberkopiert.';
$string['auth_dbextencoding'] = 'Externe db-Verschlüsselung';
$string['auth_dbextencodinghelp'] = 'Die externe Datenbank verwendet eine Verschlüsselung';
$string['auth_dbextrafields'] = 'Diese Felder sind optional. Sie können auswählen, einige Moodle-Nutzerfelder mit Informationen des <b>externen Datenbank-Feldes</b> vorauszufüllen, das Sie hier angeben.
<p>Wenn Sie dieses leer lassen, werden Standardwerte benutzt.</p><p>Im anderen Fall müssen die Nutzer/innen alle Felder nach der Anmeldung ausfüllen./p>';
$string['auth_dbfieldpass'] = 'Name des Feldes, das das Passwort enthält';
$string['auth_dbfieldpass_key'] = 'Kennwortfeld';
$string['auth_dbfielduser'] = 'Name des Feldes, das den Nutzernamen enthält';
$string['auth_dbfielduser_key'] = 'Nutzernamenfeld';
$string['auth_dbhost'] = 'Computer mit der Datenbank. Bei ODBC benutzen Sie einen DSN-Systemeintrag.';
$string['auth_dbhost_key'] = 'Host';
$string['auth_dbinsertuser'] = 'Eingefügte Nutzer/in {$a->name} ID {$a->id}';
$string['auth_dbinsertuserduplicate'] = 'Fehler beim Anlegen des Nutzers {$a->username}. Ein Nutzer mit diesem Nutzernamen wurde bereits mit der Authentifizierung über \'{$a-auth}\' angelegt.';
$string['auth_dbinsertusererror'] = 'Fehler beim Einfügen von Nutzer/in {$a}';
$string['auth_dbname'] = 'Name der Datenbank. Bei ODBC DSN lassen Sie das Feld leer.';
$string['auth_dbname_key'] = 'DB Name';
$string['auth_dbpass'] = 'Passwort, das zum Nutzernamen gehört';
$string['auth_dbpass_key'] = 'Kennwort';
$string['auth_dbpasstype'] = '<p>Geben Sie an, welches Format das Kennwortfeld benutzt. MD5-Hashing ist nützlich, um Verbindungen mit anderen Webanwendungen herzustellen, wie etwa zu PostNuke.</p> <p>Verwenden Sie \'internal\', falls die externe Datenbank die Anmeldenamen und E-Mail-Adresse verwalten soll, aber Moodle für die Kennworte zuständig ist. In diesem Fall <i>müssen</i> Sie ein E-Mail-Feld in der externen Datenbank bereitstellen und die beiden Scripte admin/cron.php und auth/db/cli/sync_users.php regelmäßig ausführen! Moodle sendet an alle neuen Nutzer/innen eine E-Mail mit einem temporären Kennwort.</p>';
$string['auth_dbpasstype_key'] = 'Kennwortformat';
$string['auth_dbreviveduser'] = 'Entsperrte Nutzer/in {$a->name} ID {$a->id}';
$string['auth_dbrevivedusererror'] = 'Fehler beim Entsperren von Nutzer/in {$a}';
$string['auth_dbsetupsql'] = 'SQL setup Kommando';
$string['auth_dbsetupsqlhelp'] = 'SQL Kommando für spezielles Datenbanksetup bei Kommunikationscodierung - Beispiel für MySQL und PostgreSQL: <em>SET NAMES \'uft8\'</em>';
$string['auth_dbsuspenduser'] = 'Gesperrte Nutzer/in {$a->name} ID {$a->id}';
$string['auth_dbsuspendusererror'] = 'Fehler beim Sperren von Nutzer/in {$a}';
$string['auth_dbsybasequoting'] = 'Sybase Anführungszeichen verwenden';
$string['auth_dbsybasequotinghelp'] = 'Sybase Stil mit einfachen Anführungszeichen - für Oracle, MS SQL und einige andere Datenbanken, nicht jedoch für MySQL verwnden!';
$string['auth_dbtable'] = 'Name der Datenbank-Tabelle';
$string['auth_dbtable_key'] = 'Tabelle';
$string['auth_dbtype'] = 'Datenbanktyp (siehe <a href="http://phplens.com/adodb/supported.databases.html">ADOdb Dokumentation</a>)';
$string['auth_dbtype_key'] = 'Datenbank';
$string['auth_dbupdatinguser'] = 'Aktualisierte Nutzer/in {$a->name} ID {$a->id}';
$string['auth_dbuser'] = 'Nutzername mit Schreibzugriff auf die Datenbank';
$string['auth_dbuser_key'] = 'Datenbanknutzer';
$string['auth_dbusernotexist'] = 'Nicht existierender Nutzer {$a} kann nicht aktualisiert werden';
$string['auth_dbuserstoadd'] = 'Nutzereinträge zum Hinzufügen: {$a}';
$string['auth_dbuserstoremove'] = 'Nutzereinträge zum Entfernen: {$a}';
$string['pluginname'] = 'Externe Datenbank';
