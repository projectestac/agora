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
 * Strings for component 'block_glossary_export_to_quiz', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   block_glossary_export_to_quiz
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allentries'] = 'Tous les articles';
$string['clicktoexport'] = 'Cliquez pour exporter ce glossaire vers un test (XML)';
$string['concept'] = 'Ordre alphabétique';
$string['emptyglossaries'] = 'Les glossaires de ce cours sont vides (aucun article)';
$string['emptyglossary'] = 'Le glossaire de ce cours est vide (aucun article)';
$string['exportentriestoxml'] = 'Exporter les articles vers un Test (XML)';
$string['firstmodified'] = 'Articles les plus anciens d\'abord';
$string['glossary_export_to_quiz:addinstance'] = 'Ajouter un nouveau bloc glossary_export_to_quiz';
$string['glossary_export_to_quiz:myaddinstance'] = 'Ajouter un nouveau bloc glossary_export_to_quiz à Ma page Moodle';
$string['lastmodified'] = 'Articles les plus récents d\'abord';
$string['limitnum'] = 'Nombre maximum d\'articles à exporter';
$string['limitnum_help'] = 'Laissez ce champ vide pour exporter tous les articles du glossaire ou de la catégorie sélectionné.
Cette option peut être utile pour restreindre le nombre d\'articles à exporter depuis un glossaire qui en contient un grand nombre.';
$string['multichoice'] = 'Questions à choix multiple';
$string['noglossaries'] = 'Il n\'y a pas de glossaires dans ce cours';
$string['nolink'] = 'Supprimer les liens automatiques';
$string['notenoughentries'] = 'Pas assez d\'articles (<b>{$a->numentries}</b>) dans ce glossaire <em>{$a->varnotenough}</em> pour des questions de type QCM.';
$string['notyetconfigured'] = '<b>Activez le mode édition</b> pour configurer ce bloc.';
$string['notyetconfiguredediting'] = 'Veuillez configurer ce bloc en cliquant sur l\'icône de modification.';
$string['numentries'] = '[Exporter {$a} articles]';
$string['pluginname'] = 'Exporter un glossaire vers un Test';
$string['questiontype'] = 'Type de question :';
$string['questiontype_help'] = 'Les entrées de glossaire peuvent être exportées vers la banque de questions de Test selon deux types de questions.
Les questions à choix multipes (QCM) comprendront les éléments suivants :

    * texte de la question = définition de l\'entrée de glossaire
    * réponse correcte = concept de l\'entrée de glossaire
    * distracteurs = 3 concepts choisis aux hasard dans le glossaire (ou la catégorie) sélectionné pour l\'export de questions.

Réponse courte

    * Insensible à la casse. On acceptera comme correcte toute réponse de l\'étudiant sans tenir compte de la casse (majuscules/minuscules).
          o Exemple: concept du glossaire "Moodle". Réponses acceptées comme correctes: "Moodle", "moodle".
    * Sensible à la casse. On acceptera comme correcte uniquement la réponse de l\'étudiant tenant compte de la casse (majuscules/minuscules) originale.
          o Exemple: concept du glossaire "Moodle". Réponse acceptée comme correcte: "Moodle".';
$string['random'] = 'Au hasard';
$string['selectglossary'] = 'Choisir le glossaire à utiliser pour l\'export';
$string['selectglossary_help'] = 'Utilisez la liste déroulante pour choisir le glossaire dont vous souhaitez exporter les articles
vers la banque de questions du module Test.

Si ce glossaire comporte des catégories, vous pouvez choisir d\'exporter les articles d\'une catégorie seulement.

Pour annuler votre choix ou ré-initialiser les paramètres, laissez la liste déroulante sur l\'option Choisir...';
$string['shortanswer'] = 'Réponse courte';
$string['shortanswer_0'] = 'Réponse courte (insensible à la casse)';
$string['shortanswer_1'] = 'Réponse courte (sensible à la casse)';
$string['sortingorder'] = 'Ordre de tri';
$string['sortingorder_help'] = 'Utilisez ce paramètre pour déterminer l\'ordre dans lequel les entrées de glossaire exportées seront importées dans votre banque de questions.
Vous pouvez utiliser de paramètre, combiné avec celui du nombre maximum d\'entrées à exporter, pour créer un Test destiné à tester les entrées les plus récentes de votre Glossaire (en particulier s\'il s\'agit d\'un Glossaire avec de nombreuses entrées).';
