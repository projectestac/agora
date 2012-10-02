<?PHP // $Id: enrol_imsenterprise.php,v 1.8 2007/01/02 13:26:25 ralf-bonn Exp $ 
      // enrol_imsenterprise.php - created with Moodle 1.7+ (2006101008)


$string['aftersaving...'] = 'Nachdem Sie die Einstellungen gespeichert haben, können Sie folgendes tun:';
$string['allowunenrol'] = 'IMS-Datei das <strong>Löschen</string> von Teilnehmer/innen bzw. Trainer/innen erlauben';
$string['basicsettings'] = 'Grundeinstellungen';
$string['coursesettings'] = 'Kurseinstellungen';
$string['createnewcategories'] = 'Erstelle neue (verborgene) Kurskategorien, wenn nicht in Moodle gefunden';
$string['createnewcourses'] = 'Erstelle neue (verborgene) Kurse, wenn nicht in Moodle gefunden';
$string['createnewusers'] = 'Erstelle neue Nutzerzugänge, wenn Nutzer noch nicht in Moodle registriert';
$string['cronfrequency'] = 'Häufigkeit des Prozesses';
$string['deleteusers'] = 'Nutzerzugänge löschen, wenn in IMS-Daten definiert';
$string['description'] = 'Mit diesem Verfahren wird eine speziell formatierte Textdatei an einem festgelegten Ort regelmäßig geprüft und verarbeitet. Die Datei muss folgende Struktur mit Personendaten, Gruppen und XML-Elemente zur Zugehörigkeit enthalten: <a href=\'../help.php?module=enrol/imsenterprise&file=formatoverview.html\' target=\'_blank\'>IMS Enterprise Spezifikationen</a>.';
$string['doitnow'] = 'IMS Enterprise Import jetzt durchführen';
$string['enrolname'] = 'IMS-Datei';
$string['filelockedmail'] = 'Die Textdatei ($a), die für das IMS-Datei-basierte Kurs-Anmeldeverfahren genutzt wird, konnte vom Cron-Prozess nicht gelöscht werden. Das bedeutet normalerweise, dass die Dateirechte fehlerhaft sind. Bitte prüfen Sie die Rechte, damit Moodle die Datei löschen kann. Andernfalls wird der Vorgang immer wiederholt.';
$string['filelockedmailsubject'] = 'Wichtiger Fehler: Anmeldedatei';
$string['fixcasepersonalnames'] = 'Namen in Groß-/Kleinschreibung ändern';
$string['fixcaseusernames'] = 'Nutzernamen in Kleinbuchstaben umwandeln';
$string['imsrolesdescription'] = 'Die IMS Enterprise Spezifikation umfasst acht verschiedene Rollen. Legen Sie bitte fest, wie diese Rollen in Moodle angewendet und welche ggf. ignoriert werden sollen.';
$string['location'] = 'Speicherort für IMS-Datei';
$string['logtolocation'] = 'Speicherort für Logdatei (leer lassen, um keine Logs zu erstellen)';
$string['mailadmins'] = 'Administrator/innen per E-Mail benachrichtigen';
$string['mailusers'] = 'Nutzer/innen per E-Mail benachrichtigen';
$string['miscsettings'] = 'Verschiedenes';
$string['processphoto'] = 'Nutzerfoto zu Profil hinzufügen';
$string['processphotowarning'] = 'Warnung: Die Bildverarbeitung stellt hohe Anforderungen an die Leistung des Servers. Es wird empfohlen, diese Funktion nicht zu nutzen, wenn eine große Zahl von Nutzer/innen auf diesem Wege ins System integriert werden soll.';
$string['restricttarget'] = 'Daten nur verarbeiten, wenn das folgende Ziel angegeben ist';
$string['sourcedidfallback'] = '\"sourcedid\" statt \"userid\" für die Nutzer-ID verwenden, wenn das Feld \"userid\" nicht gefunden wird';
$string['truncatecoursecodes'] = 'Kurscode nach dieser Zeichenzahl abschneiden';
$string['usecapitafix'] = 'Box anklicken, wenn \"Großbuchstaben\" verwendet werden (XML-Format ist fehlerhaft)';
$string['usersettings'] = 'Nutzerdateneinstellungen';
$string['zeroisnotruncation'] = '0 bedeutet nicht abschneiden';

?>
