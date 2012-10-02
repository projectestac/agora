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
 * Strings for component 'chat', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['ajax'] = 'Version Ajax';
$string['autoscroll'] = 'Défilement automatique';
$string['beep'] = 'bip';
$string['cantlogin'] = 'Connexion au salon de chat impossible !';
$string['chat:addinstance'] = 'Ajouter un chat';
$string['chat:chat'] = 'Accéder à un salon de chat';
$string['chat:deletelog'] = 'Supprimer les historiques des chats';
$string['chat:exportparticipatedsession'] = 'Exporter les sessions de chat auxquelles vous avez participé';
$string['chat:exportsession'] = 'Exporter toutes les sessions de chat';
$string['chatintro'] = 'Texte d\'introduction';
$string['chatname'] = 'Nom de ce salon';
$string['chat:readlog'] = 'Lire les historiques des chats';
$string['chatreport'] = 'Sessions de chat';
$string['chat:talk'] = 'Participer à un chat';
$string['chattime'] = 'Prochaine session';
$string['configmethod'] = 'La méthode de chat AJAX fournit une interface AJAX pour le chat, qui contacte régulièrement le serveur pour actualiser l\'affichage. La méthode normale de chat contacte également régulièrement le serveur pour actualiser l\'affichage. Aucune configuration n\'est nécessaire et cela fonctionne partout. En revanche, cela induit une charge importante du serveur, notamment s\'il y a de nombreux participants au chat. L\'utilisation d\'un « démon » sur le serveur nécessite l\'accès à l\'environnement de commande Unix, mais offre en contrepartie un chat rapide et extensible.';
$string['confignormalupdatemode'] = 'L\'actualisation de l\'affichage des salons de chat est normalement fait de manière plus efficace grâce à l\'utilisation de la fonction <em>Keep-Alive</em> du protocole HTTP 1.1, mais cette option charge passablement le serveur. Une méthode plus sophistiquée utilise la stratégie des <em>Flux</em> pour actualiser l\'affichage. L\'utilisation des <em>Flux</em> fonctionne mieux lorsqu\'il y a de nombreuses connexions (tout comme l\'utilisation du démon <em>chatd</em>), mais n\'est peut-être pas supportée par votre serveur.';
$string['configoldping'] = 'La durée maximale (en secondes) avant de considérer qu\'un utilisateur inactif est déconnecté. Il s\'agit d\'une limite supérieure, car les déconnexions sont détectées très rapidement. Une courte durée chargera plus votre serveur. Si vous utilisez la méthode standard de chat, ne fixez <strong>jamais</strong> cette valeur à moins de 2 * chat_refresh_room.';
$string['configrefreshroom'] = 'Fréquence d\'actualisation du salon (en secondes) ? Une valeur basse donnera une impression de rapidité, mais surchargera votre serveur web lorsque beaucoup de monde utilisera le chat.';
$string['configrefreshuserlist'] = 'Fréquence d\'actualisation de la liste des utilisateurs (en secondes)';
$string['configserverhost'] = 'Le nom de l\'ordinateur (hostname) sur lequel tourne le démon';
$string['configserverip'] = 'L\'adresse IP numérique de l\'ordinateur sur lequel tourne le démon';
$string['configservermax'] = 'Nombre maximal de clients autorisés';
$string['configserverport'] = 'Port à utiliser par le démon sur le serveur';
$string['currentchats'] = 'Sessions actives';
$string['currentusers'] = 'Utilisateurs en ligne';
$string['deletesession'] = 'Supprimer cette session';
$string['deletesessionsure'] = 'Voulez-vous vraiment supprimer cette session ?';
$string['donotusechattime'] = 'Ne pas publier les horaires de chat';
$string['enterchat'] = 'Cliquer ici pour participer au chat';
$string['entermessage'] = 'Saisissez votre message';
$string['errornousers'] = 'Il n\'y a pas d\'utilisateur';
$string['explaingeneralconfig'] = 'Ces réglages sont <strong>toujours</strong> utilisés';
$string['explainmethoddaemon'] = 'Ces réglages sont effectifs <strong>uniquement</strong> si vous avez choisi la méthode de chat « Utilisation d\'un démon »';
$string['explainmethodnormal'] = 'Ces réglages sont effectifs <strong>uniquement</strong> si vous avez choisi la méthode de chat « Méthode normale »';
$string['generalconfig'] = 'Configuration générale';
$string['idle'] = 'En attente';
$string['inputarea'] = 'Zone de saisie';
$string['invalidid'] = 'Salon de chat introuvable !';
$string['list_all_sessions'] = 'Lister toutes les sessions.';
$string['list_complete_sessions'] = 'Lister les sessions complètes.';
$string['listing_all_sessions'] = 'Liste de toutes les sessions.';
$string['messagebeepseveryone'] = '{$a} bipe tout le monde !';
$string['messagebeepsyou'] = '{$a} vient de vous biper !';
$string['messageenter'] = '{$a} vient d\'entrer';
$string['messageexit'] = '{$a} a quitté ce chat';
$string['messages'] = 'Messages';
$string['messageyoubeep'] = 'Vous avez bippé {$a}';
$string['method'] = 'Méthode du chat';
$string['methodajax'] = 'Méthode AJAX';
$string['methoddaemon'] = 'Utilisation d\'un démon';
$string['methodnormal'] = 'Méthode normale';
$string['modulename'] = 'Chat';
$string['modulename_help'] = 'Le module d\'activité chat permet aux participants d\'avoir une discussion synchrone en temps réel, en mode texte.

Un chat peut être une activité unique ou peut être répété à la même heure chaque jour ou chaque semaine. Les sessions de chat sont enregistrées et peuvent être publiées pour tous ou restreintes aux utilisateurs ayant les autorisations adéquates.

Les chats sont particulièrement utiles lorsque le groupe ne peut pas se rencontrer face à face, pour :

* des rencontres virtuelles régulières entre participants suivant un cours à distance, leur permettant de partager leurs expériences
* permettre à un participant temporairement empêché de participer en personne de discuter avec l\'enseignant
* permettre à des enfants de chatter dans un environnement contrôlé comme introduction au monde des réseaux sociaux
* une session de questions-réponses avec un intervenant invité d\'un pays éloigné';
$string['modulenameplural'] = 'Chats';
$string['neverdeletemessages'] = 'Ne pas effacer les messages';
$string['nextsession'] = 'Prochaine session prévue';
$string['nochat'] = 'Aucun chat trouvé';
$string['no_complete_sessions_found'] = 'Aucune session complète trouvée.';
$string['noguests'] = 'Ce salon n\'est pas ouvert aux visiteurs anonymes';
$string['nomessages'] = 'Pas encore de messages';
$string['nopermissiontoseethechatlog'] = 'Vous n\'avez pas l\'autorisation de consulter les historiques de chat.';
$string['normalkeepalive'] = 'Keep-Alive';
$string['normalstream'] = 'Flux';
$string['noscheduledsession'] = 'Aucune session agendée';
$string['notallowenter'] = 'Vous n\'avez pas l\'autorisation d\'accéder à ce salon de chat.';
$string['notlogged'] = 'Vous n\'êtes pas authentifié !';
$string['oldping'] = 'Délai de déconnexion';
$string['page-mod-chat-x'] = 'Toute page du module chat';
$string['pastchats'] = 'Sessions de chat antérieures';
$string['pluginadministration'] = 'Administration du chat';
$string['pluginname'] = 'Chat';
$string['refreshroom'] = 'Actualisation salon';
$string['refreshuserlist'] = 'Actualisation liste utilisateurs';
$string['removemessages'] = 'Supprimer tous les messages';
$string['repeatdaily'] = 'Chaque jour à la même heure';
$string['repeatnone'] = 'Pas de répétition - ne publier que la date spécifiée';
$string['repeattimes'] = 'Répéter les sessions';
$string['repeatweekly'] = 'Chaque semaine à la même heure';
$string['saidto'] = 'a dit à';
$string['savemessages'] = 'Enregistrer les sessions précédentes';
$string['seesession'] = 'Consulter cette session';
$string['send'] = 'Envoyer';
$string['sending'] = 'Envoi';
$string['serverhost'] = 'Nom du serveur';
$string['serverip'] = 'Adresse IP serveur';
$string['servermax'] = 'Nombre max d\'utilisateurs';
$string['serverport'] = 'Port du serveur';
$string['sessions'] = 'Sessions de chat';
$string['sessionstart'] = 'La session de chat commencera dans {$a}';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Tout le monde peut consulter les sessions précédentes';
$string['studentseereports_help'] = 'Si ce réglage est désactivé, seuls les utilisateurs avec la capacité mod/chat:readlog pourront consulter les historiques de chat';
$string['talk'] = 'Parler';
$string['updatemethod'] = 'Méthode d\'actualisation';
$string['updaterate'] = 'Modifier la vitesse :';
$string['userlist'] = 'Liste d\'utilisateurs';
$string['usingchat'] = 'Utilisation du chat';
$string['usingchat_help'] = 'Le module de chat contient quelques fonctions rendant le chat un peu plus sympathique.

*Binettes : toutes les binettes (emoticons) que vous pouvez utiliser dans Moodle peuvent aussi être tapées ici, par exemple, :-)
* Liens : les adresses Internet (URLs) sont automatiquement transformées en liens actifs.
* Personnalisation : vous pouvez commencer une ligne avec « /me » ou « : » pour personnaliser vos interventions. Si votre nom est Héloïse, et que vous tapez « :rigole ! » ou « /me rigole ! », tout le monde lira « Héloïse rigole ! ».
* Bips : vous pouvez envoyer un son à quelqu\'un en cliquant sur le lien « bip » à côté de son nom. Pour envoyer ce son à tous les participants au chat, vous pouvez simplement taper « beep all ».
* HTML : si vous connaissez le langage HTML, vous pouvez l\'utiliser dans vos interventions pour ajouter des images, des sons ou créer des textes de couleurs et de tailles diverses.';
$string['viewreport'] = 'Consulter les sessions précédentes';
