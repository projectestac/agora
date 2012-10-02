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
 * Strings for component 'webservice', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = 'Access Control Exception';
$string['actwebserviceshhdr'] = 'Webservice-Protokolle aktivieren';
$string['addaservice'] = 'Service hinzufügen';
$string['addcapabilitytousers'] = 'Nutzerrechte prüfen';
$string['addcapabilitytousersdescription'] = 'Nutzer/innen brauchen zwei Rechte: \'webservice:createtoken\' und ein zum jeweiligen Webservice-Protokoll passendes Recht (\'webservice/rest:use\', \'webservice/soap:use\', ...). <br />Zur Konfiguration ist es sinnvoll, eine neue Rolle \'Webservice\' mit dem Recht \'webservice:createtoken\' und mehreren Protokollrechten anzulegen und anschließend diese Rolle dem Webservice-Nutzer zuzuweisen.';
$string['addfunction'] = 'Funktion hinzufügen';
$string['addfunctionhelp'] = 'Funktion auswählen, um den Service hinzuzufügen';
$string['addfunctions'] = 'Funktionen hinzufügen';
$string['addfunctionsdescription'] = 'Notwendige Funktionen für den neuangelegten Service auswählen';
$string['addrequiredcapability'] = 'Notwendiges Recht hinzufügen/löschen';
$string['addservice'] = 'Neuen Service hinzufügen: {$a->name} (id: {$a->id})';
$string['addservicefunction'] = 'Funktionen zum Service hinzufügen "{$a}"';
$string['allusers'] = 'Alle Nutzer/innen';
$string['amftestclient'] = 'AMF Test-Client';
$string['apiexplorer'] = 'API Explorer';
$string['apiexplorernotavalaible'] = 'API Explorer bisher nicht verfügbar';
$string['arguments'] = 'Argumente';
$string['authmethod'] = 'Authentifizierung';
$string['cannotcreatetoken'] = 'Keine Berechtigung, um das WebService-Token für den Service {$a} zu ersellen.';
$string['cannotgetcoursecontents'] = 'Kursinhalte nicht erreichbar';
$string['checkusercapability'] = 'Nutzerfähigkeit prüfen';
$string['checkusercapabilitydescription'] = 'Ein Webservice-Nutzer muss die zu den benutzten Webservice-Protokollen passendes Rechte besitzen: (\'webservice/rest:use\', \'webservice/soap:use\', ...). <br />Zur Konfiguration ist es sinnvoll, eine neue Rolle \'Webservice\' mit dem Recht \'webservice:createtoken\' und mehreren Protokollrechten anzulegen und anschließend diese Rolle dem Webservice-Nutzer zuzuweisen.';
$string['configwebserviceplugins'] = 'Zur Sicherheit sollten nur wirklich benutzte Protokolle aktiviert werden.';
$string['context'] = 'Kontext';
$string['createservicedescription'] = 'Ein Service beinhaltet mehrere Webservice-Funktionen. Sie müssen einem Nutzerkonto erlauben, auf den neuen Service zuzugreifen. Auf der Seite <strong>Service hinzufügen</strong> markieren Sie \'Aktivieren\' und \'Berechtigte Nutzer/innen\'. Wählen Sie \'Keine erforderlichen Rechte\' aus.';
$string['createserviceforusersdescription'] = 'Ein Service beinhaltet mehrere Webservice-Funktionen. Sie müssen Nutzer/innen erlauben, auf den neuen Service zuzugreifen. Auf der Seite <strong>Service hinzufügen</strong> markieren Sie \'Aktivieren\' und markieren Sie nicht \'Berechtigte Nutzer/innen\'. Wählen Sie \'Keine erforderlichen Rechte\' aus.';
$string['createtoken'] = 'Token erzeugen';
$string['createtokenforuser'] = 'Nutzertoken erzeugen';
$string['createtokenforuserauto'] = 'Nutzertoken automatisch erzeugen';
$string['createtokenforuserdescription'] = 'Token für den Webservice-Nutzer erzeugen';
$string['createuser'] = 'Webservice-Nutzer anlegen';
$string['createuserdescription'] = 'Sie müssen einen speziellen Webservice-Nutzer für das System anlegen, das Moodle steuern soll';
$string['criteriaerror'] = 'Fehlende Rechte für die Kriteriensuche';
$string['default'] = 'Standardmäßig für "{$a}"';
$string['deleteaservice'] = 'Service löschen';
$string['deleteservice'] = 'Service löschen: {$a->name} (id: {$a->id})';
$string['deleteserviceconfirm'] = 'Wenn Sie einen Service löschen, dann werden damit auch alle zugehörigen Tokens gelöscht. Möchten Sie wirklich den externen Service \'{$a}\' löschen?';
$string['deletetokenconfirm'] = 'Möchten Sie wirklich dieses Webservice-Token von <strong>{$a->user}</strong> für den Service <strong>{$a->service}</strong> löschen?';
$string['disabledwarning'] = 'Alle Webservice-Protokolle sind deaktiviert. Die Einstellung \'Webservice aktivieren\' befindet sich bei \'Zusatzoptionen\'';
$string['doc'] = 'Dokumentation';
$string['docaccessrefused'] = 'Sie sind nicht berechtigt, die Dokumentation für dieses Token zu sehen';
$string['documentation'] = 'Webservice-Dokumentation';
$string['downloadfiles'] = 'Dateien können heruntergeladen werden.';
$string['downloadfiles_help'] = 'Nach der Aktivierung können alle Nutzer Dateien mit ihrem Sicherheitsschlüssel herunterladen. Dies gilt nur für die Dateien für die sie eine Berechtigung haben.';
$string['editaservice'] = 'Service bearbeiten';
$string['editservice'] = 'Service bearbeiten: {$a->name} (id: {$a->id})';
$string['enabled'] = 'Aktiviert';
$string['enabledocumentation'] = 'Entwicklerdokumentation aktivieren';
$string['enabledocumentationdescription'] = 'Eine ausführliche Webservicedokumentation ist für die aktivierten Protokolle verfügbar.';
$string['enablemobilewsoverview'] = 'Gehen Sie zur {$a->manageservicelink} Verwaltungsseite. Prüfen Sie die {$a->enablemobileservice}-Einstellungen und speichern Sie diese. Alles weitere wird dann aufgesetzt und alle Nutzer können die offizielle Moodle-App verwenden. Derzeitiger status; {$a->wsmobilesatus}';
$string['enableprotocols'] = 'Protokolle aktivieren';
$string['enableprotocolsdescription'] = 'Mindestens ein Protokoll muss aktiviert sein. Aus Sicherheitsgründen sollten nur tatsächlich benutzte Protokolle aktiviert werden.';
$string['enablews'] = 'Webservices aktivieren';
$string['enablewsdescription'] = 'Webservices müssen in den \'Zusatzoptionen\' aktiviert werden.';
$string['entertoken'] = 'Sicherheitsschlüssel/Token eingeben:';
$string['error'] = 'Fehler: {$a}';
$string['errorcatcontextnotvalid'] = 'Sie dürfen keine Funktionen im Bereichskontext (Kursbereichs-ID: {$a->courseid}) ausführen. Die Fehlermeldung war: {$a->message}';
$string['errorcodes'] = 'Fehlermeldung';
$string['errorcoursecontextnotvalid'] = 'Sie dürfen keine Funktionen im Kurskontext (course id: {$a->courseid}) ausführen. Die Fehlermeldung war: {$a->message}';
$string['errorinvalidparam'] = 'Ungültiger Parameter "{$a}"';
$string['errornotemptydefaultparamarray'] = 'Der Webservice-Parameter \'{$a}\' hat eine Single- oder Multiple-Struktur. Standardmäßig darf er nur ein leeres Array sein. Prüfen Sie die Webservice-Beschreibung.';
$string['erroroptionalparamarray'] = 'Der Webservice-Parameter \'{$a}\' hat eine Single- oder Multiple-Struktur. Er kann nicht als VALUE_OPTIONAL gesetzt werden. Prüfen Sie die Webservice-Beschreibung.';
$string['execute'] = 'Ausführen';
$string['executewarnign'] = 'Achtung: Wenn Sie \'Ausführen\' drücken, so wird Ihre Datenbank verändert. Die Änderungen können nicht automatisch zurückgenommen werden!';
$string['externalservice'] = 'Externer Service';
$string['externalservicefunctions'] = 'Externe Servicefunktionen';
$string['externalservices'] = 'Externe Services';
$string['externalserviceusers'] = 'Externe Servicenutzer';
$string['failedtolog'] = 'Fehler beim Schreiben von Logdaten';
$string['filenameexist'] = 'Dateiname existiert bereits: {$a}';
$string['forbiddenwsuser'] = 'Sie können keine Token für unbestätigte, gelöschte, gesperrte oder Gastnutzer erzeugen.';
$string['function'] = 'Funktion';
$string['functions'] = 'Funktionen';
$string['generalstructure'] = 'Generelle Struktur';
$string['information'] = 'Information';
$string['installexistingserviceshortnameerror'] = 'Ein Webservice mit dem Kurznamen "{$a}" existiert bereits. Sie können keinen weiteren Webservice mit dem gleichen Namen installieren.';
$string['installserviceshortnameerror'] = 'Codierungsfehler: Der Kurzname des Webservice "{$a}" darf ausschließlich Buchstaben, Zahlen und _-.. enthalten';
$string['invalidextparam'] = 'Ungültiger externer API-Parameter: {$a}';
$string['invalidextresponse'] = 'Ungültige externe API-Antwort: {$a}';
$string['invalidiptoken'] = 'Ungültiges Token - Ihre IP-Adresse wird nicht unterstützt';
$string['invalidtimedtoken'] = 'Ungültiges Token - Token ist abgelaufen';
$string['invalidtoken'] = 'Ungültiges Token - Token wurde nicht gefunden';
$string['iprestriction'] = 'IP-Beschränkung';
$string['iprestriction_help'] = 'Der Webservice kann nur von einer der gelisteten IP-Adressen aufgerufen werden';
$string['key'] = 'Schlüssel';
$string['keyshelp'] = 'Die Schlüssel werden benutzt, um mit externen Programmen auf Ihr Moodlekonto zugreifen zu können';
$string['manageprotocols'] = 'Protokolle verwalten';
$string['managetokens'] = 'Tokens verwalten';
$string['missingcaps'] = 'Fehlende Rechte';
$string['missingcaps_help'] = 'Liste der notwendigen, aber bisher fehlenden Rechte für die Nutzung des Webservices. Sie müssen diese Rechte an den Nutzer vergeben, damit er den Webservice nutzen kann.
';
$string['missingpassword'] = 'Fehlendes Passwort';
$string['missingrequiredcapability'] = 'Die Berechtigung {$a} ist erforderlich';
$string['missingusername'] = 'Fehlender Nutzername';
$string['missingversionfile'] = 'Codierungsfehler: Für die Komponente "{$a}" fehlt die Datei version.php';
$string['mobilewsdisabled'] = 'Deaktiviert';
$string['mobilewsenabled'] = 'Aktiviert';
$string['nofunctions'] = 'Dieser Service hat keine Funktion.
';
$string['norequiredcapability'] = 'Keine erforderlichen Rechte';
$string['notoken'] = 'Sie haben kein Token erstellt.';
$string['onesystemcontrolling'] = 'Externem System die Kontrolle über Moodle erlauben.';
$string['onesystemcontrollingdescription'] = 'Die folgenden Schritte helfen Ihnen, den Webservice für ein System zu konfigurieren, das mit Moodle Daten austauscht Die Schritte unterstützen Sie, die Token-Authentifizierung (Sicherheitsschlüssel) aufzusetzen.';
$string['operation'] = 'Betrieb';
$string['optional'] = 'Optional';
$string['passwordisexpired'] = 'Das Kennwort ist abgelaufen';
$string['phpparam'] = 'XMLRPC (PHP-Struktur)';
$string['phpresponse'] = 'XMLRPC (PHP-Struktur)';
$string['postrestparam'] = 'PHP-Code für REST (POST request)';
$string['potusers'] = 'Nicht autorisierte Nutzer/innen';
$string['potusersmatching'] = 'Passende nicht autorisierte Nutzer/innen';
$string['print'] = 'Alles drucken';
$string['protocol'] = 'Protokoll';
$string['removefunction'] = 'Entfernen';
$string['removefunctionconfirm'] = 'Möchten Sie wirklich die Funktion \'{$a->function}\' aus dem Service \'{$a->service}\' entfernen?';
$string['requireauthentication'] = 'Diese Methode benötigt die Authentifizierung mit xxx Berechtigungen.';
$string['required'] = 'Erforderlich';
$string['requiredcapability'] = 'Erforderliche Fähigkeit';
$string['requiredcapability_help'] = 'Wenn aktiviert können nur Nutzer mit der erforderlichen Berechtigung den Service nutzen ';
$string['requiredcaps'] = 'Notwendige Fähigkeiten';
$string['resettokenconfirm'] = 'Wollen Sie den Webserviceschlüssel für <strong>{$a->user}</strong> zurücksetzen? Service: <strong>{$a->service}</strong>.';
$string['resettokenconfirmsimple'] = 'Wollen Sie den Schlüssel wirklich zurücksetzen? Alle gespeicherten Links mit dem alten Schlüssel werden dann nicht mehr funktionieren. ';
$string['response'] = 'Antwort';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = 'Für das wiederhergestellte Konto muss ein neues Kennwort gesetzt werden, bevor ein Token erzeugt wird';
$string['restparam'] = 'REST (POST Parameter)';
$string['restrictedusers'] = 'Nur für autorisierte Nutzer/innen';
$string['restrictedusers_help'] = 'Diese Einstellung legt fest, ob alle Nutzer/innen mit dem Recht \'moodle/webservice:createtoken\' ein Token für diesen Webservice auf der Seite \'Sicherheitsschlüssel\' erstellen dürfen oder ob dies nur autorisierte Nutzer tun können.';
$string['securitykey'] = 'Sicherheitsschlüssel (Token)';
$string['securitykeys'] = 'Sicherheitsschlüssel';
$string['selectauthorisedusers'] = 'Autorisierte Nutzer/innen auswählen';
$string['selectedcapability'] = 'Ausgewählt';
$string['selectedcapabilitydoesntexit'] = 'Die aktuell gesetzte und notwendige Fähigkeit ({$a})  gibt es nicht mehr. Bitte ändern und speichern Sie dies.';
$string['selectservice'] = 'Service auswählen';
$string['selectspecificuser'] = 'Einen bestimmte/n Nutzer/in auswählen';
$string['selectspecificuserdescription'] = 'Den Webservice-Nutzer als autorisierten Nutzer hinzufügen';
$string['service'] = 'Service';
$string['servicehelpexplanation'] = 'Ein Webservice ist ein Set von Funktionen. Er kann von allen oder ausschließlich von speziell ausgewählten Nutzern verwendet werden. ';
$string['servicename'] = 'Name des Service';
$string['servicenotavailable'] = 'WebService ist nicht verfügbar (er existiert nichtoder ist gesperrt).';
$string['servicesbuiltin'] = 'Integrierte Services';
$string['servicescustom'] = 'Spezifische Services';
$string['serviceusers'] = 'Autorisierte Nutzer/innen';
$string['serviceusersettings'] = 'Nutzer/innen-Einstellungen';
$string['serviceusersmatching'] = 'Abgleich autorisierter Nutzer/innen';
$string['serviceuserssettings'] = 'Einstellungen für autorisierte Nutzer/innen ändern';
$string['simpleauthlog'] = 'Login mit einfacher Authentifizierung';
$string['step'] = 'Schritt';
$string['supplyinfo'] = 'Weitere Details';
$string['testauserwithtestclientdescription'] = 'Simulieren Sie den externen Zugriff auf den Service mit dem Webservice Testclient. Loggen Sie sich dazu zuerst als Nutzer mit der Berechtigung "moodle/webservice:createtoken" ein. Holen Sie sich den Sicherheitsschlüssel (Token) aus seinem MyMoodle Block. Verwenden Sie diesen Token im Testclient. Wählen Sie im Testclient ein aktives Protokoll mit Token Authentifizierung. <strong>Warnung: Die Funktionen, die Sie testen, WERDEN für diesen Nutzer tatsächlich AUSGEFÜHRT. Seien Sie daher vorsichtig mit der Auswahl der Testfunktionen.</strong> ';
$string['testclient'] = 'Webservice-Testrechner';
$string['testclientdescription'] = '<ul>
<li>Der Webservice Testclient <strong>führt die Funktionen des Webservices tatsächlich aus </strong>. Testen Sie keine Funktionen, die Ihnen nicht vertraut sind.</li>
<li>Derzeit sind noch nicht alle Funktionen in den Testclient implementiert.</li>
<li>Geben Sie auch einige Funktionen an, die nicht von Ihnen zugelassen sind, um zu prüfen, ob der Client tatsächlich nicht zugreifen kann. </li>
<li>Um aussagekräftige Fehlermeldungen zu bekommen setzen Sie den Debugmodus auf <strong>{$a->mode}</strong> unter {$a->atag}<br/>* Zugriff für  {$a->amfatag}.</li>
</ul>';
$string['testwithtestclient'] = 'Service testen';
$string['testwithtestclientdescription'] = 'Simulation des externen Zugriffs mit dem Webservice Testclient. Verwenden Sie ein aktiviertes Protokoll mit Token-Authentifizierung. <strong>Warnung: Die Funktionen, die Sie testen, WERDEN AUSGEFÜHRT. Seien Sie also vorsichtig, mit dem, was Sie testen.</strong>';
$string['token'] = 'Token';
$string['tokenauthlog'] = 'Token Authentifizierung';
$string['tokencreatedbyadmin'] = 'Kann ausschließlich vom Administrator zurückgesetzt werden (*)';
$string['tokencreator'] = 'Ersteller';
$string['unknownoptionkey'] = 'Unbekannter optionaler Schlüssel ({$a})';
$string['updateusersettings'] = 'Update';
$string['userasclients'] = 'Nutzer als Clients mit Token';
$string['userasclientsdescription'] = 'Die folgenden Schritte helfen Ihnen den Webservice für Nutzer als Clients  aufzusetzen. Er unterstützt Sie auch darin den empfohlenen Token (Sicherheitsschlüssel) der Authentifizierungsmethode aufzusetzen.In dem Fall erstellt der Nutzer den Token von der <strong>Sicherheitsschlüssel</strong>-Profilseite';
$string['usermissingcaps'] = 'Fehlende Fähigkeiten: {$a}';
$string['usernameorid'] = 'Nutzername/Nutzer-ID';
$string['usernameorid_help'] = 'Nutzername oder Nutzer-ID eingeben';
$string['usernameoridnousererror'] = 'Es wurden keine Nutzer mit diesem Nutzernamen/ID gefunden';
$string['usernameoridoccurenceerror'] = 'Es wurden mehrere Nutzer mit diesem Nutzernamen gefunden: Bitte ID eingeben.';
$string['usernotallowed'] = 'Das Nutzerkonto ist nicht für diesen Service zugelassen. Zuerst müssen Sie das Nutzerkonto in die Nutzeradministration für {$a} eintragen.';
$string['usersettingssaved'] = 'Nutzereinstellungen gespeichert';
$string['validuntil'] = 'Gültig bis';
$string['validuntil_help'] = 'Der Service wird für Nutzer deaktiviert nach dem eingegeben Datum ';
$string['webservice'] = 'Webservice';
$string['webservices'] = 'Webservices';
$string['webservicesoverview'] = 'Übersicht';
$string['webservicetokens'] = 'Webservice-Tokens';
$string['wrongusernamepassword'] = 'Falscher Anmeldename oder falsches Kennwort';
$string['wsaccessuserdeleted'] = 'WebServicezugriff für gelöschten Nutzernamen verweigert: {$a}';
$string['wsaccessuserexpired'] = 'WebServicezugriff für Nutzernamen it abgelaufenem Kennwort verweigert: {$a}';
$string['wsaccessusernologin'] = 'WebServicezugriff für gesperrtenn Nutzernamen verweigert: {$a}';
$string['wsaccessusersuspended'] = 'WebServicezugriff für gesperrten Nutzernamen verweigert: {$a}';
$string['wsaccessuserunconfirmed'] = 'WebServicezugriff für nicht bestätigten Nutzernamen verweigert: {$a}';
$string['wsclientdoc'] = 'Webservice-Client-Dokumentation';
$string['wsdocapi'] = 'API Dokumentation';
$string['wsdocumentation'] = 'Webservice-Dokumentation';
$string['wsdocumentationdisable'] = 'Die Webservice-Dokumentation ist deaktiviert.';
$string['wsdocumentationintro'] = 'Zum Erstellen eines Clients finden Sie folgende Hinweise: {$a->doclink}';
$string['wsdocumentationlogin'] = 'oder geben Sie die Webservice-Anmeldedaten ein:';
$string['wspassword'] = 'Webservice-Kennwort';
$string['wsusername'] = 'Webservice-Anmeldename';
