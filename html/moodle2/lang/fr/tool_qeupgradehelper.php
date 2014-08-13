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
 * Strings for component 'tool_qeupgradehelper', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Action';
$string['alreadydone'] = 'Tout a été déjà converti';
$string['areyousure'] = 'Voulez-vous vraiment continuer ?';
$string['areyousuremessage'] = 'Voulez-vous procéder à la mise à jour des {$a->numtoconvert} tentatives du test « {$a->name} » du cours {$a->shortname} ?';
$string['areyousureresetmessage'] = 'Le test « {$a->name} » du cours {$a->shortname} a {$a->totalattempts} tentatives, dont {$a->convertedattempts} ont été mises à jour. Parmi celles-ci, {$a->resettableattempts} peuvent être réinitialisées, pour une reconversion ultérieure. Voulez-vous faire cela ?';
$string['attemptstoconvert'] = 'Tentatives nécessitant une conversion';
$string['backtoindex'] = 'Retour à la page principale';
$string['conversioncomplete'] = 'Conversion effectuée';
$string['convertattempts'] = 'Conversion des tentatives';
$string['convertedattempts'] = 'Tentatives converties';
$string['convertquiz'] = 'Conversion des tentatives...';
$string['cronenabled'] = 'Cron activé';
$string['croninstructions'] = 'Vous pouvez activer le cron pour terminer une mise à jour partielle déjà commencée. Le cron va fonctionner durant une plage horaire définie (en phase avec le réglage local du serveur). Chaque fois que le cron fonctionne, il va traiter un nombre de tentatives jusqu\'à ce que le temps limite soit épuisé, puis stoppera et attendra la prochaine exécution.
Même si vous avez configuré le cron, il ne fera rien tant qu\'il ne détectera pas que la mise à jour principale vers la version 2.1 est terminée.';
$string['cronprocesingtime'] = 'Temps de fonctionnement à chaque lancement de cron.';
$string['cronsetup'] = 'Configurer le cron';
$string['cronsetup_desc'] = 'Vous pouvez configurer le cron pour terminer la mise à jour des tentatives de test automatiquement.';
$string['cronstarthour'] = 'Heure de démarrage';
$string['cronstophour'] = 'Heure de fin';
$string['extracttestcase'] = 'Extraire cas de test';
$string['extracttestcase_desc'] = 'Utiliser des données d\'exemple issues de la base de données pour aider à créer des tests qui pourront être utilisés pour tester la mise à jour.';
$string['gotoindex'] = 'Retour à la liste des tests pouvant être mis à jour';
$string['gotoquizreport'] = 'Aller au rapport de ce test, pour vérifier l\'état de la mise à jour';
$string['gotoresetlink'] = 'Retour à la liste des tests pouvant être réinitialisés';
$string['includedintheupgrade'] = 'Inclus dans la mise à jour ?';
$string['invalidquizid'] = 'Identifiant de test non valide. Soit le test n\'existe pas, soit il n\'a pas de tentatives à convertir.';
$string['listpreupgrade'] = 'Lister les tests et tentatives';
$string['listpreupgrade_desc'] = 'Ceci va afficher un rapport de tous les tests du système ainsi que le nombre de tentatives qui leur sont associées. Cela vous donnera une idée de l\'importance de la mise à jour que vous allez avoir à effectuer.';
$string['listpreupgradeintro'] = 'Ceci est le nombre de tentatives de test qui devront être mises à jour. Une dizaine de milliers n\'est pas préoccupant. S\'il y en a beaucoup plus, vous devrez pensez au temps de mise à jour nécessaire.';
$string['listtodo'] = 'Lister les tests restant à mettre à jour';
$string['listtodo_desc'] = 'Cela affichera un rapport de tous les tests du système (s\'il y en a) possédant des tentatives qui ont besoin d\'être mises à jour pour le nouveau moteur de question.';
$string['listtodointro'] = 'Voici tous les tests avec des tentatives ayant besoin d\'être mises à jour. Vous pouvez convertir les tentatives en cliquant sur le lien.';
$string['listupgraded'] = 'Lister les tests déjà mis à jour et pouvant être réinitialisés';
$string['listupgraded_desc'] = 'Ceci affichera un rapport de tous les tests du système dont les tentatives ont été mises à jour, mais dont les anciennes données sont encore présentes et où la mise à jour peut donc être annulée et recommencée.';
$string['listupgradedintro'] = 'Voici tous les tests du système dont les tentatives ont été mises à jour, mais dont les anciennes données sont encore présentes et où la mise à jour peut donc être annulée et recommencée.';
$string['noquizattempts'] = 'Votre site n\'a aucune tentative de test !';
$string['nothingupgradedyet'] = 'Aucune tentative mise à jour ne peut être réinitialisée';
$string['notupgradedsiterequired'] = 'Ce script ne peut fonctionner qu\'avant la mise à jour du site.';
$string['numberofattempts'] = 'Nombre de tentatives de test';
$string['oldsitedetected'] = 'Il semble que ce site n\'a pas encore été mis à jour pour inclure le nouveau moteur de question.';
$string['outof'] = '{$a->some} sur {$a->total}';
$string['pluginname'] = 'Aide sur la mise à jour du moteur de question';
$string['pretendupgrade'] = 'Faire une simulation de la mise à jour des tentatives';
$string['pretendupgrade_desc'] = 'La mise à jour effectue trois tâches :
* chargement des données depuis la base de données,
* transformation de ces données,
* inscription des données transformées dans la base de données.
Ce script va tester les deux premières parties de ce processus.';
$string['questionsessions'] = 'Session de question';
$string['quizid'] = 'Identifiant du test';
$string['quizupgrade'] = 'Statut de la mise à jour du test';
$string['quizzesthatcanbereset'] = 'Les tests suivants ont des tentatives converties que vous pouvez réinitialiser.';
$string['quizzestobeupgraded'] = 'Tous les tests avec des tentatives';
$string['quizzeswithunconverted'] = 'Les tests suivants ont des tentatives qui doivent être converties';
$string['resetcomplete'] = 'Réinitialisation effectuée';
$string['resetquiz'] = 'Réinitialiser les tentatives...';
$string['resettingquizattempts'] = 'Réinitialiser les tentatives de tests';
$string['resettingquizattemptsprogress'] = 'Réinitialisation des tentatives {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = 'Il semble que ce site ait été mis en jour en incluant le nouveau moteur de question.';
$string['upgradedsiterequired'] = 'Ce script ne pourra fonctionner qu\'après la mise à jour du site.';
$string['upgradingquizattempts'] = 'Mise à jour des tentatives pour le test « {$a->name} » dans le cours {$a->shortname}';
$string['veryoldattemtps'] = 'Votre site a {$a} tentatives de test qui n\'ont pas été totalement converties durant la mise à jour de Moodle 1.4 à Moodle 1.5. Ces tentatives seront traitées avant la véritable mise à jour. Veuillez prendre en compte ce temps de traitement supplémentaire.';
