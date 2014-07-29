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
 * Strings for component 'assignfeedback_offline', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Confirmer l\'importation des notes';
$string['default'] = 'Activé par défaut';
$string['default_help'] = 'Si ce réglage est activé, la possibilité d\'évaluer hors ligne à l\'aide de formulaires sera activée par défaut.';
$string['downloadgrades'] = 'Télécharger le formulaire d\'évaluation';
$string['enabled'] = 'Formulaire d\'évaluation hors ligne';
$string['enabled_help'] = 'Si ce réglage est activé, l\'enseignant pourra télécharger, puis déposer un formulaire d\'évaluation comprenant les notes des étudiants.';
$string['feedbackupdate'] = 'Remplir le champ « {$a->field} » avec le texte« {$a->text} » pour l\'étudiant « {$a->student} »';
$string['gradelockedingradebook'] = 'La note de {$a} a été verrouillée dans le carnet de notes';
$string['graderecentlymodified'] = 'La note de {$a} a été modifiée dans Moodle plus récemment que dans le formulaire d\'évaluation.';
$string['gradesfile'] = 'Formulaire d\'évaluation (format CSV)';
$string['gradesfile_help'] = 'Le formulaire d\'évaluation avec les notes modifiées. Ce fichier doit être un fichier CSV télécharger depuis ce devoir et doit contenir des colonnes pour les notes des étudiants et leur identifiant. L\'encodage doit être UTF-8.';
$string['gradeupdate'] = 'Mettre la note {$a->grade} à l\'étudiant {$a->student}';
$string['ignoremodified'] = 'Autorise la modification de données modifiées plus récemment dans Moodle que dans le formulaire d\'évaluation.';
$string['ignoremodified_help'] = 'Lorsque le formulaire d\'évaluation est téléchargé depuis Moodle, il comporte la date de la dernière modification de chaque note. Si l\'une des notes est modifiée dans Moodle après le téléchargement du formulaire, Moodle refusera d\'écraser cette note modifiée lors de l\'importation des notes par défaut. L\'activation de cette option désactive ce contrôle de sécurité et permet à des évaluateurs d\'écraser les notes données par d\'autres.';
$string['importgrades'] = 'Confirmer les modifications du formulaire d\'évaluation';
$string['invalidgradeimport'] = 'Moodle n\'a pas pu lire le formulaire d\'évaluation déposé. Assurez-vous que celui-ci est enregistré en format CSV et essayez à nouveau.';
$string['nochanges'] = 'Aucune modification de note n\'a été trouvée dans le formulaire déposé';
$string['offlinegradingworksheet'] = 'Notes';
$string['pluginname'] = 'Formulaire d\'évaluation hors ligne';
$string['processgrades'] = 'Importer des notes';
$string['skiprecord'] = 'Sauter l\'enregistrement';
$string['updatedgrades'] = '{$a} notes et feedbacks modifiés';
$string['updaterecord'] = 'Mettre à jour l\'enregistrement';
$string['uploadgrades'] = 'Déposer un formulaire d\'évaluation';
