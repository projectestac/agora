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
 * Strings for component 'message', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   message
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcontact'] = 'Ajouter ce contact';
$string['addsomecontacts'] = 'Pour envoyer un message personnel à quelqu\'un ou ajouter ses coordonnées à cette liste, utilisez <a href="{$a}">l\'onglet Recherche</a> ci-dessus.';
$string['addsomecontactsincoming'] = 'Ces messages personnels proviennent de personnes n\'apparaissant pas dans vos contacts. Pour ajouter un nom à vos contacts, cliquez sur l\'icône « Ajouter ce contact » correspondante.';
$string['ago'] = 'Il y a {$a}';
$string['ajax_gui'] = 'Salon de chat Ajax';
$string['allmine'] = 'Tous mes messages personnels reçus ou envoyés';
$string['allstudents'] = 'Tous les messages personnels des participants au cours';
$string['allusers'] = 'Tous les messages personnels de tous les utilisateurs';
$string['backupmessageshelp'] = 'Si ce paramètre est activé, les messages personnels seront inclus dans les sauvegardes automatiques du site';
$string['beepnewmessage'] = 'Bip pour les nouveaux messages personnels';
$string['blockcontact'] = 'Bloquer ce contact';
$string['blockedmessages'] = '{$a} message(s) personnel(s) de/pour des utilisateurs bloqués';
$string['blockedusers'] = 'Utilisateurs bloqués ({$a})';
$string['blocknoncontacts'] = 'Empêcher les utilisateurs inconnus de m\'envoyer des messages personnels';
$string['contactlistempty'] = 'Votre liste de contacts est vide';
$string['contacts'] = 'Contacts';
$string['context'] = 'Contexte';
$string['couldnotfindpreference'] = 'Impossible de charger le réglage {$a}. Le composant et le nom fournis à la fonction message_send() correspond-il à une rangée de message_provider ? Les fournisseurs de message doivent figurer dans la base de données, afin que les utilisateurs puissent configurer comment ils recevront notification d\'une réception de message.';
$string['defaultmessageoutputs'] = 'Output par défaut des messages';
$string['defaults'] = 'Défauts';
$string['deletemessagesdays'] = 'Nombre de jours avant la suppression automatique des anciens messages personnels';
$string['disableall'] = 'Désactiver temporairement les notifications';
$string['disableall_help'] = 'Désactiver temporairement toutes les notifications, sauf celles marquées « imposé » par l\'administrateur du site';
$string['disabled'] = 'La messagerie personnelle est désactivée sur ce site';
$string['disallowed'] = 'Non autorisé';
$string['discussion'] = 'Discussion';
$string['editmymessage'] = 'Messagerie personnelle';
$string['emailmessages'] = 'Envoyer par courriel les messages personnels quand je suis déconnecté';
$string['emailtagline'] = 'Ce courriel est la copie d\'un message personnel qui vous a été envoyé sur « {$a->sitename} ». Pour y répondre, visitez {$a->url}.';
$string['emptysearchstring'] = 'Vous devez saisir un critère de recherche';
$string['errorcallingprocessor'] = 'Erreur lors de l\'appel de l\'output défini';
$string['errortranslatingdefault'] = 'Erreur lors de la conversion d\'un réglage par défaut fourni par le plugin. Utilisation des réglages par défaut du système.';
$string['forced'] = 'Imposé';
$string['formorethan'] = 'Depuis plus de';
$string['gotomessages'] = 'Vers les messages';
$string['guestnoeditmessage'] = 'Les visiteurs anonymes ne peuvent pas modifier les options de messagerie personnelle';
$string['guestnoeditmessageother'] = 'Les visiteurs anonymes ne peuvent pas modifier les options de messagerie personnelle des autres utilisateurs';
$string['includeblockedusers'] = 'Inclure les utilisateurs bloqués';
$string['incomingcontacts'] = 'Messages personnels arrivant ({$a})';
$string['keywords'] = 'Mots clefs';
$string['keywordssearchresults'] = 'Message(s) personnel(s) trouvé(s) : {$a}';
$string['keywordssearchresultstoomany'] = 'Plus de {$a} messages trouvés. Veuillez affiner votre recherche.';
$string['loggedin'] = 'Connectés :';
$string['loggedindescription'] = 'Quand je suis authentifié';
$string['loggedoff'] = 'Non connectés :';
$string['loggedoffdescription'] = 'Quand je ne suis pas en ligne';
$string['mailsent'] = 'Votre message personnel a été envoyé par courriel.';
$string['managecontacts'] = 'Gérer mes contacts';
$string['managemessageoutputs'] = 'Gérer l\'output des messages';
$string['maxmessages'] = 'Nombre maximal de messages personnels à afficher dans l\'historique des discussions';
$string['message'] = 'Message personnel';
$string['messagehistory'] = 'Historique des messages personnels';
$string['messagehistoryfull'] = 'Tous les messages';
$string['messagenavigation'] = 'Navigation messagerie';
$string['messageoutputs'] = 'Output des messages';
$string['messages'] = 'Messages personnels';
$string['messaging'] = 'Messagerie personnelle';
$string['messagingblockednoncontact'] = '{$a} ne pourra pas répondre, car vous avez bloqué les messages des utilisateurs ne figurant pas dans vos contacts.';
$string['messagingdisabled'] = 'La messagerie personnelle est désactivée. Ce message sera envoyé par courriel à ses destinataires';
$string['mostrecent'] = 'Messages récents';
$string['mostrecentconversations'] = 'Conversations récentes';
$string['mostrecentnotifications'] = 'Notifications récentes';
$string['mycontacts'] = 'Mes contacts';
$string['newonlymsg'] = 'N\'afficher que les nouveaux';
$string['newsearch'] = 'Nouvelle recherche';
$string['noframesjs'] = 'Version plus accessible';
$string['nomessages'] = 'Aucun message personnel en attente';
$string['nomessagesfound'] = 'Aucun message personnel trouvé';
$string['noreply'] = 'Ne pas répondre à ce message';
$string['nosearchresults'] = 'Cette recherche n\'a fourni aucun résultat';
$string['offline'] = 'Déconnecté';
$string['offlinecontacts'] = 'Contacts déconnectés ({$a})';
$string['online'] = 'En ligne';
$string['onlinecontacts'] = 'Contacts en ligne ({$a})';
$string['onlyfromme'] = 'Uniquement mes messages personnels envoyés';
$string['onlymycourses'] = 'Uniquement dans mes cours';
$string['onlytome'] = 'Uniquement mes messages personnels reçus';
$string['outputdisabled'] = 'Output désactivé';
$string['outputdoesnotexist'] = 'L\'output du message n\'existe pas';
$string['outputenabled'] = 'Output activé';
$string['outputnotavailable'] = 'Non disponible';
$string['outputnotconfigured'] = 'Non configuré';
$string['page-message-x'] = 'Toute page de messagerie personnelle';
$string['pagerefreshes'] = 'Cette page s\'actualise automatiquement toutes les {$a} secondes';
$string['permitted'] = 'Autorisé';
$string['private_config'] = 'Fenêtre surgissante';
$string['processordeleteconfirm'] = 'Vous allez supprimer totalement l\'output « {$a} » des messages. Cela supprimera complètement de la base de données tout ce qui est associé à cet output. Voulez-vous vraiment continuer ?';
$string['processordeletefiles'] = 'Toutes les données associées à l\'output « {$a->processor} » ont été supprimées de la base de données. Pour terminer la suppression et empêcher que l\'output se réinstalle automatiquement, veuillez supprimer ce dossier de votre serveur : {$a->directory}';
$string['processortag'] = 'Destination';
$string['providers_config'] = 'Configurer les méthodes de notification des messages personnels';
$string['providerstag'] = 'Source';
$string['readmessages'] = '{$a} messages personnels lus';
$string['recent'] = 'Récent';
$string['removecontact'] = 'Supprimer ce contact';
$string['savemysettings'] = 'Enregistrer mes réglages';
$string['search'] = 'Recherche';
$string['searchcombined'] = 'Rechercher des personnes et des messages';
$string['searchforperson'] = 'Rechercher une personne';
$string['searchmessages'] = 'Rechercher des messages personnels';
$string['sendingvia'] = 'Envoi de « {$a->provider} » via « {$a->processor} »';
$string['sendingviawhen'] = 'Envoi de « {$a->provider} » via « {$a->processor} » quand {$a->state}';
$string['sendmessage'] = 'Envoyer message personnel';
$string['sendmessageto'] = 'Envoyer message personnel à {$a}';
$string['sendmessagetopopup'] = 'Envoyer message personnel à {$a} - nouvelle fenêtre';
$string['settings'] = 'Réglages';
$string['settingssaved'] = 'Vos réglages ont été enregistrés';
$string['showmessagewindow'] = 'Ouvrir la messagerie lorsque de nouveaux messages personnels arrivent (votre navigateur doit être configuré de façon à ne pas bloquer l\'ouverture des fenêtres surgissante de ce site)';
$string['strftimedaydatetime'] = '%A, %d %B %Y, %H:%M';
$string['thisconversation'] = 'Cette conversation';
$string['timenosee'] = 'Minutes depuis ma dernière présence en ligne';
$string['timesent'] = 'Heure d\'envoi';
$string['touserdoesntexist'] = 'Vous ne pouvez pas envoyer de message à un utilisateur ({$a}) qui n\'existe pas';
$string['unblockcontact'] = 'Débloquer ce contact';
$string['unreadmessages'] = 'Messages personnels non lus ({$a})';
$string['unreadnewmessage'] = 'Nouveau message de {$a}';
$string['unreadnewmessages'] = 'Nouveaux messages ({$a})';
$string['unreadnewnotification'] = 'Nouvelle notification';
$string['unreadnewnotifications'] = 'Nouvelles notifications ({$a})';
$string['userisblockingyou'] = 'Cet utilisateur vous a retiré le droit de lui envoyer des messages personnels';
$string['userisblockingyounoncontact'] = '{$a} n\'accepte de messages personnels que de personnes de sa liste de contacts.';
$string['userssearchresults'] = 'Utilisateur(s) trouvé(s) : {$a}';
