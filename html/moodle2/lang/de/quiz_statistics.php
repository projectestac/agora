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
 * Strings for component 'quiz_statistics', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = 'Tatsächliche Antwort';
$string['allattempts'] = 'Alle Versuche';
$string['allattemptsavg'] = 'Durchschnittsergebnis aller Versuche';
$string['allattemptscount'] = 'Gesamtzahl an vollständig bewerteten Versuchen';
$string['analysisofresponses'] = 'Antwortanalyse';
$string['analysisofresponsesfor'] = 'Antwortanalyse für {$a}';
$string['attempts'] = 'Versuche';
$string['attemptsall'] = 'Alle Versuche';
$string['attemptsfirst'] = 'Erster Versuch';
$string['backtoquizreport'] = 'Zurück zur Hauptseite Statistik';
$string['calculatefrom'] = 'Statistik berechnen aus';
$string['cic'] = 'Koeffizient interner Konsistenz (für {$a})';
$string['completestatsfilename'] = 'Vollständige Statistiken';
$string['count'] = 'Zählen';
$string['coursename'] = 'Kursname';
$string['detailedanalysis'] = 'Mehr Details zu den Antworten dieser Frage';
$string['discrimination_index'] = 'Discrimination Index
';
$string['discriminative_efficiency'] = 'Unterscheidungs-Effizienz';
$string['downloadeverything'] = 'Bericht herunterladen als als {$a->formatsmenu} {$a->downloadbutton}';
$string['duration'] = 'Geöffnet für';
$string['effective_weight'] = 'Effektive Gewichtung';
$string['errordeleting'] = 'Fehler beim Löschen von {$a} Datensätzen.';
$string['erroritemappearsmorethanoncewithdifferentweight'] = 'Frage ({$a}) erscheint mehrfach im Test mit unterschiedlichen Gewichtungen. Dies wird bei der Erstellung der Statistik nicht unterstützt und kann zu unzuverlässigen Auswertungen führen.';
$string['errormedian'] = 'Fehler beim Ermitteln des Durchschnitts';
$string['errorpowerquestions'] = 'Fehler beim Ermitteln von Daten zur Berechnung der Varianz für Fragebewertungen';
$string['errorpowers'] = 'Fehler beim Ermitteln von Daten zur Berechnung der Varianz für Testbewertungen';
$string['errorrandom'] = 'Es ist ein Fehler bei den Daten des Unterthemas aufgetreten.';
$string['errorratio'] = 'Fehlerquotient (für {$a})';
$string['errorstatisticsquestions'] = 'Fehler beim Ermitteln von Daten zur Berechnung der Statistiken für Fragebewertungen';
$string['facility'] = 'Leichtigkeitsindex';
$string['firstattempts'] = 'Erste Versuche';
$string['firstattemptsavg'] = 'Durchschnitt bei erstem Versuch';
$string['firstattemptscount'] = 'Anzahl der vollständig bewerteten ersten Versuchen';
$string['frequency'] = 'Frequenz';
$string['intended_weight'] = 'Beabsichtigte Gewichtung';
$string['kurtosis'] = 'Bewertungsverteilungsgraph (für {$a})';
$string['lastcalculated'] = 'Seit der letzten Berechnung ({$a->lastcalculated}) gab es {$a->count} neue Versuche.';
$string['median'] = 'Median (für {$a})';
$string['modelresponse'] = 'Musterantwort';
$string['negcovar'] = 'Negative Kovarianz der Bewertung mit der Bewertung aller Versuche';
$string['negcovar_help'] = '<p>Die Bewertung dieser Frage in diesem Satz von Versuchen im Test ändert sich in der entgegengesetzten Weise zur Bewertung des gesamten Versuches. Das bedeutet, dass die Bewertung des gesamten Versuch dazu neigt unter dem Durchschnitt zu liegen, wenn die Bewertung für diesen Rang über dem Durchschnitt liegt und umgekehrt. </p>
<p>Unsere Gleichung für eine effektive Fragen-Gewichtung kann in diesem Fall nicht berechnet werden. Die Berechnungen der effektiven Fragen-Gewichtung für andere Fragen in diesem Test sind gleich der effektiven Fragen-Gewichtung für diese Fragen, wenn den hervorgehobenen Fragen mit einer negativen Kovarianz die maximale Bewertung von Null gegeben wird.</p>
<p>Wenn Sie einen Test bearbeiten und dieser/n Frage(n) mit einer negativen Kovarianz eine maximale Bewertung von Null zuweisen, wird die effektive Fragen-Gewichtung dieser Fragen Null sein und die echte effektive Fragen-Gewichtung anderer Fragen ist gleich der eben berechneten.</p>';
$string['nostudentsingroup'] = 'In dieser Gruppe sind bisher keine Teilnehmer/innen';
$string['optiongrade'] = 'Teilweise Bewertung';
$string['partofquestion'] = 'Teil der Frage';
$string['pluginname'] = 'Statistiken';
$string['position'] = 'Position';
$string['positions'] = 'Position(en)';
$string['questioninformation'] = 'Information zur Frage';
$string['questionname'] = 'Name der Frage';
$string['questionnumber'] = 'F#';
$string['questionstatistics'] = 'Statistik zur Frage';
$string['questionstatsfilename'] = 'Fragestatistik';
$string['questiontype'] = 'Typ der Frage';
$string['quizinformation'] = 'Test-Information';
$string['quizname'] = 'Test-Name';
$string['quizoverallstatistics'] = 'Test-Gesamtsatistik';
$string['quizstructureanalysis'] = 'Test-Strukturanalyse';
$string['random_guess_score'] = 'Zufällig angenommene Punktezahl';
$string['recalculatenow'] = 'Jetzt neu berechnen';
$string['response'] = 'Antwort';
$string['skewness'] = 'Schiefe der Punkteverteilung (für {$a})';
$string['standarddeviation'] = 'Standardabweichung (für {$a})';
$string['standarddeviationq'] = 'Standardabweichung';
$string['standarderror'] = 'Standardfehler (für {$a})';
$string['statistics'] = 'Statistik';
$string['statistics:componentname'] = 'Teststatistik-Report';
$string['statisticsreport'] = 'Statistik-Report';
$string['statisticsreportgraph'] = 'Statistik für Fragepositionen';
$string['statistics:view'] = 'Ansehen des Statistik-Reports';
$string['statsfor'] = 'Statistik (für {$a})';
