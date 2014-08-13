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
 * Strings for component 'badges', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Actions';
$string['activate'] = 'Activer l\'accès';
$string['activatesuccess'] = 'L\'accès aux badges a été activé.';
$string['addbadgecriteria'] = 'Ajouter un critère de badge';
$string['addcourse'] = 'Ajouter des cours';
$string['addcourse_help'] = 'Sélectionner tous les cours à ajouter à ce critère de badge. Les sélections multiples sont possibles.';
$string['addcriteria'] = 'Ajouter des critères';
$string['addcriteriatext'] = 'Pour ajouter des critères, veuillez sélectionner une des options du menu déroulant.';
$string['addtobackpack'] = 'Ajouter au sac à badges';
$string['adminonly'] = 'L\'accès à cette page est restreint aux administrateurs du site.';
$string['after'] = 'après la date de la remise.';
$string['aggregationmethod'] = 'Méthode d\'agrégation';
$string['all'] = 'Tout';
$string['allmethod'] = 'Toutes les conditions sélectionnées sont satisfaites';
$string['allmethodactivity'] = 'Toutes les activités sélectionnées sont achevées';
$string['allmethodcourseset'] = 'Tous les cours sélectionnés sont achevés';
$string['allmethodmanual'] = 'Tous les rôles sélectionnés décernent le badge';
$string['allmethodprofile'] = 'Tous les champs de profil sélectionnés ont été renseignés';
$string['allowcoursebadges'] = 'Activer les badges de cours';
$string['allowcoursebadges_desc'] = 'Autoriser la création et la remise de badges dans le contexte des cours.';
$string['allowexternalbackpack'] = 'Activer la connexion aux sacs à badges externes';
$string['allowexternalbackpack_desc'] = 'Autorise les utilisateurs à mettre en place des connexions vers leur fournisseur de sac à badges externe et d\'afficher ces badges.

Attention : il est recommandé de ne pas activer cette option si le site ne peut pas être atteint via internet (par exemple en raison d\'un pare-feu).';
$string['any'] = 'Un';
$string['anymethod'] = 'Une des conditions sélectionnées est satisfaite';
$string['anymethodactivity'] = 'Une des activités sélectionnées est achevée';
$string['anymethodcourseset'] = 'Un des cours sélectionnés est achevé';
$string['anymethodmanual'] = 'Un des rôles sélectionnés décerne le badge';
$string['anymethodprofile'] = 'Un des champs de profil sélectionnés a été renseigné';
$string['attachment'] = 'Joindre le badge à un courriel';
$string['attachment_help'] = 'Si ce réglage est activé, le badge décerné sera joint à un message par courriel pour téléchargement (les annexes de courriel doivent être activées dans Administration du site > Plugins > Notification des messages > Courriel.';
$string['award'] = 'Décerner le badge';
$string['awardedtoyou'] = 'Décerné à moi';
$string['awardoncron'] = 'L\'accès aux badges a été activé. Trop d\'utilisateurs peuvent obtenir ce badge instantanément. Pour préserver la performance du site, cette action prendra un certain temps.';
$string['awards'] = 'Détenteurs';
$string['backpackavailability'] = 'Vérification externe des badges';
$string['backpackavailability_help'] = 'Afin que les utilisateurs qui reçoivent des badges puissent démontrer qu\'ils ont obtenus leurs badges sur ce site, un service de sac à badges externe doit pouvoir accéder à votre site et vérifier les badges y étant décernés. Votre site semble ne pas être actuellement accessible, ce qui a pour conséquence que les badges que vous avez décernés ou que vous décernerez ne peuvent pas être vérifiés.

**Pourquoi ce message est-il affiché ?**

Il se peut que votre pare-feu empêche l\'accès à des utilisateurs en dehors de votre réseau, que votre site soit protégé par un mot de passe ou que votre site tourne sur un ordinateurs qui n\'est pas accessible depuis l\'internet (par exemple sur une machine de développement).

**Est-ce que c\'est un problème ?**

Vous devez régler ce problème si votre site et en production et que vous planifiez d\'y décerner des badges. Sans cela, les utilisateurs qui reçoivent des badges ne pourront pas prouver qu\'ils ont obtenu leurs badges sur ce site. Si votre site n\'est pas encore en production, vous pouvez créer et décerner des badges de test. L\'important est que le site soit accessible quand vous partez en production.

**Que faire si je ne peux pas rendre le site publiquement accessible ?**

La seule URL requise pour la vérification est <votre-URL-de-site>/badges/assertion.php. Si vous pouvez donc modifier les réglages de votre pare-feu pour permettre l\'accès externe à ce fichier, la vérification des badges fonctionnera.';
$string['backpackbadges'] = 'Vous avez {$a->totalbadges} badge(s) affichés de {$a->totalcollections} collection(s). <a href="mybackpack.php">Modifier les réglages du sac à badges</a>.';
$string['backpackconnection'] = 'Connexion de sac à badges';
$string['backpackconnection_help'] = 'Cette page vous permet de mettre en place une connexion vers un fournisseur de sac à badges externe. Une telle connexion vous permet d\'afficher des badges externes sur ce site et de copier les badges obtenus ici dans votre sac à badges.

Actuellement, seul le sac à badges <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a> est supporté. Vous devez vous abonner à un tel service avant de mettre en place une connexion sur cette page.';
$string['backpackdetails'] = 'Réglages du sac à badges';
$string['backpackemail'] = 'Adresse de courriel';
$string['backpackemail_help'] = 'Adresse de courriel associée à votre sac à badges. Lorsque vous êtes connecté, tous les badges reçus sur ce site seront associés à cette adresse de courriel.';
$string['backpackimport'] = 'Réglages d\'importation de badges';
$string['backpackimport_help'] = 'Une fois établie la connexion à votre sac à badges, les badges de votre sac à badges peuvent être affichés sur votre page « Mes badges » et sur votre page de profil.

Vous pouvez sélectionner ici les collections de badges de votre sac à badges.';
$string['badgedetails'] = 'Description du badge';
$string['badgeimage'] = 'Image';
$string['badgeimage_help'] = 'Cette image sera utilisée lors de la remise de ce badge.

Pour ajouter une image, sélectionnez un fichier (format JPG ou PNG), puis cliquez « Enregistrer les modifications.» L\'image sera redimensionnée en carré de dimensions adéquates.';
$string['badgeprivacysetting'] = 'Réglages de confidentialité des badges';
$string['badgeprivacysetting_help'] = 'Les badges que vous avez reçus peuvent être affichés sur votre page de profil. Ce réglage détermine si les nouveaux badges obtenus sont automatiquement visibles sur cette page.

Vous pouvez régler la confidentialité de chaque badge sur votre page « Mes badges ».';
$string['badgeprivacysetting_str'] = 'Afficher automatiquement mes nouveaux badges sur ma page de profil.';
$string['badgesalt'] = 'Sel de hachage pour l\'adresse de courriel du détenteur';
$string['badgesalt_desc'] = 'L\'utilisation d\'un sel de hachage permet aux services de sacs à badges de confirmer le détenteur du badge sans exposer son adresse de courriel. Ce champ ne doit comporter que des chiffres et des lettres.

Il est important de ne pas modifier ce réglage une fois l\'émission de badges initiée.';
$string['badgesdisabled'] = 'Les badges ne sont pas activés sur ce site.';
$string['badgesearned'] = 'Nombre de badges obtenus : {$a}';
$string['badgesettings'] = 'Réglages des badges';
$string['badgestatus_0'] = 'Non disponible pour les utilisateurs';
$string['badgestatus_1'] = 'Disponible pour les utilisateurs';
$string['badgestatus_2'] = 'Non disponible pour les utilisateurs';
$string['badgestatus_3'] = 'Disponible pour les utilisateurs';
$string['badgestatus_4'] = 'Archivé';
$string['badgestoearn'] = 'Nombre de badges disponibles : {$a}';
$string['badgesview'] = 'Badges de cours';
$string['badgeurl'] = 'Lien du badge décerné';
$string['bawards'] = 'Détenteurs ({$a})';
$string['bcriteria'] = 'Critères';
$string['bdetails'] = 'Modifier la description';
$string['bmessage'] = 'Message';
$string['boverview'] = 'Vue d\'ensemble';
$string['bydate'] = 'obtenue avant le';
$string['clearsettings'] = 'Effacer les réglages';
$string['completioninfo'] = 'Ce badge a été décerné pour l\'achèvement :';
$string['completionnotenabled'] = 'L\'achèvement de cours n\'est pas activé dans ce cours, et ne peut donc pas être inclus comme critère de badge. L\'achèvement de cours peut être activé dans les réglages du cours.';
$string['configenablebadges'] = 'Lorsque ce réglage est activé, vous pouvez créer des badges et les décerner à des utilisateurs du site.';
$string['configuremessage'] = 'Message de badge';
$string['connect'] = 'Connecter';
$string['connected'] = 'Connecté';
$string['connecting'] = 'Connexion...';
$string['contact'] = 'Contact';
$string['contact_help'] = 'Une adresse de courriel associée à la personne qui décerne le badge.';
$string['copyof'] = 'Copie de {$a}';
$string['coursebadges'] = 'Badges';
$string['coursebadgesdisabled'] = 'Les badges de cours ne sont pas activés sur ce site.';
$string['coursecompletion'] = 'Les participants doivent achever ce cours.';
$string['create'] = 'Nouveau badge';
$string['createbutton'] = 'Créer un badge';
$string['creatorbody'] = '<p>{$a->user} a satisfait tous les critères requis pour obtenir le badge, qui lui a été décerné. Le badge décerné peut être consulté ici {$a->link}.</p>';
$string['creatorsubject'] = '« {$a} » a été décerné !';
$string['criteria_0'] = 'Ce badge est décerné lorsque...';
$string['criteria_1'] = 'Achèvement d\'activité';
$string['criteria_1_help'] = 'Permet de décerner un badge sur la base de l\'achèvement d\'un ensemble d\'activités d\'un cours.';
$string['criteria_2'] = 'Attribution manuelle par rôle';
$string['criteria_2_help'] = 'Permet de décerner un badge manuellement, par des utilisateurs ayant un rôle déterminé dans le site ou dans un cours.';
$string['criteria_3'] = 'Participation sociale';
$string['criteria_3_help'] = 'Social';
$string['criteria_4'] = 'Achèvement de cours';
$string['criteria_4_help'] = 'Permet de décerner un badge à des utilisateurs qui ont achevé le cours. Ce critère peut avoir d\'autres paramètres, tels que l\'obtention d\'une note minimale ou une date pour l\'achèvement du cours.';
$string['criteria_5'] = 'Achèvement d\'un ensemble de cours';
$string['criteria_5_help'] = 'Permet de décerner un badge à des utilisateurs qui ont achevé un ensemble de cours. Chaque cours peut avoir d\'autres paramètres, tels que l\'obtention d\'une note minimale ou une date pour l\'achèvement du cours.';
$string['criteria_6'] = 'Renseignement du profil';
$string['criteria_6_help'] = 'Permet de décerner un badge à des utilisateurs qui ont renseigné certains champs de leur profil. Il est possible de sélectionner parmi les champs par défaut ou personnalisés disponibles.';
$string['criteriacreated'] = 'Critère de badge créé';
$string['criteriadeleted'] = 'Critère de badge supprimé';
$string['criteria_descr'] = 'Les participants se voient décerner ce badge lorsqu\'ils satisfont les critères suivants :';
$string['criteria_descr_0'] = 'Les participants se voient décerner ce badge lorsqu\'ils satisfont <strong>{$a}</strong> des critères listés.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> des activités suivantes sont achevées :';
$string['criteria_descr_2'] = 'Ce badge doit être décerné par les utilisateurs ayant <strong>{$a}</strong> des rôles suivants :';
$string['criteria_descr_4'] = 'Les participants doivent achever le cours';
$string['criteria_descr_5'] = '<strong>{$a}</strong> des cours suivants doivent être terminés :';
$string['criteria_descr_6'] = '<strong>{$a}</strong> des champs du profil utilisateur doivent être renseignés :';
$string['criteria_descr_bydate'] = 'avant le <em>{$a}</em>';
$string['criteria_descr_grade'] = 'avec une note minimale de <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Achever <strong>{$a}</strong> parmi :';
$string['criteria_descr_short1'] = 'Achever <strong>{$a}</strong> parmi :';
$string['criteria_descr_short2'] = 'Décerné par <strong>{$a}</strong> parmi :';
$string['criteria_descr_short4'] = 'Achever le cours';
$string['criteria_descr_short5'] = 'Achever <strong>{$a}</strong> parmi :';
$string['criteria_descr_short6'] = 'Renseigner <strong>{$a}</strong> parmi :';
$string['criteria_descr_single_1'] = 'L\'activité suivante doit être terminée :';
$string['criteria_descr_single_2'] = 'Ce badge doit être décerné par un utilisateur avec le rôle suivant :';
$string['criteria_descr_single_4'] = 'Les participants doivent achever le cours';
$string['criteria_descr_single_5'] = 'Le cours suivant doit être terminé :';
$string['criteria_descr_single_6'] = 'Le champ du profil utilisateur suivant doit être renseigné :';
$string['criteria_descr_single_short1'] = 'Achevé :';
$string['criteria_descr_single_short2'] = 'Décerné par :';
$string['criteria_descr_single_short4'] = 'Terminer le cours';
$string['criteria_descr_single_short5'] = 'Achevé :';
$string['criteria_descr_single_short6'] = 'Renseigné :';
$string['criteriasummary'] = 'Résumé des critères';
$string['criteriaupdated'] = 'Critère de badge modifié';
$string['criterror'] = 'Problèmes des paramètres actuels';
$string['criterror_help'] = 'Ce champ montre tous les paramètres initialement ajoutés à ce critère de badge qui ne sont actuellement plus disponibles. Il est recommandé de désactiver ces paramètres, afin de vous assurer que les participants pourront obtenir ce badge.';
$string['currentimage'] = 'Image actuelle';
$string['currentstatus'] = 'Statut actuel :';
$string['dateawarded'] = 'Date de remise';
$string['dateearned'] = 'Date : {$a}';
$string['day'] = 'Jour(s)';
$string['deactivate'] = 'Désactiver l\'accès';
$string['deactivatesuccess'] = 'L\'accès aux badges a été désactivé.';
$string['defaultissuercontact'] = 'Informations de contact de l\'émetteur de badge par défaut';
$string['defaultissuercontact_desc'] = 'Une adresse de courriel associée à l\'émetteur du badge';
$string['defaultissuername'] = 'Nom de l\'émetteur de badge par défaut';
$string['defaultissuername_desc'] = 'Nom de la personne ou de l\'entité émettrice';
$string['delbadge'] = 'Supprimer le badge';
$string['delconfirm'] = 'Voulez-vous vraiment supprimer le badge « {$a}»?';
$string['delcritconfirm'] = 'Voulez-vous vraiment supprimer ce critère ?';
$string['delparamconfirm'] = 'Voulez-vous vraiment supprimer ce paramètre ?';
$string['description'] = 'Description';
$string['disconnect'] = 'Déconnecter';
$string['donotaward'] = 'Ce badge n\'est actuellement pas actif et ne peut donc pas être décerné à des utilisateurs. Si vous voulez le décerner, veuillez changer son statut à actif.';
$string['editsettings'] = 'Modifier les réglages';
$string['enablebadges'] = 'Activer les badges';
$string['error:backpackdatainvalid'] = 'Les données retournées par le sac à badges ne sont pas valides.';
$string['error:backpackemailnotfound'] = 'L\'adresse de courriel « {$a} » n\'est pas associée à un sac à badges. Vous devez <a href="http://backpack.openbadges.org">créer un sac à badges</a> pour ce compte ou vous connecter avec une autre adresse de courriel.';
$string['error:backpackloginfailed'] = 'Il n\'a pas été possible de vous connecter à un sac à badges externe pour la raison suivante : {$a}';
$string['error:backpacknotavailable'] = 'Votre site ne peut pas être atteint via l\'internet. Tous les badges décernés sur ce site ne pourront pas être vérifiés par des services de sacs à badges externes.';
$string['error:backpackproblem'] = 'Un problème est survenu lors de la connexion avec votre fournisseur de sac à badges. Veuillez ré-essayer plus tard.';
$string['error:badjson'] = 'La tentative de connexion a renvoyé des données non valides.';
$string['error:cannotact'] = 'Impossible d\'activer le badge.';
$string['error:cannotawardbadge'] = 'Impossible de décerner le badge à un utilisateur.';
$string['error:clone'] = 'Impossible de dupliquer le badge.';
$string['error:connectionunknownreason'] = 'La connexion a échoué sans qu\'aucune raison ne soit donnée.';
$string['error:duplicatename'] = 'Un badge de ce nom existe déjà dans le système.';
$string['error:externalbadgedoesntexist'] = 'Badge introuvable';
$string['error:guestuseraccess'] = 'Vous consultez ce site comme utilisateur anonyme. Pour consulter les badges, veuillez vous connecter avec votre compte utilisateur.';
$string['error:invalidbadgeurl'] = 'Format incorrect de l\'URL de l\'émetteur du badge';
$string['error:invalidcriteriatype'] = 'Type de critère non valide';
$string['error:invalidexpiredate'] = 'La date d\'échéance doit se situer dans le futur.';
$string['error:invalidexpireperiod'] = 'La période avant échéance ne peut pas être nulle ou négative.';
$string['error:noactivities'] = 'Il n\'y a pas d\'activité avec des critères d\'achèvement dans ce cours.';
$string['error:noassertion'] = 'Aucune assertion n\'a été renvoyée par Persona. Vous avez peut-être fermé la fenêtre de dialogue avant que la connexion ne soit établie.';
$string['error:nocourses'] = 'L\'achèvement de cours n\'est activé pour aucun cours de ce site. Aucun cours n\'est donc affiché ici. L\'achèvement de cours peut être activé dans les réglages du cours.';
$string['error:nogroups'] = '<p>Il n\'y a pas de collection de badges publique dans votre sac à badges.</p> <p>Seules les collections publiques sont affichées. Veuillez <a href="http://backpack.openbadges.org">visiter votre sac à badges</a> pour créer une collection publique.</p>';
$string['error:nopermissiontoview'] = 'Vous n\'avez pas l\'autorisation de voir les détenteurs du badge';
$string['error:nosuchbadge'] = 'Le badge d\'identifiant {$a} n\'existe pas.';
$string['error:nosuchcourse'] = 'Attention ! Ce cours n\'est plus disponible.';
$string['error:nosuchfield'] = 'Attention ! Ce champ de profil utilisateur n\'est plus disponible.';
$string['error:nosuchmod'] = 'Attention ! Cette activité n\'est plus disponible.';
$string['error:nosuchrole'] = 'Attention ! Ce rôle n\'est plus disponible.';
$string['error:nosuchuser'] = 'L\'utilisateur possédant cette adresse de courriel n\'a pas de compte chez le fournisseur actuel de sacs à badges.';
$string['error:notifycoursedate'] = 'Attention ! Les badges associés à des achèvements de cours ou d\'activité ne seront pas décernés avant la date de début du cours.';
$string['error:parameter'] = 'Attention ! Au moins un paramètre doit être sélectionné pour assurer un processus correct pour l\'émission du badge.';
$string['error:personaneedsjs'] = 'Javascript est actuellement requis pour la connexion à un sac à badges. Si vous le pouvez, veuillez activer Javascript et recharger la page.';
$string['error:requesterror'] = 'La requête de connexion a échoué (erreur {$a}).';
$string['error:requesttimeout'] = 'La requête de connexion est arrivée à échéance avant de pouvoir se terminer.';
$string['error:save'] = 'Impossible d\'enregistrer le badge';
$string['error:userdeleted'] = '{$a->user} (ce compte utilisateur n\'existe plus dans {$a->site})';
$string['evidence'] = 'Preuve';
$string['existingrecipients'] = 'Détenteurs de badges';
$string['expired'] = 'Échu';
$string['expiredate'] = 'Ce badge arrive à échéance le {$a}.';
$string['expireddate'] = 'Ce badge est arrivé à échéance le {$a}.';
$string['expireperiod'] = 'Ce badge arrive à échéance {$a} jour(s) après avoir été décerné.';
$string['expireperiodh'] = 'Ce badge arrive à échéance {$a} heures(s) après avoir été décerné.';
$string['expireperiodm'] = 'Ce badge arrive à échéance {$a} minutes(s) après avoir été décerné.';
$string['expireperiods'] = 'Ce badge arrive à échéance {$a} secondes(s) après avoir été décerné.';
$string['expirydate'] = 'Date d\'échéance';
$string['expirydate_help'] = 'Optionnellement, les badges peut arriver à échéance à une date spécifique, ou la date d\'échéance peut être calculée sur la base de la date à laquelle il a été décerné.';
$string['externalbadges'] = 'Mes badges d\'autres sites web';
$string['externalbadges_help'] = 'Cette zone présente les badges de votre sac à badges externe.';
$string['externalbadgesp'] = 'Badges d\'autres sites web :';
$string['externalconnectto'] = 'Pour afficher des badges externes, veuillez <a href="{$a}">vous connecter à un sac à badges</a>.';
$string['fixed'] = 'Date fixe';
$string['hidden'] = 'Caché';
$string['hiddenbadge'] = 'Le détenteur du badge n\'a malheureusement pas rendu disponible cette information.';
$string['issuancedetails'] = 'Échéance du badge';
$string['issuedbadge'] = 'Information de remise du badge';
$string['issuerdetails'] = 'Détail de l\'émetteur';
$string['issuername'] = 'Nom de l\'émetteur';
$string['issuername_help'] = 'Nom de l\'agent ou de l\'autorité qui décerne';
$string['issuerurl'] = 'URL de l\'émetteur';
$string['localbadges'] = 'Mes badges du site web {$a}';
$string['localbadgesh'] = 'Mes badges de ce site web';
$string['localbadgesh_help'] = 'Tous les badges obtenus sur ce site web en achevant des cours, des activités de cours ou remplissant d\'autres conditions.

Vous pouvez gérer ici vos badges, en les rendant publics ou privés (sur votre page de profil).

Vous pouvez télécharger tous vos badges ou chaque badge séparément et les enregistrer sur votre ordinateur. Les badges téléchargés peuvent être ajoutés à votre sac à badges sur un service externe.';
$string['localbadgesp'] = 'Badges de {$a} :';
$string['localconnectto'] = 'Pour partager ces badges sur un site web externe, vous devez vous <a href="{$a}">connecter à un sac à badges</a>.';
$string['makeprivate'] = 'Rendre privé';
$string['makepublic'] = 'Rendre public';
$string['managebadges'] = 'Gérer les badges';
$string['message'] = 'Corps du message';
$string['messagebody'] = '<p>On vous a décerné le badge « %badgename% »!</p>
<p>Plus d\'information sur ce badge est disponible ici : %badgelink%.</p>
<p>Vous pouvez gérer et télécharger le badge sur la page {$a}.</p>';
$string['messagesubject'] = 'Félicitations ! Vous venez de recevoir un badge !';
$string['method'] = 'Ce critère est satisfait quand...';
$string['mingrade'] = 'Note minimale requise';
$string['month'] = 'Mois';
$string['mybackpack'] = 'Mes réglages de badge';
$string['mybadges'] = 'Mes badges';
$string['never'] = 'Jamais';
$string['newbadge'] = 'Ajouter un badge';
$string['newimage'] = 'Nouvelle image';
$string['noawards'] = 'Ce badge n\'a pas encore été décerné';
$string['nobackpack'] = 'Il n\'y a pas de service de sac à badges connecté à ce compte.<br />';
$string['nobackpackbadges'] = 'Il n\'y a pas de badge dans les collections que vous avez indiquées. <a href="mybackpack.php">Ajouter d\'autres collections</a>.';
$string['nobackpackcollections'] = 'Aucune collection n\'est indiquée. <a href="mybackpack.php">Ajouter des collections</a>.';
$string['nobadges'] = 'Il n\'y a pas de badge disponible.';
$string['nocriteria'] = 'Aucun critère n\'a encore été défini pour ce badge.';
$string['noexpiry'] = 'Ce badge n\'a pas de date d\'échéance.';
$string['noparamstoadd'] = 'Il n\'y a pas de paramètre supplémentaire à ajouter à cette condition de badge.';
$string['notacceptedrole'] = 'Le rôle qui vous est actuellement attribué ne permet pas de décerner manuellement ce badge.<br/>Si vous voulez consulter la liste des utilisateurs ayant déjà reçu ce badge, vous pouvez visiter la page {$a}.';
$string['notconnected'] = 'Non connecté';
$string['nothingtoadd'] = 'Il n\'y a pas de critère valable à ajouter.';
$string['notification'] = 'Informer le créateur du badge';
$string['notification_help'] = 'Ce réglage gère les notifications envoyées au créateur d\'un badge pour l\'informer quand le badge a été décerné.

Les options suivantes sont disponibles :

* **Jamais** – Ne pas envoyer de notification.
* **Chaque fois** – Envoyer une notification chaque fois qu\'un badge est décerné.
* **Une fois par jour** – Envoyer les notifications une fois par jour.
* **Une fois par semaine** – Envoyer les notifications une fois par semaine.
* **Une fois par mois** – Envoyer les notifications une fois par mois.';
$string['notifydaily'] = 'Une fois par jour';
$string['notifyevery'] = 'Chaque fois';
$string['notifymonthly'] = 'Une fois par mois';
$string['notifyweekly'] = 'Une fois par semaine';
$string['numawards'] = 'Ce badge a été décerné à <a href="{$a->link}">{$a->count}</a> utilisateur(s).';
$string['numawardstat'] = 'Ce badge a été décerné à {$a} utilisateur(s).';
$string['overallcrit'] = 'des critères sélectionnés sont remplis.';
$string['personaconnection'] = 'Connexion avec votre adresse de courriel';
$string['personaconnection_help'] = 'Persona est un système permettant de vous identifier sur le web au moyen d\'une adresse de courriel dont vous êtes titulaire. Le sac à badges Open Badges utilise Persona comme système de connexion. C\'est pourquoi vous avez besoin d\'un compte Persona pour vous connecter à un sac à badges.

Pour plus de détails sur Persona, visitez <a href="https://login.persona.org/about">https://login.persona.org/about</a>.';
$string['potentialrecipients'] = 'Détenteurs potentiels du badge';
$string['recipientdetails'] = 'Infos détenteur';
$string['recipientidentificationproblem'] = 'Impossible de trouver parmi les utilisateurs un détenteur de ce badge.';
$string['recipients'] = 'Détenteurs du badge';
$string['recipientvalidationproblem'] = 'Impossible de vérifier si l\'utilisateur actuel est un détenteur de ce badge.';
$string['relative'] = 'Date relative';
$string['requiredcourse'] = 'Au moins un cours devrait être ajouté au critère de l\'ensemble de cours.';
$string['reviewbadge'] = 'Modifications de l\'accès au badge';
$string['reviewconfirm'] = '<p>Cette action rendra le badge visible pour les utilisateurs et leur permettra d\'essayer de l\'obtenir.</p>

<p>Il est possible que certains utilisateurs remplissent déjà les conditions requises pour l\'obtenir. Le badge leur sera décerné immédiatement après activation.</p>

<p>Dès que le badge aura été décerné, il sera <strong>verrouillé</strong>. Certains réglages, y compris les critères d\'obtention et la date d\'échéance ne pourront plus être modifiés.</p>

<p>Voulez-vous vraiment rendre accessible le badge « {$a} » ?</p>';
$string['save'] = 'Enregistrer';
$string['searchname'] = 'Rechercher par nom';
$string['selectaward'] = 'Veuillez choisir le rôle que vous voulez utiliser pour décerner ce badge :';
$string['selectgroup_end'] = 'Seules les collections publiques sont affichées. Visitez <a href="http://backpack.openbadges.org">votre sac à badges</a> pour créer d\'autres collections publiques.';
$string['selectgroup_start'] = 'Choisissez dans votre sac à badges des collections à afficher sur ce site :';
$string['selecting'] = 'Avec les badges sélectionnés...';
$string['setup'] = 'Mettre en place la connexion';
$string['signinwithyouremail'] = 'Connexion avec votre adresse de courriel';
$string['sitebadges'] = 'Badges de site';
$string['sitebadges_help'] = 'Les badges de site ne peuvent être décernés que pour des activités en lien avec le site. Ceci inclut l\'achèvement d\'un ensemble de cours ou de renseignement de parties du profil utilisateur. Les badges de site peuvent aussi être décernés manuellement à un utilisateur par un autre.

Les badges pour des activités de cours doivent être créés au niveau du cours. Les badges de cours peuvent être trouvés sous Administration du cours > Badges.';
$string['status'] = 'Statut du badge';
$string['status_help'] = 'Le statut d\'un badge détermine son comportement :

* **Disponible** – Le badge peut être décerné aux utilisateurs. Lorsqu\'un badge est disponible, ses critères ne peuvent pas être modifiés.

* **Non disponible** – Le badge ne peut pas être décerné aux utilisateurs. Si un tel badge n\'a pas encore été décerné, ses critères peuvent être modifiés.

* **Verrouillé** – Une fois qu\'un badge a été décerné à au moins un utilisateur, son statut devient automatiquement **verrouillé**. Les badges verrouillés peuvent être décernés aux utilisateurs, mais leurs critères ne peuvent plus être modifiés. Si vous devez modifier la description du badge ou les critères d\'un badge verrouillé, vous pouvez le dupliquer et effectuer les modifications désirées.

###Pourquoi les badges sont-ils verrouillés ?

Il est essentiel de s\'assurer que tous les utilisateurs remplissent les mêmes conditions pour recevoir un badge. Il n\'est pas possible actuellement de révoquer des badges. S\'il était permis de modifier les critères à tout moment, il arriverait probablement que des utilisateurs obtiennent des badges en remplissant des conditions totalement différentes.';
$string['statusmessage_0'] = 'Ce badge n\'est actuellement pas disponible pour les utilisateurs. Activez son accès si vous voulez que des utilisateurs puissent obtenir ce badge.';
$string['statusmessage_1'] = 'Ce badge est actuellement disponible pour les utilisateurs. Désactivez son accès pour effectuer des modifications.';
$string['statusmessage_2'] = 'Ce badge n\'est actuellement pas disponible pour les utilisateurs et ses critères sont verrouillés. Activez son accès si vous voulez que des utilisateurs puissent obtenir ce badge.';
$string['statusmessage_3'] = 'Ce badge est actuellement disponible pour les utilisateurs, et ses critères sont verrouillés.';
$string['statusmessage_4'] = 'Ce badge est actuellement archivé.';
$string['subject'] = 'Sujet du message';
$string['variablesubstitution'] = 'Substitution de variables dans les messages.';
$string['variablesubstitution_help'] = 'Dans les messages de badges, certaines variables peuvent être insérées dans l\'objet et/ou le corps du message, et sont remplacées par des valeurs adéquates lorsque le message est envoyé. Ces variables doivent être insérées dans le texte exactement comme elles sont présentées ci-dessous. Les variables suivantes peuvent être utilisées :

%badgename%
: Sera remplacé par le nom du badge

%username%
: Sera remplacé par le nom de l\'utilisateur qui a reçu le badge.

%badgelink%
: Sera remplacé par l\'URL publique vers la description du badge décerné.';
$string['viewbadge'] = 'Afficher le badge décerné';
$string['visible'] = 'Visible';
$string['warnexpired'] = '(Ce page est arrivé à échéance !)';
$string['year'] = 'Année(s)';
