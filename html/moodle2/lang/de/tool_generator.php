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
 * Strings for component 'tool_generator', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'Große Datei {$a}';
$string['courseexplanation'] = 'Dieses Werkzeug erzeugt Standardtestkurse mit mehreen Themenabschnitten, Aktivitäten und Dateien.

Damit wird ein satndardisiertes Werkzeug zur Messung der Verlässlichkeit und Perfoprmance verschiedener Systemkomponenten geschaffen (z.B. Backup und Wiederherstellung).

Dieses Tests sind wichtig. In der Praxis hat sich gezeigt, das man auch Extremsituationen wie Kurse mit 1.000 Aktivitäten überprüfen sollte.

Derartig große Kurse können, wenn sie mit diesem Werkzeug erzeugt werden, viel Platz auf der Datenbank und Speicherplatz für den Dateibereich in Anspruch nehmen (10 GB und deutlich mehr). Löscehn sie daher diese Kurse nach Gebrauch wieder. Es wird u.U. mehrere Bereinigungsdurchläufe erfordern bis alle Daten gelöscht sind.

**Nutzen Sie dieses Werkzeug nicht auf einem Live-System**. Es ist für den Einsatz auf einem Entwicklungsrechner gedacht. (Um eine versehentliche Nutzung zu verhindern, ist es verborgen bis der Entwicklerlevel zum Debuggen aktiviert ist).';
$string['coursesize_0'] = 'XS (~10KB; angelegt in ~1 Sekunde)';
$string['coursesize_1'] = 'S (~10MB; angelegt in ~30 Sekunden)';
$string['coursesize_2'] = 'M (~100MB; angelegt in ~5 Minuten)';
$string['coursesize_3'] = 'L (~1GB; angelegt in ~1 Stunde)';
$string['coursesize_4'] = 'XL (~10GB; angelegt in ~4 Stunden)';
$string['coursesize_5'] = 'XXL (~20GB; angelegt in ~8 Stunden)';
$string['coursewithoutusers'] = 'Ausgewählter Kurs hat keine Nutzer/innen';
$string['createcourse'] = 'Kurs anlegen';
$string['createtestplan'] = 'Testplan erstellen';
$string['creating'] = 'Kurs wird angelegt';
$string['done'] = 'erledigt ({$a})';
$string['downloadtestplan'] = 'Testplan herunterladen';
$string['downloadusersfile'] = 'Nutzerliste herunterladen';
$string['error_nocourses'] = 'Es gibt keine Kurse zum Erstellen des Testplans.';
$string['error_noforumdiscussions'] = 'Der ausgewählte Kurs enthält keine Forendiskussionen';
$string['error_noforuminstances'] = 'Der ausgewählte Kursenthält keine Forenaktivitäten';
$string['error_noforumreplies'] = 'Der ausgewählte Kurs enthält keine Forenantworten';
$string['error_nonexistingcourse'] = 'Der ausgewählte Kurs existiert nicht';
$string['error_nopageinstances'] = 'Der ausgewählte Kurs enthält keine Testseitenaktivitäten';
$string['error_notdebugging'] = 'Auf diesem Server nicht verfügbar, da der Debug-Wert Entwickler nicht gesetzt wurde.';
$string['error_nouserspassword'] = 'Sie müssen $CFG->tool_generator_users_password in der Datei config.php setzne, um den Testplan zu erstellen.';
$string['firstname'] = 'Teskursnutzer';
$string['fullname'] = 'Testkurs: {$a->size}';
$string['maketestcourse'] = 'Testkurs erstellen';
$string['maketestplan'] = 'JMeterTestplan erstellen';
$string['notenoughusers'] = 'Der ausgewählte Kurs hat zu wenig Nutzerinnen.';
$string['pluginname'] = 'Datengenerator zur Entwicklung';
$string['progress_checkaccounts'] = 'Nutzeraccounts prüfen ({$a})';
$string['progress_coursecompleted'] = 'Abgeschlossene Kurse ({$a}s)';
$string['progress_createaccounts'] = 'Nutzeraccounts erstellen {$a->from} - {$a->to})';
$string['progress_createbigfiles'] = 'Grosse Dateien erzeugen ({$a})';
$string['progress_createcourse'] = 'Kurse erzeugen ({$a})';
$string['progress_createforum'] = 'Forenbeiträge erzeugen ({$a} Beiträge)';
$string['progress_createpages'] = 'Textseiten erzeugen ({$a})';
$string['progress_createsmallfiles'] = 'Kleine Dateien erzeugen ({$a})';
$string['progress_enrol'] = 'Nutzer in Kurse einschreiben ({$a})';
$string['progress_sitecompleted'] = 'Site abgeschlossen ({$a}s)';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['sitesize_0'] = 'XS (~10MB; 3 Kurse, angelegt in ~30 Sekunden)';
$string['sitesize_1'] = 'S (~50MB; 8 Kurse, angelegt in ~2 Minuten)';
$string['sitesize_2'] = 'M (~200MB; 73 Kurse, angelegt in ~10 Minuten)';
$string['sitesize_3'] = 'L (~1,5GB; 277 Kurse, angelegt in ~1,5 Stunden)';
$string['sitesize_4'] = 'L (~10GB; 1065 Kurse, angelegt in ~5 Stunden)';
$string['sitesize_5'] = 'L (~20GB; 4177 Kurse, angelegt in ~10 Stunden)';
$string['size'] = 'Kursgröße';
$string['smallfiles'] = 'Kleine Dateien';
$string['targetcourse'] = 'Zielkurs testen';
$string['testplanexplanation'] = '';
$string['testplansize_0'] = 'XS ({$a->users} Nutzter, {$a->loops} Schleifen und {$a->rampup} Steigerungsrate)';
$string['testplansize_1'] = 'S ({$a->users} Nutzter, {$a->loops} Schleifen und {$a->rampup} Steigerungsrate)';
$string['testplansize_2'] = 'M ({$a->users} Nutzter, {$a->loops} Schleifen und {$a->rampup} Steigerungsrate)';
$string['testplansize_3'] = 'L ({$a->users} Nutzter, {$a->loops} Schleifen und {$a->rampup} Steigerungsrate)';
$string['testplansize_4'] = 'XL ({$a->users} Nutzter, {$a->loops} Schleifen und {$a->rampup} Steigerungsrate)';
$string['testplansize_5'] = 'XXL ({$a->users} Nutzter, {$a->loops} Schleifen und {$a->rampup} Steigerungsrate)';
$string['updateuserspassword'] = 'Aktualisierung Zugangskennwörter für Nutzer';
$string['updateuserspassword_help'] = 'JMeter benötigt einen Login als Kursnutzer. Das Nutzerkennwort können Sie mit der Variable $CFG->tool_generator_users_password in der config.php erzeugen; Diese Einstellung aktualisiert das Kennwort, das zu  $CFG->tool_generator_users_password gehört. Dies kann hilfreich sein wenn ein Kurs verwandt wird, der nicht mit dem Tool-Generator oder über  $CFG->tool_generator_users_password nicht beim Erstellen der Testkurse erstellt wurde.';
