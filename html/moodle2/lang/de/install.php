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
 * Strings for component 'install', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'Das angegebene Admin-Verzeichnis ist falsch.';
$string['admindirname'] = 'Admin-Verzeichnis';
$string['admindirsetting'] = 'Einige Webhosts benutzen das Verzeichnis /admin als Zugang zu Einstellungen oder Werkzeugen. Leider kommt es in solchen Fällen zu Konflikten mit dem standardmäßigen Moodle-Verzeichnis "admin". <br /><br />Sie können das Moodle-Verzeichnis "admin" in Ihrer Installation umbenennen und den geänderten Namen (z.B. "moodleadmin") hier angeben, um alle Links zur Moodle-Administration automatisch anzupassen.';
$string['admindirsettinghead'] = 'Admin-Verzeichnis wird konfiguriert ...';
$string['admindirsettingsub'] = 'Einige Webhosts benutzen das Verzeichnis /admin als Zugang zu Einstellungen oder Werkzeugen. Leider kommt es in solchen Fällen zu Konflikten mit dem standardmäßigen Moodle-Verzeichnis "admin". <br /><br />Sie können das Moodle-Verzeichnis "admin" in Ihrer Installation umbenennen und den geänderten Namen (z.B. "moodleadmin") hier angeben, um alle Links zur Moodle-Administration automatisch anzupassen.';
$string['availablelangs'] = 'Verfügbare Sprachpakete';
$string['caution'] = 'Warnung';
$string['chooselanguage'] = 'Sprache wählen';
$string['chooselanguagehead'] = 'Sprache wählen';
$string['chooselanguagesub'] = 'Wählen Sie eine Sprache, die Sie während der Installation verwenden wollen. Die ausgewählte Sprache wird nach der Installation als Standardsprache der Instanz benutzt, aber Sie dürfen die Sprache jederzeit ändern.';
$string['cliadminpassword'] = 'Neues Admin-Kennwort';
$string['cliadminusername'] = 'Admin-Nutzername ';
$string['clialreadyconfigured'] = 'Die Datei config.php existiert bereits. Bitte benutzen Sie admin/cli/install_database.php, wenn Sie diese Site installieren möchten.';
$string['clialreadyinstalled'] = 'Die Datei config.php existiert bereits. Bitte benutzen Sie admin/cli/install_database.php, wenn Sie diese Site aktualisieren möchten.';
$string['cliinstallfinished'] = 'Die Installation wurde erfolgreich abgeschlossen';
$string['cliinstallheader'] = 'Installation von Moodle {$a} über die Kommandozeile';
$string['climustagreelicense'] = 'Im nicht-interaktiven Modus müssen Sie der Lizenz über die Option --agree-license zustimmen';
$string['clitablesexist'] = 'Die Datenbank-Tabellen existieren bereits. Die cli Installation kann nicht fortgesetzt werden.';
$string['compatibilitysettings'] = 'PHP-Einstellungen werden geprüft...';
$string['compatibilitysettingshead'] = 'PHP-Einstellungen werden geprüft...';
$string['compatibilitysettingssub'] = 'Alle Tests sollten fehlerfrei ablaufen, damit Moodle ohne Probleme auf dem Server arbeiten kann.';
$string['configfilenotwritten'] = 'Das Installationsskript kann die Datei config.php mit den vorgenommenen Einstellungen nicht automatisch erstellen, weil Schreibrechte für das Verzeichnis \'moodle\' fehlen. Sie können den folgenden Code manuell in einer Datei config.php speichern und ins Verzeichnis \'moodle\' kopieren.';
$string['configfilewritten'] = 'Die Datei config.php wurde erfolgreich erstellt';
$string['configurationcomplete'] = 'Konfiguration ist abgeschlossen';
$string['configurationcompletehead'] = 'Konfiguration ist abgeschlossen';
$string['configurationcompletesub'] = 'Moodle speichert alle Konfigurationseinstellungen im Verzeichnis \'moodle\' ab.';
$string['database'] = 'Datenbank';
$string['databasehead'] = 'Datenbank-Einstellungen';
$string['databasehost'] = 'Datenbank-Server';
$string['databasename'] = 'Datenbank-Name';
$string['databasepass'] = 'Datenbank-Kennwort';
$string['databaseport'] = 'Datenbank-Port';
$string['databasesocket'] = 'Unix Socket';
$string['databasetypehead'] = 'Datenbank-Treiber wählen';
$string['databasetypesub'] = 'Moodle unterstützt mehrere Typen von Datenbank-Servern. Bitte fragen Sie Ihren Server-Administrator, welchen Typ Sie benutzen sollen.';
$string['databaseuser'] = 'Datenbank-Nutzer';
$string['dataroot'] = 'Datenverzeichnis';
$string['datarooterror'] = 'Das angegebene Verzeichnis dataroot ist nicht vorhanden und kann auch nicht angelegt werden. Korrigieren Sie die Pfad-Angabe oder legen Sie das Verzeichnis manuell an.';
$string['datarootpermission'] = 'Zugriffsrechte zum Datenverzeichnis';
$string['datarootpublicerror'] = 'Das angegebene Verzeichnis dataroot ist direkt aus dem Internet zugänglich. Sie müssen das Verzeichnis ändern!';
$string['dbconnectionerror'] = 'Eine Verbindung zur angegebenen Datenbank konnte nicht hergestellt werden. Bitte überprüfen Sie Ihre Eingaben.';
$string['dbcreationerror'] = 'Fehler beim Anlegen der Datenbank. Die Datenbank konnte mit diesen Einstellungen nicht erstellt werden.';
$string['dbhost'] = 'Server';
$string['dbpass'] = 'Kennwort';
$string['dbport'] = 'Port';
$string['dbprefix'] = 'Tabellen-Prefix';
$string['dbtype'] = 'Typ';
$string['directorysettings'] = '<p>Bitte überprüfen Sie alle Angaben für diese Moodle-Installation.</p>

<p><b>Webadresse:</b>
Geben Sie die vollständige Webadresse für Ihre Moodle-Instanz an. Sollte die Website über mehrere Adressen erreichbar sein, verwenden Sie die für Ihre Institution am einfachsten nutzbare Adresse. Beenden Sie die Webadresse nicht mit einem Slash.</p>

<p><b>Moodle-Verzeichnis:</b>
Geben Sie den absoluten Pfad für Ihre Moodle-Installation an. Achten Sie darauf, dass die Groß-/Kleinschreibung korrekt ist.</p>

<p><b>Datenverzeichnis:</b>
Moodle benötigt ein Verzeichnis, in dem hochgeladene Dateien abgelegt werden. Dieses Verzeichnis muss Lese- und Schreibrechte für das Nutzerkonto besitzen, mit dem Ihr Webserver arbeitet (üblicherweise \'nobody\', \'apache\' oder \'www\'). Außerdem darf das Verzeichnis nicht direkt aus dem Internet erreichbar sein. Das Intallationsskript wird versuchen, ein solches Verzeichnis zu erstellen, falls es nicht schon existiert.</p>';
$string['directorysettingshead'] = 'Bestätigen Sie bitte die Einträge für Ihre Moodle-Installation';
$string['directorysettingssub'] = '<b>Webadresse:</b>
Geben Sie hier die vollständige Webadresse für Ihre Moodle-Instanz an. Sollte die Website über mehrere Adressen erreichbar sein, verwenden Sie die für Ihre Institution am einfachsten nutzbare Adresse. Beenden Sie die Webadresse nicht mit einem Slash.
<br />
<br />
<b>Moodle-Verzeichnis:</b>
Geben Sie den absoluten Pfad für Ihre Moodle-Installation an. Stellen Sie sicher, dass die Groß-/Kleinschreibung korrekt ist.
<br />
<br />
<b>Datenverzeichnis:</b>
Moodle benötigt ein Verzeichnis, in dem hochgeladene Dateien abgelegt werden. Dieses Verzeichnis muss Lese- und Schreibrechte für das Nutzerkonto besitzen, mit dem Ihr Webservers arbeitet (üblicherweise \'nobody\' oder \'apache\'). Außerdem darf das Verzeichnis nicht direkt aus dem Internet erreichbar sein. Das Intallationsskript wird versuchen, ein solches Verzeichnis zu erstellen, falls es nicht schon existiert.';
$string['dirroot'] = 'Moodle-Verzeichnis';
$string['dirrooterror'] = 'Die Einstellungen für das Moodle-Verzeichnis sind nicht korrekt.  Es wurde an dieser Stelle keine Moodle-Installation gefunden. Der nachfolgende Wert wurden zurückgesetzt.';
$string['download'] = 'Herunterladen';
$string['downloadlanguagebutton'] = 'Sprachpaket \'{$a}\' herunterladen';
$string['downloadlanguagehead'] = 'Sprachpaket herunterladen';
$string['downloadlanguagenotneeded'] = 'Die Installation wird mit dem Sprachpaket \'{$a}\' fortgesetzt.';
$string['downloadlanguagesub'] = 'Sie können ein Sprachpaket herunterladen und die Installation in dieser Sprache fortsetzen. <br /><br /> Falls Sie keinen Download durchführen können, wird die Installation in englischer Sprache fortgeführt. (Sobald die Moodle-Installation abgeschlossen ist, haben Sie jederzeit die Möglichkeit, weitere Sprachpakete zu laden und zu installieren.)';
$string['doyouagree'] = 'Stimmen Sie zu? (ja/nein)';
$string['environmenthead'] = 'Installationsvoraussetzungen werden geprüft ...';
$string['environmentsub'] = 'Es wird geprüft, ob die alle Systemkomponenten die Installationsanforderungen erfüllen.';
$string['environmentsub2'] = 'Jede Version hat Mindestvoraussetzungen für der PHP-Version und für verbindliche PHP-Extensions. Vor einer Installation oder einer Aktualisierung wird eine vollständige Prüfung durchgeführt. Bitte fragen Sie den Administrator des Servers, wenn Sie mit der Installation einer neuen Version oder mit der Aktivierung von PHP-Extensions nicht weiterkommen.';
$string['errorsinenvironment'] = 'Fehler bei der Prüfung der Systemvoraussetzungen!';
$string['fail'] = 'Fehlgeschlagen';
$string['fileuploads'] = 'Hochladene Dateien';
$string['fileuploadserror'] = 'Dies sollte eingeschaltet sein';
$string['fileuploadshelp'] = '<p>Das Hochladen von Dateien scheint auf diesem Server deaktiviert zu sein.</p><p>Moodle kann installiert werden, aber es wird nicht möglich sein, Kursdateien oder Nutzerbilder hochzuladen.</p> <p>Um das Hochladen von Dateien zu aktivieren, muss die Datei php.ini angepasst und die Einstellung für <b>file_uploads</b> auf \'1\' geändert werden.</p>';
$string['inputdatadirectory'] = 'Daten-Verzeichnis: ';
$string['inputwebadress'] = 'Web-Adresse';
$string['inputwebdirectory'] = 'Moodle-Verzeichnis: ';
$string['installation'] = 'Installation';
$string['langdownloaderror'] = 'Leider konnte das Sprachpaket \'{$a}\' nicht heruntergeladen werden. Die Installation wird in englischer Sprache fortgesetzt.';
$string['langdownloadok'] = 'Die Installation des Sprachpakets \'{$a}\' war erfolgreich. Der weitere Installationsprozess erfolgt nun in dieser Sprache.';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Dies sollte ausgeschaltet sein (\'off\')';
$string['magicquotesruntimehelp'] = '<p>Magic Quotes Runtime sollte ausgeschaltet (\'off\') sein, damit Moodle richtig funktioniert.  </p>
<p>Normalerweise ist dies der Fall. Prüfen Sie bitte die Einstellung <b>magic_quotes_runtime</b> in der Datei php.ini. </p>
<p>Falls Sie keinen Zugriff auf die Datei php.ini haben, können Sie auch versuchen, die folgende Zeile in die Datei .htaccess im Verzeichnis moodle einfügen:
<blockquote><div>php_value magic_quotes_runtime Off</div></blockquote></p>';
$string['memorylimit'] = 'Memory Limit';
$string['memorylimiterror'] = 'Die PHP-Speichereinstellung memory_limit ist ziemlich niedrig .... dies könnte später zu Problemen führen.';
$string['memorylimithelp'] = '<p>Die PHP-Einstellung memory_limit Ihres Servers ist zur Zeit auf {$a} eingestellt. </p>
<p>Wenn Sie Moodle mit vielen Aktivitäten oder vielen Nutzer/innen verwenden, wird dies vermutlich zu Problemen führen.</p>
<p>Wir empfehlen die Einstellung wenn möglich zu erhöhen, z.B. auf 40M oder mehr. Dies können Sie auf verschiedene Arten machen:</p>
<ol>
<li>Wenn Sie PHP neu kompilieren können, nehmen Sie die Einstellung <i>--enable-memory-limit</i>. Dann kann Moodle die Einstellung selber vornehmen.
<li>Wenn Sie Zugriff auf die Datei php.ini haben, können Sie die Einstellung <b>memory_limit</b> selber auf einen Wert von 40M setzen. Wenn Sie selber keinen Zugriff haben, fragen Sie den Server-Admin, dies für Sie zu tun.
<li>Auf einigen PHP-Servern können Sie eine .htaccess-Datei im Moodle-Verzeichnis einrichten. Tragen Sie darin die folgende Zeile ein: <p><blockquote><div>php_value memory_limit 40M</div></blockquote></p>
<p>Achtung: auf einigen Servern hindert diese Einstellung <b>alle</b> PHP-Seiten und Sie erhalten Fehlermeldungen. Entfernen Sie dann den Eintrag in der .htaccess-Datei wieder.</p></li>
</ol>';
$string['mssqlextensionisnotpresentinphp'] = 'PHP ist nicht richtig konfiguriert, um über die PHP-Extension MSSQL mit dem SQL*Server zu kommunizieren. Bitte prüfen Sie die Datei php.ini oder kompilieren Sie PHP neu.';
$string['mysqliextensionisnotpresentinphp'] = 'PHP ist nicht richtig konfiguriert, um über die PHP-Extension MySQLi mit der MySQL-Datenbank zu kommunizieren. Prüfen Sie die Datei php.ini oder übersetzen Sie PHP neu.';
$string['nativemariadb'] = 'MariaDB (native/mariadb)';
$string['nativemariadbhelp'] = '<p>Die Datenbank, in der Moodle seine Daten speichert, muss konfiguriert werden.</p>
<p>Die Datenbank kann automatisch angelegt werden, wenn das angegebene Nutzerkonto bereits existiert und die nötigen Rechte besitzt. Die Feldeinträge Name, Nutzername und Passwort sind Pflichtfelder. Der Tabellenpräfix ist optional.</p>
<p>Wenn die Datenbank noch nicht existert und de eingetragenen Nutzer über die Rechte zum Anlegen der Datenbank verfügt, versucht Moodle die Datenbank selber anzulegen</p>
<p> Dieser Treiber ist nicht kompatibel mit der älteren MyISAM-Engine.</p>';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Sie müssen die Datenbank für die Speicherung der Moodle-Daten konfigurieren. Die Datenbank muss bereits angelegt sein. Ein Nutzername und das zugehörige Kennwort  für den Datenbank-Zugriff müssen bereits existieren. Das Tabellen-Prefix ist verbindlich.';
$string['nativemysqli'] = 'Verbessertes MySQL (native/mysqli)';
$string['nativemysqlihelp'] = '<p>Sie müssen die Datenbankeinstellungen für die Speicherung der Moodle-Daten konfigurieren. </p><p>Die Datenbank kann automatisch angelegt werden, wenn das angegebene Nutzerkonto bereits existiert und die nötigen Rechte besitzt. Die Feldeinträge Name, Nutzername und Passwort sind Pflichtfelder. Der Tabellenpräfix ist optional.</p>
<p>Wenn die Datenbank noch nicht existert und de eingetragenen Nutzer über die Rechte zum Anlegen der Datenbank verfügt, versucht Moodle die Datenbank selber anzulegen</p>';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativeocihelp'] = 'Sie müssen die Datenbank für die Speicherung der Moodle-Daten konfigurieren. Die Datenbank muss bereits angelegt sein. Ein Nutzername und das zugehörige Kennwort  für den Datenbank-Zugriff müssen bereits existieren. Das Tabellen-Prefix ist verbindlich.';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = '<p>Sie müssen die Datenbank für die Speicherung der Moodle-Daten konfigurieren. in ihr weden die meisten Daten von Moodle abgespeichert.</p><p>Die Datenbank muss bereits angelegt sein. Ein Nutzername und das zugehörige Kennwort  für den Datenbank-Zugriff müssen bereits existieren. Das Tabellen-Prefix ist verbindlich.</p><p>DieDatenbank muss bereits existieren und der angegebene Nutzer muß sowohl über Lese- also auch Schreibrechte verfügen.</p>';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Sie müssen die Datenbank für die Speicherung der Moodle-Daten konfigurieren. Die Datenbank muss bereits angelegt sein. Ein Nutzername und das zugehörige Kennwort  für den Datenbank-Zugriff müssen bereits existieren. Das Tabellen-Prefix ist verbindlich.';
$string['nativesqlsrvnodriver'] = 'Die Microsoft-Treiber zum SQL Server für PHP sind nicht installiert oder nicht richtig konfiguriert.';
$string['nativesqlsrvnonwindows'] = 'Die Microsoft-Treiber zum SQL Server für PHP sind ausschließlich für Windows verfügbar.';
$string['ociextensionisnotpresentinphp'] = 'PHP wurde nicht richtig konfiguriert, um über die PHP-Extension OCI8 mit der Oracle-Datenbank zu kommunizieren. Prüfen Sie die Datei php.ini oder übersetzen Sie PHP neu.';
$string['pass'] = 'Durchgang';
$string['paths'] = 'Pfade';
$string['pathserrcreatedataroot'] = 'Das Datenverzeichnis ({$a->dataroot}) kann vom Installer nicht angelegt werden.';
$string['pathshead'] = 'Pfade bestätigen';
$string['pathsrodataroot'] = 'Das Verzeichnis dataroot ist schreibgeschützt.';
$string['pathsroparentdataroot'] = 'Das Verzeichnis ({$a->parent}) ist schreibgeschützt. Deswegen kann das Datenverzeichnis ({$a->dataroot})  vom Installer nicht angelegt werden.';
$string['pathssubadmindir'] = 'Einige Webserver benutzen /admin als speziellen Link, um auf Einstellungsseiten oder Ähnliches zu verweisen. Unglücklicherweise kollidiert dies mit dem standardmäßigen Verzeichnis für die Moodle-Administration. Sie können dieses Problem beheben, indem Sie das Verzeichnis admin in Ihrer Moodle-Installation umbenennen und den neuen Namen hier eingeben (z.B. <em>moodleadmin</em>). Mit dieser Änderung werden alle Admin-Links korrigiert.';
$string['pathssubdataroot'] = '<p>Sie benötigen einen Platz, wo Moodle hochgeladene Dateien abspeichern kann. </p><p>Dieses Verzeichnis muss Lese- und Schreibrechte für das Nutzerkonto besitzen, mit dem Ihr Webservers läuft (üblicherweise \'nobody\', \'apache\' oder \'www-data).</p><p>  Außerdem sollte das Verzeichnis nicht direkt aus dem Internet erreichbar sein. </p><p>Das Intallationsskript wird versuchen, ein solches Verzeichnis zu erstellen, falls es nicht existiert.</p>';
$string['pathssubdirroot'] = '<p>Vollständiger Pfad der Moodle-Installation.</p>';
$string['pathssubwwwroot'] = '<p>Webadresse, die ein Nutzer im Browser eingibt, um auf Moodle zuzugreifen.</p><p> Es ist nicht möglich, über unterschiedliche Adressen auf Moodle zuzugreifen. Sollte Ihre Website mehrere öffentliche Adressen verwenden, so müssen Sie eine Adresse festlegen und für die übrigen Adressen dauerhafte Weiterleitungen dorthin einrichten.</p>
<p>Falls Ihre Website gleichzeitig im Intranet und im Internet erreichbar ist, so tragen Sie die öffentliche Adresse ein. Konfigurieren Sie den DNS so, dass Moodle auch aus dem Intranet über die öffentliche Adresse erreichbar ist.</p>
<p>Führen Sie Ihre Moodle-Installation unbedingt mit der richtigen Adresse durch, weil es andernfalls zu Problemen kommen könnte.</p>';
$string['pathsunsecuredataroot'] = 'Der Speicherort des Verzeichnisses \'dataroot\' ist unsicher';
$string['pathswrongadmindir'] = 'Das Admin-Verzeichnis existiert nicht';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP ist nicht richtig konfiguriert, um über die PHP-Extension PGSQL mit der PostgreSQL-Datenbank zu kommunizieren. Bitte prüfen Sie die Datei php.ini oder kompilieren Sie PHP neu.';
$string['phpextension'] = 'PHP-Extension {$a}';
$string['phpversion'] = 'PHP-Version';
$string['phpversionhelp'] = '<p>Moodle erwartet als PHP-Version mindestens 4.3.0/4.4.0 oder 5.1.0 (5.0.x weist eine Reihe bekannter Fehler auf).</p>
<p>Sie nutzen momentan die Version {$a}.</p>
<p>Sie müssen Ihre PHP-Version aktualisieren oder auf einen Rechner wechseln, der eine neuere Version von PHP nutzt.<br />
(Im Falle von 5.0.x könnten Sie auch zu einer Version 4.3.x/4.4.x downgraden)</p>';
$string['releasenoteslink'] = 'Um Informationen über diese Moodle-Version zu erhalten, lesen Sie bitte in die Versionshinweise auf {$a}';
$string['safemode'] = 'Safe Mode';
$string['safemodeerror'] = 'Die Nutzung von Moodle im Safe Mode kann zu Schwierigkeiten führen.';
$string['safemodehelp'] = '<p>Moodle kann beim Betrieb im Safe Mode verschiedene Probleme zeigen, eventuell könnte es z.B. unmöglich sein, neue Dateien zu erzeugen. </p>
<p>Safe Mode ist normalerweise nur auf einigen paranoiden öffentlichen Webhosts aktiviert. Suchen Sie sich einen Anbieter, der auf diese Einstellung verzichtet.</p>
<p>Sie können versuchen, die Installation fortzusetzen, müssen dann aber später mit Problemen rechnen. </p>';
$string['sessionautostart'] = 'Session Auto Start';
$string['sessionautostarterror'] = 'Diese Option sollte ausgeschaltet sein';
$string['sessionautostarthelp'] = '<p>Moodle benötigt den Session Support und kann ohne diese Einstellung nicht arbeiten.</p>
<p>Sessions sind durch Einstellungen in der Datei php.ini möglich. Bitte suchen Sie nach der Einstellung für session.auto_start </p>';
$string['sqliteextensionisnotpresentinphp'] = 'PHP ist für die PHP-Extension SQLite nicht richtig konfiguriert. Prüfen Sie die Datei php.ini oder übersetzen Sie PHP neu.';
$string['upgradingqtypeplugin'] = 'Plugin für Frage/Typ aktualisieren';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Sie haben das Paket <strong>{$a->packname} {$a->packversion}</strong> erfolgreich auf Ihrem Computer installiert.';
$string['welcomep30'] = 'Diese Version von <strong>{$a->installername}</strong> enthält folgende Anwendungen, mit denen Sie <strong>Moodle</strong> ausführen können:';
$string['welcomep40'] = 'Das Paket enthält: <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'Die Nutzung dieser Anwendungen ist lizenzrechtlich geprüft. Alle Anwendungen von <strong>{$a->installername}</strong> sind
<a href="http://www.opensource.org/docs/definition_plain.html"> Open Source </a> und unterliegen der <a href="http://www.gnu.org/copyleft/gpl.html"> GPL</a> Lizenz.';
$string['welcomep60'] = 'Die folgenden Webseiten führen Sie in einfachen Schritten durch die Installation von <strong>Moodle</strong> auf Ihrem Computer. Sie können die vorgeschlagenen Einstellungen übernehmen oder an eigene Bedürfnisse anpassen.';
$string['welcomep70'] = 'Klicken Sie auf die Taste \'Weiter\', um mit der Installation von Moodle fortzufahren.';
$string['wwwroot'] = 'Webadresse';
$string['wwwrooterror'] = 'Diese Webadresse scheint nicht gültig zu sein. Moodle ist nicht unter dieser Adresse installiert. Der Eintrag wurde zurückgesetzt.';
