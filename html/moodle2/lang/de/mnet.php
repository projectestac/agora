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
 * Strings for component 'mnet', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Über Ihren Server';
$string['accesslevel'] = 'Access-Level';
$string['addhost'] = 'Rechner hinzufügen';
$string['addnewhost'] = 'Neuen Rechner hinzufügen';
$string['addtoacl'] = 'Zur Zugriffssteuerung hinzufügen';
$string['allhosts'] = 'Alle Hosts';
$string['allhosts_no_options'] = 'Beim Betrachten mehrerer Rechner sind keine Optionen verfügbar';
$string['allow'] = 'Erlauben';
$string['applicationtype'] = 'Art des Programms';
$string['authfail_nosessionexists'] = 'Fehler bei der Autorisierung: Die MNet-Session gibt es nicht!';
$string['authfail_sessiontimedout'] = 'Fehler bei der Autorisierung: Die MNet-Session ist abgelaufen!';
$string['authfail_usermismatch'] = 'Fehler bei der Autorisierung: Das Nutzerkonto passt nicht!';
$string['authmnetdisabled'] = 'Plugin zur MNet-Authentifizierung ist <strong>ausgeschaltet</strong>.';
$string['badcert'] = 'Das Zertifikat ist ungültig.';
$string['certdetails'] = 'Zertifikatsdetails';
$string['configmnet'] = 'MNet ermöglicht den Datenaustausch dieses Servers mit anderen Servern oder Diensten.';
$string['couldnotgetcert'] = 'Kein Zertifikat gefunden bei:<br />{$a}. <br />Der Rechner könnte ausgeschaltet oder falsch konfiguriert zu sein.';
$string['couldnotmatchcert'] = 'Das Zertifikat stimmt nicht mit dem aktuell auf dem Webserver veröffentlichter überein.';
$string['courses'] = 'Kurse';
$string['courseson'] = 'Kurse auf';
$string['currentkey'] = 'Aktueller Public Key';
$string['current_transport'] = 'Aktuelle Verbindung';
$string['databaseerror'] = 'Die Details konnten nicht in die Datenbank eingetragen werden.';
$string['deleteaserver'] = 'Server entfernen';
$string['deletedhostinfo'] = 'Der Rechner wurde entfernt. Sie können den Status aber rückgängig machen.';
$string['deletedhosts'] = 'Entferne Rechner: {$a}';
$string['deletehost'] = 'Rechner entfernen';
$string['deletekeycheck'] = 'Möchten Sie diesen Schlüssel wirklich löschen?';
$string['deleteoutoftime'] = 'Das Zeitfenster zum Löschen des Schlüssels beträgt 60 Sekunden und ist abgelaufen. Versuchen Sie es noch einmal.';
$string['deleteuserrecord'] = 'SSO ACL: Datensatz für Nutzer \'{$a->user}\' von {$a->host} löschen.';
$string['deletewrongkeyvalue'] = 'Ein Fehler ist aufgetreten. Falls Sie nicht selber versucht haben, den SSL-Schlüssel Ihres Servers zu löschen, könnten Sie Opfer eines böswilligen Angriffs sein. Es wurde keine Veränderung vorgenommen.';
$string['deny'] = 'Verbieten';
$string['description'] = 'Beschreibung';
$string['duplicate_usernames'] = 'Beim Anlegen eines Index für die Spalten "mnethostid" und "username" in Ihrer Nutzertabelle ist ein Fehler aufgetreten. <br />
Dies kann passieren, wenn ein  <a href="{$a}" target="_blank">doppelter Anmeldename in der Nutzertabelle</a> vorhanden ist.<br />
Das Update sollte dennoch erfolgreich abgeschlossen worden sein. Klicken Sie auf den Link und die Hinweise zur Problemlösung öffnen sich in einem neuen Fenster. Sie können sich mit diesem Problem nach Abschluss des Updates befassen.<br/>';
$string['enabled_for_all'] = '(Dieser Dienst wurde für alle Rechner freigegeben.)';
$string['enterausername'] = 'Bitte geben Sie einen Anmeldenamen ein (oder eine kommagetrennte Liste von Anmeldenamen)';
$string['error7020'] = 'Dieser Fehler tritt normalerweise auf, wenn die Remote-Server einen Dateneintrag für wwwroot falsch erzeugt hat, z.B. http://domain.de statt http://www.domain.de. Sie sollten den Administrator der Remote-Servers über die richtige Einstellung für wwwroot  informieren (so wie in config.php angegeben), damit dortige Dateneintrag für Ihren Server korrigiert werden kann.';
$string['error7022'] = 'Die von Ihnen an den Remote-Server übermittelte Nachricht war richtig verschlüsselt, aber nicht signiert. Dies ist ziemlich seltsam! Sie sollten diesen Fehler bei seinem Auftreten unbedingt melden und dabei die beteiligten Moodle-Versionen angeben.';
$string['error7023'] = 'Der Remote-Server ist bei dem Versuch gescheitert, Ihre Nachricht mit den für Ihre Site verfügbaren Schlüssel zu entschlüsseln. Eventuell sind Sie in der Lage, dieses Problem durch ein manuelles Eingreifen (re-keying) zu beheben. Dieses Problem ist sehr unwahrscheinlich, außer Sie hatten mehrere Monate keinen Kontakt zum Remote-Server.';
$string['error7024'] = 'Sie haben eine unverschlüsselte Nachricht an den Remote-Server versandt, aber dieser akzeptiert keine unverschlüsselte Kommunikation von Ihrer Site. Dies ist ziemlich seltsam! Sie sollten diesen Fehler bei seinem Auftreten unbedingt melden und dabei die beteiligten Moodle-Versionen angeben.';
$string['error7026'] = 'Der Schlüssel, mit dem Ihre Nachricht signiert wurde, unterscheidet sich vom Schlüssel, den der Remote-Server für Ihre Site gespeichert hat. Zusätzlich ist der Remote-Server bei dem Versuch gescheitert, Ihren aktuellen Schlüssel automatisch zu holen. Bitte greifen Sie manuell ein (re-key) und versuchen Sie es noch einmal.';
$string['error709'] = 'Der Remote-Server ist bei dem Versuch gescheitert, einen SSL-Schlüssel von Ihnen zu beziehen.';
$string['expired'] = 'Schlüssel wird ungültig am';
$string['expires'] = 'Gültig bis';
$string['expireyourkey'] = 'Schlüssel löschen';
$string['expireyourkeyexplain'] = 'Moodle wechselt Ihren PublicKey automatisch alle 28 Tage (Standard). Sie haben aber jederzeit die Möglichkeit, den PublicKey  <em>manuell</em> zu löschen. Dies ist nur dann sinnvoll, wenn Sie fürchten, Ihr PublicKey könnte gefälscht sein. Ein Ersatz wird dann umgehend automatisch erstellt.<br />Das Löschen des PublicKey macht es unmöglich, dass andere Moodle mit Ihrem Moodle kommunizieren können, solange bis Sie Ihren neuen PublicKey manuell an die anderen Administrator/innen übermittelt haben.';
$string['exportfields'] = 'Felder zum Export';
$string['failedaclwrite'] = 'Fehler beim Schreiben in die MNET-Access-Kontrollliste für Nutzer \'{$a}\'';
$string['findlogin'] = 'Login suchen';
$string['forbidden-function'] = 'Diese Funktion wurde für RPC nicht freigegeben.';
$string['forbidden-transport'] = 'Die gewählte Übertragungsmethode ist nicht erlaubt.';
$string['forcesavechanges'] = 'Zum Speichern der Änderungen auffordern';
$string['helpnetworksettings'] = 'Moodle-übergreifende Kommunikation konfigurieren';
$string['hidelocal'] = 'Lokale Nutzer/innen verbergen';
$string['hideremote'] = 'Entfernte Nutzer/innen verbergen';
$string['host'] = 'Rechner';
$string['hostcoursenotfound'] = 'Rechner oder Kurs nicht gefunden';
$string['hostdeleted'] = 'Rechner entfernt';
$string['hostexists'] = 'Die URL des Rechners wird bereits benutzt. Eventuell ist der Datensatz gelöscht. <a href="{$a}">Datensatz bearbeiten</a>.';
$string['hostlist'] = 'Liste von verbundenen Servern';
$string['hostname'] = 'URL des Rechners';
$string['hostnamehelp'] = 'Vollständiger Domainname des Remote-Rechners, z.B. www.beispiel.de';
$string['hostnotconfiguredforsso'] = 'Dieser Moodle-Remote-Knoten ist nicht für ein Remote-Login konfiguriert.';
$string['hostsettings'] = 'Rechnereinstellungen';
$string['http_self_signed_help'] = 'Erlauben Sie Verbindungen, die auf dem Remote-Rechner ein selbstsigniertes DIY-SSL-Zertifikat benutzen.';
$string['https_self_signed_help'] = 'Erlauben Sie Verbindungen über http, die auf dem Remote-Rechner ein selbstsigniertes DIY-SSL-Zertifikat in PHP benutzen.';
$string['https_verified_help'] = 'Erlauben Sie Verbindungen, die auf dem Remote-Rechner ein geprüftes SSL-Zertifikat benutzen.';
$string['http_verified_help'] = 'Erlauben Sie Verbindungen über http (nicht https), die auf dem Remote-Rechner ein geprüftes SSL-Zertifikat in PHP benutzen.';
$string['id'] = 'ID';
$string['idhelp'] = 'Dieser Wert wurde automatisch vergeben und kann nicht geändert werden.';
$string['importfields'] = 'Felder zum Import';
$string['inspect'] = 'Prüfen';
$string['installnosuchfunction'] = 'Programmierfehler! Beim Versuch, die MNET-XMLRPC-Funktion \'{$a->method}\' aus der Datei \'{$a->file}\' zu installieren, wurde die Funktion nicht gefunden!';
$string['installnosuchmethod'] = 'Programmierfehler! Beim Versuch, die MNET-XMLRPC-Methode \'{$a->method}\' in die Klasse \'{$a->class}\' zu installieren, wurde die Methode nicht gefunden!';
$string['installreflectionclasserror'] = 'Programmierfehler! Die MNET-Selbstprüfung für die Methode \'{$a->method}\' in der Klasse \'{$a->class}\' ist fehlgeschlagen. Die Fehlermeldung lautet: \'{$a->error}\'.';
$string['installreflectionfunctionerror'] = 'Programmierfehler! Die MNET-Selbstprüfung für die Funktion \'{$a->method}\' in der Datei \'{$a->file}\' ist fehlgeschlagen. Die Fehlermeldung lautet: \'{$a->error}\'.';
$string['invalidaccessparam'] = 'Ungültiger Access-Parameter';
$string['invalidactionparam'] = 'Ungültiger Ablaufparameter';
$string['invalidhost'] = 'Sie müssen eine gültige Rechner-Kennung eingeben';
$string['invalidpubkey'] = 'Der Schlüssel ist kein gültiger SSL-Schlüssel ({$a})';
$string['invalidurl'] = 'Ungültiger URL-Parameter';
$string['ipaddress'] = 'IP-Adresse';
$string['is_in_range'] = 'Die IP-Adresse  <code>{$a}</code>  gehört zu einem vertrauenswürdigen Rechner.';
$string['ispublished'] = '{$a} stellt diesen Dienst für Sie bereit.';
$string['issubscribed'] = 'Moodle {$a} abonniert diesen Dienst von Ihrem Server';
$string['keydeleted'] = 'Ihr Schlüssel wurde erfolgreich gelöscht und neu gesetzt.';
$string['keymismatch'] = 'Der von Ihnen für diesen Rechner vorgehaltene PublicKey unterscheidet sich vom aktuell veröffentlichten PublicKey. Der veröffentlichte Key lautet:';
$string['last_connect_time'] = 'Letzte Verbindung';
$string['last_connect_time_help'] = 'Zeitpunkt, zu dem Sie das letzte Mal mit diesem Rechner verbunden waren.';
$string['last_transport_help'] = 'Übertragungsprotokoll, das Sie für die vorherige Verbindung benutzt hatten.';
$string['leavedefault'] = 'Grundeinstellungen benutzen';
$string['listservices'] = 'Dienste auflisten';
$string['loginlinkmnetuser'] = '<br/>Falls Sie ein Remote-Nutzer im  Moodle-Netzwerk sind und hier <a href="{$a}">Ihre E-Mail-Adresse bestätigen</a>, können Sie zu Ihrer Login-Seite weitergeleitet werden.<br />';
$string['logs'] = 'Logdaten';
$string['managemnetpeers'] = 'Peers verwalten';
$string['method'] = 'Methode';
$string['methodhelp'] = 'Hilfe für Methode {$a}';
$string['methodsavailableonhost'] = 'Verfügbare Methoden auf {$a}';
$string['methodsavailableonhostinservice'] = 'Verfügbare Methoden für  {$a->service} auf {$a->host}';
$string['methodsignature'] = 'Signatur für Methode {$a}';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = '(Bis zu) 3 Textteile verbinden und als Ergebnis zurückliefern';
$string['mnetdisabled'] = 'MNet ist <strong>ausgeschaltet</strong>.';
$string['mnetidprovider'] = 'MNet ID Provider';
$string['mnetidproviderdesc'] = 'Falls Sie die richtige, zum eben eingegebenen Anmeldenamen passende E-Mail-Adresse übermitteln, könnten Sie umgehend einen Link zum Einloggen erhalten.';
$string['mnetidprovidermsg'] = 'Das Login bei Ihrem Provider {$a} sollte möglich sein.';
$string['mnetidprovidernotfound'] = 'Weitere Informationen konnten nicht gefunden werden.';
$string['mnetlog'] = 'Logdaten';
$string['mnetpeers'] = 'Peers';
$string['mnetservices'] = 'Dienste';
$string['mnet_session_prohibited'] = 'Teilnehmer/innen Ihres Moodle-Servers sind aktuell nicht für einen Wechsel auf {$a} zugelassen.';
$string['mnetsettings'] = 'MNet-Einstellungen';
$string['moodle_home_help'] = 'Der Pfad zur Moodle-Startseite aud dem Remote-Rechner, z.B. /moodle/';
$string['name'] = 'Name';
$string['net'] = 'Netzwerk';
$string['networksettings'] = 'Netzwerk-Einstellungen';
$string['never'] = 'Nie';
$string['noaclentries'] = 'Keine Einträge in der SSO-Access-Kontrollliste';
$string['noaddressforhost'] = 'Die URL des Rechners konnte nicht aufgelöst werden: {$a}';
$string['nocurl'] = 'PHP-Library cURL wurde nicht installiert';
$string['nolocaluser'] = 'Für diesen Remote-Nutzer ist kein lokaler Datensatz vorhanden. Ein Datensatz konnte auch nicht erzeugt werden, weil dieser Rechner Nutzerkonten nicht automatisch anlegt. Bitte melden Sie sich bei Ihrem Administrator!';
$string['nomodifyacl'] = 'Sie sind nicht berechtigt, die MNET-Access-Kontrollliste zu verändern.';
$string['nonmatchingcert'] = 'Der Inhalt des Zertifikats: <br /><em>{$a->subject}</em><br />Passt nicht zu dem Host von dem es stammt:<br /><em>{$a->host}</em>.';
$string['nopubkey'] = 'Bei der Abfrage des PublicKey ist ein Problem aufgetreten. <br />Vielleicht erlaubt der Rechner kein Moodle-Netzwerk oder der PublicKey ist ungültig.';
$string['nosite'] = 'Es wurde kein entsprechender Kurs gefunden';
$string['nosuchfile'] = 'Die Funktion {$a} gibt es nicht.';
$string['nosuchfunction'] = 'Es war nicht möglich, die Funktion zu finden. Eventuell ist die Funktion für RPC gesperrt.';
$string['nosuchmodule'] = 'Die Funktion war falsch adressiert und konnte nicht lokalisiert werden. Bitte verwenden Sie das Format mod/modulname/lib/functioname.';
$string['nosuchpublickey'] = 'Es war nicht möglich, einen PublicKey zur Signaturüberprüfung zu erhalten.';
$string['nosuchservice'] = 'Auf diesem Rechner läuft kein RPC-Dienst.';
$string['nosuchtransport'] = 'Kein Übertragungsprotokoll mit dieser ID';
$string['notBASE64'] = 'Diese Textpassage ist nicht im Base64-Encoded-Format. Sie kann kein gültiger Schlüssel sein.';
$string['notenoughidpinfo'] = 'Ihr Server (identity provider) liefert nicht genügend Informationen, um Ihr Nutzerkonto lokal zu erstellen oder zu aktualisieren.';
$string['not_in_range'] = 'Die IP-Adresse  <code>{$a}</code>  gehört nicht zu einem vertrauenswürdigen Rechner.';
$string['notinxmlrpcserver'] = 'Der Verbindungsversuch zum MNET-Remote-Client ist während einer XMLRPC-Server-Ausführung nicht möglich';
$string['notmoodleapplication'] = 'Achtung: Dies ist kein Moodle-Programm, weswegen einige der Prüfungen nicht ordentlich ablaufen könnten.';
$string['notPEM'] = 'Dieser Schlüssel ist nicht im PEM-Format. Er wird nicht funktionieren.';
$string['notpermittedtojump'] = 'Sie haben nicht das Recht, eine Remote-Session von diesem Server aus zu beginnen.';
$string['notpermittedtojumpas'] = 'Sie können keine Remote Session starten, solange Sie mit einem fremden Nutzerkonto angemeldet sind.';
$string['notpermittedtoland'] = 'Sie haben nicht das Recht, eine Remote-Session zu beginnen.';
$string['off'] = 'Aus';
$string['on'] = 'Ein';
$string['options'] = 'Optionen';
$string['peerprofilefielddesc'] = 'Hier können Sie die globalen Einstellungen ändern, die beim Hinzufügen neuer Nutzer/innen gesendet und importiert werden.';
$string['permittedtransports'] = 'Zugelassene Verbindungen';
$string['phperror'] = 'Ein interner PHP-Fehler verhindert, dass Ihre Anforderung erledigt wird.';
$string['position'] = 'Position';
$string['postrequired'] = 'Die Funktion \'delete\' erfordert eine POST-Anforderung.';
$string['profileexportfields'] = 'Felder zum Senden';
$string['profilefielddesc'] = 'Hier können Sie die Liste der Profilfelder konfigurieren, die MNET sendet und empfängt, sobald Nutzerkonten erstellt oder aktualisiert werden. Sie können diese auch für jede MNet-Verbindung individuell anpassen. Hinweis:Die folgenden Felder werden immer übertragen: {$a}';
$string['profilefields'] = 'Profilfelder';
$string['profileimportfields'] = 'Felder zum Import';
$string['promiscuous'] = 'Vermischt';
$string['publickey'] = 'PublicKey';
$string['publickey_help'] = 'Der PublicKey wurde automatisch vom Remote-Server geliefert.';
$string['publickeyrequired'] = 'Sie müssen einen PublicKey bereitstellen.';
$string['publish'] = 'Veröffentlichen';
$string['reallydeleteserver'] = 'Möchten Sie den Server wirklich entfernen?';
$string['receivedwarnings'] = 'Folgende Warnungen wurden empfangen';
$string['recordnoexists'] = 'Datensatz nicht vorhanden';
$string['reenableserver'] = 'Nein - wählen Sie diese Option, um diesen Server zu reaktivieren.';
$string['registerallhosts'] = 'Alle Hosts registrieren (ungeordnet)';
$string['registerallhostsexplain'] = 'Diese Funktion ermöglicht die automatische Registrierung aller Hosts, die eine Verbindung herstellen wollen. Das bedeutet, es wird ein Datensatz in der Hostliste angelegt und der PublicKey für alle anfragenden Systeme zur Verfügung gestellt. <br />Weiter unten können Sie Dienste für "Alle Hosts" konfigurieren und Dienste aktivieren, die unterschiedslos allen bereitgestellt werden.';
$string['registerhostsoff'] = 'Registrierung aller Server: <b>aus</b>';
$string['registerhostson'] = 'Registrierung aller Server: <b>ein</b>';
$string['remotecourses'] = 'Remote-Kurse';
$string['remotehost'] = 'Remote-Zugang';
$string['remotehosts'] = 'Remote-Rechner';
$string['remoteuserinfo'] = 'Remote {$a->remotetype} Nutzerprofil empfangen von <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'Netzwerk benötigt die OpenSSL-Erweiterung';
$string['restore'] = 'Wiederherstellen';
$string['returnvalue'] = 'Rückgabewert';
$string['reviewhostdetails'] = 'Rechner-Details prüfen';
$string['reviewhostservices'] = 'Rechner-Dienste prüfen';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP unverschlüsselt';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (selbstsigniert)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (selbstsigniert)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (signiert)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (signiert)';
$string['selectaccesslevel'] = 'Wählen Sie eine Zugriffsart';
$string['selectahost'] = 'Bitte wählen Sie einen Remote-Rechner.';
$string['service'] = 'Dienst-Name';
$string['serviceid'] = 'Dienst-ID';
$string['servicesavailableonhost'] = 'Verfügbare Dienste auf {$a}';
$string['serviceswepublish'] = 'Von uns veröffentlichte Dienste für {$a}';
$string['serviceswesubscribeto'] = 'Von uns abonnierte Dienste von {$a}';
$string['settings'] = 'Einstellungen';
$string['showlocal'] = 'Lokale Nutzer anzeigen';
$string['showremote'] = 'Remote-Nutzer anzeigen';
$string['ssl_acl_allow'] = 'SSO ACL: Nutzer {$a->user} von {$a->host} zulassen';
$string['ssl_acl_deny'] = 'SSO ACL: Nutzer {$a->user} von {$a->host} ablehnen';
$string['ssoaccesscontrol'] = 'SSO-Zugangssteuerung';
$string['ssoacldescr'] = 'Diese Seite regelt die Erlaubnis/das Verbot des Zugriffs spezifischer Nutzer von anderen Moodle-Netzwerk Hosts. Diese ist hilfreich wenn SSO Services für externe Nutzer angeboten wird. Zur Kontrolle der <em>lokalen</em> Nutzerberechtigungen für andere Moodle-Netzwerk Hosts gewähren Sie den Zugriff durch die <em>mnetlogintoremote</em> Berechtigung.';
$string['ssoaclneeds'] = 'Damit diese Funktion arbeitet muss das Moodle-Netzwerk aktiviert, das Moodle-Netzwerk Authentifizierungs-Plugin mit automatischer Nutzeraktivierung aktiviert sein.';
$string['strict'] = 'Streng';
$string['subscribe'] = 'Abonnieren';
$string['system'] = 'System';
$string['testclient'] = 'Testrechner für MNet';
$string['testtrustedhosts'] = 'Adresse testen';
$string['testtrustedhostsexplain'] = 'Geben Sie eine IP-Adresse ein, um einen vertrauenswürdigen Rechner zu prüfen.';
$string['theypublish'] = 'Sie veröffentlichen';
$string['theysubscribe'] = 'Sie abonnieren';
$string['transport_help'] = 'Diese Optionen wirken wechselseitig. Sie können den entfernten Host nur für SSL Cert verpflichten, wenn sie diese Funktion selber auch aktiviert haben.';
$string['trustedhosts'] = 'XMLRPC-Rechner';
$string['trustedhostsexplain'] = '<p>Die Mechanismen für vertrauenswürdige Hosts erlauben spezifischen Rechnern Aufrufe über XMLRPC für jeden Teil der Moodle API auszuführen. Damit ist der Zugriff auf Skripte, die Moodle kontrollieren, zulässig. Die Aktivierung ist damit potenziell geführlich. Wenn Sie sich nicht sicher sind, lassen Sie die Funkion deaktiviert. </p>
<p>Dies ist für Moodle-Netzwerke <strong>nicht </strong>erforderlich. </p>
<p>Geben Sie eine Liste von IP-Adressen ein, die Sie aktivieren wollen. Für jede IP-Adresse verwenden Sie eine neue Zeile. Einige Beispiele: </p>Ihr lokaler Host:<br />127.0.0.1<br />Ihr lokaler Host mit einem Netzwerkblock):<br />127.0.0.1/32<br />Nur Host mit IP address 192.168.0.7:<br />192.168.0.7/32<br />Jeder Host mit einer IP address zwischen 192.168.0.1 und 192.168.0.255:<br />192.168.0.0/24<br />Jeder beliebige Host:<br />192.168.0.0/0<br />Diese letzte Option kann definitiv <strong>nicht</strong> empfohlen werden.';
$string['turnitoff'] = 'Ausschalten';
$string['turniton'] = 'Einschalten';
$string['type'] = 'Typ';
$string['unknown'] = 'Unbekannt';
$string['unknownerror'] = 'Bei der Übertragung ist ein unbekannter Fehler aufgetreten.';
$string['usercannotchangepassword'] = 'Als Remote-Nutzer/in können Sie Ihr Kennwort hier nicht ändern.';
$string['userchangepasswordlink'] = '<br />Eventuell können Sie Ihr Kennwort bei Ihrem Provider <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a> ändern.';
$string['usernotfullysetup'] = 'Ihre Nutzereinstellungen sind unvollständig. Sie müssen <a href="{$a}">zurück zu Ihrem Provider</a> gehen, um dort das Nutzerprofil zu vervollständigen. Änderungen werden erst wirksam, wenn Sie sich danach ab- und wieder anmelden.';
$string['usersareonline'] = 'Warnung: {$a} Nutzer sind aktuell von diesem Server in Ihrer Website eingeloggt.';
$string['validated_by'] = 'Vom Netzwerk geprüft: <code>{$a}</code>';
$string['verifysignature-error'] = 'Fehler bei der Prüfung der Signatur';
$string['verifysignature-invalid'] = 'Fehler bei der Prüfung der Signatur: Die Übertragung wurde nicht von Ihnen signiert.';
$string['version'] = 'Version';
$string['warning'] = 'Warnung';
$string['wrong-ip'] = 'Ihre IP-Adresse passt nicht zu der gespeicherten Adresse.';
$string['xmlrpc-missing'] = 'Die PHP Extension XMLRPC muss installiert sein, um die Funktion nutzen zu können.';
$string['yourhost'] = 'Ihr Rechner';
$string['yourpeers'] = 'Ihre Peers';
