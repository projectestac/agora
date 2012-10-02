<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_dbcantconnect'] = 'Kon niet met de opgegeven authenticatiedatabank verbinden...';
$string['auth_dbchangepasswordurl_key'] = 'URL om wachtwoord te wijzigen';
$string['auth_dbdebugauthdb'] = 'Foutopsporing ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Foutopsporing van de ADOdb-connectie naar de externe databank - gebruik dit wanneer je een lege pagina krijgt tijdens het inloggen. Niet gebruiken op productiesites.';
$string['auth_dbdeleteuser'] = 'verwijderde gebruiker $a[0] id $a[1]';
$string['auth_dbdeleteusererror'] = 'fout bij het verwijderen van gebruiker $a';
$string['auth_dbdescription'] = 'Deze methode gebruikt een externe database om te controleren of een bepaalde gebruikersnaam en een bepaald wachtwoord geldig zijn. Als de account nieuw is dan kan informatie vanuit andere velden ook naar Moodle worden gekopieerd.';
$string['auth_dbextencoding'] = 'Encoding van externe databank';
$string['auth_dbextencodinghelp'] = 'Encoding gebruikt in externe databank';
$string['auth_dbextrafields'] = 'Deze velden zijn niet verplicht. Je kunt ervoor kiezen om sommige Moodle-gebruikersvelden in te vullen met informatie uit de <b>externe database velden</b> die je hier aangeeft. <p>Als je deze niet invult zullen standaardwaarden worden gebruikt.</p> <p>In beide gevallen kan de gebruiker alle velden wijzigen zodra hij/zij is ingelogd.</p>';
$string['auth_dbfieldpass'] = 'Naam van het veld dat de wachtwoorden bevat';
$string['auth_dbfieldpass_key'] = 'Wachtwoordveld';
$string['auth_dbfielduser'] = 'Naam van het veld dat de gebruikersnamen bevat';
$string['auth_dbfielduser_key'] = 'Veld gebruikersnaam';
$string['auth_dbhost'] = 'De computer die de databaseserver host';
$string['auth_dbhost_key'] = 'Host';
$string['auth_dbinsertuser'] = 'toegevoegde gebruiker $a[0] id $a[1]';
$string['auth_dbinsertusererror'] = 'fout bij toevoegen gebruiker $a';
$string['auth_dbname'] = 'Naam van de database zelf';
$string['auth_dbname_key'] = 'DB naam';
$string['auth_dbpass'] = 'Wachtwoord dat bij de bovengenoemde gebruikersnaam past';
$string['auth_dbpass_key'] = 'Wachtwoord';
$string['auth_dbpasstype'] = 'Geef hier aan welk format het wachtwoordveld gebruikt. MD5-encryptie is handig om een verbinding te maken naar andere veel voorkomende webapplicaties zoals PostNuke';
$string['auth_dbpasstype_key'] = 'Wachtwoordformaat';
$string['auth_dbreviveduser'] = 'Teruggehaalde gebruiker $a[0] id $a[1]';
$string['auth_dbrevivedusererror'] = 'Fout bij het terughalen van gebruiker $a';
$string['auth_dbsetupsql'] = 'SQL setupcommando';
$string['auth_dbsetupsqlhelp'] = 'SQL-commando voor speciale databank setup, dikwijls gebruikt voor het opzetten van communicatie encoding - bijvoorbeeld voor MySQL en PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'Uitgeschakelde gebruiker $a[0] id $a[1]';
$string['auth_dbsuspendusererror'] = 'Fout bij het uitschakelen van gebruiker $a';
$string['auth_dbsybasequoting'] = 'Gebruik sybase aanhalingstekens';
$string['auth_dbsybasequotinghelp'] = 'Escaping met enkele aanhalingstekens volgens Sybase stijl - nodig voor Oracle, MS SQL en sommige andere databanken. Niet gebruiken voor MYSQL!';
$string['auth_dbtable'] = 'Naam  van  de  tabel in de database';
$string['auth_dbtable_key'] = 'Tabel';
$string['auth_dbtitle'] = 'Externe databank';
$string['auth_dbtype'] = 'Het type database (Bekijk <a href=\"../lib/adodb/readme.htm#drivers\">ADOdb documentatie</a> voor meer informatie)';
$string['auth_dbtype_key'] = 'Databank';
$string['auth_dbupdatinguser'] = 'Gebruiker $a[0] id$a[1] aan het updaten';
$string['auth_dbuser'] = 'Gebruikersnaam met read access tot de database';
$string['auth_dbuser_key'] = 'DB gebruiker';
$string['auth_dbusernotexist'] = 'Gebruiker $a bestaat niet: kan niet updaten.';
$string['auth_dbuserstoadd'] = 'Toe te voegen gebruikers: $a';
$string['auth_dbuserstoremove'] = 'Te verwijderen gebruikers: $a';
