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
 * Strings for component 'enrol_imsenterprise', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Nachdem Sie die Einstellungen gespeichert haben, können Sie folgendes tun:';
$string['allowunenrol'] = 'IMS-Datei das <strong>Löschen</string> von Teilnehmer/innen bzw. Trainer/innen erlauben';
$string['allowunenrol_desc'] = 'Wenn diese Option aktiviert ist, werden Kurseineinschreibungen aufgehoben, wenn dies in der IMS-Enterprise-Datei eingetragen ist. ';
$string['basicsettings'] = 'Grundeinstellungen';
$string['coursesettings'] = 'Kurseinstellungen';
$string['createnewcategories'] = 'Neue (verborgene) Kurskategorien anlegen, wenn nicht in Moodle gefunden';
$string['createnewcategories_desc'] = 'Wenn das <org><orgunit> Element in der importierten Datei enthalten ist, wird es benutzt um einen Kurs einer Kurskategorie zuzuordnen, sofern der Kurs neu angelegt wird. Bereits bestehende Kurse werden dadurch NICHT verschoben.
Wenn keine Kategorie mit dem Namen existiert wird diese neu als verborgene Kategorie angelegt.';
$string['createnewcourses'] = 'Erstelle neue (verborgene) Kurse, wenn nicht in Moodle gefunden';
$string['createnewcourses_desc'] = 'Funktion: Das IMS-Einschreibungsplugin kann neue Kurse anlegen wenn es diese in der IMS Datei, nicht aber in der Moodle-Datenbank findet. Jeder neue Kurs wird so angelegt, dasser für Teilnehmer nicht verfügbar ist. ';
$string['createnewusers'] = 'Erstelle neue Nutzerzugänge, wenn Nutzer noch nicht in Moodle registriert';
$string['createnewusers_desc'] = 'Die IMS Enterprise Einschreibungsdatei enthält in der Regel eine Reihe von Teilnehmern. Mit der Funktion kann für jeden Nutzer, der noch nicht in Moodle registriert ist, ein Account angelegt werden.
Teilnehmer werden zunächst aufgrund der ID-Nummer und dann nach dem Anmeldenamen in Moodle gesucht. Aus dem IMS Enterprise Plugin werden keine Kennwörter importiert. Hierfür wird die Nutzung eines Authentifizierungsplugin empfohlen.';
$string['cronfrequency'] = 'Häufigkeit des Prozesses';
$string['deleteusers'] = 'Nutzerzugänge löschen, wenn in IMS-Daten definiert';
$string['deleteusers_desc'] = 'Funktion: Mitden IMS Enterprise Einschreibungsdaten kann mann auch Nutzeraccounts löschen wenn der "recstatus" auf auf \'3\' gesetzt wird. In Moodle wird der Datensatz des Nutzers dann nicht gelöscht, sondern der Flag auf gelöscht gesetzt.';
$string['doitnow'] = 'IMS Enterprise Import jetzt durchführen';
$string['emptyattribute'] = 'Leer lassen';
$string['filelockedmail'] = 'Die Textdatei ({$a}), die für das IMS-Datei-basierte Kurs-Anmeldeverfahren genutzt wird, konnte vom Cron-Prozess nicht gelöscht werden. Das bedeutet normalerweise, dass die Dateirechte fehlerhaft sind. Bitte prüfen Sie die Rechte, damit Moodle die Datei löschen kann. Andernfalls wird der Vorgang immer wiederholt.';
$string['filelockedmailsubject'] = 'Wichtiger Fehler: Anmeldedatei';
$string['fixcasepersonalnames'] = 'Namen am Anfang groß schreiben';
$string['fixcaseusernames'] = 'Nutzernamen in Kleinbuchstaben umwandeln';
$string['ignore'] = 'Ignorieren';
$string['importimsfile'] = 'IMS Enterprisedatei importieren';
$string['imsrolesdescription'] = 'Die IMS Enterprise Spezifikation umfasst acht verschiedene Rollen. Legen Sie bitte fest, wie diese Rollen in Moodle angewendet und welche ggf. ignoriert werden sollen.';
$string['location'] = 'Speicherort für IMS-Datei';
$string['logtolocation'] = 'Speicherort für Logdatei (leer lassen, um keine Logs zu erstellen)';
$string['mailadmins'] = 'Administrator/innen per E-Mail benachrichtigen';
$string['mailusers'] = 'Nutzer/innen per E-Mail benachrichtigen';
$string['messageprovider:imsenterprise_enrolment'] = 'Mitteilung bei Einschreibung über IMS Enterprise';
$string['miscsettings'] = 'Verschiedenes';
$string['pluginname'] = 'IMS Enterprise Datei';
$string['pluginname_desc'] = 'IMS Enterprise-Datei';
$string['processphoto'] = 'Nutzerfoto zu Profil hinzufügen';
$string['processphotowarning'] = 'Warnung: Die Bildverarbeitung stellt hohe Anforderungen an die Leistung des Servers. Es wird empfohlen, diese Funktion nicht zu nutzen, wenn eine große Zahl von Nutzer/innen auf diesem Wege ins System integriert werden soll.';
$string['restricttarget'] = 'Daten nur verarbeiten, wenn das folgende Ziel angegeben ist';
$string['restricttarget_desc'] = 'Eine IMS Enterprise Datei kann für verschiedene Verwaltungssysteme eine Bildungseinrichtungen verwandt werden. Dazu wird in der IMS Enterprise Datei das Zielsystem im <target> Tag innerhalb des <properties> Tags festgelegt.
Meistens brauchen Sie sich hierüber keine Gedanken zu machen. Lassen Sie den Eintrag leer und Moodle verarbeitet die alle Daten aus der Datei. Andernfalls tragen Sie hier den Wert ein, der in der IMS-Enterprise Datei als Wert für Moodle in <targtet> verwendet wird. ';
$string['roles'] = 'Rollen';
$string['settingfullname'] = 'IMS Beschreibungs-Tag für den vollständigen Kursnamen';
$string['settingfullnamedescription'] = 'Der Langtitel des Kurses ist ein Pflichtfeld. Das diesen enthaltende Beschreibungsfeld inder IMS Enterprise-Datei ist festzulegen.';
$string['settingshortname'] = 'IMS Beschreibungs-Tag für den kurzen Kursnamen';
$string['settingshortnamedescription'] = 'Der Kurztitel des Kurses ist ein Pflichtfeld. Das diesen enthaltende Beschreibungsfeld inder IMS Enterprise-Datei ist festzulegen.';
$string['settingsummary'] = 'IMS Beschreibungs-Tag für die Kursbeschreibung';
$string['settingsummarydescription'] = 'Dies ist ein optionales Feld. Es kann auf Wunsch leer bleiben.';
$string['sourcedidfallback'] = '"sourcedid" statt "userid" für die Nutzer-ID verwenden, wenn das Feld "userid" nicht gefunden wird';
$string['sourcedidfallback_desc'] = 'Im IMS Datensatz wird im <sourceid> Feld die dauerhafte persönliche ID -Bezeichnung des Nutzers aus dem Ursprungssystem hinterlegt.  Das <userid> Feld ist ein zusätzliches Feld und enthält einen ID Code mit dem der Nutzer sich einloggen kann. Manchmal - jedoch nicht immer - sind die Einträge identisch.

Einige Nutzerverwaltungssysteme haben Probleme beim Export des <userid> Feldes. In solch einem Fall aktivieren Sie diese Einstellung, damit Moodle den Inhalt des Feldes <sourceid> als Moodle Nutzer-ID verwendet. Ist das nicht der Fall, lassen Sie die Funktion deaktiviert.';
$string['truncatecoursecodes'] = 'Kurscode nach dieser Zeichenzahl abschneiden';
$string['truncatecoursecodes_desc'] = 'Manchmal ist es gewünscht die Länge des Kurscodes zu verkürzen. Geben Sie dazu hier einen Wert ein, der die maximale Länge des Kurscodes bestimmt. Andernfalls lassen Sie das Feld leer.';
$string['usecapitafix'] = 'Box anklicken, wenn "Großbuchstaben" verwendet werden (XML-Format ist fehlerhaft)';
$string['usecapitafix_desc'] = 'Nur für Nutzer des Teilnehmerverwaltungssystem CAPITA: Der XML Output von Capita enthält einen Fehler. Bei Verwendung von Capita sollte diese Einstellung deaktiviert sein.';
$string['usersettings'] = 'Nutzerdateneinstellungen';
$string['zeroisnotruncation'] = '0 bedeutet nicht abschneiden';
