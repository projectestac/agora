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
 * Strings for component 'qbehaviour_deferredcbm', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Nauwkeurigheid';
$string['accuracyandbonus'] = 'Nauwkeurigheid + bonus';
$string['assumingcertainty'] = 'Je hebt geen zekerheid gekozen. {$a} verondersteld.';
$string['averagecbmmark'] = 'Gemiddelde CBM score';
$string['basemark'] = 'Basisscore {$a}';
$string['breakdownbycertainty'] = 'Splits op volgens zekerheid';
$string['cbmbonus'] = 'CBM bonus';
$string['cbmgradeexplanation'] = 'Het cijfer hierboven is relatief ten opzichte van het maximum voor all juiste antwoorden met  C=1';
$string['cbmgrades'] = 'CBM cijfers';
$string['cbmgrades_help'] = 'Met Certainty-Based Marking (CBM) krijgt elke vraag met een juist antwoord met C=1 (kleine zekerheid) een cijfer van 100%. Cijfers kunnen tot 300% stijgen als elke vraag juist is met C=3 (grote zekerheid). Een fout begrip (fout antwoord met veel zelfvertrouwen gegeven) verlaagt het cijfer meer dan een fout antwoord waarvoor de leerling toegeeft dat die niet zeker is. Dit kan zelfs leiden tot een negatieve totaalscore.

**Accuraatheid** is het percentage juiste antwoorden waarbij de zekerheid genegeerd wordt, maar gewogen voor het maximum cijfer van elke vraag. Het juist kunnen onderscheiden van meer of minder betrouwbare antwoorden levert een hoger cijfer op. dan dezelfde zekerheid selecteren voor elke vraag. Dit wordt weergegeven met de **CBM Bonus**. **Accuraatheid** + **CBM-Bonus** is een betere maat voor kennis dan enkel de **Accuraatheid**.  Slecht begrip kan leiden tot een negatieve bonus - een waarschuwing om goed na te denken over wat je zeker weet en wat je denkt te weten.';
$string['cbmmark'] = 'CBM score {$a}';
$string['certainty'] = 'Zekerheid';
$string['certainty1'] = 'Z=1 (Niet zeker: <67%)';
$string['certainty-1'] = 'Geen idee';
$string['certainty2'] = 'Z=2 (Gemiddeld: >67%)';
$string['certainty3'] = 'Z=3  (Heel zeker: >80%)';
$string['certainty_help'] = 'Bij toetsen met zekerheidsaanduiding of ook wel Certainty Based Marking (CBM) genoemd, moet je aangeven hoe betrouwbaar je antwoord is. De mogelijke niveau\'s zijn:

Zekerheidsniveau | C=1 (Niet zeker) | C=2 (Gemiddeld) | C=3 (Heel zeker)
------------------------- | ---------------------- | ------------------------ | -------------------------
Geef indien juist     |        1        |        2     |          3
Geef indien fout      |        0        |        -2   |         -6
Waarschijnlijk just  |    <67%   | 67-80% |    >80%

De beste scores worden verkregen door je onzekerheid toe te geven. Bijvoorbeeld als je denkt dat er meer dan 1 kans op 3 is dat je fout bent, geef dan Z=1 en vermijdt het risico van een negatief cijfer.';
$string['certaintyshort1'] = 'Z=1';
$string['certaintyshort-1'] = 'Geen idee';
$string['certaintyshort2'] = 'Z=2';
$string['certaintyshort3'] = 'Z=3';
$string['dontknow'] = 'Geen idee';
$string['foransweredquestions'] = 'Enkel voor de {$a} beantwoorde vragen';
$string['forentirequiz'] = 'Voor de hele test ({$a} vragen)';
$string['howcertainareyou'] = 'Zekerheid {$a->help}: {$a->choices}';
$string['judgementok'] = 'OK';
$string['judgementsummary'] = 'Antwoorden: {$a->responses}. Nauwkeurigheid: {$a->fraction}. (Optimaal bereik {$a->idealrangelow} tot {$a->idealrangehigh}). Je had {$a->judgement} met dit zekerheidsniveau.';
$string['noquestions'] = 'Geen antwoorden';
$string['overconfident'] = 'teveel zelfvertrouwen';
$string['pluginname'] = 'Uitgestelde feedback met CBM';
$string['slightlyoverconfident'] = 'een beetje veel zelfvertrouwen';
$string['slightlyunderconfident'] = 'een beetje weinig zelfvertrouwen';
$string['underconfident'] = 'te weinig zelfvertrouwen';
