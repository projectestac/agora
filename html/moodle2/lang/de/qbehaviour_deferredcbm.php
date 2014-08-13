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
 * Strings for component 'qbehaviour_deferredcbm', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Genauigkeit';
$string['accuracyandbonus'] = 'Genauigkeit + Bonus';
$string['assumingcertainty'] = 'Sie haben nicht angegeben wie sicher Sie sich Ihrer Antwort sind: Vermutlich: {$a}.';
$string['averagecbmmark'] = 'Durchschnittlicher CBM Wert';
$string['basemark'] = 'Basiswert {$a}';
$string['breakdownbycertainty'] = 'Unterteilung nach Gewissheit';
$string['cbmbonus'] = 'CBM-Bonus';
$string['cbmgradeexplanation'] = 'Für CBM: die Bewertung oben wird relativ zum Höchstwert aller richtigen bei C=1 gezeigt.';
$string['cbmgrades'] = 'CBM Bewertungen';
$string['cbmgrades_help'] = 'Jede richtige Antwort mit dem Wert C=1 (geringe Gewissheit) führt zu einer 100% Bewertung bei der Gewissheits-basierten Bewertung (Certainty Based Marking = CBM). Die Bewertung der Frage kann auch dreimal so hoch sein, wenn die richtige Antwort mit hoher Gewissheit (C=3) verbunden ist. Fehleinschätzungen bei der Gewissheit über die Antwort beeinflussen die Bewertung sehr viel stärker als die Angabe von Unsicherheit.

**Accuracy** is the % correct ignoring certainty but weighted for the maximum mark of each question. Successfully distinguishing more and less reliable responses gives a better grade than selecting the same certainty for each question. This is reflected in the **CBM Bonus**. **Accuracy** + **CBM Bonus** is a better measure of knowledge than **Accuracy**. Misconceptions can lead to a negative bonus, a warning to look carefully at what is and is not known.';
$string['cbmmark'] = 'CBM-Wert {$a}';
$string['certainty'] = 'Gewissheit';
$string['certainty1'] = 'C=1 Nicht sehr (< 67%)';
$string['certainty-1'] = 'Keine Idee';
$string['certainty2'] = 'C=2 Ziemlich (über 67%)';
$string['certainty3'] = 'C=3 Sehr (über 80%)';
$string['certainty_help'] = 'Gewissheits-begründete Bewertung berücksichtigt beio der Bewertung wie sicher die Antwortgeber sich mit ihrer Antwort sind. Folgende Level werden berücksichtigt:

Level | C=1 (Unsicher) | C=2 (mittel) | C=3 (sehr sicher)
------------------- | ------------ | --------- | ----------------
Bewertung bei richtig | 1| 2 | 3
Bewertung bei falsch | 0 | -2 | -6
Wahrscheinlichkeit für richtig | <67 % | 67-80 % | >80 %

Beste Bewertungen werden erzielt wenn man sich als unsicher einschätzt. Wenn Sie z.B. glauben mit einer Wahrscheinlichkeit von 1 zu 3 sei die Antwort falsch, so sollten Sie C=1 eingeben, um eine negative Bewertung zu vermeiden.';
$string['certaintyshort1'] = 'C=1';
$string['certaintyshort-1'] = 'Keine Idee';
$string['certaintyshort2'] = 'C=2';
$string['certaintyshort3'] = 'C=3';
$string['dontknow'] = 'Keine Idee';
$string['foransweredquestions'] = 'Ergebnisse für die {$a} beantworteten Fragen';
$string['forentirequiz'] = 'Ergebnisse für den gesamten Test ({$a} Fragen)';
$string['howcertainareyou'] = 'Wie sicher sind Sie? {$a->help}: {$a->choices}';
$string['judgementok'] = 'OK';
$string['judgementsummary'] = 'Antworten: {$a->responses}. Genauigkeit: {$a->fraction}. (Optimaler Bereich von {$a->idealrangelow} bis {$a->idealrangehigh}). Sie haben {$a->judgement} erreicht.';
$string['noquestions'] = 'Keine Antworten';
$string['overconfident'] = 'überdurchschnittlich sicher';
$string['pluginname'] = 'Spätere Auswertung (mit Selbsteinschätzung)';
$string['slightlyoverconfident'] = 'etwas über Durchschnitt';
$string['slightlyunderconfident'] = 'ein wenig unter Durchschnitt';
$string['underconfident'] = 'unterdurchschnittlich';
