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
 * Strings for component 'checklist', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   checklist
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomments'] = 'Ajouter des commentaires';
$string['additem'] = 'Ajouter';
$string['additemalt'] = 'Ajouter un nouvel élément à la liste';
$string['additemhere'] = 'Insérer le nouvel élément après celui-ci';
$string['addownitems'] = 'Ajouter vos propres items';
$string['addownitems-stop'] = 'Arrêt d\'ajout d\'éléments';
$string['allowmodulelinks'] = 'Autoriser les liens vers les éléments';
$string['anygrade'] = 'Tout';
$string['autopopulate'] = 'Montrer les éléments du cours dans la Liste des tâches';
$string['autopopulate_help'] = 'Cela ajoutera automatiquement une liste de toutes les ressources et les activités dans le cadre actuel dans la liste. <br />
Cette liste sera mise à jour avec tous les changements en cours, lorsque vous visitez la page « Modifier » pour la Liste des tâches. <br />
Les éléments peuvent être cachés dans la liste, en cliquant sur l\'icône « Cacher » à côté d\'eux.<br />
Pour supprimer les éléments automatiques de la liste, modifier cette option en cliquant sur « Non », puis cliquez sur « Supprimer des éléments de cours » sur la page « Modifier ».';
$string['autoupdate'] = 'Cochez quand les modules sont terminés';
$string['autoupdate_help'] = 'Cela va automatiquement cocher les éléments de votre Liste des tâches lorsque vous terminez l\'activité concernée dans le cours. <br />
« Finir » une activité varie d\'une activité à l\'autre - « voir » une ressource, « envoyer » un quiz ou un fichier, « répondre » à un forum ou participez à un chat, etc <br />
Si un suivi de fin de Moodle 2.0 est activé pour une activité particulière, il sera utilisé pour les cocher l\'élément dans la liste <br />
Pour plus de détails sur la cause exacte qu\'une activité peut être marqué comme « terminée », demandez à votre administrateur du site pour regarder dans le fichier « mod / liste / autoupdate.php » <br />
Remarque : cela peut prendre jusqu\'à 60 secondes pour que l\'activité d\'un étudiant se mette à jour dans leur Liste des tâches';
$string['autoupdatenote'] = 'Si le choix « étudiant » pour la modification automatique est coché, les mises à jour ne seront pas affichées dans les listes de tâches pour « Enseignant seul »';
$string['autoupdatewarning_both'] = 'Il y a des éléments sur cette liste qui seront automatiquement modifiés (comme ceux que les étudiants disent avoir terminé). Cependant, dans le cas d\'une Liste des tâches commune « étudiant et enseignant », les barres de progression ne seront pas modifiées tant qu\'un enseignant n\'accepte pas les notes attribuées.';
$string['autoupdatewarning_student'] = 'Il y a des éléments sur cette liste qui seront automatiquement modifiés (comme ceux que les étudiants disent avoir terminé).';
$string['autoupdatewarning_teacher'] = 'La modification automatique a été activée pour cette liste, mais ces remarques ne seront pas affichée tant que l\'enseignant ne les montre pas.';
$string['calendardescription'] = 'Cet élément a été ajouté par la Liste des tâches : {$a}';
$string['canceledititem'] = 'Effacer';
$string['changetextcolour'] = 'Prochaine couleur de texte';
$string['checkeditemsdeleted'] = 'Éléments de la Liste des tâches supprimés';
$string['checklist'] = 'Liste des tâches';
$string['checklist:addinstance'] = 'Ajouter une nouvelle liste de tâches';
$string['checklistautoupdate'] = 'Autoriser les Liste des tâches à être modifiées automatiquement';
$string['checklist:edit'] = 'Créer et éditer des Liste des tâches';
$string['checklist:emailoncomplete'] = 'Recevoir par mail quand c\'est terminé';
$string['checklistfor'] = 'Liste des tâches pour';
$string['checklistintro'] = 'Introduction';
$string['checklist:preview'] = 'Prévisualisation d\'une Liste des tâches';
$string['checklistsettings'] = 'Paramètres';
$string['checklist:updatelocked'] = 'Modification des marques verrouillée';
$string['checklist:updateother'] = 'Modification des marques des Liste des tâches des étudiants';
$string['checklist:updateown'] = 'Modification de vos marques des Liste des tâches';
$string['checklist:viewmenteereports'] = 'Voir la progression du stagiaire (seul)';
$string['checklist:viewreports'] = 'Voir la progression des étudiants';
$string['checks'] = 'Marques';
$string['comments'] = 'Commentaires';
$string['completionpercent'] = 'Pourcentage d\'éléments qui doivent être cochés :';
$string['completionpercentgroup'] = 'À cocher obligatoirement';
$string['configchecklistautoupdate'] = 'Avant de permettre cela, vous devez faire quelques modifications au code Moodle, merci de voir le « mod / liste / README.txt » pour plus de détails';
$string['configshowcompletemymoodle'] = 'Si ce réglage n\'est pas activé, les listes terminées ne seront pas affichées dans « Ma page »';
$string['configshowmymoodle'] = 'Si ce réglage n\'est pas activé, l\'activité Liste de tâches (avec des barres de progression) ne sera plus affichées dans « Ma page »';
$string['confirmdeleteitem'] = 'Êtes-vous sûr de vouloir effacer définitivement cet élément de la Liste des tâches?';
$string['deleteitem'] = 'Effacer cet item';
$string['duedatesoncalendar'] = 'Ajouter les dates d\'échéance au calendrier';
$string['edit'] = 'Éditer la Liste des tâches';
$string['editchecks'] = 'Éditer les coches';
$string['editdatesstart'] = 'Éditer les dates';
$string['editdatesstop'] = 'Arrêt de l\'édition des dates';
$string['edititem'] = 'Éditer cet élément';
$string['emailoncomplete'] = 'Envoyer un courriel à l\'enseignant quand la liste des tâches est complète';
$string['emailoncompletebody'] = 'L\'utilisateur {$a->user} a complété sa Liste de tâches « {$a->checklist} »
Voir la Liste des tâches ici :';
$string['emailoncompletebodyown'] = 'Vous avez terminé la liste de tâches « {$a->checklist} » dans le cours « {$a->coursename} »
Accéder à la liste ici :';
$string['emailoncomplete_help'] = 'Quand une liste est complète, un courriel de notification est envoyé à tous les enseignants du cours. <br />
Un administrateur peut contrôler qui reçoit ce courriel en utilisant la capacité « mod: check-list / emailoncomplete » - par défaut, tous les enseignants et enseignants non éditeurs ont cette capacité.';
$string['emailoncompletesubject'] = 'L\'utilisateur {$a->user} a complété sa Liste de tâches « {$a->checklist} »';
$string['emailoncompletesubjectown'] = 'Vous avez terminé la liste de tâches « {$a->checklist} »';
$string['export'] = 'Exportation des items';
$string['forceupdate'] = 'Modification des coches pour les éléments automatiques';
$string['gradetocomplete'] = 'Évaluation pour terminer';
$string['guestsno'] = 'Vous n\'avez pas l\'autorisation de voir cette Liste des tâches';
$string['headingitem'] = 'Cet élément est une étiquette, il n\'y aura pas de case à cocher à côté';
$string['import'] = 'Import d\'items';
$string['importfile'] = 'Choisir le fichier à importer';
$string['importfromcourse'] = 'Tout le cours';
$string['importfromsection'] = 'Section courante';
$string['indentitem'] = 'Décaller l\'élément';
$string['itemcomplete'] = 'Terminé';
$string['items'] = 'Éléments de la Liste des tâches';
$string['linktomodule'] = 'Lien de la ressource ou de l\'activité';
$string['lockteachermarks'] = 'Verrouillage des coches de l\'enseignant';
$string['lockteachermarks_help'] = 'Lorsque ce paramètre est activé, une fois qu\'un enseignant a sauvé une coche « Oui », il ne sera plus possible de changer la valeur. Les utilisateurs ayant la capacité « mod / check-list: updatelocked » sera toujours en mesure de changer la coche.';
$string['lockteachermarkswarning'] = 'Remarque: Une fois que vous avez enregistré ces coches, il vous sera impossible de changer toutes les coches « Oui »';
$string['modulename'] = 'Liste des tâches';
$string['modulename_help'] = 'L\'activité ­« Liste des tâches » permet aux enseignants de créer des listes de tâches pour le suivi des étudiants.';
$string['modulenameplural'] = 'Listes des tâches';
$string['moveitemdown'] = 'Descendre l\'item';
$string['moveitemup'] = 'Monter l\'item';
$string['noitems'] = 'Pas d\'éléments dans la Liste des tâches';
$string['optionalhide'] = 'Cacher les options des items';
$string['optionalitem'] = 'Cet item est optionnel';
$string['optionalshow'] = 'Montrer les options des items';
$string['percentcomplete'] = 'Items obligatoires';
$string['percentcompleteall'] = 'Tous les items';
$string['pluginadministration'] = 'Administration de la Liste des tâches';
$string['pluginname'] = 'Liste des tâches';
$string['preview'] = 'Prévisualisation';
$string['progress'] = 'Progression';
$string['removeauto'] = 'Supprimer les éléments des éléments du cours';
$string['report'] = 'Voir la progression';
$string['reporttablesummary'] = 'Tableau montrant les éléments de la liste que chaque étudiant a terminé';
$string['requireditem'] = 'Tableau montrant les éléments de la liste que chaque étudiant a complété';
$string['resetchecklistprogress'] = 'Réinitialiser la progression et les éléments de l\'utilisateur';
$string['savechecks'] = 'Sauvegarder';
$string['showcompletemymoodle'] = 'Afficher les listes des tâches terminées dans « Ma page »';
$string['showfulldetails'] = 'Afficher tous les détails';
$string['showmymoodle'] = 'Afficher les listes de tâches dans « Ma page »';
$string['showprogressbars'] = 'Afficher les barres de progression';
$string['teacheralongsidecheck'] = 'Étudiant et Enseignant';
$string['teachercomments'] = 'Les enseignants peuvent ajouter des commentaires';
$string['teacherdate'] = 'Date de dernière modification de l\'élément par l\'enseignant';
$string['teacheredit'] = 'Mises à jour par';
$string['teacherid'] = 'Dernier enseignant à avoir modifié la coche';
$string['teachermarkno'] = 'L\'enseignant ne confirme pas que cet élément est terminé';
$string['teachermarkundecided'] = 'L\'enseignant n\'a pas encore coché cet élément';
$string['teachermarkyes'] = 'L\'enseignant confirme que cet élément est terminé';
$string['teachernoteditcheck'] = 'Seulement l\'étudiant';
$string['teacheroverwritecheck'] = 'Seulement l\'enseignant';
$string['theme'] = 'Thème graphique pour afficher la Liste des tâches';
$string['toggledates'] = 'Basculer les dates';
$string['unindentitem'] = 'Élément non indenté';
$string['updatecompletescore'] = 'Sauvegarder les notes d\'achèvement';
$string['updateitem'] = 'Modification';
$string['userdate'] = 'Date de dernière modification de l\'élément par l\'utilisateur';
$string['useritemsallowed'] = 'L\'utilisateur peut ajouter ses propres items';
$string['useritemsdeleted'] = 'Éléments de l\'utilisateur supprimés';
$string['view'] = 'Voir la Liste des tâches';
$string['viewall'] = 'Voir tous les étudiants';
$string['viewallcancel'] = 'Effacer';
$string['viewallsave'] = 'Sauvegarder';
$string['viewsinglereport'] = 'Voir la progression de cet utilisateur';
$string['viewsingleupdate'] = 'Modifier la progression de cet utilisateur';
$string['yesnooverride'] = 'Oui ne peut pas remplacer';
$string['yesoverride'] = 'Oui, peut remplacer';
