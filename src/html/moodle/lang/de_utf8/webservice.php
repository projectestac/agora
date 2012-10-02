<?PHP // $Id: webservice.php,v 1.4 2010/01/20 23:40:08 krause Exp $ 
      // webservice.php - created with Moodle 2.0 dev (Build: 20100118) (2010011400)


$string['activatehttps'] = 'Über HTTPS verbinden, um das Token zu sehen';
$string['actwebserviceshhdr'] = 'WebService-Protokolle aktivieren';
$string['addfunction'] = 'Funktion hinzufügen';
$string['addfunctionhelp'] = 'Funktion auswählen, um den Service hinzuzufügen';
$string['addservice'] = 'Neuen Service hinzufügen: $a->name (id: $a->id)';
$string['apiexplorer'] = 'API Explorer';
$string['apiexplorernotavalaible'] = 'API Explorer ist nicht verfügbar';
$string['arguments'] = 'Argumente';
$string['authmethod'] = 'Authentifizierungsmethode';
$string['configwebserviceplugins'] = 'Zur Sicherheit sollten nur wirklich benutzte Protokolle aktiviert werden.';
$string['context'] = 'Kontext';
$string['createtoken'] = 'Token erzeugen';
$string['deleteservice'] = 'Service löschen: $a->name (id: $a->id)';
$string['deleteserviceconfirm'] = 'Möchten Sie wirklich den externen Service \'$a\' löschen?';
$string['deletetokenconfirm'] = 'Möchten Sie wirklich dieses WebService-Token von <strong>$a->user</strong> für den Service <strong>$a->service</strong> löschen?';
$string['disabledwarning'] = 'Alle WebService-Protokolle sind deaktiviert. Die Einstellung \'WebService aktivieren\' befindet sich bei \'Weitere Möglichkeiten\'';
$string['editservice'] = 'Service bearbeiten: $a->name (id: $a->id)';
$string['enabled'] = 'Aktiviert';
$string['error'] = 'Fehler: $a';
$string['errorcodes'] = 'Fehlermeldung';
$string['execute'] = 'Ausführen';
$string['executewarnign'] = 'Achtung: Wenn Sie \'Ausführen\' drücken, so wird Ihre Datenbank verändert und Änderungen können nicht rückgängig gemacht werden!';
$string['externalservice'] = 'Externer Service';
$string['externalservicefunctions'] = 'Externe Servicefunktionen';
$string['externalservices'] = 'Externe Services';
$string['externalserviceusers'] = 'Externe Servicenutzer';
$string['function'] = 'Funktion';
$string['functions'] = 'Funktionen';
$string['generalstructure'] = 'Generelle Struktur';
$string['httpswarning'] = 'Tokens werden nur dann angezeigt, wenn Ihre Verbindung über HTTPS gesichert ist';
$string['invalidiptoken'] = 'Ungültiges Token - Ihre IP-Adresse wird nicht unterstützt';
$string['invalidtimedtoken'] = 'Ungültiges Token - Token ist abgelaufen';
$string['invalidtoken'] = 'Ungültiges Token - Token wurde nicht gefunden';
$string['iprestriction'] = 'IP-Beschränkung';
$string['manageprotocols'] = 'Protokolle verwalten';
$string['managetokens'] = 'Tokens verwalten';
$string['norequiredcapability'] = 'Keine erforderliche Fähigkeit';
$string['notoken'] = 'Sie haben kein Token erstellt.';
$string['operation'] = 'Betrieb';
$string['optional'] = 'Optional';
$string['phpparam'] = 'XMLRPC (PHP-Struktur)';
$string['phpresponse'] = 'XMLRPC (PHP-Struktur)';
$string['potusers'] = 'Nicht authorisierte Nutzer';
$string['print'] = 'Alles drucken';
$string['protocol'] = 'Protokoll';
$string['removefunction'] = 'Entfernen';
$string['removefunctionconfirm'] = 'Möchten Sie wirklich die Funktion \'$a->function\' aus dem Service \'$a->service\' entfernen?';
$string['required'] = 'Erforderlich';
$string['requiredcapability'] = 'Erforderliche Fähigkeit';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restrictedusers'] = 'Nur für authorisierte Nutzer';
$string['selectedcapability'] = 'Ausgewählt';
$string['service'] = 'Service';
$string['servicename'] = 'Name des Service';
$string['servicesbuiltin'] = 'Integrierte Services';
$string['servicescustom'] = 'Spezifische Services';
$string['serviceusers'] = 'Authorisierte Nutzer/innen';
$string['serviceusersmatching'] = 'Abgleich authorisierter Nutzer/innen';
$string['serviceuserssettings'] = 'Einstellungen für authorisierte Nutzer/innen ändern';
$string['testclient'] = 'WebService-Test';
$string['token'] = 'Token';
$string['validuntil'] = 'Gültig bis';
$string['webservices'] = 'WebServices';
$string['webservicetokens'] = 'WebService-Tokens';
$string['wsdocumentation'] = 'WebService-Dokumentation';
$string['wsdocumentationdisable'] = 'Die WebService-Dokumentation ist deaktiviert.';
$string['wsdocumentationlogin'] = 'Bitte geben Sie den Anmeldenamen und das Kennwort für den WebService ein';
$string['wspassword'] = 'Kennwort für den WebService';
$string['wsusername'] = 'Anmeldename für den WebService';
$string['amfdebug'] = 'AMF Server Debug-Modus'; // ORPHANED
$string['debugdisplayon'] = '\"Debug-Informationen anzeigen\" ist eingeschaltet. Der XMLRPC Server arbeitet nicht. Andere Webservice Server könnten ebenfalls Probleme zurückmelden. <br/>Benachrichten Sie den Admin, die Funktion abzuschalten.'; // ORPHANED
$string['fail'] = 'Gescheitert'; // ORPHANED
$string['functionlist'] = 'Liste der Webservice Funktionen'; // ORPHANED
$string['moodlepath'] = 'Moodle-Pfad'; // ORPHANED
$string['ok'] = 'OK'; // ORPHANED
$string['protocolenable'] = '$a[0] Protokoll aktivieren'; // ORPHANED
$string['soapdocumentation'] = '<H2>SOAP Manual</H2>
<b>1.</b> Aufruf der Methode <b>tmp_get_token</b> auf \"<i>http://remotemoodle/webservice/soap/server.php?wsdl</i>\"<br>
Der Funktionsparameter ist ein Array: in PHP ist es array(\"username\" => \"wsuser\", \"password\" => \"wspassword\")<br>
Return Wert ist ein Token (integer)<br>
<br>
<b>2.</b> Dann Moodlee Webservice Methode aufrufen unter \"<i>http://remotemoodle/webservice/soap/server.php?token=the_received_token&classpath=the_moodle_path&wsdl</i>\"<br>
Jede Methode hat nur einen Parameter als Array.<br>
<br>
Beispiel in PHP für diese spezifische Funktion:<br>
Moodle Pfad: <b>user</b><br>
<b>tmp_delete_user</b>( string username , integer mnethostid )<br>
Sie rufen z.B. auf:<br>
your_client->tmp_delete_user(array(\"username\" => \"username_to_delete\",\"mnethostid\" => 1))<br><br>'; // ORPHANED
$string['webservicesenable'] = 'Webservice aktivieren'; // ORPHANED
$string['wspagetitle'] = 'Webservice Dokumentation'; // ORPHANED
$string['wsuserreminder'] = 'Erinnerung: Der Admin dieser Site muß Ihnen noch Berechtigungen zuweisen moodle/site:usewebservices'; // ORPHANED
$string['xmlrpcdocumentation'] = '<H2>XMLRPC Manual</H2>
<b>1.</b> Aufruf der Methode <b>authentication.tmp_get_token</b> unter \"<i>http://remotemoodle/webservice/xmlrpc/server.php</i>\"<br>
Der Funktionsparameter ist ein Array: in PHP ist das array(\"username\" => \"wsuser\", \"password\" => \"wspassword\")<br>
Return Wert ist ein token (integer)<br>
<br>
<b>2.</b> Dann erfolgt der Aufruf einer Moodle Webservice Methode unter \"<i>http://remotemoodle/webservice/xmlrpc/server.php?classpath=the_moodle_path&token=the_received_token</i>\"<br>
Jede Methode hat nur einen Parameter als Array.<br>
<br>
In PHP ist das z.B. für diese Funktion:<br>
Moodle Pfad: <b>user</b><br>
<b>tmp_delete_user</b>( string username , integer mnethostid )<br>
Sierufen z.B. auf:<br>
your_client->call(\"user.tmp_delete_user\", array(array(\"username\" => \"username_to_delete\",\"mnethostid\" => 1)))<br>'; // ORPHANED

?>
