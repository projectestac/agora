<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_dbcantconnect'] = 'Es konnte keine Verbindung zur angegebenen Authentifizierungsdatenbank hergestellt werden.';
$string['auth_dbchangepasswordurl_key'] = 'URL zur Kennwortänderung';
$string['auth_dbdebugauthdb'] = 'Debug ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Debug der ADOdb Verbindung zu externer Datenbank. Diese Funktion kann ausgeführt werden wenn beim Login eine leere Seite erscheint. Die Funktion sollte nicht auf Produktivinstallationen eingesetzt werden.';
$string['auth_dbdeleteuser'] = 'Gelöschte Nutzer/innen $a[0] id $a[1]';
$string['auth_dbdeleteusererror'] = 'Fehler beim Löschen von Nutzer/in $a';
$string['auth_dbdescription'] = 'Diese Methode benutzt eine externe Datenbank-Tabelle, um die Gültigkeit von angegebenem Anmeldenamen und Kennwort zu überprüfen. Wenn der Zugang neu ist, werden die Informationen der übrigen Felder ebenso zu Moodle hinüberkopiert.';
$string['auth_dbextencoding'] = 'Externe db Codierung';
$string['auth_dbextencodinghelp'] = 'Codierung in externer Datenbank verwandt';
$string['auth_dbextrafields'] = 'Diese Felder sind optional. Sie können auswählen, einige Moodle-Nutzerfelder mit Informationen des <b>externen Datenbank-Feldes</b> vorauszufüllen, das Sie hier angeben.
<p>Wenn Sie dieses leer lassen, werden Standardwerte benutzt.</p><p>Im anderen Fall müssen die Nutzer/innen alle Felder nach der Anmeldung ausfüllen./p>';
$string['auth_dbfieldpass'] = 'Name des Feldes, das das Passwort enthält';
$string['auth_dbfieldpass_key'] = 'Kennwortfeld';
$string['auth_dbfielduser'] = 'Name des Feldes, das den Nutzernamen enthält';
$string['auth_dbfielduser_key'] = 'Nutzernamenfeld';
$string['auth_dbhost'] = 'Der Computer, der die Datenbank bereitstellt';
$string['auth_dbhost_key'] = 'Host';
$string['auth_dbinsertuser'] = 'Eingefügte Nutzer/innen $a[0] id $a[1]';
$string['auth_dbinsertusererror'] = 'Fehler beim Einfügen von Nutzer/in $a';
$string['auth_dbname'] = 'Name der Datenbank';
$string['auth_dbname_key'] = 'DB Name';
$string['auth_dbpass'] = 'Passwort, das zum Nutzernamen gehört';
$string['auth_dbpass_key'] = 'Kennwort';
$string['auth_dbpasstype'] = 'Spezifizieren Sie das Format, das das Passwortfeld benutzt. MD5-Verschlüsselung ist nützlich dafür, mit anderen üblichen Netzanwendungen Verbindung aufzunehmen, wie z.B. PostNuke';
$string['auth_dbpasstype_key'] = 'Kennwortformat';
$string['auth_dbreviveduser'] = 'Aktualisieren von Nutzer/innen $a[0] id $a[1]';
$string['auth_dbrevivedusererror'] = 'Fehler beim Aktualisieren von Nutzer/in $a';
$string['auth_dbsetupsql'] = 'SQL setup Kommando';
$string['auth_dbsetupsqlhelp'] = 'SQL Kommando für spezielles Datenbanksetup bei Kommunikationscodierung - Beispiel für MySQL und PostgreSQL: <em>SET NAMES \'uft8\'</em>';
$string['auth_dbsuspenduser'] = 'Gesperrte Nutzer/innen $a[0] id $a[1]';
$string['auth_dbsuspendusererror'] = 'Fehler beim Sperren von Nutzer/in $a';
$string['auth_dbsybasequoting'] = 'Sybase Anführungszeichen verwenden';
$string['auth_dbsybasequotinghelp'] = 'Sybase Stil mit einfachen Anführungszeichen - für Oracle, MS SQL und einige andere Datenbanken, nicht jedoch für MySQL verwnden!';
$string['auth_dbtable'] = 'Name der Datenbank-Tabelle';
$string['auth_dbtable_key'] = 'Tabelle';
$string['auth_dbtitle'] = 'Externe Datenbank';
$string['auth_dbtype'] = 'Der Datenbank-Typ (Siehe <a href=\"../lib/adodb/readme.htm#drivers\">ADOdb Anleitung</a> für Einzelheiten)';
$string['auth_dbtype_key'] = 'Datenbank';
$string['auth_dbupdatinguser'] = 'Aktualisieren von Nutzer/innen $a[0] id $a[1]';
$string['auth_dbuser'] = 'Nutzername mit Schreibzugriff auf die Datenbank';
$string['auth_dbuser_key'] = 'Datenbanknutzer';
$string['auth_dbusernotexist'] = 'Nicht existierender Nutzer $a kann nicht aktualisiert werden';
$string['auth_dbuserstoadd'] = 'Nutzereinträge zum Hinzufügen: $a';
$string['auth_dbuserstoremove'] = 'Nutzereinträge zum Entfernen: $a';