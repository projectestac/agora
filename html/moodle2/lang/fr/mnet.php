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
 * Strings for component 'mnet', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'À propos de votre serveur';
$string['accesslevel'] = 'Niveau d\'accès';
$string['addhost'] = 'Ajouter un serveur';
$string['addnewhost'] = 'Ajouter un nouveau serveur';
$string['addtoacl'] = 'Ajouter au contrôle d\'accès';
$string['allhosts'] = 'Tous les serveurs';
$string['allhosts_no_options'] = 'Aucune option n\'est disponible lorsque plusieurs hôtes sont affichés';
$string['allow'] = 'Autoriser';
$string['applicationtype'] = 'Type d\'application';
$string['authfail_nosessionexists'] = 'Échec d\'autorisation : la session mnet n\'existe pas.';
$string['authfail_sessiontimedout'] = 'Échec d\'autorisation : la session mnet est échue.';
$string['authfail_usermismatch'] = 'Échec d\'autorisation : l\'utilisateur ne correspond pas.';
$string['authmnetdisabled'] = 'La plugin d\'authentification MNet est <strong>désactivé</strong>.';
$string['badcert'] = 'Ceci n\'est pas un certificat valide.';
$string['certdetails'] = 'Détails du certificat';
$string['configmnet'] = 'MNet permet la communication de ce serveur avec d\'autres serveurs ou services.';
$string['couldnotgetcert'] = 'Aucun certificat n\'a été trouvé sur <br />{$a}. <br />Le serveur est peut-être éteint ou incorrectement configuré.';
$string['couldnotmatchcert'] = 'Ceci ne correspond pas au certificat publié actuellement par le serveur web.';
$string['courses'] = 'Cours';
$string['courseson'] = 'cours sur';
$string['currentkey'] = 'Clef publique actuelle';
$string['current_transport'] = 'Transport actuel';
$string['databaseerror'] = 'Impossible d\'écrire les détails dans la base de données.';
$string['deleteaserver'] = 'Suppression d\'un serveur';
$string['deletedhostinfo'] = 'Ce serveur a été supprimé. Si vous voulez le récupérer, changez son état de suppression à « Non ».';
$string['deletedhosts'] = 'Serveurs supprimés : {$a}';
$string['deletehost'] = 'Suppression serveur';
$string['deletekeycheck'] = 'Voulez-vous vraiment supprimer cette clef ?';
$string['deleteoutoftime'] = 'Le temps de 60 secondes imparti pour la suppression de cette clef est échu. Veuillez recommencer.';
$string['deleteuserrecord'] = 'SSO ACL : suppression de l\'enregistrement de l\'utilisateur « {$a->user} » de {$a->host}.';
$string['deletewrongkeyvalue'] = 'Une erreur est survenue. Aucune action n\'a été effectuée. Si vous n\'étiez pas en train de supprimer la clef SSL de votre serveur, il est possible que vous ayez été la cible d\'une attaque.';
$string['deny'] = 'Interdire';
$string['description'] = 'Description';
$string['duplicate_usernames'] = 'Il a été impossible de créer un index pour les colonnes « mnethostid » et « username » de votre table d\'utilisateurs.<br />Un tel problème peut survenir lorsque des <a href="{$a}" target="_blank">noms d\'utilisateur sont présents à double dans votre table d\'utilisateurs</a>.<br />La mise à jour devrait malgré tout se terminer correctement. Cliquer sur le lien ci-dessus pour obtenir des instructions vous permettant de corriger ce problème (dans une nouvelle fenêtre). Vous pourrez ainsi vous en occuper après la fin de la mise à jour.<br />';
$string['enabled_for_all'] = '(Ce service a été activé pour tous les serveurs).';
$string['enterausername'] = 'Veuillez saisir un ou plusieurs noms d\'utilisateurs, séparés par des virgules.';
$string['error7020'] = 'Cette erreur survient si le site distant a créé pour vous un enregistrement avec un paramètre wwwroot incorrect, par exemple, http://monsite.com au lieu de http://www.monsite.com. Veuillez contacter l\'administrateur du site distant avec votre wwwroot correct (tel qu\'indiqué dans le fichier config.php) et lui demander de modifier l\'enregistrement de votre serveur.';
$string['error7022'] = 'Le message que vous avez envoyé au site distant a été chiffré correctement, mais n\'a pas été signé. Ceci est très inhabituel. Si ceci arrive, veuillez annoncer un bogue (en fournissant autant d\'information que possible sur les versions des applications utilisées, etc.';
$string['error7023'] = 'Le site distant a tenté de déchiffrer votre message avec toutes les clefs qu\'il possède pour votre. Toutes les tentatives ont échoué. Il devrait être possible de corriger ce problème en synchronisant manuellement les clefs avec le site distant. Cette erreur est très improbable, sauf si vous n\'avez pas communiqué avec le site distant depuis plusieurs mois.';
$string['error7024'] = 'Vous avez envoyé au site distant un message non chiffré, mais le site distant n\'accepte pas de communications non chiffrées depuis votre site. Ceci est très inhabituel. Si ceci arrive, veuillez annoncer un bogue (en fournissant autant d\'information que possible sur les versions des applications utilisées, etc.';
$string['error7026'] = 'La clef avec laquelle votre message a été signé diffère de celle que le serveur distant connaît pour votre serveur. En outre, le serveur distant a essayé de récupérer votre clef actuelle et y a échoué. Veuillez synchroniser manuellement les clefs avec le site distant et essayer à nouveau.';
$string['error709'] = 'Le site distant n\'a pas pu obtenir de clef SSL depuis votre serveur.';
$string['expired'] = 'Cette clef est arrivée à échéance le';
$string['expires'] = 'Valable jusqu\'au';
$string['expireyourkey'] = 'Supprimer cette clef';
$string['expireyourkeyexplain'] = 'Moodle modifie automatiquement vos clefs tous les 28 jours (par défaut), mais vous avez la possibilité de périmer <em>manuellement</em> cette clef en tout temps. Une telle opération n\'est utile que si vous pensez que la clef a été compromise. Une clef de remplacement sera immédiatement générée automatiquement.<br /> La suppression de cette clef empêchera les autres applications de communiquer avec ce serveur jusqu\'à ce que vous contactiez manuellement leurs administrateurs et leur fournissiez votre nouvelle clef.';
$string['exportfields'] = 'Champs à exporter';
$string['failedaclwrite'] = 'Échec d\'écriture dans la liste de contrôle d\'accès MNet pour l\'utilisateur « {$a} ».';
$string['findlogin'] = 'Recherche d\'accès';
$string['forbidden-function'] = 'Cette fonction n\'a pas été activée par RPC.';
$string['forbidden-transport'] = 'La méthode de transport que vous tentez d\'utiliser n\'est pas autorisée.';
$string['forcesavechanges'] = 'Imposer la sauvegarde des modifications';
$string['helpnetworksettings'] = 'Configurer la communication MNet';
$string['hidelocal'] = 'Cacher les utilisateurs locaux';
$string['hideremote'] = 'Cacher les utilisateurs distants';
$string['host'] = 'Serveur';
$string['hostcoursenotfound'] = 'Le serveur ou le cours n\'a pas été trouvé';
$string['hostdeleted'] = 'Serveur supprimé';
$string['hostexists'] = 'Un enregistrement d\'un serveur de ce nom existe déjà (peut-être déjà supprimé). <a href="{$a}">Cliquez ici</a> pour modifier cet enregistrement.';
$string['hostlist'] = 'Liste des serveurs en réseau';
$string['hostname'] = 'Nom d\'hôte';
$string['hostnamehelp'] = 'Le nom de domaine complet (FQDN) du serveur distant, par exemple www.exemple.fr';
$string['hostnotconfiguredforsso'] = 'Ce serveur n\'est pas configuré pour l\'accès à distance.';
$string['hostsettings'] = 'Réglages serveur';
$string['http_self_signed_help'] = 'Autoriser les connexions utilisant un certificat DIY SSL auto-signé sur le serveur distant.';
$string['https_self_signed_help'] = 'Autoriser les connexions utilisant un certificat DIY SSL auto-signé sur le serveur distant par http.';
$string['https_verified_help'] = 'Autoriser les connexions utilisant un certificat SSL vérifié sur le serveur distant.';
$string['http_verified_help'] = 'Autoriser les connexions utilisant dans PHP un certificat SSL vérifié sur le serveur distant par http (pas https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Cette valeur est attribuée automatiquement et ne peut pas être modifiée';
$string['importfields'] = 'Champ à importer';
$string['inspect'] = 'Inspecter';
$string['installnosuchfunction'] = 'Erreur de code ! Tentative d\'installer une fonction mnet xmlrpc ({$a->method}) à partir d\'un fichier ({$a->file}) introuvable.';
$string['installnosuchmethod'] = 'Erreur de code ! Tentative d\'installer une fonction mnet xmlrpc ({$a->method}) sur une classe ({$a->class}) introuvable.';
$string['installreflectionclasserror'] = 'Erreur de code ! Échec du contrôle interne MNet pour la méthode « {$a->method} » dans la classe « {$a->class} ». Le message d\'erreur original est « {$a->error} ».';
$string['installreflectionfunctionerror'] = 'Erreur de code ! Échec du contrôle interne MNet pour la méthode « {$a->method} » dans le fichier « {$a->file} ». Le message d\'erreur original est « {$a->error} ».';
$string['invalidaccessparam'] = 'Paramètre d\'accès non valide.';
$string['invalidactionparam'] = 'Paramètre d\'action non valide.';
$string['invalidhost'] = 'Vous devez fournir un identifiant serveur valable';
$string['invalidpubkey'] = 'La clef n\'est pas une clef SSL valide. ({$a})';
$string['invalidurl'] = 'Paramètre URL invalide.';
$string['ipaddress'] = 'Adresse IP';
$string['is_in_range'] = 'L\'adresse IP <code>{$a}</code> représente un serveur fiable.';
$string['ispublished'] = '{$a} a activé ce service pour vous.';
$string['issubscribed'] = '{$a} est abonné à ce service de votre serveur.';
$string['keydeleted'] = 'Votre clef a été supprimée et remplacée.';
$string['keymismatch'] = 'La clef publique que vous détenez pour ce serveur est différente de la clef qu\'il publie actuellement. La clef publiée actuellement est :';
$string['last_connect_time'] = 'Dernière connexion';
$string['last_connect_time_help'] = 'La date de votre dernière connexion à ce serveur.';
$string['last_transport_help'] = 'Le transport utilisé lors de votre dernière connexion à ce serveur.';
$string['leavedefault'] = 'Utiliser plutôt les réglages par défaut';
$string['listservices'] = 'Lister les services';
$string['loginlinkmnetuser'] = '<br />Si vous êtes un utilisateur MNet distant et pouvez <a href="{$a}">confirmer ici votre adresse de courriel</a>, vous pouvez être redirigé vers votre page de connexion.<br />';
$string['logs'] = 'Historiques';
$string['managemnetpeers'] = 'Gérer les pairs';
$string['method'] = 'Méthode';
$string['methodhelp'] = 'Aide pour la méthode {$a}';
$string['methodsavailableonhost'] = 'Méthodes disponibles sur {$a}';
$string['methodsavailableonhostinservice'] = 'Méthodes disponibles pour {$a->service} sur {$a->host}';
$string['methodsignature'] = 'Signature de méthode pour {$a}';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = 'Concaténer (jusqu\'à) 3 chaînes et retourner le résultat';
$string['mnetdisabled'] = 'MNet est <strong>désactivé</strong>.';
$string['mnetidprovider'] = 'Fournisseur d\'identité MNet';
$string['mnetidproviderdesc'] = 'Vous pouvez utiliser cet utilitaire pour trouver un lien où vous pouvez vous connecter, si vous pouvez fournir l\'adresse de courriel correcte correspondant au nom d\'utilisateur avec lequel vous avez essayé de vous connecter ici.';
$string['mnetidprovidermsg'] = 'Vous devriez pouvoir vous connecter auprès de votre fournisseur {$a}.';
$string['mnetidprovidernotfound'] = 'Aucune information supplémentaire n\'a pu être trouvée.';
$string['mnetlog'] = 'Historiques';
$string['mnetpeers'] = 'Pairs';
$string['mnetservices'] = 'Services';
$string['mnet_session_prohibited'] = 'Les utilisateurs de votre serveur ne sont actuellement pas autorisés à se connecter à {$a}.';
$string['mnetsettings'] = 'Réglages MNet';
$string['moodle_home_help'] = 'Le chemin vers la page d\'accueil de l\'application MNet sur le serveur distant, par exemple /moodle/.';
$string['name'] = 'Nom';
$string['net'] = 'Réseau Moodle';
$string['networksettings'] = 'Réglages réseau';
$string['never'] = 'Jamais';
$string['noaclentries'] = 'Aucun enregistrement dans la liste de contrôle d\'accès SSO';
$string['noaddressforhost'] = 'Désolé, ce nom de serveur ({$a}) n\'a pas pu être interprété !';
$string['nocurl'] = 'La bibliothèque PHP cURL n\'est pas installée';
$string['nolocaluser'] = 'Aucun enregistrement local n\'existe pour cet utilisateur distant, et il n\'a pas pu être créé, car ce serveur ne crée pas automatiquement d\'utilisateurs. Veuillez contacter l\'administrateur !';
$string['nomodifyacl'] = 'Vous n\'avez pas le droit de modifier les listes de contrôles d\'accès MNet.';
$string['nonmatchingcert'] = 'Le sujet du certificat : <br /><em>{$a->subject}</em><br />ne correspond pas au serveur d\'où il provient :<br /><em>{$a->host}</em>.';
$string['nopubkey'] = 'Un problème est survenu lors de la récupération de la clef publique.<br />Il est possible que le serveur n\'autorise pas MNet ou que la clef ne soit pas valide.';
$string['nosite'] = 'Impossible de trouver le cours principal du site';
$string['nosuchfile'] = 'Le fichier/la fonction {$a} n\'existe pas.';
$string['nosuchfunction'] = 'Impossible de localiser la fonction ou fonction interdite par RPC.';
$string['nosuchmodule'] = 'La fonction n\'a pas été adressée correctement et n\'a pas pu être localisée. Veuillez utiliser le format mod/modulename/lib/functionname.';
$string['nosuchpublickey'] = 'Impossible d\'obtenir la clef publique pour vérification de signature.';
$string['nosuchservice'] = 'Le service RPC n\'a pas été lancé sur ce serveur.';
$string['nosuchtransport'] = 'Aucun transport n\'existe avec cet identifiant.';
$string['notBASE64'] = 'Cette chaîne n\'est pas en format Base64. Ce ne peut pas être une clef valide.';
$string['notenoughidpinfo'] = 'Votre fournisseur d\'identité ne donne pas assez d\'information pour créer ou mettre à jour votre compte localement.';
$string['not_in_range'] = 'L\'adresse IP <code>{$a}</code> ne représente pas un serveur fiable.';
$string['notinxmlrpcserver'] = 'Tentative d\'accès au client distant MNet en dehors de l\'exécution du programme serveur XMLRPC';
$string['notmoodleapplication'] = 'Attention ! Il ne s\'agit pas d\'une application Moodle. Certaines des méthodes de contrôle ne pourraient pas fonctionner correctement.';
$string['notPEM'] = 'Cette clef n\'est pas en format PEM. Elle ne fonctionnera pas.';
$string['notpermittedtojump'] = 'Vous n\'êtes pas autorisé à initier une session à distance depuis ce hub Moodle.';
$string['notpermittedtojumpas'] = 'Vous ne pouvez pas entamer une session à distance lorsque vous êtes connecté sous le nom d\'un autre utilisateur.';
$string['notpermittedtoland'] = 'Vous n\'êtes pas autorisé à initier une session à distance.';
$string['off'] = 'Désactivé';
$string['on'] = 'Activé';
$string['options'] = 'Options';
$string['peerprofilefielddesc'] = 'Vous pouvez modifier ici les réglages globaux des champs de profil à envoyer et importer lors de la création d\'utilisateurs';
$string['permittedtransports'] = 'Transports autorisés';
$string['phperror'] = 'Une erreur PHP interne a empêché l\'aboutissement de votre requête.';
$string['position'] = 'Position';
$string['postrequired'] = 'La fonction de suppression requiert une requête POST.';
$string['profileexportfields'] = 'Champs à envoyer';
$string['profilefielddesc'] = 'Vous pouvez configurer ici la liste des champs de profil envoyés et reçus par MNet lors de la création ou de la modification de comptes utilisateurs. Vous pouvez également modifier ceci individuellement pour chaque pair MNet. Les champs suivants sont toujours envoyés et ne sont pas optionnels : {$a}';
$string['profilefields'] = 'Champ du profil';
$string['profileimportfields'] = 'Champs à importer';
$string['promiscuous'] = 'Espion';
$string['publickey'] = 'Clef publique';
$string['publickey_help'] = 'La clef publique est obtenue automatiquement du serveur distant.';
$string['publickeyrequired'] = 'Vous devez fournir une clef publique.';
$string['publish'] = 'Publier';
$string['reallydeleteserver'] = 'Voulez-vous vraiment supprimer le serveur';
$string['receivedwarnings'] = 'Les avertissements suivants ont été notifiés';
$string['recordnoexists'] = 'L\'enregistrement n\'existe pas.';
$string['reenableserver'] = 'Non. Sélectionner cette option pour réactiver ce serveur.';
$string['registerallhosts'] = 'Enregistrer tous les serveurs (mode espion)';
$string['registerallhostsexplain'] = 'Vous pouvez choisir d\'enregistrer automatiquement tous les serveurs tentant de se connecter à votre Moodle. Cela signifie qu\'un enregistrement apparaîtra dans votre liste de serveur pour chaque site MNet se connectant au vôtre et demandant votre clef publique.<br /> Vous avez la possibilité de configurer ci-dessous les services accessibles pour « Tous les serveurs », ce qui vous permettra de fournir des services à tous les serveurs Moodle.';
$string['registerhostsoff'] = 'L\'enregistrement de tous les serveurs est actuellement <b>désactivé</b>';
$string['registerhostson'] = 'L\'enregistrement de tous les serveurs est actuellement <b>activé</b>';
$string['remotecourses'] = 'Cours distants';
$string['remotehost'] = 'Serveur distant';
$string['remotehosts'] = 'Serveurs distants';
$string['remoteuserinfo'] = 'Utilisateur distant {$a->remotetype}. Profil importé depuis<a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'La mise en réseau requiert l\'extension OpenSSL';
$string['restore'] = 'Restaurer';
$string['returnvalue'] = 'Valeur de retour';
$string['reviewhostdetails'] = 'Examiner les détails du serveur';
$string['reviewhostservices'] = 'Examiner les services du serveur';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP non crypté';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (auto-signé)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (auto-signé)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (signé)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (signé)';
$string['selectaccesslevel'] = 'Veuillez choisir dans la liste un niveau d\'accès.';
$string['selectahost'] = 'Veuillez choisir un serveur distant.';
$string['service'] = 'Nom du service';
$string['serviceid'] = 'Identifiant du service';
$string['servicesavailableonhost'] = 'Services disponibles sur {$a}';
$string['serviceswepublish'] = 'Services publiés pour {$a}.';
$string['serviceswesubscribeto'] = 'Services sur {$a} auxquels nous sommes abonnés.';
$string['settings'] = 'Réglages';
$string['showlocal'] = 'Afficher les utilisateurs locaux';
$string['showremote'] = 'Afficher les utilisateurs distants';
$string['ssl_acl_allow'] = 'SSO ACL : permettre l\'utilisateur {$a->user} de {$a->host}';
$string['ssl_acl_deny'] = 'SSO ACL : interdire l\'utilisateur {$a->user} de {$a->host}';
$string['ssoaccesscontrol'] = 'Contrôle d\'accès SSO';
$string['ssoacldescr'] = 'Cette page vous permet d\'accorder ou de refuser l\'accès à certains utilisateurs de serveurs MNet. Elle est fonctionnelle quand vous offrez des services SSO à des utilisateurs distants. Pour contrôler la capacité de vos utilisateurs <em>locaux</em> d\'accéder à d\'autres serveurs MNet, utilisez le système de rôles pour leur donner la capacité <em>mnetlogintoremote</em>.';
$string['ssoaclneeds'] = 'Pour que cette fonctionnalité soit active, vous devez activer MNet, ainsi que le plugin d\'authentification MNet.';
$string['strict'] = 'Strict';
$string['subscribe'] = 'S\'abonner';
$string['system'] = 'Système';
$string['testclient'] = 'Client test MNet';
$string['testtrustedhosts'] = 'Tester une adresse IP';
$string['testtrustedhostsexplain'] = 'Saisissez une adresse IP pour voir s\'il s\'agit d\'un serveur fiable.';
$string['theypublish'] = 'Ils publient';
$string['theysubscribe'] = 'Ils s\'abonnent';
$string['transport_help'] = 'Ces options sont réciproques. Vous ne pouvez donc imposer à un serveur distant l\'utilisation d\'un certificat SSL signé que si votre serveur possède également un certificat SSL.';
$string['trustedhosts'] = 'Serveurs XML-RPC';
$string['trustedhostsexplain'] = '<p>Le mécanisme des serveurs fiables permet à certaines machines d\'effectuer des appels à n\'importe quelle API Moodle via XML-RPC. Grâce à cette option <b>très dangereuse</b>, des scripts externes peuvent contrôler le comportement de Moodle. En cas de doute, désactivez-là.</p><p>Cette option <b>n\'est pas nécessaire</b> pour le fonctionnement standard de MNEt.</p><p>Pour l\'activer, veuillez saisir une liste d\'adresses IP ou de réseaux, une par ligne. Voici quelques exemples.<br />
Votre serveur local :<br />
127.0.0.1<br />
Votre serveur local (avec un bloc réseau):<br />
127.0.0.1/32<br />
Uniquement le serveur d\'adresse IP 192.168.0.7 :<br />
192.168.0.7/32<br />
N\'importe quel serveur avec une adresse IP entre 192.168.0.1 et 192.168.0.255 :<br />
192.168.0.0/24<br />
N\'importe quel serveur :<br />
192.168.0.0/0<br />
Le dernier exemple <b>n\'est pas</b> une configuration recommandée.';
$string['turnitoff'] = 'Désactiver';
$string['turniton'] = 'Activer';
$string['type'] = 'Type';
$string['unknown'] = 'Inconnu';
$string['unknownerror'] = 'Une erreur inconnue est survenue durant la négociation.';
$string['usercannotchangepassword'] = 'Vous ne pouvez pas changer votre mot de passe ici, car vous êtes un utilisateur distant.';
$string['userchangepasswordlink'] = '<br />Vous pourrez changer votre mot de passe chez votre fournisseur <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a>.';
$string['usernotfullysetup'] = 'Votre compte utilisateur est incomplet. Veuillez <a href="{$a}">retourner chez votre fournisseur</a> et vous assurer que votre profil y est complet. Vous devrez peut-être vous déconnecter et vous reconnecter pour que les modifications prennent effet.';
$string['usersareonline'] = 'Attention ! {$a} utilisateurs de ce serveur sont actuellement connectés à votre Moodle.';
$string['validated_by'] = 'Il a été validé par le réseau : <code>{$a}</code>';
$string['verifysignature-error'] = 'La vérification de signature a échoué. Une erreur est survenue.';
$string['verifysignature-invalid'] = 'La vérification de signature a échoué. Il semble que votre envoi n\'a pas été signé par vous.';
$string['version'] = 'version';
$string['warning'] = 'Avertissement';
$string['wrong-ip'] = 'Votre adresse IP ne correspond pas à l\'adresse que nous avons enregistrée.';
$string['xmlrpc-missing'] = 'Le logiciel PHP doit avoir été compilé avec l\'option XML-RPC pour pouvoir utiliser cette fonctionnalité.';
$string['yourhost'] = 'Votre serveur';
$string['yourpeers'] = 'Vos serveurs affiliés';
