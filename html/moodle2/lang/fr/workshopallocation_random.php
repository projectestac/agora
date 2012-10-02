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
 * Strings for component 'workshopallocation_random', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Ajouter les auto-évaluations';
$string['allocationaddeddetail'] = 'Nouvelle évaluation à effectuer : <strong>{$a->reviewername}</strong> est évaluateur de <strong>{$a->authorname}</strong>';
$string['allocationdeallocategraded'] = 'Impossible de supprimer l\'attribution de l\'évaluation déjà notée. Évaluateur : <strong>{$a->reviewername}</strong>, auteur du travail : <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = 'Évaluation réutilisée : <strong>{$a->reviewername}</strong> conservé comme relecteur de <strong>{$a->authorname}</strong>';
$string['allocationsettings'] = 'Réglages des attributions aléatoires';
$string['assessmentdeleteddetail'] = 'Attribution d\'évaluation supprimée : <strong>{$a->reviewername}</strong> n\'est plus évaluateur de <strong>{$a->authorname}</strong>';
$string['assesswosubmission'] = 'Les participants peuvent évaluer sans avoir remis de travail';
$string['confignumofreviews'] = 'Le nombre de travaux remis à attribuer aléatoirement';
$string['excludesamegroup'] = 'Empêcher les revues par des pairs du même groupe';
$string['noallocationtoadd'] = 'Aucune attribution à ajouter';
$string['nogroupusers'] = '<p>Attention ! Si l\'atelier est en mode « groupes visibles » ou en mode « groupes séparés », les utilisateurs doivent faire partie d\'au moins un groupe pour que des évaluations leur soient attribuées par cet outil. Il est cependant possible pour les utilisateurs ne faisant partie d\'aucun groupe de recevoir de nouvelles auto-évaluations ou de leur retirer des évaluations existantes.</p>
<p>Les utilisateurs ci-dessous ne sont pas actuellement dans un groupe : {$a}</p>';
$string['numofdeallocatedassessment'] = 'Suppression de l\'attribution de {$a} évaluation(s)';
$string['numofrandomlyallocatedsubmissions'] = 'Attribution aléatoire de {$a} travaux remis';
$string['numofreviews'] = 'Nombre d\'évaluations';
$string['numofselfallocatedsubmissions'] = 'Auto-attribution de {$a} travaux remis';
$string['numperauthor'] = 'par travail remis';
$string['numperreviewer'] = 'par évaluateur';
$string['pluginname'] = 'Attribution aléatoire';
$string['randomallocationdone'] = 'Attribution aléatoire effectuée';
$string['removecurrentallocations'] = 'Supprimer les attributions actuelles';
$string['resultnomorepeers'] = 'Il n\'y a plus de pair disponible';
$string['resultnomorepeersingroup'] = 'Il n\'y a plus de pair disponible dans ce groupe séparé';
$string['resultnotenoughpeers'] = 'Pas assez de pairs disponibles';
$string['resultnumperauthor'] = 'Tentative d\'attribuer {$a} relecture(s) par auteur';
$string['resultnumperreviewer'] = 'Tentative d\'attribuer {$a} relecture(s) par évaluateur';
$string['stats'] = 'Statistiques des attributions actuelles';
