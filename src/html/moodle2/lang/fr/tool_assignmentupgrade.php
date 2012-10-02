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
 * Strings for component 'tool_assignmentupgrade', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = 'Vraiment ?';
$string['areyousuremessage'] = 'Voulez-vous vraiment mettre à jour le devoir « {$a->name} »?';
$string['assignmentid'] = 'ID du devoir';
$string['assignmentnotfound'] = 'Le devoir n\'a pas été trouvé (id={$a})';
$string['assignmentsperpage'] = 'Devoirs par page';
$string['assignmenttype'] = 'Type de devoir';
$string['backtoindex'] = 'Retour à l\'index';
$string['batchoperations'] = 'Opérations en lots';
$string['batchupgrade'] = 'Mettre à jour plusieurs devoirs';
$string['confirmbatchupgrade'] = 'Confirmer la mise à jour de plusieurs devoirs en lots';
$string['conversioncomplete'] = 'Devoir converti';
$string['conversionfailed'] = 'La mise à jour du devoir a échoué. Le message reçu est :<br />{$a}';
$string['listnotupgraded'] = 'Liste des devoirs qui n\'ont pas été mis à jour';
$string['listnotupgraded_desc'] = 'Vous pouvez mettre à jour des devoirs ici';
$string['noassignmentstoupgrade'] = 'Aucun devoir n\'a besoin d\'une mise à jour';
$string['notsupported'] = '';
$string['notupgradedintro'] = 'Cette page fournit une liste des devoirs créés avec une ancienne version de Moodle et qui n\'ont pas été mis à jour vers le nouveau module devoir de Moodle 2.3. Certains devoirs ne peuvent pas être mis à jour ; s\'ils ont été créés avec un type de devoir personnalisé, ce type doit être mis à jour dans le nouveau format de plugin de devoir afin de pouvoir effectuer la mise à jour.';
$string['notupgradedtitle'] = 'Devoirs non mis à jour';
$string['pluginname'] = 'Assistant de mise à jour des devoirs';
$string['select'] = 'Sélectionner';
$string['submissions'] = 'Travaux remis';
$string['supported'] = 'Mettre à jour';
$string['unknown'] = 'Inconnu';
$string['updatetable'] = 'Mettre à jour la table';
$string['upgradable'] = 'Mise à jour possible';
$string['upgradeall'] = 'Mettre à jour tous les devoirs';
$string['upgradeallconfirm'] = 'Mettre à jour tous les devoirs ?';
$string['upgradeassignmentfailed'] = 'La mise à jour a échoué. Le message reçu est :<br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Mise à jour effectuée avec succès';
$string['upgradeassignmentsummary'] = 'Mise à jour du devoir {$a->name} (Course: {$a->shortname})';
$string['upgradeprogress'] = 'Mise à jour du devoir {$a->current} sur {$a->total}';
$string['upgradeselected'] = 'Mettre à jour les devoirs sélectionnés';
$string['upgradeselectedcount'] = 'Mettre à jour les {$a} devoirs sélectionnés ?';
$string['upgradesingle'] = 'Mettre à jour un seul devoir';
$string['viewcourse'] = 'Afficher le cours avec le devoir converti';
