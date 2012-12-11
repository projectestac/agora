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
 * Strings for component 'gradingform_rubric', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Ajouter critère';
$string['alwaysshowdefinition'] = 'Permet aux utilisateurs de prévisualiser la grille d\'évaluation dans le module (sinon, la grille ne sera visible qu\'après l\'évaluation)';
$string['backtoediting'] = 'Retour à l\'édition';
$string['confirmdeletecriterion'] = 'Voulez-vous vraiment supprimer ce critère ?';
$string['confirmdeletelevel'] = 'Voulez-vous vraiment supprimer ce niveau ?';
$string['criterionaddlevel'] = 'Ajouter niveau';
$string['criteriondelete'] = 'Supprimer le critère';
$string['criterionempty'] = 'Cliquer pour ajouter un critère';
$string['criterionmovedown'] = 'Déplacer vers le bas';
$string['criterionmoveup'] = 'Déplacer vers le haut';
$string['definerubric'] = 'Définir grille d\'évaluation';
$string['description'] = 'Description';
$string['enableremarks'] = 'Permettre à l\'évaluateur d\'ajouter des remarques textuelles pour chaque critère';
$string['err_mintwolevels'] = 'Chaque critère doit avoir au moins deux niveaux';
$string['err_nocriteria'] = 'Une grille d\'évaluation doit comporter au moins un critère';
$string['err_nodefinition'] = 'La définition du niveau doit être renseignée';
$string['err_nodescription'] = 'La description du critère doit être renseignée';
$string['err_scoreformat'] = 'Le nombre de points pour chaque niveau doit être un nombre non-négatif';
$string['err_totalscore'] = 'Le nombre maximal de points possible lors de l\'évaluation au moyen de la grille d\'évaluation doit être plus grand que zéro';
$string['gradingof'] = 'Évaluation de {$a}';
$string['leveldelete'] = 'Supprimer le niveau';
$string['levelempty'] = 'Cliquer pour modifier le niveau';
$string['name'] = 'Nom';
$string['needregrademessage'] = 'La définition de la grille d\'évaluation a été modifiée après que ce participant a été évalué. Le participant ne pourra voir cette grille d\'évaluation avant que vous mettiez à jour la note.';
$string['pluginname'] = 'Grille d\'évaluation';
$string['previewrubric'] = 'Prévisualiser la grille d\'évaluation';
$string['regrademessage1'] = 'Vous êtes sur le point d\'enregistrer des modifications à une grille d\'évaluation déjà utilisée pour une évaluation. Veuillez indiquer si les évaluations existantes doivent être revues. Dans ce cas, la grille d\'évaluation ne sera pas visible pour les participants, tant que leur élément n\'est pas réévalué.';
$string['regrademessage5'] = 'Vous êtes sur le point d\'enregistrer des modifications importantes à une grille d\'évaluation déjà utilisée pour une évaluation. La valeur dans le carnet de note ne sera pas modifiée, mais la grille d\'évaluation ne sera pas visible pour les participants, tant que leur élément n\'est pas réévalué.';
$string['regradeoption0'] = 'Ne pas marquer pour réévaluation';
$string['regradeoption1'] = 'Marquer pour réévaluation';
$string['restoredfromdraft'] = 'Remarque ! La dernière tentative d\'évaluation de ce participant n\'a pas été enregistrée correctement. Les notes brouillons ont donc été restaurées. Si vous désirez effacer ces modifications, utilisez le bouton « Annuler » ci-dessous.';
$string['rubric'] = 'Grille d\'évaluation';
$string['rubricmapping'] = 'Règles de correspondances entre score et note';
$string['rubricmappingexplained'] = 'Le score minimal possible pour cette grille d\'évaluation est de <b>{$a->minscore} points</b>. Ce score sera converti en la note minimale disponible pour cette activité (c\'est-à-dire zéro, à moins qu\'un barème ne soit utilisé).
Le score maximal possible <b>{$a->maxscore} points</b> sera converti en la note maximale disponible pour cette activité (c\'est-à-dire zéro, à moins qu\'un barème ne soit utilisé).<br />
Les scores intermédiaires seront convertis de la même façon et arrondis à la note disponible la plus proche.<br />
Si un barème est utilisé plutôt qu\'une note, le score sera converti dans les éléments du barème comme s\'il s\'agissait d\'entiers successifs.';
$string['rubricnotcompleted'] = 'Veuillez choisir quelque chose pour chaque critère';
$string['rubricoptions'] = 'Options de grille d\'évaluation';
$string['rubricstatus'] = 'Statut actuel de la grille d\'évaluation';
$string['save'] = 'Enregistrer';
$string['saverubric'] = 'Enregistrer la grille d\'évaluation et la rendre prête à l\'usage';
$string['saverubricdraft'] = 'Enregistrer comme brouillon';
$string['scorepostfix'] = '{$a} points';
$string['showdescriptionstudent'] = 'Afficher la description de la grille d\'évaluation aux participants évalués';
$string['showdescriptionteacher'] = 'Afficher la description de la grille d\'évaluation durant l\'évaluation';
$string['showremarksstudent'] = 'Afficher les remarques  aux participants évalués';
$string['showscorestudent'] = 'Afficher les points de chaque niveau aux participants évalués';
$string['showscoreteacher'] = 'Afficher les points de chaque niveau durant l\'évaluation';
$string['sortlevelsasc'] = 'Ordre de tri pour les niveaux :';
$string['sortlevelsasc0'] = 'Descendant par nombre de points';
$string['sortlevelsasc1'] = 'Ascendant par nombre de points';
