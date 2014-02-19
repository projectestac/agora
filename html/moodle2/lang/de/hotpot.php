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
 * Strings for component 'hotpot', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abgebrochen';
$string['activitycloses'] = 'Aktivität endet';
$string['activitygrade'] = 'Aktivitätsbewertung';
$string['activityopens'] = 'Aktivität startet';
$string['added'] = 'Hinzugefügt';
$string['addquizchain'] = 'Quizreihe anlegen';
$string['addquizchain_help'] = 'Sollen alle HotPots aus der Quizreihe hinzugefügt werden?

**Nein**
: nur ein HotPot wird zum Kurs hinzugefügt

**Ja**
: Falls die Quelle eine **Quizdatei** ist, wird sie als Anfang einer Quizreihe behandelt und alle anderen HotPots der Quizreihe werden mit den gleichen Einstellungen ebenfalls zum Kurs hinzugefügt. Alle HotPots in der Quizreihe müssen jeweils zur nächsten Datei verlinken.

Falls die Quelle ein **Verzeichnis** ist, werden alle erkennbaren HotPots aus dem Verzeichnis als Quizreihe mit gleichen Einstellungen zum Kurs hinzugefügt.

Falls die Quelle eine **Unitdatei** ist, z.B. HotPot Masher oder eine Datei index.html, werden alle HotPots aus der Unitdatei als Quizreihe mit gleichen Einstellungen zum Kurs hinzugefügt.';
$string['allowreview'] = 'Rückblick';
$string['allowreview_help'] = 'Diese Einstellung legt fest, dass Teilnehmer/innen eigene Versuche erneut anschauen dürfen, nachdem das Quiz beendet wurde.';
$string['analysisreport'] = 'Auswertung';
$string['attemptlimit'] = 'Limit für Versuche';
$string['attemptlimit_help'] = 'Diese Einstellung legt die maximale Anzahl von Versuchen für die Durchführung dieser HotPot-Aktivität fest. ';
$string['attemptnumber'] = 'Versuch Nr.';
$string['attempts'] = 'Versuche';
$string['attemptscore'] = 'Versuche';
$string['attemptsunlimited'] = 'Unlimitiert';
$string['average'] = 'Durchschnitt';
$string['averagescore'] = 'Durchschnitt';
$string['bodystyles'] = 'Seitendesign';
$string['bodystylesbackground'] = 'Hintergrundfarbe und -bild';
$string['bodystylescolor'] = 'Textfarbe';
$string['bodystylesfont'] = 'Schriftart und -größe';
$string['bodystylesmargin'] = 'Linker und rechter Rand';
$string['cacherecords'] = 'Datensätze im HotPot-Cache';
$string['checks'] = 'Kontrolle';
$string['checksomeboxes'] = 'Bitte wählen Sie etwas aus';
$string['clearcache'] = 'HotPot-Cache löschen';
$string['cleardetails'] = 'HotPot-Details löschen';
$string['clearedcache'] = 'HotPot-Cache wurde gelöscht.';
$string['cleareddetails'] = 'HotPot-Details wurden gelöscht.';
$string['clickreporting'] = 'Klickübersicht aktivieren';
$string['clickreporting_help'] = 'Wenn diese Option aktiviert ist, werden alle Klicks auch auf die Tasten "Tipp", "Hinweis" und "Prüfung" gespeichert. Dies ermöglicht eine genaue Beobachtung, wie das Quiz bearbeitet wurde. Ohne diese Option wird nur ein Ergebnisdatensatz pro Versuch gespeichert.';
$string['clicktrailreport'] = 'Klickpfade';
$string['closed'] = 'Diese Aktivität ist beendet.';
$string['clues'] = 'Spurensuche';
$string['completed'] = 'Beendet';
$string['configbodystyles'] = 'Standardmäßig werden die Designeinstellungen von HotPot durch die Designeinstellungen von Moodle überschrieben. Alternativ können Sie hier auswählen, welche Designeinstellungen aus HotPot vorrangig behandelt werden sollen.';
$string['configenablecache'] = 'Die Nutzung des HotPot-Caches kann die Quizbereitstellung entscheidend beschleunigen.';
$string['configenablecron'] = 'Zu welchen Zeiten soll das HotPot-Cron-Script ausgeführt werden? ';
$string['configenablemymoodle'] = 'Diese Option legt fest, ob HotPots auf \'Meine Startseite\' angezeigt werden.';
$string['configenableobfuscate'] = 'Javascript verschleiern, um Mediadateien zu verbergen und Rückschlüsse auf deren Inhalte zu verhindern';
$string['configenableswf'] = 'In Hotpots wird die Einbettung von SWF-Dateien erlaubt. Die Einstellung filter_mediaplugin_enable_swf wird überschrieben.';
$string['configfile'] = 'Konfigurationsdatei';
$string['configframeheight'] = 'Wenn ein HotPot in einem Frame gezeigt wird, bestimmt diese Einstellung die Höhe (in Pixeln) des Top-Frames mit der Moodle-Navigation.';
$string['configlocation'] = 'Pfad der Konfigurationsdatei';
$string['configlockframe'] = 'Wenn der Navigationsframe sichtbar ist, wird er durch diese Option fixiert, d.h. er ist in seiner Größe unveränderbar und auch nicht scrollbar.';
$string['configmaxeventlength'] = 'Falls ein HotPot eine Startzeit und eine Endzeit festlegt und die Zeitdauer größer als die hier angegebene Anzahl von Tagen ist, werden zwei Termine im Kurskalender eingetragen. Für eine kürzere Zeitdauer oder falls nur ein Zeitpunkt angegeben ist, wird nur ein Termin eingetragen. Falls keine Zeit festgelegt ist, wird kein Termin eingetragen.
';
$string['configstoredetails'] = 'Wenn diese Option aktiviert ist, werden die XML-Details aller HotPot-Versuche in der Tabelle hotpot_details Tabelle gespeichert. Man kann damit Versuche neu einstufen und Veränderungen im HotPot-Bewertungssystem reflektieren. Die Aktivierung bewirkt allerdings in einem stark benutzen System, dass die Tabelle hotpot_details sehr schnell anwächst.';
$string['confirmdeleteattempts'] = 'Sind Sie sicher, dass Sie diese Versuche wirklich löschen wollen?';
$string['confirmstop'] = 'Sind sie sicher, dass Sie diese Seite verlassen wollen?';
$string['correct'] = 'Richtig';
$string['couldnotinsertsubmissionform'] = 'Das Eingabeformular konnte nicht eingefügt werden';
$string['delay1'] = 'Verzögerung 1';
$string['delay1_help'] = 'Diese Einstellung legt die minimale Zeitdauer zwischen dem ersten und zweiten Versuch fest.';
$string['delay1summary'] = 'Zeitdauer zwischen dem ersten und zweiten Versuch';
$string['delay2'] = 'Verzögerung 2';
$string['delay2_help'] = 'Diese Einstellung legt die minimale Zeitdauer für alle weiteren Versuche nach dem zweiten Versuch fest.';
$string['delay2summary'] = 'Zeitdauer zwischen allen weiteren Versuchen';
$string['delay3'] = 'Verzögerung 3';
$string['delay3afterok'] = 'Warten, bis OK angeklickt wird';
$string['delay3disable'] = 'Nicht automatisch fortsetzen';
$string['delay3_help'] = 'Die Einstellung legt die Zeitdauer zwischen der Beendigung des HotPot-Quiz und der Rückkehr zum Moodlekurs fest.

**Angegebene Zeit**
: Die Kontrolle wird nach Ablauf der angegebenen Zeit (in Sekunden) an Moodle zurückgegeben.

**Einstellung in der Quelldatei**
: Die Kontrolle wird nach Ablauf der in der Quelldatei angegebenen Zeit (in Sekunden) an Moodle zurückgegeben.

**Warten, bis OK angeklickt wird**
: Die Kontrolle wird an Moodle zurückgegeben, sobald die Nachricht zur Fertigstellung gezeigt  und per Tastendruck bestätigt wurde.

**Nicht automatisch fortsetzen**
: Die Kontrolle wird nicht an Moodle zurückgegeben, wenn das HotPot-Quiz abgeschlossen ist. Es ist freigestellt, was danach aufgerufen wird.

Beachten Sie, dass unabhängig von dieser Einstellung alle HotPot-Ergebnisse immer sofort in Moodle gespeichert werden, sobald das Quiz abgeschlossen oder abgebrochen wurde.';
$string['delay3specific'] = 'Angegebene Zeit';
$string['delay3summary'] = 'Verzögerungszeit am Ende des Quiz';
$string['delay3template'] = 'Einstellung in der Quelldatei';
$string['deleteallattempts'] = 'Alle Versuche löschen';
$string['deleteattempts'] = 'Versuche löschen';
$string['detailsrecords'] = 'Detailübersicht';
$string['d_index'] = 'Discrimination Index';
$string['duration'] = 'Dauer';
$string['enablecache'] = 'HotPot-Cache';
$string['enablecron'] = 'HotPot-Cron';
$string['enablemymoodle'] = 'HotPots auf \'Meine Startseite\' zeigen';
$string['enableobfuscate'] = 'MediaPlayer-Code verschleiern';
$string['enableswf'] = 'Eingebettete SWF-Dateien erlauben';
$string['entry_attempts'] = 'Versuche';
$string['entrycm'] = 'Vorherige Aktivität';
$string['entrycmcourse'] = 'Vorherige Aktivität im Kurs';
$string['entrycm_help'] = 'Diese Einstellung legt fest, welche Aktivität mit welchem Mindestergebnis bearbeitet sein muss, bevor dieses HotPot versucht werden darf.

Es kann eine bestimmte Aktivität angegeben oder eine der nachfolgenden Einstellungen ausgewählt werden:

* Vorherige Aktivität im Kurs
* Vorherige Aktivität im Kursabschnitt
* Vorheriges HotPot im Kurs
* Vorheriges HotPot im Kursabschnitt';
$string['entrycmsection'] = 'Vorherige Aktivität im Kursabschnitt';
$string['entrycompletionwarning'] = 'Bevor Sie diese Aktivität beginnen, müssen Sie sich {$a} anschauen.';
$string['entry_dates'] = 'Daten';
$string['entrygrade'] = 'Vorherige Aktivitätsbewertung';
$string['entrygradewarning'] = 'Sie können diese Aktivität nicht beginnen, solange Ihre Wertung für \'{$a->entryactivity}\' unter {$a->entrygrade}% liegt. Aktuell haben Sie für die andere Aktivität {$a->usergrade}% erreicht.';
$string['entry_grading'] = 'Bewertung';
$string['entryhotpotcourse'] = 'Vorheriges HotPot im Kurs';
$string['entryhotpotsection'] = 'Vorheriges HotPot im Kursabschnitt';
$string['entryoptions'] = 'Optionen der Anfangsseite';
$string['entryoptions_help'] = 'Diese Optionen beeinflussen die Anzeige von Elementen auf der Anfangsseite des HotPots:

**Kapitelname als Titel**
: Wenn diese Option aktiviert ist, wird der Kapitelname als Titel gezeigt.

**Bewertung**
: Wenn diese Option aktiviert ist, werden die Bewertungsinformationen des HotPots gezeigt.

**Termine**
: Wenn diese Option aktiviert ist, werden die Zeitpunkte für Start und Ende des HotPots gezeigt.

**Versuche**
: Wenn diese Option aktiviert ist, wird eine Tabelle mit den bisherigen Nutzerversuchen des HotPots erzeugt. Für Versuche, die fortgesetzt werden können, wird in der rechten Spalte eine Taste \'Fortsetzen\' gezeigt.
';
$string['entrypage'] = 'Anfangsseite zeigen';
$string['entrypagehdr'] = 'Anfangsseite';
$string['entrypage_help'] = 'Soll den Teilnehmer/innen eine Anfangsseite gezeigt werden, bevor die HotPot-Aktivität beginnt?

**Ja**
: Vor dem Beginn der HotPot-Aktivität wird den Teilnehmer/innen eine Anfangsseite gezeigt. Der Inhalt dieser Anfangsseite wird durch die \'Optionen für die HotPot-Anfangsseite\' festgelegt.

**Nein**
: Die HotPot-Aktivität beginnt, ohne dass die Teilnehmer/innen eine Anfangsseite sehen.

Trainer/innen bekommen die Anfangsseite immer angezeigt, wenn sie auf die Übersicht zugreifen oder die Quizseite bearbeiten.';
$string['entrytext'] = 'Text der Anfangsseite';
$string['entry_title'] = 'Kapitelname als Titel';
$string['exit_areyouok'] = 'Hallo, sind Sie noch da?';
$string['exit_attemptscore'] = 'Ihre Wertung für diesen Versuch ist {$a}';
$string['exitcm'] = 'Nächste Aktivität';
$string['exitcmcourse'] = 'Nächste Aktivität im Kurs';
$string['exitcm_help'] = 'Diese Einstellung legt fest, welche Aktivität bearbeitet werden soll, nachdem dieses HotPot beendet ist.

Es kann eine bestimmte Aktivität angegeben oder eine der nachfolgenden Einstellungen ausgewählt werden:

* Nächste Aktivität im Kurs
* Nächste Aktivität im Kursabschnitt
* Nächste HotPot im Kurs
* Nächste HotPot im Kursabschnitt

Falls alle anderen Optionen für das Ende des HotPot deaktiviert sind, wird sofort die nächste Aktivität aufgerufen. Andernfalls wird ein Link angezeigt, der auf die nächste Aktivität verweist.';
$string['exitcmsection'] = 'Nächste Aktivität im Kursabschnitt';
$string['exit_course'] = 'Kurs';
$string['exit_course_text'] = 'Zum Kurs zurück';
$string['exit_encouragement'] = 'Ermutigung';
$string['exit_excellent'] = 'Ausgezeichnet!';
$string['exit_feedback'] = 'Feedback auf der Endseite';
$string['exit_feedback_help'] = 'Diese Optionen beeinflussen die Anzeige von Feedback auf der Endseite des HotPots:

**Kapitelname als Titel**
: Wenn diese Option aktiviert ist, wird der Kapitelname als Titel gezeigt.

**Ermutigung**
: Wenn diese Option aktiviert ist, werden einige Ermutigungen gezeigt.
: **> 90%**: Ausgezeichnet!
: **> 60%**: Toll gemacht
: **> 0%**: Guter Versuch
: **= 0%**: Sind Sie in Ordnung?

**Kapitelbewertung für aktuellen Versuch**
: Wenn diese Option aktiviert ist, wird eine Bewertung für den aktuellen Versuch gezeigt.

**Kapitelbewertung**
: Wenn diese Option aktiviert ist, wird die HotPot-Bewertung gezeigt.

Zusätzlich wird eine entsprechende Mitteilung gezeigt, falls die Bewertungsmethode auf \'Bester Versuch\' eingestellt ist und der aktuelle Versuch gleich oder besser als alle vorherigen war.';
$string['exit_goodtry'] = 'Guter Versuch';
$string['exitgrade'] = 'Nächste Aktivitätenwertung';
$string['exit_grades'] = 'Wertung';
$string['exit_grades_text'] = 'Zu Ihren bisherigen Wertungen im Kurs';
$string['exithotpotcourse'] = 'Nächstes HotPot in diesem Kurs';
$string['exit_hotpotgrade'] = 'Ihre Wertung für diese Aktivität ist {$a}';
$string['exit_hotpotgrade_average'] = 'Ihre Durchschnittswertung für diese Aktivität ist {$a}';
$string['exit_hotpotgrade_highest'] = 'Ihre Höchstwertung für diese Aktivität ist {$a}';
$string['exit_hotpotgrade_highest_equal'] = 'Sie haben Ihre bisherige Bestleistung für diese Aktivität erreicht!';
$string['exit_hotpotgrade_highest_previous'] = 'Ihre bisherige Höchstwertung für diese Aktivität war {$a}';
$string['exit_hotpotgrade_highest_zero'] = 'Sie wurden für die Aktivität bisher nicht höher bewertet als {$a}';
$string['exithotpotsection'] = 'Nächstes HotPot im Kursabschnitt';
$string['exit_index'] = 'Übersicht';
$string['exit_index_text'] = 'Zur Übersicht aller Aktivitäten';
$string['exit_links'] = 'Links auf der Endseite';
$string['exit_links_help'] = 'Diese Optionen beeinflussen die Anzeige von Navigationslinks auf der Endseite des HotPots:

**Erneuter Versuch**
: Falls mehrere Versuche für dieses HotPot erlaubt sind und die Person noch Versuche übrig hat, wird ein Link für einen weiteren HotPot-Versuch gezeigt.

**Übersicht**
: Wenn diese Option aktiviert ist, wird ein Link zur HotPot-Übersicht gezeigt.

**Kurs**
: Wenn diese Option aktiviert ist, wird ein Link zur Moodle-Kurseite gezeigt.

**Bewertungen**
: Wenn diese Option aktiviert ist, wird ein Link zu den Moodle-Bewertungen gezeigt.
';
$string['exit_next'] = 'Weiter';
$string['exit_next_text'] = 'Nächste Aktivität versuchen';
$string['exit_noscore'] = 'Diese Aktivität wurde erfolgreich abgeschlossen!';
$string['exitoptions'] = 'Optionen der Endseite';
$string['exitpage'] = 'Endseite zeigen';
$string['exitpagehdr'] = 'Endseite';
$string['exitpage_help'] = 'Soll eine Endseite angezeigt werden, wenn das HotPot-Quiz abgeschlossen ist?

**Ja**
: Es wird eine Endseite gezeigt, wenn das HotPot abgeschlossen ist. Der Inhalt der Endseite wird durch die Einstellungen für Text, Feedback und Links bestimmt.

**Nein**
: Es wird keine Endseite gezeigt, wenn das HotPot abgeschlossen ist. Stattdessen wird sofort automatisch zur nächsten Aktivität oder auf die Kursseite weitergeleitet.';
$string['exit_retry'] = 'Erneuter Versuch';
$string['exit_retry_text'] = 'Diese Aktivität erneut versuchen';
$string['exittext'] = 'Text der Endseite';
$string['exit_welldone'] = 'Toll gemacht!';
$string['exit_whatnext_0'] = 'Was möchten Sie als nächstes tun?';
$string['exit_whatnext_1'] = 'Wählen Sie Ihr Schicksal ...';
$string['exit_whatnext_default'] = 'Bitte wählen Sie eine der folgenden Möglichkeiten:';
$string['feedbackdiscuss'] = 'Diskutieren Sie dieses Quiz im Forum';
$string['feedbackformmail'] = 'Feedback-Formular';
$string['feedbackmoodleforum'] = 'Moodle-Forum';
$string['feedbackmoodlemessaging'] = 'Moodle-Mitteilung';
$string['feedbacknone'] = 'Nein';
$string['feedbacksendmessage'] = 'Nachricht an Trainer/in senden';
$string['feedbackwebpage'] = 'Webseite';
$string['firstattempt'] = 'Erster Versuch';
$string['forceplugins'] = 'Multimedia-Plugins verwenden';
$string['forceplugins_help'] = 'Wenn diese Option aktiviert ist, werden kompatible Formate wie avi, mpeg, mpg, mp3, mov und wmv mit den Multimedia-Plugins dargestellt. Andernfalls werden keine Einstellungen für die MediaPlayer im Quiz geändert.';
$string['frameheight'] = 'Framehöhe';
$string['giveup'] = 'Aufgeben';
$string['grademethod'] = 'Methode';
$string['grademethod_help'] = 'Diese Einstellung legt fest, wie sich die HotPot-Bewertung aus den Versuchen ergibt.

**Bester Versuch**
: Die Bewertung wird auf den besten Wert gesetzt, der bei dieser HotPot-Aktivität in einem Versuch erreicht wurde.

**Durchschnitt**
: Die Bewertung wird auf den Durchschnittswert gesetzt, der sich aus allen Versuchen dieser HotPot-Aktivität errechnet.

**Erster Versuch**
: Die Bewertung wird auf den Wert gesetzt, der bei dieser HotPot-Aktivität im ersten Versuch erreicht wurde.

**Letzter Versuch**
: Die Bewertung wird auf den Wert gesetzt, der bei dieser HotPot-Aktivität im letzten Versuch erreicht wurde.
';
$string['gradeweighting'] = 'Gewichtung';
$string['gradeweighting_help'] = 'Wertungen der HotPot-Aktivität werden auf diesen Wert bezogen in der Moodle-Bewertung skaliert.';
$string['highestscore'] = 'Bester Versuch';
$string['hints'] = 'Tipps';
$string['hotpot:addinstance'] = 'Neue HotPot-Aktivität hinzufügen';
$string['hotpot:attempt'] = 'HotPot versuchen und Ergebnisse eintragen';
$string['hotpot:deleteallattempts'] = 'Alle Versuche einer HotPot-Aktivität löschen';
$string['hotpot:deletemyattempts'] = 'Eigene Versuche einer HotPot-Aktivität löschen';
$string['hotpot:ignoretimelimits'] = 'Zeitbeschränkungen einer HotPot-Aktivität ignorieren';
$string['hotpot:manage'] = 'Einstellungen einer HotPot-Aktivität ändern';
$string['hotpotname'] = 'HotPot-Name';
$string['hotpot:preview'] = 'Vorschau einer HotPot-Aktivität sehen';
$string['hotpot:reviewallattempts'] = 'Alle Versuche einer HotPot-Aktivität sehen';
$string['hotpot:reviewmyattempts'] = 'Eigene Versuche einer HotPot-Aktivität sehen';
$string['hotpot:view'] = 'Erste Seite einer HotPot-Aktivität sehen';
$string['ignored'] = 'Ignoriert';
$string['inprogress'] = 'In Bearbeitung';
$string['isgreaterthan'] = 'ist mehr als';
$string['islessthan'] = 'ist weniger als';
$string['lastaccess'] = 'Letzter Zugriff';
$string['lastattempt'] = 'Letzter Versuch';
$string['lockframe'] = 'Frame sperren';
$string['maxeventlength'] = 'Maximalzahl von Tagen pro Kalendereintrag';
$string['mediafilter_hotpot'] = 'HotPot Mediafilter
';
$string['mediafilter_moodle'] = 'Moodle Mediafilter';
$string['migratingfiles'] = 'HotPot-Dateien umwandeln';
$string['missingsourcetype'] = 'Im HotPot-Datensatz fehlt der Quelltyp';
$string['modulename'] = 'HotPot';
$string['modulename_help'] = 'Das Modul \'Hotpot\' ermöglicht es, interaktive Lernmaterialien einzubinden und die Übungsergebnisse in Moodle zu übernehmen.

Ein einzelnes HotPot besteht aus einer optionalen Einstiegsseite, einer Übung und einer optionalen Endseite. Die Übung selber ist eine statische oder eine interaktive Webseite, die Text, Audio und Video enthalten kann und die Übungsergebnisse aufzeichnet.

Eine HotPot-Aktivität kann mit folgender Software extern erstellt und dann in Moodle eingebunden werden:
* Hot Potatoes (Version 6)
* Qedoc
* Xerte
* iSpring
* HTML-Editor';
$string['modulenameplural'] = 'HotPots';
$string['nameadd'] = 'Name';
$string['nameadd_help'] = 'Der Name kann als Text eingegeben oder automatisch generiert werden.

**Aus der Quelldatei**
: Der Name wird aus der Quelldatei gelesen.

**Name der Quelldatei**
: Der Name der Quelldatei wird verwendet.

**Pfad der Quelldatei**
: Der Pfad der Quelldatei wird verwendet. Alle Schrägstriche im Pfad werden durch Leerzeichen ersetzt.

**Eigener Text**
: Der angegebene eigene Text wird als Name verwendet.';
$string['nameedit'] = 'Name';
$string['nameedit_help'] = 'Der angegebene Text wird bei der Durchführung angezeigt.';
$string['navigation'] = 'Navigation';
$string['navigation_embed'] = 'Eingebettete Webseite';
$string['navigation_frame'] = 'Navigationsframe';
$string['navigation_give_up'] = 'Stopptaste';
$string['navigation_help'] = 'Diese Einstellung legt die im Quiz benutzte Navigation fest:

**Moodle-Navigation**
: Die Moodle-Navigation wird im gleichen Fenster mit dem Test angezeigt

**Navigationsframe**
: Die Moodle-Navigation wird in einem separaten Frame oberhalb des Quiz angezeigt

**Eingebettete Webseite**
: Die Moodle-Navigation wird im gleichen Fenster angezeigt, wobei das Quiz in das Fenster eingebettet ist

**HotPot-Tasten**
: Das Quiz wird zusammen mit den Navigationstasten von HotPot angezeigt, sofern die im Quiz definiert sind

**Einzelne Stopptaste**
: Das Quiz wird zusammen mit einer Taste "Aufgeben" gezeigt, die sich oben auf der Seite befindet

**Keine**
: Das Quiz wird ohne Navigationszusätze angezeigt. Erst nach der richtigen Beantwortung aller Fragen im Quiz wird weiter verzweigt, entweder zum Kurs zurück oder zum nächsten Quiz, abhängig von der Einstellung "Nächste Aktivität"';
$string['navigation_moodle'] = 'Moodle-Navigation (oben und seitlich)';
$string['navigation_none'] = 'Ohne';
$string['navigation_original'] = 'HotPot-Tasten';
$string['navigation_topbar'] = 'Moodle-Navigation (oben)';
$string['noactivity'] = 'Keine Aktivität';
$string['nohotpots'] = 'Keine HotPots gefunden';
$string['nomoreattempts'] = 'Sie können keine weiteren Versuche mehr für diese Aktivität anfangen.';
$string['noresponses'] = 'Es wurden keine Informationen zu den Fragen und Antworten gefunden.';
$string['noreview'] = 'Sie dürfen keine Details zu diesem Versuch ansehen.';
$string['noreviewafterclose'] = 'Dieses Quiz wurde beendet. Sie dürfen zukünftig keine Details mehr zu diesem Versuch ansehen.';
$string['noreviewbeforeclose'] = 'Sie dürfen bis {$a} keine Details zu diesem Versuch ansehen.';
$string['nosourcefilesettings'] = 'Im HotPot-Datensatz fehlt die Angabe zur Quelldatei';
$string['notavailable'] = 'Diese Aktivität ist aktuell für Sie nicht verfügbar.';
$string['outputformat'] = 'Format';
$string['outputformat_best'] = 'Optimal';
$string['outputformat_help'] = 'Diese Einstellung legt das Format fest, um den Inhalt darzustellen.

Die verfügbaren Ausgabeformate sind abhängig vom Typ der Quelldatei. Manche Dateitypen haben nur ein Ausgabeformat, während andere über mehrere Ausgabeformate verfügen.

Die Einstellung "Optimal" zeigt den Inhalt jeweils angepasst für den verwendeten Browser an. ';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze (v6) html';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'JCloze HP6 xml: ANCT-Scan';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'JCloze HP6 xml: DropDown';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'JCloze HP6 xml: FindIt (a)';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'JCloze HP6 xml: FindIt (b)';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JCloze HP6 xml: JGloss';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze (v6) xml';
$string['outputformat_hp_6_jcloze_xml_v6_autoadvance'] = 'JCloze (v6) xml: Auto-advance';
$string['outputformat_hp_6_jcross_html'] = 'JCross (v6) html';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross (v6) xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch (v6) html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch (flashcard) xml';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMatch HP6 xml: JMemori';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch (v6) xml';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch (v6+) xml';
$string['outputformat_hp_6_jmix_html'] = 'JMix (v6) html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix (v6) xml';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix (v6+) xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_deluxe'] = 'JMix (v6+ with prefix, suffix with distractors) xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix (v6+ with key press) xml';
$string['outputformat_hp_6_jquiz_html'] = 'JQuiz (v6) html';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz (v6) xml';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz (v6) xml: Auto-advance';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz (v6) xml: Exam';
$string['outputformat_hp_6_rhubarb_html'] = 'Rhubarb (v6) html';
$string['outputformat_hp_6_rhubarb_xml'] = 'Rhubarb (v6) xml';
$string['outputformat_hp_6_sequitur_html'] = 'Sequitur (v6) html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'Sequitur (v6) html, incremental scoring';
$string['outputformat_hp_6_sequitur_xml'] = 'Sequitur (v6) xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'Sequitur (v6) xml, incremental scoring';
$string['outputformat_html_ispring'] = 'iSpring-HTML-Datei';
$string['outputformat_html_xerte'] = 'Xerte-HTML-Datei';
$string['outputformat_html_xhtml'] = 'Standard-HTML-Datei';
$string['outputformat_qedoc'] = 'Qedoc-Datei';
$string['overviewreport'] = 'Überblick';
$string['penalties'] = 'Abzüge';
$string['percent'] = 'Prozent';
$string['pluginadministration'] = 'HotPot Administration';
$string['pluginname'] = 'HotPot';
$string['pressoktocontinue'] = 'Drücken Sie \'OK\', um weiterzumachen, oder \'Abbrechen\', um auf der aktuellen Seite zu bleiben';
$string['questionshort'] = 'Frage {$a}';
$string['quizname_help'] = 'Hilfetext für den Quiznamen';
$string['quizzes'] = 'Quizes';
$string['removegradeitem'] = 'Wertung löschen';
$string['removegradeitem_help'] = 'Soll die Wertung für diese Aktivität gelöscht werden?

**Nein**
: Die Bewertung für diese Aktivität wird nicht aus der Bewertungsübersicht entfernt

**Ja**
: Wenn die maximale Bewertung oder die Gewichtung für dieses HotPot-Quiz auf Null gesetzt wurde, dann wird die Bewertung für diese Aktivität aus der Bewertungsübersicht entfernt';
$string['responsesreport'] = 'Antworten';
$string['score'] = 'Bewertung';
$string['scoresreport'] = 'Bewertungsübersicht';
$string['selectattempts'] = 'Versuche auswählen';
$string['showerrormessage'] = 'HotPot-Fehler: {$a}';
$string['sourcefile'] = 'Quelldatei';
$string['sourcefile_help'] = 'Diese Einstellung gibt die Quelldatei an, in der die gezeigten Inhalte enthalten sind.

Normalerweise wurde die Quelldatei außerhalb von Moodle angelegt und in den Kurs hochgeladen. Dabei kann es sich um eine HTML-Datei oder um ein anderes von der Autorensoftware HotPotatoes oder Qedoc erzeugtes Dateiformat handeln.

Die Quelldatei kann als Verzeichnis oder Dateipfad angegeben werden oder es kann eine URL beginnend mit http:// oder https:// sein, z.B. http://www.qedoc.net/library/ABCDE_123.zip

Weitere Information zum Hochladen von Qedoc-Modulen finden Sie unter: <a href="http://www.qedoc.org/en/index.php?title=Uploading_modules">Qedoc documentation: Uploading_modules</a>
';
$string['sourcefilenotfound'] = 'Quelldatei nicht gefunden (oder leer): {$a}';
$string['status'] = 'Status';
$string['stopbutton'] = 'Stopptaste';
$string['stopbutton_help'] = 'Wenn diese Option aktiviert ist, wird eine Stopptaste in den Test eingefügt,

Wenn Teilnehmer/innen auf diese Stopptaste drücken, werden die bisherigen Ergebnisse an Moodle zurückgegeben und der Versuch wird als "aufgegeben" registriert.

Der Text für Stopptaste kann aus der Sprachdatei übernommen oder von den Trainer/innen selbst angegeben werden.';
$string['stopbutton_langpack'] = 'Aus der Sprachdatei';
$string['stopbutton_specific'] = 'Angegebener Text';
$string['stoptext'] = 'Text der Stopptaste';
$string['storedetails'] = 'XML-Rohdaten der HotPot-Versuche sichern';
$string['studentfeedback'] = 'Nutzerfeedback';
$string['studentfeedback_help'] = 'Wenn diese Option aktiviert ist, wird ein Popup-Fenster mit Feedback angezeigt, sobald die Teilnehmer/innen auf die Taste "Prüfung" klicken.

Das Feedback-Fenster erlaubt es, eine Rückmeldung an die Trainer/innen zu übermitteln:

**Webseite**
: Die URL einer Webseite ist notwendig, z.B. http://www.meinserver.de/feedbackform.html

**Feedback-Formular**
: Die URL zu einem Scriptformular ist notwendig, z.B. http://www.meinserver.de/cgi-bin/feedback.pl

**Moodle-Forum**
: Der Forumsindex des Kurses wird angezeigt

**Moodle-Messaging**
: Das Fenster für das Moodle-Messaging wird angezeigt. Wenn der Kurs mehrere Trainer/innen hat, muss ausgewählt, für wen das Messaging-Fenster geöffnet werden soll.';
$string['submits'] = 'Einreichungen';
$string['subplugintype_hotpotattempt'] = 'Ausgabeformat';
$string['subplugintype_hotpotattempt_plural'] = 'Ausgabeformate';
$string['subplugintype_hotpotreport'] = 'Bericht';
$string['subplugintype_hotpotreport_plural'] = 'Berichte';
$string['subplugintype_hotpotsource'] = 'Quelldatei';
$string['subplugintype_hotpotsource_plural'] = 'Quelldateien';
$string['textsourcefile'] = 'Aus der Quelldatei';
$string['textsourcefilename'] = 'Name der Quelldatei';
$string['textsourcefilepath'] = 'Pfad der Quelldatei';
$string['textsourcequiz'] = 'Vom Quiz übernehmen';
$string['textsourcespecific'] = 'Angegebener Text';
$string['timeclose'] = 'Verfügbar bis';
$string['timedout'] = 'Zeit ist abgelaufen';
$string['timelimit'] = 'Zeitlimit';
$string['timelimitexpired'] = 'Die maximale Zeitdauer für diesen Versuch ist abgelaufen';
$string['timelimit_help'] = 'Diese Einstellung legt die Maximaldauer für jeden Versuch fest.

**Aus der Quelldatei**
: Die Maximaldauer wird aus der Quelldatei oder aus der Vorlagedatei für dieses Ausgabeformat gelesen.

**Vorgegebene Zeit**
: Die in den Einstellungen zum HotPot festgelegte Maximaldauer gilt für alle Versuche. Diese Einstellung überschreibt mögliche Werte aus der Quelldatei, aus der Konfigurationsdatei oder aus der Vorlagedatei für dieses Ausgabeformat.

**Deaktivieren**
: Für die Versuche zum Quiz wird keine Maximaldauer festgelegt.

Beachten Sie, dass bei der Wiederaufnahme eines Versuchs die Zeit genau an der Stelle weiterläuft, an der der Versuch vorher unterbrochen wurde.';
$string['timelimitspecific'] = 'Vorgegebene Zeit';
$string['timelimitsummary'] = 'Maximale Zeitdauer für jeden Versuch';
$string['timelimittemplate'] = 'Aus der Quelldatei';
$string['timeopen'] = 'Verfügbar von';
$string['timeopenclose'] = 'Nutzungszeiten';
$string['timeopenclose_help'] = 'Sie können Zeiten festlegen, wann das Quiz für Teilnehmerversuche zugänglich ist. Außerhalb des angegebenen Zeitraums ist das Quiz nicht verfügbar.';
$string['title'] = 'Titel';
$string['title_help'] = 'Diese Option legt den Titel fest, der auf der Webseite angezeigt werden soll.

**Name der HotPot-Aktivität**
: Der angegebene Name dieser HotPot-Aktivität wird als Titel der Webseite angezeigt.

**Aus der Quelldatei**
: Der in der Quelldatei definierte Titel wird als Titel der Webseite verwendet (falls vorhanden).

**Name der Quelldatei**
: Der Name der Quelldatei wird (ohne Verzeichnisnamen) als Titel der Webseite verwendet.

**Pfad der Quelldatei**
: Der Pfad der Quelldatei wird vollständig (mit allen Verzeichnisnamen) als Titel der Webseite verwendet.';
$string['unitname_help'] = 'Hilfetext für den Abschnittsnamen';
$string['updated'] = 'Aktualisiert';
$string['usefilters'] = 'Filter nutzen';
$string['usefilters_help'] = 'Wenn diese Option aktiviert ist, werden Inhalte von den Moodlefiltern verarbeitet, bevor sie angezeigt werden.';
$string['useglossary'] = 'Glossar';
$string['useglossary_help'] = 'Wenn diese Option aktiviert ist, werden Inhalte mit dem Moodlefilter \'Autoverlinkung für Glossare\' verarbeitet, bevor sie angezeigt werden.';
$string['usemediafilter'] = 'Mediafilter';
$string['usemediafilter_help'] = 'Diese Einstellung legt die Nutzung des Mediafilters fest.

**Keine**
: Der Inhalt wird an keinen Multimediafilter übergeben.

**Moodle Mediafilter**
: Der Inhalt wird an die standardmäßigen Multimediafilter von Moodle übergeben. Diese Filter suchen nach Links zu Audio- und Videodateien und wandeln diese Links in geeignete Aufrufe der Mediaplayer um.

**HotPot Mediafilter**
: Der Inhalt wird durch Filter geleitet, um Links, Bilder, Audio und Videos zu erkennen und in eine HotPot-Notation mit eckigen Klammern umzuwandeln.

Die Notation mit den eckigen Klammer hat die folgende Syntax:
<code>[url player width height options]</code>

**url**
: relative oder absolute URL der Mediendatei

**player** (optional)
: Name des einzufügenden Mediaplayers. Standardmäßig ist diese Einstellung "moodle". Alternativ werden von HotPot die folgenden Mediaplayer benutzr:
: **dew**: einen MP3-Player
: **dyer**: MP3-Player von Bernard Dyer
: **hbs**: MP3-Player von Half-Baked Software
: **image**: Bild in die Webseite einfügen
: **link**: Link zu einer anderen Webseite

**width** (optional)
: die einzustellende Breite des Mediaplayers

**height** (optional)
: die einzustellende Höhe des Mediaplayers. Wird dieser Wert weggelassen, wird die Höhe auf den gleichen Wert wie die Breite gesetzt.

**options** (optional)
: eine kommagetrennte Liste von Optionen zur Weitergabe an den Mediaplayer. Jede Option kann eine einfacher Ein-/Aus-Schalter oder ein Wertepaar sein.
: **name = Wert
: **name = "irgendein Wert mit Leerzeichen"';
$string['utilitiesindex'] = 'HotPot-Werkzeuge';
$string['viewreports'] = '{$a} Nutzerberichte';
$string['views'] = 'Aufrufe';
$string['weighting'] = 'Gewichtung';
$string['wrong'] = 'Falsch';
$string['zeroduration'] = 'Keine Dauer';
$string['zeroscore'] = 'Nullwertung';
