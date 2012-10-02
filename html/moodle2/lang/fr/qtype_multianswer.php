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
 * Strings for component 'qtype_multianswer', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   qtype_multianswer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmquestionsaveasedited'] = 'Je confirme que je veux enregistrer la question telle que modifiée';
$string['confirmsave'] = 'Confirmer, puis enregistrer {$a}';
$string['correctanswer'] = 'Réponse correcte';
$string['correctanswerandfeedback'] = 'Réponse correcte et feedback';
$string['decodeverifyquestiontext'] = 'Décoder et vérifier le texte de la question';
$string['layout'] = 'Disposition';
$string['layouthorizontal'] = 'Rangée horizontale de boutons radio';
$string['layoutselectinline'] = 'Menu déroulant intégré au texte';
$string['layoutundefined'] = 'Disposition non définie';
$string['layoutvertical'] = 'Colonne verticale de boutons radio';
$string['nooptionsforsubquestion'] = 'Impossible d\'obtenir les options de la partie de question no {$a->sub} (question->id={$a->id})';
$string['noquestions'] = 'La question Cloze (multianswer) « <strong>{$a}</strong> » ne contient aucune question';
$string['pluginname'] = 'Question Cloze';
$string['pluginnameadding'] = 'Ajout d\'une question Cloze';
$string['pluginnameediting'] = 'Modification d\'une question Cloze';
$string['pluginname_help'] = 'Les questions à réponses intégrées (Cloze) sont formées d\'un texte au sein duquel dont inclues des questions à choix multiples et des questions à réponse courte.';
$string['pluginnamesummary'] = 'Les questions de ce type sont très flexibles, mais ne peuvent être créées qu\'en tapant du texte suivant un format particulier avec des codes spécifiques qui crééent des questions à choix multiples, des questions à réponses courtes et des questions numériques intégrées.';
$string['qtypenotrecognized'] = 'Le type de question {$a} est inconnu';
$string['questiondefinition'] = 'Définition de question';
$string['questiondeleted'] = 'Question supprimée';
$string['questioninquiz'] = '<ul>
  <li>ajouter ou supprimer des questions,</li>
  <li>modifier l\'ordre des questions dans le texte,</li>
  <li>modifier le type de question (numérique, à réponse courte, à choix multiple).</li>
</ul>';
$string['questionnotfound'] = 'Impossible de trouver la partie {$a} de la question';
$string['questionsadded'] = 'Question ajoutée';
$string['questionsaveasedited'] = 'La question sera enregistrée comme modifiée';
$string['questionsless'] = '{$a} question(s) de moins que dans la question à réponses multiples enregistrée dans la base de données';
$string['questionsmissing'] = 'La question doit comporter au moins une réponse incorporée.';
$string['questionsmore'] = '{$a} question(s) de plus que dans la question à réponses multiples enregistrée dans la base de données';
$string['questiontypechanged'] = 'Type de question modifié';
$string['questiontypechangedcomment'] = 'Au moins un type de question a été modifié.<br />Avez-vous ajouté, supprimé ou déplacé une question ?<br />Veuillez vérifier.';
$string['questionusedinquiz'] = 'Cette question est utilisée dans {$a->nb_of_quiz} test(s), nombre total de tentative(s) : {$a->nb_of_attempts} ';
$string['storedqtype'] = 'Type de question enregistré {$a}';
$string['subqresponse'] = 'partie {$a->i} : {$a->response}';
$string['unknownquestiontypeofsubquestion'] = 'Type de question inconnu : {$a->type} de la partie de question no {$a->sub}';
$string['warningquestionmodified'] = '<b>ATTENTION</b>';
$string['youshouldnot'] = '<b>VOUS NE DEVRIEZ PAS</b>';
