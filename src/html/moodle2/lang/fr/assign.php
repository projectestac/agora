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
 * Strings for component 'assign', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addsubmission'] = 'Remettre un devoir';
$string['allowsubmissions'] = 'Permettre à l\'utilisateur de continuer de remettre des documents pour ce devoir.';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'Les détails du devoir et le formulaire de remise de document seront disponible dès le <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Autoriser les remises dès le';
$string['allowsubmissionsfromdate_help'] = 'Si ce réglage est activé, les participants ne pourront pas remettre de document avant cette date. Dans le cas contraire, ils pourront immédiatement remettre des documents.';
$string['allowsubmissionsfromdatesummary'] = 'Ce devoir acceptera les remises de documents dès le <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Permettre la modification des documents remis';
$string['alwaysshowdescription'] = 'Toujours afficher la description';
$string['alwaysshowdescription_help'] = 'Si ce réglage est désactivé, la description du devoir ci-dessus ne sera visible qu\'à partir de la date d\'ouverture du formulaire de remise.';
$string['assign:addinstance'] = 'Ajouter un devoir';
$string['assign:exportownsubmission'] = 'Exporter ses propres devoirs remis';
$string['assignfeedback'] = 'Plugin feedback';
$string['assignfeedbackpluginname'] = 'Plugin feedback';
$string['assign:grade'] = 'Évaluer un devoir';
$string['assignmentisdue'] = 'Devoir à effectuer';
$string['assignmentmail'] = '{$a->grader} a donné un feedback pour le travail remis pour « {$a->assignment} ».

Vous pouvez le consulter en annexe à votre travail : {$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} a donné un feedback pour le travail remis pour « <i>{$a->assignment}</i> ».<br /><br />Vous pouvez le consulter en annexe à <a href="{$a->url}">votre travail</a>.';
$string['assignmentmailsmall'] = '{$a->grader} a donné un feedback pour le travail remis pour « {$a->assignment} ». Vous pouvez le consulter en annexe à votre travail';
$string['assignmentname'] = 'Nom du devoir';
$string['assignmentplugins'] = 'Plugins de devoir';
$string['assignmentsperpage'] = 'Devoirs par page';
$string['assignsubmission'] = 'Plugin de remise';
$string['assignsubmissionpluginname'] = 'Plugin de remise';
$string['assign:submit'] = 'Remettre un devoir';
$string['assign:view'] = 'Afficher un devoir';
$string['availability'] = 'Disponibilité';
$string['backtoassignment'] = 'Retour au devoir';
$string['batchoperationconfirmlock'] = 'Verrouiller tous les remises sélectionnées ?';
$string['batchoperationconfirmreverttodraft'] = 'Remettre tous les remises sélectionnées dans l\'état brouillon ?';
$string['batchoperationconfirmunlock'] = 'Déverrouiller tous les remises sélectionnées ?';
$string['batchoperationlock'] = 'verrouiller les remises';
$string['batchoperationreverttodraft'] = 'remettre à l\'état de brouillon les remises';
$string['batchoperationsdescription'] = 'Avec la sélection...';
$string['batchoperationunlock'] = 'déverrouiller les remises';
$string['changegradewarning'] = 'Ce devoir comporte des travaux évalués. La modification de la note ne déclenchera pas automatiquement le calcul des notes existantes. Pour modifier la note, vous devez ré-évaluer tous les travaux remis.';
$string['comment'] = 'Commentaire';
$string['configshowrecentsubmissions'] = 'Tout le monde peut voir les notifications de remises dans les rapports d\'activité récente.';
$string['confirmbatchgradingoperation'] = 'Voulez-vous vraiment {$a->operation} pour {$a->count} étudiants ?';
$string['confirmsubmission'] = 'Voulez-vous vraiment remettre votre travail pour évaluation ? Vous ne pourrez plus effectuer de changement';
$string['conversionexception'] = 'Impossible de convertir le devoir. Exception retournée : {$a}.';
$string['couldnotconvertgrade'] = 'Impossible de convertir la note du devoir de l\'utilisateur {$a}';
$string['couldnotconvertsubmission'] = 'Impossible de convertir le travail remis de l\'utilisateur {$a}';
$string['couldnotcreatecoursemodule'] = 'Impossible de créer le module de cours.';
$string['couldnotcreatenewassignmentinstance'] = 'Impossible de créer l\'instance du nouveau devoir.';
$string['couldnotfindassignmenttoupgrade'] = 'Impossible de trouver l\'instance de l\'ancien devoir à mettre à jour.';
$string['currentgrade'] = 'Note actuelle dans le carnet de notes';
$string['defaultplugins'] = 'Réglages par défaut des devoirs';
$string['defaultplugins_help'] = 'Ces réglages définissent les réglages par défaut de tous les nouveaux devoirs.';
$string['deletepluginareyousure'] = 'Voulez-vous vraiment supprimer le plugin de devoir {$a} ?';
$string['deletepluginareyousuremessage'] = 'Vous êtes sur le point de supprimer totalement le plugin de devoir {$a}. Cette opération supprimera définitivement de la base de données tout ce qui associé à ce plugin de devoir. Voulez-vous vraiment continuer ?';
$string['deletingplugin'] = 'Suppression du plugin {$a}';
$string['description'] = 'Description';
$string['downloadall'] = 'Télécharger tous les travaux remis';
$string['duedate'] = 'À rendre jusqu\'au';
$string['duedate_help'] = 'Cette date est celle du délai de remise du devoir. Si les devoirs en retard sont autorisés, ceux qui son remis après cette date sont marqués en retard.';
$string['duedateno'] = 'Pas de date de retour';
$string['duedatereached'] = 'La délai de remise de ce devoir est passé';
$string['duedatevalidation'] = 'Le délai de remise doit être postérieur à la date à partir de laquelle les remises sont autorisées.';
$string['editaction'] = 'Actions...';
$string['editsubmission'] = 'Modifier mon devoir';
$string['enabled'] = 'Activé';
$string['errornosubmissions'] = 'Il n\'y a pas de devoir remis à télécharger';
$string['errorquickgradingvsadvancedgrading'] = 'Les notes n\'ont pas été enregistrées, car ce devoir utilise actuellement l\'évaluation avancée';
$string['errorrecordmodified'] = 'Les notes n\'ont pas été enregistrées, car quelqu\'un a modifié une ou plusieurs notes depuis que vous avez chargé cette page.';
$string['feedback'] = 'Feedback';
$string['feedbackavailablehtml'] = '{$a->username} a donné un feedback pour le travail remis pour « <i>{$a->assignment}</i> ».<br /><br />Vous pouvez le consulter en annexe à <a href="{$a->url}">votre travail</a>.';
$string['feedbackavailablesmall'] = '{$a->username} a donné un feedback pour le devoir {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username} a donné un feedback pour le travail remis pour « {$a->assignment} ».

Vous pouvez le consulter en annexe à votre travail : {$a->url}';
$string['feedbackplugin'] = 'Plugin feedback';
$string['feedbackpluginforgradebook'] = 'Le plugin feedback transmet des commentaires au carnet de notes';
$string['feedbackpluginforgradebook_help'] = 'Un seul plugin de feedback de devoir peut transmettre des commentaires au carnet de notes.';
$string['feedbackplugins'] = 'Plugins de feedback';
$string['feedbacksettings'] = 'Réglages de feedback';
$string['filesubmissions'] = 'Remises de fichiers';
$string['filter'] = 'Filtre';
$string['filternone'] = 'Aucun filtre';
$string['filterrequiregrading'] = 'Nécessite évaluation';
$string['filtersubmitted'] = 'Devoir rendu';
$string['gradeabovemaximum'] = 'La note doit être inférieure ou égale à {$a}.';
$string['gradebelowzero'] = 'La note doit être supérieure ou égale à zéro.';
$string['graded'] = 'Noté';
$string['gradedby'] = 'Évalué par';
$string['gradedon'] = 'Évalué le';
$string['gradeoutof'] = 'Note sur {$a}';
$string['gradeoutofhelp'] = 'Note';
$string['gradeoutofhelp_help'] = 'Saisir ici la note pour le travail de l\'étudiant. On peut indiquer des décimales.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} a modifié son travail remis pour le devoir « <em>{$a->assignment}</em> » le {$a->timeupdated}.<br /><br />Le travail remis est <a href="{$a->url}">disponible sur le site web</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} a modifié son travail remis pour le devoir {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username} a modifié son travail remis pour le devoir « {$a->assignment} » le {$a->timeupdated}.

Ce travail est disponible ici :

{$a->url}';
$string['gradestudent'] = 'Évaluer l\'étudiant : (id={$a->id}, fullname={$a->fullname}).';
$string['grading'] = 'Évaluation';
$string['gradingoptions'] = 'Options';
$string['gradingstatus'] = 'Statut de l\'évaluation';
$string['gradingstudentprogress'] = 'Évaluation de l\'étudiant {$a->index} sur {$a->count}';
$string['gradingsummary'] = 'Résumé de l\'évaluation';
$string['hideshow'] = 'Cacher/afficher';
$string['instructionfiles'] = 'Fichiers d\'instructions';
$string['invalidfloatforgrade'] = 'La note fournie n\'a pas pu être interprétée : {$a}';
$string['invalidgradeforscale'] = 'La note fournie n\'est pas valide dans le barème actuel';
$string['lastmodifiedgrade'] = 'Dernière modification (note)';
$string['lastmodifiedsubmission'] = 'Dernière modification (travail remis)';
$string['locksubmissionforstudent'] = 'Empêcher la remise d\'autres travaux par l\'étudiant : (id={$a->id}, fullname={$a->fullname}).';
$string['locksubmissions'] = 'Verrouiller la remise des travaux';
$string['manageassignfeedbackplugins'] = 'Gérer les plugins de feedback des devoirs';
$string['manageassignsubmissionplugins'] = 'Gérer les plugins de remise de travaux des devoirs';
$string['messageprovider:assign_notification'] = 'Notifications de devoirs';
$string['modulename'] = 'Devoir';
$string['modulename_help'] = 'Le module d\'activité devoir permet à un enseignant d\'attribuer aux participants une tâche, de récolter leurs travaux et de leur fournir feedbacks et notes.

Les étudiants peuvent remettre des travaux sous forme numérique (fichiers), par exemple des documents traitement de texte, feuilles de calcul, images, sons ou images fixes et animées. En complément ou en plus, le devoir peut demander aux étudiants de saisir un texte dans le navigateur. Il peut aussi être utilisé pour indiquer aux étudiants des devoirs à effectuer dans le monde réel et ne nécessitant pas la remise de fichiers numériques.

Lors de l\'évaluation des devoirs, les enseignants peuvent donner aux étudiants des feedbacks, leur envoyer des fichiers : travaux annotés, documents avec commentaires ou feedbacks audio. Les devoirs peuvent être évalués au moyen d\'une note numérique, d\'un barème spécifique ou d\'une méthode avancée comme une grille d\'évaluation. Les notes définitives sont enregistrées dans le carnet de notes.';
$string['modulenameplural'] = 'Devoirs';
$string['mysubmission'] = 'Mon travail :';
$string['newsubmissions'] = 'Devoirs rendus';
$string['nofiles'] = 'Aucun fichier.';
$string['nograde'] = 'Aucune note.';
$string['noonlinesubmissions'] = 'Ce devoir ne requiert pas de fichier à remettre de votre part';
$string['nosavebutnext'] = 'Suivant';
$string['nosubmission'] = 'Rien n\'a été déposé pour ce devoir';
$string['notgraded'] = 'Pas évalué';
$string['notgradedyet'] = 'Pas encore évalué';
$string['notifications'] = 'Notifications';
$string['notsubmittedyet'] = 'Pas encore rendu';
$string['nousersselected'] = 'Aucun utilisateur sélectionné';
$string['numberofdraftsubmissions'] = 'Brouillons';
$string['numberofparticipants'] = 'Participants';
$string['numberofsubmissionsneedgrading'] = 'Évaluation à effectuer';
$string['numberofsubmittedassignments'] = 'Remis';
$string['offline'] = 'Aucun travail à remettre requis';
$string['outlinegrade'] = 'Note : {$a}';
$string['overdue'] = '<font color="red">Le devoir est en retard de {$a}</font>';
$string['page-mod-assign-view'] = 'Page principale du module devoir';
$string['page-mod-assign-x'] = 'Toute page du module devoir';
$string['pluginadministration'] = 'Administration du devoir';
$string['pluginname'] = 'Devoir';
$string['preventlatesubmissions'] = 'Empêcher les remises en retard';
$string['preventlatesubmissions_help'] = 'Si ce réglage est activé, les étudiants ne pourront pas remettre de devoir après la délai de remise. Dans le cas contraire, ils pourront le faire après le délai.';
$string['preventsubmissions'] = 'Éviter que l\'utilisateur dépose d\'autres travaux pour ce devoir.';
$string['preventsubmissionsshort'] = 'Éviter la modification des travaux remis';
$string['previous'] = 'Précédent';
$string['quickgrading'] = 'Évaluation rapide';
$string['quickgradingchangessaved'] = 'Les modifications de notes ont été enregistrées';
$string['quickgrading_help'] = 'L\'évaluation rapide vous permet d\'attribuer des notes (et compétences) directement dans le tableau des travaux remis. L\'évaluation rapide n\'est pas compatible avec l\'évaluation avancée et n\'est pas recommandée si plusieurs utilisateurs effectuent l\'évaluation.';
$string['quickgradingresult'] = 'Évaluation rapide';
$string['reverttodraft'] = 'Remettre les travaux remis en état de brouillon.';
$string['reverttodraftforstudent'] = 'Remettre à l\'état de brouillon le travail de l\'étudiant : (id={$a->id}, fullname={$a->fullname}).';
$string['reverttodraftshort'] = 'Remettre le travail à l\'état de brouillon';
$string['reviewed'] = 'Relu';
$string['saveallquickgradingchanges'] = 'Enregistrer toutes les évaluations rapides';
$string['savechanges'] = 'Enregistrer';
$string['savenext'] = 'Enregistrer et afficher la suite';
$string['selectlink'] = 'Sélectionner...';
$string['sendlatenotifications'] = 'Informer les évaluateurs des travaux en retard';
$string['sendlatenotifications_help'] = 'Si ce réglage est activé, les évaluateurs (normalement les enseignants) recevront un message lorsque les étudiants remettent un travail en retard. La façon dont le message est délivré est configurable.';
$string['sendnotifications'] = 'Informer les évaluateurs des travaux remis';
$string['sendnotifications_help'] = 'Si ce réglage est activé, les évaluateurs (en principe les enseignants) recevront un message chaque fois qu\'un étudiant remet un travail pour ce devoir, qu\'il soit en avance, à temps ou en retard. La méthode d\'envoi des messages est configurable.';
$string['sendsubmissionreceipts'] = 'Envoyer aux étudiants un accusé de réception';
$string['sendsubmissionreceipts_help'] = 'Ce réglage permet d\'activer les accusés de réception pour les étudiants. Les étudiants recevront une notification chaque fois qu\'ils remettent un travail pour un devoir.';
$string['settings'] = 'Réglages du devoir';
$string['showrecentsubmissions'] = 'Afficher les remises récentes';
$string['submission'] = 'Devoir rendu';
$string['submissiondrafts'] = 'Exiger que les étudiants cliquent sur le bouton Envoyer';
$string['submissiondrafts_help'] = 'Si ce réglage est activé, les étudiants devront explicitement cliquer sur le bouton Envoyer pour confirmer que leur travail est terminé. Cela permet aux étudiants de conserver dans le système une version brouillon de leur travail. Si le réglage est activé après que des étudiants ont déjà remis leur travaux, ceux-ci seront considérés comme définitifs.';
$string['submissionnotready'] = 'Ce travail n\'est pas prêt à être remis :';
$string['submissionplugins'] = 'Plugins du devoir';
$string['submissionreceipthtml'] = 'Vous avez remis un travail pour le devoir « <i>{$a->assignment}</i> »<br /><br />Vous pouvez consulter l\'état de votre <a href="{$a->url}">travail</a>.';
$string['submissionreceipts'] = 'Envoyer les accusés de réception';
$string['submissionreceiptsmall'] = 'Vous avez remis votre travail pour le devoir {$a->assignment}';
$string['submissionreceipttext'] = 'Vous avez remis un travail pour le devoir « {$a->assignment} ».

Vous pouvez consulter l\'état de votre travail : {$a->url}';
$string['submissions'] = 'Devoirs rendus';
$string['submissionsclosed'] = 'La remise des travaux est terminée';
$string['submissionsettings'] = 'Réglages de la remise des travaux';
$string['submissionslocked'] = 'Le devoir n\'accepte pas la remise des travaux';
$string['submissionslockedshort'] = 'Modifications des travaux remis non autorisées';
$string['submissionsnotgraded'] = 'Travaux non évalués {$a}';
$string['submissionstatus'] = 'Statut des travaux remis';
$string['submissionstatus_'] = 'Pas de travail remis';
$string['submissionstatus_draft'] = 'Brouillon (non remis)';
$string['submissionstatusheading'] = 'État du travail remis';
$string['submissionstatus_marked'] = 'Noté';
$string['submissionstatus_new'] = 'Nouveau travail remis';
$string['submissionstatus_submitted'] = 'Remis pour évaluation';
$string['submitaction'] = 'Envoyer';
$string['submitassignment'] = 'Remettre un devoir';
$string['submitassignment_help'] = 'Une fois ce travail envoyé, vous ne pourrez plus effectuer de modification';
$string['submitted'] = 'Devoir rendu';
$string['submittedearly'] = 'Le travail a été remis en avance de {$a}';
$string['submittedlate'] = 'Le travail a été remis en retard de {$a}';
$string['submittedlateshort'] = 'En retard de {$a}';
$string['textinstructions'] = 'Instructions pour le devoir';
$string['timemodified'] = 'Dernière modification';
$string['timeremaining'] = 'Temps restant';
$string['unlocksubmissionforstudent'] = 'Permettre la remise de travaux pour l\'étudiant : (id={$a->id}, fullname={$a->fullname}).';
$string['unlocksubmissions'] = 'Déverrouiller les remises';
$string['updategrade'] = 'Modifier la note';
$string['updatetable'] = 'Enregistrer et modifier le tableau';
$string['upgradenotimplemented'] = 'La mise à jour n\'est pas implémentée dans le plugin ({$a->type} {$a->subtype})';
$string['viewfeedback'] = 'Afficher le feedback';
$string['viewfeedbackforuser'] = 'Afficher le feedback de l\'utilisateur {$a}';
$string['viewfullgradingpage'] = 'Ouvrir la page d\'évaluation complète pour donner des feedbacks';
$string['viewgradebook'] = 'Afficher le carnet de note';
$string['viewgrading'] = 'Consulter/évaluer tous les travaux remis';
$string['viewgradingformforstudent'] = 'Afficher la page d\'évaluation de l\'étudiant : (id={$a->id}, fullname={$a->fullname}).';
$string['viewownsubmissionform'] = 'Afficher sa propre page de remise de travaux.';
$string['viewownsubmissionstatus'] = 'Afficher sa propre page de l\'état des travaux remis.';
$string['viewsubmission'] = 'Afficher le travail remis';
$string['viewsubmissionforuser'] = 'Afficher le travail remis de l\'étudiant {$a}';
$string['viewsubmissiongradingtable'] = 'Afficher le tableau des notes du devoir';
