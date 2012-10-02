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
 * Strings for component 'scorm', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Aktivierung';
$string['activityloading'] = 'Sie werden automatisch zur Aktivität weitergeleitet:';
$string['activitypleasewait'] = 'Aktivität wird geladen. Bitte warten ....';
$string['adminsettings'] = 'Admin-Einstellungen';
$string['advanced'] = 'Einstellungen';
$string['aicchacpkeepsessiondata'] = 'AICC HACP Sessiondaten';
$string['aicchacpkeepsessiondata_desc'] = 'Speicherdauer in Tagen für externe AICC HACP Sessiondaten (ein hoher Wert speichert viele Daten in der Datenbnaktabelle, kann jedoch zum debuggen hilfreich sein.';
$string['aicchacptimeout'] = 'AICC HACP Timeout';
$string['aicchacptimeout_desc'] = 'Länge in Minuten, die eine externe AICC HACP Session offen bleiben darf';
$string['allowapidebug'] = 'API debug und tracing aktivieren (Capture Maske mit apidebumask einrichten)';
$string['allowtypeaicchacp'] = 'Externe AICC HACP aktivieren';
$string['allowtypeaicchacp_desc'] = 'Die Aktivierung ermöglicht AICC HACP die externe Kommunikation ohne ein Nutzerlogin zu benötigen, um Anfragen des externen AICC Pakets zu verarbeiten.';
$string['allowtypeexternal'] = 'Externen Pakettyp aktivieren';
$string['allowtypeexternalaicc'] = 'Direkte AICC URL aktivieren';
$string['allowtypeexternalaicc_desc'] = 'Ermöglicht den direkten Aufruf über eine URL auf ein einfaches AICC Paket.';
$string['allowtypeimsrepository'] = 'IMS Pakettyp aktivieren';
$string['allowtypelocalsync'] = 'Download Paketyp aktivieren';
$string['apidebugmask'] = 'API Debug Capture Mask (simple regex on <username>:<activityname>) z.B. admin:* zeigt die Debugmitteilungen nur für den Nutzer admin';
$string['areacontent'] = 'Inhaltsdateien';
$string['areapackage'] = 'Paketdatei';
$string['asset'] = 'Anlage';
$string['assetlaunched'] = 'Anlage gesehen';
$string['attempt'] = 'Versuch';
$string['attempt1'] = '1 Versuch';
$string['attempts'] = 'Versuche';
$string['attemptsx'] = '{$a} Versuche';
$string['attr_error'] = 'Falscher Wert für das Attribut ({$a->attr}) im Tag {$a->tag}';
$string['autocontinue'] = 'Automatische Fortsetzung';
$string['autocontinuedesc'] = 'Diese Einstellung setzt die standardmäßige automatische Fortsetzung für diese Aktivität';
$string['autocontinue_help'] = 'Wenn die Option aktiviert ist, wird nach dem Bearbeiten eines Lernobjekts automatisch das nächste verfügbare Lernobjekt aufgerufen. Andernfalls muss eine Taste \'Weiter\' benutzt werden.';
$string['averageattempt'] = 'Durchschnitt';
$string['badmanifest'] = 'Einige Fehler im Manifest gefunden: siehe Fehlerprotokoll';
$string['badpackage'] = 'Mit dem genutzten Lernpaket sind Probleme aufgetreten. Prüfen Sie bitte das Lernpaket und versuchen Sie es noch einmal.';
$string['browse'] = 'Vorschau';
$string['browsed'] = 'Durchsucht';
$string['browsemode'] = 'Vorschaumodus';
$string['browserepository'] = 'Repository durchsuchen';
$string['cannotfindsco'] = 'SCO konnte nicht gefunden werden';
$string['chooseapacket'] = 'Auswählen/aktualisieren eines Pakets';
$string['completed'] = 'Abgeschlossen';
$string['completionscorerequired'] = 'Mindestpunkte notwendig';
$string['completionscorerequired_help'] = 'Wenn diese Option aktiviert ist, müssen Teilnehmer/innen neben anderen Anforderungen auch die angegebene Mindestpunkte erreichen, um dieses Lernpaket als \'abgeschlossen\' markieren zu können.';
$string['completionstatus_completed'] = 'Erledigt';
$string['completionstatus_passed'] = 'Durchlaufen';
$string['completionstatusrequired'] = 'Status erforderlich';
$string['completionstatusrequired_help'] = 'Wenn Sie einen oder mehrere Punkte anwählen, müssen Teilnehmer/innen neben anderen Anforderungen auch mindestens einen dieser Punkte erledigen, um dieses Lernpaket als \'abgeschlossen\' markieren zu können.';
$string['confirmloosetracks'] = 'Warnung: Das Lernpaket scheint verändert worden zu sein. Evtl. ist die Paketstruktur geändert worden. Beim Update könnten Protokolldaten der Nutzer/innen verloren gehen.';
$string['contents'] = 'Inhalte';
$string['coursepacket'] = 'Lernpaket';
$string['coursestruct'] = 'Kursstruktur';
$string['currentwindow'] = 'Aktuelles Fenster';
$string['datadir'] = 'Dateisystemfehler: Das Verzeichnis für Kursdaten konnte nicht erstellt werden';
$string['defaultdisplaysettings'] = 'Standardmäßige Anzeigeeinstellungen';
$string['defaultgradesettings'] = 'Standardmäßige Bewertungseinstellungen';
$string['defaultothersettings'] = 'Weitere Standardeinstellungen';
$string['deleteallattempts'] = 'Alle Versuche im Lernpaket löschen';
$string['deleteattemptcheck'] = 'Sind Sie wirklich sicher, dass Sie diese Versuche vollständig löschen möchten?';
$string['deleteuserattemptcheck'] = 'Sind Sie sich wirklich sicher, dass alle Versuche gelöscht werden sollen?';
$string['details'] = 'Trackingdetails';
$string['directories'] = 'Verzeichnislinks anzeigen';
$string['disabled'] = 'Deaktiviert';
$string['display'] = 'Lernpaket anzeigen';
$string['displayattemptstatus'] = 'Status der Versuche anzeigen';
$string['displayattemptstatusdesc'] = 'Diese Einstellung setzt den Standardwert für die Einstellung "Status der Versuche anzeigen"';
$string['displayattemptstatus_help'] = '<h2>Anzeige der durchgeführten Versuche</h2>

<p>Zeigt den Status der Versuche im Lernpaket für die Teilnehmer/innen an. Angezeigt werden Versuche, Bewertung und die in den Bewertungsbereich übergebenen Punkte (bei mehreren Versuchen)</p>';
$string['displaycoursestructure'] = 'Kursstruktur anzeigen';
$string['displaycoursestructuredesc'] = 'Diese Option setzt den Standardwert für Einstellung "Kursstruktur anzeigen" auf der Startseite';
$string['displaycoursestructure_help'] = 'Wenn diese Option aktiviert ist, wird die Inhaltsstruktur des Lernpakets neben dem Inhalt angezeigt.';
$string['displaydesc'] = 'Diese Einstellung setzt den Standardwert für die Einstellung ob ein Lernpaket für eine Aktivität angezeigt werden soll oder nicht.';
$string['displaysettings'] = 'Anzeigeeinstellungen';
$string['dnduploadscorm'] = 'Lernpaket hinzufügen';
$string['domxml'] = 'DOMXML externe Bibliothek';
$string['duedate'] = 'Termin';
$string['element'] = 'Element';
$string['elementdefinition'] = 'Elementdefinition';
$string['enter'] = 'Start';
$string['entercourse'] = 'Lernpaket starten';
$string['errorlogs'] = 'Fehlerprotokoll';
$string['everyday'] = 'Jeden Tag';
$string['everytime'] = 'Alle Nutzungszeiten';
$string['exceededmaxattempts'] = 'Sie haben die Höchstzahl der Versuche erreicht.';
$string['exit'] = 'Lernpaket beenden';
$string['exitactivity'] = 'Abbrechen';
$string['expired'] = 'Entschuldigung, die Aktivität wurde am {$a} geschlossen und ist nicht länger verfügbar';
$string['external'] = 'Externe Paket-Zeitnahme benutzen';
$string['failed'] = 'Fehlgeschlagen';
$string['finishscorm'] = 'Haben Sie das Material lange genug angesehen?';
$string['finishscormlinkname'] = 'Zurück zur Kursseite';
$string['firstaccess'] = 'Erster Zugang';
$string['firstattempt'] = 'Erster Versuch';
$string['forcecompleted'] = 'Abschluss einfordern';
$string['forcecompleteddesc'] = 'Diese Einstellung setzt den Standardwert für die Einstellung "Abschluss einfordern"';
$string['forcecompleted_help'] = 'Mit dieser Einstellung \'Abschluss einfordern\' wird sicher gestellt, dass ein Versuch als \'abgeschlossen\' registriert wird. Dies funktioniert nur mit SCORM 1.2. Die Option sollte aktiviert werden, falls das Lernpaket den wiederholten Aufruf (im Modus Wiederholen oder Durchblättern) nicht richtig verarbeitet. Andernfalls erhalten Sie falsche Angaben zum Status \'Abgeschlossen\'.';
$string['forcejavascript'] = 'Zur Aktivierung von JavaScript auffordern';
$string['forcejavascript_desc'] = 'Lernpakete erfordern im Browser Javascript zur Kommunikation zwischen dem Lernpaket und Moodle, z.B. um Bewertungen zu übergeben. Mit dieser Funktion wird der Zugriff auf ein Lernpaket unterbunden, wenn JavaScript nicht verfügbar ist. Es wird empfohlen, diese Funktion zu aktivieren.';
$string['forcejavascriptmessage'] = 'Um dieses Objekt anzuzeigen ist JavaScript notwendig. Bitte aktivieren Sie JavaScript für Ihren Browser und versuchen Sie es nochmal.';
$string['forcenewattempt'] = 'Neuen Versuch erzwingen';
$string['forcenewattemptdesc'] = 'Diese Einstellung setzt den Standardwert für die Einstellung "Neuen Versuch erzwingen"';
$string['forcenewattempt_help'] = '<h2>Neuen Versuch erzwingen</h2>

<p>Jeder neue Aufruf des Lernpakets wird als neuer Versuch betrachtet. Auch wenn der vorherige Versuch nicht abgeschlossen wurde.</p>';
$string['found'] = 'Manifest gefunden';
$string['frameheight'] = 'Die Einstellung definiert die Höhe der Darstellung.';
$string['framewidth'] = 'Die Einstellung definiert die Breite der Darstellung.';
$string['fullscreen'] = 'Auf Bildschirmgröße anpassen';
$string['general'] = 'Grunddaten';
$string['gradeaverage'] = 'Durchschnittsnote';
$string['gradeforattempt'] = 'Bewertung für Versuch';
$string['gradehighest'] = 'Höchstnote';
$string['grademethod'] = 'Bewertungsmethode';
$string['grademethoddesc'] = 'Diese Einstellung setzt die Standardbewertungsmethode für eine Aktivität';
$string['grademethod_help'] = 'Die Bewertungsmethoden legen fest, wie ein Versuch ausgewertet wird:

* Zahl der Lernobjekte - Zahl der abgeschlossenen bzw. erfolgreichen Lernobjekte
* Höchstbewertung - Die höchste Bewertung der erfolgreichen Lernobjekte wird übernommen
* Durchschnitt - Die Durchschnittswerte aller Bewertungen werden errechnet
* Summe der Bewertungen - Alle erreichten Bewertungen werden summiert';
$string['gradereported'] = 'Bewertung veröffentlicht';
$string['gradescoes'] = 'Zahl der Lernobjekte';
$string['gradesettings'] = 'Bewertungseinstellungen';
$string['gradesum'] = 'Summe der Bewertungen';
$string['height'] = 'Höhe';
$string['hidden'] = 'Verborgen';
$string['hidebrowse'] = 'Vorschau deaktivieren';
$string['hidebrowsedesc'] = 'Diese Einstellung legt fest, ob eine Vorschau angezeigt wird oder nicht.';
$string['hidebrowse_help'] = 'Der Vorschaumodus erlaubt es, eine Aktivität von dem Abgeben noch einmal anzusehen. Wenn die Vorschau deaktiviert ist, wird die Taste \'Vorschau\' nicht angezeigt.';
$string['hideexit'] = 'Taste \'Beenden\' verbergen';
$string['hidenav'] = 'Navigationstasten verbergen';
$string['hidenavdesc'] = 'Diese Einstellung legt fest, ob Navigationstasten angezeigt werden oder nicht';
$string['hidereview'] = 'Taste \'Wiederholen\' verbergen';
$string['hidetoc'] = 'Kursstruktur anzeigen';
$string['hidetocdesc'] = 'Diese Einstellung bestimmt, ob die Kursstruktur (Inhaltsverzeichnis) angezeigt wird oder nicht';
$string['hidetoc_help'] = 'Diese EInstellung legt fest, wie das Inhaltsverzeichnis im SCORM-Player angezeigt wird.';
$string['highestattempt'] = 'Bester Versuch';
$string['identifier'] = 'Fragen-ID';
$string['incomplete'] = 'Unvollständig';
$string['info'] = 'Info';
$string['interactions'] = 'Interaktionen';
$string['interactionscorrectcount'] = 'Zahl der richtigen Antworten für die Frage';
$string['interactionsid'] = 'ID des Elements';
$string['interactionslatency'] = 'Verstrichene Zeit zwischen der Anzeige der Seite<br />und der ersten Beantwortung durch den Teilnehmer.';
$string['interactionslearnerresponse'] = 'Antwort des Teilnehmers';
$string['interactionspattern'] = 'Muster für richtige Antwort';
$string['interactionsresponse'] = 'Antwort des Teilnehmers';
$string['interactionsresult'] = 'Ergebnis auf Grundlage der Teilnehmerantwort <br />und dem richtifgen Ergebnis';
$string['interactionsscoremax'] = 'Höchstwert für den Rohwert der Bewertung';
$string['interactionsscoremin'] = 'Mindestwert für den Rohwert zur Bewertung';
$string['interactionsscoreraw'] = 'Die Zahl stellt die Leistung eines Lerners <br />auf einer Skala dar.';
$string['interactionssuspenddata'] = 'Platz zum Speichern und Wiederfinden von Daten<br />zwischen den Sessions der Teilnehmer';
$string['interactionstime'] = 'Zeitpunkt zu dem Versuch gestartet wurde';
$string['interactionstype'] = 'Fragetyp';
$string['interactionsweight'] = 'Gewichtung des Elements';
$string['invalidactivity'] = 'Aktivität im Lernpaket ist falsch';
$string['invalidhacpsession'] = 'Ungültige HACP Session';
$string['invalidmanifestresource'] = 'Warnung: folgende Ressourcen wurden im Manifest referenziert, konnten jedoch nicht gefunden werden:';
$string['invalidurl'] = 'Ungültige URL angegeben';
$string['last'] = 'Letzter Versuch am';
$string['lastaccess'] = 'Letzter Versuch';
$string['lastattempt'] = 'Letzter vollständiger Versuch';
$string['lastattemptlock'] = 'Nach letztem Versuch sperren';
$string['lastattemptlockdesc'] = 'Diese Option legt fest, ob die Aktivität nach letztem Versuch für weitere Versuche gesperrt wird';
$string['lastattemptlock_help'] = 'Diese Option legt fest, ob Teilnehmer/innen nach dem Erreichen der Anzahl zulässiger Versuche weiter auf das Lernpaket zugreifen können oder ob der Zugriff zum Lernpaket nach dem letzten zulässigen Versuch gesperrt wird. Dazu muss ein Wert für die Anzahl der Versuche angegeben sein.';
$string['location'] = 'Adresse anzeigen';
$string['max'] = 'Höchstpunktzahl';
$string['maximumattempts'] = 'Zahl der Versuche';
$string['maximumattemptsdesc'] = 'Diese Einstellung legt die maximale Anzahl von Versuchen für eine Aktivität fest';
$string['maximumattempts_help'] = 'Diese Einstellung legt die maximale Anzahl der möglichen Versuche fest, was nur für Lernpakete im Format SCORM1.2 und AICC funktioniert.';
$string['maximumgradedesc'] = 'Diese Einstellung setzt den Standardwert für die maximale Bewertung einer Aktivität';
$string['menubar'] = 'Menüs anzeigen';
$string['min'] = 'Minimale Punktzahl';
$string['missing_attribute'] = 'Fehlende Attribute {$a->attr} im Tag {$a->tag}';
$string['missingparam'] = 'Ein Eintrag fehlt oder ist falsch.';
$string['missing_tag'] = 'Fehlendes Tag {$a->tag}';
$string['mode'] = 'Einstellung';
$string['modulename'] = 'Lernpaket';
$string['modulename_help'] = 'In einem Lernpaket sind die Inhalte meist über mehrere Seiten verteilt und werden über eine Navigation aufgerufen. Häufig sind Testfragen direkt integriert. Die Ergebnisse der Bearbeitung können in Moodle gespeichert werden.

Ein Lernpaket wird außerhalb von Moodle mit spezieller Autorensoftware erstellt und im Format SCORM gespeichert. SCORM ist ein Standard, der die plattformübergreifende Verwendbarkeit von webbasierten Lerninhalten anstrebt.';
$string['modulenameplural'] = 'Lernpakete';
$string['navigation'] = 'Navigation';
$string['newattempt'] = 'Neuen Versuch beginnen';
$string['next'] = 'Weiter';
$string['noactivity'] = 'Nichts zu berichten';
$string['noattemptsallowed'] = 'Zahl zulässiger Versuche';
$string['noattemptsmade'] = 'Zahl Ihrer Versuche';
$string['no_attributes'] = 'Tag {$a->tag} muss Attribute haben';
$string['no_children'] = 'Tag {$a->tag} muss Kinder (children) haben';
$string['nolimit'] = 'Unbegrenzte Zahl der Versuche';
$string['nomanifest'] = 'Zeichen nicht gefunden';
$string['noprerequisites'] = 'Sie haben die Zugangvoraussetzungen zu diesem Lernobjekt noch nicht erfüllt.';
$string['noreports'] = 'Kein Bericht zum Anzeigen vorhanden';
$string['normal'] = 'Normal';
$string['noscriptnoscorm'] = 'Ihr Browser unterstützt kein Javascript oder Javascript ist ausgeschaltet. Dieses Lernpaket wird deswegen nicht richtig angezeigt und kann Daten nicht korrekt speichern.';
$string['notattempted'] = 'Nicht versucht';
$string['not_corr_type'] = 'Falsche Schreibweise im Tag {$a->tag}';
$string['notopenyet'] = 'Entschuldigung, diese Aktivität ist nicht verfügbar bist {$a}';
$string['objectives'] = 'Ziele';
$string['optallstudents'] = 'alle Nutzer/innen';
$string['optattemptsonly'] = 'Nutzer/innen mit Versuchen';
$string['options'] = 'Einstellungen (von einigen Browsern nicht unterstützt)';
$string['optionsadv'] = 'Optionen (erweitert)';
$string['optionsadv_desc'] = 'Wenn die Option aktiviert ist, werden Fensteroptionen als erweiterte Einstellungen im Formular vorgenommen.';
$string['optnoattemptsonly'] = 'Nutzer/innen ohne Versuche';
$string['organization'] = 'Organisation';
$string['organizations'] = 'Organisationen';
$string['othersettings'] = 'Erweiterte Einstellungen';
$string['othertracks'] = 'Andere Tracks';
$string['package'] = 'Lernpaket';
$string['packagedir'] = 'Dateisystemfehler: Das Paketverzeichnis kann nicht erstellt werden';
$string['packagefile'] = 'Keine Lernpaket ausgewählt';
$string['package_help'] = 'Ein Lernpaket ist eine ZIP-Datei (oder eine PIF-Datei), die alle SCORM- oder AICC-Kursdefinitionen und Dateien enthält.';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Diese Einstellung ermöglicht die Eingabe einer URL für das Lernpaket, anstatt das Lernpaket in der Dateiauswahl auszusuchen.';
$string['page-mod-scorm-x'] = 'Jede Lernpaketseite';
$string['pagesize'] = 'Seitenzahl';
$string['passed'] = 'Abgeschlossen';
$string['php5'] = 'PHP 5 (DOMXML native library)';
$string['pluginadministration'] = 'Lernpaket-Administration';
$string['pluginname'] = 'Lernpaket';
$string['popup'] = 'In neuem Fenster';
$string['popupmenu'] = 'In einem Dropdown-Menü';
$string['popupopen'] = 'Lernpaket in neuem Fenster öffnen';
$string['popupsblocked'] = 'Es scheint so als ob Popup-Fenster blockiert sind. Das Lernpaket kann nicht angezeigt werden. Bitte prüfen Sie Ihre Browsereinstellungen, bevor Sie es noch einmal probieren.';
$string['position_error'] = 'Das Tag {$a-tag} kann nicht Kind (Child) des Tags {$a->parent} sein';
$string['preferencespage'] = 'Voreinstellungen für diese Seite';
$string['preferencesuser'] = 'Voreinstellungen für diese Übersicht';
$string['prev'] = 'Zurück';
$string['raw'] = 'Rohpunktwert';
$string['regular'] = 'Reguläres Manifest';
$string['report'] = 'Bericht';
$string['reportcountallattempts'] = '{$a->nbresults} Ergebnisse ({$a->nbattempts} Versuche von {$a->nbusers} Nutzer/innen)';
$string['reportcountattempts'] = '{$a->nbresults} Ergebnisse ({$a->nbusers} Nutzerinnen)';
$string['reports'] = 'Übersicht';
$string['resizable'] = 'Fenstergröße anpassbar';
$string['result'] = 'Ergebnis';
$string['results'] = 'Ergebnisse';
$string['review'] = 'Rückblick';
$string['reviewmode'] = 'Rückblick-Modus';
$string['scoes'] = 'Lernobjekte';
$string['score'] = 'Bewertung';
$string['scorm:addinstance'] = 'Neues Lernpaket hinzufügen';
$string['scormclose'] = 'Bis';
$string['scormcourse'] = 'Lernpaket-Kurs';
$string['scorm:deleteownresponses'] = 'Eigene Versuche löschen';
$string['scorm:deleteresponses'] = 'Versuche im Lernpaket löschen';
$string['scormloggingoff'] = 'API-Logdatei ausgeschaltet';
$string['scormloggingon'] = 'API-Logdatei eingeschaltet';
$string['scormopen'] = 'Öffnen';
$string['scormresponsedeleted'] = 'Versuche der Nutzer/innen löschen';
$string['scorm:savetrack'] = 'Trackingdaten speichern';
$string['scorm:skipview'] = 'Übersicht überspringen';
$string['scormtype'] = 'Typ';
$string['scormtype_help'] = 'Diese Einstellung legt fest, wie das Lernpaket in den Kurs eingebunden wird. Es gibt 4 Optionen: * Hochgeladenes Lernpaket - das Lernpaket kann über die Dateiauswahl ausgesucht werden * Externes SCORM Manifest - eine URL imsmanifest.xml muss angegeben werden. Hinweis: Falls diese URL einen anderen Domainnamen als Ihre Website besitzt, ist das \'Heruntergeladene Lernpaket\' die bessere Variante, da sonst Bewertungen nicht gespeichert werden. * Heruntergeladenes Lernpaket - eine URL zum Lernpaket muss angegeben werden. Das Lernpaket wird heruntergeladen, ausgepackt und lokal gespeichert. Sobald das externe Lernpaket aktualisiert wird, werden alle Änderungen lokal übernommen. * Lokales IMS Content Repository - das Lernpaket wird aus einem IMS-Repository ausgewählt *Externe AICC URL - Die URL führt zu einer extern abgelegten einzelnen AICC Aktivität. Ein \'Pseudo\'-Paket wird darum herum angelegt werden.';
$string['scorm:viewreport'] = 'Berichte sehen';
$string['scorm:viewscores'] = 'Bewertungen sehen';
$string['scrollbars'] = 'Scrollfunktion im Fenster bereitstellen';
$string['selectall'] = 'Alles auswählen';
$string['selectnone'] = 'Alles abwählen';
$string['show'] = 'Zeigen';
$string['sided'] = 'Auf der linken Seite';
$string['skipview'] = 'Übersicht überspringen';
$string['skipviewdesc'] = 'Diese Einstellung legt fest, ob die Übersicht einer Seite übersprungen werden kann.';
$string['skipview_help'] = 'Diese Einstellung legt fest, ob die Strukturübersicht einer Seite übersprungen werden kann (bzw. nicht angezeigt wird). Falls das Lernpaket nur ein Lernobjekt enthält, dann wird grundsätzlich keine Übersicht angezeigt.';
$string['slashargs'] = 'Achtung: Slash-Argumente sind für diese Website ausgeschaltet. Einige Objekte werden nicht wie erwartet funktionieren!';
$string['stagesize'] = 'Darstellungsgröße';
$string['stagesize_help'] = 'Diese beiden Einstellungen legen die Breite und die Höhe für die Darstellung eines Lernpakets fest.';
$string['started'] = 'Begonnen am';
$string['status'] = 'Status';
$string['statusbar'] = 'Statusanzeige';
$string['student_response'] = 'Antwort';
$string['subplugintype_scormreport'] = 'Übersicht';
$string['subplugintype_scormreport_plural'] = 'Übersicht';
$string['suspended'] = 'Ausgeschlossen';
$string['syntax'] = 'Schreibfehler';
$string['tag_error'] = 'Unbekanntes Tag ({$a->tag}) mit dem Inhalt: {$a->value}';
$string['time'] = 'Zeit';
$string['timerestrict'] = 'Eine Beantwortung ist in diesem Zeitraum nicht möglich.';
$string['title'] = 'Titel';
$string['toc'] = 'Inhaltsverzeichnis';
$string['toolbar'] = 'Toolbar anzeigen';
$string['too_many_attributes'] = 'Tag {$a->tag} hat zu viele Attribute';
$string['too_many_children'] = 'Tag {$a->tag} hat zu viele Kinder (children)';
$string['totaltime'] = 'Zeit';
$string['trackingloose'] = 'Achtung: Die Trackingdaten dieses Lernpaketes gehen verloren!';
$string['type'] = 'Typ';
$string['typeaiccurl'] = 'Externe AICC URL';
$string['typeexternal'] = 'Externe Lernpaket-Liste';
$string['typeimsrepository'] = 'Lokales IMS Content Repository';
$string['typelocal'] = 'Hochgeladenes Paket';
$string['typelocalsync'] = 'Heruntergeladenes Paket';
$string['unziperror'] = 'Beim Entpacken des Pakets ist ein Fehler aufgetreten.';
$string['updatefreq'] = 'Auto-Update-Häufigkeit';
$string['updatefreqdesc'] = 'Diese Einstellung setzt den Standardwert  für die Auto-Update-Häufigkeit einer Aktivität';
$string['updatefreq_help'] = 'Diese Option erlaubt dem externen Lernpaket, automatisch heruntergeladen und aktualisiert zu werden';
$string['validateascorm'] = 'Überprüfen eines Lernpakets';
$string['validation'] = 'Prüfergebnis';
$string['validationtype'] = 'Die Einstellungen der DOMXML Library werden zur Prüfung der Lernpaket-Liste verwandt. Wenn Sie sich nicht genau auskennen, lassen Sie die Einstellungen unverändert stehen.';
$string['value'] = 'Wert';
$string['versionwarning'] = 'Die Version der Liste ist älter als 1.3, Warnung beim {$a->tag} Schlüsselwort';
$string['viewallreports'] = 'Bericht für {$a} Versuch/e anzeigen';
$string['viewalluserreports'] = 'Berichte für {$a} Nutzer anzeigen';
$string['whatgrade'] = 'Bewertung der Versuche';
$string['whatgradedesc'] = 'Diese Einstellung setzt den Standardwert für die Bewertung der Versuche';
$string['whatgrade_help'] = 'Wenn mehrere Versuche erlaubt sind, dann legt diese Einstellung fest, wie die Ergebnisse in die Bewertung einfließen (z.B. beste Bewertung, erste oder letzte Bewertung oder Durchschnittswert).

* Die Option zum Starten eines neuen Versuchs wird mit einer Checkbox auf der Übersichtsseite angezeigt. Prüfen Sie, ob Sie mehr als einen Versuch zulassen möchten.
* Einige Lernpakete unterstützen erneute Versuchen, viele aber nicht. Wenn Teilnehmer/innen erneut in einen bereits beendeten Versuch einsteigen, könnte die Bewertung des vorherigen Versuchs überschrieben werden, selbst wenn der Versuch als \'abgeschlossen\' oder \'erfolgreich\' markiert war.
* Die Einstellungen \'Abschluss einfordern\', \'Neuen Versuch erzwingen\' und \'Nach letztem Versuch sperren\' bieten zusätzliche Möglichkeiten für mehrerer Versuche.';
$string['width'] = 'Breite';
$string['window'] = 'Fenster';
