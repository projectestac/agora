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
 * Strings for component 'qtype_gapselect', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_gapselect
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmorechoiceblanks'] = 'Vides pour {no} choix supplémentaires';
$string['answer'] = 'Réponse';
$string['choices'] = 'Choix';
$string['choicex'] = 'Choix {no}';
$string['correctansweris'] = 'La réponse correcte est : {$a}';
$string['errorblankchoice'] = 'Veuillez sélectionner un choix : le choix {$a} est vide.';
$string['errormissingchoice'] = 'Veuillez sélectionner le texte de la question : {$a} n\'a pas été trouvé parmi les choix possibles! Seuls les numéros de choix existants peuvent être utilisés dans les espaces réservés.';
$string['errornoslots'] = 'Le texte de la question doit contenir des espaces reservés du type [[1]] pour définir l\'emplacement des mots qui seront choisis.';
$string['errorquestiontextblank'] = 'Vous devez entrer le texte de la question.';
$string['group'] = 'Groupe';
$string['pleaseputananswerineachbox'] = 'Veuillez entrer une réponse dans chaque champ.';
$string['pluginname'] = 'Sélectionnez les mots manquants';
$string['pluginnameadding'] = 'Ajout d\'une question permettant de sélectionner le mot manquant';
$string['pluginnameediting'] = 'Modification d\'une question permettant de sélectionner le mot manquant';
$string['pluginname_help'] = 'Entrez une question du type « Le [[1]] saute par-dessus le [[2]] », puis entrez les différents mots possibles pour les trous 1 et 2.';
$string['pluginname_link'] = 'question/type/gapselect';
$string['pluginnamesummary'] = 'Les mots manquants des textes sont comblés en utilisant des listes déroulantes.';
$string['shuffle'] = 'Mélanger';
$string['tagsnotallowed'] = '{$a->tag} n\'est pas permis (seulement {$a->allowed} sont permis).';
$string['tagsnotallowedatall'] = '{$a->tag} n\'est pas permis (aucun code HTML n\'est permis ici).';
