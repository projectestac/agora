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
 * Strings for component 'attendanceregister', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   attendanceregister
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['are_you_sure_to_delete_offline_session'] = 'Êtes-vous sûr de vouloir supprimer cette session hors ligne ?';
$string['attendanceregister:addinstance'] = 'Ajouter un nouveau registre de présence';
$string['attendanceregister:addotherofflinesess'] = 'Pouvoir ajouter des sessions Hors ligne sur le registre de présence des autres';
$string['attendanceregister:addownofflinesess'] = 'Pouvoir ajouter des sessions Hors ligne sur son propre registre de présence';
$string['attendanceregister:deleteotherofflinesess'] = 'Pouvoir supprimer des sessions Hors ligne sur le registre de présence des autres';
$string['attendanceregister:deleteownofflinesess'] = 'Pouvoir supprimer des sessions Hors ligne sur son propre registre de présence';
$string['attendanceregister:recalcsessions'] = 'Pouvoir forcer le recalcul du registre de présence des sessions';
$string['attendanceregister:tracked'] = 'Est suivi sur le registre de présence';
$string['attendanceregister:viewotherregisters'] = 'Pouvoir afficher le registre de présence des autres';
$string['attendanceregister:viewownregister'] = 'Pouvoir voir son propre registre de présence';
$string['back_to_normal'] = 'Revenir à la version par défaut';
$string['back_to_tracked_user_list'] = 'Retour à la liste des utilisateurs suivis';
$string['click_for_detail'] = 'Cliquer pour voir les détails';
$string['comments'] = 'Commentaires';
$string['completiondurationgroup'] = 'Temps suivi total';
$string['completiontotalduration'] = 'Nécessite un temps [minutes]';
$string['count'] = '#';
$string['dayscertificable'] = 'Nombre de jours antérieurs';
$string['dayscertificable_exceeded'] = 'Ne doit pas être supérieure à {$a} jours';
$string['dayscertificable_help'] = 'Limites d\'ancienneté des sessions hors connexion. Un étudiant ne peut enregistrer une session hors ligne supérieure à ce nombre de jours.';
$string['duration'] = 'Durée';
$string['duration_hh_mm'] = '{$a->heure(s)} h, {$a->minutes} min';
$string['duration_mm'] = '{$a->minutes} min';
$string['enable_offline_sessions_certification'] = 'Activation des sessions hors ligne';
$string['end'] = 'Fin';
$string['first_calc_at_next_cron_run'] = 'Toutes les dernières sessions seront affichées à la prochaine exécution du Cron';
$string['force_recalc_all_session'] = 'Recalculer toutes les sessions en ligne';
$string['force_recalc_all_session_help'] = 'Supprimer et recalculer toutes les sessions en ligne de tous les utilisateurs suivis.
Normalement, vous n\'avez pas besoin de le faire !
Les nouvelles sessions sont calculées automatiquement en arrière-plan (après un certain délai). Cette opération peut être utile uniquement :
<ul>
<li>Après avoir changé le rôle d\'un utilisateur qui, auparavant, a agi dans l\'un des cours suivis avec un rôle différent (changement de formateur à apprenti, quand les apprentis sont suivis et que les formateurs ne le sont pas)</li>
<li>Après avoir modifié les paramètres du Registre qui affecte le calcul des Sessions ( mode de suivi de présence, temps de session en ligne)</li>
</ul>
Vous n\'avez pas besoin de recalculer lorsque vous inscrivez de nouveaux utilisateurs !
Le nouveau calcul peut être exécuté immédiatement ou planifié pour l\'exécution par la tâche Cron suivante. L\'exécution prévue pourrait être plus efficace pour les cours très fréquentés.';
$string['force_recalc_all_session_now'] = 'Recalculer les sessions maintenant';
$string['force_recalc_user_session'] = 'Recalculer cette session pour les utilisateurs actuellement en ligne';
$string['force_recalc_user_session_help'] = 'Supprimer et recalculer toutes les sessions en ligne de cet utilisateur. Normalement, vous n\'avez pas besoin de le faire !
Les nouvelles sessions sont calculées automatiquement en arrière-plan (après un certain délai). Cette opération peut être utile uniquement :
<ul>
<li>Si on a changé le rôle de l\'utilisateur, et qu\'il a déjà agi dans l\'un des cours suivis avec un rôle différent (changement de formateur à apprenti, quand les apprentis sont suivis et que les enseignants ne le sont pas)</li>
<li>Après avoir modifié les paramètres qui affectent le calcul des registres des sessions (mode de suivi des présences, durée de la session en ligne )</li>
</ul>';
$string['fullname'] = 'Nom';
$string['grandtotal_time'] = 'Durée totale';
$string['insert_new_offline_session'] = 'Insérer une nouvelle session de travail hors ligne';
$string['insert_new_offline_session_for_another_user'] = 'Insérez une nouvelle session de travail hors ligne pour {$a->fullname}';
$string['last_calc_online_session_logout'] = 'Désignez la dernière session à prendre en compte (hors la session en cours)';
$string['last_session_logout'] = 'Fin de la dernière session';
$string['last_site_access'] = 'Dernière activité sur le site';
$string['last_site_login'] = 'Dernière connexion sur le site';
$string['login_must_be_before_logout'] = 'Démarrer après la déconnexion';
$string['logout_is_future'] = 'Peut-être pas à l\'avenir';
$string['mandatory_offline_sessions_comments'] = 'Commentaires obligatoires';
$string['mandatoryofflinespecifycourse'] = 'Choix de cours obligatoires';
$string['mandatoryofflinespecifycourse_help'] = 'Spécifier un cours hors ligne.
Les sessions seront obligatoires';
$string['maynotaddselfcertforother'] = 'Vous ne pouvez pas ajouter des sessions hors connexion pour les autres utilisateurs.';
$string['modulename'] = 'Registre de présence';
$string['modulename_help'] = 'La liste de présence des utilisateurs calcule le temps passé à travailler dans des cours en ligne.
Elle permet également d\'enregistrer les activités des sessions hors ligne.
Selon le mode de présence, le suivi des activités peut s\'adresser à un cours unique, ou dans tous les cours de la même catégorie ou dans tous les cours « Metaliés ». Les séances de travail en ligne sont calculés sur les entrées du journal enregistrées par Moodle. Les nouvelles sessions en ligne sont ajoutées avec un certain retard par le Cron, après déconnexion de l\'utilisateur.';
$string['modulenameplural'] = 'Registres de présence';
$string['never'] = '(jamais)';
$string['no_refcourse'] = '(pas de cours spécifié)';
$string['no_session'] = 'pas de session';
$string['no_session_for_this_user'] = '- Pas encore de session pour cet utilisateur -';
$string['no_tracked_user'] = '- Aucun Utilisateur n\'est suivi par ce registre de présence -';
$string['not_specified'] = '(non spécifié)';
$string['offline'] = 'Hors ligne';
$string['offlinecomments'] = 'Commentaires utilisateurs';
$string['offlinecomments_help'] = 'Activer l\'ajout de commentaires textuels à des sessions Hors ligne';
$string['offline_refcourse_duration'] = 'Temps en ligne, des cours :';
$string['offline_session_comments'] = 'Commentaires';
$string['offline_session_comments_help'] = 'Décrivez le thème de la session de travail hors ligne.';
$string['offline_session_deleted'] = 'La session hors ligne est supprimée';
$string['offline_session_end'] = 'Fin';
$string['offline_session_ref_course'] = 'Référence du cours';
$string['offline_session_ref_course_help'] = 'Sélectionnez le cours hors connexion où le travail  a été fait pour qu\'il couvre le sujet du travail.';
$string['offline_session_saved'] = 'Nouvelle session enregistrée Hors ligne';
$string['offline_sessions_certification'] = 'Sessions de travail en mode hors ligne';
$string['offline_sessions_certification_help'] = 'Permet aux utilisateurs d\'insérer des sessions de travail en mode hors ligne. C\'est une sorte d\'auto-certification du travail accompli. Cela peut être utile si la « bureaucratie » administrative exige la tenue d\'un registre d\'activités de chaque élève.
Seuls les utilisateurs réels peuvent ajouter des Sessions Hors ligne: Les administrateurs connectés « en tant que ... » ne le peuvent pas !';
$string['offline_session_start'] = 'Démarrer';
$string['offline_session_start_help'] = 'Sélectionnez le début, la date et l\'heure de fin de la séance de travail hors ligne que vous souhaitez soumettre. La Session Hors ligne ne peut pas chevaucher n\'importe quelle session précédemment enregistrée, que ce soit en ligne ou hors ligne, ni la session en cours en ligne.';
$string['offline_sessions_total_duration'] = 'Total du temps Hors Ligne';
$string['offlinespecifycourse'] = 'Spécifiez les Cours des Sessions Hors ligne';
$string['offlinespecifycourse_help'] = 'Permettre à l\'utilisateur de sélectionner le cours de la session hors connexion qui est lié à. Ce n\'est significatif que si le registre suit plus d\'un cours (le mode de choix est soit « Catégorie » soit « métalié »)';
$string['online'] = 'En ligne';
$string['online_offline'] = 'En ligne / Hors ligne';
$string['online_sessions_total_duration'] = 'Total du temps des sessions En ligne';
$string['online_session_updated'] = 'Sessions en ligne mises à jour';
$string['online_session_updated_report'] = '{$a->fullname} Sessions en ligne mises à jour : {$a->numnewsessions} nouvellement découvertes';
$string['onlyrealusercanaddofflinesessions'] = 'Seuls les utilisateurs réels peuvent ajouter une session hors ligne';
$string['onlyrealusercandeleteofflinesessions'] = 'Seuls les utilisateurs réels peuvent supprimer une session hors ligne';
$string['overlaps_current_session'] = 'Chevauche la session en ligne en cours  (depuis votre connexion actuelle)';
$string['overlaps_old_sessions'] = 'Chevauche une autre session, que ce soit en ligne ou hors ligne';
$string['pluginadministration'] = 'Administration du registre de présence';
$string['pluginname'] = 'Registre de présence';
$string['prev_site_login'] = 'Connexion précédente sur le site';
$string['recalc_already_pending'] = '(Déjà en cours d\'exécution sur le Cron suivant)';
$string['recalc_complete'] = 'Recalcul des sessions complet';
$string['recalc_scheduled'] = 'Le recalcul de la session a été programmé. Il s\'exécute au prochain Cron';
$string['recalc_scheduled_on_next_cron'] = 'Le recalcul des Sessions est prévu pour l\'exécution de cron suivante';
$string['ref_course'] = 'Référence du cours';
$string['registername'] = 'Nom du registre de présence';
$string['registertype'] = 'Mode de contrôle de présence';
$string['registertype_help'] = 'Les modes de suivi déterminent les cours suivis par le traqueur (c\'est à dire quelles sont les activités des utilisateurs qui seront contrôlées) :
* Ce cours seulement : l\'activité sera contrôlée uniquement dans le cours où le module est installé.
 * Tous les cours de la catégorie : l\'activité sera contrôlée sur tous les cours de la même catégorie que celle du cours.
* Tous les cours liés : l\'activité sera suivie dans ce cours et tous les cours liés par la liaison méta cours.';
$string['schedule_reclalc_all_session'] = 'Recalcul des séances programmées au prochain CRON';
$string['select_a_course'] = '- Sélectionnez un cours -';
$string['select_a_course_if_any'] = '- Sélectionnez un cours, le cas échéant -';
$string['session_added_by_another_user'] = 'Ajouté par :  {$a}';
$string['sessions_grandtotal_duration'] = 'Temps total';
$string['sessiontimeout'] = 'Expiration de la session en ligne';
$string['sessiontimeout_help'] = 'Le Timeout de la session est utilisé pour estimer la durée de la session en ligne. Les sessions en ligne auront au moins la moitié de la valeur du Timeout. Notez que si l\'expiration de la session est trop longue, le registre a tendance à surestimer la durée des sessions en ligne. S\'il est trop court, les sessions réelles se scinderont dans de nombreuses sessions plus courtes.
Explication détaillée :
Les séances de travail en ligne sont devinées regardant les entrées du journal de l\'utilisateur dans les cours suivis (voir Tracking Mode de présence). Si un laps de temps plus court que l\'expiration de la session écoulée entre deux entrées du journal consécutifs, le Registre de l\'utilisateur considérera qu\'il travaille  continuellement en ligne (c\'est à dire la session suivante). Si le laps de temps est plus long que l\'expiration de la session écoulée, le registre supposera que l\'utilisateur a arrêté de travailler en ligne la moitié de la Session Timeout après l\'entrée de journal précédente (la session se termine) et revint à l\'entrée de journal suivante (soit une nouvelle session commence)';
$string['show_my_sessions'] = 'Afficher mes sessions';
$string['show_printable'] = 'Voir la version imprimable';
$string['start'] = 'Départ';
$string['total_time_offline'] = 'Temps total Hors ligne';
$string['total_time_online'] = 'Temps total En ligne';
$string['tracked_courses'] = 'Cours suivis';
$string['tracked_users'] = 'Utilisateurs suivis';
$string['type_category'] = 'Tous les cours de la même catégorie';
$string['type_course'] = 'Ce cours seulement';
$string['type_meta'] = 'Tous les cours liés à ce cours (Méta-cours)';
$string['unknown'] = '(Inconnu)';
$string['unreasoneable_session'] = 'Êtes-vous sûr ? C\'est plus important que {$a} heures !';
$string['updating_online_sessions_of'] = 'Mise à jour de sessions en ligne de {$a}';
$string['user_sessions_summary'] = 'Résumé des sessions des utilisateurs';
