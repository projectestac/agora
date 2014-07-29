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
 * Strings for component 'workshop', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregategrades'] = 'Recalculer les notes';
$string['aggregation'] = 'Combinaison des notes';
$string['allocate'] = 'Attribuer les travaux';
$string['allocatedetails'] = 'attendus : {$a->expected}<br />remis : {$a->submitted}<br />à attribuer : {$a->allocate}';
$string['allocation'] = 'Attribution des travaux';
$string['allocationconfigured'] = 'Attribution configurée';
$string['allocationdone'] = 'Attribution effectuée';
$string['allocationerror'] = 'Erreur d\'attribution';
$string['allsubmissions'] = 'Tous les travaux remis ({$a})';
$string['alreadygraded'] = 'Déjà noté';
$string['areaconclusion'] = 'Texte de conclusion';
$string['areainstructauthors'] = 'Instructions pour la remise des travaux';
$string['areainstructreviewers'] = 'Instructions pour l\'évaluation des travaux';
$string['areaoverallfeedbackattachment'] = 'Annexes du feedback général';
$string['areaoverallfeedbackcontent'] = 'Textes du feedback général';
$string['areasubmissionattachment'] = 'Annexes du travail';
$string['areasubmissioncontent'] = 'Textes du travail';
$string['assess'] = 'Évaluer';
$string['assessedexample'] = 'Travail exemplaire évalué';
$string['assessedsubmission'] = 'Travail évalué';
$string['assessingexample'] = 'Évaluation du travail exemplaire';
$string['assessingsubmission'] = 'Évaluation du travail remis';
$string['assessment'] = 'Évaluation';
$string['assessmentby'] = 'par <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = 'Évaluation par {$a}';
$string['assessmentbyyourself'] = 'Votre évaluation';
$string['assessmentdeleted'] = 'Retrait de l\'attribution';
$string['assessmentend'] = 'Fin des évaluations';
$string['assessmentendbeforestart'] = 'Le délai pour l\'évaluation ne peut pas être antérieur à la date d\'ouverture des évaluations';
$string['assessmentenddatetime'] = 'Délai d\'évaluation : {$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} (délai d\'évaluation)';
$string['assessmentform'] = 'Formulaire d\'évaluation';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Évaluation</a> de <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Évaluation de référence';
$string['assessmentreferenceconflict'] = 'Il n\'est pas possible d\'évaluer un travail exemple pour lequel vous avez fourni une évaluation de référence.';
$string['assessmentreferenceneeded'] = 'Vous devez évaluer ce travail exemplaire pour fournir une référence d\'évaluation. Cliquer « Continuer » pour évaluer le travail exemplaire.';
$string['assessmentsettings'] = 'Réglages d\'évaluation';
$string['assessmentstart'] = 'Début des évaluations';
$string['assessmentstartdatetime'] = 'Ouvert pour évaluation dès le {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (ouverture de l\'évaluation)';
$string['assessmentweight'] = 'Coefficient de l\'évaluation';
$string['assignedassessments'] = 'Travaux à évaluer';
$string['assignedassessmentsnone'] = 'Vous n\'avez pas de travail à évaluer';
$string['backtoeditform'] = 'Revenir au formulaire';
$string['byfullname'] = 'par <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Calculer les notes des évaluations';
$string['calculategradinggradesdetails'] = 'attendues : {$a->expected}<br />calculées : {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Calculer les notes des travaux remis';
$string['calculatesubmissiongradesdetails'] = 'attendues : {$a->expected}<br />calculées : {$a->calculated}';
$string['chooseuser'] = 'Sélectionner un utilisateur...';
$string['clearaggregatedgrades'] = 'Effacer toutes les notes';
$string['clearaggregatedgradesconfirm'] = 'Voulez-vous vraiment effacer les notes calculées des travaux remis et des évaluations ?';
$string['clearaggregatedgrades_help'] = 'Les notes combinées du travail et de l\'évaluation seront réinitialisées. Vous pouvez les recalculer en recommençant la phase de notation des évaluations.';
$string['clearassessments'] = 'Effacer les évaluations';
$string['clearassessmentsconfirm'] = 'Voulez-vous vraiment effacer toutes les notes des évaluations ? Vous ne pourrez pas récupérer l\'information par vous-même, et les évaluateurs devront réévaluer les travaux attribués.';
$string['clearassessments_help'] = 'Les notes calculées pour le travail et les évaluations seront réinitialisées. L\'information sur le remplissage des formulaires d\'évaluation sera conservée, mais tous les évaluateurs devront rouvrir ce formulaire et le réenregistrer pour que le calcul des notes données s\'effectue à nouveau.';
$string['conclusion'] = 'Conclusion';
$string['conclusion_help'] = 'Le texte de conclusion est affiché aux participants à la fin de l\'activité.';
$string['configexamplesmode'] = 'Mode par défaut pour l\'évaluation des travaux exemplaires des ateliers';
$string['configgrade'] = 'Note maximale par défaut pour les travaux remis dans les ateliers';
$string['configgradedecimals'] = 'Nombre de chiffres à afficher par défaut après la virgule lors de l\'affichage des notes.';
$string['configgradinggrade'] = 'Note maximale par défaut pour les évaluations dans les ateliers';
$string['configmaxbytes'] = 'Taille maximale par défaut des travaux remis pour tous les ateliers du site (peut être modifié par les limites des cours et d\'autres réglages locaux)';
$string['configstrategy'] = 'Stratégie d\'évaluation par défaut des ateliers';
$string['createsubmission'] = 'Commencer la préparation de votre travail';
$string['daysago'] = 'il y a {$a} jours';
$string['daysleft'] = '{$a} jours restants';
$string['daystoday'] = 'aujourd\'hui';
$string['daystomorrow'] = 'demain';
$string['daysyesterday'] = 'hier';
$string['deadlinesignored'] = 'Les restrictions de temps ne s\'appliquent pas à vous';
$string['editassessmentform'] = 'Préparer le formulaire d\'évaluation';
$string['editassessmentformstrategy'] = 'Préparer le formulaire d\'évaluation ({$a})';
$string['editingassessmentform'] = 'Modification du formulaire d\'évaluation';
$string['editingsubmission'] = 'Modification du travail remis';
$string['editsubmission'] = 'Modifier le travail remis';
$string['err_multiplesubmissions'] = 'Une autre version de ce travail a été enregistrée alors que vous modifiiez ce formulaire. Les remises de plusieurs travaux par utilisateur ne sont pas autorisées.';
$string['err_removegrademappings'] = 'Impossible de supprimer les attributions de notes pas utilisées';
$string['evaluategradeswait'] = 'Veuillez attendre que les évaluations aient été notées et que les notes soient calculées';
$string['evaluation'] = 'Notation des évaluations';
$string['evaluationmethod'] = 'Méthode de notation des évaluations';
$string['evaluationmethod_help'] = 'La méthode de notation des évaluations détermine comment est calculée la note pour les évaluations données. Vous pouvez la faire recalculer les notes à plusieurs reprises avec différents réglages tant que le résultat ne vous satisfait pas.';
$string['evaluationsettings'] = 'Réglages de la notation des évaluations';
$string['event_assessable_uploaded'] = 'Un travail a été déposé.';
$string['example'] = 'Travail exemplaire';
$string['exampleadd'] = 'Ajouter travail exemplaire';
$string['exampleassess'] = 'Évaluer travail exemplaire';
$string['exampleassessments'] = 'Travaux exemplaires à évaluer';
$string['exampleassesstask'] = 'Évaluer les travaux exemplaires';
$string['exampleassesstaskdetails'] = 'attendus : {$a->expected}<br />évalués : {$a->assessed}';
$string['examplecomparing'] = 'Comparaison des évaluations des travaux exemplaires';
$string['exampledelete'] = 'Supprimer travail exemplaire';
$string['exampledeleteconfirm'] = 'Voulez-vous vraiment supprimer le travail exemplaire suivant ? Cliquer sur le bouton « Continuer » pour le supprimer.';
$string['exampleedit'] = 'Modifier travail exemplaire';
$string['exampleediting'] = 'Modification du travail exemplaire';
$string['exampleneedassessed'] = 'Vous devez d\'abord évaluer tous les travaux exemplaires';
$string['exampleneedsubmission'] = 'Vous devez d\'abord remettre votre travail et évaluer tous les travaux exemplaires';
$string['examplesbeforeassessment'] = 'Les travaux exemplaires sont disponibles une fois le travail remis et sont à évaluer avant ceux des pairs';
$string['examplesbeforesubmission'] = 'Les travaux exemplaires doivent être évalués avant de remettre le travail ';
$string['examplesmode'] = 'Mode d\'évaluation des travaux exemplaires';
$string['examplesubmissions'] = 'Travaux exemplaires';
$string['examplesvoluntary'] = 'L\'évaluation des travaux exemplaires est facultative';
$string['feedbackauthor'] = 'Feedback pour l\'auteur';
$string['feedbackauthorattachment'] = 'Annexe';
$string['feedbackby'] = 'Feedback de {$a}';
$string['feedbackreviewer'] = 'Feedback pour l\'évaluateur';
$string['feedbacksettings'] = 'Feedback';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Notes données';
$string['gradecalculated'] = 'Note calculée pour le travail remis';
$string['gradedecimals'] = 'Décimales dans les notes';
$string['gradegivento'] = '→';
$string['gradeinfo'] = 'Note : {$a->received} sur {$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (évaluation)';
$string['gradeitemsubmission'] = '{$a->workshopname} (travail remis)';
$string['gradeover'] = 'Modifier la note du travail remis';
$string['gradereceivedfrom'] = '←';
$string['gradesreport'] = 'Rapport d\'évaluation de l\'atelier';
$string['gradinggrade'] = 'Note du processus d\'évaluation';
$string['gradinggradecalculated'] = 'Note calculée pour l\'évaluation';
$string['gradinggrade_help'] = 'Ce réglage spécifie la note maximale pouvant être obtenue pour l\'évaluation de travaux.';
$string['gradinggradeof'] = 'Note pour l\'évaluation (sur {$a})';
$string['gradinggradeover'] = 'Modifier la note de l\'évaluation';
$string['gradingsettings'] = 'Réglages d\'évaluation';
$string['groupnoallowed'] = 'Vous n\'êtes autorisé à accéder à aucun groupe de cet atelier';
$string['iamsure'] = 'Oui, vraiment';
$string['info'] = 'Info';
$string['instructauthors'] = 'Instructions pour la remise du travail';
$string['instructreviewers'] = 'Instructions pour l\'évaluation';
$string['introduction'] = 'Description';
$string['latesubmissions'] = 'Travaux remis en retard';
$string['latesubmissionsallowed'] = 'Les travaux remis en retard sont autorisés';
$string['latesubmissions_desc'] = 'Autoriser la remise des travaux après le délai';
$string['latesubmissions_help'] = 'Si ce réglage est activé, les participants peuvent remettre leur travail après le délai fixé ou durant la phase d\'évaluation. Les travaux remis en retard ne pourront en revanche pas être modifiés.';
$string['maxbytes'] = 'Taille maximale des annexes aux travaux';
$string['modulename'] = 'Atelier';
$string['modulename_help'] = 'Le module d\'activité atelier permet la récolte, la lecture et l\'évaluation par les pairs de travaux de participants.

Les participants remettent des contenus numériques (fichiers), par exemple des documents traitement de textes, feuilles de calculs, etc. et peuvent aussi saisir directement des textes au moyen de l\'éditeur WYSIWYG.

Les travaux remis sont évalués au moyen d\'un formulaire d\'évaluation multi-critères défini par l\'enseignant. Le processus d\'évaluation par les pairs ainsi que la compréhension du formulaire d\'évaluation peuvent être entraînés à l\'avance au moyen de travaux exemplaires proposés par l\'enseignant avec des évaluations de référence. Les participants ont l\'opportunité d\'évaluer un ou plusieurs travaux de pairs, si nécessaire de façon anonyme.

Les participants obtiennent deux notes dans l\'activité atelier : une note pour le travail qu\'ils remettent, ainsi qu\'une note pour la qualité de leur évaluation des travaux de pairs. Les deux notes sont enregistrées dans le carnet de notes.';
$string['modulenameplural'] = 'Ateliers';
$string['mysubmission'] = 'Mon travail remis';
$string['nattachments'] = 'Nombre maximal d\'annexes jointes';
$string['noexamples'] = 'Il n\'y a encore aucun travail exemplaire dans cet atelier';
$string['noexamplesformready'] = 'Vous devez préparer le formulaire d\'évaluation avant de fournir des travaux exemplaires';
$string['nogradeyet'] = 'Pas encore de note';
$string['nosubmissionfound'] = 'Aucun travail remis par cet utilisateur';
$string['nosubmissions'] = 'Aucun travail remis dans cet atelier';
$string['notassessed'] = 'Pas encore évalué';
$string['nothingtoreview'] = 'Rien à évaluer';
$string['notoverridden'] = 'Pas modifié';
$string['noworkshops'] = 'Il n\'y a pas d\'atelier dans ce cours';
$string['noyoursubmission'] = 'Vous n\'avez pas encore remis votre travail';
$string['nullgrade'] = '-';
$string['overallfeedback'] = 'Feedback général';
$string['overallfeedbackfiles'] = 'Nombre maximal d\'annexes du feedback général';
$string['overallfeedbackmaxbytes'] = 'Taille totale maximale des annexes de feedback';
$string['overallfeedbackmode'] = 'Mode feedback général';
$string['overallfeedbackmode_0'] = 'Désactivé';
$string['overallfeedbackmode_1'] = 'Activé et optionnel';
$string['overallfeedbackmode_2'] = 'Activé et requis';
$string['overallfeedbackmode_help'] = 'Si ce réglage est activé, un champ de texte est affiché au bas du formulaire d\'évaluation. Les évaluateurs peuvent y noter une évaluation globale du travail remis, ou y fournir une explication supplémentaire de leur évaluation.';
$string['page-mod-workshop-x'] = 'Toute page du module atelier';
$string['participant'] = 'Participant';
$string['participantrevierof'] = 'Le participant est évaluateur de';
$string['participantreviewedby'] = 'Le participant est évalué par';
$string['phaseassessment'] = 'Phase d\'évaluation';
$string['phaseclosed'] = 'Fermé';
$string['phaseevaluation'] = 'Phase de notation de l\'évaluation';
$string['phasesetup'] = 'Phase de mise en place';
$string['phasesoverlap'] = 'La phase de remise des travaux et celle de l\'évaluation ne peuvent pas se chevaucher';
$string['phasesubmission'] = 'Phase de remise';
$string['pluginadministration'] = 'Administration de l\'atelier';
$string['pluginname'] = 'Atelier';
$string['prepareexamples'] = 'Préparer des travaux exemplaires';
$string['previewassessmentform'] = 'Prévisualisation';
$string['publishedsubmissions'] = 'Travaux remis publiés';
$string['publishsubmission'] = 'Publier travail remis';
$string['publishsubmission_help'] = 'Les travaux remis publiés sont disponibles pour les autres dès que l\'atelier est terminé.';
$string['reassess'] = 'Ré-évaluer';
$string['receivedgrades'] = 'Notes reçues';
$string['recentassessments'] = 'Évaluations de l\'atelier :';
$string['recentsubmissions'] = 'Travaux remis de l\'atelier';
$string['saveandclose'] = 'Enregistrer et fermer';
$string['saveandcontinue'] = 'Enregistrer et continuer les modifications';
$string['saveandpreview'] = 'Enregistrer et prévisualiser';
$string['saveandshownext'] = 'Enregistrer et afficher la suite';
$string['selfassessmentdisabled'] = 'Auto-évaluation désactivée';
$string['showingperpage'] = 'Affichage de {$a} éléments par page';
$string['showingperpagechange'] = 'Changer...';
$string['someuserswosubmission'] = 'Au moins un participant n\'a pas encore remis son travail';
$string['sortasc'] = 'Tri ascendant';
$string['sortdesc'] = 'Tri descendant';
$string['strategy'] = 'Stratégie d\'évaluation';
$string['strategyhaschanged'] = 'La stratégie d\'évaluation de l\'atelier a été modifiée depuis l\'ouverture de ce formulaire.';
$string['strategy_help'] = 'La stratégie d\'évaluation détermine le formulaire d\'évaluation utilisé ainsi que la méthode d\'évaluation des travaux remis. Il y a 4 possibilités :

* Évaluation cumulative : des commentaires et une note sont donnés sur différents aspects spécifiés
* Commentaires : des commentaires sont donnés sur différents aspects spécifiés, mais sans note
* Nombre d\'erreurs : des commentaires sont donnés ainsi qu\'une évaluation oui/non sur des affirmations spécifiées
* Critères : des évaluations de niveau sont donnés sur différents critères spécifiés';
$string['submission'] = 'Travail remis';
$string['submissionattachment'] = 'Annexe';
$string['submissionby'] = 'Travail remis par {$a}';
$string['submissioncontent'] = 'Contenu du travail remis';
$string['submissionend'] = 'Fin de la remise des travaux';
$string['submissionendbeforestart'] = 'Le délai pour la remise des travaux ne peut pas être antérieur à la date d\'ouverture de ces remises';
$string['submissionenddatetime'] = 'Délai de remise des travaux : {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (délai de remise)';
$string['submissionendswitch'] = 'Passer à la phase suivante après le délai de remise des travaux';
$string['submissionendswitch_help'] = 'Si un délai de remise des travaux est spécifié et si cette option est activée, l\'atelier passera automatiquement à la phase d\'évaluation après le délai de remise des travaux.

Si vous activez ce réglage, il est recommandé de configurer également la méthode d\'attribution programmée. Si les travaux ne sont pas attribués, aucune évaluation ne sera possible même si l\'atelier est dans la phase d\'évaluation.';
$string['submissiongrade'] = 'Note pour le travail remis';
$string['submissiongrade_help'] = 'Ce réglage détermine la note maximale pouvant être obtenue pour le travail remis.';
$string['submissiongradeof'] = 'Note pour le travail remis (sur {$a})';
$string['submissionsettings'] = 'Réglages de remise des travaux';
$string['submissionstart'] = 'Début de la remise des travaux';
$string['submissionstartdatetime'] = 'Ouvert pour la remise des travaux dès le {$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a} (ouverture de la remise)';
$string['submissiontitle'] = 'Titre';
$string['subplugintype_workshopallocation'] = 'Méthode d\'attribution des travaux';
$string['subplugintype_workshopallocation_plural'] = 'Méthodes d\'attribution des travaux';
$string['subplugintype_workshopeval'] = 'Méthode de notation des évaluations';
$string['subplugintype_workshopeval_plural'] = 'Méthodes d\'évaluation de la notation';
$string['subplugintype_workshopform'] = 'Stratégie d\'évaluation';
$string['subplugintype_workshopform_plural'] = 'Stratégies d\'évaluation';
$string['switchingphase'] = 'Changement de phase';
$string['switchphase'] = 'Changer de phase';
$string['switchphase10info'] = 'Vous allez passer cet atelier à la <strong>phase de mise en place</strong>. Durant cette phase, les participants ne peuvent pas modifier leur travail remis, ni leurs évaluations. Les enseignants peuvent mettre à profit cette phase pour modifier les réglages de l\'atelier, la stratégie de notation et peaufiner les formulaires d\'évaluation.';
$string['switchphase20info'] = 'Vous allez passer cet atelier à la <strong>phase de remise</strong>. Durant cette phase, les étudiants peuvent remettre leur travail (dans l\'intervalle de temps défini pour la remise des travaux, le cas échéant). Les enseignants peuvent attribuer des travaux pour évaluation par les pairs.';
$string['switchphase30auto'] = 'L\'atelier passera automatiquement dans la phase d\'évaluation après {$a->daydatetime} ({$a->distanceday})';
$string['switchphase30info'] = 'Vous allez passer cet atelier à la <strong>phase d\'évaluation</strong>. Durant cette phase, les évaluateurs peuvent évaluer les travaux qui leur ont été attribués (dans l\'intervalle de temps défini pour l\'évaluation des travaux, le cas échéant).';
$string['switchphase40info'] = 'Vous allez passer cet atelier à la <strong>phase de notation</strong>. Durant cette phase, les participants ne peuvent pas modifier leur travail remis, ni leurs évaluations. Les enseignants peuvent utiliser les outils de notation pour calculer les notes finales et fournir un feedback aux évaluateurs.';
$string['switchphase50info'] = 'Vous allez fermer cet atelier. Ceci permettra aux notes calculées d\'apparaître dans le carnet de notes. Les étudiants pourront voir leur travail et les évaluations qu\'ils ont reçues.';
$string['taskassesspeers'] = 'Évaluer vos pairs';
$string['taskassesspeersdetails'] = 'total : {$a->total}<br />restant : {$a->todo}';
$string['taskassessself'] = 'Vous évaluer vous-même';
$string['taskconclusion'] = 'Fournir une conclusion à l\'activité';
$string['taskinstructauthors'] = 'Fournir des instructions pour la remise des travaux';
$string['taskinstructreviewers'] = 'Fournir des instructions pour l\'évaluation';
$string['taskintro'] = 'Saisir l\'introduction de l\'atelier';
$string['tasksubmit'] = 'Remettre votre travail';
$string['toolbox'] = 'Boîte à outil atelier';
$string['undersetup'] = 'L\'atelier est en cours de mise en place. Veuillez attendre qu\'il passe à la phase suivante.';
$string['useexamples'] = 'Utiliser des travaux exemplaires';
$string['useexamples_desc'] = 'Des travaux exemplaires sont fournis pour l\'entraînement à l\'évaluation';
$string['useexamples_help'] = 'Si ce réglage est activé, les participants pourront évaluer un ou plusieurs travaux exemplaires et comparer leur évaluation avec celle fournie en référence. La note n\'est pas comptée dans la note d\'évaluation.';
$string['usepeerassessment'] = 'Utiliser les évaluations par les pairs';
$string['usepeerassessment_desc'] = 'Les étudiants peuvent évaluer les travaux de leurs collègues';
$string['usepeerassessment_help'] = 'Si ce réglage est activé, des travaux de participants peuvent être attribués à d\'autres participants pour être évalués. Les participants évaluateurs recevront une note pour leurs évaluations en plus de la note pour leur propre travail.';
$string['userdatecreated'] = 'remis le <span>{$a}</span>';
$string['userdatemodified'] = 'modifier le <span>{$a}</span>';
$string['userplan'] = 'Planning de l\'atelier';
$string['userplan_help'] = 'Le planning de l\'atelier affiche les différentes phases de l\'activité et la liste des tâches de chaque phase. La phase en cours est mise en évidence et les tâches accomplies sont assorties d\'une coche.';
$string['useselfassessment'] = 'Utiliser les auto-évaluations';
$string['useselfassessment_desc'] = 'Les étudiants peuvent évaluer leur propre travail';
$string['useselfassessment_help'] = 'Si ce réglage est activé, les participants auront la possibilité d\'évaluer leur propre travail. Ils recevront une note pour leur évaluation en plus de la note pour leur propre travail.';
$string['weightinfo'] = 'Coefficient : {$a}';
$string['withoutsubmission'] = 'Évaluateur sans travail remis';
$string['workshop:addinstance'] = 'Ajouter un atelier';
$string['workshop:allocate'] = 'Attribuer les travaux remis pour évaluation';
$string['workshop:editdimensions'] = 'Modifier les formulaires d\'évaluation';
$string['workshop:ignoredeadlines'] = 'Ignorer les restrictions de temps';
$string['workshop:manageexamples'] = 'Gérer les travaux exemplaires';
$string['workshopname'] = 'Nom de l\'atelier';
$string['workshop:overridegrades'] = 'Modifier les notes calculées';
$string['workshop:peerassess'] = 'Évaluer ses pairs';
$string['workshop:publishsubmissions'] = 'Publier les travaux remis';
$string['workshop:submit'] = 'Remettre un travails';
$string['workshop:switchphase'] = 'Changer de phase';
$string['workshop:view'] = 'Consulter les ateliers';
$string['workshop:viewallassessments'] = 'Voir toutes les évaluations';
$string['workshop:viewallsubmissions'] = 'Voir tous les travaux remis';
$string['workshop:viewauthornames'] = 'Voir les noms des auteurs';
$string['workshop:viewauthorpublished'] = 'Voir les auteurs des travaux publiés';
$string['workshopviewed'] = 'Atelier consulté';
$string['workshop:viewpublishedsubmissions'] = 'Voir les travaux remis publiés';
$string['workshop:viewreviewernames'] = 'Voir les noms des évaluateurs';
$string['yourassessment'] = 'Votre évaluation';
$string['yourgrades'] = 'Vos notes';
$string['yoursubmission'] = 'Votre travail remis';
