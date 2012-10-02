<?PHP // $Id$ 
      // install.php - created with Moodle 2.0 dev (Build: 20100129) (2010012902)


$string['admindirerror'] = 'Das angegebene Admin-Verzeichnis ist falsch.';
$string['admindirname'] = 'Name des Admin-Verzeichnisses';
$string['admindirsetting'] = 'Einige Webhosting-Anbieter benutzen das Verzeichnis /admin für den Zugang zu eigenen Einstellungen oder Werkzeugen. Leider kommt es in einem solchen Fall zu Konflikten mit dem standardmäßigen Verzeichnis \"admin\" von Moodle. Sie können dies ändern, indem Sie das Verzeichnis \"admin\" für Ihre Installation umbenennen. Den geänderten Namen müssen Sie hier angeben, z.B.: <br /> <br /><b>moodleadmin</b><br /> 
Damit ändern sich dann automatisch alle Admin-Links in Moodle.';
$string['admindirsettinghead'] = 'Admin-Verzeichnis wird konfiguriert ...';
$string['admindirsettingsub'] = 'Einige Webhosting-Anbieter benutzen das Verzeichnis /admin für den Zugang zu eigenen Einstellungen oder Werkzeugen. Leider kommt es in einem solchen Fall zu Konflikten mit dem standardmäßigen Verzeichnis \"admin\" von Moodle. Sie können dies ändern, indem Sie das Verzeichnis \"admin\" für Ihre Installation umbenennen. Den geänderten Namen müssen Sie hier angeben, z.B.: <br /> <br /><b>moodleadmin</b><br /> 
Damit ändern sich dann automatisch alle Admin-Links in Moodle.';
$string['availablelangs'] = 'Liste der verfügbaren Sprachen';
$string['caution'] = 'Warnung';
$string['chooselanguage'] = 'Sprache wählen';
$string['chooselanguagehead'] = 'Sprache wählen';
$string['chooselanguagesub'] = 'Wählen Sie eine Sprache, die Sie während der Installation verwenden wollen. Nach der Installation können Sie die Sprache für die Oberfläche und die Nutzer/innen festlegen.';
$string['cliadminpassword'] = 'Neues Admin-Kennwort';
$string['clialreadyinstalled'] = 'Die Datei config.php existiert bereits. Bitte benutzen Sie admin/cli/upgrade.php falls Sie Ihre Website aktualisieren möchten.';
$string['cliinstallfinished'] = 'Die Installation wurde erfolgreich abgeschlossen';
$string['cliinstallheader'] = 'Installation von Moodle $a über die Kommandozeile';
$string['climustagreelicense'] = 'Im nicht-interaktiven Modus müssen Sie der Lizenz über die Option --agree-license zustimmen';
$string['clitablesexist'] = 'Die Datenbank-Tabellen existieren bereits. Die cli Installation kann nicht fortgesetzt werden';
$string['compatibilitysettings'] = 'Prüfung Ihrer PHP-Einstellungen ...';
$string['compatibilitysettingshead'] = 'Prüfung Ihrer PHP-Einstellungen ...';
$string['compatibilitysettingssub'] = 'Alle Tests sollten fehlerfrei ablaufen, damit Moodle auf dem Server ohne Probleme arbeiten kann.';
$string['configfilenotwritten'] = 'Das Installationsskript kann die Datei config.php mit  den von Ihnen getroffenen Einstellungen nicht automatisch erstellen, weil mangelnde Schreibrechte für das Verzeichnis moodle dies verhindern. Sie können den folgenden Code manuell in einer Datei config.php speichern und diese dann ins Hauptverzeichnis Ihrer Moodle-Installation kopieren.';
$string['configfilewritten'] = 'Die Datei config.php wurde erfolgreich erstellt';
$string['configurationcomplete'] = 'Konfiguration ist abgeschlossen';
$string['configurationcompletehead'] = 'Konfiguration ist abgeschlossen';
$string['configurationcompletesub'] = 'Moodle speichert Ihre Konfigurationseinstellungen abschließend im Hauptverzeichnis Ihrer Moodle-Installation.';
$string['database'] = 'Datenbank';
$string['databasecreationsettings'] = 'Sie müssen die Datenbankeinstellungen für die Speicherung der Moodle-Daten konfigurieren. Die Datenbank wird automatisch vom Installationsprozess mit den unten festgelegten Einstellungen angelegt:
<br /> <br />
<b>Typ:</b> vom Installer festgelegt auf  \"mysql\"<br />
<b>Server:</b> vom Installer festgelegt auf  \"localhost\"<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> vom Installer festgelegt auf  \"root\"<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellennamen';
$string['databasecreationsettingshead'] = 'Sie müssen Einstellungen für die Datenbank konfigurieren, in der die meisten Moodle-Daten abgelegt werden. Der Installationsprozess erstellt die Datenbanktabellen automatisch auf der Grundlage der Einstellungen.';
$string['databasecreationsettingssub'] = '<b>Typ:</b> vom Installer festgelegt auf  \"mysql\" <br />
<b>Server:</b> vom Installer festgelegt auf  \"localhost\"<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> vom Installer festgelegt auf  \"root\"<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellennamen';
$string['databasecreationsettingssub2'] = '<b>Typ:</b> vom Installer festgelegt auf \"mysqli\"<br />
<b>Server:</b> vom Installer festgelegt auf  \"localhost\"<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> vom Installer festgelegt auf \"root\"<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellennamen';
$string['databasehead'] = 'Datenbank-Einstellungen';
$string['databasehost'] = 'Datenbank-Server';
$string['databasename'] = 'Datenbank-Name';
$string['databasepass'] = 'Datenbank-Kennwort';
$string['databasesettings'] = 'Sie müssen die Datenbankeinstellungen für die Speicherung der Moodle-Daten konfigurieren. Diese Datenbank muss bereits vorher angelegt sein und Sie müssen den Datenbank-Nutzer und das Kennwort kennen.
<br /><br />
<b>Typ:</b> mysql oder postgres7<br />
<b>Server:</b> z.B. localhost oder db.isp.com<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellennamen';
$string['databasesettingshead'] = 'Sie müssen nun die Einstellungen für die Datenbank konfigurieren, in der die meisten Moodle-Daten gespeichert werden. Diese Datenbank muss bereits angelegt sein. Außerdem muss ein Nutzer mit Anmeldenamen und Kennwort existieren, der auf die Datenbank zugreifen darf.';
$string['databasesettingssub'] = '<b>Typ:</b> mysql oder postgres7<br />
<b>Server:</b> z.B. localhost oder db.isp.com<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellennamen';
$string['databasesettingssub_mssql'] = '<b>Typ:</b> SQL*Server (ohne UTF-8)<b><strong class=\"errormsg\">Experimentell! (nicht für Produktivumgebungen)</strong></b><br /><br />
<b>Server:</b> z.B. localhost oder db.isp.com<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> Prefix für alle Tabellennamen (notwendig)';
$string['databasesettingssub_mssql_n'] = '<b>Typ:</b> SQL*Server (mit UTF-8)<br />
<b>Server:</b> z.B. localhost oder db.isp.com<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> Prefix für alle Tabellennamen (zwingend notwendig)';
$string['databasesettingssub_mysql'] = '<b>Typ:</b> MySQL<br />
<b>Server:</b> z.B. localhost oder db.isp.com<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellennamen';
$string['databasesettingssub_mysqli'] = '<b>Typ:</b> Improved MySQL<br />
<b>Server:</b> z.B. localhost oder db.domain.com<br />
<b>Datenbank:</b> Datenbank-Name, z.B moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellennamen';
$string['databasesettingssub_oci8po'] = '<b>Typ:</b> Oracle<br />
<b>Server:</b> unbenutzt - muss leer bleiben!<br />
<b>Datenbank:</b> vorgegebener Name für die Verbindung zu tnsnames.ora<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> Prefix für alle Tabellen (zwingend notwendig, 2cc. max)';
$string['databasesettingssub_odbc_mssql'] = '<b>Typ:</b> SQL*Server (over ODBC) <b><font color=\"red\">Experimentell! (nicht für den produktiven Einsatz)</font></b><br />
<b>Server:</b> vorgegebener DSN-Name im ODBC-Kontrolldialog<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> Prefix für alle Tabellen (zwingend notwendig)';
$string['databasesettingssub_postgres7'] = '<b>Typ:</b> PostgreSQL<br />
<b>Server:</b> z.B. localhost oder db.isp.com<br />
<b>Datenbank:</b> Datenbankname, z.B. moodle<br />
<b>Nutzer:</b> Ihr Anmeldename für die Datenbank<br />
<b>Kennwort:</b> Ihr Kennwort für die Datenbank<br />
<b>Tabellen-Prefix:</b> Prefix für alle Tabellen (zwingend notwendig)';
$string['databasesettingswillbecreated'] = '<b>Hinweis: </b> Das Installationsprogramm wird versuchen, automatisch eine Datenbank anzulegen, sofern diese noch nicht existiert.';
$string['databasesocket'] = 'Unix Socket';
$string['databasetypehead'] = 'Datenbank-Treiber wählen';
$string['databasetypesub'] = 'Moodle unterstützt mehrere Typen von Datenbank-Servern. Bitte fragen Sie Ihren Server-Administrator, welchen Typ Sie benutzen sollen.';
$string['databaseuser'] = 'Datenbank-Nutzer';
$string['dataroot'] = 'Daten-Verzeichnis';
$string['datarooterror'] = 'Das angegebene Datenverzeichnis ist nicht vorhanden und kann auch nicht angelegt werden. Korrigieren Sie die Pfad-Angabe oder legen Sie das Verzeichnis manuell an.';
$string['datarootpublicerror'] = 'Das von Ihnen angegebene Verzeichnis dataroot ist direkt aus dem Internet zugänglich. Sie müssen das Verzeichnis ändern!';
$string['dbconnectionerror'] = 'Eine Verbindung zur angegebenen Datenbank konnte nicht hergestellt werden. Bitte überprüfen Sie Ihre Eingaben.';
$string['dbcreationerror'] = 'Fehler beim Anlegen der Datenbank. Die Datenbank konnte mit diesen Einstellungen nicht erstellt werden.';
$string['dbhost'] = 'Server';
$string['dbpass'] = 'Kennwort';
$string['dbprefix'] = 'Tabellen-Prefix';
$string['dbtype'] = 'Typ';
$string['dbwrongencoding'] = 'Die ausgewählte Datenbank läuft mit einem nicht empfohlenen Zeichensatz ($a). Sie sollten stattdessen besser eine Unicode (utf-8) basierte Datenbank verwenden. Zwar haben Sie die Möglichkeit diese Abfrage zu überspringen, aber vermutlch wird es deswegen dann später bei der Nutzung zu Problemen kommen.';
$string['dbwronghostserver'] = 'Sie müssen den oben genannten \"Server\"-Regeln folgen.';
$string['dbwrongnlslang'] = 'Die Umgebungsvariable NLS_LANG Ihres Webservers muss den Zeichensatz AL32UTF8 benutzen. Lesen Sie in der PHP-Dokumentation nach, wie Sie OCI8 richtig einstellen.';
$string['dbwrongprefix'] = 'Sie müssen den oben genannten \"Tabellen-Prefix\"- Regeln folgen.';
$string['directorysettings'] = '<p>Bitte überprüfen Sie das Verzeichnis für diese Moodle-Installation.</p>

<p><b>URL-Adresse:</b>
Geben Sie hier die vollständige URL für Ihre Moodle-Instanz an. Sollte Ihre Website über mehrere Adressen erreichbar sein, geben Sie die Adresse an, die am häufigsten genutzt wird. Bitte geben Sie am Ende kein Slash ein.</p>

<p><b>Moodle-Verzeichnis:</b>
Geben Sie den absoluten Pfad für Ihre Moodle-Installation an. Bitte prüfen Sie, ob die Groß- und Kleinschreibung korrekt ist.</p>

<p><b>Datenverzeichnis:</b>
Moodle benötigt ein Verzeichnis, in dem hochgeladene Dateien gespeichert werden. Dieses Verzeichnis muss Lese- und Schreibrechte für das Nutzerkonto besitzen, mit dem Ihr Webservers läuft (üblicherweise \'nobody\', \'apache\' oder \'www\'). Außerdem sollte das Verzeichnis nicht direkt aus dem Internet erreichbar sein. Das Intallationsskript wird versuchen, ein solches Verzeichnis zu erstellen, falls es nicht existiert.</p>';
$string['directorysettingshead'] = 'Bestätigen Sie bitte die Einträge für Ihre Moodle-Installation';
$string['directorysettingssub'] = '<p><b>URL-Adresse:</b>
Geben Sie hier die vollständige URL für Ihre Moodle-Instanz an. Sollte Ihre Website über mehrere Adressen erreichbar sein, geben Sie die Adresse an, die am häufigsten genutzt wird. Bitte geben Sie am Ende kein Slash ein.</p>

<p><b>Moodle-Verzeichnis:</b>
Geben Sie den absoluten Pfad für Ihre Moodle-Installation an. Bitte prüfen Sie, ob die Groß- und Kleinschreibung korrekt ist.</p>

<p><b>Datenverzeichnis:</b>
Moodle benötigt ein Verzeichnis, indem hochgeladene Dateien abgelegt werden. Dieses Verzeichnis muss Lese- und Schreibrechte für das Nutzerkonto besitzen, mit dem Ihr Webservers läuft (üblicherweise \'nobody\', \'apache\' oder \'www\'). Außerdem sollte das Verzeichnis nicht direkt aus dem Internet erreichbar sein. Das Intallationsskript wird versuchen, ein solches Verzeichnis zu erstellen.</p>';
$string['dirroot'] = 'Moodle-Verzeichnis';
$string['dirrooterror'] = 'Die Einstellungen für das Moodle-Verzeichnis sind nicht korrekt.  Es wurde an dieser Stelle keine Moodle-Installation gefunden. Der nachfolgende Wert wurden zurückgesetzt.';
$string['download'] = 'Herunterladen';
$string['downloadlanguagebutton'] = 'Download des Sprachpakets: $a';
$string['downloadlanguagehead'] = 'Sprachpaket herunterladen';
$string['downloadlanguagenotneeded'] = 'Der Installationsprozess wird mit dem Sprachpaket \"$a\" fortgesetzt.';
$string['downloadlanguagesub'] = 'Sie haben nun die Möglichkeit, ein Sprachpaket herunterzuladen und den Installationsprozess in dieser Sprache fortzusetzen. <br /><br /> Falls Sie keinen Download durchführen können, wird die Installation in englischer Sprache fortgeführt. (Sobald die Moodle-Installation abgeschlossen ist, haben Sie jederzeit die Gelegenheit, weitere Sprachpakete herunterzuladen und zu installieren.)';
$string['doyouagree'] = 'Stimmen Sie zu ? (ja/nein)';
$string['environmenthead'] = 'Installationsvoraussetzungen werden geprüft ...';
$string['environmentsub'] = 'Es wird geprüft, ob die alle Komponenten Ihres Systems die Installationsanforderungen erfüllen.';
$string['environmentsub2'] = 'Jede Moodle-Version hat Mindestvoraussetzungen für der PHP-Version und für einige verbindliche PHP-Extensions. Vor einer Installation oder einer Aktualisierung wird immer eine vollständige Prüfung der Serverausstattung durchgeführt. Bitte fragen Sie den Administrator Ihres Servers, wenn Sie mit der Installation einer neuen Version oder mit der Aktivierung von PHP-Extensions nicht weiterkommen.';
$string['errorsinenvironment'] = 'Fehler bei der Prüfung der Systemvoraussetzungen!';
$string['fail'] = 'Fehlgeschlagen';
$string['fileuploads'] = 'Dateien hochladen';
$string['fileuploadserror'] = 'Dies sollte eingeschaltet sein';
$string['fileuploadshelp'] = '<p>Das Hochladen von Dateien scheint auf diesem Server deaktiviert zu sein.</p> <p>Moodle kann installiert werden. Es ist aber nicht möglich, Dateien für Kurse oder Bilder in den Profilen hochzuladen.</p> <p>Um das Hochladen von Dateien zu ermöglichen, müssen Sie oder der Administrator Ihres Servers die Datei php.ini anpassen und die Einstellung für <b>file_uploads</b> auf \'1\' ändern .</p>';
$string['gdversion'] = 'GD-Version';
$string['gdversionerror'] = 'Die GD-Bibliothek sollte verfügbar sein, um Bilder zu erzeugen und anzuzeigen.';
$string['gdversionhelp'] = '<p>Auf Ihrem Server ist vermutlich GD nicht installiert. </p>
<p>GD ist eine Bibliothek, die von PHP benötigt wird. Damit kann Moodle Bilder verarbeiten (z.B. die Nutzer-Bilder verkleinern) oder neue Bilder erzeugen (z.B. die grafische Darstellung der Log-Daten generieren). Moodle arbeitet auch ohne GD, aber die genannten Funktionen stehen Ihnen dann nicht zur Verfügung.</p>
<p> Wenn Sie GD unter UNIX zu PHP hinzufügen wollen, kompilieren Sie PHP unter Verwendung des Parameters  --with-gd neu.</p>
<p>Unter Windows können Sie die Datei php.ini bearbeiten und das Kommentarzeichen für die Zeile php_gd2.dll entfernen.</p>';
$string['globalsquotes'] = 'Unsichere Parametereinstellung für globals';
$string['globalsquoteserror'] = 'Prüfen Sie die PHP-Einstellungen: deaktivieren Sie register_globals und/oder aktivieren Sie magic_quotes_gpc';
$string['globalsquoteshelp'] = '<p>Die gleichzeitige Deaktivierung von magic_quotes_gpc und Aktivierung von register_globals ist nicht empfehlenswert.</p>

<p>Die empfohlene Einstellung in der Datei php.ini ist <b>magic_quotes_gpc = On</b> und <b>register_globals = Off</b> </p>

<p>Falls Sie keinen Zugriff auf die Datei php.ini haben, können Sie auch versuchen, die folgenden Zeilen in die Datei .htaccess im Verzeichnis moodle einfügen:
<blockquote><div>php_value magic_quotes_gpc On</div></blockquote>
<blockquote><div>php_value register_globals Off</div></blockquote>
</p>';
$string['inputdatadirectory'] = 'Daten-Verzeichnis';
$string['inputwebadress'] = 'Web-Adresse';
$string['inputwebdirectory'] = 'Moodle-Verzeichnis';
$string['installation'] = 'Installation';
$string['langdownloaderror'] = 'Leider konnte das Sprachpaket \"$a\" nicht heruntergeladen werden. Die Installation wird in englischer Sprache fortgesetzt.';
$string['langdownloadok'] = 'Die Installation des Sprachpakets \"$a\" war erfolgreich. Der weitere Installationsprozess erfolgt nun in dieser Sprache.';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Dies sollte ausgeschaltet sein (\'off\')';
$string['magicquotesruntimehelp'] = '<p>Magic Quotes Runtime sollte ausgeschaltet (\'off\') sein, damit Moodle richtig funktioniert.  </p>
<p>Normalerweise ist dies der Fall ... prüfen Sie bitte die Einstellung <b>magic_quotes_runtime</b> in der Datei php.ini. </p>
<p>Falls Sie keinen Zugriff auf die Datei php.ini haben, können Sie auch versuchen, die folgende Zeile in die Datei .htaccess im Verzeichnis moodle einfügen:
<blockquote><div>php_value magic_quotes_runtime Off</div></blockquote></p>';
$string['memorylimit'] = 'Memory Limit';
$string['memorylimiterror'] = 'Die PHP-Speichereinstellung memory_limit ist ziemlich niedrig .... dies könnte später zu Problemen führen.';
$string['memorylimithelp'] = '<p>Die PHP-Einstellung memory_limit für Ihren Server ist zur Zeit auf $a eingestellt. </p>
<p>Wenn Sie Moodle mit vielen Aktivitäten oder vielen Nutzer/innen verwenden, wird dies vermutlich zu Problemen führen.</p>
<p>Wir empfehlen die Einstellung wenn möglich zu erhöhen, z.B. auf 40M oder mehr. Dies können Sie auf verschiedene Arten machen:</p>
<ol>
<li>Wenn Sie PHP neu kompilieren können, nehmen Sie die Einstellung <i>--enable-memory-limit</i>. Dann kann Moodle die Einstellung selber vornehmen.
<li>Wenn Sie Zugriff auf die Datei php.ini haben, können Sie die Einstellung <b>memory_limit</b> selber auf einen Wert von 40M setzen. Wenn Sie selber keinen Zugriff haben, fragen Sie den Server-Admin, dies für Sie zu tun.
<li>Auf einigen PHP-Servern können Sie eine .htaccess-Datei im Moodle-Verzeichnis einrichten. Tragen Sie darin die folgende Zeile ein: <p><blockquote><div>php_value memory_limit 40M</div></blockquote></p>
<p>Achtung: auf einigen Servern hindert diese Einstellung <b>alle</b> PHP-Seiten und Sie erhalten Fehlermeldungen. Entfernen Sie dann den Eintrag in der .htaccess-Datei wieder.</p></li>
</ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssql_n'] = 'SQL*Server mit UTF-8-Unterstützung (mssql_n)';
$string['mssqlextensionisnotpresentinphp'] = 'PHP wurde nicht richtig konfiguriert, um über die PHP-Erweiterung MSSQL-Erweiterung mit SQL*Server zu kommunizieren. Bitte prüfen Sie die Datei php.ini oder kompilieren Sie PHP neu.';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'PHP wurde nicht richtig konfiguriert, um über die PHP-Erweiterung MySQL mit MySQL zu kommunizieren. Bitte prüfen Sie die Datei php.ini oder kompilieren Sie PHP neu.';
$string['mysqli'] = 'Improved MySQL (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'PHP wurde nicht richtig konfiguriert, um über die PHP-Erweiterung MySQLi mit MySQL zu kommunizieren. Bitte überprüfen Sie die Datei php.ini oder übersetzen Sie PHP neu. Die MySQLi-Erweiterung ist nicht für PHP4 verfügbar.';
$string['nativemysqli'] = 'Verbessertes MySQL (native/mysqli)';
$string['nativemysqlihelp'] = 'Sie müssen die Datenbankeinstellungen für die Speicherung der Moodle-Daten konfigurieren. Die Datenbank wird angelegt, wenn der angegebene Datenbank-Nutzer die dafür nötigen Rechte besitzt. Ein Nutzername und das zugehörige Kennwort für den Datenbank-Zugriff müssen bereits existieren. Das Tabellen-Prefix ist optional.';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = 'Sie müssen die Datenbankeinstellungen für die Speicherung der Moodle-Daten konfigurieren. Die Datenbank muss bereits angelegt sein. Ein Nutzername und das zugehörige Kennwort  für den Datenbank-Zugriff müssen bereits existieren. Das Tabellen-Prefix ist verbindlich.';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHP wurde nicht richtig konfiguriert, um über die PHP-Erweiterung OCI8 mit Oracle zu kommunizieren. Bitte prüfen Sie die Datei php.ini oder kompilieren Sie PHP neu.';
$string['odbc_mssql'] = 'SQL*Server über ODBC (odbc_mssql)';
$string['odbcextensionisnotpresentinphp'] = 'PHP wurde nicht richtig konfiguriert, um über die PHP-Erweiterung ODBC mit dem SQL*Server zu kommunizieren. Bitte prüfen Sie die Datei php.ini oder kompilieren Sie PHP neu.';
$string['pass'] = 'Durchgang';
$string['paths'] = 'Pfade';
$string['pathserrcreatedataroot'] = 'Das Datenverzeichnis ($a->dataroot) kann vom Installer nicht angelegt werden.';
$string['pathshead'] = 'Pfade bestätigen';
$string['pathsrodataroot'] = 'Das Verzeichnis dataroot ist schreibgeschützt.';
$string['pathsroparentdataroot'] = 'Das Verzeichnis ($a->parent) ist schreibgeschützt. Deswegen kann das Datenverzeichnis ($a->dataroot)  vom Installer nicht angelegt werden.';
$string['pathssubadmindir'] = 'Einige Webserver benutzen /admin als speziellen Link, um auf Einstellungsseiten oder Ähnliches zu verweisen. Unglücklicherweise kollidiert dies mit dem standardmäßigen Verzeichnis für die Moodle-Administration. Sie können dieses Problem beheben, indem Sie das Verzeichnis admin in Ihrer Moodle-Installation umbenennen und den neuen Namen hier eingeben (z.B. <em>moodleadmin</em>). Mit dieser Änderung werden alle Admin-Links korrigiert.';
$string['pathssubdataroot'] = 'Sie benötigen einen Platz, wo Moodle hochgeladene Dateien abspeichern kann. Dieses Verzeichnis muss Lese- und Schreibrechte für das Nutzerkonto besitzen, mit dem Ihr Webservers läuft (üblicherweise \'nobody\', \'apache\' oder \'www\'). Außerdem sollte das Verzeichnis nicht direkt aus dem Internet erreichbar sein. Das Intallationsskript wird versuchen, ein solches Verzeichnis zu erstellen, falls es nicht existiert.</p>';
$string['pathssubdirroot'] = 'Vollständiger Pfad der Moodle-Installation. Bitte ändern Sie diese Einstellung nur bei der Bunutzung symbolischer Links.';
$string['pathssubwwwroot'] = 'Vollständige Internetadresse für den Zugriff auf Moodle. Es ist nicht möglich, über mehrere unterschiedliche Adressen auf Moodle zuzugreifen. Sollten Sie für Ihre Website mehrere öffentliche Adressen verwenden, so müssen Sie eine Adresse auswählen und für die übrigen Adressen dauerhafte Weiterleitungen einrichten. Falls Ihre Website gleichzeitig aus einem Intranet und aus dem Internet erreichbar ist, so tragen Sie hier die öffentliche Adresse ein. Sorgen Sie in diesem Fall dafür, dass über einen DNS-Eintrag für alle Intranet-Nutzer ebenfalls die öffentliche Adresse erreichbar ist.';
$string['pathsunsecuredataroot'] = 'Der Speicherort des Verzeichnisses \'dataroot\' ist unsicher';
$string['pathswrongadmindir'] = 'Das Verzeichnis \'admin\' existiert nicht';
$string['pathswrongdirroot'] = 'Falscher Pfad zum Verzeichnis \'dirroot\'';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP wurde nicht richtig konfiguriert, um über die PHP-Erweiterung PGSQL mit PostgreSQL zu kommunizieren. Bitte prüfen Sie die Datei php.ini oder kompilieren Sie PHP neu.';
$string['phpextension'] = 'PHP-Extension $a';
$string['phpversion'] = 'PHP-Version';
$string['phpversionhelp'] = '<p>Moodle erwartet als PHP-Version mindestens 4.3.0/4.4.0 oder 5.1.0 (5.0.x weist eine Reihe bekannter Fehler auf).</p>
<p>Sie nutzen momentan die Version $a.</p>
<p>Sie müssen Ihre PHP-Verson aktualisieren oder auf einen Rechner wechseln, der eine neuere Version von PHP nutzt.<br />
(Im Falle von 5.0.x könnten Sie auch zu einer Version 4.3.x/4.4.x downgraden)</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['releasenoteslink'] = 'Um Informationen über diese Moodle-Version zu erhalten, lesen Sie bitte in die Versionshinweise auf $a';
$string['safemode'] = 'Safe Mode';
$string['safemodeerror'] = 'Die Nutzung von Moodle im Safe Mode kann zu Schwierigkeiten führen.';
$string['safemodehelp'] = '<p>Moodle kann beim Betrieb im Safe Mode verschiedene Probleme haben, letztendlich könnte es unmöglich sein, neue Dateien zu erzeugen. </p>
<p>Safe Mode ist normalerweise nur auf einigen paranoiden öffentlichen Webservern aktiviert. Suchen Sie sich einen Anbieter, der auf diese Einstellung verzichtet oder bitten Sie Ihren Dienstleister, dass Sie auf einen Server \'umziehen\' können, der diese Einstellung nicht verwendet.</p>
<p>Sie können versuchen, die Installation fortzusetzen, müssen dann aber später mit Problemen rechnen. </p>';
$string['sessionautostart'] = 'Session Auto Start';
$string['sessionautostarterror'] = 'Diese Option sollte ausgeschaltet sein';
$string['sessionautostarthelp'] = '<p>Moodle benötigt den Session Support und kann ohne diese Einstellung nicht arbeiten.</p>
<p>Sessions sind durch Einstellungen in der Datei php.ini möglich. Bitte suchen Sie nach der Einstellung für session.auto_start </p>';
$string['skipdbencodingtest'] = 'Prüfung der Datenbank-Verschlüsselung überspringen';
$string['sqliteextensionisnotpresentinphp'] = 'PHP ist für die PHP-Erweiterung SQLite nicht richtig konfiguriert. Bitte prüfen Sie Ihre Datei php.ini oder übersetzen Sie PHP neu.';
$string['upgradingqtypeplugin'] = 'Plugin für Frage/Typ aktualisieren';
$string['welcomep10'] = '$a->installername ($a->installerversion)';
$string['welcomep20'] = 'Sie haben das Paket <strong>$a->packname $a->packversion</strong> erfolgreich auf Ihrem Computer installiert.';
$string['welcomep30'] = 'Diese Version von <strong>$a->installername</strong> enthält folgende Anwendungen, mit denen Sie <strong>Moodle</strong> ausführen können:';
$string['welcomep40'] = 'Das Paket enthält: <strong>Moodle $a->moodlerelease ($a->moodleversion)</strong>.';
$string['welcomep50'] = 'Die Nutzung dieser Anwendungen ist lizenzrechtlich geprüft. Alle Anwendungen von <strong>$a->installername</strong> sind
<a href=\"http://www.opensource.org/docs/definition_plain.html\"> Open Source </a> und unterliegen der <a href=\"http://www.gnu.org/copyleft/gpl.html\"> GPL</a> Lizenz.';
$string['welcomep60'] = 'Die folgenden Seiten führen Sie in einfachen Schritten durch die Konfiguration und Installation von <strong>Moodle</strong> auf Ihrem Computer. Sie können die vorgeschlagenen Einstellungen übernehmen oder an Ihre Bedürfnisse anpassen.';
$string['welcomep70'] = 'Klicken Sie auf den \"Weiter\"-Button, um mit dem Setup von <string>Moodle</string> fortzufahren.';
$string['wwwroot'] = 'Web-Adresse';
$string['wwwrooterror'] = 'Diese Web-Adresse scheint nicht gültig zu sein. Moodle ist nicht unter dieser Adresse installiert.';
$string['phpversionerror'] = 'PHP muss mindestens in der Version 4.3.0 oder 5.1.0 installiert sein (5.0.x weist eine Reihe bekannter Fehler auf).'; // ORPHANED
$string['postgresqlwarning'] = '<strong>Hinweis:</strong> Falls Sie Verbindungsprobleme bemerken, könnten Sie versuchen im Feld \'Host\' folgende Einträge zu setzen: \"host=\'postgresql_host\' port=\'5432\' dbname=\'postgresql_database_name\' user=\'postgresql_user\' password=\'postgresql_user_password\'\". Die Felder Name der Datenbank, Nutzer und Kennwort bleiben leer. Weitere Informationen finden Sie in den <a href=\"http://docs.moodle.org/en/Installing_Postgres_for_PHP\">Moodle Docs</a>'; // ORPHANED
$string['aborting'] = 'Installation abbrechen'; // ORPHANED
$string['adminemail'] = 'E-Mail :'; // ORPHANED
$string['adminfirstname'] = 'Vorname :'; // ORPHANED
$string['admininfo'] = 'Administratordetails'; // ORPHANED
$string['adminlastname'] = 'Nachname :'; // ORPHANED
$string['adminpassword'] = 'Passwort :'; // ORPHANED
$string['adminusername'] = 'Anmeldename :'; // ORPHANED
$string['askcontinue'] = 'Fortsetzen (ja/nein) :'; // ORPHANED
$string['availabledbtypes'] = 'Verfügbare Datenbank-Typen'; // ORPHANED
$string['cannotconnecttodb'] = 'Verbindung zur Datenbank gescheitert'; // ORPHANED
$string['checkingphpsettings'] = 'PHP-Einstellungen prüfen'; // ORPHANED
$string['configfilecreated'] = 'Konfiguartionsdatei wurde erfolgreich erstellt'; // ORPHANED
$string['configfiledoesnotexist'] = 'Keine Konfiguarationsdatei gefunden!!!'; // ORPHANED
$string['configurationfileexist'] = 'Konfiguarationsdatei existiert bereits!'; // ORPHANED
$string['creatingconfigfile'] = 'Konfiguarationsdatei wird erstellt ...'; // ORPHANED
$string['databasesettingsformoodle'] = 'Datenbank-Einstellungen für Moodle'; // ORPHANED
$string['databasetype'] = 'Datenbank-Typ :'; // ORPHANED
$string['disagreelicense'] = 'Das Upgrade wird nicht ohne Zustimmung zur GPL durchgeführt!'; // ORPHANED
$string['downloadlanguagepack'] = 'Möchten Sie jetzt das Sprachpaket herunterladen (ja/nein) :'; // ORPHANED
$string['downloadsuccess'] = 'Sprachpaket erfolgreich heruntergeladen'; // ORPHANED
$string['installationiscomplete'] = 'Die Installation ist abgeschlossen!'; // ORPHANED
$string['invalidargumenthelp'] = 'Fehler: Ungültige Argumente
Benutzung: \$ php cliupgrade.php OPTIONS
Geben Sie --help ein, um weitere Hilfe zu bekommen'; // ORPHANED
$string['invalidemail'] = 'Ungültige E-Mail'; // ORPHANED
$string['invalidhost'] = 'Ungültiger Server'; // ORPHANED
$string['invalidint'] = 'Fehler: Wert ist keine Zahl'; // ORPHANED
$string['invalidintrange'] = 'Fehler: Wert ist außerhalb des Bereichs'; // ORPHANED
$string['invalidpath'] = 'Ungültiger Pfad'; // ORPHANED
$string['invalidsetelement'] = 'Fehler: Wert ist nicht in den vorgegebenen Optionen enthalten'; // ORPHANED
$string['invalidtextvalue'] = 'Ungültiger Text'; // ORPHANED
$string['invalidurl'] = 'Ungültige URL'; // ORPHANED
$string['invalidvalueforlanguage'] = 'Ungültiger Wert für die Option --lang. Geben Sie --help ein, um mehr Hilfe zu bekommen'; // ORPHANED
$string['invalidyesno'] = 'Fehler: Wert ist kein gültiges Ja/Nein-Argument'; // ORPHANED
$string['locationanddirectories'] = 'Speicherort und -verzeichnisse'; // ORPHANED
$string['pdosqlite3'] = 'SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimentell! (nicht nutzbar in produktiven Umgebungen)</strong></b>'; // ORPHANED
$string['php52versionerror'] = 'PHP-Version muss mindestens 5.2.4 sein.'; // ORPHANED
$string['php52versionhelp'] = '<p>Moodle benötigt mindestens PHP Version 5.2.4</p>
<p>Sie nutzen zur Zeit Version $a.</p>
<p>Ihre PHP-Version muss aktualisiert oder ein anderer Host genutzt werden.</p>'; // ORPHANED
$string['selectlanguage'] = 'Sprache für die Installation auswählen'; // ORPHANED
$string['sitefullname'] = 'Name der gesamten Website :'; // ORPHANED
$string['siteinfo'] = 'Details der Website'; // ORPHANED
$string['sitenewsitems'] = 'Anzahl neuer Nachrichten :'; // ORPHANED
$string['siteshortname'] = 'Kurzname der Website :'; // ORPHANED
$string['sitesummary'] = 'Beschreibung der Website :'; // ORPHANED
$string['tableprefix'] = 'Tabellen-Prefix :'; // ORPHANED
$string['upgradingactivitymodule'] = 'Aktivitäten-Module aktualisieren'; // ORPHANED
$string['upgradingbackupdb'] = 'Datenbanktabelle zum Backup aktualisieren'; // ORPHANED
$string['upgradingblocksdb'] = 'Datenbanktabelle für Blöcke aktualisieren'; // ORPHANED
$string['upgradingblocksplugin'] = 'Plugin für Blöcke aktualisieren'; // ORPHANED
$string['upgradingcompleted'] = 'Aktualisierung abgeschlossen ...'; // ORPHANED
$string['upgradingcourseformatplugin'] = 'Plugin für das Kursformat aktualisieren'; // ORPHANED
$string['upgradingenrolplugin'] = 'Plugin zur Einschreibung aktualisieren'; // ORPHANED
$string['upgradinggradeexportplugin'] = 'Plugin zum Bewertungsexport aktualisieren'; // ORPHANED
$string['upgradinggradeimportplugin'] = 'Plugin zum Bewertungsimport aktualisieren'; // ORPHANED
$string['upgradinggradereportplugin'] = 'Plugin zum Bewertungsbericht aktualisieren'; // ORPHANED
$string['upgradinglocaldb'] = 'Lokale Datenbank aktualisieren'; // ORPHANED
$string['upgradingmessageoutputpluggin'] = 'Plugin zur Mitteilungsausgabe aktualisieren'; // ORPHANED
$string['upgradingrpcfunctions'] = 'RPC-Funktionen aktualisieren'; // ORPHANED
$string['usagehelp'] = 'Übersicht:
\$php cliupgrade.php --Parameter

Parameter:
--lang : Spracheinstellung für die Installation (Standard Englisch (en))
--webaddr : Web-Adresse der Moodle-Site
--moodledir : Pfad zum Moodle-Verzeichnis
--datadir : Pfad zum Daten-Verzeichnis (sollte vor direktem Zugriff geschützt sein!!)
--dbtype : Datenbank-Typ (Standard mysql)
--dbhost : Datenbank-Server (Standard localhost)
--dbname : Datenbank-Name (Standard moodle)
--dbuser : Datenbank-Nutzer
--dbpass : Datenbank-Passwort
--prefix : Tabellen-Prefix für alle Datenbank-Tabellen. (Standard mdl_)
--verbose : 0 keine Ausgabe, 1 Zusammenfassung (Standard), 2 Ausgabe aller Details
--interactivelevel : 0 nicht interaktiv, 1 semi-interaktiv (Standard), 2 interaktiv
--agreelicense : Yes (Standard) oder No
--confirmrelease : Yes (Standard) oder No
--sitefullname : Name der Website. (Standard \"Moodle Site\" - bitte ändern!!)
--siteshortname : Kurzname der Website (Standard moodle)
--sitesummary : Bescheibung der Website
--adminfirstname : Vorname des Adminstrators (Standard Admin)
--adminlastname : Nachname des Adminstrators (Standard User)
--adminusername : Anmeldename des Adminstrators (Standard admin)
--adminpassword : Passwort für den Adminstrator (Standard admin)
--adminemail : E-Mail-Adresse des Adminstrators (Standard root@localhost)
--help : Hilfe anzeigen

Nutzungsbeispiel:
\$php cliupgrade.php --lang=en --webaddr=http://www.example.com --moodledir=/var/www/html/moodle --datadir=/var/moodledata --dbtype=mysql --dbhost=localhost --dbname=moodle --dbuser=root --prefix=mdl --agreelicense=yes --confirmrelease=yes --sitefullname=\"Example Moodle Site\" --siteshortname=moodle --sitesummary=siteforme --adminfirstname=Admin --adminlastname=User --adminusername=admin --adminpassword=admin --adminemail=admin@example.com --verbose=1 --interactivelevel=2'; // ORPHANED
$string['versionerror'] = 'Fehler: Nutzerabbruch bei der Versionsabfrage'; // ORPHANED
$string['welcometext'] = '--- Moodle-Installation über die Komandozeile ---'; // ORPHANED
$string['writetoconfigfilefaild'] = 'Fehler beim Schreiben der Konfigurationsdatei'; // ORPHANED
$string['yourchoice'] = 'Ihre Wahl :'; // ORPHANED
$string['databasesettingssub_sqlite3_pdo'] = '<b>Typ:</b> SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimentell! (nicht für produktive Server benutzen!!)</strong></b><br />
<b>Host:</b> Pfad zum Verzeichnis, in dem die Datenbankdatei gespeichert werden soll (vollständiger Pfad); mit localhost oder einem leeren Feld wird dasdas Moodle Datenverzeichnis verwendet<br />
<b>Name:</b> Datenbankname, z.B. moodle (optional)<br />
<b>Nutzer:</b> Ihr Benutzername für die Datenbank (optional)<br />
<b>Passwort:</b> Ihr Passwort für die Datenbank (optional)<br />
<b>Tabellen-Prefix:</b> optionaler Prefix für alle Tabellen<br />
Der Name der Datenbankdatei wird über den Nutzernamen erkannt, der Datenbankname und das Passwort sind oben angegeben.'; // ORPHANED
$string['sqlite3_pdo'] = 'SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimentell! (nicht für produktive Server benutzen!!)</strong></b>'; // ORPHANED

?>
