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
 * Strings for component 'qtype_gapfill', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_gapfill
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answerdisplay'] = 'Afficher les réponses';
$string['answerdisplay_help'] = 'Le mode « glisser-déposer » propose une liste de mots qui peuvent compléter les champs vides, le mode « texte à trous » autorise la saisie d\'une réponse sans propositions de mots, le mode « liste déroulante » propose une liste de réponses pour chaque champ à remplir';
$string['casesensitive'] = 'Sensible à la casse';
$string['casesensitive_help'] = 'Quand cette option est activée, si la bonne réponse est « CHAT », « chat » sera considéré comme mauvaise réponse';
$string['delimitchars'] = 'Caractères de délimitation';
$string['delimitchars_help'] = 'Changer les caractères qui délimitent un champ par défaut [ ], utile pour les questions de langage de programmation';
$string['disableregex'] = 'Désactiver Regex';
$string['disableregex_help'] = 'Désactive le traitement des expressions régulières et effectue une comparaison de chaîne standard. Utile par exemple pour les expressions html dont les chevrons (&lt; et &gt;) doivent être interprétés littéralement et pour les mathématiques dont des symboles tels que * doivent être interprétés littéralement plutôt que comme des expressions';
$string['displaydragdrop'] = 'glisser-déposer';
$string['displaydropdown'] = 'liste déroulante';
$string['displaygapfill'] = 'texte à trous';
$string['duplicatepartialcredit'] = 'Le résultat n\'est pas juste car vous avez des réponses en double';
$string['gapfill'] = 'Gapfill.';
$string['moreoptions'] = 'Plus d\'options.';
$string['noduplicates'] = 'Pas de doublons';
$string['noduplicates_help'] = 'Si cette option est activée, chaque réponse doit être unique, ce qui est utile lorsque chaque champ possède un | comme opérateur. Par exemple : Quelles sont les couleurs des médailles olympiques ? Chaque champ est composé de [or|argent|bronze], si l\'étudiant choisit « or » 3 fois, seul le premier champ sera compté comme juste (les autres ne seront pas considérés comme des bonnes réponses). Cela permet d\'éliminer au fur et à mesure les propostitions disponibles et ainsi éviter tous doublons dans les réponses';
$string['pleaseenterananswer'] = 'Saisissez la réponse.';
$string['pluginname'] = 'Gapfill question type';
$string['pluginnameadding'] = 'Ajout d\'une question Gap Fill.';
$string['pluginnameediting'] = 'Édite Gap Fill.';
$string['pluginname_help'] = 'Placer les mots à compléter entre crochets. Exemple : Le [chat] était assis sur le [tapis]. Si le tapis ou la couverture sont autorisés, saisir [tapis|couverture]. Les modes Liste déroulante et glisser-déposer permettent d\'utiliser une liste de réponses aléatoires dans laquelle peuvent-être incluses des mauvaises réponses appelées « distracteurs ».';
$string['pluginname_link'] = 'question/type/gapfill';
$string['pluginnamesummary'] = 'Une simplification des questions de type texte à trous. Moins de fonctionnalités que les questions cloze standard mais une syntaxe simplifiée';
$string['questionsmissing'] = 'Vous n\'avez pas ajouter de champ dans le texte de votre question';
$string['wronganswers'] = 'Distracteurs.';
$string['wronganswers_help'] = 'Liste de mauvaises réponses faite pour détourner l\'étudiant des bonnes réponses. Chaque mot est séparé par des virgules, disponible seulement dans les modes glisser-déposer et liste déroulante';
$string['yougotnrightcount'] = 'Votre nombre de réponses correctes est {$a->num}.';
