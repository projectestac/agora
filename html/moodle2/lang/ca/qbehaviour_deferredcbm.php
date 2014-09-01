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
 * Strings for component 'qbehaviour_deferredcbm', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Precisió';
$string['accuracyandbonus'] = 'Precisió + Bonificació';
$string['assumingcertainty'] = 'No heu escollit una certesa. S\'assumeix {$a}.';
$string['averagecbmmark'] = 'Puntuació QBC (CBM) mitjana';
$string['basemark'] = 'Qualificació base {$a}';
$string['breakdownbycertainty'] = 'Desglossament per certesa';
$string['cbmbonus'] = 'Bonificació QBC (CBM)';
$string['cbmgradeexplanation'] = 'Per a QBC (CBM), la qualificació del damunt es mostra en relació amb el màxim de les correctes amb C = 1.';
$string['cbmgrades'] = 'Qualificacions QBC (CBM)';
$string['cbmgrades_help'] = 'Amb Qualificació Basada en la Certesa (Certainty Based Marking, CBM) aconseguint cada pregunta correcta amb C = 1 (certesa baixa) s\'obté una qualificació de 100%. Les qualificacions poden ser tan altes com 300% si cada pregunta és correcta amb C = 3 (certesa alta). Els errors conceptuals (respostes equivocades en què es confia molt) baixen la qualificació molt més que respostes equivocades que són reconegudes com a incertes. Això pot fins i tot conduir a qualificacions globals negatives.

**Precisió** és el % d\'encerts ignorant la certesa però ponderat per la nota màxima de cada pregunta. Distingir correctament les respostes més fiables de les que són menys fiables dóna una millor nota que seleccionar la mateixa certesa per a cada pregunta. Això es reflecteix en el ** Bonus CBM **.

**Precisió** + **Bonificació QBC** és una millor mesura del coneixement que **Precisió**. Els errors conceptuals poden portar a bonificacions negatives, una advertència per tal de fixar-se amb cura en allò que se sap i allò que no.';
$string['cbmmark'] = 'Puntuació QBC (CBM) {$a}';
$string['certainty'] = 'Certesa';
$string['certainty1'] = 'C=1 (Indecís: <67% )';
$string['certainty-1'] = 'Ni idea';
$string['certainty2'] = 'C=2 (Mitjana: > 67%)';
$string['certainty3'] = 'C=3 (Força segur: > 80%)';
$string['certainty_help'] = 'Per qualificar basant-se en la certesa cal que indiqueu el grau de confiança que teniu en la vostra resposta. Els nivells disponibles són:

Nivell de Certesa         | C = 1 (Indecís)  | C = 2 (Mig)   | C = 3 (Força segur)
--------------------------| ---------------- | ------------- | -------------------
Puntuació si és correcte  |        1         |       2       |       3
Puntuació si errònia      |        0         |      -2       |      -6
Probabilitat correcta     |       <67%       |     67-80%    |     > 80%

Les millors qualificacions s\'aconsegueixen reconeixent la incertesa. Per exemple, si us sembla que la probabilitat d\'equivocar-se és més alta d\'1/3, s\'ha d\'entrar C = 1 i evitar el risc d\'una qualificació negativa.';
$string['certaintyshort1'] = 'C=1';
$string['certaintyshort-1'] = 'Ni idea';
$string['certaintyshort2'] = 'C=2';
$string['certaintyshort3'] = 'C=3';
$string['dontknow'] = 'Ni idea';
$string['foransweredquestions'] = 'Resultats per les {$a}  respostes donades fins ara';
$string['forentirequiz'] = 'Resultats pel conjunt del qüestionari ({$a} preguntes)';
$string['howcertainareyou'] = 'Grau de certesa{$a->help}: {$a->choices}';
$string['judgementok'] = 'D\'acord';
$string['judgementsummary'] = 'Respostes: {$a->responses}. Precisió: {$a->fraction}. (Interval òptim des de {$a->idealrangelow} fins {$a->idealrangehigh}). Esteu al {$a->judgement}  utilitzant aquest nivell de certesa.';
$string['noquestions'] = 'Sense respostes';
$string['overconfident'] = 'excés de confiança';
$string['pluginname'] = 'Retroacció diferida amb QBC (CBM)';
$string['slightlyoverconfident'] = 'una mica massa confiat';
$string['slightlyunderconfident'] = 'un poc baix de confiança';
$string['underconfident'] = 'molt poca confiança';
