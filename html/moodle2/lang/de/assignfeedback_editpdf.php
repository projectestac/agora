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
 * Strings for component 'assignfeedback_editpdf', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_editpdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtoquicklist'] = 'Zur schnellen Bearbeitung hinzufügen';
$string['annotationcolour'] = 'Farbe für Anmerkungen';
$string['black'] = 'Schwarz';
$string['blue'] = 'Blau';
$string['cannotopenpdf'] = 'Die PDF-Datei kann nicht geöffnet werden. Die Datei ist beschädigt oder hat ein nicht unterstützes Format.';
$string['clear'] = 'Löschen';
$string['colourpicker'] = 'Farbauswahl';
$string['command'] = 'Befehl:';
$string['comment'] = 'Kommentar';
$string['commentcolour'] = 'Kommentarfarbe';
$string['commentcontextmenu'] = 'Kontextmenü für Kommentare';
$string['couldnotsavepage'] = 'Seite konnte nicht gespeichert werden {$a}';
$string['currentstamp'] = 'Stempel';
$string['deleteannotation'] = 'Anmerkung löschen';
$string['deletecomment'] = 'Kommentar löschen';
$string['deletefeedback'] = 'Feedback.pdf löschen';
$string['downloadablefilename'] = 'Feedback.pdf';
$string['downloadfeedback'] = 'Feedback.pdf herunterladen';
$string['editpdf'] = 'Anmerkungen im PDF';
$string['editpdf_help'] = 'Kommentieren Sie die Lösungen der Teilnehmenden direkt im Browser und erzeugen Sie eine herunterladbare PDF-Datei daraus.';
$string['enabled'] = 'Anmerkungen im PDF';
$string['enabled_help'] = 'Nach der Aktivierung können Trainer/innen bei der Bewertung kommentierte PDF-Dateien für die eingereichten Lösungen erstellen. Kommentare, Korrekturen, Kennzeichnungen und \'Stempel\' können direkt in der Lösung des Teilnehmenden erstellt werden. Dies erfolgt direkt im Browser ohne Zusatzssoftware.';
$string['errorgenerateimage'] = 'Fehler beim Erstellen des Bildes mit Ghostscript. Fehlerinformation: {$a}';
$string['filter'] = 'Kommentare filtern...';
$string['generatefeedback'] = 'Feedback.pdf erzeugen';
$string['generatingpdf'] = 'PDF erstellen ...';
$string['gotopage'] = 'Zur Seite';
$string['green'] = 'Grün';
$string['gspath'] = 'Ghostscript-Pfad';
$string['gspath_help'] = '<p>In den meisten Linux-Installationen wird der Pfad \'/usr/bin/gs\' richtig sein.</p>
<p>In Windows könnte der Pfad etwa \'c:/gs/bin/gswin32c.exe\' heißen. Achten Sie darauf, dass keine Leerzeichen im Pfad sein dürfen - falls nötig, kopieren Sie die Dateien \'gswin32c.exe\' und \'gsdll32.dll\' in ein Verzeichnis ohne Leerzeichen.</p>';
$string['highlight'] = 'Hervorheben';
$string['jsrequired'] = 'Das Kommentieren der PDF Dateien erfordert Javascript. Aktivieren Sie  Javascript, um diese Funktion zu nutzen.';
$string['launcheditor'] = 'PDF-Editor laden...';
$string['line'] = 'Linie';
$string['loadingeditor'] = 'PDF-Editor wird geladen';
$string['navigatenext'] = 'Nächste Seite';
$string['navigateprevious'] = 'Vorherige Seite';
$string['output'] = 'Ausgabe:';
$string['oval'] = 'Oval';
$string['pagenumber'] = 'Seite {$a}';
$string['pagexofy'] = 'Seite {$a->page} von {$a->total}';
$string['pen'] = 'Stift';
$string['pluginname'] = 'Anmerkungen im PDF';
$string['rectangle'] = 'Rechteck';
$string['red'] = 'Rot';
$string['result'] = 'Ergebnis:';
$string['searchcomments'] = 'Kommentare suchen';
$string['select'] = 'Auswählen';
$string['stamp'] = 'Stempel';
$string['stamppicker'] = 'Stempelauswahl';
$string['stamps'] = 'Stempel';
$string['stampsdesc'] = 'Stempel müssen Bilddateien sein. Als Größe wird 40x40px empfohlen. Diese Bilder können mit dem Stempelwerkzeug benutzt werden, um Anmerkungen in das PDF einzufügen.';
$string['test_doesnotexist'] = 'Der Ghostscript-Pfad zeigt auf eine nicht vorhandene Datei.';
$string['test_empty'] = 'Der Ghostscript-Pfad ist leer.';
$string['testgs'] = 'Ghostscript-Pfad prüfen';
$string['test_isdir'] = 'Der Ghostscript-Pfad zeigt auf ein Verzeichnis. Ergänzen Sie den Pfad zum Ghostscript-Programm.';
$string['test_notestfile'] = 'Die Test-PDF fehlt';
$string['test_notexecutable'] = 'Der Ghostscript-Pfad zeigt auf eine nicht ausführbare Datei.';
$string['test_ok'] = 'Der Ghostscript-Pfad scheint in Ordnung zu sein.
Sie sollten nachfolgend ein Bild und eine Mitteilung sehen können.';
$string['tool'] = 'Werkzeug';
$string['toolbarbutton'] = '{$a->tool} {$a->shortcut}';
$string['unsavedchanges'] = 'Ungesicherte Änderungen';
$string['viewfeedbackonline'] = 'Kommentierte PDF anzeigen...';
$string['white'] = 'Weiß';
$string['yellow'] = 'Gelb';
$string['zlibnotavailable'] = 'Die PHP Erweiterung \'zlib\' ist nicht vorhanden. Das Kommentieren von PDF-Dateien im Aufgabenmodul benötigt diese PHP-Erweiterung. Die Funktion ist deaktiviert bis die Erweiterung installiert und aktiviert wurde.';
