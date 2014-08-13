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
 * Strings for component 'grading', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = 'La méthode {$a->method} est sélectionnée comme méthode d\'évaluation courante pour la zone « {$a->area} »';
$string['activemethodinfonone'] = 'Aucune méthode d\'évaluation avancée n\'est sélectionnée pour la zone « {$a->area} ». L\'évaluation simple directe sera utilisée.';
$string['changeactivemethod'] = 'Changer la méthode d\'évaluation courante à';
$string['clicktoclose'] = 'Cliquer pour fermer';
$string['exc_gradingformelement'] = 'Impossible d\'instancier l\'élément de formulaire d\'évaluation';
$string['formnotavailable'] = 'Une méthode d\'évaluation avancée a été choisie, mais le formulaire d\'évaluation n\'est pas encore disponible. Veuillez le définir au moyen du lien dans le bloc Administration.';
$string['gradingformunavailable'] = 'Remarque : le formulaire d\'évaluation avancée n\'est pas encore disponible. La méthode d\'évaluation simple  sera utilisée tant que le formulaire ne sera pas créé et validé.';
$string['gradingmanagement'] = 'Évaluation avancée';
$string['gradingmanagementtitle'] = 'Évaluation avancée : {$a->component} ({$a->area})';
$string['gradingmethod'] = 'Méthode d\'évaluation';
$string['gradingmethod_help'] = 'Choisissez la méthode d\'évaluation avancée qui doit être utilisée pour calculer les notes dans le contexte donné.

Pour désactiver l\'évaluation avancée et revenir à  la méthode d\'évaluation par défaut, choisissez « Évaluation simple directe ».';
$string['gradingmethodnone'] = 'Évaluation simple directe';
$string['gradingmethods'] = 'Méthodes d\'évaluation';
$string['manageactionclone'] = 'Créer un formulaire d\'évaluation à partir d\'un modèle';
$string['manageactiondelete'] = 'Supprimer le formulaire défini actuellement';
$string['manageactiondeleteconfirm'] = 'Vous êtes sur le point de supprimer le formulaire d\'évaluation « {$a->formname} » et toutes les informations associées de « {$a->component} ({$a->area}) ». Veuillez vérifier que vous avez bien envisagé les conséquences suivantes :

* il n\'y a aucun moyen de revenir en arrière ;
* vous pouvez revenir à une autre méthode d\'évaluation, y compris l\'évaluation simple directe, sans supprimer ce formulaire ;
* toutes les informations sur la façon de renseigner le formulaire seront perdues ;
* les évaluations calculées enregistrées dans le carnet de notes ne seront pas touchées. Cependant l\'explication de la façon dont elles ont été calculées ne sera pas disponible ;
* cette opération n\'a pas d\'effet sur des copies éventuelles de ce formulaire dans d\'autres activités.';
$string['manageactiondeletedone'] = 'Le formulaire a été supprimé';
$string['manageactionedit'] = 'Modifier la définition du formulaire actuel';
$string['manageactionnew'] = 'Définir un formulaire d\'évaluation';
$string['manageactionshare'] = 'Publier le formulaire comme modèle';
$string['manageactionshareconfirm'] = 'Vous êtes sur le point d\'enregistrer une copie du formulaire d\'évaluation « {$a} » comme modèle public. D\'autres utilisateurs de votre site pourront créer des formulaires d\'évaluation dans leurs activités à partir de ce modèle.';
$string['manageactionsharedone'] = 'Le formulaire a été enregistré comme modèle';
$string['noitemid'] = 'Évaluation impossible. L\'élément d\'évaluation n\'existe pas.';
$string['nosharedformfound'] = 'Aucun modèle trouvé';
$string['searchownforms'] = 'Inclure mes propres formulaires';
$string['searchtemplate'] = 'Recherche de formulaires d\'évaluation';
$string['searchtemplate_help'] = 'Vous pouvez rechercher un formulaire d\'évaluation et l\'utiliser comme modèle pour créer un nouveau formulaire. Tapez de simples mots sensés apparaître dans le formulaire cherché ou dans sa description. Pour rechercher une phrase, tapez le texte entre des guillemets droits.

Par défaut, seuls les formulaires enregistrés comme modèles sont inclus dans les résultats de recherche. Vous pouvez y inclure vos propres formulaires, ce qui vous permettra de les réutiliser sans les partager. Seuls les formulaires marqués comme « prêts à l\'usage » sont réutilisables ainsi.';
$string['statusdraft'] = 'Brouillon';
$string['statusready'] = 'Prêt à l\'usage';
$string['templatedelete'] = 'Supprimer';
$string['templatedeleteconfirm'] = 'Vous êtes sur le point de supprimer le modèle « {$a} ». La suppression d\'un modèle n\'a pas d\'effet sur les formulaires créés sur sa base.';
$string['templateedit'] = 'Modifier';
$string['templatepick'] = 'Utiliser ce modèle';
$string['templatepickconfirm'] = 'Voulez-vous utiliser le formulaire « {$a->formname} » comme modèle pour le nouveau formulaire d\'évaluation dans « {$a->component} ({$a->area}) »?';
$string['templatepickownform'] = 'Utiliser ce formulaire comme modèle';
$string['templatesource'] = 'Zone : {$a->component} ({$a->area})';
$string['templatetypeown'] = 'Propre formulaire';
$string['templatetypeshared'] = 'Modèle partagé';
