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
 * Strings for component 'certificate', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   certificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addlinklabel'] = 'Weitere Aktivität anfügen';
$string['addlinktitle'] = 'Klicken Sie hier um eine weitere Aktivität anzufügen';
$string['areaintro'] = 'Zertifikat Einleitung';
$string['awarded'] = 'Ausgestellt';
$string['awardedto'] = 'Ausgestellt für';
$string['back'] = 'Zurück';
$string['border'] = 'Ränder';
$string['borderblack'] = 'Schwarz';
$string['borderblue'] = 'Blau';
$string['borderbrown'] = 'Braun';
$string['bordercolor'] = 'Randlinien';
$string['bordercolor_help'] = 'Da eingefügte Bilder die Größe der PDF-Datei sehr vergrößern können, empfehlen wir Ihnen, eher Linien statt ein Bild zur Begrenzung des Zertifikats zu wählen. (Vergewissern Sie sich, dass die Option Rahmen auf Nein gesetzt ist.)  Die Option Randlinie wird eine nette Graphik aus drei wählbaren Farben zum Zertifikat hinzufügen.';
$string['bordergreen'] = 'Grün';
$string['borderlines'] = 'Linien';
$string['borderstyle'] = 'Rahmen';
$string['borderstyle_help'] = 'Die  Option Rahmen erlaubt es Ihnen, ein Bild aus dem Verzeichnis certificate/pix/borders auszuwählen. Wählen Sie entweder einen Dateinamen aus oder keinen Rahmen. Sie können diese Option auch dazu nutzen, Hintergrundbilder einzubetten, die im Verzeichnis certificate/pix/borders hinterlegt wurden.';
$string['certificate'] = 'Zugangscode eingeben';
$string['certificate:addinstance'] = 'Zertifikatsinstanz hinzufügen';
$string['certificate:manage'] = 'Zertifikatsinstanz verwalten';
$string['certificatename'] = 'Name des Zertifikats';
$string['certificate:printteacher'] = 'Diese Namen werden als Kursleitung auf dem Zertifikat aufgeführt, wenn die Einstellung \'Kursleitung drucken\' aktiviert ist.';
$string['certificatereport'] = 'Bericht';
$string['certificatesfor'] = 'Zertifikate für';
$string['certificate:student'] = 'Zertifikat zurückziehen';
$string['certificatetype'] = 'Vorlage';
$string['certificatetype_help'] = 'Diese Einstellungen legen das Layout des Zertifikats fest. Es sind vier Standardformate des Zertifikats möglich:
- A4 Embedded ist druckbar auf A4-Papier mit eingebetteten Schriften
- A4 Non-Embedded ist druckbar auf A4-Papier ohne eingebettete Schriften
- Letter Embedded ist druckbar auf Letter-Papier mit eingebetteten Schriften
- Letter Non-Embedded ist druckbar auf Letter-Papier ohne eingebettete Schriften

Zertifikate ohne eingebettete Schriften verwenden die Schriftarten Helvetica und Times.

Falls Sie denken, dass die Nutzer/innen diese Schriftarten auf ihrem Computer haben bzw. wenn Ihre Sprache besondere Zeichen oder Symbole verwendet, benutzen Sie die Embedded-Formate mit eingebetteten Schriften. Hierfür werden die Schriftarten Dejavusans und Dejavuserif in die Zertifikate eingebunden, wobei die PDF-Dateien erheblich größer werden.

Sie können auch eigene Formate hinzufügen, wobei Sie aber Dateien auf dem Server ergänzen und die Sprachdatei müssen.';
$string['certificate:view'] = 'Zertifikat anzeigen';
$string['certify'] = 'Hiermit wird bescheinigt';
$string['code'] = 'Seriennummer';
$string['completiondate'] = 'Abschluss des Kurses';
$string['course'] = 'Für';
$string['coursegrade'] = 'Kursbewertung';
$string['coursename'] = 'Kurs';
$string['coursetimereq'] = 'Mindestzeit im Kurs (Minuten)';
$string['coursetimereq_help'] = 'Diese Option legt die Mindestzeit (in Minuten) fest, die Teilnehmer/innen im Kurs angemeldet sein müssen, bevor sie das Zertifikat erhalten können.';
$string['credithours'] = 'Anzurechnende Stunden';
$string['customtext'] = 'eigener Text';
$string['customtext_help'] = 'Wenn Sie anstelle der Trainer/innen andere Namen für die Kursleitung ins Zertifikat aufnehmen möchten, können Sie diese hier eingeben. Sie sollten in diesem Fall allerdings die Option \'Name der Kursleitung\' deaktivieren.
Der hier eingegebene Text erscheint in der linken unteren Ecke des Zertifikats.
Sie können folgende HTML-Tags verwenden um den Text zu formatieren: &lt;br&gt;, &lt;p&gt;, &lt;b&gt;, &lt;i&gt;, &lt;u&gt;, &lt;img&gt; (src und width (oder height) sind verpflichtend), &lt;a&gt; (href ist verpflichtend), &lt;font&gt; (Mögliche Attribute sind: color, (hex color code), face, (arial, times, courier, helvetica, symbol)).';
$string['date'] = 'An';
$string['datefmt'] = 'Datumsformat';
$string['datefmt_help'] = 'Wählen Sie hier das Format für das Datum, das ins Zertifikat aufgenommen werden soll. Im Fall der Option \'Standard\' wird das Datum im gebräuchlichen Format der gewählten Sprache gedruckt.';
$string['datehelp'] = 'Datum';
$string['deletissuedcertificates'] = 'Ausgestellte Zertifikate löschen';
$string['delivery'] = 'Zustellung';
$string['delivery_help'] = 'Wählen Sie, wie das Zertifikat zugestellt werden soll:
In neuem Fenster öffnen.
Download erzwingen.
E-Mail: Als E-Mail-Anhang zuschicken.
Nachdem Empfang des Zertifikats wird ein Link mit dem zugehörigen Datum angezeigt.';
$string['designoptions'] = 'Einstellungen des Designs';
$string['download'] = 'Download erzwingen';
$string['emailcertificate'] = 'E-Mail (Option Speichern erforderlich!)';
$string['emailothers'] = 'weitere Benachrichtigungen';
$string['emailothers_help'] = 'Geben Sie hier kommagetrennte E-Mail-Adressen von Personen ein, die benachrichtigt werden sollen, wenn Teilnehmer/innen ihr Zertifikat abrufen.';
$string['emailstudenttext'] = 'Im Anhang finden Sie Ihr Zertifikat für {$a->course}.';
$string['emailteachermail'] = '{$a->student} hat das Zertifikat abgerufen: \'{$a->certificate}\'
für {$a->course}.

Sie können es hier ansehen:

    {$a->url}';
$string['emailteachermailhtml'] = '{$a->student} hat das Zertifikat abgerufen: \'<i>{$a->certificate}</i>\'
für {$a->course}.

Sie können es hier ansehen:

    <a href="{$a->url}">Bericht zu den Zertifikaten</a>.';
$string['emailteachers'] = 'Kursleitung benachrichtigen';
$string['emailteachers_help'] = 'Wenn diese Option aktiviert ist, findet jedesmal eine Benachrichtigung statt, wenn Teilnehmer/innen ihr Zertifikat abrufen.';
$string['entercode'] = 'Zur Bestätigung den Zugangscode erneut eingeben';
$string['getcertificate'] = 'Zertifikat';
$string['grade'] = 'Bewertung';
$string['gradedate'] = 'Datum der Bewertung';
$string['gradefmt'] = 'Art der Bewertung';
$string['gradefmt_help'] = 'Sie können zwischen drei verschiedenen Formaten von Bewertungen  wählen:

Prozentuale Bewertung.
Bewertung nach Punkten.
Bewertung nach Noten (A,B,C,... || 1,2,3,...) orientiert an den Prozenten.';
$string['gradeletter'] = 'Note';
$string['gradepercent'] = 'Prozent';
$string['gradepoints'] = 'Punktzahl';
$string['imagetype'] = 'Bildtyp';
$string['incompletemessage'] = 'Um das Zertifikat herunterladen zu können, müssen Sie zuerst alle angezeigten Aufgaben erfolgreich bearbeiten. Bitte gehen Sie zur Hauptseite des Kurses zurück und vervollständigen Sie die Aufgaben.';
$string['intro'] = 'Einführung';
$string['issued'] = 'Ausgestellt';
$string['issueddate'] = 'Ausstellungsdatum';
$string['issueoptions'] = 'Optionen der Ausstellung';
$string['landscape'] = 'Querformat';
$string['lastviewed'] = 'Sie haben das Zertifikat zuletzt abgerufen am';
$string['letter'] = 'Letter';
$string['lockingoptions'] = 'Zugangsbeschränkungen';
$string['modulename'] = 'Zertifikat';
$string['modulenameplural'] = 'Zertifikate';
$string['mycertificates'] = 'Meine Zertifikate';
$string['nocertificates'] = 'Sie bewerben sich bisher nicht um Zertifikate.';
$string['nocertificatesissued'] = 'Sie haben noch keine Zertifikate erworben.';
$string['nocertificatesreceived'] = 'hat noch kein Zertifikat erhalten.';
$string['nofileselected'] = 'Sie müssen eine Datei zum Hochladen auswählen!';
$string['nogrades'] = 'Keine Bewertungen verfügbar';
$string['notapplicable'] = 'N/A';
$string['notfound'] = 'Die Anzahl der Zertifikate konnte nicht ermittelt werden.';
$string['notissued'] = 'Nicht ausgestellt';
$string['notissuedyet'] = 'Noch nicht ausgestellt';
$string['notreceived'] = 'Sie haben dieses Zertifikat noch nicht abgerufen.';
$string['openbrowser'] = 'In neuem Fenster öffnen';
$string['opendownload'] = 'Klicken Sie auf den Button unten um Ihr Zertifikat auf Ihrem Rechner zu speichern.';
$string['openemail'] = 'Klicken Sie auf die Taste unten, um Ihr Zertifikat in einer E-Mail zugesandt zu bekommen.';
$string['openwindow'] = 'Klicken Sie auf die Taste unten, um Ihr Zertifikat in einem neuen Fenster zu öffnen.';
$string['or'] = 'oder';
$string['orientation'] = 'Ausrichtung';
$string['orientation_help'] = 'Wählen Sie Hochformat oder Querformat für das Zertifikat aus.';
$string['pluginadministration'] = 'Zertifikat-Administration';
$string['pluginname'] = 'Zertifikat';
$string['portrait'] = 'Hochformat';
$string['printdate'] = 'Vergabedatum';
$string['printdate_help'] = 'Bei Aktivierung dieser Option wird das \'Vorgabedatum\' ins Zertifikat aufgenommen. Wenn \'Kursabschluss\' ausgewählt wurde, wird das Datum des Kursabschlusses ins Zertifikat aufgenommen. Wenn zwar \'Kursabschluss\' ausgewählt wurde, aber zum Ausstellungszeitpunkt kein Abschluss der Aufgaben erfolgt ist, wird das Datum der Ausstellung ins Zertifikat aufgenommen. Sie können auch das Datum der Bewertung auswählen. Falls ein Zertifikat ausgestellt wird, bevor die entsprechende Aktivität bewertet wurde, wird auch hier das Datum der Ausstellung ins Zertifikat aufgenommen.';
$string['printerfriendly'] = 'Druckansicht';
$string['printgrade'] = 'Bewertung ausgeben';
$string['printgrade_help'] = 'Sie können jede beliebige Bewertung aus dem Kurs ins Zertifikat aufnehmen lassen, solange Sie im tabellarischen Überblick über alle Bewertungen aufgelistet wird.';
$string['printhours'] = 'Arbeitsaufwand';
$string['printhours_help'] = 'Geben Sie hier den Arbeitsaufwand in Stunden ein, den Sie für die Bewältigung des Kurses veranschlagt haben.';
$string['printnumber'] = 'Seriennummer einfügen';
$string['printnumber_help'] = 'Eine eindeutige zehnstellige Seriennummer kann in das Zertifikat aufgenommen werden. Die Seriennummer wird auch in den Berichten zur Ausstellung der Zertifikate aufgeführt und kann dort verglichen werden.';
$string['printoutcome'] = 'Lernziel';
$string['printoutcome_help'] = 'Sie können eine Kompetenz und die erreichte Stufe in das Zertifikat aufnehmen lassen. Ein Beispiel wäre: \'Kommunikation mit modernen Medien: Fortgeschritten\'.  Lernziele oder Kompetenzen müssen plattformweit aktiviert und definiert werden, anschließend ist eine Bewertung auf der gesamten Website möglich.';
$string['printseal'] = 'Siegel oder Logo';
$string['printseal_help'] = 'Diese Option erlaubt es das Bild eines Siegels im Zertifikat einzufügen. Standardmäßig wird das Siegel in die rechte untere Ecke gesetzt.';
$string['printsignature'] = 'Unterschrift';
$string['printsignature_help'] = 'Diese Option erlaubt es das Bild einer Unterschrift einzufügen. Standardmäßig wird die Unterschrift in die linke untere Ecke gesetzt.';
$string['printteacher'] = 'Kursleitung drucken';
$string['printteacher_help'] = 'Standardmäßig werden die Trainer/innen des Kurses als Kursleitung aufgeführt.

Um spezielle Namen im Zertifikat einzufügen, ordnen Sie den entsprechenden Personen die Trainerrolle auf Modulebene zu. Eine solche Zuordnung ist notwendig, falls Sie mehrere Personen die Trainerrolle im Kurs haben oder wenn andere Personen auf dem Zertifikat vermerkt sein sollen.';
$string['printwmark'] = 'Wasserzeichen';
$string['printwmark_help'] = 'Ein Wasserzeichen kann im Hintergrund der Zertifikate als durchscheinendes Zeichen eingebunden werden. Sie können ein Logo, ein Siegel, ein Wappen oder auch einen Schriftzug verwenden.';
$string['receivedcerts'] = 'Ausgestellte Zertifikate';
$string['receiveddate'] = 'Ausstellungsdatum';
$string['removecert'] = 'Ausgestellte Zertifikate löschen';
$string['report'] = 'Bericht';
$string['reportcert'] = 'Berichte über Zertifikate';
$string['reportcert_help'] = 'Bei Aktivierung dieser Option werden alle Daten, die Teil des Zertifikats sind, auch im Bericht zu den Zertifikaten angezeigt.';
$string['requiredtimenotmet'] = 'Sie müssen eine Mindestzeit von {$a->requiredtime} Minuten im Kurs angemeldet sein, bevor Sie auf dieses Zertifikat zugreifen können.';
$string['requiredtimenotvalid'] = 'Die Mindestzeit muss eine Zahl größer als 0 sein.';
$string['reviewcertificate'] = 'Zertifikat nochmals abrufen';
$string['savecert'] = 'Zertifikate speichern';
$string['savecert_help'] = 'Bei Aktivierung dieser Option wird von jedem ausgestellten Zertifikat eine Kopie gespeichert.';
$string['seal'] = 'Siegel';
$string['sigline'] = 'Linie';
$string['signature'] = 'Unterschrift';
$string['statement'] = 'hat teilgenommen am Lehrgang';
$string['summaryofattempts'] = 'Auflistung über ausgestellte Zertifikate';
$string['textoptions'] = 'Text Optionen';
$string['title'] = 'Zertifikat';
$string['to'] = 'Ausgestellt für';
$string['typeA4_embedded'] = 'A4 Embedded';
$string['typeA4_non_embedded'] = 'A4 Non-Embedded';
$string['typeletter_embedded'] = 'Letter Embedded';
$string['typeletter_non_embedded'] = 'Letter Non-Embedded';
$string['unsupportedfiletype'] = 'Die Datei muss ein Bild im Format jpg oder png sein.';
$string['uploadimage'] = 'Bild hochladen';
$string['uploadimagedesc'] = 'Über diese Taste gelangen Sie auf eine neue Seite, wo Sie Ihre Bilder hochladen können.';
$string['userdateformat'] = 'Standard';
$string['validate'] = 'Überprüfen';
$string['verifycertificate'] = 'Zertifikat überprüfen';
$string['viewcertificateviews'] = 'Ausgestellte Zertifikate: {$a}';
$string['viewed'] = 'Sie haben das Zertifikat erhalten am';
$string['viewtranscript'] = 'Zertifikate anzeigen';
$string['watermark'] = 'Wasserzeichen';
