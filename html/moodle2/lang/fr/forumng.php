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
 * Strings for component 'forumng', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   forumng
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addanewdiscussion'] = 'Ajouter une discussion';
$string['advancedsearch'] = 'Recherche avancée';
$string['afterenddate'] = 'Vous pouvez lire tous les messages de ce forum, mais vous ne pouvez pas publier de messages. Ce forum est verrouillé depuis le {$a}.';
$string['afterenddatecapable'] = 'Les étudiants peuvent lire tous les messages de ce forum mais ne peuvent plus publier de messages depuis la fermeture du forum le {$a}. Vous avez toujours accès aux messages publiés.';
$string['alert_condition1'] = 'Contenu abusif';
$string['alert_condition2'] = 'Contenu assimilé à du harcèlement moral';
$string['alert_condition3'] = 'Contenu choquant (pornographie, ...)';
$string['alert_condition4'] = 'Contenu calomnieux ou diffamatoire';
$string['alert_condition5'] = 'Contenu en contradiction avec les droits d\'auteurs';
$string['alert_condition6'] = 'Contenu sortant du cadre des règles du forum pour une autre raison';
$string['alert_conditionmore'] = 'Informations complémentaires (facultatif)';
$string['alert_emailappendix'] = 'Vous recevez cette notification suite a une utilisation de votre adresse mail sur le forumNG pour signaler un courriel inadapté.';
$string['alert_emailpreface'] = 'Un message sur le forum a été signalé par {$a->fullname} ({$a->username},
{$a->email}) {$a->url}';
$string['alert_emailsubject'] = 'Alerte F{$a->postid}: {$a->coursename} {$a->forumname}';
$string['alert_feedback'] = 'Votre rapport a été envoyé avec succès. Il va être traité par un membre de l\'équipe.';
$string['alert_info'] = 'La fonction "Signaler" permet d\'envoyer ce message au modérateur qui pourra juger de son contenu. <strong>Veuillez utiliser ce lien uniquement si vous pensez que le message enfreint les règles relatives à l\'utilisation du forum</strong>.';
$string['alert_intro'] = 'Vous pouvez utiliser le lien d\'alerte pour attirer l\'attention d\'un modérateur sur un message.';
$string['alert_link'] = 'Signaler';
$string['alert_linktitle'] = 'Marquer ce message comme inacceptable';
$string['alert_notcurrentpost'] = 'Ce message a déjà été supprimé.';
$string['alert_note'] = 'Note : Ce courriel a également été envoyé à {$a}';
$string['alert_pagename'] = 'Signaler un message comme incorrect';
$string['alert_reasons'] = 'Raison du signalement';
$string['alert_reporterdetail'] = '{$a->fullname} ({$a->username}; {$a->email}; {$a->ip})';
$string['alert_reporterinfo'] = '<strong>Détails sur le rapporteur</strong>:';
$string['alert_submit'] = 'Envoyer le rapport';
$string['alert_turnedoff'] = 'La fonction "Signaler" n\'est pas disponible.';
$string['allowsubscribe'] = 'Abonnement facultatif';
$string['allsubscribe'] = 'S\'abonner à tous les forums';
$string['allunsubscribe'] = 'Se désabonner de tous les forums';
$string['alt_discussion_deleted'] = 'Discussion supprimée';
$string['alt_discussion_locked'] = 'Discussion en lecture seule';
$string['alt_discussion_sticky'] = 'Cette discussion apparaît toujours en tête de liste';
$string['alt_discussion_timeout'] = 'Actuellement invisible pour les utilisateurs (limite de temps)';
$string['archive_errorgrouping'] = 'Le forum où doivent être déplacées les discussions a un réglage de groupes différent. Merci de modifier les paramètres de l\'option <strong>Nettoyer le forum</strong>.';
$string['archive_errortargetforum'] = 'Le forum où doivent être déplacées les discussions n\'existe plus. Merci de modifier les paramètres de l\'option <strong>Nettoyer le forum</strong>.';
$string['atom'] = 'Atom';
$string['attachment'] = 'Annexe';
$string['attachmentmaxbytes'] = 'Taille maximale de l\'annexe';
$string['attachmentmaxbytes_help'] = 'Il est possible de limiter la taille des annexes. Cette limite est fixée par la personne qui met en place le forum.';
$string['attachmentnum'] = 'Annexe {$a}';
$string['attachments'] = 'Annexes';
$string['author'] = 'auteur : "{$a}"';
$string['authorname'] = 'Nom de l\'auteur';
$string['authorname_help'] = 'Vous pouvez taper un prénom (Michel), un nom de famille (Dupont), le nom complet (Michel Dupont), ou la première partie de l\'un de ces éléments (Mic, dup, Michel D). La recherches est insensible à la casse.

Vous pouvez également taper un nom d\'utilisateur (dépend de votre système d\'authentification et de création de compte).

Si vous laissez ce champ vide, les messages de tous les auteurs seront inclus.';
$string['autolockedmessage'] = 'Cette discussion a été fermée automatiquement car le temps maximum d\'ouverture auorisé est écoulé.';
$string['automaticallylock'] = 'Verrouiller automatiquement';
$string['averagerating'] = 'Moyenne des évaluations : {$a->avg} (de {$a->num})';
$string['badbrowser'] = '<h3>Les fonctionnalités du forum sont réduites</h3>&nbsp;<p>Vous utilisez {$a}. Si vous souhaitez enrichir l\'expérience dans l\'utilisation des forums, vous devez mettre à jour votre version d\'<a href=\'http://www.microsoft.com/windows/internet-explorer/\'>Internet Explorer</a> ou <a href=\'http://www.mozilla.com/firefox/\'>de Firefox</a>.</p>';
$string['beforeenddate'] = 'Ce forum est fermé, pour recevoir les nouveaux messages sur {$a}.';
$string['beforeenddatecapable'] = 'Ce forum ferme pour les nouveaux messages d\'utilisateur le {$a}.';
$string['beforestartdate'] = 'Vous pouvez consulter les messages de ce forum, mais ne pouvez publier vos propres messages. L\'ouverture de ce forum aux publications est prévu le {$a}.';
$string['beforestartdatecapable'] = 'Les étudiants peuvent consulter tous les messages de ce forum, mais ne pourront envoyer leur propres publications jusqu\'au : {$a}. Vous avez accès aux messages envoyés avant cette date.';
$string['choosefile'] = '1. Choisir le fichier';
$string['clearflag'] = 'Retirer le marqueur';
$string['clicktoadd'] = '2. Ajouter';
$string['collapseall'] = 'Réduire tous les messages';
$string['completiondiscussions'] = 'L\'utilisateur doit créer une discussion :';
$string['completiondiscussionsgroup'] = 'Nombre de discussions requises :';
$string['completiondiscussionsgroup_help'] = 'Si l\'option est activée, le forum sera marqué complet pour un utilisateur une fois qu\'il a le nombre requis de nouvelles discussions (et a rempli une autre condition).';
$string['completionposts'] = 'L\'utilisateur doit lancer des discussions ou poster des messages :';
$string['completionpostsgroup'] = 'Nombre de discussions/messages requis';
$string['completionpostsgroup_help'] = 'Si l\'option est activée, le forum sera marqué complet pour un utilisateur une fois qu\'il a le nombre requis de discussions et réponses, en comptant chaque discussion ou réponse pour 1 (et a rempli toutes les autres conditions).';
$string['completionreplies'] = 'L\'utilisateur doit répondre à des messages :';
$string['completionrepliesgroup'] = 'Nombre de réponses requises :';
$string['completionrepliesgroup_help'] = 'Si l\'option est activée, le forum sera marqué complet pour un utilisateur une fois qu\'il a le nombre requis de réponses à des discussions existantes (et a rempli toutes les autres conditions).';
$string['configattachmentmaxbytes'] = 'Taille maximale des annexes des forums (cette taille dépend par ailleurs des limites définies au niveau du cours et d\'autres réglages locaux)';
$string['configdiscussionsperpage'] = 'Nombre maximal de discussions affichées sur une page';
$string['configdonotmailafter'] = 'Pour éviter l\'envoi d\'un nombre trop important de messages si le cron de maintenance n\'a pas été exécuté récemment, le forum n\'enverra pas les courriels correspondants aux messages plus vieux que ce nombre d\'heures.';
$string['configenableadvanced'] = 'Cette option active les fonctionnalités avancées du forum qui peuvent être inutilement complexes pour l\'utilisation standard du forum.<br>Actuellement, il ne s\'agit que du partage de forum mais d\'autres fonctionnalités seront ajoutées par la suite.';
$string['configenablerssfeeds'] = 'Cette option permet l\'activation des flux RSS pour tous les forums. Il est en outre nécessaire d\'activer manuellement les flux RSS dans les réglages de chaque forum.';
$string['configfeeditems'] = 'Nombre de messages récents inclus dans un flux.';
$string['configfeedtype'] = 'Sélectionner l\'information à inclure dans tous les flux RSS du forum.';
$string['confighousekeepingstarthour'] = 'Les tâches d\'archivage, telle que la suppression des anciennes discussions, commencera chaque jour à l\'heure définie ici.';
$string['confighousekeepingstophour'] = 'La tâche d\'archivage s\'arrêtera à l\'heure définie ici.';
$string['configpermanentdeletion'] = 'Après cette période, les messages supprimés et les anciennes versions de messages édités seront définitivement effacés de la base de données.';
$string['configreadafterdays'] = 'Après ce nombre de jours, les messages sont considérés comme étant lus par tous les usagers.';
$string['configreplytouser'] = 'Lorsqu\'un message est envoyé par courriel, doit-il contenir l\'adresse de courriel de son auteur, afin que le destinataire puisse l\'atteindre personnellement. Même lorsque cette option est activée, les utilisateurs peuvent choisir dans leur profil de garder leur adresse secrète.';
$string['configreportunacceptable'] = 'Adresse mail pour le rapport des messages signalés comme offensants. Si aucune adresse e-mail n\'est renseignée, la fonction "Signaler" sera désactivée, à moins qu\'elle ne le soit au niveau d\'un forum.';
$string['configshowidnumber'] = 'Inclut les numéros d\'identification dans les rapports liés au forum (peut être vu par les modérateurs mais pas par les étudiants)';
$string['configshowusername'] = 'Inclut les noms d\'utilisateur dans les rapports liés au forum (peut être vu par les modérateurs mais pas les étudiants)';
$string['configsubscription'] = 'Configuration des options de notification par courriel sur tous les forums du site.';
$string['configtrackreadposts'] = 'Mettre sur \'Oui\' pour permettre à l\'utilisateur de suivre la lecture du message.';
$string['configusebcc'] = 'Laisser cette valeur à 0 pour utiliser les réglages par défaut de la messagerie Moodle (plus sûr).<br>Indiquez un chiffre (par exemple 50) pour regrouper les messages du forum avec l\'option \'copie invisible\' (\'Cci\') pour que Moodle envoie un courriel unique depuis votre serveur de messagerie à de nombreux utilisateur.<br>Au lieu d\'envoyer 50 fois 1 message aux 50 personnes, cela envoie 1 message aux 50 personnes en copie invisible.';
$string['confirmbulkunsubscribe'] = 'Etes-vous sûr de vouloir désinscrire les utilisateurs sélectionnés dans la liste ci-dessous (l\'opération ne peut être annulée.)';
$string['confirmdelete'] = 'Etes-vous sûr de vouloir supprimer ce message ?';
$string['confirmdeletedraft'] = 'Etes-vous sûr de vouloir supprimer les brouillons de la liste ci-dessous ?';
$string['confirmdelete_notdiscussion'] = 'La suppression de ce message ne supprimera pas la discussion. Si vous souhaitez supprimer la discussion, utilisez les commandes au bas de la page de discussion.';
$string['confirmselection'] = 'Confirmer la sélection';
$string['confirmundelete'] = 'Etes-vous sûr de vouloir restaurer ce message ?';
$string['convert_hide'] = 'Laisser les nouveaux forums créés invisibles';
$string['convert_info'] = 'La conversion peut fonctionner sur un ou plusieurs forums \'anciens\'; actuellement seuls les forums de type \'général\' sont supportés. Pour sélectionner plusieurs forums dans la liste, utiliser la touche Ctrl.';
$string['convert_newforum'] = 'Nouveau forum';
$string['convert_nodata'] = 'Ne pas inclure les données liées aux utilisateurs (messages, abonnements, etc.)';
$string['convert_noforums'] = 'Il n\'y aucun ancien forum attaché à ce cours à convertir.';
$string['convert_noneselected'] = 'Aucun forum n\'est sélectionné pour la conversion ! Sélectionner un ou plusieurs forum(s).';
$string['convert_process_assignments'] = 'Mise à jour de l\'attribution des rôles...';
$string['convert_process_complete'] = 'Conversion effectuée en {$a->seconds}s (voir {$a->link}).';
$string['convert_process_dashboard'] = 'Conversion de vos préférences de tableaux de bord...';
$string['convert_process_dashboard_done'] = 'Validé (OK {$a->yay}, Echec {$a->nay}).';
$string['convert_process_discussions'] = 'Conversions des discussions...';
$string['convert_process_init'] = 'Création de la structure du forum...';
$string['convert_process_overrides'] = 'Mise à jour des dérogations des rôles...';
$string['convert_process_search'] = 'Recalcul des données de recherche...';
$string['convert_process_show'] = 'Rendre le forum visible...';
$string['convert_process_state_done'] = 'Terminé.';
$string['convert_process_subscriptions_initial'] = 'Conversion des abonnements initiaux...';
$string['convert_process_subscriptions_normal'] = 'Conversion des abonnements normaux...';
$string['convert_process_update_subscriptions'] = 'Conversion des abonnements de groupe...';
$string['convert_title'] = 'Convertir les forums';
$string['convert_warning'] = '<p>Lorsque vous cliquez sur \'Convertir\', le forum sélectionné sera converti. <br>Tous les messages et discussions
qu\'il contient seront traités, et cela peut prendre quelques minutes. Pendant la conversion les forums seront alors indisponibles.</p>
<ul>
<li>les anciens forums convertis seront cachés durant l\'exécution du processus de conversion. Cela vous garantit qu\'aucun nouveau message ne soit publié et \'exclus\' de la conversion</li>
<li>les nouveaux forums en création restent cachés durant toute la durée de la conversion. Ils ne seront seulement révélés qu\'après la fin du processus.</li>
</ul>';
$string['copytoself'] = 'S\'envoyer une copie';
$string['crondebug'] = 'Données de débogage du cron';
$string['crondebugdesc'] = 'Uniquement à des fins de test -- Cocher cette option pour inclure les données de débogage dans les rapports du cron';
$string['currentpost'] = 'Version actuelle du message';
$string['date_asc'] = 'les plus anciens';
$string['date_desc'] = 'les plus récents';
$string['daterangefrom'] = 'Date à partir de';
$string['daterangefrom_help'] = 'Utilisez les dates pour restreindre votre recherche pour inclure uniquement les messages dans la période donnée.

Si vous ne spécifiez pas les dates, les messages de n\'importe quelle date seront inclus dans les résultats.';
$string['daterangemismatch'] = 'Erreur de période : la <strong>Date à partir de</strong> est postérieure à la <strong>Date jusqu\'à</strong>.';
$string['daterangeto'] = 'Date jusqu\'à';
$string['delete'] = 'Effacer<span class=\'accesshide\'> le message {$a}</span>';
$string['deleteandemail'] = 'Supprimer et notifier l\'auteur par courriel';
$string['deleteattachments'] = 'Supprimer l\'annexe existante';
$string['deletedbyauthor'] = 'Ce message a été supprimé par l\'auteur le {$a}.';
$string['deletedbymoderator'] = 'Ce message a été supprimé par un modérateur le {$a}.';
$string['deletedbyuser'] = 'Ce message a été supprimé par {$a->user} le {$a->date}.';
$string['deletedforumpost'] = 'Votre message a été supprimé';
$string['deletedpost'] = 'Message effacé.';
$string['deletedraft'] = 'Supprimer le brouillon';
$string['deleteemailpostbutton'] = 'Supprimer et notifier';
$string['deletepermanently'] = 'Supprimer définitivement';
$string['deletepost'] = 'Message effacé : {$a}';
$string['deletepostbutton'] = 'Effacer';
$string['digestmailheader'] = 'Ceci est votre résumé quotidien des nouveaux messages de forum de {$a->sitename}. Pour modifier vos préférences de notification, allez à {$a->userprefs}.';
$string['digestmailprefs'] = 'Votre profil';
$string['digestmailsubject'] = '{$a}: résumé du forum';
$string['directlink'] = 'Permalien<span class=\'accesshide\'> du message {$a}</span>';
$string['directlinktitle'] = 'Lien direct vers ce message';
$string['disallowsubscribe'] = 'Les abonnements sont désactivés';
$string['discussion'] = 'Discussion';
$string['discussionoptions'] = 'Options de la discussion';
$string['discussions'] = 'Discussions';
$string['discussionsperpage'] = 'Discussions par page';
$string['discussionsunread'] = 'Discussions (non lus)';
$string['displayperiod'] = 'Période d\'affichage';
$string['displayperiod_help'] = 'Vous pouvez masquer cette discussion aux étudiants jusqu\'à, ou à partir, d\'une
certaine date.

Les étudiants ne voient pas la discussion masquée. Pour les modérateurs, la liste de discussion est affichée en gris avec l\'icône de l\'horloge.';
$string['displayversion'] = 'Version de ForumNG : <strong>{$a}</strong>';
$string['donotmailafter'] = 'Ne pas envoyer de courriel après (heure(s))';
$string['draft'] = 'Brouillon';
$string['draft_cannotreply'] = '<p>Il n\'est pas possible d\'ajouter une réponse pour le message faisant référence à. {$a}</p><p>Vous pouvez utiliser le bouton X à coté de ce brouillon sur la page principale du forum, pour voir le contenu complet de votre brouillon (vous pouvez alors le copier/coller à destination d\'un autre emplacement) et pouvoir le supprimer.</p>';
$string['draftexists'] = 'Une version de ce brouillon a été sauvegardé le {$a}. Si vous ne terminez pas la rédaction de ce message maintenant, vous le retrouverez en tant que brouillon sur la page principale de ce forum.';
$string['draft_inreplyto'] = '(en réponse à {$a})';
$string['draft_mismatch'] = 'Une erreur s\'est produite pendant l\'accès au brouillon du message (il se peut que vous n\'en soyez pas l\'auteur, ou bien qu\'il ne fasse pas partie de la discussion en cours).';
$string['draft_newdiscussion'] = '(nouvelle discussion)';
$string['draft_noedit'] = 'L\'option  "brouillon" ne peut être utilisée pendant l\'édition des messages.';
$string['drafts'] = 'Brouillons inachevés';
$string['drafts_help'] = 'Lorsque vous enregistrer un brouillon, il apparaît dans cette liste. Cliquez sur le brouillon pour reprendre le travail.

Si vous souhaitez supprimer le brouillon, cliquez sur l\'icône de suppression. il y aura un message de confirmation.

Dans certains cas, il peut ne pas être possible de continuer votre brouillon (par exemple si elle est en réponse à une discussion qui a depuis été supprimée). Dans cette situation, vous pouvez récupérer le contenu de votre brouillon en cliquant sur l\'icône de suppression.';
$string['edit'] = 'Editer<span class=\'accesshide\'> le message {$a}</span>';
$string['editbyother'] = 'Modifié par {$a->name} le {$a->date}';
$string['editbyself'] = 'Modifié par l\'auteur le {$a}';
$string['editdiscussionoptions'] = 'Editer les options de la discussions : {$a}';
$string['editlimited'] = 'Attention : enregistrez toutes les modifications apportées à ce message avant {$a}. Après, toute modification vous sera impossible.';
$string['edit_locked'] = 'Cette discussion est actuellement verrouillée.';
$string['edit_nopermission'] = 'Vous n\'êtes pas autorisé à éditer ce type de message.';
$string['edit_notcurrentpost'] = 'Vous ne pouvez pas éditer les messages supprimés ou les versions antérieures des messages.';
$string['edit_notdeleted'] = 'Vous ne pouvez pas restaurer un message qui n\'a pas été supprimé.';
$string['edit_notlocked'] = 'Cette discussion n\'est pas verrouillée.';
$string['edit_notyours'] = 'Vous ne pouvez pas éditer le message d\'un autre utilisateur.';
$string['editpost'] = 'Editer le message : {$a}';
$string['edit_readonly'] = 'Ce forum est en lecture seule, les messages ne peuvent être édités.';
$string['edit_rootpost'] = 'Cette action ne peut pas s\'appliquer à un message qui débute une discussion.';
$string['edit_timeout'] = 'Vous n\'êtes plus autorisé à éditer ce message; le temps requis pour l\'édition est épuisé.';
$string['edit_wronggroup'] = 'Vous ne pouvez pas effectuer de changements à vos messages en dehors de votre groupe.';
$string['emailcontenthtml'] = 'Ceci est une notification pour vous informer que votre message sur le forum avec les détails suivants a été supprimé par \'{$a->firstname} {$a->lastname}\':<br />
<br />
Sujet : {$a->subject}<br />
Forum : {$a->forum}<br />
Espace de cours : {$a->course}<br/>
<br/>
<a href="{$a->deleteurl}" title="voir le message supprimé">Voir la discussion</a>';
$string['emailcontentplain'] = 'Ceci est une notification pour vous informer que votre message sur le forum avec les détails suivants a été supprimé par \'{$a->firstname} {$a->lastname}\':

Sujet : {$a->subject}
Forum : {$a->forum}
Espace de cours : {$a->course}

Cliquez sur {$a->deleteurl} pour voir la discussion';
$string['emailerror'] = 'Il y a eu une erreur lors de lenvoi du courriel';
$string['emailmessage'] = 'Message';
$string['enableadvanced'] = 'Activer les fonctions avancées';
$string['enablelimit'] = 'Nombre maximal de messages par utilisateur';
$string['enablelimit_help'] = 'Ce réglage définit le nombre maximal de messages qu\'un participant peut poster durant une période donnée. Les utilisateurs ayant la capacité <tt>mod/forumng:ignorethrottling</tt> ne sont pas touchés par les limites de message.<br>Quand un utilisateur n\'est autorisé qu\'à  3 messages par exemple, un avertissement s\'affiche sous la forme d\'un message. Après la limite, le système affiche le moement auquel il sera en mesure de poster à nouveau un message dans le forum.';
$string['enableratings'] = 'Autoriser l\'évaluation des messages';
$string['enableratings_help'] = 'Si l\'option est activée, les messages du forum peuvent être évalués en utilisant une échelle numérique par défaut ou définie. Une ou plusieurs personnes peuvent évaluer le message et l\'évaluation affichée est la moyenne de ces évaluations.<br>Si vous utilisez une échelle numérique jusqu\'à 5 (ou moins), une jolie «étoile» est affichée. Sinon, c\'est une liste déroulante.<br>Les rôles contrôlent qui peut évaluer et voir les évaluations. Par défaut, seuls les enseignants peuvent évaluer les messages, et les étudiants ne peuvent voir que les notes sur leurs propres messages.';
$string['error_cannotchangediscussionsubscription'] = 'Vous n\'êtes pas autorisé à vous abonner ou vous désabonner à cette discussion.';
$string['error_cannotchangegroupsubscription'] = 'Vous n\'êtes pas autorisé à vous abonner ou vous désabonner du groupe sélectionné.';
$string['error_cannotchangesubscription'] = 'Vous n\'êtes pas autorisé à vous abonner ou vous désabonner de ce forum.';
$string['error_cannotmanagediscussion'] = 'Vous n\'avez pas la possibilité de gérer cette discussion.';
$string['error_cannotmarkread'] = 'Vous n\'êtes pas autorisé marquer les discussions comme "lues" dans ce forum.';
$string['error_cannotsubscribetogroup'] = 'Vous n\'êtes pas autorisé à vous abonner au groupe sélectionné.';
$string['error_cannotunsubscribefromgroup'] = 'Vous n\'êtes pas autorisé à vous désabonner du groupe sélectionné.';
$string['error_cannotviewdiscussion'] = 'Vous n\'êtes pas autorisé a accéder à cette discussion.';
$string['error_draftnotfound'] = 'Impossible de trouver le brouillon du message. Le brouillon est peut être déjà posté ou a été supprimé.';
$string['error_duplicate'] = 'Vous avez déjà rédigé un message en utilisant le formulaire précédent. (Cette erreur apparaît parfois si vous cliquez deux fois sur le bouton d\'envoi du message. Dans ce cas, votre message est sauvegardé)';
$string['error_exception'] = 'Une erreur s\'est produite sur le forum. Veuillez réessayer plus tard ou effectuer une autre action.<div class=\'forumng-errormessage\'>Message d\'erreur : {$a}</div>';
$string['error_feedlogin'] = 'Erreur chargement de l\'utilisateur';
$string['error_fileexception'] = 'Une erreur de traitement de fichier s\'est produite. C\'est susceptible d\'être causé par un problème du système. Merci de réessayer plus tard.';
$string['errorfindinglastpost'] = 'Erreur de calcul pour le dernier message (incohérence de la base de données ?)';
$string['error_forwardemail'] = 'Il y a eu une erreur lors de l\'envoi du courriel à  <strong>{$a}</strong>. Le courriel n\'a pu être envoyé.';
$string['errorinvalidforum'] = 'Le forum cible pour l\'archivage d\'anciennes discussions n\'existe plus. Veuillez choisir un autre forum.';
$string['error_invalidsubscriptionrequest'] = 'Votre demande d\'abonnement n\'est pas valide.';
$string['error_makebig'] = 'Le cours ne contient que {$a->users} utilisateurs et vous avez demandé à {$a->readusers} lecteurs de lire chaque discussion. Merci de créer ou d\'inscrire plus d\'utilisateurs.';
$string['error_markreadparams'] = 'Paramètre incorrect: nécessite un identifiant ou un cours.';
$string['error_nopermission'] = 'Vous n\'êtes pas autorisé à effectuer cette demande.';
$string['error_nosharedforum'] = 'Forum <strong>{$a->name}</strong> : impossible de le restaurer en tant que forum partagé ; numéro d\'identification {$a->idnumber} introuvable. Le forum a été restauré en tant que forum indépendant.';
$string['error_notwhensharing'] = 'Cette option n\'est pas disponible lorsque le forum est partagé.';
$string['error_portfoliosave'] = 'Une erreur s\'est produite pendant la sauvegarde vers Mon dossier.';
$string['error_ratingrequired'] = 'La notation basée sur les évaluations a été choisie mais les évaluations ne sont pas activées';
$string['error_ratingthreshold'] = 'Le seuil doit être un nombre positif.';
$string['error_sendalert'] = 'Une erreur s\'est produite lors de l\'envoi de votre rapport {$a}. Le rapport n\'a pas été envoyé.';
$string['error_sharingidnumbernotfound'] = 'Lorsque vous utilisez un forum partagé, vous devez entrer un numéro d\'identification qui corresponde exactement à un numéro précédemment entré dans un forum partagé.';
$string['error_sharinginuse'] = 'Vous ne pouvez pas désactiver le partage de ce forum car il y a déjà des forums qui le partagent. Si nécessaire, supprimer d\'abord ces autres forums.';
$string['error_sharingrequiresidnumber'] = 'Lorsque vous partagez ce forum, vous devez entrer un numéro d\'identification unique pour tout le site.';
$string['error_subscribeparams'] = 'Paramètre incorrect: nécessite un identifiant ou un cours associé.';
$string['error_system'] = 'Une erreur système est survenue : {{$a}}';
$string['error_unknownsort'] = 'Critère de tri inconnu.';
$string['existingattachments'] = 'Annexe(s) existante(s)';
$string['expand'] = 'Développer <span class=\'accesshide\'> le message {$a}</span>';
$string['expandall'] = 'Développer tous les messages';
$string['exportedtitle'] = 'Discussions &lsquo;{$a->subject}&rsquo; du forum exportée le {$a->date}';
$string['exportword'] = 'Exportation au format Word';
$string['externaldashboardadd'] = 'Ajouter le forum au tableau de bord';
$string['externaldashboardremove'] = 'Supprimer le forum du tableau de bord';
$string['feeditems'] = 'Nombre d\'articles RSS récents';
$string['feeditems_help'] = 'Nombre d\'articles inclus dans le flux Atom/RSS. Si ce paramètre est réglé trop bas, les utilisateurs qui ne vérifient pas souvent le flux pourraient manquer des messages.';
$string['feed_nopermission'] = 'Vous n\'avez pas la permission d\'accéder à ce fil.';
$string['feed_notavailable'] = 'Ce fil n\'est pas disponible.';
$string['feeds'] = 'Flux RSS';
$string['feedtype'] = 'Flux RSS de cette activité';
$string['feedtype_all_posts'] = 'Messages';
$string['feedtype_discussions'] = 'Discussions';
$string['feedtype_help'] = 'Cette option vous permet d\'activer le flux RSS de ce forum.<br>Vous pouvez choisir entre deux types de flux RSS :<br>Discussions : le flux généré comprendra les nouvelles discussions du forum avec leur message initial.<br>Messages : le flux généré comprendra tous les nouveaux messages postés dans le forum..';
$string['feedtype_none'] = 'Flux RSS désactivé';
$string['flaggedposts'] = 'Messages marqués';
$string['flaggedposts_help'] = 'Les messages marqués d\'un drapeau apparaissent dans cette liste. Pour accéder à un message marqué,
cliquez dessus.

Pour enlever le drapeau d\'un message, cliquez sur l\'icône du drapeau (ici ou dans le message).';
$string['flaggedpostslink'] = '{$a} message(s) marqué(s) comme Important';
$string['flagoff'] = 'Non marqué';
$string['flagon'] = 'Vous avez marqué ce message';
$string['forbidattachments'] = 'Annexe impossible';
$string['forcesubscribe'] = 'Forcer tout le monde à être (définitivement) abonné';
$string['forum'] = 'Forum';
$string['forumintro'] = 'Introduction au forum';
$string['forumname'] = 'Nom du forum';
$string['forumng:addinstance'] = 'Ajouter un nouveau ForumNG';
$string['forumng:copydiscussion'] = 'Copier la discussion';
$string['forumng:createattachment'] = 'Annexe';
$string['forumng:deleteanypost'] = 'Supprimer chaque message';
$string['forumng:editanypost'] = 'Editer chaque message';
$string['forumng:forwardposts'] = 'Transférer le(s) message(s) par courriel';
$string['forumng:grade'] = 'Noter les messages';
$string['forumng:ignorepostlimits'] = 'Ignorer la limitation du nombre de messages';
$string['forumng:mailnow'] = 'Notifier par courriel avant la fin du délai d\'édition';
$string['forumng:managediscussions'] = 'Gérer les options de la discussion';
$string['forumng:managesubscriptions'] = 'Gérer les abonnements';
$string['forumng:movediscussions'] = 'Déplacer les discussions';
$string['forumng:rate'] = 'Evaluer les messages';
$string['forumng:replypost'] = 'Répondre aux messages';
$string['forumng:setimportant'] = 'Marquer les messages comme <strong>Important</strong>';
$string['forumng:splitdiscussions'] = 'Séparer la discussion';
$string['forumng:startdiscussion'] = 'Démarrer une nouvelle discussion';
$string['forumng:view'] = 'Voir les forums';
$string['forumng:viewallposts'] = 'Voir les messgaes cachés et effacés';
$string['forumng:viewanyrating'] = 'Voir toutes les évaluations';
$string['forumng:viewdiscussion'] = 'Voir les discussions';
$string['forumng:viewrating'] = 'Voir les évaluations de ses propores messages';
$string['forumng:viewreadinfo'] = 'Voir qui a lu un message';
$string['forumng:viewsubscribers'] = 'Voir les abonnés';
$string['forums'] = 'Forums';
$string['forumtype'] = 'Type de forum';
$string['forumtype_help'] = 'Différents types de forums sont disponibles à des fins spécifiques ou à des méthodes d\'enseignement. Le type de forum standard est approprié pour toutes les conditions normales d\'utilisation.';
$string['forumtype_link'] = 'mod/forumng/forumtypes';
$string['from'] = 'de : {$a}';
$string['grade'] = 'Note';
$string['grading'] = 'Type de combinaison';
$string['grading_average'] = 'Moyenne des évaluations';
$string['grading_count'] = 'Nombre d\'évaluations';
$string['grading_help'] = 'Si vous sélectionnez cette option, une note pour ce forum sera ajoutée au carnet de notes du cours et sera calculée automatiquement. Laissez vide pour un forum non-évalué, ou si vous prévoyez de l\'évaluer manuellement.<br>Les différentes manières de calculer sont assez explicites : dans chaque cas, la note pour chaque utilisateur est calculée sur la base de toutes les notes pour tous les messages qu\'il a posté dans le forum. Le classement est limités à l\'échelle, par exemple si l\'échelle est de 0-3, la méthode de classement est sur «compter» et le classement des messages de l\'utilisateur ayant reçu 17 votes sera de 3.';
$string['grading_max'] = 'Evaluation maximale';
$string['grading_min'] = 'Evaluation minimale';
$string['grading_none'] = 'Pas d\'évaluation';
$string['gradingscale'] = 'Echelle de notation';
$string['grading_sum'] = 'Somme des évaluations';
$string['group'] = 'Groupe';
$string['hasunreadposts'] = '(Messages non lus)';
$string['hidelater'] = 'Ne plus montrer ces instructions';
$string['history'] = 'Historique';
$string['historypage'] = 'Historique : {$a}';
$string['housekeepingstarthour'] = 'Heure de début de l\'archivage';
$string['housekeepingstophour'] = 'Heure de fin d\'archivage';
$string['important'] = 'Message important';
$string['inappropriatedateortime'] = 'La <strong>ériode de fin</strong> est ultérieure à la date du jour. Veuillez vérifier et essayer à nouveau.';
$string['initialsubscribe'] = 'Abonnement automatique';
$string['inreplyto'] = 'En réponse à';
$string['invalidalert'] = 'Vous devez préciser la raison pour laquelle vous avez signalé ce message.';
$string['invalidalertcheckbox'] = 'Vous devez cocher au moins une case.';
$string['invalidemail'] = 'Cette adresse mail n\'est pas valide. Veuillez entrer une adresse mail unique.';
$string['invalidemails'] = 'Cette adresse mail n\'est pas valide. Veuillez entrez une ou plusieurs adresses, séparées par des espaces ou des points-virgules.';
$string['invalidforum'] = 'Ce forum n\'existe plus';
$string['js_clicktoclearrating'] = 'Cliquer pour supprimer votre évaluation.';
$string['js_clicktosetrating'] = 'Cliquer pour attribuer # étoiles à ce message.';
$string['js_clicktosetrating1'] = 'Cliquer pour attribuer 1 étoile à ce message.';
$string['jserr_alter'] = 'Il y a eu une erreur endommageant le contenu de votre message. <br>Rechargez la page et essayez à nouveau.';
$string['jserr_attachments'] = 'Il y avait une erreur de chargement de l\'annexe dans l\'éditeur.<br>Rechargez cette page et réessayez.';
$string['jserr_load'] = 'Il y a eu une erreur lors du chargement de ce message.<br>Rechargez la page et essayez à nouveau.';
$string['jserr_save'] = 'Il y a eu une erreur pendant la sauvegarde ce message.<br>Copiez le texte dans un autre programme afin de ne pas perdre son contenu, rechargez la page et essayez à nouveau.';
$string['js_nopublicrating'] = 'Pas encore évalué.';
$string['js_nouserrating'] = 'Vous n\'avez pas encore évalué cet élément.';
$string['js_nratings'] = '(# évaluations)';
$string['js_nratings1'] = '(1 évaluation)';
$string['js_outof'] = '(Hors de #)';
$string['js_publicrating'] = 'Moyenne des évaluations : #.';
$string['js_userrating'] = 'Votre évaluation : #.';
$string['jumpnext'] = 'Message non-lu suivant';
$string['jumpparent'] = 'Parent';
$string['jumpprevious'] = 'Message non-lu précédent';
$string['jumppreviousboth'] = 'Précédent';
$string['jumpto'] = 'Aller à :';
$string['lastpost'] = 'Dernier message';
$string['limitposts'] = 'Nombre maximal de messages';
$string['lockedtitle'] = 'Cette discussion est maintenant fermée';
$string['mailnow'] = 'Envoyer maintenant';
$string['mailnow_help'] = 'Envoyer votre message par courriel aux abonnés plus rapidement.

Sauf si vous choisissez cette option, le système attend pendant un certain temps avant d\'envoyer le message de telle sorte que toutes les modifications que vous pourriez faire peuvent être inclus dans le courriel.';
$string['markdiscussionread'] = 'Marquer tous les messages de ce fil de discusisons comme lus.';
$string['message'] = 'Message';
$string['modulename'] = 'ForumNG';
$string['modulename_help'] = 'ForumNG est un remplaçant du forum standard de Moodle avec la plupart des caractéristiques du forum standard, mais contenant également beaucoup d\'autres options et une autre interface utilisateur.

NG signifie \'Nouvelle Génération\'.';
$string['modulenameplural'] = 'ForumsNG';
$string['move_nogroups'] = 'Vous n\'avez pas accès à certains groupes dans le forum sélectionné.';
$string['move_notselected'] = 'Vous devez sélectionner un forum cible dans le menu déroulant, avant de cliquer sur le bouton \'déplacer\'.';
$string['newdiscussion'] = 'Nouvelle discussion';
$string['nextresults'] = 'Plus de résultats';
$string['nodiscussions'] = 'Il n\'y a pas encore de discussion dans ce forum.';
$string['noguestsubscribe'] = 'Désolé, les visiteurs ne sont pas autorisés à s\'abonner pour recevoir les messages des forums par courriel.';
$string['nosearchcriteria'] = 'Ce critère de recherche n\'est pas valide : veuillez utiliser un ou plusieurs des critères ci-dessous et réessayez.';
$string['nosubscribers'] = 'Il n\'y a pas encore d\'abonné à ce forum.';
$string['nosubscribersgroup'] = 'Personne du groupe n\'est encore abonné à ce forum.';
$string['notext'] = '(pas de texte)';
$string['nothingfound'] = 'Aucun résultat ne correspond à votre recherche. Veuillez tenter une autre requête.';
$string['nothingtodisplay'] = '<h3>Rien à afficher</h3>';
$string['numberofdiscussion'] = 'Discussion {$a}';
$string['numberofdiscussions'] = 'Discussions {$a}';
$string['numeric_asc'] = 'les plus nombreux';
$string['numeric_desc'] = 'les moins nombreux';
$string['numposts'] = '{$a} message(s)';
$string['offerconvert'] = 'Si vous voulez créer un nouveau ForumNG comme copie de l\'ancienne-version, veillez ne pas utiliser ce formulaire. Utilisez plutôt, <a href=\'{$a}\'>Convertir les forums.';
$string['olderversions'] = 'Anciennes versions (la plus récente en premier)';
$string['onemonth'] = '1 mois';
$string['optionalsubject'] = 'Changer le sujet (facultatif)';
$string['partialsubscribed'] = 'Partiel';
$string['pastediscussion'] = 'Coller la discussion';
$string['perforumoption'] = 'A configurer séparément pour chaque forum';
$string['permanentdeletion'] = 'Supprimer définitivement les données obsolètes';
$string['permanentdeletion_never'] = 'Jamais (ne pas supprimer les données obsolètes)';
$string['permanentdeletion_soon'] = 'Dès que possible';
$string['pluginadministration'] = 'Administration ForumNG';
$string['pluginname'] = 'ForumNG';
$string['post'] = 'Message';
$string['postby'] = '(par {$a})';
$string['postdiscussion'] = 'Envoyer';
$string['postinfo_deleted'] = 'Effacé';
$string['postinfo_short'] = 'Résumé';
$string['postinfo_unread'] = 'Non lu';
$string['postingfrom'] = 'Poster des messages à partir du';
$string['postinguntil'] = 'Poster des messages jusqu\'au';
$string['postmailinfo'] = 'Ceci est la copie du message de forum posté sur le site {$a}.<br>Pour ajouter une réponse au message depuis {$a}, cliquez sur le lien suivant :';
$string['postnum'] = 'Message {$a->num}';
$string['postnumreply'] = 'Message {$a->num}{$a->info} en réponse à {$a->parent}';
$string['postreply'] = 'Envoyer une réponse';
$string['posts'] = 'Messages';
$string['postsper'] = 'Messages sur';
$string['previousresults'] = 'Retour au résultats {$a}';
$string['quotaleft_plural'] = 'Vous ne pouvez publier plus que <strong>{$a->posts}</strong> messages au cours de ces {$a->period}-ci.';
$string['quotaleft_singular'] = 'Vous ne pouvez publier plus que <strong>{$a->posts}</strong> messages au cours de ce {$a->period}-ci.';
$string['rate'] = 'Evaluation';
$string['rate_nopermission'] = 'Vous n\'avez pas la possibilité d\'évaluer ce message ({$a}).';
$string['ratingfrom'] = 'Evaluer les éléments à partir du';
$string['ratings'] = 'évaluations';
$string['ratingthreshold'] = 'Nombre d\'évaluations requises avant affichage de la note';
$string['ratingthreshold_help'] = 'Si vous définissez cette option à 3, alors la note pour un message ne sera pas visible avant que 3 personnes n\'évaluent le message.<br>Cela peut aider à réduire l\'effet d\'une note unique sur la moyenne.';
$string['ratingtime'] = 'Restreindre l\'évaluation aux éléments dont les dates sont dans cet intervalle :';
$string['ratinguntil'] = 'Evaluer les éléments jusqu\'au';
$string['re'] = 'Re: {$a}';
$string['readafterdays'] = 'Délai de lecture';
$string['readdata'] = 'Lecture des données';
$string['removeolddiscussions'] = 'Nettoyer le forum';
$string['removeolddiscussionsafter'] = 'Supprimer les discussions après (mois)';
$string['removeolddiscussionsdefault'] = 'Ne jamais supprimer';
$string['removeolddiscussions_help'] = 'Le système peut supprimer automatiquement les discussions si elles n\'ont pas eu de nouvelles réponses pendant un certain laps de temps.';
$string['replies'] = 'Réponses';
$string['reply'] = 'Répondre<span class=\'accesshide\'> au message {$a}</span>';
$string['reply_missing'] = 'Vous ne pouvez pas répondre à ce message car il est introuvable.';
$string['reply_nopermission'] = 'Vous ne disposez pas des droits nécessaires pour répondre.';
$string['reply_notcurrentpost'] = 'Vous ne pouvez pas répondre aux messages supprimés ou aux versions antérieures de ce message.';
$string['reply_postquota'] = 'Vous ne pouvez pas répondre actuellement aux messages car vous avez atteint la limite maximale d\'envoi.';
$string['reply_readonly'] = 'Ce forum est en lecture seule, aucune réponses ne peuvent être ajoutées.';
$string['replytopost'] = 'Répondre au message : {$a}';
$string['replytouser'] = 'Utiliser l\'adresse de l\'auteur dans le champ "Répondre à"';
$string['reply_typelimit'] = 'En raison du format spécifique de ce forum, vous ne pouvez pas répondre à ce message.';
$string['reply_wronggroup'] = 'Vous ne pouvez pas répondre aux messages de cette discussion, car vous n\'êtes pas dans le bon groupe.';
$string['reportingemail'] = 'Courriel de contact pour le signalement de messages offensants';
$string['reportingemail_help'] = 'Si cette adresse mail est fournie, alors un lien "Signaler" apparaît à côté de chaque message. Les utilisateurs peuvent cliquer sur le lien pour rapporter des messages offensifs. Les informations seront envoyées à cette adresse.<br>Si cette adresse mail n\'est pas renseignée, la fonction de rapport ne sera pas disponible (à moins qu\'une adresse spécifique au niveau du site a été fournie).';
$string['reportunacceptable'] = 'Courriel de contact pour le signalement de messages offensants';
$string['saveallratings'] = 'Enregistrer toutes les évaluations';
$string['savedposts_all'] = '{$a}';
$string['savedposts_all_tag'] = 'Discussion du forum';
$string['savedposts_one'] = '{$a->name}: {$a->subject}';
$string['savedposts_one_tag'] = 'Message du forum';
$string['savedposts_original'] = 'Source originale de la discussion';
$string['savedposts_selected'] = '{$a} (messages sélectionnés)';
$string['savedposts_selected_tag'] = 'Messages du forum';
$string['savedraft'] = 'Enregistrer comme brouillon';
$string['savedtoportfolio'] = 'Les informations ont été sauvées dans "Mon dossier".';
$string['savetoportfolio'] = 'Sauvegarder dans "Mon dossier"';
$string['searchallforums'] = 'Rechercher dans tous les forums';
$string['searchresults'] = 'Résultats de la recherche : <strong>{$a}</strong>';
$string['searchthisforum'] = 'Rechercher dans ce forum';
$string['searchthisforum_help'] = 'Tapez le terme recherché ici.

Utilisez les guillemets pour rechercher des expressions exactes.

Pour exclure un mot, insérez un trait d\'union immédiatement avant celui-ci.

Par exemple: la recherche <tt> picasso -sculpture "premières œuvres" </ tt> renverra des résultats pour le terme "Picasso" ou l\'expression "premières œuvres" mais exclura les éléments contenant le terme "sculpture".

Si vous laissez cette zone vide, tous les messages qui correspondent à l\'auteur et/ou à des critères de date seront retournés, indépendamment de leur contenu.';
$string['searchthisforumlink'] = 'Rechercher dans ce forum';
$string['searchthisforumlink_help'] = 'Tapez le terme recherché ici.

Utilisez les guillemets pour rechercher des expressions exactes.

Pour exclure un mot, insérez un trait d\'union immédiatement avant celui-ci.

Par exemple: la recherche <tt> picasso -sculpture "premières œuvres" </ tt> renverra des résultats pour le terme "Picasso" ou l\'expression "premières œuvres" mais exclura les éléments contenant le terme "sculpture".

Si vous laissez cette zone vide, tous les messages qui correspondent à l\'auteur et/ou à des critères de date seront retournés, indépendamment de leur contenu.';
$string['searchtime'] = 'Rechercher par date : {$a} s';
$string['search_update_count'] = '{$a} forums à traiter.';
$string['selectdiscintro'] = 'Cochez la case en face de chaque discussion que vous voulez inclure. Quand vous avez terminé, faites défiler jusqu\'au bas de la page et cliquez sur &lsquo;Confirmer la sélection&rsquo;.';
$string['selectedposts'] = 'Messages sélectionnés';
$string['selectintro'] = 'Cocher chaque message que vous souhaitez inclure dans la sélection. Lorsque que votre sélection est terminée, cliquer sur \'Confirmer la sélection\' en bas de la page.';
$string['selectlabel'] = 'Sélectionner le message {$a}';
$string['selectorall'] = 'Voulez-vous inclure la discussion complète ou seulement les messages sélectionnés ?';
$string['selectoralldisc'] = 'Toutes les dicussions affichées';
$string['selectordiscall'] = 'Voulez-vous inclure toutes les discussions affichées sur cete page, ou en sélectionneer certaines?';
$string['selectorselectdisc'] = 'Sélecionnez des discussions';
$string['selectorselecteddisc'] = 'Les discussions sélectionnées';
$string['sendanddelete'] = 'Envoyer et effacer';
$string['set'] = 'Réglages';
$string['setflag'] = 'Marquer ce message pour une référence ultérieure';
$string['setimportant'] = 'Marquer ce message comme \'Important';
$string['shared'] = 'Autoriser le partage de ce forum';
$string['shared_help'] = 'Cochez cette case et définissez le numéro d\'identification dans le champ ci-dessous, afin de permettre le partage de ce forum.<br>Ce forum va devenir le forum d\'origine. Vous pouvez ensuite créer un ou plusieurs exemplaires de ce forum en choisissant <strong>Forum partagé existant</strong>, et en indiquant le même numéro d\'identification lors de la création de chaque copie.';
$string['sharedinfo'] = 'Il s\'agit d\'un forum partagé. Les paramètres d\'accès ici présents ne sont pas partagés, et s\'appliquent exclusivement aux étudiants qui accèdent au forum partagé de ce cours. Si vous souhaitez éditer d\'autres paramètres pour le forum, merci <a href=\'{$a}\'> d\'éditer les paramètres du forum d\'origine.</a>.';
$string['sharedviewinfoclone'] = '<strong>Il s\'agit d\'un forum partagé</strong>. Le <a href=\'{$a->url}\'>forum d\'origine</a> se trouve dans le cours {$a->shortname}.';
$string['sharedviewinfolist'] = 'Il est utilisé dans le(s) cours suivant(s) : {$a}.';
$string['sharedviewinfonone'] = 'Il n\'est actuellement utilisé dans aucun autre cours.';
$string['sharedviewinfooriginal'] = '<strong>Ce forum est partagé</strong> sous l\'identifiant <strong>{$a}</strong> pour une utilisation dans d\'autres cours.';
$string['sharing'] = 'Partage de forum';
$string['showidnumber'] = 'Afficher les numéros d\'identification';
$string['showusername'] = 'Afficher les noms d\'utilisateurs';
$string['skiptofirstunread'] = 'Passer au premier message non lu';
$string['sortby'] = 'Trier par {$a}';
$string['sorted'] = 'trié par {$a}';
$string['split'] = 'Séparer<span class=\'accesshide\'> le message {$a}</span>';
$string['splitinfo'] = 'Séparer ce message le supprimera, ainsi que toutes les réponses, de cette discussion. Une nouvelle discussion sera alors créée (comme illustré ci-dessous)';
$string['splitpost'] = 'Séparer le message : {$a}';
$string['splitpostbutton'] = 'Séparer le message';
$string['startdiscussion_groupaccess'] = 'Vous n\'avez pas la possibilité de démarrer de nouvelle discussion dans ce groupe.';
$string['startdiscussion_nopermission'] = 'Vous n\'avez pas la possibilité de démarrer de nouvelle discussion ici.';
$string['startdiscussion_postquota'] = 'Vous ne pouvez pas commencer de nouvelle discussion car vous avez atteint la limite denvoi.';
$string['startedby'] = 'Lancé par';
$string['sticky'] = 'Option de mise en avant de la discussion :';
$string['sticky_help'] = 'Cette option permet de placer la discussion en tête de la liste, même si d\'autres discussions sont créées après.

Les discussions mises en tête de liste sont affichées avec une icône de flèche pointant vers le haut. Il peut y avoir plusieurs discussions mises en tête de liste.';
$string['sticky_no'] = 'La discussion est triée normalement';
$string['sticky_yes'] = 'La discussion est placée en tête de liste';
$string['studyadvice_noquestions'] = 'Personne n\'a commencé de discussion actuellement dans ce forum d\'apprentissage.';
$string['studyadvice_noyourquestions'] = 'Vous n\'avez pas encore commencé de discussion dans ce forum d\'apprentissage.';
$string['subject'] = 'Sujet';
$string['subscribe'] = 'S\'abonner à ce forum';
$string['subscribe_already'] = 'Vous êtes déjà abonné.';
$string['subscribe_already_group'] = 'Vous êtes déjà abonné à ce groupe.';
$string['subscribe_confirm'] = 'Vous avez été abonné.';
$string['subscribe_confirm_group'] = 'Vous avez été abonné au groupe.';
$string['subscribed'] = 'Abonné';
$string['subscribeddiscussionall'] = 'Toutes les discussions';
$string['subscribediscussion'] = 'S\'abonner à ce fil de discussions';
$string['subscribedthisgroup'] = 'Ce groupe';
$string['subscribegroup'] = 'S\'abonner à ce groupe';
$string['subscribelong'] = 'S\'abonner à tout le forum';
$string['subscribers'] = 'Abonnés';
$string['subscribers_nopermission'] = 'Vous n\'avez pas la possibilité de voir la liste des abonnés.';
$string['subscribeshort'] = 'S\'abonner';
$string['subscribestart'] = 'M\'envoyer des copies par courriel des message de ce forum';
$string['subscribestate_discussionsubscribed'] = 'Vous recevez tous les messages de cette discussion par courriel à {$a}.';
$string['subscribestate_discussionunsubscribed'] = 'Vous ne recevez pas les messages de cette discussion par courriel. Si vous le souhaitez, cliquez sur &lsquo;S\'abonner&rsquo;.';
$string['subscribestate_forced'] = '(Le désabonnement n\'est pas possible.)';
$string['subscribestate_groups_partiallysubscribed'] = 'Vous recevez des messages provenant de certains groupes de ce forum par courriel à {$a}.';
$string['subscribestate_no_access'] = 'Vous n\'avez pas la possibilité de vous abonner par courriel à ce forum.';
$string['subscribestate_not_permitted'] = 'Ce forum ne permet pas l\'abonnement par courriel.';
$string['subscribestate_partiallysubscribed'] = 'Vous recevez des messages provenant de certaines discussions de ce forum par courriel à {$a}.';
$string['subscribestate_partiallysubscribed_thisgroup'] = 'Vous recevez des messages provenant de certaines discussions de ce groupe  par courriel à {$a}.';
$string['subscribestate_subscribed'] = 'Vous recevez des messages de ce forum par courriel à {$a}.';
$string['subscribestate_subscribed_notinallgroup'] = 'Cliquer sur &lsquo;Désabonnement&rsquo; pour se désabonner de ce forum.';
$string['subscribestate_subscribed_thisgroup'] = 'Vous recevez des messages de ce groupe par courriel à {$a}.';
$string['subscribestate_unsubscribed'] = 'Vous ne recevez pas les messages de ce forum par courriel. Si vous le souhaitez, cliquez sur &lsquo;S\'abonner&rsquo;.';
$string['subscribestate_unsubscribed_thisgroup'] = 'Vous ne recevez pas les messages de ce groupe par courriel. Si vous le souhaitez, cliquez sur &lsquo;S\'abonner&rsquo;';
$string['subscribestop'] = 'Je ne veux pas de copies par courriel des message de ce forum';
$string['subscription'] = 'Mode d\'abonnement';
$string['subscription_forced'] = 'Abonnement imposé';
$string['subscription_help'] = 'Vous pouvez abonner tout le monde de façon imposée, ou de les abonner par défaut, la différence est que dans ce dernier cas, les utilisateurs peuvent choisir de se désabonner.<br>Ces options incluent tous les participants aux cours (étudiants et enseignants). Les utilisateurs qui n\'appartiennent pas au cours (comme l\'administrateur) peuvent quand même s\'abonner.';
$string['subscription_initially_subscribed'] = 'Abonnement automatique';
$string['subscription_not_permitted'] = 'Abonnement désactivé';
$string['subscription_permitted'] = 'Abonnement facultatif';
$string['subscriptions'] = 'Abonnements';
$string['switchto_simple_link'] = 'Basculer en vue simple.';
$string['switchto_simple_text'] = 'La vue standard ne fonctionne pas toujours avec les outils d\'assistance technologique. Nous proposons aussi une vue simple qui permet l\'utilisation de toutes les fonctionnalités.';
$string['switchto_standard_link'] = 'Basculer en vue standard.';
$string['switchto_standard_text'] = 'Vous utilisez la vue simple pour ce forum, qui devrait mieux fonctionner avec la technologie d\'assistance.';
$string['teacher_grades_students'] = 'Les enseignants évaluent les étudiants';
$string['text_asc'] = 'A-Z';
$string['text_desc'] = 'Z-A';
$string['timeend'] = 'Afficher jusqu\'à (inclus)';
$string['timestart'] = 'Afficher à partir de';
$string['to'] = 'jusqu\'à : {$a}';
$string['trackreadposts'] = 'Activer le suivi des messages';
$string['undelete'] = 'Restaurer';
$string['undeletepost'] = 'Message restauré : {$a}';
$string['undeletepostbutton'] = 'Restaurer le message';
$string['unread'] = 'Non lu';
$string['unsubscribe'] = 'Se désabonner de ce forum';
$string['unsubscribeall'] = 'Se désabonner de tous les forums';
$string['unsubscribe_already'] = 'Vous êtes déjà désabonné.';
$string['unsubscribe_already_group'] = 'Vous êtes déjà désabonné de ce groupe.';
$string['unsubscribe_confirm'] = 'Vous avez été désabonné.';
$string['unsubscribe_confirm_group'] = 'Vous avez été désabonné du groupe.';
$string['unsubscribediscussion'] = 'Se désabonner de ce fil de discussions';
$string['unsubscribegroup'] = 'Se désabonner de ce groupe';
$string['unsubscribegroup_partial'] = 'Se désabonner des discussions de ce groupe';
$string['unsubscribelong'] = 'Se désabonner du forum';
$string['unsubscribe_nopermission'] = 'Vous n\'avez pas l\'autorisation de désabonner les autres utilisateurs.';
$string['unsubscribeselected'] = 'Désinscrire les utilisateurs sélectionnés';
$string['unsubscribeshort'] = 'Se désabonner';
$string['usebcc'] = 'Envoyer un courriel en copie invisible (\'Cci\')';
$string['useshared'] = 'Utiliser un forum partagé existant';
$string['useshared_help'] = 'Si vous voulez partager un forum existant, cochez cette case et indiquez le numéro d\'identification du forum d\'origine (qui doit autoriser le partage).<br>Lorsque cette option est activée, la plupart des autres options sur ce formulaire seront ignorées car vous n\'êtes pas vraiment dans la création d\'un nouveau forum, mais vous activez un lien vers un forum existant. La seule exception est la disponibilité et les options d\'achèvement (manuelle seulement).';
$string['viewsubscribers'] = 'Voir les abonnés';
$string['withremoveddiscussions'] = 'Déplacer les discussions vers';
$string['withremoveddiscussions_help'] = 'Vous avez 2 options pour le traitement des discussions supprimées :
<ul><li>Les supprimer définitivement (contrairement à la suppression standard, cette action ne permet pas de restauration).
Cette option permet d\'économiser de l\'espace dans la base de données.</li>
<li>Les déplacer vers un autre forum (par exemple un forum d\'archives.
Vous pouvez sélectinoner n\'importe quel forum du même espace de cours.</li></ul>';
$string['words'] = 'Rechercher par mots';
$string['words_help'] = 'Tapez le terme recherché ici.

Utilisez les guillemets pour rechercher des expressions exactes.

Pour exclure un mot, insérez un trait d\'union immédiatement avant celui-ci.

Par exemple: la recherche <tt> picasso -sculpture "premières œuvres" </ tt> renverra des résultats pour le terme "Picasso" ou l\'expression "premières œuvres" mais exclura les éléments contenant le terme "sculpture".

Si vous laissez cette zone vide, tous les messages qui correspondent à l\'auteur et/ou à des critères de date seront retournés, indépendamment de leur contenu.';
$string['yourrating'] = 'Votre évaluation :';
