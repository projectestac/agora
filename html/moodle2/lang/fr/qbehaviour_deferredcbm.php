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
 * Strings for component 'qbehaviour_deferredcbm', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Précision';
$string['accuracyandbonus'] = 'Précision + bonus';
$string['assumingcertainty'] = 'Vous n\'avez pas sélectionné de degré de certitude. Supposition : {$a}.';
$string['averagecbmmark'] = 'Évaluation moyenne du degré de certitude';
$string['basemark'] = 'Évaluation de base {$a}';
$string['breakdownbycertainty'] = 'Ventilé par certitude';
$string['cbmbonus'] = 'Bonus degré de certitude';
$string['cbmgradeexplanation'] = 'Dans l\'évaluation avec indication de certitude, la note ci-dessus est affichée relativement au maximum pour toutes les réponses correctes, avec C = 1.';
$string['cbmgrades'] = 'Notes avec degré de certitude';
$string['cbmgrades_help'] = 'Dans l\'évaluation avec indication de certitude, on obtient une note de 100 % lorsque l\'on a répondu correctement à toutes les questions avec C = 1 (certitude faible). Les notes peuvent atteindre jusqu\'à 300 % si l\'on a répondu à correctement à chaque question avec C = 3 (certitude élevée). Les idées fausses (réponses fausses avec taux de certitude élevé) font descendre la note beaucoup plus que les réponses fausses avec une indication de certitude faible. Ceci peut avoir pour conséquence des notes négatives.

**Précision** est le pourcentage de réponses correctes sans tenir compte de l\'indication de certitude, mais pondéré en fonction du maximum de chaque question. La capacité de distinguer entre réponses plus ou moins fiables donne une meilleure note que le choix du même degré de certitude pour chaque réponse.
**Précision** + **Bonus degré de certitude** est une meilleure mesure que **Précision**. Les idées fausses peuvent mener à un bonus négatif, incitant à réfléchir sur ce qui est su et ce qui ne l\'est pas.';
$string['cbmmark'] = 'Évaluation du degré de certitude {$a}';
$string['certainty'] = 'Certitude';
$string['certainty1'] = 'C = 1 (peu sûr : < 67%)';
$string['certainty-1'] = 'Aucune idée';
$string['certainty2'] = 'C = 2 (moyennement sûr : > 67%)';
$string['certainty3'] = 'C = 3 (tout à fait sûr : > 80%)';
$string['certainty_help'] = 'L\'évaluation avec indication de certitude demande que vous indiquiez à quel degré vous pensez que votre réponse est correcte. Les degrés de certitude sont :

Degré de certitude  | C=1 (pas sûr) | C=2 (moyen) | C=3 (très sûr)
------------------- | ------------- | ----------- | --------------
Points si correct   |    1          |    2        |     3
Points si incorrect |    0          |   -2        |    -6
Probabilité correct |  < 67%        | 67-80%      |  > 80%

On gagne plus de points en reconnaissant son incertitude. Par exemple, si vous pensez qu\'il y a 1 chance sur 3 que votre réponse soit fausse, vous devriez saisir C = 1 et éviter ainsi le risque d\'obtenir des points négatifs.';
$string['certaintyshort1'] = 'C = 1';
$string['certaintyshort-1'] = 'Aucune idée';
$string['certaintyshort2'] = 'C = 2';
$string['certaintyshort3'] = 'C = 3';
$string['dontknow'] = 'Aucune idée';
$string['foransweredquestions'] = 'Résultats pour les {$a} questions répondues';
$string['forentirequiz'] = 'Résultats tout le test ({$a} questions)';
$string['howcertainareyou'] = 'Degré de certitude{$a->help} : {$a->choices}';
$string['judgementok'] = 'Ok';
$string['judgementsummary'] = 'Réponses : {$a->responses}. Précision : {$a->fraction}. (Plage optimale {$a->idealrangelow} à {$a->idealrangehigh}). You were {$a->judgement} using this certainty level.';
$string['noquestions'] = 'Pas de réponse';
$string['overconfident'] = 'trop confiant';
$string['pluginname'] = 'Feedback a posteriori avec indication de certitude';
$string['slightlyoverconfident'] = 'un peu trop confiant';
$string['slightlyunderconfident'] = 'un peu trop prudent';
$string['underconfident'] = 'trop prudent';
