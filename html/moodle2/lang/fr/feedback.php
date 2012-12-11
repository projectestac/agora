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
 * Strings for component 'feedback', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Ajouter une question';
$string['add_items'] = 'Ajouter des questions';
$string['add_pagebreak'] = 'Ajouter un saut de page';
$string['adjustment'] = 'Disposition des options';
$string['after_submit'] = 'Après l\'envoi';
$string['allowfullanonymous'] = 'Permettre l\'anonymat complet';
$string['analysis'] = 'Analyse';
$string['anonymous'] = 'Anonyme';
$string['anonymous_edit'] = 'Enregistrer les noms d\'utilisateur';
$string['anonymous_entries'] = 'Saisie anonyme';
$string['anonymous_user'] = 'Utilisateur anonyme';
$string['append_new_items'] = 'Ajouter de nouveaux éléments';
$string['autonumbering'] = 'Numérotation automatique';
$string['autonumbering_help'] = 'Active ou désactive les numéros automatiques des questions';
$string['average'] = 'Moyenne';
$string['bold'] = 'Gras';
$string['cancel_moving'] = 'Annuler déplacement';
$string['cannotmapfeedback'] = 'Problème de base de données, impossible d\'associer le feedback au cours';
$string['cannotsavetempl'] = 'L\'enregistrement des modèles n\'est pas autorisé';
$string['cannotunmap'] = 'Problème de base de données, impossible de dissocier le feedback';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'Captcha n\'a pas été configuré.';
$string['check'] = 'Choix multiple - plusieurs réponses';
$string['checkbox'] = 'Choix multiple - plusieurs réponses sont permises (cases à cocher)';
$string['check_values'] = 'Réponses possibles';
$string['choosefile'] = 'Sélectionner un fichier';
$string['chosen_feedback_response'] = 'Réponse choisie pour le feedback';
$string['completed'] = 'terminé';
$string['completed_feedbacks'] = 'Réponses envoyées';
$string['complete_the_form'] = 'Répondre aux questions...';
$string['completionsubmit'] = 'Afficher comme terminé quand l\'utilisateur a envoyé le feedback';
$string['configallowfullanonymous'] = 'Si ce réglage est activé, le feedback pourra être rempli sans nécessiter d\'identification. N\'est valable que pour les sondages sur la page d\'accueil.';
$string['confirmdeleteentry'] = 'Voulez-vous vraiment supprimer cette saisie ?';
$string['confirmdeleteitem'] = 'Voulez-vous vraiment supprimer cet élément ?';
$string['confirmdeletetemplate'] = 'Voulez-vous vraiment supprimer ce modèle ?';
$string['confirmusetemplate'] = 'Voulez-vous vraiment utiliser ce modèle ?';
$string['continue_the_form'] = 'Continuer le formulaire';
$string['count_of_nums'] = 'Nombre des numéros';
$string['courseid'] = 'Identifiant de cours';
$string['creating_templates'] = 'Enregistrer ces questions en tant que nouveau modèle';
$string['delete_entry'] = 'Supprimer entrée';
$string['delete_item'] = 'Supprimer question';
$string['delete_old_items'] = 'Supprimer anciens éléments';
$string['delete_template'] = 'Supprimer modèle';
$string['delete_templates'] = 'Supprimer modèle...';
$string['depending'] = 'Dépendances';
$string['depending_help'] = 'Il est possible d\'afficher un élément en fonction de la valeur d\'un autre élément.<br />
<strong>Voici un exemple.</strong><br />
<ul>
<li>D\'abord, créer un élément dont la valeur va déterminer l\'affichage d\'autres éléments.</li>
<li>Ajouter ensuite un saut de page.</li>
<li>Pour terminer, ajouter les éléments dont l\'affichage dépendra de la valeur du premier élément créé. Sélectionner ce dernier élément dans la liste intitulée « Éléments de dépendance » et indiquer la valeur requise dans le champ « Valeur de la dépendance ».</li>
</ul>
<strong>La structure des éléments ressemblera à ceci :</strong>
<ol>
<li>Élément Q : Possédez-vous une voiture ? R : oui/non</li>
<li>Saut de page</li>
<li>Élément Q : De quelle couleur est votre voiture ?<br /> (cet élément dépend de l\'élément 1 avec la valeur = oui)</li>
<li>Élément Q : Pourquoi n\'avez-vous pas de voiture ?<br /> (cet élément dépend de l\'élément 1 avec la valeur = non)</li>
<li>... autres éléments</li>
</ol>';
$string['dependitem'] = 'Élément de dépendance';
$string['dependvalue'] = 'Valeur de la dépendance';
$string['description'] = 'Description';
$string['do_not_analyse_empty_submits'] = 'Ne pas analyser les remises vides';
$string['dropdown'] = 'Choix multiple - une seule réponse possible (menu déroulant)';
$string['dropdownlist'] = 'Choix multiple - une seule réponse (menu)';
$string['dropdownrated'] = 'Menu déroulant (valué)';
$string['dropdown_values'] = 'Réponses';
$string['drop_feedback'] = 'Retirer de ce cours';
$string['edit_item'] = 'Modifier question';
$string['edit_items'] = 'Modifier les questions';
$string['emailnotification'] = 'Notifications par courriel';
$string['email_notification'] = 'Envoyer les notifications par courriel';
$string['emailnotification_help'] = 'Si ce réglage est activé, les enseignants recevront par courriel notifications des remises des feedbacks.';
$string['emailteachermail'] = '{$a->username} a terminé l\'activité feedback « {$a->feedback} »

Vous pouvez la voir ici :

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} a terminé l\'activité feedback « <i>{$a->feedback}</i> »<br /><br />Vous pouvez la voir <a href="{$a->url}">ici</a>.';
$string['entries_saved'] = 'Vos réponses ont été enregistrées. Merci.';
$string['export_questions'] = 'Exporter les questions';
$string['export_to_excel'] = 'Exporter vers Excel';
$string['feedback:addinstance'] = 'Ajouter un feedback';
$string['feedbackclose'] = 'Fermer le feedback le';
$string['feedbackcloses'] = 'Le feedback se termine';
$string['feedback:complete'] = 'Terminer un feedback';
$string['feedback:createprivatetemplate'] = 'Créer un modèle privé';
$string['feedback:createpublictemplate'] = 'Créer un modèle public';
$string['feedback:deletesubmissions'] = 'Supprimer les envois terminées';
$string['feedback:deletetemplate'] = 'Supprimer modèle';
$string['feedback:edititems'] = 'Modifier éléments';
$string['feedback_is_not_for_anonymous'] = 'Les utilisateurs anonyme ne peuvent pas utiliser de feedback';
$string['feedback_is_not_open'] = 'Le feedback n\'est pas ouvert';
$string['feedback:mapcourse'] = 'Associer des cours aux feedbacks globaux';
$string['feedbackopen'] = 'Ouvrir le feedback le';
$string['feedbackopens'] = 'Le feedback s\'ouvre';
$string['feedback_options'] = 'Options du feedback';
$string['feedback:receivemail'] = 'Recevoir les notifications par courriel';
$string['feedback:view'] = 'Voir une activité feedback';
$string['feedback:viewanalysepage'] = 'Voir la page d\'analyse après la remise';
$string['feedback:viewreports'] = 'Voir les rapports';
$string['file'] = 'Fichier';
$string['filter_by_course'] = 'Filtrer par cours';
$string['handling_error'] = 'Une erreur est survenue lors du traitement d\'une action du module feedback';
$string['hide_no_select_option'] = 'Cacher l\'option « Sans réponse »';
$string['horizontal'] = 'Horizontal';
$string['importfromthisfile'] = 'Importer depuis ce fichier';
$string['import_questions'] = 'Importer des questions';
$string['import_successfully'] = 'Importation réussie';
$string['info'] = 'Information';
$string['infotype'] = 'Type d\'information';
$string['insufficient_responses'] = 'Nombre insuffisant de réponses';
$string['insufficient_responses_for_this_group'] = 'Il n\'y a pas assez de réponses pour ce groupe';
$string['insufficient_responses_help'] = 'Il n\'y a pas assez de réponses dans ce groupe.

Pour que ce feedback reste anonyme, un minimum de 2 réponses doit être donné.';
$string['item_label'] = 'Étiquette';
$string['item_name'] = 'Question';
$string['items_are_required'] = 'Veuillez répondre obligatoirement aux questions marquées d\'un astérisque.';
$string['label'] = 'Étiquette';
$string['line_values'] = 'Évaluation';
$string['mapcourse'] = 'Associer les feedbacks aux cours';
$string['mapcourse_help'] = 'Par défaut, les formulaires de feedback créé sur la page d\'accueil sont disponibles sur tout le site et apparaissent dans tous les cours qui utilisent le bloc feedback. Vous pouvez imposer l\'affichage du formulaire de feedback en créant un bloc fixe ou limiter les cours dans lesquels un formulaire de feedback est affiché en associant un feedback à un ou plusieurs cours.';
$string['mapcourseinfo'] = 'Ce feedback global est disponible pour tous les cours, par l\'intermédiaire du bloc feedback. Vous pouvez cependant limiter les cours où il peut apparaître en les associant explicitement. Rechercher le cours et associez-le à ce feedback.';
$string['mapcoursenone'] = 'Aucun cours associé. Le feedback est disponible pour tous les cours';
$string['mapcourses'] = 'Associer le feedback aux cours';
$string['mapcourses_help'] = 'Après avoir sélectionné le(s) cours désirés dans le résultat de la recherche, vous pouvez les lier à ce feedback. Vous pouvez sélectionner plusieurs cours en maintenant la touche Ctrl ou Cmd et en cliquant sur les titres des cours. Un cours peut être dissocié d\'un feedback à tout moment.';
$string['mappedcourses'] = 'Cours associés';
$string['max_args_exceeded'] = 'Au maximum 6 paramètres peuvent être traités. Il y a trop de paramètres pour';
$string['maximal'] = 'maximal';
$string['messageprovider:message'] = 'Rappel de feedback';
$string['messageprovider:submission'] = 'Notification de feedback';
$string['mode'] = 'Mode';
$string['modulename'] = 'Feedback';
$string['modulename_help'] = 'Le module d\'activité feedback permet à l\'enseignant de créer un questionnaire d\'enquête personnalisé pour collecter des informations de la part des participants au moyen de divers types de questions, notamment à choix multiples ou à réponses courtes.

Si désiré, les réponses peuvent être anonymes et les résultats affichés à tous les participants ou aux enseignants seulement. Une activité feedback affichée sur la page d\'accueil du site peut également être remplie par des utilisateurs non connectés.

Les activités feedback peuvent être utilisées pour :

* l\'évaluation des cours, afin d\'améliorer les contenus pour des participants ultérieurs
* permettre aux participants de s\'inscrire à des modules de cours, des manifestations, etc.
* des enquêtes anonymes sur les choix de cours, les règlements d\'écoles, etc.
* des enquêtes anti-harcèlement dans lesquelles les participants annoncent anonymement des incidents';
$string['modulenameplural'] = 'Feedbacks';
$string['movedown_item'] = 'Déplacer cette question vers le bas';
$string['move_here'] = 'Déplacer ici';
$string['move_item'] = 'Déplacer cette question';
$string['moveup_item'] = 'Déplacer cette question vers le haut';
$string['multichoice'] = 'Choix multiple';
$string['multichoicerated'] = 'Choix multiple (évalué)';
$string['multichoicetype'] = 'Type de choix multiple';
$string['multichoice_values'] = 'Valeurs du choix multiple';
$string['multiplesubmit'] = 'Remises multiples';
$string['multiple_submit'] = 'Envois multiples';
$string['multiplesubmit_help'] = 'Si ce réglage est activé pour les questionnaires anonymes, les utilisateurs peuvent remplir un feedback indéfiniment.';
$string['name'] = 'Nom';
$string['name_required'] = 'Nom requis';
$string['next_page'] = 'Page suivante';
$string['no_handler'] = 'Aucun action n\'existe pour';
$string['no_itemlabel'] = 'Aucune étiquette';
$string['no_itemname'] = 'Pas de nom d\'élément';
$string['no_items_available_yet'] = 'Aucune question n\'a encore été mise en place';
$string['non_anonymous'] = 'Le nom du participant sera enregistré et affiché avec ses réponses';
$string['non_anonymous_entries'] = 'Saisies non anonymes';
$string['non_respondents_students'] = 'Participants sans réponse';
$string['notavailable'] = 'Ce feedback n\'est pas disponible';
$string['not_completed_yet'] = 'Pas encore terminé';
$string['no_templates_available_yet'] = 'Aucun modèle disponible';
$string['not_selected'] = 'Sans réponse';
$string['not_started'] = 'Pas commencé';
$string['numeric'] = 'Réponse numérique';
$string['numeric_range_from'] = 'Intervalle de';
$string['numeric_range_to'] = 'Intervalle jusqu\'à';
$string['of'] = 'sur';
$string['oldvaluespreserved'] = 'Toutes les anciennes questions et les valeurs attribuées seront conservées';
$string['oldvalueswillbedeleted'] = 'Les questions en cours et toutes les réponses de vos participants seront supprimées';
$string['only_one_captcha_allowed'] = 'Un seul captcha est autorisé par feedback';
$string['overview'] = 'Vue d\'ensemble';
$string['page'] = 'Page';
$string['page_after_submit'] = 'Page affichée après envoi du formulaire';
$string['pagebreak'] = 'Saut de page';
$string['page-mod-feedback-x'] = 'Toute page du module feedback';
$string['parameters_missing'] = 'Paramètres manquant de';
$string['picture'] = 'Image';
$string['picture_file_list'] = 'List d\'images';
$string['picture_values'] = 'Sélectionnez un ou plusieurs<br />fichiers images de la liste :';
$string['pluginadministration'] = 'Administration du feedback';
$string['pluginname'] = 'Feedback';
$string['position'] = 'Position';
$string['preview'] = 'Prévisualisation';
$string['preview_help'] = 'Vous pouvez changer l\'ordre des questions dans la prévisualisation.';
$string['previous_page'] = 'Page précédente';
$string['public'] = 'Public';
$string['question'] = 'Question';
$string['questions'] = 'Questions';
$string['radio'] = 'Choix multiple - une réponse';
$string['radiobutton'] = 'Choix multiple - une seule réponse possible (boutons radio)';
$string['radiobutton_rated'] = 'Bouton radio (évalué)';
$string['radiorated'] = 'Bouton radio (évalué)';
$string['radio_values'] = 'Réponses';
$string['ready_feedbacks'] = 'Préparer les feedbacks';
$string['relateditemsdeleted'] = 'Toutes les réponses de vos participants à cette question seront également supprimées';
$string['required'] = 'Requis';
$string['resetting_data'] = 'Réinitialiser les réponses du feedback';
$string['resetting_feedbacks'] = 'Réinitialisation des feedbacks';
$string['response_nr'] = 'Réponse No';
$string['responses'] = 'Réponses';
$string['responsetime'] = 'Heure de réponse';
$string['save_as_new_item'] = 'Enregistrer comme nouvelle question';
$string['save_as_new_template'] = 'Enregistrer comme modèle';
$string['save_entries'] = 'Remettre vos réponses';
$string['save_item'] = 'Enregistrer question';
$string['saving_failed'] = 'Échec de l\'enregistrement';
$string['saving_failed_because_missing_or_false_values'] = 'L\'enregistrement a échoué car des valeurs sont manquantes ou fausses';
$string['search_course'] = 'Rechercher cours';
$string['searchcourses'] = 'Rechercher les cours';
$string['searchcourses_help'] = 'Rechercher le code ou le nom du(des) cours que vous voulez associer à ce feedback';
$string['selected_dump'] = 'Les index sélectionnés de la variable $SESSION sont indiqués ci-dessous :';
$string['send'] = 'Envoyer';
$string['send_message'] = 'Envoyer message';
$string['separator_decimal'] = ',';
$string['separator_thousand'] = '&nbsp;';
$string['show_all'] = 'Tout afficher';
$string['show_analysepage_after_submit'] = 'Afficher la page d\'analyse après la remise';
$string['show_entries'] = 'Afficher les réponses';
$string['show_entry'] = 'Afficher la réponse';
$string['show_nonrespondents'] = 'Afficher les utilisateurs sans réponse';
$string['site_after_submit'] = 'Site après remise';
$string['sort_by_course'] = 'Trier par cours';
$string['start'] = 'Début';
$string['started'] = 'Commencé';
$string['stop'] = 'Fin';
$string['subject'] = 'Sujet';
$string['switch_group'] = 'Changer de groupe';
$string['switch_item_to_not_required'] = 'Changer à : réponse non requise';
$string['switch_item_to_required'] = 'Changer à : réponse requise';
$string['template'] = 'Modèle';
$string['templates'] = 'Modèles';
$string['template_saved'] = 'Modèle enregistré';
$string['textarea'] = 'Réponse longue';
$string['textarea_height'] = 'Nombre de lignes';
$string['textarea_width'] = 'Largeur';
$string['textfield'] = 'Réponse courte';
$string['textfield_maxlength'] = 'Nombre maximum de caractères acceptés';
$string['textfield_size'] = 'Largeur du champ';
$string['there_are_no_settings_for_recaptcha'] = 'Il n\'y a pas de réglage pour le captcha';
$string['this_feedback_is_already_submitted'] = 'Vous avez déjà effectué cette activité.';
$string['timeclose'] = 'Heure de fermeture';
$string['timeclose_help'] = 'Vous pouvez indiquer la date de fermeture de l\'activité feedback. Si la case n\'est pas cochée, aucune date de fermeture n\'est définie.';
$string['timeopen'] = 'Heure d\'ouverture';
$string['timeopen_help'] = 'Vous pouvez indiquer la date d\'ouverture de l\'activité feedback. Si la case n\'est pas cochée, aucune date d\'ouverture n\'est définie.';
$string['typemissing'] = 'Valeur du type manquante';
$string['update_item'] = 'Enregistrer les modifications de la question';
$string['url_for_continue'] = 'URL atteint par le bouton continuer';
$string['url_for_continue_button'] = 'URL du bouton continuer';
$string['url_for_continue_help'] = 'Par défaut, la page affichée une fois le feedback envoyé est la page du cours. Vous pouvez définir ici une autre URL cible à afficher après l\'envoi.';
$string['use_one_line_for_each_value'] = '<br />Utilisez une ligne pour chaque réponse !';
$string['use_this_template'] = 'Utiliser avec ce modèle';
$string['using_templates'] = 'Utiliser un modèle';
$string['vertical'] = 'Vertical';
$string['viewcompleted'] = 'Feedbacks remplis';
$string['viewcompleted_help'] = 'Vous pouvez consulter les formulaires de feedback terminés, recherchables par cours et/ou par question.
Les réponses peuvent être exportées dans le format Excel.';
